@extends('components.layout')

@section('title', $title)

@section('content')
<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <div class="header-content" data-aos="fade-up">
                    <h1 class="page-title">Galeri Proyek</h1>
                    <p class="page-description">
                        Lihat portofolio proyek insulasi industri yang telah kami kerjakan dengan standar kualitas terbaik
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="gallery-section py-5">
    <div class="container">
        <!-- Filter Tabs -->
        <div class="gallery-filters text-center mb-5" data-aos="fade-up">
            <button class="filter-btn active" data-filter="all">
                <i class="fas fa-th"></i>
                Semua Proyek
            </button>
            <button class="filter-btn" data-filter="oil-gas">
                <i class="fas fa-oil-can"></i>
                Oil & Gas
            </button>
            <button class="filter-btn" data-filter="manufacturing">
                <i class="fas fa-industry"></i>
                Manufacturing
            </button>
            <button class="filter-btn" data-filter="construction">
                <i class="fas fa-building"></i>
                Construction
            </button>
            <button class="filter-btn" data-filter="power-plant">
                <i class="fas fa-bolt"></i>
                Power Plant
            </button>
        </div>
        
        @if($galleries->count() > 0)
        <!-- Gallery Grid -->
        <div class="gallery-grid" id="gallery-grid">
            @foreach($galleries as $index => $gallery)
            <div class="gallery-item" 
                 data-category="{{ $gallery->category ?? 'general' }}" 
                 data-aos="fade-up" 
                 data-aos-delay="{{ $index * 100 }}">
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
                            <div class="overlay-content">
                                <h3 class="gallery-title">{{ $gallery->title }}</h3>
                                <p class="gallery-description">{{ Str::limit($gallery->description, 100) }}</p>
                                <div class="gallery-meta">
                                    <span class="gallery-date">
                                        <i class="fas fa-calendar"></i>
                                        {{ $gallery->created_at->format('d M Y') }}
                                    </span>
                                    <span class="gallery-images">
                                        <i class="fas fa-images"></i>
                                        {{ $gallery->images->count() }} foto
                                    </span>
                                </div>
                                <a href="{{ route('gallery.detail', $gallery->slug) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye"></i>
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                        
                        <div class="gallery-category">
                            {{ ucfirst(str_replace('-', ' ', $gallery->category ?? 'General')) }}
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
        <!-- No Gallery Items -->
        <div class="no-gallery text-center" data-aos="fade-up">
            <div class="no-gallery-icon">
                <i class="fas fa-images"></i>
            </div>
            <h3>Belum Ada Galeri Tersedia</h3>
            <p>Galeri proyek sedang dalam tahap pengembangan. Silakan cek kembali untuk melihat portofolio terbaru kami.</p>
            <a href="{{ route('contact') }}" class="btn btn-primary">
                <i class="fas fa-phone"></i>
                Hubungi Kami
            </a>
        </div>
        @endif
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                    <div class="stat-number" data-count="500">0</div>
                    <div class="stat-label">Proyek Selesai</div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <div class="stat-number" data-count="200">0</div>
                    <div class="stat-label">Klien Puas</div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="stat-number" data-count="50">0</div>
                    <div class="stat-label">Kota Terjangkau</div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <div class="stat-number" data-count="12">0</div>
                    <div class="stat-label">Tahun Pengalaman</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section py-5">
    <div class="container">
        <div class="cta-content text-center" data-aos="fade-up">
            <div class="cta-icon">
                <i class="fas fa-tools"></i>
            </div>
            <h2 class="cta-title">Tertarik dengan Layanan Kami?</h2>
            <p class="cta-description">
                Konsultasikan proyek insulasi Anda dengan tim ahli kami. 
                Dapatkan solusi terbaik sesuai kebutuhan industri Anda.
            </p>
            <div class="cta-actions">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-lg me-3">
                    <i class="fas fa-phone"></i>
                    Konsultasi Gratis
                </a>
                <a href="{{ route('products') }}" class="btn btn-outline-primary btn-lg">
                    <i class="fas fa-cubes"></i>
                    Lihat Produk
                </a>
            </div>
        </div>
    </div>
</section>

<style>
/* Page Header */
.page-header {
    background: linear-gradient(135deg, #7c1415 0%, #b71c1c 50%, #dc2626 100%);
    color: white;
    padding: 120px 0 80px;
    position: relative;
    overflow: hidden;
}

.page-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.3);
    z-index: 1;
}

