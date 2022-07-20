<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageOwner extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'storage_name',
        'phone',
        'address',
        'rented',
        'is_active',
        'is_trusted',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function deliveryDrivers()
    {
        return $this->belongsToMany(DeliveryDriver::class, 'storage_owner_delivery_drivers')->withPivot('status');
    }
}
