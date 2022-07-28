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
        'total_price',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function rentDeliveries()
    {
        return $this->hasMany(RentDelivery::class);
    }
}
