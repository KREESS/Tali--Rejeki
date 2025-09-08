@extends('components.layout')

@section('title', $title)

@section('content')
<!-- Interactive Map Section with Enhanced Design -->
<div class="map-section position-relative" style="height: 50vh;">
    <!-- Map Controls -->
    <div class="map-controls position-absolute top-0 start-0 m-4" style="z-index: 10;">
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
    <div class="map-info-card position-absolute bottom-0 start-0 m-4">
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
    <div class="map-breadcrumb position-absolute top-0 end-0 m-4">
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
                <div class="hero-content">
                    <div class="hero-badge mb-4">
                        <span class="badge hero-company-badge px-4 py-2 fs-6 fw-semibold">
                            <i class="fas fa-building me-2"></i>PT. Tali Rejeki
                        </span>
                    </div>
                    <h1 class="hero-title display-3 fw-bold mb-4 position-relative">
                        Hubungi Kami
                        <div class="title-underline position-absolute"></div>
                    </h1>
                    <p class="hero-description lead mb-5 lh-lg">
                        Temukan lokasi dan hubungi PT. Tali Rejeki untuk kebutuhan Anda. 
                        Kami siap melayani dengan sepenuh hati dan profesionalisme tinggi.
                    </p>
                    <div class="hero-actions d-flex flex-wrap gap-3">
                        <a href="#contact-info" class="btn hero-btn-primary btn-lg px-5 py-3">
                            <i class="fas fa-info-circle me-2"></i>Info Kontak
                            <span class="btn-shine position-absolute top-0 start-0 w-100 h-100"></span>
                        </a>
                        <a href="https://wa.me/6281382523722" target="_blank" class="btn hero-btn-secondary btn-lg px-5 py-3">
                            <i class="fab fa-whatsapp me-2"></i>Chat WhatsApp
                            <span class="btn-shine position-absolute top-0 start-0 w-100 h-100"></span>
                        </a>
                    </div>
                    
                    <!-- Floating Stats -->
                    <div class="hero-stats mt-5 d-flex flex-wrap gap-4">
                        <div class="stat-item">
                            <div class="stat-number fw-bold">Senin-Jumat</div>
                            <div class="stat-label small">08:00 - 17:00 WIB</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number fw-bold">14+</div>
                            <div class="stat-label small">Tahun Pengalaman</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number fw-bold">1000+</div>
                            <div class="stat-label small">Klien Puas</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-visual text-center position-relative">
                    <div class="hero-icon-container position-relative">
                        <div class="hero-icon-bg position-absolute top-50 start-50 translate-middle"></div>
                        <i class="hero-main-icon fas fa-map-marked-alt position-relative"></i>
                        <div class="icon-particles position-absolute top-0 start-0 w-100 h-100">
                            <div class="particle particle-1"></div>
                            <div class="particle particle-2"></div>
                            <div class="particle particle-3"></div>
                            <div class="particle particle-4"></div>
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
        <div class="section-header text-center mb-5">
            <h2 class="section-title fw-bold mb-3">Informasi Kontak</h2>
            <p class="section-subtitle">Berbagai cara untuk terhubung dengan kami</p>
            <div class="section-divider mx-auto"></div>
        </div>
        
        <div class="row g-4">
            <!-- Company Information Card -->
            <div class="col-lg-8">
                <div class="company-info-card glass-card h-100 p-5">
                    <!-- Company Header -->
                    <div class="company-header d-flex align-items-center mb-5">
                        <div class="company-logo-container me-4">
                            <div class="company-logo">
                                <i class="fas fa-building fa-2x"></i>
                            </div>
                            <div class="logo-glow"></div>
                        </div>
                        <div>
                            <h2 class="company-name mb-2">PT. TALI REJEKI</h2>
                            <p class="company-tagline mb-0">Your Trusted Business Partner Since 2011</p>
                            <div class="company-rating mt-2">
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
                            <div class="contact-info-item address-card h-100">
                                <div class="info-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="info-content">
                                    <h5 class="info-title mb-3">Alamat Lengkap</h5>
                                    <div class="address-details">
                                        <p class="address-line">JL. RAYA TARUMAJAYA NO. 11</p>
                                        <p class="address-line">RT 001 RW 029 DUSUN III</p>
                                        <p class="address-line">DESA SETIA ASIH</p>
                                        <p class="address-line">KEC. TARUMAJAYA</p>
                                        <p class="address-line fw-semibold">KAB. BEKASI 17215</p>
                                    </div>
                                    <button class="btn copy-btn mt-3" onclick="copyAddress()">
                                        <i class="fas fa-copy me-2"></i>Salin Alamat
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- GPS Coordinates -->
                        <div class="col-md-6">
                            <div class="contact-info-item coordinates-card h-100">
                                <div class="info-icon">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <div class="info-content">
                                    <h5 class="info-title mb-3">Koordinat GPS</h5>
                                    <div class="coordinates-details">
                                        <div class="coordinate-item mb-3">
                                            <label class="coordinate-label">Latitude:</label>
                                            <span class="coordinate-value" id="latitude">-6.165231597737094</span>
                                        </div>
                                        <div class="coordinate-item">
                                            <label class="coordinate-label">Longitude:</label>
                                            <span class="coordinate-value" id="longitude">106.99002232946049</span>
                                        </div>
                                    </div>
                                    <button class="btn copy-btn mt-3" onclick="copyCoordinates()">
                                        <i class="fas fa-copy me-2"></i>Salin Koordinat
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Contact Methods -->
                        <div class="col-md-6">
                            <div class="contact-info-item contact-methods-card h-100">
                                <div class="info-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="info-content">
                                    <h5 class="info-title mb-3">Hubungi Kami</h5>
                                    <div class="contact-methods">
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
                            <div class="contact-info-item hours-card h-100">
                                <div class="info-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="info-content">
                                    <h5 class="info-title mb-3">Jam Operasional</h5>
                                    <div class="operating-hours">
                                        <div class="hours-row">
                                            <span class="day">Senin - Jumat</span>
                                            <span class="time">08:00 - 17:00 WIB</span>
                                            <span class="status-indicator open"></span>
                                        </div>
                                        <div class="hours-row">
                                            <span class="day">Sabtu</span>
                                            <span class="time">Tutup</span>
                                            <span class="status-indicator closed"></span>
                                        </div>
                                        <div class="hours-row">
                                            <span class="day">Minggu</span>
                                            <span class="time">Tutup</span>
                                            <span class="status-indicator closed"></span>
                                        </div>
                                    </div>
                                    <div class="current-status mt-3">
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
                <div class="contact-form-card glass-card h-100 p-4">
                    <div class="form-header text-center mb-4">
                        <div class="form-icon-container mb-3">
                            <i class="fas fa-paper-plane form-icon"></i>
                        </div>
                        <h4 class="form-title mb-2">Kirim Pesan</h4>
                        <p class="form-subtitle">Kami akan merespon dalam 24 jam</p>
                    </div>
                    
                    <form class="contact-form" id="contactForm">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control modern-input" id="name" required placeholder="Nama Lengkap">
                            <label for="name">Nama Lengkap</label>
                            <div class="input-underline"></div>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control modern-input" id="email" required placeholder="Email">
                            <label for="email">Email</label>
                            <div class="input-underline"></div>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control modern-input" id="phone" placeholder="Nomor Telepon">
                            <label for="phone">Nomor Telepon</label>
                            <div class="input-underline"></div>
                        </div>
                        
                        <div class="form-floating mb-3">
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
                        
                        <div class="form-floating mb-4">
                            <textarea class="form-control modern-input" id="message" rows="4" required placeholder="Pesan Anda" style="height: 120px;"></textarea>
                            <label for="message">Pesan Anda</label>
                            <div class="input-underline"></div>
                        </div>
                        
                        <button type="submit" class="btn form-submit-btn w-100 py-3 fw-semibold">
                            <span class="btn-content">
                                <i class="fas fa-send me-2"></i>Kirim Pesan
                            </span>
                            <div class="btn-loading d-none">
                                <div class="spinner-border spinner-border-sm me-2"></div>
                                Mengirim...
                            </div>
                        </button>
                        
                        <div class="form-footer text-center mt-3">
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
        <div class="section-header text-center mb-5">
            <h2 class="section-title fw-bold mb-3">Cara Mudah Menghubungi Kami</h2>
            <p class="section-subtitle">Pilih cara yang paling nyaman untuk Anda</p>
            <div class="section-divider mx-auto"></div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="action-card glass-card h-100 text-center p-4 position-relative overflow-hidden">
                    <div class="action-bg-pattern"></div>
                    <div class="action-content position-relative">
                        <div class="action-icon-container mb-4">
                            <div class="action-icon directions-icon">
                                <i class="fas fa-directions fa-2x"></i>
                            </div>
                            <div class="icon-glow directions-glow"></div>
                        </div>
                        <h5 class="action-title fw-bold mb-3">Petunjuk Arah</h5>
                        <p class="action-description mb-4">Dapatkan rute tercepat menuju lokasi kami dengan Google Maps</p>
                        <a href="https://maps.google.com/?q=-6.165231597737094,106.99002232946049" 
                           target="_blank" class="btn action-btn directions-btn px-4 py-2">
                            <i class="fas fa-external-link-alt me-2"></i>Buka Maps
                        </a>
                        <div class="action-stats mt-3">
                            <small class="stat-text">
                                <i class="fas fa-clock me-1"></i>±45 menit dari Jakarta
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="action-card glass-card h-100 text-center p-4 position-relative overflow-hidden">
                    <div class="action-bg-pattern"></div>
                    <div class="action-content position-relative">
                        <div class="action-icon-container mb-4">
                            <div class="action-icon whatsapp-icon">
                                <i class="fab fa-whatsapp fa-2x"></i>
                            </div>
                            <div class="icon-glow whatsapp-glow"></div>

                        </div>
                        <h5 class="action-title fw-bold mb-3">WhatsApp</h5>
                        <p class="action-description mb-4">Chat langsung dengan tim marketing kami</p>
                        <a href="https://wa.me/6281382523722" target="_blank" class="btn action-btn whatsapp-btn px-4 py-2">
                            <i class="fab fa-whatsapp me-2"></i>Chat Siti
                        </a>
                        <div class="action-stats mt-3">
                            <small class="stat-text">
                                <i class="fas fa-user me-1"></i>Tim Marketing Tersedia
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="action-card glass-card h-100 text-center p-4 position-relative overflow-hidden">
                    <div class="action-bg-pattern"></div>
                    <div class="action-content position-relative">
                        <div class="action-icon-container mb-4">
                            <div class="action-icon email-icon">
                                <i class="fas fa-envelope fa-2x"></i>
                            </div>
                            <div class="icon-glow email-glow"></div>
                        </div>
                        <h5 class="action-title fw-bold mb-3">Email</h5>
                        <p class="action-description mb-4">Kirim email untuk pertanyaan detail dan penawaran khusus</p>
                        <a href="mailto:talirejeki@gmail.com" class="btn action-btn email-btn px-4 py-2">
                            <i class="fas fa-envelope me-2"></i>Kirim Email
                        </a>
                        <div class="action-stats mt-3">
                            <small class="stat-text">
                                <i class="fas fa-clock me-1"></i>Respon dalam 24 jam
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="action-card glass-card h-100 text-center p-4 position-relative overflow-hidden">
                    <div class="action-bg-pattern"></div>
                    <div class="action-content position-relative">
                        <div class="action-icon-container mb-4">
                            <div class="action-icon phone-icon">
                                <i class="fas fa-phone fa-2x"></i>
                            </div>
                            <div class="icon-glow phone-glow"></div>
                        </div>
                        <h5 class="action-title fw-bold mb-3">Telepon</h5>
                        <p class="action-description mb-4">Hubungi langsung untuk konsultasi dan informasi produk</p>
                        <a href="tel:+6202129470622" class="btn action-btn phone-btn px-4 py-2">
                            <i class="fas fa-phone me-2"></i>Telepon
                        </a>
                        <div class="action-stats mt-3">
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
        <div class="section-header text-center mb-5">
            <h2 class="section-title fw-bold mb-3">Tim Marketing Kami</h2>
            <p class="section-subtitle">Hubungi langsung tim marketing untuk kebutuhan Anda</p>
            <div class="section-divider mx-auto"></div>
        </div>
        
        <div class="row g-4 justify-content-center">
            <div class="col-lg-3 col-md-6">
                <div class="person-card glass-card text-center p-4 h-100">
                    <div class="person-avatar mb-3">
                        <div class="avatar-icon">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                    </div>
                    <h5 class="person-name fw-bold mb-2">Siti</h5>
                    <p class="person-role mb-3">Marketing Executive</p>
                    <a href="https://wa.me/6281382523722" target="_blank" class="btn btn-whatsapp w-100 mb-2">
                        <i class="fab fa-whatsapp me-2"></i>0813 8252 3722
                    </a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="person-card glass-card text-center p-4 h-100">
                    <div class="person-avatar mb-3">
                        <div class="avatar-icon">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                    </div>
                    <h5 class="person-name fw-bold mb-2">Kurnia</h5>
                    <p class="person-role mb-3">Marketing Specialist</p>
                    <a href="https://wa.me/6281384808218" target="_blank" class="btn btn-whatsapp w-100 mb-2">
                        <i class="fab fa-whatsapp me-2"></i>0813 8480 8218
                    </a>
                    <small class="text-muted">(WhatsApp Only)</small>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="person-card glass-card text-center p-4 h-100">
                    <div class="person-avatar mb-3">
                        <div class="avatar-icon">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                    </div>
                    <h5 class="person-name fw-bold mb-2">Sari</h5>
                    <p class="person-role mb-3">Marketing Consultant</p>
                    <a href="https://wa.me/6281316826959" target="_blank" class="btn btn-whatsapp w-100 mb-2">
                        <i class="fab fa-whatsapp me-2"></i>0813 1682 6959
                    </a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="person-card glass-card text-center p-4 h-100">
                    <div class="person-avatar mb-3">
                        <div class="avatar-icon">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                    </div>
                    <h5 class="person-name fw-bold mb-2">Edy Purwanto</h5>
                    <p class="person-role mb-3">Senior Marketing</p>
                    <a href="https://wa.me/6281514515990" target="_blank" class="btn btn-whatsapp w-100 mb-2">
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
        <div class="section-header text-center mb-5">
            <h2 class="section-title fw-bold mb-3">Mengapa Memilih PT. Tali Rejeki?</h2>
            <p class="section-subtitle">Komitmen kami untuk memberikan pelayanan terbaik</p>
            <div class="section-divider mx-auto"></div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="feature-card glass-card text-center p-5 h-100 position-relative">
                    <div class="feature-bg-pattern"></div>
                    <div class="feature-content position-relative">
                        <div class="feature-icon-container mb-4">
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
                        <h4 class="feature-title fw-bold mb-3">Kualitas Terjamin</h4>
                        <p class="feature-description mb-4">Produk berkualitas tinggi dengan standar internasional yang telah teruji dan bersertifikat</p>
                        <div class="feature-stats mb-3">
                            <div class="stat-badges d-flex justify-content-center gap-2 flex-wrap">
                                <span class="badge feature-badge">ISO 9001:2015</span>
                                <span class="badge feature-badge">SNI Certified</span>
                            </div>
                        </div>
                        <div class="feature-metrics">
                            <div class="metric">
                                <span class="metric-number">99.9%</span>
                                <span class="metric-label">Quality Rate</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-card glass-card text-center p-5 h-100 position-relative">
                    <div class="feature-bg-pattern"></div>
                    <div class="feature-content position-relative">
                        <div class="feature-icon-container mb-4">
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
                        <h4 class="feature-title fw-bold mb-3">Pengiriman Cepat</h4>
                        <p class="feature-description mb-4">Layanan pengiriman express ke seluruh Indonesia dengan jaminan keamanan dan ketepatan waktu</p>
                        <div class="feature-stats mb-3">
                            <div class="stat-badges d-flex justify-content-center gap-2 flex-wrap">
                                <span class="badge feature-badge">Same Day</span>
                                <span class="badge feature-badge">Nationwide</span>
                            </div>
                        </div>
                        <div class="feature-metrics">
                            <div class="metric">
                                <span class="metric-number">1-3</span>
                                <span class="metric-label">Hari Kerja</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-card glass-card text-center p-5 h-100 position-relative">
                    <div class="feature-bg-pattern"></div>
                    <div class="feature-content position-relative">
                        <div class="feature-icon-container mb-4">
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
                        <h4 class="feature-title fw-bold mb-3">Customer Service 24/7</h4>
                        <p class="feature-description mb-4">Tim customer service profesional siap membantu Anda dengan respon cepat dan solusi terbaik</p>
                        <div class="feature-stats mb-3">
                            <div class="stat-badges d-flex justify-content-center gap-2 flex-wrap">
                                <span class="badge feature-badge">24/7 Support</span>
                                <span class="badge feature-badge">Expert Team</span>
                            </div>
                        </div>
                        <div class="feature-metrics">
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
                <div class="mini-feature-card glass-card p-4 h-100">
                    <div class="d-flex align-items-center">
                        <div class="mini-feature-icon me-4">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div>
                            <h6 class="mini-feature-title fw-semibold mb-2">Garansi Produk</h6>
                            <p class="mini-feature-text mb-0">Jaminan garansi resmi untuk semua produk yang kami jual</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="mini-feature-card glass-card p-4 h-100">
                    <div class="d-flex align-items-center">
                        <div class="mini-feature-icon me-4">
                            <i class="fas fa-award"></i>
                        </div>
                        <div>
                            <h6 class="mini-feature-title fw-semibold mb-2">Trusted Partner</h6>
                            <p class="mini-feature-text mb-0">Dipercaya oleh 1000+ perusahaan di seluruh Indonesia</p>
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
    --text-secondary: #b3b3b3;
    --text-muted: #888888;
    
    --border-color: #404040;
    --shadow-color: rgba(0, 0, 0, 0.3);
    --shadow-dark: rgba(0, 0, 0, 0.5);
    
    --glass-bg: rgba(42, 42, 42, 0.95);
    --glass-border: rgba(255, 255, 255, 0.1);
    --glass-shadow: rgba(0, 0, 0, 0.3);
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
    min-height: 80vh;
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
    position: relative;
    overflow: hidden;
}

