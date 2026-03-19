@extends('layouts.app')

@section('title', 'Declarații de avere')
@section('meta_description', 'Declarații de avere și declarații de interese ale personalului Aquaserv S.A. Tulcea')

@section('page_hero')
    <h1><i class="bi bi-file-earmark-person me-2"></i>Declarații de avere</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Acasă</a></li>
            <li class="breadcrumb-item active">Integritate</li>
            <li class="breadcrumb-item active">Declarații de avere</li>
        </ol>
    </nav>
@endsection

@section('content')
<div class="container py-5">

    <div class="row mb-4">
        <div class="col-12">
            <p class="text-muted" style="font-size:0.95rem;">
                În conformitate cu prevederile <strong>Legii nr. 176/2010</strong> privind integritatea în exercitarea funcțiilor și demnităților publice,
                personalul Aquaserv S.A. Tulcea cu funcții de conducere are obligația depunerii anuale a declarației de avere și a declarației de interese.
            </p>
        </div>
    </div>

    {{-- Tabel declaratii --}}
    <div class="card border-0 shadow-sm mb-5">
        <div class="card-header d-flex align-items-center gap-2 py-3">
            <i class="bi bi-person-badge fs-5"></i>
            <span>Declarații de avere — Personal de conducere</span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0" style="font-size:0.9rem;">
                    <thead style="background:var(--aqua-bg);">
                        <tr>
                            <th class="px-4 py-3" style="width:40px;">#</th>
                            <th class="px-4 py-3">Nume și prenume</th>
                            <th class="px-4 py-3">Funcția</th>
                            <th class="px-4 py-3">An</th>
                            <th class="px-4 py-3 text-center">Declarație avere</th>
                            <th class="px-4 py-3 text-center">Declarație interese</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                                Nu există declarații publicate momentan.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Info legala --}}
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card h-100 border-0" style="background:var(--aqua-bg);">
                <div class="card-body p-4">
                    <h5 class="section-title" style="font-size:1rem;">Cadru legal</h5>
                    <ul class="list-unstyled mb-0" style="font-size:0.875rem;line-height:2;">
                        <li><i class="bi bi-journal-text text-aqua me-2"></i> Legea nr. 176/2010 privind integritatea</li>
                        <li><i class="bi bi-journal-text text-aqua me-2"></i> Legea nr. 144/2007 — ANI</li>
                        <li><i class="bi bi-journal-text text-aqua me-2"></i> Legea nr. 115/1996 privind declararea averii</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100 border-0" style="background:var(--aqua-bg);">
                <div class="card-body p-4">
                    <h5 class="section-title" style="font-size:1rem;">Contact responsabil</h5>
                    <p style="font-size:0.875rem;margin-bottom:0.5rem;">
                        Pentru informații suplimentare legate de declarațiile de avere, vă rugăm să contactați:
                    </p>
                    <p style="font-size:0.875rem;margin-bottom:0;">
                        <i class="bi bi-envelope-fill text-aqua me-2"></i>
                        <a href="mailto:secretariat@aquaservtulcea.ro" style="color:var(--aqua-primary);">secretariat@aquaservtulcea.ro</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
