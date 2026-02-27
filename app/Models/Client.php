<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clienti';

    protected $fillable = [
        'cod_client',
        'nume',
        'telefon',
        'email',
        'adresa',
    ];

    public function contoare()
    {
        return $this->hasMany(Contor::class, 'cod_client', 'cod_client');
    }

    public static function gasesteDupaCod(string $codClient): ?self
    {
        return static::where('cod_client', strtoupper(trim($codClient)))->first();
    }
}
