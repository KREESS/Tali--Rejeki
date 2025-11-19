@extends('components.layout')

@section('title', $title)

@section('content')
<!-- Map Section -->
<div class="map-section" data-aos="fade-in">
    <iframe 
        src="https://www.google.com/maps/embed/v1/place?q=PT+Tali+Rejeki,Jalan+Raya+Tarumajaya+No+11,Setia+Asih,Tarumajaya,Bekasi,Jawa+Barat+17215&center=-6.165235122491531,106.99002374383583&zoom=18&maptype=roadmap&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"
        width="100%" 
        height="100%" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
    
    <!-- Map Controls -->
    <div class="map-controls" data-aos="fade-right" data-aos-delay="200">
        <button class="map-control-btn" onclick="openMapsApp()" title="Buka di Google Maps">
            <i class="fas fa-external-link-alt"></i>
        </button>
        <button class="map-control-btn" onclick="getDirections()" title="Petunjuk Arah">
            <i class="fas fa-directions"></i>
        </button>
    </div>
</div>

<!-- Hero Section -->
<div class="hero-section">
    <div class="hero-background">
        <img src="{{ asset('img/kontak/hubungi-kami.jpg') }}" alt="Hubungi Kami PT. Tali Rejeki">
        <div class="hero-overlay"></div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <!-- Konten di tengah -->
            <div class="col-lg-8 col-md-10">
                <div class="hero-content hero-content-center" data-aos="fade-up">
                    <h1 class="hero-title" data-aos="fade-up">Hubungi Kami</h1>
                    <p class="hero-description" data-aos="fade-up" data-aos-delay="100">
                        Temukan lokasi dan hubungi PT. Tali Rejeki untuk kebutuhan Anda. 
                        Kami siap melayani dengan profesional.
                    </p>
                    <div class="hero-actions" data-aos="fade-up" data-aos-delay="200">
                        <a href="#contact-info" class="hero-btn-primary" onclick="return scrollToContact(event)">
                            Info Kontak
                        </a>
                        <a href="https://wa.me/6281382523722?text=Halo,%20saya%20ingin%20bertanya%20tentang%20produk%20PT.%20Tali%20Rejeki" 
                           target="_blank" 
                           rel="noopener noreferrer" 
                           class="hero-btn-secondary" 
                           onclick="return trackWhatsAppClick(event)">
                            Chat WhatsApp
                        </a>
                    </div>
                    
                    <div class="hero-stats" data-aos="fade-up" data-aos-delay="300">
                        <div class="stat-item">
                            <div class="stat-number">Senin-Jumat</div>
                            <div class="stat-label">08:00 - 17:00 WIB</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">14+</div>
                            <div class="stat-label">Tahun Pengalaman</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">1000+</div>
                            <div class="stat-label">Klien Puas</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Information Section -->
