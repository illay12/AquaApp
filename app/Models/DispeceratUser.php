<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DispeceratUser extends Model
{
    protected $table = 'dispecerat_users';

    protected $fillable = [
        'username',
        'password',
        'nume',
        'categorie',
        'token',
        'token_expires_at',
    ];

    protected $hidden = ['password', 'token'];

    protected $casts = [
        'token_expires_at' => 'datetime',
    ];

    /**
     * Durata token-ului în ore
     */
    const TOKEN_ORE = 8;

    /**
     * Verifică parola
     */
    public function verificaParola(string $parola): bool
    {
        return Hash::check($parola, $this->password);
    }

    /**
     * Autentifică userul și generează token nou
     */
    public static function autentifica(string $username, string $parola): ?self
    {
        $user = static::where('username', $username)->first();

        if ($user && $user->verificaParola($parola)) {
            // Generează token nou la fiecare login
            $user->token            = Str::random(64);
            $user->token_expires_at = Carbon::now()->addHours(self::TOKEN_ORE);
            $user->save();

            return $user;
        }

        return null;
    }

    /**
     * Verifică dacă token-ul din sesiune e valid și neexpirat
     */
    public static function verificaToken(int $userId, string $token): bool
    {
        $user = static::find($userId);

        if (!$user) return false;
        if ($user->token !== $token) return false;
        if (!$user->token_expires_at) return false;
        if (Carbon::now()->isAfter($user->token_expires_at)) return false;

        return true;
    }

    /**
     * Invalidează token-ul la logout
     */
    public function invalideazaToken(): void
    {
        $this->token            = null;
        $this->token_expires_at = null;
        $this->save();
    }

    /**
     * Câte minute mai sunt până la expirare
     */
    public function minuteRamase(): int
    {
        if (!$this->token_expires_at) return 0;
        return max(0, (int) Carbon::now()->diffInMinutes($this->token_expires_at, false));
    }

    /**
     * Label categorie
     */
    public function getLabelCategorieAttribute(): string
    {
        return match($this->categorie) {
            'angajare' => 'Angajări',
            'calitate' => 'Laborator – Calitate apă',
            'avarie'   => 'Dispecerat Avarii',
            'diverse'  => 'Diverse',
            default    => ucfirst($this->categorie),
        };
    }
}
