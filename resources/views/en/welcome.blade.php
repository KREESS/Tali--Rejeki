@extends('en.components.layout')

@section('title', 'Distributor Insulasi Industri Terpercaya')

@section('content')

<!-- Hero Section (Improved, 5 slides + fixed button focus ring) -->
<section class="hero-section" aria-label="Tali Rejeki Hero">
  <!-- Original Background (unchanged) -->
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
    <article id="slide-1" class="hero-slide is-active" data-index="0" data-align="left" data-ken="right"
             aria-roledescription="slide" aria-label="1 of 5"
             style="--slide-bg: url('{{ asset("img/hero/3.jpg") }}');">
      <div class="slide-bg" aria-hidden="true"></div>
      <div class="slide-scrim" aria-hidden="true"></div>

      <div class="hero-inner">
        <div class="hero-content anim-in">
          <div class="hero-badge hc hc-1">
            <i class="fas fa-award" aria-hidden="true"></i>
            <span>Trusted Distributor Since 2011</span>
          </div>
          <h1 class="hero-title hc hc-2">
            <span class="highlight">Tali Rejeki</span>
            <span class="subtitle">Industrial & HVAC Insulation Specialists</span>
          </h1>
          <p class="hero-description hc hc-3">
            Official stock of Glasswool, Rockwool, Nitrile Rubber, and HVAC accessories. Competitive pricing, fast delivery, and guaranteed authenticity.
          </p>
          <div class="hero-actions hc hc-4">
            <a href="#products" class="btn btn-primary"><i class="fas fa-cubes"></i> View Products</a>
            <a href="#contact" class="btn btn-outline"><i class="fas fa-phone"></i> Contact Us</a>
          </div>
        </div>
      </div>
    </article>

    <!-- Slide 2 -->
    <article id="slide-2" class="hero-slide" data-index="1" data-align="center" data-ken="left"
             aria-roledescription="slide" aria-label="2 of 5"
             style="--slide-bg: url('{{ asset("img/hero/158.jpg") }}');">
      <div class="slide-bg" aria-hidden="true"></div>
      <div class="slide-scrim" aria-hidden="true"></div>

      <div class="hero-inner">
        <div class="hero-content">
          <div class="hero-badge hc hc-1">
            <i class="fas fa-fire" aria-hidden="true"></i>
            <span>Glasswool & Rockwool</span>
          </div>
          <h2 class="hero-title hc hc-2">
            <span class="highlight">Thermal Insulation</span>
            <span class="subtitle">Efficient & Long-Lasting</span>
          </h2>
          <p class="hero-description hc hc-3">
            Reduce energy consumption and enhance acoustic comfort. Available in various densities and thicknesses according to project standards.
          </p>
          <div class="hero-actions hc hc-4">
            <a href="#products" class="btn btn-primary"><i class="fas fa-cubes"></i> View Products</a>
            <a href="#contact" class="btn btn-outline"><i class="fas fa-phone"></i> Free Consultation</a>
          </div>
        </div>
      </div>
    </article>

    <!-- Slide 3 -->
    <article id="slide-3" class="hero-slide" data-index="2" data-align="right" data-ken="up"
             aria-roledescription="slide" aria-label="3 of 5"
             style="--slide-bg: url('{{ asset("img/hero/8.jpg") }}');">
      <div class="slide-bg" aria-hidden="true"></div>
      <div class="slide-scrim" aria-hidden="true"></div>

      <div class="hero-inner">
        <div class="hero-content">
          <div class="hero-badge hc hc-1">
            <i class="fas fa-tools" aria-hidden="true"></i>
            <span>Nitrile Rubber & Accessories</span>
          </div>
          <h2 class="hero-title hc hc-2">
            <span class="highlight">HVAC Solutions</span>
            <span class="subtitle">Comprehensive & Ready to Ship</span>
          </h2>
          <p class="hero-description hc hc-3">
            Insulation pipes, ducting, adhesives, aluminum foil, and accessories—condensation-free, neat, and easy to install.
          </p>
          <div class="hero-actions hc hc-4">
            <a href="#products" class="btn btn-primary"><i class="fas fa-cubes"></i> View Catalog</a>
            <a href="#contact" class="btn btn-outline"><i class="fas fa-phone"></i> Contact Sales</a>
          </div>
        </div>
      </div>
    </article>

    <!-- Slide 4 -->
    <article id="slide-4" class="hero-slide" data-index="3" data-align="left" data-ken="down"
             aria-roledescription="slide" aria-label="4 of 5"
             style="--slide-bg: url('{{ asset("img/hero/9.jpg") }}');">
      <div class="slide-bg" aria-hidden="true"></div>
      <div class="slide-scrim" aria-hidden="true"></div>

      <div class="hero-inner">
        <div class="hero-content">
          <div class="hero-badge hc hc-1">
            <i class="fas fa-warehouse" aria-hidden="true"></i>
            <span>Nationwide Ready Stock</span>
          </div>
          <h2 class="hero-title hc hc-2">
            <span class="highlight">Fast Delivery</span>
            <span class="subtitle">To 50+ Cities</span>
          </h2>
          <p class="hero-description hc hc-3">
            Based in Bekasi. Daily shipping—saving time and costs for industrial and commercial projects.
          </p>
          <div class="hero-actions hc hc-4">
            <a href="#contact" class="btn btn-primary"><i class="fas fa-shipping-fast"></i> Check Availability</a>
            <a href="#products" class="btn btn-outline"><i class="fas fa-cubes"></i> View Products</a>
          </div>
        </div>
      </div>
    </article>

    <!-- Slide 5 -->
    <article id="slide-5" class="hero-slide" data-index="4" data-align="center" data-ken="right"
             aria-roledescription="slide" aria-label="5 of 5"
             style="--slide-bg: url('{{ asset("img/hero/7.jpg") }}');">
      <div class="slide-bg" aria-hidden="true"></div>
      <div class="slide-scrim" aria-hidden="true"></div>

      <div class="hero-inner">
        <div class="hero-content">
          <div class="hero-badge hc hc-1">
            <i class="fas fa-headset" aria-hidden="true"></i>
            <span>Technical Support</span>
          </div>
          <h2 class="hero-title hc hc-2">
            <span class="highlight">Project Consultation</span>
            <span class="subtitle">Professional & Complimentary</span>
          </h2>
          <p class="hero-description hc hc-3">
            Our technical team assists in material selection and requirement estimation. Obtain precise specifications from the outset.
          </p>
          <div class="hero-actions hc hc-4">
            <a href="#contact" class="btn btn-primary"><i class="fas fa-comments"></i> Consult Now</a>
            <a href="#products" class="btn btn-outline"><i class="fas fa-cubes"></i> Explore Catalog</a>
          </div>
        </div>
      </div>
    </article>

    <!-- Navigation -->
    <div class="hero-nav">
      <button class="hero-prev" aria-label="Previous slide" title="Previous" type="button">
        <svg viewBox="0 0 24 24" width="22" height="22" aria-hidden="true"><path d="M15 18l-6-6 6-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </button>
      <button class="hero-next" aria-label="Next slide" title="Next" type="button">
        <svg viewBox="0 0 24 24" width="22" height="22" aria-hidden="true"><path d="M9 6l6 6-6 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </button>
    </div>

    <!-- Dots (5 total) -->
    <div class="hero-dots" role="tablist" aria-label="Slide navigation">
      <button class="dot is-active" role="tab" aria-selected="true" aria-controls="slide-1" title="Slide 1"></button>
      <button class="dot" role="tab" aria-selected="false" aria-controls="slide-2" title="Slide 2"></button>
      <button class="dot" role="tab" aria-selected="false" aria-controls="slide-3" title="Slide 3"></button>
      <button class="dot" role="tab" aria-selected="false" aria-controls="slide-4" title="Slide 4"></button>
      <button class="dot" role="tab" aria-selected="false" aria-controls="slide-5" title="Slide 5"></button>
    </div>
  </div>
