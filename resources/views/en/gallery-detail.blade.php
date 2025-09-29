@extends('en.components.layout')

@section('title', $gallery->title)

@section('content')
<!-- Gallery Header -->
<section class="gallery-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="header-content" data-aos="fade-up">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('gallery') }}">Galeri</a></li>
                            <li class="breadcrumb-item active">{{ Str::limit($gallery->title, 30) }}</li>
                        </ol>
                    </nav>
                    
                    <div class="gallery-category">
                        <i class="fas fa-tag"></i>
                        {{ ucfirst(str_replace('-', ' ', $gallery->category ?? 'General')) }}
                    </div>
                    
                    <h1 class="gallery-title">{{ $gallery->title }}</h1>
                    
                    <div class="gallery-meta">
                        <div class="meta-item">
                            <i class="fas fa-calendar"></i>
                            {{ $gallery->created_at->format('d F Y') }}
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-images"></i>
                            {{ $gallery->images->count() }} foto
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $gallery->location ?? 'Indonesia' }}
                        </div>
                    </div>
                    
                    @if($gallery->description)
                    <p class="gallery-description">{{ $gallery->description }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Images -->
<section class="gallery-images py-5">
    <div class="container">
        @if($gallery->images->count() > 0)
        <!-- Main Image -->
        <div class="main-image-container mb-5" data-aos="fade-up">
            <div class="main-image" id="main-image">
                <img src="{{ asset('storage/' . $gallery->images->first()->image_path) }}" 
                     alt="{{ $gallery->title }}" 
                     class="img-fluid main-img"
                     id="main-img">
                
                <div class="image-overlay">
                    <div class="image-controls">
                        <button class="control-btn" id="zoom-btn">
                            <i class="fas fa-search-plus"></i>
                        </button>
                        <button class="control-btn" id="fullscreen-btn">
                            <i class="fas fa-expand"></i>
                        </button>
                        <button class="control-btn" id="download-btn">
                            <i class="fas fa-download"></i>
                        </button>
                    </div>
                </div>
                
                <div class="image-navigation">
                    <button class="nav-btn prev-btn" id="prev-btn">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="nav-btn next-btn" id="next-btn">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
                
                <div class="image-counter">
                    <span id="current-image">1</span> / <span id="total-images">{{ $gallery->images->count() }}</span>
                </div>
            </div>
        </div>
        
        <!-- Thumbnail Grid -->
        <div class="thumbnail-grid" data-aos="fade-up" data-aos-delay="200">
            <div class="row">
                @foreach($gallery->images as $index => $image)
                <div class="col-lg-2 col-md-3 col-4 mb-3">
                    <div class="thumbnail-item {{ $index === 0 ? 'active' : '' }}" 
                         data-index="{{ $index }}"
                         data-image="{{ asset('storage/' . $image->image_path) }}">
                        <img src="{{ asset('storage/' . $image->image_path) }}" 
                             alt="{{ $gallery->title }}"
                             class="img-fluid">
                        <div class="thumbnail-overlay">
                            <i class="fas fa-eye"></i>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        @else
        <!-- No Images -->
        <div class="no-images text-center" data-aos="fade-up">
            <div class="no-images-icon">
                <i class="fas fa-image"></i>
            </div>
            <h3>Belum Ada Foto</h3>
            <p>Galeri ini belum memiliki foto yang dapat ditampilkan.</p>
            <a href="{{ route('gallery') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Galeri
            </a>
        </div>
        @endif
    </div>
</section>

<!-- Project Details -->
@if($gallery->description || $gallery->client || $gallery->project_date)
<section class="project-details py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="details-card" data-aos="fade-up">
                    <h2 class="details-title">Detail Proyek</h2>
                    
                    <div class="details-content">
                        @if($gallery->description)
                        <div class="detail-item">
                            <h4>Deskripsi Proyek</h4>
                            <p>{{ $gallery->description }}</p>
                        </div>
                        @endif
                        
                        <div class="detail-grid">
                            @if($gallery->client)
                            <div class="detail-item">
                                <h5>Klien</h5>
                                <p>{{ $gallery->client }}</p>
                            </div>
                            @endif
                            
                            @if($gallery->project_date)
                            <div class="detail-item">
                                <h5>Tanggal Proyek</h5>
                                <p>{{ \Carbon\Carbon::parse($gallery->project_date)->format('F Y') }}</p>
                            </div>
                            @endif
                            
                            @if($gallery->location)
                            <div class="detail-item">
                                <h5>Lokasi</h5>
                                <p>{{ $gallery->location }}</p>
                            </div>
                            @endif
                            
                            <div class="detail-item">
                                <h5>Kategori</h5>
                                <p>{{ ucfirst(str_replace('-', ' ', $gallery->category ?? 'General')) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Share Section -->
<section class="share-section py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="share-content text-center" data-aos="fade-up">
                    <h5>Bagikan Galeri:</h5>
                    <div class="share-buttons">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" 
                           class="share-btn facebook" 
                           target="_blank">
                            <i class="fab fa-facebook-f"></i>
                            Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $gallery->title }}" 
                           class="share-btn twitter" 
                           target="_blank">
                            <i class="fab fa-twitter"></i>
                            Twitter
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ url()->current() }}" 
                           class="share-btn linkedin" 
                           target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                            LinkedIn
                        </a>
                        <a href="whatsapp://send?text={{ $gallery->title }} - {{ url()->current() }}" 
                           class="share-btn whatsapp">
                            <i class="fab fa-whatsapp"></i>
                            WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Galleries -->
