@extends('layouts.app')

@section('title', 'Calitatea apei')

@section('page_hero')
    <h1><i class="bi bi-droplet-half me-2"></i> Calitatea apei</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/informatii') }}">Informații publice</a></li>
            <li class="breadcrumb-item active">Calitatea apei</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:3.5rem 0;">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <h2 class="section-title">Monitorizarea calității apei potabile</h2>

                <div class="d-flex align-items-center gap-3 p-4 mb-4" style="background:linear-gradient(90deg,#d4edda,#c3e6cb);border-radius:12px;border:1.5px solid #b1dfbb;">
                    <i class="bi bi-check-circle-fill" style="font-size:2.5rem;color:#28a745;flex-shrink:0;"></i>
                    <div>
                        <div class="fw-bold" style="color:#155724;font-size:1rem;">Apa este potabilă și sigură pentru consum</div>
                        <div style="font-size:0.875rem;color:#1e7e34;">Toți parametrii de calitate se încadrează în limitele legale. Ultima verificare: Februarie 2026.</div>
                    </div>
                </div>

                <p>
                    AquaServ S.A. monitorizează permanent calitatea apei potabile distribuite, prin analize de
                    laborator efectuate atât la sursă, cât și în rețeaua de distribuție și la robinetul
                    consumatorului. Analizele se efectuează în laboratorul propriu acreditat și la laboratoare
                    terțe acreditate.
                </p>
                <p>
                    Monitorizarea se realizează conform Legii nr. 458/2002 privind calitatea apei potabile și
                    conform Directivei Europene 98/83/CE, modificată prin Directiva 2020/2184/UE.
                </p>

                <h4 class="mt-4 mb-3" style="font-family:'Merriweather',serif;font-size:1.05rem;color:var(--aqua-dark);">
                    Parametri principali monitorizați
                </h4>
                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-hover" style="font-size:0.875rem;">
                        <thead style="background:var(--aqua-primary);color:#fff;">
                            <tr>
                                <th>Parametru</th>
                                <th>Valoare detectată</th>
                                <th>Limită legală</th>
                                <th>Conformitate</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach([
                                ['pH','7,4','6,5 – 9,5','✓'],
                                ['Clor rezidual','0,25 mg/l','0,1 – 0,5 mg/l','✓'],
                                ['Turbiditate','0,8 NTU','< 4 NTU','✓'],
                                ['Nitrați','18 mg/l','< 50 mg/l','✓'],
                                ['Nitriți','< 0,01 mg/l','< 0,5 mg/l','✓'],
                                ['Bacterii coliforme','0 UFC/100ml','0 UFC/100ml','✓'],
                                ['E. coli','0 UFC/100ml','0 UFC/100ml','✓'],
                                ['Duritate totală','18,5 °dH','5 – 20 °dH','✓'],
                            ] as [$param, $val, $limita, $conf])
                            <tr>
                                <td>{{ $param }}</td>
                                <td>{{ $val }}</td>
                                <td>{{ $limita }}</td>
                                <td><span class="badge bg-success">{{ $conf }} Conform</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <h4 class="mb-3" style="font-family:'Merriweather',serif;font-size:1.05rem;color:var(--aqua-dark);">
                    Buletine de analiză
                </h4>
                <div class="row g-3">
                    @foreach([
                        ['Februarie 2026','buletine/buletin-feb-2026.pdf'],
                        ['Ianuarie 2026','buletine/buletin-ian-2026.pdf'],
                        ['Decembrie 2025','buletine/buletin-dec-2025.pdf'],
                        ['Noiembrie 2025','buletine/buletin-nov-2025.pdf'],
                        ['Octombrie 2025','buletine/buletin-oct-2025.pdf'],
                        ['Septembrie 2025','buletine/buletin-sep-2025.pdf'],
                    ] as [$luna, $fisier])
                    <div class="col-md-6">
                        <a href="{{ asset($fisier) }}" target="_blank"
                           class="d-flex align-items-center gap-2 p-3 text-decoration-none"
                           style="background:var(--aqua-bg);border-radius:8px;border:1px solid var(--aqua-border);color:var(--aqua-text);transition:all 0.2s;"
                           onmouseover="this.style.background='var(--aqua-primary)';this.style.color='#fff';"
                           onmouseout="this.style.background='var(--aqua-bg)';this.style.color='var(--aqua-text)';">
                            <i class="bi bi-file-earmark-pdf" style="font-size:1.5rem;color:#dc3545;flex-shrink:0;"></i>
                            <div>
                                <div class="fw-bold" style="font-size:0.875rem;">Buletin de analiză</div>
                                <div style="font-size:0.8rem;opacity:0.75;">{{ $luna }}</div>
                            </div>
                            <i class="bi bi-download ms-auto" style="font-size:0.9rem;"></i>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4">
                @include('components.sidebar-informatii')
            </div>
        </div>
    </div>
</section>
@endsection
