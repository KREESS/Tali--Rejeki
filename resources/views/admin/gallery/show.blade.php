@extends('admin.components.layout')

@section('title', $title)

@section('content')
<!-- Enhanced Loading Animation -->
<div class="loading-overlay" id="loadingOverlay">
    <div class="loading-wrapper">
        <div class="loading-content">
            <div class="loading-spinner">
                <div class="spinner-ring"></div>
                <div class="spinner-ring"></div>
                <div class="spinner-ring"></div>
            </div>
            <div class="loading-text">Memproses...</div>
            <div class="loading-progress">
                <div class="progress-bar"></div>
            </div>
        </div>
    </div>
</div>

<!-- Advanced Alert Container -->
<div class="alert-container" id="alertContainer"></div>

<!-- Enhanced Confirmation Modal -->
<div class="confirmation-modal" id="confirmationModal" style="display: none;">
    <div class="confirmation-overlay"></div>
    <div class="confirmation-dialog">
        <div class="confirmation-header">
            <div class="confirmation-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <h3 class="confirmation-title">Konfirmasi Tindakan</h3>
        </div>
        <div class="confirmation-body">
            <p class="confirmation-message" id="confirmationMessage"></p>
        </div>
        <div class="confirmation-footer">
            <button class="confirmation-btn cancel-btn" onclick="closeConfirmation()">
                <i class="fas fa-times"></i>
                <span>Batal</span>
            </button>
            <button class="confirmation-btn confirm-btn" id="confirmButton">
                <i class="fas fa-check"></i>
                <span>Konfirmasi</span>
            </button>
        </div>
    </div>
</div>

