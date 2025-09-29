@extends('en.components.layout')

@section('title', $title)

@section('content')
<!-- Page Header with Enhanced Design -->
<section class="page-header page-entrance" data-aos="fade-in" data-aos-duration="1500">
    <div class="page-header-bg" style="background-image: url('{{ asset('img/galeri-proyek/118.png') }}');"></div>
    <div class="page-header-overlay"></div>
    <div class="header-decoration">
        <div class="decoration-circle decoration-circle-1"></div>
        <div class="decoration-circle decoration-circle-2"></div>
        <div class="decoration-circle decoration-circle-3"></div>
    </div>
    <div class="container">
        <div class="header-content">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="header-badge" data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-camera-retro"></i>
                        <span>SHOWCASE</span>
                    </div>
                    <h1 class="page-title" data-aos="fade-up" data-aos-delay="400">
                        <span class="title-main">Project Gallery</span>
                        <span class="title-highlight">Spectacular</span>
                    </h1>
                    <p class="page-description" data-aos="fade-up" data-aos-delay="600">
                        Explore our visual collection of leading industrial insulation projects we have realized. 
                        Each image tells our commitment to innovation, precision, and excellence in every detail of our work.
                    </p>
                    <div class="hero-highlights" data-aos="fade-up" data-aos-delay="700">
                        <div class="highlight-item">
                            <i class="fas fa-award"></i>
                            <span>Premium Quality</span>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-tools"></i>
                            <span>Advanced Technology</span>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-shield-alt"></i>
                            <span>International Standards</span>
                        </div>
                    </div>
                    <div class="header-stats" data-aos="fade-up" data-aos-delay="800">
                        <div class="stat-item">
                            <div class="stat-number-row">
                                <span class="stat-number counter-animate" data-count="500">0</span><span class="stat-plus">+</span>
                            </div>
                            <div class="stat-label-row">
                                <span class="stat-label">Projects Completed</span>
                            </div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number-row">
                                <span class="stat-number counter-animate" data-count="200">0</span><span class="stat-plus">+</span>
                            </div>
                            <div class="stat-label-row">
                                <span class="stat-label">Satisfied Clients</span>
                            </div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number-row">
                                <span class="stat-number counter-animate" data-count="14">0</span><span class="stat-plus">+</span>
                            </div>
                            <div class="stat-label-row">
                                <span class="stat-label">Years of Experience</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Gallery Section -->
<section class="gallery-section py-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <div class="section-badge">
                <i class="fas fa-camera"></i>
                <span>Portfolio</span>
            </div>
            <h2 class="section-title">Top Project Gallery</h2>
            <p class="section-description">
                A collection of our flagship projects executed with high-quality standards 
                and customer satisfaction as our top priority.
            </p>
        </div>

        @if($galleries->count() > 0)
            <div class="gallery-showcase">
                @foreach($galleries as $index => $gallery)
                    @php $images = $gallery->images; @endphp
                    <div class="showcase-item {{ $index % 2 == 0 ? 'left-image' : 'right-image' }}" data-aos="fade-up" data-aos-delay="100">
                        <div class="row align-items-center g-4">
                            <!-- Image Column -->
                            <div class="col-lg-6 {{ $index % 2 == 0 ? 'order-1' : 'order-2' }}">
                                <div class="showcase-image-container">
                                    @if($images->count() > 0)
                                        <div class="showcase-slider" data-gallery-id="{{ $gallery->id }}">
                                            <div class="slider-wrapper">
                                                <div class="slider-main">
                                                    @foreach($images as $idx => $img)
                                                        <div class="slide {{ $idx == 0 ? 'active' : '' }}">
                                                            <img src="{{ asset($img->image_url) }}" alt="{{ $gallery->title }}" class="showcase-image" loading="lazy">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                
                                                @if($images->count() > 1)
                                                    <!-- Navigation Arrows -->
                                                    <button class="slider-nav prev-btn" onclick="changeSlide({{ $gallery->id }}, -1)" aria-label="Previous image">
                                                        <i class="fas fa-chevron-left"></i>
                                                    </button>
                                                    <button class="slider-nav next-btn" onclick="changeSlide({{ $gallery->id }}, 1)" aria-label="Next image">
                                                        <i class="fas fa-chevron-right"></i>
                                                    </button>
                                                    
                                                    <!-- Dot Indicators -->
                                                    <div class="slider-indicators">
                                                        @foreach($images as $idx => $img)
                                                            <button class="indicator-dot {{ $idx == 0 ? 'active' : '' }}" onclick="goToSlide({{ $gallery->id }}, {{ $idx }})" aria-label="Go to slide {{ $idx + 1 }}"></button>
                                                        @endforeach
                                                    </div>
                                                    
                                                    <!-- Image Counter -->
                                                    <div class="image-counter">
                                                        <span class="current-slide">1</span> / <span class="total-slides">{{ $images->count() }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @else
                                        <div class="no-image-placeholder">
                                            <i class="fas fa-image"></i>
                                            <span>No Image</span>
                                        </div>
                                    @endif
                                    
                                    <!-- Gallery Overlay -->
                                    <div class="gallery-overlay">
                                        <div class="overlay-content">
                                            <button class="gallery-view-btn" onclick="openGalleryLightbox({{ $gallery->id }}, '{{ $gallery->title }}', {{ json_encode($images->pluck('image_url')) }})">
                                                <i class="fas fa-eye"></i>
                                                <span>View Details</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Content Column -->
                            <div class="col-lg-6 {{ $index % 2 == 0 ? 'order-2' : 'order-1' }}">
                                <div class="showcase-content">
                                    <div class="showcase-meta">
                                        <span class="date-badge">
                                            <i class="fas fa-calendar-alt"></i>
                                            {{ $gallery->created_at->format('M Y') }}
                                        </span>
                                    </div>
                                    <h3 class="showcase-title">{{ $gallery->title }}</h3>
                                    <p class="showcase-description">{{ $gallery->description }}</p>
                                    
                                    <div class="showcase-features">
                                        <div class="feature-item">
                                            <i class="fas fa-images"></i>
                                            <span>{{ $images->count() }} Project Photos</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="fas fa-clock"></i>
                                            <span>{{ $gallery->created_at->diffForHumans() }}</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="fas fa-check-circle"></i>
                                            <span>Project Completed</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="pagination-wrapper text-center mt-5" data-aos="fade-up">
                {{ $galleries->links('pagination::bootstrap-4') }}
            </div>
        @else
            <div class="no-gallery text-center" data-aos="fade-up">
                <div class="no-gallery-illustration">
                    <div class="illustration-bg"></div>
                    <i class="fas fa-images"></i>
                </div>
                <h3>No Gallery Yet</h3>
                <p>The project gallery is currently under development. Please check back later to see our latest portfolio.</p>
                <div class="no-gallery-actions">
                    <a href="{{ route('en.contact') }}" class="btn btn-primary">
                        <i class="fas fa-phone"></i>
                        <span>Contact Us</span>
                    </a>
                    <a href="{{ route('en.products') }}" class="btn btn-outline-primary">
                        <i class="fas fa-cubes"></i>
                        <span>View Products</span>
                    </a>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- Statistics Section -->
<section class="stats-section">
    <div class="container">
        <div class="stats-header animate-on-scroll" data-aos="fade-up">
            <h2>Our Achievements</h2>
            <p>Concrete proof of our dedication and service quality</p>
        </div>
        <div class="stats-grid">
            <div class="stat-card animate-on-scroll animate-stagger-1" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <div class="stat-content">
                    <span class="stat-number counter-animate" data-count="500">0</span><span class="stat-plus">+</span>
                    <span class="stat-label">Projects Completed</span>
                    <span class="stat-description">Across various industrial scales</span>
                </div>
            </div>
            <div class="stat-card animate-on-scroll animate-stagger-2" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <div class="stat-content">
                    <span class="stat-number counter-animate" data-count="200">0</span><span class="stat-plus">+</span>
                    <span class="stat-label">Satisfied Clients</span>
                    <span class="stat-description">98% satisfaction rate</span>
                </div>
            </div>
            <div class="stat-card animate-on-scroll animate-stagger-3" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="stat-content">
                    <span class="stat-number counter-animate" data-count="50">0</span><span class="stat-plus">+</span>
                    <span class="stat-label">Cities Covered</span>
                    <span class="stat-description">Across Indonesia</span>
                </div>
            </div>
            <div class="stat-card animate-on-scroll animate-stagger-4" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-icon">
                    <i class="fas fa-award"></i>
                </div>
                <div class="stat-content">
                    <span class="stat-number counter-animate" data-count="14">0</span><span class="stat-plus">+</span>
                    <span class="stat-label">Years of Experience</span>
                    <span class="stat-description">Trusted expertise</span>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- CTA Section -->
<section class="cta-section">
    <div class="cta-background"></div>
    <div class="container">
        <div class="cta-content animate-on-scroll" data-aos="fade-up">
            <div class="cta-icon animate-on-scroll animate-stagger-1">
                <i class="fas fa-rocket"></i>
            </div>
            <h2 class="animate-on-scroll animate-stagger-2">Ready to Start Your Project?</h2>
            <p class="animate-on-scroll animate-stagger-3">
                Consult your industrial insulation needs with our expert team. Get the best solutions and special offers for your project.
            </p>
            <div class="cta-features animate-on-scroll animate-stagger-5">
                <div class="feature-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Free Consultation</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Best Offers</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Quality Guarantee</span>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Lightbox Modal -->
<div id="lightbox" class="lightbox d-none" aria-hidden="true">
    <div class="lightbox-backdrop"></div>
    <div class="lightbox-content">
        <button class="lightbox-close" aria-label="Close lightbox">
            <i class="fas fa-times"></i>
        </button>
        <button class="lightbox-prev" aria-label="Previous image">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="lightbox-next" aria-label="Next image">
            <i class="fas fa-chevron-right"></i>
        </button>
        <div class="lightbox-image-container">
            <img class="lightbox-image" src="" alt="" />
        </div>
        <div class="lightbox-info">
            <h3 class="lightbox-title"></h3>
            <p class="lightbox-caption"></p>
            <div class="lightbox-counter">
                <span class="current">1</span> / <span class="total">1</span>
            </div>
        </div>
    </div>
</div>


<style>
/* Page Entrance Animations */
.page-entrance {
    opacity: 0;
    transform: translateY(50px);
    animation: pageEnter 1.2s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}

@keyframes pageEnter {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.stagger-children > * {
    opacity: 0;
    transform: translateY(30px);
    animation: staggerIn 0.8s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}

.stagger-children > *:nth-child(1) { animation-delay: 0.1s; }
.stagger-children > *:nth-child(2) { animation-delay: 0.2s; }
.stagger-children > *:nth-child(3) { animation-delay: 0.3s; }
.stagger-children > *:nth-child(4) { animation-delay: 0.4s; }
.stagger-children > *:nth-child(5) { animation-delay: 0.5s; }
.stagger-children > *:nth-child(6) { animation-delay: 0.6s; }

@keyframes staggerIn {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Enhanced AOS Custom Animations */
[data-aos="bounce-in"] {
    transform: scale(0.3);
    opacity: 0;
}

[data-aos="bounce-in"].aos-animate {
    animation: bounceIn 1s cubic-bezier(0.215, 0.610, 0.355, 1) forwards;
}

@keyframes bounceIn {
    0% {
        opacity: 0;
        transform: scale(0.3);
    }
    50% {
        opacity: 1;
        transform: scale(1.05);
    }
    70% {
        transform: scale(0.9);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

/* Prevent Horizontal Overflow */
html, body {
    overflow-x: hidden;
    max-width: 100vw;
}

* {
    box-sizing: border-box;
}

/* Enhanced Modern Gallery Page with Elegant Design */
:root {
    --gallery-primary: #8B0000;
    --gallery-secondary: #DC143C;
    --gallery-accent: #FF6B6B;
    --gallery-gold: #FFD700;
    --gallery-text-primary: #2d3748;
    --gallery-text-secondary: #718096;
    --gallery-bg-primary: #ffffff;
    --gallery-bg-secondary: #f7fafc;
    --gallery-bg-tertiary: #edf2f7;
    --gallery-border: #e2e8f0;
    --gallery-shadow: rgba(0, 0, 0, 0.1);
    --gallery-shadow-lg: rgba(0, 0, 0, 0.15);
    --gallery-radius: 20px;
    --gallery-radius-lg: 32px;
}

/* Dark Theme Variables */
body.dark-theme {
    --gallery-text-primary: #f7fafc;
    --gallery-text-secondary: #a0aec0;
    --gallery-bg-primary: #1a202c;
    --gallery-bg-secondary: #2d3748;
    --gallery-bg-tertiary: #4a5568;
    --gallery-border: #4a5568;
    --gallery-shadow: rgba(0, 0, 0, 0.3);
    --gallery-shadow-lg: rgba(0, 0, 0, 0.4);
}

/* Enhanced Page Header */
.page-header {
    color: white;
    padding: 20px 0 80px;
    position: relative;
    overflow: hidden;
    min-height: 80vh;
    height: auto;
    display: flex;
    align-items: center;
    width: 100%;
    max-width: 100vw;
    margin-top: 0;
}

.page-header-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center top;
    background-repeat: no-repeat;
    z-index: 1;
    filter: blur(5px);
}

.page-header-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
        linear-gradient(135deg, rgba(0, 0, 0, 0.4) 0%, rgba(0, 0, 0, 0.2) 50%, rgba(0, 0, 0, 0.3) 100%);
    backdrop-filter: blur(2px);
    z-index: 2;
}

.page-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
        linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.05) 70%);
    animation: headerFloat 25s ease-in-out infinite;
    z-index: 1;
}

