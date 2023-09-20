<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'id',
        'codigo',
        'orderType',
        'patient',
        'description',
        'createdDate',
        'samples',
        'dni',
        'discarded',
        'customerId',
        'originId',
        'labTestGroups',
        'prices',
        'tax',
        'description',
        'alicuota',
        'plaquetas',
        'valordiuresis',
        'iva',
        'barcode',
    ];

    public $timestamps = false;

}
      