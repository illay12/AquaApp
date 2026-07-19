<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionare PDDTJ – AquaServ Admin</title>
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

        .nav-tabs .nav-link { color:#64748b; font-weight:600; font-size:0.875rem; border-radius:8px 8px 0 0; }
        .nav-tabs .nav-link.active { color:var(--aqua-dark); font-weight:800; background:#fff; border-bottom-color:#fff; }
        .nav-tabs .nav-link:hover:not(.active) { color:var(--aqua); background:#f8fafc; }

        .fisier-row { display:flex; align-items:center; justify-content:space-between; padding:0.6rem 0.75rem; border-bottom:1px solid #f1f5f9; font-size:0.85rem; gap:0.75rem; }
        .fisier-row:last-child { border-bottom:none; }
        .fisier-row .fisier-name { display:flex; align-items:center; gap:0.5rem; color:#0f172a; min-width:0; }
        .fisier-row .fisier-name i { color:#dc2626; flex-shrink:0; }
        .fisier-row .fisier-titlu { word-break:break-word; }
        .fisier-row .fisier-data { font-size:0.72rem; font-weight:700; color:#64748b; text-transform:uppercase; white-space:nowrap; }

        .upload-zone { background:#f8fafc; border:1px dashed #cbd5e1; border-radius:10px; padding:1rem 1.25rem; margin-top:1rem; }
        .upload-zone label { font-size:0.8rem; font-weight:700; color:#475569; }

        .poza-thumb { position:relative; border-radius:10px; overflow:hidden; box-shadow:0 2px 10px rgba(0,0,0,0.08); }
        .poza-thumb img { width:100%; height:110px; object-fit:cover; display:block; }
        .poza-thumb form { position:absolute; top:6px; right:6px; margin:0; }
        .poza-thumb button { background:rgba(220,38,38,0.9); color:#fff; border:none; border-radius:6px; padding:0.2rem 0.45rem; font-size:0.78rem; }

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
            <a href="{{ route('admin.documente.index') }}">
                <i class="bi bi-folder2-open"></i> Documente Publice
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.pddtj.index') }}" class="activ">
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
            <h4 style="font-weight:800;color:#0f172a;margin:0;">Gestionare PDDTJ</h4>
            <p style="color:#6c757d;font-size:0.82rem;margin:0;">
                Comunicate de presă și galerie foto — pddtj.aquaservtulcea.ro
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
            <i class="bi bi-droplet-half" style="color:#0077b6;font-size:1.1rem;"></i>
            <h6>PDDTJ — Comunicare &amp; Galerie</h6>
        </div>
        <div class="section-body">

            <ul class="nav nav-tabs mb-4" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="tab-comunicare" data-bs-toggle="tab" data-bs-target="#pane-comunicare" type="button" role="tab">
                        <i class="bi bi-megaphone me-1"></i>Comunicare
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab-galerie" data-bs-toggle="tab" data-bs-target="#pane-galerie" type="button" role="tab">
                        <i class="bi bi-images me-1"></i>Galerie
                    </button>
                </li>
            </ul>

            <div class="tab-content">

                {{-- ============ COMUNICARE ============ --}}
                <div class="tab-pane fade show active" id="pane-comunicare" role="tabpanel">

                    <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                        <div style="font-size:0.82rem;color:#64748b;">
                            @if($comunicate->count() > 0)
                                {{ $comunicate->count() }} {{ $comunicate->count() === 1 ? 'comunicat' : 'comunicate' }} publicate
                            @else
                                Niciun comunicat adăugat încă.
                            @endif
                        </div>
                        <button type="button" class="btn btn-sm fw-bold" style="background:#0077b6;color:#fff;border-radius:8px;padding:0.45rem 1rem;"
                                data-bs-toggle="modal" data-bs-target="#modalComunicat">
                            <i class="bi bi-plus-circle me-1"></i>Adaugă comunicat
                        </button>
                    </div>

                    @if($comunicate->count() > 0)
                        <div class="section-card">
                            <div class="p-0">
                                @foreach($comunicate as $c)
                                    <div class="fisier-row">
                                        <div class="fisier-name">
                                            <i class="bi bi-file-earmark-pdf-fill"></i>
                                            <div>
                                                <div class="fisier-data">{{ $c->data->format('d.m.Y') }}</div>
                                                <div class="fisier-titlu">{{ $c->titlu }}</div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 flex-shrink-0">
                                            @if(file_exists(storage_path('app/public/documente/pddtj/'.$c->fisier)))
                                                <a href="{{ asset('storage/documente/pddtj/'.$c->fisier) }}" target="_blank" class="btn btn-sm" style="background:#f0f9ff;color:#0369a1;border:1px solid #bae6fd;border-radius:6px;font-size:0.78rem;">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                            @endif
                                            <button type="button" class="btn btn-sm" style="background:#f0f9ff;color:#0369a1;border:1px solid #bae6fd;border-radius:6px;font-size:0.78rem;"
                                                    data-bs-toggle="modal" data-bs-target="#modalEditComunicat{{ $c->id }}">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <form method="POST" action="{{ route('admin.pddtj.comunicare.destroy', $c->id) }}" onsubmit="return confirm('Ștergi comunicatul „{{ $c->titlu }}"?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm" style="background:#fef2f2;color:#dc2626;border:1px solid #fca5a5;border-radius:6px;font-size:0.78rem;">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                    {{-- Modal editare --}}
                                    <div class="modal fade" id="modalEditComunicat{{ $c->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content" style="border-radius:14px;border:none;">
                                                <div class="modal-header" style="background:linear-gradient(135deg, var(--aqua-dark), var(--aqua));border-radius:14px 14px 0 0;">
                                                    <h5 class="modal-title" style="color:#fff;font-weight:800;font-size:0.95rem;">
                                                        <i class="bi bi-pencil me-2"></i>Editează comunicat
                                                    </h5>
                                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form method="POST" action="{{ route('admin.pddtj.comunicare.update', $c->id) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body p-4">
                                                        <div class="mb-3">
                                                            <label class="form-label fw-bold" style="font-size:0.82rem;">Data <span class="text-danger">*</span></label>
                                                            <input type="date" name="data" class="form-control" value="{{ $c->data->format('Y-m-d') }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label fw-bold" style="font-size:0.82rem;">Titlu <span class="text-danger">*</span></label>
                                                            <textarea name="titlu" class="form-control" rows="3" required>{{ $c->titlu }}</textarea>
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label fw-bold" style="font-size:0.82rem;">Înlocuiește PDF-ul (opțional)</label>
                                                            <input type="file" name="fisier" class="form-control" accept=".pdf">
                                                            <div style="font-size:0.75rem;color:#64748b;margin-top:0.35rem;">Fișier curent: {{ $c->fisier }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer" style="border-top:1px solid #e2e8f0;">
                                                        <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal" style="border-radius:8px;font-weight:600;">Anulează</button>
                                                        <button type="submit" class="btn btn-sm fw-bold" style="background:#0077b6;color:#fff;border-radius:8px;padding:0.45rem 1.25rem;">Salvează</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div style="text-align:center;padding:2rem 1rem;color:#94a3b8;">
                            <i class="bi bi-megaphone" style="font-size:2.5rem;display:block;margin-bottom:0.75rem;"></i>
                            <div style="font-size:0.875rem;">Niciun comunicat adăugat.</div>
                            <div style="font-size:0.78rem;margin-top:0.25rem;">Folosiți butonul „Adaugă comunicat" de mai sus.</div>
                        </div>
                    @endif

                </div>

                {{-- ============ GALERIE ============ --}}
                <div class="tab-pane fade" id="pane-galerie" role="tabpanel">

                    <div class="d-flex justify-content-end mb-3">
                        <button type="button" class="btn btn-sm fw-bold" style="background:#f0f9ff;color:#0369a1;border:1px solid #bae6fd;border-radius:8px;padding:0.45rem 1rem;"
                                data-bs-toggle="modal" data-bs-target="#modalCategorieNoua">
                            <i class="bi bi-folder-plus me-1"></i>Adaugă categorie nouă (contract)
                        </button>
                    </div>

                    <ul class="nav nav-tabs mb-4" role="tablist">
                        @foreach($galerii as $cod => $g)
                            @php $tabId = \Illuminate\Support\Str::slug($cod); @endphp
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="tab-g-{{ $tabId }}" data-bs-toggle="tab" data-bs-target="#pane-g-{{ $tabId }}" type="button" role="tab">
                                    {{ $cod }}
                                </button>
                            </li>
                        @endforeach
                    </ul>

                    <div class="tab-content">
                        @foreach($galerii as $cod => $g)
                            @php $tabId = \Illuminate\Support\Str::slug($cod); @endphp
                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="pane-g-{{ $tabId }}" role="tabpanel">

                                <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                                    <div style="font-size:0.82rem;color:#64748b;max-width:70%;">
                                        <strong>{{ $g['titlu'] }}</strong> — {{ count($g['poze']) }} {{ count($g['poze']) === 1 ? 'fotografie' : 'fotografii' }}
                                    </div>
                                    <button type="button" class="btn btn-sm fw-bold" style="background:#0077b6;color:#fff;border-radius:8px;padding:0.45rem 1rem;"
                                            data-bs-toggle="modal" data-bs-target="#modalPoza-{{ $tabId }}">
                                        <i class="bi bi-plus-circle me-1"></i>Adaugă fotografie
                                    </button>
                                </div>

                                @if(count($g['poze']) > 0)
                                    <div class="row g-3">
                                        @foreach($g['poze'] as $poza)
                                            <div class="col-6 col-md-3">
                                                <div class="poza-thumb">
                                                    <img src="{{ asset('storage/galerie/pddtj/'.$cod.'/'.$poza) }}" alt="{{ $g['titlu'] }}">
                                                    <form method="POST" action="{{ route('admin.pddtj.galerie.sterge') }}" onsubmit="return confirm('Ștergi această fotografie?')">
                                                        @csrf
                                                        <input type="hidden" name="cod" value="{{ $cod }}">
                                                        <input type="hidden" name="fisier" value="{{ $poza }}">
                                                        <button type="submit"><i class="bi bi-trash3"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div style="text-align:center;padding:2rem 1rem;color:#94a3b8;">
                                        <i class="bi bi-images" style="font-size:2.5rem;display:block;margin-bottom:0.75rem;"></i>
                                        <div style="font-size:0.875rem;">Nicio fotografie încărcată pentru {{ $cod }}.</div>
                                    </div>
                                @endif

                            </div>
                        @endforeach
                    </div>

                </div>

            </div>{{-- /.tab-content --}}

        </div>{{-- /.section-body --}}
    </div>{{-- /.section-card --}}

</div>{{-- /.main --}}

{{-- MODAL: adaugă categorie nouă de galerie --}}
<div class="modal fade" id="modalCategorieNoua" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius:14px;border:none;">
            <div class="modal-header" style="background:linear-gradient(135deg, var(--aqua-dark), var(--aqua));border-radius:14px 14px 0 0;">
                <h5 class="modal-title" style="color:#fff;font-weight:800;font-size:0.95rem;">
                    <i class="bi bi-folder-plus me-2"></i>Adaugă categorie nouă de galerie
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('admin.pddtj.galerie.categorie.store') }}">
                @csrf
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold" style="font-size:0.82rem;">Cod contract <span class="text-danger">*</span></label>
                        <input type="text" name="cod" class="form-control" placeholder="ex: CL-15" maxlength="20" required>
                        <div style="font-size:0.75rem;color:#64748b;margin-top:0.35rem;">Doar litere, cifre și cratimă.</div>
                    </div>
                    <div class="mb-1">
                        <label class="form-label fw-bold" style="font-size:0.82rem;">Titlu contract <span class="text-danger">*</span></label>
                        <textarea name="titlu" class="form-control" rows="2" placeholder="ex: Reabilitare stație tratare X" required></textarea>
                    </div>
                </div>
                <div class="modal-footer" style="border-top:1px solid #e2e8f0;">
                    <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal" style="border-radius:8px;font-weight:600;">Anulează</button>
                    <button type="submit" class="btn btn-sm fw-bold" style="background:#0077b6;color:#fff;border-radius:8px;padding:0.45rem 1.25rem;">
                        <i class="bi bi-plus-circle me-1"></i>Adaugă categoria
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- MODAL: adaugă comunicat --}}
<div class="modal fade" id="modalComunicat" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius:14px;border:none;">
            <div class="modal-header" style="background:linear-gradient(135deg, var(--aqua-dark), var(--aqua));border-radius:14px 14px 0 0;">
                <h5 class="modal-title" style="color:#fff;font-weight:800;font-size:0.95rem;">
                    <i class="bi bi-plus-circle me-2"></i>Adaugă comunicat de presă
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('admin.pddtj.comunicare.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold" style="font-size:0.82rem;">Data <span class="text-danger">*</span></label>
                        <input type="date" name="data" class="form-control" value="{{ now()->format('Y-m-d') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold" style="font-size:0.82rem;">Titlu <span class="text-danger">*</span></label>
                        <textarea name="titlu" class="form-control" rows="3" placeholder="ex: Semnare Contract de Lucrări CL-4 — ..." required></textarea>
                    </div>
                    <div class="mb-1">
                        <label class="form-label fw-bold" style="font-size:0.82rem;">Fișier PDF <span class="text-danger">*</span></label>
                        <input type="file" name="fisier" class="form-control" accept=".pdf" required>
                        <div style="font-size:0.75rem;color:#64748b;margin-top:0.35rem;">
                            <i class="bi bi-info-circle me-1"></i>Maxim 20 MB. Doar fișiere PDF.
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top:1px solid #e2e8f0;">
                    <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal" style="border-radius:8px;font-weight:600;">Anulează</button>
                    <button type="submit" class="btn btn-sm fw-bold" style="background:#0077b6;color:#fff;border-radius:8px;padding:0.45rem 1.25rem;">
                        <i class="bi bi-cloud-upload me-1"></i>Adaugă
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- MODALE: adaugă fotografie — una per contract --}}
@foreach($galerii as $cod => $g)
    @php $tabId = \Illuminate\Support\Str::slug($cod); @endphp
    <div class="modal fade" id="modalPoza-{{ $tabId }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius:14px;border:none;">
                <div class="modal-header" style="background:linear-gradient(135deg, var(--aqua-dark), var(--aqua));border-radius:14px 14px 0 0;">
                    <h5 class="modal-title" style="color:#fff;font-weight:800;font-size:0.95rem;">
                        <i class="bi bi-plus-circle me-2"></i>Adaugă fotografie — {{ $cod }}
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="{{ route('admin.pddtj.galerie.upload') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="cod" value="{{ $cod }}">
                    <div class="modal-body p-4">
                        <div class="mb-1">
                            <label class="form-label fw-bold" style="font-size:0.82rem;">Fotografie <span class="text-danger">*</span></label>
                            <input type="file" name="poza" class="form-control" accept="image/*" required>
                            <div style="font-size:0.75rem;color:#64748b;margin-top:0.35rem;">
                                <i class="bi bi-info-circle me-1"></i>Maxim 8 MB. jpg, png sau webp.
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top:1px solid #e2e8f0;">
                        <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal" style="border-radius:8px;font-weight:600;">Anulează</button>
                        <button type="submit" class="btn btn-sm fw-bold" style="background:#0077b6;color:#fff;border-radius:8px;padding:0.45rem 1.25rem;">
                            <i class="bi bi-cloud-upload me-1"></i>Încarcă
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
