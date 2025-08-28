@extends('admin.components.layout')

@section('title', 'Produk Admin')

@push('styles')
<style>
.premium-card {
    background: white;
    border: 1px solid rgba(139, 0, 0, 0.1);
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.08);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    margin-bottom: 25px;
    z-index: 1;
    position: relative;
}

.premium-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 40px rgba(139, 0, 0, 0.18);
    border-color: rgba(139, 0, 0, 0.25);
}

.premium-btn {
    background: linear-gradient(135deg, #8b0000, #a50000);
    border: none;
    color: white;
    padding: 10px 20px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 0.85rem;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.2);
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
    transition: left 0.5s;
}

.premium-btn:hover::before {
    left: 100%;
}

.premium-btn:hover {
    background: linear-gradient(135deg, #a50000, #c50000);
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(139, 0, 0, 0.35);
    color: white;
}

.premium-btn-sm {
    padding: 8px 16px;
    font-size: 0.8rem;
    border-radius: 10px;
}

.premium-btn-outline {
    background: white;
    border: 2px solid rgba(139, 0, 0, 0.3);
    color: #8b0000;
}

.premium-btn-outline:hover {
    background: rgba(139, 0, 0, 0.1);
    border-color: #8b0000;
    color: #8b0000;
    transform: translateY(-2px);
}

.page-header {
    background: linear-gradient(135deg, #8b0000, #a50000, #c50000);
    color: white;
    padding: 30px;
    border-radius: 25px;
    margin-bottom: 30px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(139, 0, 0, 0.2);
}

.page-header::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
    animation: shimmer 3s infinite linear;
}

@keyframes shimmer {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 25px;
    padding: 20px;
}

.product-card {
    background: white;
    border: 1px solid rgba(139, 0, 0, 0.08);
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.08);
    z-index: 1;
}

.product-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 25px 50px rgba(139, 0, 0, 0.25);
    border-color: rgba(139, 0, 0, 0.2);
}

.product-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #8b0000, #a50000, #c50000);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.product-card:hover::before {
    opacity: 1;
}

.product-image {
    width: 100%;
    height: 200px;
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #8b0000;
    font-size: 2.5rem;
    position: relative;
    overflow: hidden;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.product-card:hover .product-image img {
    transform: scale(1.1);
}

.product-content {
    padding: 20px;
    position: relative;
}

.product-title {
    font-size: 1rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 8px;
    line-height: 1.3;
}

.product-subcategory {
    color: #8b0000;
    text-decoration: none;
    font-size: 0.85rem;
    font-weight: 500;
    margin-bottom: 10px;
    display: inline-block;
    padding: 4px 12px;
    background: rgba(139, 0, 0, 0.1);
    border-radius: 15px;
    transition: all 0.3s ease;
}

.product-subcategory:hover {
    background: rgba(139, 0, 0, 0.2);
    color: #8b0000;
    transform: scale(1.05);
}

.search-filter-container {
    background: white;
    border-radius: 15px;
    padding: 25px;
    margin-bottom: 25px;
    border: 1px solid rgba(139, 0, 0, 0.1);
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.08);
    z-index: 1;
    position: relative;
}

.form-control {
    border: 2px solid rgba(139, 0, 0, 0.1);
    border-radius: 8px;
    padding: 12px 16px;
    font-size: 0.9rem;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    background: white;
    z-index: 1;
    position: relative;
}

.form-control:focus {
    border-color: #8b0000;
    box-shadow: 0 0 0 4px rgba(139, 0, 0, 0.1);
    background: white;
    transform: translateY(-1px);
}

.form-select {
    border: 2px solid rgba(139, 0, 0, 0.1);
    border-radius: 8px;
    padding: 12px 16px;
    font-size: 0.9rem;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    background: white;
    z-index: 1;
    position: relative;
}

.form-select:focus {
    border-color: #8b0000;
    box-shadow: 0 0 0 4px rgba(139, 0, 0, 0.1);
    background: white;
}
    transform: scale(1.05);
}

.product-badge {
    position: absolute;
    top: 8px;
    right: 8px;
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
    padding: 3px 8px;
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 600;
}

.product-content {
    padding: 15px;
}

.product-title {
    font-size: 0.95rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 8px;
    line-height: 1.3;
}

