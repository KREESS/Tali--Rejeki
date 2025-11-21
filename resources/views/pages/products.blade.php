@extends('components.layout')

@section('title', $title)

@section('content')
@php
    // Helper function untuk memproses path gambar
    $imgPublic = function($path) {
        if (!$path) return null;
        $normalized = ltrim($path, '/');
        
        // Jika sudah URL lengkap, kembalikan apa adanya
        if (\Illuminate\Support\Str::startsWith($normalized, ['http://', 'https://'])) {
            return $normalized;
        }
        
        // Proses berbagai format path produk
        if (\Illuminate\Support\Str::startsWith($normalized, 'img/')) {
            return asset($normalized);
        }
        
        if (\Illuminate\Support\Str::startsWith($normalized, 'products/')) {
            return asset(\Illuminate\Support\Str::replaceFirst('products/', 'img/products/', $normalized));
        }
        
        if (\Illuminate\Support\Str::startsWith($normalized, 'product_images/')) {
            return asset(\Illuminate\Support\Str::replaceFirst('product_images/', 'img/products/', $normalized));
        }
        
        if (\Illuminate\Support\Str::startsWith($normalized, 'public/product_images/')) {
            return asset(\Illuminate\Support\Str::replaceFirst('public/product_images/', 'img/products/', $normalized));
        }
        
        if (\Illuminate\Support\Str::startsWith($normalized, 'storage/')) {
            return asset('img/products/' . basename($normalized));
        }
        
        // Default ke img/products
        return asset('img/products/' . $normalized);
    };

    // Deteksi parameter kategori dan subkategori
    $paramCategory = isset($category) ? $category->slug : request('category');
    $paramSub = isset($subcategory) ? $subcategory->slug : request('subcategory');

    // Ambil kategori yang dipilih untuk deskripsi
    $selectedCategory = optional(collect($categories)->firstWhere('slug', $paramCategory));
    $heroDescription = trim((string)($selectedCategory->meta_description ?? ''));
    if ($heroDescription === '') {
        $heroDescription = 'Temukan produk insulasi industri berkualitas tinggi untuk berbagai kebutuhan aplikasi Anda';
    }

    // Kumpulan subkategori
    $allSubs = isset($subcategories)
        ? $subcategories
        : collect($categories)->flatMap(fn($c) => $c->subcategories ?? collect());

    $subsByCategory = $paramCategory
        ? $allSubs->filter(fn($s) => optional($s->category)->slug === $paramCategory)
        : collect();
@endphp

{{-- Header --}}
<section class="simple-header">
    <div class="container-fluid container-custom">
        <nav class="breadcrumb-nav" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products') }}">Produk</a></li>
            </ol>
        </nav>

        <div class="simple-head">
            <h1 class="page-title">{{ $title }}</h1>
            <p class="page-description">{{ $heroDescription }}</p>
        </div>
    </div>
</section>

