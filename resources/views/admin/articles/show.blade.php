@extends('admin.components.layout')

@section('title', 'Detail Artikel')

@push('styles')
<style>
/* Premium Article Show Page Styles */
.premium-content-wrapper {
    background: #f8fafc;
    min-height: 100vh;
    padding: 20px;
}

.premium-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 16px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    margin-bottom: 24px;
    overflow: hidden;
}

.premium-card:hover {
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
    transform: translateY(-2px);
}

.premium-btn {
    background: linear-gradient(135deg, #8b0000, #a50000);
    border: none;
    color: white;
    padding: 10px 18px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 0.85rem;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 4px 16px rgba(139, 0, 0, 0.3);
}

.premium-btn:hover {
    background: linear-gradient(135deg, #a50000, #b91c1c);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(139, 0, 0, 0.4);
    color: white;
}

.premium-btn-outline {
    background: rgba(255, 255, 255, 0.15);
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: white;
    backdrop-filter: blur(10px);
}

.premium-btn-outline:hover {
    background: rgba(255, 255, 255, 0.25);
    border-color: rgba(255, 255, 255, 0.5);
    color: white;
    transform: translateY(-2px);
}

.page-header {
    background: linear-gradient(135deg, #8b0000, #a50000);
    color: white;
    padding: 24px 32px;
    border-radius: 16px;
    margin-bottom: 24px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 8px 32px rgba(139, 0, 0, 0.2);
    backdrop-filter: blur(10px);
}

.page-header::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
    animation: shimmer 6s infinite linear;
}

@keyframes shimmer {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.page-header h1 {
    font-size: 1.6rem;
    font-weight: 800;
    margin: 0 0 8px 0;
    letter-spacing: -0.3px;
    display: flex;
    align-items: center;
    gap: 12px;
}

.page-header p {
    font-size: 0.9rem;
    opacity: 0.9;
    margin: 0;
    font-weight: 500;
}

.breadcrumb-custom {
    background: rgba(139, 0, 0, 0.1);
    border: 1px solid rgba(139, 0, 0, 0.2);
    border-radius: 12px;
    padding: 12px 20px;
    margin-bottom: 20px;
    backdrop-filter: blur(10px);
}

.breadcrumb {
    margin: 0;
    background: transparent;
    font-size: 0.85rem;
}

.breadcrumb-item {
    font-weight: 500;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: '›';
    color: #8b0000;
    font-weight: 700;
    font-size: 1.1rem;
}

.breadcrumb-item a {
    color: #8b0000;
    text-decoration: none;
    transition: all 0.3s ease;
}

.breadcrumb-item a:hover {
    color: #a50000;
    text-decoration: underline;
}

.breadcrumb-item.active {
    color: #6b7280;
    font-weight: 600;
}

.article-cover {
    margin-bottom: 20px;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
}

.article-cover img {
    width: 100%;
    height: 320px;
    object-fit: cover;
    transition: transform 0.3s ease;
    cursor: pointer;
}

.article-cover img:hover {
    transform: scale(1.02);
}

.article-meta {
    border-bottom: 1px solid rgba(139, 0, 0, 0.1);
    padding-bottom: 20px;
    margin-bottom: 20px;
}

.meta-row {
    display: flex;
    gap: 12px;
    align-items: center;
    margin-bottom: 12px;
    flex-wrap: wrap;
}

.meta-row:last-child {
    margin-bottom: 0;
}

.category-tag {
    background: linear-gradient(135deg, #8b0000, #a50000);
    color: white;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    box-shadow: 0 4px 12px rgba(139, 0, 0, 0.3);
    text-decoration: none;
    transition: all 0.3s ease;
}

.category-tag:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(139, 0, 0, 0.4);
    color: white;
}

.status-badge {
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border: 2px solid;
}

.status-published {
    background: linear-gradient(135deg, #d1f2dd, #f0fdf4);
    color: #065f46;
    border-color: #22c55e;
    box-shadow: 0 4px 12px rgba(34, 197, 94, 0.2);
}

.status-draft {
    background: linear-gradient(135deg, #fef3c7, #fffbeb);
    color: #92400e;
    border-color: #f59e0b;
    box-shadow: 0 4px 12px rgba(245, 158, 11, 0.2);
}

.meta-item {
    color: #6b7280;
    font-size: 0.8rem;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(139, 0, 0, 0.05);
    padding: 4px 10px;
    border-radius: 12px;
    border: 1px solid rgba(139, 0, 0, 0.1);
    font-weight: 500;
}

.article-title {
    color: #1f2937;
    font-size: 2.2rem;
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: 20px;
    background: linear-gradient(135deg, #1f2937, #4b5563);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.article-excerpt {
    color: #4b5563;
    font-size: 1.1rem;
    line-height: 1.6;
    margin-bottom: 24px;
    padding: 20px;
    background: linear-gradient(135deg, #f8fafc, #ffffff);
    border-left: 4px solid #8b0000;
    border-radius: 0 12px 12px 0;
    box-shadow: 0 4px 16px rgba(139, 0, 0, 0.1);
    position: relative;
}

.article-excerpt::before {
    content: '"';
    position: absolute;
    left: 12px;
    top: 12px;
    font-size: 2.5rem;
    color: #8b0000;
    opacity: 0.3;
    font-family: serif;
}

.content-text {
    font-size: 1rem;
    line-height: 1.7;
    color: #374151;
    font-family: 'Inter', 'Georgia', serif;
}

.content-text p {
    margin-bottom: 20px;
}

.article-footer {
    border-top: 1px solid rgba(139, 0, 0, 0.1);
    padding-top: 20px;
    margin-top: 32px;
}

.info-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.info-item {
    background: linear-gradient(135deg, #f8fafc, #ffffff);
    border: 1px solid rgba(139, 0, 0, 0.1);
    border-radius: 12px;
    padding: 12px;
    transition: all 0.3s ease;
}

.info-item:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(139, 0, 0, 0.1);
}

.info-item label {
    font-weight: 700;
    color: #8b0000;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 6px;
    display: block;
}

.info-item span {
    color: #1f2937;
    font-weight: 500;
    font-size: 0.85rem;
    line-height: 1.4;
}

.info-slug {
    background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
    color: #475569;
    padding: 6px 10px;
    border-radius: 8px;
    font-size: 0.8rem;
    font-family: 'Monaco', 'Menlo', monospace;
    word-break: break-all;
    border: 1px solid #cbd5e1;
}

.category-link a {
    color: #8b0000;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    padding: 3px 6px;
    border-radius: 6px;
}

.category-link a:hover {
    background: rgba(139, 0, 0, 0.1);
    color: #a50000;
    text-decoration: none;
}

.quick-actions .btn {
    width: 100%;
    text-align: left;
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 16px;
    margin-bottom: 8px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 0.85rem;
    transition: all 0.3s ease;
}

.quick-actions .btn i {
    width: 18px;
    text-align: center;
    font-size: 1rem;
}

.quick-actions .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.section-title {
    color: #8b0000;
    font-weight: 700;
    font-size: 1rem;
    margin-bottom: 16px;
    padding-bottom: 8px;
    border-bottom: 2px solid rgba(139, 0, 0, 0.15);
    position: relative;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 50px;
    height: 2px;
    background: linear-gradient(90deg, #8b0000, #a50000);
    border-radius: 1px;
}

.card-header {
    background: linear-gradient(135deg, #f9fafb, #ffffff);
    border-bottom: 1px solid rgba(139, 0, 0, 0.1);
    border-radius: 16px 16px 0 0 !important;
    padding: 16px 20px;
}

.card-title {
    color: #8b0000;
    font-weight: 700;
    font-size: 0.95rem;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
}

.card-body {
    padding: 20px;
}

/* Ripple effect for buttons */
.premium-btn {
    position: relative;
    overflow: hidden;
}

.ripple {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.4);
    animation: ripple-animation 0.6s ease-out;
    pointer-events: none;
}

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

/* Success & Error Alert Styles */
.custom-alert {
    border: none;
    border-radius: 16px;
    padding: 16px 20px;
    margin-bottom: 20px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    border-left: 4px solid;
    animation: slideInDown 0.4s ease-out;
    font-size: 0.9rem;
}

.alert-success {
    background: linear-gradient(135deg, #d1f2dd, #f0fdf4);
    border-left-color: #22c55e;
    color: #065f46;
}

.alert-danger {
    background: linear-gradient(135deg, #fecaca, #fef2f2);
    border-left-color: #ef4444;
    color: #991b1b;
}

.alert-content {
    display: flex;
    align-items: flex-start;
    gap: 12px;
}

.alert-icon {
    font-size: 1.2rem;
    margin-top: 2px;
}

.alert-text strong {
    font-weight: 700;
    margin-right: 6px;
}

@keyframes slideInDown {
    0% {
        transform: translateY(-20px);
        opacity: 0;
    }
    100% {
        transform: translateY(0);
        opacity: 1;
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .premium-content-wrapper {
        padding: 16px;
    }
    
    .page-header {
        padding: 20px;
        flex-direction: column;
        align-items: flex-start !important;
        gap: 16px;
    }
    
    .page-header h1 {
        font-size: 1.4rem;
    }
    
    .page-header p {
        font-size: 0.85rem;
    }
    
    .article-title {
        font-size: 1.8rem;
    }
    
    .article-excerpt {
        font-size: 1rem;
        padding: 16px;
    }
    
    .content-text {
        font-size: 0.9rem;
    }
    
    .meta-row {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }
    
    .card-header {
        padding: 12px 16px;
    }
    
    .card-body {
        padding: 16px;
    }
    
    .quick-actions .btn {
        font-size: 0.8rem;
        padding: 10px 14px;
    }
    
    .article-cover img {
        height: 240px;
    }
}

@media (max-width: 576px) {
    .page-header h1 {
        font-size: 1.2rem;
    }
    
    .article-title {
        font-size: 1.6rem;
    }
    
    .premium-btn {
        font-size: 0.8rem;
        padding: 8px 14px;
    }
    
    .info-item {
        padding: 10px;
    }
    
    .info-item label {
        font-size: 0.7rem;
    }
    
    .info-item span {
        font-size: 0.8rem;
    }
}
</style>
@endpush

@section('content')
<!-- Success & Error Alerts -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show custom-alert" role="alert" style="margin: 20px; position: relative; z-index: 1000;">
        <div class="alert-content">
            <i class="fas fa-check-circle alert-icon" style="color: #22c55e;"></i>
            <div class="alert-text">
                <strong>Berhasil!</strong> {{ session('success') }}
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" style="background: rgba(0, 0, 0, 0.1); border-radius: 12px; opacity: 0.7; width: 32px; height: 32px;"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show custom-alert" role="alert" style="margin: 20px; position: relative; z-index: 1000;">
        <div class="alert-content">
            <i class="fas fa-exclamation-triangle alert-icon" style="color: #ef4444;"></i>
            <div class="alert-text">
                <strong>Error!</strong> {{ session('error') }}
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" style="background: rgba(0, 0, 0, 0.1); border-radius: 12px; opacity: 0.7; width: 32px; height: 32px;"></button>
    </div>
@endif

<div class="premium-content-wrapper">

<!-- Breadcrumb -->
<div class="breadcrumb-custom">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.articles.index') }}">Artikel</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.article-categories.show', $article->category) }}">
                    {{ $article->category->name }}
                </a>
            </li>
            <li class="breadcrumb-item active">{{ Str::limit($article->title, 40) }}</li>
        </ol>
    </nav>
</div>

<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="mb-2" style="font-size: 1.8rem; font-weight: 700;">
                <i class="fas fa-newspaper me-3" style="font-size: 1.5rem;"></i>
                Detail Artikel
            </h1>
            <p class="mb-0 opacity-90" style="font-size: 1rem;">
                {{ Str::limit($article->title, 60) }}
            </p>
        </div>
        <div class="d-flex gap-3">
            <a href="{{ route('admin.articles.edit', $article) }}" class="premium-btn">
                <i class="fas fa-edit"></i>
                Edit Artikel
            </a>
            <button type="button" class="premium-btn premium-btn-outline" 
                    style="background: rgba(220, 53, 69, 0.9); border-color: rgba(220, 53, 69, 0.9); color: white;"
                    onclick="showDeleteModal()">
                <i class="fas fa-trash"></i>
                Hapus
            </button>
            <a href="{{ route('admin.articles.index') }}" class="premium-btn premium-btn-outline">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>
    </div>
</div>

<div class="premium-content-wrapper">
    <div class="content-body">
        <div class="row">
            <div class="col-lg-8">
                <!-- Article Content -->
                <div class="premium-card">
                    <div class="card-body">
                        <!-- Article Header -->
                        <div class="article-header">
                            @if($article->cover_url)
                                <div class="article-cover mb-4">
                                    <img src="{{ asset($article->cover_url) }}" 
                                         alt="{{ $article->title }}" 
                                         class="img-fluid"
                                         onclick="openImageModal('{{ asset($article->cover_url) }}', '{{ $article->title }}')">
                                </div>
                            @endif
                            
                            <div class="article-meta mb-4">
                                <div class="meta-row">
                                    <a href="{{ route('admin.article-categories.show', $article->category) }}" class="category-tag">
                                        <i class="fas fa-folder"></i>
                                        {{ $article->category->name }}
                                    </a>
                                    <span class="status-badge status-{{ $article->status }}">
                                        <i class="fas fa-{{ $article->status === 'published' ? 'globe' : 'file-alt' }}"></i>
                                        {{ $article->status === 'published' ? 'Dipublikasi' : 'Draft' }}
                                    </span>
                                </div>
                                
                                <div class="meta-row">
                                    <span class="meta-item">
                                        <i class="fas fa-calendar-plus"></i>
                                        Dibuat: {{ $article->created_at->format('d M Y, H:i') }}
                                    </span>
                                    @if($article->published_at)
                                        <span class="meta-item">
                                            <i class="fas fa-globe"></i>
                                            Dipublikasi: {{ $article->published_at->format('d M Y, H:i') }}
                                        </span>
                                    @endif
                                    @if($article->updated_at != $article->created_at)
                                        <span class="meta-item">
                                            <i class="fas fa-edit"></i>
                                            Diperbarui: {{ $article->updated_at->format('d M Y, H:i') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <h1 class="article-title">{{ $article->title }}</h1>
                            
                            <div class="article-excerpt">
                                <p class="lead mb-0">{{ $article->excerpt }}</p>
                            </div>
                        </div>

                        <!-- Article Content -->
                        <div class="article-content mt-4">
                            <div class="content-text">
                                {!! nl2br(e($article->content)) !!}
                            </div>
                        </div>

                        <!-- Article Footer -->
                        <div class="article-footer mt-5">
                            <div class="d-flex gap-3 flex-wrap">
                                <a href="{{ route('admin.articles.edit', $article) }}" class="premium-btn">
                                    <i class="fas fa-edit"></i>
                                    Edit Artikel
                                </a>
                                
                                @if($article->status === 'draft')
                                <form action="{{ route('admin.articles.update', $article) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="category_id" value="{{ $article->category_id }}">
                                    <input type="hidden" name="title" value="{{ $article->title }}">
                                    <input type="hidden" name="excerpt" value="{{ $article->excerpt }}">
                                    <input type="hidden" name="content" value="{{ $article->content }}">
                                    <input type="hidden" name="meta_title" value="{{ $article->meta_title }}">
                                    <input type="hidden" name="meta_description" value="{{ $article->meta_description }}">
                                    <input type="hidden" name="status" value="published">
                                    <button type="submit" class="premium-btn" style="background: #28a745;">
                                        <i class="fas fa-globe"></i>
                                        Publikasikan
                                    </button>
                                </form>
                                @endif
                                
                                <button type="button" 
                                        class="premium-btn" 
                                        style="background: #dc3545;"
                                        onclick="showDeleteModal()">
                                    <i class="fas fa-trash"></i>
                                    Hapus Artikel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Article Information -->
                <div class="premium-card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-info-circle"></i>
                            Informasi Artikel
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="info-list">
                            <div class="info-item">
                                <label>Judul:</label>
                                <span>{{ $article->title }}</span>
                            </div>
                            
                            <div class="info-item">
                                <label>Slug:</label>
                                <span class="info-slug">{{ $article->slug }}</span>
                            </div>
                            
                            <div class="info-item">
                                <label>Kategori:</label>
                                <span class="category-link">
                                    <a href="{{ route('admin.article-categories.show', $article->category) }}">
                                        <i class="fas fa-folder me-1"></i>
                                        {{ $article->category->name }}
                                    </a>
                                </span>
                            </div>
                            
                            <div class="info-item">
                                <label>Status:</label>
                                <span class="status-badge status-{{ $article->status }}">
                                    <i class="fas fa-{{ $article->status === 'published' ? 'globe' : 'file-alt' }}"></i>
                                    {{ $article->status === 'published' ? 'Dipublikasi' : 'Draft' }}
                                </span>
                            </div>
                            
                            <div class="info-item">
                                <label>Panjang Konten:</label>
                                <span>{{ number_format(strlen($article->content)) }} karakter</span>
                            </div>
                            
                            <div class="info-item">
                                <label>Estimasi Waktu Baca:</label>
                                <span>{{ ceil(str_word_count($article->content) / 200) }} menit</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SEO Information -->
                @if($article->meta_title || $article->meta_description)
                <div class="premium-card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-search"></i>
                            SEO Information
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="info-list">
                            @if($article->meta_title)
                            <div class="info-item">
                                <label>Meta Title:</label>
                                <span>{{ $article->meta_title }}</span>
                            </div>
                            @endif
                            
                            @if($article->meta_description)
                            <div class="info-item">
                                <label>Meta Description:</label>
                                <span>{{ $article->meta_description }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endif

                <!-- Statistics -->
                <div class="premium-card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-chart-bar"></i>
                            Statistik
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="info-list">
                            <div class="info-item">
                                <label>Dibuat:</label>
                                <span>{{ $article->created_at->format('d M Y, H:i') }}</span>
                            </div>
                            
                            <div class="info-item">
                                <label>Terakhir Diperbarui:</label>
                                <span>{{ $article->updated_at->format('d M Y, H:i') }}</span>
                            </div>
                            
                            @if($article->published_at)
                            <div class="info-item">
                                <label>Tanggal Publish:</label>
                                <span>{{ $article->published_at->format('d M Y, H:i') }}</span>
                            </div>
                            @endif
                            
                            <div class="info-item">
                                <label>Usia Artikel:</label>
                                <span>{{ $article->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="premium-card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-bolt"></i>
                            Aksi Cepat
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="quick-actions">
                            <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i>
                                Edit Artikel
                            </a>
                            
                            <a href="{{ route('admin.articles.create') }}?category={{ $article->category_id }}" 
                               class="btn btn-primary">
                                <i class="fas fa-plus"></i>
                                Artikel Baru di Kategori Ini
                            </a>
                            
                            <a href="{{ route('admin.article-categories.show', $article->category) }}" 
                               class="btn btn-info">
                                <i class="fas fa-folder"></i>
                                Lihat Kategori
                            </a>
                            
                            @if($article->status === 'draft')
                            <form action="{{ route('admin.articles.update', $article) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="category_id" value="{{ $article->category_id }}">
                                <input type="hidden" name="title" value="{{ $article->title }}">
                                <input type="hidden" name="excerpt" value="{{ $article->excerpt }}">
                                <input type="hidden" name="content" value="{{ $article->content }}">
                                <input type="hidden" name="meta_title" value="{{ $article->meta_title }}">
                                <input type="hidden" name="meta_description" value="{{ $article->meta_description }}">
                                <input type="hidden" name="status" value="published">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-globe"></i>
                                    Publikasikan Sekarang
                                </button>
                            </form>
                            @else
                            <form action="{{ route('admin.articles.update', $article) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="category_id" value="{{ $article->category_id }}">
                                <input type="hidden" name="title" value="{{ $article->title }}">
                                <input type="hidden" name="excerpt" value="{{ $article->excerpt }}">
                                <input type="hidden" name="content" value="{{ $article->content }}">
                                <input type="hidden" name="meta_title" value="{{ $article->meta_title }}">
                                <input type="hidden" name="meta_description" value="{{ $article->meta_description }}">
                                <input type="hidden" name="status" value="draft">
                                <button type="submit" class="btn btn-secondary">
                                    <i class="fas fa-file-alt"></i>
                                    Ubah ke Draft
                                </button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">
                    <i class="fas fa-image me-2"></i>
                    Cover Artikel
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center p-4">
                <img id="modalImage" src="" alt="" class="img-fluid" style="max-height: 70vh; border-radius: 15px;">
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="premium-btn premium-btn-outline" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i>
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(135deg, #dc3545, #c82333); color: white;">
                <h5 class="modal-title" id="deleteModalLabel">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Hapus Artikel?
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center p-4">
                <div class="mb-3">
                    <i class="fas fa-trash-alt" style="font-size: 3rem; color: #dc3545; opacity: 0.7;"></i>
                </div>
                <h6 class="mb-3">Apakah Anda yakin ingin menghapus artikel ini?</h6>
                <p class="text-muted mb-0">
                    <strong>{{ $article->title }}</strong><br>
                    <small>Tindakan ini akan menghapus artikel dan gambar cover, dan tidak dapat dibatalkan!</small>
                </p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>
                    Batal
                </button>
                <form id="deleteForm" method="POST" action="{{ route('admin.articles.destroy', $article) }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" id="deleteButton">
                        <i class="fas fa-trash me-1"></i>
                        Ya, Hapus Artikel
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
// Open image modal
function openImageModal(imageSrc, imageAlt) {
    const modalImage = document.getElementById('modalImage');
    modalImage.src = imageSrc;
    modalImage.alt = imageAlt;
    
    const imageModal = new bootstrap.Modal(document.getElementById('imageModal'), {
        backdrop: 'static',
        keyboard: true
    });
    imageModal.show();
    
    // Add loading effect
    modalImage.style.opacity = '0';
    modalImage.onload = function() {
        this.style.opacity = '1';
        this.style.transition = 'opacity 0.3s ease';
    };
}

// Delete article function with modern confirmation
function deleteArticle(articleId) {
    showModernConfirm(
        'Hapus Artikel?', 
        'Apakah Anda yakin ingin menghapus artikel ini? Tindakan ini akan menghapus artikel dan gambar cover, dan tidak dapat dibatalkan!',
        'fas fa-trash-alt',
        'danger',
        function() {
            // Create a form and submit it instead of using fetch
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/admin/articles/${articleId}`;
            
            // Add CSRF token
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = csrfToken;
            form.appendChild(csrfInput);
            
            // Add method override for DELETE
            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'DELETE';
            form.appendChild(methodInput);
            
            // Show loading alert
            showModernAlert('info', 'Memproses...', 'Sedang menghapus artikel, harap tunggu.', 'fas fa-spinner fa-spin', 0);
            
            // Append form to body and submit
            document.body.appendChild(form);
            form.submit();
        }
    );
}

// Simple delete modal function
function showDeleteModal() {
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteModal.show();
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
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
    
    // Enhanced modal animations for image modal
    const imageModal = document.getElementById('imageModal');
    if (imageModal) {
        imageModal.addEventListener('show.bs.modal', function() {
            this.style.display = 'block';
            this.style.opacity = '0';
            setTimeout(() => {
                this.style.opacity = '1';
                this.style.transition = 'opacity 0.3s ease';
            }, 10);
        });
        
        imageModal.addEventListener('hide.bs.modal', function() {
            this.style.opacity = '0';
        });
    }
    
    // Keyboard shortcuts for modern modals
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const modernConfirm = document.getElementById('modernConfirmOverlay');
            if (modernConfirm) {
                removeConfirm();
            } else {
                // Handle image modal
                const openModal = document.querySelector('.modal.show');
                if (openModal) {
                    bootstrap.Modal.getInstance(openModal).hide();
                }
            }
        }
    });
    
    // Auto-hide alerts after 5 seconds
    setTimeout(() => {
        const alerts = document.querySelectorAll('.custom-alert');
        alerts.forEach(alert => {
            if (alert) {
                alert.style.animation = 'slideOutUp 0.4s ease-out';
                setTimeout(() => {
                    alert.remove();
                }, 400);
            }
        });
    }, 5000);

    // Handle delete form submission with loading state
    const deleteForm = document.getElementById('deleteForm');
    if (deleteForm) {
        deleteForm.addEventListener('submit', function(e) {
            const deleteButton = document.getElementById('deleteButton');
            
            // Show loading state
            deleteButton.disabled = true;
            deleteButton.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Menghapus...';
            
            // Hide the modal
            const deleteModal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
            if (deleteModal) {
                deleteModal.hide();
            }
            
            // Show modern loading alert
            showModernAlert('info', 'Memproses...', 'Sedang menghapus artikel, harap tunggu.', 'fas fa-spinner fa-spin', 0);
        });
    }
});

// Modern Alert System (same as products and create)
function showModernAlert(type, title, message, icon, duration = 4000) {
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
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    background: ${alertStyle.iconColor};
                    color: white;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 1.2rem;
                    flex-shrink: 0;
                    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                ">
                    <i class="${icon}"></i>
                </div>
                <div style="flex: 1; padding-top: 2px;">
                    <div style="font-weight: 700; font-size: 1rem; margin-bottom: 4px;">${title}</div>
                    <div style="font-size: 0.9rem; opacity: 0.9; line-height: 1.4;">${message}</div>
                </div>
                <button onclick="removeAlert()" style="
                    background: none;
                    border: none;
                    color: ${alertStyle.color};
                    font-size: 1.2rem;
                    cursor: pointer;
                    opacity: 0.6;
                    transition: all 0.3s ease;
                    padding: 4px;
                    border-radius: 50%;
                    width: 28px;
                    height: 28px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-shrink: 0;
                " onmouseover="this.style.opacity='1'; this.style.background='rgba(0,0,0,0.1)'" onmouseout="this.style.opacity='0.6'; this.style.background='none'">
                    <i class="fas fa-times"></i>
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
                transform: translateX(0);
                opacity: 1;
            }
            100% {
                transform: translateX(100%);
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
                alert.style.animation = 'slideOutRight 0.4s cubic-bezier(0.4, 0, 0.2, 1)';
                setTimeout(() => {
                    alert.remove();
                }, 400);
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
                box-shadow: 0 15px 50px rgba(0, 0, 0, 0.3);
                max-width: 500px;
                width: 90%;
                animation: scaleIn 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                overflow: hidden;
            ">
                <div style="
                    background: ${colors.primary};
                    color: white;
                    padding: 25px;
                    text-align: center;
                ">
                    <div style="
                        width: 60px;
                        height: 60px;
                        border-radius: 50%;
                        background: rgba(255, 255, 255, 0.2);
                        margin: 0 auto 15px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 1.8rem;
                    ">
                        <i class="${icon}"></i>
                    </div>
                    <h4 style="margin: 0; font-weight: 700; font-size: 1.3rem;">${title}</h4>
                </div>
                <div style="
                    padding: 25px;
                    text-align: center;
                    line-height: 1.6;
                    color: #333;
                    font-size: 1rem;
                ">
                    ${message}
                </div>
                <div style="
                    padding: 20px 25px;
                    background: rgba(248, 249, 250, 0.5);
                    display: flex;
                    gap: 12px;
                    justify-content: center;
                ">
                    <button onclick="removeConfirm()" style="
                        background: rgba(108, 117, 125, 0.1);
                        border: 2px solid rgba(108, 117, 125, 0.3);
                        color: #6c757d;
                        padding: 12px 25px;
                        border-radius: 12px;
                        font-weight: 600;
                        cursor: pointer;
                        transition: all 0.3s ease;
                        min-width: 120px;
                    " onmouseover="this.style.background='rgba(108, 117, 125, 0.2)'; this.style.borderColor='#6c757d'" onmouseout="this.style.background='rgba(108, 117, 125, 0.1)'; this.style.borderColor='rgba(108, 117, 125, 0.3)'">
                        <i class="fas fa-times me-2"></i>Batal
                    </button>
                    <button onclick="confirmAction()" style="
                        background: ${colors.primary};
                        border: 2px solid ${colors.primary};
                        color: white;
                        padding: 12px 25px;
                        border-radius: 12px;
                        font-weight: 600;
                        cursor: pointer;
                        transition: all 0.3s ease;
                        min-width: 120px;
                    " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 20px rgba(220, 53, 69, 0.3)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                        <i class="fas fa-check me-2"></i>Ya, Hapus
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
                transform: scale(0.8);
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
                transform: scale(0.8);
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
/* Custom Alert Styles */
.custom-alert {
    border: none;
    border-radius: 15px;
    padding: 20px 25px;
    margin-bottom: 25px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    border-left: 5px solid;
    animation: slideInDown 0.4s ease-out;
}

.alert-success {
    background: linear-gradient(135deg, #d1e7dd, #f8fff9);
    border-left-color: #198754;
    color: #0f5132;
}

.alert-danger {
    background: linear-gradient(135deg, #f8d7da, #fef5f5);
    border-left-color: #dc3545;
    color: #842029;
}

.alert-content {
    display: flex;
    align-items: flex-start;
    gap: 15px;
}

.alert-icon {
    font-size: 1.5rem;
    margin-top: 2px;
}

.alert-text strong {
    font-weight: 700;
    margin-right: 8px;
}

@keyframes slideInDown {
    0% {
        transform: translateY(-30px);
        opacity: 0;
    }
    100% {
        transform: translateY(0);
        opacity: 1;
    }
}

@keyframes slideOutUp {
    0% {
        transform: translateY(0);
        opacity: 1;
    }
    100% {
        transform: translateY(-30px);
        opacity: 0;
    }
}

/* Enhanced button hover effects */
.premium-btn:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 8px 25px rgba(139, 0, 0, 0.3) !important;
}

.premium-btn:active {
    transform: translateY(0) !important;
    transition: transform 0.1s ease !important;
}

/* Loading spinner enhancement */
.fa-spinner {
    animation: spin 1s linear infinite !important;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Modal enhancements */
.modal-content {
    border-radius: 20px !important;
    border: none !important;
    box-shadow: 0 15px 50px rgba(0, 0, 0, 0.3) !important;
}

.modal-header {
    border-radius: 20px 20px 0 0 !important;
    background: linear-gradient(135deg, #8b0000, #a50000);
    color: white;
    border-bottom: none !important;
    padding: 20px 25px;
}

.modal-header .modal-title {
    font-weight: 700;
    font-size: 1.1rem !important;
}

.modal-header .btn-close {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    width: 35px;
    height: 35px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    filter: invert(1);
    opacity: 0.8;
    transition: all 0.3s ease;
}

.modal-header .btn-close:hover {
    background: rgba(255, 255, 255, 0.3);
    opacity: 1;
    transform: scale(1.1);
}

.modal-body {
    padding: 25px;
}

.modal-footer {
    padding: 20px 25px;
    border-top: 1px solid rgba(139, 0, 0, 0.1) !important;
    border-radius: 0 0 20px 20px !important;
    background: rgba(248, 249, 250, 0.5);
}
</style>
@endpush
