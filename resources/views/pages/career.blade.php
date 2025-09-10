@extends('components.layout')

@section('title', $title)

@section('content')
<!-- Page Header with Enhanced Design -->
<section class="page-header page-entrance" data-aos="fade-in" data-aos-duration="1500">
    <div class="page-header-bg" style="background-image: url('{{ asset('img/career/carir.jpg') }}');"></div>
    <div class="page-header-overlay"></div>
    <div class="header-decoration">
        <div class="decoration-circle decoration-circle-1" data-aos="fade-down" data-aos-delay="1600"></div>
        <div class="decoration-circle decoration-circle-2" data-aos="fade-left" data-aos-delay="1700"></div>
        <div class="decoration-circle decoration-circle-3" data-aos="fade-right" data-aos-delay="1800"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <div class="header-content" data-aos="fade-up">
                    <div class="header-badge" data-aos="zoom-in" data-aos-delay="500">
                        <i class="fas fa-briefcase"></i>
                        <span>Karier & Kesempatan</span>
                    </div>
                    <h1 class="page-title" data-aos="fade-up" data-aos-delay="600">
                        <span class="title-main" data-aos="fade-right" data-aos-delay="700">Karier</span>
                        <span class="title-highlight" data-aos="fade-left" data-aos-delay="800">Bersama Kami</span>
                    </h1>
                    <p class="page-description" data-aos="fade-up" data-aos-delay="900">
                        Bergabunglah dengan tim profesional kami dan bangun karier yang cemerlang di industri insulasi terdepan. 
                        Wujudkan potensi terbaik Anda bersama Tali Rejeki.
                    </p>
                    <div class="header-stats">
                        <div class="stat-item" data-aos="fade-up" data-aos-delay="1000">
                            <div class="stat-number" data-count="14">0+</div>
                            <div class="stat-label">Tahun Pengalaman</div>
                        </div>
                        <div class="stat-item" data-aos="fade-up" data-aos-delay="1100">
                            <div class="stat-number" data-count="100">0+</div>
                            <div class="stat-label">Tim Profesional</div>
                        </div>
                        <div class="stat-item" data-aos="fade-up" data-aos-delay="1200">
                            <div class="stat-number" data-count="500">0+</div>
                            <div class="stat-label">Proyek Sukses</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Company Culture Section with Enhanced Design -->
<section class="company-culture py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="culture-content">
                    <div class="section-badge" data-aos="zoom-in" data-aos-delay="300">
                        <i class="fas fa-heart"></i>
                        <span>Budaya Perusahaan</span>
                    </div>
                    <h2 class="section-title" data-aos="fade-up" data-aos-delay="400">Mengapa Bergabung dengan Tali Rejeki?</h2>
                    <p class="section-description" data-aos="fade-up" data-aos-delay="500">
                        Kami percaya bahwa SDM adalah aset terpenting perusahaan. Bergabunglah dengan lingkungan kerja 
                        yang mendukung pengembangan diri dan memberikan kesempatan berkembang bagi setiap individu.
                    </p>

                    <div class="culture-features">
                        <div class="feature-item" data-aos="fade-up" data-aos-delay="100">
                            <div class="feature-icon">
                                <i class="fas fa-graduation-cap"></i>
                                <div class="icon-glow"></div>
                            </div>
                            <div class="feature-content">
                                <h4>Pengembangan Karier</h4>
                                <p>Program pelatihan berkelanjutan dan jalur karier yang jelas untuk masa depan cemerlang</p>
                                <div class="feature-progress">
                                    <div class="progress-bar" data-progress="90"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="feature-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="feature-icon">
                                <i class="fas fa-balance-scale"></i>
                                <div class="icon-glow"></div>
                            </div>
                            <div class="feature-content">
                                <h4>Work-Life Balance</h4>
                                <p>Keseimbangan kehidupan kerja dan pribadi yang sehat untuk produktivitas optimal</p>
                                <div class="feature-progress">
                                    <div class="progress-bar" data-progress="85"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="feature-item" data-aos="fade-up" data-aos-delay="300">
                            <div class="feature-icon">
                                <i class="fas fa-users"></i>
                                <div class="icon-glow"></div>
                            </div>
                            <div class="feature-content">
                                <h4>Tim yang Solid</h4>
                                <p>Lingkungan kerja yang kolaboratif dan saling mendukung dalam mencapai tujuan bersama</p>
                                <div class="feature-progress">
                                    <div class="progress-bar" data-progress="95"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6" data-aos="fade-left">
                <div class="culture-visual">
                    <div class="image-container">
                        <img src="{{ asset('img/career/104.png') }}" alt="Budaya Perusahaan" class="img-fluid rounded-3">
                        <div class="image-overlay">
                        </div>
                    </div>
                    <div class="visual-decoration">
                        <div class="decoration-dot"></div>
                        <div class="decoration-dot"></div>
                        <div class="decoration-dot"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section with Enhanced Cards -->
<section class="benefits-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <div class="section-badge" data-aos="zoom-in" data-aos-delay="200">
                <i class="fas fa-gift"></i>
                <span>Benefit & Fasilitas</span>
            </div>
            <h2 class="section-title" data-aos="fade-up" data-aos-delay="300">Paket Kompensasi & Benefit</h2>
            <p class="section-description" data-aos="fade-up" data-aos-delay="400">
                Kami menyediakan paket kompensasi yang kompetitif dan berbagai benefit menarik untuk mendukung kesejahteraan karyawan
            </p>
        </div>
        
        <div class="row g-4 stagger-children" data-aos="fade-up" data-aos-delay="500">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="benefit-card premium-card">
                    <div class="card-decoration">
                        <div class="decoration-orb"></div>
                    </div>
                    <div class="benefit-icon money-icon">
                        <i class="fas fa-money-bill-wave"></i>
                        <div class="icon-particles">
                            <span class="particle"></span>
                            <span class="particle"></span>
                            <span class="particle"></span>
                        </div>
                    </div>
                    <h3 class="benefit-title">Gaji Kompetitif</h3>
                    <p class="benefit-description">
                        Sistem remunerasi yang adil dan kompetitif sesuai dengan industri dan kinerja, plus bonus tahunan
                    </p>
                    <div class="benefit-highlight" data-aos="zoom-in" data-aos-delay="300">
                        <i class="fas fa-check-circle"></i>
                        <span>Bonus Performa</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="benefit-card health-card">
                    <div class="card-decoration">
                        <div class="decoration-orb"></div>
                    </div>
                    <div class="benefit-icon health-icon">
                        <i class="fas fa-heartbeat"></i>
                        <div class="icon-pulse"></div>
                    </div>
                    <h3 class="benefit-title">Asuransi Kesehatan</h3>
                    <p class="benefit-description">
                        Jaminan kesehatan untuk karyawan dan keluarga dengan coverage yang luas dan layanan premium
                    </p>
                    <div class="benefit-highlight" data-aos="zoom-in" data-aos-delay="400">
                        <i class="fas fa-shield-alt"></i>
                        <span>Coverage Keluarga</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="benefit-card vacation-card">
                    <div class="card-decoration">
                        <div class="decoration-orb"></div>
                    </div>
                    <div class="benefit-icon vacation-icon">
                        <i class="fas fa-plane"></i>
                        <div class="icon-trail"></div>
                    </div>
                    <h3 class="benefit-title">Cuti & Leave</h3>
                    <p class="benefit-description">
                        Cuti tahunan, cuti sakit, dan berbagai jenis leave yang fleksibel untuk work-life balance optimal
                    </p>
                    <div class="benefit-highlight" data-aos="zoom-in" data-aos-delay="500">
                        <i class="fas fa-calendar-alt"></i>
                        <span>18 Hari Cuti/Tahun</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="benefit-card training-card">
                    <div class="card-decoration">
                        <div class="decoration-orb"></div>
                    </div>
                    <div class="benefit-icon training-icon">
                        <i class="fas fa-certificate"></i>
                        <div class="icon-shine"></div>
                    </div>
                    <h3 class="benefit-title">Training & Sertifikasi</h3>
                    <p class="benefit-description">
                        Program pelatihan internal dan eksternal untuk meningkatkan kompetensi dan sertifikasi profesional
                    </p>
                    <div class="benefit-highlight" data-aos="zoom-in" data-aos-delay="600">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Sertifikasi Gratis</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="benefit-card bonus-card">
                    <div class="card-decoration">
                        <div class="decoration-orb"></div>
                    </div>
                    <div class="benefit-icon bonus-icon">
                        <i class="fas fa-trophy"></i>
                        <div class="icon-sparkle"></div>
                    </div>
                    <h3 class="benefit-title">Bonus & Insentif</h3>
                    <p class="benefit-description">
                        Sistem bonus kinerja dan insentif untuk pencapaian target tertentu dengan reward menarik
                    </p>
                    <div class="benefit-highlight" data-aos="zoom-in" data-aos-delay="700">
                        <i class="fas fa-star"></i>
                        <span>Reward System</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                <div class="benefit-card flexibility-card">
                    <div class="card-decoration">
                        <div class="decoration-orb"></div>
                    </div>
                    <div class="benefit-icon flexibility-icon">
                        <i class="fas fa-laptop-house"></i>
                        <div class="icon-waves"></div>
                    </div>
                    <h3 class="benefit-title">Work Flexibility</h3>
                    <p class="benefit-description">
                        Fleksibilitas waktu kerja dan work from home untuk posisi tertentu dengan teknologi terdepan
                    </p>
                    <div class="benefit-highlight" data-aos="zoom-in" data-aos-delay="800">
                        <i class="fas fa-clock"></i>
                        <span>Flexible Hours</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Jobs Section -->
