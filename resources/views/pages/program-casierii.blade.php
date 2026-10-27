@extends('layouts.app')

@section('title', 'Program Casierii')

@section('page_hero')
    <h1><i class="bi bi-clock me-2"></i>Program Casierii</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item active">Program Casierii</li>
        </ol>
    </nav>
@endsection

@push('styles')
<style>
/* ═════════ PROGRAM CASIERII – stil „Delta” ═════════ */
.pc-page { background: #fff; padding: 1.75rem 0 4rem; }
@media(max-width:767px) { .pc-page { padding: 1rem 0 3rem; } }

/* Banner plată online */
.pc-banner {
    display: flex; align-items: center; gap: .9rem; flex-wrap: wrap;
    padding: 1.1rem 1.25rem; margin-bottom: 1.75rem;
    border-radius: 18px; background: #eef6fb; color: var(--site-ink);
    font-size: .95rem; font-weight: 600; line-height: 1.5;
}
.pc-banner i { font-size: 1.25rem; color: var(--aqua-primary); flex-shrink: 0; }
.pc-banner span { flex: 1; min-width: 200px; }
.pc-banner a {
    display: inline-flex; align-items: center; gap: .35rem; margin-top: .35rem;
    color: var(--aqua-primary); font-weight: 800; text-decoration: none;
}
.pc-banner a:hover { text-decoration: underline; }

/* Grid */
.pc-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.1rem; margin-bottom: 2rem; }
@media(max-width:991px) { .pc-grid { grid-template-columns: repeat(2, 1fr); } }
@media(max-width:575px)  { .pc-grid { grid-template-columns: 1fr; gap: .8rem; } }

