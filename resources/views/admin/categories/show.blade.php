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

<!-- Delete Modal has been replaced with modern confirmation dialog that is created dynamically via JavaScript -->
@endsection

@push('scripts')
<script>
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
                    // Redirect to index page after successful deletion
                    setTimeout(() => {
                        window.location.href = '/admin/categories';
                    }, 1500);
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
                        border: none;
                        color: #6c757d;
                        padding: 12px 24px;
                        border-radius: 12px;
                        font-weight: 600;
                        font-size: 14px;
                        cursor: pointer;
                        transition: all 0.3s ease;
                        min-width: 100px;
                    " onmouseover="this.style.background='rgba(108, 117, 125, 0.2)'" onmouseout="this.style.background='rgba(108, 117, 125, 0.1)'">
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
@endpush
