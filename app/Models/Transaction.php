<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'rent_id',
        'customer_id',
        'storage_owner_bank_id',
        'description',
        'totalPrice',
        'status',
        'proof',
    ];
}