.product-category {
    background: linear-gradient(135deg, #6c757d, #5a6268);
    color: white;
    padding: 3px 8px;
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 500;
    text-decoration: none;
    display: inline-block;
    margin-bottom: 8px;
}

.product-category:hover {
    color: white;
    transform: scale(1.05);
}

.product-price {
    background: linear-gradient(135deg, #8b0000, #a50000);
    color: white;
    padding: 6px 12px;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 700;
    display: inline-block;
    margin-bottom: 12px;
}

.product-meta {
    font-size: 0.8rem;
    color: #666;
    margin-bottom: 12px;
}

.search-filters {
    background: white;
    border-radius: 12px;
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid rgba(139, 0, 0, 0.1);
}

.filter-input {
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid rgba(139, 0, 0, 0.2);
    border-radius: 6px;
    padding: 8px 12px;
    font-size: 0.85rem;
    transition: all 0.3s ease;
}

.filter-input:focus {
    outline: none;
    border-color: #8b0000;
    box-shadow: 0 0 0 3px rgba(139, 0, 0, 0.1);
    background: rgba(255, 255, 255, 1);
}

.empty-state {
    text-align: center;
    padding: 60px 20px;
    color: #666;
}

.empty-state i {
    font-size: 4rem;
    color: #8b0000;
    margin-bottom: 20px;
}

.stats-bar {
    background: rgba(139, 0, 0, 0.05);
    border-radius: 8px;
    padding: 12px 15px;
    margin-bottom: 15px;
    border: 1px solid rgba(139, 0, 0, 0.1);
}

.view-mode-toggle {
    background: white;
    border: 1px solid rgba(139, 0, 0, 0.15);
    border-radius: 10px;
    padding: 6px;
    display: inline-flex;
    gap: 2px;
    box-shadow: 0 2px 8px rgba(139, 0, 0, 0.1);
    z-index: 1;
    position: relative;
}

.view-btn {
    background: transparent;
    border: none;
    color: #8b0000;
    padding: 10px 16px;
    border-radius: 12px;
    font-size: 0.85rem;
    font-weight: 600;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.view-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(139, 0, 0, 0.1), transparent);
    transition: left 0.5s;
}

.view-btn:hover::before {
    left: 100%;
}

.view-btn.active {
    background: linear-gradient(135deg, #8b0000, #a50000);
    color: white;
    box-shadow: 0 4px 12px rgba(139, 0, 0, 0.3);
    transform: translateY(-1px);
}

.view-btn:hover {
    background: rgba(139, 0, 0, 0.1);
    transform: translateY(-1px);
}

.product-table {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid rgba(139, 0, 0, 0.1);
    box-shadow: 0 8px 30px rgba(139, 0, 0, 0.08);
    margin-bottom: 25px;
}

.product-table th {
    background: linear-gradient(135deg, #8b0000, #a50000, #c50000);
    color: white;
    font-weight: 700;
    border: none;
    padding: 15px 16px;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    position: relative;
}

.product-table th::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
}

.product-table td {
    background: rgba(255, 255, 255, 0.05);
    border: none;
    padding: 16px;
    vertical-align: middle;
    font-size: 0.85rem;
    border-bottom: 1px solid rgba(139, 0, 0, 0.05);
    transition: all 0.3s ease;
}

.product-table tbody tr:hover td {
    background: rgba(139, 0, 0, 0.05);
    transform: scale(1.01);
}

.product-table tbody tr:hover {
    background: rgba(139, 0, 0, 0.05);
}

.product-thumb {
    width: 40px;
    height: 40px;
    border-radius: 6px;
    object-fit: cover;
    border: 2px solid rgba(139, 0, 0, 0.1);
}

/* Modal Improvements - Fix positioning and clickability */
.modal-dialog {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: calc(100vh - 1rem);
    margin: 0.5rem auto;
    z-index: 1055;
}

.modal-content {
    border-radius: 20px !important;
    border: none !important;
    box-shadow: 0 15px 50px rgba(0, 0, 0, 0.3) !important;
    background: white !important;
    position: relative;
    z-index: 1056;
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
    position: relative;
    z-index: 1057;
}

.modal-header .btn-close:hover {
    background: rgba(255, 255, 255, 0.3);
    opacity: 1;
    transform: scale(1.1);
}

.modal-body {
    padding: 25px;
    font-size: 0.95rem;
}

.modal-footer {
    padding: 20px 25px;
    border-top: 1px solid rgba(139, 0, 0, 0.1) !important;
    border-radius: 0 0 20px 20px !important;
    background: rgba(248, 249, 250, 0.5);
}

.modal-footer .premium-btn {
    padding: 12px 25px !important;
    font-size: 0.9rem !important;
    font-weight: 600;
    border-radius: 12px;
    min-width: 120px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    z-index: 1057;
    cursor: pointer;
}

.modal-footer .premium-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(139, 0, 0, 0.3);
}

.modal-footer .premium-btn-outline {
    background: rgba(108, 117, 125, 0.1) !important;
    border: 2px solid rgba(108, 117, 125, 0.3) !important;
    color: #6c757d !important;
}

.modal-footer .premium-btn-outline:hover {
    background: rgba(108, 117, 125, 0.2) !important;
    border-color: #6c757d !important;
    color: #6c757d !important;
}

/* Modal Animation */
.modal.fade .modal-dialog {
    transform: translate(0, -50px) scale(0.9);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.modal.show .modal-dialog {
    transform: translate(0, 0) scale(1);
}

/* Ensure modal is above backdrop */
.modal {
    z-index: 5000 !important;
}

/* Fix modal backdrop */
.modal-backdrop {
    background: rgba(0, 0, 0, 0.3) !important;
    z-index: 4990 !important;
}

/* Button click effect */
.premium-btn {
    position: relative;
    overflow: hidden;
    cursor: pointer;
}

.premium-btn:active {
    transform: scale(0.98);
    transition: transform 0.1s ease;
}
</style>
@endpush

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-1" style="font-size: 1.2rem;">
                    <i class="fas fa-cubes me-2" style="font-size: 1.0rem;"></i>
                    Kelola Produk
                </h5>
                <p class="mb-0 opacity-75" style="font-size: 0.85rem;">Manajemen semua produk insulasi industri Tali Rejeki</p>
            </div>
            <a href="{{ route('admin.products.create') }}" class="premium-btn" style="padding: 6px 12px; font-size: 0.8rem;">
                <i class="fas fa-plus" style="font-size: 0.75rem;"></i>
                Tambah Produk
            </a>
        </div>
    </div>
</div>

<!-- Stats Bar -->
<div class="stats-bar">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="d-flex gap-3">
                <div>
                    <strong class="text-dark" style="font-size: 0.9rem;">{{ $products->total() }}</strong>
                    <small class="text-muted d-block" style="font-size: 0.75rem;">Total Produk</small>
                </div>
                <div>
                    <strong class="text-success" style="font-size: 0.9rem;">{{ $products->where('price', '>', 0)->count() }}</strong>
                    <small class="text-muted d-block" style="font-size: 0.75rem;">Berisi Harga</small>
                </div>
                <div>
                    <strong class="text-info" style="font-size: 0.9rem;">{{ $products->whereNotNull('sku')->count() }}</strong>
                    <small class="text-muted d-block" style="font-size: 0.75rem;">Berisi SKU</small>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-end">
            <div class="view-mode-toggle">
                <button class="view-btn active" id="gridViewBtn" onclick="switchView('grid')">
                    <i class="fas fa-th"></i>
                </button>
                <button class="view-btn" id="listViewBtn" onclick="switchView('list')">
                    <i class="fas fa-list"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Search and Filters -->
<div class="search-filters">
    <div class="row align-items-center">
        <div class="col-md-4">
            <input type="text" 
                   class="form-control filter-input" 
                   placeholder="Cari produk..." 
                   id="searchInput"
                   style="font-size: 0.85rem;">
        </div>
        <div class="col-md-3">
            <select class="form-select filter-input" id="categoryFilter" style="font-size: 0.85rem;">
                <option value="">Semua Kategori</option>
                @foreach(\App\Models\Category::with('subcategories')->get() as $category)
                    <optgroup label="{{ $category->name }}">
                        @foreach($category->subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <select class="form-select filter-input" id="priceFilter" style="font-size: 0.85rem;">
                <option value="">Semua Harga</option>
                <option value="with_price">Berisi Harga</option>
                <option value="without_price">Tanpa Harga</option>
            </select>
        </div>
        <div class="col-md-2">
            <button class="premium-btn w-100" onclick="clearFilters()" style="padding: 8px 12px; font-size: 0.8rem;">
                <i class="fas fa-times" style="font-size: 0.75rem;"></i>
                Clear
            </button>
        </div>
    </div>
</div>

<div class="premium-card">
    <div class="card-body p-0">
        @if($products->count() > 0)
            <!-- Grid View -->
            <div id="gridView" class="product-grid">
                @foreach($products as $product)
                <div class="product-card" 
                     data-name="{{ strtolower($product->name) }}"
                     data-subcategory="{{ $product->subcategory_id }}"
                     data-price="{{ $product->price ? 'with_price' : 'without_price' }}">
                    
                    <div class="product-image">
                        @if($product->primaryImage)
                            <img src="{{ asset('storage/' . $product->primaryImage->image_path) }}" 
                                 alt="{{ $product->name }}">
                        @else
                            <i class="fas fa-cube"></i>
                        @endif
                        
                        @if($product->price)
                            <div class="product-badge">
                                {{ $product->currency }} {{ number_format($product->price, 0, ',', '.') }}
                            </div>
                        @endif
                    </div>

                    <div class="product-content">
                        <h6 class="product-title">{{ $product->name }}</h6>
                        
                        <a href="{{ route('admin.subcategories.show', $product->subcategory) }}" 
                           class="product-category">
                            {{ $product->subcategory->name }}
                        </a>

                        @if($product->price)
                            <div class="product-price">
                                {{ $product->currency }} {{ number_format($product->price, 0, ',', '.') }}
                                @if($product->price_strike)
                                    <small style="text-decoration: line-through; opacity: 0.7;">
                                        {{ number_format($product->price_strike, 0, ',', '.') }}
                                    </small>
                                @endif
                            </div>
                        @endif

                        <div class="product-meta">
                            <div><strong>SKU:</strong> {{ $product->sku ?: 'Tidak ada' }}</div>
                            <div><strong>Dibuat:</strong> {{ $product->created_at->format('d M Y') }}</div>
                            @if($product->brands)
                                <div><strong>Brand:</strong> {{ implode(', ', $product->brands) }}</div>
                            @endif
                        </div>

                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.products.show', $product) }}" 
                               class="premium-btn premium-btn-sm premium-btn-outline flex-fill"
                               style="padding: 4px 8px; font-size: 0.75rem;">
                                <i class="fas fa-eye" style="font-size: 0.7rem;"></i>
                                Detail
                            </a>
                            <a href="{{ route('admin.products.edit', $product) }}" 
                               class="premium-btn premium-btn-sm flex-fill"
                               style="padding: 4px 8px; font-size: 0.75rem;">
                                <i class="fas fa-edit" style="font-size: 0.7rem;"></i>
                                Edit
                            </a>
                            <button type="button" 
                                    class="premium-btn premium-btn-sm"
                                    style="background: linear-gradient(135deg, #dc3545, #c82333); padding: 4px 8px; font-size: 0.75rem;"
                                    onclick="deleteProduct({{ $product->id }})"
                                    title="Hapus">
                                <i class="fas fa-trash" style="font-size: 0.7rem;"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- List View (Hidden by default) -->
            <div id="listView" style="display: none;">
                <div class="table-responsive">
                    <table class="table product-table mb-0">
                        <thead>
                            <tr>
                                <th width="80" style="font-size: 0.8rem;">Gambar</th>
                                <th style="font-size: 0.8rem;">Nama Produk</th>
                                <th style="font-size: 0.8rem;">Sub Kategori</th>
                                <th style="font-size: 0.8rem;">SKU</th>
                                <th style="font-size: 0.8rem;">Harga</th>
                                <th style="font-size: 0.8rem;">Brand</th>
                                <th width="120" style="font-size: 0.8rem;">Tanggal</th>
                                <th width="120" class="text-center" style="font-size: 0.8rem;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr data-name="{{ strtolower($product->name) }}"
                                data-subcategory="{{ $product->subcategory_id }}"
                                data-price="{{ $product->price ? 'with_price' : 'without_price' }}">
                                <td>
                                    @if($product->primaryImage)
                                        <img src="{{ asset('storage/' . $product->primaryImage->image_path) }}" 
                                             alt="{{ $product->name }}" 
                                             class="product-thumb">
                                    @else
                                        <div class="product-thumb d-flex align-items-center justify-content-center bg-light">
                                            <i class="fas fa-cube text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-bold text-dark" style="font-size: 0.85rem;">{{ $product->name }}</div>
                                    @if($product->brands)
                                        <small class="text-muted" style="font-size: 0.75rem;">{{ implode(', ', array_slice($product->brands, 0, 2)) }}</small>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.subcategories.show', $product->subcategory) }}" 
                                       class="product-category"
                                       style="font-size: 0.85rem;">
                                        {{ $product->subcategory->name }}
                                    </a>
                                </td>
                                <td>
                                    <code class="text-muted" style="font-size: 0.75rem;">{{ $product->sku ?: '-' }}</code>
                                </td>
                                <td>
                                    @if($product->price)
                                        <div class="product-price" style="padding: 3px 8px; font-size: 0.75rem;">
                                            {{ $product->currency }} {{ number_format($product->price, 0, ',', '.') }}
                                        </div>
                                    @else
                                        <span class="text-muted" style="font-size: 0.8rem;">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($product->brands)
                                        <span class="text-muted" style="font-size: 0.8rem;">{{ implode(', ', array_slice($product->brands, 0, 2)) }}</span>
                                    @else
                                        <span class="text-muted" style="font-size: 0.8rem;">-</span>
                                    @endif
                                </td>
                                <td>
                                    <small class="text-muted" style="font-size: 0.75rem;">{{ $product->created_at->format('d M Y') }}</small>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.products.show', $product) }}" 
                                           class="premium-btn premium-btn-sm premium-btn-outline"
                                           title="Detail"
                                           style="padding: 4px 8px; font-size: 0.7rem;">
                                            <i class="fas fa-eye" style="font-size: 0.65rem;"></i>
                                        </a>
                                        <a href="{{ route('admin.products.edit', $product) }}" 
                                           class="premium-btn premium-btn-sm"
                                           title="Edit"
                                           style="padding: 4px 8px; font-size: 0.7rem;">
                                            <i class="fas fa-edit" style="font-size: 0.65rem;"></i>
                                        </a>
                                        <button type="button" 
                                                class="premium-btn premium-btn-sm"
                                                style="background: linear-gradient(135deg, #dc3545, #c82333); padding: 4px 8px; font-size: 0.7rem;"
                                                onclick="deleteProduct({{ $product->id }})"
                                                title="Hapus">
                                            <i class="fas fa-trash" style="font-size: 0.65rem;"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            @if($products->hasPages())
                <div class="p-3 border-top" style="border-color: rgba(139, 0, 0, 0.1) !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-muted" style="font-size: 0.8rem;">
                            Menampilkan {{ $products->firstItem() }} sampai {{ $products->lastItem() }} 
                            dari {{ $products->total() }} data
                        </div>
                        <div>
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            @endif
        @else
            <div class="empty-state">
                <i class="fas fa-cube" style="font-size: 3rem;"></i>
                <h4 style="font-size: 1.2rem;">Belum Ada Produk</h4>
                <p class="mb-4" style="font-size: 0.9rem;">Mulai dengan menambahkan produk pertama Anda.</p>
                <a href="{{ route('admin.products.create') }}" class="premium-btn" style="padding: 8px 16px; font-size: 0.85rem;">
                    <i class="fas fa-plus" style="font-size: 0.75rem;"></i>
                    Tambah Produk Pertama
                </a>
            </div>
        @endif
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Konfirmasi Hapus Produk
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <i class="fas fa-trash-alt text-danger" style="font-size: 3rem; opacity: 0.7;"></i>
                </div>
                
                <p class="text-center mb-3" style="font-size: 1rem; font-weight: 500;">
                    Apakah Anda yakin ingin menghapus produk ini?
                </p>
                
                <div class="text-warning d-flex align-items-center">
                    <i class="fas fa-info-circle me-2"></i>
                    <div>
                        <strong>Peringatan:</strong> Tindakan ini akan menghapus semua gambar produk dan tidak dapat dibatalkan!
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="premium-btn premium-btn-outline" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>
                    Batal
                </button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="premium-btn" style="background: linear-gradient(135deg, #dc3545, #c82333);">
                        <i class="fas fa-trash me-1"></i>
                        Hapus Produk
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// View mode switching
function switchView(mode) {
    const gridView = document.getElementById('gridView');
    const listView = document.getElementById('listView');
    const gridBtn = document.getElementById('gridViewBtn');
    const listBtn = document.getElementById('listViewBtn');
    
    if (mode === 'grid') {
        gridView.style.display = 'grid';
        listView.style.display = 'none';
        gridBtn.classList.add('active');
        listBtn.classList.remove('active');
    } else {
        gridView.style.display = 'none';
        listView.style.display = 'block';
        gridBtn.classList.remove('active');
        listBtn.classList.add('active');
    }
    
    localStorage.setItem('productViewMode', mode);
}

// Load saved view mode
document.addEventListener('DOMContentLoaded', function() {
    const savedMode = localStorage.getItem('productViewMode') || 'grid';
    switchView(savedMode);
});

// Filter functionality
function filterProducts() {
    const searchValue = document.getElementById('searchInput').value.toLowerCase();
    const categoryFilter = document.getElementById('categoryFilter').value;
    const priceFilter = document.getElementById('priceFilter').value;
    
    const products = document.querySelectorAll('[data-name]');
    
    products.forEach(product => {
        const name = product.dataset.name;
        const subcategory = product.dataset.subcategory;
        const price = product.dataset.price;
        
        const matchesSearch = name.includes(searchValue);
        const matchesCategory = !categoryFilter || subcategory === categoryFilter;
        const matchesPrice = !priceFilter || price === priceFilter;
        
        if (matchesSearch && matchesCategory && matchesPrice) {
            product.style.display = '';
        } else {
            product.style.display = 'none';
        }
    });
}

// Setup filter event listeners
document.getElementById('searchInput').addEventListener('keyup', filterProducts);
document.getElementById('categoryFilter').addEventListener('change', filterProducts);
document.getElementById('priceFilter').addEventListener('change', filterProducts);

// Clear filters
function clearFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('categoryFilter').value = '';
    document.getElementById('priceFilter').value = '';
    filterProducts();
}

// Delete product function with proper modal handling
function deleteProduct(productId) {
    const deleteForm = document.getElementById('deleteForm');
    deleteForm.action = `/admin/products/${productId}`;
    
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'), {
        backdrop: 'static',
        keyboard: true,
        focus: true
    });
    
    deleteModal.show();
    
    // Focus on cancel button for accessibility
    deleteModal._element.addEventListener('shown.bs.modal', function() {
        const cancelBtn = this.querySelector('.premium-btn-outline');
        if (cancelBtn) cancelBtn.focus();
    });
}

