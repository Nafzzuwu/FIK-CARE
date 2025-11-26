@extends('layouts.user')

@section('content')

<style>
    .profile-card {
        background: #475569;
        padding: 25px;
        border-radius: 14px;
        color: white;
        box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    }

    .profile-img {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #fff;
        background: #334155;
    }

    .profile-label {
        font-weight: 600;
        color: #E5E7EB;
        margin-bottom: 5px;
    }

    .profile-value {
        background: #374151;
        padding: 12px;
        border-radius: 10px;
        margin-bottom: 15px;
        color: #F3F4F6;
    }

    .btn-edit {
        background: #14b8a6;
        border: none;
        padding: 10px 20px;
        border-radius: 10px;
        font-weight: 600;
    }

    .btn-edit:hover {
        background: #0d9488;
    }
</style>

<div class="container py-4">

    <div class="profile-card">

        <div class="text-center mb-4">
        <!-- Foto Profil dari online -->
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=4e73df&color=fff&size=150" 
                class="profile-img mb-3" 
                alt="Profile">

            <h3 class="fw-bold mb-0">{{ Auth::user()->name }}</h3>
            <p class="text-secondary">Pengguna Sistem Pelaporan</p>
        </div>

        <!-- Biodata -->
        <div class="row">
            <div class="col-md-6">
                <label class="profile-label">Nama Lengkap</label>
                <div class="profile-value">{{ Auth::user()->name }}</div>
            </div>

            <div class="col-md-6">
                <label class="profile-label">Email</label>
                <div class="profile-value">{{ Auth::user()->email }}</div>
            </div>

            <div class="col-md-6">
                <label class="profile-label">Tanggal Registrasi</label>
                <div class="profile-value">{{ Auth::user()->created_at->format('d M Y') }}</div>
            </div>

            <div class="col-md-6">
                <label class="profile-label">Role</label>
                <div class="profile-value">User</div>
            </div>
        </div>
    </div>
</div>

@endsection
