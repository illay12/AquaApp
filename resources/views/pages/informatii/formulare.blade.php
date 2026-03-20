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
                    Mai jos găsiți formularele tipizate necesare pentru diverse solicitări adresate Aquaserv S.A.
                    Documentele sunt disponibile în format PDF. Completați formularul dorit și
                    depuneți-l la sediul nostru sau trimiteți-l prin email.
                </p>

                @foreach([
                    [
                        'bi-person','Clienți persoane fizice (utilizatori casnici)',
                        [
                            ['Încheiere contract utilizatori casnici','pdf','formulare/cerere-contract-nou.pdf'],
                        ]
                    ],
                    [
                        'bi-building','Clienți persoane juridice / agenți economici',
                        [
                            ['Încheiere contract persoane juridice','pdf','formulare/cerere-contract-pj.pdf'],
                            ['Reziliere agenți economici','pdf','formulare/cerere-reziliere-pj.pdf'],
                        ]
                    ],
                    [
                        'bi-tools','Diverse',
                        [
                            ['Cerere verificare metrologică contor','pdf','formulare/cerere-verificare-metrologica.pdf'],
                            ['Cerere solicitare servicii','pdf','formulare/cerere-solicitare-servicii.pdf'],

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
                            <a href="{{ Storage::url($fisier) }}" target="_blank" rel="noopener noreferrer"
                               class="d-flex align-items-center gap-3 p-3 text-decoration-none"
                               style="background:var(--aqua-bg);border-radius:8px;border:1px solid var(--aqua-border);color:var(--aqua-text);transition:all 0.2s;"
                               onmouseover="this.style.borderColor='var(--aqua-primary)';this.style.background='#e8f4fc';"
                               onmouseout="this.style.borderColor='var(--aqua-border)';this.style.background='var(--aqua-bg)';">
                                <i class="bi bi-file-earmark-pdf"
                                   style="font-size:1.8rem;color:#dc3545;flex-shrink:0;"></i>
                                <div class="flex-grow-1">
                                    <div style="font-size:0.875rem;font-weight:600;line-height:1.3;">{{ $titlu }}</div>
                                    <div style="font-size:0.75rem;color:var(--aqua-gray);text-transform:uppercase;">PDF</div>
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
                        Formularele completate se pot depune 
                        la orice <strong>agenție</strong> sau se pot trimite pe email la
                        <a href="mailto:secretariat@aquaservtulcea.ro"> secretariat@aquaservtulcea.ro</a>.
                        Program depunere documente: <strong>Luni–Vineri, 07:30–16:00</strong>.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 d-none d-lg-block">
                @include('components.sidebar-informatii')
            </div>
        </div>
    </div>
</section>
@endsection
