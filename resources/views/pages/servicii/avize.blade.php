@extends('layouts.app')

@section('title', 'Avize și autorizații')

@section('page_hero')
    <h1><i class="bi bi-file-earmark-check-fill me-2"></i> Avize și autorizații</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/servicii') }}">Servicii</a></li>
            <li class="breadcrumb-item active">Avize și autorizații</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:3.5rem 0;">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <h2 class="section-title">Tipuri de avize emise</h2>
                <p>
                    AquaServ S.A. emite avize și autorizații necesare pentru realizarea lucrărilor de branșare
                    la rețeaua de apă potabilă și racordare la rețeaua de canalizare, în conformitate cu
                    legislația în vigoare.
                </p>

                <div class="row g-4 mb-5">
                    @foreach([
                        ['bi-geo-alt','Aviz de amplasament','Necesar în faza de proiectare, pentru identificarea rețelelor existente și a condițiilor de amplasare a obiectivului.',
                            ['Cerere tip completată','Copie plan de situație 1:500 sau 1:1000','Copie act proprietate','Copie CI solicitant']],
                        ['bi-file-earmark-text','Aviz tehnic de racordare','Documentul care stabilește condițiile tehnice pentru realizarea branșamentului/racordului la rețeaua publică.',
                            ['Cerere tip completată','Aviz de amplasament (dacă există)','Plan de situație cu propunerea de branșament','Memoriu tehnic']],
                        ['bi-clipboard-check','Recepție lucrări','Recepția branșamentului/racordului executat și montarea contorului de apă la branșamentele noi.',
                            ['Cerere de recepție','Proiect tehnic aprobat','Proces verbal de execuție','Autorizație de construire']],
                    ] as [$icon, $titlu, $desc, $documente])
                    <div class="col-12">
                        <div class="card p-4">
                            <div class="d-flex align-items-start gap-3">
                                <div style="width:52px;height:52px;background:var(--aqua-bg);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;color:var(--aqua-primary);flex-shrink:0;border:1.5px solid var(--aqua-border);">
                                    <i class="bi {{ $icon }}"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 style="font-family:'Merriweather',serif;font-size:1rem;margin-bottom:0.5rem;">{{ $titlu }}</h5>
                                    <p class="text-muted mb-3" style="font-size:0.875rem;">{{ $desc }}</p>
                                    <div>
                                        <strong style="font-size:0.82rem;color:var(--aqua-dark);text-transform:uppercase;letter-spacing:0.05em;">Documente necesare:</strong>
                                        <ul class="mt-1 mb-0" style="font-size:0.875rem;padding-left:1.2rem;">
                                            @foreach($documente as $doc)
                                                <li>{{ $doc }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div style="background:var(--aqua-bg);border-radius:12px;padding:1.5rem;border:1.5px solid var(--aqua-border);">
                    <h5 style="font-family:'Merriweather',serif;font-size:1rem;color:var(--aqua-dark);">
                        <i class="bi bi-info-circle text-aqua me-2"></i> Termen de eliberare
                    </h5>
                    <p class="mb-0" style="font-size:0.875rem;">
                        Termenul legal de emitere a avizelor este de <strong>30 de zile</strong> de la data depunerii
                        documentației complete, conform Legii nr. 241/2006. Documentele se depun la sediul central
                        sau se trimit prin poștă/email la adresa <a href="mailto:avize@aquaserv.ro">avize@aquaserv.ro</a>.
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                @include('components.sidebar-servicii')
            </div>
        </div>
    </div>
</section>
@endsection