</section>



<!-- Products Section (6 items, square images, flip on hover - robust) -->
<section id="products" class="products-section">
  <div class="container">
    <div class="section-header">
      <div class="section-badge">
        <i class="fas fa-cubes"></i>
        <span>Featured Products</span>
      </div>
      <h2 class="section-title">Comprehensive Insulation Solutions</h2>
      <p class="section-description">
        Premium insulation materials tailored for your industrial requirements
      </p>
    </div>

    <div class="row product-grid">
      <!-- ROCKWOOL -->
      <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
        <div class="product-item reveal">
          <a class="pi-thumb" href="{{ url('/products/rockwool') }}" aria-label="ROCKWOOL Details">
            <div class="pi-stage" aria-hidden="true">
              <img class="pi-img front" src="{{ asset('img/landing/22.png') }}" alt="Rockwool Front" loading="lazy" decoding="async">
              <img class="pi-img back"  src="{{ asset('img/landing/23.png') }}" alt="Rockwool Back" loading="lazy" decoding="async">
            </div>
          </a>
          <h3 class="pi-title">ROCKWOOL</h3>
          <p class="pi-desc">Stone fiber with high fire resistance and excellent acoustic performance.</p>
          <ul class="pi-features">
            <li><i class="fas fa-check"></i> Fire-resistant</li>
            <li><i class="fas fa-check"></i> Heat and sound reduction</li>
            <li><i class="fas fa-check"></i> Suitable for HVAC & industrial applications</li>
          </ul>
          <a href="{{ url('/products/rockwool') }}" class="pi-link">Learn More <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>

      <!-- GLASSWOOL -->
      <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
        <div class="product-item reveal">
          <a class="pi-thumb" href="{{ url('/products/glasswool') }}" aria-label="GLASSWOOL Details">
            <div class="pi-stage" aria-hidden="true">
              <img class="pi-img front" src="{{ asset('img/landing/24.png') }}" alt="Glasswool Front" loading="lazy" decoding="async">
              <img class="pi-img back"  src="{{ asset('img/landing/25.png') }}" alt="Glasswool Back" loading="lazy" decoding="async">
            </div>
          </a>
          <h3 class="pi-title">GLASSWOOL</h3>
          <p class="pi-desc">Lightweight glass fiber for thermal and acoustic insulation, easy to apply.</p>
          <ul class="pi-features">
            <li><i class="fas fa-check"></i> Lightweight & flexible</li>
            <li><i class="fas fa-check"></i> Soundproof</li>
            <li><i class="fas fa-check"></i> Mold & rust resistant</li>
          </ul>
          <a href="{{ url('/products/glasswool') }}" class="pi-link">Learn More <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>

      <!-- CALCIUM SILICATE -->
      <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
        <div class="product-item reveal">
          <a class="pi-thumb" href="{{ url('/products/calcium-silicate') }}" aria-label="CALCIUM SILICATE Details">
            <div class="pi-stage" aria-hidden="true">
              <img class="pi-img front" src="{{ asset('img/landing/26.png') }}" alt="Calcium Silicate Front" loading="lazy" decoding="async">
              <img class="pi-img back"  src="{{ asset('img/landing/27.png') }}" alt="Calcium Silicate Back" loading="lazy" decoding="async">
            </div>
          </a>
          <h3 class="pi-title">CALCIUM SILICATE</h3>
          <p class="pi-desc">Rigid insulation boards for high-temperature applications with good compressive strength.</p>
          <ul class="pi-features">
            <li><i class="fas fa-check"></i> Stable at high temperatures</li>
            <li><i class="fas fa-check"></i> Strong & moisture resistant</li>
            <li><i class="fas fa-check"></i> Long service life</li>
          </ul>
          <a href="{{ url('/products/calcium-silicate') }}" class="pi-link">Learn More <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>

      <!-- CERAMIC FIBER -->
      <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
        <div class="product-item reveal">
          <a class="pi-thumb" href="{{ url('/products/ceramic-fiber') }}" aria-label="CERAMIC FIBER Details">
            <div class="pi-stage" aria-hidden="true">
              <img class="pi-img front" src="{{ asset('img/landing/28.png') }}" alt="Ceramic Fiber Front" loading="lazy" decoding="async">
              <img class="pi-img back"  src="{{ asset('img/landing/29.png') }}" alt="Ceramic Fiber Back" loading="lazy" decoding="async">
            </div>
          </a>
          <h3 class="pi-title">CERAMIC FIBER</h3>
          <p class="pi-desc">High-temperature resistant blankets and boards, lightweight and efficient.</p>
          <ul class="pi-features">
            <li><i class="fas fa-check"></i> Resistant to thermal shock</li>
            <li><i class="fas fa-check"></i> Low thermal conductivity</li>
            <li><i class="fas fa-check"></i> Lightweight</li>
          </ul>
          <a href="{{ url('/products/ceramic-fiber') }}" class="pi-link">Learn More <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>

      <!-- ARMACEL / ARMAFLEX -->
      <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
        <div class="product-item reveal">
          <a class="pi-thumb" href="{{ url('/products/armacel-armaflex') }}" aria-label="ARMACEL / ARMAFLEX Details">
            <div class="pi-stage" aria-hidden="true">
              <img class="pi-img front" src="{{ asset('img/landing/30.png') }}" alt="Armacel Armaflex Front" loading="lazy" decoding="async">
              <img class="pi-img back"  src="{{ asset('img/landing/31.png') }}" alt="Armacel Armaflex Back" loading="lazy" decoding="async">
            </div>
          </a>
          <h3 class="pi-title">ARMACEL - ARMAFLEX</h3>
          <p class="pi-desc">Elastomeric foam for AC and chiller pipes with effective vapor barrier properties.</p>
          <ul class="pi-features">
            <li><i class="fas fa-check"></i> Prevents condensation</li>
            <li><i class="fas fa-check"></i> Flexible & neat installation</li>
            <li><i class="fas fa-check"></i> Moisture resistant</li>
          </ul>
          <a href="{{ url('/products/armaflex') }}" class="pi-link">Learn More <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>

      <!-- ALUMINIUM SHEET [JACKETING] -->
      <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
        <div class="product-item reveal">
          <a class="pi-thumb" href="{{ url('/products/aluminium-sheet-jacketing') }}" aria-label="ALUMINIUM SHEET [JACKETING] Details">
            <div class="pi-stage" aria-hidden="true">
              <img class="pi-img front" src="{{ asset('img/landing/32.png') }}" alt="Aluminium Sheet Jacketing Front" loading="lazy" decoding="async">
              <img class="pi-img back"  src="{{ asset('img/landing/33.png') }}" alt="Aluminium Sheet Jacketing Back" loading="lazy" decoding="async">
            </div>
          </a>

          <h3 class="pi-title">ALUMINIUM SHEET [JACKETING]</h3>

          <p class="pi-desc">Protective jacketing material to safeguard insulation against external damage.</p>
          <ul class="pi-features">
            <li><i class="fas fa-check"></i> Corrosion & extreme weather resistant</li>
            <li><i class="fas fa-check"></i> Lightweight yet durable</li>
            <li><i class="fas fa-check"></i> Provides additional protection for insulation</li>
            <li><i class="fas fa-check"></i> Long-lasting & low maintenance</li>
          </ul>

          <a href="{{ url('/products/aluminium-sheet') }}" class="pi-link">
            Learn More <i class="fas fa-arrow-right"></i>
          </a>
        </div>
      </div>

    </div>
  </div>
