<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contor extends Model
{
    protected $table = 'contoare';

    protected $fillable = [
        'cod_client',
        'serie_contor',
        'adresa',
        'index_vechi',
        'index_nou',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'cod_client', 'cod_client');
    }

    public static function pentruClient(string $codClient): \Illuminate\Database\Eloquent\Collection
    {
        return static::where('cod_client', strtoupper(trim($codClient)))->get();
    }
}
