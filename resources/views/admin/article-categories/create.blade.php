@extends('admin.components.layout')

@section('title', 'Tambah Kategori Artikel')

@section('content')
<!-- CSRF Token for AJAX requests -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Modern Alert System -->
@if(session('success'))
<div class="modern-alert alert-success" id="successAlert">
    <div class="alert-icon">
        <i class="fas fa-check-circle"></i>
    </div>
    <div class="alert-content">
        <div class="alert-title">Berhasil!</div>
        <div class="alert-message">{{ session('success') }}</div>
    </div>
    <button type="button" class="alert-close" onclick="closeAlert('successAlert')">
        <i class="fas fa-times"></i>
    </button>
</div>
@endif

@if($errors->any())
<div class="modern-alert alert-error" id="errorAlert">
    <div class="alert-icon">
        <i class="fas fa-exclamation-circle"></i>
    </div>
    <div class="alert-content">
        <div class="alert-title">Terjadi Kesalahan!</div>
        <div class="alert-message">
            @foreach($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    </div>
    <button type="button" class="alert-close" onclick="closeAlert('errorAlert')">
        <i class="fas fa-times"></i>
    </button>
</div>
@endif

<!-- Loading Notification -->
<div class="loading-notification" id="loadingNotification">
    <div class="loading-icon">
        <div class="loading-spinner"></div>
    </div>
    <div class="loading-content">
        <div class="loading-title">Memproses...</div>
        <div class="loading-message" id="loadingMessage">Menyimpan kategori artikel</div>
    </div>
</div>

<div class="premium-content-wrapper">
    <div class="content-header compact-header">
        <div class="header-left">
            <h1 class="page-title">
                <i class="fas fa-plus-circle"></i>
                Tambah Kategori
            </h1>
            <p class="page-subtitle">Buat kategori baru untuk artikel</p>
        </div>
        <div class="header-actions">
            <a href="{{ route('admin.article-categories.index') }}" class="btn btn-outline-red btn-compact">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>
    </div>

    <div class="content-body compact-body">
        <div class="row">
            <div class="col-lg-8">
                <div class="premium-card form-card">
                    <div class="card-header compact-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i>
                            Form Kategori
                        </h3>
                    </div>
                    
                    <div class="card-body compact-body">
                        <form action="{{ route('admin.article-categories.store') }}" method="POST" id="createForm">
                            @csrf
                            
                            <div class="form-group compact-form-group">
                                <label for="name" class="form-label required">Nama Kategori</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-tag"></i>
                                    </span>
                                    <input type="text" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name') }}"
                                           placeholder="Masukkan nama kategori"
                                           required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <small class="form-text text-muted">
                                    <i class="fas fa-info-circle"></i>
                                    Slug akan dibuat otomatis
                                </small>
                            </div>

                            <div class="form-actions compact-actions">
                                <button type="submit" class="btn btn-red btn-compact">
                                    <i class="fas fa-save"></i>
                                    Simpan
                                </button>
                                <a href="{{ route('admin.article-categories.index') }}" class="btn btn-outline-secondary btn-compact">
                                    <i class="fas fa-times"></i>
                                    Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="premium-card info-card">
                    <div class="card-header compact-header">
                        <h3 class="card-title">
                            <i class="fas fa-lightbulb"></i>
                            Tips & Info
                        </h3>
                    </div>
                    <div class="card-body compact-body">
                        <div class="info-grid">
                            <div class="info-item">
                                <div class="info-icon success">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="info-content">
                                    <h6>Nama Deskriptif</h6>
                                    <small>Gunakan nama yang jelas dan mudah dipahami</small>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon info">
                                    <i class="fas fa-link"></i>
                                </div>
                                <div class="info-content">
                                    <h6>URL Otomatis</h6>
                                    <small>Slug URL dibuat otomatis dari nama</small>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon warning">
                                    <i class="fas fa-exclamation"></i>
                                </div>
                                <div class="info-content">
                                    <h6>Nama Unik</h6>
                                    <small>Pastikan nama kategori belum digunakan</small>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Stats -->
                        <div class="quick-stats">
                            <div class="stats-header">
                                <i class="fas fa-chart-pie"></i>
                                <span>Statistik Kategori</span>
                            </div>
                            <div class="stats-grid">
                                <div class="stat-mini">
                                    <span class="stat-number">{{ \App\Models\ArticleCategory::count() }}</span>
                                    <span class="stat-label">Total</span>
                                </div>
                                <div class="stat-mini">
                                    <span class="stat-number">{{ \App\Models\Article::count() }}</span>
                                    <span class="stat-label">Artikel</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Modern Alert System */
.modern-alert {
    position: fixed;
    top: 15px;
    right: 15px;
    min-width: 300px;
    padding: 12px;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    z-index: 9999;
    display: flex;
    align-items: flex-start;
    gap: 10px;
    animation: slideInRight 0.3s ease-out;
    backdrop-filter: blur(8px);
}

.alert-success {
    background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
    border-left: 3px solid #28a745;
    color: #155724;
}

.alert-error {
    background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
    border-left: 3px solid #dc3545;
    color: #721c24;
}

.alert-icon {
    font-size: 1.1rem;
    margin-top: 1px;
}

.alert-content {
    flex: 1;
}

.alert-title {
    font-weight: 600;
    font-size: 0.85rem;
    margin-bottom: 2px;
}

.alert-message {
    font-size: 0.75rem;
    line-height: 1.3;
}

.alert-close {
    background: none;
    border: none;
    font-size: 0.9rem;
    cursor: pointer;
    opacity: 0.6;
    transition: opacity 0.3s ease;
    color: inherit;
    padding: 0;
}

.alert-close:hover {
    opacity: 1;
}

@keyframes slideInRight {
    from {
        transform: translateX(350px);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideOutRight {
    from {
        transform: translateX(0);
        opacity: 1;
    }
    to {
        transform: translateX(350px);
        opacity: 0;
    }
}

/* Loading Notification */
.loading-notification {
    position: fixed;
    top: 15px;
    right: 15px;
    min-width: 260px;
    padding: 12px;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.12);
    z-index: 9999;
    display: none;
    align-items: flex-start;
    gap: 10px;
    animation: slideInRight 0.3s ease-out;
    backdrop-filter: blur(8px);
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    border-left: 3px solid #8b0000;
    border: 1px solid rgba(139, 0, 0, 0.1);
}

.loading-notification.show {
    display: flex;
}

.loading-notification.hide {
    animation: slideOutRight 0.3s ease-in forwards;
}

.loading-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 20px;
    height: 20px;
}

.loading-spinner {
    width: 16px;
    height: 16px;
    border: 2px solid rgba(139, 0, 0, 0.3);
    border-top: 2px solid #8b0000;
    border-radius: 50%;
    animation: spin 0.8s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.loading-content {
    flex: 1;
}

.loading-title {
    font-weight: 600;
    font-size: 0.85rem;
    margin-bottom: 2px;
    color: #333;
}

.loading-message {
    font-size: 0.75rem;
    line-height: 1.3;
    color: #666;
}

/* Premium Compact Theme */
.premium-content-wrapper {
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    min-height: 100vh;
    padding: 0.8rem;
}

.content-header.compact-header {
    background: linear-gradient(135deg, #8b0000 0%, #a50000 100%);
    color: white;
    padding: 1rem;
    border-radius: 10px;
    margin-bottom: 1rem;
    box-shadow: 0 6px 20px rgba(139, 0, 0, 0.2);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.page-title {
    font-size: 1.2rem;
    font-weight: 700;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
}

.page-subtitle {
    font-size: 0.75rem;
    margin: 3px 0 0 0;
    opacity: 0.85;
}

.btn-compact {
    padding: 5px 12px;
    font-size: 0.75rem;
    font-weight: 600;
    border-radius: 5px;
}

.btn-red {
    background: linear-gradient(135deg, #8b0000 0%, #a50000 100%);
    border: none;
    color: white;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(139, 0, 0, 0.25);
}

.btn-red:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(139, 0, 0, 0.35);
    color: white;
}

.btn-outline-red {
    background: transparent;
    border: 1px solid rgba(255, 255, 255, 0.5);
    color: white;
    transition: all 0.3s ease;
}

.btn-outline-red:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: white;
    color: white;
}

.content-body.compact-body {
    padding: 0.5rem 0;
}

/* Premium Card Compact */
.premium-card {
    background: white;
    border-radius: 10px;
    border: none;
    box-shadow: 0 3px 12px rgba(0, 0, 0, 0.05);
    overflow: hidden;
    transition: all 0.3s ease;
    margin-bottom: 1rem;
}

.premium-card:hover {
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    transform: translateY(-1px);
}

.card-header.compact-header {
    background: linear-gradient(135deg, #8b0000 0%, #a50000 100%);
    color: white;
    padding: 0.7rem 1rem;
    border-bottom: none;
}

.card-title {
    margin: 0;
    font-size: 0.85rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 6px;
}

.card-body.compact-body {
    padding: 1rem;
}

/* Form Styles */
.form-group.compact-form-group {
    margin-bottom: 1.2rem;
}

.form-label {
    font-size: 0.8rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 0.4rem;
    display: block;
}

.form-label.required::after {
    content: '*';
    color: #e74c3c;
    margin-left: 3px;
}

.input-group {
    position: relative;
}

.input-group-text {
    background: linear-gradient(135deg, #8b0000 0%, #a50000 100%);
    border: 1px solid #8b0000;
    color: white;
    font-size: 0.8rem;
    padding: 0.4rem 0.7rem;
}

.form-control {
    font-size: 0.8rem;
    padding: 0.4rem 0.7rem;
    border: 1px solid #ddd;
    border-radius: 0 5px 5px 0;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #8b0000;
    box-shadow: 0 0 0 0.1rem rgba(139, 0, 0, 0.25);
}

.form-text {
    font-size: 0.7rem;
    margin-top: 0.3rem;
    color: #666;
    display: flex;
    align-items: center;
    gap: 4px;
}

.form-actions.compact-actions {
    display: flex;
    gap: 8px;
    margin-top: 1.5rem;
}

/* Info Card */
.info-card {
    height: fit-content;
}

.info-grid {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-bottom: 1rem;
}

.info-item {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    padding: 0.7rem;
    background: #f8f9fa;
    border-radius: 6px;
    border-left: 3px solid transparent;
    transition: all 0.3s ease;
}

.info-item:hover {
    background: #e9ecef;
    transform: translateX(3px);
}

.info-icon {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 0.8rem;
    flex-shrink: 0;
}

.info-icon.success {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
}

.info-icon.info {
    background: linear-gradient(135deg, #17a2b8 0%, #6f42c1 100%);
}

.info-icon.warning {
    background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
}

.info-content h6 {
    margin: 0 0 2px 0;
    font-size: 0.8rem;
    font-weight: 600;
    color: #333;
}

.info-content small {
    font-size: 0.7rem;
    color: #666;
    line-height: 1.3;
}

/* Quick Stats */
.quick-stats {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 8px;
    padding: 0.8rem;
    border-left: 3px solid #8b0000;
}

.stats-header {
    display: flex;
    align-items: center;
    gap: 6px;
    margin-bottom: 0.7rem;
    font-size: 0.8rem;
    font-weight: 600;
    color: #333;
}

.stats-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
}

.stat-mini {
    text-align: center;
    padding: 0.5rem;
    background: white;
    border-radius: 5px;
    border: 1px solid #dee2e6;
}

.stat-number {
    display: block;
    font-size: 1.1rem;
    font-weight: 700;
    color: #8b0000;
    line-height: 1;
}

.stat-label {
    font-size: 0.65rem;
    color: #666;
    text-transform: uppercase;
    font-weight: 500;
}

/* Responsive Design */
@media (max-width: 768px) {
    .premium-content-wrapper {
        padding: 0.5rem;
    }
    
    .content-header.compact-header {
        flex-direction: column;
        gap: 0.8rem;
        text-align: center;
    }
    
    .form-actions.compact-actions {
        flex-direction: column;
    }
    
    .btn-compact {
        width: 100%;
        justify-content: center;
    }
}

/* Loading States */
.form-loading {
    opacity: 0.6;
    pointer-events: none;
}

.btn.loading {
    position: relative;
    overflow: hidden;
}

.btn.loading::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    animation: loading-shimmer 1.5s infinite;
}

@keyframes loading-shimmer {
    0% { left: -100%; }
    100% { left: 100%; }
}
</style>
<script>
// Loading Notification System
function showLoading(message = 'Memproses...') {
    const loadingNotification = document.getElementById('loadingNotification');
    const loadingMessage = document.getElementById('loadingMessage');
    
    if (loadingNotification && loadingMessage) {
        loadingMessage.textContent = message;
        loadingNotification.classList.remove('hide');
        loadingNotification.classList.add('show');
    }
}

function hideLoading() {
    const loadingNotification = document.getElementById('loadingNotification');
    
    if (loadingNotification) {
        loadingNotification.classList.remove('show');
        loadingNotification.classList.add('hide');
        
        setTimeout(() => {
            loadingNotification.classList.remove('hide');
        }, 300);
    }
}

// Modern Alert System
function closeAlert(alertId) {
    const alert = document.getElementById(alertId);
    if (alert) {
        alert.style.animation = 'slideOutRight 0.3s ease-in forwards';
        setTimeout(() => {
            alert.remove();
        }, 300);
    }
}

// Auto close alerts after 4 seconds
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.modern-alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            closeAlert(alert.id);
        }, 4000);
    });
});

