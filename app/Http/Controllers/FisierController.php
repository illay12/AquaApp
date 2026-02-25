<?php

namespace App\Http\Controllers;

use App\Models\AnuntFisier;
use Illuminate\Support\Facades\Storage;

class FisierController extends Controller
{
    /**
     * Download fișier cu headers corecte
     * GET /fisiere/{id}/download
     */
    public function download(int $id)
    {
        $fisier = AnuntFisier::findOrFail($id);

        if (!Storage::disk('public')->exists($fisier->cale)) {
            abort(404, 'Fișierul nu a fost găsit.');
        }

        $mimeTypes = [
            'pdf'  => 'application/pdf',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ];

        $mime = $mimeTypes[$fisier->tip] ?? 'application/octet-stream';

        return Storage::disk('public')->download(
            $fisier->cale,
            $fisier->nume_original,
            ['Content-Type' => $mime]
        );
    }
}
