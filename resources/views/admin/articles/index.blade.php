@extends('admin.components.layout')

@section('title', 'Artikel & Blog')

@push('styles')
<style>
/* Alert Enhancements */
.alert {
    border-radius: 16px !important;
    border: none !important;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12) !important;
    padding: 20px 24px !important;
    margin-bottom: 24px !important;
    font-size: 0.95rem !important;
    font-weight: 500 !important;
    position: relative !important;
    z-index: 1000 !important;
    backdrop-filter: none !important;
    animation: slideInDown 0.4s cubic-bezier(0.4, 0, 0.2, 1) !important;
}

.alert-success {
    background: linear-gradient(135deg, #d1f2dd, #f0fdf4) !important;
    border-left: 6px solid #22c55e !important;
    color: #065f46 !important;
}

.alert-danger {
    background: linear-gradient(135deg, #fecaca, #fef2f2) !important;
    border-left: 6px solid #ef4444 !important;
    color: #991b1b !important;
}

.alert .btn-close {
    background: rgba(0, 0, 0, 0.1) !important;
    border-radius: 12px !important;
    opacity: 0.7 !important;
    width: 32px !important;
    height: 32px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
}

.alert .btn-close:hover {
    opacity: 1 !important;
    background: rgba(0, 0, 0, 0.15) !important;
}

@keyframes slideInDown {
    0% {
        transform: translateY(-20px);
        opacity: 0;
    }
    100% {
        transform: translateY(0);
        opacity: 1;
    }
}

.premium-card {
    background: #ffffff;
    border: 1px solid #e3e6f0;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 24px;
}

.premium-card:hover {
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
}

.premium-btn {
    background: #8b0000;
    border: none;
    color: white;
    padding: 12px 20px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.9rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 2px 8px rgba(139, 0, 0, 0.3);
}

.premium-btn:hover {
    background: #a50000;
    color: white;
}

.premium-btn-outline {
    background: #ffffff;
    border: 2px solid #8b0000;
    color: #8b0000;
    font-weight: 600;
    padding: 12px 20px;
    border-radius: 8px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.premium-btn-outline:hover {
    background: #8b0000;
    color: white;
}

.page-header {
    background: linear-gradient(135deg, #8b0000, #a50000);
    color: white;
    padding: 30px;
    border-radius: 12px;
    margin-bottom: 30px;
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.2);
}

.filter-form .form-label {
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 6px;
    font-size: 0.9rem;
}

.form-control, .form-select {
    border: 1px solid #d1d5db;
    border-radius: 8px;
    padding: 12px 16px;
    font-size: 0.9rem;
    background: #ffffff;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #8b0000;
    box-shadow: 0 0 0 3px rgba(139, 0, 0, 0.1);
    outline: none;
}

/* View Modes */
.view-mode {
    display: none;
}

.view-mode.active {
    display: block;
}

/* Grid View */
.articles-grid .article-card-grid {
    background: #ffffff;
    border: 1px solid #e3e6f0;
    border-radius: 12px;
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    min-height: 420px;
}

.articles-grid .article-card-grid:hover {
    border-color: #8b0000;
    box-shadow: 0 4px 20px rgba(139, 0, 0, 0.15);
}

.article-image {
    position: relative;
    height: 180px;
    overflow: hidden;
    background: #f8f9fa;
    border-radius: 12px 12px 0 0;
    flex-shrink: 0;
}

.article-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.article-card-grid:hover .article-image img {
    transform: scale(1.05);
}

.no-image {
    width: 100%;
    height: 100%;
    background: #f8f9fa;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #8b0000;
    flex-direction: column;
    gap: 12px;
}

.no-image i {
    font-size: 3rem;
    opacity: 0.6;
    color: #8b0000;
}

.no-image span {
    font-size: 0.9rem;
    font-weight: 600;
    opacity: 0.8;
}

.article-content {
    padding: 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
    background: #ffffff;
}

.article-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 12px;
    flex-wrap: wrap;
    gap: 8px;
}

.category-tag {
    background: #8b0000;
    color: white;
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
    text-decoration: none;
    box-shadow: 0 2px 8px rgba(139, 0, 0, 0.25);
    white-space: nowrap;
    display: inline-block;
    max-width: 140px;
    overflow: hidden;
    text-overflow: ellipsis;
}

.category-tag:hover {
    background: #a50000;
    color: white;
}

.status-badge {
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    border: 1px solid;
}

.status-published {
    background: #d4f6db;
    color: #155724;
    border-color: #28a745;
}

.status-draft {
    background: #fff3cd;
    color: #856404;
    border-color: #ffc107;
}

.article-title {
    margin: 0 0 12px 0;
    font-size: 1.1rem;
    font-weight: 700;
    line-height: 1.3;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    max-height: 2.6em;
}

.article-title a {
    color: #2d3748;
    text-decoration: none;
}

.article-title a:hover {
    color: #8b0000;
}

.article-excerpt {
    color: #718096;
    line-height: 1.6;
    margin-bottom: 16px;
    flex: 1;
    font-size: 0.9rem;
    font-weight: 400;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    max-height: 4.8em;
}

.article-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: auto;
    padding-top: 12px;
    border-top: 1px solid #e3e6f0;
    gap: 10px;
}

.article-date {
    font-size: 0.8rem;
    color: #a0aec0;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 6px;
    flex-shrink: 0;
}

.article-date i {
    color: #8b0000;
    opacity: 0.8;
}

/* List View */
.premium-table {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    background: #ffffff;
    border: 1px solid #e3e6f0;
}

.premium-table thead th {
    background: #8b0000;
    color: white;
    border: none;
    padding: 16px 20px;
    font-weight: 600;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.premium-table tbody td {
    padding: 16px 20px;
    border-bottom: 1px solid #e3e6f0;
    vertical-align: middle;
    background: #ffffff;
}

.premium-table tbody tr:hover {
    background: #f8f9fa;
}

/* Category column specific styling */
.premium-table tbody td:nth-child(3) {
    white-space: nowrap;
    min-width: 120px;
    max-width: 150px;
}

.table-image {
    width: 80px;
    height: 60px;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 
        0 8px 24px rgba(0, 0, 0, 0.15),
        inset 0 1px 0 rgba(255, 255, 255, 0.2);
    position: relative;
}

.table-image:hover {
    box-shadow: 
        0 12px 32px rgba(0, 0, 0, 0.2),
        inset 0 1px 0 rgba(255, 255, 255, 0.3);
}

.table-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.no-image-small {
    width: 100%;
    height: 100%;
    background: #f8f9fa;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #8b0000;
    position: relative;
    overflow: hidden;
}

.no-image-small::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at center, rgba(139, 0, 0, 0.1) 0%, transparent 60%);
}

