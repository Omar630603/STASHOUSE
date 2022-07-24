<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionStatus extends Model
{
    use HasFactory;
    const NOTPAID       = 0;
    const PAID          = 1;
    const APPROVED      = 2;
    const DISAPPROVED   = 3;
    const DELETED       = 4;
}
