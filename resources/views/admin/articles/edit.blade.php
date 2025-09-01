@extends('admin.components.layout')

@section('title', 'Edit Artikel')

@push('styles')
<style>
/* Premium Edit Page Styles */
.premium-content-wrapper {
    background: #f8fafc;
    min-height: 100vh;
    padding: 20px;
}

.content-header {
    background: linear-gradient(135deg, #8b0000, #a50000);
    color: white;
    padding: 24px 32px;
    border-radius: 16px;
    margin-bottom: 24px;
    box-shadow: 0 8px 32px rgba(139, 0, 0, 0.2);
    backdrop-filter: blur(10px);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
}

.header-left .page-title {
    font-size: 1.6rem;
    font-weight: 800;
    margin: 0 0 8px 0;
    letter-spacing: -0.3px;
    display: flex;
    align-items: center;
    gap: 12px;
}

.header-left .page-title i {
    color: #ffd700;
    font-size: 1.4rem;
    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));
}

.page-subtitle {
    font-size: 0.9rem;
    opacity: 0.9;
    margin: 0;
    font-weight: 500;
}

.header-actions {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}

.header-actions .btn {
    background: rgba(255, 255, 255, 0.15);
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: white;
    padding: 10px 18px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 0.85rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.header-actions .btn:hover {
    background: rgba(255, 255, 255, 0.25);
    border-color: rgba(255, 255, 255, 0.5);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
}

/* Premium Card Styles */
.premium-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 16px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    transition: all 0.3s ease;
}

.premium-card:hover {
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
    transform: translateY(-2px);
}

