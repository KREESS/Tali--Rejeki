@extends('admin.components.layout')

@section('title', 'Kategori Admin')

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

.premium-card:hover {
    transform: translateY(-1px);
    box-shadow: 0 8px 25px rgba(139, 0, 0, 0.12);
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
    background: transparent;
    border: 1px solid #8b0000;
    color: #8b0000;
}

.premium-btn-outline:hover {
    background: #8b0000;
    color: white;
}

.premium-table {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    border-radius: 8px;
    overflow: hidden;
    border: 1px solid rgba(139, 0, 0, 0.1);
}

.premium-table th {
    background: linear-gradient(135deg, #8b0000, #a50000);
    color: white;
    font-weight: 500;
    font-size: 0.8rem;
    border: none;
    padding: 12px;
}

.premium-table td {
    background: rgba(255, 255, 255, 0.02);
    border: none;
    padding: 10px 12px;
    vertical-align: middle;
    font-size: 0.85rem;
}

.premium-table tbody tr:hover {
    background: rgba(139, 0, 0, 0.05);
}

.category-stats {
    display: flex;
    gap: 8px;
    align-items: center;
}

.stat-badge {
    background: linear-gradient(135deg, #8b0000, #a50000);
    color: white;
    padding: 3px 10px;
    border-radius: 15px;
    font-size: 0.7rem;
    font-weight: 500;
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

.search-box {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(139, 0, 0, 0.2);
    border-radius: 8px;
    padding: 8px 12px;
    color: #333;
    font-size: 0.85rem;
    transition: all 0.3s ease;
}

.search-box:focus {
    outline: none;
    border-color: #8b0000;
    box-shadow: 0 0 0 3px rgba(139, 0, 0, 0.1);
    background: rgba(255, 255, 255, 0.15);
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

.page-title {
    font-size: 1.4rem;
    font-weight: 600;
    margin-bottom: 8px;
}

.page-subtitle {
    font-size: 0.85rem;
    opacity: 0.8;
}

.btn-group .premium-btn {
    border-radius: 0;
}

.btn-group .premium-btn:first-child {
    border-top-left-radius: 6px;
    border-bottom-left-radius: 6px;
}

.btn-group .premium-btn:last-child {
    border-top-right-radius: 6px;
    border-bottom-right-radius: 6px;
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
                    Kelola Kategori Produk
                </h1>
                <p class="mb-0 page-subtitle">Manajemen kategori produk insulasi industri Tali Rejeki</p>
            </div>
            <a href="{{ route('admin.categories.create') }}" class="premium-btn">
                <i class="fas fa-plus"></i>
                Tambah Kategori
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="premium-card">
            <div class="card-body p-0">
                <!-- Table Actions -->
                <div class="p-3 border-bottom" style="border-color: rgba(139, 0, 0, 0.1) !important;">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="d-flex gap-2">
                                <input type="text" 
                                       class="form-control search-box" 
                                       placeholder="Cari kategori..." 
                                       id="searchInput"
                                       style="max-width: 250px;">
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <span class="text-muted" style="font-size: 0.8rem;">
                                Total: <strong>{{ $categories->total() }}</strong> kategori
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Categories Table -->
                @if($categories->count() > 0)
                    <div class="table-responsive">
                        <table class="table premium-table mb-0">
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>Nama Kategori</th>
                                    <th>Slug</th>
                                    <th>Sub Kategori</th>
                                    <th>Meta Title</th>
                                    <th width="120">Tanggal</th>
                                    <th width="150" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration + ($categories->currentPage() - 1) * $categories->perPage() }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="category-icon me-2">
                                                <i class="fas fa-folder" style="color: #8b0000; font-size: 1rem;"></i>
                                            </div>
                                            <div>
                                                <div class="fw-semibold text-dark">{{ $category->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <code class="text-muted" style="font-size: 0.75rem;">{{ $category->slug }}</code>
                                    </td>
                                    <td>
                                        <div class="category-stats">
                                            <span class="stat-badge">{{ $category->subcategories_count }} sub</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-muted">{{ Str::limit($category->meta_title, 25) }}</span>
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $category->created_at->format('d M Y') }}</small>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.categories.show', $category) }}" 
                                               class="premium-btn premium-btn-sm premium-btn-outline"
                                               title="Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.categories.edit', $category) }}" 
                                               class="premium-btn premium-btn-sm"
                                               title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" 
                                                    class="premium-btn premium-btn-sm"
                                                    style="background: linear-gradient(135deg, #dc3545, #c82333);"
                                                    onclick="deleteCategory({{ $category->id }})"
                                                    title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($categories->hasPages())
                        <div class="p-3 border-top" style="border-color: rgba(139, 0, 0, 0.1) !important;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-muted" style="font-size: 0.8rem;">
                                    Menampilkan {{ $categories->firstItem() }} sampai {{ $categories->lastItem() }} 
                                    dari {{ $categories->total() }} data
                                </div>
                                <div>
                                    {{ $categories->links() }}
                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    <div class="empty-state">
                        <i class="fas fa-folder-open"></i>
                        <h5 style="font-size: 1.1rem;">Belum Ada Kategori</h5>
                        <p class="mb-4" style="font-size: 0.9rem;">Mulai dengan menambahkan kategori produk pertama Anda.</p>
                        <a href="{{ route('admin.categories.create') }}" class="premium-btn">
                            <i class="fas fa-plus"></i>
                            Tambah Kategori Pertama
                        </a>
                    </div>
                @endif
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
                <p style="font-size: 0.9rem;">Apakah Anda yakin ingin menghapus kategori ini?</p>
                <p class="text-warning mb-0">
                    <i class="fas fa-info-circle me-1"></i>
                    <small style="font-size: 0.8rem;">Kategori yang memiliki sub kategori tidak dapat dihapus.</small>
                </p>
            </div>
            <div class="modal-footer" style="border-color: rgba(139, 0, 0, 0.2); padding: 10px 15px;">
                <button type="button" class="premium-btn premium-btn-outline premium-btn-sm" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" style="display: inline;">
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
// Search functionality
document.getElementById('searchInput').addEventListener('keyup', function() {
    const searchValue = this.value.toLowerCase();
    const tableRows = document.querySelectorAll('tbody tr');
    
    tableRows.forEach(row => {
        const categoryName = row.cells[1].textContent.toLowerCase();
        const slug = row.cells[2].textContent.toLowerCase();
        const metaTitle = row.cells[4].textContent.toLowerCase();
        
        if (categoryName.includes(searchValue) || slug.includes(searchValue) || metaTitle.includes(searchValue)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});

// Delete category function
function deleteCategory(categoryId) {
    const deleteForm = document.getElementById('deleteForm');
    deleteForm.action = `/admin/categories/${categoryId}`;
    
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteModal.show();
}

// Add loading states to buttons
document.querySelectorAll('.premium-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        if (this.type === 'submit') {
            this.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Loading...';
            this.disabled = true;
        }
    });
});
</script>
@endpush