</section>



<!-- ===== Our Experience Section ===== -->
<section class="experience-section" id="experience">
  <div class="background-image"></div>
  <div class="overlay"></div> <!-- ✅ overlay transparan -->

  <div class="section-header fade-up">
    <span class="section-badge"><i class="fas fa-star"></i> Our Experience</span>
    <h2 class="section-title">14+ Years Providing the Best Services</h2>
    <p class="section-description">
      We are committed to delivering high-quality industrial products and services with extensive experience.
    </p>
  </div>

  <div class="experience-grid">
    <div class="experience-item fade-up">
      <h3 class="count" data-target="14">0</h3>
      <p>Years of Experience</p>
    </div>
    <div class="experience-item fade-up">
      <h3 class="count" data-target="250">0</h3>
      <p>Industrial Projects</p>
    </div>
    <div class="experience-item fade-up">
      <h3 class="count" data-target="120">0</h3>
      <p>Satisfied Clients</p>
    </div>
    <div class="experience-item fade-up">
      <h3 class="count" data-target="50">0</h3>
      <p>Professional Team</p>
    </div>
  </div>
</section>



<!-- Services Section -->
<section class="services-section" id="services">
  <div class="container">
    <div class="services-header fade-up">
      <div class="section-badge">
        <i class="fas fa-hand-holding-heart"></i>
        <span>Tali Rejeki</span>
      </div>
      <h2 class="section-title">Comprehensive Solutions for All Your Needs</h2>
      <p class="section-description">
        Tali Rejeki offers a wide range of professional and reliable services. 
        From consultation and distribution to guaranteed quality at competitive pricing.
      </p>
    </div>

    <div class="services-grid">
      <div class="service-item fade-up">
        <div class="service-icon"><i class="fas fa-hands-helping"></i></div>
        <h4>Professional Guidance</h4>
        <p>Our expert team is ready to provide precise and prompt solutions.</p>
      </div>

      <div class="service-item fade-up">
        <div class="service-icon"><i class="fas fa-comments"></i></div>
        <h4>Consultation & Advice</h4>
        <p>Receive recommendations tailored to your business and project requirements.</p>
      </div>

      <div class="service-item fade-up">
        <div class="service-icon"><i class="fas fa-truck"></i></div>
        <h4>Extensive Distribution</h4>
        <p>Fast delivery services throughout Indonesia.</p>
      </div>

      <div class="service-item fade-up">
        <div class="service-icon"><i class="fas fa-shield-alt"></i></div>
        <h4>Guaranteed Quality</h4>
        <p>Every service is executed according to the highest professional standards.</p>
      </div>

      <div class="service-item fade-up">
        <div class="service-icon"><i class="fas fa-clock"></i></div>
        <h4>Punctual Service</h4>
        <p>Ensuring your projects and services are always on schedule.</p>
      </div>

      <div class="service-item fade-up">
        <div class="service-icon"><i class="fas fa-users"></i></div>
        <h4>Professional Team</h4>
        <p>Supported by experienced and dedicated specialists.</p>
      </div>

      <div class="service-item fade-up">
        <div class="service-icon"><i class="fas fa-tags"></i></div>
        <h4>Competitive Pricing</h4>
        <p>Offering services at competitive rates without compromising quality.</p>
      </div>

      <div class="service-item fade-up">
        <div class="service-icon"><i class="fas fa-th-large"></i></div>
        <h4>Comprehensive Services</h4>
        <p>One-stop solution with a wide array of services to meet your requirements.</p>
      </div>
    </div>
  </div>
