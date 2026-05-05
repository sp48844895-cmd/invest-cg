<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Investor Connect</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #1e293b;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
        }
        body::before {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(135deg, rgba(59,130,246,0.15) 0%, rgba(139,92,246,0.1) 100%);
            pointer-events: none;
        }
        
        .login-container {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 25px 50px -12px rgba(0,0,0,0.4);
            overflow: hidden;
            max-width: 420px;
            width: 100%;
            position: relative;
            z-index: 1;
        }
        
        .login-header {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            color: #fff;
            padding: 36px 30px;
            text-align: center;
        }
        .login-header .brand-icon {
            width: 52px; height: 52px;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            border-radius: 14px;
            display: inline-flex; align-items: center; justify-content: center;
            font-size: 1.4rem; margin-bottom: 14px;
        }
        .login-header h2 {
            font-weight: 700; font-size: 1.35rem;
            margin-bottom: 6px;
        }
        .login-header p {
            opacity: 0.7; font-size: 0.85rem; font-weight: 400;
        }
        
        .login-body { padding: 32px 30px; }
        
        .form-group { margin-bottom: 18px; }
        .form-label {
            font-weight: 600; font-size: 0.85rem;
            color: #0f172a; margin-bottom: 6px; display: block;
        }
        .form-control {
            border: 1.5px solid #e2e8f0;
            border-radius: 8px;
            padding: 11px 14px;
            font-size: 0.875rem;
            font-family: inherit;
            transition: all 0.25s ease;
            width: 100%;
        }
        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59,130,246,0.15);
            outline: none;
        }
        
        .input-icon { position: relative; }
        .input-icon i {
            position: absolute; left: 14px; top: 50%;
            transform: translateY(-50%); color: #94a3b8;
            font-size: 1rem;
        }
        .input-icon .form-control { padding-left: 42px; }
        
        .btn-login {
            width: 100%; padding: 12px;
            background: #3b82f6; border: none;
            border-radius: 8px; color: #fff;
            font-weight: 600; font-size: 0.9rem;
            font-family: inherit;
            cursor: pointer;
            transition: all 0.25s ease;
            display: flex; align-items: center; justify-content: center; gap: 8px;
        }
        .btn-login:hover {
            background: #2563eb;
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(59,130,246,0.35);
        }
        
        .remember-me {
            display: flex; align-items: center; gap: 8px;
            font-size: 0.85rem; color: #64748b;
        }
        .remember-me input[type="checkbox"] {
            width: 16px; height: 16px;
            accent-color: #3b82f6;
        }
        
        .alert {
            border-radius: 8px; border: none;
            font-size: 0.85rem; font-weight: 500;
            padding: 12px 16px;
        }
        .alert-danger { background: #fee2e2; color: #991b1b; }
        .alert-success { background: #d1fae5; color: #065f46; }

        @media (max-width: 480px) {
            .login-header { padding: 28px 20px; }
            .login-body { padding: 24px 20px; }
            .login-container { border-radius: 12px; }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="brand-icon"><i class="bi bi-shield-lock"></i></div>
            <h2>Admin Login</h2>
            <p>Investor Connect Admin Panel</p>
        </div>
        
        <div class="login-body">
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                
                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <div class="input-icon">
                        <i class="bi bi-envelope"></i>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                               value="{{ old('email') }}" required autofocus>
                    </div>
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <div class="input-icon">
                        <i class="bi bi-lock"></i>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="remember-me">
                        <input type="checkbox" name="remember">
                        <span>Remember me</span>
                    </label>
                </div>

                <button type="submit" class="btn btn-login">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                </button>
            </form>
        </div>
    </div>
</body>
</html>





