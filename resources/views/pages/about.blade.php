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
                        Distributor terpercaya produk insulasi industri dengan pengalaman lebih dari 12 tahun 
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
                            <img src="{{ asset('img/about-main.jpg') }}" alt="Kantor Tali Rejeki" class="img-fluid">
                        </div>
                        <div class="grid-item side-image-1">
                            <img src="{{ asset('img/about-team.jpg') }}" alt="Tim Tali Rejeki" class="img-fluid">
                        </div>
                        <div class="grid-item side-image-2">
                            <img src="{{ asset('img/about-warehouse.jpg') }}" alt="Gudang Tali Rejeki" class="img-fluid">
                        </div>
                    </div>
                    <div class="experience-badge">
                        <div class="badge-content">
                            <span class="badge-number">12+</span>
                            <span class="badge-text">Tahun<br>Pengalaman</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision Mission Section -->
<section class="vision-mission py-5 bg-light">
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





/* Enhanced Company Overview */
.company-overview {
    padding: 100px 0;
    position: relative;
}

.company-overview::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle at 10% 20%, rgba(124, 20, 21, 0.05) 0%, transparent 50%);
    pointer-events: none;
}

.company-highlights {
    margin-top: 3rem;
}

.highlight-item {
    display: flex;
    align-items: flex-start;
    gap: 1.5rem;
    margin-bottom: 2rem;
    padding: 1.5rem;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    border: 1px solid rgba(124, 20, 21, 0.1);
    transition: all 0.3s ease;
}

.highlight-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(124, 20, 21, 0.15);
    border-color: rgba(124, 20, 21, 0.2);
}

.highlight-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #7c1415, #dc2626);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    flex-shrink: 0;
    box-shadow: 0 10px 25px rgba(124, 20, 21, 0.3);
}

.highlight-content h4 {
    font-size: 1.4rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

.highlight-content p {
    color: #6b7280;
    margin: 0;
    line-height: 1.6;
}

/* Enhanced Overview Visual */
.overview-visual {
    position: relative;
}

.image-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    grid-template-rows: 1fr 1fr;
    gap: 1.5rem;
    height: 450px;
}

.grid-item {
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    position: relative;
}

.grid-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(124, 20, 21, 0.1), transparent);
    z-index: 1;
    transition: opacity 0.3s ease;
}

.grid-item:hover::before {
    opacity: 0;
}

.main-image {
    grid-row: 1 / 3;
}

.grid-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.grid-item:hover img {
    transform: scale(1.1);
}

.experience-badge {
    position: absolute;
    bottom: -30px;
    right: 30px;
    background: white;
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
    text-align: center;
    border: 1px solid rgba(124, 20, 21, 0.1);
}

