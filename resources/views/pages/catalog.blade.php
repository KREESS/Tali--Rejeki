@extends('components.layout')

@section('title', $title)

@section('content')
<!-- ===== HERO SECTION ===== -->
<section class="hero-section fade-up">
    <div class="hero-bg" style="background-image:url('{{ asset('img/galeri-proyek/115.png') }}');"></div>
    <div class="hero-overlay"></div>
    
    <div class="hero-container">
        <div class="hero-content text-center">
            <h1 class="hero-title">Katalog <span class="hero-gradient">Insulasi Industri</span></h1>
            <p class="hero-subtitle">
                Brosur, spesifikasi, manual, dan sertifikat dalam satu platform.
                Cari berdasarkan produk dan unduh dokumen resmi.
            </p>

            <div class="hero-actions">
                <a href="#catalog-list" class="btn btn-hero btn-primary btn-lg">
                    <i class="fas fa-search me-2"></i>
                    <span>Jelajahi Katalog</span>
                </a>
                <a href="{{ route('contact') }}" class="btn btn-hero btn-outline-light btn-lg">
                    <i class="fas fa-headset me-2"></i>
                    <span>Konsultasi Gratis</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ===== INFO BANNER ===== -->
<section class="info-banner fade-up">
    <div class="container">
        <div class="info-content">
            <div class="info-header text-center">
                <h2 class="info-title">Platform Katalog Digital Terlengkap</h2>
                <p class="info-subtitle">Akses ribuan dokumen teknis insulasi industri dalam satu platform</p>
            </div>
            
            <div class="info-stats">
                <div class="info-stat-item fade-up-item">
                    <div class="stat-number">{{ number_format($catalogItems->total()) }}+</div>
                    <div class="stat-desc">Dokumen Katalog</div>
                </div>
                
                <div class="info-stat-item fade-up-item">
                    <div class="stat-number">24/7</div>
                    <div class="stat-desc">Akses Tanpa Batas</div>
                </div>
                
                <div class="info-stat-item fade-up-item">
                    <div class="stat-number">100%</div>
                    <div class="stat-desc">Dokumen Terverifikasi</div>
                </div>
                
                <div class="info-stat-item fade-up-item">
                    <div class="stat-number">50+</div>
                    <div class="stat-desc">Brand Terpercaya</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== FEATURED CATEGORIES ===== -->
@isset($featuredCategories)
<section class="featured-categories fade-up">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title">Kategori Unggulan</h2>
            <p class="section-subtitle">Kategori paling populer</p>
        </div>
        <div class="categories-grid">
            @foreach($featuredCategories as $fc)
            <a class="category-card fade-up-item" href="{{ route('catalog1-page', ['category' => $fc['slug']]) }}">
                <div class="category-name">{{ $fc['name'] }}</div>
                <div class="category-count">{{ $fc['count'] ?? 0 }} dokumen</div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endisset

<!-- ===== PARTNERS / BRANDS ===== -->
@isset($brandLogos)
@if(count($brandLogos))
<section class="brands-section fade-up">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title">Merek Terpercaya</h2>
        </div>
        <div class="brands-grid">
            @foreach($brandLogos as $logo)
            <div class="brand-item fade-up-item"><img src="{{ asset('storage/'.$logo) }}" alt="Brand" loading="lazy"></div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endisset

<!-- ===== TOP DOWNLOADS ===== -->
@isset($topDownloads)
@if($topDownloads->count())
<section class="top-downloads fade-up">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title">Paling Banyak Diunduh</h2>
            <p class="section-subtitle">Dokumen favorit minggu ini</p>
        </div>
        <div class="downloads-grid">
            @foreach($topDownloads as $i => $td)
            <div class="download-card fade-up-item" data-rank="{{ $i+1 }}">
                <div class="download-image">
                    @if($td->image)
                        <div class="download-image-wrapper">
                            <img src="{{ asset('storage/' . $td->image) }}" alt="{{ $td->title }}" loading="lazy">
                        </div>
                    @else
                        <div class="image-placeholder">PDF</div>
                    @endif
                </div>
                <div class="download-content">
                    <div class="download-category">{{ ucfirst(str_replace('-', ' ', $td->category ?? 'General')) }}</div>
                    <h3 class="download-title">{{ $td->title }}</h3>
                    <div class="download-meta">{{ $td->download_count ?? 0 }} unduhan</div>
                </div>
                <div class="download-actions">
                    <button class="btn btn-outline-primary btn-compare" data-id="{{ $td->id }}">Bandingkan</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endisset

