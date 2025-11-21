@extends('components.layout')

@section('title', $title)

@section('content')
<!-- Page Header -->
<section class="page-header" data-aos="fade-up" data-aos-duration="1500">
    <div class="page-header-bg" style="background-image: url('{{ asset('img/galeri-proyek/118.png') }}');"></div>
    <div class="page-header-overlay"></div>
    <div class="container">
        <div class="header-content">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="page-title" data-aos="fade-up" data-aos-delay="400">
                        <span class="title-main">Portofolio Kami</span>
                        <span class="title-highlight">Proyek Terbaik</span>
                    </h1>
                    <p class="page-description" data-aos="fade-up" data-aos-delay="600">
                        Solusi insulasi berkualitas untuk berbagai industri. Lihat hasil kerja kami dalam 
                        menyediakan efisiensi energi dan kenyamanan optimal.
                    </p>
                    <div class="header-stats" data-aos="fade-up" data-aos-delay="800">
                        <div class="stat-item">
                            <div class="stat-number-row">
                                <span class="stat-number counter-animate" data-count="500">0</span><span class="stat-plus">+</span>
                            </div>
                            <div class="stat-label-row">
                                <span class="stat-label">Proyek Selesai</span>
                            </div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number-row">
                                <span class="stat-number counter-animate" data-count="200">0</span><span class="stat-plus">+</span>
                            </div>
                            <div class="stat-label-row">
                                <span class="stat-label">Klien Puas</span>
                            </div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number-row">
                                <span class="stat-number counter-animate" data-count="14">0</span><span class="stat-plus">+</span>
                            </div>
                            <div class="stat-label-row">
                                <span class="stat-label">Tahun Pengalaman</span>
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
            <h2 class="section-title">Proyek Kami</h2>
            <p class="section-description">
                Koleksi proyek insulasi terbaik yang telah kami kerjakan dengan standar kualitas tinggi.
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
                                            <span>Tidak ada gambar</span>
                                        </div>
                                    @endif
                                    
                                    <!-- Gallery Overlay -->
                                    <div class="gallery-overlay">
                                        <div class="overlay-content">
                                            <button class="gallery-view-btn" onclick="openGalleryLightbox({{ $gallery->id }}, '{{ $gallery->title }}', {{ json_encode($images->pluck('image_url')) }})">
                                                <span>Lihat Detail</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Content Column -->
                            <div class="col-lg-6 {{ $index % 2 == 0 ? 'order-2' : 'order-1' }}">
                                <div class="showcase-content">
                                    <h3 class="showcase-title">{{ $gallery->title }}</h3>
                                    <p class="showcase-description">{{ $gallery->description }}</p>
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
                <h3>Portofolio Kosong</h3>
                <p>Belum ada proyek yang ditampilkan. Silakan hubungi kami untuk informasi lebih lanjut.</p>
                <div class="no-gallery-actions">
                    <a href="{{ route('contact') }}" class="btn btn-primary">
                        <span>Hubungi Kami</span>
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
            <h2>Statistik Kami</h2>
            <p>Angka nyata kualitas layanan kami</p>
        </div>
        <div class="stats-grid">
            <div class="stat-card animate-on-scroll animate-stagger-1" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-content">
                    <span class="stat-number counter-animate" data-count="500">0</span><span class="stat-plus">+</span>
                    <span class="stat-label">Proyek Selesai</span>
                    <span class="stat-description">Berbagai industri</span>
                </div>
            </div>
            <div class="stat-card animate-on-scroll animate-stagger-2" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-content">
                    <span class="stat-number counter-animate" data-count="200">0</span><span class="stat-plus">+</span>
                    <span class="stat-label">Klien Puas</span>
                    <span class="stat-description">Kepuasan 98%</span>
                </div>
            </div>
            <div class="stat-card animate-on-scroll animate-stagger-3" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-content">
                    <span class="stat-number counter-animate" data-count="50">0</span><span class="stat-plus">+</span>
                    <span class="stat-label">Kota</span>
                    <span class="stat-description">Seluruh Indonesia</span>
                </div>
            </div>
            <div class="stat-card animate-on-scroll animate-stagger-4" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-content">
                    <span class="stat-number counter-animate" data-count="14">0</span><span class="stat-plus">+</span>
                    <span class="stat-label">Tahun</span>
                    <span class="stat-description">Pengalaman</span>
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
            <h2>Mulai Proyek Anda</h2>
            <p>Konsultasikan kebutuhan insulasi Anda dengan tim ahli kami. Dapatkan solusi terbaik dan penawaran khusus.</p>
            <div class="cta-actions">
                <a href="{{ route('contact') }}" class="btn btn-cta-primary">
                    <span>Konsultasi Gratis</span>
                </a>
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

