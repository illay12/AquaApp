@extends('layouts.app')

@section('title', 'Politică Cookies')

@section('content')

    {{-- HERO --}}
    <section style="background:linear-gradient(135deg, #023e8a 0%, #0077b6 60%, #00b4d8 100%); color:#fff; padding:2rem 0 1.5rem; position:relative; overflow:hidden;">
        <div style="position:absolute;inset:0;background:url('data:image/svg+xml,%3Csvg width=\'80\' height=\'80\' viewBox=\'0 0 80 80\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.04\' fill-rule=\'evenodd\'%3E%3Ccircle cx=\'40\' cy=\'40\' r=\'8\'/%3E%3C/g%3E%3C/svg%3E');"></div>
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <span class="badge" style="background:rgba(255,255,255,0.18);color:#fff;font-size:0.78rem;font-weight:700;letter-spacing:0.08em;padding:0.45em 1em;border-radius:20px;margin-bottom:0.6rem;display:inline-block;">
                        <i class="bi bi-cookie me-1"></i> Directiva UE 2009/136/CE
                    </span>
                    <h1 style="font-family:'Merriweather',serif;font-size:clamp(1.35rem,5vw,2.1rem);font-weight:700;line-height:1.3;margin-bottom:0.8rem;">
                        Politică de utilizare
                        <span style="color:#90e0ef;display:block;">a cookie-urilor</span>
                    </h1>
                    <p style="font-size:clamp(0.85rem,3vw,1rem);opacity:0.9;max-width:580px;line-height:1.6;margin-bottom:0;">
                        Informații despre ce sunt cookie-urile, cum le folosim pe site-ul S.C. AQUASERV S.A.
                        și cum le puteți controla.
                    </p>
                </div>
                <div class="col-lg-4 d-none d-lg-flex justify-content-center">
                    <div style="width:180px;height:180px;background:rgba(255,255,255,0.1);border-radius:50%;display:flex;align-items:center;justify-content:center;border:2px solid rgba(255,255,255,0.2);">
                        <i class="bi bi-cookie" style="font-size:5rem;color:rgba(255,255,255,0.7);"></i>
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
                <span>Politică Cookies</span>
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
                        <a href="#ce-sunt" class="ck-nav-link"><i class="bi bi-question-circle"></i> Ce sunt cookie-urile</a>
                        <a href="#tipuri" class="ck-nav-link"><i class="bi bi-tags"></i> Tipuri de cookie-uri</a>
                        <a href="#folosim" class="ck-nav-link"><i class="bi bi-gear"></i> Cum le folosim</a>
                        <a href="#durata" class="ck-nav-link"><i class="bi bi-clock-history"></i> Durata de stocare</a>
                        <a href="#control" class="ck-nav-link"><i class="bi bi-sliders"></i> Controlul cookie-urilor</a>
                        <a href="#browser" class="ck-nav-link"><i class="bi bi-window"></i> Setări browser</a>
                        <a href="#contact" class="ck-nav-link"><i class="bi bi-envelope"></i> Contact</a>
                    </nav>
                </div>
            </div>
        </div>

        {{-- SECȚIUNI --}}
        <div class="col-lg-9">

            {{-- 1. CE SUNT --}}
            <div class="card mb-4 ck-card" id="ce-sunt">
                <div class="ck-card-head">
                    <div class="ck-icon"><i class="bi bi-question-circle"></i></div>
                    <h2 class="ck-card-title">Ce sunt cookie-urile?</h2>
                </div>
                <div class="card-body" style="font-size:0.9rem;color:#495057;line-height:1.8;">
                    <p>
                        Un <strong>cookie</strong> (cunoscut și ca „browser cookie" sau „HTTP cookie") este un fișier text de mici dimensiuni
                        pe care un site web îl stochează pe calculatorul sau dispozitivul dumneavoastră mobil atunci când vizitați acel site.
                    </p>
                    <p class="mb-0">
                        Cookie-urile permit site-ului să vă recunoască dispozitivul la vizite ulterioare, să rețină preferințele dumneavoastră
                        și să îmbunătățească experiența de navigare. Cookie-urile <strong>nu conțin viruși</strong> și nu pot accesa informații
                        de pe dispozitivul dumneavoastră.
                    </p>
                </div>
            </div>

            {{-- 2. TIPURI --}}
            <div class="card mb-4 ck-card" id="tipuri">
                <div class="ck-card-head">
                    <div class="ck-icon"><i class="bi bi-tags"></i></div>
                    <h2 class="ck-card-title">Tipuri de cookie-uri</h2>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="ck-type-card">
                                <div class="ck-type-icon" style="background:#e0f2fe;color:#0077b6;"><i class="bi bi-shield-check"></i></div>
                                <div class="ck-type-title">Cookie-uri strict necesare</div>
                                <div class="ck-type-desc">Esențiale pentru funcționarea corectă a site-ului (sesiune, autentificare, securitate). Nu pot fi dezactivate.</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="ck-type-card">
                                <div class="ck-type-icon" style="background:#fef3c7;color:#d97706;"><i class="bi bi-bar-chart-line"></i></div>
                                <div class="ck-type-title">Cookie-uri de performanță</div>
                                <div class="ck-type-desc">Colectează informații anonime despre modul de utilizare a site-ului, pentru îmbunătățirea acestuia.</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="ck-type-card">
                                <div class="ck-type-icon" style="background:#d1fae5;color:#059669;"><i class="bi bi-sliders2"></i></div>
                                <div class="ck-type-title">Cookie-uri de funcționalitate</div>
                                <div class="ck-type-desc">Rețin preferințele dumneavoastră (ex. acceptarea cookie-urilor) pentru a personaliza experiența.</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="ck-type-card">
                                <div class="ck-type-icon" style="background:#fce7f3;color:#db2777;"><i class="bi bi-megaphone"></i></div>
                                <div class="ck-type-title">Cookie-uri de marketing</div>
                                <div class="ck-type-desc">Utilizate pentru a livra conținut relevant și reclame personalizate. În prezent <strong>nu folosim</strong> astfel de cookie-uri.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 3. CUM LE FOLOSIM --}}
            <div class="card mb-4 ck-card" id="folosim">
                <div class="ck-card-head">
                    <div class="ck-icon"><i class="bi bi-gear"></i></div>
                    <h2 class="ck-card-title">Cum folosim cookie-urile pe site-ul nostru</h2>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column gap-2">
                        <div class="check-row">
                            <i class="bi bi-check-circle-fill"></i>
                            <span><strong>Sesiune și autentificare</strong> — menținerea sesiunii active în zona clientului (<code>/client</code>) și a dispeceratului (<code>/dispecerat</code>).</span>
                        </div>
                        <div class="check-row">
                            <i class="bi bi-check-circle-fill"></i>
                            <span><strong>Preferința privind cookie-urile</strong> — stocăm alegerea dumneavoastră (acceptat/refuzat) din bannerul de consimțământ.</span>
                        </div>
                        <div class="check-row">
                            <i class="bi bi-check-circle-fill"></i>
                            <span><strong>Securitate CSRF</strong> — token-uri de protecție împotriva atacurilor cross-site, generate de framework-ul aplicației.</span>
                        </div>
                        <div class="check-row">
                            <i class="bi bi-check-circle-fill"></i>
                            <span><strong>Funcționalitate formular</strong> — reținerea temporară a datelor introduse în formulare pentru a evita pierderea informațiilor.</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 4. DURATA --}}
            <div class="card mb-4 ck-card" id="durata">
                <div class="ck-card-head">
                    <div class="ck-icon"><i class="bi bi-clock-history"></i></div>
                    <h2 class="ck-card-title">Durata de stocare</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm" style="font-size:0.85rem;">
                            <thead style="background:var(--aqua-bg);">
                                <tr>
                                    <th style="color:var(--aqua-dark);font-weight:700;border-color:var(--aqua-border);">Nume cookie</th>
                                    <th style="color:var(--aqua-dark);font-weight:700;border-color:var(--aqua-border);">Tip</th>
                                    <th style="color:var(--aqua-dark);font-weight:700;border-color:var(--aqua-border);">Durată</th>
                                    <th style="color:var(--aqua-dark);font-weight:700;border-color:var(--aqua-border);">Scop</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><code>aquaapp_session</code></td>
                                    <td><span class="badge" style="background:#e0f2fe;color:#0077b6;">Necesar</span></td>
                                    <td>Sesiune</td>
                                    <td>Sesiunea utilizatorului</td>
                                </tr>
                                <tr>
                                    <td><code>XSRF-TOKEN</code></td>
                                    <td><span class="badge" style="background:#e0f2fe;color:#0077b6;">Necesar</span></td>
                                    <td>Sesiune</td>
                                    <td>Protecție CSRF</td>
                                </tr>
                                <tr>
                                    <td><code>cookies_accepted</code></td>
                                    <td><span class="badge" style="background:#d1fae5;color:#059669;">Funcțional</span></td>
                                    <td>1 an</td>
                                    <td>Preferința banner cookies</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- 5. CONTROL --}}
            <div class="card mb-4 ck-card" id="control">
                <div class="ck-card-head">
                    <div class="ck-icon"><i class="bi bi-sliders"></i></div>
                    <h2 class="ck-card-title">Controlul cookie-urilor</h2>
                </div>
                <div class="card-body" style="font-size:0.9rem;color:#495057;line-height:1.8;">
                    <p>
                        Aveți dreptul de a accepta sau refuza cookie-urile non-esențiale. La prima vizită pe site,
                        vi se afișează un banner prin care vă puteți exprima consimțământul.
                    </p>
                    <p class="mb-0">
                        Refuzarea cookie-urilor de performanță sau funcționalitate <strong>nu afectează</strong> posibilitatea
                        de a naviga pe site, însă unele funcționalități (ex. menținerea sesiunii de autentificare) necesită
                        cookie-uri strict necesare și nu pot funcționa fără acestea.
                    </p>
                </div>
            </div>

            {{-- 6. SETĂRI BROWSER --}}
            <div class="card mb-4 ck-card" id="browser">
                <div class="ck-card-head">
                    <div class="ck-icon"><i class="bi bi-window"></i></div>
                    <h2 class="ck-card-title">Dezactivarea din setările browser-ului</h2>
                </div>
                <div class="card-body">
                    <p style="font-size:0.9rem;color:#495057;margin-bottom:1rem;">
                        Puteți controla și/sau șterge cookie-urile direct din browser. Consultați instrucțiunile pentru browser-ul dumneavoastră:
                    </p>
                    <div class="row g-2">
                        <div class="col-6 col-sm-4 col-md-3">
                            <a href="https://support.google.com/chrome/answer/95647" target="_blank" rel="noopener noreferrer" class="ck-browser-btn">
                                <i class="bi bi-browser-chrome"></i>
                                <span>Chrome</span>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <a href="https://support.mozilla.org/ro/kb/activarea-si-dezactivarea-cookie-urilor" target="_blank" rel="noopener noreferrer" class="ck-browser-btn">
                                <i class="bi bi-browser-firefox"></i>
                                <span>Firefox</span>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <a href="https://support.microsoft.com/ro-ro/windows/stergerea-si-gestionarea-cookie-urilor-168dab11-0753-043d-7c16-ede5947fc64d" target="_blank" rel="noopener noreferrer" class="ck-browser-btn">
                                <i class="bi bi-browser-edge"></i>
                                <span>Edge</span>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <a href="https://support.apple.com/ro-ro/guide/safari/sfri11471/mac" target="_blank" rel="noopener noreferrer" class="ck-browser-btn">
                                <i class="bi bi-browser-safari"></i>
                                <span>Safari</span>
                            </a>
                        </div>
                    </div>
                    <div class="mt-3 p-3" style="background:#fff8e1;border:1px solid #ffe082;border-radius:8px;font-size:0.82rem;color:#795548;">
                        <i class="bi bi-info-circle-fill me-2" style="color:#f59e0b;"></i>
                        <strong>Atenție:</strong> dezactivarea tuturor cookie-urilor poate afecta funcționarea corectă a site-ului
                        și vă poate împiedica să utilizați zona clientului sau alte funcționalități interactive.
                    </div>
                </div>
            </div>

            {{-- 7. CONTACT --}}
            <div class="card" id="contact">
                <div class="card-body" style="background:linear-gradient(90deg,#023e8a,#0077b6);border-radius:12px;padding:1.75rem;">
                    <div class="row align-items-center g-3">
                        <div class="col-auto">
                            <div style="width:56px;height:56px;background:rgba(255,255,255,0.15);border-radius:50%;display:flex;align-items:center;justify-content:center;border:2px solid rgba(255,255,255,0.3);">
                                <i class="bi bi-envelope-fill" style="font-size:1.5rem;color:#fff;"></i>
                            </div>
                        </div>
                        <div class="col">
                            <div style="font-size:0.72rem;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;color:rgba(255,255,255,0.6);margin-bottom:0.25rem;">Întrebări despre cookie-uri?</div>
                            <div style="font-family:'Merriweather',serif;font-size:1rem;font-weight:700;color:#fff;margin-bottom:0.75rem;">Ne puteți contacta oricând</div>
                            <div class="d-flex flex-wrap gap-2">
                                <a href="mailto:office@aquaservtulcea.ro" style="display:inline-flex;align-items:center;gap:0.4rem;background:rgba(255,255,255,0.15);border:1px solid rgba(255,255,255,0.25);border-radius:20px;padding:0.35rem 0.9rem;color:#fff;text-decoration:none;font-size:0.82rem;">
                                    <i class="bi bi-envelope-fill"></i> office@aquaservtulcea.ro
                                </a>
                                <a href="{{ url('/contact') }}" style="display:inline-flex;align-items:center;gap:0.4rem;background:rgba(255,255,255,0.15);border:1px solid rgba(255,255,255,0.25);border-radius:20px;padding:0.35rem 0.9rem;color:#fff;text-decoration:none;font-size:0.82rem;">
                                    <i class="bi bi-arrow-right-circle-fill"></i> Formular contact
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </section>