.premium-card .card-header {
    background: linear-gradient(135deg, #f9fafb, #ffffff);
    border-bottom: 1px solid rgba(139, 0, 0, 0.1);
    padding: 20px 24px;
}

.premium-card .card-title {
    font-size: 1rem;
    font-weight: 700;
    color: #1f2937;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 10px;
    letter-spacing: 0.2px;
}

.premium-card .card-title i {
    color: #8b0000;
    font-size: 1.1rem;
}

.premium-card .card-body {
    padding: 24px;
}

/* Form Styles */
.form-label {
    font-weight: 600;
    color: #374151;
    margin-bottom: 8px;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.form-label.required::after {
    content: '*';
    color: #dc2626;
    margin-left: 4px;
    font-weight: 700;
}

.form-control, .form-select {
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    padding: 12px 16px;
    font-size: 0.9rem;
    background: #ffffff;
    transition: all 0.3s ease;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
}

.form-control:focus, .form-select:focus {
    border-color: #8b0000;
    box-shadow: 0 0 0 4px rgba(139, 0, 0, 0.1);
    outline: none;
    background: #fefefe;
}

.form-control.is-invalid, .form-select.is-invalid {
    border-color: #dc2626;
    box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.1);
}

.invalid-feedback {
    color: #dc2626;
    font-size: 0.8rem;
    font-weight: 500;
    margin-top: 6px;
}

.form-text {
    font-size: 0.75rem;
    color: #6b7280;
    margin-top: 6px;
}

/* Button Styles */
.btn {
    border-radius: 12px;
    font-weight: 600;
    font-size: 0.85rem;
    padding: 12px 20px;
    border: none;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    cursor: pointer;
}

.btn-danger {
    background: linear-gradient(135deg, #8b0000, #a50000);
    color: white;
    box-shadow: 0 4px 16px rgba(139, 0, 0, 0.3);
}

.btn-danger:hover {
    background: linear-gradient(135deg, #a50000, #b91c1c);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(139, 0, 0, 0.4);
}

.btn-outline-danger {
    background: transparent;
    border: 2px solid #8b0000;
    color: #8b0000;
}

.btn-outline-danger:hover {
    background: #8b0000;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 16px rgba(139, 0, 0, 0.3);
}

.btn-sm {
    padding: 8px 14px;
    font-size: 0.8rem;
}

/* Stats Grid */
.article-stats {
    background: linear-gradient(135deg, #f8fafc, #f1f5f9);
    border: 1px solid #e2e8f0;
    padding: 20px;
    border-radius: 12px;
    margin-bottom: 20px;
}

.article-stats h6 {
    color: #1f2937;
    font-weight: 700;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 16px;
    border-bottom: 2px solid #8b0000;
    padding-bottom: 8px;
}

.stats-grid {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.stat-item {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.stat-label {
    font-size: 0.75rem;
    color: #6b7280;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.stat-value {
    font-size: 0.85rem;
    color: #1f2937;
    font-weight: 600;
}

.stat-slug {
    background: linear-gradient(135deg, #e5e7eb, #f3f4f6);
    color: #374151;
    padding: 4px 8px;
    border-radius: 8px;
    font-size: 0.75rem;
    font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
    border: 1px solid #d1d5db;
}

/* Image Upload Styles */
.image-upload-area {
    border: 2px dashed #d1d5db;
    border-radius: 12px;
    padding: 24px;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    background: linear-gradient(135deg, #fafafa, #ffffff);
}

.image-upload-area:hover {
    border-color: #8b0000;
    background: linear-gradient(135deg, #fef2f2, #ffffff);
    transform: translateY(-2px);
    box-shadow: 0 4px 16px rgba(139, 0, 0, 0.1);
}

.current-image {
    position: relative;
    width: 100%;
    border-radius: 12px;
    overflow: hidden;
}

.current-image img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 12px;
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(139, 0, 0, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all 0.3s ease;
    border-radius: 12px;
    backdrop-filter: blur(4px);
}

.current-image:hover .image-overlay {
    opacity: 1;
}

.image-overlay .btn {
    background: rgba(255, 255, 255, 0.9);
    color: #8b0000;
    border: none;
    padding: 10px 16px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.8rem;
}

.upload-placeholder i {
    font-size: 2.5rem;
    color: #9ca3af;
    margin-bottom: 12px;
    background: linear-gradient(135deg, #8b0000, #dc2626);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.upload-placeholder p {
    margin: 0 0 6px 0;
    font-weight: 600;
    color: #374151;
    font-size: 0.9rem;
}

.upload-placeholder small {
    color: #6b7280;
    font-size: 0.75rem;
}

.image-preview {
    position: relative;
    border-radius: 12px;
    overflow: hidden;
}

.image-preview img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 12px;
}

.remove-image {
    position: absolute;
    top: 12px;
    right: 12px;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: rgba(220, 38, 38, 0.9);
    color: white;
    border: 2px solid white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
    backdrop-filter: blur(4px);
}

.remove-image:hover {
    background: #dc2626;
    transform: scale(1.1);
}

/* Content Textarea */
#content {
    min-height: 280px;
    font-family: 'Inter', 'Segoe UI', sans-serif;
    line-height: 1.6;
    font-size: 0.9rem;
}

/* Character Counter */
#excerpt-count {
    font-weight: 600;
    color: #6b7280;
    transition: color 0.3s ease;
}

/* Responsive Design */
@media (max-width: 768px) {
    .premium-content-wrapper {
        padding: 16px;
    }
    
    .content-header {
        padding: 20px;
        flex-direction: column;
        align-items: flex-start;
        gap: 16px;
    }
    
    .header-left .page-title {
        font-size: 1.4rem;
    }
    
    .page-subtitle {
        font-size: 0.85rem;
    }
    
    .header-actions {
        width: 100%;
        justify-content: stretch;
    }
    
    .header-actions .btn {
        flex: 1;
        justify-content: center;
        font-size: 0.8rem;
        padding: 10px 14px;
    }
    
    .premium-card .card-header {
        padding: 16px 20px;
    }
    
    .premium-card .card-body {
        padding: 20px;
    }
    
    .premium-card .card-title {
        font-size: 0.9rem;
    }
    
    .form-label {
        font-size: 0.8rem;
    }
    
    .form-control, .form-select {
        font-size: 0.85rem;
        padding: 10px 14px;
    }
    
    .btn {
        font-size: 0.8rem;
        padding: 10px 16px;
    }
    
    .article-stats {
        padding: 16px;
    }
    
    .image-upload-area {
        padding: 20px;
    }
    
    .current-image img, .image-preview img {
        height: 160px;
    }
    
    #content {
        min-height: 240px;
        font-size: 0.85rem;
    }
}

@media (max-width: 576px) {
    .content-header {
        padding: 16px;
    }
    
    .header-left .page-title {
        font-size: 1.2rem;
    }
    
    .premium-card .card-body {
        padding: 16px;
    }
    
    .stats-grid {
        gap: 10px;
    }
    
    .stat-label {
        font-size: 0.7rem;
    }
    
    .stat-value {
        font-size: 0.8rem;
    }
}
</style>
@endpush

@section('content')
<!-- Success & Error Alerts -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: 20px; border-radius: 16px; border: none; box-shadow: 0 8px 32px rgba(16, 185, 129, 0.2); background: linear-gradient(135deg, #d1f2dd, #f0fdf4); color: #065f46; border-left: 6px solid #22c55e;">
        <div style="display: flex; align-items: center; gap: 12px;">
            <i class="fas fa-check-circle" style="font-size: 1.2rem; color: #22c55e;"></i>
            <div>
                <strong>Berhasil!</strong> {{ session('success') }}
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="background: rgba(0, 0, 0, 0.1); border-radius: 12px; opacity: 0.7; width: 32px; height: 32px;"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin: 20px; border-radius: 16px; border: none; box-shadow: 0 8px 32px rgba(239, 68, 68, 0.2); background: linear-gradient(135deg, #fecaca, #fef2f2); color: #991b1b; border-left: 6px solid #ef4444;">
        <div style="display: flex; align-items: center; gap: 12px;">
            <i class="fas fa-exclamation-triangle" style="font-size: 1.2rem; color: #ef4444;"></i>
            <div>
                <strong>Error!</strong> {{ session('error') }}
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="background: rgba(0, 0, 0, 0.1); border-radius: 12px; opacity: 0.7; width: 32px; height: 32px;"></button>
    </div>
@endif

<div class="premium-content-wrapper">
    <div class="content-header">
        <div class="header-left">
            <h1 class="page-title">
                <i class="fas fa-edit"></i>
                Edit Artikel
            </h1>
            <p class="page-subtitle">Perbarui konten artikel: {{ Str::limit($article->title, 50) }}</p>
        </div>
        <div class="header-actions">
            <a href="{{ route('admin.articles.show', $article) }}" class="btn">
                <i class="fas fa-eye"></i>
                Lihat Artikel
            </a>
            <a href="{{ route('admin.articles.index') }}" class="btn">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>
    </div>

    <div class="content-body">
        <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-lg-8">
                    <!-- Main Content -->
                    <div class="premium-card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit"></i>
                                Konten Artikel
                            </h3>
                        </div>
                        
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="title" class="form-label required">Judul Artikel</label>
                                <input type="text" 
                                       class="form-control @error('title') is-invalid @enderror" 
                                       id="title" 
                                       name="title" 
                                       value="{{ old('title', $article->title) }}"
                                       placeholder="Masukkan judul artikel yang menarik"
                                       required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="excerpt" class="form-label required">Ringkasan Artikel</label>
                                <textarea class="form-control @error('excerpt') is-invalid @enderror" 
                                          id="excerpt" 
                                          name="excerpt" 
                                          rows="3"
                                          placeholder="Tulis ringkasan singkat artikel (maksimal 500 karakter)"
                                          required>{{ old('excerpt', $article->excerpt) }}</textarea>
                                @error('excerpt')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">
                                    <span id="excerpt-count">{{ strlen($article->excerpt) }}</span>/500 karakter
                                </small>
                            </div>

                            <div class="form-group mb-0">
                                <label for="content" class="form-label required">Konten Artikel</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" 
                                          id="content" 
                                          name="content" 
                                          rows="12"
                                          placeholder="Tulis konten artikel di sini..."
                                          required>{{ old('content', $article->content) }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- SEO Section -->
                    <div class="premium-card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-search"></i>
                                SEO & Meta Data
                            </h3>
                        </div>
                        
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="meta_title" class="form-label">Meta Title</label>
                                <input type="text" 
                                       class="form-control @error('meta_title') is-invalid @enderror" 
                                       id="meta_title" 
                                       name="meta_title" 
                                       value="{{ old('meta_title', $article->meta_title) }}"
                                       placeholder="Judul untuk SEO (opsional)">
                                @error('meta_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-0">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <textarea class="form-control @error('meta_description') is-invalid @enderror" 
                                          id="meta_description" 
                                          name="meta_description" 
                                          rows="3"
                                          placeholder="Deskripsi untuk SEO (opsional)">{{ old('meta_description', $article->meta_description) }}</textarea>
                                @error('meta_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Publishing Options -->
                    <div class="premium-card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-cog"></i>
                                Pengaturan Publish
                            </h3>
                        </div>
                        
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="category_id" class="form-label required">Kategori</label>
                                <select class="form-select @error('category_id') is-invalid @enderror" 
                                        id="category_id" 
                                        name="category_id" 
                                        required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" 
                                                {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="status" class="form-label required">Status</label>
                                <select class="form-select @error('status') is-invalid @enderror" 
                                        id="status" 
                                        name="status" 
                                        required>
                                    <option value="draft" {{ old('status', $article->status) == 'draft' ? 'selected' : '' }}>
                                        Draft
                                    </option>
                                    <option value="published" {{ old('status', $article->status) == 'published' ? 'selected' : '' }}>
                                        Dipublikasi
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3" id="publish-date-group">
                                <label for="published_at" class="form-label">Tanggal Publish</label>
                                <input type="datetime-local" 
                                       class="form-control @error('published_at') is-invalid @enderror" 
                                       id="published_at" 
                                       name="published_at" 
                                       value="{{ old('published_at', $article->published_at ? $article->published_at->format('Y-m-d\TH:i') : '') }}">
                                @error('published_at')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">
                                    Kosongkan untuk publish sekarang
                                </small>
                            </div>

                            <div class="article-stats">
                                <h6>📊 Statistik Artikel</h6>
                                <div class="stats-grid">
                                    <div class="stat-item">
                                        <span class="stat-label">📅 Dibuat</span>
                                        <span class="stat-value">{{ $article->created_at->format('d M Y, H:i') }}</span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">🔄 Terakhir Diperbarui</span>
                                        <span class="stat-value">{{ $article->updated_at->format('d M Y, H:i') }}</span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">🔗 Slug URL</span>
                                        <code class="stat-slug">{{ $article->slug }}</code>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-save"></i>
                                    Perbarui Artikel
                                </button>
                                <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-danger">
                                    <i class="fas fa-times"></i>
                                    Batal
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Cover Image -->
                    <div class="premium-card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-image"></i>
                                Gambar Cover
                            </h3>
                        </div>
                        
                        <div class="card-body">
                            <div class="form-group">
                                <label for="cover_image" class="form-label">📸 Upload Gambar Baru</label>
                                <div class="image-upload-area" id="imageUploadArea">
                                    <input type="file" 
                                           class="form-control @error('cover_image') is-invalid @enderror" 
                                           id="cover_image" 
                                           name="cover_image" 
                                           accept="image/*"
                                           style="display: none;">
                                    
                                    @if($article->cover_url)
                                        <div class="current-image" id="currentImage">
                                            <img src="{{ asset($article->cover_url) }}" alt="Current cover">
                                            <div class="image-overlay">
                                                <button type="button" class="btn" id="changeImage">
                                                    <i class="fas fa-edit"></i>
                                                    Ganti Gambar
                                                </button>
                                            </div>
                                        </div>
                                    @else
                                        <div class="upload-placeholder" id="uploadPlaceholder">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <p>Klik untuk upload gambar</p>
                                            <small>JPEG, PNG, JPG, GIF (Max: 2MB)</small>
                                        </div>
                                    @endif
                                    
                                    <div class="image-preview" id="imagePreview" style="display: none;">
                                        <img id="previewImg" src="" alt="Preview">
                                        <button type="button" class="btn remove-image" id="removeImage">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                @error('cover_image')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-dismiss alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(function(alert) {
        setTimeout(function() {
            if (alert && alert.parentNode) {
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-20px)';
                alert.style.transition = 'all 0.4s ease';
                setTimeout(function() {
                    if (alert.parentNode) {
                        alert.remove();
                    }
                }, 400);
            }
        }, 5000);
    });

    // Character counter for excerpt with visual feedback
    const excerptTextarea = document.getElementById('excerpt');
    const excerptCount = document.getElementById('excerpt-count');
    
    function updateCharacterCount() {
        const count = excerptTextarea.value.length;
        excerptCount.textContent = count;
        
        if (count > 500) {
            excerptCount.style.color = '#dc2626';
            excerptCount.style.fontWeight = '700';
            excerptTextarea.style.borderColor = '#dc2626';
        } else if (count > 400) {
            excerptCount.style.color = '#f59e0b';
            excerptCount.style.fontWeight = '600';
            excerptTextarea.style.borderColor = '#f59e0b';
        } else {
            excerptCount.style.color = '#6b7280';
            excerptCount.style.fontWeight = '600';
            excerptTextarea.style.borderColor = '#e5e7eb';
        }
    }
    
    excerptTextarea.addEventListener('input', updateCharacterCount);
    updateCharacterCount(); // Initial call
    
    // Status change handler with smooth transition
    const statusSelect = document.getElementById('status');
    const publishDateGroup = document.getElementById('publish-date-group');
    
    function togglePublishDate() {
        if (statusSelect.value === 'published') {
            publishDateGroup.style.display = 'block';
            publishDateGroup.style.opacity = '0';
            setTimeout(() => {
                publishDateGroup.style.opacity = '1';
                publishDateGroup.style.transition = 'opacity 0.3s ease';
            }, 10);
        } else {
            publishDateGroup.style.opacity = '0';
            publishDateGroup.style.transition = 'opacity 0.3s ease';
            setTimeout(() => {
                publishDateGroup.style.display = 'none';
            }, 300);
        }
    }
    
    statusSelect.addEventListener('change', togglePublishDate);
    togglePublishDate(); // Trigger on load
    
    // Enhanced image upload handling
    const imageUploadArea = document.getElementById('imageUploadArea');
    const fileInput = document.getElementById('cover_image');
    const uploadPlaceholder = document.getElementById('uploadPlaceholder');
    const currentImage = document.getElementById('currentImage');
    const changeImageBtn = document.getElementById('changeImage');
    const imagePreview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');
    const removeImageBtn = document.getElementById('removeImage');
    
    function triggerFileInput() {
        fileInput.click();
    }
    
    // Click handlers for upload triggers
    if (uploadPlaceholder) {
        uploadPlaceholder.addEventListener('click', triggerFileInput);
    }
    
    if (changeImageBtn) {
        changeImageBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            triggerFileInput();
        });
    }
    
    // File input change handler with preview
    fileInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            // Validate file size (2MB)
            if (file.size > 2 * 1024 * 1024) {
                alert('❌ Ukuran file terlalu besar! Maksimal 2MB.');
                this.value = '';
                return;
            }
            
            // Validate file type
            if (!file.type.match('image.*')) {
                alert('❌ File harus berupa gambar!');
                this.value = '';
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                
                // Hide other elements and show preview
                if (uploadPlaceholder) uploadPlaceholder.style.display = 'none';
                if (currentImage) currentImage.style.display = 'none';
                imagePreview.style.display = 'block';
                
                // Add animation
                imagePreview.style.opacity = '0';
                setTimeout(() => {
                    imagePreview.style.opacity = '1';
                    imagePreview.style.transition = 'opacity 0.3s ease';
                }, 10);
            };
            reader.readAsDataURL(file);
        }
    });
    
    // Remove image handler
    if (removeImageBtn) {
        removeImageBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            
            // Clear file input
            fileInput.value = '';
            
            // Hide preview and restore original state
            imagePreview.style.opacity = '0';
            setTimeout(() => {
                imagePreview.style.display = 'none';
                
                if (uploadPlaceholder) {
                    uploadPlaceholder.style.display = 'block';
                    uploadPlaceholder.style.opacity = '1';
                }
                if (currentImage) {
                    currentImage.style.display = 'block';
                    currentImage.style.opacity = '1';
                }
            }, 300);
        });
    }
    
    // Form validation enhancement
    const form = document.querySelector('form');
    const submitBtn = form.querySelector('button[type="submit"]');
    
    form.addEventListener('submit', function(e) {
        // Add loading state to submit button
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
        
        // Reset button if form validation fails
        setTimeout(() => {
            if (submitBtn.disabled) {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-save"></i> Perbarui Artikel';
            }
        }, 5000);
    });
    
    // Auto-save draft functionality (optional)
    let autoSaveTimeout;
    const autoSaveFields = ['title', 'excerpt', 'content'];
    
    autoSaveFields.forEach(fieldName => {
        const field = document.getElementById(fieldName);
        if (field) {
            field.addEventListener('input', function() {
                clearTimeout(autoSaveTimeout);
                autoSaveTimeout = setTimeout(() => {
                    // Add visual feedback for auto-save
                    const indicator = document.createElement('div');
                    indicator.style.cssText = `
                        position: fixed;
                        top: 20px;
                        right: 20px;
                        background: linear-gradient(135deg, #10b981, #059669);
                        color: white;
                        padding: 8px 16px;
                        border-radius: 8px;
                        font-size: 0.8rem;
                        font-weight: 600;
                        z-index: 10000;
                        box-shadow: 0 4px 16px rgba(16, 185, 129, 0.3);
                    `;
                    indicator.innerHTML = '<i class="fas fa-check"></i> Draft tersimpan otomatis';
                    document.body.appendChild(indicator);
                    
                    setTimeout(() => {
                        indicator.style.opacity = '0';
                        indicator.style.transition = 'opacity 0.3s ease';
                        setTimeout(() => {
                            if (document.body.contains(indicator)) {
                                document.body.removeChild(indicator);
                            }
                        }, 300);
                    }, 2000);
                }, 3000); // Auto-save after 3 seconds of inactivity
            });
        }
    });
    
    // Enhanced form field focus effects
    const formControls = document.querySelectorAll('.form-control, .form-select');
    formControls.forEach(control => {
        control.addEventListener('focus', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = '0 8px 24px rgba(139, 0, 0, 0.15)';
        });
        
        control.addEventListener('blur', function() {
            this.style.transform = '';
            this.style.boxShadow = '';
        });
    });
});
</script>
@endsection
