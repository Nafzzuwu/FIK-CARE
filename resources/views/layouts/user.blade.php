<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/fikcarelogo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: white;
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
        }

        /* Navbar */
        .navbar-custom {
            background: rgba(2, 6, 23, 0.85);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-weight: 600;
            letter-spacing: 0.5px;
            font-size: 16px;
        }

        .navbar-brand img {
            height: 36px;
        }

        /* User Dropdown */
        .nav-user-text {
            font-size: 14px;
        }

        .nav-user-text small {
            font-size: 11px !important;
        }

        .user-toggle {
            padding: 8px 15px;
            border-radius: 30px;
            transition: all 0.3s ease;
        }

        .user-toggle:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .dropdown-menu {
            background-color: #ffffff;
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            padding: 8px;
            margin-top: 10px !important;
            min-width: 200px;
        }

        .dropdown-item {
            border-radius: 8px;
            padding: 12px 16px;
            font-weight: 500;
            color: #1e293b;
            transition: all 0.2s ease;
            font-size: 14px;
        }

        .dropdown-item:hover {
            background-color: #fee2e2;
            color: #dc2626;
            transform: translateX(4px);
        }

        /* Welcome Section */
        .welcome-section {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            margin-top: 30px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .welcome-section h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .welcome-section p {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.8);
            margin: 0;
        }

        /* Dashboard Cards */
        .card-custom {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            transition: all 0.3s ease;
            color: white;
            padding: 35px 25px;
            text-align: center;
            height: 100%;
        }

        .card-custom:hover {
            background: rgba(255, 255, 255, 0.12);
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            border-color: rgba(255, 255, 255, 0.2);
        }

        .card-icon {
            width: 70px;
            height: 70px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2rem;
            color: #60a5fa;
        }

        .card-custom h5 {
            font-weight: 600;
            margin-bottom: 12px;
            font-size: 1.2rem;
        }

        .card-custom p {
            color: rgba(255, 255, 255, 0.7);
            margin: 0;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        /* Back Button */
        .btn-back {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 50px;
            padding: 10px 24px;
            font-weight: 500;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .btn-back:hover {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            transform: translateX(-3px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            border-color: rgba(255, 255, 255, 0.3);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .welcome-section {
                padding: 30px 20px;
            }

            .welcome-section h2 {
                font-size: 1.6rem;
            }

            .card-custom {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/dashboard">
            <img src="{{ asset('assets/img/logo.png') }}" class="me-2">
            <span>FIK - CARE</span>
        </a>
        
        <div class="dropdown ms-auto">
            <a class="text-white dropdown-toggle text-decoration-none fw-medium d-flex align-items-center gap-2 nav-user-text user-toggle"
               data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                
                <div class="d-flex flex-column text-end d-none d-md-block" style="line-height: 1.3;">
                    <small style="opacity: 0.7;">Selamat Datang! ,</small>
                    @if(auth()->check())
                        <span>{{ auth()->user()->name }}</span>
                    @endif
                </div>

                <div class="bg-white bg-opacity-25 rounded-circle d-flex justify-content-center align-items-center" style="width: 40px; height: 40px;">
                    <i class="bi bi-person-fill fs-5"></i>
                </div>
            </a>
            
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <form method="GET" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item text-danger d-flex align-items-center gap-2">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

@if(auth()->check() && !request()->routeIs('dashboarduser'))
<div class="container mt-4">
    <a href="{{ route('dashboarduser') }}" class="btn btn-back d-inline-flex align-items-center">
        <i class="bi bi-arrow-left me-2"></i> Kembali
    </a>
</div>
@endif

<main class="container py-4">
    @yield('content')
</main>
</body>
</html>