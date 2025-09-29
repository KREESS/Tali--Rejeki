@extends('en.components.layout')

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
                        <span>Trusted Distributor Since 2011</span>
                    </div>
                    <h1 class="hero-title">
                        <span class="title-gradient">About</span>
                        <span class="title-highlight">Tali Rejeki</span>
                    </h1>
                    <p class="hero-subtitle">
                        A trusted distributor of industrial insulation products with over 14 years of experience 
                        serving industrial needs across Indonesia.
                    </p>
                    <div class="hero-stats">
                        <div class="stat-item">
                            <span class="stat-number" data-target="14">0</span>
                            <span class="stat-label">Years</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number" data-target="500">0</span>
                            <span class="stat-label">Projects</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number" data-target="200">0</span>
                            <span class="stat-label">Clients</span>
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
                        <span>Company Profile</span>
                    </div>
                    <h2 class="section-title">More Than Just a Distributor</h2>
                    <p class="section-description">
                        Tali Rejeki was established in 2011 with a commitment to provide the best insulation 
                        solutions for Indonesian industries. We not only sell products but also provide 
                        technical consultation and comprehensive after-sales services.
                    </p>
                    <p class="section-description">
                        With an experienced expert team and a wide distribution network, we have become 
                        a trusted partner for various industries such as oil & gas, petrochemicals, manufacturing, 
                        and construction.
                    </p>
                    
                    <div class="company-highlights">
                        <div class="highlight-item">
                            <div class="highlight-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <div class="highlight-content">
                                <h4>Guaranteed Quality</h4>
                                <p>All products meet international standards with official certification</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <div class="highlight-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="highlight-content">
                                <h4>Professional Team</h4>
                                <p>Supported by experienced experts in the insulation field</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <div class="highlight-icon">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="highlight-content">
                                <h4>Wide Distribution</h4>
                                <p>Distribution network covers the entire territory of Indonesia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="overview-visual">
                    <div class="image-grid">
                        <div class="grid-item main-image">
                            <img src="{{ asset('img/about/7.png') }}" alt="Tali Rejeki Office" class="img-fluid">
                        </div>
                        <div class="grid-item side-image-1">
                            <img src="{{ asset('img/about/a.jpg') }}" alt="Tali Rejeki Team" class="img-fluid">
                        </div>
                        <div class="grid-item side-image-2">
                            <img src="{{ asset('img/about/g.jpg') }}" alt="Tali Rejeki Warehouse" class="img-fluid">
                        </div>
                    </div>
                    <div class="experience-badge">
                        <div class="badge-content">
                            <span class="badge-number">14+</span>
                            <span class="badge-text">Years<br>of Experience</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Vision Mission Section -->
<section class="vision-mission py-5 position-relative">
  <div class="container">
    <div class="section-header text-center mb-5" data-aos="fade-up">
      <div class="section-badge mb-3">
        <i class="fas fa-eye"></i>
        <span>Vision &amp; Mission</span>
      </div>
      <!-- TIDAK diubah: gunakan .section-title global kamu -->
      <h2 class="section-title">Our Commitment to Indonesia</h2>
    </div>

    <div class="row g-4">
      <!-- Vision -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <div class="vision-card glass-card">
          <div class="card-icon">
            <i class="fas fa-eye"></i>
          </div>
          <div class="card-content">
            <h3 class="card-title">Our Vision</h3>
            <p class="card-description">
              To become the leading industrial insulation distributor in Indonesia, recognized 
              for product quality, excellent service, and innovative solutions that support 
              the growth of the national industry.
            </p>
          </div>
        </div>
      </div>

      <!-- Mission -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
        <div class="mission-card glass-card">
          <div class="card-icon">
            <i class="fas fa-bullseye"></i>
          </div>
          <div class="card-content">
            <h3 class="card-title">Our Mission</h3>
            <ul class="mission-list">
              <li>Provide high-quality insulation products at competitive prices</li>
              <li>Deliver professional technical consultation services</li>
              <li>Build long-term partnerships with customers</li>
              <li>Develop a competent and highly dedicated team</li>
              <li>Contribute to energy efficiency in Indonesia's industries</li>
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
                <span>Company Values</span>
            </div>
            <h2 class="section-title">Principles We Uphold</h2>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="value-title">Integrity</h3>
                    <p class="value-description">
                        Committed to honesty and transparency in every transaction and communication
                    </p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-gem"></i>
                    </div>
                    <h3 class="value-title">Quality</h3>
                    <p class="value-description">
                        Prioritizing high-quality standards in the products and services we provide
                    </p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3 class="value-title">Innovation</h3>
                    <p class="value-description">
                        Continuously innovating in solutions and technology to meet future needs
                    </p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3 class="value-title">Partnership</h3>
                    <p class="value-description">
                        Building mutually beneficial relationships with all stakeholders
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Statistics Section (UNIQUE + PHOTO BG) -->
<section class="u-stats bg-photo py-5" data-ustats-scope="home-stats-01"
         style="--u-photo:url('/img/galeri-proyek/3.jpg'); /* Laravel public/ → /img/... */
                --u-photo-pos:center 38%;                 /* set photo focus position here */
                --u-photo-attach:auto;                    /* auto | fixed (desktop in CSS also set) */">
  <div class="container">
    <div class="row text-center">
      <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
        <div class="u-stat-item">
          <div class="u-stat-icon"><i class="fas fa-calendar-alt"></i></div>
          <div class="u-stat-number" data-ucount="14" data-ufrom="0" data-uduration="2000">0</div>
          <div class="u-stat-label">Years of Experience</div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
        <div class="u-stat-item">
          <div class="u-stat-icon"><i class="fas fa-handshake"></i></div>
          <div class="u-stat-number" data-ucount="500" data-ufrom="0" data-uduration="2200">0</div>
          <div class="u-stat-label">Projects Completed</div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
        <div class="u-stat-item">
          <div class="u-stat-icon"><i class="fas fa-users"></i></div>
          <div class="u-stat-number" data-ucount="200" data-ufrom="0" data-uduration="2200">0</div>
          <div class="u-stat-label">Active Clients</div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
        <div class="u-stat-item">
          <div class="u-stat-icon"><i class="fas fa-map-marker-alt"></i></div>
          <div class="u-stat-number" data-ucount="50" data-ufrom="0" data-uduration="2000">0</div>
          <div class="u-stat-label">Cities Covered</div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Leadership Section -->
{{-- <section class="leadership-section py-5">
  <div class="container">
    <div class="section-header text-center mb-5" data-aos="fade-up">
      <div class="section-badge">
        <i class="fas fa-user-tie"></i>
        <span>Leadership</span>
      </div>
      <h2 class="section-title">CEO & Leadership</h2>
      <p class="section-description">
        Experienced leaders guiding strategy and execution to deliver the best solutions
      </p>
    </div>

    <div class="row g-4">
      <!-- CEO -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="leader-card">
          <div class="leader-image is-fit">
            <img src="{{ asset('img/about/gg11.png') }}" alt="CEO" class="img-fluid">
            <div class="leader-overlay">
              <div class="leader-social">
                <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
              </div>
            </div>
          </div>
          <div class="leader-content">
            <h3 class="leader-name">Budi Santoso</h3>
            <p class="leader-position">Chief Executive Officer (CEO)</p>
            <p class="leader-description">
              Leading the company with a vision to develop Indonesia's insulation industry
            </p>
          </div>
        </div>
      </div>

      <!-- Head of Engineering -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="leader-card">
          <div class="leader-image is-fit">
            <img src="{{ asset('img/about/gg11.png') }}" alt="Head of Engineering" class="img-fluid">
            <div class="leader-overlay">
              <div class="leader-social">
                <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
              </div>
            </div>
          </div>
          <div class="leader-content">
            <h3 class="leader-name">Ir. Sari Wijaya</h3>
            <p class="leader-position">Head of Engineering</p>
            <p class="leader-description">
              Technical expert with 15+ years of experience in industrial insulation
            </p>
          </div>
        </div>
      </div>

      <!-- Head of Sales -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="leader-card">
          <div class="leader-image is-fit">
            <img src="{{ asset('img/about/gg11.png') }}" alt="Head of Sales" class="img-fluid">
            <div class="leader-overlay">
              <div class="leader-social">
                <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
              </div>
            </div>
          </div>
          <div class="leader-content">
            <h3 class="leader-name">Ahmad Rahman</h3>
            <p class="leader-position">Head of Sales</p>
            <p class="leader-description">
              Specialist in building business relationships and B2B sales solutions
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> --}}


