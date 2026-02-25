<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class DispeceratUser extends Model
{
    protected $table = 'dispecerat_users';

    protected $fillable = [
        'username',
        'password',
        'nume',
        'categorie',
    ];

    protected $hidden = ['password'];

    /**
     * Verifică parola
     */
    public function verificaParola(string $parola): bool
    {
        return Hash::check($parola, $this->password);
    }

    /**
     * Găsește userul după username
     */
    public static function autentifica(string $username, string $parola): ?self
    {
        $user = static::where('username', $username)->first();

        if ($user && $user->verificaParola($parola)) {
            return $user;
        }

        return null;
    }

    /**
     * Returnează label-ul categoriei
     */
    public function getLabelCategorieAttribute(): string
    {
        return match($this->categorie) {
            'angajare' => 'Angajări',
            'calitate' => 'Laborator – Calitate apă',
            'avarie'   => 'Avarii & Anunțuri generale',
            'diverse'  => 'Diverse',
            default    => ucfirst($this->categorie),
        };
    }

    /**
     * Returnează culoarea badge-ului categoriei
     */
    public function getCuloareCategorieAttribute(): string
    {
        return match($this->categorie) {
            'angajare' => '#d1fae5;color:#059669',
            'calitate' => '#e0f2fe;color:#0369a1',
            'avarie'   => '#fee2e2;color:#dc2626',
            'diverse'  => '#f3e8ff;color:#7c3aed',
            default    => '#f1f5f9;color:#475569',
        };
    }
}