{{-- Products Section --}}
<section class="products-section py-3">
    <div class="container-fluid container-custom">
        <div class="row g-2">
            {{-- Sidebar --}}
            <div class="col-lg-3">
                <aside class="filters-sidebar">
                    <h3 class="filter-title">Kategori</h3>
                    <nav class="nav-card">
                        <ul class="nav-list">
                            @if(!$paramCategory)
                                {{-- Daftar kategori --}}
                                @foreach($categories as $cat)
                                    <li>
                                        <a class="nav-link-item {{ $paramCategory===$cat->slug ? 'active' : '' }}"
                                           href="{{ route('products.category', $cat->slug) }}">
                                            <span class="label">{{ $cat->name }}</span>
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    </li>
                                @endforeach
                            @else
                                {{-- Mode kategori dipilih --}}
                                <li class="nav-back">
                                    <a class="nav-link-item" href="{{ route('products') }}">
                                        <i class="fas fa-arrow-left"></i>
                                        <span class="label">Semua Kategori</span>
                                    </a>
                                </li>

                                @forelse($subsByCategory as $sub)
                                    <li>
                                        <a class="nav-link-item {{ $paramSub===$sub->slug ? 'active' : '' }}"
                                           href="{{ route('products.subcategory', ['category'=>$paramCategory, 'subcategory'=>$sub->slug]) }}">
                                            <span class="label">{{ $sub->name }}</span>
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    </li>
                                @empty
                                    <li class="nav-empty">Belum ada subkategori.</li>
                                @endforelse
                            @endif
                        </ul>
                    </nav>
                </aside>
            </div>

            {{-- Content --}}
            <div class="col-lg-9">
                @php
                    $isSubMode = !empty($paramSub);
                    $subs = $paramCategory ? $subsByCategory : $allSubs;
                    if ($paramCategory) {
                        $subs = $subs->filter(fn($s) => optional($s->category)->slug === $paramCategory);
                    }
                @endphp

                {{-- Toolbar --}}
                <div class="products-toolbar">
                    <div class="toolbar-left">
                        @if(!$isSubMode)
                            <span class="results-count">Subkategori: {{ $subs->count() }}</span>
                        @else
                            <span class="results-count">
                                Produk: {{ $products->count() }} / {{ $products->total() }}
                            </span>
                            @if(request('search'))
                                <span class="search-info">
                                    untuk "<strong>{{ request('search') }}</strong>"
                                </span>
                            @endif
                        @endif
                    </div>

                    <div class="toolbar-right">
                        @if($isSubMode)
                            <div class="sort-dropdown">
                                <select name="sort" class="form-select form-select-sm" onchange="sortProducts(this.value)">
                                    <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}">Terbaru</option>
                                    <option value="name" {{ request('sort') === 'name' ? 'selected' : '' }}">Nama A–Z</option>
                                </select>
                            </div>

                            <div class="view-toggle">
                                <button type="button" class="view-btn" data-view="grid" onclick="toggleView('grid')" title="Grid">
                                    <i class="fas fa-th"></i>
                                </button>
                                <button type="button" class="view-btn active" data-view="list" onclick="toggleView('list')" title="List">
                                    <i class="fas fa-list"></i>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Grid --}}
                <div class="products-container">
                    @if(!$isSubMode)
                        {{-- Subkategori Grid --}}
                        @if($subs->count() > 0)
                            <div class="products-grid" id="subcategories-grid">
                                @foreach($subs as $index => $sub)
                                    @php
                                        $rawThumb = $sub->image_path
                                            ?? data_get($sub, 'products.0.images.0.image_path')
                                            ?? null;
                                        $thumb = $imgPublic($rawThumb);

                                        $subUrl = route('products.subcategory', [
                                            'category'    => optional($sub->category)->slug ?? $paramCategory,
                                            'subcategory' => $sub->slug
                                        ]);

                                        $prodCount = $sub->products_count
                                            ?? (isset($sub->products) ? $sub->products->count() : null);
                                    @endphp
                                    <div class="product-item" data-aos="fade-up" data-aos-delay="{{ ($index % 4) * 100 }}">
                                        <a href="{{ $subUrl }}" class="product-card-link">
                                            <div class="product-card">
                                                <div class="product-image">
                                                    @if($thumb)
                                                        <img src="{{ $thumb }}" alt="{{ $sub->name }}" class="img-fluid" loading="lazy">
                                                    @else
                                                        <div class="no-image">
                                                            <i class="fas fa-layer-group"></i>
                                                            <span>{{ $sub->name }}</span>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="product-content">
                                                    <h3 class="product-title">{{ $sub->name }}</h3>

                                                    <p class="product-description">
                                                        {{ Str::limit($sub->meta_description ?? 'Eksplor beragam produk pada subkategori ini.', 120) }}
                                                    </p>

                                                    <div class="product-count">
                                                        @if(!is_null($prodCount))
                                                            {{ $prodCount }} Produk
                                                        @else
                                                            Lihat Produk
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="no-products" data-aos="fade-up">
                                <div class="no-products-content">
                                    <div class="no-products-icon">
                                        <i class="fas fa-folder-open"></i>
                                    </div>
                                    <h3>Subkategori tidak ditemukan</h3>
                                    <p>Silakan pilih kategori lain atau lihat semua produk.</p>
                                    <div class="no-products-actions">
                                        <a href="{{ route('products') }}" class="btn btn-primary">
                                            <i class="fas fa-arrow-left"></i> Lihat Semua
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        {{-- Product List --}}
                        @if($products->count() > 0)
                            <div class="products-grid list-view" id="products-grid" data-default-view="list">
                                @foreach($products as $index => $product)
                                    @php
                                        $catSlug = optional(optional($product->subcategory)->category)->slug
                                                   ?? optional($product->category)->slug
                                                   ?? 'kategori';
                                        $subSlug = optional($product->subcategory)->slug ?? 'umum';

                                        $detailUrl = route('product.detail', [
                                            'category'    => $catSlug,
                                            'subcategory' => $subSlug,
                                            'product'     => $product->slug
                                        ]);

                                        $rawImg = data_get($product, 'images.0.image_path');
                                        $imgUrl = $imgPublic($rawImg);

                                        // Proses brands
                                        $brandList = [];
                                        if (is_array($product->brands)) {
                                            $brandList = array_filter(array_map('trim', $product->brands));
                                        } elseif (!empty($product->brands)) {
                                            $brandList = array_filter(array_map('trim', preg_split('/[;,|]/', $product->brands)));
                                        }

                                        // Kumpulkan atribut
                                        $attrs = collect(range(1,10))
                                            ->map(fn($i) => $product->{'attr'.$i} ?? null)
                                            ->filter()
                                            ->take(10);
                                    @endphp

                                    <div class="product-item" data-aos="fade-up" data-aos-delay="{{ ($index % 4) * 100 }}">
                                        <a href="{{ $detailUrl }}" class="product-card-link">
                                            <div class="product-card">
                                                <div class="product-image">
                                                    @if($imgUrl)
                                                        <img src="{{ $imgUrl }}" alt="{{ $product->name }}" class="img-fluid" loading="lazy">
                                                    @else
                                                        <div class="no-image">
                                                            <i class="fas fa-image"></i>
                                                            <span>No Image</span>
                                                        </div>
                                                    @endif

                                                    @if(!empty($product->is_featured))
                                                        <div class="product-badge featured" title="Featured">
                                                            <i class="fas fa-star"></i> Featured
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="product-content">
                                                    <h3 class="product-title">{{ $product->name }}</h3>

                                                    <div class="small text-muted mb-1 sku-line">
                                                        @if($product->sku)
                                                            <span class="me-2"><i class="fas fa-barcode"></i> SKU: {{ $product->sku }}</span>
                                                        @endif
                                                        @if(count($brandList))
                                                            <span><i class="fas fa-tags"></i>
                                                                @foreach(array_slice($brandList,0,3) as $b)
                                                                    <span class="badge rounded-pill bg-light text-dark border">{{ $b }}</span>
                                                                @endforeach
                                                                @if(count($brandList) > 3)
                                                                    <span class="badge rounded-pill bg-light text-dark border">+{{ count($brandList)-3 }}</span>
                                                                @endif
                                                            </span>
                                                        @endif
                                                    </div>

                                                    {{-- Atribut Chips --}}
                                                    @if($attrs->count())
                                                        <div class="mb-2 attrs-wrap">
                                                            @foreach($attrs as $a)
                                                                <span class="badge rounded-pill attr-chip">
                                                                    {{ Str::limit($a, 48) }}
                                                                </span>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>

                            <div class="pagination-wrapper">
                                {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
                            </div>
                        @else
                            <div class="no-products">
                                <div class="no-products-content">
                                    <div class="no-products-icon">
                                        <i class="fas fa-search"></i>
                                    </div>
                                    <h3>Produk tidak ditemukan</h3>
                                    <p>Coba ubah pilihan subkategori.</p>
                                    <div class="no-products-actions">
                                        <a href="{{ route('products.category', $paramCategory) }}" class="btn btn-primary">
                                            <i class="fas fa-arrow-left"></i> Kembali ke Subkategori
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* ========================================
   THEME TOKENS — DARKER RED THEME
   ======================================== */
/* Light Theme */
:root, html[data-theme="light"], html[data-bs-theme="light"], body[data-theme="light"] {
  --brand-1: #991b1b;   /* Red 800 - Darker Red */
  --brand-2: #7f1d1d;   /* Red 900 - Darkest Red */
  --brand-3: #fca5a5;   /* Red 400 - Lighter shade for accents */
  --accent: #ef4444;    /* Red 500 - Medium red for highlights */
  --ink: #111827;
  --muted: #6b7280;
  --line: #e5e7eb;
  --line-2: #f1f5f9;
  --page: #fef2f2;      /* very light red */
  --card: #ffffff;
  --soft: #fff1f1;
  --soft-2: #fde8e8;
  --shadow-1: 0 2px 6px rgba(0,0,0,.04);
  --shadow-2: 0 4px 12px rgba(127,29,29,.15);
  --ring: 0 0 0 3px rgba(153,27,27,.25);
}

/* Dark Theme */
[data-theme="dark"], html.dark, body.dark, html[data-bs-theme="dark"], body[data-bs-theme="dark"] {
  --brand-1: #dc2626;   /* Red 600 - Darker for dark theme */
  --brand-2: #b91c1c;   /* Red 700 - Darkest for dark theme */
  --brand-3: #f87171;   /* Red 400 - Lighter shade for accents */
  --accent: #fca5a5;    /* Red 400 - Medium red for highlights */
  --ink: #e5e7eb;
  --muted: #cbd5e1;
  --line: #3b3f4a;
  --line-2: #2a2f3a;
  --page: #0f0b0b;      /* deep warm dark */
  --card: #161213;
  --soft: #1d1718;
  --soft-2: #241c1d;
  --shadow-1: 0 2px 6px rgba(0,0,0,.4);
  --shadow-2: 0 4px 12px rgba(0,0,0,.5);
  --ring: 0 0 0 3px rgba(220,38,38,.25);
}

/* Base Styles */
body {
  color: var(--ink);
  transition: color .25s;
}

/* Container - REDUCED MARGINS */
.container-custom {
  padding-left: 0.25rem !important;  /* Reduced from 0.5rem */
  padding-right: 0.25rem !important; /* Reduced from 0.5rem */
  max-width: 1400px;
  margin-left: auto;
  margin-right: auto;
}

@media (min-width: 768px) {
  .container-custom {
    padding-left: 0.5rem !important;  /* Reduced from 1rem */
    padding-right: 0.5rem !important; /* Reduced from 1rem */
  }
}

@media (min-width: 992px) {
  .container-custom {
    padding-left: 0.75rem !important;  /* Reduced from 1.5rem */
    padding-right: 0.75rem !important; /* Reduced from 1.5rem */
  }
}

@media (min-width: 1400px) {
  .container-custom {
    padding-left: 1rem !important;  /* Reduced from 2rem */
    padding-right: 1rem !important; /* Reduced from 2rem */
  }
}

/* Focus Ring */
:where(a, button, select, input) {
  outline: none;
}

:where(a, button, [role="button"], .btn, select, input):focus-visible {
  box-shadow: var(--ring);
  border-radius: 6px;
}

/* Header */
.simple-header {
  padding: 15px 0 8px;
}

.breadcrumb {
  background: transparent;
  margin: 0 0 5px;
  padding: 0;
}

.breadcrumb .breadcrumb-item a {
  color: var(--brand-2);
  text-decoration: none;
  font-weight: 600;
}

.breadcrumb .breadcrumb-item + .breadcrumb-item::before {
  color: var(--muted);
}

.page-title {
  font-size: clamp(1.5rem, 1.1rem + 1vw, 2rem);
  font-weight: 700;
  letter-spacing: -0.02em;
  margin: 0 0 0.2rem;
}

.page-description {
  margin: 0;
  color: var(--muted);
  font-size: 0.95rem;
}

/* Sidebar */
.filters-sidebar {
  border-radius: 10px;
  padding: 0.8rem;
  margin-bottom: 0.8rem;
  box-shadow: var(--shadow-1);
  border: 1px solid var(--line);
}

.filter-title {
  font-size: 1rem;
  font-weight: 600;
  margin: 0 0 0.6rem;
  color: var(--ink);
}

.nav-card {
  background: transparent;
}

.nav-list {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
  flex-direction: column;
  gap: 0.15rem;
}

.nav-link-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 0.5rem;
  padding: 0.5rem 0.65rem;
  border-radius: 6px;
  text-decoration: none;
  color: var(--ink);
  background: transparent;
  border: 1px solid transparent;
  transition: 0.18s ease;
}

