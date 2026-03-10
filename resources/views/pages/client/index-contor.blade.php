@extends('layouts.app')

@section('title', 'Transmite Index Contor')

@section('page_hero')
    <h1><i class="bi bi-speedometer2 me-2"></i> Transmitere Index Contor</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item active">Index Contor</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:2rem 0 4rem;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">

                {{-- INFO --}}
                <div class="d-flex align-items-start gap-2 p-3 mb-3"
                     style="background:#f0f9ff;border:1px solid #bae6fd;border-radius:12px;">
                    <i class="bi bi-info-circle-fill mt-1" style="color:#0369a1;font-size:1rem;flex-shrink:0;"></i>
                    <p style="font-size:0.82rem;color:#0369a1;margin:0;line-height:1.6;">
                        Transmiterea indexului se face în perioada <strong>10–20 a fiecărei luni</strong>.
                        Codul de client se găsește pe factura de apă.
                    </p>
                </div>

                {{-- BANNER SUCCESS AJAX --}}
                <div id="bannerSuccess" style="display:none;"></div>

                {{-- CARD PRINCIPAL --}}
                <div class="card" style="border-radius:16px;box-shadow:0 4px 24px rgba(0,119,182,0.10);overflow:hidden;">

                    {{-- ══ PAS 1 ══ --}}
                    <div id="pas1" class="card-body p-3 p-md-4">

                        <div class="d-flex align-items-center gap-2 mb-3">
                            <div style="width:28px;height:28px;min-width:28px;background:var(--aqua-primary);color:#fff;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:0.8rem;">1</div>
                            <h5 class="mb-0 fw-bold" style="color:var(--aqua-dark);font-size:0.95rem;">Identificare client</h5>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold mb-1" style="font-size:0.82rem;">Cod client <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text" style="background:#f0f8ff;border-color:#caf0f8;">
                                    <i class="bi bi-person-badge" style="color:var(--aqua-primary);"></i>
                                </span>
                                <input type="text" id="inputCodClient" class="form-control form-control-lg"
                                       placeholder="ex: 123456" maxlength="20" autocomplete="off"
                                       inputmode="numeric" style="border-color:#caf0f8;font-size:1rem;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold mb-1" style="font-size:0.82rem;">Număr de telefon <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text" style="background:#f0f8ff;border-color:#caf0f8;">
                                    <i class="bi bi-telephone" style="color:var(--aqua-primary);"></i>
                                </span>
                                <input type="tel" id="inputTelefon" class="form-control form-control-lg"
                                       placeholder="07xx xxx xxx" maxlength="15"
                                       inputmode="numeric" style="border-color:#caf0f8;font-size:1rem;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold mb-1" style="font-size:0.82rem;">Adresă email <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text" style="background:#f0f8ff;border-color:#caf0f8;">
                                    <i class="bi bi-envelope" style="color:var(--aqua-primary);"></i>
                                </span>
                                <input type="email" id="inputEmail" class="form-control form-control-lg"
                                       placeholder="exemplu@email.ro" inputmode="email"
                                       style="border-color:#caf0f8;font-size:1rem;">
                            </div>
                        </div>

                        <div id="eroareIdentificare" style="display:none;background:#fee2e2;border:1px solid #fca5a5;border-radius:8px;padding:0.7rem 1rem;font-size:0.85rem;color:#dc2626;margin-bottom:1rem;">
                            <i class="bi bi-exclamation-triangle-fill me-1"></i><span id="textEroare"></span>
                        </div>

                        <button id="btnIdentifica" onclick="identificaClient()" class="btn btn-aqua w-100"
                                style="padding:0.875rem;font-size:1rem;font-weight:700;border-radius:10px;min-height:52px;">
                            <span id="btnText"><i class="bi bi-search me-2"></i>Verifică datele</span>
                            <span id="btnSpinner" style="display:none;"><span class="spinner-border spinner-border-sm me-2"></span>Se verifică...</span>
                        </button>

                    </div>

                    {{-- ══ PAS 2 ══ --}}
                    <div id="pas2" style="display:none;">
                        <div style="height:1px;background:#e2e8f0;"></div>
                        <div class="card-body p-3 p-md-4">

                            <div class="d-flex align-items-center gap-2 mb-3">
                                <div style="width:28px;height:28px;min-width:28px;background:var(--aqua-primary);color:#fff;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:0.8rem;">2</div>
                                <h5 class="mb-0 fw-bold" style="color:var(--aqua-dark);font-size:0.95rem;">Selectare contor</h5>
                            </div>

                            <div class="d-flex align-items-center gap-2 p-3 mb-3"
                                 style="background:#dcfce7;border:1px solid #86efac;border-radius:10px;">
                                <i class="bi bi-person-check-fill" style="color:#16a34a;font-size:1.2rem;flex-shrink:0;"></i>
                                <div>
                                    <div style="font-size:0.7rem;color:#15803d;text-transform:uppercase;letter-spacing:0.05em;font-weight:700;">Client identificat</div>
                                    <div style="font-weight:800;color:#14532d;font-size:0.95rem;" id="numeClientCenzurat"></div>
                                </div>
                            </div>

                            <p style="font-size:0.82rem;color:#6c757d;margin-bottom:0.75rem;">Selectați contorul:</p>
                            <div id="listaContoare" class="d-flex flex-column gap-2"></div>

                        </div>
                    </div>

                    {{-- ══ PAS 3 ══ --}}
                    <div id="pas3" style="display:none;">
                        <div style="height:1px;background:#e2e8f0;"></div>
                        <div class="card-body p-3 p-md-4">

                            <div class="d-flex align-items-center gap-2 mb-3">
                                <div style="width:28px;height:28px;min-width:28px;background:var(--aqua-primary);color:#fff;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:0.8rem;">3</div>
                                <h5 class="mb-0 fw-bold" style="color:var(--aqua-dark);font-size:0.95rem;">Introducere index</h5>
                            </div>

                            <div id="rezumatContor" class="p-3 mb-3"
                                 style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;font-size:0.82rem;"></div>

                            <div class="mb-3">
                                <label class="form-label fw-bold mb-1" style="font-size:0.82rem;">Index nou <span class="text-danger">*</span></label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text" style="background:#f0f8ff;border-color:#caf0f8;">
                                        <i class="bi bi-123" style="color:var(--aqua-primary);font-size:1.2rem;"></i>
                                    </span>
                                    <input type="number" id="inputIndexNou" class="form-control"
                                           placeholder="" step="1" min="0" inputmode="numeric"
                                           style="border-color:#caf0f8;font-weight:800;font-size:1.75rem;text-align:center;">
                                    <span class="input-group-text" style="background:#f0f8ff;border-color:#caf0f8;color:#6c757d;font-weight:700;font-size:0.9rem;">m³</span>
                                </div>
                                <div id="consumEstimat" style="display:none;margin-top:0.5rem;font-size:0.85rem;color:#059669;text-align:center;font-weight:600;">
                                    <i class="bi bi-graph-up me-1"></i>Consum estimat: <strong id="valConsum"></strong> m³
                                </div>
                            </div>

                            <div id="eroareIndex" style="display:none;background:#fee2e2;border:1px solid #fca5a5;border-radius:8px;padding:0.7rem 1rem;font-size:0.85rem;color:#dc2626;margin-bottom:1rem;">
                                <i class="bi bi-exclamation-triangle-fill me-1"></i><span id="textEroareIndex"></span>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="button" onclick="revinLaPas2()" class="btn btn-outline-secondary"
                                        style="border-radius:10px;padding:0.75rem 1.1rem;font-size:1rem;">
                                    <i class="bi bi-arrow-left"></i>
                                </button>
                                <button id="btnTrimite" onclick="validezSiConfirm()" class="btn btn-aqua flex-fill"
                                        style="padding:0.875rem;font-size:1rem;font-weight:700;border-radius:10px;min-height:52px;">
                                    <span id="btnTrimiteText"><i class="bi bi-send-fill me-2"></i>Transmite indexul</span>
                                    <span id="btnTrimiteSpinner" style="display:none;"><span class="spinner-border spinner-border-sm me-2"></span>Se trimite...</span>
                                </button>
                            </div>

                        </div>
                    </div>

                </div>

                {{-- INFO CARDS --}}
                <div class="row g-2 mt-3">
                    <div class="col-6">
                        <div class="p-3 d-flex align-items-center gap-2"
                             style="background:#fff;border:1px solid #e2e8f0;border-radius:10px;">
                            <i class="bi bi-calendar-check" style="color:var(--aqua-primary);font-size:1.1rem;flex-shrink:0;"></i>
                            <div>
                                <div style="font-weight:700;font-size:0.75rem;color:var(--aqua-dark);">Perioadă</div>
                                <div style="font-size:0.72rem;color:#6c757d;">10–20 ale lunii</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 d-flex align-items-center gap-2"
                             style="background:#fff;border:1px solid #e2e8f0;border-radius:10px;">
                            <i class="bi bi-telephone" style="color:var(--aqua-primary);font-size:1.1rem;flex-shrink:0;"></i>
                            <div>
                                <div style="font-weight:700;font-size:0.75rem;color:var(--aqua-dark);">Relații clienți</div>
                                <div style="font-size:0.72rem;color:#6c757d;">0240 511 111</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- MODAL --}}
