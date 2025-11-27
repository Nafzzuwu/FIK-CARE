@extends('layouts.admin')

@section('content')

<style>
    body {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%) !important;
    }

    /* Dashboard Header */
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

    /* Feature Card */
    .feature-card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 40px 30px;
        text-align: center;
        color: white;
        transition: all 0.3s ease;
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

    .feature-card h5 {
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

    /* Stats Cards */
    .stats-row {
        margin-bottom: 30px;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        padding: 25px;
        color: white;
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }

    .stat-card .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 15px;
    }

    .stat-card.blue .stat-icon {
        background: rgba(59, 130, 246, 0.2);
        color: #60a5fa;
    }

    .stat-card.green .stat-icon {
        background: rgba(34, 197, 94, 0.2);
        color: #4ade80;
    }

    .stat-card.yellow .stat-icon {
        background: rgba(251, 191, 36, 0.2);
        color: #fbbf24;
    }

    .stat-card h3 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .stat-card p {
        color: rgba(255, 255, 255, 0.7);
        margin: 0;
        font-size: 0.9rem;
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

        .stat-card {
            margin-bottom: 15px;
        }
    }
</style>

<div class="container py-5">

    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <h2>Dashboard Admin</h2>
        <p>Kelola laporan pengguna dan data sistem FIK CARE dengan mudah dan efisien.</p>
    </div>

    <!-- Menu Cards -->
    <div class="row g-4">

        <div class="col-lg-4 col-md-6">
            <a href="{{ route('admin.daftarlaporan') }}" class="text-decoration-none">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>
                    <h5>Daftar Laporan</h5>
                    <p>Kelola seluruh laporan yang masuk dari pengguna</p>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="{{ route('admin.daftarpengguna') }}" class="text-decoration-none">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <h5>Daftar Pengguna</h5>
                    <p>Lihat dan kelola akun pengguna sistem</p>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="/profile" class="text-decoration-none">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-person-circle"></i>
                    </div>
                    <h5>Profil Admin</h5>
                    <p>Atur informasi dan pengaturan akun admin</p>
                </div>
            </a>
        </div>

    </div>

</div>

@endsection