</section>



<!-- Our Brands Section -->
<section id="brands" class="brands-section py-5 fade-section">
  <div class="container text-center">
    <div class="section-badge mb-3 fade-up">
      <i class="fas fa-star"></i>
      <span>Our Brands</span>
    </div>
    <h2 class="section-title fade-up">Collaborating with Leading Brands</h2>
    <p class="section-description fade-up">
      Below are some of the distinguished brands that have placed their trust in us.
    </p>

    @for ($row = 1; $row <= 3; $row++)
      @php
        $brands = range(1, 20);
        shuffle($brands); // randomize order
      @endphp

      <div class="brands-slider slider-{{ $row }} fade-up">
        <div class="brands-track">
          @foreach ($brands as $i)
            <div class="brand-slide fade-stagger">
              <img src="{{ asset('img/brands/' . $i . '.png') }}" alt="Brand {{ $i }}">
            </div>
          @endforeach

          <!-- Duplicate for seamless loop -->
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



<!-- ===== Our Projects Section ===== -->
<section class="proyek-section fade-section" id="proyek">
  <div class="section-header">
    <span class="section-badge fade-up"><i class="fas fa-briefcase"></i> Our Projects</span>
    <h2 class="section-title fade-up">Projects We Have Completed</h2>
    <p class="section-description fade-up">Some of our best projects, showcasing high quality and satisfying results.</p>
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

    <!-- Bambulogy Mansion Project -->
    <div class="proyek-item fade-stagger">
      <a href="#" class="proyek-thumb">
        <img class="front" src="img/proyek/bambulogy1.jpg" alt="Bambulogy Mansion Project">
        <img class="back" src="img/proyek/bambulogy2.jpg" alt="Bambulogy Mansion Project">
      </a>
      <h3 class="proyek-title">Bambulogy Mansion Project</h3>
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

    <!-- Ainul Hayat Sejahtera Project -->
    <div class="proyek-item fade-stagger">
      <a href="#" class="proyek-thumb">
        <img class="front" src="img/proyek/ainul1.jpg" alt="Ainul Hayat Sejahtera Project">
        <img class="back" src="img/proyek/ainul2.jpg" alt="Ainul Hayat Sejahtera Project">
      </a>
      <h3 class="proyek-title">Ainul Hayat Sejahtera Project</h3>
    </div>

    <!-- Genset Noise Reduction Project -->
    <div class="proyek-item fade-stagger">
      <a href="#" class="proyek-thumb">
        <img class="front" src="img/proyek/genset1.jpg" alt="Genset Noise Reduction Project">
        <img class="back" src="img/proyek/genset2.jpg" alt="Genset Noise Reduction Project">
      </a>
      <h3 class="proyek-title">Genset Noise Reduction Project</h3>
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



