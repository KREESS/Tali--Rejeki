@extends('admin.components.layout')

@section('title', 'Subkategori Admin')

@push('styles')
<style>

.premium-card {
    background: white;
    border: 1px solid rgba(139, 0, 0, 0.1);
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(139, 0, 0, 0.08);
    transition: all 0.3s ease;
    z-index: 1;
    position: relative;
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

/* Enhanced button hover effects */
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
    background: white;
    border-radius: 10px;
    overflow: hidden;
    border: 1px solid rgba(139, 0, 0, 0.1);
    z-index: 1;
    position: relative;
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

/* Button click effect */
.premium-btn {
    position: relative;
    overflow: hidden;
    cursor: pointer;
}

.premium-btn:active {
    transform: scale(0.98);
    transition: transform 0.1s ease;
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
                                        <span class="text-muted" style="font-size: 0.8rem;">
                                            {{ $subcategory->meta_title ? Str::limit($subcategory->meta_title, 30) : 'No meta title' }}
                                        </span>
                                    </td>
                                    <td>
                                        <small class="text-muted" style="font-size: 0.75rem;">
                                            {{ $subcategory->created_at ? $subcategory->created_at->format('d M Y') : 'N/A' }}
                                        </small>
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

// Delete subcategory function with modern confirmation
function deleteSubcategory(subcategoryId) {
    showModernConfirm(
        'Hapus Sub Kategori?', 
        'Apakah Anda yakin ingin menghapus sub kategori ini? Peringatan: Sub kategori yang memiliki produk tidak dapat dihapus!',
        'fas fa-trash-alt',
        'danger',
        function() {
            showModernAlert('info', 'Memproses...', 'Sedang menghapus sub kategori, harap tunggu.', 'fas fa-spinner fa-spin', 0);

            fetch(`/admin/subcategories/${subcategoryId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
                return response.json();
            })
            .then(data => {
                removeAlert();

                if (data.success) {
                    showModernAlert('success', 'Berhasil!', data.message || 'Sub kategori berhasil dihapus.', 'fas fa-check-circle');

                    // Remove the row safely
                    setTimeout(() => {
                        const button = document.querySelector(`button[onclick="deleteSubcategory(${subcategoryId})"]`);
                        const row = button ? button.closest('tr') : null;
                        if (row) {
                            row.style.animation = 'fadeOut 0.5s ease-out forwards';
                            setTimeout(() => {
                                row.remove();
                                updateRowNumbers();
                            }, 500);
                        }
                    }, 2000);

                } else {
                    showModernAlert('danger', 'Gagal!', data.message || 'Gagal menghapus sub kategori.', 'fas fa-exclamation-triangle');
                }
            })
            .catch(error => {
                removeAlert();
                console.error('Error:', error);
                showModernAlert('danger', 'Error!', 'Terjadi kesalahan saat menghapus sub kategori: ' + error.message, 'fas fa-exclamation-circle');
            });
        }
    );
}


// Enhanced form submission handling
document.addEventListener('DOMContentLoaded', function() {
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
            ripple.style.position = 'absolute';
            ripple.style.borderRadius = '50%';
            ripple.style.background = 'rgba(255, 255, 255, 0.3)';
            ripple.style.animation = 'ripple-animation 0.6s ease-out';
            ripple.style.pointerEvents = 'none';
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
    
    // Keyboard shortcuts for modern modals
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const modernConfirm = document.getElementById('modernConfirmOverlay');
            if (modernConfirm) {
                removeConfirm();
            }
        }
    });
});

// Clear filters function
function clearFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('categoryFilter').value = '';
    filterTable();
}

// Add clear filters button functionality
document.addEventListener('DOMContentLoaded', function() {
    const filterContainer = document.querySelector('.d-flex.gap-2');
    if (filterContainer) {
        const clearBtn = document.createElement('button');
        clearBtn.type = 'button';
        clearBtn.className = 'premium-btn premium-btn-outline';
        clearBtn.innerHTML = '<i class="fas fa-times"></i> Clear';
        clearBtn.style.padding = '6px 10px';
        clearBtn.style.fontSize = '0.85rem';
        clearBtn.onclick = clearFilters;
        filterContainer.appendChild(clearBtn);
    }
});

// Helper function to update row numbers after deletion
function updateRowNumbers() {
    const rows = document.querySelectorAll('tbody tr');
    rows.forEach((row, index) => {
        const numberCell = row.querySelector('td:first-child');
        if (numberCell) {
            numberCell.textContent = index + 1;
        }
    });
}

// Modern Alert System
function showModernAlert(type, title, message, icon, duration = 4000) {
    // Remove existing alerts
    removeAlert();
    
    const alertTypes = {
        'success': {
            bg: 'linear-gradient(135deg, #d1e7dd, #f8fff9)',
            border: '#badbcc',
            color: '#0f5132',
            iconColor: '#198754'
        },
        'danger': {
            bg: 'linear-gradient(135deg, #f8d7da, #fef5f5)',
            border: '#f5c2c7',
            color: '#842029',
            iconColor: '#dc3545'
        },
        'warning': {
            bg: 'linear-gradient(135deg, #fff3cd, #fffef5)',
            border: '#ffecb5',
            color: '#664d03',
            iconColor: '#ffc107'
        },
        'info': {
            bg: 'linear-gradient(135deg, #d1ecf1, #f5feff)',
            border: '#b6d7e2',
            color: '#055160',
            iconColor: '#0dcaf0'
        }
    };
    
    const alertStyle = alertTypes[type] || alertTypes['info'];
    
    const alertHtml = `
        <div class="modern-alert" id="modernAlert" style="
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 10000;
            min-width: 350px;
            max-width: 450px;
            background: ${alertStyle.bg};
            border: 1px solid ${alertStyle.border};
            border-left: 4px solid ${alertStyle.iconColor};
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            padding: 20px;
            color: ${alertStyle.color};
            font-family: 'Inter', sans-serif;
            animation: slideInRight 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
        ">
            <div style="display: flex; align-items: flex-start; gap: 12px;">
                <div style="
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    background: ${alertStyle.iconColor};
                    color: white;
                    font-size: 16px;
                    flex-shrink: 0;
                    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                ">
                    <i class="${icon}"></i>
                </div>
                <div style="flex: 1; padding-top: 2px;">
                    <div style="font-weight: 600; font-size: 16px; margin-bottom: 4px;">${title}</div>
                    <div style="font-size: 14px; line-height: 1.4; opacity: 0.9;">${message}</div>
                </div>
                <button onclick="removeAlert()" style="
                    background: none;
                    border: none;
                    color: ${alertStyle.color};
                    font-size: 18px;
                    line-height: 1;
                    padding: 0;
                    width: 24px;
                    height: 24px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    border-radius: 50%;
                    opacity: 0.6;
                    transition: all 0.2s ease;
                    cursor: pointer;
                    flex-shrink: 0;
                " onmouseover="this.style.opacity='1'; this.style.background='rgba(0,0,0,0.1)'" onmouseout="this.style.opacity='0.6'; this.style.background='none'">
                    ×
                </button>
            </div>
        </div>
        
        <style>
        @keyframes slideInRight {
            0% {
                transform: translateX(100%);
                opacity: 0;
            }
            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes slideOutRight {
            0% {
                transform: translateX(0) scale(1);
                opacity: 1;
            }
            100% {
                transform: translateX(100%) scale(0.8);
                opacity: 0;
            }
        }
        </style>
    `;
    
    document.body.insertAdjacentHTML('beforeend', alertHtml);
    
    if (duration > 0) {
        setTimeout(() => {
            const alert = document.getElementById('modernAlert');
            if (alert) {
                alert.style.animation = 'slideOutRight 0.4s cubic-bezier(0.4, 0, 0.2, 1) forwards';
                setTimeout(() => removeAlert(), 400);
            }
        }, duration);
    }
}

function removeAlert() {
    const existingAlert = document.getElementById('modernAlert');
    if (existingAlert) {
        existingAlert.remove();
    }
}

// Modern Confirmation Modal
function showModernConfirm(title, message, icon, type = 'danger', onConfirm) {
    const typeColors = {
        'danger': { primary: '#dc3545', secondary: '#f8d7da' },
        'warning': { primary: '#ffc107', secondary: '#fff3cd' },
        'info': { primary: '#0dcaf0', secondary: '#d1ecf1' }
    };
    
    const colors = typeColors[type] || typeColors['danger'];
    
    const modalHtml = `
        <div class="modern-confirm-overlay" id="modernConfirmOverlay" style="
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 10001;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.3s ease;
            backdrop-filter: blur(5px);
        ">
            <div class="modern-confirm-modal" style="
                background: white;
                border-radius: 20px;
                box-shadow: 0 15px 50px rgba(0,0,0,0.3);
                max-width: 450px;
                width: 90%;
                animation: scaleIn 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                overflow: hidden;
            ">
                <div style="
                    background: ${colors.secondary};
                    padding: 30px 30px 20px;
                    text-align: center;
                    border-bottom: 1px solid rgba(0,0,0,0.1);
                ">
                    <div style="
                        display: inline-flex;
                        align-items: center;
                        justify-content: center;
                        width: 60px;
                        height: 60px;
                        border-radius: 50%;
                        background: ${colors.primary};
                        color: white;
                        font-size: 24px;
                        margin-bottom: 20px;
                        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
                    ">
                        <i class="${icon}"></i>
                    </div>
                    <h5 style="margin: 0 0 10px; font-weight: 600; color: #333;">${title}</h5>
                    <p style="margin: 0; color: #666; font-size: 14px; line-height: 1.5;">${message}</p>
                </div>
                
                <div style="
                    padding: 20px 30px;
                    display: flex;
                    gap: 12px;
                    justify-content: flex-end;
                ">
                    <button onclick="removeConfirm()" style="
                        background: rgba(108, 117, 125, 0.1);
                        border: 2px solid rgba(108, 117, 125, 0.3);
                        color: #6c757d;
                        padding: 12px 24px;
                        border-radius: 12px;
                        font-weight: 600;
                        font-size: 14px;
                        cursor: pointer;
                        transition: all 0.3s ease;
                        min-width: 100px;
                    " onmouseover="this.style.background='rgba(108, 117, 125, 0.2)'; this.style.borderColor='#6c757d'" onmouseout="this.style.background='rgba(108, 117, 125, 0.1)'; this.style.borderColor='rgba(108, 117, 125, 0.3)'">
                        Batal
                    </button>
                    <button onclick="confirmAction()" style="
                        background: linear-gradient(135deg, ${colors.primary}, ${colors.primary}dd);
                        border: none;
                        color: white;
                        padding: 12px 24px;
                        border-radius: 12px;
                        font-weight: 600;
                        font-size: 14px;
                        cursor: pointer;
                        transition: all 0.3s ease;
                        min-width: 100px;
                        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
                    " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(0,0,0,0.3)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.2)'">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
        
        <style>
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
        
        @keyframes scaleIn {
            0% {
                transform: scale(0.7);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
        
        @keyframes fadeOut {
            0% { opacity: 1; }
            100% { opacity: 0; }
        }
        
        @keyframes scaleOut {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            100% {
                transform: scale(0.7);
                opacity: 0;
            }
        }
        </style>
    `;
    
    document.body.insertAdjacentHTML('beforeend', modalHtml);
    
    // Store the confirm callback
    window.modernConfirmCallback = onConfirm;
    
    // Close on overlay click
    document.getElementById('modernConfirmOverlay').addEventListener('click', function(e) {
        if (e.target === this) {
            removeConfirm();
        }
    });
    
    // Close on Escape key
    document.addEventListener('keydown', function escapeHandler(e) {
        if (e.key === 'Escape') {
            removeConfirm();
            document.removeEventListener('keydown', escapeHandler);
        }
    });
}

function removeConfirm() {
    const overlay = document.getElementById('modernConfirmOverlay');
    if (overlay) {
        const modal = overlay.querySelector('.modern-confirm-modal');
        modal.style.animation = 'scaleOut 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
        overlay.style.animation = 'fadeOut 0.3s ease';
        setTimeout(() => {
            overlay.remove();
            window.modernConfirmCallback = null;
        }, 300);
    }
}

function confirmAction() {
    if (window.modernConfirmCallback) {
        window.modernConfirmCallback();
    }
    removeConfirm();
}
</script>

<style>
/* Ripple effect styles */
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

/* Row fade out animation */
@keyframes fadeOut {
    0% {
        opacity: 1;
        transform: scale(1);
    }
    100% {
        opacity: 0;
        transform: scale(0.95);
    }
}

/* Loading spinner */
.fa-spinner {
    animation: spin 1s linear infinite !important;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
@endpush
