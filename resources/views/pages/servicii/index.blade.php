@extends('layouts.app')

@section('title', 'Servicii')

@section('page_hero')
    <h1><i class="bi bi-gear-fill me-2"></i> Serviciile noastre</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item active">Servicii</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:3.5rem 0;">
    <div class="container">
        <div class="row g-4">
            @foreach([
                ['bi-droplet-fill','Alimentare cu apă','alimentare-apa','var(--aqua-primary)',
                    'Captăm, tratăm și distribuim apă potabilă de înaltă calitate pentru populația și agenții economici din județ. Rețeaua noastră acoperă peste 150 de localități.',
                    ['Captare și tratare apă','Distribuție prin rețea','Branșamente noi','Contorizare și telecitire']],
                ['bi-filter-circle-fill','Canalizare','canalizare','#0096c7',
                    'Colectăm și transportăm apele uzate menajere și industriale prin rețeaua de canalizare, asigurând intervenție rapidă la avarii și lucrări de mentenanță.',
                    ['Colectare ape uzate','Transport prin rețea','Racorduri noi','Intervenții avarii']],
                ['bi-recycle','Epurare ape uzate','epurare','#00b4d8',
                    'Tratăm și epurăm apele uzate colectate în stații moderne de epurare, respectând normele europene de mediu înainte de evacuarea în emisar.',
                    ['Epurare mecano-biologică','Tratare nămol','Monitorizare emisar','Conformitate mediu']],
                ['bi-file-earmark-check-fill','Avize și autorizații','avize','#48cae4',
                    'Emitem avize de amplasament, avize tehnice și autorizații de racordare pentru branșamente apă și racorduri canal, atât pentru persoane fizice cât și juridice.',
                    ['Aviz amplasament','Aviz tehnic racordare','Autorizație construire','Recepție lucrări']],
                ['bi-clipboard-data-fill','Monitorizarea calității apei',null,'#0096c7',
                    'Monitorizăm permanent calitatea apei potabile distribuite prin rețea, efectuând analize fizico-chimice și bacteriologice conform standardelor europene în vigoare.',
                    ['Analize fizico-chimice','Analize bacteriologice','Buletine de analiză','Conformitate standarde UE']],
                ['bi-briefcase-fill','Prestații către terți',null,'#023e8a',
                    'Oferim servicii specializate către terți: intervenții pe rețele de apă și canal, lucrări de construcție și reparații, vidanjare, precum și alte prestații tehnice la cerere.',
                    ['Intervenții rețele','Lucrări construcție-montaj','Vidanjare','Alte prestații tehnice']],
                ['bi-truck','Închirieri de utilaje',null,'#0077b6',
                    'Punem la dispoziție utilaje specializate pentru lucrări de construcții, săpături și intervenții tehnice. Parcul nostru auto include echipamente moderne pentru diverse tipuri de lucrări.',
                    ['Excavatoare','Buldoexcavatoare','Autoutilitare','Echipamente specializate']],
            ] as [$icon, $titlu, $slug, $color, $desc, $lista])
            <div class="col-md-6">
                <div class="card h-100 p-4">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div style="width:60px;height:60px;background:{{ $color }};border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.6rem;color:#fff;flex-shrink:0;">
                            <i class="bi {{ $icon }}"></i>
                        </div>
                        <h4 style="font-family:'Merriweather',serif;font-size:1.1rem;margin:0;">{{ $titlu }}</h4>
                    </div>
                    <p class="text-muted" style="font-size:0.875rem;">{{ $desc }}</p>
                    <ul style="font-size:0.875rem;padding-left:1.2rem;">
                        @foreach($lista as $item)
                            <li class="mb-1">{{ $item }}</li>
                        @endforeach
                    </ul>
                    @if($slug)
                    <a href="{{ url('/servicii/'.$slug) }}" class="btn btn-outline-aqua btn-sm mt-auto align-self-start">
                        Detalii <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section style="padding:2rem 0 3.5rem;">
    <div class="container">
        <h2 class="section-title mb-4"><i class="bi bi-file-earmark-text me-2"></i>Tarife</h2>
        <div class="card p-4">
            <h5 style="font-family:'Merriweather',serif;" class="mb-3">
                Tarife noi — Anul 2025
                <small class="text-muted fw-normal fs-6 ms-2">(actualizat 25.04.2025)</small>
            </h5>
            <ul class="list-unstyled mb-0">
                <li class="mb-2"><i class="bi bi-file-earmark-pdf-fill text-danger me-2"></i>Tarife servicii și închiriere utilaje 2025</li>
                <li class="mb-2"><i class="bi bi-file-earmark-pdf-fill text-danger me-2"></i>Hotărârea 131 din 14.04.2025 – Modificare tarife servicii conexe</li>
                <li><i class="bi bi-file-earmark-pdf-fill text-danger me-2"></i>Notă de fundamentare tarife 2025</li>
            </ul>
        </div>
    </div>
</section>
@endsection
