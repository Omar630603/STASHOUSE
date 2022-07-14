<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitAsset extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_id',
        'image',
    ];
}
