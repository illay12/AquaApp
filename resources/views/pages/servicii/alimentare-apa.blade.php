@extends('layouts.app')

@section('title', 'Alimentare cu apă')

@section('page_hero')
    <h1><i class="bi bi-droplet-fill me-2"></i> Alimentare cu apă</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/servicii') }}">Servicii</a></li>
            <li class="breadcrumb-item active">Alimentare cu apă</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:3.5rem 0;">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <h2 class="section-title">Serviciul de alimentare cu apă potabilă</h2>
                <p>
                    Serviciul de alimentare cu apă potabilă cuprinde ansamblul activităților necesare pentru
                    captarea, tratarea, transportul și distribuția apei potabile la consumatori, în condiții
                    de continuitate, calitate și siguranță.
                </p>
                <p>
                    Apa brută este captată din surse de suprafață și subterane, supusă unui proces complex
                    de tratare (coagulare, decantare, filtrare, dezinfecție) și distribuită consumatorilor
                    prin rețeaua de aducțiune și distribuție.
                </p>

                <h4 class="mt-4 mb-3" style="font-family:'Merriweather',serif;font-size:1.1rem;color:var(--aqua-dark);">
                    Etapele procesului de alimentare cu apă
                </h4>
                <div class="row g-3 mb-4">
                    @foreach([
                        ['1','bi-arrow-up-circle','Captare','Preluarea apei din surse naturale (râuri, lacuri, izvoare, puțuri foraje).'],
                        ['2','bi-funnel','Tratare','Procesul de tratare fizico-chimică și dezinfecție pentru obținerea apei potabile.'],
                        ['3','bi-arrow-right-circle','Transport','Transportul apei tratate prin rețeaua de aducțiune spre rezervoare și turnuri de apă.'],
                        ['4','bi-house-fill','Distribuție','Distribuția apei la consumatori prin rețeaua de distribuție și branșamentele individuale.'],
                    ] as [$nr, $icon, $titlu, $desc])
                    <div class="col-md-6">
                        <div class="d-flex gap-3 p-3" style="background:var(--aqua-bg);border-radius:10px;border:1px solid var(--aqua-border);">
                            <div style="width:40px;height:40px;background:var(--aqua-primary);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:800;flex-shrink:0;">{{ $nr }}</div>
                            <div>
                                <div class="fw-bold" style="font-size:0.9rem;">{{ $titlu }}</div>
                                <div class="text-muted" style="font-size:0.82rem;">{{ $desc }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <h4 class="mb-3" style="font-family:'Merriweather',serif;font-size:1.1rem;color:var(--aqua-dark);">
                    Branșament apă – cum obții
                </h4>
                <p style="font-size:0.9rem;">
                    Pentru obținerea unui branșament nou la rețeaua de apă potabilă, urmați pașii de mai jos:
                </p>
                <ol style="font-size:0.9rem;line-height:2;">
                    <li>Depuneți o cerere de aviz amplasament la sediul nostru sau online</li>
                    <li>Primiți avizul tehnic de racordare cu condițiile de branșare</li>
                    <li>Elaborați proiectul tehnic de branșament (prin proiectant autorizat)</li>
                    <li>Depuneți documentația pentru autorizație la autoritatea locală</li>
                    <li>Executați lucrările cu constructor autorizat și recepționați branșamentul</li>
                </ol>
                <a href="{{ url('/informatii/formulare') }}" class="btn btn-aqua">
                    <i class="bi bi-file-earmark-arrow-down me-2"></i> Descarcă formularul de cerere
                </a>
            </div>

            {{-- SIDEBAR --}}
            <div class="col-lg-4">
                @include('components.sidebar-servicii')
            </div>
        </div>
    </div>
</section>
@endsection
