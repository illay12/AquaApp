<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispecerat – Autentificare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #023e8a 0%, #0077b6 60%, #00b4d8 100%);
            min-height: 100vh;
            display: flex; align-items: center; justify-content: center;
        }
        .login-card {
            width: 100%; max-width: 420px;
            background: #fff; border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.25);
            padding: 2.5rem;
        }
        .login-logo {
            width: 64px; height: 64px;
            background: linear-gradient(135deg,#0077b6,#00b4d8);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1rem; font-size: 1.8rem; color: #fff;
        }
        .form-control:focus { border-color: #0077b6; box-shadow: 0 0 0 0.2rem rgba(0,119,182,0.2); }
        .btn-login {
            background: linear-gradient(90deg, #023e8a, #0077b6);
            color: #fff; border: none; font-weight: 700;
            padding: 0.7rem; border-radius: 8px; transition: opacity 0.2s;
        }
        .btn-login:hover { opacity: 0.9; color: #fff; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-logo"><i class="bi bi-shield-lock-fill"></i></div>
        <h4 class="text-center fw-bold mb-1" style="color:#023e8a;">Panou Dispecerat</h4>
        <p class="text-center text-muted mb-4" style="font-size:0.85rem;">Introduceți credențialele pentru acces</p>

        @if(session('success'))
            <div class="alert alert-success py-2" style="font-size:0.875rem;">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger py-2" style="font-size:0.875rem;">
                <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
            </div>
        @endif

        <form action="{{ route('dispecerat.login.post') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold" style="font-size:0.875rem;">Utilizator</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" name="username"
                           class="form-control @error('username') is-invalid @enderror"
                           value="{{ old('username') }}" placeholder="utilizator" autocomplete="username">
                    @error('username')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label fw-bold" style="font-size:0.875rem;">Parolă</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="••••••••" autocomplete="current-password">
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <button type="submit" class="btn btn-login w-100">
                <i class="bi bi-box-arrow-in-right me-2"></i> Autentificare
            </button>
        </form>

        <div class="text-center mt-3">
            <a href="{{ url('/') }}" style="font-size:0.8rem;color:#0077b6;text-decoration:none;">
                <i class="bi bi-arrow-left me-1"></i> Înapoi la site
            </a>
        </div>
    </div>
</body>
</html>
