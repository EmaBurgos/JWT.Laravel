<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Labtestgroup extends Model
{
     protected $fillable = [
        'id',
        'createdDate',
        'codigo',
        'name',
        'method',
        'processdays',
        'report',
        'storage',
        'instrument',
        'sample',
        'specialty',
        'instructions',
        'interferences',
        'reference_value',
        'price'
    ];

        public function results()
    {
        return $this->belongsToMany(Results::class);
    } 
}
