<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageOwnerBank extends Model
{
    use HasFactory;

    protected $fillable = [
        'storage_owner_id',
        'bank_id',
        'account_number',
        'is_primary',
        'is_verified',
    ];

    public function storageOwner()
    {
        return $this->belongsTo(StorageOwner::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
