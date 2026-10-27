@extends('layouts.app')

@section('title', 'Contact')

@section('page_hero')
    <h1>Contact</h1>
    <p>Scrie-ne un mesaj sau sună direct la departamentul potrivit.</p>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item active">Contact</li>
        </ol>
    </nav>
@endsection

@section('content')
@php
    // Nevoi frecvente → numărul potrivit. [titlu, cine răspunde, număr, href, icon, variantă]
    $nevoi = [
        ['Avarie sau lipsă apă', 'Dispecerat non-stop', '0747 022 009', 'tel:0747022009', 'bi-exclamation-octagon', 'alert'],
        ['Facturi, contracte, plăți', 'Contractare & Facturare', '0240 511 369', 'tel:0240511369', 'bi-receipt', null],
        ['Informații publice', 'Relații cu publicul', '0758 100 261', 'tel:0758100261', 'bi-info-circle', null],
        ['Alte solicitări', 'Secretariat', '0240 524 310', 'tel:0240524310', 'bi-building', null],
    ];

    $locatii = [
        [
            'titlu'  => 'Sediu central & Secretariat',
            'adresa' => 'Str. Rezervorului nr. 2, Tulcea',
            'program'=> 'Luni–Vineri, 07:30–16:00',
            'email'  => 'secretariat@aquaservtulcea.ro',
            'harta'  => 'https://maps.app.goo.gl/jDibWxXwgdk4kuQr5',
            'embed'  => 'https://maps.google.com/maps?q=45.1669467,28.793184&output=embed&hl=ro&z=16',
        ],
        [
            'titlu'  => 'Contractare, Facturare & Casierie',
            'adresa' => 'Str. Tudor Vladimirescu nr. 2, Tulcea',
            'program'=> 'Casierie: Luni–Vineri, 07:30–17:00',
            'email'  => 'contractare.facturare@aquaservtulcea.ro',
            'harta'  => 'https://maps.app.goo.gl/xHE8Sg9AvG62xqqt5',
            'embed'  => 'https://maps.google.com/maps?q=45.1784283,28.8015393&output=embed&hl=ro&z=16',
        ],
    ];

    $centre = [
        ['Isaccea', '0240 540 302', 'tel:0240540302', 'centru.isaccea@aquaservtulcea.ro'],
        ['Măcin',   '0240 571 180', 'tel:0240571180', 'centru.macin@aquaservtulcea.ro'],
        ['Sulina',  '0240 543 147', 'tel:0240543147', 'centru.sulina@aquaservtulcea.ro'],
        ['Babadag', '0240 562 340', 'tel:0240562340', 'centru.babadag@aquaservtulcea.ro'],
    ];

    $audiente = [
        ['Ifrim Catrinescu Valentin', 'Director General',  'Marți',    'director.general@aquaservtulcea.ro'],
        ['Ilie George',               'Inginer Șef',       'Miercuri', 'director.tehnic@aquaservtulcea.ro'],
        ['Matei Selda Georgiana',     'Director Economic', 'Joi',      'director.economic@aquaservtulcea.ro'],
    ];

    $tipuri = ['reclamatie' => 'Reclamație', 'sesizare' => 'Sesizare', 'informatie' => 'Informații', 'altele' => 'Altele'];
@endphp