/* Prevent Horizontal Overflow */
html, body {
    overflow-x: hidden;
    max-width: 100vw;
}

* {
    box-sizing: border-box;
}

/* Modern Gallery Page with Clean Design */
:root {
    --gallery-primary: #991b1b;
    --gallery-secondary: #dc2626;
    --gallery-accent: #f87171;
    --gallery-gold: #ffffff;
    --gallery-text-primary: #2d3748;
    --gallery-text-secondary: #718096;
    --gallery-text-muted: #a0aec0;
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
    --gallery-text-secondary: #cbd5e0;
    --gallery-text-muted: #a0aec0;
    --gallery-bg-primary: #1a202c;
    --gallery-bg-secondary: #2d3748;
    --gallery-bg-tertiary: #4a5568;
    --gallery-border: #4a5568;
    --gallery-shadow: rgba(0, 0, 0, 0.3);
    --gallery-shadow-lg: rgba(0, 0, 0, 0.4);
}

/* Page Header */
.page-header {
    color: white;
    padding: 20px 0 80px;
    position: relative;
    overflow: hidden;
    min-height: 85vh;
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
        linear-gradient(135deg, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0.5) 50%, rgba(0, 0, 0, 0.6) 100%);
    backdrop-filter: blur(2px);
    z-index: 2;
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
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(20px);
    color: white;
    padding: 12px 24px;
    border-radius: 30px;
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 2rem;
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    text-transform: uppercase;
    letter-spacing: 1px;
}

.page-title {
    font-size: 3.5rem;
    font-weight: 900;
    margin-bottom: 1.5rem;
    line-height: 1.1;
}

.title-main {
    display: block;
    color: white;
    font-weight: 900;
}

.title-highlight {
    display: block;
    background: linear-gradient(135deg, #991b1b 0%, #dc2626 35%, #f87171 65%, #ffffff 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-size: 0.8em;
    margin-top: 0.5rem;
}

.page-description {
    font-size: 1.2rem;
    color: rgba(255, 255, 255, 0.9);
    max-width: 700px;
    margin: 0 auto 3rem;
    line-height: 1.7;
    font-weight: 500;
}

.header-stats {
    display: flex;
    justify-content: center;
    gap: 2rem;
    margin-top: 3rem;
}

.stat-item {
    text-align: center;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(20px);
    padding: 1.5rem 2rem;
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    transition: all 0.3s ease;
}

.stat-item:hover {
    transform: translateY(-8px) scale(1.05);
    background: rgba(255, 255, 255, 0.25);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
}

.stat-number {
    font-size: 2rem;
    font-weight: 900;
    display: inline-block;
    color: white;
}

.stat-plus {
    font-size: 2rem;
    font-weight: 900;
    color: white;
    margin-left: 2px;
}

.stat-label {
    font-size: 0.9rem;
    font-weight: 600;
    opacity: 0.9;
    margin-top: 0.5rem;
    color: white;
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

/* Section Title */
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
        radial-gradient(circle at 80% 80%, rgba(220, 38, 38, 0.03) 0%, transparent 50%);
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
    width: 100%;
    height: 0;
    padding-bottom: 125%; /* 9:16 Aspect Ratio */
}

.showcase-item:hover .showcase-image-container {
    transform: translateY(-10px);
    box-shadow: 0 30px 80px var(--gallery-shadow-lg);
}

.showcase-slider {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
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
    height: 0;
    padding-bottom: 125%; /* 9:16 Aspect Ratio */
    overflow: hidden;
    background: var(--gallery-bg-tertiary);
}

.gallery-slider {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
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
    background: linear-gradient(135deg, rgba(153, 27, 27, 0.8), rgba(220, 38, 38, 0.6));
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

/* Buttons - Fixed to avoid Bootstrap conflicts */
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

/* Primary button for general use */
.btn-primary {
    background: linear-gradient(135deg, var(--gallery-primary), var(--gallery-secondary));
    color: white;
    border-color: var(--gallery-primary);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(153, 27, 27, 0.3);
    background: linear-gradient(135deg, var(--gallery-secondary), var(--gallery-accent));
    border-color: var(--gallery-secondary);
}

/* Outline primary button */
.btn-outline-primary {
    background: transparent;
    color: var(--gallery-primary);
    border-color: var(--gallery-primary);
}

.btn-outline-primary:hover {
    background: var(--gallery-primary);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(153, 27, 27, 0.2);
}

/* Special CTA button with no border on hover */
.btn-cta-primary {
    background: linear-gradient(135deg, var(--gallery-primary), var(--gallery-secondary));
    color: white;
    border: 2px solid var(--gallery-primary);
}

.btn-cta-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(153, 27, 27, 0.3);
    background: linear-gradient(135deg, var(--gallery-secondary), var(--gallery-accent));
    border: 2px solid transparent;
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

/* Statistics Section */
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
    color: var(--gallery-text-primary);
    margin-bottom: 1rem;
}

.stats-header p {
    font-size: 1.125rem;
    color: var(--gallery-text-secondary);
    max-width: 600px;
    margin: 0 auto;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
}

.stat-card {
    background: var(--gallery-bg-secondary);
    padding: 3rem 2rem;
    border-radius: 20px;
    text-align: center;
    border: 1px solid var(--gallery-border);
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
    background: linear-gradient(135deg, var(--gallery-primary), var(--gallery-secondary), var(--gallery-accent));
    transform: scaleX(0);
    transition: transform 0.4s ease;
}

.stat-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px var(--gallery-shadow-lg);
    border-color: var(--gallery-primary);
}

