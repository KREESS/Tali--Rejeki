@extends('components.layout')

@section('title', $title)

@section('content')
<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <div class="header-content" data-aos="fade-up">
                    <h1 class="page-title">Katalog Digital</h1>
                    <p class="page-description">
                        Jelajahi koleksi lengkap produk insulasi industri kami dalam format digital yang mudah diakses
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Search and Filter Section -->
<section class="search-filter-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="search-box" data-aos="fade-up">
                    <form action="{{ route('catalog') }}" method="GET" class="search-form">
                        <div class="search-input-group">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" 
                                   name="search" 
                                   class="form-control search-input" 
                                   placeholder="Cari katalog berdasarkan nama, kategori, atau deskripsi..."
                                   value="{{ request('search') }}">
                        </div>
                        
                        <div class="filter-row">
                            <select name="category" class="form-select filter-select">
                                <option value="">Semua Kategori</option>
                                <option value="thermal-insulation" {{ request('category') == 'thermal-insulation' ? 'selected' : '' }}>
                                    Insulasi Thermal
                                </option>
                                <option value="acoustic-insulation" {{ request('category') == 'acoustic-insulation' ? 'selected' : '' }}>
                                    Insulasi Akustik
                                </option>
                                <option value="fire-protection" {{ request('category') == 'fire-protection' ? 'selected' : '' }}>
                                    Proteksi Kebakaran
                                </option>
                                <option value="industrial-coating" {{ request('category') == 'industrial-coating' ? 'selected' : '' }}>
                                    Coating Industri
                                </option>
                            </select>
                            
                            <select name="type" class="form-select filter-select">
                                <option value="">Semua Tipe</option>
                                <option value="brochure" {{ request('type') == 'brochure' ? 'selected' : '' }}>Brosur</option>
                                <option value="specification" {{ request('type') == 'specification' ? 'selected' : '' }}>Spesifikasi</option>
                                <option value="manual" {{ request('type') == 'manual' ? 'selected' : '' }}>Manual</option>
                                <option value="certificate" {{ request('type') == 'certificate' ? 'selected' : '' }}>Sertifikat</option>
                            </select>
                            
                            <button type="submit" class="btn btn-primary search-btn">
                                <i class="fas fa-search"></i>
                                Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Catalog Grid Section -->
<section class="catalog-section py-5">
    <div class="container">
        @if($catalogItems->count() > 0)
        <!-- View Toggle -->
        <div class="view-controls mb-4" data-aos="fade-up">
            <div class="d-flex justify-content-between align-items-center">
                <div class="results-info">
                    <span class="text-muted">
                        Menampilkan {{ $catalogItems->firstItem() }}-{{ $catalogItems->lastItem() }} 
                        dari {{ $catalogItems->total() }} katalog
                    </span>
                </div>
                
                <div class="view-toggle">
                    <button class="view-btn active" data-view="grid">
                        <i class="fas fa-th"></i>
                    </button>
                    <button class="view-btn" data-view="list">
                        <i class="fas fa-list"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Catalog Grid -->
        <div class="catalog-grid" id="catalog-grid">
            @foreach($catalogItems as $index => $item)
            <div class="catalog-item" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="catalog-card">
                    <div class="catalog-header">
                        <div class="catalog-type">
                            <i class="fas fa-file-pdf"></i>
                            <span>{{ ucfirst($item->type ?? 'PDF') }}</span>
                        </div>
                        
                        <div class="catalog-size">
                            {{ $item->file_size ?? '2.5 MB' }}
                        </div>
                    </div>
                    
                    <div class="catalog-preview">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" 
                                 alt="{{ $item->title }}" 
                                 class="catalog-thumbnail">
                        @else
                            <div class="catalog-placeholder">
                                <i class="fas fa-file-pdf"></i>
                                <span>PDF</span>
                            </div>
                        @endif
                        
                        <div class="catalog-overlay">
                            <div class="overlay-actions">
                                <a href="{{ asset('storage/' . $item->file_path) }}" 
                                   class="btn btn-sm btn-outline-light me-2" 
                                   target="_blank">
                                    <i class="fas fa-eye"></i>
                                    Preview
                                </a>
                                <a href="{{ asset('storage/' . $item->file_path) }}" 
                                   class="btn btn-sm btn-light" 
                                   download>
                                    <i class="fas fa-download"></i>
                                    Download
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="catalog-content">
                        <div class="catalog-category">
                            {{ ucfirst(str_replace('-', ' ', $item->category ?? 'General')) }}
                        </div>
                        
                        <h3 class="catalog-title">{{ $item->title }}</h3>
                        
                        <p class="catalog-description">
                            {{ Str::limit($item->description, 120) }}
                        </p>
                        
                        <div class="catalog-meta">
                            <span class="catalog-date">
                                <i class="fas fa-calendar"></i>
                                {{ $item->created_at->format('d M Y') }}
                            </span>
                            
                            <span class="catalog-downloads">
                                <i class="fas fa-download"></i>
                                {{ $item->download_count ?? 0 }} unduhan
                            </span>
                        </div>
                        
                        <div class="catalog-actions">
                            <a href="{{ asset('storage/' . $item->file_path) }}" 
                               class="btn btn-primary btn-download" 
                               download>
                                <i class="fas fa-download"></i>
                                Download Katalog
                            </a>
                            
                            <a href="{{ asset('storage/' . $item->file_path) }}" 
                               class="btn btn-outline-primary btn-preview" 
                               target="_blank">
                                <i class="fas fa-eye"></i>
                                Lihat Preview
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="pagination-wrapper text-center mt-5" data-aos="fade-up">
            {{ $catalogItems->links('pagination::bootstrap-4') }}
        </div>
        
        @else
        <!-- No Catalog Items -->
        <div class="no-catalog text-center" data-aos="fade-up">
            <div class="no-catalog-icon">
                <i class="fas fa-folder-open"></i>
            </div>
            <h3>Katalog Tidak Ditemukan</h3>
            <p>
                @if(request('search') || request('category') || request('type'))
                    Tidak ada katalog yang sesuai dengan kriteria pencarian Anda. 
                    Silakan coba dengan kata kunci atau filter yang berbeda.
                @else
                    Katalog digital sedang dalam tahap pengembangan. 
                    Silakan cek kembali untuk mendapatkan katalog terbaru.
                @endif
            </p>
            
            @if(request('search') || request('category') || request('type'))
            <a href="{{ route('catalog') }}" class="btn btn-primary">
                <i class="fas fa-refresh"></i>
                Lihat Semua Katalog
            </a>
            @else
            <a href="{{ route('contact') }}" class="btn btn-primary">
                <i class="fas fa-phone"></i>
                Hubungi Kami
            </a>
            @endif
        </div>
        @endif
    </div>