.hero-bg-pattern {
    background: 
        radial-gradient(circle at 20% 80%, rgba(255,255,255,0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(255,255,255,0.1) 0%, transparent 50%);
    animation: patternMove 10s ease-in-out infinite alternate;
}

@keyframes patternMove {
    0% { transform: translateX(0px) translateY(0px); }
    100% { transform: translateX(20px) translateY(-20px); }
}

.floating-shapes {
    pointer-events: none;
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
    min-height: 60vh;
}

.hero-company-badge {
    background: rgba(255, 255, 255, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: white;
    backdrop-filter: blur(10px);
    border-radius: 50px;
}

.hero-title {
    color: white;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    margin-bottom: 1.5rem;
}

.title-underline {
    bottom: -10px;
    left: 0;
    width: 100px;
    height: 4px;
    background: linear-gradient(90deg, white, rgba(255,255,255,0.5));
    border-radius: 2px;
    animation: underlineGrow 2s ease-out;
}

@keyframes underlineGrow {
    0% { width: 0; }
    100% { width: 100px; }
}

.hero-description {
    color: rgba(255, 255, 255, 0.9);
    line-height: 1.8;
}

/* Hero Buttons */
.hero-btn-primary, .hero-btn-secondary {
    position: relative;
    overflow: hidden;
    border: none;
    border-radius: 50px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
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
    background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.3) 50%, transparent 70%);
    transform: translateX(-100%);
    transition: transform 0.6s ease;
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
    margin-top: 3rem;
}

