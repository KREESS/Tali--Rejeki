@extends('admin.components.layout')

@section('title', 'Tulis Artikel Baru')

@push('styles')
<style>
.premium-card {
    background: linear-gradient(145deg, #ffffff, #fafbfc);
    border: none;
    border-radius: 24px;
    box-shadow: 
        0 20px 60px rgba(139, 0, 0, 0.08),
        0 8px 25px rgba(0, 0, 0, 0.04),
        inset 0 1px 0 rgba(255, 255, 255, 0.6);
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    margin-bottom: 32px;
    z-index: 1;
    position: relative;
    overflow: hidden;
}

.premium-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #8b0000, #ff6b6b, #8b0000);
    opacity: 0;
    transition: opacity 0.4s ease;
}

.premium-card:hover {
    transform: translateY(-8px) scale(1.01);
    box-shadow: 
        0 32px 80px rgba(139, 0, 0, 0.15),
        0 16px 40px rgba(0, 0, 0, 0.08),
        inset 0 1px 0 rgba(255, 255, 255, 0.8);
}

.premium-card:hover::before {
    opacity: 1;
}

.premium-btn {
    background: linear-gradient(135deg, #8b0000, #a50000, #c21807);
    border: none;
    color: white;
    padding: 12px 24px;
    border-radius: 18px;
    font-weight: 600;
    font-size: 0.85rem;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    position: relative;
    overflow: hidden;
    box-shadow: 
        0 8px 24px rgba(139, 0, 0, 0.25),
        0 4px 12px rgba(0, 0, 0, 0.1);
    letter-spacing: 0.3px;
    text-transform: uppercase;
}

.premium-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
    transition: left 0.8s ease;
}

.premium-btn:hover {
    background: linear-gradient(135deg, #a50000, #c21807, #e74c3c);
    transform: translateY(-3px) scale(1.02);
    box-shadow: 
        0 16px 40px rgba(139, 0, 0, 0.35),
        0 8px 20px rgba(0, 0, 0, 0.15);
    color: white;
}

.premium-btn:hover::before {
    left: 100%;
}

.premium-btn:active {
    transform: translateY(-1px) scale(0.98);
}

.premium-btn-outline {
    background: linear-gradient(145deg, #ffffff, #f8f9fa);
    border: 2px solid #8b0000;
    color: #8b0000;
    font-weight: 600;
    box-shadow: 
        0 8px 24px rgba(139, 0, 0, 0.12),
        inset 0 1px 0 rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    position: relative;
    overflow: hidden;
}

.premium-btn-outline::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(139, 0, 0, 0.05), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.premium-btn-outline:hover {
    background: linear-gradient(145deg, #fff5f5, #fef8f8);
    border-color: #a50000;
    color: #a50000;
    transform: translateY(-3px) scale(1.02);
    box-shadow: 
        0 16px 40px rgba(139, 0, 0, 0.2),
        inset 0 1px 0 rgba(255, 255, 255, 0.9);
}

.premium-btn-outline:hover::after {
    opacity: 1;
}

.page-header {
    background: linear-gradient(135deg, #8b0000, #a50000, #c21807, #e74c3c);
    color: white;
    padding: 32px;
    border-radius: 28px;
    margin-bottom: 40px;
    position: relative;
    overflow: hidden;
    box-shadow: 
        0 20px 60px rgba(139, 0, 0, 0.25),
        0 8px 25px rgba(0, 0, 0, 0.1);
    z-index: 1;
}

.page-header::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.15) 0%, transparent 70%);
    animation: shimmerRotate 8s infinite linear;
}

.page-header::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.08) 0%, transparent 50%);
    pointer-events: none;
}

@keyframes shimmerRotate {
    0% { transform: rotate(0deg) scale(1); }
    50% { transform: rotate(180deg) scale(1.1); }
    100% { transform: rotate(360deg) scale(1); }
}

.form-label.required::after {
    content: '*';
    color: #e74c3c;
    margin-left: 4px;
    font-weight: bold;
}

