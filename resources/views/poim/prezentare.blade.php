@extends('layouts.poim')

@section('title', 'Prezentare')

@section('page_hero')
    <h1>PROIECTUL REGIONAL DE DEZVOLTARE A INFRASTRUCTURII DE APĂ ȘI APĂ UZATĂ ÎN JUDEȚUL TULCEA</h1>
    <p class="mb-0 hero-subtitle">Proiect cofinanțat din Fondul de Coeziune, prin Programul Operațional Infrastructură Mare 2014-2020 (POIM)</p>
@endsection

@section('content')
<section style="padding:3rem 0 3.5rem;">
    <div class="container">

        {{-- PREZENTARE — text introductiv --}}
        <h2 class="section-title mb-4">Prezentare</h2>
        <div class="row">
            <div class="col-lg-9">
                <p style="color:#4a4a4a;font-size:1.1rem;line-height:1.9;">
                    <strong>Proiectul Regional de Dezvoltare a Infrastructurii de Apă și Apă uzată în Județul Tulcea</strong> se
                    înscrie în cadrul Obiectivului Specific 3.2 „Creșterea nivelului de colectare și epurare a apelor uzate urbane,
                    precum și a gradului de asigurare a alimentării cu apă potabilă a populației”, prin intermediul căruia sunt
                    promovate acțiuni ce contribuie la îndeplinirea priorităților din Tratatul de Aderare pentru sectorul de apă
                    și apă uzată.
                </p>
                <p style="color:#4a4a4a;font-size:1.1rem;line-height:1.9;">
                    Beneficiarul acestui proiect este <strong>S.C. Aquaserv S.A. Tulcea</strong>, Operatorul Regional al
                    serviciilor de alimentare cu apă și canalizare în județul Tulcea.
                </p>
                <p style="color:#4a4a4a;font-size:1.1rem;line-height:1.9;">
                    Conform contractului de finanțare nr. <strong>1755</strong> din data de <strong>28.10.2022</strong> (cod SMIS
                    2014 – 152608), încheiat cu Ministerul Investițiilor și Proiectelor Europene, valoarea totală a Contractului
                    de Finanțare este de <strong>289.901.037,91 lei</strong>; AM POIM acordă o finanțare nerambursabilă în sumă
                    maximă de <strong>224.706.363,00 lei</strong>, echivalentă cu <strong>92,12%</strong> din valoarea totală
                    eligibilă aprobată.
                </p>
                <p style="color:#4a4a4a;font-size:1.1rem;line-height:1.9;">
                    Perioada de implementare a Proiectului este de <strong>79 de luni</strong>, respectiv între data de
                    <strong>01 iunie 2017</strong> și data de <strong>31 decembrie 2023</strong>.
                </p>
                <a href="{{ route('poim.despre-proiect') }}" class="btn btn-aqua mt-2">Detalii proiect</a>
            </div>
        </div>

        {{-- 2 CARDURI: DESPRE POIM / DESPRE PROIECT --}}
        <div class="row g-4 mt-3 justify-content-center">
            @php $carduri = [
                [
                    'titlu' => 'Despre POIM',
                    'subtitlu' => 'Despre Programul Operațional Infrastructură Mare 2014-2020',
                    'text' => 'POIM este programul din care a fost cofinanțat, prin Fondul de Coeziune, proiectul de infrastructură de apă și apă uzată al județului Tulcea.',
                    'icon' => 'bi-info-circle',
                    'route' => 'poim.despre-poim',
                ],
                [
                    'titlu' => 'Despre proiect',
                    'subtitlu' => 'Despre „Proiectul regional de dezvoltare a infrastructurii de apă și apă uzată în județul Tulcea”',
                    'text' => 'Beneficiarul acestui proiect este S.C. Aquaserv S.A. Tulcea, Operatorul Regional al serviciilor de alimentare cu apă și canalizare în județul Tulcea.',
                    'icon' => 'bi-file-earmark-text',
                    'route' => 'poim.despre-proiect',
                ],
            ]; @endphp
            @foreach($carduri as $card)
            <div class="col-lg-6">
                <div class="h-100 p-4" style="background:#fff;border-radius:14px;box-shadow:0 4px 24px rgba(61,143,135,0.08);border-top:4px solid var(--aqua-accent);">
                    <div style="width:52px;height:52px;background:var(--aqua-bg);border-radius:50%;display:flex;align-items:center;justify-content:center;margin-bottom:1.1rem;">
                        <i class="bi {{ $card['icon'] }}" style="font-size:1.35rem;color:var(--aqua-primary);"></i>
                    </div>
                    <h3 style="font-family:'Roboto',sans-serif;font-size:1.05rem;font-weight:700;color:var(--aqua-dark);margin-bottom:0.35rem;">{{ $card['titlu'] }}</h3>
                    <p style="font-family:'Lato',sans-serif;font-size:0.82rem;font-weight:600;color:var(--aqua-accent);margin-bottom:0.85rem;">{{ $card['subtitlu'] }}</p>
                    <p style="font-size:0.85rem;color:#4a4a4a;line-height:1.7;">{{ $card['text'] }}</p>
                    <a href="{{ route($card['route']) }}" class="btn btn-aqua btn-sm">Mai multe detalii</a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- ZONA DE PROIECT --}}
        <div class="mt-5">
            <h2 class="section-title mb-3">Zona de proiect</h2>
            <div style="border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(61, 143, 135,0.10);">
                <img src="{{ asset('storage/galerie/poim/harta-poim-tulcea.png') }}" alt="Harta zonei de proiect POIM Tulcea" style="width:100%;height:auto;display:block;">
            </div>
        </div>

    </div>
</section>

@push('styles')
<style>
    .hero-subtitle { font-family:'Lato',sans-serif; font-size:20px; font-weight:600; color:var(--aqua-light); }
    @media (max-width:767.98px) { .hero-subtitle { font-size:0.95rem; } }
</style>
@endpush
@endsection
