@extends('components.layout')

@section('title', 'Distributor Insulasi Industri Terpercaya')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-bg">
        <div class="hero-overlay"></div>
            <div class="hero-particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>
    </div>
    
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6">
                <div class="hero-content">
                    <div class="hero-badge">
                        <i class="fas fa-award"></i>
                        <span data-translate="hero-badge">Distributor Terpercaya Sejak 2011</span>
                    </div>
                    
                    <h1 class="hero-title">
                        <span class="highlight">Tali Rejeki</span><br>
                        <span data-translate="hero-title-line1">Distributor Insulasi</span><br>
                        <span data-translate="hero-title-line2">Industri Terdepan</span>
                    </h1>
                    
                    <p class="hero-description" data-translate="hero-description">
                        Menyediakan solusi insulasi berkualitas tinggi untuk industri dengan produk unggulan 
                        seperti Glasswool, Rockwool, Nitrile Rubber, dan aksesoris HVAC terlengkap di Indonesia.
                    </p>
                    
                    <div class="hero-stats">
                        <div class="stat-item">
                            <span class="stat-number">500+</span>
                            <span class="stat-label" data-translate="hero-stats-projects">Proyek Selesai</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">50+</span>
                            <span class="stat-label" data-translate="hero-stats-cities">Kota Terjangkau</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">12+</span>
                            <span class="stat-label" data-translate="hero-stats-experience">Tahun Pengalaman</span>
                        </div>
                    </div>
                    
                    <div class="hero-actions">
                        <a href="#products" class="btn btn-primary">
                            <i class="fas fa-cubes"></i>
                            <span data-translate="hero-cta-products">Lihat Produk</span>
                        </a>
                        <a href="#contact" class="btn btn-outline">
                            <i class="fas fa-phone"></i>
                            <span data-translate="hero-cta-contact">Hubungi Kami</span>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="hero-visual">
                    <div class="visual-card">
                        <img src="{{ asset('img/hero-product.jpg') }}" alt="Produk Insulasi" class="hero-image">
                        <div class="visual-badge">
                            <i class="fas fa-fire"></i>
                            <span data-translate="hero-badge-fireproof">Tahan Api</span>
                        </div>
                    </div>
                    
                    <div class="floating-elements">
                        <div class="float-item item-1">
                            <i class="fas fa-shield-alt"></i>
                            <span>Kualitas Terjamin</span>
                        </div>
                        <div class="float-item item-2">
                            <i class="fas fa-shipping-fast"></i>
                            <span>Pengiriman Cepat</span>
                        </div>
                        <div class="float-item item-3">
                            <i class="fas fa-tools"></i>
                            <span>Instalasi Profesional</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