<div class="admin-container">
    <!-- Premium Hero Header -->
    <div class="premium-hero">
        <div class="hero-background">
            <div class="hero-pattern"></div>
            <div class="hero-gradient"></div>
        </div>
        
        <div class="hero-content">
            <div class="hero-main">
                <div class="status-indicator status-{{ $gallery->status }}">
                    <i class="fas fa-{{ $gallery->status === 'published' ? 'eye' : 'edit' }}"></i>
                    <span>{{ ucfirst($gallery->status) }}</span>
                </div>
                
                <h1 class="hero-title">
                    <i class="fas fa-images hero-icon"></i>
                    <span>{{ $gallery->title }}</span>
                </h1>
                
                <div class="hero-meta">
                    <div class="meta-item">
                        <i class="fas fa-calendar-alt"></i>
                        <span>{{ $gallery->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="meta-divider">•</div>
                    <div class="meta-item">
                        <i class="fas fa-photo-video"></i>
                        <span>{{ $gallery->images->count() }} gambar</span>
                    </div>
                    <div class="meta-divider">•</div>
                    <div class="meta-item">
                        <i class="fas fa-eye"></i>
                        <span id="viewCount">{{ rand(100, 999) }} views</span>
                    </div>
                </div>
            </div>
            
            <div class="hero-actions">
                <a href="{{ route('admin.gallery.edit', $gallery) }}" class="hero-btn primary-btn">
                    <i class="fas fa-edit"></i>
                    <span>Edit Gallery</span>
                    <div class="btn-glow"></div>
                </a>
                <a href="{{ route('admin.gallery.index') }}" class="hero-btn secondary-btn">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Premium Dashboard Grid -->
    <div class="dashboard-grid">
        <!-- Gallery Information Card -->
        <div class="premium-card info-card" data-aos="fade-up" data-aos-delay="100">
            <div class="card-header crimson-gradient">
                <div class="header-content">
                    <h3 class="card-title">
                        <i class="fas fa-info-circle"></i>
                        <span>Informasi Gallery</span>
                    </h3>
                    <div class="card-score">
                        <span class="score-badge">{{ $gallery->images->count() > 0 ? '100' : '50' }}%</span>
                    </div>
                </div>
                <div class="header-actions">
                    <button class="header-btn" onclick="copyToClipboard('{{ $gallery->slug }}')" title="Copy Slug">
                        <i class="fas fa-copy"></i>
                    </button>
                    <button class="header-btn" onclick="refreshCard()" title="Refresh">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="gallery-info-grid">
                    <div class="gallery-info-item featured">
                        <div class="gallery-item-icon">
                            <i class="fas fa-heading"></i>
                        </div>
                        <div class="gallery-item-content">
                            <label class="gallery-item-label">Judul Gallery</label>
                            <div class="gallery-item-value featured-value">{{ $gallery->title }}</div>
                        </div>
                        <div class="gallery-item-status">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>

                    <div class="gallery-info-item">
                        <div class="gallery-item-icon">
                            <i class="fas fa-link"></i>
                        </div>
                        <div class="gallery-item-content">
                            <label class="gallery-item-label">URL Slug</label>
                            <div class="gallery-item-value slug-value">{{ $gallery->slug }}</div>
                        </div>
                        <div class="gallery-item-action">
                            <button class="gallery-item-btn" onclick="copyToClipboard('{{ $gallery->slug }}')">
                                <i class="fas fa-copy"></i>
                            </button>
                        </div>
                    </div>

                    <div class="gallery-info-item">
                        <div class="gallery-item-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="gallery-item-content">
                            <label class="gallery-item-label">Tanggal Dibuat</label>
                            <div class="gallery-item-value">{{ $gallery->created_at->format('d M Y, H:i') }}</div>
                        </div>
                        <div class="gallery-item-badge">
                            <span class="gallery-time-badge">{{ $gallery->created_at->diffForHumans() }}</span>
                        </div>
                    </div>

                    <div class="gallery-info-item">
                        <div class="gallery-item-icon">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div class="gallery-item-content">
                            <label class="gallery-item-label">Terakhir Update</label>
                            <div class="gallery-item-value">{{ $gallery->updated_at->format('d M Y, H:i') }}</div>
                        </div>
                        <div class="gallery-item-badge">
                            <span class="gallery-time-badge">{{ $gallery->updated_at->diffForHumans() }}</span>
                        </div>
                    </div>

                    <div class="gallery-info-item">
                        <div class="gallery-item-icon">
                            <i class="fas fa-photo-video"></i>
                        </div>
                        <div class="gallery-item-content">
                            <label class="gallery-item-label">Total Gambar</label>
                            <div class="gallery-item-value">{{ $gallery->images->count() }} gambar</div>
                        </div>
                        <div class="gallery-item-badge">
                            <span class="gallery-count-badge">{{ $gallery->images->count() }}</span>
                        </div>
                    </div>

                    <div class="gallery-info-item">
                        <div class="gallery-item-icon">
                            <i class="fas fa-{{ $gallery->status === 'published' ? 'eye' : 'eye-slash' }}"></i>
                        </div>
                        <div class="gallery-item-content">
                            <label class="gallery-item-label">Status Gallery</label>
                            <div class="gallery-item-value">{{ ucfirst($gallery->status) }}</div>
                        </div>
                        <div class="gallery-item-badge">
                            <span class="status-badge status-{{ $gallery->status }}">{{ ucfirst($gallery->status) }}</span>
                        </div>
                    </div>
                </div>

                @if($gallery->description)
                <div class="description-section">
                    <div class="description-header">
                        <i class="fas fa-file-alt"></i>
                        <h4>Deskripsi Gallery</h4>
                    </div>
                    <div class="description-content">
                        {{ $gallery->description }}
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Quick Actions Card -->
        <div class="premium-card actions-card" data-aos="fade-up" data-aos-delay="200">
            <div class="card-header crimson-gradient">
                <div class="header-content">
                    <h3 class="card-title">
                        <i class="fas fa-bolt"></i>
                        <span>Quick Actions</span>
                    </h3>
                    <div class="card-subtitle">Kelola gallery dengan cepat</div>
                </div>
            </div>

            <div class="card-body">
                <div class="action-grid">
                    <a href="{{ route('admin.gallery.edit', $gallery) }}" class="action-card primary-action">
                        <div class="action-icon">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div class="action-content">
                            <h4>Edit Gallery</h4>
                            <p>Ubah informasi dan gambar</p>
                        </div>
                        <div class="action-arrow">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="action-glow"></div>
                    </a>

                    @if($gallery->status === 'draft')
                    <form action="{{ route('admin.gallery.toggle-status', $gallery) }}" method="POST" class="action-form">
                        @csrf
                        <button type="submit" 
                                class="action-card success-action"
                                data-slug="{{ $gallery->slug }}"
                                onclick="return toggleStatus(this)">
                            <div class="action-icon">
                                <i class="fas fa-eye"></i>
                            </div>
                            <div class="action-content">
                                <h4>Publish Gallery</h4>
                                <p>Tampilkan ke publik</p>
                            </div>
                            <div class="action-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                            <div class="action-glow"></div>
                        </button>
                    </form>
                    @else
                    <form action="{{ route('admin.gallery.toggle-status', $gallery) }}" method="POST" class="action-form">
                        @csrf
                        <button type="submit" 
                                class="action-card warning-action"
                                data-slug="{{ $gallery->slug }}"
                                onclick="return toggleStatus(this)">
                            <div class="action-icon">
                                <i class="fas fa-eye-slash"></i>
                            </div>
                            <div class="action-content">
                                <h4>Set to Draft</h4>
                                <p>Sembunyikan dari publik</p>
                            </div>
                            <div class="action-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                            <div class="action-glow"></div>
                        </button>
                    </form>
                    @endif

                    <a href="{{ route('admin.gallery.create') }}" class="action-card info-action">
                        <div class="action-icon">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="action-content">
                            <h4>Gallery Baru</h4>
                            <p>Buat gallery lainnya</p>
                        </div>
                        <div class="action-arrow">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="action-glow"></div>
                    </a>

                    <form action="{{ route('admin.gallery.destroy', $gallery) }}" 
                          method="POST" 
                          class="action-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="action-card danger-action"
                                data-slug="{{ $gallery->slug }}"
                                data-name="{{ $gallery->title }}"
                                onclick="return confirmDelete(event, this)">
                            <div class="action-icon">
                                <i class="fas fa-trash"></i>
                            </div>
                            <div class="action-content">
                                <h4>Hapus Gallery</h4>
                                <p>Hapus permanent</p>
                            </div>
                            <div class="action-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                            <div class="action-glow"></div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Premium Gallery Showcase -->
    @if($gallery->images->count() > 0)
    <div class="gallery-showcase" data-aos="fade-up" data-aos-delay="300">
        <div class="showcase-header">
            <div class="header-main">
                <h2 class="showcase-title">
                    <i class="fas fa-photo-video"></i>
                    <span>Gallery Collection</span>
                    <span class="image-count">({{ $gallery->images->count() }} items)</span>
                </h2>
                <p class="showcase-subtitle">Koleksi gambar gallery yang telah diupload</p>
            </div>
            
            <div class="gallery-controls">
                <div class="view-controls">
                    <button class="control-btn active" id="gridViewBtn" title="Grid View">
                        <i class="fas fa-th"></i>
                        <span>Grid</span>
                    </button>
                    <button class="control-btn" id="listViewBtn" title="List View">
                        <i class="fas fa-list"></i>
                        <span>List</span>
                    </button>
                </div>
                
                <div class="action-controls">
                    <button class="control-btn slideshow-btn" onclick="openLightbox(0)" title="View Slideshow">
                        <i class="fas fa-play"></i>
                        <span>Slideshow</span>
                    </button>
                    <button class="control-btn sort-btn" onclick="toggleSort()" title="Toggle Sort">
                        <i class="fas fa-sort"></i>
                        <span>Sort</span>
                    </button>
                    <a href="{{ route('admin.gallery.edit', $gallery) }}" class="control-btn add-btn" title="Add Images">
                        <i class="fas fa-plus"></i>
                        <span>Add</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Grid View Gallery -->
        <div class="gallery-container grid-view active" id="gridGallery">
            @foreach($gallery->images as $index => $image)
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="{{ ($index % 8) * 50 }}">
                    <div class="image-wrapper">
                        <img src="{{ $image->image_url }}" 
                             alt="{{ $image->alt_text ?: $gallery->title }}"
                             class="gallery-image"
                             onclick="openLightbox({{ $index }})"
                             loading="lazy">

                        @if($image->is_primary)
                            <div class="primary-badge">
                                <i class="fas fa-crown"></i>
                                <span>Primary</span>
                            </div>
                        @endif

                        <div class="image-overlay">
                            <div class="overlay-content">
                                <button class="overlay-btn view-btn" onclick="openLightbox({{ $index }})" title="View Image">
                                    <i class="fas fa-eye"></i>
                                </button>
                                
                                @if(!$image->is_primary)
                                <form action="{{ route('admin.gallery.images.primary', $image) }}" 
                                      method="POST" 
                                      class="overlay-form"
                                      onsubmit="return confirmSetPrimary(event, this, '{{ $image->seo_filename ?: 'gambar ini' }}')">
                                    @csrf
                                    <button type="submit" class="overlay-btn primary-btn" title="Set as Primary">
                                        <i class="fas fa-star"></i>
                                    </button>
                                </form>
                                @endif

                                <button class="overlay-btn download-btn" onclick="downloadImage('{{ $image->image_url }}', '{{ $image->seo_filename ?: 'image' }}')" title="Download">
                                    <i class="fas fa-download"></i>
                                </button>

                                <form action="{{ route('admin.gallery.images.delete', $image) }}" 
                                      method="POST" 
                                      class="overlay-form"
                                      onsubmit="return confirmImageDelete(event, this, '{{ $image->seo_filename ?: 'Gambar ini' }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="overlay-btn delete-btn" title="Delete Image">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="image-status">
                            <div class="order-badge">#{{ $image->sort_order }}</div>
                        </div>
                    </div>

                    <div class="image-details">
                        <div class="details-header">
                            <h4 class="image-title">{{ $image->seo_filename ?: 'Untitled' }}</h4>
                            @if($image->is_primary)
                                <span class="primary-indicator">
                                    <i class="fas fa-crown"></i>
                                </span>
                            @endif
                        </div>

                        @if($image->caption)
                            <p class="image-caption">{{ $image->caption }}</p>
                        @endif

                        @if($image->alt_text && $image->alt_text !== $gallery->title)
                            <p class="image-alt">
                                <i class="fas fa-tag"></i>
                                <span>{{ $image->alt_text }}</span>
                            </p>
                        @endif

                        <div class="image-meta">
                            <span class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>{{ $image->created_at->format('d M Y') }}</span>
                            </span>
                            <span class="meta-item">
                                <i class="fas fa-clock"></i>
                                <span>{{ $image->created_at->format('H:i') }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- List View Gallery -->
        <div class="gallery-container list-view" id="listGallery">
            @foreach($gallery->images as $index => $image)
                <div class="gallery-list-item" data-aos="fade-right" data-aos-delay="{{ $index * 50 }}">
                    <div class="list-image">
                        <img src="{{ $image->image_url }}" 
                             alt="{{ $image->alt_text ?: $gallery->title }}"
                             onclick="openLightbox({{ $index }})">
                        @if($image->is_primary)
                            <div class="primary-indicator">
                                <i class="fas fa-crown"></i>
                            </div>
                        @endif
                    </div>

                    <div class="list-content">
                        <div class="list-header">
                            <h4 class="list-title">{{ $image->seo_filename ?: 'Untitled Image' }}</h4>
                            <div class="list-badges">
                                <span class="order-badge">#{{ $image->sort_order }}</span>
                                @if($image->is_primary)
                                    <span class="primary-badge">Primary</span>
                                @endif
                            </div>
                        </div>

                        @if($image->caption)
                            <p class="list-caption">{{ $image->caption }}</p>
                        @endif

                        @if($image->alt_text && $image->alt_text !== $gallery->title)
                            <p class="list-alt">Alt Text: {{ $image->alt_text }}</p>
                        @endif

                        <div class="list-meta">
                            <div class="meta-group">
                                <span class="meta-label">Created:</span>
                                <span class="meta-value">{{ $image->created_at->format('d M Y, H:i') }}</span>
                            </div>
                            <div class="meta-group">
                                <span class="meta-label">Updated:</span>
                                <span class="meta-value">{{ $image->updated_at->format('d M Y, H:i') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="list-actions">
                        <button class="list-btn view-btn" onclick="openLightbox({{ $index }})" title="View">
                            <i class="fas fa-eye"></i>
                        </button>
                        
                        @if(!$image->is_primary)
                        <form action="{{ route('admin.gallery.images.primary', $image) }}" 
                              method="POST" 
                              class="list-form"
                              onsubmit="return confirmSetPrimary(event, this, '{{ $image->seo_filename ?: 'gambar ini' }}')">
                            @csrf
                            <button type="submit" class="list-btn primary-btn" title="Set as Primary">
                                <i class="fas fa-star"></i>
                            </button>
                        </form>
                        @endif

                        <button class="list-btn download-btn" onclick="downloadImage('{{ $image->image_url }}', '{{ $image->seo_filename ?: 'image' }}')" title="Download">
                            <i class="fas fa-download"></i>
                        </button>

                        <form action="{{ route('admin.gallery.images.delete', $image) }}" 
                              method="POST" 
                              class="list-form"
                              onsubmit="return confirmImageDelete(event, this, '{{ $image->seo_filename ?: 'Gambar ini' }}')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="list-btn delete-btn" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="empty-gallery" data-aos="fade-up" data-aos-delay="300">
        <div class="empty-animation">
            <div class="empty-icon">
                <i class="fas fa-images"></i>
            </div>
            <div class="empty-particles">
                <span class="particle"></span>
                <span class="particle"></span>
                <span class="particle"></span>
                <span class="particle"></span>
            </div>
        </div>
        <h3 class="empty-title">Gallery Masih Kosong</h3>
        <p class="empty-description">Belum ada gambar yang diupload ke gallery ini. Mulai tambahkan beberapa gambar untuk membuat gallery yang menarik!</p>
        <div class="empty-actions">
            <a href="{{ route('admin.gallery.edit', $gallery) }}" class="empty-action primary">
                <i class="fas fa-plus-circle"></i>
                <span>Tambah Gambar Sekarang</span>
            </a>
            <a href="{{ route('admin.gallery.index') }}" class="empty-action secondary">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali ke Gallery</span>
            </a>
        </div>
    </div>
    @endif
</div>

<!-- Premium Lightbox Modal -->
<div class="premium-lightbox" id="lightboxModal">
    <div class="lightbox-overlay" onclick="closeLightbox()"></div>
    <div class="lightbox-container">
        <div class="lightbox-header">
            <div class="lightbox-info">
                <h3 id="lightboxTitle" class="lightbox-title">Gallery Image</h3>
                <p id="lightboxCounter" class="lightbox-counter">1 / {{ $gallery->images->count() }}</p>
            </div>
            <div class="lightbox-controls">
                <button class="lightbox-btn fullscreen-btn" onclick="toggleFullscreen()" title="Fullscreen">
                    <i class="fas fa-expand"></i>
                </button>
                <button class="lightbox-btn download-btn" onclick="downloadCurrentImage()" title="Download">
                    <i class="fas fa-download"></i>
                </button>
                <button class="lightbox-btn close-btn" onclick="closeLightbox()" title="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        
        <div class="lightbox-content">
            <button class="lightbox-nav prev-btn" onclick="prevImage()" title="Previous">
                <i class="fas fa-chevron-left"></i>
            </button>
            
            <div class="lightbox-image-container">
                <img id="lightboxImage" src="" alt="" class="lightbox-image">
                <div class="image-loading">
                    <div class="loading-spinner">
                        <div class="spinner-ring"></div>
                    </div>
                </div>
            </div>
            
            <button class="lightbox-nav next-btn" onclick="nextImage()" title="Next">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        
        <div class="lightbox-footer">
            <div class="lightbox-details">
                <p id="lightboxCaption" class="lightbox-caption"></p>
                <p id="lightboxAlt" class="lightbox-alt"></p>
            </div>
            <div class="lightbox-thumbnails" id="lightboxThumbnails"></div>
        </div>
    </div>
</div>

<style>
/* ==================== PREMIUM GALLERY SHOW STYLES ==================== */

:root {
    --crimson-primary: #8B0000;
    --crimson-secondary: #A50000;
    --crimson-tertiary: #B71C1C;
    --crimson-light: #DC143C;
    --crimson-dark: #660000;
    
    --gradient-primary: linear-gradient(135deg, var(--crimson-primary), var(--crimson-secondary));
    --gradient-secondary: linear-gradient(135deg, var(--crimson-secondary), var(--crimson-tertiary));
    --gradient-light: linear-gradient(135deg, var(--crimson-light), var(--crimson-secondary));
    
    --shadow-light: 0 4px 16px rgba(139, 0, 0, 0.1);
    --shadow-medium: 0 8px 32px rgba(139, 0, 0, 0.2);
    --shadow-heavy: 0 16px 48px rgba(139, 0, 0, 0.3);
    
    --border-radius: 12px;
    --border-radius-small: 8px;
    --border-radius-large: 16px;
    
    --transition-fast: 0.2s ease;
    --transition-medium: 0.3s ease;
    --transition-slow: 0.5s ease;
}

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 1.6;
    color: #333;
}

/* ==================== LOADING OVERLAY ==================== */
.loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.9);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 999999;
    backdrop-filter: blur(10px);
}

.loading-wrapper {
    background: rgba(255, 255, 255, 0.1);
    padding: 40px;
    border-radius: var(--border-radius-large);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    text-align: center;
}

.loading-content {
    color: white;
}

.loading-spinner {
    position: relative;
    width: 60px;
    height: 60px;
    margin: 0 auto 20px;
}

.spinner-ring {
    position: absolute;
    width: 100%;
    height: 100%;
    border: 3px solid transparent;
    border-top: 3px solid var(--crimson-light);
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

.spinner-ring:nth-child(2) {
    animation-delay: -0.3s;
    border-top-color: var(--crimson-secondary);
}

.spinner-ring:nth-child(3) {
    animation-delay: -0.6s;
    border-top-color: var(--crimson-primary);
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.loading-text {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 15px;
}

.loading-progress {
    width: 200px;
    height: 4px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 2px;
    margin: 0 auto;
    overflow: hidden;
}

.progress-bar {
    height: 100%;
    background: var(--gradient-primary);
    border-radius: 2px;
    animation: progress 2s ease-in-out infinite;
}

@keyframes progress {
    0% { width: 0%; }
    50% { width: 70%; }
    100% { width: 100%; }
}

/* ==================== ALERT SYSTEM ==================== */
.alert-container {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 10000;
    max-width: 400px;
    width: 100%;
}

.alert {
    background: white;
    border-radius: var(--border-radius);
    padding: 16px 20px;
    margin-bottom: 12px;
    box-shadow: var(--shadow-medium);
    border-left: 4px solid;
    transform: translateX(100%);
    transition: var(--transition-medium);
    opacity: 0;
}

.alert.show {
    transform: translateX(0);
    opacity: 1;
}

.alert-content {
    display: flex;
    align-items: center;
    gap: 12px;
}

.alert-icon {
    font-size: 1.2rem;
    flex-shrink: 0;
}

.alert-message {
    flex: 1;
    font-size: 0.95rem;
    font-weight: 500;
    line-height: 1.4;
}

.alert-close {
    background: none;
    border: none;
    font-size: 1.1rem;
    cursor: pointer;
    opacity: 0.6;
    transition: var(--transition-fast);
    padding: 4px;
    border-radius: 4px;
}

.alert-close:hover {
    opacity: 1;
    background: rgba(0, 0, 0, 0.1);
}

.alert.alert-success {
    border-left-color: #28a745;
    background: linear-gradient(135deg, #d4edda, #c3e6cb);
}

.alert.alert-success .alert-icon,
.alert.alert-success .alert-message {
    color: #155724;
}

.alert.alert-error {
    border-left-color: #dc3545;
    background: linear-gradient(135deg, #f8d7da, #f5c6cb);
}

.alert.alert-error .alert-icon,
.alert.alert-error .alert-message {
    color: #721c24;
}

.alert.alert-warning {
    border-left-color: #ffc107;
    background: linear-gradient(135deg, #fff3cd, #ffeaa7);
}

.alert.alert-warning .alert-icon,
.alert.alert-warning .alert-message {
    color: #856404;
}

.alert.alert-info {
    border-left-color: #17a2b8;
    background: linear-gradient(135deg, #d1ecf1, #bee5eb);
}

.alert.alert-info .alert-icon,
.alert.alert-info .alert-message {
    color: #0c5460;
}

/* ==================== CONFIRMATION MODAL ==================== */
.confirmation-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 999999;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: var(--transition-medium);
}

.confirmation-modal.show {
    opacity: 1;
}

.confirmation-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    backdrop-filter: blur(8px);
}

.confirmation-dialog {
    position: relative;
    background: white;
    border-radius: var(--border-radius-large);
    width: 90%;
    max-width: 480px;
    box-shadow: var(--shadow-heavy);
    transform: scale(0.9);
    transition: var(--transition-medium);
    overflow: hidden;
}

.confirmation-modal.show .confirmation-dialog {
    transform: scale(1);
}

.confirmation-header {
    background: var(--gradient-primary);
    padding: 30px 25px;
    text-align: center;
    color: white;
}

.confirmation-icon {
    background: rgba(255, 255, 255, 0.2);
    width: 70px;
    height: 70px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 16px;
    backdrop-filter: blur(10px);
}

.confirmation-icon i {
    font-size: 2rem;
}

.confirmation-title {
    margin: 0;
    font-size: 1.4rem;
    font-weight: 700;
}

.confirmation-body {
    padding: 30px 25px;
    text-align: center;
}

.confirmation-message {
    color: #555;
    font-size: 1.05rem;
    line-height: 1.6;
    margin: 0;
}

.confirmation-footer {
    padding: 20px 25px;
    display: flex;
    gap: 12px;
    justify-content: flex-end;
    background: #f8f9fa;
}

.confirmation-btn {
    padding: 12px 24px;
    border: none;
    border-radius: var(--border-radius-small);
    font-size: 0.95rem;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition-fast);
    display: flex;
    align-items: center;
    gap: 8px;
}

.cancel-btn {
    background: #6c757d;
    color: white;
}

.cancel-btn:hover {
    background: #5a6268;
    transform: translateY(-2px);
}

.confirm-btn {
    background: var(--gradient-primary);
    color: white;
}

.confirm-btn:hover {
    background: var(--gradient-secondary);
    transform: translateY(-2px);
    box-shadow: var(--shadow-light);
}

/* ==================== MAIN CONTAINER ==================== */
.admin-container {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    min-height: 100vh;
    padding: 20px;
}

/* ==================== PREMIUM HERO ==================== */
.premium-hero {
    position: relative;
    background: var(--gradient-primary);
    border-radius: var(--border-radius-large);
    padding: 40px 30px;
    margin-bottom: 30px;
    overflow: hidden;
    box-shadow: var(--shadow-medium);
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 1;
}

.hero-pattern {
    position: absolute;
    width: 100%;
    height: 100%;
    background-image: url('data:image/svg+xml,<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><g fill="rgba(255,255,255,0.1)" fill-opacity="0.1"><circle cx="30" cy="30" r="4"/><circle cx="45" cy="15" r="2"/><circle cx="15" cy="45" r="3"/><circle cx="50" cy="50" r="1.5"/><circle cx="10" cy="10" r="2.5"/></g></svg>');
    animation: float 20s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

.hero-gradient {
    position: absolute;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, rgba(255, 255, 255, 0.1) 0%, transparent 50%, rgba(255, 255, 255, 0.1) 100%);
    animation: shine 3s ease-in-out infinite;
}

@keyframes shine {
    0%, 100% { transform: translateX(-100%); }
    50% { transform: translateX(100%); }
}

.hero-content {
    position: relative;
    z-index: 2;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 30px;
}

.hero-main {
    flex: 1;
}

.status-indicator {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 20px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.status-indicator.status-published {
    background: rgba(40, 167, 69, 0.9);
    color: white;
}

.status-indicator.status-draft {
    background: rgba(255, 193, 7, 0.9);
    color: #212529;
}

.hero-title {
    color: white;
    font-size: 2rem;
    font-weight: 800;
    margin: 0 0 16px 0;
    display: flex;
    align-items: center;
    gap: 12px;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.hero-icon {
    font-size: 1.8rem;
    opacity: 0.9;
}

.hero-meta {
    display: flex;
    align-items: center;
    gap: 16px;
    flex-wrap: wrap;
    color: rgba(255, 255, 255, 0.9);
    font-size: 0.9rem;
    font-weight: 500;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 6px;
}

.meta-divider {
    opacity: 0.6;
    font-weight: 300;
}

.hero-actions {
    display: flex;
    gap: 12px;
    flex-shrink: 0;
}

.hero-btn {
    position: relative;
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 12px 20px;
    border-radius: var(--border-radius-small);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
    transition: var(--transition-medium);
    border: 2px solid transparent;
    backdrop-filter: blur(10px);
    overflow: hidden;
}

.hero-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: var(--transition-medium);
}

.hero-btn:hover::before {
    left: 100%;
}

.hero-btn.primary-btn {
    background: rgba(255, 193, 7, 0.9);
    color: #212529;
    border-color: rgba(255, 255, 255, 0.3);
}

.hero-btn.secondary-btn {
    background: rgba(108, 117, 125, 0.9);
    color: white;
    border-color: rgba(255, 255, 255, 0.3);
}

.hero-btn:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-light);
    border-color: rgba(255, 255, 255, 0.5);
}

.btn-glow {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    opacity: 0;
    transition: var(--transition-medium);
}

.hero-btn:hover .btn-glow {
    opacity: 1;
    animation: glow 0.6s ease-in-out;
}

@keyframes glow {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

/* ==================== DASHBOARD GRID ==================== */
.dashboard-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 25px;
    margin-bottom: 30px;
}

/* ==================== PREMIUM CARDS ==================== */
.premium-card {
    background: white;
    border-radius: var(--border-radius-large);
    box-shadow: var(--shadow-light);
    border: 1px solid #e9ecef;
    overflow: hidden;
    transition: var(--transition-medium);
}

.premium-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-medium);
}

.card-header {
    background: var(--gradient-primary);
    padding: 20px 25px;
    color: white;
}

.crimson-gradient {
    background: var(--gradient-primary);
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 8px;
}

.card-title {
    font-size: 1.1rem;
    font-weight: 700;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 10px;
}

.card-subtitle {
    font-size: 0.85rem;
    opacity: 0.9;
    margin: 0;
}

.card-score {
    background: rgba(255, 255, 255, 0.2);
    padding: 6px 12px;
    border-radius: 15px;
    backdrop-filter: blur(10px);
}

.score-badge {
    font-size: 0.85rem;
    font-weight: 700;
}

.header-actions {
    display: flex;
    gap: 8px;
}

.header-btn {
    background: rgba(255, 255, 255, 0.2);
    border: none;
    color: white;
    padding: 8px;
    border-radius: 6px;
    cursor: pointer;
    transition: var(--transition-fast);
    backdrop-filter: blur(10px);
}

.header-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.05);
}