<div id="modalConfirmare" style="display:none;position:fixed;inset:0;z-index:9999;align-items:center;justify-content:center;padding:1rem;">
    <div style="position:absolute;inset:0;background:rgba(0,0,0,0.5);backdrop-filter:blur(3px);" onclick="inchideModal()"></div>
    <div id="modalBox" style="position:relative;width:100%;max-width:400px;border-radius:16px;padding:1.75rem;background:#fff;box-shadow:0 20px 60px rgba(0,0,0,0.3);z-index:1;">
        <div id="modalIcon" style="width:52px;height:52px;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 0.875rem;font-size:1.5rem;"></div>
        <h5 id="modalTitlu" style="text-align:center;font-weight:800;margin-bottom:0.4rem;font-size:1rem;"></h5>
        <div id="modalMesaj" style="text-align:center;font-size:0.85rem;color:#6c757d;margin-bottom:1.25rem;line-height:1.6;"></div>
        <div id="modalButoane" class="d-flex gap-2"></div>
    </div>
</div>

@endsection

@push('scripts')
<script>
let indexVechiSelectat = 0;
let dateCurente = { codClient:'', telefon:'', email:'', contorId:null, serieContor:'', indexNouExistent:null };

function esteInPerioadaCitire() {
    const azi = new Date().getDate();
    return azi >= 0 && azi <= 30;
}