<div class="contact-section" id="contact-info">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2 class="section-title">Informasi Kontak</h2>
            <p class="section-subtitle">Berbagai cara untuk terhubung dengan kami</p>
            <div class="section-divider"></div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="company-info-card glass-card" data-aos="fade-right">
                    <div class="company-header">
                        <div class="company-logo">
                            <i class="fas fa-building"></i>
                        </div>
                        <div>
                            <h2 class="company-name">PT. TALI REJEKI</h2>
                            <p class="company-tagline">Your Trusted Business Partner Since 2011</p>
                        </div>
                    </div>
                    
                    <div class="contact-info-grid">
                        <!-- Address -->
                        <div class="contact-info-item" data-aos="fade-up" data-aos-delay="100">
                            <div class="info-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h5 class="info-title">Alamat</h5>
                                <div class="address-details">
                                    <p>JL. RAYA TARUMAJAYA NO. 11</p>
                                    <p>RT 001 RW 029 DUSUN III</p>
                                    <p>DESA SETIA ASIH</p>
                                    <p>KEC. TARUMAJAYA</p>
                                    <p class="fw-semibold">KAB. BEKASI 17215</p>
                                </div>
                                <button class="copy-btn mt-2" onclick="copyAddress()">
                                    <i class="fas fa-copy me-2"></i>Salin Alamat
                                </button>
                            </div>
                        </div>
                        
                        <!-- Contact Methods -->
                        <div class="contact-info-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="info-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <h5 class="info-title">Hubungi Kami</h5>
                                <div class="contact-methods">
                                    <div class="contact-method">
                                        <a href="tel:+6202129470622" class="method-link">
                                            (021) 2947-0622
                                        </a>
                                        <span class="method-status online">Tersedia</span>
                                    </div>
                                    <div class="contact-method">
                                        <a href="tel:+6202122889956" class="method-link">
                                            (021) 2288-9956
                                        </a>
                                        <span class="method-status online">Tersedia</span>
                                    </div>
                                    <div class="contact-method">
                                        <span class="method-link">
                                            (021) 2947-0622
                                        </span>
                                        <span class="method-status">Fax</span>
                                    </div>
                                    <div class="contact-method">
                                        <a href="mailto:talirejeki@gmail.com" class="method-link">
                                            talirejeki@gmail.com
                                        </a>
                                        <span class="method-status">Email</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Operating Hours -->
                        <div class="contact-info-item" data-aos="fade-up" data-aos-delay="300">
                            <div class="info-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <h5 class="info-title">Jam Operasional</h5>
                                <div class="operating-hours">
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
                                <div class="mt-3">
                                    <span class="status-badge open">
                                        <i class="fas fa-circle me-2"></i>Jam Kerja Normal
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="col-lg-4">
                <div class="contact-form-card glass-card" data-aos="fade-left">
                    <div class="form-icon">
                        <i class="fas fa-paper-plane"></i>
                    </div>
                    <h4 class="form-title">Kirim Pesan</h4>
                    <p class="form-subtitle">Kami akan merespon dalam 24 jam</p>
                    
                    <form id="contactForm">
                        <input type="text" class="modern-input" id="name" required placeholder="Nama Lengkap">
                        <input type="email" class="modern-input" id="email" required placeholder="Email">
                        <input type="tel" class="modern-input" id="phone" placeholder="Nomor Telepon">
                        <textarea class="modern-input" id="message" rows="4" required placeholder="Pesan Anda"></textarea>
                        
                        <button type="submit" class="form-submit-btn">
                            <i class="fas fa-send me-2"></i>Kirim Pesan
                        </button>
                        
                        <div class="form-note mt-3">
                            <i class="fas fa-shield-alt me-1"></i>
                            Data Anda aman dan tidak akan dibagikan
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions Section -->
<div class="quick-actions-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2 class="section-title">Cara Mudah Menghubungi Kami</h2>
            <p class="section-subtitle">Pilih cara yang paling nyaman untuk Anda</p>
            <div class="section-divider"></div>
        </div>
        
        <div class="actions-grid">
            <div class="action-card glass-card" data-aos="fade-up" data-aos-delay="100">
                <div class="action-icon directions-icon">
                    <i class="fas fa-directions"></i>
                </div>
                <h5 class="action-title">Petunjuk Arah</h5>
                <p class="action-description">Dapatkan rute tercepat menuju lokasi kami</p>
                <button onclick="getDirections()" class="action-btn directions-btn">
                    <i class="fas fa-external-link-alt me-2"></i>Buka Maps
                </button>
                <div class="stat-text mt-3">
                    <i class="fas fa-clock me-1"></i>±45 menit dari Jakarta
                </div>
            </div>
            
            <div class="action-card glass-card" data-aos="fade-up" data-aos-delay="200">
                <div class="action-icon whatsapp-icon">
                    <i class="fab fa-whatsapp"></i>
                </div>
                <h5 class="action-title">WhatsApp</h5>
                <p class="action-description">Chat langsung dengan tim marketing kami</p>
                <a href="https://wa.me/6281382523722?text=Halo,%20saya%20ingin%20bertanya%20tentang%20produk%20PT.%20Tali%20Rejeki" 
                   target="_blank" 
                   rel="noopener noreferrer" 
                   class="action-btn whatsapp-btn">
                    <i class="fab fa-whatsapp me-2"></i>Chat Siti
                </a>
                <div class="stat-text mt-3">
                    <i class="fas fa-user me-1"></i>Tim Marketing Tersedia
                </div>
            </div>
            
            <div class="action-card glass-card" data-aos="fade-up" data-aos-delay="300">
                <div class="action-icon email-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h5 class="action-title">Email</h5>
                <p class="action-description">Kirim email untuk pertanyaan detail</p>
                <a href="mailto:talirejeki@gmail.com?subject=Pertanyaan%20tentang%20Produk" class="action-btn email-btn">
                    <i class="fas fa-envelope me-2"></i>Kirim Email
                </a>
                <div class="stat-text mt-3">
                    <i class="fas fa-clock me-1"></i>Respon dalam 24 jam
                </div>
            </div>
            
            <div class="action-card glass-card" data-aos="fade-up" data-aos-delay="400">
                <div class="action-icon phone-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <h5 class="action-title">Telepon</h5>
                <p class="action-description">Hubungi langsung untuk konsultasi</p>
                <a href="tel:+6202129470622" class="action-btn phone-btn">
                    <i class="fas fa-phone me-2"></i>Telepon
                </a>
                <div class="stat-text mt-3">
                    <i class="fas fa-user-headset me-1"></i>Tim siap melayani
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Persons Section -->
<div class="contact-persons-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2 class="section-title">Tim Marketing Kami</h2>
            <p class="section-subtitle">Hubungi langsung tim marketing untuk kebutuhan Anda</p>
            <div class="section-divider"></div>
        </div>
        
        <div class="team-marketing-row">
            <div class="person-card glass-card" data-aos="fade-up" data-aos-delay="100">
                <div class="person-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <h5 class="person-name">Siti</h5>
                <a href="https://wa.me/6281382523722?text=Halo%20Siti,%20saya%20ingin%20bertanya%20tentang%20produk%20PT.%20Tali%20Rejeki" 
                   target="_blank" 
                   rel="noopener" 
                   class="btn-whatsapp">
                    <i class="fab fa-whatsapp me-2"></i>0813 8252 3722
                </a>
            </div>
            
            <div class="person-card glass-card" data-aos="fade-up" data-aos-delay="200">
                <div class="person-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <h5 class="person-name">Kurnia</h5>
                <a href="https://wa.me/6281384808218?text=Halo%20Kurnia,%20saya%20ingin%20bertanya%20tentang%20produk%20PT.%20Tali%20Rejeki" 
                   target="_blank" 
                   rel="noopener" 
                   class="btn-whatsapp">
                    <i class="fab fa-whatsapp me-2"></i>0813 8480 8218
                </a>
                <small class="text-muted d-block mt-2">(WhatsApp Only)</small>
            </div>
            
            <div class="person-card glass-card" data-aos="fade-up" data-aos-delay="300">
                <div class="person-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <h5 class="person-name">Yovien Agustina</h5>
                <a href="https://wa.me/6281385231149?text=Halo%20Yovien,%20saya%20ingin%20bertanya%20tentang%20produk%20PT.%20Tali%20Rejeki" 
                   target="_blank" 
                   rel="noopener" 
                   class="btn-whatsapp">
                    <i class="fab fa-whatsapp me-2"></i>0813 8523 1149
                </a>
            </div>
            
            <div class="person-card glass-card" data-aos="fade-up" data-aos-delay="400">
                <div class="person-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <h5 class="person-name">Edy Purwanto</h5>
                <a href="https://wa.me/6281514515990?text=Halo%20Edy,%20saya%20ingin%20bertanya%20tentang%20produk%20PT.%20Tali%20Rejeki" 
                   target="_blank" 
                   rel="noopener" 
                   class="btn-whatsapp">
                    <i class="fab fa-whatsapp me-2"></i>0815 1451 5990
                </a>
            </div>
            
            <div class="person-card glass-card" data-aos="fade-up" data-aos-delay="500">
                <div class="person-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <h5 class="person-name">Sari</h5>
                <a href="https://wa.me/6281316826959?text=Halo%20Sari,%20saya%20ingin%20bertanya%20tentang%20produk%20PT.%20Tali%20Rejeki" 
                   target="_blank" 
                   rel="noopener" 
                   class="btn-whatsapp">
                    <i class="fab fa-whatsapp me-2"></i>0813 1682 6959
                </a>
            </div>
        </div>
    </div>
