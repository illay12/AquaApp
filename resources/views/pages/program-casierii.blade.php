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
/* ═══════════════════════════════════════
   PAGE
═══════════════════════════════════════ */
.pc-page { background: #f7f9fc; padding: 3rem 0 5rem; }
@media(max-width:767px) { .pc-page { padding: 1.5rem 0 3rem; } }

/* ═══════════════════════════════════════
   BANNER INFO
═══════════════════════════════════════ */
.pc-banner {
    background: #eef6ff;
    border: 1px solid #bfdbfe;
    border-radius: 12px;
    padding: 1rem 1.25rem;
    font-size: 0.9rem;
    color: #1e40af;
    display: flex;
    align-items: center;
    gap: .75rem;
    margin-bottom: 2rem;
}
.pc-banner i { font-size: 1.1rem; flex-shrink: 0; }
.pc-banner a { color: #1d4ed8; font-weight: 700; text-decoration: none; }
.pc-banner a:hover { text-decoration: underline; }

/* ═══════════════════════════════════════
   GRID CASIERII
═══════════════════════════════════════ */
.pc-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
    margin-bottom: 2rem;
}
@media(max-width:991px) { .pc-grid { grid-template-columns: repeat(2, 1fr); } }
@media(max-width:575px)  { .pc-grid { grid-template-columns: 1fr; } }

/* ═══════════════════════════════════════
   CARD CASERIE
═══════════════════════════════════════ */
.pc-card {
    background: #fff;
    border: 1px solid #e4e9f0;
    border-radius: 14px;
    overflow: hidden;
    transition: box-shadow .2s, transform .2s;
}
.pc-card:hover {
    box-shadow: 0 8px 28px rgba(0,119,182,.1);
    transform: translateY(-2px);
}
@media(max-width:575px) {
    .pc-card:hover { transform: none; }
    .pc-card { border-radius: 12px; }
}

/* Header card */
.pc-card-head {
    background: linear-gradient(135deg, #023e8a, #0077b6);
    padding: .85rem 1.1rem;
    display: flex; align-items: center; gap: .65rem;
}
.pc-card-head.tulcea { background: linear-gradient(135deg, #012a6b, #0077b6); }
.pc-card-head.isaccea { background: linear-gradient(135deg, #0077b6, #00b4d8); }
.pc-card-head.macin   { background: linear-gradient(135deg, #0077b6, #0096c7); }
.pc-card-head.sulina  { background: linear-gradient(135deg, #0096c7, #00b4d8); }
.pc-card-head.babadag { background: linear-gradient(135deg, #023e8a, #0096c7); }

.pc-card-ico {
    width: 34px; height: 34px; border-radius: 9px;
    background: rgba(255,255,255,.15);
    display: flex; align-items: center; justify-content: center;
    font-size: .95rem; color: #fff; flex-shrink: 0;
}
.pc-card-name {
    font-weight: 800; color: #fff; font-size: .9rem; line-height: 1.2;
}
.pc-card-sub {
    font-size: .7rem; color: rgba(255,255,255,.65); margin-top: 1px;
}

/* Body card */
.pc-card-body { padding: 1rem 1.1rem; }

.pc-row {
    display: flex; align-items: flex-start; gap: .5rem;
    padding: .22rem 0; font-size: .85rem; color: #444; line-height: 1.45;
}
.pc-row i { font-size: .78rem; color: #bbb; margin-top: 3px; flex-shrink: 0; }
.pc-row a { color: var(--aqua-primary); text-decoration: none; font-weight: 700; }
.pc-row a:hover { text-decoration: underline; }

/* Orar badge */
.pc-orar {
    margin-top: .75rem;
    background: #f0f8ff;
    border: 1px solid #bfdbfe;
    border-radius: 9px;
    overflow: hidden;
}
.pc-orar-row {
    display: flex; align-items: center; justify-content: space-between;
    padding: .5rem .8rem;
    border-bottom: 1px solid #dbeafe;
    font-size: .82rem;
}
.pc-orar-row:last-child { border-bottom: none; }
.pc-orar-zile { color: #555; font-weight: 600; }
.pc-orar-ore  { color: var(--aqua-primary); font-weight: 900; font-size: .88rem; }
.pc-orar-inchis { color: #dc2626; font-weight: 800; font-size: .82rem; }

/* ═══════════════════════════════════════
   CARD SPECIAL — Tulcea (mai mare, primul)
═══════════════════════════════════════ */
.pc-card.featured {
    border-color: #bfdbfe;
    grid-column: span 1;
}
@media(max-width:991px) {
    .pc-card.featured { grid-column: span 2; }
}
@media(max-width:575px) {
    .pc-card.featured { grid-column: span 1; }
}

/* ═══════════════════════════════════════
   MODALITATI PLATA
═══════════════════════════════════════ */
.pc-pay {
    background: #fff;
    border: 1px solid #e4e9f0;
    border-radius: 14px;
    overflow: hidden;
}
.pc-pay-head {
    padding: 1rem 1.25rem;
    border-bottom: 1px solid #f0f4f8;
    font-weight: 800; font-size: .95rem; color: #111;
    display: flex; align-items: center; gap: .5rem;
}
.pc-pay-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 0;
}
@media(max-width:767px) { .pc-pay-grid { grid-template-columns: repeat(2, 1fr); } }
@media(max-width:400px) { .pc-pay-grid { grid-template-columns: 1fr; } }

.pc-pay-item {
    display: flex; align-items: flex-start; gap: .65rem;
    padding: 1rem 1.1rem;
    border-right: 1px solid #f0f4f8;
    border-bottom: 1px solid #f0f4f8;
    font-size: .82rem; color: #444; line-height: 1.4;
}
.pc-pay-item:nth-child(3n) { border-right: none; }
@media(max-width:767px) {
    .pc-pay-item:nth-child(2n) { border-right: none; }
    .pc-pay-item:nth-child(3n) { border-right: 1px solid #f0f4f8; }
}
.pc-pay-item i {
    font-size: 1rem; margin-top: 1px; flex-shrink: 0;
    color: var(--aqua-primary);
}
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
                    <div class="pc-card-name">Caserie Tulcea</div>
                    <div class="pc-card-sub">Sediu central</div>
                </div>
            </div>
            <div class="pc-card-body">
                <div class="pc-row"><i class="bi bi-geo-alt-fill"></i><span>Str. Tudor Vladimirescu, nr. 2</span></div>
                <div class="pc-row"><i class="bi bi-telephone-fill"></i><a href="tel:0240511369">0240.511.369</a></div>
                <div class="pc-row"><i class="bi bi-envelope-fill"></i><a href="mailto:contractare.facturare@aquaservtulcea.ro">contractare.facturare@aquaservtulcea.ro</a></div>
                <div class="pc-orar">
                    <div class="pc-orar-row">
                        <span class="pc-orar-zile">Luni – Vineri</span>
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
                    <div class="pc-card-name">Caserie Isaccea</div>
                    <div class="pc-card-sub">Centru Operațional</div>
                </div>
            </div>
            <div class="pc-card-body">
                <div class="pc-row"><i class="bi bi-telephone-fill"></i><a href="tel:0240540302">0240.540.302</a></div>
                <div class="pc-row"><i class="bi bi-phone-fill"></i><a href="tel:0754013201">0754 013 201</a></div>
                <div class="pc-row"><i class="bi bi-envelope-fill"></i><a href="mailto:centru.isaccea@aquaservtulcea.ro">centru.isaccea@aquaservtulcea.ro</a></div>
                <div class="pc-orar">
                    <div class="pc-orar-row">
                        <span class="pc-orar-zile">Luni – Joi</span>
                        <span class="pc-orar-ore">07:30 – 16:00</span>
                    </div>
                    <div class="pc-orar-row">
                        <span class="pc-orar-zile">Vineri</span>
                        <span class="pc-orar-ore">07:30 – 13:30</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- MACIN --}}
        <div class="pc-card">
            <div class="pc-card-head macin">
                <div class="pc-card-ico"><i class="bi bi-building"></i></div>
                <div>
                    <div class="pc-card-name">Caserie Măcin</div>
                    <div class="pc-card-sub">Centru Operațional</div>
                </div>
            </div>
            <div class="pc-card-body">
                <div class="pc-row"><i class="bi bi-telephone-fill"></i><a href="tel:0240571180">0240.571.180</a></div>
                <div class="pc-row"><i class="bi bi-envelope-fill"></i><a href="mailto:centru.macin@aquaservtulcea.ro">centru.macin@aquaservtulcea.ro</a></div>
                <div class="pc-orar">
                    <div class="pc-orar-row">
                        <span class="pc-orar-zile">Luni – Joi</span>
                        <span class="pc-orar-ore">07:30 – 16:00</span>
                    </div>
                    <div class="pc-orar-row">
                        <span class="pc-orar-zile">Vineri</span>
                        <span class="pc-orar-ore">07:30 – 13:30</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- SULINA --}}
        <div class="pc-card">
            <div class="pc-card-head sulina">
                <div class="pc-card-ico"><i class="bi bi-building"></i></div>
                <div>
                    <div class="pc-card-name">Caserie Sulina</div>
                    <div class="pc-card-sub">Centru Operațional</div>
                </div>
            </div>
            <div class="pc-card-body">
                <div class="pc-row"><i class="bi bi-telephone-fill"></i><a href="tel:0240543147">0240.543.147</a></div>
                <div class="pc-row"><i class="bi bi-envelope-fill"></i><a href="mailto:centru.sulina@aquaservtulcea.ro">centru.sulina@aquaservtulcea.ro</a></div>
                <div class="pc-orar">
                    <div class="pc-orar-row">
                        <span class="pc-orar-zile">Luni – Joi</span>
                        <span class="pc-orar-ore">07:30 – 16:00</span>
                    </div>
                    <div class="pc-orar-row">
                        <span class="pc-orar-zile">Vineri</span>
                        <span class="pc-orar-ore">07:30 – 13:30</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- BABADAG --}}
        <div class="pc-card">
            <div class="pc-card-head babadag">
                <div class="pc-card-ico"><i class="bi bi-building"></i></div>
                <div>
                    <div class="pc-card-name">Caserie Babadag</div>
                    <div class="pc-card-sub">Centru Operațional</div>
                </div>
            </div>
            <div class="pc-card-body">
                <div class="pc-row"><i class="bi bi-telephone-fill"></i><a href="tel:0240562340">0240.562.340</a></div>
                <div class="pc-row"><i class="bi bi-envelope-fill"></i><a href="mailto:centru.babadag@aquaservtulcea.ro">centru.babadag@aquaservtulcea.ro</a></div>
                <div class="pc-orar">
                    <div class="pc-orar-row">
                        <span class="pc-orar-zile">Luni – Joi</span>
                        <span class="pc-orar-ore">08:00 – 16:30</span>
                    </div>
                    <div class="pc-orar-row">
                        <span class="pc-orar-zile">Vineri</span>
                        <span class="pc-orar-ore">08:00 – 14:30</span>
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