<!-- ===== CATALOG LIST ===== -->
<section class="catalog-section fade-up" id="catalog-list">
    @if($catalogItems->count() > 0)
    <div class="catalog-list">
        @foreach($catalogItems as $index => $item)
            @php
                // Helper: URL langsung dari public/ (biarkan absolut)
                $toPublic = function (?string $path) {
                    if (!$path) return null;
                    $lower = strtolower($path);
                    if (\Illuminate\Support\Str::startsWith($lower, ['http://','https://','//','data:'])) return $path;
                    $path = ltrim($path, '/');
                    if (\Illuminate\Support\Str::startsWith($path, 'public/')) $path = substr($path, 7);
                    return asset($path);
                };

                // ===== KUMPULAN GAMBAR (catalog_images) =====
                $images = $item->images
                    ->sortBy([['is_primary','desc'], ['sort_order','asc'], ['id','asc']])
                    ->values();

                // ===== FILE UTAMA (catalog_files): utamakan PDF =====
                $primaryFile = $item->files->sortBy(function($f){
                    $ext = strtolower(pathinfo($f->file_url ?? '', PATHINFO_EXTENSION));
                    return $ext === 'pdf' ? 0 : 1;
                })->first();

                $fileUrl = $primaryFile?->file_url ? $toPublic($primaryFile->file_url) : null;
                $ext     = $primaryFile?->file_url ? strtolower(pathinfo($primaryFile->file_url, PATHINFO_EXTENSION)) : null;
                $badge  = strtoupper($ext ?: 'FILE');
                $fileSize = $primaryFile->size ?? ($item->file_size ?? null);
                
                // Determine if this is an odd or even item for alternating layout
                $isOdd = ($index % 2) === 0;
            @endphp

            <article class="catalog-item fade-up-item {{ $isOdd ? 'catalog-item-odd' : 'catalog-item-even' }}">
                <!-- Image Section -->
                <div class="catalog-image">
                    @if($images->count() > 0)
                        @foreach($images as $i => $img)
                            @php
                                $imgUrl = $toPublic($img->image_url);
                                $imgAlt = $img->alt_text ?: $item->name;
                            @endphp
                            <div class="catalog-image-item {{ $i===0 ? 'active' : '' }}">
                                <div class="image-wrapper">
                                    <img src="{{ $imgUrl }}" alt="{{ $imgAlt }}" class="catalog-thumbnail" loading="lazy">
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="catalog-image-item active">
                            <div class="image-placeholder">{{ $badge }}</div>
                        </div>
                    @endif
                    
                    <!-- Image Counter -->
                    @if($images->count() > 1)
                    <div class="image-counter">
                        <span class="current-slide">1</span> / <span class="total-slides">{{ $images->count() }}</span>
                    </div>
                    @endif
                    
                    <!-- Navigation arrows -->
                    @if($images->count() > 1)
                    <button class="image-nav prev" type="button" aria-label="Gambar sebelumnya">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="image-nav next" type="button" aria-label="Gambar selanjutnya">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                    @endif
                    
                    <!-- Navigation dots -->
                    @if($images->count() > 1)
                    <div class="image-nav-dots">
                        @foreach($images as $i => $img)
                            <button class="nav-dot {{ $i===0 ? 'active' : '' }}" data-index="{{ $i }}"></button>
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- Content Section -->
                <div class="catalog-content">
                    <div class="catalog-header">
                        <a href="{{ route('catalog1-page', ['category' => $item->category]) }}" class="catalog-category">
                            {{ ucfirst(str_replace('-', ' ', $item->category ?? 'General')) }}
                        </a>
                        <div class="catalog-meta">
                            <span>{{ $item->created_at->format('d M Y') }}</span>
                            <span>✓ Terverifikasi</span>
                        </div>
                    </div>

                    <h3 class="catalog-title">{{ $item->name }}</h3>
                    <p class="catalog-description">{{ \Illuminate\Support\Str::limit($item->description, 220) }}</p>

                    <!-- Action Buttons -->
                    <div class="catalog-actions">
                        @if($fileUrl)
                            <form action="{{ route('catalog.download', $item->id) }}" method="GET" class="inline-form">
                                <button type="submit" class="btn-catalog-download">
                                    <i class="fas fa-download"></i>
                                    Unduh {{ $badge }}
                                </button>
                            </form>

                            <form action="{{ route('catalog.preview', $item->id) }}" method="GET" class="inline-form" target="_blank" rel="noopener">
                                <button type="submit" class="btn-catalog-preview">
                                    <i class="fas fa-eye"></i>
                                    Preview
                                </button>
                            </form>
                        @else
                            <button class="btn btn-secondary" disabled>
                                <i class="fas fa-ban"></i>
                                Tidak Tersedia
                            </button>
                        @endif
                    </div>
                </div>
            </article>
        @endforeach
    </div>
    @else
    <!-- Empty state -->
    <div class="container">
        <div class="empty-state text-center">
            <div class="empty-icon">📁</div>
            <h3>Katalog Tidak Ditemukan</h3>
            <p>
                @if(request('search') || request('category') || request('type'))
                    Tidak ada katalog yang sesuai dengan kriteria. Coba kata kunci atau filter lain.
                @else
                    Katalog digital sedang dalam tahap pengembangan. Silakan cek kembali nanti.
                @endif
            </p>

            @if(request('search') || request('category') || request('type'))
                <a href="{{ route('catalog1-page') }}" class="btn btn-primary">Lihat Semua Katalog</a>
            @else
                <a href="{{ route('contact') }}" class="btn btn-primary">Hubungi Kami</a>
            @endif
        </div>
    </div>
    @endif