@keyframes headerFloat {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    25% { transform: translate(10px, -10px) rotate(0.3deg); }
    50% { transform: translate(-8px, 8px) rotate(-0.3deg); }
    75% { transform: translate(12px, -5px) rotate(0.2deg); }
}

.header-decoration {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: 3;
    pointer-events: none;
}

.decoration-circle {
    position: absolute;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.03));
    backdrop-filter: blur(10px);
    animation: circleFloat 20s ease-in-out infinite;
    pointer-events: none;
}

.decoration-circle-1 {
    width: 200px;
    height: 200px;
    top: 10%;
    right: 15%;
}

.decoration-circle-2 {
    width: 150px;
    height: 150px;
    top: 60%;
    left: 10%;
}

.decoration-circle-3 {
    width: 100px;
    height: 100px;
    top: 80%;
    right: 20%;
}

@keyframes circleFloat {
    0%, 100% { transform: translate(0, 0) scale(1); }
    33% { transform: translate(15px, -15px) scale(1.05); }
    66% { transform: translate(-10px, 10px) scale(0.95); }
}

.header-content {
    position: relative;
    z-index: 4;
    width: 100%;
    max-width: 100%;
}

.header-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(20px);
    color: white;
    padding: 12px 24px;
    border-radius: 30px;
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 2rem;
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    text-transform: uppercase;
    letter-spacing: 1px;
}

.page-title {
    font-size: 3.5rem;
    font-weight: 900;
    margin-bottom: 1.5rem;
    text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    line-height: 1.1;
}

.title-main {
    display: block;
    color: #000000;
    text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.8), 0 0 10px rgba(255, 255, 255, 0.5);
    font-weight: 900;
}

.title-highlight {
    display: block;
    background: linear-gradient(135deg, var(--gallery-gold), #FFF8DC, var(--gallery-gold));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-size: 0.8em;
    margin-top: 0.5rem;
}

.page-description {
    font-size: 1.2rem;
    color: #000000;
    max-width: 700px;
    margin: 0 auto 3rem;
    line-height: 1.7;
    text-shadow: 1px 1px 3px rgba(255, 255, 255, 0.8);
    font-weight: 600;
}

.header-stats {
    display: flex;
    justify-content: center;
    gap: 2rem;
    margin-top: 3rem;
}

.stat-item {
    text-align: center;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    padding: 1.5rem 2rem;
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s ease;
}

.stat-item:hover {
    transform: translateY(-8px) scale(1.05);
    background: rgba(255, 255, 255, 0.2);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
}

.stat-number {
    font-size: 2rem;
    font-weight: 900;
    display: inline-block;
    color: #000000;
    text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.8);
}

.stat-plus {
    font-size: 2rem;
    font-weight: 900;
    color: #000000;
    margin-left: 2px;
    text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.8);
}

.stat-label {
    font-size: 0.9rem;
    font-weight: 600;
    opacity: 0.9;
    margin-top: 0.5rem;
}

/* Stats 2-Row Layout */
.stat-number-row {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 2px;
    line-height: 1;
}

.stat-number-row .stat-number {
    margin-left: 0;
    line-height: 1;
}

.stat-label-row {
    margin-top: 0.5rem;
    text-align: center;
}

.stat-label-row .stat-label {
    margin-top: 0;
    font-size: 0.85rem;
    font-weight: 600;
    opacity: 0.9;
}

/* Hero Highlights */
.hero-highlights {
    display: flex;
    justify-content: center;
    gap: 2rem;
    margin-top: 3rem;
    flex-wrap: wrap;
}

.highlight-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(20px);
    padding: 1rem 1.5rem;
    border-radius: 50px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: #000000;
    font-size: 0.9rem;
    font-weight: 600;
    text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.8);
    transition: all 0.3s ease;
}

.highlight-item:hover {
    transform: translateY(-3px);
    background: rgba(255, 255, 255, 0.25);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}

.highlight-item i {
    color: var(--gallery-gold);
    font-size: 1.1rem;
    text-shadow: none;
}

/* Enhanced Section Badge */
.section-badge {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: linear-gradient(135deg, var(--gallery-primary), var(--gallery-secondary));
    color: white;
    padding: 12px 24px;
    border-radius: 25px;
    font-size: 13px;
    font-weight: 700;
    margin-bottom: 1.5rem;
    box-shadow: 0 8px 25px rgba(139, 0, 0, 0.3);
    text-transform: uppercase;
    letter-spacing: 1px;
    position: relative;
    overflow: hidden;
}

.section-badge::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.8s;
}

.section-badge:hover::before {
    left: 100%;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--gallery-text-primary);
    margin-bottom: 1.5rem;
    position: relative;
    padding-bottom: 15px;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(135deg, var(--gallery-primary), var(--gallery-secondary), var(--gallery-accent));
    border-radius: 2px;
}

.section-description {
    font-size: 1.1rem;
    color: var(--gallery-text-secondary);
    line-height: 1.8;
    max-width: 800px;
    margin: 0 auto;
}

/* Gallery Section */
.gallery-section {
    padding: 100px 0;
    position: relative;
}

.gallery-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
        radial-gradient(circle at 80% 80%, rgba(220, 20, 60, 0.03) 0%, transparent 50%);
    z-index: 1;
}

.gallery-section .container {
    position: relative;
    z-index: 2;
}

/* Gallery Showcase - Alternating Layout */
.gallery-showcase {
    margin-top: 4rem;
}

.showcase-item {
    margin-bottom: 6rem;
    position: relative;
}

.showcase-item:last-child {
    margin-bottom: 0;
}

.showcase-image-container {
    position: relative;
    border-radius: var(--gallery-radius-lg);
    overflow: hidden;
    box-shadow: 0 20px 60px var(--gallery-shadow-lg);
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    aspect-ratio: 9/16;
    max-height: 750px;
    width: 100%;
    max-width: 550px;
    margin: 0 auto;
}

.showcase-item:hover .showcase-image-container {
    transform: translateY(-10px);
    box-shadow: 0 30px 80px var(--gallery-shadow-lg);
}

.showcase-slider {
    width: 100%;
    height: 100%;
    position: relative;
}

.showcase-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.6s ease;
}

.showcase-item:hover .showcase-image {
    transform: scale(1.05);
}

.showcase-content {
    padding: 2rem 0;
}

.left-image .showcase-content {
    padding-left: 2rem;
}

.right-image .showcase-content {
    padding-right: 2rem;
}

.showcase-meta {
    display: flex;
    gap: 1rem;
    margin-bottom: 1.5rem;
    flex-wrap: wrap;
}

.showcase-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--gallery-text-primary);
    margin-bottom: 1.5rem;
    line-height: 1.2;
}

.showcase-description {
    font-size: 1.1rem;
    color: var(--gallery-text-secondary);
    line-height: 1.7;
    margin-bottom: 2rem;
}

.showcase-features {
    margin-bottom: 2.5rem;
}

.showcase-features .feature-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1rem;
    font-size: 1rem;
    color: var(--gallery-text-secondary);
}

.showcase-features .feature-item i {
    color: var(--gallery-primary);
    font-size: 1.1rem;
    width: 20px;
}

