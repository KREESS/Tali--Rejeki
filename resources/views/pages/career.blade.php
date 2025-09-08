@extends('components.layout')

@section('title', $title)

@section('content')
<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <div class="header-content" data-aos="fade-up">
                    <h1 class="page-title">Karier</h1>
                    <p class="page-description">
                        Bergabunglah dengan tim profesional kami dan bangun karier yang cemerlang di industri insulasi terdepan
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Company Culture Section -->
<section class="company-culture py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="culture-content">
                    <div class="section-badge">
                        <i class="fas fa-heart"></i>
                        <span>Budaya Perusahaan</span>
                    </div>
                    <h2 class="section-title">Mengapa Bergabung dengan Tali Rejeki?</h2>
                    <p class="section-description">
                        Kami percaya bahwa SDM adalah aset terpenting perusahaan. Bergabunglah dengan lingkungan kerja 
                        yang mendukung pengembangan diri dan memberikan kesempatan berkembang bagi setiap individu.
                    </p>
                    
                    <div class="culture-features">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Pengembangan Karier</h4>
                                <p>Program pelatihan berkelanjutan dan jalur karier yang jelas</p>
                            </div>
                        </div>
                        
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-balance-scale"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Work-Life Balance</h4>
                                <p>Keseimbangan kehidupan kerja dan pribadi yang sehat</p>
                            </div>
                        </div>
                        
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Tim yang Solid</h4>
                                <p>Lingkungan kerja yang kolaboratif dan saling mendukung</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6" data-aos="fade-left">
                <div class="culture-visual">
                    <img src="{{ asset('img/career-culture.jpg') }}" alt="Budaya Perusahaan" class="img-fluid rounded-3">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="benefits-section py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <div class="section-badge">
                <i class="fas fa-gift"></i>
                <span>Benefit & Fasilitas</span>
            </div>
            <h2 class="section-title">Paket Kompensasi & Benefit</h2>
            <p class="section-description">
                Kami menyediakan paket kompensasi yang kompetitif dan berbagai benefit menarik untuk karyawan
            </p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <h3 class="benefit-title">Gaji Kompetitif</h3>
                    <p class="benefit-description">
                        Sistem remunerasi yang adil dan kompetitif sesuai dengan industri dan kinerja
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <h3 class="benefit-title">Asuransi Kesehatan</h3>
                    <p class="benefit-description">
                        Jaminan kesehatan untuk karyawan dan keluarga dengan coverage yang luas
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-plane"></i>
                    </div>
                    <h3 class="benefit-title">Cuti & Leave</h3>
                    <p class="benefit-description">
                        Cuti tahunan, cuti sakit, dan berbagai jenis leave yang fleksibel
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h3 class="benefit-title">Training & Sertifikasi</h3>
                    <p class="benefit-description">
                        Program pelatihan internal dan eksternal untuk meningkatkan kompetensi
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h3 class="benefit-title">Bonus & Insentif</h3>
                    <p class="benefit-description">
                        Sistem bonus kinerja dan insentif untuk pencapaian target tertentu
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <h3 class="benefit-title">Work Flexibility</h3>
                    <p class="benefit-description">
                        Fleksibilitas waktu kerja dan work from home untuk posisi tertentu
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Jobs Section -->
<section class="jobs-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <div class="section-badge">
                <i class="fas fa-briefcase"></i>
                <span>Lowongan Kerja</span>
            </div>
            <h2 class="section-title">Posisi yang Tersedia</h2>
            <p class="section-description">
                Temukan posisi yang sesuai dengan keahlian dan minat Anda
            </p>
        </div>
        
        @if($jobs->count() > 0)
        <div class="jobs-grid">
            @foreach($jobs as $index => $job)
            <div class="job-card" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
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
                    <p class="job-description">{{ Str::limit($job->description, 150) }}</p>
                    
                    @if($job->requirements)
                    <div class="job-requirements">
                        <h5>Kualifikasi:</h5>
                        <div class="requirements-preview">
                            {{ Str::limit(strip_tags($job->requirements), 100) }}
                        </div>
                    </div>
                    @endif
                    
                    @if($job->salary_range)
                    <div class="job-salary">
                        <i class="fas fa-money-bill-wave"></i>
                        {{ $job->salary_range }}
                    </div>
                    @endif
                </div>
                
                <div class="job-footer">
                    <div class="job-posted">
                        <i class="fas fa-clock"></i>
                        Diposting {{ $job->created_at->diffForHumans() }}
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
            @endforeach
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
<section class="recruitment-process py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <div class="section-badge">
                <i class="fas fa-route"></i>
                <span>Proses Rekrutmen</span>
            </div>
            <h2 class="section-title">Langkah-Langkah Melamar</h2>
            <p class="section-description">
                Proses rekrutmen yang transparan dan profesional untuk memastikan kandidat terbaik
            </p>
        </div>
        
        <div class="process-timeline" data-aos="fade-up">
            <div class="timeline-item">
                <div class="timeline-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="timeline-content">
                    <h4>1. Aplikasi</h4>
                    <p>Kirim CV dan surat lamaran melalui form online atau email</p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-icon">
                    <i class="fas fa-search"></i>
                </div>
                <div class="timeline-content">
                    <h4>2. Screening</h4>
                    <p>Tim HR akan melakukan review dokumen dan screening awal</p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-icon">
                    <i class="fas fa-comments"></i>
                </div>
                <div class="timeline-content">
                    <h4>3. Interview</h4>
                    <p>Wawancara dengan HR dan user untuk mengenal lebih dalam</p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-icon">
                    <i class="fas fa-tasks"></i>
                </div>
                <div class="timeline-content">
                    <h4>4. Assessment</h4>
                    <p>Tes kemampuan dan psikotes sesuai dengan posisi yang dilamar</p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <div class="timeline-content">
                    <h4>5. Offer</h4>
                    <p>Penawaran kerja dan negosiasi package kompensasi</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section py-5">
    <div class="container">
        <div class="cta-content text-center" data-aos="fade-up">
            <div class="cta-icon">
                <i class="fas fa-rocket"></i>
            </div>
            <h2 class="cta-title">Siap Memulai Karier Bersama Kami?</h2>
            <p class="cta-description">
                Jangan lewatkan kesempatan untuk menjadi bagian dari tim yang inovatif dan berdedikasi. 
                Mulai perjalanan karier Anda bersama Tali Rejeki!
            </p>
            <div class="cta-actions">
                <a href="#jobs" class="btn btn-primary btn-lg me-3">
                    <i class="fas fa-search"></i>
                    Lihat Lowongan
                </a>
                <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-lg">
                    <i class="fas fa-envelope"></i>
                    Kirim CV
                </a>
            </div>
        </div>
    </div>