<!-- CTA Section -->
<section class="cta-section py-5">
  <div class="cta-wrap" data-aos="fade-up">
    <div class="cta-icon">
      <i class="fas fa-phone" aria-hidden="true"></i>
    </div>

    <h2 class="cta-title">Let's Collaborate</h2>

    <p class="cta-description">
      Join hundreds of companies that have trusted us as
      their partner in industrial insulation solutions
    </p>

    <div class="cta-actions">
      <a href="{{ route('contact') }}" class="btn btn-primary">
        <i class="fas fa-phone"></i>
        Contact Us
      </a>
      <a href="{{ route('products') }}" class="btn btn-outline-primary">
        <i class="fas fa-cubes"></i>
        View Products
      </a>
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
        background-image: url('../img/about/7.png');
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
    /* =========================================
    Vision & Mission + Company Values (Scoped)
    - Premium glass cards
    - Dark/Light via CSS vars
    - Tidak mengubah .section-title global
    ========================================= */

    /* Scope kecil agar aman tidak ganggu global */
    .vision-mission, .company-values,
    .vision-mission *, .company-values * { box-sizing: border-box; }

    /* -------------------------------
    TOKENS: VISION & MISSION (LIGHT)
    ------------------------------- */
    .vision-mission{
    --vm-card-bg: rgba(255,255,255,0.9);
    --vm-card-border: rgba(124, 20, 21, 0.12);
    --vm-shadow: 0 15px 40px rgba(0,0,0,0.08);

    --vm-text-muted: #6b7280;
    /* judul section pakai .section-title global — tidak diubah di sini */

    --vm-hgrad-start: #1f2937; /* untuk .card-title */
    --vm-hgrad-end: #374151;

    --vm-brand-start: #7c1415;
    --vm-brand-end: #dc2626;

    --vm-blob: rgba(124, 20, 21, 0.06);

    position: relative;
    overflow: hidden;
    isolation: isolate;
    }

    /* DARK untuk Vision & Mission */
    :where(html, body)[data-bs-theme="dark"] .vision-mission,
    :where(html, body)[data-theme="dark"] .vision-mission,
    :where(html, body).dark .vision-mission{
    --vm-card-bg: rgba(20,20,22,0.55);
    --vm-card-border: rgba(220,220,220,0.12);
    --vm-shadow: 0 15px 40px rgba(0,0,0,0.35);

    --vm-text-muted: #9aa4b2;

    --vm-hgrad-start: #ffffff;
    --vm-hgrad-end: #cbd5e1;

    --vm-blob: rgba(124, 20, 21, 0.12);
    }

    /* BACKDROP Vision & Mission */
    .vision-mission::before{
    content:'';
    position:absolute; inset:0;
    background: radial-gradient(circle at 90% 10%, var(--vm-blob) 0%, transparent 55%);
    pointer-events:none;
    z-index:0;
    }

    /* Glass Card umum */
    .vision-card, .mission-card{
    background: var(--vm-card-bg);
    border-radius: 25px;
    padding: 3rem;
    height: 100%;
    border: 1px solid var(--vm-card-border);
    box-shadow: var(--vm-shadow);
    position: relative;
    overflow: hidden;
    transition: transform .35s ease, box-shadow .35s ease, border-color .35s ease, background-color .35s ease, opacity .35s ease;
    will-change: transform, box-shadow;
    }

    .vision-card::before, .mission-card::before{
    content:'';
    position:absolute; inset:0;
    background: linear-gradient(135deg, rgba(124, 20, 21, 0.03), transparent 55%);
    transition: opacity .3s ease;
    pointer-events:none;
    }

    .vision-card:hover, .mission-card:hover{
    transform: translateY(-12px);
    box-shadow: 0 28px 64px rgba(124,20,21,0.20);
    border-color: rgba(124, 20, 21, 0.22);
    }
    .vision-card:hover::before, .mission-card:hover::before{ opacity: 0; }

    /* Icon tile */
    .card-icon{
    width: 90px; height: 90px;
    background: linear-gradient(135deg, var(--vm-brand-start), var(--vm-brand-end));
    border-radius: 24px;
    display:flex; align-items:center; justify-content:center;
    color:#fff; font-size:2.25rem;
    margin-bottom:2rem;
    box-shadow: 0 16px 36px rgba(124,20,21,0.32);
    transition: transform .35s ease, filter .35s ease;
    }
    .glass-card:hover .card-icon{ transform: rotate(6deg) scale(1.06); }

    /* Judul & teks card */
    .card-title{
    font-size: 2rem; font-weight: 800;
    background: linear-gradient(135deg, var(--vm-hgrad-start), var(--vm-hgrad-end));
    -webkit-background-clip: text; background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 1.5rem;
    }
    @supports not (-webkit-background-clip: text){
    .card-title { color: #1f2937; } /* fallback, tidak ganggu .section-title */
    }

    .card-description{
    color: var(--vm-text-muted);
    line-height: 1.8;
    margin: 0;
    font-size: 1.1rem;
    text-wrap: pretty;
    }

    /* Mission list */
    .mission-list{ list-style:none; padding:0; margin:0; }
    .mission-list li{
    position: relative;
    padding-left: 2rem;
    margin-bottom: 1rem;
    color: var(--vm-text-muted);
    line-height: 1.7;
    font-size: 1.05rem;
    transition: color .25s ease;
    }
    .mission-list li::before{
    content:'';
    position: absolute;
    left: 0; top: .7rem;
    width: 10px; height: 10px;
    background: linear-gradient(135deg, var(--vm-brand-start), var(--vm-brand-end));
    border-radius: 50%;
    box-shadow: 0 0 10px rgba(220,38,38,0.35);
    transition: transform .25s ease;
    }
    .mission-list li:hover{ color:#1f2937; }
    :where(html, body)[data-bs-theme="dark"] .vision-mission .mission-list li:hover,
    :where(html, body)[data-theme="dark"] .vision-mission .mission-list li:hover,
    :where(html, body).dark .vision-mission .mission-list li:hover{
    color:#e5e7eb;
    }
    .mission-list li:hover::before{ transform: scale(1.22); }

    /* Responsive kecil */
    @media (max-width: 575.98px){
    .vision-card, .mission-card{ padding: 2rem; border-radius: 20px; }
    .card-icon{ width:80px; height:80px; font-size:2rem; border-radius:20px; }
    }

    /* Reduced motion */
    @media (prefers-reduced-motion: reduce){
    .vision-card, .mission-card, .card-icon, .mission-list li::before{ transition: none !important; }
    .vision-card:hover, .mission-card:hover{ transform:none !important; }
    }

    /* =========================================
    COMPANY VALUES — Polished & Consistent
    - Premium cards + subtle motion
    - Dark/Light via CSS vars
    - Title gaya sama dgn Company Overview
    - Tidak mengubah color title (ikut global)
    ========================================= */

    /* scope aman */
    .company-values, .company-values * { box-sizing: border-box; }

    /* TOKENS (LIGHT) */
    .company-values{
    --val-radius: 22px;
    --val-gap: clamp(1rem, 1.2vw, 1.5rem);

    --val-card-bg: rgba(255,255,255,0.9);
    --val-card-border: rgba(124, 20, 21, 0.12);
    --val-shadow: 0 12px 32px rgba(0,0,0,0.08);

    --val-text-muted: #6b7280;

    --val-hgrad-start: #1f2937;   /* untuk .value-title */
    --val-hgrad-end:   #374151;

    --val-brand-start: #7c1415;   /* brand gradient */
    --val-brand-end:   #dc2626;

    --val-blob: rgba(124, 20, 21, 0.06);

    position: relative;
    padding: 100px 0;
    isolation: isolate;
    }

    /* BACKDROP */
    .company-values::before{
    content:''; position:absolute; inset:0;
    background: radial-gradient(circle at 10% 20%, var(--val-blob) 0%, transparent 55%);
    pointer-events:none; z-index:0;
    }

    /* DARK */
    :where(html, body)[data-bs-theme="dark"] .company-values,
    :where(html, body)[data-theme="dark"] .company-values,
    :where(html, body).dark .company-values{
    --val-card-bg: rgba(20,20,22,0.55);
    --val-card-border: rgba(220,220,220,0.12);
    --val-shadow: 0 12px 34px rgba(0,0,0,0.34);

    --val-text-muted: #9aa4b2;

    --val-hgrad-start: #ffffff;
    --val-hgrad-end:   #cbd5e1;

    --val-blob: rgba(124, 20, 21, 0.12);
    }

    /* ========== HEADER (match Company Overview) ========== */
    /* center header + garis hias di tengah */
    .company-values .section-header{ text-align:center; position:relative; z-index:1; }

    /* TIDAK set color agar ikut global/dark-light */
    .company-values .section-title{
    font-weight: 900;
    font-size: clamp(1.75rem, 1.1rem + 1.9vw, 2.6rem);
    line-height: 1.15;
    letter-spacing: -0.02em;
    margin: 0 0 1rem;
    position: relative;
    text-wrap: balance;
    word-break: normal;
    }
    .company-values .section-title::after{
    content:''; display:block;
    width:72px; height:4px; margin:.6rem auto 0;
    border-radius:4px;
    background: linear-gradient(90deg, #7c1415, #dc2626 60%, #fbbf24 100%);
    box-shadow: 0 2px 12px rgba(220,38,38,.28);
    }

    /* deskripsi di bawah title (tanpa ubah warna) */
    .company-values .section-description{
    font-size: clamp(1rem, .95rem + .28vw, 1.12rem);
    line-height: 1.8;
    margin: .5rem 0 0;
    max-width: 68ch;
    text-wrap: pretty;
    hyphens: auto;
    }

    /* badge tetap minimal—kalau kamu sudah punya global, ini opsional */
    .company-values .section-badge{
    display:inline-flex; align-items:center; gap:.6rem;
    padding:.55rem 1rem; border-radius:999px;
    background: rgba(255,255,255,.78);
    border:1px solid rgba(124,20,21,.12);
    box-shadow: 0 10px 28px rgba(0,0,0,.06);
    backdrop-filter: blur(10px);
    color:#111827; font-weight:700;
    margin-bottom: 18px;
    }
    .company-values .section-badge i{ color:#fbbf24; }

    /* ========== VALUE CARDS ========== */
    .value-card{
    background: var(--val-card-bg);
    border-radius: var(--val-radius);
    padding: 2.5rem;
    text-align: center;
    border: 1px solid var(--val-card-border);
    height: 100%;
    box-shadow: var(--val-shadow);
    position: relative;
    overflow: hidden;
    transition: transform .28s ease, box-shadow .28s ease, border-color .28s ease, background-color .28s ease, filter .28s ease;
    will-change: transform, box-shadow;
    z-index: 1;
    }
    .value-card::before{
    content:''; position:absolute; inset:0; pointer-events:none;
    background: linear-gradient(135deg, rgba(124, 20, 21, 0.03), transparent 55%);
    transition: opacity .25s ease;
    }
    .value-card:hover{
    transform: translateY(-10px);
    box-shadow: 0 24px 54px rgba(124,20,21,0.20);
    border-color: rgba(124, 20, 21, 0.22);
    }
    .value-card:hover::before{ opacity:0; }

    /* Icon tile */
    .value-icon{
    width: 90px; height: 90px;
    background: linear-gradient(135deg, var(--val-brand-start), var(--val-brand-end));
    border-radius: 22px;
    display:flex; align-items:center; justify-content:center;
    color:#fff; font-size:2.25rem;
    margin: 0 auto 2rem;
    box-shadow: 0 15px 35px rgba(124, 20, 21, 0.3);
    transition: transform .28s ease;
    }
    .value-card:hover .value-icon{ transform: translateY(-2px) scale(1.04); }

    /* Title & text (tidak menyentuh color title global) */
    .value-title{
    font-size: 1.75rem; font-weight: 800;
    background: linear-gradient(135deg, var(--val-hgrad-start), var(--val-hgrad-end));
    -webkit-background-clip: text; background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 1.1rem;
    }
    @supports not (-webkit-background-clip: text){
    .value-title{ color: #1f2937; }
    }
    .value-description{
    color: var(--val-text-muted);
    line-height: 1.7; margin: 0; font-size: 1.05rem;
    text-wrap: pretty;
    }

    /* Responsive kecil */
    @media (max-width: 575.98px){
    .value-card{ padding: 2rem; border-radius: 18px; }
    .value-icon{ width:80px; height:80px; font-size:2rem; border-radius:18px; }
    }

    /* Reduced motion */
    @media (prefers-reduced-motion: reduce){
    .value-card, .value-icon{ transition:none !important; }
    .value-card:hover{ transform:none !important; }
    }

    /* =========================================
    COMPANY VALUES (mengikuti style di atas)
    ========================================= */

    /* TOKENS: VALUES (LIGHT) */
    .company-values{
    --val-card-bg: rgba(255,255,255,0.9);
    --val-card-border: rgba(124, 20, 21, 0.12);
    --val-shadow: 0 10px 30px rgba(0,0,0,0.08);

    --val-text-muted: #6b7280;

    --val-hgrad-start: #1f2937; /* untuk .value-title */
    --val-hgrad-end: #374151;

    --val-brand-start: #7c1415;
    --val-brand-end: #dc2626;

    --val-blob: rgba(124, 20, 21, 0.06);

    padding: 100px 0;
    position: relative;
    isolation: isolate;
    }
    .company-values::before{
    content:''; position:absolute; inset:0;
    background: radial-gradient(circle at 10% 20%, var(--val-blob) 0%, transparent 55%);
    pointer-events:none; z-index:0;
    }

    /* DARK untuk Company Values */
    :where(html, body)[data-bs-theme="dark"] .company-values,
    :where(html, body)[data-theme="dark"] .company-values,
    :where(html, body).dark .company-values{
    --val-card-bg: rgba(20,20,22,0.55);
    --val-card-border: rgba(220,220,220,0.12);
    --val-shadow: 0 10px 32px rgba(0,0,0,0.34);

    --val-text-muted: #9aa4b2;

    --val-hgrad-start: #ffffff;
    --val-hgrad-end: #cbd5e1;

    --val-blob: rgba(124, 20, 21, 0.12);
    }

    /* Value card */
    .value-card{
    background: var(--val-card-bg);
    border-radius: 20px;
    padding: 2.5rem;
    text-align: center;
    border: 1px solid var(--val-card-border);
    height: 100%;
    box-shadow: var(--val-shadow);
    position: relative;
    overflow: hidden;
    transition: transform .30s ease, box-shadow .30s ease, border-color .30s ease, background-color .30s ease;
    will-change: transform, box-shadow;
    z-index: 1;
    }
    .value-card::before{
    content:''; position:absolute; inset:0;
    background: linear-gradient(135deg, rgba(124, 20, 21, 0.03), transparent 55%);
    transition: opacity .3s ease; pointer-events:none;
    }
    .value-card:hover{
    transform: translateY(-12px);
    box-shadow: 0 25px 50px rgba(124, 20, 21, 0.20);
    border-color: rgba(124, 20, 21, 0.22);
    }
    .value-card:hover::before{ opacity:0; }

    .value-icon{
    width: 90px; height: 90px;
    background: linear-gradient(135deg, var(--val-brand-start), var(--val-brand-end));
    border-radius: 22px;
    display:flex; align-items:center; justify-content:center;
    color:#fff; font-size:2.25rem;
    margin: 0 auto 2rem;
    box-shadow: 0 15px 35px rgba(124, 20, 21, 0.3);
    }

    /* Title & text (tidak menyentuh .section-title global) */
    .value-title{
    font-size: 1.75rem;
    font-weight: 800;
    background: linear-gradient(135deg, var(--val-hgrad-start), var(--val-hgrad-end));
    -webkit-background-clip: text; background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 1.2rem;
    }
    @supports not (-webkit-background-clip: text){
    .value-title{ color: #1f2937; }
    }
    .value-description{
    color: var(--val-text-muted);
    line-height: 1.7; margin: 0; font-size: 1.05rem;
    text-wrap: pretty;
    }

    /* Responsive kecil */
    @media (max-width: 575.98px){
    .value-card{ padding: 2rem; border-radius: 18px; }
    .value-icon{ width:80px; height:80px; font-size:2rem; border-radius:18px; }
    }

    /* Reduced motion */
    @media (prefers-reduced-motion: reduce){
    .value-card, .value-icon{ transition: none !important; }
    .value-card:hover{ transform:none !important; }
    }

    /* ================================
    Vision & Mission — Section Title
    (match Company Overview; no color change)
    ================================ */

    .vision-mission .section-title{
    /* sengaja TIDAK set color di sini */
    font-weight: 900;
    font-size: clamp(1.75rem, 1.1rem + 1.9vw, 2.6rem);
    line-height: 1.15;
    letter-spacing: -0.02em;
    margin: 0 0 1rem;
    position: relative;
    text-wrap: balance;
    word-break: normal;
    }

    .vision-mission .section-title::after{
    content:'';
    display:block;
    width: 72px;
    height: 4px;
    margin-top: .6rem;
    border-radius: 4px;
    /* pakai gradient yang sama seperti Company Overview */
    background: linear-gradient(90deg, #7c1415, #dc2626 60%, #fbbf24 100%);
    box-shadow: 0 2px 12px rgba(220,38,38,.28);
    }

    /* konsistensi jarak seperti di Company Overview */
    .vision-mission .section-badge + .section-title{ margin-top: .25rem; }
    .vision-mission .section-title + .section-description{ margin-top: .5rem; }
    /* Center title + underline in Vision & Mission */
    .vision-mission .section-header{ 
    text-align: center;         /* pastikan kontainer header center */
    }

    .vision-mission .section-title{
    text-align: center;         /* teks judul center */
    }

    .vision-mission .section-title::after{
    /* garis hias ikut center */
    margin: .6rem auto 0;       /* auto kiri/kanan = center */
    display: block;             /* pastikan block biar margin auto berlaku */
    width: 72px;                /* pakai lebar yang sudah kamu set */
    height: 4px;
    border-radius: 4px;
    background: linear-gradient(90deg, #7c1415, #dc2626 60%, #fbbf24 100%);
    box-shadow: 0 2px 12px rgba(220,38,38,.28);
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


/* Enhanced U-STATS Section */
    /* =========================================
    U-STATS — Unique Statistics Section
    - Scoped: .u-stats (tidak bentrok)
    - Rame tapi ringan: dots, glow, shine
    - Aksesibel: prefers-reduced-motion
    ========================================= */
    /* =========================================
    U-STATS — PHOTO BACKGROUND VARIANT
    ========================================= */
    .u-stats.bg-photo{
    /* default vars (bisa override via style=... di HTML) */
    --u-photo: url('/img/galeri-proyek/3.jpg');
    --u-photo-pos: center 40%;     /* atur framing subjek foto */
    --u-photo-attach: auto;        /* auto | fixed */
    --u-darken-top: rgba(16,16,18,.70);
    --u-darken-mid: rgba(16,16,18,.35);
    --u-darken-brand: rgba(124,20,21,.35);

    position: relative;
    color: #fff;
    overflow: hidden;
    isolation: isolate;

    /* layer 1 = gradient darken, layer 2 = photo */
    background-image:
        linear-gradient(180deg, var(--u-darken-top) 0%, var(--u-darken-mid) 45%, var(--u-darken-brand) 100%),
        var(--u-photo);
    background-size: cover, cover;
    background-repeat: no-repeat, no-repeat;
    background-position: var(--u-photo-pos), var(--u-photo-pos);
    background-attachment: var(--u-photo-attach), var(--u-photo-attach);
    }

    /* dekorasi: dots & glow (lebih subtle agar foto tetap dominan) */
    .u-stats.bg-photo::before,
    .u-stats.bg-photo::after{
    content:""; position:absolute; inset:0; pointer-events:none; z-index:0;
    }
    .u-stats.bg-photo::before{
    background-image:
        radial-gradient(circle at 18% 22%, rgba(255,255,255,0.10) 2px, transparent 2px),
        radial-gradient(circle at 78% 78%, rgba(255,255,255,0.08) 2px, transparent 2px);
    background-size: 120px 120px, 180px 180px;
    animation: uDotsFloat 18s ease-in-out infinite;
    opacity: .85;
    }
    .u-stats.bg-photo::after{
    background:
        radial-gradient(50rem 50rem at 120% -10%, rgba(255,255,255,.16), transparent 60%),
        radial-gradient(34rem 34rem at -10% 120%, rgba(255,255,255,.10), transparent 60%);
    mix-blend-mode: screen;
    animation: uGlowSpin 26s linear infinite;
    }

    /* parallax halus hanya desktop (hindari iOS jank) */
    @media (min-width: 1200px){
    .u-stats.bg-photo{
        background-attachment: fixed, fixed;
    }
    }

    /* respect prefers-reduced-motion */
    @media (prefers-reduced-motion: reduce){
    .u-stats.bg-photo::before,
    .u-stats.bg-photo::after{ animation: none !important; }
    }

    .u-stats, .u-stats * { box-sizing: border-box; }
    .u-stats{ position: relative; isolation: isolate; }

    /* Brand gradient background */
    .bg-aurora{
    background: linear-gradient(135deg, #7c1415 0%, #dc2626 100%);
    color: #fff; overflow: hidden; position: relative;
    }

    /* Decorative overlays */
    .bg-aurora::before,
    .bg-aurora::after{
    content:""; position:absolute; inset:0; pointer-events:none; z-index:0;
    }
    .bg-aurora::before{
    background-image:
        radial-gradient(circle at 20% 20%, rgba(255,255,255,0.12) 2px, transparent 2px),
        radial-gradient(circle at 80% 80%, rgba(255,255,255,0.10) 2px, transparent 2px);
    background-size: 110px 110px, 160px 160px;
    animation: uDotsFloat 18s ease-in-out infinite;
    }
    .bg-aurora::after{
    background:
        radial-gradient(60rem 60rem at 120% -10%, rgba(255,255,255,.18), transparent 60%),
        radial-gradient(40rem 40rem at -10% 120%, rgba(255,255,255,.12), transparent 60%);
    mix-blend-mode: screen;
    animation: uGlowSpin 24s linear infinite;
    }

    /* Stat cards */
    .u-stat-item{
    position: relative; z-index:1;
    text-align: center;
    padding: 2.1rem;
    border-radius: 22px;
    background: rgba(255,255,255,0.12);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(255,255,255,0.22);
    box-shadow: 0 18px 46px rgba(0,0,0,.18);
    transition: transform .28s ease, box-shadow .28s ease, background-color .28s ease, border-color .28s ease;
    }
    .u-stat-item::after{
    content:""; position:absolute; inset:0; border-radius:22px; padding:1px;
    background: linear-gradient(135deg, rgba(255,255,255,.95), rgba(255,255,255,.2));
    -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
    -webkit-mask-composite: xor; mask-composite: exclude;
    opacity:.24; transition: opacity .28s ease; pointer-events: none;
    }
    .u-stat-item:hover{
    transform: translateY(-10px);
    box-shadow: 0 28px 64px rgba(0,0,0,.28);
    background: rgba(255,255,255,0.16);
    border-color: rgba(255,255,255,0.30);
    }
    .u-stat-item:hover::after{ opacity:.6; }

    /* Icon tile */
    .u-stat-icon{
    width: 92px; height: 92px; margin: 0 auto 1.25rem;
    border-radius: 24px;
    display:flex; align-items:center; justify-content:center;
    color:#fff; font-size:2.25rem;
    background: rgba(255,255,255,0.16);
    border:1px solid rgba(255,255,255,0.25);
    backdrop-filter: blur(10px);
    box-shadow: 0 16px 36px rgba(0,0,0,.25);
    position: relative; overflow: hidden;
    transition: transform .28s ease, box-shadow .28s ease, background-color .28s ease;
    }
    .u-stat-icon::before{
    content:""; position:absolute; inset:-20%;
    background: linear-gradient(120deg, transparent 35%, rgba(255,255,255,.35) 50%, transparent 65%);
    transform: translateX(-60%) rotate(20deg);
    animation: uIconShine 3.2s ease-in-out infinite;
    mix-blend-mode: screen;
    }
    .u-stat-item:hover .u-stat-icon{
    transform: translateY(-2px) scale(1.03);
    box-shadow: 0 22px 54px rgba(0,0,0,.32);
    }

    /* Numbers (with + via CSS) */
    .u-stat-number{
    display:inline-block; line-height:1;
    font-size: clamp(2.4rem, 1.5rem + 2.4vw, 3.6rem);
    font-weight: 900; color: #fbbf24;
    text-shadow: 0 0 22px rgba(251,191,36,.32);
    position: relative;
    }
    .u-stat-number::after{
    content:'+'; position: relative; top:-0.38em;
    margin-left:2px; font-size:.6em; font-weight:inherit;
    }

    /* Label */
    .u-stat-label{
    font-size: 1.05rem;
    font-weight: 700;
    opacity: .95;
    letter-spacing: .6px;
    text-transform: uppercase;
    margin-top: .25rem;
    }

    /* Responsive */
    @media (max-width: 992px){
    .u-stat-number{ font-size: clamp(2.2rem, 1.1rem + 3.5vw, 3.2rem); }
    }
    @media (max-width: 576px){
    .u-stat-item{ padding: 1.8rem; border-radius: 18px; }
    .u-stat-icon{ width:82px; height:82px; border-radius: 20px; font-size: 2rem; }
    }

    /* Reduced motion */
    @media (prefers-reduced-motion: reduce){
    .bg-aurora::before, .bg-aurora::after,
    .u-stat-icon::before,
    .u-stat-item, .u-stat-icon{ animation:none !important; transition:none !important; }
    }

    /* Keyframes */
    @keyframes uDotsFloat{
    0%,100%{ transform: translate3d(0,0,0); }
    50%{ transform: translate3d(0,8px,0); }
    }
    @keyframes uGlowSpin{
    0%{ transform: rotate(0deg); }
    100%{ transform: rotate(360deg); }
    }
    @keyframes uIconShine{
    0%{ transform: translateX(-70%) rotate(20deg); opacity: 0; }
    40%{ opacity: .85; }
    100%{ transform: translateX(70%) rotate(20deg); opacity: 0; }
    }
/* Enhanced U-STATS Section */


/* Enhanced Team Section Section */
    /* =========================================
    LEADERSHIP SECTION — Premium, Scoped & Modern
    (Foto FIT/no-crop, dark/light, underline center)
    ========================================= */

    .leadership-section, .leadership-section * { box-sizing: border-box; }

    /* Tokens (light) */
    .leadership-section{
    --ls-card-bg: rgba(255,255,255,0.9);
    --ls-card-border: rgba(124,20,21,0.12);
    --ls-card-shadow: 0 15px 40px rgba(0,0,0,0.10);

    --ls-text-muted: #6b7280;
    --ls-title-fg: inherit;

    --ls-brand-start: #7c1415;
    --ls-brand-end: #dc2626;

    --ls-overlay-grad: linear-gradient(180deg, rgba(0,0,0,0) 35%, rgba(0,0,0,.42) 100%);
    --ls-img-bg: rgba(0,0,0,.04);  /* letterbox warna saat FIT */
    --ls-aspect: 3 / 4;            /* default portrait */
    
    position: relative; isolation: isolate;
    padding: clamp(64px, 7vw, 100px) 0;
    }

    .leadership-section::before{
    content:''; position:absolute; inset:0; z-index:0; pointer-events:none;
    background:
        radial-gradient(circle at 10% 15%, rgba(124,20,21,.06), transparent 45%),
        radial-gradient(circle at 90% 85%, rgba(124,20,21,.05), transparent 50%);
    }

    /* Dark mode */
    :where(html, body)[data-bs-theme="dark"] .leadership-section,
    :where(html, body)[data-theme="dark"] .leadership-section,
    :where(html, body).dark .leadership-section{
    --ls-card-bg: rgba(20,20,22,0.55);
    --ls-card-border: rgba(220,220,220,0.12);
    --ls-card-shadow: 0 15px 40px rgba(0,0,0,0.35);
    --ls-text-muted: #9aa4b2;
    --ls-overlay-grad: linear-gradient(180deg, rgba(0,0,0,0) 35%, rgba(0,0,0,.5) 100%);
    --ls-img-bg: rgba(255,255,255,.06);
    }

    /* Header */
    .leadership-section .section-header{ text-align:center; position:relative; z-index:1; }
    .leadership-section .section-badge{
    display:inline-flex; align-items:center; gap:.6rem;
    padding:.55rem 1rem; border-radius:999px;
    background: rgba(255,255,255,.78);
    border:1px solid rgba(124,20,21,.12);
    box-shadow: 0 10px 28px rgba(0,0,0,.06);
    backdrop-filter: blur(10px);
    color:#111827; font-weight:700; margin-bottom: 18px;
    }
    .leadership-section .section-badge i{ color:#fbbf24; }
    .leadership-section .section-title{
    color: var(--ls-title-fg);
    font-weight: 900;
    font-size: clamp(1.75rem, 1.1rem + 1.9vw, 2.6rem);
    line-height: 1.15; letter-spacing: -0.02em;
    margin: 0 0 1rem; position: relative; text-wrap: balance;
    }
    .leadership-section .section-title::after{
    content:''; display:block; width:72px; height:4px; margin:.6rem auto 0; border-radius:4px;
    background: linear-gradient(90deg, var(--ls-brand-start), var(--ls-brand-end) 60%, #fbbf24 100%);
    box-shadow: 0 2px 12px rgba(220,38,38,.28);
    }
    .leadership-section .section-description{
    font-size: clamp(1rem, .95rem + .28vw, 1.12rem);
    line-height: 1.8; margin: .5rem auto 0; max-width: 68ch;
    color: var(--ls-text-muted); text-wrap: pretty; hyphens:auto;
    }

    /* Card */
    .leadership-section .leader-card{
    background: var(--ls-card-bg);
    border:1px solid var(--ls-card-border);
    border-radius: 22px;
    box-shadow: var(--ls-card-shadow);
    overflow: hidden; height: 100%;
    transition: transform .28s ease, box-shadow .28s ease, border-color .28s ease, background-color .28s ease;
    position: relative;
    }
    .leadership-section .leader-card::after{
    content:""; position:absolute; inset:0; pointer-events:none; border-radius:22px; padding:1px;
    background: linear-gradient(135deg, rgba(255,255,255,.95), rgba(255,255,255,.2));
    -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
    -webkit-mask-composite: xor; mask-composite: exclude;
    opacity:.22; transition: opacity .28s ease;
    }
    .leadership-section .leader-card:hover{
    transform: translateY(-10px);
    box-shadow: 0 26px 64px rgba(0,0,0,.22);
    border-color: rgba(124,20,21,.22);
    }
    .leadership-section .leader-card:hover::after{ opacity:.55; }

    /* Image wrapper (FIT/no-crop) */
    .leadership-section .leader-image{
    position: relative; overflow: hidden;
    aspect-ratio: var(--ls-aspect, 3 / 4);
    background: var(--ls-img-bg);
    border-radius: 20px; box-shadow: 0 18px 46px rgba(0,0,0,.18);
    display: grid; place-items: center;
    }
    .leadership-section .leader-image img{
    width: 100%; height: 100%;
    object-fit: contain !important;     /* tampil full, tanpa terpotong */
    object-position: center center;
    display: block; border-radius: inherit;
    transform: none !important;         /* cegah zoom yang bikin cropping */
    filter: none; transition: opacity .3s ease;
    }
    /* Optional: untuk card tertentu kalau mau cover */
    .leadership-section .leader-image.is-cover img{ object-fit: cover !important; }

    /* Frame glow */
    .leadership-section .leader-image::before{
    content:""; position:absolute; inset:0; border-radius:20px; padding:1px;
    background: linear-gradient(135deg, rgba(255,255,255,.85), rgba(255,255,255,.18));
    -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
    -webkit-mask-composite: xor; mask-composite: exclude;
    opacity:.28; pointer-events:none; transition: opacity .28s ease;
    }
    .leadership-section .leader-card:hover .leader-image::before{ opacity:.5; }

    /* Overlay + Social */
    .leadership-section .leader-overlay{
    position:absolute; inset:0; display:flex; align-items:flex-end; justify-content:center;
    background: var(--ls-overlay-grad);
    opacity: 0; transform: translateY(8px);
    transition: opacity .28s ease, transform .28s ease;
    padding: 1rem;
    }
    .leadership-section .leader-card:hover .leader-overlay{ opacity:1; transform: translateY(0); }

    .leadership-section .leader-social{ display:flex; gap:.6rem; margin-bottom:.25rem; }
    .leadership-section .social-link{
    width:42px; height:42px; display:inline-flex; align-items:center; justify-content:center;
    border-radius:12px; color:#fff; text-decoration:none;
    background: rgba(255,255,255,.16);
    border:1px solid rgba(255,255,255,.25);
    backdrop-filter: blur(8px);
    transition: transform .22s ease, background-color .22s ease, border-color .22s ease, box-shadow .22s ease;
    box-shadow: 0 8px 20px rgba(0,0,0,.25);
    }
    .leadership-section .social-link:hover{
    transform: translateY(-3px);
    background: linear-gradient(135deg, var(--ls-brand-start), var(--ls-brand-end));
    border-color: transparent;
    box-shadow: 0 12px 28px rgba(124,20,21,.35);
    }

    /* Content */
    .leadership-section .leader-content{ padding: 1.25rem 1.35rem 1.6rem; text-align:center; }
    .leadership-section .leader-name{
    font-size: 1.25rem; font-weight: 800; letter-spacing: -.01em; margin: .25rem 0 .15rem;
    }
    .leadership-section .leader-position{
    display:inline-block; font-weight:700; font-size:.9rem; letter-spacing:.3px;
    color:#fff; background: linear-gradient(135deg, var(--ls-brand-start), var(--ls-brand-end));
    padding:.35rem .7rem; border-radius:999px; margin-bottom:.6rem;
    box-shadow: 0 8px 20px rgba(124,20,21,.28);
    }
    .leadership-section .leader-description{
    color: var(--ls-text-muted); margin: 0; line-height: 1.7; font-size: 1rem;
    }

    /* =======================================================
    LEADERSHIP FIX — lock card = white & leader-name color
    Paste AFTER your current leadership-section CSS
    ======================================================= */

    /* 1) Paksa permukaan kartu selalu putih (light & dark) */
    .leadership-section{
    --ls-card-bg: #ffffff;                    /* always white */
    --ls-card-border: rgba(17,24,39,.08);     /* border halus */
    /* kalau mau lebih “tegas”, bisa naikin jadi .12 */
    }

    /* Dark mode: tetap putih + border sedikit lebih kontras */
    :where(html, body)[data-bs-theme="dark"] .leadership-section,
    :where(html, body)[data-theme="dark"] .leadership-section,
    :where(html, body).dark .leadership-section{
    --ls-card-bg: #ffffff;                    /* keep white */
    --ls-card-border: rgba(17,24,39,.14);     /* sedikit lebih kuat di dark */
    --ls-text-muted: #6b7280;                 /* muted sama seperti light */
    /* overlay, gradient dsb tetap mengikuti token yang lain */
    }

    /* Pastikan implementasi card mengambil var di atas */
    .leadership-section .leader-card{
    background: var(--ls-card-bg) !important; /* jaga-jaga override lain */
    border-color: var(--ls-card-border);
    }

    /* 2) Lock warna NAMA supaya tidak berubah di dark/light */
    .leadership-section .leader-card .leader-content .leader-name{
    color: #1f2937;                           /* slate-800 */
    }

    /* Redundansi spesifik di dark mode (kalau ada global force) */
    :where(html, body)[data-bs-theme="dark"] .leadership-section .leader-card .leader-content .leader-name,
    :where(html, body)[data-theme="dark"] .leadership-section .leader-card .leader-content .leader-name,
    :where(html, body).dark .leadership-section .leader-card .leader-content .leader-name{
    color: #1f2937;                           /* tetap sama di dark */
    }

    /* (Opsional) Kalau mau posisi jabatan juga stabil kontras di putih */
    .leadership-section .leader-card .leader-content .leader-position{
    /* sudah gradient brand, aman di white card */
    }

    /* Responsive */
    @media (max-width: 575.98px){
    .leadership-section .leader-card{ border-radius: 18px; }
    .leadership-section .leader-image{ aspect-ratio: 3 / 4; }
    }

    /* Reduced motion */
    @media (prefers-reduced-motion: reduce){
    .leadership-section .leader-card,
    .leadership-section .leader-overlay,
    .leadership-section .social-link{ transition: none !important; }
    .leadership-section .leader-card:hover{ transform:none !important; }
    }

/* Enhanced Team Section Section */


/* Enhanced Team Section Section */
    /* =====================================================
    CTA — Plain Premium (No Section BG, No .container)
    - scoped: .cta-section
    - dark/light aware, accessible focus rings
    - subtle luxury microinteractions
    ===================================================== */

    .cta-section, .cta-section * { box-sizing: border-box; }

    /* ---------- TOKENS (LIGHT) ---------- */
    .cta-section{
    /* Brand */
    --cta-brand-start: #7c1415;
    --cta-brand-end:   #dc2626;
    --cta-accent:      #fbbf24;

    /* Typography & surface */
    --cta-title-fg:   inherit;     /* biarkan ikut global */
    --cta-muted:      #6b7280;
    --cta-border:     rgba(17,24,39,.10);

    /* Effects */
    --cta-radius:     18px;
    --cta-gap:        16px;
    --cta-ring:       rgba(220,38,38,.22);
    --cta-soft:       0 10px 26px rgba(0,0,0,.08);

    padding: clamp(60px, 6vw, 108px) 0;
    background: transparent;       /* polos */
    color: inherit;
    }

    /* ---------- DARK MODE OVERRIDES ---------- */
    :where(html, body)[data-bs-theme="dark"] .cta-section,
    :where(html, body)[data-theme="dark"] .cta-section,
    :where(html, body).dark .cta-section{
    --cta-muted:   #9aa4b2;
    --cta-border:  rgba(255,255,255,.16);
    --cta-ring:    rgba(220,38,38,.32);
    --cta-soft:    0 16px 40px rgba(0,0,0,.36);
    }

    /* ---------- WRAP (pengganti .container) ---------- */
    .cta-section .cta-wrap{
    max-width: min(920px, 92vw);
    margin-inline: auto;
    text-align: center;
    padding: clamp(22px, 2.6vw, 38px);
    border: 1px solid var(--cta-border);
    border-radius: calc(var(--cta-radius) + 4px);
    box-shadow: var(--cta-soft);
    position: relative;
    isolation: isolate;
    transition: border-color .25s ease, box-shadow .25s ease, transform .25s ease;
    }

    /* Luxury “edge glow” tanpa background */
    .cta-section .cta-wrap::before{
    content:""; position:absolute; inset:0; border-radius: inherit; pointer-events:none;
    padding: 1px;
    background: linear-gradient(135deg, rgba(255,255,255,.85), rgba(255,255,255,.15));
    -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
    -webkit-mask-composite: xor; mask-composite: exclude;
    opacity:.22; transition: opacity .25s ease;
    }
    .cta-section .cta-wrap:hover{
    transform: translateY(-2px);
    box-shadow: 0 18px 48px rgba(0,0,0,.14);
    border-color: rgba(220,38,38,.22);
    }
    .cta-section .cta-wrap:hover::before{ opacity:.45; }

    /* ---------- ICON TILE (ring gradient, tanpa fill) ---------- */
    .cta-section .cta-icon{
    width: 90px; height: 90px; margin: 0 auto .95rem;
    display: grid; place-items: center;
    border-radius: 20px; position: relative; color: var(--cta-brand-end);
    filter: drop-shadow(0 10px 22px rgba(220,38,38,.22));
    }
    .cta-section .cta-icon::before{
    content:""; position:absolute; inset:0; border-radius: inherit; padding: 1px;
    background: linear-gradient(135deg, var(--cta-brand-start), var(--cta-brand-end));
    -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
    -webkit-mask-composite: xor; mask-composite: exclude;
    transition: transform .35s ease, opacity .35s ease;
    }
    .cta-section .cta-icon i{ font-size: 1.35rem; }
    .cta-section .cta-wrap:hover .cta-icon::before{ transform: rotate(3deg) scale(1.02); opacity:.9; }

    /* ---------- TITLE + UNDERLINE ANIM ---------- */
    .cta-section .cta-title{
    color: var(--cta-title-fg);
    font-weight: 900;
    font-size: clamp(2rem, 1.1rem + 2.3vw, 2.9rem);
    line-height: 1.12;
    letter-spacing: -0.02em;
    margin: .25rem 0 .7rem;
    text-wrap: balance;
    }
    .cta-section .cta-title::after{
    content:""; display:block; height: 4px; margin:.65rem auto 0;
    width: 78px; max-width: 32%;
    border-radius: 4px;
    background: linear-gradient(90deg, var(--cta-brand-start), var(--cta-brand-end) 60%, var(--cta-accent) 100%);
    background-size: 200% 100%;
    box-shadow: 0 2px 12px rgba(220,38,38,.28);
    transition: width .28s ease, background-position .35s ease;
    }
    .cta-section .cta-wrap:hover .cta-title::after{
    width: 110px;
    background-position: 100% 0;
    }

    /* ---------- DESCRIPTION ---------- */
    .cta-section .cta-description{
    color: var(--cta-muted);
    margin: .6rem auto 1.15rem;
    max-width: 68ch;
    line-height: 1.85;
    font-size: clamp(1rem, .96rem + .22vw, 1.14rem);
    text-wrap: pretty;
    }

    /* ---------- ACTIONS ---------- */
    .cta-section .cta-actions{
    margin-top: .9rem;
    display: inline-flex;
    gap: var(--cta-gap);
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    }

    /* ---------- BUTTONS (upgrade Bootstrap, scoped) ---------- */
    .cta-section .btn{
    --_pad-y: .9rem; --_pad-x: 1.2rem; --_radius: 14px;
    padding: var(--_pad-y) var(--_pad-x);
    border-radius: var(--_radius);
    font-weight: 800;
    letter-spacing: .2px;
    display: inline-flex; align-items: center; gap: .55rem;
    transition: transform .18s ease, box-shadow .18s ease, background .18s ease, color .18s ease, opacity .18s ease;
    position: relative;
    }

    /* Primary: dynamic gradient + sheen */
    .cta-section .btn-primary{
    color:#fff; border:0;
    background: linear-gradient(135deg, var(--cta-brand-start), var(--cta-brand-end));
    box-shadow: 0 12px 28px rgba(220,38,38,.28);
    overflow: hidden;
    }
    .cta-section .btn-primary::after{
    /* sheen tipis melintas saat hover */
    content:""; position:absolute; inset:-120% -40% auto -40%;
    height: 200%; transform: rotate(18deg); opacity:0;
    background: linear-gradient(90deg, rgba(255,255,255,.0), rgba(255,255,255,.25), rgba(255,255,255,0));
    transition: opacity .25s ease, transform .55s ease;
    }
    .cta-section .btn-primary:hover{
    transform: translateY(-2px);
    box-shadow: 0 16px 38px rgba(220,38,38,.36);
    }
    .cta-section .btn-primary:hover::after{
    opacity:.9; transform: rotate(18deg) translateX(40%);
    }

    /* Outline: gradient ring */
    .cta-section .btn-outline-primary{
    color: inherit; background: transparent; border: 0; position: relative;
    box-shadow: none;
    }
    .cta-section .btn-outline-primary::before{
    content:""; position:absolute; inset:0; border-radius: inherit; padding:1px;
    background: linear-gradient(135deg, var(--cta-brand-start), var(--cta-brand-end));
    -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
    -webkit-mask-composite: xor; mask-composite: exclude;
    transition: opacity .2s ease;
    }
    .cta-section .btn-outline-primary:hover{
    transform: translateY(-2px);
    background: rgba(0,0,0,.035);
    box-shadow: 0 10px 24px rgba(220,38,38,.18);
    }

    /* Icon nudge microinteraction */
    .cta-section .btn:hover i{ transform: translateX(2px); transition: transform .18s ease; }

    /* ---------- FOCUS STATES (aksesibel) ---------- */
    .cta-section .btn:focus-visible{
    outline: none;
    box-shadow:
        0 0 0 4px var(--cta-ring),
        0 0 0 1px rgba(255,255,255,.9) inset;
    }

    /* ---------- RESPONSIVE ---------- */
    @media (max-width: 575.98px){
    .cta-section .cta-wrap{ border-radius: 16px; padding: 20px; }
    .cta-section .cta-icon{ width: 84px; height: 84px; border-radius: 18px; }
    .cta-section .cta-title{ font-size: clamp(1.8rem, 1.2rem + 3.5vw, 2.4rem); }
    }

    /* ---------- REDUCED MOTION ---------- */
    @media (prefers-reduced-motion: reduce){
    .cta-section .cta-wrap,
    .cta-section .cta-icon::before,
    .cta-section .cta-title::after,
    .cta-section .btn,
    .cta-section .btn-primary::after{
        transition: none !important;
    }
    .cta-section .btn-primary::after{ display:none !important; }
    }

/* Enhanced Team Section Section */


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

<script>
    /*!
    * UStatsCounter v1.0 — Unique & Scoped number counter
    * - Scope via { root: selector|Element } -> hanya bekerja di dalam root itu.
    * - Atribut unik: data-ucount (target), data-ufrom, data-uduration(ms),
    *                 data-udecimals, data-ulocale, data-urepeat ("true").
    * - Hormati prefers-reduced-motion.
    */
    (function (global){
    const easeOutCubic = t => 1 - Math.pow(1 - t, 3);
    const observerByRoot = new WeakMap();

    function toNumber(val){
        if (typeof val === 'number') return val;
        if (typeof val === 'string') {
        const cleaned = val.replace(/[^\d\.\-]/g, '');
        const n = parseFloat(cleaned);
        return isNaN(n) ? 0 : n;
        }
        return 0;
    }

    function formatNumber(value, decimals, locale){
        try{
        return new Intl.NumberFormat(locale || 'id-ID', {
            minimumFractionDigits: decimals,
            maximumFractionDigits: decimals
        }).format(value);
        }catch(_){
        return (+value).toFixed(decimals || 0);
        }
    }

    function animate(el, opts){
        const target = toNumber(el.dataset.ucount);
        const from   = ('ufrom' in el.dataset) ? toNumber(el.dataset.ufrom) : 0;
        const dur    = ('uduration' in el.dataset) ? +el.dataset.uduration : 1800;
        const dec    = ('udecimals' in el.dataset) ? +el.dataset.udecimals : 0;
        const loc    = el.dataset.ulocale || 'id-ID';

        const reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (reduce || dur <= 0){
        el.textContent = formatNumber(target, dec, loc);
        el.setAttribute('data-ucounted', 'true');
        return;
        }

        el.textContent = formatNumber(from, dec, loc);
        const start = performance.now();

        function tick(now){
        const t = Math.min(1, (now - start) / dur);
        const eased = easeOutCubic(t);
        const val = from + (target - from) * eased;
        el.textContent = formatNumber(val, dec, loc);
        if (t < 1) requestAnimationFrame(tick);
        else {
            el.textContent = formatNumber(target, dec, loc);
            el.setAttribute('data-ucounted', 'true');
        }
        }
        requestAnimationFrame(tick);
    }

    function init(options){
        const rootOpt = options && options.root ? options.root : '[data-ustats-scope]';
        const root = (typeof rootOpt === 'string') ? document.querySelector(rootOpt) : rootOpt;
        if (!root) return;

        const nodes = root.querySelectorAll('.u-stat-number[data-ucount]');
        if (!nodes.length) return;

        // re-use observer per root (supaya gak dobel)
        if (observerByRoot.has(root)){
        const obs = observerByRoot.get(root);
        nodes.forEach(n => { if (!n.hasAttribute('data-ucounted')) obs.observe(n); });
        return;
        }

        const io = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            const el = entry.target;
            if (el.getAttribute('data-ucounted') === 'true') { obs.unobserve(el); return; }
            animate(el);
            if (el.dataset.urepeat === 'true'){
            // biar bisa repeat saat keluar-masuk viewport
            el.removeAttribute('data-ucounted');
            } else {
            obs.unobserve(el);
            }
        });
        }, { threshold: 0.35, rootMargin: '0px 0px -10% 0px' });

        nodes.forEach(n => io.observe(n));
        observerByRoot.set(root, io);
    }

    global.UStatsCounter = { init, animate };
    })(window);

    // Auto-init kalau ada section dengan data-ustats-scope
    document.addEventListener('DOMContentLoaded', () => {
    const autoRoot = document.querySelector('[data-ustats-scope="home-stats-01"]');
    if (autoRoot) UStatsCounter.init({ root: autoRoot });
    });
</script>

@endsection
