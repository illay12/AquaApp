<!DOCTYPE html>
<html lang="ro">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Companie Apă')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header style="background: #0077b6; color: #fff; padding: 1rem;">
        <h1>Companie Apă</h1>
        <nav>
            <a href="{{ url('/') }}" style="color:white; margin-right: 1rem;">Acasă</a>
            <a href="{{ url('/anunturi') }}" style="color:white; margin-right: 1rem;">Anunțuri</a>
            <a href="{{ url('/contact') }}" style="color:white;">Contact</a>
        </nav>
    </header>

    <main style="padding: 2rem;">
        @yield('content')
    </main>

    <footer style="background:#023e8a; color:#fff; padding:1rem; text-align:center;">
        &copy; 2026 Companie Apă. Toate drepturile rezervate.
    </footer>
</body>
</html>