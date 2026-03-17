<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumenteAdminController extends Controller
{
    // Folderele permise și label-urile lor
    private const FOLDERS = [
        'aga'              => 'Hotărâri AGA',
        'bilant contabil'  => 'Bilanț Contabil',
        'bugete'           => 'Buget de Venituri și Cheltuieli',
        'raportari ca'     => 'Raportări Consiliu Administrație',
    ];

    private function basePath(): string
    {
        return storage_path('app/public/documente');
    }

    /** Citește fișierele dintr-un folder, grupate pe ani descrescător */
    private function citesteDocumente(string $folder): array
    {
        $cale = $this->basePath() . DIRECTORY_SEPARATOR . $folder;
        if (!is_dir($cale)) return [];

        $ani = [];
        foreach (scandir($cale) as $an) {
            if ($an === '.' || $an === '..') continue;
            $calean = $cale . DIRECTORY_SEPARATOR . $an;
            if (!is_dir($calean) || !preg_match('/^\d{4}$/', $an)) continue;

            $fisiere = [];
            foreach (scandir($calean) as $f) {
                if ($f === '.' || $f === '..') continue;
                if (strtolower(pathinfo($f, PATHINFO_EXTENSION)) !== 'pdf') continue;
                $fisiere[] = $f;
            }
            sort($fisiere);
            $ani[(int)$an] = $fisiere;
        }

        krsort($ani); // descrescător după an
        return $ani;
    }

    public function index()
    {
        $documente = [];
        foreach (array_keys(self::FOLDERS) as $folder) {
            $documente[$folder] = $this->citesteDocumente($folder);
        }

        return view('admin.documente', [
            'documente' => $documente,
            'folders'   => self::FOLDERS,
        ]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'folder' => ['required', 'string', function ($attr, $val, $fail) {
                if (!array_key_exists($val, self::FOLDERS)) $fail('Folder invalid.');
            }],
            'an'     => 'required|digits:4|integer|min:2000|max:2099',
            'fisier' => 'required|file|mimes:pdf|max:20480',
        ], [
            'fisier.mimes' => 'Doar fișiere PDF sunt acceptate.',
            'fisier.max'   => 'Fișierul nu poate depăși 20 MB.',
            'an.digits'    => 'Anul trebuie să aibă exact 4 cifre.',
        ]);

        $folder = $request->input('folder');
        $an     = $request->input('an');
        $file   = $request->file('fisier');

        $numeOriginal = $file->getClientOriginalName();

        // Sanitizare nume fișier
        $numeSigur = preg_replace('/[^\w\-\.]/', '-', $numeOriginal);
        $numeSigur = preg_replace('/-+/', '-', $numeSigur);

        $dest = $this->basePath() . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $an;
        if (!is_dir($dest)) {
            mkdir($dest, 0755, true);
        }

        // Evitam suprascriere
        $caleFinala = $dest . DIRECTORY_SEPARATOR . $numeSigur;
        if (file_exists($caleFinala)) {
            $base = pathinfo($numeSigur, PATHINFO_FILENAME);
            $ext  = pathinfo($numeSigur, PATHINFO_EXTENSION);
            $numeSigur = $base . '-' . time() . '.' . $ext;
            $caleFinala = $dest . DIRECTORY_SEPARATOR . $numeSigur;
        }

        $file->move($dest, $numeSigur);

        return redirect()->route('admin.documente.index')
            ->with('success', "Fisierul \"{$numeSigur}\" a fost incarcat in {$folder}/{$an}.");
    }

    public function sterge(Request $request)
    {
        $request->validate([
            'folder' => ['required', 'string', function ($attr, $val, $fail) {
                if (!array_key_exists($val, self::FOLDERS)) $fail('Folder invalid.');
            }],
            'an'     => 'required|digits:4|integer|min:2000|max:2099',
            'fisier' => 'required|string|max:255',
        ]);

        $folder = $request->input('folder');
        $an     = $request->input('an');
        $fisier = basename($request->input('fisier')); // basename previne path traversal

        if (!preg_match('/^[\w\-\. ]+\.pdf$/i', $fisier)) {
            return back()->with('error', 'Nume de fișier invalid.');
        }

        $cale = $this->basePath() . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $an . DIRECTORY_SEPARATOR . $fisier;

        // Verificam ca fișierul e în interiorul directorului permis
        $realBase = realpath($this->basePath());
        $realFile = realpath($cale);

        if (!$realFile || !str_starts_with($realFile, $realBase)) {
            return back()->with('error', 'Acces interzis.');
        }

        unlink($cale);

        // Sterge folderul de an dacă e gol
        $dirAn = dirname($cale);
        if (is_dir($dirAn) && count(array_diff(scandir($dirAn), ['.', '..'])) === 0) {
            rmdir($dirAn);
        }

        return redirect()->route('admin.documente.index')
            ->with('success', "Fisierul \"{$fisier}\" a fost sters.");
    }
}
