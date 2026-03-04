<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin – AquaServ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background: linear-gradient(135deg, #0077b6 0%, #023e8a 100%); min-height:100vh; display:flex; align-items:center; justify-content:center; }
        .card { border:none; border-radius:16px; box-shadow:0 20px 60px rgba(0,0,0,0.3); }
    </style>
</head>
<body>
    <div style="width:100%;max-width:400px;padding:1rem;">
        <div class="text-center mb-4">
            <div style="width:60px;height:60px;background:rgba(255,255,255,0.2);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 0.75rem;">
                <i class="bi bi-shield-lock-fill" style="font-size:1.8rem;color:#fff;"></i>
            </div>
            <h4 style="color:#fff;font-weight:800;margin:0;">Panou Administrare</h4>
            <p style="color:rgba(255,255,255,0.7);font-size:0.85rem;margin:0;">AquaServ Tulcea</p>
        </div>

        <div class="card p-4">
            @if($errors->any())
                <div class="alert alert-danger d-flex align-items-center gap-2 py-2 mb-3" style="font-size:0.85rem;">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.post') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold" style="font-size:0.82rem;">Utilizator</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person" style="color:#0077b6;"></i></span>
                        <input type="text" name="username" class="form-control"
                               value="{{ old('username') }}" required autofocus
                               placeholder="username">
                    </div>
                    @error('username')
                        <div style="font-size:0.82rem;color:#dc2626;margin-top:0.25rem;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold" style="font-size:0.82rem;">Parolă</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock" style="color:#0077b6;"></i></span>
                        <input type="password" name="password" class="form-control" required placeholder="••••••••">
                    </div>
                </div>

                <button type="submit" class="btn w-100 fw-bold"
                        style="background:#0077b6;color:#fff;border-radius:10px;padding:0.75rem;">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Autentificare
                </button>
            </form>
        </div>
    </div>
</body>
</html>
