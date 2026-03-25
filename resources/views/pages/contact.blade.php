@extends('layouts.app')

@section('title', 'Contact')

@section('page_hero')
    <h1><i class="bi bi-envelope me-2"></i>Contact</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item active">Contact</li>
        </ol>
    </nav>
@endsection

@push('styles')
<style>
/* ═══════════════════════════════════════════
   PAGE BASE
═══════════════════════════════════════════ */
.ct-page { background: #f7f9fc; padding: 3rem 0 5rem; }
@media(max-width:767px) { .ct-page { padding: 1.5rem 0 3rem; } }

/* ═══════════════════════════════════════════
   TOP STRIP — numerele de telefon rapide
═══════════════════════════════════════════ */
.ct-strip {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    border: 1px solid #e4e9f0;
    border-radius: 14px;
    background: #fff;
    overflow: hidden;
    margin-bottom: 2.5rem;
}
.ct-strip-item {
    display: flex; align-items: center; gap: .85rem;
    padding: 1.25rem 1.25rem;
    text-decoration: none;
    border-right: 1px solid #f0f0f0;
    transition: background .15s;
    min-width: 0;
}
.ct-strip-item:last-child { border-right: none; }
.ct-strip-item:active { background: #f0f6ff; }
@media(hover:hover) { .ct-strip-item:hover { background: #f7f9fc; } }
.ct-strip-ico {
    width: 44px; height: 44px; border-radius: 11px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.1rem; flex-shrink: 0;
}
.ct-strip-lbl {
    font-size: 0.72rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .07em; color: #888; margin-bottom: 2px;
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
}
.ct-strip-val {
    font-size: 1.05rem; font-weight: 900; color: #1a1a1a;
    letter-spacing: -0.01em; white-space: nowrap;
}

/* Tabletă: 2 coloane */
@media(max-width:767px) {
    .ct-strip {
        grid-template-columns: repeat(2, 1fr);
        border-radius: 12px;
        margin-bottom: 1.5rem;
    }
    .ct-strip-item:nth-child(1),
    .ct-strip-item:nth-child(2) { border-bottom: 1px solid #f0f0f0; }
    .ct-strip-item:nth-child(2),
    .ct-strip-item:nth-child(4) { border-right: none; }
    .ct-strip-item { padding: 1rem; }
    .ct-strip-ico { width: 38px; height: 38px; font-size: 1rem; }
    .ct-strip-val { font-size: 0.95rem; }
    .ct-strip-lbl { font-size: 0.65rem; }
}

/* Mobil mic: 2 coloane dar val permite wrap */
@media(max-width:480px) {
    .ct-strip-val {
        font-size: 0.85rem;
        white-space: normal;      /* permite wrap */
        word-break: break-word;
        letter-spacing: 0;
    }
    .ct-strip-lbl { font-size: 0.62rem; }
    .ct-strip-ico { width: 32px; height: 32px; font-size: 0.85rem; border-radius: 8px; }
    .ct-strip-item { padding: 0.75rem 0.6rem; gap: 0.5rem; }
}

/* ═══════════════════════════════════════════
   MAIN GRID: formular + departamente
═══════════════════════════════════════════ */
.ct-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
    align-items: start;
}
@media(max-width:991px) { .ct-grid { grid-template-columns: 1fr; gap: 1rem; } }

/* ═══════════════════════════════════════════
   CARD BASE
═══════════════════════════════════════════ */
.ct-card {
    background: #fff;
    border: 1px solid #e4e9f0;
    border-radius: 16px;
    overflow: hidden;
}
@media(max-width:575px) { .ct-card { border-radius: 12px; } }

/* ═══════════════════════════════════════════
   FORM CARD
═══════════════════════════════════════════ */
.ct-form-head {
    padding: 1.25rem 1.5rem 1rem;
    border-bottom: 1px solid #f0f4f8;
}
.ct-form-head h2 {
    font-size: 1.1rem; font-weight: 800; color: #111; margin: 0 0 .2rem;
}
.ct-form-head p { font-size: 0.85rem; color: #888; margin: 0; }
.ct-form-head p a { color: var(--aqua-primary); font-weight: 600; text-decoration: none; }

.ct-form-body { padding: 1.25rem 1.5rem; }
@media(max-width:575px) {
    .ct-form-head { padding: 1rem 1rem .85rem; }
    .ct-form-body { padding: 1rem 1rem; }
}

.ct-field { margin-bottom: .9rem; }
.ct-field label {
    display: block; font-size: 0.72rem; font-weight: 800;
    text-transform: uppercase; letter-spacing: .08em;
    color: #888; margin-bottom: .3rem;
}
.ct-field input,
.ct-field select,
.ct-field textarea {
    width: 100%; padding: .7rem .9rem;
    border: 1.5px solid #e8ecf2; border-radius: 9px;
    font-size: 1rem; font-family: inherit; color: #111;
    background: #fcfcfd; outline: none;
    transition: border-color .18s, box-shadow .18s;
    -webkit-appearance: none;
}
/* Inputs mai mari pe mobil — mai ușor de tastat */
@media(max-width:575px) {
    .ct-field input,
    .ct-field select,
    .ct-field textarea { font-size: 1rem; padding: .8rem 1rem; }
    .ct-field label { font-size: 0.7rem; }
}
.ct-field input:focus,
.ct-field select:focus,
.ct-field textarea:focus {
    border-color: var(--aqua-primary);
    background: #fff;
    box-shadow: 0 0 0 3px rgba(0,119,182,.07);
}
.ct-field input::placeholder,
.ct-field textarea::placeholder { color: #ccc; }
.ct-field textarea { resize: none; }
.ct-field .err { font-size: 0.78rem; color: #dc2626; margin-top: 3px; }

.ct-2col { display: grid; grid-template-columns: 1fr 1fr; gap: .75rem; }
@media(max-width:400px) { .ct-2col { grid-template-columns: 1fr; } }

.ct-submit-row {
    display: flex; align-items: center;
    justify-content: space-between; flex-wrap: wrap;
    gap: .75rem; margin-top: .25rem;
}
.ct-btn {
    background: var(--aqua-primary); color: #fff;
    border: none; border-radius: 9px;
    padding: .8rem 2rem; font-size: 1rem;
    font-weight: 800; font-family: inherit; cursor: pointer;
    display: flex; align-items: center; gap: .45rem;
    transition: background .2s, transform .15s;
    letter-spacing: .01em; white-space: nowrap;
}
@media(max-width:575px) {
    .ct-btn { width: 100%; justify-content: center; padding: .9rem; font-size: 1rem; }
    .ct-gdpr { width: 100%; text-align: center; }
}
.ct-btn:active { background: #005f92; transform: translateY(1px); }
@media(hover:hover) { .ct-btn:hover { background: #005f92; transform: translateY(-1px); } }
.ct-gdpr { font-size: 0.78rem; color: #bbb; }
.ct-gdpr a { color: #999; text-decoration: underline; }

/* Upload zone */
.ct-upload-zone {
    display: flex; align-items: center; gap: .5rem;
    padding: .65rem .9rem;
    border: 1.5px dashed #d0d8e8; border-radius: 9px;
    background: #fafbfd; cursor: pointer;
    font-size: 0.88rem; color: #888;
    transition: border-color .18s, background .18s;
}
.ct-upload-zone:hover { border-color: var(--aqua-primary); background: #f0f6ff; color: var(--aqua-primary); }
.ct-file-chip {
    display: inline-flex; align-items: center; gap: .35rem;
    background: #eef4ff; color: #0057a0; border-radius: 6px;
    padding: .25rem .6rem; font-size: 0.82rem; font-weight: 600;
    margin: .35rem .3rem 0 0;
}
.ct-file-chip button {
    background: none; border: none; padding: 0; line-height: 1;
    color: #0057a0; cursor: pointer; font-size: .85rem;
    display: flex; align-items: center;
}

.ct-success {
    background: #f0fdf4; border: 1.5px solid #bbf7d0;
    border-radius: 9px; padding: .8rem 1rem; margin-bottom: 1rem;
    font-size: 0.9rem; color: #166534; font-weight: 600;
    display: flex; align-items: center; gap: .5rem;
}

/* ═══════════════════════════════════════════
   INFO DEPARTAMENTE
═══════════════════════════════════════════ */
.ct-info-card { padding: 1.1rem 1.5rem; }
.ct-info-card + .ct-info-card { border-top: 1px solid #f0f4f8; }
@media(max-width:575px) { .ct-info-card { padding: 1rem; } }

.ct-dept-title {
    font-size: 0.72rem; font-weight: 800; text-transform: uppercase;
    letter-spacing: .1em; color: var(--aqua-primary);
    margin-bottom: .6rem;
    display: flex; align-items: center; gap: .5rem;
}
.ct-dept-title::after { content: ''; flex: 1; height: 1px; background: #f0f4f8; }

.ct-dept-row {
    display: flex; align-items: flex-start; gap: .5rem;
    font-size: 0.9rem; color: #444; padding: .2rem 0; line-height: 1.5;
}
.ct-dept-row i { margin-top: 3px; flex-shrink: 0; font-size: 0.82rem; color: #bbb; }
.ct-dept-row a { color: #111; text-decoration: none; font-weight: 800; font-size: 1rem; }
.ct-dept-row a:hover { color: var(--aqua-primary); }
.ct-dept-row .red { color: #dc2626; font-weight: 900; font-size: 1.05rem; }

/* ═══════════════════════════════════════════
   BOTTOM GRID: Centre + Audiențe + Hartă
═══════════════════════════════════════════ */
.ct-bottom {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 1.5rem; margin-top: 1.5rem;
}
@media(max-width:991px) {
    .ct-bottom { grid-template-columns: 1fr 1fr; gap: 1rem; }
    /* Harta merge full width pe tabletă */
    .ct-bottom > div:last-child { grid-column: 1 / -1; }
}
@media(max-width:575px) {
    .ct-bottom { grid-template-columns: 1fr; margin-top: 1rem; }
    .ct-bottom > div:last-child { grid-column: auto; }
}

/* Centre mini cards */
.ct-mini-card {
    background: #fff; border: 1px solid #e4e9f0;
    border-radius: 12px; overflow: hidden;
}
.ct-mini-head {
    padding: .65rem .9rem;
    display: flex; align-items: center; gap: .55rem;
    border-bottom: 1px solid #f0f4f8;
}
.ct-mini-head-dot { width: 6px; height: 6px; border-radius: 50%; flex-shrink: 0; }
.ct-mini-head-name { font-size: 0.85rem; font-weight: 800; color: #111; }
.ct-mini-body { padding: .65rem .9rem; }

/* Pe mobil centre în 2 coloane */
@media(max-width:575px) {
    .ct-centre-grid {
        display: grid !important;
        grid-template-columns: 1fr 1fr;
        gap: .75rem;
    }
}

/* ═══════════════════════════════════════════
   AUDIENȚE
═══════════════════════════════════════════ */
.ct-aud-row {
    display: flex; align-items: center; gap: .85rem;
    padding: .85rem 1.1rem; border-bottom: 1px solid #f4f4f4;
    background: #fff; transition: background .15s;
}
.ct-aud-row:last-child { border-bottom: none; }
@media(hover:hover) { .ct-aud-row:hover { background: #fafbfc; } }
.ct-aud-av {
    width: 38px; height: 38px; border-radius: 50%;
    background: #f0f4f8; color: #666;
    font-size: 0.8rem; font-weight: 800;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}
.ct-aud-zi {
    font-size: 0.72rem; font-weight: 800; padding: .18rem .6rem;
    border-radius: 20px; background: #f0f4f8; color: #555;
    white-space: nowrap;
}
/* Pe mobil ascundem emailul din audiențe ca să nu rupă layout-ul */
@media(max-width:575px) {
    .ct-aud-email { display: none; }
    .ct-aud-row { padding: .75rem .9rem; gap: .65rem; }
}

/* ═══════════════════════════════════════════
   HARTĂ
═══════════════════════════════════════════ */
.ct-map { border-radius: 12px; overflow: hidden; border: 1px solid #e4e9f0; }
</style>
@endpush

@section('content')
<div class="ct-page">
<div class="container">

    {{-- ── TOP STRIP ── --}}
    <div class="ct-strip">
        <a href="tel:0240524310" class="ct-strip-item">
            <div class="ct-strip-ico" style="background:#eef4ff;">
                <i class="bi bi-building" style="color:var(--aqua-primary)"></i>
            </div>
            <div>
                <div class="ct-strip-lbl">Secretariat</div>
                <div class="ct-strip-val">0240.524.310</div>
            </div>
        </a>
        <a href="tel:0747022009" class="ct-strip-item">
            <div class="ct-strip-ico" style="background:#fff1f2;">
                <i class="bi bi-alarm-fill" style="color:#e11d48"></i>
            </div>
            <div>
                <div class="ct-strip-lbl">Avarii 24/7</div>
                <div class="ct-strip-val" style="color:#be123c">0747 022 009</div>
            </div>
        </a>
        <a href="tel:0340131111" class="ct-strip-item">
            <div class="ct-strip-ico" style="background:#f0fdf4;">
                <i class="bi bi-speedometer2" style="color:#16a34a"></i>
            </div>
            <div>
                <div class="ct-strip-lbl">Telecitire index</div>
                <div class="ct-strip-val" style="color:#15803d">0340 131 111</div>
            </div>
        </a>
        <div class="ct-strip-item" style="cursor:default;">
            <div class="ct-strip-ico" style="background:#f8f8f8;">
                <i class="bi bi-clock" style="color:#555"></i>
            </div>
            <div>
                <div class="ct-strip-lbl">Program</div>
                <div class="ct-strip-val" style="font-size:0.95rem">L–V: 07:30 – 16:00</div>
            </div>
        </div>
    </div>

    {{-- ── MAIN GRID: form + info ── --}}
    <div class="ct-grid">

        {{-- FORMULAR --}}
        <div class="ct-card" id="formular-contact">
            <div class="ct-form-head">
                <h2><i class="bi bi-send-fill me-2" style="color:var(--aqua-primary);font-size:1.2rem"></i>Trimiteți un mesaj</h2>
                <p>Reclamații, sesizări, solicitări de informații.
                   Pentru index contor → <a href="{{ url('/client/index-contor') }}">formularul dedicat</a></p>
            </div>
            <div class="ct-form-body">
                @if(session('success'))
                    <div class="ct-success">
                        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('contact.trimite') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="ct-field">
                        <label>Nume complet <span style="color:#dc2626">*</span></label>
                        <input type="text" name="nume" value="{{ old('nume') }}" required placeholder="Ionescu Ion">
                        @error('nume')<div class="err">{{ $message }}</div>@enderror
                    </div>
                    <div class="ct-field">
                        <label>Adresă email <span style="color:#dc2626">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" required placeholder="email@exemplu.ro">
                        @error('email')<div class="err">{{ $message }}</div>@enderror
                    </div>
                    <div class="ct-2col">
                        <div class="ct-field">
                            <label>Telefon <span style="color:#dc2626">*</span></label>
                            <input type="tel" name="telefon" value="{{ old('telefon') }}" required placeholder="07xx xxx xxx">
                            @error('telefon')<div class="err">{{ $message }}</div>@enderror
                        </div>
                        <div class="ct-field">
                            <label>Tip solicitare <span style="color:#dc2626">*</span></label>
                            <select name="subiect" required>
                                <option value="">— Selectați —</option>
                                <option value="reclamatie" {{ old('subiect')=='reclamatie'?'selected':'' }}>Reclamație</option>
                                <option value="sesizare"   {{ old('subiect')=='sesizare'  ?'selected':'' }}>Sesizare</option>
                                <option value="informatie" {{ old('subiect')=='informatie'?'selected':'' }}>Informații</option>
                                <option value="altele"     {{ old('subiect')=='altele'    ?'selected':'' }}>Altele</option>
                            </select>
                            @error('subiect')<div class="err">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="ct-field">
                        <label>Mesaj <span style="color:#dc2626">*</span></label>
                        <textarea name="mesaj" required rows="5" placeholder="Descrieți solicitarea dvs...">{{ old('mesaj') }}</textarea>
                        @error('mesaj')<div class="err">{{ $message }}</div>@enderror
                    </div>

                    {{-- Atașamente --}}
                    <div class="ct-field">
                        <label>Atașamente <span style="color:#aaa;font-weight:600;text-transform:none;letter-spacing:0;">(opțional — max. 3 fișiere, 5 MB fiecare)</span></label>
                        <label for="fisiere-input" class="ct-upload-zone" id="upload-zone">
                            <i class="bi bi-paperclip" style="font-size:1.1rem;color:var(--aqua-primary);"></i>
                            <span id="upload-text">PDF, JPG, PNG, DOC, DOCX</span>
                        </label>
                        <input type="file" id="fisiere-input" name="fisiere[]" multiple
                               accept=".pdf,.jpg,.jpeg,.png,.doc,.docx"
                               style="display:none;">
                        <div id="fisiere-list"></div>
                        @error('fisiere')<div class="err">{{ $message }}</div>@enderror
                        @error('fisiere.*')<div class="err">{{ $message }}</div>@enderror
                        @error('fisiere.0')<div class="err">{{ $message }}</div>@enderror
                        @error('fisiere.1')<div class="err">{{ $message }}</div>@enderror
                        @error('fisiere.2')<div class="err">{{ $message }}</div>@enderror
                    </div>

                    <div class="ct-submit-row">
                        <button type="submit" class="ct-btn">
                            <i class="bi bi-send"></i> Trimite mesajul
                        </button>
                        <span class="ct-gdpr">
                            <i class="bi bi-shield-lock me-1"></i>
                            Date protejate conform <a href="{{ url('/gdpr') }}">GDPR</a>
                        </span>
                    </div>
                </form>
            </div>
        </div>

        {{-- INFO DEPARTAMENTE --}}
        <div class="ct-card">

            <div class="ct-info-card">
                <div class="ct-dept-title">Secretariat & Conducere</div>
                <div class="ct-dept-row"><i class="bi bi-geo-alt-fill"></i><span>Str. Rezervorului, nr. 2, Tulcea</span></div>
                <div class="ct-dept-row"><i class="bi bi-telephone-fill" style="color:var(--aqua-primary)"></i><a href="tel:0240524310" style="color:var(--aqua-primary);font-size:1.15rem;font-weight:900;">0240.524.310</a></div>
                <div class="ct-dept-row"><i class="bi bi-envelope-fill"></i><a href="mailto:secretariat@aquaservtulcea.ro">secretariat@aquaservtulcea.ro</a></div>
            </div>

            <div class="ct-info-card" style="background:#fffafa;">
                <div class="ct-dept-title" style="color:#dc2626;">Dispecerat Avarii 24/7</div>
                <div class="ct-dept-row"><i class="bi bi-alarm-fill" style="color:#dc2626;"></i><a href="tel:0747022009" class="red" style="font-size:1.2rem;font-weight:900;">0747 022 009</a></div>
                <div class="ct-dept-row" style="font-size:0.88rem;color:#444;padding-left:1.2rem;">Sesizări avarii non-stop, inclusiv weekenduri</div>
            </div>

            <div class="ct-info-card">
                <div class="ct-dept-title">Contractare & Facturare</div>
                <div class="ct-dept-row"><i class="bi bi-geo-alt-fill"></i><span>Str. Tudor Vladimirescu, nr. 2</span></div>
                <div class="ct-dept-row"><i class="bi bi-telephone-fill" style="color:var(--aqua-primary)"></i><a href="tel:0240511369" style="color:var(--aqua-primary);font-size:1.15rem;font-weight:900;">0240.511.369</a></div>
                <div class="ct-dept-row"><i class="bi bi-envelope-fill"></i><a href="mailto:contractare.facturare@aquaservtulcea.ro" style="font-size:0.88rem;">contractare.facturare@aquaservtulcea.ro</a></div>
                <div style="margin-top:.6rem;padding:.4rem .7rem;background:#f5f8ff;border-radius:7px;font-size:0.85rem;color:#333;">
                    <i class="bi bi-clock me-1" style="color:var(--aqua-primary)"></i>Casierie: Luni–Vineri 07:30–17:00
                </div>
            </div>

            <div class="ct-info-card">
                <div class="ct-dept-title">Relații cu Publicul</div>
                <div class="ct-dept-row"><i class="bi bi-telephone-fill" style="color:var(--aqua-primary)"></i><a href="tel:0240524310" style="color:var(--aqua-primary);font-size:1.15rem;font-weight:900;">0240.524.310 int. 118</a></div>
                <div class="ct-dept-row"><i class="bi bi-envelope-fill"></i><a href="mailto:relatii.public@aquaservtulcea.ro" style="font-size:0.88rem;">relatii.public@aquaservtulcea.ro</a></div>
                <div style="font-size:0.85rem;color:#555;margin-top:.3rem;">Legea 544/2001 – acces la informații publice</div>
            </div>

        </div>
    </div>

    {{-- ── BOTTOM: Centre + Audiențe + Hartă ── --}}
    <div class="ct-bottom">

        {{-- Centre operationale --}}
        <div>
            <div style="font-size:0.8rem;font-weight:800;text-transform:uppercase;letter-spacing:.1em;color:var(--aqua-primary);margin-bottom:.4rem;">Rețeaua teritorială</div>
            <div style="font-size:1.15rem;font-weight:800;color:#111;margin-bottom:1rem;">Centre Operaționale</div>
            @php
            $centre = [
                ['oras'=>'Isaccea','tel'=>'0240.540.302','href'=>'tel:0240540302','email'=>'centru.isaccea@aquaservtulcea.ro'],
                ['oras'=>'Măcin',  'tel'=>'0240.571.180','href'=>'tel:0240571180','email'=>'centru.macin@aquaservtulcea.ro'],
                ['oras'=>'Sulina', 'tel'=>'0240.543.147','href'=>'tel:0240543147','email'=>'centru.sulina@aquaservtulcea.ro'],
                ['oras'=>'Babadag','tel'=>'0240.562.340','href'=>'tel:0240562340','email'=>'centru.babadag@aquaservtulcea.ro'],
            ];
            @endphp
            <div class="ct-centre-grid" style="display:flex;flex-direction:column;gap:.75rem;">
                @foreach($centre as $c)
                <div class="ct-mini-card">
                    <div class="ct-mini-head">
                        <span class="ct-mini-head-dot" style="background:var(--aqua-primary)"></span>
                        <span class="ct-mini-head-name">C.O. {{ $c['oras'] }}</span>
                    </div>
                    <div class="ct-mini-body">
                        <div class="ct-dept-row"><i class="bi bi-telephone-fill" style="color:var(--aqua-primary)"></i><a href="{{ $c['href'] }}" style="color:var(--aqua-primary);font-size:0.95rem;font-weight:900;">{{ $c['tel'] }}</a></div>
                        <div class="ct-dept-row"><i class="bi bi-envelope-fill"></i><a href="mailto:{{ $c['email'] }}" style="font-size:0.85rem;">{{ $c['email'] }}</a></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Audiențe --}}
        <div>
            <div style="font-size:0.8rem;font-weight:800;text-transform:uppercase;letter-spacing:.1em;color:var(--aqua-primary);margin-bottom:.4rem;">Conducerea companiei</div>
            <div style="font-size:1.15rem;font-weight:800;color:#111;margin-bottom:1rem;">Program Audiențe</div>
            <div class="ct-card">
                @php
                $aud = [
                    ['n'=>'Ifrim Catrinescu Valentin','i'=>'IC','r'=>'Director General', 'e'=>'director.general@aquaservtulcea.ro','z'=>'Marți'],
                    ['n'=>'Ilie George',              'i'=>'IG','r'=>'Inginer Șef',      'e'=>'director.tehnic@aquaservtulcea.ro', 'z'=>'Miercuri'],
                    ['n'=>'Matei Selda Georgiana',    'i'=>'MS','r'=>'Director Economic','e'=>'director.economic@aquaservtulcea.ro','z'=>'Joi'],
                ];
                @endphp
                @foreach($aud as $a)
                <div class="ct-aud-row">
                    <div class="ct-aud-av">{{ $a['i'] }}</div>
                    <div style="flex:1;min-width:0;">
                        <div style="font-weight:800;font-size:0.95rem;color:#111;">{{ $a['n'] }}</div>
                        <div style="font-size:0.85rem;color:#444;">{{ $a['r'] }}</div>
                        <a href="mailto:{{ $a['e'] }}" class="ct-aud-email" style="font-size:0.82rem;color:#555;text-decoration:none;">{{ $a['e'] }}</a>
                    </div>
                    <div style="text-align:right;flex-shrink:0;">
                        <span class="ct-aud-zi">{{ $a['z'] }}</span>
                        <div style="font-size:0.82rem;color:#555;margin-top:3px;font-weight:600;">12:00–14:00</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Hartă --}}
        <div>
            <div style="font-size:0.8rem;font-weight:800;text-transform:uppercase;letter-spacing:.1em;color:var(--aqua-primary);margin-bottom:.4rem;">Localizare</div>
            <div style="font-size:1.15rem;font-weight:800;color:#111;margin-bottom:1rem;">Adrese</div>
            <div class="ct-map">
                {{-- Iframuri Google Maps --}}
                <div style="position:relative;height:260px;">
                    <iframe id="map-sediu"
                        src="https://maps.google.com/maps?q=45.1669467,28.793184&output=embed&hl=ro&z=17"
                        style="position:absolute;inset:0;width:100%;height:100%;border:0;display:block;" allowfullscreen loading="lazy">
                    </iframe>
                    <iframe id="map-contractare"
                        src="https://maps.google.com/maps?q=45.1784283,28.8015393&output=embed&hl=ro&z=17"
                        style="position:absolute;inset:0;width:100%;height:100%;border:0;display:none;" allowfullscreen loading="lazy">
                    </iframe>
                </div>

                {{-- Adrese — funcționează și ca tab switcher --}}
                <div style="background:#fff;border-top:1px solid #e4e9f0;">
                    <button id="tab-sediu"
                        style="width:100%;display:flex;align-items:center;justify-content:space-between;padding:.85rem 1.1rem;border:none;border-bottom:1px solid #f0f4f8;text-align:left;cursor:pointer;background:#fff;border-left:3px solid var(--aqua-primary);transition:background .15s;">
                        <div style="display:flex;align-items:center;gap:.6rem;">
                            <div style="width:30px;height:30px;border-radius:8px;background:#eef4ff;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="bi bi-building" style="color:var(--aqua-primary);font-size:.85rem;"></i>
                            </div>
                            <div>
                                <div style="font-size:0.72rem;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:#999;margin-bottom:1px;">Secretariat & Sediu central</div>
                                <div class="map-label" style="font-size:0.9rem;font-weight:700;color:#111;">Str. Rezervorului, nr. 2, Tulcea</div>
                            </div>
                        </div>
                        <a href="https://maps.app.goo.gl/jDibWxXwgdk4kuQr5" target="_blank" rel="noopener noreferrer"
                           class="map-external-link"
                           style="color:var(--aqua-primary);font-size:.85rem;flex-shrink:0;padding:.2rem .3rem;">
                            <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                    </button>
                    <button id="tab-contractare"
                        style="width:100%;display:flex;align-items:center;justify-content:space-between;padding:.85rem 1.1rem;border:none;text-align:left;cursor:pointer;background:#fff;border-left:3px solid transparent;transition:background .15s;">
                        <div style="display:flex;align-items:center;gap:.6rem;">
                            <div style="width:30px;height:30px;border-radius:8px;background:#f0f4f8;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="bi bi-receipt" style="color:var(--aqua-gray);font-size:.85rem;"></i>
                            </div>
                            <div>
                                <div style="font-size:0.72rem;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:#999;margin-bottom:1px;">Contractare & Facturare</div>
                                <div class="map-label" style="font-size:0.9rem;font-weight:700;color:#555;">Str. Tudor Vladimirescu, nr. 2, Tulcea</div>
                            </div>
                        </div>
                        <a href="https://maps.app.goo.gl/xHE8Sg9AvG62xqqt5" target="_blank" rel="noopener noreferrer"
                           class="map-external-link"
                           style="color:var(--aqua-primary);font-size:.85rem;flex-shrink:0;padding:.2rem .3rem;">
                            <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                    </button>
                </div>
            </div>
        </div>

    </div>

</div>
</div>
@endsection

@push('scripts')
<script nonce="@nonce">
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('tab-sediu').addEventListener('click', function() { switchMap('sediu'); });
        document.getElementById('tab-contractare').addEventListener('click', function() { switchMap('contractare'); });
        document.getElementById('fisiere-input').addEventListener('change', function() { arataFisiere(this); });

        ['tab-sediu', 'tab-contractare'].forEach(function(id) {
            const btn = document.getElementById(id);
            btn.addEventListener('mouseover', function() { this.style.background = '#f7f9fc'; });
            btn.addEventListener('mouseout',  function() { this.style.background = '#fff'; });
        });

        document.querySelectorAll('.map-external-link').forEach(function(link) {
            link.addEventListener('click', function(e) { e.stopPropagation(); });
        });

        const el = document.getElementById('formular-contact');
        if (el) {
            setTimeout(() => {
                const top = el.getBoundingClientRect().top + window.scrollY - 100;
                window.scrollTo({ top: top, behavior: 'smooth' });
            }, 200);
        }

        // Mesaje validare browser în română
        const mesaje = {
            nume:    { valueMissing: 'Numele este obligatoriu.', tooShort: 'Numele trebuie să aibă cel puțin 3 caractere.' },
            email:   { valueMissing: 'Adresa de email este obligatorie.', typeMismatch: 'Introduceți o adresă de email validă (ex: nume@domeniu.ro).' },
            telefon: { valueMissing: 'Numărul de telefon este obligatoriu.' },
            subiect: { valueMissing: 'Vă rugăm să alegeți un tip de solicitare.' },
            mesaj:   { valueMissing: 'Mesajul este obligatoriu.', tooShort: 'Mesajul trebuie să aibă cel puțin 10 caractere.' },
        };

        document.querySelectorAll('#formular-contact [name]').forEach(function(field) {
            field.addEventListener('invalid', function(e) {
                const reg = mesaje[field.name];
                if (!reg) return;
                const v = field.validity;
                field.setCustomValidity(
                    v.valueMissing  ? (reg.valueMissing  || '') :
                    v.typeMismatch  ? (reg.typeMismatch  || '') :
                    v.tooShort      ? (reg.tooShort      || '') :
                    v.tooLong       ? (reg.tooLong       || '') :
                    v.patternMismatch ? (reg.patternMismatch || '') :
                    ''
                );
            });
            field.addEventListener('input', function() {
                field.setCustomValidity('');
            });
            field.addEventListener('change', function() {
                field.setCustomValidity('');
            });
        });
    });

    function arataFisiere(input) {
        const list  = document.getElementById('fisiere-list');
        const text  = document.getElementById('upload-text');
        const zone  = document.getElementById('upload-zone');
        const files = Array.from(input.files).slice(0, 3);

        list.innerHTML = '';

        if (files.length === 0) {
            text.textContent = 'PDF, JPG, PNG, DOC, DOCX';
            zone.querySelector('i').className = 'bi bi-paperclip';
            return;
        }

        text.textContent = files.length === 1 ? '1 fișier selectat' : files.length + ' fișiere selectate';
        zone.querySelector('i').className = 'bi bi-check-circle-fill';
        zone.querySelector('i').style.color = '#16a34a';

        files.forEach(function(f) {
            const chip = document.createElement('span');
            chip.className = 'ct-file-chip';
            const ext = f.name.split('.').pop().toUpperCase();
            chip.innerHTML = '<i class="bi bi-file-earmark-text"></i>' + f.name
                + ' <span style="opacity:.6;font-weight:400;">(' + ext + ')</span>';
            list.appendChild(chip);
        });
    }

    function switchMap(which) {
        const isSediu = which === 'sediu';

        document.getElementById('map-sediu').style.display       = isSediu ? 'block' : 'none';
        document.getElementById('map-contractare').style.display = isSediu ? 'none'  : 'block';

        const tabSediu       = document.getElementById('tab-sediu');
        const tabContractare = document.getElementById('tab-contractare');

        tabSediu.style.borderLeft       = isSediu ? '3px solid var(--aqua-primary)' : '3px solid transparent';
        tabSediu.style.background       = isSediu ? '#fff' : '#fff';
        tabSediu.querySelector('.map-label').style.color = isSediu ? '#111' : '#555';
        tabSediu.querySelector('div > div').style.background    = isSediu ? '#eef4ff' : '#f0f4f8';
        tabSediu.querySelector('i').style.color                 = isSediu ? 'var(--aqua-primary)' : 'var(--aqua-gray)';

        tabContractare.style.borderLeft = isSediu ? '3px solid transparent' : '3px solid var(--aqua-primary)';
        tabContractare.querySelector('.map-label').style.color  = isSediu ? '#555' : '#111';
        tabContractare.querySelector('div > div').style.background  = isSediu ? '#f0f4f8' : '#eef4ff';
        tabContractare.querySelector('i').style.color               = isSediu ? 'var(--aqua-gray)' : 'var(--aqua-primary)';
    }
</script>
@endpush