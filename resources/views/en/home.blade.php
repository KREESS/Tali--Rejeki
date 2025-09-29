@extends('en.components.layout')

@section('title', $title)

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-bg">
        <div class="hero-overlay"></div>
        <div class="hero-particles">
            @for($i = 0; $i < 10; $i++)
                <div class="particle"></div>
            @endfor
        </div>
    </div>
    
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6">
                <div class="hero-content" data-aos="fade-up" data-aos-duration="1000">
                    <div class="hero-badge">
                        <i class="fas fa-award"></i>
                        <span>Distributor Terpercaya Sejak 2011</span>
                    </div>
                    
                    <h1 class="hero-title">
                        <span class="highlight">Tali Rejeki</span><br>
                        <span>Distributor Insulasi</span><br>
                        <span>Industri Terdepan</span>
                    </h1>
                    
                    <p class="hero-description">
                        Menyediakan solusi insulasi berkualitas tinggi untuk industri dengan produk unggulan 
                        seperti Glasswool, Rockwool, Nitrile Rubber, dan aksesoris HVAC terlengkap di Indonesia.
                    </p>
                    
                    <div class="hero-stats">
                        <div class="stat-item">
                            <span class="stat-number" data-count="500">0</span>
                            <span class="stat-plus">+</span>
                            <span class="stat-label">Proyek Selesai</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number" data-count="50">0</span>
                            <span class="stat-plus">+</span>
                            <span class="stat-label">Kota Terjangkau</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number" data-count="12">0</span>
                            <span class="stat-plus">+</span>
                            <span class="stat-label">Tahun Pengalaman</span>
                        </div>
                    </div>
                    
                    <div class="hero-actions">
                        <a href="{{ route('products') }}" class="btn btn-primary">
                            <i class="fas fa-cubes"></i>
                            <span>Lihat Produk</span>
                        </a>
                        <a href="{{ route('contact') }}" class="btn btn-outline">
                            <i class="fas fa-phone"></i>
                            <span>Hubungi Kami</span>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="hero-visual" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                    <div class="visual-card">
                        <img src="{{ asset('img/hero-product.jpg') }}" alt="Produk Insulasi" class="hero-image">
                        <div class="visual-badge">
                            <i class="fas fa-fire"></i>
                            <span>Tahan Api</span>
                        </div>
                    </div>
                    
                    <div class="floating-elements">
                        <div class="float-item item-1">
                            <i class="fas fa-shield-alt"></i>
                            <span>Kualitas Terjamin</span>
                        </div>
                        <div class="float-item item-2">
                            <i class="fas fa-leaf"></i>
                            <span>Ramah Lingkungan</span>
                        </div>
                        <div class="float-item item-3">
                            <i class="fas fa-certificate"></i>
                            <span>Berstandar ISO</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
@if($categories->count() > 0)
<section id="categories" class="categories-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <div class="section-badge">
                <i class="fas fa-th-large"></i>
                <span>Kategori Produk</span>
            </div>
            <h2 class="section-title">Solusi Insulasi Terlengkap</h2>
            <p class="section-description">
                Kami menyediakan berbagai jenis material insulasi berkualitas tinggi 
                untuk memenuhi kebutuhan industri Anda
            </p>
        </div>
        
        <div class="row g-4">
            @foreach($categories as $index => $category)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-cube"></i>
                    </div>
                    <div class="category-content">
                        <h3 class="category-title">{{ $category->name }}</h3>
                        <p class="category-description">{{ $category->description ?? 'Produk insulasi berkualitas tinggi untuk berbagai kebutuhan industri.' }}</p>
                        <div class="category-stats">
                            <span class="product-count">{{ $category->products_count ?? 0 }} produk</span>
                        </div>
                        <a href="{{ route('products.category', $category->slug) }}" class="category-link">
                            <span>Lihat Produk</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('products') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-th"></i>
                Lihat Semua Produk
            </a>
        </div>
    </div>