</section>

<!-- Popular Downloads Section -->
<section class="popular-downloads py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Katalog Populer</h2>
            <p class="section-description">
                Katalog yang paling sering diunduh oleh pelanggan kami
            </p>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="popular-item">
                    <div class="popular-icon">
                        <i class="fas fa-fire"></i>
                    </div>
                    <h4>Insulasi Thermal</h4>
                    <p>Katalog lengkap produk insulasi thermal untuk berbagai aplikasi industri</p>
                    <div class="popular-stats">
                        <span><i class="fas fa-download"></i> 1,234 unduhan</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="popular-item">
                    <div class="popular-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Proteksi Kebakaran</h4>
                    <p>Solusi lengkap sistem proteksi kebakaran untuk keamanan maksimal</p>
                    <div class="popular-stats">
                        <span><i class="fas fa-download"></i> 987 unduhan</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="popular-item">
                    <div class="popular-icon">
                        <i class="fas fa-volume-mute"></i>
                    </div>
                    <h4>Insulasi Akustik</h4>
                    <p>Produk insulasi akustik untuk mengurangi polusi suara industri</p>
                    <div class="popular-stats">
                        <span><i class="fas fa-download"></i> 765 unduhan</span>
                    </div>
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
                <i class="fas fa-headset"></i>
            </div>
            <h2 class="cta-title">Butuh Bantuan Memilih Produk?</h2>
            <p class="cta-description">
                Tim ahli kami siap membantu Anda memilih produk yang tepat sesuai kebutuhan proyek Anda. 
                Konsultasi gratis dan dapatkan rekomendasi terbaik.
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

/* Search and Filter Section */
.search-filter-section {
    background: #f8f9fa;
}

.search-box {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.search-input-group {
    position: relative;
    margin-bottom: 1.5rem;
}

.search-icon {
    position: absolute;
    left: 20px;
    top: 50%;
    transform: translateY(-50%);
    color: #6b7280;
    z-index: 2;
}

.search-input {
    padding: 15px 20px 15px 50px;
    border: 2px solid #e5e7eb;
    border-radius: 10px;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

.search-input:focus {
    border-color: #7c1415;
    box-shadow: 0 0 0 0.2rem rgba(124, 20, 21, 0.25);
}

.filter-row {
    display: grid;
    grid-template-columns: 1fr 1fr auto;
    gap: 1rem;
    align-items: center;
}

.filter-select {
    padding: 12px 16px;
    border: 2px solid #e5e7eb;
    border-radius: 10px;
    background: white;
    transition: border-color 0.3s ease;
}

.filter-select:focus {
    border-color: #7c1415;
    box-shadow: 0 0 0 0.2rem rgba(124, 20, 21, 0.25);
}

.search-btn {
    background: linear-gradient(135deg, #7c1415, #dc2626);
    border: none;
    padding: 12px 24px;
    border-radius: 10px;
    color: white;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    white-space: nowrap;
}

.search-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(124, 20, 21, 0.3);
}

/* View Controls */
.view-controls {
    background: white;
    padding: 1rem 1.5rem;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

.results-info {
    font-weight: 500;
}

.view-toggle {
    display: flex;
    gap: 0.5rem;
}

.view-btn {
    background: #f3f4f6;
    border: none;
    padding: 8px 12px;
    border-radius: 8px;
    color: #6b7280;
    transition: all 0.3s ease;
    cursor: pointer;
}

.view-btn.active,
.view-btn:hover {
    background: #7c1415;
    color: white;
}

/* Catalog Grid */
.catalog-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.catalog-grid.list-view {
    grid-template-columns: 1fr;
}

.catalog-grid.list-view .catalog-card {
    display: flex;
    align-items: center;
    padding: 1.5rem;
}

.catalog-grid.list-view .catalog-preview {
    width: 120px;
    height: 80px;
    margin-right: 1.5rem;
    flex-shrink: 0;
}

.catalog-grid.list-view .catalog-content {
    flex: 1;
}

.catalog-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 1px solid #e5e7eb;
    height: 100%;
}

.catalog-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(124, 20, 21, 0.15);
}

.catalog-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem;
    background: #f8f9fa;
    border-bottom: 1px solid #e5e7eb;
}