.showcase-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.showcase-actions .btn {
    padding: 0.875rem 1.75rem;
    font-weight: 600;
}

/* Gallery Grid - Legacy support */
.gallery-grid {
    margin-top: 4rem;
}

.gallery-card {
    background: var(--gallery-bg-primary);
    border-radius: var(--gallery-radius-lg);
    overflow: hidden;
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    border: 2px solid var(--gallery-border);
    height: 100%;
    position: relative;
    box-shadow: 0 15px 50px var(--gallery-shadow);
}

.gallery-card:hover {
    transform: translateY(-15px) scale(1.02);
    border-color: var(--gallery-secondary);
    box-shadow: 0 30px 80px var(--gallery-shadow-lg);
}

/* Gallery Image Container - 9:16 Aspect Ratio */
.gallery-image-container {
    position: relative;
    width: 100%;
    aspect-ratio: 9/16;
    overflow: hidden;
    background: var(--gallery-bg-tertiary);
}

.gallery-slider {
    width: 100%;
    height: 100%;
    position: relative;
}

.slider-wrapper {
    width: 100%;
    height: 100%;
    position: relative;
}

.slider-main {
    width: 100%;
    height: 100%;
    position: relative;
    overflow: hidden;
}

.slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    transform: translateX(100%);
    transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

.slide.active {
    opacity: 1;
    transform: translateX(0);
}

.slide.prev {
    transform: translateX(-100%);
}

.gallery-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.6s ease;
}

.gallery-card:hover .gallery-image {
    transform: scale(1.05);
}

/* Slider Navigation */
.slider-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.8);
    backdrop-filter: blur(10px);
    color: white;
    border: none;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    z-index: 10;
    opacity: 0.8;
}

.showcase-image-container:hover .slider-nav {
    opacity: 1;
}

.prev-btn {
    left: 1rem;
}

.next-btn {
    right: 1rem;
}

.slider-nav:hover {
    background: rgba(0, 0, 0, 0.95);
    transform: translateY(-50%) scale(1.1);
}

/* Slider Indicators */
.slider-indicators {
    position: absolute;
    bottom: 1rem;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 0.5rem;
    z-index: 10;
}

.indicator-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid white;
    background: transparent;
    cursor: pointer;
    transition: all 0.3s ease;
    opacity: 0.7;
}

.indicator-dot.active {
    background: white;
    transform: scale(1.2);
    opacity: 1;
}

/* Image Counter */
.image-counter {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: rgba(0, 0, 0, 0.8);
    backdrop-filter: blur(10px);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    z-index: 10;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

/* Gallery Overlay */
.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(139, 0, 0, 0.8), rgba(220, 20, 60, 0.6));
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all 0.4s ease;
    z-index: 5;
}

.gallery-card:hover .gallery-overlay {
    opacity: 1;
}

.overlay-content {
    text-align: center;
    transform: translateY(20px);
    transition: all 0.4s ease;
}

.gallery-card:hover .overlay-content {
    transform: translateY(0);
}

.gallery-view-btn {
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: white;
    padding: 1rem 2rem;
    border-radius: 50px;
    font-weight: 700;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.gallery-view-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    border-color: rgba(255, 255, 255, 0.5);
    transform: translateY(-3px);
}

/* Gallery Info */
.gallery-info {
    padding: 1.5rem;
}

.gallery-meta {
    display: flex;
    gap: 0.75rem;
    margin-bottom: 1rem;
    flex-wrap: wrap;
}

.category-badge,
.date-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    background: var(--gallery-bg-tertiary);
    color: var(--gallery-text-secondary);
    padding: 0.4rem 0.8rem;
    border-radius: 15px;
    font-size: 0.75rem;
    font-weight: 600;
    border: 1px solid var(--gallery-border);
}

.category-badge {
    background: var(--gallery-primary);
    color: white;
    border-color: var(--gallery-primary);
}

.gallery-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--gallery-text-primary);
    margin-bottom: 0.75rem;
    line-height: 1.3;
}

.gallery-description {
    color: var(--gallery-text-secondary);
    margin-bottom: 1rem;
    line-height: 1.6;
    font-size: 0.9rem;
}

.gallery-stats {
    display: flex;
    gap: 1rem;
}

.gallery-stats .stat-item {
    display: flex;
    align-items: center;
    gap: 0.4rem;
    color: var(--gallery-text-secondary);
    font-size: 0.8rem;
    font-weight: 600;
    background: transparent;
    padding: 0;
    border: none;
    box-shadow: none;
}

.gallery-stats .stat-item:hover {
    transform: none;
    background: transparent;
    box-shadow: none;
}

.gallery-stats .stat-item i {
    color: var(--gallery-primary);
    font-size: 0.9rem;
}

/* No Image Placeholder */
.no-image-placeholder {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100%;
    color: var(--gallery-text-secondary);
    background: var(--gallery-bg-tertiary);
    font-size: 1rem;
}

.no-image-placeholder i {
    font-size: 3rem;
    margin-bottom: 1rem;
    opacity: 0.5;
}

/* No Gallery State */
.no-gallery {
    text-align: center;
    padding: 6rem 2rem;
    max-width: 600px;
    margin: 0 auto;
}

.no-gallery-illustration {
    position: relative;
    width: 120px;
    height: 120px;
    margin: 0 auto 2rem;
}

.illustration-bg {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, var(--gallery-primary), var(--gallery-secondary));
    border-radius: 50%;
    opacity: 0.1;
}

.no-gallery-illustration i {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 3rem;
    color: var(--gallery-text-secondary);
}

.no-gallery h3 {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--gallery-text-primary);
    margin-bottom: 1rem;
}

.no-gallery p {
    color: var(--gallery-text-secondary);
    margin-bottom: 2rem;
    font-size: 1.125rem;
    line-height: 1.6;
}

.no-gallery-actions {
    display: flex;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
}

/* Buttons */
.btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.9rem;
    text-decoration: none;
    border: 2px solid transparent;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.btn-primary {
    background: linear-gradient(135deg, var(--gallery-primary), var(--gallery-secondary));
    color: white;
    border-color: var(--gallery-primary);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(139, 0, 0, 0.3);
    background: linear-gradient(135deg, var(--gallery-secondary), var(--gallery-accent));
}

.btn-outline-primary {
    background: transparent;
    color: var(--gallery-primary);
    border-color: var(--gallery-primary);
}

.btn-outline-primary:hover {
    background: var(--gallery-primary);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(139, 0, 0, 0.2);
}

/* Counter Animation */
.counter-animate {
    animation: countUp 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

@keyframes countUp {
    from {
        transform: scale(0.8);
        opacity: 0;
    }
    50% {
        transform: scale(1.1);
        opacity: 0.8;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}

/* Lightbox */
.lightbox {
    position: fixed;
    inset: 0;
    z-index: 10000;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 1;
    visibility: visible;
    transition: all 0.3s ease;
}

.lightbox.d-none {
    opacity: 0;
    visibility: hidden;
}

.lightbox-backdrop {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.9);
    backdrop-filter: blur(5px);
}

.lightbox-content {
    position: relative;
    z-index: 2;
    max-width: 90vw;
    max-height: 90vh;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.lightbox-image-container {
    position: relative;
    max-width: 100%;
    max-height: 70vh;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
}

.lightbox-image {
    max-width: 100%;
    max-height: 100%;
    display: block;
}

.lightbox-info {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    padding: 1.5rem;
    border-radius: 15px;
    margin-top: 2rem;
    text-align: center;
    min-width: 300px;
}

.lightbox-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--gallery-text-primary);
    margin-bottom: 0.5rem;
}

.lightbox-caption {
    color: var(--gallery-text-secondary);
    margin-bottom: 1rem;
}

.lightbox-counter {
    font-size: 0.875rem;
    color: var(--gallery-text-secondary);
    font-weight: 600;
}

.lightbox-close,
.lightbox-prev,
.lightbox-next {
    position: absolute;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.2);
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 1.25rem;
    transition: all 0.3s ease;
}

.lightbox-close {
    top: -60px;
    right: 0;
}

.lightbox-prev {
    left: -70px;
    top: 50%;
    transform: translateY(-50%);
}

.lightbox-next {
    right: -70px;
    top: 50%;
    transform: translateY(-50%);
}

.lightbox-close:hover,
.lightbox-prev:hover,
.lightbox-next:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: scale(1.1);
}

.lightbox-prev:hover {
    transform: translateY(-50%) scale(1.1);
}

.lightbox-next:hover {
    transform: translateY(-50%) scale(1.1);
}

/* Responsive Design */
@media (max-width: 1200px) {
    .gallery-grid .col-lg-4 {
        flex: 0 0 50%;
        max-width: 50%;
    }
}

@media (max-width: 992px) {
    .page-title {
        font-size: 2.5rem;
    }
    
    .page-description {
        font-size: 1rem;
    }
    
    .header-stats {
        flex-direction: column;
        gap: 1rem;
        align-items: center;
    }
    
    /* Showcase tablet adjustments */
    .showcase-image-container {
        max-height: 450px;
        max-width: 320px;
    }
    
    .showcase-title {
        font-size: 2rem;
    }
    
    .left-image .showcase-content {
        padding-left: 1rem;
    }
    
    .right-image .showcase-content {
        padding-right: 1rem;
    }
    
    .showcase-image-container {
        aspect-ratio: 4/3;
        max-height: 400px;
    }
    
    .hero-highlights {
        gap: 1rem;
    }
    
    .highlight-item {
        padding: 0.75rem 1.25rem;
        font-size: 0.85rem;
    }
}

