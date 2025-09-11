@extends('components.layout')

@section('title', $title)

@section('content')
<!-- Page Header with Enhanced Design -->
<section class="page-header page-entrance" data-aos="fade-in" data-aos-duration="1500">
    <div class="page-header-bg" style="background-image: url('{{ asset('img/career/carir.jpg') }}');"></div>
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
                        <i class="fas fa-images"></i>
                        <span>Portfolio</span>
                    </div>
                    <h1 class="page-title" data-aos="fade-up" data-aos-delay="400">
                        <span class="title-main">Galeri</span>
                        <span class="title-highlight">Proyek Kami</span>
                    </h1>
                    <p class="page-description" data-aos="fade-up" data-aos-delay="600">
                        Eksplorasi portofolio proyek insulasi industri kami dengan kualitas tinggi, 
                        eksekusi rapi, dan hasil yang dapat diandalkan untuk berbagai kebutuhan industri.
                    </p>
                    <div class="header-stats" data-aos="fade-up" data-aos-delay="800">
                        <div class="stat-item">
                            <span class="stat-number counter-animate" data-count="500">0</span>
                            <span class="stat-label">Proyek Selesai</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number counter-animate" data-count="200">0</span>
                            <span class="stat-label">Klien Puas</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number counter-animate" data-count="14">0</span>
                            <span class="stat-label">Tahun Pengalaman</span>
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
                <span>Portofolio</span>
            </div>
            <h2 class="section-title">Galeri Proyek Terbaik</h2>
            <p class="section-description">
                Koleksi proyek-proyek unggulan yang telah kami kerjakan dengan standar kualitas tinggi
                dan kepuasan pelanggan sebagai prioritas utama.
            </p>
        </div>

        @if($galleries->count() > 0)
            <div class="gallery-grid">
                <div class="row">
                    @foreach($galleries as $index => $gallery)
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ 100 * ($index % 3) }}">
                        <div class="gallery-card">
                            <div class="gallery-image-container">
                                @php $images = $gallery->images; @endphp
                                @if($images->count() > 0)
                                    <div class="gallery-slider" data-gallery-id="{{ $gallery->id }}">
                                        <div class="slider-wrapper">
                                            <div class="slider-main">
                                                @foreach($images as $idx => $img)
                                                    <div class="slide {{ $idx == 0 ? 'active' : '' }}">
                                                        <img src="{{ asset($img->image_url) }}" alt="{{ $gallery->title }}" class="gallery-image" loading="lazy">
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
                                        <span>Tidak ada gambar</span>
                                    </div>
                                @endif
                                
                                <!-- Gallery Overlay -->
                                <div class="gallery-overlay">
                                    <div class="overlay-content">
                                        <button class="gallery-view-btn" onclick="openGalleryLightbox({{ $gallery->id }}, '{{ $gallery->title }}', {{ json_encode($images->pluck('image_url')) }})">
                                            <i class="fas fa-eye"></i>
                                            <span>Lihat Detail</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Gallery Info -->
                            <div class="gallery-info">
                                <div class="gallery-meta">
                                    <span class="category-badge">
                                        <i class="fas fa-tag"></i>
                                        {{ ucfirst(str_replace('-', ' ', $gallery->category ?? 'General')) }}
                                    </span>
                                    <span class="date-badge">
                                        <i class="fas fa-calendar-alt"></i>
                                        {{ $gallery->created_at->format('M Y') }}
                                    </span>
                                </div>
                                <h3 class="gallery-title">{{ $gallery->title }}</h3>
                                <p class="gallery-description">{{ Str::limit($gallery->description, 100) }}</p>
                                <div class="gallery-stats">
                                    <div class="stat-item">
                                        <i class="fas fa-images"></i>
                                        <span>{{ $images->count() }} Foto</span>
                                    </div>
                                    <div class="stat-item">
                                        <i class="fas fa-clock"></i>
                                        <span>{{ $gallery->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
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
                <h3>Belum Ada Galeri</h3>
                <p>Galeri proyek sedang dalam tahap pengembangan. Silakan cek kembali untuk melihat portofolio terbaru kami.</p>
                <div class="no-gallery-actions">
                    <a href="{{ route('contact') }}" class="btn btn-primary">
                        <i class="fas fa-phone"></i>
                        <span>Hubungi Kami</span>
                    </a>
                    <a href="{{ route('products') }}" class="btn btn-outline-primary">
                        <i class="fas fa-cubes"></i>
                        <span>Lihat Produk</span>
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
            <h2>Pencapaian Kami</h2>
            <p>Bukti nyata dedikasi dan kualitas layanan kami</p>
        </div>
        <div class="stats-grid">
            <div class="stat-card animate-on-scroll animate-stagger-1" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <div class="stat-content">
                    <span class="stat-number counter-animate" data-count="500">0</span>
                    <span class="stat-label">Proyek Selesai</span>
                    <span class="stat-description">Dalam berbagai skala industri</span>
                </div>
            </div>
            <div class="stat-card animate-on-scroll animate-stagger-2" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <div class="stat-content">
                    <span class="stat-number counter-animate" data-count="200">0</span>
                    <span class="stat-label">Klien Puas</span>
                    <span class="stat-description">Tingkat kepuasan 98%</span>
                </div>
            </div>
            <div class="stat-card animate-on-scroll animate-stagger-3" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="stat-content">
                    <span class="stat-number counter-animate" data-count="50">0</span>
                    <span class="stat-label">Kota Terjangkau</span>
                    <span class="stat-description">Di seluruh Indonesia</span>
                </div>
            </div>
            <div class="stat-card animate-on-scroll animate-stagger-4" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-icon">
                    <i class="fas fa-award"></i>
                </div>
                <div class="stat-content">
                    <span class="stat-number counter-animate" data-count="14">0</span>
                    <span class="stat-label">Tahun Pengalaman</span>
                    <span class="stat-description">Expertise terpercaya</span>
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
            <h2 class="animate-on-scroll animate-stagger-2">Siap Memulai Proyek Anda?</h2>
            <p class="animate-on-scroll animate-stagger-3">Konsultasikan kebutuhan insulasi industri Anda dengan tim ahli kami. Dapatkan solusi terbaik dan penawaran khusus untuk proyek Anda.</p>
            <div class="cta-actions animate-on-scroll animate-stagger-4">
                <a href="{{ route('contact') }}" class="btn btn-primary">
                    <i class="fas fa-phone"></i>
                    <span>Konsultasi Gratis</span>
                </a>
                <a href="{{ route('products') }}" class="btn btn-outline">
                    <i class="fas fa-cubes"></i>
                    <span>Lihat Produk</span>
                </a>
            </div>
            <div class="cta-features animate-on-scroll animate-stagger-5">
                <div class="feature-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Konsultasi Gratis</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Penawaran Terbaik</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Garansi Kualitas</span>
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
    padding: 70px 0 80px;
    position: relative;
    overflow: hidden;
    min-height: 80vh;
    height: auto;
    display: flex;
    align-items: center;
    width: 100%;
    max-width: 100vw;
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
    background: linear-gradient(135deg, #ffffff, #f0f8ff, #ffffff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
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
    opacity: 0.95;
    max-width: 700px;
    margin: 0 auto 3rem;
    line-height: 1.7;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
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
    display: block;
    background: linear-gradient(135deg, var(--gallery-gold), #FFF8DC);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.stat-label {
    font-size: 0.9rem;
    font-weight: 600;
    opacity: 0.9;
    margin-top: 0.5rem;
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
    background: var(--gallery-bg-secondary);
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

/* Gallery Grid */
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
    background: rgba(0, 0, 0, 0.7);
    backdrop-filter: blur(10px);
    color: white;
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 1rem;
    transition: all 0.3s ease;
    z-index: 10;
    opacity: 0;
}

.gallery-image-container:hover .slider-nav {
    opacity: 1;
}

.prev-btn {
    left: 0.75rem;
}

.next-btn {
    right: 0.75rem;
}

.slider-nav:hover {
    background: rgba(0, 0, 0, 0.9);
    transform: translateY(-50%) scale(1.1);
}

/* Slider Indicators */
.slider-indicators {
    position: absolute;
    bottom: 0.75rem;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 0.4rem;
    z-index: 10;
}

.indicator-dot {
    width: 10px;
    height: 10px;
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

/* Image Counter */
.image-counter {
    position: absolute;
    top: 0.75rem;
    right: 0.75rem;
    background: rgba(0, 0, 0, 0.7);
    backdrop-filter: blur(10px);
    color: white;
    padding: 0.4rem 0.8rem;
    border-radius: 15px;
    font-size: 0.75rem;
    font-weight: 600;
    z-index: 10;
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
}

@media (max-width: 768px) {
    .page-header {
        min-height: 60vh;
        padding: 50px 0 60px;
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
    background-image: url('{{ asset("img/career/carir.jpg") }}');
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

.stat-card:hover .stat-icon {
    transform: scale(1.1) rotate(5deg);
}

.stat-content .stat-number {
    display: block;
    font-size: 3rem;
    font-weight: 900;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
    line-height: 1;
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
    color: white;
}

.cta-background {
    position: absolute;
    inset: 0;
    background-image: url('{{ asset("img/kontak/108.png") }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    filter: blur(10px);
    z-index: 0;
}

.cta-background::before {
    content: '';
    position: absolute;
    inset: 0;
    background: rgba(15, 23, 42, 0.4);
    z-index: 1;
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
}

.cta-content p {
    font-size: 1.25rem;
    opacity: 0.9;
    margin-bottom: 3rem;
    line-height: 1.6;
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
    background: white;
    color: var(--brand-primary);
    border-color: white;
}

.btn-primary:hover {
    background: transparent;
    color: white;
    border-color: white;
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}

.btn-outline {
    background: transparent;
    color: white;
    border-color: rgba(255, 255, 255, 0.3);
}

.btn-outline:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: white;
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
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
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
        const slider = sliders[galleryId];
        if (!slider || slider.isAnimating) return;
        
        slider.isAnimating = true;
        const currentSlide = slider.slides[slider.currentSlide];
        
        // Update slide index
        slider.currentSlide += direction;
        
        if (slider.currentSlide >= slider.totalSlides) {
            slider.currentSlide = 0;
        } else if (slider.currentSlide < 0) {
            slider.currentSlide = slider.totalSlides - 1;
        }
        
        const nextSlide = slider.slides[slider.currentSlide];
        
        // Animate slide transition
        if (direction > 0) {
            nextSlide.style.transform = 'translateX(100%)';
            nextSlide.style.opacity = '1';
            
            setTimeout(() => {
                currentSlide.style.transform = 'translateX(-100%)';
                nextSlide.style.transform = 'translateX(0)';
            }, 50);
        } else {
            nextSlide.style.transform = 'translateX(-100%)';
            nextSlide.style.opacity = '1';
            
            setTimeout(() => {
                currentSlide.style.transform = 'translateX(100%)';
                nextSlide.style.transform = 'translateX(0)';
            }, 50);
        }
        
        setTimeout(() => {
            updateSlider(galleryId);
            slider.isAnimating = false;
        }, 600);
    };
    
    // Enhanced go to specific slide
    window.goToSlide = function(galleryId, slideIndex) {
        const slider = sliders[galleryId];
        if (!slider || slider.isAnimating || slideIndex === slider.currentSlide) return;
        
        const direction = slideIndex > slider.currentSlide ? 1 : -1;
        slider.currentSlide = slideIndex;
        
        // Add smooth transition effect
        const targetSlide = slider.slides[slideIndex];
        targetSlide.style.transform = `translateX(${direction > 0 ? '100%' : '-100%'})`;
        targetSlide.style.opacity = '1';
        
        setTimeout(() => {
            slider.slides.forEach((slide, index) => {
                if (index === slideIndex) {
                    slide.style.transform = 'translateX(0)';
                    slide.style.opacity = '1';
                } else {
                    slide.style.opacity = '0';
                }
            });
            updateSlider(galleryId);
        }, 50);
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
    // INITIALIZATION COMPLETE
    // =================================
    console.log('Gallery page initialized successfully with enhanced animations and dark/light theme support');
    
    // Dispatch custom event for other scripts
    document.dispatchEvent(new CustomEvent('galleryReady', {
        detail: { timestamp: Date.now() }
    }));
});
</script>
@endsection
