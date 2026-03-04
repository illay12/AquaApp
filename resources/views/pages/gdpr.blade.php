@extends('layouts.app')

@section('title', 'GDPR – Protecția Datelor cu Caracter Personal')

@section('content')

    {{-- HERO --}}
    <section style="background:linear-gradient(135deg, #023e8a 0%, #0077b6 60%, #00b4d8 100%); color:#fff; padding:2rem 0 1.5rem; position:relative; overflow:hidden;">
        <div style="position:absolute;inset:0;background:url('data:image/svg+xml,%3Csvg width=\'80\' height=\'80\' viewBox=\'0 0 80 80\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.04\' fill-rule=\'evenodd\'%3E%3Ccircle cx=\'40\' cy=\'40\' r=\'8\'/%3E%3C/g%3E%3C/svg%3E');"></div>
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <span class="badge" style="background:rgba(255,255,255,0.18);color:#fff;font-size:0.78rem;font-weight:700;letter-spacing:0.08em;padding:0.45em 1em;border-radius:20px;margin-bottom:0.6rem;display:inline-block;">
                        <i class="bi bi-shield-check me-1"></i> Regulamentul UE 2016/679
                    </span>
                    <h1 style="font-family:'Merriweather',serif;font-size:clamp(1.35rem,5vw,2.1rem);font-weight:700;line-height:1.3;margin-bottom:0.8rem;">
                        Protecția datelor
                        <span style="color:#90e0ef;display:block;">cu caracter personal</span>
                    </h1>
                    <p style="font-size:clamp(0.85rem,3vw,1rem);opacity:0.9;max-width:580px;line-height:1.6;margin-bottom:0;">
                        Notă de informare privind modul în care S.C. AQUASERV S.A. colectează,
                        utilizează și protejează datele dumneavoastră personale.
                    </p>
                </div>
                <div class="col-lg-4 d-none d-lg-flex justify-content-center">
                    <div style="width:180px;height:180px;background:rgba(255,255,255,0.1);border-radius:50%;display:flex;align-items:center;justify-content:center;border:2px solid rgba(255,255,255,0.2);">
                        <i class="bi bi-shield-lock-fill" style="font-size:5rem;color:rgba(255,255,255,0.7);"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- BREADCRUMB --}}
    <div style="background:#f0f8ff;border-bottom:1px solid var(--aqua-border);padding:0.6rem 0;">
        <div class="container">
            <nav style="font-size:0.82rem;color:#6c757d;">
                <a href="{{ url('/') }}" style="color:var(--aqua-primary);text-decoration:none;">Acasă</a>
                <span class="mx-2">›</span>
                <span>GDPR</span>
            </nav>
        </div>
    </div>

    {{-- MAIN --}}
    <section style="padding:3rem 0 5rem;">
    <div class="container">
    <div class="row g-4">

        {{-- NAV LATERAL --}}
        <div class="col-lg-3 d-none d-lg-block">
            <div class="card" style="position:sticky;top:1.5rem;border-color:var(--aqua-border);">
                <div class="card-body p-0">
                    <div style="padding:1rem 1.25rem;background:var(--aqua-bg);border-bottom:1px solid var(--aqua-border);border-radius:12px 12px 0 0;">
                        <h6 style="font-family:'Merriweather',serif;font-size:0.82rem;font-weight:700;color:var(--aqua-dark);margin:0;">
                            <i class="bi bi-list-ul me-2"></i>Cuprins
                        </h6>
                    </div>
                    <nav style="padding:0.5rem 0;">
                        <a href="#despre-companie" class="gdpr-nav-link"><i class="bi bi-building"></i> Despre companie</a>
                        <a href="#scop" class="gdpr-nav-link"><i class="bi bi-bullseye"></i> Scopul prelucrării</a>
                        <a href="#temeiuri" class="gdpr-nav-link"><i class="bi bi-journal-text"></i> Temeiuri juridice</a>
                        <a href="#destinatari" class="gdpr-nav-link"><i class="bi bi-people"></i> Destinatari</a>
                        <a href="#stocare" class="gdpr-nav-link"><i class="bi bi-clock-history"></i> Stocare date</a>
                        <a href="#drepturi" class="gdpr-nav-link"><i class="bi bi-person-check"></i> Drepturile dvs.</a>
                        <a href="#consecinte" class="gdpr-nav-link"><i class="bi bi-exclamation-triangle"></i> Consecinte</a>
                        <a href="#dpo" class="gdpr-nav-link"><i class="bi bi-person-badge"></i> Responsabil DPO</a>
                        <a href="#documente" class="gdpr-nav-link"><i class="bi bi-file-earmark-pdf"></i> Documente</a>
                    </nav>
                </div>
            </div>
        </div>

        {{-- SECTIUNI --}}
        <div class="col-lg-9">

            {{-- 1. DESPRE COMPANIE --}}
            <div class="card mb-4 gdpr-card" id="despre-companie">
                <div class="gdpr-card-head">
                    <div class="gdpr-icon"><i class="bi bi-building"></i></div>
                    <h2 class="gdpr-card-title">Informatii despre companie</h2>
                </div>
                <div class="card-body">
                    <p style="font-size:0.9rem;color:#495057;margin-bottom:1.25rem;">
                        Prezenta nota de informare este emisa de S.C. AQUASERV S.A., in legatura cu
                        derularea Contractului de furnizare/prestare a serviciului de alimentare cu apa si
                        de canalizare pentru persoane fizice.
                    </p>
                    <div class="row g-2">
                        <div class="col-sm-6">
                            <div class="info-chip"><div class="info-label">Denumire</div><div class="info-value">S.C. AQUASERV S.A.</div></div>
                        </div>
                        <div class="col-sm-6">
                            <div class="info-chip"><div class="info-label">Sediu</div><div class="info-value">Tulcea, str. Rezervorului nr. 2</div></div>
                        </div>
                        <div class="col-sm-6">
                            <div class="info-chip"><div class="info-label">Telefon</div><div class="info-value">0240 524 310</div></div>
                        </div>
                        <div class="col-sm-6">
                            <div class="info-chip"><div class="info-label">Reg. Comertului</div><div class="info-value">J36/348/2004</div></div>
                        </div>
                        <div class="col-sm-6">
                            <div class="info-chip"><div class="info-label">CUI</div><div class="info-value">RO 16775941</div></div>
                        </div>
                        <div class="col-sm-6">
                            <div class="info-chip"><div class="info-label">Cont RON</div><div class="info-value" style="font-size:0.78rem;">RO46RNCB4600000178560001 – BCR Tulcea</div></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 2. SCOP --}}
            <div class="card mb-4 gdpr-card" id="scop">
                <div class="gdpr-card-head">
                    <div class="gdpr-icon"><i class="bi bi-bullseye"></i></div>
                    <h2 class="gdpr-card-title">Scopul prelucrarii datelor</h2>
                </div>
                <div class="card-body" style="font-size:0.9rem;color:#495057;line-height:1.8;">
                    Compania noastra prelucreaza datele dvs. cu caracter personal in scopul
                    <strong>executarii in conditii optime a contractului</strong> incheiat cu dvs.
                    si in vederea respectarii obligatiilor legale aferente.
                    <br><br>
                    Consimtamantul dvs. poate sta la baza unei prelucrari de date cu caracter personal,
                    in masura in care exista acordul dvs. pentru anumite operatiuni de prelucrare.
                </div>
            </div>

            {{-- 3. TEMEIURI --}}
            <div class="card mb-4 gdpr-card" id="temeiuri">
                <div class="gdpr-card-head">
                    <div class="gdpr-icon"><i class="bi bi-journal-text"></i></div>
                    <h2 class="gdpr-card-title">Temeiuri juridice</h2>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column gap-2">
                        <div class="check-row"><i class="bi bi-check-circle-fill"></i><span>Executarea unor <strong>obligatii derivate din contractul</strong> incheiat cu dvs.</span></div>
                        <div class="check-row"><i class="bi bi-check-circle-fill"></i><span>Existenta unor <strong>obligatii stabilite de lege</strong> in sarcina companiei noastre.</span></div>
                        <div class="check-row"><i class="bi bi-check-circle-fill"></i><span><strong>Interese legitime</strong> ale companiei: monitorizarea locurilor de acces prin camere video, promovarea imaginii si a serviciilor, elaborarea de studii privind satisfactia clientului.</span></div>
                        <div class="check-row"><i class="bi bi-check-circle-fill"></i><span><strong>Consimtamantul dvs.</strong> expres pentru prelucrarea datelor cu caracter personal, acolo unde este aplicabil.</span></div>
                    </div>
                </div>
            </div>

            {{-- 4. DESTINATARI --}}
            <div class="card mb-4 gdpr-card" id="destinatari">
                <div class="gdpr-card-head">
                    <div class="gdpr-icon"><i class="bi bi-people-fill"></i></div>
                    <h2 class="gdpr-card-title">Destinatarii datelor</h2>
                </div>
                <div class="card-body">
                    <p style="font-size:0.9rem;color:#495057;margin-bottom:1rem;">Datele dvs. cu caracter personal pot fi transmise catre:</p>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="card h-100 text-center p-3" style="border-color:var(--aqua-border);">
                                <div class="dest-icon"><i class="bi bi-bank2"></i></div>
                                <h6 style="font-family:'Merriweather',serif;font-size:0.875rem;color:var(--aqua-dark);">Autoritati si institutii publice</h6>
                                <p style="font-size:0.8rem;color:#6c757d;margin:0;">Indreptatite conform prevederilor legale in vigoare.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 text-center p-3" style="border-color:var(--aqua-border);">
                                <div class="dest-icon"><i class="bi bi-briefcase-fill"></i></div>
                                <h6 style="font-family:'Merriweather',serif;font-size:0.875rem;color:var(--aqua-dark);">Parteneri contractuali</h6>
                                <p style="font-size:0.8rem;color:#6c757d;margin:0;">Care prelucreaza datele exclusiv in scopul furnizarii serviciului contractat.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 5. STOCARE --}}
            <div class="card mb-4 gdpr-card" id="stocare">
                <div class="gdpr-card-head">
                    <div class="gdpr-icon"><i class="bi bi-clock-history"></i></div>
                    <h2 class="gdpr-card-title">Perioada de stocare a datelor</h2>
                </div>
                <div class="card-body" style="font-size:0.9rem;color:#495057;line-height:1.8;">
                    Datele cu caracter personal vor fi prelucrate <strong>pentru perioada necesara executarii contractului</strong>,
                    cu exceptia situatiilor in care o prevedere legala stabileste o perioada mai mare de timp.
                    <br><br>
                    Ulterior implinirii perioadei de prelucrare, datele vor fi <strong>sterse sau anonimizate</strong>,
                    cu exceptia cazurilor in care legea prevede obligativitatea stocarii lor pentru o durata mai mare.
                </div>
            </div>

            {{-- 6. DREPTURI --}}
            <div class="card mb-4 gdpr-card" id="drepturi">
                <div class="gdpr-card-head">
                    <div class="gdpr-icon"><i class="bi bi-person-check-fill"></i></div>
                    <h2 class="gdpr-card-title">Drepturile dumneavoastra</h2>
                </div>
                <div class="card-body">
                    <p style="font-size:0.9rem;color:#495057;margin-bottom:1rem;">Conform Regulamentului GDPR, beneficiati de urmatoarele drepturi:</p>
                    <div class="row g-3">
                        <div class="col-md-6"><div class="right-card"><div class="right-icon"><i class="bi bi-eye-fill"></i></div><div><div class="right-title">Dreptul de acces</div><div class="right-desc">Puteti solicita accesul la datele pe care le detinem despre dvs.</div></div></div></div>
                        <div class="col-md-6"><div class="right-card"><div class="right-icon"><i class="bi bi-pencil-fill"></i></div><div><div class="right-title">Dreptul la rectificare</div><div class="right-desc">Puteti solicita corectarea datelor inexacte sau incomplete.</div></div></div></div>
                        <div class="col-md-6"><div class="right-card"><div class="right-icon"><i class="bi bi-trash-fill"></i></div><div><div class="right-title">Dreptul la stergere</div><div class="right-desc">Puteti solicita stergerea datelor in conditiile prevazute de lege.</div></div></div></div>
                        <div class="col-md-6"><div class="right-card"><div class="right-icon"><i class="bi bi-pause-fill"></i></div><div><div class="right-title">Dreptul la restrictionare</div><div class="right-desc">Puteti solicita restrictionarea prelucrarii datelor dvs.</div></div></div></div>
                        <div class="col-md-6"><div class="right-card"><div class="right-icon"><i class="bi bi-x-circle-fill"></i></div><div><div class="right-title">Dreptul de opozitie</div><div class="right-desc">Va puteti opune prelucrarii datelor in anumite situatii.</div></div></div></div>
                        <div class="col-md-6"><div class="right-card"><div class="right-icon"><i class="bi bi-arrow-left-right"></i></div><div><div class="right-title">Dreptul la portabilitate</div><div class="right-desc">Puteti solicita transferul datelor dvs. catre alt operator.</div></div></div></div>
                        <div class="col-md-6"><div class="right-card"><div class="right-icon"><i class="bi bi-arrow-counterclockwise"></i></div><div><div class="right-title">Dreptul de retragere</div><div class="right-desc">Puteti retrage consimtamantul oricand, fara a afecta prelucrarile anterioare.</div></div></div></div>
                        <div class="col-md-6"><div class="right-card"><div class="right-icon"><i class="bi bi-flag-fill"></i></div><div><div class="right-title">Dreptul la plangere</div><div class="right-desc">Puteti depune plangere la Autoritatea Nationala de Supraveghere (ANSPDCP).</div></div></div></div>
                    </div>
                </div>
            </div>

            {{-- 7. CONSECINTE --}}
            <div class="card mb-4 gdpr-card" id="consecinte">
                <div class="gdpr-card-head">
                    <div class="gdpr-icon"><i class="bi bi-exclamation-triangle-fill"></i></div>
                    <h2 class="gdpr-card-title">Consecintele nefurnizarii datelor</h2>
                </div>
                <div class="card-body" style="font-size:0.9rem;color:#495057;line-height:1.8;">
                    Consecintele nefurnizarii datelor cu caracter personal constau in
                    <strong>imposibilitatea executarii contractului</strong> incheiat.
                    <br><br>
                    Pentru activitatile de prelucrare intemeiate pe consimtamantul dvs., retragerea acestuia
                    produce efectul <strong>stergerii datelor</strong> procesate pe acest temei juridic si
                    incetarea operatiunilor respective de prelucrare pentru viitor, fara a afecta legalitatea
                    prelucrarilor efectuate anterior retragerii.
                </div>
            </div>

            {{-- DPO --}}
            <div class="card mb-4" id="dpo">
                <div class="card-body" style="background:linear-gradient(90deg,#023e8a,#0077b6);border-radius:12px;padding:1.75rem;">
                    <div class="row align-items-center g-3">
                        <div class="col-auto">
                            <div style="width:56px;height:56px;background:rgba(255,255,255,0.15);border-radius:50%;display:flex;align-items:center;justify-content:center;border:2px solid rgba(255,255,255,0.3);">
                                <i class="bi bi-person-badge-fill" style="font-size:1.5rem;color:#fff;"></i>
                            </div>
                        </div>
                        <div class="col">
                            <div style="font-size:0.72rem;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;color:rgba(255,255,255,0.6);margin-bottom:0.1rem;">Responsabil cu Protectia Datelor (DPO)</div>
                            <div style="font-family:'Merriweather',serif;font-size:1.2rem;font-weight:700;color:#fff;margin-bottom:0.75rem;">Moisescu Diana Elena</div>
                            <div class="d-flex flex-wrap gap-2">
                                <a href="tel:+40240511365" style="display:inline-flex;align-items:center;gap:0.4rem;background:rgba(255,255,255,0.15);border:1px solid rgba(255,255,255,0.25);border-radius:20px;padding:0.35rem 0.9rem;color:#fff;text-decoration:none;font-size:0.82rem;">
                                    <i class="bi bi-telephone-fill"></i> +40 240 511 365
                                </a>
                                <a href="mailto:dpo@aquaservtulcea.ro" style="display:inline-flex;align-items:center;gap:0.4rem;background:rgba(255,255,255,0.15);border:1px solid rgba(255,255,255,0.25);border-radius:20px;padding:0.35rem 0.9rem;color:#fff;text-decoration:none;font-size:0.82rem;">
                                    <i class="bi bi-envelope-fill"></i> dpo@aquaservtulcea.ro
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- DOCUMENTE --}}
            <div class="card gdpr-card" id="documente">
                <div class="gdpr-card-head">
                    <div class="gdpr-icon"><i class="bi bi-file-earmark-pdf-fill"></i></div>
                    <h2 class="gdpr-card-title">Documente utile</h2>
                </div>
                <div class="card-body d-flex flex-column gap-2">
                    <a href="http://www.aquaservtulcea.ro/wp-content/uploads/2019/04/site-aquaserv-2.pdf" target="_blank" class="doc-link">
                        <div class="doc-icon-wrap"><i class="bi bi-file-pdf"></i></div>
                        <div style="flex:1;"><div class="doc-title">Politica privind supravegherea prin mijloace video</div><div class="doc-sub">SC AQUASERV SA Tulcea · PDF</div></div>
                        <i class="bi bi-download" style="color:var(--aqua-primary);"></i>
                    </a>
                    <a href="http://www.aquaservtulcea.ro/wp-content/uploads/2019/04/site-aqua-3.pdf" target="_blank" class="doc-link">
                        <div class="doc-icon-wrap"><i class="bi bi-file-pdf"></i></div>
                        <div style="flex:1;"><div class="doc-title">Anexa 1 – Drepturile persoanelor vizate</div><div class="doc-sub">SC AQUASERV SA Tulcea · PDF</div></div>
                        <i class="bi bi-download" style="color:var(--aqua-primary);"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
    </div>
    </section>

