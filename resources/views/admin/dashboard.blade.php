@extends('layouts.admin')

@section('content')

<style>
    .dashboard-header {
        background: #1f2937;
        padding: 35px;
        border-radius: 18px;
        color: white;
        margin-bottom: 35px;
        box-shadow: 0 6px 16px rgba(0,0,0,0.25);
    }
    .feature-card {
        background: #374151;
        border-radius: 20px;
        padding: 35px 25px;
        text-align: center;
        color: white;
        transition: .3s;
        height: 230px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .feature-card:hover {
        background: #4b5563;
        transform: translateY(-8px);
    }
    .feature-icon {
        font-size: 50px;
    }
</style>

<div class="container py-5">

    <div class="dashboard-header text-center">
        <h2 class="fw-bold">Dashboard Admin</h2>
        <p>Kelola laporan pengguna dan data sistem FIK CARE.</p>
    </div>

    <div class="row g-4">

        <div class="col-md-4">
            <a href="{{ route('admin.daftarlaporan') }}" class="text-decoration-none">
                <div class="feature-card">
                    <div class="feature-icon"><i class="bi bi-file-earmark-text"></i></div>
                    <h5 class="fw-bold mt-3">Daftar Laporan</h5>
                    <p>Kelola seluruh laporan yang masuk.</p>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('admin.daftarpengguna') }}" class="text-decoration-none">
                <div class="feature-card">
                    <div class="feature-icon"><i class="bi bi-people"></i></div>
                    <h5 class="fw-bold mt-3">Daftar Pengguna</h5>
                    <p>Lihat dan kelola akun pengguna.</p>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="/profile" class="text-decoration-none">
                <div class="feature-card">
                    <div class="feature-icon"><i class="bi bi-person-circle"></i></div>
                    <h5 class="fw-bold mt-3">Profil Admin</h5>
                    <p>Atur informasi akun admin.</p>
                </div>
            </a>
        </div>

    </div>

</div>

@endsection
