@extends('components.layout')

@section('title', $title)

@section('content')
@php
    // ---- Helpers
    $imgPublic = function($path){
        if (!$path) return null;
        $normalized = ltrim($path, '/');
        if (\Illuminate\Support\Str::startsWith($normalized, ['http://','https://'])) return $normalized;
        if (\Illuminate\Support\Str::startsWith($normalized, 'img/')) return asset($normalized);
        if (\Illuminate\Support\Str::startsWith($normalized, 'products/')) return asset(\Illuminate\Support\Str::replaceFirst('products/', 'img/products/', $normalized));
        if (\Illuminate\Support\Str::startsWith($normalized, 'product_images/')) return asset(\Illuminate\Support\Str::replaceFirst('product_images/', 'img/products/', $normalized));
        if (\Illuminate\Support\Str::startsWith($normalized, 'public/product_images/')) return asset(\Illuminate\Support\Str::replaceFirst('public/product_images/', 'img/products/', $normalized));
        if (\Illuminate\Support\Str::startsWith($normalized, 'storage/')) return asset('img/products/'.basename($normalized));
        return asset('img/products/'.$normalized);
    };

    $formatPrice = function($amount, $currency='IDR'){
        if (is_null($amount) || $amount==='') return null;
        $amount = (float)$amount;
        if (strtoupper($currency) === 'IDR') {
            return 'Rp '.number_format($amount, 0, ',', '.');
        }
        // fallback: tampilkan 2 desimal utk non-IDR
        return strtoupper($currency).' '.number_format($amount, 2, '.', ',');
    };

    /** ==== DETEKSI slug dari route ATAU query ==== */
    $paramCategory = isset($category) ? $category->slug : request('category');
    $paramSub      = isset($subcategory) ? $subcategory->slug : request('subcategory');

    // Ringkasan (optional, dipakai utk judul/description)
    $selectedCategory = optional(collect($categories)->firstWhere('slug', $paramCategory));
    $heroDescription = trim((string)($selectedCategory->meta_description ?? ''));
    if ($heroDescription === '') {
        $heroDescription = 'Temukan produk insulasi industri berkualitas tinggi untuk berbagai kebutuhan aplikasi Anda';
    }
@endphp

{{-- =========================
     HEADER SEDERHANA
     ========================= --}}
<section class="simple-header">
    <div class="container">
        <!-- Breadcrumbs (hanya Beranda / Produk) -->
        <nav class="breadcrumb-nav" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products') }}">Produk</a></li>
            </ol>
        </nav>

        <!-- Title + Short Description -->
        <div class="simple-head">
            <h1 class="page-title">{{ $title }}</h1>
            <p class="page-description">{{ $heroDescription }}</p>
        </div>
    </div>
</section>

