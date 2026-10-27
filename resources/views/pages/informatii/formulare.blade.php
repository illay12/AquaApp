@extends('layouts.app')

@section('title', 'Formulare utile')

@section('page_hero')
    <h1>Formulare utile</h1>
    <p>Descarcă formularul de care ai nevoie, completează-l și depune-l la noi sau trimite-l pe email.</p>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/informatii') }}">Informații publice</a></li>
            <li class="breadcrumb-item active">Formulare utile</li>
        </ol>
    </nav>
@endsection

@section('content')
@php
    // Grupate după cine are nevoie de ele, în ordinea frecvenței. [titlu, tip, fișier]
    $grupuri = [
        ['Persoane fizice', 'Utilizatori casnici', 'bi-house', [
            ['Cerere încheiere contract – utilizatori casnici', 'pdf', 'documente/formulare/cerere-contract-nou.pdf'],
        ]],
        ['Branșări și servicii', 'Pentru orice tip de client', 'bi-tools', [
            ['Cerere aviz amplasare / acord de branșare și aviz de racordare', 'pdf', 'documente/formulare/cerere-tip.pdf'],
            ['Cerere solicitare servicii', 'pdf', 'documente/formulare/cerere-solicitare-servicii.pdf'],
            ['Cerere verificare metrologică contor', 'pdf', 'documente/formulare/cerere-verificare-metrologica.pdf'],
        ]],
        ['Persoane juridice', 'Agenți economici și instituții', 'bi-building', [
            ['Cerere încheiere contract – persoane juridice', 'pdf', 'documente/formulare/cerere-contract-pj.pdf'],
            ['Cerere reziliere contract – agenți economici', 'pdf', 'documente/formulare/cerere-reziliere-pj.pdf'],
        ]],
        ['Angajare', 'Pentru concursurile de ocupare a posturilor', 'bi-briefcase', [
            ['Model cerere de participare la concurs', 'docx', 'documente/formulare/Anexa-nr.-2-Cerere-de-înscriere-la-concurs.docx'],
            ['Model CV Europass', 'docx', 'documente/formulare/Model_CV-Europass_RO.docx'],
        ]],
    ];

    $marime = function (string $fisier) {
        $cale = storage_path('app/public/'.$fisier);
        if (! is_file($cale)) return null;
        $kb = filesize($cale) / 1024;
        return $kb >= 1024 ? number_format($kb / 1024, 1, ',', '').' MB' : max(1, round($kb)).' KB';
    };
@endphp

<section class="fu-section">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">

                {{-- Formulare --}}
                @foreach($grupuri as [$titlu, $pentru, $icon, $formulare])
                    <section class="fu-group" aria-labelledby="fu-g{{ $loop->index }}">
                        <header class="fu-group__head">
                            <span class="fu-group__icon"><i class="bi {{ $icon }}"></i></span>
                            <div>
                                <h2 id="fu-g{{ $loop->index }}">{{ $titlu }}</h2>
                                <small>{{ $pentru }}</small>
                            </div>
                        </header>
                        <ul class="fu-list">
                            @foreach($formulare as [$nume, $tip, $fisier])
                                @php $kb = $marime($fisier); @endphp
                                <li>
                                    <a href="{{ Storage::url($fisier) }}" class="fu-item"
                                       @if($tip === 'pdf') target="_blank" rel="noopener noreferrer" @else download @endif>
                                        <span class="fu-type fu-type--{{ $tip }}">{{ $tip === 'pdf' ? 'PDF' : 'DOC' }}</span>
                                        <span class="fu-item__text">
                                            <strong>{{ $nume }}</strong>
                                            <small>{{ $tip === 'pdf' ? 'Document PDF' : 'Document Word' }}@if($kb) · {{ $kb }}@endif</small>
                                        </span>
                                        <span class="fu-item__dl" aria-hidden="true"><i class="bi bi-download"></i></span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </section>
                @endforeach

                {{-- Depunere --}}
                <div class="fu-submit">
                    <h2>Unde depui formularul</h2>
                    <div class="fu-submit__grid">
                        <div class="fu-submit__opt">
                            <i class="bi bi-envelope"></i>
                            <div>
                                <strong>Pe email</strong>
                                <a href="mailto:secretariat@aquaservtulcea.ro">secretariat@<wbr>aquaservtulcea.ro</a>
                                <small>Atașează formularul scanat sau fotografiat clar.</small>
                            </div>
                        </div>
                        <div class="fu-submit__opt">
                            <i class="bi bi-shop"></i>
                            <div>
                                <strong>La orice agenție</strong>
                                <span>Luni–Vineri, 07:30–16:00</span>
                                <a href="{{ url('/program-casierii') }}" class="fu-link">Vezi agențiile și programul <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <p class="fu-help">
                        <i class="bi bi-question-circle"></i>
                        <span>Nu știi ce formular îți trebuie? Sună la Contractare & Facturare: <a href="tel:0240511369">0240 511 369</a>.</span>
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

