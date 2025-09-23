@extends('components.layout')

@section('title', 'Distributor Insulasi Industri Terpercaya')

@section('content')
<!-- Hero Section (Improved) -->
<section class="hero-section" aria-label="Tali Rejeki Hero">
  <!-- Background asli (TIDAK DIUBAH) -->
  <div class="hero-bg">
    <div class="hero-overlay"></div>
    <div class="hero-particles" aria-hidden="true">
      <div class="particle"></div><div class="particle"></div><div class="particle"></div><div class="particle"></div>
      <div class="particle"></div><div class="particle"></div><div class="particle"></div><div class="particle"></div>
      <div class="particle"></div><div class="particle"></div>
    </div>
  </div>

  <!-- Slider wrapper -->
  <!-- data-interval = waktu tampil sebelum mulai animasi keluar (auto) -->
  <div class="hero-slider" data-autoplay="true" data-interval="5600" aria-roledescription="carousel" aria-live="polite">
    <!-- Slide 1 -->
    <article id="slide-1" class="hero-slide is-active" data-index="0" data-align="left" data-ken="right"
             aria-roledescription="slide" aria-label="1 dari 3"
             style="--slide-bg: url('{{ asset("img/hero/3.png") }}');">
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
    <article id="slide-2" class="hero-slide" data-index="1" data-align="center" data-ken="left"
             aria-roledescription="slide" aria-label="2 dari 3"
             style="--slide-bg: url('{{ asset("img/hero/158.png") }}');">
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
    <article id="slide-3" class="hero-slide" data-index="2" data-align="right" data-ken="up"
             aria-roledescription="slide" aria-label="3 dari 3"
             style="--slide-bg: url('{{ asset("img/hero/7.jpg") }}');">
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



