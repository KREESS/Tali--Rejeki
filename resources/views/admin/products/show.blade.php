@extends('admin.components.layout')

@section('title', 'Show Produk Admin')

@push('styles')
<style>
.premium-card {
    background: white;
    border: 1px solid #ddd;
    border-radius: 25px;
    box-shadow: 0 10px 40px rgba(139, 0, 0, 0.12);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    margin-bottom: 30px;
    z-index: 1;
    position: relative;
}

.premium-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 50px rgba(139, 0, 0, 0.18);
    border-color: rgba(139, 0, 0, 0.25);
}

.premium-btn {
    background: #8b0000;
    border: none;
    color: white;
    padding: 8px 16px;
    border-radius: 6px;
    font-weight: 600;
    font-size: 0.85rem;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.premium-btn:hover {
    background: #a50000;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(139, 0, 0, 0.2);
    color: white;
}

.premium-btn-outline {
    background: white;
    border: 2px solid #8b0000;
    color: #8b0000;
    font-weight: 600;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.premium-btn-outline:hover {
    background: #f8f9fa;
    border-color: #8b0000;
    color: #8b0000;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.page-header {
    background: #8b0000;
    color: white;
    padding: 35px;
    border-radius: 25px;
    margin-bottom: 35px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 15px 50px rgba(139, 0, 0, 0.25);
    z-index: 1;
}

.page-header::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
    animation: shimmer 4s infinite linear;
}

@keyframes shimmer {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.info-card {
    background: white;
    border: 1px solid #ddd;
    border-radius: 15px;
    padding: 18px;
    margin-bottom: 18px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.05);
    z-index: 1;
    position: relative;
}

.info-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(139, 0, 0, 0.1);
}

.info-label {
    font-size: 0.75rem;
    color: #666;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 4px;
}

.info-value {
    font-size: 0.9rem;
    color: #333;
    font-weight: 500;
}

.product-gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 25px;
}

.gallery-item {
    position: relative;
    background: white;
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid rgba(139, 0, 0, 0.1);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 8px 25px rgba(139, 0, 0, 0.08);
}

.gallery-item:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 15px 40px rgba(139, 0, 0, 0.2);
}

.gallery-image {
    width: 100%;
    height: 150px;
    object-fit: cover;
    cursor: pointer;
}

.primary-badge {
    position: absolute;
    top: 8px;
    left: 8px;
    background: #28a745;
    color: white;
    padding: 3px 8px;
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 600;
}

.no-image {
    height: 150px;
    background: white;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #8b0000;
    font-size: 2rem;
    border: 1px solid #ddd;
}

.price-display {
    background: #8b0000;
    color: white;
    padding: 12px 20px;
    border-radius: 10px;
    margin-bottom: 15px;
    text-align: center;
}

.price-current {
    font-size: 1.3rem;
    font-weight: 700;
    margin-bottom: 3px;
}

.price-strike {
    font-size: 0.9rem;
    text-decoration: line-through;
    opacity: 0.7;
}

.category-badge {
    background: #8b0000;
    color: white;
    padding: 3px 8px;
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 500;
    text-decoration: none;
    display: inline-block;
}

.category-badge:hover {
    color: white;
    transform: scale(1.05);
}

.attributes-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 10px;
}

.attribute-item {
    background: rgba(255, 255, 255, 0.6);
    border: 1px solid rgba(139, 0, 0, 0.1);
    border-radius: 6px;
    padding: 8px 12px;
}

.attribute-label {
    font-size: 0.7rem;
    color: #666;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.attribute-value {
    font-size: 0.85rem;
    color: #333;
    font-weight: 500;
    margin-top: 2px;
}

.breadcrumb-custom {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 8px;
    padding: 8px 15px;
    margin-bottom: 15px;
}

.breadcrumb {
    margin: 0;
    background: transparent;
}

.breadcrumb-item {
    font-size: 0.8rem;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: '>';
    color: #8b0000;
    font-weight: bold;
}

.breadcrumb-item a {
    color: #8b0000;
    text-decoration: none;
}

