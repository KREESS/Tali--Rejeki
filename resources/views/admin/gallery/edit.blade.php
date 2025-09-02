@extends('admin.components.layout')

@section('title', $title)

@push('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header -->
            <div class="card shadow-xl border-0 rounded-4 mb-4 header-card">
                <div class="card-header bg-gradient-crimson text-white border-0 rounded-top-4">
                    <div class="d-flex justify-content-between align-items-center py-2">
                        <div class="d-flex align-items-center">
                            <div class="icon-wrapper me-3">
                                <i class="fas fa-edit fs-3"></i>
                            </div>
                            <div>
                                <h3 class="mb-1 fw-bold text-shadow">{{ $title }}</h3>
                                <p class="mb-0 opacity-85 fs-6">
                                    <i class="fas fa-images me-1"></i>
                                    Edit informasi dan gambar galeri
                                </p>
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.gallery.show', $gallery) }}" class="btn btn-light btn-sm rounded-pill px-3 shadow-sm">
                                <i class="fas fa-eye me-1"></i> Lihat Detail
                            </a>
                            <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-light btn-sm rounded-pill px-3">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alerts -->
            <div id="alertContainer"></div>
            
            @if ($errors->any())
                <div class="alert alert-danger border-0 rounded-4 shadow-lg mb-4 modern-alert" role="alert">
                    <div class="d-flex align-items-start">
                        <div class="alert-icon me-3">
                            <i class="fas fa-exclamation-triangle fs-4 text-danger"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="alert-heading mb-2 fw-bold">
                                <i class="fas fa-bug me-1"></i>
                                Terjadi Kesalahan
                            </h5>
                            <ul class="mb-0 ps-0" style="list-style: none;">
                                @foreach ($errors->all() as $error)
                                    <li class="mb-1">
                                        <i class="fas fa-circle text-danger me-2" style="font-size: 0.5rem;"></i>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success border-0 rounded-4 shadow-lg mb-4 modern-alert" role="alert">
                    <div class="d-flex align-items-center">
                        <div class="alert-icon me-3">
                            <i class="fas fa-check-circle fs-4 text-success"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="alert-heading mb-1 fw-bold">
                                <i class="fas fa-thumbs-up me-1"></i>
                                Berhasil!
                            </h5>
                            <p class="mb-0">{{ session('success') }}</p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger border-0 rounded-4 shadow-lg mb-4 modern-alert" role="alert">
                    <div class="d-flex align-items-center">
                        <div class="alert-icon me-3">
                            <i class="fas fa-exclamation-circle fs-4 text-danger"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="alert-heading mb-1 fw-bold">
                                <i class="fas fa-times-circle me-1"></i>
                                Gagal!
                            </h5>
                            <p class="mb-0">{{ session('error') }}</p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('admin.gallery.update', $gallery) }}" method="POST" enctype="multipart/form-data" id="galleryUpdateForm">
                @csrf
                @method('PUT')

                
                <div class="row g-4">
                    <!-- Basic Information -->
                    <div class="col-lg-8">
                        <div class="card shadow-lg border-0 rounded-4 modern-card">
                            <div class="card-header bg-gradient-crimson-light border-0 rounded-top-4">
                                <h5 class="mb-0 fw-bold text-white d-flex align-items-center">
                                    <div class="icon-wrapper-sm me-2">
                                        <i class="fas fa-info-circle"></i>
                                    </div>
                                    Informasi Gallery
                                </h5>
                            </div>
                            <div class="card-body p-4">
                                <div class="row g-4">
                                    <div class="col-12">
                                        <label for="title" class="form-label fw-bold text-dark d-flex align-items-center">
                                            <i class="fas fa-heading me-2 text-crimson"></i>
                                            Judul Gallery 
                                            <span class="required-star ms-1">*</span>
                                        </label>
                                        <input type="text" class="form-control form-control-lg border-2 rounded-3 modern-input" 
                                               id="title" name="title" value="{{ old('title', $gallery->title) }}" 
                                               required placeholder="Masukkan judul gallery yang menarik...">
                                    </div>

                                    <div class="col-12">
                                        <label for="slug" class="form-label fw-bold text-dark d-flex align-items-center">
                                            <i class="fas fa-link me-2 text-crimson"></i>
                                            Slug URL
                                        </label>
                                        <input type="text" class="form-control border-2 rounded-3 modern-input" 
                                               id="slug" name="slug" value="{{ old('slug', $gallery->slug) }}" 
                                               placeholder="otomatis dari judul (opsional)">
                                        <div class="form-text">
                                            <i class="fas fa-info-circle me-1 text-crimson"></i>
                                            URL: <span class="text-crimson fw-bold">{{ url('/gallery') }}/{{ $gallery->slug ?? 'slug-gallery' }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="description" class="form-label fw-bold text-dark d-flex align-items-center">
                                            <i class="fas fa-align-left me-2 text-crimson"></i>
                                            Deskripsi
                                        </label>
                                        <textarea class="form-control border-2 rounded-3 modern-input" id="description" name="description" 
                                                  rows="4" placeholder="Ceritakan tentang gallery ini...">{{ old('description', $gallery->description) }}</textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="status" class="form-label fw-bold text-dark d-flex align-items-center">
                                            <i class="fas fa-toggle-on me-2 text-crimson"></i>
                                            Status 
                                            <span class="required-star ms-1">*</span>
                                        </label>
                                        <select class="form-select form-select-lg border-2 rounded-3 modern-input" id="status" name="status" required>
                                            <option value="draft" {{ old('status', $gallery->status) == 'draft' ? 'selected' : '' }}>
                                                📝 Draft
                                            </option>
                                            <option value="published" {{ old('status', $gallery->status) == 'published' ? 'selected' : '' }}>
                                                🌟 Published
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="published_at" class="form-label fw-bold text-dark d-flex align-items-center">
                                            <i class="fas fa-calendar me-2 text-crimson"></i>
                                            Tanggal Publish
                                        </label>
                                        <input type="datetime-local" class="form-control border-2 rounded-3 modern-input" 
                                               id="published_at" name="published_at" 
                                               value="{{ old('published_at', $gallery->published_at?->format('Y-m-d\TH:i')) }}">
                                        <div class="form-text">
                                            <i class="fas fa-clock me-1 text-crimson"></i>
                                            Kosongkan untuk publish sekarang
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SEO Settings -->
                    <div class="col-lg-4">
                        <div class="card shadow-lg border-0 rounded-4 modern-card">
                            <div class="card-header bg-gradient-success-crimson border-0 rounded-top-4">
                                <h5 class="mb-0 fw-bold text-white d-flex align-items-center">
                                    <div class="icon-wrapper-sm me-2">
                                        <i class="fas fa-search"></i>
                                    </div>
                                    SEO Settings
                                </h5>
                            </div>
                            <div class="card-body p-4">
                                <div class="mb-4">
                                    <label for="meta_title" class="form-label fw-bold text-dark d-flex align-items-center">
                                        <i class="fas fa-tag me-2 text-crimson"></i>
                                        Meta Title
                                    </label>
                                    <input type="text" class="form-control border-2 rounded-3 modern-input" 
                                           id="meta_title" name="meta_title" 
                                           value="{{ old('meta_title', $gallery->meta_title) }}" 
                                           placeholder="SEO title untuk search engine" maxlength="255">
                                    <div class="form-text">
                                        <i class="fas fa-lightbulb me-1 text-warning"></i>
                                        Optimal 50-60 karakter
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="meta_description" class="form-label fw-bold text-dark d-flex align-items-center">
                                        <i class="fas fa-file-alt me-2 text-crimson"></i>
                                        Meta Description
                                    </label>
                                    <textarea class="form-control border-2 rounded-3 modern-input" id="meta_description" name="meta_description" 
                                              rows="3" placeholder="Deskripsi untuk search engine" maxlength="255">{{ old('meta_description', $gallery->meta_description) }}</textarea>
                                    <div class="form-text">
                                        <i class="fas fa-lightbulb me-1 text-warning"></i>
                                        Optimal 150-160 karakter
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="meta_robots" class="form-label fw-bold text-dark d-flex align-items-center">
                                        <i class="fas fa-robot me-2 text-crimson"></i>
                                        Meta Robots
                                    </label>
                                    <select class="form-select border-2 rounded-3 modern-input" id="meta_robots" name="meta_robots">
                                        <option value="">🔍 Default (index, follow)</option>
                                        <option value="noindex" {{ old('meta_robots', $gallery->meta_robots) === 'noindex' ? 'selected' : '' }}>🚫 No Index</option>
                                        <option value="nofollow" {{ old('meta_robots', $gallery->meta_robots) === 'nofollow' ? 'selected' : '' }}>🔗 No Follow</option>
                                        <option value="noindex,nofollow" {{ old('meta_robots', $gallery->meta_robots) === 'noindex,nofollow' ? 'selected' : '' }}>❌ No Index, No Follow</option>
                                    </select>
                                </div>

                                <div class="mb-0">
                                    <label for="canonical_url" class="form-label fw-bold text-dark d-flex align-items-center">
                                        <i class="fas fa-external-link-alt me-2 text-crimson"></i>
                                        Canonical URL
                                    </label>
                                    <input type="url" class="form-control border-2 rounded-3 modern-input" 
                                           id="canonical_url" name="canonical_url" 
                                           value="{{ old('canonical_url', $gallery->canonical_url) }}" 
                                           placeholder="https://example.com/canonical-url">
                                    <div class="form-text">
                                        <i class="fas fa-info-circle me-1 text-info"></i>
                                        URL yang disukai untuk halaman ini
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- New Images Upload -->
                    <div class="col-12">
                        <div class="card shadow-lg border-0 rounded-4 modern-card">
                            <div class="card-header bg-gradient-warning-crimson border-0 rounded-top-4">
                                <h5 class="mb-0 fw-bold text-white d-flex align-items-center">
                                    <div class="icon-wrapper-sm me-2">
                                        <i class="fas fa-plus-circle"></i>
                                    </div>
                                    Tambah Gambar Baru
                                </h5>
                            </div>
                            <div class="card-body p-4">
                                <div class="upload-area border-3 border-dashed rounded-4 p-5 text-center modern-upload-area" 
                                     id="uploadArea">
                                    <div class="upload-content">
                                        <i class="fas fa-cloud-upload-alt upload-icon mb-3"></i>
                                        <h4 class="text-crimson mb-3 fw-bold">Drag & Drop atau Klik untuk Upload</h4>
                                        <p class="text-muted mb-2 fs-5">
                                            <i class="fas fa-images me-2"></i>
                                            Pilih multiple gambar (JPEG, PNG, JPG, GIF, WebP)
                                        </p>
                                        <div class="upload-specs">
                                            <span class="badge bg-crimson-light text-white me-2">
                                                <i class="fas fa-weight-hanging me-1"></i>
                                                Maksimal 2MB per file
                                            </span>
                                            <span class="badge bg-success text-white">
                                                <i class="fas fa-layer-group me-1"></i>
                                                Upload multiple
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <input type="file" class="d-none" id="new_images" name="new_images[]" multiple accept="image/*">
                                <div id="imagePreview" class="row g-3 mt-3"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Current Images -->
                    @if($gallery->images->count() > 0)
                    <!-- Current Images -->
                    <div class="col-12">
                        <div class="card shadow-lg border-0 rounded-4 modern-card">
                            <div class="card-header bg-gradient-info-crimson border-0 rounded-top-4">
                                <h5 class="mb-0 fw-bold text-white d-flex align-items-center">
                                    <div class="icon-wrapper-sm me-2">
                                        <i class="fas fa-images"></i>
                                    </div>
                                    Gambar Saat Ini
                                    <span class="badge bg-white text-dark ms-2 rounded-pill">
                                        {{ $gallery->images->count() }} gambar
                                    </span>
                                </h5>
                            </div>
                            <div class="card-body p-4">
                                <div class="row g-4">
                                    @foreach($gallery->images as $image)
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="card border-0 shadow-lg rounded-4 overflow-hidden h-100 image-item modern-image-card" id="image-{{ $image->id }}">
                                                <div class="position-relative image-container">
                                                    <img src="{{ $image->image_url }}" 
                                                         class="card-img-top" 
                                                         style="height: 220px; object-fit: cover;">
                                                    @if($image->is_primary)
                                                        <div class="position-absolute top-0 start-0 p-2">
                                                            <span class="badge bg-gradient-warning text-dark fw-bold shadow-sm">
                                                                <i class="fas fa-crown me-1"></i>Primary
                                                            </span>
                                                        </div>
                                                    @endif
                                                    <div class="image-overlay">
                                                        <div class="overlay-content">
                                                            <i class="fas fa-eye fs-3 text-white"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body p-3">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <small class="text-muted text-truncate fw-medium">
                                                            <i class="fas fa-file-image me-1 text-crimson"></i>
                                                            {{ $image->seo_filename ?? 'No filename' }}
                                                        </small>
                                                        <div class="btn-group" role="group">
                                                            @if(!$image->is_primary)
                                                                <button type="button" class="btn btn-outline-warning btn-sm primary-btn rounded-pill" 
                                                                        data-image-id="{{ $image->id }}"
                                                                        title="Jadikan Primary">
                                                                    <i class="fas fa-crown"></i>
                                                                </button>
                                                            @endif
                                                            <button type="button" class="btn btn-outline-danger btn-sm delete-btn rounded-pill" 
                                                                    data-image-id="{{ $image->id }}"
                                                                    title="Hapus gambar">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Submit Button -->
                    <div class="col-12">
                        <div class="submit-section text-center">
                            <div class="action-buttons d-flex justify-content-center gap-3 flex-wrap">
                                <button type="submit" class="btn btn-crimson btn-lg px-5 rounded-pill shadow-lg modern-btn" id="updateBtn">
                                    <div class="btn-content">
                                        <i class="fas fa-save me-2"></i>
                                        <span id="btnText">Update Gallery</span>
                                    </div>
                                    <div class="btn-loading d-none" id="btnLoading">
                                        <div class="spinner-border spinner-border-sm me-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <span>Sedang Update...</span>
                                    </div>
                                </button>
                                <a href="{{ route('admin.gallery.show', $gallery) }}" class="btn btn-info btn-lg px-5 rounded-pill shadow-lg">
                                    <i class="fas fa-eye me-2"></i>Lihat Detail
                                </a>
                                <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary btn-lg px-5 rounded-pill shadow-lg">
                                    <i class="fas fa-times me-2"></i>Batal
                                </a>
                            </div>
                            
                            <div class="submit-info mt-3">
                                <small class="text-muted">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Pastikan semua data sudah benar sebelum menyimpan
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('styles')
<style>
/* Modern Crimson Gallery Edit Styling */
:root {
    --crimson-primary: #8B0000;
    --crimson-secondary: #A52A2A;
    --crimson-light: #DC143C;
    --crimson-dark: #600000;
    --crimson-gradient: linear-gradient(135deg, #8B0000 0%, #DC143C 50%, #B22222 100%);
    --crimson-gradient-light: linear-gradient(135deg, #DC143C 0%, #FF6B6B 100%);
    --text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    --box-shadow-light: 0 4px 20px rgba(139, 0, 0, 0.15);
    --box-shadow-heavy: 0 8px 40px rgba(139, 0, 0, 0.25);
}

.bg-gradient-crimson {
    background: var(--crimson-gradient);
    box-shadow: var(--box-shadow-light);
}

.bg-gradient-crimson-light {
    background: linear-gradient(135deg, var(--crimson-primary) 0%, var(--crimson-light) 100%);
}

.bg-gradient-success-crimson {
    background: linear-gradient(135deg, #28a745 0%, var(--crimson-secondary) 100%);
}

.bg-gradient-warning-crimson {
    background: linear-gradient(135deg, #ffc107 0%, var(--crimson-light) 100%);
}

.bg-gradient-info-crimson {
    background: linear-gradient(135deg, #17a2b8 0%, var(--crimson-secondary) 100%);
}

.text-crimson {
    color: var(--crimson-primary) !important;
}

.text-shadow {
    text-shadow: var(--text-shadow);
}

.btn-crimson {
    background: var(--crimson-gradient);
    border: none;
    color: white;
    font-weight: 600;
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}

.btn-crimson:hover {
    transform: translateY(-2px);
    box-shadow: var(--box-shadow-heavy);
    color: white;
}

.btn-crimson:active {
    transform: translateY(0);
}

.bg-crimson-light {
    background-color: var(--crimson-light) !important;
}

/* Header Card */
.header-card {
    border: 2px solid var(--crimson-light);
    background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%);
}

/* Icon Wrappers */
.icon-wrapper {
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(10px);
}

.icon-wrapper-sm {
    width: 35px;
    height: 35px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(10px);
}

/* Modern Cards */
.modern-card {
    border: 1px solid rgba(139, 0, 0, 0.1);
    transition: all 0.4s ease;
    overflow: hidden;
}

.modern-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--box-shadow-heavy);
    border-color: var(--crimson-light);
}

/* Modern Alerts */
.modern-alert {
    border-left: 5px solid;
    backdrop-filter: blur(10px);
    animation: slideInRight 0.5s ease;
}

@keyframes slideInRight {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

.alert-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 255, 255, 0.9);
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

/* Form Controls */
.modern-input {
    transition: all 0.3s ease;
    border-color: rgba(139, 0, 0, 0.2);
    background: linear-gradient(145deg, #ffffff 0%, #fafafa 100%);
}

.modern-input:focus {
    border-color: var(--crimson-light);
    box-shadow: 0 0 0 0.25rem rgba(220, 20, 60, 0.25);
    background: #ffffff;
    transform: scale(1.02);
}

.required-star {
    color: var(--crimson-light);
    font-weight: bold;
    font-size: 1.2em;
}

/* Upload Area */
.modern-upload-area {
    border-color: var(--crimson-light) !important;
    background: linear-gradient(145deg, #fafafa 0%, #ffffff 100%) !important;
    cursor: pointer;
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}

.modern-upload-area::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(220, 20, 60, 0.1), transparent);
    transition: left 0.6s ease;
}

.modern-upload-area:hover::before {
    left: 100%;
}

.modern-upload-area:hover {
    background: linear-gradient(145deg, var(--crimson-light), var(--crimson-secondary)) !important;
    color: white;
    transform: scale(1.02);
    box-shadow: var(--box-shadow-heavy);
}

.modern-upload-area:hover .upload-icon {
    color: white !important;
    transform: scale(1.2);
}

.modern-upload-area:hover h4 {
    color: white !important;
}

.upload-icon {
    font-size: 4rem;
    color: var(--crimson-primary);
    transition: all 0.4s ease;
}

.upload-specs .badge {
    transition: all 0.3s ease;
}

.upload-specs .badge:hover {
    transform: scale(1.1);
}

/* Image Cards */
.modern-image-card {
    transition: all 0.4s ease;
    border: 2px solid transparent;
}

.modern-image-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: var(--box-shadow-heavy);
    border-color: var(--crimson-light);
}

.image-container {
    overflow: hidden;
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
}

.modern-image-card:hover .image-overlay {
    opacity: 1;
}

.overlay-content {
    transform: scale(0.5);
    transition: all 0.3s ease;
}

.modern-image-card:hover .overlay-content {
    transform: scale(1);
}

/* Buttons */
.modern-btn {
    position: relative;
    overflow: hidden;
    transition: all 0.4s ease;
}

.modern-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.6s ease;
}

.modern-btn:hover::before {
    left: 100%;
}

.btn-content,
.btn-loading {
    transition: all 0.3s ease;
}

.modern-btn.loading .btn-content {
    opacity: 0;
    transform: scale(0.8);
}

.modern-btn.loading .btn-loading {
    opacity: 1;
    transform: scale(1);
}

/* Action Buttons */
.action-buttons .btn {
    transition: all 0.3s ease;
    position: relative;
}

.action-buttons .btn:hover {
    transform: translateY(-3px);
}

.action-buttons .btn:active {
    transform: translateY(0);
}

/* Submit Section */
.submit-section {
    background: linear-gradient(145deg, #f8f9fa 0%, #ffffff 100%);
    border-radius: 20px;
    padding: 30px;
    border: 2px dashed var(--crimson-light);
    margin: 20px 0;
}

.submit-info {
    background: rgba(139, 0, 0, 0.05);
    border-radius: 10px;
    padding: 10px 15px;
    border-left: 4px solid var(--crimson-light);
}

/* Preview Items */
.preview-item {
    position: relative;
    border: 3px solid var(--crimson-light);
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.4s ease;
    background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%);
}

.preview-item:hover {
    border-color: var(--crimson-dark);
    transform: scale(1.05) rotate(1deg);
    box-shadow: var(--box-shadow-heavy);
}

.preview-remove {
    position: absolute;
    top: 10px;
    right: 10px;
    background: var(--crimson-gradient);
    color: white;
    border: none;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 2px 10px rgba(139, 0, 0, 0.3);
}

.preview-remove:hover {
    background: var(--crimson-dark);
    transform: scale(1.2) rotate(90deg);
}

.preview-info {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: var(--crimson-gradient);
    color: white;
    padding: 12px;
    font-size: 0.8rem;
    text-align: center;
    backdrop-filter: blur(10px);
}

.file-name {
    display: block;
    font-weight: 700;
    margin-bottom: 4px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    text-shadow: var(--text-shadow);
}

.file-size {
    display: block;
    opacity: 0.9;
    font-size: 0.7rem;
    font-weight: 500;
}

/* Notifications */
.notification {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 9999;
    max-width: 450px;
    background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%);
    border-radius: 15px;
    box-shadow: var(--box-shadow-heavy);
    border-left: 5px solid var(--crimson-light);
    padding: 20px 25px;
    transform: translateX(100%);
    transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    backdrop-filter: blur(10px);
}

