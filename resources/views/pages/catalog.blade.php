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
    

    <div class="container">
        <div class="row align-items-start justify-content-center text-center">
            <div class="col-xl-9 col-lg-10 hero-content" data-aos="fade-up">
                <span class="hero-kicker">
                    <i class="fas fa-folder-open me-2"></i>
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
                    <a href="#catalog-list" class="btn btn-hero-primary btn-lg">
                        <i class="fas fa-book-open me-2"></i>Jelajahi Katalog
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-white-fixed btn-lg">
                        <i class="fas fa-headset me-2"></i>Konsultasi Gratis
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== SCROLL PROGRESS BAR ===== -->
<div class="scroll-progress" aria-hidden="true"><span class="scroll-progress__bar"></span></div>

<!-- ===== ENHANCED INFO BANNER ===== -->
<section class="info-banner" aria-label="Platform highlights">
    <div class="container">
        <div class="info-content" data-aos="fade-up">
            <div class="info-main">
                <div class="info-header">
                    <h2 class="info-title">Platform Katalog Digital Terlengkap</h2>
                    <p class="info-subtitle">Akses ribuan dokumen teknis insulasi industri dalam satu platform terintegrasi</p>
                </div>
                
                <div class="info-stats">
                    <div class="info-stat-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="stat-number">{{ number_format($catalogItems->total()) }}+</div>
                        <div class="stat-desc">Dokumen Katalog<br><span class="stat-note">Terus bertambah setiap minggu</span></div>
                        <div class="stat-icon-bg"><i class="fas fa-file-alt"></i></div>
                    </div>
                    
                    <div class="info-stat-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="stat-number">24/7</div>
                        <div class="stat-desc">Akses Tanpa Batas<br><span class="stat-note">Download kapan saja</span></div>
                        <div class="stat-icon-bg"><i class="fas fa-clock"></i></div>
                    </div>
                    
                    <div class="info-stat-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="stat-number">100%</div>
                        <div class="stat-desc">Dokumen Terverifikasi<br><span class="stat-note">Langsung dari manufaktur</span></div>
                        <div class="stat-icon-bg"><i class="fas fa-certificate"></i></div>
                    </div>
                    
                    <div class="info-stat-item" data-aos="fade-up" data-aos-delay="400">
                        <div class="stat-number">50+</div>
                        <div class="stat-desc">Brand Terpercaya<br><span class="stat-note">Partner resmi global</span></div>
                        <div class="stat-icon-bg"><i class="fas fa-handshake"></i></div>
                    </div>
                </div>
            </div>
            
            <div class="info-features" data-aos="fade-up" data-aos-delay="600">
                <div class="feature-item">
                    <i class="fas fa-cloud-download-alt"></i>
                    <span>Download Batch untuk Multiple Files</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-chart-line"></i>
                    <span>Update Berkala & Notifikasi Otomatis</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-headset"></i>
                    <span>Support 24/7 dari Tim Ahli</span>
                </div>
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
      <div class="results-info-enhanced mb-5" data-aos="fade-up">
        <div class="results-card">
          <div class="results-header">
            <div class="results-icon">
              <i class="fas fa-heart"></i>
            </div>
            <h3 class="results-title">Kategori Terpilih</h3>
          </div>
          <div class="results-content">
            <span class="results-main-text">Menampilkan {{ $catalogItems->firstItem() }}–{{ $catalogItems->lastItem() }} dari {{ $catalogItems->total() }} katalog premium</span>
            <div class="results-features">
              <span class="feature-item"><i class="fas fa-crown"></i> Kualitas Terjamin</span>
              <span class="feature-item"><i class="fas fa-download"></i> Akses Instan</span>
              <span class="feature-item"><i class="fas fa-file-alt"></i> Dokumen Resmi</span>
            </div>
          </div>
        </div>
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

            {{-- ==== THUMB SLIDER ==== --}}
            <figure class="thumb-wrap thumb-has-slider" data-slider-id="{{ $sliderId }}">
              <div class="thumb-viewport">
                @if($images->count() > 0)
                  @foreach($images as $i => $img)
                    @php
                      $imgUrl = $toPublic($img->image_url);
                      $imgAlt = $img->alt_text ?: $item->name;
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
              {{-- (pastikan tidak ada overlay lain yang menutupi tombol di bawah) --}}
            </figure>

            <div class="content">
              <div class="topline">
                <a href="{{ route('catalog1-page', ['category' => $item->category]) }}" class="category">
                  {{ ucfirst(str_replace('-', ' ', $item->category ?? 'General')) }}
                </a>
                <div class="meta">
                  <span><i class="fas fa-calendar"></i> {{ $item->created_at->format('d M Y') }}</span>
                  <span><i class="fas fa-shield-check"></i> Terverifikasi</span>
                </div>
              </div>

              <h3 class="title">{{ $item->name }}</h3>
              <p class="desc line-clamp-3">{{ \Illuminate\Support\Str::limit($item->description, 220) }}</p>

              {{-- ===== CTA TANPA JS (langsung aksi) ===== --}}
              <div class="cta-enhanced">
                @if($fileUrl)
                  <div class="primary-actions">
                    {{-- Tombol Unduh: GET ke route download --}}
                    <form action="{{ route('catalog.download', $item->id) }}" method="GET" class="inline-form" style="display:inline">
                      <button type="submit" class="btn btn-download" aria-label="Unduh {{ $item->name }}">
                        <i class="fas fa-file-arrow-down"></i>
                        <span class="btn-text">
                          <span class="btn-main">Unduh Dokumen</span>
                          <span class="btn-sub">Format: {{ strtoupper($ext ?? 'FILE') }}</span>
                        </span>
                      </button>
                    </form>

                    {{-- Tombol Preview: buka tab baru --}}
                    <form action="{{ route('catalog.preview', $item->id) }}" method="GET" class="inline-form" style="display:inline" target="_blank" rel="noopener">
                      <button type="submit" class="btn btn-preview" aria-label="Pratinjau {{ $item->name }}">
                        <i class="fas fa-file-pdf"></i>
                        <span class="btn-text">
                          <span class="btn-main">{{ ($ext === 'pdf') ? 'Lihat PDF' : 'Buka Dokumen' }}</span>
                          <span class="btn-sub">Pratinjau di tab baru</span>
                        </span>
                      </button>
                    </form>
                  </div>
                @else
                  <div class="primary-actions">
                    <button class="btn btn-unavailable" disabled>
                      <i class="fas fa-ban"></i>
                      <span class="btn-text">
                        <span class="btn-main">Tidak Tersedia</span>
                        <span class="btn-sub">File belum upload</span>
                      </span>
                    </button>
                  </div>
                @endif
              </div>

              {{-- Hidden data for modal --}}
              <script type="application/json" id="catalog-data-{{ $item->id }}">
                {
                  "id": {{ $item->id }},
                  "name": "{{ addslashes($item->name) }}",
                  "description": "{{ addslashes($item->description ?? '') }}",
                  "category": "{{ ucfirst(str_replace('-', ' ', $item->category ?? 'General')) }}",
                  "created_at": "{{ $item->created_at->format('d M Y') }}",
                  "file_url": "{{ $fileUrl }}",
                  "file_type": "{{ $ext }}",
                  "file_size": "{{ $fileSize }}",
                  "images": [
                    @foreach($images as $img)
                      {
                        "url": "{{ $toPublic($img->image_url) }}",
                        "alt": "{{ addslashes($img->alt_text ?: $item->name) }}"
                      }{{ !$loop->last ? ',' : '' }}
                    @endforeach
                  ]
                }
              </script>
            </div>
          </article>
        @endforeach
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


<!-- ===== MODERN DETAIL MODAL ===== -->
<div id="detailModal" class="detail-modal" aria-hidden="true">
  <div class="modal-backdrop" onclick="closeDetailModal()"></div>
  <div class="modal-container">
    <div class="modal-header">
      <button class="modal-close" onclick="closeDetailModal()" aria-label="Close modal">
        <i class="fas fa-times"></i>
      </button>
    </div>
    
    <div class="modal-content">
      <div class="modal-gallery">
        <div class="gallery-main">
          <img id="modalMainImage" src="" alt="" class="main-image">
          <div class="image-overlay">
            <div class="image-badges">
              <span class="badge file-type" id="modalFileType"></span>
              <span class="badge file-size" id="modalFileSize"></span>
            </div>
          </div>
        </div>
        <div class="gallery-thumbs" id="modalThumbs"></div>
      </div>
      
      <div class="modal-info">
        <div class="info-header">
          <div class="category-badge" id="modalCategory"></div>
          <h2 class="modal-title" id="modalTitle"></h2>
          <div class="modal-meta">
            <span class="meta-item"><i class="fas fa-calendar"></i> <span id="modalDate"></span></span>
            <span class="meta-item"><i class="fas fa-shield-check"></i> Terverifikasi</span>
          </div>
        </div>
        
        <div class="info-body">
          <div class="description-section">
            <h4><i class="fas fa-align-left"></i> Deskripsi</h4>
            <p id="modalDescription"></p>
          </div>
          
          <div class="features-section">
            <h4><i class="fas fa-star"></i> Fitur Unggulan</h4>
            <div class="feature-list">
              <div class="feature-item-modal"><i class="fas fa-download"></i> Download Instan</div>
              <div class="feature-item-modal"><i class="fas fa-shield-check"></i> Dokumen Resmi</div>
              <div class="feature-item-modal"><i class="fas fa-award"></i> Kualitas Terjamin</div>
              <div class="feature-item-modal"><i class="fas fa-clock"></i> Update Berkala</div>
            </div>
          </div>
        </div>
        
        <div class="modal-actions">
          <button class="btn btn-download-modal" id="modalDownloadBtn">
            <i class="fas fa-download"></i>
            <span>Download Sekarang</span>
          </button>
          <button class="btn btn-preview-modal" id="modalPreviewBtn">
            <i class="fas fa-eye"></i>
            <span>Preview Dokumen</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ===== STANDARDS & COMPLIANCE ===== -->
<section class="standards-section">
    <div class="container">
        <div class="section-head" data-aos="fade-up">
            <h2 class="section-title">Standar & Kepatuhan</h2>
            <p class="section-sub">Referensi ke standar yang relevan untuk aplikasi industri Anda.</p>
        </div>
        <div class="std-grid" data-aos="fade-up">
            <div class="std-card">
                <div class="std-icon"><i class="fas fa-industry"></i></div>
                <h4>ASTM</h4>
                <p>Spesifikasi material & metode uji terkait insulasi.</p>
            </div>
            <div class="std-card">
                <div class="std-icon"><i class="fas fa-fire"></i></div>
                <h4>FM/UL</h4>
                <p>Sertifikasi keselamatan kebakaran & performa.</p>
            </div>
            <div class="std-card">
                <div class="std-icon"><i class="fas fa-leaf"></i></div>
                <h4>ISO</h4>
                <p>Manajemen mutu, lingkungan, & keselamatan.</p>
            </div>
            <div class="std-card">
                <div class="std-icon"><i class="fas fa-helmet-safety"></i></div>
                <h4>OSHA</h4>
                <p>Praktik kerja aman dalam instalasi di lapangan.</p>
            </div>
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
            <details class="faq-item">
                <summary><i class="fas fa-rotate me-2"></i>Seberapa sering koleksi diperbarui?</summary>
                <div class="faq-body">Kami memperbarui katalog secara berkala. Lihat cap tanggal di setiap item untuk mengetahui rilis terbaru.</div>
            </details>
            <details class="faq-item">
                <summary><i class="fas fa-lock me-2"></i>Apakah dokumen resmi?</summary>
                <div class="faq-body">Ya, semua dokumen bersumber dari vendor/pabrikan dan tim QC kami memastikan keasliannya.</div>
            </details>
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
      <form id="nl-form" class="nl-form">
        <input type="email" placeholder="Email Anda" required>
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-envelope-open-text me-2"></i>Berlangganan
        </button>
      </form>
    </div>
  </div>
