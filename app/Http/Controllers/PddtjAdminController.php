<?php

namespace App\Http\Controllers;

use App\Models\ComunicatPddtj;
use Illuminate\Http\Request;

class PddtjAdminController extends Controller
{
    // Contractele pentru care se poate încărca galerie foto (cod => titlu)
    public const CONTRACTE_GALERIE = [
        'CL-1'  => 'Reabilitarea captărilor din Tulcea și Mahmudia',
        'CL-4'  => 'Extindere și reabilitare captări, tratare și înmagazinare — Carcaliu și Babadag',
        'CL-8'  => 'Stație nouă de epurare Chilia Veche · extindere stație Sulina',
        'CL-10' => 'Extindere și reabilitare alimentare cu apă și canalizare — Tulcea (zona centrală)',
        'CL5'   => 'Extindere și reabilitare captări, tratare și înmagazinare — Sulina, Crișan, Mila 23',
    ];

    private function comunicareBasePath(): string
    {
        return storage_path('app/public/documente/pddtj');
    }

    private function galerieBasePath(): string
    {
        return storage_path('app/public/galerie/pddtj');
    }

    private function numeFisierSigur(string $numeOriginal): string
    {
        $numeSigur = preg_replace('/[^\w\-\.]/', '-', $numeOriginal);
        return preg_replace('/-+/', '-', $numeSigur);
    }

    /** Găsește un nume de fișier disponibil (fără suprascriere) în folderul dat */
    private function numeDisponibil(string $folder, string $numeSigur): string
    {
        $caleFinala = $folder . DIRECTORY_SEPARATOR . $numeSigur;
        if (!file_exists($caleFinala)) {
            return $numeSigur;
        }

        $base = pathinfo($numeSigur, PATHINFO_FILENAME);
        $ext  = pathinfo($numeSigur, PATHINFO_EXTENSION);
        return $base . '-' . time() . '.' . $ext;
    }