.no-image-small i {
    font-size: 1.8rem;
    opacity: 0.6;
    background: linear-gradient(135deg, #8b0000, #c21807);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.article-info strong {
    color: #2d3748;
    line-height: 1.4;
    font-size: 1rem;
    font-weight: 700;
    display: block;
    margin-bottom: 6px;
    letter-spacing: -0.2px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    max-width: 300px;
}

.article-info small {
    color: #a0aec0;
    font-size: 0.8rem;
    font-weight: 500;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    max-height: 2.4em;
}

.action-buttons {
    display: flex;
    gap: 6px;
    justify-content: center;
    flex-wrap: wrap;
}

.action-buttons .btn {
    min-width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
    font-weight: 500;
    font-size: 0.8rem;
    border: 1px solid;
    padding: 6px 8px;
}

.action-buttons .btn:hover {
    opacity: 0.9;
}

.action-buttons .btn-info {
    background: #17a2b8;
    border-color: #17a2b8;
    color: white;
}

.action-buttons .btn-warning {
    background: #ffc107;
    border-color: #ffc107;
    color: white;
}

.action-buttons .btn-danger {
    background: #dc3545;
    border-color: #dc3545;
    color: white;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 60px 30px;
    color: #666;
}

.empty-state .empty-icon {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    background: rgba(139, 0, 0, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 25px;
}

.empty-state .empty-icon i {
    font-size: 3.5rem;
    color: #8b0000;
    opacity: 0.6;
}

.empty-state h3 {
    color: #333;
    font-weight: 600;
    font-size: 1.5rem;
    margin-bottom: 15px;
}

.empty-state p {
    color: #666;
    font-size: 1.1rem;
    margin-bottom: 30px;
}

/* Pagination */
.pagination-wrapper {
    margin-top: 30px;
    display: flex;
    justify-content: center;
}

.pagination .page-link {
    border: 1px solid #e9ecef;
    color: #8b0000;
    padding: 10px 15px;
    margin: 0 3px;
    border-radius: 6px;
    font-weight: 500;
}

.pagination .page-link:hover {
    background: #8b0000;
    border-color: #8b0000;
    color: white;
}

.pagination .page-item.active .page-link {
    background: #8b0000;
    border-color: #8b0000;
    color: white;
}

/* Card Headers */
.card-header {
    background: #fafbfc;
    border-bottom: 1px solid rgba(139, 0, 0, 0.08);
    border-radius: 12px 12px 0 0 !important;
    padding: 20px 24px;
}

.card-title {
    color: #2d3748;
    font-weight: 600;
    font-size: 1rem;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 10px;
    letter-spacing: 0.3px;
}

.card-title i {
    color: #8b0000;
    font-size: 1.2rem;
}

.card-actions {
    display: flex;
    align-items: center;
    gap: 16px;
}

/* Filter Form Improvements */
.filter-form .form-label {
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 8px;
    font-size: 0.85rem;
}

.filter-form .row {
    margin-left: 8px;
    margin-right: 8px;
}

.filter-form .input-group .premium-btn {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    padding: 10px 16px;
}

.filter-form .badge {
    font-size: 0.75rem;
    padding: 6px 10px;
}

.filter-form .badge a {
    text-decoration: none;
}

.filter-form .badge a:hover {
    opacity: 0.8;
}

/* Card Headers Enhanced */
.card-header .d-flex {
    flex-wrap: wrap;
    gap: 16px;
}

.card-header .badge {
    font-size: 0.75rem;
    padding: 4px 10px;
    background: #8b0000 !important;
}

/* View Toggle Enhanced */
.view-toggle {
    display: flex;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    overflow: hidden;
    background: #ffffff;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.view-toggle .btn {
    border: none;
    border-radius: 0;
    padding: 8px 12px;
    font-weight: 600;
    font-size: 0.8rem;
    transition: all 0.3s ease;
}

.view-toggle .btn.active {
    background: #8b0000;
    color: white;
}

.view-toggle .btn:not(.active) {
    background: transparent;
    color: #6c757d;
}

.view-toggle .btn:not(.active):hover {
    background: #f8f9fa;
    color: #8b0000;
}

/* Responsive */
@media (max-width: 768px) {
    .page-header {
        padding: 20px;
        margin-bottom: 24px;
    }
    
    .page-header h1 {
        font-size: 1.5rem !important;
    }
    
    .page-header p {
        font-size: 0.9rem !important;
    }
    
    .page-header .mt-3 {
        font-size: 0.75rem !important;
        flex-wrap: wrap;
        gap: 15px !important;
    }
    
    .premium-btn {
        padding: 10px 16px;
        font-size: 0.8rem;
    }
    
    .article-card-grid {
        margin-bottom: 20px;
        min-height: auto !important;
    }
    
    .view-toggle {
        margin-top: 0;
    }
    
    .card-header .d-flex {
        flex-direction: column;
        align-items: flex-start !important;
        gap: 12px;
    }
    
    .card-header .view-toggle {
        align-self: stretch;
    }
    
    .view-toggle .btn {
        flex: 1;
        justify-content: center;
    }
    
    .filter-form .row {
        gap: 15px;
    }
    
    .filter-form .input-group .premium-btn {
        padding: 12px 16px;
        min-width: 50px;
    }
    
    .filter-form .row {
        margin-left: 4px;
        margin-right: 4px;
    }
    
    .card-body {
        padding: 20px 24px !important;
    }
    
    .filter-form .badge {
        font-size: 0.7rem;
        padding: 4px 8px;
    }
    
    .article-meta {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }
    
    .form-control, .form-select {
        font-size: 0.85rem;
        padding: 10px 14px;
    }
    
    .card-header {
        padding: 16px 20px;
    }
    
    .card-title {
        font-size: 0.9rem;
    }
    
    .action-buttons {
        gap: 4px;
    }
    
    .action-buttons .btn {
        min-width: 32px;
        height: 32px;
        font-size: 0.75rem;
    }
    
    .article-content {
        padding: 16px;
    }
    
    .article-image {
        height: 160px;
    }
    
    .article-title {
        font-size: 1rem;
        -webkit-line-clamp: 3;
        max-height: 3.9em;
    }
    
    .article-excerpt {
        font-size: 0.85rem;
        -webkit-line-clamp: 2;
        max-height: 3.2em;
    }
}

@media (max-width: 576px) {
    .premium-card {
        margin-bottom: 20px;
    }
    
    .page-header .d-flex {
        flex-direction: column;
        gap: 20px;
    }
    
    .premium-btn {
        width: 100%;
        justify-content: center;
        padding: 8px 16px;
    }
    
    .view-toggle .btn {
        flex: 1;
        text-align: center;
        padding: 8px 12px;
        font-size: 0.8rem;
    }
    
    .card-header .d-flex {
        flex-direction: column;
        align-items: stretch !important;
        gap: 15px;
    }
    
    .card-title {
        text-align: center;
    }
    
    .filter-form .col-lg-3,
    .filter-form .col-lg-2,
    .filter-form .col-lg-5 {
        width: 100%;
        margin-bottom: 15px;
    }
    
    .filter-form .row {
        margin-left: 0px;
        margin-right: 0px;
    }
    
    .card-body {
        padding: 16px 20px !important;
    }
    
    .filter-form .input-group .premium-btn {
        width: auto;
        min-width: 60px;
    }
    
    .article-title {
        font-size: 0.95rem;
    }
    
    .article-excerpt {
        font-size: 0.8rem;
    }
    
    .table-responsive {
        font-size: 0.8rem;
    }
    
    .premium-table thead th {
        padding: 12px 8px;
        font-size: 0.75rem;
    }
    
    .premium-table tbody td {
        padding: 12px 8px;
    }
    
    .premium-table tbody td:nth-child(3) {
        min-width: 100px;
        max-width: 120px;
    }
    
    .category-tag {
        font-size: 0.7rem;
        padding: 3px 8px;
        max-width: 100px;
    }
    
    .article-info strong {
        max-width: 200px;
        font-size: 0.9rem;
    }
    
    .article-info small {
        font-size: 0.75rem;
    }
    
    .article-image {
        height: 140px;
    }
    
    .article-content {
        padding: 12px;
    }
}

/* Loading Overlay for Delete Operations */
.loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(0, 0, 0, 0.7);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    z-index: 10000;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    visibility: hidden;
    transition: all 0.4s ease;
}

.loading-overlay.show {
    opacity: 1;
    visibility: visible;
}

.loading-content {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 40px;
    text-align: center;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    transform: scale(0.8);
    transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.loading-overlay.show .loading-content {
    transform: scale(1);
}

.loading-spinner {
    width: 60px;
    height: 60px;
    border: 4px solid rgba(220, 53, 69, 0.2);
    border-left: 4px solid #dc3545;
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
    color: #333;
    margin-bottom: 10px;
}

.loading-subtext {
    font-size: 0.9rem;
    color: #666;
}
</style>
@endpush

@section('content')
<!-- Success & Error Alerts -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom: 24px; position: relative; z-index: 1000;">
        <div style="display: flex; align-items: center; gap: 12px;">
            <i class="fas fa-check-circle" style="font-size: 1.2rem; color: #198754;"></i>
            <div>
                <strong>Berhasil!</strong> {{ session('success') }}
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-bottom: 24px; position: relative; z-index: 1000;">
        <div style="display: flex; align-items: center; gap: 12px;">
            <i class="fas fa-exclamation-triangle" style="font-size: 1.2rem; color: #dc3545;"></i>
            <div>
                <strong>Error!</strong> {{ session('error') }}
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="mb-2" style="font-size: 1.8rem; font-weight: 800; letter-spacing: -0.5px;">
                <i class="fas fa-newspaper me-3" style="font-size: 1.5rem; opacity: 0.9;"></i>
                Artikel & Blog
            </h1>
            <p class="mb-0 opacity-90" style="font-size: 1rem; font-weight: 500;">
                Kelola semua artikel dan konten blog dengan mudah dan efisien
            </p>
            <div class="mt-3" style="display: flex; gap: 20px; font-size: 0.8rem; opacity: 0.8;">
                <span><i class="fas fa-chart-line me-2"></i>Dashboard Artikel</span>
                <span><i class="fas fa-users me-2"></i>Manajemen Konten</span>
                <span><i class="fas fa-globe me-2"></i>Publikasi Global</span>
            </div>
        </div>
        <div class="d-flex gap-3">
            <a href="{{ route('admin.articles.create') }}" class="premium-btn">
                <i class="fas fa-plus"></i>
                Tulis Artikel
            </a>
            <a href="{{ route('admin.article-categories.index') }}" class="premium-btn premium-btn-outline">
                <i class="fas fa-folder"></i>
                Kelola Kategori
            </a>
            <button type="button" class="premium-btn premium-btn-outline" onclick="refreshData()">
                <i class="fas fa-sync-alt"></i>
                Refresh
            </button>
        </div>
    </div>
</div>

<!-- Filter Section -->
<div class="premium-card mb-4">
    <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
        <h3 class="card-title mb-0">
            <i class="fas fa-filter"></i>
            Filter & Pencarian
        </h3>
        <div class="card-actions">
            <button type="button" class="premium-btn premium-btn-outline btn-sm" onclick="resetFilters()">
                <i class="fas fa-undo"></i>
                <span class="d-none d-sm-inline">Reset Filter</span>
            </button>
        </div>
    </div>
    <div class="card-body" style="padding: 24px 32px;">
        <form method="GET" action="{{ route('admin.articles.index') }}" class="filter-form" id="filterForm">
            <div class="row g-4 align-items-end" style="margin: 0 8px;">
                <div class="col-lg-3 col-md-6">
                    <label class="form-label fw-semibold">📁 Kategori</label>
                    <select name="category" class="form-select">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-2 col-md-6">
                    <label class="form-label fw-semibold">📊 Status</label>
                    <select name="status" class="form-select">
                        <option value="">Semua Status</option>
                        <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>🌐 Dipublikasi</option>
                        <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>📝 Draft</option>
                    </select>
                </div>
                <div class="col-lg-5 col-md-8">
                    <label class="form-label fw-semibold">🔍 Cari Artikel</label>
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" 
                               placeholder="Ketik kata kunci..." 
                               value="{{ request('search') }}">
                        <button type="submit" class="premium-btn d-lg-none" id="searchBtnMobile">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="d-grid">
                        <button type="submit" class="premium-btn d-none d-lg-flex align-items-center justify-content-center" id="searchBtn">
                            <i class="fas fa-search"></i>
                            <span class="ms-2">Cari</span>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Advanced Filters Toggle (Optional) -->
            @if(request()->hasAny(['category', 'status', 'search']))
            <div class="mt-3 pt-3 border-top">
                <div class="d-flex flex-wrap gap-2">
                    <span class="badge bg-light text-dark border">
                        <i class="fas fa-filter text-primary"></i>
                        Filter Aktif:
                    </span>
                    @if(request('category'))
                        <span class="badge bg-primary">
                            Kategori: {{ $categories->find(request('category'))->name ?? 'Unknown' }}
                            <a href="{{ request()->url() . '?' . http_build_query(array_merge(request()->except('category'))) }}" class="text-white ms-1">
                                <i class="fas fa-times"></i>
                            </a>
                        </span>
                    @endif
                    @if(request('status'))
                        <span class="badge bg-success">
                            Status: {{ request('status') === 'published' ? 'Dipublikasi' : 'Draft' }}
                            <a href="{{ request()->url() . '?' . http_build_query(array_merge(request()->except('status'))) }}" class="text-white ms-1">
                                <i class="fas fa-times"></i>
                            </a>
                        </span>
                    @endif
                    @if(request('search'))
                        <span class="badge bg-info">
                            Pencarian: "{{ request('search') }}"
                            <a href="{{ request()->url() . '?' . http_build_query(array_merge(request()->except('search'))) }}" class="text-white ms-1">
                                <i class="fas fa-times"></i>
                            </a>
                        </span>
                    @endif
                </div>
            </div>
            @endif
        </form>
    </div>
</div>

        <!-- Articles List -->
        <div class="premium-card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <h3 class="card-title mb-0">
                        <i class="fas fa-list"></i>
                        Daftar Artikel <span class="badge rounded-pill ms-2" style="background-color: #8b0000; color: white;">{{ $articles->total() }}</span>
                    </h3>
                    <div class="view-toggle">
                        <button class="btn btn-sm active" data-view="grid">
                            <i class="fas fa-th-large"></i>
                            <span class="d-none d-sm-inline ms-1">Grid</span>
                        </button>
                        <button class="btn btn-sm" data-view="list">
                            <i class="fas fa-list"></i>
                            <span class="d-none d-sm-inline ms-1">List</span>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                @if($articles->count() > 0)
                    <!-- Grid View -->
                    <div class="articles-grid view-mode active" id="grid-view">
                        <div class="row">
                            @foreach($articles as $article)
                            <div class="col-lg-6 col-xl-4 mb-4">
                                <div class="article-card-grid">
                                    <div class="article-image">
                                        @if($article->cover_url)
                                            <img src="{{ asset($article->cover_url) }}" alt="{{ $article->title }}">
                                        @else
                                            <div class="no-image">
                                                <i class="fas fa-image"></i>
                                                <span>Tidak ada gambar</span>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <div class="article-content">
                                        <div class="article-meta">
                                            <a href="{{ route('admin.article-categories.show', $article->category) }}" class="category-tag">
                                                {{ $article->category->name }}
                                            </a>
                                            <span class="status-badge status-{{ $article->status }}">
                                                {{ $article->status === 'published' ? 'Dipublikasi' : 'Draft' }}
                                            </span>
                                        </div>
                                        
                                        <h5 class="article-title">
                                            <a href="{{ route('admin.articles.show', $article) }}">
                                                {{ $article->title }}
                                            </a>
                                        </h5>
                                        
                                        <p class="article-excerpt">
                                            {{ Str::limit($article->excerpt, 100) }}
                                        </p>
                                        
                                        <div class="article-footer">
                                            <div class="article-date">
                                                <i class="fas fa-calendar"></i>
                                                {{ $article->created_at->format('d M Y') }}
                                            </div>
                                            <div class="action-buttons">
                                                <a href="{{ route('admin.articles.show', $article) }}" 
                                                   class="btn btn-info btn-sm" title="Lihat">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.articles.edit', $article) }}" 
                                                   class="btn btn-warning btn-sm" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.articles.destroy', $article) }}" 
                                                      method="POST" 
                                                      style="display: inline-block;"
                                                      id="deleteForm{{ $article->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" 
                                                            class="btn btn-danger btn-sm" 
                                                            onclick="deleteArticle({{ $article->id }})"
                                                            title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- List View -->
                    <div class="articles-list view-mode" id="list-view">
                        <div class="table-responsive">
                            <table class="table premium-table">
                                <thead>
                                    <tr>
                                        <th width="80">Cover</th>
                                        <th>Judul Artikel</th>
                                        <th width="130" style="white-space: nowrap;">Kategori</th>
                                        <th width="100">Status</th>
                                        <th width="120">Tanggal</th>
                                        <th width="120" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($articles as $article)
                                    <tr>
                                        <td>
                                            <div class="table-image">
                                                @if($article->cover_url)
                                                    <img src="{{ asset($article->cover_url) }}" alt="{{ $article->title }}">
                                                @else
                                                    <div class="no-image-small">
                                                        <i class="fas fa-image"></i>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="article-info">
                                                <strong>{{ Str::limit($article->title, 50) }}</strong>
                                                <small class="d-block text-muted">
                                                    {{ Str::limit($article->excerpt, 80) }}
                                                </small>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.article-categories.show', $article->category) }}" class="category-tag">
                                                {{ $article->category->name }}
                                            </a>
                                        </td>
                                        <td>
                                            <span class="status-badge status-{{ $article->status }}">
                                                {{ $article->status === 'published' ? 'Dipublikasi' : 'Draft' }}
                                            </span>
                                        </td>
                                        <td>
                                            <small class="article-date">
                                                {{ $article->created_at->format('d M Y') }}<br>
                                                <span class="text-muted">{{ $article->created_at->format('H:i') }}</span>
                                            </small>
                                        </td>
                                        <td class="text-center">
                                            <div class="action-buttons">
                                                <a href="{{ route('admin.articles.show', $article) }}" 
                                                   class="btn btn-info btn-sm" title="Lihat">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.articles.edit', $article) }}" 
                                                   class="btn btn-warning btn-sm" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.articles.destroy', $article) }}" 
                                                      method="POST" 
                                                      style="display: inline-block;"
                                                      id="deleteFormList{{ $article->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" 
                                                            class="btn btn-danger btn-sm" 
                                                            onclick="deleteArticle({{ $article->id }})"
                                                            title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-wrapper">
                        {{ $articles->appends(request()->query())->links() }}
                    </div>
                @else
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <h3>Belum Ada Artikel</h3>
                        <p>Mulai dengan menulis artikel pertama Anda untuk berbagi konten menarik</p>
                        <a href="{{ route('admin.articles.create') }}" class="premium-btn">
                            <i class="fas fa-plus"></i>
                            Tulis Artikel Pertama
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-dismiss alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert.auto-dismiss, .alert:not(.manual-dismiss)');
    alerts.forEach(function(alert) {
        setTimeout(function() {
            if (alert && alert.parentNode) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 5000);
    });

    // Enhanced view toggle functionality with loading
    const viewButtons = document.querySelectorAll('[data-view]');
    const gridView = document.getElementById('grid-view');
    const listView = document.getElementById('list-view');
    
    viewButtons.forEach(button => {
        button.addEventListener('click', function() {
            const view = this.dataset.view;
            
            // Show loading state
            showModernAlert('loading', 'Mengubah Tampilan...', 'Sedang beralih ke mode ' + (view === 'grid' ? 'Grid' : 'List'), 'fas fa-spinner fa-spin', 800);
            
            // Update active button with animation
            viewButtons.forEach(btn => {
                btn.classList.remove('active');
                btn.style.transform = 'scale(0.95)';
                setTimeout(() => btn.style.transform = '', 150);
            });
            this.classList.add('active');
            this.style.transform = 'scale(1.05)';
            setTimeout(() => this.style.transform = '', 150);
            
            // Show/hide views with enhanced animation
            setTimeout(() => {
                if (view === 'grid') {
                    listView.classList.remove('active');
                    setTimeout(() => {
                        gridView.classList.add('active');
                    }, 200);
                } else {
                    gridView.classList.remove('active');
                    setTimeout(() => {
                        listView.classList.add('active');
                    }, 200);
                }
                
                // Save preference
                localStorage.setItem('articles_view_preference', view);
            }, 300);
        });
    });
    
    // Load saved view preference
    const savedView = localStorage.getItem('articles_view_preference');
    if (savedView) {
        const savedButton = document.querySelector(`[data-view="${savedView}"]`);
        if (savedButton && !savedButton.classList.contains('active')) {
            savedButton.click();
        }
    }
    
    // Enhanced form interactions with validation
    const searchInput = document.querySelector('input[name="search"]');
    const searchBtn = document.getElementById('searchBtn');
    const searchBtnMobile = document.getElementById('searchBtnMobile');
    const filterForm = document.getElementById('filterForm');
    
    if (searchInput && filterForm) {
        let searchTimeout;
        
        // Real-time search feedback
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            const value = this.value.trim();
            
            if (value.length > 0) {
                this.style.borderColor = '#8b0000';
                this.style.boxShadow = '0 0 0 4px rgba(139, 0, 0, 0.12)';
                
                // Show search suggestion
                if (value.length >= 3) {
                    searchTimeout = setTimeout(() => {
                        showModernAlert('info', 'Pencarian Aktif', `Mencari: "${value}"`, 'fas fa-search', 2000);
                    }, 1000);
                }
            } else {
                this.style.borderColor = '';
                this.style.boxShadow = '';
            }
        });
        
        // Enhanced form submission
        filterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Show loading state for both buttons
            if (searchBtn) {
                searchBtn.classList.add('btn-loading');
                searchBtn.disabled = true;
            }
            if (searchBtnMobile) {
                searchBtnMobile.classList.add('btn-loading');
                searchBtnMobile.disabled = true;
            }
            
            // Show search alert
            showModernAlert('loading', 'Mencari Artikel...', 'Memproses filter dan kriteria pencarian Anda.', 'fas fa-spinner fa-spin', 0);
            
            // Simulate processing time
            setTimeout(() => {
                this.submit();
            }, 1200);
        });
        
        // Enter key support with animation
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                this.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    this.style.transform = '';
                    filterForm.dispatchEvent(new Event('submit'));
                }, 100);
            }
        });
    }
    
    // Enhanced card hover effects with performance optimization
    const articleCards = document.querySelectorAll('.article-card-grid');
    
    articleCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
            this.style.zIndex = '10';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = '';
            this.style.zIndex = '';
        });
    });
    
    // Smooth scroll with progress indicator
    const paginationLinks = document.querySelectorAll('.pagination .page-link');
    paginationLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            if (!this.href) return;
            
            e.preventDefault();
            
            // Show navigation loading
            showModernAlert('loading', 'Memuat Halaman...', 'Berpindah ke halaman yang dipilih.', 'fas fa-spinner fa-spin', 0);
            
            // Smooth scroll to top
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            
            // Navigate after animation
            setTimeout(() => {
                window.location.href = this.href;
            }, 800);
        });
    });
    
    // Initialize tooltips for better UX
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl, {
            trigger: 'hover focus'
        });
    });
    
    // Performance monitoring
    const performanceObserver = new PerformanceObserver((list) => {
        for (const entry of list.getEntries()) {
            if (entry.entryType === 'navigation' && entry.loadEventEnd > 3000) {
                console.log('Page load time:', entry.loadEventEnd, 'ms');
            }
        }
    });
    
    if ('PerformanceObserver' in window) {
        performanceObserver.observe({entryTypes: ['navigation']});
    }
    
    // Add ripple effect to premium buttons
    document.querySelectorAll('.premium-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            ripple.className = 'ripple';
            this.appendChild(ripple);
            
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
            ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
});

