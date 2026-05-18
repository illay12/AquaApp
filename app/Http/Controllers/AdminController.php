<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Contor;
use Carbon\Carbon;

class AdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | AUTH
    |--------------------------------------------------------------------------
    */

    public function loginForm()
    {
        if (Auth::check() && Auth::user()->rol === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']], $request->boolean('remember'))) {
            if (Auth::user()->rol !== 'admin') {
                Auth::logout();
                return back()->withErrors(['username' => 'Nu aveți acces la panoul de administrare.']);
            }
            $request->session()->regenerate();
            $request->session()->save();
            return redirect()->away(url('/admin'));
        }

        return back()
            ->withInput($request->only('username'))
            ->withErrors(['username' => 'Utilizator sau parolă incorecte.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    public function dashboard()
    {
        $lunaCurenta = Carbon::now();

        $totalIndecsiLuna = Contor::whereNotNull('index_nou')
            ->whereMonth('updated_at', $lunaCurenta->month)
            ->whereYear('updated_at', $lunaCurenta->year)
            ->count();

        $totalContoare = Contor::count();

        return view('admin.dashboard', compact('totalIndecsiLuna', 'totalContoare', 'lunaCurenta'));
    }

    /*
    |--------------------------------------------------------------------------
    | EXPORT
    |--------------------------------------------------------------------------
    */

    public function exportIndecsi(Request $request)
    {
        $request->validate([
            'luna'   => 'required|integer|between:1,12',
            'an'     => 'required|integer|min:2020|max:2099',
            'format' => 'required|in:csv,xlsx',
        ]);

        $luna   = (int) $request->luna;
        $an     = (int) $request->an;
        $format = $request->format;

        $contoare = Contor::with('client')
            ->whereNotNull('index_nou')
            ->whereMonth('updated_at', $luna)
            ->whereYear('updated_at', $an)
            ->orderByDesc('updated_at')
            ->get();

        $prefix = 'indecsi_' . $an . '_' . str_pad($luna, 2, '0', STR_PAD_LEFT);

        Log::info('[AUDIT] Export indecși', [
            'luna'   => $luna,
            'an'     => $an,
            'format' => $format,
            'count'  => $contoare->count(),
            'admin'  => Auth::user()?->username ?? Auth::user()?->email,
            'ip'     => $request->ip(),
        ]);

        if ($format === 'xlsx') {
            return $this->exportXlsx($contoare, $prefix, $luna, $an);
        }

        return $this->exportCsv($contoare, $prefix);
    }

    /*
    |--------------------------------------------------------------------------
    | IMPORT CSV INDEX VECHI
    |--------------------------------------------------------------------------
    */

    public function importIndecsi(Request $request)
    {
        $request->validate([
            'fisier_csv' => 'required|file|mimes:csv,txt|max:2048',
        ], [
            'fisier_csv.required' => 'Selectați un fișier CSV.',
            'fisier_csv.mimes'    => 'Fișierul trebuie să fie de tip CSV.',
            'fisier_csv.max'      => 'Fișierul nu poate depăși 2MB.',
        ]);

        $file   = $request->file('fisier_csv');
        $handle = fopen($file->getRealPath(), 'r');

        // Detectam si sarim BOM-ul UTF-8 daca exista
        $bom = fread($handle, 3);
        if ($bom !== chr(0xEF) . chr(0xBB) . chr(0xBF)) {
            rewind($handle);
        }

        // Sarim header-ul
        // Sarim header-ul
        fgetcsv($handle, 0, ',');
        $separator = ',';

        $actualizate  = 0;
        $negasite     = [];
        $erori        = [];
        $linie        = 1;

        while (($row = fgetcsv($handle, 0, $separator)) !== false) {
            $linie++;

            if (count($row) < 2) {
                $erori[] = "Linia {$linie}: format invalid (mai puțin de 2 coloane)";
                continue;
            }

            $serie     = trim($row[0]);
            $indexNou  = trim($row[1]);

            if ($serie === '' || $indexNou === '') {
                $erori[] = "Linia {$linie}: serie sau index gol";
                continue;
            }

            if (!is_numeric($indexNou) || (int)$indexNou < 0) {
                $erori[] = "Linia {$linie}: indexul '{$indexNou}' nu este un număr valid";
                continue;
            }

            $contor = \App\Models\Contor::where('serie_contor', $serie)->first();

            if (!$contor) {
                $negasite[] = $serie;
                continue;
            }

            $contor->update([
                'index_vechi' => (int) $indexNou,
                'index_nou'   => null,
            ]);

            $actualizate++;
        }

        fclose($handle);

        $mesaj = "Import finalizat: <strong>{$actualizate}</strong> contoare actualizate.";
        if (count($negasite) > 0) {
            $mesaj .= " <strong>" . count($negasite) . "</strong> serii negăsite: " . implode(', ', array_slice($negasite, 0, 10));
            if (count($negasite) > 10) $mesaj .= '...';
        }
        if (count($erori) > 0) {
            $mesaj .= " <strong>" . count($erori) . "</strong> erori de format.";
        }

        Log::info('[AUDIT] Import indecși', [
            'fisier'     => $file->getClientOriginalName(),
            'actualizate' => $actualizate,
            'negasite'   => count($negasite),
            'erori'      => count($erori),
            'admin'      => Auth::user()?->username ?? Auth::user()?->email,
            'ip'         => $request->ip(),
        ]);

        $tip = ($actualizate > 0) ? 'success' : 'warning';

        return redirect()->route('admin.dashboard')
            ->with('import_mesaj', $mesaj)
            ->with('import_tip', $tip);
    }

    /*
    |--------------------------------------------------------------------------
    | SINCRONIZARE LUNARA CSV
    |--------------------------------------------------------------------------
    */

    public function sincronizareForm()
    {
        // Redirectam la dashboard cu ancora
        return redirect()->route('admin.dashboard')->with('scroll', 'sectiuneSincronizare');
    }

    public function sincronizare(Request $request)
    {
        $request->validate([
            'fisier_sync' => 'required|file|mimes:csv,txt|max:10240',
        ], [
            'fisier_sync.required' => 'Selectati un fisier CSV.',
            'fisier_sync.mimes'    => 'Fisierul trebuie sa fie de tip CSV.',
            'fisier_sync.max'      => 'Fisierul nu poate depasi 10MB.',
        ]);

        $file = $request->file('fisier_sync');

        // ── Detectam encoding ──────────────────────────────────────────
        $continutFisier = file_get_contents($file->getRealPath());
        $encoding = mb_detect_encoding($continutFisier, ['UTF-8', 'Windows-1252', 'ISO-8859-2', 'ISO-8859-1'], true);
        $esteUtf8 = ($encoding === 'UTF-8');
        unset($continutFisier); // eliberam memoria

        $handle = fopen($file->getRealPath(), 'r');

        // Sarim BOM UTF-8
        $bom = fread($handle, 3);
        if ($bom !== chr(0xEF) . chr(0xBB) . chr(0xBF)) {
            rewind($handle);
        }

        // Citim si validam headerul
        $header = fgetcsv($handle, 0, ',');
        if (!$header) {
            fclose($handle);
            return back()->withErrors(['fisier_sync' => 'Fisierul este gol sau invalid.']);
        }

        $header = array_map(fn($h) => strtolower(trim($h)), $header);
        $obligatorii = ['serie_contor', 'index_vechi', 'adresa', 'cod_client', 'nume'];
        $lipsa = array_diff($obligatorii, $header);
        if (!empty($lipsa)) {
            fclose($handle);
            return back()->withErrors(['fisier_sync' => 'Coloane lipsa: ' . implode(', ', $lipsa)]);
        }

        $idx = array_flip($header);

        // ── Parsam CSV in memorie ──────────────────────────────────────
        $clientiBulk  = [];
        $contoareBulk = [];
        $erori        = [];
        $duplicate    = [];
        $linie        = 1;
        $now          = now()->toDateTimeString();

        while (($row = fgetcsv($handle, 0, ',')) !== false) {
            $linie++;

            if (count($row) < count($obligatorii)) {
                $erori[] = "Linia {$linie}: numar insuficient de coloane";
                continue;
            }

            $conv = fn($s) => $esteUtf8 ? trim($s) : mb_convert_encoding(trim($s), 'UTF-8', $encoding ?? 'Windows-1252');

            // Normalizam seria: daca Excel a exportat un numar lung ca "1.0014E+11",
            // il convertim inapoi la intreg ("100140000000") pentru consistenta
            $serieRaw = $conv($row[$idx['serie_contor']]);
            if (is_numeric($serieRaw) && stripos($serieRaw, 'E') !== false) {
                $serieRaw = number_format((float)$serieRaw, 0, '.', '');
            }
            $serie = strtoupper(trim($serieRaw));
            $indexVechi = trim($row[$idx['index_vechi']]);
            $adresa     = $conv($row[$idx['adresa']]);
            $codClient  = strtoupper($conv($row[$idx['cod_client']]));
            $nume       = $conv($row[$idx['nume']]);

            if ($serie === '' || $codClient === '') {
                $erori[] = "Linia {$linie}: serie_contor sau cod_client gol";
                continue;
            }

            if ($indexVechi !== '' && (!is_numeric($indexVechi) || (int)$indexVechi < 0)) {
                $erori[] = "Linia {$linie}: index_vechi '{$indexVechi}' invalid";
                continue;
            }

            $clientiBulk[$codClient] = [
                'cod_client'  => $codClient,
                'nume'        => $nume,
                'created_at'  => $now,
                'updated_at'  => $now,
            ];

            if (isset($contoareBulk[$serie])) {
                $duplicate[$serie] = ($duplicate[$serie] ?? 1) + 1;
            }

            $contoareBulk[$serie] = [
                'serie_contor' => $serie,
                'cod_client'   => $codClient,
                'adresa'       => $adresa,
                'index_vechi'  => $indexVechi !== '' ? (int)$indexVechi : 0,
                'index_nou'    => null,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }

        fclose($handle);

        // ── Toate operatiunile DB intr-o singura tranzactie ────────────
        // Pe SQLite aceasta optimizare reduce timpul de la minute la secunde
        // deoarece SQLite face fsync dupa fiecare statement fara tranzactie.
        $chunkSize           = 500;
        $clientiNoi          = 0;
        $clientiStersi       = 0;
        $contoareNoi         = 0;
        $contoareActualizate = 0;
        $contoareSterse      = 0;
        $seriiSterse         = [];
        $seriiDinFisier      = array_keys($contoareBulk);

        \Illuminate\Support\Facades\DB::transaction(function () use (
            $clientiBulk, $contoareBulk, $seriiDinFisier, $chunkSize,
            &$clientiNoi, &$clientiStersi, &$contoareNoi, &$contoareActualizate,
            &$contoareSterse, &$seriiSterse
        ) {
            // 1. Clienti noi
            foreach (array_chunk(array_values($clientiBulk), $chunkSize) as $chunk) {
                $clientiNoi += \Illuminate\Support\Facades\DB::table('clienti')->insertOrIgnore($chunk);
            }

            // 2. Citim TOATE seriile existente o singura data
            //    Folosim acest rezultat atat pentru numarat noi/actualizate cat si pentru stergere
            $seriiExistenteFlipped = \Illuminate\Support\Facades\DB::table('contoare')
                ->pluck('serie_contor')
                ->flip()
                ->all();

            // 3. Numaram noi vs actualizate (O(n) cu array_flip)
            $seriiDinFisierFlipped = array_flip($seriiDinFisier);
            foreach ($seriiDinFisier as $serie) {
                if (isset($seriiExistenteFlipped[$serie])) {
                    $contoareActualizate++;
                } else {
                    $contoareNoi++;
                }
            }

            // 4. Upsert contoare (insert + update intr-un singur query per chunk)
            foreach (array_chunk(array_values($contoareBulk), $chunkSize) as $chunk) {
                \Illuminate\Support\Facades\DB::table('contoare')->upsert(
                    $chunk,
                    ['serie_contor'],
                    ['index_vechi', 'index_nou', 'adresa', 'cod_client', 'updated_at']
                );
            }

            // 5. Stergem contoarele absente — calculam diferenta in PHP (fara NOT IN)
            //    Evitam limita SQLite de 999 variabile si query suplimentar
            foreach (array_keys($seriiExistenteFlipped) as $serie) {
                if (!isset($seriiDinFisierFlipped[$serie])) {
                    $seriiSterse[] = $serie;
                }
            }
            $contoareSterse = count($seriiSterse);

            if ($contoareSterse > 0) {
                // Retinem cod_client al contoarelor ce urmeaza sa fie sterse
                $codClientiAfectati = [];
                foreach (array_chunk($seriiSterse, $chunkSize) as $chunk) {
                    $coduri = \Illuminate\Support\Facades\DB::table('contoare')
                        ->whereIn('serie_contor', $chunk)
                        ->pluck('cod_client')
                        ->toArray();
                    $codClientiAfectati = array_merge($codClientiAfectati, $coduri);
                }
                $codClientiAfectati = array_unique($codClientiAfectati);

                // Stergem contoarele
                foreach (array_chunk($seriiSterse, $chunkSize) as $chunk) {
                    \Illuminate\Support\Facades\DB::table('contoare')->whereIn('serie_contor', $chunk)->delete();
                }

                // Stergem clientii care nu mai au niciun contor asociat
                if (!empty($codClientiAfectati)) {
                    foreach (array_chunk($codClientiAfectati, $chunkSize) as $chunk) {
                        $clientiStersi += \Illuminate\Support\Facades\DB::table('clienti')
                            ->whereIn('cod_client', $chunk)
                            ->whereNotExists(function ($q) {
                                $q->select(\Illuminate\Support\Facades\DB::raw(1))
                                  ->from('contoare')
                                  ->whereColumn('contoare.cod_client', 'clienti.cod_client');
                            })
                            ->delete();
                    }
                }
            }
        });

        $totalDuplicate = array_sum($duplicate) - count($duplicate);

        // Adaugam duplicatele in log-ul de erori
        foreach ($duplicate as $serie => $count) {
            $erori[] = "Serie duplicata in fisier: '{$serie}' apare de {$count} ori — s-a importat ultima aparitie";
        }

        $mesaj  = "Sincronizare finalizata: ";
        $mesaj .= "<strong>{$contoareNoi}</strong> contoare noi adaugate, ";
        $mesaj .= "<strong>{$contoareActualizate}</strong> contoare actualizate, ";
        $mesaj .= "<strong>{$clientiNoi}</strong> clienti noi adaugati";
        $mesaj .= $contoareSterse > 0 ? ", <strong>{$contoareSterse}</strong> contoare scoase din uz sterse" : "";
        $mesaj .= $clientiStersi > 0 ? ", <strong>{$clientiStersi}</strong> clienti fara contoare stersi" : "";
        $mesaj .= ".";
        if ($totalDuplicate > 0) {
            $mesaj .= " <strong>{$totalDuplicate}</strong> randuri duplicate — s-a pastrat ultima aparitie.";
        }
        if (count($erori) > 0) {
            $mesaj .= " <strong>" . count($erori) . "</strong> erori de format.";
        }

        $tip = (($contoareNoi + $contoareActualizate) > 0) ? 'success' : 'warning';

        return redirect()->route('admin.dashboard')
            ->with('sync_mesaj', $mesaj)
            ->with('sync_tip', $tip)
            ->with('sync_erori', $erori)
            ->with('sync_sterse', $seriiSterse)
            ->with('sync_stats', [
                'noi'            => $contoareNoi,
                'actualizate'    => $contoareActualizate,
                'sterse'         => $contoareSterse,
                'clienti_noi'    => $clientiNoi,
                'clienti_stersi' => $clientiStersi,
                'duplicate'      => $totalDuplicate,
                'erori'          => count($erori),
            ]);
    }

    /*
    |--------------------------------------------------------------------------
    | COMPARARE EXPORTURI
    |--------------------------------------------------------------------------
    */

    public function comparaExporturi(Request $request)
    {
        $request->validate([
            'fisier_sync'   => 'required|file|mimes:csv,txt|max:10240',
            'fisier_export' => 'required|file|mimes:csv,txt|max:10240',
            'format'        => 'required|in:csv,xlsx',
        ], [
            'fisier_sync.required'   => 'Selectati fisierul de sincronizare lunara.',
            'fisier_export.required' => 'Selectati fisierul export din dashboard.',
        ]);

        // Fisier 1 - sincronizare lunara: serie_contor, INDEX_VECHI, adresa, COD_CLIENT, NUME
        $dateSync = $this->parseazaFisierSync($request->file('fisier_sync'));

        // Fisier 2 - export dashboard: Cod Client, Nume, Telefon, Email, Serie Contor, Adresa Contor, Index Vechi, Index Nou, Data Trimiterii
        $dateExport = $this->parseazaFisierExport($request->file('fisier_export'));

        // Gasim contorii unde index_vechi difera intre fisierul de sync si exportul din dashboard
        $diferente = [];

        foreach ($dateSync as $serie => $sync) {
            if (isset($dateExport[$serie])) {
                $exp = $dateExport[$serie];
                if ((int)$sync['index_vechi'] !== (int)$exp['index_nou']) {
                    $diferente[] = [
                        'cod_client'        => $exp['cod_client'],
                        'nume'              => $exp['nume'],
                        'email'             => $exp['email'],
                        'telefon'           => $exp['telefon'],
                        'serie_contor'      => $serie,
                        'adresa'            => $exp['adresa'],
                        'index_vechi_sync'  => $sync['index_vechi'],
                        'index_nou_export'  => $exp['index_nou'],
                        'index_vechi_export'=> $exp['index_vechi'],
                        'data_trimiterii'   => $exp['data'],
                    ];
                }
            }
        }

        $prefix = 'diferente_index_vechi_' . now()->format('Y_m_d_His');

        if ($request->format === 'xlsx') {
            return $this->exportDiferenteXlsx($diferente, $prefix,
                $request->file('fisier_sync')->getClientOriginalName(),
                $request->file('fisier_export')->getClientOriginalName()
            );
        }

        return $this->exportDiferenteCsv($diferente, $prefix);
    }

    private function parseazaFisierSync($file): array
    {
        $continut = file_get_contents($file->getRealPath());
        $encoding = mb_detect_encoding($continut, ['UTF-8', 'Windows-1252', 'ISO-8859-2', 'ISO-8859-1'], true);
        $esteUtf8 = ($encoding === 'UTF-8');
        $conv     = fn($s) => $esteUtf8 ? trim($s) : mb_convert_encoding(trim($s), 'UTF-8', $encoding ?? 'Windows-1252');

        $handle = fopen($file->getRealPath(), 'r');
        $bom = fread($handle, 3);
        if ($bom !== chr(0xEF) . chr(0xBB) . chr(0xBF)) {
            rewind($handle);
        }

        // Citim headerul si normalizam (lowercase)
        $header = fgetcsv($handle, 0, ',');
        $header = array_map(fn($h) => strtolower(trim($h)), $header);
        $idx    = array_flip($header);

        $date = [];
        while (($row = fgetcsv($handle, 0, ',')) !== false) {
            if (count($row) < 2) continue;
            $serie = strtoupper($conv($row[$idx['serie_contor'] ?? 0]));
            if ($serie === '') continue;
            $date[$serie] = [
                'index_vechi' => trim($row[$idx['index_vechi'] ?? 1]),
                'adresa'      => $conv($row[$idx['adresa'] ?? 2] ?? ''),
                'cod_client'  => strtoupper($conv($row[$idx['cod_client'] ?? 3] ?? '')),
                'nume'        => $conv($row[$idx['nume'] ?? 4] ?? ''),
            ];
        }

        fclose($handle);
        return $date;
    }

    private function parseazaFisierExport($file): array
    {
        $handle = fopen($file->getRealPath(), 'r');

        // BOM
        $bom = fread($handle, 3);
        if ($bom !== chr(0xEF) . chr(0xBB) . chr(0xBF)) {
            rewind($handle);
        }

        // Header fix: Cod Client,Nume,Telefon,Email,Serie Contor,Adresa Contor,Index Vechi,Index Nou,Data Trimiterii
        fgetcsv($handle, 0, ',');

        $date = [];
        while (($row = fgetcsv($handle, 0, ',')) !== false) {
            if (count($row) < 9) continue;
            $serie = trim($row[4]); // Serie Contor = coloana 5
            if ($serie === '') continue;
            $date[$serie] = [
                'cod_client'  => trim($row[0]),
                'nume'        => trim($row[1]),
                'telefon'     => trim($row[2]),
                'email'       => trim($row[3]),
                'adresa'      => trim($row[5]),
                'index_vechi' => trim($row[6]),
                'index_nou'   => trim($row[7]),
                'data'        => trim($row[8]),
            ];
        }

        fclose($handle);
        return $date;
    }

    private function exportDiferenteCsv(array $diferente, string $prefix)
    {
        $headers = [
            'Content-Type'        => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $prefix . '.csv"',
            'Pragma'              => 'no-cache',
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Expires'             => '0',
        ];

        $callback = function () use ($diferente) {
            $handle = fopen('php://output', 'w');
            fprintf($handle, chr(0xEF) . chr(0xBB) . chr(0xBF));

            fputcsv($handle, [
                'Cod Client', 'Nume', 'Email', 'Telefon',
                'Serie Contor', 'Adresa',
                'Index (online)', 'Index (citire)',
            ], ',');

            foreach ($diferente as $r) {
                fputcsv($handle, [
                    $r['cod_client'], $r['nume'], $r['email'], $r['telefon'],
                    $r['serie_contor'], $r['adresa'],
                    $r['index_nou_export'], $r['index_vechi_sync'],
                ], ',');
            }

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }

    private function exportDiferenteXlsx(array $diferente, string $prefix, string $numeFisier1, string $numeFisier2)
    {
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Diferente');

        $styleHeader = [
            'font'      => ['bold' => true, 'color' => ['argb' => 'FFFFFFFF'], 'size' => 11],
            'fill'      => ['fillType' => 'solid', 'startColor' => ['argb' => 'FF0077B6']],
            'alignment' => ['horizontal' => 'center', 'vertical' => 'center'],
            'borders'   => ['allBorders' => ['borderStyle' => 'thin', 'color' => ['argb' => 'FFB0D4E8']]],
        ];

        $headers = [
            'A1' => 'Cod Client',
            'B1' => 'Nume',
            'C1' => 'Email',
            'D1' => 'Telefon',
            'E1' => 'Serie Contor',
            'F1' => 'Adresa',
            'G1' => 'Index (online)',
            'H1' => 'Index (citire)',
        ];

        foreach ($headers as $cell => $label) {
            $sheet->setCellValue($cell, $label);
            $sheet->getStyle($cell)->applyFromArray($styleHeader);
        }
        $sheet->getRowDimension(1)->setRowHeight(22);

        $styleData = ['borders' => ['allBorders' => ['borderStyle' => 'thin', 'color' => ['argb' => 'FFE2E8F0']]], 'font' => ['size' => 10]];
        $styleAlt  = array_merge($styleData, ['fill' => ['fillType' => 'solid', 'startColor' => ['argb' => 'FFFFF3CD']]]);

        $row = 2;
        foreach ($diferente as $r) {
            $sheet->setCellValue('A' . $row, $r['cod_client']);
            $sheet->setCellValue('B' . $row, $r['nume']);
            $sheet->setCellValue('C' . $row, $r['email']);
            $sheet->setCellValue('D' . $row, $r['telefon']);
            $sheet->setCellValue('E' . $row, $r['serie_contor']);
            $sheet->setCellValue('F' . $row, $r['adresa']);
            $sheet->setCellValue('G' . $row, $r['index_nou_export'] !== '' ? (int) $r['index_nou_export'] : '');
            $sheet->setCellValue('H' . $row, (int) $r['index_vechi_sync']);
            $sheet->getStyle('A' . $row . ':H' . $row)->applyFromArray($row % 2 === 0 ? $styleAlt : $styleData);
            $row++;
        }

        $latimi = ['A'=>14,'B'=>26,'C'=>28,'D'=>16,'E'=>18,'F'=>32,'G'=>18,'H'=>18];
        foreach ($latimi as $col => $w) {
            $sheet->getColumnDimension($col)->setWidth($w);
        }

        $sheet->setCellValue('A' . $row, 'TOTAL diferente: ' . count($diferente));
        $sheet->getStyle('A' . $row . ':H' . $row)->applyFromArray([
            'font' => ['bold' => true],
            'fill' => ['fillType' => 'solid', 'startColor' => ['argb' => 'FFDBEAFE']],
        ]);
        $sheet->mergeCells('A' . $row . ':H' . $row);
        $sheet->freezePane('A2');

        $writer   = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $tempFile = tempnam(sys_get_temp_dir(), 'xlsx_');
        $writer->save($tempFile);

        return response()->download($tempFile, $prefix . '.xlsx', [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ])->deleteFileAfterSend(true);
    }

    private function exportCsv($contoare, string $prefix)
    {
        $headers = [
            'Content-Type'        => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $prefix . '.csv"',
            'Pragma'              => 'no-cache',
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Expires'             => '0',
        ];

        $callback = function () use ($contoare) {
            $handle = fopen('php://output', 'w');
            fprintf($handle, chr(0xEF) . chr(0xBB) . chr(0xBF));

            fputcsv($handle, [
                'Cod Client', 'Nume', 'Telefon', 'Email',
                'Serie Contor', 'Adresa Contor',
                'Index Vechi (m³)', 'Index Nou (m³)', 'Data Trimiterii',
            ], ',');

            foreach ($contoare as $contor) {
                $telefon = $contor->client->telefon ?? null;
                if ($telefon && $telefon !== '-') {
                    $telefon = '0' . ltrim($telefon, '0');
                } else {
                    $telefon = $telefon ?? '-';
                }

                fputcsv($handle, [
                    $contor->cod_client,
                    $contor->client->nume ?? '-',
                    $telefon,
                    $contor->client->email   ?? '-',
                    $contor->serie_contor,
                    $contor->adresa,
                    $contor->index_vechi,
                    $contor->index_nou,
                    $contor->updated_at->format('d.m.Y H:i'),
                ], ',');
            }

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }

    private function exportXlsx($contoare, string $prefix, int $luna, int $an)
    {
        $numeLuna = Carbon::createFromDate($an, $luna, 1)->locale('ro')->isoFormat('MMMM YYYY');

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Indecsi ' . $numeLuna);

        $styleHeader = [
            'font'      => ['bold' => true, 'color' => ['argb' => 'FFFFFFFF'], 'size' => 11],
            'fill'      => ['fillType' => 'solid', 'startColor' => ['argb' => 'FF0077B6']],
            'alignment' => ['horizontal' => 'center', 'vertical' => 'center'],
            'borders'   => ['allBorders' => ['borderStyle' => 'thin', 'color' => ['argb' => 'FFB0D4E8']]],
        ];

        $headers = [
            'A1' => 'Cod Client',
            'B1' => 'Nume',
            'C1' => 'Telefon',
            'D1' => 'Email',
            'E1' => 'Serie Contor',
            'F1' => 'Adresa Contor',
            'G1' => 'Index Vechi (m3)',
            'H1' => 'Index Nou (m3)',
            'I1' => 'Data Trimiterii',
        ];

        foreach ($headers as $cell => $label) {
            $sheet->setCellValue($cell, $label);
            $sheet->getStyle($cell)->applyFromArray($styleHeader);
        }
        $sheet->getRowDimension(1)->setRowHeight(22);

        $styleData = [
            'borders' => ['allBorders' => ['borderStyle' => 'thin', 'color' => ['argb' => 'FFE2E8F0']]],
            'font'    => ['size' => 10],
        ];
        $styleAlt = array_merge($styleData, [
            'fill' => ['fillType' => 'solid', 'startColor' => ['argb' => 'FFF0F9FF']],
        ]);

        $row = 2;
        foreach ($contoare as $contor) {
            $telefon = $contor->client->telefon ?? null;
            if ($telefon && $telefon !== '-') {
                $telefon = '0' . ltrim($telefon, '0');
            } else {
                $telefon = $telefon ?? '-';
            }

            $sheet->setCellValue('A' . $row, $contor->cod_client);
            $sheet->setCellValue('B' . $row, $contor->client->nume ?? '-');
            $sheet->setCellValueExplicit('C' . $row, $telefon, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('D' . $row, $contor->client->email   ?? '-');
            $sheet->setCellValue('E' . $row, $contor->serie_contor);
            $sheet->setCellValue('F' . $row, $contor->adresa);
            $sheet->setCellValue('G' . $row, (int) $contor->index_vechi);
            $sheet->setCellValue('H' . $row, (int) $contor->index_nou);
            $sheet->setCellValue('I' . $row, $contor->updated_at->format('d.m.Y H:i'));

            $stil = ($row % 2 === 0) ? $styleAlt : $styleData;
            $sheet->getStyle('A' . $row . ':I' . $row)->applyFromArray($stil);
            $row++;
        }

        $latimi = ['A'=>14,'B'=>22,'C'=>16,'D'=>28,'E'=>18,'F'=>30,'G'=>16,'H'=>14,'I'=>18];
        foreach ($latimi as $col => $w) {
            $sheet->getColumnDimension($col)->setWidth($w);
        }

        $sheet->setCellValue('A' . $row, 'TOTAL: ' . $contoare->count() . ' contoare');
        $sheet->getStyle('A' . $row . ':I' . $row)->applyFromArray([
            'font' => ['bold' => true, 'size' => 10],
            'fill' => ['fillType' => 'solid', 'startColor' => ['argb' => 'FFDBEAFE']],
        ]);
        $sheet->mergeCells('A' . $row . ':I' . $row);
        $sheet->freezePane('A2');

        $writer   = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $tempFile = tempnam(sys_get_temp_dir(), 'xlsx_');
        $writer->save($tempFile);

        return response()->download($tempFile, $prefix . '.xlsx', [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ])->deleteFileAfterSend(true);
    }
}