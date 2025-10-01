@extends('admin.components.layout')

@section('title', 'Kategori Admin')

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
    background: white;
    border-radius: 8px;
    overflow: hidden;
    border: 1px solid rgba(139, 0, 0, 0.1);
    z-index: 1;
    position: relative;
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
    background: white;
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
    background: white;
}

.page-header {
    background: linear-gradient(135deg, #8b0000, #a50000);
    color: white;
    padding: 20px;
    border-radius: 12px;
    margin-bottom: 20px;
    position: relative;
    overflow: hidden;
    z-index: 1;
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
                                        <small class="text-muted">
                                            {{ optional($category->created_at)->format('d M Y') ?? '-' }}
                                        </small>
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

// Delete category function with modern confirmation
function deleteCategory(categoryId) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]');
    if (!csrfToken) {
        showModernAlert('danger', 'Error!', 'CSRF token tidak ditemukan.', 'fas fa-exclamation-circle');
        return;
    }

    // Ensure categoryId is valid
    if (!categoryId) {
        showModernAlert('danger', 'Error!', 'ID kategori tidak valid.', 'fas fa-exclamation-circle');
        return;
    }

    showModernConfirm(
        'Hapus Kategori?', 
        'Apakah Anda yakin ingin menghapus kategori ini? Peringatan: Kategori yang memiliki sub kategori atau produk tidak dapat dihapus!',
        'fas fa-trash-alt',
        'danger',
        async function() {
            try {
                showModernAlert('info', 'Memproses...', 'Sedang menghapus kategori, harap tunggu.', 'fas fa-spinner fa-spin', 0);

                const response = await fetch(`/admin/categories/${categoryId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    credentials: 'same-origin'
                });

                let data;
                try {
                    data = await response.json();
                } catch (e) {
                    throw new Error(`Gagal mengurai respons: ${response.statusText}`);
                }

                removeAlert();

                // Check for specific error responses
                if (!response.ok) {
                    if (response.status === 404) {
                        throw new Error('Kategori tidak ditemukan');
                    } else if (response.status === 403) {
                        throw new Error('Anda tidak memiliki izin untuk menghapus kategori ini');
                    } else if (response.status === 409) {
                        throw new Error(data.message || 'Kategori tidak dapat dihapus karena masih memiliki sub kategori atau produk');
                    } else {
                        throw new Error(data.message || 'Terjadi kesalahan saat menghapus kategori');
                    }
                }

                if (data.success) {
                    showModernAlert('success', 'Berhasil!', data.message || 'Kategori berhasil dihapus.', 'fas fa-check-circle');

                    // Remove the row with animation
                    const button = document.querySelector(`button[onclick="deleteCategory(${categoryId})"]`);
                    const row = button?.closest('tr');
                    if (row) {
                        row.style.animation = 'fadeOut 0.5s ease-out forwards';
                        await new Promise(resolve => setTimeout(resolve, 500));
                        row.remove();
                        updateRowNumbers();
                    } else {
                        // If row not found, refresh the page
                        location.reload();
                    }
                } else {
                    showModernAlert('danger', 'Gagal!', data.message || 'Gagal menghapus kategori.', 'fas fa-exclamation-triangle');
                }
            } catch (error) {
                removeAlert();
                console.error('Error:', error);
                showModernAlert('danger', 'Error!', error.message || 'Terjadi kesalahan saat menghapus kategori', 'fas fa-exclamation-circle');
            }
        }
    );
}

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
