@extends('admin.components.layout')

@section('title', $title)

@section('content')
<div class="admin-content premium-jobs-show" data-aos="fade-in">
    <!-- Premium Alert Container -->
    <div id="alert-container" class="alert-container"></div>

    <!-- Premium Page Header -->
    <div class="premium-header" data-aos="fade-down" data-aos-delay="100">
        <div class="header-glass">
            <div class="header-content">
                <div class="title-section">
                    <div class="title-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div class="title-text">
                        <h1 class="main-title">{{ $job->title }}</h1>
                        <p class="subtitle">Detail lengkap lowongan kerja</p>
                        <div class="job-status-badges">
                            <span class="status-badge status-{{ $job->status }}">
                                <i class="fas fa-{{ $job->status === 'published' ? 'eye' : 'edit' }}"></i>
                                {{ $job->status === 'published' ? 'Dipublikasikan' : 'Draft' }}
                            </span>
                            <span class="status-badge status-{{ $job->is_open ? 'open' : 'closed' }}">
                                <i class="fas fa-{{ $job->is_open ? 'door-open' : 'door-closed' }}"></i>
                                {{ $job->is_open ? 'Masih Buka' : 'Sudah Tutup' }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="action-buttons">
                    <button class="premium-btn btn-primary" onclick="editJob()">
                        <span class="btn-content">
                            <i class="fas fa-edit"></i>
                            <span>Edit Lowongan</span>
                        </span>
                        <div class="btn-ripple"></div>
                    </button>
                    <button class="premium-btn btn-secondary" onclick="goBack()">
                        <span class="btn-content">
                            <i class="fas fa-arrow-left"></i>
                            <span>Kembali</span>
                        </span>
                        <div class="btn-ripple"></div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Premium Content Container -->
    <div class="premium-content-container" data-aos="fade-up" data-aos-delay="200">
        <!-- Grid Layout -->
        <div class="premium-single-layout">
            <!-- Main Content Column -->
            <div class="main-content-column">
                <!-- Job Overview Card -->
                <div class="premium-card overview-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-header-premium">
                        <div class="header-icon">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <h3>Ringkasan Lowongan</h3>
                    </div>
                    <div class="card-body-premium">
                        <div class="job-overview-grid">
                            <div class="overview-meta">
                                <div class="meta-grid">
                                    <div class="meta-card" data-aos="zoom-in" data-aos-delay="400">
                                        <div class="meta-icon location">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="meta-content">
                                            <span class="meta-label">Lokasi</span>
                                            <span class="meta-value">{{ $job->location }}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="meta-card" data-aos="zoom-in" data-aos-delay="450">
                                        <div class="meta-icon employment">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <div class="meta-content">
                                            <span class="meta-label">Tipe Pekerjaan</span>
                                            <span class="meta-value">{{ ucwords(str_replace('_', ' ', $job->employment_type)) }}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="meta-card" data-aos="zoom-in" data-aos-delay="500">
                                        <div class="meta-icon remote">
                                            <i class="fas fa-laptop"></i>
                                        </div>
                                        <div class="meta-content">
                                            <span class="meta-label">Kebijakan Remote</span>
                                            <span class="meta-value">{{ ucfirst($job->remote_policy) }}</span>
                                        </div>
                                    </div>
                                    
                                    @if($job->department)
                                    <div class="meta-card" data-aos="zoom-in" data-aos-delay="550">
                                        <div class="meta-icon department">
                                            <i class="fas fa-building"></i>
                                        </div>
                                        <div class="meta-content">
                                            <span class="meta-label">Departemen</span>
                                            <span class="meta-value">{{ $job->department }}</span>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            @if($job->salary_display)
                            <div class="salary-highlight" data-aos="fade-up" data-aos-delay="600">
                                <div class="salary-icon">
                                    <i class="fas fa-money-bill-wave"></i>
                                </div>
                                <div class="salary-content">
                                    <span class="salary-label">Rentang Gaji</span>
                                    <span class="salary-amount">{{ $job->salary_display }}</span>
                                </div>
                                <div class="salary-decoration"></div>
                            </div>
                            @endif

                            <div class="job-summary-section" data-aos="fade-up" data-aos-delay="650">
                                <h4 class="summary-title">
                                    <i class="fas fa-align-left"></i>
                                    Ringkasan Posisi
                                </h4>
                                <p class="summary-text">{{ $job->summary }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Description Card -->
                <div class="premium-card description-card" data-aos="fade-up" data-aos-delay="700">
                    <div class="card-header-premium">
                        <div class="header-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <h3>Deskripsi Lengkap</h3>
                    </div>
                    <div class="card-body-premium">
                        <div class="job-description-content">
                            {!! $job->description_html !!}
                        </div>
                    </div>
                </div>

                <!-- Application Instructions Card -->
                @if($job->apply_email || $job->apply_url)
                <div class="premium-card application-card" data-aos="fade-up" data-aos-delay="750">
                    <div class="card-header-premium">
                        <div class="header-icon">
                            <i class="fas fa-paper-plane"></i>
                        </div>
                        <h3>Cara Melamar</h3>
                    </div>
                    <div class="card-body-premium">
                        <div class="application-methods">
                            @if($job->apply_email)
                            <div class="apply-method email-method" data-aos="fade-up" data-aos-delay="800">
                                <div class="method-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="method-content">
                                    <span class="method-label">Email Lamaran</span>
                                    <a href="mailto:{{ $job->apply_email }}" class="method-value email-link">
                                        {{ $job->apply_email }}
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                </div>
                            </div>
                            @endif

                            @if($job->apply_url)
                            <div class="apply-method url-method" data-aos="fade-up" data-aos-delay="850">
                                <div class="method-icon">
                                    <i class="fas fa-external-link-alt"></i>
                                </div>
                                <div class="method-content">
                                    <span class="method-label">Form Online</span>
                                    <a href="{{ $job->apply_url }}" target="_blank" class="method-value url-link">
                                        Klik untuk melamar online
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endif

                <!-- SEO & Technical Info Card -->
                <div class="premium-card seo-card" data-aos="fade-up" data-aos-delay="600">
                    <div class="card-header-premium">
                        <div class="header-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3>Informasi SEO & Teknis</h3>
                    </div>
                    <div class="card-body-premium">
                        <div class="seo-grid">
                            <div class="seo-item" data-aos="fade-up" data-aos-delay="700">
                                <div class="seo-icon">
                                    <i class="fas fa-link"></i>
                                </div>
                                <div class="seo-content">
                                    <span class="seo-label">URL Slug</span>
                                    <code class="seo-code">{{ $job->slug }}</code>
                                </div>
                            </div>

                            <div class="seo-item" data-aos="fade-up" data-aos-delay="750">
                                <div class="seo-icon">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <div class="seo-content">
                                    <span class="seo-label">URL Publik</span>
                                    <a href="/careers/{{ $job->slug }}" target="_blank" class="seo-url">
                                        /careers/{{ $job->slug }}
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="seo-item" data-aos="fade-up" data-aos-delay="800">
                                <div class="seo-icon">
                                    <i class="fas fa-hashtag"></i>
                                </div>
                                <div class="seo-content">
                                    <span class="seo-label">ID Lowongan</span>
                                    <code class="seo-code">#{{ $job->id }}</code>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Column -->
            <div class="sidebar-column">
                <!-- Status Information Card -->
                <div class="premium-card status-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="card-header-premium">
                        <div class="header-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <h3>Status Lowongan</h3>
                    </div>
                    <div class="card-body-premium">
                        <div class="status-grid">
                            <div class="status-item publication" data-aos="fade-up" data-aos-delay="500">
                                <div class="status-icon publication-icon">
                                    <i class="fas fa-{{ $job->status === 'published' ? 'eye' : 'edit' }}"></i>
                                </div>
                                <div class="status-content">
                                    <span class="status-label">Status Publikasi</span>
                                    <span class="status-badge badge-{{ $job->status === 'published' ? 'published' : 'draft' }}">
                                        {{ $job->status === 'published' ? 'Dipublikasikan' : 'Draft' }}
                                    </span>
                                </div>
                            </div>

                            <div class="status-item availability" data-aos="fade-up" data-aos-delay="550">
                                <div class="status-icon availability-icon">
                                    <i class="fas fa-{{ $job->is_open ? 'door-open' : 'door-closed' }}"></i>
                                </div>
                                <div class="status-content">
                                    <span class="status-label">Status Ketersediaan</span>
                                    <span class="status-badge badge-{{ $job->is_open ? 'open' : 'closed' }}">
                                        {{ $job->is_open ? 'Masih Buka' : 'Sudah Tutup' }}
                                    </span>
                                </div>
                            </div>

                            @if($job->published_at)
                            <div class="status-item timeline" data-aos="fade-up" data-aos-delay="600">
                                <div class="status-icon timeline-icon">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div class="status-content">
                                    <span class="status-label">Tanggal Publikasi</span>
                                    <span class="status-value">{{ $job->published_at->format('d M Y H:i') }}</span>
                                </div>
                            </div>
                            @endif

                            @if($job->close_at)
                            <div class="status-item timeline" data-aos="fade-up" data-aos-delay="650">
                                <div class="status-icon timeline-icon">
                                    <i class="fas fa-calendar-times"></i>
                                </div>
                                <div class="status-content">
                                    <span class="status-label">Tanggal Penutupan</span>
                                    <span class="status-value">{{ $job->close_at->format('d M Y H:i') }}</span>
                                </div>
                            </div>
                            @endif

                            <div class="status-item timeline" data-aos="fade-up" data-aos-delay="700">
                                <div class="status-icon timeline-icon created">
                                    <i class="fas fa-plus-circle"></i>
                                </div>
                                <div class="status-content">
                                    <span class="status-label">Tanggal Dibuat</span>
                                    <span class="status-value">{{ $job->created_at->format('d M Y H:i') }}</span>
                                </div>
                            </div>

                            <div class="status-item timeline" data-aos="fade-up" data-aos-delay="750">
                                <div class="status-icon timeline-icon updated">
                                    <i class="fas fa-edit"></i>
                                </div>
                                <div class="status-content">
                                    <span class="status-label">Terakhir Diperbarui</span>
                                    <span class="status-value">{{ $job->updated_at->format('d M Y H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions Card -->
                <div class="premium-card actions-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="card-header-premium">
                        <div class="header-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <h3>Aksi Cepat</h3>
                    </div>
                    <div class="card-body-premium">
                        <div class="premium-actions">
                            <button class="premium-btn btn-primary btn-block" onclick="editJob()" data-aos="fade-up" data-aos-delay="600">
                                <span class="btn-content">
                                    <i class="fas fa-edit"></i>
                                    <span>Edit Lowongan</span>
                                </span>
                                <div class="btn-ripple"></div>
                            </button>

                            <button class="premium-btn btn-{{ $job->status === 'published' ? 'warning' : 'success' }} btn-block" 
                                    onclick="toggleStatus()" data-aos="fade-up" data-aos-delay="650">
                                <span class="btn-content">
                                    <i class="fas fa-{{ $job->status === 'published' ? 'eye-slash' : 'eye' }}"></i>
                                    <span>{{ $job->status === 'published' ? 'Jadikan Draft' : 'Publikasikan' }}</span>
                                </span>
                                <div class="btn-ripple"></div>
                            </button>

                            <button class="premium-btn btn-info btn-block" onclick="viewPublic()" data-aos="fade-up" data-aos-delay="700">
                                <span class="btn-content">
                                    <i class="fas fa-external-link-alt"></i>
                                    <span>Lihat di Website</span>
                                </span>
                                <div class="btn-ripple"></div>
                            </button>

                            <div class="action-divider" data-aos="fade-up" data-aos-delay="750">
                                <span class="divider-text">Zona Berbahaya</span>
                            </div>

                            <div class="danger-zone" data-aos="fade-up" data-aos-delay="800">
                                <div class="danger-header">
                                    <h4 class="danger-title">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        Hapus Lowongan
                                    </h4>
                                    <p class="danger-description">Aksi ini tidak dapat dibatalkan dan akan menghapus semua data terkait.</p>
                                </div>
                                <button class="premium-btn btn-danger btn-block" onclick="deleteJob()">
                                    <span class="btn-content">
                                        <i class="fas fa-trash"></i>
                                        <span>Hapus Permanent</span>
                                    </span>
                                    <div class="btn-ripple"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Preview Card -->
                <div class="premium-card preview-card" data-aos="fade-up" data-aos-delay="700">
                    <div class="card-header-premium">
                        <div class="header-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h3>Preview Kartu Lowongan</h3>
                    </div>
                    <div class="card-body-premium">
                        <div class="job-preview-container" data-aos="zoom-in" data-aos-delay="800">
                            <div class="preview-card-inner">
                                <div class="preview-header">
                                    <h4 class="preview-title">{{ $job->title }}</h4>
                                    <span class="preview-type-badge type-{{ $job->employment_type }}">
                                        {{ ucwords(str_replace('_', ' ', $job->employment_type)) }}
                                    </span>
                                </div>
                                
                                <div class="preview-meta">
                                    <div class="preview-meta-item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>{{ $job->location }}</span>
                                    </div>
                                    @if($job->department)
                                    <div class="preview-meta-item">
                                        <i class="fas fa-building"></i>
                                        <span>{{ $job->department }}</span>
                                    </div>
                                    @endif
                                </div>
                                
                                <p class="preview-summary">{{ Str::limit($job->summary, 100) }}</p>
                                
                                @if($job->salary_display)
                                <div class="preview-salary">
                                    <i class="fas fa-money-bill-wave"></i>
                                    <span>{{ $job->salary_display }}</span>
                                </div>
                                @endif
                                
                                <div class="preview-footer">
                                    <div class="preview-status">
                                        <span class="preview-status-badge status-{{ $job->status }}">
                                            {{ $job->status === 'published' ? 'Aktif' : 'Draft' }}
                                        </span>
                                    </div>
                                    <div class="preview-date">
                                        <small>{{ $job->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Premium Loading Overlay -->
    <div id="loading-overlay" class="loading-overlay">
        <div class="loading-content">
            <div class="loading-spinner">
                <div class="spinner-ring"></div>
                <div class="spinner-ring"></div>
                <div class="spinner-ring"></div>
            </div>
            <p class="loading-text">Memproses Permintaan</p>
            <p class="loading-subtext">Mohon tunggu sebentar...</p>
        </div>
    </div>
</div>

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">
<style>
/* ===== PREMIUM JOB SHOW STYLES - MODERN DARK RED THEME ===== */
:root {
    --primary-dark-red: #7F1D1D;
    --primary-red: #991B1B;
    --accent-red: #B91C1C;
    --light-red: #FEF2F2;
    --ultra-dark-red: #450A0A;
    --gradient-primary: linear-gradient(135deg, #7F1D1D 0%, #991B1B 50%, #B91C1C 100%);
    --gradient-secondary: linear-gradient(135deg, #1F2937 0%, #374151 100%);
    --gradient-dark: linear-gradient(135deg, #450A0A 0%, #7F1D1D 100%);
    --success-green: #059669;
    --warning-orange: #D97706;
    --info-blue: #2563EB;
    --danger-red: #DC2626;
    --glass-bg: rgba(255, 255, 255, 0.95);
    --glass-border: rgba(127, 29, 29, 0.1);
    --shadow-premium: 0 25px 50px rgba(127, 29, 29, 0.15);
    --shadow-card: 0 10px 25px rgba(0, 0, 0, 0.08);
    --shadow-hover: 0 20px 40px rgba(127, 29, 29, 0.2);
    --text-primary: #1F2937;
    --text-secondary: #6B7280;
    --text-muted: #9CA3AF;
    --border-light: rgba(229, 231, 235, 0.6);
    --bg-surface: #FFFFFF;
    --bg-page: #F9FAFB;
}

/* Premium Jobs Show Styles */
.premium-jobs-show {
    min-height: 100vh;
    background: var(--bg-page);
    padding: 2rem;
    position: relative;
    width: 100%;
    max-width: 100%;
    overflow-x: hidden;
}

.premium-jobs-show::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
        linear-gradient(45deg, transparent 49%, rgba(127, 29, 29, 0.02) 50%, transparent 51%),
        linear-gradient(-45deg, transparent 49%, rgba(127, 29, 29, 0.02) 50%, transparent 51%);
    background-size: 20px 20px;
    pointer-events: none;
    z-index: 1;
    opacity: 0.3;
}

/* Alert Container */
.alert-container {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 9999;
    max-width: 400px;
}

.premium-alert {
    background: var(--bg-surface);
    border: 1px solid var(--border-light);
    border-radius: 16px;
    padding: 16px 20px;
    margin-bottom: 12px;
    box-shadow: var(--shadow-card);
    transform: translateX(450px);
    transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    font-size: 0.875rem;
    position: relative;
    overflow: hidden;
}

.premium-alert::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 4px;
    background: var(--primary-red);
}

.premium-alert.success::before {
    background: var(--success-green);
}

.premium-alert.error::before {
    background: var(--danger-red);
}

.premium-alert.warning::before {
    background: var(--warning-orange);
}

.premium-alert.info::before {
    background: var(--info-blue);
}

.premium-alert.show {
    transform: translateX(0);
}

.alert-content {
    display: flex;
    align-items: flex-start;
    gap: 12px;
}

.alert-icon {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    margin-top: 2px;
}

.premium-alert.success .alert-icon {
    background: rgba(5, 150, 105, 0.1);
    color: var(--success-green);
}

.premium-alert.error .alert-icon {
    background: rgba(220, 38, 38, 0.1);
    color: var(--danger-red);
}

.premium-alert.warning .alert-icon {
    background: rgba(217, 119, 6, 0.1);
    color: var(--warning-orange);
}

.premium-alert.info .alert-icon {
    background: rgba(37, 99, 235, 0.1);
    color: var(--info-blue);
}

.alert-icon i {
    font-size: 0.875rem;
}

.alert-text {
    flex: 1;
    line-height: 1.5;
}

.alert-text strong {
    color: var(--text-primary);
    font-weight: 600;
    display: block;
    margin-bottom: 2px;
}

.alert-text p {
    color: var(--text-secondary);
    margin: 0;
    font-size: 0.8rem;
}

.alert-close {
    background: none;
    border: none;
    color: var(--text-muted);
    cursor: pointer;
    padding: 4px;
    border-radius: 4px;
    transition: all 0.2s ease;
    flex-shrink: 0;
}

.alert-close:hover {
    background: rgba(127, 29, 29, 0.1);
    color: var(--primary-red);
}

/* Premium Header */
.premium-header {
    margin-bottom: 3rem;
    z-index: 5;
    position: relative;
}

.header-glass {
    background: var(--bg-surface);
    border: 1px solid var(--border-light);
    border-radius: 16px;
    padding: 1.5rem;
    box-shadow: var(--shadow-card);
    position: relative;
    overflow: hidden;
    max-width: 1600px;
    margin: 0 auto;
    transition: all 0.3s ease;
}

.header-glass:hover {
    box-shadow: var(--shadow-hover);
    transform: translateY(-2px);
}

.header-glass::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-primary);
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 2rem;
}

.title-section {
    display: flex;
    align-items: flex-start;
    gap: 1.5rem;
    flex: 1;
}

.title-icon {
    width: 48px;
    height: 48px;
    background: var(--gradient-primary);
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: var(--shadow-premium);
    flex-shrink: 0;
    position: relative;
    overflow: hidden;
}

.title-icon::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transform: rotate(45deg) translateX(-100%);
    transition: transform 0.6s ease;
}

.title-icon:hover::before {
    transform: rotate(45deg) translateX(100%);
}

.title-icon i {
    font-size: 1.25rem;
    color: white;
    z-index: 2;
    position: relative;
}

.title-text {
    flex: 1;
}

.main-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 0.375rem 0;
    line-height: 1.3;
    letter-spacing: -0.015em;
}

.subtitle {
    font-size: 0.875rem;
    color: var(--text-secondary);
    margin: 0 0 0.75rem 0;
    font-weight: 500;
}

.job-status-badges {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}

.status-badge {
    padding: 4px 10px;
    border-radius: 50px;
    font-size: 0.7rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 4px;
    border: 1px solid transparent;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.status-badge::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s ease;
}

.status-badge:hover::before {
    left: 100%;
}

.status-badge.status-published,
.status-badge.status-open {
    background: linear-gradient(135deg, rgba(5, 150, 105, 0.15), rgba(5, 150, 105, 0.1));
    color: #065F46;
    border-color: rgba(5, 150, 105, 0.2);
}

.status-badge.status-draft,
.status-badge.status-closed {
    background: linear-gradient(135deg, rgba(217, 119, 6, 0.15), rgba(217, 119, 6, 0.1));
    color: #92400E;
    border-color: rgba(217, 119, 6, 0.2);
}

.action-buttons {
    display: flex;
    gap: 1rem;
    flex-shrink: 0;
}

/* Premium Buttons */
.premium-btn {
    position: relative;
    padding: 8px 16px;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.75rem;
    cursor: pointer;
    overflow: hidden;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 90px;
    border: 1px solid transparent;
    box-shadow: var(--shadow-card);
    text-transform: none;
    letter-spacing: 0.015em;
}

.premium-btn .btn-content {
    display: flex;
    align-items: center;
    gap: 6px;
    z-index: 2;
    position: relative;
}

.premium-btn .btn-ripple {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    transform: translate(-50%, -50%);
    transition: width 0.6s ease, height 0.6s ease;
    z-index: 1;
}

.premium-btn:active .btn-ripple {
    width: 300px;
    height: 300px;
}

.premium-btn.btn-primary {
    background: var(--gradient-primary);
    color: white;
    border-color: var(--primary-red);
}

.premium-btn.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-hover);
    background: var(--gradient-dark);
}

.premium-btn.btn-secondary {
    background: var(--bg-surface);
    color: var(--text-primary);
    border-color: var(--border-light);
}

.premium-btn.btn-secondary:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-hover);
    background: linear-gradient(135deg, #F9FAFB, #F3F4F6);
    border-color: var(--primary-red);
    color: var(--primary-red);
}

.premium-btn.btn-success {
    background: linear-gradient(135deg, var(--success-green), #047857);
    color: white;
    border-color: var(--success-green);
}

.premium-btn.btn-success:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 35px rgba(5, 150, 105, 0.3);
}

.premium-btn.btn-warning {
    background: linear-gradient(135deg, var(--warning-orange), #B45309);
    color: white;
    border-color: var(--warning-orange);
}

.premium-btn.btn-warning:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 35px rgba(217, 119, 6, 0.3);
}

.premium-btn.btn-info {
    background: linear-gradient(135deg, var(--info-blue), #1D4ED8);
    color: white;
    border-color: var(--info-blue);
}

.premium-btn.btn-info:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 35px rgba(37, 99, 235, 0.3);
}

.premium-btn.btn-danger {
    background: linear-gradient(135deg, var(--danger-red), #B91C1C);
    color: white;
    border-color: var(--danger-red);
}

.premium-btn.btn-danger:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 35px rgba(220, 38, 38, 0.3);
}

.premium-btn.btn-block {
    width: 100%;
    justify-content: center;
}

.premium-btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none !important;
    box-shadow: var(--shadow-card) !important;
}

