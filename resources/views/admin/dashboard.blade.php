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
    </style>
</head>
<body>

{{-- SIDEBAR --}}
<div class="sidebar">
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
            <a href="#sectiuneImport" onclick="document.getElementById('sectiuneImport').scrollIntoView({behavior:'smooth'});return false;">
                <i class="bi bi-file-earmark-arrow-up"></i> Import Indecși
            </a>
        </li>
        <li class="nav-item">
            <a href="#sectiuneCompara" onclick="document.getElementById('sectiuneCompara').scrollIntoView({behavior:'smooth'});return false;">
                <i class="bi bi-subtract"></i> Compară Exporturi
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
        <div>
            <h4 style="font-weight:800;color:#0f172a;margin:0;">Dashboard</h4>
            <p style="color:#6c757d;font-size:0.82rem;margin:0;">
                {{ now()->locale('ro')->isoFormat('dddd, D MMMM YYYY') }}
            </p>
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

    {{-- IMPORT INDECȘI --}}
    <div class="section-card" id="sectiuneImport">
        <div class="section-header">
            <i class="bi bi-file-earmark-arrow-up" style="color:#0077b6;font-size:1.1rem;"></i>
            <h6>Import Indecși din CSV</h6>
        </div>
        <div class="section-body">

            @if(session('import_mesaj'))
                <div class="alert alert-{{ session('import_tip') === 'success' ? 'success' : 'warning' }} d-flex align-items-start gap-2 mb-4"
                     style="border-radius:10px;font-size:0.875rem;">
                    <i class="bi bi-{{ session('import_tip') === 'success' ? 'check-circle-fill' : 'exclamation-triangle-fill' }} mt-1 flex-shrink-0"></i>
                    <div>{!! session('import_mesaj') !!}</div>
                </div>
            @endif

            <p style="font-size:0.85rem;color:#6c757d;margin-bottom:1.25rem;">
                Importă un fișier CSV cu indexurile noi ale contoarelor. Fișierul va actualiza
                <strong>index_vechi</strong> și va reseta <strong>index_nou</strong> la null pentru fiecare contor.
            </p>

            <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:1rem;margin-bottom:1.5rem;font-size:0.82rem;">
                <div style="font-weight:700;color:#0f172a;margin-bottom:0.5rem;">
                    <i class="bi bi-table me-1" style="color:#0077b6;"></i>Format așteptat CSV:
                </div>
                <code style="background:#fff;border:1px solid #e2e8f0;border-radius:6px;padding:0.4rem 0.75rem;display:inline-block;color:#0369a1;">
                    serie_contor,index<br>
                    MBR-2021-00123,1650<br>
                    ITR-2021-00654,720
                </code>
                <div style="color:#6c757d;margin-top:0.5rem;">
                    Separator: <strong>,</strong> &nbsp;·&nbsp;
                    Prima linie = header (ignorată) &nbsp;·&nbsp;
                    Encoding: UTF-8
                </div>
            </div>

            <form method="POST" action="{{ route('admin.import.indecsi') }}" enctype="multipart/form-data" class="row g-3 align-items-end">
                @csrf
                <div class="col-md-5">
                    <label class="form-label fw-bold" style="font-size:0.82rem;">Fișier CSV</label>
                    <input type="file" name="fisier_csv" class="form-control @error('fisier_csv') is-invalid @enderror" accept=".csv,.txt">
                    @error('fisier_csv')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn w-100 fw-bold"
                            style="background:#0077b6;color:#fff;border-radius:8px;padding:0.65rem;"
                            onclick="return confirm('Ești sigur? Această operațiune va actualiza index_vechi și va reseta index_nou pentru toate contoarele din fișier.')">
                        <i class="bi bi-upload me-2"></i>Importă CSV
                    </button>
                </div>
                <div class="col-12">
                    <div style="background:#fff8ed;border:1px solid #fde68a;border-radius:8px;padding:0.6rem 1rem;font-size:0.78rem;color:#92400e;">
                        <i class="bi bi-exclamation-triangle me-1"></i>
                        <strong>Atenție:</strong> Operațiunea este ireversibilă. Verificați fișierul înainte de import.
                    </div>
                </div>
            </form>
        </div>
    </div>


    {{-- COMPARARE EXPORTURI --}}
    <div class="section-card mt-4" id="sectiuneCompara">
        <div class="section-header">
            <i class="bi bi-subtract" style="color:#0077b6;font-size:1.1rem;"></i>
            <h6>Comparare Exporturi</h6>
        </div>
        <div class="section-body">

            <p style="font-size:0.85rem;color:#6c757d;margin-bottom:1.25rem;">
                Încarcă două fișiere CSV exportate anterior și obține un fișier cu
                doar contorii la care <strong>indexul nou diferă</strong> între cele două exporturi.
            </p>

            <form method="POST" action="{{ route('admin.compara') }}" enctype="multipart/form-data" class="row g-3 align-items-end">
                @csrf

                <div class="col-md-4">
                    <label class="form-label fw-bold" style="font-size:0.82rem;">
                        <i class="bi bi-file-earmark-text me-1" style="color:#0077b6;"></i>Fișier 1 (referință)
                    </label>
                    <input type="file" name="fisier_1" class="form-control @error('fisier_1') is-invalid @enderror" accept=".csv,.txt">
                    @error('fisier_1')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-bold" style="font-size:0.82rem;">
                        <i class="bi bi-file-earmark-text me-1" style="color:#16a34a;"></i>Fișier 2 (comparație)
                    </label>
                    <input type="file" name="fisier_2" class="form-control @error('fisier_2') is-invalid @enderror" accept=".csv,.txt">
                    @error('fisier_2')
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
                        <i class="bi bi-intersect me-2"></i>Compară
                    </button>
                </div>

                <div class="col-12">
                    <div style="background:#f0f9ff;border:1px solid #bae6fd;border-radius:8px;padding:0.6rem 1rem;font-size:0.78rem;color:#0369a1;">
                        <i class="bi bi-info-circle me-1"></i>
                        Ambele fișiere trebuie să fie exporturi generate din acest panou (format CSV cu separator <strong>,</strong>).
                        Rezultatul conține doar contorii unde <strong>Index Nou</strong> diferă între cele două fișiere.
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>{{-- /.main --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>