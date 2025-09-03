@extends('admin.components.layout')

@section('title', $title)

@section('content')
<!-- Loading Overlay -->
<div id="loadingOverlay" class="loading-overlay" style="display: none;">
    <div class="loading-spinner">
        <div class="spinner-circle"></div>
        <div class="loading-text">Memproses permintaan...</div>
    </div>
</div>

<!-- Alert Container -->
<div id="alertContainer" class="alert-container"></div>

<div class="admin-content jobs-management">
    <!-- Page Header -->
    <div class="page-header premium-header">
        <div class="header-background">
            <div class="header-pattern"></div>
        </div>
        <div class="page-header-content">
            <div class="page-title">
                <div class="title-icon">
                    <i class="fas fa-briefcase"></i>
                </div>
                <div class="title-content">
                    <h1>{{ $title }}</h1>
                    <p class="subtitle">Kelola lowongan kerja dengan sistem manajemen terpadu</p>
                </div>
            </div>
            <div class="page-actions">
                <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary btn-premium">
                    <i class="fas fa-plus-circle"></i>
                    <span>Tambah Lowongan</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid premium-stats">
        <div class="stat-card glass-effect" data-aos="fade-up" data-aos-delay="100">
            <div class="stat-background"></div>
            <div class="stat-icon">
                <i class="fas fa-briefcase"></i>
            </div>
            <div class="stat-content">
                <h3 class="counter" data-target="{{ $stats['total'] }}">0</h3>
                <p>Total Lowongan</p>
                <div class="stat-trend">
                    <i class="fas fa-chart-line"></i>
                    <span>Total semua</span>
                </div>
            </div>
        </div>
        <div class="stat-card glass-effect" data-aos="fade-up" data-aos-delay="200">
            <div class="stat-background"></div>
            <div class="stat-icon success">
                <i class="fas fa-eye"></i>
            </div>
            <div class="stat-content">
                <h3 class="counter" data-target="{{ $stats['published'] }}">0</h3>
                <p>Dipublikasikan</p>
                <div class="stat-trend positive">
                    <i class="fas fa-eye"></i>
                    <span>Aktif</span>
                </div>
            </div>
        </div>
        <div class="stat-card glass-effect" data-aos="fade-up" data-aos-delay="300">
            <div class="stat-background"></div>
            <div class="stat-icon warning">
                <i class="fas fa-edit"></i>
            </div>
            <div class="stat-content">
                <h3 class="counter" data-target="{{ $stats['draft'] }}">0</h3>
                <p>Draft</p>
                <div class="stat-trend">
                    <i class="fas fa-edit"></i>
                    <span>Belum aktif</span>
                </div>
            </div>
        </div>
        <div class="stat-card glass-effect" data-aos="fade-up" data-aos-delay="400">
            <div class="stat-background"></div>
            <div class="stat-icon info">
                <i class="fas fa-door-open"></i>
            </div>
            <div class="stat-content">
                <h3 class="counter" data-target="{{ $stats['open'] }}">0</h3>
                <p>Masih Buka</p>
                <div class="stat-trend positive">
                    <i class="fas fa-door-open"></i>
                    <span>Tersedia</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters & Search -->
    <div class="content-card premium-card glass-effect" data-aos="fade-up" data-aos-delay="500">
        <div class="card-header">
            <h3><i class="fas fa-filter"></i> Filter & Pencarian</h3>
        </div>
        <form method="GET" class="filters-form premium-form">
            <div class="filters-container">
                <div class="filters-grid">
                    <div class="filter-item">
                        <label for="search"><i class="fas fa-search"></i> Pencarian</label>
                        <div class="input-group">
                            <input type="text" id="search" name="search" value="{{ request('search') }}" 
                                   placeholder="Cari lowongan..." class="form-control">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="filter-item">
                        <label for="status"><i class="fas fa-flag"></i> Status</label>
                        <select id="status" name="status" class="form-select">
                            <option value="">Semua Status</option>
                            <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>
                                <i class="fas fa-eye"></i> Dipublikasikan
                            </option>
                            <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>
                                <i class="fas fa-edit"></i> Draft
                            </option>
                        </select>
                    </div>
                    <div class="filter-item">
                        <label for="employment_type"><i class="fas fa-clock"></i> Tipe Pekerjaan</label>
                        <select id="employment_type" name="employment_type" class="form-select">
                            <option value="">Semua Tipe</option>
                            <option value="full-time" {{ request('employment_type') === 'full-time' ? 'selected' : '' }}>Full Time</option>
                            <option value="part-time" {{ request('employment_type') === 'part-time' ? 'selected' : '' }}>Part Time</option>
                            <option value="contract" {{ request('employment_type') === 'contract' ? 'selected' : '' }}>Contract</option>
                            <option value="internship" {{ request('employment_type') === 'internship' ? 'selected' : '' }}>Internship</option>
                        </select>
                    </div>
                    <div class="filter-item">
                        <label for="remote_policy"><i class="fas fa-laptop"></i> Kebijakan Remote</label>
                        <select id="remote_policy" name="remote_policy" class="form-select">
                            <option value="">Semua Kebijakan</option>
                            <option value="onsite" {{ request('remote_policy') === 'onsite' ? 'selected' : '' }}>Onsite</option>
                            <option value="remote" {{ request('remote_policy') === 'remote' ? 'selected' : '' }}>Remote</option>
                            <option value="hybrid" {{ request('remote_policy') === 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                        </select>
                    </div>
                </div>
                <div class="filters-actions">
                    <button type="submit" class="btn btn-primary btn-premium">
                        <i class="fas fa-filter"></i>
                        <span>Terapkan Filter</span>
                    </button>
                    <a href="{{ route('admin.jobs.index') }}" class="btn btn-outline-secondary btn-premium">
                        <i class="fas fa-undo-alt"></i>
                        <span>Reset Filter</span>
                    </a>
                </div>
            </div>
        </form>
    </div>

    <!-- Jobs Table -->
    <div class="content-card premium-card glass-effect" data-aos="fade-up" data-aos-delay="600">
        <div class="card-header">
            <h3><i class="fas fa-table"></i> Daftar Lowongan Kerja</h3>
        </div>

        @if($jobs->count() > 0)
            <div class="table-responsive premium-table-container">
                <table class="admin-table premium-table">
                    <thead>
                        <tr>
                            <th class="no-column" style="width: 60px;">No</th>
                            <th class="sortable">
                                <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'title', 'sort_dir' => request('sort_dir') === 'asc' ? 'desc' : 'asc']) }}" class="sort-link">
                                    <span>Judul Lowongan</span>
                                    @if(request('sort_by') === 'title')
                                        <i class="fas fa-sort-{{ request('sort_dir') === 'asc' ? 'up' : 'down' }} sort-icon active"></i>
                                    @else
                                        <i class="fas fa-sort sort-icon"></i>
                                    @endif
                                </a>
                            </th>
                            <th><i class="fas fa-map-marker-alt"></i> Lokasi</th>
                            <th><i class="fas fa-clock"></i> Tipe</th>
                            <th><i class="fas fa-laptop"></i> Remote</th>
                            <th><i class="fas fa-money-bill-wave"></i> Gaji</th>
                            <th><i class="fas fa-flag"></i> Status</th>
                            <th class="sortable">
                                <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'created_at', 'sort_dir' => request('sort_dir') === 'asc' ? 'desc' : 'asc']) }}" class="sort-link">
                                    <span>Dibuat</span>
                                    @if(request('sort_by') === 'created_at')
                                        <i class="fas fa-sort-{{ request('sort_dir') === 'asc' ? 'up' : 'down' }} sort-icon active"></i>
                                    @else
                                        <i class="fas fa-sort sort-icon"></i>
                                    @endif
                                </a>
                            </th>
                            <th><i class="fas fa-cogs"></i> Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobs as $job)
                            <tr class="table-row" data-aos="fade-up" data-aos-delay="{{ 100 + ($loop->index * 50) }}">
                                <td class="no-column">
                                    {{ ($jobs->currentPage() - 1) * $jobs->perPage() + $loop->iteration }}
                                </td>
                                <td>
                                    <div class="job-title premium-job-title">
                                        <h4>{{ $job->title }}</h4>
                                        <p class="job-summary">{{ Str::limit($job->summary, 80) }}</p>
                                        @if($job->department)
                                            <span class="department-badge">
                                                <i class="fas fa-building"></i>
                                                {{ $job->department }}
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="location-info">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>{{ $job->location }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge badge-employment badge-{{ $job->employment_type === 'full-time' ? 'primary' : ($job->employment_type === 'part-time' ? 'info' : 'secondary') }}">
                                        <i class="fas fa-clock"></i>
                                        {{ ucwords(str_replace('-', ' ', $job->employment_type)) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-remote badge-{{ $job->remote_policy === 'remote' ? 'success' : ($job->remote_policy === 'hybrid' ? 'warning' : 'secondary') }}">
                                        <i class="fas fa-{{ $job->remote_policy === 'remote' ? 'wifi' : ($job->remote_policy === 'hybrid' ? 'laptop-house' : 'building') }}"></i>
                                        {{ ucfirst($job->remote_policy) }}
                                    </span>
                                </td>
                                <td>
                                    @if($job->salary_display)
                                        <div class="salary-display">
                                            <i class="fas fa-money-bill-wave"></i>
                                            <span class="salary-amount">{{ $job->salary_display }}</span>
                                        </div>
                                    @else
                                        <span class="text-muted no-salary">
                                            <i class="fas fa-minus"></i> Tidak ditampilkan
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="status-badges">
                                        <span class="badge badge-status badge-{{ $job->status === 'published' ? 'success' : 'warning' }}">
                                            <i class="fas fa-{{ $job->status === 'published' ? 'eye' : 'edit' }}"></i>
                                            {{ $job->status === 'published' ? 'Dipublikasikan' : 'Draft' }}
                                        </span>
                                        @if($job->is_open)
                                            <span class="badge badge-open badge-success">
                                                <i class="fas fa-door-open"></i> Buka
                                            </span>
                                        @elseif($job->close_at && $job->close_at->isPast())
                                            <span class="badge badge-closed badge-danger">
                                                <i class="fas fa-door-closed"></i> Tutup
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="date-info">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span>{{ $job->created_at->format('d M Y') }}</span>
                                        <small class="text-muted">{{ $job->created_at->diffForHumans() }}</small>
                                    </div>
                                </td>
                                <td>
                                    <div class="action-buttons premium-actions">
                                        <a href="{{ route('admin.jobs.show', $job) }}" class="btn btn-sm btn-action btn-view" 
                                           title="Lihat Detail" data-tooltip="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.jobs.edit', $job) }}" class="btn btn-sm btn-action btn-edit" 
                                           title="Edit" data-tooltip="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.jobs.toggle-status', $job) }}" style="display: inline;" class="action-form">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-action btn-toggle btn-{{ $job->status === 'published' ? 'warning' : 'success' }}" 
                                                    title="{{ $job->status === 'published' ? 'Jadikan Draft' : 'Publikasikan' }}"
                                                    data-tooltip="{{ $job->status === 'published' ? 'Jadikan Draft' : 'Publikasikan' }}">
                                                <i class="fas fa-{{ $job->status === 'published' ? 'eye-slash' : 'eye' }}"></i>
                                            </button>
                                        </form>
                                        <button type="button" class="btn btn-sm btn-action btn-delete delete-job" 
                                                data-id="{{ $job->id }}" data-slug="{{ $job->slug }}" data-title="{{ $job->title }}"
                                                title="Hapus" data-tooltip="Hapus">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="pagination-wrapper premium-pagination">
                {{ $jobs->links() }}
            </div>
        @else
            <div class="empty-state premium-empty-state" data-aos="fade-up">
                <div class="empty-background">
                    <div class="empty-pattern"></div>
                </div>
                <div class="empty-content">
                    <div class="empty-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h3>Belum Ada Lowongan Kerja</h3>
                    <p>Mulai dengan menambahkan lowongan kerja untuk menarik talenta terbaik.</p>
                    <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary btn-premium btn-lg">
                        <i class="fas fa-plus-circle"></i>
                        <span>Tambah Lowongan Pertama</span>
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">
<style>
/* ===== PREMIUM JOBS MANAGEMENT STYLES ===== */
:root {
    --primary-dark-red: #7F1D1D;
    --primary-red: #991B1B;
    --accent-red: #B91C1C;
    --light-red: #FEF2F2;
    --ultra-dark-red: #450A0A;
    --gradient-primary: linear-gradient(135deg, #7F1D1D 0%, #991B1B 50%, #B91C1C 100%);
    --gradient-secondary: linear-gradient(135deg, #1F2937 0%, #374151 100%);
    --glass-bg: rgba(255, 255, 255, 0.95);
    --glass-border: rgba(127, 29, 29, 0.1);
    --shadow-premium: 0 20px 40px rgba(127, 29, 29, 0.15);
    --shadow-glass: 0 8px 32px rgba(0, 0, 0, 0.08);
    --text-primary: #1F2937;
    --text-secondary: #6B7280;
    --text-muted: #9CA3AF;
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
    width: 50px;
    height: 50px;
    border: 3px solid rgba(255, 255, 255, 0.3);
    border-top: 3px solid var(--primary-red);
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin: 0 auto 15px;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.loading-text {
    font-size: 0.9rem;
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

.alert-warning {
    background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
    color: white;
}

.alert-info {
    background: linear-gradient(135deg, #3B82F6 0%, #2563EB 100%);
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
    font-size: 1.75rem;
    font-weight: 700;
    margin: 0 0 0.5rem 0;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}

.title-content .subtitle {
    color: rgba(255, 255, 255, 0.9);
    font-size: 0.9rem;
    margin: 0;
    font-weight: 400;
}

/* Premium Buttons */
.btn-premium {
    position: relative;
    padding: 10px 20px;
    border-radius: 10px;
    font-weight: 600;
    text-transform: none;
    letter-spacing: 0.3px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    font-size: 0.85rem;
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
    font-size: 0.8rem;
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
    box-shadow: 0 8px 25px rgba(127, 29, 29, 0.3);
}

.btn-outline-secondary.btn-premium {
    background: linear-gradient(135deg, #6B7280 0%, #4B5563 100%);
    border: 2px solid #6B7280;
    color: white;
}

.btn-outline-secondary.btn-premium:hover {
    background: linear-gradient(135deg, #4B5563 0%, #374151 100%);
    border-color: #4B5563;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(75, 85, 99, 0.3);
}

/* Premium Stats Grid */
.premium-stats {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    margin-bottom: 2rem;
    justify-content: space-between;
}

.stat-card.glass-effect {
    position: relative;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 15px;
    padding: 1.2rem;
    overflow: hidden;
    box-shadow: var(--shadow-glass);
    transition: all 0.3s ease;
    flex: 1;
    min-width: 200px;
    max-width: 250px;
}

.stat-card.glass-effect:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(139, 0, 0, 0.2);
}

.stat-background {
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200px;
    height: 200px;
    background: var(--gradient-primary);
    border-radius: 50%;
    opacity: 0.05;
    transition: all 0.3s ease;
}

.stat-card:hover .stat-background {
    transform: scale(1.2);
    opacity: 0.1;
}

.stat-icon {
    width: 45px;
    height: 45px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 0.8rem;
    background: var(--gradient-primary);
    position: relative;
    z-index: 2;
}

.stat-icon.success {
    background: linear-gradient(135deg, #10B981 0%, #059669 100%);
}

.stat-icon.warning {
    background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
}

.stat-icon.info {
    background: linear-gradient(135deg, #3B82F6 0%, #2563EB 100%);
}

.stat-icon i {
    font-size: 1.2rem;
    color: white;
}

.stat-content {
    position: relative;
    z-index: 2;
}

.stat-content h3 {
    font-size: 1.3rem;
    font-weight: 700;
    margin: 0 0 0.3rem 0;
    color: var(--text-primary);
}

.stat-content p {
    font-size: 0.8rem;
    color: var(--text-secondary);
    margin: 0 0 0.6rem 0;
    font-weight: 600;
}

.stat-trend {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.75rem;
    color: var(--text-secondary);
    font-weight: 500;
}

.stat-trend.positive {
    color: #047857;
}

.stat-trend i {
    font-size: 0.7rem;
}

/* Counter Animation */
.counter {
    display: inline-block;
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
    font-size: 1rem;
    font-weight: 600;
    position: relative;
    z-index: 2;
}

.premium-card .card-header h3 i {
    margin-right: 8px;
    font-size: 0.9rem;
}

/* Premium Form */
.premium-form {
    padding: 2rem;
}

.filters-container {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    align-items: end;
}

.filters-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    margin-bottom: 1.5rem;
    align-items: end;
}

.filter-item {
    flex: 1;
    min-width: 200px;
}

.filter-item label {
    display: block;
    font-weight: 600;
    margin-bottom: 6px;
    color: var(--text-primary);
    font-size: 0.8rem;
}

.filter-item label i {
    margin-right: 6px;
    color: var(--primary-red);
    font-size: 0.75rem;
}

.input-group {
    position: relative;
    display: flex;
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
    border-color: var(--primary-red);
    box-shadow: 0 0 0 3px rgba(127, 29, 29, 0.1);
    outline: none;
}

.input-group-append {
    position: absolute;
    right: 0;
    top: 0;
    bottom: 0;
    display: flex;
    align-items: center;
}

.input-group-text {
    background: none;
    border: none;
    padding: 0 14px;
    color: var(--text-secondary);
    font-size: 0.8rem;
}

.filters-actions {
    display: flex;
    gap: 12px;
    align-items: end;
    margin-left: auto;
    flex-shrink: 0;
}

/* Premium Bulk Actions */
.premium-bulk-actions {
    display: flex;
    align-items: center;
    gap: 1rem;
    background: rgba(255, 255, 255, 0.1);
    padding: 1rem;
    border-radius: 12px;
    backdrop-filter: blur(10px);
}

.bulk-selection-info {
    color: white;
    font-weight: 600;
    font-size: 0.8rem;
}

.bulk-actions-content {
    display: flex;
    gap: 8px;
}

/* Premium Table */
.premium-table-container {
    padding: 0;
    border-radius: 0 0 20px 20px;
    overflow: hidden;
}

.premium-table {
    width: 100%;
    background: white;
    margin: 0;
    border-collapse: separate;
    border-spacing: 0;
}

.premium-table thead th {
    background: var(--gradient-secondary);
    color: white;
    padding: 0.75rem;
    font-weight: 600;
    font-size: 0.75rem;
    text-align: left;
    border: none;
    position: relative;
}

.premium-table thead th:first-child {
    border-radius: 0;
}

.premium-table thead th:last-child {
    border-radius: 0;
}

.premium-table thead th i {
    margin-right: 4px;
    opacity: 0.8;
    font-size: 0.7rem;
}

.sortable .sort-link {
    color: white;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.sortable .sort-link:hover {
    color: #FEE2E2;
}

.sort-icon {
    font-size: 0.7rem;
    opacity: 0.6;
    transition: all 0.3s ease;
}

.sort-icon.active {
    opacity: 1;
    color: var(--accent-red);
}

.table-row {
    background: white;
    transition: all 0.3s ease;
    border-bottom: 1px solid #F3F4F6;
}

.table-row:hover {
    background: linear-gradient(135deg, var(--light-red) 0%, #FEE2E2 100%);
    transform: scale(1.005);
    box-shadow: 0 4px 12px rgba(127, 29, 29, 0.1);
}

.premium-table tbody td {
    padding: 1rem 0.75rem;
    vertical-align: middle;
    border: none;
    font-size: 0.8rem;
}

/* Custom Checkbox */
.no-column {
    text-align: center;
    font-weight: 600;
    color: var(--text-secondary);
    font-size: 0.8rem;
    width: 60px;
}

.custom-checkbox {
    position: relative;
    display: inline-block;
}

.custom-checkbox input[type="checkbox"] {
    opacity: 0;
    position: absolute;
    width: 20px;
    height: 20px;
}

.custom-checkbox label {
    position: relative;
    display: inline-block;
    width: 20px;
    height: 20px;
    background: white;
    border: 2px solid #D1D5DB;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.custom-checkbox label::after {
    content: '';
    position: absolute;
    top: 2px;
    left: 6px;
    width: 6px;
    height: 10px;
    border: solid white;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
    opacity: 0;
    transition: all 0.3s ease;
}

.custom-checkbox input[type="checkbox"]:checked + label {
    background: var(--primary-red);
    border-color: var(--primary-red);
}

.custom-checkbox input[type="checkbox"]:checked + label::after {
    opacity: 1;
}

/* Job Title */
.premium-job-title h4 {
    margin: 0 0 6px 0;
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--text-primary);
    line-height: 1.3;
}

.job-summary {
    margin: 0 0 6px 0;
    font-size: 0.75rem;
    line-height: 1.4;
    color: var(--text-secondary);
}

.department-badge {
    display: inline-flex;
    align-items: center;
    gap: 3px;
    padding: 3px 6px;
    background: #F3F4F6;
    color: var(--text-secondary);
    border-radius: 5px;
    font-size: 0.7rem;
    font-weight: 500;
}

/* Location Info */
.location-info {
    display: flex;
    align-items: center;
    gap: 6px;
    color: var(--text-secondary);
    font-size: 0.8rem;
}

.location-info i {
    color: var(--primary-red);
    font-size: 0.75rem;
}

/* Premium Badges */
.badge {
    display: inline-flex;
    align-items: center;
    gap: 3px;
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 0.7rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.badge-employment.badge-primary {
    background: linear-gradient(135deg, #3B82F6 0%, #2563EB 100%);
    color: white;
}

.badge-employment.badge-info {
    background: linear-gradient(135deg, #06B6D4 0%, #0891B2 100%);
    color: white;
}

.badge-employment.badge-secondary {
    background: linear-gradient(135deg, #6B7280 0%, #4B5563 100%);
    color: white;
}

.badge-remote.badge-success {
    background: linear-gradient(135deg, #10B981 0%, #059669 100%);
    color: white;
}

.badge-remote.badge-warning {
    background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
    color: white;
}

.badge-remote.badge-secondary {
    background: linear-gradient(135deg, #6B7280 0%, #4B5563 100%);
    color: white;
}

/* Salary Display */
.salary-display {
    display: flex;
    align-items: center;
    gap: 6px;
    color: #047857;
    font-weight: 600;
    font-size: 0.8rem;
}

.salary-display i {
    color: #10B981;
    font-size: 0.75rem;
}

.no-salary {
    display: flex;
    align-items: center;
    gap: 4px;
    font-style: italic;
    font-size: 0.75rem;
    color: var(--text-muted);
}

/* Status Badges */
.status-badges {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.badge-status.badge-success {
    background: linear-gradient(135deg, #10B981 0%, #059669 100%);
    color: white;
}

.badge-status.badge-warning {
    background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
    color: white;
}

.badge-open.badge-success {
    background: linear-gradient(135deg, #22C55E 0%, #16A34A 100%);
    color: white;
    font-size: 0.7rem;
}

.badge-closed.badge-danger {
    background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);
    color: white;
    font-size: 0.7rem;
}

/* Date Info */
.date-info {
    display: flex;
    flex-direction: column;
    gap: 3px;
    font-size: 0.75rem;
}

.date-info i {
    color: var(--primary-red);
    margin-right: 4px;
    font-size: 0.7rem;
}

.date-info small {
    font-size: 0.7rem;
    color: var(--text-muted);
}

/* Premium Actions */
.premium-actions {
    display: flex;
    gap: 4px;
    flex-wrap: wrap;
}

.btn-action {
    width: 32px;
    height: 32px;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    font-size: 0.75rem;
}

.btn-action::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: all 0.3s ease;
}

.btn-action:hover::before {
    width: 30px;
    height: 30px;
}

.btn-view {
    background: linear-gradient(135deg, #3B82F6 0%, #2563EB 100%);
    color: white;
}

.btn-edit {
    background: linear-gradient(135deg, #6B7280 0%, #4B5563 100%);
    color: white;
}

.btn-toggle.btn-success {
    background: linear-gradient(135deg, #10B981 0%, #059669 100%);
    color: white;
}

.btn-toggle.btn-warning {
    background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
    color: white;
}

.btn-delete {
    background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);
    color: white;
}

.btn-action:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

/* Tooltip */
[data-tooltip] {
    position: relative;
}

[data-tooltip]:hover::after {
    content: attr(data-tooltip);
    position: absolute;
    bottom: 110%;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(0, 0, 0, 0.85);
    color: white;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 0.7rem;
    white-space: nowrap;
    z-index: 1000;
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

/* Premium Empty State */
.premium-empty-state {
    position: relative;
    text-align: center;
    padding: 4rem 2rem;
    background: white;
    border-radius: 0 0 20px 20px;
    overflow: hidden;
}

.empty-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    opacity: 0.05;
}

.empty-pattern {
    background-image: 
        radial-gradient(circle at 20% 80%, rgba(127, 29, 29, 0.3) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(127, 29, 29, 0.3) 0%, transparent 50%);
    background-size: 100px 100px;
    width: 100%;
    height: 100%;
}

.empty-content {
    position: relative;
    z-index: 2;
}

.empty-content .empty-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 1.5rem;
    background: var(--gradient-primary);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.empty-content .empty-icon i {
    font-size: 2rem;
    color: white;
}

.empty-content h3 {
    font-size: 1.25rem;
    color: var(--text-primary);
    margin-bottom: 1rem;
    font-weight: 600;
}

.empty-content p {
    color: var(--text-secondary);
    margin-bottom: 2rem;
    font-size: 0.9rem;
    line-height: 1.6;
}

/* Premium Pagination */
.premium-pagination {
    padding: 1.5rem 2rem;
    background: white;
    border-radius: 0 0 20px 20px;
    border-top: 1px solid #F3F4F6;
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
        font-size: 1.5rem;
    }
    
    .title-content .subtitle {
        font-size: 0.8rem;
    }
    
    .premium-stats {
        flex-direction: column;
        gap: 0.8rem;
    }
    
    .stat-card.glass-effect {
        max-width: 100%;
        min-width: auto;
    }
    
    .filters-container {
        flex-direction: column;
        align-items: stretch;
    }
    
    .filters-grid {
        flex-direction: column;
    }
    
    .filters-actions {
        margin-left: 0;
        justify-content: stretch;
    }
}

@media (max-width: 768px) {
    .filters-container {
        flex-direction: column;
    }
    
    .filters-grid {
        flex-direction: column;
        gap: 1rem;
    }
    
    .filter-item {
        min-width: auto;
    }
    
    .filters-actions {
        justify-content: stretch;
        margin-left: 0;
    }
    
    .filters-actions .btn {
        flex: 1;
    }
    
    .premium-table {
        font-size: 0.75rem;
    }
    
    .premium-table tbody td {
        padding: 0.75rem 0.4rem;
    }
    
    .premium-actions {
        flex-direction: column;
        gap: 4px;
    }
    
    .premium-bulk-actions {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }
    
    .bulk-actions-content {
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
        font-size: 1.4rem;
    }
    
    .title-content .subtitle {
        font-size: 0.75rem;
    }
    
    .premium-stats {
        flex-direction: column;
        gap: 0.8rem;
    }
    
    .stat-card.glass-effect {
        max-width: 100%;
        min-width: auto;
        padding: 1rem;
    }
    
    .premium-form {
        padding: 1.5rem;
    }
    
    .table-row:hover {
        transform: none;
    }
}

/* ===== SWEETALERT2 CUSTOM STYLES ===== */
.premium-swal {
    border-radius: 16px !important;
    border: 1px solid rgba(127, 29, 29, 0.1) !important;
    box-shadow: 0 20px 40px rgba(127, 29, 29, 0.15) !important;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif !important;
}

.premium-swal-title {
    color: var(--text-primary) !important;
    font-size: 1.25rem !important;
    font-weight: 700 !important;
    margin-bottom: 1rem !important;
}

.premium-swal-content {
    color: var(--text-secondary) !important;
    font-size: 0.9rem !important;
    line-height: 1.6 !important;
}

.premium-swal-confirm {
    background: linear-gradient(135deg, #dc2626, #b91c1c) !important;
    color: white !important;
    border: none !important;
    border-radius: 8px !important;
    padding: 10px 20px !important;
    font-size: 0.85rem !important;
    font-weight: 600 !important;
    transition: all 0.3s ease !important;
    box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3) !important;
}

.premium-swal-confirm:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 8px 20px rgba(220, 38, 38, 0.4) !important;
}

.premium-swal-cancel {
    background: linear-gradient(135deg, #6b7280, #4b5563) !important;
    color: white !important;
    border: none !important;
    border-radius: 8px !important;
    padding: 10px 20px !important;
    font-size: 0.85rem !important;
    font-weight: 600 !important;
    transition: all 0.3s ease !important;
    box-shadow: 0 4px 12px rgba(107, 114, 128, 0.3) !important;
}

.premium-swal-cancel:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 8px 20px rgba(107, 114, 128, 0.4) !important;
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ===== PREMIUM JOBS MANAGEMENT JAVASCRIPT ===== //
    
    // Initialize AOS animations
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        offset: 100
    });

    // Loading management
    function showLoading(text = 'Loading...') {
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

    // Stats counter animation
    function animateCounters() {
        const counters = document.querySelectorAll('.counter');
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            const increment = target / 200;
            let current = 0;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    counter.textContent = target.toLocaleString();
                    clearInterval(timer);
                } else {
                    counter.textContent = Math.ceil(current).toLocaleString();
                }
            }, 10);
        });
    }

    // Run counter animation on page load
    setTimeout(animateCounters, 500);

    // Status toggle functionality
    function toggleStatus(id, element) {
        showLoading('Updating status...');
        
        fetch(`/admin/jobs/${id}/toggle-status`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            hideLoading();
            if (data.success) {
                // Update UI based on new status
                const row = element.closest('tr');
                const statusCell = row.querySelector('.status-badges');
                const toggleBtn = element;
                
                if (data.status === 'active') {
                    statusCell.innerHTML = `
                        <span class="badge badge-status badge-success">
                            <i class="fas fa-check-circle"></i> Active
                        </span>
                    `;
                    toggleBtn.className = 'btn btn-action btn-toggle btn-warning';
                    toggleBtn.innerHTML = '<i class="fas fa-pause"></i>';
                    toggleBtn.setAttribute('data-tooltip', 'Deactivate Job');
                } else {
                    statusCell.innerHTML = `
                        <span class="badge badge-status badge-warning">
                            <i class="fas fa-pause-circle"></i> Inactive
                        </span>
                    `;
                    toggleBtn.className = 'btn btn-action btn-toggle btn-success';
                    toggleBtn.innerHTML = '<i class="fas fa-play"></i>';
                    toggleBtn.setAttribute('data-tooltip', 'Activate Job');
                }
                
                showAlert(data.message, 'success');
            } else {
                showAlert(data.message || 'Failed to update status', 'error');
            }
        })
        .catch(error => {
            hideLoading();
            console.error('Error:', error);
            showAlert('An error occurred while updating status', 'error');
        });
    }

    // Attach toggle status to buttons
    document.querySelectorAll('.toggle-status').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            toggleStatus(id, this);
        });
    });

    // Delete confirmation
    function confirmDelete(id, slug, title) {
        Swal.fire({
            title: '⚠️ Peringatan!',
            html: `
                <div style="text-align: left; margin: 20px 0;">
                    <p style="color: #374151; margin-bottom: 15px; font-size: 16px;">
                        Anda akan menghapus lowongan kerja:
                    </p>
                    <div style="background: linear-gradient(135deg, #fee2e2, #fef2f2); border: 2px solid #fca5a5; border-radius: 12px; padding: 15px; margin: 15px 0;">
                        <h4 style="color: #991b1b; margin: 0; font-size: 16px; font-weight: 700;">
                            "${title}"
                        </h4>
                        <p style="color: #7f1d1d; margin: 8px 0 0 0; font-size: 14px;">
                            ID: #${id}
                        </p>
                    </div>
                    <div style="background: #fef3c7; border: 1px solid #fbbf24; border-radius: 8px; padding: 12px; margin: 15px 0;">
                        <p style="color: #92400e; margin: 0; font-size: 14px; font-weight: 600;">
                            ⚠️ Aksi ini tidak dapat dibatalkan dan akan menghapus semua data terkait.
                        </p>
                    </div>
                </div>
            `,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#6b7280',
            confirmButtonText: '🗑️ Ya, Hapus Lowongan',
            cancelButtonText: '❌ Batal',
            customClass: {
                popup: 'swal2-popup premium-swal',
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
            width: 500,
            padding: '2rem'
        }).then((result) => {
            if (result.isConfirmed) {
                showLoading('Menghapus lowongan...');
                
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/jobs/${slug}`;
                form.innerHTML = `
                    <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]').getAttribute('content')}">
                    <input type="hidden" name="_method" value="DELETE">
                `;
                document.body.appendChild(form);
                form.submit();
            }
        });
    }

    // Attach delete confirmation to buttons
    document.querySelectorAll('.delete-job').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const id = this.getAttribute('data-id');
            const slug = this.getAttribute('data-slug');
            const title = this.getAttribute('data-title');
            confirmDelete(id, slug, title);
        });
    });

    // Enhanced form submissions
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function() {
            showLoading('Processing...');
        });
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

    // Enhanced search functionality
    const searchInput = document.querySelector('input[name="search"]');
    let searchTimeout;

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                // Auto-submit search after typing stops for 500ms
                if (this.value.length >= 3 || this.value.length === 0) {
                    this.closest('form').submit();
                }
            }, 500);
        });
    }

    // Enhanced tooltips
    function initializeTooltips() {
        const tooltipElements = document.querySelectorAll('[data-tooltip]');
        tooltipElements.forEach(element => {
            element.addEventListener('mouseenter', function() {
                const tooltip = this.getAttribute('data-tooltip');
                this.setAttribute('title', tooltip);
            });
        });
    }

    initializeTooltips();

    // Table row hover effects
    const tableRows = document.querySelectorAll('.table-row');
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.01)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
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

    // Hide loading on page load
    hideLoading();

    console.log('🎉 Premium Jobs Management System berhasil dimuat!');
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
@endsection
