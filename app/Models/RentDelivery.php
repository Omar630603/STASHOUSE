<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentDelivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'rent_id',
        'delivery_driver_id',
        'description',
        'picked_up_location',
        'delivered_to_location',
        'status',
    ];
}