</div>

<style>
/* ===== BASE STYLES ===== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 1.6;
    color: #333;
    overflow-x: hidden;
    background-color: #f8f9fa;
}

/* ===== BUTTON STYLES ===== */
.hero-btn-primary, .hero-btn-secondary {
    border: none;
    border-radius: 25px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    font-size: 0.875rem;
    text-decoration: none;
    cursor: pointer;
    display: inline-block;
    user-select: none;
    padding: 12px 24px;
}

.hero-btn-primary:hover, .hero-btn-secondary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    text-decoration: none;
}

.hero-btn-primary {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.3);
}

.hero-btn-secondary {
    background: #25D366;
    color: white;
}

/* ===== HERO SECTION ===== */
.hero-section {
    position: relative;
    height: 583px; /* Sesuai dengan tinggi gambar yang diinginkan */
    overflow: hidden;
    display: flex;
    align-items: center;
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
}

.hero-background img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    /* Memastikan gambar ditampilkan dengan resolusi penuh */
    image-rendering: -webkit-optimize-contrast;
    image-rendering: crisp-edges;
    image-rendering: pixelated;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(0,0,0,0.3), rgba(0,0,0,0.3));
    z-index: 0;
}

.hero-content {
    position: relative;
    z-index: 2;
}

/* Perubahan untuk konten di tengah */
.hero-content-center {
    text-align: center;
    margin: 0 auto;
}

