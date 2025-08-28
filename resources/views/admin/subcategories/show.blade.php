@extends('admin.components.layout')

@section('title', 'Show Subkategori Admin')

@push('styles')
<style>
.premium-card {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
    backdrop-filter: blur(10px);
    border: 1px solid rgba(139, 0, 0, 0.2);
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(139, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.product-card {
    background: rgba(255, 255, 255, 0.8);
    border: 1px solid rgba(139, 0, 0, 0.1);
    border-radius: 10px;
    padding: 15px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
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
    box-shadow: 0 5px 15px rgba(139, 0, 0, 0.3);
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

/* Special styling for outline buttons on red background */
.page-header .premium-btn-outline {
    background: rgba(255, 255, 255, 0.95);
    border: 2px solid rgba(255, 255, 255, 0.9);
    color: #8b0000;
    font-weight: 600;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
}

.page-header .premium-btn-outline:hover {
    background: rgba(255, 255, 255, 1);
    border-color: rgba(255, 255, 255, 1);
    color: #8b0000;
    transform: translateY(-1px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.page-header {
    background: linear-gradient(135deg, #8b0000, #a50000);
    color: white;
    padding: 30px;
    border-radius: 15px;
    margin-bottom: 30px;
    position: relative;
    overflow: hidden;
}

.info-card {
    background: rgba(139, 0, 0, 0.05);
    border: 1px solid rgba(139, 0, 0, 0.1);
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
}

.info-label {
    font-weight: 600;
    color: #333;
    margin-bottom: 5px;
}

.info-value {
    color: #666;
    font-size: 0.95rem;
}

.stat-card {
    background: linear-gradient(135deg, #8b0000, #a50000);
    color: white;
    border-radius: 10px;
    padding: 20px;
    text-align: center;
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(139, 0, 0, 0.3);
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 5px;
}

.stat-label {
    font-size: 0.9rem;
    opacity: 0.9;
}

.category-badge {
    background: linear-gradient(135deg, #6c757d, #5a6268);
    color: white;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 600;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s ease;
}

.category-badge:hover {
    background: linear-gradient(135deg, #5a6268, #495057);
    color: white;
    transform: scale(1.05);
}

.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.product-card {
    background: rgba(255, 255, 255, 0.7);
    border: 1px solid rgba(139, 0, 0, 0.1);
    border-radius: 12px;
    padding: 20px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.product-card:hover {
    background: rgba(255, 255, 255, 0.9);
    border-color: rgba(139, 0, 0, 0.2);
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(139, 0, 0, 0.15);
}

.product-image {
    width: 100%;
    height: 100px;
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    border-radius: 6px;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #8b0000;
    font-size: 1.5rem;
    position: relative;
    overflow: hidden;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 8px;
}

.product-price {
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
    padding: 3px 8px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 500;
    display: inline-block;
    margin-bottom: 8px;
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

.timeline-item {
    border-left: 3px solid #8b0000;
    padding-left: 20px;
    padding-bottom: 20px;
    position: relative;
}

.timeline-item::before {
    content: '';
    position: absolute;
    left: -7px;
    top: 0;
    width: 12px;
    height: 12px;
    background: #8b0000;
    border-radius: 50%;
}

.breadcrumb-custom {
    background: rgba(139, 0, 0, 0.1);
    border-radius: 10px;
    padding: 15px 20px;
    margin-bottom: 20px;
}

.breadcrumb-custom .breadcrumb {
    margin: 0;
    background: transparent;
}

.breadcrumb-custom .breadcrumb-item + .breadcrumb-item::before {
    color: #8b0000;
}

.breadcrumb-custom .breadcrumb-item.active {
    color: #8b0000;
    font-weight: 600;
}
</style>
@endpush

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-custom">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.categories.index') }}" style="color: #8b0000;">Kategori</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.categories.show', $subcategory->category) }}" style="color: #8b0000;">
                    {{ $subcategory->category->name }}
                </a>
            </li>
            <li class="breadcrumb-item active">{{ $subcategory->name }}</li>
        </ol>
    </nav>
</div>

<div class="page-header">
    <div class="page-header-content">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-1" style="font-size: 1.2rem;">
                    <i class="fas fa-folder-open me-2" style="font-size: 1.0rem;"></i>
                    {{ $subcategory->name }}
                </h5>
                <p class="mb-0 opacity-75" style="font-size: 0.85rem;">
                    Detail lengkap sub kategori dari 
                    <span class="fw-bold">{{ $subcategory->category->name }}</span>
                </p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.products.create') }}?subcategory={{ $subcategory->id }}" class="premium-btn" style="padding: 6px 12px; font-size: 0.8rem;">
                    <i class="fas fa-plus" style="font-size: 0.75rem;"></i>
                    Tambah Produk
                </a>
                <a href="{{ route('admin.subcategories.edit', $subcategory) }}" class="premium-btn" style="padding: 6px 12px; font-size: 0.8rem;">
                    <i class="fas fa-edit" style="font-size: 0.75rem;"></i>
                    Edit Sub Kategori
                </a>
                <a href="{{ route('admin.subcategories.index') }}" class="premium-btn premium-btn-outline" style="padding: 6px 12px; font-size: 0.8rem;">
                    <i class="fas fa-arrow-left" style="font-size: 0.75rem;"></i>
                    Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Main Information -->
    <div class="col-lg-8">
        <div class="premium-card">
            <div class="card-body p-3">
                <h6 class="text-dark fw-bold mb-3" style="font-size: 1.0rem;">
                    <i class="fas fa-info-circle text-primary me-2" style="font-size: 0.9rem;"></i>
                    Informasi Sub Kategori
                </h6>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="info-card">
                            <div class="info-label">Nama Sub Kategori</div>
                            <div class="info-value h5 text-dark">{{ $subcategory->name }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-card">
                            <div class="info-label">Kategori Induk</div>
                            <div class="info-value">
                                <a href="{{ route('admin.categories.show', $subcategory->category) }}" class="category-badge">
                                    {{ $subcategory->category->name }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="info-card">
                            <div class="info-label">Slug URL</div>
                            <div class="info-value">
                                <code>{{ $subcategory->slug }}</code>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-card">
                            <div class="info-label">Dibuat</div>
                            <div class="info-value">{{ $subcategory->created_at->format('d M Y H:i') }}</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="info-card">
                            <div class="info-label">Meta Title</div>
                            <div class="info-value">{{ $subcategory->meta_title ?: 'Tidak diisi' }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-card">
                            <div class="info-label">Terakhir Update</div>
                            <div class="info-value">{{ $subcategory->updated_at->format('d M Y H:i') }}</div>
                        </div>
                    </div>
                </div>

                @if($subcategory->meta_description)
                <div class="info-card">
                    <div class="info-label">Meta Description</div>
                    <div class="info-value">{{ $subcategory->meta_description }}</div>
                </div>
                @endif
            </div>
        </div>

        <!-- Products Section -->
        <div class="premium-card mt-3">
            <div class="card-body p-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="text-dark fw-bold mb-0" style="font-size: 1.0rem;">
                        <i class="fas fa-cubes text-success me-2" style="font-size: 0.9rem;"></i>
                        Produk ({{ $subcategory->products->count() }})
                    </h6>
                    <a href="{{ route('admin.products.create') }}?subcategory={{ $subcategory->id }}" class="premium-btn premium-btn-sm" style="padding: 6px 12px; font-size: 0.8rem;">
                        <i class="fas fa-plus" style="font-size: 0.75rem;"></i>
                        Tambah Produk
                    </a>
                </div>

                @if($subcategory->products->count() > 0)
                    <div class="product-grid">
                        @foreach($subcategory->products as $product)
                        <div class="product-card">
                            <div class="product-image">
                                @if($product->primaryImage)
                                    <img src="{{ asset('storage/' . $product->primaryImage->image_path) }}" 
                                         alt="{{ $product->name }}">
                                @else
                                    <i class="fas fa-cube"></i>
                                @endif
                            </div>
                            
                            <h6 class="text-dark fw-bold mb-2">{{ $product->name }}</h6>
                            
                            @if($product->price)
                                <div class="product-price">
                                    {{ $product->currency }} {{ number_format($product->price, 0, ',', '.') }}
                                </div>
                            @endif
                            
                            <p class="text-muted small mb-3">
                                SKU: {{ $product->sku ?: 'Tidak ada' }}
                                <small class="text-muted" style="font-size: 0.75rem;">
                                Dibuat: {{ $product->created_at->format('d M Y') }}
                            </small>
                            
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.products.show', $product) }}" 
                                   class="btn btn-sm btn-outline-primary" style="padding: 4px 8px; font-size: 0.75rem;">
                                    <i class="fas fa-eye" style="font-size: 0.7rem;"></i>
                                </a>
                                <a href="{{ route('admin.products.edit', $product) }}" 
                                   class="btn btn-sm btn-outline-warning" style="padding: 4px 8px; font-size: 0.75rem;">
                                    <i class="fas fa-edit" style="font-size: 0.7rem;"></i>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    @if($subcategory->products->count() > 6)
                        <div class="text-center mt-4">
                            <a href="{{ route('admin.products.index') }}?subcategory={{ $subcategory->id }}" 
                               class="premium-btn" style="background: rgba(255, 255, 255, 0.95); border: 2px solid rgba(139, 0, 0, 0.3); color: #8b0000;">
                                <i class="fas fa-eye"></i>
                                Lihat Semua Produk
                            </a>
                        </div>
                    @endif
                @else
                    <div class="empty-state">
                        <i class="fas fa-cube"></i>
                        <h6>Belum Ada Produk</h6>
                        <p class="text-muted mb-3">Sub kategori ini belum memiliki produk.</p>
                        <a href="{{ route('admin.products.create') }}?subcategory={{ $subcategory->id }}" class="premium-btn">
                            <i class="fas fa-plus"></i>
                            Tambah Produk Pertama
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Statistics Sidebar -->
    <div class="col-lg-4">
        <!-- Stats Cards -->
        <div class="row">
            <div class="col-12 mb-3">
                <div class="stat-card">
                    <div class="stat-number">{{ $subcategory->products->count() }}</div>
                    <div class="stat-label">Total Produk</div>
                </div>
            </div>
            <div class="col-12 mb-3">
                <div class="stat-card" style="background: linear-gradient(135deg, #28a745, #20c997);">
                    <div class="stat-number">{{ $subcategory->products->where('price', '>', 0)->count() }}</div>
                    <div class="stat-label">Produk Berisi Harga</div>
                </div>
            </div>
            <div class="col-12 mb-3">
                <div class="stat-card" style="background: linear-gradient(135deg, #17a2b8, #6f42c1);">
                    <div class="stat-number">{{ $subcategory->created_at->diffInDays(now()) }}</div>
                    <div class="stat-label">Hari Sejak Dibuat</div>
                </div>
            </div>
        </div>

        <!-- Timeline -->
        <div class="premium-card">
            <div class="card-body p-4">
                <h6 class="text-dark fw-bold mb-3">
                    <i class="fas fa-history text-info me-2"></i>
                    Timeline
                </h6>
                
                <div class="timeline-item">
                    <div class="fw-semibold text-dark">Sub Kategori Dibuat</div>
                    <small class="text-muted">{{ $subcategory->created_at->format('d M Y H:i') }}</small>
                </div>
                
                @if($subcategory->updated_at != $subcategory->created_at)
                <div class="timeline-item">
                    <div class="fw-semibold text-dark">Terakhir Diupdate</div>
                    <small class="text-muted">{{ $subcategory->updated_at->format('d M Y H:i') }}</small>
                </div>
                @endif
                
                @if($subcategory->products->count() > 0)
                <div class="timeline-item">
                    <div class="fw-semibold text-dark">Produk Terakhir</div>
                    <small class="text-muted">{{ $subcategory->products->first()->created_at->format('d M Y H:i') }}</small>
                </div>
                @endif
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="premium-card mt-3">
            <div class="card-body p-4">
                <h6 class="text-dark fw-bold mb-3">
                    <i class="fas fa-lightning-bolt text-warning me-2"></i>
                    Aksi Cepat
                </h6>
                
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.products.create') }}?subcategory={{ $subcategory->id }}" class="premium-btn">
                        <i class="fas fa-plus"></i>
                        Tambah Produk
                    </a>
                    <a href="{{ route('admin.subcategories.edit', $subcategory) }}" class="premium-btn" style="background: rgba(255, 255, 255, 0.95); border: 2px solid rgba(139, 0, 0, 0.3); color: #8b0000;">
                        <i class="fas fa-edit"></i>
                        Edit Sub Kategori
                    </a>
                    <a href="{{ route('admin.categories.show', $subcategory->category) }}" class="premium-btn" style="background: rgba(255, 255, 255, 0.95); border: 2px solid rgba(139, 0, 0, 0.3); color: #8b0000;">
                        <i class="fas fa-folder"></i>
                        Lihat Kategori Induk
                    </a>
                    @if($subcategory->products->count() == 0)
                    <button type="button" class="premium-btn" style="background: linear-gradient(135deg, #dc3545, #c82333);" onclick="deleteSubcategory({{ $subcategory->id }})">
                        <i class="fas fa-trash"></i>
                        Hapus Sub Kategori
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.8)); backdrop-filter: blur(10px); border: 1px solid rgba(139, 0, 0, 0.2);">
            <div class="modal-header" style="border-color: rgba(139, 0, 0, 0.2);">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle text-warning me-2"></i>
                    Konfirmasi Hapus
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus sub kategori <strong>{{ $subcategory->name }}</strong>?</p>
                <p class="text-danger mb-0">
                    <i class="fas fa-exclamation-circle me-1"></i>
                    <small>Tindakan ini tidak dapat dibatalkan!</small>
                </p>
            </div>
            <div class="modal-footer" style="border-color: rgba(139, 0, 0, 0.2);">
                <button type="button" class="premium-btn" style="background: rgba(255, 255, 255, 0.95); border: 2px solid rgba(139, 0, 0, 0.3); color: #8b0000;" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" action="{{ route('admin.subcategories.destroy', $subcategory) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="premium-btn" style="background: linear-gradient(135deg, #dc3545, #c82333);">
                        <i class="fas fa-trash me-1"></i>
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Delete subcategory function
function deleteSubcategory(subcategoryId) {
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteModal.show();
}

// Add loading states to form submission
document.getElementById('deleteForm').addEventListener('submit', function() {
    const submitBtn = this.querySelector('button[type="submit"]');
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Menghapus...';
    submitBtn.disabled = true;
});
</script>
@endpush
