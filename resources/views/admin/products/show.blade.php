@extends('admin.components.layout')

@section('title', 'Show Produk Admin')

@push('styles')
<style>
.premium-card {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0.08));
    backdrop-filter: blur(20px);
    border: 1px solid rgba(139, 0, 0, 0.15);
    border-radius: 25px;
    box-shadow: 0 10px 40px rgba(139, 0, 0, 0.12);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    margin-bottom: 30px;
}

.premium-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 50px rgba(139, 0, 0, 0.18);
    border-color: rgba(139, 0, 0, 0.25);
}

.premium-btn {
    background: linear-gradient(135deg, #8b0000, #a50000);
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
    background: linear-gradient(135deg, #a50000, #c50000);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(139, 0, 0, 0.2);
    color: white;
}

.premium-btn-outline {
    background: rgba(255, 255, 255, 0.95);
    border: 2px solid rgba(255, 255, 255, 0.9);
    color: #8b0000;
    font-weight: 600;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.premium-btn-outline:hover {
    background: rgba(255, 255, 255, 1);
    border-color: rgba(255, 255, 255, 1);
    color: #8b0000;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.page-header {
    background: linear-gradient(135deg, #8b0000, #a50000, #c50000);
    color: white;
    padding: 35px;
    border-radius: 25px;
    margin-bottom: 35px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 15px 50px rgba(139, 0, 0, 0.25);
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
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.8));
    border: 1px solid rgba(139, 0, 0, 0.08);
    border-radius: 15px;
    padding: 18px;
    margin-bottom: 18px;
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.05);
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
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #8b0000;
    font-size: 2rem;
}

.price-display {
    background: linear-gradient(135deg, #8b0000, #a50000);
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
    background: linear-gradient(135deg, #6c757d, #5a6268);
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
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.9)); backdrop-filter: blur(10px); border: 1px solid rgba(139, 0, 0, 0.2);">
            <div class="modal-header" style="border-color: rgba(139, 0, 0, 0.2);">
                <h6 class="modal-title" style="font-size: 0.95rem;">Gambar Produk</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="" class="img-fluid" style="max-height: 500px; border-radius: 8px;">
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.9)); backdrop-filter: blur(10px); border: 1px solid rgba(139, 0, 0, 0.2);">
            <div class="modal-header" style="border-color: rgba(139, 0, 0, 0.2);">
                <h6 class="modal-title" style="font-size: 0.95rem;">
                    <i class="fas fa-exclamation-triangle text-warning me-2"></i>
                    Konfirmasi Hapus Produk
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p style="font-size: 0.9rem;">Apakah Anda yakin ingin menghapus produk ini?</p>
                <div class="alert alert-warning" style="font-size: 0.8rem;">
                    <i class="fas fa-exclamation-circle me-1"></i>
                    <strong>Peringatan:</strong> Tindakan ini akan menghapus semua gambar produk dan tidak dapat dibatalkan!
                </div>
                <div class="bg-light p-3 rounded" style="font-size: 0.85rem;">
                    <strong>Produk yang akan dihapus:</strong><br>
                    <span class="text-muted">{{ $product->name }}</span>
                </div>
            </div>
            <div class="modal-footer" style="border-color: rgba(139, 0, 0, 0.2);">
                <button type="button" class="premium-btn premium-btn-outline" data-bs-dismiss="modal" style="padding: 6px 12px; font-size: 0.8rem;">
                    <i class="fas fa-times" style="font-size: 0.75rem;"></i>
                    Batal
                </button>
                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="premium-btn" style="background: linear-gradient(135deg, #dc3545, #c82333); padding: 6px 12px; font-size: 0.8rem;">
                        <i class="fas fa-trash" style="font-size: 0.75rem;"></i>
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
    
    const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
    imageModal.show();
}

// Delete product function
function deleteProduct() {
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteModal.show();
}

// Add loading state to delete form
document.querySelector('#deleteModal form').addEventListener('submit', function() {
    const submitBtn = this.querySelector('button[type="submit"]');
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin" style="font-size: 0.75rem;"></i> Menghapus...';
    submitBtn.disabled = true;
});
</script>
@endpush
