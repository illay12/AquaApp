@extends('layouts.app')

@section('title', 'Structură Organizațională')

@section('page_hero')
    <h1><i class="bi bi-diagram-3 me-2"></i> Structură Organizațională</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/despre') }}">Despre noi</a></li>
            <li class="breadcrumb-item active">Structură Organizațională</li>
        </ol>
    </nav>
@endsection

@section('content')
<section style="padding:2.5rem 0 4rem;">
    <div class="container">

        <div class="row g-4">

            {{-- COLOANA PRINCIPALA --}}
            <div class="col-lg-8">

                {{-- CONDUCERE --}}
                <div class="mb-4">
                    <h2 class="section-title">Conducere</h2>
                    <div class="row g-3">
                        @php
                        $conducere = [
                            [
                                'functie' => 'Director General',
                                'nume'    => 'Valentin C. Ifrim',
                                'icon'    => 'bi-person-fill-gear',
                                'culoare' => '#023e8a',
                            ],
                            [
                                'functie' => 'Director Economic',
                                'nume'    => 'Selda Georgiana Matei',
                                'icon'    => 'bi-graph-up-arrow',
                                'culoare' => '#0077b6',
                            ],
                            [
                                'functie' => 'Inginer Șef',
                                'nume'    => 'George Ilie',
                                'icon'    => 'bi-wrench-adjustable-circle',
                                'culoare' => '#0096c7',
                            ],
                        ];
                        @endphp

                        @foreach($conducere as $p)
                        <div class="col-md-4">
                            <div style="background:#fff;border:1px solid var(--aqua-border);border-radius:14px;padding:1.5rem 1.25rem;text-align:center;height:100%;transition:box-shadow 0.2s,transform 0.2s;"
                                 onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 8px 24px rgba(0,119,182,0.12)'"
                                 onmouseout="this.style.transform='';this.style.boxShadow=''">
                                <div style="width:64px;height:64px;border-radius:50%;background:{{ $p['culoare'] }};display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;">
                                    <i class="bi {{ $p['icon'] }} text-white" style="font-size:1.5rem;"></i>
                                </div>
                                <div style="font-size:0.7rem;text-transform:uppercase;letter-spacing:0.07em;color:#94a3b8;font-weight:700;margin-bottom:0.35rem;">{{ $p['functie'] }}</div>
                                <div style="font-weight:800;font-size:0.95rem;color:var(--aqua-dark);">{{ $p['nume'] }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- ORGANIGRAMA --}}
                <div class="mb-4">
                    <h2 class="section-title">Organigrama</h2>
                    <p style="font-size:0.9rem;color:#6c757d;margin-bottom:1.25rem;">
                        Ultima variantă a organigramei S.C. AQUASERV S.A. Puteți studia în acest document schema structurilor funcționale ale companiei.
                    </p>

                    {{-- Organigrama curenta --}}
                    <div style="background:linear-gradient(135deg,#023e8a,#0077b6);border-radius:14px;padding:1.5rem;margin-bottom:1rem;display:flex;align-items:center;gap:1.25rem;">
                        <div style="width:52px;height:52px;min-width:52px;background:rgba(255,255,255,0.15);border-radius:12px;display:flex;align-items:center;justify-content:center;">
                            <i class="bi bi-file-earmark-pdf-fill text-white" style="font-size:1.5rem;"></i>
                        </div>
                        <div style="flex:1;">
                            <div style="font-size:0.7rem;color:rgba(255,255,255,0.7);text-transform:uppercase;letter-spacing:0.06em;font-weight:700;margin-bottom:0.2rem;">Document curent</div>
                            <div style="font-weight:800;color:#fff;font-size:0.95rem;">ORGANIGRAMA nr.566 / 23.09.2025</div>
                        </div>
                        <a href="https://www.aquaservtulcea.ro/wp-content/uploads/2025/11/ORGANIGRAMA-nr.566_23.09.2025.pdf"
                           target="_blank"
                           style="background:#fff;color:#023e8a;font-weight:700;font-size:0.82rem;padding:0.6rem 1.1rem;border-radius:8px;text-decoration:none;white-space:nowrap;flex-shrink:0;transition:background 0.2s;"
                           onmouseover="this.style.background='#e0f0ff'"
                           onmouseout="this.style.background='#fff'">
                            <i class="bi bi-download me-1"></i> Descarcă PDF
                        </a>
                    </div>

                    {{-- Organigrama veche --}}
                    <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:14px;padding:1.25rem;display:flex;align-items:center;gap:1.25rem;">
                        <div style="width:44px;height:44px;min-width:44px;background:#e2e8f0;border-radius:10px;display:flex;align-items:center;justify-content:center;">
                            <i class="bi bi-file-earmark-pdf" style="font-size:1.2rem;color:#94a3b8;"></i>
                        </div>
                        <div style="flex:1;">
                            <div style="font-size:0.68rem;color:#94a3b8;text-transform:uppercase;letter-spacing:0.06em;font-weight:700;margin-bottom:0.15rem;">Versiune anterioară</div>
                            <div style="font-weight:700;color:#64748b;font-size:0.875rem;">Organigrama nr.429 / 14.07.2025</div>
                        </div>
                        <a href="https://www.aquaservtulcea.ro/wp-content/uploads/2025/09/Organigrama-nr.429-14.07.2025.pdf"
                           target="_blank"
                           style="background:transparent;color:#64748b;font-weight:700;font-size:0.82rem;padding:0.55rem 1rem;border-radius:8px;text-decoration:none;border:1.5px solid #e2e8f0;white-space:nowrap;flex-shrink:0;transition:all 0.2s;"
                           onmouseover="this.style.borderColor='#94a3b8';this.style.color='#374151'"
                           onmouseout="this.style.borderColor='#e2e8f0';this.style.color='#64748b'">
                            <i class="bi bi-download me-1"></i> Descarcă PDF
                        </a>
                    </div>
                </div>

                {{-- DOCUMENTE STRATEGICE --}}
                <div>
                    <h2 class="section-title">Documente</h2>
                    <div class="d-flex flex-column gap-3">

                        @php
                        $documente = [
                            [
                                'titlu'    => 'Regulamentul serviciului de apă și canalizare',
                                'icon'     => 'bi-journal-text',
                                'culoare'  => '#0077b6',
                                'url'      => 'https://www.aquaservtulcea.ro/wp-content/uploads/2024/09/Regulamentul-serviciului-de-apa-si-canalizare-bun.pdf',
                                'desc'     => 'Regulamentul complet al serviciilor de apă și canalizare',
                            ],
                            [
                                'titlu'    => 'Plan Management 2020–2024',
                                'icon'     => 'bi-clipboard2-check',
                                'culoare'  => '#0096c7',
                                'url'      => 'https://www.aquaservtulcea.ro/wp-content/uploads/2021/01/PLAN-MANAGEMENT-2020-2024.pdf',
                                'desc'     => 'Planul de management al companiei pentru perioada 2020–2024',
                            ],
                            [
                                'titlu'    => 'Plan Administrare AQUASERV 2020–2024',
                                'icon'     => 'bi-building-gear',
                                'culoare'  => '#00b4d8',
                                'url'      => 'https://www.aquaservtulcea.ro/wp-content/uploads/2021/01/PLAN-ADMINISTRARE-AQUASERV-2020-2024.pdf',
                                'desc'     => 'Planul de administrare al S.C. AQUASERV S.A. pentru perioada 2020–2024',
                            ],
                        ];
                        @endphp

                        @foreach($documente as $doc)
                        <a href="{{ $doc['url'] }}" target="_blank" style="display:flex;align-items:center;gap:1rem;padding:1rem 1.25rem;background:#fff;border:1px solid var(--aqua-border);border-radius:12px;text-decoration:none;transition:all 0.2s;"
                           onmouseover="this.style.borderColor='{{ $doc['culoare'] }}';this.style.boxShadow='0 4px 16px rgba(0,119,182,0.1)';this.style.transform='translateX(4px)'"
                           onmouseout="this.style.borderColor='var(--aqua-border)';this.style.boxShadow='';this.style.transform=''">
                            <div style="width:44px;height:44px;min-width:44px;background:{{ $doc['culoare'] }};border-radius:10px;display:flex;align-items:center;justify-content:center;">
                                <i class="bi {{ $doc['icon'] }} text-white" style="font-size:1.1rem;"></i>
                            </div>
                            <div style="flex:1;min-width:0;">
                                <div style="font-weight:800;font-size:0.875rem;color:var(--aqua-dark);">{{ $doc['titlu'] }}</div>
                                <div style="font-size:0.75rem;color:#94a3b8;margin-top:2px;">{{ $doc['desc'] }}</div>
                            </div>
                            <div style="flex-shrink:0;">
                                <span style="background:var(--aqua-bg);color:{{ $doc['culoare'] }};font-size:0.75rem;font-weight:700;padding:0.35rem 0.75rem;border-radius:6px;border:1px solid var(--aqua-border);">
                                    <i class="bi bi-file-earmark-pdf me-1"></i>PDF
                                </span>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>

            </div>

            {{-- SIDEBAR --}}
            <div class="col-lg-4">

                {{-- Despre noi navigatie --}}
                <div style="background:#fff;border:1px solid var(--aqua-border);border-radius:14px;overflow:hidden;margin-bottom:1.5rem;position:sticky;top:80px;">
                    <div style="background:linear-gradient(90deg,#023e8a,#0077b6);padding:1rem 1.25rem;">
                        <div style="font-weight:800;color:#fff;font-size:0.9rem;">
                            <i class="bi bi-info-circle me-2"></i>Despre noi
                        </div>
                    </div>
                    <div style="padding:0.5rem 0;">
                        <a href="{{ url('/despre') }}"
                           style="display:flex;align-items:center;gap:0.75rem;padding:0.75rem 1.25rem;text-decoration:none;color:#374151;font-size:0.875rem;font-weight:600;border-left:3px solid transparent;transition:all 0.15s;"
                           onmouseover="this.style.background='var(--aqua-bg)';this.style.borderLeftColor='var(--aqua-primary)';this.style.color='var(--aqua-primary)'"
                           onmouseout="this.style.background='';this.style.borderLeftColor='transparent';this.style.color='#374151'">
                            <i class="bi bi-info-circle" style="color:var(--aqua-primary);width:16px;"></i> Despre noi
                        </a>
                        <a href="{{ url('/despre/centre-operationale') }}"
                           style="display:flex;align-items:center;gap:0.75rem;padding:0.75rem 1.25rem;text-decoration:none;color:#374151;font-size:0.875rem;font-weight:600;border-left:3px solid transparent;transition:all 0.15s;"
                           onmouseover="this.style.background='var(--aqua-bg)';this.style.borderLeftColor='var(--aqua-primary)';this.style.color='var(--aqua-primary)'"
                           onmouseout="this.style.background='';this.style.borderLeftColor='transparent';this.style.color='#374151'">
                            <i class="bi bi-building" style="color:var(--aqua-primary);width:16px;"></i> Centre Operaționale
                        </a>
                        <a href="{{ url('/despre/structura-organizationala') }}"
                           style="display:flex;align-items:center;gap:0.75rem;padding:0.75rem 1.25rem;text-decoration:none;font-size:0.875rem;font-weight:700;border-left:3px solid var(--aqua-primary);background:var(--aqua-bg);color:var(--aqua-primary);">
                            <i class="bi bi-diagram-3" style="color:var(--aqua-primary);width:16px;"></i> Structură Organizațională
                        </a>
                    </div>
                </div>

                {{-- Contact rapid --}}
                <div style="background:linear-gradient(135deg,#023e8a,#0077b6);border-radius:14px;padding:1.5rem;">
                    <div style="font-weight:800;color:#fff;font-size:0.9rem;margin-bottom:1rem;">
                        <i class="bi bi-telephone-fill me-2"></i>Contact
                    </div>
                    <div style="display:flex;flex-direction:column;gap:0.75rem;">
                        <a href="tel:0240524310" style="display:flex;align-items:center;gap:0.75rem;color:rgba(255,255,255,0.9);text-decoration:none;font-size:0.85rem;">
                            <div style="width:32px;height:32px;background:rgba(255,255,255,0.15);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="bi bi-telephone-fill text-white" style="font-size:0.85rem;"></i>
                            </div>
                            <div>
                                <div style="font-size:0.68rem;color:rgba(255,255,255,0.6);text-transform:uppercase;letter-spacing:0.05em;">Secretariat</div>
                                <div style="font-weight:700;">0240 524 310</div>
                            </div>
                        </a>
                        <a href="mailto:secretariat@aquaservtulcea.ro" style="display:flex;align-items:center;gap:0.75rem;color:rgba(255,255,255,0.9);text-decoration:none;font-size:0.85rem;">
                            <div style="width:32px;height:32px;background:rgba(255,255,255,0.15);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="bi bi-envelope-fill text-white" style="font-size:0.85rem;"></i>
                            </div>
                            <div>
                                <div style="font-size:0.68rem;color:rgba(255,255,255,0.6);text-transform:uppercase;letter-spacing:0.05em;">Email</div>
                                <div style="font-weight:700;font-size:0.8rem;">secretariat@aquaservtulcea.ro</div>
                            </div>
                        </a>
                        <div style="display:flex;align-items:center;gap:0.75rem;color:rgba(255,255,255,0.9);font-size:0.85rem;">
                            <div style="width:32px;height:32px;background:rgba(255,255,255,0.15);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="bi bi-clock-fill text-white" style="font-size:0.85rem;"></i>
                            </div>
                            <div>
                                <div style="font-size:0.68rem;color:rgba(255,255,255,0.6);text-transform:uppercase;letter-spacing:0.05em;">Program</div>
                                <div style="font-weight:700;">Lun–Vin: 08:00–16:30</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
@endsection
