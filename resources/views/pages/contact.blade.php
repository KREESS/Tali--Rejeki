@extends('components.layout')

@section('title', $title)

@push('head')
<link rel="preload" href="{{ asset('img/kontak/110.png') }}" as="image" type="image/png">
<!-- AOS Animation Library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- Additional Animation Styles -->
<style>
/* Enhanced Button Animations */
.hero-btn-primary, .hero-btn-secondary {
    position: relative;
    overflow: hidden;
    border: none;
    border-radius: 25px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    font-size: 0.875rem;
    z-index: 100 !important;
    text-decoration: none !important;
    cursor: pointer !important;
    pointer-events: all !important;
    display: inline-block;
    user-select: none;
    -webkit-user-select: none;
    -webkit-tap-highlight-color: rgba(0,0,0,0.1);
    touch-action: manipulation;
}

.hero-btn-primary:hover, .hero-btn-secondary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    text-decoration: none !important;
}

.btn-shine {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.3) 50%, transparent 70%);
    transform: translateX(-100%);
    transition: transform 0.6s ease;
    z-index: -1 !important;
    pointer-events: none !important;
}

.hero-btn-primary:hover .btn-shine,
.hero-btn-secondary:hover .btn-shine {
    transform: translateX(100%);
}

/* Custom AOS animations */
@keyframes slideInFromLeft {
    0% {
        transform: translateX(-100%);
        opacity: 0;
    }
    100% {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideInFromRight {
    0% {
        transform: translateX(100%);
        opacity: 0;
    }
    100% {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes fadeInUp {
    0% {
        transform: translateY(50px);
        opacity: 0;
    }
    100% {
        transform: translateY(0);
        opacity: 1;
    }
}

@keyframes zoomIn {
    0% {
        transform: scale(0.5);
        opacity: 0;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

@keyframes bounceIn {
    0% {
        transform: scale(0.3);
        opacity: 0;
    }
    50% {
        transform: scale(1.05);
    }
    70% {
        transform: scale(0.9);
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

/* Loading state for animations */
.animate-slide-left {
    animation: slideInFromLeft 0.8s ease-out;
}

.animate-slide-right {
    animation: slideInFromRight 0.8s ease-out;
}

.animate-fade-up {
    animation: fadeInUp 0.8s ease-out;
}

.animate-zoom-in {
    animation: zoomIn 0.6s ease-out;
}

.animate-bounce-in {
    animation: bounceIn 0.8s ease-out;
}

/* Button Click Fix */
.hero-actions {
    position: relative;
    z-index: 100;
}

.hero-actions a {
    position: relative;
    z-index: 101 !important;
    cursor: pointer !important;
    pointer-events: all !important;
    text-decoration: none !important;
    display: inline-block;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    -webkit-tap-highlight-color: rgba(0,0,0,0.1);
}

.hero-actions a:hover {
    text-decoration: none !important;
}

.hero-actions a * {
    pointer-events: none !important;
}

.hero-actions a .btn-shine {
    pointer-events: none !important;
}

/* Ensure buttons are clickable on all devices */
.hero-btn-primary,
.hero-btn-secondary {
    display: inline-block;
    position: relative;
    z-index: 102 !important;
    cursor: pointer !important;
    pointer-events: all !important;
    touch-action: manipulation;
    -webkit-tap-highlight-color: rgba(0,0,0,0.1);
    user-select: none;
    -webkit-user-select: none;
}

.hero-btn-primary:active,
.hero-btn-secondary:active {
    transform: scale(0.98) !important;
}

/* Fix overlay z-index conflicts */
.hero-section::before,
.hero-section::after {
    z-index: 1;
}

.hero-bg-pattern {
    z-index: 2;
}

.floating-shapes {
    z-index: 3;
    pointer-events: none;
}

.hero-section .container {
    position: relative;
    z-index: 10;
}
</style>
@endpush

@section('content')
<!-- Interactive Map Section with Enhanced Design -->
<div class="map-section position-relative" style="height: 50vh;" data-aos="fade-in" data-aos-duration="1000">
    <!-- Map Controls -->
    <div class="map-controls position-absolute top-0 start-0 m-4" style="z-index: 10;" data-aos="slide-right" data-aos-delay="200">
        <div class="btn-group shadow-lg" role="group">
            <button class="btn map-control-btn" onclick="openMapsApp()" title="Buka di Google Maps">
                <i class="fas fa-external-link-alt"></i>
            </button>
            <button class="btn map-control-btn" onclick="copyCoordinates()" title="Salin Koordinat">
                <i class="fas fa-copy"></i>
            </button>
            <button class="btn map-control-btn" onclick="getDirections()" title="Petunjuk Arah">
                <i class="fas fa-directions"></i>
            </button>
        </div>
    </div>
    
    <!-- Map Container -->
    <div class="map-container position-relative w-100 h-100 overflow-hidden">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.123456789!2d106.99002232946049!3d-6.165231597737094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMDknNTQuOCJTIDEwNsKwNTknMjQuMSJF!5e0!3m2!1sen!2sid!4v1694123456789!5m2!1sen!2sid"
            width="100%" 
            height="100%" 
            style="border:0; filter: grayscale(0%) contrast(1.1);" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        
        <!-- Map Overlay Gradient -->
        <div class="map-overlay position-absolute top-0 start-0 w-100 h-100 pointer-events-none"></div>
    </div>
    
    <!-- Enhanced Floating Map Info -->
    <div class="map-info-card position-absolute bottom-0 start-0 m-4" data-aos="slide-up" data-aos-delay="400">
        <div class="glass-card p-4 shadow-lg">
            <div class="d-flex align-items-center">
                <div class="map-pin-icon me-3">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div>
                    <h6 class="map-title fw-bold mb-1">PT. Tali Rejeki</h6>
                    <p class="map-address small mb-2">Tarumajaya, Bekasi 17215</p>
                    <div class="map-badges d-flex gap-2">
                        <span class="badge map-badge">
                            <i class="fas fa-clock me-1"></i>Buka Sekarang
                        </span>
                        <span class="badge map-badge">
                            <i class="fas fa-phone me-1"></i>Tersedia
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Breadcrumb Navigation -->
    <div class="map-breadcrumb position-absolute top-0 end-0 m-4" data-aos="slide-left" data-aos-delay="300">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb glass-card p-2 mb-0">
                <li class="breadcrumb-item"><a href="/" class="breadcrumb-link">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kontak</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Hero Section with Enhanced Design -->
<div class="hero-section position-relative py-5 mb-0 overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="hero-bg-pattern position-absolute top-0 start-0 w-100 h-100"></div>
    <div class="floating-shapes position-absolute top-0 start-0 w-100 h-100">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
        <div class="shape shape-4"></div>
    </div>
    
    <div class="container position-relative">
        <div class="row align-items-center min-vh-60">
            <div class="col-lg-6">
                <div class="hero-content" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">
                    <div class="hero-badge mb-3" data-aos="fade-down" data-aos-delay="400">
                        <span class="badge hero-company-badge px-3 py-1 fs-7 fw-semibold">
                            <i class="fas fa-building me-2"></i>PT. Tali Rejeki
                        </span>
                    </div>
                    <h1 class="hero-title display-4 fw-bold mb-3 position-relative" data-aos="fade-up" data-aos-delay="500">
                        Hubungi Kami
                        <div class="title-underline position-absolute"></div>
                    </h1>
                    <p class="hero-description mb-4 lh-base" data-aos="fade-up" data-aos-delay="600">
                        Temukan lokasi dan hubungi PT. Tali Rejeki untuk kebutuhan Anda. 
                        Kami siap melayani dengan sepenuh hati dan profesionalisme tinggi.
                    </p>
                    <div class="hero-actions d-flex flex-wrap gap-2" data-aos="fade-up" data-aos-delay="700">
                        <a href="#contact-info" 
                           class="btn hero-btn-primary btn-md px-4 py-2" 
                           onclick="return scrollToContact(event)"
                           role="button"
                           tabindex="0">
                            <i class="fas fa-info-circle me-2"></i>Info Kontak
                            <div class="btn-shine"></div>
                        </a>
                        <a href="https://wa.me/6281382523722?text=Halo,%20saya%20ingin%20bertanya%20tentang%20produk%20PT.%20Tali%20Rejeki" 
                           target="_blank" 
                           rel="noopener noreferrer" 
                           class="btn hero-btn-secondary btn-md px-4 py-2" 
                           onclick="return trackWhatsAppClick(event)"
                           role="button"
                           tabindex="0">
                            <i class="fab fa-whatsapp me-2"></i>Chat WhatsApp
                            <div class="btn-shine"></div>
                        </a>
                    </div>
                    
                    <!-- Floating Stats -->
                    <div class="hero-stats mt-4 d-flex flex-wrap gap-3" data-aos="fade-up" data-aos-delay="800">
                        <div class="stat-item" data-aos="zoom-in" data-aos-delay="900">
                            <div class="stat-number fw-bold">Senin-Jumat</div>
                            <div class="stat-label small">08:00 - 17:00 WIB</div>
                        </div>
                        <div class="stat-item" data-aos="zoom-in" data-aos-delay="1000">
                            <div class="stat-number fw-bold">14+</div>
                            <div class="stat-label small">Tahun Pengalaman</div>
                        </div>
                        <div class="stat-item" data-aos="zoom-in" data-aos-delay="1100">
                            <div class="stat-number fw-bold">1000+</div>
                            <div class="stat-label small">Klien Puas</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-visual text-center position-relative" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">
                    <div class="hero-icon-container position-relative">
                        <div class="hero-icon-bg position-absolute top-50 start-50 translate-middle"></div>
                        <i class="hero-main-icon fas fa-map-marked-alt position-relative" data-aos="zoom-in" data-aos-delay="800"></i>
                        <div class="icon-particles position-absolute top-0 start-0 w-100 h-100">
                            <div class="particle particle-1" data-aos="fade-in" data-aos-delay="1200"></div>
                            <div class="particle particle-2" data-aos="fade-in" data-aos-delay="1300"></div>
                            <div class="particle particle-3" data-aos="fade-in" data-aos-delay="1400"></div>
                            <div class="particle particle-4" data-aos="fade-in" data-aos-delay="1500"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Enhanced Contact Information Section -->
<div class="contact-section py-5" id="contact-info">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up" data-aos-duration="800">
            <h2 class="section-title fw-bold mb-3" data-aos="fade-up" data-aos-delay="200">Informasi Kontak</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="300">Berbagai cara untuk terhubung dengan kami</p>
            <div class="section-divider mx-auto" data-aos="zoom-in" data-aos-delay="400"></div>
        </div>
        
        <div class="row g-4">
            <!-- Company Information Card -->
            <div class="col-lg-8">
                <div class="company-info-card glass-card h-100 p-5" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">
                    <!-- Company Header -->
                    <div class="company-header d-flex align-items-center mb-5" data-aos="fade-up" data-aos-delay="400">
                        <div class="company-logo-container me-4" data-aos="zoom-in" data-aos-delay="600">
                            <div class="company-logo">
                                <i class="fas fa-building fa-2x"></i>
                            </div>
                            <div class="logo-glow"></div>
                        </div>
                        <div>
                            <h2 class="company-name mb-2" data-aos="fade-left" data-aos-delay="700">PT. TALI REJEKI</h2>
                            <p class="company-tagline mb-0" data-aos="fade-left" data-aos-delay="800">Your Trusted Business Partner Since 2011</p>
                            <div class="company-rating mt-2" data-aos="fade-left" data-aos-delay="900">
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="rating-text ms-2">5.0 (200+ Reviews)</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Contact Information Grid -->
                    <div class="contact-grid row g-4">
                        <!-- Address Card -->
                        <div class="col-md-6">
                            <div class="contact-info-item address-card h-100" data-aos="fade-up" data-aos-delay="500">
                                <div class="info-icon" data-aos="pulse" data-aos-delay="700">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="info-content">
                                    <h5 class="info-title mb-3" data-aos="fade-up" data-aos-delay="800">Alamat Lengkap</h5>
                                    <div class="address-details" data-aos="fade-up" data-aos-delay="900">
                                        <p class="address-line">JL. RAYA TARUMAJAYA NO. 11</p>
                                        <p class="address-line">RT 001 RW 029 DUSUN III</p>
                                        <p class="address-line">DESA SETIA ASIH</p>
                                        <p class="address-line">KEC. TARUMAJAYA</p>
                                        <p class="address-line fw-semibold">KAB. BEKASI 17215</p>
                                    </div>
                                    <button class="btn copy-btn mt-3" onclick="copyAddress()" data-aos="fade-up" data-aos-delay="1000">
                                        <i class="fas fa-copy me-2"></i>Salin Alamat
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- GPS Coordinates -->
                        <div class="col-md-6">
                            <div class="contact-info-item coordinates-card h-100" data-aos="fade-up" data-aos-delay="600">
                                <div class="info-icon" data-aos="pulse" data-aos-delay="800">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <div class="info-content">
                                    <h5 class="info-title mb-3" data-aos="fade-up" data-aos-delay="900">Koordinat GPS</h5>
                                    <div class="coordinates-details" data-aos="fade-up" data-aos-delay="1000">
                                        <div class="coordinate-item mb-3">
                                            <label class="coordinate-label">Latitude:</label>
                                            <span class="coordinate-value" id="latitude">-6.165231597737094</span>
                                        </div>
                                        <div class="coordinate-item">
                                            <label class="coordinate-label">Longitude:</label>
                                            <span class="coordinate-value" id="longitude">106.99002232946049</span>
                                        </div>
                                    </div>
                                    <button class="btn copy-btn mt-3" onclick="copyCoordinates()" data-aos="fade-up" data-aos-delay="1100">
                                        <i class="fas fa-copy me-2"></i>Salin Koordinat
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Contact Methods -->
                        <div class="col-md-6">
                            <div class="contact-info-item contact-methods-card h-100" data-aos="fade-up" data-aos-delay="700">
                                <div class="info-icon" data-aos="pulse" data-aos-delay="900">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="info-content">
                                    <h5 class="info-title mb-3" data-aos="fade-up" data-aos-delay="1000">Hubungi Kami</h5>
                                    <div class="contact-methods" data-aos="fade-up" data-aos-delay="1100">
                                        <div class="contact-method">
                                            <i class="method-icon fas fa-phone-alt"></i>
                                            <a href="tel:+6202129470622" class="method-link">
                                                (021) 2947-0622
                                            </a>
                                            <span class="method-status online">Tersedia</span>
                                        </div>
                                        <div class="contact-method">
                                            <i class="method-icon fas fa-phone-alt"></i>
                                            <a href="tel:+6202122889956" class="method-link">
                                                (021) 2288-9956
                                            </a>
                                            <span class="method-status online">Tersedia</span>
                                        </div>
                                        <div class="contact-method">
                                            <i class="method-icon fas fa-fax"></i>
                                            <span class="method-link">
                                                (021) 2947-0622
                                            </span>
                                            <span class="method-status">Fax</span>
                                        </div>
                                        <div class="contact-method">
                                            <i class="method-icon fas fa-envelope"></i>
                                            <a href="mailto:talirejeki@gmail.com" class="method-link">
                                                talirejeki@gmail.com
                                            </a>
                                            <span class="method-status">Email</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Operating Hours -->
                        <div class="col-md-6">
                            <div class="contact-info-item hours-card h-100" data-aos="fade-up" data-aos-delay="800">
                                <div class="info-icon" data-aos="pulse" data-aos-delay="1000">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="info-content">
                                    <h5 class="info-title mb-3" data-aos="fade-up" data-aos-delay="1100">Jam Operasional</h5>
                                    <div class="operating-hours" data-aos="fade-up" data-aos-delay="1200">
                                        <div class="hours-row">
                                            <span class="day">Senin - Jumat</span>
                                            <span class="time">08:00 - 17:00 WIB</span>
                                        </div>
                                        <div class="hours-row">
                                            <span class="day">Sabtu</span>
                                            <span class="time">Tutup</span>
                                        </div>
                                        <div class="hours-row">
                                            <span class="day">Minggu</span>
                                            <span class="time">Tutup</span>
                                        </div>
                                    </div>
                                    <div class="current-status mt-3" data-aos="fade-up" data-aos-delay="1300">
                                        <span class="status-badge open">
                                            <i class="fas fa-circle me-2"></i>Jam Kerja Normal
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Enhanced Contact Form -->
            <div class="col-lg-4">
                <div class="contact-form-card glass-card h-100 p-4" data-aos="fade-left" data-aos-delay="300">
                    <div class="form-header text-center mb-4" data-aos="fade-up" data-aos-delay="500">
                        <div class="form-icon-container mb-3" data-aos="zoom-in" data-aos-delay="700">
                            <i class="fas fa-paper-plane form-icon"></i>
                        </div>
                        <h4 class="form-title mb-2" data-aos="fade-up" data-aos-delay="800">Kirim Pesan</h4>
                        <p class="form-subtitle" data-aos="fade-up" data-aos-delay="900">Kami akan merespon dalam 24 jam</p>
                    </div>
                    
                    <form class="contact-form" id="contactForm">
                        <div class="form-floating mb-3" data-aos="fade-up" data-aos-delay="1000">
                            <input type="text" class="form-control modern-input" id="name" required placeholder="Nama Lengkap">
                            <label for="name">Nama Lengkap</label>
                            <div class="input-underline"></div>
                        </div>
                        
                        <div class="form-floating mb-3" data-aos="fade-up" data-aos-delay="1100">
                            <input type="email" class="form-control modern-input" id="email" required placeholder="Email">
                            <label for="email">Email</label>
                            <div class="input-underline"></div>
                        </div>
                        
                        <div class="form-floating mb-3" data-aos="fade-up" data-aos-delay="1200">
                            <input type="tel" class="form-control modern-input" id="phone" placeholder="Nomor Telepon">
                            <label for="phone">Nomor Telepon</label>
                            <div class="input-underline"></div>
                        </div>
                        
                        <div class="form-floating mb-3" data-aos="fade-up" data-aos-delay="1300">
                            <select class="form-select modern-input" id="category" required>
                                <option value="">Pilih Kategori</option>
                                <option value="general">Pertanyaan Umum</option>
                                <option value="business">Kerjasama Bisnis</option>
                                <option value="product">Informasi Produk</option>
                                <option value="support">Dukungan Teknis</option>
                                <option value="complaint">Keluhan</option>
                            </select>
                            <label for="category">Kategori Pesan</label>
                            <div class="input-underline"></div>
                        </div>
                        
                        <div class="form-floating mb-4" data-aos="fade-up" data-aos-delay="1400">
                            <textarea class="form-control modern-input" id="message" rows="4" required placeholder="Pesan Anda" style="height: 120px;"></textarea>
                            <label for="message">Pesan Anda</label>
                            <div class="input-underline"></div>
                        </div>
                        
                        <button type="submit" class="btn form-submit-btn w-100 py-3 fw-semibold" data-aos="fade-up" data-aos-delay="1500">
                            <span class="btn-content">
                                <i class="fas fa-send me-2"></i>Kirim Pesan
                            </span>
                            <div class="btn-loading d-none">
                                <div class="spinner-border spinner-border-sm me-2"></div>
                                Mengirim...
                            </div>
                        </button>
                        
                        <div class="form-footer text-center mt-3" data-aos="fade-up" data-aos-delay="1600">
                            <small class="form-note">
                                <i class="fas fa-shield-alt me-1"></i>
                                Data Anda aman dan tidak akan dibagikan
                            </small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Enhanced Quick Actions Section -->
<div class="quick-actions-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up" data-aos-duration="800">
            <h2 class="section-title fw-bold mb-3" data-aos="fade-up" data-aos-delay="200">Cara Mudah Menghubungi Kami</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="300">Pilih cara yang paling nyaman untuk Anda</p>
            <div class="section-divider mx-auto" data-aos="zoom-in" data-aos-delay="400"></div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="action-card glass-card h-100 text-center p-4 position-relative overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                    <div class="action-bg-pattern"></div>
                    <div class="action-content position-relative">
                        <div class="action-icon-container mb-4" data-aos="zoom-in" data-aos-delay="400">
                            <div class="action-icon directions-icon">
                                <i class="fas fa-directions fa-2x"></i>
                            </div>
                            <div class="icon-glow directions-glow"></div>
                        </div>
                        <h5 class="action-title fw-bold mb-3" data-aos="fade-up" data-aos-delay="500">Petunjuk Arah</h5>
                        <p class="action-description mb-4" data-aos="fade-up" data-aos-delay="600">Dapatkan rute tercepat menuju lokasi kami dengan Google Maps</p>
                        <button onclick="getDirections()" class="btn action-btn directions-btn px-4 py-2" data-aos="fade-up" data-aos-delay="700">
                            <i class="fas fa-external-link-alt me-2"></i>Buka Maps
                        </button>
                        <div class="action-stats mt-3" data-aos="fade-up" data-aos-delay="800">
                            <small class="stat-text">
                                <i class="fas fa-clock me-1"></i>±45 menit dari Jakarta
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="action-card glass-card h-100 text-center p-4 position-relative overflow-hidden" data-aos="fade-up" data-aos-delay="300">
                    <div class="action-bg-pattern"></div>
                    <div class="action-content position-relative">
                        <div class="action-icon-container mb-4" data-aos="zoom-in" data-aos-delay="500">
                            <div class="action-icon whatsapp-icon">
                                <i class="fab fa-whatsapp fa-2x"></i>
                            </div>
                            <div class="icon-glow whatsapp-glow"></div>
                        </div>
                        <h5 class="action-title fw-bold mb-3" data-aos="fade-up" data-aos-delay="600">WhatsApp</h5>
                        <p class="action-description mb-4" data-aos="fade-up" data-aos-delay="700">Chat langsung dengan tim marketing kami</p>
                        <a href="https://wa.me/6281382523722?text=Halo,%20saya%20ingin%20bertanya%20tentang%20produk%20PT.%20Tali%20Rejeki" 
                           target="_blank" 
                           rel="noopener noreferrer" 
                           class="btn action-btn whatsapp-btn px-4 py-2" 
                           data-aos="fade-up" 
                           data-aos-delay="800"
                           role="button"
                           tabindex="0">
                            <i class="fab fa-whatsapp me-2"></i>Chat Siti
                        </a>
                        <div class="action-stats mt-3" data-aos="fade-up" data-aos-delay="900">
                            <small class="stat-text">
                                <i class="fas fa-user me-1"></i>Tim Marketing Tersedia
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="action-card glass-card h-100 text-center p-4 position-relative overflow-hidden" data-aos="fade-up" data-aos-delay="400">
                    <div class="action-bg-pattern"></div>
                    <div class="action-content position-relative">
                        <div class="action-icon-container mb-4" data-aos="zoom-in" data-aos-delay="600">
                            <div class="action-icon email-icon">
                                <i class="fas fa-envelope fa-2x"></i>
                            </div>
                            <div class="icon-glow email-glow"></div>
                        </div>
                        <h5 class="action-title fw-bold mb-3" data-aos="fade-up" data-aos-delay="700">Email</h5>
                        <p class="action-description mb-4" data-aos="fade-up" data-aos-delay="800">Kirim email untuk pertanyaan detail dan penawaran khusus</p>
                        <a href="mailto:talirejeki@gmail.com?subject=Pertanyaan%20tentang%20Produk&body=Halo%20PT.%20Tali%20Rejeki,%0A%0ASaya%20ingin%20bertanya%20tentang..." class="btn action-btn email-btn px-4 py-2" data-aos="fade-up" data-aos-delay="900">
                            <i class="fas fa-envelope me-2"></i>Kirim Email
                        </a>
                        <div class="action-stats mt-3" data-aos="fade-up" data-aos-delay="1000">
                            <small class="stat-text">
                                <i class="fas fa-clock me-1"></i>Respon dalam 24 jam
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="action-card glass-card h-100 text-center p-4 position-relative overflow-hidden" data-aos="fade-up" data-aos-delay="500">
                    <div class="action-bg-pattern"></div>
                    <div class="action-content position-relative">
                        <div class="action-icon-container mb-4" data-aos="zoom-in" data-aos-delay="700">
                            <div class="action-icon phone-icon">
                                <i class="fas fa-phone fa-2x"></i>
                            </div>
                            <div class="icon-glow phone-glow"></div>
                        </div>
                        <h5 class="action-title fw-bold mb-3" data-aos="fade-up" data-aos-delay="800">Telepon</h5>
                        <p class="action-description mb-4" data-aos="fade-up" data-aos-delay="900">Hubungi langsung untuk konsultasi dan informasi produk</p>
                        <a href="tel:+6202129470622" class="btn action-btn phone-btn px-4 py-2" data-aos="fade-up" data-aos-delay="1000">
                            <i class="fas fa-phone me-2"></i>Telepon
                        </a>
                        <div class="action-stats mt-3" data-aos="fade-up" data-aos-delay="1100">
                            <small class="stat-text">
                                <i class="fas fa-user-headset me-1"></i>Tim siap melayani
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Persons Section -->
<div class="contact-persons-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up" data-aos-duration="800">
            <h2 class="section-title fw-bold mb-3" data-aos="fade-up" data-aos-delay="200">Tim Marketing Kami</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="300">Hubungi langsung tim marketing untuk kebutuhan Anda</p>
            <div class="section-divider mx-auto" data-aos="zoom-in" data-aos-delay="400"></div>
        </div>
        
        <div class="row g-4 justify-content-center">
            <div class="col-lg-3 col-md-6">
                <div class="person-card glass-card text-center p-4 h-100" data-aos="fade-up" data-aos-delay="200">
                    <div class="person-avatar mb-3" data-aos="zoom-in" data-aos-delay="400">
                        <div class="avatar-icon">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                    </div>
                    <h5 class="person-name fw-bold mb-2" data-aos="fade-up" data-aos-delay="500">Siti</h5>
                    <p class="person-role mb-3" data-aos="fade-up" data-aos-delay="600">Marketing Executive</p>
                    <a href="https://wa.me/6281382523722?text=Halo%20Siti,%20saya%20ingin%20bertanya%20tentang%20produk%20PT.%20Tali%20Rejeki" target="_blank" rel="noopener" class="btn btn-whatsapp w-100 mb-2" data-aos="fade-up" data-aos-delay="700">
                        <i class="fab fa-whatsapp me-2"></i>0813 8252 3722
                    </a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="person-card glass-card text-center p-4 h-100" data-aos="fade-up" data-aos-delay="300">
                    <div class="person-avatar mb-3" data-aos="zoom-in" data-aos-delay="500">
                        <div class="avatar-icon">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                    </div>
                    <h5 class="person-name fw-bold mb-2" data-aos="fade-up" data-aos-delay="600">Kurnia</h5>
                    <p class="person-role mb-3" data-aos="fade-up" data-aos-delay="700">Marketing Specialist</p>
                    <a href="https://wa.me/6281384808218?text=Halo%20Kurnia,%20saya%20ingin%20bertanya%20tentang%20produk%20PT.%20Tali%20Rejeki" target="_blank" rel="noopener" class="btn btn-whatsapp w-100 mb-2" data-aos="fade-up" data-aos-delay="800">
                        <i class="fab fa-whatsapp me-2"></i>0813 8480 8218
                    </a>
                    <small class="text-muted" data-aos="fade-up" data-aos-delay="900">(WhatsApp Only)</small>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="person-card glass-card text-center p-4 h-100" data-aos="fade-up" data-aos-delay="400">
                    <div class="person-avatar mb-3" data-aos="zoom-in" data-aos-delay="600">
                        <div class="avatar-icon">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                    </div>
                    <h5 class="person-name fw-bold mb-2" data-aos="fade-up" data-aos-delay="700">Yovien Agustina</h5>
                    <p class="person-role mb-3" data-aos="fade-up" data-aos-delay="800">Marketing Consultant</p>
                    <a href="https://wa.me/6281385231149?text=Halo%20Yovien,%20saya%20ingin%20bertanya%20tentang%20produk%20PT.%20Tali%20Rejeki" target="_blank" rel="noopener" class="btn btn-whatsapp w-100 mb-2" data-aos="fade-up" data-aos-delay="900">
                        <i class="fab fa-whatsapp me-2"></i>0813 8523 1149
                    </a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="person-card glass-card text-center p-4 h-100" data-aos="fade-up" data-aos-delay="500">
                    <div class="person-avatar mb-3" data-aos="zoom-in" data-aos-delay="700">
                        <div class="avatar-icon">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                    </div>
                    <h5 class="person-name fw-bold mb-2" data-aos="fade-up" data-aos-delay="800">Edy Purwanto</h5>
                    <p class="person-role mb-3" data-aos="fade-up" data-aos-delay="900">Senior Marketing</p>
                    <a href="https://wa.me/6281514515990?text=Halo%20Edy,%20saya%20ingin%20bertanya%20tentang%20produk%20PT.%20Tali%20Rejeki" target="_blank" rel="noopener" class="btn btn-whatsapp w-100 mb-2" data-aos="fade-up" data-aos-delay="1000">
                        <i class="fab fa-whatsapp me-2"></i>0815 1451 5990
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Enhanced Features Section -->
<div class="features-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up" data-aos-delay="100">
            <h2 class="section-title fw-bold mb-3" data-aos="fade-up" data-aos-delay="200">Mengapa Memilih PT. Tali Rejeki?</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="300">Komitmen kami untuk memberikan pelayanan terbaik</p>
            <div class="section-divider mx-auto" data-aos="scale-x" data-aos-delay="400"></div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="feature-card glass-card text-center p-5 h-100 position-relative" data-aos="flip-left" data-aos-delay="200">
                    <div class="feature-bg-pattern"></div>
                    <div class="feature-content position-relative">
                        <div class="feature-icon-container mb-4" data-aos="zoom-in" data-aos-delay="400">
                            <div class="feature-icon quality-icon">
                                <i class="fas fa-medal fa-3x"></i>
                            </div>
                            <div class="feature-glow quality-glow"></div>
                            <div class="feature-particles">
                                <div class="particle"></div>
                                <div class="particle"></div>
                                <div class="particle"></div>
                            </div>
                        </div>
                        <h4 class="feature-title fw-bold mb-3" data-aos="fade-up" data-aos-delay="500">Kualitas Terjamin</h4>
                        <p class="feature-description mb-4" data-aos="fade-up" data-aos-delay="600">Produk berkualitas tinggi dengan standar internasional yang telah teruji dan bersertifikat</p>
                        <div class="feature-stats mb-3" data-aos="fade-up" data-aos-delay="700">
                            <div class="stat-badges d-flex justify-content-center gap-2 flex-wrap">
                                <span class="badge feature-badge">ISO 9001:2015</span>
                                <span class="badge feature-badge">SNI Certified</span>
                            </div>
                        </div>
                        <div class="feature-metrics" data-aos="fade-up" data-aos-delay="800">
                            <div class="metric">
                                <span class="metric-number">99.9%</span>
                                <span class="metric-label">Quality Rate</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-card glass-card text-center p-5 h-100 position-relative" data-aos="flip-left" data-aos-delay="400">
                    <div class="feature-bg-pattern"></div>
                    <div class="feature-content position-relative">
                        <div class="feature-icon-container mb-4" data-aos="zoom-in" data-aos-delay="600">
                            <div class="feature-icon shipping-icon">
                                <i class="fas fa-shipping-fast fa-3x"></i>
                            </div>
                            <div class="feature-glow shipping-glow"></div>
                            <div class="feature-particles">
                                <div class="particle"></div>
                                <div class="particle"></div>
                                <div class="particle"></div>
                            </div>
                        </div>
                        <h4 class="feature-title fw-bold mb-3" data-aos="fade-up" data-aos-delay="700">Pengiriman Cepat</h4>
                        <p class="feature-description mb-4" data-aos="fade-up" data-aos-delay="800">Layanan pengiriman express ke seluruh Indonesia dengan jaminan keamanan dan ketepatan waktu</p>
                        <div class="feature-stats mb-3" data-aos="fade-up" data-aos-delay="900">
                            <div class="stat-badges d-flex justify-content-center gap-2 flex-wrap">
                                <span class="badge feature-badge">Same Day</span>
                                <span class="badge feature-badge">Nationwide</span>
                            </div>
                        </div>
                        <div class="feature-metrics" data-aos="fade-up" data-aos-delay="1000">
                            <div class="metric">
                                <span class="metric-number">1-3</span>
                                <span class="metric-label">Hari Kerja</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-card glass-card text-center p-5 h-100 position-relative" data-aos="flip-left" data-aos-delay="600">
                    <div class="feature-bg-pattern"></div>
                    <div class="feature-content position-relative">
                        <div class="feature-icon-container mb-4" data-aos="zoom-in" data-aos-delay="800">
                            <div class="feature-icon support-icon">
                                <i class="fas fa-headset fa-3x"></i>
                            </div>
                            <div class="feature-glow support-glow"></div>
                            <div class="feature-particles">
                                <div class="particle"></div>
                                <div class="particle"></div>
                                <div class="particle"></div>
                            </div>
                        </div>
                        <h4 class="feature-title fw-bold mb-3" data-aos="fade-up" data-aos-delay="900">Customer Service 24/7</h4>
                        <p class="feature-description mb-4" data-aos="fade-up" data-aos-delay="1000">Tim customer service profesional siap membantu Anda dengan respon cepat dan solusi terbaik</p>
                        <div class="feature-stats mb-3" data-aos="fade-up" data-aos-delay="1100">
                            <div class="stat-badges d-flex justify-content-center gap-2 flex-wrap">
                                <span class="badge feature-badge">24/7 Support</span>
                                <span class="badge feature-badge">Expert Team</span>
                            </div>
                        </div>
                        <div class="feature-metrics" data-aos="fade-up" data-aos-delay="1200">
                            <div class="metric">
                                <span class="metric-number">&lt;30</span>
                                <span class="metric-label">Menit Respon</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Additional Features Row -->
        <div class="row g-4 mt-4">
            <div class="col-lg-6">
                <div class="mini-feature-card glass-card p-4 h-100" data-aos="slide-right" data-aos-delay="300">
                    <div class="d-flex align-items-center">
                        <div class="mini-feature-icon me-4" data-aos="bounce" data-aos-delay="500">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div>
                            <h6 class="mini-feature-title fw-semibold mb-2" data-aos="fade-up" data-aos-delay="600">Garansi Produk</h6>
                            <p class="mini-feature-text mb-0" data-aos="fade-up" data-aos-delay="700">Jaminan garansi resmi untuk semua produk yang kami jual</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="mini-feature-card glass-card p-4 h-100" data-aos="slide-left" data-aos-delay="500">
                    <div class="d-flex align-items-center">
                        <div class="mini-feature-icon me-4" data-aos="bounce" data-aos-delay="700">
                            <i class="fas fa-award"></i>
                        </div>
                        <div>
                            <h6 class="mini-feature-title fw-semibold mb-2" data-aos="fade-up" data-aos-delay="800">Trusted Partner</h6>
                            <p class="mini-feature-text mb-0" data-aos="fade-up" data-aos-delay="900">Dipercaya oleh 1000+ perusahaan di seluruh Indonesia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* CSS Custom Properties for Theme System */
:root {
    /* Light Theme Colors */
    --primary-color: #8B0000;
    --primary-light: #DC143C;
    --secondary-color: #B22222;
    --accent-color: #CD5C5C;
    --success-color: #25D366;
    --warning-color: #FFA500;
    --info-color: #17A2B8;
    
    /* Background Colors */
    --bg-primary: #ffffff;
    --bg-secondary: #f8f9fa;
    --bg-tertiary: #e9ecef;
    
    /* Text Colors */
    --text-primary: #212529;
    --text-secondary: #6c757d;
    --text-muted: #868e96;
    --text-light: rgba(255, 255, 255, 0.9);
    
    /* Border Colors */
    --border-color: #dee2e6;
    --border-light: rgba(255, 255, 255, 0.1);
    
    /* Shadow Colors */
    --shadow-color: rgba(0, 0, 0, 0.1);
    --shadow-dark: rgba(0, 0, 0, 0.2);
    
    /* Glass Effect */
    --glass-bg: rgba(255, 255, 255, 0.95);
    --glass-border: rgba(255, 255, 255, 0.2);
    --glass-shadow: rgba(0, 0, 0, 0.1);
}

body.dark-theme {
    /* Dark Theme Colors */
    --bg-primary: #1a1a1a;
    --bg-secondary: #2d2d2d;
    --bg-tertiary: #404040;
    
    --text-primary: #ffffff;
    --text-secondary: #e0e0e0;
    --text-muted: #b0b0b0;
    
    --border-color: #404040;
    --shadow-color: rgba(0, 0, 0, 0.3);
    --shadow-dark: rgba(0, 0, 0, 0.5);
    
    --glass-bg: rgba(42, 42, 42, 0.98);
    --glass-border: rgba(255, 255, 255, 0.15);
    --glass-shadow: rgba(0, 0, 0, 0.4);
}

/* Global Styles */
* {
    transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
}

/* Remove body background to let layout handle theming */
body {
    color: var(--text-primary);
    overflow-x: hidden;
}

/* Ensure main content areas inherit theme properly */
.main-content, main, #main {
    background: transparent;
}

/* Ensure all text uses theme colors */
h1, h2, h3, h4, h5, h6, p, span, div {
    color: inherit;
}

/* Hero Section Styles */
.hero-section {
    min-height: 70vh;
    background-color: #1a1a1a; /* Fallback background */
    background-image: url('{{ asset("img/kontak/110.png") }}');
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    position: relative;
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('{{ asset("img/kontak/110.png") }}');
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    filter: blur(2px);
    z-index: 1;
    transform: scale(1.05); /* Slight scale to hide blur edges */
}

.hero-section::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(
        135deg, 
        rgba(0, 0, 0, 0.5) 0%, 
        rgba(0, 0, 0, 0.3) 50%, 
        rgba(0, 0, 0, 0.5) 100%
    );
    z-index: 2;
}

.hero-section .container {
    position: relative;
    z-index: 3;
}

.hero-bg-pattern {
    background: 
        radial-gradient(circle at 20% 80%, rgba(255,255,255,0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(255,255,255,0.1) 0%, transparent 50%);
    animation: patternMove 10s ease-in-out infinite alternate;
    z-index: 4;
}

@keyframes patternMove {
    0% { transform: translateX(0px) translateY(0px); }
    100% { transform: translateX(20px) translateY(-20px); }
}

.floating-shapes {
    pointer-events: none;
    z-index: 4;
}

.shape {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    animation: floatShapes 8s ease-in-out infinite;
}

.shape-1 {
    width: 80px;
    height: 80px;
    top: 20%;
    left: 10%;
    animation-delay: 0s;
}

.shape-2 {
    width: 60px;
    height: 60px;
    top: 60%;
    right: 15%;
    animation-delay: 2s;
}

.shape-3 {
    width: 100px;
    height: 100px;
    bottom: 30%;
    left: 20%;
    animation-delay: 4s;
}

.shape-4 {
    width: 40px;
    height: 40px;
    top: 40%;
    right: 30%;
    animation-delay: 6s;
}

@keyframes floatShapes {
    0%, 100% { 
        transform: translateY(0px) rotate(0deg);
        opacity: 0.5;
    }
    50% { 
        transform: translateY(-30px) rotate(180deg);
        opacity: 0.8;
    }
}

/* Hero Content */
.min-vh-60 {
    min-height: 50vh;
}

.hero-company-badge {
    background: rgba(255, 255, 255, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: white;
    backdrop-filter: blur(10px);
    border-radius: 25px;
    font-size: 0.85rem;
}

.hero-title {
    color: white;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    margin-bottom: 1rem;
    font-size: 2.5rem;
}

.title-underline {
    bottom: -8px;
    left: 0;
    width: 80px;
    height: 3px;
    background: linear-gradient(90deg, white, rgba(255,255,255,0.5));
    border-radius: 2px;
    animation: underlineGrow 2s ease-out;
}

@keyframes underlineGrow {
    0% { width: 0; }
    100% { width: 80px; }
}

.hero-description {
    color: rgba(255, 255, 255, 0.9);
    line-height: 1.6;
    font-size: 1rem;
}

/* Enhanced Button Styles and Click Fix */
.button-clicked {
    animation: buttonClick 0.2s ease !important;
}

@keyframes buttonClick {
    0% { transform: scale(1); }
    50% { transform: scale(0.95); }
    100% { transform: scale(1); }
}

/* Hero Buttons */
.hero-btn-primary, .hero-btn-secondary {
    position: relative;
    overflow: hidden;
    border: none;
    border-radius: 25px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    font-size: 0.875rem;
    cursor: pointer;
    pointer-events: all;
    z-index: 1;
}

.hero-btn-primary {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.3);
}

.hero-btn-secondary {
    background: var(--success-color);
    color: white;
}

.btn-shine {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.3) 50%, transparent 70%);
    transform: translateX(-100%);
    transition: transform 0.6s ease;
    z-index: -1;
    pointer-events: none;
}

.hero-btn-primary:hover .btn-shine,
.hero-btn-secondary:hover .btn-shine {
    transform: translateX(100%);
}

.hero-btn-primary:hover,
.hero-btn-secondary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.2);
}

/* Hero Stats */
.hero-stats {
    margin-top: 2rem;
}

.stat-item {
    text-align: center;
    color: white;
}

.stat-number {
    font-size: 1.5rem;
    display: block;
    margin-bottom: 0.25rem;
}

.stat-label {
    opacity: 0.8;
    font-size: 0.75rem;
}

/* Hero Visual */
.hero-icon-container {
    width: 250px;
    height: 250px;
    margin: 0 auto;
}

.hero-icon-bg {
    width: 200px;
    height: 200px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    animation: pulse 3s ease-in-out infinite;
}

.hero-main-icon {
    font-size: 6rem;
    color: rgba(255, 255, 255, 0.8);
    z-index: 2;
}

.particle {
    position: absolute;
    width: 10px;
    height: 10px;
    background: rgba(255, 255, 255, 0.6);
    border-radius: 50%;
    animation: particleFloat 4s ease-in-out infinite;
}

.particle-1 { top: 20%; left: 20%; animation-delay: 0s; }
.particle-2 { top: 20%; right: 20%; animation-delay: 1s; }
.particle-3 { bottom: 20%; left: 20%; animation-delay: 2s; }
.particle-4 { bottom: 20%; right: 20%; animation-delay: 3s; }

@keyframes particleFloat {
    0%, 100% { transform: translateY(0px); opacity: 0.6; }
    50% { transform: translateY(-20px); opacity: 1; }
}

/* Wave Divider */
.hero-wave-divider {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
}

.hero-wave-divider svg {
    position: relative;
    display: block;
    width: calc(100% + 1.3px);
    height: 60px;
}

.wave-fill {
    fill: var(--bg-primary);
}

/* Glass Card Effect */
.glass-card {
    background: var(--glass-bg);
    backdrop-filter: blur(15px);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    box-shadow: 0 8px 32px var(--glass-shadow);
    transition: all 0.3s ease;
}

.glass-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px var(--shadow-dark);
}

/* Map Section */
.map-section {
    position: relative;
    border-radius: 0;
    overflow: hidden;
}

.map-container {
    border-radius: 0;
}

.map-overlay {
    background: linear-gradient(
        45deg,
        rgba(139, 0, 0, 0.1) 0%,
        transparent 50%,
        rgba(139, 0, 0, 0.1) 100%
    );
    pointer-events: none;
}

.map-control-btn {
    background: var(--glass-bg);
    backdrop-filter: blur(10px);
    border: 1px solid var(--glass-border);
    color: var(--text-primary);
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.map-control-btn:hover {
    background: var(--primary-color);
    color: white;
    transform: scale(1.1);
}

.map-info-card .map-pin-icon {
    width: 50px;
    height: 50px;
    background: var(--primary-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
}

.map-title {
    color: var(--text-primary);
    margin: 0;
}

.map-address {
    color: var(--text-secondary);
    margin: 0;
}

.map-badge {
    background: var(--primary-color);
    color: white;
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
}

.breadcrumb {
    background: var(--glass-bg);
    backdrop-filter: blur(15px);
    margin: 0;
    border: 1px solid var(--glass-border);
}

.breadcrumb-link {
    color: var(--primary-color) !important;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
}

.breadcrumb-link:hover {
    color: var(--primary-light) !important;
}

.breadcrumb-item.active {
    color: var(--text-primary) !important;
    font-weight: 600;
}

.breadcrumb-item + .breadcrumb-item::before {
    color: var(--text-secondary);
    font-weight: bold;
}

/* Section Styles */
.contact-section, .quick-actions-section, .features-section, .contact-persons-section {
    color: var(--text-primary);
}

.section-header {
    margin-bottom: 4rem;
}

.section-title {
    color: var(--text-primary);
    font-size: 2rem;
    margin-bottom: 1rem;
}

.section-subtitle {
    color: var(--text-secondary);
    font-size: 1rem;
    margin-bottom: 2rem;
}

.section-divider {
    width: 100px;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-color), var(--primary-light));
    border-radius: 2px;
}

/* Company Info Card */
.company-info-card {
    padding: 2.5rem;
}

.company-logo-container {
    position: relative;
}

.company-logo {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 2rem;
    position: relative;
    z-index: 2;
}

.logo-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100px;
    height: 100px;
    background: var(--primary-color);
    border-radius: 50%;
    opacity: 0.2;
    animation: logoGlow 3s ease-in-out infinite;
}

@keyframes logoGlow {
    0%, 100% { transform: translate(-50%, -50%) scale(1); opacity: 0.2; }
    50% { transform: translate(-50%, -50%) scale(1.2); opacity: 0.4; }
}

.company-name {
    color: var(--primary-color);
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.company-tagline {
    color: var(--text-secondary);
    font-size: 0.95rem;
}

.company-rating .stars {
    color: #ffc107;
}

.rating-text {
    color: var(--text-secondary);
    font-size: 0.9rem;
}

/* Contact Info Items */
.contact-info-item {
    padding: 2rem;
    border-radius: 16px;
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    backdrop-filter: blur(15px);
    transition: all 0.3s ease;
}

.contact-info-item:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px var(--shadow-dark);
}

.info-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    margin-bottom: 1.5rem;
}