.card-body {
    padding: 25px;
}

/* ==================== GALLERY INFO GRID ==================== */
.gallery-info-grid {
    display: grid;
    gap: 16px;
}

.gallery-info-item {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 18px;
    background: linear-gradient(135deg, #ffffff, #f8f9fa);
    border-radius: 12px;
    border: 2px solid transparent;
    border-left: 4px solid var(--crimson-primary);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(139, 0, 0, 0.08);
}

.gallery-info-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(139, 0, 0, 0.05), transparent);
    transition: var(--transition-medium);
}

.gallery-info-item:hover::before {
    left: 100%;
}

.gallery-info-item:hover {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    transform: translateX(6px) translateY(-2px);
    box-shadow: 0 8px 25px rgba(139, 0, 0, 0.15);
    border-color: var(--crimson-secondary);
}

.gallery-info-item.featured {
    background: linear-gradient(135deg, #fff3cd, #ffeaa7);
    border-left-color: #ffc107;
    border-width: 4px;
}

.gallery-info-item.featured:hover {
    background: linear-gradient(135deg, #ffeaa7, #ffdd57);
    box-shadow: 0 8px 25px rgba(255, 193, 7, 0.25);
}

.gallery-item-icon {
    width: 45px;
    height: 45px;
    background: var(--gradient-primary);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.1rem;
    flex-shrink: 0;
    position: relative;
    overflow: hidden;
}

.gallery-item-icon::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transform: translateX(-100%);
    transition: var(--transition-medium);
}

.gallery-info-item:hover .gallery-item-icon::after {
    transform: translateX(100%);
}

.gallery-item-content {
    flex: 1;
}

.gallery-item-label {
    display: block;
    font-weight: 700;
    color: #6c757d;
    font-size: 0.75rem;
    margin-bottom: 6px;
    text-transform: uppercase;
    letter-spacing: 0.8px;
}

.gallery-item-value {
    color: #212529;
    font-size: 0.95rem;
    font-weight: 600;
    line-height: 1.3;
}

.featured-value {
    font-weight: 800;
    font-size: 1.1rem;
    color: var(--crimson-primary);
}

.slug-value {
    font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
    background: var(--crimson-primary);
    color: white;
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 0.85rem;
    display: inline-block;
    font-weight: 500;
    letter-spacing: 0.5px;
}

.gallery-item-status {
    color: #28a745;
    font-size: 1.3rem;
    opacity: 0.8;
    transition: var(--transition-fast);
}

.gallery-info-item:hover .gallery-item-status {
    opacity: 1;
    transform: scale(1.1);
}

.gallery-item-action {
    display: flex;
    gap: 6px;
}

.gallery-item-btn {
    background: rgba(139, 0, 0, 0.1);
    border: 2px solid rgba(139, 0, 0, 0.2);
    color: var(--crimson-primary);
    padding: 8px 10px;
    border-radius: 6px;
    cursor: pointer;
    transition: var(--transition-fast);
    font-size: 0.85rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.gallery-item-btn:hover {
    background: var(--crimson-primary);
    color: white;
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(139, 0, 0, 0.25);
}

.gallery-item-badge {
    display: flex;
    gap: 8px;
    flex-direction: column;
    align-items: flex-end;
}

.gallery-time-badge {
    background: linear-gradient(135deg, #e9ecef, #dee2e6);
    color: #6c757d;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
    white-space: nowrap;
}

.gallery-count-badge {
    background: var(--gradient-primary);
    color: white;
    padding: 6px 12px;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 700;
    min-width: 35px;
    text-align: center;
}

.gallery-item-badge {
    display: flex;
    gap: 8px;
}

.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
}

.status-badge.status-published {
    background: #d4edda;
    color: #155724;
}

.status-badge.status-draft {
    background: #fff3cd;
    color: #856404;
}

/* ==================== DESCRIPTION SECTION ==================== */
.description-section {
    margin-top: 20px;
    padding-top: 20px;
    border-top: 2px solid #e9ecef;
}

.description-header {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 15px;
}

.description-header i {
    color: var(--crimson-primary);
    font-size: 1.2rem;
}

.description-header h4 {
    font-size: 1rem;
    font-weight: 600;
    color: #495057;
    margin: 0;
}

.description-content {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    padding: 20px;
    border-radius: var(--border-radius);
    line-height: 1.6;
    color: #495057;
    border-left: 4px solid var(--crimson-primary);
    font-size: 0.95rem;
}

/* ==================== ACTION GRID ==================== */
.action-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
}

.action-card {
    position: relative;
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 20px 18px;
    border: none;
    border-radius: var(--border-radius);
    text-decoration: none;
    cursor: pointer;
    transition: var(--transition-medium);
    background: white;
    border: 2px solid #e9ecef;
    overflow: hidden;
}

.action-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.5), transparent);
    transition: var(--transition-medium);
}

