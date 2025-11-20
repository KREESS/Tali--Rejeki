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

    // ===== Produk Lainnya (BATASI 20 produk, kecuali produk saat ini) =====
    $rawOthers = collect($moreProducts ?? []);
    if ($rawOthers->isEmpty()) {
        try {
            $currentProductId = $product->id ?? null;
            $rawOthers = \App\Models\Product::query()
                ->with(['category', 'subcategory.category', 'images'])
                ->when($currentProductId, function($query, $currentProductId) {
                    return $query->where('id', '!=', $currentProductId);
                })
                ->orderByDesc('updated_at')
                ->limit(20) // Batasi hanya 20 produk
                ->get();
        } catch (\Throwable $e) {
            $rawOthers = collect([]);
        }
    }

    $otherProducts = collect($rawOthers)->values();
    $hasOthers = $otherProducts->isNotEmpty();
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
                <div class="gallery-card" data-aos="fade-right">
                    <div class="gallery-main">
                        @if($mainImage)
                            <img id="mainImage" src="{{ $mainImage }}" alt="{{ $titleTxt }}" class="img-fluid lb-trigger" role="button" tabindex="0" aria-label="Perbesar gambar">
                        @else
                            <div class="no-image">
                                <i class="fas fa-image"></i>
                                <span>No Image</span>
                            </div>
                        @endif

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
                <div class="info-card" data-aos="fade-left">
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
                <div class="spec-card" data-aos="fade-up" aria-labelledby="specTitle">
                    <div class="spec-head">
                        <div class="spec-head-left">
                            <div class="spec-chip">Spesifikasi</div>
                            <h3 id="specTitle" class="spec-title">Detail Spesifikasi Produk</h3>
                            <p class="spec-subtitle">Spesifikasi lengkap produk</p>
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

        {{-- ================= PRODUK LAINNYA (1 BARIS, TANPA SCROLLBAR) ================= --}}
        @if($hasOthers)
        <div class="row mt-4">
            <div class="col-12">
                <div class="strip-card" data-aos="fade-up">
                    <div class="strip-head">
                        <h3 class="strip-title">Produk Lainnya</h3>
                        <div class="strip-actions">
                            <a href="{{ route('products') }}" class="btn btn-outline-primary btn-sm">Lihat Semua</a>
                            <div class="strip-nav">
                                <button id="otherPrev" class="nav-btn mini" type="button" aria-label="Gulir kiri"><i class="fas fa-chevron-left"></i></button>
                                <button id="otherNext" class="nav-btn mini" type="button" aria-label="Gulir kanan"><i class="fas fa-chevron-right"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- Satu baris horizontal -->
                    <div id="otherStrip" class="strip-grid" role="listbox" aria-label="Produk lainnya">
                        @foreach($otherProducts as $index => $op)
                            @php
                                $oCatSlug = optional(optional($op->subcategory)->category)->slug ?? optional($op->category)->slug ?? 'kategori';
                                $oSubSlug = optional($op->subcategory)->slug ?? 'umum';
                                $oUrl = route('product.detail', ['category'=>$oCatSlug,'subcategory'=>$oSubSlug,'product'=>$op->slug]);
                                $oImg = $imgPublic(data_get($op, 'images.0.image_path') ?: data_get($op,'featured_image') ?: data_get($op,'image_path'));
                            @endphp
                            <a href="{{ $oUrl }}" class="product-card strip" role="option" data-aos="fade-up" data-aos-delay="{{ $index*20 }}">
                                <div class="product-image">
                                    @if($oImg)
                                        <img src="{{ $oImg }}" alt="{{ $op->name }}">
                                    @else
                                        <div class="no-image small"><i class="fas fa-image"></i></div>
                                    @endif
                                </div>
                                <div class="product-content">
                                    <div class="product-category">
                                        {{ optional(optional($op->subcategory)->category)->name ?? optional($op->category)->name ?? 'Uncategorized' }}
                                    </div>
                                    <h4 class="product-title">{{ Str::limit($op->name, 56) }}</h4>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Modal Marketing -->
