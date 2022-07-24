<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryStatus extends Model
{
    use HasFactory;
    const ACCEPTED          = 0;
    const ONTHEROAD         = 1;
    const DONE              = 2;
    const DELETED           = 5;
}