@media (max-width: 768px) {
    .page-header {
        min-height: 60vh;
        padding: 100px 0 60px;
    }
    
    .page-title {
        font-size: 2rem;
    }
    
    .gallery-section {
        padding: 60px 0;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    /* Showcase mobile adjustments */
    .showcase-item {
        margin-bottom: 4rem;
    }
    
    .showcase-image-container {
        aspect-ratio: 9/16;
        max-height: 400px;
        max-width: 250px;
        margin: 0 auto 2rem auto;
    }
    
    .left-image .showcase-content,
    .right-image .showcase-content {
        padding-left: 0;
        padding-right: 0;
    }
    
    .showcase-title {
        font-size: 1.75rem;
    }
    
    .showcase-description {
        font-size: 1rem;
    }
    
    .hero-highlights {
        flex-direction: column;
        gap: 1rem;
        align-items: center;
    }
    
    .highlight-item {
        padding: 0.75rem 1.25rem;
        font-size: 0.8rem;
    }
    
    .slider-nav {
        width: 40px;
        height: 40px;
        font-size: 1rem;
    }
    
    .prev-btn {
        left: 0.75rem;
    }
    
    .next-btn {
        right: 0.75rem;
    }
    
    .indicator-dot {
        width: 10px;
        height: 10px;
    }
    
    .image-counter {
        font-size: 0.75rem;
        padding: 0.4rem 0.8rem;
    }
    
    /* Showcase responsive */
    .showcase-item {
        margin-bottom: 4rem;
    }
    
    .showcase-content {
        padding: 2rem 0 0 0 !important;
    }
    
    .left-image .showcase-content,
    .right-image .showcase-content {
        padding-left: 0 !important;
        padding-right: 0 !important;
    }
    
    .showcase-title {
        font-size: 1.75rem;
    }
    
    .showcase-description {
        font-size: 1rem;
    }
    
    .showcase-image-container {
        aspect-ratio: 16/12;
        margin-bottom: 1.5rem;
    }
    
    .showcase-actions {
        flex-direction: column;
    }
    
    .showcase-actions .btn {
        width: 100%;
        justify-content: center;
    }
    
    /* Legacy gallery grid responsive */
    .gallery-grid .col-lg-4,
    .gallery-grid .col-md-6 {
        flex: 0 0 100%;
        max-width: 100%;
    }
    
    .gallery-image-container {
        aspect-ratio: 4/5;
    }
    
    .lightbox-prev {
        left: -50px;
    }
    
    .lightbox-next {
        right: -50px;
    }
}

@media (max-width: 480px) {
    .page-header-bg {
        background-attachment: scroll;
    }
    
    .page-title {
        font-size: 1.75rem;
    }
    
    .gallery-info {
        padding: 1rem;
    }
    
    .gallery-title {
        font-size: 1.1rem;
    }
    
    .gallery-meta {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .slider-nav {
        width: 35px;
        height: 35px;
        font-size: 0.9rem;
    }
    
    .prev-btn {
        left: 0.5rem;
    }
    
    .next-btn {
        right: 0.5rem;
    }
    
    .indicator-dot {
        width: 8px;
        height: 8px;
    }
    
    .image-counter {
        font-size: 0.7rem;
        padding: 0.3rem 0.6rem;
    }
    
    .lightbox-content {
        padding: 1rem;
    }
    
    .lightbox-info {
        min-width: auto;
        width: 100%;
    }
    
    .lightbox-prev,
    .lightbox-next {
        width: 40px;
        height: 40px;
        font-size: 1rem;
    }
    
    .lightbox-close {
        top: -50px;
        width: 40px;
        height: 40px;
    }
}

/* Performance Optimizations */
.gallery-card {
    will-change: transform;
    contain: layout style paint;
}

.gallery-image {
    will-change: transform;
}

/* Accessibility */
@media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}

/* Focus indicators for accessibility */
button:focus,
.btn:focus {
    outline: 2px solid var(--gallery-primary);
    outline-offset: 2px;
}

/* High contrast mode support */
@media (prefers-contrast: high) {
    .page-header-bg {
        filter: blur(5px) contrast(1.5);
    }
    
    .page-header-overlay {
        background: rgba(0, 0, 0, 0.8);
    }
}

/* =================================
   HERO SECTION
   ================================= */
.hero-section {
    min-height: 100vh;
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden;
    background: var(--bg-primary);
}

.hero-background {
    position: absolute;
    inset: 0;
    background-image: url('{{ asset("img/galeri-proyek/118.png") }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    filter: blur(2px);
    transform: scale(1.05);
    z-index: 0;
}

.hero-overlay {
    position: absolute;
    inset: 0;
    z-index: 1;
}

.hero-content {
    position: relative;
    z-index: 2;
    text-align: center;
    color: white;
    max-width: 800px;
    margin: 0 auto;
    padding: 2rem;
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    font-size: 0.875rem;
    font-weight: 600;
    margin-bottom: 2rem;
    transition: all 0.3s ease;
}

.hero-badge:hover {
    background: rgba(255, 255, 255, 0.15);
    transform: translateY(-2px);
}

.hero-title {
    font-size: clamp(2.5rem, 6vw, 4rem);
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 1.5rem;
    letter-spacing: -0.02em;
}

.text-gradient {
    background: linear-gradient(135deg, #fbbf24, #f59e0b, #d97706);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
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
    margin-bottom: 2rem;
}

.hero-stats .stat-item {
    text-align: center;
}

.hero-stats .stat-number {
    display: block;
    font-size: 2rem;
    font-weight: 800;
    color: var(--accent-color);
}

.hero-stats .stat-label {
    font-size: 0.875rem;
    opacity: 0.8;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.hero-scroll-indicator {
    position: absolute;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    color: white;
    z-index: 2;
    animation: bounce 2s infinite;
}

.scroll-line {
    width: 2px;
    height: 30px;
    background: linear-gradient(to bottom, transparent, white);
    margin: 0 auto 0.5rem;
}

.hero-scroll-indicator span {
    font-size: 0.75rem;
    opacity: 0.8;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
    40% { transform: translateX(-50%) translateY(-10px); }
    60% { transform: translateX(-50%) translateY(-5px); }
}

/* =================================
   GALLERY SECTION
   ================================= */
.gallery-section {
    padding: 8rem 0;
    min-height: 100vh;
}

.gallery-filters {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 4rem;
    flex-wrap: wrap;
}

.filter-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background: var(--bg-primary);
    border: 2px solid var(--border-color);
    color: var(--text-secondary);
    padding: 1rem 1.5rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.875rem;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.filter-btn::before {
    content: '';
    position: absolute;
    inset: 0;
    background: var(--brand-gradient);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.filter-btn:hover,
.filter-btn.active {
    color: white;
    border-color: var(--brand-primary);
    transform: translateY(-2px);
    box-shadow: 0 10px 25px var(--shadow-medium);
}

.filter-btn:hover::before,
.filter-btn.active::before {
    opacity: 1;
}

.filter-btn span,
.filter-btn i {
    position: relative;
    z-index: 1;
}

/* Gallery Grid Layout */
.gallery-list {
    display: flex;
    flex-direction: column;
    gap: 3rem;
    margin-bottom: 4rem;
}

.gallery-item-row {
    opacity: 1;
    transform: translateY(0);
    transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

.gallery-item-row.hide {
    opacity: 0;
    transform: translateY(30px) scale(0.95);
    pointer-events: none;
}

/* Gallery Row Card Design */
.gallery-row-card {
    background: var(--bg-primary);
    border-radius: 24px;
    overflow: hidden;
    border: 1px solid var(--border-color);
    box-shadow: 0 8px 32px var(--shadow-light);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
}

.gallery-row-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 24px 48px var(--shadow-medium);
    border-color: var(--brand-primary);
}

/* Gallery Slider Container */
.gallery-slider-container {
    position: relative;
    height: 400px;
    overflow: hidden;
    background: var(--bg-tertiary);
}

.gallery-slider {
    width: 100%;
    height: 100%;
    position: relative;
}

.slider-wrapper {
    width: 100%;
    height: 100%;
    position: relative;
}

.slider-main {
    width: 100%;
    height: 100%;
    position: relative;
    overflow: hidden;
}

.slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    transform: translateX(30px) scale(0.95) rotateY(5deg);
    transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    filter: blur(1px) brightness(0.8);
    z-index: 1;
    backface-visibility: hidden;
    perspective: 1000px;
}

.slide.active {
    opacity: 1;
    transform: translateX(0) scale(1) rotateY(0deg);
    filter: blur(0) brightness(1);
    z-index: 3;
    transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.slide.prev {
    opacity: 0.3;
    transform: translateX(-30px) scale(0.95) rotateY(-5deg);
    filter: blur(1px) brightness(0.8);
    z-index: 2;
    transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.slider-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.6s ease;
    border-radius: 0;
}

/* Handle vertical images better */
.slider-image[style*="aspect-ratio"] {
    object-fit: contain;
    background: var(--bg-tertiary);
}

.gallery-row-card:hover .slider-image {
    transform: scale(1.03);
}

/* Slider Navigation */
.slider-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.7);
    backdrop-filter: blur(10px);
    color: white;
    border: none;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 1.2rem;
    transition: all 0.3s ease;
    z-index: 10;
    opacity: 0;
}

.gallery-slider:hover .slider-nav {
    opacity: 1;
}

.prev-btn {
    left: 1rem;
}

.next-btn {
    right: 1rem;
}

.slider-nav:hover {
    background: rgba(0, 0, 0, 0.9);
    transform: translateY(-50%) scale(1.1);
}

/* Slider Indicators */
.slider-indicators {
    position: absolute;
    bottom: 1rem;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 0.5rem;
    z-index: 10;
}

.indicator-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid white;
    background: transparent;
    cursor: pointer;
    transition: all 0.3s ease;
}

.indicator-dot.active {
    background: white;
    transform: scale(1.2);
}

.indicator-dot:hover {
    transform: scale(1.1);
}

/* Image Counter */
.image-counter {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: rgba(0, 0, 0, 0.7);
    backdrop-filter: blur(10px);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.875rem;
    font-weight: 600;
    z-index: 10;
}

/* Gallery Content */
.gallery-content {
    padding: 2.5rem;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.gallery-header {
    margin-bottom: 1.5rem;
}

.gallery-meta {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
    flex-wrap: wrap;
}

.category-badge,
.date-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: var(--bg-tertiary);
    color: var(--text-secondary);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.875rem;
    font-weight: 600;
    border: 1px solid var(--border-color);
    transition: all 0.3s ease;
}

.category-badge {
    background: var(--brand-primary);
    color: white;
    border-color: var(--brand-primary);
}

.category-badge:hover,
.date-badge:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px var(--shadow-light);
}

.gallery-title {
    font-size: 1.75rem;
    font-weight: 800;
    color: var(--text-primary);
    margin-bottom: 0;
    line-height: 1.3;
    letter-spacing: -0.02em;
}

.gallery-description {
    margin: 1.5rem 0;
}

.gallery-description p {
    color: var(--text-secondary);
    line-height: 1.8;
    font-size: 1.1rem;
    margin: 0;
}

.gallery-stats {
    display: flex;
    gap: 2rem;
    margin: 1.5rem 0;
}

.gallery-stats .stat-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--text-muted);
    font-size: 0.95rem;
    font-weight: 600;
}