// Enhanced delete confirmation with modern UI
function deleteArticle(articleId) {
    // Ensure we have a valid article ID
    if (!articleId) {
        showModernAlert('danger', 'Error!', 'ID artikel tidak valid.', 'fas fa-exclamation-triangle', 4000);
        return;
    }

    const modal = document.createElement('div');
    modal.className = 'modal fade';
    modal.id = 'deleteModal' + articleId;
    modal.innerHTML = `
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 24px; overflow: hidden;">
                <div class="modal-header border-0 pb-0" style="background: linear-gradient(135deg, #fff5f5, #ffffff); padding: 24px 24px 0;">
                    <div class="d-flex align-items-center w-100">
                        <div class="delete-icon me-3" style="
                            width: 60px; 
                            height: 60px; 
                            border-radius: 50%; 
                            background: linear-gradient(135deg, rgba(220, 53, 69, 0.1), rgba(220, 53, 69, 0.05)); 
                            display: flex; 
                            align-items: center; 
                            justify-content: center;
                            animation: warningPulse 2s infinite;
                        ">
                            <i class="fas fa-exclamation-triangle" style="
                                font-size: 2.2rem; 
                                background: linear-gradient(135deg, #dc3545, #e74c3c);
                                -webkit-background-clip: text;
                                -webkit-text-fill-color: transparent;
                                background-clip: text;
                                filter: drop-shadow(0 2px 4px rgba(220, 53, 69, 0.3));
                            "></i>
                        </div>
                        <div>
                            <h5 class="modal-title mb-1" style="color: #2d3748; font-weight: 800; font-size: 1.3rem;">⚠️ Konfirmasi Hapus</h5>
                            <p class="text-muted mb-0" style="font-size: 0.9rem; font-weight: 500;">Tindakan ini tidak dapat dibatalkan</p>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" style="
                        background: rgba(220, 53, 69, 0.1);
                        border: 2px solid rgba(220, 53, 69, 0.2);
                        border-radius: 12px;
                        width: 36px;
                        height: 36px;
                        opacity: 0.7;
                    "></button>
                </div>
                <div class="modal-body pt-3" style="padding: 16px 24px 24px;">
                    <div style="
                        background: linear-gradient(135deg, rgba(220, 53, 69, 0.05), rgba(220, 53, 69, 0.02));
                        border: 2px solid rgba(220, 53, 69, 0.1);
                        border-radius: 16px;
                        padding: 20px;
                        margin-bottom: 20px;
                    ">
                        <p class="mb-3" style="color: #495057; line-height: 1.7; font-size: 1rem; margin-bottom: 12px;">
                            🗑️ Apakah Anda yakin ingin menghapus artikel ini?
                        </p>
                        <p style="color: #6c757d; font-size: 0.9rem; line-height: 1.6;">
                            <strong style="color: #dc3545;">⚠️ Peringatan:</strong> 
                            Data yang sudah dihapus tidak dapat dikembalikan. Pastikan Anda benar-benar yakin sebelum melanjutkan.
                        </p>
                    </div>
                    <div class="d-flex gap-3 justify-content-end">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" style="
                            border-radius: 16px; 
                            padding: 12px 24px; 
                            font-weight: 700;
                            border: 2px solid #6c757d;
                            transition: all 0.3s ease;
                        ">
                            <i class="fas fa-times me-2"></i>Batal
                        </button>
                        <button type="button" class="btn btn-danger" onclick="confirmDelete(${articleId})" style="
                            border-radius: 16px; 
                            padding: 12px 24px; 
                            font-weight: 700; 
                            background: linear-gradient(135deg, #dc3545, #e74c3c);
                            border: none;
                            box-shadow: 0 8px 24px rgba(220, 53, 69, 0.3);
                            transition: all 0.3s ease;
                        ">
                            <i class="fas fa-trash me-2"></i>Ya, Hapus Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <style>
        @keyframes warningPulse {
            0%, 100% { 
                transform: scale(1); 
                box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.4); 
            }
            50% { 
                transform: scale(1.05); 
                box-shadow: 0 0 0 10px rgba(220, 53, 69, 0); 
            }
        }
        </style>
    `;
    
    document.body.appendChild(modal);
    const bsModal = new bootstrap.Modal(modal, {
        backdrop: 'static',
        keyboard: false
    });
    bsModal.show();
    
    // Remove modal after hide
    modal.addEventListener('hidden.bs.modal', function() {
        if (document.body.contains(modal)) {
            document.body.removeChild(modal);
        }
    });
}