<section class="jobs-section py-5" id="jobs">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <div class="section-badge" data-aos="zoom-in" data-aos-delay="200">
                <i class="fas fa-briefcase"></i>
                <span>Lowongan Kerja</span>
            </div>
            <h2 class="section-title" data-aos="fade-up" data-aos-delay="300">Posisi yang Tersedia</h2>
            <p class="section-description" data-aos="fade-up" data-aos-delay="400">
                Temukan posisi yang sesuai dengan keahlian dan minat Anda
            </p>
        </div>
        
        @if($jobs->count() > 0)
        <div class="jobs-grid">
            <div class="row g-4 justify-content-center">
                @foreach($jobs as $index => $job)
                <div class="col-12 col-md-6 col-lg-4 mb-4 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="job-card h-100 w-100">
                        <div class="job-status">
                            <span class="status-badge status-active">
                                <i class="fas fa-circle"></i>
                                Aktif
                            </span>
                        </div>
                        
                        <div class="job-header">
                            <div class="job-meta">
                                <span class="job-type">{{ $job->employment_type ?? 'Full Time' }}</span>
                                <span class="job-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{ $job->location ?? 'Jakarta' }}
                                </span>
                            </div>
                            
                            <h3 class="job-title">
                                <a href="{{ route('job.detail', $job->slug) }}">{{ $job->title }}</a>
                            </h3>
                            
                            <div class="job-department">
                                <i class="fas fa-building"></i>
                                {{ $job->department ?? 'General' }}
                            </div>
                        </div>
                        
                        <div class="job-content">
                            <p class="job-description">{{ Str::limit($job->summary ?? 'Deskripsi akan segera diperbarui.', 120) }}</p>
                            
                            @if($job->salary_display)
                            <div class="job-salary">
                                <i class="fas fa-money-bill-wave"></i>
                                <span>{{ $job->salary_display }}</span>
                            </div>
                            @endif
                            
                            @if($job->description_html)
                            <div class="job-requirements">
                                <div class="requirements-label">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Persyaratan Utama</span>
                                </div>
                                <div class="requirements-content">
                                    {!! Str::limit(strip_tags($job->description_html), 200) !!}
                                </div>
                            </div>
                            @else
                            <div class="job-requirements">
                                <div class="requirements-label">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Persyaratan Utama</span>
                                </div>
                                <ul class="requirements-list">
                                    <li>Minimal S1 sesuai bidang</li>
                                    <li>Pengalaman kerja relevan</li>
                                    <li>Komunikasi yang baik</li>
                                </ul>
                            </div>
                            @endif
                        </div>
                        
                        <div class="job-footer">
                            <div class="job-posted">
                                <i class="fas fa-clock"></i>
                                <span>{{ $job->created_at->diffForHumans() }}</span>
                            </div>
                            
                            <div class="job-actions">
                                <a href="{{ route('job.detail', $job->slug) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-info-circle"></i>
                                    Detail
                                </a>
                                <a href="{{ route('job.detail', $job->slug) }}#apply" class="btn btn-primary btn-sm">
                                    <i class="fas fa-paper-plane"></i>
                                    Lamar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        <!-- Pagination -->
        <div class="pagination-wrapper text-center mt-5" data-aos="fade-up">
            {{ $jobs->links('pagination::bootstrap-4') }}
        </div>
        
        @else
        <!-- No Jobs Available -->
        <div class="no-jobs text-center" data-aos="fade-up">
            <div class="no-jobs-icon">
                <i class="fas fa-briefcase"></i>
            </div>
            <h3>Belum Ada Lowongan Tersedia</h3>
            <p>Saat ini belum ada posisi yang dibuka. Silakan cek kembali secara berkala atau kirim CV Anda untuk database kami.</p>
            <a href="{{ route('contact') }}" class="btn btn-primary">
                <i class="fas fa-envelope"></i>
                Kirim CV Initialtif
            </a>
        </div>
        @endif
    </div>
</section>

<!-- Recruitment Process Section -->
<section class="recruitment-process py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <div class="section-badge" data-aos="zoom-in" data-aos-delay="200">
                <i class="fas fa-route"></i>
                <span>Proses Rekrutmen</span>
            </div>
            <h2 class="section-title" data-aos="fade-up" data-aos-delay="300">Langkah-Langkah Melamar</h2>
            <p class="section-description" data-aos="fade-up" data-aos-delay="400">
                Proses rekrutmen yang transparan dan profesional untuk memastikan kandidat terbaik
            </p>
        </div>
        
        <div class="process-steps" data-aos="fade-up">
            <div class="step-item" data-aos="fade-up" data-aos-delay="100">
                <div class="step-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h4>Aplikasi</h4>
                <p>Kirim CV dan surat lamaran melalui form online atau email</p>
            </div>
            
            <div class="step-item" data-aos="fade-up" data-aos-delay="200">
                <div class="step-icon">
                    <i class="fas fa-search"></i>
                </div>
                <h4>Screening</h4>
                <p>Tim HR akan melakukan review dokumen dan screening awal</p>
            </div>
            
            <div class="step-item" data-aos="fade-up" data-aos-delay="300">
                <div class="step-icon">
                    <i class="fas fa-comments"></i>
                </div>
                <h4>Interview</h4>
                <p>Wawancara dengan HR dan user untuk mengenal lebih dalam</p>
            </div>
            
            <div class="step-item" data-aos="fade-up" data-aos-delay="400">
                <div class="step-icon">
                    <i class="fas fa-tasks"></i>
                </div>
                <h4>Assessment</h4>
                <p>Tes kemampuan dan psikotes sesuai dengan posisi yang dilamar</p>
            </div>
            
            <div class="step-item" data-aos="fade-up" data-aos-delay="500">
                <div class="step-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h4>Offer</h4>
                <p>Penawaran kerja dan negosiasi package kompensasi</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section py-5" data-aos="fade-up" data-aos-delay="100">
    <div class="container">
        <div class="cta-content text-center" data-aos="zoom-in" data-aos-delay="300">
            <div class="cta-icon" data-aos="bounce-in" data-aos-delay="500">
                <i class="fas fa-rocket"></i>
            </div>
            <h2 class="cta-title" data-aos="fade-up" data-aos-delay="600">Siap Memulai Karier Bersama Kami?</h2>
            <p class="cta-description" data-aos="fade-up" data-aos-delay="700">
                Jangan lewatkan kesempatan untuk menjadi bagian dari tim yang inovatif dan berdedikasi. 
                Mulai perjalanan karier Anda bersama Tali Rejeki!
            </p>
            <div class="cta-actions" data-aos="fade-up" data-aos-delay="800">
                <a href="#jobs" class="btn btn-primary btn-lg me-3" data-aos="fade-right" data-aos-delay="900">
                    <i class="fas fa-search"></i>
                    Lihat Lowongan
                </a>
                <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-lg" data-aos="fade-left" data-aos-delay="1000">
                    <i class="fas fa-envelope"></i>
                    Kirim CV
                </a>
            </div>
        </div>
    </div>
</section>

<style>
/* Page Entrance Animations */
.page-entrance {
    opacity: 0;
    transform: translateY(50px);
    animation: pageEnter 1.2s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}