.breadcrumb-item a:hover {
    text-decoration: underline;
}

.breadcrumb-item.active {
    color: #8b0000;
    font-weight: 600;
}

.empty-state {
    text-align: center;
    padding: 40px 20px;
    color: #666;
}

.empty-state i {
    font-size: 3rem;
    color: #8b0000;
    margin-bottom: 15px;
}

.section-title {
    color: #8b0000;
    font-weight: 700;
    font-size: 1.1rem;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 3px solid rgba(139, 0, 0, 0.15);
    position: relative;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -3px;
    left: 0;
    width: 50px;
    height: 3px;
    background: linear-gradient(90deg, #8b0000, #a50000);
    border-radius: 2px;
}

.meta-info {
    background: rgba(139, 0, 0, 0.05);
    border: 1px solid rgba(139, 0, 0, 0.1);
    border-radius: 8px;
    padding: 12px;
    margin-top: 15px;
}

.meta-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 4px 0;
    border-bottom: 1px solid rgba(139, 0, 0, 0.1);
}

.meta-item:last-child {
    border-bottom: none;
}

.meta-label {
    font-size: 0.75rem;
    color: #666;
    font-weight: 600;
}

.meta-value {
    font-size: 0.8rem;
    color: #333;
    font-weight: 500;
}

/* Modal Improvements */
.modal-dialog {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: calc(100vh - 1rem);
    margin: 0.5rem auto;
}

.modal-content {
    border-radius: 20px !important;
    border: none !important;
    box-shadow: 0 15px 50px rgba(0, 0, 0, 0.3) !important;
    background: white !important;
}

.modal-header {
    border-radius: 20px 20px 0 0 !important;
    background: #8b0000;
    color: white;
    border-bottom: none !important;
    padding: 20px 25px;
}

.modal-header .modal-title {
    font-weight: 700;
    font-size: 1.1rem !important;
}

.modal-header .btn-close {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    width: 35px;
    height: 35px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    filter: invert(1);
    opacity: 0.8;
    transition: all 0.3s ease;
}

.modal-header .btn-close:hover {
    background: rgba(255, 255, 255, 0.3);
    opacity: 1;
    transform: scale(1.1);
}

.modal-body {
    padding: 25px;
    font-size: 0.95rem;
}

.modal-footer {
    padding: 20px 25px;
    border-top: 1px solid rgba(139, 0, 0, 0.1) !important;
    border-radius: 0 0 20px 20px !important;
    background: rgba(248, 249, 250, 0.5);
}

.modal-footer .premium-btn {
    padding: 12px 25px !important;
    font-size: 0.9rem !important;
    font-weight: 600;
    border-radius: 12px;
    min-width: 120px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.modal-footer .premium-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(139, 0, 0, 0.3);
}

.modal-footer .premium-btn-outline {
    background: rgba(108, 117, 125, 0.1) !important;
    border: 2px solid rgba(108, 117, 125, 0.3) !important;
    color: #6c757d !important;
}

.modal-footer .premium-btn-outline:hover {
    background: rgba(108, 117, 125, 0.2) !important;
    border-color: #6c757d !important;
    color: #6c757d !important;
}

/* Alert Styling in Modal */
.modal-body .alert {
    border: none;
    border-radius: 12px;
    padding: 15px;
    margin: 15px 0;
    background: linear-gradient(135deg, rgba(255, 193, 7, 0.1), rgba(255, 193, 7, 0.05));
    border-left: 4px solid #ffc107;
}

.modal-body .bg-light {
    background: linear-gradient(135deg, rgba(139, 0, 0, 0.05), rgba(139, 0, 0, 0.02)) !important;
    border: 1px solid rgba(139, 0, 0, 0.1);
    border-radius: 12px;
    padding: 15px;
    margin-top: 15px;
}

/* Modal Animation */
.modal.fade .modal-dialog {
    transform: translate(0, -50px) scale(0.9);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.modal.show .modal-dialog {
    transform: translate(0, 0) scale(1);
}

/* Image Modal Specific */
.modal-lg .modal-content {
    max-width: 90vw;
}

#modalImage {
    max-height: 70vh;
    max-width: 100%;
    object-fit: contain;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}
