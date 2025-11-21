@extends('components.layout')

@section('title', 'Distributor Insulasi Industri Terpercaya')

@section('content')

  <!-- Hero Section (Improved, 5 slides + fixed button focus ring) -->
  <!-- Hero Section (Improved, 5 slides + fixed button focus ring) -->
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
    <div class="hero-slider" data-autoplay="true" data-interval="5600" aria-roledescription="carousel" aria-live="polite">
      <!-- Slide 1 -->
      <article id="slide-1" class="hero-slide is-active" data-index="0" data-align="left"
              aria-roledescription="slide" aria-label="1 dari 5"
              style="--slide-bg: url('{{ asset("img/hero/3.jpg") }}');">
        <div class="slide-bg" aria-hidden="true"></div>
        <div class="slide-scrim" aria-hidden="true"></div>

        <div class="hero-inner">
          <div class="hero-content anim-in">
            <div class="hero-badge hc hc-1">
              <span>Distributor Terpercaya Sejak 2011</span>
            </div>
            <h1 class="hero-title hc hc-2">
              <span class="highlight">Tali Rejeki</span>
              <span class="subtitle">Spesialis Insulasi Industri & HVAC</span>
            </h1>
            <p class="hero-description hc hc-3">
              Stok resmi Glasswool, Rockwool, Nitrile Rubber & aksesoris HVAC. Harga kompetitif, pengiriman cepat, garansi keaslian.
            </p>
            <div class="hero-actions hc hc-4">
              <a href="#products" class="btn btn-primary">Lihat Produk</a>
              <a href="#contact" class="btn btn-outline">Hubungi Kami</a>
            </div>
          </div>
        </div>
      </article>

      <!-- Slide 2 -->
      <article id="slide-2" class="hero-slide" data-index="1" data-align="center"
              aria-roledescription="slide" aria-label="2 dari 5"
              style="--slide-bg: url('{{ asset("img/hero/158.jpg") }}');">
        <div class="slide-bg" aria-hidden="true"></div>
        <div class="slide-scrim" aria-hidden="true"></div>

        <div class="hero-inner">
          <div class="hero-content">
            <div class="hero-badge hc hc-1">
              <span>Glasswool & Rockwool</span>
            </div>
            <h2 class="hero-title hc hc-2">
              <span class="highlight">Insulasi Termal</span>
              <span class="subtitle">Efisien & Tahan Lama</span>
            </h2>
            <p class="hero-description hc hc-3">
              Kurangi beban energi dan tingkatkan kenyamanan akustik. Tersedia aneka densitas & ketebalan sesuai standar proyek.
            </p>
            <div class="hero-actions hc hc-4">
              <a href="#products" class="btn btn-primary">Lihat Produk</a>
              <a href="#contact" class="btn btn-outline">Konsultasi Gratis</a>
            </div>
          </div>
        </div>
      </article>

      <!-- Slide 3 -->
      <article id="slide-3" class="hero-slide" data-index="2" data-align="right"
              aria-roledescription="slide" aria-label="3 dari 5"
              style="--slide-bg: url('{{ asset("img/hero/8.jpg") }}');">
        <div class="slide-bg" aria-hidden="true"></div>
        <div class="slide-scrim" aria-hidden="true"></div>

        <div class="hero-inner">
          <div class="hero-content">
            <div class="hero-badge hc hc-1">
              <span>Nitrile Rubber & Aksesoris</span>
            </div>
            <h2 class="hero-title hc hc-2">
              <span class="highlight">Solusi HVAC</span>
              <span class="subtitle">Lengkap & Siap Kirim</span>
            </h2>
            <p class="hero-description hc hc-3">
              Pipa insulasi, ducting, adhesive, aluminium foil & aksesoris—anti-kondensasi, rapi, dan mudah instalasi.
            </p>
            <div class="hero-actions hc hc-4">
              <a href="#products" class="btn btn-primary">Lihat Katalog</a>
              <a href="#contact" class="btn btn-outline">Hubungi Sales</a>
            </div>
          </div>
        </div>
      </article>

      <!-- Slide 4 -->
      <article id="slide-4" class="hero-slide" data-index="3" data-align="left"
              aria-roledescription="slide" aria-label="4 dari 5"
              style="--slide-bg: url('{{ asset("img/hero/9.jpg") }}');">
        <div class="slide-bg" aria-hidden="true"></div>
        <div class="slide-scrim" aria-hidden="true"></div>

        <div class="hero-inner">
          <div class="hero-content">
            <div class="hero-badge hc hc-1">
              <span>Ready Stock Nasional</span>
            </div>
            <h2 class="hero-title hc hc-2">
              <span class="highlight">Pengiriman Cepat</span>
              <span class="subtitle">Ke 50+ Kota</span>
            </h2>
            <p class="hero-description hc hc-3">
              Gudang Bekasi. Kirim harian—lebih hemat waktu & biaya untuk proyek industri maupun komersial.
            </p>
            <div class="hero-actions hc hc-4">
              <a href="#contact" class="btn btn-primary">Cek Ketersediaan</a>
              <a href="#products" class="btn btn-outline">Lihat Produk</a>
            </div>
          </div>
        </div>
      </article>

      <!-- Slide 5 -->
      <article id="slide-5" class="hero-slide" data-index="4" data-align="center"
              aria-roledescription="slide" aria-label="5 dari 5"
              style="--slide-bg: url('{{ asset("img/hero/7.jpg") }}');">
        <div class="slide-bg" aria-hidden="true"></div>
        <div class="slide-scrim" aria-hidden="true"></div>

        <div class="hero-inner">
          <div class="hero-content">
            <div class="hero-badge hc hc-1">
              <span>Dukungan Teknis</span>
            </div>
            <h2 class="hero-title hc hc-2">
              <span class="highlight">Konsultasi Proyek</span>
              <span class="subtitle">Gratis & Profesional</span>
            </h2>
            <p class="hero-description hc hc-3">
              Tim teknis membantu pemilihan material & estimasi kebutuhan. Dapatkan spesifikasi yang tepat sejak awal.
            </p>
            <div class="hero-actions hc hc-4">
              <a href="#contact" class="btn btn-primary">Konsultasi Sekarang</a>
              <a href="#products" class="btn btn-outline">Telusuri Katalog</a>
            </div>
          </div>
        </div>
      </article>

      <!-- Navigation -->
      <div class="hero-nav">
        <button class="hero-prev" aria-label="Slide sebelumnya" title="Sebelumnya" type="button">
          <svg viewBox="0 0 24 24" width="22" height="22" aria-hidden="true"><path d="M15 18l-6-6 6-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </button>
        <button class="hero-next" aria-label="Slide berikutnya" title="Berikutnya" type="button">
          <svg viewBox="0 0 24 24" width="22" height="22" aria-hidden="true"><path d="M9 6l6 6-6 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </button>
      </div>

      <!-- Dots (5 buah) -->
      <div class="hero-dots" role="tablist" aria-label="Navigasi slide">
        <button class="dot is-active" role="tab" aria-selected="true" aria-controls="slide-1" title="Slide 1"></button>
        <button class="dot" role="tab" aria-selected="false" aria-controls="slide-2" title="Slide 2"></button>
        <button class="dot" role="tab" aria-selected="false" aria-controls="slide-3" title="Slide 3"></button>
        <button class="dot" role="tab" aria-selected="false" aria-controls="slide-4" title="Slide 4"></button>
        <button class="dot" role="tab" aria-selected="false" aria-controls="slide-5" title="Slide 5"></button>
      </div>
    </div>
  </section>


  <!-- Products Section (6 items, square images, flip on hover - simple) -->
  <section id="products" class="products-section">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Produk Unggulan</h2>
        <p class="section-description">
          Solusi insulasi berkualitas untuk kebutuhan industri Anda
        </p>
      </div>

      <div class="row product-grid">
        <!-- ROCKWOOL -->
        <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
          <div class="product-item reveal">
            <a class="pi-thumb" href="{{ url('/products/rockwool') }}">
              <div class="pi-stage">
                <img class="pi-img front" src="{{ asset('img/landing/22.png') }}" alt="ROCKWOOL" loading="lazy">
                <img class="pi-img back"  src="{{ asset('img/landing/23.png') }}" alt="ROCKWOOL" loading="lazy">
              </div>
            </a>
            <h3 class="pi-title">ROCKWOOL</h3>
            <p class="pi-desc">Serat batu dengan ketahanan api tinggi dan performa akustik yang baik</p>
            <a href="{{ url('/products/rockwool') }}" class="pi-link">Selengkapnya →</a>
          </div>
        </div>

        <!-- GLASSWOOL -->
        <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
          <div class="product-item reveal">
            <a class="pi-thumb" href="{{ url('/products/glasswool') }}">
              <div class="pi-stage">
                <img class="pi-img front" src="{{ asset('img/landing/24.png') }}" alt="GLASSWOOL" loading="lazy">
                <img class="pi-img back"  src="{{ asset('img/landing/25.png') }}" alt="GLASSWOOL" loading="lazy">
              </div>
            </a>
            <h3 class="pi-title">GLASSWOOL</h3>
            <p class="pi-desc">Serat kaca ringan untuk insulasi termal & akustik yang mudah diaplikasi</p>
            <a href="{{ url('/products/glasswool') }}" class="pi-link">Selengkapnya →</a>
          </div>
        </div>

        <!-- CALCIUM SILICATE -->
        <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
          <div class="product-item reveal">
            <a class="pi-thumb" href="{{ url('/products/calcium-silicate') }}">
              <div class="pi-stage">
                <img class="pi-img front" src="{{ asset('img/landing/26.png') }}" alt="CALCIUM SILICATE" loading="lazy">
                <img class="pi-img back"  src="{{ asset('img/landing/27.png') }}" alt="CALCIUM SILICATE" loading="lazy">
              </div>
            </a>
            <h3 class="pi-title">CALCIUM SILICATE</h3>
            <p class="pi-desc">Papan isolasi rigid untuk suhu tinggi dengan kekuatan tekan yang baik</p>
            <a href="{{ url('/products/calcium-silicate') }}" class="pi-link">Selengkapnya →</a>
          </div>
        </div>

        <!-- CERAMIC FIBER -->
        <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
          <div class="product-item reveal">
            <a class="pi-thumb" href="{{ url('/products/ceramic-fiber') }}">
              <div class="pi-stage">
                <img class="pi-img front" src="{{ asset('img/landing/28.png') }}" alt="CERAMIC FIBER" loading="lazy">
                <img class="pi-img back"  src="{{ asset('img/landing/29.png') }}" alt="CERAMIC FIBER" loading="lazy">
              </div>
            </a>
            <h3 class="pi-title">CERAMIC FIBER</h3>
            <p class="pi-desc">Blanket tahan temperatur sangat tinggi, ringan dan efisien</p>
            <a href="{{ url('/products/ceramic-fiber') }}" class="pi-link">Selengkapnya →</a>
          </div>
        </div>

        <!-- ARMAFLEX -->
        <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
          <div class="product-item reveal">
            <a class="pi-thumb" href="{{ url('/products/armacell-armaflex') }}">
              <div class="pi-stage">
                <img class="pi-img front" src="{{ asset('img/landing/30.png') }}" alt="ARMAFLEX" loading="lazy">
                <img class="pi-img back"  src="{{ asset('img/landing/31.png') }}" alt="ARMAFLEX" loading="lazy">
              </div>
            </a>
            <h3 class="pi-title">ARMACELL - ARMAFLEX</h3>
            <p class="pi-desc">Elastomeric foam untuk pipa AC & chiller dengan penghalang uap efektif</p>
            <a href="{{ url('/products/armacell-armaflex') }}" class="pi-link">Selengkapnya →</a>
          </div>
        </div>

        <!-- ALUMINIUMSHEET [JACKETING] -->
        <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
          <div class="product-item reveal">
            <a class="pi-thumb" href="{{ url('/products/aluminiumsheet-jacketing') }}">
              <div class="pi-stage">
                <img class="pi-img front" src="{{ asset('img/landing/32.png') }}" alt="ALUMINIUMSHEET JACKETING" loading="lazy">
                <img class="pi-img back"  src="{{ asset('img/landing/33.png') }}" alt="ALUMINIUMSHEET JACKETING" loading="lazy">
              </div>
            </a>
            <h3 class="pi-title">ALUMINIUMSHEET JACKETING</h3>
            <p class="pi-desc">Material pelapis untuk melindungi insulasi dari kerusakan luar</p>
            <a href="{{ url('/products/aluminiumsheet-jacketing') }}" class="pi-link">Selengkapnya →</a>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- ===== Pengalaman Kami Section ===== -->
  <!-- ===== Pengalaman Kami Section ===== -->
  <section class="experience-section" id="experience">
    <div class="background-image"></div>
    <div class="overlay"></div>

    <div class="section-header fade-up">
      <h2 class="section-title">14+ Tahun Memberikan Layanan Terbaik</h2>
      <p class="section-description">Kami berkomitmen memberikan produk dan layanan industri berkualitas tinggi dengan pengalaman yang luas.</p>
    </div>

    <div class="experience-grid">
      <div class="experience-item fade-up">
        <div class="count-container">
          <h3 class="count" data-target="14">0</h3>
          <span class="count-plus">+</span>
        </div>
        <p>Tahun Pengalaman</p>
      </div>
      <div class="experience-item fade-up">
        <div class="count-container">
          <h3 class="count" data-target="250">0</h3>
          <span class="count-plus">+</span>
        </div>
        <p>Proyek Industri</p>
      </div>
      <div class="experience-item fade-up">
        <div class="count-container">
          <h3 class="count" data-target="120">0</h3>
          <span class="count-plus">+</span>
        </div>
        <p>Klien Terpuaskan</p>
      </div>
      <div class="experience-item fade-up">
        <div class="count-container">
          <h3 class="count" data-target="50">0</h3>
          <span class="count-plus">+</span>
        </div>
        <p>Tim Profesional</p>
      </div>
    </div>
  </section>


  <!-- Services Section -->
  <!-- Services Section -->
  <section class="services-section" id="services">
    <div class="container">
      <div class="services-header fade-up">
        <h2 class="section-title">Solusi Lengkap untuk Semua Kebutuhan Anda</h2>
        <p class="section-description">
          Tali Rejeki hadir dengan berbagai layanan profesional dan terpercaya. 
          Dari konsultasi, distribusi, hingga kualitas terjamin dengan harga yang bersahabat.
        </p>
      </div>

      <div class="services-grid">
        <div class="service-item fade-up">
          <h4>Bimbingan Profesional</h4>
          <p>Tim ahli siap membantu Anda dengan solusi tepat dan cepat.</p>
        </div>

        <div class="service-item fade-up">
          <h4>Konsultasi & Saran</h4>
          <p>Dapatkan rekomendasi yang sesuai kebutuhan bisnis dan proyek Anda.</p>
        </div>

        <div class="service-item fade-up">
          <h4>Distribusi Luas</h4>
          <p>Layanan pengiriman cepat ke seluruh wilayah Indonesia.</p>
        </div>

        <div class="service-item fade-up">
          <h4>Kualitas Terjamin</h4>
          <p>Setiap layanan dijalankan dengan standar profesional tinggi.</p>
        </div>

        <div class="service-item fade-up">
          <h4>Tepat Waktu</h4>
          <p>Menjaga jadwal proyek dan layanan agar selalu on-time.</p>
        </div>

        <div class="service-item fade-up">
          <h4>Tim Profesional</h4>
          <p>Didukung tenaga ahli berpengalaman dan berdedikasi.</p>
        </div>

        <div class="service-item fade-up">
          <h4>Harga Terjangkau</h4>
          <p>Menawarkan layanan dengan biaya kompetitif tanpa mengurangi kualitas.</p>
        </div>

        <div class="service-item fade-up">
          <h4>Layanan Lengkap</h4>
          <p>Satu tempat dengan banyak pilihan layanan sesuai kebutuhan Anda.</p>
        </div>
      </div>
    </div>
  </section>



  <!-- Our Brands Section -->
  <!-- Our Brands Section -->
  <section id="brands" class="brands-section py-5 fade-section">
    <div class="container text-center">
      <h2 class="section-title fade-up">Kami Bekerja Sama Dengan Brand Terkemuka</h2>
      <p class="section-description fade-up">
        Berikut adalah beberapa brand yang telah mempercayai kami.
      </p>

      @for ($row = 1; $row <= 3; $row++)
        @php
          $brands = range(1, 20);
          shuffle($brands); // acak urutan
        @endphp

        <div class="brands-slider slider-{{ $row }} fade-up">
          <div class="brands-track">
            @foreach ($brands as $i)
              <div class="brand-slide fade-stagger">
                <img src="{{ asset('img/brands/' . $i . '.png') }}" alt="Brand {{ $i }}">
              </div>
            @endforeach

            <!-- Duplicate untuk looping mulus -->
            @foreach ($brands as $i)
              <div class="brand-slide fade-stagger">
                <img src="{{ asset('img/brands/' . $i . '.png') }}" alt="Brand {{ $i }}">
              </div>
            @endforeach
          </div>
        </div>
      @endfor
    </div>
  </section>


  <!-- ===== Proyek Kami Section ===== -->
  <!-- ===== Proyek Kami Section ===== -->
  <section class="proyek-section fade-section" id="proyek">
    <div class="section-header">
      <h2 class="section-title fade-up">Proyek yang Sudah Kami Kerjakan</h2>
      <p class="section-description fade-up">Beberapa proyek terbaik kami, menampilkan kualitas tinggi dan hasil memuaskan.</p>
    </div>

    <div class="proyek-grid">
      <!-- PT Rainbow Indah Carpet -->
      <div class="proyek-item fade-stagger">
        <a href="#" class="proyek-thumb">
          <img class="front" src="img/proyek/carpet1.jpg" alt="PT Rainbow Indah Carpet">
          <img class="back" src="img/proyek/carpet2.jpg" alt="PT Rainbow Indah Carpet">
        </a>
        <h3 class="proyek-title">PT Rainbow Indah Carpet</h3>
      </div>

      <!-- Proyek Bambulogy Mansion -->
      <div class="proyek-item fade-stagger">
        <a href="#" class="proyek-thumb">
          <img class="front" src="img/proyek/bambulogy1.jpg" alt="Proyek Bambulogy Mansion">
          <img class="back" src="img/proyek/bambulogy2.jpg" alt="Proyek Bambulogy Mansion">
        </a>
        <h3 class="proyek-title">Proyek Bambulogy Mansion</h3>
      </div>

      <!-- PT Dohsung Indonesia -->
      <div class="proyek-item fade-stagger">
        <a href="#" class="proyek-thumb">
          <img class="front" src="img/proyek/dongsu1.jpg" alt="PT Dohsung Indonesia">
          <img class="back" src="img/proyek/dongsu2.jpg" alt="PT Dohsung Indonesia">
        </a>
        <h3 class="proyek-title">PT Dohsung Indonesia</h3>
      </div>

      <!-- PT Nikomas Gemilang -->
      <div class="proyek-item fade-stagger">
        <a href="#" class="proyek-thumb">
          <img class="front" src="img/proyek/nikomas1.jpg" alt="PT Nikomas Gemilang">
          <img class="back" src="img/proyek/nikomas2.jpg" alt="PT Nikomas Gemilang">
        </a>
        <h3 class="proyek-title">PT Nikomas Gemilang</h3>
      </div>

      <!-- PT Data Centre -->
      <div class="proyek-item fade-stagger">
        <a href="#" class="proyek-thumb">
          <img class="front" src="img/proyek/centre1.jpg" alt="PT Data Centre">
          <img class="back" src="img/proyek/centre2.jpg" alt="PT Data Centre">
        </a>
        <h3 class="proyek-title">PT Data Centre</h3>
      </div>

      <!-- Proyek Ainul Hayat Sejahtera -->
      <div class="proyek-item fade-stagger">
        <a href="#" class="proyek-thumb">
          <img class="front" src="img/proyek/ainul1.jpg" alt="Proyek Ainul Hayat Sejahtera">
          <img class="back" src="img/proyek/ainul2.jpg" alt="Proyek Ainul Hayat Sejahtera">
        </a>
        <h3 class="proyek-title">Proyek Ainul Hayat Sejahtera</h3>
      </div>

      <!-- Proyek Peredam Genset -->
      <div class="proyek-item fade-stagger">
        <a href="#" class="proyek-thumb">
          <img class="front" src="img/proyek/genset1.jpg" alt="Proyek Peredam Genset">
          <img class="back" src="img/proyek/genset2.jpg" alt="Proyek Peredam Genset">
        </a>
        <h3 class="proyek-title">Proyek Peredam Genset</h3>
      </div>

      <!-- Wika Palu PLTU -->
      <div class="proyek-item fade-stagger">
        <a href="#" class="proyek-thumb">
          <img class="front" src="img/proyek/wika1.jpg" alt="Wika Palu PLTU">
          <img class="back" src="img/proyek/wika2.jpg" alt="Wika Palu PLTU">
        </a>
        <h3 class="proyek-title">Wika Palu PLTU</h3>
      </div>
    </div>
  </section>



  <!-- ===== Apa Kata Mereka Section ===== -->
  <!-- ===== Apa Kata Mereka Section ===== -->
  <section class="testimoni-section" id="testimoni">
    <div class="section-header">
      <h2 class="section-title">Testimoni Klien Kami</h2>
      <p class="section-description">Pendapat dan pengalaman klien kami bekerja sama, menunjukkan kualitas dan kepuasan layanan industri kami.</p>
    </div>

    <div class="testimoni-slider">
      <div class="testimoni-track">
        <!-- Testimoni Items -->
        <div class="testimoni-item">
          <div class="testimoni-content">
            <p class="testimoni-text">"Produk insulasi sangat berkualitas dan mudah diaplikasikan pada mesin produksi kami."</p>
            <div class="testimoni-user">
              <div class="user-info">
                <h4>Jane Doe</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="testimoni-item">
          <div class="testimoni-content">
            <p class="testimoni-text">"Layanan cepat dan teknisi sangat membantu dalam pemasangan insulasi industri kami."</p>
            <div class="testimoni-user">
              <div class="user-info">
                <h4>John Smith</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="testimoni-item">
          <div class="testimoni-content">
            <p class="testimoni-text">"Produk tahan lama dan mampu menahan panas tinggi, sangat cocok untuk pabrik kami."</p>
            <div class="testimoni-user">
              <div class="user-info">
                <h4>Ali Rahman</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="testimoni-item">
          <div class="testimoni-content">
            <p class="testimoni-text">"Tim support selalu siap membantu, dan produk insulasi pas dengan spesifikasi kami."</p>
            <div class="testimoni-user">
              <div class="user-info">
                <h4>Siti Nurhaliza</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="testimoni-item">
          <div class="testimoni-content">
            <p class="testimoni-text">"Sangat puas dengan hasil insulasi, mengurangi kebocoran panas dan meningkatkan efisiensi energi."</p>
            <div class="testimoni-user">
              <div class="user-info">
                <h4>Budi Santoso</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="testimoni-item">
          <div class="testimoni-content">
            <p class="testimoni-text">"Material berkualitas tinggi dan pemasangan cepat membuat produksi kami tetap optimal."</p>
            <div class="testimoni-user">
              <div class="user-info">
                <h4>Lina Kusuma</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="testimoni-item">
          <div class="testimoni-content">
            <p class="testimoni-text">"Produk insulasi aman dan sesuai standar industri, sangat merekomendasikan."</p>
            <div class="testimoni-user">
              <div class="user-info">
                <h4>Rudi Hartono</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="testimoni-item">
          <div class="testimoni-content">
            <p class="testimoni-text">"Kualitas produk luar biasa dan tim sangat responsif dalam menangani pertanyaan kami."</p>
            <div class="testimoni-user">
              <div class="user-info">
                <h4>Tari Wijaya</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="testimoni-item">
          <div class="testimoni-content">
            <p class="testimoni-text">"Insulasi bekerja sempurna pada mesin industri kami, efisiensi meningkat signifikan."</p>
            <div class="testimoni-user">
              <div class="user-info">
                <h4>Andi Pratama</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="testimoni-item">
          <div class="testimoni-content">
            <p class="testimoni-text">"Sangat puas! Pemasangan cepat, material kuat, dan performa mesin meningkat."</p>
            <div class="testimoni-user">
              <div class="user-info">
                <h4>Rina Safitri</h4>
              </div>
            </div>
          </div>
        </div>

        <!-- Duplikasi untuk infinite loop -->
        <div class="testimoni-item">
          <div class="testimoni-content">
            <p class="testimoni-text">"Produk insulasi sangat berkualitas dan mudah diaplikasikan pada mesin produksi kami."</p>
            <div class="testimoni-user">
              <div class="user-info">
                <h4>Jane Doe</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="testimoni-item">
          <div class="testimoni-content">
            <p class="testimoni-text">"Layanan cepat dan teknisi sangat membantu dalam pemasangan insulasi industri kami."</p>
            <div class="testimoni-user">
              <div class="user-info">
                <h4>John Smith</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- CTA Section -->
  <!-- CTA Section -->
  <section id="contact" class="cta-section">
    <!-- Background -->
    <div class="cta-bg">
      <div class="cta-overlay"></div>
    </div>

    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-lg-10">
          <div class="cta-content">
            <h2 class="cta-title">Siap Memulai Proyek Insulasi Anda?</h2>
            <p class="cta-description">
              Dapatkan penawaran terbaik dan konsultasi gratis dari tim ahli kami. 
              Hubungi sekarang untuk solusi insulasi yang tepat!
            </p>

            <!-- Actions -->
            <div class="cta-actions">
              <a href="tel:+62-21-29470622" class="btn btn-primary">
                <span>Hubungi Sekarang</span>
              </a>
              <a href="https://wa.me/6281316826959" class="btn btn-outline" target="_blank">
                <span>Chat WhatsApp</span>
              </a>
            </div>

            <!-- Contact Info -->
            <div class="contact-info">
              <div class="contact-item">
                <span>Bekasi, Indonesia</span>
              </div>
              <div class="contact-item">
                <span>talirejeki@gmail.com</span>
              </div>
              <div class="contact-item">
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
        color: #2d3748;
        border-color: rgba(45, 55, 72, 0.3);
        backdrop-filter: blur(10px);
    }

    .btn-outline:hover {
        background: rgba(45, 55, 72, 0.1);
        border-color: rgba(45, 55, 72, 0.5);
        color: #2d3748;
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
    /* Hero Section */
      /* ================= Hero Section ================= */
      :root{
        --slide-fade-dur: 1600ms;
        --img-fade-dur:   1100ms;
        --text-in-dur:     880ms;
        --text-out-dur:    560ms;
        --stagger-step:    140ms;
        --ease-out: cubic-bezier(.17,.84,.44,1);
        --ease-in:  cubic-bezier(.64,0,.35,1);
        --ease-ken: cubic-bezier(.22,.61,.36,1);
        --ring-hero:#dc2626;
        --ring-hero-soft: rgba(220,38,38,.65);
      }

      .hero-section{
        position:relative;
        min-height:100vh;
        min-height:80svh;
        overflow:hidden;
        display:block;
        isolation:isolate;
      }

      /* ================= Background ================= */
      .hero-bg{
        position:absolute;inset:0;
        background:url('{{ asset("img/bg/bg-texture-white.webp") }}');
        background-size:cover;background-position:center;
        background-attachment:fixed;background-repeat:no-repeat;
        z-index:-3;transition:all .3s ease;
      }
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

      /* ================= Slider Core ================= */
      .hero-slider{position:relative;width:100%;height:min(100vh,90svh);}
      .hero-slide{
        position:absolute;inset:0;display:grid;place-items:stretch;
        opacity:0;pointer-events:none;transform:translateX(1.6%);
        transition: opacity var(--slide-fade-dur) var(--ease-out), transform var(--slide-fade-dur) var(--ease-out);
        z-index:0;
      }
      .hero-slide.is-active{opacity:1;pointer-events:auto;transform:translateX(0);z-index:1;}

      /* Background - TANPA EFEK ZOOM */
      .slide-bg{
        position:absolute;inset:0;background-image:var(--slide-bg);background-size:cover;background-position:center;
        transform:scale(1) translateY(0);
        opacity:.94;filter:saturate(.96) contrast(.98);
        transition: opacity var(--img-fade-dur) var(--ease-out), filter 1200ms var(--ease-ken);
        z-index:-1;will-change:opacity,filter;
      }

      .slide-scrim{position:absolute;inset:0;background:
        radial-gradient(1200px 600px at 68% 32%, rgba(0,0,0,.20), transparent 82%),
        linear-gradient(180deg, rgba(0,0,0,.55), rgba(0,0,0,.55));
        z-index:0;opacity:.4;
      }

      /* ================= Layout Content ================= */
      .hero-inner{
        position:relative; z-index:1;
        min-height:100svh; display:grid; align-items:start; justify-items:start;
        padding-inline: clamp(16px,3.5vw,64px);
        padding-top:    clamp(60px,102vh,160px);
        padding-bottom: clamp(24px,6vh,96px);
      }

      .hero-slide[data-align="left"]  .hero-inner{justify-items:start;}
      .hero-slide[data-align="center"].is-active .hero-inner{justify-items:center;}
      .hero-slide[data-align="right"].is-active  .hero-inner{justify-items:end;}

      .hero-content{color:#fff;max-width:min(960px,90vw);text-align:left;background:transparent;padding:0;margin:0;}
      .hero-slide[data-align="center"] .hero-content{text-align:center;}
      .hero-slide[data-align="right"]  .hero-content{text-align:right;}

      /* ================= Text ================= */
      .hero-badge{display:inline-flex;align-items:center;gap:8px;background:transparent;font-size:14px;font-weight:800;margin-bottom:12px;text-transform:uppercase;letter-spacing:.08em;opacity:.9;} 
      .hero-title{margin:0 0 10px;line-height:1.1;display:grid;gap:6px;}
      .hero-title .highlight{font-size:clamp(30px,5.4vw,62px);font-weight:900;background:linear-gradient(135deg, #991b1b 0%, #dc2626 35%, #f87171 65%, #ffffff 100%);-webkit-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent;letter-spacing:.2px;text-shadow: 0 2px 10px rgba(220, 38, 38, 0.3);}
      .hero-title .subtitle{font-size:clamp(16px,2.2vw,26px);font-weight:700;opacity:.98;}
      .hero-description{margin:12px 0 20px;font-size:clamp(14px,1.6vw,18px);line-height:1.7;opacity:.96;max-width:72ch;}
      .hero-actions{display:flex;gap:14px;flex-wrap:wrap;justify-content:flex-start;}
      .hero-slide[data-align="center"] .hero-actions{justify-content:center;}
      .hero-slide[data-align="right"]  .hero-actions{justify-content:flex-end;}

      /* ================= Buttons ================= */
      .btn{
        display:inline-flex;align-items:center;gap:10px;padding:14px 22px;border-radius:14px;font-weight:800;
        text-decoration:none;border:2px solid transparent;transition:transform .18s ease, box-shadow .18s ease, border-color .18s ease, background .18s ease;
        outline:none; -webkit-tap-highlight-color: transparent;
      }
      .btn-primary{background:linear-gradient(135deg,#dc2626,#f87171);color:#fff;box-shadow:0 10px 30px rgba(220,38,38,.32);}
      .btn-primary:hover{transform:translateY(-2px);box-shadow:0 14px 36px rgba(220,38,38,.42);border-color:#fff;color:#fff;}
      .btn-primary:focus,.btn-primary:focus-visible{outline:none !important;box-shadow:0 0 0 3px var(--ring-hero), 0 12px 34px rgba(220,38,38,.40);border-color:#fff;}
      .btn-outline{background:transparent;color:#fff;border:2px solid rgba(255,255,255,.6);}
      .btn-outline:hover{background:rgba(255,255,255,.15);border-color:#dc2626;color:#dc2626;transform:translateY(-2px);}
      .btn:focus,.btn:focus-visible{outline:none !important;box-shadow:0 0 0 3px var(--ring-hero-soft), 0 10px 28px rgba(0,0,0,.25);}
      .btn-primary:focus-visible{box-shadow:0 0 0 3px var(--ring-hero), 0 12px 34px rgba(220,38,38,.40);}
      .btn-outline:focus-visible{border-color:rgba(255,255,255,.9);box-shadow:0 0 0 3px var(--ring-hero-soft);}

      /* ================= Navigation ================= */
      .hero-nav{position:absolute;right:22px;bottom:22px;display:flex;gap:10px;z-index:2;}
      .hero-prev,.hero-next{
        border:none;background:rgba(0,0,0,.28);color:#fff;width:44px;height:44px;border-radius:999px;display:grid;place-items:center;backdrop-filter:blur(4px);transition:.2s ease;cursor:pointer;outline:none;
      }
      .hero-prev:hover,.hero-next:hover{background:rgba(0,0,0,.45);transform:translateY(-1px);} 
      .hero-prev:focus-visible,.hero-next:focus-visible{outline:none;box-shadow:0 0 0 3px var(--ring-hero);}

      /* Dots */
      .hero-dots{position:absolute;left:50%;transform:translateX(-50%);bottom:22px;display:flex;gap:8px;z-index:2;}
      .hero-dots .dot{width:10px;height:10px;border-radius:999px;background:rgba(255,255,255,.45);border:none;cursor:pointer;transition:.2s ease;padding:0;}
      .hero-dots .dot.is-active{width:26px;border-radius:8px;background:#dc2626;}
      .hero-dots .dot:focus-visible{outline:none;box-shadow:0 0 0 3px var(--ring-hero);}

      /* ================= Text Animation ================= */
      .hc{will-change:transform,opacity;}
      @keyframes inUp{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:translateY(0)}}
      @keyframes outDown{from{opacity:1;transform:translateY(0)}to{opacity:0;transform:translateY(14px)}}
      .hero-content.anim-in .hc-1{animation:inUp var(--text-in-dur) var(--ease-out) both;animation-delay:calc(0 * var(--stagger-step));}
      .hero-content.anim-in .hc-2{animation:inUp var(--text-in-dur) var(--ease-out) both;animation-delay:calc(1 * var(--stagger-step));}
      .hero-content.anim-in .hc-3{animation:inUp var(--text-in-dur) var(--ease-out) both;animation-delay:calc(2 * var(--stagger-step));}
      .hero-content.anim-in .hc-4{animation:inUp var(--text-in-dur) var(--ease-out) both;animation-delay:calc(3 * var(--stagger-step));}
      .hero-content.anim-out .hc-4{animation:outDown var(--text-out-dur) var(--ease-in) both;animation-delay:calc(0 * var(--stagger-step));}
      .hero-content.anim-out .hc-3{animation:outDown var(--text-out-dur) var(--ease-in) both;animation-delay:calc(1 * var(--stagger-step));}
      .hero-content.anim-out .hc-2{animation:outDown var(--text-out-dur) var(--ease-in) both;animation-delay:calc(2 * var(--stagger-step));}
      .hero-content.anim-out .hc-1{animation:outDown var(--text-out-dur) var(--ease-in) both;animation-delay:calc(3 * var(--stagger-step));}

      /* ================= Responsive ================= */

      /* Tablet landscape dan desktop kecil */
      @media (max-width: 1200px){
        .hero-title .highlight{font-size:clamp(26px,4.8vw,54px);}
        .hero-title .subtitle{font-size:clamp(15px,2vw,22px);}
        .hero-description{font-size:15px;}
        .hero-inner{padding-inline:32px;}
      }

      /* Tablet portrait */
      @media (max-width: 992px){
        .hero-inner{padding-block:clamp(24px,8vh,80px);padding-inline:24px;}
        .hero-title .highlight{font-size:clamp(24px,5vw,46px);}
        .hero-title .subtitle{font-size:clamp(14px,2vw,20px);}
        .hero-description{font-size:14px;max-width:90%;}
        .hero-actions{justify-content:center;}
        .hero-nav{right:16px;bottom:16px;}
      }

      /* Smartphone besar */
      @media (max-width: 768px){
        .hero-title .highlight{font-size:clamp(22px,6vw,38px);}
        .hero-title .subtitle{font-size:clamp(13px,3.2vw,18px);}
        .hero-description{font-size:13px;line-height:1.5;}
        .btn{padding:12px 18px;font-size:14px;}
        .hero-nav{gap:6px;}
        .hero-prev,.hero-next{width:38px;height:38px;}
      }

      /* Smartphone kecil */
      @media (max-width: 576px){
        .hero-title .highlight{font-size:20px;}
        .hero-title .subtitle{font-size:14px;}
        .hero-description{font-size:12px;line-height:1.5;}
        .btn{padding:10px 16px;font-size:13px;border-radius:10px;}
        .hero-dots{bottom:14px;}
        .hero-prev,.hero-next{width:34px;height:34px;}
      }

      /* Ultra-wide monitor */
      @media (min-width: 1600px){
        .hero-inner{padding-inline:80px;}
        .hero-title .highlight{font-size:72px;}
        .hero-title .subtitle{font-size:30px;}
        .hero-description{font-size:20px;max-width:80ch;}
      }

      /* iOS fix */
      @supports (-webkit-touch-callout: none){.hero-bg{background-attachment:scroll;}}

      /* Reduce motion */
      @media (prefers-reduced-motion: reduce){
        *{animation-duration:.001ms !important;animation-iteration-count:1 !important;transition-duration:.001ms !important;}
        .slide-bg{transform:none !important;}
      }
  /* Hero Section */



  /* Products Section */
    /* Products Section */
    .products-section{
      padding:72px 0 64px;
      --ink:#0f172a; --muted:#64748b;
      --brand:#7c1415; --brand-2:#b71c1c;
      --border:rgba(2,6,23,.08); --hover:rgba(124,20,21,.06);
      --ring:rgba(183,28,28,.18);
      background:transparent; color:var(--ink);
    }

    /* Header */
    .products-section .section-header{ text-align:center; margin-bottom:28px; }
    .products-section .section-badge{
      display: inline-flex;
      align-items: center;
      background: #ffd93d;
      color: #222;
      font-weight: 600;
      padding: 8px 18px;
      border-radius: 30px;
      font-size: 14px;
      gap: 8px;
      box-shadow: 0 4px 14px rgba(255, 217, 61, 0.35);
    }
    .section-badge i { font-size: 18px; }

    .products-section .section-title{
        font-size: clamp(28px, 4vw, 40px);
        font-weight: 900;
        margin-bottom: 16px;
        color: #111;
    }
    .products-section .section-description{
        font-size: clamp(14px, 1.6vw, 18px);
        color: #555;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Grid & Item */
    .product-grid{ row-gap:18px; }
    .product-item{
      display:flex; flex-direction:column; height:100%;
      padding:14px 2px 2px;
      border:1px solid var(--border);
      border-radius:14px; background:transparent;
      transition:transform .18s ease, box-shadow .18s ease, border-color .18s ease, background .18s ease;
      position:relative; isolation:isolate;
      opacity:0; transform:translateY(30px); /* animasi awal */
    }
    .product-item.show{
      opacity:1; transform:translateY(0);
      transition:all .6s ease;
    }
    .product-item:hover{
      transform:translateY(-4px);
      border-color:color-mix(in srgb, var(--brand) 26%, transparent);
      background:var(--hover);
      box-shadow:0 14px 34px rgba(0,0,0,.08), 0 0 0 3px var(--ring);
    }

    /* === Square thumbnail (image-only flip) === */
    .pi-thumb{ display:block; width:100%; padding:0 12px; outline:0; }
    .pi-thumb:focus-visible .pi-stage{ box-shadow:0 0 0 3px var(--ring); }

    .pi-stage{
      position:relative; width:100%; aspect-ratio:1/1;
      border-radius:12px; overflow:hidden;
      border:1px solid var(--border);
      background:radial-gradient(120% 120% at 30% 20%, rgba(0,0,0,.04), transparent);
    }

    .pi-img{
      position:absolute; inset:0; width:100%; height:100%;
      object-fit:cover;
      backface-visibility:hidden; -webkit-backface-visibility:hidden;
      transform-origin:center center;
      transition:transform .45s ease, opacity .45s ease;
      will-change:transform, opacity;
    }
    .pi-img.front{ transform:rotateY(0deg);   opacity:1;  }
    .pi-img.back { transform:rotateY(-90deg); opacity:0;  }

    .pi-thumb:hover .pi-img.front,
    .pi-thumb:focus-visible .pi-img.front{
      transform:rotateY(90deg); opacity:0;
    }
    .pi-thumb:hover .pi-img.back,
    .pi-thumb:focus-visible .pi-img.back{
      transform:rotateY(0deg);  opacity:1;
    }

    @media (prefers-reduced-motion: reduce){
      .pi-img{ transition:none; }
      .pi-thumb:hover .pi-img.front,
      .pi-thumb:focus-visible .pi-img.front{ transform:none; opacity:1; }
      .pi-thumb:hover .pi-img.back,
      .pi-thumb:focus-visible .pi-img.back{  transform:none; opacity:0; }
    }

    /* Texts */
    .pi-title{ font-weight:900; margin:12px 14px 6px; letter-spacing:.01em; color: #111; }
    .pi-desc{ color:var(--muted); margin:0 14px 10px; line-height:1.55; min-height:44px; }
    .pi-features{ list-style:none; padding:0 14px; margin:0 0 14px; }
    .pi-features li{ display:flex; align-items:center; gap:.5rem; color:var(--ink); opacity:.9; margin:6px 0; font-size:.95rem; }
    .pi-features .fa-check{ color:#10b981; font-size:.9rem; }

    /* Link */
    .pi-link{
      margin:0 14px 14px;
      display:inline-flex; align-items:center; gap:.5rem;
      font-weight:800; color:var(--brand); text-decoration:none;
      padding:8px 10px; border-radius:10px; transition:gap .18s ease, background .18s ease, color .18s ease;
    }
    .pi-link:hover{ gap:.75rem; background:color-mix(in srgb, var(--brand) 9%, transparent); color:var(--brand-2); }

    @media (max-width:575.98px){
      .product-item{ padding:12px 2px 2px; }
    }
  /* Products Section */


  /* ===== Experience Section ===== */
    /* ===== Experience Section ===== */
    .experience-section {
        position: relative;
        padding: 100px 60px;
        color: #111;
        text-align: center;
        overflow: hidden;
        background-color: #f8f9fa;
    }

    /* Background image (dibuat soft transparan) */
    .experience-section .background-image {
        position: absolute;
        inset: 0;
        background-image: url('{{ asset("img/galeri-proyek/2.jpg") }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        opacity: 0.1; /* Dikurangi opacity untuk lebih clean */
        filter: brightness(1.1); /* Diperbaiki brightness */
        z-index: 0;
        pointer-events: none;
    }

    /* Overlay */
    .experience-section .overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(255,255,255,0.95) 0%, rgba(248,249,250,0.9) 100%);
        z-index: 1;
    }

    /* Header */
    .experience-section .section-header {
        position: relative;
        z-index: 2;
        margin-bottom: 60px;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    .experience-section .section-badge {
        display: inline-block;
        background: #ffd93d;
        color: #222;
        font-weight: 600;
        padding: 8px 20px;
        border-radius: 30px;
        font-size: 14px;
        margin-bottom: 20px;
        box-shadow: 0 4px 12px rgba(255, 217, 61, 0.2);
    }

    .experience-section .section-title {
        font-size: clamp(32px, 4vw, 42px);
        font-weight: 800;
        margin: 0 0 16px;
        color: #111;
        line-height: 1.2;
    }

    .experience-section .section-description {
        font-size: clamp(16px, 1.6vw, 18px);
        color: #555;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Grid */
    .experience-grid {
        position: relative;
        z-index: 2;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 30px;
        max-width: 1000px;
        margin: 0 auto;
    }

    .experience-item {
        background: #fff;
        border-radius: 16px;
        padding: 40px 25px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        color: #111;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        opacity: 0;
        transform: translateY(30px);
    }

    .experience-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.1);
    }

    .count-container {
        position: relative;
        display: flex;
        align-items: flex-start;
        justify-content: center;
        margin-bottom: 16px;
        height: 60px;
    }

    .experience-item h3.count {
        font-size: 3.5rem;
        font-weight: 900;
        color: #111;
        margin: 0;
        line-height: 1;
    }

    .count-plus {
        font-size: 2rem;
        font-weight: 700;
        color: #ffd93d;
        margin-left: 4px;
        line-height: 1;
    }

    .experience-item p {
        font-size: 1rem;
        color: #555;
        margin: 0;
        font-weight: 500;
    }

    /* ===== Animation Styles ===== */
    .fade-up {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s ease;
    }

    .fade-up.show {
        opacity: 1;
        transform: translateY(0);
    }

    /* Stagger animation for grid items */
    .experience-item:nth-child(1) { transition-delay: 0.1s; }
    .experience-item:nth-child(2) { transition-delay: 0.2s; }
    .experience-item:nth-child(3) { transition-delay: 0.3s; }
    .experience-item:nth-child(4) { transition-delay: 0.4s; }

    /* Responsive Design */
    @media (max-width: 992px) {
        .experience-section {
            padding: 80px 40px;
        }
        
        .experience-grid {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 24px;
        }
    }

    @media (max-width: 768px) {
        .experience-section {
            padding: 60px 20px;
        }
        
        .experience-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        
        .experience-item {
            padding: 30px 20px;
        }
        
        .experience-item h3.count {
            font-size: 2.8rem;
        }
        
        .count-plus {
            font-size: 1.6rem;
        }
    }

    @media (max-width: 576px) {
        .experience-grid {
            grid-template-columns: 1fr;
            gap: 16px;
        }
        
        .experience-item {
            padding: 25px 20px;
        }
        
        .experience-item h3.count {
            font-size: 2.5rem;
        }
        
        .count-plus {
            font-size: 1.4rem;
        }
    }
  /* ===== Experience Section ===== */


  /* Services Section */
    /* Services Section */
    .services-section {
        padding: 100px 20px;
        color: #111;
    }

    .services-section .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .services-header {
        text-align: center;
        margin-bottom: 70px;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    .section-badge {
        display: inline-block;
        background: #ffd93d;
        color: #222;
        font-weight: 600;
        padding: 8px 20px;
        border-radius: 30px;
        font-size: 14px;
        margin-bottom: 20px;
        box-shadow: 0 4px 12px rgba(255, 217, 61, 0.2);
    }

    .section-title {
        font-size: clamp(32px, 4vw, 42px);
        font-weight: 800;
        margin: 0 0 20px;
        color: #111;
        line-height: 1.2;
    }

    .section-description {
        font-size: clamp(16px, 1.6vw, 18px);
        color: #555;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Services Grid */
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 30px;
    }

    /* Service Item */
    .service-item {
        background: #fff;
        color: #111;
        border-radius: 16px;
        padding: 35px 25px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        opacity: 0;
        transform: translateY(30px);
        border-left: 4px solid transparent;
    }

    .service-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.1);
        border-left-color: #ffd93d;
    }

    .service-item h4 {
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 12px;
        color: #111;
        line-height: 1.3;
    }

    .service-item p {
        font-size: 1rem;
        line-height: 1.6;
        color: #555;
        margin: 0;
    }

    /* Animation */
    .fade-up {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s ease;
    }

    .fade-up.show {
        opacity: 1;
        transform: translateY(0);
    }

    /* Stagger animation for grid items */
    .service-item:nth-child(1) { transition-delay: 0.1s; }
    .service-item:nth-child(2) { transition-delay: 0.15s; }
    .service-item:nth-child(3) { transition-delay: 0.2s; }
    .service-item:nth-child(4) { transition-delay: 0.25s; }
    .service-item:nth-child(5) { transition-delay: 0.3s; }
    .service-item:nth-child(6) { transition-delay: 0.35s; }
    .service-item:nth-child(7) { transition-delay: 0.4s; }
    .service-item:nth-child(8) { transition-delay: 0.45s; }

    /* Responsive Design */
    @media (max-width: 992px) {
        .services-section {
            padding: 80px 20px;
        }
        
        .services-grid {
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 25px;
        }
    }

    @media (max-width: 768px) {
        .services-section {
            padding: 60px 15px;
        }
        
        .services-header {
            margin-bottom: 50px;
        }
        
        .services-grid {
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }
        
        .service-item {
            padding: 30px 20px;
        }
    }

    @media (max-width: 576px) {
        .services-section {
            padding: 50px 15px;
        }
        
        .services-grid {
            grid-template-columns: 1fr;
            gap: 16px;
        }
        
        .service-item {
            padding: 25px 20px;
        }
    }
  /* Services Section */


  /* OUR BRANDS */
    /* OUR BRANDS */
    .brands-section {
        padding: 100px 20px;
        background-color: #f8f9fa;
    }

    .brands-section .section-title {
        font-size: clamp(32px, 4vw, 42px);
        font-weight: 800;
        margin: 40px 0 24px; /* Added top margin and increased bottom margin */
        color: #111;
        line-height: 1.2;
    }

    .brands-section .section-description {
        font-size: clamp(16px, 1.6vw, 18px);
        color: #555;
        max-width: 700px;
        margin: 0 auto 60px; /* Increased bottom margin */
        line-height: 1.6;
    }

    /* === Slider Wrapper === */
    .brands-slider {
        margin-top: 30px;
        overflow: hidden;
        position: relative;
        width: 100%;
        margin-bottom: 40px;
    }

    .brands-track {
        display: flex;
        width: max-content;
    }

    .brand-slide {
        flex: 0 0 auto;
        width: 200px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 25px 20px;
    }

    .brand-slide img {
        max-width: 160px;
        max-height: 80px;
        object-fit: contain;
        transition: transform 0.3s ease, opacity 0.3s ease;
        opacity: 0.8;
        filter: grayscale(20%);
    }

    .brand-slide img:hover {
        transform: scale(1.05);
        opacity: 1;
        filter: grayscale(0%);
    }

    /* === Animasi Slide === */
    @keyframes scroll-left {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    @keyframes scroll-right {
        0% { transform: translateX(-50%); }
        100% { transform: translateX(0); }
    }

    .slider-1 .brands-track {
        animation: scroll-left 28s linear infinite;
    }
    .slider-2 .brands-track {
        animation: scroll-right 31s linear infinite;
    }
    .slider-3 .brands-track {
        animation: scroll-left 33s linear infinite;
    }

    /* === Animasi Masuk (Fade + Slide) === */
    .fade-up {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.7s ease;
    }
    .fade-up.show {
        opacity: 1;
        transform: translateY(0);
    }

    /* Animasi stagger untuk logo */
    .fade-stagger {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s ease;
    }
    .fade-stagger.show {
        opacity: 1;
        transform: translateY(0);
    }

    /* Stagger animation for sliders */
    .slider-1 { transition-delay: 0.1s; }
    .slider-2 { transition-delay: 0.2s; }
    .slider-3 { transition-delay: 0.3s; }

    /* Responsive Design */
    @media (max-width: 992px) {
        .brands-section {
            padding: 80px 20px;
        }
        
        .brand-slide {
            width: 180px;
            padding: 20px 15px;
        }
        
        .brand-slide img {
            max-width: 140px;
            max-height: 70px;
        }
    }

    @media (max-width: 768px) {
        .brands-section {
            padding: 60px 15px;
        }
        
        .brand-slide {
            width: 160px;
            padding: 15px 10px;
        }
        
        .brand-slide img {
            max-width: 120px;
            max-height: 60px;
        }
    }

    @media (max-width: 576px) {
        .brands-section {
            padding: 50px 15px;
        }
        
        .brand-slide {
            width: 140px;
            padding: 15px 10px;
        }
        
        .brand-slide img {
            max-width: 100px;
            max-height: 50px;
        }
    }
  /* OUR BRANDS */


  /* ===== Proyek Kami Section ===== */
    /* ===== Proyek Kami Section ===== */
    .proyek-section {
        padding: 100px 40px 80px;
    }

    /* Header */
    .proyek-section .section-header {
        text-align: center;
        margin-bottom: 60px;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    .proyek-section .section-badge {
        display: inline-block;
        background: #ffd93d;
        color: #222;
        font-weight: 600;
        padding: 8px 20px;
        border-radius: 30px;
        font-size: 14px;
        margin-bottom: 20px;
        box-shadow: 0 4px 12px rgba(255, 217, 61, 0.2);
    }

    .proyek-section .section-title {
        font-size: clamp(32px, 4vw, 42px);
        font-weight: 800;
        margin: 0 0 16px;
        color: #111;
        line-height: 1.2;
    }

    .proyek-section .section-description {
        font-size: clamp(16px, 1.4vw, 18px);
        color: #555;
        max-width: 750px;
        margin: 0 auto 40px;
        line-height: 1.6;
    }

    /* Grid - Tetap Sama */
    .proyek-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 28px;
        justify-items: center;
        padding: 0 20px;
        width: 100%;
    }

    /* Item */
    .proyek-item {
        position: relative;
        overflow: hidden;
        border-radius: 16px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        width: 100%;
        max-width: 400px;
        background: #fff;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .proyek-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    /* Thumbnail */
    .proyek-thumb {
        display: block;
        position: relative;
        width: 100%;
        aspect-ratio: 1 / 1;
        overflow: hidden;
        border-radius: 16px;
    }

    .proyek-thumb img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 16px;
        transition: transform 0.5s ease, opacity 0.5s ease;
        backface-visibility: hidden;
    }

    .proyek-thumb img.front {
        opacity: 1;
        z-index: 2;
    }

    .proyek-thumb img.back {
        opacity: 0;
        transform: rotateY(90deg);
        z-index: 1;
    }

    .proyek-item:hover .proyek-thumb img.front {
        transform: rotateY(90deg) scale(1.05);
        opacity: 0;
    }

    .proyek-item:hover .proyek-thumb img.back {
        transform: rotateY(0deg) scale(1.05);
        opacity: 1;
    }

    /* Title */
    .proyek-title {
        font-weight: 700;
        margin: 16px 0 0;
        text-align: center;
        font-size: 1.15rem;
        color: #111;
        transition: color 0.3s ease;
        padding: 0 15px;
    }

    .proyek-item:hover .proyek-title {
        color: #7c1415;
    }

    /* ===== Animasi Masuk (Fade + Slide) ===== */
    .fade-up {
        opacity: 0;
        transform: translateY(40px);
        transition: all 0.7s ease;
    }

    .fade-up.show {
        opacity: 1;
        transform: translateY(0);
    }

    .fade-stagger {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s ease;
    }

    .fade-stagger.show {
        opacity: 1;
        transform: translateY(0);
    }

    /* Stagger animation for grid items */
    .proyek-item:nth-child(1) { transition-delay: 0.1s; }
    .proyek-item:nth-child(2) { transition-delay: 0.15s; }
    .proyek-item:nth-child(3) { transition-delay: 0.2s; }
    .proyek-item:nth-child(4) { transition-delay: 0.25s; }
    .proyek-item:nth-child(5) { transition-delay: 0.3s; }
    .proyek-item:nth-child(6) { transition-delay: 0.35s; }
    .proyek-item:nth-child(7) { transition-delay: 0.4s; }
    .proyek-item:nth-child(8) { transition-delay: 0.45s; }

    /* ===== Responsive ===== */
    /* Laptop Medium */
    @media (max-width: 1199.98px) {
        .proyek-section {
            padding: 80px 30px 60px;
        }
        .proyek-grid {
            gap: 22px;
        }
        .proyek-title {
            font-size: 1.1rem;
        }
    }

    /* Tablet Landscape */
    @media (max-width: 991.98px) {
        .proyek-section {
            padding: 70px 25px 50px;
        }
        .proyek-section .section-description {
            margin-bottom: 30px;
        }
        .proyek-grid {
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
        }
        .proyek-title {
            font-size: 1.05rem;
        }
    }

    /* Tablet Portrait */
    @media (max-width: 767.98px) {
        .proyek-section {
            padding: 60px 20px 40px;
        }
        .proyek-section .section-title {
            font-size: 1.8rem;
        }
        .proyek-grid {
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 18px;
        }
        .proyek-title {
            font-size: 1rem;
            margin-top: 12px;
        }
    }

    /* Smartphone */
    @media (max-width: 575.98px) {
        .proyek-section {
            padding: 50px 16px 35px;
        }
        .proyek-section .section-title {
            font-size: 1.6rem;
        }
        .proyek-section .section-description {
            font-size: 0.9rem;
            margin-bottom: 25px;
        }
        .proyek-grid {
            grid-template-columns: 1fr;
            gap: 14px;
            padding: 0 10px;
        }
        .proyek-title {
            font-size: 0.95rem;
            margin: 10px 0 0;
        }
    }

    /* Small Smartphone */
    @media (max-width: 375px) {
        .proyek-section {
            padding: 40px 12px 30px;
        }
        .proyek-section .section-title {
            font-size: 1.4rem;
        }
        .proyek-section .section-description {
            font-size: 0.85rem;
        }
        .proyek-title {
            font-size: 0.9rem;
        }
    }
    /* ===== End Proyek Kami Section ===== */

  /* ===== Proyek Kami Section ===== */


  /* ===== Testimoni Section ===== */
    /* ===== Testimoni Section ===== */
    .testimoni-section {
        padding: 100px 20px 80px;
        color: #111;
        background-color: #f8f9fa;
    }

    /* Header */
    .testimoni-section .section-header {
        text-align: center;
        margin-bottom: 70px;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    .testimoni-section .section-badge {
        display: inline-block;
        background: #ffd93d;
        color: #222;
        font-weight: 600;
        padding: 8px 20px;
        border-radius: 30px;
        font-size: 14px;
        margin-bottom: 20px;
        box-shadow: 0 4px 12px rgba(255, 217, 61, 0.2);
    }

    .testimoni-section .section-title {
        font-size: clamp(32px, 4vw, 42px);
        font-weight: 800;
        margin: 0 0 16px;
        color: #111;
        line-height: 1.2;
    }

    .testimoni-section .section-description {
        font-size: clamp(16px, 1.5vw, 18px);
        color: #555;
        max-width: 700px;
        margin: 0 auto 40px;
        line-height: 1.6;
    }

    /* Slider */
    .testimoni-slider {
        overflow: hidden;
        padding: 10px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .testimoni-track {
        display: flex;
        gap: 24px;
        transition: transform 0.5s ease;
    }

    .testimoni-item {
        flex: 0 0 320px;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
        padding: 28px;
        position: relative;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .testimoni-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    /* Testimoni Content */
    .testimoni-content {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .testimoni-text {
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 20px;
        color: #333;
        font-style: italic;
    }

    .testimoni-user {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .user-info {
        display: flex;
        align-items: center;
    }

    .user-info h4 {
        margin: 0;
        font-size: 1rem;
        font-weight: 700;
        color: #111;
    }

    /* Animation */
    .fade-up {
        opacity: 0;
        transform: translateY(40px);
        transition: all 0.7s ease;
    }

    .fade-up.show {
        opacity: 1;
        transform: translateY(0);
    }

    /* Responsive Design */
    @media (max-width: 1199.98px) {
        .testimoni-section {
            padding: 80px 20px 60px;
        }
        .testimoni-item {
            flex: 0 0 280px;
        }
    }

    @media (max-width: 991.98px) {
        .testimoni-section {
            padding: 70px 20px 50px;
        }
        .testimoni-track {
            gap: 20px;
        }
        .testimoni-item {
            flex: 0 0 260px;
            padding: 24px;
        }
        .testimoni-text {
            font-size: 0.95rem;
        }
        .user-info h4 {
            font-size: 0.95rem;
        }
    }

    @media (max-width: 767.98px) {
        .testimoni-section {
            padding: 60px 15px 40px;
        }
        .testimoni-section .section-title {
            font-size: 1.8rem;
        }
        .testimoni-item {
            flex: 0 0 240px;
            padding: 22px;
        }
        .testimoni-text {
            font-size: 0.9rem;
        }
    }

    @media (max-width: 575.98px) {
        .testimoni-section {
            padding: 50px 15px 35px;
        }
        .testimoni-section .section-title {
            font-size: 1.6rem;
        }
        .testimoni-section .section-description {
            font-size: 0.9rem;
            margin-bottom: 30px;
        }
        .testimoni-track {
            gap: 16px;
        }
        .testimoni-item {
            flex: 0 0 90%;
            margin: 0 auto;
            padding: 20px;
        }
        .testimoni-text {
            font-size: 0.9rem;
        }
    }

    @media (max-width: 375px) {
        .testimoni-section {
            padding: 40px 15px 30px;
        }
        .testimoni-section .section-title {
            font-size: 1.4rem;
        }
        .testimoni-section .section-description {
            font-size: 0.85rem;
        }
        .testimoni-item {
            flex: 0 0 95%;
            padding: 18px;
        }
        .testimoni-text {
            font-size: 0.85rem;
        }
        .user-info h4 {
            font-size: 0.9rem;
        }
    }
  /* ===== Testimoni Section ===== */


  /* ===== Responsive Breakpoints ===== */
    /* Desktop Medium */
    @media (max-width: 1199.98px) {
      .testimoni-section {
        padding: 80px 40px 60px;
      }
      .testimoni-item {
        flex: 0 0 280px;
      }
    }

    /* Tablet Landscape */
    @media (max-width: 991.98px) {
      .testimoni-section {
        padding: 70px 30px 50px;
      }
      .testimoni-track {
        gap: 20px;
      }
      .testimoni-item {
        flex: 0 0 260px;
        padding: 24px;
      }
      .testimoni-text {
        font-size: 0.95rem;
      }
      .user-info h4 {
        font-size: 0.95rem;
      }
    }

    /* Tablet Portrait */
    @media (max-width: 767.98px) {
      .testimoni-section {
        padding: 60px 25px 40px;
      }
      .testimoni-section .section-title {
        font-size: 1.8rem;
      }
      .testimoni-item {
        flex: 0 0 240px;
        padding: 22px;
      }
      .testimoni-text {
        font-size: 0.9rem;
      }
    }

    /* Smartphone */
    @media (max-width: 575.98px) {
      .testimoni-section {
        padding: 50px 20px 35px;
      }
      .testimoni-section .section-title {
        font-size: 1.6rem;
      }
      .testimoni-section .section-description {
        font-size: 0.9rem;
        margin-bottom: 40px;
      }
      .testimoni-track {
        gap: 16px;
      }
      .testimoni-item {
        flex: 0 0 90%;
        margin: 0 auto;
        padding: 20px;
      }
      .testimoni-text {
        font-size: 0.9rem;
      }
    }

    /* Small Smartphone */
    @media (max-width: 375px) {
      .testimoni-section {
        padding: 40px 15px 30px;
      }
      .testimoni-section .section-title {
        font-size: 1.4rem;
      }
      .testimoni-section .section-description {
        font-size: 0.85rem;
      }
      .testimoni-item {
        flex: 0 0 95%;
        padding: 18px;
      }
      .testimoni-text {
        font-size: 0.85rem;
      }
      .user-info h4 {
        font-size: 0.9rem;
      }
    }
    /* ===== End Testimoni Section ===== */

  /* ===== Testimoni Section ===== */





  /* ===== CTA Section ===== */
    .cta-section {
        position: relative;
        padding: 120px 20px;
        text-align: center;
        overflow: hidden;
        z-index: 1;
        transition: background 0.4s ease, color 0.4s ease;
        color: #111;
    }

    /* Background - TIDAK DIUBAH */
    .cta-bg {
        position: absolute;
        inset: 0;
        background: url('{{ asset("img/galeri-proyek/3.jpg") }}') no-repeat center center/cover;
        background-attachment: fixed;
        opacity: 0.35;
        filter: brightness(0.7);
        z-index: 0;
        pointer-events: none;
    }

    .cta-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        margin: 0 auto;
    }

    .cta-title {
        font-size: clamp(32px, 4vw, 44px);
        font-weight: 800;
        margin-bottom: 24px;
        color: #111;
        line-height: 1.2;
    }

    .cta-description {
        font-size: clamp(16px, 1.5vw, 18px);
        margin-bottom: 50px;
        line-height: 1.7;
        color: #333;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Actions - Tanpa Icon */
    .cta-actions {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 18px;
        margin-bottom: 50px;
    }

    .cta-actions .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 16px 28px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 16px;
        transition: all 0.35s ease;
        text-decoration: none;
        min-width: 200px;
    }

    .cta-actions .btn-primary {
        background: #ffd93d;
        color: #222;
        box-shadow: 0 8px 24px rgba(255, 217, 61, .4);
    }

    .cta-actions .btn-primary:hover {
        background: #e6c233;
        transform: translateY(-3px);
        box-shadow: 0 12px 28px rgba(255, 217, 61, .55);
    }

    .cta-actions .btn-outline {
        border: 2px solid #222;
        background: transparent;
        color: #222;
    }

    .cta-actions .btn-outline:hover {
        background: #222;
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 12px 28px rgba(0,0,0,.15);
    }

    /* Contact Info - Tanpa Icon */
    .contact-info {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 28px;
        font-size: 16px;
        max-width: 600px;
        margin: 0 auto;
    }

    .contact-item {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition: transform 0.3s ease, color 0.3s ease;
        color: #111;
        padding: 8px 16px;
        border-radius: 30px;
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(4px);
    }

    .contact-item:hover {
        transform: translateY(-3px);
        color: #7c1415;
        background: rgba(255, 255, 255, 0.9);
    }

    /* Responsive */
    @media (max-width: 991.98px) {
        .cta-section {
            padding: 100px 20px;
        }
        .cta-actions .btn {
            padding: 14px 24px;
            font-size: 15px;
            min-width: 180px;
        }
    }

    @media (max-width: 575.98px) {
        .cta-section {
            padding: 80px 16px;
        }
        .cta-title {
            font-size: 1.6rem;
        }
        .cta-description {
            font-size: 0.95rem;
        }
        .cta-actions {
            gap: 14px;
            flex-direction: column;
            align-items: center;
        }
        .cta-actions .btn {
            width: 100%;
            max-width: 300px;
            justify-content: center;
        }
        .contact-info {
            flex-direction: column;
            gap: 18px;
        }
        .contact-item {
            width: 100%;
            max-width: 300px;
        }
    }
  /* ===== CTA Section ===== */


  /* Responsive Design and dark and light text mode */
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
      .section-title {
          color: #1e293b;
      }

      .section-description {
          color: #64748b;
      }

      .product-card h3 {
          color: #2d3748;
      }

      .product-card p {
          color: #64748b;
      }

      .service-content h4 {
          color: #2d3748;
      }

      .service-content p {
          color: #64748b;
      }

      .grid-item span {
          color: #2d3748;
      }
  /* Responsive Design and dark and light text mode */


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
    /* ===== HERO SLIDER: Autoplay tetap jalan saat scroll (rAF + deadline) ===== */
    (function(){
      const slider = document.querySelector('.hero-slider');
      if (!slider) return;

      const slides = Array.from(slider.querySelectorAll('.hero-slide'));
      const dots   = Array.from(slider.querySelectorAll('.hero-dots .dot'));
      const prevBtn = slider.querySelector('.hero-prev');
      const nextBtn = slider.querySelector('.hero-next');

      const AUTOPLAY = (slider.getAttribute('data-autoplay') || 'true') === 'true';
      const INTERVAL = parseInt(slider.getAttribute('data-interval') || '5600', 10);

      // Durasi sinkron dengan CSS
      const STAGGER_STEP = 140;
      const TEXT_IN  = 880;
      const TEXT_OUT = 560;
      const OUT_TOTAL = TEXT_OUT + (STAGGER_STEP * 3);
      const SLIDE_FADE = 1600;

      let index = Math.max(0, slides.findIndex(s => s.classList.contains('is-active')));
      if (index < 0) index = 0;

      let isAnimating = false;
      let rafId = null;
      let deadline = performance.now() + INTERVAL;

      function updateAria(){
        slides.forEach((s,i)=>{
          const active = i === index;
          s.setAttribute('aria-hidden', active ? 'false' : 'true');
        });
        dots.forEach((d,i)=>{
          const active = i === index;
          d.classList.toggle('is-active', active);
          d.setAttribute('aria-selected', active ? 'true' : 'false');
        });
      }

      function goTo(nextIndex, mode /* 'auto' | 'manual' */){
        if (isAnimating) return;
        nextIndex = (nextIndex + slides.length) % slides.length;
        if (nextIndex === index) { deadline = performance.now() + INTERVAL; return; }

        const current = slides[index];
        const next    = slides[nextIndex];
        const currC   = current.querySelector('.hero-content');
        const nextC   = next.querySelector('.hero-content');

        isAnimating = true;

        if (mode === 'auto') {
          currC?.classList.remove('anim-in','quick-hide');
          void currC?.offsetWidth;
          currC?.classList.add('anim-out');

          setTimeout(() => {
            current.classList.remove('is-active');
            next.classList.add('is-active');

            nextC?.classList.remove('anim-out','quick-hide');
            void nextC?.offsetWidth;
            nextC?.classList.add('anim-in');

            index = nextIndex;
            updateAria();

            setTimeout(() => { isAnimating = false; }, Math.max(SLIDE_FADE, TEXT_IN + (STAGGER_STEP * 3)));
          }, OUT_TOTAL);
        } else {
          currC?.classList.remove('anim-in','anim-out');
          currC?.classList.add('quick-hide');

          next.classList.add('is-active');
          requestAnimationFrame(()=> current.classList.remove('is-active'));

          nextC?.classList.remove('anim-out','quick-hide');
          void nextC?.offsetWidth;
          nextC?.classList.add('anim-in');

          index = nextIndex;
          updateAria();

          setTimeout(()=>{ isAnimating = false; }, SLIDE_FADE * 0.9);
        }

        deadline = performance.now() + INTERVAL;
      }

      function nextSlide(mode='auto'){ goTo(index+1, mode); }
      function prevSlide(mode='manual'){ goTo(index-1, mode); }

      function tick(now){
        if (AUTOPLAY && !isAnimating && now >= deadline) {
          nextSlide('auto');
        }
        rafId = requestAnimationFrame(tick);
      }

      nextBtn?.addEventListener('click', ()=> { nextSlide('manual'); });
      prevBtn?.addEventListener('click', ()=> { prevSlide('manual'); });
      dots.forEach((dot,i)=> dot.addEventListener('click', ()=> goTo(i,'manual')));

      document.addEventListener('visibilitychange', ()=>{
        if (document.visibilityState === 'visible') {
          deadline = performance.now() + INTERVAL;
        }
      });

      updateAria();
      cancelAnimationFrame(rafId);
      rafId = requestAnimationFrame(tick);
    })();
  </script>


  <script>
    /* ===== Slider Auto Scroll Infinite Loop ===== */
    const track = document.querySelector('.testimoni-track');
    let position = 0;
    let items = document.querySelectorAll('.testimoni-item');
    const gap = 24;

    function updateItemWidth(){
      items = document.querySelectorAll('.testimoni-item');
      return items[0].offsetWidth + gap;
    }

    let itemWidth = updateItemWidth();
    const totalItems = items.length;

    function slideTestimoni(){
      position += itemWidth;
      track.style.transition = 'transform 0.5s linear';
      track.style.transform = `translateX(-${position}px)`;

      if(position >= itemWidth * (totalItems / 2)){ // reset after half (duplikasi)
        setTimeout(()=>{
          track.style.transition = 'none';
          position = 0;
          track.style.transform = `translateX(-${position}px)`;
        },500);
      }
    }

    window.addEventListener('resize', ()=>{
      itemWidth = updateItemWidth();
    });

    setInterval(slideTestimoni, 3500);
  </script>


  <script>
    /* ===== Count Up Animation on Scroll ===== */
    const counters = document.querySelectorAll('.count');
    const speed = 200;

    const observerCount = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if(entry.isIntersecting){
          const counter = entry.target;
          const updateCount = () => {
            const target = +counter.getAttribute('data-target');
            const count = +counter.innerText;
            const increment = Math.ceil(target / speed);
            if(count < target){
              counter.innerText = count + increment;
              setTimeout(updateCount, 20);
            } else {
              counter.innerText = target;
            }
          };
          updateCount();
          observerCount.unobserve(counter);
        }
      });
    }, { threshold: 0.5 });

    counters.forEach(counter => {
      observerCount.observe(counter);
    });

    /* ===== Fade-Up Animation on Scroll ===== */
    const fadeUps = document.querySelectorAll('.fade-up');

    const observerFade = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if(entry.isIntersecting){
          entry.target.classList.add('show');
          observerFade.unobserve(entry.target);
        }
      });
    }, { threshold: 0.2 });

    fadeUps.forEach(el => observerFade.observe(el));
  </script>


  <script>
    // Simple Intersection Observer untuk animasi masuk
    document.addEventListener("DOMContentLoaded", () => {
      const reveals = document.querySelectorAll(".product-item");
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if(entry.isIntersecting){
            entry.target.classList.add("show");
            observer.unobserve(entry.target); // animasi sekali saja
          }
        });
      }, { threshold: 0.2 });

      reveals.forEach(el => observer.observe(el));
    });
  </script>


  <script>
    /* Fade-Up Animation with Delay */
    const fadeUps = document.querySelectorAll('.fade-up');

    const observerFade = new IntersectionObserver(entries => {
      entries.forEach((entry, i) => {
        if(entry.isIntersecting){
          setTimeout(() => {
            entry.target.classList.add('show');
          }, i * 150); // delay antar item
          observerFade.unobserve(entry.target);
        }
      });
    }, { threshold: 0.2 });

    fadeUps.forEach(el => observerFade.observe(el));
  </script>


  <script>
    /* Intersection Observer untuk animasi masuk */
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          // Kalau ada class fade-stagger → kasih delay per elemen
          if (entry.target.classList.contains("fade-stagger")) {
            const index = [...entry.target.parentNode.children].indexOf(entry.target);
            entry.target.style.transitionDelay = `${(index % 10) * 0.1}s`;
          }
          entry.target.classList.add("show");
        }
      });
    }, { threshold: 0.15 });

    // Apply ke semua elemen
    document.querySelectorAll('.fade-up, .fade-stagger').forEach((el) => observer.observe(el));
  </script>

@endsection