@extends('en.components.layout')

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

    /** ==== DETEKSI slug dari route ATAU query ==== */
    $paramCategory = isset($category) ? $category->slug : request('category');
    $paramSub      = isset($subcategory) ? $subcategory->slug : request('subcategory');

    // Ringkasan (optional, dipakai utk judul/description)
    $selectedCategory = optional(collect($categories)->firstWhere('slug', $paramCategory));
    $heroDescription = trim((string)($selectedCategory->meta_description ?? ''));
    if ($heroDescription === '') {
        $heroDescription = 'Temukan produk insulasi industri berkualitas tinggi untuk berbagai kebutuhan aplikasi Anda';
    }

    // Kumpulan subkategori (untuk grid & nav saat kategori aktif)
    $allSubs = isset($subcategories)
        ? $subcategories
        : collect($categories)->flatMap(fn($c) => $c->subcategories ?? collect());

    $subsByCategory = $paramCategory
        ? $allSubs->filter(fn($s) => optional($s->category)->slug === $paramCategory)
        : collect();
@endphp

{{-- =========================
     HEADER SEDERHANA
     ========================= --}}
<section class="simple-header">
    <div class="container">
        <nav class="breadcrumb-nav" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/en') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('en.products') }}">Produk</a></li>
            </ol>
        </nav>

        <div class="simple-head">
            <h1 class="page-title">{{ $title }}</h1>
            <p class="page-description">{{ $heroDescription }}</p>
        </div>
    </div>
</section>