.hero-content-center .hero-actions {
    justify-content: center;
}

.hero-content-center .hero-stats {
    justify-content: center;
}

/* PERUBAHAN HANYA PADA TEKS HERO SECTION */
.hero-title {
    color: #FFFFFF; /* Warna putih solid untuk kontras maksimal */
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
    /* Tambahkan bayangan teks yang kuat untuk kontras */
    text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.8);
}

.hero-description {
    color: #FFFFFF; /* Warna putih solid */
    font-size: 1.1rem;
    margin-bottom: 2rem;
    /* Tambahkan bayangan teks untuk kontras */
    text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.8);
}

.hero-actions {
    display: flex;
    gap: 1rem;
    margin-bottom: 2rem;
}

.hero-stats {
    display: flex;
    gap: 1.5rem;
}

.stat-item {
    text-align: center;
    color: #FFFFFF; /* Warna putih solid */
}

.stat-number {
    font-size: 1.3rem;
    font-weight: 700;
    display: block;
    margin-bottom: 0.25rem;
    /* Tambahkan bayangan teks untuk kontras */
    text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.8);
}

.stat-label {
    font-size: 0.9rem;
    /* Hapus opacity dan ganti dengan warna solid */
    color: #FFFFFF;
    /* Tambahkan bayangan teks untuk kontras */
    text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.8);
}

/* ===== GLASS CARD EFFECT ===== */
.glass-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 15px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.glass-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
}

/* ===== MAP SECTION ===== */
.map-section {
    position: relative;
    height: 50vh;
    overflow: hidden;
}

.map-controls {
    position: absolute;
    top: 20px;
    left: 20px;
    z-index: 10;
    display: flex;
    gap: 5px;
}

.map-control-btn {
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid rgba(0, 0, 0, 0.1);
    color: #333;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    border-radius: 5px;
    cursor: pointer;
}

.map-control-btn:hover {
    background: #8B0000;
    color: white;
}

/* ===== SECTION STYLES ===== */
.contact-section, .quick-actions-section, .contact-persons-section {
    padding: 5rem 0;
}

.section-header {
    text-align: center;
    margin-bottom: 3rem;
}