<div id="marketingModal" class="modal-overlay" hidden>
  <div class="modal-card" role="dialog" aria-modal="true" aria-labelledby="marketingTitle">
    <button class="modal-close" type="button" aria-label="Tutup">&times;</button>

    <div class="modal-header">
      <div class="modal-header-left">
        <div class="modal-chip">Konsultasi / Penawaran</div>
        <h3 id="marketingTitle" class="modal-title" tabindex="-1">Hubungi Tim Marketing</h3>
        <p class="modal-subtitle">Pilih kontak untuk chat WhatsApp — pesan otomatis menyertakan <strong>{{ $titleTxt }}</strong> & tautan produk ini.</p>
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
                    <div class="contact-phone">{{ $m['phone'] }}</div>
                </div>
            </div>
            <div class="contact-actions">
                @if($m['wa'])
                <a class="btn btn-primary btn-sm w-100" href="{{ $m['wa'] }}" target="_blank" rel="noopener">
                    <i class="fab fa-whatsapp"></i> Chat WhatsApp
                </a>
                @endif
                @if($m['tel'])
                <a class="btn btn-outline-primary btn-sm w-100" href="{{ $m['tel'] }}">
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
<div id="imageLightbox" class="image-lightbox" role="dialog" aria-modal="true" aria-label="Pratinjau gambar" aria-hidden="true" hidden>
  <img class="ilb-img" src="" alt="Gambar produk" tabindex="0">
  <button class="ilb-close" type="button" aria-label="Tutup">&times;</button>
  <button class="ilb-nav ilb-prev" type="button" aria-label="Gambar sebelumnya"><i class="fas fa-chevron-left"></i></button>
  <button class="ilb-nav ilb-next" type="button" aria-label="Gambar berikutnya"><i class="fas fa-chevron-right"></i></button>
  <div class="ilb-counter" aria-live="polite">1 / 1</div>
</div>

<style>
/* =====================================================
   CLEAN & DEFAULT THEME
   ===================================================== */
body {
    background-color: #ffffff;
    color: #212529;
}

.simple-header {
    padding: 18px 0 10px;
}

.breadcrumb {
    background: transparent;
    margin: 0 0 6px;
    padding: 0;
    --bs-breadcrumb-divider: "/";
    --bs-breadcrumb-divider-color: #212529;
}

.breadcrumb .breadcrumb-item a {
    color: #7a0e0e;
    text-decoration: none;
    font-weight: 800;
}

.page-title {
    font-size: clamp(1.6rem, 1.2rem + 1vw, 2.2rem);
    font-weight: 900;
    letter-spacing: -0.02em;
    margin: 0;
}

/* Card container */
.gallery-card,
.info-card,
.spec-card,
.strip-card {
    position: relative;
    overflow: hidden;
    border-radius: 12px;
    border: 1px solid #dee2e6;
    background-color: #ffffff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
}

/* Gallery */
.gallery-card {
    padding: 1rem;
}

.gallery-main {
    position: relative;
    aspect-ratio: 4/3;
    background-color: #f8f9fa;
    border-radius: 8px;
    overflow: hidden;
    display: grid;
    place-items: center;
}

.gallery-main img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 12px;
    cursor: zoom-in;
}

.no-image {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100%;
    color: #6c757d;
}

.no-image i {
    font-size: 3rem;
    margin-bottom: 1rem;
}

/* Gallery nav */
.nav-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 42px;
    height: 42px;
    border-radius: 50%;
    display: grid;
    place-items: center;
    border: 1px solid #dee2e6;
    background-color: #ffffff;
    cursor: pointer;
    transition: background-color 0.2s;
}

.nav-btn:hover {
    background-color: #f8f9fa;
}

.nav-prev {
    left: 10px;
}

.nav-next {
    right: 10px;
}

/* Indicators & thumbs */
.gallery-indicators {
    display: flex;
    gap: 0.4rem;
    justify-content: center;
    padding: 0.6rem 0 0;
    user-select: none;
}

.gallery-indicators .dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    border: 1px solid #6c757d;
    background: transparent;
    cursor: pointer;
    transition: background-color 0.2s;
}

.gallery-indicators .dot.active {
    background-color: #7a0e0e;
}