/* Premium Content Container */
.premium-content-container {
    max-width: 1600px;
    margin: 0 auto;
    padding: 0 1.5rem;
}

/* Premium Single Layout - Grid System */
.premium-single-layout {
    display: grid;
    grid-template-columns: 1fr 350px;
    gap: 1.5rem;
    max-width: 1400px;
    margin: 0 auto;
    width: 100%;
}

.main-content-column {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.sidebar-column {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

/* Premium Cards */
.premium-card {
    background: var(--bg-surface);
    border: 1px solid var(--border-light);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: var(--shadow-card);
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    margin-bottom: 0;
    position: relative;
}

.premium-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-hover);
    border-color: rgba(127, 29, 29, 0.1);
}

.premium-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: var(--gradient-primary);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.premium-card:hover::before {
    opacity: 1;
}

.card-header-premium {
    background: linear-gradient(135deg, #FAFAFA, #F5F5F5);
    padding: 1.25rem 1.5rem;
    border-bottom: 1px solid var(--border-light);
    display: flex;
    align-items: center;
    gap: 1rem;
    position: relative;
}

.card-header-premium::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 2px;
    background: var(--gradient-primary);
    opacity: 0.6;
}

.header-icon {
    width: 40px;
    height: 40px;
    background: var(--gradient-primary);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 6px 20px rgba(127, 29, 29, 0.25);
    position: relative;
    overflow: hidden;
}

