<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComunicatPddtj extends Model
{
    protected $table = 'comunicate_pddtj';

    protected $fillable = [
        'data',
        'titlu',
        'fisier',
    ];

    protected $casts = [
        'data' => 'date',
    ];
}