</section>

<!-- ===== CUSTOM ALERT MODAL ===== -->
<div id="custom-alert" class="custom-alert hidden">
  <div class="custom-alert-box">
    <span class="custom-alert-icon">📩</span>
    <h4>Terima Kasih!</h4>
    <p>Anda berhasil berlangganan update katalog.</p>
    <button id="close-alert">Tutup</button>
  </div>
</div>

<!-- ===== MINI CTA ===== -->
<section class="mini-cta">
    <div class="container mini-cta-inner" data-aos="fade-up">
        <div class="mini-cta-text">
            <h3>Kirim Permintaan Dokumen</h3>
            <p>Tidak menemukan yang Anda cari? Kirimkan daftar dokumen yang Anda butuhkan—kami bantu carikan.</p>
        </div>
        <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-lg"><i class="fas fa-paper-plane me-2"></i>Ajukan Permintaan</a>
    </div>
</section>

<style>
  /* Enhanced Results Info Section */
  .results-info-enhanced {
    margin-bottom: 40px;
    text-align: center;
  }

  .results-card {
    background: linear-gradient(135deg, var(--surface) 0%, var(--bg-tertiary) 100%);
    border: 2px solid transparent;
    background-clip: padding-box;
    border-radius: 28px;
    padding: 32px 40px;
    box-shadow: var(--shadow-xl);
    position: relative;
    overflow: hidden;
    max-width: 800px;
    margin: 0 auto;
    backdrop-filter: blur(20px);
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  }

  .results-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--brand-gradient);
    border-radius: 28px 28px 0 0;
  }

  .results-card::after {
    content: '';
    position: absolute;
    top: -2px;
    left: -2px;
    right: -2px;
    bottom: -2px;
    background: var(--brand-gradient);
    border-radius: 30px;
    z-index: -1;
    opacity: 0.1;
  }

  .results-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-xl), 0 20px 40px rgba(124, 20, 21, 0.15);
  }

  .results-header {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 16px;
    margin-bottom: 20px;
  }

  .results-icon {
    width: 48px;
    height: 48px;
    border-radius: 16px;
    background: var(--brand-gradient);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-inverse);
    font-size: 20px;
    box-shadow: var(--shadow-brand);
    animation: heartbeat 2s ease-in-out infinite;
  }

  @keyframes heartbeat {
    0%, 100% {
      transform: scale(1);
    }
    50% {
      transform: scale(1.05);
    }
  }

  .results-title {
    font-size: 24px;
    font-weight: 800;
    color: var(--text-primary);
    margin: 0;
    background: linear-gradient(135deg, var(--text-primary), var(--brand-primary));
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    color: transparent;
  }

  @supports not (background-clip: text) {
    .results-title {
      color: var(--text-primary);
    }
  }

  .results-content {
    text-align: center;
  }

  .results-main-text {
    font-size: 18px;
    font-weight: 600;
    color: var(--text-secondary);
    display: block;
    margin-bottom: 20px;
    line-height: 1.5;
  }

  .results-features {
    display: flex;
    gap: 24px;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 16px;
  }

  .feature-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    font-weight: 600;
    color: var(--text-muted);
    background: var(--bg-secondary);
    padding: 8px 16px;
    border-radius: 20px;
    border: 1px solid var(--border-light);
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
  }

  .feature-item:hover {
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    color: var(--brand-primary);
    border-color: var(--brand-primary);
    transform: translateY(-2px);
    box-shadow: var(--shadow-brand);
  }

  .feature-item i {
    color: var(--brand-primary);
    font-size: 12px;
    transition: color 0.3s ease;
  }

  .feature-item:hover i {
    color: var(--brand-primary);
    font-weight: 900;
  }

  /* Dark mode specific hover for feature items */
  body.dark-theme .feature-item:hover {
    background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
    color: #ffffff;
    border-color: var(--brand-accent);
  }

  body.dark-theme .feature-item:hover i {
    color: var(--brand-accent);
    font-weight: 900;
  }

  /* Dark mode enhancements */
  body.dark-theme .results-card {
    background: linear-gradient(135deg, rgba(30, 41, 59, 0.9) 0%, rgba(51, 65, 85, 0.8) 100%);
    border: 2px solid rgba(124, 20, 21, 0.2);
  }

  body.dark-theme .results-title {
    background: linear-gradient(135deg, #f1f5f9, var(--brand-accent));
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  @media (max-width: 768px) {
    .results-card {
      padding: 24px 20px;
      margin: 0 16px;
    }
    
    .results-features {
      gap: 12px;
    }
    
    .feature-item {
      font-size: 12px;
      padding: 6px 12px;
    }
    
    .results-title {
      font-size: 20px;
    }
    
    .results-main-text {
      font-size: 16px;
    }
  }
</style>

<style>
  .thumb-wrap {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    background: var(--bg-secondary);
    border: 1px solid var(--border-light);
    box-shadow: var(--shadow-md);
    transition: all 0.3s ease;
    flex: 1;
    max-width: 50%;
  }

  .thumb-viewport {
    position: relative;
    width: 100%;
    aspect-ratio: 3/2;
    overflow: hidden;
    border-radius: 16px;
    background: var(--bg-secondary);
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .slide.is-active {
    opacity: 1;
  }

  .thumb {
    width: 100%;
    height: 100%;
    object-fit: contain;
    transition: transform 0.3s ease;
    background: var(--bg-secondary);
    max-width: 100%;
    max-height: 100%;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  }

  .thumb.placeholder {
    background: var(--bg-tertiary);
    color: var(--text-muted);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 48px;
  }

  .thumb-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    color: white;
    border: none;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 20;
    opacity: 0;
    transition: all 0.3s ease;
    cursor: pointer;
    font-size: 20px;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.8);
  }

  .thumb-nav.prev {
    left: 12px;
  }

  .thumb-nav.next {
    right: 12px;
  }

  .thumb-wrap:hover .thumb-nav {
    opacity: 1;
  }

  .thumb-nav:hover {
    color: var(--brand-accent);
    transform: translateY(-50%) scale(1.2);
    text-shadow: 0 0 10px rgba(220, 38, 38, 0.8);
  }

  .thumb-dots {
    position: absolute;
    bottom: 16px;
    left: 0;
    right: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    z-index: 25;
    pointer-events: none;
  }

  .thumb-dots-container {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    background: rgba(0, 0, 0, 0.7);
    border-radius: 20px;
    backdrop-filter: blur(10px);
    pointer-events: auto;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
  }

  /* Removed thumb-mask-link styling - no longer needed */

  .badge {
    position: absolute;
    top: 12px;
    z-index: 5;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .badge.filetype {
    left: 12px;
    background: var(--brand-gradient);
    color: var(--text-inverse);
  }

  .badge.filesize {
    right: 12px;
    background: var(--surface-overlay);
    color: var(--text-primary);
    border: 1px solid var(--border-light);
    backdrop-filter: blur(10px);
  }
</style>

<style>
  .pagination-wrapper {
    background: var(--surface);
    border-radius: 16px;
    padding: 20px;
    border: 1px solid var(--border-light);
    box-shadow: var(--shadow-sm);
    display: inline-block;
    margin: 40px auto;
  }

  /* Styling untuk pagination links agar sesuai dengan theme */
  .pagination-wrapper .pagination {
    margin: 0;
  }

  .pagination-wrapper .page-link {
    color: var(--text-secondary);
    background: transparent;
    border: 1px solid var(--border-light);
    border-radius: 8px;
    margin: 0 4px;
    transition: all 0.3s ease;
  }

  .pagination-wrapper .page-link:hover {
    color: var(--brand-primary);
    background: var(--bg-tertiary);
    border-color: var(--brand-primary);
  }

  .pagination-wrapper .page-item.active .page-link {
    background: var(--brand-gradient);
    border-color: var(--brand-primary);
    color: var(--text-inverse);
  }

  .pagination-wrapper .page-item.disabled .page-link {
    color: var(--text-muted);
    background: var(--bg-secondary);
    border-color: var(--border-light);
  }
</style>


<style>
  .no-catalog {
    background: var(--surface);
    border: 1px solid var(--border-light);
    border-radius: 24px;
    padding: 80px 40px;
    max-width: 600px;
    margin: 0 auto;
    box-shadow: var(--shadow-lg);
  }

  .no-catalog-icon {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: var(--bg-tertiary);
    color: var(--text-muted);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    margin: 0 auto 24px;
  }

  .no-catalog h3 {
    font-size: 24px;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 16px;
  }

  .no-catalog p {
    color: var(--text-secondary);
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 32px;
  }
</style>


<style>
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
    padding: 32px 24px;
    text-align: center;
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    box-shadow: var(--shadow-md);
    position: relative;
    overflow: hidden;
  }

  .std-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: var(--brand-gradient);
    transform: translateX(-100%);
    transition: transform 0.6s ease;
  }

  .std-card:hover::before {
    transform: translateX(0);
  }

  .std-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-xl), var(--shadow-brand);
    border-color: var(--brand-primary);
  }

  .std-icon {
    width: 60px;
    height: 60px;
    border-radius: 16px;
    background: var(--bg-tertiary);
    color: var(--brand-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    margin: 0 auto 20px;
    transition: all 0.3s ease;
  }

  .std-card:hover .std-icon {
    background: var(--brand-primary);
    color: var(--text-inverse);
    transform: scale(1.1);
  }

  .std-card h4 {
    font-size: 20px;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 12px;
  }

  .std-card p {
    font-size: 14px;
    color: var(--text-secondary);
    line-height: 1.5;
    margin: 0;
  }
</style>


<style>
  .faq-list {
    max-width: 800px;
    margin: 0 auto;
  }

  .faq-item {
    background: var(--surface);
    border: 1px solid var(--border-light);
    border-radius: 16px;
    margin-bottom: 16px;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: var(--shadow-sm);
  }

  .faq-item:hover {
    box-shadow: var(--shadow-md);
    border-color: var(--brand-primary);
  }

  .faq-item[open] {
    border-color: var(--brand-primary);
    box-shadow: var(--shadow-md);
  }

  .faq-item summary {
    padding: 20px 24px;
    cursor: pointer;
    font-weight: 600;
    color: var(--text-primary);
    display: flex;
    align-items: center;
    transition: all 0.3s ease;
    user-select: none;
    list-style: none;
    position: relative;
  }

  .faq-item summary::-webkit-details-marker {
    display: none;
  }

  .faq-item summary::after {
    content: '\f107';
    font-family: 'Font Awesome 6 Free';
    font-weight: 900;
    margin-left: auto;
    color: var(--brand-primary);
    transition: transform 0.3s ease;
  }

  .faq-item[open] summary::after {
    transform: rotate(180deg);
  }

  .faq-item summary:hover {
    background: var(--bg-tertiary);
    color: var(--brand-primary);
  }

  .faq-item summary i {
    color: var(--brand-primary);
    margin-right: 8px;
  }

  .faq-body {
    padding: 0 24px 20px;
    color: var(--text-secondary);
    line-height: 1.6;
    font-size: 15px;
    border-top: 1px solid var(--border-light);
    margin-top: -1px;
    background: var(--bg-tertiary);
  }
</style>


<style>
  .cta-content {
    max-width: 600px;
    margin: 0 auto;
    padding: 60px 20px;
  }

  .cta-icon {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: var(--brand-gradient);
    color: var(--text-inverse);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    margin: 0 auto 24px;
    box-shadow: var(--shadow-brand);
  }

  .cta-title {
    font-size: clamp(1.8rem, 3vw, 2.5rem);
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 16px;
  }

  .cta-description {
    font-size: 18px;
    color: var(--text-secondary);
    margin-bottom: 32px;
    line-height: 1.6;
  }

  .cta-actions {
    display: flex;
    gap: 16px;
    justify-content: center;
    flex-wrap: wrap;
  }
</style>


<style>
  .newsletter-inner {
    background: var(--surface);
    border: 1px solid var(--border-light);
    border-radius: 24px;
    padding: 40px;
    display: grid;
    grid-template-columns: 1fr auto;
    gap: 32px;
    align-items: center;
    box-shadow: var(--shadow-lg);
    backdrop-filter: blur(10px);
  }

  .nl-text h3 {
    font-size: 24px;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 8px;
  }

  .nl-text p {
    color: var(--text-secondary);
    margin: 0;
    font-size: 16px;
  }

  .nl-form {
    display: flex;
    gap: 12px;
    align-items: center;
  }

  .nl-form input {
    padding: 12px 20px;
    border: 1px solid var(--border-light);
    border-radius: 12px;
    background: var(--bg-secondary);
    color: var(--text-primary);
    font-size: 14px;
    min-width: 250px;
    transition: all 0.3s ease;
  }

  .nl-form input:focus {
    outline: none;
    border-color: var(--brand-primary);
    box-shadow: 0 0 0 3px rgba(124, 20, 21, 0.1);
  }

  .nl-form input::placeholder {
    color: var(--text-muted);
  }

  @media (max-width: 768px) {
    .newsletter-inner {
      grid-template-columns: 1fr;
      gap: 24px;
      text-align: center;
    }
    
    .nl-form {
      flex-direction: column;
      gap: 16px;
    }
    
    .nl-form input {
      width: 100%;
      min-width: auto;
    }
  }
</style>


<style>
  .mini-cta-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 32px;
    background: var(--surface);
    border: 1px solid var(--border-light);
    border-radius: 24px;
    padding: 32px 40px;
    box-shadow: var(--shadow-lg);
  }

  .mini-cta-text h3 {
    font-size: 22px;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 8px;
  }

  .mini-cta-text p {
    color: var(--text-secondary);
    margin: 0;
    font-size: 16px;
    line-height: 1.5;
  }

  @media (max-width: 768px) {
    .mini-cta-inner {
      flex-direction: column;
      gap: 24px;
      text-align: center;
      padding: 32px 24px;
    }
  }
</style>


<style>
  .compare-bar {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background: var(--surface);
    border-top: 1px solid var(--border-light);
    padding: 16px 0;
    z-index: 1000;
    transform: translateY(100%);
    transition: transform 0.3s ease;
    box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px);
  }

  .compare-bar.active {
    transform: translateY(0);
  }

  .compare-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
  }

  .compare-list {
    flex: 1;
    display: flex;
    gap: 12px;
    align-items: center;
  }

  .compare-actions {
    display: flex;
    gap: 12px;
    align-items: center;
  }

  @media (max-width: 768px) {
    .compare-inner {
      flex-direction: column;
      gap: 16px;
    }
    
    .compare-actions {
      width: 100%;
      justify-content: center;
    }
  }
</style>

<style>
/* ========= MODERN THEME SYSTEM - KONSISTEN DENGAN LAYOUT ========= */
:root {
  /* Brand Colors - Deep Red Theme (sesuai dengan layout) */
  --brand-primary: #7c1415;
  --brand-secondary: #b71c1c;
  --brand-accent: #dc2626;
  --brand-gradient: linear-gradient(135deg, #7c1415 0%, #b71c1c 50%, #dc2626 100%);
  --brand-shadow: rgba(124, 20, 21, 0.25);
}

/* Light Theme Default Variables */
body.light-theme,
body:not(.dark-theme) {
  /* Backgrounds */
  --bg-primary: #ffffff;
  --bg-secondary: #f8fafc;
  --bg-tertiary: #f1f5f9;
  --surface: #ffffff;
  --surface-elevated: rgba(255, 255, 255, 0.95);
  --surface-overlay: rgba(255, 255, 255, 0.9);
  
  /* Text Colors */
  --text-primary: #1e293b;
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
  --shadow-brand: 0 10px 30px rgba(124, 20, 21, 0.2);
  
  /* Glass Effects */
  --glass-bg: rgba(255, 255, 255, 0.1);
  --glass-border: rgba(255, 255, 255, 0.2);
  --backdrop-blur: blur(12px);
  
  /* Gradients */
  --overlay-gradient: linear-gradient(180deg, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.7) 100%);
  --section-bg-gradient: linear-gradient(135deg, rgba(248, 250, 252, 0.8) 0%, rgba(241, 245, 249, 0.6) 100%);
}

/* Dark Theme Variables */
body.dark-theme {
  /* Backgrounds */
  --bg-primary: #0a0e1a;
  --bg-secondary: #0f1629;
  --bg-tertiary: #1e293b;
  --surface: rgba(30, 41, 59, 0.8);
  --surface-elevated: rgba(51, 65, 85, 0.9);
  --surface-overlay: rgba(30, 41, 59, 0.95);
  
  /* Text Colors */
  --text-primary: #f1f5f9;
  --text-secondary: #cbd5e1;
  --text-muted: #94a3b8;
  --text-inverse: #1e293b;
  
  /* Borders */
  --border-light: rgba(71, 85, 105, 0.6);
  --border-medium: rgba(100, 116, 139, 0.7);
  --border-strong: rgba(148, 163, 184, 0.8);
  
  /* Shadows & Effects untuk Dark Mode */
  --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.3);
  --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.3), 0 2px 4px -1px rgba(0, 0, 0, 0.2);
  --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.4), 0 4px 6px -2px rgba(0, 0, 0, 0.2);
  --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.5), 0 10px 10px -5px rgba(0, 0, 0, 0.3);
  --shadow-brand: 0 10px 30px rgba(124, 20, 21, 0.4);
  
  /* Glass Effects */
  --glass-bg: rgba(0, 0, 0, 0.3);
  --glass-border: rgba(255, 255, 255, 0.1);
  
  /* Gradients */
  --overlay-gradient: linear-gradient(180deg, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0.9) 100%);
  --section-bg-gradient: linear-gradient(135deg, rgba(15, 23, 42, 0.8) 0%, rgba(30, 41, 59, 0.6) 100%);
}

/* Auto Dark Mode Support */
@media (prefers-color-scheme: dark) {
  body:not(.light-theme) {
    /* Backgrounds */
    --bg-primary: #0a0e1a;
    --bg-secondary: #0f1629;
    --bg-tertiary: #1e293b;
    --surface: rgba(30, 41, 59, 0.8);
    --surface-elevated: rgba(51, 65, 85, 0.9);
    --surface-overlay: rgba(30, 41, 59, 0.95);
    
    /* Text Colors */
    --text-primary: #f1f5f9;
    --text-secondary: #cbd5e1;
    --text-muted: #94a3b8;
    --text-inverse: #1e293b;
    
    /* Borders */
    --border-light: rgba(71, 85, 105, 0.6);
    --border-medium: rgba(100, 116, 139, 0.7);
    --border-strong: rgba(148, 163, 184, 0.8);
    
    /* Shadows & Effects */
    --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.3);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.3), 0 2px 4px -1px rgba(0, 0, 0, 0.2);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.4), 0 4px 6px -2px rgba(0, 0, 0, 0.2);
    --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.5), 0 10px 10px -5px rgba(0, 0, 0, 0.3);
    --shadow-brand: 0 10px 30px rgba(124, 20, 21, 0.4);
    
    /* Glass Effects */
    --glass-bg: rgba(0, 0, 0, 0.3);
    --glass-border: rgba(255, 255, 255, 0.1);
    
    /* Gradients */
    --overlay-gradient: linear-gradient(180deg, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0.9) 100%);
    --section-bg-gradient: linear-gradient(135deg, rgba(15, 23, 42, 0.8) 0%, rgba(30, 41, 59, 0.6) 100%);
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

.btn-white-fixed {
  border: 2px solid rgba(255, 255, 255, 0.9) !important;
  color: rgba(255, 255, 255, 0.95) !important;
  background: rgba(255, 255, 255, 0.1) !important;
  backdrop-filter: var(--backdrop-blur);
}

.btn-white-fixed:hover {
  background: rgba(255, 255, 255, 0.25) !important;
  border-color: rgba(255, 255, 255, 1) !important;
  color: rgba(255, 255, 255, 1) !important;
  transform: translateY(-1px);
}

/* Ensure white button stays white in dark theme */
body.dark-theme .btn-white-fixed,
body.dark-theme .btn-white-fixed:hover {
  border-color: rgba(255, 255, 255, 0.9) !important;
  color: rgba(255, 255, 255, 0.95) !important;
  background: rgba(255, 255, 255, 0.1) !important;
}

body.dark-theme .btn-white-fixed:hover {
  background: rgba(255, 255, 255, 0.25) !important;
  border-color: rgba(255, 255, 255, 1) !important;
  color: rgba(255, 255, 255, 1) !important;
}

/* Hero primary button - white in dark mode */
.btn-hero-primary {
  background: var(--brand-gradient);
  color: var(--text-inverse);
  box-shadow: var(--shadow-brand);
  border: none;
}

.btn-hero-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 15px 35px rgba(139, 0, 0, 0.4);
  color: var(--text-inverse);
}

/* Dark mode - make hero primary button white */
body.dark-theme .btn-hero-primary {
  background: rgba(255, 255, 255, 0.95) !important;
  color: var(--brand-primary) !important;
  border: 2px solid rgba(255, 255, 255, 0.9) !important;
  box-shadow: 0 8px 25px rgba(255, 255, 255, 0.15) !important;
}

body.dark-theme .btn-hero-primary:hover {
  background: rgba(255, 255, 255, 1) !important;
  color: var(--brand-primary) !important;
  border-color: rgba(255, 255, 255, 1) !important;
  transform: translateY(-2px);
  box-shadow: 0 15px 35px rgba(255, 255, 255, 0.25) !important;
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
  min-height: 90vh;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--text-inverse);
  overflow: hidden;
  padding: 80px 0 40px 0;
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
  margin-top: -40px;
}

/* kalau jarak besarnya datang dari h1/h2 pertama, nolkan margin atasnya */
.hero-content > :first-child {
  margin-top: 0;
}

/* Enhanced text contrast untuk dark mode */
body.dark-theme .hero-content {
  text-shadow: 0 2px 8px rgba(0, 0, 0, 0.8);
}

body.dark-theme .hero-title {
  color: #ffffff;
  text-shadow: 0 2px 12px rgba(0, 0, 0, 0.9);
}

body.dark-theme .hero-subtitle {
  color: #f1f5f9;
  text-shadow: 0 1px 6px rgba(0, 0, 0, 0.7);
}

.hero-kicker {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  padding: 12px 24px;
  border-radius: 50px;
  font-weight: 700;
  font-size: 14px;
  letter-spacing: 1px;
  background: rgba(255, 255, 255, 0.15);
  border: 1px solid rgba(255, 255, 255, 0.25);
  backdrop-filter: blur(10px);
  margin-bottom: 16px;
  text-transform: uppercase;
  animation: float 3s ease-in-out infinite;
  color: var(--text-inverse);
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

/* Dark mode untuk hero kicker - lebih terang */
body.dark-theme .hero-kicker {
  background: rgba(255, 255, 255, 0.25);
  border: 1px solid rgba(255, 255, 255, 0.4);
  color: #ffffff;
  text-shadow: 0 1px 3px rgba(0, 0, 0, 0.8);
}

.hero-kicker i {
  font-size: 16px;
  color: #FFD700;
  text-shadow: 0 0 10px rgba(255, 215, 0, 0.5);
  filter: drop-shadow(0 0 5px rgba(255, 215, 0, 0.8));
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

/* Dark mode gradient - lebih terang untuk kontras */
body.dark-theme .hero-gradient {
  --g1: #ff6b6b; /* light red */
  --g2: #fbbf24; /* yellow */
  --g3: #60a5fa; /* light blue */
  
  background-image: linear-gradient(90deg, var(--g1), var(--g2), var(--g3));
  text-shadow: 0 0 20px rgba(255, 107, 107, 0.5);
}

/* fallback kalau browser tidak dukung background-clip:text */
@supports not (background-clip: text){
  .hero-gradient{ 
    color: #8b0000; 
  }
  
  body.dark-theme .hero-gradient {
    color: #ff6b6b;
  }
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
  color: var(--text-inverse);
}

/* Dark mode untuk hero points - kontras lebih baik */
body.dark-theme .hero-points li {
  background: rgba(255, 255, 255, 0.2);
  border: 1px solid rgba(255, 255, 255, 0.3);
  color: #ffffff;
  text-shadow: 0 1px 3px rgba(0, 0, 0, 0.8);
}

.hero-points li:hover {
  transform: translateY(-2px);
}

body.dark-theme .hero-points li:hover {
  background: rgba(255, 255, 255, 0.3);
}

.hero-points li i {
  color: var(--brand-accent);
  font-size: 16px;
}

/* Dark mode untuk icons - lebih terang */
body.dark-theme .hero-points li i {
  color: #fbbf24;
  text-shadow: 0 0 8px rgba(251, 191, 36, 0.5);
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
  background: rgba(255, 255, 255, 0.1);
  opacity: 0.6;
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
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.1);
}

.floating-shape.shape-4 {
  width: 100px;
  height: 100px;
  bottom: 30%;
  left: 20%;
  animation-duration: 28s;
  animation-delay: -15s;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.08);
}

.floating-shape.shape-5 {
  width: 40px;
  height: 40px;
  top: 15%;
  right: 30%;
  animation-duration: 22s;
  animation-delay: -8s;
  background: rgba(255, 255, 255, 0.12);
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
  padding: 60px 0;
}

.featured-cats::before {
  content: '';
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: radial-gradient(circle at 30% 70%, rgba(124, 20, 21, 0.02) 0%, transparent 50%);
  animation: rotate 60s linear infinite;
  opacity: 0.5;
}

/* Dark mode untuk featured-cats */
body.dark-theme .featured-cats::before {
  background: radial-gradient(circle at 30% 70%, rgba(124, 20, 21, 0.08) 0%, transparent 50%);
  opacity: 0.3;
}

.top-downloads {
  position: relative;
  overflow: hidden;
  padding: 80px 0;
}

.top-downloads::after {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  width: 300px;
  height: 300px;
  background: radial-gradient(circle, rgba(124, 20, 21, 0.03) 0%, transparent 70%);
  border-radius: 50%;
  transform: translate(50%, -50%);
  opacity: 0.5;
}

/* Dark mode untuk top-downloads */
body.dark-theme .top-downloads::after {
  background: radial-gradient(circle, rgba(124, 20, 21, 0.08) 0%, transparent 70%);
  opacity: 0.3;
}

.standards-section {
  position: relative;
  overflow: hidden;
  padding: 80px 0;
}

.standards-section::before {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 400px;
  height: 400px;
  background: radial-gradient(circle, rgba(124, 20, 21, 0.04) 0%, transparent 70%);
  border-radius: 50%;
  transform: translate(-50%, 50%);
  opacity: 0.5;
}

/* Dark mode untuk standards-section */
body.dark-theme .standards-section::before {
  background: radial-gradient(circle, rgba(124, 20, 21, 0.1) 0%, transparent 70%);
  opacity: 0.3;
}

.catalog-list-section {
  padding: 80px 0;
}

.faq-section {
  padding: 80px 0;
}

.cta-section {
  padding: 80px 0;
}

.newsletter {
  padding: 60px 0;
}

.mini-cta {
  padding: 40px 0;
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

/* ========= ENHANCED INFO BANNER ========= */
.info-banner {
  position: relative;
  z-index: 10;
  margin-top: 20px;
  padding: 50px 0 60px 0;
  overflow: hidden;
}

.info-content {
  position: relative;
  z-index: 5;
}

.info-header {
  text-align: center;
  margin-bottom: 60px;
}

.info-title {
  font-size: clamp(2rem, 4vw, 3.5rem);
  font-weight: 900;
  color: var(--text-primary);
  margin-bottom: 16px;
  background: linear-gradient(135deg, var(--text-primary), var(--brand-primary));
  background-clip: text;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  color: transparent;
}

/* Fallback untuk browser yang tidak support background-clip */
@supports not (background-clip: text) {
  .info-title {
    color: var(--text-primary);
  }
}

.info-subtitle {
  font-size: 18px;
  color: var(--text-secondary);
  max-width: 600px;
  margin: 0 auto;
  line-height: 1.6;
}

.info-stats {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 24px;
  margin-bottom: 60px;
}

.info-stat-item {
  position: relative;
  text-align: center;
  padding: 32px 20px;
  background: var(--surface);
  border-radius: 24px;
  border: 1px solid var(--border-light);
  backdrop-filter: blur(20px);
  transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  overflow: hidden;
  box-shadow: var(--shadow-lg);
}

.info-stat-item::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 3px;
  background: linear-gradient(90deg, var(--brand-primary), var(--brand-accent), #f59e0b);
  transform: translateX(-100%);
  transition: transform 0.6s ease;
}

.info-stat-item:hover::before {
  transform: translateX(0);
}

.info-stat-item:hover {
  transform: translateY(-8px);
  box-shadow: var(--shadow-xl), var(--shadow-brand);
  background: var(--surface-elevated);
  border-color: var(--brand-primary);
}

.stat-number {
  font-size: clamp(2.5rem, 4vw, 3.5rem);
  font-weight: 900;
  color: var(--brand-primary);
  margin-bottom: 8px;
  line-height: 1;
  text-shadow: 0 2px 4px rgba(124, 20, 21, 0.1);
}

.stat-desc {
  font-size: 16px;
  font-weight: 700;
  color: var(--text-primary);
  margin-bottom: 8px;
  line-height: 1.4;
}

.stat-note {
  font-size: 12px;
  font-weight: 500;
  color: var(--text-muted);
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.stat-icon-bg {
  position: absolute;
  top: 16px;
  right: 16px;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: var(--bg-tertiary);
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0.8;
  transition: all 0.3s ease;
  border: 1px solid var(--border-light);
}

.stat-icon-bg i {
  font-size: 18px;
  color: var(--brand-primary);
}

.info-stat-item:hover .stat-icon-bg {
  opacity: 1;
  transform: scale(1.1);
  background: var(--brand-primary);
  border-color: var(--brand-primary);
}

.info-stat-item:hover .stat-icon-bg i {
  color: var(--text-inverse);
}

/* Dark theme khusus untuk stat-number */
body.dark-theme .stat-number {
  color: var(--brand-accent);
  text-shadow: 0 2px 4px rgba(220, 38, 38, 0.2);
}

.info-features {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 20px;
  margin-top: 40px;
}

.feature-item {
  display: flex;
  align-items: center;
  gap: 16px;
  padding: 20px 24px;
  background: var(--bg-tertiary);
  border: 1px solid var(--border-light);
  border-radius: 16px;
  backdrop-filter: blur(10px);
  transition: all 0.3s ease;
  font-weight: 600;
  color: var(--text-secondary);
}

.feature-item:hover {
  background: var(--surface);
  transform: translateX(4px);
  border-color: var(--brand-primary);
  box-shadow: var(--shadow-md);
}

.feature-item i {
  font-size: 20px;
  color: var(--brand-primary);
  width: 24px;
  text-align: center;
  flex-shrink: 0;
}

.feature-item span {
  font-size: 14px;
  line-height: 1.4;
}

/* ========= ENHANCED CARD COMPONENTS ========= */
.featured-cats {
  padding: 60px 0;
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

/* Hover efek cat-card dinonaktifkan */
.cat-card:hover::before {
  opacity: 0;
}

.cat-card:hover {
  transform: none;
  box-shadow: var(--shadow-md);
  border-color: var(--border-light);
  color: var(--text-primary);
  text-decoration: none;
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
  position: relative;
  z-index: 5;
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
  position: relative;
  z-index: 5;
}

.cc-meta {
  font-size: 14px;
  color: var(--text-muted);
  font-weight: 500;
  position: relative;
  z-index: 5;
}

/* Brands Marquee Enhancement */
.brands-marquee {
  padding: 40px 0;
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

/* Hover efek td-card dinonaktifkan */
.td-card:hover::before {
  opacity: 0;
}

.td-card:hover {
  transform: none;
  box-shadow: var(--shadow-md);
  border-color: var(--border-light);
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
  text-decoration: none;
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
  color: var(--text-inverse);
  text-decoration: none;
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
  text-decoration: none;
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
  text-decoration: none;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
}

.btn-compare:hover {
  background: var(--brand-primary);
  color: var(--text-inverse);
  border-color: var(--brand-primary);
  text-decoration: none;
}

/* ========= ENHANCED CATALOG LIST ========= */
.catalog-list-section {
  padding: 80px 0;
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
  display: flex;
  gap: 24px;
  background: var(--surface);
  border: 1px solid var(--border-light);
  border-radius: 28px;
  padding: 24px;
  transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  color: var(--text-primary);
  box-shadow: var(--shadow-lg);
  overflow: hidden;
  align-items: flex-start;
}

/* Alternating layout pattern */
.catalog-row:nth-child(even) {
  flex-direction: row-reverse;
}

.catalog-row:nth-child(odd) {
  flex-direction: row;
}

.catalog-row::before {
  content: '';
  position: absolute;
  inset: 0;
  background: var(--brand-gradient);
  opacity: 0;
  transition: opacity 0.3s ease;
}

/* Hover efek catalog-row dinonaktifkan */
.catalog-row:hover::before {
  opacity: 0;
}

.catalog-row:hover {
  transform: none;
  box-shadow: var(--shadow-lg);
  border-color: var(--border-light);
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
  z-index: 20;
  flex: 1;
  max-width: 50%;
  min-width: 0;
  padding-left: 8px;
}

/* Adjust content padding for alternating layout */
.catalog-row:nth-child(even) .content {
  padding-left: 0;
  padding-right: 8px;
}

.catalog-row:nth-child(odd) .content {
  padding-left: 8px;
  padding-right: 0;
}

/* Mobile: Reset to normal layout */
@media (max-width: 768px) {
  .catalog-row:nth-child(even),
  .catalog-row:nth-child(odd) {
    flex-direction: column;
  }
  
  .catalog-row:nth-child(even) .content,
  .catalog-row:nth-child(odd) .content {
    padding-left: 0;
    padding-right: 0;
    max-width: 100%;
  }
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
  padding: 8px 16px;
  border-radius: 50px;
  font-size: 13px;
  font-weight: 700;
  text-decoration: none;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  transition: all 0.3s ease;
  display: inline-block;
}

.category:hover {
  transform: scale(1.05);
  color: var(--text-inverse);
  text-decoration: none;
}

.meta {
  display: flex;
  gap: 16px;
  font-size: 13px;
  color: var(--text-muted);
  align-items: center;
}

.meta span {
  display: flex;
  align-items: center;
  gap: 4px;
  font-weight: 500;
}

.title {
  font-size: 22px;
  font-weight: 700;
  line-height: 1.3;
  margin: 0;
}

.desc {
  color: var(--text-secondary);
  font-size: 15px;
  line-height: 1.6;
  margin: 0;
}

.cta {
  display: flex;
  gap: 12px;
  flex-wrap: wrap;
  align-items: center;
}

/* Responsif untuk catalog-row */
@media (max-width: 768px) {
  .catalog-row {
    flex-direction: column;
    gap: 20px;
    padding: 20px;
    min-height: auto;
  }
  
  .thumb-wrap {
    width: 100%;
    max-width: 100%;
  }
  
  .floating-actions {
    top: 16px;
    right: 16px;
    gap: 8px;
  }
  
  .topline {
    flex-direction: column;
    gap: 12px;
    align-items: flex-start;
  }
  
  .meta {
    gap: 12px;
    flex-wrap: wrap;
  }
  
  .title {
    font-size: 20px;
  }
  
  .cta {
    gap: 8px;
  }
  
  .thumb-viewport {
    aspect-ratio: 16/9;
    max-height: 250px;
  }
}

@media (max-width: 1024px) {
  .catalog-row {
    gap: 20px;
    padding: 20px;
  }
}

@media (max-width: 992px) {
  .catalog-row {
    gap: 16px;
    padding: 16px;
  }
  
  .content {
    padding-left: 4px;
  }
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

/* ========= ENHANCED CATALOG ITEM BUTTONS ========= */
.cta-enhanced {
  display: flex;
  flex-direction: column;
  gap: 16px;
  margin-top: 16px;
  position: relative;
  z-index: 30;
}

.primary-actions {
  display: flex;
  gap: 12px;
  flex-wrap: wrap;
}

.secondary-actions {
  display: flex;
  justify-content: flex-start;
}

.cta-enhanced .btn {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 12px 16px;
  border-radius: 14px;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  position: relative;
  overflow: hidden;
  min-height: 48px;
  border: none;
  box-shadow: var(--shadow-md);
  z-index: 10;
  cursor: pointer;
}

.cta-enhanced .btn i {
  font-size: 16px;
  flex-shrink: 0;
  z-index: 2;
  position: relative;
}

.btn-text {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  z-index: 2;
  position: relative;
}

.btn-main {
  font-size: 13px;
  font-weight: 700;
  line-height: 1.2;
}

.btn-sub {
  font-size: 10px;
  font-weight: 500;
  opacity: 0.8;
  line-height: 1.2;
  margin-top: 1px;
}

/* Download button */
.btn-download {
  background: linear-gradient(135deg, #16a34a 0%, #22c55e 100%);
  color: white;
  flex: 1;
  min-width: 140px;
}


/* Preview button */
.btn-preview {
  background: linear-gradient(135deg, #0ea5e9 0%, #3b82f6 100%);
  color: white;
  flex: 1;
  min-width: 140px;
}

.btn-preview::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, #0284c7 0%, #2563eb 100%);
  opacity: 0;
  transition: opacity 0.3s ease;
}

.btn-preview:hover::before {
  opacity: 1;
}

.btn-preview:hover {
  transform: translateY(-3px);
  box-shadow: 0 12px 30px rgba(14, 165, 233, 0.4);
  color: white;
  text-decoration: none;
}

/* Detail button */
.btn-detail {
  background: var(--surface);
  color: var(--text-secondary);
  border: 2px solid var(--border-light);
  min-width: 120px;
}

.btn-detail::before {
  content: '';
  position: absolute;
  inset: 0;
  background: var(--brand-gradient);
  opacity: 0;
  transition: opacity 0.3s ease;
}

.btn-detail:hover::before {
  opacity: 0.1;
}

.btn-detail:hover {
  transform: translateY(-2px);
  border-color: var(--brand-primary);
  color: var(--brand-primary);
  text-decoration: none;
  box-shadow: var(--shadow-lg);
}

/* Unavailable button */
.btn-unavailable {
  background: var(--bg-secondary);
  color: var(--text-muted);
  border: 2px solid var(--border-light);
  cursor: not-allowed;
  opacity: 0.6;
  flex: 1;
  min-width: 200px;
}

.btn-unavailable i,
.btn-unavailable .btn-text {
  opacity: 0.7;
}

/* Dark mode adjustments */
body.dark-theme .btn-detail {
  background: var(--surface-elevated);
  border-color: var(--border-medium);
}

body.dark-theme .btn-unavailable {
  background: var(--bg-tertiary);
  border-color: var(--border-medium);
}

/* Responsive design */
@media (max-width: 768px) {
  .primary-actions {
    flex-direction: column;
  }
  
  .cta-enhanced .btn {
    min-height: 50px;
    padding: 12px 16px;
    gap: 10px;
  }
  
  .btn-main {
    font-size: 13px;
  }
  
  .btn-sub {
    font-size: 10px;
  }
  
  .cta-enhanced .btn i {
    font-size: 16px;
  }
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
  width: 100%;
}

.thumb-viewport {
  position: relative;
  aspect-ratio: 3/2;
  background: var(--bg-secondary);
  overflow: hidden;
  border-radius: 16px;
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
  display: grid;
  place-items: center;
  background: none;
  color: white;
  z-index: 20;
  cursor: pointer;
  opacity: 0;
  transition: all 0.3s ease;
  font-size: 20px;
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.8);
}

.thumb-nav:hover {
  color: var(--brand-accent);
  transform: translateY(-50%) scale(1.2);
  text-shadow: 0 0 10px rgba(220, 38, 38, 0.8);
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
  bottom: 16px;
  left: 0;
  right: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 8px;
  z-index: 25;
  pointer-events: none;
}

.thumb-dots-container {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 8px;
  padding: 8px 16px;
  background: rgba(0, 0, 0, 0.7);
  border-radius: 20px;
  backdrop-filter: blur(10px);
  pointer-events: auto;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
}

.thumb-dots button {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  border: 1px solid rgba(255, 255, 255, 0.3);
  background: rgba(255, 255, 255, 0.6);
  cursor: pointer;
  padding: 0;
  transition: all 0.3s ease;
  margin: 0;
  flex-shrink: 0;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
}

.thumb-dots button:hover {
  background: rgba(255, 255, 255, 0.9);
  transform: scale(1.2);
  border-color: rgba(255, 255, 255, 0.8);
}

.thumb-dots button[aria-current="true"] {
  background: var(--brand-accent);
  border-color: rgba(255, 255, 255, 0.8);
  width: 16px;
  border-radius: 8px;
  box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.4), 0 2px 6px rgba(0, 0, 0, 0.4);
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

/* ========= CTA dengan overlay foto (tanpa gradient), konten polos ========= */
.cta-section{
  /* knob yang bisa diubah */
  --cta-bg-url: url('{{ asset('img/galeri-proyek/1.jpg') }}');
  --cta-image-opacity: .35;      /* 0–1, transparansi foto */
  --cta-scrim: rgba(0,0,0,.22);  /* lapisan gelap tipis untuk kontras */

  position: relative;
  isolation: isolate;
  overflow: hidden;
  padding: 100px 0;

  background: transparent !important; /* tidak pakai brand gradient */
}

/* Foto transparan di bawah konten */
.cta-section::before{
  content: "";
  position: absolute; inset: 0;
  background: var(--cta-bg-url) center/cover no-repeat;
  opacity: var(--cta-image-opacity);
  z-index: 0; pointer-events: none;
}
/* Scrim netral untuk bantu kontras */
.cta-section::after{
  content: "";
  position: absolute; inset: 0;
  background: var(--cta-scrim);
  z-index: 0; pointer-events: none;
}

/* ====== WARNA ADAPTIF via CSS variables (default = LIGHT) ====== */
:root{
  --cta-title-color: #0b1220;  /* judul gelap */
  --cta-desc-color:  #0f172a;  /* deskripsi gelap */
}

/* Dark mode VARIANTS (cover semua pola umum) */
html.dark, body.dark, .dark body,
[data-theme="dark"], [data-bs-theme="dark"]{
  --cta-title-color: #ffffff;
  --cta-desc-color:  #ffffff;
}
/* Fallback kalau pakai preferensi OS */
@media (prefers-color-scheme: dark){
  :root{
    --cta-title-color: #ffffff;
    --cta-desc-color:  #ffffff;
  }
}

/* ====== KONTEN POLOS (tanpa card) ====== */
.cta-content{
  position: relative; z-index: 1;
  max-width: 900px; margin: 0 auto; text-align: center;

  background: transparent !important;
  border-radius: 0 !important;
  box-shadow: none !important;
  padding: 0 !important;
  backdrop-filter: none !important;
}

/* Tipografi + sedikit text-shadow supaya kebaca di atas foto */
.cta-title{
  font-size: clamp(2rem, 4vw, 3rem);
  font-weight: 900;
  line-height: 1.2;
  margin-bottom: 16px;
  color: var(--cta-title-color) !important;
  text-shadow: 0 2px 10px rgba(0,0,0,.25);
}
.cta-description{
  font-size: 18px;
  line-height: 1.6;
  margin-bottom: 32px;
  color: var(--cta-desc-color) !important;   /* <- kunci adaptif */
  opacity: .95;
  text-shadow: 0 1px 8px rgba(0,0,0,.20);
}

/* Icon minimal */
.cta-icon{
  width: 120px; height: 120px; border-radius: 50%;
  display: grid; place-items: center;
  font-size: 48px; margin: 0 auto 24px;
  background: rgba(255,255,255,.14);
  color: #fff; border: 1px solid rgba(255,255,255,.18);
  backdrop-filter: blur(2px);
  animation: float 4s ease-in-out infinite;
}

/* Actions */
.cta-actions{ display:flex; gap:20px; justify-content:center; flex-wrap:wrap; }

/* Animasi */
@keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-6px)} }





/* ========= ENHANCED NEWSLETTER ========= */
.newsletter {
  padding: 60px 0;
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
    min-height: 85vh;
    padding: 60px 0 40px 0;
  }
  
  .info-stats {
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
  }
  
  .info-features {
    grid-template-columns: 1fr;
  }
  
  .info-header {
    margin-bottom: 40px;
  }
  
  .hero-content {
    margin-top: -20px;
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
    min-height: 80vh;
    padding: 50px 0 30px 0;
  }
  
  .info-banner {
    margin-top: -100px;
    padding: 50px 0 40px;
  }
  
  .info-stats {
    grid-template-columns: 1fr;
    gap: 16px;
    margin-bottom: 40px;
  }
  
  .info-stat-item {
    padding: 24px 16px;
  }
  
  .info-title {
    font-size: clamp(1.8rem, 6vw, 2.5rem);
  }
  
  .info-features {
    margin-top: 30px;
    gap: 12px;
  }
  
  .feature-item {
    padding: 16px 20px;
  }
  
  .hero-content {
    margin-top: -10px;
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

/* ========= MODERN DETAIL MODAL ========= */
.detail-modal {
  position: fixed;
  inset: 0;
  z-index: 9999;
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  visibility: hidden;
  transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  padding: 20px;
}

.detail-modal.active {
  opacity: 1;
  visibility: visible;
}

.modal-backdrop {
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.8);
  backdrop-filter: blur(10px);
  cursor: pointer;
}

.modal-container {
  position: relative;
  background: var(--surface);
  border-radius: 24px;
  max-width: 1000px;
  width: 100%;
  max-height: 90vh;
  overflow: hidden;
  box-shadow: var(--shadow-xl), 0 25px 50px rgba(0, 0, 0, 0.25);
  transform: scale(0.9) translateY(20px);
  transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  border: 1px solid var(--border-light);
}

.detail-modal.active .modal-container {
  transform: scale(1) translateY(0);
}

.modal-header {
  position: absolute;
  top: 16px;
  right: 16px;
  z-index: 10;
}

.modal-close {
  width: 44px;
  height: 44px;
  border-radius: 50%;
  background: rgba(0, 0, 0, 0.7);
  border: none;
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all 0.3s ease;
  backdrop-filter: blur(10px);
}

.modal-close:hover {
  background: var(--brand-primary);
  transform: scale(1.1);
}

.modal-content {
  display: grid;
  grid-template-columns: 1fr 1fr;
  min-height: 500px;
  max-height: 90vh;
  overflow: hidden;
}

.modal-gallery {
  background: var(--bg-secondary);
  display: flex;
  flex-direction: column;
}

.gallery-main {
  position: relative;
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, var(--bg-secondary) 0%, var(--bg-tertiary) 100%);
}

.main-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.4s ease;
}