    private function citestePoze(string $cod): array
    {
        $cale = $this->galerieBasePath() . DIRECTORY_SEPARATOR . $cod;
        if (!is_dir($cale)) return [];

        $poze = [];
        foreach (scandir($cale) as $f) {
            if ($f === '.' || $f === '..') continue;
            if (!in_array(strtolower(pathinfo($f, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'webp'])) continue;
            $poze[] = $f;
        }
        sort($poze);
        return $poze;
    }

    /*
    |--------------------------------------------------------------------------
    | PAGINA PRINCIPALA
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $comunicate = ComunicatPddtj::orderByDesc('data')->get();

        $galerii = [];
        foreach (self::CONTRACTE_GALERIE as $cod => $titlu) {
            $galerii[$cod] = [
                'titlu' => $titlu,
                'poze'  => $this->citestePoze($cod),
            ];
        }

        return view('admin.pddtj', compact('comunicate', 'galerii'));
    }

    /*
    |--------------------------------------------------------------------------
    | COMUNICARE (comunicate de presă — bază de date + PDF pe disc)
    |--------------------------------------------------------------------------
    */

    public function storeComunicat(Request $request)
    {
        $request->validate([
            'data'   => 'required|date',
            'titlu'  => 'required|string|max:500',
            'fisier' => 'required|file|mimes:pdf|max:20480',
        ], [
            'fisier.mimes' => 'Doar fișiere PDF sunt acceptate.',
            'fisier.max'   => 'Fișierul nu poate depăși 20 MB.',
        ]);

        $file = $request->file('fisier');
        $dest = $this->comunicareBasePath();
        if (!is_dir($dest)) mkdir($dest, 0755, true);

        $numeSigur = $this->numeDisponibil($dest, $this->numeFisierSigur($file->getClientOriginalName()));
        $file->move($dest, $numeSigur);

        ComunicatPddtj::create([
            'data'   => $request->input('data'),
            'titlu'  => $request->input('titlu'),
            'fisier' => $numeSigur,
        ]);

        return redirect()->route('admin.pddtj.index')->with('success', 'Comunicatul a fost adăugat cu succes.');
    }

    public function updateComunicat(Request $request, int $id)
    {
        $comunicat = ComunicatPddtj::findOrFail($id);

        $request->validate([
            'data'   => 'required|date',
            'titlu'  => 'required|string|max:500',
            'fisier' => 'nullable|file|mimes:pdf|max:20480',
        ], [
            'fisier.mimes' => 'Doar fișiere PDF sunt acceptate.',
            'fisier.max'   => 'Fișierul nu poate depăși 20 MB.',
        ]);

        $comunicat->data  = $request->input('data');
        $comunicat->titlu = $request->input('titlu');

        if ($request->hasFile('fisier')) {
            $vechiul = $this->comunicareBasePath() . DIRECTORY_SEPARATOR . $comunicat->fisier;
            if (file_exists($vechiul)) unlink($vechiul);

            $file = $request->file('fisier');
            $dest = $this->comunicareBasePath();
            if (!is_dir($dest)) mkdir($dest, 0755, true);

            $numeSigur = $this->numeDisponibil($dest, $this->numeFisierSigur($file->getClientOriginalName()));
            $file->move($dest, $numeSigur);
            $comunicat->fisier = $numeSigur;
        }

        $comunicat->save();

        return redirect()->route('admin.pddtj.index')->with('success', 'Comunicatul a fost actualizat cu succes.');
    }

    public function destroyComunicat(int $id)
    {
        $comunicat = ComunicatPddtj::findOrFail($id);

        $cale = $this->comunicareBasePath() . DIRECTORY_SEPARATOR . $comunicat->fisier;
        if (file_exists($cale)) unlink($cale);

        $comunicat->delete();

        return redirect()->route('admin.pddtj.index')->with('success', 'Comunicatul a fost șters cu succes.');
    }

    /*
    |--------------------------------------------------------------------------
    | GALERIE (poze pe contract — direct pe disc, fără bază de date)
    |--------------------------------------------------------------------------
    */

    public function uploadPoza(Request $request)
    {
        $request->validate([
            'cod'  => ['required', 'string', function ($attr, $val, $fail) {
                if (!array_key_exists($val, self::CONTRACTE_GALERIE)) $fail('Contract invalid.');
            }],
            'poza' => 'required|image|max:8192',
        ], [
            'poza.image' => 'Fișierul trebuie să fie o imagine (jpg, png, webp).',
            'poza.max'   => 'Imaginea nu poate depăși 8 MB.',
        ]);

        $cod  = $request->input('cod');
        $file = $request->file('poza');

        $dest = $this->galerieBasePath() . DIRECTORY_SEPARATOR . $cod;
        if (!is_dir($dest)) mkdir($dest, 0755, true);

        $numeSigur = $this->numeDisponibil($dest, $this->numeFisierSigur($file->getClientOriginalName()));
        $file->move($dest, $numeSigur);

        return redirect()->route('admin.pddtj.index')->with('success', 'Fotografia a fost încărcată cu succes.');
    }

    public function stergePoza(Request $request)
    {
        $request->validate([
            'cod'    => ['required', 'string', function ($attr, $val, $fail) {
                if (!array_key_exists($val, self::CONTRACTE_GALERIE)) $fail('Contract invalid.');
            }],
            'fisier' => 'required|string|max:255',
        ]);

        $cod    = $request->input('cod');
        $fisier = basename($request->input('fisier'));

        if (!preg_match('/^[\w\-\. ]+\.(jpg|jpeg|png|webp)$/i', $fisier)) {
            return back()->with('error', 'Nume de fișier invalid.');
        }

        $cale = $this->galerieBasePath() . DIRECTORY_SEPARATOR . $cod . DIRECTORY_SEPARATOR . $fisier;

        $realBase = realpath($this->galerieBasePath());
        $realFile = realpath($cale);

        if (!$realFile || !$realBase || !str_starts_with($realFile, $realBase)) {
            return back()->with('error', 'Acces interzis.');
        }

        unlink($cale);

        return redirect()->route('admin.pddtj.index')->with('success', 'Fotografia a fost ștearsă cu succes.');
    }
}