<section class="related-galleries py-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Galeri Lainnya</h2>
            <p class="section-description">
                Lihat proyek-proyek lain yang telah kami kerjakan
            </p>
        </div>
        
        <div class="row">
            @php
                $relatedGalleries = \App\Models\Gallery::with('images')
                    ->where('category', $gallery->category)
                    ->where('id', '!=', $gallery->id)
                    ->where('is_active', true)
                    ->take(3)
                    ->get();
            @endphp
            
            @forelse($relatedGalleries as $index => $relatedGallery)
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="gallery-card">
                    <div class="gallery-image">
                        @if($relatedGallery->images->count() > 0)
                            <img src="{{ asset('storage/' . $relatedGallery->images->first()->image_path) }}" 
                                 alt="{{ $relatedGallery->title }}">
                        @else
                            <div class="no-image">
                                <i class="fas fa-image"></i>
                            </div>
                        @endif
                        
                        <div class="gallery-overlay">
                            <a href="{{ route('gallery.detail', $relatedGallery->slug) }}" class="btn btn-primary">
                                <i class="fas fa-eye"></i>
                                Lihat Galeri
                            </a>
                        </div>
                        
                        <div class="gallery-category">
                            {{ ucfirst(str_replace('-', ' ', $relatedGallery->category ?? 'General')) }}
                        </div>
                    </div>
                    
                    <div class="gallery-content">
                        <h4 class="gallery-title">
                            <a href="{{ route('gallery.detail', $relatedGallery->slug) }}">
                                {{ $relatedGallery->title }}
                            </a>
                        </h4>
                        
                        <p class="gallery-description">
                            {{ Str::limit($relatedGallery->description, 100) }}
                        </p>
                        
                        <div class="gallery-meta">
                            <span class="gallery-date">
                                <i class="fas fa-calendar"></i>
                                {{ $relatedGallery->created_at->format('d M Y') }}
                            </span>
                            <span class="gallery-images">
                                <i class="fas fa-images"></i>
                                {{ $relatedGallery->images->count() }} foto
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="text-center">
                    <p class="text-muted">Tidak ada galeri terkait lainnya.</p>
                    <a href="{{ route('gallery') }}" class="btn btn-primary">
                        <i class="fas fa-th"></i>
                        Lihat Semua Galeri
                    </a>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Lightbox Modal -->
<div class="lightbox-modal" id="lightbox-modal">
    <div class="lightbox-content">
        <button class="lightbox-close" id="lightbox-close">
            <i class="fas fa-times"></i>
        </button>
        
        <div class="lightbox-image">
            <img src="" alt="" id="lightbox-img">
        </div>
        
        <div class="lightbox-navigation">
            <button class="lightbox-nav prev" id="lightbox-prev">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="lightbox-nav next" id="lightbox-next">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        
        <div class="lightbox-counter">
            <span id="lightbox-current">1</span> / <span id="lightbox-total">{{ $gallery->images->count() }}</span>
        </div>
    </div>
</div>

