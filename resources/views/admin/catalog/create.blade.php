@extends('admin.components.layout')

@section('title', $title)

@push('styles')
<style>
.catalog-create {
    padding: 12px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    min-height: 100vh;
}

.page-header {
    background: linear-gradient(135deg, #8b0000, #a50000, #c50000);
    border-radius: 16px;
    padding: 20px;
    margin-bottom: 20px;
    color: white;
    position: relative;
    overflow: hidden;
    box-shadow: 0 8px 32px rgba(139, 0, 0, 0.25);
    backdrop-filter: blur(10px);
}

.page-header::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.15) 0%, transparent 70%);
    animation: shimmer 4s infinite linear;
}

.page-header::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.1) 50%, transparent 70%);
    animation: shine 3s infinite;
}

@keyframes shimmer {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

@keyframes shine {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 12px;
    position: relative;
    z-index: 2;
}

.page-title {
    font-size: 1.25rem;
    font-weight: 700;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.page-subtitle {
    margin: 4px 0 0 0;
    opacity: 0.9;
    font-size: 0.75rem;
    font-weight: 500;
}

.premium-btn {
    background: linear-gradient(135deg, #8b0000, #a50000);
    border: none;
    color: white;
    padding: 6px 12px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.7rem;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    box-shadow: 0 3px 12px rgba(139, 0, 0, 0.25);
    position: relative;
    overflow: hidden;
    cursor: pointer;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.premium-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.6s;
}

.premium-btn:hover::before {
    left: 100%;
}

.premium-btn:hover {
    background: linear-gradient(135deg, #a50000, #c50000);
    transform: translateY(-2px) scale(1.02);
    box-shadow: 0 6px 20px rgba(139, 0, 0, 0.4);
    color: white;
    text-decoration: none;
}

.premium-btn:active {
    transform: translateY(0) scale(0.98);
}

.premium-btn-outline {
    background: white;
    border: 2px solid rgba(139, 0, 0, 0.4);
    color: #8b0000;
    box-shadow: 0 3px 12px rgba(139, 0, 0, 0.15);
}

.premium-btn-outline:hover {
    background: rgba(139, 0, 0, 0.1);
    border-color: #8b0000;
    color: #8b0000;
    transform: translateY(-2px) scale(1.02);
}

.premium-btn-lg {
    padding: 10px 20px;
    font-size: 0.8rem;
    border-radius: 10px;
    gap: 6px;
}

.form-container {
    background: white;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 4px 20px rgba(139, 0, 0, 0.1);
    border: 1px solid rgba(139, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
}

.form-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #8b0000, #a50000, #c50000);
}

.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 20px;
}

.form-section {
    margin-bottom: 20px;
}

.section-header {
    margin-bottom: 12px;
    padding-bottom: 8px;
    border-bottom: 2px solid rgba(139, 0, 0, 0.1);
    position: relative;
}

.section-header::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 40px;
    height: 2px;
    background: linear-gradient(90deg, #8b0000, #a50000);
}

.section-header h3 {
    font-size: 0.9rem;
    font-weight: 700;
    color: #8b0000;
    margin: 0 0 3px 0;
    display: flex;
    align-items: center;
    gap: 6px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.section-header small {
    color: #666;
    font-size: 0.7rem;
    font-weight: 500;
}

.form-group {
    margin-bottom: 12px;
}

.form-label {
    display: block;
    font-weight: 600;
    color: #8b0000;
    margin-bottom: 4px;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.form-control {
    width: 100%;
    padding: 8px 12px;
    border: 1.5px solid rgba(139, 0, 0, 0.15);
    border-radius: 6px;
    font-size: 0.75rem;
    transition: all 0.3s ease;
    background: white;
    font-family: inherit;
}

.form-control:focus {
    outline: none;
    border-color: #8b0000;
    box-shadow: 0 0 0 2px rgba(139, 0, 0, 0.15);
    transform: translateY(-1px);
}

.form-control.is-invalid {
    border-color: #dc2626;
    background: rgba(220, 38, 38, 0.05);
}

.invalid-feedback {
    color: #dc2626;
    font-size: 0.65rem;
    margin-top: 3px;
    font-weight: 500;
}

.form-text {
    color: #666;
    font-size: 0.65rem;
    margin-top: 3px;
    font-style: italic;
}

.upload-area {
    border: 2px dashed rgba(139, 0, 0, 0.3);
    border-radius: 10px;
    padding: 20px 12px;
    text-align: center;
    transition: all 0.3s ease;
    cursor: pointer;
    position: relative;
    background: rgba(139, 0, 0, 0.02);
    overflow: hidden;
}

.upload-area::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(139, 0, 0, 0.05) 0%, transparent 70%);
    opacity: 0;
    transition: opacity 0.3s ease;
    animation: pulse 2s infinite;
}

.upload-area:hover::before {
    opacity: 1;
}

.upload-area:hover {
    border-color: #8b0000;
    background: rgba(139, 0, 0, 0.05);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(139, 0, 0, 0.15);
}

.upload-area.drag-over {
    border-color: #8b0000;
    background: rgba(139, 0, 0, 0.08);
    transform: scale(1.02);
}

@keyframes pulse {
    0%, 100% { transform: scale(1); opacity: 0.3; }
    50% { transform: scale(1.05); opacity: 0.6; }
}

.upload-placeholder i {
    font-size: 2rem;
    color: rgba(139, 0, 0, 0.6);
    margin-bottom: 8px;
    display: block;
}

.upload-placeholder h4 {
    font-size: 0.85rem;
    font-weight: 700;
    color: #8b0000;
    margin: 0 0 4px 0;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.upload-placeholder p {
    color: #666;
    margin: 0 0 4px 0;
    font-size: 0.7rem;
    font-weight: 500;
}

.upload-placeholder small {
    color: #999;
    font-size: 0.6rem;
    font-style: italic;
}

.file-input {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
}

.preview-container {
    margin-top: 12px;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
    gap: 10px;
}

.preview-item {
    background: rgba(139, 0, 0, 0.02);
    border: 1px solid rgba(139, 0, 0, 0.1);
    border-radius: 6px;
    padding: 8px;
    text-align: center;
    position: relative;
    transition: all 0.3s ease;
    overflow: hidden;
}

.preview-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(139, 0, 0, 0.1), transparent);
    transition: left 0.5s;
}

.preview-item:hover::before {
    left: 100%;
}

.preview-item:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 6px 16px rgba(139, 0, 0, 0.2);
    border-color: #8b0000;
}

.preview-item img {
    width: 100%;
    height: 60px;
    object-fit: cover;
    border-radius: 4px;
    margin-bottom: 4px;
}

.preview-item .file-icon {
    width: 100%;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: #8b0000;
    background: rgba(139, 0, 0, 0.1);
    border-radius: 4px;
    margin-bottom: 4px;
}

.preview-item .file-name {
    font-size: 0.6rem;
    color: #333;
    word-break: break-word;
    line-height: 1.2;
    font-weight: 500;
}

.remove-btn {
    position: absolute;
    top: 3px;
    right: 3px;
    width: 16px;
    height: 16px;
    background: #dc2626;
    color: white;
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.6rem;
    cursor: pointer;
    transition: all 0.3s ease;
    z-index: 2;
}

.remove-btn:hover {
    background: #b91c1c;
    transform: scale(1.2);
    box-shadow: 0 3px 8px rgba(220, 38, 38, 0.4);
}

.submit-section {
    display: flex;
    gap: 10px;
    justify-content: center;
    padding-top: 20px;
    border-top: 2px solid rgba(139, 0, 0, 0.1);
    position: relative;
}

.submit-section::before {
    content: '';
    position: absolute;
    top: -2px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 2px;
    background: linear-gradient(90deg, #8b0000, #a50000);
}

@media (max-width: 768px) {
    .catalog-create {
        padding: 8px;
    }
    
    .page-header {
        padding: 16px;
        margin-bottom: 16px;
    }
    
    .page-title {
        font-size: 1.1rem;
    }
    
    .page-subtitle {
        font-size: 0.7rem;
    }
    
    .header-content {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }
    
    .form-container {
        padding: 16px;
    }
    
    .form-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }
    
    .section-header h3 {
        font-size: 0.8rem;
    }
    
    .section-header small {
        font-size: 0.65rem;
    }
    
    .form-label {
        font-size: 0.7rem;
    }
    
    .form-control {
        padding: 6px 10px;
        font-size: 0.7rem;
    }
    
    .upload-area {
        padding: 16px 10px;
    }
    
    .upload-placeholder h4 {
        font-size: 0.8rem;
    }
    
    .upload-placeholder p {
        font-size: 0.65rem;
    }
    
    .upload-placeholder small {
        font-size: 0.55rem;
    }
    
    .submit-section {
        flex-direction: column;
        gap: 8px;
    }
    
    .premium-btn-lg {
        padding: 8px 16px;
        font-size: 0.75rem;
    }
    
    .preview-container {
        grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
        gap: 8px;
    }
    
    .preview-item {
        padding: 6px;
    }
    
    .preview-item img,
    .preview-item .file-icon {
        height: 50px;
    }
    
    .preview-item .file-name {
        font-size: 0.55rem;
    }
    
    .remove-btn {
        width: 14px;
        height: 14px;
        font-size: 0.55rem;
    }
}

/* Additional Premium Styling */
.form-section {
    position: relative;
}

.form-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: -20px;
    width: 3px;
    height: 100%;
    background: linear-gradient(180deg, #8b0000 0%, #a50000 50%, transparent 100%);
    border-radius: 2px;
    opacity: 0.3;
}

.premium-btn i {
    transition: transform 0.3s ease;
}

.premium-btn:hover i {
    transform: scale(1.2);
}

/* Floating Animation */
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-3px); }
}