// Enhanced confirm delete with progress tracking
function confirmDelete(articleId) {
    // Find the correct delete form
    let deleteForm = document.getElementById(`deleteForm${articleId}`) || document.getElementById(`deleteFormList${articleId}`);
    
    if (deleteForm) {
        // Close modal first
        const modal = bootstrap.Modal.getInstance(document.querySelector('.modal'));
        if (modal) {
            modal.hide();
        }
        
        // Show loading overlay with blur background
        const loadingOverlay = document.getElementById('loadingOverlay');
        if (loadingOverlay) {
            loadingOverlay.classList.add('show');
        }
        
        // Show loading alert
        showModernAlert('loading', 'Menghapus Artikel...', 'Sedang memproses permintaan penghapusan.', 'fas fa-spinner fa-spin', 0);
        
        // Submit form after loading animation
        setTimeout(() => {
            deleteForm.submit();
        }, 1200);
    } else {
        showModernAlert('danger', 'Error!', 'Form delete tidak ditemukan. Silakan refresh halaman.', 'fas fa-exclamation-triangle', 4000);
    }
}

// Enhanced loading alert with progress bar
function showLoadingWithProgress(title, message) {
    const loadingAlert = document.createElement('div');
    loadingAlert.className = 'position-fixed';
    loadingAlert.style.cssText = `
        top: 20px; 
        right: 20px; 
        z-index: 10000; 
        min-width: 380px; 
        background: linear-gradient(145deg, #ffffff, #f8f9fa);
        border: 2px solid #e9ecef;
        border-radius: 20px; 
        box-shadow: 0 15px 50px rgba(0,0,0,0.15);
        padding: 24px;
        animation: slideInRight 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    `;
    
    loadingAlert.innerHTML = `
        <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 16px;">
            <div style="
                width: 48px; 
                height: 48px; 
                border-radius: 50%; 
                background: linear-gradient(135deg, rgba(139, 0, 0, 0.1), rgba(139, 0, 0, 0.05));
                display: flex; 
                align-items: center; 
                justify-content: center;
                animation: rotate 1s linear infinite;
            ">
                <i class="fas fa-spinner" style="
                    font-size: 1.5rem; 
                    color: #8b0000;
                    animation: spin 1s linear infinite;
                "></i>
            </div>
            <div style="flex: 1;">
                <div style="font-weight: 700; font-size: 1.1rem; color: #2d3748; margin-bottom: 4px;">
                    ${title}
                </div>
                <div style="font-size: 0.9rem; color: #6c757d; line-height: 1.4;">
                    ${message}
                </div>
            </div>
        </div>
        <div style="
            height: 4px; 
            background: rgba(139, 0, 0, 0.1); 
            border-radius: 2px; 
            overflow: hidden;
            position: relative;
        ">
            <div style="
                height: 100%; 
                background: linear-gradient(90deg, #8b0000, #a50000, #8b0000);
                border-radius: 2px; 
                animation: progressLoad 2s ease-in-out;
                width: 0%;
            "></div>
        </div>
        
        <style>
        @keyframes slideInRight {
            0% { transform: translateX(100%) scale(0.8); opacity: 0; }
            100% { transform: translateX(0) scale(1); opacity: 1; }
        }
        
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        @keyframes progressLoad {
            0% { width: 0%; }
            50% { width: 80%; }
            100% { width: 100%; }
        }
        </style>
    `;
    
    document.body.appendChild(loadingAlert);
    
    // Remove after 3 seconds
    setTimeout(() => {
        if (document.body.contains(loadingAlert)) {
            loadingAlert.style.animation = 'slideOutRight 0.5s ease-in-out';
            setTimeout(() => {
                document.body.removeChild(loadingAlert);
            }, 500);
        }
    }, 3000);
}