.main-image:hover {
  transform: scale(1.02);
}

.image-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.1) 100%);
  display: flex;
  align-items: flex-end;
  padding: 20px;
}

.image-badges {
  display: flex;
  gap: 8px;
}

.image-badges .badge {
  padding: 6px 12px;
  border-radius: 20px;
  font-size: 12px;
  font-weight: 700;
  backdrop-filter: blur(10px);
}

.image-badges .file-type {
  background: rgba(0, 0, 0, 0.7);
  color: white;
}

.image-badges .file-size {
  background: var(--brand-gradient);
  color: white;
}

.gallery-thumbs {
  display: flex;
  gap: 8px;
  padding: 16px;
  overflow-x: auto;
  scrollbar-width: none;
}

.gallery-thumbs::-webkit-scrollbar {
  display: none;
}

.thumb-item {
  width: 60px;
  height: 40px;
  border-radius: 8px;
  overflow: hidden;
  cursor: pointer;
  transition: all 0.3s ease;
  border: 2px solid transparent;
}

.thumb-item:hover,
.thumb-item.active {
  border-color: var(--brand-primary);
  transform: scale(1.05);
}

.thumb-item img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.modal-info {
  padding: 32px;
  display: flex;
  flex-direction: column;
  gap: 24px;
  overflow-y: auto;
}

.info-header {
  border-bottom: 1px solid var(--border-light);
  padding-bottom: 20px;
}

.category-badge {
  display: inline-block;
  background: var(--brand-gradient);
  color: var(--text-inverse);
  padding: 6px 16px;
  border-radius: 20px;
  font-size: 12px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  margin-bottom: 12px;
}

.modal-title {
  font-size: 24px;
  font-weight: 800;
  color: var(--text-primary);
  margin: 0 0 12px 0;
  line-height: 1.3;
}

.modal-meta {
  display: flex;
  gap: 20px;
  flex-wrap: wrap;
}

.meta-item {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 14px;
  color: var(--text-muted);
  font-weight: 500;
}

.meta-item i {
  color: var(--brand-primary);
}

.info-body {
  flex: 1;
  display: flex;
  flex-direction: column;
  gap: 24px;
}

.description-section h4,
.features-section h4 {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 16px;
  font-weight: 700;
  color: var(--text-primary);
  margin-bottom: 12px;
}

.description-section h4 i,
.features-section h4 i {
  color: var(--brand-primary);
}

.description-section p {
  color: var(--text-secondary);
  line-height: 1.6;
  margin: 0;
}

.feature-list {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 12px;
}

.feature-item-modal {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 12px 16px;
  background: var(--bg-secondary);
  border: 1px solid var(--border-light);
  border-radius: 12px;
  font-size: 14px;
  font-weight: 500;
  color: var(--text-secondary);
  transition: all 0.3s ease;
}

.feature-item-modal:hover {
  background: var(--brand-primary);
  color: var(--text-inverse);
  border-color: var(--brand-primary);
  transform: translateY(-1px);
}

.feature-item-modal i {
  color: var(--brand-primary);
  font-size: 12px;
  transition: color 0.3s ease;
}

.feature-item-modal:hover i {
  color: var(--text-inverse);
}

.modal-actions {
  display: flex;
  gap: 12px;
  padding-top: 20px;
  border-top: 1px solid var(--border-light);
}

.modal-actions .btn {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  padding: 14px 20px;
  border-radius: 12px;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.3s ease;
  border: none;
  cursor: pointer;
}

.btn-download-modal {
  background: linear-gradient(135deg, #16a34a 0%, #22c55e 100%);
  color: white;
  box-shadow: 0 4px 15px rgba(22, 163, 74, 0.3);
}

.btn-download-modal:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 25px rgba(22, 163, 74, 0.4);
}

.btn-preview-modal {
  background: linear-gradient(135deg, #0ea5e9 0%, #3b82f6 100%);
  color: white;
  box-shadow: 0 4px 15px rgba(14, 165, 233, 0.3);
}

.btn-preview-modal:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 25px rgba(14, 165, 233, 0.4);
}

/* Dark mode adjustments */
body.dark-theme .modal-container {
  background: var(--surface-elevated);
  border-color: var(--border-medium);
}

body.dark-theme .modal-backdrop {
  background: rgba(0, 0, 0, 0.9);
}

body.dark-theme .gallery-main {
  background: linear-gradient(135deg, var(--bg-tertiary) 0%, rgba(51, 65, 85, 0.8) 100%);
}

/* Responsive design */
@media (max-width: 768px) {
  .modal-content {
    grid-template-columns: 1fr;
    max-height: 90vh;
  }
  
  .modal-info {
    padding: 20px;
  }
  
  .modal-title {
    font-size: 20px;
  }
  
  .feature-list {
    grid-template-columns: 1fr;
  }
  
  .modal-actions {
    flex-direction: column;
  }
  
  .gallery-main {
    min-height: 250px;
  }
}

</style>