.notification.show {
    transform: translateX(0);
}

.notification.error {
    border-left-color: #dc3545;
    background: linear-gradient(145deg, #fff5f5 0%, #ffffff 100%);
}

.notification .close-btn {
    background: none;
    border: none;
    float: right;
    font-size: 24px;
    cursor: pointer;
    opacity: 0.6;
    transition: all 0.3s ease;
    color: var(--crimson-primary);
}

.notification .close-btn:hover {
    opacity: 1;
    transform: scale(1.1) rotate(90deg);
}

/* Delete Modal */
.delete-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(139, 0, 0, 0.4);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10000;
    backdrop-filter: blur(5px);
}

.delete-modal-content {
    background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%);
    padding: 40px;
    border-radius: 20px;
    text-align: center;
    max-width: 450px;
    width: 90%;
    box-shadow: var(--box-shadow-heavy);
    border: 2px solid var(--crimson-light);
    animation: modalSlideIn 0.3s ease;
}

@keyframes modalSlideIn {
    from {
        transform: scale(0.5) rotate(10deg);
        opacity: 0;
    }
    to {
        transform: scale(1) rotate(0deg);
        opacity: 1;
    }
}

.delete-modal h4 {
    color: var(--crimson-primary);
    margin-bottom: 20px;
    text-shadow: var(--text-shadow);
}

