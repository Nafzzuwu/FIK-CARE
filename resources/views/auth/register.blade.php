<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - FIK Care</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/fikcarelogo.png') }}">

    <style>
        body {
            margin: 0;
            background: #111827;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-wrapper {
            background: #1f2937;
            padding: 40px 35px;
            border-radius: 18px;
            width: 100%;
            max-width: 440px;
            color: white;
            box-shadow: 0 6px 18px rgba(0,0,0,0.35);
            text-align: center;
        }

        .logo {
            width: 80px;
            margin-bottom: 14px;
        }

        h2 {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .subtitle {
            font-size: 14px;
            color: #cbd5f5;
            margin-bottom: 26px;
        }

        .form-group {
            margin-bottom: 16px;
            text-align: left;
        }

        label {
            font-size: 13px;
            color: #cbd5f5;
        }

        input {
            width: 100%;
            margin-top: 6px;
            background: #374151;
            border: none;
            border-radius: 8px;
            padding: 10px 12px;
            color: white;
        }

        input:focus {
            background: #4b5563;
            outline: none;
        }

        .btn-register {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: none;
            background: #1e3a8a;
            color: #f0f9ff;
            font-weight: 600;
            transition: .25s;
            cursor: pointer;
        }

        .btn-register:hover {
            background: #4b5563;
        }

        .extra-links {
            margin-top: 14px;
            font-size: 13px;
        }

        .extra-links a {
            color: #cbd5f5;
            text-decoration: none;
        }

        .extra-links a:hover {
            color: white;
        }

        .error-text {
            font-size: 12px;
            color: #f87171;
            margin-top: 4px;
        }
    </style>
</head>
<body>

<div class="register-wrapper">

    <img src="{{ asset('assets/img/logo.png') }}" class="logo">

    <h2>Buat Akun</h2>
    <div class="subtitle">Daftar untuk menggunakan FIK CARE</div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="name" required>
            @error('name') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required>
            @error('email') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
            @error('password') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn-register">Daftar</button>

        <div class="extra-links">
            <a href="{{ route('login') }}">Sudah punya akun? Login</a>
        </div>

    </form>

</div>

</body>
</html>
