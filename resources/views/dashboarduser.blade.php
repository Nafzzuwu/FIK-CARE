@extends('layouts.user')

@section('content')

<style>
    /* Override body jika perlu konsistensi penuh */
    body {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%) !important;
    }

    /* HEADER DASHBOARD */
    .dashboard-header {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 40px;
        border-radius: 20px;
        color: white;
        margin-bottom: 40px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        text-align: center;
    }

    .dashboard-header h2 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .dashboard-header p {
        font-size: 1rem;
        color: rgba(255, 255, 255, 0.8);
        margin: 0;
    }

    /* FEATURE CARD */
    .feature-card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 40px 30px;
        text-align: center;
        color: white;
        transition: all 0.3s ease;
        cursor: pointer;
        height: 280px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-decoration: none;
    }

    .feature-card:hover {
        background: rgba(255, 255, 255, 0.12);
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.3);
        border-color: rgba(255, 255, 255, 0.2);
    }

    .feature-icon {
        width: 80px;
        height: 80px;
        background: rgba(96, 165, 250, 0.15);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        color: #60a5fa;
        margin-bottom: 20px;
    }

    .feature-card:hover .feature-icon {
        background: rgba(96, 165, 250, 0.25);
        transform: scale(1.05);
    }

    .feature-title {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 12px;
        color: white;
    }

    .feature-card p {
        font-size: 0.95rem;
        color: rgba(255, 255, 255, 0.7);
        margin: 0;
        line-height: 1.6;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .dashboard-header {
            padding: 30px 20px;
        }

        .dashboard-header h2 {
            font-size: 1.6rem;
        }

        .feature-card {
            height: auto;
            min-height: 250px;
            margin-bottom: 20px;
        }
    }
</style>

<div class="container py-5">

    <!-- HEADER -->
    <div class="dashboard-header">
        <h2>Dashboard Pengguna</h2>
        <p>Selamat datang di layanan aspirasi dan pengaduan Fakultas Ilmu Komputer.</p>
    </div>

    <!-- MENU -->
    <div class="row g-4">

        <div class="col-lg-4 col-md-6">
            <a href="{{ route('report.create') }}" class="text-decoration-none">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <div class="feature-title">Buat Laporan</div>
                    <p>Ajukan laporan baru untuk disampaikan kepada fakultas.</p>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="{{ route('report.index') }}" class="text-decoration-none">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>
                    <div class="feature-title">Riwayat Laporan</div>
                    <p>Lihat daftar laporan yang sudah Anda kirim.</p>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="/profile" class="text-decoration-none">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-person-circle"></i>
                    </div>
                    <div class="feature-title">Profil Saya</div>
                    <p>Kelola pengaturan akun Anda.</p>
                </div>
            </a>
        </div>

    </div>

</div>
@endsection