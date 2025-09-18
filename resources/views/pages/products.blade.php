@extends('components.layout')

@section('title', $title)

@section('content')
<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header-content" data-aos="fade-up">
                    <h1 class="page-title">{{ $title }}</h1>
                    <p class="page-description">
                        Temukan produk insulasi industri berkualitas tinggi untuk berbagai kebutuhan aplikasi Anda
                    </p>
                    
                    <!-- Search Bar -->
                    <div class="search-section">
                        <form method="GET" action="{{ route('products') }}" class="search-form">
                            <div class="search-input-group">
                                <div class="search-input">
                                    <i class="fas fa-search"></i>
                                    <input type="text" 
                                           name="search" 
                                           placeholder="Cari produk..." 
                                           value="{{ request('search') }}"
                                           class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                    Cari
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
<section class="products-section py-5">
    <div class="container">
        <div class="row">
            <!-- Sidebar Filters -->
            <div class="col-lg-3">
                <div class="filters-sidebar" data-aos="fade-right">
                    <div class="filter-section">
                        <h3 class="filter-title">Filter Produk</h3>
                        
                        <!-- Category Filter -->
                        <div class="filter-group">
                            <h4 class="filter-label">Kategori</h4>
                            <div class="filter-options">
                                <div class="filter-option">
                                    <input type="radio" 
                                           id="all-categories" 
                                           name="category" 
                                           value="" 
                                           {{ !request('category') ? 'checked' : '' }}
                                           onchange="filterProducts()">
                                    <label for="all-categories">Semua Kategori</label>
                                </div>
                                @foreach($categories as $category)
                                <div class="filter-option">
                                    <input type="radio" 
                                           id="category-{{ $category->id }}" 
                                           name="category" 
                                           value="{{ $category->slug }}"
                                           {{ request('category') === $category->slug ? 'checked' : '' }}
                                           onchange="filterProducts()">
                                    <label for="category-{{ $category->id }}">{{ $category->name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        
                        <!-- Price Range Filter -->
                        <div class="filter-group">
                            <h4 class="filter-label">Rentang Harga</h4>
                            <div class="price-range">
                                <div class="price-input">
                                    <input type="number" 
                                           name="min_price" 
                                           placeholder="Harga minimum"
                                           value="{{ request('min_price') }}"
                                           class="form-control form-control-sm">
                                </div>
                                <span class="price-separator">-</span>
                                <div class="price-input">
                                    <input type="number" 
                                           name="max_price" 
                                           placeholder="Harga maksimum"
                                           value="{{ request('max_price') }}"
                                           class="form-control form-control-sm">
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary" onclick="filterProducts()">
                                Apply Filter
                            </button>
                        </div>
                        
                        <!-- Quick Links -->
                        <div class="filter-group">
                            <h4 class="filter-label">Tautan Cepat</h4>
                            <div class="quick-links">
                                <a href="{{ route('catalog1-page') }}" class="quick-link">
                                    <i class="fas fa-download"></i>
                                    Download Katalog
                                </a>
                                <a href="{{ route('contact') }}" class="quick-link">
                                    <i class="fas fa-phone"></i>
                                    Konsultasi Produk
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Products Content -->
            <div class="col-lg-9">
                <!-- Toolbar -->
                <div class="products-toolbar" data-aos="fade-left">
                    <div class="toolbar-left">
                        <span class="results-count">
                            Menampilkan {{ $products->count() }} dari {{ $products->total() }} produk
                        </span>
                        @if(request('search'))
                        <span class="search-info">
                            untuk pencarian "<strong>{{ request('search') }}</strong>"
                        </span>
                        @endif
                        @if(isset($category))
                        <span class="category-info">
                            dalam kategori "<strong>{{ $category->name }}</strong>"
                        </span>
                        @endif
                    </div>
                    
                    <div class="toolbar-right">
                        <div class="sort-dropdown">
                            <select name="sort" class="form-select form-select-sm" onchange="sortProducts(this.value)">
                                <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>Terbaru</option>
                                <option value="name" {{ request('sort') === 'name' ? 'selected' : '' }}>Nama A-Z</option>
                                <option value="price_low" {{ request('sort') === 'price_low' ? 'selected' : '' }}>Harga Terendah</option>
                                <option value="price_high" {{ request('sort') === 'price_high' ? 'selected' : '' }}>Harga Tertinggi</option>
                            </select>
                        </div>
                        
                        <div class="view-toggle">
                            <button type="button" class="view-btn active" data-view="grid" onclick="toggleView('grid')">
                                <i class="fas fa-th"></i>
                            </button>
                            <button type="button" class="view-btn" data-view="list" onclick="toggleView('list')">
                                <i class="fas fa-list"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Products Grid -->
                <div class="products-container">
                    @if($products->count() > 0)
                    <div class="products-grid" id="products-grid">
                        @foreach($products as $index => $product)
                        @php
                            // FIX ROUTE: detail butuh category, subcategory, product
                            $catSlug = optional($product->category)->slug ?? 'kategori';
                            $subSlug = optional($product->subcategory)->slug ?? 'umum';
                            $detailUrl = route('product.detail', [
                                'category'    => $catSlug,
                                'subcategory' => $subSlug,
                                'product'     => $product->slug
                            ]);
                        @endphp
                        <div class="product-item" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            <div class="product-card">
                                <div class="product-image">
                                    @if($product->images->count() > 0)
                                        <img src="{{ asset('storage/' . $product->images->first()->image_path) }}" 
                                             alt="{{ $product->name }}" 
                                             class="img-fluid">
                                    @else
                                        <div class="no-image">
                                            <i class="fas fa-image"></i>
                                            <span>No Image</span>
                                        </div>
                                    @endif
                                    
                                    <div class="product-overlay">
                                        <div class="overlay-actions">
                                            <a href="{{ $detailUrl }}" 
                                               class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i>
                                                Lihat Detail
                                            </a>
                                        </div>
                                    </div>
                                    
                                    @if($product->is_featured)
                                    <div class="product-badge featured">
                                        <i class="fas fa-star"></i>
                                        Featured
                                    </div>
                                    @endif
                                </div>
                                
                                <div class="product-content">
                                    <div class="product-category">
                                        <a href="{{ route('products.category', optional($product->category)->slug ?? '') }}">
                                            {{ $product->category->name ?? 'Uncategorized' }}
                                        </a>
                                    </div>
                                    
                                    <h3 class="product-title">
                                        <a href="{{ $detailUrl }}">
                                            {{ $product->name }}
                                        </a>
                                    </h3>
                                    
                                    <p class="product-description">
                                        {{ Str::limit($product->description, 120) }}
                                    </p>
                                    
                                    <div class="product-meta">
                                        @if($product->specifications)
                                        <div class="product-specs">
                                            <small class="text-muted">
                                                <i class="fas fa-cog"></i>
                                                {{ Str::limit($product->specifications, 80) }}
                                            </small>
                                        </div>
                                        @endif
                                        
                                        @if($product->price)
                                        <div class="product-price">
                                            <span class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                            @if($product->price_unit)
                                            <span class="price-unit">/ {{ $product->price_unit }}</span>
                                            @endif
                                        </div>
                                        @endif
                                    </div>
                                    
                                    <div class="product-actions">
                                        <a href="{{ $detailUrl }}" 
                                           class="btn btn-outline-primary btn-sm flex-fill">
                                            <i class="fas fa-info-circle"></i>
                                            Detail Produk
                                        </a>
                                        <a href="{{ route('contact') }}?product={{ $product->slug }}" 
                                           class="btn btn-primary btn-sm flex-fill">
                                            <i class="fas fa-phone"></i>
                                            Hubungi
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <!-- Pagination -->
                    <div class="pagination-wrapper" data-aos="fade-up">
                        {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                    
                    @else
                    <!-- No Products Found -->
                    <div class="no-products" data-aos="fade-up">
                        <div class="no-products-content">
                            <div class="no-products-icon">
                                <i class="fas fa-search"></i>
                            </div>
                            <h3>Produk tidak ditemukan</h3>
                            <p>Maaf, tidak ada produk yang sesuai dengan kriteria pencarian Anda.</p>
                            <div class="no-products-actions">
                                <a href="{{ route('products') }}" class="btn btn-primary">
                                    <i class="fas fa-arrow-left"></i>
                                    Lihat Semua Produk
                                </a>
                                <a href="{{ route('contact') }}" class="btn btn-outline-primary">
                                    <i class="fas fa-phone"></i>
                                    Hubungi Kami
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Page Header */
.page-header {
    background: linear-gradient(135deg, #7c1415 0%, #b71c1c 50%, #dc2626 100%);
    color: white;
    padding: 120px 0 80px;
    position: relative;
    overflow: hidden;
}
.page-header::before {
    content: '';
    position: absolute; top: 0; left: 0; width: 100%; height: 100%;
    background: rgba(0, 0, 0, 0.3); z-index: 1;
}
.header-content { position: relative; z-index: 2; text-align: center; }
.page-title { font-size: 3rem; font-weight: 800; margin-bottom: 1rem; }
.page-description {
    font-size: 1.2rem; opacity: 0.9; margin-bottom: 2rem;
    max-width: 600px; margin-left: auto; margin-right: auto;
}

/* Search Section */
.search-section { max-width: 600px; margin: 0 auto; }
.search-input-group { display: flex; gap: 1rem; align-items: center; }
.search-input { position: relative; flex: 1; }
.search-input i {
    position: absolute; left: 15px; top: 50%; transform: translateY(-50%);
    color: #6b7280; z-index: 3;
}
.search-input .form-control {
    padding-left: 45px; height: 50px; border-radius: 25px; border: none;
    font-size: 16px; background: rgba(255, 255, 255, 0.95); color: #374151;
}
.search-input .form-control:focus {
    background: white; box-shadow: 0 0 0 0.2rem rgba(124, 20, 21, 0.25);
}
.search-form .btn-primary {
    height: 50px; padding: 0 30px; border-radius: 25px;
    background: white; color: #7c1415; border: none; font-weight: 600;
    transition: all 0.3s ease;
}
.search-form .btn-primary:hover {
    background: #f8f9fa; transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

/* Filters Sidebar */
.filters-sidebar {
    background: white; border-radius: 15px; padding: 2rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); position: sticky; top: 100px;
}
.filter-title {
    font-size: 1.5rem; font-weight: 700; color: #1f2937; margin-bottom: 1.5rem;
    padding-bottom: 0.5rem; border-bottom: 2px solid #e5e7eb;
}
.filter-group { margin-bottom: 2rem; }
.filter-label { font-size: 1.1rem; font-weight: 600; color: #374151; margin-bottom: 1rem; }
.filter-options { display: flex; flex-direction: column; gap: 0.5rem; }
.filter-option { display: flex; align-items: center; gap: 0.5rem; }
.filter-option input[type="radio"] { width: 18px; height: 18px; accent-color: #7c1415; }
.filter-option label { font-size: 14px; color: #6b7280; cursor: pointer; margin: 0; }
.filter-option input:checked + label { color: #7c1415; font-weight: 600; }

/* Price Range */
.price-range { display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem; }
.price-input { flex: 1; }
.price-separator { color: #6b7280; font-weight: 600; }

/* Quick Links */
.quick-links { display: flex; flex-direction: column; gap: 0.5rem; }
.quick-link {
    display: flex; align-items: center; gap: 0.5rem; padding: 0.75rem;
    background: #f9fafb; border-radius: 8px; color: #374151; text-decoration: none;
    transition: all 0.3s ease; font-size: 14px;
}
.quick-link:hover { background: #7c1415; color: white; transform: translateX(5px); }

/* Products Toolbar */
.products-toolbar {
    display: flex; justify-content: space-between; align-items: center;
    background: white; padding: 1.5rem; border-radius: 15px; margin-bottom: 2rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); flex-wrap: wrap; gap: 1rem;
}
.toolbar-left { display: flex; align-items: center; gap: 0.5rem; flex-wrap: wrap; }
.results-count { font-weight: 600; color: #374151; }
.search-info, .category-info { font-size: 14px; color: #6b7280; }
.toolbar-right { display: flex; align-items: center; gap: 1rem; }
.sort-dropdown select {
    border-radius: 8px; border: 1px solid #d1d5db; padding: 0.5rem 1rem; font-size: 14px;
}
.view-toggle { display: flex; background: #f3f4f6; border-radius: 8px; overflow: hidden; }
.view-btn {
    padding: 0.5rem 1rem; border: none; background: transparent; color: #6b7280;
    cursor: pointer; transition: all 0.3s ease;
}
.view-btn.active, .view-btn:hover { background: #7c1415; color: white; }

/* Products Grid */
.products-grid {
    display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 2rem; margin-bottom: 3rem;
}
.products-grid.list-view { grid-template-columns: 1fr; }
.product-item { transition: all 0.3s ease; }
.product-card {
    background: white; border-radius: 15px; overflow: hidden;
    transition: all 0.3s ease; border: 1px solid #e5e7eb; height: 100%;
    display: flex; flex-direction: column;
}
.product-card:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(124, 20, 21, 0.15); }

/* ==== FIX IMAGE CLARITY (no crop, 4:3, glow halus) ==== */
.product-image{
    position: relative;
    aspect-ratio: 4 / 3;              /* seragam */
    background: #f8fafc;              /* kontras lembut */
    border-bottom: 1px solid #eef2f7; /* frame halus */
    display: grid; place-items: center;
    overflow: hidden;
    height: auto;                     /* override height lama */
}
.product-image img{
    width: 100%; height: 100%;
    object-fit: contain;              /* tampil utuh, no crop */
    object-position: center;
    padding: 12px;
    transition: filter .25s ease, transform .25s ease;
}
.product-card:hover .product-image img{
    transform: translateY(-1px);
    filter: drop-shadow(0 6px 14px rgba(0,0,0,.08));
}

/* Overlay jadi “badge” ringan di bawah, bukan nutup full */
.product-overlay{
    position: absolute; left: 0; right: 0; bottom: 10px; top: auto;
    height: auto; background: transparent;
    display: flex; align-items: center; justify-content: center;
    opacity: 0; transform: translateY(6px);
    transition: opacity .25s ease, transform .25s ease;
}
.product-card:hover .product-overlay{ opacity: 1; transform: translateY(0); }
.overlay-actions{ display: inline-flex; }
.overlay-actions .btn{
    border-radius: 999px; padding: .5rem .9rem;
    box-shadow: 0 10px 22px rgba(124,20,21,.22);
}

/* Badge */
.product-badge {
    position: absolute; top: 10px; right: 10px;
    padding: 0.35rem 0.7rem; border-radius: 999px;
    font-size: .75rem; font-weight: 700; color: #fff;
}
.product-badge.featured { background: linear-gradient(135deg, #fbbf24, #f59e0b); }

/* Content */
.product-content { padding: 1.5rem; flex-grow: 1; display: flex; flex-direction: column; }
.product-category { margin-bottom: 0.5rem; }
.product-category a{
    background: #e0f2fe; color: #0277bd; padding: .2rem .6rem;
    border-radius: 999px; font-size: .72rem; font-weight: 700;
    text-decoration: none; display: inline-block; transition: all .3s ease;
}
.product-category a:hover { background: #0277bd; color: white; }

.product-title { font-size: 1.25rem; font-weight: 700; margin-bottom: .4rem; line-height: 1.3; }
.product-title a{
    color: #1f2937; text-decoration: none; transition: color .3s ease;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
}
.product-title a:hover { color: #7c1415; }

.product-description{
    color: #6b7280; font-size: 14px; line-height: 1.6; margin-bottom: .75rem; flex-grow: 1;
    display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;
}

.product-meta { margin-bottom: 1rem; }
.product-specs { margin-bottom: 0.5rem; }
.product-price { margin-top: 0.5rem; }
.price { font-size: 1.25rem; font-weight: 700; color: #7c1415; }
.price-unit { font-size: 0.9rem; color: #6b7280; }

.product-actions { display: flex; gap: 0.5rem; margin-top: auto; }

/* List View Styles */
.products-grid.list-view .product-card { flex-direction: row; height: auto; }
.products-grid.list-view .product-image { width: 250px; aspect-ratio: unset; height: 200px; flex-shrink: 0; }
.products-grid.list-view .product-content { padding: 1.5rem; flex: 1; }

/* No Products */
.no-products { text-align: center; padding: 4rem 2rem; }
.no-products-icon {
    width: 100px; height: 100px; background: #f3f4f6; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 3rem; color: #9ca3af; margin: 0 auto 2rem;
}
.no-products h3 { font-size: 1.5rem; font-weight: 700; color: #374151; margin-bottom: 1rem; }
.no-products p { color: #6b7280; margin-bottom: 2rem; }
.no-products-actions { display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; }

/* No Image Placeholder */
.no-image {
    width: 100%; height: 100%; background: #f3f4f6;
    display: flex; flex-direction: column; align-items: center; justify-content: center; color: #9ca3af;
}
.no-image i { font-size: 3rem; margin-bottom: 0.5rem; }

/* Pagination */
.pagination-wrapper { display: flex; justify-content: center; margin-top: 3rem; }

/* Responsive Design */
@media (max-width: 1024px) {
    .products-grid { grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 1.5rem; }
}
@media (max-width: 768px) {
    .page-title { font-size: 2.5rem; }
    .search-input-group { flex-direction: column; }
    .search-input, .search-form .btn-primary { width: 100%; }
    .filters-sidebar { margin-bottom: 2rem; position: static; }
    .products-toolbar { flex-direction: column; align-items: stretch; text-align: center; }
    .toolbar-right { justify-content: center; }
    .products-grid { grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1rem; }
    .products-grid.list-view .product-card { flex-direction: column; }
    .products-grid.list-view .product-image { width: 100%; height: 200px; }
    .no-products-actions { flex-direction: column; align-items: center; }
}
@media (max-width: 480px) {
    .page-title { font-size: 2rem; }
    .products-grid { grid-template-columns: 1fr; }
    .product-actions { flex-direction: column; }
}
</style>

<script>
function filterProducts() {
    const form = document.createElement('form');
    form.method = 'GET';
    form.action = '{{ route("products") }}';
    
    // Get current search term
    const searchParam = new URLSearchParams(window.location.search).get('search');
    if (searchParam) {
        const searchInput = document.createElement('input');
        searchInput.type = 'hidden';
        searchInput.name = 'search';
        searchInput.value = searchParam;
        form.appendChild(searchInput);
    }
    
    // Get selected category
    const categoryRadio = document.querySelector('input[name="category"]:checked');
    if (categoryRadio && categoryRadio.value) {
        const categoryInput = document.createElement('input');
        categoryInput.type = 'hidden';
        categoryInput.name = 'category';
        categoryInput.value = categoryRadio.value;
        form.appendChild(categoryInput);
    }
    
    // Get price range
    const minPrice = document.querySelector('input[name="min_price"]').value;
    const maxPrice = document.querySelector('input[name="max_price"]').value;
    
    if (minPrice) {
        const minPriceInput = document.createElement('input');
        minPriceInput.type = 'hidden';
        minPriceInput.name = 'min_price';
        minPriceInput.value = minPrice;
        form.appendChild(minPriceInput);
    }
    
    if (maxPrice) {
        const maxPriceInput = document.createElement('input');
        maxPriceInput.type = 'hidden';
        maxPriceInput.name = 'max_price';
        maxPriceInput.value = maxPrice;
        form.appendChild(maxPriceInput);
    }
    
    // Get current sort
    const sortParam = new URLSearchParams(window.location.search).get('sort');
    if (sortParam) {
        const sortInput = document.createElement('input');
        sortInput.type = 'hidden';
        sortInput.name = 'sort';
        sortInput.value = sortParam;
        form.appendChild(sortInput);
    }
    
    document.body.appendChild(form);
    form.submit();
}

function sortProducts(sortValue) {
    const url = new URL(window.location);
    url.searchParams.set('sort', sortValue);
    window.location.href = url.toString();
}

function toggleView(viewType) {
    const grid = document.getElementById('products-grid');
    const buttons = document.querySelectorAll('.view-btn');
    
    // Remove active class from all buttons
    buttons.forEach(btn => btn.classList.remove('active'));
    
    // Add active class to clicked button
    document.querySelector(`[data-view="${viewType}"]`).classList.add('active');
    
    // Toggle grid class
    if (viewType === 'list') {
        grid.classList.add('list-view');
    } else {
        grid.classList.remove('list-view');
    }
    
    // Store preference in localStorage
    localStorage.setItem('productViewPreference', viewType);
}

// Load saved view preference
document.addEventListener('DOMContentLoaded', function() {
    const savedView = localStorage.getItem('productViewPreference');
    if (savedView) {
        toggleView(savedView);
    }
});
</script>
@endsection
