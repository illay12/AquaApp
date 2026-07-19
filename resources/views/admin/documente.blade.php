<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionare Documente Publice – AquaServ Admin</title>
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
        .section-card { background:#fff; border-radius:14px; box-shadow:0 2px 12px rgba(0,0,0,0.06); border:1px solid #e2e8f0; overflow:hidden; }
        .section-header { padding:1rem 1.5rem; border-bottom:1px solid #e2e8f0; display:flex; align-items:center; gap:0.6rem; }
        .section-header h6 { margin:0; font-weight:800; color:var(--aqua-dark); font-size:0.95rem; }
        .section-body { padding:1.5rem; }

        /* Tabs */
        .nav-tabs .nav-link { color:#64748b; font-weight:600; font-size:0.875rem; border-radius:8px 8px 0 0; }
        .nav-tabs .nav-link.active { color:var(--aqua-dark); font-weight:800; background:#fff; border-bottom-color:#fff; }
        .nav-tabs .nav-link:hover:not(.active) { color:var(--aqua); background:#f8fafc; }

        /* Accordion override */
        .accordion-button:not(.collapsed) { background:#f0f9ff; color:var(--aqua-dark); box-shadow:none; }
        .accordion-button:focus { box-shadow:none; }
        .accordion-button { font-weight:700; font-size:0.875rem; color:#0f172a; }
        .accordion-item { border:1px solid #e2e8f0; border-radius:10px !important; margin-bottom:0.5rem; overflow:hidden; }
        .accordion-item:first-of-type, .accordion-item:last-of-type { border-radius:10px !important; }

        /* File row */
        .fisier-row { display:flex; align-items:center; justify-content:space-between; padding:0.5rem 0.75rem; border-bottom:1px solid #f1f5f9; font-size:0.85rem; }
        .fisier-row:last-child { border-bottom:none; }
        .fisier-row .fisier-name { display:flex; align-items:center; gap:0.5rem; color:#0f172a; word-break:break-all; }
        .fisier-row .fisier-name i { color:#dc2626; flex-shrink:0; }

        /* Upload zone */
        .upload-zone { background:#f8fafc; border:1px dashed #cbd5e1; border-radius:10px; padding:1rem 1.25rem; margin-top:1rem; }
        .upload-zone label { font-size:0.8rem; font-weight:700; color:#475569; }

        /* Mobile */
        @media (max-width: 767px) {
            .sidebar { width:100%; min-height:auto; position:relative; padding:1rem 0; }
            .main { margin-left:0; padding:1rem; }
            .topbar { flex-direction:column; align-items:flex-start; gap:0.5rem; }
        }
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
            <a href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid-fill"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.documente.index') }}" class="activ">
                <i class="bi bi-folder2-open"></i> Documente Publice
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.pddtj.index') }}">
                <i class="bi bi-droplet-half"></i> PDDTJ
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
            <h4 style="font-weight:800;color:#0f172a;margin:0;">Gestionare Documente Publice</h4>
            <p style="color:#6c757d;font-size:0.82rem;margin:0;">
                {{ now()->locale('ro')->isoFormat('dddd, D MMMM YYYY') }}
            </p>
        </div>
        <div style="font-size:0.82rem;color:#6c757d;">
            <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->username }}
        </div>
    </div>

    {{-- FLASH MESSAGES --}}
    @if(session('success'))
        <div class="alert alert-success d-flex align-items-center gap-2 mb-4" style="border-radius:10px;font-size:0.875rem;">
            <i class="bi bi-check-circle-fill flex-shrink-0"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger d-flex align-items-center gap-2 mb-4" style="border-radius:10px;font-size:0.875rem;">
            <i class="bi bi-exclamation-triangle-fill flex-shrink-0"></i>
            <div>{{ session('error') }}</div>
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger mb-4" style="border-radius:10px;font-size:0.875rem;">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <strong>Erori de validare:</strong>
            <ul class="mb-0 mt-1">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- TABS --}}
    <div class="section-card">
        <div class="section-header">
            <i class="bi bi-folder2-open" style="color:#0077b6;font-size:1.1rem;"></i>
            <h6>Documente pe categorii</h6>
        </div>
        <div class="section-body">

            <ul class="nav nav-tabs mb-4" id="docTab" role="tablist">
                @foreach($folders as $folderKey => $folderLabel)
                    @php $tabId = Str::slug($folderKey); @endphp
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $loop->first ? 'active' : '' }}"
                                id="tab-{{ $tabId }}"
                                data-bs-toggle="tab"
                                data-bs-target="#pane-{{ $tabId }}"
                                type="button" role="tab">
                            <i class="bi bi-folder me-1"></i>{{ $folderLabel }}
                        </button>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content" id="docTabContent">
                @foreach($folders as $folderKey => $folderLabel)
                    @php
                        $tabId   = Str::slug($folderKey);
                        $aniData = $documente[$folderKey] ?? [];
                    @endphp
                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                         id="pane-{{ $tabId }}"
                         role="tabpanel">

                        {{-- Upload button + modal trigger --}}
                        <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                            <div style="font-size:0.82rem;color:#64748b;">
                                @if(count($aniData) > 0)
                                    {{ count($aniData) }} ani, {{ collect($aniData)->flatten()->count() }} fișiere PDF
                                @else
                                    Niciun document încărcat încă.
                                @endif
                            </div>
                            <button type="button" class="btn btn-sm fw-bold"
                                    style="background:#0077b6;color:#fff;border-radius:8px;padding:0.45rem 1rem;"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalUpload-{{ $tabId }}">
                                <i class="bi bi-plus-circle me-1"></i>Adaugă document
                            </button>
                        </div>

                        {{-- Accordion per year --}}
                        @if(count($aniData) > 0)
                            <div class="accordion" id="accordion-{{ $tabId }}">
                                @foreach($aniData as $an => $fisiere)
                                    @php $accId = $tabId . '-' . $an; @endphp
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading-{{ $accId }}">
                                            <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}"
                                                    type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapse-{{ $accId }}"
                                                    aria-expanded="{{ $loop->first ? 'true' : 'false' }}">
                                                <i class="bi bi-calendar3 me-2" style="color:#0077b6;"></i>
                                                {{ $an }}
                                                <span class="badge ms-2"
                                                      style="background:#e0f2fe;color:#0369a1;font-size:0.72rem;font-weight:700;border-radius:20px;padding:0.2rem 0.6rem;">
                                                    {{ count($fisiere) }} {{ count($fisiere) === 1 ? 'fișier' : 'fișiere' }}
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="collapse-{{ $accId }}"
                                             class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                             data-bs-parent="#accordion-{{ $tabId }}">
                                            <div class="accordion-body p-0">

                                                {{-- File list --}}
                                                @foreach($fisiere as $fisier)
                                                    <div class="fisier-row">
                                                        <div class="fisier-name">
                                                            <i class="bi bi-file-earmark-pdf-fill"></i>
                                                            <span>{{ $fisier }}</span>
                                                        </div>
                                                        <form method="POST"
                                                              action="{{ route('admin.documente.sterge') }}"
                                                              class="d-inline"
                                                              onsubmit="return confirm('Ești sigur că vrei să ștergi fișierul „{{ $fisier }}"?')">
                                                            @csrf
                                                            <input type="hidden" name="folder" value="{{ $folderKey }}">
                                                            <input type="hidden" name="an"     value="{{ $an }}">
                                                            <input type="hidden" name="fisier" value="{{ $fisier }}">
                                                            <button type="submit" class="btn btn-sm"
                                                                    style="background:#fef2f2;color:#dc2626;border:1px solid #fca5a5;border-radius:6px;font-size:0.78rem;padding:0.25rem 0.6rem;">
                                                                <i class="bi bi-trash3"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                @endforeach

                                                {{-- Inline upload for this year --}}
                                                <div class="upload-zone">
                                                    <form method="POST"
                                                          action="{{ route('admin.documente.upload') }}"
                                                          enctype="multipart/form-data"
                                                          class="row g-2 align-items-end">
                                                        @csrf
                                                        <input type="hidden" name="folder" value="{{ $folderKey }}">
                                                        <input type="hidden" name="an"     value="{{ $an }}">
                                                        <div class="col-12 col-md-7">
                                                            <label class="form-label mb-1">
                                                                <i class="bi bi-upload me-1" style="color:#0077b6;"></i>
                                                                Adaugă PDF în {{ $an }}
                                                            </label>
                                                            <input type="file" name="fisier" class="form-control form-control-sm" accept=".pdf">
                                                        </div>
                                                        <div class="col-12 col-md-5">
                                                            <button type="submit" class="btn btn-sm w-100 fw-bold"
                                                                    style="background:#0077b6;color:#fff;border-radius:8px;padding:0.45rem;">
                                                                <i class="bi bi-cloud-upload me-1"></i>Încarcă
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div style="text-align:center;padding:2rem 1rem;color:#94a3b8;">
                                <i class="bi bi-folder2-open" style="font-size:2.5rem;display:block;margin-bottom:0.75rem;"></i>
                                <div style="font-size:0.875rem;">Niciun document în această categorie.</div>
                                <div style="font-size:0.78rem;margin-top:0.25rem;">Folosiți butonul „Adaugă document" de mai sus.</div>
                            </div>
                        @endif

                    </div>{{-- /.tab-pane --}}
                @endforeach
            </div>{{-- /.tab-content --}}

        </div>{{-- /.section-body --}}
    </div>{{-- /.section-card --}}

</div>{{-- /.main --}}

{{-- MODALS — one per folder --}}
@foreach($folders as $folderKey => $folderLabel)
    @php
        $tabId   = Str::slug($folderKey);
        $aniData = $documente[$folderKey] ?? [];
        $aniList = array_keys($aniData);
    @endphp
    <div class="modal fade" id="modalUpload-{{ $tabId }}" tabindex="-1" aria-labelledby="modalLabel-{{ $tabId }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius:14px;border:none;">
                <div class="modal-header" style="background:linear-gradient(135deg, var(--aqua-dark), var(--aqua));border-radius:14px 14px 0 0;">
                    <h5 class="modal-title" id="modalLabel-{{ $tabId }}" style="color:#fff;font-weight:800;font-size:0.95rem;">
                        <i class="bi bi-plus-circle me-2"></i>Adaugă document – {{ $folderLabel }}
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST"
                      action="{{ route('admin.documente.upload') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="folder" value="{{ $folderKey }}">
                    <div class="modal-body p-4">

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="font-size:0.82rem;">An <span class="text-danger">*</span></label>
                            <div class="row g-2">
                                <div class="col-6">
                                    <select name="an" class="form-select form-select-sm" id="anSelect-{{ $tabId }}">
                                        @foreach(range(now()->year, 2000, -1) as $a)
                                            <option value="{{ $a }}" {{ $a == now()->year ? 'selected' : '' }}>{{ $a }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <div style="font-size:0.78rem;color:#64748b;">
                                        <i class="bi bi-info-circle me-1"></i>Selectați sau introduceți un an nou
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="font-size:0.82rem;">Fișier PDF <span class="text-danger">*</span></label>
                            <input type="file" name="fisier" class="form-control" accept=".pdf" required>
                            <div style="font-size:0.75rem;color:#64748b;margin-top:0.35rem;">
                                <i class="bi bi-info-circle me-1"></i>Maxim 20 MB. Doar fișiere PDF.
                            </div>
                        </div>

                        <div style="background:#f0f9ff;border:1px solid #bae6fd;border-radius:8px;padding:0.6rem 1rem;font-size:0.78rem;color:#0369a1;">
                            <i class="bi bi-folder me-1"></i>
                            Fișierul va fi salvat în: <strong>{{ $folderKey }}/[an]/</strong>
                        </div>

                    </div>
                    <div class="modal-footer" style="border-top:1px solid #e2e8f0;">
                        <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal"
                                style="border-radius:8px;font-weight:600;">
                            Anulează
                        </button>
                        <button type="submit" class="btn btn-sm fw-bold"
                                style="background:#0077b6;color:#fff;border-radius:8px;padding:0.45rem 1.25rem;">
                            <i class="bi bi-cloud-upload me-1"></i>Încarcă PDF
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
