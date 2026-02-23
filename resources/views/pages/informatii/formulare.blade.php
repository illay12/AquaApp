@extends('layouts.app')

@section('title', 'Formulare utile')

@section('page_hero')
    <h1><i class="bi bi-file-earmark-arrow-down me-2"></i> Formulare utile</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/informatii') }}">Informații publice</a></li>
            <li class="breadcrumb-item active">Formulare utile</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:3.5rem 0;">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <h2 class="section-title">Formulare disponibile pentru descărcare</h2>
                <p>
                    Mai jos găsiți formularele tipizate necesare pentru diverse solicitări adresate AquaServ S.A.
                    Documentele sunt disponibile în format Word (.doc) sau PDF. Completați formularul dorit și
                    depuneți-l la sediul nostru sau trimiteți-l prin email.
                </p>

                @foreach([
                    [
                        'bi-droplet','Branșamente și racorduri',
                        [
                            ['Cerere aviz de amplasament','doc','formulare/cerere-aviz-amplasament.doc'],
                            ['Fișă tehnică aviz de amplasament','doc','formulare/fisa-tehnica-aviz-amplasament.doc'],
                            ['Cerere aviz tehnic de racordare','doc','formulare/cerere-aviz-tehnic-racordare.doc'],
                            ['Cerere recepție branșament / racord','doc','formulare/cerere-receptie.doc'],
                        ]
                    ],
                    [
                        'bi-person','Clienți persoane fizice',
                        [
                            ['Cerere încheiere contract nou','doc','formulare/cerere-contract-nou.doc'],
                            ['Cerere schimbare titular contract','doc','formulare/cerere-schimbare-titular.doc'],
                            ['Cerere reziliere contract','doc','formulare/cerere-reziliere.doc'],
                            ['Cerere restituire garanție','doc','formulare/cerere-restituire-garantie.doc'],
                        ]
                    ],
                    [
                        'bi-building','Clienți persoane juridice / instituții',
                        [
                            ['Cerere încheiere contract (PJ)','doc','formulare/cerere-contract-pj.doc'],
                            ['Cerere schimbare date facturare','doc','formulare/cerere-date-facturare.doc'],
                            ['Declarație pe proprie răspundere consum','doc','formulare/declaratie-consum.doc'],
                        ]
                    ],
                    [
                        'bi-tools','Diverse',
                        [
                            ['Cerere intervenție rețea publică','doc','formulare/cerere-interventie.doc'],
                            ['Cerere verificare contor','doc','formulare/cerere-verificare-contor.doc'],
                            ['Sesizare calitate apă','doc','formulare/sesizare-calitate.doc'],
                            ['Cerere informații publice (Legea 544/2001)','pdf','formulare/cerere-544-2001.pdf'],
                        ]
                    ],
                ] as [$icon, $categorie, $formulare])
                <div class="mb-5">
                    <h4 class="d-flex align-items-center gap-2 mb-3" style="font-family:'Merriweather',serif;font-size:1.05rem;color:var(--aqua-dark);">
                        <i class="bi {{ $icon }} text-aqua"></i> {{ $categorie }}
                    </h4>
                    <div class="row g-2">
                        @foreach($formulare as [$titlu, $tip, $fisier])
                        <div class="col-md-6">
                            <a href="{{ asset($fisier) }}" download
                               class="d-flex align-items-center gap-3 p-3 text-decoration-none"
                               style="background:var(--aqua-bg);border-radius:8px;border:1px solid var(--aqua-border);color:var(--aqua-text);transition:all 0.2s;"
                               onmouseover="this.style.borderColor='var(--aqua-primary)';this.style.background='#e8f4fc';"
                               onmouseout="this.style.borderColor='var(--aqua-border)';this.style.background='var(--aqua-bg)';">
                                <i class="bi bi-file-earmark-{{ $tip === 'pdf' ? 'pdf' : 'word' }}"
                                   style="font-size:1.8rem;color:{{ $tip === 'pdf' ? '#dc3545' : '#0d6efd' }};flex-shrink:0;"></i>
                                <div class="flex-grow-1">
                                    <div style="font-size:0.875rem;font-weight:600;line-height:1.3;">{{ $titlu }}</div>
                                    <div style="font-size:0.75rem;color:var(--aqua-gray);text-transform:uppercase;">{{ strtoupper($tip) }}</div>
                                </div>
                                <i class="bi bi-download text-muted"></i>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach

                <div style="background:var(--aqua-bg);border-radius:12px;padding:1.5rem;border:1.5px solid var(--aqua-border);">
                    <h6 class="fw-bold text-aqua"><i class="bi bi-info-circle me-2"></i>Depunere documente</h6>
                    <p class="mb-0" style="font-size:0.875rem;">
                        Formularele completate se pot depune la <strong>Sediul central</strong> (Str. Principală nr. 1),
                        la orice <strong>agenție</strong> sau se pot trimite pe email la
                        <a href="mailto:office@aquaserv.ro">office@aquaserv.ro</a>.
                        Program depunere documente: <strong>Luni–Vineri, 08:00–14:30</strong>.
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                @include('components.sidebar-informatii')
            </div>
        </div>
    </div>
</section>
@endsection
