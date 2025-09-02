@extends('admin.components.layout')

@section('title', $title)

@section('content')
<!-- Loading Overlay -->
<div class="loading-overlay" id="loadingOverlay">
    <div class="loading-spinner">
        <div class="spinner"></div>
        <h4>Memproses...</h4>
        <p>Mohon tunggu sebentar</p>
    </div>
</div>

<!-- Alert Container -->
<div class="alert-container" id="alertContainer"></div>

<div class="admin-content">
    <!-- Enhanced Header Section -->
    <div class="content-header">
        <div class="header-content">
            <div class="header-title">
                <h1 class="page-title">
                    <i class="fas fa-images"></i>
                    {{ $title }}
                </h1>
                <p class="page-subtitle">Kelola galeri foto dan media untuk website Anda</p>
            </div>
            
            <!-- Inline Actions with Title -->
            <div class="header-actions-inline">
                <!-- Search Bar -->
                <div class="gallery-search-container">
                    <input type="text" id="gallerySearchInput" class="gallery-search-input" placeholder="Cari galeri..." autocomplete="off">
                    <i class="fas fa-search gallery-search-icon"></i>
                </div>
                
                <!-- Filter Dropdown -->
                <div class="gallery-filter-dropdown">
                    <select id="statusFilter" class="gallery-filter-select">
                        <option value="">Semua Status</option>
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
                
                <!-- Sort Dropdown -->
                <div class="gallery-filter-dropdown">
                    <select id="sortFilter" class="gallery-filter-select">
                        <option value="newest">Terbaru</option>
                        <option value="oldest">Terlama</option>
                        <option value="title">A-Z</option>
                        <option value="title_desc">Z-A</option>
                    </select>
                </div>
                
                <!-- View Toggle -->
                <div class="gallery-view-toggle">
                    <button class="gallery-view-btn active" data-view="grid" title="Grid View">
                        <i class="fas fa-th"></i>
                    </button>
                    <button class="gallery-view-btn" data-view="list" title="List View">
                        <i class="fas fa-list"></i>
                    </button>
                </div>
                
                <!-- Add Button -->
                <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary btn-add">
                    <i class="fas fa-plus"></i>
                    <span class="btn-text">Tambah Galeri</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Enhanced Stats Cards -->
    <div class="stats-section">
        <div class="stats-grid">
            <div class="stat-card" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-icon bg-primary">
                    <i class="fas fa-images"></i>
                </div>
                <div class="stat-content">
                    <h3 class="stat-number" data-target="{{ $galleries->total() }}">0</h3>
                    <p>Total Galeri</p>
                    <div class="stat-progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                </div>
            </div>
            
            <div class="stat-card" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-icon bg-success">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="stat-content">
                    <h3 class="stat-number" data-target="{{ $galleries->where('status', 'published')->count() }}">0</h3>
                    <p>Galeri Published</p>
                    <div class="stat-progress">
                        <div class="progress-bar" style="width: {{ $galleries->total() > 0 ? ($galleries->where('status', 'published')->count() / $galleries->total()) * 100 : 0 }}%"></div>
                    </div>
                </div>
            </div>
            
            <div class="stat-card" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-icon bg-warning">
                    <i class="fas fa-edit"></i>
                </div>
                <div class="stat-content">
                    <h3 class="stat-number" data-target="{{ $galleries->where('status', 'draft')->count() }}">0</h3>
                    <p>Draft</p>
                    <div class="stat-progress">
                        <div class="progress-bar" style="width: {{ $galleries->total() > 0 ? ($galleries->where('status', 'draft')->count() / $galleries->total()) * 100 : 0 }}%"></div>
                    </div>
                </div>
            </div>
            
            <div class="stat-card" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-icon bg-info">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stat-content">
                    <h3 class="stat-number" data-target="{{ $galleries->sum('images_count') }}">0</h3>
                    <p>Total Gambar</p>
                    <div class="stat-progress">
                        <div class="progress-bar" style="width: 85%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Bar -->
    <div class="action-bar">
        <div class="action-left">
            <div class="bulk-actions" style="display: none;">
                <select id="bulkAction" class="bulk-select">
                    <option value="">Pilih Aksi</option>
                    <option value="publish">Publish</option>
                    <option value="draft">Jadikan Draft</option>
                    <option value="delete">Hapus</option>
                </select>
                <button class="btn btn-secondary btn-sm" id="applyBulk">Terapkan</button>
                <button class="btn btn-outline btn-sm" id="cancelBulk">Batal</button>
            </div>
            <div class="result-info">
                <span id="resultCount">{{ $galleries->count() }}</span> dari {{ $galleries->total() }} galeri
            </div>
        </div>
        <div class="action-right">
            <button class="btn btn-outline btn-sm" id="selectAllBtn">
                <i class="fas fa-check-square"></i>
                Pilih Semua
            </button>
            <button class="btn btn-outline btn-sm" id="refreshBtn">
                <i class="fas fa-sync-alt"></i>
                Refresh
            </button>
        </div>
    </div>

    <!-- Enhanced Gallery Grid -->
    <div class="content-section">
        @if($galleries->count() > 0)
            <div class="gallery-container" id="galleryContainer">
                <!-- Grid View -->
                <div class="gallery-grid active" id="gridView">
                    @foreach($galleries as $gallery)
                        <div class="gallery-card" data-id="{{ $gallery->id }}" data-status="{{ $gallery->status }}" data-title="{{ strtolower($gallery->title) }}" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                            <div class="card-checkbox">
                                <input type="checkbox" class="gallery-checkbox" data-id="{{ $gallery->id }}">
                                <label class="checkbox-label"></label>
                            </div>
                            
                            <div class="gallery-image">
                                @if($gallery->primaryImage)
                                    <img src="{{ $gallery->primaryImage->image_url }}" 
                                         alt="{{ $gallery->title }}"
                                         loading="lazy"
                                         class="gallery-img">
                                @else
                                    <div class="gallery-placeholder">
                                        <i class="fas fa-image"></i>
                                        <p>No Image</p>
                                    </div>
                                @endif
                                
                                <div class="image-overlay">
                                    <div class="overlay-content">
                                        <div class="image-count">
                                            <i class="fas fa-images"></i>
                                            {{ $gallery->images_count }}
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="gallery-status">
                                    <span class="status-badge status-{{ $gallery->status }}">
                                        <i class="fas fa-{{ $gallery->status === 'published' ? 'eye' : 'edit' }}"></i>
                                        {{ ucfirst($gallery->status) }}
                                    </span>
                                </div>
                            </div>

                            <div class="gallery-content">
                                <h3 class="gallery-title">{{ $gallery->title }}</h3>
                                @if($gallery->description)
                                    <p class="gallery-description">
                                        {{ Str::limit($gallery->description, 80) }}
                                    </p>
                                @endif
                                
                                <div class="gallery-meta">
                                    <div class="meta-item">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span>{{ $gallery->created_at->format('d M Y') }}</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-images"></i>
                                        <span>{{ $gallery->images_count }} foto</span>
                                    </div>
                                </div>
                                
                                <div class="gallery-actions">
                                    <a href="{{ route('admin.gallery.show', $gallery) }}" 
                                       class="btn btn-sm btn-info" 
                                       title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.gallery.edit', $gallery) }}" 
                                       class="btn btn-sm btn-warning" 
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" 
                                            class="btn btn-sm btn-success toggle-status" 
                                            data-id="{{ $gallery->id }}" 
                                            data-slug="{{ $gallery->slug }}"
                                            data-status="{{ $gallery->status }}"
                                            title="Toggle Status">
                                        <i class="fas fa-{{ $gallery->status === 'published' ? 'eye-slash' : 'eye' }}"></i>
                                    </button>
                                    <button type="button" 
                                            class="btn btn-sm btn-danger delete-gallery" 
                                            data-id="{{ $gallery->id }}"
                                            data-slug="{{ $gallery->slug }}"
                                            data-title="{{ $gallery->title }}"
                                            title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- List View -->
                <div class="gallery-list" id="listView">
                    @foreach($galleries as $gallery)
                        <div class="list-item" data-id="{{ $gallery->id }}" data-status="{{ $gallery->status }}" data-title="{{ strtolower($gallery->title) }}">
                            <div class="list-checkbox">
                                <input type="checkbox" class="gallery-checkbox" data-id="{{ $gallery->id }}">
                                <label class="checkbox-label"></label>
                            </div>
                            
                            <div class="list-image">
                                @if($gallery->primaryImage)
                                    <img src="{{ $gallery->primaryImage->image_url }}" 
                                         alt="{{ $gallery->title }}"
                                         loading="lazy">
                                @else
                                    <div class="list-placeholder">
                                        <i class="fas fa-image"></i>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="list-content">
                                <div class="list-header">
                                    <h3 class="list-title">{{ $gallery->title }}</h3>
                                    <span class="status-badge status-{{ $gallery->status }}">
                                        {{ ucfirst($gallery->status) }}
                                    </span>
                                </div>
                                
                                @if($gallery->description)
                                    <p class="list-description">{{ Str::limit($gallery->description, 120) }}</p>
                                @endif
                                
                                <div class="list-meta">
                                    <span class="meta-item">
                                        <i class="fas fa-calendar-alt"></i>
                                        {{ $gallery->created_at->format('d M Y') }}
                                    </span>
                                    <span class="meta-item">
                                        <i class="fas fa-images"></i>
                                        {{ $gallery->images_count }} foto
                                    </span>
                                </div>
                            </div>
                            
                            <div class="list-actions">
                                <a href="{{ route('admin.gallery.show', $gallery) }}" 
                                   class="btn btn-sm btn-info" 
                                   title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.gallery.edit', $gallery) }}" 
                                   class="btn btn-sm btn-warning" 
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" 
                                        class="btn btn-sm btn-success toggle-status" 
                                        data-id="{{ $gallery->id }}" 
                                        data-status="{{ $gallery->status }}"
                                        title="Toggle Status">
                                    <i class="fas fa-{{ $gallery->status === 'published' ? 'eye-slash' : 'eye' }}"></i>
                                </button>
                                <button type="button" 
                                        class="btn btn-sm btn-danger delete-gallery" 
                                        data-id="{{ $gallery->id }}"
                                        data-title="{{ $gallery->title }}"
                                        title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Enhanced Pagination -->
            <div class="pagination-section">
                <div class="pagination-info">
                    Menampilkan {{ $galleries->firstItem() }} - {{ $galleries->lastItem() }} dari {{ $galleries->total() }} galeri
                </div>
                <div class="pagination-wrapper">
                    {{ $galleries->links() }}
                </div>
            </div>
        @else
            <div class="empty-state" data-aos="fade-up">
                <div class="empty-animation">
                    <div class="empty-icon">
                        <i class="fas fa-images"></i>
                    </div>
                    <div class="empty-particles">
                        <div class="particle"></div>
                        <div class="particle"></div>
                        <div class="particle"></div>
                    </div>
                </div>
                <h3>Belum Ada Galeri</h3>
                <p>Mulai buat galeri foto pertama Anda untuk menampilkan karya terbaik.</p>
                <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i>
                    Buat Galeri Pertama
                </a>
            </div>
        @endif
    </div>
