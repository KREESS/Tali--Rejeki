@extends('components.layout')

@section('title', 'Distributor Insulasi Industri Terpercaya')

@section('content')
<!-- Hero Section -->
<section class="hero-section" aria-label="Tali Rejeki Hero">
  <!-- Background asli (TIDAK DIUBAH) -->
  <div class="hero-bg">
    <div class="hero-overlay"></div>
    <div class="hero-particles">
      <div class="particle"></div><div class="particle"></div><div class="particle"></div><div class="particle"></div>
      <div class="particle"></div><div class="particle"></div><div class="particle"></div><div class="particle"></div>
      <div class="particle"></div><div class="particle"></div>
    </div>
  </div>

  <!-- Slider wrapper -->
  <!-- data-interval = waktu tampil sebelum mulai animasi keluar (auto) -->
  <div class="hero-slider" data-autoplay="true" data-interval="4200">
    <!-- Slide 1 -->
    <article id="slide-1" class="hero-slide is-active" data-index="0" aria-roledescription="slide" aria-label="1 dari 3"
             style="--slide-bg: url('{{ asset("img/hero/1.jpg") }}');">
      <div class="slide-bg" aria-hidden="true"></div>
      <div class="slide-scrim" aria-hidden="true"></div>

      <div class="hero-inner">
        <div class="hero-content anim-in">
          <div class="hero-badge hc hc-1">
            <i class="fas fa-award" aria-hidden="true"></i>
            <span data-translate="hero-badge">Distributor Terpercaya Sejak 2011</span>
          </div>
          <h1 class="hero-title hc hc-2">
            <span class="highlight">Tali Rejeki</span>
            <span class="subtitle" data-translate="hero-title-line1">Distributor Insulasi Industri</span>
          </h1>
          <p class="hero-description hc hc-3" data-translate="hero-description">
            Glasswool • Rockwool • Nitrile Rubber • Aksesoris HVAC terlengkap di Indonesia.
          </p>
          <div class="hero-actions hc hc-4">
            <a href="#products" class="btn btn-primary"><i class="fas fa-cubes"></i> Lihat Produk</a>
            <a href="#contact" class="btn btn-outline"><i class="fas fa-phone"></i> Hubungi Kami</a>
          </div>
        </div>
      </div>
    </article>

    <!-- Slide 2 -->
    <article id="slide-2" class="hero-slide" data-index="1" aria-roledescription="slide" aria-label="2 dari 3"
             style="--slide-bg: url('{{ asset("img/hero/1.jpg") }}');">
      <div class="slide-bg" aria-hidden="true"></div>
      <div class="slide-scrim" aria-hidden="true"></div>

      <div class="hero-inner">
        <div class="hero-content">
          <div class="hero-badge hc hc-1">
            <i class="fas fa-fire" aria-hidden="true"></i>
            <span>Glasswool & Rockwool</span>
          </div>
          <h2 class="hero-title hc hc-2">
            <span class="highlight">Insulasi Termal</span>
            <span class="subtitle">Efisien & Tahan Lama</span>
          </h2>
          <p class="hero-description hc hc-3">
            Kurangi kehilangan panas, tingkatkan efisiensi energi & kenyamanan akustik.
          </p>
          <div class="hero-actions hc hc-4">
            <a href="#products" class="btn btn-primary"><i class="fas fa-cubes"></i> Lihat Produk</a>
            <a href="#contact" class="btn btn-outline"><i class="fas fa-phone"></i> Konsultasi Gratis</a>
          </div>
        </div>
      </div>
    </article>

    <!-- Slide 3 -->
    <article id="slide-3" class="hero-slide" data-index="2" aria-roledescription="slide" aria-label="3 dari 3"
             style="--slide-bg: url('{{ asset("img/hero/1.jpg") }}');">
      <div class="slide-bg" aria-hidden="true"></div>
      <div class="slide-scrim" aria-hidden="true"></div>

      <div class="hero-inner">
        <div class="hero-content">
          <div class="hero-badge hc hc-1">
            <i class="fas fa-tools" aria-hidden="true"></i>
            <span>Nitrile Rubber & Aksesoris HVAC</span>
          </div>
          <h2 class="hero-title hc hc-2">
            <span class="highlight">Solusi HVAC</span>
            <span class="subtitle">Lengkap & Siap Kirim</span>
          </h2>
          <p class="hero-description hc hc-3">
            Pipa insulasi, ducting, adhesive, dan aksesoris pendukung — pengiriman cepat ke 50+ kota.
          </p>
          <div class="hero-actions hc hc-4">
            <a href="#products" class="btn btn-primary"><i class="fas fa-cubes"></i> Lihat Katalog</a>
            <a href="#contact" class="btn btn-outline"><i class="fas fa-phone"></i> Hubungi Sales</a>
          </div>
        </div>
      </div>
    </article>

    <!-- Navigation (pojok kanan bawah) -->
    <div class="hero-nav">
      <button class="hero-prev" aria-label="Slide sebelumnya" title="Sebelumnya" type="button">
        <svg viewBox="0 0 24 24" width="22" height="22" aria-hidden="true"><path d="M15 18l-6-6 6-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </button>
      <button class="hero-next" aria-label="Slide berikutnya" title="Berikutnya" type="button">
        <svg viewBox="0 0 24 24" width="22" height="22" aria-hidden="true"><path d="M9 6l6 6-6 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </button>
    </div>

    <!-- Dots -->
    <div class="hero-dots" role="tablist" aria-label="Navigasi slide">
      <button class="dot is-active" role="tab" aria-selected="true" aria-controls="slide-1" title="Slide 1"></button>
      <button class="dot" role="tab" aria-selected="false" aria-controls="slide-2" title="Slide 2"></button>
      <button class="dot" role="tab" aria-selected="false" aria-controls="slide-3" title="Slide 3"></button>
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
/* main Section */

    /* =========================
    GLOBAL / NON-HERO STYLES
    ========================= */

    /* Buttons (dipakai lintas section) */
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

    /* Section Styles (umum) */
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

    /* Preferensi aksesibilitas */
    @media (prefers-reduced-motion: reduce) {
        * {
            animation: none !important;
            transition: none !important;
            scroll-behavior: auto !important;
        }
    }
