@extends('layouts.user')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%) !important;
    }

    /* Page Title */
    .page-title {
        color: white;
        font-weight: 700;
        font-size: 2rem;
        margin-bottom: 30px;
        text-shadow: 0 2px 8px rgba(0,0,0,0.3);
    }

    /* Card Custom */
    .card-custom {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 30px;
        color: white;
        transition: all 0.3s ease;
        margin-bottom: 20px;
    }

    .card-custom:hover {
        background: rgba(255, 255, 255, 0.12);
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.3);
        border-color: rgba(255, 255, 255, 0.2);
    }

    .card-custom h5 {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 12px;
        color: white;
    }

    /* Description Text */
    .desc-text {
        color: rgba(255, 255, 255, 0.75);
        font-size: 0.95rem;
        margin-bottom: 15px;
        line-height: 1.6;
    }

    /* Date Text */
    .date-text {
        color: rgba(255, 255, 255, 0.6);
        font-size: 0.85rem;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .date-text i {
        font-size: 0.9rem;
    }

    /* Status Badge */
    .status-badge {
        font-size: 0.85rem;
        padding: 8px 18px;
        border-radius: 25px;
        font-weight: 600;
        display: inline-block;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }

    .status-proses { 
        background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
        color: #78350f;
    }

    .status-selesai { 
        background: linear-gradient(135deg, #34d399 0%, #10b981 100%);
        color: #064e3b;
    }

    .status-ditolak { 
        background: linear-gradient(135deg, #f87171 0%, #ef4444 100%);
        color: white;
    }

    /* Empty State */
    .empty-state {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 60px 40px;
        text-align: center;
        color: rgba(255, 255, 255, 0.7);
    }

    .empty-state i {
        font-size: 4rem;
        color: rgba(255, 255, 255, 0.3);
        margin-bottom: 20px;
    }

    .empty-state p {
        margin: 0;
        font-size: 1.1rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-title {
            font-size: 1.6rem;
        }

        .card-custom {
            padding: 20px;
        }

        .card-custom .row {
            flex-direction: column;
        }

        .card-custom .col-md-4 {
            margin-top: 15px;
            text-align: left !important;
        }

        .status-badge {
            display: inline-block;
        }
    }
</style>

<div class="container py-5">

    <h2 class="page-title">Riwayat Laporan</h2>

    @forelse($reports as $report)
        <div class="card-custom">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h5>{{ $report->kategori }}</h5>

                    <p class="desc-text">{{ Str::limit($report->isi_laporan, 150) }}</p>

                    <small class="date-text">
                        <i class="bi bi-calendar3"></i>
                        Dikirim: {{ $report->created_at->format('d M Y, H:i') }}
                    </small>
                </div>

                <div class="col-md-4 text-end">
                    @if($report->status === 'Diproses')
                        <span class="status-badge status-proses">
                            <i class="bi bi-hourglass-split me-1"></i>Sedang Diproses
                        </span>

                    @elseif($report->status === 'Selesai')
                        <span class="status-badge status-selesai">
                            <i class="bi bi-check-circle me-1"></i>Selesai
                        </span>

                    @elseif($report->status === 'Ditolak')
                        <span class="status-badge status-ditolak">
                            <i class="bi bi-x-circle me-1"></i>Ditolak
                        </span>

                    @endif
                </div>
            </div>
        </div>

    @empty
        <div class="empty-state">
            <i class="bi bi-inbox"></i>
            <p>Belum ada laporan yang pernah kamu kirim.</p>
        </div>
    @endforelse

</div>

@endsection