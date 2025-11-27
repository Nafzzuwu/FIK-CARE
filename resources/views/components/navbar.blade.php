<nav class="navbar">
    <style>
    .navbar {
        background: rgba(2,6,23,.85);
        backdrop-filter: blur(8px);
        padding: 15px 8%;
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 999;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .navbar .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 1100px;
        margin: auto;
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 600;
        color: white;
        font-size: 16px;
    }

    .logo img {
        height: 36px;
    }

    .nav-links {
        list-style: none;
        display: flex;
        align-items: center;
        gap: 15px;
        margin: 0;
        padding: 0;
    }

    .nav-links li a {
        color: #cbd5f5;
        text-decoration: none;
        font-weight: 500;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .nav-links li a:hover {
        color: #60a5fa;
    }

    /* Tombol Masuk - Outline Style */
    .btn-login {
        border: 2px solid rgba(229, 231, 235, 0.5);
        padding: 7px 18px;
        border-radius: 25px;
        color: #E5E7EB !important;
        background: transparent;
        transition: all 0.3s ease;
        font-size: 14px;
    }

    .btn-login:hover {
        background: rgba(229, 231, 235, 0.1);
        border-color: #E5E7EB;
        color: white !important;
        transform: translateY(-1px);
    }

    /* Tombol Daftar - Solid Style */
    .btn-register {
        background: #3b82f6;
        padding: 8px 20px;
        border-radius: 25px;
        color: white !important;
        border: 2px solid transparent;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(59, 130, 246, 0.3);
        font-size: 14px;
    }

    .btn-register:hover {
        background: #2563eb;
        transform: translateY(-1px);
        box-shadow: 0 6px 15px rgba(59, 130, 246, 0.4);
    }

    @media(max-width:768px){
        .nav-links{
            display: none;
        }
    }
    </style>

    <div class="container">

        <div class="logo">
            <img src="/assets/img/logo.png" alt="Logo">
            <span>FIK - CARE</span>
        </div>

        <ul class="nav-links">
            <li><a href="#home">Home</a></li>
            <li><a href="#tentang">Tentang Kami</a></li>
            <li><a href="#tatacara">Alur Laporan</a></li>

            <li><a href="{{ route('login') }}" class="btn-login">Masuk</a></li>
            <li><a href="{{ route('register') }}" class="btn-register">Daftar</a></li>
        </ul>

    </div>
</nav>