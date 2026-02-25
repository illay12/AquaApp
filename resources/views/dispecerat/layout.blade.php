<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Panou Dispecerat') – AquaServ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --aqua-primary: #0077b6;
            --aqua-dark:    #023e8a;
            --aqua-light:   #90e0ef;
            --aqua-bg:      #f0f8ff;
            --aqua-border:  #caf0f8;
            --sidebar-w:    260px;
        }
        * { box-sizing: border-box; }
        body { font-family: 'Nunito', sans-serif; background: #f4f6f9; margin: 0; }

        /* SIDEBAR */
        .sidebar {
            position: fixed; top: 0; left: 0;
            width: var(--sidebar-w); height: 100vh;
            background: linear-gradient(180deg, #023e8a 0%, #0077b6 100%);
            color: #fff; display: flex; flex-direction: column;
            z-index: 1000; overflow-y: auto;
        }
        .sidebar-brand {
            padding: 1.5rem 1.2rem;
            border-bottom: 1px solid rgba(255,255,255,0.15);
            display: flex; align-items: center; gap: 0.75rem;
        }
        .sidebar-brand .icon {
            width: 42px; height: 42px; background: rgba(255,255,255,0.2);
            border-radius: 10px; display: flex; align-items: center;
            justify-content: center; font-size: 1.3rem; flex-shrink: 0;
        }
        .sidebar-brand span {
            font-size: 0.95rem; font-weight: 800; line-height: 1.2;
        }
        .sidebar-brand small { font-size: 0.72rem; opacity: 0.75; display: block; font-weight: 400; }
        .sidebar-nav { padding: 1rem 0; flex: 1; }
        .sidebar-label {
            font-size: 0.68rem; font-weight: 700; text-transform: uppercase;
            letter-spacing: 0.1em; opacity: 0.6; padding: 0.75rem 1.2rem 0.3rem;
        }
        .sidebar-link {
            display: flex; align-items: center; gap: 0.75rem;
            padding: 0.65rem 1.2rem; color: rgba(255,255,255,0.85);
            text-decoration: none; font-size: 0.9rem; font-weight: 600;
            border-left: 3px solid transparent; transition: all 0.2s;
        }
        .sidebar-link:hover, .sidebar-link.active {
            background: rgba(255,255,255,0.12);
            color: #fff; border-left-color: var(--aqua-light);
        }
        .sidebar-link i { font-size: 1.1rem; width: 20px; text-align: center; }
        .sidebar-footer {
            padding: 1rem 1.2rem;
            border-top: 1px solid rgba(255,255,255,0.15);
        }
        .btn-logout {
            display: flex; align-items: center; gap: 0.6rem;
            background: rgba(255,255,255,0.12); color: rgba(255,255,255,0.9);
            border: 1px solid rgba(255,255,255,0.2); border-radius: 8px;
            padding: 0.55rem 1rem; font-size: 0.875rem; font-weight: 700;
            width: 100%; cursor: pointer; transition: background 0.2s;
        }
        .btn-logout:hover { background: rgba(255,255,255,0.22); color: #fff; }

        /* MAIN */
        .main-content {
            margin-left: var(--sidebar-w);
            min-height: 100vh;
            display: flex; flex-direction: column;
        }
        .topbar {
            background: #fff; border-bottom: 1px solid #e2e8f0;
            padding: 0.85rem 1.75rem;
            display: flex; align-items: center; justify-content: space-between;
            position: sticky; top: 0; z-index: 100;
            box-shadow: 0 1px 4px rgba(0,0,0,0.06);
        }
        .topbar-title { font-weight: 800; font-size: 1.05rem; color: #1a1a2e; }
        .topbar-badge {
            background: var(--aqua-bg); color: var(--aqua-primary);
            font-size: 0.78rem; font-weight: 700; border-radius: 6px;
            padding: 0.25rem 0.65rem; border: 1px solid var(--aqua-border);
        }
        .page-body { padding: 1.75rem; flex: 1; }

        /* CARDS */
        .stat-card {
            background: #fff; border-radius: 12px;
            padding: 1.4rem; border: 1px solid #e2e8f0;
            display: flex; align-items: center; gap: 1rem;
        }
        .stat-icon {
            width: 52px; height: 52px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem; flex-shrink: 0;
        }
        .card-panel {
            background: #fff; border-radius: 12px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 4px rgba(0,0,0,0.04);
        }
        .card-panel-header {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #e2e8f0;
            font-weight: 700; font-size: 0.9rem; color: #1a1a2e;
            display: flex; align-items: center; justify-content: space-between;
        }
        .card-panel-body { padding: 1.25rem; }

        /* TABLE */
        .table th { font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.05em; color: #64748b; font-weight: 700; }
        .table td { font-size: 0.875rem; vertical-align: middle; }
        .badge-cat {
            font-size: 0.72rem; font-weight: 700; border-radius: 6px;
            padding: 0.25em 0.65em;
        }
        .badge-anunturi { background: #dbeafe; color: #1d4ed8; }
        .badge-avarie   { background: #fee2e2; color: #dc2626; }
        .badge-angajare { background: #d1fae5; color: #059669; }
        .badge-calitate { background: #e0f2fe; color: #0369a1; }

        /* FORM */
        .form-control:focus, .form-select:focus {
            border-color: var(--aqua-primary);
            box-shadow: 0 0 0 0.2rem rgba(0,119,182,0.15);
        }
        .btn-primary-aqua {
            background: var(--aqua-primary); color: #fff; border: none;
            font-weight: 700; border-radius: 8px; padding: 0.6rem 1.4rem;
            transition: background 0.2s;
        }
        .btn-primary-aqua:hover { background: var(--aqua-dark); color: #fff; }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .main-content { margin-left: 0; }
        }
    </style>
    @stack('styles')
</head>
<body>

{{-- SIDEBAR --}}
<aside class="sidebar">
    <div class="sidebar-brand">
        <div class="icon"><i class="bi bi-droplet-half"></i></div>
        <div>
            <span>AquaServ</span>
            <small>Panou Dispecerat</small>
        </div>
    </div>

    <nav class="sidebar-nav">
        <div class="sidebar-label">General</div>
        <a href="{{ route('dispecerat.dashboard') }}"
           class="sidebar-link {{ request()->routeIs('dispecerat.dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-1x2"></i> Dashboard
        </a>

        <div class="sidebar-label mt-2">Anunțuri</div>
        <a href="{{ route('dispecerat.anunturi.create') }}"
           class="sidebar-link {{ request()->routeIs('dispecerat.anunturi.create') ? 'active' : '' }}">
            <i class="bi bi-plus-circle"></i> Anunț nou
        </a>
        <a href="{{ route('dispecerat.dashboard') }}"
           class="sidebar-link">
            <i class="bi bi-list-ul"></i> Toate anunțurile
        </a>

        <div class="sidebar-label mt-2">Site</div>
        <a href="{{ url('/') }}" target="_blank" class="sidebar-link">
            <i class="bi bi-box-arrow-up-right"></i> Vezi site-ul
        </a>
        <a href="{{ url('/anunturi') }}" target="_blank" class="sidebar-link">
            <i class="bi bi-megaphone"></i> Pagina anunțuri
        </a>
    </nav>

    <div class="sidebar-footer">
        <form action="{{ route('dispecerat.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">
                <i class="bi bi-box-arrow-left"></i> Deconectare
            </button>
        </form>
    </div>
</aside>

{{-- MAIN --}}
<div class="main-content">
    <div class="topbar">
        <span class="topbar-title">@yield('page_title', 'Dashboard')</span>
        <div class="d-flex align-items-center gap-2">
            <span class="topbar-badge">
                <i class="bi bi-person-fill me-1"></i> {{ session('dispecerat_nume') }}
            </span>
            <span class="topbar-badge" id="session-timer" style="background:#fff8e1;color:#b45309;border-color:#fde68a;">
                <i class="bi bi-clock me-1"></i> <span id="timer-text">Sesiune activă</span>
            </span>
        </div>
    </div>

    <div class="page-body">

        @if(session('success'))
            <div class="alert alert-success d-flex align-items-center gap-2 mb-4 py-2" style="font-size:0.875rem;border-radius:8px;">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger d-flex align-items-center gap-2 mb-4 py-2" style="font-size:0.875rem;border-radius:8px;">
                <i class="bi bi-exclamation-triangle-fill"></i> {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Timer sesiune – expiră fix la ora setată
(function() {
    @php
    $userId = session('dispecerat_user');
    $user   = $userId ? \App\Models\DispeceratUser::find($userId) : null;
    $minute = $user ? $user->minuteRamase() : 0;
    @endphp

    let minuteRamase = {{ $minute ?? 0 }};
    let secunde = minuteRamase * 60;

    function actualizeazaTimer() {
        if (secunde <= 0) {
            document.getElementById('timer-text').textContent = 'Sesiune expirată';
            document.getElementById('session-timer').style.background = '#fee2e2';
            document.getElementById('session-timer').style.color = '#dc2626';
            document.getElementById('session-timer').style.borderColor = '#fecaca';
            setTimeout(() => { window.location.href = '{{ route("dispecerat.login") }}'; }, 2000);
            return;
        }

        const ore = Math.floor(secunde / 3600);
        const min = Math.floor((secunde % 3600) / 60);
        const sec = secunde % 60;

        let text = '';
        if (ore > 0) text = ore + 'h ' + String(min).padStart(2,'0') + 'm';
        else         text = String(min).padStart(2,'0') + ':' + String(sec).padStart(2,'0');

        document.getElementById('timer-text').textContent = text;

        // Roșu în ultimele 5 minute
        if (secunde <= 300) {
            document.getElementById('session-timer').style.background = '#fee2e2';
            document.getElementById('session-timer').style.color      = '#dc2626';
            document.getElementById('session-timer').style.borderColor= '#fecaca';
        }

        secunde--;
        setTimeout(actualizeazaTimer, 1000);
    }

    if (minuteRamase > 0) actualizeazaTimer();
})();
</script>

@stack('scripts')
</body>
</html>
