@extends('components.layout')

@section('title', $title)

@section('content')
@php
    /**
     * Normalisasi path gambar ke public/img/products/...
     * Menangani absolute URL, "img/...", "products/...", "product_images/...", "storage/...", atau nama file saja.
     */
    $imgPublic = function($path){
        if (!$path) return null;
        $normalized = ltrim($path, '/');

        if (\Illuminate\Support\Str::startsWith($normalized, ['http://','https://'])) {
            return $normalized;
        }
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
            return asset('img/products/'.basename($normalized));
        }
        return asset('img/products/'.$normalized);
    };

    // Ringkasan untuk chips
    $selectedCategory = optional(collect($categories)->firstWhere('slug', request('category')));
    $selectedSub = request('subcategory') ? (isset($subcategories)
        ? collect($subcategories)->firstWhere('slug', request('subcategory'))
        : (collect($categories)->flatMap(fn($c) => $c->subcategories ?? collect()))->firstWhere('slug', request('subcategory'))) : null;

    // Deskripsi hero: ambil dari categories.meta_description kalau ada; fallback teks default
    $heroDescription = trim((string)($selectedCategory->meta_description ?? ''));
    if ($heroDescription === '') {
        $heroDescription = 'Temukan produk insulasi industri berkualitas tinggi untuk berbagai kebutuhan aplikasi Anda';
    }
@endphp

<!-- =========================================
     PAGE HEADER
     ========================================= -->
<section class="page-header">
    <div class="header-layer"></div>
    <div class="container">

        <!-- Breadcrumbs -->
        <div class="row">
            <div class="col-12">
                <nav class="breadcrumb-nav" aria-label="breadcrumb" data-aos="fade-up">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('products') }}">Produk</a></li>
                        @if(request('category'))
                            <li class="breadcrumb-item active" aria-current="page">{{ $selectedCategory->name ?? request('category') }}</li>
                        @endif
                        @if(request('subcategory'))
                            <li class="breadcrumb-item active" aria-current="page">{{ $selectedSub->name ?? request('subcategory') }}</li>
                        @endif
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Title + Search -->
        <div class="row">
            <div class="col-12">
                <div class="header-content" data-aos="fade-up" data-aos-delay="50">
                    <h1 class="page-title">{{ $title }}</h1>
                    <p class="page-description">
                        {{ $heroDescription }}
                    </p>

                    <!-- Search Bar -->
                    <div class="search-section">
                        <form method="GET" action="{{ route('products') }}" class="search-form">
                            <div class="search-input-group">
                                <div class="search-input">
                                    <i class="fas fa-search"></i>
                                    <input type="text"
                                           name="search"
                                           placeholder="Cari produk, subkategori, kata kunci..."
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
                    <!-- /Search Bar -->
                </div>
            </div>
        </div>

        <!-- Filter Chips Summary -->
        <div class="row">
            <div class="col-12">
                <div class="filter-chipbar" data-aos="fade-up" data-aos-delay="100">
                    @if(request('category'))
                        <span class="chip"><i class="fas fa-folder-open"></i> Kategori: {{ $selectedCategory->name ?? request('category') }}</span>
                    @endif
                    @if(request('subcategory'))
                        <span class="chip"><i class="fas fa-layer-group"></i> Subkategori: {{ $selectedSub->name ?? request('subcategory') }}</span>
                    @endif
                    @if(request('search'))
                        <span class="chip"><i class="fas fa-magnifying-glass"></i> Cari: {{ request('search') }}</span>
                    @endif
                    @if(request('min_price') || request('max_price'))
                        <span class="chip">
                            <i class="fas fa-money-bill-wave"></i>
                            Harga: {{ request('min_price') ? 'Rp '.number_format(request('min_price'),0,',','.') : 'min' }}
                            – {{ request('max_price') ? 'Rp '.number_format(request('max_price'),0,',','.') : 'max' }}
                        </span>
                    @endif

                    @if(request()->hasAny(['category','subcategory','search','min_price','max_price','sort']))
                        <a class="chip reset" href="{{ route('products') }}">
                            <i class="fas fa-xmark"></i> Reset
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================
     CONTENT: SIDEBAR + GRID
     ========================================= -->
