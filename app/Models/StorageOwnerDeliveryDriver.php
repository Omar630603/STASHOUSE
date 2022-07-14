<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageOwnerDeliveryDriver extends Model
{
    use HasFactory;

    protected $fillable = [
        'storage_owner_id',
        'delivery_driver_id',
    ];
}
