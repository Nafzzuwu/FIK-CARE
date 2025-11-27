@extends('layouts.landing')

@section('content')

<style>
.hero {
    min-height: 90vh;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 60px 10%;
    background: linear-gradient(135deg, #020617, #0f172a);
    color: white;
}

.hero-left {
    max-width: 520px;
}

.hero-left h1 {
    font-size: 44px;
    font-weight: bold;
    margin-bottom: 10px;
}

.hero-left h3 {
    color: #93c5fd;
    margin-bottom: 15px;
}

.hero-left p {
    line-height: 1.6;
    color: #e5e7eb;
}

.btn-group {
    margin-top: 25px;
}

.btn-primary {
    background: #2563eb;
    padding: 12px 22px;
    color: white;
    border-radius: 10px;
    text-decoration: none;
    margin-right: 10px;
    transition: .3s;
}

.btn-primary:hover {
    background: #1e40af;
}

.btn-secondary {
    background: #2563eb;
    padding: 12px 22px;
    color: white;
    border-radius: 10px;
    text-decoration: none;
    margin-right: 10px;
    transition: .3s;
}

.btn-secondary:hover {
    background: #1e40af;
}

.hero-right {
    width: 45%;
    display: flex;
    justify-content;
}

.hero-right img {
    width: 100%;
    max-width: 550px;
    height: auto;
    border-radius: 40px; 
    border: 4px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 20px 40px rgba(0,0,0,0.5);
    object-fit: cover;
}

@keyframes float {
    0% { transform: translateY(0);}
    50% { transform: translateY(-10px);}
    100% { transform: translateY(0);}
}


.section {
    padding: 70px 12%;
    background: #020617;
    color: white;
}

.section h2 {
    font-size: 32px;
    margin-bottom: 20px;
}

.section-box {
    background: rgba(255,255,255,.05);
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0,0,0,.25);
}

.alt {
    background: #0f172a;
}

.steps {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(170px,1fr));
    gap: 20px;
    margin-top: 30px;
}

.step {
    background: #1f2937;
    padding: 20px;
    border-radius: 15px;
    text-align: center;
    transition: .3s;
}

.step:hover {
    transform: translateY(-6px);
    background: #1e40af;
}

.step span {
    display: inline-block;
    background: #2563eb;
    width: 42px;
    height: 42px;
    border-radius: 50%;
    line-height: 42px;
    font-weight: bold;
    margin-bottom: 10px;
}

@media(max-width:768px){
    .hero{
        flex-direction: column;
        text-align: center;
    }
    .hero-right img{
        margin-top: 30px;
        max-width: 280px;
    }
}
</style>

{{-- HERO SECTION --}}
<section id="home" class="hero">
    <div class="hero-left">
        <h1>FIK - CARE</h1>
        <h3>Layanan Aspirasi dan Pengaduan Online</h3>
        <p>
            Sampaikan keluhan, aspirasi, dan laporan Anda
            kepada Fakultas Ilmu Komputer dengan mudah, cepat, dan transparan.
        </p>

        <div class="btn-group">
            <a href="{{ route('login') }}" class="btn-primary">Laporkan!</a>
            <a href="#tatacara" class="btn-secondary">Alur Laporan</a>
        </div>
    </div>

    <div class="hero-right">
        <img src="/assets/img/hero.jpg" alt="Ilustrasi Pengaduan">
    </div>
</section>


{{-- TENTANG KAMI --}}
<section id="tentang" class="section">
    <h2>Tentang FIK - CARE</h2>
    <div class="section-box">
        <p>
            <strong>FIK - CARE</strong> merupakan platform pengaduan digital
            yang dirancang untuk membantu mahasiswa menyampaikan
            keluhan, kritik, dan saran terhadap layanan maupun fasilitas
            di Fakultas Ilmu Komputer.
        </p>
        <p>
            Sistem ini bertujuan menciptakan lingkungan akademik yang lebih
            responsif, profesional, dan transparan.
        </p>
    </div>
</section>


{{-- TATA CARA --}}
<section id="tatacara" class="section alt">
    <h2>Alur Pengaduan</h2>

    <div class="steps">
        <div class="step"><span>01</span><p>Login atau daftar akun baru.</p></div>
        <div class="step"><span>02</span><p>Isi laporan lengkap.</p></div>
        <div class="step"><span>03</span><p>Kirim laporan.</p></div>
        <div class="step"><span>04</span><p>Tunggu proses admin.</p></div>
    </div>
</section>

@endsection