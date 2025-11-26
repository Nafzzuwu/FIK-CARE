<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - FIK CARE</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <style>
        body {
            background-color: #6B7280;
            color: white;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar-custom {
            background-color: #1f2937;
        }

        .card-custom {
            background-color: #374151;
            border-radius: 14px;
            padding: 22px;
            color: white;
            transition: .3s;
        }

        .card-custom:hover {
            background-color: #4b5563;
            transform: translateY(-5px);
        }

        .btn-back {
            background: #E5E7EB;
            color: #1F2937;
            border-radius: 10px;
            padding: 8px 16px;
        }
        .btn-back:hover {
            background: #fff;
        }
    </style>

    @stack('styles')
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm py-3">
    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('assets/img/logo.png') }}" height="40" class="me-2">
            FIK - CARE | Admin
        </a>

        <div class="dropdown ms-auto">
            <a class="text-white dropdown-toggle text-decoration-none fw-semibold d-flex align-items-center gap-2"
               data-bs-toggle="dropdown" href="#">
               <i class="bi bi-person-circle fs-5"></i>
               {{ auth()->user()->name }}
            </a>

            <ul class="dropdown-menu dropdown-menu-end shadow">
                <li>
                    <a class="dropdown-item" href="/profile">
                        <i class="bi bi-gear"></i> Profil
                    </a>
                </li>
                <li>
                    <form method="GET" action="{{ route('logout') }}">
                        <button class="dropdown-item text-danger">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>

    </div>
</nav>

@if(!request()->routeIs('admin.dashboard'))
<div class="container mt-3">
    <a href="{{ route('admin.dashboard') }}" class="btn btn-back shadow-sm">
        <i class="bi bi-arrow-left me-2"></i> Kembali
    </a>
</div>
@endif

<main class="container py-4">
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')

</body>
</html>