</section>
@endif

<!-- Featured Products Section -->
@if($featuredProducts->count() > 0)
<section id="featured-products" class="featured-products-section py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <div class="section-badge">
                <i class="fas fa-star"></i>
                <span>Produk Unggulan</span>
            </div>
            <h2 class="section-title">Produk Terlaris Kami</h2>
            <p class="section-description">
                Pilihan terbaik produk insulasi yang paling banyak dipercaya oleh klien kami
            </p>
        </div>
        
        <div class="row g-4">
            @foreach($featuredProducts->take(8) as $index => $product)
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="product-card">
                    <div class="product-image">
                        @if($product->images->count() > 0)
                            <img src="{{ asset('storage/' . $product->images->first()->image_path) }}" 
                                 alt="{{ $product->name }}" 
                                 class="img-fluid">
                        @else
                            <div class="no-image">
                                <i class="fas fa-image"></i>
                                <span>No Image</span>
                            </div>
                        @endif
                        <div class="product-overlay">
                            <a href="{{ route('product.detail', $product->slug) }}" class="btn btn-white btn-sm">
                                <i class="fas fa-eye"></i>
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                    <div class="product-content">
                        <span class="product-category">{{ $product->category->name ?? 'Uncategorized' }}</span>
                        <h3 class="product-title">
                            <a href="{{ route('product.detail', $product->slug) }}">{{ $product->name }}</a>
                        </h3>
                        <p class="product-description">{{ Str::limit($product->description, 100) }}</p>
                        @if($product->price)
                        <div class="product-price">
                            <span class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('products') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-shopping-cart"></i>
                Lihat Semua Produk
            </a>
        </div>
    </div>
</section>
@endif

<!-- Gallery Section -->
@if($galleryItems->count() > 0)
<section id="gallery-preview" class="gallery-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <div class="section-badge">
                <i class="fas fa-images"></i>
                <span>Galeri Proyek</span>
            </div>
            <h2 class="section-title">Portofolio Proyek Terkini</h2>
            <p class="section-description">
                Lihat hasil kerja profesional kami dalam berbagai proyek insulasi industri
            </p>
        </div>
        
        <div class="row g-4">
            @foreach($galleryItems->take(6) as $index => $gallery)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="gallery-card">
                    <div class="gallery-image">
                        @if($gallery->images->count() > 0)
                            <img src="{{ asset('storage/' . $gallery->images->first()->image_path) }}" 
                                 alt="{{ $gallery->title }}" 
                                 class="img-fluid">
                        @else
                            <div class="no-image">
                                <i class="fas fa-image"></i>
                                <span>No Image</span>
                            </div>
                        @endif
                        <div class="gallery-overlay">
                            <a href="{{ route('gallery.detail', $gallery->slug) }}" class="gallery-link">
                                <i class="fas fa-search-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="gallery-content">
                        <h3 class="gallery-title">{{ $gallery->title }}</h3>
                        <p class="gallery-description">{{ Str::limit($gallery->description, 80) }}</p>
                        <div class="gallery-meta">
                            <span class="gallery-date">{{ $gallery->created_at->format('d M Y') }}</span>
                            <span class="gallery-images">{{ $gallery->images->count() }} foto</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('gallery') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-images"></i>
                Lihat Semua Galeri
            </a>
        </div>
    </div>
</section>
@endif