<section id="products" class="products-section">
    <div class="container">
        <div class="section-header">
            <div class="section-badge">
                <i class="fas fa-cubes"></i>
                <span data-translate="products-badge">Produk Unggulan</span>
            </div>
            <h2 class="section-title" data-translate="products-title">Solusi Insulasi Terlengkap</h2>
            <p class="section-description" data-translate="products-description">
                Kami menyediakan berbagai jenis material insulasi berkualitas tinggi 
                untuk memenuhi kebutuhan industri Anda
            </p>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="product-card">
                    <div class="product-icon">
                        <i class="fas fa-fire"></i>
                    </div>
                    <h3 data-translate="product-glasswool-title">Glasswool</h3>
                    <p data-translate="product-glasswool-desc-long">Insulasi termal dan akustik dengan daya tahan tinggi dan ramah lingkungan</p>
                    <ul class="product-features">
                        <li><i class="fas fa-check"></i> <span data-translate="glasswool-feature-1">Tahan panas tinggi</span></li>
                        <li><i class="fas fa-check"></i> <span data-translate="glasswool-feature-2">Kedap suara</span></li>
                        <li><i class="fas fa-check"></i> <span data-translate="glasswool-feature-3">Anti jamur</span></li>
                    </ul>
                    <a href="#" class="product-link">
                        <span data-translate="learn-more">Pelajari Lebih Lanjut</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="product-card">
                    <div class="product-icon">
                        <i class="fas fa-mountain"></i>
                    </div>
                    <h3 data-translate="product-rockwool-title">Rockwool</h3>
                    <p data-translate="product-rockwool-desc-long">Material insulasi berbahan dasar batu basalt dengan ketahanan api luar biasa</p>
                    <ul class="product-features">
                        <li><i class="fas fa-check"></i> <span data-translate="rockwool-feature-1">Tahan api ekstrem</span></li>
                        <li><i class="fas fa-check"></i> <span data-translate="rockwool-feature-2">Non-combustible</span></li>
                        <li><i class="fas fa-check"></i> <span data-translate="rockwool-feature-3">Tahan air</span></li>
                    </ul>
                    <a href="#" class="product-link">
                        <span data-translate="learn-more">Pelajari Lebih Lanjut</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="product-card">
                    <div class="product-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Nitrile Rubber</h3>
                    <p>Karet sintetis premium dengan ketahanan kimia dan minyak yang excellent</p>
                    <ul class="product-features">
                        <li><i class="fas fa-check"></i> Tahan oli & kimia</li>
                        <li><i class="fas fa-check"></i> Fleksibilitas tinggi</li>
                        <li><i class="fas fa-check"></i> Daya tahan lama</li>
                    </ul>
                    <a href="#" class="product-link">
                        <span>Pelajari Lebih Lanjut</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="product-card">
                    <div class="product-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h3>Aksesoris HVAC</h3>
                    <p>Komponen pendukung sistem HVAC lengkap untuk instalasi yang sempurna</p>
                    <ul class="product-features">
                        <li><i class="fas fa-check"></i> Kualitas original</li>
                        <li><i class="fas fa-check"></i> Beragam ukuran</li>
                        <li><i class="fas fa-check"></i> Harga kompetitif</li>
                    </ul>
                    <a href="#" class="product-link">
                        <span>Pelajari Lebih Lanjut</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="services-content">
                    <div class="section-badge">
                        <i class="fas fa-briefcase"></i>
                        <span>Layanan Terbaik</span>
                    </div>
                    <h2 class="section-title">Solusi Lengkap untuk Kebutuhan Insulasi Anda</h2>
                    <p class="section-description">
                        Tidak hanya menyediakan produk berkualitas, kami juga memberikan layanan profesional 
                        untuk memastikan proyek Anda berjalan dengan sempurna.
                    </p>
                    
                    <div class="service-list">
                        <div class="service-item">
                            <div class="service-icon">
                                <i class="fas fa-hammer"></i>
                            </div>
                            <div class="service-content">
                                <h4>Instalasi Profesional</h4>
                                <p>Tim ahli berpengalaman untuk pemasangan yang tepat dan aman</p>
                            </div>
                        </div>
                        
                        <div class="service-item">
                            <div class="service-icon">
                                <i class="fas fa-headset"></i>
                            </div>
                            <div class="service-content">
                                <h4>Konsultasi Teknis</h4>
                                <p>Saran dan rekomendasi produk sesuai kebutuhan spesifik Anda</p>
                            </div>
                        </div>
                        
                        <div class="service-item">
                            <div class="service-icon">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="service-content">
                                <h4>Distribusi Nasional</h4>
                                <p>Pengiriman ke seluruh Indonesia dengan sistem logistik terpercaya</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="services-visual">
                    <div class="visual-grid">
                        <div class="grid-item item-1">
                            <i class="fas fa-chart-line"></i>
                            <span>Efisiensi Tinggi</span>
                        </div>
                        <div class="grid-item item-2">
                            <i class="fas fa-users"></i>
                            <span>Tim Profesional</span>
                        </div>
                        <div class="grid-item item-3">
                            <i class="fas fa-clock"></i>
                            <span>Tepat Waktu</span>
                        </div>
                        <div class="grid-item item-4">
                            <i class="fas fa-medal"></i>
                            <span>Kualitas Terjamin</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section id="contact" class="cta-section">
    <div class="cta-bg">
        <div class="cta-overlay"></div>
    </div>
    
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <div class="cta-content">
                    <h2 class="cta-title">Siap Memulai Proyek Insulasi Anda?</h2>
                    <p class="cta-description">
                        Dapatkan penawaran terbaik dan konsultasi gratis dari tim ahli kami. 
                        Hubungi sekarang untuk solusi insulasi yang tepat!
                    </p>
                    
                    <div class="cta-actions">
                        <a href="tel:+62-21-12345678" class="btn btn-primary">
                            <i class="fas fa-phone"></i>
                            <span>Hubungi Sekarang</span>
                        </a>
                        <a href="https://wa.me/6281234567890" class="btn btn-outline" target="_blank">
                            <i class="fab fa-whatsapp"></i>
                            <span>Chat WhatsApp</span>
                        </a>
                    </div>
                    
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Jakarta, Indonesia</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>info@talirejeki.com</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-clock"></i>
                            <span>Senin - Jumat: 08:00 - 17:00 WIB</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Hero Section */
