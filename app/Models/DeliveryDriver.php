<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryDriver extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'delivery_company_id',
        'driver_name',
        'phone',
        'address',
        'vehicle_name',
        'vehicle_color',
        'vehicle_number',
        'price_per_km',
        'deliveried',
        'image',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function storageOwners()
    {
        return $this->belongsToMany(StorageOwner::class, 'storage_owner_delivery_drivers')->withPivot('status');
    }

    public function deliveryCompany()
    {
        return $this->belongsTo(DeliveryCompany::class);
    }
}