<section class="products-section py-5">
    <div class="container">
        <div class="row g-3 g-lg-4">
            <!-- Sidebar: Single Navigation List -->
            <div class="col-lg-3">
                <aside class="filters-sidebar glass">
                    <h3 class="filter-title">Kategori</h3>

                    <nav class="nav-card">
                        <ul class="nav-list">
                            @if(!$paramCategory)
                                {{-- Mode awal: tampil daftar kategori --}}
                                @foreach($categories as $cat)
                                    <li>
                                        <a class="nav-link-item {{ $paramCategory===$cat->slug ? 'active' : '' }}"
                                           href="{{ route('en.products.category', $cat->slug) }}">
                                            <span class="label">{{ $cat->name }}</span>
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    </li>
                                @endforeach
                            @else
                                {{-- Sudah pilih kategori: tombol kembali + daftar subkategori --}}
                                <li class="nav-back">
                                    <a class="nav-link-item" href="{{ route('en.products') }}">
                                        <i class="fas fa-arrow-left"></i>
                                        <span class="label">Semua Kategori</span>
                                    </a>
                                </li>

                                @forelse($subsByCategory as $sub)
                                    <li>
                                        <a class="nav-link-item {{ $paramSub===$sub->slug ? 'active' : '' }}"
                                           href="{{ route('en.products.subcategory', ['category'=>$paramCategory, 'subcategory'=>$sub->slug]) }}">
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

                    {{-- Link cepat opsional (tetap simple) --}}
                    <div class="quick-links mt-3">
                        <a href="{{ route('en.catalog.page') }}" class="quick-link">
                            <i class="fas fa-download"></i> Download Katalog
                        </a>
                        <a href="{{ route('en.contact') }}" class="quick-link">
                            <i class="fas fa-phone"></i> Konsultasi Produk
                        </a>
                    </div>
                </aside>
            </div>

            <!-- Content -->
            <div class="col-lg-9">
                @php
                    // Mode produk aktif jika ada slug subcategory (route atau query)
                    $isSubMode = !empty($paramSub);

                    // Subkategori list untuk grid jika belum pilih sub
                    $subs = $paramCategory ? $subsByCategory : $allSubs;
                    if ($paramCategory) {
                        $subs = $subs->filter(fn($s) => optional($s->category)->slug === $paramCategory);
                    }
                @endphp

                <!-- Toolbar (tetap simple) -->
                <div class="products-toolbar glass">
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
                                <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>Terbaru</option>
                                <option value="name" {{ request('sort') === 'name' ? 'selected' : '' }}>Nama A–Z</option>
                                <option value="price_low" {{ request('sort') === 'price_low' ? 'selected' : '' }}>Harga Terendah</option>
                                <option value="price_high" {{ request('sort') === 'price_high' ? 'selected' : '' }}>Harga Tertinggi</option>
                            </select>
                        </div>

                        <div class="view-toggle">
                            {{-- Default LIST pada mode produk (gambar kiri, info kanan) --}}
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

                <!-- Grid -->
                <div class="products-container">
                    @if(!$isSubMode)
                        {{-- ===== SUBCATEGORY GRID (tetap grid) ===== --}}
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
                                        <a href="{{ route('en.products') }}" class="btn btn-primary">
                                            <i class="fas fa-arrow-left"></i> Lihat Semua
                                        </a>
                                        <a href="{{ route('en.contact') }}" class="btn btn-outline-primary">
                                            <i class="fas fa-phone"></i> Hubungi Kami
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        {{-- ===== PRODUCT LIST (gambar kiri, penjelasan kanan) ===== --}}
                        @if($products->count() > 0)
                        <div class="products-grid list-view" id="products-grid" data-default-view="list">
                            @foreach($products as $index => $product)
                            @php
                                $catSlug = optional(optional($product->subcategory)->category)->slug
                                           ?? optional($product->category)->slug
                                           ?? 'kategori';
                                $subSlug = optional($product->subcategory)->slug ?? 'umum';

                                $detailUrl = route('en.product.detail', [
                                    'category'    => $catSlug,
                                    'subcategory' => $subSlug,
                                    'product'     => $product->slug
                                ]);

                                $rawImg = data_get($product, 'images.0.image_path');
                                $imgUrl = $imgPublic($rawImg);

                                $brandList = [];
                                if (is_array($product->brands)) {
                                    $brandList = array_filter(array_map('trim', $product->brands));
                                } elseif (!empty($product->brands)) {
                                    $brandList = array_filter(array_map('trim', preg_split('/[;,|]/', $product->brands)));
                                }

                                // Kumpulkan hingga 10 atribut (attr1..attr10)
                                $attrs = collect(range(1,10))
                                    ->map(fn($i) => $product->{'attr'.$i} ?? null)
                                    ->filter()
                                    ->take(10);
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
                                        <h3 class="product-title">
                                            <a href="{{ $detailUrl }}">{{ $product->name }}</a>
                                        </h3>

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

                                        @php
                                            $desc = $product->meta_description ?: ($product->attr1 ?? $product->attr2 ?? '');
                                        @endphp

                                        {{-- ATTRIBUTES QUICK CHIPS (hingga 10, teks hitam) --}}
                                        @if($attrs->count())
                                        <div class="mb-2 attrs-wrap">
                                            @foreach($attrs as $a)
                                                <span class="badge rounded-pill attr-chip">
                                                    {{ Str::limit($a, 48) }}
                                                </span>
                                            @endforeach
                                        </div>
                                        @endif

                                        {{-- HARGA DIHILANGKAN SESUAI PERMINTAAN --}}
                                        <div class="product-actions">
                                            <a href="{{ $detailUrl }}" class="btn btn-outline-primary btn-sm flex-fill">
                                                <i class="fas fa-info-circle"></i> Detail Produk
                                            </a>
                                            <a href="{{ route('en.contact') }}?product={{ $product->slug }}" class="btn btn-primary btn-sm flex-fill">
                                                <i class="fas fa-phone"></i> Hubungi
                                            </a>
                                        </div>
                                    </div>
                                </div>
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
                                    <a href="{{ route('en.products.category', $paramCategory) }}" class="btn btn-primary">
                                        <i class="fas fa-arrow-left"></i> Kembali ke Subkategori
                                    </a>
                                    <a href="{{ route('en.contact') }}" class="btn btn-outline-primary">
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

<style>
/* =====================================================
   THEME TOKENS — MERAH (RED) + LIGHT/DARK
   ===================================================== */
