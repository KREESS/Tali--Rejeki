@extends('components.layout')

@section('title', isset($product) ? $product->name : ($title ?? 'Detail Produk'))

@section('content')
@php
    // ===== Helpers (konsisten dengan list page) =====
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
        if (strtoupper($currency) === 'IDR') return 'Rp '.number_format($amount, 0, ',', '.');
        return strtoupper($currency).' '.number_format($amount, 2, '.', ',');
    };

    // ===== Derivasi data dasar produk =====
    $catObj   = optional(optional($product->subcategory)->category) ?? optional($product->category);
    $catName  = $catObj->name ?? 'Kategori';
    $catSlug  = $catObj->slug ?? 'kategori';
    $subObj   = optional($product->subcategory);
    $subName  = $subObj->name ?? 'Umum';
    $subSlug  = $subObj->slug ?? 'umum';

    $titleTxt = $product->name ?? 'Produk';
    $sku      = $product->sku ?? null;

    // Brand: array/string → list
    $brandList = [];
    if (is_array($product->brands ?? null)) {
        $brandList = array_filter(array_map('trim', $product->brands));
    } elseif (!empty($product->brands ?? null)) {
        $brandList = array_filter(array_map('trim', preg_split('/[;,|]/', $product->brands)));
    }

    // Gambar: kumpulkan semua path
    $images = collect($product->images ?? [])->pluck('image_path')->filter()->values();
    if ($images->isEmpty()) {
        $firstImg = data_get($product, 'image_path') ?: data_get($product, 'featured_image');
        if ($firstImg) $images = collect([$firstImg]);
    }
    $mainImage = $imgPublic($images->first());
    $thumbs    = $images->slice(0, 8)->map(fn($p) => $imgPublic($p));

    // Harga
    $price       = $product->price ?? null;
    $priceStrike = $product->price_strike ?? null;
    $currency    = $product->currency ?? 'IDR';
    $priceStr    = $formatPrice($price, $currency);
    $strikeStr   = $formatPrice($priceStrike, $currency);

    // Deskripsi/teks
    $shortDesc = $product->meta_description
        ?? $product->short_description
        ?? $product->attr1
        ?? $product->attr2
        ?? null;
    $longDesc  = $product->description ?? null;

    // Atribut (ambil maksimal 10)
    $attrs = collect(range(1,10))
        ->map(fn($i) => $product->{'attr'.$i} ?? null)
        ->filter();

    // Dokumen (fleksibel beberapa properti umum)
    $docs = collect($product->documents ?? $product->files ?? $product->attachments ?? [])
        ->map(function($d){
            // dukung bentuk array/obj sederhana: ['name'=>'','url'=>''] atau object ->name, ->url
            $name = is_array($d) ? ($d['name'] ?? $d['filename'] ?? basename($d['url'] ?? 'Dokumen')) : ($d->name ?? $d->filename ?? basename($d->url ?? 'Dokumen'));
            $url  = is_array($d) ? ($d['url'] ?? null) : ($d->url ?? null);
            return $url ? ['name'=>$name, 'url'=>$url] : null;
        })
        ->filter()
        ->values();

    // URL detail (untuk contact query)
    $detailUrl = route('product.detail', [
        'category'    => $catSlug,
        'subcategory' => $subSlug,
        'product'     => $product->slug ?? 'produk'
    ]);
