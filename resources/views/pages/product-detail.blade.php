@extends('components.layout')

@section('title', isset($product) ? $product->name : ($title ?? 'Detail Produk'))

@section('content')
@php
    // ===== Helpers =====
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

    // ===== Derivasi data dasar produk =====
    $catObj   = optional(optional($product->subcategory)->category) ?? optional($product->category);
    $catName  = $catObj->name ?? 'Kategori';
    $catSlug  = $catObj->slug ?? 'kategori';
    $subObj   = optional($product->subcategory);
    $subName  = $subObj->name ?? 'Umum';
    $subSlug  = $subObj->slug ?? 'umum';

    $titleTxt = $product->name ?? 'Produk';
    $sku      = $product->sku ?? null;

    // Brand list
    $brandList = [];
    if (is_array($product->brands ?? null)) {
        $brandList = array_filter(array_map('trim', $product->brands));
    } elseif (!empty($product->brands ?? null)) {
        $brandList = array_filter(array_map('trim', preg_split('/[;,|]/', $product->brands)));
    }

    // Gambar
    $images = collect($product->images ?? [])->pluck('image_path')->filter()->values();
    if ($images->isEmpty()) {
        $firstImg = data_get($product, 'image_path') ?: data_get($product, 'featured_image');
        if ($firstImg) $images = collect([$firstImg]);
    }
    $mainImage = $imgPublic($images->first());
    $thumbs    = $images->slice(0, 8)->map(fn($p) => $imgPublic($p));

    // Atribut (maks 10)
    $attrs = collect(range(1,10))
        ->map(fn($i) => $product->{'attr'.$i} ?? null)
        ->filter()
        ->values();

    // URL detail (untuk WA pesan)
    $detailUrl = route('product.detail', [
        'category'    => $catSlug,
        'subcategory' => $subSlug,
        'product'     => $product->slug ?? 'produk'
    ]);

    // ===== Data Marketing + link WA (otomatis isi pesan) =====
    $normalizePhone = function($number){
        $digits = preg_replace('/\D+/', '', $number ?? '');
        if ($digits === '') return null;
        if (strpos($digits, '0') === 0) $digits = '62'.substr($digits,1);
        if (strpos($digits, '62') !== 0) $digits = '62'.$digits;
        return $digits;
    };

    $marketing = [
        ['name'=>'Yovien Agustina','phone'=>'0813-8523-1149'],
        ['name'=>'Siti','phone'=>'0813 8252 3722'],
        ['name'=>'Kurnia','phone'=>'0813 8480 8218'],
        ['name'=>'Sari','phone'=>'0813 1682 6959'],
        ['name'=>'Edy Purwanto','phone'=>'0815 1451 5990'],
    ];

    $waText = rawurlencode("Halo, saya tertarik dengan {$titleTxt} ({$detailUrl}). Mohon info penawaran.");
    $marketing = collect($marketing)->map(function($m) use ($normalizePhone, $waText){
        $wa = $normalizePhone($m['phone']);
        $m['wa'] = $wa ? "https://wa.me/{$wa}?text={$waText}" : null;
        $m['tel'] = $wa ? "tel:+{$wa}" : null;
        return $m;
    });
@endphp

{{-- =========================
     HEADER
     ========================= --}}
<section class="simple-header">
    <div class="container">
        <nav class="breadcrumb-nav" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products') }}">Produk</a></li>
            </ol>
        </nav>

        <div class="simple-head">
            <h1 class="page-title">{{ $titleTxt }}</h1>
        </div>
    </div>
</section>

