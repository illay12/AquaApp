@extends('layouts.app')

@section('title', 'Informații publice')

@section('page_hero')
    <h1><i class="bi bi-info-circle me-2"></i> Informații publice</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item active">Informații publice</li>
        </ol>
    </nav>
@endsection

@push('styles')
<style>
    .info-card {
        background: #fff;
        border-radius: 14px;
        border: 1.5px solid var(--aqua-border);
        transition: border-color 0.22s, box-shadow 0.22s, transform 0.22s;
        color: var(--aqua-text);
        text-decoration: none;
        display: flex;
        flex-direction: column;
        height: 100%;
        padding: 1.5rem;
    }
    .info-card:hover {
        box-shadow: 0 6px 24px rgba(0,119,182,0.10);
        transform: translateY(-3px);
        border-color: var(--card-color) !important;
    }
    .info-card .card-icon {
        width: 52px;
        height: 52px;
        border-radius: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
        flex-shrink: 0;
        font-size: 1.5rem;
    }
    @media (max-width: 575.98px) {
        .info-section { padding: 2rem 0; }
        .info-card {
            flex-direction: row;
            align-items: flex-start;
            gap: 1rem;
            padding: 1rem;
            border-radius: 10px;
        }
        .info-card .card-icon {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            font-size: 1.25rem;
            margin-bottom: 0;
        }
        .info-card .card-body-inner { flex: 1; min-width: 0; }
        .info-card h5 { font-size: 0.9rem; margin-bottom: 0.25rem; }
        .info-card p  { font-size: 0.8rem; margin-bottom: 0.4rem; }
        .info-card .card-arrow { font-size: 0.78rem; }
        .info-intro { font-size: 0.875rem !important; }
    }
</style>
@endpush

@section('content')
<section class="info-section" style="padding:3.5rem 0;">
    <div class="container">

        <h2 class="section-title mb-2">Informații publice</h2>
        <p class="text-muted info-intro mb-4" style="font-size:0.9375rem;max-width:650px;">
            Accesați secțiunile de mai jos pentru informații despre tarifele aplicate, calitatea apei,
            legislația în vigoare, formulare utile, avize și programul casieriilor.
        </p>

        <div class="row g-3">
            @foreach([
                [
                    'url'   => '/informatii/calitatea-apei',
                    'icon'  => 'bi-clipboard2-pulse',
                    'titlu' => 'Calitatea apei',
                    'desc'  => 'Buletine de analiză și rapoarte privind calitatea apei potabile distribuite în județul Tulcea.',
                    'color' => '#0077b6',
                ],
                [
                    'url'   => '/informatii/tarife',
                    'icon'  => 'bi-cash-stack',
                    'titlu' => 'Tarife și taxe',
                    'desc'  => 'Tarifele actuale pentru serviciile de alimentare cu apă și canalizare, aprobate de A.N.R.S.C.',
                    'color' => '#0096c7',
                ],
                [
                    'url'   => '/informatii/legislatie',
                    'icon'  => 'bi-journal-text',
                    'titlu' => 'Legislație',
                    'desc'  => 'Acte normative, regulamente și documente legislative relevante pentru serviciile de apă și canal.',
                    'color' => '#023e8a',
                ],
                [
                    'url'   => '/informatii/formulare',
                    'icon'  => 'bi-file-earmark-text',
                    'titlu' => 'Formulare utile',
                    'desc'  => 'Formulare tipizate pentru cereri de contract, verificare metrologică, înlocuire apometru și altele.',
                    'color' => '#0077b6',
                ],
                [
                    'url'   => '/informatii/avize',
                    'icon'  => 'bi-patch-check',
                    'titlu' => 'Avize și acorduri',
                    'desc'  => 'Documente necesare pentru avizul de amplasament și acordul de racordare la rețelele AquaServ.',
                    'color' => '#0096c7',
                ],
                [
                    'url'   => '/informatii/legea-544-2001',
                    'icon'  => 'bi-journal-bookmark',
                    'titlu' => 'Legea 544/2001',
                    'desc'  => 'Informații privind accesul liber la informațiile de interes public, persoane responsabile și formulare de solicitare.',
                    'color' => '#0077b6',
                ],
                [
                    'url'   => '/informatii/hotarari-aga',
                    'icon'  => 'bi-people',
                    'titlu' => 'Hotărâri AGA',
                    'desc'  => 'Hotărârile Adunării Generale a Acționarilor și raportările Consiliului de Administrație.',
                    'color' => '#0077b6',
                ],
                [
                    'url'   => '/informatii/surse-buget-bilant',
                    'icon'  => 'bi-bar-chart-line',
                    'titlu' => 'Surse, Buget, Bilanț',
                    'desc'  => 'Bugete de venituri și cheltuieli, bilanțuri contabile și rapoarte de audit anuale.',
                    'color' => '#0096c7',
                ],
                [
                    'url'   => '/program-casierii',
                    'icon'  => 'bi-clock',
                    'titlu' => 'Program casierii',
                    'desc'  => 'Orarul și locațiile casieriilor AquaServ din județul Tulcea unde puteți achita facturile.',
                    'color' => '#023e8a',
                ],
            ] as $item)
            <div class="col-12 col-md-6 col-lg-4">
                <a href="{{ url($item['url']) }}" class="info-card"
                   style="--card-color:{{ $item['color'] }};"
>
                    <div class="card-icon"
                         style="background:{{ $item['color'] }}1a;color:{{ $item['color'] }};">
                        <i class="bi {{ $item['icon'] }}"></i>
                    </div>
                    <div class="card-body-inner">
                        <h5 class="fw-bold mb-2" style="font-family:'Merriweather',serif;font-size:1rem;color:var(--aqua-dark);">
                            {{ $item['titlu'] }}
                        </h5>
                        <p class="mb-2 flex-grow-1" style="font-size:0.875rem;color:#555;line-height:1.6;">
                            {{ $item['desc'] }}
                        </p>
                        <div class="card-arrow d-flex align-items-center gap-1 fw-semibold"
                             style="font-size:0.85rem;color:{{ $item['color'] }};">
                            Accesați <i class="bi bi-arrow-right"></i>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

    </div>
</section>
@endsection
