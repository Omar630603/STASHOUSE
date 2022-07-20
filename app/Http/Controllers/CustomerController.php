<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Message;
use App\Models\Role;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        $message = $request->message;
        $message_type = $request->message_type ? $request->message_type : 0;
        $message = Message::create([
            'chat_id' => $chat->id,
            'message' => $message,
            'message_type' => $message_type,
            'status' => 0,
        ]);
        return redirect()->route('customer.chats')->with('success', 'Message sent successfully');
    }
    public function getChats()
    {
        $chats = Chat::where('sender_user_id', Auth::user()->id)->orWhere('receiver_user_id', Auth::user()->id)->get();
        if ($chats->count() <= 0) {
            Session::flash('info', 'No chats found');
        }
        return view('customer.chat', compact('chats'));
    }
}