.gallery-stats .stat-item i {
    color: var(--brand-primary);
    font-size: 1.1rem;
}

.gallery-actions {
    margin-top: auto;
    padding-top: 1.5rem;
}

.btn-gallery-view {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    background: var(--brand-gradient);
    color: white;
    border: none;
    padding: 1rem 2rem;
    border-radius: 50px;
    font-weight: 700;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.btn-gallery-view:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 30px var(--shadow-medium);
    background: linear-gradient(135deg, #ef4444 0%, #991b1b 100%);
}

.btn-gallery-view:active {
    transform: translateY(-1px);
}

/* No Image Placeholder */
.no-image-placeholder {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100%;
    color: var(--text-muted);
    background: var(--bg-tertiary);
    font-size: 1.2rem;
}

.no-image-placeholder i {
    font-size: 4rem;
    margin-bottom: 1rem;
    opacity: 0.5;
}

/* =================================
   STATISTICS SECTION
   ================================= */
.stats-section {
    padding: 8rem 0;
}

.stats-header {
    text-align: center;
    margin-bottom: 4rem;
}

.stats-header h2 {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--text-primary);
    margin-bottom: 1rem;
}

.stats-header p {
    font-size: 1.125rem;
    color: var(--text-secondary);
    max-width: 600px;
    margin: 0 auto;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
}

.stat-card {
    background: var(--bg-secondary);
    padding: 3rem 2rem;
    border-radius: 20px;
    text-align: center;
    border: 1px solid var(--border-color);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--brand-gradient);
    transform: scaleX(0);
    transition: transform 0.4s ease;
}

.stat-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px var(--shadow-medium);
    border-color: var(--brand-primary);
}

.stat-card:hover::before {
    transform: scaleX(1);
}

.stat-card .stat-icon {
    width: 80px;
    height: 80px;
    background: var(--brand-gradient);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: white;
    margin: 0 auto 1.5rem;
    transition: all 0.3s ease;
}

.stat-card .stat-icon i {
    color: #000000;
}

body.dark-theme .stat-card .stat-icon i {
    color: #ffffff;
}

.stat-card:hover .stat-icon {
    transform: scale(1.1) rotate(5deg);
}

.stat-content .stat-number {
    display: inline-block;
    font-size: 3rem;
    font-weight: 900;
    color: #000000;
    margin-bottom: 0.5rem;
    line-height: 1;
}

body.dark-theme .stat-content .stat-number {
    color: #ffffff;
}

.stat-content .stat-plus {
    font-size: 3rem;
    font-weight: 900;
    color: #000000;
    margin-left: 2px;
}

body.dark-theme .stat-content .stat-plus {
    color: #ffffff;
}

.stat-content .stat-label {
    display: block;
    font-size: 1.125rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
}

.stat-content .stat-description {
    font-size: 0.875rem;
    color: var(--text-secondary);
    opacity: 0.8;
}

/* =================================
   CTA SECTION
   ================================= */
.cta-section {
    padding: 8rem 0;
    position: relative;
    overflow: hidden;
    color: var(--gallery-text-primary);
}

.cta-background {
    position: absolute;
    inset: 0;
    background-image: url('{{ asset("img/galeri-proyek/2.jpg") }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    filter: blur(10px);
    z-index: 0;
    opacity: 0.3;
}

.cta-background::before {
    content: '';
    position: absolute;
    inset: 0;
    opacity: 0.8;
    z-index: 1;
}

body.dark-theme .cta-background::before {
    opacity: 0.9;
}

.cta-content {
    position: relative;
    z-index: 2;
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
}

.cta-icon {
    width: 100px;
    height: 100px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    margin: 0 auto 2rem;
    transition: all 0.3s ease;
}

.cta-icon:hover {
    transform: scale(1.1) rotate(10deg);
    background: rgba(255, 255, 255, 0.15);
}

.cta-content h2 {
    font-size: 3rem;
    font-weight: 800;
    margin-bottom: 1.5rem;
    line-height: 1.2;
    color: var(--gallery-text-primary);
}

.cta-content p {
    font-size: 1.25rem;
    margin-bottom: 3rem;
    line-height: 1.6;
    color: var(--gallery-text-secondary);
}

.cta-actions {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 3rem;
    flex-wrap: wrap;
}

.cta-features {
    display: flex;
    justify-content: center;
    gap: 2rem;
    flex-wrap: wrap;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
    opacity: 0.9;
}

.feature-item i {
    color: var(--accent-color);
    font-size: 1rem;
}

/* =================================
   BUTTONS
   ================================= */
.btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 1rem;
    text-decoration: none;
    border: 2px solid transparent;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.btn-primary {
    background: var(--gallery-primary);
    color: white;
    border-color: var(--gallery-primary);
}

.btn-primary:hover {
    background: var(--gallery-secondary);
    color: white;
    border-color: var(--gallery-secondary);
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(139, 0, 0, 0.3);
}

.btn-outline {
    background: transparent;
    color: var(--gallery-primary);
    border-color: var(--gallery-primary);
}

.btn-outline:hover {
    background: var(--gallery-primary);
    color: white;
    border-color: var(--gallery-primary);
    transform: translateY(-2px);
}

/* =================================
   NO GALLERY STATE
   ================================= */
.no-gallery {
    text-align: center;
    padding: 6rem 2rem;
    max-width: 600px;
    margin: 0 auto;
}

.no-gallery-illustration {
    position: relative;
    width: 120px;
    height: 120px;
    margin: 0 auto 2rem;
}

.illustration-bg {
    position: absolute;
    inset: 0;
    background: var(--brand-gradient);
    border-radius: 50%;
    opacity: 0.1;
}

.no-gallery-illustration i {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 3rem;
    color: var(--text-muted);
}

.no-gallery h3 {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 1rem;
}

.no-gallery p {
    color: var(--text-secondary);
    margin-bottom: 2rem;
    font-size: 1.125rem;
    line-height: 1.6;
}

.no-gallery-actions {
    display: flex;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
}

.no-gallery-actions .btn {
    background: var(--bg-primary);
    color: var(--text-primary);
    border-color: var(--border-color);
}

.no-gallery-actions .btn:hover {
    background: var(--brand-gradient);
    color: white;
    border-color: var(--brand-primary);
}

/* =================================
   LIGHTBOX
   ================================= */
.lightbox {
    position: fixed;
    inset: 0;
    z-index: 10000;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 1;
    visibility: visible;
    transition: all 0.3s ease;
}

.lightbox.d-none {
    opacity: 0;
    visibility: hidden;
}

.lightbox-backdrop {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.9);
    backdrop-filter: blur(5px);
}

.lightbox-content {
    position: relative;
    z-index: 2;
    max-width: 90vw;
    max-height: 90vh;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.lightbox-image-container {
    position: relative;
    max-width: 100%;
    max-height: 70vh;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
}

.lightbox-image {
    max-width: 100%;
    max-height: 100%;
    display: block;
}

.lightbox-info {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    padding: 1.5rem;
    border-radius: 15px;
    margin-top: 2rem;
    text-align: center;
    min-width: 300px;
}

.lightbox-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
}

.lightbox-caption {
    color: var(--text-secondary);
    margin-bottom: 1rem;
}

.lightbox-counter {
    font-size: 0.875rem;
    color: var(--text-muted);
    font-weight: 600;
}

.lightbox-close,
.lightbox-prev,
.lightbox-next {
    position: absolute;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.2);
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 1.25rem;
    transition: all 0.3s ease;
}

.lightbox-close {
    top: -60px;
    right: 0;
}

.lightbox-prev {
    left: -70px;
    top: 50%;
    transform: translateY(-50%);
}

.lightbox-next {
    right: -70px;
    top: 50%;
    transform: translateY(-50%);
}

.lightbox-close:hover,
.lightbox-prev:hover,
.lightbox-next:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: scale(1.1);
}

.lightbox-prev:hover {
    transform: translateY(-50%) scale(1.1);
}

.lightbox-next:hover {
    transform: translateY(-50%) scale(1.1);
}

/* =================================
   RESPONSIVE DESIGN
   ================================= */
@media (max-width: 1200px) {
    .gallery-list {
        gap: 2rem;
    }
    
    .gallery-slider-container {
        height: 350px;
    }
    
    .gallery-content {
        padding: 2rem;
    }
}

@media (max-width: 768px) {
    .hero-content {
        padding: 1rem;
    }
    
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-subtitle {
        font-size: 1rem;
    }
    
    .hero-stats {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }
    
    .hero-stats .stat-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        backdrop-filter: blur(5px);
    }
    
    .gallery-section {
        padding: 4rem 0;
    }
    
    .gallery-filters {
        gap: 0.5rem;
        margin-bottom: 2rem;
    }
    
    .filter-btn {
        padding: 0.75rem 1rem;
        font-size: 0.75rem;
    }
    
    .gallery-list {
        gap: 1.5rem;
    }
    
    .gallery-row-card .row {
        flex-direction: column;
    }
    
    .gallery-slider-container {
        height: 300px;
    }
    
    .gallery-content {
        padding: 1.5rem;
    }
    
    .gallery-title {
        font-size: 1.5rem;
    }
    
    .gallery-meta {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .gallery-stats {
        flex-direction: column;
        gap: 1rem;
    }
    
    .stats-section,
    .cta-section {
        padding: 4rem 0;
    }
    
    .stats-header h2,
    .cta-content h2 {
        font-size: 2rem;
    }
    
    .stats-grid {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }
    
    .stat-card {
        padding: 2rem 1rem;
    }
    
    .cta-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .cta-features {
        flex-direction: column;
        gap: 1rem;
    }
    
    .lightbox-prev {
        left: -50px;
    }
    
    .lightbox-next {
        right: -50px;
    }
}

