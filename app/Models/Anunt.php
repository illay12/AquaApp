<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Anunt extends Model
{
    use HasFactory;

    protected $table = 'anunturi';

    protected $fillable = [
        'titlu',
        'continut',
        'slug',
        'categorie',
    ];

    /**
     * Fișierele atașate anunțului
     */
    public function fisiere()
    {
        return $this->hasMany(AnuntFisier::class);
    }

    /**
     * Generează automat slug-ul din titlu la creare
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($anunt) {
            if (empty($anunt->slug)) {
                $anunt->slug = static::generateUniqueSlug($anunt->titlu);
            }
        });

        static::updating(function ($anunt) {
            if ($anunt->isDirty('titlu') && empty($anunt->slug)) {
                $anunt->slug = static::generateUniqueSlug($anunt->titlu);
            }
        });
    }

    protected static function generateUniqueSlug(string $titlu): string
    {
        $slug     = Str::slug($titlu);
        $original = $slug;
        $count    = 2;

        while (static::where('slug', $slug)->exists()) {
            $slug = $original . '-' . $count++;
        }

        return $slug;
    }

    public function getUrlAttribute(): string
    {
        return url('/anunturi/' . $this->slug);
    }

    public function getRezumatAttribute(): string
    {
        return Str::limit(strip_tags($this->continut), 160);
    }

    public function scopeCategorie($query, string $categorie)
    {
        return $query->where('categorie', $categorie);
    }

    public function scopeCauta($query, string $termen)
    {
        return $query->where(function ($q) use ($termen) {
            $q->where('titlu', 'like', '%' . $termen . '%')
              ->orWhere('continut', 'like', '%' . $termen . '%');
        });
    }
}