</section>

<!-- ===== STANDARDS & COMPLIANCE ===== -->
<section class="standards-section fade-up">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title">Standar & Kepatuhan</h2>
            <p class="section-subtitle">Referensi standar untuk aplikasi industri Anda</p>
        </div>
        <div class="standards-grid">
            <div class="standard-card fade-up-item">
                <h4>ASTM</h4>
                <p>Spesifikasi material & metode uji insulasi</p>
            </div>
            <div class="standard-card fade-up-item">
                <h4>FM/UL</h4>
                <p>Sertifikasi keselamatan kebakaran & performa</p>
            </div>
            <div class="standard-card fade-up-item">
                <h4>ISO</h4>
                <p>Manajemen mutu, lingkungan, & keselamatan</p>
            </div>
            <div class="standard-card fade-up-item">
                <h4>OSHA</h4>
                <p>Praktik kerja aman dalam instalasi</p>
            </div>
        </div>
    </div>
</section>

<!-- ===== FAQ ===== -->
<section class="faq-section fade-up">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title">Pertanyaan Umum</h2>
            <p class="section-subtitle">Jawaban cepat untuk pertanyaan yang sering diajukan</p>
        </div>
        <div class="faq-list">
            <details class="faq-item fade-up-item">
                <summary>Format dokumen apa yang tersedia?</summary>
                <div class="faq-body">Sebagian besar dokumen tersedia dalam format PDF, dengan gambar pendukung dan XLS/DOC untuk spesifikasi teknis.</div>
            </details>
            <details class="faq-item fade-up-item">
                <summary>Seberapa sering koleksi diperbarui?</summary>
                <div class="faq-body">Kami memperbarui katalog secara berkala. Lihat cap tanggal pada setiap item untuk mengetahui rilis terbaru.</div>
            </details>
            <details class="faq-item fade-up-item">
                <summary>Apakah dokumen resmi?</summary>
                <div class="faq-body">Ya, semua dokumen bersumber dari vendor/pabrikan dan telah diverifikasi oleh tim QC kami.</div>
            </details>
        </div>
    </div>
</section>

<!-- ===== CTA ===== -->
<section class="cta-section fade-up">
    <div class="container">
        <div class="cta-content text-center">
            <div class="cta-icon">🎧</div>
            <h2 class="cta-title">Butuh Bantuan Memilih Produk?</h2>
            <p class="cta-description">Tim ahli kami siap membantu Anda memilih produk yang tepat untuk proyek Anda.</p>
            <div class="cta-actions">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-lg me-3">
                    <i class="fas fa-phone me-2"></i>Konsultasi Gratis
                </a>
                <a href="{{ route('products') }}" class="cta-custom-btn btn-lg">
                    <i class="fas fa-cubes me-2"></i>Lihat Produk
                </a>
            </div>
        </div>
    </div>
</section>

<style>
/* ====== GLOBAL STYLES ====== */
:root {
    --primary-color: #8B0000;
    --primary-hover: #660000;
    --primary-light: #CD5C5C;
    --success-color: #10b981;
    --danger-color: #ef4444;
    
    --light-bg: #ffffff;
    --light-secondary: #fafafa;
    --light-tertiary: #f8f9fa;
    --light-text: #1a1a1a;
    --light-text-secondary: #6b7280;
    --light-border: #e5e7eb;
    
    --dark-bg: #0f172a;
    --dark-secondary: #1e293b;
    --dark-tertiary: #334155;
    --dark-text: #f1f5f9;
    --dark-text-secondary: #cbd5e1;
    --dark-border: #475569;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    color: var(--light-text);
    background-color: var(--light-bg);
    line-height: 1.6;
    transition: all 0.3s ease;
}

body.dark-theme {
    color: var(--dark-text);
    background-color: var(--dark-bg);
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 24px;
}

/* ====== FADE UP ANIMATION ====== */
.fade-up {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.6s ease, transform 0.6s ease;
}

.fade-up-item {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.6s ease, transform 0.6s ease;
}

.fade-up.visible {
    opacity: 1;
    transform: translateY(0);
}

.fade-up-item.visible {
    opacity: 1;
    transform: translateY(0);
}

