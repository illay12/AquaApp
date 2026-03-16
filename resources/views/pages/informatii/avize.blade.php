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

@section('content')
<section style="padding:3.5rem 0;">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">

                <h2 class="section-title">Aviz de amplasament și acord de racordare</h2>
                <p class="mb-4">
                    SC AquaServ SA Tulcea eliberează două tipuri de documente tehnice necesare
                    pentru realizarea de construcții sau branșamente la rețelele de apă și canalizare:
                    <strong>avizul de amplasament</strong> și <strong>acordul de racordare</strong>.
                    Documentele pot fi solicitate și prin e-mail, pentru o procesare mai rapidă.
                </p>

                {{-- Aviz de amplasament --}}
                <div class="mb-5">
                    <h3 class="d-flex align-items-center gap-2 mb-3"
                        style="font-family:'Merriweather',serif;font-size:1.15rem;color:var(--aqua-dark);">
                        <span class="d-flex align-items-center justify-content-center rounded-circle"
                              style="width:36px;height:36px;background:var(--aqua-primary);color:#fff;flex-shrink:0;font-size:1rem;">
                            <i class="bi bi-map"></i>
                        </span>
                        Aviz de amplasament
                    </h3>
                    <p style="font-size:0.9375rem;">
                        Avizul de amplasament este necesar în faza de proiectare, pentru a stabili
                        pozițiile rețelelor de apă și canalizare față de obiectivul propus.
                    </p>
                    <div style="background:var(--aqua-bg);border-radius:12px;padding:1.5rem;border:1.5px solid var(--aqua-border);">
                        <h6 class="fw-bold mb-3" style="color:var(--aqua-dark);">
                            <i class="bi bi-list-check me-2 text-aqua"></i>Documente necesare
                        </h6>
                        <ul class="mb-0" style="font-size:0.9rem;line-height:1.9;">
                            <li>Cerere cu datele de identificare și număr de telefon</li>
                            <li>Fișă tehnică</li>
                            <li>Act de proprietate (copie)</li>
                            <li>Planuri de situație la scara 1:5000 sau 1:10000 — <strong>2 exemplare</strong></li>
                            <li>Plan de situație cu distanțele față de limitele de proprietate — <strong>2 exemplare</strong></li>
                            <li>Copie act de identitate (persoane fizice) sau certificat de înregistrare (persoane juridice)</li>
                            <li>Memoriu tehnic elaborat de proiectant autorizat</li>
                        </ul>
                    </div>
                </div>

                {{-- Acord de racordare --}}
                <div class="mb-5">
                    <h3 class="d-flex align-items-center gap-2 mb-3"
                        style="font-family:'Merriweather',serif;font-size:1.15rem;color:var(--aqua-dark);">
                        <span class="d-flex align-items-center justify-content-center rounded-circle"
                              style="width:36px;height:36px;background:var(--aqua-primary);color:#fff;flex-shrink:0;font-size:1rem;">
                            <i class="bi bi-plug"></i>
                        </span>
                        Acord de racordare
                    </h3>
                    <p style="font-size:0.9375rem;">
                        Acordul de racordare este documentul care atestă posibilitatea și condițiile tehnice
                        de branșare la rețeaua de distribuție a apei și/sau la rețeaua de canalizare.
                    </p>
                    <div style="background:var(--aqua-bg);border-radius:12px;padding:1.5rem;border:1.5px solid var(--aqua-border);">
                        <h6 class="fw-bold mb-3" style="color:var(--aqua-dark);">
                            <i class="bi bi-list-check me-2 text-aqua"></i>Documente necesare
                        </h6>
                        <ul class="mb-0" style="font-size:0.9rem;line-height:1.9;">
                            <li>Cerere cu specificarea tipului de racordare solicitat (apă, canalizare sau ambele)</li>
                            <li>Act de proprietate (copie)</li>
                            <li>Act de identitate (copie)</li>
                            <li>Autorizație de construire (pentru clădiri noi)</li>
                            <li>Planuri de situație la scara 1:5000 sau 1:10000 — <strong>2 exemplare</strong></li>
                            <li>
                                Memoriu de calcul al branșamentelor cu DN > 25 mm, cu specificarea
                                debitelor necesare (pentru branșamente mai mari)
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Depunere online --}}
                <div class="mb-5 p-4 rounded-3"
                     style="background:linear-gradient(135deg,#e8f4fc 0%,#f0faff 100%);border:1.5px solid var(--aqua-border);">
                    <h5 class="fw-bold mb-2" style="color:var(--aqua-dark);">
                        <i class="bi bi-envelope-check me-2 text-aqua"></i>Depunere online prin e-mail
                    </h5>
                    <p class="mb-2" style="font-size:0.9rem;">
                        Documentele pot fi transmise electronic la adresa centrului operațional din
                        localitatea dumneavoastră. Aceasta facilitează procesarea mai rapidă a solicitărilor.
                    </p>
                    <a href="mailto:aquaserv_tl@yahoo.com" class="btn btn-aqua btn-sm">
                        <i class="bi bi-envelope me-1"></i> aquaserv_tl@yahoo.com
                    </a>
                </div>

                {{-- Centre operationale --}}
                <h4 class="mb-3" style="font-family:'Merriweather',serif;font-size:1.05rem;color:var(--aqua-dark);">
                    <i class="bi bi-geo-alt text-aqua me-2"></i>Centre operaționale
                </h4>
                <div class="table-responsive mb-4"
                     style="border-radius:12px;overflow:hidden;border:1.5px solid var(--aqua-border);">
                    <table class="table table-hover mb-0" style="font-size:0.9rem;">
                        <thead style="background:var(--aqua-primary);color:#fff;">
                            <tr>
                                <th class="py-3 px-3">Localitate</th>
                                <th class="py-3 px-3">Telefon</th>
                                <th class="py-3 px-3">E-mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach([
                                ['Măcin',    '0240.571.180',                        'centru.macin@aquaservtulcea.ro'],
                                ['Babadag',  '0240.562.340',                        'centru.babadag@aquaservtulcea.ro'],
                                ['Isaccea',  '0240.540.302 / 0754.013.201',         'centru.isaccea@aquaservtulcea.ro'],
                                ['Sulina',   '0240.543.147',                        'centru.sulina@aquaservtulcea.ro'],
                                ['Mahmudia', '0741.198.161',                        'centru.mahmudia@aquaservtulcea.ro'],
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
                                       style="color:var(--aqua-primary);text-decoration:none;">
                                        {{ $email }}
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Info contact principal --}}
                <div style="background:var(--aqua-bg);border-radius:12px;padding:1.5rem;border:1.5px solid var(--aqua-border);">
                    <h6 class="fw-bold text-aqua"><i class="bi bi-info-circle me-2"></i>Contact și program</h6>
                    <p class="mb-0" style="font-size:0.875rem;">
                        Documentele se depun la <strong>sediul central</strong> sau la centrele operaționale de mai sus.
                        Program: <strong>Luni–Vineri, 08:00–15:00</strong>.
                        Informații suplimentare la <a href="mailto:aquaserv_tl@yahoo.com">aquaserv_tl@yahoo.com</a>.
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