</style>
@endpush

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-custom">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.products.index') }}">Produk</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.subcategories.show', $product->subcategory) }}">
                    {{ $product->subcategory->name }}
                </a>
            </li>
            <li class="breadcrumb-item active">{{ Str::limit($product->name, 30) }}</li>
        </ol>
    </nav>
</div>

<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h5 class="mb-1" style="font-size: 1.2rem;">
                <i class="fas fa-cube me-2" style="font-size: 1.0rem;"></i>
                {{ $product->name }}
            </h5>
            <p class="mb-0 opacity-75" style="font-size: 0.85rem;">
                Detail lengkap produk dari sub kategori 
                <strong>{{ $product->subcategory->name }}</strong>
            </p>
        </div>
        <div class="d-flex gap-2">
            {{-- Tombol Edit --}}
            <a href="{{ route('admin.products.edit', $product) }}" 
            class="premium-btn" 
            style="padding: 6px 12px; font-size: 0.8rem;">
                <i class="fas fa-edit" style="font-size: 0.75rem;"></i>
                Edit
            </a>

            {{-- Tombol Hapus --}}
            <button type="button" 
                    class="premium-btn premium-btn-outline" 
                    onclick="deleteProduct()"
                    style="padding: 6px 12px; font-size: 0.8rem; background: rgba(220, 53, 69, 0.9); border-color: rgba(220, 53, 69, 0.9); color: white;">
                <i class="fas fa-trash" style="font-size: 0.75rem;"></i>
                Hapus
            </button>

            {{-- Tombol Kembali --}}
            <a href="{{ route('admin.products.index') }}" 
            class="premium-btn premium-btn-outline" 
            style="padding: 6px 12px; font-size: 0.8rem;">
                <i class="fas fa-arrow-left" style="font-size: 0.75rem;"></i>
                Kembali
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <!-- Product Gallery -->
        @if($product->images->count() > 0)
        <div class="premium-card" style="padding: 15px;">
            <h6 class="section-title">
                <i class="fas fa-images me-2" style="font-size: 0.85rem;"></i>
                Galeri Produk ({{ $product->images->count() }} gambar)
            </h6>
            
            <div class="product-gallery">
                @foreach($product->images as $image)
                <div class="gallery-item">
                    <img src="{{ asset('storage/' . $image->image_path) }}" 
                         alt="{{ $image->alt_text }}" 
                         class="gallery-image"
                         onclick="openImageModal('{{ asset('storage/' . $image->image_path) }}', '{{ $image->alt_text }}')">
                    
                    @if($image->is_primary)
                        <div class="primary-badge">Utama</div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @else
        <div class="premium-card" style="padding: 15px;">
            <div class="empty-state">
                <i class="fas fa-image"></i>
                <h6 style="font-size: 0.95rem;">Belum Ada Gambar</h6>
                <p class="mb-3" style="font-size: 0.8rem;">Produk ini belum memiliki gambar.</p>
                <a href="{{ route('admin.products.edit', $product) }}" class="premium-btn" style="padding: 6px 12px; font-size: 0.8rem;">
                    <i class="fas fa-plus" style="font-size: 0.75rem;"></i>
                    Tambah Gambar
                </a>
            </div>
        </div>
        @endif

        <!-- Product Information -->
        <div class="premium-card" style="padding: 15px;">
            <h6 class="section-title">
                <i class="fas fa-info-circle me-2" style="font-size: 0.85rem;"></i>
                Informasi Produk
            </h6>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="info-card">
                        <div class="info-label">Nama Produk</div>
                        <div class="info-value">{{ $product->name }}</div>
                    </div>
                    
                    <div class="info-card">
                        <div class="info-label">Sub Kategori</div>
                        <div class="info-value">
                            <a href="{{ route('admin.subcategories.show', $product->subcategory) }}" 
                               class="category-badge">
                                {{ $product->subcategory->name }}
                            </a>
                        </div>
                    </div>
                    
                    @if($product->sku)
                    <div class="info-card">
                        <div class="info-label">SKU</div>
                        <div class="info-value">
                            <code style="background: rgba(139, 0, 0, 0.1); padding: 2px 6px; border-radius: 4px; font-size: 0.8rem;">
                                {{ $product->sku }}
                            </code>
                        </div>
                    </div>
                    @endif
                </div>
                
                <div class="col-md-6">
                    @if($product->price || $product->price_strike)
                    <div class="price-display">
                        @if($product->price)
                        <div class="price-current">
                            {{ $product->currency }} {{ number_format($product->price, 0, ',', '.') }}
                        </div>
                        @endif
                        
                        @if($product->price_strike)
                        <div class="price-strike">
                            {{ $product->currency }} {{ number_format($product->price_strike, 0, ',', '.') }}
                        </div>
                        @endif
                    </div>
                    @endif
                    
                    @if($product->brands)
                    <div class="info-card">
                        <div class="info-label">Brand/Merek</div>
                        <div class="info-value">
                            @if(is_array($product->brands))
                                @foreach($product->brands as $brand)
                                    <span class="badge bg-secondary me-1" style="font-size: 0.7rem;">{{ $brand }}</span>
                                @endforeach
                            @else
                                {{ $product->brands }}
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Product Attributes -->
        @php
            $hasAttributes = false;
            for($i = 1; $i <= 10; $i++) {
                if($product->{'attr'.$i}) {
                    $hasAttributes = true;
                    break;
                }
            }
        @endphp

        @if($hasAttributes)
        <div class="premium-card" style="padding: 15px;">
            <h6 class="section-title">
                <i class="fas fa-list me-2" style="font-size: 0.85rem;"></i>
                Atribut Produk
            </h6>
            
            <div class="attributes-grid">
                @for($i = 1; $i <= 10; $i++)
                    @if($product->{'attr'.$i})
                    <div class="attribute-item">
                        <div class="attribute-label">Atribut {{ $i }}</div>
                        <div class="attribute-value">{{ $product->{'attr'.$i} }}</div>
                    </div>
                    @endif
                @endfor
            </div>
        </div>
        @endif
    </div>

    <div class="col-lg-4">
        <!-- SEO Information -->
        @if($product->meta_title || $product->meta_description)
        <div class="premium-card" style="padding: 15px;">
            <h6 class="section-title">
                <i class="fas fa-search me-2" style="font-size: 0.85rem;"></i>
                SEO & Meta
            </h6>
            
            @if($product->meta_title)
            <div class="info-card">
                <div class="info-label">Meta Title</div>
                <div class="info-value">{{ $product->meta_title }}</div>
            </div>
            @endif
            
            @if($product->meta_description)
            <div class="info-card">
                <div class="info-label">Meta Description</div>
                <div class="info-value">{{ $product->meta_description }}</div>
            </div>
            @endif
            
            <div class="info-card">
                <div class="info-label">URL Slug</div>
                <div class="info-value">
                    <code style="background: rgba(139, 0, 0, 0.1); padding: 2px 6px; border-radius: 4px; font-size: 0.75rem;">
                        {{ $product->slug }}
                    </code>
                </div>
            </div>
        </div>
        @endif

        <!-- Statistics -->
        <div class="premium-card" style="padding: 15px;">
            <h6 class="section-title">
                <i class="fas fa-chart-bar me-2" style="font-size: 0.85rem;"></i>
                Statistik
            </h6>
            
            <div class="meta-info">
                <div class="meta-item">
                    <span class="meta-label">Total Gambar</span>
                    <span class="meta-value">{{ $product->images->count() }} gambar</span>
                </div>
                
                <div class="meta-item">
                    <span class="meta-label">Dibuat</span>
                    <span class="meta-value">{{ $product->created_at->format('d M Y H:i') }}</span>
                </div>
                
                <div class="meta-item">
                    <span class="meta-label">Terakhir Diubah</span>
                    <span class="meta-value">{{ $product->updated_at->format('d M Y H:i') }}</span>
                </div>
                
                @if($product->created_at != $product->updated_at)
                <div class="meta-item">
                    <span class="meta-label">Selisih Update</span>
                    <span class="meta-value">{{ $product->updated_at->diffForHumans($product->created_at) }}</span>
                </div>
                @endif
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="premium-card" style="padding: 15px;">
            <h6 class="section-title">
                <i class="fas fa-bolt me-2" style="font-size: 0.85rem;"></i>
                Aksi Cepat
            </h6>
            
            <div class="d-grid gap-2">
                <a href="{{ route('admin.products.edit', $product) }}" class="premium-btn" style="padding: 8px 12px; font-size: 0.8rem;">
                    <i class="fas fa-edit" style="font-size: 0.75rem;"></i>
                    Edit Produk
                </a>
                
                @if($product->images->count() == 0)
                <a href="{{ route('admin.products.edit', $product) }}#images" class="premium-btn premium-btn-outline" style="padding: 8px 12px; font-size: 0.8rem;">
                    <i class="fas fa-images" style="font-size: 0.75rem;"></i>
                    Tambah Gambar
                </a>
                @endif
                
                <a href="{{ route('admin.products.create') }}?subcategory={{ $product->subcategory_id }}" class="premium-btn premium-btn-outline" style="padding: 8px 12px; font-size: 0.8rem;">
                    <i class="fas fa-plus" style="font-size: 0.75rem;"></i>
                    Produk Serupa
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">
                    <i class="fas fa-image me-2"></i>
                    Gambar Produk
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center p-4">
                <img id="modalImage" src="" alt="" class="img-fluid">
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="premium-btn premium-btn-outline" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Konfirmasi Hapus Produk
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <i class="fas fa-trash-alt text-danger" style="font-size: 3rem; opacity: 0.7;"></i>
                </div>
                
                <p class="text-center mb-3" style="font-size: 1rem; font-weight: 500;">
                    Apakah Anda yakin ingin menghapus produk ini?
                </p>
                
                <div class="alert alert-warning d-flex align-items-center">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <div>
                        <strong>Peringatan:</strong> Tindakan ini akan menghapus semua gambar produk dan tidak dapat dibatalkan!
                    </div>
                </div>
                
                <div class="bg-light p-3 rounded">
                    <div class="row">
                        <div class="col-4">
                            <strong>Produk:</strong>
                        </div>
                        <div class="col-8">
                            <span class="text-muted">{{ $product->name }}</span>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4">
                            <strong>Sub Kategori:</strong>
                        </div>
                        <div class="col-8">
                            <span class="text-muted">{{ $product->subcategory->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="premium-btn premium-btn-outline" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>
                    Batal
                </button>
                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="premium-btn" style="background: linear-gradient(135deg, #dc3545, #c82333);">
                        <i class="fas fa-trash me-1"></i>
                        Hapus Produk
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Open image modal
function openImageModal(imageSrc, imageAlt) {
    const modalImage = document.getElementById('modalImage');
    modalImage.src = imageSrc;
    modalImage.alt = imageAlt;
    
    const imageModal = new bootstrap.Modal(document.getElementById('imageModal'), {
        backdrop: 'static',
        keyboard: true
    });
    imageModal.show();
    
    // Add loading effect
    modalImage.style.opacity = '0';
    modalImage.onload = function() {
        this.style.opacity = '1';
        this.style.transition = 'opacity 0.3s ease';
    };
}

// Delete product function with confirmation
function deleteProduct() {
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'), {
        backdrop: 'static',
        keyboard: true
    });
    deleteModal.show();
    
    // Focus on cancel button for accessibility
    deleteModal._element.addEventListener('shown.bs.modal', function() {
        const cancelBtn = this.querySelector('.premium-btn-outline');
        if (cancelBtn) cancelBtn.focus();
    });
}

