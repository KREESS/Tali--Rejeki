@extends('admin.components.layout')

@section('title', 'Kategori Artikel')

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

@if(session('error'))
<div class="modern-alert alert-error" id="errorAlert">
    <div class="alert-icon">
        <i class="fas fa-exclamation-circle"></i>
    </div>
    <div class="alert-content">
        <div class="alert-title">Error!</div>
        <div class="alert-message">{{ session('error') }}</div>
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
        <div class="loading-message" id="loadingMessage">Sedang memuat data kategori</div>
    </div>
</div>

<div class="premium-content-wrapper">
    <div class="content-header">
        <div class="header-left">
            <h1 class="page-title">
                <i class="fas fa-folder-open"></i>
                Kategori Artikel
            </h1>
            <p class="page-subtitle">Kelola dan atur kategori untuk artikel dan blog Anda</p>
        </div>
        <div class="header-actions">
            <a href="{{ route('admin.article-categories.create') }}" class="btn btn-red btn-compact">
                <i class="fas fa-plus"></i>
                Tambah Kategori
            </a>
        </div>
    </div>

    <!-- Statistics Row -->
    <div class="content-body">
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-folder"></i>
                    </div>
                    <div class="stat-info">
                        <h3>{{ $categories->total() }}</h3>
                        <p>Total Kategori</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon published">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <div class="stat-info">
                        <h3>{{ $categories->sum('articles_count') }}</h3>
                        <p>Total Artikel</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon draft">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-info">
                        <h3>{{ $categories->where('created_at', '>=', now()->startOfMonth())->count() }}</h3>
                        <p>Bulan Ini</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stat-card">
                    <div class="stat-icon views">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="stat-info">
                        <h3>{{ $categories->where('articles_count', '>', 0)->count() }}</h3>
                        <p>Aktif</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content -->
        <div class="premium-card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-list"></i>
                    Daftar Kategori (<span class="category-count">{{ $categories->total() }}</span>)
                </h3>
                <div class="card-actions">
                    <div class="search-box-mini">
                        <input type="text" class="form-control form-control-sm" placeholder="Cari kategori..." id="searchInput">
                        <i class="fas fa-search search-icon"></i>
                    </div>
                </div>
            </div>
            
            <div class="card-body compact-body">
                @if($categories->count() > 0)
                    <div class="categories-grid">
                        @foreach($categories as $category)
                        <div class="category-card" data-category-name="{{ strtolower($category->name) }}">
                            <div class="category-header">
                                <div class="category-icon">
                                    <i class="fas fa-folder"></i>
                                </div>
                                <div class="category-info">
                                    <h5 class="category-name">{{ $category->name }}</h5>
                                    <div class="category-meta">
                                        <span class="category-slug">{{ $category->slug }}</span>
                                        <span class="category-date">{{ $category->created_at->format('d M Y') }}</span>
                                    </div>
                                </div>
                                <div class="category-stats">
                                    <div class="stat-item">
                                        <span class="stat-number">{{ $category->articles_count }}</span>
                                        <span class="stat-label">Artikel</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="category-body">
                                <div class="category-description">
                                    <p>
                                    @if($category->articles_count > 0)
                                        Berisi {{ $category->articles_count }} artikel. Terakhir diupdate {{ $category->updated_at->diffForHumans() }}.
                                    @else
                                        Kategori kosong. Belum ada artikel yang ditambahkan.
                                    @endif
                                    </p>
                                </div>
                                
                                <div class="progress-bar-container">
                                    <div class="progress-info">
                                        <span>Aktivitas</span>
                                        <span>{{ $category->articles_count > 0 ? 'Aktif' : 'Kosong' }}</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: {{ $category->articles_count > 0 ? min(($category->articles_count / max($categories->max('articles_count'), 1)) * 100, 100) : 0 }}%"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="category-actions">
                                <a href="{{ route('admin.article-categories.show', $category) }}" 
                                   class="btn btn-sm btn-red-outline" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                    Detail
                                </a>
                                <a href="{{ route('admin.article-categories.edit', $category) }}" 
                                   class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </a>
                                <button type="button" class="btn btn-sm btn-danger delete-category-btn" 
                                        data-category-id="{{ $category->id }}"
                                        data-category-name="{{ $category->name }}"
                                        data-articles-count="{{ $category->articles_count }}"
                                        title="Hapus">
                                    <i class="fas fa-trash"></i>
                                    Hapus
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-wrapper">
                        {{ $categories->links() }}
                    </div>
                @else
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fas fa-folder-plus"></i>
                        </div>
                        <h4>Belum Ada Kategori</h4>
                        <p>Mulai dengan membuat kategori artikel pertama Anda untuk mengorganisir konten</p>
                        <a href="{{ route('admin.article-categories.create') }}" class="btn btn-red btn-compact">
                            <i class="fas fa-plus"></i>
                            Buat Kategori Pertama
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle"></i>
                    Konfirmasi Hapus Kategori
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <strong>PERINGATAN:</strong> Tindakan ini akan menghapus kategori dan semua artikel di dalamnya!
                </div>
                
                <div class="category-preview">
                    <div class="preview-icon">
                        <i class="fas fa-folder"></i>
                    </div>
                    <div class="preview-content">
                        <strong id="categoryNamePreview"></strong>
                        <small class="text-muted d-block">
                            <span id="articlesCountPreview"></span> artikel akan ikut terhapus
                        </small>
                    </div>
                </div>
                
                <p>Apakah Anda yakin ingin menghapus kategori ini? Semua artikel dalam kategori akan ikut terhapus dan tidak dapat dikembalikan.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i>
                    Batal
                </button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                        Hapus Kategori
                    </button>
                </form>
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
    min-width: 320px;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
    z-index: 9999;
    display: flex;
    align-items: flex-start;
    gap: 12px;
    animation: slideInRight 0.4s ease-out;
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