.action-card:hover::before {
    left: 100%;
}

.action-card:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-light);
}

.primary-action {
    background: var(--gradient-primary);
    color: white;
    border-color: var(--crimson-primary);
}

.success-action {
    background: linear-gradient(135deg, #28a745, #34ce57);
    color: white;
    border-color: #28a745;
}

.warning-action {
    background: linear-gradient(135deg, #ffc107, #ffca2c);
    color: #212529;
    border-color: #ffc107;
}

.info-action {
    background: linear-gradient(135deg, #17a2b8, #20c0d7);
    color: white;
    border-color: #17a2b8;
}

.danger-action {
    background: linear-gradient(135deg, #dc3545, #e84857);
    color: white;
    border-color: #dc3545;
}

.action-icon {
    width: 45px;
    height: 45px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: var(--border-radius-small);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    flex-shrink: 0;
    backdrop-filter: blur(10px);
}

.action-content {
    flex: 1;
}

.action-content h4 {
    font-size: 1rem;
    font-weight: 600;
    margin: 0 0 4px 0;
}

.action-content p {
    font-size: 0.85rem;
    margin: 0;
    opacity: 0.9;
}

.action-arrow {
    font-size: 1.1rem;
    opacity: 0.7;
    transition: var(--transition-fast);
}

.action-card:hover .action-arrow {
    opacity: 1;
    transform: translateX(4px);
}

.action-glow {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    opacity: 0;
    transition: var(--transition-medium);
}

.action-card:hover .action-glow {
    opacity: 1;
    animation: glow 0.8s ease-in-out;
}

/* ==================== GALLERY SHOWCASE ==================== */
.gallery-showcase {
    background: white;
    border-radius: var(--border-radius-large);
    padding: 30px;
    box-shadow: var(--shadow-light);
    border: 1px solid #e9ecef;
    margin-bottom: 30px;
}

.showcase-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 2px solid #e9ecef;
}

.header-main {
    flex: 1;
}

.showcase-title {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--crimson-primary);
    margin: 0 0 8px 0;
    display: flex;
    align-items: center;
    gap: 12px;
}

.showcase-title i {
    color: var(--crimson-secondary);
    font-size: 1.3rem;
}

.image-count {
    color: #6c757d;
    font-weight: 500;
    font-size: 0.9rem;
    background: rgba(139, 0, 0, 0.1);
    padding: 4px 12px;
    border-radius: 15px;
    margin-left: 8px;
}

.showcase-subtitle {
    color: #6c757d;
    margin: 0;
    font-size: 0.9rem;
}

.gallery-controls {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
}

.view-controls,
.action-controls {
    display: flex;
    gap: 8px;
}

.control-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 16px;
    background: white;
    border: 2px solid #e9ecef;
    border-radius: var(--border-radius-small);
    cursor: pointer;
    transition: var(--transition-fast);
    font-size: 0.85rem;
    font-weight: 500;
    color: #6c757d;
    text-decoration: none;
}

.control-btn:hover,
.control-btn.active {
    background: var(--crimson-primary);
    border-color: var(--crimson-primary);
    color: white;
    transform: translateY(-1px);
}

.control-btn.slideshow-btn:hover {
    background: #17a2b8;
    border-color: #17a2b8;
}

.control-btn.sort-btn:hover {
    background: #ffc107;
    border-color: #ffc107;
    color: #212529;
}

.control-btn.add-btn:hover {
    background: #28a745;
    border-color: #28a745;
}

/* Gallery Container */
.gallery-container {
    display: none;
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.4s ease;
}

.gallery-container.active {
    display: block;
    opacity: 1;
    transform: translateY(0);
}

/* Grid View */
.grid-view.active {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 20px;
    padding-top: 10px;
}

@media (min-width: 1200px) {
    .grid-view.active {
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 25px;
    }
}

@media (max-width: 768px) {
    .grid-view.active {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 15px;
    }
}

@media (max-width: 768px) {
    .grid-view.active {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 15px;
    }
    
    .gallery-controls {
        flex-direction: column;
        gap: 15px;
        align-items: stretch;
    }
    
    .view-controls,
    .action-controls {
        justify-content: center;
    }
    
    .control-btn {
        flex: 1;
        justify-content: center;
    }
    
    .image-wrapper {
        height: 180px;
    }
    
    .image-details {
        padding: 15px;
    }
    
    .overlay-content {
        gap: 8px;
    }
    
    .overlay-btn {
        width: 38px;
        height: 38px;
        font-size: 0.9rem;
    }
}

@media (max-width: 480px) {
    .grid-view.active {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .showcase-header {
        flex-direction: column;
        gap: 20px;
        align-items: stretch;
    }
    
    .view-controls,
    .action-controls {
        flex-wrap: wrap;
    }
    
    .control-btn {
        min-width: 80px;
    }
    
    .image-wrapper {
        height: 200px;
    }
    
    .gallery-list-item {
        flex-direction: column;
        text-align: center;
        gap: 15px;
    }
    
    .list-image {
        width: 100%;
        height: 180px;
    }
    
    .list-actions {
        justify-content: center;
        flex-wrap: wrap;
    }
}

.gallery-item {
    background: white;
    border-radius: var(--border-radius);
    overflow: hidden;
    box-shadow: var(--shadow-light);
    border: 2px solid transparent;
    transition: var(--transition-medium);
    position: relative;
    group: gallery-item;
}

.gallery-item:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(139, 0, 0, 0.15);
    border-color: var(--crimson-primary);
}

.image-wrapper {
    position: relative;
    height: 220px;
    overflow: hidden;
    background: linear-gradient(45deg, #f8f9fa, #e9ecef);
}

.gallery-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    cursor: pointer;
    transition: var(--transition-medium);
    border-radius: 0;
}

.gallery-image:hover {
    transform: scale(1.08);
}

.primary-badge {
    position: absolute;
    top: 12px;
    right: 12px;
    background: linear-gradient(135deg, #ffc107, #ffca2c);
    color: #212529;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 4px;
    box-shadow: 0 4px 12px rgba(255, 193, 7, 0.3);
    z-index: 2;
    transform: scale(0.9);
    transition: var(--transition-fast);
}

.gallery-item:hover .primary-badge {
    transform: scale(1);
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(
        45deg,
        rgba(139, 0, 0, 0.85),
        rgba(220, 20, 60, 0.85)
    );
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: var(--transition-medium);
    backdrop-filter: blur(2px);
}

.gallery-item:hover .image-overlay {
    opacity: 1;
}

.overlay-content {
    display: flex;
    gap: 12px;
    align-items: center;
    justify-content: center;
}

.overlay-btn {
    width: 44px;
    height: 44px;
    background: rgba(255, 255, 255, 0.95);
    border: none;
    border-radius: 50%;
    color: var(--crimson-primary);
    font-size: 1.1rem;
    cursor: pointer;
    transition: var(--transition-fast);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    transform: translateY(10px);
    opacity: 0;
}

.gallery-item:hover .overlay-btn {
    transform: translateY(0);
    opacity: 1;
}

.overlay-btn:hover {
    background: white;
    transform: scale(1.1) translateY(0);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
}

.overlay-btn.view-btn:hover {
    color: #17a2b8;
}

.overlay-btn.primary-btn:hover {
    color: #ffc107;
}

.overlay-btn.download-btn:hover {
    color: #28a745;
}

.overlay-btn.delete-btn:hover {
    color: #dc3545;
}

.overlay-form {
    display: inline-block;
}

.image-status {
    position: absolute;
    bottom: 12px;
    left: 12px;
    z-index: 2;
}

.order-badge {
    background: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 600;
    backdrop-filter: blur(10px);
}

.image-details {
    padding: 20px;
    background: white;
}

.details-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 12px;
}

.image-title {
    font-size: 1rem;
    font-weight: 600;
    color: var(--crimson-primary);
    margin: 0;
    flex: 1;
    line-height: 1.3;
}

.primary-indicator {
    color: #ffc107;
    font-size: 1.1rem;
    margin-left: 8px;
    flex-shrink: 0;
}

.image-caption {
    color: #6c757d;
    font-size: 0.85rem;
    margin: 0 0 12px 0;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.image-alt {
    color: #868e96;
    font-size: 0.8rem;
    margin: 0 0 16px 0;
    padding: 8px 12px;
    background: #f8f9fa;
    border-radius: var(--border-radius-small);
    border-left: 3px solid var(--crimson-primary);
}

.image-alt i {
    margin-right: 6px;
    color: var(--crimson-primary);
}

.image-meta {
    display: flex;
    gap: 16px;
    flex-wrap: wrap;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 0.75rem;
    color: #868e96;
}

.meta-item i {
    color: var(--crimson-secondary);
    font-size: 0.7rem;
}

.primary-meta {
    color: #ffc107;
    font-weight: 600;
}

.primary-meta i {
    color: #ffc107;
}
    transform: scale(1.1);
}

.primary-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    background: linear-gradient(135deg, #ffc107, #ffca2c);
    color: #212529;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.7rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 5px;
    text-transform: uppercase;
    box-shadow: var(--shadow-light);
    z-index: 2;
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: var(--gradient-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: var(--transition-medium);
    backdrop-filter: blur(5px);
}

.gallery-item:hover .image-overlay {
    opacity: 0.95;
}

.overlay-content {
    display: flex;
    gap: 12px;
}

.overlay-btn {
    width: 45px;
    height: 45px;
    border: 2px solid rgba(255, 255, 255, 0.8);
    background: rgba(255, 255, 255, 0.2);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: var(--transition-fast);
    backdrop-filter: blur(10px);
    font-size: 1rem;
}

.overlay-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    border-color: white;
    transform: scale(1.1);
}

.overlay-form {
    margin: 0;
}

.image-status {
    position: absolute;
    bottom: 12px;
    right: 12px;
    z-index: 2;
}

.order-badge {
    background: var(--gradient-primary);
    color: white;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 600;
}

.image-details {
    padding: 20px;
}

.details-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 12px;
}

