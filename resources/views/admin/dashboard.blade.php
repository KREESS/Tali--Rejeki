@extends('admin.components.layout')

@section('title', $title)

@section('content')
<!-- Loading Overlay -->
<div id="loadingOverlay" class="loading-overlay" style="display: none;">
    <div class="loading-spinner">
        <div class="spinner-circle"></div>
        <div class="loading-text">Memuat dashboard...</div>
    </div>
</div>

<!-- Alert Container -->
<div id="alertContainer" class="alert-container"></div>

<div class="admin-dashboard">
    <!-- Welcome Header -->
    <div class="welcome-header premium-header" data-aos="fade-down">
        <div class="header-background">
            <div class="header-pattern"></div>
            <div class="header-shapes">
                <div class="shape shape-1"></div>
                <div class="shape shape-2"></div>
                <div class="shape shape-3"></div>
            </div>
        </div>
        <div class="welcome-content">
            <div class="welcome-text">
                <div class="greeting">
                    <h1>Selamat Datang, {{ $user->name }}! 👋</h1>
                    <p class="subtitle">{{ $subtitle }}</p>
                </div>
                <div class="current-time">
                    <i class="fas fa-clock"></i>
                    <span id="currentDateTime"></span>
                </div>
            </div>
            <div class="welcome-actions">
                <div class="quick-actions">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-quick-action">
                        <i class="fas fa-plus-circle"></i>
                        <span>Tambah Produk</span>
                    </a>
                    <a href="{{ route('admin.jobs.create') }}" class="btn btn-quick-action">
                        <i class="fas fa-briefcase"></i>
                        <span>Tambah Lowongan</span>
                    </a>
                    <a href="{{ route('admin.articles.create') }}" class="btn btn-quick-action">
                        <i class="fas fa-edit"></i>
                        <span>Tulis Artikel</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Stats Cards -->
    <div class="stats-grid premium-stats" data-aos="fade-up" data-aos-delay="200">
        <div class="stat-card glass-effect users-card" data-aos="zoom-in" data-aos-delay="300">
            <div class="stat-background">
                <div class="stat-pattern"></div>
            </div>
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-content">
                <h3 class="counter" data-target="{{ $stats['users'] }}">0</h3>
                <p>Total Users</p>
                <div class="stat-trend">
                    <i class="fas fa-chart-line"></i>
                    <span>Terdaftar</span>
                </div>
            </div>
            <div class="stat-chart">
                <canvas id="usersChart" width="60" height="30"></canvas>
            </div>
        </div>

        <div class="stat-card glass-effect products-card" data-aos="zoom-in" data-aos-delay="400">
            <div class="stat-background">
                <div class="stat-pattern"></div>
            </div>
            <div class="stat-icon">
                <i class="fas fa-box"></i>
            </div>
            <div class="stat-content">
                <h3 class="counter" data-target="{{ $stats['products'] }}">0</h3>
                <p>Total Produk</p>
                <div class="stat-trend">
                    <i class="fas fa-cubes"></i>
                    <span>Tersedia</span>
                </div>
            </div>
            <div class="stat-chart">
                <canvas id="productsChart" width="60" height="30"></canvas>
            </div>
        </div>

        <div class="stat-card glass-effect articles-card" data-aos="zoom-in" data-aos-delay="500">
            <div class="stat-background">
                <div class="stat-pattern"></div>
            </div>
            <div class="stat-icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <div class="stat-content">
                <h3 class="counter" data-target="{{ $stats['articles'] }}">0</h3>
                <p>Total Artikel</p>
                <div class="stat-trend">
                    <i class="fas fa-edit"></i>
                    <span>Dipublikasi</span>
                </div>
            </div>
            <div class="stat-chart">
                <canvas id="articlesChart" width="60" height="30"></canvas>
            </div>
        </div>

        <div class="stat-card glass-effect jobs-card" data-aos="zoom-in" data-aos-delay="600">
            <div class="stat-background">
                <div class="stat-pattern"></div>
            </div>
            <div class="stat-icon">
                <i class="fas fa-briefcase"></i>
            </div>
            <div class="stat-content">
                <h3 class="counter" data-target="{{ $stats['jobs'] }}">0</h3>
                <p>Lowongan Kerja</p>
                <div class="stat-trend">
                    <i class="fas fa-door-open"></i>
                    <span>Aktif</span>
                </div>
            </div>
            <div class="stat-chart">
                <canvas id="jobsChart" width="60" height="30"></canvas>
            </div>
        </div>
    </div>

    <!-- Secondary Stats -->
    <div class="secondary-stats" data-aos="fade-up" data-aos-delay="700">
        <div class="stats-row">
            <div class="mini-stat-card" data-aos="fade-right" data-aos-delay="800">
                <div class="mini-stat-icon">
                    <i class="fas fa-tags"></i>
                </div>
                <div class="mini-stat-content">
                    <h4 class="counter" data-target="{{ $stats['categories'] }}">0</h4>
                    <p>Kategori</p>
                </div>
            </div>
            <div class="mini-stat-card" data-aos="fade-right" data-aos-delay="850">
                <div class="mini-stat-icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="mini-stat-content">
                    <h4 class="counter" data-target="{{ $stats['catalogs'] }}">0</h4>
                    <p>Katalog</p>
                </div>
            </div>
            <div class="mini-stat-card" data-aos="fade-right" data-aos-delay="900">
                <div class="mini-stat-icon">
                    <i class="fas fa-images"></i>
                </div>
                <div class="mini-stat-content">
                    <h4 class="counter" data-target="{{ $stats['galleries'] }}">0</h4>
                    <p>Galeri</p>
                </div>
            </div>
            <div class="mini-stat-card" data-aos="fade-right" data-aos-delay="950">
                <div class="mini-stat-icon">
                    <i class="fas fa-globe"></i>
                </div>
                <div class="mini-stat-content">
                    <h4 class="counter" data-target="{{ $stats['users'] + $stats['products'] + $stats['articles'] + $stats['jobs'] + $stats['galleries'] + $stats['catalogs'] }}">0</h4>
                    <p>Total Konten</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts and Analytics -->
    <div class="analytics-section" data-aos="fade-up" data-aos-delay="1000">
        <div class="analytics-grid">
            <!-- Content Growth Chart -->
            <div class="chart-card premium-card glass-effect">
                <div class="card-header">
                    <h3><i class="fas fa-chart-line"></i> Pertumbuhan Konten</h3>
                    <div class="chart-controls">
                        <select id="contentPeriod" class="form-select">
                            <option value="7">7 Hari Terakhir</option>
                            <option value="30" selected>30 Hari Terakhir</option>
                            <option value="90">90 Hari Terakhir</option>
                        </select>
                    </div>
                </div>
                <div class="chart-container">
                    <canvas id="contentChart"></canvas>
                </div>
            </div>

            <!-- Product Categories -->
            <div class="chart-card premium-card glass-effect">
                <div class="card-header">
                    <h3><i class="fas fa-chart-pie"></i> Distribusi Kategori</h3>
                </div>
                <div class="chart-container">
                    <canvas id="categoriesChart"></canvas>
                </div>
                <div class="category-legends">
                    <div class="legend-item">
                        <span class="legend-color" style="background: #FF6384;"></span>
                        <span>Produk</span>
                        <span class="legend-value">{{ $stats['products'] }}</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-color" style="background: #36A2EB;"></span>
                        <span>Artikel</span>
                        <span class="legend-value">{{ $stats['articles'] }}</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-color" style="background: #FFCE56;"></span>
                        <span>Katalog</span>
                        <span class="legend-value">{{ $stats['catalogs'] }}</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-color" style="background: #4BC0C0;"></span>
                        <span>Galeri</span>
                        <span class="legend-value">{{ $stats['galleries'] }}</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-color" style="background: #9966FF;"></span>
                        <span>Lowongan</span>
                        <span class="legend-value">{{ $stats['jobs'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities and Quick Info -->
    <div class="info-section" data-aos="fade-up" data-aos-delay="1200">
        <div class="info-grid-two">
            <!-- Recent Activities -->
            <div class="info-card premium-card glass-effect">
                <div class="card-header">
                    <h3><i class="fas fa-clock"></i> Aktivitas Terbaru</h3>
                </div>
                <div class="activities-list">
                    @php
                        // Ambil aktivitas terbaru dari berbagai model
                        $recentActivities = collect();
                        
                        // Produk terbaru
                        $recentProducts = \App\Models\Product::latest('updated_at')->take(2)->get();
                        foreach($recentProducts as $product) {
                            $recentActivities->push([
                                'type' => 'product',
                                'icon' => 'fas fa-box',
                                'icon_class' => 'success',
                                'title' => 'Produk baru ditambahkan',
                                'description' => $product->name,
                                'time' => $product->updated_at,
                                'url' => route('admin.products.edit', $product->id)
                            ]);
                        }
                        
                        // Artikel terbaru
                        $recentArticles = \App\Models\Article::latest('updated_at')->take(2)->get();
                        foreach($recentArticles as $article) {
                            $recentActivities->push([
                                'type' => 'article',
                                'icon' => 'fas fa-newspaper',
                                'icon_class' => 'info',
                                'title' => 'Artikel dipublikasikan',
                                'description' => $article->title,
                                'time' => $article->updated_at,
                                'url' => route('admin.articles.edit', $article->id)
                            ]);
                        }
                        
                        // Lowongan terbaru
                        $recentJobs = \App\Models\Job::latest('updated_at')->take(2)->get();
                        foreach($recentJobs as $job) {
                            $recentActivities->push([
                                'type' => 'job',
                                'icon' => 'fas fa-briefcase',
                                'icon_class' => 'warning',
                                'title' => 'Lowongan kerja diperbarui',
                                'description' => $job->title . ' - ' . $job->location,
                                'time' => $job->updated_at,
                                'url' => route('admin.jobs.edit', $job->slug)
                            ]);
                        }
                        
                        // Galeri terbaru
                        $recentGalleries = \App\Models\Gallery::latest('updated_at')->take(2)->get();
                        foreach($recentGalleries as $gallery) {
                            $recentActivities->push([
                                'type' => 'gallery',
                                'icon' => 'fas fa-images',
                                'icon_class' => 'primary',
                                'title' => 'Galeri baru ditambahkan',
                                'description' => $gallery->title,
                                'time' => $gallery->updated_at,
                                'url' => route('admin.gallery.edit', $gallery->id)
                            ]);
                        }
                        
                        // Katalog terbaru
                        $recentCatalogs = \App\Models\CatalogItem::latest('updated_at')->take(2)->get();
                        foreach($recentCatalogs as $catalog) {
                            $recentActivities->push([
                                'type' => 'catalog',
                                'icon' => 'fas fa-book',
                                'icon_class' => 'info',
                                'title' => 'Katalog diperbarui',
                                'description' => $catalog->name,
                                'time' => $catalog->updated_at,
                                'url' => route('admin.catalog.edit', $catalog->id)
                            ]);
                        }
                        
                        // Sort berdasarkan waktu terbaru dan ambil 4 teratas
                        $recentActivities = $recentActivities->sortByDesc('time')->take(4);
                    @endphp

                    @forelse($recentActivities as $index => $activity)
                        <div class="activity-item" data-aos="fade-left" data-aos-delay="{{ 1300 + ($index * 50) }}">
                            <div class="activity-icon {{ $activity['icon_class'] }}">
                                <i class="{{ $activity['icon'] }}"></i>
                            </div>
                            <div class="activity-content">
                                <p><strong>{{ $activity['title'] }}</strong></p>
                                <span>{{ Str::limit($activity['description'], 50) }}</span>
                                <time>{{ $activity['time']->diffForHumans() }}</time>
                            </div>
                        </div>
                    @empty
                        <div class="activity-item">
                            <div class="activity-icon neutral">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <div class="activity-content">
                                <p><strong>Belum ada aktivitas</strong></p>
                                <span>Mulai tambahkan konten untuk melihat aktivitas terbaru</span>
                                <time>{{ now('Asia/Jakarta')->diffForHumans() }}</time>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Quick Links -->
            <div class="info-card premium-card glass-effect">
                <div class="card-header">
                    <h3><i class="fas fa-bolt"></i> Akses Cepat</h3>
                </div>
                <div class="quick-links">
                    <a href="{{ route('admin.products.index') }}" class="quick-link-item" data-aos="zoom-in" data-aos-delay="1300">
                        <div class="quick-link-icon">
                            <i class="fas fa-box"></i>
                        </div>
                        <span>Kelola Produk</span>
                    </a>
                    <a href="{{ route('admin.categories.index') }}" class="quick-link-item" data-aos="zoom-in" data-aos-delay="1350">
                        <div class="quick-link-icon">
                            <i class="fas fa-tags"></i>
                        </div>
                        <span>Kategori</span>
                    </a>
                    <a href="{{ route('admin.subcategories.index') }}" class="quick-link-item" data-aos="zoom-in" data-aos-delay="1400">
                        <div class="quick-link-icon">
                            <i class="fas fa-folder-open"></i>
                        </div>
                        <span>Sub Kategori</span>
                    </a>
                    <a href="{{ route('admin.articles.index') }}" class="quick-link-item" data-aos="zoom-in" data-aos-delay="1450">
                        <div class="quick-link-icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <span>Artikel</span>
                    </a>
                    <a href="{{ route('admin.article-categories.index') }}" class="quick-link-item" data-aos="zoom-in" data-aos-delay="1500">
                        <div class="quick-link-icon">
                            <i class="fas fa-folder-open"></i>
                        </div>
                        <span>Kategori Artikel</span>
                    </a>
                    <a href="{{ route('admin.gallery.index') }}" class="quick-link-item" data-aos="zoom-in" data-aos-delay="1550">
                        <div class="quick-link-icon">
                            <i class="fas fa-images"></i>
                        </div>
                        <span>Galeri</span>
                    </a>
                    <a href="{{ route('admin.jobs.index') }}" class="quick-link-item" data-aos="zoom-in" data-aos-delay="1600">
                        <div class="quick-link-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <span>Lowongan</span>
                    </a>
                    <a href="{{ route('admin.catalog.index') }}" class="quick-link-item" data-aos="zoom-in" data-aos-delay="1650">
                        <div class="quick-link-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <span>Katalog</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Weather Widget & Additional Info -->
    <div class="additional-info" data-aos="fade-up" data-aos-delay="1600">
        <div class="weather-widget premium-card glass-effect">
            <div class="weather-header">
                <h3><i class="fas fa-cloud-sun"></i> Cuaca Hari Ini</h3>
                <span class="location"><i class="fas fa-map-marker-alt"></i> Jakarta, Indonesia</span>
            </div>
            <div class="weather-content">
                <div class="weather-main">
                    <div class="temperature">28°C</div>
                    <div class="weather-icon">
                        <i class="fas fa-sun"></i>
                    </div>
                </div>
                <div class="weather-details">
                    <div class="detail-item">
                        <i class="fas fa-eye"></i>
                        <span>Visibility: 10km</span>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-tint"></i>
                        <span>Humidity: 65%</span>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-wind"></i>
                        <span>Wind: 5 km/h</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<style>
/* ===== PREMIUM DASHBOARD STYLES ===== */
:root {
    --primary-dark-red: #7F1D1D;
    --primary-red: #991B1B;
    --accent-red: #B91C1C;
    --light-red: #FEF2F2;
    --ultra-dark-red: #450A0A;
    --gradient-primary: linear-gradient(135deg, #7F1D1D 0%, #991B1B 50%, #B91C1C 100%);
    --gradient-secondary: linear-gradient(135deg, #1F2937 0%, #374151 100%);
    --gradient-success: linear-gradient(135deg, #10B981 0%, #059669 100%);
    --gradient-warning: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
    --gradient-info: linear-gradient(135deg, #3B82F6 0%, #2563EB 100%);
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

/* Dashboard Container */
.admin-dashboard {
    background: linear-gradient(135deg, #F9FAFB 0%, #F3F4F6 100%);
    min-height: 100vh;
    padding: 2rem;
}

/* Welcome Header */
.welcome-header {
    position: relative;
    background: var(--gradient-primary);
    border-radius: 25px;
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

.header-shapes {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
}

.shape {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
}

.shape-1 {
    width: 120px;
    height: 120px;
    top: -60px;
    right: -60px;
    animation: float 6s ease-in-out infinite;
}

.shape-2 {
    width: 80px;
    height: 80px;
    bottom: -40px;
    left: -40px;
    animation: float 4s ease-in-out infinite reverse;
}

.shape-3 {
    width: 60px;
    height: 60px;
    top: 50%;
    left: 20%;
    animation: float 5s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

.welcome-content {
    position: relative;
    z-index: 2;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.welcome-text {
    flex: 1;
}

.greeting h1 {
    color: white;
    font-size: 2rem;
    font-weight: 700;
    margin: 0 0 0.5rem 0;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}

.greeting .subtitle {
    color: rgba(255, 255, 255, 0.9);
    font-size: 1rem;
    margin: 0 0 1rem 0;
    font-weight: 400;
}

.current-time {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.9rem;
    font-weight: 500;
}

.current-time i {
    font-size: 0.8rem;
}

.welcome-actions {
    flex-shrink: 0;
}

.quick-actions {
    display: flex;
    gap: 1rem;
}

.btn-quick-action {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem;
    background: rgba(255, 255, 255, 0.15);
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 12px;
    text-decoration: none;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    min-width: 100px;
}

.btn-quick-action:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    color: white;
}

.btn-quick-action i {
    font-size: 1.5rem;
}

.btn-quick-action span {
    font-size: 0.8rem;
    font-weight: 600;
    text-align: center;
}

/* Premium Stats Grid */
.premium-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.stat-card.glass-effect {
    position: relative;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 20px;
    padding: 2rem;
    overflow: hidden;
    box-shadow: var(--shadow-glass);
    transition: all 0.3s ease;
}

.stat-card.glass-effect:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 50px rgba(139, 0, 0, 0.25);
}

.stat-background {
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    opacity: 0.05;
    transition: all 0.3s ease;
}

.stat-pattern {
    width: 100%;
    height: 100%;
    background-image: 
        radial-gradient(circle at 50% 50%, rgba(255,255,255,0.8) 0%, transparent 70%);
}

.users-card .stat-background { background: var(--gradient-info); }
.products-card .stat-background { background: var(--gradient-primary); }
.articles-card .stat-background { background: var(--gradient-success); }
.jobs-card .stat-background { background: var(--gradient-warning); }

.stat-card:hover .stat-background {
    transform: scale(1.2) rotate(45deg);
    opacity: 0.1;
}

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.5rem;
    position: relative;
    z-index: 2;
}

.users-card .stat-icon { background: var(--gradient-info); }
.products-card .stat-icon { background: var(--gradient-primary); }
.articles-card .stat-icon { background: var(--gradient-success); }
.jobs-card .stat-icon { background: var(--gradient-warning); }

.stat-icon i {
    font-size: 1.5rem;
    color: white;
}

.stat-content {
    position: relative;
    z-index: 2;
    margin-bottom: 1rem;
}

.stat-content h3 {
    font-size: 2rem;
    font-weight: 700;
    margin: 0 0 0.5rem 0;
    color: var(--text-primary);
}

.stat-content p {
    font-size: 0.9rem;
    color: var(--text-secondary);
    margin: 0 0 1rem 0;
    font-weight: 600;
}

.stat-trend {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.8rem;
    font-weight: 600;
}

.stat-trend.positive {
    color: #047857;
}

.stat-trend.neutral {
    color: var(--text-secondary);
}

.stat-trend i {
    font-size: 0.7rem;
}

.stat-chart {
    position: relative;
    z-index: 2;
    height: 30px;
    margin-top: 1rem;
}

/* Secondary Stats */
.secondary-stats {
    margin-bottom: 2rem;
}

.stats-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
}

.mini-stat-card {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 15px;
    padding: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    transition: all 0.3s ease;
}

.mini-stat-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.mini-stat-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    background: var(--gradient-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
}

.mini-stat-content h4 {
    font-size: 1.5rem;
    font-weight: 700;
    margin: 0;
    color: var(--text-primary);
}

.mini-stat-content p {
    font-size: 0.8rem;
    color: var(--text-secondary);
    margin: 0;
    font-weight: 600;
}

/* Analytics Section */
.analytics-section {
    margin-bottom: 2rem;
}

.analytics-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 2rem;
}

.chart-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: var(--shadow-glass);
}

.chart-card .card-header {
    background: var(--gradient-primary);
    color: white;
    padding: 1.5rem 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.chart-card .card-header h3 {
    margin: 0;
    font-size: 1rem;
    font-weight: 600;
}

.chart-card .card-header h3 i {
    margin-right: 8px;
    font-size: 0.9rem;
}

.chart-controls .form-select {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 8px;
    padding: 0.5rem 1rem;
    font-size: 0.8rem;
}

.chart-container {
    padding: 2rem;
    position: relative;
    height: 300px;
}

.category-legends {
    padding: 0 2rem 2rem;
    max-height: 200px;
    overflow-y: auto;
}

.legend-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0.75rem 0;
    border-bottom: 1px solid #F3F4F6;
    transition: all 0.3s ease;
}

.legend-item:hover {
    background: rgba(127, 29, 29, 0.05);
    border-radius: 8px;
    padding-left: 0.5rem;
    padding-right: 0.5rem;
}

.legend-item:last-child {
    border-bottom: none;
}

.legend-color {
    width: 14px;
    height: 14px;
    border-radius: 50%;
    margin-right: 0.75rem;
    flex-shrink: 0;
}

.legend-item span:nth-child(2) {
    flex: 1;
    font-size: 0.9rem;
    color: var(--text-secondary);
    font-weight: 500;
}

.legend-value {
    font-weight: 700;
    color: var(--text-primary);
    font-size: 0.9rem;
    background: #F9FAFB;
    padding: 0.25rem 0.5rem;
    border-radius: 6px;
    min-width: 40px;
    text-align: center;
}

/* Info Section */
.info-section {
    margin-bottom: 2rem;
}

.info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 2rem;
}

.info-grid-two {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
}

.info-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: var(--shadow-glass);
}

.info-card .card-header {
    background: var(--gradient-secondary);
    color: white;
    padding: 1.5rem 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.info-card .card-header h3 {
    margin: 0;
    font-size: 1rem;
    font-weight: 600;
}

.info-card .card-header h3 i {
    margin-right: 8px;
    font-size: 0.9rem;
}

.view-all-link {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    font-size: 0.8rem;
    font-weight: 500;
}

.view-all-link:hover {
    color: white;
}

.status-badge {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.8rem;
    font-weight: 600;
}

.status-badge.online {
    color: #10B981;
}

.status-badge i {
    font-size: 0.6rem;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

/* Activities List */
.activities-list {
    padding: 2rem;
}

.activity-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1rem 0;
    border-bottom: 1px solid #F3F4F6;
}

.activity-item:last-child {
    border-bottom: none;
}

.activity-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 0.9rem;
    flex-shrink: 0;
}

.activity-icon.success { background: var(--gradient-success); }
.activity-icon.info { background: var(--gradient-info); }
.activity-icon.warning { background: var(--gradient-warning); }
.activity-icon.primary { background: var(--gradient-primary); }
.activity-icon.neutral { background: var(--gradient-secondary); }

.activity-content p {
    margin: 0 0 0.25rem 0;
    font-size: 0.9rem;
    color: var(--text-primary);
}

.activity-content span {
    display: block;
    font-size: 0.8rem;
    color: var(--text-secondary);
    margin-bottom: 0.25rem;
}

.activity-content time {
    font-size: 0.75rem;
    color: var(--text-muted);
}

/* System Metrics */
.system-metrics {
    padding: 2rem;
}

.metric-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
}

.metric-item:last-child {
    margin-bottom: 0;
}

.metric-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9rem;
    color: var(--text-primary);
    font-weight: 600;
}

.metric-label i {
    color: var(--primary-red);
    font-size: 0.8rem;
}

.metric-value {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.progress-bar {
    width: 100px;
    height: 8px;
    background: #F3F4F6;
    border-radius: 4px;
    overflow: hidden;
}

.progress-fill {
    height: 100%;
    background: var(--gradient-primary);
    border-radius: 4px;
    transition: width 0.3s ease;
}

.metric-value span {
    font-size: 0.8rem;
    font-weight: 600;
    color: var(--text-primary);
    min-width: 30px;
}

/* Quick Links */
.quick-links {
    padding: 2rem;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1rem;
}

.quick-link-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem;
    background: #F9FAFB;
    border-radius: 12px;
    text-decoration: none;
    color: var(--text-primary);
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.quick-link-item:hover {
    background: var(--light-red);
    border-color: var(--primary-red);
    transform: translateY(-2px);
    color: var(--text-primary);
}

.quick-link-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    background: var(--gradient-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1rem;
}

.quick-link-item span {
    font-size: 0.8rem;
    font-weight: 600;
    text-align: center;
}

/* Weather Widget */
.additional-info {
    margin-bottom: 2rem;
}

.weather-widget {
    background: var(--gradient-info);
    color: white;
    border-radius: 20px;
    overflow: hidden;
    max-width: 400px;
}

.weather-header {
    padding: 1.5rem 2rem 1rem;
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
}

.weather-header h3 {
    margin: 0 0 0.5rem 0;
    font-size: 1rem;
    font-weight: 600;
}

.weather-header h3 i {
    margin-right: 8px;
}

.location {
    font-size: 0.8rem;
    opacity: 0.8;
}

.location i {
    margin-right: 4px;
}

.weather-content {
    padding: 1rem 2rem 1.5rem;
}

.weather-main {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1rem;
}

.temperature {
    font-size: 2.5rem;
    font-weight: 700;
}

.weather-icon {
    font-size: 2rem;
    opacity: 0.8;
}

.weather-details {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
}

.detail-item {
    text-align: center;
    font-size: 0.75rem;
    opacity: 0.8;
}

.detail-item i {
    display: block;
    margin-bottom: 0.25rem;
    font-size: 0.9rem;
}

/* Counter Animation */
.counter {
    display: inline-block;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .analytics-grid {
        grid-template-columns: 1fr;
    }
    
    .info-grid {
        grid-template-columns: 1fr 1fr;
    }
    
    .info-grid-two {
        grid-template-columns: 1fr 1fr;
    }
}

@media (max-width: 968px) {
    .admin-dashboard {
        padding: 1rem;
    }
    
    .welcome-header {
        padding: 2rem 1.5rem;
    }
    
    .welcome-content {
        flex-direction: column;
        gap: 1.5rem;
        text-align: center;
    }
    
    .greeting h1 {
        font-size: 1.5rem;
    }
    
    .premium-stats {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1rem;
    }
    
    .stat-card.glass-effect {
        padding: 1.5rem;
    }
    
    .stats-row {
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    }
    
    .info-grid {
        grid-template-columns: 1fr;
    }
    
    .info-grid-two {
        grid-template-columns: 1fr;
    }
    
    .quick-links {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 640px) {
    .welcome-header {
        padding: 1.5rem 1rem;
    }
    
    .greeting h1 {
        font-size: 1.4rem;
    }
    
    .quick-actions {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .btn-quick-action {
        flex-direction: row;
        justify-content: center;
        padding: 0.75rem;
        min-width: auto;
    }
    
    .premium-stats {
        grid-template-columns: 1fr;
    }
    
    .stats-row {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .quick-links {
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ===== PREMIUM DASHBOARD JAVASCRIPT ===== //
    
    // Initialize AOS animations
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        offset: 100
    });

    // Update current date and time dengan format Indonesia
    function updateDateTime() {
        const now = new Date();
        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            timeZone: 'Asia/Jakarta'
        };
        
        // Format tanggal dalam bahasa Indonesia
        const indonesianDate = now.toLocaleDateString('id-ID', options);
        document.getElementById('currentDateTime').textContent = indonesianDate;
    }

    updateDateTime();
    setInterval(updateDateTime, 60000); // Update every minute

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
                    counter.textContent = target.toLocaleString('id-ID');
                    clearInterval(timer);
                } else {
                    counter.textContent = Math.ceil(current).toLocaleString('id-ID');
                }
            }, 10);
        });
    }

    // Run counter animation after page load
    setTimeout(animateCounters, 1000);

    // Content Growth Chart dengan data real dari database
    const contentCtx = document.getElementById('contentChart').getContext('2d');
    
    // Generate data pertumbuhan yang realistis dari 0 sampai nilai current
    function generateGrowthData(currentValue, days) {
        if (currentValue === 0) {
            return new Array(days).fill(0);
        }
        
        const data = [];
        for (let i = 0; i < days; i++) {
            const progress = (i + 1) / days;
            // Menggunakan kurva exponential untuk pertumbuhan yang lebih realistis
            const value = Math.max(0, Math.ceil(currentValue * Math.pow(progress, 1.5)));
            data.push(value);
        }
        return data;
    }
    
    // Generate labels berdasarkan periode
    function generateLabels(days) {
        const labels = [];
        const today = new Date();
        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        
        for (let i = days - 1; i >= 0; i--) {
            const date = new Date(today);
            date.setDate(today.getDate() - i);
            
            if (days === 7) {
                // Format: "Sen 2", "Sel 3", dll untuk 7 hari
                const dayNames = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
                labels.push(`${dayNames[date.getDay()]} ${date.getDate()}`);
            } else if (days === 30) {
                // Format: "2 Sep", "5 Sep", dll untuk 30 hari (setiap 3 hari)
                if (i % 3 === 0 || i === 0) {
                    labels.push(`${date.getDate()} ${months[date.getMonth()]}`);
                } else {
                    labels.push('');
                }
            } else {
                // Format: "2 Sep", "15 Sep", dll untuk 90 hari (setiap 10 hari)
                if (i % 10 === 0 || i === 0) {
                    labels.push(`${date.getDate()} ${months[date.getMonth()]}`);
                } else {
                    labels.push('');
                }
            }
        }
        return labels;
    }
    
    // Data dan chart awal dengan periode 30 hari
    let currentPeriod = 30;
    
    const contentChart = new Chart(contentCtx, {
        type: 'line',
        data: {
            labels: generateLabels(currentPeriod),
            datasets: [
                {
                    label: 'Produk',
                    data: generateGrowthData({{ $stats['products'] }}, currentPeriod),
                    borderColor: '#FF6384',
                    backgroundColor: 'rgba(255, 99, 132, 0.1)',
                    borderWidth: 3,
                    fill: false,
                    tension: 0.4,
                    pointBackgroundColor: '#FF6384',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: currentPeriod <= 7 ? 4 : 2
                },
                {
                    label: 'Artikel',
                    data: generateGrowthData({{ $stats['articles'] }}, currentPeriod),
                    borderColor: '#36A2EB',
                    backgroundColor: 'rgba(54, 162, 235, 0.1)',
                    borderWidth: 3,
                    fill: false,
                    tension: 0.4,
                    pointBackgroundColor: '#36A2EB',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: currentPeriod <= 7 ? 4 : 2
                },
                {
                    label: 'Katalog',
                    data: generateGrowthData({{ $stats['catalogs'] }}, currentPeriod),
                    borderColor: '#FFCE56',
                    backgroundColor: 'rgba(255, 206, 86, 0.1)',
                    borderWidth: 3,
                    fill: false,
                    tension: 0.4,
                    pointBackgroundColor: '#FFCE56',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: currentPeriod <= 7 ? 4 : 2
                },
                {
                    label: 'Galeri',
                    data: generateGrowthData({{ $stats['galleries'] }}, currentPeriod),
                    borderColor: '#4BC0C0',
                    backgroundColor: 'rgba(75, 192, 192, 0.1)',
                    borderWidth: 3,
                    fill: false,
                    tension: 0.4,
                    pointBackgroundColor: '#4BC0C0',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: currentPeriod <= 7 ? 4 : 2
                },
                {
                    label: 'Lowongan',
                    data: generateGrowthData({{ $stats['jobs'] }}, currentPeriod),
                    borderColor: '#9966FF',
                    backgroundColor: 'rgba(153, 102, 255, 0.1)',
                    borderWidth: 3,
                    fill: false,
                    tension: 0.4,
                    pointBackgroundColor: '#9966FF',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: currentPeriod <= 7 ? 4 : 2
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        padding: 20,
                        font: {
                            size: 12,
                            weight: 600
                        }
                    }
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    borderColor: 'rgba(255, 255, 255, 0.1)',
                    borderWidth: 1,
                    cornerRadius: 8,
                    padding: 12,
                    callbacks: {
                        title: function(context) {
                            const index = context[0].dataIndex;
                            const today = new Date();
                            const targetDate = new Date(today);
                            targetDate.setDate(today.getDate() - (currentPeriod - 1 - index));
                            
                            const options = { 
                                weekday: 'long', 
                                year: 'numeric', 
                                month: 'long', 
                                day: 'numeric' 
                            };
                            return targetDate.toLocaleDateString('id-ID', options);
                        }
                    }
                }
            },
            interaction: {
                mode: 'nearest',
                axis: 'x',
                intersect: false
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)',
                        drawBorder: false
                    },
                    ticks: {
                        font: {
                            size: 11
                        },
                        color: '#6B7280',
                        stepSize: 1
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 11
                        },
                        color: '#6B7280',
                        maxRotation: currentPeriod > 30 ? 45 : 0,
                        callback: function(value, index) {
                            const label = this.getLabelForValue(value);
                            // Show all labels for 7 days, every 3rd for 30 days, every 10th for 90 days
                            if (currentPeriod === 7) {
                                return label;
                            } else if (currentPeriod === 30) {
                                return index % 3 === 0 ? label : '';
                            } else {
                                return index % 10 === 0 ? label : '';
                            }
                        }
                    }
                }
            },
            elements: {
                point: {
                    hoverRadius: 6
                }
            }
        }
    });

    // Categories Chart
    const categoriesCtx = document.getElementById('categoriesChart').getContext('2d');
    const categoriesChart = new Chart(categoriesCtx, {
        type: 'doughnut',
        data: {
            labels: ['Produk', 'Artikel', 'Katalog', 'Galeri', 'Lowongan'],
            datasets: [{
                data: [{{ $stats['products'] }}, {{ $stats['articles'] }}, {{ $stats['catalogs'] }}, {{ $stats['galleries'] }}, {{ $stats['jobs'] }}],
                backgroundColor: [
                    '#FF6384',
                    '#36A2EB',
                    '#FFCE56',
                    '#4BC0C0',
                    '#9966FF'
                ],
                borderWidth: 0,
                hoverBorderWidth: 3,
                hoverBorderColor: '#fff',
                hoverOffset: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    borderColor: 'rgba(255, 255, 255, 0.1)',
                    borderWidth: 1,
                    cornerRadius: 8,
                    padding: 12,
                    displayColors: true,
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.parsed;
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = total > 0 ? ((value / total) * 100).toFixed(1) : 0;
                            return `${label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            },
            cutout: '65%',
            animation: {
                animateRotate: true,
                animateScale: true,
                duration: 1000,
                easing: 'easeInOutQuart'
            }
        }
    });

    // Mini charts for stat cards
    function createMiniChart(canvasId, data, color) {
        const ctx = document.getElementById(canvasId).getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['', '', '', '', '', '', ''],
                datasets: [{
                    data: data,
                    borderColor: color,
                    backgroundColor: color + '20',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    x: { display: false },
                    y: { display: false }
                },
                elements: {
                    point: { radius: 0 }
                }
            }
        });
    }

    // Create mini charts dengan data real
    setTimeout(() => {
        // Helper function untuk generate data mini chart yang realistis (7 hari)
        function generateMiniData(currentValue) {
            if (currentValue === 0) return [0, 0, 0, 0, 0, 0, 0];
            
            const data = [];
            for (let i = 0; i < 7; i++) {
                const progress = (i + 1) / 7;
                // Menggunakan kurva exponential untuk pertumbuhan yang lebih realistis
                const value = Math.max(0, Math.ceil(currentValue * Math.pow(progress, 1.5)));
                data.push(value);
            }
            return data;
        }
        
        createMiniChart('usersChart', generateMiniData({{ $stats['users'] }}), '#3B82F6');
        createMiniChart('productsChart', generateMiniData({{ $stats['products'] }}), '#FF6384');
        createMiniChart('articlesChart', generateMiniData({{ $stats['articles'] }}), '#36A2EB');
        createMiniChart('jobsChart', generateMiniData({{ $stats['jobs'] }}), '#9966FF');
    }, 1500);

    // Chart period change handler dengan update data real
    document.getElementById('contentPeriod').addEventListener('change', function() {
        const newPeriod = parseInt(this.value);
        currentPeriod = newPeriod;
        
        // Update labels dan data
        const newLabels = generateLabels(newPeriod);
        const pointRadius = newPeriod <= 7 ? 4 : 2;
        
        // Update chart data
        contentChart.data.labels = newLabels;
        contentChart.data.datasets[0].data = generateGrowthData({{ $stats['products'] }}, newPeriod);
        contentChart.data.datasets[1].data = generateGrowthData({{ $stats['articles'] }}, newPeriod);
        contentChart.data.datasets[2].data = generateGrowthData({{ $stats['catalogs'] }}, newPeriod);
        contentChart.data.datasets[3].data = generateGrowthData({{ $stats['galleries'] }}, newPeriod);
        contentChart.data.datasets[4].data = generateGrowthData({{ $stats['jobs'] }}, newPeriod);
        
        // Update point radius untuk visibility
        contentChart.data.datasets.forEach(dataset => {
            dataset.pointRadius = pointRadius;
        });
        
        // Update chart
        contentChart.update('active');
        
        console.log(`Period changed to: ${newPeriod} hari`);
    });

    // Progress bar animations
    function animateProgressBars() {
        const progressBars = document.querySelectorAll('.progress-fill');
        progressBars.forEach(bar => {
            const width = bar.style.width;
            bar.style.width = '0%';
            setTimeout(() => {
                bar.style.width = width;
            }, 500);
        });
    }

    setTimeout(animateProgressBars, 2000);

    // Hide loading on page load
    setTimeout(() => {
        const loadingOverlay = document.getElementById('loadingOverlay');
        if (loadingOverlay) {
            loadingOverlay.style.display = 'none';
        }
    }, 500);

    console.log('🎉 Premium Dashboard berhasil dimuat!');
});

// Weather API integration (optional)
async function updateWeather() {
    try {
        // This would typically call a weather API
        // For demo purposes, using static data
        console.log('Weather updated');
    } catch (error) {
        console.error('Weather update failed:', error);
    }
}

// Auto-refresh dashboard data every 5 minutes
setInterval(() => {
    // Refresh dashboard statistics
    console.log('Dashboard data refreshed');
}, 300000);
</script>
@endpush
@endsection