/* Staggered animation delays */
.fade-up-item:nth-child(1) { transition-delay: 0.1s; }
.fade-up-item:nth-child(2) { transition-delay: 0.2s; }
.fade-up-item:nth-child(3) { transition-delay: 0.3s; }
.fade-up-item:nth-child(4) { transition-delay: 0.4s; }
.fade-up-item:nth-child(5) { transition-delay: 0.5s; }
.fade-up-item:nth-child(6) { transition-delay: 0.6s; }
.fade-up-item:nth-child(7) { transition-delay: 0.7s; }
.fade-up-item:nth-child(8) { transition-delay: 0.8s; }

/* ====== BUTTONS ====== */
.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 14px;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.2s ease;
    border: none;
    white-space: nowrap;
}

.btn-primary {
    background: var(--primary-color);
    color: white;
    box-shadow: 0 2px 4px rgba(139, 0, 0, 0.2);
}

.btn-primary:hover {
    background: var(--primary-hover);
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(139, 0, 0, 0.3);
}

.btn-outline-primary {
    background: transparent;
    color: var(--primary-color);
    border: 2px solid var(--primary-color);
}

.btn-outline-primary:hover {
    background: var(--primary-color);
    color: white;
}

.btn-outline-light {
    background: transparent;
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.8);
}

.btn-outline-light:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: white;
}

.btn-secondary {
    background: var(--light-tertiary);
    color: var(--light-text-secondary);
    border: 1px solid var(--light-border);
}

.btn-lg {
    padding: 16px 32px;
    font-size: 16px;
}

/* ====== CATALOG SPECIFIC BUTTONS ====== */
.btn-catalog-download {
    background: var(--primary-color);
    color: white;
    box-shadow: 0 2px 4px rgba(139, 0, 0, 0.2);
    border: none;
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    white-space: nowrap;
}

.btn-catalog-download:hover {
    background: var(--primary-hover);
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(139, 0, 0, 0.3);
}

.btn-catalog-preview {
    background: transparent;
    color: var(--primary-color);
    border: none;
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    white-space: nowrap;
    box-shadow: 0 2px 4px rgba(139, 0, 0, 0.1);
}

.btn-catalog-preview:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(139, 0, 0, 0.3);
}

/* Remove focus outline for all buttons */
.btn-catalog-download:focus,
.btn-catalog-preview:focus {
    outline: none;
}

/* ====== HERO BUTTONS ====== */
.btn-hero {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    font-weight: 700;
    transition: all 0.3s ease;
}

.btn-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
    z-index: 1;
    transition: all 0.3s ease;
}

.btn-hero.btn-primary {
    background: var(--primary-color);
    color: white;
    border: none;
}

.btn-hero.btn-outline-light {
    background: rgba(255, 255, 255, 0.1);
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.8);
}

.btn-hero:hover::before {
    background: linear-gradient(90deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.4));
}

.btn-hero:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

/* ====== CTA CUSTOM BUTTON ====== */
.cta-custom-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 16px 32px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 16px;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.3s ease;
    border: 2px solid rgba(255, 255, 255, 0.8);
    color: white;
    background: rgba(255, 255, 255, 0.1);
    white-space: nowrap;
    position: relative;
    overflow: hidden;
}

.cta-custom-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
    z-index: 1;
    transition: all 0.3s ease;
}

.cta-custom-btn:hover::before {
    background: linear-gradient(90deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.4));
}

.cta-custom-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    background: rgba(255, 255, 255, 0.15);
    /* Tidak ada perubahan border pada hover */
    border: 2px solid rgba(255, 255, 255, 0.8);
}

/* ====== HERO SECTION ====== */
.hero-section {
    position: relative;
    height: 85vh;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    overflow: hidden;
}

.hero-bg {
    position: absolute;
    inset: 0;
    background-position: center;
    background-size: cover;
    z-index: -2;
    /* Menambahkan efek blur pada gambar hero */
    filter: blur(4px);
    transform: scale(1.05); /* Sedikit zoom untuk menghindari tepi putih akibat blur */
}

.hero-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.6); /* Meningkatkan opacity untuk memastikan teks tetap terbaca dengan blur */
    z-index: -1;
}

.hero-container {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 24px;
}

.hero-content {
    max-width: 800px;
    text-align: center;
}