@keyframes pageEnter {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.stagger-children > * {
    opacity: 0;
    transform: translateY(30px);
    animation: staggerIn 0.8s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}

.stagger-children > *:nth-child(1) { animation-delay: 0.1s; }
.stagger-children > *:nth-child(2) { animation-delay: 0.2s; }
.stagger-children > *:nth-child(3) { animation-delay: 0.3s; }
.stagger-children > *:nth-child(4) { animation-delay: 0.4s; }
.stagger-children > *:nth-child(5) { animation-delay: 0.5s; }
.stagger-children > *:nth-child(6) { animation-delay: 0.6s; }

@keyframes staggerIn {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Enhanced AOS Custom Animations */
[data-aos="bounce-in"] {
    transform: scale(0.3);
    opacity: 0;
}

[data-aos="bounce-in"].aos-animate {
    animation: bounceIn 1s cubic-bezier(0.215, 0.610, 0.355, 1) forwards;
}

@keyframes bounceIn {
    0% {
        opacity: 0;
        transform: scale(0.3);
    }
    50% {
        opacity: 1;
        transform: scale(1.1);
    }
    70% {
        transform: scale(0.9);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

[data-aos="zoom-in-up"] {
    opacity: 0;
    transform: scale(0.8) translateY(50px);
}

[data-aos="zoom-in-up"].aos-animate {
    animation: zoomInUp 0.8s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}

@keyframes zoomInUp {
    to {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}

/* Enhanced Modern Career Page with Elegant Design */
:root {
    --career-primary: #8B0000;
    --career-secondary: #DC143C;
    --career-accent: #FF6B6B;
    --career-gold: #FFD700;
    --career-text-primary: #2d3748;
    --career-text-secondary: #718096;
    --career-bg-primary: #ffffff;
    --career-bg-secondary: #f7fafc;
    --career-bg-tertiary: #edf2f7;
    --career-border: #e2e8f0;
    --career-shadow: rgba(0, 0, 0, 0.1);
    --career-shadow-lg: rgba(0, 0, 0, 0.15);
    --career-radius: 20px;
    --career-radius-lg: 32px;
}

/* Dark Theme Variables */
body.dark-theme {
    --career-text-primary: #f7fafc;
    --career-text-secondary: #a0aec0;
    --career-bg-primary: #1a202c;
    --career-bg-secondary: #2d3748;
    --career-bg-tertiary: #4a5568;
    --career-border: #4a5568;
    --career-shadow: rgba(0, 0, 0, 0.3);
    --career-shadow-lg: rgba(0, 0, 0, 0.4);
}

/* Enhanced Page Header */
.page-header {
    color: white;
    padding: 70px 0 80px;
    position: relative;
    overflow: hidden;
    min-height: 80vh;
    height: auto;
    display: flex;
    align-items: center;
}

.page-header-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center top;
    background-repeat: no-repeat;
    z-index: 1;
    filter: blur(5px);
}

.page-header-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
        radial-gradient(circle at 30% 40%, rgba(0, 0, 0, 0.3) 0%, transparent 70%),
        radial-gradient(circle at 70% 60%, rgba(0, 0, 0, 0.2) 0%, transparent 70%),
        linear-gradient(135deg, rgba(0, 0, 0, 0.4) 0%, rgba(0, 0, 0, 0.2) 50%, rgba(0, 0, 0, 0.3) 100%);
    backdrop-filter: blur(2px);
    z-index: 2;
}

.page-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
        radial-gradient(circle at 25% 25%, rgba(255, 255, 255, 0.15) 0%, transparent 50%),
        radial-gradient(circle at 75% 75%, rgba(255, 255, 255, 0.08) 0%, transparent 50%),
        linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.05) 70%);
    animation: headerFloat 25s ease-in-out infinite;
    z-index: 1;
}

@keyframes headerFloat {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    25% { transform: translate(20px, -20px) rotate(0.5deg); }
    50% { transform: translate(-15px, 15px) rotate(-0.5deg); }
    75% { transform: translate(25px, -10px) rotate(0.3deg); }
}

.header-decoration {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: 3;
}

.decoration-circle {
    position: absolute;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.03));
    backdrop-filter: blur(10px);
    animation: circleFloat 20s ease-in-out infinite;
}


@keyframes circleFloat {
    0%, 100% { transform: translate(0, 0) scale(1); }
    33% { transform: translate(30px, -30px) scale(1.1); }
    66% { transform: translate(-20px, 20px) scale(0.9); }
}

.header-content {
    position: relative;
    z-index: 4;
}

.header-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(20px);
    color: white;
    padding: 12px 24px;
    border-radius: 30px;
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 2rem;
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    text-transform: uppercase;
    letter-spacing: 1px;
}

.page-title {
    font-size: 3.5rem;
    font-weight: 900;
    margin-bottom: 1.5rem;
    text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    line-height: 1.1;
}

.title-main {
    display: block;
    background: linear-gradient(135deg, #ffffff, #f0f8ff, #ffffff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.title-highlight {
    display: block;
    background: linear-gradient(135deg, var(--career-gold), #FFF8DC, var(--career-gold));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-size: 0.8em;
    margin-top: 0.5rem;
}

.page-description {
    font-size: 1.2rem;
    opacity: 0.95;
    max-width: 700px;
    margin: 0 auto 3rem;
    line-height: 1.7;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.header-stats {
    display: flex;
    justify-content: center;
    gap: 2rem;
    margin-top: 3rem;
}

.stat-item {
    text-align: center;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    padding: 1.5rem 2rem;
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s ease;
}

.stat-item:hover {
    transform: translateY(-8px) scale(1.05);
    background: rgba(255, 255, 255, 0.2);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
}

.stat-number {
    font-size: 2rem;
    font-weight: 900;
    display: block;
    background: linear-gradient(135deg, var(--career-gold), #FFF8DC);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.stat-label {
    font-size: 0.9rem;
    font-weight: 600;
    opacity: 0.9;
    margin-top: 0.5rem;
}

/* Enhanced Section Badge */
.section-badge {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: linear-gradient(135deg, var(--career-primary), var(--career-secondary));
    color: white;
    padding: 12px 24px;
    border-radius: 25px;
    font-size: 13px;
    font-weight: 700;
    margin-bottom: 1.5rem;
    box-shadow: 0 8px 25px rgba(139, 0, 0, 0.3);
    text-transform: uppercase;
    letter-spacing: 1px;
    position: relative;
    overflow: hidden;
}

.section-badge::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.8s;
}

.section-badge:hover::before {
    left: 100%;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--career-text-primary);
    margin-bottom: 1.5rem;
    position: relative;
    padding-bottom: 15px;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(135deg, var(--career-primary), var(--career-secondary), var(--career-accent));
    border-radius: 2px;
}

.section-description {
    font-size: 1.1rem;
    color: var(--career-text-secondary);
    line-height: 1.8;
    max-width: 800px;
    margin: 0 auto;
}

/* Enhanced Company Culture */
.company-culture {
    padding: 100px 0;
    background: transparent;
    position: relative;
}

.feature-item {
    display: flex;
    align-items: flex-start;
    gap: 1.5rem;
    margin-bottom: 2rem;
    padding: 2rem;
    background: var(--career-bg-primary);
    border-radius: var(--career-radius-lg);
    border: 2px solid var(--career-border);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
    box-shadow: 0 10px 40px var(--career-shadow);
}

.feature-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
    background: linear-gradient(135deg, var(--career-primary), var(--career-secondary));
    transform: scaleY(0);
    transition: transform 0.4s ease;
}

.feature-item:hover {
    transform: translateY(-12px) translateX(12px);
    box-shadow: 0 25px 60px var(--career-shadow-lg);
    border-color: var(--career-secondary);
}

.feature-item:hover::before {
    transform: scaleY(1);
}

.feature-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, var(--career-primary), var(--career-secondary));
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.8rem;
    flex-shrink: 0;
    box-shadow: 0 10px 30px rgba(139, 0, 0, 0.3);
    position: relative;
    overflow: hidden;
}

.icon-glow {
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transform: rotate(45deg);
    transition: all 0.6s;
}

.feature-item:hover .icon-glow {
    animation: iconGlow 1s ease-in-out;
}

@keyframes iconGlow {
    0% { transform: rotate(45deg) translate(-100%, -100%); }
    100% { transform: rotate(45deg) translate(100%, 100%); }
}

.feature-content h4 {
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--career-text-primary);
    margin-bottom: 0.8rem;
    text-shadow: 0 1px 3px var(--career-shadow);
}

body.dark-theme .feature-content h4 {
    color: var(--career-text-primary);
}

.feature-content p {
    color: var(--career-text-secondary);
    margin: 0 0 1rem 0;
    line-height: 1.7;
    font-size: 1rem;
    text-shadow: 0 1px 2px var(--career-shadow);
}

body.dark-theme .feature-content p {
    color: var(--career-text-secondary);
}

/* Dark Mode Support for Jobs Section */
body.dark-theme .job-card {
    background: var(--career-bg-primary);
    border-color: var(--career-border);
    box-shadow: 0 10px 40px var(--career-shadow);
}

body.dark-theme .job-card:hover {
    border-color: var(--career-secondary);
    box-shadow: 0 25px 60px var(--career-shadow-lg);
}

body.dark-theme .job-title a {
    color: var(--career-text-primary);
}

body.dark-theme .job-title a:hover {
    color: var(--career-primary);
}

body.dark-theme .job-description {
    color: var(--career-text-secondary);
}

body.dark-theme .job-department {
    color: var(--career-text-secondary);
}

body.dark-theme .job-location {
    color: var(--career-text-secondary);
}

body.dark-theme .job-requirements {
    background: linear-gradient(135deg, 
        rgba(139, 0, 0, 0.08) 0%, 
        rgba(220, 20, 60, 0.05) 100%);
    border-color: rgba(139, 0, 0, 0.15);
}

body.dark-theme .requirements-label {
    color: var(--career-text-primary);
}

body.dark-theme .requirements-content {
    color: var(--career-text-secondary);
}

body.dark-theme .requirements-list li {
    color: var(--career-text-secondary);
}

body.dark-theme .job-posted {
    color: var(--career-text-secondary);
    background: var(--career-bg-secondary);
    border-color: var(--career-border);
}

body.dark-theme .job-footer {
    border-top-color: var(--career-border);
}

.feature-progress {
    height: 6px;
    background: var(--career-bg-secondary);
    border-radius: 3px;
    overflow: hidden;
    margin-top: 1rem;
}

.progress-bar {
    height: 100%;
    background: linear-gradient(135deg, var(--career-primary), var(--career-secondary));
    border-radius: 3px;
    width: 0;
    transition: width 2s ease-in-out;
}

/* Enhanced Culture Visual */
.culture-visual {
    position: relative;
}

.image-container {
    position: relative;
    border-radius: var(--career-radius-lg);
    overflow: hidden;
    box-shadow: 0 25px 60px var(--career-shadow-lg);
    aspect-ratio: 4/5;
    width: 100%;
    height: auto;
    max-height: 800px;
}

