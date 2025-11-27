@extends('layouts.user')

@section('content')

<style>
    body {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%) !important;
    }

    /* Profile Card */
    .profile-card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 40px;
        border-radius: 20px;
        color: white;
        box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    }

    /* Profile Header Section */
    .profile-header {
        text-align: center;
        margin-bottom: 40px;
        padding-bottom: 30px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* Profile Image */
    .profile-img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid rgba(96, 165, 250, 0.3);
        background: rgba(255, 255, 255, 0.1);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        margin-bottom: 20px;
    }

    .profile-header h3 {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 8px;
        color: white;
    }

    .profile-header p {
        color: rgba(255, 255, 255, 0.6);
        margin: 0;
        font-size: 0.95rem;
    }

    /* Profile Label */
    .profile-label {
        font-weight: 600;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 8px;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .profile-label i {
        color: #60a5fa;
        font-size: 1rem;
    }

    /* Profile Value */
    .profile-value {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 14px 16px;
        border-radius: 12px;
        margin-bottom: 20px;
        color: rgba(255, 255, 255, 0.85);
        transition: all 0.2s ease;
    }

    .profile-value:hover {
        background: rgba(255, 255, 255, 0.08);
        border-color: rgba(255, 255, 255, 0.15);
    }

    /* Info Grid */
    .info-section {
        margin-top: 10px;
    }

    /* Stats Cards (Optional) */
    .stat-card {
        background: rgba(96, 165, 250, 0.1);
        border: 1px solid rgba(96, 165, 250, 0.2);
        padding: 20px;
        border-radius: 15px;
        text-align: center;
        margin-top: 30px;
    }

    .stat-card h4 {
        font-size: 2rem;
        font-weight: 700;
        color: #60a5fa;
        margin-bottom: 5px;
    }

    .stat-card p {
        color: rgba(255, 255, 255, 0.7);
        margin: 0;
        font-size: 0.9rem;
    }

    /* Button Edit (if needed) */
    .btn-edit {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        border: none;
        padding: 12px 30px;
        border-radius: 25px;
        font-weight: 600;
        color: white;
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        transition: all 0.3s ease;
    }

    .btn-edit:hover {
        background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .profile-card {
            padding: 25px 20px;
        }

        .profile-header h3 {
            font-size: 1.5rem;
        }

        .profile-img {
            width: 100px;
            height: 100px;
        }
    }
</style>

<div class="container py-5">

    <div class="profile-card">

        <!-- Profile Header -->
        <div class="profile-header">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=3b82f6&color=fff&size=150" 
                class="profile-img" 
                alt="Profile Picture">

            <h3>{{ Auth::user()->name }}</h3>
            <p>Pengguna Sistem Pelaporan FIK - CARE</p>
        </div>

        <!-- Biodata Section -->
        <div class="info-section">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="profile-label">
                        <i class="bi bi-person"></i> Nama Lengkap
                    </label>
                    <div class="profile-value">{{ Auth::user()->name }}</div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="profile-label">
                        <i class="bi bi-envelope"></i> Email
                    </label>
                    <div class="profile-value">{{ Auth::user()->email }}</div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="profile-label">
                        <i class="bi bi-calendar-check"></i> Tanggal Registrasi
                    </label>
                    <div class="profile-value">{{ Auth::user()->created_at->format('d M Y, H:i') }}</div>
                </div>

                    <div class="col-md-6 mb-3">
                        <label class="profile-label">
                            <i class="bi bi-shield-check"></i> Role
                        </label>
                        <div class="profile-value">
                            @if(auth()->user()->role === 'admin')
                                <span style="background: rgba(59, 130, 246, 0.2); padding: 4px 12px; border-radius: 20px; color: #60a5fa; font-weight: 600;">
                                    Admin
                                </span>
                            @else
                                <span style="background: rgba(34, 197, 94, 0.2); padding: 4px 12px; border-radius: 20px; color: #22c55e; font-weight: 600;">
                                    User
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection