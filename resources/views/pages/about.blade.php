@extends('components.layout')

@section('title', $title)

@section('content')
<!-- Hero Section -->
<section class="about-hero">
    <div class="hero-bg">
        <div class="hero-overlay"></div>
        <div class="hero-particles"></div>
    </div>
    <div class="container">
        <div class="row align-items-center min-vh-75">
            <div class="col-lg-8 mx-auto text-center">
                <div class="hero-content" data-aos="fade-up">
                    <div class="hero-badge">
                        <i class="fas fa-star"></i>
                        <span>Distributor Terpercaya Sejak 2011</span>
                    </div>
                    <h1 class="hero-title">
                        <span class="title-gradient">Tentang</span>
                        <span class="title-highlight">Tali Rejeki</span>
                    </h1>
                    <p class="hero-subtitle">
                        Distributor terpercaya produk insulasi industri dengan pengalaman lebih dari 14 tahun 
                        melayani kebutuhan industri di seluruh Indonesia
                    </p>
                    <div class="hero-stats">
                        <div class="stat-item">
                            <span class="stat-number" data-target="14">0</span>
                            <span class="stat-label">Tahun</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number" data-target="500">0</span>
                            <span class="stat-label">Proyek</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number" data-target="200">0</span>
                            <span class="stat-label">Klien</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Company Overview Section -->
<section class="company-overview py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="overview-content">
                    <div class="section-badge">
                        <i class="fas fa-building"></i>
                        <span>Profil Perusahaan</span>
                    </div>
                    <h2 class="section-title">Lebih dari Sekadar Distributor</h2>
                    <p class="section-description">
                        Tali Rejeki didirikan pada tahun 2011 dengan komitmen untuk menyediakan solusi insulasi 
                        terbaik bagi industri Indonesia. Kami tidak hanya menjual produk, tetapi juga memberikan 
                        konsultasi teknis dan layanan purna jual yang komprehensif.
                    </p>
                    <p class="section-description">
                        Dengan tim ahli yang berpengalaman dan jaringan distribusi yang luas, kami telah menjadi 
                        mitra terpercaya untuk berbagai industri seperti oil & gas, petrokimia, manufaktur, 
                        dan konstruksi.
                    </p>
                    
                    <div class="company-highlights">
                        <div class="highlight-item">
                            <div class="highlight-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <div class="highlight-content">
                                <h4>Kualitas Terjamin</h4>
                                <p>Semua produk berstandar internasional dengan sertifikasi resmi</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <div class="highlight-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="highlight-content">
                                <h4>Tim Profesional</h4>
                                <p>Didukung oleh tenaga ahli berpengalaman di bidang insulasi</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <div class="highlight-icon">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="highlight-content">
                                <h4>Distribusi Luas</h4>
                                <p>Jaringan distribusi mencakup seluruh wilayah Indonesia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="overview-visual">
                    <div class="image-grid">
                        <div class="grid-item main-image">
                            <img src="{{ asset('img/about/7.png') }}" alt="Kantor Tali Rejeki" class="img-fluid">
                        </div>
                        <div class="grid-item side-image-1">
                            <img src="{{ asset('img/about/a.jpg') }}" alt="Tim Tali Rejeki" class="img-fluid">
                        </div>
                        <div class="grid-item side-image-2">
                            <img src="{{ asset('img/about/g.jpg') }}" alt="Gudang Tali Rejeki" class="img-fluid">
                        </div>
                    </div>
                    <div class="experience-badge">
                        <div class="badge-content">
                            <span class="badge-number">14+</span>
                            <span class="badge-text">Tahun<br>Pengalaman</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision Mission Section -->
<section class="vision-mission py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <div class="section-badge">
                <i class="fas fa-eye"></i>
                <span>Visi & Misi</span>
            </div>
            <h2 class="section-title">Komitmen Kami untuk Indonesia</h2>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="vision-card">
                    <div class="card-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Visi Kami</h3>
                        <p class="card-description">
                            Menjadi distributor produk insulasi industri terdepan di Indonesia yang dikenal 
                            karena kualitas produk, pelayanan prima, dan solusi inovatif untuk mendukung 
                            pertumbuhan industri nasional.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="mission-card">
                    <div class="card-icon">
                        <i class="fas fa-target"></i>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Misi Kami</h3>
                        <ul class="mission-list">
                            <li>Menyediakan produk insulasi berkualitas tinggi dengan harga kompetitif</li>
                            <li>Memberikan layanan konsultasi teknis yang profesional</li>
                            <li>Membangun kemitraan jangka panjang dengan pelanggan</li>
                            <li>Mengembangkan tim yang kompeten dan berdedikasi tinggi</li>
                            <li>Berkontribusi pada efisiensi energi industri Indonesia</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Company Values Section -->
<section class="company-values py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <div class="section-badge">
                <i class="fas fa-heart"></i>
                <span>Nilai-Nilai Perusahaan</span>
            </div>
            <h2 class="section-title">Prinsip yang Kami Junjung</h2>
            <p class="section-description">
                Nilai-nilai ini menjadi fondasi dalam setiap langkah dan keputusan yang kami ambil
            </p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="value-title">Integritas</h3>
                    <p class="value-description">
                        Berkomitmen pada kejujuran dan transparansi dalam setiap transaksi dan komunikasi
                    </p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-gem"></i>
                    </div>
                    <h3 class="value-title">Kualitas</h3>
                    <p class="value-description">
                        Mengutamakan standar kualitas tinggi dalam produk dan layanan yang kami berikan
                    </p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3 class="value-title">Inovasi</h3>
                    <p class="value-description">
                        Terus berinovasi dalam solusi dan teknologi untuk memenuhi kebutuhan masa depan
                    </p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3 class="value-title">Kemitraan</h3>
                    <p class="value-description">
                        Membangun hubungan yang saling menguntungkan dengan semua pemangku kepentingan
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="statistics py-5 bg-gradient">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="stat-number" data-count="12">14 +</div>
                    <div class="stat-label">Tahun Pengalaman</div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <div class="stat-number" data-count="500">500 +</div>
                    <div class="stat-label">Proyek Selesai</div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-number" data-count="200">200 +</div>
                    <div class="stat-label">Klien Aktif</div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="stat-number" data-count="50">50 +</div>
                    <div class="stat-label">Kota Terjangkau</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <div class="section-badge">
                <i class="fas fa-users"></i>
                <span>Tim Kami</span>
            </div>
            <h2 class="section-title">Profesional Berpengalaman</h2>
            <p class="section-description">
                Tim ahli yang siap memberikan solusi terbaik untuk kebutuhan insulasi industri Anda
            </p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="team-card">
                    <div class="team-image">
                        <img src="{{ asset('img/team-director.jpg') }}" alt="Direktur" class="img-fluid">
                        <div class="team-overlay">
                            <div class="team-social">
                                <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                                <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-content">
                        <h3 class="team-name">Budi Santoso</h3>
                        <p class="team-position">Direktur Utama</p>
                        <p class="team-description">
                            Memimpin perusahaan dengan visi untuk mengembangkan industri insulasi Indonesia
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="team-card">
                    <div class="team-image">
                        <img src="{{ asset('img/team-technical.jpg') }}" alt="Manajer Teknis" class="img-fluid">
                        <div class="team-overlay">
                            <div class="team-social">
                                <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                                <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-content">
                        <h3 class="team-name">Ir. Sari Wijaya</h3>
                        <p class="team-position">Manajer Teknis</p>
                        <p class="team-description">
                            Ahli teknis dengan pengalaman 15+ tahun di bidang insulasi industri
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="team-card">
                    <div class="team-image">
                        <img src="{{ asset('img/team-sales.jpg') }}" alt="Manajer Penjualan" class="img-fluid">
                        <div class="team-overlay">
                            <div class="team-social">
                                <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                                <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-content">
                        <h3 class="team-name">Ahmad Rahman</h3>
                        <p class="team-position">Manajer Penjualan</p>
                        <p class="team-description">
                            Spesialis dalam membangun hubungan bisnis dan solusi penjualan B2B
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section py-5">
    <div class="container">
        <div class="cta-content text-center" data-aos="fade-up">
            <div class="cta-icon">
                <i class="fas fa-phone"></i>
            </div>
            <h2 class="cta-title">Mari Berkolaborasi</h2>
            <p class="cta-description">
                Bergabunglah dengan ratusan perusahaan yang telah mempercayai kami sebagai 
                partner dalam solusi insulasi industri
            </p>
            <div class="cta-actions">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-lg me-3">
                    <i class="fas fa-phone"></i>
                    Hubungi Kami
                </a>
                <a href="{{ route('products') }}" class="btn btn-outline-primary btn-lg">
                    <i class="fas fa-cubes"></i>
                    Lihat Produk
                </a>
            </div>
        </div>
    </div>
