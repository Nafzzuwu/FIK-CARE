<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - FIK Care</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/fikcarelogo.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        /* Animated Background Particles */
        .particle {
            position: absolute;
            background: rgba(59, 130, 246, 0.5);
            border-radius: 50%;
            animation: float 15s infinite ease-in-out;
            pointer-events: none;
        }

        @keyframes float {
            0%, 100% {
                transform: translate(0, 0) scale(1);
                opacity: 0.5;
            }
            50% {
                transform: translate(50px, -50px) scale(1.2);
                opacity: 0.8;
            }
        }

        .login-wrapper {
            background: rgba(31, 41, 55, 0.9);
            backdrop-filter: blur(10px);
            padding: 40px 35px;
            border-radius: 20px;
            width: 100%;
            max-width: 420px;
            color: white;
            box-shadow: 0 20px 60px rgba(0,0,0,0.5);
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 10;
            opacity: 0;
            transform: scale(0.9);
            animation: popIn 0.5s ease forwards;
        }

        @keyframes popIn {
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .logo {
            width: 80px;
            margin-bottom: 14px;
            animation: rotateBounce 0.8s ease-out;
        }

        @keyframes rotateBounce {
            0% {
                transform: rotate(-180deg) scale(0);
            }
            50% {
                transform: rotate(10deg) scale(1.1);
            }
            100% {
                transform: rotate(0) scale(1);
            }
        }

        h2 {
            margin-bottom: 6px;
            font-weight: bold;
            background: linear-gradient(135deg, #60a5fa, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            opacity: 0;
            animation: fadeInUp 0.6s ease 0.2s forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .subtitle {
            font-size: 14px;
            color: #cbd5e1;
            margin-bottom: 26px;
            opacity: 0;
            animation: fadeInUp 0.6s ease 0.3s forwards;
        }

        .form-group {
            margin-bottom: 18px;
            text-align: left;
            position: relative;
            opacity: 0;
            animation: fadeInUp 0.6s ease 0.4s forwards;
        }

        label {
            font-size: 13px;
            color: #cbd5e1;
            font-weight: 500;
        }

        .input-wrapper {
            position: relative;
            margin-top: 6px;
        }

        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 16px;
            transition: color 0.3s;
        }

        input {
            width: 100%;
            background: #374151;
            border: 2px solid transparent;
            border-radius: 10px;
            padding: 12px 12px 12px 40px;
            color: white;
            outline: none;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        input:focus {
            background: #4b5563;
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        input:focus + .input-icon {
            color: #3b82f6;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            cursor: pointer;
            font-size: 16px;
            transition: color 0.3s;
            user-select: none;
        }

        .password-toggle:hover {
            color: #3b82f6;
        }

        .btn-login {
            width: 100%;
            padding: 13px;
            border-radius: 12px;
            border: none;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            margin-top: 10px;
            opacity: 0;
            animation: fadeInUp 0.6s ease 0.5s forwards;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-login:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.4);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .extra-links {
            margin-top: 18px;
            font-size: 13px;
            opacity: 0;
            animation: fadeInUp 0.6s ease 0.6s forwards;
        }

        .extra-links a {
            color: #93c5fd;
            text-decoration: none;
            transition: color 0.3s;
            position: relative;
        }

        .extra-links a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: #3b82f6;
            transition: width 0.3s;
        }

        .extra-links a:hover::after {
            width: 100%;
        }

        .extra-links a:hover {
            color: #3b82f6;
        }

        .error-text {
            font-size: 12px;
            color: #f87171;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 4px;
            animation: shake 0.4s ease;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .success-text {
            color: #22c55e;
            font-size: 14px;
            margin-bottom: 12px;
            padding: 10px;
            background: rgba(34, 197, 94, 0.1);
            border-radius: 8px;
            border: 1px solid rgba(34, 197, 94, 0.3);
            animation: fadeInDown 0.5s ease;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Popup Notification Styles */
        .popup-notification {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            padding: 16px 24px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(16, 185, 129, 0.5);
            font-size: 14px;
            font-weight: 500;
            z-index: 1000;
            animation: slideDown 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .popup-notification.hide {
            animation: slideUp 0.4s ease-out forwards;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateX(-50%) translateY(-30px) scale(0.8);
            }
            to {
                opacity: 1;
                transform: translateX(-50%) translateY(0) scale(1);
            }
        }

        @keyframes slideUp {
            from {
                opacity: 1;
                transform: translateX(-50%) translateY(0);
            }
            to {
                opacity: 0;
                transform: translateX(-50%) translateY(-30px);
            }
        }

        .popup-icon {
            width: 24px;
            height: 24px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #10b981;
            font-weight: bold;
            font-size: 14px;
            animation: checkmark 0.5s ease 0.2s;
        }

        @keyframes checkmark {
            0% {
                transform: scale(0) rotate(-45deg);
            }
            50% {
                transform: scale(1.2) rotate(5deg);
            }
            100% {
                transform: scale(1) rotate(0);
            }
        }

        /* Loading state */
        .btn-login.loading {
            pointer-events: none;
            opacity: 0.7;
        }

        .btn-login.loading::after {
            content: '';
            position: absolute;
            width: 16px;
            height: 16px;
            margin-left: 10px;
            border: 2px solid white;
            border-top-color: transparent;
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        @media (max-width: 480px) {
            .login-wrapper {
                margin: 20px;
                padding: 30px 25px;
            }
        }
    </style>
</head>
<body>

<!-- Animated Background Particles -->
<div class="particle" style="width: 60px; height: 60px; top: 10%; left: 10%; animation-delay: 0s;"></div>
<div class="particle" style="width: 80px; height: 80px; top: 70%; left: 80%; animation-delay: 2s;"></div>
<div class="particle" style="width: 40px; height: 40px; top: 30%; left: 85%; animation-delay: 4s;"></div>
<div class="particle" style="width: 50px; height: 50px; top: 80%; left: 15%; animation-delay: 1s;"></div>
<div class="particle" style="width: 70px; height: 70px; top: 50%; left: 5%; animation-delay: 3s;"></div>

@if(session('success'))
    <div class="popup-notification" id="successPopup">
        <div class="popup-icon">✓</div>
        <span>{{ session('success') }}</span>
    </div>
@endif

<div class="login-wrapper">

    <img src="{{ asset('assets/img/logo.png') }}" class="logo">

    <h2>Masuk FIK CARE</h2>

    @if (session('status'))
        <div class="success-text">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}" id="loginForm">
        @csrf

        <div class="form-group">
            <label>Email</label>
            <div class="input-wrapper">
                <i class="bi bi-envelope input-icon"></i>
                <input type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
            </div>
            @error('email') 
                <div class="error-text">
                    <i class="bi bi-exclamation-circle"></i>
                    {{ $message }}
                </div> 
            @enderror
        </div>

        <div class="form-group">
            <label>Password</label>
            <div class="input-wrapper">
                <i class="bi bi-lock input-icon"></i>
                <input type="password" name="password" id="passwordInput" required autocomplete="current-password">
                <i class="bi bi-eye password-toggle" id="togglePassword"></i>
            </div>
            @error('password') 
                <div class="error-text">
                    <i class="bi bi-exclamation-circle"></i>
                    {{ $message }}
                </div> 
            @enderror
        </div>

        <button type="submit" class="btn-login" id="loginBtn">Masuk</button>

        <div class="extra-links">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Lupa password?</a>
            @endif
        </div>

    </form>

</div>

<script>
    // Auto hide popup after 3 seconds
    const popup = document.getElementById('successPopup');
    if (popup) {
        setTimeout(() => {
            popup.classList.add('hide');
            setTimeout(() => {
                popup.remove();
            }, 400);
        }, 3000);
    }

    // Password toggle functionality
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('passwordInput');

    togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        
        // Toggle icon
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });

    // Form submission animation
    const loginForm = document.getElementById('loginForm');
    const loginBtn = document.getElementById('loginBtn');
    let isSubmitting = false;

    loginForm.addEventListener('submit', function(e) {
        // Prevent double submission
        if (isSubmitting) {
            e.preventDefault();
            return false;
        }
        
        // Show loading state
        if (loginForm.checkValidity()) {
            isSubmitting = true;
            loginBtn.classList.add('loading');
            loginBtn.textContent = 'Memproses...';
            
            // Safety timeout: remove loading if still here after 10 seconds
            setTimeout(function() {
                if (isSubmitting) {
                    loginBtn.classList.remove('loading');
                    loginBtn.textContent = 'Masuk';
                    isSubmitting = false;
                }
            }, 10000);
        }
    });

    // Input focus animations
    const inputs = document.querySelectorAll('input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.style.transform = 'scale(1.02)';
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.style.transform = 'scale(1)';
        });

        // Add typing animation effect
        input.addEventListener('input', function() {
            if (this.value.length > 0) {
                this.style.borderColor = '#3b82f6';
            } else {
                this.style.borderColor = 'transparent';
            }
        });
    });

    // Random particle movement
    const particles = document.querySelectorAll('.particle');
    particles.forEach(particle => {
        const randomX = Math.random() * 100 - 50;
        const randomY = Math.random() * 100 - 50;
        particle.style.setProperty('--random-x', randomX + 'px');
        particle.style.setProperty('--random-y', randomY + 'px');
    });
</script>

</body>
</html>