.nav-link-item:hover {
  background: var(--soft);
  transform: translateX(2px);
}

.nav-link-item.active {
  background: var(--brand-1);
  color: #fff;
}

.nav-link-item .label {
  font-weight: 600;
  font-size: 0.9rem;
}

.nav-back .nav-link-item {
  background: var(--soft-2);
}

.nav-empty {
  padding: 0.5rem 0.65rem;
  color: var(--muted);
  font-size: 0.9rem;
}

/* Toolbar */
.products-toolbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0.5rem 0.65rem;
  border-radius: 10px;
  margin-bottom: 0.8rem;
  box-shadow: var(--shadow-1);
  border: 1px solid var(--line);
}

.toolbar-left {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  flex-wrap: wrap;
}

.results-count {
  font-weight: 600;
  color: var(--ink);
  font-size: 0.9rem;
}

.search-info {
  font-size: 0.85rem;
  color: var(--muted);
}

.toolbar-right {
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.sort-dropdown select {
  border-radius: 6px;
  border: 1px solid var(--line);
  padding: 0.35rem 0.55rem;
  font-size: 0.85rem;
  color: var(--ink);
}

.sort-dropdown select:focus {
  box-shadow: var(--ring);
}

.view-toggle {
  display: flex;
  background: var(--soft);
  border-radius: 6px;
  overflow: hidden;
}

.view-btn {
  padding: 0.35rem 0.55rem;
  border: none;
  background: transparent;
  color: #6b7280;
  cursor: pointer;
  transition: 0.18s;
  font-size: 0.85rem;
}

.view-btn.active,
.view-btn:hover {
  background: var(--brand-1);
  color: #fff;
}

/* Grid & Cards - FIXED HEIGHT AND ALIGNMENT */
.products-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 1rem;
  margin-bottom: 1rem;
}