.hero-kicker {
    display: inline-block;
    padding: 8px 20px;
    border-radius: 30px;
    font-weight: 600;
    font-size: 14px;
    background: var(--primary-color);
    margin-bottom: 24px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.hero-title {
    font-size: clamp(2.5rem, 6vw, 5rem);
    font-weight: 900;
    margin-bottom: 24px;
    line-height: 1.1;
}

.hero-gradient {
    background: linear-gradient(90deg, #8B0000, #CD5C5C, #FF6B6B);
    background-clip: text;
    -webkit-background-clip: text;
    color: transparent;
}

.hero-subtitle {
    font-size: 18px;
    margin-bottom: 40px;
    line-height: 1.6;
    opacity: 0.9;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.hero-actions {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
}

/* ====== INFO BANNER ====== */
.info-banner {
    padding: 80px 0;
    background: var(--light-secondary);
}

body.dark-theme .info-banner {
    background: var(--dark-secondary);
}

.info-header {
    margin-bottom: 60px;
}

.info-title {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 16px;
    color: var(--light-text);
}

body.dark-theme .info-title {
    color: var(--dark-text);
}

.info-subtitle {
    font-size: 18px;
    color: var(--light-text-secondary);
}

body.dark-theme .info-subtitle {
    color: var(--dark-text-secondary);
}

.info-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 24px;
}

.info-stat-item {
    text-align: center;
    padding: 32px 24px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease;
}

body.dark-theme .info-stat-item {
    background: var(--dark-tertiary);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.info-stat-item:hover {
    transform: translateY(-4px);
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 900;
    color: var(--primary-color);
    margin-bottom: 8px;
}

.stat-desc {
    font-size: 16px;
    font-weight: 600;
    color: var(--light-text);
}

body.dark-theme .stat-desc {
    color: var(--dark-text-secondary);
}

/* ====== SECTION HEADERS ====== */
.section-header {
    margin-bottom: 48px;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 16px;
    color: var(--light-text);
}

body.dark-theme .section-title {
    color: var(--dark-text);
}

.section-subtitle {
    font-size: 18px;
    color: var(--light-text-secondary);
}

body.dark-theme .section-subtitle {
    color: var(--dark-text-secondary);
}

/* ====== FEATURED CATEGORIES ====== */
.featured-categories {
    padding: 80px 0;
    background: var(--light-bg);
}

body.dark-theme .featured-categories {
    background: var(--dark-bg);
}

.categories-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 24px;
}

.category-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 32px 24px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    text-decoration: none;
    color: var(--light-text);
    transition: all 0.3s ease;
    border-left: 4px solid var(--primary-color);
}

body.dark-theme .category-card {
    background: var(--dark-tertiary);
    color: var(--dark-text);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.category-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
}

.category-name {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 8px;
    text-align: center;
    color: var(--light-text);
}

body.dark-theme .category-name {
    color: var(--dark-text);
}

.category-count {
    font-size: 14px;
    color: var(--light-text-secondary);
}

body.dark-theme .category-count {
    color: var(--dark-text-secondary);
}

/* ====== BRANDS SECTION ====== */
.brands-section {
    padding: 80px 0;
    background: var(--light-secondary);
}

body.dark-theme .brands-section {
    background: var(--dark-secondary);
}

.brands-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 24px;
}

.brand-item {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 24px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}

body.dark-theme .brand-item {
    background: var(--dark-tertiary);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.brand-item img {
    max-height: 40px;
    filter: grayscale(100%);
    opacity: 0.7;
    transition: all 0.3s ease;
}

.brand-item:hover img {
    filter: grayscale(0%);
    opacity: 1;
}

/* ====== TOP DOWNLOADS ====== */
.top-downloads {
    padding: 80px 0;
    background: var(--light-bg);
}

body.dark-theme .top-downloads {
    background: var(--dark-bg);
}

.downloads-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 24px;
}

.download-card {
    position: relative;
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
}

body.dark-theme .download-card {
    background: var(--dark-tertiary);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.download-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
}

.download-card::before {
    content: attr(data-rank);
    position: absolute;
    top: 16px;
    left: 16px;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: var(--primary-color);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    z-index: 2;
    font-size: 16px;
}

.download-image {
    height: 200px;
    overflow: hidden;
    background: var(--light-tertiary);
}

body.dark-theme .download-image {
    background: var(--dark-secondary);
}

.download-image-wrapper {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.download-image img,
.image-placeholder {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.image-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--light-tertiary);
    color: var(--primary-color);
    font-size: 24px;
    font-weight: 700;
    width: 100%;
    height: 100%;
}

body.dark-theme .image-placeholder {
    background: var(--dark-secondary);
    color: var(--primary-light);
}

.download-content {
    padding: 24px;
}

.download-category {
    display: inline-block;
    background: var(--primary-color);
    color: white;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 12px;
}

.download-title {
    font-size: 18px;
    font-weight: 700;
    margin: 0 0 12px 0;
    line-height: 1.3;
    color: var(--light-text);
}

body.dark-theme .download-title {
    color: var(--dark-text);
}

.download-meta {
    font-size: 14px;
    color: var(--light-text-secondary);
    margin-bottom: 16px;
}

body.dark-theme .download-meta {
    color: var(--dark-text-secondary);
}

.download-actions {
    padding: 0 24px 24px;
}

/* ====== CATALOG SECTION ====== */
.catalog-section {
    padding: 80px 0;
    background: var(--light-secondary);
}