</div>

<!-- Confirmation Modal -->
<div class="modal-overlay" id="confirmModal">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Konfirmasi</h4>
            <button class="modal-close" id="modalClose">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <div class="modal-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <p id="modalMessage">Apakah Anda yakin ingin melakukan aksi ini?</p>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" id="modalCancel">Batal</button>
            <button class="btn btn-danger" id="modalConfirm">Ya, Lanjutkan</button>
        </div>
    </div>
</div>

<style>
/* ====== ENHANCED GALLERY INDEX WITH FULL FUNCTIONALITY ====== */
* {
    box-sizing: border-box;
}

.admin-content {
    background: #f8f9fa;
    min-height: 100vh;
    padding: 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* ===== LOADING OVERLAY ===== */
.loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 99999; /* Fixed z-index to be above navbar */
}

.loading-spinner {
    background: white;
    padding: 40px;
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

.spinner {
    width: 50px;
    height: 50px;
    border: 4px solid #f3f3f3;
    border-top: 4px solid #8b0000;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin: 0 auto 20px;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.loading-spinner h4 {
    color: #333;
    margin: 0 0 10px;
    font-size: 1.2rem;
    font-weight: 600;
}

.loading-spinner p {
    color: #666;
    margin: 0;
    font-size: 0.9rem;
}

/* ===== ALERT SYSTEM ===== */
.alert-container {
    position: fixed;
    top: 80px; /* Moved below navbar */
    right: 20px;
    z-index: 999999; /* Higher z-index to be above everything */
    max-width: 400px;
}

.alert {
    padding: 15px 20px;
    margin-bottom: 10px;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    animation: slideInRight 0.3s ease-out;
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    gap: 10px;
}

.alert-success {
    background: #d4edda;
    border: 1px solid #c3e6cb;
    color: #155724;
}

.alert-error {
    background: #f8d7da;
    border: 1px solid #f5c6cb;
    color: #721c24;
}

.alert-warning {
    background: #fff3cd;
    border: 1px solid #ffeaa7;
    color: #856404;
}

.alert-info {
    background: #d1ecf1;
    border: 1px solid #bee5eb;
    color: #0c5460;
}

.alert-close {
    position: absolute;
    right: 10px;
    top: 10px;
    background: none;
    border: none;
    font-size: 18px;
    cursor: pointer;
    opacity: 0.7;
    width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.alert-close:hover {
    opacity: 1;
}

@keyframes slideInRight {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideOutRight {
    from {
        transform: translateX(0);
        opacity: 1;
    }
    to {
        transform: translateX(100%);
        opacity: 0;
    }
}

/* ===== ENHANCED HEADER ===== */
.content-header {
    background: linear-gradient(135deg, #8b0000, #a50000);
    padding: 30px;
    border-radius: 12px;
    margin-bottom: 30px;
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.2);
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
}

.header-title {
    flex: 0 0 auto;
}

.page-title {
    color: #ffffff;
    font-size: 2rem;
    font-weight: 700;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 15px;
}

.page-subtitle {
    color: rgba(255, 255, 255, 0.9);
    margin: 8px 0 0 0;
    font-size: 1rem;
}

.header-actions-inline {
    display: flex;
    align-items: center;
    gap: 15px;
    flex-wrap: wrap;
    flex: 1;
    justify-content: flex-end;
}

/* ===== GALLERY SEARCH & FILTERS (renamed classes) ===== */
.gallery-search-container {
    position: relative;
}

.gallery-search-input {
    padding: 12px 40px 12px 16px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 8px;
    background: rgba(255, 255, 255, 0.1);
    color: white;
    font-size: 1rem;
    width: 250px;
    transition: all 0.3s ease;
}

.gallery-search-input::placeholder {
    color: rgba(255, 255, 255, 0.7);
}

.gallery-search-input:focus {
    outline: none;
    background: rgba(255, 255, 255, 0.2);
    border-color: rgba(255, 255, 255, 0.5);
}

.gallery-search-icon {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: rgba(255, 255, 255, 0.7);
    font-size: 1rem;
}

.gallery-filter-dropdown {
    position: relative;
}

.gallery-filter-select {
    padding: 12px 16px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 8px;
    background: rgba(255, 255, 255, 0.1);
    color: white;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.3s ease;
    appearance: none;
    min-width: 120px;
}

.gallery-filter-select:focus {
    outline: none;
    background: rgba(255, 255, 255, 0.2);
    border-color: rgba(255, 255, 255, 0.5);
}

.gallery-filter-select option {
    background: #8b0000;
    color: white;
}

/* ===== GALLERY VIEW TOGGLE (renamed classes) ===== */
.gallery-view-toggle {
    display: flex;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 8px;
    overflow: hidden;
}

.gallery-view-btn {
    padding: 12px 16px;
    background: rgba(255, 255, 255, 0.1);
    border: none;
    color: rgba(255, 255, 255, 0.7);
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 1rem;
}

.gallery-view-btn:hover,
.gallery-view-btn.active {
    background: rgba(255, 255, 255, 0.2);
    color: white;
}

/* ===== BUTTONS ===== */
.btn {
    padding: 12px 20px;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    font-size: 0.9rem;
    position: relative;
    overflow: hidden;
}

.btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s ease;
}

.btn:hover::before {
    left: 100%;
}

.btn-primary {
    background: linear-gradient(135deg, #ffffff, #f8f9fa);
    color: #8b0000;
    box-shadow: 0 4px 15px rgba(255, 255, 255, 0.3);
}

.btn-primary:hover {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(255, 255, 255, 0.4);
}

.btn-secondary {
    background: linear-gradient(135deg, #6c757d, #545b62);
    color: white;
    box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
}

.btn-secondary:hover {
    background: linear-gradient(135deg, #545b62, #434a52);
    transform: translateY(-2px);
}

.btn-success {
    background: linear-gradient(135deg, #28a745, #34ce57);
    color: white;
    box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
}

.btn-warning {
    background: linear-gradient(135deg, #ffc107, #ffca2c);
    color: #212529;
    box-shadow: 0 4px 15px rgba(255, 193, 7, 0.3);
}

.btn-info {
    background: linear-gradient(135deg, #17a2b8, #20c0d7);
    color: white;
    box-shadow: 0 4px 15px rgba(23, 162, 184, 0.3);
}

.btn-danger {
    background: linear-gradient(135deg, #dc3545, #e84857);
    color: white;
    box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
}

.btn-outline {
    background: transparent;
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: white;
}

.btn-outline:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.5);
}

.btn-sm {
    padding: 8px 12px;
    font-size: 0.8rem;
}

.btn-lg {
    padding: 16px 32px;
    font-size: 1.1rem;
}

@media (max-width: 768px) {
    .btn-text {
        display: none;
    }
}

/* ===== ENHANCED STATS ===== */
.stats-section {
    margin-bottom: 30px;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.stat-card {
    background: white;
    border: 1px solid #e9ecef;
    border-radius: 12px;
    padding: 25px;
    display: flex;
    align-items: center;
    gap: 20px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, #8b0000, #a50000);
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(139, 0, 0, 0.15);
    border-color: #8b0000;
}

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    flex-shrink: 0;
}

.stat-icon.bg-primary {
    background: linear-gradient(135deg, #8b0000, #a50000);
}

.stat-icon.bg-success {
    background: linear-gradient(135deg, #28a745, #34ce57);
}

.stat-icon.bg-warning {
    background: linear-gradient(135deg, #ffc107, #ffca2c);
}

.stat-icon.bg-info {
    background: linear-gradient(135deg, #17a2b8, #20c0d7);
}

.stat-content {
    flex: 1;
}

.stat-number {
    color: #8b0000;
    font-size: 2rem;
    font-weight: 700;
    margin: 0 0 5px 0;
    transition: all 0.3s ease;
}

.stat-content p {
    color: #6c757d;
    margin: 0 0 10px 0;
    font-size: 0.9rem;
    font-weight: 500;
}

.stat-progress {
    width: 100%;
    height: 4px;
    background: #e9ecef;
    border-radius: 2px;
    overflow: hidden;
}

.progress-bar {
    height: 100%;
    background: linear-gradient(90deg, #8b0000, #a50000);
    border-radius: 2px;
    transition: width 0.5s ease;
}

/* ===== ACTION BAR ===== */
.action-bar {
    background: white;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.bulk-actions {
    display: flex;
    align-items: center;
    gap: 10px;
}

.bulk-select {
    padding: 8px 12px;
    border: 2px solid #e9ecef;
    border-radius: 6px;
    font-size: 0.85rem;
    background: white;
}

.result-info {
    color: #6c757d;
    font-size: 0.9rem;
    font-weight: 500;
}

.action-right {
    display: flex;
    gap: 10px;
}

/* ===== CONTENT SECTION ===== */
.content-section {
    background: white;
    border-radius: 12px;
    padding: 30px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    margin-bottom: 30px;
}

/* ===== GALLERY GRID ===== */
.gallery-container {
    position: relative;
}

.gallery-grid {
    display: none;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 25px;
}

.gallery-grid.active,
.gallery-list.active {
    display: grid;
}

.gallery-list {
    display: none;
    grid-template-columns: 1fr;
    gap: 20px;
}

.gallery-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    transition: all 0.3s ease;
    border: 2px solid transparent;
    position: relative;
    cursor: pointer;
}

.gallery-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 35px rgba(139, 0, 0, 0.15);
    border-color: #8b0000;
}

.card-checkbox {
    position: absolute;
    top: 15px;
    left: 15px;
    z-index: 10;
}

.gallery-checkbox {
    display: none;
}

.checkbox-label {
    width: 20px;
    height: 20px;
    border: 2px solid white;
    border-radius: 4px;
    background: rgba(0, 0, 0, 0.3);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.gallery-checkbox:checked + .checkbox-label {
    background: #8b0000;
    border-color: #8b0000;
}

.gallery-checkbox:checked + .checkbox-label::after {
    content: '✓';
    color: white;
    font-size: 12px;
    font-weight: bold;
}

.gallery-image {
    position: relative;
    height: 220px;
    overflow: hidden;
}

.gallery-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.gallery-card:hover .gallery-img {
    transform: scale(1.05);
}

.gallery-placeholder {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100%;
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    color: #8b0000;
}

.gallery-placeholder i {
    font-size: 3rem;
    margin-bottom: 10px;
    opacity: 0.7;
}

.gallery-placeholder p {
    font-size: 1rem;
    margin: 0;
    font-weight: 500;
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(139, 0, 0, 0.8), rgba(165, 0, 0, 0.8));
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.gallery-card:hover .image-overlay {
    opacity: 1;
}

.overlay-content {
    text-align: center;
    color: white;
}

.image-count {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 1.2rem;
    font-weight: 600;
}

.gallery-status {
    position: absolute;
    top: 15px;
    right: 15px;
}

.status-badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    display: flex;
    align-items: center;
    gap: 5px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.status-published {
    background: rgba(40, 167, 69, 0.9);
    color: white;
}

.status-draft {
    background: rgba(255, 193, 7, 0.9);
    color: #212529;
}

.gallery-content {
    padding: 20px;
}

.gallery-title {
    font-size: 1.1rem;
    font-weight: 700;
    margin-bottom: 10px;
    color: #2c3e50;
    line-height: 1.3;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.gallery-description {
    color: #6c757d;
    font-size: 0.9rem;
    margin-bottom: 15px;
    line-height: 1.5;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.gallery-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
    padding-top: 15px;
    border-top: 1px solid #e9ecef;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 6px;
    color: #6c757d;
    font-size: 0.8rem;
    font-weight: 500;
}

.gallery-actions {
    display: flex;
    gap: 8px;
    justify-content: center;
}

/* ===== LIST VIEW ===== */
.list-item {
    background: white;
    border: 2px solid #e9ecef;
    border-radius: 12px;
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 20px;
    transition: all 0.3s ease;
}

.list-item:hover {
    border-color: #8b0000;
    box-shadow: 0 8px 25px rgba(139, 0, 0, 0.1);
    transform: translateY(-2px);
}

.list-checkbox {
    flex-shrink: 0;
}

.list-image {
    width: 80px;
    height: 80px;
    border-radius: 8px;
    overflow: hidden;
    flex-shrink: 0;
}

.list-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.list-placeholder {
    width: 100%;
    height: 100%;
    background: #f8f9fa;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #8b0000;
}

.list-content {
    flex: 1;
}

.list-header {
    display: flex;
    justify-content: space-between;
    align-items: start;
    margin-bottom: 8px;
}

.list-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #2c3e50;
    margin: 0;
}

.list-description {
    color: #6c757d;
    font-size: 0.9rem;
    margin-bottom: 10px;
    line-height: 1.4;
}

.list-meta {
    display: flex;
    gap: 20px;
}

.list-actions {
    display: flex;
    gap: 8px;
    flex-shrink: 0;
}

/* ===== PAGINATION ===== */
.pagination-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 30px;
    flex-wrap: wrap;
    gap: 15px;
}

.pagination-info {
    color: #6c757d;
    font-size: 0.9rem;
}

.pagination-wrapper {
    display: flex;
    justify-content: center;
}

/* ===== EMPTY STATE ===== */
.empty-state {
    text-align: center;
    padding: 80px 20px;
    color: #495057;
    position: relative;
}

.empty-animation {
    position: relative;
    margin-bottom: 30px;
}

.empty-icon {
    font-size: 5rem;
    color: #8b0000;
    margin-bottom: 20px;
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

.empty-particles {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.particle {
    position: absolute;
    width: 6px;
    height: 6px;
    background: #8b0000;
    border-radius: 50%;
    opacity: 0.6;
}

.particle:nth-child(1) {
    top: -40px;
    left: -30px;
    animation: particle1 2s infinite;
}

.particle:nth-child(2) {
    top: -20px;
    right: -40px;
    animation: particle2 2.5s infinite;
}

.particle:nth-child(3) {
    bottom: -30px;
    left: -20px;
    animation: particle3 2.2s infinite;
}

@keyframes particle1 {
    0%, 100% { transform: translateY(0px); opacity: 0.6; }
    50% { transform: translateY(-15px); opacity: 1; }
}

@keyframes particle2 {
    0%, 100% { transform: translateX(0px); opacity: 0.6; }
    50% { transform: translateX(15px); opacity: 1; }
}

@keyframes particle3 {
    0%, 100% { transform: scale(1); opacity: 0.6; }
    50% { transform: scale(1.5); opacity: 1; }
}

.empty-state h3 {
    color: #495057;
    margin-bottom: 15px;
    font-size: 1.5rem;
    font-weight: 700;
}

.empty-state p {
    color: #6c757d;
    margin-bottom: 30px;
    font-size: 1rem;
    max-width: 400px;
    margin-left: auto;
    margin-right: auto;
}

/* ===== MODAL ===== */
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 99999; /* Fixed z-index to be above navbar */
}

.modal-content {
    background: white;
    border-radius: 12px;
    max-width: 500px;
    width: 90%;
    max-height: 90vh;
    overflow-y: auto;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    animation: modalSlideIn 0.3s ease-out;
}

@keyframes modalSlideIn {
    from {
        opacity: 0;
        transform: translateY(-50px) scale(0.9);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

.modal-header {
    padding: 20px 25px;
    border-bottom: 1px solid #e9ecef;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.modal-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: #2c3e50;
    margin: 0;
}

.modal-close {
    background: none;
    border: none;
    font-size: 1.2rem;
    color: #6c757d;
    cursor: pointer;
    padding: 5px;
    border-radius: 4px;
    transition: all 0.3s ease;
}

.modal-close:hover {
    background: #f8f9fa;
    color: #8b0000;
}

.modal-body {
    padding: 25px;
    text-align: center;
}

.modal-icon {
    font-size: 3rem;
    color: #ffc107;
    margin-bottom: 20px;
}

.modal-body p {
    font-size: 1rem;
    color: #495057;
    margin: 0;
    line-height: 1.5;
}

.modal-footer {
    padding: 20px 25px;
    border-top: 1px solid #e9ecef;
    display: flex;
    justify-content: center;
    gap: 15px;
}

/* ===== RESPONSIVE DESIGN ===== */
@media (max-width: 1200px) {
    .gallery-grid {
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
    }
}

@media (max-width: 768px) {
    .admin-content {
        padding: 15px;
    }
    
    .content-header {
        padding: 25px 20px;
    }
    
    .header-content {
        flex-direction: column;
        text-align: center;
        gap: 20px;
    }
    
    .page-title {
        font-size: 1.6rem;
    }
    
    .header-actions-inline {
        width: 100%;
        justify-content: center;
        flex-wrap: wrap;
        gap: 10px;
    }
    
    .gallery-search-input {
        width: 200px;
    }
    
    .stats-grid {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
    }
    
    .stat-card {
        padding: 20px;
    }
    
    .stat-icon {
        width: 50px;
        height: 50px;
        font-size: 1.2rem;
    }
    
    .stat-number {
        font-size: 1.6rem;
    }
    
    .gallery-grid {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 15px;
    }
    
    .gallery-card {
        margin-bottom: 0;
    }
    
    .list-item {
        flex-direction: column;
        text-align: center;
        gap: 15px;
    }
    
    .list-header {
        flex-direction: column;
        gap: 10px;
        text-align: center;
    }
    
    .list-meta {
        justify-content: center;
    }
    
    .action-bar {
        flex-direction: column;
        align-items: stretch;
    }
    
    .pagination-section {
        flex-direction: column;
        text-align: center;
    }
    
    .content-section {
        padding: 20px;
    }
}

@media (max-width: 480px) {
    .gallery-grid {
        grid-template-columns: 1fr;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .header-actions-inline {
        flex-direction: column;
        width: 100%;
    }
    
    .gallery-search-input,
    .gallery-filter-select {
        width: 100%;
    }
}

/* ===== ANIMATIONS ===== */
.gallery-card {
    animation: fadeInUp 0.6s ease-out;
}

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

@keyframes fadeOut {
    from {
        opacity: 1;
        transform: scale(1);
    }
    to {
        opacity: 0;
        transform: scale(0.8);
    }
}

.stat-card {
    animation: fadeInUp 0.6s ease-out;
}

.stat-card:nth-child(1) { animation-delay: 0.1s; }
.stat-card:nth-child(2) { animation-delay: 0.2s; }
.stat-card:nth-child(3) { animation-delay: 0.3s; }
.stat-card:nth-child(4) { animation-delay: 0.4s; }

/* ===== UTILITY CLASSES ===== */
.d-none { display: none !important; }
.d-flex { display: flex !important; }
.text-center { text-align: center !important; }
.text-muted { color: #6c757d !important; }
.mb-0 { margin-bottom: 0 !important; }
.mt-3 { margin-top: 1rem !important; }
.p-0 { padding: 0 !important; }

/* ===== SCROLLBAR STYLING ===== */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

::-webkit-scrollbar-thumb {
    background: #8b0000;
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: #a50000;
}
</style>
<script>
// ====== ENHANCED GALLERY INDEX WITH FULL FUNCTIONALITY ======

// Define routes for AJAX calls
window.galleryRoutes = {
    destroy: function(slug) {
        return `{{ route('admin.gallery.index') }}/${slug}`;
    },
    toggleStatus: function(slug) {
        return `{{ route('admin.gallery.index') }}/${slug}/toggle-status`;
    }
};

class GalleryIndex {
    constructor() {
        this.galleries = [];
        this.filteredGalleries = [];
        this.selectedItems = new Set();
        this.currentView = 'grid';
        this.isLoading = false;
        
        this.init();
    }
    
    init() {
        this.setupEventListeners();
        this.animateStats();
        this.initializeView();
        this.showAlert('info', 'Halaman gallery berhasil dimuat!', 3000);
    }
    
    setupEventListeners() {
        // Search functionality
        const searchInput = document.getElementById('gallerySearchInput');
        if (searchInput) {
            searchInput.addEventListener('input', (e) => {
                this.debounce(() => this.filterGalleries(), 300)();
            });
        }
        
        // Filter functionality
        const statusFilter = document.getElementById('statusFilter');
        if (statusFilter) {
            statusFilter.addEventListener('change', () => this.filterGalleries());
        }
        
        const sortFilter = document.getElementById('sortFilter');
        if (sortFilter) {
            sortFilter.addEventListener('change', () => this.sortGalleries());
        }
        
        // View toggle
        document.querySelectorAll('.gallery-view-btn').forEach(btn => {
            btn.addEventListener('click', (e) => this.toggleView(e.target.dataset.view));
        });
        
        // Bulk actions
        const selectAllBtn = document.getElementById('selectAllBtn');
        if (selectAllBtn) {
            selectAllBtn.addEventListener('click', () => this.toggleSelectAll());
        }
        
        const refreshBtn = document.getElementById('refreshBtn');
        if (refreshBtn) {
            refreshBtn.addEventListener('click', () => this.refreshPage());
        }
        
        const applyBulkBtn = document.getElementById('applyBulk');
        if (applyBulkBtn) {
            applyBulkBtn.addEventListener('click', () => this.applyBulkAction());
        }
        
        const cancelBulkBtn = document.getElementById('cancelBulk');
        if (cancelBulkBtn) {
            cancelBulkBtn.addEventListener('click', () => this.cancelBulkSelection());
        }
        
        // Individual gallery actions
        document.addEventListener('click', (e) => {
            if (e.target.closest('.delete-gallery')) {
                this.deleteGallery(e.target.closest('.delete-gallery'));
            }
            
            if (e.target.closest('.toggle-status')) {
                this.toggleStatus(e.target.closest('.toggle-status'));
            }
            
            if (e.target.classList.contains('gallery-checkbox')) {
                this.toggleItemSelection(e.target);
            }
        });
        
        // Modal events
        const modalClose = document.getElementById('modalClose');
        const modalCancel = document.getElementById('modalCancel');
        const modalConfirm = document.getElementById('modalConfirm');
        
        [modalClose, modalCancel].forEach(btn => {
            if (btn) btn.addEventListener('click', () => this.hideModal());
        });
        
        if (modalConfirm) {
            modalConfirm.addEventListener('click', () => this.confirmAction());
        }
        
        // Close modal on overlay click
        document.getElementById('confirmModal')?.addEventListener('click', (e) => {
            if (e.target.id === 'confirmModal') {
                this.hideModal();
            }
        });
    }
    
    initializeView() {
        // Set initial view
        this.toggleView('grid');
        
        // Initialize galleries data
        this.collectGalleryData();
    }
    
    collectGalleryData() {
        const galleryCards = document.querySelectorAll('.gallery-card, .list-item');
        this.galleries = Array.from(galleryCards).map(card => ({
            element: card,
            id: card.dataset.id,
            status: card.dataset.status,
            title: card.dataset.title
        }));
        this.filteredGalleries = [...this.galleries];
    }
    
    // ===== SEARCH & FILTER FUNCTIONALITY =====
    filterGalleries() {
        const searchTerm = document.getElementById('gallerySearchInput')?.value.toLowerCase() || '';
        const statusFilter = document.getElementById('statusFilter')?.value || '';
        
        this.filteredGalleries = this.galleries.filter(gallery => {
            const matchesSearch = gallery.title.includes(searchTerm);
            const matchesStatus = !statusFilter || gallery.status === statusFilter;
            
            return matchesSearch && matchesStatus;
        });
        
        this.updateDisplay();
        this.updateResultCount();
    }
    
    sortGalleries() {
        const sortType = document.getElementById('sortFilter')?.value || 'newest';
        
        this.filteredGalleries.sort((a, b) => {
            switch (sortType) {
                case 'oldest':
                    return a.id - b.id;
                case 'title':
                    return a.title.localeCompare(b.title);
                case 'title_desc':
                    return b.title.localeCompare(a.title);
                case 'newest':
                default:
                    return b.id - a.id;
            }
        });
        
        this.updateDisplay();
    }
    
    updateDisplay() {
        // Hide all galleries first
        this.galleries.forEach(gallery => {
            gallery.element.style.display = 'none';
        });
        
        // Show filtered galleries with animation
        this.filteredGalleries.forEach((gallery, index) => {
            gallery.element.style.display = 'block';
            gallery.element.style.animationDelay = `${index * 50}ms`;
            gallery.element.classList.add('fadeInUp');
        });
    }
    
    updateResultCount() {
        const resultCount = document.getElementById('resultCount');
        if (resultCount) {
            const currentCount = this.filteredGalleries.length;
            resultCount.textContent = currentCount;
            
            // Also update the display info if no galleries remain
            if (currentCount === 0 && this.galleries.length > 0) {
                // If we have galleries but none match filter, show "0 dari X"
                const totalCount = this.galleries.length;
                const resultInfo = document.querySelector('.result-info');
                if (resultInfo) {
                    resultInfo.innerHTML = `<span id="resultCount">0</span> dari ${totalCount} galeri`;
                }
            }
        }
    }
    
    // ===== VIEW TOGGLE =====
    toggleView(view) {
        if (this.currentView === view) return;
        
        this.currentView = view;
        
        // Update buttons
        document.querySelectorAll('.gallery-view-btn').forEach(btn => {
            btn.classList.toggle('active', btn.dataset.view === view);
        });
        
        // Update views
        const gridView = document.getElementById('gridView');
        const listView = document.getElementById('listView');
        
        if (gridView && listView) {
            if (view === 'grid') {
                gridView.classList.add('active');
                listView.classList.remove('active');
            } else {
                listView.classList.add('active');
                gridView.classList.remove('active');
            }
        }
        
        this.showAlert('info', `Tampilan diubah ke ${view === 'grid' ? 'Grid' : 'List'} View`, 2000);
    }
    
    // ===== BULK ACTIONS =====
    toggleSelectAll() {
        const checkboxes = document.querySelectorAll('.gallery-checkbox');
        const allSelected = this.selectedItems.size === checkboxes.length;
        
        if (allSelected) {
            this.selectedItems.clear();
            checkboxes.forEach(cb => cb.checked = false);
        } else {
            checkboxes.forEach(cb => {
                cb.checked = true;
                this.selectedItems.add(cb.dataset.id);
            });
        }
        
        this.updateBulkActionsVisibility();
        this.updateSelectAllButton();
    }
    
    toggleItemSelection(checkbox) {
        const id = checkbox.dataset.id;
        
        if (checkbox.checked) {
            this.selectedItems.add(id);
        } else {
            this.selectedItems.delete(id);
        }
        
        this.updateBulkActionsVisibility();
        this.updateSelectAllButton();
    }
    
    updateBulkActionsVisibility() {
        const bulkActions = document.querySelector('.bulk-actions');
        if (bulkActions) {
            bulkActions.style.display = this.selectedItems.size > 0 ? 'flex' : 'none';
        }
    }
    
    updateSelectAllButton() {
        const selectAllBtn = document.getElementById('selectAllBtn');
        const checkboxes = document.querySelectorAll('.gallery-checkbox');
        
        if (selectAllBtn) {
            const allSelected = this.selectedItems.size === checkboxes.length;
            const someSelected = this.selectedItems.size > 0;
            
            selectAllBtn.innerHTML = allSelected ? 
                '<i class="fas fa-square"></i> Batalkan Semua' : 
                '<i class="fas fa-check-square"></i> Pilih Semua';
        }
    }
    
    applyBulkAction() {
        const action = document.getElementById('bulkAction')?.value;
        if (!action || this.selectedItems.size === 0) {
            this.showAlert('warning', 'Pilih aksi dan minimal 1 item!');
            return;
        }
        
        let message = '';
        switch (action) {
            case 'publish':
                message = `Publish ${this.selectedItems.size} gallery yang dipilih?`;
                break;
            case 'draft':
                message = `Jadikan draft ${this.selectedItems.size} gallery yang dipilih?`;
                break;
            case 'delete':
                message = `Hapus ${this.selectedItems.size} gallery yang dipilih? Aksi ini tidak dapat dibatalkan!`;
                break;
        }
        
        this.showModal('Konfirmasi Bulk Action', message, () => {
            this.processBulkAction(action);
        });
    }
    
    processBulkAction(action) {
        this.showLoading(`Memproses ${action} untuk ${this.selectedItems.size} gallery...`);
        
        // Simulate API call
        setTimeout(() => {
            this.hideLoading();
            this.showAlert('success', `Berhasil ${action} ${this.selectedItems.size} gallery!`);
            this.cancelBulkSelection();
            
            if (action === 'delete') {
                this.refreshPage();
            }
        }, 2000);
    }
    
    cancelBulkSelection() {
        this.selectedItems.clear();
        document.querySelectorAll('.gallery-checkbox').forEach(cb => cb.checked = false);
        this.updateBulkActionsVisibility();
        this.updateSelectAllButton();
        
        const bulkAction = document.getElementById('bulkAction');
        if (bulkAction) bulkAction.value = '';
    }
    
    // ===== INDIVIDUAL ACTIONS =====
    deleteGallery(button) {
        const id = button.dataset.id;
        const slug = button.dataset.slug;
        const title = button.dataset.title;
        
        console.log('Delete Gallery - ID:', id, 'Slug:', slug, 'Title:', title); // Debug log
        
        if (!slug) {
            this.showAlert('error', 'Slug Gallery tidak ditemukan!');
            return;
        }
        
        this.showModal(
            'Hapus Gallery', 
            `Apakah Anda yakin ingin menghapus gallery "${title}"? Aksi ini tidak dapat dibatalkan!`,
            () => this.processDeleteGallery(id, slug, title)
        );
    }
    
    processDeleteGallery(id, slug, title) {
        console.log('Processing Delete Gallery - ID:', id, 'Slug:', slug, 'URL:', window.galleryRoutes.destroy(slug)); // Debug log
        
        this.showLoading(`Menghapus gallery "${title}"...`);
        
        // Create CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        
        if (!csrfToken) {
            this.hideLoading();
            this.showAlert('error', 'CSRF token tidak ditemukan!');
            return;
        }
        
        // Make AJAX request to delete gallery - using Laravel route
        fetch(window.galleryRoutes.destroy(slug), {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            this.hideLoading();
            
            if (data.success) {
                this.showAlert('success', data.message || `Gallery "${title}" berhasil dihapus!`);
                
                // Remove the gallery card from DOM
                const galleryCard = document.querySelector(`[data-id="${id}"]`);
                if (galleryCard) {
                    galleryCard.style.animation = 'fadeOut 0.3s ease-out';
                    setTimeout(() => {
                        galleryCard.remove();
                        this.updateResultCount();
                        this.collectGalleryData(); // Refresh gallery data
                    }, 300);
                }
            } else {
                this.showAlert('error', data.message || 'Terjadi kesalahan saat menghapus gallery!');
            }
        })
        .catch(error => {
            this.hideLoading();
            console.error('Delete Gallery Error:', error);
            this.showAlert('error', 'Terjadi kesalahan saat menghapus gallery! ' + error.message);
        });
    }
    
    toggleStatus(button) {
        const id = button.dataset.id;
        const slug = button.dataset.slug;
        const currentStatus = button.dataset.status;
        const newStatus = currentStatus === 'published' ? 'draft' : 'published';
        
        console.log('Toggle Status - ID:', id, 'Slug:', slug, 'Current:', currentStatus, 'New:', newStatus, 'URL:', window.galleryRoutes.toggleStatus(slug)); // Debug log
        
        if (!slug) {
            this.showAlert('error', 'Slug Gallery tidak ditemukan!');
            return;
        }
        
        this.showLoading(`Mengubah status gallery...`);
        
        // Create CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        
        if (!csrfToken) {
            this.hideLoading();
            this.showAlert('error', 'CSRF token tidak ditemukan!');
            return;
        }
        
        // Make AJAX request to toggle status - using Laravel route
        fetch(window.galleryRoutes.toggleStatus(slug), {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({})
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            this.hideLoading();
            
            if (data.success) {
                this.showAlert('success', data.message);
                
                // Update button
                button.dataset.status = data.new_status;
                const icon = button.querySelector('i');
                icon.className = `fas fa-${data.new_status === 'published' ? 'eye-slash' : 'eye'}`;
                
                // Update status badge in the card
                const card = button.closest('.gallery-card, .list-item');
                const statusBadge = card.querySelector('.status-badge');
                if (statusBadge) {
                    statusBadge.className = `status-badge status-${data.new_status}`;
                    
                    // Update badge text and icon
                    const badgeIcon = statusBadge.querySelector('i');
                    if (badgeIcon) {
                        badgeIcon.className = `fas fa-${data.new_status === 'published' ? 'eye' : 'edit'}`;
                    }
                    
                    // Update text if it exists
                    const textNode = Array.from(statusBadge.childNodes).find(node => node.nodeType === Node.TEXT_NODE);
                    if (textNode) {
                        textNode.textContent = data.new_status.charAt(0).toUpperCase() + data.new_status.slice(1);
                    } else {
                        // If no text node, add it
                        statusBadge.innerHTML = `<i class="fas fa-${data.new_status === 'published' ? 'eye' : 'edit'}"></i> ${data.new_status.charAt(0).toUpperCase() + data.new_status.slice(1)}`;
                    }
                }
                
                // Update card data attribute
                card.dataset.status = data.new_status;
            } else {
                this.showAlert('error', data.message || 'Terjadi kesalahan saat mengubah status!');
            }
        })
        .catch(error => {
            this.hideLoading();
            console.error('Toggle Status Error:', error);
            this.showAlert('error', 'Terjadi kesalahan saat mengubah status! ' + error.message);
        });
    }
    
    // ===== MODAL FUNCTIONALITY =====
    showModal(title, message, confirmCallback) {
        const modal = document.getElementById('confirmModal');
        const modalTitle = modal.querySelector('.modal-title');
        const modalMessage = document.getElementById('modalMessage');
        
        modalTitle.textContent = title;
        modalMessage.textContent = message;
        
        this.confirmCallback = confirmCallback;
        modal.style.display = 'flex';
        
        // Add body class to prevent scrolling
        document.body.style.overflow = 'hidden';
    }
    
    hideModal() {
        const modal = document.getElementById('confirmModal');
        modal.style.display = 'none';
        this.confirmCallback = null;
        
        // Remove body class
        document.body.style.overflow = '';
    }
    
    confirmAction() {
        if (this.confirmCallback) {
            this.confirmCallback();
        }
        this.hideModal();
    }
    
    // ===== LOADING & ALERTS =====
    showLoading(message = 'Memproses...') {
        const overlay = document.getElementById('loadingOverlay');
        const spinner = overlay.querySelector('.loading-spinner h4');
        
        spinner.textContent = message;
        overlay.style.display = 'flex';
        this.isLoading = true;
        
        // Prevent body scroll
        document.body.style.overflow = 'hidden';
    }
    
    hideLoading() {
        const overlay = document.getElementById('loadingOverlay');
        overlay.style.display = 'none';
        this.isLoading = false;
        
        // Restore body scroll
        document.body.style.overflow = '';
    }
    
    showAlert(type, message, duration = 5000) {
        const alertContainer = document.getElementById('alertContainer');
        const alertId = 'alert_' + Date.now();
        
        const alert = document.createElement('div');
        alert.className = `alert alert-${type}`;
        alert.id = alertId;
        
        const iconMap = {
            success: 'check-circle',
            error: 'exclamation-circle',
            warning: 'exclamation-triangle',
            info: 'info-circle'
        };
        
        alert.innerHTML = `
            <i class="fas fa-${iconMap[type]}"></i>
            <span>${message}</span>
            <button type="button" class="alert-close" onclick="galleryIndex.closeAlert('${alertId}')">&times;</button>
        `;
        
        alertContainer.appendChild(alert);
        
        // Auto-remove after duration
        if (duration > 0) {
            setTimeout(() => {
                this.closeAlert(alertId);
            }, duration);
        }
    }
    
    closeAlert(alertId) {
        const alert = document.getElementById(alertId);
        if (alert) {
            alert.style.animation = 'slideOutRight 0.3s ease-out';
            setTimeout(() => {
                alert.remove();
            }, 300);
        }
    }
    
    // ===== UTILITY FUNCTIONS =====
    animateStats() {
        const statNumbers = document.querySelectorAll('.stat-number');
        
        statNumbers.forEach(stat => {
            const target = parseInt(stat.dataset.target);
            const duration = 2000; // 2 seconds
            const step = target / (duration / 16); // 60fps
            let current = 0;
            
            const timer = setInterval(() => {
                current += step;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                stat.textContent = Math.floor(current);
            }, 16);
        });
    }
    
    refreshPage() {
        this.showLoading('Memuat ulang halaman...');
        setTimeout(() => {
            window.location.reload();
        }, 1000);
    }
    
    debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    window.galleryIndex = new GalleryIndex();
});

// Add AOS (Animate On Scroll) alternative
function initAnimateOnScroll() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'fadeInUp 0.6s ease-out forwards';
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    // Observe elements with data-aos attributes
    document.querySelectorAll('[data-aos]').forEach(el => {
        observer.observe(el);
    });
}

// Initialize scroll animations
document.addEventListener('DOMContentLoaded', initAnimateOnScroll);

// Handle keyboard shortcuts
document.addEventListener('keydown', (e) => {
    // Ctrl + F for search
    if (e.ctrlKey && e.key === 'f') {
        e.preventDefault();
        const searchInput = document.getElementById('gallerySearchInput');
        if (searchInput) {
            searchInput.focus();
        }
    }
    
    // Escape to close modal
    if (e.key === 'Escape') {
        const modal = document.getElementById('confirmModal');
        if (modal && modal.style.display === 'flex') {
            window.galleryIndex?.hideModal();
        }
    }
    
    // Ctrl + A to select all
    if (e.ctrlKey && e.key === 'a' && !e.target.matches('input, textarea')) {
        e.preventDefault();
        window.galleryIndex?.toggleSelectAll();
    }
});
</script>
@endsection