.image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center center;
    transition: all 0.4s ease;
    border-radius: var(--career-radius-lg);
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(139, 0, 0, 0.8), rgba(220, 20, 60, 0.6));
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all 0.4s ease;
    border-radius: var(--career-radius-lg);
}

.overlay-content {
    text-align: center;
    color: white;
    transform: translateY(20px);
    transition: all 0.4s ease;
}

.image-container:hover .overlay-content {
    transform: translateY(0);
}

.overlay-content i {
    font-size: 4rem;
    margin-bottom: 1rem;
    animation: pulse 2s infinite;
    color: white;
    text-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
}

.overlay-content span {
    display: block;
    font-weight: 700;
    font-size: 1.1rem;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    letter-spacing: 0.5px;
}

.visual-decoration {
    position: absolute;
    top: -20px;
    right: -20px;
    z-index: -1;
}

.decoration-dot {
    width: 12px;
    height: 12px;
    background: var(--career-secondary);
    border-radius: 50%;
    margin: 8px;
    animation: dotFloat 3s ease-in-out infinite;
}

.decoration-dot:nth-child(2) {
    animation-delay: 1s;
}

.decoration-dot:nth-child(3) {
    animation-delay: 2s;
}

@keyframes dotFloat {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

/* Enhanced Benefits Section */
.benefits-section {
    padding: 100px 0;
    background: var(--career-bg-secondary);
    position: relative;
}

.benefits-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
        radial-gradient(circle at 20% 20%, rgba(139, 0, 0, 0.03) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(220, 20, 60, 0.03) 0%, transparent 50%);
    z-index: 1;
}

.benefits-section .container {
    position: relative;
    z-index: 2;
}

.benefit-card {
    background: var(--career-bg-primary);
    border-radius: var(--career-radius-lg);
    padding: 2.5rem;
    text-align: center;
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    border: 2px solid var(--career-border);
    height: 100%;
    position: relative;
    overflow: hidden;
    box-shadow: 0 15px 50px var(--career-shadow);
}

.card-decoration {
    position: absolute;
    top: 0;
    right: 0;
    width: 100px;
    height: 100px;
    overflow: hidden;
}

.decoration-orb {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--career-primary), var(--career-secondary));
    border-radius: 50%;
    position: absolute;
    top: -30px;
    right: -30px;
    opacity: 0.1;
    transition: all 0.4s ease;
}

.benefit-card:hover .decoration-orb {
    opacity: 0.2;
    transform: scale(1.5);
}

.benefit-card:hover {
    transform: translateY(-15px) scale(1.03);
    border-color: var(--career-secondary);
    box-shadow: 0 30px 80px var(--career-shadow-lg);
}

.benefit-icon {
    width: 80px;
    height: 80px;
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 2rem;
    margin: 0 auto 2rem;
    position: relative;
    z-index: 2;
    transition: all 0.4s ease;
    overflow: hidden;
}

.money-icon {
    background: linear-gradient(135deg, #16a34a, #22c55e);
}

.health-icon {
    background: linear-gradient(135deg, #dc2626, #ef4444);
}

.vacation-icon {
    background: linear-gradient(135deg, #0ea5e9, #38bdf8);
}

.training-icon {
    background: linear-gradient(135deg, #7c3aed, #a855f7);
}

.bonus-icon {
    background: linear-gradient(135deg, #f59e0b, #fbbf24);
}

.flexibility-icon {
    background: linear-gradient(135deg, #059669, #10b981);
}

/* Icon Animations */
.icon-particles {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.particle {
    position: absolute;
    width: 4px;
    height: 4px;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 50%;
}

.benefit-card:hover .particle {
    animation: particleFloat 1.5s ease-out;
}

@keyframes particleFloat {
    0% { transform: translate(0, 0) scale(0); opacity: 1; }
    100% { transform: translate(var(--x, 20px), var(--y, -20px)) scale(1); opacity: 0; }
}

.particle:nth-child(1) { --x: 20px; --y: -30px; animation-delay: 0s; }
.particle:nth-child(2) { --x: -25px; --y: -20px; animation-delay: 0.2s; }
.particle:nth-child(3) { --x: 15px; --y: -35px; animation-delay: 0.4s; }

.icon-pulse {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100%;
    height: 100%;
    border: 2px solid rgba(255, 255, 255, 0.5);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    animation: pulse 2s infinite;
}

.icon-trail {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 20px;
    height: 2px;
    background: rgba(255, 255, 255, 0.7);
    transform: translate(-50%, -50%) rotate(45deg);
}

.icon-shine {
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.3) 50%, transparent 70%);
    transform: rotate(45deg);
    transition: all 0.6s;
}

.benefit-card:hover .icon-shine {
    animation: shine 1s ease-in-out;
}

@keyframes shine {
    0% { transform: rotate(45deg) translate(-100%, -100%); }
    100% { transform: rotate(45deg) translate(100%, 100%); }
}

.icon-sparkle {
    position: absolute;
    top: 10%;
    right: 10%;
    width: 8px;
    height: 8px;
    background: rgba(255, 255, 255, 0.9);
    transform: rotate(45deg);
}

.icon-sparkle::before,
.icon-sparkle::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: inherit;
}

.icon-sparkle::before {
    transform: rotate(90deg);
}

.benefit-card:hover .icon-sparkle {
    animation: sparkle 1s ease-in-out;
}

@keyframes sparkle {
    0%, 100% { opacity: 0; transform: rotate(45deg) scale(0); }
    50% { opacity: 1; transform: rotate(45deg) scale(1); }
}

.icon-waves {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 120%;
    height: 120%;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    animation: waves 3s infinite;
}

@keyframes waves {
    0% { transform: translate(-50%, -50%) scale(0.8); opacity: 1; }
    100% { transform: translate(-50%, -50%) scale(1.2); opacity: 0; }
}

.benefit-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--career-text-primary);
    margin-bottom: 1rem;
    position: relative;
    z-index: 2;
}

.benefit-description {
    color: var(--career-text-secondary);
    line-height: 1.7;
    margin: 0 0 1.5rem 0;
    font-size: 1rem;
    position: relative;
    z-index: 2;
}

.benefit-highlight {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, rgba(139, 0, 0, 0.1), rgba(220, 20, 60, 0.1));
    color: var(--career-primary);
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 600;
    border: 1px solid rgba(139, 0, 0, 0.2);
    margin-top: auto;
}

/* Responsive Design */
@media (max-width: 768px) {
    .page-title {
        font-size: 2.5rem;
    }
    
    .header-stats {
        flex-direction: column;
        gap: 1rem;
        align-items: center;
    }
    
    .stat-item {
        padding: 1rem 1.5rem;
        min-width: 200px;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .feature-item {
        text-align: center;
        flex-direction: column;
        align-items: center;
        padding: 1.5rem;
    }
    
    .benefit-card {
        padding: 2rem;
    }
    
    .company-culture,
    .benefits-section {
        padding: 80px 0;
    }
}

@media (max-width: 480px) {
    .page-title {
        font-size: 2rem;
    }
    
    .title-highlight {
        font-size: 1.5rem;
    }
    
    .header-stats {
        gap: 0.8rem;
    }
    
    .stat-item {
        padding: 0.8rem 1rem;
        min-width: 150px;
    }
    
    .stat-number {
        font-size: 1.5rem;
    }
    
    .feature-item {
        padding: 1.2rem;
    }
    
    .feature-icon {
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
    }
    
    .benefit-card {
        padding: 1.5rem;
    }
    
    .benefit-icon {
        width: 70px;
        height: 70px;
        font-size: 1.8rem;
    }
    
    .company-culture,
    .benefits-section {
        padding: 60px 0;
    }
}

/* Animation triggers */
.feature-item[data-aos="fade-up"].aos-animate .progress-bar {
    width: var(--progress, 0%);
}

.feature-item[data-aos="fade-up"].aos-animate .progress-bar[data-progress="90"] {
    --progress: 90%;
}

.feature-item[data-aos="fade-up"].aos-animate .progress-bar[data-progress="85"] {
    --progress: 85%;
}

.feature-item[data-aos="fade-up"].aos-animate .progress-bar[data-progress="95"] {
    --progress: 95%;
}

/* Company Culture Section */
.company-culture {
    padding: 80px 0;
    background: transparent;
}

.culture-features {
    margin-top: 2rem;
}

.feature-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    margin-bottom: 1.5rem;
    padding: 20px;
    background: var(--career-bg-secondary);
    border-radius: var(--career-radius);
    border: 1px solid var(--career-border);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.feature-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 3px;
    height: 100%;
    background: linear-gradient(135deg, var(--career-primary), var(--career-secondary));
    transform: scaleY(0);
    transition: transform 0.3s ease;
}

.feature-item:hover {
    transform: translateY(-8px) translateX(8px);
    box-shadow: 0 15px 40px var(--career-shadow-lg);
    background: var(--career-bg-primary);
}

.feature-item:hover::before {
    transform: scaleY(1);
}

.feature-icon {
    width: 56px;
    height: 56px;
    background: linear-gradient(135deg, var(--career-primary), var(--career-secondary));
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.3rem;
    flex-shrink: 0;
    box-shadow: 0 6px 20px rgba(139, 0, 0, 0.3);
    position: relative;
    overflow: hidden;
}

.feature-icon::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transform: rotate(45deg);
    transition: all 0.6s;
}

.feature-item:hover .feature-icon::before {
    top: -150%;
    right: -150%;
}