.gallery-thumbs {
    display: flex;
    gap: 0.55rem;
    overflow: auto;
    padding-top: 0.75rem;
}

.gallery-thumbs .thumb {
    border: 1px solid #dee2e6;
    border-radius: 8px;
    background-color: #f8f9fa;
    padding: 0.25rem;
    width: 74px;
    height: 74px;
    display: grid;
    place-items: center;
    cursor: pointer;
    transition: border-color 0.22s;
}

.gallery-thumbs .thumb img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.gallery-thumbs .thumb:hover {
    border-color: #7a0e0e;
}

.gallery-thumbs .thumb.active {
    border-color: #7a0e0e;
}

/* Info */
.info-card {
    padding: 1rem 1.2rem;
}

.mini-category {
    margin-bottom: 0.35rem;
    font-size: 0.85rem;
}

.mini-category a {
    color: #ffffff;
    background-color: #7a0e0e;
    padding: 0.12rem 0.52rem;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 800;
}

.mini-category .sep {
    margin: 0 0.35rem;
    color: #6c757d;
}

.title {
    font-size: 1.9rem;
    font-weight: 900;
    letter-spacing: -0.01em;
    margin-bottom: 0.35rem;
}

/* Badges & chips */
.brand-badge {
    background-color: #7a0e0e;
    color: #ffffff;
    border-radius: 50px;
    padding: 0.2rem 0.58rem;
    font-weight: 800;
    font-size: 0.82rem;
}

.brand-badge.more {
    background-color: #6c757d;
}

.attr-chips {
    display: flex;
    flex-wrap: wrap;
    gap: 0.42rem;
    margin: 0.5rem 0 0.95rem;
}

.attr-chips .chip {
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 50px;
    padding: 0.28rem 0.64rem;
    font-weight: 800;
    font-size: 0.88rem;
    color: #212529;
}

/* Buttons - Override Bootstrap with higher specificity */
.btn {
    font-weight: 900;
    border-width: 0;
    border-radius: 8px;
    transition: background-color 0.18s ease;
}

.btn-primary {
    background-color: #7a0e0e;
    color: #ffffff;
}

.btn-primary:hover {
    background-color: #a30f0f;
}

.btn-outline-primary {
    color: #7a0e0e;
    background: transparent;
    border: 1.8px solid #7a0e0e;
}

.btn-outline-primary:hover {
    color: #ffffff;
    background-color: #7a0e0e;
}

/* Specific fix for Konsultasi/Penawaran button */
#openMarketingModal.btn.btn-primary.btn-lg.flex-fill,
#openMarketingModal.btn.btn-primary.btn-lg.flex-fill:hover,
#openMarketingModal.btn.btn-primary.btn-lg.flex-fill:focus,
#openMarketingModal.btn.btn-primary.btn-lg.flex-fill:active,
#openMarketingModal.btn.btn-primary.btn-lg.flex-fill:not(:disabled):not(.disabled):active {
    background-color: #7a0e0e !important;
    color: #ffffff !important;
    border: none !important;
    box-shadow: none !important;
}

#openMarketingModal.btn.btn-primary.btn-lg.flex-fill:hover,
#openMarketingModal.btn.btn-primary.btn-lg.flex-fill:focus {
    background-color: #a30f0f !important;
    transform: translateY(-1px) !important;
}

#openMarketingModal.btn.btn-primary.btn-lg.flex-fill:active,
#openMarketingModal.btn.btn-primary.btn-lg.flex-fill:not(:disabled):not(.disabled):active {
    background-color: #a30f0f !important;
    transform: translateY(0) !important;
}

/* Specific fix for Lihat Semua button */
.strip-actions .btn.btn-outline-primary.btn-sm,
.strip-actions .btn.btn-outline-primary.btn-sm:hover,
.strip-actions .btn.btn-outline-primary.btn-sm:focus,
.strip-actions .btn.btn-outline-primary.btn-sm:active,
.strip-actions .btn.btn-outline-primary.btn-sm:not(:disabled):not(.disabled):active {
    color: #7a0e0e !important;
    background: transparent !important;
    border: 1.8px solid #7a0e0e !important;
    box-shadow: none !important;
}

