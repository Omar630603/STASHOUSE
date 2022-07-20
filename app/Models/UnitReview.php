<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_id',
        'customer_id',
        'rating',
        'review',
        'is_published',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