.form-control {
    border: 2px solid #f1f3f4;
    border-radius: 16px;
    padding: 12px 16px;
    font-size: 0.9rem;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    background: linear-gradient(145deg, #ffffff, #fafbfc);
    box-shadow: 
        inset 0 2px 4px rgba(0, 0, 0, 0.04),
        0 2px 8px rgba(0, 0, 0, 0.02);
    font-weight: 500;
}

.form-control:focus {
    border-color: #8b0000;
    box-shadow: 
        0 0 0 4px rgba(139, 0, 0, 0.12),
        0 8px 24px rgba(139, 0, 0, 0.15),
        inset 0 2px 4px rgba(139, 0, 0, 0.05);
    background: #fff;
    transform: translateY(-2px) scale(1.01);
}

.form-control:hover:not(:focus) {
    border-color: #e1e5e9;
    box-shadow: 
        inset 0 2px 4px rgba(0, 0, 0, 0.06),
        0 4px 12px rgba(0, 0, 0, 0.08);
    transform: translateY(-1px);
}

.form-select {
    border: 2px solid #f1f3f4;
    border-radius: 16px;
    padding: 12px 16px;
    font-size: 0.9rem;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    background: linear-gradient(145deg, #ffffff, #fafbfc);
    box-shadow: 
        inset 0 2px 4px rgba(0, 0, 0, 0.04),
        0 2px 8px rgba(0, 0, 0, 0.02);
    font-weight: 500;
    cursor: pointer;
}

.form-select:focus {
    border-color: #8b0000;
    box-shadow: 
        0 0 0 4px rgba(139, 0, 0, 0.12),
        0 8px 24px rgba(139, 0, 0, 0.15),
        inset 0 2px 4px rgba(139, 0, 0, 0.05);
    transform: translateY(-2px) scale(1.01);
}

.form-select:hover:not(:focus) {
    border-color: #e1e5e9;
    box-shadow: 
        inset 0 2px 4px rgba(0, 0, 0, 0.06),
        0 4px 12px rgba(0, 0, 0, 0.08);
    transform: translateY(-1px);
}

.image-upload-area {
    border: 3px dashed #e1e5e9;
    border-radius: 24px;
    padding: 32px;
    text-align: center;
    cursor: pointer;
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    background: linear-gradient(145deg, #fafbfc, #ffffff);
    overflow: hidden;
    box-shadow: inset 0 2px 8px rgba(0, 0, 0, 0.03);
}

.image-upload-area::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at center, rgba(139, 0, 0, 0.03) 0%, transparent 60%);
    opacity: 0;
    transition: opacity 0.4s ease;
}

.image-upload-area:hover {
    border-color: #8b0000;
    background: linear-gradient(145deg, #fff8f8, #fffefe);
    transform: translateY(-4px) scale(1.02);
    box-shadow: 
        0 16px 40px rgba(139, 0, 0, 0.12),
        inset 0 2px 8px rgba(139, 0, 0, 0.05);
}

.image-upload-area:hover::before {
    opacity: 1;
}

.upload-placeholder i {
    font-size: 3rem;
    color: #8b0000;
    margin-bottom: 16px;
    transition: all 0.5s ease;
    background: linear-gradient(135deg, #8b0000, #c21807, #e74c3c);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    filter: drop-shadow(0 4px 8px rgba(139, 0, 0, 0.2));
}

.image-upload-area:hover .upload-placeholder i {
    transform: scale(1.15) rotateY(15deg);
    animation: floatGlow 1s ease-in-out;
}

@keyframes floatGlow {
    0%, 100% { 
        transform: scale(1.15) rotateY(15deg) translateY(0);
        filter: drop-shadow(0 4px 8px rgba(139, 0, 0, 0.2));
    }
    50% { 
        transform: scale(1.2) rotateY(-5deg) translateY(-8px);
        filter: drop-shadow(0 8px 16px rgba(139, 0, 0, 0.4));
    }
}

.upload-placeholder p {
    margin: 0 0 10px 0;
    font-weight: 600;
    color: #2d3748;
    font-size: 1rem;
    letter-spacing: 0.3px;
}

.upload-placeholder small {
    color: #718096;
    font-size: 0.85rem;
    line-height: 1.6;
    font-weight: 500;
}

.image-preview {
    position: relative;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 
        0 20px 60px rgba(0, 0, 0, 0.15),
        0 8px 25px rgba(0, 0, 0, 0.1);
    transition: all 0.4s ease;
}

.image-preview img {
    width: 100%;
    height: 280px;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.image-preview:hover {
    transform: scale(1.02);
    box-shadow: 
        0 32px 80px rgba(0, 0, 0, 0.2),
        0 16px 40px rgba(0, 0, 0, 0.15);
}

.image-preview:hover img {
    transform: scale(1.1);
}

.remove-image {
    position: absolute;
    top: 16px;
    right: 16px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, rgba(220, 53, 69, 0.95), rgba(239, 68, 68, 0.95));
    border: 3px solid white;
    color: white;
    font-size: 1.1rem;
    transition: all 0.4s ease;
    backdrop-filter: blur(10px);
    box-shadow: 
        0 8px 24px rgba(220, 53, 69, 0.3),
        0 4px 12px rgba(0, 0, 0, 0.2);
}

.remove-image:hover {
    background: linear-gradient(135deg, #dc3545, #e74c3c);
    transform: scale(1.15) rotate(90deg);
    box-shadow: 
        0 12px 32px rgba(220, 53, 69, 0.4),
        0 6px 16px rgba(0, 0, 0, 0.3);
}

.section-title {
    color: #8b0000;
    font-weight: 600;
    font-size: 1rem;
    margin-bottom: 12px;
    padding-bottom: 6px;
    border-bottom: 2px solid rgba(139, 0, 0, 0.1);
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
    background: linear-gradient(145deg, #fafbfc, #ffffff);
    border-bottom: 1px solid rgba(139, 0, 0, 0.08);
    border-radius: 24px 24px 0 0 !important;
    padding: 24px 28px;
    position: relative;
    overflow: hidden;
}

.card-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, rgba(139, 0, 0, 0.1), transparent);
}

.card-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 28px;
    right: 28px;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(139, 0, 0, 0.15), transparent);
}

.card-title {
    color: #2d3748;
    font-weight: 700;
    font-size: 1.15rem;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 12px;
    letter-spacing: 0.3px;
    text-transform: uppercase;
}

.card-title i {
    color: #8b0000;
    font-size: 1.3rem;
    background: linear-gradient(135deg, #8b0000, #c21807, #e74c3c);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    filter: drop-shadow(0 2px 4px rgba(139, 0, 0, 0.2));
}

.card-body {
    padding: 28px;
    background: linear-gradient(145deg, #ffffff, #fafbfc);
}

#content {
    min-height: 280px;
    font-family: 'Inter', 'Arial', sans-serif;
    line-height: 1.7;
    border-radius: 16px;
    resize: vertical;
    font-size: 0.9rem;
    font-weight: 500;
}

.character-counter {
    font-size: 0.8rem;
    font-weight: 500;
    color: #718096;
    text-align: right;
    margin-top: 6px;
    transition: all 0.3s ease;
    padding: 4px 8px;
    border-radius: 8px;
    background: rgba(113, 128, 150, 0.05);
}

.character-counter.warning {
    color: #ed8936;
    background: rgba(237, 137, 54, 0.1);
    animation: warningPulse 2s infinite;
}

.character-counter.danger {
    color: #e53e3e;
    background: rgba(229, 62, 62, 0.1);
    animation: dangerShake 0.8s ease-in-out;
}

@keyframes warningPulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.7; }
}