/* LIGHT */
:root, html[data-theme="light"], html[data-bs-theme="light"], body[data-theme="light"]{
  --brand-1:#dc2626;   /* Red 600 */
  --brand-2:#b91c1c;   /* Red 700 */
  --brand-3:#fecaca;   /* Red 200 */
  --accent:#f87171;    /* Red 400 */
  --ink:#111827; --muted:#6b7280;
  --line:#e5e7eb; --line-2:#f1f5f9;
  --page:#fef2f2;      /* very light red */
  --card:#ffffff; --soft:#fff1f1; --soft-2:#fde8e8;
  --glass: rgba(255,255,255,.72);
  --shadow-1: 0 8px 24px rgba(0,0,0,.08);
  --shadow-2: 0 18px 44px rgba(185,28,28,.20);
  --ring: 0 0 0 3px rgba(220,38,38,.25);
}
/* DARK */
[data-theme="dark"], html.dark, body.dark, html[data-bs-theme="dark"], body[data-bs-theme="dark"]{
  --brand-1:#ff3b3b;   /* brighter for dark */
  --brand-2:#ef4444;   /* Red 500 */
  --brand-3:#ff8a8a;
  --accent:#ff6b6b;
  --ink:#e5e7eb; --muted:#cbd5e1;
  --line:#3b3f4a; --line-2:#2a2f3a;
  --page:#0f0b0b;      /* deep warm dark */
  --card:#161213; --soft:#1d1718; --soft-2:#241c1d;
  --glass: rgba(22,18,19,.65);
  --shadow-1: 0 8px 24px rgba(0,0,0,.55);
  --shadow-2: 0 18px 44px rgba(0,0,0,.6);
  --ring: 0 0 0 3px rgba(255,59,59,.25);
}

body{ background: var(--page); color: var(--ink); transition: background-color .25s, color .25s; }

/* Focus ring generik (aksesibilitas) */
:where(a,button,select,input){ outline: none; }
:where(a,button,[role="button"],.btn,select,input):focus-visible{
  box-shadow: var(--ring);
  border-radius: 10px;
}

/* Header */
.simple-header{ padding: 18px 0 10px; }
.breadcrumb{ background:transparent; margin:0 0 6px; padding:0; }
.breadcrumb .breadcrumb-item a{ color: var(--brand-2); text-decoration:none; font-weight:800; }
.breadcrumb .breadcrumb-item + .breadcrumb-item::before{ color: var(--muted); }
.page-title{ font-size: clamp(1.6rem, 1.2rem + 1vw, 2.2rem); font-weight:900; letter-spacing:-.02em; margin: 0 0 .25rem; }
.page-description{ margin:0; color: var(--muted); }

/* Cards & glass */
.glass{
  background:var(--glass);
  backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);
  box-shadow: var(--shadow-1); border:1px solid rgba(255,255,255,.18);
}

/* Sidebar — Single Navigation List */
.filters-sidebar{ border-radius:16px; padding: 1.1rem 1.1rem 1.2rem; position: sticky; top: 90px; }
.filter-title{ font-size:1.1rem; font-weight:800; margin: 0 0 .7rem; color: var(--ink); }

.nav-card{ background: var(--card); border:1px solid var(--line); border-radius:14px; padding:.4rem; }
.nav-list{ list-style:none; margin:0; padding:0; display:flex; flex-direction:column; gap:.25rem; }
.nav-link-item{
  display:flex; align-items:center; justify-content:space-between; gap:.6rem;
  padding:.65rem .8rem; border-radius:12px; text-decoration:none;
  color: var(--ink); background: transparent; border:1px solid transparent; transition: .18s ease;
}
.nav-link-item:hover{ background: var(--soft); transform: translateX(2px); }
.nav-link-item.active{
  background: linear-gradient(135deg, rgba(220,38,38,.10), rgba(185,28,28,.12));
  border-color: var(--line);
}
.nav-link-item .label{ font-weight:800; font-size:.95rem; }
.nav-back .nav-link-item{ background: var(--soft-2); }
.nav-empty{ padding:.6rem .75rem; color:var(--muted); font-size:.92rem; }

/* Quick links (opsional) */
.quick-links{ display:flex; flex-direction:column; gap:.45rem }
.quick-link{
  display:flex; align-items:center; gap:.55rem; padding:.6rem .75rem; background:var(--card);
  border:1px dashed var(--line); border-radius:12px; color:var(--ink); text-decoration:none; font-size:.95rem; transition:.18s;
}
.quick-link:hover{ border-style:solid; transform: translateX(2px); background: linear-gradient(135deg, rgba(220,38,38,.06), rgba(185,28,28,.06)); }

