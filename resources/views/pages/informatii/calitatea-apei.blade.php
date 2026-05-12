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

@push('styles')
<style>
/* ── Accordion an ── */
.year-accordion {
    border: 1px solid var(--aqua-border);
    border-radius: 12px;
    overflow: hidden;
    margin-bottom: 0.75rem;
    background: #fff;
    transition: box-shadow 0.2s;
}
.year-accordion.open {
    box-shadow: 0 4px 20px rgba(0,119,182,0.1);
}
.year-btn {
    width: 100%;
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem 1.25rem;
    background: transparent;
    border: none;
    cursor: pointer;
    font-family: inherit;
    transition: background 0.17s;
    text-align: left;
}
.year-btn:hover { background: var(--aqua-bg); }
.year-accordion.open .year-btn {
    background: linear-gradient(90deg, #023e8a, #0077b6);
}
.year-badge {
    background: var(--aqua-primary);
    color: #fff;
    font-weight: 800;
    font-size: 1rem;
    padding: 0.3rem 1.1rem;
    border-radius: 20px;
    letter-spacing: -0.01em;
    transition: background 0.17s;
    flex-shrink: 0;
}
.year-accordion.open .year-badge {
    background: rgba(255,255,255,0.25);
}
.year-meta {
    flex: 1;
    font-size: 0.82rem;
    font-weight: 600;
    color: #64748b;
    transition: color 0.17s;
}
.year-accordion.open .year-meta { color: rgba(255,255,255,0.75); }
.year-chevron {
    font-size: 0.75rem;
    color: var(--aqua-primary);
    transition: transform 0.25s, color 0.17s;
    flex-shrink: 0;
}
.year-accordion.open .year-chevron {
    transform: rotate(180deg);
    color: #fff;
}
.year-body {
    display: none;
    padding: 1.25rem;
    border-top: 1px solid var(--aqua-border);
    animation: fadeIn 0.18s ease;
}
@keyframes fadeIn { from { opacity:0; transform:translateY(-4px); } to { opacity:1; transform:translateY(0); } }

/* ── Luna block ── */
.luna-block {
    margin-bottom: 1.25rem;
    padding-left: 0.85rem;
    border-left: 3px solid #bae6fd;
}
.luna-block:last-child { margin-bottom: 0; }
.luna-title {
    font-size: 0.82rem;
    font-weight: 700;
    color: #0369a1;
    margin-bottom: 0.6rem;
    display: flex;
    align-items: center;
    gap: 0.4rem;
}

/* ── Buletin card ── */
.buletin-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    padding: 0.85rem 0.5rem;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    transition: all 0.2s;
    min-height: 70px;
}
.buletin-card:hover {
    background: #e0f2fe;
    border-color: #0369a1;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(3,105,161,0.12);
}
.buletin-card i { font-size: 1.8rem; color: #dc2626; margin-bottom: 0.3rem; }
.buletin-card .buletin-name {
    font-size: 0.75rem; font-weight: 700; color: #1e293b;
    text-align: center; line-height: 1.3;
}
.buletin-card .buletin-size { font-size: 0.68rem; color: #94a3b8; margin-top: 0.2rem; }

/* ── Luna accordion ── */
.luna-accordion {
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 0.6rem;
    background: #fff;
    transition: box-shadow 0.17s;
}
.luna-accordion:last-child { margin-bottom: 0; }
.luna-accordion.open { box-shadow: 0 2px 12px rgba(3,105,161,0.09); }
.luna-btn {
    width: 100%;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.7rem 1rem;
    background: transparent;
    border: none;
    cursor: pointer;
    font-family: inherit;
    text-align: left;
    transition: background 0.15s;
}
.luna-btn:hover { background: #f0f7ff; }
.luna-accordion.open .luna-btn { background: #e0f2fe; }
.luna-dot {
    width: 8px; height: 8px;
    border-radius: 50%;
    background: #bae6fd;
    flex-shrink: 0;
    transition: background 0.15s;
}
.luna-accordion.open .luna-dot { background: #0369a1; }
.luna-label {
    flex: 1;
    font-size: 0.84rem;
    font-weight: 700;
    color: #374151;
    transition: color 0.15s;
}
.luna-accordion.open .luna-label { color: #0369a1; }
.luna-count {
    font-size: 0.72rem;
    font-weight: 600;
    color: #94a3b8;
    background: #f1f5f9;
    padding: 0.15rem 0.55rem;
    border-radius: 10px;
    flex-shrink: 0;
    transition: background 0.15s, color 0.15s;
}
.luna-accordion.open .luna-count { background: #bae6fd; color: #0369a1; }
.luna-chevron {
    font-size: 0.65rem;
    color: #94a3b8;
    transition: transform 0.22s, color 0.15s;
    flex-shrink: 0;
}
.luna-accordion.open .luna-chevron { transform: rotate(180deg); color: #0369a1; }
.luna-body {
    display: none;
    padding: 0.75rem 1rem 1rem;
    border-top: 1px solid #e2e8f0;
    background: #fafcff;
    animation: fadeIn 0.15s ease;
}

/* ── Mobile ── */
@media (max-width: 575px) {
    .year-btn { padding: 0.85rem 1rem; gap: 0.75rem; }
    .year-badge { font-size: 0.9rem; padding: 0.25rem 0.85rem; }
    .year-body { padding: 1rem; }
    .luna-block { padding-left: 0.65rem; }
}
</style>
@endpush

@section('content')
<section style="padding:1.5rem 0 3rem;">
    <div class="container">
        <div class="row g-3 g-lg-5">

            {{-- ══════════════════════════════
                 CONȚINUT PRINCIPAL
            ══════════════════════════════ --}}
            <div class="col-lg-8 order-1">

                {{-- INTRO --}}
                <div class="card p-3 p-md-4 mb-4">
                    <h2 style="font-family:'Merriweather',serif;font-size:1.3rem;color:var(--aqua-dark);margin-bottom:1rem;">
                        <i class="bi bi-shield-check me-2" style="color:#0369a1;"></i>
                        Apa potabilă distribuită de AQUASERV S.A.
                    </h2>
                    <p style="line-height:1.9;color:#444;">
                        AQUASERV S.A. Tulcea asigură furnizarea apei potabile care respectă în totalitate
                        parametrii de calitate prevăzuți de <strong>Ordonanța nr. 7/2023</strong> și <strong>HG nr. 971/2023</strong> privind calitatea apei potabile.
                    </p>
                    <p style="line-height:1.9;color:#444;">
                        Laboratorul propriu efectuează analize periodice ale apei distribuite, iar rezultatele
                        sunt puse la dispoziția publicului prin buletinele de analiză de mai jos.
                    </p>
                </div>

                {{-- BULETINE CU DROPDOWN PE AN --}}
                <div class="card p-3 p-md-4">
                    <h3 style="font-family:'Merriweather',serif;font-size:1.2rem;color:var(--aqua-dark);margin-bottom:1.5rem;padding-bottom:0.75rem;border-bottom:2px solid var(--aqua-border);">
                        <i class="bi bi-file-earmark-medical me-2" style="color:#0369a1;"></i>
                        Buletine de analiză apă potabilă
                    </h3>

                    @if($buletine && $buletine->count() > 0)

                        @php $anulCurent = date('Y'); @endphp

                        @foreach($buletine as $an => $luniAn)
                        @php
                            $totalBuletine = collect($luniAn)->flatten()->count();
                            $nrLuni = count($luniAn);
                            $esteActiv = ((string)$an === (string)$anulCurent);
                        @endphp

                        <div class="year-accordion {{ $esteActiv ? 'open' : '' }}"
                             id="year-{{ $an }}">

                            <button class="year-btn"
                                    data-an="{{ $an }}"
                                    aria-expanded="{{ $esteActiv ? 'true' : 'false' }}">
                                <span class="year-badge">{{ $an }}</span>
                                <span class="year-meta">
                                    {{ $nrLuni }} {{ $nrLuni == 1 ? 'lună' : 'luni' }}
                                    &nbsp;·&nbsp;
                                    {{ $totalBuletine }} {{ $totalBuletine == 1 ? 'buletin' : 'buletine' }}
                                </span>
                                <i class="bi bi-chevron-down year-chevron"></i>
                            </button>

                            <div class="year-body" style="{{ $esteActiv ? 'display:block;' : '' }}">
                                @php
                                    $lunaCurenta = date('F'); // en
                                    $luniRo = [
                                        'January'=>'Ianuarie','February'=>'Februarie','March'=>'Martie',
                                        'April'=>'Aprilie','May'=>'Mai','June'=>'Iunie',
                                        'July'=>'Iulie','August'=>'August','September'=>'Septembrie',
                                        'October'=>'Octombrie','November'=>'Noiembrie','December'=>'Decembrie',
                                    ];
                                    $lunaRoCurenta = $luniRo[$lunaCurenta] ?? $lunaCurenta;
                                @endphp

                                @foreach($luniAn as $luna => $fisiereLuna)
                                @php
                                    $lunaActiva = $esteActiv && (strtolower(trim($luna)) === strtolower(trim($lunaRoCurenta)));
                                    $lunaId = 'luna-' . $an . '-' . Str::slug($luna);
                                    $nrBuletine = count($fisiereLuna);
                                @endphp

                                <div class="luna-accordion {{ $lunaActiva ? 'open' : '' }}"
                                     id="{{ $lunaId }}">

                                    <button class="luna-btn"
                                            data-luna="{{ $lunaId }}"
                                            aria-expanded="{{ $lunaActiva ? 'true' : 'false' }}">
                                        <span class="luna-dot"></span>
                                        <span class="luna-label">
                                            <i class="bi bi-calendar2-week me-1"></i>{{ $luna }}
                                        </span>
                                        <span class="luna-count">{{ $nrBuletine }} {{ $nrBuletine == 1 ? 'fișier' : 'fișiere' }}</span>
                                        <i class="bi bi-chevron-down luna-chevron"></i>
                                    </button>

                                    <div class="luna-body" style="{{ $lunaActiva ? 'display:block;' : '' }}">
                                        <div class="row g-2">
                                            @foreach($fisiereLuna as $buletin)
                                            <div class="col-6 col-sm-4">
                                                <a href="{{ $buletin->url }}" target="_blank" class="buletin-card">
                                                    <i class="bi bi-file-earmark-pdf"></i>
                                                    <div class="buletin-name">{{ $buletin->nume_original }}</div>
                                                    <div class="buletin-size">{{ $buletin->marime_formatat }}</div>
                                                </a>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                                @endforeach
                            </div>

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

            {{-- ══════════════════════════════
                 SIDEBAR
            ══════════════════════════════ --}}
            <div class="col-lg-4 order-2">

                {{-- MOBIL: 2 carduri side by side --}}
                <div class="row g-2 d-lg-none mb-3">
                    <div class="col-6">
                        <div class="card h-100 p-3" style="background:#f0f9ff;border-color:#bae6fd;">
                            <div style="font-weight:700;font-size:0.8rem;color:#0369a1;margin-bottom:0.5rem;">
                                <i class="bi bi-flask me-1"></i> Laborator
                            </div>
                            <div style="font-size:0.78rem;color:#0369a1;line-height:1.5;">
                                Lun–Vin<br>07:00–19:00<br>
                                <strong>0737 138 839</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card h-100 p-3" style="background:#fff5f5;border-color:#f8d7da;">
                            <div style="font-weight:700;font-size:0.8rem;color:#dc3545;margin-bottom:0.5rem;">
                                <i class="bi bi-telephone-fill me-1"></i> Avarii 24/7
                            </div>
                            <div style="font-size:1.15rem;font-weight:800;color:#dc3545;line-height:1.3;">
                                0747 022 009
                            </div>
                        </div>
                    </div>
                </div>


                {{-- DESKTOP sidebar --}}
                <div class="d-none d-lg-block">
                    <div class="card mb-4 p-3" style="background:#f0f9ff;border-color:#bae6fd;">
                        <h6 class="fw-bold mb-3" style="color:#0369a1;">
                            <i class="bi bi-telephone-fill me-2"></i>Contact Laborator
                        </h6>
                        <p style="font-size:0.875rem;color:#0369a1;margin-bottom:0.5rem;">
                            <strong>Program:</strong> Luni – Vineri, 07:00 – 19:00
                        </p>
                        <p style="font-size:0.875rem;color:#0369a1;margin-bottom:0;">
                            <strong>Telefon:</strong> 0737 138 839
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
                                Ordonanța nr. 7/2023 privind calitatea apei potabile
                            </li>
                            <li>
                                <i class="bi bi-file-text me-1" style="color:#0369a1;"></i>
                                HG nr. 971/2023 privind calitatea apei potabile
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script nonce="@nonce">
function toggleYear(an) {
    const acc  = document.getElementById('year-' + an);
    const body = acc.querySelector('.year-body');
    const btn  = acc.querySelector('.year-btn');
    const isOpen = acc.classList.contains('open');

    // Închide toate anurile
    document.querySelectorAll('.year-accordion').forEach(el => {
        el.classList.remove('open');
        el.querySelector('.year-body').style.display = 'none';
        el.querySelector('.year-btn').setAttribute('aria-expanded', 'false');
    });

    // Dacă era închis, deschide-l
    if (!isOpen) {
        acc.classList.add('open');
        body.style.display = 'block';
        btn.setAttribute('aria-expanded', 'true');
    }
}

function toggleLuna(id) {
    const acc  = document.getElementById(id);
    const body = acc.querySelector('.luna-body');
    const btn  = acc.querySelector('.luna-btn');
    const isOpen = acc.classList.contains('open');

    // Găsim anul părinte și închidem toate lunile din el
    const yearBody = acc.closest('.year-body');
    yearBody.querySelectorAll('.luna-accordion').forEach(el => {
        el.classList.remove('open');
        el.querySelector('.luna-body').style.display = 'none';
        el.querySelector('.luna-btn').setAttribute('aria-expanded', 'false');
    });

    // Dacă era închisă, deschide luna
    if (!isOpen) {
        acc.classList.add('open');
        body.style.display = 'block';
        btn.setAttribute('aria-expanded', 'true');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.year-btn[data-an]').forEach(function(btn) {
        btn.addEventListener('click', function() { toggleYear(this.dataset.an); });
    });
    document.querySelectorAll('.luna-btn[data-luna]').forEach(function(btn) {
        btn.addEventListener('click', function() { toggleLuna(this.dataset.luna); });
    });
    document.querySelectorAll('.legislatie-toggle').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var panel = this.nextElementSibling;
            panel.style.display = panel.style.display === 'none' ? 'block' : 'none';
        });
    });
});
</script>
@endpush