{{-- ═════════ 1. FORMULAR (cel mai folosit) + TELEFOANE + LOCAȚII ═════════ --}}
<section class="ct-section ct-section--first">
    <div class="container">
        <div class="ct-main">

            {{-- FORMULAR --}}
            <div class="ct-form-wrap" id="formular-contact">
                <h2 class="ct-h2">Scrie-ne un mesaj</h2>
                <p class="ct-sub">Pentru reclamații, sesizări sau cereri de informații. Răspundem pe email sau telefonic.</p>

                {{-- Pe telefon numerele sunt sub formular – scurtătură până la ele --}}
                <a href="#telefoane" class="ct-jump d-lg-none">
                    <span class="ct-jump__icon"><i class="bi bi-telephone-fill"></i></span>
                    <span><strong>Preferi să suni?</strong><small>Numere de telefon, inclusiv avarii 24/7</small></span>
                    <i class="bi bi-arrow-down ct-jump__arrow"></i>
                </a>

                @if(session('success'))
                    <div class="ct-alert ct-alert--ok" role="status">
                        <i class="bi bi-check-circle-fill"></i>
                        <div><strong>Mesaj trimis.</strong> {{ session('success') }}</div>
                    </div>
                @endif
                @error('general')
                    <div class="ct-alert ct-alert--err" role="alert">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        <div>{{ $message }} <a href="tel:0240524310">0240 524 310</a></div>
                    </div>
                @enderror

                <form action="{{ route('contact.trimite') }}" method="POST" enctype="multipart/form-data" class="ct-form" id="ctForm" novalidate>
                    @csrf

                    <fieldset class="ct-field">
                        <legend>Despre ce este vorba? <span class="ct-req">*</span></legend>
                        <div class="ct-chips">
                            @foreach($tipuri as $val => $eticheta)
                                <label class="ct-chip">
                                    <input type="radio" name="subiect" value="{{ $val }}" required {{ old('subiect') === $val ? 'checked' : '' }}>
                                    <span>{{ $eticheta }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('subiect')<div class="ct-err">{{ $message }}</div>@enderror
                    </fieldset>

                    <div class="ct-field">
                        <label for="ct-nume">Nume și prenume <span class="ct-req">*</span></label>
                        <input type="text" id="ct-nume" name="nume" value="{{ old('nume') }}" required minlength="3" maxlength="100"
                               autocomplete="name" autocapitalize="words" @error('nume') aria-invalid="true" @enderror>
                        @error('nume')<div class="ct-err">{{ $message }}</div>@enderror
                    </div>

                    <div class="ct-2col">
                        <div class="ct-field">
                            <label for="ct-telefon">Telefon <span class="ct-req">*</span></label>
                            <input type="tel" id="ct-telefon" name="telefon" value="{{ old('telefon') }}" required maxlength="20"
                                   autocomplete="tel" inputmode="tel" placeholder="07xx xxx xxx" @error('telefon') aria-invalid="true" @enderror>
                            @error('telefon')<div class="ct-err">{{ $message }}</div>@enderror
                        </div>
                        <div class="ct-field">
                            <label for="ct-email">Email <span class="ct-req">*</span></label>
                            <input type="email" id="ct-email" name="email" value="{{ old('email') }}" required maxlength="100"
                                   autocomplete="email" inputmode="email" autocapitalize="off" spellcheck="false" @error('email') aria-invalid="true" @enderror>
                            @error('email')<div class="ct-err">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="ct-field">
                        <label for="ct-mesaj">Mesajul tău <span class="ct-req">*</span></label>
                        <textarea id="ct-mesaj" name="mesaj" rows="5" required minlength="10" maxlength="2000"
                                  placeholder="Descrie pe scurt situația. Dacă e legat de un loc de consum, menționează adresa sau codul de client."
                                  @error('mesaj') aria-invalid="true" @enderror>{{ old('mesaj') }}</textarea>
                        <div class="ct-count"><span id="ct-count">0</span> / 2000</div>
                        @error('mesaj')<div class="ct-err">{{ $message }}</div>@enderror
                    </div>

                    <div class="ct-field">
                        <span class="ct-label">Atașamente <span class="ct-opt">opțional</span></span>
                        <label for="ct-fisiere" class="ct-upload" id="ct-upload">
                            <i class="bi bi-paperclip"></i>
                            <span><strong id="ct-upload-text">Adaugă poze sau documente</strong><small>Max. 3 fișiere · 5 MB fiecare · PDF, JPG, PNG, DOC</small></span>
                        </label>
                        <input type="file" id="ct-fisiere" name="fisiere[]" multiple accept=".pdf,.jpg,.jpeg,.png,.doc,.docx" class="visually-hidden">
                        <div id="ct-files" class="ct-files"></div>
                        @foreach(['fisiere', 'fisiere.*', 'fisiere.0', 'fisiere.1', 'fisiere.2'] as $cheie)
                            @error($cheie)<div class="ct-err">{{ $message }}</div>@enderror
                        @endforeach
                    </div>

                    <button type="submit" class="ct-submit" id="ct-submit">
                        <span class="ct-submit__idle"><i class="bi bi-send"></i> Trimite mesajul</span>
                        <span class="ct-submit__busy"><span class="spinner-border spinner-border-sm"></span> Se trimite…</span>
                    </button>
                    <p class="ct-gdpr"><i class="bi bi-shield-lock"></i> Datele tale sunt folosite doar pentru a-ți răspunde. <a href="{{ url('/gdpr') }}">Detalii GDPR</a></p>
                </form>
            </div>

            {{-- LOCAȚII --}}
            <aside class="ct-side">
                <h2 class="ct-h2" id="telefoane">Preferi să suni?</h2>

                <div class="ct-needs">
                    @foreach($nevoi as [$titlu, $cine, $numar, $href, $icon, $var])
                        <a href="{{ $href }}" class="ct-need {{ $var ? 'ct-need--'.$var : '' }}">
                            <span class="ct-need__icon"><i class="bi {{ $icon }}"></i></span>
                            <span class="ct-need__text"><strong>{{ $titlu }}</strong><small>{{ $cine }} · <span class="ct-nr">{{ $numar }}</span></small></span>
                            <span class="ct-need__go" aria-hidden="true"><i class="bi bi-telephone-fill"></i></span>
                        </a>
                    @endforeach

                    {{-- Index: acțiunea principală e online; telefonul de telecitire e separat (link-urile nu se pot imbrica) --}}
                    <div class="ct-need ct-need--split">
                        <a href="{{ url('/client/index-contor') }}" class="ct-need__main">
                            <span class="ct-need__icon"><i class="bi bi-speedometer2"></i></span>
                            <span class="ct-need__text"><strong>Transmite indexul</strong><small>Online sau la telecitire · <span class="ct-nr">0340 131 111</span></small></span>
                        </a>
                        <a href="tel:0340131111" class="ct-need__go" aria-label="Sună la telecitire: 0340 131 111"><i class="bi bi-telephone-fill"></i></a>
                    </div>
                </div>

                <p class="ct-note">
                    <i class="bi bi-journal-text"></i>
                    Solicitări în baza Legii 544/2001: <a href="mailto:relatii.public@aquaservtulcea.ro">relatii.public@aquaservtulcea.ro</a>
                    sau <a href="tel:0240524310">0240 524 310</a>, int. 118.
                </p>

                <h2 class="ct-h2 ct-h2--gap">Vino la noi</h2>
                <div class="ct-locs">
                    @foreach($locatii as $i => $l)
                        <div class="ct-loc {{ $i === 0 ? 'is-active' : '' }}">
                            <strong class="ct-loc__title">{{ $l['titlu'] }}</strong>
                            <span class="ct-loc__row"><i class="bi bi-geo-alt"></i>{{ $l['adresa'] }}</span>
                            <span class="ct-loc__row"><i class="bi bi-clock"></i>{{ $l['program'] }}</span>
                            <a class="ct-loc__row ct-loc__mail" href="mailto:{{ $l['email'] }}"><i class="bi bi-envelope"></i><span>{!! str_replace('@', '<wbr>@', e($l['email'])) !!}</span></a>
                            <a href="{{ $l['harta'] }}" class="ct-loc__map" target="_blank" rel="noopener noreferrer" data-embed="{{ $l['embed'] }}">
                                <i class="bi bi-map"></i> Deschide în Hărți
                            </a>
                        </div>
                    @endforeach
                </div>

                {{-- Harta încorporată doar pe ecrane mari; pe telefon butonul deschide aplicația de hărți --}}
                <div class="ct-map d-none d-lg-block">
                    <iframe id="ct-map" src="{{ $locatii[0]['embed'] }}" title="Hartă – {{ $locatii[0]['titlu'] }}" loading="lazy" allowfullscreen></iframe>
                </div>

                <a href="{{ url('/program-casierii') }}" class="ct-more">Programul tuturor casieriilor <i class="bi bi-arrow-right"></i></a>
            </aside>
        </div>
    </div>
</section>

{{-- ═════════ 3. CENTRE + AUDIENȚE ═════════ --}}
<section class="ct-section ct-section--soft ct-section--last">
    <div class="container">
        <div class="ct-duo">
            <div>
                <h2 class="ct-h2">Centre operaționale</h2>
                <ul class="ct-list">
                    @foreach($centre as [$oras, $tel, $href, $email])
                        <li class="ct-row">
                            <div class="ct-row__text">
                                <strong>{{ $oras }}</strong>
                                <a href="mailto:{{ $email }}">{{ $email }}</a>
                            </div>
                            <a href="{{ $href }}" class="ct-row__call"><i class="bi bi-telephone-fill"></i> {{ $tel }}</a>
                        </li>
                    @endforeach
                </ul>
                <a href="{{ url('/despre/centre-operationale') }}" class="ct-more">Localitățile deservite de fiecare centru <i class="bi bi-arrow-right"></i></a>
            </div>

            <div>
                <h2 class="ct-h2">Program de audiențe</h2>
                <ul class="ct-list">
                    @foreach($audiente as [$nume, $functie, $zi, $email])
                        <li class="ct-row">
                            <div class="ct-row__text">
                                <strong>{{ $nume }}</strong>
                                <span>{{ $functie }}</span>
                                <a href="mailto:{{ $email }}">{{ $email }}</a>
                            </div>
                            <div class="ct-row__when"><strong>{{ $zi }}</strong><span>12:00–14:00</span></div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    /* ═════════ CONTACT – „Delta”, mobile-first ═════════ */
    .ct-section { padding: 3.5rem 0; }
    .ct-section--soft { background: #f5f9fc; }
    .ct-section--last { padding-bottom: 4.5rem; }
    .ct-h2 { font-family: 'Merriweather', serif; font-weight: 700; font-size: clamp(1.3rem, 2.2vw, 1.75rem); line-height: 1.25; color: var(--site-ink); margin: 0 0 1.1rem; }
    .ct-sub { font-size: 1rem; color: #4a5d70; margin: -.5rem 0 1.5rem; line-height: 1.6; }

    /* 1. Nevoi */
    .ct-h2--gap { margin-top: 3rem; }
    #telefoane { scroll-margin-top: 90px; }
    @media (prefers-reduced-motion: no-preference) { html { scroll-behavior: smooth; } }
    .ct-jump { display: flex; align-items: center; gap: .8rem; margin: -.25rem 0 1.5rem; padding: .7rem .9rem; border-radius: 16px; background: #f5f9fc; color: var(--site-ink); text-decoration: none; }
    .ct-jump__icon { width: 38px; height: 38px; flex-shrink: 0; display: grid; place-items: center; border-radius: 50%; background: var(--site-ink); color: #fff; font-size: .9rem; }
    .ct-jump strong { display: block; font-size: .95rem; font-weight: 800; }
    .ct-jump small { display: block; font-size: .82rem; color: var(--aqua-gray); }
    .ct-jump__arrow { margin-left: auto; color: var(--aqua-primary); }
    .ct-jump:active { background: #eaf2f8; }
    .ct-needs { display: grid; grid-template-columns: minmax(0, 1fr); gap: .7rem; }
    .ct-need { display: flex; align-items: center; gap: .9rem; min-height: 76px; padding: .9rem 1rem; border: 1px solid var(--site-line); border-radius: 18px; background: #fff; color: var(--site-ink); text-decoration: none; transition: border-color .2s, box-shadow .2s; }
    .ct-need__icon { width: 46px; height: 46px; flex-shrink: 0; display: grid; place-items: center; border-radius: 14px; background: #eef6fb; color: var(--aqua-primary); font-size: 1.25rem; }
    .ct-need__text { flex: 1; min-width: 0; }
    .ct-need__text strong { display: block; font-size: 1.02rem; font-weight: 800; line-height: 1.3; }
    .ct-need__text small { display: block; margin-top: .15rem; font-size: .88rem; color: var(--aqua-gray); line-height: 1.35; }
    .ct-nr { white-space: nowrap; }
    .ct-need__go { width: 44px; height: 44px; flex-shrink: 0; display: grid; place-items: center; border-radius: 50%; background: var(--site-ink); color: #fff; font-size: .95rem; text-decoration: none; }
    .ct-need--alert { background: #fdf3f3; border-color: #f6d4d4; }
    .ct-need--alert .ct-need__icon { background: #fff; color: #d64545; }
    .ct-need--alert .ct-need__text small { color: #a61b1b; font-weight: 700; }
    .ct-need--alert .ct-need__go { background: #d64545; }
    .ct-need--split { padding: 0 1rem 0 0; }
    .ct-need__main { flex: 1; min-width: 0; display: flex; align-items: center; gap: .9rem; padding: .9rem 0 .9rem 1rem; color: inherit; text-decoration: none; }
    .ct-need:active, .ct-need__main:active { background-color: #f5f9fc; }
    @media (hover: hover) { .ct-need:hover { border-color: #cfe3f0; box-shadow: 0 14px 30px -22px rgba(13,34,54,.35); color: var(--site-ink); } }

    /* 2. Formular + locații */
    .ct-main { display: grid; grid-template-columns: minmax(0, 1.35fr) minmax(0, 1fr); gap: 3.5rem; align-items: start; }
    .ct-form-wrap { scroll-margin-top: 96px; }
    .ct-field { margin: 0 0 1.15rem; padding: 0; border: 0; min-width: 0; }
    .ct-field > label:not(.ct-upload), .ct-field legend, .ct-label { display: block; float: none; width: auto; margin: 0 0 .4rem; padding: 0; font-size: .92rem; font-weight: 800; color: var(--site-ink); }
    .ct-req { color: #d64545; }
    .ct-opt { margin-left: .3rem; font-size: .8rem; font-weight: 600; color: var(--aqua-gray); }
    .ct-field input[type=text], .ct-field input[type=tel], .ct-field input[type=email], .ct-field textarea {
        width: 100%; min-height: 50px; padding: .75rem 1rem; border: 1.5px solid #dbe5ee; border-radius: 14px; background: #fff;
        font: inherit; font-size: 1rem; color: var(--site-ink); outline: none; transition: border-color .18s, box-shadow .18s; -webkit-appearance: none;
    }
    .ct-field textarea { min-height: 140px; resize: vertical; line-height: 1.55; }
    .ct-field input:focus, .ct-field textarea:focus { border-color: var(--aqua-primary); box-shadow: 0 0 0 4px rgba(0,119,182,.12); }
    .ct-field [aria-invalid=true] { border-color: #e08b8b; background: #fffafa; }
    .ct-field ::placeholder { color: #a7b4c1; }
    .ct-err { margin-top: .35rem; font-size: .88rem; font-weight: 600; color: #c53030; }
    .ct-count { margin-top: .3rem; text-align: right; font-size: .8rem; color: var(--aqua-gray); font-variant-numeric: tabular-nums; }
    .ct-count.is-short { color: #b7791f; }
    .ct-2col { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 0 1rem; }

    .ct-chips { display: flex; flex-wrap: wrap; gap: .5rem; }
    .ct-chip { position: relative; margin: 0; cursor: pointer; }
    .ct-chip input { position: absolute; opacity: 0; width: 1px; height: 1px; }
    .ct-chip span { display: inline-flex; align-items: center; min-height: 44px; padding: 0 1.1rem; border: 1.5px solid #dbe5ee; border-radius: 999px; background: #fff; font-size: .95rem; font-weight: 700; color: #3d5266; transition: all .15s; }
    .ct-chip input:checked + span { background: var(--site-ink); border-color: var(--site-ink); color: #fff; }
    .ct-chip input:focus-visible + span { outline: 2px solid var(--aqua-primary); outline-offset: 2px; }

    .ct-upload { display: flex; align-items: center; gap: .85rem; margin: 0; padding: .85rem 1rem; border: 1.5px dashed #c9d8e3; border-radius: 14px; background: #f9fbfd; cursor: pointer; transition: border-color .18s, background .18s; }
    .ct-upload > i { font-size: 1.3rem; color: var(--aqua-primary); }
    .ct-upload strong { display: block; font-size: .95rem; color: var(--site-ink); }
    .ct-upload small { display: block; font-size: .8rem; color: var(--aqua-gray); }
    .ct-upload:hover { border-color: var(--aqua-primary); background: #f0f7fc; }
    .ct-field:has(#ct-fisiere:focus-visible) .ct-upload { outline: 2px solid var(--aqua-primary); outline-offset: 2px; }
    .ct-files { display: flex; flex-wrap: wrap; gap: .4rem; margin-top: .5rem; }
    .ct-file { display: inline-flex; align-items: center; gap: .35rem; max-width: 100%; padding: .3rem .7rem; border-radius: 999px; background: #eef6fb; color: #0b5c8c; font-size: .84rem; font-weight: 700; }
    .ct-file span { overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }

    .ct-submit { width: 100%; min-height: 54px; display: flex; align-items: center; justify-content: center; border: 0; border-radius: 999px; background: var(--site-ink); color: #fff; font: inherit; font-size: 1.02rem; font-weight: 800; transition: background .2s; }
    .ct-submit i { margin-right: .5rem; }
    .ct-submit__busy { display: none; align-items: center; gap: .5rem; }
    .ct-submit.is-busy { background: #3d5266; pointer-events: none; }
    .ct-submit.is-busy .ct-submit__idle { display: none; }
    .ct-submit.is-busy .ct-submit__busy { display: inline-flex; }
    @media (hover: hover) { .ct-submit:hover { background: var(--aqua-primary); } }
    .ct-gdpr { margin: .85rem 0 0; text-align: center; font-size: .82rem; color: var(--aqua-gray); }
    .ct-gdpr a { color: inherit; }

    .ct-alert { display: flex; gap: .7rem; align-items: flex-start; padding: .9rem 1rem; margin-bottom: 1.25rem; border-radius: 14px; font-size: .95rem; line-height: 1.5; }
    .ct-alert i { font-size: 1.2rem; margin-top: .05rem; }
    .ct-alert--ok { background: #effaf4; color: #14532d; }
    .ct-alert--ok i { color: #15936b; }
    .ct-alert--err { background: #fdf3f3; color: #7f1d1d; }
    .ct-alert--err i { color: #d64545; }
    .ct-alert a { color: inherit; font-weight: 800; }

    .ct-locs { display: grid; gap: .85rem; }
    .ct-loc { display: flex; flex-direction: column; gap: .45rem; padding: 1.15rem 1.2rem; border: 1px solid var(--site-line); border-radius: 18px; background: #fff; transition: border-color .2s; }
    .ct-loc.is-active { border-color: #9fcbe6; }
    .ct-loc__title { font-size: 1.02rem; font-weight: 800; color: var(--site-ink); margin-bottom: .1rem; }
    .ct-loc__row { display: flex; gap: .55rem; font-size: .93rem; color: #3d5266; line-height: 1.45; text-decoration: none; overflow-wrap: break-word; min-width: 0; }
    .ct-loc__row > span { min-width: 0; }
    .ct-loc__row i { color: var(--aqua-primary); margin-top: .1rem; }
    .ct-loc__mail:hover { color: var(--aqua-primary); }
    .ct-loc__map { align-self: flex-start; display: inline-flex; align-items: center; gap: .45rem; min-height: 44px; margin-top: .35rem; padding: 0 1.1rem; border: 1px solid var(--site-line); border-radius: 999px; color: var(--site-ink); font-size: .92rem; font-weight: 800; text-decoration: none; }
    .ct-loc__map:hover { background: #f5f9fc; color: var(--site-ink); }
    .ct-map { margin-top: .85rem; height: 260px; border-radius: 18px; overflow: hidden; border: 1px solid var(--site-line); }
    .ct-map iframe { width: 100%; height: 100%; border: 0; display: block; }
    .ct-more { display: inline-flex; align-items: center; gap: .4rem; min-height: 44px; margin-top: .6rem; font-size: .95rem; font-weight: 800; color: var(--aqua-primary); text-decoration: none; }
    .ct-more i { transition: transform .2s; }
    .ct-more:hover i { transform: translateX(3px); }

    /* 3. Centre + audiențe */
    .ct-duo { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 3rem; }
    .ct-list { list-style: none; margin: 0; padding: 0; border: 1px solid var(--site-line); border-radius: 18px; background: #fff; overflow: hidden; }
    .ct-row { display: flex; align-items: center; gap: 1rem; padding: .95rem 1.1rem; }
    .ct-row + .ct-row { border-top: 1px solid var(--site-line); }
    .ct-row__text { flex: 1; min-width: 0; display: flex; flex-direction: column; gap: .1rem; }
    .ct-row__text strong { font-size: 1rem; font-weight: 800; color: var(--site-ink); }
    .ct-row__text span { font-size: .9rem; color: #3d5266; }
    .ct-row__text a { font-size: .85rem; color: var(--aqua-gray); text-decoration: none; overflow-wrap: anywhere; }
    .ct-row__text a:hover { color: var(--aqua-primary); }
    .ct-row__call { flex-shrink: 0; display: inline-flex; align-items: center; gap: .4rem; min-height: 44px; padding: 0 1rem; border-radius: 999px; background: #eef6fb; color: #0b5c8c; font-size: .92rem; font-weight: 800; text-decoration: none; white-space: nowrap; }
    .ct-row__call:hover { background: #dcedf7; color: #0b5c8c; }
    .ct-row__when { flex-shrink: 0; text-align: right; }
    .ct-row__when strong { display: block; font-size: .95rem; font-weight: 800; color: var(--site-ink); }
    .ct-row__when span { font-size: .85rem; color: var(--aqua-gray); }
    .ct-note { margin: .85rem 0 0; font-size: .9rem; color: #4a5d70; }
    .ct-note a { color: var(--site-ink); font-weight: 800; }

    /* ── Tabletă ── */
    @media (max-width: 991.98px) {
        .ct-needs { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .ct-h2--gap { margin-top: 2.5rem; }
        .ct-main, .ct-duo { grid-template-columns: minmax(0, 1fr); gap: 3rem; }
    }

    /* ── Mobil ── */
    @media (max-width: 767.98px) {
        .ct-section { padding: 2.5rem 0; }
        .ct-section--last { padding-bottom: 3.5rem; }
        .ct-needs { grid-template-columns: minmax(0, 1fr); gap: .6rem; }
        .ct-need { min-height: 72px; padding: .8rem .9rem; gap: .8rem; border-radius: 16px; }
        .ct-need--split { padding: 0 .9rem 0 0; }
        .ct-need__main { padding: .8rem 0 .8rem .9rem; gap: .8rem; }
        .ct-need__icon { width: 42px; height: 42px; font-size: 1.15rem; border-radius: 12px; }
        .ct-need__text small { font-size: .85rem; }
        .ct-2col { grid-template-columns: minmax(0, 1fr); }
        .ct-main { gap: 2.5rem; }
        .ct-row { padding: .85rem .95rem; gap: .75rem; }
        .ct-row__call { padding: 0 .85rem; font-size: .88rem; }
    }
    @media (max-width: 479.98px) {
        /* pe telefoane, butonul cu numărul centrului trece sub nume – emailul încape pe un rând */
        .ct-row { flex-wrap: wrap; }
        .ct-row__call { width: 100%; justify-content: center; }
    }
</style>
@endpush

@push('scripts')
<script nonce="@nonce">
document.addEventListener('DOMContentLoaded', function () {
    var form   = document.getElementById('ctForm');
    var mesaj  = document.getElementById('ct-mesaj');
    var count  = document.getElementById('ct-count');
    var input  = document.getElementById('ct-fisiere');
    var lista  = document.getElementById('ct-files');
    var submit = document.getElementById('ct-submit');

    // După trimitere (succes / erori) duce la formular — e reacție la acțiunea utilizatorului
    @if($errors->any() || session('success'))
        document.getElementById('formular-contact').scrollIntoView({ behavior: 'smooth', block: 'start' });
    @endif

    // Contor caractere mesaj
    function numara() {
        var n = mesaj.value.length;
        count.textContent = n;
        count.parentElement.classList.toggle('is-short', n > 0 && n < 10);
    }
    mesaj.addEventListener('input', numara);
    numara();

    // Fișiere selectate
    input.addEventListener('change', function () {
        var files = Array.from(input.files);
        lista.innerHTML = '';
        document.getElementById('ct-upload-text').textContent = files.length
            ? (files.length === 1 ? '1 fișier ales' : files.length + ' fișiere alese') + (files.length > 3 ? ' (max. 3!)' : '')
            : 'Adaugă poze sau documente';
        files.forEach(function (f) {
            var chip = document.createElement('span');
            chip.className = 'ct-file';
            chip.innerHTML = '<i class="bi bi-file-earmark"></i>';
            var nume = document.createElement('span');
            nume.textContent = f.name;
            chip.appendChild(nume);
            lista.appendChild(chip);
        });
    });

    // Validare în română, cu mesaj sub câmp (formularul are novalidate ca să nu apară bulele browserului)
    var mesaje = {
        subiect: { valueMissing: 'Alege despre ce este vorba.' },
        nume:    { valueMissing: 'Numele este obligatoriu.', tooShort: 'Numele trebuie să aibă cel puțin 3 caractere.' },
        telefon: { valueMissing: 'Numărul de telefon este obligatoriu.' },
        email:   { valueMissing: 'Adresa de email este obligatorie.', typeMismatch: 'Introdu o adresă de email validă (ex: nume@domeniu.ro).' },
        mesaj:   { valueMissing: 'Mesajul este obligatoriu.', tooShort: 'Mesajul trebuie să aibă cel puțin 10 caractere.' },
    };
    function eroare(camp, text) {
        var cont = camp.closest('.ct-field');
        // la corectare dispar și erorile venite de la server
        if (!text) { cont.querySelectorAll('.ct-err').forEach(function (x) { x.remove(); }); if (camp.type !== 'radio') camp.removeAttribute('aria-invalid'); return; }
        cont.querySelectorAll('.ct-err:not(.js)').forEach(function (x) { x.remove(); });
        var el = cont.querySelector('.ct-err.js');
        if (!el) { el = document.createElement('div'); el.className = 'ct-err js'; cont.appendChild(el); }
        el.textContent = text;
        if (camp.type !== 'radio') camp.setAttribute('aria-invalid', 'true');
    }
    function verifica(camp) {
        var v = camp.validity, r = mesaje[camp.name] || {};
        var text = v.valid ? '' : (v.valueMissing ? r.valueMissing : v.typeMismatch ? r.typeMismatch : v.tooShort ? r.tooShort : camp.validationMessage);
        eroare(camp, text);
        return v.valid;
    }
    form.querySelectorAll('input[name=nume], input[name=telefon], input[name=email], textarea').forEach(function (c) {
        c.addEventListener('blur', function () { if (c.value) verifica(c); });
        c.addEventListener('input', function () { if (c.getAttribute('aria-invalid')) verifica(c); });
    });
    form.querySelectorAll('input[name=subiect]').forEach(function (r) {
        r.addEventListener('change', function () { eroare(r, ''); });
    });

    form.addEventListener('submit', function (e) {
        var primul = null;
        var radio = form.querySelector('input[name=subiect]');
        if (!verifica(radio)) primul = radio;
        form.querySelectorAll('input[name=nume], input[name=telefon], input[name=email], textarea').forEach(function (c) {
            if (!verifica(c) && !primul) primul = c;
        });
        if (primul) {
            e.preventDefault();
            primul.closest('.ct-field').scrollIntoView({ behavior: 'smooth', block: 'center' });
            if (primul.type !== 'radio') primul.focus({ preventScroll: true });
            return;
        }
        submit.classList.add('is-busy'); // previne trimiterea dublă
    });

    // Pe desktop, „Deschide în Hărți” schimbă harta încorporată; pe telefon deschide aplicația de hărți
    var harta = document.getElementById('ct-map');
    document.querySelectorAll('.ct-loc__map').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            if (!harta || harta.offsetParent === null) return;
            e.preventDefault();
            harta.src = btn.dataset.embed;
            document.querySelectorAll('.ct-loc').forEach(function (l) { l.classList.remove('is-active'); });
            btn.closest('.ct-loc').classList.add('is-active');
        });
    });
});
</script>
@endpush