<style>
/* Gallery Header */
.gallery-header {
    background: linear-gradient(135deg, #7c1415 0%, #dc2626 100%);
    color: white;
    padding: 120px 0 60px;
}

.breadcrumb {
    background: transparent;
    padding: 0;
    margin-bottom: 1rem;
}

.breadcrumb-item a {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
}

.breadcrumb-item.active {
    color: white;
}

.gallery-category {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 1.5rem;
}

.gallery-title {
    font-size: 2.5rem;
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: 1.5rem;
}

.gallery-meta {
    display: flex;
    gap: 2rem;
    margin-bottom: 1.5rem;
    flex-wrap: wrap;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 14px;
    opacity: 0.9;
}

.gallery-description {
    font-size: 1.1rem;
    opacity: 0.9;
    line-height: 1.6;
    max-width: 600px;
}

/* Main Image */
.main-image-container {
    position: relative;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.main-image {
    position: relative;
    background: #000;
    min-height: 500px;
}

.main-img {
    width: 100%;
    height: 500px;
    object-fit: cover;
    display: block;
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.3);
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.main-image:hover .image-overlay {
    opacity: 1;
}

.image-controls {
    display: flex;
    gap: 1rem;
}

.control-btn {
    background: rgba(255, 255, 255, 0.9);
    border: none;
    padding: 12px;
    border-radius: 50%;
    color: #374151;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.control-btn:hover {
    background: white;
    transform: scale(1.1);
}

.image-navigation {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    transform: translateY(-50%);
    display: flex;
    justify-content: space-between;
    padding: 0 2rem;
    pointer-events: none;
}

.nav-btn {
    background: rgba(255, 255, 255, 0.9);
    border: none;
    padding: 15px 12px;
    border-radius: 50%;
    color: #374151;
    font-size: 18px;
    cursor: pointer;
    transition: all 0.3s ease;
    pointer-events: auto;
}

.nav-btn:hover {
    background: white;
    transform: scale(1.1);
}

.nav-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.image-counter {
    position: absolute;
    bottom: 20px;
    right: 20px;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 600;
}

/* Thumbnail Grid */
.thumbnail-grid {
    margin-top: 2rem;
}

.thumbnail-item {
    position: relative;
    aspect-ratio: 1;
    overflow: hidden;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    border: 3px solid transparent;
}

.thumbnail-item.active {
    border-color: #7c1415;
    transform: scale(1.05);
}

.thumbnail-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.thumbnail-item:hover img {
    transform: scale(1.1);
}

.thumbnail-overlay {
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
    color: white;
    font-size: 1.5rem;
}

.thumbnail-item:hover .thumbnail-overlay {
    opacity: 1;
}

/* No Images */
.no-images {
    padding: 4rem 2rem;
}

.no-images-icon {
    width: 100px;
    height: 100px;
    background: #f3f4f6;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    color: #9ca3af;
    margin: 0 auto 2rem;
}

.no-images h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: #374151;
    margin-bottom: 1rem;
}

.no-images p {
    color: #6b7280;
    margin-bottom: 2rem;
}

/* Project Details */
.project-details {
    background: #f8f9fa;
}

.details-card {
    background: white;
    padding: 3rem;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.details-title {
    font-size: 2rem;
    font-weight: 700;
    color: #374151;
    margin-bottom: 2rem;
    text-align: center;
}

.detail-item {
    margin-bottom: 2rem;
}

.detail-item h4 {
    font-size: 1.25rem;
    font-weight: 700;
    color: #374151;
    margin-bottom: 1rem;
}

.detail-item h5 {
    font-size: 1rem;
    font-weight: 600;
    color: #7c1415;
    margin-bottom: 0.5rem;
}

.detail-item p {
    color: #6b7280;
    line-height: 1.6;
    margin-bottom: 0;
}

.detail-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
}

/* Share Section */
.share-section {
    background: #f8f9fa;
    border-top: 1px solid #e5e7eb;
}

.share-content h5 {
    color: #374151;
    font-weight: 600;
    margin-bottom: 1rem;
}

.share-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.share-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    color: white;
}

.share-btn.facebook {
    background: #3b5998;
}

.share-btn.twitter {
    background: #1da1f2;
}

.share-btn.linkedin {
    background: #0077b5;
}

.share-btn.whatsapp {
    background: #25d366;
}

.share-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    color: white;
}

