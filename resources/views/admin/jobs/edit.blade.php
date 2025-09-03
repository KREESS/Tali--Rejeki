@extends('admin.components.layout')

@section('title', $title)

@section('content')
<!-- Loading Overlay -->
<div class="loading-overlay" style="display: none;">
    <div class="loading-spinner">
        <div class="spinner-circle"></div>
        <div class="loading-text">Menyimpan perubahan...</div>
    </div>
</div>

<!-- Alert Container -->
<div class="alert-container"></div>

<div class="jobs-management" data-aos="fade-in">
    <!-- Premium Header -->
    <div class="premium-header" data-aos="fade-down">
        <div class="header-background">
            <div class="header-pattern"></div>
        </div>
        
        <div class="page-header-content">
            <div class="page-title">
                <div class="title-icon">
                    <i class="fas fa-edit"></i>
                </div>
                <div class="title-content">
                    <h1>Edit Lowongan Kerja</h1>
                    <p class="subtitle">Perbarui informasi lowongan: <span class="job-name">{{ $job->title }}</span></p>
                    <div class="job-status-info">
                        <span class="status-badge status-{{ $job->status }}">
                            <i class="fas fa-{{ $job->status === 'published' ? 'check-circle' : ($job->status === 'draft' ? 'edit' : 'times-circle') }}"></i>
                            {{ ucfirst($job->status) }}
                        </span>
                        <span class="creation-date">
                            <i class="fas fa-calendar"></i>
                            Dibuat {{ $job->created_at->format('d M Y') }}
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="header-actions">
                <a href="{{ route('admin.jobs.show', $job) }}" class="btn btn-outline-light btn-premium">
                    <i class="fas fa-eye"></i>
                    Lihat Detail
                </a>
                <a href="{{ route('admin.jobs.index') }}" class="btn btn-outline-secondary btn-premium">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <!-- Premium Form Card -->
    <div class="premium-card" data-aos="fade-up" data-aos-delay="200">
        <div class="card-header">
            <h3><i class="fas fa-edit"></i> Form Edit Lowongan</h3>
        </div>
        
        <div class="premium-form">
            <form action="{{ route('admin.jobs.update', $job) }}" method="POST" id="job-edit-form">
                @csrf
                @method('PUT')
                
                <div class="form-grid">
                    <!-- Basic Information Section -->
                    <div class="form-section" data-aos="fade-up" data-aos-delay="300">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <div class="section-title">
                                <h4>Informasi Dasar</h4>
                                <p>Perbarui detail fundamental lowongan kerja</p>
                            </div>
                        </div>
                        
                        <div class="form-fields">
                            <div class="field-group">
                                <label for="title" class="field-label">
                                    <i class="fas fa-briefcase"></i>
                                    Judul Lowongan <span class="required">*</span>
                                </label>
                                <input type="text" 
                                       id="title" 
                                       name="title" 
                                       class="form-control @error('title') is-invalid @enderror" 
                                       value="{{ old('title', $job->title) }}" 
                                       required
                                       placeholder="e.g. Senior Software Engineer">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field-group">
                                <label for="summary" class="field-label">
                                    <i class="fas fa-file-alt"></i>
                                    Ringkasan Pekerjaan <span class="required">*</span>
                                </label>
                                <textarea id="summary" 
                                          name="summary" 
                                          class="form-control auto-resize @error('summary') is-invalid @enderror" 
                                          rows="3" 
                                          required
                                          maxlength="255"
                                          placeholder="Ringkasan singkat tentang posisi pekerjaan (maks 255 karakter)...">{{ old('summary', $job->summary) }}</textarea>
                                <small class="form-text">
                                    <span id="summary-counter">{{ strlen($job->summary ?? '') }}</span>/255 karakter
                                </small>
                                @error('summary')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="fields-row">
                                <div class="field-group">
                                    <label for="department" class="field-label">
                                        <i class="fas fa-users"></i>
                                        Departemen
                                    </label>
                                    <input type="text" 
                                           id="department" 
                                           name="department" 
                                           class="form-control @error('department') is-invalid @enderror" 
                                           value="{{ old('department', $job->department) }}"
                                           placeholder="e.g. Engineering">
                                    @error('department')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="field-group">
                                    <label for="status" class="field-label">
                                        <i class="fas fa-toggle-on"></i>
                                        Status <span class="required">*</span>
                                    </label>
                                    <select id="status" 
                                            name="status" 
                                            class="form-select @error('status') is-invalid @enderror" 
                                            required>
                                        <option value="">Pilih Status</option>
                                        <option value="draft" {{ old('status', $job->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="published" {{ old('status', $job->status) == 'published' ? 'selected' : '' }}>Published</option>
                                        <option value="closed" {{ old('status', $job->status) == 'closed' ? 'selected' : '' }}>Closed</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Job Details Section -->
                    <div class="form-section" data-aos="fade-up" data-aos-delay="400">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                            <div class="section-title">
                                <h4>Detail Pekerjaan</h4>
                                <p>Perbarui deskripsi dan persyaratan pekerjaan</p>
                            </div>
                        </div>
                        
                        <div class="form-fields">
                            <div class="field-group">
                                <label for="description_html" class="field-label">
                                    <i class="fas fa-align-left"></i>
                                    Deskripsi Pekerjaan <span class="required">*</span>
                                </label>
                                <textarea id="description_html" 
                                          name="description_html" 
                                          class="form-control auto-resize @error('description_html') is-invalid @enderror" 
                                          rows="6" 
                                          required
                                          placeholder="Berikan deskripsi detail tentang peran, tanggung jawab, dan apa yang akan dilakukan kandidat...">{{ old('description_html', $job->description_html) }}</textarea>
                                @error('description_html')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="fields-row">
                                <div class="field-group">
                                    <label for="employment_type" class="field-label">
                                        <i class="fas fa-clock"></i>
                                        Jenis Pekerjaan <span class="required">*</span>
                                    </label>
                                    <select id="employment_type" 
                                            name="employment_type" 
                                            class="form-select @error('employment_type') is-invalid @enderror" 
                                            required>
                                        <option value="">Pilih Jenis</option>
                                        <option value="full-time" {{ old('employment_type', $job->employment_type) == 'full-time' ? 'selected' : '' }}>Full Time</option>
                                        <option value="part-time" {{ old('employment_type', $job->employment_type) == 'part-time' ? 'selected' : '' }}>Part Time</option>
                                        <option value="contract" {{ old('employment_type', $job->employment_type) == 'contract' ? 'selected' : '' }}>Contract</option>
                                        <option value="internship" {{ old('employment_type', $job->employment_type) == 'internship' ? 'selected' : '' }}>Internship</option>
                                    </select>
                                    @error('employment_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="field-group">
                                    <label for="remote_policy" class="field-label">
                                        <i class="fas fa-laptop-house"></i>
                                        Kebijakan Remote <span class="required">*</span>
                                    </label>
                                    <select id="remote_policy" 
                                            name="remote_policy" 
                                            class="form-select @error('remote_policy') is-invalid @enderror" 
                                            required>
                                        <option value="">Pilih Kebijakan</option>
                                        <option value="onsite" {{ old('remote_policy', $job->remote_policy) == 'onsite' ? 'selected' : '' }}>On-site</option>
                                        <option value="hybrid" {{ old('remote_policy', $job->remote_policy) == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                                        <option value="remote" {{ old('remote_policy', $job->remote_policy) == 'remote' ? 'selected' : '' }}>Remote</option>
                                    </select>
                                    @error('remote_policy')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Location & Compensation Section -->
                    <div class="form-section" data-aos="fade-up" data-aos-delay="500">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="section-title">
                                <h4>Lokasi & Kompensasi</h4>
                                <p>Perbarui informasi lokasi dan gaji</p>
                            </div>
                        </div>
                        
                        <div class="form-fields">
                            <div class="field-group">
                                <label for="location" class="field-label">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Lokasi <span class="required">*</span>
                                </label>
                                <input type="text" 
                                       id="location" 
                                       name="location" 
                                       class="form-control @error('location') is-invalid @enderror" 
                                       value="{{ old('location', $job->location) }}" 
                                       required
                                       placeholder="e.g. Jakarta, Indonesia">
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="fields-row">
                                <div class="field-group">
                                    <label for="salary_min" class="field-label">
                                        <i class="fas fa-dollar-sign"></i>
                                        Gaji Minimum
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" 
                                               id="salary_min" 
                                               name="salary_min" 
                                               class="form-control @error('salary_min') is-invalid @enderror" 
                                               value="{{ old('salary_min', $job->salary_min) }}"
                                               min="0"
                                               placeholder="5000000">
                                    </div>
                                    @error('salary_min')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="field-group">
                                    <label for="salary_max" class="field-label">
                                        <i class="fas fa-dollar-sign"></i>
                                        Gaji Maksimum
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" 
                                               id="salary_max" 
                                               name="salary_max" 
                                               class="form-control @error('salary_max') is-invalid @enderror" 
                                               value="{{ old('salary_max', $job->salary_max) }}"
                                               min="0"
                                               placeholder="15000000">
                                    </div>
                                    @error('salary_max')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="field-group">
                                <label for="salary_currency" class="field-label">
                                    <i class="fas fa-coins"></i>
                                    Mata Uang
                                </label>
                                <select id="salary_currency" 
                                        name="salary_currency" 
                                        class="form-select @error('salary_currency') is-invalid @enderror">
                                    <option value="IDR" {{ old('salary_currency', $job->salary_currency ?? 'IDR') == 'IDR' ? 'selected' : '' }}>Indonesian Rupiah (IDR)</option>
                                    <option value="USD" {{ old('salary_currency', $job->salary_currency) == 'USD' ? 'selected' : '' }}>US Dollar (USD)</option>
                                    <option value="EUR" {{ old('salary_currency', $job->salary_currency) == 'EUR' ? 'selected' : '' }}>Euro (EUR)</option>
                                    <option value="SGD" {{ old('salary_currency', $job->salary_currency) == 'SGD' ? 'selected' : '' }}>Singapore Dollar (SGD)</option>
                                </select>
                                @error('salary_currency')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Application Details Section -->
                    <div class="form-section" data-aos="fade-up" data-aos-delay="600">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div class="section-title">
                                <h4>Detail Aplikasi</h4>
                                <p>Perbarui tenggat waktu dan informasi kontak</p>
                            </div>
                        </div>
                        
                        <div class="form-fields">
                            <div class="fields-row">
                                <div class="field-group">
                                    <label for="published_at" class="field-label">
                                        <i class="fas fa-calendar-plus"></i>
                                        Tanggal Publikasi
                                    </label>
                                    <input type="datetime-local" 
                                           id="published_at" 
                                           name="published_at" 
                                           class="form-control @error('published_at') is-invalid @enderror" 
                                           value="{{ old('published_at', $job->published_at ? $job->published_at->format('Y-m-d\TH:i') : '') }}">
                                    @error('published_at')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="field-group">
                                    <label for="close_at" class="field-label">
                                        <i class="fas fa-calendar-times"></i>
                                        Tanggal Tutup
                                    </label>
                                    <input type="datetime-local" 
                                           id="close_at" 
                                           name="close_at" 
                                           class="form-control @error('close_at') is-invalid @enderror" 
                                           value="{{ old('close_at', $job->close_at ? $job->close_at->format('Y-m-d\TH:i') : '') }}">
                                    @error('close_at')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="field-group">
                                <label for="apply_email" class="field-label">
                                    <i class="fas fa-envelope"></i>
                                    Email Aplikasi
                                </label>
                                <input type="email" 
                                       id="apply_email" 
                                       name="apply_email" 
                                       class="form-control @error('apply_email') is-invalid @enderror" 
                                       value="{{ old('apply_email', $job->apply_email) }}"
                                       placeholder="hr@talirejeki.com">
                                @error('apply_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field-group">
                                <label for="apply_url" class="field-label">
                                    <i class="fas fa-link"></i>
                                    URL Aplikasi
                                </label>
                                <input type="url" 
                                       id="apply_url" 
                                       name="apply_url" 
                                       class="form-control @error('apply_url') is-invalid @enderror" 
                                       value="{{ old('apply_url', $job->apply_url) }}"
                                       placeholder="https://careers.talirejeki.com/apply">
                                @error('apply_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions" data-aos="fade-up" data-aos-delay="700">
                    <div class="actions-left">
                        <button type="button" class="btn btn-secondary btn-premium" onclick="window.history.back()">
                            <i class="fas fa-times"></i>
                            Batal
                        </button>
                    </div>
                    
                    <div class="actions-right">
                        <button type="button" class="btn btn-warning btn-premium" id="save-draft">
                            <i class="fas fa-save"></i>
                            Simpan sebagai Draft
                        </button>
                        <button type="submit" class="btn btn-primary btn-premium">
                            <i class="fas fa-check"></i>
                            Perbarui Lowongan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<style>
/* ===== PREMIUM EDIT JOB FORM STYLES ===== */
:root {
    --primary-dark-red: #8B0000;
    --primary-red: #A52A2A;
    --accent-red: #DC2626;
    --light-red: #FEE2E2;
    --gradient-primary: linear-gradient(135deg, #8B0000 0%, #A52A2A 50%, #DC2626 100%);
    --gradient-secondary: linear-gradient(135deg, #1F2937 0%, #374151 100%);
    --glass-bg: rgba(255, 255, 255, 0.1);
    --glass-border: rgba(255, 255, 255, 0.2);
    --shadow-premium: 0 20px 40px rgba(139, 0, 0, 0.15);
    --shadow-glass: 0 8px 32px rgba(0, 0, 0, 0.1);
}

/* Loading Overlay */
.loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    backdrop-filter: blur(10px);
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
}

.loading-spinner {
    text-align: center;
    color: white;
}

.spinner-circle {
    width: 60px;
    height: 60px;
    border: 4px solid rgba(255, 255, 255, 0.3);
    border-top: 4px solid #8B0000;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin: 0 auto 20px;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.loading-text {
    font-size: 1rem;
    font-weight: 600;
    margin-top: 10px;
}

/* Alert Container */
.alert-container {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 9998;
    max-width: 350px;
}

.alert {
    margin-bottom: 10px;
    padding: 12px 18px;
    border-radius: 10px;
    border: none;
    font-weight: 500;
    font-size: 0.85rem;
    box-shadow: var(--shadow-premium);
    animation: slideInRight 0.3s ease-out;
}

.alert-success {
    background: linear-gradient(135deg, #10B981 0%, #059669 100%);
    color: white;
}

.alert-error {
    background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);
    color: white;
}

@keyframes slideInRight {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

/* Jobs Management Container */
.jobs-management {
    background: linear-gradient(135deg, #F9FAFB 0%, #F3F4F6 100%);
    min-height: 100vh;
    padding: 1.5rem;
}

/* Premium Header */
.premium-header {
    position: relative;
    background: var(--gradient-primary);
    border-radius: 18px;
    padding: 2.5rem 2rem;
    margin-bottom: 2rem;
    overflow: hidden;
    box-shadow: var(--shadow-premium);
}

.header-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    opacity: 0.1;
}

.header-pattern {
    background-image: 
        radial-gradient(circle at 25% 25%, rgba(255,255,255,0.3) 0%, transparent 25%),
        radial-gradient(circle at 75% 75%, rgba(255,255,255,0.2) 0%, transparent 25%);
    background-size: 60px 60px;
    width: 100%;
    height: 100%;
}

.page-header-content {
    position: relative;
    z-index: 2;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.page-title {
    display: flex;
    align-items: center;
    gap: 1.25rem;
}

.title-icon {
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.title-icon i {
    font-size: 1.75rem;
    color: white;
}

.title-content h1 {
    color: white;
    font-size: 2rem;
    font-weight: 700;
    margin: 0 0 0.5rem 0;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}

.title-content .subtitle {
    color: rgba(255, 255, 255, 0.9);
    font-size: 1rem;
    margin: 0 0 0.75rem 0;
    font-weight: 400;
}

.job-name {
    font-style: italic;
    font-weight: 600;
    color: rgba(255, 255, 255, 0.95);
}

.job-status-info {
    display: flex;
    align-items: center;
    gap: 1rem;
    flex-wrap: wrap;
}

.status-badge {
    padding: 4px 10px;
    border-radius: 15px;
    font-size: 0.75rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 4px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.status-badge.status-published {
    background: rgba(16, 185, 129, 0.2);
    color: #10B981;
    border-color: rgba(16, 185, 129, 0.3);
}

.status-badge.status-draft {
    background: rgba(245, 158, 11, 0.2);
    color: #F59E0B;
    border-color: rgba(245, 158, 11, 0.3);
}

.status-badge.status-closed {
    background: rgba(239, 68, 68, 0.2);
    color: #EF4444;
    border-color: rgba(239, 68, 68, 0.3);
}

.creation-date {
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.8rem;
    display: flex;
    align-items: center;
    gap: 4px;
}

/* Premium Buttons */
.btn-premium {
    position: relative;
    padding: 10px 20px;
    border-radius: 10px;
    font-weight: 600;
    font-size: 0.85rem;
    text-transform: none;
    letter-spacing: 0.3px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 3px 12px rgba(0, 0, 0, 0.1);
}

.btn-premium::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s ease;
}

.btn-premium:hover::before {
    left: 100%;
}

.btn-premium i {
    margin-right: 6px;
    transition: transform 0.3s ease;
}

.btn-premium:hover i {
    transform: scale(1.1);
}

.btn-primary.btn-premium {
    background: var(--gradient-primary);
    color: white;
}

.btn-primary.btn-premium:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(139, 0, 0, 0.3);
}

.btn-secondary.btn-premium {
    background: var(--gradient-secondary);
    color: white;
}

.btn-secondary.btn-premium:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(75, 85, 99, 0.3);
}

.btn-warning.btn-premium {
    background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
    color: white;
}

.btn-warning.btn-premium:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(245, 158, 11, 0.3);
}

.btn-outline-secondary.btn-premium {
    background: transparent;
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: white;
}

.btn-outline-secondary.btn-premium:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.5);
}

.btn-outline-light.btn-premium {
    background: transparent;
    border: 2px solid rgba(255, 255, 255, 0.4);
    color: white;
}

.btn-outline-light.btn-premium:hover {
    background: rgba(255, 255, 255, 0.15);
    border-color: rgba(255, 255, 255, 0.6);
}

/* Premium Cards */
.premium-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 18px;
    box-shadow: var(--shadow-glass);
    margin-bottom: 2rem;
    overflow: hidden;
}

.premium-card .card-header {
    background: var(--gradient-primary);
    color: white;
    padding: 1.25rem 1.75rem;
    border-bottom: none;
    position: relative;
    overflow: hidden;
}

.premium-card .card-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    opacity: 0.5;
}

.premium-card .card-header h3 {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 600;
    position: relative;
    z-index: 2;
}

.premium-card .card-header h3 i {
    margin-right: 8px;
}

/* Premium Form */
.premium-form {
    padding: 1.75rem;
}

.form-grid {
    display: grid;
    gap: 1.75rem;
}

.form-section {
    background: rgba(255, 255, 255, 0.5);
    border-radius: 14px;
    padding: 1.75rem;
    border: 1px solid rgba(255, 255, 255, 0.3);
    backdrop-filter: blur(10px);
}

.section-header {
    display: flex;
    align-items: center;
    gap: 0.875rem;
    margin-bottom: 1.75rem;
    padding-bottom: 0.875rem;
    border-bottom: 2px solid rgba(139, 0, 0, 0.1);
}

.section-icon {
    width: 44px;
    height: 44px;
    background: var(--gradient-primary);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.section-icon i {
    font-size: 1.1rem;
    color: white;
}

.section-title h4 {
    margin: 0 0 0.375rem 0;
    font-size: 1.1rem;
    font-weight: 600;
    color: #1F2937;
}

.section-title p {
    margin: 0;
    font-size: 0.8rem;
    color: #6B7280;
}

.form-fields {
    display: grid;
    gap: 1.25rem;
}

.fields-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.25rem;
}

.field-group {
    display: flex;
    flex-direction: column;
}

.field-label {
    display: flex;
    align-items: center;
    font-weight: 600;
    margin-bottom: 6px;
    color: #374151;
    font-size: 0.8rem;
}

.field-label i {
    margin-right: 6px;
    color: #8B0000;
    width: 14px;
}

.required {
    color: #EF4444;
    margin-left: 3px;
}

.form-control, .form-select {
    width: 100%;
    padding: 10px 14px;
    border: 2px solid #E5E7EB;
    border-radius: 10px;
    font-size: 0.8rem;
    transition: all 0.3s ease;
    background: white;
}

.form-control:focus, .form-select:focus {
    border-color: #8B0000;
    box-shadow: 0 0 0 3px rgba(139, 0, 0, 0.1);
    outline: none;
}

.form-control.is-invalid, .form-select.is-invalid {
    border-color: #EF4444;
    box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
}

.invalid-feedback {
    color: #EF4444;
    font-size: 0.75rem;
    margin-top: 0.375rem;
}

.input-group {
    display: flex;
    align-items: stretch;
}

.input-group-text {
    background: #F3F4F6;
    border: 2px solid #E5E7EB;
    border-right: none;
    border-radius: 10px 0 0 10px;
    padding: 10px 14px;
    font-weight: 600;
    color: #6B7280;
    font-size: 0.8rem;
}

.input-group .form-control {
    border-left: none;
    border-radius: 0 10px 10px 0;
}

.auto-resize {
    resize: vertical;
    min-height: 100px;
}

.form-text {
    font-size: 0.7rem;
    color: #6B7280;
    margin-top: 0.25rem;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

/* Form Actions */
.form-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 2.5rem;
    padding-top: 1.75rem;
    border-top: 2px solid rgba(139, 0, 0, 0.1);
}

.actions-left, .actions-right {
    display: flex;
    gap: 0.875rem;
}

.actions-right {
    margin-left: auto;
}

/* Header Actions */
.header-actions {
    display: flex;
    gap: 0.875rem;
    flex-shrink: 0;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .jobs-management {
        padding: 1rem;
    }
    
    .premium-header {
        padding: 2rem 1.5rem;
    }
    
    .page-header-content {
        flex-direction: column;
        gap: 1.25rem;
        text-align: center;
    }
    
    .title-content h1 {
        font-size: 1.75rem;
    }
}

@media (max-width: 768px) {
    .premium-form {
        padding: 1.25rem;
    }
    
    .form-section {
        padding: 1.25rem;
    }
    
    .fields-row {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .section-header {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }
    
    .form-actions {
        flex-direction: column;
        gap: 1rem;
    }
    
    .actions-left, .actions-right {
        width: 100%;
        justify-content: center;
    }
    
    .header-actions {
        width: 100%;
        flex-direction: column;
    }
}

@media (max-width: 640px) {
    .premium-header {
        padding: 1.25rem 1rem;
    }
    
    .title-icon {
        width: 44px;
        height: 44px;
    }
    
    .title-icon i {
        font-size: 1.25rem;
    }
    
    .title-content h1 {
        font-size: 1.5rem;
    }
    
    .premium-form {
        padding: 1rem;
    }
    
    .form-section {
        padding: 1rem;
    }
    
    .job-status-info {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }
}
</style>
@endpush

@push('scripts')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({
        duration: 800,
        easing: 'ease-out-cubic',
        once: true,
        offset: 50
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
    function showLoading() {
        document.getElementById('loading-overlay').style.display = 'flex';
    }

    function hideLoading() {
        document.getElementById('loading-overlay').style.display = 'none';
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
    window.viewJob = function() {
        showLoading();
        setTimeout(() => {
            window.location.href = "{{ route('admin.jobs.show', $job) }}";
        }, 500);
    };

    window.goBack = function() {
        showLoading();
        setTimeout(() => {
            window.location.href = "{{ route('admin.jobs.index') }}";
        }, 500);
    };

    // Character counter for summary
    const summaryTextarea = document.getElementById('summary');
    if (summaryTextarea) {
        const counter = summaryTextarea.parentNode.querySelector('.char-counter');
        const currentSpan = counter.querySelector('.current');
        const maxLength = 500;
        
        function updateCounter() {
            const length = summaryTextarea.value.length;
            currentSpan.textContent = length;
            
            // Update counter styling based on length
            counter.classList.remove('warning', 'danger');
            if (length > maxLength * 0.8) {
                counter.classList.add('warning');
            }
            if (length > maxLength * 0.95) {
                counter.classList.add('danger');
            }
            
            // Prevent further input if max length exceeded
            if (length > maxLength) {
                summaryTextarea.value = summaryTextarea.value.substring(0, maxLength);
                currentSpan.textContent = maxLength;
                counter.classList.add('danger');
            }
        }
        
        summaryTextarea.addEventListener('input', updateCounter);
        updateCounter(); // Initialize counter
    }

    // Auto-resize textareas
    function autoResize(textarea) {
        textarea.style.height = 'auto';
        textarea.style.height = Math.min(textarea.scrollHeight, 400) + 'px';
    }

    document.querySelectorAll('.premium-textarea').forEach(textarea => {
        textarea.addEventListener('input', function() {
            autoResize(this);
        });
        // Initialize height
        autoResize(textarea);
    });

    // Enhanced form validation
    const form = document.getElementById('job-edit-form');
    const requiredFields = form.querySelectorAll('[required]');
    
    function validateField(field) {
        const container = field.closest('.form-group');
        const errorMessage = container.querySelector('.error-message');
        
        // Remove existing error styling
        field.classList.remove('error');
        if (errorMessage && !errorMessage.textContent.includes('{{')) {
            errorMessage.remove();
        }
        
        let isValid = true;
        let message = '';
        
        // Check if field is empty
        if (field.hasAttribute('required') && !field.value.trim()) {
            isValid = false;
            message = 'Field ini wajib diisi.';
        }
        
        // Specific validations
        if (field.type === 'email' && field.value && !isValidEmail(field.value)) {
            isValid = false;
            message = 'Format email tidak valid.';
        }
        
        if (field.type === 'url' && field.value && !isValidUrl(field.value)) {
            isValid = false;
            message = 'Format URL tidak valid.';
        }
        
        if (field.id === 'summary' && field.value.length > 500) {
            isValid = false;
            message = 'Ringkasan tidak boleh lebih dari 500 karakter.';
        }
        
        // Show error if invalid
        if (!isValid) {
            field.classList.add('error');
            if (!container.querySelector('.error-message')) {
                const errorDiv = document.createElement('div');
                errorDiv.className = 'error-message';
                errorDiv.innerHTML = `<i class="fas fa-exclamation-circle"></i> ${message}`;
                field.parentNode.insertAdjacentElement('afterend', errorDiv);
            }
        }
        
        return isValid;
    }
    
    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }
    
    function isValidUrl(url) {
        try {
            new URL(url);
            return true;
        } catch {
            return false;
        }
    }
    
    // Real-time validation
    requiredFields.forEach(field => {
        field.addEventListener('blur', () => validateField(field));
        field.addEventListener('input', () => {
            if (field.classList.contains('error')) {
                validateField(field);
            }
        });
    });

    // Form submission with validation
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        let isFormValid = true;
        requiredFields.forEach(field => {
            if (!validateField(field)) {
                isFormValid = false;
            }
        });
        
        if (!isFormValid) {
            showAlert('Mohon perbaiki error yang ada sebelum menyimpan.', 'error');
            // Scroll to first error
            const firstError = form.querySelector('.error');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstError.focus();
            }
            return;
        }
        
        showLoading();
        
        // Submit form after short delay for UX
        setTimeout(() => {
            this.submit();
        }, 1000);
    });

    // Auto-save functionality (draft mode)
    let autoSaveTimeout;
    const autoSaveIndicator = document.createElement('div');
    autoSaveIndicator.className = 'auto-save-indicator';
    autoSaveIndicator.innerHTML = '<i class="fas fa-save"></i> <span>Auto-saving...</span>';
    document.body.appendChild(autoSaveIndicator);
    
    function triggerAutoSave() {
        clearTimeout(autoSaveTimeout);
        autoSaveTimeout = setTimeout(() => {
            saveAsDraft();
        }, 3000); // Auto-save after 3 seconds of inactivity
    }
    
    function saveAsDraft() {
        autoSaveIndicator.className = 'auto-save-indicator saving';
        autoSaveIndicator.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span>Menyimpan draft...</span>';
        
        const formData = new FormData(form);
        formData.append('auto_save', '1');
        formData.append('status', 'draft');
        
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                autoSaveIndicator.className = 'auto-save-indicator saved';
                autoSaveIndicator.innerHTML = '<i class="fas fa-check"></i> <span>Draft tersimpan</span>';
                setTimeout(() => {
                    autoSaveIndicator.style.display = 'none';
                }, 2000);
            }
        })
        .catch(error => {
            console.error('Auto-save failed:', error);
            autoSaveIndicator.style.display = 'none';
        });
    }
    
    // Trigger auto-save on form changes
    form.addEventListener('input', triggerAutoSave);
    form.addEventListener('change', triggerAutoSave);

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

    // Enhanced keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (e.ctrlKey || e.metaKey) {
            switch(e.key) {
                case 's':
                    e.preventDefault();
                    form.dispatchEvent(new Event('submit'));
                    break;
                case 'Backspace':
                    e.preventDefault();
                    goBack();
                    break;
            }
        }
        
        if (e.key === 'Escape') {
            const alerts = document.querySelectorAll('.premium-alert.show');
            alerts.forEach(alert => {
                closeAlert(alert.id);
            });
        }
    });

    // Section progress tracking
    function updateSectionProgress() {
        const basicSection = document.querySelector('[data-section="basic"]');
        const basicFields = ['title', 'summary', 'description_html'];
        let completedFields = 0;
        
        basicFields.forEach(fieldId => {
            const field = document.getElementById(fieldId);
            if (field && field.value.trim()) {
                completedFields++;
            }
        });
        
        if (basicSection) {
            basicSection.textContent = `${completedFields}/${basicFields.length}`;
        }
    }
    
    // Update progress on field changes
    ['title', 'summary', 'description_html'].forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field) {
            field.addEventListener('input', updateSectionProgress);
        }
    });
    
    // Initialize progress
    updateSectionProgress();

    // Rich text editor simple toolbar
    document.querySelectorAll('.toolbar-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const action = this.dataset.action;
            
            // Toggle active state
            this.classList.toggle('active');
            
            // Execute command
            document.execCommand(action, false, null);
            
            // Focus back to editor
            const editor = this.closest('.editor-container').querySelector('.rich-editor');
            if (editor) {
                editor.focus();
            }
        });
    });

    // Success message if there are no errors
    if (!document.querySelector('.error-message')) {
        // Check if we came from a successful operation
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('success') === '1') {
            showAlert('Halaman berhasil dimuat!', 'success');
        }
    }
    
    console.log('🎉 Job Edit Form loaded successfully!');
});
</script>
@endpush