.alert-warning {
    background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
    border-left: 3px solid #ffc107;
    color: #856404;
}

.alert-info {
    background: linear-gradient(135deg, #d1ecf1 0%, #b8daff 100%);
    border-left: 3px solid #17a2b8;
    color: #0c5460;
}

.alert-icon {
    font-size: 1.2rem;
    margin-top: 1px;
}

.alert-content {
    flex: 1;
}

.alert-title {
    font-weight: 600;
    font-size: 0.9rem;
    margin-bottom: 3px;
}

.alert-message {
    font-size: 0.8rem;
    line-height: 1.3;
}

.alert-close {
    background: none;
    border: none;
    font-size: 1rem;
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
    min-width: 280px;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    z-index: 9999;
    display: none;
    align-items: flex-start;
    gap: 12px;
    animation: slideInRight 0.4s ease-out;
    backdrop-filter: blur(8px);
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    border-left: 4px solid #8b0000;
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
    width: 24px;
    height: 24px;
}

.loading-spinner {
    width: 20px;
    height: 20px;
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
    font-size: 0.9rem;
    margin-bottom: 3px;
    color: #333;
}

.loading-message {
    font-size: 0.8rem;
    line-height: 1.3;
    color: #666;
}

/* Pulse animation for loading states */
@keyframes pulse {
    0% {
        opacity: 1;
    }
    50% {
        opacity: 0.5;
    }
    100% {
        opacity: 1;
    }
}

.loading-pulse {
    animation: pulse 1.5s ease-in-out infinite;
}

/* Premium Red Theme - Compact Version */
.premium-content-wrapper {
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    min-height: 100vh;
    padding: 1rem;
}

.content-header {
    background: linear-gradient(135deg, #8b0000 0%, #a50000 100%);
    color: white;
    padding: 1.2rem;
    border-radius: 12px;
    margin-bottom: 1.2rem;
    box-shadow: 0 8px 25px rgba(139, 0, 0, 0.25);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.page-title {
    font-size: 1.4rem;
    font-weight: 700;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 10px;
}

.page-subtitle {
    font-size: 0.8rem;
    margin: 4px 0 0 0;
    opacity: 0.85;
}

.btn-compact {
    padding: 6px 14px;
    font-size: 0.75rem;
}

.btn-red {
    background: linear-gradient(135deg, #8b0000 0%, #a50000 100%);
    border: none;
    color: white;
    padding: 8px 16px;
    border-radius: 6px;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 3px 12px rgba(139, 0, 0, 0.3);
    font-size: 0.8rem;
}

.btn-red:hover {
    transform: translateY(-1px);
    box-shadow: 0 5px 15px rgba(139, 0, 0, 0.4);
    color: white;
}

.premium-card {
    background: white;
    border-radius: 12px;
    border: none;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
    overflow: hidden;
    transition: all 0.3s ease;
}

.card-header {
    background: linear-gradient(135deg, #8b0000 0%, #a50000 100%);
    color: white;
    padding: 0.8rem 1rem;
    border-bottom: none;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-title {
    margin: 0;
    font-size: 0.9rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
}

.card-body {
    padding: 1.2rem;
}

.compact-body {
    padding: 0.8rem;
}

/* Statistics Cards */
.stat-card {
    background: white;
    border-radius: 8px;
    padding: 1rem;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
    border-left: 3px solid #8b0000;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 12px;
    height: 100%;
}

.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
}

.stat-icon {
    width: 45px;
    height: 45px;
    background: linear-gradient(135deg, #8b0000 0%, #a50000 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.1rem;
}

.stat-icon.published {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
}

.stat-icon.draft {
    background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
}

.stat-icon.views {
    background: linear-gradient(135deg, #17a2b8 0%, #6f42c1 100%);
}

.stat-info h3 {
    margin: 0;
    font-size: 1.4rem;
    font-weight: 700;
    color: #333;
    line-height: 1;
}

.stat-info p {
    margin: 3px 0 0 0;
    font-size: 0.75rem;
    color: #666;
    font-weight: 500;
}

/* Search Box Mini */
.search-box-mini {
    position: relative;
    width: 200px;
}

.search-box-mini .form-control {
    padding-right: 35px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    background: rgba(255, 255, 255, 0.1);
    color: white;
    font-size: 0.75rem;
}

.search-box-mini .form-control::placeholder {
    color: rgba(255, 255, 255, 0.7);
}

.search-box-mini .search-icon {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    color: rgba(255, 255, 255, 0.7);
    font-size: 0.8rem;
}

/* Categories Grid */
.categories-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.category-card {
    background: white;
    border: 1px solid #e9ecef;
    border-radius: 10px;
    padding: 1rem;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.category-card:hover {
    border-color: #8b0000;
    box-shadow: 0 6px 20px rgba(139, 0, 0, 0.15);
    transform: translateY(-2px);
}

.category-header {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    margin-bottom: 12px;
}

.category-icon {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #8b0000 0%, #a50000 100%);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1rem;
    flex-shrink: 0;
}

.category-info {
    flex: 1;
}

.category-name {
    font-size: 1rem;
    font-weight: 600;
    margin: 0 0 4px 0;
    color: #333;
}

.category-meta {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.category-slug {
    background: #f8f9fa;
    color: #6c757d;
    padding: 2px 6px;
    border-radius: 4px;
    font-size: 0.65rem;
    font-family: monospace;
    width: fit-content;
}

.category-date {
    font-size: 0.65rem;
    color: #999;
}

.category-stats {
    text-align: center;
}

.stat-item {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.stat-number {
    font-size: 1.2rem;
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

.category-body {
    margin-bottom: 12px;
}

.category-description {
    margin-bottom: 10px;
}

.category-description p {
    font-size: 0.75rem;
    color: #666;
    line-height: 1.4;
    margin: 0;
}

.progress-bar-container {
    margin-bottom: 8px;
}

.progress-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 4px;
}

.progress-info span {
    font-size: 0.7rem;
    color: #666;
    font-weight: 500;
}

.progress {
    height: 4px;
    background: #e9ecef;
    border-radius: 2px;
    overflow: hidden;
}

.progress-bar {
    height: 100%;
    background: linear-gradient(135deg, #8b0000 0%, #a50000 100%);
    transition: width 0.6s ease;
}

.category-actions {
    display: flex;
    gap: 6px;
    justify-content: flex-end;
}

.btn-sm {
    padding: 4px 10px;
    font-size: 0.7rem;
    border-radius: 4px;
}

.btn-red-outline {
    background: transparent;
    border: 1px solid #8b0000;
    color: #8b0000;
    transition: all 0.3s ease;
}

.btn-red-outline:hover {
    background: #8b0000;
    color: white;
}

.btn-warning {
    background: #ffc107;
    border-color: #ffc107;
    color: #212529;
}

.btn-warning:hover {
    background: #e0a800;
    border-color: #d39e00;
}

.btn-danger {
    background: #dc3545;
    border-color: #dc3545;
    color: white;
}

.btn-danger:hover {
    background: #c82333;
    border-color: #bd2130;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 2rem 1rem;
    color: #666;
}

.empty-icon {
    font-size: 3rem;
    color: #8b0000;
    margin-bottom: 1rem;
    opacity: 0.4;
}

.empty-state h4 {
    color: #333;
    margin-bottom: 8px;
    font-weight: 600;
    font-size: 1rem;
}

.empty-state p {
    margin-bottom: 1.5rem;
    font-size: 0.8rem;
    max-width: 400px;
    margin-left: auto;
    margin-right: auto;
}

/* Modal Enhancements */
.modal-content {
    border: none;
    border-radius: 12px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
}

.modal-header {
    border-radius: 12px 12px 0 0;
    padding: 1.2rem 1.5rem;
}

.modal-title {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 1rem;
    font-weight: 600;
    margin: 0;
}

.btn-close-white {
    filter: invert(1) grayscale(100%) brightness(200%);
}

.category-preview {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px;
    background: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    margin: 12px 0;
}

.preview-icon {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1rem;
    flex-shrink: 0;
}

/* Pagination */
.pagination-wrapper {
    margin-top: 1.5rem;
    padding-top: 1rem;
    border-top: 1px solid #e9ecef;
}

/* Responsive Design */
@media (max-width: 768px) {
    .premium-content-wrapper {
        padding: 0.5rem;
    }
    
    .content-header {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }
    
    .categories-grid {
        grid-template-columns: 1fr;
    }
    
    .search-box-mini {
        width: 100%;
    }
}

@media (max-width: 480px) {
    .category-header {
        flex-direction: column;
        text-align: center;
        gap: 8px;
    }
    
    .category-actions {
        justify-content: center;
    }
    
    .stat-card {
        padding: 0.8rem;
    }
}
</style>

<script>
// Loading Notification System
function showLoading(message = 'Memproses data...') {
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

// Auto close alerts after 5 seconds
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.modern-alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            closeAlert(alert.id);
        }, 5000);
    });
});

// Enhanced Search functionality with loading
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const categoryCards = document.querySelectorAll('.category-card');
    let searchTimeout;
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            const searchTerm = this.value.toLowerCase();
            
            if (searchTerm.length > 0) {
                showLoading('Mencari kategori...');
                
                searchTimeout = setTimeout(() => {
                    let visibleCount = 0;
                    
                    categoryCards.forEach(card => {
                        const categoryName = card.dataset.categoryName;
                        if (categoryName.includes(searchTerm)) {
                            card.style.display = 'block';
                            visibleCount++;
                        } else {
                            card.style.display = 'none';
                        }
                    });
                    
                    hideLoading();
                    
                    // Show result notification
                    if (visibleCount === 0) {
                        showAlert('warning', 'Pencarian', `Tidak ditemukan kategori dengan kata kunci "${searchTerm}"`);
                    } else {
                        showAlert('success', 'Pencarian', `Ditemukan ${visibleCount} kategori`);
                    }
                }, 500);
            } else {
                hideLoading();
                categoryCards.forEach(card => {
                    card.style.display = 'block';
                });
            }
        });
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

// Delete confirmation with loading
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-category-btn');
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    const deleteForm = document.getElementById('deleteForm');
    const categoryNamePreview = document.getElementById('categoryNamePreview');
    const articlesCountPreview = document.getElementById('articlesCountPreview');
    
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            showLoading('Memuat data kategori...');
            
            setTimeout(() => {
                const categoryId = this.dataset.categoryId;
                const categoryName = this.dataset.categoryName;
                const articlesCount = this.dataset.articlesCount;
                
                // Update modal content
                categoryNamePreview.textContent = categoryName;
                articlesCountPreview.textContent = articlesCount;
                
                // Update form action
                deleteForm.action = `{{ route('admin.article-categories.index') }}/${categoryId}`;
                
                hideLoading();
                
                // Show modal
                deleteModal.show();
            }, 800);
        });
    });
    
    // Handle form submission with loading
    if (deleteForm) {
        deleteForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            showLoading('Menghapus kategori dan artikel...');
            
            // Add loading state to submit button
            const submitBtn = deleteForm.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Menghapus...';
            submitBtn.disabled = true;
            
            // Simulate processing time
            setTimeout(() => {
                // Submit the form
                this.submit();
            }, 1500);
        });
    }
});

// Page load animation with loading
document.addEventListener('DOMContentLoaded', function() {
    showLoading('Memuat halaman kategori...');
    
    // Add loading pulse to cards while loading
    const categoryCards = document.querySelectorAll('.category-card');
    categoryCards.forEach(card => {
        card.classList.add('loading-pulse');
    });
    
    setTimeout(() => {
        hideLoading();
        
        // Remove loading pulse
        categoryCards.forEach(card => {
            card.classList.remove('loading-pulse');
        });
        
        showAlert('success', 'Selamat Datang!', 'Halaman kategori artikel berhasil dimuat');
    }, 1200);
});

// Navigation with loading states
document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('a[href]');
    
    links.forEach(link => {
        // Skip external links and javascript links
        if (link.hostname !== window.location.hostname || 
            link.href.startsWith('javascript:') ||
            link.hasAttribute('data-bs-toggle')) {
            return;
        }
        
        link.addEventListener('click', function(e) {
            if (!this.href.includes('#')) {
                showLoading('Memuat halaman...');
            }
        });
    });
});
</script>
@endsection