body.dark-theme .catalog-section {
    background: var(--dark-secondary);
}

.catalog-list {
    display: flex;
    flex-direction: column;
    gap: 32px;
    width: 100%;
    max-width: 100%;
}

.catalog-item {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 32px;
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    width: 100%;
}

body.dark-theme .catalog-item {
    background: var(--dark-tertiary);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.catalog-item:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.1);
}

/* Alternating layout for catalog items */
.catalog-item-odd {
    grid-template-areas: "image content";
}

.catalog-item-even {
    grid-template-areas: "content image";
}

.catalog-item-odd .catalog-image {
    grid-area: image;
}

.catalog-item-odd .catalog-content {
    grid-area: content;
}

.catalog-item-even .catalog-image {
    grid-area: image;
}

.catalog-item-even .catalog-content {
    grid-area: content;
}

/* IMAGE SECTION */
.catalog-image {
    position: relative;
    height: 600px;
    overflow: hidden;
    background: var(--light-tertiary);
    display: flex;
    align-items: center;
    justify-content: center;
}

body.dark-theme .catalog-image {
    background: var(--dark-secondary);
}

.catalog-image-item {
    position: absolute;
    inset: 0;
    opacity: 0;
    transition: opacity 0.5s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.catalog-image-item.active {
    opacity: 1;
}

.image-wrapper {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 30px;
}

.catalog-image img,
.catalog-image .image-placeholder {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    width: auto;
    height: auto;
}

.catalog-image .image-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--light-tertiary);
    color: var(--primary-color);
    font-size: 48px;
    font-weight: 700;
    width: 100%;
    height: 100%;
}

body.dark-theme .catalog-image .image-placeholder {
    background: var(--dark-secondary);
    color: var(--primary-light);
}

/* Image Counter - SIMPLE & CLEAN WITH CORRECT COLORS */
.image-counter {
    position: absolute;
    top: 16px;
    right: 16px;
    background: rgba(255, 255, 255, 0.8);
    color: #333;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
    z-index: 10;
}

.current-slide {
    color: var(--primary-color);
    font-weight: 700;
}

/* Navigation Arrows - SIMPLE & CLEAN WITH CORRECT COLORS */
.image-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.8);
    color: #333;
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 10;
    transition: all 0.3s ease;
    opacity: 0;
    font-size: 14px;
}

.image-nav:hover {
    background: var(--primary-color);
    color: white;
    opacity: 1;
}

.catalog-image:hover .image-nav {
    opacity: 0.8;
}

.image-nav.prev {
    left: 16px;
}

.image-nav.next {
    right: 16px;
}

/* Navigation dots - SIMPLE & CLEAN WITH CORRECT COLORS */
.image-nav-dots {
    position: absolute;
    bottom: 20px;
    left: 0;
    right: 0;
    display: flex;
    justify-content: center;
    gap: 8px;
    z-index: 10;
}

.nav-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.6);
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
}

.nav-dot:hover {
    background: rgba(255, 255, 255, 0.9);
}

.nav-dot.active {
    background: var(--primary-color);
    width: 24px;
    border-radius: 4px;
}

/* Content Section */
.catalog-content {
    padding: 32px;
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.catalog-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 12px;
}

.catalog-category {
    background: var(--primary-color);
    color: white;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
}

.catalog-meta {
    display: flex;
    gap: 16px;
    font-size: 14px;
    color: var(--light-text-secondary);
}

body.dark-theme .catalog-meta {
    color: var(--dark-text-secondary);
}

.catalog-title {
    font-size: 24px;
    font-weight: 700;
    margin: 0;
    line-height: 1.3;
    color: var(--light-text);
}

body.dark-theme .catalog-title {
    color: var(--dark-text);
}

.catalog-description {
    color: var(--light-text-secondary);
    line-height: 1.6;
    margin: 0;
}

body.dark-theme .catalog-description {
    color: var(--dark-text-secondary);
}

.catalog-actions {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
    margin-top: auto;
}

.inline-form {
    display: inline;
}

/* ====== EMPTY STATE ====== */
.empty-state {
    padding: 80px 24px;
}

.empty-icon {
    font-size: 64px;
    margin-bottom: 24px;
}

.empty-state h3 {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 16px;
    color: var(--light-text);
}

body.dark-theme .empty-state h3 {
    color: var(--dark-text);
}

.empty-state p {
    font-size: 16px;
    color: var(--light-text-secondary);
    margin-bottom: 24px;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
}

body.dark-theme .empty-state p {
    color: var(--dark-text-secondary);
}

/* ====== STANDARDS SECTION ====== */
.standards-section {
    padding: 80px 0;
    background: var(--light-bg);
}

body.dark-theme .standards-section {
    background: var(--dark-bg);
}

.standards-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
}

.standard-card {
    text-align: center;
    padding: 32px 24px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    border-top: 3px solid var(--primary-color);
}

