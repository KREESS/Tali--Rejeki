@extends('en.components.layout')

@section('title', $title)

@section('content')
<!-- Hero Section with Job Header -->
<section class="job-hero-section">
    <div class="hero-bg">
        <div class="hero-pattern"></div>
        <div class="hero-gradient"></div>
    </div>
    
    <div class="container-fluid px-4">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">
                        <i class="fas fa-home"></i> Beranda
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('career') }}">Karier</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $job->title }}</li>
            </ol>
        </nav>

        <!-- Main Job Grid -->
        <div class="job-grid-container">
            <!-- Job Header Card -->
            <div class="job-header-card" data-aos="fade-up">
                <div class="job-badges">
                    <span class="job-badge primary">{{ $job->employment_type ?? 'Full Time' }}</span>
                    @if($job->remote_policy)
                    <span class="job-badge secondary">{{ $job->remote_policy }}</span>
                    @endif
                    <span class="job-badge success">
                        <i class="fas fa-check-circle"></i> Aktif
                    </span>
                </div>

                <h1 class="job-title">{{ $job->title }}</h1>
                <p class="job-subtitle">{{ $job->department ?? 'General' }} • {{ $job->location ?? 'Jakarta' }}</p>

                <!-- Job Info Grid -->
                <div class="job-info-grid">
                    @if($job->salary_display)
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <div class="info-content">
                            <span class="info-label">Gaji</span>
                            <span class="info-value">{{ $job->salary_display }}</span>
                        </div>
                    </div>
                    @endif
                    
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="info-content">
                            <span class="info-label">Diposting</span>
                            <span class="info-value">{{ $job->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    
                    @if($job->close_at)
                    <div class="info-card {{ $job->close_at->isPast() ? 'expired' : 'urgent' }}">
                        <div class="info-icon">
                            <i class="fas {{ $job->close_at->isPast() ? 'fa-calendar-times' : 'fa-calendar-times' }}"></i>
                        </div>
                        <div class="info-content">
                            <span class="info-label">Batas Lamar</span>
                            <span class="info-value">
                                {{ $job->close_at->format('d M Y') }}
                                @if($job->close_at->isPast())
                                    <span class="expired-badge">BERAKHIR</span>
                                @endif
                            </span>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Apply Card -->
            <div class="apply-card" data-aos="fade-up" data-aos-delay="100">
                <div class="apply-header">
                    <h3>
                        <i class="fas {{ $job->close_at && $job->close_at->isPast() ? 'fa-exclamation-triangle' : 'fa-rocket' }}"></i>
                        {{ $job->close_at && $job->close_at->isPast() ? 'Lamaran Ditutup' : 'Lamar Sekarang' }}
                    </h3>
                    <p>
                        @if($job->close_at && $job->close_at->isPast())
                            Maaf, batas waktu lamaran untuk posisi ini telah berakhir
                        @else
                            Jangan lewatkan kesempatan untuk bergabung dengan tim kami
                        @endif
                    </p>
                </div>
                
                <div class="apply-buttons">
                    @if($job->close_at && $job->close_at->isPast())
                        <!-- Disabled apply buttons when deadline passed -->
                        <div class="btn-apply disabled">
                            <i class="fas fa-times-circle"></i>
                            <span>Lamaran Ditutup</span>
                        </div>
                        <p class="deadline-notice">
                            <i class="fas fa-info-circle"></i>
                            Batas lamaran berakhir pada {{ $job->close_at->format('d M Y') }}
                        </p>
                    @else
                        <!-- Active apply buttons -->
                        @if($job->apply_url)
                        <a href="{{ $job->apply_url }}" target="_blank" class="btn-apply primary">
                            <i class="fas fa-external-link-alt"></i>
                            <span>Lamar via Portal</span>
                        </a>
                        @elseif($job->apply_email)
                        <a href="mailto:{{ $job->apply_email }}?subject=Lamaran untuk {{ $job->title }}" class="btn-apply primary">
                            <i class="fas fa-envelope"></i>
                            <span>Kirim Email</span>
                        </a>
                        @else
                        <a href="#apply-form" class="btn-apply primary">
                            <i class="fas fa-paper-plane"></i>
                            <span>Lamar Sekarang</span>
                        </a>
                        @endif
                    @endif
                    
                    <a href="{{ route('career') }}" class="btn-apply secondary">
                        <i class="fas fa-arrow-left"></i>
                        <span>Kembali ke Karier</span>
                    </a>
                </div>

                <!-- Share Section -->
                <div class="share-section">
                    <h6>Bagikan lowongan ini:</h6>
                    <div class="share-buttons">
                        @if(!($job->close_at && $job->close_at->isPast()))
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="share-btn facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode('Lowongan: ' . $job->title . ' di Tali Rejeki') }}" target="_blank" class="share-btn twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}" target="_blank" class="share-btn linkedin">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode('Lowongan: ' . $job->title . ' di Tali Rejeki - ' . request()->fullUrl()) }}" target="_blank" class="share-btn whatsapp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        @else
                            <p class="share-disabled">
                                <i class="fas fa-info-circle"></i>
                                Sharing tidak tersedia karena lamaran telah ditutup
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content Grid -->
<section class="job-content-section">
    <div class="container-fluid px-4">
        <div class="content-grid">
            <!-- Job Description -->
            <div class="content-main" data-aos="fade-up">
                @if($job->summary)
                <div class="content-card summary-card">
                    <div class="card-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <div class="card-content">
                        <h3>Ringkasan Pekerjaan</h3>
                        <p>{{ $job->summary }}</p>
                    </div>
                </div>
                @endif

                <div class="content-card description-card">
                    <div class="card-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="card-content">
                        <h3>Deskripsi & Persyaratan</h3>
                        <div class="job-description">
                            @if($job->description_html)
                                {!! $job->description_html !!}
                            @else
                                <p>{{ $job->summary ?? 'Deskripsi pekerjaan akan segera diperbarui.' }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Content -->
            <div class="content-sidebar" data-aos="fade-up" data-aos-delay="200">
                <!-- Company Card -->
                <div class="sidebar-card company-card">
                    <div class="company-logo">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="company-info">
                        <h4>Tali Rejeki</h4>
                        <p>Distributor insulasi industri terpercaya dengan pengalaman puluhan tahun melayani kebutuhan industri di seluruh Indonesia.</p>
                        
                        <div class="company-stats">
                            <div class="stat">
                                <span class="stat-number">14+</span>
                                <span class="stat-label">Tahun</span>
                            </div>
                            <div class="stat">
                                <span class="stat-number">500+</span>
                                <span class="stat-label">Proyek</span>
                            </div>
                            <div class="stat">
                                <span class="stat-number">100+</span>
                                <span class="stat-label">Karyawan</span>
                            </div>
                        </div>
                        
                        <a href="{{ route('about') }}" class="btn-link">
                            <i class="fas fa-arrow-right"></i>
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>

                <!-- Requirements Card -->
                <div class="sidebar-card requirements-card">
                    <div class="card-header">
                        <i class="fas fa-clipboard-check"></i>
                        <h4>Dokumen yang Diperlukan</h4>
                    </div>
                    <div class="requirements-list">
                        <div class="requirement-item">
                            <i class="fas fa-file-pdf"></i>
                            <span>CV terbaru (PDF)</span>
                        </div>
                        <div class="requirement-item">
                            <i class="fas fa-file-alt"></i>
                            <span>Surat lamaran</span>
                        </div>
                        <div class="requirement-item">
                            <i class="fas fa-graduation-cap"></i>
                            <span>Fotocopy ijazah</span>
                        </div>
                        <div class="requirement-item">
                            <i class="fas fa-user-circle"></i>
                            <span>Pas foto terbaru</span>
                        </div>
                        <div class="requirement-item optional">
                            <i class="fas fa-briefcase"></i>
                            <span>Portofolio (opsional)</span>
                        </div>
                    </div>
                </div>

                <!-- Other Jobs -->
                @php
                    $otherJobs = App\Models\Job::open()
                        ->where('id', '!=', $job->id)
                        ->latest()
                        ->take(3)
                        ->get();
                @endphp
                
                @if($otherJobs->count() > 0)
                <div class="sidebar-card other-jobs-card">
                    <div class="card-header">
                        <i class="fas fa-briefcase"></i>
                        <h4>Lowongan Lainnya</h4>
                    </div>
                    <div class="jobs-list">
                        @foreach($otherJobs as $otherJob)
                        <a href="{{ route('job.detail', $otherJob->slug) }}" class="job-item">
                            <div class="job-info">
                                <h5>{{ $otherJob->title }}</h5>
                                <div class="job-meta">
                                    <span class="location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{ $otherJob->location ?? 'Jakarta' }}
                                    </span>
                                    <span class="type">{{ $otherJob->employment_type ?? 'Full Time' }}</span>
                                </div>
                            </div>
                            <div class="job-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    
                    <a href="{{ route('career') }}" class="view-all-btn">
                        <i class="fas fa-eye"></i>
                        Lihat Semua Lowongan
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="cta-bg">
        <div class="cta-pattern"></div>
    </div>
    <div class="container-fluid px-4">
        <div class="cta-content" data-aos="zoom-in">
            <div class="cta-icon">
                <i class="fas fa-paper-plane"></i>
            </div>
            <h3>Tidak menemukan posisi yang sesuai?</h3>
            <p>Kirim CV Anda kepada kami. Tim HR akan menghubungi ketika ada posisi yang sesuai dengan kualifikasi Anda.</p>
            <a href="{{ route('contact') }}" class="cta-btn">
                <i class="fas fa-envelope"></i>
                <span>Kirim CV Inisiatif</span>
            </a>
        </div>
    </div>
</section>

<style>
/* Modern Job Detail Styles */
:root {
    --job-primary-color: #8B0000;
    --job-secondary-color: #DC143C;
    --job-accent-color: #FF6B6B;
    --job-text-primary: #2d3748;
    --job-text-secondary: #718096;
    --job-bg-primary: #ffffff;
    --job-bg-secondary: #f7fafc;
    --job-border-color: #e2e8f0;
    --job-shadow: rgba(0, 0, 0, 0.1);
    --job-shadow-lg: rgba(0, 0, 0, 0.15);
    --job-radius: 16px;
    --job-radius-lg: 24px;
}

/* Dark Theme Variables */
body.dark-theme {
    --job-text-primary: #f7fafc;
    --job-text-secondary: #a0aec0;
    --job-bg-primary: #1a202c;
    --job-bg-secondary: #2d3748;
    --job-border-color: #4a5568;
    --job-shadow: rgba(0, 0, 0, 0.3);
    --job-shadow-lg: rgba(0, 0, 0, 0.4);
}

/* Light Theme Variables */
body.light-theme {
    --job-text-primary: #2d3748;
    --job-text-secondary: #718096;
    --job-bg-primary: #ffffff;
    --job-bg-secondary: #f7fafc;
    --job-border-color: #e2e8f0;
    --job-shadow: rgba(0, 0, 0, 0.1);
    --job-shadow-lg: rgba(0, 0, 0, 0.15);
}

/* Hero Section */
.job-hero-section {
    position: relative;
    padding: 24px 0 48px;
    background: transparent;
}

.hero-bg {
    display: none;
}

.hero-pattern {
    display: none;
}

.hero-gradient {
    display: none;
}

/* Breadcrumb */
.breadcrumb {
    background: transparent;
    padding: 0;
    margin-bottom: 24px;
    position: relative;
    z-index: 10;
}

.breadcrumb-item a {
    color: var(--job-text-secondary);
    text-decoration: none;
    font-weight: 500;
    font-size: 13px;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 6px;
}

.breadcrumb-item a:hover {
    color: var(--job-primary-color);
    transform: translateX(4px);
}

.breadcrumb-item.active {
    color: var(--job-text-primary);
    font-weight: 600;
    font-size: 13px;
}

/* Job Grid Container */
.job-grid-container {
    display: grid;
    grid-template-columns: 1fr 400px;
    gap: 32px;
    position: relative;
    z-index: 10;
}

/* Job Header Card */
.job-header-card {
    background: var(--job-bg-primary);
    border-radius: var(--job-radius-lg);
    padding: 28px;
    box-shadow: 0 8px 30px var(--job-shadow);
    border: 1px solid var(--job-border-color);
    position: relative;
    overflow: hidden;
}

.job-header-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(135deg, var(--job-primary-color), var(--job-secondary-color));
}

