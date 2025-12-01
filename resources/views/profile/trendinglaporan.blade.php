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
        display: flex;
        align-items: center;
        gap: 12px;
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
        margin-bottom: 24px;
    }

    .card-custom:hover {
        background: rgba(255, 255, 255, 0.12);
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.3);
        border-color: rgba(255, 255, 255, 0.2);
    }

    /* Card Header */
    .card-header-custom {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 20px;
        gap: 20px;
    }

    .kategori-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: white;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .kategori-title i {
        color: #60a5fa;
        font-size: 1.3rem;
    }

    /* Description Text */
    .desc-text {
        color: rgba(255, 255, 255, 0.85);
        font-size: 0.95rem;
        margin-bottom: 20px;
        line-height: 1.7;
        padding: 16px;
        background: rgba(0, 0, 0, 0.2);
        border-radius: 12px;
    }

    /* Vote Section */
    .vote-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        padding: 16px;
        background: rgba(0, 0, 0, 0.2);
        border-radius: 12px;
        margin-top: 16px;
    }

    .vote-count {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 1.1rem;
        font-weight: 700;
        color: #fbbf24;
    }

    .vote-count i {
        font-size: 1.5rem;
    }

    /* Vote Button */
    .btn-vote {
        background: linear-gradient(135deg, #34d399 0%, #10b981 100%);
        color: white;
        border: none;
        padding: 10px 24px;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 10px rgba(16, 185, 129, 0.3);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .btn-vote:hover {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(16, 185, 129, 0.4);
    }

    .btn-vote i {
        font-size: 1.1rem;
    }

    /* Badge Voted */
    .badge-voted {
        background: rgba(255, 255, 255, 0.1);
        color: rgba(255, 255, 255, 0.7);
        padding: 10px 20px;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.85rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .badge-voted i {
        font-size: 1rem;
    }

    /* Empty State */
    .empty-state {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 80px 40px;
        text-align: center;
        color: rgba(255, 255, 255, 0.7);
    }

    .empty-state i {
        font-size: 5rem;
        color: rgba(255, 255, 255, 0.2);
        margin-bottom: 24px;
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

        .card-header-custom {
            flex-direction: column;
            gap: 12px;
        }

        .kategori-title {
            font-size: 1.1rem;
        }

        .desc-text {
            padding: 12px;
        }

        .vote-section {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }

        .btn-vote,
        .badge-voted {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="container py-5">

    <h2 class="page-title">
        <i class="bi bi-fire"></i>
        Trending Laporan
    </h2>

    @forelse($reports as $item)
        <div class="card-custom">
            
            <!-- Header: Kategori -->
            <div class="card-header-custom">
                <h5 class="kategori-title">
                    <i class="bi bi-tag-fill"></i>
                    {{ $item->kategori }}
                </h5>
            </div>

            <!-- Isi Laporan -->
            <div class="desc-text">
                {{ Str::limit($item->isi_laporan, 200) }}
            </div>

            <!-- Vote Section -->
            <div class="vote-section">
                <div class="vote-count">
                    <i class="bi bi-fire"></i>
                    <span>{{ $item->hasil_vote }} Vote</span>
                </div>

                @if(!auth()->user()->telah_voting)
                    <form id="vote-form-{{ $item->id }}" action="{{ route('trending.vote', $item->id) }}" method="POST">
                        @csrf
                        <button type="button" class="btn-vote" onclick="confirmVote({{ $item->id }}, '{{ addslashes($item->kategori) }}')">
                            <i class="bi bi-hand-thumbs-up-fill"></i>
                            Vote Sekarang
                        </button>
                    </form>
                @else
                    <span class="badge-voted">
                        <i class="bi bi-check-circle-fill"></i>
                        Sudah Vote
                    </span>
                @endif
            </div>

        </div>

    @empty
        <div class="empty-state">
            <i class="bi bi-inbox"></i>
            <p>Belum ada laporan trending saat ini.</p>
        </div>
    @endforelse

</div>

<script>
function confirmVote(reportId, kategori) {
    Swal.fire({
        title: 'Konfirmasi Vote',
        html: `Apakah kamu yakin ingin vote laporan kategori <strong>${kategori}</strong>?<br><br><small>Vote hanya bisa dilakukan sekali!</small>`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: '<i class="bi bi-hand-thumbs-up-fill"></i> Ya, Vote!',
        cancelButtonText: '<i class="bi bi-x-circle"></i> Batal',
        reverseButtons: true,
        confirmButtonColor: '#10b981',
        cancelButtonColor: '#6b7280'
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit form
            document.getElementById('vote-form-' + reportId).submit();
        }
    });
}
</script>

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '{{ session("success") }}',
    timer: 3000,
    timerProgressBar: true,
    showConfirmButton: true,
    confirmButtonText: 'OK',
    confirmButtonColor: '#10b981'
});
</script>
@endif

@if(session('error'))
<script>
Swal.fire({
    icon: 'error',
    title: 'Gagal!',
    text: '{{ session("error") }}',
    timer: 3000,
    timerProgressBar: true,
    showConfirmButton: true,
    confirmButtonText: 'OK',
    confirmButtonColor: '#ef4444'
});
</script>
@endif

@endsection