<section class="products-section py-5">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <aside class="filters-sidebar glass">
                    <div class="filter-section">
                        <h3 class="filter-title">Filter Produk</h3>

                        <!-- Category Chips -->
                        <div class="category-chip-scroll" role="tablist" aria-label="Filter kategori cepat">
                            <a class="c-chip {{ !$paramCategory ? 'active' : '' }}" href="{{ route('products') }}">
                                Semua
                            </a>
                            @foreach($categories as $cat)
                                <a class="c-chip {{ $paramCategory===$cat->slug ? 'active' : '' }}"
                                   href="{{ route('products.category', $cat->slug) }}">
                                   {{ $cat->name }}
                                </a>
                            @endforeach
                        </div>

                        <!-- Category Radios (tetap query ke /products) -->
                        <div class="filter-group mt-3">
                            <h4 class="filter-label">Kategori</h4>
                            <div class="filter-options">
                                <div class="filter-option">
                                    <input type="radio" id="all-categories" name="category" value=""
                                           {{ !$paramCategory ? 'checked' : '' }} onchange="filterProducts()">
                                    <label for="all-categories">Semua Kategori</label>
                                </div>
                                @foreach($categories as $category)
                                <div class="filter-option">
                                    <input type="radio" id="category-{{ $category->id }}" name="category" value="{{ $category->slug }}"
                                           {{ $paramCategory === $category->slug ? 'checked' : '' }} onchange="filterProducts()">
                                    <label for="category-{{ $category->id }}">{{ $category->name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Price Range (aktif jika sudah pilih subkategori) -->
                        <div class="filter-group" @if(!$paramSub) style="opacity:.5; pointer-events:none;" @endif>
                            <h4 class="filter-label">Rentang Harga</h4>
                            <div class="price-range">
                                <div class="price-input">
                                    <input type="number" name="min_price" placeholder="Min (Rp)"
                                           value="{{ request('min_price') }}" class="form-control form-control-sm">
                                </div>
                                <span class="price-separator">—</span>
                                <div class="price-input">
                                    <input type="number" name="max_price" placeholder="Max (Rp)"
                                           value="{{ request('max_price') }}" class="form-control form-control-sm">
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary" onclick="filterProducts()">
                                Terapkan
                            </button>
                        </div>

                        <!-- Quick Links -->
                        <div class="filter-group">
                            <h4 class="filter-label">Tautan Cepat</h4>
                            <div class="quick-links">
                                <a href="{{ route('catalog1-page') }}" class="quick-link">
                                    <i class="fas fa-download"></i> Download Katalog
                                </a>
                                <a href="{{ route('contact') }}" class="quick-link">
                                    <i class="fas fa-phone"></i> Konsultasi Produk
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="info-box">
                        <i class="fas fa-lightbulb"></i>
                        <div>
                            <strong>Tips:</strong>
                            <div class="small text-muted">Pilih kategori dulu. Produk akan tampil setelah subkategori dipilih.</div>
                        </div>
                    </div>
                </aside>
            </div>

            <!-- Content -->
            <div class="col-lg-9">
                @php
                    // Kumpulkan subcategories dari semua kategori
                    $subs = isset($subcategories)
                        ? $subcategories
                        : collect($categories)->flatMap(fn($c) => $c->subcategories ?? collect());

                    // Filter subcategories sesuai kategori terpilih
                    if ($paramCategory) {
                        $subs = $subs->filter(fn($s) => optional($s->category)->slug === $paramCategory);
                    }

                    // Mode produk aktif jika ada slug subcategory (route atau query)
                    $isSubMode = !empty($paramSub);
                @endphp

                <!-- Toolbar -->
                <div class="products-toolbar glass">
                    <div class="toolbar-left">
                        @if(!$isSubMode)
                            <span class="results-count">
                                Menampilkan {{ $subs->count() }} subkategori
                            </span>
                            @if($paramCategory)
                            <span class="category-info">
                                dalam kategori "<strong>{{ $selectedCategory->name ?? $paramCategory }}</strong>"
                            </span>
                            @endif
                        @else
                            <span class="results-count">
                                Menampilkan {{ $products->count() }} dari {{ $products->total() }} produk
                            </span>
                            @if(request('search'))
                            <span class="search-info">
                                untuk pencarian "<strong>{{ request('search') }}</strong>"
                            </span>
                            @endif
                        @endif
                    </div>

                    <div class="toolbar-right">
                        @if($isSubMode)
                        <div class="sort-dropdown">
                            <select name="sort" class="form-select form-select-sm" onchange="sortProducts(this.value)">
                                <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>Terbaru</option>
                                <option value="name" {{ request('sort') === 'name' ? 'selected' : '' }}>Nama A–Z</option>
                                <option value="price_low" {{ request('sort') === 'price_low' ? 'selected' : '' }}>Harga Terendah</option>
                                <option value="price_high" {{ request('sort') === 'price_high' ? 'selected' : '' }}>Harga Tertinggi</option>
                            </select>
                        </div>

                        <div class="view-toggle">
                            <button type="button" class="view-btn active" data-view="grid" onclick="toggleView('grid')" title="Grid">
                                <i class="fas fa-th"></i>
                            </button>
                            <button type="button" class="view-btn" data-view="list" onclick="toggleView('list')" title="List">
                                <i class="fas fa-list"></i>
                            </button>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Stats strip -->
                <div class="stats-strip">
                    @if(!$isSubMode)
                        <div class="stat">
                            <i class="fas fa-layer-group"></i>
                            <div>
                                <div class="stat-title">Subkategori</div>
                                <div class="stat-value">{{ $subs->count() }}</div>
                            </div>
                        </div>
                        <div class="stat">
                            <i class="fas fa-folder-tree"></i>
                            <div>
                                <div class="stat-title">Kategori</div>
                                <div class="stat-value">{{ count($categories) }}</div>
                            </div>
                        </div>
                    @else
                        <div class="stat">
                            <i class="fas fa-boxes-stacked"></i>
                            <div>
                                <div class="stat-title">Produk Ditampilkan</div>
                                <div class="stat-value">{{ $products->count() }}</div>
                            </div>
                        </div>
                        <div class="stat">
                            <i class="fas fa-database"></i>
                            <div>
                                <div class="stat-title">Total Produk</div>
                                <div class="stat-value">{{ $products->total() }}</div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Grid -->
                <div class="products-container">
                    @if(!$isSubMode)
                        {{-- ===== SUBCATEGORY GRID ===== --}}
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
                            <div class="product-item" data-aos="fade-up" data-aos-delay="{{ $index * 70 }}">
                                <div class="product-card shine">
                                    <div class="product-image">
                                        <span class="img-skeleton" aria-hidden="true"></span>
                                        @if($thumb)
                                            <img src="{{ $thumb }}" alt="{{ $sub->name }}" class="img-fluid">
                                        @else
                                            <div class="no-image">
                                                <i class="fas fa-layer-group"></i>
                                                <span>{{ $sub->name }}</span>
                                            </div>
                                        @endif

                                        <div class="product-overlay">
                                            <div class="overlay-actions">
                                                <a href="{{ $subUrl }}" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-eye"></i> Lihat Produk
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-content">
                                        <div class="product-category">
                                            <a href="{{ route('products.category', optional($sub->category)->slug ?? $paramCategory) }}">
                                                {{ optional($sub->category)->name ?? ($selectedCategory->name ?? 'Kategori') }}
                                            </a>
                                        </div>

                                        <h3 class="product-title">
                                            <a href="{{ $subUrl }}">{{ $sub->name }}</a>
                                        </h3>

                                        <p class="product-description">
                                            {{ Str::limit($sub->meta_description ?? 'Eksplor beragam produk pada subkategori ini.', 120) }}
                                        </p>

                                        <div class="product-actions">
                                            <a href="{{ $subUrl }}" class="btn btn-outline-primary btn-sm flex-fill">
                                                <i class="fas fa-boxes-stacked"></i>
                                                @if(!is_null($prodCount))
                                                    Lihat Produk ({{ $prodCount }})
                                                @else
                                                    Lihat Produk
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
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
                                        <a href="{{ route('contact') }}" class="btn btn-outline-primary">
                                            <i class="fas fa-phone"></i> Hubungi Kami
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        {{-- ===== PRODUCT GRID ===== --}}
                        @if($products->count() > 0)
                        <div class="products-grid" id="products-grid">
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

                                // BRANDS → array atau string dipisah koma/titik-koma/pipa
                                $brandList = [];
                                if (is_array($product->brands)) {
                                    $brandList = array_filter(array_map('trim', $product->brands));
                                } elseif (!empty($product->brands)) {
                                    $brandList = array_filter(array_map('trim', preg_split('/[;,|]/', $product->brands)));
                                }

                                // Ambil 4 attr terisi pertama
                                $attrs = collect(range(1,10))
                                    ->map(fn($i) => $product->{'attr'.$i} ?? null)
                                    ->filter()
                                    ->take(4);

                                // Harga + currency
                                $price      = $product->price;
                                $priceStrike= $product->price_strike;
                                $currency   = $product->currency ?: 'IDR';
                                $priceStr   = $formatPrice($price, $currency);
                                $strikeStr  = $formatPrice($priceStrike, $currency);
                            @endphp

                            <div class="product-item" data-aos="fade-up" data-aos-delay="{{ $index * 70 }}">
                                <div class="product-card shine">
                                    <div class="product-image">
                                        <span class="img-skeleton" aria-hidden="true"></span>
                                        @if($imgUrl)
                                            <img src="{{ $imgUrl }}" alt="{{ $product->name }}" class="img-fluid">
                                        @else
                                            <div class="no-image">
                                                <i class="fas fa-image"></i>
                                                <span>No Image</span>
                                            </div>
                                        @endif

                                        <div class="product-overlay">
                                            <div class="overlay-actions">
                                                <a href="{{ $detailUrl }}" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-eye"></i> Lihat Detail
                                                </a>
                                            </div>
                                        </div>

                                        @if(!empty($product->is_featured))
                                        <div class="product-badge featured" title="Featured">
                                            <i class="fas fa-star"></i> Featured
                                        </div>
                                        @endif
                                    </div>

                                    <div class="product-content">
                                        <div class="product-category">
                                            <a href="{{ route('products.category', $catSlug) }}">
                                                {{ optional(optional($product->subcategory)->category)->name
                                                   ?? optional($product->category)->name
                                                   ?? 'Uncategorized' }}
                                            </a>
                                        </div>

                                        <h3 class="product-title">
                                            <a href="{{ $detailUrl }}">{{ $product->name }}</a>
                                        </h3>

                                        {{-- META RINGKAS --}}
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

                                        {{-- DESKRIPSI SINGKAT --}}
                                        @php
                                            $desc = $product->meta_description ?: ($product->attr1 ?? $product->attr2 ?? '');
                                        @endphp
                                        @if($desc)
                                            <p class="product-description">{{ Str::limit($desc, 120) }}</p>
                                        @endif

                                        {{-- ATTRIBUTES QUICK CHIPS --}}
                                        @if($attrs->count())
                                        <div class="mb-2" style="display:flex;gap:.35rem;flex-wrap:wrap;">
                                            @foreach($attrs as $a)
                                                <span class="badge rounded-pill" style="background:var(--soft);border:1px solid var(--line);">
                                                    {{ Str::limit($a, 24) }}
                                                </span>
                                            @endforeach
                                        </div>
                                        @endif

                                        {{-- HARGA --}}
                                        <div class="product-price force-white">
                                            @if($priceStr)
                                                <span class="price">{{ $priceStr }}</span>
                                                @if($priceStrike && $priceStrike > $price)
                                                    <del class="ms-2">{{ $strikeStr }}</del>
                                                @endif
                                                @if(strtoupper($currency) !== 'IDR')
                                                    <small class="ms-1">({{ strtoupper($currency) }})</small>
                                                @endif
                                            @else
                                                <span class="text-muted">Harga: Hubungi kami</span>
                                            @endif
                                        </div>

                                        <div class="product-actions">
                                            <a href="{{ $detailUrl }}" class="btn btn-outline-primary btn-sm flex-fill">
                                                <i class="fas fa-info-circle"></i> Detail Produk
                                            </a>
                                            <a href="{{ route('contact') }}?product={{ $product->slug }}" class="btn btn-primary btn-sm flex-fill">
                                                <i class="fas fa-phone"></i> Hubungi
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
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
                                <p>Coba ubah filter atau pilih subkategori lain.</p>
                                <div class="no-products-actions">
                                    @if($paramCategory)
                                        <a href="{{ route('products.category', $paramCategory) }}" class="btn btn-primary">
                                            <i class="fas fa-arrow-left"></i> Kembali ke Subkategori
                                        </a>
                                    @else
                                        <a href="{{ route('products') }}" class="btn btn-primary">
                                            <i class="fas fa-arrow-left"></i> Lihat Semua
                                        </a>
                                    @endif
                                    <a href="{{ route('contact') }}" class="btn btn-outline-primary">
                                        <i class="fas fa-phone"></i> Hubungi Kami
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

<!-- =========================================
     STYLES (Simplified header, removed hero & back-to-top)
     ========================================= -->
<style>
/* =====================================================
   THEME TOKENS + GLOBAL
   ===================================================== */
:root,
html[data-theme="light"],
html[data-bs-theme="light"],
body[data-theme="light"]{
  --brand-1:#7c1415; --brand-2:#dc2626; --brand-3:#b71c1c;
  --accent:#fbbf24;
  --ink:#111827; --ink-2:#1f2937;
  --muted:#6b7280; --muted-2:#9ca3af;
  --line:#e5e7eb; --line-2:#eef2f7;
  --page:#f6f7fb; --card:#ffffff; --soft:#f8fafc; --soft-2:#f1f5f9;
  --glass: rgba(255,255,255,.7); --scrim: rgba(0,0,0,.06);
  --skeleton-1:#f1f5f9; --skeleton-2:#e5e7eb;
  --shadow-1: 0 8px 24px rgba(0,0,0,.08);
  --shadow-2: 0 18px 44px rgba(124,20,21,.14);
}
:root.dark, html.dark, body.dark,
[data-theme="dark"], html[data-theme="dark"], html[data-bs-theme="dark"], body[data-bs-theme="dark"]{
  --ink:#e5e7eb; --ink-2:#f8fafc;
  --muted:#cbd5e1; --muted-2:#94a3b8;
  --line:#334155; --line-2:#1f2937;
  --page:#070b10; --card:#0b0f14; --soft:#0f172a; --soft-2:#111827;
  --glass: rgba(15,23,42,.65); --scrim: rgba(255,255,255,.04);
  --skeleton-1:#0f172a; --skeleton-2:#0b1220;
  --shadow-1: 0 8px 24px rgba(0,0,0,.55); --shadow-2: 0 18px 44px rgba(0,0,0,.6);
}
@media (prefers-color-scheme: dark){
  :root:not([data-theme="light"]):not(.light):not([data-bs-theme="light"]){
    --ink:#e5e7eb; --ink-2:#f8fafc; --muted:#cbd5e1; --muted-2:#94a3b8;
    --line:#334155; --line-2:#1f2937; --page:#070b10; --card:#0b0f14; --soft:#0f172a; --soft-2:#111827;
    --glass: rgba(15,23,42,.65); --scrim: rgba(255,255,255,.04);
    --skeleton-1:#0f172a; --skeleton-2:#0b1220; --shadow-1: 0 8px 24px rgba(0,0,0,.55); --shadow-2: 0 18px 44px rgba(0,0,0,.6);
  }
}

/* Base */
body{ background: var(--page); color: var(--ink); transition: background-color .25s ease, color .25s ease; }

/* =========================================
   SIMPLE HEADER (tanpa hero)
   ========================================= */
.simple-header{ padding: 18px 0 10px; background: transparent; color: var(--ink); }
.breadcrumb{ background:transparent; margin:0 0 6px; padding:0; }
.breadcrumb .breadcrumb-item a{ color: var(--brand-1); text-decoration:none; font-weight:800; }
.breadcrumb .breadcrumb-item + .breadcrumb-item::before{ color: var(--muted); }
.page-title{ font-size: clamp(1.6rem, 1.2rem + 1vw, 2.2rem); font-weight:900; letter-spacing:-.02em; margin: 0 0 .25rem; }
.page-description{ margin:0; color: var(--muted); }

/* =========================================
   SIDEBAR, GRID, CARDS (tetap)
   ========================================= */
.glass{
  background: var(--glass);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  box-shadow: var(--shadow-1);
  border: 1px solid rgba(255,255,255,.18);
  transition: background-color .25s ease, border-color .25s ease, box-shadow .25s ease;
}
.filters-sidebar{ border-radius:16px; padding: 1.2rem 1.2rem 1.4rem; position: sticky; top: 90px; }
.filter-title{ font-size:1.2rem; font-weight:800; color:var(--ink); margin-bottom:.75rem; padding-bottom:.6rem; border-bottom:2px solid var(--line); }
.filter-group{ margin-bottom:1.2rem }
.filter-label{ font-size:1rem; font-weight:700; color:var(--ink); margin-bottom:.65rem; }
.filter-options{ display:flex; flex-direction:column; gap:.4rem; }
.filter-option{ display:flex; align-items:center; gap:.5rem; }
.filter-option input[type=radio]{ width:18px; height:18px; accent-color: var(--brand-1); }
.filter-option label{ font-size:.95rem; color:var(--muted); cursor:pointer; margin:0; }
.filter-option input:checked+label{ color: var(--brand-1); font-weight:700; }

/* Category chips */
.category-chip-scroll{ display:flex; gap:.4rem; overflow:auto; padding-bottom:.2rem; scrollbar-width:thin; }
.c-chip{
  white-space:nowrap; text-decoration:none; font-weight:800; font-size:.85rem;
  border-radius:999px; padding:.38rem .7rem; border:1px dashed var(--line); color:var(--ink);
  background:linear-gradient(135deg, rgba(124,20,21,.06), rgba(220,38,38,.06));
  transition: background-color .2s ease, color .2s ease, border-color .2s ease, transform .2s ease;
}
.c-chip:hover{ transform: translateY(-1px); }
.c-chip.active{
  border-style:solid; border-color: var(--brand-1); color:#fff;
  background: linear-gradient(135deg, var(--brand-1), var(--brand-2));
}
html.dark .c-chip{ border-color: var(--line); background: rgba(255,255,255,.05); color: var(--ink); }

/* Price & quick links */
.price-range{ display:flex; align-items:center; gap:.5rem; margin-bottom:.8rem }
.price-input{ flex:1 }
.price-separator{ color:var(--muted); font-weight:700 }
.quick-links{ display:flex; flex-direction:column; gap:.5rem }
.quick-link{
  display:flex; align-items:center; gap:.55rem; padding:.7rem .85rem; background:var(--soft);
  border-radius:12px; color:var(--ink); text-decoration:none; font-size:.95rem; transition:.25s
}
.quick-link:hover{ transform: translateX(4px); background: linear-gradient(135deg, rgba(124,20,21,.1), rgba(220,38,38,.12)); }
html.dark .quick-link{ background: var(--soft-2); color: var(--ink); }

/* Tips */
.info-box{
  margin-top: .8rem; display:flex; gap:.6rem; align-items:flex-start; padding:.7rem .85rem; border-radius:12px;
  background: linear-gradient(135deg, rgba(124,20,21,.06), rgba(220,38,38,.06));
  border: 1px dashed var(--line);
}
.info-box i{ color: #f59e0b; margin-top:.15rem; }

/* Toolbar + stats */
.products-toolbar{
  display:flex; justify-content:space-between; align-items:center;
  padding: .9rem 1rem; border-radius:14px; margin-bottom: .9rem;
  background: var(--glass); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,.18);
}
.toolbar-left{ display:flex; align-items:center; gap:.5rem; flex-wrap:wrap; }
.results-count{ font-weight:900; color:var(--ink); }
.search-info,.category-info{ font-size:.92rem; color:var(--muted); }
.toolbar-right{ display:flex; align-items:center; gap:.6rem; }
.sort-dropdown select{
  border-radius:12px; border:1px solid var(--line); padding:.5rem .8rem; font-size:.92rem; background:var(--card); color:var(--ink);
  transition: background-color .2s ease, color .2s ease, border-color .2s ease;
}
html.dark .sort-dropdown select{ background: var(--soft-2); color: var(--ink); border-color: var(--line); }
.view-toggle{ display:flex; background:var(--soft); border-radius:12px; overflow:hidden; }
html.dark .view-toggle{ background: var(--soft-2); }
.view-btn{ padding:.5rem .8rem; border:none; background:transparent; color:#6b7280; cursor:pointer; transition:.22s }
.view-btn.active,.view-btn:hover{ background: var(--brand-1); color:#fff; }

/* Stats */
.stats-strip{ display:flex; gap:.8rem; flex-wrap:wrap; margin-bottom: 1rem; }
.stat{
  flex:0 1 auto; display:flex; gap:.6rem; align-items:center; padding:.6rem .8rem; border-radius:12px;
  background: var(--card); border:1px solid var(--line); box-shadow: var(--shadow-1);
}
.stat i{ font-size:1.1rem; color: var(--brand-2); }
.stat-title{ font-size:.82rem; color:var(--muted); }
.stat-value{ font-weight:900; color:var(--ink); margin-top:-2px }

/* Grid & cards */
.products-grid{
  display:grid; grid-template-columns: repeat(auto-fill, minmax(300px,1fr)); gap: 1.15rem; margin-bottom: 1.6rem;
}
.products-grid.list-view{ grid-template-columns: 1fr; }

.product-card{
  background: var(--card); border: 1px solid var(--line); border-radius: 16px; overflow: hidden;
  display:flex; flex-direction:column; height:100%; box-shadow: var(--shadow-1); position:relative;
  transition: background-color .25s ease, color .25s ease, border-color .25s ease, box-shadow .25s ease, transform .2s ease;
}
.product-card:hover{ transform: translateY(-6px); box-shadow: var(--shadow-2); border-color: rgba(124,20,21,.22); }
.product-card.shine::after{
  content:''; position:absolute; inset:0; pointer-events:none; opacity:0;
  background: linear-gradient(120deg, transparent 0%, rgba(255,255,255,.18) 25%, transparent 50%);
  transition: opacity .25s;
}
.product-card.shine:hover::after{ opacity:1; }

/* Image + skeleton */
.product-image{
  position:relative; aspect-ratio: 4/3; background: var(--soft); border-bottom: 1px solid var(--line-2);
  display:grid; place-items:center; overflow:hidden; height:auto;
}
.product-image img{
  width:100%; height:100%; object-fit: contain; object-position:center; padding: 12px; transition: filter .25s, transform .25s;
}
.product-card:hover .product-image img{ transform: translateY(-1px) scale(1.01); filter: drop-shadow(0 6px 14px rgba(0,0,0,.08)); }
.img-skeleton{
  position:absolute; inset:0; background: linear-gradient(90deg, var(--skeleton-1) 0%, var(--skeleton-2) 50%, var(--skeleton-1) 100%);
  animation: shimmer 1.4s infinite; opacity:1; transition: opacity .3s;
}
@keyframes shimmer{ 0%{ transform: translateX(-30%);} 100%{ transform: translateX(30%);} }
.product-image.img-loaded .img-skeleton{ opacity:0; visibility:hidden; }

/* Overlay */
.product-overlay{
  position:absolute; left:0; right:0; bottom:12px; display:flex; align-items:center; justify-content:center;
  opacity:0; transform: translateY(6px); transition: opacity .25s, transform .25s;
}
.product-card:hover .product-overlay{ opacity:1; transform: translateY(0); }
.overlay-actions .btn{ border-radius: 999px; padding:.48rem .88rem; box-shadow: 0 10px 22px rgba(0,0,0,.28); }

/* Badges */
.product-badge{
  position:absolute; top:10px; right:10px; padding:.38rem .7rem; border-radius:999px; font-size:.75rem; font-weight:800; color:#fff;
}
.product-badge.featured{ background: linear-gradient(135deg, #f59e0b, #fbbf24); }

/* Content */
.product-content{ padding: 1rem 1rem 1.1rem; display:flex; flex-direction:column; flex-grow:1; }
.product-category{ margin-bottom:.4rem; }
.product-category a{
  background: linear-gradient(135deg, rgba(124,20,21,.08), rgba(220,38,38,.08));
  color: var(--brand-2); padding:.22rem .6rem; border-radius:999px; font-size:.72rem; font-weight:800; text-decoration:none; transition:.25s;
}
.product-category a:hover{ background: var(--brand-1); color:#fff; }

.product-title{ font-size:1.08rem; font-weight:900; margin-bottom:.35rem; line-height:1.3; letter-spacing:-.01em; }
.product-title a{ color: var(--ink); text-decoration:none; transition: color .25s; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden; }
.product-title a:hover{ color: var(--brand-1); }

.product-description{
  color:var(--muted); font-size:.95rem; line-height:1.6; margin-bottom:.6rem; flex-grow:1;
  display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden;
}

.product-price{ margin-top:.35rem; }
.price{ font-size:1.08rem; font-weight:900; color: var(--brand-1); letter-spacing:.2px; }

.product-actions{ display:flex; gap:.5rem; margin-top:auto; }

.products-grid.list-view .product-card{ flex-direction:row; height:auto; }
.products-grid.list-view .product-image{ width:260px; aspect-ratio: unset; height: 200px; flex-shrink:0; }
.products-grid.list-view .product-content{ padding: 1rem 1.15rem; flex:1; }

/* Empty state */
.no-products{
  text-align:center; padding: 3rem 1.5rem; background: var(--card); border:1px dashed var(--line); border-radius:16px;
}
.no-products-icon{
  width:100px; height:100px; background: var(--soft); border-radius: 50%;
  display:flex; align-items:center; justify-content:center; font-size: 2rem; color:#9ca3af; margin: 0 auto 1rem;
}

/* Buttons */
.page-header .btn, .products-section .btn{ font-weight:800; letter-spacing:.2px; border-width:0; transition:.18s ease; }
.btn-primary{
  background: linear-gradient(135deg, var(--brand-2), var(--brand-1));
  color:#fff; border:none; box-shadow: 0 10px 22px rgba(220,38,38,.25);
}
.btn-primary:hover{ transform: translateY(-2px); box-shadow: 0 16px 28px rgba(220,38,38,.32); }
.btn-outline-primary{
  color: var(--brand-1); background: transparent; border: 1.6px solid var(--brand-1); border-radius: 12px;
}
.btn-outline-primary:hover{ color:#fff; background: linear-gradient(135deg, var(--brand-1), var(--brand-2)); border-color: transparent; transform: translateY(-2px); }

/* Pagination */
.pagination-wrapper{ display:flex; justify-content:center; margin-top: 1.2rem; }
.pagination .page-item.active .page-link{
  background: linear-gradient(135deg, var(--brand-1), var(--brand-2));
  border-color: var(--brand-1);
}
.pagination .page-link{ color: var(--brand-1); background: var(--card); border-color: var(--line); }
.pagination .page-link:hover{ color:#fff; background: var(--brand-1); border-color: var(--brand-1); }

/* Responsive tweaks */
@media (max-width: 1024px){
  .products-grid{ grid-template-columns: repeat(auto-fill, minmax(260px,1fr)); gap: 1rem; }
}
@media (max-width: 768px){
  .filters-sidebar{ margin-bottom:1.2rem; position: static; }
  .products-toolbar{ flex-direction: column; align-items: stretch; text-align:center; }
  .toolbar-right{ justify-content:center; }
  .products-grid{ grid-template-columns: repeat(auto-fill, minmax(240px,1fr)); }
  .products-grid.list-view .product-card{ flex-direction: column; }
  .products-grid.list-view .product-image{ width:100%; height: 200px; }
}
@media (max-width: 480px){
  .product-actions{ flex-direction: column; }
}

/* =====================================================
   Visibility fixes (sesuai request sebelumnya)
   ===================================================== */
/* SKU line jadi putih (biar terbaca di variasi background) */
.product-content .small.text-muted,
.product-content .small.text-muted * {
  color: #ffffff !important;
}
/* Harga putih + strike */
.product-price.force-white .price,
.product-price.force-white del,
.product-price.force-white .text-muted,
.product-price.force-white small {
  color: #ffffff !important;
  opacity: 1 !important;
}
/* Tips text putih */
.info-box,
.info-box * { color: #ffffff !important; }
/* Ikon lampu tetap kuning */
.info-box i { color: #f59e0b !important; }
/* Brand badge: teks hitam khusus brand, tidak ganggu SKU/harga */
.product-content .sku-line .badge,
.product-content .sku-line .badge * {
  color: #000 !important;
}
</style>

<!-- =========================================
     SCRIPTS (back-to-top dihapus)
     ========================================= -->
<script>
function filterProducts() {
  const form = document.createElement('form');
  form.method = 'GET';
  form.action = '{{ route("products") }}';

  // keep search param kalau ada (walau tidak ada search bar di header)
  const params = new URLSearchParams(window.location.search);
  const keep = ['search','min_price','max_price','sort'];
  keep.forEach(k=>{
    const v = params.get(k);
    if(v){
      const i=document.createElement('input');
      i.type='hidden'; i.name=k; i.value=v; form.appendChild(i);
    }
  });

  // set category (radio)
  const categoryRadio = document.querySelector('input[name="category"]:checked');
  if (categoryRadio && categoryRadio.value) {
    const input = document.createElement('input');
    input.type = 'hidden'; input.name = 'category'; input.value = categoryRadio.value;
    form.appendChild(input);
  }

  // reset subcategory saat pindah kategori
  if (params.get('subcategory')) {
    const input = document.createElement('input');
    input.type = 'hidden'; input.name = 'subcategory'; input.value = '';
    form.appendChild(input);
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
  if(!grid) return;
  const buttons = document.querySelectorAll('.view-btn');
  buttons.forEach(btn => btn.classList.remove('active'));
  document.querySelector(`[data-view="${viewType}"]`).classList.add('active');
  if (viewType === 'list') grid.classList.add('list-view'); else grid.classList.remove('list-view');
  localStorage.setItem('productViewPreference', viewType);
}

// Image skeleton: hilangkan shimmer saat img loaded/error
function markImgLoaded(img){
  const wrap = img.closest('.product-image');
  if (wrap) wrap.classList.add('img-loaded');
}

document.addEventListener('DOMContentLoaded', function() {
  // view preference
  const savedView = localStorage.getItem('productViewPreference');
  if (savedView && document.getElementById('products-grid')) {
    toggleView(savedView);
  }

  // skeleton loader
  document.querySelectorAll('.product-image img').forEach(img=>{
    if (img.complete) {
      markImgLoaded(img);
    } else {
      img.addEventListener('load', ()=>markImgLoaded(img));
      img.addEventListener('error', ()=>markImgLoaded(img));
    }
  });
});
</script>
@endsection