.job-badges {
    display: flex;
    gap: 12px;
    margin-bottom: 24px;
    flex-wrap: wrap;
}

.job-badge {
    padding: 6px 12px;
    border-radius: 16px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: flex;
    align-items: center;
    gap: 4px;
}

.job-badge.primary {
    background: linear-gradient(135deg, var(--job-primary-color), var(--job-secondary-color));
    color: white;
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.2);
}

.job-badge.secondary {
    background: linear-gradient(135deg, #17a2b8, #20c997);
    color: white;
    box-shadow: 0 4px 15px rgba(23, 162, 184, 0.2);
}

.job-badge.success {
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
    box-shadow: 0 4px 15px rgba(40, 167, 69, 0.2);
}

.job-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--job-text-primary);
    margin: 0 0 10px 0;
    line-height: 1.2;
    background: linear-gradient(135deg, var(--job-primary-color), var(--job-secondary-color));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.job-subtitle {
    font-size: 0.95rem;
    color: var(--job-text-secondary);
    margin-bottom: 24px;
    font-weight: 500;
}

.job-info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 16px;
}

.info-card {
    background: var(--job-bg-secondary);
    padding: 16px;
    border-radius: var(--job-radius);
    border: 1px solid var(--job-border-color);
    display: flex;
    align-items: center;
    gap: 12px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.info-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 3px;
    height: 100%;
    background: linear-gradient(135deg, var(--job-primary-color), var(--job-secondary-color));
    transform: scaleY(0);
    transition: transform 0.3s ease;
}

