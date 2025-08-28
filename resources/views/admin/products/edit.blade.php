@extends('admin.components.layout')

@section('title', 'Edit Produk Admin')

@push('styles')
<style>
.premium-card {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0.08));
    backdrop-filter: blur(20px);
    border: 1px solid rgba(139, 0, 0, 0.15);
    border-radius: 25px;
    box-shadow: 0 10px 40px rgba(139, 0, 0, 0.12);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    margin-bottom: 30px;
}

.premium-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 50px rgba(139, 0, 0, 0.18);
    border-color: rgba(139, 0, 0, 0.25);
}

.premium-btn {
    background: linear-gradient(135deg, #8b0000, #a50000);
    border: none;
    color: white;
    padding: 12px 24px;
    border-radius: 15px;
    font-weight: 700;
    font-size: 0.9rem;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 6px 20px rgba(139, 0, 0, 0.25);
    position: relative;
    overflow: hidden;
}

.premium-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.6s;
}

.premium-btn:hover::before {
    left: 100%;
}

.premium-btn:hover {
    background: linear-gradient(135deg, #a50000, #c50000);
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(139, 0, 0, 0.4);
    color: white;
}

.premium-btn-outline {
    background: rgba(255, 255, 255, 0.95);
    border: 2px solid rgba(255, 255, 255, 0.9);
    color: #8b0000;
    font-weight: 600;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.premium-btn-outline:hover {
    background: rgba(255, 255, 255, 1);
    border-color: rgba(255, 255, 255, 1);
    color: #8b0000;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.form-control {
    border: 1px solid rgba(139, 0, 0, 0.2);
    border-radius: 6px;
    padding: 8px 12px;
    font-size: 0.85rem;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #8b0000;
    box-shadow: 0 0 0 3px rgba(139, 0, 0, 0.1);
    outline: none;
}

.form-label {
    font-weight: 600;
    color: #333;
    margin-bottom: 6px;
    font-size: 0.85rem;
}

.page-header {
    background: linear-gradient(135deg, #8b0000, #a50000, #c50000);
    color: white;
    padding: 35px;
    border-radius: 25px;
    margin-bottom: 35px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 15px 50px rgba(139, 0, 0, 0.25);
}

.page-header::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
    animation: shimmer 4s infinite linear;
}

@keyframes shimmer {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.section-title {
    color: #8b0000;
    font-weight: 700;
    font-size: 1.1rem;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 3px solid rgba(139, 0, 0, 0.15);
    position: relative;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -3px;
    left: 0;
    width: 50px;
    height: 3px;
    background: linear-gradient(90deg, #8b0000, #a50000);
    border-radius: 2px;
}

.existing-images {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: 10px;
    margin-bottom: 15px;
}

.existing-image-item {
    position: relative;
    background: white;
    border-radius: 8px;
    padding: 8px;
    border: 1px solid rgba(139, 0, 0, 0.1);
}

.existing-image {
    width: 100%;
    height: 80px;
    object-fit: cover;
    border-radius: 6px;
}

.primary-badge {
    position: absolute;
    top: 2px;
    left: 2px;
    background: #28a745;
    color: white;
    padding: 2px 6px;
    border-radius: 10px;
    font-size: 0.6rem;
    font-weight: 600;
}

.image-actions {
    position: absolute;
    top: 2px;
    right: 2px;
    display: flex;
    gap: 2px;
}

.image-action-btn {
    background: rgba(0, 0, 0, 0.7);
    color: white;
    border: none;
    border-radius: 3px;
    width: 18px;
    height: 18px;
    font-size: 0.6rem;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.image-action-btn:hover {
    background: rgba(0, 0, 0, 0.9);
}

.image-action-btn.primary {
    background: #28a745;
}

.image-action-btn.primary:hover {
    background: #1e7e34;
}

.image-action-btn.delete {
    background: #dc3545;
}

.image-action-btn.delete:hover {
    background: #c82333;
}

.image-upload-area {
    border: 2px dashed rgba(139, 0, 0, 0.3);
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    background: rgba(139, 0, 0, 0.02);
    transition: all 0.3s ease;
    cursor: pointer;
}

.image-upload-area:hover {
    border-color: rgba(139, 0, 0, 0.5);
    background: rgba(139, 0, 0, 0.05);
}

.preview-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: 10px;
    margin-top: 15px;
}

.preview-item {
    position: relative;
    background: white;
    border-radius: 8px;
    padding: 8px;
    border: 1px solid rgba(139, 0, 0, 0.1);
}

.preview-image {
    width: 100%;
    height: 80px;
    object-fit: cover;
    border-radius: 6px;
}

.remove-image {
    position: absolute;
    top: 2px;
    right: 2px;
    background: #dc3545;
    color: white;
    border: none;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    font-size: 0.7rem;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.character-count {
    font-size: 0.7rem;
    color: #6c757d;
    text-align: right;
    margin-top: 3px;
}

.form-text {
    font-size: 0.75rem;
    color: #6c757d;
    margin-top: 3px;
}

.input-group-text {
    background: rgba(139, 0, 0, 0.1);
    border: 1px solid rgba(139, 0, 0, 0.2);
    color: #8b0000;
    font-size: 0.85rem;
    font-weight: 600;
}

.sticky-actions {
    position: sticky;
    bottom: 20px;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    padding: 15px;
    border-radius: 10px;
    border: 1px solid rgba(139, 0, 0, 0.1);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
}
</style>
@endpush

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h5 class="mb-1" style="font-size: 1.2rem;">
                <i class="fas fa-edit me-2" style="font-size: 1.0rem;"></i>
                Edit Produk
            </h5>
            <p class="mb-0 opacity-75" style="font-size: 0.85rem;">Mengubah informasi produk: <strong>{{ $product->name }}</strong></p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.products.show', $product) }}" class="premium-btn premium-btn-outline" style="padding: 6px 12px; font-size: 0.8rem;">
                <i class="fas fa-eye" style="font-size: 0.75rem;"></i>
                Lihat
            </a>
            <a href="{{ route('admin.products.index') }}" class="premium-btn premium-btn-outline" style="padding: 6px 12px; font-size: 0.8rem;">
                <i class="fas fa-arrow-left" style="font-size: 0.75rem;"></i>
                Kembali
            </a>
        </div>
    </div>
</div>

<form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" id="productForm">
    @csrf
    @method('PUT')
    
    <div class="row">
        <div class="col-lg-8">
            <!-- Basic Information -->
            <div class="premium-card" style="padding: 15px;">
                <h6 class="section-title">
                    <i class="fas fa-info-circle me-2" style="font-size: 0.85rem;"></i>
                    Informasi Dasar
                </h6>
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Produk *</label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', $product->name) }}"
                                   placeholder="Masukkan nama produk..."
                                   maxlength="255"
                                   required>
                            <div class="character-count">
                                <span id="nameCount">{{ strlen($product->name) }}</span>/255 karakter
                            </div>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="sku" class="form-label">SKU</label>
                            <input type="text" 
                                   class="form-control @error('sku') is-invalid @enderror" 
                                   id="sku" 
                                   name="sku" 
                                   value="{{ old('sku', $product->sku) }}"
                                   placeholder="SKU produk"
                                   maxlength="100">
                            @error('sku')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="subcategory_id" class="form-label">Sub Kategori *</label>
                    <select class="form-select @error('subcategory_id') is-invalid @enderror" 
                            id="subcategory_id" 
                            name="subcategory_id" 
                            required>
                        <option value="">Pilih Sub Kategori</option>
                        @foreach($subcategories as $categoryName => $subs)
                            <optgroup label="{{ $categoryName }}">
                                @foreach($subs as $subcategory)
                                    <option value="{{ $subcategory->id }}" 
                                            {{ old('subcategory_id', $product->subcategory_id) == $subcategory->id ? 'selected' : '' }}>
                                        {{ $subcategory->name }}
                                    </option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                    @error('subcategory_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="brands" class="form-label">Brand/Merek</label>
                    <input type="text" 
                           class="form-control @error('brands') is-invalid @enderror" 
                           id="brands" 
                           name="brands" 
                           value="{{ old('brands', is_array($product->brands) ? implode(', ', $product->brands) : $product->brands) }}"
                           placeholder="Contoh: Brand A, Brand B, Brand C">
                    <div class="form-text">Pisahkan multiple brand dengan koma (,)</div>
                    @error('brands')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Pricing Information -->
            <div class="premium-card" style="padding: 15px;">
                <h6 class="section-title">
                    <i class="fas fa-tag me-2" style="font-size: 0.85rem;"></i>
                    Informasi Harga
                </h6>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="currency" class="form-label">Mata Uang</label>
                            <select class="form-select @error('currency') is-invalid @enderror" 
                                    id="currency" 
                                    name="currency">
                                <option value="IDR" {{ old('currency', $product->currency) == 'IDR' ? 'selected' : '' }}>IDR (Rupiah)</option>
                                <option value="USD" {{ old('currency', $product->currency) == 'USD' ? 'selected' : '' }}>USD (Dollar)</option>
                                <option value="EUR" {{ old('currency', $product->currency) == 'EUR' ? 'selected' : '' }}>EUR (Euro)</option>
                            </select>
                            @error('currency')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="price" class="form-label">Harga Jual</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    @if($product->currency == 'USD')
                                        $
                                    @elseif($product->currency == 'EUR')
                                        €
                                    @else
                                        Rp
                                    @endif
                                </span>
                                <input type="number" 
                                       class="form-control @error('price') is-invalid @enderror" 
                                       id="price" 
                                       name="price" 
                                       value="{{ old('price', $product->price) }}"
                                       placeholder="0"
                                       min="0"
                                       step="1000">
                            </div>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="price_strike" class="form-label">Harga Coret</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    @if($product->currency == 'USD')
                                        $
                                    @elseif($product->currency == 'EUR')
                                        €
                                    @else
                                        Rp
                                    @endif
                                </span>
                                <input type="number" 
                                       class="form-control @error('price_strike') is-invalid @enderror" 
                                       id="price_strike" 
                                       name="price_strike" 
                                       value="{{ old('price_strike', $product->price_strike) }}"
                                       placeholder="0"
                                       min="0"
                                       step="1000">
                            </div>
                            @error('price_strike')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Attributes -->
            <div class="premium-card" style="padding: 15px;">
                <h6 class="section-title">
                    <i class="fas fa-list me-2" style="font-size: 0.85rem;"></i>
                    Atribut Produk
                </h6>
                
                <div class="row">
                    @for($i = 1; $i <= 10; $i++)
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="attr{{ $i }}" class="form-label">Atribut {{ $i }}</label>
                                <input type="text" 
                                       class="form-control @error('attr'.$i) is-invalid @enderror" 
                                       id="attr{{ $i }}" 
                                       name="attr{{ $i }}" 
                                       value="{{ old('attr'.$i, $product->{'attr'.$i}) }}"
                                       placeholder="Contoh: Material, Ukuran, Warna"
                                       maxlength="255">
                                @error('attr'.$i)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Current Images -->
            @if($product->images->count() > 0)
            <div class="premium-card" style="padding: 15px;">
                <h6 class="section-title">
                    <i class="fas fa-images me-2" style="font-size: 0.85rem;"></i>
                    Gambar Saat Ini
                </h6>
                
                <div class="existing-images">
                    @foreach($product->images as $image)
                    <div class="existing-image-item" id="image-{{ $image->id }}">
                        <img src="{{ asset('storage/' . $image->image_path) }}" 
                             alt="{{ $image->alt_text }}" 
                             class="existing-image">
                        
                        @if($image->is_primary)
                            <div class="primary-badge">Utama</div>
                        @endif
                        
                        <div class="image-actions">
                            @if(!$image->is_primary)
                                <button type="button" 
                                        class="image-action-btn primary" 
                                        onclick="setPrimaryImage({{ $image->id }})"
                                        title="Jadikan gambar utama">
                                    <i class="fas fa-star"></i>
                                </button>
                            @endif
                            <button type="button" 
                                    class="image-action-btn delete" 
                                    onclick="deleteExistingImage({{ $image->id }})"
                                    title="Hapus gambar">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Add New Images -->
            <div class="premium-card" style="padding: 15px;">
                <h6 class="section-title">
                    <i class="fas fa-plus me-2" style="font-size: 0.85rem;"></i>
                    Tambah Gambar Baru
                </h6>
                
                <div class="image-upload-area" id="imageUploadArea">
                    <i class="fas fa-cloud-upload-alt text-muted" style="font-size: 1.5rem; margin-bottom: 8px;"></i>
                    <p class="mb-2" style="font-size: 0.8rem;">
                        <strong>Klik atau drag & drop gambar</strong>
                    </p>
                    <p class="text-muted mb-0" style="font-size: 0.7rem;">
                        JPG, PNG, GIF. Max 2MB per file.
                    </p>
                    <input type="file" 
                           class="d-none" 
                           id="images" 
                           name="images[]" 
                           multiple 
                           accept="image/*">
                </div>

                <div id="imagePreview" class="preview-container"></div>
                
                @error('images.*')
                    <div class="text-danger mt-2" style="font-size: 0.8rem;">{{ $message }}</div>
                @enderror
            </div>

            <!-- SEO Information -->
            <div class="premium-card" style="padding: 15px;">
                <h6 class="section-title">
                    <i class="fas fa-search me-2" style="font-size: 0.85rem;"></i>
                    SEO & Meta
                </h6>
                
                <div class="mb-3">
                    <label for="meta_title" class="form-label">Meta Title</label>
                    <input type="text" 
                           class="form-control @error('meta_title') is-invalid @enderror" 
                           id="meta_title" 
                           name="meta_title" 
                           value="{{ old('meta_title', $product->meta_title) }}"
                           placeholder="Judul untuk SEO"
                           maxlength="255">
                    <div class="character-count">
                        <span id="metaTitleCount">{{ strlen($product->meta_title ?? '') }}</span>/255 karakter
                    </div>
                    @error('meta_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="meta_description" class="form-label">Meta Description</label>
                    <textarea class="form-control @error('meta_description') is-invalid @enderror" 
                              id="meta_description" 
                              name="meta_description" 
                              rows="3"
                              placeholder="Deskripsi untuk SEO"
                              maxlength="500">{{ old('meta_description', $product->meta_description) }}</textarea>
                    <div class="character-count">
                        <span id="metaDescCount">{{ strlen($product->meta_description ?? '') }}</span>/500 karakter
                    </div>
                    @error('meta_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <!-- Sticky Action Buttons -->
    <div class="sticky-actions">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <small class="text-muted" style="font-size: 0.75rem;">
                    <i class="fas fa-info-circle me-1"></i>
                    Terakhir diubah: {{ $product->updated_at->format('d M Y H:i') }}
                </small>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.products.show', $product) }}" class="premium-btn premium-btn-outline" style="padding: 8px 16px; font-size: 0.8rem;">
                    <i class="fas fa-times" style="font-size: 0.75rem;"></i>
                    Batal
                </a>
                <button type="submit" class="premium-btn" id="submitBtn" style="padding: 8px 16px; font-size: 0.8rem;">
                    <i class="fas fa-save" style="font-size: 0.75rem;"></i>
                    Perbarui Produk
                </button>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
// Character counters
function setupCharacterCounter(inputId, countId, maxLength) {
    const input = document.getElementById(inputId);
    const counter = document.getElementById(countId);
    
    input.addEventListener('input', function() {
        const length = this.value.length;
        counter.textContent = length;
        
        if (length > maxLength * 0.9) {
            counter.style.color = '#dc3545';
        } else if (length > maxLength * 0.8) {
            counter.style.color = '#ffc107';
        } else {
            counter.style.color = '#6c757d';
        }
    });
}

setupCharacterCounter('name', 'nameCount', 255);
setupCharacterCounter('meta_title', 'metaTitleCount', 255);
setupCharacterCounter('meta_description', 'metaDescCount', 500);

// Image upload handling
const imageUploadArea = document.getElementById('imageUploadArea');
const imageInput = document.getElementById('images');
const imagePreview = document.getElementById('imagePreview');
let selectedFiles = [];

imageUploadArea.addEventListener('click', () => imageInput.click());

imageUploadArea.addEventListener('dragover', (e) => {
    e.preventDefault();
    imageUploadArea.classList.add('dragover');
});

imageUploadArea.addEventListener('dragleave', () => {
    imageUploadArea.classList.remove('dragover');
});

imageUploadArea.addEventListener('drop', (e) => {
    e.preventDefault();
    imageUploadArea.classList.remove('dragover');
    const files = Array.from(e.dataTransfer.files).filter(file => file.type.startsWith('image/'));
    handleFiles(files);
});

imageInput.addEventListener('change', (e) => {
    handleFiles(Array.from(e.target.files));
});

function handleFiles(files) {
    files.forEach(file => {
        if (file.size > 2 * 1024 * 1024) {
            alert(`File ${file.name} terlalu besar. Maksimal 2MB.`);
            return;
        }
        
        selectedFiles.push(file);
        
        const reader = new FileReader();
        reader.onload = (e) => {
            addImagePreview(e.target.result, file.name, selectedFiles.length - 1);
        };
        reader.readAsDataURL(file);
    });
    
    updateFileInput();
}

function addImagePreview(src, name, index) {
    const previewItem = document.createElement('div');
    previewItem.className = 'preview-item';
    previewItem.innerHTML = `
        <img src="${src}" alt="${name}" class="preview-image">
        <button type="button" class="remove-image" onclick="removeImage(${index})">
            <i class="fas fa-times"></i>
        </button>
        <div class="text-center mt-1" style="font-size: 0.7rem; color: #666;">
            ${name.length > 15 ? name.substring(0, 15) + '...' : name}
        </div>
    `;
    imagePreview.appendChild(previewItem);
}

function removeImage(index) {
    selectedFiles.splice(index, 1);
    updateImagePreview();
    updateFileInput();
}

function updateImagePreview() {
    imagePreview.innerHTML = '';
    selectedFiles.forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = (e) => {
            addImagePreview(e.target.result, file.name, index);
        };
        reader.readAsDataURL(file);
    });
}

function updateFileInput() {
    const dt = new DataTransfer();
    selectedFiles.forEach(file => dt.items.add(file));
    imageInput.files = dt.files;
}

// Existing image management
function deleteExistingImage(imageId) {
    if (!confirm('Yakin ingin menghapus gambar ini?')) {
        return;
    }
    
    fetch(`/admin/products/images/${imageId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById(`image-${imageId}`).remove();
            
            // Show success message
            const alert = document.createElement('div');
            alert.className = 'alert alert-success alert-dismissible fade show';
            alert.innerHTML = `
                ${data.message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            document.querySelector('.page-header').after(alert);
            
            setTimeout(() => {
                alert.remove();
            }, 3000);
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat menghapus gambar.');
    });
}

function setPrimaryImage(imageId) {
    fetch(`/admin/products/images/${imageId}/primary`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Remove all primary badges
            document.querySelectorAll('.primary-badge').forEach(badge => badge.remove());
            document.querySelectorAll('.image-action-btn.primary').forEach(btn => {
                btn.style.display = 'flex';
            });
            
            // Add primary badge to new primary image
            const imageItem = document.getElementById(`image-${imageId}`);
            const primaryBadge = document.createElement('div');
            primaryBadge.className = 'primary-badge';
            primaryBadge.textContent = 'Utama';
            imageItem.appendChild(primaryBadge);
            
            // Hide primary button for this image
            imageItem.querySelector('.image-action-btn.primary').style.display = 'none';
            
            // Show success message
            const alert = document.createElement('div');
            alert.className = 'alert alert-success alert-dismissible fade show';
            alert.innerHTML = `
                ${data.message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            document.querySelector('.page-header').after(alert);
            
            setTimeout(() => {
                alert.remove();
            }, 3000);
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat mengubah gambar utama.');
    });
}

// Form submission handling
document.getElementById('productForm').addEventListener('submit', function() {
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin" style="font-size: 0.75rem;"></i> Memperbarui...';
    submitBtn.disabled = true;
});

// Currency symbol update
document.getElementById('currency').addEventListener('change', function() {
    const priceInputGroup = document.querySelector('#price').closest('.input-group').querySelector('.input-group-text');
    const priceStrikeInputGroup = document.querySelector('#price_strike').closest('.input-group').querySelector('.input-group-text');
    
    const symbols = {
        'IDR': 'Rp',
        'USD': '$',
        'EUR': '€'
    };
    
    const symbol = symbols[this.value] || 'Rp';
    priceInputGroup.textContent = symbol;
    priceStrikeInputGroup.textContent = symbol;
});
</script>
@endpush