// ── Modal ──────────────────────────────────────────────────────────────────
function aratModal(tip, titlu, mesaj, butoane) {
    const stiluri = {
        succes:  { border:'#16a34a', bg:'#16a34a', icon:'bi-check-lg',            color:'#15803d' },
        atentie: { border:'#ca8a04', bg:'#ca8a04', icon:'bi-exclamation-triangle', color:'#92400e' },
        eroare:  { border:'#dc2626', bg:'#dc2626', icon:'bi-x-lg',                color:'#991b1b' },
    };
    const s = stiluri[tip];
    document.getElementById('modalBox').style.border      = '2px solid ' + s.border;
    document.getElementById('modalIcon').style.background = s.bg;
    document.getElementById('modalIcon').style.color      = '#fff';
    document.getElementById('modalIcon').innerHTML        = '<i class="bi ' + s.icon + '"></i>';
    document.getElementById('modalTitlu').style.color     = s.color;
    document.getElementById('modalTitlu').textContent     = titlu;
    document.getElementById('modalMesaj').innerHTML       = mesaj;
    document.getElementById('modalButoane').innerHTML     = butoane;
    document.getElementById('modalConfirmare').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function inchideModal() {
    document.getElementById('modalConfirmare').style.display = 'none';
    document.body.style.overflow = '';
}

// ── Helpers ────────────────────────────────────────────────────────────────
function cenzureazaNume(nume) {
    return nume.split(' ').filter(c => c.length > 0).map(c =>
        c.length <= 2 ? c : c[0] + '*'.repeat(c.length - 2) + c[c.length - 1]
    ).join(' ');
}

function aratEroare(mesaj) {
    document.getElementById('textEroare').textContent = mesaj;
    document.getElementById('eroareIdentificare').style.display = 'block';
}

// ── PAS 1 – Identificare ───────────────────────────────────────────────────
async function identificaClient() {
    const codClient = document.getElementById('inputCodClient').value.trim();
    const telefon   = document.getElementById('inputTelefon').value.trim();
    const email     = document.getElementById('inputEmail').value.trim();

    document.getElementById('eroareIdentificare').style.display = 'none';

    if (!codClient) { aratEroare('Introduceți codul de client.'); return; }
    if (!telefon)   { aratEroare('Introduceți numărul de telefon.'); return; }

    const tel = telefon.replace(/\s+/g, '');
    if (!/^(07[0-9]{8}|\+407[0-9]{8})$/.test(tel)) {
        aratEroare('Numărul de telefon nu este valid. Format acceptat: 07xx xxx xxx');
        return;
    }

    if (!email) { aratEroare('Introduceți adresa de email.'); return; }
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        aratEroare('Adresa de email nu este validă.');
        return;
    }

    if (!esteInPerioadaCitire()) {
        aratModal('eroare', 'Perioadă de citire închisă',
            'Transmiterea indexului este posibilă doar în perioada <strong>10–20 a fiecărei luni</strong>.<br><br>Pentru informații sunați la <strong>0240 511 111</strong>.',
            '<button onclick="inchideModal()" class="btn btn-outline-secondary w-100" style="border-radius:8px;padding:0.75rem;">Închide</button>');
        return;
    }

    document.getElementById('btnText').style.display    = 'none';
    document.getElementById('btnSpinner').style.display = 'inline';
    document.getElementById('btnIdentifica').disabled   = true;

    try {
        const resp = await fetch('{{ route("client.contoare") }}?' + new URLSearchParams({ cod_client: codClient, telefon, email }),
            { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
        const data = await resp.json();

        if (!data.found) { aratEroare(data.mesaj); return; }

        dateCurente.codClient = codClient.toUpperCase();
        dateCurente.telefon   = telefon;
        dateCurente.email     = email;

        document.getElementById('numeClientCenzurat').textContent = cenzureazaNume(data.nume_client);
        afiseazaContoare(data.contoare);

    } catch (e) {
        aratEroare('Eroare de conexiune. Încercați din nou.');
    } finally {
        document.getElementById('btnText').style.display    = 'inline';
        document.getElementById('btnSpinner').style.display = 'none';
        document.getElementById('btnIdentifica').disabled   = false;
    }
}

// ── PAS 2 – Afișare contoare ───────────────────────────────────────────────
function afiseazaContoare(contoare) {
    const lista = document.getElementById('listaContoare');
    lista.innerHTML = '';

    contoare.forEach(c => {
        const trimis = c.index_nou !== null;
        const card   = document.createElement('div');

        card.setAttribute('data-id',    c.id);
        card.setAttribute('data-serie',  c.serie_contor);
        card.setAttribute('data-adresa', c.adresa);
        card.setAttribute('data-vechi',  c.index_vechi);

        if (trimis) {
            card.style.cssText = 'padding:0.875rem 1rem;border:2px solid #86efac;border-radius:12px;background:#f0fdf4;cursor:pointer;transition:all 0.2s;';
            card.innerHTML = construiesteCardTrimis(c.serie_contor, c.adresa, c.index_vechi, c.index_nou);
            card.addEventListener('mouseover', () => { if (!card.classList.contains('activ')) card.style.borderColor = '#4ade80'; });
            card.addEventListener('mouseout',  () => { if (!card.classList.contains('activ')) card.style.borderColor = '#86efac'; });
        } else {
            card.style.cssText = 'padding:0.875rem 1rem;border:2px solid #e2e8f0;border-radius:12px;cursor:pointer;transition:all 0.2s;';
            card.innerHTML = construiesteCardNormal(c.serie_contor, c.adresa, c.index_vechi);
            card.addEventListener('mouseover', () => { if (!card.classList.contains('activ')) card.style.borderColor = '#90cdf4'; });
            card.addEventListener('mouseout',  () => { if (!card.classList.contains('activ')) card.style.borderColor = '#e2e8f0'; });
        }

        card.addEventListener('click', () => selecteazaContor(card, c));
        lista.appendChild(card);
    });

    document.getElementById('pas2').style.display = 'block';
    document.getElementById('pas2').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}

function construiesteCardNormal(serie, adresa, vechi) {
    return '<div style="display:flex;align-items:center;gap:0.75rem;">' +
        '<div style="width:38px;height:38px;min-width:38px;background:#f0f8ff;border-radius:10px;display:flex;align-items:center;justify-content:center;">' +
            '<i class="bi bi-speedometer2" style="font-size:1.1rem;color:var(--aqua-primary);"></i></div>' +
        '<div style="flex:1;min-width:0;">' +
            '<div style="font-weight:800;font-size:0.875rem;color:var(--aqua-dark);">' + serie + '</div>' +
            '<div style="font-size:0.75rem;color:#6c757d;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"><i class="bi bi-geo-alt me-1"></i>' + adresa + '</div>' +
        '</div>' +
        '<div style="text-align:right;flex-shrink:0;">' +
            '<div style="font-size:0.65rem;color:#94a3b8;text-transform:uppercase;">Index anterior</div>' +
            '<div style="font-weight:800;font-size:1rem;color:var(--aqua-primary);">' + vechi + ' <span style="font-size:0.65rem;font-weight:400;">m³</span></div>' +
        '</div></div>';
}

function construiesteCardTrimis(serie, adresa, vechi, nou) {
    return '<div style="display:flex;align-items:center;gap:0.75rem;">' +
        '<div style="width:38px;height:38px;min-width:38px;background:#dcfce7;border-radius:10px;display:flex;align-items:center;justify-content:center;">' +
            '<i class="bi bi-check-circle-fill" style="font-size:1.1rem;color:#16a34a;"></i></div>' +
        '<div style="flex:1;min-width:0;">' +
            '<div style="font-weight:800;font-size:0.875rem;color:#15803d;">' + serie + '</div>' +
            '<div style="font-size:0.75rem;color:#6c757d;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"><i class="bi bi-geo-alt me-1"></i>' + adresa + '</div>' +
            '<div style="font-size:0.7rem;color:#0077b6;margin-top:2px;"><i class="bi bi-arrow-repeat me-1"></i>Apasă pentru a retrimite</div>' +
        '</div>' +
        '<div style="text-align:right;flex-shrink:0;">' +
            '<div style="font-size:0.65rem;color:#16a34a;font-weight:700;text-transform:uppercase;">✓ Trimis</div>' +
            '<div style="font-size:0.75rem;color:#6c757d;">' + vechi + ' → <strong style="color:#16a34a;">' + nou + '</strong> m³</div>' +
        '</div></div>';
}

// ── PAS 3 – Selectare contor ───────────────────────────────────────────────
function selecteazaContor(card, c) {
    document.querySelectorAll('#listaContoare > div').forEach(el => {
        el.classList.remove('activ');
        const eVerde = el.style.background.includes('f0fdf4');
        el.style.borderColor = eVerde ? '#86efac' : '#e2e8f0';
        el.style.background  = eVerde ? '#f0fdf4' : '';
    });

    card.style.borderColor = 'var(--aqua-primary)';
    card.style.background  = '#f0f9ff';
    card.classList.add('activ');

    indexVechiSelectat             = parseInt(c.index_vechi);
    dateCurente.contorId           = c.id;
    dateCurente.serieContor        = c.serie_contor;
    dateCurente.indexNouExistent   = c.index_nou;

    document.getElementById('rezumatContor').innerHTML =
        '<div style="display:flex;flex-wrap:wrap;gap:1rem;">' +
            '<div><div style="font-size:0.65rem;color:#94a3b8;text-transform:uppercase;letter-spacing:0.04em;">Serie</div>' +
            '<div style="font-weight:700;color:var(--aqua-dark);">' + c.serie_contor + '</div></div>' +
            '<div style="flex:1;min-width:90px;"><div style="font-size:0.65rem;color:#94a3b8;text-transform:uppercase;letter-spacing:0.04em;">Adresă</div>' +
            '<div style="font-weight:700;color:var(--aqua-dark);">' + c.adresa + '</div></div>' +
            '<div><div style="font-size:0.65rem;color:#94a3b8;text-transform:uppercase;letter-spacing:0.04em;">Index anterior</div>' +
            '<div style="font-weight:700;color:var(--aqua-primary);">' + c.index_vechi + ' m³</div></div>' +
        '</div>';

    document.getElementById('eroareIndex').style.display  = 'none';
    document.getElementById('consumEstimat').style.display = 'none';
    document.getElementById('inputIndexNou').value         = '';
    document.getElementById('pas3').style.display          = 'block';
    document.getElementById('pas3').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    setTimeout(() => document.getElementById('inputIndexNou').focus(), 400);
}

// ── Validare și confirmare ─────────────────────────────────────────────────
function validezSiConfirm() {
    const val      = document.getElementById('inputIndexNou').value.trim();
    const indexNou = parseInt(val);

    document.getElementById('eroareIndex').style.display = 'none';

    if (!val || isNaN(indexNou)) {
        document.getElementById('textEroareIndex').textContent = 'Introduceți indexul nou al contorului.';
        document.getElementById('eroareIndex').style.display = 'block';
        return;
    }

    if (indexNou < indexVechiSelectat) {
        aratModal('eroare', 'Index invalid',
            'Indexul introdus (<strong>' + indexNou + ' m³</strong>) este mai mic decât indexul anterior (<strong>' + indexVechiSelectat + ' m³</strong>).<br><br>Verificați cifrele de pe afișajul contorului.',
            '<button onclick="inchideModal()" class="btn w-100" style="background:#dc2626;color:#fff;border-radius:8px;padding:0.75rem;">Corectează indexul</button>');
        return;
    }

    const diferenta      = indexNou - indexVechiSelectat;
    const eRetrimitere   = dateCurente.indexNouExistent !== null && dateCurente.indexNouExistent !== undefined;
    const mesajRetrimite = eRetrimitere
        ? '<br><span style="font-size:0.78rem;color:#ca8a04;"><i class="bi bi-info-circle me-1"></i>Indexul anterior trimis (' + dateCurente.indexNouExistent + ' m³) va fi înlocuit.</span>'
        : '';

    if (diferenta > 50) {
        aratModal('atentie', 'Consum neobișnuit de mare',
            'Indexul introdus (<strong>' + indexNou + ' m³</strong>) depășește indexul anterior cu <strong>' + diferenta + ' m³</strong>.<br>Dacă cifrele sunt corecte, confirmați.' + mesajRetrimite,
            '<button onclick="inchideModal()" class="btn btn-outline-secondary flex-fill" style="border-radius:8px;padding:0.75rem;">Corectează</button>' +
            '<button onclick="trimiteAjax(' + indexNou + ')" class="btn flex-fill" style="background:#ca8a04;color:#fff;border-radius:8px;padding:0.75rem;margin-left:0.5rem;">Confirm, trimite</button>');
        return;
    }

    const titlu = eRetrimitere ? 'Confirmare retrimitere index' : 'Confirmare transmitere index';
    aratModal('succes', titlu,
        'Doriți să transmiteți indexul <strong>' + indexNou + ' m³</strong> pentru contorul <strong>' + dateCurente.serieContor + '</strong>?<br><span style="font-size:0.8rem;color:#6c757d;">Consum estimat: ' + diferenta + ' m³</span>' + mesajRetrimite,
        '<button onclick="inchideModal()" class="btn btn-outline-secondary flex-fill" style="border-radius:8px;padding:0.75rem;">Anulează</button>' +
        '<button onclick="trimiteAjax(' + indexNou + ')" class="btn btn-aqua flex-fill" style="border-radius:8px;padding:0.75rem;margin-left:0.5rem;">Confirmă</button>');
}

// ── AJAX Submit ────────────────────────────────────────────────────────────
async function trimiteAjax(indexNou) {
    inchideModal();

    document.getElementById('btnTrimiteText').style.display    = 'none';
    document.getElementById('btnTrimiteSpinner').style.display = 'inline';
    document.getElementById('btnTrimite').disabled             = true;

    try {
        const resp = await fetch('{{ route("client.index-contor.post") }}', {
            method: 'POST',
            headers: {
                'Content-Type':     'application/json',
                'X-CSRF-TOKEN':     '{{ csrf_token() }}',
                'X-Requested-With': 'XMLHttpRequest',
                'Accept':           'application/json',
            },
            body: JSON.stringify({
                cod_client: dateCurente.codClient,
                telefon:    dateCurente.telefon,
                email:      dateCurente.email,
                contor_id:  dateCurente.contorId,
                index_nou:  indexNou,
            }),
        });

        const data = await resp.json();

        if (data.success) {
            const banner = document.getElementById('bannerSuccess');
            banner.style.cssText = 'display:flex;align-items:start;gap:1rem;padding:1rem 1.25rem;margin-bottom:0.75rem;background:#dcfce7;border:1px solid #86efac;border-radius:14px;border-left:5px solid #16a34a;';
            banner.innerHTML =
                '<i class="bi bi-check-circle-fill" style="font-size:1.5rem;color:#16a34a;flex-shrink:0;margin-top:2px;"></i>' +
                '<div><div style="font-weight:800;color:#15803d;font-size:1rem;">Index transmis cu succes!</div>' +
                '<div style="color:#166534;font-size:0.875rem;margin-top:0.25rem;">' + data.mesaj + '</div></div>';
            banner.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

            const card = document.querySelector('[data-id="' + dateCurente.contorId + '"]');
            if (card) {
                const serie  = card.getAttribute('data-serie');
                const adresa = card.getAttribute('data-adresa');
                const vechi  = card.getAttribute('data-vechi');
                card.style.cssText = 'padding:0.875rem 1rem;border:2px solid #86efac;border-radius:12px;background:#f0fdf4;cursor:pointer;transition:all 0.2s;';
                card.innerHTML     = construiesteCardTrimis(serie, adresa, vechi, indexNou);
                card.classList.remove('activ');
            }

            dateCurente.indexNouExistent = indexNou;
            document.getElementById('pas3').style.display = 'none';

        } else {
            aratModal('eroare', 'Eroare',
                data.mesaj || 'A apărut o eroare. Încercați din nou.',
                '<button onclick="inchideModal()" class="btn w-100" style="background:#dc2626;color:#fff;border-radius:8px;padding:0.75rem;">Închide</button>');
        }

    } catch (e) {
        aratModal('eroare', 'Eroare de conexiune',
            'Nu s-a putut trimite indexul. Verificați conexiunea și încercați din nou.',
            '<button onclick="inchideModal()" class="btn w-100" style="background:#dc2626;color:#fff;border-radius:8px;padding:0.75rem;">Închide</button>');
    } finally {
        document.getElementById('btnTrimiteText').style.display    = 'inline';
        document.getElementById('btnTrimiteSpinner').style.display = 'none';
        document.getElementById('btnTrimite').disabled             = false;
    }
}

// ── Events ─────────────────────────────────────────────────────────────────
document.addEventListener('DOMContentLoaded', () => {
    // Scroll automat la formular
    const card = document.querySelector('.card');
    if (card) {
        setTimeout(() => {
            card.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }, 200);
    }

    document.getElementById('inputIndexNou').addEventListener('input', function () {
        const val = parseInt(this.value);
        const div = document.getElementById('consumEstimat');
        if (!isNaN(val) && val >= indexVechiSelectat) {
            document.getElementById('valConsum').textContent = val - indexVechiSelectat;
            div.style.display = 'block';
        } else {
            div.style.display = 'none';
        }
    });

    document.getElementById('inputIndexNou').addEventListener('keydown', e => {
        if (e.key === 'Enter') validezSiConfirm();
    });

    ['inputCodClient', 'inputTelefon'].forEach(id => {
        const el = document.getElementById(id);
        el.addEventListener('keydown', e => {
            if (e.key === 'Enter') { identificaClient(); return; }
            const permise = ['Backspace','Delete','ArrowLeft','ArrowRight','Tab','Home','End'];
            if (!permise.includes(e.key) && !/^\d$/.test(e.key)) e.preventDefault();
        });
        el.addEventListener('paste', e => {
            e.preventDefault();
            const text = (e.clipboardData || window.clipboardData).getData('text');
            document.execCommand('insertText', false, text.replace(/\D/g, ''));
        });
    });

    document.getElementById('inputEmail').addEventListener('keydown', e => {
        if (e.key === 'Enter') identificaClient();
    });
});

function revinLaPas2() {
    document.getElementById('pas3').style.display = 'none';
    document.getElementById('pas2').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
</script>
@endpush