.info-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 25px var(--job-shadow-lg);
    background: var(--job-bg-primary);
}

.info-card:hover::before {
    transform: scaleY(1);
}

.info-card.urgent {
    border-color: var(--job-secondary-color);
    background: rgba(220, 20, 60, 0.05);
}

.info-card.expired {
    border-color: #dc3545;
    background: rgba(220, 53, 69, 0.05);
    opacity: 0.8;
}

.info-card.expired .info-icon {
    background: linear-gradient(135deg, #dc3545, #c82333);
}

.expired-badge {
    display: inline-block;
    background: #dc3545;
    color: white;
    padding: 2px 6px;
    border-radius: 4px;
    font-size: 9px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-left: 6px;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% { opacity: 1; }
    50% { opacity: 0.7; }
    100% { opacity: 1; }
}

.info-icon {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, var(--job-primary-color), var(--job-secondary-color));
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1rem;
    flex-shrink: 0;
    box-shadow: 0 3px 12px rgba(139, 0, 0, 0.2);
}

.info-content {
    flex: 1;
}

.info-label {
    display: block;
    font-size: 10px;
    color: var(--job-text-secondary);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    margin-bottom: 3px;
}

.info-value {
    display: block;
    font-weight: 700;
    color: var(--job-text-primary);
    font-size: 13px;
}

/* Apply Card */
.apply-card {
    background: var(--job-bg-primary);
    border-radius: var(--job-radius-lg);
    box-shadow: 0 10px 40px var(--job-shadow);
    border: 1px solid var(--job-border-color);
    position: sticky;
    top: 32px;
    overflow: hidden;
}

.apply-card.expired {
    opacity: 0.9;
    border-color: #dc3545;
}

.apply-header {
    background: linear-gradient(135deg, var(--job-primary-color), var(--job-secondary-color));
    color: white;
    padding: 20px;
    position: relative;
}

.apply-header.expired {
    background: linear-gradient(135deg, #6c757d, #dc3545);
}

.apply-header::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50px;
    width: 200px;
    height: 200%;
    background: rgba(255, 255, 255, 0.1);
    transform: rotate(15deg);
}

.apply-header h3 {
    margin: 0 0 6px 0;
    font-size: 1.1rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 10px;
    position: relative;
    z-index: 2;
}

.apply-header p {
    margin: 0;
    opacity: 0.9;
    font-size: 13px;
    position: relative;
    z-index: 2;
}

.apply-buttons {
    padding: 20px;
}

.btn-apply {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 12px 20px;
    border-radius: 10px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    width: 100%;
    margin-bottom: 10px;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    position: relative;
    overflow: hidden;
}

.btn-apply::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.btn-apply:hover::before {
    left: 100%;
}

.btn-apply.primary {
    background: linear-gradient(135deg, var(--job-primary-color), var(--job-secondary-color));
    color: white;
    box-shadow: 0 6px 20px rgba(139, 0, 0, 0.3);
}

.btn-apply.primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(139, 0, 0, 0.4);
    color: white;
}

.btn-apply.secondary {
    background: transparent;
    color: var(--job-text-secondary);
    border: 2px solid var(--job-border-color);
}

.btn-apply.secondary:hover {
    background: var(--job-bg-secondary);
    color: var(--job-text-primary);
    transform: translateY(-2px);
}

.btn-apply.disabled {
    background: #6c757d;
    color: white;
    cursor: not-allowed;
    opacity: 0.8;
    pointer-events: none;
}

.deadline-notice {
    background: rgba(220, 53, 69, 0.1);
    color: #dc3545;
    padding: 10px 12px;
    border-radius: 8px;
    font-size: 12px;
    margin: 10px 0 0 0;
    display: flex;
    align-items: center;
    gap: 6px;
    border: 1px solid rgba(220, 53, 69, 0.2);
}

.share-disabled {
    color: var(--job-text-secondary);
    font-size: 11px;
    font-style: italic;
    display: flex;
    align-items: center;
    gap: 6px;
    margin: 0;
    opacity: 0.7;
}

.share-section {
    padding: 0 20px 20px;
    border-top: 1px solid var(--job-border-color);
    margin-top: 14px;
    padding-top: 16px;
}

