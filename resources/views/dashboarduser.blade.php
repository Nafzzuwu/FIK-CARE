@extends('layouts.user')

@section('content')

<style>
    body {
        background: #627180 !important;
    }

    /* NAVBAR PROFILE */
    .profile-menu {
        background: #3c4753;
        border-radius: 10px;
        padding: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.25);
    }
    .profile-menu a {
        color: white !important;
        padding: 8px 12px;
        border-radius: 8px;
        display: block;
        transition: 0.2s;
    }
    .profile-menu a:hover {
        background: rgba(255,255,255,0.12);
    }

    /* HEADER */
    .dashboard-header {
        background: linear-gradient(135deg,#3d4954,#495663);
        padding: 35px;
        border-radius: 18px;
        color: white;
        margin-bottom: 35px;
        box-shadow: 0 6px 16px rgba(0,0,0,0.25);
    }

    /* FEATURE CARD */
    .feature-card {
        background: #495663;
        border-radius: 20px;
        padding: 35px 25px;
        text-align: center;
        color: white;
        transition: 0.3s ease;
        cursor: pointer;
        box-shadow: inset 0 0 8px rgba(255,255,255,0.05),
                    0 6px 14px rgba(0,0,0,0.25);
        height: 230px; /* FIX sehingga simetris */
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .feature-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 14px 20px rgba(0,0,0,0.35);
        background: #556270;
    }

    .feature-icon {
        font-size: 52px;
        margin-bottom: 15px;
    }

    .feature-title {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 8px;
    }
</style>

<div class="container py-5">

    <!-- HEADER -->
    <div class="dashboard-header text-center">
        <h2 class="fw-bold">Dashboard Pengguna</h2>
        <p>Selamat datang di layanan aspirasi dan pengaduan Fakultas Ilmu Komputer.</p>
    </div>

    <!-- MENU -->
    <div class="row g-4">

        <div class="col-md-4">
            <a href="{{ route('report.create') }}" class="text-decoration-none">
                <div class="feature-card">
                    <div class="feature-icon"><i class="bi bi-pencil-square"></i></div>
                    <div class="feature-title">Buat Laporan</div>
                    <p>Ajukan laporan baru untuk disampaikan kepada fakultas.</p>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('report.index') }}" class="text-decoration-none">
                <div class="feature-card">
                    <div class="feature-icon"><i class="bi bi-file-earmark-text"></i></div>
                    <div class="feature-title">Riwayat Laporan</div>
                    <p>Lihat daftar laporan yang sudah Anda kirim.</p>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="/profile" class="text-decoration-none">
                <div class="feature-card">
                    <div class="feature-icon"><i class="bi bi-person-circle"></i></div>
                    <div class="feature-title">Profil Saya</div>
                    <p>Kelola pengaturan akun Anda.</p>
                </div>
            </a>
        </div>

    </div>

</div>
@endsection