// Enhanced delete form handling
document.addEventListener('DOMContentLoaded', function() {
    const deleteForm = document.querySelector('#deleteModal form');
    if (deleteForm) {
        deleteForm.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            const cancelBtn = document.querySelector('#deleteModal .premium-btn-outline');
            
            // Prevent double submission
            if (submitBtn.disabled) {
                e.preventDefault();
                return false;
            }
            
            // Show loading state
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Menghapus...';
            submitBtn.disabled = true;
            submitBtn.style.opacity = '0.7';
            
            // Disable cancel button
            if (cancelBtn) {
                cancelBtn.disabled = true;
                cancelBtn.style.opacity = '0.5';
            }
            
            // Add timeout as safety measure
            setTimeout(function() {
                if (submitBtn.disabled) {
                    submitBtn.innerHTML = '<i class="fas fa-exclamation-triangle me-1"></i> Coba Lagi';
                    submitBtn.disabled = false;
                    submitBtn.style.opacity = '1';
                    if (cancelBtn) {
                        cancelBtn.disabled = false;
                        cancelBtn.style.opacity = '1';
                    }
                }
            }, 10000); // 10 seconds timeout
        });
    }
    
    // Enhanced modal animations
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        modal.addEventListener('show.bs.modal', function() {
            this.style.display = 'block';
            this.style.opacity = '0';
            setTimeout(() => {
                this.style.opacity = '1';
                this.style.transition = 'opacity 0.3s ease';
            }, 10);
        });
        
        modal.addEventListener('hide.bs.modal', function() {
            this.style.opacity = '0';
        });
    });
    
    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        // ESC key to close modals
        if (e.key === 'Escape') {
            const openModal = document.querySelector('.modal.show');
            if (openModal) {
                const modalInstance = bootstrap.Modal.getInstance(openModal);
                if (modalInstance) modalInstance.hide();
            }
        }
    });
});

