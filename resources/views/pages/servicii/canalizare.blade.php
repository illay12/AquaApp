@extends('layouts.app')

@section('title', 'Canalizare')

@section('page_hero')
    <h1><i class="bi bi-filter-circle-fill me-2"></i> Canalizare</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/servicii') }}">Servicii</a></li>
            <li class="breadcrumb-item active">Canalizare</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:3.5rem 0;">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <h2 class="section-title">Serviciul de canalizare</h2>
                <p>
                    Serviciul de canalizare cuprinde colectarea, transportul și evacuarea apelor uzate menajere,
                    industriale și pluviale prin rețeaua de canalizare, în vederea epurării și evacuării acestora
                    în emisarul natural, fără a afecta mediul înconjurător.
                </p>
                <p>
                    Rețeaua de canalizare are o lungime totală de câteva sute de kilometri și este menținută
                    în permanentă stare de funcționare prin activitatea echipelor noastre de intervenție.
                </p>

                <div class="alert-band mb-4" style="border-radius:8px;">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <strong>Atenție!</strong> Este interzisă aruncarea în rețeaua de canalizare a deșeurilor solide,
                    a uleiurilor uzate, a substanțelor chimice sau a altor materiale care pot provoca înfundări sau poluare.
                </div>

                <h4 class="mb-3" style="font-family:'Merriweather',serif;font-size:1.1rem;color:var(--aqua-dark);">
                    Ce nu se aruncă în canalizare
                </h4>
                <div class="row g-3 mb-4">
                    @foreach([
                        ['bi-x-circle-fill','#dc3545','Șervețele umede','Chiar dacă sunt marcate "biodegradabile", nu se descompun rapid și înfundă rețeaua.'],
                        ['bi-x-circle-fill','#dc3545','Uleiuri de gătit','Solidifică în conducte și creează blocaje grave în rețea.'],
                        ['bi-x-circle-fill','#dc3545','Medicamente','Contaminează apa și nu pot fi eliminate prin epurare clasică.'],
                        ['bi-x-circle-fill','#dc3545','Deșeuri solide','Pampers, absorbante, cotton, resturi alimentare solide.'],
                    ] as [$icon, $color, $titlu, $desc])
                    <div class="col-md-6">
                        <div class="d-flex gap-3 p-3" style="background:#fff5f5;border-radius:10px;border:1px solid #f8d7da;">
                            <i class="bi {{ $icon }}" style="color:{{ $color }};font-size:1.4rem;flex-shrink:0;margin-top:2px;"></i>
                            <div>
                                <div class="fw-bold" style="font-size:0.9rem;">{{ $titlu }}</div>
                                <div class="text-muted" style="font-size:0.82rem;">{{ $desc }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <h4 class="mb-3" style="font-family:'Merriweather',serif;font-size:1.1rem;color:var(--aqua-dark);">
                    Racord canal – cum obții
                </h4>
                <ol style="font-size:0.9rem;line-height:2;">
                    <li>Depuneți cerere de aviz tehnic de racordare la sediul nostru</li>
                    <li>Primiți avizul cu condițiile de racordare la rețeaua publică de canalizare</li>
                    <li>Elaborați proiectul tehnic de racord (prin proiectant autorizat)</li>
                    <li>Obțineți autorizație de construire de la autoritatea locală</li>
                    <li>Executați lucrările și solicitați recepția racordului</li>
                </ol>
                <a href="{{ url('/informatii/formulare') }}" class="btn btn-aqua">
                    <i class="bi bi-file-earmark-arrow-down me-2"></i> Descarcă formularul de cerere
                </a>
            </div>
            <div class="col-lg-4">
                @include('components.sidebar-servicii')
            </div>
        </div>
    </div>
</section>
@endsection
