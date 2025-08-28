@extends('admin.components.layout')

@section('title', 'Show Kategori Admin')

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

.premium-btn {
    background: linear-gradient(135deg, #8b0000, #a50000);
    border: none;
    color: white;
    padding: 8px 16px;
    border-radius: 6px;
    font-weight: 500;
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
    box-shadow: 0 4px 12px rgba(139, 0, 0, 0.25);
    color: white;
}

.premium-btn-sm {
    padding: 6px 12px;
    font-size: 0.75rem;
}

.premium-btn-outline {
    background: rgba(255, 255, 255, 0.95);
    border: 1px solid rgba(255, 255, 255, 0.9);
    color: #8b0000;
    font-weight: 500;
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
    border: 1px solid rgba(255, 255, 255, 0.9);
    color: #8b0000;
    font-weight: 500;
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
    padding: 20px;
    border-radius: 12px;
    margin-bottom: 20px;
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
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="80" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="40" cy="60" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>') repeat;
    opacity: 0.3;
}

.page-header-content {
    position: relative;
    z-index: 1;
}

.info-card {
    background: rgba(139, 0, 0, 0.04);
    border: 1px solid rgba(139, 0, 0, 0.08);
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 15px;
}

.info-label {
    font-weight: 500;
    color: #555;
    margin-bottom: 4px;
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.info-value {
    color: #333;
    font-size: 0.9rem;
    font-weight: 500;
}

.stat-card {
    background: linear-gradient(135deg, #8b0000, #a50000);
    color: white;
    border-radius: 8px;
    padding: 15px;
    text-align: center;
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-1px);
    box-shadow: 0 6px 20px rgba(139, 0, 0, 0.25);
}

.stat-number {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 4px;
}

.stat-label {
    font-size: 0.75rem;
    opacity: 0.9;
}

.subcategory-item {
    background: rgba(255, 255, 255, 0.6);
    border: 1px solid rgba(139, 0, 0, 0.08);
    border-radius: 6px;
    padding: 12px;
    margin-bottom: 8px;
    transition: all 0.3s ease;
}

.subcategory-item:hover {
    background: rgba(255, 255, 255, 0.8);
    border-color: rgba(139, 0, 0, 0.15);
    transform: translateX(3px);
}

.timeline-item {
    border-left: 2px solid #8b0000;
    padding-left: 15px;
    padding-bottom: 15px;
    position: relative;
}

.timeline-item::before {
    content: '';
    position: absolute;
    left: -5px;
    top: 0;
    width: 8px;
    height: 8px;
    background: #8b0000;
    border-radius: 50%;
}

.empty-state {
    text-align: center;
    padding: 30px 15px;
    color: #666;
}

.empty-state i {
    font-size: 2.5rem;
    color: #8b0000;
    margin-bottom: 12px;
}

.section-title {
    font-size: 1rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 15px;
}

.page-title {
    font-size: 1.4rem;
    font-weight: 600;
    margin-bottom: 8px;
}

.page-subtitle {
    font-size: 0.85rem;
    opacity: 0.8;
}
</style>
@endpush

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="page-title">
                    <i class="fas fa-folder me-2"></i>
                    {{ $category->name }}
                </h1>
                <p class="mb-0 page-subtitle">Detail lengkap kategori produk</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.categories.edit', $category) }}" class="premium-btn">
                    <i class="fas fa-edit"></i>
                    Edit
                </a>
                <a href="{{ route('admin.categories.index') }}" class="premium-btn premium-btn-outline">
                    <i class="fas fa-arrow-left"></i>
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
                <h6 class="section-title">
                    <i class="fas fa-info-circle text-primary me-2"></i>
                    Informasi Kategori
                </h6>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="info-card">
                            <div class="info-label">Nama Kategori</div>
                            <div class="info-value h6 text-dark">{{ $category->name }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-card">
                            <div class="info-label">Slug URL</div>
                            <div class="info-value">
                                <code>{{ $category->slug }}</code>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="info-card">
                            <div class="info-label">Meta Title</div>
                            <div class="info-value">{{ $category->meta_title ?: 'Tidak diisi' }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-card">
                            <div class="info-label">Dibuat</div>
                            <div class="info-value">{{ $category->created_at->format('d M Y H:i') }}</div>
                        </div>
                    </div>
                </div>

                @if($category->meta_description)
                <div class="info-card">
                    <div class="info-label">Meta Description</div>
                    <div class="info-value">{{ $category->meta_description }}</div>
                </div>
                @endif
            </div>
        </div>

        <!-- Subcategories Section -->
        <div class="premium-card mt-3">
            <div class="card-body p-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="section-title mb-0">
                        <i class="fas fa-folder-open text-success me-2"></i>
                        Sub Kategori ({{ $category->subcategories->count() }})
                    </h6>
                    <a href="{{ route('admin.subcategories.create') }}?category={{ $category->id }}" class="premium-btn premium-btn-sm">
                        <i class="fas fa-plus"></i>
                        Tambah
                    </a>
                </div>

                @if($category->subcategories->count() > 0)
                    @foreach($category->subcategories as $subcategory)
                    <div class="subcategory-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="fw-semibold text-dark" style="font-size: 0.9rem;">{{ $subcategory->name }}</div>
                                <small class="text-muted" style="font-size: 0.75rem;">
                                    <code>{{ $subcategory->slug }}</code> 
                                    • {{ $subcategory->products->count() }} produk
                                    • {{ $subcategory->created_at->format('d M Y') }}
                                </small>
                            </div>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.subcategories.show', $subcategory) }}" 
                                   class="btn btn-sm btn-outline-primary" style="padding: 4px 8px; font-size: 0.7rem;">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.subcategories.edit', $subcategory) }}" 
                                   class="btn btn-sm btn-outline-warning" style="padding: 4px 8px; font-size: 0.7rem;">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="empty-state">
                        <i class="fas fa-folder-plus"></i>
                        <div style="font-size: 0.9rem; font-weight: 500;">Belum Ada Sub Kategori</div>
                        <p class="text-muted mb-3" style="font-size: 0.8rem;">Kategori ini belum memiliki sub kategori.</p>
                        <a href="{{ route('admin.subcategories.create') }}?category={{ $category->id }}" class="premium-btn premium-btn-sm">
                            <i class="fas fa-plus"></i>
                            Tambah Sub Kategori
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
            <div class="col-12 mb-2">
                <div class="stat-card">
                    <div class="stat-number">{{ $category->subcategories->count() }}</div>
                    <div class="stat-label">Sub Kategori</div>
                </div>
            </div>
            <div class="col-12 mb-2">
                <div class="stat-card" style="background: linear-gradient(135deg, #28a745, #20c997);">
                    <div class="stat-number">{{ $category->subcategories->sum(function($sub) { return $sub->products->count(); }) }}</div>
                    <div class="stat-label">Total Produk</div>
                </div>
            </div>
            <div class="col-12 mb-3">
                <div class="stat-card" style="background: linear-gradient(135deg, #17a2b8, #6f42c1);">
                    <div class="stat-number">{{ $category->created_at->diffInDays(now()) }}</div>
                    <div class="stat-label">Hari Sejak Dibuat</div>
                </div>
            </div>
        </div>

        <!-- Timeline -->
        <div class="premium-card">
            <div class="card-body p-3">
                <h6 class="section-title">
                    <i class="fas fa-history text-info me-2"></i>
                    Timeline
                </h6>
                
                <div class="timeline-item">
                    <div class="fw-semibold text-dark" style="font-size: 0.85rem;">Kategori Dibuat</div>
                    <small class="text-muted" style="font-size: 0.75rem;">{{ $category->created_at->format('d M Y H:i') }}</small>
                </div>
                
                @if($category->updated_at != $category->created_at)
                <div class="timeline-item">
                    <div class="fw-semibold text-dark" style="font-size: 0.85rem;">Terakhir Diupdate</div>
                    <small class="text-muted" style="font-size: 0.75rem;">{{ $category->updated_at->format('d M Y H:i') }}</small>
                </div>
                @endif
                
                @if($category->subcategories->count() > 0)
                <div class="timeline-item">
                    <div class="fw-semibold text-dark" style="font-size: 0.85rem;">Sub Kategori Terakhir</div>
                    <small class="text-muted" style="font-size: 0.75rem;">{{ $category->subcategories->sortByDesc('created_at')->first()->created_at->format('d M Y H:i') }}</small>
                </div>
                @endif
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="premium-card mt-3">
            <div class="card-body p-3">
                <h6 class="section-title">
                    <i class="fas fa-lightning-bolt text-warning me-2"></i>
                    Aksi Cepat
                </h6>
                
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.subcategories.create') }}?category={{ $category->id }}" class="premium-btn premium-btn-sm">
                        <i class="fas fa-plus"></i>
                        Tambah Sub Kategori
                    </a>
                    <a href="{{ route('admin.categories.edit', $category) }}" class="premium-btn premium-btn-outline premium-btn-sm">
                        <i class="fas fa-edit"></i>
                        Edit Kategori
                    </a>
                    @if($category->subcategories->count() == 0)
                    <button type="button" class="premium-btn premium-btn-sm" style="background: linear-gradient(135deg, #dc3545, #c82333);" onclick="deleteCategory({{ $category->id }})">
                        <i class="fas fa-trash"></i>
                        Hapus Kategori
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.8)); backdrop-filter: blur(10px); border: 1px solid rgba(139, 0, 0, 0.2);">
            <div class="modal-header" style="border-color: rgba(139, 0, 0, 0.2); padding: 15px;">
                <h6 class="modal-title">
                    <i class="fas fa-exclamation-triangle text-warning me-2"></i>
                    Konfirmasi Hapus
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding: 15px;">
                <p style="font-size: 0.9rem;">Apakah Anda yakin ingin menghapus kategori <strong>{{ $category->name }}</strong>?</p>
                <p class="text-danger mb-0">
                    <i class="fas fa-exclamation-circle me-1"></i>
                    <small style="font-size: 0.8rem;">Tindakan ini tidak dapat dibatalkan!</small>
                </p>
            </div>
            <div class="modal-footer" style="border-color: rgba(139, 0, 0, 0.2); padding: 10px 15px;">
                <button type="button" class="premium-btn premium-btn-outline premium-btn-sm" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" action="{{ route('admin.categories.destroy', $category) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="premium-btn premium-btn-sm" style="background: linear-gradient(135deg, #dc3545, #c82333);">
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
// Delete category function
function deleteCategory(categoryId) {
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