.strip-actions .btn.btn-outline-primary.btn-sm:hover,
.strip-actions .btn.btn-outline-primary.btn-sm:focus {
    color: #ffffff !important;
    background-color: #7a0e0e !important;
    border-color: #7a0e0e !important;
    transform: translateY(-1px) !important;
    box-shadow: none !important;
}

.strip-actions .btn.btn-outline-primary.btn-sm:active,
.strip-actions .btn.btn-outline-primary.btn-sm:not(:disabled):not(.disabled):active {
    color: #ffffff !important;
    background-color: #a30f0f !important;
    border-color: #a30f0f !important;
    transform: translateY(0) !important;
    box-shadow: none !important;
}

/* Fix for modal contact buttons */
.contact-actions .btn.btn-outline-primary.btn-sm,
.contact-actions .btn.btn-outline-primary.btn-sm:hover,
.contact-actions .btn.btn-outline-primary.btn-sm:focus,
.contact-actions .btn.btn-outline-primary.btn-sm:active,
.contact-actions .btn.btn-outline-primary.btn-sm:not(:disabled):not(.disabled):active {
    color: #7a0e0e !important;
    background: transparent !important;
    border: 1.8px solid #7a0e0e !important;
    box-shadow: none !important;
}

.contact-actions .btn.btn-outline-primary.btn-sm:hover,
.contact-actions .btn.btn-outline-primary.btn-sm:focus {
    color: #ffffff !important;
    background-color: #7a0e0e !important;
    border-color: #7a0e0e !important;
    transform: translateY(-1px) !important;
    box-shadow: none !important;
}

.contact-actions .btn.btn-outline-primary.btn-sm:active,
.contact-actions .btn.btn-outline-primary.btn-sm:not(:disabled):not(.disabled):active {
    color: #ffffff !important;
    background-color: #a30f0f !important;
    border-color: #a30f0f !important;
    transform: translateY(0) !important;
    box-shadow: none !important;
}

/* Spec card */
.spec-card {
    margin-top: 1rem;
}

.spec-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    padding: 16px 18px;
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
    border-radius: 12px 12px 0 0;
}

.spec-chip {
    display: inline-block;
    font-weight: 900;
    font-size: 0.7rem;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    background-color: #7a0e0e;
    color: #ffffff;
    padding: 0.22rem 0.5rem;
    border-radius: 50px;
}

.spec-title {
    font-size: 1.25rem;
    font-weight: 900;
    margin: 0.25rem 0 0;
}

.spec-subtitle {
    margin: 0.15rem 0 0;
    color: #6c757d;
}

.spec-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
    gap: 0.9rem;
    padding: 14px 16px 18px;
}

.spec-tile {
    display: flex;
    flex-direction: column;
    gap: 0.6rem;
    min-height: 100px;
    background-color: #ffffff;
    border: 1px solid #dee2e6;
    border-radius: 12px;
    padding: 0.95rem;
    transition: border-color 0.15s ease;
}

.spec-tile:hover {
    border-color: #7a0e0e;
}

.tile-head {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 0.6rem;
}

.tile-bullet {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background-color: #7a0e0e;
    flex-shrink: 0;
}

.tile-key {
    font-size: 0.78rem;
    font-weight: 900;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    color: #6c757d;
    white-space: nowrap;
}

.tile-body {
    font-weight: 900;
    font-size: 1rem;
    color: #212529;
    line-height: 1.5;
    word-break: break-word;
    display: -webkit-box;
    -webkit-line-clamp: 6;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Strip Produk Lainnya */
.strip-card {
    margin-top: 1rem;
}

.strip-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 0.8rem;
    padding: 16px 18px;
    border-bottom: 1px solid #dee2e6;
    background-color: #f8f9fa;
    border-radius: 12px 12px 0 0;
}

.strip-title {
    font-size: 1.25rem;
    font-weight: 900;
    margin: 0;
}

.strip-actions {
    display: flex;
    align-items: center;
    gap: 0.6rem;
    flex-wrap: nowrap;
    white-space: nowrap;
}