// Add click effect to buttons
document.querySelectorAll('.premium-btn').forEach(button => {
    button.addEventListener('click', function(e) {
        // Create ripple effect
        const ripple = document.createElement('span');
        ripple.classList.add('ripple');
        this.appendChild(ripple);
        
        const rect = this.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        ripple.style.width = ripple.style.height = size + 'px';
        ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
        ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';
        
        setTimeout(() => {
            ripple.remove();
        }, 600);
    });
});
</script>

<style>
/* Ripple effect for buttons */
.premium-btn {
    position: relative;
    overflow: hidden;
}

.ripple {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    animation: ripple-animation 0.6s ease-out;
    pointer-events: none;
}

@keyframes ripple-animation {
    0% {
        transform: scale(0);
        opacity: 1;
    }
    100% {
        transform: scale(1);
        opacity: 0;
    }
}

/* Enhanced button hover effects */
.premium-btn:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 8px 25px rgba(139, 0, 0, 0.3) !important;
}

.premium-btn:active {
    transform: translateY(0) !important;
    transition: transform 0.1s ease !important;
}

/* Modal backdrop blur */
.modal-backdrop {
    z-index: 4990 !important;
}

/* Ensure modal is above all elements */
.modal {
    z-index: 5000 !important;
}

/* Loading spinner enhancement */
.fa-spinner {
    animation: spin 1s linear infinite !mportant;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* ====== ALERT Z-INDEX FIX ====== */
/* Ensure alerts are above all blurred elements */
.alert {
    z-index: 10001 !important;
    position: relative !important;
}

.alert, .alert * {
    z-index: 10001 !important;
    position: relative !important;
    filter: none !important;
    transform: none !important;
    will-change: auto !important;
}

.alert .btn-close {
    z-index: 10002 !important;
    position: relative !important;
    pointer-events: auto !important;
}

/* Override any container z-index for alerts */
.admin-main-content > .alert {
    z-index: 10003 !important;
    position: relative !important;
}

/* Ensure all blurred elements are below alerts */
.premium-card,
.info-card,
.gallery-item,
.modal-content {
    z-index: 1 !important;
    position: relative;
}

/* Page header should be below alerts */
.page-header {
    z-index: 1 !important;
    position: relative;
}
</style>
@endpush
