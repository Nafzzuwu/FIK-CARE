<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - FIK Care</title>
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
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px 0;
            position: relative;
            overflow-x: hidden;
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

        .register-wrapper {
            background: rgba(31, 41, 55, 0.9);
            backdrop-filter: blur(10px);
            padding: 40px 35px;
            border-radius: 20px;
            width: 100%;
            max-width: 440px;
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
            font-weight: bold;
            margin-bottom: 5px;
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
            margin-bottom: 16px;
            text-align: left;
            position: relative;
            opacity: 0;
            animation: fadeInUp 0.6s ease forwards;
        }

        .form-group:nth-child(1) { animation-delay: 0.4s; }
        .form-group:nth-child(2) { animation-delay: 0.45s; }
        .form-group:nth-child(3) { animation-delay: 0.5s; }
        .form-group:nth-child(4) { animation-delay: 0.55s; }

        label {
            font-size: 13px;
            color: #cbd5e1;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
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

        /* Password strength indicator */
        .password-strength {
            margin-top: 8px;
            height: 4px;
            background: #374151;
            border-radius: 2px;
            overflow: hidden;
            display: none;
        }

        .password-strength.active {
            display: block;
        }

        .strength-bar {
            height: 100%;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .strength-weak { background: #ef4444; width: 33%; }
        .strength-medium { background: #f59e0b; width: 66%; }
        .strength-strong { background: #22c55e; width: 100%; }

        .strength-text {
            font-size: 11px;
            margin-top: 4px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .strength-text.active {
            opacity: 1;
        }

        .btn-register {
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
            animation: fadeInUp 0.6s ease 0.6s forwards;
        }

        .btn-register::before {
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

        .btn-register:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.4);
        }

        .btn-register:active {
            transform: translateY(0);
        }

        .extra-links {
            margin-top: 18px;
            font-size: 13px;
            opacity: 0;
            animation: fadeInUp 0.6s ease 0.7s forwards;
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

        /* Loading state */
        .btn-register.loading {
            pointer-events: none;
            opacity: 0.7;
        }

        .btn-register.loading::after {
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
            .register-wrapper {
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

<div class="register-wrapper">

    <img src="{{ asset('assets/img/logo.png') }}" class="logo">

    <h2>Buat Akun</h2>
    <div class="subtitle">Daftar untuk menggunakan FIK CARE</div>

    <form method="POST" action="{{ route('register') }}" id="registerForm">
        @csrf

        <div class="form-group">
            <label><i class="bi bi-person"></i> Nama Lengkap</label>
            <div class="input-wrapper">
                <i class="bi bi-person-circle input-icon"></i>
                <input type="text" name="name" id="nameInput" value="{{ old('name') }}" required autocomplete="name">
            </div>
            @error('name') 
                <div class="error-text">
                    <i class="bi bi-exclamation-circle"></i>
                    {{ $message }}
                </div> 
            @enderror
        </div>

        <div class="form-group">
            <label><i class="bi bi-envelope"></i> Email</label>
            <div class="input-wrapper">
                <i class="bi bi-envelope-fill input-icon"></i>
                <input type="email" name="email" id="emailInput" value="{{ old('email') }}" required autocomplete="email">
            </div>
            @error('email') 
                <div class="error-text">
                    <i class="bi bi-exclamation-circle"></i>
                    {{ $message }}
                </div> 
            @enderror
        </div>

        <div class="form-group">
            <label><i class="bi bi-lock"></i> Password</label>
            <div class="input-wrapper">
                <i class="bi bi-lock-fill input-icon"></i>
                <input type="password" name="password" id="passwordInput" required autocomplete="new-password">
                <i class="bi bi-eye password-toggle" id="togglePassword"></i>
            </div>
            <div class="password-strength" id="strengthBar">
                <div class="strength-bar"></div>
            </div>
            <div class="strength-text" id="strengthText"></div>
            @error('password') 
                <div class="error-text">
                    <i class="bi bi-exclamation-circle"></i>
                    {{ $message }}
                </div> 
            @enderror
        </div>

        <div class="form-group">
            <label><i class="bi bi-shield-check"></i> Konfirmasi Password</label>
            <div class="input-wrapper">
                <i class="bi bi-shield-lock-fill input-icon"></i>
                <input type="password" name="password_confirmation" id="confirmPasswordInput" required autocomplete="new-password">
                <i class="match-indicator" id="matchIndicator"></i>
            </div>
        </div>

        <button type="submit" class="btn-register" id="registerBtn">Daftar</button>

        <div class="extra-links">
            <a href="{{ route('login') }}">Sudah punya akun? Login</a>
        </div>

    </form>

</div>

<script>
    // Password toggle functionality
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('passwordInput');

    togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });

    // Password strength checker
    const strengthBar = document.getElementById('strengthBar');
    const strengthText = document.getElementById('strengthText');
    const strengthBarInner = strengthBar.querySelector('.strength-bar');

    passwordInput.addEventListener('input', function() {
        const password = this.value;
        
        if (password.length === 0) {
            strengthBar.classList.remove('active');
            strengthText.classList.remove('active');
            return;
        }

        strengthBar.classList.add('active');
        strengthText.classList.add('active');

        let strength = 0;
        
        // Check length
        if (password.length >= 8) strength++;
        if (password.length >= 12) strength++;
        
        // Check for mixed case
        if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
        
        // Check for numbers
        if (/\d/.test(password)) strength++;
        
        // Check for special characters
        if (/[^A-Za-z0-9]/.test(password)) strength++;

        // Update UI
        strengthBarInner.className = 'strength-bar';
        
        if (strength <= 2) {
            strengthBarInner.classList.add('strength-weak');
            strengthText.textContent = 'Lemah';
            strengthText.style.color = '#ef4444';
        } else if (strength <= 4) {
            strengthBarInner.classList.add('strength-medium');
            strengthText.textContent = 'Sedang';
            strengthText.style.color = '#f59e0b';
        } else {
            strengthBarInner.classList.add('strength-strong');
            strengthText.textContent = 'Kuat';
            strengthText.style.color = '#22c55e';
        }
    });

    // Password match indicator
    const confirmPasswordInput = document.getElementById('confirmPasswordInput');
    const matchIndicator = document.getElementById('matchIndicator');

    function checkPasswordMatch() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        if (confirmPassword.length === 0) {
            matchIndicator.classList.remove('show');
            return;
        }

        matchIndicator.classList.add('show');

        if (password === confirmPassword) {
            matchIndicator.className = 'match-indicator show match';
            matchIndicator.innerHTML = '<i class="bi bi-check-circle-fill"></i>';
        } else {
            matchIndicator.className = 'match-indicator show no-match';
            matchIndicator.innerHTML = '<i class="bi bi-x-circle-fill"></i>';
        }
    }

    passwordInput.addEventListener('input', checkPasswordMatch);
    confirmPasswordInput.addEventListener('input', checkPasswordMatch);

    // Form submission animation
    const registerForm = document.getElementById('registerForm');
    const registerBtn = document.getElementById('registerBtn');
    let isSubmitting = false;

    registerForm.addEventListener('submit', function(e) {
        // Prevent double submission
        if (isSubmitting) {
            e.preventDefault();
            return false;
        }

        // Check if passwords match
        if (passwordInput.value !== confirmPasswordInput.value) {
            e.preventDefault();
            confirmPasswordInput.focus();
            confirmPasswordInput.parentElement.parentElement.style.animation = 'shake 0.4s ease';
            setTimeout(() => {
                confirmPasswordInput.parentElement.parentElement.style.animation = '';
            }, 400);
            return;
        }

        // Show loading state
        if (registerForm.checkValidity()) {
            isSubmitting = true;
            registerBtn.classList.add('loading');
            registerBtn.textContent = 'Mendaftar...';
            
            // Safety timeout: remove loading if still here after 10 seconds
            setTimeout(function() {
                if (isSubmitting) {
                    registerBtn.classList.remove('loading');
                    registerBtn.textContent = 'Daftar';
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

    // Name input: capitalize first letter
    const nameInput = document.getElementById('nameInput');
    nameInput.addEventListener('blur', function() {
        this.value = this.value.split(' ')
            .map(word => word.charAt(0).toUpperCase() + word.slice(1).toLowerCase())
            .join(' ');
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
</script>

</body>
</html>