.stat-item {
    text-align: center;
    color: white;
}

.stat-number {
    font-size: 2rem;
    display: block;
    margin-bottom: 0.5rem;
}

.stat-label {
    opacity: 0.8;
    font-size: 0.875rem;
}

/* Hero Visual */
.hero-icon-container {
    width: 300px;
    height: 300px;
    margin: 0 auto;
}

.hero-icon-bg {
    width: 250px;
    height: 250px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    animation: pulse 3s ease-in-out infinite;
}

.hero-main-icon {
    font-size: 8rem;
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
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    margin: 0;
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.breadcrumb-link {
    color: var(--primary-color) !important;
    text-decoration: none;
    font-weight: 600;
}

.breadcrumb-item.active {
    color: #333333 !important;
    font-weight: 600;
}

/* Dark theme breadcrumb adjustments */
body.dark-theme .breadcrumb {
    background: rgba(42, 42, 42, 0.95);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

body.dark-theme .breadcrumb-item.active {
    color: #ffffff !important;
}

/* Section Styles */
.contact-section, .quick-actions-section, .features-section, .contact-persons-section {
    color: #333333;
}

/* Dark theme section adjustments */
body.dark-theme .contact-section, 
body.dark-theme .quick-actions-section, 
body.dark-theme .features-section,
body.dark-theme .contact-persons-section {
    color: #ffffff;
}

.section-header {
    margin-bottom: 4rem;
}

.section-title {
    color: #333333;
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

.section-subtitle {
    color: #666666;
    font-size: 1.1rem;
    margin-bottom: 2rem;
}

/* Dark theme section text */
body.dark-theme .section-title {
    color: #ffffff;
}

body.dark-theme .section-subtitle {
    color: #b3b3b3;
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
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.company-tagline {
    color: #666666;
    font-size: 1.1rem;
}

/* Dark theme company info */
body.dark-theme .company-tagline {
    color: #b3b3b3;
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
    color: #333333;
    margin-bottom: 1.5rem;
    font-weight: 600;
}

.address-line {
    color: #666666;
    margin-bottom: 0.5rem;
    line-height: 1.6;
}

.coordinate-label {
    color: #666666;
    font-weight: 500;
}

/* Dark theme info elements */
body.dark-theme .info-title {
    color: #ffffff;
}

body.dark-theme .address-line {
    color: #b3b3b3;
}

body.dark-theme .coordinate-label {
    color: #b3b3b3;
}

.coordinate-value {
    color: #333333;
    font-family: 'Courier New', monospace;
    font-weight: 600;
}

/* Dark theme coordinate value */
body.dark-theme .coordinate-value {
    color: #ffffff;
}

.copy-btn {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    color: white;
    border: none;
    border-radius: 25px;
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
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
    color: #333333;
    text-decoration: none;
    flex: 1;
    transition: color 0.3s ease;
}

.method-link:hover {
    color: var(--primary-color);
}

/* Dark theme method links */
body.dark-theme .method-link {
    color: #ffffff;
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
    color: #333333;
    font-weight: 500;
}

.time {
    color: #666666;
}

/* Dark theme operating hours */
body.dark-theme .day {
    color: #ffffff;
}

body.dark-theme .time {
    color: #b3b3b3;
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
    color: #333333;
    font-weight: 600;
}

.form-subtitle {
    color: #666666;
}

/* Dark theme form elements */
body.dark-theme .form-title {
    color: #ffffff;
}

body.dark-theme .form-subtitle {
    color: #b3b3b3;
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
    border-radius: 50px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
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
    color: #333333;
    margin-bottom: 1rem;
}

.action-description {
    color: #666666;
    margin-bottom: 1.5rem;
}

/* Dark theme action cards */
body.dark-theme .action-title {
    color: #ffffff;
}

body.dark-theme .action-description {
    color: #b3b3b3;
}

.action-btn {
    border: none;
    border-radius: 25px;
    padding: 0.75rem 1.5rem;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-block;
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
    color: white;
    position: relative;
    z-index: 2;
    transition: all 0.4s ease;
}

.quality-icon { background: linear-gradient(135deg, var(--primary-color), var(--primary-light)); }
.shipping-icon { background: linear-gradient(135deg, #B22222, #CD5C5C); }
.support-icon { background: linear-gradient(135deg, #A0522D, #CD853F); }

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
    color: #333333;
    margin-bottom: 1.5rem;
    font-weight: 600;
}

.feature-description {
    color: #666666;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

/* Dark theme feature cards */
body.dark-theme .feature-title {
    color: #ffffff;
}

body.dark-theme .feature-description {
    color: #b3b3b3;
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
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
}

.mini-feature-title {
    color: #333333;
    margin-bottom: 0.5rem;
}

.mini-feature-text {
    color: #666666;
    font-size: 0.9rem;
}

/* Dark theme mini features */
body.dark-theme .mini-feature-title {
    color: #ffffff;
}

body.dark-theme .mini-feature-text {
    color: #b3b3b3;
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
    color: #333333;
    font-size: 1.3rem;
}

.person-role {
    color: #666666;
    font-size: 0.9rem;
}

/* Dark theme person cards */
body.dark-theme .person-name {
    color: #ffffff;
}

body.dark-theme .person-role {
    color: #b3b3b3;
}

.btn-whatsapp {
    background: linear-gradient(135deg, #25D366, #128C7E);
    color: white;
    border: none;
    border-radius: 25px;
    padding: 0.75rem 1rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-whatsapp:hover {
    background: linear-gradient(135deg, #128C7E, #25D366);
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(37, 211, 102, 0.3);
    color: white;
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-section {
        min-height: 70vh;
        text-align: center;
    }
    
    .hero-title {
        font-size: 2.5rem;
    }
    
    .map-section {
        height: 40vh !important;
    }
    
    .contact-info-item,
    .action-card,
    .feature-card {
        margin-bottom: 2rem;
    }
    
    .action-card:hover,
    .feature-card:hover {
        transform: translateY(-5px) scale(1.01);
    }
    
    .theme-toggle-btn {
        width: 50px;
        height: 50px;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .hero-stats {
        flex-direction: column;
        gap: 1rem;
    }
    
    .stat-item {
        margin-bottom: 1rem;
    }
}

@media (max-width: 576px) {
    .hero-title {
        font-size: 2rem;
    }
    
    .hero-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .hero-btn-primary,
    .hero-btn-secondary {
        width: 100%;
        max-width: 300px;
    }
    
    .contact-info-item {
        padding: 1.5rem;
    }
    
    .action-card,
    .feature-card {
        padding: 1.5rem;
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

// Initialize all managers when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
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
    
    // Add loading complete class
    document.body.classList.add('loaded');
});

// Handle window resize
window.addEventListener('resize', () => {
    // Recalculate animations on resize
    clearTimeout(window.resizeTimer);
    window.resizeTimer = setTimeout(() => {
        if (window.animationManager) {
            window.animationManager.observeElements();
        }
    }, 250);
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