@endphp

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
                        <li class="breadcrumb-item"><a href="{{ route('products.category', $catSlug) }}">{{ $catName }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('products.subcategory', ['category'=>$catSlug,'subcategory'=>$subSlug]) }}">{{ $subName }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $titleTxt }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Title -->
        <div class="row">
            <div class="col-12">
                <div class="header-content" data-aos="fade-up" data-aos-delay="50">
                    <h1 class="page-title">{{ $titleTxt }}</h1>
                    @if($shortDesc)
                        <p class="page-description">{{ Str::limit($shortDesc, 160) }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product-detail-section py-5">
    <div class="container">
        <div class="row g-4">
            <!-- GALLERY -->
            <div class="col-lg-6">
                <div class="gallery-card glass" data-aos="fade-right">
                    <div class="gallery-main">
                        @if($mainImage)
                            <img id="mainImage" src="{{ $mainImage }}" alt="{{ $titleTxt }}" class="img-fluid">
                        @else
                            <div class="no-image">
                                <i class="fas fa-image"></i>
                                <span>No Image</span>
                            </div>
                        @endif
                        <span class="img-skeleton" aria-hidden="true"></span>
                    </div>
                    @if($thumbs->count() > 1)
                    <div class="gallery-thumbs" role="listbox" aria-label="Thumbnail gambar produk">
                        @foreach($thumbs as $i => $t)
                        <button class="thumb {{ $i===0?'active':'' }}" data-src="{{ $t }}" aria-label="Gambar {{ $i+1 }}">
                            <img src="{{ $t }}" alt="thumb {{ $i+1 }}">
                        </button>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>

            <!-- INFO -->
            <div class="col-lg-6">
                <div class="info-card glass" data-aos="fade-left">
                    {{-- Kategori breadcrumb kecil --}}
                    <div class="mini-category">
                        <a href="{{ route('products.category', $catSlug) }}">{{ $catName }}</a>
                        <span class="sep">/</span>
                        <a href="{{ route('products.subcategory', ['category'=>$catSlug,'subcategory'=>$subSlug]) }}">{{ $subName }}</a>
                    </div>

                    <h2 class="title">{{ $titleTxt }}</h2>

                    {{-- SKU + Brands --}}
                    <div class="sku-line mb-2">
                        @if($sku)
                            <span class="me-3 sku-text"><i class="fas fa-barcode"></i> SKU: {{ $sku }}</span>
                        @endif
                        @if(count($brandList))
                            <span class="brands">
                                <i class="fas fa-tags"></i>
                                @foreach(array_slice($brandList, 0, 6) as $b)
                                    <span class="badge brand-badge">{{ $b }}</span>
                                @endforeach
                                @if(count($brandList) > 6)
                                    <span class="badge brand-badge more">+{{ count($brandList)-6 }}</span>
                                @endif
                            </span>
                        @endif
                    </div>

                    {{-- Harga --}}
                    <div class="price-line">
                        @if($priceStr)
                            <span class="price-main">{{ $priceStr }}</span>
                            @if($priceStrike && $priceStrike > $price)
                                <del class="price-strike">{{ $strikeStr }}</del>
                            @endif
                            @if(strtoupper($currency) !== 'IDR')
                                <small class="currency-note">({{ strtoupper($currency) }})</small>
                            @endif
                        @else
                            <span class="price-muted">Harga: Hubungi kami</span>
                        @endif
                    </div>

                    {{-- Atribut chips --}}
                    @if($attrs->count())
                    <div class="attr-chips">
                        @foreach($attrs->take(8) as $a)
                            <span class="chip">{{ Str::limit($a, 28) }}</span>
                        @endforeach
                    </div>
                    @endif

                    {{-- CTA --}}
                    <div class="cta-row">
                        <a href="{{ route('contact') }}?product={{ $product->slug ?? '' }}&ref={{ urlencode($detailUrl) }}" class="btn btn-primary btn-lg flex-fill">
                            <i class="fas fa-phone"></i> Konsultasi / Penawaran
                        </a>
                        <a href="#tab-docs" class="btn btn-outline-primary btn-lg">
                            <i class="fas fa-file-download"></i> Dokumen
                        </a>
                    </div>

                    {{-- Keunggulan ringkas (opsional) --}}
                    @if($shortDesc)
                        <div class="shortdesc">
                            {!! nl2br(e(Str::limit($shortDesc, 300))) !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- TABS --}}
        <div class="row mt-4">
            <div class="col-12">
                <div class="tabs-card glass" data-aos="fade-up">
                    <div class="tabs-nav" role="tablist">
                        <button class="tab-btn active" data-target="#tab-desc">Deskripsi</button>
                        <button class="tab-btn" data-target="#tab-spec">Spesifikasi</button>
                        <button class="tab-btn" data-target="#tab-docs">Dokumen</button>
                    </div>
                    <div class="tabs-content">
                        <div id="tab-desc" class="tab-pane active">
                            @if($longDesc)
                                <div class="rte">{!! $longDesc !!}</div>
                            @elseif($shortDesc)
                                <p class="muted">{{ $shortDesc }}</p>
                            @else
                                <p class="muted">Deskripsi produk belum tersedia.</p>
                            @endif
                        </div>
                        <div id="tab-spec" class="tab-pane">
                            @if($attrs->count())
                                <div class="spec-grid">
                                    @foreach($attrs as $i => $a)
                                        <div class="spec-item">
                                            <div class="spec-key">Atribut {{ $i+1 }}</div>
                                            <div class="spec-val">{{ $a }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="muted">Spesifikasi belum tersedia.</p>
                            @endif
                        </div>
                        <div id="tab-docs" class="tab-pane">
                            @if($docs->count())
                                <ul class="doc-list">
                                    @foreach($docs as $d)
                                        <li>
                                            <i class="fas fa-file-alt"></i>
                                            <a href="{{ $d['url'] }}" target="_blank" rel="noopener">{{ $d['name'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="muted">Belum ada dokumen yang diunggah.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- RELATED PRODUCTS --}}
        @php
            $hasRelated = isset($relatedProducts) && $relatedProducts && $relatedProducts->count() > 0;
        @endphp
        @if($hasRelated)
        <div class="row mt-4">
            <div class="col-12">
                <div class="related-card glass" data-aos="fade-up">
                    <div class="related-head">
                        <h3 class="related-title"><i class="fas fa-boxes-stacked"></i> Produk Terkait</h3>
                        <a href="{{ route('products.subcategory', ['category'=>$catSlug, 'subcategory'=>$subSlug]) }}" class="btn btn-outline-primary btn-sm">
                            Lihat Semua
                        </a>
                    </div>
                    <div class="products-grid related-grid">
                        @foreach($relatedProducts as $index => $rp)
                            @php
                                $rCatSlug = optional(optional($rp->subcategory)->category)->slug ?? optional($rp->category)->slug ?? 'kategori';
                                $rSubSlug = optional($rp->subcategory)->slug ?? 'umum';
                                $rUrl = route('product.detail', ['category'=>$rCatSlug,'subcategory'=>$rSubSlug,'product'=>$rp->slug]);
                                $rImg = $imgPublic(data_get($rp, 'images.0.image_path'));
                                $rPrice = $formatPrice($rp->price ?? null, $rp->currency ?? 'IDR');
                            @endphp
                            <div class="product-card mini" data-aos="fade-up" data-aos-delay="{{ $index*60 }}">
                                <div class="product-image">
                                    <span class="img-skeleton" aria-hidden="true"></span>
                                    @if($rImg)
                                        <img src="{{ $rImg }}" alt="{{ $rp->name }}">
                                    @else
                                        <div class="no-image small">
                                            <i class="fas fa-image"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="product-content">
                                    <div class="product-category">
                                        <a href="{{ route('products.subcategory', ['category'=>$rCatSlug,'subcategory'=>$rSubSlug]) }}">
                                            {{ optional(optional($rp->subcategory)->category)->name ?? optional($rp->category)->name ?? 'Uncategorized' }}
                                        </a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="{{ $rUrl }}">{{ $rp->name }}</a>
                                    </h3>
                                    <div class="product-price">
                                        @if($rPrice)
                                            <span class="price">{{ $rPrice }}</span>
                                        @else
                                            <span class="text-muted">Hubungi</span>
                                        @endif
                                    </div>
                                    <div class="product-actions">
                                        <a href="{{ $rUrl }}" class="btn btn-outline-primary btn-sm w-100">
                                            <i class="fas fa-eye"></i> Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div> <!-- /grid -->
                </div>
            </div>
        </div>
        @endif
    </div>

    <button class="back-to-top" aria-label="Kembali ke atas">
        <i class="fas fa-arrow-up"></i>
    </button>
</section>

<style>
/* =====================================================
   THEME TOKENS (konsisten)
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
body{ background:var(--page); color:var(--ink); transition: background-color .25s ease, color .25s ease; }

/* =========================================
   HEADER (reuse dari list)
   ========================================= */
.page-header{
  position:relative; color:#fff; padding: 86px 0 48px; overflow:hidden;
  background:
    radial-gradient(1200px 300px at -10% -10%, rgba(255,255,255,.12), transparent 60%),
    radial-gradient(800px 300px at 120% 10%, rgba(255,255,255,.06), transparent 60%),
    linear-gradient(135deg, var(--brand-1), var(--brand-3) 55%, var(--brand-2));
}
.page-header .header-layer{ position:absolute; inset:0; background:linear-gradient(0deg, rgba(0,0,0,.35), transparent 60%); }
.header-content{ position:relative; z-index:2; text-align:center; }
.page-title{ font-size: clamp(2rem, 1.3rem + 2vw, 2.6rem); font-weight:900; letter-spacing:-.02em; margin-bottom:.35rem; }
.page-description{ max-width:70ch; margin:0 auto; }

/* Breadcrumbs */
.breadcrumb-nav{ position:relative; z-index:2; margin-bottom: 10px; }
.breadcrumb{ background:transparent; margin:0; padding:0; }
.breadcrumb .breadcrumb-item a{ color:#fde68a; text-decoration:none; }
.breadcrumb .breadcrumb-item.active{ color:#fff; opacity:.9; }
.breadcrumb .breadcrumb-item + .breadcrumb-item::before{ color:#fff; opacity:.6; }

/* =========================================
   DETAIL LAYOUT
   ========================================= */
.glass{ background:var(--glass); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); box-shadow: var(--shadow-1); border:1px solid rgba(255,255,255,.18); border-radius:16px; }
.gallery-card{ padding:1rem; }
.gallery-main{ position:relative; aspect-ratio: 4/3; background:var(--soft); border:1px solid var(--line); border-radius:12px; overflow:hidden; display:grid; place-items:center; }
.gallery-main img{ width:100%; height:100%; object-fit: contain; padding:12px; }
.img-skeleton{ position:absolute; inset:0; background:linear-gradient(90deg, var(--skeleton-1) 0%, var(--skeleton-2) 50%, var(--skeleton-1) 100%); animation: shimmer 1.4s infinite; opacity:1; transition:opacity .3s; }
@keyframes shimmer{ 0%{ transform: translateX(-30%);} 100%{ transform: translateX(30%);} }
.gallery-main.img-loaded .img-skeleton{ opacity:0; visibility:hidden; }

.gallery-thumbs{ display:flex; gap:.5rem; overflow:auto; padding-top:.7rem; }
.gallery-thumbs .thumb{ border:1px solid var(--line); border-radius:10px; background:var(--card); padding:.25rem; width:72px; height:72px; display:grid; place-items:center; cursor:pointer; transition:.2s; }
.gallery-thumbs .thumb img{ width:100%; height:100%; object-fit:contain; }
.gallery-thumbs .thumb:hover{ transform: translateY(-2px); }
.gallery-thumbs .thumb.active{ outline:2px solid var(--brand-1); }

.info-card{ padding:1rem 1.2rem; }
.mini-category{ margin-bottom:.35rem; font-size:.85rem; }
.mini-category a{ color:#fff; background:linear-gradient(135deg, rgba(124,20,21,.2), rgba(220,38,38,.2)); padding:.12rem .52rem; border-radius:999px; text-decoration:none; font-weight:800; }
.mini-category .sep{ margin:0 .35rem; color:var(--muted); }
.title{ font-size:1.8rem; font-weight:900; letter-spacing:-.01em; margin-bottom:.3rem; }

.sku-line{ display:flex; align-items:center; flex-wrap:wrap; gap:.4rem .6rem; color:var(--muted); }
.sku-line .sku-text i{ color:var(--brand-2); }
.brand-badge{ background:#fff; color:#000 !important; border:1px solid var(--line); border-radius:999px; padding:.18rem .55rem; font-weight:800; font-size:.8rem; }
.brand-badge.more{ background:#f3f4f6; }

.price-line{ display:flex; align-items:baseline; gap:.6rem; margin:.35rem 0 .6rem; }
.price-main{ font-size:1.6rem; font-weight:900; color:var(--brand-1); }
.price-strike{ color:#9ca3af; }
.currency-note{ color:var(--muted); }

.attr-chips{ display:flex; flex-wrap:wrap; gap:.4rem; margin:.4rem 0 .9rem; }
.attr-chips .chip{ background:var(--soft); border:1px solid var(--line); border-radius:999px; padding:.24rem .6rem; font-weight:700; font-size:.86rem; }

.cta-row{ display:flex; gap:.6rem; margin:.6rem 0 .6rem; }
.btn{ font-weight:800; border-width:0; }
.btn-primary{ background: linear-gradient(135deg, var(--brand-2), var(--brand-1)); color:#fff; box-shadow: 0 10px 22px rgba(220,38,38,.25); }
.btn-primary:hover{ transform: translateY(-2px); box-shadow: 0 16px 28px rgba(220,38,38,.32); }
.btn-outline-primary{ color: var(--brand-1); background: transparent; border:1.6px solid var(--brand-1); border-radius:12px; }
.btn-outline-primary:hover{ color:#fff; background: linear-gradient(135deg, var(--brand-1), var(--brand-2)); border-color: transparent; transform: translateY(-2px); }

.shortdesc{ margin-top:.5rem; color:var(--ink); }
html.dark .shortdesc{ color: var(--ink); }

.tabs-card{ margin-top:1rem; }
.tabs-nav{ display:flex; gap:.4rem; border-bottom:2px solid var(--line); padding:.35rem; }
.tab-btn{ background:transparent; border:none; padding:.55rem .9rem; border-radius:10px; font-weight:900; color:var(--muted); cursor:pointer; }
.tab-btn.active{ color:#fff; background: linear-gradient(135deg, var(--brand-1), var(--brand-2)); }
.tabs-content{ padding:1rem .6rem; }
.tab-pane{ display:none; }
.tab-pane.active{ display:block; }
.rte{ line-height:1.7; }
.rte p{ margin-bottom:.6rem; }
.muted{ color:var(--muted); }

.spec-grid{ display:grid; grid-template-columns: repeat(auto-fill, minmax(260px,1fr)); gap:.6rem; }
.spec-item{ background:var(--card); border:1px solid var(--line); border-radius:12px; padding:.7rem .8rem; }
.spec-key{ font-size:.82rem; color:var(--muted); }
.spec-val{ font-weight:800; color:var(--ink); margin-top:.1rem; }

.doc-list{ list-style:none; margin:0; padding:0; display:flex; flex-direction:column; gap:.5rem; }
.doc-list li{ display:flex; align-items:center; gap:.5rem; background:var(--card); border:1px solid var(--line); border-radius:10px; padding:.6rem .7rem; }
.doc-list li i{ color:var(--brand-2); }
.doc-list a{ text-decoration:none; font-weight:800; color:var(--ink); }
.doc-list a:hover{ color:var(--brand-1); }

.related-card{ margin-top:1rem; padding:1rem; }
.related-head{ display:flex; align-items:center; justify-content:space-between; border-bottom:2px solid var(--line); padding-bottom:.6rem; margin-bottom:.8rem; }
.related-title{ font-weight:900; margin:0; display:flex; align-items:center; gap:.5rem; }

.products-grid.related-grid{ display:grid; grid-template-columns: repeat(auto-fill, minmax(260px,1fr)); gap: 1rem; }
.product-card.mini{ display:flex; flex-direction:column; border-radius:14px; overflow:hidden; background:var(--card); border:1px solid var(--line); }
.product-card.mini .product-image{ position:relative; aspect-ratio: 4/3; display:grid; place-items:center; background:var(--soft); border-bottom:1px solid var(--line-2); }
.product-card.mini .product-image img{ width:100%; height:100%; object-fit:contain; padding:10px; }
.product-card.mini .no-image.small{ color:#9ca3af; font-size:1.2rem; }
.product-card.mini .product-content{ padding:.8rem .9rem 1rem; display:flex; flex-direction:column; gap:.35rem; }
.product-card.mini .product-category a{ background: linear-gradient(135deg, rgba(124,20,21,.08), rgba(220,38,38,.08)); color:var(--brand-2); padding:.18rem .55rem; border-radius:999px; font-size:.72rem; font-weight:800; text-decoration:none; }
.product-card.mini .product-title a{ color:var(--ink); text-decoration:none; font-weight:900; }
.product-card.mini .product-title a:hover{ color:var(--brand-1); }
.product-card.mini .product-price .price{ color:var(--brand-1); font-weight:900; }
.product-card.mini .product-actions .btn{ width:100%; }

.back-to-top{
  position: fixed; right: 18px; bottom: 18px; border: none; border-radius: 999px; width: 44px; height: 44px;
  display:flex; align-items:center; justify-content:center; cursor:pointer; z-index: 40;
  background: linear-gradient(135deg, var(--brand-1), var(--brand-2)); color:#fff;
  box-shadow: 0 10px 22px rgba(220,38,38,.28); opacity: 0; transform: translateY(8px); pointer-events: none; transition: .25s;
}
.back-to-top.show{ opacity:1; transform: translateY(0); pointer-events:auto; }

/* Responsive */
@media (max-width: 992px){
  .title{ font-size:1.6rem; }
}
@media (max-width: 768px){
  .gallery-thumbs .thumb{ width:64px; height:64px; }
  .cta-row{ flex-direction:column; }
  .products-grid.related-grid{ grid-template-columns: repeat(auto-fill, minmax(220px,1fr)); }
}

/* ==== Khusus permintaan: brand teks hitam ==== */
.brand-badge, .brand-badge * { color:#000 !important; }
</style>

<script>
function markImgLoaded(img){
  const wrap = img.closest('.gallery-main');
  if (wrap) wrap.classList.add('img-loaded');
}

document.addEventListener('DOMContentLoaded', function () {
  // Skeleton hide when loaded
  const mainImg = document.getElementById('mainImage');
  if (mainImg){
    if (mainImg.complete){ markImgLoaded(mainImg); }
    else{
      mainImg.addEventListener('load', ()=>markImgLoaded(mainImg));
      mainImg.addEventListener('error', ()=>markImgLoaded(mainImg));
    }
  }

  // Thumbnails click → swap
  document.querySelectorAll('.gallery-thumbs .thumb').forEach(btn=>{
    btn.addEventListener('click', ()=>{
      const src = btn.getAttribute('data-src');
      if (!src || !mainImg) return;
      document.querySelectorAll('.gallery-thumbs .thumb').forEach(b=>b.classList.remove('active'));
      btn.classList.add('active');
      mainImg.src = src;
    });
  });

  // Tabs
  const btns = document.querySelectorAll('.tab-btn');
  const panes = document.querySelectorAll('.tab-pane');
  btns.forEach(b=>{
    b.addEventListener('click', ()=>{
      btns.forEach(x=>x.classList.remove('active'));
      panes.forEach(p=>p.classList.remove('active'));
      b.classList.add('active');
      const target = document.querySelector(b.dataset.target);
      if (target) target.classList.add('active');
      // scroll anchor if docs tab clicked via CTA
      if (b.dataset.target === '#tab-docs') {
        document.getElementById('tab-docs').scrollIntoView({behavior:'smooth', block:'start'});
      }
    });
  });

  // Smooth anchor for CTA Dokumen
  const docsCta = document.querySelector('a[href="#tab-docs"]');
  if (docsCta){
    docsCta.addEventListener('click', (e)=>{
      e.preventDefault();
      document.querySelector('.tab-btn[data-target="#tab-docs"]').click();
    });
  }

  // back-to-top
  const btt = document.querySelector('.back-to-top');
  const onScroll = ()=>{ if (window.scrollY > 350) btt.classList.add('show'); else btt.classList.remove('show'); };
  window.addEventListener('scroll', onScroll);
  btt.addEventListener('click', ()=>window.scrollTo({top:0, behavior:'smooth'}));
  onScroll();
});
</script>
@endsection