/* Toolbar */
.products-toolbar{
  display:flex; justify-content:space-between; align-items:center;
  padding:.8rem .95rem; border-radius:14px; margin-bottom:.9rem; background:var(--glass); border:1px solid rgba(255,255,255,.18);
}
.toolbar-left{ display:flex; align-items:center; gap:.5rem; flex-wrap:wrap; }
.results-count{ font-weight:900; color:var(--ink); }
.search-info{ font-size:.92rem; color:var(--muted); }
.toolbar-right{ display:flex; align-items:center; gap:.6rem; }
.sort-dropdown select{
  border-radius:12px; border:1px solid var(--line); padding:.45rem .7rem; font-size:.92rem; background:var(--card); color:var(--ink);
}
.sort-dropdown select:focus{ box-shadow: var(--ring); }
.view-toggle{ display:flex; background:var(--soft); border-radius:12px; overflow:hidden; }
.view-btn{ padding:.45rem .7rem; border:none; background:transparent; color:#6b7280; cursor:pointer; transition:.18s }
.view-btn.active,.view-btn:hover{
  background: linear-gradient(135deg, var(--brand-1), var(--brand-2));
  color:#fff;
}

/* Grid & cards */
.products-grid{ display:grid; grid-template-columns: repeat(auto-fill, minmax(300px,1fr)); gap:1.1rem; margin-bottom:1.4rem; }
.products-grid.list-view{ grid-template-columns: 1fr; } /* satu kolom, kartu horizontal */

/* Kartu produk/subkategori */
.product-card{
  background: var(--card); border: 1px solid var(--line); border-radius: 16px; overflow: hidden;
  display:flex; flex-direction:column; height:100%; box-shadow: var(--shadow-1); position:relative;
  transition: background-color .25s, border-color .25s, transform .2s;
}
.product-card:hover{ transform: translateY(-6px); box-shadow: var(--shadow-2); border-color: rgba(185,28,28,.28); }
.product-card.shine::after{
  content:''; position:absolute; inset:0; pointer-events:none; opacity:0;
  background: linear-gradient(120deg, transparent 0%, rgba(255,255,255,.16) 25%, transparent 52%);
  transition: opacity .25s;
}
.product-card.shine:hover::after{ opacity:1; }

/* Image + skeleton */
.product-image{ position:relative; aspect-ratio: 4/3; background: var(--soft); border-bottom: 1px solid var(--line-2); display:grid; place-items:center; overflow:hidden; }
.products-grid.list-view .product-image{
  width:260px; aspect-ratio: unset; height: 200px; border-bottom: none; border-right: 1px solid var(--line-2);
}
.product-image img{ width:100%; height:100%; object-fit: contain; padding: 12px; transition: filter .25s, transform .25s; }
.product-card:hover .product-image img{ transform: translateY(-1px) scale(1.01); filter: drop-shadow(0 6px 14px rgba(0,0,0,.08)); }
.img-skeleton{ position:absolute; inset:0; background: linear-gradient(90deg, var(--soft) 0%, var(--line-2) 50%, var(--soft) 100%); animation: shimmer 1.4s infinite; opacity:1; transition: opacity .3s; }
@keyframes shimmer{ 0%{ transform: translateX(-30%);} 100%{ transform: translateX(30%);} }
.product-image.img-loaded .img-skeleton{ opacity:0; visibility:hidden; }

/* Horizontal LIST layout: gambar kiri, teks kanan */
.products-grid.list-view .product-card{ flex-direction:row; height:auto; }
.products-grid.list-view .product-content{ padding: 1rem 1.15rem; flex:1; }

/* Overlay & badge */
.product-overlay{ position:absolute; left:0; right:0; bottom:12px; display:flex; align-items:center; justify-content:center; opacity:0; transform: translateY(6px); transition: opacity .25s, transform .25s; }
.product-card:hover .product-overlay{ opacity:1; transform: translateY(0); }
.overlay-actions .btn{ border-radius:999px; padding:.48rem .88rem; box-shadow: 0 10px 22px rgba(0,0,0,.28); }
.product-badge{ position:absolute; top:10px; right:10px; padding:.38rem .7rem; border-radius:999px; font-size:.75rem; font-weight:800; color:#fff; }
.product-badge.featured{ background: linear-gradient(135deg, #f59e0b, #fbbf24); }

/* Content */
.product-content{ padding: 1rem 1rem 1.1rem; display:flex; flex-direction:column; flex-grow:1; }
.product-title{ font-size:1.08rem; font-weight:900; margin-bottom:.35rem; line-height:1.3; }
.product-title a{ color: var(--ink); text-decoration:none; }
.product-title a:hover{ color: var(--brand-2); }
.product-description{ color:var(--muted); font-size:.95rem; line-height:1.6; margin-bottom:.6rem; flex-grow:1; display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden; }

/* ATTRIBUTES chips: sampai 10, TEKS HITAM (sesuai permintaan) */
.attrs-wrap{ display:flex; gap:.35rem; flex-wrap:wrap; }
.attr-chip{
  background: var(--soft);
  border: 1px solid var(--line);
  color: #000 !important;
  font-weight: 700;
  padding: .35rem .6rem;
}

/* Buttons */
.page-header .btn, .products-section .btn{ font-weight:800; letter-spacing:.2px; border-width:0; transition:.18s ease; }
.btn-primary{
  background: linear-gradient(135deg, var(--brand-1), var(--brand-2));
  color:#fff; border:none; box-shadow: 0 10px 22px rgba(185,28,28,.25);
}
.btn-primary:hover{ transform: translateY(-2px); box-shadow: 0 16px 28px rgba(185,28,28,.32); }
.btn-outline-primary{
  color: var(--brand-1); background: transparent; border: 1.6px solid var(--brand-1); border-radius: 12px;
}
.btn-outline-primary:hover{
  color:#fff; background: linear-gradient(135deg, var(--brand-1), var(--brand-2)); border-color: transparent; transform: translateY(-2px);
}

/* Empty state & Pagination */
.no-products{ text-align:center; padding: 3rem 1.5rem; background: var(--card); border:1px dashed var(--line); border-radius:16px; }
.no-products-icon{ width:100px; height:100px; background: var(--soft); border-radius: 50%; display:flex; align-items:center; justify-content:center; font-size: 2rem; color:#9ca3af; margin: 0 auto 1rem; }
.pagination-wrapper{ display:flex; justify-content:center; margin-top: 1.2rem; }
.pagination .page-item.active .page-link{ background: linear-gradient(135deg, var(--brand-1), var(--brand-2)); border-color: var(--brand-1); }
.pagination .page-link{ color: var(--brand-1); background: var(--card); border-color: var(--line); }
.pagination .page-link:hover{ color:#fff; background: var(--brand-1); border-color: var(--brand-1); }

/* Responsive */
@media (max-width: 1024px){
  .products-grid{ grid-template-columns: repeat(auto-fill, minmax(260px,1fr)); gap: 1rem; }
}
@media (max-width: 768px){
  .filters-sidebar{ margin-bottom:1.2rem; position: static; }
  .products-toolbar{ flex-direction: column; align-items: stretch; text-align:center; }
  .toolbar-right{ justify-content:center; }
  .products-grid{ grid-template-columns: 1fr; }
  .products-grid.list-view .product-card{ flex-direction: column; }
  .products-grid.list-view .product-image{ width:100%; height: 200px; border-right:none; border-bottom: 1px solid var(--line-2); }
}
@media (max-width: 480px){
  .product-actions{ flex-direction: column; }
}
</style>

<script>
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
  // Terapkan preferensi tampilan (default LIST pada mode produk)
  const grid = document.getElementById('products-grid');
  const savedView = localStorage.getItem('productViewPreference');
  const defaultView = grid ? (grid.dataset.defaultView || 'grid') : 'grid';
  const startView = savedView || defaultView;
  if (grid && startView === 'list') { grid.classList.add('list-view'); }
  if (grid && startView === 'grid') { grid.classList.remove('list-view'); }
  document.querySelectorAll('.view-btn').forEach(btn => {
    btn.classList.toggle('active', btn.dataset.view === startView);
  });

  // skeleton loader
  document.querySelectorAll('.product-image img').forEach(img=>{
    if (img.complete) { markImgLoaded(img); }
    else { img.addEventListener('load', ()=>markImgLoaded(img)); img.addEventListener('error', ()=>markImgLoaded(img)); }
  });
});
</script>
@endsection