.section-title {
    color: #333;
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.section-subtitle {
    color: #666;
    font-size: 1rem;
    margin-bottom: 1.5rem;
}

.section-divider {
    width: 80px;
    height: 3px;
    background: linear-gradient(90deg, #8B0000, #DC143C);
    margin: 0 auto;
    border-radius: 2px;
}

/* ===== COMPANY INFO ===== */
.company-info-card {
    padding: 2rem;
}

.company-header {
    display: flex;
    align-items: center;
    margin-bottom: 1.5rem;
}

.company-logo {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #8B0000, #DC143C);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    margin-right: 1rem;
}

.company-name {
    color: #8B0000;
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.company-tagline {
    color: #666;
    font-size: 0.9rem;
}

.company-rating {
    color: #ffc107;
    font-size: 0.9rem;
}

/* ===== CONTACT INFO GRID (PERUBAHAN UTAMA) ===== */
.contact-info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr; /* Dua kolom */
    gap: 1rem;
}

/* Membuat item terakhir (Jam Operasional) memenuhi lebar penuh */
.contact-info-item:last-child {
    grid-column: 1 / -1; /* Membentang dari kolom pertama hingga terakhir */
}

/* ===== CONTACT INFO ITEMS ===== */
.contact-info-item {
    padding: 1.5rem;
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.8);
    border: 1px solid rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.contact-info-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

.info-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #8B0000, #DC143C);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    margin-bottom: 1rem;
}

.info-title {
    color: #333;
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 1rem;
}

.address-details p {
    color: #666;
    margin-bottom: 0.5rem;
    line-height: 1.5;
}

.copy-btn {
    background: linear-gradient(135deg, #8B0000, #DC143C);
    color: white;
    border: none;
    border-radius: 10px;
    padding: 0.5rem 1rem;
    font-size: 0.8rem;
    transition: all 0.3s ease;
    cursor: pointer;
}

.copy-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(139, 0, 0, 0.3);
}

/* ===== CONTACT METHODS ===== */
.contact-method {
    display: flex;
    align-items: center;
    padding: 0.75rem 0;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

.contact-method:last-child {
    border-bottom: none;
}

.method-link {
    color: #333;
    text-decoration: none;
    flex: 1;
    transition: color 0.3s ease;
}

.method-link:hover {
    color: #8B0000;
}

.method-status {
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
    border-radius: 10px;
    background: #f0f0f0;
    color: #666;
}

.method-status.online {
    background: #25D366;
    color: white;
}

/* ===== OPERATING HOURS ===== */
.hours-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem 0;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

.hours-row:last-child {
    border-bottom: none;
}

.day {
    color: #333;
    font-weight: 500;
}

.time {
    color: #666;
}

.status-badge {
    display: inline-flex;
    align-items: center;
    padding: 0.5rem 1rem;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 500;
}

.status-badge.open {
    background: rgba(37, 211, 102, 0.1);
    color: #25D366;
    border: 1px solid rgba(37, 211, 102, 0.2);
}

/* ===== CONTACT FORM ===== */
.contact-form-card {
    padding: 2rem;
}

.form-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #8B0000, #DC143C);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    margin: 0 auto 1rem;
}

.form-title {
    color: #333;
    font-weight: 600;
    font-size: 1.2rem;
    text-align: center;
    margin-bottom: 0.5rem;
}

.form-subtitle {
    color: #666;
    font-size: 0.9rem;
    text-align: center;
    margin-bottom: 2rem;
}

.modern-input {
    background: white;
    border: 2px solid #e0e0e0;
    border-radius: 10px;
    color: #333;
    padding: 0.75rem;
    font-size: 1rem;
    transition: all 0.3s ease;
    width: 100%;
    margin-bottom: 1rem;
}

.modern-input:focus {
    border-color: #8B0000;
    box-shadow: 0 0 0 0.2rem rgba(139, 0, 0, 0.25);
    outline: none;
}

.form-submit-btn {
    background: linear-gradient(135deg, #8B0000, #DC143C);
    color: white;
    border: none;
    border-radius: 10px;
    font-weight: 600;
    padding: 0.75rem 1.5rem;
    width: 100%;
    transition: all 0.3s ease;
    font-size: 1rem;
    cursor: pointer;
}

.form-submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(139, 0, 0, 0.3);
}

.form-note {
    color: #666;
    font-size: 0.8rem;
    text-align: center;
    margin-top: 1rem;
}

/* ===== ACTION CARDS ===== */
.actions-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1.5rem;
}

.action-card {
    padding: 2rem;
    text-align: center;
    transition: all 0.3s ease;
}

.action-card:hover {
    transform: translateY(-5px);
}

