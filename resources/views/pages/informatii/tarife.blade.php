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
                <div class="p-4 mb-4" style="background:var(--aqua-bg);border-left:4px solid var(--aqua-primary);border-radius:0 10px 10px 0;">
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

                {{-- TABEL TAXE --}}
                <h4 class="mb-1" style="font-family:'Merriweather',serif;font-size:1.05rem;color:var(--aqua-dark);">
                    <i class="bi bi-receipt text-aqua me-2"></i> Taxe prevăzute de S.C. Aquaserv S.A. Tulcea
                </h4>
                <p class="text-muted mb-3" style="font-size:0.82rem;">
                    <i class="bi bi-info-circle me-1"></i>
                    Începând cu <strong>1 august 2025</strong>, cota legală de TVA pentru taxe și servicii prestate de către
                    SC Aquaserv Tulcea SA este de <strong>21%</strong>.
                </p>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover" style="font-size:0.875rem;">
                        <thead style="background:var(--aqua-dark);color:#fff;">
                            <tr>
                                <th style="width:5%;" class="text-center">Nr. crt.</th>
                                <th>Denumire serviciu</th>
                                <th class="text-center" style="width:18%;">Valoare fără TVA (lei)</th>
                                <th class="text-center" style="width:18%;">Total inclusiv TVA (lei)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $taxe = [
                                [1,  'Taxă debranșare/rebranșare apă rece abonat restant sau cu consum fraudulos',                                          '2.354,01', '2.848,35'],
                                [2,  'Taxă verificare apometre la solicitarea asociațiilor de proprietari / oră',                                           '48,41',    '58,58'],
                                [3,  'Taxă sigilare instalație apă rece (1 robinet)',                                                                       '13,49',    '16,32'],
                                [4,  'Taxă sigilare instalație apă rece (2 robineți)',                                                                      '21,04',    '25,46'],
                                [5,  'Taxă sigilare instalație apă rece (3 robineți)',                                                                      '28,60',    '34,61'],
                                [6,  'Taxă resigilare contoare apă rece verificate metrologic pentru prelungirea termenului de valabilitate (1 apometru)',  '13,49',    '16,32'],
                                [7,  'Taxă resigilare contoare apă rece verificate metrologic pentru prelungirea termenului de valabilitate (2 apometre)', '19,86',    '24,03'],
                                [8,  'Taxă resigilare contoare apă rece verificate metrologic pentru prelungirea termenului de valabilitate (3 apometre)', '28,60',    '34,61'],
                                [9,  'Taxă sigilare contoare apă rece (1 apometru)',                                                                        '25,34',    '30,66'],
                                [10, 'Taxă sigilare contoare apă rece (2 apometre)',                                                                        '38,82',    '46,97'],
                                [11, 'Taxă sigilare contoare apă rece (3 apometre)',                                                                        '52,31',    '63,30'],
                                [12, 'Taxă contract furnizare apă/canal agenți economici',                                                                  '16,39',    '19,83'],
                                [13, 'Taxă schimbare titular contract furnizare apă/canal populație',                                                       '13,45',    '16,27'],
                                [14, 'Taxă debranșare/rebranșare apă rece la cererea clientului',                                                           'conform deviz', 'conform deviz'],
                            ];
                            @endphp

                            @foreach($taxe as [$nr, $denumire, $faraTV, $cuTVA])
                            <tr>
                                <td class="text-center">{{ $nr }}</td>
                                <td>{{ $denumire }}</td>
                                <td class="text-center">
                                    @if($faraTV === 'conform deviz')
                                        <em class="text-muted">conform deviz</em>
                                    @else
                                        {{ $faraTV }}
                                    @endif
                                </td>
                                <td class="text-center fw-bold">
                                    @if($cuTVA === 'conform deviz')
                                        <em class="text-muted">conform deviz</em>
                                    @else
                                        <span style="color:var(--aqua-primary);">{{ $cuTVA }}</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <p class="text-muted mt-2" style="font-size:0.8rem;">
                    * Toate prețurile sunt exprimate în lei. TVA aplicabil: 11% pentru servicii apă/canal, 21% pentru taxe și prestări servicii.
                    Ultima actualizare: Ianuarie 2026.
                </p>

            </div>

            {{-- SIDEBAR --}}
            <div class="col-lg-3">
                <div class="card mb-4">
                    <div class="card-header"><i class="bi bi-grid me-2"></i> Facturare</div>
                    <div class="list-group list-group-flush">
                        <a href="{{ url('/facturare/tarife-si-taxe') }}"
                           class="list-group-item list-group-item-action d-flex align-items-center gap-2 active"
                           style="background:var(--aqua-primary);border-color:var(--aqua-primary);">
                            <i class="bi bi-cash-coin"></i> Tarife și taxe
                        </a>
                        <a href="{{ url('/client/factura') }}" class="list-group-item list-group-item-action d-flex align-items-center gap-2">
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

                <div class="card" style="background:var(--aqua-bg);border-color:var(--aqua-border);">
                    <div class="card-body">
                        <h6 class="fw-bold text-aqua mb-2">
                            <i class="bi bi-file-earmark-pdf me-2"></i> Documente utile
                        </h6>
                        <ul class="list-unstyled mb-0" style="font-size:0.875rem;">
                            <li class="mb-2">
                                <a href="{{ asset('documente/hotarare-aga-135-2025.pdf') }}" target="_blank">
                                    <i class="bi bi-file-earmark-pdf text-danger me-1"></i>
                                    H.A.G.A. nr. 135/2025
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ asset('documente/decizie-anrsc-158-2025.pdf') }}" target="_blank">
                                    <i class="bi bi-file-earmark-pdf text-danger me-1"></i>
                                    Decizia A.N.R.S.C. nr. 158/2025
                                </a>
                            </li>
                            <li>
                                <a href="{{ asset('documente/strategie-tarifare-2021-2027.pdf') }}" target="_blank">
                                    <i class="bi bi-file-earmark-pdf text-danger me-1"></i>
                                    Strategie tarifare 2021-2027
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection