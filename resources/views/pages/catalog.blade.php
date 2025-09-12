@extends('components.layout')

@section('title', $title)

@section('content')
<!-- ===== HERO FULL SCREEN (compact top) ===== -->
<section class="hero-full hero-compact">
    <!-- Background image handled by layout; this keeps structure for parallax -->
    <div class="hero-bg" style="background-image:url('{{ asset('img/galeri-proyek/115.png') }}');"></div>
    <div class="hero-overlay"></div>
    
    <!-- Floating Elements -->
    <div class="floating-shapes">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        <div class="floating-shape shape-3"></div>
        <div class="floating-shape shape-4"></div>
        <div class="floating-shape shape-5"></div>
    </div>
    
    <!-- Animated Background Pattern -->
    <div class="hero-pattern"></div>

    <div class="container">
        <div class="row align-items-start justify-content-center text-center">
            <div class="col-xl-9 col-lg-10 hero-content" data-aos="fade-up">
                <span class="hero-kicker">
                    <i class="fas fa-sparkles me-2"></i>
                    Koleksi Digital
                </span>
                <h1 class="hero-title">
                    Katalog <span class="hero-gradient">Insulasi Industri</span>
                </h1>
                <p class="hero-subtitle">
                    Jelajahi <strong>brosur, spesifikasi, manual, dan sertifikat</strong>—semua terkurasi di satu tempat.
                    Cari berdasarkan <em>produk, standar, atau aplikasi</em>, simpan favorit untuk nanti, dan unduh
                    dokumen resmi <strong>dengan sekali klik</strong>.
                </p>

                <ul class="hero-points">
                    <li data-aos="fade-up" data-aos-delay="100">
                        <i class="fas fa-magnifying-glass"></i> 
                        <span>Pencarian cepat & akurat</span>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-shield-alt"></i> 
                        <span>Dokumen tepercaya & terbaru</span>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="300">
                        <i class="fas fa-cloud-arrow-down"></i> 
                        <span>Unduhan instan tanpa ribet</span>
                    </li>
                </ul>

                <div class="hero-actions" data-aos="fade-up" data-aos-delay="400">
                    <a href="#catalog-list" class="btn btn-primary btn-lg">
                        <i class="fas fa-book-open me-2"></i>Jelajahi Katalog
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-headset me-2"></i>Konsultasi Gratis
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== SCROLL PROGRESS BAR ===== -->
<div class="scroll-progress" aria-hidden="true"><span class="scroll-progress__bar"></span></div>

<!-- ===== STATS RIBBON ===== -->
<section class="stats-ribbon" aria-label="Statistic highlights">
    <div class="container">
        <div class="stats-grid" data-aos="fade-up">
            <div class="stat">
                <div class="stat-icon"><i class="fas fa-layer-group"></i></div>
                <div><div class="stat-label">Total Katalog</div><div class="stat-value">{{ number_format($catalogItems->total()) }}</div></div>
            </div>
            @isset($categories)
            <div class="stat">
                <div class="stat-icon"><i class="fas fa-tags"></i></div>
                <div><div class="stat-label">Kategori</div><div class="stat-value">{{ count($categories) }}</div></div>
            </div>
            @endisset
            <div class="stat">
                <div class="stat-icon"><i class="fas fa-download"></i></div>
                <div><div class="stat-label">Total Unduhan</div><div class="stat-value">{{ isset($totalDownloads) ? number_format($totalDownloads) : number_format(($catalogItems->sum('download_count') ?? 0)) }}</div></div>
            </div>
            <div class="stat">
                <div class="stat-icon"><i class="fas fa-shield"></i></div>
                <div><div class="stat-label">Keaslian Dokumen</div><div class="stat-value">Diverifikasi</div></div>
            </div>
        </div>
    </div>
</section>

<!-- ===== FEATURED CATEGORIES (Horizontal Snap) ===== -->
@isset($featuredCategories)
<section class="featured-cats">
    <div class="container">
        <div class="section-head" data-aos="fade-up">
            <h2 class="section-title">Kategori Unggulan</h2>
            <p class="section-sub">Telusuri kategori yang paling banyak dicari pengguna.</p>
        </div>
        <div class="cat-scroller" data-aos="fade-up">
            @foreach($featuredCategories as $fc)
            <a class="cat-card" href="{{ route('catalog1-page', ['category' => $fc['slug']]) }}">
                <div class="cc-icon"><i class="{{ $fc['icon'] ?? 'fas fa-shapes' }}"></i></div>
                <div class="cc-name">{{ $fc['name'] }}</div>
                <div class="cc-meta">{{ $fc['count'] ?? 0 }} dokumen</div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endisset

<!-- ===== PARTNERS / BRANDS MARQUEE ===== -->
@isset($brandLogos)
@if(count($brandLogos))
<section class="brands-marquee" aria-label="Merek pendukung">
    <div class="container">
        <div class="marquee" data-aos="fade-up">
            <div class="marquee-track">
                @foreach($brandLogos as $logo)
                <div class="brand-item"><img src="{{ asset('storage/'.$logo) }}" alt="Brand" loading="lazy"></div>
                @endforeach
                @foreach($brandLogos as $logo)
                <div class="brand-item"><img src="{{ asset('storage/'.$logo) }}" alt="Brand" loading="lazy"></div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
@endisset

<!-- ===== TOP DOWNLOADS ===== -->
@isset($topDownloads)
@if($topDownloads->count())
<section class="top-downloads">
    <div class="container">
        <div class="section-head" data-aos="fade-up">
            <h2 class="section-title">Paling Banyak Diunduh</h2>
            <p class="section-sub">Dokumen favorit pengguna minggu ini.</p>
        </div>
        <div class="td-grid">
            @foreach($topDownloads as $i => $td)
            <article class="td-card" data-rank="{{ $i+1 }}" data-aos="fade-up" data-aos-delay="{{ ($i%6)*50 }}">
                <button class="btn-like" type="button" aria-label="Favoritkan" data-id="{{ $td->id }}"><i class="fas fa-heart"></i></button>
                <a href="{{ route('catalog1-page.detail', $td->slug) }}" class="td-thumb">
                    @if($td->image)
                        <img src="{{ asset('storage/' . $td->image) }}" alt="{{ $td->title }}" loading="lazy">
                    @else
                        <div class="thumb placeholder"><i class="fas fa-file-pdf"></i></div>
                    @endif
                </a>
                <div class="td-body">
                    <a class="td-cat" href="{{ route('catalog1-page', ['category' => $td->category]) }}">{{ ucfirst(str_replace('-', ' ', $td->category ?? 'General')) }}</a>
                    <h3 class="td-title"><a href="{{ route('catalog1-page.detail', $td->slug) }}">{{ $td->title }}</a></h3>
                    <div class="td-meta"><i class="fas fa-download me-1"></i>{{ $td->download_count ?? 0 }} unduhan</div>
                </div>
                <div class="td-actions"><button class="btn btn-outline-secondary btn-compare" data-id="{{ $td->id }}"><i class="fas fa-code-compare me-2"></i>Bandingkan</button></div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif
@endisset

<!-- ===== CATALOG LIST ===== -->
<section class="catalog-list-section" id="catalog-list">
  <div class="container">
    @if($catalogItems->count() > 0)
      <div class="results-info mb-4" data-aos="fade-up">
        <span class="text-muted">Menampilkan {{ $catalogItems->firstItem() }}–{{ $catalogItems->lastItem() }} dari {{ $catalogItems->total() }} katalog</span>
      </div>

      <div class="catalog-list" data-view="list">
        @foreach($catalogItems as $index => $item)
          @php
            // Pastikan relasi ada walau tanpa eager load
            $item->loadMissing(['images','files']);

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

            $iconMap = [
                'pdf'=>'file-pdf','doc'=>'file-word','docx'=>'file-word',
                'xls'=>'file-excel','xlsx'=>'file-excel','ppt'=>'file-powerpoint','pptx'=>'file-powerpoint',
            ];
            $faIcon = $iconMap[$ext] ?? 'file';
            $badge  = strtoupper($ext ?: 'FILE');
            $fileSize = $primaryFile->size ?? ($item->file_size ?? null);

            $sliderId = 'thumb-slider-'.$item->id;
            @endphp

            <article class="catalog-row" data-aos="fade-up" data-aos-delay="{{ ($index%6)*50 }}">
            <div class="floating-actions">
                <button class="btn-icon btn-like" type="button" aria-label="Favoritkan" data-id="{{ $item->id }}"><i class="fas fa-heart"></i></button>
                <button class="btn-icon btn-compare" type="button" aria-label="Bandingkan" data-id="{{ $item->id }}"><i class="fas fa-code-compare"></i></button>
            </div>

            {{-- ==== THUMB SLIDER ==== --}}
            <figure class="thumb-wrap thumb-has-slider" data-slider-id="{{ $sliderId }}">
              <div class="thumb-viewport">
                @if($images->count() > 0)
                  @foreach($images as $i => $img)
                    @php
                      $imgUrl = $toPublic($img->image_url);
                      $imgAlt = $img->alt_text ?: $item->title;
                    @endphp
                    <div class="slide {{ $i===0 ? 'is-active' : '' }}" data-index="{{ $i }}">
                      <img src="{{ $imgUrl }}" alt="{{ $imgAlt }}" class="thumb skeleton" loading="lazy">
                    </div>
                  @endforeach
                @else
                  <div class="slide is-active" data-index="0">
                    <div class="thumb placeholder"><i class="fas fa-{{ $faIcon }}"></i></div>
                  </div>
                @endif
              </div>

              {{-- Nav + dots (auto-hidden jika <=1 gambar) --}}
              <button class="thumb-nav prev" type="button" aria-label="Sebelumnya" data-dir="-1"><i class="fas fa-chevron-left"></i></button>
              <button class="thumb-nav next" type="button" aria-label="Berikutnya" data-dir="1"><i class="fas fa-chevron-right"></i></button>
              <div class="thumb-dots" role="tablist" aria-label="Navigasi gambar"></div>

              {{-- link masker ke detail (di bawah nav supaya nav bisa diklik) --}}
              <a class="thumb-mask-link" href="{{ route('catalog1-page.detail', $item->slug) }}" aria-label="Lihat detail {{ $item->title }}"></a>

              {{-- badges --}}
              <span class="badge filetype"><i class="fas fa-{{ $faIcon }} me-1"></i>{{ $badge }}</span>
              @if(!empty($fileSize))
                <span class="badge filesize">{{ $fileSize }}</span>
              @endif
            </figure>

            <div class="content">
              <div class="topline">
                <a href="{{ route('catalog1-page', ['category' => $item->category]) }}" class="category">
                  {{ ucfirst(str_replace('-', ' ', $item->category ?? 'General')) }}
                </a>
                <div class="meta">
                  <span><i class="fas fa-calendar"></i> {{ $item->created_at->format('d M Y') }}</span>
                  <span><i class="fas fa-download"></i> {{ $item->download_count ?? 0 }} unduhan</span>
                </div>
              </div>

              <h3 class="title"><a href="{{ route('catalog1-page.detail', $item->slug) }}">{{ $item->title }}</a></h3>
              <p class="desc line-clamp-3">{{ \Illuminate\Support\Str::limit($item->description, 220) }}</p>

              <div class="cta">
                @if($fileUrl)
                  <a href="{{ $fileUrl }}" class="btn btn-primary" download>
                    <i class="fas fa-download"></i> Download
                  </a>
                  <a href="{{ $fileUrl }}" class="btn btn-outline-primary" target="_blank" rel="noopener">
                    <i class="fas fa-eye"></i> {{ $ext === 'pdf' ? 'Preview' : 'Buka' }}
                  </a>
                @else
                  <button class="btn btn-outline-secondary" disabled>
                    <i class="fas fa-ban"></i> File Tidak Tersedia
                  </button>
                @endif

                <a href="{{ route('catalog1-page.detail', $item->slug) }}" class="btn btn-outline-secondary">
                  <i class="fas fa-info-circle"></i> Detail
                </a>
              </div>
            </div>
          </article>
        @endforeach
      </div>

      <div class="pagination-wrapper text-center mt-5" data-aos="fade-up">
        {{ $catalogItems->onEachSide(1)->links('pagination::bootstrap-4') }}
      </div>
    @else
      <!-- Empty state -->
      <div class="no-catalog text-center" data-aos="fade-up">
        <div class="no-catalog-icon"><i class="fas fa-folder-open"></i></div>
        <h3>Katalog Tidak Ditemukan</h3>
        <p>
          @if(request('search') || request('category') || request('type'))
            Tidak ada katalog yang sesuai dengan kriteria. Coba kata kunci atau filter lain.
          @else
            Katalog digital sedang dalam tahap pengembangan. Silakan cek kembali nanti.
          @endif
        </p>

        @if(request('search') || request('category') || request('type'))
          <a href="{{ route('catalog1-page') }}" class="btn btn-primary"><i class="fas fa-refresh"></i> Lihat Semua Katalog</a>
        @else
          <a href="{{ route('contact') }}" class="btn btn-primary"><i class="fas fa-phone"></i> Hubungi Kami</a>
        @endif
      </div>
    @endif
  </div>
</section>

<!-- ===== STANDARDS & COMPLIANCE ===== -->
<section class="standards-section">
    <div class="container">
        <div class="section-head" data-aos="fade-up">
            <h2 class="section-title">Standar & Kepatuhan</h2>
            <p class="section-sub">Referensi ke standar yang relevan untuk aplikasi industri Anda.</p>
        </div>
        <div class="std-grid" data-aos="fade-up">
            <div class="std-card"><div class="std-icon"><i class="fas fa-industry"></i></div><h4>ASTM</h4><p>Spesifikasi material & metode uji terkait insulasi.</p></div>
            <div class="std-card"><div class="std-icon"><i class="fas fa-fire"></i></div><h4>FM/UL</h4><p>Sertifikasi keselamatan kebakaran & performa.</p></div>
            <div class="std-card"><div class="std-icon"><i class="fas fa-leaf"></i></div><h4>ISO</h4><p>Manajemen mutu, lingkungan, & keselamatan.</p></div>
            <div class="std-card"><div class="std-icon"><i class="fas fa-helmet-safety"></i></div><h4>OSHA</h4><p>Praktik kerja aman dalam instalasi di lapangan.</p></div>
        </div>
    </div>
</section>

<!-- ===== FAQ ===== -->
<section class="faq-section">
    <div class="container">
        <div class="section-head" data-aos="fade-up">
            <h2 class="section-title">Pertanyaan Umum</h2>
            <p class="section-sub">Jawaban cepat untuk hal-hal yang sering ditanyakan.</p>
        </div>
        <div class="faq-list" data-aos="fade-up">
            <details class="faq-item" {{ request('open')==='format' ? 'open' : '' }}>
                <summary><i class="fas fa-file-circle-question me-2"></i>Format dokumen apa yang tersedia?</summary>
                <div class="faq-body">Sebagian besar dokumen tersedia dalam format PDF, disertai gambar pendukung dan kadang XLS/DOC untuk spesifikasi teknis.</div>
            </details>
            <details class="faq-item"><summary><i class="fas fa-rotate me-2"></i>Seberapa sering koleksi diperbarui?</summary><div class="faq-body">Kami memperbarui katalog secara berkala. Lihat cap tanggal di setiap item untuk mengetahui rilis terbaru.</div></details>
            <details class="faq-item"><summary><i class="fas fa-lock me-2"></i>Apakah dokumen resmi?</summary><div class="faq-body">Ya, semua dokumen bersumber dari vendor/pabrikan dan tim QC kami memastikan keasliannya.</div></details>
            <details class="faq-item"><summary><i class="fas fa-star me-2"></i>Bisakah saya simpan favorit?</summary><div class="faq-body">Klik ikon hati pada kartu untuk menandai favorit (tersimpan di perangkat Anda).</div></details>
        </div>
    </div>
</section>

<!-- ===== CTA ===== -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content text-center" data-aos="fade-up">
            <div class="cta-icon"><i class="fas fa-headset"></i></div>
            <h2 class="cta-title">Butuh Bantuan Memilih Produk?</h2>
            <p class="cta-description">Tim ahli kami siap membantu Anda memilih produk yang tepat sesuai kebutuhan proyek Anda.</p>
            <div class="cta-actions">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-lg me-3"><i class="fas fa-phone"></i> Konsultasi Gratis</a>
                <a href="{{ route('products') }}" class="btn btn-outline-primary btn-lg"><i class="fas fa-cubes"></i> Lihat Produk</a>
            </div>
        </div>
    </div>
</section>

<!-- ===== NEWSLETTER / UPDATE SUBSCRIBE ===== -->
<section class="newsletter">
    <div class="container">
        <div class="newsletter-inner" data-aos="fade-up">
            <div class="nl-text">
                <h3>Dapatkan Update Katalog</h3>
                <p>Kami kirimkan rilis dokumen terbaru langsung ke email Anda.</p>
            </div>
            <form action="#" method="post" class="nl-form" onsubmit="event.preventDefault(); alert('Terima kasih!');">
                <input type="email" placeholder="Email Anda" required>
                <button class="btn btn-primary"><i class="fas fa-envelope-open-text me-2"></i>Berlangganan</button>
            </form>
        </div>
    </div>
</section>

<!-- ===== MINI CTA ===== -->
<section class="mini-cta">
    <div class="container mini-cta-inner" data-aos="fade-up">
        <div class="mini-cta-text"><h3>Kirim Permintaan Dokumen</h3><p>Tidak menemukan yang Anda cari? Kirimkan daftar dokumen yang Anda butuhkan—kami bantu carikan.</p></div>
        <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-lg"><i class="fas fa-paper-plane me-2"></i>Ajukan Permintaan</a>
    </div>
</section>

<!-- ===== COMPARE BAR (Local) ===== -->
<div class="compare-bar" role="region" aria-live="polite">
    <div class="container compare-inner">
        <div class="compare-list"></div>
        <div class="compare-actions">
            <button class="btn btn-outline-secondary btn-compare-clear"><i class="fas fa-trash"></i> Hapus</button>
            <button class="btn btn-primary btn-compare-view"><i class="fas fa-code-compare me-2"></i>Lihat Perbandingan</button>
        </div>
    </div>
</div>

<style>
/* ========= MODERN THEME SYSTEM ========= */
:root {
  /* Brand Colors - Deep Red Theme */
  --brand-primary: #8b0000;
  --brand-secondary: #a20000;
  --brand-accent: #dc2626;
  --brand-gradient: linear-gradient(135deg, #8b0000 0%, #a20000 50%, #dc2626 100%);
  --brand-shadow: rgba(139, 0, 0, 0.25);
  
  /* Light Mode */
  --bg-primary: #ffffff;
  --bg-secondary: #f8fafc;
  --bg-tertiary: #f1f5f9;
  --surface: #ffffff;
  --surface-elevated: #ffffff;
  --surface-overlay: rgba(255, 255, 255, 0.95);
  
  /* Text Colors */
  --text-primary: #0f172a;
  --text-secondary: #334155;
  --text-muted: #64748b;
  --text-inverse: #ffffff;
  
  /* Border & Dividers */
  --border-light: #e2e8f0;
  --border-medium: #cbd5e1;
  --border-strong: #94a3b8;
  
  /* Shadows & Effects */
  --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
  --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
  --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
  --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
  --shadow-brand: 0 10px 30px rgba(139, 0, 0, 0.2);
  
  /* Glass Effects */
  --glass-bg: rgba(255, 255, 255, 0.1);
  --glass-border: rgba(255, 255, 255, 0.2);
  --backdrop-blur: blur(12px);
  
  /* Gradients */
  --overlay-gradient: linear-gradient(180deg, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.7) 100%);
}

/* Dark Mode */
body[data-theme="dark"], 
body.dark {
  /* Backgrounds */
  --bg-primary: #0a0e1a;
  --bg-secondary: #0f1629;
  --bg-tertiary: #1e293b;
  --surface: #1e293b;
  --surface-elevated: #334155;
  --surface-overlay: rgba(30, 41, 59, 0.95);
  
  /* Text Colors */
  --text-primary: #f8fafc;
  --text-secondary: #cbd5e1;
  --text-muted: #94a3b8;
  
  /* Borders */
  --border-light: #334155;
  --border-medium: #475569;
  --border-strong: #64748b;
  
  /* Glass Effects */
  --glass-bg: rgba(0, 0, 0, 0.2);
  --glass-border: rgba(255, 255, 255, 0.1);
  
  /* Gradients */
  --overlay-gradient: linear-gradient(180deg, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0.9) 100%);
}

/* Auto Dark Mode */
@media (prefers-color-scheme: dark) {
  body:not([data-theme="light"]) {
    --bg-primary: #0a0e1a;
    --bg-secondary: #0f1629;
    --bg-tertiary: #1e293b;
    --surface: #1e293b;
    --surface-elevated: #334155;
    --surface-overlay: rgba(30, 41, 59, 0.95);
    --text-primary: #f8fafc;
    --text-secondary: #cbd5e1;
    --text-muted: #94a3b8;
    --border-light: #334155;
    --border-medium: #475569;
    --border-strong: #64748b;
    --glass-bg: rgba(0, 0, 0, 0.2);
    --glass-border: rgba(255, 255, 255, 0.1);
    --overlay-gradient: linear-gradient(180deg, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0.9) 100%);
    --hero-gradient: radial-gradient(ellipse at top, rgba(139, 0, 0, 0.2) 0%, transparent 50%);
  }
}

/* ========= GLOBAL STYLES ========= */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html {
  scroll-behavior: smooth;
  overflow-x: hidden;
}

body {
  font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  background: var(--bg-primary);
  color: var(--text-primary);
  line-height: 1.6;
  transition: background-color 0.3s ease, color 0.3s ease;
  overflow-x: hidden;
}

/* Enhanced Scrollbar */
* {
  scrollbar-width: thin;
  scrollbar-color: var(--brand-primary) var(--bg-secondary);
}

::-webkit-scrollbar {
  width: 8px;
  height: 8px;
}

::-webkit-scrollbar-track {
  background: var(--bg-secondary);
  border-radius: 10px;
}

::-webkit-scrollbar-thumb {
  background: var(--brand-gradient);
  border-radius: 10px;
  transition: all 0.3s ease;
}

::-webkit-scrollbar-thumb:hover {
  background: var(--brand-secondary);
  box-shadow: var(--shadow-brand);
}

/* Container */
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

/* Enhanced Buttons */
.btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  padding: 12px 24px;
  border: none;
  border-radius: 12px;
  font-weight: 600;
  font-size: 14px;
  text-decoration: none;
  cursor: pointer;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  position: relative;
  overflow: hidden;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.btn::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
  transition: left 0.5s;
}

.btn:hover::before {
  left: 100%;
}

.btn-primary {
  background: var(--brand-gradient);
  color: var(--text-inverse);
  box-shadow: var(--shadow-brand);
}

.btn-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 15px 35px rgba(139, 0, 0, 0.4);
}

.btn-outline-primary {
  border: 2px solid var(--brand-primary);
  color: var(--brand-primary);
  background: transparent;
}

.btn-outline-primary:hover {
  background: var(--brand-primary);
  color: var(--text-inverse);
  transform: translateY(-1px);
}

.btn-outline-secondary {
  border: 2px solid var(--border-medium);
  color: var(--text-secondary);
  background: transparent;
}

.btn-outline-secondary:hover {
  background: var(--surface-elevated);
  border-color: var(--brand-primary);
  color: var(--brand-primary);
}

.btn-outline-light {
  border: 2px solid rgba(255, 255, 255, 0.3);
  color: var(--text-inverse);
  background: var(--glass-bg);
  backdrop-filter: var(--backdrop-blur);
}

.btn-outline-light:hover {
  background: rgba(255, 255, 255, 0.2);
  border-color: rgba(255, 255, 255, 0.5);
  transform: translateY(-1px);
}

.btn-lg {
  padding: 16px 32px;
  font-size: 16px;
  border-radius: 16px;
}

.btn-icon {
  width: 44px;
  height: 44px;
  border-radius: 12px;
  border: 1px solid var(--border-light);
  background: var(--surface);
  display: grid;
  place-items: center;
  color: var(--text-secondary);
  transition: all 0.3s ease;
  backdrop-filter: var(--backdrop-blur);
}

.btn-icon:hover {
  background: var(--brand-primary);
  color: var(--text-inverse);
  transform: translateY(-2px);
  box-shadow: var(--shadow-brand);
}

/* ========= SCROLL PROGRESS ========= */
.scroll-progress {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  z-index: 1000;
  background: var(--surface-overlay);
  backdrop-filter: var(--backdrop-blur);
}

.scroll-progress__bar {
  height: 100%;
  width: 0%;
  background: var(--brand-gradient);
  box-shadow: 0 0 20px var(--brand-shadow);
  transition: width 0.1s ease;
  position: relative;
}

.scroll-progress__bar::after {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  width: 20px;
  height: 100%;
  background: linear-gradient(90deg, transparent, var(--brand-accent));
  border-radius: 0 4px 4px 0;
}

/* ========= ENHANCED HERO SECTION ========= */
.hero-full {
  position: relative;
  min-height: 85vh;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--text-inverse);
  overflow: hidden;
  padding: 10px 0 40px;
}

.hero-bg {
  position: absolute;
  inset: 0;
  background-position: center;
  background-size: cover;
  filter: blur(4px);
  z-index: 0;
}

.hero-overlay {
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.5);
  z-index: 1;
}
.hero-content {
  position: relative;
  z-index: 10;
  text-align: center;
  max-width: 900px;
  animation: heroFadeIn 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  margin-top: 0; /* dulu terlalu besar → diperkecil */
}

/* kalau jarak besarnya datang dari h1/h2 pertama, nolkan margin atasnya */
.hero-content > :first-child {
  margin-top: 0;
}


.hero-kicker {
  display: inline-block;
  padding: 10px 20px;
  border-radius: 50px;
  font-weight: 700;
  font-size: 14px;
  letter-spacing: 1px;
  background: var(--glass-bg);
  border: 1px solid var(--glass-border);
  backdrop-filter: var(--backdrop-blur);
  margin-bottom: 16px;
  text-transform: uppercase;
  animation: float 3s ease-in-out infinite;
}

.hero-title {
  font-size: clamp(2.5rem, 5vw, 4rem);
  font-weight: 900;
  letter-spacing: -0.02em;
  margin-bottom: 12px;
  line-height: 1.1;
}

/* Text gradient: dark red tones */
.hero-gradient{
  --g1: #5b0a0a; /* maroon */
  --g2: #8b0000; /* darkred */
  --g3: #c81e1e; /* ruby */

  background-image: linear-gradient(90deg, var(--g1), var(--g2), var(--g3));
  background-clip: text;
  -webkit-background-clip: text;      /* Safari/Chrome */
  color: transparent;                  /* Firefox */
  -webkit-text-fill-color: transparent;/* Safari/Chrome */
}

/* fallback kalau browser tidak dukung background-clip:text */
@supports not (background-clip: text){
  .hero-gradient{ color: #8b0000; }
}

.hero-subtitle {
  font-size: clamp(1rem, 2vw, 1.25rem);
  opacity: 0.95;
  margin-bottom: 20px;
  max-width: 700px;
  margin-left: auto;
  margin-right: auto;
  line-height: 1.6;
}

.hero-points {
  display: flex;
  gap: 16px;
  justify-content: center;
  flex-wrap: wrap;
  list-style: none;
  margin: 24px 0;
}

.hero-points li {
  display: flex;
  align-items: center;
  gap: 10px;
  font-weight: 600;
  font-size: 15px;
  background: var(--glass-bg);
  border: 1px solid var(--glass-border);
  backdrop-filter: var(--backdrop-blur);
  padding: 12px 20px;
  border-radius: 50px;
  transition: all 0.3s ease;
}

.hero-points li:hover {
  transform: translateY(-2px);
  background: rgba(255, 255, 255, 0.2);
}

.hero-points li i {
  color: var(--brand-accent);
  font-size: 16px;
}

.hero-actions {
  display: flex;
  gap: 16px;
  justify-content: center;
  flex-wrap: wrap;
  margin-top: 32px;
}

/* ========= FLOATING SHAPES & VISUAL ENHANCEMENTS ========= */

.floating-shapes {
  position: absolute;
  inset: 0;
  pointer-events: none;
  z-index: 3;
  overflow: hidden;
}

.floating-shape {
  position: absolute;
  border-radius: 50%;
  background: var(--brand-gradient);
  opacity: 0.1;
  animation: floatingMove 20s linear infinite;
}

.floating-shape.shape-1 {
  width: 120px;
  height: 120px;
  top: 20%;
  left: 10%;
  animation-duration: 25s;
  animation-delay: 0s;
}

.floating-shape.shape-2 {
  width: 80px;
  height: 80px;
  top: 60%;
  right: 15%;
  animation-duration: 30s;
  animation-delay: -5s;
}

.floating-shape.shape-3 {
  width: 60px;
  height: 60px;
  top: 40%;
  left: 80%;
  animation-duration: 35s;
  animation-delay: -10s;
  border-radius: 20px;
  background: linear-gradient(45deg, var(--brand-primary), var(--brand-accent));
}

.floating-shape.shape-4 {
  width: 100px;
  height: 100px;
  bottom: 30%;
  left: 20%;
  animation-duration: 28s;
  animation-delay: -15s;
  clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
  border-radius: 0;
}

.floating-shape.shape-5 {
  width: 40px;
  height: 40px;
  top: 15%;
  right: 30%;
  animation-duration: 22s;
  animation-delay: -8s;
  background: radial-gradient(circle, var(--brand-accent), transparent);
}

.hero-pattern {
  position: absolute;
  inset: 0;
  background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"><circle cx="30" cy="30" r="2" fill="rgba(255,255,255,0.05)"/><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.03)"/><circle cx="50" cy="20" r="1.5" fill="rgba(255,255,255,0.04)"/></svg>') repeat;
  animation: patternMove 40s linear infinite;
  z-index: 2;
  opacity: 0.6;
}

.scroll-indicator {
  position: absolute;
  bottom: 30px;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
  color: rgba(255, 255, 255, 0.8);
  font-size: 14px;
  font-weight: 500;
  animation: bounce 2s infinite;
}

.scroll-indicator i {
  font-size: 20px;
  animation: bounceArrow 2s infinite;
}

/* ========= ENHANCED SECTION BACKGROUNDS ========= */

.featured-cats {
  position: relative;
  overflow: hidden;
}

.featured-cats::before {
  content: '';
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: radial-gradient(circle at 30% 70%, rgba(139, 0, 0, 0.02) 0%, transparent 50%);
  animation: rotate 60s linear infinite;
}

.top-downloads {
  position: relative;
  overflow: hidden;
}

.top-downloads::after {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  width: 300px;
  height: 300px;
  background: radial-gradient(circle, rgba(139, 0, 0, 0.03) 0%, transparent 70%);
  border-radius: 50%;
  transform: translate(50%, -50%);
}

.standards-section {
  position: relative;
  overflow: hidden;
}

.standards-section::before {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 400px;
  height: 400px;
  background: radial-gradient(circle, rgba(139, 0, 0, 0.04) 0%, transparent 70%);
  border-radius: 50%;
  transform: translate(-50%, 50%);
}

/* ========= ENHANCED CARD DECORATIONS ========= */

.stat::after {
  content: '';
  position: absolute;
  top: -2px;
  right: -2px;
  width: 20px;
  height: 20px;
  background: var(--brand-gradient);
  border-radius: 50%;
  opacity: 0;
  transition: all 0.3s ease;
}

.stat:hover::after {
  opacity: 0.3;
  transform: scale(1.5);
}

.cat-card::after {
  content: '';
  position: absolute;
  bottom: 10px;
  right: 10px;
  width: 6px;
  height: 6px;
  background: var(--brand-primary);
  border-radius: 50%;
  opacity: 0;
  transition: all 0.3s ease;
}

.cat-card:hover::after {
  opacity: 1;
  transform: scale(2);
}

.td-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 3px;
  background: var(--brand-gradient);
  transform: translateX(-100%);
  transition: transform 0.6s ease;
  z-index: 5;
}

.td-card:hover::before {
  transform: translateX(0);
}

/* ========= INTERACTIVE ELEMENTS ========= */

.btn {
  position: relative;
  overflow: hidden;
}

.btn::before {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  width: 0;
  height: 0;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 50%;
  transform: translate(-50%, -50%);
  transition: all 0.6s ease;
  z-index: 0;
}

.btn:hover::before {
  width: 300px;
  height: 300px;
}

.btn * {
  position: relative;
  z-index: 1;
}

/* ========= ENHANCED FORM ELEMENTS ========= */

.nl-form input:focus {
  animation: inputFocus 0.3s ease;
  box-shadow: 0 0 0 3px rgba(139, 0, 0, 0.1), var(--shadow-lg);
}

/* ========= LOADING STATES ========= */

.loading-dots {
  display: inline-flex;
  gap: 4px;
}

.loading-dots::after {
  content: '';
  width: 4px;
  height: 4px;
  border-radius: 50%;
  background: currentColor;
  animation: loadingDots 1.5s infinite;
}

/* ========= ENHANCED ANIMATIONS ========= */

@keyframes floatingMove {
  0%, 100% {
    transform: translateY(0px) translateX(0px) rotate(0deg);
  }
  25% {
    transform: translateY(-20px) translateX(10px) rotate(90deg);
  }
  50% {
    transform: translateY(-10px) translateX(-10px) rotate(180deg);
  }
  75% {
    transform: translateY(-30px) translateX(15px) rotate(270deg);
  }
}

@keyframes patternMove {
  0% {
    transform: translate(0, 0);
  }
  100% {
    transform: translate(-60px, -60px);
  }
}

@keyframes bounce {
  0%, 100% {
    transform: translateX(-50%) translateY(0);
  }
  50% {
    transform: translateX(-50%) translateY(-10px);
  }
}

@keyframes bounceArrow {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(5px);
  }
}

@keyframes rotate {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes inputFocus {
  0% {
    box-shadow: 0 0 0 0 rgba(139, 0, 0, 0.2);
  }
  100% {
    box-shadow: 0 0 0 8px rgba(139, 0, 0, 0);
  }
}

@keyframes loadingDots {
  0%, 20% {
    opacity: 0;
  }
  40%, 100% {
    opacity: 1;
  }
}

/* ========= GLITCH EFFECT (for special elements) ========= */

.glitch {
  position: relative;
}

.glitch::before,
.glitch::after {
  content: attr(data-text);
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
}

.glitch::before {
  animation: glitch-1 0.5s infinite;
  color: var(--brand-primary);
  z-index: -1;
}

.glitch::after {
  animation: glitch-2 0.5s infinite;
  color: var(--brand-accent);
  z-index: -2;
}

@keyframes glitch-1 {
  0%, 100% {
    transform: translate(0);
    opacity: 0;
  }
  20% {
    transform: translate(-2px, 2px);
    opacity: 1;
  }
  40% {
    transform: translate(-2px, -2px);
    opacity: 1;
  }
  60% {
    transform: translate(2px, 2px);
    opacity: 1;
  }
  80% {
    transform: translate(2px, -2px);
    opacity: 1;
  }
}

@keyframes glitch-2 {
  0%, 100% {
    transform: translate(0);
    opacity: 0;
  }
  20% {
    transform: translate(2px, -2px);
    opacity: 1;
  }
  40% {
    transform: translate(2px, 2px);
    opacity: 1;
  }
  60% {
    transform: translate(-2px, -2px);
    opacity: 1;
  }
  80% {
    transform: translate(-2px, 2px);
    opacity: 1;
  }
}

/* ========= PARTICLE EFFECTS ========= */

.particles {
  position: absolute;
  inset: 0;
  pointer-events: none;
  z-index: 1;
}

.particle {
  position: absolute;
  width: 4px;
  height: 4px;
  background: var(--brand-primary);
  border-radius: 50%;
  opacity: 0.6;
  animation: particleFloat 15s linear infinite;
}

@keyframes particleFloat {
  0% {
    transform: translateY(100vh) rotate(0deg);
    opacity: 0;
  }
  10% {
    opacity: 0.6;
  }
  90% {
    opacity: 0.6;
  }
  100% {
    transform: translateY(-10px) rotate(360deg);
    opacity: 0;
  }
}

/* ========= CURSOR EFFECTS ========= */

.cursor-trail {
  position: fixed;
  width: 20px;
  height: 20px;
  background: radial-gradient(circle, var(--brand-primary), transparent);
  border-radius: 50%;
  pointer-events: none;
  z-index: 9999;
  opacity: 0;
  transition: opacity 0.3s ease;
}

/* ========= SECTION DIVIDERS ========= */

.section-divider {
  height: 1px;
  background: linear-gradient(90deg, transparent, var(--border-light), transparent);
  margin: 40px 0;
  position: relative;
}

.section-divider::before {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 60px;
  height: 6px;
  background: var(--brand-gradient);
  border-radius: 3px;
}

/* Animations */
@keyframes heroFadeIn {
  0% {
    opacity: 0;
    transform: translateY(30px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes float {
  0%, 100% {
    transform: translateY(0px);
  }
  50% {
    transform: translateY(-20px);
  }
}

@keyframes gradientShift {
  0%, 100% {
    background: linear-gradient(135deg, #ffffff 0%, #ffcccb 50%, #ff9999 100%);
  }
  50% {
    background: linear-gradient(135deg, #ffcccb 0%, #ff9999 50%, #ffffff 100%);
  }
}

/* ========= ENHANCED STATS RIBBON ========= */
.stats-ribbon {
  position: relative;
  z-index: 10;
  margin-top: 60px;
  padding: 40px 0 60px 0;
}

.stats-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
  max-width: 1000px;
  margin: 0 auto;
}

.stat {
  background: var(--surface);
  border: 1px solid var(--border-light);
  border-radius: 20px;
  padding: 24px;
  display: flex;
  align-items: center;
  gap: 16px;
  transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  backdrop-filter: var(--backdrop-blur);
  box-shadow: var(--shadow-lg);
  position: relative;
  overflow: hidden;
}

.stat::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: var(--brand-gradient);
  transition: left 0.6s ease;
}

.stat:hover::before {
  left: 0;
}

.stat:hover {
  transform: translateY(-8px);
  box-shadow: var(--shadow-xl), var(--shadow-brand);
  border-color: var(--brand-primary);
}

.stat-icon {
  width: 60px;
  height: 60px;
  border-radius: 16px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: var(--brand-gradient);
  color: var(--text-inverse);
  font-size: 24px;
  flex-shrink: 0;
  box-shadow: var(--shadow-brand);
  transition: all 0.3s ease;
}

.stat:hover .stat-icon {
  transform: scale(1.1) rotate(5deg);
}

.stat-content {
  flex: 1;
}

.stat-label {
  font-size: 14px;
  color: var(--text-muted);
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  margin-bottom: 4px;
}

.stat-value {
  font-size: 28px;
  font-weight: 900;
  color: var(--text-primary);
  line-height: 1;
}

/* ========= ENHANCED CARD COMPONENTS ========= */
.featured-cats {
  padding: 60px 0;
  background: var(--bg-secondary);
}

.section-head {
  text-align: center;
  margin-bottom: 48px;
  animation: fadeInUp 0.8s ease;
}

.section-title {
  font-size: clamp(2rem, 4vw, 3rem);
  font-weight: 900;
  margin-bottom: 12px;
  color: var(--text-primary);
  position: relative;
}

.section-title::after {
  content: '';
  position: absolute;
  bottom: -8px;
  left: 50%;
  transform: translateX(-50%);
  width: 60px;
  height: 4px;
  background: var(--brand-gradient);
  border-radius: 2px;
}

.section-sub {
  color: var(--text-muted);
  font-size: 18px;
  max-width: 600px;
  margin: 0 auto;
  line-height: 1.6;
}

.cat-scroller {
  display: flex;
  gap: 20px;
  overflow-x: auto;
  scroll-snap-type: x mandatory;
  padding: 20px 0;
  scrollbar-width: none;
  -ms-overflow-style: none;
}

.cat-scroller::-webkit-scrollbar {
  display: none;
}

.cat-card {
  min-width: 280px;
  scroll-snap-align: start;
  background: var(--surface);
  border: 1px solid var(--border-light);
  border-radius: 20px;
  padding: 24px;
  text-decoration: none;
  color: var(--text-primary);
  transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  position: relative;
  overflow: hidden;
  box-shadow: var(--shadow-md);
}

.cat-card::before {
  content: '';
  position: absolute;
  inset: 0;
  background: var(--brand-gradient);
  opacity: 0;
  transition: opacity 0.3s ease;
}

.cat-card:hover::before {
  opacity: 0.05;
}

.cat-card:hover {
  transform: translateY(-10px);
  box-shadow: var(--shadow-xl), var(--shadow-brand);
  border-color: var(--brand-primary);
}

.cc-icon {
  width: 60px;
  height: 60px;
  border-radius: 16px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: var(--bg-tertiary);
  color: var(--brand-primary);
  font-size: 24px;
  margin-bottom: 16px;
  transition: all 0.3s ease;
}

.cat-card:hover .cc-icon {
  background: var(--brand-primary);
  color: var(--text-inverse);
  transform: scale(1.1);
}

.cc-name {
  font-size: 18px;
  font-weight: 700;
  margin-bottom: 8px;
  color: var(--text-primary);
}

.cc-meta {
  font-size: 14px;
  color: var(--text-muted);
  font-weight: 500;
}

/* Brands Marquee Enhancement */
.brands-marquee {
  padding: 40px 0;
  background: var(--bg-primary);
}

.marquee {
  overflow: hidden;
  border: 1px solid var(--border-light);
  border-radius: 20px;
  background: var(--surface);
  box-shadow: var(--shadow-md);
}

.marquee-track {
  display: flex;
  gap: 40px;
  padding: 24px;
  animation: marquee 30s linear infinite;
}

.brand-item {
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0.7;
  transition: opacity 0.3s ease;
}

.brand-item:hover {
  opacity: 1;
}

.brand-item img {
  height: 40px;
  width: auto;
  filter: grayscale(100%);
  transition: filter 0.3s ease;
}

.brand-item:hover img {
  filter: grayscale(0%);
}

@keyframes marquee {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

/* Animation Classes */
@keyframes fadeInUp {
  0% {
    opacity: 0;
    transform: translateY(30px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

/* ========= ENHANCED TOP DOWNLOADS ========= */
.top-downloads {
  padding: 80px 0;
  background: var(--bg-primary);
}

.td-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 24px;
  margin-top: 48px;
}

.td-card {
  background: var(--surface);
  border: 1px solid var(--border-light);
  border-radius: 24px;
  overflow: hidden;
  position: relative;
  transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  box-shadow: var(--shadow-md);
  group: card;
}

.td-card::before {
  content: '';
  position: absolute;
  inset: 0;
  background: var(--brand-gradient);
  opacity: 0;
  transition: opacity 0.3s ease;
  z-index: 1;
}

.td-card:hover::before {
  opacity: 0.03;
}

.td-card:hover {
  transform: translateY(-12px);
  box-shadow: var(--shadow-xl), var(--shadow-brand);
  border-color: var(--brand-primary);
}

.td-card::after {
  content: attr(data-rank);
  position: absolute;
  top: 16px;
  left: 16px;
  width: 40px;
  height: 40px;
  border-radius: 12px;
  font-weight: 900;
  font-size: 16px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: var(--brand-gradient);
  color: var(--text-inverse);
  z-index: 10;
  box-shadow: var(--shadow-md);
}

.td-thumb {
  position: relative;
  display: block;
  overflow: hidden;
}

.td-thumb img {
  width: 100%;
  aspect-ratio: 16/10;
  object-fit: cover;
  transition: transform 0.4s ease;
}

.td-card:hover .td-thumb img {
  transform: scale(1.05);
}

.td-thumb .placeholder {
  width: 100%;
  aspect-ratio: 16/10;
  background: var(--bg-secondary);
  color: var(--text-muted);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 48px;
}

.td-body {
  padding: 20px;
  position: relative;
  z-index: 5;
}

.td-cat {
  display: inline-block;
  background: var(--brand-gradient);
  color: var(--text-inverse);
  padding: 6px 14px;
  border-radius: 50px;
  font-size: 12px;
  font-weight: 700;
  text-decoration: none;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  margin-bottom: 12px;
  transition: all 0.3s ease;
}

.td-cat:hover {
  transform: scale(1.05);
}

.td-title {
  font-size: 18px;
  font-weight: 700;
  margin: 0 0 8px 0;
  line-height: 1.3;
}

.td-title a {
  color: var(--text-primary);
  text-decoration: none;
  transition: color 0.3s ease;
}

.td-title a:hover {
  color: var(--brand-primary);
}

.td-meta {
  font-size: 14px;
  color: var(--text-muted);
  font-weight: 500;
  display: flex;
  align-items: center;
  gap: 4px;
}

.btn-like {
  position: absolute;
  top: 16px;
  right: 16px;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  border: none;
  background: var(--surface-overlay);
  color: var(--brand-primary);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 10;
  transition: all 0.3s ease;
  backdrop-filter: var(--backdrop-blur);
}

.btn-like:hover,
.btn-like.active {
  background: var(--brand-primary);
  color: var(--text-inverse);
  transform: scale(1.1);
}

.td-actions {
  padding: 0 20px 20px;
}

.btn-compare {
  width: 100%;
  padding: 12px;
  background: var(--bg-secondary);
  border: 1px solid var(--border-light);
  color: var(--text-secondary);
  border-radius: 12px;
  font-weight: 600;
  transition: all 0.3s ease;
}

.btn-compare:hover {
  background: var(--brand-primary);
  color: var(--text-inverse);
  border-color: var(--brand-primary);
}

/* ========= ENHANCED CATALOG LIST ========= */
.catalog-list-section {
  padding: 80px 0;
  background: var(--bg-secondary);
}

.results-info {
  font-weight: 600;
  color: var(--text-muted);
  margin-bottom: 32px;
  text-align: center;
  font-size: 16px;
}

.catalog-list {
  display: flex;
  flex-direction: column;
  gap: 24px;
}

.catalog-row {
  position: relative;
  display: grid;
  grid-template-columns: 380px 1fr;
  gap: 28px;
  background: var(--surface);
  border: 1px solid var(--border-light);
  border-radius: 24px;
  padding: 24px;
  transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  color: var(--text-primary);
  box-shadow: var(--shadow-md);
  overflow: hidden;
}

.catalog-row::before {
  content: '';
  position: absolute;
  inset: 0;
  background: var(--brand-gradient);
  opacity: 0;
  transition: opacity 0.3s ease;
}

.catalog-row:hover::before {
  opacity: 0.02;
}

.catalog-row:hover {
  transform: translateY(-8px);
  box-shadow: var(--shadow-xl), var(--shadow-brand);
  border-color: var(--brand-primary);
}

.floating-actions {
  position: absolute;
  top: 20px;
  right: 20px;
  display: flex;
  gap: 12px;
  z-index: 10;
}

.content {
  display: flex;
  flex-direction: column;
  gap: 16px;
  position: relative;
  z-index: 5;
}

.topline {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  flex-wrap: wrap;
  gap: 16px;
}

.category {
  background: var(--brand-gradient);
  color: var(--text-inverse);
  text-decoration: none;
  padding: 8px 16px;
  border-radius: 50px;
  font-size: 13px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  transition: all 0.3s ease;
}

.category:hover {
  transform: scale(1.05);
  box-shadow: var(--shadow-brand);
}

.meta {
  display: flex;
  gap: 20px;
  color: var(--text-muted);
  font-size: 14px;
  font-weight: 500;
}

.meta span {
  display: flex;
  align-items: center;
  gap: 6px;
}

.meta i {
  color: var(--brand-primary);
}

.title {
  font-size: 24px;
  font-weight: 800;
  margin: 0;
  line-height: 1.3;
}

.title a {
  color: var(--text-primary);
  text-decoration: none;
  transition: color 0.3s ease;
}

.title a:hover {
  color: var(--brand-primary);
}

.desc {
  color: var(--text-secondary);
  line-height: 1.6;
  font-size: 16px;
}

.cta {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  margin-top: 8px;
}

.line-clamp-3 {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

/* ========= ENHANCED THUMBNAIL SLIDER ========= */
.thumb-wrap {
  position: relative;
  display: block;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: var(--shadow-lg);
  transition: all 0.4s ease;
}

.thumb-wrap:hover {
  box-shadow: var(--shadow-xl), var(--shadow-brand);
}

.thumb {
  width: 100%;
  height: 100%;
  aspect-ratio: 16/10;
  object-fit: cover;
  display: block;
  transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.thumb-wrap:hover .thumb {
  transform: scale(1.05);
}

.thumb.placeholder {
  background: linear-gradient(135deg, var(--bg-secondary), var(--bg-tertiary));
  color: var(--text-muted);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 48px;
  aspect-ratio: 16/10;
  position: relative;
}

.thumb.placeholder::before {
  content: '';
  position: absolute;
  inset: 0;
  background: var(--brand-gradient);
  opacity: 0.05;
}

.badge {
  position: absolute;
  padding: 8px 12px;
  border-radius: 50px;
  font-size: 12px;
  font-weight: 700;
  backdrop-filter: var(--backdrop-blur);
  z-index: 10;
  transition: all 0.3s ease;
}

.badge.filetype {
  left: 16px;
  bottom: 16px;
  background: rgba(0, 0, 0, 0.7);
  color: var(--text-inverse);
  border: 1px solid rgba(255, 255, 255, 0.1);
}

.badge.filesize {
  right: 16px;
  bottom: 16px;
  background: var(--brand-gradient);
  color: var(--text-inverse);
  box-shadow: var(--shadow-brand);
}

.badge:hover {
  transform: scale(1.05);
}

/* Thumbnail Slider Specific Styles */
.thumb-has-slider {
  position: relative;
  display: block;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: var(--shadow-lg);
  transition: all 0.4s ease;
}

.thumb-viewport {
  position: relative;
  aspect-ratio: 16/10;
  background: var(--bg-secondary);
  overflow: hidden;
}

.thumb-viewport .slide {
  position: absolute;
  inset: 0;
  opacity: 0;
  transform: translateX(20px);
  transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.thumb-viewport .slide.is-active {
  opacity: 1;
  transform: translateX(0);
}

.thumb-viewport img.thumb {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

.thumb-nav {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  width: 44px;
  height: 44px;
  border: none;
  border-radius: 50%;
  display: grid;
  place-items: center;
  background: var(--glass-bg);
  border: 1px solid var(--glass-border);
  color: var(--text-inverse);
  z-index: 20;
  cursor: pointer;
  opacity: 0;
  transition: all 0.3s ease;
  backdrop-filter: var(--backdrop-blur);
}

.thumb-nav:hover {
  background: var(--brand-primary);
  transform: translateY(-50%) scale(1.1);
}

.thumb-nav.prev {
  left: 12px;
}

.thumb-nav.next {
  right: 12px;
}

.thumb-has-slider:hover .thumb-nav {
  opacity: 1;
}

.thumb-dots {
  position: absolute;
  left: 0;
  right: 0;
  bottom: 12px;
  display: flex;
  justify-content: center;
  gap: 8px;
  z-index: 15;
}

.thumb-dots button {
  width: 12px;
  height: 12px;
  border-radius: 50%;
  border: none;
  background: rgba(255, 255, 255, 0.4);
  cursor: pointer;
  padding: 0;
  transition: all 0.3s ease;
  backdrop-filter: var(--backdrop-blur);
}

.thumb-dots button:hover {
  background: rgba(255, 255, 255, 0.7);
  transform: scale(1.2);
}

.thumb-dots button[aria-current="true"] {
  background: var(--brand-primary);
  box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.3);
}

.thumb-mask-link {
  position: absolute;
  inset: 0;
  z-index: 5;
}

.thumb-has-slider .badge {
  z-index: 10;
}

.thumb-has-slider .thumb.placeholder {
  aspect-ratio: 16/10;
}

/* Grid View Adjustments */
.catalog-list[data-view="grid"] {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
  gap: 24px;
}

.catalog-list[data-view="grid"] .catalog-row {
  grid-template-columns: 1fr;
  padding: 20px;
}

.catalog-list[data-view="grid"] .content {
  gap: 12px;
}

.catalog-list[data-view="grid"] .title {
  font-size: 20px;
}

.catalog-list[data-view="grid"] .thumb {
  aspect-ratio: 4/3;
}

.catalog-list[data-view="grid"] .topline {
  order: 2;
}

/* ========= ENHANCED STANDARDS SECTION ========= */
.standards-section {
  padding: 80px 0;
  background: var(--bg-primary);
}

.std-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 24px;
  margin-top: 48px;
}

.std-card {
  background: var(--surface);
  border: 1px solid var(--border-light);
  border-radius: 20px;
  padding: 28px;
  text-align: center;
  transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  box-shadow: var(--shadow-md);
  position: relative;
  overflow: hidden;
}

.std-card::before {
  content: '';
  position: absolute;
  inset: 0;
  background: var(--brand-gradient);
  opacity: 0;
  transition: opacity 0.3s ease;
}

.std-card:hover::before {
  opacity: 0.05;
}

.std-card:hover {
  transform: translateY(-10px);
  box-shadow: var(--shadow-xl), var(--shadow-brand);
  border-color: var(--brand-primary);
}

.std-icon {
  width: 80px;
  height: 80px;
  border-radius: 20px;
  background: var(--brand-gradient);
  color: var(--text-inverse);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 32px;
  margin: 0 auto 20px;
  box-shadow: var(--shadow-brand);
  transition: all 0.3s ease;
}

.std-card:hover .std-icon {
  transform: scale(1.1) rotate(5deg);
}

.std-card h4 {
  font-size: 20px;
  font-weight: 800;
  margin-bottom: 12px;
  color: var(--text-primary);
}

.std-card p {
  color: var(--text-secondary);
  line-height: 1.6;
  margin: 0;
}

/* ========= ENHANCED FAQ SECTION ========= */
.faq-section {
  padding: 80px 0;
  background: var(--bg-secondary);
}

.faq-list {
  display: grid;
  gap: 16px;
  max-width: 800px;
  margin: 48px auto 0;
}

.faq-item {
  border: 1px solid var(--border-light);
  background: var(--surface);
  border-radius: 16px;
  padding: 0;
  transition: all 0.3s ease;
  box-shadow: var(--shadow-sm);
}

.faq-item[open] {
  box-shadow: var(--shadow-lg);
  border-color: var(--brand-primary);
}

.faq-item summary {
  cursor: pointer;
  font-weight: 700;
  font-size: 16px;
  padding: 20px 24px;
  list-style: none;
  color: var(--text-primary);
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  gap: 12px;
  position: relative;
}

.faq-item summary::-webkit-details-marker {
  display: none;
}

.faq-item summary::after {
  content: '';
  position: absolute;
  right: 24px;
  width: 12px;
  height: 12px;
  border-right: 2px solid var(--brand-primary);
  border-bottom: 2px solid var(--brand-primary);
  transform: rotate(45deg);
  transition: transform 0.3s ease;
}

.faq-item[open] summary::after {
  transform: rotate(-135deg);
}

.faq-item summary:hover {
  color: var(--brand-primary);
  background: var(--bg-secondary);
}

.faq-item summary i {
  color: var(--brand-primary);
  font-size: 18px;
}

.faq-body {
  color: var(--text-secondary);
  line-height: 1.6;
  padding: 0 24px 24px;
  animation: fadeInDown 0.3s ease;
}

/* ========= ENHANCED CTA SECTION ========= */
.cta-section {
  background: var(--brand-gradient);
  color: var(--text-inverse);
  padding: 100px 0;
  position: relative;
  overflow: hidden;
}

.cta-section::before {
  content: '';
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="1" fill="rgba(255,255,255,0.1)"/></svg>') repeat;
  background-size: 30px 30px;
  animation: backgroundMove 20s linear infinite;
}

.cta-content {
  max-width: 700px;
  margin: 0 auto;
  text-align: center;
  position: relative;
  z-index: 5;
}

.cta-icon {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.2);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 48px;
  margin: 0 auto 24px;
  backdrop-filter: var(--backdrop-blur);
  animation: float 4s ease-in-out infinite;
}

.cta-title {
  font-size: clamp(2rem, 4vw, 3rem);
  font-weight: 900;
  margin-bottom: 16px;
  line-height: 1.2;
}

.cta-description {
  font-size: 18px;
  opacity: 0.9;
  margin-bottom: 32px;
  line-height: 1.6;
}

.cta-actions {
  display: flex;
  gap: 20px;
  justify-content: center;
  flex-wrap: wrap;
}

/* ========= ENHANCED NEWSLETTER ========= */
.newsletter {
  padding: 60px 0;
  background: var(--bg-primary);
}

.newsletter-inner {
  border: 1px solid var(--border-light);
  background: var(--surface);
  border-radius: 20px;
  padding: 32px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 24px;
  box-shadow: var(--shadow-lg);
  transition: all 0.3s ease;
}

.newsletter-inner:hover {
  box-shadow: var(--shadow-xl);
  border-color: var(--brand-primary);
}

.nl-text h3 {
  margin: 0 0 8px;
  font-weight: 800;
  font-size: 24px;
  color: var(--text-primary);
}

.nl-text p {
  margin: 0;
  color: var(--text-secondary);
  font-size: 16px;
}

.nl-form {
  display: flex;
  gap: 12px;
  min-width: 400px;
}

.nl-form input {
  flex: 1;
  border: 1px solid var(--border-light);
  background: var(--bg-secondary);
  color: var(--text-primary);
  border-radius: 12px;
  padding: 14px 16px;
  font-size: 14px;
  transition: all 0.3s ease;
}

.nl-form input:focus {
  outline: none;
  border-color: var(--brand-primary);
  box-shadow: 0 0 0 3px rgba(139, 0, 0, 0.1);
}

/* ========= ENHANCED MINI CTA ========= */
.mini-cta {
  padding: 60px 0;
  background: var(--bg-secondary);
}

.mini-cta-inner {
  border: 1px solid var(--border-light);
  background: var(--surface);
  border-radius: 20px;
  padding: 32px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 24px;
  box-shadow: var(--shadow-lg);
  transition: all 0.3s ease;
}

.mini-cta-inner:hover {
  box-shadow: var(--shadow-xl);
  border-color: var(--brand-primary);
}

.mini-cta-text h3 {
  margin: 0 0 8px;
  font-weight: 800;
  font-size: 24px;
  color: var(--text-primary);
}

.mini-cta-text p {
  margin: 0;
  color: var(--text-secondary);
  font-size: 16px;
  line-height: 1.5;
}

/* Animations */
@keyframes fadeInDown {
  0% {
    opacity: 0;
    transform: translateY(-10px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes backgroundMove {
  0% {
    transform: translate(0, 0);
  }
  100% {
    transform: translate(-30px, -30px);
  }
}

/* ========= ENHANCED COMPARE BAR ========= */
.compare-bar {
  position: fixed;
  left: 20px;
  right: 20px;
  bottom: -200px;
  transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  z-index: 100;
}

.compare-bar.show {
  bottom: 20px;
}

.compare-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
  background: var(--surface-overlay);
  border: 1px solid var(--border-light);
  border-radius: 20px;
  padding: 16px 20px;
  box-shadow: var(--shadow-xl);
  backdrop-filter: var(--backdrop-blur);
  max-width: 1200px;
  margin: 0 auto;
}

.compare-list {
  display: flex;
  gap: 12px;
  flex-wrap: wrap;
  flex: 1;
}

.compare-pill {
  display: flex;
  align-items: center;
  gap: 10px;
  background: var(--bg-secondary);
  color: var(--text-primary);
  border: 1px solid var(--border-light);
  padding: 8px 14px;
  border-radius: 50px;
  font-weight: 600;
  font-size: 14px;
  transition: all 0.3s ease;
}

.compare-pill:hover {
  background: var(--brand-primary);
  color: var(--text-inverse);
  border-color: var(--brand-primary);
}

.compare-actions {
  display: flex;
  gap: 12px;
  flex-shrink: 0;
}

.btn-compare-clear,
.btn-compare-view {
  padding: 12px 20px;
  border-radius: 12px;
  font-weight: 600;
  font-size: 14px;
  transition: all 0.3s ease;
}

.btn-compare-clear {
  background: transparent;
  border: 1px solid var(--border-medium);
  color: var(--text-secondary);
}

.btn-compare-clear:hover {
  background: #ef4444;
  color: var(--text-inverse);
  border-color: #ef4444;
}

.btn-compare-view {
  background: var(--brand-gradient);
  border: none;
  color: var(--text-inverse);
  box-shadow: var(--shadow-brand);
}

.btn-compare-view:hover {
  transform: translateY(-2px);
  box-shadow: var(--shadow-xl);
}

/* ========= ENHANCED EMPTY STATES ========= */
.no-catalog {
  padding: 100px 20px;
  text-align: center;
  animation: fadeInUp 0.8s ease;
}

.no-catalog-icon {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  background: var(--bg-secondary);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 48px;
  color: var(--text-muted);
  margin: 0 auto 24px;
  border: 1px solid var(--border-light);
  position: relative;
}

.no-catalog-icon::before {
  content: '';
  position: absolute;
  inset: 0;
  border-radius: 50%;
  background: var(--brand-gradient);
  opacity: 0.1;
}

.no-catalog h3 {
  font-size: 28px;
  font-weight: 800;
  margin-bottom: 12px;
  color: var(--text-primary);
}

.no-catalog p {
  font-size: 16px;
  color: var(--text-secondary);
  line-height: 1.6;
  max-width: 500px;
  margin: 0 auto 32px;
}

/* ========= ENHANCED PAGINATION ========= */
.pagination-wrapper {
  margin-top: 60px;
}

.pagination-wrapper .pagination {
  justify-content: center;
  gap: 8px;
}

.pagination-wrapper .page-item {
  margin: 0;
}

.pagination-wrapper .page-link {
  color: var(--text-secondary);
  background: var(--surface);
  border: 1px solid var(--border-light);
  border-radius: 12px;
  padding: 12px 16px;
  font-weight: 600;
  transition: all 0.3s ease;
  margin: 0;
}

.pagination-wrapper .page-link:hover {
  background: var(--brand-primary);
  color: var(--text-inverse);
  border-color: var(--brand-primary);
  transform: translateY(-2px);
}

.pagination-wrapper .active .page-link {
  background: var(--brand-gradient);
  border-color: var(--brand-primary);
  color: var(--text-inverse);
  box-shadow: var(--shadow-brand);
}

.pagination-wrapper .disabled .page-link {
  opacity: 0.5;
  cursor: not-allowed;
}

/* ========= BACK TO TOP ========= */
.back-to-top {
  position: fixed;
  right: 24px;
  bottom: 24px;
  width: 56px;
  height: 56px;
  border-radius: 50%;
  border: none;
  display: grid;
  place-items: center;
  background: var(--brand-gradient);
  color: var(--text-inverse);
  box-shadow: var(--shadow-xl);
  opacity: 0;
  visibility: hidden;
  transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  z-index: 90;
  font-size: 20px;
}

.back-to-top.show {
  opacity: 1;
  visibility: visible;
  transform: translateY(0);
}

.back-to-top:hover {
  transform: translateY(-4px) scale(1.1);
  box-shadow: var(--shadow-xl), var(--shadow-brand);
}

/* ========= LOADING SKELETON ========= */
.skeleton {
  position: relative;
  background: var(--bg-secondary);
  overflow: hidden;
}

.skeleton::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    90deg,
    transparent,
    rgba(255, 255, 255, 0.4),
    transparent
  );
  animation: shimmer 1.5s infinite;
}

@keyframes shimmer {
  0% {
    transform: translateX(-100%);
  }
  100% {
    transform: translateX(100%);
  }
}

/* ========= RESPONSIVE DESIGN ========= */
@media (max-width: 1400px) {
  .container {
    max-width: 1140px;
  }
  
  .catalog-list-section .container {
    max-width: 1200px;
  }
}

@media (max-width: 1200px) {
  .hero-title {
    font-size: clamp(2.2rem, 4.5vw, 3.5rem);
  }
  
  .stats-grid {
    grid-template-columns: repeat(2, 1fr);
  }
  
  .td-grid {
    grid-template-columns: repeat(2, 1fr);
  }
  
  .std-grid {
    grid-template-columns: repeat(2, 1fr);
  }
  
  .catalog-row {
    grid-template-columns: 300px 1fr;
    gap: 20px;
  }
}

@media (max-width: 992px) {
  .hero-full {
    min-height: 80vh;
    padding: 100px 0 60px;
  }
  
  .stats-grid {
    grid-template-columns: 1fr;
    gap: 16px;
  }
  
  .td-grid {
    grid-template-columns: 1fr;
  }
  
  .std-grid {
    grid-template-columns: 1fr;
  }
  
  .catalog-row {
    grid-template-columns: 1fr;
  }
  
  .newsletter-inner,
  .mini-cta-inner {
    flex-direction: column;
    text-align: center;
    gap: 20px;
  }
  
  .nl-form {
    min-width: auto;
    width: 100%;
  }
  
  .compare-inner {
    flex-direction: column;
    gap: 12px;
  }
  
  .compare-actions {
    width: 100%;
    justify-content: center;
  }
}

@media (max-width: 768px) {
  .hero-actions {
    flex-direction: column;
    gap: 12px;
  }
  
  .hero-actions .btn {
    width: 100%;
    justify-content: center;
  }
  
  .hero-points {
    flex-direction: column;
    align-items: center;
    gap: 12px;
  }
  
  .section-title {
    font-size: clamp(1.8rem, 5vw, 2.5rem);
  }
  
  .cat-scroller {
    gap: 16px;
  }
  
  .cat-card {
    min-width: 240px;
  }
  
  .compare-bar {
    left: 10px;
    right: 10px;
  }
  
  .nl-form {
    flex-direction: column;
    gap: 12px;
  }
}

@media (max-width: 576px) {
  .container {
    padding: 0 16px;
  }
  
  .hero-full {
    min-height: 70vh;
    padding: 80px 0 40px;
  }
  
  .stats-ribbon {
    margin-top: -60px;
    padding: 0 0 30px;
  }
  
  .stat {
    padding: 20px;
  }
  
  .featured-cats,
  .top-downloads,
  .catalog-list-section,
  .standards-section,
  .faq-section {
    padding: 50px 0;
  }
  
  .cta-section {
    padding: 60px 0;
  }
  
  .cta-actions {
    flex-direction: column;
    gap: 12px;
  }
  
  .cta-actions .btn {
    width: 100%;
  }
  
  .back-to-top {
    right: 16px;
    bottom: 16px;
    width: 48px;
    height: 48px;
  }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // ========= ENHANCED PARALLAX & ANIMATIONS =========
    
    // Smooth parallax for hero background
    const heroEl = document.querySelector('.hero-full');
    const bgEl = document.querySelector('.hero-bg');
    let ticking = false;
    
    const updateParallax = () => {
        if (!bgEl || !heroEl) return;
        const rect = heroEl.getBoundingClientRect();
        const speed = 0.15;
        const yPos = -(rect.top * speed);
        bgEl.style.transform = `scale(1.1) translateY(${yPos}px)`;
        ticking = false;
    };
    
    const requestParallax = () => {
        if (!ticking) {
            requestAnimationFrame(updateParallax);
            ticking = true;
        }
    };
    
    window.addEventListener('scroll', requestParallax, { passive: true });
    
    // Enhanced scroll progress with smooth animation
    const progressBar = document.querySelector('.scroll-progress__bar');
    let progressTicking = false;
    
    const updateProgress = () => {
        if (!progressBar) return;
        const winHeight = window.innerHeight;
        const docHeight = document.documentElement.scrollHeight - winHeight;
        const scrolled = window.pageYOffset;
        const progress = (scrolled / docHeight) * 100;
        
        progressBar.style.width = Math.min(progress, 100) + '%';
        progressTicking = false;
    };
    
    const requestProgress = () => {
        if (!progressTicking) {
            requestAnimationFrame(updateProgress);
            progressTicking = true;
        }
    };
    
    window.addEventListener('scroll', requestProgress, { passive: true });
    updateProgress();
    
    // ========= INTERSECTION OBSERVER ANIMATIONS =========
    
    // Enhanced AOS-like animation system
    const animationObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const delay = entry.target.dataset.aosDelay || 0;
                setTimeout(() => {
                    entry.target.classList.add('aos-animate');
                }, parseInt(delay));
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -10% 0px'
    });
    
    // Observe elements with aos attributes
    document.querySelectorAll('[data-aos]').forEach(el => {
        el.classList.add('aos-element');
        animationObserver.observe(el);
    });
    
    // ========= ENHANCED SMOOTH SCROLLING =========
    
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const headerOffset = 80;
                const elementPosition = target.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                
                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // ========= ENHANCED IMAGE LOADING =========
    
    // Advanced skeleton removal with fade effect
    const imageObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                if (img.complete && img.naturalHeight !== 0) {
                    removeSkeleton(img);
                } else {
                    img.addEventListener('load', () => removeSkeleton(img));
                    img.addEventListener('error', () => removeSkeleton(img));
                }
            }
        });
    });
    
    const removeSkeleton = (img) => {
        img.style.transition = 'opacity 0.3s ease';
        img.classList.remove('skeleton');
        img.style.opacity = '1';
    };
    
    document.querySelectorAll('img.skeleton').forEach(img => {
        imageObserver.observe(img);
    });
    
    // ========= ENHANCED BACK TO TOP =========
    
    const backToTop = document.querySelector('.back-to-top');
    let backToTopTicking = false;
    
    const updateBackToTop = () => {
        if (!backToTop) return;
        const scrolled = window.pageYOffset;
        const threshold = window.innerHeight * 0.5;
        
        if (scrolled > threshold) {
            backToTop.classList.add('show');
        } else {
            backToTop.classList.remove('show');
        }
        backToTopTicking = false;
    };
    
    const requestBackToTop = () => {
        if (!backToTopTicking) {
            requestAnimationFrame(updateBackToTop);
            backToTopTicking = true;
        }
    };
    
    window.addEventListener('scroll', requestBackToTop, { passive: true });
    
    if (backToTop) {
        backToTop.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
    
    // ========= ENHANCED VIEW TOGGLE =========
    
    const catalogList = document.querySelector('.catalog-list');
    const viewButtons = document.querySelectorAll('[data-view]');
    
    viewButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const view = btn.dataset.view;
            
            // Update active button
            viewButtons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            
            // Update catalog view with animation
            if (catalogList) {
                catalogList.style.opacity = '0.5';
                catalogList.style.transform = 'translateY(10px)';
                
                setTimeout(() => {
                    catalogList.setAttribute('data-view', view);
                    catalogList.style.opacity = '1';
                    catalogList.style.transform = 'translateY(0)';
                }, 150);
            }
        });
    });
    
    // ========= ENHANCED FAVORITES SYSTEM =========
    
    const FAVS_KEY = 'catalog_favorites';
    const getFavorites = () => JSON.parse(localStorage.getItem(FAVS_KEY) || '[]');
    const setFavorites = (favs) => localStorage.setItem(FAVS_KEY, JSON.stringify(favs));
    
    const updateFavoriteButton = (btn, isFavorited) => {
        btn.classList.toggle('active', isFavorited);
        btn.style.transform = isFavorited ? 'scale(1.2)' : 'scale(1)';
        
        // Add ripple effect
        if (isFavorited) {
            btn.style.animation = 'heartBeat 0.6s ease';
            setTimeout(() => btn.style.animation = '', 600);
        }
    };
    
    document.querySelectorAll('.btn-like').forEach(btn => {
        const itemId = btn.dataset.id;
        const favorites = getFavorites();
        updateFavoriteButton(btn, favorites.includes(itemId));
        
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            
            const currentFavs = getFavorites();
            const index = currentFavs.indexOf(itemId);
            
            if (index > -1) {
                currentFavs.splice(index, 1);
                updateFavoriteButton(btn, false);
            } else {
                currentFavs.push(itemId);
                updateFavoriteButton(btn, true);
            }
            
            setFavorites(currentFavs);
        });
    });
    
    // ========= ENHANCED COMPARE SYSTEM =========
    
    const COMPARE_KEY = 'catalog_compare';
    const MAX_COMPARE = 4;
    const getCompareItems = () => JSON.parse(localStorage.getItem(COMPARE_KEY) || '[]');
    const setCompareItems = (items) => localStorage.setItem(COMPARE_KEY, JSON.stringify(items));
    
    const compareBar = document.querySelector('.compare-bar');
    const compareList = document.querySelector('.compare-list');
    const compareView = document.querySelector('.btn-compare-view');
    const compareClear = document.querySelector('.btn-compare-clear');
    
    const renderCompareBar = () => {
        const items = getCompareItems();
        
        if (!compareList || !compareBar) return;
        
        compareList.innerHTML = items.map(id => `
            <div class="compare-pill">
                <span>Item #${id}</span>
                <button class="btn-remove" data-id="${id}" style="background:none;border:none;color:inherit;margin-left:8px;">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `).join('');
        
        // Show/hide compare bar with animation
        if (items.length > 0) {
            compareBar.classList.add('show');
        } else {
            compareBar.classList.remove('show');
        }
        
        // Update view button
        if (compareView) {
            compareView.textContent = `Compare (${items.length})`;
            compareView.disabled = items.length < 2;
        }
        
        // Add remove listeners
        compareList.querySelectorAll('.btn-remove').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.dataset.id;
                const currentItems = getCompareItems().filter(item => item !== id);
                setCompareItems(currentItems);
                renderCompareBar();
            });
        });
    };
    
    // Compare button handlers
    document.querySelectorAll('.btn-compare').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            
            const itemId = btn.dataset.id;
            const currentItems = getCompareItems();
            
            if (currentItems.includes(itemId)) {
                // Remove from compare
                const filtered = currentItems.filter(id => id !== itemId);
                setCompareItems(filtered);
                btn.classList.remove('active');
            } else if (currentItems.length < MAX_COMPARE) {
                // Add to compare
                currentItems.push(itemId);
                setCompareItems(currentItems);
                btn.classList.add('active');
                
                // Show success feedback
                btn.style.animation = 'pulse 0.4s ease';
                setTimeout(() => btn.style.animation = '', 400);
            } else {
                // Show error feedback
                alert(`Maximum ${MAX_COMPARE} items can be compared at once.`);
            }
            
            renderCompareBar();
        });
    });
    
    // Compare bar actions
    if (compareClear) {
        compareClear.addEventListener('click', () => {
            setCompareItems([]);
            document.querySelectorAll('.btn-compare').forEach(btn => {
                btn.classList.remove('active');
            });
            renderCompareBar();
        });
    }
    
    if (compareView) {
        compareView.addEventListener('click', () => {
            const items = getCompareItems();
            if (items.length >= 2) {
                // You can redirect to a compare page or show a modal
                console.log('Comparing items:', items);
                alert('Compare functionality - redirect to compare page or show modal');
            }
        });
    }
    
    // Initialize compare bar
    renderCompareBar();
    
    // ========= CARD HOVER EFFECTS =========
    
    // Add magnetic hover effect to cards
    document.querySelectorAll('.catalog-row, .td-card, .cat-card, .std-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transition = 'all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = '';
        });
    });
    
    // ========= DOWNLOAD TRACKING =========
    
    document.querySelectorAll('a[download], a[href*="/storage/"]').forEach(link => {
        link.addEventListener('click', function() {
            // Add download animation
            const btn = this;
            const originalText = btn.innerHTML;
            
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Downloading...';
            btn.style.pointerEvents = 'none';
            
            setTimeout(() => {
                btn.innerHTML = '<i class="fas fa-check me-2"></i>Downloaded!';
                setTimeout(() => {
                    btn.innerHTML = originalText;
                    btn.style.pointerEvents = '';
                }, 2000);
            }, 1000);
            
            // Track download (you can send this to analytics)
            console.log('Download initiated:', this.getAttribute('href'));
        });
    });
    
    // ========= NEWSLETTER FORM =========
    
    const newsletterForm = document.querySelector('.nl-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = this.querySelector('input[type="email"]').value;
            const btn = this.querySelector('button');
            const originalText = btn.innerHTML;
            
            // Show loading state
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Subscribing...';
            btn.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                btn.innerHTML = '<i class="fas fa-check me-2"></i>Subscribed!';
                this.querySelector('input').value = '';
                
                setTimeout(() => {
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                }, 3000);
            }, 1500);
        });
    }
});