@endsection

@push('styles')
<style>
    .gdpr-card { border-color: var(--aqua-border) !important; border-radius: 12px !important; }
    .gdpr-card-head { display:flex; align-items:center; gap:0.85rem; padding:1rem 1.25rem; background:var(--aqua-bg); border-bottom:1px solid var(--aqua-border); border-radius:12px 12px 0 0; }
    .gdpr-icon { width:36px; height:36px; min-width:36px; background:var(--aqua-primary); border-radius:8px; display:flex; align-items:center; justify-content:center; color:#fff; font-size:1rem; }
    .gdpr-card-title { font-family:'Merriweather',serif; font-size:0.95rem; font-weight:700; color:var(--aqua-dark); margin:0; }
    .gdpr-nav-link { display:flex; align-items:center; gap:0.6rem; padding:0.5rem 1.25rem; font-size:0.82rem; font-weight:500; color:#495057; text-decoration:none; transition:all 0.2s; border-left:3px solid transparent; }
    .gdpr-nav-link:hover, .gdpr-nav-link.active { color:var(--aqua-primary); background:var(--aqua-bg); border-left-color:var(--aqua-primary); font-weight:600; }
    .gdpr-nav-link i { font-size:0.85rem; width:16px; flex-shrink:0; }
    .info-chip { padding:0.65rem 0.85rem; background:var(--aqua-bg); border:1px solid var(--aqua-border); border-radius:8px; }
    .info-label { font-size:0.68rem; font-weight:700; letter-spacing:0.06em; text-transform:uppercase; color:#6c757d; margin-bottom:0.15rem; }
    .info-value { font-size:0.85rem; font-weight:600; color:var(--aqua-dark); }
    .check-row { display:flex; align-items:flex-start; gap:0.75rem; padding:0.75rem 1rem; background:var(--aqua-bg); border:1px solid var(--aqua-border); border-radius:8px; font-size:0.875rem; color:#495057; line-height:1.6; }
    .check-row i { color:var(--aqua-primary); margin-top:2px; flex-shrink:0; }
    .dest-icon { width:52px; height:52px; background:var(--aqua-bg); border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 0.75rem; font-size:1.4rem; color:var(--aqua-primary); }
    .right-card { display:flex; align-items:flex-start; gap:0.75rem; padding:0.85rem 1rem; background:#fff; border:1px solid var(--aqua-border); border-radius:8px; height:100%; transition:border-color 0.2s,background 0.2s; }
    .right-card:hover { border-color:var(--aqua-primary); background:var(--aqua-bg); }
    .right-icon { width:34px; height:34px; min-width:34px; background:var(--aqua-bg); border-radius:8px; display:flex; align-items:center; justify-content:center; color:var(--aqua-primary); font-size:0.9rem; }
    .right-title { font-size:0.82rem; font-weight:700; color:var(--aqua-dark); margin-bottom:0.2rem; }
    .right-desc { font-size:0.78rem; color:#6c757d; line-height:1.5; }
    .doc-link { display:flex; align-items:center; gap:1rem; padding:0.9rem 1rem; background:#fff; border:1px solid var(--aqua-border); border-radius:8px; text-decoration:none; transition:all 0.2s; }
    .doc-link:hover { border-color:var(--aqua-primary); background:var(--aqua-bg); }
    .doc-icon-wrap { width:40px; height:40px; min-width:40px; background:#fee2e2; border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:1.2rem; color:#dc3545; }
    .doc-title { font-size:0.875rem; font-weight:600; color:var(--aqua-dark); }
    .doc-sub { font-size:0.75rem; color:#6c757d; }
</style>
@endpush

@push('scripts')
<script>
const sections = document.querySelectorAll('[id]');
const navLinks  = document.querySelectorAll('.gdpr-nav-link');
const observer  = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            navLinks.forEach(link => {
                link.classList.toggle('active', link.getAttribute('href') === '#' + entry.target.id);
            });
        }
    });
}, { rootMargin: '-30% 0px -60% 0px' });
sections.forEach(s => observer.observe(s));
</script>
@endpush