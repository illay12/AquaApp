<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['username', 'password', 'nume', 'rol'];

    protected $hidden = ['password', 'remember_token'];

    // Foloseste 'username' in loc de 'email' pentru autentificare
    public function getAuthIdentifierName(): string
    {
        return 'username';
    }
}