.hero-section {
    position: relative;
    min-height: 100vh;
    overflow: hidden;
    display: flex;
    align-items: center;
}

.hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('{{ asset("img/bg/bg-texture.webp") }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    background-repeat: no-repeat;
    z-index: -2;
    transition: all 0.3s ease;
}

/* Light theme hero bg */
body.light-theme .hero-bg {
    background: url('{{ asset("img/bg/bg-texture-white.webp") }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    background-repeat: no-repeat;
}

/* Dark theme hero bg */
body.dark-theme .hero-bg {
    background: url('{{ asset("img/bg/bg-texture.webp") }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    background-repeat: no-repeat;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: transparent;
    z-index: -1;
}

.hero-particles {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: -1;
}

.hero-particles .particle {
    position: absolute;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    animation: heroFloat 8s ease-in-out infinite;
}

.hero-particles .particle:nth-child(1) {
    width: 20px;
    height: 20px;
    left: 10%;
    top: 20%;
    animation-delay: 0s;
}

.hero-particles .particle:nth-child(2) {
    width: 15px;
    height: 15px;
    left: 80%;
    top: 60%;
    animation-delay: 2s;
}

.hero-particles .particle:nth-child(3) {
    width: 25px;
    height: 25px;
    left: 60%;
    top: 30%;
    animation-delay: 4s;
}

.hero-particles .particle:nth-child(4) {
    width: 12px;
    height: 12px;
    left: 30%;
    top: 70%;
    animation-delay: 1s;
}

.hero-particles .particle:nth-child(6) {
    width: 14px;
    height: 14px;
    left: 5%;
    top: 80%;
    animation-delay: 2.5s;
}

.hero-particles .particle:nth-child(7) {
    width: 22px;
    height: 22px;
    left: 75%;
    top: 15%;
    animation-delay: 3.5s;
}

.hero-particles .particle:nth-child(8) {
    width: 16px;
    height: 16px;
    left: 40%;
    top: 85%;
    animation-delay: 4.5s;
}

.hero-particles .particle:nth-child(9) {
    width: 13px;
    height: 13px;
    left: 90%;
    top: 40%;
    animation-delay: 5s;
}

.hero-particles .particle:nth-child(10) {
    width: 19px;
    height: 19px;
    left: 15%;
    top: 10%;
    animation-delay: 6s;
}

@keyframes heroFloat {
    0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.3; }
    50% { transform: translateY(-20px) rotate(180deg); opacity: 0.8; }
}

.hero-content {
    color: white;
    z-index: 1;
    position: relative;
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 50px;
    padding: 8px 20px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 30px;
    animation: fadeInUp 0.8s ease-out;
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 900;
    line-height: 1.1;
    margin-bottom: 25px;
    animation: fadeInUp 0.8s ease-out 0.2s both;
}

.hero-title .highlight {
    background: linear-gradient(135deg, #ff6b6b, #ffd93d);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
}

.hero-description {
    font-size: 1.2rem;
    line-height: 1.7;
    margin-bottom: 40px;
    opacity: 0.9;
    animation: fadeInUp 0.8s ease-out 0.4s both;
}

.hero-stats {
    display: flex;
    gap: 40px;
    margin-bottom: 40px;
    animation: fadeInUp 0.8s ease-out 0.6s both;
}

.stat-item {
    text-align: center;
}

.stat-number {
    display: block;
    font-size: 2.5rem;
    font-weight: 900;
    color: #ffd93d;
    margin-bottom: 5px;
}

.stat-label {
    font-size: 0.9rem;
    opacity: 0.8;
}

.hero-actions {
    display: flex;
    gap: 20px;
    animation: fadeInUp 0.8s ease-out 0.8s both;
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 15px 30px;
    border-radius: 12px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.btn-primary {
    background: linear-gradient(135deg, #ff6b6b, #ffd93d);
    color: #2d3748;
    box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(255, 107, 107, 0.4);
    color: #2d3748;
}

.btn-outline {
    background: transparent;
    color: white;
    border-color: rgba(255, 255, 255, 0.3);
    backdrop-filter: blur(10px);
}

.btn-outline:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.5);
    color: white;
    transform: translateY(-2px);
}

/* Hero Visual */
.hero-visual {
    position: relative;
    animation: fadeInRight 1s ease-out 0.5s both;
}

.visual-card {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.hero-image {
    width: 100%;
    height: 400px;
    object-fit: cover;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 2rem;
}

.visual-badge {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(255, 68, 68, 0.9);
    color: white;
    padding: 10px 15px;
    border-radius: 25px;
    font-weight: 600;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 8px;
}

.floating-elements {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    pointer-events: none;
}

.float-item {
    position: absolute;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 12px;
    padding: 15px 20px;
    font-weight: 600;
    font-size: 0.9rem;
    color: #2d3748;
    display: flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    animation: floatUp 3s ease-in-out infinite;
}

.float-item.item-1 {
    top: 10%;
    left: -10%;
    animation-delay: 0s;
}

.float-item.item-2 {
    bottom: 30%;
    right: -15%;
    animation-delay: 1s;
}

.float-item.item-3 {
    bottom: 10%;
    left: -15%;
    animation-delay: 2s;
}

@keyframes floatUp {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

/* Section Styles */
.section-header {
    text-align: center;
    margin-bottom: 60px;
}

.section-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, #7c1415, #b71c1c);
    color: white;
    border-radius: 50px;
    padding: 8px 20px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 20px;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: #2d3748;
    margin-bottom: 20px;
}

.section-description {
    font-size: 1.1rem;
    color: #64748b;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.7;
}

/* Products Section */
.products-section {
    padding: 100px 0;
    background: url('{{ asset("img/bg/bg-texture.webp") }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    position: relative;
    transition: all 0.3s ease;
}

/* Light theme products bg */
body.light-theme .products-section {
    background: url('{{ asset("img/bg/bg-texture-white.webp") }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

/* Dark theme products bg */
body.dark-theme .products-section {
    background: url('{{ asset("img/bg/bg-texture.webp") }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

.products-section .container {
    position: relative;
    z-index: 2;
}

.product-card {
    background: 
        linear-gradient(135deg, 
            rgba(255, 255, 255, 0.95) 0%, 
            rgba(250, 250, 250, 0.9) 100%
        );
    backdrop-filter: blur(20px) saturate(180%);
    border-radius: 25px;
    padding: 40px 30px;
    text-align: center;
    box-shadow: 
        0 15px 35px rgba(0, 0, 0, 0.15),
        0 5px 15px rgba(124, 20, 21, 0.1),
        inset 0 1px 0 rgba(255, 255, 255, 0.8);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    height: 100%;
    position: relative;
    overflow: hidden;
}

.product-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, 
        transparent 0%, 
        rgba(124, 20, 21, 0.05) 50%, 
        transparent 100%);
    transition: left 0.6s ease;
}

.product-card:hover::before {
    left: 100%;
}

.product-card:hover {
    transform: translateY(-15px) scale(1.02);
    box-shadow: 
        0 25px 50px rgba(124, 20, 21, 0.15),
        0 15px 25px rgba(0, 0, 0, 0.1),
        inset 0 1px 0 rgba(255, 255, 255, 0.9);
    border-color: rgba(124, 20, 21, 0.2);
}

.product-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #7c1415, #b71c1c);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 25px;
    color: white;
    font-size: 2rem;
}

.product-card h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 15px;
}

.product-card p {
    color: #64748b;
    margin-bottom: 25px;
    line-height: 1.6;
}

.product-features {
    list-style: none;
    padding: 0;
    margin-bottom: 30px;
}

.product-features li {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 8px;
    color: #475569;
    font-size: 0.9rem;
}

.product-features .fa-check {
    color: #10b981;
    font-size: 0.8rem;
}

.product-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #7c1415;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.product-link:hover {
    color: #b71c1c;
    gap: 12px;
}

/* Services Section */
.services-section {
    padding: 100px 0;
    background: url('{{ asset("img/bg/bg-texture.webp") }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    position: relative;
    transition: all 0.3s ease;
}

/* Light theme services bg */
body.light-theme .services-section {
    background: url('{{ asset("img/bg/bg-texture-white.webp") }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

/* Dark theme services bg */
body.dark-theme .services-section {
    background: url('{{ asset("img/bg/bg-texture.webp") }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

.services-section .container {
    position: relative;
    z-index: 2;
}

.service-list {
    margin-top: 40px;
}

.service-item {
    display: flex;
    align-items: flex-start;
    gap: 20px;
    margin-bottom: 30px;
    padding: 30px;
    background: 
        linear-gradient(135deg, 
            rgba(255, 255, 255, 0.95) 0%, 
            rgba(250, 250, 250, 0.9) 100%
        );
    backdrop-filter: blur(15px) saturate(180%);
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 
        0 10px 25px rgba(0, 0, 0, 0.12),
        0 4px 10px rgba(124, 20, 21, 0.08),
        inset 0 1px 0 rgba(255, 255, 255, 0.6);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    overflow: hidden;
}

.service-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, 
        transparent 0%, 
        rgba(124, 20, 21, 0.03) 50%, 
        transparent 100%);
    transition: left 0.6s ease;
}

.service-item:hover::before {
    left: 100%;
}

.service-item:hover {
    background: 
        linear-gradient(135deg, 
            rgba(255, 255, 255, 0.98) 0%, 
            rgba(252, 252, 252, 0.95) 100%
        );
    transform: translateX(15px) translateY(-5px);
    box-shadow: 
        0 20px 40px rgba(0, 0, 0, 0.15),
        0 8px 16px rgba(124, 20, 21, 0.1),
        inset 0 1px 0 rgba(255, 255, 255, 0.7);
}

.service-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #7c1415, #b71c1c);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    flex-shrink: 0;
}

.service-content h4 {
    font-size: 1.2rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 8px;
}

.service-content p {
    color: #64748b;
    margin: 0;
    line-height: 1.6;
}

.services-visual {
    display: flex;
    align-items: center;
    justify-content: center;
}

.visual-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    max-width: 400px;
}

.grid-item {
    background: 
        linear-gradient(135deg, 
            rgba(255, 255, 255, 0.95) 0%, 
            rgba(250, 250, 250, 0.9) 100%
        );
    backdrop-filter: blur(15px) saturate(180%);
    border-radius: 20px;
    padding: 30px 20px;
    text-align: center;
    box-shadow: 
        0 12px 25px rgba(0, 0, 0, 0.1),
        0 5px 10px rgba(124, 20, 21, 0.05),
        inset 0 1px 0 rgba(255, 255, 255, 0.7);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    overflow: hidden;
}

.grid-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, 
        transparent 0%, 
        rgba(124, 20, 21, 0.03) 50%, 
        transparent 100%);
    transition: left 0.6s ease;
}

.grid-item:hover::before {
    left: 100%;
}

.grid-item:hover {
    transform: translateY(-8px) scale(1.05);
    box-shadow: 
        0 20px 40px rgba(0, 0, 0, 0.15),
        0 8px 16px rgba(124, 20, 21, 0.08),
        inset 0 1px 0 rgba(255, 255, 255, 0.8);
    border-color: rgba(255, 255, 255, 0.3);
}

.grid-item i {
    font-size: 2rem;
    color: #7c1415;
    margin-bottom: 15px;
    display: block;
}

.grid-item span {
    font-weight: 600;
    color: #2d3748;
    font-size: 0.9rem;
}

/* CTA Section */
.cta-section {
    position: relative;
    padding: 100px 0;
    color: white;
    text-align: center;
}

.cta-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('{{ asset("img/bg/bg-texture.webp") }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    z-index: -2;
    transition: all 0.3s ease;
}

/* Light theme cta bg */
body.light-theme .cta-bg {
    background: url('{{ asset("img/bg/bg-texture-white.webp") }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

/* Dark theme cta bg */
body.dark-theme .cta-bg {
    background: url('{{ asset("img/bg/bg-texture.webp") }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

.cta-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: transparent;
    z-index: -1;
}

.cta-title {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 20px;
}

.cta-description {
    font-size: 1.2rem;
    line-height: 1.7;
    margin-bottom: 40px;
    opacity: 0.9;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.cta-actions {
    display: flex;
    gap: 20px;
    justify-content: center;
    margin-bottom: 60px;
    flex-wrap: wrap;
}

.contact-info {
    display: flex;
    gap: 40px;
    justify-content: center;
    flex-wrap: wrap;
}

.contact-item {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 0.9rem;
    opacity: 0.9;
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInRight {
    from {
        opacity: 0;
        transform: translateX(30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-stats {
        gap: 20px;
    }
    
    .hero-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .btn {
        width: 100%;
        justify-content: center;
        max-width: 300px;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .float-item {
        display: none;
    }
    
    .contact-info {
        flex-direction: column;
        gap: 20px;
    }
    
    .cta-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .service-item {
        flex-direction: column;
        text-align: center;
    }
}

@media (max-width: 480px) {
    .hero-title {
        font-size: 2rem;
    }
    
    .cta-title {
        font-size: 2rem;
    }
    
    .visual-grid {
        grid-template-columns: 1fr;
    }
    
    .products-section,
    .services-section,
    .cta-section {
        padding: 60px 0;
    }
}

/* Theme-specific text colors */
body.light-theme .section-title {
    color: #1e293b;
}

body.dark-theme .section-title {
    color: #f1f5f9;
}

body.light-theme .section-description {
    color: #64748b;
}

body.dark-theme .section-description {
    color: #cbd5e1;
}

body.light-theme .product-card h3 {
    color: #2d3748;
}

body.dark-theme .product-card h3 {
    color: #1e293b;
}

body.light-theme .product-card p {
    color: #64748b;
}

body.dark-theme .product-card p {
    color: #475569;
}

body.light-theme .service-content h4 {
    color: #2d3748;
}

body.dark-theme .service-content h4 {
    color: #1e293b;
}

body.light-theme .service-content p {
    color: #64748b;
}

body.dark-theme .service-content p {
    color: #475569;
}

body.light-theme .grid-item span {
    color: #2d3748;
}

body.dark-theme .grid-item span {
    color: #1e293b;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe elements for animation
    const animateElements = document.querySelectorAll('.product-card, .service-item, .grid-item');
    animateElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'all 0.6s ease';
        observer.observe(el);
    });

    // Smooth scroll for anchor links
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

    // Counter animation
    function animateCounter(element, target) {
        let current = 0;
        const increment = target / 100;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current) + '+';
        }, 20);
    }

    // Trigger counter animation when stats come into view
    const statsObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const numbers = entry.target.querySelectorAll('.stat-number');
                numbers.forEach(num => {
                    const target = parseInt(num.textContent);
                    animateCounter(num, target);
                });
                statsObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    const statsSection = document.querySelector('.hero-stats');
    if (statsSection) {
        statsObserver.observe(statsSection);
    }
});
</script>
@endsection