@extends('layouts.app')

@section('title', 'Despre noi')

@section('page_hero')
    <h1><i class="bi bi-building me-2"></i> Despre noi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item active">Despre noi</li>
        </ol>
    </nav>
@endsection

@section('content')

{{-- INTRO --}}
<section style="padding:3.5rem 0;">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-7">
                <h2 class="section-title">Cine suntem</h2>
                <p>
                    <strong>AquaServ S.A.</strong> este operatorul regional de servicii de alimentare cu apă potabilă
                    și de canalizare, autorizat de Autoritatea Națională de Reglementare pentru Serviciile Comunitare
                    de Utilități Publice (A.N.R.S.C.), care deservește populația și agenții economici din județul nostru.
                </p>
                <p>
                    Compania are ca obiect principal de activitate captarea, tratarea și distribuția apei potabile,
                    precum și colectarea și epurarea apelor uzate, asigurând servicii de calitate pentru peste
                    <strong>50.000 de abonați</strong> din peste <strong>150 de localități</strong>.
                </p>
                <p>
                    Ne angajăm să furnizăm apă potabilă care îndeplinește toți parametrii de calitate impuși
                    de legislația națională și europeană, punând siguranța și sănătatea comunității pe primul loc.
                </p>

                <div class="row g-3 mt-2">
                    <div class="col-6">
                        <div class="p-3 text-center" style="background:var(--aqua-bg);border-radius:12px;border:1.5px solid var(--aqua-border);">
                            <div style="font-size:2rem;font-weight:800;color:var(--aqua-primary);">1897</div>
                            <div style="font-size:0.82rem;color:var(--aqua-gray);font-weight:600;">Anul înființării primei uzine</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 text-center" style="background:var(--aqua-bg);border-radius:12px;border:1.5px solid var(--aqua-border);">
                            <div style="font-size:2rem;font-weight:800;color:var(--aqua-primary);">24/7</div>
                            <div style="font-size:0.82rem;color:var(--aqua-gray);font-weight:600;">Dispecerat avarii activ</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div style="background:linear-gradient(135deg,var(--aqua-dark),var(--aqua-primary));border-radius:16px;padding:2.5rem;color:#fff;text-align:center;">
                    <i class="bi bi-droplet-fill" style="font-size:4rem;opacity:0.8;"></i>
                    <h4 style="font-family:'Merriweather',serif;margin-top:1rem;">Misiunea noastră</h4>
                    <p style="opacity:0.9;font-size:0.95rem;line-height:1.75;margin:0;">
                        Să asigurăm servicii de alimentare cu apă și canalizare sigure, accesibile și de calitate,
                        contribuind la sănătatea și bunăstarea comunității, cu respect față de mediu.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- VALORI --}}
<section style="background:var(--aqua-bg);padding:3.5rem 0;">
    <div class="container">
        <h2 class="section-title">Valorile noastre</h2>
        <div class="row g-4">
            @foreach([
                ['bi-shield-check','Calitate','Furnizăm apă potabilă care respectă toate normele naționale și europene de calitate.'],
                ['bi-people-fill','Comunitate','Suntem dedicați comunității pe care o servim, punând nevoile cetățenilor pe primul loc.'],
                ['bi-leaf','Mediu','Acționăm responsabil față de mediu, minimizând impactul activității noastre.'],
                ['bi-graph-up','Transparență','Comunicăm deschis cu cetățenii, partenerii și autoritățile despre activitatea noastră.'],
            ] as [$icon, $titlu, $desc])
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 text-center p-4">
                    <div style="width:64px;height:64px;background:var(--aqua-primary);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1.2rem;font-size:1.8rem;color:#fff;">
                        <i class="bi {{ $icon }}"></i>
                    </div>
                    <h5 style="font-family:'Merriweather',serif;font-size:1rem;">{{ $titlu }}</h5>
                    <p class="text-muted mb-0" style="font-size:0.875rem;">{{ $desc }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CONDUCERE --}}
<section style="padding:3.5rem 0;">
    <div class="container">
        <h2 class="section-title">Conducerea societății</h2>
        <div class="row g-4">
            @foreach([
                ['Director General','Ion Popescu','ion.popescu@aquaserv.ro'],
                ['Director Tehnic','Maria Ionescu','maria.ionescu@aquaserv.ro'],
                ['Director Economic','Gheorghe Radu','gheorghe.radu@aquaserv.ro'],
                ['Director Comercial','Ana Constantin','ana.constantin@aquaserv.ro'],
            ] as [$functie, $nume, $email])
            <div class="col-md-6 col-lg-3">
                <div class="card text-center p-4">
                    <div style="width:72px;height:72px;background:var(--aqua-bg);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;font-size:2rem;color:var(--aqua-primary);border:2px solid var(--aqua-border);">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <h6 class="fw-bold mb-1">{{ $nume }}</h6>
                    <p class="text-muted mb-2" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.05em;">{{ $functie }}</p>
                    <a href="mailto:{{ $email }}" style="font-size:0.8rem;color:var(--aqua-primary);">{{ $email }}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CENTRE OPERATIONALE --}}
<section style="background:var(--aqua-bg);padding:3.5rem 0;">
    <div class="container">
        <h2 class="section-title">Centre operaționale</h2>
        <div class="row g-4">
            @foreach([
                ['Centru Operațional Tulcea','Str. Principală nr. 1, Tulcea','0240 511 111','Lun–Vin: 08:00–16:30'],
                ['Centru Operațional Măcin','Str. Dunării nr. 5, Măcin','0240 512 222','Lun–Vin: 08:00–14:00'],
                ['Centru Operațional Babadag','Str. Republicii nr. 10, Babadag','0240 513 333','Lun–Vin: 08:00–14:00'],
                ['Centru Operațional Sulina','Str. nr. 1, nr. 20, Sulina','0240 514 444','Lun–Vin: 08:00–14:00'],
            ] as [$centru, $adresa, $tel, $program])
            <div class="col-md-6">
                <div class="card p-4">
                    <h6 class="fw-bold text-aqua mb-3"><i class="bi bi-geo-alt-fill me-2"></i>{{ $centru }}</h6>
                    <ul class="list-unstyled mb-0" style="font-size:0.875rem;">
                        <li class="mb-1"><i class="bi bi-map me-2 text-muted"></i>{{ $adresa }}</li>
                        <li class="mb-1"><i class="bi bi-telephone me-2 text-muted"></i><a href="tel:{{ $tel }}">{{ $tel }}</a></li>
                        <li><i class="bi bi-clock me-2 text-muted"></i>{{ $program }}</li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