/* Card casierie */
.pc-card { background: #fff; border: 1px solid var(--site-line); border-radius: 20px; overflow: hidden; transition: box-shadow .25s; }
@media(hover:hover) { .pc-card:hover { box-shadow: 0 20px 40px -26px rgba(13,34,54,.4); } }
@media(max-width:575px) { .pc-card { border-radius: 16px; } }

.pc-card-head { padding: 1.15rem 1.25rem .4rem; display: flex; align-items: center; gap: .8rem; background: transparent; }
.pc-card-ico {
    width: 42px; height: 42px; border-radius: 13px; flex-shrink: 0;
    display: flex; align-items: center; justify-content: center;
    background: #e9f3fa; color: var(--aqua-primary); font-size: 1.05rem;
}
.pc-card.featured .pc-card-ico { background: var(--site-deep); color: #fff; }
.pc-card-name { font-family: 'Merriweather', serif; font-weight: 700; color: var(--site-ink); font-size: 1.05rem; line-height: 1.25; }
.pc-card-sub { font-size: .7rem; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; color: #8a9aab; margin-top: 2px; }

.pc-card-body { padding: .6rem 1.25rem 1.25rem; }
.pc-row { display: flex; align-items: flex-start; gap: .6rem; padding: .3rem 0; font-size: .92rem; color: #4a5b6d; line-height: 1.45; }
.pc-row i { font-size: .85rem; color: #a8b8c7; margin-top: 3px; flex-shrink: 0; }
.pc-row a { color: var(--site-ink); text-decoration: none; font-weight: 800; overflow-wrap: break-word; min-width: 0; }
.pc-row a:hover { color: var(--aqua-primary); }

/* Orar */
.pc-orar { margin-top: .9rem; border-radius: 14px; background: #f6fafd; overflow: hidden; }
.pc-orar-row { display: flex; align-items: center; justify-content: space-between; gap: .75rem; padding: .65rem .95rem; border-bottom: 1px solid #e8f0f6; font-size: .9rem; }
.pc-orar-row:last-child { border-bottom: none; }
.pc-orar-zile { color: #4a5b6d; font-weight: 600; }
.pc-orar-ore { color: var(--site-ink); font-weight: 800; font-variant-numeric: tabular-nums; white-space: nowrap; }
.pc-orar-inchis { color: #c53030; font-weight: 800; font-size: .82rem; letter-spacing: .04em; }

.pc-card.featured { grid-column: span 1; }
@media(max-width:991px) { .pc-card.featured { grid-column: span 2; } }
@media(max-width:575px) { .pc-card.featured { grid-column: span 1; } }

/* Modalități de plată */
.pc-pay { background: #fff; border: 1px solid var(--site-line); border-radius: 20px; overflow: hidden; }
.pc-pay-head { padding: 1.15rem 1.25rem; border-bottom: 1px solid var(--site-line); font-family: 'Merriweather', serif; font-weight: 700; font-size: 1.1rem; color: var(--site-ink); display: flex; align-items: center; gap: .6rem; }
.pc-pay-head i { color: var(--aqua-primary); }
.pc-pay-grid { display: grid; grid-template-columns: repeat(3, 1fr); }
@media(max-width:767px) { .pc-pay-grid { grid-template-columns: repeat(2, 1fr); } }
@media(max-width:400px) { .pc-pay-grid { grid-template-columns: 1fr; } }
.pc-pay-item { display: flex; align-items: flex-start; gap: .7rem; padding: 1.05rem 1.2rem; border-right: 1px solid var(--site-line); border-bottom: 1px solid var(--site-line); font-size: .9rem; color: #4a5b6d; line-height: 1.45; }
.pc-pay-item:nth-child(3n) { border-right: none; }
@media(max-width:767px) {
    .pc-pay-item:nth-child(2n) { border-right: none; }
    .pc-pay-item:nth-child(3n) { border-right: 1px solid var(--site-line); }
}
@media(max-width:400px) { .pc-pay-item { border-right: none !important; } }
.pc-pay-item i { font-size: 1.1rem; margin-top: 1px; flex-shrink: 0; color: var(--aqua-primary); }
.pc-pay-item strong { color: var(--site-ink); }
</style>
@endpush

@section('content')
<div class="pc-page">
<div class="container">

    {{-- Banner online --}}
    <div class="pc-banner">
        <i class="bi bi-info-circle-fill"></i>
        <span>Plata facturilor se poate efectua și <strong>online</strong> prin portalul Zona Clienți, non-stop 24/7.
        <a href="https://my.aquaservtulcea.ro/" target="_blank" rel="noopener noreferrer">Plătește online →</a></span>
    </div>

    {{-- ═══════════════════════════════════════
         CASIERII
    ═══════════════════════════════════════ --}}
    <div class="pc-grid">

        {{-- TULCEA --}}
        <div class="pc-card featured">
            <div class="pc-card-head tulcea">
                <div class="pc-card-ico"><i class="bi bi-building"></i></div>
                <div>
                    <div class="pc-card-name">Casierie Tulcea</div>
                    <div class="pc-card-sub">Sediu central</div>
                </div>
            </div>
            <div class="pc-card-body">
                <div class="pc-row"><i class="bi bi-geo-alt-fill"></i><span>Str. Tudor Vladimirescu, nr. 2</span></div>
                <div class="pc-row"><i class="bi bi-telephone-fill"></i><a href="tel:0240511369">0240.511.369</a></div>
                <div class="pc-row"><i class="bi bi-envelope-fill"></i><a href="mailto:contractare.facturare@aquaservtulcea.ro">contractare.facturare<wbr>@aquaservtulcea.ro</a></div>
                <div class="pc-orar">
                    <div class="pc-orar-row">
                        <span class="pc-orar-zile">Luni – Joi</span>
                        <span class="pc-orar-ore">07:30 – 17:00</span>
                    </div>
                    <div class="pc-orar-row">
                        <span class="pc-orar-zile">Vineri</span>
                        <span class="pc-orar-ore">07:30 – 17:00</span>
                    </div>
                    <div class="pc-orar-row">
                        <span class="pc-orar-zile">Sâmbătă – Duminică</span>
                        <span class="pc-orar-inchis">ÎNCHIS</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- ISACCEA --}}
        <div class="pc-card">
            <div class="pc-card-head isaccea">
                <div class="pc-card-ico"><i class="bi bi-building"></i></div>
                <div>
                    <div class="pc-card-name">Casierie Isaccea</div>
                    <div class="pc-card-sub">Centru Operațional</div>
                </div>
            </div>
            <div class="pc-card-body">
                <div class="pc-row"><i class="bi bi-geo-alt-fill"></i><span>Strada Mircea Vodă, Nr. 18</span></div>
                <div class="pc-row"><i class="bi bi-telephone-fill"></i><span><a href="tel:0240540302">0240.540.302</a> / <a href="tel:0754013201">0754 013 201</a></span></div>
                <div class="pc-row"><i class="bi bi-envelope-fill"></i><a href="mailto:centru.isaccea@aquaservtulcea.ro">centru.isaccea<wbr>@aquaservtulcea.ro</a></div>
                <div class="pc-orar">
                    <div class="pc-orar-row">
                        <span class="pc-orar-zile">Luni – Joi</span>
                        <span class="pc-orar-ore">07:30 – 16:00</span>
                    </div>
                    <div class="pc-orar-row">
                        <span class="pc-orar-zile">Vineri</span>
                        <span class="pc-orar-ore">07:30 – 13:30</span>
                    </div>
                    <div class="pc-orar-row">
                        <span class="pc-orar-zile">Sâmbătă – Duminică</span>
                        <span class="pc-orar-inchis">ÎNCHIS</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- MACIN --}}
        <div class="pc-card">
            <div class="pc-card-head macin">
                <div class="pc-card-ico"><i class="bi bi-building"></i></div>
                <div>
                    <div class="pc-card-name">Casierie Măcin</div>
                    <div class="pc-card-sub">Centru Operațional</div>
                </div>
            </div>
            <div class="pc-card-body">
                <div class="pc-row"><i class="bi bi-geo-alt-fill"></i><span>Str. 1 Decembrie 1918, Nr. 32</span></div>
                <div class="pc-row"><i class="bi bi-telephone-fill"></i><a href="tel:0240571180">0240.571.180</a></div>
                <div class="pc-row"><i class="bi bi-envelope-fill"></i><a href="mailto:centru.macin@aquaservtulcea.ro">centru.macin<wbr>@aquaservtulcea.ro</a></div>
                <div class="pc-orar">
                    <div class="pc-orar-row">
                        <span class="pc-orar-zile">Luni – Joi</span>
                        <span class="pc-orar-ore">07:30 – 16:00</span>
                    </div>
                    <div class="pc-orar-row">
                        <span class="pc-orar-zile">Vineri</span>
                        <span class="pc-orar-ore">07:30 – 13:30</span>
                    </div>
                    <div class="pc-orar-row">
                        <span class="pc-orar-zile">Sâmbătă – Duminică</span>
                        <span class="pc-orar-inchis">ÎNCHIS</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- SULINA --}}
        <div class="pc-card">
            <div class="pc-card-head sulina">
                <div class="pc-card-ico"><i class="bi bi-building"></i></div>
                <div>
                    <div class="pc-card-name">Casierie Sulina</div>
                    <div class="pc-card-sub">Centru Operațional</div>
                </div>
            </div>
            <div class="pc-card-body">
                <div class="pc-row"><i class="bi bi-geo-alt-fill"></i><span>Strada I, Nr. 142</span></div>
                <div class="pc-row"><i class="bi bi-telephone-fill"></i><a href="tel:0240543147">0240.543.147</a></div>
                <div class="pc-row"><i class="bi bi-envelope-fill"></i><a href="mailto:centru.sulina@aquaservtulcea.ro">centru.sulina<wbr>@aquaservtulcea.ro</a></div>
                <div class="pc-orar">
                    <div class="pc-orar-row">
                        <span class="pc-orar-zile">Luni – Joi</span>
                        <span class="pc-orar-ore">07:30 – 16:00</span>
                    </div>
                    <div class="pc-orar-row">
                        <span class="pc-orar-zile">Vineri</span>
                        <span class="pc-orar-ore">07:30 – 13:30</span>
                    </div>
                    <div class="pc-orar-row">
                        <span class="pc-orar-zile">Sâmbătă – Duminică</span>
                        <span class="pc-orar-inchis">ÎNCHIS</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- BABADAG --}}
        <div class="pc-card">
            <div class="pc-card-head babadag">
                <div class="pc-card-ico"><i class="bi bi-building"></i></div>
                <div>
                    <div class="pc-card-name">Casierie Babadag</div>
                    <div class="pc-card-sub">Centru Operațional</div>
                </div>
            </div>
            <div class="pc-card-body">
                <div class="pc-row"><i class="bi bi-geo-alt-fill"></i><span>Strada Republicii, Nr. 83</span></div>
                <div class="pc-row"><i class="bi bi-telephone-fill"></i><a href="tel:0240562340">0240.562.340</a></div>
                <div class="pc-row"><i class="bi bi-envelope-fill"></i><a href="mailto:centru.babadag@aquaservtulcea.ro">centru.babadag<wbr>@aquaservtulcea.ro</a></div>
                <div class="pc-orar">
                    <div class="pc-orar-row">
                        <span class="pc-orar-zile">Luni – Joi</span>
                        <span class="pc-orar-ore">08:00 – 16:30</span>
                    </div>
                    <div class="pc-orar-row">
                        <span class="pc-orar-zile">Vineri</span>
                        <span class="pc-orar-ore">08:00 – 14:30</span>
                    </div>
                    <div class="pc-orar-row">
                        <span class="pc-orar-zile">Sâmbătă – Duminică</span>
                        <span class="pc-orar-inchis">ÎNCHIS</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- ═══════════════════════════════════════
         MODALITATI DE PLATA
    ═══════════════════════════════════════ --}}
    <div class="pc-pay">
        <div class="pc-pay-head">
            <i class="bi bi-credit-card-fill" style="color:var(--aqua-primary)"></i>
            Modalități de plată acceptate
        </div>
        <div class="pc-pay-grid">
            <div class="pc-pay-item">
                <i class="bi bi-cash-coin"></i>
                <span><strong>Numerar sau card</strong> la ghișeul casieriei</span>
            </div>
            <div class="pc-pay-item">
                <i class="bi bi-globe"></i>
                <span><strong>Online</strong> prin portalul <a href="https://my.aquaservtulcea.ro/" target="_blank" rel="noopener noreferrer" style="color:var(--aqua-primary);font-weight:700;">Zona Clienți</a></span>
            </div>
            <div class="pc-pay-item">
                <i class="bi bi-bank"></i>
                <span><strong>Virament bancar</strong> la IBAN-ul indicat pe factură</span>
            </div>
            <div class="pc-pay-item">
                <i class="bi bi-envelope"></i>
                <span><strong>Oficiu poștal</strong> – orice unitate din județ</span>
            </div>
            <div class="pc-pay-item">
                <i class="bi bi-phone"></i>
                <span><strong>Mobile banking</strong> sau Ghișeul.ro</span>
            </div>
        </div>
    </div>

</div>
</div>
@endsection