.info-title {
    color: var(--text-primary);
    margin-bottom: 1.5rem;
    font-weight: 600;
}

.address-line {
    color: var(--text-secondary);
    margin-bottom: 0.5rem;
    line-height: 1.6;
}

.coordinate-label {
    color: var(--text-secondary);
    font-weight: 500;
}

.coordinate-value {
    color: var(--text-primary);
    font-family: 'Courier New', monospace;
    font-weight: 600;
}

.copy-btn {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    color: white;
    border: none;
    border-radius: 15px;
    padding: 0.4rem 0.8rem;
    font-size: 0.75rem;
    transition: all 0.3s ease;
}

.copy-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(139, 0, 0, 0.3);
}

/* Contact Methods */
.contact-method {
    display: flex;
    align-items: center;
    padding: 0.75rem 0;
    border-bottom: 1px solid var(--border-color);
}

.contact-method:last-child {
    border-bottom: none;
}

.method-icon {
    width: 20px;
    color: var(--primary-color);
    margin-right: 1rem;
}

.method-link {
    color: var(--text-primary);
    text-decoration: none;
    flex: 1;
    transition: color 0.3s ease;
}

.method-link:hover {
    color: var(--primary-color);
}

.method-status {
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
    border-radius: 12px;
    background: var(--bg-tertiary);
    color: var(--text-secondary);
}