.share-section h6 {
    font-size: 11px;
    color: var(--job-text-secondary);
    margin-bottom: 10px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.share-buttons {
    display: flex;
    gap: 6px;
}

.share-btn {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 14px;
}

.share-btn:hover {
    transform: translateY(-3px) scale(1.1);
    color: white;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
}

.share-btn.facebook { background: #1877f2; }
.share-btn.twitter { background: #1da1f2; }
.share-btn.linkedin { background: #0077b5; }
.share-btn.whatsapp { background: #25d366; }

/* Main Content Section */
.job-content-section {
    padding: 48px 0;
    background: transparent;
}

.content-grid {
    display: grid;
    grid-template-columns: 1fr 320px;
    gap: 32px;
}

/* Content Cards */
.content-card {
    background: var(--job-bg-primary);
    border-radius: var(--job-radius-lg);
    padding: 24px;
    box-shadow: 0 6px 25px var(--job-shadow);
    border: 1px solid var(--job-border-color);
    margin-bottom: 20px;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.content-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 40px var(--job-shadow-lg);
}

.content-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(135deg, var(--job-primary-color), var(--job-secondary-color));
}

.card-icon {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, var(--job-primary-color), var(--job-secondary-color));
    border-radius: var(--job-radius);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    margin-bottom: 16px;
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.2);
}

.card-content h3 {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--job-text-primary);
    margin-bottom: 14px;
    position: relative;
    padding-bottom: 10px;
}

.card-content h3::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 40px;
    height: 3px;
    background: linear-gradient(135deg, var(--job-primary-color), var(--job-secondary-color));
    border-radius: 2px;
}

.job-description {
    color: var(--job-text-secondary);
    line-height: 1.6;
    font-size: 14px;
}

.job-description h5 {
    color: var(--job-text-primary);
    font-weight: 700;
    margin: 20px 0 12px 0;
    font-size: 1rem;
    display: flex;
    align-items: center;
    gap: 6px;
}

.job-description h5::before {
    content: '';
    width: 3px;
    height: 20px;
    background: linear-gradient(135deg, var(--job-primary-color), var(--job-secondary-color));
    border-radius: 2px;
}

.job-description ul {
    margin: 16px 0;
    padding-left: 0;
    list-style: none;
}

.job-description li {
    margin-bottom: 10px;
    padding-left: 20px;
    position: relative;
    color: var(--job-text-secondary);
    line-height: 1.5;
}

.job-description li::before {
    content: '✓';
    position: absolute;
    left: 0;
    top: 0;
    width: 16px;
    height: 16px;
    background: linear-gradient(135deg, var(--job-primary-color), var(--job-secondary-color));
    border-radius: 50%;
    color: white;
    font-size: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}

/* Sidebar */
.content-sidebar {
    display: flex;
    flex-direction: column;
    gap: 24px;
}

.sidebar-card {
    background: var(--job-bg-primary);
    border-radius: var(--job-radius);
    padding: 20px;
    box-shadow: 0 5px 20px var(--job-shadow);
    border: 1px solid var(--job-border-color);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.sidebar-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 3px;
    background: linear-gradient(135deg, var(--job-primary-color), var(--job-secondary-color));
}

.sidebar-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 35px var(--job-shadow-lg);
}

/* Company Card */
.company-logo {
    width: 56px;
    height: 56px;
    background: linear-gradient(135deg, var(--job-primary-color), var(--job-secondary-color));
    border-radius: var(--job-radius);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    margin-bottom: 16px;
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.2);
}

.company-info h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--job-text-primary);
    margin-bottom: 10px;
}

.company-info p {
    color: var(--job-text-secondary);
    line-height: 1.5;
    margin-bottom: 16px;
    font-size: 13px;
}

.company-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
    margin: 16px 0;
}

.stat {
    text-align: center;
    padding: 12px 6px;
    background: var(--job-bg-secondary);
    border-radius: 10px;
    border: 1px solid var(--job-border-color);
    transition: all 0.3s ease;
}

.stat:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px var(--job-shadow);
}

