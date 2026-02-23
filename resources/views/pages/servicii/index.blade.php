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
                    <a href="{{ url('/servicii/'.$slug) }}" class="btn btn-outline-aqua btn-sm mt-auto align-self-start">
                        Detalii <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