// Enhanced form submission handling
document.addEventListener('DOMContentLoaded', function() {
    const deleteForm = document.querySelector('#deleteModal form');
    if (deleteForm) {
        deleteForm.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            const cancelBtn = document.querySelector('#deleteModal .premium-btn-outline');
            
            // Prevent double submission
            if (submitBtn.disabled) {
                e.preventDefault();
                return false;
            }
            
            // Show loading state
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Menghapus...';
            submitBtn.disabled = true;
            submitBtn.style.opacity = '0.7';
            
            // Disable cancel button
            if (cancelBtn) {
                cancelBtn.disabled = true;
                cancelBtn.style.opacity = '0.6';
            }
            
            // Add timeout as safety measure
            setTimeout(function() {
                if (submitBtn.disabled) {
                    submitBtn.innerHTML = '<i class="fas fa-exclamation-triangle me-1"></i> Coba Lagi';
                    submitBtn.disabled = false;
                    submitBtn.style.opacity = '1';
                    if (cancelBtn) {
                        cancelBtn.disabled = false;
                        cancelBtn.style.opacity = '1';
                    }
                }
            }, 10000);
        });
    }
    
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
            ripple.style.position = 'absolute';
            ripple.style.borderRadius = '50%';
            ripple.style.background = 'rgba(255, 255, 255, 0.3)';
            ripple.style.animation = 'ripple-animation 0.6s ease-out';
            ripple.style.pointerEvents = 'none';
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
    
    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const openModal = document.querySelector('.modal.show');
            if (openModal) {
                const modalInstance = bootstrap.Modal.getInstance(openModal);
                if (modalInstance) modalInstance.hide();
            }
        }
    });
});
</script>

<style>
/* Ripple effect styles */
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

/* Loading spinner */
.fa-spinner {
    animation: spin 1s linear infinite !important;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
@endpush