.header-icon::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.15), transparent);
    transform: rotate(45deg) translateX(-100%);
    transition: transform 0.6s ease;
}

.premium-card:hover .header-icon::before {
    transform: rotate(45deg) translateX(100%);
}

.header-icon i {
    color: white;
    font-size: 1rem;
    z-index: 2;
    position: relative;
}

.card-header-premium h3 {
    margin: 0;
    color: var(--text-primary);
    font-size: 1rem;
    font-weight: 700;
    letter-spacing: -0.015em;
}

.card-body-premium {
    padding: 1.5rem;
}

/* Job Overview Styles */
.job-overview-grid {
    display: flex;
    flex-direction: column;
    gap: 2rem;
    width: 100%;
    max-width: 100%;
}

.overview-meta {
    width: 100%;
}

.meta-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    width: 100%;
}

.meta-card {
    background: var(--bg-surface);
    border: 1px solid var(--border-light);
    border-radius: 16px;
    padding: 1.75rem;
    display: flex;
    align-items: center;
    gap: 1.25rem;
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    min-height: 100px;
    position: relative;
    overflow: hidden;
}

.meta-card::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 0;
    background: var(--gradient-primary);
    transition: width 0.3s ease;
}

.meta-card:hover {
    background: linear-gradient(135deg, #FAFAFA, #F5F5F5);
    transform: translateY(-4px);
    box-shadow: var(--shadow-hover);
    border-color: rgba(127, 29, 29, 0.15);
}

.meta-card:hover::before {
    width: 4px;
}

.meta-card:hover .meta-icon {
    transform: scale(1.1);
    box-shadow: 0 12px 25px rgba(127, 29, 29, 0.3);
}

.meta-card:hover .meta-value {
    color: var(--primary-red);
    font-weight: 700;
}

.meta-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    position: relative;
    overflow: hidden;
}

.meta-icon::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transform: rotate(45deg) translateX(-100%);
    transition: transform 0.6s ease;
}

.meta-card:hover .meta-icon::before {
    transform: rotate(45deg) translateX(100%);
}

