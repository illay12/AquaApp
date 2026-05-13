@extends('layouts.app')

@section('title', 'Tarife și taxe')

@section('page_hero')
    <h1><i class="bi bi-cash-coin me-2"></i> Tarife și taxe</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/informatii') }}">Informații Publice</a></li>
            <li class="breadcrumb-item active">Tarife și taxe</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:3.5rem 0;">
    <div class="container">
        <div class="row g-5">

            {{-- CONTINUT PRINCIPAL --}}
            <div class="col-lg-9">

                {{-- NOTIFICARE AJUSTARE TARIFE --}}
                <div class="mb-4" style="background:var(--aqua-bg);border-left:4px solid var(--aqua-primary);border-radius:0 10px 10px 0;">
                    <button id="btn-notificare" class="d-flex align-items-center justify-content-between w-100 p-4"
                            style="background:transparent;border:none;text-align:left;cursor:pointer;gap:0.75rem;">
                        <span style="font-size:0.95rem;font-weight:700;color:var(--aqua-dark);">
                            <i class="bi bi-info-circle-fill me-2" style="color:var(--aqua-primary);"></i>
                            Notificare ajustare tarife – 1 ianuarie 2026
                        </span>
                        <i id="icon-notificare" class="bi bi-chevron-down" style="flex-shrink:0;color:var(--aqua-primary);transition:transform 0.25s;"></i>
                    </button>
                    <div id="continut-notificare" style="display:none;padding:0 1.5rem 1.5rem;">
                        <p class="mb-2" style="font-size:0.95rem;">
                            <strong>S.C. AQUASERV S.A.</strong> – începând cu <strong>1 ianuarie 2026</strong>, va ajusta prețurile și tarifele
                            pentru serviciile de alimentare cu apă și de canalizare, în conformitate cu Strategia de Tarifare 2021-2027,
                            aprobată de Asociația de Dezvoltare Intercomunitară, respectiv de primăriile membre ale acesteia prin
                            <strong>Hotărârea A.G.A. nr. 135/15.12.2025</strong> și a <strong>Deciziei A.N.R.S.C. nr. 158/03.12.2025</strong>.
                        </p>
                        <p class="mb-2" style="font-size:0.95rem;">
                            Strategia de tarifare aferentă Planului de Afaceri al operatorului prevede creșteri în termeni reali ale
                            prețurilor și tarifelor, la care se adaugă rata inflației și TVA-ul (care nu sunt stabilite de către Operator).
                        </p>
                        <p class="mb-0" style="font-size:0.95rem;">
                            În ultimul an, creșterea inflației – <strong>9,76%</strong> a generat majorări semnificative ale costurilor de operare:
                            energie electrică, materiale, substanțe pentru tratarea apei, servicii de mentenanță și reparații.
                            Toate acestea influențează direct costurile reale ale producerii, transportului și distribuției apei potabile,
                            precum și pe cele ale colectării și epurării apelor uzate.
                        </p>
                    </div>
                </div>

                <p style="font-size:0.95rem;">
                    Prețurile și tarifele pentru serviciile de alimentare cu apă și canalizare vor fi ajustate,
                    iar noile valori se vor regăsi pe <strong>factura emisă în luna ianuarie 2026</strong>, astfel:
                </p>

                {{-- TABEL PRETURI SERVICII --}}
                <h4 class="mb-3" style="font-family:'Merriweather',serif;font-size:1.05rem;color:var(--aqua-dark);">
                    <i class="bi bi-droplet-fill text-aqua me-2"></i> Prețuri servicii apă și canalizare
                </h4>
                <div class="table-responsive mb-4">
                    <table class="table table-bordered" style="font-size:0.9rem;">
                        <thead style="background:var(--aqua-primary);color:#fff;">
                            <tr>
                                <th style="width:50%;">Servicii furnizate / prestate</th>
                                <th class="text-center">Preț/Tarif exclusiv TVA (lei/mc)</th>
                                <th class="text-center">Preț/Tarif cu TVA (lei/mc)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Alimentare cu apă</strong></td>
                                <td class="text-center fw-bold">8,82</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">9,79</td>
                            </tr>
                            <tr>
                                <td><strong>Canalizare – epurare</strong></td>
                                <td class="text-center fw-bold">6,17</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">6,85</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="alert d-flex gap-2 mb-4" style="background:#fff3cd;border:1px solid #ffc107;border-radius:8px;font-size:0.875rem;">
                    <i class="bi bi-info-circle-fill" style="color:#856404;flex-shrink:0;margin-top:2px;"></i>
                    <div>
                        <strong>Cotă TVA:</strong> Cota legală de TVA pentru serviciul public de alimentare cu apă și de canalizare-epurare este de <strong>11%</strong>.
                    </div>
                </div>

                <p style="font-size:0.9rem;">
                    Prin acest mecanism transparent (Strategie de Tarifare), se evită creșterile bruște și se asigură continuitatea
                    și calitatea serviciilor publice de apă și canalizare. Ajustarea tarifară nu reprezintă o majorare nejustificată,
                    ci o actualizare necesară pentru a reflecta costurile reale ale producerii, transportului și distribuției apei
                    potabile, respectiv ale colectării și epurării apelor uzate.
                </p>
                <p style="font-size:0.9rem;" class="mb-5">
                    Ajustarea tarifelor nu este specifică doar operatorului regional AQUASERV S.A. TULCEA. Majoritatea operatorilor
                    regionali de apă și canalizare din România aplică anual același mecanism de ajustare, prevăzut de legislația
                    națională. Astfel, tarifele reflectă în mod corect evoluțiile economice reale, fără majorări arbitrare sau
                    nejustificate.
                </p>

                {{-- TABEL TARIFE AVIZE SI PRESTARI SERVICII --}}
                <h4 class="mb-1 mt-5" style="font-family:'Merriweather',serif;font-size:1.05rem;color:var(--aqua-dark);">
                    <i class="bi bi-file-earmark-text text-aqua me-2"></i> Tarife avize și prestări servicii
                </h4>
                <p class="text-muted mb-3" style="font-size:0.82rem;">
                    <i class="bi bi-info-circle me-1"></i>
                    Cota legală de TVA aplicabilă este de <strong>21%</strong>. Tariful de urgență implică o majorare de <strong>20%</strong>.
                </p>

                @php
                $tarife_avize = [
                    [1,  'Debranșare/Rebranșare/Abonați restanțieri, consum fraudulos',                              '1 BUC.',       '2.354,01', '2.848,35', '2.824,81', '3.418,02'],
                    [2,  'Contract furnizare apă-canal agenți economici',                                            '1 BUC.',       '16,39',    '19,83',    '19,66',    '23,79'],
                    [3,  'Schimbare titular contract apă-canal persoane fizice',                                     '1 BUC.',       '13,45',    '16,27',    '16,14',    '19,52'],
                    [4,  'Taxa sigilare contoare apă rece',                                                          '1 BUC.',       '25,34',    '30,66',    '30,40',    '36,79'],
                    [5,  'Taxa sigilare contoare apă rece',                                                          '2 BUC.',       '38,82',    '46,97',    '46,58',    '56,36'],
                    [6,  'Taxa sigilare contoare apă rece',                                                          '3 BUC.',       '52,31',    '63,30',    '62,77',    '75,96'],
                    [7,  'Taxa resigilare contoare apă rece',                                                        '1 BUC.',       '13,49',    '16,32',    '16,18',    '19,58'],
                    [8,  'Taxa resigilare contoare apă rece',                                                        '2 BUC.',       '19,86',    '24,03',    '23,83',    '28,83'],
                    [9,  'Taxa resigilare contoare apă rece',                                                        '3 BUC.',       '28,60',    '34,61',    '34,32',    '41,53'],
                    [10, 'Sigilare instalație apă rece',                                                             '1 ROB',        '13,49',    '16,32',    '16,18',    '19,58'],
                    [11, 'Sigilare instalație apă rece',                                                             '2 ROB',        '21,04',    '25,46',    '25,24',    '30,55'],
                    [12, 'Sigilare instalație apă rece',                                                             '3 ROB',        '28,60',    '34,61',    '34,32',    '41,53'],
                    [13, 'Servicii verificare apometre la solicitarea asociațiilor de proprietari',                  '1 ORĂ',        '48,41',    '58,58',    '58,09',    '70,29'],
                    [14, 'Aviz de principiu persoană fizică',                                                        '1 BUC.',       '147,90',   '178,96',   '177,48',   '214,75'],
                    [15, 'Aviz de principiu agent economic',                                                         '1 BUC.',       '182,35',   '220,64',   '218,82',   '264,76'],
                    [16, 'Aviz de principiu rețele electrice, gaze, telefon',                                        '1 Km. rețea',  '121,85',   '147,44',   '146,22',   '176,92'],
                    [17, 'Acord de racordare alimentare cu apă populație',                                           '1 BUC.',       '147,90',   '178,96',   '177,48',   '214,75'],
                    [18, 'Acord de racordare alimentare cu apă agenți economici',                                    '1 BUC.',       '187,39',   '226,74',   '224,86',   '272,08'],
                    [19, 'Acord de racordare canalizare menajeră populație',                                         '1 BUC.',       '147,90',   '178,96',   '177,48',   '214,75'],
                    [20, 'Acord de racordare canalizare menajeră agenți economici',                                  '1 BUC.',       '187,39',   '226,74',   '224,86',   '272,08'],
                    [21, 'Acord de racordare alimentare cu apă și canalizare menajeră populație',                    '1 BUC.',       '163,87',   '198,28',   '196,64',   '237,93'],
                    [22, 'Acord de racordare alimentare cu apă și canalizare menajeră agenți economici',             '1 BUC.',       '204,20',   '247,08',   '245,04',   '296,40'],
                ];
                @endphp

                {{-- Desktop --}}
                <div class="table-responsive d-none d-md-block">
                    <table class="table table-bordered table-hover" style="font-size:0.82rem;">
                        <thead style="background:var(--aqua-dark);color:#fff;text-align:center;">
                            <tr>
                                <th style="width:4%;">Nr. crt.</th>
                                <th style="text-align:left;">Denumire</th>
                                <th style="width:6%;">U/M</th>
                                <th style="width:10%;">Valoare fără TVA (lei)</th>
                                <th style="width:10%;">Valoare cu TVA (lei)</th>
                                <th style="width:12%;">Taxă urgență 20% fără TVA (lei)</th>
                                <th style="width:12%;">Taxă urgență 20% cu TVA (lei)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tarife_avize as [$nr, $denumire, $um, $faraTV, $cuTV, $urgFara, $urgCu])
                            <tr>
                                <td class="text-center">{{ $nr }}</td>
                                <td>{{ $denumire }}</td>
                                <td class="text-center" style="white-space:nowrap;">{{ $um }}</td>
                                <td class="text-center">{{ $faraTV }}</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">{{ $cuTV }}</td>
                                <td class="text-center">{{ $urgFara }}</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">{{ $urgCu }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Mobile table --}}
                <div class="table-responsive d-block d-md-none">
                    <table class="table table-bordered" style="font-size:0.82rem;">
                        <thead style="background:var(--aqua-primary);color:#fff;">
                            <tr>
                                <th style="width:5%;">Nr.</th>
                                <th>Denumire</th>
                                <th class="text-center">U/M</th>
                                <th class="text-center">Fără TVA (lei)</th>
                                <th class="text-center">Cu TVA (lei)</th>
                                <th class="text-center">Urg. 20% fără TVA (lei)</th>
                                <th class="text-center">Urg. 20% cu TVA (lei)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tarife_avize as [$nr, $denumire, $um, $faraTV, $cuTV, $urgFara, $urgCu])
                            <tr>
                                <td class="text-center">{{ $nr }}</td>
                                <td>{{ $denumire }}</td>
                                <td class="text-center" style="white-space:nowrap;">{{ $um }}</td>
                                <td class="text-center">{{ $faraTV }}</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">{{ $cuTV }}</td>
                                <td class="text-center">{{ $urgFara }}</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">{{ $urgCu }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3 p-3" style="background:#f8f9fa;border-radius:8px;font-size:0.82rem;color:#374151;">
                    <p class="fw-bold mb-2">Notă:</p>
                    <ul class="mb-0" style="padding-left:1.25rem;">
                        <li>Termenul de executare a lucrărilor de urgență este de maxim <strong>48 ore</strong> de la data depunerii cererii.</li>
                        <li>Pentru prestațiile în lei/oră efectuate de către personalul SC Aquaserv SA, se va calcula valoarea serviciului pentru ore întregi, fără fracțiuni, și se va regăsi în devizul de lucrări.</li>
                    </ul>
                </div>

                {{-- TABEL TARIFE UTILAJE --}}
                <h4 class="mb-1 mt-5" style="font-family:'Merriweather',serif;font-size:1.05rem;color:var(--aqua-dark);">
                    <i class="bi bi-truck text-aqua me-2"></i> Tarife utilaje și vehicule
                </h4>
                <p class="text-muted mb-3" style="font-size:0.82rem;">
                    <i class="bi bi-info-circle me-1"></i>
                    Cota legală de TVA aplicabilă este de <strong>21%</strong>. Tariful de urgență implică o majorare de <strong>20%</strong>.
                </p>

                {{-- Desktop --}}
                <div class="table-responsive d-none d-md-block">
                    <table class="table table-bordered" style="font-size:0.82rem;">
                        <thead style="background:var(--aqua-dark);color:#fff;text-align:center;">
                            <tr>
                                <th style="width:4%;">Nr. crt.</th>
                                <th style="text-align:left;width:20%;">Denumire</th>
                                <th style="width:16%;">Unitate de măsură</th>
                                <th style="width:10%;">Preț unitar fără TVA (lei)</th>
                                <th style="width:10%;">Preț unitar cu TVA (lei)</th>
                                <th style="width:12%;">Taxă urgență 20% fără TVA (lei)</th>
                                <th style="width:12%;">Taxă urgență 20% cu TVA (lei)</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- 1. AUTODESFUNDĂTOARE TL-26-APA --}}
                            <tr>
                                <td rowspan="3" class="align-middle text-center">1.</td>
                                <td rowspan="3" class="align-middle fw-bold">AUTODESFUNDĂTOARE TL-26-APA</td>
                                <td>preț pe cursă</td>
                                <td class="text-center">775,00</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">937,75</td>
                                <td class="text-center">930,00</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">1.125,30</td>
                            </tr>
                            <tr>
                                <td>preț pe oră la dispoziția clientului</td>
                                <td class="text-center">65,55</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">79,32</td>
                                <td class="text-center">78,66</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">95,17</td>
                            </tr>
                            <tr>
                                <td>preț pe kilometru</td>
                                <td class="text-center">4,15</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">5,02</td>
                                <td class="text-center">4,98</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">6,02</td>
                            </tr>
                            {{-- 2. MINIBULDOEXCAVATOR --}}
                            <tr>
                                <td rowspan="3" class="align-middle text-center">2.</td>
                                <td rowspan="3" class="align-middle fw-bold">MINIBULDOEXCAVATOR</td>
                                <td>preț pe oră</td>
                                <td class="text-center">318,00</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">384,78</td>
                                <td class="text-center">381,60</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">461,74</td>
                            </tr>
                            <tr>
                                <td>preț pe oră la dispoziția clientului</td>
                                <td class="text-center">26,89</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">32,54</td>
                                <td class="text-center">32,27</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">39,05</td>
                            </tr>
                            <tr>
                                <td>preț pe kilometru</td>
                                <td class="text-center">4,15</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">5,02</td>
                                <td class="text-center">4,98</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">6,02</td>
                            </tr>
                            {{-- 3. BULDOEXCAVATOR --}}
                            <tr>
                                <td rowspan="3" class="align-middle text-center">3.</td>
                                <td rowspan="3" class="align-middle fw-bold">BULDOEXCAVATOR</td>
                                <td>preț pe oră</td>
                                <td class="text-center">435,00</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">526,35</td>
                                <td class="text-center">522,00</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">631,62</td>
                            </tr>
                            <tr>
                                <td>preț pe oră la dispoziția clientului</td>
                                <td class="text-center">36,13</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">43,72</td>
                                <td class="text-center">43,36</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">52,46</td>
                            </tr>
                            <tr>
                                <td>preț pe kilometru</td>
                                <td class="text-center">4,15</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">5,02</td>
                                <td class="text-center">4,98</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">6,02</td>
                            </tr>
                            {{-- 4. AUTOUTILITARĂ TL 33 APA --}}
                            <tr>
                                <td rowspan="3" class="align-middle text-center">4.</td>
                                <td rowspan="3" class="align-middle fw-bold">AUTOUTILITARĂ TL 33 APA</td>
                                <td>preț pe cursă</td>
                                <td class="text-center">470,00</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">568,70</td>
                                <td class="text-center">564,00</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">682,44</td>
                            </tr>
                            <tr>
                                <td>preț pe oră la dispoziția clientului</td>
                                <td class="text-center">39,50</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">47,80</td>
                                <td class="text-center">47,40</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">57,35</td>
                            </tr>
                            <tr>
                                <td>preț pe kilometru</td>
                                <td class="text-center">4,15</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">5,02</td>
                                <td class="text-center">4,98</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">6,02</td>
                            </tr>
                            {{-- 5. AUTODESFUNDĂTOR multi --}}
                            <tr>
                                <td rowspan="3" class="align-middle text-center">5.</td>
                                <td rowspan="3" class="align-middle fw-bold" style="font-size:0.78rem;">AUTODESFUNDĂTOR TL-01-USU / TL 11 APA / TL 20 APA / TL 18 APA / TL 01 ZHU / TL 04 APA / TL 05 APA</td>
                                <td>preț pe cursă</td>
                                <td class="text-center">436,00</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">527,56</td>
                                <td class="text-center">523,20</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">633,07</td>
                            </tr>
                            <tr>
                                <td>preț pe oră la dispoziția clientului</td>
                                <td class="text-center">36,97</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">44,73</td>
                                <td class="text-center">44,36</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">53,68</td>
                            </tr>
                            <tr>
                                <td>preț pe kilometru</td>
                                <td class="text-center">4,15</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">5,02</td>
                                <td class="text-center">4,98</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">6,02</td>
                            </tr>
                            {{-- 6. LABORATOR DETECȚIE PIERDERI --}}
                            <tr>
                                <td rowspan="3" class="align-middle text-center">6.</td>
                                <td rowspan="3" class="align-middle fw-bold" style="font-size:0.78rem;">LABORATOR DETECȚIE PIERDERI TL 12 APA / TL 14 APA / TL 24 APA</td>
                                <td>preț pe cursă</td>
                                <td class="text-center">410,00</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">496,10</td>
                                <td class="text-center">492,00</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">595,32</td>
                            </tr>
                            <tr>
                                <td>preț pe oră la dispoziția clientului</td>
                                <td class="text-center">34,45</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">41,68</td>
                                <td class="text-center">41,34</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">50,02</td>
                            </tr>
                            <tr>
                                <td>preț pe kilometru</td>
                                <td class="text-center">4,15</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">5,02</td>
                                <td class="text-center">4,98</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">6,02</td>
                            </tr>
                            {{-- 7. MAȘINA DE TĂIAT ASFALT --}}
                            <tr>
                                <td rowspan="2" class="align-middle text-center">7.</td>
                                <td rowspan="2" class="align-middle fw-bold">MAȘINA DE TĂIAT ASFALT</td>
                                <td>preț pe oră</td>
                                <td class="text-center">132,00</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">159,72</td>
                                <td class="text-center">158,40</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">191,66</td>
                            </tr>
                            <tr>
                                <td>preț pe oră la dispoziția clientului</td>
                                <td class="text-center">10,92</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">13,21</td>
                                <td class="text-center">13,10</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">15,85</td>
                            </tr>
                            {{-- 8. COMPACTOR --}}
                            <tr>
                                <td rowspan="2" class="align-middle text-center">8.</td>
                                <td rowspan="2" class="align-middle fw-bold">COMPACTOR</td>
                                <td>preț pe oră</td>
                                <td class="text-center">133,00</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">160,93</td>
                                <td class="text-center">159,60</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">193,12</td>
                            </tr>
                            <tr>
                                <td>preț pe oră la dispoziția clientului</td>
                                <td class="text-center">10,92</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">13,21</td>
                                <td class="text-center">13,10</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">15,85</td>
                            </tr>
                            {{-- 9. MAȘINA TRANSPORT CLOR TL-99-APA --}}
                            <tr>
                                <td rowspan="3" class="align-middle text-center">9.</td>
                                <td rowspan="3" class="align-middle fw-bold">MAȘINA TRANSPORT CLOR TL-99-APA</td>
                                <td>preț pe tonă</td>
                                <td class="text-center">510,00</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">617,10</td>
                                <td class="text-center">612,00</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">740,52</td>
                            </tr>
                            <tr>
                                <td>preț pe oră la dispoziția clientului</td>
                                <td class="text-center">42,86</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">51,86</td>
                                <td class="text-center">51,43</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">62,23</td>
                            </tr>
                            <tr>
                                <td>preț pe kilometru</td>
                                <td class="text-center">4,15</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">5,02</td>
                                <td class="text-center">4,98</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">6,02</td>
                            </tr>
                            {{-- 10. AUTOUTILITARĂ TL 25/36/35/32 APA --}}
                            <tr>
                                <td rowspan="3" class="align-middle text-center">10.</td>
                                <td rowspan="3" class="align-middle fw-bold" style="font-size:0.78rem;">AUTOUTILITARĂ TL 25 APA / TL 36 APA / TL 35 APA / TL 32 APA</td>
                                <td>preț pe cursă</td>
                                <td class="text-center">470,00</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">568,70</td>
                                <td class="text-center">564,00</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">682,44</td>
                            </tr>
                            <tr>
                                <td>preț pe oră la dispoziția clientului</td>
                                <td class="text-center">39,50</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">47,80</td>
                                <td class="text-center">47,40</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">57,35</td>
                            </tr>
                            <tr>
                                <td>preț pe kilometru</td>
                                <td class="text-center">4,15</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">5,02</td>
                                <td class="text-center">4,98</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">6,02</td>
                            </tr>
                            {{-- 11. AUTOUTILITARĂ TL-19-APA --}}
                            <tr>
                                <td rowspan="3" class="align-middle text-center">11.</td>
                                <td rowspan="3" class="align-middle fw-bold">AUTOUTILITARĂ TL-19-APA</td>
                                <td>preț pe cursă</td>
                                <td class="text-center">481,00</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">582,01</td>
                                <td class="text-center">577,20</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">698,41</td>
                            </tr>
                            <tr>
                                <td>preț pe oră la dispoziția clientului</td>
                                <td class="text-center">40,34</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">48,81</td>
                                <td class="text-center">48,41</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">58,58</td>
                            </tr>
                            <tr>
                                <td>preț pe kilometru</td>
                                <td class="text-center">4,15</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">5,02</td>
                                <td class="text-center">4,98</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">6,02</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- Mobile accordion utilaje --}}
                @php
                $utilaje_mob = [
                    ['1', 'AUTODESFUNDĂTOARE TL-26-APA', [
                        ['preț pe cursă',                  '775,00', '937,75',  '930,00',  '1.125,30'],
                        ['preț pe oră la disp. clientului','65,55',  '79,32',   '78,66',   '95,17'],
                        ['preț pe kilometru',              '4,15',   '5,02',    '4,98',    '6,02'],
                    ]],
                    ['2', 'MINIBULDOEXCAVATOR', [
                        ['preț pe oră',                    '318,00', '384,78',  '381,60',  '461,74'],
                        ['preț pe oră la disp. clientului','26,89',  '32,54',   '32,27',   '39,05'],
                        ['preț pe kilometru',              '4,15',   '5,02',    '4,98',    '6,02'],
                    ]],
                    ['3', 'BULDOEXCAVATOR', [
                        ['preț pe oră',                    '435,00', '526,35',  '522,00',  '631,62'],
                        ['preț pe oră la disp. clientului','36,13',  '43,72',   '43,36',   '52,46'],
                        ['preț pe kilometru',              '4,15',   '5,02',    '4,98',    '6,02'],
                    ]],
                    ['4', 'AUTOUTILITARĂ TL 33 APA', [
                        ['preț pe cursă',                  '470,00', '568,70',  '564,00',  '682,44'],
                        ['preț pe oră la disp. clientului','39,50',  '47,80',   '47,40',   '57,35'],
                        ['preț pe kilometru',              '4,15',   '5,02',    '4,98',    '6,02'],
                    ]],
                    ['5', 'AUTODESFUNDĂTOR TL-01-USU / TL 11 / TL 20 / TL 18 / TL 01 ZHU / TL 04 / TL 05 APA', [
                        ['preț pe cursă',                  '436,00', '527,56',  '523,20',  '633,07'],
                        ['preț pe oră la disp. clientului','36,97',  '44,73',   '44,36',   '53,68'],
                        ['preț pe kilometru',              '4,15',   '5,02',    '4,98',    '6,02'],
                    ]],
                    ['6', 'LABORATOR DETECȚIE PIERDERI TL 12 / TL 14 / TL 24 APA', [
                        ['preț pe cursă',                  '410,00', '496,10',  '492,00',  '595,32'],
                        ['preț pe oră la disp. clientului','34,45',  '41,68',   '41,34',   '50,02'],
                        ['preț pe kilometru',              '4,15',   '5,02',    '4,98',    '6,02'],
                    ]],
                    ['7', 'MAȘINA DE TĂIAT ASFALT', [
                        ['preț pe oră',                    '132,00', '159,72',  '158,40',  '191,66'],
                        ['preț pe oră la disp. clientului','10,92',  '13,21',   '13,10',   '15,85'],
                    ]],
                    ['8', 'COMPACTOR', [
                        ['preț pe oră',                    '133,00', '160,93',  '159,60',  '193,12'],
                        ['preț pe oră la disp. clientului','10,92',  '13,21',   '13,10',   '15,85'],
                    ]],
                    ['9', 'MAȘINA TRANSPORT CLOR TL-99-APA', [
                        ['preț pe tonă',                   '510,00', '617,10',  '612,00',  '740,52'],
                        ['preț pe oră la disp. clientului','42,86',  '51,86',   '51,43',   '62,23'],
                        ['preț pe kilometru',              '4,15',   '5,02',    '4,98',    '6,02'],
                    ]],
                    ['10', 'AUTOUTILITARĂ TL 25 / TL 36 / TL 35 / TL 32 APA', [
                        ['preț pe cursă',                  '470,00', '568,70',  '564,00',  '682,44'],
                        ['preț pe oră la disp. clientului','39,50',  '47,80',   '47,40',   '57,35'],
                        ['preț pe kilometru',              '4,15',   '5,02',    '4,98',    '6,02'],
                    ]],
                    ['11', 'AUTOUTILITARĂ TL-19-APA', [
                        ['preț pe cursă',                  '481,00', '582,01',  '577,20',  '698,41'],
                        ['preț pe oră la disp. clientului','40,34',  '48,81',   '48,41',   '58,58'],
                        ['preț pe kilometru',              '4,15',   '5,02',    '4,98',    '6,02'],
                    ]],
                ];
                @endphp
                <div class="table-responsive d-block d-md-none">
                    <table class="table table-bordered" style="font-size:0.82rem;">
                        <thead style="background:var(--aqua-primary);color:#fff;">
                            <tr>
                                <th>Denumire / U/M</th>
                                <th class="text-center">Fără TVA (lei)</th>
                                <th class="text-center">Cu TVA (lei)</th>
                                <th class="text-center">Urg. 20% fără TVA (lei)</th>
                                <th class="text-center">Urg. 20% cu TVA (lei)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($utilaje_mob as [$nr, $den, $randuri])
                            <tr style="background:var(--aqua-bg);">
                                <td colspan="5" class="fw-bold" style="color:var(--aqua-dark);font-size:0.8rem;">
                                    {{ $nr }}. {{ $den }}
                                </td>
                            </tr>
                            @foreach($randuri as [$um, $f, $c, $uf, $uc])
                            <tr>
                                <td class="ps-3" style="color:#64748b;">{{ $um }}</td>
                                <td class="text-center">{{ $f }}</td>
                                <td class="text-center fw-bold" style="color:var(--aqua-primary);">{{ $c }}</td>
                                <td class="text-center">{{ $uf }}</td>
                                <td class="text-center fw-bold" style="color:#dc3545;">{{ $uc }}</td>
                            </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3 p-3" style="background:#f8f9fa;border-radius:8px;font-size:0.82rem;color:#374151;">
                    <p class="fw-bold mb-2">Notă:</p>
                    <ul class="mb-0" style="padding-left:1.25rem;">
                        <li>Pentru serviciile de vidanjare în Municipiul Tulcea prețul este pe cursă.</li>
                        <li>Pentru serviciile de vidanjare în afara Municipiului Tulcea, prețul cursei la care se adaugă tariful pe kilometru la numărul de kilometri parcurși până la localitatea de destinație, dus-întors.</li>
                        <li>Pentru serviciile efectuate de utilajele pentru lucrări (buldoexcavatoare), prețul este calculat pe oră de funcționare, iar în situația în care utilajul stă la dispoziția clientului mai mult de o oră, se adaugă și tariful <strong>ora la dispoziția clientului</strong> pentru fiecare oră de depășire.</li>
                        <li>Pentru serviciile efectuate de utilajele pentru lucrări executate în afara Municipiului Tulcea, se ia în calcul prețul pe ora de funcționare la care se adaugă prețul pe numărul de kilometri până la localitatea de destinație dus-întors.</li>
                        <li>Pentru Mașina de Transport Clor TL-99-APA tariful este calculat pe tonă la care se adaugă tariful pe kilometru.</li>
                        <li>Termenul de executare de urgență a serviciului de vidanjare este de maxim <strong>24 ore</strong> de la solicitare.</li>
                    </ul>
                </div>

                {{-- DOCUMENT ATASAT --}}
                <div class="mt-4">
                    <p class="fw-bold mb-2" style="font-size:0.85rem;color:#64748b;text-transform:uppercase;letter-spacing:0.04em;">
                        <i class="bi bi-paperclip me-1"></i> Document atașat
                    </p>
                    <a href="{{ asset('storage/documente/tarife/hotarare-taxa-urgenta.pdf') }}" target="_blank"
                       style="display:flex;align-items:center;gap:0.85rem;padding:0.9rem 1.25rem;text-decoration:none;color:inherit;border-radius:10px;border:1.5px solid var(--aqua-border);transition:background 0.14s;"
                       onmouseover="this.style.background='#e8f4fd';this.style.borderColor='var(--aqua-primary)'"
                       onmouseout="this.style.background='';this.style.borderColor='var(--aqua-border)'">
                        <div style="width:40px;height:40px;min-width:40px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:1.1rem;color:#fff;background:#dc3545;">
                            <i class="bi bi-file-earmark-pdf-fill"></i>
                        </div>
                        <div style="flex:1;min-width:0;">
                            <div style="font-weight:600;font-size:0.88rem;color:var(--aqua-dark);">Hotărâre Aprobare Taxă Urgență</div>
                            <div style="font-size:0.75rem;color:#64748b;">PDF</div>
                        </div>
                        <i class="bi bi-box-arrow-up-right" style="color:var(--aqua-primary);font-size:0.9rem;"></i>
                    </a>
                </div>

            </div>

            {{-- SIDEBAR --}}
            <div class="col-lg-3 d-none d-lg-block">
                <div class="card mb-4">
                    <div class="card-header"><i class="bi bi-grid me-2"></i> Facturare</div>
                    <div class="list-group list-group-flush">
                        <a href="{{ url('/facturare/tarife-si-taxe') }}"
                           class="list-group-item list-group-item-action d-flex align-items-center gap-2 active"
                           style="background:var(--aqua-primary);border-color:var(--aqua-primary);">
                            <i class="bi bi-cash-coin"></i> Tarife și taxe
                        </a>
                        <a href="{{ url('https://my.aquaservtulcea.ro/login') }}" class="list-group-item list-group-item-action d-flex align-items-center gap-2">
                            <i class="bi bi-credit-card"></i> Plătește factura
                        </a>
                        <a href="{{ url('/client/index-contor') }}" class="list-group-item list-group-item-action d-flex align-items-center gap-2">
                            <i class="bi bi-speedometer2"></i> Transmite index
                        </a>
                        <a href="{{ url('/program-casierii') }}" class="list-group-item list-group-item-action d-flex align-items-center gap-2">
                            <i class="bi bi-clock"></i> Program casierii
                        </a>
                    </div>
                </div>

                <div class="card mb-4" style="border-color:#f8d7da;">
                    <div class="card-body text-center" style="background:#fff5f5;border-radius:12px;">
                        <p class="fw-bold mb-1" style="color:#dc3545;font-size:0.9rem;">
                            <i class="bi bi-telephone-fill me-1"></i> Dispecerat avarii 24/7
                        </p>
                        <p style="font-size:1.7rem;font-weight:800;color:#dc3545;margin:0;">0747 022 009</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@push('scripts')
<script nonce="@nonce">
document.addEventListener('DOMContentLoaded', function() {
    var btn = document.getElementById('btn-notificare');
    var continut = document.getElementById('continut-notificare');
    var icon = document.getElementById('icon-notificare');
    btn.addEventListener('click', function() {
        var deschis = continut.style.display !== 'none';
        continut.style.display = deschis ? 'none' : 'block';
        icon.style.transform = deschis ? '' : 'rotate(180deg)';
    });
});
</script>
@endpush