<section class="products-section py-5">
    <div class="container">
        <div class="row">
            <!-- ========== Sidebar Filters ========== -->
            <div class="col-lg-3">
                <aside class="filters-sidebar glass" data-aos="fade-right">
                    <div class="filter-section">
                        <h3 class="filter-title">Filter Produk</h3>

                        <!-- Category Chips -->
                        <div class="category-chip-scroll" role="tablist" aria-label="Filter kategori cepat">
                            <a class="c-chip {{ !request('category') ? 'active' : '' }}" href="{{ route('products') }}">
                                Semua
                            </a>
                            @foreach($categories as $cat)
                                <a class="c-chip {{ request('category')===$cat->slug ? 'active' : '' }}"
                                   href="{{ route('products', ['category' => $cat->slug]) }}">
                                   {{ $cat->name }}
                                </a>
                            @endforeach
                        </div>

                        <!-- Category Radios -->
                        <div class="filter-group mt-3">
                            <h4 class="filter-label">Kategori</h4>
                            <div class="filter-options">
                                <div class="filter-option">
                                    <input type="radio" id="all-categories" name="category" value=""
                                           {{ !request('category') ? 'checked' : '' }} onchange="filterProducts()">
                                    <label for="all-categories">Semua Kategori</label>
                                </div>
                                @foreach($categories as $category)
                                <div class="filter-option">
                                    <input type="radio" id="category-{{ $category->id }}" name="category" value="{{ $category->slug }}"
                                           {{ request('category') === $category->slug ? 'checked' : '' }} onchange="filterProducts()">
                                    <label for="category-{{ $category->id }}">{{ $category->name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Price Range (aktif hanya saat sudah pilih subkategori) -->
                        <div class="filter-group" @if(!request('subcategory')) style="opacity:.5; pointer-events:none;" @endif>
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

                    <!-- Info Box -->
                    <div class="info-box">
                        <i class="fas fa-lightbulb"></i>
                        <div>
                            <strong>Tips:</strong>
                            <div class="small text-muted">Pilih kategori dulu. Produk akan tampil setelah subkategori dipilih.</div>
                        </div>
                    </div>
                </aside>
            </div>

            <!-- ========== Content Area ========== -->
            <div class="col-lg-9">
                @php
                    // Kumpulkan subcategories
                    $subs = isset($subcategories)
                        ? $subcategories
                        : collect($categories)->flatMap(fn($c) => $c->subcategories ?? collect());

                    // Filter subcategories sesuai kategori terpilih
                    if (request('category')) {
                        $subs = $subs->filter(fn($s) => optional($s->category)->slug === request('category'));
                    }

                    $isSubMode = request()->filled('subcategory'); // ada subcategory -> tampil produk
                @endphp

                <!-- Toolbar -->
                <div class="products-toolbar glass" data-aos="fade-left">
                    <div class="toolbar-left">
                        @if(!$isSubMode)
                            <span class="results-count">
                                Menampilkan {{ $subs->count() }} subkategori
                            </span>
                            @if(request('category'))
                            <span class="category-info">
                                dalam kategori "<strong>{{ $selectedCategory->name ?? request('category') }}</strong>"
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
                <div class="stats-strip" data-aos="fade-left" data-aos-delay="50">
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

                <!-- Grid: Subcategories OR Products -->
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

                                $subUrl = route('products', [
                                    'category'    => optional($sub->category)->slug,
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
                                                    <i class="fas fa-eye"></i>
                                                    Lihat Produk
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-content">
                                        <div class="product-category">
                                            <a href="{{ route('products', ['category' => optional($sub->category)->slug]) }}">
                                                {{ optional($sub->category)->name ?? 'Kategori' }}
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
                                            <i class="fas fa-arrow-left"></i>
                                            Lihat Semua
                                        </a>
                                        <a href="{{ route('contact') }}" class="btn btn-outline-primary">
                                            <i class="fas fa-phone"></i>
                                            Hubungi Kami
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
                                $catSlug = optional($product->category)->slug ?? 'kategori';
                                $subSlug = optional($product->subcategory)->slug ?? 'umum';
                                $detailUrl = route('product.detail', [
                                    'category'    => $catSlug,
                                    'subcategory' => $subSlug,
                                    'product'     => $product->slug
                                ]);

                                $rawImg = data_get($product, 'images.0.image_path');
                                $imgUrl = $imgPublic($rawImg);
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
                                                    <i class="fas fa-eye"></i>
                                                    Lihat Detail
                                                </a>
                                            </div>
                                        </div>

                                        @if(!empty($product->is_featured))
                                        <div class="product-badge featured" title="Featured">
                                            <i class="fas fa-star"></i>
                                            Featured
                                        </div>
                                        @endif
                                    </div>

                                    <div class="product-content">
                                        <div class="product-category">
                                            <a href="{{ route('products', ['category' => optional($product->category)->slug]) }}">
                                                {{ $product->category->name ?? 'Uncategorized' }}
                                            </a>
                                        </div>

                                        <h3 class="product-title">
                                            <a href="{{ $detailUrl }}">{{ $product->name }}</a>
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
                                            <a href="{{ $detailUrl }}" class="btn btn-outline-primary btn-sm flex-fill">
                                                <i class="fas fa-info-circle"></i>
                                                Detail Produk
                                            </a>
                                            <a href="{{ route('contact') }}?product={{ $product->slug }}" class="btn btn-primary btn-sm flex-fill">
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
                        <div class="no-products" data-aos="fade-up">
                            <div class="no-products-content">
                                <div class="no-products-icon">
                                    <i class="fas fa-search"></i>
                                </div>
                                <h3>Produk tidak ditemukan</h3>
                                <p>Coba ubah filter atau pilih subkategori lain.</p>
                                <div class="no-products-actions">
                                    <a href="{{ route('products', ['category' => request('category')]) }}" class="btn btn-primary">
                                        <i class="fas fa-arrow-left"></i>
                                        Kembali ke Subkategori
                                    </a>
                                    <a href="{{ route('contact') }}" class="btn btn-outline-primary">
                                        <i class="fas fa-phone"></i>
                                        Hubungi Kami
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

    <!-- Back to top -->
    <button class="back-to-top" aria-label="Kembali ke atas">
        <i class="fas fa-arrow-up"></i>
    </button>
</section>

<!-- =========================================
     STYLES (Grouped per section)
     ========================================= -->
<style>
/* ===========================
   0) THEME TOKENS
   =========================== */
:root{
  --brand-1:#7c1415; --brand-2:#dc2626; --brand-3:#b71c1c;
  --accent:#fbbf24;

  --ink:#111827;    /* text utama (light) */
  --ink-2:#1f2937;  /* text sekunder (light) */
  --muted:#6b7280;  /* muted (light) */
  --muted-2:#9ca3af;

  --line:#e5e7eb;   /* border (light) */
  --line-2:#eef2f7;

  --card:#ffffff;   /* surface card (light) */
  --soft:#f8fafc;   /* surface lembut (light) */
  --soft-2:#f1f5f9;

  --glass: rgba(255,255,255,.7); /* glass light */
  --scrim: rgba(0,0,0,.08);

  --shadow-1: 0 8px 24px rgba(0,0,0,.08);
  --shadow-2: 0 18px 44px rgba(124,20,21,.14);
}

/* ==== DARK MODE OVERRIDES ====
   Wajib: tidak ada surface putih di dark mode */
body.dark, [data-theme="dark"]{
  --ink:#e5e7eb; --ink-2:#f8fafc;
  --muted:#cbd5e1; --muted-2:#94a3b8;

  --line:#334155; --line-2:#1f2937;

  --card:#0b0f14; /* dark card */
  --soft:#0f172a; /* dark soft */
  --soft-2:#111827;

  --glass: rgba(15,23,42,.65); /* glass dark */
  --scrim: rgba(255,255,255,.04);

  --shadow-1: 0 8px 24px rgba(0,0,0,.55);
  --shadow-2: 0 18px 44px rgba(0,0,0,.6);
}

/* ===========================
   1) PAGE HEADER
   =========================== */
.page-header{
  position:relative; color:#fff; padding: 86px 0 48px; overflow:hidden;
  background:
    radial-gradient(1200px 300px at -10% -10%, rgba(255,255,255,.12), transparent 60%),
    radial-gradient(800px 300px at 120% 10%, rgba(255,255,255,.06), transparent 60%),
    linear-gradient(135deg, var(--brand-1), var(--brand-3) 55%, var(--brand-2));
}
.page-header .header-layer{
  position:absolute; inset:0; background:linear-gradient(0deg, rgba(0,0,0,.35), transparent 60%);
}
.header-content{ position:relative; z-index:2; text-align:center; }
.page-title{ font-size: clamp(2.1rem, 1.4rem + 2vw, 3rem); font-weight:900; letter-spacing: -.02em; margin-bottom:.4rem; }
.page-description{ font-size:1.05rem; opacity:.98; margin:0 auto 1.2rem; max-width:70ch; }

/* Breadcrumbs */
.breadcrumb-nav{ position:relative; z-index:2; margin-bottom: 10px; }
.breadcrumb{ background:transparent; margin:0; padding:0; }
.breadcrumb .breadcrumb-item a{ color:#fde68a; text-decoration:none; }
.breadcrumb .breadcrumb-item.active{ color:#fff; opacity:.9; }
.breadcrumb .breadcrumb-item + .breadcrumb-item::before{ color:#fff; opacity:.6; }

/* Search */
.search-section{ max-width: 760px; margin: 0 auto; position:relative; z-index:2; }
.search-input-group{ display:flex; gap:.8rem; align-items:center; }
.search-input{ position:relative; flex:1; }
.search-input i{ position:absolute; left:16px; top:50%; transform:translateY(-50%); color:#9ca3af; z-index:3; }
.search-input .form-control{
  padding-left: 46px; height: 52px; border-radius: 14px; border: 1px solid rgba(255,255,255,.35);
  font-size:16px; background: rgba(255,255,255,.96); color:#111827;
}
body.dark .search-input .form-control,
[data-theme="dark"] .search-input .form-control{
  background: rgba(17,24,39,.88); color: var(--ink); border-color: rgba(255,255,255,.15);
}
.search-input .form-control:focus{ background:#fff; outline:none; box-shadow:0 0 0 .2rem rgba(220,38,38,.25); }
body.dark .search-input .form-control:focus{ background:#0b0f14; }

/* ===========================
   2) CHIP BAR
   =========================== */
.filter-chipbar{ margin-top: 12px; display:flex; flex-wrap:wrap; gap:.5rem; }
.filter-chipbar .chip{
  background: rgba(255,255,255,.2); border:1px solid rgba(255,255,255,.35); color:#fff;
  padding:.42rem .7rem; border-radius: 999px; font-weight:700; font-size:.9rem; display:inline-flex; align-items:center; gap:.4rem;
  backdrop-filter: blur(6px);
}
body.dark .filter-chipbar .chip{
  background:rgba(255,255,255,.1); border-color:rgba(255,255,255,.15);
}
.filter-chipbar .chip i{ opacity:.9; }
.filter-chipbar .chip.reset{ background:#fff; color:var(--brand-1); border-color:transparent; text-decoration:none; }
body.dark .filter-chipbar .chip.reset{ background:#e11d48; color:#fff; }

/* ===========================
   3) SIDEBAR (GLASS)
   =========================== */
.glass{
  background: var(--glass);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  box-shadow: var(--shadow-1);
  border: 1px solid rgba(255,255,255,.2);
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

/* Category chips (scrollable) */
.category-chip-scroll{ display:flex; gap:.4rem; overflow:auto; padding-bottom:.2rem; scrollbar-width:thin; }
.c-chip{
  white-space:nowrap; text-decoration:none; font-weight:800; font-size:.85rem;
  border-radius:999px; padding:.38rem .7rem; border:1px dashed var(--line); color:var(--ink);
  background:linear-gradient(135deg, rgba(124,20,21,.06), rgba(220,38,38,.06));
}
.c-chip.active{
  border-style:solid; border-color: var(--brand-1); color:#fff;
  background: linear-gradient(135deg, var(--brand-1), var(--brand-2));
}
body.dark .c-chip{
  border-color: var(--line); background: rgba(255,255,255,.05); color: var(--ink);
}

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
body.dark .quick-link{ background: var(--soft-2); }

/* Tips box */
.info-box{
  margin-top: .8rem; display:flex; gap:.6rem; align-items:flex-start; padding:.7rem .85rem; border-radius:12px;
  background: linear-gradient(135deg, rgba(124,20,21,.06), rgba(220,38,38,.06));
  border: 1px dashed var(--line);
}
.info-box i{ color: #f59e0b; margin-top:.15rem; }

/* ===========================
   4) TOOLBAR + STATS
   =========================== */
.products-toolbar{
  display:flex; justify-content:space-between; align-items:center;
  padding: .9rem 1rem; border-radius:14px; margin-bottom: .9rem;
  background: var(--glass); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,.2);
}
.toolbar-left{ display:flex; align-items:center; gap:.5rem; flex-wrap:wrap; }
.results-count{ font-weight:900; color:var(--ink); }
.search-info,.category-info{ font-size:.92rem; color:var(--muted); }
.toolbar-right{ display:flex; align-items:center; gap:.6rem; }
.sort-dropdown select{
  border-radius:12px; border:1px solid var(--line); padding:.5rem .8rem; font-size:.92rem; background:var(--card); color:var(--ink);
}
body.dark .sort-dropdown select{ background: var(--soft-2); }
.view-toggle{ display:flex; background:var(--soft); border-radius:12px; overflow:hidden; }
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

/* ===========================
   5) GRID & CARDS
   =========================== */
.products-grid{
  display:grid; grid-template-columns: repeat(auto-fill, minmax(300px,1fr)); gap: 1.15rem; margin-bottom: 1.6rem;
}
.products-grid.list-view{ grid-template-columns: 1fr; }

.product-card{
  background: var(--card); border: 1px solid var(--line); border-radius: 16px; overflow: hidden;
  display:flex; flex-direction:column; height:100%; transition:.28s; box-shadow: var(--shadow-1); position:relative;
}
.product-card:hover{ transform: translateY(-6px); box-shadow: var(--shadow-2); border-color: rgba(124,20,21,.22); }
.product-card.shine::after{
  content:''; position:absolute; inset:0; pointer-events:none; opacity:0;
  background: linear-gradient(120deg, transparent 0%, rgba(255,255,255,.18) 25%, transparent 50%);
  transition: opacity .25s;
}
.product-card.shine:hover::after{ opacity:1; }

/* Image + Skeleton */
.product-image{
  position:relative; aspect-ratio: 4/3; background: var(--soft); border-bottom: 1px solid var(--line-2);
  display:grid; place-items:center; overflow:hidden; height:auto;
}
.product-image img{
  width:100%; height:100%; object-fit: contain; object-position:center; padding: 12px; transition: filter .25s, transform .25s;
}
.product-card:hover .product-image img{ transform: translateY(-1px) scale(1.01); filter: drop-shadow(0 6px 14px rgba(0,0,0,.08)); }

/* shimmer skeleton */
.img-skeleton{
  position:absolute; inset:0; background:
    linear-gradient(90deg, var(--soft) 0%, var(--soft-2) 50%, var(--soft) 100%);
  animation: shimmer 1.4s infinite; opacity:1; transition: opacity .3s;
}
@keyframes shimmer{
  0%{ transform: translateX(-30%); }
  100%{ transform: translateX(30%); }
}
.product-image.img-loaded .img-skeleton{ opacity:0; visibility:hidden; }

/* Overlay */
.product-overlay{
  position:absolute; left:0; right:0; bottom:12px; background:transparent; display:flex; align-items:center; justify-content:center;
  opacity:0; transform: translateY(6px); transition: opacity .25s, transform .25s;
}
.product-card:hover .product-overlay{ opacity:1; transform: translateY(0); }
.overlay-actions .btn{ border-radius: 999px; padding:.48rem .88rem; box-shadow: 0 10px 22px rgba(124,20,21,.22); }

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
.product-meta{ margin-bottom:.55rem; }
.product-specs{ margin-bottom:.35rem; }
.product-price{ margin-top:.35rem; }
.price{ font-size:1.08rem; font-weight:900; color: var(--brand-1); letter-spacing:.2px; }
.price-unit{ font-size:.9rem; color:var(--muted); }

.product-actions{ display:flex; gap:.5rem; margin-top:auto; }

/* List view */
.products-grid.list-view .product-card{ flex-direction:row; height:auto; }
.products-grid.list-view .product-image{ width:260px; aspect-ratio: unset; height: 200px; flex-shrink:0; }
.products-grid.list-view .product-content{ padding: 1rem 1.15rem; flex:1; }

/* Empty state */
.no-products{ text-align:center; padding: 3rem 1.5rem; background: var(--card); border:1px dashed var(--line); border-radius:16px; }
.no-products-icon{
  width:100px; height:100px; background: var(--soft); border-radius: 50%;
  display:flex; align-items:center; justify-content:center; font-size: 2rem; color:#9ca3af; margin: 0 auto 1rem;
}

/* ===========================
   6) BUTTONS & PAGINATION
   =========================== */
.page-header .btn, .products-section .btn{ font-weight:800; letter-spacing:.2px; border-width:0; transition:.18s ease; }

/* Solid primary */
.page-header .btn-primary, .products-section .btn-primary{
  background: linear-gradient(135deg, var(--brand-1), var(--brand-2));
  color:#fff; box-shadow: 0 12px 28px rgba(220,38,38,.25); border:none;
}
.page-header .btn-primary:hover, .products-section .btn-primary:hover{
  transform: translateY(-2px); box-shadow: 0 18px 34px rgba(220,38,38,.32);
}

/* Outline */
.page-header .btn-outline-primary, .products-section .btn-outline-primary{
  color: var(--brand-1); background: transparent; position: relative; border-radius: 12px; border: none;
}
.page-header .btn-outline-primary::before, .products-section .btn-outline-primary::before{
  content:""; position:absolute; inset:0; border-radius: inherit; padding:1px;
  background: linear-gradient(135deg, var(--brand-1), var(--brand-2));
  -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
  -webkit-mask-composite: xor; mask-composite: exclude;
}
.page-header .btn-outline-primary:hover, .products-section .btn-outline-primary:hover{
  transform: translateY(-2px); background: rgba(124,20,21,.06);
}
body.dark .products-section .btn-outline-primary{ color:#fff; }

/* Pagination */
.pagination-wrapper{ display:flex; justify-content:center; margin-top: 1.2rem; }
.pagination .page-item.active .page-link{
  background: linear-gradient(135deg, var(--brand-1), var(--brand-2));
  border-color: var(--brand-1);
}
.pagination .page-link{ color: var(--brand-1); background: var(--card); border-color: var(--line); }
.pagination .page-link:hover{ color:#fff; background: var(--brand-1); border-color: var(--brand-1); }
body.dark .pagination .page-link{ background: var(--soft-2); color: var(--ink); border-color: var(--line); }

/* ===========================
   7) MISC & RESPONSIVE
   =========================== */
/* Back to top */
.back-to-top{
  position: fixed; right: 18px; bottom: 18px; border: none; border-radius: 999px; width: 44px; height: 44px;
  display:flex; align-items:center; justify-content:center; cursor:pointer; z-index: 40;
  background: linear-gradient(135deg, var(--brand-1), var(--brand-2)); color:#fff;
  box-shadow: 0 10px 22px rgba(220,38,38,.28); opacity: 0; transform: translateY(8px); pointer-events: none; transition: .25s;
}
.back-to-top.show{ opacity:1; transform: translateY(0); pointer-events: auto; }

@media (max-width: 1024px){
  .products-grid{ grid-template-columns: repeat(auto-fill, minmax(260px,1fr)); gap: 1rem; }
}
@media (max-width: 768px){
  .search-input-group{ flex-direction: column; }
  .search-input, .search-form .btn-primary{ width:100%; }
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
</style>

<!-- =========================================
     SCRIPTS
     ========================================= -->
<script>
function filterProducts() {
  const form = document.createElement('form');
  form.method = 'GET';
  form.action = '{{ route("products") }}';

  // keep search
  const searchParam = new URLSearchParams(window.location.search).get('search');
  if (searchParam) {
    const input = document.createElement('input');
    input.type = 'hidden'; input.name = 'search'; input.value = searchParam;
    form.appendChild(input);
  }

  // set category (radio)
  const categoryRadio = document.querySelector('input[name="category"]:checked');
  if (categoryRadio && categoryRadio.value) {
    const input = document.createElement('input');
    input.type = 'hidden'; input.name = 'category'; input.value = categoryRadio.value;
    form.appendChild(input);
  }

  // reset subcategory supaya balik ke grid subkategori ketika pindah kategori
  const subParam = new URLSearchParams(window.location.search).get('subcategory');
  if (subParam) {
    const input = document.createElement('input');
    input.type = 'hidden'; input.name = 'subcategory'; input.value = '';
    form.appendChild(input);
  }

  // keep price & sort (berguna saat mode produk)
  ['min_price','max_price','sort'].forEach(k=>{
    const v = new URLSearchParams(window.location.search).get(k);
    if(v){
      const i=document.createElement('input');
      i.type='hidden'; i.name=k; i.value=v; form.appendChild(i);
    }
  });

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

  // back-to-top
  const btt = document.querySelector('.back-to-top');
  const onScroll = ()=>{
    if (window.scrollY > 350) btt.classList.add('show'); else btt.classList.remove('show');
  };
  window.addEventListener('scroll', onScroll);
  btt.addEventListener('click', ()=>window.scrollTo({top:0, behavior:'smooth'}));
  onScroll();
});
</script>
@endsection
