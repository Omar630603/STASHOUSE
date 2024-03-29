<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'ordered',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rents()
    {
        return $this->hasMany(Rent::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
