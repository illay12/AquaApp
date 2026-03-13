@extends('layouts.app')

@section('title', 'Calitatea Apei – AQUASERV')

@section('page_hero')
    <h1><i class="bi bi-droplet-half me-2"></i> Calitatea Apei</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item active">Calitatea Apei</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:1.5rem 0 3rem;">
    <div class="container">
        <div class="row g-3 g-lg-5">

            {{-- CONTINUT PRINCIPAL --}}
            <div class="col-lg-8 order-1">

                {{-- INTRO --}}
                <div class="card p-3 p-md-4 mb-4">
                    <h2 style="font-family:'Merriweather',serif;font-size:1.3rem;color:var(--aqua-dark);margin-bottom:1rem;">
                        <i class="bi bi-shield-check me-2" style="color:#0369a1;"></i>
                        Apa potabilă distribuită de AQUASERV S.A.
                    </h2>
                    <p style="line-height:1.9;color:#444;">
                        AQUASERV S.A. Tulcea asigură furnizarea apei potabile care respectă în totalitate
                        parametrii de calitate prevăzuți de <strong>Legea nr. 458/2002</strong> privind calitatea apei
                        potabile, cu modificările și completările ulterioare.
                    </p>
                    <p style="line-height:1.9;color:#444;">
                        Laboratorul propriu efectuează analize periodice ale apei distribuite, iar rezultatele
                        sunt puse la dispoziția publicului prin buletinele de analiză de mai jos.
                    </p>
                    <div class="row g-2 mt-2">
                        <div class="col-4">
                            <div class="text-center p-2" style="background:#e0f2fe;border-radius:10px;">
                                <i class="bi bi-droplet-fill" style="font-size:1.4rem;color:#0369a1;"></i>
                                <div style="font-weight:800;font-size:1.2rem;color:#0369a1;">100%</div>
                                <div style="font-size:0.8rem;color:#0369a1;">conformă normelor</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="text-center p-2" style="background:#dcfce7;border-radius:10px;">
                                <i class="bi bi-clipboard2-check-fill" style="font-size:1.4rem;color:#059669;"></i>
                                <div style="font-weight:800;font-size:1.2rem;color:#059669;">lunar</div>
                                <div style="font-size:0.8rem;color:#059669;">analize efectuate</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="text-center p-2" style="background:#fef9c3;border-radius:10px;">
                                <i class="bi bi-award-fill" style="font-size:1.4rem;color:#ca8a04;"></i>
                                <div style="font-weight:800;font-size:1.1rem;color:#ca8a04;">ISO 22000</div>
                                <div style="font-size:0.8rem;color:#ca8a04;">certificare calitate</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- BULETINE DE ANALIZA --}}
                <div class="card p-3 p-md-4">
                    <h3 style="font-family:'Merriweather',serif;font-size:1.2rem;color:var(--aqua-dark);margin-bottom:1.5rem;padding-bottom:0.75rem;border-bottom:2px solid var(--aqua-border);">
                        <i class="bi bi-file-earmark-medical me-2" style="color:#0369a1;"></i>
                        Buletine de analiză apă potabilă
                    </h3>

                    @if($buletine && $buletine->count() > 0)
                        @foreach($buletine as $an => $luniAn)
                        <div class="mb-5">
                            {{-- Header an --}}
                            <div class="d-flex align-items-center gap-2 mb-3">
                                <div style="background:#0369a1;color:#fff;font-weight:800;font-size:0.9rem;padding:0.3rem 1rem;border-radius:20px;">
                                    {{ $an }}
                                </div>
                                <div style="flex:1;height:2px;background:#e2e8f0;"></div>
                            </div>

                            {{-- Luni --}}
                            @foreach($luniAn as $luna => $fisiereLuna)
                            <div class="mb-3 ps-2" style="border-left:3px solid #bae6fd;">
                                <div class="fw-bold mb-2" style="font-size:0.875rem;color:#0369a1;">
                                    <i class="bi bi-calendar2-week me-1"></i> {{ $luna }}
                                </div>
                                <div class="row g-2">
                                    @foreach($fisiereLuna as $buletin)
                                    <div class="col-6 col-sm-4">
                                        <a href="{{ $buletin->url }}" target="_blank"
                                           class="d-flex flex-column align-items-center justify-content-center text-decoration-none p-3"
                                           style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;transition:all 0.2s;min-height:70px;"
                                           onmouseover="this.style.background='#e0f2fe';this.style.borderColor='#0369a1';this.style.transform='translateY(-2px)'"
                                           onmouseout="this.style.background='#f8fafc';this.style.borderColor='#e2e8f0';this.style.transform='translateY(0)'">
                                            <i class="bi bi-file-earmark-pdf" style="font-size:1.8rem;color:#dc2626;margin-bottom:0.3rem;"></i>
                                            <div style="font-size:0.75rem;font-weight:700;color:#1e293b;text-align:center;line-height:1.3;">
                                                {{ $buletin->nume_original }}
                                            </div>
                                            <div style="font-size:0.68rem;color:#94a3b8;margin-top:0.2rem;">{{ $buletin->marime_formatat }}</div>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                    @else
                        <div class="text-center py-5 text-muted">
                            <i class="bi bi-hourglass-split" style="font-size:2.5rem;display:block;opacity:0.4;margin-bottom:0.75rem;"></i>
                            Buletinele de analiză vor fi disponibile în curând.
                        </div>
                    @endif

                </div>
            </div>

            {{-- SIDEBAR --}}
            <div class="col-lg-4 order-2">

                {{-- MOBIL: 2 carduri side by side --}}
                <div class="row g-2 d-lg-none mb-3">
                    <div class="col-6">
                        <div class="card h-100 p-3" style="background:#f0f9ff;border-color:#bae6fd;">
                            <div style="font-weight:700;font-size:0.8rem;color:#0369a1;margin-bottom:0.5rem;">
                                <i class="bi bi-flask me-1"></i> Laborator
                            </div>
                            <div style="font-size:0.78rem;color:#0369a1;line-height:1.5;">
                                Lun–Vin<br>07:00–15:00<br>
                                <strong>0240 511 012</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card h-100 p-3" style="background:#fff5f5;border-color:#f8d7da;">
                            <div style="font-weight:700;font-size:0.8rem;color:#dc3545;margin-bottom:0.5rem;">
                                <i class="bi bi-telephone-fill me-1"></i> Avarii 24/7
                            </div>
                            <div style="font-size:1.2rem;font-weight:800;color:#dc3545;line-height:1.2;">
                                0340<br>131 111
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Legislatie mobil - collapsible --}}
                <div class="d-lg-none mb-3">
                    <div class="card p-3">
                        <button class="btn p-0 d-flex align-items-center justify-content-between w-100"
                                style="font-weight:700;font-size:0.875rem;color:var(--aqua-dark);border:none;background:transparent;"
                                onclick="this.nextElementSibling.style.display=this.nextElementSibling.style.display==='none'?'block':'none';">
                            <span><i class="bi bi-journal-text me-2"></i>Legislație relevantă</span>
                            <i class="bi bi-chevron-down" style="font-size:0.8rem;color:#0077b6;"></i>
                        </button>
                        <div style="display:none;margin-top:0.75rem;">
                            <ul style="font-size:0.82rem;list-style:none;padding:0;margin:0;">
                                <li class="mb-2 pb-2" style="border-bottom:1px solid var(--aqua-border);">
                                    <i class="bi bi-file-text me-1" style="color:#0369a1;"></i>
                                    Legea nr. 458/2002 privind calitatea apei potabile
                                </li>
                                <li class="mb-2 pb-2" style="border-bottom:1px solid var(--aqua-border);">
                                    <i class="bi bi-file-text me-1" style="color:#0369a1;"></i>
                                    Legea nr. 311/2004 – modificarea Legii 458/2002
                                </li>
                                <li>
                                    <i class="bi bi-file-text me-1" style="color:#0369a1;"></i>
                                    HG nr. 974/2004 – Norme de supraveghere
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- DESKTOP: sidebar normal --}}
                <div class="d-none d-lg-block">
                    <div class="card mb-4 p-3" style="background:#f0f9ff;border-color:#bae6fd;">
                        <h6 class="fw-bold mb-3" style="color:#0369a1;">
                            <i class="bi bi-telephone-fill me-2"></i>Contact Laborator
                        </h6>
                        <p style="font-size:0.875rem;color:#0369a1;margin-bottom:0.5rem;">
                            <strong>Program:</strong> Luni – Vineri, 07:00 – 15:00
                        </p>
                        <p style="font-size:0.875rem;color:#0369a1;margin-bottom:0;">
                            <strong>Telefon:</strong> 0240 511 012
                        </p>
                    </div>

                    <div class="card mb-4" style="border-color:#f8d7da;">
                        <div class="card-body text-center" style="background:#fff5f5;border-radius:12px;">
                            <i class="bi bi-telephone-fill" style="font-size:2rem;color:#dc3545;"></i>
                            <p class="fw-bold mt-2 mb-0" style="color:#dc3545;">Dispecerat avarii 24/7</p>
                            <p style="font-size:1.8rem;font-weight:800;color:#dc3545;margin:0;">0747 022 009</p>
                        </div>
                    </div>

                    <div class="card p-3">
                        <h6 class="fw-bold mb-3" style="color:var(--aqua-dark);">
                            <i class="bi bi-journal-text me-2"></i>Legislație relevantă
                        </h6>
                        <ul style="font-size:0.85rem;list-style:none;padding:0;margin:0;">
                            <li class="mb-2 pb-2" style="border-bottom:1px solid var(--aqua-border);">
                                <i class="bi bi-file-text me-1" style="color:#0369a1;"></i>
                                Legea nr. 458/2002 privind calitatea apei potabile
                            </li>
                            <li class="mb-2 pb-2" style="border-bottom:1px solid var(--aqua-border);">
                                <i class="bi bi-file-text me-1" style="color:#0369a1;"></i>
                                Legea nr. 311/2004 – modificarea Legii 458/2002
                            </li>
                            <li>
                                <i class="bi bi-file-text me-1" style="color:#0369a1;"></i>
                                HG nr. 974/2004 – Norme de supraveghere, inspecție sanitară
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection