<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dimensions',
        'description',
        'image',
    ];

    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