/* Ensure all cards in the same row have the same height */
.products-grid {
  grid-auto-rows: 1fr;
}

.products-grid.list-view {
  grid-template-columns: 1fr;
  grid-auto-rows: auto;
}

.product-item {
  display: flex;
  height: 100%;
}

.product-card-link {
  display: flex;
  width: 100%;
  text-decoration: none;
  color: inherit;
}

.product-card {
  border: 1px solid var(--line);
  border-radius: 10px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  width: 100%;
  height: 100%;
  min-height: 380px; /* Fixed minimum height for consistency */
  box-shadow: var(--shadow-1);
  position: relative;
  transition: all 0.2s ease;
}

.product-card:hover {
  transform: translateY(-3px);
  box-shadow: var(--shadow-2);
  border-color: var(--brand-3);
}

/* Image - SQUARE ASPECT RATIO WITH WHITE BACKGROUND */
.product-image {
  position: relative;
  aspect-ratio: 1/1; /* Square images */
  background: #ffffff !important; /* Changed to white */
  border-bottom: 1px solid var(--line-2);
  display: grid;
  place-items: center;
  overflow: hidden;
  flex-shrink: 0; /* Prevent image container from shrinking */
}

.products-grid.list-view .product-image {
  width: 220px;
  aspect-ratio: 1/1; /* Square images in list view */
  height: 220px; /* Fixed height for list view */
  border-bottom: none;
  border-right: 1px solid var(--line-2);
  flex-shrink: 0;
}