.header-content {
    position: relative;
    z-index: 2;
}

.page-title {
    font-size: 3rem;
    font-weight: 800;
    margin-bottom: 1rem;
}

.page-description {
    font-size: 1.2rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
}

/* Gallery Filters */
.gallery-filters {
    display: flex;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
    margin-bottom: 3rem;
}

.filter-btn {
    background: white;
    border: 2px solid #e5e7eb;
    color: #6b7280;
    padding: 12px 24px;
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s ease;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
}

.filter-btn:hover,
.filter-btn.active {
    background: linear-gradient(135deg, #7c1415, #dc2626);
    border-color: #7c1415;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(124, 20, 21, 0.3);
}

/* Gallery Grid */
.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.gallery-item {
    transition: all 0.3s ease;
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
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(124, 20, 21, 0.15);
}

.gallery-image {
    position: relative;
    height: 300px;
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
    background: linear-gradient(to bottom, rgba(0,0,0,0.1) 0%, rgba(124, 20, 21, 0.8) 70%);
    display: flex;
    align-items: flex-end;
    padding: 2rem;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.gallery-card:hover .gallery-overlay {
    opacity: 1;
}

.overlay-content {
    color: white;
    width: 100%;
}

.gallery-title {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    line-height: 1.3;
}

.gallery-description {
    margin-bottom: 1rem;
    opacity: 0.9;
    line-height: 1.5;
}

.gallery-meta {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
    font-size: 14px;
    opacity: 0.8;
}

.gallery-meta span {
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.gallery-category {
    position: absolute;
    top: 15px;
    left: 15px;
    background: rgba(124, 20, 21, 0.9);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    backdrop-filter: blur(10px);
}

/* No Gallery */
.no-gallery {
    padding: 4rem 2rem;
}

.no-gallery-icon {
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

.no-gallery h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: #374151;
    margin-bottom: 1rem;
}

.no-gallery p {
    color: #6b7280;
    margin-bottom: 2rem;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
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
    font-size: 3rem;
    margin-bottom: 0.5rem;
}

/* Stats Section */
.stats-section {
    background: #f8f9fa;
}

.stat-item {
    text-align: center;
    padding: 2rem 1rem;
}

.stat-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #7c1415, #dc2626);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: white;
    margin: 0 auto 1rem;
}

.stat-number {
    display: block;
    font-size: 3rem;
    font-weight: 800;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

.stat-label {
    font-size: 1.1rem;
    font-weight: 600;
    color: #6b7280;
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

.btn-primary {
    background: white;
    color: #7c1415;
    border: none;
    padding: 12px 24px;
    border-radius: 10px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    text-decoration: none;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    color: #7c1415;
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

/* Pagination */
.pagination-wrapper {
    margin-top: 3rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    .page-title {
        font-size: 2.5rem;
    }
    
    .gallery-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .gallery-filters {
        flex-direction: column;
        align-items: center;
    }
    
    .cta-title {
        font-size: 2rem;
    }
    
    .cta-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .gallery-overlay {
        padding: 1.5rem;
    }
    
    .overlay-content {
        text-align: center;
    }
    
    .gallery-meta {
        justify-content: center;
    }
    
    .stat-number {
        font-size: 2.5rem;
    }
}

@media (max-width: 480px) {
    .page-title {
        font-size: 2rem;
    }
    
    .gallery-image {
        height: 250px;
    }
    
    .gallery-title {
        font-size: 1.25rem;
    }
    
    .filter-btn {
        padding: 10px 16px;
        font-size: 14px;
    }
    
    .gallery-overlay {
        padding: 1rem;
    }
}

/* Filter Animation */
.gallery-item {
    opacity: 1;
    transform: scale(1);
    transition: all 0.5s ease;
}

.gallery-item.hide {
    opacity: 0;
    transform: scale(0.8);
    pointer-events: none;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Filter gallery items
            galleryItems.forEach(item => {
                const category = item.getAttribute('data-category');
                
                if (filter === 'all' || category === filter) {
                    item.classList.remove('hide');
                } else {
                    item.classList.add('hide');
                }
            });
        });
    });
    
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
    
    // Trigger counter animation when stats section is visible
    const statsSection = document.querySelector('.stats-section');
    if (statsSection) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.5
        });
        
        observer.observe(statsSection);
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
