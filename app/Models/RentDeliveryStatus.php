<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentDeliveryStatus extends Model
{
    use HasFactory;
    const REQUESTED         = 0;
    const ACCEPTED          = 1;
    const ONTHEROAD         = 2;
    const DONE              = 3;
    const DELETED           = 4;
}
