@extends('layouts.app')

@section('title', 'Program casierii')

@section('page_hero')
    <h1><i class="bi bi-clock me-2"></i> Program casierii</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item active">Program casierii</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:3.5rem 0;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title">Program de lucru cu publicul</h2>

                <div class="alert-band mb-4" style="border-radius:8px;">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    Plata facturilor se poate efectua și <strong>online</strong> prin portalul Zona Clienți, 24/7.
                    <a href="{{ url('https://my.aquaservtulcea.ro/') }}" class="ms-2 fw-bold">Plătește online →</a>
                </div>

                <div class="row g-4">
                    @foreach([
                        ['Caserie Tulcea','Str. Tudor Vladimirescu, nr. 2','Luni–Vineri','09:00 – 17:00','Sâmbătă–Duminică','ÎNCHIS','0240 511 369','contractare.facturare@aquaservtulcea.ro'],
                        ['Caserie Isaccea','','Luni–Vineri','07:00 – 18:00','Sâmbătă','07:00 – 12:00','0240 540 302','centru.isaccea@aquaservtulcea.ro'],
                        ['Caserie Măcin','','Luni–Vineri','07:00 – 18:00','Sâmbătă','07:00 – 12:00','0240 571 180','centru.macin@aquaservtulcea.ro'],
                        ['Caserie Sulina','','Luni–Vineri','07:00 – 18:00','Sâmbătă','07:00 – 12:00','0240 543 147','centru.sulina@aquaservtulcea.ro'],
                        ['Caserie Babadag','','Luni–Vineri','07:00 – 18:00','Sâmbătă','07:00 – 12:00','0240 562 340','centru.babadag@aquaservtulcea.ro'],
                    ] as [$denumire, $adresa, $zile1, $ore1, $zile2, $ore2, $tel, $email])
                    <div class="col-md-6 col-lg-4">
                        <div class="card p-4 h-100">
                            <h6 class="fw-bold text-aqua mb-3">
                                <i class="bi bi-building me-2"></i>{{ $denumire }}
                            </h6>
                            <ul class="list-unstyled mb-0" style="font-size:0.875rem;">
                                @if($adresa)
                                <li class="mb-2"><i class="bi bi-map text-muted me-2"></i>{{ $adresa }}</li>
                                @endif
                                <li class="mb-2">
                                    <i class="bi bi-calendar3 text-muted me-2"></i>
                                    <strong>{{ $zile1 }}</strong>
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-clock text-muted me-2"></i>
                                    <strong style="color:var(--aqua-primary);">{{ $ore1 }}</strong>
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-calendar3 text-muted me-2"></i>
                                    <strong>{{ $zile2 }}</strong>
                                </li>
                                <li class="mb-3">
                                    <i class="bi bi-clock text-muted me-2"></i>
                                    <strong style="color:{{ $ore2 === 'ÎNCHIS' ? '#dc3545' : 'var(--aqua-primary)' }};">{{ $ore2 }}</strong>
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-telephone text-muted me-2"></i>
                                    <a href="tel:{{ str_replace(' ', '', $tel) }}">{{ $tel }}</a>
                                </li>
                                <li>
                                    <i class="bi bi-envelope text-muted me-2"></i>
                                    <a href="mailto:{{ $email }}" style="font-size:0.8rem;">{{ $email }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>
@endsection