.action-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    margin: 0 auto 1rem;
}

.directions-icon { background: linear-gradient(135deg, #8B0000, #DC143C); }
.whatsapp-icon { background: linear-gradient(135deg, #25D366, #128C7E); }
.email-icon { background: linear-gradient(135deg, #666, #999); }
.phone-icon { background: linear-gradient(135deg, #8B0000, #DC143C); }

.action-title {
    color: #333;
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 1rem;
}

.action-description {
    color: #666;
    margin-bottom: 1.5rem;
    font-size: 0.9rem;
}

.action-btn {
    border: none;
    border-radius: 10px;
    padding: 0.5rem 1rem;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-block;
    font-size: 0.9rem;
    cursor: pointer;
}

.directions-btn { background: linear-gradient(135deg, #8B0000, #DC143C); color: white; }
.whatsapp-btn { background: linear-gradient(135deg, #25D366, #128C7E); color: white; }
.email-btn { background: linear-gradient(135deg, #666, #999); color: white; }
.phone-btn { background: linear-gradient(135deg, #8B0000, #DC143C); color: white; }

.action-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.stat-text {
    color: #666;
    font-size: 0.8rem;
}

/* ===== CONTACT PERSONS ===== */
.person-card {
    padding: 1.5rem;
    text-align: center;
    transition: all 0.3s ease;
    flex: 1;
    margin: 0 0.5rem;
    min-width: 200px;
    max-width: 240px;
}

.person-card:hover {
    transform: translateY(-5px);
}

.person-avatar {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #8B0000, #DC143C);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    margin: 0 auto 0.8rem;
}

.person-name {
    color: #333;
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 0.8rem;
}

.btn-whatsapp {
    background: linear-gradient(135deg, #25D366, #128C7E);
    color: white;
    border: none;
    border-radius: 8px;
    padding: 0.5rem 0.6rem;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
    font-size: 0.75rem;
    width: 100%;
}

.btn-whatsapp:hover {
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(37, 211, 102, 0.3);
}

/* ===== TEAM MARKETING ROW ===== */
.team-marketing-row {
    display: flex;
    justify-content: center;
    align-items: stretch;
    gap: 0.8rem;
    padding: 1rem 0;
}

/* ===== CONTAINER ===== */
.container { 
    width: 100%; 
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto; 
    margin-left: auto; 
    max-width: 1300px;
}

/* ===== RESPONSIVE DESIGN ===== */
@media (max-width: 1200px) {
    .person-card {
        min-width: 180px;
        max-width: 220px;
        padding: 1.2rem;
    }
    
    .person-avatar {
        width: 45px;
        height: 45px;
        font-size: 1.1rem;
    }
    
    .person-name {
        font-size: 0.85rem;
    }
    
    .btn-whatsapp {
        font-size: 0.7rem;
        padding: 0.4rem 0.5rem;
    }
}

@media (max-width: 992px) {
    /* Kembali ke satu kolom di layar kecil */
    .contact-info-grid {
        grid-template-columns: 1fr;
    }
    
    /* Reset span kolom untuk item terakhir */
    .contact-info-item:last-child {
        grid-column: auto;
    }
    
    .person-card {
        min-width: 160px;
        max-width: 200px;
        padding: 1rem;
    }
    
    .person-avatar {
        width: 40px;
        height: 40px;
        font-size: 1rem;
    }
    
    .person-name {
        font-size: 0.8rem;
    }
    
    .btn-whatsapp {
        font-size: 0.65rem;
        padding: 0.35rem 0.45rem;
    }
    
    .actions-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .hero-section {
        height: 400px; /* Menyesuaikan tinggi untuk layar kecil */
    }
    
    .hero-title {
        font-size: 2rem;
    }
    
    .hero-description {
        font-size: 1rem;
    }
    
    .section-title {
        font-size: 1.5rem;
    }
    
    .map-section {
        height: 40vh;
    }
    
    .contact-section, .quick-actions-section, .contact-persons-section {
        padding: 3rem 0;
    }
    
    .hero-actions {
        flex-direction: column;
        gap: 1rem;
    }
    
    .hero-btn-primary, .hero-btn-secondary {
        width: 100%;
        max-width: 250px;
    }
    
    .team-marketing-row {
        gap: 0.5rem;
        flex-wrap: wrap;
    }
    
    .person-card {
        min-width: 140px;
        max-width: 180px;
        padding: 1rem;
    }
    
    .person-avatar {
        width: 35px;
        height: 35px;
        font-size: 0.9rem;
    }
    
    .person-name {
        font-size: 0.75rem;
    }
    
    .btn-whatsapp {
        font-size: 0.6rem;
        padding: 0.3rem 0.4rem;
    }
    
    .actions-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 576px) {
    .hero-section {
        height: 300px; /* Menyesuaikan tinggi untuk layar sangat kecil */
        padding: 2rem 0;
    }
    
    .hero-title {
        font-size: 1.5rem;
    }
    
    .section-title {
        font-size: 1.3rem;
    }
    
    .map-section {
        height: 35vh;
    }
    
    .contact-section, .quick-actions-section, .contact-persons-section {
        padding: 2rem 0;
    }
    
    .company-info-card, .contact-form-card {
        padding: 1.5rem;
    }
    
    .action-card {
        padding: 1.5rem;
        margin-bottom: 1rem;
    }
    
    .team-marketing-row {
        gap: 0.3rem;
    }
    
    .person-card {
        min-width: 120px;
        max-width: 160px;
        padding: 0.8rem;
        margin: 0 0.2rem;
    }
    
    .person-avatar {
        width: 30px;
        height: 30px;
        font-size: 0.8rem;
        margin-bottom: 0.5rem;
    }
    
    .person-name {
        font-size: 0.7rem;
        margin-bottom: 0.5rem;
    }
    
    .btn-whatsapp {
        font-size: 0.55rem;
        padding: 0.25rem 0.35rem;
    }
    
    .hero-stats {
        flex-direction: column;
        gap: 1rem;
    }
    
    /* Perubahan untuk mobile */
    .hero-content-center {
        text-align: center;
        margin-left: 0;
    }
    
    .hero-content-center .hero-actions {
        justify-content: center;
    }
    
    .hero-content-center .hero-stats {
        justify-content: center;
    }
}
</style>

<script>
// JavaScript Functions
function scrollToContact(event) {
    event.preventDefault();
    const contactSection = document.getElementById('contact-info');
    if (contactSection) {
        contactSection.scrollIntoView({ behavior: 'smooth' });
    }
    return false;
}

function trackWhatsAppClick(event) {
    return true;
}

function copyAddress() {
    const address = "JL. RAYA TARUMAJAYA NO. 11, RT 001 RW 029 DUSUN III, DESA SETIA ASIH, KEC. TARUMAJAYA, KAB. BEKASI 17215";
    navigator.clipboard.writeText(address).then(() => {
        showNotification('Alamat berhasil disalin!');
    });
}

function openMapsApp() {
    const url = "https://maps.google.com/?q=PT.+Tali+Rejeki,-6.165235122491531,106.99002374383583";
    window.open(url, '_blank');
}

function getDirections() {
    const url = "https://maps.google.com/maps/dir/?api=1&destination=PT.+Tali+Rejeki,-6.165235122491531,106.99002374383583";
    window.open(url, '_blank');
}

function showNotification(message) {
    const notification = document.createElement('div');
    notification.className = 'alert alert-success position-fixed';
    notification.style.cssText = `
        top: 20px;
        right: 20px;
        z-index: 9999;
        min-width: 250px;
        animation: slideIn 0.3s ease;
    `;
    notification.innerHTML = `
        <i class="fas fa-check-circle me-2"></i>${message}
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease';
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

// Form submission
document.getElementById('contactForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;
    
    if (name && email && message) {
        showNotification('Pesan berhasil dikirim! Kami akan segera merespons.');
        this.reset();
    } else {
        showNotification('Mohon lengkapi semua field yang wajib diisi.');
    }
});

// Initialize AOS
document.addEventListener('DOMContentLoaded', function() {
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    }
});

// Add animation styles
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    @keyframes slideOut {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100%); opacity: 0; }
    }
`;
document.head.appendChild(style);
</script>
@endsection