@keyframes dangerShake {
    0%, 100% { transform: translateX(0); }
    10%, 30%, 50%, 70%, 90% { transform: translateX(-4px); }
    20%, 40%, 60%, 80% { transform: translateX(4px); }
}

.form-actions {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.breadcrumb-custom {
    background: linear-gradient(145deg, rgba(255, 255, 255, 0.9), rgba(248, 249, 250, 0.9));
    border-radius: 20px;
    padding: 12px 20px;
    margin-bottom: 20px;
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 
        0 8px 24px rgba(0, 0, 0, 0.05),
        inset 0 1px 0 rgba(255, 255, 255, 0.6);
}

.breadcrumb {
    margin: 0;
    background: transparent;
}

.breadcrumb-item {
    font-size: 0.9rem;
    font-weight: 500;
    letter-spacing: 0.2px;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: '→';
    color: #8b0000;
    font-weight: bold;
    font-size: 1rem;
    margin: 0 10px;
    filter: drop-shadow(0 1px 2px rgba(139, 0, 0, 0.2));
}

.breadcrumb-item a {
    color: #8b0000;
    text-decoration: none;
    transition: all 0.3s ease;
    position: relative;
    padding: 4px 8px;
    border-radius: 8px;
}

.breadcrumb-item a::before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    width: 0;
    height: 2px;
    background: linear-gradient(90deg, #8b0000, #e74c3c);
    transition: all 0.3s ease;
    transform: translateX(-50%);
}

.breadcrumb-item a:hover {
    background: rgba(139, 0, 0, 0.05);
    color: #a50000;
}

.breadcrumb-item a:hover::before {
    width: 100%;
}

.breadcrumb-item.active {
    color: #4a5568;
    font-weight: 600;
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

/* Enhanced form styling */
.form-floating > .form-control {
    height: calc(3.5rem + 2px);
    line-height: 1.25;
}

.form-floating > label {
    padding: 1rem 1rem;
    color: #6c757d;
    font-weight: 500;
}

.invalid-feedback {
    font-size: 0.9rem;
    font-weight: 500;
    margin-top: 8px;
}

.is-invalid {
    border-color: #dc3545 !important;
    animation: shake 0.5s ease-in-out;
}

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    75% { transform: translateX(5px); }
}

/* Loading states */
.btn-loading {
    position: relative;
    color: transparent !important;
}

.btn-loading::after {
    content: '';
    position: absolute;
    width: 20px;
    height: 20px;
    top: 50%;
    left: 50%;
    margin-left: -10px;
    margin-top: -10px;
    border: 2px solid transparent;
    border-top-color: #ffffff;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
@endpush

@section('content')
<!-- Success/Error Alerts -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show custom-alert" role="alert">
        <div class="alert-content">
            <i class="fas fa-check-circle alert-icon"></i>
            <div class="alert-text">
                <strong>Berhasil!</strong> {{ session('success') }}
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show custom-alert" role="alert">
        <div class="alert-content">
            <i class="fas fa-exclamation-circle alert-icon"></i>
            <div class="alert-text">
                <strong>Error!</strong> {{ session('error') }}
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<!-- Breadcrumb -->
<div class="breadcrumb-custom">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.articles.index') }}">Artikel</a>
            </li>
            <li class="breadcrumb-item active">Tulis Artikel Baru</li>
        </ol>
    </nav>
</div>

<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="mb-3" style="font-size: 1.8rem; font-weight: 700; letter-spacing: -0.3px;">
                <i class="fas fa-pen-fancy me-3" style="font-size: 1.5rem; opacity: 0.9;"></i>
                Tulis Artikel Baru
            </h1>
            <p class="mb-0 opacity-90" style="font-size: 1rem; font-weight: 500;">
                Buat artikel atau konten blog yang menarik dan berkualitas tinggi
            </p>
            <div class="mt-3" style="display: flex; gap: 16px; font-size: 0.85rem; opacity: 0.8;">
                <span><i class="fas fa-clock me-2"></i>Estimasi: 5-10 menit</span>
                <span><i class="fas fa-save me-2"></i>Auto-save aktif</span>
            </div>
        </div>
        <div class="d-flex gap-3">
            <button type="button" class="premium-btn premium-btn-outline" onclick="showPreview()">
                <i class="fas fa-eye"></i>
                Preview
            </button>
            <a href="{{ route('admin.articles.index') }}" class="premium-btn premium-btn-outline">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>
    </div>
</div>


        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" id="articleForm">
            @csrf
            
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
                            <div class="form-group mb-4">
                                <label for="title" class="form-label required" style="font-size: 0.9rem; font-weight: 600; color: #2d3748;">Judul Artikel</label>
                                <input type="text" 
                                       class="form-control @error('title') is-invalid @enderror" 
                                       id="title" 
                                       name="title" 
                                       value="{{ old('title') }}"
                                       placeholder="Masukkan judul artikel yang menarik dan SEO friendly"
                                       required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="character-counter">
                                    <span id="title-count">0</span>/100 karakter optimal
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="excerpt" class="form-label required" style="font-size: 0.9rem; font-weight: 600; color: #2d3748;">Ringkasan Artikel</label>
                                <textarea class="form-control @error('excerpt') is-invalid @enderror" 
                                          id="excerpt" 
                                          name="excerpt" 
                                          rows="4"
                                          placeholder="Tulis ringkasan singkat artikel yang menarik pembaca (150-500 karakter)"
                                          required>{{ old('excerpt') }}</textarea>
                                @error('excerpt')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="character-counter">
                                    <span id="excerpt-count">0</span>/500 karakter
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="content" class="form-label required" style="font-size: 0.9rem; font-weight: 600; color: #2d3748;">Konten Artikel</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" 
                                          id="content" 
                                          name="content" 
                                          rows="14"
                                          placeholder="Tulis konten artikel di sini... Gunakan paragraf yang jelas dan informatif."
                                          required>{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="character-counter">
                                    <span id="content-count">0</span> karakter
                                </div>
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
                            <div class="form-group mb-4">
                                <label for="meta_title" class="form-label" style="font-size: 0.9rem; font-weight: 600; color: #2d3748;">Meta Title</label>
                                <input type="text" 
                                       class="form-control @error('meta_title') is-invalid @enderror" 
                                       id="meta_title" 
                                       name="meta_title" 
                                       value="{{ old('meta_title') }}"
                                       placeholder="Judul untuk SEO (akan menggunakan judul artikel jika kosong)">
                                @error('meta_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="character-counter">
                                    <span id="meta-title-count">0</span>/60 karakter optimal
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="meta_description" class="form-label" style="font-size: 0.9rem; font-weight: 600; color: #2d3748;">Meta Description</label>
                                <textarea class="form-control @error('meta_description') is-invalid @enderror" 
                                          id="meta_description" 
                                          name="meta_description" 
                                          rows="3"
                                          placeholder="Deskripsi untuk SEO dan preview di media sosial (akan menggunakan ringkasan jika kosong)">{{ old('meta_description') }}</textarea>
                                @error('meta_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="character-counter">
                                    <span id="meta-desc-count">0</span>/160 karakter optimal
                                </div>
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
                            <div class="form-group mb-4">
                                <label for="category_id" class="form-label required" style="font-size: 0.9rem; font-weight: 600; color: #2d3748;">Kategori</label>
                                <select class="form-select @error('category_id') is-invalid @enderror" 
                                        id="category_id" 
                                        name="category_id" 
                                        required>
                                    <option value="">🏷️ Pilih Kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" 
                                                {{ old('category_id', request('category')) == $category->id ? 'selected' : '' }}>
                                            📁 {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="status" class="form-label required" style="font-size: 0.9rem; font-weight: 600; color: #2d3748;">Status Publikasi</label>
                                <select class="form-select @error('status') is-invalid @enderror" 
                                        id="status" 
                                        name="status" 
                                        required>
                                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>
                                        📝 Draft (Belum Dipublikasi)
                                    </option>
                                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>
                                        🌐 Publish Sekarang
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4" id="publish-date-group" style="display: none;">
                                <label for="published_at" class="form-label" style="font-size: 0.9rem; font-weight: 600; color: #2d3748;">📅 Tanggal Publish</label>
                                <input type="datetime-local" 
                                       class="form-control @error('published_at') is-invalid @enderror" 
                                       id="published_at" 
                                       name="published_at" 
                                       value="{{ old('published_at') }}">
                                @error('published_at')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted" style="font-size: 0.8rem; font-weight: 500;">
                                    ⏰ Kosongkan untuk publish sekarang
                                </small>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="premium-btn w-100 mb-3" id="submitBtn">
                                    <i class="fas fa-save"></i>
                                    Simpan Artikel
                                </button>
                                <button type="button" class="premium-btn premium-btn-outline w-100 mb-3" onclick="saveDraft()">
                                    <i class="fas fa-file-alt"></i>
                                    Simpan Draft
                                </button>
                                <a href="{{ route('admin.articles.index') }}" class="premium-btn premium-btn-outline w-100">
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
                                <label for="cover_image" class="form-label" style="font-size: 0.9rem; font-weight: 600; color: #2d3748;">🖼️ Upload Gambar Cover</label>
                                <div class="image-upload-area" id="imageUploadArea">
                                    <input type="file" 
                                           class="form-control @error('cover_image') is-invalid @enderror" 
                                           id="cover_image" 
                                           name="cover_image" 
                                           accept="image/*"
                                           style="display: none;">
                                    
                                    <div class="upload-placeholder" id="uploadPlaceholder">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <p>Klik atau drag & drop untuk upload</p>
                                        <small>JPEG, PNG, JPG, GIF<br>📏 Maksimal: 2MB<br>✨ Rekomendasi: 1200x630px</small>
                                    </div>
                                    
                                    <div class="image-preview" id="imagePreview" style="display: none;">
                                        <img id="previewImg" src="" alt="Preview">
                                        <button type="button" class="remove-image" id="removeImage">
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

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Character counters with dynamic styling
    const counters = [
        { element: 'title', counter: 'title-count', max: 100, optimal: 60 },
        { element: 'excerpt', counter: 'excerpt-count', max: 500, optimal: 150 },
        { element: 'content', counter: 'content-count', max: null, optimal: null },
        { element: 'meta_title', counter: 'meta-title-count', max: 60, optimal: 50 },
        { element: 'meta_description', counter: 'meta-desc-count', max: 160, optimal: 120 }
    ];
    
    counters.forEach(item => {
        const element = document.getElementById(item.element);
        const counter = document.getElementById(item.counter);
        
        if (element && counter) {
            function updateCounter() {
                const count = element.value.length;
                counter.textContent = count;
                
                const counterElement = counter.parentElement;
                counterElement.classList.remove('warning', 'danger');
                
                if (item.max) {
                    if (count > item.max) {
                        counterElement.classList.add('danger');
                    } else if (item.optimal && count > item.optimal) {
                        counterElement.classList.add('warning');
                    }
                }
            }
            
            element.addEventListener('input', updateCounter);
            updateCounter(); // Initial count
        }
    });
    
    // Status change handler with animation
    const statusSelect = document.getElementById('status');
    const publishDateGroup = document.getElementById('publish-date-group');
    
    statusSelect.addEventListener('change', function() {
        if (this.value === 'published') {
            publishDateGroup.style.display = 'block';
            publishDateGroup.style.animation = 'slideDown 0.3s ease-out';
        } else {
            publishDateGroup.style.animation = 'slideUp 0.3s ease-out';
            setTimeout(() => {
                publishDateGroup.style.display = 'none';
            }, 300);
        }
    });
    
    // Trigger on load
    statusSelect.dispatchEvent(new Event('change'));
    
    // Enhanced image upload handling
    const imageUploadArea = document.getElementById('imageUploadArea');
    const fileInput = document.getElementById('cover_image');
    const uploadPlaceholder = document.getElementById('uploadPlaceholder');
    const imagePreview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');
    const removeImageBtn = document.getElementById('removeImage');
    
    imageUploadArea.addEventListener('click', function() {
        fileInput.click();
    });
    
    // Drag and drop functionality
    imageUploadArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        this.style.borderColor = '#8b0000';
        this.style.background = 'linear-gradient(135deg, #fff5f5, #fef8f8)';
    });
    
    imageUploadArea.addEventListener('dragleave', function(e) {
        e.preventDefault();
        this.style.borderColor = '#dee2e6';
        this.style.background = 'linear-gradient(135deg, #f8f9fa, #ffffff)';
    });
    
    imageUploadArea.addEventListener('drop', function(e) {
        e.preventDefault();
        this.style.borderColor = '#dee2e6';
        this.style.background = 'linear-gradient(135deg, #f8f9fa, #ffffff)';
        
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files;
            handleImageUpload(files[0]);
        }
    });
    
    fileInput.addEventListener('change', function() {
        if (this.files[0]) {
            handleImageUpload(this.files[0]);
        }
    });
    
    function handleImageUpload(file) {
        // Validate file type
        if (!file.type.match('image.*')) {
            showModernAlert('warning', 'File Tidak Valid', 'Silakan pilih file gambar (JPEG, PNG, JPG, GIF)', 'fas fa-exclamation-triangle');
            return;
        }
        
        // Validate file size (2MB)
        if (file.size > 2 * 1024 * 1024) {
            showModernAlert('warning', 'File Terlalu Besar', 'Ukuran file maksimal 2MB', 'fas fa-exclamation-triangle');
            return;
        }
        
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            uploadPlaceholder.style.display = 'none';
            imagePreview.style.display = 'block';
            
            // Add animation
            imagePreview.style.opacity = '0';
            imagePreview.style.transform = 'scale(0.8)';
            setTimeout(() => {
                imagePreview.style.opacity = '1';
                imagePreview.style.transform = 'scale(1)';
                imagePreview.style.transition = 'all 0.3s ease';
            }, 10);
        };
        reader.readAsDataURL(file);
    }
    
    removeImageBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        fileInput.value = '';
        
        // Animate out
        imagePreview.style.opacity = '0';
        imagePreview.style.transform = 'scale(0.8)';
        setTimeout(() => {
            uploadPlaceholder.style.display = 'block';
            imagePreview.style.display = 'none';
        }, 300);
    });
    
    // Enhanced form submission with loading
    const form = document.getElementById('articleForm');
    const submitBtn = document.getElementById('submitBtn');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validate form first
        if (!validateForm()) {
            return;
        }
        
        // Show loading state
        submitBtn.classList.add('btn-loading');
        submitBtn.disabled = true;
        
        // Show loading alert
        showModernAlert('loading', 'Menyimpan Artikel...', 'Harap tunggu, artikel sedang diproses dan disimpan.', 'fas fa-spinner fa-spin', 0);
        
        // Add progress simulation
        let progress = 0;
        const progressInterval = setInterval(() => {
            progress += Math.random() * 15;
            if (progress >= 90) {
                clearInterval(progressInterval);
            }
        }, 200);
        
        // Submit form after validation
        setTimeout(() => {
            clearInterval(progressInterval);
            this.submit();
        }, 1500);
    });
    
    function validateForm() {
        const title = document.getElementById('title').value.trim();
        const excerpt = document.getElementById('excerpt').value.trim();
        const content = document.getElementById('content').value.trim();
        const categoryId = document.getElementById('category_id').value;
        
        if (!title) {
            showModernAlert('warning', 'Judul Diperlukan', 'Silakan masukkan judul artikel yang menarik.', 'fas fa-exclamation-triangle');
            document.getElementById('title').focus();
            return false;
        }
        
        if (title.length < 10) {
            showModernAlert('warning', 'Judul Terlalu Pendek', 'Judul artikel minimal 10 karakter.', 'fas fa-exclamation-triangle');
            document.getElementById('title').focus();
            return false;
        }
        
        if (!excerpt) {
            showModernAlert('warning', 'Ringkasan Diperlukan', 'Silakan masukkan ringkasan artikel.', 'fas fa-exclamation-triangle');
            document.getElementById('excerpt').focus();
            return false;
        }
        
        if (excerpt.length < 50) {
            showModernAlert('warning', 'Ringkasan Terlalu Pendek', 'Ringkasan artikel minimal 50 karakter.', 'fas fa-exclamation-triangle');
            document.getElementById('excerpt').focus();
            return false;
        }
        
        if (!content) {
            showModernAlert('warning', 'Konten Diperlukan', 'Silakan masukkan konten artikel.', 'fas fa-exclamation-triangle');
            document.getElementById('content').focus();
            return false;
        }
        
        if (content.length < 100) {
            showModernAlert('warning', 'Konten Terlalu Pendek', 'Konten artikel minimal 100 karakter.', 'fas fa-exclamation-triangle');
            document.getElementById('content').focus();
            return false;
        }
        
        if (!categoryId) {
            showModernAlert('warning', 'Kategori Diperlukan', 'Silakan pilih kategori artikel.', 'fas fa-exclamation-triangle');
            document.getElementById('category_id').focus();
            return false;
        }
        
        return true;
    }
    
    // Add ripple effect to buttons
    document.querySelectorAll('.premium-btn').forEach(button => {
        button.addEventListener('click', function(e) {
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
    
    // Auto-save functionality
    let autoSaveTimer;
    const formElements = form.querySelectorAll('input, textarea, select');
    
    formElements.forEach(element => {
        element.addEventListener('input', function() {
            clearTimeout(autoSaveTimer);
            autoSaveTimer = setTimeout(() => {
                autoSaveDraft();
            }, 30000); // Auto-save every 30 seconds
        });
    });
    
    function autoSaveDraft() {
        const formData = new FormData(form);
        formData.set('status', 'draft');
        
        console.log('Auto-saving draft...');
        // Here you can implement auto-save functionality
    }
});

// Enhanced save draft function with loading
function saveDraft() {
    const form = document.getElementById('articleForm');
    const statusSelect = document.getElementById('status');
    const originalStatus = statusSelect.value;
    
    // Basic validation for draft
    const title = document.getElementById('title').value.trim();
    if (!title) {
        showModernAlert('warning', 'Judul Diperlukan', 'Minimal masukkan judul untuk menyimpan draft.', 'fas fa-exclamation-triangle');
        document.getElementById('title').focus();
        return;
    }
    
    statusSelect.value = 'draft';
    
    // Show loading alert for draft
    showModernAlert('loading', 'Menyimpan Draft...', 'Artikel sedang disimpan sebagai draft untuk nanti diedit.', 'fas fa-spinner fa-spin', 0);
    
    // Add button loading state
    const draftBtn = event.target;
    draftBtn.classList.add('btn-loading');
    draftBtn.disabled = true;
    
    setTimeout(() => {
        form.submit();
    }, 1200);
}

// Enhanced preview function
function showPreview() {
    const title = document.getElementById('title').value;
    const excerpt = document.getElementById('excerpt').value;
    const content = document.getElementById('content').value;
    const coverImage = document.getElementById('previewImg');
    
    if (!title && !excerpt && !content) {
        showModernAlert('warning', 'Tidak Ada Konten', 'Silakan isi beberapa field terlebih dahulu untuk melihat preview.', 'fas fa-exclamation-triangle');
        return;
    }
    
    // Show loading first
    showModernAlert('loading', 'Memuat Preview...', 'Sedang menyiapkan preview artikel untuk Anda.', 'fas fa-spinner fa-spin', 1000);
    
    setTimeout(() => {
        // Create enhanced preview modal
        const previewHtml = `
            <div class="modal fade" id="previewModal" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content" style="border-radius: 15px; border: none; box-shadow: 0 15px 50px rgba(0,0,0,0.2);">
                        <div class="modal-header" style="background: linear-gradient(135deg, #8b0000, #a50000); color: white; border-radius: 15px 15px 0 0; padding: 20px;">
                            <h5 class="modal-title" style="font-weight: 700;">
                                <i class="fas fa-eye me-3"></i>
                                Preview Artikel
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body" style="max-height: 70vh; overflow-y: auto; padding: 30px;">
                            <article style="font-family: 'Inter', sans-serif; line-height: 1.7;">
                                ${coverImage && coverImage.src && !coverImage.src.includes('data:') === false ? `
                                    <div style="text-align: center; margin-bottom: 2rem;">
                                        <img src="${coverImage.src}" alt="Cover" style="max-width: 100%; height: auto; border-radius: 12px; box-shadow: 0 8px 25px rgba(0,0,0,0.15);">
                                    </div>
                                ` : ''}
                                ${title ? `<h1 style="color: #333; font-size: 2.2rem; margin-bottom: 1.5rem; font-weight: 700; line-height: 1.3;">${title}</h1>` : ''}
                                ${excerpt ? `
                                    <div style="
                                        background: linear-gradient(135deg, #f8f9fa, #e9ecef); 
                                        padding: 1.5rem; 
                                        border-left: 5px solid #8b0000; 
                                        margin-bottom: 2rem; 
                                        border-radius: 0 12px 12px 0;
                                        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
                                    ">
                                        <p style="margin: 0; font-size: 1.15rem; color: #495057; font-style: italic; font-weight: 500;">${excerpt}</p>
                                    </div>
                                ` : ''}
                                ${content ? `
                                    <div style="
                                        color: #333; 
                                        font-size: 1.05rem; 
                                        line-height: 1.8;
                                        text-align: justify;
                                    ">${content.replace(/\n/g, '<br><br>')}</div>
                                ` : ''}
                                
                                ${!title && !excerpt && !content ? `
                                    <div style="text-align: center; padding: 3rem; color: #6c757d;">
                                        <i class="fas fa-file-alt" style="font-size: 4rem; margin-bottom: 1rem; opacity: 0.5;"></i>
                                        <h3>Konten Kosong</h3>
                                        <p>Silakan isi form artikel untuk melihat preview</p>
                                    </div>
                                ` : ''}
                            </article>
                        </div>
                        <div class="modal-footer" style="padding: 20px; background: #f8f9fa; border-radius: 0 0 15px 15px;">
                            <button type="button" class="premium-btn premium-btn-outline" data-bs-dismiss="modal">
                                <i class="fas fa-times"></i>
                                Tutup Preview
                            </button>
                            <button type="button" class="premium-btn" onclick="$('#previewModal').modal('hide'); document.getElementById('submitBtn').click();">
                                <i class="fas fa-save"></i>
                                Simpan Artikel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        // Remove existing modal
        const existingModal = document.getElementById('previewModal');
        if (existingModal) {
            existingModal.remove();
        }
        
        // Add new modal
        document.body.insertAdjacentHTML('beforeend', previewHtml);
        
        // Show modal with animation
        const modal = new bootstrap.Modal(document.getElementById('previewModal'));
        modal.show();
        
        removeAlert(); // Remove loading alert
    }, 1000);
}

// Modern Alert System with Enhanced Design
function showModernAlert(type, title, message, icon, duration = 4000) {
    removeAlert();
    
    const alertTypes = {
        'success': {
            bg: 'linear-gradient(135deg, #d1e7dd, #f8fff9)',
            border: '#badbcc',
            color: '#0f5132',
            iconColor: '#198754',
            iconBg: 'rgba(25, 135, 84, 0.1)'
        },
        'danger': {
            bg: 'linear-gradient(135deg, #f8d7da, #fef5f5)',
            border: '#f5c2c7',
            color: '#842029',
            iconColor: '#dc3545',
            iconBg: 'rgba(220, 53, 69, 0.1)'
        },
        'warning': {
            bg: 'linear-gradient(135deg, #fff3cd, #fffef5)',
            border: '#ffecb5',
            color: '#664d03',
            iconColor: '#ffc107',
            iconBg: 'rgba(255, 193, 7, 0.1)'
        },
        'info': {
            bg: 'linear-gradient(135deg, #d1ecf1, #f5feff)',
            border: '#b6d7e2',
            color: '#055160',
            iconColor: '#0dcaf0',
            iconBg: 'rgba(13, 202, 240, 0.1)'
        },
        'loading': {
            bg: 'linear-gradient(135deg, #e3f2fd, #f5faff)',
            border: '#bbdefb',
            color: '#0d47a1',
            iconColor: '#2196f3',
            iconBg: 'rgba(33, 150, 243, 0.1)'
        }
    };
    
    const alertStyle = alertTypes[type] || alertTypes['info'];
    
    const alertHtml = `
        <div class="modern-alert" id="modernAlert" style="
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 10000;
            min-width: 320px;
            max-width: 400px;
            background: ${alertStyle.bg};
            border: 1px solid ${alertStyle.border};
            border-left: 4px solid ${alertStyle.iconColor};
            border-radius: 15px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.12), 0 4px 15px rgba(0,0,0,0.06);
            padding: 18px;
            color: ${alertStyle.color};
            font-family: 'Inter', sans-serif;
            animation: slideInRight 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(15px);
            border-image: linear-gradient(135deg, ${alertStyle.iconColor}, transparent) 1;
        ">
            <div style="display: flex; align-items: flex-start; gap: 14px;">
                <div style="
                    width: 42px;
                    height: 42px;
                    border-radius: 12px;
                    background: ${alertStyle.iconBg};
                    color: ${alertStyle.iconColor};
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 1.1rem;
                    flex-shrink: 0;
                    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
                    border: 1px solid rgba(255,255,255,0.2);
                ">
                    <i class="${icon}"></i>
                </div>
                <div style="flex: 1; padding-top: 2px;">
                    <div style="
                        font-weight: 700; 
                        font-size: 0.95rem; 
                        margin-bottom: 5px;
                        color: ${alertStyle.color};
                    ">${title}</div>
                    <div style="
                        font-size: 0.85rem; 
                        opacity: 0.9; 
                        line-height: 1.4;
                        color: ${alertStyle.color};
                    ">${message}</div>
                </div>
                <button onclick="removeAlert()" style="
                    background: rgba(255,255,255,0.2);
                    border: 1px solid rgba(255,255,255,0.1);
                    color: ${alertStyle.color};
                    font-size: 1rem;
                    cursor: pointer;
                    opacity: 0.7;
                    transition: all 0.3s ease;
                    padding: 6px;
                    border-radius: 8px;
                    width: 30px;
                    height: 30px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-shrink: 0;
                " onmouseover="this.style.opacity='1'; this.style.background='rgba(255,255,255,0.3)'" onmouseout="this.style.opacity='0.7'; this.style.background='rgba(255,255,255,0.2)'">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            ${type === 'loading' ? `
                <div style="
                    margin-top: 12px;
                    height: 3px;
                    background: rgba(33, 150, 243, 0.2);
                    border-radius: 2px;
                    overflow: hidden;
                ">
                    <div style="
                        height: 100%;
                        background: linear-gradient(90deg, ${alertStyle.iconColor}, rgba(33, 150, 243, 0.6));
                        border-radius: 2px;
                        animation: loadingProgress 2s infinite ease-in-out;
                    "></div>
                </div>
            ` : ''}
        </div>
        
        <style>
        @keyframes slideInRight {
            0% {
                transform: translateX(100%) scale(0.9);
                opacity: 0;
            }
            100% {
                transform: translateX(0) scale(1);
                opacity: 1;
            }
        }
        
        @keyframes slideOutRight {
            0% {
                transform: translateX(0) scale(1);
                opacity: 1;
            }
            100% {
                transform: translateX(100%) scale(0.9);
                opacity: 0;
            }
        }
        
        @keyframes loadingProgress {
            0% { width: 0%; }
            50% { width: 100%; }
            100% { width: 0%; }
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.6; }
        }
        
        .modern-alert .fa-spin {
            animation: pulse 1.5s infinite ease-in-out;
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
</script>

<style>
/* Custom Alert Styles - Compact & Modern */
.custom-alert {
    border: none;
    border-radius: 12px;
    padding: 16px 20px;
    margin-bottom: 20px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    border-left: 4px solid;
    animation: slideInDown 0.4s ease-out;
    font-size: 0.9rem;
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
    gap: 12px;
}

.alert-icon {
    font-size: 1.3rem;
    margin-top: 1px;
    opacity: 0.9;
}

.alert-text strong {
    font-weight: 700;
    margin-right: 6px;
    font-size: 0.9rem;
}

.alert-text {
    font-size: 0.85rem;
    line-height: 1.4;
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

/* Enhanced Button Loading */
.btn-loading {
    position: relative;
    color: transparent !important;
    pointer-events: none;
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
    border-top-color: #ffffff;
    border-radius: 50%;
    animation: buttonSpin 0.8s linear infinite;
}

@keyframes buttonSpin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
@endpush