<!-- Latest Articles Section -->
@if($latestArticles->count() > 0)
<section id="latest-articles" class="articles-section py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <div class="section-badge">
                <i class="fas fa-newspaper"></i>
                <span>Artikel Terbaru</span>
            </div>
            <h2 class="section-title">Berita & Informasi</h2>
            <p class="section-description">
                Dapatkan informasi terkini seputar industri insulasi dan tips perawatan
            </p>
        </div>
        
        <div class="row g-4">
            @foreach($latestArticles as $index => $article)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="article-card">
                    <div class="article-image">
                        @if($article->featured_image)
                            <img src="{{ asset('storage/' . $article->featured_image) }}" 
                                 alt="{{ $article->title }}" 
                                 class="img-fluid">
                        @else
                            <div class="no-image">
                                <i class="fas fa-newspaper"></i>
                                <span>No Image</span>
                            </div>
                        @endif
                    </div>
                    <div class="article-content">
                        <div class="article-meta">
                            <span class="article-category">{{ $article->category->name ?? 'Artikel' }}</span>
                            <span class="article-date">{{ $article->created_at->format('d M Y') }}</span>
                        </div>
                        <h3 class="article-title">
                            <a href="{{ route('blog.detail', $article->slug) }}">{{ $article->title }}</a>
                        </h3>
                        <p class="article-excerpt">{{ Str::limit($article->excerpt, 120) }}</p>
                        <a href="{{ route('blog.detail', $article->slug) }}" class="article-link">
                            <span>Baca Selengkapnya</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('blog') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-newspaper"></i>
                Lihat Semua Artikel
            </a>
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="cta-section py-5">
    <div class="container">
        <div class="cta-content text-center" data-aos="fade-up">
            <div class="cta-icon">
                <i class="fas fa-handshake"></i>
            </div>
            <h2 class="cta-title">Siap Memulai Proyek Anda?</h2>
            <p class="cta-description">
                Konsultasikan kebutuhan insulasi industri Anda dengan tim ahli kami. 
                Dapatkan solusi terbaik dan penawaran menarik!
            </p>
            <div class="cta-actions">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-lg me-3">
                    <i class="fas fa-phone"></i>
                    Konsultasi Gratis
                </a>
                <a href="{{ route('catalog') }}" class="btn btn-outline-primary btn-lg">
                    <i class="fas fa-download"></i>
                    Download Katalog
                </a>
            </div>
        </div>
    </div>
</section>

<style>
/* Hero Section Styles */
.hero-section {
    position: relative;
    min-height: 100vh;
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
    background: linear-gradient(135deg, #7c1415 0%, #b71c1c 50%, #dc2626 100%);
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
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.particle {
    position: absolute;
    width: 4px;
    height: 4px;
    background: rgba(255, 255, 255, 0.4);
    border-radius: 50%;
    animation: float 6s infinite linear;
}

.particle:nth-child(1) { left: 10%; animation-delay: 0s; }
.particle:nth-child(2) { left: 20%; animation-delay: 1s; }
.particle:nth-child(3) { left: 30%; animation-delay: 2s; }
.particle:nth-child(4) { left: 40%; animation-delay: 3s; }
.particle:nth-child(5) { left: 50%; animation-delay: 4s; }
.particle:nth-child(6) { left: 60%; animation-delay: 0.5s; }
.particle:nth-child(7) { left: 70%; animation-delay: 1.5s; }
.particle:nth-child(8) { left: 80%; animation-delay: 2.5s; }
.particle:nth-child(9) { left: 90%; animation-delay: 3.5s; }
.particle:nth-child(10) { left: 95%; animation-delay: 4.5s; }

@keyframes float {
    0% {
        transform: translateY(100vh) rotate(0deg);
        opacity: 0;
    }
    10% {
        opacity: 1;
    }
    90% {
        opacity: 1;
    }
    100% {
        transform: translateY(-100px) rotate(360deg);
        opacity: 0;
    }
}

.hero-content {
    color: white;
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 8px 16px;
    border-radius: 25px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 2rem;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 1.5rem;
}

.hero-title .highlight {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
}

.hero-description {
    font-size: 1.1rem;
    line-height: 1.7;
    margin-bottom: 2rem;
    opacity: 0.9;
}

.hero-stats {
    display: flex;
    gap: 2rem;
    margin-bottom: 2.5rem;
}

.stat-item {
    text-align: center;
}

.stat-number {
    display: block;
    font-size: 2.5rem;
    font-weight: 800;
    color: #ffffff;
}

.stat-plus {
    font-size: 1.5rem;
    font-weight: bold;
    color: #fbbf24;
}

.stat-label {
    display: block;
    font-size: 0.9rem;
    opacity: 0.8;
    margin-top: 0.5rem;
}

.hero-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.btn-primary {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    color: #7c1415;
    border: none;
    padding: 12px 24px;
    border-radius: 10px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    color: #7c1415;
}

.btn-outline {
    background: transparent;
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.3);
    padding: 12px 24px;
    border-radius: 10px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    text-decoration: none;
}

.btn-outline:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.5);
    color: white;
    transform: translateY(-2px);
}