/* main Section */

/* Hero Section */
  :root{
    /* timing & easing */
    --slide-fade-dur: 1300ms;             /* crossfade antar slide (gambar & slide) */
    --img-zoom-dur:   7000ms;             /* ken-burns */
    --img-fade-dur:   900ms;              /* tambahan fade bg */
    --text-in-dur:     760ms;
    --text-out-dur:    520ms;
    --stagger-step:    120ms;
    --ease-out: cubic-bezier(.17,.84,.44,1);
    --ease-in:  cubic-bezier(.64,0,.35,1);
  }

  /* =========================
     HERO SECTION (FULL BG SLIDER)
     ========================= */

  .hero-section{position:relative;min-height:100vh;min-height:80svh;overflow:hidden;display:block;isolation:isolate;}

  /* BG asli — TIDAK diubah */
  .hero-bg{position:absolute;inset:0;background:url('{{ asset("img/bg/bg-texture.webp") }}');background-size:cover;background-position:center;background-attachment:fixed;background-repeat:no-repeat;z-index:-3;transition:all .3s ease;}
  body.light-theme .hero-bg{background:url('{{ asset("img/bg/bg-texture-white.webp") }}');background-size:cover;background-position:center;background-attachment:fixed;background-repeat:no-repeat;}
  body.dark-theme .hero-bg{background:url('{{ asset("img/bg/bg-texture.webp") }}');background-size:cover;background-position:center;background-attachment:fixed;background-repeat:no-repeat;}
  .hero-overlay{position:absolute;inset:0;background:transparent;z-index:-1;}
  .hero-particles{position:absolute;inset:0;z-index:-2;}
  .hero-particles .particle{position:absolute;background:rgba(255,255,255,.1);border-radius:50%;animation:heroFloat 8s ease-in-out infinite;}
  .hero-particles .particle:nth-child(1){width:20px;height:20px;left:10%;top:20%;animation-delay:0s;}
  .hero-particles .particle:nth-child(2){width:15px;height:15px;left:80%;top:60%;animation-delay:2s;}
  .hero-particles .particle:nth-child(3){width:25px;height:25px;left:60%;top:30%;animation-delay:4s;}
  .hero-particles .particle:nth-child(4){width:12px;height:12px;left:30%;top:70%;animation-delay:1s;}
  .hero-particles .particle:nth-child(6){width:14px;height:14px;left:5%;top:80%;animation-delay:2.5s;}
  .hero-particles .particle:nth-child(7){width:22px;height:22px;left:75%;top:15%;animation-delay:3.5s;}
  .hero-particles .particle:nth-child(8){width:16px;height:16px;left:40%;top:85%;animation-delay:4.5s;}
  .hero-particles .particle:nth-child(9){width:13px;height:13px;left:90%;top:40%;animation-delay:5s;}
  .hero-particles .particle:nth-child(10){width:19px;height:19px;left:15%;top:10%;animation-delay:6s;}
  @keyframes heroFloat{0%,100%{transform:translateY(0) rotate(0);opacity:.3;}50%{transform:translateY(-20px) rotate(180deg);opacity:.8;}}

  /* Slider core */
  .hero-slider{position:relative;width:100%;height:100vh;height:90svh;}
  .hero-slide{
    position:absolute;inset:0;display:grid;place-items:stretch;
    opacity:0;pointer-events:none;transform:translateX(2%);
    transition:
      opacity var(--slide-fade-dur) var(--ease-out),
      transform var(--slide-fade-dur) var(--ease-out);
    z-index:0;
  }
  .hero-slide.is-active{opacity:1;pointer-events:auto;transform:translateX(0);z-index:1;}

  /* Fullscreen slide background + ken burns + fade halus */
  .slide-bg{
    position:absolute;inset:0;background-image:var(--slide-bg);background-size:cover;background-position:center;
    transform:scale(1.02) translateY(-2vh);
    transition:
      transform var(--img-zoom-dur) linear,
      opacity var(--img-fade-dur) var(--ease-out);
    z-index:-1;opacity:.96;will-change:transform,opacity;
  }
  .hero-slide.is-active .slide-bg{transform:scale(1.09) translateY(-2vh);opacity:1;}
  .slide-scrim{position:absolute;inset:0;background:radial-gradient(1200px 600px at 70% 30%, rgba(0,0,0,.15), transparent 60%),linear-gradient(180deg, rgba(0,0,0,.55), rgba(0,0,0,.55));z-index:0;}

  /* Konten: atas & kiri */
  .hero-inner{position:relative;z-index:1;min-height:100vh;min-height:100svh;display:grid;align-items:start;justify-items:start;padding:clamp(24px,3vw,40px);padding-top:clamp(32px,120vh,120px);}
  .hero-content{color:#fff;max-width:920px;text-align:left;margin-left:clamp(8px,6vw,72px);}

  .hero-badge{display:inline-flex;align-items:center;gap:8px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.2);border-radius:999px;padding:8px 18px;font-size:14px;font-weight:700;margin-bottom:16px;backdrop-filter:blur(10px);}
  .hero-title{margin:0 0 8px;line-height:1.1;display:grid;gap:6px;}
  .hero-title .highlight{font-size:clamp(28px,5vw,60px);font-weight:900;background:linear-gradient(135deg,#ff6b6b,#ffd93d);-webkit-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent;}
  .hero-title .subtitle{font-size:clamp(16px,2.2vw,26px);font-weight:700;opacity:.96;}
  .hero-description{margin:10px 0 18px;font-size:clamp(14px,1.6vw,18px);line-height:1.7;opacity:.95;max-width:760px;}
  .hero-actions{display:flex;gap:14px;flex-wrap:wrap;justify-content:flex-start;}
  .btn{display:inline-flex;align-items:center;gap:10px;padding:14px 22px;border-radius:12px;font-weight:800;text-decoration:none;border:2px solid transparent;transition:.18s ease;}
  .btn-primary{background:linear-gradient(135deg,#ff6b6b,#ffd93d);color:#222;box-shadow:0 10px 30px rgba(255,107,107,.32);}
  .btn-primary:hover{transform:translateY(-2px);box-shadow:0 14px 36px rgba(255,107,107,.42);}
  .btn-outline{background:rgba(255,255,255,.08);color:#fff;border-color:rgba(255,255,255,.28);backdrop-filter:blur(8px);}
  .btn-outline:hover{background:rgba(255,255,255,.16);border-color:rgba(255,255,255,.5);transform:translateY(-2px);}

  /* NAV: pojok kanan bawah */
  .hero-nav{position:absolute;right:22px;bottom:22px;display:flex;gap:10px;z-index:2;}
  .hero-prev,.hero-next{border:none;background:rgba(0,0,0,.28);color:#fff;width:44px;height:44px;border-radius:999px;display:grid;place-items:center;backdrop-filter:blur(4px);transition:.2s ease;cursor:pointer;}
  .hero-prev:hover,.hero-next:hover{background:rgba(0,0,0,.45);transform:translateY(-1px);}
  .hero-prev:focus-visible,.hero-next:focus-visible{outline:2px solid #ffd93d;outline-offset:2px;}

  /* Dots */
  .hero-dots{position:absolute;left:50%;transform:translateX(-50%);bottom:22px;display:flex;gap:8px;z-index:2;}
  .hero-dots .dot{width:10px;height:10px;border-radius:999px;background:rgba(255,255,255,.45);border:none;cursor:pointer;transition:.2s ease;padding:0;}
  .hero-dots .dot.is-active{width:26px;border-radius:8px;background:#ffd93d;}
  .hero-dots .dot:focus-visible{outline:2px solid #ffd93d;outline-offset:2px;}

  /* ========== TEKS ANIMASI (IN/OUT + STAGGER) ========== */
  .hc{will-change:transform,opacity;}
  @keyframes inUp{from{opacity:0;transform:translateY(12px)}to{opacity:1;transform:translateY(0)}}
  @keyframes outDown{from{opacity:1;transform:translateY(0)}to{opacity:0;transform:translateY(12px)}}

  /* masuk: 1->2->3->4 */
  .hero-content.anim-in .hc-1{animation:inUp var(--text-in-dur) var(--ease-out) both;animation-delay:calc(0 * var(--stagger-step));}
  .hero-content.anim-in .hc-2{animation:inUp var(--text-in-dur) var(--ease-out) both;animation-delay:calc(1 * var(--stagger-step));}
  .hero-content.anim-in .hc-3{animation:inUp var(--text-in-dur) var(--ease-out) both;animation-delay:calc(2 * var(--stagger-step));}
  .hero-content.anim-in .hc-4{animation:inUp var(--text-in-dur) var(--ease-out) both;animation-delay:calc(3 * var(--stagger-step));}

  /* keluar: 4->3->2->1 (dipakai saat auto) */
  .hero-content.anim-out .hc-4{animation:outDown var(--text-out-dur) var(--ease-in) both;animation-delay:calc(0 * var(--stagger-step));}
  .hero-content.anim-out .hc-3{animation:outDown var(--text-out-dur) var(--ease-in) both;animation-delay:calc(1 * var(--stagger-step));}
  .hero-content.anim-out .hc-2{animation:outDown var(--text-out-dur) var(--ease-in) both;animation-delay:calc(2 * var(--stagger-step));}
  .hero-content.anim-out .hc-1{animation:outDown var(--text-out-dur) var(--ease-in) both;animation-delay:calc(3 * var(--stagger-step));}

  /* hide cepat teks (untuk manual skip) */
  .hero-content.quick-hide{opacity:0;transition:opacity 220ms ease;}

  /* Mobile tweaks */
  @media (max-width: 992px){
    .hero-inner{padding-top:clamp(24px,8vh,80px);}
    .hero-content{margin-left:clamp(8px,4vw,40px);}
  }

  /* iOS bg-attachment fix */
  @supports (-webkit-touch-callout: none){.hero-bg{background-attachment:scroll;}}

  /* Reduce motion */
  @media (prefers-reduced-motion: reduce){
    *{animation-duration:.001ms !important;animation-iteration-count:1 !important;transition-duration:.001ms !important;}
    .slide-bg{transform:none !important;}
  }
/* Hero Section */








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
<script>
  // =========================
  // HERO SLIDER LOGIC
  // - AUTO: teks OUT dulu → crossfade → teks IN
  // - MANUAL next/prev/dot: LANGSUNG crossfade (skip OUT), teks IN slide baru
  // =========================
  (function () {
    const slider = document.querySelector('.hero-slider');
    if (!slider) return;

    const slides = Array.from(slider.querySelectorAll('.hero-slide'));
    const prevBtn  = slider.querySelector('.hero-prev');
    const nextBtn  = slider.querySelector('.hero-next');
    const dots     = Array.from(slider.querySelectorAll('.hero-dots .dot'));

    // sinkron dengan CSS
    const STAGGER_STEP  = 120;
    const TEXT_IN       = 760;
    const TEXT_OUT      = 520;
    const SLIDE_FADE    = 1300;
    const OUT_TOTAL     = TEXT_OUT + (STAGGER_STEP * 3);
    const AUTOPLAY_VIEW = parseInt(slider.getAttribute('data-interval') || '4200', 10);

    let index = 0;
    let schedule = null;
    let isAnimating = false;
    const autoplay = slider.getAttribute('data-autoplay') === 'true';

    function updateDots(i){
      dots.forEach((d, di) => {
        d.classList.toggle('is-active', di === i);
        d.setAttribute('aria-selected', di === i ? 'true' : 'false');
      });
    }

    function showImmediately(i){
      index = (i + slides.length) % slides.length;
      slides.forEach((s, si) => s.classList.toggle('is-active', si === index));
      const activeContent = slides[index].querySelector('.hero-content');
      activeContent.classList.remove('anim-out','quick-hide');
      void activeContent.offsetWidth;
      activeContent.classList.add('anim-in');
      updateDots(index);
    }

    function goToAuto(nextIndex, onDone){
      if (isAnimating) return;
      nextIndex = (nextIndex + slides.length) % slides.length;
      if (nextIndex === index){ onDone && onDone(); return; }
      isAnimating = true;

      const current = slides[index];
      const next    = slides[nextIndex];
      const currC   = current.querySelector('.hero-content');
      const nextC   = next.querySelector('.hero-content');

      // teks keluar (stagger)
      currC.classList.remove('anim-in','quick-hide');
      void currC.offsetWidth;
      currC.classList.add('anim-out');

      setTimeout(() => {
        // crossfade slide
        current.classList.remove('is-active');
        next.classList.add('is-active');

        // teks masuk slide baru
        nextC.classList.remove('anim-out','quick-hide');
        void nextC.offsetWidth;
        nextC.classList.add('anim-in');

        updateDots(nextIndex);
        index = nextIndex;

        setTimeout(() => {
          isAnimating = false;
          onDone && onDone();
        }, Math.max(SLIDE_FADE, TEXT_IN + (STAGGER_STEP * 3)));
      }, OUT_TOTAL);
    }

    function goToManual(nextIndex, onDone){
      if (isAnimating) return;
      nextIndex = (nextIndex + slides.length) % slides.length;
      if (nextIndex === index){ onDone && onDone(); return; }
      isAnimating = true;

      const current = slides[index];
      const next    = slides[nextIndex];
      const currC   = current.querySelector('.hero-content');
      const nextC   = next.querySelector('.hero-content');

      // skip OUT: sembunyikan teks lama cepat (biar rapi)
      currC.classList.remove('anim-in','anim-out');
      currC.classList.add('quick-hide');

      // langsung crossfade slide
      next.classList.add('is-active');       // fade-in
      // biarkan current fade-out via remove setelah rAF utk overlap halus
      requestAnimationFrame(() => {
        current.classList.remove('is-active');
      });

      // teks baru: anim-in
      nextC.classList.remove('anim-out','quick-hide');
      void nextC.offsetWidth;
      nextC.classList.add('anim-in');

      updateDots(nextIndex);
      index = nextIndex;

      // lock sebentar selama crossfade agar spamming tidak glitch
      setTimeout(() => {
        isAnimating = false;
        onDone && onDone();
      }, SLIDE_FADE * 0.9);
    }

    // Autoplay pakai chain timeout (display → transisi → schedule lagi)
    function startAutoplay(){
      if (!autoplay) return;
      stopAutoplay();
      schedule = setTimeout(function tick(){
        goToAuto(index + 1, () => {
          schedule = setTimeout(tick, AUTOPLAY_VIEW);
        });
      }, AUTOPLAY_VIEW);
    }
    function stopAutoplay(){ if (schedule) clearTimeout(schedule); schedule = null; }

    // Events
    nextBtn.addEventListener('click', () => { stopAutoplay(); goToManual(index + 1, startAutoplay); });
    prevBtn.addEventListener('click', () => { stopAutoplay(); goToManual(index - 1, startAutoplay); });
    dots.forEach((dot, di) => dot.addEventListener('click', () => { stopAutoplay(); goToManual(di, startAutoplay); }));

    // Keyboard
    slider.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowRight') { stopAutoplay(); goToManual(index + 1, startAutoplay); }
      if (e.key === 'ArrowLeft')  { stopAutoplay(); goToManual(index - 1, startAutoplay); }
    });

    // Hover/focus
    slider.addEventListener('mouseenter', stopAutoplay);
    slider.addEventListener('mouseleave', startAutoplay);
    slider.addEventListener('focusin', stopAutoplay);
    slider.addEventListener('focusout', startAutoplay);

    // Touch swipe
    let touchStartX = 0, touchDeltaX = 0;
    slider.addEventListener('touchstart', (e) => { touchStartX = e.touches[0].clientX; touchDeltaX = 0; stopAutoplay(); }, {passive:true});
    slider.addEventListener('touchmove',  (e) => { touchDeltaX = e.touches[0].clientX - touchStartX; }, {passive:true});
    slider.addEventListener('touchend',   () => {
      const threshold = 50;
      if (touchDeltaX > threshold) goToManual(index - 1, startAutoplay);
      else if (touchDeltaX < -threshold) goToManual(index + 1, startAutoplay);
      else startAutoplay();
    });

    // Start
    showImmediately(0);
    startAutoplay();
  })();
</script>
@endsection