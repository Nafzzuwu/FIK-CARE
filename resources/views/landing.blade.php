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
    position: relative;
    overflow: hidden;
}

/* Animated Background Particles */
.hero::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle, rgba(37,99,235,0.1) 1px, transparent 1px);
    background-size: 50px 50px;
    animation: moveBackground 20s linear infinite;
}

@keyframes moveBackground {
    0% { transform: translateY(0); }
    100% { transform: translateY(50px); }
}

.hero-left {
    max-width: 520px;
    position: relative;
    z-index: 1;
    opacity: 0;
    transform: translateX(-50px);
    animation: slideInLeft 1s ease forwards;
}

@keyframes slideInLeft {
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.hero-left h1 {
    font-size: 44px;
    font-weight: bold;
    margin-bottom: 10px;
    background: linear-gradient(135deg, #60a5fa, #2563eb);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-left h3 {
    color: #93c5fd;
    margin-bottom: 15px;
    opacity: 0;
    animation: fadeIn 1s ease 0.3s forwards;
}

.hero-left p {
    line-height: 1.6;
    color: #e5e7eb;
    opacity: 0;
    animation: fadeIn 1s ease 0.5s forwards;
}

@keyframes fadeIn {
    to {
        opacity: 1;
    }
}

.btn-group {
    margin-top: 25px;
    opacity: 0;
    animation: fadeIn 1s ease 0.7s forwards;
}

.btn-primary {
    background: #2563eb;
    padding: 12px 22px;
    color: white;
    border-radius: 10px;
    text-decoration: none;
    margin-right: 10px;
    transition: all .3s;
    display: inline-block;
    position: relative;
    overflow: hidden;
}

.btn-primary::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(255,255,255,0.3);
    transform: translate(-50%, -50%);
    transition: width 0.6s, height 0.6s;
}

.btn-primary:hover::before {
    width: 300px;
    height: 300px;
}

.btn-primary:hover {
    background: #1e40af;
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(37,99,235,0.4);
}

.btn-secondary {
    background: transparent;
    border: 2px solid #2563eb;
    padding: 12px 22px;
    color: white;
    border-radius: 10px;
    text-decoration: none;
    margin-right: 10px;
    transition: all .3s;
    display: inline-block;
}

.btn-secondary:hover {
    background: #2563eb;
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(37,99,235,0.4);
}

.hero-right {
    width: 45%;
    display: flex;
    justify-content: center;
    position: relative;
    z-index: 1;
    opacity: 0;
    transform: translateX(50px);
    animation: slideInRight 1s ease forwards;
}

@keyframes slideInRight {
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.hero-right img {
    width: 100%;
    max-width: 550px;
    height: auto;
    border-radius: 40px; 
    border: 4px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 20px 40px rgba(0,0,0,0.5);
    object-fit: cover;
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0);}
    50% { transform: translateY(-15px);}
}

.section {
    padding: 70px 12%;
    background: #020617;
    color: white;
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s ease;
}

.section.visible {
    opacity: 1;
    transform: translateY(0);
}

.section h2 {
    font-size: 32px;
    margin-bottom: 20px;
    position: relative;
    display: inline-block;
}

.section h2::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 0;
    width: 0;
    height: 3px;
    background: linear-gradient(90deg, #2563eb, #60a5fa);
    transition: width 0.6s ease;
}

.section.visible h2::after {
    width: 100%;
}

.section-box {
    background: rgba(255,255,255,.05);
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0,0,0,.25);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.1);
    transition: all 0.3s ease;
}

.section-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(37,99,235,0.3);
    border-color: rgba(37,99,235,0.3);
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
    transition: all .3s;
    opacity: 0;
    transform: translateY(20px);
    border: 1px solid rgba(255,255,255,0.05);
}

.step.visible {
    opacity: 1;
    transform: translateY(0);
}

.step:hover {
    transform: translateY(-8px);
    background: linear-gradient(135deg, #1e40af, #2563eb);
    box-shadow: 0 10px 25px rgba(37,99,235,0.4);
    border-color: rgba(37,99,235,0.5);
}

.step span {
    display: inline-block;
    background: linear-gradient(135deg, #2563eb, #60a5fa);
    width: 42px;
    height: 42px;
    border-radius: 50%;
    line-height: 42px;
    font-weight: bold;
    margin-bottom: 10px;
    transition: all 0.3s ease;
}

.step:hover span {
    transform: scale(1.1) rotate(360deg);
}

/* Scroll to top button */
.scroll-top {
    position: fixed;
    bottom: 30px;
    right: 30px;
    background: #2563eb;
    color: white;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    z-index: 1000;
    box-shadow: 0 5px 15px rgba(37,99,235,0.4);
}

.scroll-top.visible {
    opacity: 1;
    visibility: visible;
}

.scroll-top:hover {
    background: #1e40af;
    transform: translateY(-5px);
}

@media(max-width:768px){
    .hero{
        flex-direction: column;
        text-align: center;
        padding: 40px 5%;
    }
    
    .hero-left {
        max-width: 100%;
    }
    
    .hero-left h1 {
        font-size: 32px;
    }
    
    .hero-right {
        width: 100%;
        margin-top: 40px;
    }
    
    .hero-right img{
        max-width: 280px;
    }
    
    .section {
        padding: 50px 5%;
    }
    
    .steps {
        grid-template-columns: 1fr;
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

{{-- Scroll to Top Button --}}
<div class="scroll-top" onclick="scrollToTop()">
    <i class="bi bi-arrow-up"></i>
</div>

<script>
// Intersection Observer untuk animasi saat scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            
            // Animasi untuk step items dengan delay
            if (entry.target.classList.contains('section')) {
                const steps = entry.target.querySelectorAll('.step');
                steps.forEach((step, index) => {
                    setTimeout(() => {
                        step.classList.add('visible');
                    }, index * 100);
                });
            }
        }
    });
}, observerOptions);

// Observe semua section
document.querySelectorAll('.section').forEach(section => {
    observer.observe(section);
});

// Scroll to top functionality
const scrollTopBtn = document.querySelector('.scroll-top');

window.addEventListener('scroll', () => {
    if (window.pageYOffset > 300) {
        scrollTopBtn.classList.add('visible');
    } else {
        scrollTopBtn.classList.remove('visible');
    }
});

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Smooth scroll untuk anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Add hover effect untuk buttons
document.querySelectorAll('.btn-primary, .btn-secondary').forEach(btn => {
    btn.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-3px)';
    });
    
    btn.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0)';
    });
});
</script>

@endsection