// ========= CSS ANIMATIONS =========
const style = document.createElement('style');
style.textContent = `
    /* AOS Animation System */
    .aos-element {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    
    .aos-element.aos-animate {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Heart beat animation */
    @keyframes heartBeat {
        0%, 100% { transform: scale(1); }
        25% { transform: scale(1.3); }
        50% { transform: scale(1.1); }
        75% { transform: scale(1.2); }
    }
    
    /* Pulse animation */
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }
    
    /* Fade in animation */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    /* Button hover ripple effect */
    .btn {
        position: relative;
        overflow: hidden;
    }
    
    .btn::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }
    
    .btn:active::after {
        width: 300px;
        height: 300px;
    }
    
    /* Enhanced card transitions */
    .catalog-row,
    .td-card,
    .cat-card,
    .std-card {
        will-change: transform, box-shadow;
    }
    
    /* Loading states */
    .loading {
        position: relative;
        pointer-events: none;
    }
    
    .loading::before {
        content: '';
        position: absolute;
        inset: 0;
        background: rgba(255, 255, 255, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
    }
    
    /* Smooth view transitions */
    .catalog-list {
        transition: all 0.3s ease;
    }
`;
document.head.appendChild(style);
</script>


{{-- ====== SLIDER CSS MINIMAL (aman tumpang tindih dengan style lama) ====== --}}
<style>
  .thumb-has-slider{position:relative; display:block; border-radius:12px; overflow:hidden}
  .thumb-viewport{position:relative; aspect-ratio:16/10; background:var(--soft);}
  .thumb-viewport .slide{position:absolute; inset:0; opacity:0; transform:translateX(6%); transition:opacity .28s ease, transform .28s ease;}
  .thumb-viewport .slide.is-active{opacity:1; transform:translateX(0);}
  .thumb-viewport img.thumb{width:100%; height:100%; object-fit:cover; display:block}

  .thumb-nav{position:absolute; top:50%; transform:translateY(-50%); width:36px; height:36px; border:0; border-radius:999px; display:grid; place-items:center; background:rgba(0,0,0,.45); color:#fff; z-index:3; cursor:pointer; opacity:.0; transition:opacity .2s}
  .thumb-nav.prev{left:8px}
  .thumb-nav.next{right:8px}
  .thumb-has-slider:hover .thumb-nav{opacity:1}
  body[data-theme="dark"] .thumb-nav{background:rgba(255,255,255,.18)}

  .thumb-dots{position:absolute; left:0; right:0; bottom:8px; display:flex; justify-content:center; gap:6px; z-index:3}
  .thumb-dots button{width:8px; height:8px; border-radius:999px; border:0; background:rgba(255,255,255,.55); cursor:pointer; padding:0}
  .thumb-dots button[aria-current="true"]{background:linear-gradient(135deg,var(--brand),var(--brand-3))}
  body[data-theme="dark"] .thumb-dots button{background:rgba(0,0,0,.45)}

  .thumb-mask-link{position:absolute; inset:0; z-index:1} /* link di bawah nav */
  .thumb-has-slider .badge{z-index:2}
  .thumb-has-slider .thumb.placeholder{aspect-ratio:16/10}
  /* ==== CATALOG LIST — LAYOUT OVERRIDES (bigger image + wider content) ==== */
  /* Lebarkan container khusus section ini + kecilkan padding samping */
  .catalog-list-section .container{
    max-width: 1320px;              /* dari 1140 -> 1320 */
    padding-left: 12px;
    padding-right: 12px;
  }
  @media (min-width: 1536px){
    .catalog-list-section .container{ max-width: 1440px; }
  }

  /* Besarkan kolom gambar (desktop & tablet), kecilkan gap */
  .catalog-list-section .catalog-row{
    grid-template-columns: 480px 1fr;   /* dari 320px -> 480px */
    gap: 20px;                          /* dari 22px -> 20px */
    padding: 18px;                      /* sedikit lebih padat */
  }
  @media (max-width: 1200px){
    .catalog-list-section .catalog-row{ grid-template-columns: 420px 1fr; }
  }
  @media (max-width: 992px){
    .catalog-list-section .catalog-row{ grid-template-columns: 1fr; }
  }

  /* Besarkan area gambar (lebih tinggi biar terlihat “besar”) */
  .catalog-list-section .thumb-viewport{
    aspect-ratio: 4 / 3;               /* dari 16/10 -> 4/3 (lebih tinggi) */
  }
  .catalog-list-section .thumb.placeholder{ aspect-ratio: 4 / 3; }

  /* Perbesar tombol nav slider + dot indikator */
  .catalog-list-section .thumb-nav{
    width: 42px; height: 42px;         /* dari 36 -> 42 */
    opacity: .95;                       /* terlihat jelas walau tidak hover */
  }
  .catalog-list-section .thumb-has-slider:hover .thumb-nav{ opacity: 1; }
  .catalog-list-section .thumb-dots button{
    width: 10px; height: 10px;          /* dari 8 -> 10 */
  }

  /* Sedikit besarkan judul & rapikan spacing konten */
  .catalog-list-section .title{ font-size: 1.45rem; }
  .catalog-list-section .content{ gap: 12px; }
  .catalog-list-section .topline{ gap: 12px; }
</style>

{{-- ====== SLIDER JS (tanpa dependensi) ====== --}}
<script>
  document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.thumb-has-slider').forEach((wrap) => {
      const viewport = wrap.querySelector('.thumb-viewport');
      const slides = Array.from(viewport.querySelectorAll('.slide'));
      const prevBtn = wrap.querySelector('.thumb-nav.prev');
      const nextBtn = wrap.querySelector('.thumb-nav.next');
      const dotsWrap = wrap.querySelector('.thumb-dots');

      const total = slides.length;
      let idx = slides.findIndex(s => s.classList.contains('is-active'));
      if (idx < 0) idx = 0;

      // Hide nav & dots jika <= 1
      if (total <= 1) {
        prevBtn.style.display = 'none';
        nextBtn.style.display = 'none';
        dotsWrap.style.display = 'none';
      } else {
        // Build dots
        dotsWrap.innerHTML = '';
        for (let i=0; i<total; i++) {
          const b = document.createElement('button');
          b.type = 'button';
          b.setAttribute('aria-label', 'Ke slide ' + (i+1));
          if (i === idx) b.setAttribute('aria-current', 'true');
          b.addEventListener('click', (e) => { e.stopPropagation(); go(i); });
          dotsWrap.appendChild(b);
        }
      }

      function update() {
        slides.forEach((s, i) => {
          if (i === idx) s.classList.add('is-active'); else s.classList.remove('is-active');
        });
        if (total > 1) {
          dotsWrap.querySelectorAll('button').forEach((d, i) => {
            if (i === idx) d.setAttribute('aria-current', 'true'); else d.removeAttribute('aria-current');
          });
        }
      }

      function go(next) {
        idx = (next + total) % total;
        update();
      }

      prevBtn?.addEventListener('click', (e) => { e.stopPropagation(); go(idx - 1); });
      nextBtn?.addEventListener('click', (e) => { e.stopPropagation(); go(idx + 1); });

      // swipe (mobile)
      let sx = 0, dx = 0;
      viewport.addEventListener('touchstart', (e)=>{ sx = e.touches[0].clientX; dx = 0; }, {passive:true});
      viewport.addEventListener('touchmove',  (e)=>{ dx = e.touches[0].clientX - sx; }, {passive:true});
      viewport.addEventListener('touchend',   ()=>{ if (Math.abs(dx) > 40) go(idx + (dx < 0 ? 1 : -1)); });

      update();
    });
  });
</script>
@endsection
