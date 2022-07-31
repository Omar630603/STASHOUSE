<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\DeliveryDriver;
use App\Models\RentDeliveryStatus;
use App\Models\Message;
use App\Models\Rent;
use App\Models\RentDelivery;
use App\Models\RentStatus;
use App\Models\Transaction;
use App\Models\TransactionStatus;
use App\Models\Unit;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.dashboard');
    }
    public function sendChat(Request $request)
    {
        $sender = Auth::user();
        $receiver = User::where('id', $request->receiver)->first();
        $chat = Chat::where([
            ['sender_user_id', $sender->id],
            ['receiver_user_id', $receiver->id]
        ])->orWhere([
            ['sender_user_id', $receiver->id],
            ['receiver_user_id', $sender->id]
        ])->first();
        if ($chat == null) {
            $chat = new Chat();
            $chat->sender_user_id = $sender->id;
            $chat->receiver_user_id = $receiver->id;
            $chat->save();
        }
        $messageText = $request->message;
        $message = new Message();
        $message->chat_id = $chat->id;
        $message->sender_user_id = $sender->id;
        $message->receiver_user_id = $receiver->id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image_path = 'images/chats/' . $chat->id . '/';
            $image->storeAs($image_path, $image_name, 'public');
            $message->message = $image_path . $image_name;
            $message->message_type = 1;
        } else {
            $message->message = $messageText;
            $message->message_type = 0;
        }
        $message->status = 0;
        $message->save();

        $chat->updated_at = $message->updated_at;
        $chat->save();
        return redirect()->route('customer.chats', ['chat_id' => $chat->id]);
    }
    public function getChats(Request $request)
    {
        $selectedChat = $request->chat_id;
        if ($request->chat_id != null) {
            $selectedChat = Chat::where('id', $selectedChat)->first();
            if (isset($selectedChat)) {
                if ($selectedChat->sender_user_id != Auth::user()->id && $selectedChat->receiver_user_id != Auth::user()->id) {
                    $selectedChat = null;
                }
                if ($selectedChat != null) {
                    foreach ($selectedChat->messages as $message) {
                        if ($message->receiver_user_id == Auth::user()->id) {
                            $message->status = true;
                            $message->save();
                        }
                    }
                }
            }
        }
        $chats = Chat::where('sender_user_id', Auth::user()->id)->orWhere('receiver_user_id', Auth::user()->id)->get();
        if ($chats->count() <= 0) {
            Session::flash('info', 'No chats found');
        }
        return view('customer.chat', compact('chats', 'selectedChat'));
    }
    public function review(Request $request, Unit $unit)
    {
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'review' => 'max:255',
        ]);

        if ($request->has('rating')) {
            $unit->reviews()->create([
                'unit_id' => $unit->id,
                'customer_id' => Auth::user()->customer->id,
                'rating' => $request->rating,
                'review' => $request->review ?? '',
                'is_published' => true,
            ]);
            Session::flash('success', 'Review submitted successfully');
        } else {
            Session::flash('error', 'Review not submitted');
        }
        return redirect()->back();
    }
    public function rentProcess(Unit $unit)
    {
        if ($unit->is_active && !$unit->is_rented) {
            return view('customer.rent-process', compact('unit'));
        } else {
            return redirect()->back()->with('error', 'Unit is not available');
        }
    }
    public function rent(Request $request, Unit $unit)
    {
        if (!$unit->is_active && $unit->is_rented) {
            return redirect()->back()->with('error', 'Unit is not available');
        } else {
            // validate request
            $request->validate([
                'starts_from' => 'required|date:after_today',
                'ends_at' => 'required|date|after:start_date',
                'days' => 'required|numeric|min:1',
                'total_price' => 'required|numeric|min:1',
                'payment_method' => 'required',
                'delivery_option' => 'required',
            ]);
            // validate start date
            $today = new DateTime();
            $date = new DateTime($request->starts_from);
            // Compare the dates
            if ($today > $date) {
                return redirect()->back()->with('error', 'Start date must be after today');
            }
            $message = '';
            // create a new rent
            $rent = new Rent();
            $rent->customer_id = Auth::user()->customer->id;
            $rent->unit_id = $unit->id;
            $rent->starts_from = date('Y-m-d h:m:s', strtotime($request->starts_from));
            $rent->ends_at = date('Y-m-d h:m:s', strtotime($request->ends_at));
            if ($request->description == 'Tulis sesuatu untuk pemilik unit') {
                $rent->description = null;
            } else {
                $rent->description = $request->description ?? '';
            }
            $rent->total_price = $request->total_price;
            $rent->status = RentStatus::SUBMITTED;
            $rent->save();
            $message = '<strong>Permintaan sewa berhasil dikirim</strong>';
            // change unit status
            $unit->is_rented = true;
            $unit->save();
            $message .= '<br>Status unit berubah menjadi disewa';
            // create a new transaction
            $transaction = new Transaction();
            $transaction->rent_id = $rent->id;
            $transaction->customer_id = Auth::user()->customer->id;
            if ($request->payment_method == 'payment_method-now') {
                if ($request->bank_account == null) {
                    $rent->delete();
                    $unit->is_rented = false;
                    $unit->save();
                    return redirect()->back()->with('error', 'Bank account is required');
                }
                $transaction->storage_owner_bank_id = explode("-", $request->bank_account)[1];
                if ($request->delivery_option == 'delivery_option-yes') {
                    $transaction->description = 'Sewa unit ' . $unit->name . ' dari ' .
                        $request->starts_from . ' sampai ' . $request->ends_at . ' bayar sekarang. Opsi delivery: Iya';
                } else if ($request->delivery_option == 'delivery_option-no') {
                    $transaction->description = 'Sewa unit ' . $unit->name . ' dari ' .
                        $request->starts_from . ' sampai ' . $request->ends_at . ' bayar sekarang. Opsi delivery: Tidak';
                }
                $transaction->status = TransactionStatus::PAID;
                $rent->status = RentStatus::INTRANSACTION;
                $rent->save();
                $message .= '<br>Status sewa berubah menjadi dalam proses pembayaran';
                if ($request->hasFile('proof')) {
                    $proof = $request->file('proof');
                    $proof_name = time() . '.' . $proof->getClientOriginalExtension();
                    $proof_path = 'images/transactions/' . $unit->id . '/';
                    $proof->storeAs($proof_path, $proof_name, 'public');
                    $transaction->proof = $proof_path . $proof_name;
                } else {
                    $rent->delete();
                    $unit->is_rented = false;
                    $unit->save();
                    return redirect()->back()->with('error', 'Proof is required');
                }
                $message .= '<br><strong>Metode pembayaran: Sekarang, Bukti: Sudah Diunggah</strong>';
            } elseif ($request->payment_method == 'payment_method-later') {
                $transaction->storage_owner_bank_id = null;
                if ($request->delivery_option == 'delivery_option-yes') {
                    $transaction->description = 'Sewa unit ' . $unit->name . ' dari ' .
                        $request->starts_from . ' sampai ' . $request->ends_at . ' bayar nanti. Opsi delivery: Iya';
                } else if ($request->delivery_option == 'delivery_option-no') {
                    $transaction->description = 'Sewa unit ' . $unit->name . ' dari ' .
                        $request->starts_from . ' sampai ' . $request->ends_at . ' bayar nanti. Opsi delivery: Tidak';
                }
                $transaction->status = TransactionStatus::NOTPAID;
                $transaction->proof = null;
                $message .= '<br><strong>Metode pembayaran: Nanti, Bukti: Tidak Diunggah, perlu diunggah nanti dalam 5 hari kerja</strong>';
            }
            $transaction->total_price = $request->total_price;
            $transaction->save();
            $message .= '<br><strong>Transaksi sudah dibuat</strong><br>' . $transaction->description;
            // create a new delivery
            if ($request->delivery_option == 'delivery_option-yes') {
                if ($request->picked_up_location == null) {
                    $rent->delete();
                    $unit->is_rented = false;
                    $unit->save();
                    Storage::delete('public/' . $transaction->proof);
                    $transaction->delete();
                    return redirect()->back()->with('error', 'Delivery address is required');
                }
                if ($request->delivery_service == null) {
                    $rent->delete();
                    $unit->is_rented = false;
                    $unit->save();
                    Storage::delete('public/' . $transaction->proof);
                    $transaction->delete();
                    return redirect()->back()->with('error', 'Delivery service is required');
                }
                $rentDelivery = new RentDelivery();
                $rentDelivery->rent_id = $rent->id;
                $rentDelivery->delivery_driver_id = explode("-", $request->delivery_service)[1];
                if ($request->delivery_description == 'Tulis sesuatu untuk pengemudi pengiriman') {
                    $rentDelivery->description = null;
                } else {
                    $rentDelivery->description = $request->delivery_description ?? '';
                }
                $rentDelivery->picked_up_location = $request->picked_up_location;
                $rentDelivery->delivered_to_location = $unit->address;
                $rentDelivery->status = RentDeliveryStatus::REQUESTED;
                $rentDelivery->save();
                $message .= '<br><strong>Pengiriman sudah dibuat</strong><br><strong>Sopir pengiriman:</strong> ' . $rentDelivery->deliveryDriver->driver_name .
                    '<br><strong>Jasa pengiriman:</strong> ' . $rentDelivery->deliveryDriver->deliveryCompany->name .
                    '<br>Anda akan diberi tahu saat pengiriman sudah siap, tunggu saja ya.';
                $chat = Chat::where([
                    ['sender_user_id', Auth::user()->id],
                    ['receiver_user_id', $rentDelivery->deliveryDriver->user->id]
                ])->orWhere([
                    ['sender_user_id', $rentDelivery->deliveryDriver->user->id],
                    ['receiver_user_id', Auth::user()->id]
                ])->first();
                if ($chat == null) {
                    $chat = new Chat();
                    $chat->sender_user_id = $rentDelivery->deliveryDriver->user->id;
                    $chat->receiver_user_id = Auth::user()->id;
                    $chat->save();
                }
                $chatMessage = new Message();
                $chatMessage->chat_id = $chat->id;
                $chatMessage->sender_user_id = $rentDelivery->deliveryDriver->user->id;
                $chatMessage->receiver_user_id = Auth::user()->id;
                $chatMessage->message = '<strong>' . Auth::user()->name . '</strong> telah meminta pengiriman barang ke ' . $rentDelivery->delivered_to_location . ' dari ' . $rentDelivery->picked_up_location . '<br>' .
                    'Silakan periksa permintaan pengiriman.';
                $chatMessage->save();
                $chat->updated_at = $chatMessage->updated_at;
                $chat->save();
            }
            // send chat to customer from storage owner
            $chat = Chat::where([
                ['sender_user_id', Auth::user()->id],
                ['receiver_user_id', $unit->storageOwner->user->id]
            ])->orWhere([
                ['sender_user_id', $unit->storageOwner->user->id],
                ['receiver_user_id', Auth::user()->id]
            ])->first();
            if ($chat == null) {
                $chat = new Chat();
                $chat->sender_user_id = $unit->storageOwner->user->id;
                $chat->receiver_user_id = Auth::user()->id;
                $chat->save();
            }
            $chatMessage = new Message();
            $chatMessage->chat_id = $chat->id;
            $chatMessage->sender_user_id = $unit->storageOwner->user->id;
            $chatMessage->receiver_user_id = Auth::user()->id;
            $chatMessage->message = 'Permintaan sewa dari <strong>' . Auth::user()->name . '</strong> telah dikirimkan.<br>' .
                'Terima kasih telah menyewa ' . $unit->name . ', Silakan periksa permintaan sewa Anda di profil Anda.<br> Ini log sewa Anda:<br>' . $message;
            $chatMessage->save();
            $chat->updated_at = $chatMessage->updated_at;
            $chat->save();
            Session::flash('success', 'Rent request has been submitted');
            return view('customer.rent-success', compact('unit', 'message'));
        }
    }
    public function showMyRents(Request $request)
    {
        $selectedUnit = $request->unit_id;
        $selectedUnit = Unit::where([
            ['id', $selectedUnit],
            ['is_active', true],
        ])->first();
        $rents = Rent::where('customer_id', Auth::user()->customer->id)->groupBy('unit_id')->get();
        return view('customer.my-rents', compact('rents', 'selectedUnit'));
    }
    public function payTransaction(Request $request, Transaction $transaction)
    {
        if ($request->bank_account == null) {
            return redirect()->back()->with('error', 'Bank account is required');
        }
        $rent = Rent::where('id', $transaction->rent_id)->first();
        $unit = Unit::where('id', $rent->unit_id)->first();
        $transaction->status = TransactionStatus::PAID;
        $transaction->storage_owner_bank_id = explode("-", $request->bank_account)[1];
        if ($request->hasFile('proof')) {
            $proof = $request->file('proof');
            $proof_name = time() . '.' . $proof->getClientOriginalExtension();
            $proof_path = 'images/transactions/' . $unit->id . '/';
            $proof->storeAs($proof_path, $proof_name, 'public');
            $transaction->proof = $proof_path . $proof_name;
        } else {
            return redirect()->back()->with('error', 'Proof is required');
        }
        $transaction->save();
        $rent->status = RentStatus::INTRANSACTION;
        $rent->save();
        $chat = Chat::where([
            ['sender_user_id', Auth::user()->id],
            ['receiver_user_id', $unit->storageOwner->user->id]
        ])->orWhere([
            ['sender_user_id', $unit->storageOwner->user->id],
            ['receiver_user_id', Auth::user()->id]
        ])->first();
        if ($chat == null) {
            $chat = new Chat();
            $chat->sender_user_id = $unit->storageOwner->user->id;
            $chat->receiver_user_id = Auth::user()->id;
            $chat->save();
        }
        $chatMessage = new Message();
        $chatMessage->chat_id = $chat->id;
        $chatMessage->sender_user_id = Auth::user()->id;
        $chatMessage->receiver_user_id = $unit->storageOwner->user->id;
        $chatMessage->message = '<strong>' . Auth::user()->name . '</strong> telah melakukan pembayaran sewa ' . $unit->name . '<br>' .
            'Silakan periksa permintaan sewa. ' . $transaction->description;
        $chatMessage->save();
        $chat->updated_at = $chatMessage->updated_at;
        $chat->save();
        return redirect()->back()->with('success', 'Transaction has been paid');
    }

    public function deleteTransaction(Transaction $transaction)
    {
        $rent = Rent::where('id', $transaction->rent_id)->first();

        if ($transaction->status == TransactionStatus::NOTPAID) {
            $rent->total_price = $rent->total_price - $transaction->total_price;
            $rent->save();
        }
        $transaction->status = TransactionStatus::DELETED;
        $transaction->save();
        return redirect()->back()->with('success', 'Transaction has been deleted');
    }

    public function addDelivery(Request $request, Unit $unit, $rent_id)
    {
        if ($request->picked_up_location == null) {
            return redirect()->back()->with('error', 'Delivery address is required');
        }
        if ($request->delivered_to_location == null) {
            return redirect()->back()->with('error', 'Delivery address is required');
        }
        if ($request->delivery_service == null) {
            return redirect()->back()->with('error', 'Delivery service is required');
        }

        $rentDelivery = new RentDelivery();
        $rentDelivery->rent_id = $rent_id;
        $rentDelivery->delivery_driver_id = explode("-", $request->delivery_service)[1];

        if ($request->delivery_description == 'Tulis sesuatu untuk pengemudi pengiriman') {
            $rentDelivery->description = null;
        } else {
            $rentDelivery->description = $request->delivery_description ?? '';
        }

        if ($request->delivered_to_location == 'from') {
            $rentDelivery->picked_up_location = $unit->address;
            $rentDelivery->delivered_to_location = $request->picked_up_location;
        } elseif ($request->delivered_to_location == 'to') {
            $rentDelivery->picked_up_location = $request->picked_up_location;
            $rentDelivery->delivered_to_location = $unit->address;
        }

        $rentDelivery->status = RentDeliveryStatus::REQUESTED;
        $rentDelivery->save();

        $rent = Rent::where('id', $rent_id)->first();
        $transaction = new Transaction();
        $transaction->rent_id = $rent_id;
        $transaction->customer_id = $rent->customer_id;
        $transaction->description = 'Pengiriman barang ke ' . $rentDelivery->delivered_to_location . ' dari ' . $rentDelivery->picked_up_location;
        $transaction->total_price = DeliveryDriver::where('id', $rentDelivery->delivery_driver_id)->first()->price_per_km;
        $transaction->status = TransactionStatus::NOTPAID;
        $transaction->save();
        $rent->total_price += $transaction->total_price;
        $rent->save();

        $chat = Chat::where([
            ['sender_user_id', Auth::user()->id],
            ['receiver_user_id', $rentDelivery->deliveryDriver->user->id]
        ])->orWhere([
            ['sender_user_id', $rentDelivery->deliveryDriver->user->id],
            ['receiver_user_id', Auth::user()->id]
        ])->first();
        if ($chat == null) {
            $chat = new Chat();
            $chat->sender_user_id = $rentDelivery->deliveryDriver->user->id;
            $chat->receiver_user_id = Auth::user()->id;
            $chat->save();
        }
        $chatMessage = new Message();
        $chatMessage->chat_id = $chat->id;
        $chatMessage->sender_user_id = $rentDelivery->deliveryDriver->user->id;
        $chatMessage->receiver_user_id = Auth::user()->id;
        $chatMessage->message = '<strong>' . Auth::user()->name . '</strong> telah meminta pengiriman barang ke ' . $rentDelivery->delivered_to_location . ' dari ' . $rentDelivery->picked_up_location . '<br>' .
            'Silakan periksa permintaan pengiriman.';
        $chatMessage->save();
        $chat->updated_at = $chatMessage->updated_at;
        $chat->save();

        return redirect()->back()->with('success', 'Delivery has been requested');
    }

    public function deleteDelivery(RentDelivery $delivery)
    {
        $delivery->status = RentDeliveryStatus::DELETED;
        $delivery->save();
        return redirect()->back()->with('success', 'Delivery has been deleted');
    }
    public function deleteRent(Rent $rent)
    {
        $rent->status = RentStatus::DELETED;
        $unit = Unit::where('id', $rent->unit_id)->first();
        $lastRentByUnit = Rent::where('unit_id', $unit->id)->orderBy('created_at', 'DESC')->first();
        if ($lastRentByUnit->customer_id == $rent->customer_id && $lastRentByUnit->id == $rent->id) {
            $unit->is_rented = false;
            $unit->save();
        }
        $rent->save();
        return redirect()->back()->with('success', 'Rent has been deleted');
    }
}
