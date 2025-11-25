<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FIK Care</title>

    <link rel="stylesheet" href="{{ asset('/assets/css/login.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body>

    <div class="login-wrapper">

        <img src="/your-logo.png" alt="Logo">

        <h2>Masuk ke FIK Care</h2>

        @if (session('status'))
            <p style="color: #22c55e; font-size:14px; margin-bottom:10px;">
                {{ session('status') }}
            </p>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    required autofocus>
                @error('email')
                    <small style="color:#f87171">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group" style="margin-top: 18px;">
                <label for="password">Password</label>
                <input type="password"
                    name="password"
                    id="password"
                    required>
                @error('password')
                    <small style="color:#f87171">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn-login">
                Log In
            </button>

            <div class="extra-links">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Lupa password?</a>
                @endif
            </div>
        </form>
    </div>

</body>
</html>