@media (max-width: 480px) {
    .hero-background {
        background-attachment: scroll;
    }
    
    .hero-content {
        padding: 0.5rem;
    }
    
    .hero-title {
        font-size: 2rem;
    }
    
    .gallery-slider-container {
        height: 250px;
    }
    
    .gallery-content {
        padding: 1rem;
    }
    
    .gallery-title {
        font-size: 1.25rem;
    }
    
    .slider-nav {
        width: 40px;
        height: 40px;
        font-size: 1rem;
    }
    
    .prev-btn {
        left: 0.5rem;
    }
    
    .next-btn {
        right: 0.5rem;
    }
    
    .indicator-dot {
        width: 10px;
        height: 10px;
    }
    
    .image-counter {
        font-size: 0.75rem;
        padding: 0.25rem 0.75rem;
    }
    
    .btn-gallery-view {
        padding: 0.75rem 1.5rem;
        font-size: 0.875rem;
    }
    
    .lightbox-content {
        padding: 1rem;
    }
    
    .lightbox-info {
        min-width: auto;
        width: 100%;
    }
    
    .lightbox-prev,
    .lightbox-next {
        width: 40px;
        height: 40px;
        font-size: 1rem;
    }
    
    .lightbox-close {
        top: -50px;
        width: 40px;
        height: 40px;
    }
}

/* =================================
   ANIMATIONS & ENTRANCE EFFECTS
   ================================= */
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

