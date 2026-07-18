@extends('layouts.pddtj')

@section('title', 'Prezentare')

@section('page_hero')
    <h1><i class="bi bi-droplet-half me-2"></i>Proiectul regional de dezvoltare a infrastructurii de apă și apă uzată în județul Tulcea</h1>
    <p class="mb-0" style="color:rgba(255,255,255,0.85);font-size:0.95rem;">cod MySMIS 2021 – 333789 · Programul Dezvoltare Durabilă și Tranziție Justă (PDDTJ)</p>
@endsection

@section('content')
<section style="padding:2.5rem 0 4rem;">
    <div class="container">

        {{-- INTRO + VALOARE TOTALA --}}
        <div class="row g-4 align-items-stretch mb-5">
            <div class="col-lg-7">
                <div class="h-100 d-flex flex-column justify-content-center" style="background:#fff;border-radius:16px;padding:2rem;box-shadow:0 4px 24px rgba(61, 143, 135,0.08);border-left:5px solid var(--aqua-primary);">
                    <p style="color:#4a4a4a;font-size:0.95rem;line-height:1.9;margin:0;">
                        S.C. Aquaserv S.A. Tulcea implementează <strong>„Proiectul regional de dezvoltare a infrastructurii de apă
                        și apă uzată în județul Tulcea"</strong>, proiect cofinanțat din <strong>Fondul European de Dezvoltare
                        Regională (FEDR)</strong>, în cadrul <strong>Programului de Dezvoltare Durabilă și Tranziție Justă
                        (PDDTJ)</strong>. Proiectul continuă strategia regională de investiții în infrastructura de apă și apă
                        uzată din județul Tulcea, derulată anterior prin POS Mediu și POIM.
                    </p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="h-100 d-flex flex-column justify-content-center" style="background:linear-gradient(135deg,#002756,#3d8f87,#76b1a8);border-radius:16px;padding:2rem;">
                    <div style="font-size:0.7rem;color:rgba(255,255,255,0.8);text-transform:uppercase;letter-spacing:0.5px;font-weight:700;margin-bottom:0.4rem;">Valoarea totală a investiției</div>
                    <div style="font-size:1.7rem;font-weight:800;color:#fff;line-height:1.15;margin-bottom:1rem;">810.748.282,98 lei</div>
                    <div class="row g-2 text-center">
                        <div class="col-6">
                            <div style="background:rgba(255,255,255,0.12);border-radius:12px;padding:0.75rem 0.5rem;">
                                <div style="font-size:1.05rem;font-weight:800;color:#fff;">79,9%</div>
                                <div style="font-size:0.68rem;color:rgba(255,255,255,0.8);margin-top:2px;">FEDR</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div style="background:rgba(255,255,255,0.12);border-radius:12px;padding:0.75rem 0.5rem;">
                                <div style="font-size:1.05rem;font-weight:800;color:#fff;">86 luni</div>
                                <div style="font-size:0.68rem;color:rgba(255,255,255,0.8);margin-top:2px;">durata proiectului</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ACCES RAPID --}}
        <div class="mb-2">
            <h2 class="section-title mb-4">Explorează microsite-ul</h2>
            <div class="row g-4">
                @php $quickLinks = [
                    ['icon' => 'bi-info-circle',        'titlu' => 'Despre PDDTJ',       'desc' => 'Programul de finanțare care susține proiectul', 'route' => 'pddtj.despre-pddtj'],
                    ['icon' => 'bi-file-earmark-text',  'titlu' => 'Despre proiect',      'desc' => 'Obiective, indicatori și investiții',            'route' => 'pddtj.despre-proiect'],
                    ['icon' => 'bi-file-earmark-check', 'titlu' => 'Contracte',           'desc' => 'Lucrări, servicii și furnizare',                 'route' => 'pddtj.contracte'],
                    ['icon' => 'bi-megaphone',          'titlu' => 'Comunicare',          'desc' => 'Comunicate de presă',                            'route' => 'pddtj.comunicare'],
                    ['icon' => 'bi-images',             'titlu' => 'Galerie',             'desc' => 'Fotografii de pe șantiere',                      'route' => 'pddtj.galerie'],
                    ['icon' => 'bi-geo-alt',             'titlu' => 'Contact',            'desc' => 'Date de contact Aquaserv Tulcea',                'route' => 'pddtj.contact'],
                ]; @endphp
                @foreach($quickLinks as $link)
                <div class="col-md-4 col-sm-6">
                    <a href="{{ route($link['route']) }}" class="d-block h-100 text-decoration-none" style="background:#fff;border-radius:14px;padding:1.5rem;box-shadow:0 4px 24px rgba(61, 143, 135,0.08);border:1.5px solid var(--aqua-border);transition:all .2s;">
                        <div style="width:52px;height:52px;background:var(--aqua-bg);border-radius:50%;display:flex;align-items:center;justify-content:center;margin-bottom:1rem;">
                            <i class="bi {{ $link['icon'] }}" style="font-size:1.3rem;color:var(--aqua-primary);"></i>
                        </div>
                        <h6 style="font-weight:800;color:var(--aqua-dark);margin-bottom:0.4rem;">{{ $link['titlu'] }}</h6>
                        <p style="font-size:0.85rem;color:#6c757d;margin:0;">{{ $link['desc'] }}</p>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
@endsection