.delete-modal-buttons {
    display: flex;
    gap: 15px;
    justify-content: center;
    margin-top: 25px;
}

.delete-modal-buttons .btn {
    min-width: 120px;
    border-radius: 25px;
    font-weight: 600;
}

/* Auto-generated slug styling */
.slug-auto {
    font-style: italic;
    color: var(--crimson-secondary);
    background: rgba(139, 0, 0, 0.05);
}

/* Loading States */
.loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(139, 0, 0, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9998;
    backdrop-filter: blur(3px);
}

.loading-spinner {
    width: 60px;
    height: 60px;
    border: 4px solid rgba(139, 0, 0, 0.3);
    border-top: 4px solid var(--crimson-primary);
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Responsive Design */
@media (max-width: 768px) {
    .action-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .action-buttons .btn {
        width: 100%;
        max-width: 300px;
        margin-bottom: 10px;
    }
    
    .card-body {
        padding: 1.5rem !important;
    }
    
    .icon-wrapper {
        width: 50px;
        height: 50px;
    }
    
    .upload-icon {
        font-size: 3rem;
    }
    
    .modern-upload-area {
        padding: 2rem !important;
    }
    
    .submit-section {
        padding: 20px;
        margin: 15px 0;
    }
}

/* Hover Effects Enhancement */
.btn:hover {
    transition: all 0.3s ease;
}

.btn-outline-warning:hover,
.btn-outline-danger:hover {
    transform: scale(1.1);
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}

/* Form Validation States */
.is-invalid {
    border-color: var(--crimson-primary) !important;
    box-shadow: 0 0 0 0.25rem rgba(139, 0, 0, 0.25) !important;
}

.is-valid {
    border-color: #28a745 !important;
    box-shadow: 0 0 0 0.25rem rgba(40, 167, 69, 0.25) !important;
}

/* Progress Bar for Upload */
.upload-progress {
    position: absolute;
    bottom: 0;
    left: 0;
    height: 4px;
    background: var(--crimson-gradient);
    transition: width 0.3s ease;
    border-radius: 0 0 15px 15px;
}

/* Badge Enhancements */
.badge {
    font-weight: 600;
    letter-spacing: 0.5px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
}

/* Card Header Icons */
.card-header i {
    text-shadow: 0 1px 3px rgba(0,0,0,0.3);
}

/* Smooth Page Transitions */
.container-fluid {
    animation: fadeInUp 0.6s ease;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('galleryUpdateForm');
    const updateBtn = document.getElementById('updateBtn');
    const btnText = document.getElementById('btnText');
    const btnSpinner = document.getElementById('btnSpinner');
    const imageInput = document.getElementById('new_images');
    const imagePreview = document.getElementById('imagePreview');
    const uploadArea = document.getElementById('uploadArea');
    const titleInput = document.getElementById('title');
    const slugInput = document.getElementById('slug');
    
    let selectedFiles = [];
    let autoSlug = true;

    // Auto-generate slug from title
    if (titleInput && slugInput) {
        titleInput.addEventListener('input', function() {
            if (autoSlug) {
                const slug = generateSlug(this.value);
                slugInput.value = slug;
                slugInput.classList.add('slug-auto');
            }
        });

        slugInput.addEventListener('input', function() {
            if (this.value.trim() !== '') {
                autoSlug = false;
                this.classList.remove('slug-auto');
            } else {
                autoSlug = true;
                this.classList.add('slug-auto');
            }
        });
    }

    // File upload handling
    if (imageInput && imagePreview && uploadArea) {
        // Remove existing click handler to prevent conflicts
        uploadArea.removeAttribute('onclick');
        
        imageInput.addEventListener('change', function(e) {
            handleFiles(e.target.files);
        });

        uploadArea.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            imageInput.click();
        });

        // Drag and drop
        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            e.stopPropagation();
            this.style.borderColor = '#667eea';
            this.style.background = '#f0f4ff';
        });

        uploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            e.stopPropagation();
            this.style.borderColor = '#dee2e6';
            this.style.background = '#f8f9fa';
        });

        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            e.stopPropagation();
            this.style.borderColor = '#dee2e6';
            this.style.background = '#f8f9fa';
            handleFiles(e.dataTransfer.files);
        });
    }

    // Form submission with modern loading
    if (form && updateBtn) {
        form.addEventListener('submit', function(e) {
            // Show loading overlay
            showLoadingOverlay();
            
            // Update button state
            updateBtn.disabled = true;
            updateBtn.classList.add('loading');
            
            const btnContent = updateBtn.querySelector('.btn-content');
            const btnLoading = updateBtn.querySelector('.btn-loading');
            
            if (btnContent && btnLoading) {
                btnContent.classList.add('d-none');
                btnLoading.classList.remove('d-none');
            }
            
            // Show processing notification
            showNotification('Sedang memproses update gallery...', 'info', 0);
        });
    }

    // Delete image buttons
    document.addEventListener('click', function(e) {
        if (e.target.closest('.delete-btn')) {
            e.preventDefault();
            const btn = e.target.closest('.delete-btn');
            const imageId = btn.getAttribute('data-image-id');
            showDeleteConfirmation(imageId);
        }
    });

    // Primary image buttons  
    document.addEventListener('click', function(e) {
        if (e.target.closest('.primary-btn')) {
            e.preventDefault();
            const btn = e.target.closest('.primary-btn');
            const imageId = btn.getAttribute('data-image-id');
            setPrimaryImage(imageId, btn);
        }
    });

    function handleFiles(files) {
        if (!files || files.length === 0) {
            return;
        }
        
        imagePreview.innerHTML = '';
        selectedFiles = [];

        const maxFiles = 10;
        const maxSize = 2 * 1024 * 1024; // 2MB
        const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];

        if (files.length > maxFiles) {
            showNotification(`Maksimal ${maxFiles} gambar dapat diupload sekaligus`, 'error');
            return;
        }

        let validFiles = 0;
        
        Array.from(files).forEach((file, index) => {
            // Validate file type
            if (!allowedTypes.includes(file.type.toLowerCase())) {
                showNotification(`File ${file.name} bukan format gambar yang didukung`, 'error');
                return;
            }
            
            // Validate file size
            if (file.size > maxSize) {
                showNotification(`File ${file.name} terlalu besar. Maksimal 2MB per file`, 'error');
                return;
            }

            selectedFiles.push(file);
            validFiles++;

            const reader = new FileReader();
            reader.onload = function(e) {
                const previewDiv = document.createElement('div');
                previewDiv.className = 'col-md-3 col-sm-6';
                previewDiv.innerHTML = `
                    <div class="preview-item">
                        <img src="${e.target.result}" alt="Preview" class="w-100" style="height: 180px; object-fit: cover;">
                        <button type="button" class="preview-remove" onclick="removePreviewFile(${selectedFiles.length - 1})">
                            <i class="fas fa-times"></i>
                        </button>
                        <div class="preview-info">
                            <span class="file-name">${file.name}</span>
                            <span class="file-size">${formatFileSize(file.size)}</span>
                        </div>
                        <div class="upload-progress" style="width: 0%"></div>
                    </div>
                `;
                imagePreview.appendChild(previewDiv);
                
                // Animate progress bar
                const progressBar = previewDiv.querySelector('.upload-progress');
                setTimeout(() => {
                    progressBar.style.width = '100%';
                }, 100);
            };
            reader.readAsDataURL(file);
        });

        updateFileInput();
        
        if (validFiles > 0) {
            showNotification(`${validFiles} gambar siap diupload`, 'success');
            
            // Add upload progress animation
            const uploadArea = document.getElementById('uploadArea');
            uploadArea.style.borderColor = '#28a745';
            uploadArea.style.background = 'linear-gradient(145deg, #d4edda 0%, #ffffff 100%)';
            
            setTimeout(() => {
                uploadArea.style.borderColor = 'var(--crimson-light)';
                uploadArea.style.background = 'linear-gradient(145deg, #fafafa 0%, #ffffff 100%)';
            }, 2000);
        }
    }

    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    function updateFileInput() {
        const dt = new DataTransfer();
        selectedFiles.forEach(file => dt.items.add(file));
        imageInput.files = dt.files;
    }

    window.removePreviewFile = function(index) {
        selectedFiles.splice(index, 1);
        updateFileInput();
        
        const previewItems = imagePreview.children;
        if (previewItems[index]) {
            previewItems[index].remove();
        }
        
        // Update indices for remaining items
        Array.from(previewItems).forEach((item, newIndex) => {
            const removeBtn = item.querySelector('.preview-remove');
            if (removeBtn) {
                removeBtn.setAttribute('onclick', `removePreviewFile(${newIndex})`);
            }
        });
    };

    // Dynamic alert creation for better UX
    function createDynamicAlert(message, type = 'success', title = null) {
        const alertContainer = document.getElementById('alertContainer');
        const alertId = 'alert-' + Date.now();
        
        const alertDiv = document.createElement('div');
        alertDiv.id = alertId;
        alertDiv.className = `alert alert-${type === 'error' ? 'danger' : type} border-0 rounded-4 shadow-lg mb-4 modern-alert`;
        alertDiv.setAttribute('role', 'alert');
        
        const icons = {
            success: { icon: 'check-circle', title: 'Berhasil!' },
            error: { icon: 'exclamation-circle', title: 'Gagal!' },
            warning: { icon: 'exclamation-triangle', title: 'Peringatan!' },
            info: { icon: 'info-circle', title: 'Informasi' }
        };
        
        const alertInfo = icons[type] || icons.success;
        const alertTitle = title || alertInfo.title;
        
        alertDiv.innerHTML = `
            <div class="d-flex align-items-center">
                <div class="alert-icon me-3">
                    <i class="fas fa-${alertInfo.icon} fs-4 text-${type === 'error' ? 'danger' : type}"></i>
                </div>
                <div class="flex-grow-1">
                    <h5 class="alert-heading mb-1 fw-bold">
                        <i class="fas fa-${alertInfo.icon === 'check-circle' ? 'thumbs-up' : alertInfo.icon === 'exclamation-circle' ? 'times-circle' : alertInfo.icon} me-1"></i>
                        ${alertTitle}
                    </h5>
                    <p class="mb-0">${message}</p>
                </div>
                <button type="button" class="btn-close" onclick="removeAlert('${alertId}')"></button>
            </div>
        `;
        
        alertContainer.appendChild(alertDiv);
        
        // Auto remove after 7 seconds
        setTimeout(() => {
            removeAlert(alertId);
        }, 7000);
        
        return alertDiv;
    }
    
    function removeAlert(alertId) {
        const alert = document.getElementById(alertId);
        if (alert) {
            alert.style.opacity = '0';
            alert.style.transform = 'translateX(100%)';
            setTimeout(() => {
                if (alert.parentElement) {
                    alert.remove();
                }
            }, 300);
        }
    }
    
    // Make functions globally available
    window.removeAlert = removeAlert;
    window.createDynamicAlert = createDynamicAlert;

    function showDeleteConfirmation(imageId) {
        const modal = document.createElement('div');
        modal.className = 'delete-modal';
        modal.innerHTML = `
            <div class="delete-modal-content">
                <div class="text-center mb-4">
                    <div class="icon-wrapper mx-auto mb-3" style="width: 80px; height: 80px; background: var(--crimson-gradient);">
                        <i class="fas fa-exclamation-triangle text-white" style="font-size: 2.5rem;"></i>
                    </div>
                    <h3 class="fw-bold text-crimson mb-3">Konfirmasi Hapus</h3>
                    <p class="fs-5 text-dark mb-2">Apakah Anda yakin ingin menghapus gambar ini?</p>
                    <p class="text-muted">
                        <i class="fas fa-info-circle me-1"></i>
                        Tindakan ini tidak dapat dibatalkan
                    </p>
                </div>
                <div class="delete-modal-buttons">
                    <button class="btn btn-secondary btn-lg" onclick="closeDeleteModal()">
                        <i class="fas fa-times me-2"></i>Batal
                    </button>
                    <button class="btn btn-danger btn-lg" onclick="confirmDelete(${imageId})">
                        <i class="fas fa-trash-alt me-2"></i>Hapus
                    </button>
                </div>
            </div>
        `;
        document.body.appendChild(modal);

        // Add click outside to close
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeDeleteModal();
            }
        });

        window.closeDeleteModal = function() {
            modal.style.opacity = '0';
            setTimeout(() => modal.remove(), 300);
        };

        window.confirmDelete = function(id) {
            deleteImage(id);
            closeDeleteModal();
        };
    }

    function deleteImage(imageId) {
        const imageItem = document.getElementById(`image-${imageId}`);
        if (imageItem) {
            // Show loading state
            imageItem.style.opacity = '0.5';
            imageItem.style.filter = 'grayscale(100%)';
            
            const loadingOverlay = document.createElement('div');
            loadingOverlay.className = 'position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center';
            loadingOverlay.style.background = 'rgba(139, 0, 0, 0.8)';
            loadingOverlay.innerHTML = `
                <div class="text-center text-white">
                    <div class="spinner-border mb-2" role="status"></div>
                    <div class="fw-bold">Menghapus...</div>
                </div>
            `;
            imageItem.style.position = 'relative';
            imageItem.appendChild(loadingOverlay);
            
            fetch(`/admin/gallery/images/${imageId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Success animation
                    imageItem.style.transform = 'scale(0) rotate(180deg)';
                    imageItem.style.opacity = '0';
                    setTimeout(() => {
                        imageItem.remove();
                        showNotification('Gambar berhasil dihapus', 'success');
                    }, 400);
                } else {
                    // Reset on error
                    imageItem.style.opacity = '1';
                    imageItem.style.filter = 'none';
                    loadingOverlay.remove();
                    showNotification(data.message || 'Gagal menghapus gambar', 'error');
                }
            })
            .catch(error => {
                // Reset on error
                imageItem.style.opacity = '1';
                imageItem.style.filter = 'none';
                loadingOverlay.remove();
                showNotification('Terjadi kesalahan saat menghapus gambar', 'error');
            });
        }
    }

    function setPrimaryImage(imageId, btn) {
        // Show loading state
        btn.disabled = true;
        btn.innerHTML = '<div class="spinner-border spinner-border-sm" role="status"></div>';
        btn.style.background = 'var(--crimson-gradient)';
        btn.style.color = 'white';
        
        // Add loading overlay to the image
        const imageCard = btn.closest('.modern-image-card');
        const loadingOverlay = document.createElement('div');
        loadingOverlay.className = 'position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center';
        loadingOverlay.style.background = 'rgba(255, 193, 7, 0.8)';
        loadingOverlay.innerHTML = `
            <div class="text-center text-white">
                <i class="fas fa-crown fs-1 mb-2"></i>
                <div class="fw-bold">Setting Primary...</div>
            </div>
        `;
        imageCard.style.position = 'relative';
        imageCard.appendChild(loadingOverlay);

        fetch(`/admin/gallery/images/${imageId}/primary`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification('Gambar primary berhasil diubah', 'success');
                
                // Success animation
                loadingOverlay.innerHTML = `
                    <div class="text-center text-white">
                        <i class="fas fa-check-circle fs-1 mb-2 text-success"></i>
                        <div class="fw-bold">Primary Set!</div>
                    </div>
                `;
                
                setTimeout(() => {
                    location.reload();
                }, 1500);
            } else {
                // Reset on error
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-crown"></i>';
                btn.style.background = '';
                btn.style.color = '';
                loadingOverlay.remove();
                showNotification(data.message || 'Gagal mengubah gambar primary', 'error');
            }
        })
        .catch(error => {
            // Reset on error
            btn.disabled = false;
            btn.innerHTML = '<i class="fas fa-crown"></i>';
            btn.style.background = '';
            btn.style.color = '';
            loadingOverlay.remove();
            showNotification('Terjadi kesalahan saat mengubah gambar primary', 'error');
        });
    }

    function generateSlug(text) {
        return text
            .toLowerCase()
            .replace(/[^a-z0-9 -]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim('-');
    }

    function showNotification(message, type = 'success', autoHide = 5000) {
        // Remove existing notifications
        const existingNotifications = document.querySelectorAll('.notification');
        existingNotifications.forEach(notif => notif.remove());
        
        const notification = document.createElement('div');
        const icons = {
            success: 'check-circle',
            error: 'exclamation-circle',
            info: 'info-circle',
            warning: 'exclamation-triangle'
        };
        
        notification.className = `notification ${type === 'error' ? 'error' : ''} show`;
        notification.innerHTML = `
            <div class="d-flex align-items-center">
                <div class="alert-icon me-3">
                    <i class="fas fa-${icons[type] || icons.success} fs-4 text-${type === 'error' ? 'danger' : type === 'warning' ? 'warning' : type === 'info' ? 'info' : 'success'}"></i>
                </div>
                <div class="flex-grow-1">
                    <div class="fw-bold mb-1">${type.charAt(0).toUpperCase() + type.slice(1)}</div>
                    <div>${message}</div>
                </div>
                <button class="close-btn" onclick="this.parentElement.parentElement.remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
        document.body.appendChild(notification);

        if (autoHide > 0) {
            setTimeout(() => {
                if (notification.parentElement) {
                    notification.classList.remove('show');
                    setTimeout(() => notification.remove(), 300);
                }
            }, autoHide);
        }
    }

    function showLoadingOverlay() {
        const overlay = document.createElement('div');
        overlay.className = 'loading-overlay';
        overlay.innerHTML = `
            <div class="text-center">
                <div class="loading-spinner mb-3"></div>
                <div class="text-white fw-bold fs-5">Sedang memproses...</div>
                <div class="text-white-50">Mohon tunggu sebentar</div>
            </div>
        `;
        document.body.appendChild(overlay);
        return overlay;
    }

    function hideLoadingOverlay() {
        const overlay = document.querySelector('.loading-overlay');
        if (overlay) {
            overlay.remove();
        }
    }
});
</script>
@endpush
@endsection