.product-image img {
  width: 100%;
  height: 100%;
  object-fit: contain;
  padding: 8px;
  transition: transform 0.2s ease;
}

.product-card:hover .product-image img {
  transform: scale(1.05);
}

/* List Layout */
.products-grid.list-view .product-card {
  flex-direction: row;
  height: auto;
  min-height: 220px; /* Consistent height for list view */
}

.products-grid.list-view .product-content {
  padding: 1rem;
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
}

/* Badge */
.product-badge {
  position: absolute;
  top: 8px;
  right: 8px;
  padding: 0.25rem 0.5rem;
  border-radius: 999px;
  font-size: 0.7rem;
  font-weight: 600;
  color: #fff;
  z-index: 2;
}

.product-badge.featured {
  background: var(--brand-1);
}

/* Content - FIXED LAYOUT */
.product-content {
  padding: 1rem;
  display: flex;
  flex-direction: column;
  flex: 1;
  min-height: 0; /* Allow content to shrink if needed */
}

.product-title {
  font-size: 1rem;
  font-weight: 600;
  margin-bottom: 0.5rem;
  line-height: 1.3;
  color: var(--ink);
  transition: color 0.2s ease;
  /* Fixed height for title consistency */
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
  min-height: 2.6em; /* 2 lines */
}