.feature-content h4 {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--career-text-primary);
    margin-bottom: 0.5rem;
    position: relative;
}

.feature-content p {
    color: var(--career-text-secondary);
    margin: 0;
    line-height: 1.6;
    font-size: 0.95rem;
}

.culture-visual {
    position: relative;
}

/* Benefits Section */
.benefits-section {
    padding: 80px 0;
    background: var(--career-bg-secondary);
}

.benefit-card {
    background: var(--career-bg-primary);
    border-radius: var(--career-radius-lg);
    padding: 2rem;
    text-align: center;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: 2px solid var(--career-border);
    height: 100%;
    position: relative;
    overflow: hidden;
    box-shadow: 0 8px 30px var(--career-shadow);
}

.benefit-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, var(--career-primary), var(--career-secondary), var(--career-accent));
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 1;
}

.benefit-card:hover {
    transform: translateY(-12px) scale(1.03);
    border-color: var(--career-secondary);
    box-shadow: 0 25px 50px var(--career-shadow-lg);
}

.benefit-card:hover::before {
    opacity: 0.05;
}

.benefit-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, var(--career-primary), var(--career-secondary));
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.6rem;
    margin: 0 auto 1.5rem;
    position: relative;
    z-index: 2;
    box-shadow: 0 8px 25px rgba(139, 0, 0, 0.3);
    transition: all 0.3s ease;
}

.benefit-card:hover .benefit-icon {
    transform: scale(1.1) rotate(5deg);
    box-shadow: 0 12px 35px rgba(139, 0, 0, 0.4);
}

.benefit-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--career-text-primary);
    margin-bottom: 1rem;
    position: relative;
    z-index: 2;
}

.benefit-description {
    color: var(--career-text-secondary);
    line-height: 1.6;
    margin: 0;
    font-size: 0.95rem;
    position: relative;
    z-index: 2;
}

/* Jobs Section */
.jobs-section {
    padding: 100px 0;
    background: transparent;
    position: relative;
}

.jobs-grid {
    margin-bottom: 3rem;
    position: relative;
    z-index: 1;
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
}

.jobs-grid .row {
    justify-content: center;
}

.jobs-grid [class*="col-"] {
    display: flex;
    justify-content: center;
}

.job-card {
    background: var(--career-bg-primary);
    border-radius: var(--career-radius-lg);
    padding: 2rem;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: 2px solid var(--career-border);
    position: relative;
    overflow: hidden;
    box-shadow: 0 10px 40px var(--career-shadow);
    height: 100%;
    display: flex;
    flex-direction: column;
    max-width: 380px;
    width: 100%;
}

.job-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
    background: linear-gradient(135deg, var(--career-primary), var(--career-secondary));
    transition: all 0.3s ease;
}

.job-card::after {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, transparent 40%, rgba(255, 255, 255, 0.1) 50%, transparent 60%);
    transform: rotate(45deg);
    transition: all 0.6s ease;
    opacity: 0;
}

.job-card:hover {
    transform: translateY(-12px) scale(1.03);
    border-color: var(--career-secondary);
    box-shadow: 0 25px 60px var(--career-shadow-lg);
}

.job-card:hover::before {
    width: 8px;
    background: linear-gradient(135deg, var(--career-secondary), var(--career-accent));
}

.job-card:hover::after {
    opacity: 1;
    animation: cardShine 0.6s ease-out;
}

@keyframes cardShine {
    0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
    100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
}

.job-status {
    position: absolute;
    top: 1rem;
    right: 1rem;
    z-index: 2;
}

.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #16a34a, #22c55e);
    color: white;
    padding: 0.4rem 0.8rem;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 15px rgba(22, 163, 74, 0.3);
}

.status-badge i {
    font-size: 6px;
    animation: statusPulse 2s ease-in-out infinite;
}

@keyframes statusPulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

.job-header {
    margin-bottom: 1.5rem;
}

.job-meta {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
    flex-wrap: wrap;
}

.job-type {
    background: linear-gradient(135deg, var(--career-primary), var(--career-secondary));
    color: white;
    padding: 0.3rem 0.8rem;
    border-radius: 15px;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 12px rgba(139, 0, 0, 0.2);
}

.job-location {
    color: var(--career-text-secondary);
    font-size: 13px;
    display: flex;
    align-items: center;
    gap: 0.3rem;
    font-weight: 500;
}

.job-title {
    font-size: 1.4rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.job-title a {
    color: var(--career-text-primary);
    text-decoration: none;
    transition: all 0.3s ease;
    position: relative;
}

.job-title a::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 0;
    height: 2px;
    background: linear-gradient(135deg, var(--career-primary), var(--career-secondary));
    transition: width 0.3s ease;
}

.job-title a:hover {
    color: var(--career-primary);
}

.job-title a:hover::after {
    width: 100%;
}

.job-department {
    color: var(--career-text-secondary);
    font-size: 13px;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 500;
}

.job-content {
    margin-bottom: 1.5rem;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.job-description {
    color: var(--career-text-secondary);
    line-height: 1.6;
    margin-bottom: 1rem;
    font-size: 0.95rem;
}

.job-salary {
    color: #16a34a;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 1.5rem;
    font-size: 1rem;
    background: rgba(22, 163, 74, 0.1);
    padding: 0.8rem 1.2rem;
    border-radius: 12px;
    border: 1px solid rgba(22, 163, 74, 0.2);
    transition: all 0.3s ease;
}

.job-salary:hover {
    background: rgba(22, 163, 74, 0.15);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(22, 163, 74, 0.2);
}

.job-requirements {
    margin-bottom: 1.5rem;
    padding: 1.2rem;
    background: linear-gradient(135deg, 
        rgba(139, 0, 0, 0.05) 0%, 
        rgba(220, 20, 60, 0.03) 100%);
    border-radius: 12px;
    border: 1px solid rgba(139, 0, 0, 0.1);
}

.requirements-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 0.8rem;
    font-weight: 600;
    color: var(--career-text-primary);
    font-size: 0.9rem;
}

.requirements-label i {
    color: var(--career-primary);
    font-size: 14px;
}

.requirements-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.requirements-list li {
    color: var(--career-text-secondary);
    font-size: 0.85rem;
    margin-bottom: 0.4rem;
    padding-left: 1.2rem;
    position: relative;
    line-height: 1.4;
}

.requirements-list li::before {
    content: '•';
    color: var(--career-primary);
    font-weight: bold;
    position: absolute;
    left: 0;
    top: 0;
}

.requirements-content {
    color: var(--career-text-secondary);
    font-size: 0.85rem;
    line-height: 1.5;
    margin: 0;
    padding: 0.8rem 0;
    text-align: justify;
    word-wrap: break-word;
    overflow-wrap: break-word;
}

.requirements-content p {
    margin: 0 0 0.5rem 0;
    color: inherit;
}

.requirements-content ul,
.requirements-content ol {
    margin: 0.5rem 0;
    padding-left: 1.2rem;
}

.requirements-content li {
    margin-bottom: 0.3rem;
    color: inherit;
}

.job-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 1.5rem;
    border-top: 2px solid var(--career-border);
    flex-wrap: wrap;
    gap: 1rem;
    margin-top: auto;
}

.job-posted {
    color: var(--career-text-secondary);
    font-size: 13px;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 500;
    background: var(--career-bg-secondary);
    padding: 0.4rem 0.8rem;
    border-radius: 8px;
    border: 1px solid var(--career-border);
}

.job-posted i {
    color: var(--career-primary);
}

.job-actions {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.job-actions .btn {
    border-radius: 12px;
    padding: 0.6rem 1.2rem;
    font-weight: 600;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.job-actions .btn-outline-primary {
    border: 2px solid var(--career-primary);
    color: var(--career-primary);
    background: transparent;
}

.job-actions .btn-outline-primary:hover {
    background: var(--career-primary);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(139, 0, 0, 0.3);
}

.job-actions .btn-primary {
    background: linear-gradient(135deg, var(--career-primary), var(--career-secondary));
    border: none;
    color: white;
}

.job-actions .btn-primary:hover {
    background: linear-gradient(135deg, var(--career-secondary), var(--career-accent));
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(139, 0, 0, 0.4);
}

.job-actions .btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.5s;
}

.job-actions .btn:hover::before {
    left: 100%;
}

/* No Jobs Enhanced */
.no-jobs {
    padding: 5rem 2rem;
    text-align: center;
    background: var(--career-bg-primary);
    border-radius: var(--career-radius-lg);
    border: 2px solid var(--career-border);
    box-shadow: 0 15px 40px var(--career-shadow);
    position: relative;
    overflow: hidden;
}

.no-jobs::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, 
        rgba(139, 0, 0, 0.03) 0%, 
        transparent 50%, 
        rgba(220, 20, 60, 0.03) 100%);
    pointer-events: none;
}

.no-jobs-icon {
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, var(--career-bg-secondary), var(--career-bg-tertiary));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3.5rem;
    color: var(--career-text-secondary);
    margin: 0 auto 2rem;
    border: 3px solid var(--career-border);
    transition: all 0.4s ease;
    position: relative;
    z-index: 1;
}

.no-jobs-icon:hover {
    transform: scale(1.1) rotate(10deg);
    color: var(--career-primary);
    border-color: var(--career-primary);
    box-shadow: 0 15px 30px var(--career-shadow-lg);
}

