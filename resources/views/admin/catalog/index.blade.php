@extends('admin.components.layout')

@section('title', 'Katalog Admin')

@push('styles')
<style>
.premium-card {
    background: white;
    border: 1px solid rgba(139, 0, 0, 0.1);
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.08);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    margin-bottom: 25px;
    z-index: 1;
    position: relative;
}

.premium-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 40px rgba(139, 0, 0, 0.18);
    border-color: rgba(139, 0, 0, 0.25);
}

.premium-btn {
    background: linear-gradient(135deg, #8b0000, #a50000);
    border: none;
    color: white;
    padding: 10px 20px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 0.85rem;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.2);
    position: relative;
    overflow: hidden;
}

.premium-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.premium-btn:hover::before {
    left: 100%;
}

.premium-btn:hover {
    background: linear-gradient(135deg, #a50000, #c50000);
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(139, 0, 0, 0.35);
    color: white;
}

.premium-btn-sm {
    padding: 8px 16px;
    font-size: 0.8rem;
    border-radius: 10px;
}

.premium-btn-outline {
    background: white;
    border: 2px solid rgba(139, 0, 0, 0.3);
    color: #8b0000;
}

.premium-btn-outline:hover {
    background: rgba(139, 0, 0, 0.1);
    border-color: #8b0000;
    color: #8b0000;
    transform: translateY(-2px);
}

.page-header {
    background: linear-gradient(135deg, #8b0000, #a50000, #c50000);
    color: white;
    padding: 30px;
    border-radius: 25px;
    margin-bottom: 30px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(139, 0, 0, 0.2);
}

.page-header::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
    animation: shimmer 3s infinite linear;
}

@keyframes shimmer {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.catalog-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 25px;
    padding: 20px;
}

.catalog-card {
    background: white;
    border: 1px solid rgba(139, 0, 0, 0.08);
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.08);
    z-index: 1;
}

.catalog-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 25px 50px rgba(139, 0, 0, 0.25);
    border-color: rgba(139, 0, 0, 0.2);
}

.catalog-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #8b0000, #a50000, #c50000);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.catalog-card:hover::before {
    opacity: 1;
}

.catalog-image {
    width: 100%;
    height: 200px;
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #8b0000;
    font-size: 2.5rem;
    position: relative;
    overflow: hidden;
}

.catalog-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.catalog-card:hover .catalog-image img {
    transform: scale(1.1);
}

.catalog-content {
    padding: 20px;
    position: relative;
}

.catalog-title {
    font-size: 1rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 8px;
    line-height: 1.3;
}

.catalog-description {
    color: #666;
    line-height: 1.5;
    margin: 0 0 16px 0;
    font-size: 0.85rem;
}

.catalog-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 16px;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 6px;
    color: #8b0000;
    font-size: 0.75rem;
    padding: 4px 8px;
    background: rgba(139, 0, 0, 0.1);
    border-radius: 12px;
    font-weight: 500;
}

.search-filters {
    background: white;
    border-radius: 15px;
    padding: 25px;
    margin-bottom: 25px;
    border: 1px solid rgba(139, 0, 0, 0.1);
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.08);
    z-index: 1;
    position: relative;
}

.form-control {
    border: 2px solid rgba(139, 0, 0, 0.1);
    border-radius: 8px;
    padding: 12px 16px;
    font-size: 0.9rem;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    background: white;
    z-index: 1;
    position: relative;
}

.form-control:focus {
    border-color: #8b0000;
    box-shadow: 0 0 0 4px rgba(139, 0, 0, 0.1);
    background: white;
    transform: translateY(-1px);
}

.form-select {
    border: 2px solid rgba(139, 0, 0, 0.1);
    border-radius: 8px;
    padding: 12px 16px;
    font-size: 0.9rem;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    background: white;
    z-index: 1;
    position: relative;
}

.form-select:focus {
    border-color: #8b0000;
    box-shadow: 0 0 0 4px rgba(139, 0, 0, 0.1);
    background: white;
}

.filter-input {
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid rgba(139, 0, 0, 0.2);
    border-radius: 6px;
    padding: 8px 12px;
    font-size: 0.85rem;
    transition: all 0.3s ease;
}

.filter-input:focus {
    outline: none;
    border-color: #8b0000;
    box-shadow: 0 0 0 3px rgba(139, 0, 0, 0.1);
    background: rgba(255, 255, 255, 1);
}

.stats-bar {
    background: rgba(139, 0, 0, 0.05);
    border-radius: 8px;
    padding: 12px 15px;
    margin-bottom: 15px;
    border: 1px solid rgba(139, 0, 0, 0.1);
}

.view-mode-toggle {
    background: white;
    border: 1px solid rgba(139, 0, 0, 0.15);
    border-radius: 10px;
    padding: 6px;
    display: inline-flex;
    gap: 2px;
    box-shadow: 0 2px 8px rgba(139, 0, 0, 0.1);
    z-index: 1;
    position: relative;
}

.view-btn {
    background: transparent;
    border: none;
    color: #8b0000;
    padding: 10px 16px;
    border-radius: 12px;
    font-size: 0.85rem;
    font-weight: 600;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.view-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(139, 0, 0, 0.1), transparent);
    transition: left 0.5s;
}

.view-btn:hover::before {
    left: 100%;
}

.view-btn.active {
    background: linear-gradient(135deg, #8b0000, #a50000);
    color: white;
    box-shadow: 0 4px 12px rgba(139, 0, 0, 0.3);
    transform: translateY(-1px);
}

.view-btn:hover {
    background: rgba(139, 0, 0, 0.1);
    transform: translateY(-1px);
}

.catalog-table {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid rgba(139, 0, 0, 0.1);
    box-shadow: 0 8px 30px rgba(139, 0, 0, 0.08);
    margin-bottom: 25px;
}

.catalog-table th {
    background: linear-gradient(135deg, #8b0000, #a50000, #c50000);
    color: white;
    font-weight: 700;
    border: none;
    padding: 15px 16px;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    position: relative;
}

.catalog-table th::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
}

.catalog-table td {
    background: rgba(255, 255, 255, 0.05);
    border: none;
    padding: 16px;
    vertical-align: middle;
    font-size: 0.85rem;
    border-bottom: 1px solid rgba(139, 0, 0, 0.05);
    transition: all 0.3s ease;
}

.catalog-table tbody tr:hover td {
    background: rgba(139, 0, 0, 0.05);
    transform: scale(1.01);
}

.catalog-table tbody tr:hover {
    background: rgba(139, 0, 0, 0.05);
}

.catalog-thumb {
    width: 40px;
    height: 40px;
    border-radius: 6px;
    object-fit: cover;
    border: 2px solid rgba(139, 0, 0, 0.1);
}

.empty-state {
    text-align: center;
    padding: 60px 20px;
    color: #666;
}

.empty-state i {
    font-size: 4rem;
    color: #8b0000;
    margin-bottom: 20px;
}
</style>
@endpush

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-1" style="font-size: 1.2rem;">
                    <i class="fas fa-book-open me-2" style="font-size: 1.0rem;"></i>
                    Kelola Katalog
                </h5>
                <p class="mb-0 opacity-75" style="font-size: 0.85rem;">Manajemen katalog produk dan dokumen industri</p>
            </div>
            <a href="{{ route('admin.catalog.create') }}" class="premium-btn" style="padding: 6px 12px; font-size: 0.8rem;">
                <i class="fas fa-plus" style="font-size: 0.75rem;"></i>
                Tambah Katalog
            </a>
        </div>
    </div>
</div>

<!-- Stats Bar -->
<div class="stats-bar">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="d-flex gap-3">
                <div>
                    <strong class="text-dark" style="font-size: 0.9rem;">{{ $catalogs->total() }}</strong>
                    <small class="text-muted d-block" style="font-size: 0.75rem;">Total Item</small>
                </div>
                <div>
                    <strong class="text-success" style="font-size: 0.9rem;">{{ $catalogs->sum(function($item) { return $item->images->count(); }) }}</strong>
                    <small class="text-muted d-block" style="font-size: 0.75rem;">Total Gambar</small>
                </div>
                <div>
                    <strong class="text-info" style="font-size: 0.9rem;">{{ $catalogs->sum(function($item) { return $item->files->count(); }) }}</strong>
                    <small class="text-muted d-block" style="font-size: 0.75rem;">Total File</small>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-end">
            <div class="view-mode-toggle">
                <button class="view-btn active" id="gridViewBtn" onclick="switchView('grid')">
                    <i class="fas fa-th"></i>
                </button>
                <button class="view-btn" id="listViewBtn" onclick="switchView('list')">
                    <i class="fas fa-list"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Search and Filters -->
<div class="search-filters">
    <div class="row align-items-center">
        <div class="col-md-4">
            <input type="text" 
                   class="form-control filter-input" 
                   placeholder="Cari katalog..." 
                   id="searchInput"
                   style="font-size: 0.85rem;">
        </div>
        <div class="col-md-3">
            <select class="form-select filter-input" id="sortFilter" style="font-size: 0.85rem;">
                <option value="">Urutkan berdasarkan</option>
                <option value="name_asc">Nama A-Z</option>
                <option value="name_desc">Nama Z-A</option>
                <option value="date_desc">Terbaru</option>
                <option value="date_asc">Terlama</option>
            </select>
        </div>
        <div class="col-md-3">
            <select class="form-select filter-input" id="fileFilter" style="font-size: 0.85rem;">
                <option value="">Semua Status</option>
                <option value="with_files">Berisi File</option>
                <option value="without_files">Tanpa File</option>
            </select>
        </div>
        <div class="col-md-2">
            <button class="premium-btn w-100" onclick="clearFilters()" style="padding: 8px 12px; font-size: 0.8rem;">
                <i class="fas fa-times" style="font-size: 0.75rem;"></i>
                Clear
            </button>
        </div>
    </div>
</div>

<div class="premium-card">
    <div class="card-body p-0">
        @if($catalogs->count() > 0)
            <!-- Grid View -->
            <div id="gridView" class="catalog-grid">
                @foreach($catalogs as $catalog)
                <div class="catalog-card" 
                     data-name="{{ strtolower($catalog->name) }}"
                     data-date="{{ $catalog->created_at->format('Y-m-d') }}"
                     data-files="{{ $catalog->files->count() > 0 ? 'with_files' : 'without_files' }}">
                    
                    <div class="catalog-image">
                        @if($catalog->images->where('is_primary', true)->first())
                            <img src="{{ asset($catalog->images->where('is_primary', true)->first()->image_url) }}" 
                                 alt="{{ $catalog->name }}">
                        @else
                            <i class="fas fa-book-open"></i>
                        @endif
                    </div>

                    <div class="catalog-content">
                        <h6 class="catalog-title">{{ $catalog->name }}</h6>
                        <p class="catalog-description">{{ Str::limit($catalog->description, 100) }}</p>
                        
                        <div class="catalog-meta">
                            <div class="meta-item">
                                <i class="fas fa-images"></i>
                                {{ $catalog->images->count() }}
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-file"></i>
                                {{ $catalog->files->count() }}
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.catalog.show', $catalog) }}" 
                               class="premium-btn premium-btn-sm premium-btn-outline flex-fill"
                               style="padding: 4px 8px; font-size: 0.75rem;">
                                <i class="fas fa-eye" style="font-size: 0.7rem;"></i>
                                Detail
                            </a>
                            <a href="{{ route('admin.catalog.edit', $catalog) }}" 
                               class="premium-btn premium-btn-sm flex-fill"
                               style="padding: 4px 8px; font-size: 0.75rem;">
                                <i class="fas fa-edit" style="font-size: 0.7rem;"></i>
                                Edit
                            </a>
                            <button type="button" 
                                    class="premium-btn premium-btn-sm"
                                    style="background: linear-gradient(135deg, #dc3545, #c82333); padding: 4px 8px; font-size: 0.75rem;"
                                    onclick="deleteCatalog({{ $catalog->id }})"
                                    title="Hapus">
                                <i class="fas fa-trash" style="font-size: 0.7rem;"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- List View (Hidden by default) -->
            <div id="listView" style="display: none;">
                <div class="table-responsive">
                    <table class="table catalog-table mb-0">
                        <thead>
                            <tr>
                                <th width="80" style="font-size: 0.8rem;">Gambar</th>
                                <th style="font-size: 0.8rem;">Nama Katalog</th>
                                <th style="font-size: 0.8rem;">Deskripsi</th>
                                <th style="font-size: 0.8rem;">Gambar</th>
                                <th style="font-size: 0.8rem;">File</th>
                                <th width="120" style="font-size: 0.8rem;">Tanggal</th>
                                <th width="120" class="text-center" style="font-size: 0.8rem;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($catalogs as $catalog)
                            <tr data-name="{{ strtolower($catalog->name) }}"
                                data-date="{{ $catalog->created_at->format('Y-m-d') }}"
                                data-files="{{ $catalog->files->count() > 0 ? 'with_files' : 'without_files' }}">
                                <td>
                                    @if($catalog->images->where('is_primary', true)->first())
                                        <img src="{{ asset($catalog->images->where('is_primary', true)->first()->image_url) }}" 
                                             alt="{{ $catalog->name }}" 
                                             class="catalog-thumb">
                                    @else
                                        <div class="catalog-thumb d-flex align-items-center justify-content-center bg-light">
                                            <i class="fas fa-book-open text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-bold text-dark" style="font-size: 0.85rem;">{{ $catalog->name }}</div>
                                    @if($catalog->slug)
                                        <small class="text-muted" style="font-size: 0.75rem;">{{ $catalog->slug }}</small>
                                    @endif
                                </td>
                                <td>
                                    <span class="text-muted" style="font-size: 0.8rem;">{{ Str::limit($catalog->description, 50) }}</span>
                                </td>
                                <td>
                                    <div class="meta-item" style="font-size: 0.75rem;">
                                        <i class="fas fa-images"></i>
                                        {{ $catalog->images->count() }}
                                    </div>
                                </td>
                                <td>
                                    <div class="meta-item" style="font-size: 0.75rem; padding: 3px 8px;">
                                        <i class="fas fa-file"></i>
                                        {{ $catalog->files->count() }}
                                    </div>
                                </td>
                                <td>
                                    <small class="text-muted" style="font-size: 0.75rem;">{{ $catalog->created_at->format('d M Y') }}</small>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.catalog.show', $catalog) }}" 
                                           class="premium-btn premium-btn-sm premium-btn-outline"
                                           title="Detail"
                                           style="padding: 4px 8px; font-size: 0.7rem;">
                                            <i class="fas fa-eye" style="font-size: 0.65rem;"></i>
                                        </a>
                                        <a href="{{ route('admin.catalog.edit', $catalog) }}" 
                                           class="premium-btn premium-btn-sm"
                                           title="Edit"
                                           style="padding: 4px 8px; font-size: 0.7rem;">
                                            <i class="fas fa-edit" style="font-size: 0.65rem;"></i>
                                        </a>
                                        <button type="button" 
                                                class="premium-btn premium-btn-sm"
                                                style="background: linear-gradient(135deg, #dc3545, #c82333); padding: 4px 8px; font-size: 0.7rem;"
                                                onclick="deleteCatalog({{ $catalog->id }})"
                                                title="Hapus">
                                            <i class="fas fa-trash" style="font-size: 0.65rem;"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            @if($catalogs->hasPages())
                <div class="p-3 border-top" style="border-color: rgba(139, 0, 0, 0.1) !important;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-muted" style="font-size: 0.8rem;">
                            Menampilkan {{ $catalogs->firstItem() }} sampai {{ $catalogs->lastItem() }} 
                            dari {{ $catalogs->total() }} data
                        </div>
                        <div>
                            {{ $catalogs->links() }}
                        </div>
                    </div>
                </div>
            @endif
        @else
            <div class="empty-state">
                <i class="fas fa-book-open" style="font-size: 3rem;"></i>
                <h4 style="font-size: 1.2rem;">Belum Ada Katalog</h4>
                <p class="mb-4" style="font-size: 0.9rem;">Mulai dengan menambahkan item katalog pertama Anda.</p>
                <a href="{{ route('admin.catalog.create') }}" class="premium-btn" style="padding: 8px 16px; font-size: 0.85rem;">
                    <i class="fas fa-plus" style="font-size: 0.75rem;"></i>
                    Tambah Katalog Pertama
                </a>
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
// View mode switching
function switchView(mode) {
    const gridView = document.getElementById('gridView');
    const listView = document.getElementById('listView');
    const gridBtn = document.getElementById('gridViewBtn');
    const listBtn = document.getElementById('listViewBtn');
    
    if (mode === 'grid') {
        gridView.style.display = 'grid';
        listView.style.display = 'none';
        gridBtn.classList.add('active');
        listBtn.classList.remove('active');
    } else {
        gridView.style.display = 'none';
        listView.style.display = 'block';
        gridBtn.classList.remove('active');
        listBtn.classList.add('active');
    }
    
    localStorage.setItem('catalogViewMode', mode);
    
    // Show modern alert
    const viewName = mode === 'grid' ? 'Grid' : 'List';
    showModernAlert('info', 'Tampilan Diubah!', `Beralih ke tampilan ${viewName}.`, 'fas fa-eye');
}

// Filter functionality
function filterCatalogs() {
    const searchValue = document.getElementById('searchInput').value.toLowerCase();
    const sortFilter = document.getElementById('sortFilter').value;
    const fileFilter = document.getElementById('fileFilter').value;
    
    const catalogs = document.querySelectorAll('[data-name]');
    
    catalogs.forEach(catalog => {
        const name = catalog.dataset.name;
        const files = catalog.dataset.files;
        
        const matchesSearch = name.includes(searchValue);
        const matchesFiles = !fileFilter || files === fileFilter;
        
        if (matchesSearch && matchesFiles) {
            catalog.style.display = '';
        } else {
            catalog.style.display = 'none';
        }
    });
    
    // Sort functionality
    if (sortFilter) {
        const visibleCatalogs = Array.from(catalogs).filter(catalog => catalog.style.display !== 'none');
        
        visibleCatalogs.sort((a, b) => {
            switch(sortFilter) {
                case 'name_asc':
                    return a.dataset.name.localeCompare(b.dataset.name);
                case 'name_desc':
                    return b.dataset.name.localeCompare(a.dataset.name);
                case 'date_desc':
                    return new Date(b.dataset.date) - new Date(a.dataset.date);
                case 'date_asc':
                    return new Date(a.dataset.date) - new Date(b.dataset.date);
                default:
                    return 0;
            }
        });
        
        // Reorder elements
        const container = document.getElementById('gridView');
        const tableBody = document.querySelector('.catalog-table tbody');
        
        visibleCatalogs.forEach(catalog => {
            if (container && catalog.classList.contains('catalog-card')) {
                container.appendChild(catalog);
            }
            if (tableBody && catalog.tagName === 'TR') {
                tableBody.appendChild(catalog);
            }
        });
    }
}

// Setup filter event listeners
document.getElementById('searchInput').addEventListener('keyup', filterCatalogs);
document.getElementById('sortFilter').addEventListener('change', filterCatalogs);
document.getElementById('fileFilter').addEventListener('change', filterCatalogs);

// Clear filters
function clearFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('sortFilter').value = '';
    document.getElementById('fileFilter').value = '';
    filterCatalogs();
    
    // Show modern success alert
    showModernAlert('success', 'Filter Direset!', 'Semua filter telah dibersihkan.', 'fas fa-check-circle');
}

