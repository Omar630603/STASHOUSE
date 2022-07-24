<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_category_id',
        'storage_owner_id',
        'name',
        'city',
        'address',
        'private_key',
        'price_per_day',
        'description',
        'detail',
        'rented',
        'is_active',
        'is_rented',
        'capacity',
    ];

    protected $hidden = [
        'private_key',
    ];

    public function unitCategory()
    {
        return $this->belongsTo(UnitCategory::class);
    }

    public function storageOwner()
    {
        return $this->belongsTo(StorageOwner::class, 'storage_owner_id');
    }

    public function assets()
    {
        return $this->hasMany(UnitAsset::class);
    }

    public function reviews()
    {
        return $this->hasMany(UnitReview::class);
    }

    public function rents()
    {
        return $this->hasMany(Rent::class);
    }
}