@keyframes fadeInLeft {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
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

@keyframes scaleIn {
    from {
        opacity: 0;
        transform: scale(0.8);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes slideInFromTop {
    from {
        opacity: 0;
        transform: translateY(-50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% { 
        transform: translateX(-50%) translateY(0); 
    }
    40% { 
        transform: translateX(-50%) translateY(-10px); 
    }
    60% { 
        transform: translateX(-50%) translateY(-5px); 
    }
}

@keyframes pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(220, 38, 38, 0.4);
    }
    70% {
        box-shadow: 0 0 0 20px rgba(220, 38, 38, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(220, 38, 38, 0);
    }
}

@keyframes countUp {
    from {
        transform: scale(0.8);
        opacity: 0;
    }
    50% {
        transform: scale(1.1);
        opacity: 0.8;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}

/* Stagger Animation Classes */
.animate-on-scroll {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s var(--bounce-animation);
}

.animate-on-scroll.in-view {
    opacity: 1;
    transform: translateY(0);
}

.animate-stagger-1 { transition-delay: 0.1s; }
.animate-stagger-2 { transition-delay: 0.2s; }
.animate-stagger-3 { transition-delay: 0.3s; }
.animate-stagger-4 { transition-delay: 0.4s; }
.animate-stagger-5 { transition-delay: 0.5s; }

/* Pulse Animation */
.pulse-animation {
    animation: pulse 2s infinite;
}

/* Counter Animation */
.counter-animate {
    animation: countUp 0.6s var(--bounce-animation);
}

/* =================================
   ACCESSIBILITY
   ================================= */
@media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}

/* Focus indicators for accessibility */
button:focus,
.btn:focus,
.filter-btn:focus {
    outline: 2px solid var(--brand-primary);
    outline-offset: 2px;
}

/* High contrast mode support */
@media (prefers-contrast: high) {
    .hero-background {
        filter: blur(3px) brightness(0.2) contrast(1.5);
    }
    
    .hero-overlay {
    }
}

/* =================================
   MODERN ENTRANCE ANIMATIONS
   ================================= */
@keyframes slideInFromBottom {
    0% {
        transform: translateY(50px);
        opacity: 0;
    }
    100% {
        transform: translateY(0);
        opacity: 1;
    }
}

@keyframes slideInFromLeft {
    0% {
        transform: translateX(-50px);
        opacity: 0;
    }
    100% {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideInFromRight {
    0% {
        transform: translateX(50px);
        opacity: 0;
    }
    100% {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes fadeInScale {
    0% {
        transform: scale(0.8);
        opacity: 0;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

@keyframes rotateIn {
    0% {
        transform: rotate(-10deg) scale(0.8);
        opacity: 0;
    }
    100% {
        transform: rotate(0deg) scale(1);
        opacity: 1;
    }
}

/* Animation Classes */
.animate-on-scroll {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}

.animate-on-scroll.visible {
    opacity: 1;
    transform: translateY(0);
}

.animate-stagger-1 { animation-delay: 0.1s; }
.animate-stagger-2 { animation-delay: 0.2s; }
.animate-stagger-3 { animation-delay: 0.3s; }
.animate-stagger-4 { animation-delay: 0.4s; }
.animate-stagger-5 { animation-delay: 0.5s; }

/* Initial Animation States - Ensure proper starting position */
.header-badge,
.page-title,
.page-description,
.header-stats,
.hero-highlights {
    opacity: 0;
    transform: translateY(30px);
}

/* Hero Animation Classes */
.hero-animate-badge {
    animation: slideInFromBottom 1s ease-out 0.3s both;
}

.hero-animate-title {
    animation: slideInFromBottom 1s ease-out 0.5s both;
}

.hero-animate-description {
    animation: slideInFromBottom 1s ease-out 0.7s both;
}

.hero-animate-stats {
    animation: fadeInScale 1s ease-out 0.9s both;
}

.hero-animate-highlights {
    animation: slideInFromBottom 1s ease-out 1.1s both;
}

/* Showcase Animation Classes */
.showcase-animate-left {
    animation: slideInFromLeft 1s ease-out both;
}

.showcase-animate-right {
    animation: slideInFromRight 1s ease-out both;
}

.showcase-animate-image {
    animation: rotateIn 1s ease-out 0.3s both;
}

.showcase-animate-content {
    animation: slideInFromBottom 1s ease-out 0.5s both;
}

/* Mobile Animation Optimizations */
@media (max-width: 768px) {
    .hero-animate-badge,
    .hero-animate-title,
    .hero-animate-description,
    .hero-animate-stats,
    .hero-animate-highlights {
        animation-duration: 0.6s;
    }
    
    .showcase-animate-left,
    .showcase-animate-right,
    .showcase-animate-image,
    .showcase-animate-content {
        animation-duration: 0.6s;
    }
    
    .animate-on-scroll {
        transition-duration: 0.6s;
    }
}

/* Respect reduced motion preferences */
@media (prefers-reduced-motion: reduce) {
    .hero-animate-badge,
    .hero-animate-title,
    .hero-animate-description,
    .hero-animate-stats,
    .hero-animate-highlights,
    .showcase-animate-left,
    .showcase-animate-right,
    .showcase-animate-image,
    .showcase-animate-content,
    .animate-on-scroll {
        animation: none !important;
        transition: none !important;
        opacity: 1 !important;
        transform: none !important;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // =================================
    // FORCE INITIAL ANIMATION STATE
    // =================================
    
    // Reset scroll position and ensure animations work from any position
    function forceAnimationReset() {
        // Temporarily disable AOS to prevent conflicts
        if (typeof AOS !== 'undefined') {
            AOS.refresh();
        }
        
        // Force all animated elements to initial state
        const animatedElements = document.querySelectorAll('[data-aos], .animate-on-scroll, .showcase-item');
        animatedElements.forEach(element => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(30px)';
        });
        
        // Trigger animations after short delay
        setTimeout(() => {
            if (typeof AOS !== 'undefined') {
                AOS.refresh();
            }
            animatedElements.forEach((element, index) => {
                setTimeout(() => {
                    element.style.opacity = '';
                    element.style.transform = '';
                }, index * 100);
            });
        }, 100);
    }
    
    // =================================
    // THEME MANAGEMENT & DETECTION
    // =================================
    function initTheme() {
        // Listen for theme changes from topbar
        document.addEventListener('themeChanged', function(e) {
            const theme = e.detail.theme;
            if (theme === 'dark') {
                document.body.classList.add('dark-theme');
                document.documentElement.setAttribute('data-theme', 'dark');
            } else {
                document.body.classList.remove('dark-theme');
                document.documentElement.setAttribute('data-theme', 'light');
            }
        });
        
        // Check initial theme
        const savedTheme = localStorage.getItem('theme');
        const systemTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
        const theme = savedTheme || systemTheme;
        
        if (theme === 'dark') {
            document.body.classList.add('dark-theme');
            document.documentElement.setAttribute('data-theme', 'dark');
        } else {
            document.body.classList.remove('dark-theme');
            document.documentElement.setAttribute('data-theme', 'light');
        }
    }

    // Initialize theme
    initTheme();

    // =================================
    // SCROLL ANIMATION OBSERVER
    // =================================
    function initScrollAnimations() {
        const animatedElements = document.querySelectorAll('.animate-on-scroll');
        
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        animatedElements.forEach(element => {
            observer.observe(element);
        });
    }

    // Initialize scroll animations
    initScrollAnimations();

    // =================================
    // ENHANCED COUNTER ANIMATION
    // =================================
    function animateCounters() {
        const counters = document.querySelectorAll('.stat-number[data-count]');
        
        const observerOptions = {
            threshold: 0.7,
            rootMargin: '0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.getAttribute('data-count'));
                    const duration = 2500;
                    const startTime = performance.now();
                    
                    // Add counter animation class
                    counter.classList.add('counter-animate');
                    
                    const updateCounter = (currentTime) => {
                        const elapsed = currentTime - startTime;
                        const progress = Math.min(elapsed / duration, 1);
                        
                        // Easing function for smooth animation
                        const easeOutCubic = 1 - Math.pow(1 - progress, 3);
                        const current = Math.floor(target * easeOutCubic);
                        
                        counter.textContent = current;
                        
                        if (progress < 1) {
                            requestAnimationFrame(updateCounter);
                        } else {
                            counter.textContent = target;
                            // Add pulse effect to parent card
                            const card = counter.closest('.stat-card');
                            if (card) {
                                card.classList.add('pulse-animation');
                                setTimeout(() => {
                                    card.classList.remove('pulse-animation');
                                }, 2000);
                            }
                        }
                    };
                    
                    requestAnimationFrame(updateCounter);
                    observer.unobserve(counter);
                }
            });
        }, observerOptions);
        
        counters.forEach(counter => {
            observer.observe(counter);
        });
    }
    
    // Initialize counter animation
    animateCounters();

    // =================================
    // GALLERY FILTERS WITH ANIMATIONS
    // =================================
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item-row');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button with animation
            filterBtns.forEach(b => {
                b.classList.remove('active');
                b.style.transform = 'scale(1)';
            });
            this.classList.add('active');
            this.style.transform = 'scale(1.05)';
            
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 200);
            
            // Filter gallery items with stagger effect
            galleryItems.forEach((item, index) => {
                const category = item.getAttribute('data-category');
                
                setTimeout(() => {
                    if (filter === 'all' || category === filter) {
                        item.classList.remove('hide');
                        item.style.opacity = '0';
                        item.style.transform = 'translateY(30px)';
                        
                        setTimeout(() => {
                            item.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
                            item.style.opacity = '1';
                            item.style.transform = 'translateY(0)';
                        }, index * 100);
                    } else {
                        item.classList.add('hide');
                    }
                }, index * 50);
            });
        });
    });
    
    // =================================
    // ENHANCED GALLERY SLIDER FUNCTIONALITY
    // =================================
    const sliders = {};
    
    // Initialize all sliders
    document.querySelectorAll('.gallery-slider').forEach(slider => {
        const galleryId = slider.getAttribute('data-gallery-id');
        const slides = slider.querySelectorAll('.slide');
        const indicators = slider.querySelectorAll('.indicator-dot');
        const counter = slider.querySelector('.image-counter');
        
        sliders[galleryId] = {
            currentSlide: 0,
            totalSlides: slides.length,
            slides: slides,
            indicators: indicators,
            counter: counter,
            isAnimating: false
        };

        // Add initial animation to first slide
        if (slides.length > 0) {
            slides[0].style.opacity = '1';
            slides[0].style.transform = 'translateX(0) scale(1)';
        }
    });
    
    // Enhanced change slide function
    window.changeSlide = function(galleryId, direction) {
        const sliderContainer = document.querySelector(`[data-gallery-id="${galleryId}"]`);
        if (!sliderContainer) return;
        
        const slides = sliderContainer.querySelectorAll('.slide');
        const indicators = sliderContainer.querySelectorAll('.indicator-dot');
        const counter = sliderContainer.querySelector('.current-slide');
        
        if (slides.length <= 1) return;
        
        // Find current active slide
        let currentIndex = 0;
        slides.forEach((slide, index) => {
            if (slide.classList.contains('active')) {
                currentIndex = index;
            }
        });
        
        // Calculate next index
        let nextIndex = currentIndex + direction;
        if (nextIndex >= slides.length) {
            nextIndex = 0;
        } else if (nextIndex < 0) {
            nextIndex = slides.length - 1;
        }
        
        // Update slides
        slides.forEach((slide, index) => {
            slide.classList.remove('active', 'prev');
            if (index === nextIndex) {
                slide.classList.add('active');
            } else if (index === currentIndex) {
                slide.classList.add('prev');
            }
        });
        
        // Update indicators
        if (indicators.length > 0) {
            indicators.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === nextIndex);
            });
        }
        
        // Update counter
        if (counter) {
            counter.textContent = nextIndex + 1;
        }
    };
    
    // Enhanced go to specific slide
    window.goToSlide = function(galleryId, slideIndex) {
        const sliderContainer = document.querySelector(`[data-gallery-id="${galleryId}"]`);
        if (!sliderContainer) return;
        
        const slides = sliderContainer.querySelectorAll('.slide');
        const indicators = sliderContainer.querySelectorAll('.indicator-dot');
        const counter = sliderContainer.querySelector('.current-slide');
        
        if (slides.length <= 1 || slideIndex < 0 || slideIndex >= slides.length) return;
        
        // Update slides
        slides.forEach((slide, index) => {
            slide.classList.remove('active', 'prev');
            if (index === slideIndex) {
                slide.classList.add('active');
            }
        });
        
        // Update indicators
        if (indicators.length > 0) {
            indicators.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === slideIndex);
            });
        }
        
        // Update counter
        if (counter) {
            counter.textContent = slideIndex + 1;
        }
    };
    
    // Enhanced update slider function
    function updateSlider(galleryId) {
        const slider = sliders[galleryId];
        if (!slider) return;
        
        // Update slides with animation
        slider.slides.forEach((slide, index) => {
            slide.classList.remove('active', 'prev');
            
            if (index === slider.currentSlide) {
                slide.classList.add('active');
                slide.style.opacity = '1';
                slide.style.transform = 'translateX(0) scale(1)';
            } else {
                slide.style.opacity = '0';
                if (index < slider.currentSlide) {
                    slide.classList.add('prev');
                    slide.style.transform = 'translateX(-100%) scale(0.95)';
                } else {
                    slide.style.transform = 'translateX(100%) scale(0.95)';
                }
            }
        });
        
        // Update indicators with animation
        slider.indicators.forEach((indicator, index) => {
            indicator.classList.toggle('active', index === slider.currentSlide);
            if (index === slider.currentSlide) {
                indicator.style.transform = 'scale(1.3)';
                setTimeout(() => {
                    indicator.style.transform = 'scale(1.2)';
                }, 200);
            } else {
                indicator.style.transform = 'scale(1)';
            }
        });
        
        // Update counter with animation
        if (slider.counter) {
            const currentSpan = slider.counter.querySelector('.current-slide');
            if (currentSpan) {
                currentSpan.style.transform = 'scale(1.2)';
                currentSpan.textContent = slider.currentSlide + 1;
                setTimeout(() => {
                    currentSpan.style.transform = 'scale(1)';
                }, 200);
            }
        }
    }

    // Enhanced touch/swipe support
    let touchStartX = 0;
    let touchEndX = 0;
    let touchStartY = 0;
    let touchEndY = 0;
    
    document.querySelectorAll('.gallery-slider').forEach(slider => {
        const galleryId = slider.getAttribute('data-gallery-id');
        
        slider.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
            touchStartY = e.changedTouches[0].screenY;
        }, { passive: true });
        
        slider.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            touchEndY = e.changedTouches[0].screenY;
            handleSwipe(galleryId);
        }, { passive: true });
    });
    
    function handleSwipe(galleryId) {
        const swipeThreshold = 50;
        const diffX = touchStartX - touchEndX;
        const diffY = touchStartY - touchEndY;
        
        // Only handle horizontal swipes
        if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > swipeThreshold) {
            if (diffX > 0) {
                changeSlide(galleryId, 1); // Swipe left - next slide
            } else {
                changeSlide(galleryId, -1); // Swipe right - prev slide
            }
        }
    }

    // =================================
    // ENHANCED LIGHTBOX FOR GALLERY
    // =================================
    const lightbox = document.getElementById('lightbox');
    const lightboxImage = lightbox?.querySelector('.lightbox-image');
    const lightboxTitle = lightbox?.querySelector('.lightbox-title');
    const lightboxCaption = lightbox?.querySelector('.lightbox-caption');
    const lightboxCounter = lightbox?.querySelector('.lightbox-counter');
    const currentSpan = lightboxCounter?.querySelector('.current');
    const totalSpan = lightboxCounter?.querySelector('.total');
    
    let currentImages = [];
    let currentIndex = 0;

    window.openGalleryLightbox = function(galleryId, title, images) {
        if (!lightbox || !lightboxImage || images.length === 0) return;
        
        currentImages = images;
        currentIndex = 0;
        
        updateLightboxImage();
        lightboxTitle.textContent = title;
        
        if (totalSpan) totalSpan.textContent = images.length;
        
        lightbox.classList.remove('d-none');
        lightbox.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
        
        // Add entrance animation
        lightbox.style.opacity = '0';
        setTimeout(() => {
            lightbox.style.transition = 'opacity 0.3s ease';
            lightbox.style.opacity = '1';
        }, 50);
        
        // Focus close button for accessibility
        const closeBtn = lightbox.querySelector('.lightbox-close');
        if (closeBtn) closeBtn.focus();
        
        // Add escape key listener
        document.addEventListener('keydown', handleKeydown);
        
        console.log(`Opened lightbox for gallery ${galleryId} with ${images.length} images`);
    };

    function openLightbox(images, index = 0, title = '') {
        if (!lightbox || !lightboxImage) return;
        
        currentImages = images;
        currentIndex = index;
        
        updateLightboxImage();
        lightboxTitle.textContent = title;
        
        if (totalSpan) totalSpan.textContent = images.length;
        
        lightbox.classList.remove('d-none');
        lightbox.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
        
        // Focus close button for accessibility
        const closeBtn = lightbox.querySelector('.lightbox-close');
        if (closeBtn) closeBtn.focus();
        
        // Add escape key listener
        document.addEventListener('keydown', handleKeydown);
    }
    
    function closeLightbox() {
        if (!lightbox) return;
        
        lightbox.style.transition = 'opacity 0.3s ease';
        lightbox.style.opacity = '0';
        
        setTimeout(() => {
            lightbox.classList.add('d-none');
            lightbox.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
            lightbox.style.opacity = '1';
        }, 300);
        
        // Remove escape key listener
        document.removeEventListener('keydown', handleKeydown);
        
        currentImages = [];
        currentIndex = 0;
    }
    
    function updateLightboxImage() {
        if (!lightboxImage || currentImages.length === 0) return;
        
        const imageUrl = currentImages[currentIndex];
        lightboxImage.src = imageUrl.startsWith('http') ? imageUrl : `{{ asset('') }}${imageUrl}`;
        lightboxImage.alt = lightboxTitle?.textContent || '';
        
        // Add loading animation
        lightboxImage.style.opacity = '0';
        lightboxImage.onload = function() {
            this.style.transition = 'opacity 0.3s ease';
            this.style.opacity = '1';
        };
        
        if (currentSpan) currentSpan.textContent = currentIndex + 1;
        
        // Update navigation button visibility
        const prevBtn = lightbox.querySelector('.lightbox-prev');
        const nextBtn = lightbox.querySelector('.lightbox-next');
        
        if (prevBtn) prevBtn.style.display = currentImages.length > 1 ? 'flex' : 'none';
        if (nextBtn) nextBtn.style.display = currentImages.length > 1 ? 'flex' : 'none';
    }
    
    function navigateLightbox(direction) {
        if (currentImages.length <= 1) return;
        
        if (direction === 'prev') {
            currentIndex = currentIndex > 0 ? currentIndex - 1 : currentImages.length - 1;
        } else {
            currentIndex = currentIndex < currentImages.length - 1 ? currentIndex + 1 : 0;
        }
        
        updateLightboxImage();
    }
    
    function handleKeydown(e) {
        if (!lightbox || lightbox.classList.contains('d-none')) return;
        
        switch (e.key) {
            case 'Escape':
                closeLightbox();
                break;
            case 'ArrowLeft':
                navigateLightbox('prev');
                break;
            case 'ArrowRight':
                navigateLightbox('next');
                break;
        }
    }
    
    // Lightbox event listeners
    if (lightbox) {
        const closeBtn = lightbox.querySelector('.lightbox-close');
        const backdrop = lightbox.querySelector('.lightbox-backdrop');
        const prevBtn = lightbox.querySelector('.lightbox-prev');
        const nextBtn = lightbox.querySelector('.lightbox-next');
        
        closeBtn?.addEventListener('click', closeLightbox);
        backdrop?.addEventListener('click', closeLightbox);
        prevBtn?.addEventListener('click', () => navigateLightbox('prev'));
        nextBtn?.addEventListener('click', () => navigateLightbox('next'));
    }
    
    // =================================
    // ADDITIONAL ANIMATIONS & EFFECTS
    // =================================
    
    // Smooth scroll functionality
    function smoothScroll(target, duration = 800) {
        const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - 80;
        const startPosition = window.pageYOffset;
        const distance = targetPosition - startPosition;
        let startTime = null;
        
        function animation(currentTime) {
            if (startTime === null) startTime = currentTime;
            const timeElapsed = currentTime - startTime;
            const run = easeInOutQuad(timeElapsed, startPosition, distance, duration);
            window.scrollTo(0, run);
            if (timeElapsed < duration) requestAnimationFrame(animation);
        }
        
        function easeInOutQuad(t, b, c, d) {
            t /= d / 2;
            if (t < 1) return c / 2 * t * t + b;
            t--;
            return -c / 2 * (t * (t - 2) - 1) + b;
        }
        
        requestAnimationFrame(animation);
    }
    
    // Hero scroll indicator functionality
    const scrollIndicator = document.querySelector('.hero-scroll-indicator');
    if (scrollIndicator) {
        scrollIndicator.addEventListener('click', function() {
            const gallerySection = document.querySelector('.gallery-section');
            if (gallerySection) {
                smoothScroll(gallerySection);
            }
        });
    }
    
    // Parallax effect for hero background
    function initParallax() {
        const heroBackground = document.querySelector('.hero-background');
        
        if (!heroBackground) return;
        
        let ticking = false;
        
        function updateParallax() {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.3;
            
            heroBackground.style.transform = `translate3d(0, ${rate}px, 0) scale(1.05)`;
            ticking = false;
        }
        
        function requestTick() {
            if (!ticking) {
                requestAnimationFrame(updateParallax);
                ticking = true;
            }
        }
        
        window.addEventListener('scroll', requestTick);
    }
    
    // Initialize parallax on desktop only
    if (window.innerWidth > 768) {
        initParallax();
    }
    
    // Image lazy loading enhancement
    function initLazyLoading() {
        const images = document.querySelectorAll('img[loading="lazy"]');
        
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src || img.src;
                        img.classList.remove('lazy');
                        img.style.opacity = '0';
                        img.onload = function() {
                            this.style.transition = 'opacity 0.3s ease';
                            this.style.opacity = '1';
                        };
                        imageObserver.unobserve(img);
                    }
                });
            });
            
            images.forEach(img => imageObserver.observe(img));
        }
    }
    
    initLazyLoading();
    
    // Handle image loading errors with better fallback
    document.querySelectorAll('img').forEach(img => {
        img.addEventListener('error', function() {
            this.style.background = 'var(--bg-tertiary)';
            this.style.color = 'var(--text-muted)';
            this.style.display = 'flex';
            this.style.alignItems = 'center';
            this.style.justifyContent = 'center';
            this.style.fontSize = '0.875rem';
            this.innerHTML = '<i class="fas fa-image" style="margin-right: 0.5rem;"></i>Image not found';
            console.warn('Image failed to load:', this.src);
        });
    });
    
    // Enhanced scroll-based effects
    const handleScroll = debounce(() => {
        const scrolled = window.pageYOffset;
        
        // Update scroll indicator visibility
        if (scrollIndicator) {
            scrollIndicator.style.opacity = scrolled > 100 ? '0' : '1';
            scrollIndicator.style.transform = `translateX(-50%) translateY(${scrolled > 100 ? '20px' : '0'})`;
        }
        
        // Add scroll progress indicator
        const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled_percent = (winScroll / height) * 100;
        
        // You can add a progress bar here if needed
    }, 10);
    
    window.addEventListener('scroll', handleScroll);
    
    // Debounce function for performance
    function debounce(func, wait, immediate) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                timeout = null;
                if (!immediate) func(...args);
            };
            const callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func(...args);
        };
    }
    
    // Accessibility enhancements
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Tab' && !e.shiftKey) {
            const focusedElement = document.activeElement;
            if (focusedElement && focusedElement.classList.contains('skip-link')) {
                e.preventDefault();
                const target = document.querySelector(focusedElement.getAttribute('href'));
                if (target) {
                    target.focus();
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            }
        }
    });
    
    // Announce filter changes to screen readers
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.textContent.trim();
            const visibleItems = document.querySelectorAll('.gallery-item-row:not(.hide)').length;
            const announcement = `Menampilkan ${visibleItems} galeri untuk kategori: ${filter}`;
            
            // Create temporary announcement element
            const announcer = document.createElement('div');
            announcer.setAttribute('aria-live', 'polite');
            announcer.setAttribute('aria-atomic', 'true');
            announcer.className = 'sr-only';
            announcer.textContent = announcement;
            
            document.body.appendChild(announcer);
            setTimeout(() => {
                document.body.removeChild(announcer);
            }, 1000);
        });
    });
    
    // Resize handler
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            // Reinitialize parallax on resize
            if (window.innerWidth > 768) {
                initParallax();
            }
            
            // Recalculate slider dimensions
            Object.keys(sliders).forEach(galleryId => {
                updateSlider(galleryId);
            });
        }, 250);
    });
    
    // Global error handler
    window.addEventListener('error', function(e) {
        console.error('Gallery page error:', e.error);
    });
    
    // =================================
    // MODERN ENTRANCE ANIMATIONS
    // =================================
    
    // Initialize animation observer
    function initModernAnimations() {
        // Add animation classes to hero elements
        const heroBadge = document.querySelector('.hero-badge');
        const heroTitle = document.querySelector('.hero-title');
        const heroDescription = document.querySelector('.hero-description');
        const heroStats = document.querySelector('.header-stats');
        const heroHighlights = document.querySelector('.hero-highlights');
        
        if (heroBadge) heroBadge.classList.add('hero-animate-badge');
        if (heroTitle) heroTitle.classList.add('hero-animate-title');
        if (heroDescription) heroDescription.classList.add('hero-animate-description');
        if (heroStats) heroStats.classList.add('hero-animate-stats');
        if (heroHighlights) heroHighlights.classList.add('hero-animate-highlights');
        
        // Setup intersection observer for showcase items
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const animationObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const element = entry.target;
                    
                    // Animate showcase items based on their position
                    if (element.classList.contains('left-image')) {
                        element.classList.add('showcase-animate-left');
                        
                        // Animate image and content with delay
                        setTimeout(() => {
                            const image = element.querySelector('.showcase-image-container');
                            const content = element.querySelector('.showcase-content');
                            if (image) image.classList.add('showcase-animate-image');
                            if (content) content.classList.add('showcase-animate-content');
                        }, 200);
                        
                    } else if (element.classList.contains('right-image')) {
                        element.classList.add('showcase-animate-right');
                        
                        // Animate image and content with delay
                        setTimeout(() => {
                            const image = element.querySelector('.showcase-image-container');
                            const content = element.querySelector('.showcase-content');
                            if (image) image.classList.add('showcase-animate-image');
                            if (content) content.classList.add('showcase-animate-content');
                        }, 200);
                    }
                    
                    // Add general scroll animation
                    element.classList.add('animate-on-scroll', 'visible');
                    
                    // Stop observing this element
                    animationObserver.unobserve(element);
                }
            });
        }, observerOptions);
        
        // Observe all showcase items
        document.querySelectorAll('.showcase-item').forEach(item => {
            animationObserver.observe(item);
        });
        
        // Add stagger animation to highlight items
        document.querySelectorAll('.highlight-item').forEach((item, index) => {
            item.classList.add(`animate-stagger-${Math.min(index + 1, 5)}`);
        });
        
        // Add stagger animation to stats
        document.querySelectorAll('.stat-item').forEach((item, index) => {
            item.classList.add(`animate-stagger-${Math.min(index + 1, 3)}`);
        });
    }
    
    // =================================
    // INITIALIZATION COMPLETE
    // =================================
    console.log('Gallery page initialized successfully with enhanced animations and dark/light theme support');
    
    // Force animation reset for consistent behavior
    forceAnimationReset();
    
    // Initialize modern entrance animations
    initModernAnimations();
    
    // Additional animation triggers for edge cases
    setTimeout(() => {
        // Force trigger hero animations if they haven't started
        const heroBadge = document.querySelector('.header-badge');
        const heroTitle = document.querySelector('.page-title'); 
        const heroDesc = document.querySelector('.page-description');
        const heroStats = document.querySelector('.header-stats');
        const heroHighlights = document.querySelector('.hero-highlights');
        
        if (heroBadge && !heroBadge.classList.contains('hero-animate-badge')) {
            heroBadge.classList.add('hero-animate-badge');
        }
        if (heroTitle && !heroTitle.classList.contains('hero-animate-title')) {
            heroTitle.classList.add('hero-animate-title');
        }
        if (heroDesc && !heroDesc.classList.contains('hero-animate-description')) {
            heroDesc.classList.add('hero-animate-description');
        }
        if (heroStats && !heroStats.classList.contains('hero-animate-stats')) {
            heroStats.classList.add('hero-animate-stats');
        }
        if (heroHighlights && !heroHighlights.classList.contains('hero-animate-highlights')) {
            heroHighlights.classList.add('hero-animate-highlights');
        }
    }, 500);
    
    // Dispatch custom event for other scripts
    document.dispatchEvent(new CustomEvent('galleryReady', {
        detail: { timestamp: Date.now() }
    }));
});

// Additional window load listener for edge cases
window.addEventListener('load', function() {
    // Force refresh animations after everything is loaded
    setTimeout(() => {
        if (typeof AOS !== 'undefined') {
            AOS.refresh();
        }
        
        // Ensure all hero elements have animations
        const heroElements = [
            { element: document.querySelector('.header-badge'), class: 'hero-animate-badge' },
            { element: document.querySelector('.page-title'), class: 'hero-animate-title' },
            { element: document.querySelector('.page-description'), class: 'hero-animate-description' },
            { element: document.querySelector('.header-stats'), class: 'hero-animate-stats' },
            { element: document.querySelector('.hero-highlights'), class: 'hero-animate-highlights' }
        ];
        
        heroElements.forEach(({ element, class: className }) => {
            if (element && !element.classList.contains(className)) {
                element.classList.add(className);
            }
        });
    }, 200);
});
</script>
@endsection
