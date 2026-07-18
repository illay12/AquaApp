@extends('layouts.pddtj')

@section('title', 'Prezentare')

@section('page_hero')
    <h1>PROIECTUL REGIONAL DE DEZVOLTARE A INFRASTRUCTURII DE APĂ ȘI APĂ UZATĂ ÎN JUDEȚUL TULCEA</h1>
    <p class="mb-0 hero-subtitle">Proiect cofinanțat din Fondul European de Dezvoltare Regională (FEDR), în cadrul PDDTJ 2021-2027</p>
@endsection

@section('content')
<section style="padding:3rem 0 3.5rem;">
    <div class="container">

        {{-- PREZENTARE — text introductiv --}}
        <h2 class="section-title mb-4">Prezentare</h2>
        <div class="row">
            <div class="col-lg-9">
                <p style="color:#4a4a4a;font-size:0.95rem;line-height:1.9;">
                    Proiectul regional de dezvoltare a infrastructurii de apă și apă uzată în județul Tulcea urmărește
                    oferirea unei strategii regionale de dezvoltare a sectorului de apă și apă uzată, în conformitate cu
                    angajamentele de tranziție asumate de România și cu Directiva 91/271/CEE privind colectarea și tratarea
                    apelor uzate urbane, respectiv Directiva 2184/2020 privind calitatea apei destinate consumului uman.
                </p>
                <p style="color:#4a4a4a;font-size:0.95rem;line-height:1.9;">
                    Beneficiarul acestui proiect este <strong>S.C. Aquaserv S.A. Tulcea</strong>, Operatorul Regional al
                    serviciilor de alimentare cu apă și canalizare în județul Tulcea.
                </p>
                <p style="color:#4a4a4a;font-size:0.95rem;line-height:1.9;">
                    Conform Contractului de Finanțare semnat la data de <strong>11 iunie 2026</strong> (cod MySMIS 2021 –
                    333789), încheiat cu Ministerul Investițiilor și Proiectelor Europene, valoarea totală a investiției este
                    de <strong>810.748.282,98 lei</strong>, din care Uniunea Europeană, prin Fondul European de Dezvoltare
                    Regională (FEDR), acordă o finanțare nerambursabilă reprezentând <strong>79,9%</strong> din valoarea
                    totală.
                </p>
                <p style="color:#4a4a4a;font-size:0.95rem;line-height:1.9;">
                    Perioada de implementare a proiectului este de <strong>86 de luni</strong>, respectiv între
                    <strong>octombrie 2021</strong> și <strong>noiembrie 2028</strong>.
                </p>
                <a href="{{ route('pddtj.despre-proiect') }}" class="btn btn-aqua mt-2">Detalii proiect</a>
            </div>
        </div>

        {{-- 3 CARDURI: DESPRE PDDTJ / DESPRE PROIECT / DESPRE CONTRACTE --}}
        <div class="row g-4 mt-3">
            @php $carduri = [
                [
                    'titlu' => 'Despre PDDTJ',
                    'subtitlu' => 'Despre Programul Dezvoltare Durabilă și Tranziție Justă',
                    'text' => 'PDDTJ este programul din care este cofinanțat, prin Fondul European de Dezvoltare Regională, proiectul de infrastructură de apă și apă uzată al județului Tulcea.',
                    'icon' => 'bi-info-circle',
                    'route' => 'pddtj.despre-pddtj',
                ],
                [
                    'titlu' => 'Despre proiect',
                    'subtitlu' => 'Despre „Proiectul regional de dezvoltare a infrastructurii de apă și apă uzată în județul Tulcea”',
                    'text' => 'Beneficiarul acestui proiect este S.C. Aquaserv S.A. Tulcea, Operatorul Regional al serviciilor de alimentare cu apă și canalizare în județul Tulcea.',
                    'icon' => 'bi-file-earmark-text',
                    'route' => 'pddtj.despre-proiect',
                ],
                [
                    'titlu' => 'Despre contracte',
                    'subtitlu' => 'Contracte proiect',
                    'text' => 'Lucrările finanțate prin PDDTJ sunt realizate pe raza următoarelor unități administrativ-teritoriale: Tulcea, Mahmudia, Carcaliu, Babadag, Chilia Veche, Sulina, Crișan, Mila 23.',
                    'icon' => 'bi-file-earmark-check',
                    'route' => 'pddtj.contracte',
                ],
            ]; @endphp
            @foreach($carduri as $card)
            <div class="col-lg-4">
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

    </div>
</section>

@push('styles')
<style>
    .hero-subtitle { font-family:'Lato',sans-serif; font-size:22px; font-weight:600; color:var(--aqua-light); }
    @media (max-width:767.98px) { .hero-subtitle { font-size:1rem; } }
</style>
@endpush
@endsection
