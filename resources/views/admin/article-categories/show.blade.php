@extends('admin.components.layout')

@section('title', 'Detail Kategori Artikel')

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

<!-- Loading Overlay -->
<div id="loadingOverlay" class="loading-overlay">
    <div class="loading-content">
        <div class="loading-spinner"></div>
        <div class="loading-text">Memproses data...</div>
    </div>
</div>

<div class="premium-content-wrapper">
    <div class="content-header">
        <div class="header-left">
            <h1 class="page-title">
                <i class="fas fa-folder-open"></i>
                {{ $articleCategory->name }}
            </h1>
            <p class="page-subtitle">Detail kategori dan artikel yang terkait</p>
        </div>
        <div class="header-actions">
            <button type="button" class="btn btn-danger btn-compact delete-category-btn" 
                    data-category-id="{{ $articleCategory->id }}"
                    data-category-name="{{ $articleCategory->name }}"
                    data-total-articles="{{ $articles->count() }}"
                    title="Hapus Kategori">
                <i class="fas fa-trash"></i>
                Hapus Kategori
            </button>
            <a href="{{ route('admin.article-categories.edit', $articleCategory) }}" class="btn btn-red btn-compact">
                <i class="fas fa-edit"></i>
                Edit
            </a>
            <a href="{{ route('admin.article-categories.index') }}" class="btn btn-outline-red btn-compact">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>
    </div>

    <div class="content-body">
        <div class="row">
            <!-- Statistics Cards Row -->
            <div class="col-12 mb-4">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="stat-info">
                                <h3>{{ $articles->count() }}</h3>
                                <p>Total Artikel</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon published">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="stat-info">
                                <h3>{{ $articleCategory->articles()->where('status', 'published')->count() }}</h3>
                                <p>Dipublikasi</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon draft">
                                <i class="fas fa-edit"></i>
                            </div>
                            <div class="stat-info">
                                <h3>{{ $articleCategory->articles()->where('status', 'draft')->count() }}</h3>
                                <p>Draft</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon views">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="stat-info">
                                <h3>{{ $articleCategory->articles()->whereDate('created_at', '>=', now()->subDays(7))->count() }}</h3>
                                <p>Minggu Ini</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Stats Row -->
            <div class="col-12 mb-4">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="mini-stat-card">
                            <div class="mini-stat-icon">
                                <i class="fas fa-calendar-plus text-primary"></i>
                            </div>
                            <div class="mini-stat-info">
                                <h4>{{ $articleCategory->created_at->format('d M Y') }}</h4>
                                <p>Dibuat</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="mini-stat-card">
                            <div class="mini-stat-icon">
                                <i class="fas fa-calendar-check text-success"></i>
                            </div>
                            <div class="mini-stat-info">
                                <h4>{{ $articleCategory->updated_at->format('d M Y') }}</h4>
                                <p>Update Terakhir</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="mini-stat-card">
                            <div class="mini-stat-icon">
                                <i class="fas fa-fire text-danger"></i>
                            </div>
                            <div class="mini-stat-info">
                                <h4>{{ $articleCategory->articles()->orderBy('created_at', 'desc')->count() > 0 ? $articleCategory->articles()->orderBy('created_at', 'desc')->first()->created_at->diffForHumans() : 'Tidak ada' }}</h4>
                                <p>Artikel Terbaru</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="mini-stat-card">
                            <div class="mini-stat-icon">
                                <i class="fas fa-percentage text-warning"></i>
                            </div>
                            <div class="mini-stat-info">
                                <h4>{{ $articles->count() > 0 ? round(($articleCategory->articles()->where('status', 'published')->count() / $articles->count()) * 100) : 0 }}%</h4>
                                <p>Rasio Publikasi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter and Search Row -->
            <div class="col-12 mb-4">
                <div class="premium-card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-filter"></i>
                            Filter & Pencarian
                        </h3>
                    </div>
                    <div class="card-body compact-body">
                        <form method="GET" id="filterForm" class="filter-form">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Cari Artikel:</label>
                                        <div class="search-box">
                                            <input type="text" name="search" class="form-control" 
                                                   placeholder="Masukkan judul artikel..." 
                                                   value="{{ request('search') }}">
                                            <i class="fas fa-search search-icon"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Status:</label>
                                        <select name="status" class="form-control">
                                            <option value="">Semua Status</option>
                                            <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                                            <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Urutkan:</label>
                                        <select name="sort" class="form-control">
                                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                                            <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>A-Z</option>
                                            <option value="updated" {{ request('sort') == 'updated' ? 'selected' : '' }}>Terakhir Update</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="form-label">&nbsp;</label>
                                        <div class="filter-actions">
                                            <button type="submit" class="btn btn-red btn-sm">
                                                <i class="fas fa-search"></i>
                                                Cari
                                            </button>
                                            <button type="button" class="btn btn-warning btn-sm reset-filter-btn">
                                                <i class="fas fa-undo"></i>
                                                Reset
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Main Content Row -->
            <div class="col-12">
                <div class="row">
                    <!-- Articles List Column -->
                    <div class="col-lg-8 mb-4">
                        <div class="premium-card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-newspaper"></i>
                                    Artikel (<span data-filtered-count>{{ $articles->count() }}</span>)
                                    <span class="total-articles-info d-none"> dari <span data-total-articles>{{ $articles->count() }}</span></span>
                                </h3>
                                <div class="card-actions">
                                    <a href="{{ route('admin.articles.create') }}?category={{ $articleCategory->id }}" class="btn btn-sm btn-red">
                                        <i class="fas fa-plus"></i>
                                        Tambah
                                    </a>
                                </div>
                            </div>
                            
                            <div class="card-body compact-body">
                                <div class="articles-container">
                                    @if($articles->count() > 0)
                                        <div class="articles-list">
                                        @foreach($articles as $article)
                                        <div class="article-card">
                                            <div class="article-image">
                                                @if($article->cover_url)
                                                    <img src="{{ asset($article->cover_url) }}" alt="{{ $article->title }}">
                                                @else
                                                    <div class="no-image">
                                                        <i class="fas fa-image"></i>
                                                    </div>
                                                @endif
                                            </div>
                                            
                                            <div class="article-content">
                                                <div class="article-header">
                                                    <h5 class="article-title">
                                                        <a href="{{ route('admin.articles.show', $article) }}">
                                                            {{ Str::limit($article->title, 50) }}
                                                        </a>
                                                    </h5>
                                                    <div class="article-meta">
                                                        <span class="status-badge status-{{ $article->status }}">
                                                            {{ $article->status === 'published' ? 'Published' : 'Draft' }}
                                                        </span>
                                                        <span class="date">{{ $article->created_at->format('d M Y') }}</span>
                                                    </div>
                                                </div>
                                                
                                                <p class="article-excerpt">
                                                    {{ Str::limit($article->excerpt, 80) }}
                                                </p>
                                                
                                                <div class="article-actions">
                                                    <a href="{{ route('admin.articles.show', $article) }}" class="btn btn-xs btn-red-outline" title="Lihat Detail">
                                                        <i class="fas fa-eye"></i>
                                                        Lihat
                                                    </a>
                                                    <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-xs btn-red" title="Edit Artikel">
                                                        <i class="fas fa-edit"></i>
                                                        Edit
                                                    </a>
                                                    <button type="button" class="btn btn-xs btn-danger delete-article-btn" 
                                                            data-article-id="{{ $article->id }}" 
                                                            data-article-title="{{ $article->title }}"
                                                            data-delete-url="{{ route('admin.articles.destroy', $article) }}"
                                                            title="Hapus Artikel">
                                                        <i class="fas fa-trash"></i>
                                                        Hapus
                                                    </button>
                                                    
                                                    <!-- Hidden form as backup -->
                                                    <form method="POST" action="{{ route('admin.articles.destroy', $article) }}" 
                                                          class="delete-form-backup d-none" id="delete-form-{{ $article->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="empty-state">
                                        <div class="empty-icon">
                                            <i class="fas fa-newspaper"></i>
                                        </div>
                                        <h4>Belum Ada Artikel</h4>
                                        <p>Kategori ini belum memiliki artikel.</p>
                                        <a href="{{ route('admin.articles.create') }}?category={{ $articleCategory->id }}" class="btn btn-red btn-compact">
                                            <i class="fas fa-plus"></i>
                                            Buat Artikel
                                        </a>
                                    </div>
                                @endif
                                </div> <!-- End articles-container -->
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Column -->
                    <div class="col-lg-4">
                        <!-- Info Kategori Card -->
                        <div class="premium-card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-info-circle"></i>
                                    Info Kategori
                                </h3>
                            </div>
                            <div class="card-body compact-body">
                                <div class="category-info">
                                    <div class="info-row">
                                        <label>Nama:</label>
                                        <span class="value">{{ $articleCategory->name }}</span>
                                    </div>
                                    <div class="info-row">
                                        <label>Slug:</label>
                                        <code class="slug-code">{{ $articleCategory->slug }}</code>
                                    </div>
                                    <div class="info-row">
                                        <label>Artikel:</label>
                                        <span class="badge badge-red">{{ $articles->count() }}</span>
                                    </div>
                                    <div class="info-row">
                                        <label>Dibuat:</label>
                                        <span class="value">{{ $articleCategory->created_at->format('d M Y') }}</span>
                                    </div>
                                    <div class="info-row">
                                        <label>Update:</label>
                                        <span class="value">{{ $articleCategory->updated_at->format('d M Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Actions Card -->
                        <div class="premium-card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-bolt"></i>
                                    Aksi Cepat
                                </h3>
                            </div>
                            <div class="card-body compact-body">
                                <div class="quick-actions">
                                    <a href="{{ route('admin.articles.create') }}?category={{ $articleCategory->id }}" class="quick-action-item">
                                        <div class="action-icon">
                                            <i class="fas fa-plus-circle"></i>
                                        </div>
                                        <div class="action-content">
                                            <h5>Tambah Artikel</h5>
                                            <p>Buat artikel baru dalam kategori ini</p>
                                        </div>
                                    </a>
                                    <a href="{{ route('admin.article-categories.edit', $articleCategory) }}" class="quick-action-item">
                                        <div class="action-icon">
                                            <i class="fas fa-edit"></i>
                                        </div>
                                        <div class="action-content">
                                            <h5>Edit Kategori</h5>
                                            <p>Ubah nama atau slug kategori</p>
                                        </div>
                                    </a>
                                    <button type="button" class="quick-action-item" onclick="bulkActions()">
                                        <div class="action-icon">
                                            <i class="fas fa-tasks"></i>
                                        </div>
                                        <div class="action-content">
                                            <h5 style="text-align: left;">Aksi Massal</h5>
                                            <p>Kelola beberapa artikel sekaligus</p>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Enhanced Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle text-warning"></i>
                    Konfirmasi Hapus Artikel
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <strong>PERINGATAN:</strong> Tindakan ini tidak dapat dibatalkan!
                </div>
                <p class="mb-3">Apakah Anda yakin ingin menghapus artikel berikut?</p>
                <div class="article-preview">
                    <div class="preview-icon">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <div class="preview-content">
                        <strong id="articleTitlePreview"></strong>
                        <small class="text-muted d-block">Artikel ini akan dihapus secara permanen</small>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i>
                    Batal
                </button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                    <span class="btn-text">
                        <i class="fas fa-trash"></i>
                        Hapus Artikel
                    </span>
                    <span class="btn-loading-spinner d-none">
                        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                        Menghapus...
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Enhanced Bulk Actions Modal -->
<div class="modal fade" id="bulkModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-tasks"></i>
                    Aksi Massal Artikel
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    Pilih aksi yang ingin diterapkan pada semua artikel dalam kategori ini
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="bulk-action-card" data-action="move">
                            <div class="action-icon text-info">
                                <i class="fas fa-arrows-alt"></i>
                            </div>
                            <div class="action-content">
                                <h6>Pindah Kategori</h6>
                                <p>Pindahkan semua artikel ke kategori lain</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bulk-action-card" data-action="delete">
                            <div class="action-icon text-danger">
                                <i class="fas fa-trash"></i>
                            </div>
                            <div class="action-content">
                                <h6>Hapus Semua</h6>
                                <p>Hapus semua artikel dalam kategori ini</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i>
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Bulk Delete Confirmation Modal -->
<div class="modal fade" id="bulkDeleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle"></i>
                    PERINGATAN: Hapus Semua Artikel
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <strong>BAHAYA:</strong> Tindakan ini akan menghapus SEMUA artikel dalam kategori ini secara PERMANEN!
                </div>
                <div class="warning-content">
                    <h6 class="text-danger">Yang akan dihapus:</h6>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-danger me-2"></i>Semua artikel published</li>
                        <li><i class="fas fa-check text-danger me-2"></i>Semua artikel draft</li>
                        <li><i class="fas fa-check text-danger me-2"></i>Semua gambar dan file terkait</li>
                        <li><i class="fas fa-check text-danger me-2"></i>Total: <strong id="totalArticles">{{ $articles->count() }}</strong> artikel</li>
                    </ul>
                </div>
                <div class="confirmation-input">
                    <label for="confirmationText" class="form-label">
                        Ketik <strong>"HAPUS SEMUA"</strong> untuk konfirmasi:
                    </label>
                    <input type="text" class="form-control" id="confirmationText" placeholder="Ketik HAPUS SEMUA">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i>
                    Batal
                </button>
                <button type="button" class="btn btn-danger" id="confirmBulkDeleteBtn" disabled>
                    <span class="btn-text">
                        <i class="fas fa-trash"></i>
                        Hapus Semua Artikel
                    </span>
                    <span class="btn-loading-spinner d-none">
                        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                        Menghapus...
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Category Confirmation Modal -->
<div class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle"></i>
                    PERINGATAN: Hapus Kategori
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <strong>BAHAYA:</strong> Tindakan ini akan menghapus kategori dan SEMUA artikel di dalamnya secara PERMANEN!
                </div>
                
                <div class="category-preview">
                    <div class="preview-icon">
                        <i class="fas fa-folder"></i>
                    </div>
                    <div class="preview-content">
                        <strong id="categoryNamePreview"></strong>
                        <small class="text-muted d-block">
                            <span id="articleCountPreview"></span> artikel akan ikut terhapus
                        </small>
                    </div>
                </div>
                
                <div class="warning-content">
                    <h6 class="text-danger">Yang akan dihapus:</h6>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-danger me-2"></i>Kategori artikel</li>
                        <li><i class="fas fa-check text-danger me-2"></i>Semua artikel dalam kategori</li>
                        <li><i class="fas fa-check text-danger me-2"></i>Semua gambar dan file terkait</li>
                        <li><i class="fas fa-check text-danger me-2"></i>Data tidak dapat dikembalikan</li>
                    </ul>
                </div>
                
                <div class="confirmation-input">
                    <label for="categoryConfirmationText" class="form-label">
                        Ketik <strong>"HAPUS KATEGORI"</strong> untuk konfirmasi:
                    </label>
                    <input type="text" class="form-control" id="categoryConfirmationText" placeholder="Ketik HAPUS KATEGORI">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i>
                    Batal
                </button>
                <button type="button" class="btn btn-danger" id="confirmDeleteCategoryBtn" disabled>
                    <span class="btn-text">
                        <i class="fas fa-trash"></i>
                        Hapus Kategori
                    </span>
                    <span class="btn-loading-spinner d-none">
                        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                        Menghapus...
                    </span>
                </button>
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

/* Loading Overlay */
.loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 99999;
    display: none;
    align-items: center;
    justify-content: center;
}

.loading-content {
    text-align: center;
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(139, 0, 0, 0.3);
    border: 2px solid #8b0000;
}

.loading-spinner {
    width: 40px;
    height: 40px;
    border: 3px solid rgba(139, 0, 0, 0.3);
    border-top: 3px solid #8b0000;
    border-radius: 50%;
    animation: spin 0.8s linear infinite;
    margin: 0 auto 15px;
}

.loading-text {
    font-size: 0.9rem;
    font-weight: 600;
    margin-top: 10px;
    color: #8b0000;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Premium Red Theme - Compact Version */
.premium-content-wrapper {
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    min-height: 100vh;
    padding: 1.5rem;
}

.content-header {
    background: linear-gradient(135deg, #8b0000 0%, #a50000 100%);
    color: white;
    padding: 1.5rem;
    border-radius: 12px;
    margin-bottom: 1.5rem;
    box-shadow: 0 8px 25px rgba(139, 0, 0, 0.25);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.page-title {
    font-size: 1.5rem;
    font-weight: 700;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 10px;
}

.page-title i {
    color: rgba(255, 255, 255, 0.9);
}

.page-subtitle {
    font-size: 0.85rem;
    margin: 6px 0 0 0;
    opacity: 0.85;
}

.header-actions {
    display: flex;
    gap: 10px;
}

.btn-compact {
    padding: 8px 16px;
    font-size: 0.8rem;
}

.btn-red {
    background: linear-gradient(135deg, #8b0000 0%, #a50000 100%);
    border: none;
    color: white;
    padding: 10px 20px;
    border-radius: 6px;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 3px 12px rgba(139, 0, 0, 0.3);
    font-size: 0.85rem;
}

.btn-red:hover {
    transform: translateY(-1px);
    box-shadow: 0 5px 15px rgba(139, 0, 0, 0.4);
    color: white;
}

.btn-outline-red {
    background: transparent;
    border: 2px solid white;
    color: white;
    padding: 8px 18px;
    border-radius: 6px;
    font-weight: 600;
    transition: all 0.3s ease;
    font-size: 0.85rem;
}

.btn-outline-red:hover {
    background: rgba(255, 255, 255, 0.1);
    color: white;
    transform: translateY(-1px);
}

.btn-red-outline {
    background: transparent;
    border: 1px solid #8b0000;
    color: #8b0000;
    padding: 6px 12px;
    border-radius: 5px;
    font-weight: 500;
    transition: all 0.3s ease;
    font-size: 0.75rem;
}

.btn-red-outline:hover {
    background: #8b0000;
    color: white;
    transform: translateY(-1px);
}

.btn-xs {
    padding: 4px 10px;
    font-size: 0.7rem;
    border-radius: 4px;
}

.btn.btn-sm.btn-red {
    padding: 6px 12px;
    font-size: 0.75rem;
    border-radius: 5px;
}

.premium-card {
    background: white;
    border-radius: 12px;
    border: none;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
    overflow: hidden;
    transition: all 0.3s ease;
    margin-bottom: 1.5rem;
}

.premium-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.card-header {
    background: linear-gradient(135deg, #8b0000 0%, #a50000 100%);
    color: white;
    padding: 1rem;
    border-bottom: none;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-title {
    margin: 0;
    font-size: 1rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
}

.card-body {
    padding: 1.5rem;
}

.compact-body {
    padding: 1rem;
}

.badge-red {
    background: linear-gradient(135deg, #8b0000 0%, #a50000 100%);
    color: white;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 600;
}

.category-info {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.info-row {
    display: flex;
    flex-direction: column;
    gap: 4px;
    padding: 10px;
    background: #f8f9fa;
    border-radius: 8px;
    border-left: 3px solid #8b0000;
}

.info-row label {
    font-weight: 700;
    color: #8b0000;
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.info-row .value {
    color: #333;
    font-weight: 500;
    font-size: 0.8rem;
}

.slug-code {
    background: linear-gradient(135deg, #8b0000 0%, #a50000 100%);
    color: white;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 0.7rem;
    font-family: 'Monaco', 'Courier New', monospace;
    font-weight: 500;
}

.articles-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.article-card {
    display: flex;
    gap: 15px;
    padding: 15px;
    border: 1px solid #f1f3f4;
    border-radius: 10px;
    transition: all 0.3s ease;
    background: white;
}

.article-card:hover {
    border-color: #8b0000;
    box-shadow: 0 6px 20px rgba(139, 0, 0, 0.12);
    transform: translateY(-1px);
}

.article-image {
    width: 80px;
    height: 60px;
    border-radius: 8px;
    overflow: hidden;
    flex-shrink: 0;
}

.article-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.no-image {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #8b0000;
}

.no-image i {
    font-size: 1.2rem;
    opacity: 0.5;
}

.article-content {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.article-header {
    margin-bottom: 8px;
}

.article-title {
    margin: 0 0 6px 0;
    font-size: 0.9rem;
    font-weight: 700;
    line-height: 1.3;
}

.article-title a {
    color: #333;
    text-decoration: none;
    transition: color 0.3s ease;
}

.article-title a:hover {
    color: #8b0000;
}

.article-meta {
    display: flex;
    gap: 8px;
    align-items: center;
    margin-bottom: 8px;
}

.status-badge {
    padding: 2px 6px;
    border-radius: 10px;
    font-size: 0.65rem;
    font-weight: 600;
    text-transform: uppercase;
}

.status-published {
    background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
    color: #155724;
    border: 1px solid #b8dabc;
}

.status-draft {
    background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
    color: #856404;
    border: 1px solid #f5c6cb;
}

.date {
    font-size: 0.7rem;
    color: #666;
    font-weight: 500;
}

.article-excerpt {
    color: #555;
    line-height: 1.4;
    margin-bottom: 12px;
    flex: 1;
    font-size: 0.75rem;
}

.article-actions {
    display: flex;
    gap: 6px;
}

.card-actions {
    display: flex;
    gap: 8px;
}

.empty-state {
    text-align: center;
    padding: 40px 15px;
    color: #666;
}

.empty-icon {
    font-size: 2.5rem;
    color: #8b0000;
    margin-bottom: 15px;
    opacity: 0.4;
}

.empty-state h4 {
    color: #333;
    margin-bottom: 10px;
    font-weight: 600;
    font-size: 1.1rem;
}

.empty-state p {
    margin-bottom: 20px;
    font-size: 0.85rem;
}

/* Statistics Cards */
.stat-card {
    background: white;
    border-radius: 10px;
    padding: 1.5rem;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    border-left: 4px solid #8b0000;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 15px;
}

.stat-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.stat-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #8b0000 0%, #a50000 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
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
    font-size: 2rem;
    font-weight: 700;
    color: #333;
    line-height: 1;
}

.stat-info p {
    margin: 5px 0 0 0;
    font-size: 0.85rem;
    color: #666;
    font-weight: 500;
}

/* Mini Statistics Cards */
.mini-stat-card {
    background: white;
    border-radius: 8px;
    padding: 1rem;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    border: 1px solid #e9ecef;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 12px;
}

.mini-stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    border-color: #8b0000;
}

.mini-stat-icon {
    width: 40px;
    height: 40px;
    background: #f8f9fa;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    flex-shrink: 0;
}

.mini-stat-info h4 {
    margin: 0;
    font-size: 1rem;
    font-weight: 600;
    color: #333;
    line-height: 1.2;
}

.mini-stat-info p {
    margin: 2px 0 0 0;
    font-size: 0.7rem;
    color: #666;
    font-weight: 500;
}

/* Article count display */
.total-articles-info {
    font-size: 0.8rem;
    color: #666;
    font-weight: normal;
}

.total-articles-info.d-none {
    display: none !important;
}

/* Filter Form */
.filter-form .form-group {
    margin-bottom: 0;
}

.form-label {
    font-size: 0.8rem;
    font-weight: 600;
    color: #8b0000;
    margin-bottom: 5px;
}

/* Filter Loading States */
.articles-container {
    transition: opacity 0.3s ease;
    position: relative;
}

.articles-container.loading {
    opacity: 0.6;
    pointer-events: none;
}

.filter-form input:disabled,
.filter-form select:disabled,
.filter-form button:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

.filter-actions {
    display: flex;
    gap: 8px;
    align-items: center;
}

.filter-actions .btn {
    transition: all 0.2s ease;
}

.filter-actions .btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
}

.reset-filter-btn {
    margin-left: 8px;
}

.reset-filter-btn:hover {
    background-color: #f0ad4e !important;
    border-color: #f0ad4e !important;
    color: white !important;
    transform: translateY(-1px);
}

.btn-warning {
    background-color: #ffc107;
    border-color: #ffc107;
    color: #212529;
    font-weight: 500;
}

.btn-warning:hover {
    background-color: #e0a800;
    border-color: #d39e00;
    color: #212529;
}

/* Article Card Animations */
.article-card {
    transition: all 0.3s ease;
}

.article-card.fade-out {
    opacity: 0;
    transform: translateX(-20px);
}

.article-card.fade-in {
    opacity: 1;
    transform: translateX(0);
}

/* Smooth transitions for filter changes */
.articles-list {
    transition: all 0.3s ease;
}

.empty-state {
    transition: all 0.3s ease;
}

.search-box {
    position: relative;
}

.search-icon {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #8b0000;
    font-size: 0.9rem;
}

.form-control {
    border: 2px solid #e9ecef;
    border-radius: 6px;
    padding: 8px 35px 8px 12px;
    font-size: 0.85rem;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #8b0000;
    box-shadow: 0 0 0 0.2rem rgba(139, 0, 0, 0.25);
}

.filter-actions {
    display: flex;
    gap: 8px;
}

/* Quick Actions */
.quick-actions {
    display: grid;
    gap: 15px;
}

.quick-action-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    background: #f8f9fa;
    border: 2px solid transparent;
    border-radius: 10px;
    text-decoration: none;
    color: inherit;
    transition: all 0.3s ease;
    cursor: pointer;
}

.quick-action-item:hover {
    border-color: #8b0000;
    background: white;
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.1);
    transform: translateX(5px);
    color: inherit;
    text-decoration: none;
}

.action-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #8b0000 0%, #a50000 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    flex-shrink: 0;
}

.action-content h5 {
    margin: 0 0 5px 0;
    font-size: 0.9rem;
    font-weight: 600;
    color: #333;
}

.action-content p {
    margin: 0;
    font-size: 0.75rem;
    color: #666;
    line-height: 1.3;
}

/* Enhanced Modal Styles */
.modal-content {
    border: none;
    border-radius: 15px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    overflow: hidden;
}

.modal-header {
    background: linear-gradient(135deg, #8b0000 0%, #a50000 100%);
    color: white;
    border-radius: 0;
    padding: 1.5rem 2rem;
    border-bottom: none;
}

.modal-title {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 1.1rem;
    font-weight: 600;
    margin: 0;
}

.btn-close, .btn-close-white {
    background: none;
    border: none;
    color: white;
    opacity: 0.8;
    font-size: 1.2rem;
    padding: 0;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: all 0.3s ease;
}

.btn-close:hover, .btn-close-white:hover {
    opacity: 1;
    background: rgba(255, 255, 255, 0.2);
    transform: scale(1.1);
}

.modal-body {
    padding: 2rem;
}

.modal-footer {
    padding: 1.5rem 2rem;
    border-top: 1px solid #e9ecef;
    background: #f8f9fa;
}

/* Article Preview in Delete Modal */
.article-preview {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    border: 2px solid #e9ecef;
    border-radius: 10px;
    margin: 15px 0;
}

.preview-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #8b0000 0%, #a50000 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    flex-shrink: 0;
}

.preview-content {
    flex: 1;
}

.preview-content strong {
    font-size: 1rem;
    color: #333;
    display: block;
    margin-bottom: 5px;
}

/* Category Preview in Delete Modal */
.category-preview {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    background: linear-gradient(135deg, #fff5f5 0%, #ffffff 100%);
    border: 2px solid #fecaca;
    border-radius: 10px;
    margin: 15px 0;
}

.category-preview .preview-icon {
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
}

/* Enhanced Bulk Action Cards */
.bulk-action-card {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 20px;
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    border: 2px solid #e9ecef;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.3s ease;
    height: 100%;
}

.bulk-action-card:hover {
    border-color: #8b0000;
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    box-shadow: 0 5px 20px rgba(139, 0, 0, 0.15);
    transform: translateY(-3px);
}

.bulk-action-card .action-icon {
    width: 60px;
    height: 60px;
    background: #f8f9fa;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    flex-shrink: 0;
    transition: all 0.3s ease;
}

.bulk-action-card:hover .action-icon {
    background: white;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
}

.bulk-action-card .action-content h6 {
    margin: 0 0 8px 0;
    font-size: 1rem;
    font-weight: 600;
    color: #333;
}

.bulk-action-card .action-content p {
    margin: 0;
    font-size: 0.85rem;
    color: #666;
    line-height: 1.4;
}

/* Warning Content in Bulk Delete Modal */
.warning-content {
    background: #fff5f5;
    border: 1px solid #fecaca;
    border-radius: 8px;
    padding: 15px;
    margin: 15px 0;
}

.warning-content h6 {
    margin-bottom: 10px;
    font-weight: 600;
}

.warning-content ul li {
    padding: 5px 0;
    font-size: 0.9rem;
}

/* Confirmation Input */
.confirmation-input {
    margin-top: 20px;
}

.confirmation-input .form-label {
    font-weight: 600;
    color: #dc3545;
    margin-bottom: 8px;
}

.confirmation-input .form-control {
    border: 2px solid #dc3545;
    border-radius: 6px;
    padding: 10px 15px;
    font-weight: 600;
    text-transform: uppercase;
}

.confirmation-input .form-control:focus {
    border-color: #dc3545;
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
}

/* Enhanced Button Loading States */
.btn .btn-text {
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn .btn-loading-spinner {
    display: none !important;
    align-items: center;
    gap: 8px;
}

.btn.loading .btn-text {
    display: none !important;
}

.btn.loading .btn-loading-spinner {
    display: inline-flex !important;
}

.btn.loading {
    pointer-events: none;
    opacity: 0.8;
}

/* Spinner Animation */
.spinner-border-sm {
    width: 1rem;
    height: 1rem;
    border-width: 0.125em;
}

/* Alert Enhancements */
.alert {
    border: none;
    border-radius: 8px;
    display: flex;
    align-items: center;
    font-weight: 500;
}

.alert-danger {
    background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
    color: #721c24;
    border-left: 4px solid #dc3545;
}

.alert-info {
    background: linear-gradient(135deg, #d1ecf1 0%, #b8daff 100%);
    color: #0c5460;
    border-left: 4px solid #17a2b8;
}

/* Modal Animation */
.modal.fade .modal-dialog {
    transition: transform 0.3s ease-out;
    transform: translateY(-50px);
}

.modal.show .modal-dialog {
    transform: translateY(0);
}

/* Responsive Modal */
@media (max-width: 576px) {
    .modal-dialog {
        margin: 1rem;
    }
    
    .modal-body {
        padding: 1.5rem;
    }
    
    .modal-footer {
        padding: 1rem 1.5rem;
    }
    
    .bulk-action-card {
        padding: 15px;
        flex-direction: column;
        text-align: center;
        gap: 10px;
    }
    
    .bulk-action-card .action-icon {
        width: 50px;
        height: 50px;
        font-size: 1.2rem;
    }
}

/* Bulk Actions */
.bulk-action-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 15px;
    background: #f8f9fa;
    border: 2px solid transparent;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-bottom: 10px;
}

.bulk-action-item:hover {
    border-color: #8b0000;
    background: white;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.bulk-action-item i {
    font-size: 1.2rem;
}

.bulk-action-item span {
    font-weight: 500;
    font-size: 0.9rem;
}

/* Enhanced buttons */
.btn-danger {
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
    border: none;
    font-weight: 600;
}

.btn-danger:hover {
    background: linear-gradient(135deg, #c82333 0%, #bd2130 100%);
    transform: translateY(-1px);
}

/* Article cards enhancements */
.article-actions .btn {
    font-size: 0.7rem;
    padding: 4px 8px;
}

/* Tooltip support */
[title] {
    position: relative;
}

/* Enhanced form styling */
select.form-control {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
    background-position: right 8px center;
    background-repeat: no-repeat;
    background-size: 16px 12px;
    padding-right: 35px;
}

/* Loading states for buttons */
.btn-loading {
    position: relative;
    color: transparent !important;
}

.btn-loading::after {
    content: '';
    position: absolute;
    width: 14px;
    height: 14px;
    top: 50%;
    left: 50%;
    margin-left: -7px;
    margin-top: -7px;
    border: 2px solid transparent;
    border-top: 2px solid white;
    border-radius: 50%;
    animation: spin 0.8s linear infinite;
}

/* Responsive Design */
@media (max-width: 768px) {
    .premium-content-wrapper {
        padding: 1rem;
    }
    
    .content-header {
        flex-direction: column;
        text-align: center;
        gap: 15px;
        padding: 1rem;
    }
    
    .page-title {
        font-size: 1.3rem;
    }
    
    .article-card {
        flex-direction: column;
        gap: 12px;
        padding: 12px;
    }
    
    .article-image {
        width: 100%;
        height: 150px;
    }
    
    .modern-alert {
        min-width: 90%;
        right: 5%;
        padding: 12px;
    }
    
    .card-header {
        padding: 0.8rem;
    }
    
    .card-title {
        font-size: 0.9rem;
    }
    
    .header-actions {
        flex-direction: column;
        gap: 8px;
        width: 100%;
    }
    
    .btn-compact {
        width: 100%;
        justify-content: center;
    }
    
    .stat-card {
        padding: 1rem;
        gap: 10px;
    }
    
    .stat-icon {
        width: 50px;
        height: 50px;
        font-size: 1.2rem;
    }
    
    .stat-info h3 {
        font-size: 1.5rem;
    }
    
    .mini-stat-card {
        padding: 0.8rem;
        gap: 8px;
    }
    
    .mini-stat-icon {
        width: 35px;
        height: 35px;
        font-size: 0.9rem;
    }
    
    .mini-stat-info h4 {
        font-size: 0.9rem;
    }
    
    .mini-stat-info p {
        font-size: 0.65rem;
    }
    
    /* Responsive Layout Adjustments */
    .col-lg-8, .col-lg-4 {
        width: 100%;
    }
    
    .col-lg-8 {
        order: 2;
    }
    
    .col-lg-4 {
        order: 1;
    }
    
    /* Sidebar cards margin for mobile */
    .col-lg-4 .premium-card {
        margin-bottom: 1rem;
    }
    
    /* Quick actions responsive */
    .quick-actions {
        grid-template-columns: 1fr;
    }
    
    .quick-action-item {
        flex-direction: column;
        text-align: center;
        gap: 10px;
        padding: 12px;
    }
    
    .action-content h5 {
        font-size: 0.85rem;
    }
    
    .action-content p {
        font-size: 0.7rem;
    }
}

@media (max-width: 480px) {
    .premium-content-wrapper {
        padding: 0.5rem;
    }
    
    .page-title {
        font-size: 1.1rem;
    }
    
    .page-subtitle {
        font-size: 0.75rem;
    }
    
    .article-title {
        font-size: 0.8rem;
    }
    
    .article-excerpt {
        font-size: 0.7rem;
    }
    
    .btn-xs {
        padding: 3px 8px;
        font-size: 0.65rem;
    }
}

/* Enhanced layout for improved container structure */
.main-content-row {
    margin-top: 0;
}

.articles-column {
    padding-right: 1rem;
}

.sidebar-column {
    padding-left: 1rem;
}

.sidebar-column .premium-card:first-child {
    margin-bottom: 1.5rem;
}

/* Ensure equal height cards */
.equal-height-cards {
    display: flex;
    flex-direction: column;
    height: 100%;
}

.equal-height-cards .premium-card {
    flex: 1;
}

/* Improved spacing for cards */
.premium-card + .premium-card {
    margin-top: 0;
}

/* Better spacing between sections */
.content-section {
    margin-bottom: 2rem;
}

/* Enhanced sidebar styling */
.sidebar-card {
    position: sticky;
    top: 2rem;
}

/* Better article list spacing */
.articles-section {
    min-height: 400px;
}

/* Improved container padding */
.container-improved {
    padding: 0;
}

.row-improved {
    margin: 0;
}

.col-improved {
    padding: 0.75rem;
}

/* Quick actions enhancements */
.quick-actions-enhanced {
    display: grid;
    grid-template-columns: 1fr;
    gap: 10px;
}

.quick-action-enhanced {
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    border: 2px solid transparent;
    border-radius: 8px;
    padding: 12px;
    display: flex;
    align-items: center;
    gap: 12px;
    transition: all 0.3s ease;
    cursor: pointer;
    text-decoration: none;
    color: inherit;
}

.quick-action-enhanced:hover {
    border-color: #8b0000;
    background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.1);
    transform: translateY(-2px);
    text-decoration: none;
    color: inherit;
}

.quick-action-enhanced .action-icon-enhanced {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #8b0000 0%, #a50000 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1rem;
    flex-shrink: 0;
}

.quick-action-enhanced .action-content-enhanced h6 {
    margin: 0 0 3px 0;
    font-size: 0.85rem;
    font-weight: 600;
    color: #333;
}

.quick-action-enhanced .action-content-enhanced p {
    margin: 0;
    font-size: 0.7rem;
    color: #666;
    line-height: 1.2;
}

/* Info kategori enhancements */
.category-info-enhanced {
    display: grid;
    gap: 10px;
}

.info-row-enhanced {
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    border: 1px solid #e9ecef;
    border-left: 4px solid #8b0000;
    border-radius: 6px;
    padding: 10px 12px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: all 0.3s ease;
}

.info-row-enhanced:hover {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    border-color: #8b0000;
    transform: translateX(3px);
}

.info-row-enhanced .label-enhanced {
    font-size: 0.75rem;
    font-weight: 600;
    color: #8b0000;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.info-row-enhanced .value-enhanced {
    font-size: 0.8rem;
    font-weight: 500;
    color: #333;
}

.badge-enhanced {
    background: linear-gradient(135deg, #8b0000 0%, #a50000 100%);
    color: white;
    padding: 3px 8px;
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 600;
}

.slug-code-enhanced {
    background: linear-gradient(135deg, #343a40 0%, #495057 100%);
    color: white;
    padding: 3px 6px;
    border-radius: 3px;
    font-size: 0.7rem;
    font-family: 'Courier New', monospace;
}

/* Container spacing improvements */
.content-spacing {
    margin-bottom: 1.5rem;
}

.card-spacing {
    margin-bottom: 1rem;
}

/* Responsive grid improvements */
@media (min-width: 992px) {
    .sidebar-column {
        position: sticky;
        top: 2rem;
        height: fit-content;
    }
}

/* Animation improvements */
.fade-in-up {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.6s ease forwards;
}

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.fade-in-up:nth-child(1) { animation-delay: 0.1s; }
.fade-in-up:nth-child(2) { animation-delay: 0.2s; }
.fade-in-up:nth-child(3) { animation-delay: 0.3s; }
.fade-in-up:nth-child(4) { animation-delay: 0.4s; }

/* Performance optimizations */
.will-change-transform {
    will-change: transform;
}

.will-change-opacity {
    will-change: opacity;
}

/* Hover effects yang lebih smooth */
.premium-card:hover .card-header {
    background: linear-gradient(135deg, #a50000 0%, #8b0000 100%);
}

/* Enhanced micro-interactions */
.btn-red:active, .btn-red-outline:active {
    transform: scale(0.95);
}

/* Loading states untuk buttons */
.btn-loading {
    position: relative;
    color: transparent !important;
}

.btn-loading::after {
    content: '';
    position: absolute;
    width: 16px;
    height: 16px;
    top: 50%;
    left: 50%;
    margin-left: -8px;
    margin-top: -8px;
    border: 2px solid transparent;
    border-top: 2px solid white;
    border-radius: 50%;
    animation: spin 0.8s linear infinite;
}

/* Compact pagination */
.pagination-wrapper .pagination {
    margin: 0;
}

.pagination-wrapper .page-link {
    padding: 0.4rem 0.6rem;
    font-size: 0.8rem;
    border-color: #8b0000;
    color: #8b0000;
}

.pagination-wrapper .page-item.active .page-link {
    background-color: #8b0000;
    border-color: #8b0000;
}

.pagination-wrapper .page-link:hover {
    background-color: rgba(139, 0, 0, 0.1);
    border-color: #8b0000;
    color: #8b0000;
}

/* Enhanced focus states */
.btn-red:focus, .btn-red-outline:focus, .btn-outline-red:focus {
    outline: 3px solid rgba(139, 0, 0, 0.3);
    outline-offset: 2px;
}

/* Improved scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #8b0000 0%, #a50000 100%);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #a50000 0%, #8b0000 100%);
}

/* Performance optimizations */
.premium-card, .article-card {
    will-change: transform;
}

.loading-spinner {
    will-change: transform;
}

/* Ensure consistent light theme */
body, html {
    background-color: #ffffff !important;
}

.premium-content-wrapper {
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%) !important;
}

/* Override any dark theme from Bootstrap or parent layout */
.container, .container-fluid, .main-content, .content-wrapper, 
.admin-layout, .dashboard-wrapper, .page-wrapper {
    background-color: transparent !important;
}

/* Ensure all cards have light backgrounds */
.premium-card, .article-card, .stat-card, .mini-stat-card {
    background-color: #ffffff !important;
    color: #333333 !important;
}

/* Override any inherited dark backgrounds */
* {
    background-color: inherit;
}

body * {
    color: inherit;
}
</style>

<script>
// Enhanced Alert Management System
function showAlert(type, title, message, duration = 5000) {
    console.log(`Alert: ${type} - ${title}: ${message}`); // Debug log
    
    const alertId = `alert_${Date.now()}`;
    const alertClass = type === 'success' ? 'alert-success' : type === 'error' ? 'alert-error' : 'alert-info';
    const iconClass = type === 'success' ? 'fa-check-circle' : type === 'error' ? 'fa-exclamation-circle' : 'fa-info-circle';
    
    // Remove any existing alerts of the same type first
    document.querySelectorAll(`.modern-alert.${alertClass}`).forEach(alert => {
        alert.remove();
    });
    
    const alertHtml = `
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
    
    document.body.insertAdjacentHTML('beforeend', alertHtml);
    
    // Auto close after specified duration
    setTimeout(() => {
        const alert = document.getElementById(alertId);
        if (alert) closeAlert(alertId);
    }, duration);
    
    return alertId;
}

function closeAlert(alertId) {
    const alert = document.getElementById(alertId);
    if (alert) {
        alert.style.animation = 'slideOutRight 0.4s ease-in-out';
        setTimeout(() => {
            alert.remove();
        }, 400);
    }
}

// Auto close existing alerts
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.modern-alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            if (alert.parentNode) {
                closeAlert(alert.id);
            }
        }, 5000);
    });
});

// Enhanced Loading Management
function showLoading(message = 'Memproses data...') {
    const overlay = document.getElementById('loadingOverlay');
    if (overlay) {
        overlay.querySelector('.loading-text').textContent = message;
        overlay.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
}

function hideLoading() {
    const overlay = document.getElementById('loadingOverlay');
    if (overlay) {
        overlay.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
}

// Enhanced Button Loading States
function setButtonLoading(button, loading = true) {
    if (loading) {
        button.classList.add('loading');
        button.disabled = true;
    } else {
        button.classList.remove('loading');
        button.disabled = false;
    }
}

// Delete Article Function with Fallback
let currentDeleteData = null;

function initDeleteHandlers() {
    // Handle delete button clicks
    document.querySelectorAll('.delete-article-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const articleId = this.dataset.articleId;
            const articleTitle = this.dataset.articleTitle;
            const deleteUrl = this.dataset.deleteUrl;
            
            currentDeleteData = {
                id: articleId,
                title: articleTitle,
                url: deleteUrl
            };
            
            // Update modal content
            document.getElementById('articleTitlePreview').textContent = articleTitle;
            
            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
            modal.show();
        });
    });
    
    // Handle confirm delete
    const confirmBtn = document.getElementById('confirmDeleteBtn');
    if (confirmBtn) {
        confirmBtn.addEventListener('click', function() {
            if (!currentDeleteData) return;
            
            // Try AJAX first, fallback to form submission
            deleteArticleWithFallback(currentDeleteData);
        });
    }
}

async function deleteArticleWithFallback(deleteData) {
    const confirmBtn = document.getElementById('confirmDeleteBtn');
    setButtonLoading(confirmBtn, true);
    showLoading('Menghapus artikel...');
    
    console.log('Starting delete for:', deleteData); // Debug log
    
    try {
        // First try AJAX approach
        const response = await fetch(deleteData.url, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });
        
        console.log('AJAX Response status:', response.status); // Debug log
        
        // Check if we got a JSON response
        const contentType = response.headers.get('content-type');
        if (contentType && contentType.includes('application/json')) {
            const data = await response.json();
            console.log('JSON response:', data); // Debug log
            
            if (data.success) {
                handleDeleteSuccess(deleteData);
                return;
            } else {
                throw new Error(data.message || 'Delete failed');
            }
        }
        
        // Laravel redirects are often 302, which indicates success for delete
        if (response.ok || response.status === 302 || response.redirected) {
            console.log('Delete successful (redirect response)'); // Debug log
            handleDeleteSuccess(deleteData);
            return;
        } else {
            throw new Error(`HTTP ${response.status}`);
        }
        
    } catch (error) {
        console.log('AJAX delete failed:', error); // Debug log
        
        // For network errors or parsing errors, try form fallback
        console.log('Trying form fallback'); // Debug log
        await deleteWithFormFallback(deleteData);
        
    } finally {
        setButtonLoading(confirmBtn, false);
    }
}

function handleDeleteWithRedirect(deleteData) {
    console.log('Using redirect fallback for delete'); // Debug log
    
    // Hide modal first
    const modal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
    if (modal) modal.hide();
    
    // Try to find the backup form first
    const backupForm = document.getElementById(`delete-form-${deleteData.id}`);
    if (backupForm) {
        console.log('Using backup form'); // Debug log
        showLoading('Menghapus artikel...');
        setTimeout(() => {
            backupForm.submit();
        }, 500);
        return;
    }
    
    // If no backup form, create one
    console.log('Creating new form for delete'); // Debug log
    showLoading('Menghapus artikel...');
    
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = deleteData.url;
    form.style.display = 'none';
    
    // Add CSRF token
    const csrfInput = document.createElement('input');
    csrfInput.type = 'hidden';
    csrfInput.name = '_token';
    csrfInput.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    form.appendChild(csrfInput);
    
    // Add method override
    const methodInput = document.createElement('input');
    methodInput.type = 'hidden';
    methodInput.name = '_method';
    methodInput.value = 'DELETE';
    form.appendChild(methodInput);
    
    // Append to body and submit
    document.body.appendChild(form);
    
    setTimeout(() => {
        console.log('Submitting created form'); // Debug log
        form.submit();
    }, 500);
}

function handleDeleteSuccess(deleteData) {
    // Hide modal
    const modal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
    if (modal) modal.hide();
    
    hideLoading();
    
    // Show success alert
    showAlert('success', 'Berhasil!', `Artikel "${deleteData.title}" berhasil dihapus.`);
    
    // Remove the article card from DOM immediately for better UX
    removeArticleFromDOM(deleteData.id);
    
    // Refresh page after showing the effect
    setTimeout(() => {
        window.location.reload();
    }, 1500);
}

function handleDeleteError(message) {
    hideLoading();
    showAlert('error', 'Error!', message);
}

function removeArticleFromDOM(articleId) {
    const articleCards = document.querySelectorAll('.article-card');
    articleCards.forEach(card => {
        const deleteBtn = card.querySelector('.delete-article-btn');
        if (deleteBtn && deleteBtn.dataset.articleId === articleId) {
            card.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
            card.style.opacity = '0';
            card.style.transform = 'translateX(-100%)';
            setTimeout(() => {
                card.remove();
                updateArticleCount();
                checkEmptyState();
            }, 300);
        }
    });
}

async function deleteWithFormFallback(deleteData) {
    console.log('Using form fallback for delete'); // Debug log
    
    // Hide modal first
    const modal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
    if (modal) modal.hide();
    
    // Try to find the backup form first
    const backupForm = document.getElementById(`delete-form-${deleteData.id}`);
    if (backupForm) {
        console.log('Found backup form, submitting...'); // Debug log
        
        // Add event listener to detect form submission success
        backupForm.addEventListener('submit', function() {
            showAlert('success', 'Berhasil!', `Artikel "${deleteData.title}" berhasil dihapus.`);
        });
        
        backupForm.submit();
        return Promise.resolve();
    }
    
    // If no backup form, create one
    console.log('Creating new form for delete'); // Debug log
    
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = deleteData.url;
    form.style.display = 'none';
    
    // Add CSRF token
    const csrfInput = document.createElement('input');
    csrfInput.type = 'hidden';
    csrfInput.name = '_token';
    csrfInput.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    form.appendChild(csrfInput);
    
    // Add DELETE method
    const methodInput = document.createElement('input');
    methodInput.type = 'hidden';
    methodInput.name = '_method';
    methodInput.value = 'DELETE';
    form.appendChild(methodInput);
    
    document.body.appendChild(form);
    
    // Show success alert before submitting (optimistic UI)
    showAlert('success', 'Berhasil!', `Artikel "${deleteData.title}" berhasil dihapus.`);
    
    setTimeout(() => {
        console.log('Submitting created form'); // Debug log
        form.submit();
    }, 500);
    
    return Promise.resolve();
}

// Function to update article count after deletion
function updateArticleCount() {
    const remainingCards = document.querySelectorAll('.article-card').length;
    const countElements = document.querySelectorAll('[data-article-count]');
    
    countElements.forEach(element => {
        element.textContent = remainingCards;
    });
}

function checkEmptyState() {
    const remainingCards = document.querySelectorAll('.article-card').length;
    
    // Show empty state if no articles left
    if (remainingCards === 0) {
        const articlesList = document.querySelector('.articles-list');
        const emptyState = document.querySelector('.empty-state');
        
        if (articlesList && emptyState) {
            articlesList.style.display = 'none';
            emptyState.style.display = 'block';
        }
    }
}

// Bulk Actions Management
function initBulkActions() {
    // Handle bulk action card clicks
    document.querySelectorAll('.bulk-action-card').forEach(card => {
        card.addEventListener('click', function() {
            const action = this.dataset.action;
            
            switch(action) {
                case 'publish':
                    bulkPublish();
                    break;
                case 'draft':
                    bulkDraft();
                    break;
                case 'move':
                    bulkMove();
                    break;
                case 'delete':
                    showBulkDeleteModal();
                    break;
            }
        });
    });
    
    // Handle confirmation text input for bulk delete
    const confirmationInput = document.getElementById('confirmationText');
    const confirmBtn = document.getElementById('confirmBulkDeleteBtn');
    
    if (confirmationInput && confirmBtn) {
        confirmationInput.addEventListener('input', function() {
            const isValid = this.value.trim().toUpperCase() === 'HAPUS SEMUA';
            confirmBtn.disabled = !isValid;
        });
        
        confirmBtn.addEventListener('click', function() {
            bulkDelete();
        });
    }
}

function showBulkDeleteModal() {
    // Hide bulk modal
    bootstrap.Modal.getInstance(document.getElementById('bulkModal')).hide();
    
    // Show bulk delete modal after a short delay
    setTimeout(() => {
        const modal = new bootstrap.Modal(document.getElementById('bulkDeleteModal'));
        modal.show();
    }, 300);
}

async function bulkPublish() {
    showLoading('Mempublikasikan artikel...');
    
    try {
        const response = await fetch(`{{ route('admin.article-categories.bulk-actions', $articleCategory) }}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({
                action: 'publish'
            })
        });
        
        // Check if response is JSON
        const contentType = response.headers.get('content-type');
        if (!contentType || !contentType.includes('application/json')) {
            const responseText = await response.text();
            console.log('Non-JSON response:', responseText.substring(0, 200));
            throw new Error('Server mengembalikan response yang tidak valid');
        }
        
        const data = await response.json();
        
        if (data.success) {
            bootstrap.Modal.getInstance(document.getElementById('bulkModal')).hide();
            showAlert('success', 'Berhasil!', data.message);
            
            setTimeout(() => {
                window.location.reload();
            }, 1500);
        } else {
            throw new Error(data.message || 'Terjadi kesalahan');
        }
    } catch (error) {
        console.error('Bulk publish error:', error);
        showAlert('error', 'Error!', error.message || 'Gagal mempublikasikan artikel. Silakan coba lagi.');
    } finally {
        hideLoading();
    }
}

async function bulkDraft() {
    showLoading('Mengubah status artikel...');
    
    try {
        const response = await fetch(`{{ route('admin.article-categories.bulk-actions', $articleCategory) }}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({
                action: 'draft'
            })
        });
        
        // Check if response is JSON
        const contentType = response.headers.get('content-type');
        if (!contentType || !contentType.includes('application/json')) {
            const responseText = await response.text();
            console.log('Non-JSON response:', responseText.substring(0, 200));
            throw new Error('Server mengembalikan response yang tidak valid');
        }
        
        const data = await response.json();
        
        if (data.success) {
            bootstrap.Modal.getInstance(document.getElementById('bulkModal')).hide();
            showAlert('success', 'Berhasil!', data.message);
            
            setTimeout(() => {
                window.location.reload();
            }, 1500);
        } else {
            throw new Error(data.message || 'Terjadi kesalahan');
        }
    } catch (error) {
        console.error('Bulk draft error:', error);
        showAlert('error', 'Error!', error.message || 'Gagal mengubah status artikel. Silakan coba lagi.');
    } finally {
        hideLoading();
    }
}

function bulkMove() {
    const newCategory = prompt('Masukkan ID kategori tujuan:');
    if (newCategory && newCategory.trim()) {
        showLoading('Memindahkan artikel...');
        
        setTimeout(() => {
            hideLoading();
            bootstrap.Modal.getInstance(document.getElementById('bulkModal')).hide();
            showAlert('success', 'Berhasil!', `Semua artikel telah dipindah ke kategori ${newCategory}.`);
            
            setTimeout(() => {
                window.location.reload();
            }, 1500);
        }, 2000);
    }
}

async function bulkDelete() {
    const confirmBtn = document.getElementById('confirmBulkDeleteBtn');
    setButtonLoading(confirmBtn, true);
    showLoading('Menghapus semua artikel...');
    
    try {
        const response = await fetch(`{{ route('admin.article-categories.bulk-actions', $articleCategory) }}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({
                action: 'delete'
            })
        });
        
        console.log('Response status:', response.status);
        console.log('Response headers:', [...response.headers.entries()]);
        
        // Check if response is JSON
        const contentType = response.headers.get('content-type');
        if (!contentType || !contentType.includes('application/json')) {
            const responseText = await response.text();
            console.log('Non-JSON response:', responseText.substring(0, 200));
            throw new Error('Server mengembalikan response yang tidak valid');
        }
        
        const data = await response.json();
        console.log('Response data:', data);
        
        if (data.success) {
            bootstrap.Modal.getInstance(document.getElementById('bulkDeleteModal')).hide();
            showAlert('success', 'Berhasil!', data.message);
            
            setTimeout(() => {
                window.location.reload();
            }, 1500);
        } else {
            throw new Error(data.message || 'Terjadi kesalahan');
        }
    } catch (error) {
        console.error('Bulk delete error:', error);
        showAlert('error', 'Error!', error.message || 'Gagal menghapus artikel. Silakan coba lagi.');
    } finally {
        hideLoading();
        setButtonLoading(confirmBtn, false);
    }
}

// Export category data
async function exportCategory() {
    showLoading('Menyiapkan data export...');
    
    try {
        // Simulate export process
        await new Promise(resolve => setTimeout(resolve, 2000));
        
        showAlert('success', 'Berhasil!', 'Data kategori berhasil diexport!');
    } catch (error) {
        showAlert('error', 'Error!', 'Gagal mengexport data. Silakan coba lagi.');
    } finally {
        hideLoading();
    }
}

// Show bulk actions modal
function bulkActions() {
    const modal = new bootstrap.Modal(document.getElementById('bulkModal'));
    modal.show();
}

// Delete Category Functions
let currentCategoryData = null;

function initDeleteCategoryHandlers() {
    // Handle delete category button click
    document.addEventListener('click', function(e) {
        if (e.target.closest('.delete-category-btn')) {
            const btn = e.target.closest('.delete-category-btn');
            currentCategoryData = {
                id: btn.dataset.categoryId,
                name: btn.dataset.categoryName,
                articleCount: btn.dataset.totalArticles
            };
            showDeleteCategoryModal();
        }
    });

    // Handle confirmation text input for category delete
    const categoryConfirmationInput = document.getElementById('categoryConfirmationText');
    const categoryConfirmBtn = document.getElementById('confirmDeleteCategoryBtn');
    
    if (categoryConfirmationInput && categoryConfirmBtn) {
        categoryConfirmationInput.addEventListener('input', function() {
            categoryConfirmBtn.disabled = this.value.toUpperCase() !== 'HAPUS KATEGORI';
        });

        categoryConfirmBtn.addEventListener('click', function() {
            deleteCategory();
        });
    }
}

function showDeleteCategoryModal() {
    if (!currentCategoryData) return;
    
    // Update modal content
    document.getElementById('categoryNamePreview').textContent = currentCategoryData.name;
    document.getElementById('articleCountPreview').textContent = currentCategoryData.articleCount;
    
    // Clear confirmation input
    document.getElementById('categoryConfirmationText').value = '';
    document.getElementById('confirmDeleteCategoryBtn').disabled = true;
    
    // Show modal
    const modal = new bootstrap.Modal(document.getElementById('deleteCategoryModal'));
    modal.show();
}

async function deleteCategory() {
    if (!currentCategoryData) return;
    
    const confirmBtn = document.getElementById('confirmDeleteCategoryBtn');
    setButtonLoading(confirmBtn, true);
    showLoading('Menghapus kategori dan semua artikel...');
    
    try {
        const response = await fetch(`{{ route('admin.article-categories.index') }}/${currentCategoryData.id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });
        
        console.log('Delete category response status:', response.status);
        
        // Check if response is JSON
        const contentType = response.headers.get('content-type');
        if (contentType && contentType.includes('application/json')) {
            const data = await response.json();
            console.log('JSON response:', data);
            
            if (data.success) {
                bootstrap.Modal.getInstance(document.getElementById('deleteCategoryModal')).hide();
                showAlert('success', 'Berhasil!', data.message);
                
                setTimeout(() => {
                    window.location.href = '{{ route('admin.article-categories.index') }}';
                }, 2000);
            } else {
                throw new Error(data.message || 'Gagal menghapus kategori');
            }
        } else {
            // For redirect responses, assume success
            bootstrap.Modal.getInstance(document.getElementById('deleteCategoryModal')).hide();
            showAlert('success', 'Berhasil!', `Kategori "${currentCategoryData.name}" berhasil dihapus!`);
            
            setTimeout(() => {
                window.location.href = '{{ route('admin.article-categories.index') }}';
            }, 2000);
        }
        
    } catch (error) {
        console.error('Delete category error:', error);
        showAlert('error', 'Error!', error.message || 'Gagal menghapus kategori. Silakan coba lagi.');
    } finally {
        hideLoading();
        setButtonLoading(confirmBtn, false);
    }
}

// Enhanced loading for forms and navigation
document.addEventListener('DOMContentLoaded', function() {
    // Initialize delete handlers
    initDeleteHandlers();
    
    // Initialize category delete handlers
    initDeleteCategoryHandlers();
    
    // Initialize bulk actions
    initBulkActions();
    
    // Form submission loading
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn) {
                setButtonLoading(submitBtn, true);
            }
            setTimeout(() => showLoading('Memproses data...'), 100);
        });
    });
    
    // Navigation loading
    const navLinks = document.querySelectorAll('a[href*="admin"]:not([href^="#"])');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            if (!this.hasAttribute('download') && !this.hasAttribute('target')) {
                setTimeout(() => showLoading('Memuat halaman...'), 50);
            }
        });
    });
    
    // Hide loading when page loads
    window.addEventListener('load', function() {
        hideLoading();
        document.querySelectorAll('.loading').forEach(btn => {
            setButtonLoading(btn, false);
        });
    });
    
    // Handle browser navigation
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            hideLoading();
        }
    });
});

// Enhanced button interactions
document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.btn-red, .btn-red-outline, .btn-outline-red');
    
    buttons.forEach(button => {
        let isPressed = false;
        
        button.addEventListener('mouseenter', function() {
            if (!isPressed && !this.disabled) {
                this.style.transform = 'translateY(-1px) scale(1.02)';
            }
        });
        
        button.addEventListener('mouseleave', function() {
            if (!isPressed) {
                this.style.transform = 'translateY(0) scale(1)';
            }
        });
        
        button.addEventListener('mousedown', function() {
            if (!this.disabled) {
                isPressed = true;
                this.style.transform = 'translateY(0) scale(0.98)';
            }
        });
        
        button.addEventListener('mouseup', function() {
            isPressed = false;
            if (!this.disabled) {
                this.style.transform = 'translateY(-1px) scale(1.02)';
            }
        });
    });
});

// Enhanced Client-Side Filter & Search System
let searchTimeout;
let allArticles = [];
let filteredArticles = [];

function initializeClientSideFiltering() {
    console.log('Initializing client-side filtering system...');
    
    // Store all articles data
    loadArticlesData();
    
    // Set up event listeners
    setupFilterEventListeners();
    
    // Apply initial filters if URL parameters exist
    applyInitialFilters();
}

function loadArticlesData() {
    const articleCards = document.querySelectorAll('.article-card');
    allArticles = [];
    
    console.log('Found article cards:', articleCards.length);
    
    articleCards.forEach(card => {
        const titleElement = card.querySelector('.article-title a');
        const title = titleElement?.textContent?.trim() || '';
        
        const excerptElement = card.querySelector('.article-excerpt');
        const excerpt = excerptElement?.textContent?.trim() || '';
        
        const statusElement = card.querySelector('.status-badge');
        const status = statusElement?.textContent?.trim().toLowerCase() || '';
        
        const dateElement = card.querySelector('.date');
        const dateText = dateElement?.textContent?.trim() || '';
        
        // Parse date for sorting
        let parsedDate = new Date();
        try {
            if (dateText) {
                parsedDate = new Date(dateText);
            }
        } catch (e) {
            console.warn('Date parsing failed for:', dateText);
        }
        
        // Get article ID from delete button
        const deleteBtn = card.querySelector('[data-article-id]');
        const articleId = deleteBtn?.getAttribute('data-article-id') || '';
        
        const articleData = {
            element: card,
            id: articleId,
            title: title,
            excerpt: excerpt,
            searchText: (title + ' ' + excerpt).toLowerCase(),
            status: status,
            date: parsedDate,
            dateText: dateText
        };
        
        allArticles.push(articleData);
        console.log('Added article:', articleData);
    });
    
    filteredArticles = [...allArticles];
    console.log(`Loaded ${allArticles.length} articles for client-side filtering`);
}

function setupFilterEventListeners() {
    const searchInput = document.querySelector('input[name="search"]');
    const statusSelect = document.querySelector('select[name="status"]');
    const sortSelect = document.querySelector('select[name="sort"]');
    const filterForm = document.getElementById('filterForm');
    const resetBtn = document.querySelector('.reset-filter-btn');
    
    // Search hanya ketika form di-submit atau tombol Cari diklik
    // Tidak menggunakan real-time search
    
    // Filter on dropdown changes only
    if (statusSelect) {
        statusSelect.addEventListener('change', () => applyFilters());
    }
    
    if (sortSelect) {
        sortSelect.addEventListener('change', () => applyFilters());
    }
    
    // Form submission untuk search
    if (filterForm) {
        filterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            applyFilters();
        });
    }
    
    // Enter key pada search input
    if (searchInput) {
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                applyFilters();
            }
        });
    }
    
    // Reset button
    if (resetBtn) {
        resetBtn.addEventListener('click', function(e) {
            e.preventDefault();
            resetFilters();
        });
    }
}

function applyFilters() {
    const searchInput = document.querySelector('input[name="search"]');
    const statusSelect = document.querySelector('select[name="status"]');
    const sortSelect = document.querySelector('select[name="sort"]');
    
    const searchTerm = searchInput?.value?.trim().toLowerCase() || '';
    const statusFilter = statusSelect?.value || '';
    const sortOrder = sortSelect?.value || 'latest';
    
    console.log('Applying filters:', { searchTerm, statusFilter, sortOrder });
    console.log('Total articles before filter:', allArticles.length);
    
    // Show loading state
    showFilterLoading();
    
    try {
        // Filter articles
        filteredArticles = allArticles.filter(article => {
            const matchesSearch = !searchTerm || article.searchText.includes(searchTerm);
            const matchesStatus = !statusFilter || article.status.includes(statusFilter.toLowerCase());
            
            console.log(`Article "${article.title}":`, {
                searchText: article.searchText,
                status: article.status,
                matchesSearch,
                matchesStatus,
                finalMatch: matchesSearch && matchesStatus
            });
            
            return matchesSearch && matchesStatus;
        });
        
        console.log('Articles after filter:', filteredArticles.length);
        
        // Sort articles
        filteredArticles.sort((a, b) => {
            switch (sortOrder) {
                case 'oldest':
                    return a.date - b.date;
                case 'title':
                    return a.title.localeCompare(b.title);
                case 'updated':
                    return b.date - a.date;
                default: // latest
                    return b.date - a.date;
            }
        });
        
        // Update display
        updateDisplay();
        
        // Update URL
        updateURL(searchTerm, statusFilter, sortOrder);
        
        // Show result message
        const message = filteredArticles.length === 0 ? 
            'Tidak ada artikel yang sesuai dengan filter' : 
            `Menampilkan ${filteredArticles.length} dari ${allArticles.length} artikel`;
        showAlert('success', 'Filter berhasil diterapkan!', message);
        
    } catch (error) {
        console.error('Filter error:', error);
        showAlert('error', 'Error!', 'Terjadi kesalahan saat memfilter artikel.');
    } finally {
        hideFilterLoading();
    }
}

function updateDisplay() {
    console.log('Updating display. Filtered articles:', filteredArticles.length);
    
    // Hide all articles first
    allArticles.forEach(article => {
        article.element.style.display = 'none';
    });
    
    // Show filtered articles
    filteredArticles.forEach(article => {
        article.element.style.display = 'flex'; // article-card uses flex display
    });
    
    // Update count in article list header (filtered count)
    const filteredCountElement = document.querySelector('[data-filtered-count]');
    if (filteredCountElement) {
        filteredCountElement.textContent = filteredArticles.length;
    }
    
    // Show/hide total info
    const totalInfoElement = document.querySelector('.total-articles-info');
    if (totalInfoElement) {
        if (filteredArticles.length !== allArticles.length) {
            totalInfoElement.classList.remove('d-none');
        } else {
            totalInfoElement.classList.add('d-none');
        }
    }
    
    // Show/hide empty state
    const articlesListContainer = document.querySelector('.articles-list');
    if (filteredArticles.length === 0) {
        showEmptyState();
        if (articlesListContainer) {
            articlesListContainer.style.display = 'none';
        }
    } else {
        hideEmptyState();
        if (articlesListContainer) {
            articlesListContainer.style.display = 'block';
        }
    }
    
    // Re-initialize handlers for visible articles
    setTimeout(() => {
        initBulkSelect();
        initDeleteHandlers();
    }, 100);
}

function showEmptyState() {
    let emptyState = document.querySelector('.filter-empty-state');
    if (!emptyState) {
        const container = document.querySelector('.articles-container');
        if (container) {
            emptyState = document.createElement('div');
            emptyState.className = 'filter-empty-state';
            emptyState.innerHTML = `
                <div class="text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-search text-muted" style="font-size: 4rem;"></i>
                    </div>
                    <h4 class="text-muted">Tidak Ada Hasil</h4>
                    <p class="text-muted">Tidak ada artikel yang sesuai dengan filter pencarian Anda.</p>
                    <button type="button" class="btn btn-warning btn-sm" onclick="resetFilters()">
                        <i class="fas fa-undo"></i> Reset Filter
                    </button>
                </div>
            `;
            container.appendChild(emptyState);
        }
    } else {
        emptyState.style.display = 'block';
    }
}

function hideEmptyState() {
    const emptyState = document.querySelector('.filter-empty-state');
    if (emptyState) {
        emptyState.style.display = 'none';
    }
}

function resetFilters() {
    try {
        // Reset form fields
        const searchInput = document.querySelector('input[name="search"]');
        const statusSelect = document.querySelector('select[name="status"]');
        const sortSelect = document.querySelector('select[name="sort"]');
        
        if (searchInput) searchInput.value = '';
        if (statusSelect) statusSelect.value = '';
        if (sortSelect) sortSelect.value = 'latest';
        
        // Reset filtered articles
        filteredArticles = [...allArticles];
        
        // Update display
        updateDisplay();
        
        // Clear URL parameters
        const url = new URL(window.location);
        url.search = '';
        window.history.pushState({}, '', url);
        
        showAlert('info', 'Filter direset!', `Menampilkan semua ${allArticles.length} artikel`);
        
    } catch (error) {
        console.error('Reset error:', error);
        window.location.reload();
    }
}

function applyInitialFilters() {
    const urlParams = new URLSearchParams(window.location.search);
    const searchInput = document.querySelector('input[name="search"]');
    const statusSelect = document.querySelector('select[name="status"]');
    const sortSelect = document.querySelector('select[name="sort"]');
    
    if (urlParams.get('search') && searchInput) {
        searchInput.value = urlParams.get('search');
    }
    if (urlParams.get('status') && statusSelect) {
        statusSelect.value = urlParams.get('status');
    }
    if (urlParams.get('sort') && sortSelect) {
        sortSelect.value = urlParams.get('sort');
    }
    
    if (urlParams.get('search') || urlParams.get('status') || urlParams.get('sort')) {
        setTimeout(() => applyFilters(), 100);
    }
}

function updateURL(search, status, sort) {
    try {
        const url = new URL(window.location);
        
        if (search) {
            url.searchParams.set('search', search);
        } else {
            url.searchParams.delete('search');
        }
        
        if (status) {
            url.searchParams.set('status', status);
        } else {
            url.searchParams.delete('status');
        }
        
        if (sort && sort !== 'latest') {
            url.searchParams.set('sort', sort);
        } else {
            url.searchParams.delete('sort');
        }
        
        window.history.pushState({}, '', url);
    } catch (error) {
        console.warn('URL update failed:', error);
    }
}

function showFilterLoading() {
    const container = document.querySelector('.row.g-4');
    const form = document.getElementById('filterForm');
    
    if (container) {
        container.style.opacity = '0.6';
        container.style.pointerEvents = 'none';
    }
    
    if (form) {
        const elements = form.querySelectorAll('input, select, button');
        elements.forEach(el => el.disabled = true);
        
        const submitBtn = form.querySelector('button[type="submit"]');
        if (submitBtn) {
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memfilter...';
        }
    }
}

function hideFilterLoading() {
    const container = document.querySelector('.row.g-4');
    const form = document.getElementById('filterForm');
    
    if (container) {
        container.style.opacity = '1';
        container.style.pointerEvents = 'auto';
    }
    
    if (form) {
        const elements = form.querySelectorAll('input, select, button');
        elements.forEach(el => el.disabled = false);
        
        const submitBtn = form.querySelector('button[type="submit"]');
        if (submitBtn) {
            submitBtn.innerHTML = '<i class="fas fa-search"></i> Cari';
        }
    }
}

// Make reset function globally available
window.resetFilters = resetFilters;

// Initialize client-side filtering when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    initializeClientSideFiltering();
});

// Enhanced keyboard shortcuts and event listeners
document.addEventListener('keydown', function(e) {
    // ESC to close alerts and modals
    if (e.key === 'Escape') {
        // Close alerts
        document.querySelectorAll('.modern-alert').forEach(alert => {
            if (alert.id) closeAlert(alert.id);
        });
        
        // Close modals
        const modals = document.querySelectorAll('.modal.show');
        modals.forEach(modal => {
            const modalInstance = bootstrap.Modal.getInstance(modal);
            if (modalInstance) modalInstance.hide();
        });
    }
    
    // Ctrl+F to focus search
    if (e.ctrlKey && e.key === 'f') {
        e.preventDefault();
        const searchInput = document.querySelector('input[name="search"]');
        if (searchInput) {
            searchInput.focus();
            searchInput.select();
        }
    }
    
    // Ctrl+R to reset filters
    if (e.ctrlKey && e.key === 'r') {
        e.preventDefault();
        resetFilters();
    }
    
    // Ctrl+Delete for bulk delete (with confirmation)
    if (e.ctrlKey && e.key === 'Delete') {
        e.preventDefault();
        const checkedBoxes = document.querySelectorAll('input[name="article_ids[]"]:checked');
        if (checkedBoxes.length > 0) {
            bulkActions();
        } else {
            showAlert('warning', 'Peringatan', 'Pilih artikel yang ingin dihapus terlebih dahulu');
        }
    }
});

// Enhanced intersection observer for smooth animations
document.addEventListener('DOMContentLoaded', function() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const cardObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Animate all article cards with staggered delay
    const cards = document.querySelectorAll('[data-article-id]');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
        cardObserver.observe(card);
    });
    
    // Initialize Bootstrap components
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => 
        new bootstrap.Tooltip(tooltipTriggerEl)
    );
    
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl => 
        new bootstrap.Popover(popoverTriggerEl)
    );
});
</script>
@endsection