@push('styles')
<style>
    /* ═════════ FORMULARE UTILE – „Delta” ═════════ */
    .fu-section { padding: 3rem 0 4.5rem; }


    .fu-group { margin-bottom: 2.25rem; }
    .fu-group__head { display: flex; align-items: center; gap: .8rem; margin-bottom: .85rem; }
    .fu-group__icon { width: 42px; height: 42px; flex-shrink: 0; display: grid; place-items: center; border-radius: 13px; background: #eef6fb; color: var(--aqua-primary); font-size: 1.15rem; }
    .fu-group__head h2 { font-family: 'Merriweather', serif; font-size: 1.2rem; font-weight: 700; color: var(--site-ink); margin: 0; line-height: 1.25; }
    .fu-group__head small { display: block; font-size: .88rem; color: var(--aqua-gray); }

    .fu-list { list-style: none; margin: 0; padding: 0; border: 1px solid var(--site-line); border-radius: 18px; overflow: hidden; background: #fff; }
    .fu-list li + li { border-top: 1px solid var(--site-line); }
    .fu-item { display: flex; align-items: center; gap: .9rem; min-height: 72px; padding: .85rem 1rem; color: var(--site-ink); text-decoration: none; transition: background .15s; }
    .fu-item:active { background: #f5f9fc; }
    @media (hover: hover) { .fu-item:hover { background: #f7fafc; color: var(--site-ink); } .fu-item:hover .fu-item__dl { background: var(--site-ink); color: #fff; } }
    .fu-type { width: 44px; height: 52px; flex-shrink: 0; display: grid; place-items: end center; padding-bottom: .45rem; border-radius: 8px 14px 8px 8px; font-size: .66rem; font-weight: 800; letter-spacing: .04em; color: #fff; position: relative; }
    .fu-type::before { content: ""; position: absolute; top: 0; right: 0; width: 14px; height: 14px; border-radius: 0 14px 0 6px; background: rgba(255,255,255,.35); }
    .fu-type--pdf { background: #d64545; }
    .fu-type--docx { background: #2b579a; }
    .fu-item__text { flex: 1; min-width: 0; }
    .fu-item__text strong { display: block; font-size: 1rem; font-weight: 700; line-height: 1.35; }
    .fu-item__text small { display: block; margin-top: .15rem; font-size: .84rem; color: var(--aqua-gray); }
    .fu-item__dl { width: 44px; height: 44px; flex-shrink: 0; display: grid; place-items: center; border-radius: 50%; background: #eef6fb; color: var(--aqua-primary); font-size: 1.05rem; transition: background .2s, color .2s; }

    .fu-submit { margin-top: 3rem; padding: 1.75rem; border-radius: 22px; background: #f5f9fc; }
    .fu-submit h2 { font-family: 'Merriweather', serif; font-size: 1.25rem; font-weight: 700; color: var(--site-ink); margin: 0 0 1.25rem; }
    .fu-submit__grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 1rem; }
    .fu-submit__opt { display: flex; gap: .85rem; padding: 1.1rem; border-radius: 16px; background: #fff; }
    .fu-submit__opt > i { font-size: 1.3rem; color: var(--aqua-primary); margin-top: .1rem; }
    .fu-submit__opt > div { min-width: 0; display: flex; flex-direction: column; gap: .2rem; }
    .fu-submit__opt strong { font-size: 1rem; font-weight: 800; color: var(--site-ink); }
    .fu-submit__opt span, .fu-submit__opt small { font-size: .9rem; color: #4a5d70; line-height: 1.45; }
    .fu-submit__opt a { color: var(--site-ink); font-weight: 700; text-decoration: none; border-bottom: 1px solid #c9d8e3; align-self: flex-start; }
    .fu-submit__opt a.fu-link { border: 0; display: inline-flex; align-items: center; gap: .35rem; min-height: 40px; color: var(--aqua-primary); font-weight: 800; font-size: .92rem; }
    .fu-help { display: flex; gap: .55rem; margin: 1.1rem 0 0; font-size: .92rem; color: #4a5d70; line-height: 1.5; }
    .fu-help i { color: var(--aqua-primary); margin-top: .15rem; }
    .fu-help a { color: var(--site-ink); font-weight: 800; white-space: nowrap; }

    @media (max-width: 767.98px) {
        .fu-section { padding: 1.5rem 0 3.5rem; }
        .fu-group { margin-bottom: 1.85rem; }
        .fu-group__head h2 { font-size: 1.12rem; }
        .fu-item { padding: .8rem .9rem; gap: .8rem; }
        .fu-type { width: 40px; height: 48px; }
        .fu-item__text strong { font-size: .97rem; }
        .fu-submit { margin-top: 2.25rem; padding: 1.25rem 1.1rem; border-radius: 18px; }
        .fu-submit__grid { grid-template-columns: minmax(0, 1fr); gap: .7rem; }
    }
</style>
@endpush