.hero-visual {
    position: relative;
}

.visual-card {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.hero-image {
    width: 100%;
    height: 400px;
    object-fit: cover;
}

.visual-badge {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(220, 38, 38, 0.9);
    color: white;
    padding: 8px 16px;
    border-radius: 25px;
    font-size: 14px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
}

.floating-elements {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
}

.float-item {
    position: absolute;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    padding: 12px 16px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    font-weight: 600;
    color: #374151;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    animation: floatUp 6s ease-in-out infinite;
}

.float-item.item-1 {
    top: 20%;
    left: -10%;
    animation-delay: 0s;
}

.float-item.item-2 {
    bottom: 30%;
    left: -15%;
    animation-delay: 2s;
}

.float-item.item-3 {
    top: 60%;
    right: -10%;
    animation-delay: 4s;
}

@keyframes floatUp {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

/* Section Styles */
.section-header {
    margin-bottom: 4rem;
}

.section-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, #7c1415, #dc2626);
    color: white;
    padding: 8px 16px;
    border-radius: 25px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 1rem;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 1rem;
}

.section-description {
    font-size: 1.1rem;
    color: #6b7280;
    max-width: 600px;
    margin: 0 auto;
}

/* Category Cards */
.category-card {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    text-align: center;
    transition: all 0.3s ease;
    border: 1px solid #e5e7eb;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.category-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(124, 20, 21, 0.15);
    border-color: #7c1415;
}

.category-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #7c1415, #dc2626);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    color: white;
    font-size: 2rem;
}

.category-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 1rem;
}

.category-description {
    color: #6b7280;
    margin-bottom: 1rem;
    flex-grow: 1;
}

.category-stats {
    margin-bottom: 1.5rem;
}

.product-count {
    background: #f3f4f6;
    color: #374151;
    padding: 4px 12px;
    border-radius: 15px;
    font-size: 14px;
    font-weight: 600;
}

.category-link {
    color: #7c1415;
    text-decoration: none;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.category-link:hover {
    color: #dc2626;
    gap: 12px;
}

/* Product Cards */
.product-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 1px solid #e5e7eb;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.product-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(124, 20, 21, 0.15);
}

.product-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.product-card:hover .product-image img {
    transform: scale(1.1);
}