.stat-card:hover::before {
    transform: scaleX(1);
}

.stat-content .stat-number {
    display: inline-block;
    font-size: 3rem;
    font-weight: 900;
    color: var(--gallery-primary);
    margin-bottom: 0.5rem;
    line-height: 1;
}

.stat-content .stat-plus {
    font-size: 3rem;
    font-weight: 900;
    color: var(--gallery-primary);
    margin-left: 2px;
}

.stat-content .stat-label {
    display: block;
    font-size: 1.125rem;
    font-weight: 700;
    color: var(--gallery-text-primary);
    margin-bottom: 0.5rem;
}

.stat-content .stat-description {
    font-size: 0.875rem;
    color: var(--gallery-text-secondary);
    opacity: 0.8;
}

/* CTA Section - Fixed with semi-transparent white background */
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
    opacity: 2;
}

.cta-background::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.75));
    z-index: 1;
}

body.dark-theme .cta-background::before {
    background: linear-gradient(135deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.7));
}

.cta-content {
    position: relative;
    z-index: 2;
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
}

.cta-content h2 {
    font-size: 3rem;
    font-weight: 800;
    margin-bottom: 1.5rem;
    line-height: 1.2;
    color: #000000;
}

body.dark-theme .cta-content h2 {
    color: #ffffff;
}

.cta-content p {
    font-size: 1.25rem;
    margin-bottom: 3rem;
    line-height: 1.6;
    color: #333333;
}

body.dark-theme .cta-content p {
    color: #e0e0e0;
}

.cta-actions {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 3rem;
    flex-wrap: wrap;
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
    .showcase-title {
        font-size: 2rem;
    }
    
    .left-image .showcase-content {
        padding-left: 1rem;
    }
    
    .right-image .showcase-content {
        padding-right: 1rem;
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
    
    .lightbox-prev {
        left: -50px;
    }
    
    .lightbox-next {
        right: -50px;
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
    // COUNTER ANIMATION
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
    // GALLERY SLIDER FUNCTIONALITY
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
    // LIGHTBOX FOR GALLERY
    // =================================
    const lightbox = document.getElementById('lightbox');
    const lightboxImage = lightbox?.querySelector('.lightbox-image');
    const lightboxTitle = lightbox?.querySelector('.lightbox-title');
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
    };

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
    // ADDITIONAL EFFECTS
    // =================================
    
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
            this.style.background = 'var(--gallery-bg-tertiary)';
            this.style.color = 'var(--gallery-text-secondary)';
            this.style.display = 'flex';
            this.style.alignItems = 'center';
            this.style.justifyContent = 'center';
            this.style.fontSize = '0.875rem';
            this.innerHTML = 'Image not found';
        });
    });
    
    // Global error handler
    window.addEventListener('error', function(e) {
        console.error('Gallery page error:', e.error);
    });
    
    console.log('Gallery page initialized successfully with improved responsive design');
});
</script>
@endsection