<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lupa Password - FIK Care</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/fikcarelogo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
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

        .card {
            background: rgba(31, 41, 55, 0.9);
            backdrop-filter: blur(10px);
            padding: 40px 35px;
            border-radius: 20px;
            width: 100%;
            max-width: 440px;
            color: white;
            box-shadow: 0 20px 60px rgba(0,0,0,0.5);
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

        .icon-container {
            text-align: center;
            margin-bottom: 20px;
            opacity: 0;
            animation: fadeInDown 0.6s ease 0.2s forwards;
        }

        .reset-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            color: white;
            animation: rotateBounce 0.8s ease-out;
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.4);
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

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h3 {
            text-align: center;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #60a5fa, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
            font-size: 1.8rem;
            opacity: 0;
            animation: fadeInUp 0.6s ease 0.3s forwards;
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
            text-align: center;
            color: #cbd5e1;
            margin-bottom: 30px;
            line-height: 1.6;
            opacity: 0;
            animation: fadeInUp 0.6s ease 0.4s forwards;
        }

        .form-group {
            margin-bottom: 18px;
            position: relative;
            opacity: 0;
            animation: fadeInUp 0.6s ease forwards;
        }

        .form-group:nth-child(1) { animation-delay: 0.5s; }
        .form-group:nth-child(2) { animation-delay: 0.55s; }
        .form-group:nth-child(3) { animation-delay: 0.6s; }

        label {
            font-size: 13px;
            color: #cbd5e1;
            font-weight: 500;
            display: block;
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
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
            padding: 12px 12px 12px 40px;
            border-radius: 10px;
            border: 2px solid transparent;
            background: #374151;
            color: white;
            outline: none;
            font-size: 14px;
            transition: all 0.3s ease;
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

        /* Password match indicator */
        .match-indicator {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 16px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .match-indicator.show {
            opacity: 1;
        }

        .match-indicator.match {
            color: #22c55e;
        }

        .match-indicator.no-match {
            color: #ef4444;
        }

        button {
            margin-top: 20px;
            width: 100%;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            border: none;
            padding: 13px;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            opacity: 0;
            animation: fadeInUp 0.6s ease 0.65s forwards;
        }

        button::before {
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

        button:hover::before {
            width: 300px;
            height: 300px;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.4);
        }

        button:active {
            transform: translateY(0);
        }

        button.loading {
            pointer-events: none;
            opacity: 0.7;
        }

        button.loading::after {
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

        a {
            color: #93c5fd;
            text-decoration: none;
            display: block;
            margin-top: 18px;
            text-align: center;
            font-size: 14px;
            transition: color 0.3s;
            position: relative;
            opacity: 0;
            animation: fadeInUp 0.6s ease 0.7s forwards;
        }

        a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: #3b82f6;
            transition: width 0.3s;
        }

        a:hover::after {
            width: 60%;
        }

        a:hover {
            color: #3b82f6;
        }

        .success-message {
            color: #22c55e;
            text-align: center;
            background: rgba(34, 197, 94, 0.1);
            padding: 12px;
            border-radius: 10px;
            border: 1px solid rgba(34, 197, 94, 0.3);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            animation: fadeInDown 0.5s ease;
        }

        .error-message {
            color: #f87171;
            text-align: center;
            background: rgba(239, 68, 68, 0.1);
            padding: 12px;
            border-radius: 10px;
            border: 1px solid rgba(239, 68, 68, 0.3);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            animation: shake 0.4s ease;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }

        @media (max-width: 480px) {
            .card {
                padding: 30px 25px;
            }

            h3 {
                font-size: 1.5rem;
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

<div class="card">

    <div class="icon-container">
        <div class="reset-icon">
            <i class="bi bi-shield-lock-fill"></i>
        </div>
    </div>

    <h3>Reset Password</h3>
    <p class="subtitle">
        Masukkan email dan password baru untuk mereset akun Anda.
    </p>

    @if(session('status'))
    <div class="success-message">
        <i class="bi bi-check-circle-fill"></i>
        <span>{{ session('status') }}</span>
    </div>
    @endif

    @if($errors->any())
    <div class="error-message">
        <i class="bi bi-exclamation-circle-fill"></i>
        <span>{{ $errors->first() }}</span>
    </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" id="resetForm">
        @csrf

        <div class="form-group">
            <label>Email</label>
            <div class="input-wrapper">
                <i class="bi bi-envelope-fill input-icon"></i>
                <input type="email" name="email" id="emailInput" placeholder="nama@email.com" value="{{ old('email') }}" required autocomplete="email">
            </div>
        </div>

        <div class="form-group">
            <label>Password Baru</label>
            <div class="input-wrapper">
                <i class="bi bi-lock-fill input-icon"></i>
                <input type="password" name="new_password" id="newPasswordInput" placeholder="Masukkan password baru" required autocomplete="new-password">
                <i class="bi bi-eye password-toggle" id="toggleNewPassword"></i>
            </div>
        </div>

        <div class="form-group">
            <label>Ulangi Password Baru</label>
            <div class="input-wrapper">
                <i class="bi bi-shield-lock-fill input-icon"></i>
                <input type="password" name="new_password_confirmation" id="confirmPasswordInput" placeholder="Ulangi password baru" required autocomplete="new-password">
                <i class="match-indicator" id="matchIndicator"></i>
            </div>
        </div>

        <button type="submit" id="resetBtn">
            <i class="bi bi-arrow-clockwise"></i> Reset Password
        </button>

        <a href="{{ route('login') }}">
            <i class="bi bi-arrow-left"></i> Kembali ke Login
        </a>
    </form>

</div>

<script>
    // Password toggle functionality
    const toggleNewPassword = document.getElementById('toggleNewPassword');
    const newPasswordInput = document.getElementById('newPasswordInput');

    toggleNewPassword.addEventListener('click', function() {
        const type = newPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        newPasswordInput.setAttribute('type', type);
        
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });

    // Password match indicator
    const confirmPasswordInput = document.getElementById('confirmPasswordInput');
    const matchIndicator = document.getElementById('matchIndicator');

    function checkPasswordMatch() {
        const newPassword = newPasswordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        if (confirmPassword.length === 0) {
            matchIndicator.classList.remove('show');
            return;
        }

        matchIndicator.classList.add('show');

        if (newPassword === confirmPassword) {
            matchIndicator.className = 'match-indicator show match';
            matchIndicator.innerHTML = '<i class="bi bi-check-circle-fill"></i>';
        } else {
            matchIndicator.className = 'match-indicator show no-match';
            matchIndicator.innerHTML = '<i class="bi bi-x-circle-fill"></i>';
        }
    }

    newPasswordInput.addEventListener('input', checkPasswordMatch);
    confirmPasswordInput.addEventListener('input', checkPasswordMatch);

    // Form submission
    const resetForm = document.getElementById('resetForm');
    const resetBtn = document.getElementById('resetBtn');
    let isSubmitting = false;

    resetForm.addEventListener('submit', function(e) {
        // Prevent double submission
        if (isSubmitting) {
            e.preventDefault();
            return false;
        }

        // Check if passwords match
        if (newPasswordInput.value !== confirmPasswordInput.value) {
            e.preventDefault();
            confirmPasswordInput.focus();
            confirmPasswordInput.parentElement.parentElement.style.animation = 'shake 0.4s ease';
            setTimeout(() => {
                confirmPasswordInput.parentElement.parentElement.style.animation = '';
            }, 400);
            return;
        }

        // Show loading state
        if (resetForm.checkValidity()) {
            isSubmitting = true;
            resetBtn.classList.add('loading');
            resetBtn.innerHTML = '<i class="bi bi-arrow-clockwise"></i> Memproses...';
            
            // Safety timeout: remove loading if still here after 10 seconds
            setTimeout(function() {
                if (isSubmitting) {
                    resetBtn.classList.remove('loading');
                    resetBtn.innerHTML = '<i class="bi bi-arrow-clockwise"></i> Reset Password';
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

        input.addEventListener('input', function() {
            if (this.value.length > 0) {
                this.style.borderColor = '#3b82f6';
            } else {
                this.style.borderColor = 'transparent';
            }
        });
    });

    // Email validation visual feedback
    const emailInput = document.getElementById('emailInput');
    emailInput.addEventListener('blur', function() {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (this.value && !emailRegex.test(this.value)) {
            this.style.borderColor = '#ef4444';
        } else if (this.value) {
            this.style.borderColor = '#22c55e';
        }
    });

    // Auto-hide success/error messages after 5 seconds
    const successMsg = document.querySelector('.success-message');
    const errorMsg = document.querySelector('.error-message');

    if (successMsg) {
        setTimeout(() => {
            successMsg.style.animation = 'fadeInDown 0.5s ease reverse';
            setTimeout(() => successMsg.remove(), 500);
        }, 5000);
    }

    if (errorMsg) {
        setTimeout(() => {
            errorMsg.style.animation = 'fadeInDown 0.5s ease reverse';
            setTimeout(() => errorMsg.remove(), 500);
        }, 5000);
    }
</script>

</body>
</html>