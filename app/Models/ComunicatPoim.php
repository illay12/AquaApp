<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComunicatPoim extends Model
{
    protected $table = 'comunicate_poim';

    protected $fillable = [
        'data',
        'titlu',
        'fisier',
    ];

    protected $casts = [
        'data' => 'date',
    ];
}
