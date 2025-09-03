@extends('admin.components.layout')

@section('title', 'Create New Job')

@section('content')
<!-- Loading Overlay -->
<div class="loading-overlay" style="display: none;">
    <div class="loading-spinner">
        <div class="spinner-circle"></div>
        <div class="loading-text">Creating job...</div>
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
                    <i class="fas fa-plus-circle"></i>
                </div>
                <div class="title-content">
                    <h1>Create New Job</h1>
                    <p class="subtitle">Add a new job posting to attract talented candidates</p>
                </div>
            </div>
            
            <div class="header-actions">
                <a href="{{ route('admin.jobs.index') }}" class="btn btn-outline-secondary btn-premium">
                    <i class="fas fa-arrow-left"></i>
                    Back to Jobs
                </a>
            </div>
        </div>
    </div>

    <!-- Premium Form Card -->
    <div class="premium-card" data-aos="fade-up" data-aos-delay="200">
        <div class="card-header">
            <h3><i class="fas fa-edit"></i> Job Information</h3>
        </div>
        
        <div class="premium-form">
            <form action="{{ route('admin.jobs.store') }}" method="POST" class="job-form">
                @csrf
                
                <div class="form-grid">
                    <!-- Basic Information Section -->
                    <div class="form-section" data-aos="fade-up" data-aos-delay="300">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <div class="section-title">
                                <h4>Basic Information</h4>
                                <p>Enter the fundamental details about this job position</p>
                            </div>
                        </div>
                        
                        <div class="form-fields">
                            <div class="field-group">
                                <label for="title" class="field-label">
                                    <i class="fas fa-briefcase"></i>
                                    Job Title <span class="required">*</span>
                                </label>
                                <input type="text" 
                                       id="title" 
                                       name="title" 
                                       class="form-control @error('title') is-invalid @enderror" 
                                       value="{{ old('title') }}" 
                                       required
                                       placeholder="e.g. Senior Software Engineer">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field-group">
                                <label for="summary" class="field-label">
                                    <i class="fas fa-file-alt"></i>
                                    Job Summary <span class="required">*</span>
                                </label>
                                <textarea id="summary" 
                                          name="summary" 
                                          class="form-control auto-resize @error('summary') is-invalid @enderror" 
                                          rows="3" 
                                          required
                                          maxlength="255"
                                          placeholder="Brief summary of the job position (max 255 characters)...">{{ old('summary') }}</textarea>
                                <small class="form-text">
                                    <span id="summary-counter">0</span>/255 characters
                                </small>
                                @error('summary')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="fields-row">
                                <div class="field-group">
                                    <label for="department" class="field-label">
                                        <i class="fas fa-users"></i>
                                        Department
                                    </label>
                                    <input type="text" 
                                           id="department" 
                                           name="department" 
                                           class="form-control @error('department') is-invalid @enderror" 
                                           value="{{ old('department') }}"
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
                                        <option value="">Select Status</option>
                                        <option value="draft" {{ old('status', 'draft') == 'draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                                        <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Closed</option>
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
                                <h4>Job Details</h4>
                                <p>Specify the job requirements and working conditions</p>
                            </div>
                        </div>
                        
                        <div class="form-fields">
                            <div class="field-group">
                                <label for="description_html" class="field-label">
                                    <i class="fas fa-align-left"></i>
                                    Job Description <span class="required">*</span>
                                </label>
                                <textarea id="description_html" 
                                          name="description_html" 
                                          class="form-control auto-resize @error('description_html') is-invalid @enderror" 
                                          rows="6" 
                                          required
                                          placeholder="Provide a detailed description of the job role, responsibilities, and what the candidate will be doing...">{{ old('description_html') }}</textarea>
                                @error('description_html')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field-group">
                                <label for="requirements" class="field-label">
                                    <i class="fas fa-check-square"></i>
                                    Requirements
                                </label>
                                <textarea id="requirements" 
                                          name="requirements" 
                                          class="form-control auto-resize @error('requirements') is-invalid @enderror" 
                                          rows="5" 
                                          placeholder="List the required skills, experience, education, and qualifications...">{{ old('requirements') }}</textarea>
                                @error('requirements')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="fields-row">
                                <div class="field-group">
                                    <label for="employment_type" class="field-label">
                                        <i class="fas fa-clock"></i>
                                        Employment Type <span class="required">*</span>
                                    </label>
                                    <select id="employment_type" 
                                            name="employment_type" 
                                            class="form-select @error('employment_type') is-invalid @enderror" 
                                            required>
                                        <option value="">Select Type</option>
                                        <option value="full-time" {{ old('employment_type', 'full-time') == 'full-time' ? 'selected' : '' }}>Full Time</option>
                                        <option value="part-time" {{ old('employment_type') == 'part-time' ? 'selected' : '' }}>Part Time</option>
                                        <option value="contract" {{ old('employment_type') == 'contract' ? 'selected' : '' }}>Contract</option>
                                        <option value="internship" {{ old('employment_type') == 'internship' ? 'selected' : '' }}>Internship</option>
                                    </select>
                                    @error('employment_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="field-group">
                                    <label for="remote_policy" class="field-label">
                                        <i class="fas fa-laptop-house"></i>
                                        Remote Policy <span class="required">*</span>
                                    </label>
                                    <select id="remote_policy" 
                                            name="remote_policy" 
                                            class="form-select @error('remote_policy') is-invalid @enderror" 
                                            required>
                                        <option value="">Select Remote Policy</option>
                                        <option value="onsite" {{ old('remote_policy') == 'onsite' ? 'selected' : '' }}>On-site</option>
                                        <option value="hybrid" {{ old('remote_policy', 'hybrid') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                                        <option value="remote" {{ old('remote_policy') == 'remote' ? 'selected' : '' }}>Remote</option>
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
                                <h4>Location & Compensation</h4>
                                <p>Set the work location and salary information</p>
                            </div>
                        </div>
                        
                        <div class="form-fields">
                            <div class="fields-row">
                                <div class="field-group">
                                    <label for="location" class="field-label">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Location <span class="required">*</span>
                                    </label>
                                    <input type="text" 
                                           id="location" 
                                           name="location" 
                                           class="form-control @error('location') is-invalid @enderror" 
                                           value="{{ old('location') }}" 
                                           required
                                           placeholder="e.g. Jakarta, Indonesia">
                                    @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="field-group">
                                    <label for="experience_level" class="field-label">
                                        <i class="fas fa-chart-line"></i>
                                        Experience Level
                                    </label>
                                    <select id="experience_level" 
                                            name="experience_level" 
                                            class="form-select @error('experience_level') is-invalid @enderror">
                                        <option value="">Select Level</option>
                                        <option value="entry" {{ old('experience_level') == 'entry' ? 'selected' : '' }}>Entry Level</option>
                                        <option value="mid" {{ old('experience_level') == 'mid' ? 'selected' : '' }}>Mid Level</option>
                                        <option value="senior" {{ old('experience_level') == 'senior' ? 'selected' : '' }}>Senior Level</option>
                                        <option value="lead" {{ old('experience_level') == 'lead' ? 'selected' : '' }}>Lead/Manager</option>
                                    </select>
                                    @error('experience_level')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="fields-row">
                                <div class="field-group">
                                    <label for="salary_min" class="field-label">
                                        <i class="fas fa-dollar-sign"></i>
                                        Minimum Salary
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" 
                                               id="salary_min" 
                                               name="salary_min" 
                                               class="form-control @error('salary_min') is-invalid @enderror" 
                                               value="{{ old('salary_min') }}"
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
                                        Maximum Salary
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" 
                                               id="salary_max" 
                                               name="salary_max" 
                                               class="form-control @error('salary_max') is-invalid @enderror" 
                                               value="{{ old('salary_max') }}"
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
                                    Currency
                                </label>
                                <select id="salary_currency" 
                                        name="salary_currency" 
                                        class="form-select @error('salary_currency') is-invalid @enderror">
                                    <option value="IDR" {{ old('salary_currency', 'IDR') == 'IDR' ? 'selected' : '' }}>Indonesian Rupiah (IDR)</option>
                                    <option value="USD" {{ old('salary_currency') == 'USD' ? 'selected' : '' }}>US Dollar (USD)</option>
                                    <option value="EUR" {{ old('salary_currency') == 'EUR' ? 'selected' : '' }}>Euro (EUR)</option>
                                    <option value="SGD" {{ old('salary_currency') == 'SGD' ? 'selected' : '' }}>Singapore Dollar (SGD)</option>
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
                                <h4>Application Details</h4>
                                <p>Set application deadlines and contact information</p>
                            </div>
                        </div>
                        
                        <div class="form-fields">
                            <div class="fields-row">
                                <div class="field-group">
                                    <label for="published_at" class="field-label">
                                        <i class="fas fa-calendar-plus"></i>
                                        Published Date
                                    </label>
                                    <input type="datetime-local" 
                                           id="published_at" 
                                           name="published_at" 
                                           class="form-control @error('published_at') is-invalid @enderror" 
                                           value="{{ old('published_at') }}">
                                    @error('published_at')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="field-group">
                                    <label for="close_at" class="field-label">
                                        <i class="fas fa-calendar-times"></i>
                                        Close Date
                                    </label>
                                    <input type="datetime-local" 
                                           id="close_at" 
                                           name="close_at" 
                                           class="form-control @error('close_at') is-invalid @enderror" 
                                           value="{{ old('close_at') }}">
                                    @error('close_at')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="field-group">
                                <label for="apply_email" class="field-label">
                                    <i class="fas fa-envelope"></i>
                                    Application Email
                                </label>
                                <input type="email" 
                                       id="apply_email" 
                                       name="apply_email" 
                                       class="form-control @error('apply_email') is-invalid @enderror" 
                                       value="{{ old('apply_email') }}"
                                       placeholder="hr@talirejeki.com">
                                @error('apply_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field-group">
                                <label for="apply_url" class="field-label">
                                    <i class="fas fa-link"></i>
                                    Application URL
                                </label>
                                <input type="url" 
                                       id="apply_url" 
                                       name="apply_url" 
                                       class="form-control @error('apply_url') is-invalid @enderror" 
                                       value="{{ old('apply_url') }}"
                                       placeholder="https://careers.talirejeki.com/apply">
                                @error('apply_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status Toggle -->
                            <div class="field-group">
                                <div class="custom-switch">
                                    <input type="hidden" name="is_open" value="0">
                                    <input type="checkbox" 
                                           id="is_open" 
                                           name="is_open" 
                                           class="custom-switch-input" 
                                           value="1" 
                                           {{ old('is_open', 1) ? 'checked' : '' }}>
                                    <label for="is_open" class="custom-switch-label">
                                        <span class="custom-switch-button"></span>
                                        <span class="custom-switch-text">
                                            <i class="fas fa-user-plus"></i>
                                            Accept Applications
                                        </span>
                                    </label>
                                    <small class="form-text">Enable this to allow candidates to apply for this position</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions" data-aos="fade-up" data-aos-delay="700">
                    <div class="actions-left">
                        <button type="button" class="btn btn-secondary btn-premium" onclick="window.history.back()">
                            <i class="fas fa-times"></i>
                            Cancel
                        </button>
                    </div>
                    
                    <div class="actions-right">
                        <button type="button" class="btn btn-warning btn-premium" id="save-draft">
                            <i class="fas fa-save"></i>
                            Save as Draft
                        </button>
                        <button type="submit" class="btn btn-primary btn-premium">
                            <i class="fas fa-plus-circle"></i>
                            Create Job
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
/* ===== PREMIUM CREATE JOB FORM STYLES ===== */
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
    font-size: 1.1rem;
    font-weight: 600;
    margin-top: 10px;
}

/* Alert Container */
.alert-container {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 9998;
    max-width: 400px;
}

.alert {
    margin-bottom: 10px;
    padding: 15px 20px;
    border-radius: 12px;
    border: none;
    font-weight: 500;
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
    padding: 2rem;
}

/* Premium Header */
.premium-header {
    position: relative;
    background: var(--gradient-primary);
    border-radius: 20px;
    padding: 3rem 2rem;
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
    gap: 1.5rem;
}

.title-icon {
    width: 70px;
    height: 70px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.title-icon i {
    font-size: 2rem;
    color: white;
}

.title-content h1 {
    color: white;
    font-size: 2.5rem;
    font-weight: 700;
    margin: 0 0 0.5rem 0;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}

.title-content .subtitle {
    color: rgba(255, 255, 255, 0.9);
    font-size: 1.1rem;
    margin: 0;
    font-weight: 400;
}

/* Premium Buttons */
.btn-premium {
    position: relative;
    padding: 12px 24px;
    border-radius: 12px;
    font-weight: 600;
    text-transform: none;
    letter-spacing: 0.5px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
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
    margin-right: 8px;
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
    box-shadow: 0 8px 25px rgba(139, 0, 0, 0.3);
}

.btn-secondary.btn-premium {
    background: var(--gradient-secondary);
    color: white;
}

.btn-secondary.btn-premium:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(75, 85, 99, 0.3);
}

.btn-warning.btn-premium {
    background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
    color: white;
}

.btn-warning.btn-premium:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3);
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

/* Premium Cards */
.premium-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 20px;
    box-shadow: var(--shadow-glass);
    margin-bottom: 2rem;
    overflow: hidden;
}

.premium-card .card-header {
    background: var(--gradient-primary);
    color: white;
    padding: 1.5rem 2rem;
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
    font-size: 1.25rem;
    font-weight: 600;
    position: relative;
    z-index: 2;
}

.premium-card .card-header h3 i {
    margin-right: 10px;
}

/* Premium Form */
.premium-form {
    padding: 2rem;
}

.form-grid {
    display: grid;
    gap: 2rem;
}

.form-section {
    background: rgba(255, 255, 255, 0.5);
    border-radius: 16px;
    padding: 2rem;
    border: 1px solid rgba(255, 255, 255, 0.3);
    backdrop-filter: blur(10px);
}

.section-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 2rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid rgba(139, 0, 0, 0.1);
}

.section-icon {
    width: 50px;
    height: 50px;
    background: var(--gradient-primary);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.section-icon i {
    font-size: 1.25rem;
    color: white;
}

.section-title h4 {
    margin: 0 0 0.5rem 0;
    font-size: 1.25rem;
    font-weight: 600;
    color: #1F2937;
}

.section-title p {
    margin: 0;
    font-size: 0.9rem;
    color: #6B7280;
}

.form-fields {
    display: grid;
    gap: 1.5rem;
}

.fields-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
}

.field-group {
    display: flex;
    flex-direction: column;
}

.field-label {
    display: flex;
    align-items: center;
    font-weight: 600;
    margin-bottom: 8px;
    color: #374151;
    font-size: 0.9rem;
}

.field-label i {
    margin-right: 8px;
    color: #8B0000;
    width: 16px;
}

.required {
    color: #EF4444;
    margin-left: 4px;
}

.form-control, .form-select {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #E5E7EB;
    border-radius: 12px;
    font-size: 0.9rem;
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
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

.input-group {
    display: flex;
    align-items: stretch;
}

.input-group-text {
    background: #F3F4F6;
    border: 2px solid #E5E7EB;
    border-right: none;
    border-radius: 12px 0 0 12px;
    padding: 12px 16px;
    font-weight: 600;
    color: #6B7280;
}

.input-group .form-control {
    border-left: none;
    border-radius: 0 12px 12px 0;
}

.auto-resize {
    resize: vertical;
    min-height: 120px;
}

/* Custom Switch */
.custom-switch {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.custom-switch-input {
    display: none;
}

.custom-switch-label {
    display: flex;
    align-items: center;
    gap: 1rem;
    cursor: pointer;
    user-select: none;
}

.custom-switch-button {
    position: relative;
    width: 50px;
    height: 28px;
    background: #D1D5DB;
    border-radius: 14px;
    transition: all 0.3s ease;
}

.custom-switch-button::after {
    content: '';
    position: absolute;
    top: 2px;
    left: 2px;
    width: 24px;
    height: 24px;
    background: white;
    border-radius: 50%;
    transition: all 0.3s ease;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.custom-switch-input:checked + .custom-switch-label .custom-switch-button {
    background: #8B0000;
}

.custom-switch-input:checked + .custom-switch-label .custom-switch-button::after {
    transform: translateX(22px);
}

.custom-switch-text {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    color: #374151;
}

.custom-switch-text i {
    color: #8B0000;
}

.form-text {
    font-size: 0.8rem;
    color: #6B7280;
    margin-top: 0.25rem;
}

/* Form Actions */
.form-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 3rem;
    padding-top: 2rem;
    border-top: 2px solid rgba(139, 0, 0, 0.1);
}

.actions-left, .actions-right {
    display: flex;
    gap: 1rem;
}

.actions-right {
    margin-left: auto;
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
        gap: 1.5rem;
        text-align: center;
    }
    
    .title-content h1 {
        font-size: 2rem;
    }
}

@media (max-width: 768px) {
    .premium-form {
        padding: 1.5rem;
    }
    
    .form-section {
        padding: 1.5rem;
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
}

@media (max-width: 640px) {
    .premium-header {
        padding: 1.5rem 1rem;
    }
    
    .title-icon {
        width: 50px;
        height: 50px;
    }
    
    .title-icon i {
        font-size: 1.5rem;
    }
    
    .title-content h1 {
        font-size: 1.75rem;
    }
    
    .premium-form {
        padding: 1rem;
    }
    
    .form-section {
        padding: 1rem;
    }
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ===== PREMIUM CREATE JOB FORM JAVASCRIPT ===== //
    
    // Initialize AOS animations
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        offset: 100
    });

    // Loading management
    function showLoading(text = 'Processing...') {
        const overlay = document.querySelector('.loading-overlay');
        const loadingText = overlay.querySelector('.loading-text');
        loadingText.textContent = text;
        overlay.style.display = 'flex';
    }

    function hideLoading() {
        setTimeout(() => {
            const overlay = document.querySelector('.loading-overlay');
            overlay.style.display = 'none';
        }, 500);
    }

    // Alert management
    function showAlert(message, type = 'success', duration = 5000) {
        const alertContainer = document.querySelector('.alert-container');
        
        const alert = document.createElement('div');
        alert.className = `alert alert-${type}`;
        alert.innerHTML = `
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span>${message}</span>
                <button type="button" class="btn-close" style="background: none; border: none; color: inherit; font-size: 1.2rem; cursor: pointer;">&times;</button>
            </div>
        `;
        
        alertContainer.appendChild(alert);
        
        // Auto remove
        setTimeout(() => {
            if (alert.parentNode) {
                alert.style.animation = 'slideOutRight 0.3s ease-in';
                setTimeout(() => {
                    if (alert.parentNode) {
                        alert.remove();
                    }
                }, 300);
            }
        }, duration);
        
        // Manual close
        alert.querySelector('.btn-close').addEventListener('click', () => {
            alert.style.animation = 'slideOutRight 0.3s ease-in';
            setTimeout(() => {
                if (alert.parentNode) {
                    alert.remove();
                }
            }, 300);
        });
    }

    // Auto-resize textareas
    const autoResizeTextareas = document.querySelectorAll('.auto-resize');
    autoResizeTextareas.forEach(textarea => {
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });
    });

    // Character counter for summary
    const summaryTextarea = document.getElementById('summary');
    const summaryCounter = document.getElementById('summary-counter');
    
    if (summaryTextarea && summaryCounter) {
        function updateSummaryCounter() {
            const length = summaryTextarea.value.length;
            summaryCounter.textContent = length;
            
            if (length > 230) {
                summaryCounter.style.color = '#EF4444';
            } else if (length > 200) {
                summaryCounter.style.color = '#F59E0B';
            } else {
                summaryCounter.style.color = '#6B7280';
            }
        }
        
        summaryTextarea.addEventListener('input', updateSummaryCounter);
        updateSummaryCounter(); // Initial count
    }

    // Save as draft functionality
    const saveDraftBtn = document.getElementById('save-draft');
    const statusSelect = document.getElementById('status');
    
    if (saveDraftBtn) {
        saveDraftBtn.addEventListener('click', function() {
            statusSelect.value = 'draft';
            showLoading('Saving as draft...');
            document.querySelector('.job-form').submit();
        });
    }

    // Form validation
    const form = document.querySelector('.job-form');
    
    if (form) {
        form.addEventListener('submit', function(e) {
            const salaryMin = document.getElementById('salary_min');
            const salaryMax = document.getElementById('salary_max');
            
            // Validate salary range
            if (salaryMin.value && salaryMax.value) {
                const min = parseFloat(salaryMin.value);
                const max = parseFloat(salaryMax.value);
                
                if (max < min) {
                    e.preventDefault();
                    showAlert('Maximum salary must be greater than or equal to minimum salary', 'error');
                    salaryMax.focus();
                    return;
                }
            }
            
            // Validate application deadline
            const publishedAt = document.getElementById('published_at');
            const closeAt = document.getElementById('close_at');
            
            if (publishedAt.value && closeAt.value) {
                const published = new Date(publishedAt.value);
                const closeDate = new Date(closeAt.value);
                
                if (closeDate <= published) {
                    e.preventDefault();
                    showAlert('Close date must be after the published date', 'error');
                    closeAt.focus();
                    return;
                }
            }
            
            showLoading('Creating job...');
        });
    }

    // Real-time salary validation
    const salaryMin = document.getElementById('salary_min');
    const salaryMax = document.getElementById('salary_max');
    
    function validateSalary() {
        if (salaryMin.value && salaryMax.value) {
            const min = parseFloat(salaryMin.value);
            const max = parseFloat(salaryMax.value);
            
            if (max < min) {
                salaryMax.setCustomValidity('Maximum salary must be greater than or equal to minimum salary');
                salaryMax.classList.add('is-invalid');
            } else {
                salaryMax.setCustomValidity('');
                salaryMax.classList.remove('is-invalid');
            }
        }
    }
    
    if (salaryMin && salaryMax) {
        salaryMin.addEventListener('input', validateSalary);
        salaryMax.addEventListener('input', validateSalary);
    }

    // Enhanced form interactions
    const formControls = document.querySelectorAll('.form-control, .form-select');
    
    formControls.forEach(control => {
        control.addEventListener('focus', function() {
            this.parentNode.style.transform = 'scale(1.02)';
            this.parentNode.style.transition = 'transform 0.2s ease';
        });
        
        control.addEventListener('blur', function() {
            this.parentNode.style.transform = 'scale(1)';
        });
    });

    // Premium button ripple effect
    function createRipple(event) {
        const button = event.currentTarget;
        const circle = document.createElement('span');
        const diameter = Math.max(button.clientWidth, button.clientHeight);
        const radius = diameter / 2;

        circle.style.width = circle.style.height = `${diameter}px`;
        circle.style.left = `${event.clientX - button.offsetLeft - radius}px`;
        circle.style.top = `${event.clientY - button.offsetTop - radius}px`;
        circle.classList.add('ripple');

        const ripple = button.getElementsByClassName('ripple')[0];
        if (ripple) {
            ripple.remove();
        }

        button.appendChild(circle);
    }

    document.querySelectorAll('.btn-premium').forEach(button => {
        button.addEventListener('click', createRipple);
    });

    // Auto-hide alerts from server
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

    // Hide loading on page load
    hideLoading();

    console.log('🚀 Premium Create Job Form initialized successfully!');
});

// CSS for ripple effect
const style = document.createElement('style');
style.textContent = `
    .ripple {
        position: absolute;
        border-radius: 50%;
        transform: scale(0);
        animation: ripple 600ms linear;
        background-color: rgba(255, 255, 255, 0.6);
    }

    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }

    @keyframes slideOutRight {
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);
</script>
@endpush
