@extends('layouts.user')

@section('content')

<style>
    body {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%) !important;
    }

    /* Section Header */
    .section-header {
        margin-bottom: 30px;
    }

    .section-header h2 {
        color: white;
        font-weight: 700;
        font-size: 2rem;
        margin-bottom: 8px;
    }

    .section-header p {
        color: rgba(255, 255, 255, 0.7);
        margin: 0;
        font-size: 1rem;
    }

    /* Card Custom */
    .card-custom {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 35px !important;
        box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    }

    /* Form Elements */
    .form-label {
        color: rgba(255, 255, 255, 0.9);
        font-weight: 600;
        margin-bottom: 10px;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-label i {
        color: #60a5fa;
    }

    .form-control,
    .form-select {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 12px;
        padding: 12px 16px;
        color: white;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
        background: rgba(255, 255, 255, 0.08);
        border-color: #60a5fa;
        box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.1);
        color: white;
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.4);
    }

    .form-control:read-only {
        background: rgba(255, 255, 255, 0.03);
        border-color: rgba(255, 255, 255, 0.08);
        color: rgba(255, 255, 255, 0.6);
        cursor: not-allowed;
    }

    .form-select option {
        background: #1e293b;
        color: white;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 120px;
    }

    /* Submit Button */
    .btn-submit {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        border: none;
        padding: 12px 35px;
        border-radius: 25px;
        font-weight: 600;
        color: white;
        font-size: 1rem;
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        transition: all 0.3s ease;
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
        color: white;
    }

    .btn-submit i {
        margin-right: 8px;
    }

    /* Info Box */
    .info-box {
        background: rgba(96, 165, 250, 0.1);
        border: 1px solid rgba(96, 165, 250, 0.2);
        border-radius: 12px;
        padding: 15px 18px;
        margin-bottom: 25px;
        display: flex;
        align-items: start;
        gap: 12px;
    }

    .info-box i {
        color: #60a5fa;
        font-size: 1.2rem;
        flex-shrink: 0;
        margin-top: 0px;
    }

    .info-box p {
        color: rgba(255, 255, 255, 0.8);
        margin: 0;
        font-size: 0.9rem;
        line-height: 1.6;
        margin-top: 2px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .card-custom {
            padding: 25px 20px !important;
        }

        .section-header h2 {
            font-size: 1.6rem;
        }

        .btn-submit {
            width: 100%;
        }
    }
</style>

<div class="container py-5">

    <div class="section-header">
        <h2>Buat Laporan Baru</h2>
        <p>Sampaikan laporan Anda kepada Fakultas Ilmu Komputer dengan lengkap dan jelas.</p>
    </div>

    <div class="card card-custom">

        <!-- Info Box -->
        <div class="info-box">
            <i class="bi bi-info-circle-fill"></i>
            <p>Pastikan informasi yang Anda berikan akurat dan lengkap agar laporan dapat ditindaklanjuti dengan baik.</p>
        </div>

        <form id="report-form" action="{{ route('report.store') }}" method="POST">
            @csrf

            <!-- Nama Pelapor -->
            <div class="mb-4">
                <label class="form-label">
                    <i class="bi bi-person"></i> Nama Pelapor
                </label>
                <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
            </div>

            <!-- Kategori -->
            <div class="mb-4">
                <label class="form-label">
                    <i class="bi bi-tags"></i> Kategori Masalah
                </label>
                <select name="kategori" id="kategori" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Fasilitas">Fasilitas</option>
                    <option value="Layanan">Layanan</option>
                    <option value="Akademik">Akademik</option>
                    <option value="Administrasi">Administrasi</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>

            <!-- Isi Laporan -->
            <div class="mb-4">
                <label class="form-label">
                    <i class="bi bi-file-text"></i> Isi Laporan
                </label>
                <textarea name="isi_laporan" id="isi_laporan" class="form-control" rows="6" placeholder="Tuliskan detail laporan Anda secara lengkap dan jelas..." required></textarea>
                <small class="text-muted d-block mt-2" style="color: rgba(255,255,255,0.5) !important;">
                    Minimal 20 karakter
                </small>
            </div>

            <!-- Tanggal Lapor -->
            <div class="mb-4">
                <label class="form-label">
                    <i class="bi bi-calendar-event"></i> Tanggal Pengiriman
                </label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required max="{{ date('Y-m-d') }}">
            </div>

            <!-- Submit -->
            <div class="text-end mt-4">
                <button type="button" class="btn btn-submit" onclick="confirmSubmit()">
                    <i class="bi bi-send-fill"></i>
                    Kirim Laporan
                </button>
            </div>

        </form>

    </div>

</div>

<script>
function confirmSubmit() {
    // Validasi form
    const kategori = document.getElementById('kategori').value;
    const isiLaporan = document.getElementById('isi_laporan').value;
    const tanggal = document.getElementById('tanggal').value;

    if (!kategori) {
        Swal.fire({
            icon: 'warning',
            title: 'Perhatian!',
            text: 'Silakan pilih kategori masalah terlebih dahulu.',
            confirmButtonText: 'OK',
            confirmButtonColor: '#f59e0b'
        });
        return;
    }

    if (!isiLaporan || isiLaporan.length < 20) {
        Swal.fire({
            icon: 'warning',
            title: 'Perhatian!',
            text: 'Isi laporan minimal 20 karakter.',
            confirmButtonText: 'OK',
            confirmButtonColor: '#f59e0b'
        });
        return;
    }

    if (!tanggal) {
        Swal.fire({
            icon: 'warning',
            title: 'Perhatian!',
            text: 'Silakan pilih tanggal pengiriman terlebih dahulu.',
            confirmButtonText: 'OK',
            confirmButtonColor: '#f59e0b'
        });
        return;
    }

    // Konfirmasi submit
    Swal.fire({
        title: 'Konfirmasi Kirim Laporan',
        html: `
            <div style="text-align: left; padding: 10px;">
                <p><strong>Kategori:</strong> ${kategori}</p>
                <p><strong>Tanggal Pengiriman:</strong> ${tanggal}</p>
                <p style="margin-top: 15px;">Apakah Anda yakin ingin mengirim laporan ini?</p>
            </div>
        `,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: '<i class="bi bi-send-fill"></i> Ya, Kirim!',
        cancelButtonText: '<i class="bi bi-x-circle"></i> Batal',
        reverseButtons: true,
        confirmButtonColor: '#3b82f6',
        cancelButtonColor: '#6b7280'
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit form
            document.getElementById('report-form').submit();
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
}).then(() => {
    // Redirect ke halaman riwayat laporan setelah sukses
    window.location.href = "{{ route('report.index') }}";
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

@if($errors->any())
<script>
Swal.fire({
    icon: 'error',
    title: 'Terjadi Kesalahan!',
    html: '<ul style="text-align: left;">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
    confirmButtonText: 'OK',
    confirmButtonColor: '#ef4444'
});
</script>
@endif

@endsection