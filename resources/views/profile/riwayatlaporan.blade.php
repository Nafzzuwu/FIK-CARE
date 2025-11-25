@extends('layouts.user')

@section('content')
<style>
    body {
        background-color: #627180 !important;
    }

    <a href="{{ url()->previous() }}" 
   class="inline-flex items-center px-4 py-2 mb-4 rounded-lg text-white bg-gray-700 hover:bg-gray-800 transition">
    ← Kembali
    </a>

    .page-title {
        color: white;
        font-weight: 700;
        margin-bottom: 25px;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    .card-custom {
        border-radius: 18px;
        background: #424c57;
        color: white;
        padding: 20px;
        border: 1px solid rgba(255,255,255,0.08);
        transition: .25s;
    }

    .card-custom:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 18px rgba(0,0,0,0.25);
        background: #4c5663;
    }

    .card-custom h5 {
        font-weight: 600;
    }

    .desc-text {
        color: #d7dbe0;
        font-size: 0.95rem;
        margin-bottom: 5px;
    }

    .date-text {
        color: #b9c0c7;
    }

    .status-badge {
        font-size: 0.85rem;
        padding: 6px 14px;
        border-radius: 20px;
        font-weight: 600;
        display: inline-block;
    }

    .status-proses { background-color: #ffcc5c; color:black; }
    .status-selesai { background-color: #67f2a4; color:black; }
    .status-ditolak { background-color: #ff6b6b; color:white; }

</style>

<div class="container py-5">

    <h2 class="page-title">Riwayat Laporan</h2>

    <!-- 1 -->
    <div class="card-custom mb-4">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h5>Judul Laporan</h5>
                <p class="desc-text">Deskripsi singkat laporan yang pernah diajukan...</p>
                <small class="date-text">Dikirim: 20 November 2025</small>
            </div>
            <div class="col-md-4 text-end">
                <span class="status-badge status-proses">Sedang Diproses</span>
            </div>
        </div>
    </div>

    <!-- 2 -->
    <div class="card-custom mb-4">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h5>Kebersihan Ruangan</h5>
                <p class="desc-text">Laporan mengenai kondisi kebersihan ruang kuliah...</p>
                <small class="date-text">Dikirim: 10 November 2025</small>
            </div>
            <div class="col-md-4 text-end">
                <span class="status-badge status-selesai">Selesai</span>
            </div>
        </div>
    </div>

    <!-- 3 -->
    <div class="card-custom mb-4">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h5>Kerusakan Fasilitas</h5>
                <p class="desc-text">Laporan kerusakan proyektor di ruang 301...</p>
                <small class="date-text">Dikirim: 5 November 2025</small>
            </div>
            <div class="col-md-4 text-end">
                <span class="status-badge status-ditolak">Ditolak</span>
            </div>
        </div>
    </div>

</div>
@endsection
