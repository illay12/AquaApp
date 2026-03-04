<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            ->get();

        $prefix = 'indecsi_' . $an . '_' . str_pad($luna, 2, '0', STR_PAD_LEFT);

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

        $tip = ($actualizate > 0) ? 'success' : 'warning';

        return redirect()->route('admin.dashboard')
            ->with('import_mesaj', $mesaj)
            ->with('import_tip', $tip);
    }

    /*
    |--------------------------------------------------------------------------
    | COMPARARE EXPORTURI
    |--------------------------------------------------------------------------
    */

    public function comparaExporturi(Request $request)
    {
        $request->validate([
            'fisier_1' => 'required|file|mimes:csv,txt|max:5120',
            'fisier_2' => 'required|file|mimes:csv,txt|max:5120',
            'format'   => 'required|in:csv,xlsx',
        ], [
            'fisier_1.required' => 'Selectați primul fișier.',
            'fisier_2.required' => 'Selectați al doilea fișier.',
        ]);

        $date1 = $this->parseazaExport($request->file('fisier_1'));
        $date2 = $this->parseazaExport($request->file('fisier_2'));

        // Gasim contorii unde index_nou difera intre cele 2 exporturi
        $diferente = [];

        foreach ($date1 as $serie => $rand1) {
            if (isset($date2[$serie])) {
                $rand2 = $date2[$serie];
                if ((int)$rand1['index_nou'] !== (int)$rand2['index_nou']) {
                    $diferente[] = [
                        'cod_client'   => $rand1['cod_client'],
                        'nume'         => $rand1['nume'],
                        'telefon'      => $rand1['telefon'],
                        'email'        => $rand1['email'],
                        'serie_contor' => $serie,
                        'adresa'       => $rand1['adresa'],
                        'index_nou_1'  => $rand1['index_nou'],
                        'index_nou_2'  => $rand2['index_nou'],
                        'data_1'       => $rand1['data'],
                        'data_2'       => $rand2['data'],
                    ];
                }
            }
        }

        $prefix = 'diferente_' . now()->format('Y_m_d_His');

        if ($request->format === 'xlsx') {
            return $this->exportDiferenteXlsx($diferente, $prefix,
                $request->file('fisier_1')->getClientOriginalName(),
                $request->file('fisier_2')->getClientOriginalName()
            );
        }

        return $this->exportDiferenteCsv($diferente, $prefix);
    }

    private function parseazaExport($file): array
    {
        $handle = fopen($file->getRealPath(), 'r');

        // Sarim BOM
        $bom = fread($handle, 3);
        if ($bom !== chr(0xEF) . chr(0xBB) . chr(0xBF)) {
            rewind($handle);
        }

        // Sarim header
        fgetcsv($handle, 0, ',');

        $date = [];
        while (($row = fgetcsv($handle, 0, ',')) !== false) {
            if (count($row) < 9) continue;
            $serie = trim($row[4]); // Serie Contor e coloana 5 (index 4)
            if ($serie === '') continue;
            $date[$serie] = [
                'cod_client'   => trim($row[0]),
                'nume'         => trim($row[1]),
                'telefon'      => trim($row[2]),
                'email'        => trim($row[3]),
                'adresa'       => trim($row[5]),
                'index_vechi'  => trim($row[6]),
                'index_nou'    => trim($row[7]),
                'data'         => trim($row[8]),
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
                'Cod Client', 'Nume', 'Telefon', 'Email',
                'Serie Contor', 'Adresa',
                'Index Nou (fisier 1)', 'Data (fisier 1)',
                'Index Nou (fisier 2)', 'Data (fisier 2)',
            ], ',');

            foreach ($diferente as $r) {
                fputcsv($handle, [
                    $r['cod_client'], $r['nume'], $r['telefon'], $r['email'],
                    $r['serie_contor'], $r['adresa'],
                    $r['index_nou_1'], $r['data_1'],
                    $r['index_nou_2'], $r['data_2'],
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
            'C1' => 'Telefon',
            'D1' => 'Email',
            'E1' => 'Serie Contor',
            'F1' => 'Adresa',
            'G1' => 'Index (' . $numeFisier1 . ')',
            'H1' => 'Data (' . $numeFisier1 . ')',
            'I1' => 'Index (' . $numeFisier2 . ')',
            'J1' => 'Data (' . $numeFisier2 . ')',
        ];

        foreach ($headers as $cell => $label) {
            $sheet->setCellValue($cell, $label);
            $sheet->getStyle($cell)->applyFromArray($styleHeader);
        }
        $sheet->getRowDimension(1)->setRowHeight(22);

        $styleData    = ['borders' => ['allBorders' => ['borderStyle' => 'thin', 'color' => ['argb' => 'FFE2E8F0']]], 'font' => ['size' => 10]];
        $styleAlt     = array_merge($styleData, ['fill' => ['fillType' => 'solid', 'startColor' => ['argb' => 'FFFFF3CD']]]);

        $row = 2;
        foreach ($diferente as $r) {
            $sheet->setCellValue('A' . $row, $r['cod_client']);
            $sheet->setCellValue('B' . $row, $r['nume']);
            $sheet->setCellValue('C' . $row, $r['telefon']);
            $sheet->setCellValue('D' . $row, $r['email']);
            $sheet->setCellValue('E' . $row, $r['serie_contor']);
            $sheet->setCellValue('F' . $row, $r['adresa']);
            $sheet->setCellValue('G' . $row, (int) $r['index_nou_1']);
            $sheet->setCellValue('H' . $row, $r['data_1']);
            $sheet->setCellValue('I' . $row, (int) $r['index_nou_2']);
            $sheet->setCellValue('J' . $row, $r['data_2']);
            $sheet->getStyle('A' . $row . ':J' . $row)->applyFromArray($row % 2 === 0 ? $styleAlt : $styleData);
            $row++;
        }

        $latimi = ['A'=>14,'B'=>22,'C'=>16,'D'=>28,'E'=>18,'F'=>28,'G'=>16,'H'=>18,'I'=>16,'J'=>18];
        foreach ($latimi as $col => $w) {
            $sheet->getColumnDimension($col)->setWidth($w);
        }

        $sheet->setCellValue('A' . $row, 'TOTAL diferente: ' . count($diferente));
        $sheet->getStyle('A' . $row . ':J' . $row)->applyFromArray([
            'font' => ['bold' => true],
            'fill' => ['fillType' => 'solid', 'startColor' => ['argb' => 'FFDBEAFE']],
        ]);
        $sheet->mergeCells('A' . $row . ':J' . $row);
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
                fputcsv($handle, [
                    $contor->cod_client,
                    $contor->client->nume    ?? '-',
                    $contor->client->telefon ?? '-',
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
            $sheet->setCellValue('A' . $row, $contor->cod_client);
            $sheet->setCellValue('B' . $row, $contor->client->nume    ?? '-');
            $sheet->setCellValue('C' . $row, $contor->client->telefon ?? '-');
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