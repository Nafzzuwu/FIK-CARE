<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Fasilkom</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #6B7280;
            color: white;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar-custom {
            background-color: #475569;
        }

        .card-custom {
            background-color: #4B5563;
            border: none;
            transition: 0.3s;
            color: white;
            border-radius: 14px;
        }

        .card-custom:hover {
            background-color: #556070;
            transform: translateY(-4px);
        }

        .section-header {
            background-color: #334155;
            border-radius: 12px;
            padding: 22px;
        }

        /* BACK BUTTON */
        .btn-back {
        background: #E5E7EB;
        color: #1F2937;
        border-radius: 10px;
        padding: 8px 16px;
        }
        .btn-back:hover {
        background: #ffffff;
        color: #111827;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm py-3" style="background:#3d4954">
    <div class="container d-flex align-items-center">

        <!-- Logo + Title -->
        <a class="navbar-brand fw-bold" href="/dashboard">
            <img src="{{ asset('assets/img/logo.png') }}" height="40" class="me-2">
            FIK - CARE
        </a>

        <!-- User Dropdown -->
        <div class="dropdown ms-auto">
            <a class="text-white dropdown-toggle text-decoration-none fw-semibold d-flex align-items-center gap-2"
               data-bs-toggle="dropdown" href="#">

                <i class="bi bi-person-circle fs-5"></i>

                @if(auth()->check())
                    {{ auth()->user()->name }}
                @endif
            </a>

            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                <li>
                    <a class="dropdown-item d-flex align-items-center gap-2" href="/profile">
                        <i class="bi bi-gear"></i> Profil
                    </a>
                </li>
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

<!-- BACK BUTTON (Hanya muncul jika bukan di dashboard) -->
@if(auth()->check() && !request()->routeIs('dashboarduser'))
<div class="container mt-3">
    <a href="{{ url()->previous() }}" class="btn btn-back shadow-sm d-inline-flex align-items-center">
        <i class="bi bi-arrow-left me-2"></i> Kembali
    </a>
</div>
@endif

<!-- CONTENT -->
<main class="container py-4">
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
