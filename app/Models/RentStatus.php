<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentStatus extends Model
{
    use HasFactory;
    const SUBMITTED         = 0;
    const APPROVED          = 1;
    const DISAPPROVED       = 2;
    const INTRANSACTION     = 3;
    const INDELIVERY        = 4;
    const DELETED           = 5;
}