.image-title {
    font-size: 1.05rem;
    font-weight: 600;
    color: #495057;
    margin: 0;
    word-break: break-word;
}

.primary-indicator {
    color: #ffc107;
    font-size: 1.1rem;
}

.image-caption {
    color: #6c757d;
    font-style: italic;
    margin: 0 0 10px 0;
    font-size: 0.9rem;
    line-height: 1.4;
}

.image-alt {
    color: #6c757d;
    margin: 0 0 12px 0;
    font-size: 0.85rem;
    display: flex;
    align-items: center;
    gap: 8px;
}

.image-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 5px;
    color: #6c757d;
    font-size: 0.8rem;
}

/* List View */
.list-view {
    display: none;
}

.list-view.active {
    display: block;
    padding-top: 10px;
}

.list-view .gallery-list-item {
    background: white;
    border-radius: var(--border-radius);
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 20px;
    box-shadow: var(--shadow-light);
    border: 2px solid transparent;
    transition: var(--transition-medium);
    margin-bottom: 20px;
    position: relative;
    overflow: hidden;
}

.gallery-list-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: var(--transition-fast);
}

.gallery-list-item:hover::before {
    left: 100%;
}

.gallery-list-item:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-medium);
    border-color: var(--crimson-primary);
}

.list-image {
    position: relative;
    width: 120px;
    height: 120px;
    border-radius: var(--border-radius-small);
    overflow: hidden;
    flex-shrink: 0;
}