.badge-number {
    display: block;
    font-size: 2.5rem;
    font-weight: 900;
    background: linear-gradient(135deg, #7c1415, #dc2626);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    line-height: 1;
}

.badge-text {
    font-size: 1rem;
    font-weight: 600;
    color: #6b7280;
    line-height: 1.2;
    margin-top: 0.5rem;
}

/* Enhanced Vision Mission Cards */
.vision-mission {
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    position: relative;
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

</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Google Maps
    function initMap() {
        const companyLocation = { lat: -6.165231512543112, lng: 106.99002695730464 };
        
        const map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: companyLocation,
            styles: [
                {
                    "featureType": "all",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "weight": "2.00"
                        }
                    ]
                },
                {
                    "featureType": "all",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#9c9c9c"
                        }
                    ]
                },
                {
                    "featureType": "all",
                    "elementType": "labels.text",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#f2f2f2"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "landscape.man_made",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 45
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#eeeeee"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#7b7b7b"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#46bcec"
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#c8d7d4"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#070707"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                }
            ],
            mapTypeControl: false,
            streetViewControl: false,
            fullscreenControl: true,
            zoomControl: true,
            scrollwheel: false
        });

        // Custom marker
        const marker = new google.maps.Marker({
            position: companyLocation,
            map: map,
            title: 'PT. Tali Rejeki Indonesia',
            icon: {
                url: 'data:image/svg+xml;charset=UTF-8,' + encodeURIComponent(`
                    <svg width="40" height="50" viewBox="0 0 40 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 0C9 0 0 9 0 20C0 35 20 50 20 50C20 50 40 35 40 20C40 9 31 0 20 0Z" fill="#7c1415"/>
                        <circle cx="20" cy="20" r="8" fill="white"/>
                    </svg>
                `),
                scaledSize: new google.maps.Size(40, 50),
                anchor: new google.maps.Point(20, 50)
            },
            animation: google.maps.Animation.DROP
        });

        // Info window
        const infoWindow = new google.maps.InfoWindow({
            content: `
                <div style="padding: 10px; font-family: Arial, sans-serif;">
                    <h3 style="margin: 0 0 10px 0; color: #7c1415;">PT. Tali Rejeki Indonesia</h3>
                    <p style="margin: 0; color: #666;">Distributor Insulasi Industri Terpercaya</p>
                    <p style="margin: 5px 0 0 0; color: #666;">Jakarta Timur, DKI Jakarta</p>
                </div>
            `
        });

        marker.addListener('click', function() {
            infoWindow.open(map, marker);
        });
    }

    // Load Google Maps API
    if (typeof google === 'undefined') {
        const script = document.createElement('script');
        script.src = 'https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap';
        script.async = true;
        script.defer = true;
        document.head.appendChild(script);
        window.initMap = initMap;
    } else {
        initMap();
    }

    // Counter Animation
    const counters = document.querySelectorAll('.stat-number');
    
    const animateCounters = () => {
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-count'));
            const increment = target / 200;
            let current = 0;
            
            const updateCounter = () => {
                if (current < target) {
                    current += increment;
                    counter.textContent = Math.ceil(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target + (target < 100 ? '+' : '');
                }
            };
            
            updateCounter();
        });
    };
    
    // Hero stats animation
    const heroStats = document.querySelectorAll('.hero-stats .stat-number');
    const animateHeroStats = () => {
        heroStats.forEach(stat => {
            const target = parseInt(stat.textContent.replace('+', ''));
            let current = 0;
            const increment = target / 100;
            
            const updateStat = () => {
                if (current < target) {
                    current += increment;
                    stat.textContent = Math.ceil(current) + '+';
                    requestAnimationFrame(updateStat);
                } else {
                    stat.textContent = target + '+';
                }
            };
            
            updateStat();
        });
    };
    
    // Trigger animations when elements are visible
    const statsSection = document.querySelector('.statistics');
    if (statsSection) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.5
        });
        
        observer.observe(statsSection);
    }
    
    // Animate hero stats on load
    setTimeout(animateHeroStats, 1000);
    
    // Smooth scroll for scroll indicator
    const scrollIndicator = document.querySelector('.scroll-indicator');
    if (scrollIndicator) {
        scrollIndicator.addEventListener('click', function() {
            const companyOverview = document.querySelector('.company-overview');
            if (companyOverview) {
                companyOverview.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    }

    // Parallax effect for hero particles
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const particles = document.querySelector('.hero-particles');
        if (particles) {
            particles.style.transform = `translateY(${scrolled * 0.5}px)`;
        }
    });

    // Add floating animation to cards
    const cards = document.querySelectorAll('.value-card, .vision-card, .mission-card, .team-card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
    });

    // Add hover sound effect (optional)
    const hoverElements = document.querySelectorAll('.btn-directions, .btn-contact, .value-card, .team-card');
    hoverElements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            // Add subtle scale animation
            this.style.transform = 'scale(1.02)';
        });
        
        element.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });
});

// Fallback map initialization for when Google Maps API is not available
window.initMap = function() {
    const mapElement = document.getElementById('map');
    if (mapElement) {
        mapElement.innerHTML = `
            <div style="display: flex; align-items: center; justify-content: center; height: 100%; background: #f8f9fa; color: #666;">
                <div style="text-align: center;">
                    <i class="fas fa-map-marker-alt" style="font-size: 3rem; margin-bottom: 1rem; color: #7c1415;"></i>
                    <h3>Lokasi Kantor Pusat</h3>
                    <p>Jakarta Timur, DKI Jakarta, Indonesia</p>
                    <a href="https://maps.google.com/?q=-6.165231512543112,106.99002695730464" target="_blank" 
                       style="background: #7c1415; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none;">
                        Buka di Google Maps
                    </a>
                </div>
            </div>
        `;
    }
};
</script>
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
