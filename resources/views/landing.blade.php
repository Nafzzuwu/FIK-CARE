@extends('layouts.landing')

@section('content')

{{-- SECTION HERO --}}
<section id="home" class="hero">
    <div class="hero-left">
        <h1>Layanan Aspirasi dan Pengaduan Online</h1>
        <p>Sampaikan laporan Anda langsung kepada fakultas ilmu komputer.</p>

        <div class="btn-group">
            <a href="{{ route('login') }}" class="btn-primary">Laporkan!</a>
            <a href="#tatacara" class="btn-secondary">Alur Laporan</a>
        </div>
    </div>

    <div class="hero-right">
        <img src="/assets/img/hero.png" alt="Ilustrasi">
    </div>
</section>


{{-- SECTION TENTANG KAMI --}}
<section id="tentang" class="section">
    <h2>Tentang Kami</h2>
    <p>
        FIK Care merupakan platform pelayanan pengaduan digital yang memudahkan ma menyampaikan
        keluhan, aspirasi, dan laporan secara cepat, transparan, dan tepat sasaran.
    </p>
</section>


{{-- SECTION TATA CARA --}}
<section id="tatacara" class="section">
    <h2>Tata Cara Pengaduan</h2>

    <ol class="steps">
        <li>1. Login atau Daftar akun baru.</li>
        <li>2. Isi laporan lengkap (judul, kategori, deskripsi, foto optional).</li>
        <li>3. Kirim laporan dan tunggu proses verifikasi.</li>
        <li>4. Admin menindaklanjuti laporan hingga selesai.</li>
    </ol>
</section>

@endsection