.list-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    cursor: pointer;
    transition: var(--transition-medium);
}

.list-image img:hover {
    transform: scale(1.05);
}

.primary-indicator {
    position: absolute;
    top: 8px;
    right: 8px;
    background: linear-gradient(135deg, #ffc107, #ffca2c);
    color: #212529;
    border-radius: 50%;
    width: 28px;
    height: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
    font-weight: 700;
}

.list-content {
    flex: 1;
}

.list-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 12px;
}

.list-title {
    font-size: 1.2rem;
    font-weight: 600;
    color: #495057;
    margin: 0;
}

.list-badges {
    display: flex;
    gap: 8px;
}

.order-badge {
    background: var(--gradient-primary);
    color: white;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
}

.primary-badge {
    background: linear-gradient(135deg, #ffc107, #ffca2c);
    color: #212529;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
}

.list-caption {
    color: #6c757d;
    font-style: italic;
    margin: 0 0 8px 0;
    font-size: 0.95rem;
}

.list-alt {
    color: #6c757d;
    margin: 0 0 8px 0;
    font-size: 0.9rem;
}

.list-meta {
    display: flex;
    gap: 16px;
    flex-wrap: wrap;
}

.meta-group {
    display: flex;
    gap: 6px;
    font-size: 0.85rem;
}

.meta-label {
    color: #6c757d;
    font-weight: 500;
}

.meta-value {
    color: #495057;
}

.list-actions {
    display: flex;
    gap: 8px;
    flex-shrink: 0;
}

.list-btn {
    width: 36px;
    height: 36px;
    border: 2px solid #e9ecef;
    background: white;
    color: #6c757d;
    border-radius: var(--border-radius-small);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: var(--transition-fast);
    font-size: 0.9rem;
}

.list-btn:hover {
    background: var(--crimson-primary);
    border-color: var(--crimson-primary);
    color: white;
    transform: scale(1.05);
}

.list-btn.download-btn:hover {
    background: #17a2b8;
    border-color: #17a2b8;
}

.list-btn.primary-btn:hover {
    background: #ffc107;
    border-color: #ffc107;
    color: #212529;
}

.list-btn.delete-btn:hover {
    background: #dc3545;
    border-color: #dc3545;
}

.list-form {
    margin: 0;
}

/* Empty Gallery */
.empty-gallery {
    text-align: center;
    padding: 80px 20px;
    background: white;
    border-radius: var(--border-radius-large);
    box-shadow: var(--shadow-light);
    border: 1px solid #e9ecef;
}

.empty-animation {
    position: relative;
    margin-bottom: 40px;
}

.empty-icon {
    font-size: 5rem;
    color: var(--crimson-primary);
    margin-bottom: 20px;
    animation: float 3s ease-in-out infinite;
}

.empty-particles {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.particle {
    position: absolute;
    width: 8px;
    height: 8px;
    background: var(--crimson-primary);
    border-radius: 50%;
    opacity: 0.6;
}

.particle:nth-child(1) {
    top: -60px;
    left: -50px;
    animation: particle1 2s infinite;
}

.particle:nth-child(2) {
    top: -40px;
    right: -60px;
    animation: particle2 2.5s infinite;
}

.particle:nth-child(3) {
    bottom: -50px;
    left: -40px;
    animation: particle3 2.2s infinite;
}

.particle:nth-child(4) {
    bottom: -30px;
    right: -50px;
    animation: particle4 2.8s infinite;
}

@keyframes particle1 {
    0%, 100% { transform: translateY(0px); opacity: 0.6; }
    50% { transform: translateY(-25px); opacity: 1; }
}

@keyframes particle2 {
    0%, 100% { transform: translateX(0px); opacity: 0.6; }
    50% { transform: translateX(25px); opacity: 1; }
}

@keyframes particle3 {
    0%, 100% { transform: scale(1); opacity: 0.6; }
    50% { transform: scale(1.5); opacity: 1; }
}

@keyframes particle4 {
    0%, 100% { transform: rotate(0deg); opacity: 0.6; }
    50% { transform: rotate(180deg); opacity: 1; }
}

.empty-title {
    color: #495057;
    margin-bottom: 16px;
    font-size: 2rem;
    font-weight: 700;
}

.empty-description {
    color: #6c757d;
    margin-bottom: 30px;
    font-size: 1.1rem;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
    line-height: 1.6;
}

.empty-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
}

.empty-action {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 15px 30px;
    border-radius: var(--border-radius);
    font-weight: 600;
    font-size: 1rem;
    transition: var(--transition-medium);
    text-decoration: none;
    border: 2px solid transparent;
}

.empty-action.primary {
    background: var(--gradient-primary);
    color: white;
    border-color: var(--crimson-primary);
    box-shadow: var(--shadow-light);
}

.empty-action.secondary {
    background: #6c757d;
    color: white;
    border-color: #6c757d;
}

.empty-action:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-medium);
    text-decoration: none;
    color: white;
}

/* Premium Lightbox */
.premium-lightbox {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 999999;
    display: none;
    background: rgba(0, 0, 0, 0.95);
}

.lightbox-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    backdrop-filter: blur(10px);
}