// Delete catalog function with modern confirmation
function deleteCatalog(catalogId) {
    // Show modern confirmation modal
    showModernConfirm(
        'Hapus Katalog?', 
        'Apakah Anda yakin ingin menghapus katalog ini? Tindakan ini akan menghapus semua gambar dan file terkait dan tidak dapat dibatalkan!',
        'fas fa-trash-alt',
        'danger',
        function() {
            // Show loading alert
            showModernAlert('info', 'Memproses...', 'Sedang menghapus katalog, harap tunggu.', 'fas fa-spinner fa-spin', 0);
            
            fetch(`/admin/catalog/${catalogId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                // Remove loading alert
                removeAlert();
                
                if (data.success) {
                    // Remove catalog from DOM
                    const gridCard = document.querySelector(`[onclick="deleteCatalog(${catalogId})"]`).closest('.catalog-card');
                    const listRow = document.querySelector(`[onclick="deleteCatalog(${catalogId})"]`).closest('tr');
                    
                    if (gridCard) gridCard.remove();
                    if (listRow) listRow.remove();
                    
                    showModernAlert('success', 'Berhasil!', data.message || 'Katalog berhasil dihapus.', 'fas fa-check-circle');
                } else {
                    showModernAlert('danger', 'Gagal!', data.message || 'Gagal menghapus katalog.', 'fas fa-exclamation-triangle');
                }
            })
            .catch(error => {
                // Remove loading alert
                removeAlert();
                console.error('Error:', error);
                showModernAlert('danger', 'Error!', 'Terjadi kesalahan saat menghapus katalog: ' + error.message, 'fas fa-exclamation-circle');
            });
        }
    );
}

// Enhanced form submission handling
document.addEventListener('DOMContentLoaded', function() {
    // Load saved view mode without showing alert on page load
    const savedMode = localStorage.getItem('catalogViewMode') || 'grid';
    const gridView = document.getElementById('gridView');
    const listView = document.getElementById('listView');
    const gridBtn = document.getElementById('gridViewBtn');
    const listBtn = document.getElementById('listViewBtn');
    
    if (savedMode === 'grid') {
        gridView.style.display = 'grid';
        listView.style.display = 'none';
        gridBtn.classList.add('active');
        listBtn.classList.remove('active');
    } else {
        gridView.style.display = 'none';
        listView.style.display = 'block';
        gridBtn.classList.remove('active');
        listBtn.classList.add('active');
    }
    
    // Add click effect to buttons
    document.querySelectorAll('.premium-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            // Create ripple effect
            const ripple = document.createElement('span');
            ripple.classList.add('ripple');
            this.appendChild(ripple);
            
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
            ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';
            ripple.style.position = 'absolute';
            ripple.style.borderRadius = '50%';
            ripple.style.background = 'rgba(255, 255, 255, 0.3)';
            ripple.style.animation = 'ripple-animation 0.6s ease-out';
            ripple.style.pointerEvents = 'none';
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
    
    // Keyboard shortcuts for modern modals
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const modernConfirm = document.getElementById('modernConfirmOverlay');
            if (modernConfirm) {
                removeConfirm();
            }
        }
    });
});

// Modern Alert System
function showModernAlert(type, title, message, icon, duration = 4000) {
    // Remove existing alerts
    removeAlert();
    
    const alertTypes = {
        'success': {
            bg: 'linear-gradient(135deg, #d1e7dd, #f8fff9)',
            border: '#badbcc',
            color: '#0f5132',
            iconColor: '#198754'
        },
        'danger': {
            bg: 'linear-gradient(135deg, #f8d7da, #fef5f5)',
            border: '#f5c2c7',
            color: '#842029',
            iconColor: '#dc3545'
        },
        'warning': {
            bg: 'linear-gradient(135deg, #fff3cd, #fffef5)',
            border: '#ffecb5',
            color: '#664d03',
            iconColor: '#ffc107'
        },
        'info': {
            bg: 'linear-gradient(135deg, #d1ecf1, #f5feff)',
            border: '#b6d7e2',
            color: '#055160',
            iconColor: '#0dcaf0'
        }
    };
    
    const alertStyle = alertTypes[type] || alertTypes['info'];
    
    const alertHtml = `
        <div class="modern-alert" id="modernAlert" style="
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 10000;
            min-width: 350px;
            max-width: 450px;
            background: ${alertStyle.bg};
            border: 1px solid ${alertStyle.border};
            border-left: 4px solid ${alertStyle.iconColor};
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            padding: 20px;
            color: ${alertStyle.color};
            font-family: 'Inter', sans-serif;
            animation: slideInRight 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
        ">
            <div style="display: flex; align-items: flex-start; gap: 12px;">
                <div style="
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    background: ${alertStyle.iconColor};
                    color: white;
                    font-size: 16px;
                    flex-shrink: 0;
                    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                ">
                    <i class="${icon}"></i>
                </div>
                <div style="flex: 1; padding-top: 2px;">
                    <div style="font-weight: 600; font-size: 16px; margin-bottom: 4px;">${title}</div>
                    <div style="font-size: 14px; line-height: 1.4; opacity: 0.9;">${message}</div>
                </div>
                <button onclick="removeAlert()" style="
                    background: none;
                    border: none;
                    color: ${alertStyle.color};
                    font-size: 18px;
                    line-height: 1;
                    padding: 0;
                    width: 24px;
                    height: 24px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    border-radius: 50%;
                    opacity: 0.6;
                    transition: all 0.2s ease;
                    cursor: pointer;
                    flex-shrink: 0;
                " onmouseover="this.style.opacity='1'; this.style.background='rgba(0,0,0,0.1)'" onmouseout="this.style.opacity='0.6'; this.style.background='none'">
                    ×
                </button>
            </div>
        </div>
        
        <style>
        @keyframes slideInRight {
            0% {
                transform: translateX(100%);
                opacity: 0;
            }
            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes slideOutRight {
            0% {
                transform: translateX(0) scale(1);
                opacity: 1;
            }
            100% {
                transform: translateX(100%) scale(0.8);
                opacity: 0;
            }
        }
        </style>
    `;
    
    document.body.insertAdjacentHTML('beforeend', alertHtml);
    
    if (duration > 0) {
        setTimeout(() => {
            const alert = document.getElementById('modernAlert');
            if (alert) {
                alert.style.animation = 'slideOutRight 0.4s cubic-bezier(0.4, 0, 0.2, 1) forwards';
                setTimeout(() => removeAlert(), 400);
            }
        }, duration);
    }
}

function removeAlert() {
    const existingAlert = document.getElementById('modernAlert');
    if (existingAlert) {
        existingAlert.remove();
    }
}

// Modern Confirmation Modal
function showModernConfirm(title, message, icon, type = 'danger', onConfirm) {
    const typeColors = {
        'danger': { primary: '#dc3545', secondary: '#f8d7da' },
        'warning': { primary: '#ffc107', secondary: '#fff3cd' },
        'info': { primary: '#0dcaf0', secondary: '#d1ecf1' }
    };
    
    const colors = typeColors[type] || typeColors['danger'];
    
    const modalHtml = `
        <div class="modern-confirm-overlay" id="modernConfirmOverlay" style="
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 10001;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.3s ease;
            backdrop-filter: blur(5px);
        ">
            <div class="modern-confirm-modal" style="
                background: white;
                border-radius: 20px;
                box-shadow: 0 15px 50px rgba(0,0,0,0.3);
                max-width: 450px;
                width: 90%;
                animation: scaleIn 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                overflow: hidden;
            ">
                <div style="
                    background: ${colors.secondary};
                    padding: 30px 30px 20px;
                    text-align: center;
                    border-bottom: 1px solid rgba(0,0,0,0.1);
                ">
                    <div style="
                        display: inline-flex;
                        align-items: center;
                        justify-content: center;
                        width: 60px;
                        height: 60px;
                        border-radius: 50%;
                        background: ${colors.primary};
                        color: white;
                        font-size: 24px;
                        margin-bottom: 20px;
                        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
                    ">
                        <i class="${icon}"></i>
                    </div>
                    <h5 style="margin: 0 0 10px; font-weight: 600; color: #333;">${title}</h5>
                    <p style="margin: 0; color: #666; font-size: 14px; line-height: 1.5;">${message}</p>
                </div>
                
                <div style="
                    padding: 20px 30px;
                    display: flex;
                    gap: 12px;
                    justify-content: flex-end;
                ">
                    <button onclick="removeConfirm()" style="
                        background: rgba(108, 117, 125, 0.1);
                        border: 2px solid rgba(108, 117, 125, 0.3);
                        color: #6c757d;
                        padding: 12px 24px;
                        border-radius: 12px;
                        font-weight: 600;
                        font-size: 14px;
                        cursor: pointer;
                        transition: all 0.3s ease;
                        min-width: 100px;
                    " onmouseover="this.style.background='rgba(108, 117, 125, 0.2)'; this.style.borderColor='#6c757d'" onmouseout="this.style.background='rgba(108, 117, 125, 0.1)'; this.style.borderColor='rgba(108, 117, 125, 0.3)'">
                        Batal
                    </button>
                    <button onclick="confirmAction()" style="
                        background: linear-gradient(135deg, ${colors.primary}, ${colors.primary}dd);
                        border: none;
                        color: white;
                        padding: 12px 24px;
                        border-radius: 12px;
                        font-weight: 600;
                        font-size: 14px;
                        cursor: pointer;
                        transition: all 0.3s ease;
                        min-width: 100px;
                        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
                    " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(0,0,0,0.3)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.2)'">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
        
        <style>
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
        
        @keyframes scaleIn {
            0% {
                transform: scale(0.7);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
        
        @keyframes fadeOut {
            0% { opacity: 1; }
            100% { opacity: 0; }
        }
        
        @keyframes scaleOut {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            100% {
                transform: scale(0.7);
                opacity: 0;
            }
        }
        </style>
    `;
    
    document.body.insertAdjacentHTML('beforeend', modalHtml);
    
    // Store the confirm callback
    window.modernConfirmCallback = onConfirm;
    
    // Close on overlay click
    document.getElementById('modernConfirmOverlay').addEventListener('click', function(e) {
        if (e.target === this) {
            removeConfirm();
        }
    });
    
    // Close on Escape key
    document.addEventListener('keydown', function escapeHandler(e) {
        if (e.key === 'Escape') {
            removeConfirm();
            document.removeEventListener('keydown', escapeHandler);
        }
    });
}

function removeConfirm() {
    const overlay = document.getElementById('modernConfirmOverlay');
    if (overlay) {
        const modal = overlay.querySelector('.modern-confirm-modal');
        modal.style.animation = 'scaleOut 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
        overlay.style.animation = 'fadeOut 0.3s ease';
        setTimeout(() => {
            overlay.remove();
            window.modernConfirmCallback = null;
        }, 300);
    }
}

function confirmAction() {
    if (window.modernConfirmCallback) {
        window.modernConfirmCallback();
    }
    removeConfirm();
}
</script>

<style>
/* Ripple effect styles */
@keyframes ripple-animation {
    0% {
        transform: scale(0);
        opacity: 1;
    }
    100% {
        transform: scale(1);
        opacity: 0;
    }
}

/* Loading spinner */
.fa-spinner {
    animation: spin 1s linear infinite !important;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
<script>

// View mode switching
function switchView(mode) {
    const gridView = document.getElementById('gridView');
    const listView = document.getElementById('listView');
    const gridBtn = document.getElementById('gridViewBtn');
    const listBtn = document.getElementById('listViewBtn');
    
    if (mode === 'grid') {
        gridView.style.display = 'grid';
        listView.style.display = 'none';
        gridBtn.classList.add('active');
        listBtn.classList.remove('active');
    } else {
        gridView.style.display = 'none';
        listView.style.display = 'block';
        gridBtn.classList.remove('active');
        listBtn.classList.add('active');
    }
    
    localStorage.setItem('catalogViewMode', mode);
    
    // Show modern alert
    const viewName = mode === 'grid' ? 'Grid' : 'List';
    showModernAlert('info', 'Tampilan Diubah!', `Beralih ke tampilan ${viewName}.`, 'fas fa-eye');
}

// Filter functionality
function filterCatalogs() {
    const searchValue = document.getElementById('searchInput').value.toLowerCase();
    const sortFilter = document.getElementById('sortFilter').value;
    const fileFilter = document.getElementById('fileFilter').value;
    
    const catalogs = document.querySelectorAll('[data-name]');
    
    catalogs.forEach(catalog => {
        const name = catalog.dataset.name;
        const files = catalog.dataset.files;
        
        const matchesSearch = name.includes(searchValue);
        const matchesFiles = !fileFilter || files === fileFilter;
        
        if (matchesSearch && matchesFiles) {
            catalog.style.display = '';
        } else {
            catalog.style.display = 'none';
        }
    });
    
    // Sort functionality
    if (sortFilter) {
        const visibleCatalogs = Array.from(catalogs).filter(catalog => catalog.style.display !== 'none');
        
        visibleCatalogs.sort((a, b) => {
            switch(sortFilter) {
                case 'name_asc':
                    return a.dataset.name.localeCompare(b.dataset.name);
                case 'name_desc':
                    return b.dataset.name.localeCompare(a.dataset.name);
                case 'date_desc':
                    return new Date(b.dataset.date) - new Date(a.dataset.date);
                case 'date_asc':
                    return new Date(a.dataset.date) - new Date(b.dataset.date);
                default:
                    return 0;
            }
        });
        
        // Reorder elements
        const container = document.getElementById('gridView');
        const tableBody = document.querySelector('.catalog-table tbody');
        
        visibleCatalogs.forEach(catalog => {
            if (container && catalog.classList.contains('catalog-card')) {
                container.appendChild(catalog);
            }
            if (tableBody && catalog.tagName === 'TR') {
                tableBody.appendChild(catalog);
            }
        });
    }
}

// Setup filter event listeners
document.getElementById('searchInput').addEventListener('keyup', filterCatalogs);
document.getElementById('sortFilter').addEventListener('change', filterCatalogs);
document.getElementById('fileFilter').addEventListener('change', filterCatalogs);

// Clear filters
function clearFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('sortFilter').value = '';
    document.getElementById('fileFilter').value = '';
    filterCatalogs();
    
    // Show modern success alert
    showModernAlert('success', 'Filter Direset!', 'Semua filter telah dibersihkan.', 'fas fa-check-circle');
}

// Delete catalog function with modern confirmation
function deleteCatalog(catalogId) {
    // Show modern confirmation modal
    showModernConfirm(
        'Hapus Katalog?', 
        'Apakah Anda yakin ingin menghapus katalog ini? Tindakan ini akan menghapus semua gambar dan file terkait dan tidak dapat dibatalkan!',
        'fas fa-trash-alt',
        'danger',
        function() {
            // Show loading alert
            showModernAlert('info', 'Memproses...', 'Sedang menghapus katalog, harap tunggu.', 'fas fa-spinner fa-spin', 0);
            
            fetch(`/admin/catalog/${catalogId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                // Remove loading alert
                removeAlert();
                
                if (data.success) {
                    // Remove catalog from DOM
                    const gridCard = document.querySelector(`[onclick="deleteCatalog(${catalogId})"]`).closest('.catalog-card');
                    const listRow = document.querySelector(`[onclick="deleteCatalog(${catalogId})"]`).closest('tr');
                    
                    if (gridCard) gridCard.remove();
                    if (listRow) listRow.remove();
                    
                    showModernAlert('success', 'Berhasil!', data.message || 'Katalog berhasil dihapus.', 'fas fa-check-circle');
                } else {
                    showModernAlert('danger', 'Gagal!', data.message || 'Gagal menghapus katalog.', 'fas fa-exclamation-triangle');
                }
            })
            .catch(error => {
                // Remove loading alert
                removeAlert();
                console.error('Error:', error);
                showModernAlert('danger', 'Error!', 'Terjadi kesalahan saat menghapus katalog: ' + error.message, 'fas fa-exclamation-circle');
            });
        }
    );
}

// Enhanced form submission handling
document.addEventListener('DOMContentLoaded', function() {
    // Load saved view mode without showing alert on page load
    const savedMode = localStorage.getItem('catalogViewMode') || 'grid';
    const gridView = document.getElementById('gridView');
    const listView = document.getElementById('listView');
    const gridBtn = document.getElementById('gridViewBtn');
    const listBtn = document.getElementById('listViewBtn');
    
    if (savedMode === 'grid') {
        gridView.style.display = 'grid';
        listView.style.display = 'none';
        gridBtn.classList.add('active');
        listBtn.classList.remove('active');
    } else {
        gridView.style.display = 'none';
        listView.style.display = 'block';
        gridBtn.classList.remove('active');
        listBtn.classList.add('active');
    }
    
    // Add click effect to buttons
    document.querySelectorAll('.premium-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            // Create ripple effect
            const ripple = document.createElement('span');
            ripple.classList.add('ripple');
            this.appendChild(ripple);
            
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
            ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';
            ripple.style.position = 'absolute';
            ripple.style.borderRadius = '50%';
            ripple.style.background = 'rgba(255, 255, 255, 0.3)';
            ripple.style.animation = 'ripple-animation 0.6s ease-out';
            ripple.style.pointerEvents = 'none';
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
    
    // Keyboard shortcuts for modern modals
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const modernConfirm = document.getElementById('modernConfirmOverlay');
            if (modernConfirm) {
                removeConfirm();
            }
        }
    });
});

// Modern Alert System
function showModernAlert(type, title, message, icon, duration = 4000) {
    // Remove existing alerts
    removeAlert();
    
    const alertTypes = {
        'success': {
            bg: 'linear-gradient(135deg, #d1e7dd, #f8fff9)',
            border: '#badbcc',
            color: '#0f5132',
            iconColor: '#198754'
        },
        'danger': {
            bg: 'linear-gradient(135deg, #f8d7da, #fef5f5)',
            border: '#f5c2c7',
            color: '#842029',
            iconColor: '#dc3545'
        },
        'warning': {
            bg: 'linear-gradient(135deg, #fff3cd, #fffef5)',
            border: '#ffecb5',
            color: '#664d03',
            iconColor: '#ffc107'
        },
        'info': {
            bg: 'linear-gradient(135deg, #d1ecf1, #f5feff)',
            border: '#b6d7e2',
            color: '#055160',
            iconColor: '#0dcaf0'
        }
    };
    
    const alertStyle = alertTypes[type] || alertTypes['info'];
    
    const alertHtml = `
        <div class="modern-alert" id="modernAlert" style="
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 10000;
            min-width: 350px;
            max-width: 450px;
            background: ${alertStyle.bg};
            border: 1px solid ${alertStyle.border};
            border-left: 4px solid ${alertStyle.iconColor};
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            padding: 20px;
            color: ${alertStyle.color};
            font-family: 'Inter', sans-serif;
            animation: slideInRight 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
        ">
            <div style="display: flex; align-items: flex-start; gap: 12px;">
                <div style="
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    background: ${alertStyle.iconColor};
                    color: white;
                    font-size: 16px;
                    flex-shrink: 0;
                    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                ">
                    <i class="${icon}"></i>
                </div>
                <div style="flex: 1; padding-top: 2px;">
                    <div style="font-weight: 600; font-size: 16px; margin-bottom: 4px;">${title}</div>
                    <div style="font-size: 14px; line-height: 1.4; opacity: 0.9;">${message}</div>
                </div>
                <button onclick="removeAlert()" style="
                    background: none;
                    border: none;
                    color: ${alertStyle.color};
                    font-size: 18px;
                    line-height: 1;
                    padding: 0;
                    width: 24px;
                    height: 24px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    border-radius: 50%;
                    opacity: 0.6;
                    transition: all 0.2s ease;
                    cursor: pointer;
                    flex-shrink: 0;
                " onmouseover="this.style.opacity='1'; this.style.background='rgba(0,0,0,0.1)'" onmouseout="this.style.opacity='0.6'; this.style.background='none'">
                    ×
                </button>
            </div>
        </div>
        
        <style>
        @keyframes slideInRight {
            0% {
                transform: translateX(100%);
                opacity: 0;
            }
            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes slideOutRight {
            0% {
                transform: translateX(0) scale(1);
                opacity: 1;
            }
            100% {
                transform: translateX(100%) scale(0.8);
                opacity: 0;
            }
        }
        </style>
    `;
    
    document.body.insertAdjacentHTML('beforeend', alertHtml);
    
    if (duration > 0) {
        setTimeout(() => {
            const alert = document.getElementById('modernAlert');
            if (alert) {
                alert.style.animation = 'slideOutRight 0.4s cubic-bezier(0.4, 0, 0.2, 1) forwards';
                setTimeout(() => removeAlert(), 400);
            }
        }, duration);
    }
}

function removeAlert() {
    const existingAlert = document.getElementById('modernAlert');
    if (existingAlert) {
        existingAlert.remove();
    }
}

// Modern Confirmation Modal
function showModernConfirm(title, message, icon, type = 'danger', onConfirm) {
    const typeColors = {
        'danger': { primary: '#dc3545', secondary: '#f8d7da' },
        'warning': { primary: '#ffc107', secondary: '#fff3cd' },
        'info': { primary: '#0dcaf0', secondary: '#d1ecf1' }
    };
    
    const colors = typeColors[type] || typeColors['danger'];
    
    const modalHtml = `
        <div class="modern-confirm-overlay" id="modernConfirmOverlay" style="
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 10001;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.3s ease;
            backdrop-filter: blur(5px);
        ">
            <div class="modern-confirm-modal" style="
                background: white;
                border-radius: 20px;
                box-shadow: 0 15px 50px rgba(0,0,0,0.3);
                max-width: 450px;
                width: 90%;
                animation: scaleIn 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                overflow: hidden;
            ">
                <div style="
                    background: ${colors.secondary};
                    padding: 30px 30px 20px;
                    text-align: center;
                    border-bottom: 1px solid rgba(0,0,0,0.1);
                ">
                    <div style="
                        display: inline-flex;
                        align-items: center;
                        justify-content: center;
                        width: 60px;
                        height: 60px;
                        border-radius: 50%;
                        background: ${colors.primary};
                        color: white;
                        font-size: 24px;
                        margin-bottom: 20px;
                        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
                    ">
                        <i class="${icon}"></i>
                    </div>
                    <h5 style="margin: 0 0 10px; font-weight: 600; color: #333;">${title}</h5>
                    <p style="margin: 0; color: #666; font-size: 14px; line-height: 1.5;">${message}</p>
                </div>
                
                <div style="
                    padding: 20px 30px;
                    display: flex;
                    gap: 12px;
                    justify-content: flex-end;
                ">
                    <button onclick="removeConfirm()" style="
                        background: rgba(108, 117, 125, 0.1);
                        border: 2px solid rgba(108, 117, 125, 0.3);
                        color: #6c757d;
                        padding: 12px 24px;
                        border-radius: 12px;
                        font-weight: 600;
                        font-size: 14px;
                        cursor: pointer;
                        transition: all 0.3s ease;
                        min-width: 100px;
                    " onmouseover="this.style.background='rgba(108, 117, 125, 0.2)'; this.style.borderColor='#6c757d'" onmouseout="this.style.background='rgba(108, 117, 125, 0.1)'; this.style.borderColor='rgba(108, 117, 125, 0.3)'">
                        Batal
                    </button>
                    <button onclick="confirmAction()" style="
                        background: linear-gradient(135deg, ${colors.primary}, ${colors.primary}dd);
                        border: none;
                        color: white;
                        padding: 12px 24px;
                        border-radius: 12px;
                        font-weight: 600;
                        font-size: 14px;
                        cursor: pointer;
                        transition: all 0.3s ease;
                        min-width: 100px;
                        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
                    " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(0,0,0,0.3)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.2)'">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
        
        <style>
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
        
        @keyframes scaleIn {
            0% {
                transform: scale(0.7);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
        
        @keyframes fadeOut {
            0% { opacity: 1; }
            100% { opacity: 0; }
        }
        
        @keyframes scaleOut {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            100% {
                transform: scale(0.7);
                opacity: 0;
            }
        }
        </style>
    `;
    
    document.body.insertAdjacentHTML('beforeend', modalHtml);
    
    // Store the confirm callback
    window.modernConfirmCallback = onConfirm;
    
    // Close on overlay click
    document.getElementById('modernConfirmOverlay').addEventListener('click', function(e) {
        if (e.target === this) {
            removeConfirm();
        }
    });
    
    // Close on Escape key
    document.addEventListener('keydown', function escapeHandler(e) {
        if (e.key === 'Escape') {
            removeConfirm();
            document.removeEventListener('keydown', escapeHandler);
        }
    });
}

function removeConfirm() {
    const overlay = document.getElementById('modernConfirmOverlay');
    if (overlay) {
        const modal = overlay.querySelector('.modern-confirm-modal');
        modal.style.animation = 'scaleOut 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
        overlay.style.animation = 'fadeOut 0.3s ease';
        setTimeout(() => {
            overlay.remove();
            window.modernConfirmCallback = null;
        }, 300);
    }
}

function confirmAction() {
    if (window.modernConfirmCallback) {
        window.modernConfirmCallback();
    }
    removeConfirm();
}
</script>
@endpush
