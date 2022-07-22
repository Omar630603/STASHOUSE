<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DeliveryDriverController extends Controller
{
    public function index()
    {
        return view('delivery_driver.dashboard');
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
        return redirect()->route('delivery_driver.chats', ['chat_id' => $chat->id]);
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
        return view('delivery_driver.chat', compact('chats', 'selectedChat'));
    }
}