</section>

<style>
/* Page Header */
.page-header {
    background: linear-gradient(135deg, #7c1415 0%, #b71c1c 50%, #dc2626 100%);
    color: white;
    padding: 120px 0 80px;
    position: relative;
    overflow: hidden;
}

.page-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.3);
    z-index: 1;
}

.header-content {
    position: relative;
    z-index: 2;
}

.page-title {
    font-size: 3rem;
    font-weight: 800;
    margin-bottom: 1rem;
}

.page-description {
    font-size: 1.2rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
}

/* Section Styling */
.section-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, #7c1415, #dc2626);
    color: white;
    padding: 8px 16px;
    border-radius: 25px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 1rem;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 1rem;
}

.section-description {
    font-size: 1.1rem;
    color: #6b7280;
    line-height: 1.7;
}

/* Company Culture */
.culture-features {
    margin-top: 2rem;
}

.feature-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.feature-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #7c1415, #dc2626);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    flex-shrink: 0;
}

.feature-content h4 {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

.feature-content p {
    color: #6b7280;
    margin: 0;
    line-height: 1.6;
}

/* Benefits Section */
.benefit-card {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    text-align: center;
    transition: all 0.3s ease;
    border: 1px solid #e5e7eb;
    height: 100%;
}

.benefit-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(124, 20, 21, 0.15);
}

.benefit-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #7c1415, #dc2626);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 2rem;
    margin: 0 auto 1.5rem;
}

.benefit-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 1rem;
}