// Modern Alert System with Enhanced Design
function showModernAlert(type, title, message, icon, duration = 4000) {
    removeAlert();
    
    const alertTypes = {
        'success': {
            bg: 'linear-gradient(145deg, #d1e7dd, #f8fff9)',
            border: '#badbcc',
            color: '#0f5132',
            iconColor: '#198754',
            iconBg: 'rgba(25, 135, 84, 0.1)'
        },
        'danger': {
            bg: 'linear-gradient(145deg, #f8d7da, #fef5f5)',
            border: '#f5c2c7',
            color: '#842029',
            iconColor: '#dc3545',
            iconBg: 'rgba(220, 53, 69, 0.1)'
        },
        'warning': {
            bg: 'linear-gradient(145deg, #fff3cd, #fffef5)',
            border: '#ffecb5',
            color: '#664d03',
            iconColor: '#ffc107',
            iconBg: 'rgba(255, 193, 7, 0.1)'
        },
        'info': {
            bg: 'linear-gradient(145deg, #d1ecf1, #f5feff)',
            border: '#b6d7e2',
            color: '#055160',
            iconColor: '#0dcaf0',
            iconBg: 'rgba(13, 202, 240, 0.1)'
        },
        'loading': {
            bg: 'linear-gradient(145deg, #e3f2fd, #f5faff)',
            border: '#bbdefb',
            color: '#0d47a1',
            iconColor: '#2196f3',
            iconBg: 'rgba(33, 150, 243, 0.1)'
        }
    };
    
    const alertStyle = alertTypes[type] || alertTypes['info'];
    
    const alertHtml = `
        <div class="modern-alert" id="modernAlert" style="
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 10000;
            min-width: 360px;
            max-width: 420px;
            background: ${alertStyle.bg};
            border: 2px solid ${alertStyle.border};
            border-left: 6px solid ${alertStyle.iconColor};
            border-radius: 20px;
            box-shadow: 0 15px 50px rgba(0,0,0,0.12), 0 6px 20px rgba(0,0,0,0.08);
            padding: 20px;
            color: ${alertStyle.color};
            font-family: 'Inter', sans-serif;
            animation: slideInRight 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(20px);
        ">
            <div style="display: flex; align-items: flex-start; gap: 16px;">
                <div style="
                    width: 48px;
                    height: 48px;
                    border-radius: 16px;
                    background: ${alertStyle.iconBg};
                    color: ${alertStyle.iconColor};
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 1.3rem;
                    flex-shrink: 0;
                    box-shadow: 0 6px 16px rgba(0,0,0,0.1);
                    border: 2px solid rgba(255,255,255,0.3);
                ">
                    <i class="${icon}"></i>
                </div>
                <div style="flex: 1; padding-top: 2px;">
                    <div style="
                        font-weight: 800; 
                        font-size: 1.05rem; 
                        margin-bottom: 6px;
                        color: ${alertStyle.color};
                        letter-spacing: 0.3px;
                    ">${title}</div>
                    <div style="
                        font-size: 0.9rem; 
                        opacity: 0.9; 
                        line-height: 1.5;
                        color: ${alertStyle.color};
                        font-weight: 500;
                    ">${message}</div>
                </div>
                <button onclick="removeAlert()" style="
                    background: rgba(255,255,255,0.25);
                    border: 2px solid rgba(255,255,255,0.15);
                    color: ${alertStyle.color};
                    font-size: 1.1rem;
                    cursor: pointer;
                    opacity: 0.8;
                    transition: all 0.3s ease;
                    padding: 8px;
                    border-radius: 12px;
                    width: 32px;
                    height: 32px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-shrink: 0;
                " onmouseover="this.style.opacity='1'; this.style.background='rgba(255,255,255,0.4)'" onmouseout="this.style.opacity='0.8'; this.style.background='rgba(255,255,255,0.25)'">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            ${type === 'loading' ? `
                <div style="
                    margin-top: 16px;
                    height: 4px;
                    background: rgba(33, 150, 243, 0.2);
                    border-radius: 2px;
                    overflow: hidden;
                ">
                    <div style="
                        height: 100%;
                        background: linear-gradient(90deg, ${alertStyle.iconColor}, rgba(33, 150, 243, 0.6));
                        border-radius: 2px;
                        animation: loadingProgress 2s infinite ease-in-out;
                    "></div>
                </div>
            ` : ''}
        </div>
        
        <style>
        @keyframes slideInRight {
            0% {
                transform: translateX(100%) scale(0.9);
                opacity: 0;
            }
            100% {
                transform: translateX(0) scale(1);
                opacity: 1;
            }
        }
        
        @keyframes slideOutRight {
            0% {
                transform: translateX(0) scale(1);
                opacity: 1;
            }
            100% {
                transform: translateX(100%) scale(0.9);
                opacity: 0;
            }
        }
        
        @keyframes loadingProgress {
            0% { width: 0%; }
            50% { width: 100%; }
            100% { width: 0%; }
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.6; }
        }
        
        .modern-alert .fa-spin {
            animation: pulse 1.5s infinite ease-in-out;
        }
        </style>
    `;
    
    document.body.insertAdjacentHTML('beforeend', alertHtml);
    
    if (duration > 0) {
        setTimeout(() => {
            const alert = document.getElementById('modernAlert');
            if (alert) {
                alert.style.animation = 'slideOutRight 0.5s cubic-bezier(0.4, 0, 0.2, 1)';
                setTimeout(() => {
                    alert.remove();
                }, 500);
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

// Refresh data function
function refreshData() {
    showModernAlert('loading', 'Memuat Ulang Data...', 'Mengambil data artikel terbaru dari server.', 'fas fa-spinner fa-spin', 0);
    
    setTimeout(() => {
        window.location.reload();
    }, 1200);
}

// Reset filters function
function resetFilters() {
    showModernAlert('info', 'Reset Filter', 'Mengembalikan semua filter ke pengaturan default.', 'fas fa-undo', 2000);
    
    setTimeout(() => {
        window.location.href = '{{ route("admin.articles.index") }}';
    }, 800);
}

// Add button loading states
const style = document.createElement('style');
style.textContent = `
.btn-loading {
    position: relative;
    color: transparent !important;
    pointer-events: none;
}

.btn-loading::after {
    content: '';
    position: absolute;
    width: 16px;
    height: 16px;
    top: 50%;
    left: 50%;
    margin-left: -8px;
    margin-top: -8px;
    border: 2px solid transparent;
    border-top-color: #ffffff;
    border-radius: 50%;
    animation: buttonSpin 0.8s linear infinite;
}

@keyframes buttonSpin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.ripple {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.4);
    animation: ripple-animation 0.6s ease-out;
    pointer-events: none;
}

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

@keyframes slideOutUp {
    0% {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
    100% {
        opacity: 0;
        transform: translateY(-30px) scale(0.95);
    }
}
`;
document.head.appendChild(style);
</script>

<!-- Loading Overlay -->
<div id="loadingOverlay" class="loading-overlay">
    <div class="loading-content">
        <div class="loading-spinner"></div>
        <div class="loading-text">Menghapus Artikel...</div>
        <div class="loading-subtext">Mohon tunggu sebentar</div>
    </div>
</div>

@endsection