.meta-icon.location {
    background: linear-gradient(135deg, #DC2626, #B91C1C);
    box-shadow: 0 6px 15px rgba(220, 38, 38, 0.3);
}

.meta-icon.employment {
    background: linear-gradient(135deg, #2563EB, #1D4ED8);
    box-shadow: 0 6px 15px rgba(37, 99, 235, 0.3);
}

.meta-icon.remote {
    background: linear-gradient(135deg, #059669, #047857);
    box-shadow: 0 6px 15px rgba(5, 150, 105, 0.3);
}

.meta-icon.department {
    background: linear-gradient(135deg, #D97706, #B45309);
    box-shadow: 0 6px 15px rgba(217, 119, 6, 0.3);
}

.meta-icon i {
    color: white;
    font-size: 1.125rem;
    z-index: 2;
    position: relative;
    transition: transform 0.3s ease;
}

.meta-content {
    flex: 1;
}

.meta-label {
    display: block;
    font-size: 0.7rem;
    color: var(--text-secondary);
    margin-bottom: 3px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.meta-value {
    display: block;
    color: var(--text-primary);
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s ease;
}
    font-size: 0.9rem;
}

/* Salary Highlight */
.salary-highlight {
    background: linear-gradient(135deg, rgba(5, 150, 105, 0.12), rgba(5, 150, 105, 0.06));
    backdrop-filter: blur(20px);
    border: 2px solid rgba(5, 150, 105, 0.2);
    border-radius: 20px;
    padding: 1.5rem;
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    gap: 1.25rem;
    margin: 1.5rem 0;
    box-shadow: 0 15px 40px rgba(5, 150, 105, 0.1);
}

.salary-highlight::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, transparent, var(--success-green), transparent);
}

.salary-highlight::after {
    content: '';
    position: absolute;
    top: -100%;
    right: -20%;
    width: 200px;
    height: 300%;
    background: linear-gradient(45deg, transparent, rgba(16, 185, 129, 0.08), transparent);
    transform: rotate(15deg);
    animation: float 6s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: rotate(15deg) translateY(0px); }
    50% { transform: rotate(15deg) translateY(-20px); }
}

.salary-icon {
    width: 56px;
    height: 56px;
    background: linear-gradient(135deg, var(--success-green), #047857);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 10px 25px rgba(5, 150, 105, 0.4);
    flex-shrink: 0;
    z-index: 2;
    position: relative;
    animation: pulse-glow 3s ease-in-out infinite alternate;
}

@keyframes pulse-glow {
    0% { box-shadow: 0 15px 40px rgba(16, 185, 129, 0.4); }
    100% { box-shadow: 0 20px 50px rgba(16, 185, 129, 0.6); }
}

.salary-icon i {
    color: white;
    font-size: 1.375rem;
}

.salary-content {
    flex: 1;
    z-index: 2;
    position: relative;
}

.salary-label {
    display: block;
    font-size: 0.8rem;
    color: #065f46;
    margin-bottom: 4px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.salary-amount {
    display: block;
    color: #047857;
    font-weight: 800;
    font-size: 1.125rem;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Job Summary Section */
.job-summary-section {
    background: #f8fafc;
    border: 1px solid rgba(148, 163, 184, 0.2);
    border-radius: 12px;
    padding: 1.25rem;
    position: relative;
    overflow: hidden;
}

.job-summary-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: var(--gradient-primary);
}

.summary-title {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--text-primary);
    font-size: 1rem;
    font-weight: 700;
    margin: 0 0 1rem 0;
    padding-bottom: 0.5rem;
    border-bottom: 1px solid rgba(148, 163, 184, 0.2);
}

.summary-title i {
    color: var(--primary-red);
    font-size: 0.875rem;
}

.summary-text {
    color: #475569;
    line-height: 1.6;
    font-size: 0.8rem;
    margin: 0;
    text-align: justify;
}

/* Job Description Content */
.job-description-content {
    color: #475569;
    line-height: 1.6;
    font-size: 0.8rem;
}

.job-description-content h1,
.job-description-content h2,
.job-description-content h3,
.job-description-content h4,
.job-description-content h5,
.job-description-content h6 {
    color: var(--text-primary);
    margin: 1rem 0 0.75rem 0;
    font-weight: 600;
}

.job-description-content h1 { font-size: 1.25rem; }
.job-description-content h2 { font-size: 1.125rem; }
.job-description-content h3 { font-size: 1rem; }
.job-description-content h4 { font-size: 0.875rem; }

.job-description-content ul,
.job-description-content ol {
    margin: 0.75rem 0;
    padding-left: 1.5rem;
}

.job-description-content li {
    margin-bottom: 0.25rem;
    color: #475569;
    font-size: 0.8rem;
}

.job-description-content p {
    margin: 0.75rem 0;
    font-size: 0.8rem;
}

.job-description-content strong {
    color: var(--text-primary);
}

/* Application Methods */
.application-methods {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.apply-method {
    background: #f8fafc;
    border: 1px solid rgba(148, 163, 184, 0.2);
    border-radius: 16px;
    padding: 1.75rem;
    display: flex;
    align-items: center;
    gap: 1.25rem;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.apply-method::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
    background: var(--gradient-primary);
    transition: width 0.3s ease;
}

.apply-method:hover {
    background: #f1f5f9;
    transform: translateY(-3px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
}

.apply-method:hover::before {
    width: 8px;
}

.method-icon {
    width: 44px;
    height: 44px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.email-method .method-icon {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
}

.url-method .method-icon {
    background: linear-gradient(135deg, #10b981, #059669);
}

.method-icon i {
    color: white;
    font-size: 1.1rem;
}

.method-content {
    flex: 1;
}

.method-label {
    display: block;
    font-size: 0.75rem;
    color: #64748b;
    margin-bottom: 3px;
    font-weight: 500;
}

.method-value {
    display: block;
    color: #1e293b;
    font-weight: 600;
    text-decoration: none;
    font-size: 0.9rem;
    transition: color 0.3s ease;
}

.method-value:hover {
    color: var(--primary-dark-red);
}

.method-value i {
    margin-left: 6px;
    font-size: 0.75rem;
}

/* Status Grid */
.status-grid {
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
}

.status-item {
    background: linear-gradient(135deg, #f8fafc, #f1f5f9);
    border: 1px solid rgba(148, 163, 184, 0.15);
    border-radius: 16px;
    padding: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    position: relative;
    overflow: hidden;
}

.status-item::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 0;
    background: var(--gradient-primary);
    transition: width 0.3s ease;
}

.status-item:hover {
    background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
    transform: translateX(8px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}

.status-item:hover::before {
    width: 4px;
}

.status-icon {
    width: 40px;
    height: 40px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.publication-icon {
    background: linear-gradient(135deg, #3b82f6, #1e40af);
}

.availability-icon {
    background: linear-gradient(135deg, #10b981, #047857);
}

.timeline-icon {
    background: linear-gradient(135deg, #6b7280, #374151);
}

.timeline-icon.created {
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
}

.timeline-icon.updated {
    background: linear-gradient(135deg, #f59e0b, #d97706);
}

.status-icon i {
    color: white;
    font-size: 1rem;
}

.status-content {
    flex: 1;
    min-width: 0;
}

.status-label {
    display: block;
    font-size: 0.8rem;
    color: #64748b;
    margin-bottom: 4px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-value {
    display: block;
    color: #1e293b;
    font-weight: 700;
    font-size: 0.9rem;
    word-break: break-word;
}

.status-badge {
    padding: 3px 8px;
    border-radius: 50px;
    font-size: 0.7rem;
    font-weight: 600;
    border: 1px solid transparent;
}

.status-badge.badge-published {
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.2), rgba(16, 185, 129, 0.1));
    color: #065f46;
    border-color: rgba(16, 185, 129, 0.3);
}

.status-badge.badge-draft {
    background: linear-gradient(135deg, rgba(245, 158, 11, 0.2), rgba(245, 158, 11, 0.1));
    color: #92400e;
    border-color: rgba(245, 158, 11, 0.3);
}

.status-badge.badge-open {
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.2), rgba(16, 185, 129, 0.1));
    color: #065f46;
    border-color: rgba(16, 185, 129, 0.3);
}

.status-badge.badge-closed {
    background: linear-gradient(135deg, rgba(239, 68, 68, 0.2), rgba(239, 68, 68, 0.1));
    color: #7f1d1d;
    border-color: rgba(239, 68, 68, 0.3);
}

/* Premium Actions */
.premium-actions {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.action-divider {
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(148, 163, 184, 0.3), transparent);
    margin: 8px 0;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

.divider-text {
    background: white;
    color: #64748b;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 0 16px;
}

.action-divider::before {
    content: '';
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    width: 8px;
    height: 8px;
    background: var(--gradient-primary);
    border-radius: 50%;
    opacity: 0.7;
}

.danger-zone {
    background: linear-gradient(135deg, rgba(220, 38, 38, 0.1), rgba(239, 68, 68, 0.05));
    border: 2px solid rgba(220, 38, 38, 0.2);
    border-radius: 20px;
    padding: 2rem;
    position: relative;
    overflow: hidden;
}

.danger-zone::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--accent-red), #dc2626, var(--accent-red));
}

.danger-header {
    margin-bottom: 1.5rem;
}

.danger-title {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #dc2626;
    font-size: 1.1rem;
    font-weight: 800;
    margin: 0 0 8px 0;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.danger-title i {
    color: #ef4444;
    font-size: 1.2rem;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.7; }
}

.danger-description {
    color: #7f1d1d;
    margin: 0;
    font-size: 0.9rem;
    font-style: italic;
    line-height: 1.5;
}

/* SEO Grid */
.seo-grid {
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
}

.seo-item {
    background: linear-gradient(135deg, #f8fafc, #f1f5f9);
    border: 1px solid rgba(148, 163, 184, 0.15);
    border-radius: 16px;
    padding: 1.25rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    position: relative;
    overflow: hidden;
}

.seo-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    width: 0;
    background: var(--gradient-primary);
    transition: width 0.3s ease;
}

.seo-item:hover {
    background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}

.seo-item:hover::before {
    width: 4px;
}

.seo-icon {
    width: 36px;
    height: 36px;
    background: var(--gradient-primary);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 4px 12px rgba(139, 0, 0, 0.3);
}

.seo-icon i {
    color: white;
    font-size: 1rem;
}

.seo-content {
    flex: 1;
    min-width: 0;
}

.seo-label {
    display: block;
    font-size: 0.8rem;
    color: #64748b;
    margin-bottom: 4px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.seo-code {
    background: linear-gradient(135deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.9));
    color: #fbbf24;
    padding: 6px 12px;
    border-radius: 8px;
    font-family: 'JetBrains Mono', 'Fira Code', 'Courier New', monospace;
    font-size: 0.8rem;
    font-weight: 600;
    word-break: break-all;
    border: 1px solid rgba(251, 191, 36, 0.3);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: all 0.3s ease;
}

.seo-code:hover {
    background: linear-gradient(135deg, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 1));
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    transform: scale(1.02);
}

.seo-url {
    color: #3b82f6;
    text-decoration: none;
    font-size: 0.85rem;
    font-weight: 600;
    word-break: break-all;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    cursor: pointer;
}

.seo-url:hover {
    color: #1d4ed8;
    text-decoration: underline;
}

.seo-url i {
    font-size: 0.75rem;
    transition: transform 0.3s ease;
}

.seo-url:hover i {
    transform: translateX(2px);
}

/* Preview Card */
.job-preview-container {
    background: rgba(255, 255, 255, 0.98);
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.25);
    border: 1px solid rgba(255, 255, 255, 0.2);
    position: relative;
}

.job-preview-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-primary);
}

.preview-card-inner {
    padding: 1.75rem;
    position: relative;
}

.preview-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 1rem;
    gap: 12px;
}

.preview-title {
    margin: 0;
    font-size: 1.1rem;
    color: #1f2937;
    font-weight: 700;
    flex: 1;
    line-height: 1.4;
}

.preview-type-badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    flex-shrink: 0;
    letter-spacing: 0.5px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.preview-type-badge.type-full_time {
    background: #dbeafe;
    color: #1e40af;
}

.preview-type-badge.type-part_time {
    background: #fef3c7;
    color: #92400e;
}

.preview-type-badge.type-contract {
    background: #e0e7ff;
    color: #3730a3;
}

.preview-type-badge.type-internship {
    background: #f3e8ff;
    color: #6b21a8;
}

.preview-type-badge.type-freelance {
    background: #ecfdf5;
    color: #065f46;
}

.preview-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 10px;
}

.preview-meta-item {
    display: flex;
    align-items: center;
    gap: 4px;
    font-size: 0.75rem;
    color: #6b7280;
}

.preview-meta-item i {
    color: #9ca3af;
    font-size: 0.7rem;
}

.preview-summary {
    margin: 10px 0;
    color: #6b7280;
    font-size: 0.8rem;
    line-height: 1.4;
}

.preview-salary {
    display: flex;
    align-items: center;
    gap: 4px;
    font-weight: 600;
    color: #059669;
    font-size: 0.8rem;
    margin: 10px 0;
}

.preview-salary i {
    color: #10b981;
}

.preview-status {
    display: flex;
    justify-content: flex-end;
    margin-top: 10px;
}

.preview-status-badge {
    padding: 3px 8px;
    border-radius: 10px;
    font-size: 0.65rem;
    font-weight: 600;
}

.preview-status-badge.status-published {
    background: #dcfce7;
    color: #166534;
}

.preview-status-badge.status-draft {
    background: #fef3c7;
    color: #92400e;
}

/* Loading Overlay */
.loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(31, 41, 55, 0.9);
    backdrop-filter: blur(12px);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.loading-overlay.show {
    opacity: 1;
}

.loading-content {
    text-align: center;
    background: var(--bg-surface);
    padding: 3rem 4rem;
    border-radius: 20px;
    box-shadow: var(--shadow-premium);
    border: 1px solid var(--border-light);
    position: relative;
    overflow: hidden;
}

.loading-content::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-primary);
}