.method-status.online {
    background: var(--success-color);
    color: white;
}

/* Operating Hours */
.hours-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem 0;
    border-bottom: 1px solid var(--border-color);
}

.hours-row:last-child {
    border-bottom: none;
}

.day {
    color: var(--text-primary);
    font-weight: 500;
}

.time {
    color: var(--text-secondary);
}

.status-indicator {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: var(--success-color);
}

.status-indicator.closed {
    background: #dc3545;
}

.status-badge {
    display: inline-flex;
    align-items: center;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.875rem;
    font-weight: 500;
}

.status-badge.open {
    background: rgba(37, 211, 102, 0.1);
    color: var(--success-color);
    border: 1px solid rgba(37, 211, 102, 0.2);
}

/* Contact Form */
.contact-form-card {
    padding: 2rem;
}

.form-icon-container {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}

.form-icon {
    color: white;
    font-size: 2rem;
}

.form-title {
    color: var(--text-primary);
    font-weight: 600;
    font-size: 1.2rem;
}

.form-subtitle {
    color: var(--text-secondary);
    font-size: 0.9rem;
}

.modern-input {
    background: var(--bg-primary);
    border: 2px solid var(--border-color);
    border-radius: 12px;
    color: var(--text-primary);
    padding: 1rem;
    font-size: 1rem;
    transition: all 0.3s ease;
    position: relative;
}

