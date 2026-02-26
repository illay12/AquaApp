<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnuntFisier extends Model
{
    protected $table = 'anunt_fisiere';

    protected $fillable = [
        'anunt_id',
        'nume_original',
        'cale',
        'tip',
        'marime',
    ];

    /**
     * Anunțul căruia îi aparține fișierul
     */
    public function anunt()
    {
        return $this->belongsTo(Anunt::class);
    }

    /**
     * URL public pentru download
     */
    public function getUrlAttribute(): string
    {
        return route('fisiere.download', $this->id);
    }

    /**
     * Dimensiunea formatată (ex: 1.2 MB)
     */
    public function getMarimeFomatataAttribute(): string
    {
        $bytes = $this->marime;

        if ($bytes < 1024)       return $bytes . ' B';
        if ($bytes < 1048576)    return round($bytes / 1024, 1) . ' KB';
        return round($bytes / 1048576, 1) . ' MB';
    }

    /**
     * Iconița Bootstrap Icons în funcție de tip
     */
    public function getIconAttribute(): string
    {
        return match($this->tip) {
            'pdf'  => 'bi-file-earmark-pdf',
            'docx' => 'bi-file-earmark-word',
            'xlsx' => 'bi-file-earmark-excel',
            default => 'bi-file-earmark',
        };
    }

    /**
     * Culoarea iconei în funcție de tip
     */
    public function getCuloareIconAttribute(): string
    {

    
        return match($this->tip) {
            'pdf'  => '#dc2626',
            'docx' => '#1d4ed8',
            'xlsx' => '#059669',
            default => '#64748b',
        };
    }
}