<!-- Products Section (6 items, square images, no bg, no cards) -->
<section id="products" class="products-section">
  <div class="container">
    <div class="section-header">
      <div class="section-badge">
        <i class="fas fa-cubes"></i>
        <span>Produk Unggulan</span>
      </div>
      <h2 class="section-title">Solusi Insulasi Terlengkap</h2>
      <p class="section-description">
        Pilihan material insulasi berkualitas untuk kebutuhan industri Anda
      </p>
    </div>

    <div class="row product-grid">
      <!-- ROCKWOOL -->
      <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
        <div class="product-item">
          <a class="pi-thumb" href="{{ url('/products/rockwool') }}" aria-label="Detail ROCKWOOL">
            <picture>
              <source srcset="{{ asset('img/landing/1.png') }}" type="image/webp">
              <img src="{{ asset('img/landing/1.png') }}" alt="ROCKWOOL" loading="lazy" decoding="async">
            </picture>
          </a>
          <h3 class="pi-title">ROCKWOOL</h3>
          <p class="pi-desc">Serat batu dengan ketahanan api tinggi dan performa akustik yang baik.</p>
          <ul class="pi-features">
            <li><i class="fas fa-check"></i> Tidak mudah terbakar</li>
            <li><i class="fas fa-check"></i> Reduksi panas & suara</li>
            <li><i class="fas fa-check"></i> Cocok untuk HVAC & industri</li>
          </ul>
          <a href="{{ url('/products/rockwool') }}" class="pi-link">Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>

      <!-- GLASSWOOL -->
      <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
        <div class="product-item">
          <a class="pi-thumb" href="{{ url('/products/glasswool') }}" aria-label="Detail GLASSWOOL">
            <picture>
              <source srcset="{{ asset('img/products/glasswool.webp') }}" type="image/webp">
              <img src="{{ asset('img/products/glasswool.jpg') }}" alt="GLASSWOOL" loading="lazy" decoding="async">
            </picture>
          </a>
          <h3 class="pi-title">GLASSWOOL</h3>
          <p class="pi-desc">Serat kaca ringan untuk insulasi termal & akustik, mudah diaplikasi.</p>
          <ul class="pi-features">
            <li><i class="fas fa-check"></i> Ringan & elastis</li>
            <li><i class="fas fa-check"></i> Kedap suara</li>
            <li><i class="fas fa-check"></i> Tahan jamur & karat</li>
          </ul>
          <a href="{{ url('/products/glasswool') }}" class="pi-link">Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>

      <!-- CALCIUM SILICATE -->
      <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
        <div class="product-item">
          <a class="pi-thumb" href="{{ url('/products/calcium-silicate') }}" aria-label="Detail CALCIUM SILICATE">
            <picture>
              <source srcset="{{ asset('img/products/calcium-silicate.webp') }}" type="image/webp">
              <img src="{{ asset('img/products/calcium-silicate.jpg') }}" alt="CALCIUM SILICATE" loading="lazy" decoding="async">
            </picture>
          </a>
          <h3 class="pi-title">CALCIUM SILICATE</h3>
          <p class="pi-desc">Papan/blok isolasi rigid untuk suhu tinggi dengan kekuatan tekan baik.</p>
          <ul class="pi-features">
            <li><i class="fas fa-check"></i> Stabil pada suhu tinggi</li>
            <li><i class="fas fa-check"></i> Kuat & tahan lembab</li>
            <li><i class="fas fa-check"></i> Umur pakai panjang</li>
          </ul>
          <a href="{{ url('/products/calcium-silicate') }}" class="pi-link">Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>

      <!-- CERAMIC FIBER -->
      <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
        <div class="product-item">
          <a class="pi-thumb" href="{{ url('/products/ceramic-fiber') }}" aria-label="Detail CERAMIC FIBER">
            <picture>
              <source srcset="{{ asset('img/products/ceramic-fiber.webp') }}" type="image/webp">
              <img src="{{ asset('img/products/ceramic-fiber.jpg') }}" alt="CERAMIC FIBER" loading="lazy" decoding="async">
            </picture>
          </a>
          <h3 class="pi-title">CERAMIC FIBER</h3>
          <p class="pi-desc">Blanket/board tahan temperatur sangat tinggi, ringan dan efisien.</p>
          <ul class="pi-features">
            <li><i class="fas fa-check"></i> Tahan thermal shock</li>
            <li><i class="fas fa-check"></i> Konduktivitas rendah</li>
            <li><i class="fas fa-check"></i> Bobot ringan</li>
          </ul>
          <a href="{{ url('/products/ceramic-fiber') }}" class="pi-link">Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>

      <!-- ARMAFLEX -->
      <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
        <div class="product-item">
          <a class="pi-thumb" href="{{ url('/products/armaflex') }}" aria-label="Detail ARMAFLEX">
            <picture>
              <source srcset="{{ asset('img/products/armaflex.webp') }}" type="image/webp">
              <img src="{{ asset('img/products/armaflex.jpg') }}" alt="ARMAFLEX" loading="lazy" decoding="async">
            </picture>
          </a>
          <h3 class="pi-title">ARMAFLEX</h3>
          <p class="pi-desc">Elastomeric foam untuk pipa AC & chiller dengan penghalang uap efektif.</p>
          <ul class="pi-features">
            <li><i class="fas fa-check"></i> Cegah kondensasi</li>
            <li><i class="fas fa-check"></i> Fleksibel & rapi</li>
            <li><i class="fas fa-check"></i> Tahan lembab</li>
          </ul>
          <a href="{{ url('/products/armaflex') }}" class="pi-link">Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>

      <!-- POLYURETHANE -->
      <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
        <div class="product-item">
          <a class="pi-thumb" href="{{ url('/products/polyurethane') }}" aria-label="Detail POLYURETHANE">
            <picture>
              <source srcset="{{ asset('img/products/polyurethane.webp') }}" type="image/webp">
              <img src="{{ asset('img/products/polyurethane.jpg') }}" alt="POLYURETHANE" loading="lazy" decoding="async">
            </picture>
          </a>
          <h3 class="pi-title">POLYURETHANE</h3>
          <p class="pi-desc">PU/PIR foam untuk panel & pipa—insulasi termal sangat efisien.</p>
          <ul class="pi-features">
            <li><i class="fas fa-check"></i> Konduktivitas rendah</li>
            <li><i class="fas fa-check"></i> Ringan & kuat</li>
            <li><i class="fas fa-check"></i> Serbaguna</li>
          </ul>
          <a href="{{ url('/products/polyurethane') }}" class="pi-link">Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i></a>
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
    --slide-fade-dur: 1600ms;             /* crossfade antar slide (gambar & slide) */
    --img-zoom-dur:   14000ms;            /* ken-burns baru: lebih lambat & halus */
    --img-fade-dur:   1100ms;             /* tambahan fade bg */
    --text-in-dur:     880ms;
    --text-out-dur:    560ms;
    --stagger-step:    140ms;
    --ease-out: cubic-bezier(.17,.84,.44,1);
    --ease-in:  cubic-bezier(.64,0,.35,1);
    --ease-ken: cubic-bezier(.22,.61,.36,1); /* ease yang halus dan mewah */
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
    .hero-slider{position:relative;width:100%;height:min(100vh,90svh);}
    .hero-slide{
    position:absolute;inset:0;display:grid;place-items:stretch;
    opacity:0;pointer-events:none;transform:translateX(1.6%);
    transition:
        opacity var(--slide-fade-dur) var(--ease-out),
        transform var(--slide-fade-dur) var(--ease-out);
    z-index:0;
    }
    .hero-slide.is-active{opacity:1;pointer-events:auto;transform:translateX(0);z-index:1;}

    /* Fullscreen slide background + ken burns + fade halus */
    .slide-bg{
    position:absolute;inset:0;background-image:var(--slide-bg);background-size:cover;background-position:center;
    transform:scale(1.04) translateY(-1vh);
    opacity:.94;filter:saturate(.96) contrast(.98);
    transition: opacity var(--img-fade-dur) var(--ease-out), filter 1200ms var(--ease-ken);
    z-index:-1;will-change:transform,opacity,filter;
    }
    /* animasi ken-burns baru (arah bervariasi per slide) */
    .hero-slide[data-ken="right"].is-active .slide-bg{animation:ken-pan-right var(--img-zoom-dur) var(--ease-ken) both;}
    .hero-slide[data-ken="left"].is-active  .slide-bg{animation:ken-pan-left  var(--img-zoom-dur) var(--ease-ken) both;}
    .hero-slide[data-ken="up"].is-active    .slide-bg{animation:ken-pan-up    var(--img-zoom-dur) var(--ease-ken) both;}
    .hero-slide[data-ken="down"].is-active  .slide-bg{animation:ken-pan-down  var(--img-zoom-dur) var(--ease-ken) both;}

    @keyframes ken-pan-right{0%{transform:scale(1.04) translateX(-1.8%) translateY(-1vh)}100%{transform:scale(1.12) translateX(2.2%) translateY(-1vh)}}
    @keyframes ken-pan-left {0%{transform:scale(1.04) translateX( 1.8%) translateY(-1vh)}100%{transform:scale(1.12) translateX(-2.2%) translateY(-1vh)}}
    @keyframes ken-pan-up   {0%{transform:scale(1.04) translateY( 1.4vh)}100%{transform:scale(1.12) translateY(-2.0vh)}}
    @keyframes ken-pan-down {0%{transform:scale(1.04) translateY(-1.4vh)}100%{transform:scale(1.12) translateY( 2.0vh)}}

    /* scrim/vignette lebih mewah */
    .slide-scrim{position:absolute;inset:0;background:
    radial-gradient(1200px 600px at 68% 32%, rgba(0,0,0,.20), transparent 62%),
    linear-gradient(180deg, rgba(0,0,0,.55), rgba(0,0,0,.55));
    z-index:0;opacity:.98;}

    /* Layout konten adaptif: kiri / tengah / kanan */
    .hero-inner{
    position:relative; z-index:1;
    min-height:100svh; display:grid;
    /* kalau ingin nempel dari atas, ubah center -> start */
    align-items:start;               
    justify-items:start;

    padding-inline: clamp(16px,3.5vw,64px);
    padding-top:    clamp(60px,102vh,160px);  /* <= JARAK ATAS */
    padding-bottom: clamp(24px,6vh,96px);   /* opsional */
    }
    .hero-slide[data-align="left"]  .hero-inner{justify-items:start;}
    .hero-slide[data-align="center"].is-active .hero-inner{justify-items:center;}
    .hero-slide[data-align="right"].is-active  .hero-inner{justify-items:end;}

    .hero-content{color:#fff;max-width:min(960px,90vw);text-align:left;background:transparent;border:none;box-shadow:none;backdrop-filter:none;padding:0;margin:0;}
    .hero-slide[data-align="center"] .hero-content{text-align:center;}
    .hero-slide[data-align="right"]  .hero-content{text-align:right;}
    .hero-slide[data-align="center"] .hero-content{text-align:center;}
    .hero-slide[data-align="right"]  .hero-content{text-align:right;}

    .hero-badge{display:inline-flex;align-items:center;gap:8px;background:transparent;border:none;border-radius:0;padding:0;font-size:14px;font-weight:800;margin-bottom:12px;backdrop-filter:none;text-transform:uppercase;letter-spacing:.08em;opacity:.9;} 
    .hero-title{margin:0 0 10px;line-height:1.1;display:grid;gap:6px;}
    .hero-title .highlight{font-size:clamp(30px,5.4vw,62px);font-weight:900;background:linear-gradient(135deg,#ff6b6b,#ffd93d);-webkit-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent;letter-spacing:.2px;}
    .hero-title .subtitle{font-size:clamp(16px,2.2vw,26px);font-weight:700;opacity:.98;}
    .hero-description{margin:12px 0 20px;font-size:clamp(14px,1.6vw,18px);line-height:1.7;opacity:.96;max-width:72ch;}
    .hero-actions{display:flex;gap:14px;flex-wrap:wrap;justify-content:flex-start;}
    .hero-slide[data-align="center"] .hero-actions{justify-content:center;}
    .hero-slide[data-align="right"]  .hero-actions{justify-content:flex-end;}

    .btn{display:inline-flex;align-items:center;gap:10px;padding:14px 22px;border-radius:14px;font-weight:800;text-decoration:none;border:2px solid transparent;transition:transform .18s ease, box-shadow .18s ease, border-color .18s ease;}
    .btn-primary{background:linear-gradient(135deg,#ff6b6b,#ffd93d);color:#222;box-shadow:0 10px 30px rgba(255,107,107,.32);} 
    .btn-primary:hover{transform:translateY(-2px);box-shadow:0 14px 36px rgba(255,107,107,.42);} 
    .btn-outline{background:transparent;color:#fff;border-color:rgba(255,255,255,.6);} 
    .btn-outline:hover{background:rgba(255,255,255,.12);border-color:rgba(255,255,255,.85);transform:translateY(-2px);} 

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
    @keyframes inUp{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:translateY(0)}}
    @keyframes outDown{from{opacity:1;transform:translateY(0)}to{opacity:0;transform:translateY(14px)}}

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
    .hero-inner{padding-block:clamp(24px,8vh,80px);} 
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
    /* ===== Products (square images), Light & Dark aware ===== */
    .products-section{
    padding: 72px 0 64px;
    /* tokens */
    --ink:#0f172a;
    --muted:#64748b;
    --brand:#7c1415;
    --brand-2:#b71c1c;
    --border:rgba(2,6,23,.08);
    --hover:rgba(124,20,21,.06);
    --ring: rgba(183,28,28,.18);
    background: transparent;
    color: var(--ink);
    }
    body.dark-theme .products-section{
    --ink:#e5e7eb;
    --muted:#94a3b8;
    --border:rgba(255,255,255,.12);
    --hover:rgba(183,28,28,.12);
    --ring: rgba(239,68,68,.22);
    }

    /* Header */
    .products-section .section-header{ text-align:center; margin-bottom: 28px; }
    .products-section .section-badge{
    display:inline-flex; align-items:center; gap:.5rem;
    font-weight:900; letter-spacing:.02em; color: var(--brand);
    padding: .25rem .6rem; border-radius: 999px;
    border:1px solid var(--border); background: transparent;
    }
    .products-section .section-title{
    margin: 10px 0 6px; font-weight:900; letter-spacing:-.01em;
    font-size: clamp(1.5rem, 1.1rem + 1vw, 2rem);
    }
    .products-section .section-description{ color: var(--muted); max-width: 680px; margin: 0 auto; }

    /* Grid & Item */
    .product-grid{ row-gap: 18px; }
    .product-item{
    display:flex; flex-direction:column; height:100%;
    padding: 14px 2px 2px; /* gambar dominan, konten ringkas */
    border:1px solid var(--border);
    border-radius: 14px;
    background: transparent;
    transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease, background .18s ease;
    position: relative;
    }
    .product-item:hover{
    transform: translateY(-4px);
    border-color: color-mix(in srgb, var(--brand) 26%, transparent);
    background: var(--hover);
    box-shadow: 0 14px 34px rgba(0,0,0,.08), 0 0 0 3px var(--ring);
    }

    /* Square thumbnail (kotak) */
    .pi-thumb{
    display:block; width:100%;
    padding: 0 12px; /* inner padding untuk radius rapi */
    }
    .pi-thumb picture, .pi-thumb img{
    display:block; width:100%;
    height:auto;
    }
    .pi-thumb picture{
    position:relative; width:100%;
    aspect-ratio: 1 / 1;
    border-radius: 12px;
    overflow:hidden;
    border: 1px solid var(--border);
    background: radial-gradient(120% 120% at 30% 20%, rgba(0,0,0,.04), transparent);
    transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
    }
    .pi-thumb img{
    position:absolute; inset:0;
    width:100%; height:100%;
    object-fit: cover; /* isi penuh kotak */
    }
    .product-item:hover .pi-thumb picture{
    transform: translateY(-2px);
    border-color: color-mix(in srgb, var(--brand) 22%, transparent);
    box-shadow: 0 10px 24px rgba(0,0,0,.12);
    }

    /* Texts */
    .pi-title{ font-weight: 900; margin: 12px 14px 6px; letter-spacing:.01em; }
    .pi-desc{
    color: var(--muted); margin: 0 14px 10px; line-height: 1.55;
    min-height: 44px;
    }
    .pi-features{ list-style:none; padding:0 14px; margin: 0 0 14px; }
    .pi-features li{
    display:flex; align-items:center; gap:.5rem; color: var(--ink);
    opacity:.9; margin: 6px 0; font-size: .95rem;
    }
    .pi-features .fa-check{ color: #10b981; font-size:.9rem; }

    /* Link */
    .pi-link{
    margin: 0 14px 14px;
    display:inline-flex; align-items:center; gap:.5rem;
    font-weight:800; color: var(--brand); text-decoration:none;
    padding: 8px 10px; border-radius: 10px; transition: gap .18s ease, background .18s ease, color .18s ease;
    }
    .pi-link:hover{ gap:.75rem; background: color-mix(in srgb, var(--brand) 9%, transparent); color: var(--brand-2); }

    /* Small tweak */
    @media (max-width: 575.98px){
    .product-item{ padding:12px 2px 2px; }
    }
/* Products Section */








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
// HERO SLIDER LOGIC (improved)
// - AUTO: teks OUT dulu → crossfade → teks IN
// - MANUAL next/prev/dot: LANGSUNG crossfade (skip OUT), teks IN slide baru
// - Tambahan: pause ketika tab tidak aktif (visibilitychange)
// =========================
(function () {
  const slider = document.querySelector('.hero-slider');
  if (!slider) return;

  const slides = Array.from(slider.querySelectorAll('.hero-slide'));
  const prevBtn  = slider.querySelector('.hero-prev');
  const nextBtn  = slider.querySelector('.hero-next');
  const dots     = Array.from(slider.querySelectorAll('.hero-dots .dot'));

  // sinkron dengan CSS
  const STAGGER_STEP  = 140;
  const TEXT_IN       = 880;
  const TEXT_OUT      = 560;
  const SLIDE_FADE    = 1600;
  const OUT_TOTAL     = TEXT_OUT + (STAGGER_STEP * 3);
  const AUTOPLAY_VIEW = parseInt(slider.getAttribute('data-interval') || '5600', 10);

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

  // Pause ketika tab tidak aktif → lanjut lagi saat aktif
  document.addEventListener('visibilitychange', () => {
    if (document.hidden) stopAutoplay(); else startAutoplay();
  });

  // Start
  showImmediately(0);
  startAutoplay();
})();
</script>

@endsection