.product-card:hover .product-title {
  color: var(--brand-1);
}

.product-description {
  color: var(--muted);
  font-size: 0.85rem;
  line-height: 1.4;
  margin-bottom: 0.75rem;
  flex-grow: 1;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
  min-height: 3.6em; /* 3 lines */
}

.product-count {
  color: var(--brand-1);
  font-weight: 600;
  font-size: 0.85rem;
  display: flex;
  align-items: center;
  margin-top: auto;
  padding-top: 0.5rem;
}

/* SKU and Brands - FIXED LAYOUT */
.sku-line {
  margin-bottom: 0.5rem !important;
  font-size: 0.8rem;
  line-height: 1.3;
  min-height: 1.3em;
}

/* Attributes */
.attrs-wrap {
  display: flex;
  gap: 0.25rem;
  flex-wrap: wrap;
  margin-bottom: 0.75rem;
  max-height: 60px; /* Limit height for attributes */
  overflow: hidden;
}

.attr-chip {
  background: var(--soft);
  border: 1px solid var(--line);
  color: #000 !important;
  font-weight: 600;
  padding: 0.2rem 0.4rem;
  font-size: 0.7rem;
}

/* Buttons - Override Bootstrap with higher specificity */
.btn,
.btn.btn-primary,
a.btn,
button.btn {
  font-weight: 600 !important;
  border-width: 0 !important;
  transition: 0.15s ease !important;
  border-radius: 6px !important;
  font-size: 0.85rem !important;
  text-decoration: none !important;
  box-shadow: none !important;
}

/* Primary Button - Force Red Theme */
.btn.btn-primary,
a.btn.btn-primary,
button.btn.btn-primary {
  background: var(--brand-1) !important;
  color: #fff !important;
  border: none !important;
}

.btn.btn-primary:hover,
.btn.btn-primary:focus,
.btn.btn-primary:active,
.btn.btn-primary:not(:disabled):not(.disabled):active,
a.btn.btn-primary:hover,
a.btn.btn-primary:focus,
a.btn.btn-primary:active,
button.btn.btn-primary:hover,
button.btn.btn-primary:focus,
button.btn.btn-primary:active {
  background: var(--brand-2) !important;
  color: #fff !important;
  transform: translateY(-1px) !important;
  border: none !important;
  box-shadow: none !important;
}

.btn.btn-primary:active,
.btn.btn-primary:not(:disabled):not(.disabled):active,
a.btn.btn-primary:active,
button.btn.btn-primary:active {
  background: var(--brand-2) !important;
  transform: translateY(0) !important;
}

/* Remove all blue colors from buttons */
.btn:focus,
.btn-primary:focus,
.btn:not(:disabled):not(.disabled):focus,
.btn-primary:not(:disabled):not(.disabled):focus {
  box-shadow: var(--ring) !important;
  color: #fff !important;
}

/* Empty State */
.no-products {
  text-align: center;
  padding: 2rem 1rem;
  border: 1px dashed var(--line);
  border-radius: 10px;
}

.no-products-icon {
  width: 60px;
  height: 60px;
  background: var(--soft);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.3rem;
  color: #9ca3af;
  margin: 0 auto 0.8rem;
}

/* Pagination - Override Bootstrap */
.pagination-wrapper {
  display: flex;
  justify-content: center;
  margin-top: 1.5rem;
  padding: 1rem 0;
}

.pagination {
  display: flex;
  list-style: none;
  padding: 0;
  margin: 0;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: var(--shadow-1);
}

.pagination .page-item {
  margin: 0 2px;
}

.pagination .page-link,
.pagination .page-link:hover,
.pagination .page-link:focus,
.pagination .page-link:active {
  display: flex;
  align-items: center;
  justify-content: center;
  min-width: 42px;
  height: 42px;
  padding: 0 12px;
  color: var(--brand-1) !important;
  background-color: var(--card) !important;
  border: 2px solid var(--line) !important;
  border-radius: 6px !important;
  font-weight: 600;
  font-size: 0.9rem;
  transition: all 0.2s ease;
  text-decoration: none !important;
  position: relative;
  box-shadow: none !important;
}

.pagination .page-link:hover,
.pagination .page-link:focus {
  background-color: var(--brand-1) !important;
  color: #fff !important;
  border-color: var(--brand-1) !important;
  transform: translateY(-2px);
  box-shadow: 0 4px 8px rgba(153, 27, 27, 0.2) !important;
}

