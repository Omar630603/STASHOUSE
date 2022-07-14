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
        'status',
        'capacity',
    ];
}