.product-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(124, 20, 21, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.product-card:hover .product-overlay {
    opacity: 1;
}

.btn-white {
    background: white;
    color: #7c1415;
    border: none;
    padding: 8px 16px;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.btn-white:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.product-content {
    padding: 1.5rem;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.product-category {
    background: #fef3c7;
    color: #d97706;
    padding: 4px 12px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
    display: inline-block;
    margin-bottom: 1rem;
}

.product-title {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.product-title a {
    color: #1f2937;
    text-decoration: none;
    transition: color 0.3s ease;
}

.product-title a:hover {
    color: #7c1415;
}

.product-description {
    color: #6b7280;
    font-size: 14px;
    margin-bottom: 1rem;
    flex-grow: 1;
}

.product-price {
    margin-top: auto;
}

.price {
    font-size: 1.25rem;
    font-weight: 700;
    color: #7c1415;
}

/* Gallery Cards */
.gallery-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 1px solid #e5e7eb;
}

.gallery-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(124, 20, 21, 0.15);
}

.gallery-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.gallery-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.gallery-card:hover .gallery-image img {
    transform: scale(1.1);
}

.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(124, 20, 21, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.gallery-card:hover .gallery-overlay {
    opacity: 1;
}

.gallery-link {
    color: white;
    font-size: 1.5rem;
    text-decoration: none;
    transition: transform 0.3s ease;
}

.gallery-link:hover {
    transform: scale(1.2);
    color: white;
}

.gallery-content {
    padding: 1.5rem;
}

.gallery-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

.gallery-description {
    color: #6b7280;
    font-size: 14px;
    margin-bottom: 1rem;
}

.gallery-meta {
    display: flex;
    justify-content: space-between;
    font-size: 12px;
    color: #9ca3af;
}

/* Article Cards */
.article-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 1px solid #e5e7eb;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.article-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(124, 20, 21, 0.15);
}

.article-image {
    height: 200px;
    overflow: hidden;
}

.article-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.article-card:hover .article-image img {
    transform: scale(1.1);
}

.article-content {
    padding: 1.5rem;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.article-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
    font-size: 12px;
}

.article-category {
    background: #dbeafe;
    color: #1d4ed8;
    padding: 4px 12px;
    border-radius: 15px;
    font-weight: 600;
}

.article-date {
    color: #9ca3af;
}

.article-title {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.article-title a {
    color: #1f2937;
    text-decoration: none;
    transition: color 0.3s ease;
}

.article-title a:hover {
    color: #7c1415;
}

.article-excerpt {
    color: #6b7280;
    font-size: 14px;
    margin-bottom: 1rem;
    flex-grow: 1;
}

.article-link {
    color: #7c1415;
    text-decoration: none;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    margin-top: auto;
}

.article-link:hover {
    color: #dc2626;
    gap: 12px;
}

/* CTA Section */
.cta-section {
    background: linear-gradient(135deg, #7c1415 0%, #dc2626 100%);
    color: white;
}

.cta-content {
    max-width: 600px;
    margin: 0 auto;
}

.cta-icon {
    width: 100px;
    height: 100px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    margin: 0 auto 2rem;
}

.cta-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.cta-description {
    font-size: 1.1rem;
    opacity: 0.9;
    margin-bottom: 2rem;
}

.cta-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-outline-primary {
    background: transparent;
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.3);
    padding: 12px 24px;
    border-radius: 10px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    text-decoration: none;
}

.btn-outline-primary:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.5);
    color: white;
    transform: translateY(-2px);
}

/* No Image Placeholder */
.no-image {
    width: 100%;
    height: 100%;
    background: #f3f4f6;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #9ca3af;
}

.no-image i {
    font-size: 2rem;
    margin-bottom: 0.5rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-stats {
        gap: 1rem;
    }
    
    .stat-number {
        font-size: 1.8rem;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .cta-title {
        font-size: 2rem;
    }
    
    .cta-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .hero-actions {
        flex-direction: column;
    }
    
    .float-item {
        display: none;
    }
}

@media (max-width: 480px) {
    .hero-title {
        font-size: 2rem;
    }
    
    .section-title {
        font-size: 1.75rem;
    }
    
    .hero-stats {
        flex-direction: column;
        gap: 1rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Counter Animation
    const counters = document.querySelectorAll('.stat-number');
    
    const animateCounters = () => {
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-count'));
            const increment = target / 200;
            let current = 0;
            
            const updateCounter = () => {
                if (current < target) {
                    current += increment;
                    counter.textContent = Math.ceil(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target;
                }
            };
            
            updateCounter();
        });
    };
    
    // Trigger counter animation when hero section is visible
    const heroSection = document.querySelector('.hero-section');
    if (heroSection) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.unobserve(entry.target);
                }
            });
        });
        
        observer.observe(heroSection);
    }
    
    // Smooth scrolling for anchor links
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
});
</script>
@endsection