body.dark-theme .standard-card {
    background: var(--dark-tertiary);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.standard-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
}

.standard-card h4 {
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 12px;
    color: var(--light-text);
}

body.dark-theme .standard-card h4 {
    color: var(--dark-text);
}

.standard-card p {
    color: var(--light-text-secondary);
    line-height: 1.5;
}

body.dark-theme .standard-card p {
    color: var(--dark-text-secondary);
}

/* ====== FAQ SECTION ====== */
.faq-section {
    padding: 80px 0;
    background: var(--light-secondary);
}

body.dark-theme .faq-section {
    background: var(--dark-secondary);
}

.faq-list {
    max-width: 800px;
    margin: 0 auto;
}

.faq-item {
    background: white;
    border-radius: 12px;
    margin-bottom: 16px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}

body.dark-theme .faq-item {
    background: var(--dark-tertiary);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.faq-item summary {
    padding: 24px;
    cursor: pointer;
    font-weight: 600;
    font-size: 16px;
    display: flex;
    align-items: center;
    gap: 12px;
    color: var(--light-text);
}

body.dark-theme .faq-item summary {
    color: var(--dark-text);
}

.faq-item summary::-webkit-details-marker {
    display: none;
}

.faq-item summary::after {
    content: '+';
    margin-left: auto;
    font-size: 20px;
    color: var(--primary-color);
    transition: transform 0.2s ease;
}

.faq-item[open] summary::after {
    transform: rotate(45deg);
}

.faq-body {
    padding: 0 24px 24px;
    color: var(--light-text-secondary);
    line-height: 1.6;
    font-size: 16px;
}

body.dark-theme .faq-body {
    color: var(--dark-text-secondary);
}

/* ====== CTA SECTION ====== */
.cta-section {
    padding: 100px 0;
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('img/galeri-proyek/1.jpg') }}') center/cover no-repeat;
    color: white;
    text-align: center;
}

.cta-icon {
    font-size: 64px;
    margin-bottom: 24px;
}

.cta-title {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 16px;
}

.cta-description {
    font-size: 18px;
    margin-bottom: 32px;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
    line-height: 1.6;
}

.cta-actions {
    display: flex;
    gap: 16px;
    justify-content: center;
    flex-wrap: wrap;
}

/* ====== RESPONSIVE DESIGN ====== */
@media (max-width: 1200px) {
    .catalog-item {
        gap: 24px;
    }
    
    .catalog-image {
        height: 550px;
    }
}

@media (max-width: 992px) {
    .catalog-item {
        grid-template-columns: 1fr;
        grid-template-areas: "image" "content" !important;
        gap: 24px;
    }
    
    .catalog-image {
        height: 500px;
    }
    
    .standards-grid {
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }
}

@media (max-width: 768px) {
    .container {
        padding: 0 16px;
    }
    
    .hero-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .hero-actions .btn {
        width: 100%;
        max-width: 280px;
    }
    
    .info-stats,
    .categories-grid,
    .brands-grid,
    .downloads-grid {
        grid-template-columns: 1fr;
    }
    
    .catalog-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }
    
    .catalog-meta {
        gap: 12px;
    }
    
    .cta-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .cta-actions .btn,
    .cta-actions .cta-custom-btn {
        width: 100%;
        max-width: 280px;
    }
    
    .hero-title {
        font-size: clamp(2rem, 8vw, 3.5rem);
    }
    
    .info-title,
    .section-title {
        font-size: 2rem;
    }
    
    .catalog-title {
        font-size: 20px;
    }
    
    .catalog-image {
        height: 400px;
    }
    
    .image-wrapper {
        padding: 20px;
    }
    
    .image-nav {
        width: 36px;
        height: 36px;
        font-size: 12px;
    }
    
    .image-nav.prev {
        left: 12px;
    }
    
    .image-nav.next {
        right: 12px;
    }
    
    .image-counter {
        font-size: 12px;
        padding: 5px 10px;
    }
    
    .image-nav-dots {
        bottom: 15px;
        gap: 6px;
    }
    
    .nav-dot {
        width: 6px;
        height: 6px;
    }
    
    .nav-dot.active {
        width: 20px;
    }
    
    .standards-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
    }
    
    .standard-card {
        padding: 24px 16px;
    }
    
    .standard-card h4 {
        font-size: 18px;
    }
    
    .standard-card p {
        font-size: 14px;
    }
}