</section>

<style>




/* Enhanced Hero Section */
    .about-hero {
        position: relative;
        min-height: 85vh;
        display: flex;
        align-items: center;
        overflow: hidden;
    }

    .hero-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('img/about/7.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        filter: blur(5px);
        transform: scale(1.06);
        z-index: -2;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.3);
        z-index: -1;
    }

    .hero-particles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: 
            radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
            radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
            radial-gradient(circle at 40% 60%, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
        background-size: 100px 100px, 150px 150px, 200px 200px;
        animation: float 20s ease-in-out infinite;
        z-index: -1;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }

    .hero-content {
        color: white;
        text-align: center;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        padding: 10px 20px;
        border-radius: 25px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 2rem;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .hero-badge i {
        color: #fbbf24;
    }

    .hero-title {
        font-size: 4rem;
        font-weight: 900;
        margin-bottom: 1.5rem;
        line-height: 1.1;
    }

    .title-gradient {
        background: linear-gradient(135deg, #ffffff, #f3f4f6);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .title-highlight {
        background: linear-gradient(135deg, #fbbf24, #f59e0b);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        display: block;
        margin-top: 0.5rem;
    }

    .hero-subtitle {
        font-size: 1.25rem;
        line-height: 1.6;
        opacity: 0.9;
        margin-bottom: 3rem;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .hero-stats {
        display: flex;
        justify-content: center;
        gap: 3rem;
        margin-top: 3rem;
    }

    .hero-stats .stat-item {
        text-align: center;
    }

    .hero-stats .stat-number {
        display: block;
        font-size: 2.5rem;
        font-weight: 800;
        color: #fbbf24;
        line-height: 1;
    }

    .hero-stats .stat-label {
        font-size: 1rem;
        font-weight: 600;
        opacity: 0.8;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .scroll-indicator {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 10;
    }

    .scroll-arrow {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        animation: bounce 2s infinite;
        cursor: pointer;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-10px);
        }
        60% {
            transform: translateY(-5px);
        }
    }

    /* ================================
    HERO — Responsive Enhancements
    (append at the end of your CSS)
    ================================ */

    /* Fluid typography & spacing (global) */
    .about-hero .hero-title{
    /* dari 2rem (hp) → 4rem (desktop) */
    font-size: clamp(2rem, 2.2rem + 2.5vw, 4rem);
    }
    .about-hero .hero-subtitle{
    /* dari 1rem → 1.25rem; lebar teks dibatasi agar mudah dibaca */
    font-size: clamp(1rem, .95rem + .5vw, 1.25rem);
    max-width: min(640px, 92vw);
    }
    .about-hero .hero-stats{
    margin-top: clamp(1.75rem, 1.2rem + 1.5vw, 3rem);
    gap: clamp(1.25rem, 1.2rem + 1.5vw, 3rem);
    }

    /* ============ ≥1200px (desktop besar) ============ */
    @media (min-width: 1200px){
    .about-hero{ min-height: 88vh; }
    .about-hero .hero-subtitle{ max-width: 640px; }
    }

    /* ============ 992–1199px (desktop/small desktop) ============ */
    @media (max-width: 1199.98px){
    .about-hero{ min-height: 80vh; }
    .hero-bg{ transform: scale(1.05); filter: blur(5px); }
    }

    /* ============ 768–991px (tablet) ============ */
    @media (max-width: 991.98px){
    .about-hero{ min-height: 72vh; padding: 48px 0; }

    /* Stats jadi grid 3 kolom agar rapi */
    .about-hero .hero-stats{
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 1.5rem;
    }
    .about-hero .stat-number{ font-size: 2rem; }
    .about-hero .stat-label{ font-size: .9rem; letter-spacing: .5px; }

    .about-hero .hero-badge{
        padding: 8px 16px; gap: 6px; font-size: 13px;
    }

    .hero-bg{ transform: scale(1.04); filter: blur(4.5px); }
    }

    /* ============ 576–767px (mobile besar) ============ */
    @media (max-width: 767.98px){
    .about-hero{ min-height: 66vh; padding: 44px 0; }

    /* Stats 2 kolom di mobile besar */
    .about-hero .hero-stats{
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 1.25rem 1rem;
    }
    .about-hero .stat-number{ font-size: 1.85rem; }
    .about-hero .stat-label{ font-size: .88rem; }

    .about-hero .hero-title{
        /* sedikit turun supaya tidak meluber */
        line-height: 1.12;
    }
    .about-hero .hero-badge{
        font-size: 12px; padding: 7px 14px; border-radius: 22px;
    }

    .hero-bg{ transform: scale(1.035); filter: blur(4px); }
    .hero-overlay{ background: rgba(0,0,0,.36); } /* teks lebih kontras di layar kecil */
    }

    /* ============ <576px (small phones) ============ */
    @media (max-width: 575.98px){
    .about-hero{ min-height: 60vh; padding: 40px 0; }

    .about-hero .hero-title{
        /* kunci biar tidak terlalu besar di hp kecil */
        font-size: clamp(1.8rem, 1.4rem + 4vw, 2.4rem);
        margin-bottom: 1rem;
    }
    .about-hero .hero-subtitle{
        font-size: clamp(.95rem, .9rem + 1.2vw, 1.05rem);
        margin-bottom: 1.75rem;
        max-width: 92vw;
    }

    /* Stats 1 kolom di hp kecil */
    .about-hero .hero-stats{
        grid-template-columns: 1fr;
        gap: 1rem;
        margin-top: 1.5rem;
    }
    .about-hero .stat-item{
        padding: .35rem 0;
    }
    .about-hero .stat-number{ font-size: 1.75rem; }
    .about-hero .stat-label{ font-size: .85rem; }

    .about-hero .scroll-indicator{ display: none; } /* sembunyikan panah di layar sangat pendek */
    .hero-bg{ transform: scale(1.03); filter: blur(3.5px); }
    .hero-overlay{ background: rgba(0,0,0,.42); }
    }

    /* ============ UX: kurangi animasi bila user minta ============ */
    @media (prefers-reduced-motion: reduce){
    .hero-particles{ animation: none !important; }
    .scroll-arrow{ animation: none !important; }
    }

/* Enhanced Hero Section */




/* Enhanced Company Overview */
    /* ================================
    Company Overview — Luxury Fit Layout
    (NO color logic changes)
    ================================ */

    /* scope kecil biar gak ganggu global */
    .company-overview,
    .company-overview * { box-sizing: border-box; }

    .company-overview {
    padding: clamp(72px, 7vw, 112px) 0;
    position: relative;
    /* ritme vertikal lebih halus */
    --co-gap: clamp(1rem, 1.2vw, 1.5rem);
    --co-radius: 20px;
    --co-shadow-soft: 0 10px 30px rgba(0,0,0,.06);
    --co-shadow-deep: 0 20px 50px rgba(0,0,0,.15);
    }

    .company-overview::before {
    content: '';
    position: absolute; inset: 0;
    background: radial-gradient(circle at 10% 20%, rgba(124, 20, 21, 0.05) 0%, transparent 50%);
    pointer-events: none;
    z-index: 0;
    }

    /* pastikan konten di atas overlay */
    .company-overview .container { 
    position: relative; 
    z-index: 1; 
    /* sedikit batasi lebar agar komposisi lebih premium */
    max-width: min(1140px, 92vw);
    }

    /* jarak vertikal antar kolom (tidak mengubah gutter bootstrap) */
    .company-overview .row {
    align-items: center;
    row-gap: clamp(1.25rem, 2vw, 2.5rem);
    }

    /* kolom teks lebih nyaman dibaca */
    .overview-content { 
    max-width: 640px; 
    margin-inline: auto;
    }

    /* badge rapi */
    .section-badge{
    display:inline-flex; align-items:center; gap:.6rem;
    padding:.55rem 1rem; border-radius:999px;
    background: rgba(255,255,255,.78);
    border:1px solid rgba(124,20,21,.12);
    box-shadow: 0 10px 28px rgba(0,0,0,.06);
    backdrop-filter: blur(10px);
    color:#111827; font-weight:700;
    margin-bottom: 18px;
    }
    .section-badge i{ color:#fbbf24; }

    /* ================================
    Title & Description — Polished (no color change)
    ================================ */
    .company-overview .section-title{
    /* warna BIARKAN ikut rules kamu */
    font-weight: 900;
    font-size: clamp(1.75rem, 1.1rem + 1.9vw, 2.6rem);
    line-height: 1.15;
    letter-spacing: -0.02em;
    margin: 0 0 1rem;
    position: relative;
    text-wrap: balance;
    word-break: normal;
    }
    .company-overview .section-title::after{
    content:'';
    display:block;
    width: 72px;
    height: 4px;
    margin-top: .6rem;
    border-radius: 4px;
    background: linear-gradient(90deg, #7c1415, #dc2626 60%, #fbbf24 100%);
    box-shadow: 0 2px 12px rgba(220,38,38,.28);
    }
    .company-overview .section-description{
    /* warna BIARKAN ikut rules kamu */
    font-size: clamp(1rem, .95rem + .28vw, 1.12rem);
    line-height: 1.8;
    margin: 0 0 1rem;
    max-width: 68ch;
    text-wrap: pretty;
    hyphens: auto;
    }
    .company-overview .section-description + .section-description{ margin-top: .35rem; }
    .company-overview .section-badge + .section-title{ margin-top: .25rem; }
    .company-overview .section-title + .section-description{ margin-top: .5rem; }

    /* =========================
    HIGHLIGHT CARDS (layout)
    ========================= */
    .company-highlights{
    margin-top: 1.6rem;
    display: grid;
    /* auto-fit biar responsif & “fit” */
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: var(--co-gap);
    }
    @media (min-width: 1200px){
    .company-highlights{ gap: calc(var(--co-gap) + .25rem); }
    }

    /* kartu dibuat grid agar tinggi seragam */
    .highlight-item{
    display: grid;
    grid-template-columns: 60px 1fr;
    align-items: center;
    column-gap: 1rem;
    row-gap: .25rem;
    padding: clamp(1.1rem, 1rem + .5vw, 1.5rem);
    background: rgba(255,255,255,0.86);
    border-radius: var(--co-radius);
    border:1px solid rgba(124, 20, 21, 0.1);
    box-shadow: var(--co-shadow-soft);
    transition: transform .22s ease, box-shadow .22s ease, border-color .22s ease, background-color .22s ease;
    min-height: 104px;
    isolation: isolate;
    }
    .highlight-item:hover{
    transform: translateY(-6px);
    box-shadow: 0 18px 44px rgba(124,20,21,.16);
    border-color: rgba(124,20,21,0.2);
    background: rgba(255,255,255,0.92);
    }
    /* Icon tile */
    .highlight-icon{
    width:60px; height:60px; 
    border-radius:15px; 
    display:flex; align-items:center; justify-content:center;
    color:#fff; font-size:1.5rem;
    background: linear-gradient(135deg, #7c1415, #dc2626);
    box-shadow: 0 12px 28px rgba(220,38,38,.28);
    grid-row: 1 / span 2; /* center antara title & text */
    }
    .highlight-content{ align-self: center; }
    .highlight-content h4{
    font-size:1.16rem; font-weight:800; color:#1f2937; margin:0 0 .25rem; letter-spacing:-0.01em;
    }
    .highlight-content p{
    color:#6b7280; margin:0; line-height:1.65;
    }

    /* =========================
    VISUAL GRID (gambar)
    ========================= */
    .overview-visual{ position: relative; }

    .image-grid{
    display:grid;
    grid-template-columns: 2fr 1fr;
    grid-template-rows: 1fr 1fr;
    gap: var(--co-gap);
    height: clamp(620px, 44vw, 760px); /* sedikit lebih lega */
    }

    .grid-item{
    position: relative; overflow: hidden;
    border-radius: var(--co-radius);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    isolation: isolate;
    outline: 1px solid rgba(255,255,255,.12);
    }
    .grid-item::before{
    content:''; position:absolute; inset:0; z-index:1;
    background: linear-gradient(135deg, rgba(124, 20, 21, 0.12), transparent 55%);
    transition: opacity 0.3s ease;
    pointer-events: none;
    }
    .grid-item:hover::before{ opacity: 0; }

    .main-image{ grid-row: 1 / 3; }

    .grid-item img{
    width:100%; height:100%; object-fit:cover;
    transform: scale(1.02);
    transition: transform .5s ease, filter .35s ease;
    filter: saturate(1.03) contrast(1.03);
    object-position: center;
    }
    .grid-item:hover img{ transform: scale(1.07); }

    /* =========================
    EXPERIENCE BADGE
    ========================= */
    .experience-badge{
    position: absolute;
    /* jaga aman dari tepi layar */
    bottom: clamp(-34px, -5vw, -20px);
    right: clamp(16px, 2.5vw, 30px);
    background: #fff;
    border-radius: calc(var(--co-radius) - 2px);
    padding: clamp(1.25rem, .9rem + .8vw, 1.8rem);
    box-shadow: var(--co-shadow-deep);
    text-align: center;
    border: 1px solid rgba(124, 20, 21, 0.1);
    z-index: 2;
    min-width: 180px;
    }
    .badge-number{
    display:block; font-size: clamp(2.1rem, 1.6rem + 1.2vw, 2.6rem); font-weight:900;
    background: linear-gradient(135deg, #7c1415, #dc2626);
    -webkit-background-clip: text; background-clip: text;
    -webkit-text-fill-color: transparent;
    line-height: 1;
    }
    .badge-text{
    font-size: .98rem; font-weight:700; color:#6b7280;
    line-height:1.2; margin-top:.5rem;
    }

    /* =========================
    RESPONSIVE FIXES
    ========================= */
    @media (max-width: 1199.98px){
    /* beri ruang bawah supaya badge tidak nabrak */
    .overview-visual { padding-bottom: 40px; }
    }

    @media (max-width: 991.98px){
    .image-grid{ height: 420px; gap: calc(var(--co-gap) - .25rem); }
    .experience-badge{
        right: 20px; bottom: -24px;
        border-radius: 16px;
    }
    }

    @media (max-width: 767.98px){
    /* stack 1 kolom supaya rapi */
    .image-grid{
        grid-template-columns: 1fr;
        grid-template-rows: 230px 180px 180px;
        height: auto;
    }
    .main-image{ grid-row: 1 / 2; }

    /* badge jadi static agar tidak overlap; tetap mewah tapi aman */
    .experience-badge{
        position: static;
        margin: 14px auto 0;
        display:inline-block;
    }
    }

    /* Aksesibilitas: kurangi gerak bila user minta */
    @media (prefers-reduced-motion: reduce){
    .highlight-item, .grid-item img, .grid-item::before{ transition:none !important; }
    .highlight-item:hover, .grid-item:hover img{ transform:none !important; }
    }
/* Enhanced Company Overview */




/* Enhanced Vision Mission Cards */
    .vision-mission {
    }

    .vision-mission::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 90% 10%, rgba(124, 20, 21, 0.05) 0%, transparent 50%);
        pointer-events: none;
    }

    .vision-card,
    .mission-card {
        background: white;
        border-radius: 25px;
        padding: 3rem;
        height: 100%;
        transition: all 0.4s ease;
        border: 1px solid rgba(124, 20, 21, 0.1);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
        position: relative;
        overflow: hidden;
    }

    .vision-card::before,
    .mission-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(124, 20, 21, 0.02), transparent);
        transition: opacity 0.3s ease;
    }

    .vision-card:hover,
    .mission-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 30px 60px rgba(124, 20, 21, 0.2);
        border-color: rgba(124, 20, 21, 0.2);
    }

    .vision-card:hover::before,
    .mission-card:hover::before {
        opacity: 0;
    }

    .card-icon {
        width: 90px;
        height: 90px;
        background: linear-gradient(135deg, #7c1415, #dc2626);
        border-radius: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2.25rem;
        margin-bottom: 2rem;
        box-shadow: 0 15px 35px rgba(124, 20, 21, 0.3);
    }

    .card-title {
        font-size: 2rem;
        font-weight: 800;
        background: linear-gradient(135deg, #1f2937, #374151);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1.5rem;
    }

    .card-description {
        color: #6b7280;
        line-height: 1.8;
        margin: 0;
        font-size: 1.1rem;
    }

    .mission-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .mission-list li {
        position: relative;
        padding-left: 2rem;
        margin-bottom: 1rem;
        color: #6b7280;
        line-height: 1.7;
        font-size: 1.05rem;
    }

    .mission-list li::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0.7rem;
        width: 10px;
        height: 10px;
        background: linear-gradient(135deg, #7c1415, #dc2626);
        border-radius: 50%;
        box-shadow: 0 0 10px rgba(124, 20, 21, 0.3);
    }

    /* Enhanced Value Cards */
    .company-values {
        padding: 100px 0;
        position: relative;
    }

    .value-card {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        text-align: center;
        transition: all 0.4s ease;
        border: 1px solid rgba(124, 20, 21, 0.1);
        height: 100%;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        position: relative;
        overflow: hidden;
    }

    .value-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(124, 20, 21, 0.02), transparent);
        transition: opacity 0.3s ease;
    }

    .value-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 25px 50px rgba(124, 20, 21, 0.2);
        border-color: rgba(124, 20, 21, 0.3);
    }

    .value-card:hover::before {
        opacity: 0;
    }

    .value-icon {
        width: 90px;
        height: 90px;
        background: linear-gradient(135deg, #7c1415, #dc2626);
        border-radius: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2.25rem;
        margin: 0 auto 2rem;
        box-shadow: 0 15px 35px rgba(124, 20, 21, 0.3);
    }

    .value-title {
        font-size: 1.75rem;
        font-weight: 800;
        background: linear-gradient(135deg, #1f2937, #374151);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1.5rem;
    }

    .value-description {
        color: #6b7280;
        line-height: 1.7;
        margin: 0;
        font-size: 1.05rem;
    }
/* Enhanced Vision Mission Cards */




/* Enhanced Statistics Section */
    .bg-gradient {
        background: linear-gradient(135deg, #7c1415 0%, #dc2626 100%);
        color: white;
        position: relative;
        overflow: hidden;
    }

    .bg-gradient::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: 
            radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
            radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
        background-size: 100px 100px, 150px 150px;
        animation: float 15s ease-in-out infinite;
    }

    .statistics {
        padding: 100px 0;
    }

    .stat-item {
        text-align: center;
        padding: 2rem;
        border-radius: 20px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }

    .stat-item:hover {
        transform: translateY(-10px);
        background: rgba(255, 255, 255, 0.15);
    }

    .stat-icon {
        width: 90px;
        height: 90px;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border-radius: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.25rem;
        margin: 0 auto 1.5rem;
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .stat-number {
        display: block;
        font-size: 3.5rem;
        font-weight: 900;
        color: #fbbf24;
        margin-bottom: 0.5rem;
        text-shadow: 0 0 20px rgba(251, 191, 36, 0.3);
    }

    .stat-label {
        font-size: 1.25rem;
        font-weight: 600;
        opacity: 0.9;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .maps-section {
            height: 60vh;
            min-height: 400px;
        }
        
        .map-info-card {
            padding: 2rem;
            margin: 1rem;
        }
        
        .info-actions {
            flex-direction: column;
        }
        
        .hero-title {
            font-size: 3rem;
        }
        
        .hero-stats {
            flex-direction: column;
            gap: 1.5rem;
        }
        
        .section-title {
            font-size: 2.25rem;
        }
        
        .image-grid {
            grid-template-columns: 1fr;
            grid-template-rows: 250px 120px 120px;
            height: auto;
        }
        
        .main-image {
            grid-row: 1;
        }
        
        .experience-badge {
            position: static;
            margin-top: 2rem;
        }
        
        .highlight-item {
            text-align: center;
            flex-direction: column;
            align-items: center;
        }
        
        .stat-number {
            font-size: 3rem;
        }
        
        .hero-stats .stat-number {
            font-size: 2rem;
        }
    }

    @media (max-width: 480px) {
        .map-info-card {
            padding: 1.5rem;
        }
        
        .hero-title {
            font-size: 2.5rem;
        }
        
        .section-title {
            font-size: 2rem;
        }
        
        .vision-card,
        .mission-card,
        .value-card {
            padding: 2rem;
        }
    }

    /* plus sebagai superscript visual, tidak ikut teks */
    .stat-number {
    position: relative;
    display: inline-block;
    line-height: 1;
    }

    .stat-number::after {
    content: '+';
    position: relative;
    top: -0.4em;          /* naikkan sedikit (atur selera) */
    font-size: 0.6em;     /* lebih kecil dari angka */
    margin-left: 2px;
    font-weight: inherit; /* konsisten dengan angka */
    }
/* Enhanced Statistics Section */

</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const counters = document.querySelectorAll(".stat-number");

  // durasi adaptif: pelan tapi tetap responsif
  const getDuration = (target) => {
    const base = 2200;     // ms minimal (lebih pelan dari sebelumnya)
    const perUnit = 5;     // tambahan durasi per angka target
    const max = 5000;      // batasi agar tidak terlalu lama
    return Math.min(base + target * perUnit, max);
  };

  const animateCount = (el, { duration = 3000, delay = 0 } = {}) => {
    const target = +el.getAttribute("data-target");
    const start = 0;
    const startTime = performance.now();

    const tick = (now) => {
      // terapkan delay kecil untuk stagger
      if (now < startTime + delay) {
        requestAnimationFrame(tick);
        return;
      }

      const elapsed = now - (startTime + delay);
      const progress = Math.min(elapsed / duration, 1);

      // easing out cubic agar akhirannya smooth
      const eased = 1 - Math.pow(1 - progress, 3);

      const value = Math.floor(start + (target - start) * eased);
      el.textContent = value;

      if (progress < 1) requestAnimationFrame(tick);
      else el.textContent = target; // pastikan di angka akhir
    };

    requestAnimationFrame(tick);
  };

  // jalankan saat section terlihat
  const section = document.querySelector(".about-hero");
  if (!section) return;

  const io = new IntersectionObserver(
    (entries, obs) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          counters.forEach((el, idx) => {
            const target = +el.getAttribute("data-target");
            animateCount(el, {
              duration: getDuration(target), // lebih lama
              delay: idx * 150               // stagger 150ms antar item
            });
          });
          obs.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.5 }
  );

  io.observe(section);
});
</script>


<!-- Add Google Maps API (replace YOUR_API_KEY with actual API key) -->
<script async defer 
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFw0Qbyq9zTFTd-tUY6dOWTgyek-E4Ks&callback=initMap">
</script>
@endsection