<!-- ===== What They Say Section ===== -->
<section class="testimoni-section" id="testimoni">
  <div class="section-header">
    <span class="section-badge"><i class="fas fa-quote-left"></i> What They Say</span>
    <h2 class="section-title">Our Client Testimonials</h2>
    <p class="section-description">Opinions and experiences of our clients working with us, reflecting the quality and satisfaction of our industrial services.</p>
  </div>

  <div class="testimoni-slider">
    <div class="testimoni-track">
      <!-- Testimoni Items -->
      <div class="testimoni-item">
        <div class="testimoni-content">
          <p class="testimoni-text">"The insulation products are highly quality and easy to apply on our production machines."</p>
          <div class="testimoni-user">
            <div class="user-info">
              <h4>Jane Doe</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="testimoni-item">
        <div class="testimoni-content">
          <p class="testimoni-text">"Fast service and technicians were very helpful in installing our industrial insulation."</p>
          <div class="testimoni-user">
            <div class="user-info">
              <h4>John Smith</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="testimoni-item">
        <div class="testimoni-content">
          <p class="testimoni-text">"The products are durable and withstand high heat, perfect for our factory."</p>
          <div class="testimoni-user">
            <div class="user-info">
              <h4>Ali Rahman</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="testimoni-item">
        <div class="testimoni-content">
          <p class="testimoni-text">"Support team is always ready to help, and the insulation matches our specifications."</p>
          <div class="testimoni-user">
            <div class="user-info">
              <h4>Siti Nurhaliza</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="testimoni-item">
        <div class="testimoni-content">
          <p class="testimoni-text">"Very satisfied with the insulation results, reducing heat leakage and improving energy efficiency."</p>
          <div class="testimoni-user">
            <div class="user-info">
              <h4>Budi Santoso</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="testimoni-item">
        <div class="testimoni-content">
          <p class="testimoni-text">"High-quality materials and fast installation keep our production optimal."</p>
          <div class="testimoni-user">
            <div class="user-info">
              <h4>Lina Kusuma</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="testimoni-item">
        <div class="testimoni-content">
          <p class="testimoni-text">"The insulation is safe and meets industry standards, highly recommended."</p>
          <div class="testimoni-user">
            <div class="user-info">
              <h4>Rudi Hartono</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="testimoni-item">
        <div class="testimoni-content">
          <p class="testimoni-text">"Excellent product quality and the team is very responsive in handling our inquiries."</p>
          <div class="testimoni-user">
            <div class="user-info">
              <h4>Tari Wijaya</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="testimoni-item">
        <div class="testimoni-content">
          <p class="testimoni-text">"The insulation works perfectly on our industrial machines, efficiency increased significantly."</p>
          <div class="testimoni-user">
            <div class="user-info">
              <h4>Andi Pratama</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="testimoni-item">
        <div class="testimoni-content">
          <p class="testimoni-text">"Very satisfied! Quick installation, strong materials, and improved machine performance."</p>
          <div class="testimoni-user">
            <div class="user-info">
              <h4>Rina Safitri</h4>
            </div>
          </div>
        </div>
      </div>

      <!-- Duplicate for infinite loop -->
      <div class="testimoni-item">
        <div class="testimoni-content">
          <p class="testimoni-text">"The insulation products are highly quality and easy to apply on our production machines."</p>
          <div class="testimoni-user">
            <div class="user-info">
              <h4>Jane Doe</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="testimoni-item">
        <div class="testimoni-content">
          <p class="testimoni-text">"Fast service and technicians were very helpful in installing our industrial insulation."</p>
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
<section id="contact" class="cta-section">
  <!-- Background -->
  <div class="cta-bg">
    <div class="cta-overlay"></div>
  </div>

  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-lg-10">
        <div class="cta-content">
          <h2 class="cta-title">Ready to Start Your Insulation Project?</h2>
          <p class="cta-description">
            Get the best quote and free consultation from our expert team. 
            Contact us now for the right insulation solution!
          </p>

          <!-- Actions -->
          <div class="cta-actions">
            <a href="tel:+62-21-29470622" class="btn btn-primary">
              <i class="fas fa-phone"></i>
              <span>Call Now</span>
            </a>
            <a href="https://wa.me/6281316826959" class="btn btn-outline" target="_blank">
              <i class="fab fa-whatsapp"></i>
              <span>Chat on WhatsApp</span>
            </a>
          </div>

          <!-- Contact Info -->
          <div class="contact-info">
            <div class="contact-item">
              <i class="fas fa-map-marker-alt"></i>
              <span>Bekasi, Indonesia</span>
            </div>
            <div class="contact-item">
              <i class="fas fa-envelope"></i>
              <span>talirejeki@gmail.com</span>
            </div>
            <div class="contact-item">
              <i class="fas fa-clock"></i>
              <span>Monday - Friday: 08:00 - 17:00 WIB</span>
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
  /* ================= Hero Section ================= */
  :root{
    --slide-fade-dur: 1600ms;
    --img-zoom-dur:   14000ms;
    --img-fade-dur:   1100ms;
    --text-in-dur:     880ms;
    --text-out-dur:    560ms;
    --stagger-step:    140ms;
    --ease-out: cubic-bezier(.17,.84,.44,1);
    --ease-in:  cubic-bezier(.64,0,.35,1);
    --ease-ken: cubic-bezier(.22,.61,.36,1);
    --ring-hero:#ffd93d;
    --ring-hero-soft: rgba(255,217,61,.65);
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
    background:url('{{ asset("img/bg/bg-texture.webp") }}');
    background-size:cover;background-position:center;
    background-attachment:fixed;background-repeat:no-repeat;
    z-index:-3;transition:all .3s ease;
  }
  body.light-theme .hero-bg{background:url('{{ asset("img/bg/bg-texture-white.webp") }}') center/cover fixed no-repeat;}
  body.dark-theme  .hero-bg{background:url('{{ asset("img/bg/bg-texture.webp") }}') center/cover fixed no-repeat;}
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

  /* Background + Ken Burns */
  .slide-bg{
    position:absolute;inset:0;background-image:var(--slide-bg);background-size:cover;background-position:center;
    transform:scale(1.04) translateY(-1vh);
    opacity:.94;filter:saturate(.96) contrast(.98);
    transition: opacity var(--img-fade-dur) var(--ease-out), filter 1200ms var(--ease-ken);
    z-index:-1;will-change:transform,opacity,filter;
  }
  .hero-slide[data-ken="right"].is-active .slide-bg{animation:ken-pan-right var(--img-zoom-dur) var(--ease-ken) both;}
  .hero-slide[data-ken="left"].is-active  .slide-bg{animation:ken-pan-left  var(--img-zoom-dur) var(--ease-ken) both;}
  .hero-slide[data-ken="up"].is-active    .slide-bg{animation:ken-pan-up    var(--img-zoom-dur) var(--ease-ken) both;}
  .hero-slide[data-ken="down"].is-active  .slide-bg{animation:ken-pan-down  var(--img-zoom-dur) var(--ease-ken) both;}
  @keyframes ken-pan-right{0%{transform:scale(1.04) translateX(-1.8%) translateY(-1vh)}100%{transform:scale(1.12) translateX(2.2%) translateY(-1vh)}}
  @keyframes ken-pan-left {0%{transform:scale(1.04) translateX( 1.8%) translateY(-1vh)}100%{transform:scale(1.12) translateX(-2.2%) translateY(-1vh)}}
  @keyframes ken-pan-up   {0%{transform:scale(1.04) translateY( 1.4vh)}100%{transform:scale(1.12) translateY(-2.0vh)}}
  @keyframes ken-pan-down {0%{transform:scale(1.04) translateY(-1.4vh)}100%{transform:scale(1.12) translateY( 2.0vh)}}

  .slide-scrim{position:absolute;inset:0;background:
    radial-gradient(1200px 600px at 68% 32%, rgba(0,0,0,.20), transparent 62%),
    linear-gradient(180deg, rgba(0,0,0,.55), rgba(0,0,0,.55));
    z-index:0;opacity:.98;
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
  .hero-title .highlight{font-size:clamp(30px,5.4vw,62px);font-weight:900;background:linear-gradient(135deg,#ff6b6b,#ffd93d);-webkit-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent;letter-spacing:.2px;}
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
  .btn-primary{background:linear-gradient(135deg,#ff6b6b,#ffd93d);color:#222;box-shadow:0 10px 30px rgba(255,107,107,.32);}
  .btn-primary:hover{transform:translateY(-2px);box-shadow:0 14px 36px rgba(255,107,107,.42);border-color:#ffd93d;color:#222;}
  .btn-primary:focus,.btn-primary:focus-visible{outline:none !important;box-shadow:0 0 0 3px var(--ring-hero), 0 12px 34px rgba(255,107,107,.40);border-color:#ffd93d;}
  .btn-outline{background:transparent;color:#fff;border:2px solid rgba(255,255,255,.6);}
  .btn-outline:hover{background:rgba(255,255,255,.15);border-color:#ffd93d;color:#ffd93d;transform:translateY(-2px);}
  .btn:focus,.btn:focus-visible{outline:none !important;box-shadow:0 0 0 3px var(--ring-hero-soft), 0 10px 28px rgba(0,0,0,.25);}
  .btn-primary:focus-visible{box-shadow:0 0 0 3px var(--ring-hero), 0 12px 34px rgba(255,107,107,.40);}
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
  .hero-dots .dot.is-active{width:26px;border-radius:8px;background:#ffd93d;}
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
  body.dark-theme .products-section{
    --ink:#e5e7eb; --muted:#94a3b8;
    --border:rgba(255,255,255,.12);
    --hover:rgba(183,28,28,.12);
    --ring:rgba(239,68,68,.22);
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
      color: var(--text-primary, #111);
  }
  .products-section .section-description{
      font-size: clamp(14px, 1.6vw, 18px);
      color: var(--text-secondary, #555);
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
  .pi-title{ font-weight:900; margin:12px 14px 6px; letter-spacing:.01em; }
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
    padding: 120px 60px;
    color: #fff;
    text-align: center;
    overflow: hidden;
  }

  /* Background image (dibuat soft transparan) */
  .experience-section .background-image {
    position: absolute;
    inset: 0;
    background-image: url('{{ asset("img/galeri-proyek/2.jpg") }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    opacity: 0.35;
    filter: brightness(0.7);
    z-index: 0;
    pointer-events: none;
  }

  /* Header */
  .experience-section .section-header {
    position: relative;
    z-index: 2;
    margin-bottom: 80px;
  }
  .experience-section .section-badge {
    display: inline-flex;
    align-items: center;
    background: rgba(255,217,61,0.9);
    color: #222;
    font-weight: 600;
    padding: 10px 24px;
    border-radius: 30px;
    font-size: 14px;
    gap: 8px;
    box-shadow: 0 6px 24px rgba(255,217,61,.35);
  }
  .experience-section .section-title {
    font-size: clamp(32px,4vw,48px);
    font-weight: 900;
    margin: 20px 0 16px;
    color: #fff;
  }
  .experience-section .section-description {
    font-size: clamp(14px,1.5vw,18px);
    color: #eee;
    max-width: 750px;
    margin: 0 auto 60px;
    line-height: 1.6;
  }

  /* Grid */
  .experience-grid {
    position: relative;
    z-index: 2;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px,1fr));
    gap: 40px;
    justify-items: center;
  }
  .experience-item {
    background: rgba(255,255,255,0.08);
    border-radius: 18px;
    padding: 35px 25px;
    box-shadow: 0 14px 32px rgba(0,0,0,.25);
    transition: transform .35s ease, box-shadow .35s ease;
    color: #fff;
    width: 100%;
    max-width: 220px;
    backdrop-filter: blur(4px);
    opacity: 0; /* awal hidden */
    transform: translateY(40px); /* start animasi */
  }
  .experience-item:hover {
    transform: translateY(-8px) scale(1.05);
    box-shadow: 0 24px 60px rgba(0,0,0,.35);
  }
  .experience-item h3.count {
    font-size: 3rem;
    font-weight: 900;
    color: #ffd93d;
    margin: 0 0 12px;
  }
  .experience-item p {
    font-size: 1rem;
    color: #fff;
    margin: 0;
  }

  /* ===== Animation Styles ===== */
  .fade-up {
    opacity: 0;
    transform: translateY(40px);
    transition: all 0.8s ease;
  }
  .fade-up.show {
    opacity: 1;
    transform: translateY(0);
  }
/* ===== Experience Section ===== */


/* Services Section */
  /* ---------------- Services Section Modern ---------------- */
  .services-section {
    padding: 80px 20px;
    color: var(--text-primary, #111);
    background: transparent;
    transition: all 0.3s ease;
  }

  body.dark-theme .services-section {
    --text-primary: #f5f5f5;
    --text-secondary: #cfd8dc;
  }

  .services-section .container {
    max-width: 1200px;
    margin: 0 auto;
  }

  .services-header {
    text-align: center;
    margin-bottom: 60px;
  }

  .section-badge {
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

  .section-title {
    font-size: clamp(28px, 4vw, 40px);
    font-weight: 900;
    margin-bottom: 16px;
    color: var(--text-primary, #111);
  }
  .section-description {
    font-size: clamp(14px, 1.6vw, 18px);
    color: var(--text-secondary, #555);
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
    background: var(--card-bg, #fff);
    color: var(--text-primary, #111);
    border-radius: 16px;
    padding: 30px 20px;
    text-align: center;
    box-shadow: 0 8px 20px rgba(0,0,0,0.06);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    opacity: 0;             /* animasi awal */
    transform: translateY(40px);
  }
  body.dark-theme .service-item {
    --card-bg: #1e1e1e;
    box-shadow: 0 8px 20px rgba(0,0,0,0.25);
  }
  .service-item:hover {
    transform: translateY(-6px) scale(1.02);
    box-shadow: 0 15px 30px rgba(0,0,0,0.12);
  }

  .service-icon {
    width: 65px;
    height: 65px;
    border-radius: 50%;
    background: var(--accent, #ffb700);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 18px;
    font-size: 26px;
    color: #fff;
    transition: transform 0.3s ease;
  }
  .service-item:hover .service-icon { transform: scale(1.1); }

  .service-item h4 {
    font-size: 1.15rem;
    font-weight: 700;
    margin-bottom: 8px;
    color: var(--text-primary, #111);
  }
  .service-item p {
    font-size: 0.95rem;
    line-height: 1.6;
    color: var(--text-secondary, #555);
  }

  /* Animation */
  .fade-up {
    opacity: 0;
    transform: translateY(40px);
    transition: all 0.8s ease;
  }
  .fade-up.show {
    opacity: 1;
    transform: translateY(0);
  }

  /* Responsive */
  @media (max-width: 768px){
    .services-section { padding: 60px 15px; }
    .section-title { font-size: 26px; }
  }
/* Services Section */


/* OUR BRANDS */
  /* OUR BRANDS */
  .brands-section {
    padding: 80px 20px;
    background: transparent;
  }

  .brands-section .section-badge {
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

  .brands-section .section-title {
    font-size: clamp(28px, 4vw, 40px);
    font-weight: 900;
    margin-bottom: 16px;
    color: var(--text-primary, #111);
  }

  .brands-section .section-description {
    font-size: clamp(14px, 1.6vw, 18px);
    color: var(--text-secondary, #555);
    max-width: 700px;
    margin: 0 auto;
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
    width: 220px;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
  }

  .brand-slide img {
    max-width: 180px;
    max-height: 100px;
    object-fit: contain;
    transition: transform 0.3s ease;
  }

  .brand-slide img:hover {
    transform: scale(1.15);
  }

  /* === Animasi Slide === */
  @keyframes scroll-left {
    0%   { transform: translateX(0); }
    100% { transform: translateX(-50%); }
  }

  @keyframes scroll-right {
    0%   { transform: translateX(-50%); }
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
    transform: translateY(40px);
    transition: all 0.9s ease;
  }
  .fade-up.show {
    opacity: 1;
    transform: translateY(0);
  }

  /* Animasi stagger untuk logo */
  .fade-stagger {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s ease;
  }
  .fade-stagger.show {
    opacity: 1;
    transform: translateY(0);
  }
/* OUR BRANDS */


/* ===== Proyek Kami Section ===== */
  /* ===== Proyek Kami Section ===== */
  .proyek-section {
    padding: 100px 40px 80px;
    --ink: #0f172a;
    --muted: #64748b;
    --brand: #7c1415;
    --brand-2: #b71c1c;
    --border: rgba(2, 6, 23, .08);
    --hover: rgba(124, 20, 21, .06);
    --ring: rgba(183, 28, 28, .18);
    background: transparent;
    color: var(--ink);
  }

  body.dark-theme .proyek-section {
    --ink: #e5e7eb;
    --muted: #94a3b8;
    --border: rgba(255, 255, 255, .12);
    --hover: rgba(183, 28, 28, .12);
    --ring: rgba(239, 68, 68, .22);
  }

  /* Header */
  .proyek-section .section-header {
    text-align: center;
    margin-bottom: 50px;
  }

  .proyek-section .section-badge {
    display: inline-flex;
    align-items: center;
    background: #ffd93d;
    color: #222;
    font-weight: 600;
    padding: 8px 20px;
    border-radius: 30px;
    font-size: 14px;
    gap: 8px;
    box-shadow: 0 4px 20px rgba(255, 217, 61, .35);
  }

  .proyek-section .section-title {
    font-size: clamp(28px, 4vw, 44px);
    font-weight: 900;
    margin: 18px 0 12px;
    color: var(--text-primary, #111);
  }

  .proyek-section .section-description {
    font-size: clamp(14px, 1.4vw, 18px);
    color: var(--text-secondary, #555);
    max-width: 750px;
    margin: 0 auto 60px;
    line-height: 1.6;
  }

  /* Grid */
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
    border-radius: 18px;
    border: 1px solid var(--border);
    transition: transform .35s ease, box-shadow .35s ease;
    width: 100%;
    max-width: 400px;
  }

  .proyek-item:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 48px rgba(0, 0, 0, .15), 0 0 0 3px var(--ring);
  }

  /* Thumbnail */
  .proyek-thumb {
    display: block;
    position: relative;
    width: 100%;
    aspect-ratio: 1 / 1;
    overflow: hidden;
    border-radius: 18px;
  }

  .proyek-thumb img {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 18px;
    transition: transform .5s ease, opacity .5s ease;
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
    font-weight: 900;
    margin: 14px 0 0;
    text-align: center;
    font-size: 1.15rem;
    color: var(--ink);
    transition: color .3s ease;
  }

  .proyek-item:hover .proyek-title {
    color: var(--brand-2);
  }

  /* ===== Animasi Masuk (Fade + Slide) ===== */
  .fade-up {
    opacity: 0;
    transform: translateY(40px);
    transition: all 0.9s ease;
  }
  .fade-up.show {
    opacity: 1;
    transform: translateY(0);
  }

  .fade-stagger {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s ease;
  }
  .fade-stagger.show {
    opacity: 1;
    transform: translateY(0);
  }

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
      margin-bottom: 40px;
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
      margin-bottom: 30px;
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
    padding: 100px 60px 80px;
    color: #111;
    background: transparent;
  }

  body.dark-theme .testimoni-section {
    color: #e5e7eb;
  }

  /* Header */
  .testimoni-section .section-header {
    text-align: center;
    margin-bottom: 60px;
  }

  .testimoni-section .section-badge {
    display: inline-flex;
    align-items: center;
    background: #ffd93d;
    color: #222;
    font-weight: 600;
    padding: 8px 20px;
    border-radius: 30px;
    font-size: 14px;
    gap: 8px;
    box-shadow: 0 4px 20px rgba(255, 217, 61, .35);
  }

  .testimoni-section .section-title {
    font-size: clamp(28px, 4vw, 44px);
    font-weight: 900;
    margin: 18px 0 12px;
  }

  .testimoni-section .section-description {
    font-size: clamp(14px, 1.5vw, 18px);
    color: #555;
    max-width: 700px;
    margin: 0 auto 60px;
    line-height: 1.6;
  }

  /* Slider */
  .testimoni-slider {
    overflow: hidden;
    padding: 10px;
  }

  .testimoni-track {
    display: flex;
    gap: 24px;
    transition: transform 0.5s ease;
  }

  .testimoni-item {
    flex: 0 0 320px;
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 12px 28px rgba(0, 0, 0, .08);
    padding: 28px;
    position: relative;
    transition: transform 0.35s ease, box-shadow 0.35s ease, background .35s ease;
  }

  body.dark-theme .testimoni-item {
    background: #1e293b;
    box-shadow: 0 12px 28px rgba(0, 0, 0, .15);
  }

  .testimoni-item:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 48px rgba(0, 0, 0, .15);
  }

  /* Testimoni Content */
  .testimoni-text {
    font-size: 1rem;
    line-height: 1.6;
    margin-bottom: 20px;
    color: #333;
    font-style: italic;
  }

  body.dark-theme .testimoni-text {
    color: #e5e7eb;
  }

  .testimoni-user {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .user-info h4 {
    margin: 0;
    font-size: 1rem;
    font-weight: 700;
    color: #111;
  }

  body.dark-theme .user-info h4 {
    color: #e5e7eb;
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
  }

  /* Background */
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
    font-size: clamp(28px, 4vw, 44px);
    font-weight: 900;
    margin-bottom: 20px;
  }

  .cta-description {
    font-size: clamp(15px, 1.5vw, 18px);
    margin-bottom: 40px;
    line-height: 1.7;
  }

  /* Actions */
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
    gap: 10px;
    padding: 14px 26px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 16px;
    transition: all 0.35s ease;
    text-decoration: none;
  }
  .btn-primary {
    background: #ffd93d;
    color: #222;
    box-shadow: 0 8px 24px rgba(255, 217, 61, .4);
  }
  .btn-primary:hover {
    background: #e6c233;
    transform: translateY(-3px);
    box-shadow: 0 12px 28px rgba(255, 217, 61, .55);
  }
  .btn-outline {
    border: 2px solid currentColor;
    background: transparent;
  }
  .btn-outline:hover {
    background: currentColor;
    color: var(--cta-bg-color);
    transform: translateY(-3px);
    box-shadow: 0 12px 28px rgba(0,0,0,.15);
  }

  /* Contact Info */
  .contact-info {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 28px;
    font-size: 15px;
  }
  .contact-item {
    display: flex;
    align-items: center;
    gap: 10px;
    transition: transform 0.3s ease, color 0.3s ease;
  }
  .contact-item i {
    font-size: 18px;
    color: #ffd93d;
  }
  .contact-item:hover {
    transform: translateY(-3px);
    color: #ffd93d;
  }

  /* Theme Variables */
  :root[data-theme="light"] {
    --cta-text-color: #222;
    --cta-subtext-color: #444;
    --cta-bg-color: #fff;
    --cta-btn-outline: #222;
  }
  :root[data-theme="dark"] {
    --cta-text-color: #fff;
    --cta-subtext-color: #f1f5f9;
    --cta-bg-color: #111;
    --cta-btn-outline: #fff;
  }

  /* Apply theme */
  .cta-section,
  .cta-title,
  .cta-description,
  .contact-item {
    color: var(--cta-text-color);
  }
  .cta-description {
    color: var(--cta-subtext-color);
  }
  .btn-outline {
    color: var(--cta-btn-outline);
    border-color: var(--cta-btn-outline);
  }
  .btn-outline:hover {
    background: var(--cta-btn-outline);
    color: var(--cta-bg-color);
  }

  /* Responsive */
  @media (max-width: 991.98px) {
    .cta-section {
      padding: 100px 20px;
    }
    .cta-actions .btn {
      padding: 12px 22px;
      font-size: 15px;
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
    }
    .cta-actions .btn {
      width: 100%;
      justify-content: center;
    }
    .contact-info {
      flex-direction: column;
      gap: 18px;
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