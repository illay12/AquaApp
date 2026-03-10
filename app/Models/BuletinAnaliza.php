<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuletinAnaliza extends Model
{
    protected $table = 'buletine_analiza';

    protected $fillable = [
        'luna',
        'an',
        'cale',
        'nume_original',
        'marime',
    ];

    /**
     * URL download/preview
     */
    public function getUrlAttribute(): string
    {
        return url('/fisiere/buletin/' . $this->id . '/download');
    }

    /**
     * Dimensiunea formatată
     */
    public function getMarimeFormatatAttribute(): string
    {
        $bytes = $this->marime;
        if ($bytes < 1024)     return $bytes . ' B';
        if ($bytes < 1048576)  return round($bytes / 1024, 1) . ' KB';
        return round($bytes / 1048576, 1) . ' MB';
    }

    /**
     * Label complet ex: "Ianuarie 2026"
     */
    public function getLabelAttribute(): string
    {
        return $this->luna . ' ' . $this->an;
    }

    /**
     * Ordinea lunilor (1=Ianuarie ... 12=Decembrie)
     */
    public static function ordineLuni(): array
    {
        return [
            'Ianuarie' => 1, 'Februarie' => 2, 'Martie' => 3,
            'Aprilie'  => 4, 'Mai'       => 5, 'Iunie'  => 6,
            'Iulie'    => 7, 'August'    => 8, 'Septembrie' => 9,
            'Octombrie'=> 10,'Noiembrie' => 11,'Decembrie'  => 12,
        ];
    }

    /**
     * Scope: sortare descrescătoare an, apoi luna descrescătoare (Decembrie primul)
     */
    public function scopeGroupatPeAni($query)
    {
        return $query
            ->orderBy('an', 'desc')
            ->orderByRaw("FIELD(luna,
                'Decembrie','Noiembrie','Octombrie','Septembrie','August',
                'Iulie','Iunie','Mai','Aprilie','Martie','Februarie','Ianuarie'
            )");
    }
}
