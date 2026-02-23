@extends('layouts.app')

@section('title', 'Acasă')

@section('content')

    {{-- HERO SECTION --}}
    <section style="background:linear-gradient(135deg, #023e8a 0%, #0077b6 60%, #00b4d8 100%); color:#fff; padding:5rem 0 4rem; position:relative; overflow:hidden;">
        <div style="position:absolute;inset:0;background:url('data:image/svg+xml,%3Csvg width=\'80\' height=\'80\' viewBox=\'0 0 80 80\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.04\' fill-rule=\'evenodd\'%3E%3Ccircle cx=\'40\' cy=\'40\' r=\'8\'/%3E%3C/g%3E%3C/svg%3E');"></div>
        <div class="container position-relative">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <span class="badge" style="background:rgba(255,255,255,0.18);color:#fff;font-size:0.78rem;font-weight:700;letter-spacing:0.08em;padding:0.45em 1em;border-radius:20px;margin-bottom:1rem;display:inline-block;">
                        <i class="bi bi-shield-check me-1"></i> Operator autorizat A.N.R.S.C.
                    </span>
                    <h1 style="font-family:'Merriweather',serif;font-size:2.6rem;font-weight:700;line-height:1.3;margin-bottom:1.2rem;">
                        Servicii de calitate pentru<br>
                        <span style="color:#90e0ef;">apă și canalizare</span>
                    </h1>
                    <p style="font-size:1.1rem;opacity:0.9;max-width:540px;line-height:1.75;margin-bottom:2rem;">
                        Furnizăm și prestăm servicii de alimentare cu apă potabilă și de canalizare
                        pentru cetățenii și mediul de afaceri din județ.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ url('/client/factura') }}" class="btn btn-light fw-bold" style="border-radius:8px;padding:0.7rem 1.8rem;color:#0077b6;">
                            <i class="bi bi-credit-card-2-front me-2"></i> Plătește factura
                        </a>
                        <a href="{{ url('/client/avarie') }}" class="btn fw-bold" style="background:rgba(255,255,255,0.15);color:#fff;border:2px solid rgba(255,255,255,0.4);border-radius:8px;padding:0.7rem 1.8rem;">
                            <i class="bi bi-exclamation-triangle me-2"></i> Raportează avarie
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-flex justify-content-center">
                    <div style="width:280px;height:280px;background:rgba(255,255,255,0.1);border-radius:50%;display:flex;align-items:center;justify-content:center;border:2px solid rgba(255,255,255,0.2);">
                        <i class="bi bi-droplet-fill" style="font-size:8rem;color:rgba(255,255,255,0.7);"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- QUICK ACCESS --}}
    <section style="background:#f0f8ff;padding:2.5rem 0;">
        <div class="container">
            <div class="row g-3 justify-content-center">
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="{{ url('/client/factura') }}" class="quick-access-card">
                        <div class="icon-wrap"><i class="bi bi-receipt"></i></div>
                        <h6>Plătește factura</h6>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="{{ url('/client/index-contor') }}" class="quick-access-card">
                        <div class="icon-wrap"><i class="bi bi-speedometer2"></i></div>
                        <h6>Index contor</h6>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="{{ url('/client/avarie') }}" class="quick-access-card">
                        <div class="icon-wrap"><i class="bi bi-tools"></i></div>
                        <h6>Avarie</h6>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="{{ url('/informatii/calitatea-apei') }}" class="quick-access-card">
                        <div class="icon-wrap"><i class="bi bi-droplet-half"></i></div>
                        <h6>Calitatea apei</h6>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="{{ url('/informatii/tarife') }}" class="quick-access-card">
                        <div class="icon-wrap"><i class="bi bi-cash-coin"></i></div>
                        <h6>Tarife</h6>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="{{ url('/informatii/formulare') }}" class="quick-access-card">
                        <div class="icon-wrap"><i class="bi bi-file-earmark-arrow-down"></i></div>
                        <h6>Formulare</h6>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ANUNTURI + INFO --}}
    <section style="padding:3.5rem 0;">
        <div class="container">
            <div class="row g-4">

                {{-- Anunțuri recente --}}
                <div class="col-lg-7">
                    <h2 class="section-title">Ultimele anunțuri</h2>

                    @forelse($anunturi ?? [] as $anunt)
                        <div class="news-item">
                            <div class="date">
                                <i class="bi bi-calendar3 me-1"></i>
                                {{ $anunt->created_at->format('d.m.Y') }}
                                <span class="ms-2 badge-aqua">{{ $anunt->categorie ?? 'Anunț' }}</span>
                            </div>
                            <h6><a href="{{ url('/anunturi/'.$anunt->slug) }}">{{ $anunt->titlu }}</a></h6>
                        </div>
                    @empty
                        {{-- PLACEHOLDER când nu sunt date din DB --}}
                        <div class="news-item">
                            <div class="date"><i class="bi bi-calendar3 me-1"></i> 20.02.2026 <span class="ms-2 badge-aqua">Anunț</span></div>
                            <h6><a href="#">Informare privind întreruperea furnizării apei în zona centrală</a></h6>
                        </div>
                        <div class="news-item">
                            <div class="date"><i class="bi bi-calendar3 me-1"></i> 15.02.2026 <span class="ms-2 badge-aqua">Angajare</span></div>
                            <h6><a href="#">Concurs pentru ocuparea unui post vacant – muncitor calificat</a></h6>
                        </div>
                        <div class="news-item">
                            <div class="date"><i class="bi bi-calendar3 me-1"></i> 10.02.2026 <span class="ms-2 badge-aqua">Calitate apă</span></div>
                            <h6><a href="#">Buletin de analiză apă potabilă – Februarie 2026</a></h6>
                        </div>
                    @endforelse

                    <a href="{{ url('/anunturi') }}" class="btn btn-outline-aqua btn-sm mt-2">
                        Toate anunțurile <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>

                {{-- Sidebar info --}}
                <div class="col-lg-5">
                    {{-- Urgențe / Avarie --}}
                    <div class="card mb-4" style="border-color:#f8d7da;">
                        <div class="card-body" style="background:#fff5f5;border-radius:12px;">
                            <h5 style="font-family:'Merriweather',serif;color:#dc3545;font-size:1rem;">
                                <i class="bi bi-telephone-fill me-2"></i> Dispecerat avarii
                            </h5>
                            <p class="mb-1" style="font-size:2rem;font-weight:800;color:#dc3545;letter-spacing:-1px;">
                                0340 131 111
                            </p>
                            <p class="mb-0 text-muted" style="font-size:0.82rem;">Disponibil 24/7 pentru urgențe</p>
                        </div>
                    </div>

                    {{-- Program casierii --}}
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="bi bi-clock me-2"></i> Program casierii
                        </div>
                        <div class="card-body p-3">
                            <table class="table table-sm mb-0" style="font-size:0.875rem;">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold">Sediu central</td>
                                        <td>Lun–Vin: 08:00–14:30</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Agenție Măcin</td>
                                        <td>Lun–Vin: 08:00–12:00</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{ url('/program-casierii') }}" class="btn btn-sm btn-aqua mt-2 w-100">
                                Program complet
                            </a>
                        </div>
                    </div>

                    {{-- Calitatea apei --}}
                    <div class="card" style="border-color:var(--aqua-border);">
                        <div class="card-body bg-aqua-light" style="border-radius:12px;">
                            <h6 class="fw-bold text-aqua"><i class="bi bi-droplet-half me-2"></i> Calitatea apei</h6>
                            <p style="font-size:0.875rem;" class="mb-2">
                                Apa furnizată respectă toți parametrii de calitate impuși de normativele naționale și europene.
                            </p>
                            <a href="{{ url('/informatii/calitatea-apei') }}" class="btn btn-sm btn-aqua">
                                Vezi buletinele de analiză
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- STATISTICS BAND --}}
    <section style="background:linear-gradient(90deg, #023e8a, #0077b6);color:#fff;padding:3rem 0;">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-6 col-md-3">
                    <div style="font-size:2.5rem;font-weight:800;color:#90e0ef;">150+</div>
                    <div style="font-size:0.875rem;opacity:0.85;">Localități deservite</div>
                </div>
                <div class="col-6 col-md-3">
                    <div style="font-size:2.5rem;font-weight:800;color:#90e0ef;">50.000+</div>
                    <div style="font-size:0.875rem;opacity:0.85;">Abonați</div>
                </div>
                <div class="col-6 col-md-3">
                    <div style="font-size:2.5rem;font-weight:800;color:#90e0ef;">24/7</div>
                    <div style="font-size:0.875rem;opacity:0.85;">Dispecerat avarii</div>
                </div>
                <div class="col-6 col-md-3">
                    <div style="font-size:2.5rem;font-weight:800;color:#90e0ef;">99.8%</div>
                    <div style="font-size:0.875rem;opacity:0.85;">Conformitate calitate apă</div>
                </div>
            </div>
        </div>
    </section>

    {{-- SERVICII CARDS --}}
    <section style="padding:4rem 0;background:#fff;">
        <div class="container">
            <h2 class="section-title">Serviciile noastre</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 text-center p-4">
                        <div style="width:72px;height:72px;background:var(--aqua-bg);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1.2rem;font-size:2rem;color:var(--aqua-primary);">
                            <i class="bi bi-droplet-fill"></i>
                        </div>
                        <h5 style="font-family:'Merriweather',serif;font-size:1rem;">Alimentare cu apă</h5>
                        <p class="text-muted" style="font-size:0.875rem;">Captare, tratare și distribuție apă potabilă de calitate pentru populație și industrie.</p>
                        <a href="{{ url('/servicii/alimentare-apa') }}" class="btn btn-outline-aqua btn-sm mt-auto">Află mai mult</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 text-center p-4">
                        <div style="width:72px;height:72px;background:var(--aqua-bg);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1.2rem;font-size:2rem;color:var(--aqua-primary);">
                            <i class="bi bi-filter-circle-fill"></i>
                        </div>
                        <h5 style="font-family:'Merriweather',serif;font-size:1rem;">Canalizare</h5>
                        <p class="text-muted" style="font-size:0.875rem;">Colectare și transport ape uzate prin rețeaua de canalizare, mentenanță și intervenții.</p>
                        <a href="{{ url('/servicii/canalizare') }}" class="btn btn-outline-aqua btn-sm mt-auto">Află mai mult</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 text-center p-4">
                        <div style="width:72px;height:72px;background:var(--aqua-bg);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1.2rem;font-size:2rem;color:var(--aqua-primary);">
                            <i class="bi bi-recycle"></i>
                        </div>
                        <h5 style="font-family:'Merriweather',serif;font-size:1rem;">Epurare ape uzate</h5>
                        <p class="text-muted" style="font-size:0.875rem;">Tratare și epurare ape uzate în stații moderne, respectând normele de mediu europene.</p>
                        <a href="{{ url('/servicii/epurare') }}" class="btn btn-outline-aqua btn-sm mt-auto">Află mai mult</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
