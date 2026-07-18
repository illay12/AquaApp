@extends('layouts.pddtj')

@section('title', 'Contact')

@section('page_hero')
    <h1><i class="bi bi-geo-alt me-2"></i>Contact</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('pddtj.prezentare') }}">Prezentare</a></li>
            <li class="breadcrumb-item active">Contact</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:2.5rem 0 4rem;">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="h-100 p-4" style="background:#fff;border-radius:16px;box-shadow:0 4px 24px rgba(0,119,182,0.08);">
                    <h2 class="section-title mb-4">S.C. Aquaserv S.A. Tulcea</h2>
                    <ul style="list-style:none;padding:0;margin:0;">
                        <li class="d-flex gap-3 mb-3">
                            <i class="bi bi-geo-alt-fill" style="color:var(--aqua-primary);font-size:1.1rem;"></i>
                            <span style="font-size:0.92rem;color:#374151;">Str. Rezervorului, nr. 2, Tulcea <br><span class="text-muted" style="font-size:0.8rem;">(avize și autorizații, reclamații)</span></span>
                        </li>
                        <li class="d-flex gap-3 mb-3">
                            <i class="bi bi-telephone-fill" style="color:var(--aqua-primary);font-size:1.1rem;"></i>
                            <span style="font-size:0.92rem;color:#374151;">Telefon / Fax: 0240.524.310</span>
                        </li>
                        <li class="d-flex gap-3 mb-3">
                            <i class="bi bi-headset" style="color:var(--aqua-primary);font-size:1.1rem;"></i>
                            <span style="font-size:0.92rem;color:#374151;">Telefon dispecerat: 0747.022.009</span>
                        </li>
                        <li class="d-flex gap-3 mb-3">
                            <i class="bi bi-envelope-fill" style="color:var(--aqua-primary);font-size:1.1rem;"></i>
                            <span style="font-size:0.92rem;color:#374151;">secretariat@aquaservtulcea.ro</span>
                        </li>
                        <li class="d-flex gap-3">
                            <i class="bi bi-facebook" style="color:var(--aqua-primary);font-size:1.1rem;"></i>
                            <a href="https://www.facebook.com/AquaservTulcea" target="_blank" rel="noopener" style="font-size:0.92rem;">Aquaserv Tulcea — pagina de Facebook</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="h-100 p-4" style="background:linear-gradient(135deg,#023e8a,#0077b6,#00b4d8);border-radius:16px;color:#fff;">
                    <h5 style="font-weight:800;margin-bottom:1rem;"><i class="bi bi-box-arrow-up-right me-2"></i>Site principal Aquaserv</h5>
                    <p style="font-size:0.9rem;color:rgba(255,255,255,0.9);line-height:1.8;">
                        Pentru relații contractuale, facturare, sesizări sau alte servicii, vizitați site-ul principal al operatorului regional.
                    </p>
                    <a href="https://www.aquaservtulcea.ro/" target="_blank" rel="noopener" class="btn btn-light fw-bold" style="border-radius:8px;">
                        www.aquaservtulcea.ro
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
