@extends('layouts.user')

@section('content')
<style>
    body {
        background-color: #627180 !important;
    }
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

    @forelse($reports as $report)
        <div class="card-custom mb-4">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h5>{{ $report->kategori }}</h5>

                    <p class="desc-text">{{ $report->isi_laporan }}</p>

                    <small class="date-text">
                        Dikirim: {{ \Carbon\Carbon::parse($report->tanggal)->format('d M Y') }}
                    </small>
                </div>

                <div class="col-md-4 text-end">
                    @if($report->status === 'Diproses')
                        <span class="status-badge status-proses">Sedang Diproses</span>

                    @elseif($report->status === 'Selesai')
                        <span class="status-badge status-selesai">Selesai</span>

                    @elseif($report->status === 'Ditolak')
                        <span class="status-badge status-ditolak">Ditolak</span>

                    @endif
                </div>
            </div>
        </div>

    @empty
        <p class="text-white">Belum ada laporan yang pernah kamu kirim.</p>
    @endforelse

</div>

@endsection