@endsection

@push('styles')
<style>
    .ck-card { border-color: var(--aqua-border) !important; border-radius: 12px !important; }
    .ck-card-head { display:flex; align-items:center; gap:0.85rem; padding:1rem 1.25rem; background:var(--aqua-bg); border-bottom:1px solid var(--aqua-border); border-radius:12px 12px 0 0; }
    .ck-icon { width:36px; height:36px; min-width:36px; background:var(--aqua-primary); border-radius:8px; display:flex; align-items:center; justify-content:center; color:#fff; font-size:1rem; }
    .ck-card-title { font-family:'Merriweather',serif; font-size:0.95rem; font-weight:700; color:var(--aqua-dark); margin:0; }
    .ck-nav-link { display:flex; align-items:center; gap:0.6rem; padding:0.5rem 1.25rem; font-size:0.82rem; font-weight:500; color:#495057; text-decoration:none; transition:all 0.2s; border-left:3px solid transparent; }
    .ck-nav-link:hover, .ck-nav-link.active { color:var(--aqua-primary); background:var(--aqua-bg); border-left-color:var(--aqua-primary); font-weight:600; }
    .ck-nav-link i { font-size:0.85rem; width:16px; flex-shrink:0; }
    .check-row { display:flex; align-items:flex-start; gap:0.75rem; padding:0.75rem 1rem; background:var(--aqua-bg); border:1px solid var(--aqua-border); border-radius:8px; font-size:0.875rem; color:#495057; line-height:1.6; }
    .check-row i { color:var(--aqua-primary); margin-top:2px; flex-shrink:0; }
    .ck-type-card { padding:1rem; background:#fff; border:1px solid var(--aqua-border); border-radius:10px; height:100%; transition:border-color 0.2s,background 0.2s; }
    .ck-type-card:hover { border-color:var(--aqua-primary); background:var(--aqua-bg); }
    .ck-type-icon { width:44px; height:44px; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:1.2rem; margin-bottom:0.75rem; }
    .ck-type-title { font-size:0.85rem; font-weight:700; color:var(--aqua-dark); margin-bottom:0.35rem; }
    .ck-type-desc { font-size:0.78rem; color:#6c757d; line-height:1.5; }
    .ck-browser-btn { display:flex; flex-direction:column; align-items:center; justify-content:center; gap:0.4rem; padding:0.85rem 0.5rem; background:#fff; border:1px solid var(--aqua-border); border-radius:10px; text-decoration:none; color:var(--aqua-dark); font-size:0.78rem; font-weight:600; transition:all 0.2s; text-align:center; }
    .ck-browser-btn:hover { border-color:var(--aqua-primary); background:var(--aqua-bg); color:var(--aqua-primary); }
    .ck-browser-btn i { font-size:1.5rem; }
    @media (max-width: 575px) {
        .ck-card-head { flex-wrap:wrap; }
        .table-responsive { font-size:0.78rem; }
        .table-responsive thead th:last-child,
        .table-responsive tbody td:last-child { display:none; }
    }
</style>
@endpush

@push('scripts')
<script>
const ckSections = document.querySelectorAll('[id]');
const ckNavLinks = document.querySelectorAll('.ck-nav-link');
const ckObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            ckNavLinks.forEach(link => {
                link.classList.toggle('active', link.getAttribute('href') === '#' + entry.target.id);
            });
        }
    });
}, { rootMargin: '-30% 0px -60% 0px' });
ckSections.forEach(s => ckObserver.observe(s));
</script>
@endpush
