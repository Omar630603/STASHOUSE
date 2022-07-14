<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'unit_id',
        'starts_from',
        'ends_at',
        'description',
        'totalPrice',
        'status',
    ];
}
