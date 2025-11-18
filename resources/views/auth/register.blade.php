<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Mlakubromo.id</title>
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
            padding: 40px 0;
            position: relative;
            overflow-x: hidden;
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
            justify-content: space-between;
            width: 100%;
            max-width: 1300px;
            padding: 0 40px;
            position: relative;
            z-index: 2;
        }
        
        .brand-section {
            flex: 1;
            max-width: 500px;
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
        
        .brand-slogan {
            color: white;
        }
        
        .brand-slogan h1 {
            font-size: 4.5rem;
            font-weight: 900;
            margin-bottom: 8px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            line-height: 1;
        }
        
        .brand-slogan h2 {
            font-size: 4.5rem;
            font-weight: 900;
            margin-bottom: 8px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            line-height: 1;
        }
        
        .brand-slogan h3 {
            font-size: 4.5rem;
            font-weight: 900;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            line-height: 1;
        }
        
        .register-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 40px;
            width: 500px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .form-title {
            text-align: center;
            margin-bottom: 32px;
        }
        
        .form-title h2 {
            color: white;
            font-weight: 700;
            margin-bottom: 8px;
            font-size: 28px;
        }
        
        .form-title p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 16px;
        }
        
        .form-row {
            display: flex;
            gap: 16px;
            margin-bottom: 24px;
        }
        
        .form-row .form-group {
            flex: 1;
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
        
        .role-select {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.9);
            font-size: 16px;
            transition: all 0.3s ease;
            outline: none;
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23666' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 16px center;
            background-repeat: no-repeat;
            background-size: 16px;
            padding-right: 48px;
        }
        
        .role-select:focus {
            border-color: #ff6b35;
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.2);
            background-color: rgba(255, 255, 255, 0.95);
        }
        
        .btn-signup {
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
            margin-bottom: 24px;
        }
        
        .btn-signup:hover {
            background: #333;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }
        
        .login-link {
            text-align: center;
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
        }
        
        .login-link a {
            color: #ff6b35;
            text-decoration: none;
            font-weight: 600;
        }
        
        .login-link a:hover {
            text-decoration: underline;
        }
        
        .text-danger {
            color: #ff6b35 !important;
            font-weight: 500;
            font-size: 14px;
        }
        
        @media (max-width: 1024px) {
            .container {
                flex-direction: column;
                text-align: center;
                gap: 40px;
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
            
            .register-container {
                width: 100%;
                max-width: 480px;
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
            
            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }
        
        @media (max-width: 480px) {
            .brand-slogan h1,
            .brand-slogan h2,
            .brand-slogan h3 {
                font-size: 2rem;
            }
            
            .register-container {
                padding: 24px;
            }
            
            .form-title h2 {
                font-size: 24px;
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
        </div>
        
        <div class="register-container">
            <div class="form-title">
                <h2>Buat Akun</h2>
                <p>Bergabung dengan komunitas admin kami</p>
            </div>
            
            <form method="POST" action="{{ route('register') }}" onsubmit="return validateRegisterForm()">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukkan email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Kata Sandi</label>
                        <div class="password-field">
                            <input type="password" class="form-control" name="password" placeholder="Masukkan kata sandi" id="password" required>
                            <button type="button" class="password-toggle" onclick="togglePassword('password', 'eye-icon-1')">
                                <i class="fas fa-eye" id="eye-icon-1"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Konfirmasi Kata Sandi</label>
                        <div class="password-field">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Masukkan ulang kata sandi" id="password_confirmation" required>
                            <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation', 'eye-icon-2')">
                                <i class="fas fa-eye" id="eye-icon-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Peran</label>
                    <select class="role-select" name="role" required>
                        <option value="">Pilih peran Anda</option>
                        <option value="user" {{ old('role', 'user') === 'user' ? 'selected' : '' }}>Pengguna</option>
                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('role')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <button type="submit" class="btn-signup">
                    Buat Akun
                </button>
            </form>
            
            <div class="login-link">
                Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
            </div>
        </div>
    </div>
    
    <script>
        function togglePassword(fieldId, iconId) {
            const passwordField = document.getElementById(fieldId);
            const eyeIcon = document.getElementById(iconId);
            
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
        function validateRegisterForm() {
            const password = document.querySelector('input[name="password"]').value;
            const confirmPassword = document.querySelector('input[name="password_confirmation"]').value;
            if (password !== confirmPassword) {
                alert('Kata sandi dan konfirmasi tidak sama!');
                return false;
            }
            return true;
        }
    </script>
</body>
</html>