.no-jobs h3 {
    color: var(--career-text-primary);
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 1rem;
    position: relative;
    z-index: 1;
}

.no-jobs p {
    color: var(--career-text-secondary);
    font-size: 1.1rem;
    line-height: 1.6;
    margin-bottom: 2rem;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
    position: relative;
    z-index: 1;
}

.no-jobs .btn {
    position: relative;
    z-index: 1;
    border-radius: 15px;
    padding: 1rem 2rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.4s ease;
}

.no-jobs .btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 30px rgba(139, 0, 0, 0.3);
}

.no-jobs-icon:hover {
    transform: scale(1.05);
    background: var(--career-bg-primary);
    box-shadow: 0 15px 40px var(--career-shadow);
}

.no-jobs h3 {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--career-text-primary);
    margin-bottom: 1rem;
}

.no-jobs p {
    color: var(--career-text-secondary);
    margin-bottom: 2rem;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
    line-height: 1.6;
    font-size: 1.05rem;
}

/* Process Steps - Fixed Inline Layout */
.recruitment-process {
    padding: 120px 0;
    overflow-x: hidden;
}

.process-steps {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: nowrap;
    gap: 1rem;
    max-width: 1200px;
    margin: 0 auto;
    padding: 3rem 20px 2rem;
    position: relative;
}

.step-item {
    text-align: center;
    flex: 1;
    min-width: 0;
    position: relative;
    padding-top: 1rem;
}

.step-item:not(:last-child)::after {
    content: '';
    position: absolute;
    top: 60px;
    right: -0.5rem;
    width: 1rem;
    height: 3px;
    background: linear-gradient(90deg, var(--career-primary), var(--career-secondary));
    border-radius: 2px;
    z-index: 1;
}

.step-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--career-primary), var(--career-secondary));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.8rem;
    margin: 0 auto 1rem;
    box-shadow: 0 10px 30px rgba(139, 0, 0, 0.3);
    transition: all 0.3s ease;
    position: relative;
    z-index: 2;
}

.step-icon::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transform: rotate(45deg);
    transition: all 0.6s;
}

.step-item:hover .step-icon {
    transform: scale(1.05) rotate(5deg);
    box-shadow: 0 15px 40px rgba(139, 0, 0, 0.4);
}

.step-item:hover .step-icon::before {
    top: -150%;
    right: -150%;
}

.step-item h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--career-text-primary);
    margin-bottom: 0.5rem;
    line-height: 1.2;
    word-wrap: break-word;
    hyphens: auto;
}

.step-item p {
    color: var(--career-text-secondary);
    font-size: 0.85rem;
    line-height: 1.4;
    margin: 0;
    word-wrap: break-word;
    hyphens: auto;
}

/* CTA Section */
.cta-section {
    background: linear-gradient(135deg, var(--career-primary) 0%, var(--career-secondary) 50%, var(--career-primary) 100%);
    color: white;
    position: relative;
    overflow: hidden;
    padding: 80px 0;
}

.cta-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
        radial-gradient(circle at 30% 40%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 70% 60%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
    animation: float 20s ease-in-out infinite;
    z-index: 1;
}

.cta-content {
    max-width: 700px;
    margin: 0 auto;
    position: relative;
    z-index: 2;
    text-align: center;
}

.cta-icon {
    width: 100px;
    height: 100px;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    margin: 0 auto 2rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s ease;
}

.cta-icon:hover {
    transform: scale(1.05) rotate(5deg);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
}

.cta-title {
    font-size: 2.2rem;
    font-weight: 800;
    margin-bottom: 1rem;
    text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}

.cta-description {
    font-size: 1.1rem;
    opacity: 0.95;
    margin-bottom: 2rem;
    line-height: 1.6;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.cta-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

/* Button Styles */
.btn-primary {
    background: linear-gradient(135deg, var(--career-primary), var(--career-secondary));
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 12px;
    font-weight: 700;
    font-size: 14px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    text-decoration: none;
    box-shadow: 0 6px 20px rgba(139, 0, 0, 0.3);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    position: relative;
    overflow: hidden;
}

.btn-primary::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.6s;
}

.btn-primary:hover::before {
    left: 100%;
}

.btn-primary:hover {
    background: linear-gradient(135deg, var(--career-secondary), var(--career-accent));
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 10px 30px rgba(139, 0, 0, 0.4);
    color: white;
    text-decoration: none;
}

.btn-outline-primary {
    background: transparent;
    color: var(--career-primary);
    border: 2px solid var(--career-primary);
    padding: 10px 22px;
    border-radius: 12px;
    font-weight: 700;
    font-size: 14px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    position: relative;
    overflow: hidden;
}

.btn-outline-primary::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, var(--career-primary), var(--career-secondary));
    transition: left 0.6s;
    z-index: -1;
}

.btn-outline-primary:hover::before {
    left: 0;
}

.btn-outline-primary:hover {
    border-color: var(--career-secondary);
    color: white;
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 8px 25px rgba(139, 0, 0, 0.3);
    text-decoration: none;
}

/* CTA Section Button Overrides */
.cta-section .btn-primary {
    background: white;
    color: var(--career-primary);
    border: none;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

.cta-section .btn-primary:hover {
    background: #f8f9fa;
    color: var(--career-primary);
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.3);
}

.cta-section .btn-outline-primary {
    background: transparent;
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.4);
    backdrop-filter: blur(10px);
}

.cta-section .btn-outline-primary::before {
    background: rgba(255, 255, 255, 0.2);
}

.cta-section .btn-outline-primary:hover {
    border-color: rgba(255, 255, 255, 0.8);
    color: white;
    transform: translateY(-3px) scale(1.02);
}

.btn-sm {
    padding: 8px 16px;
    font-size: 12px;
}

.btn-lg {
    padding: 14px 28px;
    font-size: 15px;
}

/* Responsive Design for Fixed Inline Steps */
@media (min-width: 1400px) {
    .jobs-grid {
        max-width: 1400px;
    }
    
    .job-card {
        max-width: 400px;
    }
}

@media (max-width: 1024px) {
    .recruitment-process {
        padding: 100px 0;
    }
    
    .process-steps {
        gap: 0.8rem;
        padding: 2.5rem 15px 1.5rem;
    }
    
    .step-item:not(:last-child)::after {
        width: 0.8rem;
        right: -0.4rem;
        top: 55px;
    }
    
    .step-icon {
        width: 70px;
        height: 70px;
        font-size: 1.6rem;
    }
    
    .step-item h4 {
        font-size: 1rem;
    }
    
    .step-item p {
        font-size: 0.8rem;
    }
}

@media (max-width: 768px) {
    .page-title {
        font-size: 2rem;
    }
    
    .section-title {
        font-size: 1.8rem;
    }
    
    .cta-title {
        font-size: 1.8rem;
    }
    
    .job-footer {
        flex-direction: column;
        align-items: stretch;
        text-align: center;
    }
    
    .job-actions {
        justify-content: center;
    }
    
    .cta-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .feature-item {
        text-align: center;
        flex-direction: column;
        align-items: center;
    }
    
    .process-steps {
        gap: 0.6rem;
        padding: 2rem 10px 1rem;
    }
    
    .step-item:not(:last-child)::after {
        width: 0.6rem;
        right: -0.3rem;
        top: 50px;
        height: 2px;
    }
    
    .step-icon {
        width: 60px;
        height: 60px;
        font-size: 1.4rem;
        margin-bottom: 0.8rem;
    }
    
    .step-item h4 {
        font-size: 0.9rem;
        margin-bottom: 0.4rem;
    }
    
    .step-item p {
        font-size: 0.75rem;
        line-height: 1.3;
    }
    
    .benefit-card {
        padding: 1.5rem;
    }
    
    .job-card {
        padding: 1.5rem;
    }
    
    .company-culture,
    .benefits-section,
    .jobs-section,
    .recruitment-process,
    .cta-section {
        padding: 80px 0;
    }
}

@media (max-width: 480px) {
    .page-title {
        font-size: 1.6rem;
    }
    
    .job-card {
        padding: 1.2rem;
    }
    
    .benefit-card {
        padding: 1.2rem;
    }
    
    .job-meta {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .job-actions {
        flex-direction: column;
    }
    
    .cta-icon {
        width: 80px;
        height: 80px;
        font-size: 2.5rem;
    }
    
    .process-steps {
        gap: 0.4rem;
        padding: 1.5rem 5px 1rem;
    }
    
    .step-item {
        padding-top: 0.5rem;
    }
    
    .step-item:not(:last-child)::after {
        width: 0.4rem;
        right: -0.2rem;
        top: 45px;
        height: 2px;
    }
    
    .step-icon {
        width: 50px;
        height: 50px;
        font-size: 1.2rem;
        margin-bottom: 0.6rem;
    }
    
    .step-item h4 {
        font-size: 0.8rem;
        margin-bottom: 0.3rem;
        line-height: 1.1;
    }
    
    .step-item p {
        font-size: 0.7rem;
        line-height: 1.2;
    }
    
    .benefit-icon {
        width: 60px;
        height: 60px;
        font-size: 1.4rem;
    }
    
    .feature-icon {
        width: 48px;
        height: 48px;
        font-size: 1.1rem;
    }
    
    .company-culture,
    .benefits-section,
    .jobs-section,
    .recruitment-process {
        padding: 70px 0;
    }
    
    .cta-section {
        padding: 60px 0;
    }
}

/* Smooth animations and transitions */
* {
    box-sizing: border-box;
}

.section-header {
    margin-bottom: 3rem;
}

/* Print styles */
@media print {
    .cta-section,
    .page-header::before,
    .benefit-card::before {
        display: none !important;
    }
    
    * {
        background: white !important;
        color: black !important;
        box-shadow: none !important;
    }
}

/* Reduced motion */
@media (prefers-reduced-motion: reduce) {
    *, *::before, *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}

/* Company Culture */
.culture-features {
    margin-top: 1.5rem;
}

.feature-item {
    display: flex;
    align-items: flex-start;
    gap: 0.8rem;
    margin-bottom: 1.2rem;
}

.feature-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #8B0000, #DC143C);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    flex-shrink: 0;
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.3);
}