.loading-spinner {
    position: relative;
    width: 64px;
    height: 64px;
    margin: 0 auto 1.5rem;
}

.spinner-ring {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 2px solid transparent;
    border-radius: 50%;
    animation: spin 1.2s linear infinite;
}

.spinner-ring:nth-child(1) {
    border-top-color: var(--primary-red);
    border-right-color: var(--primary-red);
    animation-duration: 1.2s;
}

.spinner-ring:nth-child(2) {
    border-top-color: var(--accent-red);
    border-right-color: var(--accent-red);
    animation-duration: 1.8s;
    animation-direction: reverse;
    width: 80%;
    height: 80%;
    top: 10%;
    left: 10%;
}

.spinner-ring:nth-child(3) {
    border-top-color: var(--ultra-dark-red);
    border-right-color: var(--ultra-dark-red);
    animation-duration: 2.4s;
    width: 60%;
    height: 60%;
    top: 20%;
    left: 20%;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.loading-text {
    color: var(--text-primary);
    font-size: 1.125rem;
    font-weight: 600;
    margin: 0;
    letter-spacing: 0.025em;
}

.loading-subtext {
    color: var(--text-secondary);
    font-size: 0.875rem;
    margin: 0.5rem 0 0 0;
    font-weight: 400;
}

/* Responsive Design */
@media (max-width: 1400px) {
    .premium-content-container {
        max-width: 1200px;
    }
    
    .premium-single-layout {
        grid-template-columns: 1fr 300px;
        gap: 1.25rem;
    }
}

@media (max-width: 1200px) {
    .premium-single-layout {
        grid-template-columns: 1fr 280px;
        gap: 1rem;
    }
    
    .meta-grid {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1rem;
    }
    
    .header-glass {
        padding: 1.25rem;
    }
    
    .card-header-premium {
        padding: 1rem 1.25rem;
    }
    
    .card-body-premium {
        padding: 1.25rem;
    }
}

@media (max-width: 1024px) {
    .premium-single-layout {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .sidebar-column {
        order: -1;
    }
    
    .meta-grid {
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1rem;
    }
    
    .salary-highlight {
        padding: 1.5rem;
        gap: 1rem;
    }
    
    .salary-icon {
        width: 48px;
        height: 48px;
    }
    
    .salary-icon i {
        font-size: 1.25rem;
    }
}

@media (max-width: 768px) {
    .premium-jobs-show {
        padding: 1rem;
    }
    
    .premium-content-container {
        padding: 0;
    }
    
    .premium-single-layout {
        gap: 1rem;
    }
    
    .header-glass {
        padding: 1rem;
        border-radius: 12px;
    }
    
    .header-content {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }
    
    .title-section {
        flex-direction: row;
        align-items: flex-start;
        gap: 0.75rem;
        width: 100%;
    }
    
    .title-icon {
        width: 36px;
        height: 36px;
    }
    
    .title-icon i {
        font-size: 1rem;
    }
    
    .main-title {
        font-size: 1.25rem;
    }
    
    .subtitle {
        font-size: 0.8rem;
    }
    
    .action-buttons {
        width: 100%;
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .meta-grid {
        grid-template-columns: 1fr;
        gap: 0.75rem;
    }
    
    .meta-card {
        padding: 1rem;
        min-height: auto;
    }
    
    .salary-highlight {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
        padding: 1.25rem;
    }
    
    .salary-icon {
        width: 40px;
        height: 40px;
    }
    
    .salary-icon i {
        font-size: 1.125rem;
    }
    
    .apply-method {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.75rem;
        text-align: left;
        padding: 1rem;
    }
    
    .preview-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 6px;
    }
    
    .alert-container {
        left: 0.75rem;
        right: 0.75rem;
        max-width: none;
    }
    
    .card-header-premium {
        padding: 1rem;
    }
    
    .card-body-premium {
        padding: 1rem;
    }
    
    .loading-content {
        padding: 1.5rem 2rem;
        margin: 0 1rem;
    }
}

@media (max-width: 480px) {
    .premium-jobs-show {
        padding: 0.75rem;
    }
    
    .premium-content-container {
        padding: 0;
    }
    
    .premium-single-layout {
        gap: 1.25rem;
    }
    
    .header-glass {
        padding: 1.25rem;
        border-radius: 16px;
    }
    
    .card-body-premium {
        padding: 1.5rem;
    }
    
    .meta-card {
        padding: 1.25rem;
        min-height: 80px;
    }
    
    .salary-highlight {
        padding: 1.5rem;
    }
    
    .job-summary-section {
        padding: 1.5rem;
    }
    
    .apply-method {
        padding: 1.5rem;
    }
    
    .main-title {
        font-size: 1.6rem;
    }
    
    .preview-card-inner {
        padding: 1.5rem;
    }
}

/* ===== PREMIUM SWEETALERT2 CUSTOM STYLES ===== */
.premium-swal-popup {
    border-radius: 20px !important;
    border: 1px solid var(--border-light) !important;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25) !important;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
    backdrop-filter: blur(10px) !important;
    position: relative !important;
    overflow: hidden !important;
}

.premium-swal-popup::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-primary);
    z-index: 10;
}

