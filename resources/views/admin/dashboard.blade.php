<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin – AquaServ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root { --aqua: #0077b6; --aqua-dark: #023e8a; }
        body { background:#f0f4f8; min-height:100vh; }
        .sidebar {
            width:240px; min-height:100vh;
            background:linear-gradient(180deg, var(--aqua-dark) 0%, var(--aqua) 100%);
            position:fixed; top:0; left:0; padding:1.5rem 0; z-index:100;
        }
        .sidebar-brand { padding:0 1.25rem 1.5rem; border-bottom:1px solid rgba(255,255,255,0.15); margin-bottom:1rem; }
        .sidebar-brand h5 { color:#fff; font-weight:800; margin:0; font-size:0.95rem; }
        .sidebar-brand small { color:rgba(255,255,255,0.6); font-size:0.75rem; }
        .nav-item a {
            display:flex; align-items:center; gap:0.6rem;
            padding:0.65rem 1.25rem; color:rgba(255,255,255,0.75);
            text-decoration:none; font-size:0.875rem; font-weight:600;
            transition:all 0.2s; border-left:3px solid transparent;
        }
        .nav-item a:hover, .nav-item a.activ { color:#fff; background:rgba(255,255,255,0.12); border-left-color:#90e0ef; }
        .nav-item a i { font-size:1rem; width:20px; text-align:center; }
        .main { margin-left:240px; padding:2rem; }
        .topbar { display:flex; align-items:center; justify-content:space-between; margin-bottom:2rem; }
        .stat-card { background:#fff; border-radius:14px; padding:1.25rem 1.5rem; box-shadow:0 2px 12px rgba(0,0,0,0.06); border:1px solid #e2e8f0; }
        .stat-card .val { font-size:2rem; font-weight:800; color:var(--aqua); }
        .stat-card .lbl { font-size:0.78rem; color:#6c757d; text-transform:uppercase; letter-spacing:0.05em; }
        .section-card { background:#fff; border-radius:14px; box-shadow:0 2px 12px rgba(0,0,0,0.06); border:1px solid #e2e8f0; overflow:hidden; }
        .section-header { padding:1rem 1.5rem; border-bottom:1px solid #e2e8f0; display:flex; align-items:center; gap:0.6rem; }
        .section-header h6 { margin:0; font-weight:800; color:var(--aqua-dark); font-size:0.95rem; }
        .section-body { padding:1.5rem; }

        /* ── Mobile ── */
        .sidebar-overlay {
            display:none; position:fixed; inset:0;
            background:rgba(0,0,0,0.45); z-index:1040;
        }
        .sidebar-overlay.show { display:block; }
        .btn-hamburger {
            display:none; background:none; border:none;
            font-size:1.4rem; color:#0f172a; padding:0.25rem 0.5rem;
            line-height:1; cursor:pointer;
        }
        @media (max-width:991.98px) {
            .sidebar {
                transform:translateX(-100%);
                transition:transform 0.28s ease;
                z-index:1050;
            }
            .sidebar.sidebar-open { transform:translateX(0); }
            .main { margin-left:0 !important; padding:1rem; }
            .topbar {
                position:sticky; top:0;
                background:#f0f4f8; z-index:200;
                padding-bottom:0.75rem;
                border-bottom:1px solid #e2e8f0;
                margin-bottom:1.25rem !important;
            }
            .btn-hamburger { display:inline-flex; align-items:center; }
            .stat-card .val { font-size:1.6rem; }
            .section-body { padding:1rem; }
            .section-header { padding:0.75rem 1rem; }
        }
    </style>
</head>
<body>

{{-- Overlay mobil --}}
<div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

{{-- SIDEBAR --}}
<div class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div style="display:flex;align-items:center;gap:0.6rem;margin-bottom:0.25rem;">
            <div style="width:32px;height:32px;background:rgba(255,255,255,0.2);border-radius:8px;display:flex;align-items:center;justify-content:center;">
                <i class="bi bi-droplet-fill" style="color:#fff;font-size:1rem;"></i>
            </div>
            <h5>AquaServ Admin</h5>
        </div>
        <small>{{ Auth::user()->nume ?? Auth::user()->username }}</small>
    </div>
    <ul class="list-unstyled mb-0">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="activ">
                <i class="bi bi-grid-fill"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="#sectiuneExport" onclick="document.getElementById('sectiuneExport').scrollIntoView({behavior:'smooth'});return false;">
                <i class="bi bi-file-earmark-arrow-down"></i> Export Indecși
            </a>
        </li>
        <li class="nav-item">
            <a href="#sectiuneSincronizare" onclick="document.getElementById('sectiuneSincronizare').scrollIntoView({behavior:'smooth'});return false;">
                <i class="bi bi-arrow-repeat"></i> Sincronizare Lunară
            </a>
        </li>
        <li class="nav-item">
            <a href="#sectiuneCompara" onclick="document.getElementById('sectiuneCompara').scrollIntoView({behavior:'smooth'});return false;">
                <i class="bi bi-subtract"></i> Compară Exporturi
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.documente.index') }}">
                <i class="bi bi-folder2-open"></i> Documente Publice
            </a>
        </li>
    </ul>
    <div style="position:absolute;bottom:1.5rem;left:0;right:0;padding:0 1.25rem;">
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="btn w-100"
                    style="background:rgba(255,255,255,0.1);color:rgba(255,255,255,0.8);border:1px solid rgba(255,255,255,0.2);border-radius:8px;font-size:0.82rem;padding:0.5rem;">
                <i class="bi bi-box-arrow-left me-1"></i> Deconectare
            </button>
        </form>
    </div>
</div>

{{-- MAIN --}}
<div class="main">

    {{-- TOPBAR --}}
    <div class="topbar">
        <div class="d-flex align-items-center gap-2">
            <button class="btn-hamburger" onclick="openSidebar()" aria-label="Meniu">
                <i class="bi bi-list"></i>
            </button>
            <div>
                <h4 style="font-weight:800;color:#0f172a;margin:0;">Dashboard</h4>
                <p style="color:#6c757d;font-size:0.82rem;margin:0;">
                    {{ now()->locale('ro')->isoFormat('dddd, D MMMM YYYY') }}
                </p>
            </div>
        </div>
        <div style="font-size:0.82rem;color:#6c757d;">
            <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->username }}
        </div>
    </div>

    {{-- STATISTICI --}}
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="stat-card">
                <div class="lbl mb-1">Indecși trimiși luna aceasta</div>
                <div class="val">{{ $totalIndecsiLuna }}</div>
                <div style="font-size:0.75rem;color:#6c757d;margin-top:0.25rem;">
                    {{ $lunaCurenta->locale('ro')->isoFormat('MMMM YYYY') }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <div class="lbl mb-1">Total contoare înregistrate</div>
                <div class="val">{{ $totalContoare }}</div>
                <div style="font-size:0.75rem;color:#6c757d;margin-top:0.25rem;">în baza de date</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <div class="lbl mb-1">Perioadă citire curentă</div>
                <div class="val" style="font-size:1.4rem;">
                    @if(now()->day >= 10 && now()->day <= 20)
                        <span style="color:#16a34a;">Activă</span>
                    @else
                        <span style="color:#dc2626;">Închisă</span>
                    @endif
                </div>
                <div style="font-size:0.75rem;color:#6c757d;margin-top:0.25rem;">10–20 ale lunii</div>
            </div>
        </div>
    </div>

    {{-- EXPORT INDECȘI --}}
    <div class="section-card mb-4" id="sectiuneExport">
        <div class="section-header">
            <i class="bi bi-file-earmark-spreadsheet" style="color:#0077b6;font-size:1.1rem;"></i>
            <h6>Export Indecși Contoare</h6>
        </div>
        <div class="section-body">
            <p style="font-size:0.85rem;color:#6c757d;margin-bottom:1.25rem;">
                Exportă toți contorii pentru care a fost transmis un index nou în luna selectată.
            </p>
            <form method="GET" action="{{ route('admin.export.indecsi') }}" class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label fw-bold" style="font-size:0.82rem;">Lună</label>
                    <select name="luna" class="form-select">
                        @foreach(range(1, 12) as $l)
                            <option value="{{ $l }}" {{ $l == now()->month ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::createFromDate(null, $l, 1)->locale('ro')->isoFormat('MMMM') }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-bold" style="font-size:0.82rem;">An</label>
                    <select name="an" class="form-select">
                        @foreach(range(now()->year, 2024, -1) as $a)
                            <option value="{{ $a }}" {{ $a == now()->year ? 'selected' : '' }}>{{ $a }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold" style="font-size:0.82rem;">Format</label>
                    <div class="d-flex gap-3 pt-1">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="format" id="formatCsv" value="csv" checked>
                            <label class="form-check-label fw-bold" for="formatCsv" style="font-size:0.85rem;">
                                <i class="bi bi-filetype-csv me-1" style="color:#16a34a;"></i>CSV
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="format" id="formatXlsx" value="xlsx">
                            <label class="form-check-label fw-bold" for="formatXlsx" style="font-size:0.85rem;">
                                <i class="bi bi-file-earmark-excel me-1" style="color:#16a34a;"></i>XLSX
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn w-100 fw-bold"
                            style="background:#0077b6;color:#fff;border-radius:8px;padding:0.65rem;">
                        <i class="bi bi-download me-2"></i>Descarcă
                    </button>
                </div>
                <div class="col-12">
                    <div style="background:#f0f9ff;border:1px solid #bae6fd;border-radius:8px;padding:0.6rem 1rem;font-size:0.78rem;color:#0369a1;">
                        <i class="bi bi-info-circle me-1"></i>
                        CSV folosește <strong>virgulă (,)</strong> ca separator, UTF-8 cu BOM pentru Excel.
                        XLSX se deschide direct în Excel cu formatare.
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- SINCRONIZARE LUNARĂ --}}
    <div class="section-card mt-4" id="sectiuneSincronizare">
        <div class="section-header">
            <i class="bi bi-arrow-repeat" style="color:#0077b6;font-size:1.1rem;"></i>
            <h6>Sincronizare Lunară Contoare</h6>
        </div>
        <div class="section-body">

            @if(session('sync_stats'))
            @php $st = session('sync_stats'); @endphp
            {{-- Raport sincronizare --}}
            <div style="border:1.5px solid {{ session('sync_tip') === 'success' ? '#86efac' : '#fde68a' }};border-radius:12px;overflow:hidden;margin-bottom:1.5rem;">
                {{-- Header raport --}}
                <div style="background:{{ session('sync_tip') === 'success' ? '#f0fdf4' : '#fffbeb' }};padding:0.75rem 1.25rem;border-bottom:1px solid {{ session('sync_tip') === 'success' ? '#86efac' : '#fde68a' }};display:flex;align-items:center;gap:0.6rem;">
                    <i class="bi bi-{{ session('sync_tip') === 'success' ? 'check-circle-fill' : 'exclamation-triangle-fill' }}"
                       style="color:{{ session('sync_tip') === 'success' ? '#16a34a' : '#d97706' }};font-size:1.1rem;"></i>
                    <strong style="font-size:0.9rem;color:{{ session('sync_tip') === 'success' ? '#15803d' : '#92400e' }};">
                        Raport sincronizare — {{ now()->format('d.m.Y H:i') }}
                    </strong>
                </div>
                {{-- Statistici --}}
                <div style="padding:1rem 1.25rem;background:#fff;">
                    <div style="display:flex;flex-wrap:wrap;gap:0.75rem;margin-bottom:{{ ($st['sterse'] > 0 || $st['erori'] > 0) ? '1rem' : '0' }};">
                        <div style="display:flex;align-items:center;gap:0.5rem;background:#f0fdf4;border:1px solid #bbf7d0;border-radius:8px;padding:0.5rem 1rem;min-width:140px;">
                            <i class="bi bi-plus-circle-fill" style="color:#16a34a;font-size:1.1rem;"></i>
                            <div>
                                <div style="font-size:1.4rem;font-weight:800;color:#15803d;line-height:1;">{{ $st['noi'] }}</div>
                                <div style="font-size:0.72rem;color:#166534;font-weight:600;text-transform:uppercase;">Contoare noi</div>
                            </div>
                        </div>
                        <div style="display:flex;align-items:center;gap:0.5rem;background:#eff6ff;border:1px solid #bfdbfe;border-radius:8px;padding:0.5rem 1rem;min-width:140px;">
                            <i class="bi bi-arrow-repeat" style="color:#2563eb;font-size:1.1rem;"></i>
                            <div>
                                <div style="font-size:1.4rem;font-weight:800;color:#1d4ed8;line-height:1;">{{ $st['actualizate'] }}</div>
                                <div style="font-size:0.72rem;color:#1e40af;font-weight:600;text-transform:uppercase;">Actualizate</div>
                            </div>
                        </div>
                        @if($st['sterse'] > 0)
                        <div style="display:flex;align-items:center;gap:0.5rem;background:#fef2f2;border:1px solid #fca5a5;border-radius:8px;padding:0.5rem 1rem;min-width:140px;">
                            <i class="bi bi-trash3-fill" style="color:#dc2626;font-size:1.1rem;"></i>
                            <div>
                                <div style="font-size:1.4rem;font-weight:800;color:#dc2626;line-height:1;">{{ $st['sterse'] }}</div>
                                <div style="font-size:0.72rem;color:#991b1b;font-weight:600;text-transform:uppercase;">Șterse</div>
                            </div>
                        </div>
                        @endif
                        <div style="display:flex;align-items:center;gap:0.5rem;background:#f0f9ff;border:1px solid #bae6fd;border-radius:8px;padding:0.5rem 1rem;min-width:140px;">
                            <i class="bi bi-person-plus-fill" style="color:#0284c7;font-size:1.1rem;"></i>
                            <div>
                                <div style="font-size:1.4rem;font-weight:800;color:#0369a1;line-height:1;">{{ $st['clienti_noi'] }}</div>
                                <div style="font-size:0.72rem;color:#075985;font-weight:600;text-transform:uppercase;">Clienți noi</div>
                            </div>
                        </div>
                        @if(($st['clienti_stersi'] ?? 0) > 0)
                        <div style="display:flex;align-items:center;gap:0.5rem;background:#fef2f2;border:1px solid #fca5a5;border-radius:8px;padding:0.5rem 1rem;min-width:140px;">
                            <i class="bi bi-person-dash-fill" style="color:#dc2626;font-size:1.1rem;"></i>
                            <div>
                                <div style="font-size:1.4rem;font-weight:800;color:#dc2626;line-height:1;">{{ $st['clienti_stersi'] }}</div>
                                <div style="font-size:0.72rem;color:#991b1b;font-weight:600;text-transform:uppercase;">Clienți șterși</div>
                            </div>
                        </div>
                        @endif
                        @if($st['duplicate'] > 0)
                        <div style="display:flex;align-items:center;gap:0.5rem;background:#fffbeb;border:1px solid #fde68a;border-radius:8px;padding:0.5rem 1rem;min-width:140px;">
                            <i class="bi bi-exclamation-triangle-fill" style="color:#d97706;font-size:1.1rem;"></i>
                            <div>
                                <div style="font-size:1.4rem;font-weight:800;color:#d97706;line-height:1;">{{ $st['duplicate'] }}</div>
                                <div style="font-size:0.72rem;color:#92400e;font-weight:600;text-transform:uppercase;">Duplicate</div>
                            </div>
                        </div>
                        @endif
                        @if($st['erori'] > 0)
                        <div style="display:flex;align-items:center;gap:0.5rem;background:#fef2f2;border:1px solid #fca5a5;border-radius:8px;padding:0.5rem 1rem;min-width:140px;">
                            <i class="bi bi-x-octagon-fill" style="color:#dc2626;font-size:1.1rem;"></i>
                            <div>
                                <div style="font-size:1.4rem;font-weight:800;color:#dc2626;line-height:1;">{{ $st['erori'] }}</div>
                                <div style="font-size:0.72rem;color:#991b1b;font-weight:600;text-transform:uppercase;">Erori format</div>
                            </div>
                        </div>
                        @endif
                    </div>

                    @if(session('sync_sterse') && count(session('sync_sterse')) > 0)
                    <div style="background:#fef2f2;border:1px solid #fca5a5;border-radius:8px;overflow:hidden;margin-bottom:0.75rem;">
                        <div style="padding:0.5rem 0.75rem;border-bottom:1px solid #fca5a5;display:flex;align-items:center;gap:0.4rem;">
                            <i class="bi bi-trash3" style="color:#dc2626;font-size:0.85rem;"></i>
                            <strong style="font-size:0.78rem;color:#991b1b;">Contoare scoase din uz ({{ count(session('sync_sterse')) }}):</strong>
                        </div>
                        <div style="padding:0.5rem 0.75rem;display:flex;flex-wrap:wrap;gap:0.35rem;">
                            @foreach(array_slice(session('sync_sterse'), 0, 30) as $serie)
                            <span style="font-size:0.72rem;font-family:monospace;background:#fff;border:1px solid #fca5a5;border-radius:4px;padding:0.15rem 0.45rem;color:#7f1d1d;">{{ $serie }}</span>
                            @endforeach
                            @if(count(session('sync_sterse')) > 30)
                            <span style="font-size:0.72rem;color:#7f1d1d;font-style:italic;">... și încă {{ count(session('sync_sterse')) - 30 }} serii</span>
                            @endif
                        </div>
                    </div>
                    @endif

                    @if(session('sync_erori') && count(session('sync_erori')) > 0)
                    <div style="background:#fff;border:1px solid #fca5a5;border-radius:8px;overflow:hidden;">
                        <div style="background:#fef2f2;padding:0.5rem 0.75rem;border-bottom:1px solid #fca5a5;display:flex;align-items:center;gap:0.4rem;">
                            <i class="bi bi-bug-fill" style="color:#dc2626;font-size:0.85rem;"></i>
                            <strong style="font-size:0.78rem;color:#dc2626;">{{ count(session('sync_erori')) }} erori de format detectate</strong>
                        </div>
                        <div style="max-height:180px;overflow-y:auto;padding:0.5rem 0.75rem;">
                            @foreach(session('sync_erori') as $eroare)
                            <div style="font-size:0.75rem;font-family:monospace;color:#7f1d1d;padding:0.2rem 0;border-bottom:1px solid #fee2e2;">
                                <i class="bi bi-x-circle me-1" style="color:#dc2626;"></i>{{ $eroare }}
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            <p style="font-size:0.85rem;color:#6c757d;margin-bottom:1.25rem;">
                Încarcă fișierul CSV lunar cu datele contorelor și clienților.
                Contoarele și clienții noi vor fi <strong>adăugați</strong> automat,
                cei existenți vor avea <strong>index_vechi actualizat</strong> și <strong>index_nou resetat la null</strong>.
            </p>

            <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:1rem;margin-bottom:1.5rem;font-size:0.82rem;">
                <div style="font-weight:700;color:#0f172a;margin-bottom:0.5rem;">
                    <i class="bi bi-table me-1" style="color:#0077b6;"></i>Format așteptat CSV:
                </div>
                <code style="background:#fff;border:1px solid #e2e8f0;border-radius:6px;padding:0.4rem 0.75rem;display:inline-block;color:#0369a1;">
                    serie_contor,index_vechi,adresa,cod_client,nume<br>
                    MBR-2021-00123,1650,Str. Pacii nr. 5,100001,Ion Popescu<br>
                    ITR-2021-00654,720,Str. Libertatii nr. 12,100002,Maria Ionescu
                </code>
                <div style="color:#6c757d;margin-top:0.5rem;">
                    Separator: <strong>,</strong> &nbsp;·&nbsp;
                    Prima linie = header &nbsp;·&nbsp;
                    Encoding: UTF-8
                </div>
            </div>

            <form method="POST" action="{{ route('admin.sincronizare') }}" enctype="multipart/form-data" class="row g-3 align-items-end">
                @csrf
                <div class="col-md-5">
                    <label class="form-label fw-bold" style="font-size:0.82rem;">Fișier CSV lunar</label>
                    <input type="file" name="fisier_sync" class="form-control @error('fisier_sync') is-invalid @enderror" accept=".csv,.txt">
                    @error('fisier_sync')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn w-100 fw-bold"
                            style="background:#0077b6;color:#fff;border-radius:8px;padding:0.65rem;"
                            onclick="return confirm('Ești sigur? Această operațiune va adăuga/actualiza contoare și clienți și va reseta index_nou pentru toate înregistrările din fișier.')">
                        <i class="bi bi-arrow-repeat me-2"></i>Sincronizează
                    </button>
                </div>
                <div class="col-12">
                    <div style="background:#fff8ed;border:1px solid #fde68a;border-radius:8px;padding:0.6rem 1rem;font-size:0.78rem;color:#92400e;">
                        <i class="bi bi-exclamation-triangle me-1"></i>
                        <strong>Atenție:</strong> Contoarele care <strong>nu există în fișier</strong> vor fi <strong>șterse</strong> din baza de date (scoase din uz). Verificați fișierul înainte de import.
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- COMPARARE EXPORTURI --}}
    <div class="section-card mt-4" id="sectiuneCompara">
        <div class="section-header">
            <i class="bi bi-subtract" style="color:#0077b6;font-size:1.1rem;"></i>
            <h6>Comparare Index Vechi</h6>
        </div>
        <div class="section-body">

            <p style="font-size:0.85rem;color:#6c757d;margin-bottom:1.25rem;">
                Compară <strong>fișierul de sincronizare lunară</strong> cu un <strong>export din dashboard</strong>
                și obții doar contorii la care <strong>index_vechi diferă</strong> între cele două fișiere.
            </p>

            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <div style="background:#f0f9ff;border:1px solid #bae6fd;border-radius:8px;padding:0.75rem 1rem;font-size:0.8rem;">
                        <div style="font-weight:700;color:#0369a1;margin-bottom:0.25rem;"><i class="bi bi-1-circle me-1"></i>Fișier sincronizare lunară</div>
                        <code style="color:#0369a1;">serie_contor, INDEX_VECHI, adresa, COD_CLIENT, NUME</code>
                    </div>
                </div>
                <div class="col-md-6">
                    <div style="background:#f0fdf4;border:1px solid #bbf7d0;border-radius:8px;padding:0.75rem 1rem;font-size:0.8rem;">
                        <div style="font-weight:700;color:#15803d;margin-bottom:0.25rem;"><i class="bi bi-2-circle me-1"></i>Fișier export din dashboard</div>
                        <code style="color:#15803d;">Cod Client, Nume, Telefon, Email, Serie Contor, Adresa, Index Vechi, Index Nou, Data</code>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('admin.compara') }}" enctype="multipart/form-data" class="row g-3 align-items-end">
                @csrf

                <div class="col-md-4">
                    <label class="form-label fw-bold" style="font-size:0.82rem;">
                        <i class="bi bi-file-earmark-text me-1" style="color:#0077b6;"></i>Fișier sincronizare lunară
                    </label>
                    <input type="file" name="fisier_sync" class="form-control @error('fisier_sync') is-invalid @enderror" accept=".csv,.txt">
                    @error('fisier_sync')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-bold" style="font-size:0.82rem;">
                        <i class="bi bi-file-earmark-text me-1" style="color:#16a34a;"></i>Fișier export din dashboard
                    </label>
                    <input type="file" name="fisier_export" class="form-control @error('fisier_export') is-invalid @enderror" accept=".csv,.txt">
                    @error('fisier_export')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label class="form-label fw-bold" style="font-size:0.82rem;">Format rezultat</label>
                    <div class="d-flex gap-3 pt-1">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="format" id="comparaCsv" value="csv" checked>
                            <label class="form-check-label fw-bold" for="comparaCsv" style="font-size:0.85rem;">
                                <i class="bi bi-filetype-csv me-1" style="color:#16a34a;"></i>CSV
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="format" id="comparaXlsx" value="xlsx">
                            <label class="form-check-label fw-bold" for="comparaXlsx" style="font-size:0.85rem;">
                                <i class="bi bi-file-earmark-excel me-1" style="color:#16a34a;"></i>XLSX
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <button type="submit" class="btn w-100 fw-bold"
                            style="background:#0077b6;color:#fff;border-radius:8px;padding:0.65rem;">
                        <i class="bi bi-search me-1"></i>Compară
                    </button>
                </div>

                <div class="col-12">
                    <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:8px;padding:0.6rem 1rem;font-size:0.78rem;color:#64748b;">
                        <i class="bi bi-info-circle me-1"></i>
                        Rezultatul va conține doar contorii unde <strong>index_vechi din fișierul de sync</strong> diferă față de <strong>index_vechi din export</strong>.
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>{{-- /.main --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function openSidebar() {
        document.getElementById('sidebar').classList.add('sidebar-open');
        document.getElementById('sidebarOverlay').classList.add('show');
        document.body.style.overflow = 'hidden';
    }
    function closeSidebar() {
        document.getElementById('sidebar').classList.remove('sidebar-open');
        document.getElementById('sidebarOverlay').classList.remove('show');
        document.body.style.overflow = '';
    }
    // Închide sidebar-ul când se face click pe un link din el (pe mobil)
    document.querySelectorAll('.sidebar .nav-item a').forEach(function(link) {
        link.addEventListener('click', function() {
            if (window.innerWidth < 992) closeSidebar();
        });
    });
</script>
</body>
</html>