.feature-content h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.4rem;
}

.feature-content p {
    color: #6b7280;
    margin: 0;
    line-height: 1.5;
    font-size: 0.9rem;
}

/* Benefits Section */
.benefit-card {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    text-align: center;
    transition: all 0.3s ease;
    border: 2px solid transparent;
    height: 100%;
    position: relative;
    overflow: hidden;
}

.benefit-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, #8B0000, #DC143C, #FF6B6B);
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 1;
}

.benefit-card:hover {
    transform: translateY(-8px) scale(1.02);
    border-color: #DC143C;
    box-shadow: 0 15px 35px rgba(139, 0, 0, 0.25);
}

.benefit-card:hover::before {
    opacity: 0.05;
}

.benefit-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #8B0000, #DC143C);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    margin: 0 auto 1rem;
    position: relative;
    z-index: 2;
    box-shadow: 0 6px 20px rgba(139, 0, 0, 0.3);
}

.benefit-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.8rem;
    position: relative;
    z-index: 2;
}

.benefit-description {
    color: #6b7280;
    line-height: 1.5;
    margin: 0;
    font-size: 0.9rem;
    position: relative;
    z-index: 2;
}

/* Jobs Section */
.jobs-grid {
    display: grid;
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.job-card {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    transition: all 0.3s ease;
    border: 2px solid transparent;
    position: relative;
    overflow: hidden;
}

.job-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
    background: linear-gradient(135deg, #8B0000, #DC143C);
    transition: width 0.3s ease;
}

.job-card:hover {
    transform: translateY(-4px) scale(1.01);
    border-color: #DC143C;
    box-shadow: 0 12px 30px rgba(139, 0, 0, 0.2);
}

.job-card:hover::before {
    width: 6px;
}

.job-header {
    margin-bottom: 1rem;
}

.job-meta {
    display: flex;
    gap: 0.8rem;
    margin-bottom: 0.8rem;
    flex-wrap: wrap;
}

.job-type {
    background: linear-gradient(135deg, #8B0000, #DC143C);
    color: white;
    padding: 0.2rem 0.6rem;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 600;
}

.job-location {
    color: #6b7280;
    font-size: 12px;
    display: flex;
    align-items: center;
    gap: 0.2rem;
}

.job-remote {
    background: #f0f9ff;
    color: #0369a1;
    padding: 0.2rem 0.6rem;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 600;
}

.job-title {
    font-size: 1.2rem;
    font-weight: 700;
    margin-bottom: 0.4rem;
}

.job-title a {
    color: #1f2937;
    text-decoration: none;
    transition: color 0.3s ease;
}

.job-title a:hover {
    color: #8B0000;
}

.job-department {
    color: #6b7280;
    font-size: 12px;
    display: flex;
    align-items: center;
    gap: 0.4rem;
}

.job-content {
    margin-bottom: 1rem;
}

.job-description {
    color: #6b7280;
    line-height: 1.5;
    margin-bottom: 0.8rem;
    font-size: 0.9rem;
}

.job-salary {
    color: #16a34a;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.4rem;
    margin-bottom: 0.8rem;
    font-size: 0.9rem;
}

.job-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 0.8rem;
    border-top: 1px solid #e5e7eb;
    flex-wrap: wrap;
    gap: 0.8rem;
}

.job-posted {
    color: #9ca3af;
    font-size: 12px;
    display: flex;
    align-items: center;
    gap: 0.4rem;
}

.job-actions {
    display: flex;
    gap: 0.4rem;
}

/* No Jobs */
.no-jobs {
    padding: 4rem 2rem;
}

.no-jobs-icon {
    width: 100px;
    height: 100px;
    background: #f3f4f6;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    color: #9ca3af;
    margin: 0 auto 2rem;
}

.no-jobs h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: #374151;
    margin-bottom: 1rem;
}

.no-jobs p {
    color: #6b7280;
    margin-bottom: 2rem;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
}

/* Process Timeline */
.process-timeline {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 1.5rem;
    max-width: 900px;
    margin: 0 auto;
}

.timeline-item {
    flex: 1;
    min-width: 180px;
    text-align: center;
    position: relative;
}

.timeline-item:not(:last-child)::after {
    content: '';
    position: absolute;
    top: 35px;
    right: -0.75rem;
    width: 1.5rem;
    height: 2px;
    background: linear-gradient(90deg, #8B0000, #DC143C);
    z-index: 1;
}

.timeline-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, #8B0000, #DC143C);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.3rem;
    margin: 0 auto 0.8rem;
    position: relative;
    z-index: 2;
    box-shadow: 0 6px 20px rgba(139, 0, 0, 0.3);
}

.timeline-content h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.4rem;
}

.timeline-content p {
    color: #6b7280;
    font-size: 13px;
    line-height: 1.4;
    margin: 0;
}

/* CTA Section */
.cta-section {
    background: linear-gradient(135deg, #8B0000 0%, #DC143C 50%, #8B0000 100%);
    color: white;
    position: relative;
    overflow: hidden;
}

.cta-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
        radial-gradient(circle at 30% 40%, rgba(255, 107, 107, 0.3) 0%, transparent 50%),
        radial-gradient(circle at 70% 60%, rgba(139, 0, 0, 0.4) 0%, transparent 50%);
    z-index: 1;
}

.cta-content {
    max-width: 500px;
    margin: 0 auto;
    position: relative;
    z-index: 2;
}

.cta-icon {
    width: 80px;
    height: 80px;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    margin: 0 auto 1.5rem;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

.cta-title {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 0.8rem;
}

.cta-description {
    font-size: 0.95rem;
    opacity: 0.9;
    margin-bottom: 1.5rem;
    line-height: 1.5;
}

.cta-actions {
    display: flex;
    gap: 0.8rem;
    justify-content: center;
    flex-wrap: wrap;
}

.cta-section .btn-primary {
    background: white;
    color: #8B0000;
    border: none;
    padding: 10px 20px;
    font-size: 13px;
}

.cta-section .btn-primary:hover {
    background: #f8f9fa;
    color: #8B0000;
    transform: translateY(-2px);
}

.cta-section .btn-outline-primary {
    background: transparent;
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.4);
    padding: 8px 18px;
    font-size: 13px;
}

.cta-section .btn-outline-primary:hover {
    background: rgba(255, 255, 255, 0.15);
    border-color: rgba(255, 255, 255, 0.6);
    color: white;
}

.btn-primary {
    background: linear-gradient(135deg, #8B0000, #DC143C);
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 12px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.3s ease;
    text-decoration: none;
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.3);
}