.premium-swal-popup.final-confirmation::before {
    background: linear-gradient(90deg, #dc2626, #ef4444, #dc2626) !important;
}

.premium-swal-popup.loading::before {
    background: linear-gradient(90deg, #059669, #10b981, #059669) !important;
}

.premium-swal-title {
    color: var(--text-primary) !important;
    font-size: 1.5rem !important;
    font-weight: 700 !important;
    margin-bottom: 1rem !important;
    text-align: center !important;
    padding: 0 !important;
}

.premium-swal-title.danger {
    color: #dc2626 !important;
    text-shadow: 0 2px 4px rgba(220, 38, 38, 0.1) !important;
}

.premium-swal-content {
    color: var(--text-secondary) !important;
    font-size: 0.95rem !important;
    line-height: 1.6 !important;
    margin: 0 !important;
    padding: 0 !important;
}

.premium-swal-confirm {
    background: linear-gradient(135deg, #dc2626, #b91c1c) !important;
    color: white !important;
    border: none !important;
    border-radius: 12px !important;
    padding: 12px 24px !important;
    font-size: 0.9rem !important;
    font-weight: 600 !important;
    cursor: pointer !important;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
    box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3) !important;
    margin: 0 8px !important;
    min-width: 140px !important;
    position: relative !important;
    overflow: hidden !important;
}

.premium-swal-confirm:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 8px 20px rgba(220, 38, 38, 0.4) !important;
    background: linear-gradient(135deg, #b91c1c, #991b1b) !important;
}

.premium-swal-confirm:active {
    transform: translateY(0) !important;
}

.premium-swal-confirm.danger {
    background: linear-gradient(135deg, #dc2626, #b91c1c) !important;
    box-shadow: 0 4px 12px rgba(220, 38, 38, 0.4) !important;
    animation: pulse-danger 2s infinite !important;
}

@keyframes pulse-danger {
    0%, 100% {
        box-shadow: 0 4px 12px rgba(220, 38, 38, 0.4) !important;
    }
    50% {
        box-shadow: 0 8px 25px rgba(220, 38, 38, 0.6) !important;
    }
}

.premium-swal-cancel {
    background: linear-gradient(135deg, #6b7280, #4b5563) !important;
    color: white !important;
    border: none !important;
    border-radius: 12px !important;
    padding: 12px 24px !important;
    font-size: 0.9rem !important;
    font-weight: 600 !important;
    cursor: pointer !important;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
    box-shadow: 0 4px 12px rgba(107, 114, 128, 0.3) !important;
    margin: 0 8px !important;
    min-width: 120px !important;
}

.premium-swal-cancel:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 8px 20px rgba(107, 114, 128, 0.4) !important;
    background: linear-gradient(135deg, #4b5563, #374151) !important;
}

.premium-swal-cancel:active {
    transform: translateY(0) !important;
}

.premium-swal-input {
    border: 2px solid #d1d5db !important;
    border-radius: 12px !important;
    padding: 12px 16px !important;
    font-size: 16px !important;
    font-weight: 600 !important;
    text-align: center !important;
    background: linear-gradient(135deg, #f9fafb, #f3f4f6) !important;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05) !important;
    transition: all 0.3s ease !important;
    width: 100% !important;
    margin: 15px 0 !important;
}

.premium-swal-input:focus {
    border-color: #dc2626 !important;
    outline: none !important;
    box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1), inset 0 2px 4px rgba(0, 0, 0, 0.05) !important;
    background: white !important;
}

.premium-swal-input::placeholder {
    color: #9ca3af !important;
    font-weight: 500 !important;
}

/* Custom validation styles */
.swal2-validation-message {
    background: linear-gradient(135deg, #fee2e2, #fef2f2) !important;
    border: 2px solid #fca5a5 !important;
    border-radius: 12px !important;
    color: #991b1b !important;
    font-size: 0.9rem !important;
    font-weight: 600 !important;
    padding: 12px 16px !important;
    margin: 10px 0 !important;
    box-shadow: 0 4px 12px rgba(220, 38, 38, 0.1) !important;
}

/* Animation for popup entrance */
.swal2-popup.swal2-show {
    animation: swal2-premium-show 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94) !important;
}

@keyframes swal2-premium-show {
    0% {
        transform: scale(0.8) translateY(-30px);
        opacity: 0;
    }
    100% {
        transform: scale(1) translateY(0);
        opacity: 1;
    }
}

/* Mobile responsive adjustments */
@media (max-width: 768px) {
    .premium-swal-popup {
        width: 95% !important;
        margin: 0 auto !important;
        border-radius: 16px !important;
        padding: 1.5rem !important;
    }
    
    .premium-swal-title {
        font-size: 1.25rem !important;
        margin-bottom: 0.75rem !important;
    }
    
    .premium-swal-content {
        font-size: 0.9rem !important;
    }
    
    .premium-swal-confirm,
    .premium-swal-cancel {
        padding: 10px 20px !important;
        font-size: 0.85rem !important;
        min-width: 100px !important;
        margin: 0 4px !important;
        border-radius: 10px !important;
    }
    
    .premium-swal-input {
        font-size: 14px !important;
        padding: 10px 14px !important;
        border-radius: 10px !important;
    }
    
    .swal2-actions {
        flex-direction: column !important;
        gap: 8px !important;
        width: 100% !important;
    }
    
    .swal2-actions button {
        width: 100% !important;
        margin: 0 !important;
    }
}

@media (max-width: 480px) {
    .premium-swal-popup {
        width: 98% !important;
        padding: 1rem !important;
        border-radius: 12px !important;
    }
    
    .premium-swal-title {
        font-size: 1.1rem !important;
    }
    
    .premium-swal-content {
        font-size: 0.85rem !important;
    }
    
    .premium-swal-confirm,
    .premium-swal-cancel {
        padding: 8px 16px !important;
        font-size: 0.8rem !important;
    }
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
<script>
/**
 * =================================================================
 * PREMIUM ALERT SYSTEM FOR JOBS MANAGEMENT
 * =================================================================
 * 
 * This file implements a premium alert system using SweetAlert2
 * for job management operations including:
 * 
 * 1. DELETE CONFIRMATION ALERT
 *    - Two-step confirmation process
 *    - Text input validation for final confirmation
 *    - Premium loading animation
 *    - Animated progress indicators
 * 
 * 2. STATUS TOGGLE ALERT
 *    - Smart contextual messages
 *    - Visual feedback for different states
 *    - Loading states with branded animations
 * 
 * 3. NOTIFICATION SYSTEM
 *    - Success, error, warning, and info alerts
 *    - Auto-dismiss functionality
 *    - Mobile-responsive design
 *    - Accessible and user-friendly
 * 
 * USAGE EXAMPLES:
 * - showAlert('Message', 'success|error|warning|info')
 * - deleteJob() - for delete confirmation
 * - toggleStatus() - for status change confirmation
 * - testAlert() - for testing all alert types
 * 
 * CUSTOMIZATION:
 * - Modify colors in CSS custom properties
 * - Adjust timing in setTimeout functions
 * - Change validation text in input validator
 * 
 * DEPENDENCIES:
 * - SweetAlert2 v11.10.5+
 * - Font Awesome icons
 * - CSS custom properties support
 * 
 * @author Tali Rejeki Development Team
 * @version 1.0.0
 * @date 2025-09-03
 * =================================================================
 */
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({
        duration: 800,
        easing: 'ease-out-cubic',
        once: true,
        offset: 50
    });

    // Configure SweetAlert2 defaults
    Swal.mixin({
        customClass: {
            popup: 'premium-swal-popup',
            title: 'premium-swal-title',
            content: 'premium-swal-content',
            confirmButton: 'premium-swal-confirm',
            cancelButton: 'premium-swal-cancel'
        },
        buttonsStyling: false,
        reverseButtons: true,
        focusCancel: true,
        heightAuto: false
    });

    // Premium Alert System
    function showAlert(message, type = 'success') {
        const alertContainer = document.getElementById('alert-container');
        const alertId = 'alert-' + Date.now();
        
        const alertHTML = `
            <div id="${alertId}" class="premium-alert ${type}">
                <div class="alert-content">
                    <div class="alert-icon">
                        <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'}"></i>
                    </div>
                    <div class="alert-text">
                        <strong>${type === 'success' ? 'Berhasil!' : type === 'error' ? 'Error!' : 'Info!'}</strong>
                        <p>${message}</p>
                    </div>
                    <button class="alert-close" onclick="closeAlert('${alertId}')">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        `;
        
        alertContainer.insertAdjacentHTML('beforeend', alertHTML);
        
        // Show alert with animation
        setTimeout(() => {
            const alert = document.getElementById(alertId);
            if (alert) {
                alert.classList.add('show');
            }
        }, 100);
        
        // Auto close after 5 seconds
        setTimeout(() => {
            closeAlert(alertId);
        }, 5000);
    }

    // Close alert function
    window.closeAlert = function(alertId) {
        const alert = document.getElementById(alertId);
        if (alert) {
            alert.classList.remove('show');
            setTimeout(() => {
                alert.remove();
            }, 400);
        }
    };

    // Loading overlay functions
    function showLoading(text = 'Memproses Permintaan', subtext = 'Mohon tunggu sebentar...') {
        const overlay = document.getElementById('loading-overlay');
        const loadingText = overlay.querySelector('.loading-text');
        const loadingSubtext = overlay.querySelector('.loading-subtext');
        
        if (loadingText) loadingText.textContent = text;
        if (loadingSubtext) loadingSubtext.textContent = subtext;
        
        overlay.style.display = 'flex';
        setTimeout(() => overlay.classList.add('show'), 10);
    }

    function hideLoading() {
        const overlay = document.getElementById('loading-overlay');
        overlay.classList.remove('show');
        setTimeout(() => {
            overlay.style.display = 'none';
        }, 300);
    }

    // Button ripple effect
    document.querySelectorAll('.premium-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            const ripple = this.querySelector('.btn-ripple');
            if (ripple) {
                ripple.style.width = '0';
                ripple.style.height = '0';
                
                setTimeout(() => {
                    ripple.style.width = '300px';
                    ripple.style.height = '300px';
                }, 10);
                
                setTimeout(() => {
                    ripple.style.width = '0';
                    ripple.style.height = '0';
                }, 600);
            }
        });
    });

    // Navigation functions
    window.editJob = function() {
        showLoading('Membuka Editor', 'Mempersiapkan halaman edit lowongan...');
        setTimeout(() => {
            window.location.href = "{{ route('admin.jobs.edit', $job) }}";
        }, 800);
    };

    window.goBack = function() {
        showLoading('Kembali ke Daftar', 'Memuat halaman daftar lowongan...');
        setTimeout(() => {
            window.location.href = "{{ route('admin.jobs.index') }}";
        }, 800);
    };

    window.toggleStatus = function() {
        const currentStatus = '{{ $job->status }}';
        const newStatus = currentStatus === 'published' ? 'draft' : 'published';
        const actionText = newStatus === 'published' ? 'mempublikasikan' : 'mengubah ke draft';
        const actionColor = newStatus === 'published' ? '#059669' : '#d97706';
        const actionIcon = newStatus === 'published' ? 'question' : 'warning';
        
        Swal.fire({
            title: `${newStatus === 'published' ? '📢' : '📝'} Ubah Status Lowongan`,
            html: `
                <div style="text-align: left; margin: 20px 0;">
                    <p style="color: #374151; margin-bottom: 15px; font-size: 16px;">
                        Anda akan ${actionText} lowongan:
                    </p>
                    <div style="background: linear-gradient(135deg, ${newStatus === 'published' ? '#ecfdf5' : '#fef3c7'}, ${newStatus === 'published' ? '#d1fae5' : '#fde68a'}); border: 2px solid ${newStatus === 'published' ? '#6ee7b7' : '#fbbf24'}; border-radius: 12px; padding: 15px; margin: 15px 0;">
                        <h4 style="color: ${newStatus === 'published' ? '#065f46' : '#92400e'}; margin: 0; font-size: 16px; font-weight: 700;">
                            "{{ $job->title }}"
                        </h4>
                        <p style="color: ${newStatus === 'published' ? '#047857' : '#b45309'}; margin: 8px 0 0 0; font-size: 14px;">
                            Status saat ini: <strong>${currentStatus === 'published' ? 'Dipublikasikan' : 'Draft'}</strong> → 
                            Status baru: <strong>${newStatus === 'published' ? 'Dipublikasikan' : 'Draft'}</strong>
                        </p>
                    </div>
                    ${newStatus === 'published' ? 
                        '<div style="background: #dbeafe; border: 1px solid #93c5fd; border-radius: 8px; padding: 12px; margin: 15px 0;"><p style="color: #1e40af; margin: 0; font-size: 14px; font-weight: 600;">✅ Lowongan akan terlihat oleh publik setelah dipublikasikan</p></div>' : 
                        '<div style="background: #fef3c7; border: 1px solid #fbbf24; border-radius: 8px; padding: 12px; margin: 15px 0;"><p style="color: #92400e; margin: 0; font-size: 14px; font-weight: 600;">⚠️ Lowongan akan disembunyikan dari publik setelah dijadikan draft</p></div>'
                    }
                </div>
            `,
            icon: actionIcon,
            showCancelButton: true,
            confirmButtonColor: actionColor,
            cancelButtonColor: '#6b7280',
            confirmButtonText: `${newStatus === 'published' ? '📢' : '📝'} Ya, ${actionText.charAt(0).toUpperCase() + actionText.slice(1)}`,
            cancelButtonText: '❌ Batal',
            customClass: {
                popup: 'premium-swal-popup',
                title: 'premium-swal-title',
                content: 'premium-swal-content',
                confirmButton: 'premium-swal-confirm',
                cancelButton: 'premium-swal-cancel'
            },
            buttonsStyling: false,
            focusCancel: true,
            allowOutsideClick: true,
            allowEscapeKey: true,
            heightAuto: false,
            width: 600,
            padding: '2rem'
        }).then((result) => {
            if (result.isConfirmed) {
                // Show loading
                Swal.fire({
                    title: `${newStatus === 'published' ? '📢' : '📝'} Mengubah Status`,
                    html: `
                        <div style="text-align: center; padding: 20px;">
                            <div class="loading-spinner-custom" style="margin: 20px auto;">
                                <div class="spinner-border" role="status" style="width: 3rem; height: 3rem; border: 4px solid ${newStatus === 'published' ? '#d1fae5' : '#fde68a'}; border-left-color: ${actionColor}; border-radius: 50%; animation: spin 1s linear infinite;"></div>
                            </div>
                            <p style="color: #374151; margin: 20px 0 10px 0; font-size: 16px; font-weight: 600;">
                                Sedang ${actionText} lowongan...
                            </p>
                            <p style="color: #6b7280; margin: 0; font-size: 14px;">
                                Mohon tunggu sebentar
                            </p>
                            <div style="background: ${newStatus === 'published' ? '#ecfdf5' : '#fef3c7'}; border: 1px solid ${newStatus === 'published' ? '#6ee7b7' : '#fbbf24'}; border-radius: 8px; padding: 12px; margin-top: 15px;">
                                <p style="color: ${newStatus === 'published' ? '#065f46' : '#92400e'}; margin: 0; font-size: 13px; font-weight: 600;">
                                    ⏳ ${actionText.charAt(0).toUpperCase() + actionText.slice(1)}: "{{ $job->title }}"
                                </p>
                            </div>
                        </div>
                        <style>
                            @keyframes spin {
                                0% { transform: rotate(0deg); }
                                100% { transform: rotate(360deg); }
                            }
                        </style>
                    `,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    customClass: {
                        popup: 'premium-swal-popup loading',
                        title: 'premium-swal-title',
                        content: 'premium-swal-content'
                    },
                    width: 500,
                    padding: '2rem'
                });

                // Create and submit form
                setTimeout(() => {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = "{{ route('admin.jobs.toggle-status', $job) }}";
                    
                    const csrfToken = document.createElement('input');
                    csrfToken.type = 'hidden';
                    csrfToken.name = '_token';
                    csrfToken.value = '{{ csrf_token() }}';
                    
                    form.appendChild(csrfToken);
                    document.body.appendChild(form);
                    
                    form.submit();
                }, 1000);
            }
        });
    };

    window.viewPublic = function() {
        showAlert('Membuka halaman publik lowongan...', 'info');
        setTimeout(() => {
            window.open('/careers/{{ $job->slug }}', '_blank');
        }, 1000);
    };

    // Test function for alerts (remove in production)
    window.testAlert = function() {
        Swal.fire({
            title: '🧪 Test Alert System',
            html: `
                <div style="text-align: left; margin: 20px 0;">
                    <p style="color: #374151; margin-bottom: 15px;">Pilih jenis alert yang ingin ditest:</p>
                    <div style="display: grid; gap: 10px;">
                        <button onclick="Swal.close(); showAlert('Ini adalah test success alert!', 'success')" 
                                style="background: #10b981; color: white; border: none; padding: 8px 12px; border-radius: 6px; cursor: pointer;">
                            ✅ Test Success Alert
                        </button>
                        <button onclick="Swal.close(); showAlert('Ini adalah test error alert!', 'error')" 
                                style="background: #ef4444; color: white; border: none; padding: 8px 12px; border-radius: 6px; cursor: pointer;">
                            ❌ Test Error Alert
                        </button>
                        <button onclick="Swal.close(); showAlert('Ini adalah test warning alert!', 'warning')" 
                                style="background: #f59e0b; color: white; border: none; padding: 8px 12px; border-radius: 6px; cursor: pointer;">
                            ⚠️ Test Warning Alert
                        </button>
                        <button onclick="Swal.close(); showAlert('Ini adalah test info alert!', 'info')" 
                                style="background: #3b82f6; color: white; border: none; padding: 8px 12px; border-radius: 6px; cursor: pointer;">
                            ℹ️ Test Info Alert
                        </button>
                    </div>
                </div>
            `,
            icon: 'question',
            showConfirmButton: false,
            showCancelButton: true,
            cancelButtonText: '❌ Tutup',
            customClass: {
                popup: 'premium-swal-popup',
                title: 'premium-swal-title',
                content: 'premium-swal-content',
                cancelButton: 'premium-swal-cancel'
            },
            buttonsStyling: false,
            width: 400,
            padding: '2rem'
        });
    };

    window.deleteJob = function() {
        // Show premium confirmation dialog
        Swal.fire({
            title: '⚠️ Peringatan!',
            html: `
                <div style="text-align: left; margin: 20px 0;">
                    <p style="color: #374151; margin-bottom: 15px; font-size: 16px;">
                        Anda akan menghapus lowongan kerja:
                    </p>
                    <div style="background: linear-gradient(135deg, #fee2e2, #fef2f2); border: 2px solid #fca5a5; border-radius: 12px; padding: 15px; margin: 15px 0;">
                        <h4 style="color: #991b1b; margin: 0; font-size: 18px; font-weight: 700;">
                            "{{ $job->title }}"
                        </h4>
                        <p style="color: #7f1d1d; margin: 8px 0 0 0; font-size: 14px;">
                            ID: #{{ $job->id }} | Status: {{ $job->status === 'published' ? 'Dipublikasikan' : 'Draft' }}
                        </p>
                    </div>
                    <div style="background: #fef3c7; border: 1px solid #fbbf24; border-radius: 8px; padding: 12px; margin: 15px 0;">
                        <p style="color: #92400e; margin: 0; font-size: 14px; font-weight: 600;">
                            ⚠️ Aksi ini tidak dapat dibatalkan dan akan menghapus:
                        </p>
                        <ul style="color: #92400e; margin: 8px 0 0 20px; font-size: 13px;">
                            <li>Data lowongan kerja</li>
                            <li>Semua informasi terkait</li>
                            <li>Riwayat publikasi</li>
                        </ul>
                    </div>
                </div>
            `,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#6b7280',
            confirmButtonText: '🗑️ Ya, Hapus Lowongan',
            cancelButtonText: '❌ Batal',
            reverseButtons: true,
            customClass: {
                popup: 'premium-swal-popup',
                title: 'premium-swal-title',
                content: 'premium-swal-content',
                confirmButton: 'premium-swal-confirm',
                cancelButton: 'premium-swal-cancel'
            },
            buttonsStyling: false,
            focusCancel: true,
            allowOutsideClick: false,
            allowEscapeKey: false,
            heightAuto: false,
            width: 600,
            padding: '2rem',
            backdrop: `
                rgba(31, 41, 55, 0.8)
                url("/img/warning-pattern.png")
                center center
                no-repeat
            `
        }).then((result) => {
            if (result.isConfirmed) {
                // Show final confirmation with text input
                Swal.fire({
                    title: '🔴 Konfirmasi Terakhir',
                    html: `
                        <div style="text-align: left; margin: 20px 0;">
                            <p style="color: #374151; margin-bottom: 20px; font-size: 16px; font-weight: 600;">
                                Untuk melanjutkan penghapusan, ketik kata berikut dengan tepat:
                            </p>
                            <div style="background: #f3f4f6; border: 2px solid #d1d5db; border-radius: 8px; padding: 15px; text-align: center; margin: 15px 0;">
                                <code style="background: #1f2937; color: #fbbf24; padding: 8px 16px; border-radius: 6px; font-size: 18px; font-weight: 700; letter-spacing: 2px;">
                                    HAPUS LOWONGAN
                                </code>
                            </div>
                            <p style="color: #6b7280; font-size: 13px; margin-top: 15px;">
                                💡 Tips: Salin teks di atas untuk memudahkan konfirmasi
                            </p>
                        </div>
                    `,
                    input: 'text',
                    inputPlaceholder: 'Ketik: HAPUS LOWONGAN',
                    inputAttributes: {
                        'aria-label': 'Konfirmasi penghapusan',
                        'style': 'text-align: center; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; font-size: 16px; padding: 12px; border: 2px solid #dc2626; border-radius: 8px;'
                    },
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: '💥 Hapus Permanent',
                    cancelButtonText: '🛡️ Batal Hapus',
                    reverseButtons: true,
                    customClass: {
                        popup: 'premium-swal-popup final-confirmation',
                        title: 'premium-swal-title danger',
                        content: 'premium-swal-content',
                        confirmButton: 'premium-swal-confirm danger',
                        cancelButton: 'premium-swal-cancel',
                        input: 'premium-swal-input'
                    },
                    buttonsStyling: false,
                    focusCancel: true,
                    allowOutsideClick: false,
                    allowEscapeKey: true,
                    heightAuto: false,
                    width: 650,
                    padding: '2rem',
                    inputValidator: (value) => {
                        if (!value) {
                            return 'Anda harus mengetik konfirmasi untuk melanjutkan!';
                        }
                        if (value.toUpperCase().trim() !== 'HAPUS LOWONGAN') {
                            return 'Teks konfirmasi tidak sesuai! Ketik: HAPUS LOWONGAN';
                        }
                    },
                    preConfirm: (inputValue) => {
                        if (inputValue.toUpperCase().trim() === 'HAPUS LOWONGAN') {
                            return true;
                        }
                        return false;
                    }
                }).then((finalResult) => {
                    if (finalResult.isConfirmed) {
                        // Show loading with custom message
                        Swal.fire({
                            title: '🗑️ Menghapus Lowongan',
                            html: `
                                <div style="text-align: center; padding: 20px;">
                                    <div class="loading-spinner-custom" style="margin: 20px auto;">
                                        <div class="spinner-border" role="status" style="width: 3rem; height: 3rem; border: 4px solid #fee2e2; border-left-color: #dc2626; border-radius: 50%; animation: spin 1s linear infinite;"></div>
                                    </div>
                                    <p style="color: #374151; margin: 20px 0 10px 0; font-size: 16px; font-weight: 600;">
                                        Sedang menghapus lowongan kerja...
                                    </p>
                                    <p style="color: #6b7280; margin: 0; font-size: 14px;">
                                        Mohon tunggu, proses ini tidak dapat dibatalkan
                                    </p>
                                    <div style="background: #fef2f2; border: 1px solid #fca5a5; border-radius: 8px; padding: 12px; margin-top: 15px;">
                                        <p style="color: #991b1b; margin: 0; font-size: 13px; font-weight: 600;">
                                            ⏳ Menghapus: "{{ $job->title }}"
                                        </p>
                                    </div>
                                </div>
                                <style>
                                    @keyframes spin {
                                        0% { transform: rotate(0deg); }
                                        100% { transform: rotate(360deg); }
                                    }
                                </style>
                            `,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false,
                            customClass: {
                                popup: 'premium-swal-popup loading',
                                title: 'premium-swal-title',
                                content: 'premium-swal-content'
                            },
                            width: 500,
                            padding: '2rem'
                        });

                        // Create and submit form after a small delay
                        setTimeout(() => {
                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.action = "{{ route('admin.jobs.destroy', $job) }}";
                            
                            const csrfToken = document.createElement('input');
                            csrfToken.type = 'hidden';
                            csrfToken.name = '_token';
                            csrfToken.value = '{{ csrf_token() }}';
                            
                            const methodField = document.createElement('input');
                            methodField.type = 'hidden';
                            methodField.name = '_method';
                            methodField.value = 'DELETE';
                            
                            form.appendChild(csrfToken);
                            form.appendChild(methodField);
                            document.body.appendChild(form);
                            
                            form.submit();
                        }, 1500);
                    }
                });
            }
        });
    };

    // Enhanced scroll effects
    let ticking = false;
    
    function updateScrollEffects() {
        const scrollY = window.scrollY;
        const header = document.querySelector('.premium-header');
        
        if (header) {
            const opacity = Math.max(0, 1 - scrollY / 300);
            header.style.transform = `translateY(${scrollY * 0.5}px)`;
            header.style.opacity = opacity;
        }
        
        ticking = false;
    }
    
    window.addEventListener('scroll', function() {
        if (!ticking) {
            requestAnimationFrame(updateScrollEffects);
            ticking = true;
        }
    });

    // Copy to clipboard functionality
    document.querySelectorAll('.seo-code, .seo-url').forEach(element => {
        element.addEventListener('click', function() {
            const text = this.textContent;
            navigator.clipboard.writeText(text).then(() => {
                showAlert('Teks berhasil disalin ke clipboard!', 'success');
            }).catch(() => {
                showAlert('Gagal menyalin teks ke clipboard.', 'error');
            });
        });
        
        // Add cursor pointer style
        element.style.cursor = 'pointer';
        element.title = 'Klik untuk menyalin';
    });

    // Enhanced hover effects for cards
    document.querySelectorAll('.premium-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
            this.style.transition = 'all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Handle Laravel flash messages
    @if(session('success'))
        showAlert('{{ session('success') }}', 'success');
    @endif
    
    @if(session('error'))
        showAlert('{{ session('error') }}', 'error');
    @endif
    
    @if(session('warning'))
        showAlert('{{ session('warning') }}', 'warning');
    @endif
    
    @if(session('info'))
        showAlert('{{ session('info') }}', 'info');
    @endif

    // Success message if redirected from edit or other actions
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('updated') === '1') {
        showAlert('Lowongan kerja berhasil diperbarui!', 'success');
        // Clean URL
        window.history.replaceState({}, document.title, window.location.pathname);
    }
    
    if (urlParams.get('status_changed') === '1') {
        const statusAction = urlParams.get('action') || 'diubah';
        showAlert(`Status lowongan berhasil ${statusAction}!`, 'success');
        // Clean URL
        window.history.replaceState({}, document.title, window.location.pathname);
    }
    
    // Show SweetAlert success if coming from other pages
    if (urlParams.get('success') === 'deleted') {
        Swal.fire({
            title: '✅ Berhasil Dihapus!',
            html: `
                <div style="text-align: center; padding: 20px;">
                    <div style="margin: 20px 0;">
                        <i class="fas fa-check-circle" style="font-size: 4rem; color: #10b981; margin-bottom: 20px;"></i>
                    </div>
                    <p style="color: #374151; margin: 15px 0; font-size: 16px; font-weight: 600;">
                        Lowongan kerja berhasil dihapus!
                    </p>
                    <p style="color: #6b7280; margin: 0; font-size: 14px;">
                        Data lowongan telah dihapus secara permanen dari sistem
                    </p>
                </div>
            `,
            icon: 'success',
            confirmButtonColor: '#10b981',
            confirmButtonText: '👍 Oke',
            customClass: {
                popup: 'premium-swal-popup',
                title: 'premium-swal-title',
                content: 'premium-swal-content',
                confirmButton: 'premium-swal-confirm'
            },
            buttonsStyling: false,
            heightAuto: false,
            width: 450,
            padding: '2rem'
        });
        // Clean URL
        window.history.replaceState({}, document.title, window.location.pathname);
    }
    
    // Enhanced error handling
    window.addEventListener('error', function(e) {
        console.error('JavaScript Error:', e);
        showAlert('Terjadi kesalahan pada halaman. Silakan refresh halaman.', 'error');
    });

    // Handle form submission errors
    window.addEventListener('unhandledrejection', function(e) {
        console.error('Unhandled Promise Rejection:', e);
        showAlert('Terjadi kesalahan sistem. Silakan coba lagi.', 'error');
    });

    console.log('🎉 Premium Jobs Show page loaded successfully!');
});
</script>
@endpush
@endsection
