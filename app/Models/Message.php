<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_user_id',
        'receiver_user_id',
        'chat_id',
        'message',
        'message_type',
        'status',
    ];

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }
}
