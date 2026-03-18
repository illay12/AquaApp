@extends('layouts.app')

@section('title', 'Legea 544/2001 — Acces la informații de interes public')

@section('page_hero')
    <h1><i class="bi bi-journal-bookmark me-2"></i> Legea 544/2001</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/informatii') }}">Informații publice</a></li>
            <li class="breadcrumb-item active">Legea 544/2001</li>
        </ol>
    </nav>
@endsection

@push('styles')
<style>
    @media (max-width: 767.98px) {
        .legea544-intro { padding: 1rem 1.1rem !important; }
        .legea544-intro p { font-size: 0.875rem !important; }
    }
    @media (max-width: 575.98px) {
        .list-group-item .badge { display: none; }
        .list-group-item { font-size: 0.85rem; }
        .list-group-item .bi-download { display: none; }
    }
</style>
@endpush

@section('content')
<section style="padding:2rem 0 3.5rem;">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">

                <h2 class="section-title">Informații publice</h2>

                <div class="mb-4 legea544-intro" style="border-left:4px solid var(--aqua-primary);background:#f0f8ff;padding:1.25rem 1.5rem;border-radius:0 10px 10px 0;">
                    <p class="mb-2" style="font-size:0.9375rem;line-height:1.75;">
                        Accesul liber și neîngrădit al oricărei persoane din România la orice informații de interes public,
                        definite astfel prin <strong>Legea nr. 544/2001</strong>, constituie unul dintre principiile
                        fundamentale ale relațiilor dintre persoane și autoritățile publice.
                    </p>
                    <p class="mb-0" style="font-size:0.9375rem;line-height:1.75;">
                        Prin <em>informație de interes public</em> se înțelege orice informație care privește
                        activitățile sau rezultă din activitățile unei autorități publice sau instituții publice,
                        indiferent de suportul ori de forma sau de modul de exprimare a informației.
                    </p>
                </div>

                {{-- Persoane responsabile --}}
                <div class="mb-5">
                    <h4 class="d-flex align-items-center gap-2 mb-3" style="font-family:'Merriweather',serif;font-size:1.05rem;color:var(--aqua-dark);">
                        <i class="bi bi-person-badge text-aqua"></i> Persoane responsabile
                    </h4>
                    <p class="mb-3" style="font-size:0.9375rem;">
                        Pentru asigurarea accesului la informațiile de interes public, <strong>Compania Aquaserv S.A.</strong>
                        a desemnat următoarele persoane cu responsabilități în acest domeniu:
                    </p>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="card h-100" style="border-radius:12px;border:1.5px solid var(--aqua-border);">
                                <div class="card-body">
                                    <div class="d-flex align-items-center gap-2 mb-3">
                                        <span style="width:40px;height:40px;background:var(--aqua-primary)1a;color:var(--aqua-primary);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.25rem;flex-shrink:0;">
                                            <i class="bi bi-person-fill"></i>
                                        </span>
                                        <div>
                                            <div class="fw-semibold" style="font-size:0.85rem;color:#888;text-transform:uppercase;letter-spacing:0.05em;">Responsabil difuzare informații</div>
                                        </div>
                                    </div>
                                    <p class="fw-bold mb-1">Demidov Aurel</p>
                                    <p class="mb-1 text-muted" style="font-size:0.875rem;">Compartiment Relații cu Publicul</p>
                                    <p class="mb-1" style="font-size:0.875rem;">
                                        <i class="bi bi-telephone text-aqua me-1"></i>
                                        <a href="tel:+40240524310" class="text-decoration-none">0240.524.310 </a>
                                    </p>
                                    <p class="mb-0" style="font-size:0.875rem;">
                                        <i class="bi bi-envelope text-aqua me-1"></i>
                                        <a href="mailto:demidov.aurel@aquaservtulcea.ro" class="text-decoration-none">demidov.aurel@aquaservtulcea.ro</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100" style="border-radius:12px;border:1.5px solid var(--aqua-border);">
                                <div class="card-body">
                                    <div class="d-flex align-items-center gap-2 mb-3">
                                        <span style="width:40px;height:40px;background:var(--aqua-primary)1a;color:var(--aqua-primary);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.25rem;flex-shrink:0;">
                                            <i class="bi bi-megaphone-fill"></i>
                                        </span>
                                        <div>
                                            <div class="fw-semibold" style="font-size:0.85rem;color:#888;text-transform:uppercase;letter-spacing:0.05em;">Responsabil informarea presei</div>
                                        </div>
                                    </div>
                                    <p class="fw-bold mb-1">Demidov Aurel</p>
                                    <p class="mb-1 text-muted" style="font-size:0.875rem;">Compartiment Relații cu Publicul</p>
                                    <p class="mb-1" style="font-size:0.875rem;">
                                        <i class="bi bi-telephone text-aqua me-1"></i>
                                        <a href="tel:+40240524310" class="text-decoration-none">0240.524.310</a>
                                    </p>
                                    <p class="mb-0" style="font-size:0.875rem;">
                                        <i class="bi bi-envelope text-aqua me-1"></i>
                                        <a href="mailto:demidov.aurel@aquaservtulcea.ro" class="text-decoration-none">demidov.aurel@aquaservtulcea.ro</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Modalitate de solicitare --}}
                <div class="mb-5">
                    <h4 class="d-flex align-items-center gap-2 mb-3" style="font-family:'Merriweather',serif;font-size:1.05rem;color:var(--aqua-dark);">
                        <i class="bi bi-send text-aqua"></i> Modalitate de solicitare
                    </h4>
                    <p style="font-size:0.9375rem;line-height:1.75;">
                        Pentru a solicita în scris informații de interes public cu privire la activitatea
                        <strong>S.C. Aquaserv S.A. Tulcea</strong> puteți trimite o cerere, conform formularelor
                        de mai jos, pe adresa <strong>str. Tudor Vladimirescu nr. 2, municipiul Tulcea, județul Tulcea</strong>,
                        sau prin poștă electronică la adresa
                        <a href="mailto:secretariat@aquaservtulcea.ro">secretariat@aquaservtulcea.ro</a>.
                    </p>
                </div>

                {{-- Modalități de contestare --}}
                <div class="mb-5">
                    <h4 class="d-flex align-items-center gap-2 mb-3" style="font-family:'Merriweather',serif;font-size:1.05rem;color:var(--aqua-dark);">
                        <i class="bi bi-shield-exclamation text-aqua"></i> Modalități de contestare a deciziilor
                    </h4>
                    <p style="font-size:0.9375rem;line-height:1.75;">
                        În cazul în care o persoană consideră că dreptul său privind accesul la informațiile de
                        interes public a fost încălcat, aceasta se poate adresa cu <strong>reclamație administrativă</strong>,
                        conform formularelor de mai jos, în conformitate cu prevederile:
                    </p>
                    <ul style="font-size:0.9375rem;line-height:1.9;color:#444;">
                        <li>Art. 21 alin. (2) din <strong>Legea nr. 544/2001</strong> privind liberul acces la informațiile de interes public, cu modificările și completările ulterioare;</li>
                        <li>Art. 32–34 din <strong>H.G. nr. 123/2002</strong> pentru aprobarea Normelor metodologice de aplicare a Legii nr. 544/2001;</li>
                        <li><strong>Hotărârea nr. 478/2016</strong> pentru modificarea și completarea Normelor metodologice aprobate prin H.G. nr. 123/2002;</li>
                        <li><strong>Legea nr. 144/2016</strong> pentru modificarea art. 2 lit. a) din Legea nr. 544/2001.</li>
                    </ul>
                </div>

                {{-- Formulare --}}
                <div class="mb-2">
                    <h4 class="d-flex align-items-center gap-2 mb-3" style="font-family:'Merriweather',serif;font-size:1.05rem;color:var(--aqua-dark);">
                        <i class="bi bi-file-earmark-arrow-down text-aqua"></i> Documente și formulare
                    </h4>
                    <div class="list-group" style="border-radius:10px;overflow:hidden;">
                        @foreach([
                            ['Raport-de-evaluare.pdf',                   'Raport de evaluare'],
                            ['Lista-documente-oficiu.pdf',               'Listă documente oficiu'],
                            ['Reclamatie-administrativa.pdf',            'Reclamație administrativă'],
                            ['Reclamatie-administrativa2.pdf',           'Reclamație administrativă (varianta 2)'],
                            ['Solicitare-informatii-de-interes-public.pdf', 'Solicitare informații de interes public'],
                            ['Buletin-informativ-2020.pdf',              'Buletin informativ 2020'],
                        ] as [$fisier, $titlu])
                        <a href="{{ asset('storage/documente/legea504/' . $fisier) }}" target="_blank"
                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <span>
                                <i class="bi bi-file-earmark-pdf text-danger me-2"></i>
                                {{ $titlu }}
                            </span>
                            <span class="d-flex align-items-center gap-2">
                                <span class="badge" style="background:#fff0f0;color:#dc3545;font-size:0.75rem;font-weight:600;">PDF</span>
                                <i class="bi bi-download text-aqua" style="font-size:0.9rem;"></i>
                            </span>
                        </a>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="col-lg-4 d-none d-lg-block">
                @include('components.sidebar-informatii')
            </div>
        </div>
    </div>
</section>
@endsection