{{-- ====== SLIDER CSS MINIMAL (aman tumpang tindih dengan style lama) ====== --}}
<style>
  .thumb-has-slider{position:relative; display:block; border-radius:12px; overflow:hidden}
  .thumb-viewport{position:relative; aspect-ratio:16/10; background:var(--soft); display:flex; align-items:center; justify-content:center;}
  .thumb-viewport .slide{position:absolute; inset:0; opacity:0; transform:translateX(6%); transition:opacity .28s ease, transform .28s ease; display:flex; align-items:center; justify-content:center;}
  .thumb-viewport .slide.is-active{opacity:1; transform:translateX(0);}
  .thumb-viewport img.thumb{width:100%; height:100%; object-fit:contain; display:block; background: var(--bg-secondary);}

  .thumb-nav{position:absolute; top:50%; transform:translateY(-50%); width:36px; height:36px; border:0; border-radius:999px; display:grid; place-items:center; background:rgba(0,0,0,.45); color:#fff; z-index:3; cursor:pointer; opacity:.0; transition:opacity .2s}
  .thumb-nav.prev{left:8px}
  .thumb-nav.next{right:8px}
  .thumb-has-slider:hover .thumb-nav{opacity:1}
  body[data-theme="dark"] .thumb-nav{background:rgba(255,255,255,.18)}

  .thumb-dots{position:absolute; left:0; right:0; bottom:8px; display:flex; justify-content:center; gap:6px; z-index:3}
  .thumb-dots button{width:8px; height:8px; border-radius:999px; border:0; background:rgba(255,255,255,.55); cursor:pointer; padding:0}
  .thumb-dots button[aria-current="true"]{background:linear-gradient(135deg,var(--brand),var(--brand-3))}
  body[data-theme="dark"] .thumb-dots button{background:rgba(0,0,0,.45)}

  /* Removed thumb-mask-link - no longer needed for hover cursor elimination */
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

  /* Elemen dekoratif jangan nangkep klik */
.catalog-row::before,
.td-card::before,
.cat-card::before,
.std-card::before,
.results-card::after {
  pointer-events: none !important;
}

/* Pastikan CTA & tombol di dalam form benar-benar klikable */
.catalog-row .cta-enhanced,
.catalog-row .cta-enhanced .btn,
.catalog-row form.inline-form button {
  pointer-events: auto;
  position: relative;
  z-index: 50;
}

</style>

<script>
/* =========================
   FULL JS + STYLE INJECTION (FIXED)
   ========================= */
document.addEventListener('DOMContentLoaded', () => {
  // ========= ENHANCED PARALLAX & ANIMATIONS =========
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
  const requestParallax = () => { if (!ticking) { requestAnimationFrame(updateParallax); ticking = true; } };
  window.addEventListener('scroll', requestParallax, { passive: true });

  // ========= SCROLL PROGRESS =========
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
  const requestProgress = () => { if (!progressTicking) { requestAnimationFrame(updateProgress); progressTicking = true; } };
  window.addEventListener('scroll', requestProgress, { passive: true });
  updateProgress();

  // ========= AOS-LIKE =========
  const animationObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const delay = entry.target.dataset.aosDelay || 0;
        setTimeout(() => entry.target.classList.add('aos-animate'), parseInt(delay));
      }
    });
  }, { threshold: 0.1, rootMargin: '0px 0px -10% 0px' });
  document.querySelectorAll('[data-aos]').forEach(el => {
    el.classList.add('aos-element');
    animationObserver.observe(el);
  });

  // ========= SMOOTH SCROLL (anchor internal) =========
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (!target) return;
      e.preventDefault();
      const headerOffset = 80;
      const elementPosition = target.getBoundingClientRect().top;
      const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
      window.scrollTo({ top: offsetPosition, behavior: 'smooth' });
    });
  });

  // ========= IMAGE SKELETON =========
  const imageObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      const img = entry.target;
      const removeSkeleton = (i) => {
        i.style.transition = 'opacity 0.3s ease';
        i.classList.remove('skeleton');
        i.style.opacity = '1';
      };
      if (img.complete && img.naturalHeight !== 0) {
        removeSkeleton(img);
      } else {
        img.addEventListener('load', () => removeSkeleton(img), { once: true });
        img.addEventListener('error', () => removeSkeleton(img), { once: true });
      }
    });
  });
  document.querySelectorAll('img.skeleton').forEach(img => imageObserver.observe(img));

  // ========= BACK TO TOP =========
  const backToTop = document.querySelector('.back-to-top');
  let backToTopTicking = false;
  const updateBackToTop = () => {
    if (!backToTop) return;
    const scrolled = window.pageYOffset;
    const threshold = window.innerHeight * 0.5;
    backToTop.classList.toggle('show', scrolled > threshold);
    backToTopTicking = false;
  };
  const requestBackToTop = () => { if (!backToTopTicking) { requestAnimationFrame(updateBackToTop); backToTopTicking = true; } };
  window.addEventListener('scroll', requestBackToTop, { passive: true });
  backToTop?.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

  // ========= VIEW TOGGLE =========
  const catalogList = document.querySelector('.catalog-list');
  const viewButtons = Array.from(document.querySelectorAll('[data-view]'))
    .filter(el =>
      (el.matches('a,button,[role="button"]')) &&
      !el.classList.contains('catalog-list') &&
      !el.closest('.catalog-list')
    );
  viewButtons.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
      const view = btn.dataset.view;
      if (!view || !catalogList) return;
      viewButtons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      catalogList.style.opacity = '0.5';
      catalogList.style.transform = 'translateY(10px)';
      setTimeout(() => {
        catalogList.setAttribute('data-view', view);
        catalogList.style.opacity = '1';
        catalogList.style.transform = 'translateY(0)';
      }, 150);
    });
  });

  // ========= FAVORITES =========
  const FAVS_KEY = 'catalog_favorites';
  const getFavorites = () => JSON.parse(localStorage.getItem(FAVS_KEY) || '[]');
  const setFavorites = (favs) => localStorage.setItem(FAVS_KEY, JSON.stringify(favs));
  const updateFavoriteButton = (btn, isFavorited) => {
    btn.classList.toggle('active', isFavorited);
    btn.style.transform = isFavorited ? 'scale(1.2)' : 'scale(1)';
    if (isFavorited) { btn.style.animation = 'heartBeat 0.6s ease'; setTimeout(() => btn.style.animation = '', 600); }
  };
  document.querySelectorAll('.btn-like').forEach(btn => {
    const itemId = btn.dataset.id;
    updateFavoriteButton(btn, getFavorites().includes(itemId));
    btn.addEventListener('click', (e) => {
      e.preventDefault(); e.stopPropagation();
      const favs = getFavorites();
      const i = favs.indexOf(itemId);
      if (i > -1) { favs.splice(i, 1); updateFavoriteButton(btn, false); }
      else { favs.push(itemId); updateFavoriteButton(btn, true); }
      setFavorites(favs);
    });
  });

  // ========= COMPARE =========
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
      </div>`).join('');
    compareBar.classList.toggle('show', items.length > 0);
    if (compareView) {
      compareView.textContent = `Compare (${items.length})`;
      compareView.disabled = items.length < 2;
    }
    compareList.querySelectorAll('.btn-remove').forEach(btn => {
      btn.addEventListener('click', () => {
        const id = btn.dataset.id;
        setCompareItems(getCompareItems().filter(item => item !== id));
        renderCompareBar();
      });
    });
  };

  document.querySelectorAll('.btn-compare').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault(); e.stopPropagation();
      const itemId = btn.dataset.id;
      const current = getCompareItems();
      if (current.includes(itemId)) {
        setCompareItems(current.filter(id => id !== itemId));
        btn.classList.remove('active');
      } else if (current.length < MAX_COMPARE) {
        current.push(itemId); setCompareItems(current); btn.classList.add('active');
        btn.style.animation = 'pulse 0.4s ease'; setTimeout(() => btn.style.animation = '', 400);
      } else {
        alert(`Maximum ${MAX_COMPARE} items can be compared at once.`);
      }
      renderCompareBar();
    });
  });

  compareClear?.addEventListener('click', () => {
    setCompareItems([]); document.querySelectorAll('.btn-compare').forEach(b => b.classList.remove('active')); renderCompareBar();
  });
  compareView?.addEventListener('click', () => {
    const items = getCompareItems();
    if (items.length >= 2) { console.log('Comparing items:', items); alert('Compare functionality - redirect to compare page or show modal'); }
  });
  renderCompareBar();

  // ========= CARD HOVER =========
  document.querySelectorAll('.catalog-row, .td-card, .cat-card, .std-card').forEach(card => {
    card.addEventListener('mouseenter', function(){ this.style.transition='all .4s cubic-bezier(.25,.46,.45,.94)'; });
    card.addEventListener('mouseleave', function(){ this.style.transform=''; });
  });

  // ========= DOWNLOAD TRACKING (non-blocking) =========
  document.querySelectorAll('a[download], a[href*="/storage/"]').forEach(link => {
    link.addEventListener('click', function() {
      const btn = this;
      const originalText = btn.innerHTML;
      btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Downloading...';
      btn.style.pointerEvents = 'none';
      setTimeout(() => {
        btn.innerHTML = '<i class="fas fa-check me-2"></i>Downloaded!';
        setTimeout(() => { btn.innerHTML = originalText; btn.style.pointerEvents = ''; }, 2000);
      }, 1000);
      console.log('Download initiated:', this.getAttribute('href'));
    });
  });

  // ========= NEWSLETTER =========
  const newsletterForm = document.querySelector('.nl-form');
  newsletterForm?.addEventListener('submit', function(e){
    e.preventDefault();
    const btn = this.querySelector('button');
    const originalText = btn.innerHTML;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Subscribing...';
    btn.disabled = true;
    setTimeout(() => {
      btn.innerHTML = '<i class="fas fa-check me-2"></i>Subscribed!';
      this.querySelector('input') && (this.querySelector('input').value = '');
      setTimeout(() => { btn.innerHTML = originalText; btn.disabled = false; }, 3000);
    }, 1500);
  });

  // ========= THUMB SLIDER =========
  document.querySelectorAll('.thumb-has-slider').forEach((wrap) => {
    const viewport = wrap.querySelector('.thumb-viewport');
    const slides = Array.from(viewport.querySelectorAll('.slide'));
    const prevBtn = wrap.querySelector('.thumb-nav.prev');
    const nextBtn = wrap.querySelector('.thumb-nav.next');
    const dotsWrap = wrap.querySelector('.thumb-dots');

    const total = slides.length;
    let idx = slides.findIndex(s => s.classList.contains('is-active'));
    if (idx < 0) idx = 0;

    if (total <= 1) {
      prevBtn && (prevBtn.style.display = 'none');
      nextBtn && (nextBtn.style.display = 'none');
      dotsWrap && (dotsWrap.style.display = 'none');
    } else if (dotsWrap) {
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
      slides.forEach((s, i) => s.classList.toggle('is-active', i === idx));
      if (dotsWrap && total > 1) {
        dotsWrap.querySelectorAll('button').forEach((d, i) =>
          i === idx ? d.setAttribute('aria-current','true') : d.removeAttribute('aria-current')
        );
      }
    }
    function go(next) { idx = (next + total) % total; update(); }

    prevBtn?.addEventListener('click', (e) => { e.stopPropagation(); go(idx - 1); });
    nextBtn?.addEventListener('click', (e) => { e.stopPropagation(); go(idx + 1); });

    // swipe
    let sx = 0, dx = 0;
    viewport.addEventListener('touchstart', (e)=>{ sx = e.touches[0].clientX; dx = 0; }, {passive:true});
    viewport.addEventListener('touchmove',  (e)=>{ dx = e.touches[0].clientX - sx; }, {passive:true});
    viewport.addEventListener('touchend',   ()=>{ if (Math.abs(dx) > 40) go(idx + (dx < 0 ? 1 : -1)); });

    update();
  });

  // ========= MODAL + PREVIEW/DOWNLOAD (FIXED: pakai data.name) =========
  let currentModalData = null;
  window.openDetailModal = (itemId) => {
    const dataElement = document.getElementById(`catalog-data-${itemId}`);
    if (!dataElement) { console.error('Data element not found for item:', itemId); return; }
    try {
      currentModalData = JSON.parse(dataElement.textContent);
      populateModal(currentModalData);
      showModal();
    } catch (err) { console.error('Error parsing catalog data:', err); }
  };

  function populateModal(data) {
    document.getElementById('modalTitle').textContent = data.name; // FIXED
    document.getElementById('modalDescription').textContent = data.description || 'Tidak ada deskripsi tersedia.';
    document.getElementById('modalCategory').textContent = data.category;
    document.getElementById('modalDate').textContent = data.created_at;

    if (data.file_type) {
      document.getElementById('modalFileType').innerHTML = `<i class="fas fa-file-${getFileIcon(data.file_type)}"></i> ${data.file_type.toUpperCase()}`;
    }
    if (data.file_size) { document.getElementById('modalFileSize').textContent = data.file_size; }

    const mainImage = document.getElementById('modalMainImage');
    if (data.images && data.images.length > 0) {
      mainImage.src = data.images[0].url; mainImage.alt = data.images[0].alt || data.name; // FIXED
      if (data.images.length > 1) { populateThumbnails(data.images); } else { document.getElementById('modalThumbs').innerHTML = ''; }
    } else {
      mainImage.src = '/img/placeholder-catalog.png'; mainImage.alt = 'No image available';
      document.getElementById('modalThumbs').innerHTML = '';
    }

    const downloadBtn = document.getElementById('modalDownloadBtn');
    const previewBtn  = document.getElementById('modalPreviewBtn');
    if (data.file_url) {
      downloadBtn.onclick = () => downloadFile(data.file_url, `${data.name}.${data.file_type}`, data.id); // FIXED
      previewBtn.onclick  = () => previewFile(data.file_url, data.id);
      downloadBtn.disabled = false; previewBtn.disabled = false;
    } else {
      downloadBtn.disabled = true; previewBtn.disabled = true;
      downloadBtn.onclick = null; previewBtn.onclick = null;
    }
  }

  function populateThumbnails(images) {
    const thumbsContainer = document.getElementById('modalThumbs');
    thumbsContainer.innerHTML = '';
    images.forEach((image, index) => {
      const thumbDiv = document.createElement('div');
      thumbDiv.className = `thumb-item ${index === 0 ? 'active' : ''}`;
      thumbDiv.innerHTML = `<img src="${image.url}" alt="${image.alt || ''}">`;
      thumbDiv.onclick = () => {
        const main = document.getElementById('modalMainImage');
        main.src = image.url; main.alt = image.alt || '';
        thumbsContainer.querySelectorAll('.thumb-item').forEach(i => i.classList.remove('active'));
        thumbDiv.classList.add('active');
      };
      thumbsContainer.appendChild(thumbDiv);
    });
  }

  function showModal() {
    const modal = document.getElementById('detailModal');
    modal.classList.add('active');
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
    const focusable = modal.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
    focusable.length && focusable[0].focus();
  }
  window.closeDetailModal = () => {
    const modal = document.getElementById('detailModal');
    modal.classList.remove('active');
    modal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
    currentModalData = null;
  };
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && document.getElementById('detailModal')?.classList.contains('active')) {
      window.closeDetailModal();
    }
  });

  function downloadFile(url, filename, itemId) {
    const link = document.createElement('a');
    link.href = url; link.download = filename;
    document.body.appendChild(link); link.click(); document.body.removeChild(link);
    trackAction(itemId, 'download');
  }
  function previewFile(url, itemId) {
    window.open(url, '_blank', 'noopener,noreferrer');
    trackAction(itemId, 'preview');
  }
  function trackAction(itemId, action) {
    fetch(`/catalog/track-${action}`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
      },
      body: JSON.stringify({ item_id: itemId, action })
    }).then(r => { if (!r.ok) console.warn(`Failed to track ${action}`); })
      .catch(err => console.warn(`Error tracking ${action}:`, err));
  }
  function getFileIcon(fileType) {
    const iconMap = { pdf:'pdf', doc:'word', docx:'word', xls:'excel', xlsx:'excel', ppt:'powerpoint', pptx:'powerpoint' };
    return iconMap[(fileType||'').toLowerCase()] || 'file';
  }
}); // end DOMContentLoaded

/* ========= STYLE INJECTION (TERAKHIR) — THEME-SAFE =========
   - Pakai CSS variable --title-color
   - Override saat dark mode (cover berbagai varian selector)
   - Tanpa JS “paksa warna inline” supaya auto ikut toggle
*/
(function injectTitleStylesAtEnd(){
  // Bersihkan style lama
  document.querySelectorAll(
    'style#catalog-style-bundle, style#catalog-title-style, style#catalog-title-style-v2, style[data-style-block="catalog-title"]'
  ).forEach(n => n.remove());

  function doInject(){
    const style = document.createElement('style');
    style.id = 'catalog-style-bundle';
    style.setAttribute('data-style-block', 'catalog-title');

    style.textContent = `
      /* ============ THEME TOKENS ============ */
      :root { --title-color: #0f172a; }              /* default (light) */
      :root[data-theme="dark"],
      :root[data-bs-theme="dark"],
      html.dark, html.dark-mode, html.theme-dark, html.night,
      body.dark, body.dark-mode, body.theme-dark, body.night {
        --title-color: #ffffff;
      }
      @media (prefers-color-scheme: dark) {
        :root:not([data-theme="light"]):not([data-bs-theme="light"]):not(.theme-force-light) {
          --title-color: #ffffff;
        }
      }

      /* util */
      .aos-element{opacity:0; transform:translateY(30px); transition:all .8s cubic-bezier(.25,.46,.45,.94)}
      .aos-element.aos-animate{opacity:1; transform:translateY(0)}
      @keyframes heartBeat{0%,100%{transform:scale(1)}25%{transform:scale(1.3)}50%{transform:scale(1.1)}75%{transform:scale(1.2)}}
      @keyframes pulse{0%{transform:scale(1)}50%{transform:scale(1.05)}100%{transform:scale(1)}}

      .catalog-row::before, .td-card::before, .cat-card::before, .std-card::before, .results-card::after { pointer-events:none !important; }
      .catalog-row .cta-enhanced, .catalog-row .cta-enhanced .btn, .catalog-row form.inline-form button { pointer-events:auto; position:relative; z-index:50; }

      .catalog-list-section .container{max-width:1320px; padding-inline:12px;}
      @media (min-width:1536px){ .catalog-list-section .container{ max-width:1440px } }
      .catalog-list-section .content{ gap:12px; }
      .catalog-list-section .topline{ gap:12px; }

      /* ===== TITLE UPGRADE (pakai var warna) ===== */
      .catalog-list-section article.catalog-row .content > .title,
      .catalog-list-section article.catalog-row h3.title,
      .catalog-list-section .catalog-row .content .title{
        --title-size: clamp(1.8rem, 1.15vw + 1.25rem, 2.7rem);
        font-size: var(--title-size) !important;
        font-weight: 800 !important;
        line-height: 1.15 !important;
        letter-spacing: -0.015em !important;
        margin: 4px 0 12px !important;
        color: var(--title-color) !important; /* <= di sini kuncinya */
        text-wrap: balance;
        overflow-wrap: anywhere;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
      }

      /* Paksa <a> di dalam title mewarisi font & warna judul */
      .catalog-list-section article.catalog-row .content > .title > a,
      .catalog-list-section article.catalog-row h3.title > a,
      .catalog-list-section .catalog-row .content .title > a{
        font: inherit !important;
        letter-spacing: inherit !important;
        color: inherit !important;          /* inherit -> ikut var */
        text-decoration: none !important;
        display: inline;
        position: relative;
        transition: color .25s ease, transform .18s ease;
      }

      /* underline anim */
      .catalog-list-section article.catalog-row .content > .title > a::after,
      .catalog-list-section article.catalog-row h3.title > a::after,
      .catalog-list-section .catalog-row .content .title > a::after{
        content: "";
        position: absolute;
        left: 0; bottom: -2px;
        width: 100%; height: 3px;
        background: linear-gradient(120deg, var(--brand,#7c3aed), var(--brand-3,#22d3ee));
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .25s ease;
        border-radius: 3px;
      }
      .catalog-list-section article.catalog-row .content > .title > a:hover::after,
      .catalog-list-section article.catalog-row h3.title > a:hover::after,
      .catalog-list-section .catalog-row .content .title > a:hover::after{
        transform: scaleX(1);
      }
      .catalog-list-section article.catalog-row .content > .title > a:hover,
      .catalog-list-section article.catalog-row h3.title > a:hover,
      .catalog-list-section .catalog-row .content .title > a:hover{
        color: var(--brand,#7c3aed) !important;
        transform: translateY(-1px);
      }

      /* clamp 2 baris di layar >= md */
      @media (min-width:768px){
        .catalog-list-section article.catalog-row .content > .title,
        .catalog-list-section article.catalog-row h3.title,
        .catalog-list-section .catalog-row .content .title{
          display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
        }
      }
      /* ukuran title di mobile */
      @media (max-width:767.98px){
        .catalog-list-section article.catalog-row .content > .title,
        .catalog-list-section article.catalog-row h3.title,
        .catalog-list-section .catalog-row .content .title{
          --title-size: clamp(1.55rem, 2.8vw + 1rem, 2.25rem) !important;
        }
      }
    `;
    document.head.appendChild(style);
  }

  if (document.readyState === 'complete') doInject();
  else window.addEventListener('load', doInject);
})();
</script>

<script>
(function(){
  // Selector judul yg dipakai di markup kamu
  const TITLE_SEL = `
    .catalog-list-section article.catalog-row .content > .title,
    .catalog-list-section article.catalog-row h3.title,
    .catalog-list-section .catalog-row .content .title,
    .catalog-list-section article.catalog-row .content > .title > a,
    .catalog-list-section article.catalog-row h3.title > a,
    .catalog-list-section .catalog-row .content .title > a
  `;

  const STYLE_ID = 'catalog-title-nuke-style';

  function applyTitleColorFromBody(){
    // warna teks yg berlaku saat ini (ikut tema apa pun yg kamu pakai)
    const bodyColor = getComputedStyle(document.body).color || '#0f172a';

    // buang style lama (kalau ada)
    document.getElementById(STYLE_ID)?.remove();

    // buat style baru yg memaksa color judul == warna body
    const style = document.createElement('style');
    style.id = STYLE_ID;
    style.textContent = `
      ${TITLE_SEL} { color: ${bodyColor} !important; }
    `;
    document.head.appendChild(style);

    // bersihkan inline color yg mungkin ngunci
    document.querySelectorAll(TITLE_SEL).forEach(el => {
      if (el.style && el.style.color) el.style.removeProperty('color');
    });
  }

  // Jalankan awal
  applyTitleColorFromBody();

  // Re-apply saat DOM berubah (ajax/pagination/theme toggle class/attr)
  const mo = new MutationObserver(() => applyTitleColorFromBody());
  mo.observe(document.documentElement, {
    attributes: true,
    attributeFilter: ['class','style','data-theme','data-bs-theme'],
    subtree: true
  });
  mo.observe(document.body, {
    attributes: true,
    attributeFilter: ['class','style','data-theme','data-bs-theme'],
    childList: true,
    subtree: true
  });

  // Re-apply saat prefers-color-scheme berubah (kalau browser user ikut OS)
  if (window.matchMedia) {
    const mq = window.matchMedia('(prefers-color-scheme: dark)');
    mq.addEventListener?.('change', applyTitleColorFromBody);
  }

  // Safety: re-apply setelah semua stylesheet late-load
  window.addEventListener('load', applyTitleColorFromBody);

  // Hapus style injection lama yang bisa bentrok (kalau ada)
  ['catalog-title-style','catalog-title-style-v2','catalog-style-bundle','catalog-title-hotfix']
    .forEach(id => document.getElementById(id)?.remove());
})();
</script>

<style>
/* Overlay */
.custom-alert {
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.6);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;
}
.custom-alert.hidden { display: none; }

/* Box */
.custom-alert-box {
  background: #5a0c0c; /* merah tua */
  color: #fff;
  padding: 2rem;
  border-radius: 1rem;
  text-align: center;
  max-width: 350px;
  width: 90%;
  animation: pop 0.3s ease-out;
  box-shadow: 0 8px 24px rgba(0,0,0,0.4);
}

/* Icon */
.custom-alert-icon {
  font-size: 3rem;
  display: block;
  margin-bottom: 1rem;
}

/* Button */
#close-alert {
  background: #fff;
  color: #5a0c0c;
  border: none;
  padding: 0.6rem 1.2rem;
  border-radius: 0.5rem;
  cursor: pointer;
  font-weight: bold;
  margin-top: 1rem;
  transition: background 0.2s;
}
#close-alert:hover {
  background: #f5f5f5;
}

/* Animation */
@keyframes pop {
  0% { transform: scale(0.8); opacity: 0; }
  100% { transform: scale(1); opacity: 1; }
}
</style>

<script>
document.getElementById("nl-form").addEventListener("submit", function(e){
  e.preventDefault();
  // tampilkan modal
  document.getElementById("custom-alert").classList.remove("hidden");
});

// tombol close
document.getElementById("close-alert").addEventListener("click", function(){
  document.getElementById("custom-alert").classList.add("hidden");
});
</script>
@endsection