/* Related Galleries */
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

.gallery-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 1px solid #e5e7eb;
    height: 100%;
}

.gallery-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
}

.gallery-image {
    position: relative;
    height: 250px;
    overflow: hidden;
}

.gallery-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.gallery-card:hover .gallery-image img {
    transform: scale(1.05);
}

.no-image {
    width: 100%;
    height: 100%;
    background: #f3f4f6;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #9ca3af;
    font-size: 2rem;
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

.gallery-image .gallery-category {
    position: absolute;
    top: 15px;
    left: 15px;
    background: rgba(124, 20, 21, 0.9);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}

.gallery-content {
    padding: 1.5rem;
}

.gallery-content .gallery-title {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.gallery-content .gallery-title a {
    color: #374151;
    text-decoration: none;
    line-height: 1.4;
}

.gallery-content .gallery-title a:hover {
    color: #7c1415;
}

.gallery-content .gallery-description {
    color: #6b7280;
    margin-bottom: 1rem;
    line-height: 1.6;
}

.gallery-content .gallery-meta {
    display: flex;
    justify-content: space-between;
    font-size: 14px;
    color: #9ca3af;
}

.gallery-content .gallery-meta span {
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

/* Lightbox */
.lightbox-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.9);
    z-index: 9999;
    display: none;
    align-items: center;
    justify-content: center;
}

.lightbox-modal.active {
    display: flex;
}

.lightbox-content {
    position: relative;
    max-width: 90vw;
    max-height: 90vh;
}

.lightbox-close {
    position: absolute;
    top: -50px;
    right: 0;
    background: rgba(255, 255, 255, 0.9);
    border: none;
    padding: 12px;
    border-radius: 50%;
    color: #374151;
    font-size: 18px;
    cursor: pointer;
    z-index: 10;
}

.lightbox-image img {
    max-width: 100%;
    max-height: 90vh;
    object-fit: contain;
}

.lightbox-navigation {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    transform: translateY(-50%);
    display: flex;
    justify-content: space-between;
    padding: 0 2rem;
}

.lightbox-nav {
    background: rgba(255, 255, 255, 0.9);
    border: none;
    padding: 15px 12px;
    border-radius: 50%;
    color: #374151;
    font-size: 18px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.lightbox-nav:hover {
    background: white;
    transform: scale(1.1);
}

.lightbox-counter {
    position: absolute;
    bottom: -50px;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(255, 255, 255, 0.9);
    color: #374151;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 600;
}

/* Responsive Design */
@media (max-width: 768px) {
    .gallery-title {
        font-size: 2rem;
    }
    
    .gallery-meta {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .main-img {
        height: 300px;
    }
    
    .details-card {
        padding: 2rem;
    }
    
    .detail-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .share-buttons {
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }
    
    .image-navigation {
        padding: 0 1rem;
    }
    
    .nav-btn {
        padding: 12px 10px;
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .gallery-title {
        font-size: 1.75rem;
    }
    
    .main-img {
        height: 250px;
    }
    
    .details-card {
        padding: 1.5rem;
    }
    
    .details-title {
        font-size: 1.5rem;
    }
    
    .thumbnail-grid .col-4 {
        flex: 0 0 33.333333%;
        max-width: 33.333333%;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gallery images data
    const images = [
        @foreach($gallery->images as $index => $image)
        {
            src: "{{ asset('storage/' . $image->image_path) }}",
            alt: "{{ $gallery->title }} - {{ $index + 1 }}"
        }{{ !$loop->last ? ',' : '' }}
        @endforeach
    ];
    
    let currentImageIndex = 0;
    
    // Elements
    const mainImg = document.getElementById('main-img');
    const currentImageSpan = document.getElementById('current-image');
    const totalImagesSpan = document.getElementById('total-images');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const thumbnails = document.querySelectorAll('.thumbnail-item');
    const zoomBtn = document.getElementById('zoom-btn');
    const fullscreenBtn = document.getElementById('fullscreen-btn');
    const downloadBtn = document.getElementById('download-btn');
    
    // Lightbox elements
    const lightboxModal = document.getElementById('lightbox-modal');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxClose = document.getElementById('lightbox-close');
    const lightboxPrev = document.getElementById('lightbox-prev');
    const lightboxNext = document.getElementById('lightbox-next');
    const lightboxCurrent = document.getElementById('lightbox-current');
    const lightboxTotal = document.getElementById('lightbox-total');
    
    // Update main image
    function updateMainImage(index) {
        currentImageIndex = index;
        mainImg.src = images[index].src;
        mainImg.alt = images[index].alt;
        currentImageSpan.textContent = index + 1;
        
        // Update thumbnail active state
        thumbnails.forEach((thumb, i) => {
            thumb.classList.toggle('active', i === index);
        });
        
        // Update navigation buttons
        prevBtn.disabled = index === 0;
        nextBtn.disabled = index === images.length - 1;
    }
    
    // Navigation event listeners
    if (prevBtn) {
        prevBtn.addEventListener('click', function() {
            if (currentImageIndex > 0) {
                updateMainImage(currentImageIndex - 1);
            }
        });
    }
    
    if (nextBtn) {
        nextBtn.addEventListener('click', function() {
            if (currentImageIndex < images.length - 1) {
                updateMainImage(currentImageIndex + 1);
            }
        });
    }
    
    // Thumbnail click handlers
    thumbnails.forEach((thumbnail, index) => {
        thumbnail.addEventListener('click', function() {
            updateMainImage(index);
        });
    });
    
    // Zoom functionality
    if (zoomBtn) {
        zoomBtn.addEventListener('click', function() {
            openLightbox(currentImageIndex);
        });
    }
    
    // Fullscreen functionality
    if (fullscreenBtn) {
        fullscreenBtn.addEventListener('click', function() {
            openLightbox(currentImageIndex);
        });
    }
    
    // Download functionality
    if (downloadBtn) {
        downloadBtn.addEventListener('click', function() {
            const link = document.createElement('a');
            link.href = images[currentImageIndex].src;
            link.download = `{{ $gallery->slug }}-${currentImageIndex + 1}.jpg`;
            link.click();
        });
    }
    
    // Lightbox functions
    function openLightbox(index) {
        currentImageIndex = index;
        lightboxImg.src = images[index].src;
        lightboxImg.alt = images[index].alt;
        lightboxCurrent.textContent = index + 1;
        lightboxModal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    
    function closeLightbox() {
        lightboxModal.classList.remove('active');
        document.body.style.overflow = '';
    }
    
    function updateLightboxImage(index) {
        currentImageIndex = index;
        lightboxImg.src = images[index].src;
        lightboxImg.alt = images[index].alt;
        lightboxCurrent.textContent = index + 1;
    }
    
    // Lightbox event listeners
    if (lightboxClose) {
        lightboxClose.addEventListener('click', closeLightbox);
    }
    
    if (lightboxModal) {
        lightboxModal.addEventListener('click', function(e) {
            if (e.target === lightboxModal) {
                closeLightbox();
            }
        });
    }
    
    if (lightboxPrev) {
        lightboxPrev.addEventListener('click', function() {
            if (currentImageIndex > 0) {
                updateLightboxImage(currentImageIndex - 1);
            }
        });
    }
    
    if (lightboxNext) {
        lightboxNext.addEventListener('click', function() {
            if (currentImageIndex < images.length - 1) {
                updateLightboxImage(currentImageIndex + 1);
            }
        });
    }
    
    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (lightboxModal.classList.contains('active')) {
            switch(e.key) {
                case 'Escape':
                    closeLightbox();
                    break;
                case 'ArrowLeft':
                    if (currentImageIndex > 0) {
                        updateLightboxImage(currentImageIndex - 1);
                    }
                    break;
                case 'ArrowRight':
                    if (currentImageIndex < images.length - 1) {
                        updateLightboxImage(currentImageIndex + 1);
                    }
                    break;
            }
        } else {
            switch(e.key) {
                case 'ArrowLeft':
                    if (currentImageIndex > 0) {
                        updateMainImage(currentImageIndex - 1);
                    }
                    break;
                case 'ArrowRight':
                    if (currentImageIndex < images.length - 1) {
                        updateMainImage(currentImageIndex + 1);
                    }
                    break;
            }
        }
    });
    
    // Initialize
    updateMainImage(0);
    
    // Set total images
    if (totalImagesSpan) {
        totalImagesSpan.textContent = images.length;
    }
    if (lightboxTotal) {
        lightboxTotal.textContent = images.length;
    }
});
</script>
@endsection