.modern-input:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(139, 0, 0, 0.25);
    background: var(--bg-primary);
    color: var(--text-primary);
}

.form-floating > label {
    color: var(--text-secondary);
}

.form-floating > .form-control:focus ~ label,
.form-floating > .form-control:not(:placeholder-shown) ~ label {
    color: var(--primary-color);
    font-weight: 500;
}

.input-underline {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 2px;
    background: var(--primary-color);
    transition: width 0.3s ease;
}

.modern-input:focus + label + .input-underline {
    width: 100%;
}

.form-submit-btn {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    color: white;
    border: none;
    border-radius: 25px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
    font-size: 0.85rem;
    padding: 0.75rem 1.5rem;
}

.form-submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(139, 0, 0, 0.3);
}

.form-note {
    color: var(--text-muted);
}

/* Action Cards */
.action-card {
    padding: 2rem;
    text-align: center;
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}

.action-card:hover {
    transform: translateY(-10px) scale(1.02);
}

.action-bg-pattern {
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(139, 0, 0, 0.05) 0%, transparent 70%);
    animation: patternRotate 10s linear infinite;
    pointer-events: none !important;
    z-index: 1;
}

.action-content {
    position: relative;
    z-index: 10;
}

@keyframes patternRotate {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.action-icon-container {
    position: relative;
    display: inline-block;
}

.action-icon {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    position: relative;
    z-index: 2;
    transition: all 0.3s ease;
}

.directions-icon { background: linear-gradient(135deg, var(--primary-color), var(--primary-light)); }
.whatsapp-icon { background: linear-gradient(135deg, #25D366, #128C7E); }
.email-icon { background: linear-gradient(135deg, #A0522D, #CD853F); }
.phone-icon { background: linear-gradient(135deg, #B22222, #CD5C5C); }

.icon-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100px;
    height: 100px;
    border-radius: 50%;
    opacity: 0;
    animation: iconGlow 2s ease-in-out infinite;
}

.directions-glow { background: var(--primary-color); }
.whatsapp-glow { background: #25D366; }
.email-glow { background: #A0522D; }
.phone-glow { background: #B22222; }

.action-card:hover .icon-glow {
    opacity: 0.3;
}

@keyframes iconGlow {
    0%, 100% { transform: translate(-50%, -50%) scale(1); }
    50% { transform: translate(-50%, -50%) scale(1.2); }
}

.status-indicator {
    position: absolute;
    top: 5px;
    right: 5px;
    width: 15px;
    height: 15px;
    background: var(--success-color);
    border-radius: 50%;
    border: 2px solid white;
    animation: statusBlink 2s ease-in-out infinite;
}

@keyframes statusBlink {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

.action-title {
    color: var(--text-primary);
    margin-bottom: 1rem;
    font-size: 1.1rem;
}

.action-description {
    color: var(--text-secondary);
    margin-bottom: 1.5rem;
    font-size: 0.9rem;
}

.action-btn {
    border: none;
    border-radius: 20px;
    padding: 0.5rem 1rem;
    font-weight: 600;
    text-decoration: none !important;
    transition: all 0.3s ease;
    display: inline-block;
    font-size: 0.85rem;
    cursor: pointer !important;
    pointer-events: all !important;
    position: relative;
    z-index: 10;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    -webkit-tap-highlight-color: rgba(0,0,0,0.1);
}

.directions-btn { 
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    color: white;
}
.whatsapp-btn { 
    background: linear-gradient(135deg, #25D366, #128C7E);
    color: white;
}
.email-btn { 
    background: linear-gradient(135deg, #A0522D, #CD853F);
    color: white;
}
.phone-btn { 
    background: linear-gradient(135deg, #B22222, #CD5C5C);
    color: white;
}

.action-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    color: white;
}

.stat-text {
    color: var(--text-muted);
    font-size: 0.8rem;
}

/* Feature Cards */
.feature-card {
    padding: 2.5rem;
    text-align: center;
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}

.feature-card:hover {
    transform: translateY(-15px);
}

.feature-bg-pattern {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle at center, rgba(139, 0, 0, 0.03) 0%, transparent 70%);
    animation: featurePattern 8s ease-in-out infinite alternate;
}

@keyframes featurePattern {
    0% { transform: scale(1) rotate(0deg); }
    100% { transform: scale(1.1) rotate(5deg); }
}

.feature-icon-container {
    position: relative;
    display: inline-block;
    margin-bottom: 2rem;
}

.feature-icon {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-primary);
    position: relative;
    z-index: 2;
    transition: all 0.4s ease;
    background: rgba(255, 255, 255, 0.9);
    border: 2px solid var(--border-color);
    box-shadow: 0 8px 32px var(--shadow-color);
}

/* Dark mode icon styles */
body.dark-theme .feature-icon {
    color: var(--text-primary);
    background: rgba(0, 0, 0, 0.3);
    border: 2px solid var(--border-color);
}

/* Specific icon background colors for better visibility */
.quality-icon { 
    background: linear-gradient(135deg, rgba(139, 0, 0, 0.1), rgba(220, 20, 60, 0.1)) !important;
    color: var(--primary-color) !important;
}

.shipping-icon { 
    background: linear-gradient(135deg, rgba(178, 34, 34, 0.1), rgba(205, 92, 92, 0.1)) !important;
    color: #B22222 !important;
}

.support-icon { 
    background: linear-gradient(135deg, rgba(160, 82, 45, 0.1), rgba(205, 133, 63, 0.1)) !important;
    color: #A0522D !important;
}

/* Dark mode specific icon colors */
body.dark-theme .quality-icon { 
    background: linear-gradient(135deg, rgba(139, 0, 0, 0.3), rgba(220, 20, 60, 0.3)) !important;
    color: var(--primary-light) !important;
}

body.dark-theme .shipping-icon { 
    background: linear-gradient(135deg, rgba(178, 34, 34, 0.3), rgba(205, 92, 92, 0.3)) !important;
    color: #CD5C5C !important;
}

body.dark-theme .support-icon { 
    background: linear-gradient(135deg, rgba(160, 82, 45, 0.3), rgba(205, 133, 63, 0.3)) !important;
    color: #CD853F !important;
}

/* Feature icon hover effects */
.feature-icon:hover {
    transform: scale(1.1) rotate(5deg);
    box-shadow: 0 15px 40px var(--shadow-dark);
}

.quality-icon:hover { 
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light)) !important;
    color: white !important;
}

.shipping-icon:hover { 
    background: linear-gradient(135deg, #B22222, #CD5C5C) !important;
    color: white !important;
}

.support-icon:hover { 
    background: linear-gradient(135deg, #A0522D, #CD853F) !important;
    color: white !important;
}

.feature-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 140px;
    height: 140px;
    border-radius: 50%;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.quality-glow { background: var(--primary-color); }
.shipping-glow { background: #B22222; }
.support-glow { background: #A0522D; }

.feature-card:hover .feature-glow {
    opacity: 0.2;
    animation: featureGlow 2s ease-in-out infinite;
}

@keyframes featureGlow {
    0%, 100% { transform: translate(-50%, -50%) scale(1); }
    50% { transform: translate(-50%, -50%) scale(1.1); }
}

.feature-particles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
}

.feature-particles .particle {
    position: absolute;
    width: 6px;
    height: 6px;
    background: var(--primary-color);
    border-radius: 50%;
    opacity: 0;
    animation: featureParticles 3s ease-in-out infinite;
}

.feature-particles .particle:nth-child(1) { top: 20%; left: 20%; animation-delay: 0s; }
.feature-particles .particle:nth-child(2) { top: 20%; right: 20%; animation-delay: 1s; }
.feature-particles .particle:nth-child(3) { bottom: 20%; left: 50%; animation-delay: 2s; }

@keyframes featureParticles {
    0%, 100% { opacity: 0; transform: translateY(0px); }
    50% { opacity: 1; transform: translateY(-10px); }
}

.feature-card:hover .feature-particles .particle {
    animation-play-state: running;
}

.feature-title {
    color: var(--text-primary);
    margin-bottom: 1.5rem;
    font-weight: 600;
    font-size: 1.2rem;
}

.feature-description {
    color: var(--text-secondary);
    line-height: 1.6;
    margin-bottom: 1.5rem;
    font-size: 0.9rem;
}

.feature-badge {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    color: white;
    border: none;
    font-size: 0.75rem;
    padding: 0.4rem 0.8rem;
    margin: 0.2rem;
}

.metric {
    display: inline-block;
    text-align: center;
}

.metric-number {
    display: block;
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-color);
}

.metric-label {
    font-size: 0.8rem;
    color: var(--text-secondary);
}

/* Mini Feature Cards */
.mini-feature-card {
    padding: 1.5rem;
}

.mini-feature-icon {
    width: 50px;
    height: 50px;
    background: rgba(139, 0, 0, 0.1);
    border: 2px solid var(--primary-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-color);
    font-size: 1.2rem;
    transition: all 0.3s ease;
}

/* Dark mode mini feature icon */
body.dark-theme .mini-feature-icon {
    background: rgba(139, 0, 0, 0.3);
    border: 2px solid var(--primary-light);
    color: var(--primary-light);
}

.mini-feature-icon:hover {
    transform: scale(1.1);
    background: var(--primary-color);
    color: white;
}

body.dark-theme .mini-feature-icon:hover {
    background: var(--primary-light);
    color: var(--text-primary);
}

.mini-feature-title {
    color: var(--text-primary);
    margin-bottom: 0.5rem;
}

.mini-feature-text {
    color: var(--text-secondary);
    font-size: 0.9rem;
}

/* Contact Persons Section */
.contact-persons-section {
    color: var(--text-primary);
}

.person-card {
    padding: 2rem;
    text-align: center;
    transition: all 0.3s ease;
}

.person-card:hover {
    transform: translateY(-5px);
}

.person-avatar {
    width: 80px;
    height: 80px;
    margin: 0 auto;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

.avatar-icon {
    color: white;
    font-size: 2rem;
}

.person-name {
    color: var(--text-primary);
    font-size: 1.1rem;
}

.person-role {
    color: var(--text-secondary);
    font-size: 0.85rem;
}

.btn-whatsapp {
    background: linear-gradient(135deg, #25D366, #128C7E);
    color: white;
    border: none;
    border-radius: 20px;
    padding: 0.5rem 0.75rem;
    font-weight: 600;
    transition: all 0.3s ease;
    font-size: 0.85rem;
}

.btn-whatsapp:hover {
    background: linear-gradient(135deg, #128C7E, #25D366);
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(37, 211, 102, 0.3);
    color: white;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .hero-title {
        font-size: 2.2rem;
    }
    
    .section-title {
        font-size: 1.8rem;
    }
    
    .hero-icon-container {
        width: 220px;
        height: 220px;
    }
    
    .hero-icon-bg {
        width: 180px;
        height: 180px;
    }
    
    .hero-main-icon {
        font-size: 5rem;
    }
}

@media (max-width: 992px) {
    .hero-section {
        min-height: 60vh;
        text-align: center;
    }
    
    .hero-title {
        font-size: 2rem;
    }
    
    .section-title {
        font-size: 1.6rem;
    }
    
    .section-subtitle {
        font-size: 0.95rem;
    }
    
    .hero-icon-container {
        width: 200px;
        height: 200px;
    }
    
    .hero-icon-bg {
        width: 150px;
        height: 150px;
    }
    
    .hero-main-icon {
        font-size: 4rem;
    }
    
    .hero-stats {
        margin-top: 1.5rem;
        justify-content: center;
    }
    
    .stat-number {
        font-size: 1.2rem;
    }
    
    .stat-label {
        font-size: 0.7rem;
    }
    
    .company-info-card {
        padding: 2rem;
    }
    
    .contact-form-card {
        padding: 1.5rem;
        margin-top: 2rem;
    }
    
    .action-card,
    .feature-card {
        margin-bottom: 2rem;
    }
    
    .action-card:hover,
    .feature-card:hover {
        transform: translateY(-5px) scale(1.01);
    }
}

@media (max-width: 768px) {
    .hero-section {
        min-height: 50vh;
        background-attachment: scroll; /* Disable fixed attachment on tablet for better performance */
    }
    
    .hero-section::before {
        filter: blur(1px); /* Reduce blur on mobile for better performance */
        background-attachment: scroll;
    }
    }
    
    .hero-section::before {
        filter: blur(2.5px); /* Slightly reduce blur on tablet */
    }
    
    .hero-title {
        font-size: 1.8rem;
    }
    
    .hero-description {
        font-size: 0.9rem;
    }
    
    .section-title {
        font-size: 1.5rem;
    }
    
    .section-subtitle {
        font-size: 0.9rem;
    }
    
    .map-section {
        height: 40vh !important;
    }
    
    .contact-info-item {
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }
    
    .action-card,
    .feature-card {
        padding: 1.5rem;
    }
    
    .form-title {
        font-size: 1.1rem;
    }
    
    .action-title {
        font-size: 1rem;
    }
    
    .feature-title {
        font-size: 1.1rem;
    }
    
    .company-name {
        font-size: 1.3rem;
    }
    
    .person-name {
        font-size: 1rem;
    }
    
    .action-icon,
    .feature-icon {
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
    }
    
    .hero-btn-primary,
    .hero-btn-secondary {
        padding: 0.5rem 1rem;
        font-size: 0.8rem;
    }
    
    .btn-whatsapp {
        padding: 0.4rem 0.6rem;
        font-size: 0.8rem;
    }
}

@media (max-width: 576px) {
    .hero-section {
        min-height: 45vh;
        padding: 2rem 0;
        background-attachment: scroll; /* Disable fixed attachment on mobile for performance */
        background-image: url('{{ asset("img/kontak/110.png") }}');
        background-size: cover;
        background-position: center center;
    }
    
    .hero-section::before {
        filter: blur(1px); /* Reduce blur on mobile for performance */
        background-image: url('{{ asset("img/kontak/110.png") }}');
        background-size: cover;
        background-position: center center;
        background-attachment: scroll;
    }
    
    .hero-title {
        font-size: 1.6rem;
        margin-bottom: 0.75rem;
    }
    
    .hero-description {
        font-size: 0.85rem;
        margin-bottom: 1rem;
    }
    
    .section-title {
        font-size: 1.3rem;
        margin-bottom: 0.75rem;
    }
    
    .section-subtitle {
        font-size: 0.85rem;
        margin-bottom: 1.5rem;
    }
    
    .hero-actions {
        flex-direction: column;
        align-items: center;
        gap: 0.75rem;
    }
    
    .hero-btn-primary,
    .hero-btn-secondary {
        width: 100%;
        max-width: 220px;
        font-size: 0.75rem;
        padding: 0.5rem 0.75rem;
    }
    
    .hero-stats {
        flex-direction: column;
        gap: 0.75rem;
        margin-top: 1rem;
    }
    
    .stat-item {
        margin-bottom: 0.5rem;
    }
    
    .stat-number {
        font-size: 1rem;
    }
    
    .stat-label {
        font-size: 0.65rem;
    }
    
    .map-section {
        height: 35vh !important;
    }
    
    .map-controls {
        margin: 0.75rem;
    }
    
    .map-control-btn {
        width: 35px;
        height: 35px;
        font-size: 0.8rem;
    }
    
    .map-info-card {
        margin: 0.75rem;
    }
    
    .map-info-card .glass-card {
        padding: 1rem;
    }
    
    .map-title {
        font-size: 0.9rem;
    }
    
    .map-address {
        font-size: 0.75rem;
    }
    
    .contact-info-item {
        padding: 1.25rem;
        margin-bottom: 1rem;
    }
    
    .info-icon {
        width: 45px;
        height: 45px;
        font-size: 1.1rem;
        margin-bottom: 1rem;
    }
    
    .info-title {
        font-size: 1rem;
        margin-bottom: 1rem;
    }
    
    .address-line {
        font-size: 0.8rem;
    }
    
    .company-info-card {
        padding: 1.5rem;
    }
    
    .company-logo {
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
    }
    
    .company-name {
        font-size: 1.1rem;
    }
    
    .company-tagline {
        font-size: 0.8rem;
    }
    
    .contact-form-card {
        padding: 1.25rem;
    }
    
    .form-icon-container {
        width: 60px;
        height: 60px;
        margin-bottom: 1rem;
    }
    
    .form-icon {
        font-size: 1.5rem;
    }
    
    .form-title {
        font-size: 1rem;
        margin-bottom: 0.5rem;
    }
    
    .form-subtitle {
        font-size: 0.8rem;
    }
    
    .modern-input {
        padding: 0.75rem;
        font-size: 0.9rem;
    }
    
    .form-submit-btn {
        padding: 0.75rem 1.25rem;
        font-size: 0.8rem;
    }
    
    .action-card,
    .feature-card {
        padding: 1.25rem;
        margin-bottom: 1rem;
    }
    
    .action-icon,
    .feature-icon {
        width: 50px;
        height: 50px;
        font-size: 1.2rem;
        margin-bottom: 1rem;
    }
    
    .action-title {
        font-size: 0.95rem;
        margin-bottom: 0.75rem;
    }
    
    .action-description {
        font-size: 0.8rem;
        margin-bottom: 1rem;
    }
    
    .feature-title {
        font-size: 1rem;
        margin-bottom: 1rem;
    }
    
    .feature-description {
        font-size: 0.8rem;
        margin-bottom: 1rem;
    }
    
    .action-btn {
        padding: 0.4rem 0.8rem;
        font-size: 0.75rem;
        border-radius: 15px;
    }
    
    .person-card {
        padding: 1.25rem;
        margin-bottom: 1rem;
    }
    
    .person-avatar {
        width: 60px;
        height: 60px;
        margin-bottom: 1rem;
    }
    
    .avatar-icon {
        font-size: 1.5rem;
    }
    
    .person-name {
        font-size: 0.95rem;
        margin-bottom: 0.25rem;
    }
    
    .person-role {
        font-size: 0.75rem;
        margin-bottom: 1rem;
    }
    
    .btn-whatsapp {
        padding: 0.4rem 0.6rem;
        font-size: 0.75rem;
    }
    
    .copy-btn {
        padding: 0.3rem 0.6rem;
        font-size: 0.7rem;
    }
    
    .mini-feature-card {
        padding: 1rem;
    }
    
    .mini-feature-icon {
        width: 40px;
        height: 40px;
        font-size: 1rem;
    }
    
    .mini-feature-title {
        font-size: 0.9rem;
    }
    
    .mini-feature-text {
        font-size: 0.8rem;
    }
    
    .breadcrumb {
        font-size: 0.8rem;
        padding: 0.5rem 0.75rem;
    }
    
    .map-breadcrumb {
        margin: 0.75rem;
    }
}

@media (max-width: 480px) {
    .hero-section {
        min-height: 40vh;
        padding: 1.5rem 0;
    }
    
    .hero-title {
        font-size: 1.4rem;
    }
    
    .hero-description {
        font-size: 0.8rem;
    }
    
    .section-title {
        font-size: 1.2rem;
    }
    
    .section-subtitle {
        font-size: 0.8rem;
    }
    
    .hero-btn-primary,
    .hero-btn-secondary {
        max-width: 200px;
        font-size: 0.7rem;
        padding: 0.45rem 0.6rem;
        cursor: pointer;
        pointer-events: all;
        touch-action: manipulation;
        -webkit-tap-highlight-color: transparent;
    }
    
    .map-section {
        height: 30vh !important;
    }
    
    .contact-info-item,
    .action-card,
    .feature-card,
    .person-card {
        padding: 1rem;
    }
    
    .company-info-card,
    .contact-form-card {
        padding: 1rem;
    }
    
    .action-icon,
    .feature-icon {
        width: 45px;
        height: 45px;
        font-size: 1.1rem;
    }
    
    .person-avatar {
        width: 50px;
        height: 50px;
    }
    
    .avatar-icon {
        font-size: 1.3rem;
    }
}

@media (max-width: 360px) {
    .hero-title {
        font-size: 1.2rem;
    }
    
    .section-title {
        font-size: 1.1rem;
    }
    
    .hero-btn-primary,
    .hero-btn-secondary {
        max-width: 180px;
        font-size: 0.65rem;
    }
    
    .map-section {
        height: 25vh !important;
    }
    
    .contact-info-item,
    .action-card,
    .feature-card,
    .person-card,
    .company-info-card,
    .contact-form-card {
        padding: 0.75rem;
    }
}

/* Additional responsive improvements */
@media (max-width: 992px) {
    .section-header {
        margin-bottom: 3rem;
    }
    
    .contact-grid {
        gap: 1.5rem;
    }
}

@media (max-width: 768px) {
    .section-header {
        margin-bottom: 2.5rem;
    }
    
    .hero-content {
        text-align: center;
    }
    
    .hero-visual {
        margin-top: 2rem;
    }
    
    .contact-grid {
        gap: 1rem;
    }
    
    .method-link {
        font-size: 0.9rem;
    }
    
    .hours-row {
        padding: 0.5rem 0;
    }
    
    .day,
    .time {
        font-size: 0.9rem;
    }
}

@media (max-width: 576px) {
    .section-header {
        margin-bottom: 2rem;
    }
    
    .hero-visual {
        margin-top: 1.5rem;
    }
    
    .hero-icon-container {
        width: 150px;
        height: 150px;
    }
    
    .hero-icon-bg {
        width: 120px;
        height: 120px;
    }
    
    .hero-main-icon {
        font-size: 3rem;
    }
    
    .contact-grid {
        gap: 0.75rem;
    }
    
    .method-link {
        font-size: 0.85rem;
    }
    
    .coordinate-value {
        font-size: 0.8rem;
    }
    
    .status-badge {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
    }
    
    .rating-text {
        font-size: 0.75rem;
    }
}

@media (max-width: 480px) {
    .hero-icon-container {
        width: 120px;
        height: 120px;
    }
    
    .hero-icon-bg {
        width: 100px;
        height: 100px;
    }
    
    .hero-main-icon {
        font-size: 2.5rem;
    }
    
    .section-divider {
        width: 60px;
        height: 3px;
    }
}

/* Improve button touch targets on mobile */
@media (hover: none) and (pointer: coarse) {
    .hero-btn-primary,
    .hero-btn-secondary,
    .btn-whatsapp,
    .action-btn,
    .form-submit-btn {
        min-height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .map-control-btn {
        min-width: 44px;
        min-height: 44px;
    }
}

/* Smooth Animations */
.fade-in {
    animation: fadeIn 1s ease-out;
}

@keyframes fadeIn {
    0% { opacity: 0; transform: translateY(30px); }
    100% { opacity: 1; transform: translateY(0); }
}

/* Improved typography scaling */
@media (max-width: 1400px) {
    html {
        font-size: 15px;
    }
}

@media (max-width: 1200px) {
    html {
        font-size: 14px;
    }
}

@media (max-width: 768px) {
    html {
        font-size: 13px;
    }
}

@media (max-width: 576px) {
    html {
        font-size: 12px;
    }
}

@media (max-width: 360px) {
    html {
        font-size: 11px;
    }
}

/* Loading States */
.btn-loading {
    display: flex !important;
    align-items: center;
    justify-content: center;
}

/* Utility Classes */
.text-primary-theme { color: var(--primary-color) !important; }
.bg-primary-theme { background-color: var(--primary-color) !important; }
.border-primary-theme { border-color: var(--primary-color) !important; }

/* Scrollbar Styling */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: var(--bg-secondary);
}

::-webkit-scrollbar-thumb {
    background: var(--primary-color);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: var(--primary-light);
}

/* Notification Styles */
.notification {
    position: fixed;
    top: 20px;
    right: 20px;
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: 12px;
    padding: 1rem 1.5rem;
    backdrop-filter: blur(15px);
    box-shadow: 0 8px 32px var(--shadow-color);
    z-index: 9999;
    transform: translateX(400px);
    opacity: 0;
    transition: all 0.3s ease;
}

.notification.show {
    transform: translateX(0);
    opacity: 1;
}

.notification.success {
    border-left: 4px solid var(--success-color);
}

.notification.error {
    border-left: 4px solid #dc3545;
}
</style>

<script>
// Theme Management System
class ThemeManager {
    constructor() {
        this.theme = localStorage.getItem('theme') || 'light';
        this.init();
    }
    
    init() {
        this.applyTheme(this.theme);
        this.updateThemeIcon();
    }
    
    toggle() {
        this.theme = this.theme === 'light' ? 'dark' : 'light';
        this.applyTheme(this.theme);
        this.updateThemeIcon();
        localStorage.setItem('theme', this.theme);
        this.showNotification(`Switched to ${this.theme} mode`, 'success');
    }
    
    applyTheme(theme) {
        const body = document.body;
        
        if (theme === 'dark') {
            body.classList.add('dark-theme');
            body.classList.remove('light-theme');
        } else {
            body.classList.add('light-theme');
            body.classList.remove('dark-theme');
        }
        
        // Update meta theme-color for mobile browsers
        const metaThemeColor = document.querySelector('meta[name="theme-color"]');
        if (metaThemeColor) {
            metaThemeColor.setAttribute('content', theme === 'dark' ? '#1a1a1a' : '#ffffff');
        }
    }
    
    updateThemeIcon() {
        const icon = document.querySelector('.theme-icon');
        if (icon) {
            icon.className = `theme-icon fas fa-${this.theme === 'light' ? 'moon' : 'sun'}`;
        }
    }
    
    showNotification(message, type = 'success') {
        const notification = document.createElement('div');
        notification.className = `notification ${type}`;
        notification.innerHTML = `
            <div class="d-flex align-items-center">
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} me-2"></i>
                <span>${message}</span>
            </div>
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => notification.classList.add('show'), 100);
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => document.body.removeChild(notification), 300);
        }, 3000);
    }
}

// Utility Functions
function copyToClipboard(text, successMessage) {
    navigator.clipboard.writeText(text).then(() => {
        themeManager.showNotification(successMessage, 'success');
    }).catch(() => {
        themeManager.showNotification('Gagal menyalin ke clipboard', 'error');
    });
}

function copyAddress() {
    const address = "JL. RAYA TARUMAJAYA NO. 11, RT 001 RW 029 DUSUN III, DESA SETIA ASIH, KEC. TARUMAJAYA, KAB. BEKASI 17215";
    copyToClipboard(address, 'Alamat berhasil disalin!');
}

function copyCoordinates() {
    const coordinates = "-6.165231597737094, 106.99002232946049";
    copyToClipboard(coordinates, 'Koordinat berhasil disalin!');
}

function openMapsApp() {
    const url = "https://maps.google.com/?q=-6.165231597737094,106.99002232946049";
    window.open(url, '_blank');
}

function getDirections() {
    const url = "https://maps.google.com/maps/dir/?api=1&destination=-6.165231597737094,106.99002232946049";
    window.open(url, '_blank');
}

function toggleTheme() {
    themeManager.toggle();
}

// Form Handling
class ContactFormManager {
    constructor() {
        this.form = document.getElementById('contactForm');
        this.submitBtn = this.form?.querySelector('button[type="submit"]');
        this.init();
    }
    
    init() {
        if (this.form) {
            this.form.addEventListener('submit', this.handleSubmit.bind(this));
            this.setupInputAnimations();
        }
    }
    
    setupInputAnimations() {
        const inputs = this.form.querySelectorAll('.modern-input');
        inputs.forEach(input => {
            input.addEventListener('focus', this.animateInput.bind(this));
            input.addEventListener('blur', this.animateInput.bind(this));
        });
    }
    
    animateInput(event) {
        const input = event.target;
        const underline = input.parentNode.querySelector('.input-underline');
        
        if (event.type === 'focus' && underline) {
            underline.style.width = '100%';
        } else if (event.type === 'blur' && underline) {
            underline.style.width = '0%';
        }
    }
    
    async handleSubmit(event) {
        event.preventDefault();
        
        if (!this.validateForm()) return;
        
        this.showLoading(true);
        
        try {
            // Simulate form submission
            await this.simulateSubmission();
            this.showSuccess();
            this.resetForm();
        } catch (error) {
            this.showError();
        } finally {
            this.showLoading(false);
        }
    }
    
    validateForm() {
        const requiredFields = this.form.querySelectorAll('[required]');
        let isValid = true;
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                this.showFieldError(field);
                isValid = false;
            } else {
                this.clearFieldError(field);
            }
        });
        
        // Email validation
        const emailField = this.form.querySelector('#email');
        if (emailField.value && !this.isValidEmail(emailField.value)) {
            this.showFieldError(emailField, 'Format email tidak valid');
            isValid = false;
        }
        
        return isValid;
    }
    
    isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    
    showFieldError(field, message = 'Field ini wajib diisi') {
        field.style.borderColor = '#dc3545';
        
        // Remove existing error message
        const existingError = field.parentNode.querySelector('.field-error');
        if (existingError) existingError.remove();
        
        // Add error message
        const errorDiv = document.createElement('div');
        errorDiv.className = 'field-error text-danger small mt-1';
        errorDiv.textContent = message;
        field.parentNode.appendChild(errorDiv);
    }
    
    clearFieldError(field) {
        field.style.borderColor = '';
        const errorDiv = field.parentNode.querySelector('.field-error');
        if (errorDiv) errorDiv.remove();
    }
    
    showLoading(show) {
        const btnContent = this.submitBtn.querySelector('.btn-content');
        const btnLoading = this.submitBtn.querySelector('.btn-loading');
        
        if (show) {
            btnContent.classList.add('d-none');
            btnLoading.classList.remove('d-none');
            this.submitBtn.disabled = true;
        } else {
            btnContent.classList.remove('d-none');
            btnLoading.classList.add('d-none');
            this.submitBtn.disabled = false;
        }
    }
    
    async simulateSubmission() {
        return new Promise(resolve => setTimeout(resolve, 2000));
    }
    
    showSuccess() {
        themeManager.showNotification('Pesan berhasil dikirim! Kami akan segera merespons.', 'success');
    }
    
    showError() {
        themeManager.showNotification('Gagal mengirim pesan. Silakan coba lagi.', 'error');
    }
    
    resetForm() {
        this.form.reset();
        
        // Clear all field errors
        const errorDivs = this.form.querySelectorAll('.field-error');
        errorDivs.forEach(div => div.remove());
        
        // Reset field styles
        const inputs = this.form.querySelectorAll('.modern-input');
        inputs.forEach(input => {
            input.style.borderColor = '';
        });
    }
}

// Intersection Observer for Animations
class AnimationManager {
    constructor() {
        this.init();
    }
    
    init() {
        if ('IntersectionObserver' in window) {
            this.observer = new IntersectionObserver(
                this.handleIntersection.bind(this),
                { threshold: 0.1, rootMargin: '50px' }
            );
            
            this.observeElements();
        }
    }
    
    observeElements() {
        const elements = document.querySelectorAll(`
            .glass-card,
            .contact-info-item,
            .action-card,
            .feature-card,
            .mini-feature-card
        `);
        
        elements.forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            this.observer.observe(el);
        });
    }
    
    handleIntersection(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.transition = 'all 0.6s ease';
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                this.observer.unobserve(entry.target);
            }
        });
    }
}

// Performance Optimization
class PerformanceManager {
    constructor() {
        this.init();
    }
    
    init() {
        // Lazy load non-critical animations
        this.deferAnimations();
        
        // Preload critical resources
        this.preloadResources();
        
        // Optimize scroll performance
        this.optimizeScroll();
    }
    
    deferAnimations() {
        // Defer particle animations until hover
        const featureCards = document.querySelectorAll('.feature-card');
        featureCards.forEach(card => {
            const particles = card.querySelector('.feature-particles');
            if (particles) {
                particles.style.display = 'none';
                
                card.addEventListener('mouseenter', () => {
                    particles.style.display = 'block';
                }, { once: true });
            }
        });
    }
    
    preloadResources() {
        // Preload important images and fonts
        const link = document.createElement('link');
        link.rel = 'preload';
        link.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css';
        link.as = 'style';
        document.head.appendChild(link);
    }
    
    optimizeScroll() {
        let ticking = false;
        
        window.addEventListener('scroll', () => {
            if (!ticking) {
                requestAnimationFrame(() => {
                    this.handleScroll();
                    ticking = false;
                });
                ticking = true;
            }
        });
    }
    
    handleScroll() {
        const scrolled = window.pageYOffset;
        const parallaxElements = document.querySelectorAll('.hero-bg-pattern');
        
        parallaxElements.forEach(element => {
            const speed = 0.5;
            element.style.transform = `translateY(${scrolled * speed}px)`;
        });
    }
}

// Button Click Functions
function scrollToContact(event) {
    try {
        event.preventDefault();
        event.stopPropagation();
        
        const contactSection = document.getElementById('contact-info');
        if (contactSection) {
            // Smooth scroll to section
            contactSection.scrollIntoView({
                behavior: 'smooth',
                block: 'start',
                inline: 'nearest'
            });
            
            // Add visual feedback
            const button = event.currentTarget;
            if (button) {
                button.classList.add('button-clicked');
                button.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    button.style.transform = '';
                    button.classList.remove('button-clicked');
                }, 200);
            }
            
            // Show feedback notification
            showNotification('Menuju ke informasi kontak...', 'info');
        } else {
            console.warn('Contact section not found');
            showNotification('Bagian kontak tidak ditemukan', 'warning');
        }
    } catch (error) {
        console.error('Error in scrollToContact:', error);
        showNotification('Terjadi kesalahan saat menuju kontak', 'error');
    }
    return false;
}

function trackWhatsAppClick(event) {
    try {
        // Add analytics tracking if needed
        console.log('WhatsApp button clicked');
        
        // Add visual feedback
        if (event && event.currentTarget) {
            const button = event.currentTarget;
            button.classList.add('button-clicked');
            button.style.transform = 'scale(0.95)';
            setTimeout(() => {
                button.style.transform = '';
                button.classList.remove('button-clicked');
            }, 200);
        }
        
        // Show feedback notification
        showNotification('Membuka WhatsApp...', 'success');
        
        // Let the default action proceed (opening WhatsApp link)
        return true;
    } catch (error) {
        console.error('Error in trackWhatsAppClick:', error);
        // Still allow the link to work
        return true;
    }
}

// Theme toggle function
function toggleTheme() {
    const body = document.body;
    const themeIcon = document.querySelector('.theme-icon');
    
    if (body.classList.contains('dark-theme')) {
        // Switch to light mode
        body.classList.remove('dark-theme');
        body.classList.add('light-theme');
        if (themeIcon) {
            themeIcon.className = 'fas fa-moon theme-icon me-2';
        }
        localStorage.setItem('theme', 'light');
    } else {
        // Switch to dark mode
        body.classList.remove('light-theme');
        body.classList.add('dark-theme');
        if (themeIcon) {
            themeIcon.className = 'fas fa-sun theme-icon me-2';
        }
        localStorage.setItem('theme', 'dark');
    }
    
    // Update meta theme-color for mobile browsers
    const metaThemeColor = document.querySelector('meta[name="theme-color"]');
    if (metaThemeColor) {
        metaThemeColor.setAttribute('content', 
            body.classList.contains('dark-theme') ? '#1a1a1a' : '#ffffff'
        );
    }
}

// Initialize theme on page load
document.addEventListener('DOMContentLoaded', function() {
    const savedTheme = localStorage.getItem('theme') || 'light';
    const body = document.body;
    const themeIcon = document.querySelector('.theme-icon');
    
    if (savedTheme === 'dark') {
        body.classList.add('dark-theme');
        body.classList.remove('light-theme');
        if (themeIcon) {
            themeIcon.className = 'fas fa-sun theme-icon me-2';
        }
    } else {
        body.classList.add('light-theme');
        body.classList.remove('dark-theme');
        if (themeIcon) {
            themeIcon.className = 'fas fa-moon theme-icon me-2';
        }
    }
});

// Map interaction functions
function openMapsApp() {
    const url = "https://maps.google.com/?q=-6.165231597737094,106.99002232946049";
    window.open(url, '_blank');
}

function copyCoordinates() {
    const coords = "-6.165231597737094, 106.99002232946049";
    navigator.clipboard.writeText(coords).then(() => {
        // Show success message
        showNotification('Koordinat berhasil disalin!', 'success');
    });
}

function copyAddress() {
    const address = "JL. RAYA TARUMAJAYA NO. 11, RT 001 RW 029 DUSUN III, DESA SETIA ASIH, KEC. TARUMAJAYA, KAB. BEKASI 17215";
    navigator.clipboard.writeText(address).then(() => {
        showNotification('Alamat berhasil disalin!', 'success');
    });
}

function getDirections() {
    const url = "https://www.google.com/maps/dir/?api=1&destination=-6.165231597737094,106.99002232946049";
    window.open(url, '_blank');
}

function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `alert alert-${type} position-fixed`;
    notification.style.cssText = `
        top: 20px;
        right: 20px;
        z-index: 9999;
        min-width: 250px;
        animation: slideInRight 0.3s ease;
    `;
    notification.innerHTML = `
        <i class="fas fa-check-circle me-2"></i>
        ${message}
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'slideOutRight 0.3s ease';
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

// Initialize all managers when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    console.log('Contact page loaded - initializing...');
    
    // Debug: Check if buttons exist
    const heroButtons = document.querySelectorAll('.hero-btn-primary, .hero-btn-secondary');
    const actionButtons = document.querySelectorAll('.action-btn');
    console.log(`Found ${heroButtons.length} hero buttons and ${actionButtons.length} action buttons`);
    
    // Initialize AOS Animation Library
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: false,
            mirror: true,
            offset: 100,
            delay: 0,
            anchorPlacement: 'top-bottom',
            disable: function() {
                return window.innerWidth < 768; // Disable on mobile for performance
            }
        });
        
        // Refresh AOS on page load
        setTimeout(() => {
            AOS.refresh();
        }, 100);
        
        // Handle page navigation
        window.addEventListener('beforeunload', () => {
            AOS.refresh();
        });
        
        window.addEventListener('pageshow', (event) => {
            if (event.persisted) {
                AOS.refresh();
            }
        });
    } else {
        console.warn('AOS library not loaded, using fallback animations');
        // Fallback animation system
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        
        document.querySelectorAll('[data-aos]').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    }
    
    // Additional CSS animations for notification
    if (!document.getElementById('notification-styles')) {
        const style = document.createElement('style');
        style.id = 'notification-styles';
        style.textContent = `
            @keyframes slideInRight {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            @keyframes slideOutRight {
                from { transform: translateX(0); opacity: 1; }
                to { transform: translateX(100%); opacity: 0; }
            }
        `;
        document.head.appendChild(style);
    }
    
    window.themeManager = new ThemeManager();
    window.contactFormManager = new ContactFormManager();
    window.animationManager = new AnimationManager();
    window.performanceManager = new PerformanceManager();
    
    // Add meta tag for mobile theme color if not exists
    if (!document.querySelector('meta[name="theme-color"]')) {
        const metaThemeColor = document.createElement('meta');
        metaThemeColor.name = 'theme-color';
        metaThemeColor.content = '#ffffff';
        document.head.appendChild(metaThemeColor);
    }
    
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
    
    // Enhanced button click handling
    document.querySelectorAll('.hero-btn-primary, .hero-btn-secondary, .action-btn').forEach(button => {
        // Remove any existing event listeners
        button.style.pointerEvents = 'all';
        button.style.cursor = 'pointer';
        button.style.zIndex = '100';
        
        // Add multiple event types for better compatibility
        ['click', 'touchend'].forEach(eventType => {
            button.addEventListener(eventType, function(e) {
                // Ensure the button is clickable
                if (e.type === 'touchend') {
                    e.preventDefault();
                }
                
                // Add visual feedback
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
                
                // For debugging
                console.log(`Button clicked: ${this.textContent.trim()}`);
            }, { passive: false });
        });
    });
    
    // Fix any overlay issues that might block clicks
    document.querySelectorAll('.hero-bg-pattern, .floating-shapes, .action-bg-pattern').forEach(overlay => {
        overlay.style.pointerEvents = 'none';
        overlay.style.zIndex = '1';
    });
    
    // Ensure all interactive elements are properly layered
    document.querySelectorAll('.hero-actions, .action-content').forEach(container => {
        container.style.position = 'relative';
        container.style.zIndex = '100';
    });
    
    // Add loading complete class
    document.body.classList.add('loaded');
});

// Handle window resize
window.addEventListener('resize', () => {
    // Recalculate animations on resize
    clearTimeout(window.resizeTimer);
    window.resizeTimer = setTimeout(() => {
        // Refresh AOS on resize
        if (typeof AOS !== 'undefined') {
            AOS.refresh();
        }
        
        if (window.animationManager) {
            window.animationManager.observeElements();
        }
    }, 250);
});

// Handle orientation change for mobile devices
window.addEventListener('orientationchange', () => {
    setTimeout(() => {
        if (typeof AOS !== 'undefined') {
            AOS.refresh();
        }
    }, 100);
});

// Add before unload handler for form
window.addEventListener('beforeunload', (event) => {
    const form = document.getElementById('contactForm');
    if (form) {
        const formData = new FormData(form);
        const hasData = Array.from(formData.values()).some(value => value.trim() !== '');
        
        if (hasData) {
            event.preventDefault();
            event.returnValue = '';
        }
    }
});
</script>
@endsection