.strip-nav {
    display: flex;
    align-items: center;
    gap: 0.4rem;
    flex-wrap: nowrap;
}

.strip-nav .nav-btn.mini {
    position: static;
    transform: none;
    width: 36px;
    height: 36px;
    border-radius: 8px;
    background-color: #ffffff;
    border: 1px solid #dee2e6;
    display: inline-grid;
}

.strip-nav .nav-btn.mini[disabled] {
    opacity: 0.45;
    cursor: not-allowed;
}

.strip-nav .nav-btn.mini:hover:not([disabled]) {
    background-color: #f8f9fa;
}

.strip-grid {
    display: grid;
    grid-auto-flow: column;
    grid-auto-columns: minmax(240px, 1fr);
    gap: 0.9rem;
    padding: 14px 16px 18px;
    overflow: auto;
    scroll-snap-type: x mandatory;
    scrollbar-width: none;
    -ms-overflow-style: none;
}

.strip-grid::-webkit-scrollbar {
    display: none;
}

.strip-grid .product-card.strip {
    scroll-snap-align: start;
    display: flex;
    flex-direction: column;
    gap: 0.6rem;
    min-width: 240px;
    background-color: #ffffff;
    border: 1px solid #dee2e6;
    border-radius: 12px;
    padding: 0.85rem;
    text-decoration: none;
    transition: border-color 0.15s ease;
}

.strip-grid .product-card.strip:hover {
    border-color: #7a0e0e;
}

.strip-grid .product-card.strip .product-image {
    position: relative;
    width: 100%;
    aspect-ratio: 1 / 1;
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    overflow: hidden;
}

.strip-grid .product-card.strip .product-image img {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 10px;
}

.strip-grid .product-card.strip .product-image .no-image.small {
    font-size: 1.5rem;
}

.strip-grid .product-card.strip .product-content {
    display: flex;
    flex-direction: column;
    gap: 0.35rem;
}

.strip-grid .product-card.strip .product-category {
    font-size: 0.85rem;
    color: #6c757d;
}

.strip-grid .product-card.strip .product-title {
    font-size: 1rem;
    font-weight: 900;
    line-height: 1.35;
    margin: 0;
    color: #212529;
}

/* Fallback bila aspect-ratio tidak didukung */
@supports not (aspect-ratio: 1 / 1) {
    .strip-grid .product-card.strip .product-image {
        height: 0;
        padding-top: 100%;
    }
    .strip-grid .product-card.strip .product-image>* {
        position: absolute;
        inset: 0;
    }
}

/* Overlay & Modal */
[hidden] {
    display: none !important;
}

.modal-overlay {
    position: fixed;
    inset: 0;
    z-index: 100000;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 24px;
    background-color: rgba(0, 0, 0, 0.6);
}

.modal-card {
    position: relative;
    width: min(960px, 96vw);
    max-height: 88vh;
    overflow: hidden;
    border-radius: 12px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    background-color: #ffffff;
    color: #212529;
}

.modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 0.8rem;
    padding: 16px 18px;
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
    position: sticky;
    top: 0;
    z-index: 1;
}

.modal-chip {
    display: inline-block;
    font-weight: 900;
    font-size: 0.7rem;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    background-color: #7a0e0e;
    color: #ffffff;
    padding: 0.22rem 0.5rem;
    border-radius: 50px;
}

.modal-title {
    font-size: 1.35rem;
    font-weight: 900;
    margin: 0.25rem 0 0;
}

.modal-subtitle {
    margin: 0.15rem 0 0;
    color: #6c757d;
}

.modal-close {
    position: absolute;
    top: 10px;
    right: 12px;
    width: 36px;
    height: 36px;
    border-radius: 8px;
    border: 1px solid #dee2e6;
    background-color: #ffffff;
    color: #212529;
    cursor: pointer;
    font-size: 22px;
    line-height: 1;
    z-index: 5;
}

.modal-close:hover {
    background-color: #f8f9fa;
}

.contact-grid {
    padding: 14px 16px 18px;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 0.9rem;
    overflow: auto;
    max-height: calc(88vh - 78px);
}

