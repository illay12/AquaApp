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

@section('content')
<section style="padding:3.5rem 0;">
    <div class="container">

        <h2 class="section-title mb-2">Informații publice</h2>
        <p class="text-muted mb-5" style="font-size:0.9375rem;max-width:650px;">
            Accesați secțiunile de mai jos pentru informații despre tarifele aplicate, calitatea apei,
            legislația în vigoare, formulare utile, avize și programul casieriilor.
        </p>

        <div class="row g-4">
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
                    'desc'  => 'Informații și documente necesare pentru obținerea avizului de amplasament și acordului de racordare.',
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
            <div class="col-md-6 col-lg-4">
                <a href="{{ url($item['url']) }}"
                   class="d-flex flex-column h-100 text-decoration-none p-4"
                   style="background:#fff;border-radius:14px;border:1.5px solid var(--aqua-border);transition:all 0.22s;color:var(--aqua-text);"
                   onmouseover="this.style.borderColor='{{ $item['color'] }}';this.style.boxShadow='0 6px 24px rgba(0,119,182,0.10)';this.style.transform='translateY(-3px)';"
                   onmouseout="this.style.borderColor='var(--aqua-border)';this.style.boxShadow='none';this.style.transform='none';">
                    <div class="mb-3 d-flex align-items-center justify-content-center"
                         style="width:56px;height:56px;border-radius:14px;background:{{ $item['color'] }}1a;color:{{ $item['color'] }};">
                        <i class="bi {{ $item['icon'] }}" style="font-size:1.6rem;"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="font-family:'Merriweather',serif;font-size:1rem;color:var(--aqua-dark);">
                        {{ $item['titlu'] }}
                    </h5>
                    <p class="mb-3 flex-grow-1" style="font-size:0.875rem;color:#555;line-height:1.6;">
                        {{ $item['desc'] }}
                    </p>
                    <div class="d-flex align-items-center gap-1 fw-semibold" style="font-size:0.85rem;color:{{ $item['color'] }};">
                        Accesați <i class="bi bi-arrow-right"></i>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

    </div>
</section>
@endsection