.stat-number {
    display: block;
    font-size: 1.3rem;
    font-weight: 800;
    background: linear-gradient(135deg, var(--job-primary-color), var(--job-secondary-color));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.stat-label {
    font-size: 10px;
    color: var(--job-text-secondary);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.btn-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: var(--job-primary-color);
    text-decoration: none;
    font-weight: 600;
    font-size: 13px;
    transition: all 0.3s ease;
}

.btn-link:hover {
    color: var(--job-secondary-color);
    transform: translateX(4px);
}

/* Requirements Card */
.card-header {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 16px;
}

.card-header i {
    color: var(--job-primary-color);
    font-size: 1.1rem;
}

.card-header h4 {
    font-size: 1rem;
    font-weight: 700;
    color: var(--job-text-primary);
    margin: 0;
}

.requirements-list {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.requirement-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 14px;
    background: var(--job-bg-secondary);
    border-radius: 8px;
    border: 1px solid var(--job-border-color);
    transition: all 0.3s ease;
}

.requirement-item:hover {
    transform: translateX(4px);
    background: var(--job-bg-primary);
    box-shadow: 0 4px 15px var(--job-shadow);
}

.requirement-item.optional {
    opacity: 0.7;
    border-style: dashed;
}

.requirement-item i {
    color: var(--job-primary-color);
    font-size: 1rem;
    width: 18px;
    text-align: center;
}

.requirement-item span {
    font-size: 12px;
    color: var(--job-text-secondary);
    font-weight: 500;
}

/* Other Jobs */
.jobs-list {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-bottom: 16px;
}

.job-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px;
    background: var(--job-bg-secondary);
    border-radius: 10px;
    border: 1px solid var(--job-border-color);
    text-decoration: none;
    transition: all 0.3s ease;
}

.job-item:hover {
    transform: translateX(8px);
    background: var(--job-bg-primary);
    box-shadow: 0 6px 20px var(--job-shadow);
    text-decoration: none;
}

.job-info {
    flex: 1;
}

.job-info h5 {
    font-size: 13px;
    font-weight: 600;
    color: var(--job-text-primary);
    margin: 0 0 4px 0;
}

.job-meta {
    display: flex;
    gap: 10px;
    font-size: 10px;
    color: var(--job-text-secondary);
}

.job-meta i {
    margin-right: 4px;
}

.job-arrow {
    color: var(--job-text-secondary);
    font-size: 11px;
    transition: all 0.3s ease;
}

.job-item:hover .job-arrow {
    color: var(--job-primary-color);
    transform: translateX(4px);
}

.view-all-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 10px 16px;
    background: transparent;
    color: var(--job-primary-color);
    border: 2px solid var(--job-primary-color);
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    font-size: 12px;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.view-all-btn:hover {
    background: var(--job-primary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(139, 0, 0, 0.3);
    text-decoration: none;
}

/* Benefits & Process Section */
.benefits-process-section {
    padding: 60px 0;
    background: var(--job-bg-secondary);
}

.benefits-process-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
}

/* Benefits Card */
.benefits-card {
    background: var(--job-bg-primary);
    border-radius: var(--job-radius-lg);
    padding: 32px;
    box-shadow: 0 10px 40px var(--job-shadow);
    border: 1px solid var(--job-border-color);
    position: relative;
    overflow: hidden;
}

.benefits-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(135deg, var(--job-primary-color), var(--job-secondary-color));
}

.benefits-card .card-header {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 28px;
}

.header-icon {
    width: 56px;
    height: 56px;
    background: linear-gradient(135deg, var(--job-primary-color), var(--job-secondary-color));
    border-radius: var(--job-radius);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    box-shadow: 0 6px 20px rgba(139, 0, 0, 0.2);
}

.benefits-card h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--job-text-primary);
    margin: 0;
}

.benefits-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
}

.benefit-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 18px;
    background: var(--job-bg-secondary);
    border-radius: 12px;
    border: 1px solid var(--job-border-color);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.benefit-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 3px;
    height: 100%;
    background: linear-gradient(135deg, var(--job-primary-color), var(--job-secondary-color));
    transform: scaleY(0);
    transition: transform 0.3s ease;
}

.benefit-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px var(--job-shadow);
    background: var(--job-bg-primary);
}

.benefit-item:hover::before {
    transform: scaleY(1);
}

.benefit-icon {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, var(--job-primary-color), var(--job-secondary-color));
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.1rem;
    flex-shrink: 0;
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.2);
}

.benefit-content h6 {
    font-size: 14px;
    font-weight: 600;
    color: var(--job-text-primary);
    margin: 0 0 4px 0;
}

.benefit-content p {
    font-size: 12px;
    color: var(--job-text-secondary);
    margin: 0;
    line-height: 1.4;
}

/* Process Card */
.process-card {
    background: var(--job-bg-primary);
    border-radius: var(--job-radius-lg);
    padding: 32px;
    box-shadow: 0 10px 40px var(--job-shadow);
    border: 1px solid var(--job-border-color);
    position: relative;
    overflow: hidden;
}

.process-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(135deg, var(--job-primary-color), var(--job-secondary-color));
}

.process-card h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--job-text-primary);
    margin: 0;
}

.process-steps {
    display: flex;
    flex-direction: column;
    gap: 20px;
    margin-top: 28px;
}

.process-step {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    padding: 20px;
    background: var(--job-bg-secondary);
    border-radius: 12px;
    border: 1px solid var(--job-border-color);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.process-step::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 3px;
    background: linear-gradient(135deg, var(--job-primary-color), var(--job-secondary-color));
    transform: scaleX(0);
    transition: transform 0.3s ease;
}