.contact-item {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    background-color: #ffffff;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    padding: 0.85rem 0.9rem;
    transition: border-color 0.15s ease;
}

.contact-item:hover {
    border-color: #7a0e0e;
}

.contact-row {
    display: flex;
    align-items: center;
    gap: 0.8rem;
}

.contact-avatar {
    width: 54px;
    height: 54px;
    border-radius: 50%;
    display: grid;
    place-items: center;
    font-weight: 900;
    background-color: #7a0e0e;
    color: #ffffff;
    border: 1px solid #dee2e6;
}

.contact-name {
    font-weight: 900;
    font-size: 1rem;
    margin: 0;
}

.contact-phone {
    font-size: 0.95rem;
    color: #6c757d;
    margin-top: 0.25rem;
}

/* IMAGE LIGHTBOX */
.image-lightbox {
    position: fixed;
    inset: 0;
    z-index: 100001;
    display: grid;
    place-items: center;
    background-color: rgba(0, 0, 0, 0.8);
    padding: 24px;
}

.image-lightbox .ilb-img {
    max-width: min(1200px, 92vw);
    max-height: 88vh;
    border-radius: 8px;
    outline: none;
}

.image-lightbox .ilb-nav,
.image-lightbox .ilb-close {
    position: absolute;
    border: 1px solid #dee2e6;
    background-color: #ffffff;
    color: #212529;
    width: 44px;
    height: 44px;
    border-radius: 8px;
    display: grid;
    place-items: center;
    cursor: pointer;
}

.image-lightbox .ilb-nav:hover,
.image-lightbox .ilb-close:hover {
    background-color: #f8f9fa;
}

.image-lightbox .ilb-prev {
    left: 18px;
    top: 50%;
    transform: translateY(-50%);
}

.image-lightbox .ilb-next {
    right: 18px;
    top: 50%;
    transform: translateY(-50%);
}

.image-lightbox .ilb-close {
    top: 12px;
    right: 14px;
    font-size: 26px;
    line-height: 1;
}