<section class="product-detail-section py-5">
    <div class="container">
        <div class="row g-4">
            <!-- GALLERY -->
            <div class="col-lg-6">
                <div class="gallery-card glass card-contrast" data-aos="fade-right">
                    <div class="gallery-main">
                        @if($mainImage)
                            <img id="mainImage" src="{{ $mainImage }}" alt="{{ $titleTxt }}" class="img-fluid lb-trigger" role="button" tabindex="0" aria-label="Perbesar gambar">
                        @else
                            <div class="no-image">
                                <i class="fas fa-image"></i>
                                <span>No Image</span>
                            </div>
                        @endif
                        <span class="img-skeleton" aria-hidden="true"></span>

                        @if($thumbs->count() > 1)
                        <button class="nav-btn nav-prev" type="button" aria-label="Gambar sebelumnya">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="nav-btn nav-next" type="button" aria-label="Gambar berikutnya">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                        @endif
                    </div>

                    @if($thumbs->count() > 1)
                    <div class="gallery-indicators" role="tablist" aria-label="Indikator galeri">
                        @foreach($thumbs as $i => $t)
                            <button class="dot {{ $i===0?'active':'' }}" data-index="{{ $i }}" aria-label="Slide {{ $i+1 }}" aria-current="{{ $i===0?'true':'false' }}"></button>
                        @endforeach
                    </div>
                    @endif

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
                <div class="info-card glass card-contrast" data-aos="fade-left">
                    <div class="mini-category">
                        <a href="{{ route('products.category', $catSlug) }}">{{ $catName }}</a>
                        <span class="sep">/</span>
                        <a href="{{ route('products.subcategory', ['category'=>$catSlug,'subcategory'=>$subSlug]) }}">{{ $subName }}</a>
                    </div>

                    <h2 class="title">{{ $titleTxt }}</h2>

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

                    @if($attrs->count())
                    <div class="attr-chips">
                        @foreach($attrs->take(10) as $a)
                            <span class="chip">{{ Str::limit($a, 40) }}</span>
                        @endforeach
                    </div>
                    @endif

                    <div class="cta-row">
                        <a href="#" id="openMarketingModal" class="btn btn-primary btn-lg flex-fill">
                            <i class="fas fa-phone"></i> Konsultasi / Penawaran
                        </a>
                    </div>

                </div>
            </div>
        </div>

        {{-- ====== SPESIFIKASI (GRID) ====== --}}
        <div class="row mt-4">
            <div class="col-12">
                <div class="spec-card glass card-contrast" data-aos="fade-up" aria-labelledby="specTitle">
                    <div class="spec-head">
                        <div class="spec-head-left">
                            <div class="spec-chip">Spesifikasi</div>
                            <h3 id="specTitle" class="spec-title">Detail Spesifikasi Produk</h3>
                            <p class="spec-subtitle">Klik ikon salin untuk menyalin nilai per item, atau salin semua.</p>
                        </div>
                        <div class="spec-head-right">
                            <button type="button" class="btn btn-outline-contrast btn-sm spec-copy-all" title="Salin seluruh spesifikasi">
                                <i class="fas fa-clipboard"></i> Salin Semua
                            </button>
                        </div>
                    </div>

                    @if($attrs->count())
                        <div class="spec-grid" role="list">
                            @foreach($attrs as $i => $a)
                                @php $val = trim($a); @endphp
                                <div class="spec-tile" role="listitem" data-index="{{ $i }}">
                                    <div class="tile-head">
                                        <div class="tile-key-wrap">
                                            <span class="tile-bullet" aria-hidden="true"></span>
                                            <span class="tile-key">Atribut {{ $i+1 }}</span>
                                        </div>
                                        <button class="tile-copy" type="button" data-text="{{ $val }}" aria-label="Salin Atribut {{ $i+1 }}" title="Salin nilai">
                                            <i class="fas fa-copy" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <div class="tile-body">
                                        {{ $val }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="muted px-3 pb-3">Spesifikasi belum tersedia.</p>
                    @endif
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
                <div class="related-card glass card-contrast" data-aos="fade-up">
                    <div class="related-head">
                        <h3 class="related-title"><i class="fas fa-boxes-stacked"></i> Produk Terkait</h3>
                        <a href="{{ route('products.subcategory', ['category'=>$catSlug, 'subcategory'=>$subSlug]) }}" class="btn btn-outline-contrast btn-sm">
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
                            @endphp
                            <div class="product-card mini card-contrast" data-aos="fade-up" data-aos-delay="{{ $index*60 }}">
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
                                    <div class="product-actions">
                                        <a href="{{ $rUrl }}" class="btn btn-outline-contrast btn-sm w-100">
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
</section>

<!-- Modal Marketing -->
<div id="marketingModal" class="modal-overlay" hidden>
  <div class="modal-card card-contrast" role="dialog" aria-modal="true" aria-labelledby="marketingTitle">
    <button class="modal-close" type="button" aria-label="Tutup">&times;</button>

    <div class="modal-header">
      <div class="modal-header-left">
        <div class="modal-chip">Konsultasi / Penawaran</div>
        <h3 id="marketingTitle" class="modal-title" tabindex="-1">Hubungi Tim Marketing</h3>
        <p class="modal-subtitle">Pilih kontak untuk chat WhatsApp — pesan otomatis menyertakan <strong>{{ $titleTxt }}</strong> & tautan produk ini.</p>
      </div>
      <div class="modal-header-right">
        <i class="fas fa-headset"></i>
      </div>
    </div>

    <div class="contact-grid">
      @foreach($marketing as $m)
        @php
          $initials = collect(explode(' ', $m['name']))->map(fn($p)=>mb_substr($p,0,1))->take(2)->implode('');
        @endphp
        <div class="contact-item">
            <div class="contact-row">
                <div class="contact-avatar" aria-hidden="true">{{ $initials }}</div>
                <div class="contact-meta">
                    <div class="contact-name">{{ $m['name'] }}</div>
                    <div class="contact-phone"><i class="fas fa-phone-alt"></i> {{ $m['phone'] }}</div>
                </div>
            </div>
            <div class="contact-actions">
                @if($m['wa'])
                <a class="btn btn-primary btn-sm w-100" href="{{ $m['wa'] }}" target="_blank" rel="noopener">
                    <i class="fab fa-whatsapp"></i> Chat WhatsApp
                </a>
                @endif
                @if($m['tel'])
                <a class="btn btn-outline-contrast btn-sm w-100" href="{{ $m['tel'] }}">
                    <i class="fas fa-phone-alt"></i> Panggil
                </a>
                @endif
            </div>
        </div>
      @endforeach
    </div>
  </div>
</div>

<!-- LIGHTBOX -->
<div id="imageLightbox" class="image-lightbox" role="dialog" aria-modal="true" aria-label="Pratinjau gambar" hidden>
  <img class="ilb-img" src="" alt="Gambar produk">
  <button class="ilb-close" type="button" aria-label="Tutup">&times;</button>
  <button class="ilb-nav ilb-prev" type="button" aria-label="Gambar sebelumnya"><i class="fas fa-chevron-left"></i></button>
  <button class="ilb-nav ilb-next" type="button" aria-label="Gambar berikutnya"><i class="fas fa-chevron-right"></i></button>
  <div class="ilb-counter" aria-live="polite">1 / 1</div>
</div>

<style>
/* =====================================================
   THEME TOKENS
   ===================================================== */
:root, html[data-theme="light"], html[data-bs-theme="light"], body[data-theme="light"]{
  --brand-1:#7a0e0e; --brand-2:#a30f0f; --accent:#ef4444;
  --ink:#111827; --muted:#6b7280;
  --line:#e5e7eb; --line-2:#f3f4f6;
  --page:#fff5f5; --glass: rgba(255,255,255,.72);
  --shadow-1: 0 8px 24px rgba(0,0,0,.08);
  --ring: 0 0 0 3px rgba(163,15,15,.22);
  /* Breadcrumb divider color (LIGHT = black) */
  --crumb-sep:#000;
}
[data-theme="dark"], html.dark, body.dark, html[data-bs-theme="dark"], body[data-bs-theme="dark"]{
  --brand-1:#ff4e4e; --brand-2:#d32f2f; --accent:#ff6b6b;
  --ink:#e5e7eb; --muted:#cbd5e1;
  --line:#2b2f33; --line-2:#22262a;
  --page:#0b0b0d; --glass: rgba(18,18,20,.65);
  --shadow-1: 0 8px 24px rgba(0,0,0,.55);
  --ring: 0 0 0 3px rgba(255,78,78,.25);
  /* Breadcrumb divider color (DARK = white) */
  --crumb-sep:#fff;
}
@media (prefers-color-scheme: dark){
  :root:not([data-theme="light"]):not(.light):not([data-bs-theme="light"]){
    --brand-1:#ff4e4e; --brand-2:#d32f2f; --accent:#ff6b6b;
    --ink:#e5e7eb; --muted:#cbd5e1; --line:#2b2f33; --line-2:#22262a; --page:#0b0b0d; --glass: rgba(18,18,20,.65);
    --shadow-1: 0 8px 24px rgba(0,0,0,.55);
    --ring: 0 0 0 3px rgba(255,78,78,.25);
    --crumb-sep:#fff;
  }
}

/* ========== Global ========== */
body{ background:var(--page); color:var(--ink); transition: background-color .25s ease, color .25s ease; }
.simple-header{ padding: 18px 0 10px; }

/* BREADCRUMB */
.breadcrumb{
  background:transparent; margin:0 0 6px; padding:0;
  /* Set Bootstrap vars untuk slash */
  --bs-breadcrumb-divider: "/";
  --bs-breadcrumb-divider-color: var(--crumb-sep);
}
.breadcrumb .breadcrumb-item a{
  color: var(--brand-1); text-decoration:none; font-weight:800;
}
/* Pastikan warna slash mengikuti tema */
.breadcrumb .breadcrumb-item + .breadcrumb-item::before{
  color: var(--crumb-sep) !important;
}

.page-title{ font-size: clamp(1.6rem, 1.2rem + 1vw, 2.2rem); font-weight:900; letter-spacing:-.02em; margin: 0; }

/* =====================================================
   CARD CONTAINER LOCKED
   ===================================================== */
.card-contrast{
  position: relative;
  overflow: hidden;
  border-radius: 16px;
  border: 1px solid rgba(255,255,255,.075) !important;
  background:
    radial-gradient(1200px 600px at -10% -20%, rgba(220,38,38,.18), transparent 55%),
    radial-gradient(900px 480px at 120% 10%, rgba(124,10,10,.22), transparent 55%),
    linear-gradient(180deg, #171214, #0f0b0d);
  color: #fff !important;
  box-shadow:
    0 10px 30px rgba(0,0,0,.35),
    inset 0 1px 0 rgba(255,255,255,.04);
  backdrop-filter: blur(8px);
}
.card-contrast * { color: #fff; }
.card-contrast .muted, .card-contrast .sku-line{ color: rgba(255,255,255,.8); }

/* Beam hover */
.card-contrast::after{
  content:''; position:absolute; inset:-40%; pointer-events:none;
  background: conic-gradient(from 180deg at 50% 50%, transparent 0 12%, rgba(255,255,255,.06) 13% 17%, transparent 18% 100%);
  transform: translateY(0);
  transition: transform .6s ease;
}
.card-contrast:hover::after{ transform: translateY(-3%); }

/* Gallery */
.gallery-card{ padding:1rem; }
.card-contrast .gallery-main{
  position:relative; aspect-ratio: 4/3;
  background: linear-gradient(180deg, #161012, #0f0b0d);
  border:1px solid rgba(255,255,255,.08);
  border-radius:12px; overflow:hidden; display:grid; place-items:center;
}
.card-contrast .gallery-main img{ width:100%; height:100%; object-fit:contain; padding:12px; filter: drop-shadow(0 10px 24px rgba(0,0,0,.45)); cursor: zoom-in; }
.card-contrast .img-skeleton{ position:absolute; inset:0; background:linear-gradient(90deg, rgba(255,255,255,.06) 0%, rgba(255,255,255,.12) 50%, rgba(255,255,255,.06) 100%); animation: shimmer 1.4s infinite; opacity:1; transition:opacity .3s; }
@keyframes shimmer{ 0%{ transform: translateX(-30%);} 100%{ transform: translateX(30%);} }
.card-contrast .gallery-main.img-loaded .img-skeleton{ opacity:0; visibility:hidden; }

/* Prev/Next nav */
.nav-btn{
  position:absolute; top:50%; transform:translateY(-50%);
  width:42px; height:42px; border-radius:999px;
  display:grid; place-items:center; border:1px solid rgba(255,255,255,.28);
  background: rgba(255,255,255,.08); cursor:pointer; transition:.2s;
}
.nav-btn:hover{ background: rgba(255,255,255,.16); transform: translateY(-50%) scale(1.05); }
.nav-prev{ left:10px; }
.nav-next{ right:10px; }

/* Indicators */
.gallery-indicators{
  display:flex; gap:.4rem; justify-content:center; padding:.6rem 0 0; user-select:none;
}
.gallery-indicators .dot{
  width:10px; height:10px; border-radius:999px; border:1px solid rgba(255,255,255,.6);
  background: transparent; cursor:pointer; transition:.2s;
}
.gallery-indicators .dot.active{ background:#fff; transform: scale(1.12); }

/* Thumbs */
.card-contrast .gallery-thumbs{ display:flex; gap:.55rem; overflow:auto; padding-top:.75rem; }
.card-contrast .gallery-thumbs .thumb{
  border:1px solid rgba(255,255,255,.12);
  border-radius:10px; background:rgba(255,255,255,.03);
  padding:.25rem; width:74px; height:74px; display:grid; place-items:center; cursor:pointer; transition:.22s;
}
.card-contrast .gallery-thumbs .thumb img{ width:100%; height:100%; object-fit:contain; }
.card-contrast .gallery-thumbs .thumb:hover{ transform: translateY(-2px); background:rgba(255,255,255,.06); }
.card-contrast .gallery-thumbs .thumb.active{ outline:2px solid #ef4444; }

/* Info */
.info-card{ padding:1rem 1.2rem; }
.card-contrast .mini-category{ margin-bottom:.35rem; font-size:.85rem; }
.card-contrast .mini-category a{
  color:#fff; background: linear-gradient(135deg, rgba(239,68,68,.20), rgba(163,15,15,.20));
  padding:.12rem .52rem; border-radius:999px; text-decoration:none; font-weight:800; border:1px solid rgba(255,255,255,.18);
}
.card-contrast .mini-category .sep{ margin:0 .35rem; color:rgba(255,255,255,.65); }

.title{ font-size:1.9rem; font-weight:900; letter-spacing:-.01em; margin-bottom:.35rem; }

/* Badges */
.card-contrast .brand-badge{
  background: rgba(255,255,255,.08);
  color:#fff;
  border:1px solid rgba(255,255,255,.24);
  border-radius:999px; padding:.2rem .58rem; font-weight:800; font-size:.82rem;
}
.card-contrast .brand-badge.more{ background:rgba(255,255,255,.06); }

/* Chips */
.card-contrast .attr-chips{ display:flex; flex-wrap:wrap; gap:.42rem; margin:.5rem 0 .95rem; }
.card-contrast .attr-chips .chip{
  background: rgba(255,255,255,.06);
  border:1px solid rgba(255,255,255,.18);
  border-radius:999px; padding:.28rem .64rem; font-weight:800; font-size:.88rem; color:#fff;
}

/* Buttons */
.btn{ font-weight:900; border-width:0; border-radius:12px; transition:.18s ease; }
.btn-primary{
  background: linear-gradient(135deg, #d32f2f, #a30f0f);
  color:#fff; box-shadow: 0 12px 24px rgba(211,47,47,.32);
}
.btn-primary:hover{ transform: translateY(-2px); box-shadow: 0 18px 32px rgba(211,47,47,.40); }
.btn-outline-contrast{
  color:#fff; background: transparent; border:1.8px solid rgba(255,255,255,.65);
}
.btn-outline-contrast:hover{
  color:#fff; background: linear-gradient(135deg, #a30f0f, #7a0e0e); border-color: transparent; transform: translateY(-2px);
}

/* ===================== SPEC CARD (GRID) ===================== */
.spec-card{ margin-top:1rem; }
.spec-head{
  display:flex; align-items:center; justify-content:space-between; gap:1rem;
  padding: 16px 18px;
  background:
    radial-gradient(1000px 400px at -10% -60%, rgba(239,68,68,.28), transparent 60%),
    linear-gradient(180deg, rgba(20,15,17,.75), rgba(15,11,13,.9));
  border-bottom:1px solid rgba(255,255,255,.12);
}
.spec-chip{
  display:inline-block; font-weight:900; font-size:.7rem; letter-spacing:.08em; text-transform:uppercase;
  background: rgba(255,255,255,.12); border:1px solid rgba(255,255,255,.25);
  padding:.22rem .5rem; border-radius:999px;
}
.spec-title{ font-size:1.25rem; font-weight:900; margin:.25rem 0 0; }
.spec-subtitle{ margin:.15rem 0 0; color:rgba(255,255,255,.86); }
.spec-head-right .btn{ white-space:nowrap; }

/* Grid tiles */
.card-contrast .spec-grid{
  display:grid;
  grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
  gap: .9rem;
  padding: 14px 16px 18px;
}
.card-contrast .spec-tile{
  display:flex; flex-direction:column; gap:.6rem;
  min-height: 136px;
  background: rgba(255,255,255,.04);
  border:1px solid rgba(255,255,255,.12);
  border-radius:14px;
  padding: .95rem;
  position:relative; overflow:hidden;
  transition: transform .15s ease, border-color .15s ease, box-shadow .15s ease, background .15s ease;
}
.card-contrast .spec-tile::before{
  content:''; position:absolute; inset:0 auto auto 0; width:100%; height:4px;
  background: linear-gradient(90deg,#d32f2f, #7a0e0e); opacity:.9;
}
.card-contrast .spec-tile:hover{
  transform: translateY(-3px);
  border-color: rgba(255,255,255,.22);
  background: rgba(255,255,255,.055);
  box-shadow: 0 14px 32px rgba(0,0,0,.38);
}

.card-contrast .tile-head{ display:flex; align-items:center; justify-content:space-between; gap:.6rem; }
.card-contrast .tile-key-wrap{ display:flex; align-items:center; gap:.5rem; min-width:0; }
.card-contrast .tile-bullet{
  width:10px; height:10px; border-radius:999px;
  background: linear-gradient(135deg,#d32f2f,#7a0e0e);
  box-shadow: 0 0 0 3px rgba(211,47,47,.22);
}
.card-contrast .tile-key{
  font-size:.78rem; font-weight:900; letter-spacing:.06em; text-transform:uppercase;
  color: rgba(255,255,255,.88); white-space:nowrap;
}
.card-contrast .tile-copy{
  border:1px solid rgba(255,255,255,.25);
  background: rgba(255,255,255,.08);
  color:#fff; width:36px; height:36px; border-radius:10px;
  display:grid; place-items:center; flex-shrink:0;
  transition:.15s ease; cursor:pointer;
}
.card-contrast .tile-copy:hover{ background: rgba(255,255,255,.14); transform: translateY(-1px); }
.card-contrast .tile-copy.copied{ border-color: transparent; background: linear-gradient(135deg, #a30f0f, #7a0e0e); }
.card-contrast .tile-body{
  font-weight:900; font-size:1rem; color:#fff; line-height:1.5;
  word-break: break-word; display:-webkit-box; -webkit-line-clamp:6; -webkit-box-orient:vertical; overflow:hidden;
}

/* Mobile adjustments */
@media (max-width: 480px){
  .card-contrast .spec-grid{ grid-template-columns: 1fr; }
}

/* ===================== LIGHTBOX ===================== */
[hidden]{ display:none !important; }

.image-lightbox{
  position:fixed; inset:0; z-index: 99999;
  background: rgba(0,0,0,.88);
  backdrop-filter: blur(2px);
  display:grid; place-items:center;
  animation: overlayIn .18s ease;
}
.image-lightbox .ilb-img{
  max-width: min(96vw, 1400px);
  max-height: 90vh;
  object-fit: contain;
  border-radius: 10px;
  box-shadow: 0 20px 60px rgba(0,0,0,.6);
  transition: transform .18s ease;
}
.ilb-close{
  position: absolute; top:16px; right:18px;
  width:42px; height:42px; border-radius:999px; font-size:24px; line-height:1;
  border:1px solid rgba(255,255,255,.35);
  background: rgba(255,255,255,.12); color:#fff; cursor:pointer;
}
.ilb-close:hover{ background: rgba(255,255,255,.18); }
.ilb-nav{
  position:absolute; top:50%; transform:translateY(-50%);
  width:48px; height:48px; border-radius:999px;
  display:grid; place-items:center; cursor:pointer;
  border:1px solid rgba(255,255,255,.35);
  background: rgba(255,255,255,.12); color:#fff;
}
.ilb-prev{ left:18px; }
.ilb-next{ right:18px; }
.ilb-nav:hover{ background: rgba(255,255,255,.18); }
.ilb-counter{
  position:absolute; bottom:16px; left:50%; transform:translateX(-50%);
  background: rgba(255,255,255,.12);
  border:1px solid rgba(255,255,255,.25);
  padding:.25rem .6rem; border-radius:999px; font-weight:800; color:#fff;
}

/* ===================== Modal kontak ===================== */
.modal-overlay{
  position: fixed; inset: 0;
  display: flex; align-items: center; justify-content: center;
  padding: 24px; z-index: 99999;
  background: rgba(0,0,0,.55);
  backdrop-filter: blur(2px);
  animation: overlayIn .18s ease;
}
@keyframes overlayIn { from{ opacity: 0; } to{ opacity: 1; } }

.modal-card{
  position: relative;
  width: min(960px, 96vw);
  max-height: 88vh; overflow: hidden;
  padding: 0; border-radius: 18px;
  box-shadow: 0 40px 80px rgba(0,0,0,.45);
  transform: translateY(8px) scale(.98);
  animation: modalIn .28s ease forwards;
}
@keyframes modalIn { to{ transform: translateY(0) scale(1); } }

.modal-header{
  display:flex; align-items:center; justify-content:space-between; gap:.8rem;
  padding: 16px 18px;
  background:
    radial-gradient(1000px 400px at -10% -60%, rgba(239,68,68,.28), transparent 60%),
    linear-gradient(180deg, rgba(20,15,17,.75), rgba(15,11,13,.9));
  border-bottom: 1px solid rgba(255,255,255,.12);
  position: sticky; top:0; z-index:1;
}
.modal-chip{
  display:inline-block; font-weight:900; font-size:.7rem; letter-spacing:.08em; text-transform:uppercase;
  background: rgba(255,255,255,.12); border:1px solid rgba(255,255,255,.25);
  padding:.22rem .5rem; border-radius:999px;
}
.modal-title{ font-size: 1.35rem; font-weight: 900; margin:.25rem 0 0; }
.modal-subtitle{ margin:.15rem 0 0; color: rgba(255,255,255,.86); }
.modal-header-right i{ font-size: 28px; opacity:.9; }

/* Tombol close modal kontak */
.modal-close{
  position:absolute; top:10px; right:12px; width:36px; height:36px; border-radius:999px;
  border:1px solid rgba(255,255,255,.25);
  background: rgba(255,255,255,.1); color:#fff; cursor:pointer; font-size: 22px; line-height: 1;
  z-index: 5; pointer-events: auto;
}
.modal-close:hover{ background: rgba(255,255,255,.18); }

/* Isi modal kontak */
.contact-grid{
  padding: 14px 16px 18px;
  display:grid; grid-template-columns: repeat(auto-fill, minmax(280px,1fr)); gap:.9rem;
  overflow: auto; max-height: calc(88vh - 78px);
}
.contact-item{
  display:flex; flex-direction:column; gap:.75rem;
  background: rgba(255,255,255,.05); border:1px solid rgba(255,255,255,.14);
  border-radius:12px; padding:.85rem .9rem;
  transition: transform .15s ease, box-shadow .15s ease, border-color .15s ease;
}
.contact-item:hover{
  transform: translateY(-2px);
  box-shadow: 0 14px 28px rgba(0,0,0,.35);
  border-color: rgba(255,255,255,.22);
}
.contact-row{ display:flex; align-items:center; gap:.8rem; }
.contact-avatar{
  width:54px; height:54px; border-radius:999px; display:grid; place-items:center; font-weight:900;
  background: linear-gradient(135deg, #d32f2f, #7a0e0e);
  border:1px solid rgba(255,255,255,.3);
  box-shadow: inset 0 1px 0 rgba(255,255,255,.2);
}
.contact-meta{ min-width: 0; }
.contact-name{ font-weight:900; font-size:1rem; margin:0; }
.contact-phone{ font-size:.95rem; color: rgba(255,255,255,.9); margin-top:.25rem; }
.contact-actions{ display:flex; flex-direction:column; gap:.5rem; width:100%; }

/* Focus ring umum */
:where(a,button,select,input){ outline: none; }
:where(a,button,[role="button"],.btn,select,input):focus-visible{
  box-shadow: 0 0 0 3px rgba(239,68,68,.35);
  border-radius: 10px;
}

/* Responsif */
@media (max-width: 992px){ .title{ font-size:1.6rem; } }
@media (max-width: 768px){
  .card-contrast .gallery-thumbs .thumb{ width:64px; height:64px; }
  .cta-row{ flex-direction:column; gap:.55rem; }
  .products-grid.related-grid{ grid-template-columns: repeat(auto-fill, minmax(220px,1fr)); }
}
</style>

<script>
function markImgLoaded(img){
  const wrap = img.closest('.gallery-main');
  if (wrap) wrap.classList.add('img-loaded');
}

document.addEventListener('DOMContentLoaded', function () {
  // Skeleton → hide when loaded
  const mainImg = document.getElementById('mainImage');
  if (mainImg){
    if (mainImg.complete){ markImgLoaded(mainImg); }
    else{
      mainImg.addEventListener('load', ()=>markImgLoaded(mainImg));
      mainImg.addEventListener('error', ()=>markImgLoaded(mainImg));
    }
  }

  // ===== GALERI =====
  const thumbs = Array.from(document.querySelectorAll('.gallery-thumbs .thumb'));
  const indicators = Array.from(document.querySelectorAll('.gallery-indicators .dot'));
  let currentIndex = Math.max(0, thumbs.findIndex(b=>b.classList.contains('active')));

  function showAt(i){
    if (!thumbs.length) return;
    i = (i + thumbs.length) % thumbs.length;
    currentIndex = i;
    const btn = thumbs[i];
    const src = btn.getAttribute('data-src');
    const mainImg = document.getElementById('mainImage');
    if (src && mainImg) mainImg.src = src;
    thumbs.forEach(b=>b.classList.remove('active'));
    btn.classList.add('active');
    if (indicators.length){
      indicators.forEach((d,idx)=>{
        d.classList.toggle('active', idx===i);
        d.setAttribute('aria-current', idx===i ? 'true':'false');
      });
    }
  }

  thumbs.forEach((btn, idx)=> btn.addEventListener('click', ()=> showAt(idx)));
  indicators.forEach((dot, idx)=> dot.addEventListener('click', ()=> showAt(idx)));

  const prevBtn = document.querySelector('.nav-prev');
  const nextBtn = document.querySelector('.nav-next');
  if (prevBtn) prevBtn.addEventListener('click', ()=> showAt(currentIndex - 1));
  if (nextBtn) nextBtn.addEventListener('click', ()=> showAt(currentIndex + 1));

  // Keyboard arrows (skip jika lightbox terbuka)
  document.addEventListener('keydown', (e)=>{
    const lbCheck = document.getElementById('imageLightbox');
    if (lbCheck && !lbCheck.hidden) return;
    if (e.key === 'ArrowRight') showAt(currentIndex + 1);
    if (e.key === 'ArrowLeft') showAt(currentIndex - 1);
  });

  // ===== MODAL MARKETING =====
  const modal = document.getElementById('marketingModal');
  const openBtn = document.getElementById('openMarketingModal');
  const closeBtn = document.querySelector('.modal-close');

  function openModal(){
    if (!modal) return;
    modal.hidden = false;
    modal.classList.add('open');
    document.documentElement.style.overflow = 'hidden';
    const title = document.getElementById('marketingTitle');
    if (title) setTimeout(()=> title.focus?.(), 50);
  }
  function closeModal(){
    if (!modal) return;
    modal.hidden = true;
    modal.classList.remove('open');
    document.documentElement.style.overflow = '';
  }

  if (openBtn) openBtn.addEventListener('click', (e)=>{ e.preventDefault(); openModal(); });
  if (closeBtn) closeBtn.addEventListener('click', closeModal);
  if (modal){
    modal.addEventListener('click', (e)=>{
      if (e.target === modal || e.target.classList.contains('modal-close')) {
        closeModal();
      }
    });
    document.addEventListener('keydown', (e)=>{
      if (e.key === 'Escape' && !modal.hidden) closeModal();
    });
  }

  // ===== LIGHTBOX GAMBAR =====
  const lb = document.getElementById('imageLightbox');
  const lbImg = lb?.querySelector('.ilb-img');
  const lbPrev = lb?.querySelector('.ilb-prev');
  const lbNext = lb?.querySelector('.ilb-next');
  const lbClose = lb?.querySelector('.ilb-close');
  const lbCounter = lb?.querySelector('.ilb-counter');

  // Sumber gambar (dari PHP)
  let lbImages = @json($thumbs->values());
  @if($thumbs->isEmpty() && $mainImage)
    lbImages = [@json($mainImage)];
  @endif

  let lbIndex = 0;

  function updateCounter(){
    if (!lbCounter) return;
    lbCounter.textContent = (lbIndex + 1) + ' / ' + (lbImages.length || 1);
  }

  function showLightbox(i){
    if (!lb || !lbImg || !lbImages.length) return;
    lbIndex = (i + lbImages.length) % lbImages.length;
    lbImg.src = lbImages[lbIndex];
    updateCounter();
  }

  function openLightbox(i=0){
    if (!lb) return;
    lb.hidden = false;
    document.documentElement.style.overflow = 'hidden';
    showLightbox(i);
    lbImg.focus?.();
  }

  function closeLightbox(){
    if (!lb) return;
    lb.hidden = true;
    document.documentElement.style.overflow = '';
  }

  // Trigger: klik pada gambar utama
  const mainImgEl = document.getElementById('mainImage');
  if (mainImgEl){
    mainImgEl.addEventListener('click', ()=> openLightbox(currentIndex || 0));
    mainImgEl.addEventListener('keydown', (e)=>{ if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); openLightbox(currentIndex || 0); } });
  }

  // Navigasi lightbox
  lbPrev?.addEventListener('click', ()=> showLightbox(lbIndex - 1));
  lbNext?.addEventListener('click', ()=> showLightbox(lbIndex + 1));
  lbClose?.addEventListener('click', closeLightbox);

  // Klik background untuk tutup
  lb?.addEventListener('click', (e)=>{ if (e.target === lb) closeLightbox(); });

  // Keyboard di lightbox
  document.addEventListener('keydown', (e)=>{
    if (!lb || lb.hidden) return;
    if (e.key === 'Escape') closeLightbox();
    if (e.key === 'ArrowRight') showLightbox(lbIndex + 1);
    if (e.key === 'ArrowLeft') showLightbox(lbIndex - 1);
  });

  // Double-click pada thumbnail → buka lightbox
  document.querySelectorAll('.gallery-thumbs .thumb img').forEach((imgEl, idx)=>{
    imgEl.addEventListener('dblclick', ()=> openLightbox(idx));
  });

  // ===== SPEC: copy per tile =====
  document.querySelectorAll('.tile-copy').forEach(btn=>{
    btn.addEventListener('click', async ()=>{
      const text = btn.getAttribute('data-text') || '';
      try{
        if (navigator.clipboard?.writeText) {
          await navigator.clipboard.writeText(text);
        } else {
          const ta = document.createElement('textarea');
          ta.value = text; document.body.appendChild(ta);
          ta.select(); document.execCommand('copy'); ta.remove();
        }
        btn.classList.add('copied');
        const old = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-check" aria-hidden="true"></i>';
        setTimeout(()=>{ btn.classList.remove('copied'); btn.innerHTML = old; }, 1100);
      }catch(e){ /* ignore */ }
    });
  });

  // ===== SPEC: copy semua =====
  const copyAllBtn = document.querySelector('.spec-copy-all');
  if (copyAllBtn){
    copyAllBtn.addEventListener('click', async ()=>{
      const tiles = Array.from(document.querySelectorAll('.spec-tile'));
      const lines = tiles.map((tile, idx)=>{
        const key = `Atribut ${idx+1}`;
        const val = (tile.querySelector('.tile-body')?.textContent || '').trim();
        return `${key}: ${val}`;
      }).filter(Boolean);
      const allText = lines.join('\n');
      try{
        if (navigator.clipboard?.writeText) {
          await navigator.clipboard.writeText(allText);
        } else {
          const ta = document.createElement('textarea');
          ta.value = allText; document.body.appendChild(ta);
          ta.select(); document.execCommand('copy'); ta.remove();
        }
        const old = copyAllBtn.innerHTML;
        copyAllBtn.innerHTML = '<i class="fas fa-check"></i> Disalin';
        setTimeout(()=> copyAllBtn.innerHTML = old, 1200);
      }catch(e){ /* ignore */ }
    });
  }
});
</script>
@endsection
