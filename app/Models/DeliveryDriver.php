<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryDriver extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'vehicle_name',
        'vehicle_color',
        'vehicle_number',
        'price_per_km',
        'deliveried',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
