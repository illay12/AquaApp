<?php

namespace App\Http\Controllers;

use App\Models\AnuntFisier;
use App\Models\BuletinAnaliza;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class FisierController extends Controller
{
    /**
     * Preview fișier atașat anunț (se deschide în browser)
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

        // PDF se deschide în browser, docx/xlsx se descarcă (browserul nu le poate afișa)
        if ($fisier->tip === 'pdf') {
            return response()->file(
                Storage::disk('public')->path($fisier->cale),
                ['Content-Type' => $mime, 'Content-Disposition' => 'inline; filename="' . $fisier->nume_original . '"']
            );
        }

        return Storage::disk('public')->download(
            $fisier->cale,
            $fisier->nume_original,
            ['Content-Type' => $mime]
        );
    }

    /**
     * Servire documente statice din storage/documente/{folder}
     * GET /documente/{folder}/{fisier}
     */
    public function document(string $folder, string $fisier): BinaryFileResponse
    {
        // Permite doar caractere sigure în nume
        if (!preg_match('/^[a-zA-Z0-9_\-]+$/', $folder) || !preg_match('/^[a-zA-Z0-9_\-\.]+\.pdf$/', $fisier)) {
            abort(404);
        }

        $dirBaza = realpath(storage_path('documente'));
        $cale    = realpath($dirBaza . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $fisier);

        // Verificare path traversal: fișierul trebuie să fie strict sub directorul de bază
        if ($cale === false || !str_starts_with($cale, $dirBaza . DIRECTORY_SEPARATOR)) {
            abort(404);
        }

        return response()->file($cale, [
            'Content-Type'        => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . basename($cale) . '"',
        ]);
    }

    /**
     * Preview buletin de analiză (se deschide în browser)
     * GET /fisiere/buletin/{id}/download
     */
    public function downloadBuletin(int $id)
    {
        $buletin = BuletinAnaliza::findOrFail($id);

        if (!Storage::disk('public')->exists($buletin->cale)) {
            abort(404, 'Buletinul nu a fost găsit.');
        }

        $numeAfisare = 'Buletin-Analiza-' . $buletin->luna . '-' . $buletin->an . '.pdf';

        return response()->file(
            Storage::disk('public')->path($buletin->cale),
            [
                'Content-Type'        => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $numeAfisare . '"',
            ]
        );
    }
}