.image-lightbox .ilb-counter {
    position: absolute;
    bottom: 14px;
    right: 18px;
    color: #212529;
    font-weight: 800;
    background-color: #ffffff;
    padding: 6px 10px;
    border-radius: 8px;
    border: 1px solid #dee2e6;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
  // Initialize AOS with simpler settings to prevent loading issues
  if (typeof AOS !== 'undefined') {
    AOS.init({
      duration: 500,
      once: true,
      offset: 100,
      delay: 0,
      easing: 'ease-out',
      disable: window.innerWidth < 768
    });
  }

  // Galeri detail
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

  const prevBtnGal = document.querySelector('.nav-prev');
  const nextBtnGal = document.querySelector('.nav-next');
  if (prevBtnGal) prevBtnGal.addEventListener('click', ()=> showAt(currentIndex - 1));
  if (nextBtnGal) nextBtnGal.addEventListener('click', ()=> showAt(currentIndex + 1));

  document.addEventListener('keydown', (e)=>{
    const lbCheck = document.getElementById('imageLightbox');
    if (lbCheck && !lbCheck.hidden) return;
    if (e.key === 'ArrowRight') showAt(currentIndex + 1);
    if (e.key === 'ArrowLeft') showAt(currentIndex - 1);
  });

  // Modal Marketing
  const modal = document.getElementById('marketingModal');
  const openBtn = document.getElementById('openMarketingModal');
  const closeBtn = document.querySelector('.modal-close');

  function lockScroll(lock){
    document.documentElement.classList.toggle('modal-open', lock);
    document.body.classList.toggle('modal-open', lock);
    if (lock) {
      document.documentElement.style.overflow = 'hidden';
      document.body.style.overflow = 'hidden';
    } else {
      document.documentElement.style.overflow = '';
      document.body.style.overflow = '';
    }
  }

  function openModal(){
    if (!modal) return;
    modal.hidden = false;
    lockScroll(true);
    const title = document.getElementById('marketingTitle');
    if (title) setTimeout(()=> title.focus?.(), 50);
  }
  function closeModal(){
    if (!modal) return;
    modal.hidden = true;
    lockScroll(false);
  }

  if (openBtn) openBtn.addEventListener('click', (e)=>{ e.preventDefault(); openModal(); });
  if (closeBtn) closeBtn.addEventListener('click', closeModal);
  if (modal){
    modal.addEventListener('click', (e)=>{ if (e.target === modal || e.target.classList.contains('modal-close')) closeModal(); });
    document.addEventListener('keydown', (e)=>{ if (e.key === 'Escape' && !modal.hidden) closeModal(); });
  }

  // Lightbox (POPUP GAMBAR)
  const lb = document.getElementById('imageLightbox');
  const lbImg = lb?.querySelector('.ilb-img');
  const lbPrev = lb?.querySelector('.ilb-prev');
  const lbNext = lb?.querySelector('.ilb-next');
  const lbClose = lb?.querySelector('.ilb-close');
  const lbCounter = lb?.querySelector('.ilb-counter');

  let lbImages = @json($thumbs->values());
  @if($thumbs->isEmpty() && $mainImage)
    lbImages = [@json($mainImage)];
  @endif

  let lbIndex = 0;
  function updateCounter(){ if (lbCounter) lbCounter.textContent = (lbIndex + 1) + ' / ' + (lbImages.length || 1); }
  function showLightbox(i){
    if (!lb || !lbImg || !lbImages.length) return;
    lbIndex = (i + lbImages.length) % lbImages.length;
    lbImg.src = lbImages[lbIndex];
    updateCounter();
  }
  function openLightbox(i=0){
    if (!lb) return;
    lb.hidden = false;
    lb.setAttribute('aria-hidden','false');
    lockScroll(true);
    showLightbox(i);
    lbImg?.focus?.();
  }
  function closeLightbox(){ if (!lb) return; lb.hidden = true; lb.setAttribute('aria-hidden','true'); lockScroll(false); }

  const mainImgEl = document.getElementById('mainImage');
  if (mainImgEl){
    mainImgEl.addEventListener('click', ()=> openLightbox(currentIndex || 0));
    mainImgEl.addEventListener('keydown', (e)=>{ if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); openLightbox(currentIndex || 0); } });
  }
  lbPrev?.addEventListener('click', ()=> showLightbox(lbIndex - 1));
  lbNext?.addEventListener('click', ()=> showLightbox(lbIndex + 1));
  lbClose?.addEventListener('click', closeLightbox);
  lb?.addEventListener('click', (e)=>{ if (e.target === lb) closeLightbox(); });
  document.addEventListener('keydown', (e)=>{
    if (!lb || lb.hidden) return;
    if (e.key === 'Escape') closeLightbox();
    if (e.key === 'ArrowRight') showLightbox(lbIndex + 1);
    if (e.key === 'ArrowLeft') showLightbox(lbIndex - 1);
  });

  // STRIP NAV: Produk Lainnya
  (function(){
    const cont = document.getElementById('otherStrip');
    const prev = document.getElementById('otherPrev');
    const next = document.getElementById('otherNext');
    if (!cont || !prev || !next) return;

    function stepSize(){
      const card = cont.querySelector('.product-card');
      const gap = parseFloat(getComputedStyle(cont).columnGap || '16');
      return ((card?.getBoundingClientRect().width) || 260) + gap;
    }

    function updateNav(){
      const maxScroll = cont.scrollWidth - cont.clientWidth - 1;
      prev.disabled = cont.scrollLeft <= 0;
      next.disabled = cont.scrollLeft >= maxScroll;
      const navWrap = prev.parentElement;
      if (navWrap){
        navWrap.style.display = (cont.scrollWidth <= cont.clientWidth + 1) ? 'none' : '';
      }
    }

    prev.addEventListener('click', ()=> cont.scrollBy({left: -stepSize(), behavior:'smooth'}));
    next.addEventListener('click', ()=> cont.scrollBy({left:  stepSize(), behavior:'smooth'}));

    cont.addEventListener('scroll', updateNav, {passive:true});
    window.addEventListener('resize', updateNav);
    updateNav();
  })();
});
</script>
@endsection