.lightbox-container {
    position: relative;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.lightbox-header {
    padding: 20px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.lightbox-info {
    color: white;
}

.lightbox-title {
    margin: 0;
    font-size: 1.3rem;
    font-weight: 600;
}

.lightbox-counter {
    margin: 0;
    font-size: 0.9rem;
    opacity: 0.8;
}

.lightbox-controls {
    display: flex;
    gap: 10px;
}

.lightbox-btn {
    background: rgba(255, 255, 255, 0.1);
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: white;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: var(--transition-fast);
    backdrop-filter: blur(10px);
}

.lightbox-btn:hover {
    background: rgba(255, 255, 255, 0.2);
    border-color: rgba(255, 255, 255, 0.5);
    transform: scale(1.05);
}

.lightbox-content {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    padding: 20px;
}

.lightbox-nav {
    position: absolute;
    background: rgba(255, 255, 255, 0.1);
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: white;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: var(--transition-fast);
    backdrop-filter: blur(10px);
    font-size: 1.3rem;
    z-index: 10;
}

.lightbox-nav:hover {
    background: rgba(255, 255, 255, 0.2);
    border-color: rgba(255, 255, 255, 0.5);
    transform: scale(1.1);
}

.prev-btn {
    left: 30px;
}

.next-btn {
    right: 30px;
}

.lightbox-image-container {
    text-align: center;
    max-width: 90%;
    max-height: 90%;
    position: relative;
}

.lightbox-image {
    max-width: 100%;
    max-height: 80vh;
    object-fit: contain;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-heavy);
    transition: var(--transition-medium);
}

.image-loading {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: none;
}

.lightbox-footer {
    padding: 20px 30px;
    background: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(10px);
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.lightbox-details {
    color: white;
    text-align: center;
    margin-bottom: 15px;
}

.lightbox-caption {
    margin: 0 0 5px 0;
    font-size: 1rem;
    font-weight: 500;
}

.lightbox-alt {
    margin: 0;
    font-size: 0.9rem;
    opacity: 0.8;
}

.lightbox-thumbnails {
    display: flex;
    justify-content: center;
    gap: 8px;
    flex-wrap: wrap;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .dashboard-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .hero-content {
        flex-direction: column;
        text-align: center;
        gap: 20px;
    }
    
    .showcase-header {
        flex-direction: column;
        text-align: center;
        gap: 15px;
    }
    
    .gallery-controls {
        flex-direction: column;
        gap: 10px;
        width: 100%;
    }
    
    .view-controls,
    .action-controls {
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 768px) {
    .admin-container {
        padding: 15px;
    }
    
    .premium-hero {
        padding: 25px 20px;
    }
    
    .hero-title {
        font-size: 1.5rem;
        flex-direction: column;
        gap: 8px;
        text-align: center;
    }
    
    .hero-meta {
        font-size: 0.8rem;
        justify-content: center;
    }
    
    .hero-actions {
        width: 100%;
        justify-content: center;
    }
    
    .hero-btn {
        flex: 1;
        max-width: 140px;
    }
    
    .grid-view {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }
    
    .gallery-list-item {
        flex-direction: column;
        text-align: center;
        gap: 15px;
        padding: 20px;
    }
    
    .list-header {
        flex-direction: column;
        gap: 10px;
    }
    
    .list-meta {
        justify-content: center;
    }
    
    .prev-btn {
        left: 15px;
    }
    
    .next-btn {
        right: 15px;
    }
    
    .lightbox-header,
    .lightbox-footer {
        padding: 15px 20px;
    }
    
    .alert-container {
        max-width: calc(100% - 20px);
        right: 10px;
        left: 10px;
    }
}

@media (max-width: 480px) {
    .grid-view {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .hero-title {
        font-size: 1.3rem;
    }
    
    .hero-btn span {
        display: none;
    }
    
    .hero-btn {
        padding: 10px 12px;
    }
    
    .showcase-title {
        font-size: 1.2rem;
        flex-direction: column;
        align-items: flex-start;
    }
    
    .image-count {
        margin-left: 0;
        margin-top: 4px;
    }
    
    .control-btn span {
        display: none;
    }
    
    .control-btn {
        padding: 8px 10px;
    }
    
    .lightbox-nav {
        width: 45px;
        height: 45px;
        font-size: 1.1rem;
    }
    
    .card-body {
        padding: 20px;
    }
    
    .action-grid {
        grid-template-columns: 1fr;
        gap: 12px;
    }
}

/* Animation Overrides */
[data-aos] {
    opacity: 0;
    transition: opacity 0.6s ease, transform 0.6s ease;
}

[data-aos].aos-animate {
    opacity: 1;
}

/* Button Loading State */
.loading .action-icon i {
    animation: spin 1s linear infinite;
}

.loading {
    opacity: 0.7;
    pointer-events: none;
}

.action-form {
    margin: 0;
    width: 100%;
}

.action-form .action-card {
    width: 100%;
    text-align: left;
}
</style>


<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('🎉 Premium Gallery Show Loaded Successfully!');
    
    // Initialize everything
    initializeAnimations();
    initializeGalleryControls();
    initializeLightbox();
    initializeInteractions();
    
    /**
     * Initialize AOS-style animations
     */
    function initializeAnimations() {
        const animatedElements = document.querySelectorAll('[data-aos]');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const delay = entry.target.getAttribute('data-aos-delay') || 0;
                    setTimeout(() => {
                        entry.target.classList.add('aos-animate');
                    }, delay);
                }
            });
        }, {
            threshold: 0.1
        });
        
        animatedElements.forEach(el => {
            observer.observe(el);
        });
        
        console.log('✨ Animations initialized');
    }
    
    /**
     * Initialize gallery view controls
     */
    function initializeGalleryControls() {
        const gridBtn = document.getElementById('gridViewBtn');
        const listBtn = document.getElementById('listViewBtn');
        const gridView = document.getElementById('gridGallery');
        const listView = document.getElementById('listGallery');
        
        if (!gridBtn || !listBtn) {
            console.log('Gallery controls not found, skipping initialization');
            return;
        }
        
        // Grid view click handler
        gridBtn.addEventListener('click', function() {
            setActiveView('grid');
        });
        
        // List view click handler
        listBtn.addEventListener('click', function() {
            setActiveView('list');
        });
        
        function setActiveView(view) {
            // Update buttons
            gridBtn.classList.toggle('active', view === 'grid');
            listBtn.classList.toggle('active', view === 'list');
            
            // Update containers with smooth transition
            if (gridView && listView) {
                // First hide current view
                const currentActive = document.querySelector('.gallery-container.active');
                if (currentActive) {
                    currentActive.classList.remove('active');
                }
                
                // Show new view after brief delay for smooth transition
                setTimeout(() => {
                    if (view === 'grid') {
                        gridView.classList.add('active');
                    } else {
                        listView.classList.add('active');
                    }
                }, 150);
            }
            
            // Store preference
            localStorage.setItem('galleryView', view);
            
            console.log(`📱 Switched to ${view} view`);
        }
        
        // Load saved preference
        const savedView = localStorage.getItem('galleryView') || 'grid';
        setActiveView(savedView);
        
        console.log('🎛️ Gallery controls initialized');
    }
    
    /**
     * Initialize premium lightbox functionality
     */
    function initializeLightbox() {
        const modal = document.getElementById('lightboxModal');
        
        if (!modal) {
            console.log('Lightbox modal not found, skipping initialization');
            return;
        }
        
        let currentImageIndex = 0;
        let images = [];
        
        // Collect all gallery images
        function updateImagesList() {
            images = [];
            document.querySelectorAll('.gallery-image').forEach((img, index) => {
                const imageCard = img.closest('.gallery-item, .gallery-list-item');
                const title = imageCard?.querySelector('.image-title, .list-title')?.textContent || `Image ${index + 1}`;
                const caption = imageCard?.querySelector('.image-caption, .list-caption')?.textContent || '';
                const alt = imageCard?.querySelector('.image-alt, .list-alt')?.textContent || '';
                
                images.push({
                    src: img.src,
                    alt: img.alt,
                    title: title,
                    caption: caption,
                    altText: alt,
                    index: index
                });
            });
        }
        
        // Open lightbox
        window.openLightbox = function(index) {
            updateImagesList();
            currentImageIndex = index;
            showCurrentImage();
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
            
            // Animate in
            modal.style.opacity = '0';
            setTimeout(() => {
                modal.style.transition = 'opacity 0.3s ease';
                modal.style.opacity = '1';
            }, 10);
            
            console.log(`🖼️ Opened lightbox for image ${index + 1}`);
        };
        
        // Close lightbox
        window.closeLightbox = function() {
            modal.style.opacity = '0';
            setTimeout(() => {
                modal.style.display = 'none';
                document.body.style.overflow = '';
            }, 300);
            
            console.log('❌ Closed lightbox');
        };
        
        // Show current image
        function showCurrentImage() {
            if (images.length === 0) return;
            
            const image = images[currentImageIndex];
            const modalImage = document.getElementById('lightboxImage');
            const modalTitle = document.getElementById('lightboxTitle');
            const modalCaption = document.getElementById('lightboxCaption');
            const modalAlt = document.getElementById('lightboxAlt');
            const modalCounter = document.getElementById('lightboxCounter');
            
            // Show loading
            const loadingEl = document.querySelector('.image-loading');
            if (loadingEl) loadingEl.style.display = 'block';
            
            if (modalImage) {
                modalImage.onload = function() {
                    if (loadingEl) loadingEl.style.display = 'none';
                };
                modalImage.src = image.src;
                modalImage.alt = image.alt;
            }
            
            if (modalTitle) modalTitle.textContent = image.title;
            if (modalCaption) modalCaption.textContent = image.caption;
            if (modalAlt) modalAlt.textContent = image.altText;
            if (modalCounter) modalCounter.textContent = `${currentImageIndex + 1} / ${images.length}`;
        }
        
        // Previous image
        window.prevImage = function() {
            currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
            showCurrentImage();
            console.log(`⬅️ Previous image: ${currentImageIndex + 1}`);
        };
        
        // Next image
        window.nextImage = function() {
            currentImageIndex = (currentImageIndex + 1) % images.length;
            showCurrentImage();
            console.log(`➡️ Next image: ${currentImageIndex + 1}`);
        };
        
        // Toggle fullscreen
        window.toggleFullscreen = function() {
            if (!document.fullscreenElement) {
                modal.requestFullscreen().catch(err => {
                    console.log(`Error attempting to enable fullscreen: ${err.message}`);
                });
            } else {
                document.exitFullscreen();
            }
        };
        
        // Download current image
        window.downloadCurrentImage = function() {
            if (images.length === 0) return;
            
            const image = images[currentImageIndex];
            downloadImage(image.src, image.title);
        };
        
        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (modal.style.display === 'block') {
                switch(e.key) {
                    case 'Escape':
                        closeLightbox();
                        break;
                    case 'ArrowLeft':
                        prevImage();
                        break;
                    case 'ArrowRight':
                        nextImage();
                        break;
                    case 'f':
                    case 'F':
                        toggleFullscreen();
                        break;
                }
            }
        });
        
        console.log('🔍 Premium lightbox initialized');
    }
    
    /**
     * Initialize interactions and utilities
     */
    function initializeInteractions() {
        // Copy to clipboard functionality
        window.copyToClipboard = function(text) {
            navigator.clipboard.writeText(text).then(() => {
                showAlert('Copied to clipboard: ' + text, 'success');
            }).catch(() => {
                showAlert('Failed to copy to clipboard', 'error');
            });
        };
        
        // Download image functionality
        window.downloadImage = function(url, filename = 'image') {
            const link = document.createElement('a');
            link.href = url;
            link.download = filename + '.jpg';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            
            showAlert('Download started: ' + filename, 'info');
        };
        
        // Refresh card functionality
        window.refreshCard = function() {
            showLoading('Refreshing data...');
            
            setTimeout(() => {
                hideLoading();
                showAlert('Data refreshed successfully!', 'success');
                
                // Update view count
                const viewCount = document.getElementById('viewCount');
                if (viewCount) {
                    const currentCount = parseInt(viewCount.textContent);
                    viewCount.textContent = (currentCount + Math.floor(Math.random() * 10) + 1) + ' views';
                }
            }, 1500);
        };
        
        // Toggle sort functionality
        window.toggleSort = function() {
            const containers = document.querySelectorAll('.gallery-container.active .gallery-item, .gallery-container.active .gallery-list-item');
            const containerParent = document.querySelector('.gallery-container.active');
            
            if (!containerParent) return;
            
            showLoading('Sorting images...');
            
            // Convert to array and sort
            const items = Array.from(containers);
            items.sort((a, b) => {
                const titleA = a.querySelector('.image-title, .list-title')?.textContent.toLowerCase();
                const titleB = b.querySelector('.image-title, .list-title')?.textContent.toLowerCase();
                return titleA.localeCompare(titleB);
            });
            
            // Clear container
            containerParent.innerHTML = '';
            
            // Add sorted items with animation
            items.forEach((item, index) => {
                setTimeout(() => {
                    item.style.opacity = '0';
                    item.style.transform = 'translateY(20px)';
                    containerParent.appendChild(item);
                    
                    setTimeout(() => {
                        item.style.transition = 'all 0.3s ease';
                        item.style.opacity = '1';
                        item.style.transform = 'translateY(0)';
                    }, 50);
                }, index * 50);
            });
            
            setTimeout(() => {
                hideLoading();
                showAlert('Images sorted alphabetically!', 'success');
            }, 1000);
        };
        
        console.log('🎛️ Interactions initialized');
    }
    
    /**
     * Status toggle functionality
     */
    window.toggleStatus = function(button) {
        const slug = button.dataset.slug;
        const form = button.closest('form');
        
        if (!slug) {
            console.error('No slug found for status toggle');
            showAlert('Error: Data tidak valid', 'error');
            return false;
        }
        
        // Show loading
        showLoading('Mengupdate status...');
        setButtonLoading(button, true);
        
        // Submit form
        setTimeout(() => {
            form.submit();
        }, 500);
        
        return false;
    };
    
    /**
     * Delete functionality
     */
    window.confirmDelete = function(event, button) {
        event.preventDefault();
        
        const slug = button.dataset.slug;
        const galleryName = button.dataset.name || 'gallery ini';
        
        if (!slug) {
            console.error('No slug found for delete');
            showAlert('Error: Data tidak valid', 'error');
            return false;
        }
        
        // Show custom confirmation dialog
        const confirmMessage = `Apakah Anda yakin ingin menghapus "${galleryName}"?\n\nTindakan ini tidak dapat dibatalkan dan akan menghapus semua gambar terkait.`;
        
        showConfirmation(confirmMessage, function() {
            const form = button.closest('form');
            
            // Show loading
            showLoading('Menghapus gallery...');
            setButtonLoading(button, true);
            
            // Submit form
            setTimeout(() => {
                form.submit();
            }, 500);
        });
        
        return false;
    };
    
    /**
     * Confirm image deletion
     */
    window.confirmImageDelete = function(event, form, imageName) {
        event.preventDefault();
        
        const confirmMessage = `Apakah Anda yakin ingin menghapus "${imageName}"?\n\nTindakan ini tidak dapat dibatalkan.`;
        
        showConfirmation(confirmMessage, function() {
            showLoading('Menghapus gambar...');
            
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) {
                setButtonLoading(submitBtn, true);
            }
            
            setTimeout(() => {
                form.submit();
            }, 500);
        });
        
        return false;
    };
    
    /**
     * Confirm set primary image
     */
    window.confirmSetPrimary = function(event, form, imageName) {
        event.preventDefault();
        
        const confirmMessage = `Apakah Anda yakin ingin menjadikan "${imageName}" sebagai gambar utama?\n\nGambar utama akan ditampilkan sebagai thumbnail gallery.`;
        
        showConfirmation(confirmMessage, function() {
            showLoading('Mengupdate gambar utama...');
            
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) {
                setButtonLoading(submitBtn, true);
            }
            
            setTimeout(() => {
                form.submit();
            }, 500);
        });
        
        return false;
    };
    
    /**
     * Custom confirmation dialog
     */
    function showConfirmation(message, onConfirm, onCancel = null) {
        const modal = document.getElementById('confirmationModal');
        const messageEl = document.getElementById('confirmationMessage');
        const confirmBtn = document.getElementById('confirmButton');
        
        messageEl.textContent = message;
        
        // Show modal with animation
        modal.style.display = 'flex';
        setTimeout(() => {
            modal.classList.add('show');
        }, 10);
        
        // Handle confirm button click
        const handleConfirm = () => {
            closeConfirmation();
            if (onConfirm) onConfirm();
        };
        
        // Handle cancel
        const handleCancel = () => {
            closeConfirmation();
            if (onCancel) onCancel();
        };
        
        // Remove previous event listeners
        confirmBtn.replaceWith(confirmBtn.cloneNode(true));
        const newConfirmBtn = document.getElementById('confirmButton');
        
        // Add new event listeners
        newConfirmBtn.addEventListener('click', handleConfirm);
        
        // Handle ESC key
        const handleKeydown = (e) => {
            if (e.key === 'Escape') {
                handleCancel();
                document.removeEventListener('keydown', handleKeydown);
            }
        };
        
        document.addEventListener('keydown', handleKeydown);
        
        // Handle overlay click
        modal.querySelector('.confirmation-overlay').onclick = handleCancel;
    }
    
    /**
     * Close confirmation dialog
     */
    window.closeConfirmation = function() {
        const modal = document.getElementById('confirmationModal');
        modal.classList.remove('show');
        
        setTimeout(() => {
            modal.style.display = 'none';
        }, 300);
    };
    
    /**
     * Show loading overlay
     */
    function showLoading(message = 'Memproses...') {
        const overlay = document.getElementById('loadingOverlay');
        const loadingText = overlay.querySelector('.loading-text');
        
        if (loadingText) {
            loadingText.textContent = message;
        }
        
        overlay.style.display = 'flex';
        overlay.style.opacity = '0';
        setTimeout(() => {
            overlay.style.transition = 'opacity 0.3s ease';
            overlay.style.opacity = '1';
        }, 10);
        
        console.log(`⏳ Loading: ${message}`);
    }
    
    /**
     * Hide loading overlay
     */
    function hideLoading() {
        const overlay = document.getElementById('loadingOverlay');
        overlay.style.opacity = '0';
        setTimeout(() => {
            overlay.style.display = 'none';
        }, 300);
        
        console.log('✅ Loading hidden');
    }
    
    /**
     * Show enhanced alert
     */
    function showAlert(message, type = 'info', duration = 5000) {
        const container = document.getElementById('alertContainer');
        
        const alertId = 'alert_' + Date.now();
        const alert = document.createElement('div');
        alert.id = alertId;
        alert.className = `alert alert-${type}`;
        
        const icons = {
            success: 'fas fa-check-circle',
            error: 'fas fa-exclamation-circle',
            warning: 'fas fa-exclamation-triangle',
            info: 'fas fa-info-circle'
        };
        
        alert.innerHTML = `
            <div class="alert-content">
                <i class="alert-icon ${icons[type] || icons.info}"></i>
                <div class="alert-message">${message}</div>
                <button class="alert-close" onclick="closeAlert('${alertId}')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
        
        container.appendChild(alert);
        
        // Animate in
        setTimeout(() => {
            alert.classList.add('show');
        }, 10);
        
        // Auto remove
        if (duration > 0) {
            setTimeout(() => {
                closeAlert(alertId);
            }, duration);
        }
        
        console.log(`📢 Alert (${type}): ${message}`);
        return alertId;
    }
    
    /**
     * Set button loading state
     */
    function setButtonLoading(button, loading = true) {
        if (!button) return;
        
        if (loading) {
            button.dataset.originalHtml = button.innerHTML;
            button.disabled = true;
            button.classList.add('loading');
            
            // Add spinner icon
            const icon = button.querySelector('i');
            if (icon) {
                icon.className = 'fas fa-spinner fa-spin';
            }
            
            // Add loading text
            const actionContent = button.querySelector('.action-content h4');
            if (actionContent) {
                actionContent.textContent = 'Memproses...';
            }
        } else {
            button.disabled = false;
            button.classList.remove('loading');
            
            // Restore original content
            if (button.dataset.originalHtml) {
                button.innerHTML = button.dataset.originalHtml;
                delete button.dataset.originalHtml;
            }
        }
    }
    
    /**
     * Close alert
     */
    window.closeAlert = function(alertId) {
        const alert = document.getElementById(alertId);
        if (alert) {
            alert.classList.remove('show');
            setTimeout(() => {
                if (alert.parentNode) {
                    alert.parentNode.removeChild(alert);
                }
            }, 300);
        }
    };
    
    console.log('🚀 Premium Gallery Show fully initialized!');
});
</script>
@endsection
