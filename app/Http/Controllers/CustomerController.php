<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Message;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
        $selectedChat = Chat::where('id', $selectedChat)
            ->where('sender_user_id', Auth::user()->id)
            ->orWhere('receiver_user_id', Auth::user()->id)
            ->first();
        if ($selectedChat != null) {
            foreach ($selectedChat->messages as $message) {
                if ($message->receiver_user_id == Auth::user()->id) {
                    $message->status = true;
                    $message->save();
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
        $request->validate([
            'starts_from' => 'required|date:after_today',
            'ends_at' => 'required|date|after:start_date',
            'days' => 'required|numeric|min:1',
            'total_price' => 'required|numeric|min:1',
            'payment_method' => 'required',
            'delivery_option' => 'required',
        ]);
        $today = date('d M Y');
        $date = date('d M Y', strtotime($request->starts_from));
        if ($date < $today) {
            return redirect()->back()->with('error', 'Start date must be after today');
        }
        return redirect()->back();
    }
}
