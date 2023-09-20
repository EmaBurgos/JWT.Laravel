<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'id',
        'createdDate',
        'amount',
        'bank',
        'type',
        'certificate',
        'receipt',
    ];
}