.catalog-type {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #dc2626;
    font-weight: 600;
    font-size: 14px;
}

.catalog-size {
    background: #e5e7eb;
    color: #6b7280;
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
}

.catalog-preview {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.catalog-thumbnail {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.catalog-card:hover .catalog-thumbnail {
    transform: scale(1.05);
}

.catalog-placeholder {
    width: 100%;
    height: 100%;
    background: #f3f4f6;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #9ca3af;
}

.catalog-placeholder i {
    font-size: 3rem;
    margin-bottom: 0.5rem;
}

.catalog-overlay {
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

.catalog-card:hover .catalog-overlay {
    opacity: 1;
}

.overlay-actions {
    display: flex;
    gap: 0.5rem;
}

.catalog-content {
    padding: 1.5rem;
}

.catalog-category {
    background: linear-gradient(135deg, #7c1415, #dc2626);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
    display: inline-block;
    margin-bottom: 1rem;
}

.catalog-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.75rem;
    line-height: 1.4;
}

.catalog-description {
    color: #6b7280;
    margin-bottom: 1rem;
    line-height: 1.6;
}

.catalog-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
    font-size: 14px;
    color: #9ca3af;
}

.catalog-meta span {
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.catalog-actions {
    display: flex;
    gap: 0.75rem;
}

.btn-download,
.btn-preview {
    flex: 1;
    padding: 10px 16px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-download {
    background: linear-gradient(135deg, #7c1415, #dc2626);
    color: white;
    border: none;
}

.btn-download:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(124, 20, 21, 0.3);
    color: white;
}

.btn-preview {
    background: transparent;
    color: #7c1415;
    border: 2px solid #7c1415;
}

.btn-preview:hover {
    background: #7c1415;
    color: white;
}

/* No Catalog */
.no-catalog {
    padding: 4rem 2rem;
}

.no-catalog-icon {
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

.no-catalog h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: #374151;
    margin-bottom: 1rem;
}

.no-catalog p {
    color: #6b7280;
    margin-bottom: 2rem;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
}

/* Popular Downloads */
.popular-downloads {
    background: #f8f9fa;
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

.popular-item {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    text-align: center;
    transition: all 0.3s ease;
    border: 1px solid #e5e7eb;
    height: 100%;
}

.popular-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
}

.popular-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #7c1415, #dc2626);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: white;
    margin: 0 auto 1.5rem;
}

.popular-item h4 {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 1rem;
}

.popular-item p {
    color: #6b7280;
    margin-bottom: 1rem;
    line-height: 1.6;
}

.popular-stats {
    color: #9ca3af;
    font-size: 14px;
    font-weight: 600;
}

.popular-stats i {
    color: #7c1415;
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
    
    .filter-row {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .catalog-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .catalog-actions {
        flex-direction: column;
    }
    
    .view-controls {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }
    
    .cta-title {
        font-size: 2rem;
    }
    
    .cta-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .catalog-meta {
        flex-direction: column;
        gap: 0.5rem;
        align-items: flex-start;
    }
}

@media (max-width: 480px) {
    .page-title {
        font-size: 2rem;
    }
    
    .search-box {
        padding: 1.5rem;
    }
    
    .catalog-content {
        padding: 1rem;
    }
    
    .catalog-preview {
        height: 150px;
    }
    
    .popular-item {
        padding: 1.5rem;
    }
    
    .popular-icon {
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // View toggle functionality
    const viewBtns = document.querySelectorAll('.view-btn');
    const catalogGrid = document.getElementById('catalog-grid');
    
    viewBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const view = this.getAttribute('data-view');
            
            // Update active button
            viewBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Update grid view
            if (view === 'list') {
                catalogGrid.classList.add('list-view');
            } else {
                catalogGrid.classList.remove('list-view');
            }
        });
    });
    
    // Download tracking (optional - could be implemented with AJAX)
    const downloadBtns = document.querySelectorAll('.btn-download');
    
    downloadBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Optional: Track download analytics
            console.log('Catalog downloaded:', this.href);
        });
    });
    
    // Search form enhancement
    const searchForm = document.querySelector('.search-form');
    const searchInput = document.querySelector('.search-input');
    
    if (searchInput) {
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchForm.submit();
            }
        });
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
    
    // Auto-hide alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(() => {
                alert.remove();
            }, 500);
        }, 5000);
    });
});
</script>
@endsection