@media (max-width: 480px) {
    .catalog-image {
        height: 350px;
    }
    
    .image-wrapper {
        padding: 16px;
    }
    
    .image-counter {
        font-size: 11px;
        padding: 4px 8px;
    }
    
    .image-nav-dots {
        bottom: 12px;
        gap: 5px;
    }
    
    .nav-dot {
        width: 5px;
        height: 5px;
    }
    
    .nav-dot.active {
        width: 18px;
    }
    
    .standards-grid {
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }
    
    .standard-card {
        padding: 20px 12px;
    }
    
    .standard-card h4 {
        font-size: 16px;
    }
    
    .standard-card p {
        font-size: 14px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // ====== FADE UP ANIMATION ======
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    // Observe all fade-up elements
    document.querySelectorAll('.fade-up').forEach(el => {
        observer.observe(el);
    });
    
    document.querySelectorAll('.fade-up-item').forEach(el => {
        observer.observe(el);
    });
    
    // ====== IMAGE SLIDER WITH ARROWS ======
    document.querySelectorAll('.catalog-image').forEach(imageContainer => {
        const items = imageContainer.querySelectorAll('.catalog-image-item');
        const dots = imageContainer.querySelectorAll('.nav-dot');
        const prevBtn = imageContainer.querySelector('.image-nav.prev');
        const nextBtn = imageContainer.querySelector('.image-nav.next');
        const currentSlideEl = imageContainer.querySelector('.current-slide');
        const totalSlidesEl = imageContainer.querySelector('.total-slides');
        
        if (items.length <= 1) return;
        
        let currentIndex = 0;
        
        // Update total slides count
        if (totalSlidesEl) {
            totalSlidesEl.textContent = items.length;
        }
        
        function showSlide(index) {
            // Update items
            items.forEach((item, i) => {
                item.classList.toggle('active', i === index);
            });
            
            // Update dots
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === index);
            });
            
            // Update counter
            if (currentSlideEl) {
                currentSlideEl.textContent = index + 1;
            }
            
            currentIndex = index;
        }
        
        function nextSlide() {
            const nextIndex = (currentIndex + 1) % items.length;
            showSlide(nextIndex);
        }
        
        function prevSlide() {
            const prevIndex = (currentIndex - 1 + items.length) % items.length;
            showSlide(prevIndex);
        }
        
        // Dot navigation
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                showSlide(index);
            });
        });
        
        // Arrow navigation
        if (nextBtn) {
            nextBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                nextSlide();
            });
        }
        
        if (prevBtn) {
            prevBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                prevSlide();
            });
        }
        
        // Keyboard navigation
        imageContainer.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                prevSlide();
            } else if (e.key === 'ArrowRight') {
                nextSlide();
            }
        });
        
        // Touch/Swipe navigation
        let touchStartX = 0;
        let touchEndX = 0;
        
        imageContainer.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        });
        
        imageContainer.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });
        
        function handleSwipe() {
            const swipeThreshold = 50;
            const diff = touchStartX - touchEndX;
            
            if (Math.abs(diff) > swipeThreshold) {
                if (diff > 0) {
                    nextSlide(); // Swipe left, go to next
                } else {
                    prevSlide(); // Swipe right, go to prev
                }
            }
        }
        
        // Auto-play functionality (optional)
        let autoPlayInterval;
        
        function startAutoPlay() {
            autoPlayInterval = setInterval(nextSlide, 5000); // Change slide every 5 seconds
        }
        
        function stopAutoPlay() {
            clearInterval(autoPlayInterval);
        }
        
        // Start auto-play
        startAutoPlay();
        
        // Pause auto-play on hover
        imageContainer.addEventListener('mouseenter', stopAutoPlay);
        imageContainer.addEventListener('mouseleave', startAutoPlay);
        
        // Pause auto-play on touch
        imageContainer.addEventListener('touchstart', stopAutoPlay);
        imageContainer.addEventListener('touchend', () => {
            setTimeout(startAutoPlay, 3000); // Resume auto-play after 3 seconds
        });
    });
    
    // ====== COMPARE ======
    const COMPARE_KEY = 'catalog_compare';
    const MAX_COMPARE = 4;
    const getCompareItems = () => JSON.parse(localStorage.getItem(COMPARE_KEY) || '[]');
    const setCompareItems = (items) => localStorage.setItem(COMPARE_KEY, JSON.stringify(items));
    
    document.querySelectorAll('.btn-compare').forEach(btn => {
        const itemId = btn.dataset.id;
        const isComparing = getCompareItems().includes(itemId);
        
        if (isComparing) {
            btn.classList.add('active');
        }
        
        btn.addEventListener('click', function() {
            const items = getCompareItems();
            const index = items.indexOf(itemId);
            
            if (index > -1) {
                items.splice(index, 1);
                btn.classList.remove('active');
                btn.textContent = 'Bandingkan';
            } else if (items.length < MAX_COMPARE) {
                items.push(itemId);
                btn.classList.add('active');
                btn.textContent = 'Dibandingkan';
            } else {
                alert(`Maksimal ${MAX_COMPARE} item dapat dibandingkan.`);
            }
            
            setCompareItems(items);
        });
    });
});
</script>
@endsection