.pagination .page-link:active {
  background-color: var(--brand-2) !important;
  color: #fff !important;
  border-color: var(--brand-2) !important;
  transform: translateY(0) !important;
}

.pagination .page-item.active .page-link {
  background-color: var(--brand-1) !important;
  border-color: var(--brand-1) !important;
  color: #fff !important;
  font-weight: 700;
  box-shadow: 0 2px 4px rgba(153, 27, 27, 0.3) !important;
}

.pagination .page-item.disabled .page-link {
  color: var(--muted) !important;
  background-color: var(--soft) !important;
  border-color: var(--line) !important;
  opacity: 0.6;
  cursor: not-allowed;
}

/* Pagination Icons */
.pagination .page-link[rel="prev"]:before,
.pagination .page-link[rel="next"]:after {
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
}

.pagination .page-link[rel="prev"]:before {
  content: "\f053";
  margin-right: 5px;
}

.pagination .page-link[rel="next"]:after {
  content: "\f054";
  margin-left: 5px;
}

/* Responsive */
@media (max-width: 1024px) {
  .products-grid {
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 0.9rem;
  }

  .product-card {
    min-height: 360px;
  }

  .pagination .page-link {
    min-width: 38px;
    height: 38px;
    font-size: 0.85rem;
  }
}

@media (max-width: 768px) {
  .filters-sidebar {
    margin-bottom: 0.8rem;
  }

  .products-toolbar {
    flex-direction: column;
    align-items: stretch;
    text-align: center;
    gap: 0.6rem;
  }

  .toolbar-right {
    justify-content: center;
  }

  .products-grid {
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 0.8rem;
  }

  .products-grid.list-view .product-card {
    flex-direction: column;
    min-height: auto;
  }

  .products-grid.list-view .product-image {
    width: 100%;
    aspect-ratio: 1/1;
    height: auto;
    border-right: none;
    border-bottom: 1px solid var(--line-2);
  }

  .products-grid.list-view .product-content {
    padding: 0.8rem;
  }

  .pagination {
    flex-wrap: wrap;
    justify-content: center;
  }

  .pagination .page-item {
    margin: 2px;
  }

  .pagination .page-link {
    min-width: 36px;
    height: 36px;
    font-size: 0.8rem;
    padding: 0 8px;
  }
}

@media (max-width: 480px) {
  .products-grid {
    grid-template-columns: 1fr;
    gap: 0.7rem;
  }

  .product-card {
    min-height: 340px;
  }

  .pagination .page-link {
    min-width: 32px;
    height: 32px;
    font-size: 0.75rem;
  }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Initialize AOS with optimized settings for staggered animation
  if (typeof AOS !== 'undefined') {
    AOS.init({
      duration: 500,
      once: true,
      offset: 100,
      delay: 0, // Base delay, individual delays set per element
      easing: 'ease-out',
      // Disable for mobile to improve performance
      disable: window.innerWidth < 768
    });
  }

  // Apply view preference
  const grid = document.getElementById('products-grid');
  const savedView = localStorage.getItem('productViewPreference');
  const defaultView = grid ? (grid.dataset.defaultView || 'grid') : 'grid';
  const startView = savedView || defaultView;
  
  if (grid) {
    if (startView === 'list') {
      grid.classList.add('list-view');
    } else {
      grid.classList.remove('list-view');
    }
  }
  
  document.querySelectorAll('.view-btn').forEach(btn => {
    btn.classList.toggle('active', btn.dataset.view === startView);
  });
});

function sortProducts(sortValue) {
  const url = new URL(window.location);
  url.searchParams.set('sort', sortValue);
  window.location.href = url.toString();
}

function toggleView(viewType) {
  const grid = document.getElementById('products-grid');
  if (!grid) return;
  
  const buttons = document.querySelectorAll('.view-btn');
  buttons.forEach(btn => btn.classList.remove('active'));
  document.querySelector(`[data-view="${viewType}"]`).classList.add('active');
  
  if (viewType === 'list') {
    grid.classList.add('list-view');
  } else {
    grid.classList.remove('list-view');
  }
  
  localStorage.setItem('productViewPreference', viewType);
}
</script>
@endsection