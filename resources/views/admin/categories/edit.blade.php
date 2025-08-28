@extends('admin.components.layout')

@section('title', 'Edit Kategori Admin')

@push('styles')
<style>
.premium-form {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
    backdrop-filter: blur(10px);
    border: 1px solid rgba(139, 0, 0, 0.2);
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(139, 0, 0, 0.08);
}

.form-control {
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid rgba(139, 0, 0, 0.2);
    border-radius: 6px;
    padding: 8px 12px;
    font-size: 0.85rem;
    transition: all 0.3s ease;
}

.form-control:focus {
    outline: none;
    border-color: #8b0000;
    box-shadow: 0 0 0 3px rgba(139, 0, 0, 0.1);
    background: rgba(255, 255, 255, 1);
}

.form-label {
    font-weight: 500;
    color: #333;
    margin-bottom: 6px;
    font-size: 0.85rem;
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

.page-title {
    font-size: 1.3rem;
    font-weight: 600;
    margin-bottom: 6px;
}

.page-subtitle {
    font-size: 0.8rem;
    opacity: 0.85;
}

.section-title {
    font-size: 0.95rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 12px;
}

.character-counter {
    font-size: 0.7rem;
    color: #999;
    text-align: right;
    margin-top: 2px;
}

.form-help {
    font-size: 0.75rem;
    color: #666;
    margin-top: 4px;
}

.preview-section {
    background: rgba(139, 0, 0, 0.04);
    border: 1px solid rgba(139, 0, 0, 0.08);
    border-radius: 8px;
    padding: 15px;
    margin-top: 15px;
}

.preview-title {
    color: #8b0000;
    font-weight: 500;
    font-size: 0.9rem;
    margin-bottom: 12px;
}
</style>
@endpush

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="page-title">
                    <i class="fas fa-edit me-2"></i>
                    Edit Kategori: {{ $category->name }}
                </h1>
                <p class="mb-0 page-subtitle">Ubah informasi kategori produk</p>
            </div>
            <a href="{{ route('admin.categories.index') }}" class="premium-btn premium-btn-outline">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="premium-form">
            <div class="card-body p-3">
                <form action="{{ route('admin.categories.update', $category) }}" method="POST" id="categoryForm">
                    @csrf
                    @method('PUT')
                    
                    <!-- Basic Information -->
                    <div class="mb-3">
                        <h6 class="section-title">
                            <i class="fas fa-info-circle text-primary me-2"></i>
                            Informasi Dasar
                        </h6>
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Nama Kategori <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', $category->name) }}" 
                                   placeholder="Contoh: Insulasi Thermal"
                                   maxlength="255"
                                   required>
                            <div class="character-counter">
                                <span id="nameCounter">0</span>/255 karakter
                            </div>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-help">
                                Nama kategori yang akan ditampilkan di website
                            </div>
                        </div>
                    </div>

                    <!-- SEO Information -->
                    <div class="mb-3">
                        <h6 class="section-title">
                            <i class="fas fa-search text-success me-2"></i>
                            Optimisasi SEO
                        </h6>
                        
                        <div class="mb-3">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <input type="text" 
                                   class="form-control @error('meta_title') is-invalid @enderror" 
                                   id="meta_title" 
                                   name="meta_title" 
                                   value="{{ old('meta_title', $category->meta_title) }}" 
                                   placeholder="Jika kosong, akan menggunakan nama kategori"
                                   maxlength="255">
                            <div class="character-counter">
                                <span id="metaTitleCounter">0</span>/255 karakter
                            </div>
                            @error('meta_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-help">
                                Judul yang muncul di hasil pencarian Google (opsional)
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="form-control @error('meta_description') is-invalid @enderror" 
                                      id="meta_description" 
                                      name="meta_description" 
                                      rows="3" 
                                      placeholder="Deskripsi singkat kategori untuk SEO"
                                      maxlength="500">{{ old('meta_description', $category->meta_description) }}</textarea>
                            <div class="character-counter">
                                <span id="metaDescCounter">0</span>/500 karakter
                            </div>
                            @error('meta_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-help">
                                Deskripsi yang muncul di hasil pencarian Google (opsional)
                            </div>
                        </div>
                    </div>

                    <!-- Current Info -->
                    <div class="mb-3">
                        <h6 class="section-title">
                            <i class="fas fa-clock text-info me-2"></i>
                            Informasi Saat Ini
                        </h6>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Slug Saat Ini</label>
                                    <div class="form-control-plaintext bg-light p-2 rounded" style="font-size: 0.8rem;">
                                        <code>{{ $category->slug }}</code>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Dibuat</label>
                                    <div class="form-control-plaintext bg-light p-2 rounded" style="font-size: 0.8rem;">
                                        {{ $category->created_at->format('d M Y H:i') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="d-flex gap-2 pt-3 border-top" style="border-color: rgba(139, 0, 0, 0.1) !important;">
                        <button type="submit" class="premium-btn">
                            <i class="fas fa-save"></i>
                            Update
                        </button>
                        <a href="{{ route('admin.categories.show', $category) }}" class="premium-btn premium-btn-outline">
                            <i class="fas fa-eye"></i>
                            Detail
                        </a>
                        <a href="{{ route('admin.categories.index') }}" class="premium-btn premium-btn-outline">
                            <i class="fas fa-times"></i>
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <!-- Preview Section -->
        <div class="preview-section">
            <h6 class="preview-title">
                <i class="fas fa-eye me-2"></i>
                Preview Perubahan
            </h6>
            
            <div class="mb-2">
                <strong style="font-size: 0.8rem;">Nama Kategori:</strong>
                <div id="previewName" class="text-muted" style="font-size: 0.85rem;">{{ $category->name }}</div>
            </div>
            
            <div class="mb-2">
                <strong style="font-size: 0.8rem;">Slug URL:</strong>
                <div id="previewSlug" class="text-muted" style="font-size: 0.85rem;">{{ $category->slug }}</div>
            </div>
            
            <div class="mb-2">
                <strong style="font-size: 0.8rem;">Meta Title:</strong>
                <div id="previewMetaTitle" class="text-muted" style="font-size: 0.85rem;">{{ $category->meta_title }}</div>
            </div>
            
            <div class="mb-0">
                <strong style="font-size: 0.8rem;">Meta Description:</strong>
                <div id="previewMetaDesc" class="text-muted" style="font-size: 0.85rem;">{{ $category->meta_description ?: '-' }}</div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="preview-section mt-3">
            <h6 class="preview-title">
                <i class="fas fa-chart-bar me-2"></i>
                Statistik
            </h6>
            <div class="mb-2">
                <strong style="font-size: 0.8rem;">Sub Kategori:</strong>
                <div class="text-muted" style="font-size: 0.85rem;">{{ $category->subcategories()->count() }} sub kategori</div>
            </div>
            <div class="mb-2">
                <strong style="font-size: 0.8rem;">Total Produk:</strong>
                <div class="text-muted" style="font-size: 0.85rem;">
                    {{ $category->subcategories()->withCount('products')->get()->sum('products_count') }} produk
                </div>
            </div>
            <div class="mb-0">
                <strong style="font-size: 0.8rem;">Terakhir Update:</strong>
                <div class="text-muted" style="font-size: 0.85rem;">{{ $category->updated_at->format('d M Y H:i') }}</div>
            </div>
        </div>

        <!-- Warning Section -->
        @if($category->subcategories()->count() > 0)
        <div class="alert alert-warning mt-3" style="padding: 10px;">
            <h6 class="alert-heading" style="font-size: 0.85rem;">
                <i class="fas fa-exclamation-triangle me-2"></i>
                Perhatian
            </h6>
            <p class="mb-0" style="font-size: 0.8rem;">
                Kategori ini memiliki {{ $category->subcategories()->count() }} sub kategori. 
                Perubahan nama akan mempengaruhi URL dan SEO.
            </p>
        </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
// Character counters
function setupCharacterCounter(inputId, counterId, maxLength) {
    const input = document.getElementById(inputId);
    const counter = document.getElementById(counterId);
    
    function updateCounter() {
        const length = input.value.length;
        counter.textContent = length;
        
        if (length > maxLength * 0.9) {
            counter.parentElement.classList.add('text-warning');
        } else {
            counter.parentElement.classList.remove('text-warning');
        }
        
        if (length >= maxLength) {
            counter.parentElement.classList.add('text-danger');
        } else {
            counter.parentElement.classList.remove('text-danger');
        }
    }
    
    input.addEventListener('input', updateCounter);
    updateCounter(); // Initial call
}

// Setup all character counters
setupCharacterCounter('name', 'nameCounter', 255);
setupCharacterCounter('meta_title', 'metaTitleCounter', 255);
setupCharacterCounter('meta_description', 'metaDescCounter', 500);

// Preview functionality
function updatePreview() {
    const name = document.getElementById('name').value;
    const metaTitle = document.getElementById('meta_title').value;
    const metaDescription = document.getElementById('meta_description').value;
    
    // Update preview
    document.getElementById('previewName').textContent = name || '{{ $category->name }}';
    document.getElementById('previewSlug').textContent = name ? name.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '') : '{{ $category->slug }}';
    document.getElementById('previewMetaTitle').textContent = metaTitle || name || '{{ $category->name }}';
    document.getElementById('previewMetaDesc').textContent = metaDescription || '-';
}

// Setup preview updates
document.getElementById('name').addEventListener('input', updatePreview);
document.getElementById('meta_title').addEventListener('input', updatePreview);
document.getElementById('meta_description').addEventListener('input', updatePreview);

// Form validation
document.getElementById('categoryForm').addEventListener('submit', function(e) {
    const submitBtn = this.querySelector('button[type="submit"]');
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Menyimpan...';
    submitBtn.disabled = true;
});

// Auto-fill meta title if empty
document.getElementById('name').addEventListener('blur', function() {
    const metaTitleInput = document.getElementById('meta_title');
    if (!metaTitleInput.value && this.value) {
        metaTitleInput.value = this.value;
        updatePreview();
        setupCharacterCounter('meta_title', 'metaTitleCounter', 255);
    }
});

// Initial preview update
updatePreview();
</script>
@endpush