.upload-area:hover .upload-placeholder i {
    animation: float 1.5s ease-in-out infinite;
}

/* Loading State */
.form-loading {
    position: relative;
    overflow: hidden;
}

.form-loading::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(139, 0, 0, 0.1), transparent);
    animation: loading 1.5s infinite;
}

@keyframes loading {
    0% { left: -100%; }
    100% { left: 100%; }
}

/* Focus Indicators */
.form-control:focus + .form-text {
    color: #8b0000;
    font-weight: 600;
}

/* Success State */
.form-success {
    border-color: #22c55e !important;
    background: rgba(34, 197, 94, 0.05);
}

.form-success:focus {
    border-color: #22c55e !important;
    box-shadow: 0 0 0 2px rgba(34, 197, 94, 0.15) !important;
}
</style>
@endpush

@section('content')
<div class="catalog-create">
    <!-- Header Section -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-info">
                <h1 class="page-title">
                    <i class="fas fa-plus-circle"></i>
                    {{ $title }}
                </h1>
                <p class="page-subtitle">Tambahkan item katalog baru dengan gambar dan file pendukung</p>
            </div>
            <div class="header-actions">
                <a href="{{ route('admin.catalog.index') }}" class="premium-btn premium-btn-outline">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="form-container">
        <form action="{{ route('admin.catalog.store') }}" method="POST" enctype="multipart/form-data" class="catalog-form">
            @csrf
            
            <!-- Basic Information Section -->
            <div class="form-section">
                <div class="section-header">
                    <h3><i class="fas fa-info-circle"></i> Informasi Dasar</h3>
                    <small>Data umum item katalog</small>
                </div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Nama Item <span style="color: #dc2626;">*</span></label>
                        <input type="text" 
                               name="name" 
                               class="form-control @error('name') is-invalid @enderror" 
                               value="{{ old('name') }}" 
                               placeholder="Masukkan nama item"
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text">Nama yang akan ditampilkan pada katalog</small>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Meta Title</label>
                        <input type="text" 
                               name="meta_title" 
                               class="form-control @error('meta_title') is-invalid @enderror" 
                               value="{{ old('meta_title') }}" 
                               placeholder="Title untuk SEO">
                        @error('meta_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text">Jika kosong, akan menggunakan nama item</small>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Deskripsi <span style="color: #dc2626;">*</span></label>
                    <textarea name="description" 
                              class="form-control @error('description') is-invalid @enderror" 
                              rows="3" 
                              placeholder="Deskripsi lengkap item katalog..."
                              required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text">Deskripsi detail tentang item katalog</small>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Meta Description</label>
                        <textarea name="meta_description" 
                                  class="form-control @error('meta_description') is-invalid @enderror" 
                                  rows="2" 
                                  placeholder="Deskripsi untuk SEO">{{ old('meta_description') }}</textarea>
                        @error('meta_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text">Maksimal 160 karakter untuk SEO</small>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Meta Keywords</label>
                        <input type="text" 
                               name="meta_keywords" 
                               class="form-control @error('meta_keywords') is-invalid @enderror" 
                               value="{{ old('meta_keywords') }}" 
                               placeholder="keyword1, keyword2, keyword3">
                        @error('meta_keywords')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text">Pisahkan dengan koma</small>
                    </div>
                </div>
            </div>
            
            <!-- Images Section -->
            <div class="form-section">
                <div class="section-header">
                    <h3><i class="fas fa-images"></i> Gambar Katalog</h3>
                    <small>Upload gambar untuk item katalog (minimal 1 gambar)</small>
                </div>
                
                <div class="upload-area" onclick="document.getElementById('images').click()">
                    <input type="file" 
                           id="images" 
                           name="images[]" 
                           class="file-input" 
                           accept="image/*" 
                           multiple>
                    <div class="upload-placeholder">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <h4>Upload Gambar</h4>
                        <p>Klik atau drag & drop gambar</p>
                        <small>JPG, PNG, GIF (Max: 2MB per file)</small>
                    </div>
                </div>
                
                <div id="imagePreview" class="preview-container"></div>
            </div>
            
            <!-- Files Section -->
            <div class="form-section">
                <div class="section-header">
                    <h3><i class="fas fa-file-alt"></i> File Pendukung</h3>
                    <small>Upload file dokumen atau video (opsional)</small>
                </div>
                
                <div class="upload-area" onclick="document.getElementById('files').click()">
                    <input type="file" 
                           id="files" 
                           name="files[]" 
                           class="file-input" 
                           accept=".pdf,.doc,.docx,.xls,.xlsx,.mp4,.avi"
                           multiple>
                    <div class="upload-placeholder">
                        <i class="fas fa-file-upload"></i>
                        <h4>Upload File</h4>
                        <p>Klik atau drag & drop file</p>
                        <small>PDF, DOC, XLS, MP4, AVI (Max: 10MB per file)</small>
                    </div>
                </div>
                
                <div id="filePreview" class="preview-container"></div>
            </div>
            
            <!-- Submit Section -->
            <div class="submit-section">
                <button type="button" onclick="confirmCancel()" class="premium-btn premium-btn-outline premium-btn-lg">
                    <i class="fas fa-times"></i>
                    Batal
                </button>
                <button type="submit" class="premium-btn premium-btn-lg">
                    <i class="fas fa-save"></i>
                    Simpan Katalog
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
// Modern Alert System
function showModernAlert(type, message, duration = 4000) {
    const alertContainer = document.getElementById('alert-container') || createAlertContainer();
    
    const alertId = 'alert-' + Date.now();
    const alertElement = document.createElement('div');
    alertElement.id = alertId;
    alertElement.className = `modern-alert alert-${type}`;
    
    const icons = {
        'success': 'fas fa-check-circle',
        'error': 'fas fa-exclamation-circle', 
        'warning': 'fas fa-exclamation-triangle',
        'info': 'fas fa-info-circle'
    };
    
    alertElement.innerHTML = `
        <div class="alert-content">
            <i class="${icons[type]}"></i>
            <span class="alert-message">${message}</span>
        </div>
        <button class="alert-close" onclick="closeAlert('${alertId}')">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    alertContainer.appendChild(alertElement);
    
    // Trigger animation
    setTimeout(() => alertElement.classList.add('show'), 100);
    
    // Auto close
    setTimeout(() => closeAlert(alertId), duration);
}

function createAlertContainer() {
    const container = document.createElement('div');
    container.id = 'alert-container';
    container.className = 'modern-alert-container';
    document.body.appendChild(container);
    
    // Add styles
    const style = document.createElement('style');
    style.textContent = `
        .modern-alert-container {
            position: fixed;
            top: 15px;
            right: 15px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 8px;
            max-width: 350px;
        }
        
        .modern-alert {
            background: white;
            border-radius: 10px;
            padding: 12px 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            border-left: 3px solid #8b0000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transform: translateX(100%);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(139, 0, 0, 0.1);
        }
        
        .modern-alert.show {
            transform: translateX(0);
            opacity: 1;
            animation: slideInRight 0.5s ease-out;
        }
        
        .modern-alert.hide {
            transform: translateX(100%);
            opacity: 0;
        }
        
        .alert-success { border-left-color: #22c55e; }
        .alert-error { border-left-color: #ef4444; }
        .alert-warning { border-left-color: #f59e0b; }
        .alert-info { border-left-color: #3b82f6; }
        
        .alert-content {
            display: flex;
            align-items: center;
            gap: 10px;
            flex: 1;
        }
        
        .alert-content i {
            font-size: 1rem;
            color: #8b0000;
        }
        
        .alert-success .alert-content i { color: #22c55e; }
        .alert-error .alert-content i { color: #ef4444; }
        .alert-warning .alert-content i { color: #f59e0b; }
        .alert-info .alert-content i { color: #3b82f6; }
        
        .alert-message {
            font-size: 0.75rem;
            font-weight: 500;
            color: #1f2937;
            line-height: 1.4;
        }
        
        .alert-close {
            background: none;
            border: none;
            color: #6b7280;
            cursor: pointer;
            padding: 3px;
            border-radius: 4px;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 20px;
            height: 20px;
            font-size: 0.7rem;
        }
        
        .alert-close:hover {
            background: rgba(139, 0, 0, 0.1);
            color: #8b0000;
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
        
        @media (max-width: 768px) {
            .modern-alert-container {
                top: 10px;
                right: 10px;
                left: 10px;
                max-width: none;
            }
        }
    `;
    document.head.appendChild(style);
    
    return container;
}

function closeAlert(alertId) {
    const alert = document.getElementById(alertId);
    if (alert) {
        alert.classList.add('hide');
        setTimeout(() => alert.remove(), 400);
    }
}

// File Upload Functions
let selectedImages = [];
let selectedFiles = [];

document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('images');
    const fileInput = document.getElementById('files');
    
    // Setup file uploads
    setupFileUpload(imageInput, 'imagePreview', selectedImages, 'image');
    setupFileUpload(fileInput, 'filePreview', selectedFiles, 'file');
});

function setupFileUpload(input, previewId, selectedArray, type) {
    const uploadArea = input.parentElement;
    const previewContainer = document.getElementById(previewId);
    
    // File input change
    input.addEventListener('change', function(e) {
        handleFiles(e.target.files, selectedArray, previewContainer, type);
    });
    
    // Drag and drop
    uploadArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        this.classList.add('drag-over');
    });
    
    uploadArea.addEventListener('dragleave', function(e) {
        e.preventDefault();
        this.classList.remove('drag-over');
    });
    
    uploadArea.addEventListener('drop', function(e) {
        e.preventDefault();
        this.classList.remove('drag-over');
        handleFiles(e.dataTransfer.files, selectedArray, previewContainer, type);
    });
}

function handleFiles(files, selectedArray, container, type) {
    Array.from(files).forEach(file => {
        // Validation
        if (type === 'image' && !file.type.startsWith('image/')) {
            showModernAlert('error', `${file.name} bukan file gambar yang valid`);
            return;
        }
        
        if (type === 'image' && file.size > 2 * 1024 * 1024) {
            showModernAlert('warning', `${file.name} terlalu besar (max 2MB)`);
            return;
        }
        
        if (type === 'file' && file.size > 10 * 1024 * 1024) {
            showModernAlert('warning', `${file.name} terlalu besar (max 10MB)`);
            return;
        }
        
        selectedArray.push(file);
        displayPreview(file, selectedArray.length - 1, container, type);
    });
    
    updateFileInput(selectedArray, type);
}

function displayPreview(file, index, container, type) {
    const previewItem = document.createElement('div');
    previewItem.className = 'preview-item';
    
    if (type === 'image') {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewItem.innerHTML = `
                <img src="${e.target.result}" alt="Preview">
                <div class="file-name">${file.name}</div>
                <button type="button" class="remove-btn" onclick="removeFile(${index}, '${type}')">
                    <i class="fas fa-times"></i>
                </button>
            `;
        };
        reader.readAsDataURL(file);
    } else {
        const iconClass = getFileIcon(file.name);
        previewItem.innerHTML = `
            <div class="file-icon">
                <i class="${iconClass}"></i>
            </div>
            <div class="file-name">${file.name}</div>
            <button type="button" class="remove-btn" onclick="removeFile(${index}, '${type}')">
                <i class="fas fa-times"></i>
            </button>
        `;
    }
    
    container.appendChild(previewItem);
}

function getFileIcon(filename) {
    const ext = filename.split('.').pop().toLowerCase();
    const iconMap = {
        'pdf': 'fas fa-file-pdf',
        'doc': 'fas fa-file-word',
        'docx': 'fas fa-file-word',
        'xls': 'fas fa-file-excel',
        'xlsx': 'fas fa-file-excel',
        'ppt': 'fas fa-file-powerpoint',
        'pptx': 'fas fa-file-powerpoint',
        'mp4': 'fas fa-file-video',
        'avi': 'fas fa-file-video',
        'mov': 'fas fa-file-video',
        'zip': 'fas fa-file-archive',
        'rar': 'fas fa-file-archive'
    };
    
    return iconMap[ext] || 'fas fa-file';
}

function removeFile(index, type) {
    if (type === 'image') {
        selectedImages.splice(index, 1);
        updateImagePreview();
        updateFileInput(selectedImages, 'image');
    } else {
        selectedFiles.splice(index, 1);
        updateFilePreview();
        updateFileInput(selectedFiles, 'file');
    }
    showModernAlert('info', 'File berhasil dihapus');
}

function updateImagePreview() {
    const container = document.getElementById('imagePreview');
    container.innerHTML = '';
    selectedImages.forEach((file, index) => {
        displayPreview(file, index, container, 'image');
    });
}

function updateFilePreview() {
    const container = document.getElementById('filePreview');
    container.innerHTML = '';
    selectedFiles.forEach((file, index) => {
        displayPreview(file, index, container, 'file');
    });
}

function updateFileInput(selectedArray, type) {
    const input = type === 'image' ? document.getElementById('images') : document.getElementById('files');
    const dt = new DataTransfer();
    
    selectedArray.forEach(file => {
        dt.items.add(file);
    });
    
    input.files = dt.files;
}

function confirmCancel() {
    if (selectedImages.length > 0 || selectedFiles.length > 0 || 
        document.querySelector('input[name="name"]').value ||
        document.querySelector('textarea[name="description"]').value) {
        
        if (confirm('Anda yakin ingin membatalkan? Data yang sudah diisi akan hilang.')) {
            window.history.back();
        }
    } else {
        window.history.back();
    }
}

// Form submission
document.querySelector('.catalog-form').addEventListener('submit', function(e) {
    const name = document.querySelector('input[name="name"]').value;
    const description = document.querySelector('textarea[name="description"]').value;
    
    if (!name || !description) {
        e.preventDefault();
        showModernAlert('error', 'Nama item dan deskripsi harus diisi');
        return;
    }
    
    if (selectedImages.length === 0) {
        e.preventDefault();
        showModernAlert('warning', 'Minimal upload 1 gambar untuk item katalog');
        return;
    }
    
    // Add loading state
    const submitBtn = e.target.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
    submitBtn.disabled = true;
    
    showModernAlert('info', 'Menyimpan data katalog...');
});

// Session messages
@if(session('success'))
    setTimeout(() => showModernAlert('success', '{{ session('success') }}'), 500);
@endif

@if(session('error'))
    setTimeout(() => showModernAlert('error', '{{ session('error') }}'), 500);
@endif

@if($errors->any())
    setTimeout(() => {
        @foreach($errors->all() as $error)
            showModernAlert('error', '{{ $error }}');
        @endforeach
    }, 500);
@endif
</script>
@endpush
@endsection
