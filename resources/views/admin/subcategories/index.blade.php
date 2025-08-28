@extends('admin.components.layout')

@section('title', 'Subkategori Admin')

@push('styles')
<style>
.premium-card {
    background: li.premium-table td {
    background: rgba(255, 255, 255, 0.02);
    border: none;
    padding: 10px 12px;
    vertical-align: middle;
    font-size: 0.85rem;
}radient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
    backdrop-filter: blur(10px);
    border: 1px solid rgba(139, 0,                        <div class="col-md-4 text-end">
                            <small class="text-muted" style="font-size: 0.75rem;">
                                Total: {{ $subcategories->total() }} sub kategori
                            </small>
                        </div>
                    </div>
                </div>);
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(139, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.premium-card:hover {
    transform: translateY(-1px);
    box-shadow: 0 6px 25px rgba(139, 0, 0, 0.12);
}

.premium-btn {
    background: linear-gradient(135deg, #8b0000, #a50000);
    border: none;
    color: white;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.premium-btn:hover {
    background: linear-gradient(135deg, #a50000, #c50000);
    transform: translateY(-1px);
    box-shadow: 0 5px 15px rgba(139, 0, 0, 0.3);
    color: white;
}

.premium-btn-sm {
    padding: 6px 12px;
    font-size: 0.875rem;
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

.premium-table {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    border-radius: 10px;
    overflow: hidden;
    border: 1px solid rgba(139, 0, 0, 0.1);
}

.premium-table th {
    background: linear-gradient(135deg, #8b0000, #a50000);
    color: white;
    font-weight: 600;
    border: none;
    padding: 10px 12px;
    font-size: 0.85rem;
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

.category-badge {
    background: linear-gradient(135deg, #6c757d, #5a6268);
    color: white;
    padding: 3px 8px;
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
}

.category-badge:hover {
    background: linear-gradient(135deg, #5a6268, #495057);
    color: white;
    transform: scale(1.05);
}

.product-count {
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
    padding: 3px 8px;
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 500;
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

.search-box {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(139, 0, 0, 0.2);
    border-radius: 10px;
    padding: 10px 15px;
    color: #333;
    transition: all 0.3s ease;
}

.search-box:focus {
    outline: none;
    border-color: #8b0000;
    box-shadow: 0 0 0 3px rgba(139, 0, 0, 0.1);
    background: rgba(255, 255, 255, 0.15);
}

.filter-select {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(139, 0, 0, 0.2);
    border-radius: 10px;
    padding: 10px 15px;
    color: #333;
    transition: all 0.3s ease;
}

.filter-select:focus {
    outline: none;
    border-color: #8b0000;
    box-shadow: 0 0 0 3px rgba(139, 0, 0, 0.1);
    background: rgba(255, 255, 255, 0.15);
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
</style>
@endpush

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-1" style="font-size: 1.2rem;">
                    <i class="fas fa-folder-open me-2" style="font-size: 1.0rem;"></i>
                    Kelola Sub Kategori
                </h5>
                <p class="mb-0 opacity-75" style="font-size: 0.85rem;">Manajemen sub kategori produk insulasi industri Tali Rejeki</p>
            </div>
            <a href="{{ route('admin.subcategories.create') }}" class="premium-btn" style="padding: 8px 16px; font-size: 0.8rem;">
                <i class="fas fa-plus" style="font-size: 0.75rem;"></i>
                Tambah Sub Kategori
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
                        <div class="col-md-8">
                            <div class="d-flex gap-2">
                                <input type="text" 
                                       class="form-control form-control-sm search-box" 
                                       placeholder="Cari sub kategori..." 
                                       id="searchInput"
                                       style="max-width: 250px; padding: 6px 10px; font-size: 0.85rem;">
                                <select class="form-select form-select-sm filter-select" 
                                        id="categoryFilter"
                                        style="max-width: 180px; padding: 6px 10px; font-size: 0.85rem;">
                                    <option value="">Semua Kategori</option>
                                    @foreach(\App\Models\Category::all() as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 text-end">
                            <span class="text-muted">
                                Total: <strong>{{ $subcategories->total() }}</strong> sub kategori
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Subcategories Table -->
                @if($subcategories->count() > 0)
                    <div class="table-responsive">
                        <table class="table premium-table mb-0">
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>Nama Sub Kategori</th>
                                    <th>Kategori Induk</th>
                                    <th>Slug</th>
                                    <th>Produk</th>
                                    <th>Meta Title</th>
                                    <th width="120">Tanggal</th>
                                    <th width="150" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subcategories as $subcategory)
                                <tr data-category-id="{{ $subcategory->category_id }}">
                                    <td>{{ $loop->iteration + ($subcategories->currentPage() - 1) * $subcategories->perPage() }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="subcategory-icon me-2">
                                                <i class="fas fa-folder-open" style="color: #8b0000; font-size: 1.0rem;"></i>
                                            </div>
                                            <div>
                                                <div class="fw-bold text-dark" style="font-size: 0.85rem;">{{ $subcategory->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.categories.show', $subcategory->category) }}" 
                                           class="category-badge">
                                            {{ $subcategory->category->name }}
                                        </a>
                                    </td>
                                    <td>
                                        <code class="text-muted" style="font-size: 0.75rem;">{{ $subcategory->slug }}</code>
                                    </td>
                                    <td>
                                        <span class="product-count">{{ $subcategory->products_count }} produk</span>
                                    </td>
                                    <td>
                                        <span class="text-muted" style="font-size: 0.8rem;">{{ Str::limit($subcategory->meta_title, 30) }}</span>
                                    </td>
                                    <td>
                                        <small class="text-muted" style="font-size: 0.75rem;">{{ $subcategory->created_at->format('d M Y') }}</small>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.subcategories.show', $subcategory) }}" 
                                               class="premium-btn premium-btn-sm premium-btn-outline"
                                               title="Detail"
                                               style="padding: 4px 8px; font-size: 0.75rem;">
                                                <i class="fas fa-eye" style="font-size: 0.7rem;"></i>
                                            </a>
                                            <a href="{{ route('admin.subcategories.edit', $subcategory) }}" 
                                               class="premium-btn premium-btn-sm"
                                               title="Edit"
                                               style="padding: 4px 8px; font-size: 0.75rem;">
                                                <i class="fas fa-edit" style="font-size: 0.7rem;"></i>
                                            </a>
                                            <button type="button" 
                                                    class="premium-btn premium-btn-sm"
                                                    style="background: linear-gradient(135deg, #dc3545, #c82333); padding: 4px 8px; font-size: 0.75rem;"
                                                    onclick="deleteSubcategory({{ $subcategory->id }})"
                                                    title="Hapus">
                                                <i class="fas fa-trash" style="font-size: 0.7rem;"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($subcategories->hasPages())
                        <div class="p-3 border-top" style="border-color: rgba(139, 0, 0, 0.1) !important;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-muted" style="font-size: 0.8rem;">
                                    Menampilkan {{ $subcategories->firstItem() }} sampai {{ $subcategories->lastItem() }} 
                                    dari {{ $subcategories->total() }} data
                                </div>
                                <div>
                                    {{ $subcategories->links() }}
                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    <div class="empty-state">
                        <i class="fas fa-folder-plus" style="font-size: 3rem;"></i>
                        <h6 style="font-size: 1.0rem;">Belum Ada Sub Kategori</h6>
                        <p class="mb-3" style="font-size: 0.85rem;">Mulai dengan menambahkan sub kategori produk pertama Anda.</p>
                        <a href="{{ route('admin.subcategories.create') }}" class="premium-btn" style="padding: 8px 16px; font-size: 0.8rem;">
                            <i class="fas fa-plus" style="font-size: 0.75rem;"></i>
                            Tambah Sub Kategori Pertama
                        </a>
                    </div>
                @endif
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
                <p>Apakah Anda yakin ingin menghapus sub kategori ini?</p>
                <p class="text-warning mb-0">
                    <i class="fas fa-info-circle me-1"></i>
                    <small>Sub kategori yang memiliki produk tidak dapat dihapus.</small>
                </p>
            </div>
            <div class="modal-footer" style="border-color: rgba(139, 0, 0, 0.2);">
                <button type="button" class="premium-btn premium-btn-outline" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" style="display: inline;">
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
// Search functionality
document.getElementById('searchInput').addEventListener('keyup', function() {
    filterTable();
});

// Category filter functionality
document.getElementById('categoryFilter').addEventListener('change', function() {
    filterTable();
});

function filterTable() {
    const searchValue = document.getElementById('searchInput').value.toLowerCase();
    const categoryFilter = document.getElementById('categoryFilter').value;
    const tableRows = document.querySelectorAll('tbody tr');
    
    tableRows.forEach(row => {
        const subcategoryName = row.cells[1].textContent.toLowerCase();
        const categoryName = row.cells[2].textContent.toLowerCase();
        const slug = row.cells[3].textContent.toLowerCase();
        const metaTitle = row.cells[5].textContent.toLowerCase();
        const categoryId = row.dataset.categoryId;
        
        const matchesSearch = subcategoryName.includes(searchValue) || 
                             categoryName.includes(searchValue) || 
                             slug.includes(searchValue) || 
                             metaTitle.includes(searchValue);
        
        const matchesCategory = !categoryFilter || categoryId === categoryFilter;
        
        if (matchesSearch && matchesCategory) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

// Delete subcategory function
function deleteSubcategory(subcategoryId) {
    const deleteForm = document.getElementById('deleteForm');
    deleteForm.action = `/admin/subcategories/${subcategoryId}`;
    
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

// Clear filters function
function clearFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('categoryFilter').value = '';
    filterTable();
}

// Add clear filters button if needed
document.addEventListener('DOMContentLoaded', function() {
    const filterContainer = document.querySelector('.d-flex.gap-3');
    if (filterContainer) {
        const clearBtn = document.createElement('button');
        clearBtn.type = 'button';
        clearBtn.className = 'premium-btn premium-btn-outline premium-btn-sm';
        clearBtn.innerHTML = '<i class="fas fa-times"></i> Clear';
        clearBtn.onclick = clearFilters;
        filterContainer.appendChild(clearBtn);
    }
});
</script>
@endpush
