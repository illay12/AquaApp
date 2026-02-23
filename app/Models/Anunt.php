<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anunt extends Model
{
    use HasFactory;
    
    protected $table = 'anunturi';

    protected $fillable = [
        'titlu',
        'continut',
    ];
}