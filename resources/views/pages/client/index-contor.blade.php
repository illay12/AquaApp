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
<section style="padding:3rem 0 4rem;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">

                {{-- SUCCESS --}}
                @if(session('success'))
                <div class="d-flex align-items-start gap-3 p-4 mb-4"
                     style="background:#dcfce7;border:1px solid #86efac;border-radius:14px;border-left:5px solid #16a34a;">
                    <i class="bi bi-check-circle-fill mt-1" style="font-size:1.5rem;color:#16a34a;flex-shrink:0;"></i>
                    <div>
                        <div style="font-weight:800;color:#15803d;font-size:1rem;">Index transmis cu succes!</div>
                        <div style="color:#166534;font-size:0.875rem;margin-top:0.25rem;">{{ session('success') }}</div>
                    </div>
                </div>
                @endif

                {{-- INFO --}}
                <div class="d-flex align-items-start gap-2 p-3 mb-4"
                     style="background:#f0f9ff;border:1px solid #bae6fd;border-radius:12px;">
                    <i class="bi bi-info-circle-fill mt-1" style="color:#0369a1;font-size:1.1rem;flex-shrink:0;"></i>
                    <p style="font-size:0.82rem;color:#0369a1;margin:0;line-height:1.6;">
                        Transmiterea indexului se face în perioada <strong>1–10 a fiecărei luni</strong>.
                        Codul de client se găsește pe factura de apă.
                    </p>
                </div>

                {{-- CARD PRINCIPAL --}}
                <div class="card" style="border-radius:16px;box-shadow:0 4px 24px rgba(0,119,182,0.10);overflow:hidden;">

                    {{-- ══ PAS 1 – Identificare ══ --}}
                    <div id="pas1" class="card-body p-4">

                        <div class="d-flex align-items-center gap-2 mb-4">
                            <div style="width:30px;height:30px;background:var(--aqua-primary);color:#fff;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:0.85rem;flex-shrink:0;">1</div>
                            <h5 class="mb-0 fw-bold" style="color:var(--aqua-dark);font-size:1rem;">Identificare client</h5>
                        </div>

                        {{-- Cod client --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold" style="font-size:0.82rem;">
                                Cod client <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" style="background:#f0f8ff;border-color:#caf0f8;">
                                    <i class="bi bi-person-badge" style="color:var(--aqua-primary);"></i>
                                </span>
                                <input type="text" id="inputCodClient"
                                       class="form-control"
                                       placeholder="ex: 123456"
                                       maxlength="20" autocomplete="off"
                                       inputmode="numeric"
                                       style="border-color:#caf0f8;">
                            </div>
                        </div>

                        {{-- Telefon --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold" style="font-size:0.82rem;">
                                Număr de telefon <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" style="background:#f0f8ff;border-color:#caf0f8;">
                                    <i class="bi bi-telephone" style="color:var(--aqua-primary);"></i>
                                </span>
                                <input type="tel" id="inputTelefon"
                                       class="form-control"
                                       placeholder="07xx xxx xxx"
                                       maxlength="15"
                                       inputmode="numeric"
                                       style="border-color:#caf0f8;">
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold" style="font-size:0.82rem;">
                                Adresă email <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" style="background:#f0f8ff;border-color:#caf0f8;">
                                    <i class="bi bi-envelope" style="color:var(--aqua-primary);"></i>
                                </span>
                                <input type="email" id="inputEmail"
                                       class="form-control"
                                       placeholder="exemplu@email.ro"
                                       style="border-color:#caf0f8;">
                            </div>
                        </div>

                        {{-- Eroare --}}
                        <div id="eroareIdentificare"
                             style="display:none;background:#fee2e2;border:1px solid #fca5a5;border-radius:8px;padding:0.6rem 1rem;font-size:0.82rem;color:#dc2626;margin-bottom:1rem;">
                            <i class="bi bi-exclamation-triangle-fill me-1"></i>
                            <span id="textEroare"></span>
                        </div>

                        <button id="btnIdentifica" onclick="identificaClient()"
                                class="btn btn-aqua w-100"
                                style="padding:0.75rem;font-size:0.95rem;font-weight:700;border-radius:10px;">
                            <span id="btnText"><i class="bi bi-search me-2"></i>Verifică datele</span>
                            <span id="btnSpinner" style="display:none;">
                                <span class="spinner-border spinner-border-sm me-2"></span>Se verifică...
                            </span>
                        </button>

                    </div>

                    {{-- ══ PAS 2 – Selectare contor ══ --}}
                    <div id="pas2" style="display:none;">
                        <div style="height:1px;background:#e2e8f0;"></div>
                        <div class="card-body p-4">

                            <div class="d-flex align-items-center gap-2 mb-3">
                                <div style="width:30px;height:30px;background:var(--aqua-primary);color:#fff;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:0.85rem;flex-shrink:0;">2</div>
                                <h5 class="mb-0 fw-bold" style="color:var(--aqua-dark);font-size:1rem;">Selectare contor</h5>
                            </div>

                            {{-- Confirmare client --}}
                            <div class="d-flex align-items-center gap-2 p-3 mb-4"
                                 style="background:#dcfce7;border:1px solid #86efac;border-radius:10px;">
                                <i class="bi bi-person-check-fill" style="color:#16a34a;font-size:1.2rem;flex-shrink:0;"></i>
                                <div>
                                    <div style="font-size:0.72rem;color:#15803d;text-transform:uppercase;letter-spacing:0.05em;font-weight:700;">Client identificat</div>
                                    <div style="font-weight:800;color:#14532d;font-size:0.95rem;" id="numeClientCenzurat"></div>
                                </div>
                            </div>

                            <p style="font-size:0.82rem;color:#6c757d;margin-bottom:1rem;">
                                Selectați contorul pentru care transmiteți indexul:
                            </p>

                            <div id="listaContoare" class="d-flex flex-column gap-2"></div>

                        </div>
                    </div>

                    {{-- ══ PAS 3 – Index nou ══ --}}
                    <div id="pas3" style="display:none;">
                        <div style="height:1px;background:#e2e8f0;"></div>
                        <div class="card-body p-4">

                            <div class="d-flex align-items-center gap-2 mb-4">
                                <div style="width:30px;height:30px;background:var(--aqua-primary);color:#fff;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:0.85rem;flex-shrink:0;">3</div>
                                <h5 class="mb-0 fw-bold" style="color:var(--aqua-dark);font-size:1rem;">Introducere index</h5>
                            </div>

                            <form method="POST" action="{{ route('client.index-contor.post') }}" id="formIndex">
                                @csrf
                                <input type="hidden" name="cod_client" id="hiddenCodClient">
                                <input type="hidden" name="telefon"    id="hiddenTelefon">
                                <input type="hidden" name="email"      id="hiddenEmail">
                                <input type="hidden" name="contor_id"  id="hiddenContorId">

                                {{-- Rezumat contor --}}
                                <div id="rezumatContor" class="p-3 mb-4"
                                     style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;font-size:0.82rem;">
                                </div>

                                {{-- Index nou --}}
                                <div class="mb-4">
                                    <label class="form-label fw-bold" style="font-size:0.82rem;">
                                        Index nou <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background:#f0f8ff;border-color:#caf0f8;">
                                            <i class="bi bi-123" style="color:var(--aqua-primary);font-size:1.1rem;"></i>
                                        </span>
                                        <input type="number" name="index_nou" id="inputIndexNou"
                                               class="form-control form-control-lg @error('index_nou') is-invalid @enderror"
                                               placeholder="0" step="1" min="0"
                                               style="border-color:#caf0f8;font-weight:700;font-size:1.1rem;">
                                        <span class="input-group-text" style="background:#f0f8ff;border-color:#caf0f8;color:#6c757d;font-size:0.8rem;">m³</span>
                                    </div>
                                    @error('index_nou')
                                        <div class="text-danger mt-1" style="font-size:0.82rem;">{{ $message }}</div>
                                    @enderror
                                    <div id="consumEstimat" style="display:none;margin-top:0.5rem;font-size:0.82rem;color:#059669;">
                                        <i class="bi bi-graph-up me-1"></i> Consum estimat: <strong id="valConsum"></strong> m³
                                    </div>
                                </div>

                                {{-- Butoane --}}
                                <div class="d-flex gap-2">
                                    <button type="button" onclick="revinLaPas2()"
                                            class="btn btn-outline-secondary" style="border-radius:8px;">
                                        <i class="bi bi-arrow-left me-1"></i> Înapoi
                                    </button>
                                    <button type="submit" class="btn btn-aqua flex-fill"
                                            style="padding:0.75rem;font-size:0.95rem;font-weight:700;border-radius:10px;">
                                        <i class="bi bi-send-fill me-2"></i> Transmite indexul
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>

                {{-- INFO SUPLIMENTAR --}}
                <div class="row g-2 mt-3">
                    <div class="col-6">
                        <div class="p-3 d-flex align-items-center gap-2"
                             style="background:#fff;border:1px solid #e2e8f0;border-radius:10px;">
                            <i class="bi bi-calendar-check" style="color:var(--aqua-primary);font-size:1.1rem;flex-shrink:0;"></i>
                            <div>
                                <div style="font-weight:700;font-size:0.78rem;color:var(--aqua-dark);">Perioadă</div>
                                <div style="font-size:0.75rem;color:#6c757d;">1–10 ale lunii</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 d-flex align-items-center gap-2"
                             style="background:#fff;border:1px solid #e2e8f0;border-radius:10px;">
                            <i class="bi bi-telephone" style="color:var(--aqua-primary);font-size:1.1rem;flex-shrink:0;"></i>
                            <div>
                                <div style="font-weight:700;font-size:0.78rem;color:var(--aqua-dark);">Relații clienți</div>
                                <div style="font-size:0.75rem;color:#6c757d;">0240 511 111</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection


{{-- MODAL CONFIRMARE --}}
<div id="modalConfirmare" style="display:none;position:fixed;inset:0;z-index:9999;align-items:center;justify-content:center;">
    <div style="position:absolute;inset:0;background:rgba(0,0,0,0.5);backdrop-filter:blur(3px);" onclick="inchideModal()"></div>
    <div id="modalBox" style="position:relative;width:90%;max-width:420px;border-radius:16px;padding:2rem;background:#fff;box-shadow:0 20px 60px rgba(0,0,0,0.3);z-index:1;">
        <div id="modalIcon" style="width:56px;height:56px;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;font-size:1.6rem;"></div>
        <h5 id="modalTitlu" style="text-align:center;font-weight:800;margin-bottom:0.5rem;"></h5>
        <p id="modalMesaj" style="text-align:center;font-size:0.875rem;color:#6c757d;margin-bottom:1.5rem;line-height:1.6;"></p>
        <div id="modalButoane" class="d-flex gap-2"></div>
    </div>
</div>

@push('scripts')
<script>
let indexVechiSelectat = 0;
let formGataDeSubmit    = false;

function esteInPerioadaCitire() {
    const azi = new Date().getDate();
    return azi >= 10 && azi <= 30;
}

function aratModal(tip, titlu, mesaj, butoane) {
    const stiluri = {
        succes:  { border:'#16a34a', iconBg:'#16a34a', iconCls:'bi-check-lg',            titluColor:'#15803d' },
        atentie: { border:'#ca8a04', iconBg:'#ca8a04', iconCls:'bi-exclamation-triangle', titluColor:'#92400e' },
        eroare:  { border:'#dc2626', iconBg:'#dc2626', iconCls:'bi-x-lg',                titluColor:'#991b1b' },
    };
    const s = stiluri[tip] || stiluri.succes;
    document.getElementById('modalBox').style.border       = '2px solid ' + s.border;
    document.getElementById('modalIcon').style.background  = s.iconBg;
    document.getElementById('modalIcon').style.color       = '#fff';
    document.getElementById('modalIcon').innerHTML         = '<i class="bi ' + s.iconCls + '"></i>';
    document.getElementById('modalTitlu').style.color      = s.titluColor;
    document.getElementById('modalTitlu').textContent      = titlu;
    document.getElementById('modalMesaj').innerHTML        = mesaj;
    document.getElementById('modalButoane').innerHTML      = butoane;
    document.getElementById('modalConfirmare').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function inchideModal() {
    document.getElementById('modalConfirmare').style.display = 'none';
    document.body.style.overflow = '';
    formGataDeSubmit = false;
}

function confirmaTrimitera() {
    inchideModal();
    formGataDeSubmit = true;
    document.getElementById('formIndex').submit();
}

function cenzureazaCuvant(c) {
    if (c.length <= 2) return c;
    return c[0] + '*'.repeat(c.length - 2) + c[c.length - 1];
}
function cenzureazaNume(nume) {
    return nume.split(' ').filter(c => c.length > 0).map(cenzureazaCuvant).join(' ');
}

function aratEroare(mesaj) {
    document.getElementById('textEroare').textContent = mesaj;
    document.getElementById('eroareIdentificare').style.display = 'block';
}

async function identificaClient() {
    const codClient = document.getElementById('inputCodClient').value.trim();
    const telefon   = document.getElementById('inputTelefon').value.trim();
    const email     = document.getElementById('inputEmail').value.trim();

    document.getElementById('eroareIdentificare').style.display = 'none';

    if (!codClient) { aratEroare('Introduceți codul de client.'); return; }
    if (!telefon)   { aratEroare('Introduceți numărul de telefon.'); return; }
    // Validare format telefon romanesc: 07xx xxxxxx sau +407xx xxxxxx
    const telefonCurat = telefon.replace(/\s+/g, '');
    const telefonValid = /^(07[0-9]{8}|\+407[0-9]{8})$/.test(telefonCurat);
    if (!telefonValid) { aratEroare('Numărul de telefon nu este valid. Introduceți un număr de forma 07xx xxx xxx.'); return; }
    if (!email)     { aratEroare('Introduceți adresa de email.'); return; }
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) { aratEroare('Adresa de email nu este validă.'); return; }

    if (!esteInPerioadaCitire()) {
        aratModal('eroare',
            'Perioadă de citire închisă',
            'Transmiterea indexului este posibilă doar în perioada <strong>10–20 a fiecărei luni</strong>.<br><br>Vă rugăm reveniți în această perioadă sau contactați relații clienți la <strong>0240 511 111</strong>.',
            '<button onclick="inchideModal()" class="btn btn-outline-secondary w-100" style="border-radius:8px;">Închide</button>'
        );
        return;
    }

    document.getElementById('btnText').style.display    = 'none';
    document.getElementById('btnSpinner').style.display = 'inline';
    document.getElementById('btnIdentifica').disabled    = true;

    try {
        const params = new URLSearchParams({ cod_client: codClient, telefon: telefon, email: email });
        const resp = await fetch('{{ route("client.contoare") }}?' + params,
            { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
        const data = await resp.json();

        if (!data.found) { aratEroare(data.mesaj); return; }

        document.getElementById('numeClientCenzurat').textContent = cenzureazaNume(data.nume_client);
        afiseazaContoare(codClient, telefon, email, data.contoare);

    } catch (e) {
        aratEroare('Eroare de conexiune. Încercați din nou.');
    } finally {
        document.getElementById('btnText').style.display    = 'inline';
        document.getElementById('btnSpinner').style.display = 'none';
        document.getElementById('btnIdentifica').disabled    = false;
    }
}

function afiseazaContoare(codClient, telefon, email, contoare) {
    const lista = document.getElementById('listaContoare');
    lista.innerHTML = '';
    contoare.forEach(c => {
        const trimis    = c.index_nou !== null;
        const card      = document.createElement('div');

        if (trimis) {
            // Contor cu index deja trimis - verde, nu e clickabil
            card.style.cssText = 'padding:1rem 1.25rem;border:2px solid #86efac;border-radius:12px;background:#f0fdf4;';
            card.innerHTML =
                '<div style="display:flex;align-items:center;gap:0.75rem;">' +
                    '<div style="width:40px;height:40px;background:#dcfce7;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">' +
                        '<i class="bi bi-check-circle-fill" style="font-size:1.1rem;color:#16a34a;"></i>' +
                    '</div>' +
                    '<div style="flex:1;min-width:0;">' +
                        '<div style="font-weight:800;font-size:0.875rem;color:#15803d;">Serie: ' + c.serie_contor + '</div>' +
                        '<div style="font-size:0.78rem;color:#6c757d;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><i class="bi bi-geo-alt me-1"></i>' + c.adresa + '</div>' +
                    '</div>' +
                    '<div style="text-align:right;flex-shrink:0;">' +
                        '<div style="font-size:0.68rem;color:#16a34a;font-weight:700;text-transform:uppercase;margin-bottom:2px;">✓ Index trimis</div>' +
                        '<div style="display:flex;align-items:center;gap:0.75rem;justify-content:flex-end;">' +
                            '<div style="text-align:right;">' +
                                '<div style="font-size:0.65rem;color:#94a3b8;">Anterior</div>' +
                                '<div style="font-weight:700;font-size:0.85rem;color:#6c757d;">' + c.index_vechi + ' m³</div>' +
                            '</div>' +
                            '<div style="color:#94a3b8;">→</div>' +
                            '<div style="text-align:right;">' +
                                '<div style="font-size:0.65rem;color:#16a34a;">Nou</div>' +
                                '<div style="font-weight:800;font-size:0.95rem;color:#16a34a;">' + c.index_nou + ' m³</div>' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                '</div>';
        } else {
            // Contor normal - selectabil
            card.style.cssText = 'padding:1rem 1.25rem;border:2px solid #e2e8f0;border-radius:12px;cursor:pointer;transition:all 0.2s;';
            card.innerHTML =
                '<div style="display:flex;align-items:center;gap:0.75rem;">' +
                    '<div style="width:40px;height:40px;background:#f0f8ff;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">' +
                        '<i class="bi bi-speedometer2" style="font-size:1.1rem;color:var(--aqua-primary);"></i>' +
                    '</div>' +
                    '<div style="flex:1;min-width:0;">' +
                        '<div style="font-weight:800;font-size:0.875rem;color:var(--aqua-dark);">Serie: ' + c.serie_contor + '</div>' +
                        '<div style="font-size:0.78rem;color:#6c757d;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><i class="bi bi-geo-alt me-1"></i>' + c.adresa + '</div>' +
                    '</div>' +
                    '<div style="text-align:right;flex-shrink:0;">' +
                        '<div style="font-size:0.68rem;color:#94a3b8;text-transform:uppercase;">Index anterior</div>' +
                        '<div style="font-weight:800;font-size:0.95rem;color:var(--aqua-primary);">' + c.index_vechi + ' <span style="font-size:0.68rem;font-weight:400;">m³</span></div>' +
                    '</div>' +
                '</div>';
            card.addEventListener('click', () => selecteazaContor(card, codClient, telefon, email, c));
            card.addEventListener('mouseover', () => { if (!card.classList.contains('activ')) card.style.borderColor = '#90cdf4'; });
            card.addEventListener('mouseout',  () => { if (!card.classList.contains('activ')) card.style.borderColor = '#e2e8f0'; });
        }

        lista.appendChild(card);
    });
    document.getElementById('pas2').style.display = 'block';
    document.getElementById('pas2').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}

function selecteazaContor(card, codClient, telefon, email, c) {
    document.querySelectorAll('#listaContoare > div').forEach(el => {
        el.style.borderColor = '#e2e8f0';
        el.style.background  = '';
        el.classList.remove('activ');
    });
    card.style.borderColor = 'var(--aqua-primary)';
    card.style.background  = '#f0f9ff';
    card.classList.add('activ');

    indexVechiSelectat = parseFloat(c.index_vechi);

    document.getElementById('hiddenCodClient').value = codClient.toUpperCase();
    document.getElementById('hiddenTelefon').value   = telefon;
    document.getElementById('hiddenEmail').value     = email;
    document.getElementById('hiddenContorId').value  = c.id;

    document.getElementById('rezumatContor').innerHTML =
        '<div style="display:flex;flex-wrap:wrap;gap:1.25rem;">' +
            '<div><div style="font-size:0.68rem;color:#94a3b8;text-transform:uppercase;letter-spacing:0.05em;">Serie contor</div>' +
            '<div style="font-weight:700;color:var(--aqua-dark);">' + c.serie_contor + '</div></div>' +
            '<div style="flex:1;min-width:120px;"><div style="font-size:0.68rem;color:#94a3b8;text-transform:uppercase;letter-spacing:0.05em;">Adresă</div>' +
            '<div style="font-weight:700;color:var(--aqua-dark);">' + c.adresa + '</div></div>' +
            '<div><div style="font-size:0.68rem;color:#94a3b8;text-transform:uppercase;letter-spacing:0.05em;">Index anterior</div>' +
            '<div style="font-weight:700;color:var(--aqua-primary);">' + c.index_vechi + ' m³</div></div>' +
        '</div>';

    document.getElementById('consumEstimat').style.display = 'none';
    document.getElementById('inputIndexNou').value = '';
    document.getElementById('pas3').style.display = 'block';
    document.getElementById('pas3').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    document.getElementById('inputIndexNou').focus();
}

document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('inputIndexNou').addEventListener('input', function () {
        const val = parseFloat(this.value);
        const div = document.getElementById('consumEstimat');
        if (!isNaN(val) && val >= indexVechiSelectat && indexVechiSelectat > 0) {
            document.getElementById('valConsum').textContent = (val - indexVechiSelectat);
            div.style.display = 'block';
        } else {
            div.style.display = 'none';
        }
    });

    // Doar cifre in cod client si telefon
    ['inputCodClient','inputTelefon'].forEach(id => {
        const el = document.getElementById(id);
        el.addEventListener('keydown', e => {
            if (e.key === 'Enter') { identificaClient(); return; }
            const permise = ['Backspace','Delete','ArrowLeft','ArrowRight','Tab','Home','End'];
            if (!permise.includes(e.key) && !/^\d$/.test(e.key)) e.preventDefault();
        });
        el.addEventListener('paste', e => {
            e.preventDefault();
            const text = (e.clipboardData || window.clipboardData).getData('text');
            const numaiCifre = text.replace(/\D/g, '');
            document.execCommand('insertText', false, numaiCifre);
        });
    });

    document.getElementById('inputEmail').addEventListener('keydown', e => {
        if (e.key === 'Enter') identificaClient();
    });

    document.getElementById('formIndex').addEventListener('submit', function(e) {
        if (formGataDeSubmit) return;
        e.preventDefault();

        const indexNou = parseFloat(document.getElementById('inputIndexNou').value);

        if (isNaN(indexNou) || document.getElementById('inputIndexNou').value === '') {
            aratModal('eroare', 'Index lipsă', 'Introduceți indexul nou al contorului.',
                '<button onclick="inchideModal()" class="btn w-100" style="background:#dc2626;color:#fff;border-radius:8px;">Înțeles</button>');
            return;
        }

        if (indexNou < indexVechiSelectat) {
            aratModal('eroare', 'Index invalid',
                'Indexul introdus (<strong>' + indexNou + ' m³</strong>) este mai mic decât indexul anterior (<strong>' + indexVechiSelectat + ' m³</strong>).<br><br>Verificați cifrele de pe afișajul contorului.',
                '<button onclick="inchideModal()" class="btn w-100" style="background:#dc2626;color:#fff;border-radius:8px;">Corectează indexul</button>');
            return;
        }

        const diferenta = indexNou - indexVechiSelectat;

        if (diferenta > 50) {
            aratModal('atentie', 'Consum neobișnuit de mare',
                'Indexul introdus (<strong>' + indexNou + ' m³</strong>) depășește indexul anterior cu <strong>' + diferenta + ' m³</strong>.<br><br>Dacă ați verificat cifrele și sunt corecte, confirmați trimiterea.',
                '<button onclick="inchideModal()" class="btn btn-outline-secondary flex-fill" style="border-radius:8px;">Corectează</button>' +
                '<button onclick="confirmaTrimitera()" class="btn flex-fill" style="background:#ca8a04;color:#fff;border-radius:8px;margin-left:0.5rem;">Confirm, trimite</button>');
            return;
        }

        aratModal('succes', 'Confirmare transmitere index',
            'Doriți să transmiteți indexul <strong>' + indexNou + ' m³</strong> pentru contorul selectat?<br><span style="font-size:0.8rem;color:#6c757d;">Consum estimat: ' + diferenta + ' m³</span>',
            '<button onclick="inchideModal()" class="btn btn-outline-secondary flex-fill" style="border-radius:8px;">Anulează</button>' +
            '<button onclick="confirmaTrimitera()" class="btn btn-aqua flex-fill" style="border-radius:8px;margin-left:0.5rem;">Confirmă</button>');
    });
});

function revinLaPas2() {
    document.getElementById('pas3').style.display = 'none';
    document.getElementById('pas2').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
</script>
@endpush