.process-step:hover {
    transform: translateX(8px);
    box-shadow: 0 8px 25px var(--job-shadow);
    background: var(--job-bg-primary);
}

.process-step:hover::before {
    transform: scaleX(1);
}

.step-number {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, var(--job-primary-color), var(--job-secondary-color));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 700;
    font-size: 1.2rem;
    flex-shrink: 0;
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.2);
}

.step-content h6 {
    font-size: 15px;
    font-weight: 600;
    color: var(--job-text-primary);
    margin: 0 0 6px 0;
}

.step-content p {
    font-size: 13px;
    color: var(--job-text-secondary);
    margin: 0 0 8px 0;
    line-height: 1.5;
}

.duration {
    display: inline-block;
    background: linear-gradient(135deg, rgba(139, 0, 0, 0.1), rgba(220, 20, 60, 0.1));
    color: var(--job-primary-color);
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 10px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border: 1px solid rgba(139, 0, 0, 0.2);
}

/* CTA Section */
.cta-section {
    padding: 60px 0;
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, var(--job-primary-color) 0%, var(--job-secondary-color) 100%);
}

.cta-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.cta-pattern {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
        radial-gradient(circle at 25% 25%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 75% 75%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
    animation: float 20s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    33% { transform: translate(30px, -30px) rotate(1deg); }
    66% { transform: translate(-20px, 20px) rotate(-1deg); }
}

.cta-content {
    text-align: center;
    position: relative;
    z-index: 10;
    color: white;
    max-width: 600px;
    margin: 0 auto;
}

.cta-icon {
    width: 64px;
    height: 64px;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-size: 1.6rem;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.cta-content h3 {
    font-size: 1.6rem;
    font-weight: 700;
    margin-bottom: 14px;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.cta-content p {
    font-size: 14px;
    margin-bottom: 26px;
    opacity: 0.9;
    line-height: 1.5;
}

.cta-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 24px;
    background: rgba(255, 255, 255, 0.15);
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 10px;
    text-decoration: none;
    font-weight: 600;
    font-size: 13px;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.cta-btn:hover {
    background: rgba(255, 255, 255, 0.25);
    border-color: rgba(255, 255, 255, 0.5);
    transform: translateY(-4px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3);
    color: white;
    text-decoration: none;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .job-grid-container {
        grid-template-columns: 1fr 350px;
        gap: 24px;
    }
    
    .content-grid {
        grid-template-columns: 1fr 320px;
        gap: 32px;
    }
    
    .benefits-process-grid {
        gap: 32px;
    }
}

@media (max-width: 992px) {
    .job-grid-container {
        grid-template-columns: 1fr;
        gap: 32px;
    }
    
    .content-grid {
        grid-template-columns: 1fr;
        gap: 32px;
    }
    
    .benefits-process-grid {
        grid-template-columns: 1fr;
        gap: 32px;
    }
    
    .apply-card {
        position: static;
    }
    
    .job-title {
        font-size: 2rem;
    }
    
    .benefits-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }
}

@media (max-width: 768px) {
    .job-hero-section {
        padding: 30px 0 24px;
    }
    
    .job-title {
        font-size: 1.5rem;
    }
    
    .job-info-grid {
        grid-template-columns: 1fr;
        gap: 10px;
    }
    
    .info-card {
        padding: 12px;
        gap: 10px;
    }
    
    .info-icon {
        width: 36px;
        height: 36px;
        font-size: 0.9rem;
    }
    
    .content-card {
        padding: 18px;
    }
    
    .card-icon {
        width: 40px;
        height: 40px;
        font-size: 1rem;
    }
    
    .benefits-card,
    .process-card {
        padding: 18px;
    }
    
    .header-icon {
        width: 40px;
        height: 40px;
        font-size: 1.1rem;
    }
    
    .benefits-grid {
        grid-template-columns: 1fr;
        gap: 10px;
    }
    
    .benefit-item {
        padding: 12px;
        gap: 8px;
    }
    
    .benefit-icon {
        width: 32px;
        height: 32px;
        font-size: 0.9rem;
    }
    
    .process-step {
        padding: 12px;
        gap: 10px;
    }
    
    .step-number {
        width: 36px;
        height: 36px;
        font-size: 0.9rem;
    }
    
    .cta-content h3 {
        font-size: 1.3rem;
    }
    
    .cta-icon {
        width: 52px;
        height: 52px;
        font-size: 1.3rem;
    }
}

@media (max-width: 576px) {
    .container-fluid {
        padding-left: 16px !important;
        padding-right: 16px !important;
    }
    
    .job-header-card,
    .apply-card {
        padding: 18px;
    }
    
    .job-title {
        font-size: 1.3rem;
    }
    
    .job-badges {
        flex-direction: column;
        align-items: flex-start;
        gap: 6px;
    }
    
    .job-badge {
        font-size: 10px;
        padding: 5px 10px;
    }
    
    .info-card {
        flex-direction: column;
        text-align: center;
        padding: 12px;
    }
    
    .content-card {
        padding: 16px;
    }
    
    .card-content h3 {
        font-size: 1.1rem;
    }
    
    .benefits-card,
    .process-card {
        padding: 16px;
    }
    
    .benefits-card h3,
    .process-card h3 {
        font-size: 1.1rem;
    }
    
    .benefit-item {
        padding: 10px;
        flex-direction: column;
        text-align: center;
        gap: 6px;
    }
    
    .process-step {
        padding: 10px;
        flex-direction: column;
        text-align: center;
        gap: 6px;
    }
    
    .company-stats {
        grid-template-columns: 1fr;
        gap: 6px;
    }
    
    .stat {
        padding: 10px 6px;
    }
    
    .cta-content h3 {
        font-size: 1.1rem;
    }
    
    .cta-content p {
        font-size: 12px;
    }
    
    .cta-btn {
        padding: 10px 18px;
        font-size: 11px;
    }
}

/* Dark Mode Support - Menggunakan tema dari layout */
/* Tema akan dikelola oleh layout utama */

/* Dark mode untuk breadcrumb */
body.dark-theme .breadcrumb-item a {
    color: #a0aec0;
}

body.dark-theme .breadcrumb-item.active {
    color: #f7fafc;
}

body.dark-theme .breadcrumb-item + .breadcrumb-item::before {
    color: #a0aec0;
}

/* Dark mode untuk job description content */
body.dark-theme .job-description {
    color: #a0aec0;
}

body.dark-theme .job-description h1,
body.dark-theme .job-description h2,
body.dark-theme .job-description h3,
body.dark-theme .job-description h4,
body.dark-theme .job-description h5,
body.dark-theme .job-description h6 {
    color: #f7fafc;
}

body.dark-theme .job-description p,
body.dark-theme .job-description span,
body.dark-theme .job-description div,
body.dark-theme .job-description li {
    color: #a0aec0;
}

body.dark-theme .job-description strong,
body.dark-theme .job-description b {
    color: #f7fafc;
}

/* Accessibility */
.btn:focus-visible,
.btn-apply:focus-visible,
.share-btn:focus-visible {
    outline: 3px solid var(--job-primary-color);
    outline-offset: 2px;
}

/* Performance Optimizations */
* {
    box-sizing: border-box;
}

img {
    max-width: 100%;
    height: auto;
}

/* Print Styles */
@media print {
    .apply-card,
    .share-section,
    .benefits-process-section,
    .cta-section {
        display: none !important;
    }
    
    .job-grid-container {
        grid-template-columns: 1fr !important;
    }
    
    .content-grid {
        grid-template-columns: 1fr !important;
    }
    
    * {
        background: white !important;
        color: black !important;
        box-shadow: none !important;
    }
    
    .job-title {
        color: black !important;
        -webkit-text-fill-color: black !important;
    }
}

/* Reduced Motion */
@media (prefers-reduced-motion: reduce) {
    *, *::before, *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // File upload validation
    const fileInputs = document.querySelectorAll('input[type="file"]');
    fileInputs.forEach(input => {
        input.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const maxSize = this.name === 'portfolio' ? 10 * 1024 * 1024 : 5 * 1024 * 1024; // 10MB for portfolio, 5MB for others
                
                if (file.size > maxSize) {
                    alert('File terlalu besar. Maksimal ' + (maxSize / 1024 / 1024) + 'MB');
                    this.value = '';
                    return;
                }
                
                if (file.type !== 'application/pdf') {
                    alert('Hanya file PDF yang diperbolehkan');
                    this.value = '';
                    return;
                }
            }
        });
    });
    
    // Form submission validation
    const applicationForm = document.querySelector('.application-form');
    if (applicationForm) {
        applicationForm.addEventListener('submit', function(e) {
            const requiredFiles = ['cv'];
            let hasError = false;
            
            requiredFiles.forEach(fileName => {
                const fileInput = document.querySelector(`input[name="${fileName}"]`);
                if (fileInput && !fileInput.files.length) {
                    alert('CV wajib diupload');
                    hasError = true;
                }
            });
            
            if (hasError) {
                e.preventDefault();
            }
        });
    }
});
</script>
@endsection
