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
        'total_price',
        'status',
        'proof',
    ];

    public function rent()
    {
        return $this->belongsTo(Rent::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function storageOwnerBank()
    {
        return $this->belongsTo(StorageOwnerBank::class);
    }
}