.btn-primary:hover {
    background: linear-gradient(135deg, #DC143C, #FF6B6B);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(139, 0, 0, 0.4);
    color: white;
}

.btn-outline-primary {
    background: transparent;
    color: #8B0000;
    border: 2px solid #8B0000;
    padding: 6px 14px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 12px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.3s ease;
    text-decoration: none;
}

.btn-outline-primary:hover {
    background: linear-gradient(135deg, #8B0000, #DC143C);
    border-color: #DC143C;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(139, 0, 0, 0.3);
}

.btn-sm {
    padding: 6px 12px;
    font-size: 11px;
}

.btn-lg {
    padding: 10px 20px;
    font-size: 13px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .page-title {
        font-size: 2rem;
    }
    
    .section-title {
        font-size: 1.6rem;
    }
    
    .cta-title {
        font-size: 1.6rem;
    }
    
    .job-footer {
        flex-direction: column;
        align-items: stretch;
        text-align: center;
        gap: 1rem;
    }
    
    .job-actions {
        justify-content: center;
        gap: 0.8rem;
    }
    
    .job-actions .btn {
        flex: 1;
        min-width: 120px;
    }
    
    .job-card {
        padding: 1.5rem;
        margin-bottom: 1rem;
        min-height: 380px;
    }
    
    .job-title {
        font-size: 1.2rem;
    }
    
    .job-meta {
        flex-direction: column;
        gap: 0.5rem;
        align-items: flex-start;
    }
    
    .job-requirements {
        padding: 1rem;
    }
    
    .requirements-list li {
        font-size: 0.8rem;
    }
    
    .requirements-content {
        font-size: 0.8rem;
        line-height: 1.4;
    }
    
    .jobs-grid {
        max-width: 100%;
    }
    
    .jobs-grid .row {
        margin: 0;
        justify-content: center;
    }
    
    .job-card {
        min-height: 350px;
        max-width: 100%;
        width: 100%;
    }
    
    .job-status {
        position: static;
        margin-bottom: 1rem;
        align-self: flex-start;
    }
    
    .cta-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .feature-item {
        text-align: center;
        flex-direction: column;
        align-items: center;
    }
    
    .culture-visual {
        margin-top: 2rem;
    }
    
    .image-container {
        aspect-ratio: 4/5;
        max-height: 400px;
    }
    
    .overlay-content i {
        font-size: 3rem;
    }
    
    .overlay-content span {
        font-size: 1rem;
    }
    
    .visual-decoration {
        display: none;
    }
    
    .timeline-item:not(:last-child)::after {
        display: none;
    }
    
    .process-timeline {
        flex-direction: column;
        max-width: 350px;
    }
    
    .benefit-card {
        padding: 1.2rem;
    }
    
    .job-card {
        padding: 1.2rem;
    }
}

@media (max-width: 480px) {
    .page-title {
        font-size: 1.6rem;
    }
    
    .job-card {
        padding: 1rem;
    }
    
    .benefit-card {
        padding: 1rem;
    }
    
    .job-meta {
        flex-direction: column;
        gap: 0.4rem;
    }
    
    .job-actions {
        flex-direction: column;
    }
    
    .cta-icon {
        width: 60px;
        height: 60px;
        font-size: 2rem;
    }
    
    .timeline-icon {
        width: 50px;
        height: 50px;
        font-size: 1.1rem;
    }
    
    .benefit-icon {
        width: 50px;
        height: 50px;
        font-size: 1.2rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS with custom settings for this page
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out-cubic',
            once: true,
            offset: 50,
            delay: 0
        });
    }
    
    // Enhanced page entrance animation
    function initPageEntrance() {
        // Add staggered entrance animation to main sections
        const sections = document.querySelectorAll('section');
        sections.forEach((section, index) => {
            if (!section.hasAttribute('data-aos')) {
                section.setAttribute('data-aos', 'fade-up');
                section.setAttribute('data-aos-delay', (index * 200).toString());
            }
        });
        
        // Special entrance animation for page header
        const pageHeader = document.querySelector('.page-header');
        if (pageHeader) {
            pageHeader.style.opacity = '0';
            pageHeader.style.transform = 'scale(0.95)';
            
            setTimeout(() => {
                pageHeader.style.transition = 'all 1.2s cubic-bezier(0.165, 0.84, 0.44, 1)';
                pageHeader.style.opacity = '1';
                pageHeader.style.transform = 'scale(1)';
            }, 300);
        }
    }
    
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
    
    // Enhanced Counter Animation for Header Stats
    function animateCounter(element, target, duration = 2000) {
        let start = 0;
        const increment = target / (duration / 16); // 60fps
        
        function updateCounter() {
            start += increment;
            if (start < target) {
                element.textContent = Math.floor(start) + '+';
                requestAnimationFrame(updateCounter);
            } else {
                element.textContent = target + '+';
            }
        }
        
        updateCounter();
    }
    
    // Advanced Intersection Observer for various animations
    const createObserver = (callback, options = {}) => {
        return new IntersectionObserver(callback, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px',
            ...options
        });
    };
    
    // Stats animation observer
    const statsObserver = createObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const statNumbers = entry.target.querySelectorAll('.stat-number[data-count]');
                
                statNumbers.forEach((stat, index) => {
                    const targetCount = parseInt(stat.getAttribute('data-count'));
                    
                    setTimeout(() => {
                        animateCounter(stat, targetCount, 2500);
                    }, index * 300);
                });
                
                statsObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    // Cards hover enhancement observer
    const cardsObserver = createObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const cards = entry.target.querySelectorAll('.benefit-card, .job-card, .feature-item');
                
                cards.forEach((card, index) => {
                    card.style.transform = 'translateY(30px)';
                    card.style.opacity = '0';
                    card.style.transition = 'all 0.8s cubic-bezier(0.165, 0.84, 0.44, 1)';
                    
                    setTimeout(() => {
                        card.style.transform = 'translateY(0)';
                        card.style.opacity = '1';
                    }, index * 150);
                });
                
                cardsObserver.unobserve(entry.target);
            }
        });
    });
    
    // Process steps animation observer
    const processObserver = createObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const steps = entry.target.querySelectorAll('.step-item');
                
                steps.forEach((step, index) => {
                    step.style.opacity = '0';
                    step.style.transform = 'translateX(-50px) scale(0.9)';
                    step.style.transition = 'all 0.8s cubic-bezier(0.165, 0.84, 0.44, 1)';
                    
                    setTimeout(() => {
                        step.style.opacity = '1';
                        step.style.transform = 'translateX(0) scale(1)';
                    }, index * 200);
                });
                
                processObserver.unobserve(entry.target);
            }
        });
    });
    
    // Image animation observer
    const imageObserver = createObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const images = entry.target.querySelectorAll('img');
                
                images.forEach((img, index) => {
                    img.style.opacity = '0';
                    img.style.transform = 'scale(1.1)';
                    img.style.transition = 'all 1.2s cubic-bezier(0.165, 0.84, 0.44, 1)';
                    img.style.filter = 'blur(10px)';
                    
                    setTimeout(() => {
                        img.style.opacity = '1';
                        img.style.transform = 'scale(1)';
                        img.style.filter = 'blur(0)';
                    }, index * 100);
                });
                
                imageObserver.unobserve(entry.target);
            }
        });
    });
    
    // Initialize observers
    function initObservers() {
        // Header stats
        const headerStats = document.querySelector('.header-stats');
        if (headerStats) {
            statsObserver.observe(headerStats);
        }
        
        // Card sections
        const cardSections = document.querySelectorAll('.benefits-section, .jobs-section');
        cardSections.forEach(section => {
            cardsObserver.observe(section);
        });
        
        // Process section
        const processSection = document.querySelector('.recruitment-process .process-steps');
        if (processSection) {
            processObserver.observe(processSection);
        }
        
        // Image sections
        const imageSections = document.querySelectorAll('.culture-visual, .image-container');
        imageSections.forEach(section => {
            imageObserver.observe(section);
        });
    }
    
    // Floating animation for decorative elements
    function initFloatingAnimations() {
        const floatingElements = document.querySelectorAll('.decoration-circle, .decoration-dot, .decoration-orb');
        
        floatingElements.forEach((element, index) => {
            element.style.animation = `float 3s ease-in-out infinite`;
            element.style.animationDelay = `${index * 0.5}s`;
        });
    }
    
    // Add CSS for floating animation
    const floatingCSS = `
        @keyframes float {
            0%, 100% { 
                transform: translateY(0px) translateX(0px) rotate(0deg); 
            }
            25% { 
                transform: translateY(-20px) translateX(10px) rotate(1deg); 
            }
            50% { 
                transform: translateY(-10px) translateX(-10px) rotate(-1deg); 
            }
            75% { 
                transform: translateY(-15px) translateX(15px) rotate(0.5deg); 
            }
        }
        
        @keyframes glow {
            0%, 100% { 
                box-shadow: 0 0 20px rgba(139, 0, 0, 0.3); 
            }
            50% { 
                box-shadow: 0 0 40px rgba(139, 0, 0, 0.6); 
            }
        }
        
        @keyframes pulseGlow {
            0%, 100% { 
                box-shadow: 0 0 0 0 rgba(139, 0, 0, 0.7); 
            }
            70% { 
                box-shadow: 0 0 0 10px rgba(139, 0, 0, 0); 
            }
        }
    `;
    
    // Add styles to page
    const styleSheet = document.createElement('style');
    styleSheet.textContent = floatingCSS;
    document.head.appendChild(styleSheet);
    
    // Enhanced hover effects
    function initEnhancedHovers() {
        // Benefit cards
        const benefitCards = document.querySelectorAll('.benefit-card');
        benefitCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-15px) scale(1.03) rotateY(5deg)';
                card.style.boxShadow = '0 25px 60px rgba(139, 0, 0, 0.2)';
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0) scale(1) rotateY(0deg)';
                card.style.boxShadow = '0 10px 40px rgba(0, 0, 0, 0.1)';
            });
        });
        
        // Job cards
        const jobCards = document.querySelectorAll('.job-card');
        jobCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-12px) scale(1.02)';
                card.style.boxShadow = '0 30px 70px rgba(139, 0, 0, 0.15)';
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0) scale(1)';
                card.style.boxShadow = '0 10px 40px rgba(0, 0, 0, 0.1)';
            });
        });
        
        // Feature items
        const featureItems = document.querySelectorAll('.feature-item');
        featureItems.forEach(item => {
            item.addEventListener('mouseenter', () => {
                item.style.transform = 'translateY(-8px) translateX(8px)';
            });
            
            item.addEventListener('mouseleave', () => {
                item.style.transform = 'translateY(0) translateX(0)';
            });
        });
    }
    
    // Page visibility animation
    function initPageVisibility() {
        document.addEventListener('visibilitychange', () => {
            if (!document.hidden) {
                // Refresh animations when page becomes visible
                if (typeof AOS !== 'undefined') {
                    AOS.refresh();
                }
            }
        });
    }
    
    // Initialize all features
    setTimeout(() => {
        initPageEntrance();
        initObservers();
        initFloatingAnimations();
        initEnhancedHovers();
        initPageVisibility();
    }, 100);
});</script>
@endsection