// Enhanced Form Handling
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('createForm');
    const nameInput = document.getElementById('name');
    
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate form
            if (!nameInput.value.trim()) {
                showAlert('error', 'Validasi Error', 'Nama kategori tidak boleh kosong');
                nameInput.focus();
                return;
            }
            
            // Show loading
            showLoading('Menyimpan kategori artikel...');
            
            // Add loading state to form
            form.classList.add('form-loading');
            
            // Add loading state to submit button
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Menyimpan...';
            submitBtn.disabled = true;
            submitBtn.classList.add('loading');
            
            // Show progress messages
            setTimeout(() => {
                showLoading('Memvalidasi data kategori...');
            }, 800);
            
            setTimeout(() => {
                showLoading('Menyimpan ke database...');
            }, 1600);
            
            // Submit form after loading animation
            setTimeout(() => {
                form.submit();
            }, 2500);
        });
    }
    
    // Real-time validation
    if (nameInput) {
        nameInput.addEventListener('input', function() {
            const value = this.value.trim();
            
            if (value.length > 0) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            } else {
                this.classList.remove('is-valid');
            }
        });
        
        // Auto-focus on load
        setTimeout(() => {
            nameInput.focus();
        }, 500);
    }
});

// Enhanced Alert System
function showAlert(type, title, message) {
    const alertId = 'dynamicAlert_' + Date.now();
    const alertClass = type === 'success' ? 'alert-success' : 
                     type === 'warning' ? 'alert-warning' : 
                     type === 'error' ? 'alert-error' : 'alert-info';
    
    const iconClass = type === 'success' ? 'fa-check-circle' : 
                     type === 'warning' ? 'fa-exclamation-triangle' : 
                     type === 'error' ? 'fa-exclamation-circle' : 'fa-info-circle';
    
    const alertHTML = `
        <div class="modern-alert ${alertClass}" id="${alertId}">
            <div class="alert-icon">
                <i class="fas ${iconClass}"></i>
            </div>
            <div class="alert-content">
                <div class="alert-title">${title}</div>
                <div class="alert-message">${message}</div>
            </div>
            <button type="button" class="alert-close" onclick="closeAlert('${alertId}')">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;
    
    document.body.insertAdjacentHTML('beforeend', alertHTML);
    
    // Auto close after 4 seconds
    setTimeout(() => {
        closeAlert(alertId);
    }, 4000);
}

// Page load animation
document.addEventListener('DOMContentLoaded', function() {
    showLoading('Memuat form kategori...');
    
    // Add entrance animation to cards
    const cards = document.querySelectorAll('.premium-card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            card.style.transition = 'all 0.6s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, 200 + (index * 100));
    });
    
    setTimeout(() => {
        hideLoading();
        showAlert('success', 'Siap!', 'Form tambah kategori siap digunakan');
    }, 1000);
});

// Navigation loading
document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('a[href]');
    
    navLinks.forEach(link => {
        if (link.hostname === window.location.hostname && 
            !link.href.startsWith('javascript:') &&
            !link.href.includes('#')) {
            
            link.addEventListener('click', function() {
                showLoading('Memuat halaman...');
                
                // Add visual feedback
                this.style.opacity = '0.6';
                this.style.pointerEvents = 'none';
            });
        }
    });
});

// Keyboard shortcuts
document.addEventListener('keydown', function(e) {
    // Ctrl + S to save
    if (e.ctrlKey && e.key === 's') {
        e.preventDefault();
        const submitBtn = document.querySelector('#createForm button[type="submit"]');
        if (submitBtn && !submitBtn.disabled) {
            submitBtn.click();
        }
    }
    
    // Escape to go back
    if (e.key === 'Escape') {
        const backBtn = document.querySelector('a[href*="index"]');
        if (backBtn) {
            backBtn.click();
        }
    }
});
</script>
@endsection
