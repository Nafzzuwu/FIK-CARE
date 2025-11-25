@extends('layouts.user')

@section('content')

<div class="section-header mb-4">
    <h2 class="fw-bold mb-1">Buat Laporan Baru</h2>
    <p class="mb-0">Sampaikan laporan Anda secara anonim kepada fakultas.</p>
</div>

<div class="card card-custom p-4">

    <form action="{{ route('report.store') }}" method="POST">
        @csrf

        <!-- Nama Pelapor (Anonim Otomatis) -->
        <div class="mb-3">
            <label class="form-label fw-semibold">Nama Pelapor</label>
            <input type="text" class="form-control" value="Anonim" readonly>
        </div>

        <!-- Kategori -->
        <div class="mb-3">
            <label class="form-label fw-semibold">Kategori Masalah</label>
            <select name="kategori" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="Fasilitas">Fasilitas</option>
                <option value="Layanan">Layanan</option>
            </select>
        </div>

        <!-- Isi Laporan -->
        <div class="mb-3">
            <label class="form-label fw-semibold">Isi Laporan</label>
            <textarea name="isi_laporan" class="form-control" rows="5" placeholder="Tuliskan detail laporan Anda..." required></textarea>
        </div>

        <!-- Tanggal Lapor -->
        <div class="mb-3">
            <label class="form-label fw-semibold">Tanggal Lapor</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <!-- Submit -->
        <div class="text-end">
            <button type="submit" class="btn btn-warning fw-bold px-4">
                Laporkan
            </button>
        </div>

    </form>

</div>

@endsection