.benefit-description {
    color: #6b7280;
    line-height: 1.6;
    margin: 0;
}

/* Jobs Section */
.jobs-grid {
    display: grid;
    gap: 2rem;
    margin-bottom: 3rem;
}

.job-card {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    transition: all 0.3s ease;
    border: 1px solid #e5e7eb;
}

.job-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(124, 20, 21, 0.15);
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
    background: #e0f2fe;
    color: #0277bd;
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
}

.job-location {
    color: #6b7280;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.job-title {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.job-title a {
    color: #1f2937;
    text-decoration: none;
    transition: color 0.3s ease;
}

.job-title a:hover {
    color: #7c1415;
}

.job-department {
    color: #6b7280;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.job-content {
    margin-bottom: 1.5rem;
}

.job-description {
    color: #6b7280;
    line-height: 1.6;
    margin-bottom: 1rem;
}

.job-requirements {
    margin-bottom: 1rem;
}

.job-requirements h5 {
    font-size: 14px;
    font-weight: 600;
    color: #374151;
    margin-bottom: 0.5rem;
}

.requirements-preview {
    color: #6b7280;
    font-size: 14px;
    line-height: 1.5;
}

.job-salary {
    color: #16a34a;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 1rem;
}

.job-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 1rem;
    border-top: 1px solid #e5e7eb;
    flex-wrap: wrap;
    gap: 1rem;
}

.job-posted {
    color: #9ca3af;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.job-actions {
    display: flex;
    gap: 0.5rem;
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
    gap: 2rem;
    max-width: 1000px;
    margin: 0 auto;
}

.timeline-item {
    flex: 1;
    min-width: 200px;
    text-align: center;
    position: relative;
}

.timeline-item:not(:last-child)::after {
    content: '';
    position: absolute;
    top: 40px;
    right: -1rem;
    width: 2rem;
    height: 2px;
    background: linear-gradient(90deg, #7c1415, #dc2626);
    z-index: 1;
}

.timeline-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #7c1415, #dc2626);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    margin: 0 auto 1rem;
    position: relative;
    z-index: 2;
}

.timeline-content h4 {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

.timeline-content p {
    color: #6b7280;
    font-size: 14px;
    line-height: 1.5;
    margin: 0;
}

/* CTA Section */
.cta-section {
    background: linear-gradient(135deg, #7c1415 0%, #dc2626 100%);
    color: white;
}

.cta-content {
    max-width: 600px;
    margin: 0 auto;
}

.cta-icon {
    width: 100px;
    height: 100px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    margin: 0 auto 2rem;
}

.cta-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.cta-description {
    font-size: 1.1rem;
    opacity: 0.9;
    margin-bottom: 2rem;
}

.cta-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-primary {
    background: white;
    color: #7c1415;
    border: none;
    padding: 12px 24px;
    border-radius: 10px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    text-decoration: none;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    color: #7c1415;
}

.btn-outline-primary {
    background: transparent;
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.3);
    padding: 12px 24px;
    border-radius: 10px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    text-decoration: none;
}

.btn-outline-primary:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.5);
    color: white;
    transform: translateY(-2px);
}

/* Responsive Design */
@media (max-width: 768px) {
    .page-title {
        font-size: 2.5rem;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .cta-title {
        font-size: 2rem;
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
    
    .timeline-item:not(:last-child)::after {
        display: none;
    }
    
    .process-timeline {
        flex-direction: column;
        max-width: 400px;
    }
}

@media (max-width: 480px) {
    .page-title {
        font-size: 2rem;
    }
    
    .job-card {
        padding: 1.5rem;
    }
    
    .benefit-card {
        padding: 1.5rem;
    }
    
    .job-meta {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .job-actions {
        flex-direction: column;
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
    
    // Add animation to timeline on scroll
    const timelineItems = document.querySelectorAll('.timeline-item');
    
    const timelineObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 200);
            }
        });
    }, {
        threshold: 0.1
    });
    
    timelineItems.forEach(item => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(30px)';
        item.style.transition = 'all 0.6s ease';
        timelineObserver.observe(item);
    });
});
</script>
@endsection
