@extends('layouts.app')

@section('title', 'Avize și acorduri')

@section('page_hero')
    <h1><i class="bi bi-patch-check me-2"></i> Avize și acorduri</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/informatii') }}">Informații publice</a></li>
            <li class="breadcrumb-item active">Avize și acorduri</li>
        </ol>
    </nav>
@endsection

@push('styles')
<style>
    @media (max-width: 575.98px) {
        .avize-section { padding: 2rem 0; }
        .avize-box     { padding: 1rem !important; }
        .avize-email-btn { width: 100%; text-align: center; }

        /* Tabel centre → ascundem pe mobil */
        .centre-table  { display: none; }
        /* Carduri centre → afișăm doar pe mobil */
        .centre-cards  { display: flex !important; }
    }
    @media (min-width: 576px) {
        .avize-section { padding: 3.5rem 0; }
        .centre-table  { display: block; }
        .centre-cards  { display: none !important; }
    }
</style>
@endpush

@section('content')
<section class="avize-section">
    <div class="container">
        <div class="row g-4 g-lg-5">
            <div class="col-lg-8">

                <h2 class="section-title">Aviz de amplasament și acord de racordare</h2>
                <p class="mb-4">
                    SC Aquaserv Tulcea eliberează două tipuri de documente tehnice necesare
                    pentru realizarea de construcții sau branșamente la rețelele de apă și canalizare:
                    <strong>avizul de amplasament</strong> și <strong>acordul de racordare</strong>.
                    Documentele pot fi solicitate și prin e-mail, pentru o procesare mai rapidă.
                </p>

                {{-- Link formulare --}}
                <div class="avize-box mb-4 p-4 rounded-3"
                     style="background:linear-gradient(135deg,#fff8e1 0%,#fffde7 100%);border:1.5px solid #ffe082;">
                    <h5 class="fw-bold mb-2" style="color:var(--aqua-dark);">
                        <i class="bi bi-file-earmark-text me-2" style="color:#f59e0b;"></i>Aveți nevoie de formulare?
                    </h5>
                    <p class="mb-3" style="font-size:0.9rem;">
                        Descărcați cererile și formularele necesare 
                        direct de pe pagina dedicată!
                    </p>
                    <a href="{{ route('informatii.formulare') }}" class="btn btn-sm"
                       style="background:#f59e0b;color:#fff;border:none;border-radius:8px;">
                        <i class="bi bi-download me-1"></i> Accesați pagina Formulare
                    </a>
                </div>

                {{-- Aviz de amplasament --}}
                <div class="mb-4">
                    <h3 class="d-flex align-items-center gap-2 mb-3"
                        style="font-family:'Merriweather',serif;font-size:1.1rem;color:var(--aqua-dark);">
                        <span class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0"
                              style="width:36px;height:36px;background:var(--aqua-primary);color:#fff;font-size:1rem;">
                            <i class="bi bi-map"></i>
                        </span>
                        Aviz de amplasament
                    </h3>
                    <p style="font-size:0.9375rem;">
                        Avizul de amplasament este necesar în faza de proiectare, pentru a stabili
                        pozițiile rețelelor de apă și canalizare față de obiectivul propus.
                    </p>
                    <div class="avize-box" style="background:var(--aqua-bg);border-radius:12px;padding:1.5rem;border:1.5px solid var(--aqua-border);">
                        <h6 class="fw-bold mb-3" style="color:var(--aqua-dark);">
                            <i class="bi bi-list-check me-2 text-aqua"></i>Documente necesare
                        </h6>
                        <ul class="mb-0" style="font-size:0.875rem;line-height:1.9;padding-left:1.25rem;">
                            <li>Cerere cu datele de identificare și număr de telefon</li>
                            <li>Fișă tehnică</li>
                            <li>Act de proprietate (copie)</li>
                            <li>Planuri de situație la scara 1:5000 sau 1:10000 — <strong>2 exemplare</strong></li>
                            <li>Plan de situație cu distanțele față de limitele de proprietate — <strong>2 exemplare</strong></li>
                            <li>Copie act de identitate (PF) sau certificat de înregistrare (PJ)</li>
                            <li>Memoriu tehnic elaborat de proiectant autorizat</li>
                        </ul>
                    </div>
                </div>

                {{-- Acord de racordare --}}
                <div class="mb-4">
                    <h3 class="d-flex align-items-center gap-2 mb-3"
                        style="font-family:'Merriweather',serif;font-size:1.1rem;color:var(--aqua-dark);">
                        <span class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0"
                              style="width:36px;height:36px;background:var(--aqua-primary);color:#fff;font-size:1rem;">
                            <i class="bi bi-plug"></i>
                        </span>
                        Acord de racordare
                    </h3>
                    <p style="font-size:0.9375rem;">
                        Acordul de racordare atestă posibilitatea și condițiile tehnice de branșare
                        la rețeaua de distribuție a apei și/sau la rețeaua de canalizare.
                    </p>
                    <div class="avize-box" style="background:var(--aqua-bg);border-radius:12px;padding:1.5rem;border:1.5px solid var(--aqua-border);">
                        <h6 class="fw-bold mb-3" style="color:var(--aqua-dark);">
                            <i class="bi bi-list-check me-2 text-aqua"></i>Documente necesare
                        </h6>
                        <ul class="mb-0" style="font-size:0.875rem;line-height:1.9;padding-left:1.25rem;">
                            <li>Cerere cu specificarea tipului de racordare (apă, canalizare sau ambele)</li>
                            <li>Act de proprietate (copie)</li>
                            <li>Act de identitate (copie)</li>
                            <li>Autorizație de construire (pentru clădiri noi)</li>
                            <li>Planuri de situație la scara 1:5000 sau 1:10000 — <strong>2 exemplare</strong></li>
                            <li>Memoriu de calcul pentru branșamente cu DN &gt; 25 mm</li>
                        </ul>
                    </div>
                </div>

                {{-- Depunere online --}}
                <div class="avize-box mb-4 p-4 rounded-3"
                     style="background:linear-gradient(135deg,#e8f4fc 0%,#f0faff 100%);border:1.5px solid var(--aqua-border);">
                    <h5 class="fw-bold mb-2" style="color:var(--aqua-dark);">
                        <i class="bi bi-envelope-check me-2 text-aqua"></i>Depunere online prin e-mail
                    </h5>
                    <p class="mb-3" style="font-size:0.9rem;">
                        Documentele pot fi transmise electronic la adresa centrului operațional din
                        localitatea dumneavoastră, pentru o procesare mai rapidă.
                    </p>
                    <a href="mailto:secretariat@aquaservtulcea.ro" class="btn btn-aqua btn-sm avize-email-btn">
                        <i class="bi bi-envelope me-1"></i> secretariat@aquaservtulcea.ro
                    </a>
                </div>

                {{-- Centre operationale --}}
                <h4 class="mb-3" style="font-family:'Merriweather',serif;font-size:1.05rem;color:var(--aqua-dark);">
                    <i class="bi bi-geo-alt text-aqua me-2"></i>Centre operaționale
                </h4>

                {{-- TABEL — desktop --}}
                <div class="centre-table table-responsive mb-4"
                     style="border-radius:12px;overflow:hidden;border:1.5px solid var(--aqua-border);">
                    <table class="table table-hover mb-0" style="font-size:0.875rem;">
                        <thead style="background:var(--aqua-primary);color:#fff;">
                            <tr>
                                <th class="py-3 px-3">Localitate</th>
                                <th class="py-3 px-3">Telefon</th>
                                <th class="py-3 px-3">E-mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach([
                                ['Măcin',    '0240.571.180',              'centru.macin@aquaservtulcea.ro'],
                                ['Babadag',  '0240.562.340',              'centru.babadag@aquaservtulcea.ro'],
                                ['Isaccea',  '0240.540.302 / 0754.013.201','centru.isaccea@aquaservtulcea.ro'],
                                ['Sulina',   '0240.543.147',              'centru.sulina@aquaservtulcea.ro'],
                                ['Mahmudia', '0741.198.161',              'centru.mahmudia@aquaservtulcea.ro'],
                            ] as [$localitate, $telefon, $email])
                            <tr>
                                <td class="px-3 fw-semibold" style="color:var(--aqua-dark);">
                                    <i class="bi bi-building text-aqua me-1"></i> {{ $localitate }}
                                </td>
                                <td class="px-3">
                                    <a href="tel:{{ preg_replace('/[^0-9]/','',$telefon) }}"
                                       style="color:var(--aqua-primary);text-decoration:none;">
                                        <i class="bi bi-telephone me-1"></i>{{ $telefon }}
                                    </a>
                                </td>
                                <td class="px-3">
                                    <a href="mailto:{{ $email }}"
                                       style="color:var(--aqua-primary);text-decoration:none;word-break:break-all;">
                                        {{ $email }}
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- CARDURI — mobil --}}
                <div class="centre-cards flex-column gap-2 mb-4">
                    @foreach([
                        ['Măcin',    '0240.571.180',              'centru.macin@aquaservtulcea.ro'],
                        ['Babadag',  '0240.562.340',              'centru.babadag@aquaservtulcea.ro'],
                        ['Isaccea',  '0240.540.302 / 0754.013.201','centru.isaccea@aquaservtulcea.ro'],
                        ['Sulina',   '0240.543.147',              'centru.sulina@aquaservtulcea.ro'],
                        ['Mahmudia', '0741.198.161',              'centru.mahmudia@aquaservtulcea.ro'],
                    ] as [$localitate, $telefon, $email])
                    <div style="background:var(--aqua-bg);border-radius:10px;padding:0.875rem 1rem;border:1.5px solid var(--aqua-border);">
                        <div class="fw-bold mb-1" style="color:var(--aqua-dark);font-size:0.9rem;">
                            <i class="bi bi-building text-aqua me-1"></i> {{ $localitate }}
                        </div>
                        <div class="mb-1">
                            <a href="tel:{{ preg_replace('/[^0-9]/','',$telefon) }}"
                               style="color:var(--aqua-primary);text-decoration:none;font-size:0.875rem;">
                                <i class="bi bi-telephone me-1"></i>{{ $telefon }}
                            </a>
                        </div>
                        <div>
                            <a href="mailto:{{ $email }}"
                               style="color:var(--aqua-primary);text-decoration:none;font-size:0.8rem;word-break:break-all;">
                                <i class="bi bi-envelope me-1"></i>{{ $email }}
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Info contact --}}
                <div class="avize-box" style="background:var(--aqua-bg);border-radius:12px;padding:1.5rem;border:1.5px solid var(--aqua-border);">
                    <h6 class="fw-bold text-aqua"><i class="bi bi-info-circle me-2"></i>Contact și program</h6>
                    <p class="mb-0" style="font-size:0.875rem;">
                        Documentele se depun la <strong>sediul central</strong> sau la centrele operaționale de mai sus.
                        Program: <strong>Luni–Vineri, 08:00–16:00</strong>.
                        Informații la <a href="mailto:secretariat@aquaservtulcea.ro">secretariat@aquaservtulcea.ro</a>.
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
