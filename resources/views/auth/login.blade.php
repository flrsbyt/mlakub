<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Admin - Mlakubromo.id</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            min-height: 100vh;
            background: url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1;
        }
        
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            max-width: 1200px;
            padding: 40px;
            position: relative;
            z-index: 2;
            flex-direction: column;
            text-align: center;
        }
        
        .brand-logo {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            color: white;
            padding: 12px 24px;
            border-radius: 25px;
            display: inline-block;
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 40px;
            box-shadow: 0 4px 20px rgba(255, 107, 53, 0.4);
            letter-spacing: 1px;
        }
        
        .login-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 40px;
            width: 420px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            flex-shrink: 0;
        }
        
        .form-group {
            margin-bottom: 24px;
        }
        
        .form-label {
            display: block;
            color: white;
            font-weight: 500;
            margin-bottom: 8px;
            font-size: 16px;
        }
        
        .form-control {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.9);
            font-size: 16px;
            transition: all 0.3s ease;
            outline: none;
        }
        
        .form-control:focus {
            border-color: #ff6b35;
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.2);
            background: rgba(255, 255, 255, 0.95);
        }
        
        .form-control::placeholder {
            color: #999;
        }
        
        .password-field {
            position: relative;
        }
        
        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #666;
            cursor: pointer;
            font-size: 18px;
            padding: 4px;
        }
        
        .forgot-password {
            text-align: right;
            margin-bottom: 24px;
        }
        
        .forgot-password a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }
        
        .forgot-password a:hover {
            color: white;
        }
        
        .btn-signin {
            width: 100%;
            padding: 16px;
            background: #000;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-signin:hover {
            background: #333;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }
        
        .text-danger {
            color: #ff6b35 !important;
            font-weight: 500;
        }
        
        .is-invalid {
            border-color: #ff6b35 !important;
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.2);
        }
        
        .alert-success {
            background: rgba(40, 167, 69, 0.9);
            color: white;
            border-radius: 12px;
            padding: 12px 16px;
            margin-bottom: 16px;
            font-size: 14px;
        }
        
        .register-link {
            text-align: center;
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
            margin-top: 16px;
        }
        
        .register-link a {
            color: #ff6b35;
            text-decoration: none;
            font-weight: 600;
        }
        
        .register-link a:hover {
            text-decoration: underline;
        }
        
        @media (max-width: 1024px) {
            .container {
                flex-direction: column;
                text-align: center;
                gap: 40px;
                justify-content: center;
            }
            
            .brand-section {
                align-items: center;
            }
            
            .brand-slogan h1,
            .brand-slogan h2,
            .brand-slogan h3 {
                font-size: 3rem;
            }
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            
            .login-container {
                width: 100%;
                max-width: 400px;
                padding: 30px;
            }
            
            .brand-slogan h1,
            .brand-slogan h2,
            .brand-slogan h3 {
                font-size: 2.5rem;
            }
            
            .brand-logo {
                font-size: 14px;
                padding: 10px 20px;
            }
        }
        
        @media (max-width: 480px) {
            .brand-slogan h1,
            .brand-slogan h2,
            .brand-slogan h3 {
                font-size: 2rem;
            }
            
            .login-container {
                padding: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="brand-section">
            <div class="brand-logo">
                MLAKUBROMO.ID
            </div>
        
        <div class="login-container">
            <div class="alert-success" role="alert" style="display: none;">
                Login berhasil!
            </div>
            
            @if ($errors->any())
                <div class="alert alert-danger" style="background: rgba(220, 53, 69, 0.9); color: white; border-radius: 12px; padding: 12px 16px; margin-bottom: 16px; font-size: 14px;">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required>
                    @error('email')
                        <div class="text-danger mt-1" style="font-size: 14px;">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label class="form-label">Kata Sandi</label>
                    <div class="password-field">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan kata sandi" id="password" required>
                        <button type="button" class="password-toggle" onclick="togglePassword()">
                            <i class="fas fa-eye" id="eye-icon"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="text-danger mt-1" style="font-size: 14px;">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="forgot-password">
                    <a href="#">Lupa kata sandi?</a>
                </div>
                
                <button type="submit" class="btn-signin">
                    Masuk
                </button>
            </form>
            
            <div class="register-link">
                Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
            </div>
        </div>
    </div>
    
    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }

        // Form will now submit to Laravel backend
    </script>
</body>
</html>

