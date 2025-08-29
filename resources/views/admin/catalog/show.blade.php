@extends('admin.components.layout')

@section('title', $title)

@push('styles')
<style>
.catalog-show {
    padding: 12px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    min-height: 100vh;
}

.premium-card {
    background: white;
    border: 1px solid rgba(139, 0, 0, 0.1);
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(139, 0, 0, 0.1);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    margin-bottom: 16px;
    position: relative;
    overflow: hidden;
}

.premium-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #8b0000, #a50000, #c50000);
}

.premium-card:hover {
    transform: translateY(-3px) scale(1.01);
    box-shadow: 0 12px 40px rgba(139, 0, 0, 0.25);
    border-color: rgba(139, 0, 0, 0.25);
}

.page-header {
    background: linear-gradient(135deg, #8b0000, #a50000, #c50000);
    color: white;
    padding: 20px;
    border-radius: 16px;
    margin-bottom: 20px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 8px 32px rgba(139, 0, 0, 0.25);
    backdrop-filter: blur(10px);
}

.page-header::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.15) 0%, transparent 70%);
    animation: shimmer 4s infinite linear;
}

.page-header::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.1) 50%, transparent 70%);
    animation: shine 3s infinite;
}

@keyframes shimmer {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

@keyframes shine {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 12px;
    position: relative;
    z-index: 2;
}

.page-title {
    font-size: 1.2rem;
    font-weight: 700;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.page-subtitle {
    margin: 4px 0 0 0;
    opacity: 0.9;
    font-size: 0.7rem;
    font-weight: 500;
}

.header-actions {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.premium-btn {
    background: linear-gradient(135deg, #8b0000, #a50000);
    border: none;
    color: white;
    padding: 6px 12px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.7rem;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    box-shadow: 0 3px 12px rgba(139, 0, 0, 0.25);
    position: relative;
    overflow: hidden;
    cursor: pointer;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.premium-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.6s;
}

.premium-btn:hover::before {
    left: 100%;
}

.premium-btn:hover {
    background: linear-gradient(135deg, #a50000, #c50000);
    transform: translateY(-2px) scale(1.02);
    box-shadow: 0 6px 20px rgba(139, 0, 0, 0.4);
    color: white;
    text-decoration: none;
}

.premium-btn:active {
    transform: translateY(0) scale(0.98);
}

.premium-btn-outline {
    background: white;
    border: 2px solid rgba(139, 0, 0, 0.4);
    color: #8b0000;
    box-shadow: 0 3px 12px rgba(139, 0, 0, 0.15);
}

.premium-btn-outline:hover {
    background: rgba(139, 0, 0, 0.1);
    border-color: #8b0000;
    color: #8b0000;
    transform: translateY(-2px) scale(1.02);
}

.premium-btn-sm {
    padding: 4px 8px;
    font-size: 0.65rem;
    border-radius: 6px;
    gap: 3px;
}

.detail-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(139, 0, 0, 0.1);
    margin-bottom: 16px;
    border: 1px solid rgba(139, 0, 0, 0.1);
    transition: all 0.3s ease;
    position: relative;
}

.detail-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #8b0000, #a50000, #c50000);
}

.detail-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 30px rgba(139, 0, 0, 0.2);
}

.card-header {
    background: linear-gradient(135deg, rgba(139, 0, 0, 0.05), rgba(165, 0, 0, 0.05));
    padding: 12px 16px;
    border-bottom: 1px solid rgba(139, 0, 0, 0.1);
    position: relative;
}

.card-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 16px;
    width: 40px;
    height: 2px;
    background: linear-gradient(90deg, #8b0000, #a50000);
}

.card-header h3 {
    font-size: 0.85rem;
    font-weight: 700;
    color: #8b0000;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 6px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.card-content {
    padding: 16px;
}

.info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
    align-items: start;
}

.info-item {
    display: flex;
    flex-direction: column;
    gap: 2px;
    padding: 8px;
    border-radius: 6px;
    background: rgba(139, 0, 0, 0.02);
    border-left: 3px solid rgba(139, 0, 0, 0.2);
    transition: all 0.3s ease;
}

.info-item:hover {
    background: rgba(139, 0, 0, 0.05);
    border-left-color: #8b0000;
    transform: translateX(3px);
}

.info-item.full-width {
    grid-column: 1 / -1;
}

.info-item label {
    font-weight: 600;
    color: #8b0000;
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.info-item span {
    color: #666;
    font-size: 0.75rem;
    font-weight: 500;
}

.description-content {
    background: rgba(139, 0, 0, 0.03);
    padding: 10px;
    border-radius: 6px;
    line-height: 1.4;
    color: #333;
    font-size: 0.75rem;
    border-left: 3px solid #8b0000;
    position: relative;
    overflow: hidden;
}

.description-content::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(139, 0, 0, 0.1), transparent);
    transition: left 0.5s;
}

.description-content:hover::before {
    left: 100%;
}

.images-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 12px;
}

.image-item {
    border: 1px solid rgba(139, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
    transition: all 0.3s ease;
    background: white;
    position: relative;
}

.image-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(139, 0, 0, 0.1), transparent);
    transition: left 0.5s;
    z-index: 1;
}

.image-item:hover::before {
    left: 100%;
}

.image-item:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 8px 25px rgba(139, 0, 0, 0.2);
    border-color: rgba(139, 0, 0, 0.3);
}

.image-container {
    position: relative;
    height: 140px;
    overflow: hidden;
}

.image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.image-container:hover img {
    transform: scale(1.05);
}

.primary-badge {
    position: absolute;
    top: 6px;
    right: 6px;
    background: linear-gradient(135deg, #8b0000, #a50000);
    color: white;
    padding: 3px 6px;
    border-radius: 4px;
    font-size: 0.65rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 3px;
    box-shadow: 0 2px 8px rgba(139, 0, 0, 0.3);
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
    z-index: 2;
}

.image-info {
    padding: 10px;
    background: rgba(139, 0, 0, 0.02);
}

.image-meta {
    margin-bottom: 5px;
    font-size: 0.7rem;
    color: #666;
    font-weight: 500;
}

.image-actions {
    display: flex;
    gap: 5px;
    margin-top: 8px;
    flex-wrap: wrap;
}

.files-list {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.file-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px;
    border: 1px solid rgba(139, 0, 0, 0.1);
    border-radius: 8px;
    transition: all 0.3s ease;
    background: white;
    position: relative;
    overflow: hidden;
}

.file-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(139, 0, 0, 0.05), transparent);
    transition: left 0.5s;
}

.file-item:hover::before {
    left: 100%;
}

.file-item:hover {
    background: rgba(139, 0, 0, 0.02);
    border-color: rgba(139, 0, 0, 0.2);
    transform: translateX(3px);
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.1);
}

.file-icon {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, rgba(139, 0, 0, 0.1), rgba(165, 0, 0, 0.1));
    border-radius: 6px;
    font-size: 1.1rem;
    color: #8b0000;
}

.file-info {
    flex: 1;
}

.file-name {
    font-weight: 600;
    color: #333;
    margin-bottom: 2px;
    font-size: 0.75rem;
}

.file-meta {
    display: flex;
    flex-direction: column;
    gap: 1px;
    font-size: 0.65rem;
    color: #666;
    font-weight: 500;
}

.file-actions {
    display: flex;
    gap: 5px;
}

.empty-state {
    text-align: center;
    padding: 20px 12px;
    color: #999;
    background: rgba(139, 0, 0, 0.03);
    border-radius: 8px;
    border: 2px dashed rgba(139, 0, 0, 0.2);
}

.empty-state i {
    font-size: 2rem;
    margin-bottom: 8px;
    color: rgba(139, 0, 0, 0.4);
}

.empty-state p {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 500;
}

.code {
    font-family: 'Monaco', 'Menlo', monospace;
    background: rgba(139, 0, 0, 0.1);
    padding: 2px 5px;
    border-radius: 3px;
    font-size: 0.7rem;
    color: #8b0000;
    font-weight: 600;
    border: 1px solid rgba(139, 0, 0, 0.2);
}

/* Main Layout */
.main-content-grid {
    display: grid;
    grid-template-columns: 1fr 1.2fr;
    gap: 20px;
    align-items: start;
}

.left-column {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.right-column {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

/* Enhanced Info Card */
.info-card .info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 8px;
    margin-bottom: 12px;
}

.description-section {
    margin-top: 12px;
    padding-top: 12px;
    border-top: 1px solid rgba(139, 0, 0, 0.1);
}

.description-label {
    font-weight: 600;
    color: #8b0000;
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    margin-bottom: 6px;
    display: block;
}

/* Enhanced SEO Card */
.seo-card .seo-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 8px;
}

.seo-item {
    display: flex;
    flex-direction: column;
    gap: 2px;
    padding: 6px;
    border-radius: 4px;
    background: rgba(139, 0, 0, 0.02);
    border-left: 2px solid rgba(139, 0, 0, 0.2);
    transition: all 0.3s ease;
}

.seo-item:hover {
    background: rgba(139, 0, 0, 0.05);
    border-left-color: #8b0000;
    transform: translateX(2px);
}

.seo-item.full-width {
    grid-column: 1 / -1;
}

.seo-item label {
    font-weight: 600;
    color: #8b0000;
    font-size: 0.65rem;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.seo-item span {
    color: #666;
    font-size: 0.7rem;
    font-weight: 500;
}

/* Count Badge */
.count-badge {
    background: linear-gradient(135deg, #8b0000, #a50000);
    color: white;
    padding: 2px 6px;
    border-radius: 10px;
    font-size: 0.6rem;
    font-weight: 600;
    margin-left: 6px;
    box-shadow: 0 2px 4px rgba(139, 0, 0, 0.3);
}

/* Images Showcase */
.images-showcase {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
    gap: 12px;
}

.images-showcase .image-item {
    border: 1px solid rgba(139, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
    transition: all 0.3s ease;
    background: white;
    position: relative;
}

.images-showcase .image-item:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 12px 30px rgba(139, 0, 0, 0.25);
    border-color: rgba(139, 0, 0, 0.3);
}

.images-showcase .image-container {
    position: relative;
    height: 120px;
    overflow: hidden;
}

.images-showcase .image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.images-showcase .image-container:hover img {
    transform: scale(1.1);
}

/* Image Overlay */
.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(139, 0, 0, 0.85), rgba(165, 0, 0, 0.85));
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    visibility: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    backdrop-filter: blur(3px);
    z-index: 3;
}

.image-container:hover .image-overlay {
    opacity: 1;
    visibility: visible;
}

.overlay-actions {
    display: flex;
    gap: 10px;
    align-items: center;
    justify-content: center;
}

.overlay-btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: white;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
}

.overlay-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.6s;
}

.overlay-btn:hover::before {
    left: 100%;
}

.view-btn {
    background: rgba(255, 255, 255, 0.25);
    backdrop-filter: blur(15px);
    border-color: rgba(255, 255, 255, 0.4);
}

.view-btn:hover {
    background: rgba(255, 255, 255, 0.35);
    transform: scale(1.15);
    border-color: rgba(255, 255, 255, 0.6);
    box-shadow: 0 6px 20px rgba(255, 255, 255, 0.2);
}

.star-btn {
    background: linear-gradient(135deg, #fbbf24, #f59e0b);
    border-color: rgba(251, 191, 36, 0.4);
}

.star-btn:hover {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    transform: scale(1.15);
    box-shadow: 0 6px 20px rgba(251, 191, 36, 0.5);
    border-color: rgba(251, 191, 36, 0.6);
}

.star-btn.is-primary {
    background: linear-gradient(135deg, #10b981, #059669);
    border-color: rgba(16, 185, 129, 0.4);
    cursor: not-allowed;
    opacity: 0.9;
}

.star-btn.is-primary:hover {
    background: linear-gradient(135deg, #10b981, #059669);
    transform: none;
    box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
    border-color: rgba(16, 185, 129, 0.4);
}

.star-btn[disabled] {
    pointer-events: none;
    cursor: not-allowed;
}

.star-btn[disabled]:hover {
    transform: none;
}

.delete-btn {
    background: linear-gradient(135deg, #dc2626, #b91c1c);
    border-color: rgba(220, 38, 38, 0.4);
}

.delete-btn:hover {
    background: linear-gradient(135deg, #b91c1c, #991b1b);
    transform: scale(1.15);
    box-shadow: 0 6px 20px rgba(220, 38, 38, 0.5);
    border-color: rgba(220, 38, 38, 0.6);
}

/* Loading state for buttons */
.overlay-btn.loading {
    pointer-events: none;
    animation: spin 1s linear infinite;
    background: linear-gradient(135deg, rgba(139, 0, 0, 0.8), rgba(165, 0, 0, 0.8)) !important;
    border-color: rgba(139, 0, 0, 0.6) !important;
}

.overlay-btn.loading::after {
    content: '';
    position: absolute;
    width: 16px;
    height: 16px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-top: 2px solid white;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

.overlay-btn.loading i {
    display: none;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Success state animation */
.overlay-btn.success {
    background: linear-gradient(135deg, #10b981, #059669) !important;
    border-color: rgba(16, 185, 129, 0.6) !important;
    animation: successPulse 0.6s ease-out;
    pointer-events: none;
}

@keyframes successPulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.2); }
    100% { transform: scale(1); }
}

/* Enhanced Loading Pulse */
.overlay-btn.loading {
    animation: spin 1s linear infinite, loadingPulse 1.5s ease-in-out infinite;
}

@keyframes loadingPulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.7; }
}

/* Premium Button Loading States */
.premium-btn.loading {
    pointer-events: none;
    background: linear-gradient(135deg, rgba(139, 0, 0, 0.7), rgba(165, 0, 0, 0.7)) !important;
    animation: loadingPulse 1.5s ease-in-out infinite;
}

.premium-btn.loading i {
    animation: spin 1s linear infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.05); opacity: 0.9; }
}

.primary-badge {
    animation: pulse 2s infinite;
}

/* Enhanced Primary Badge */
.primary-badge {
    position: absolute;
    top: 6px;
    right: 6px;
    background: linear-gradient(135deg, #fbbf24, #f59e0b);
    color: white;
    padding: 3px 6px;
    border-radius: 6px;
    font-size: 0.6rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 3px;
    box-shadow: 0 2px 8px rgba(251, 191, 36, 0.4);
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
    z-index: 2;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

/* Image Info */
.images-showcase .image-info {
    padding: 8px;
    background: rgba(139, 0, 0, 0.02);
}

.image-title {
    font-weight: 600;
    color: #333;
    font-size: 0.7rem;
    margin-bottom: 2px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.image-slug {
    font-size: 0.6rem;
    color: #8b0000;
    font-family: 'Monaco', 'Menlo', monospace;
    background: rgba(139, 0, 0, 0.1);
    padding: 1px 4px;
    border-radius: 3px;
    display: inline-block;
}

/* Files Showcase */
.files-showcase {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.files-showcase .file-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px;
    border: 1px solid rgba(139, 0, 0, 0.1);
    border-radius: 8px;
    transition: all 0.3s ease;
    background: white;
    position: relative;
    overflow: hidden;
}

.files-showcase .file-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(139, 0, 0, 0.05), transparent);
    transition: left 0.5s;
}

.files-showcase .file-item:hover::before {
    left: 100%;
}

.files-showcase .file-item:hover {
    background: rgba(139, 0, 0, 0.02);
    border-color: rgba(139, 0, 0, 0.2);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(139, 0, 0, 0.15);
}

.file-icon-container {
    position: relative;
}

.files-showcase .file-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, rgba(139, 0, 0, 0.1), rgba(165, 0, 0, 0.1));
    border-radius: 8px;
    font-size: 1.2rem;
    color: #8b0000;
    box-shadow: 0 2px 8px rgba(139, 0, 0, 0.1);
}

.file-details {
    flex: 1;
}

.files-showcase .file-name {
    font-weight: 600;
    color: #333;
    margin-bottom: 3px;
    font-size: 0.75rem;
}

.files-showcase .file-meta {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.file-slug {
    font-size: 0.6rem;
    color: #8b0000;
    font-family: 'Monaco', 'Menlo', monospace;
    background: rgba(139, 0, 0, 0.1);
    padding: 1px 4px;
    border-radius: 3px;
    display: inline-block;
    width: fit-content;
}

.file-title {
    font-size: 0.65rem;
    color: #666;
    font-style: italic;
}

.files-showcase .file-actions {
    display: flex;
    gap: 5px;
    align-items: center;
}

.delete-file-btn {
    background: linear-gradient(135deg, #dc2626, #b91c1c) !important;
}

.delete-file-btn:hover {
    background: linear-gradient(135deg, #b91c1c, #991b1b) !important;
}

/* Enhanced Empty State */
.empty-state {
    text-align: center;
    padding: 30px 15px;
    color: #999;
    background: linear-gradient(135deg, rgba(139, 0, 0, 0.03), rgba(165, 0, 0, 0.03));
    border-radius: 12px;
    border: 2px dashed rgba(139, 0, 0, 0.2);
    position: relative;
    overflow: hidden;
}

.empty-state::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(139, 0, 0, 0.05) 0%, transparent 70%);
    animation: pulse 3s infinite;
}

.empty-state i {
    font-size: 2.5rem;
    margin-bottom: 10px;
    color: rgba(139, 0, 0, 0.4);
    position: relative;
    z-index: 1;
}

.empty-state p {
    margin: 0 0 5px 0;
    font-size: 0.85rem;
    font-weight: 600;
    position: relative;
    z-index: 1;
}

.empty-state small {
    font-size: 0.7rem;
    color: #666;
    position: relative;
    z-index: 1;
}

@media (max-width: 1024px) {
    .main-content-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }
    
    .images-showcase {
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 10px;
    }
    
    .images-showcase .image-container {
        height: 100px;
    }
}

@media (max-width: 768px) {
    .info-card .info-grid {
        grid-template-columns: 1fr;
        gap: 6px;
    }
    
    .images-showcase {
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        gap: 8px;
    }
    
    .images-showcase .image-container {
        height: 80px;
    }
    
    .overlay-btn {
        width: 30px;
        height: 30px;
        font-size: 0.7rem;
    }
    
    .files-showcase .file-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
        padding: 8px;
    }
    
    .files-showcase .file-actions {
        width: 100%;
        justify-content: flex-end;
        gap: 4px;
    }
    
    .empty-state {
        padding: 20px 10px;
    }
    
    .empty-state i {
        font-size: 2rem;
    }
    
    .empty-state p {
        font-size: 0.8rem;
    }
    
    .empty-state small {
        font-size: 0.65rem;
    }
}
.image-modal {
    display: none;
    position: fixed;
    z-index: 10000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.95);
    backdrop-filter: blur(8px);
    animation: fadeIn 0.3s ease-out;
}

.modal-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    max-width: 90vw;
    max-height: 90vh;
    width: auto;
    height: auto;
    border-radius: 12px;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
    animation: modalZoom 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: 2px solid rgba(255, 255, 255, 0.1);
}

.modal-close {
    position: absolute;
    top: -15px;
    right: -15px;
    background: linear-gradient(135deg, #8b0000, #a50000);
    color: white;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    font-size: 18px;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    border: 2px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.4);
    z-index: 10001;
}

.modal-close:hover {
    background: linear-gradient(135deg, #a50000, #c50000);
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(139, 0, 0, 0.6);
}

#caption {
    position: absolute;
    bottom: -50px;
    left: 0;
    right: 0;
    text-align: center;
    color: white;
    font-size: 0.9rem;
    font-weight: 500;
    background: linear-gradient(135deg, rgba(139, 0, 0, 0.8), rgba(165, 0, 0, 0.8));
    padding: 12px 20px;
    border-radius: 8px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes modalZoom {
    from {
        transform: translate(-50%, -50%) scale(0.3);
        opacity: 0;
    }
    to {
        transform: translate(-50%, -50%) scale(1);
        opacity: 1;
    }
}

/* Loading Animation */
.card-loading {
    position: relative;
    overflow: hidden;
}

.card-loading::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(139, 0, 0, 0.1), transparent);
    animation: loading 1.5s infinite;
}

@keyframes loading {
    0% { left: -100%; }
    100% { left: 100%; }
}

/* Floating Animation */
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-3px); }
}

.premium-btn:hover i {
    animation: float 1.5s ease-in-out infinite;
}

@media (max-width: 768px) {
    .catalog-show {
        padding: 8px;
    }
    
    .page-header {
        padding: 16px;
        margin-bottom: 16px;
    }
    
    .page-title {
        font-size: 1.1rem;
    }
    
    .page-subtitle {
        font-size: 0.65rem;
    }
    
    .header-content {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }
    
    .header-actions {
        gap: 6px;
    }
    
    .card-header {
        padding: 10px 12px;
    }
    
    .card-header h3 {
        font-size: 0.8rem;
    }
    
    .card-content {
        padding: 12px;
    }
    
    .info-grid {
        grid-template-columns: 1fr;
        gap: 8px;
    }
    
    .info-item {
        padding: 6px;
    }
    
    .info-item label {
        font-size: 0.65rem;
    }
    
    .info-item span {
        font-size: 0.7rem;
    }
    
    .description-content {
        padding: 8px;
        font-size: 0.7rem;
    }
    
    .images-grid {
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 10px;
    }
    
    .image-container {
        height: 120px;
    }
    
    .image-info {
        padding: 8px;
    }
    
    .image-meta {
        font-size: 0.65rem;
    }
    
    .file-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
        padding: 8px;
    }
    
    .file-icon {
        width: 32px;
        height: 32px;
        font-size: 1rem;
    }
    
    .file-name {
        font-size: 0.7rem;
    }
    
    .file-meta {
        font-size: 0.6rem;
    }
    
    .file-actions {
        width: 100%;
        justify-content: flex-end;
        gap: 4px;
    }
    
    .empty-state {
        padding: 16px 10px;
    }
    
    .empty-state i {
        font-size: 1.8rem;
        margin-bottom: 6px;
    }
    
    .empty-state p {
        font-size: 0.75rem;
    }
    
    .premium-btn {
        font-size: 0.65rem;
        padding: 5px 10px;
    }
    
    .premium-btn-sm {
        font-size: 0.6rem;
        padding: 3px 6px;
    }
    
    .code {
        font-size: 0.65rem;
        padding: 1px 4px;
    }
    
    .modal-content {
        max-width: 95vw;
        max-height: 85vh;
    }
    
    .modal-close {
        top: -10px;
        right: -10px;
        width: 35px;
        height: 35px;
        font-size: 16px;
    }
    
    #caption {
        bottom: -45px;
        font-size: 0.8rem;
        padding: 10px 15px;
    }
}

/* Premium Button Icons */
.premium-btn i {
    transition: transform 0.3s ease;
}

.premium-btn:hover i {
    transform: scale(1.2);
}

/* Pulse Effect for Primary Badges */
/* Enhanced Custom Modal & Alert System */
.custom-modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    backdrop-filter: blur(8px);
    z-index: 10000;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.custom-modal-overlay.show {
    opacity: 1;
    visibility: visible;
}

.custom-modal-overlay.hide {
    opacity: 0;
    visibility: hidden;
}

.confirm-modal {
    background: white;
    border-radius: 16px;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
    max-width: 480px;
    width: 90%;
    transform: scale(0.7) translateY(50px);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
    border: 1px solid rgba(139, 0, 0, 0.1);
}

.confirm-modal.show {
    transform: scale(1) translateY(0);
}

.modal-header {
    padding: 24px 24px 16px 24px;
    text-align: center;
    position: relative;
    background: linear-gradient(135deg, #fef2f2, #fee2e2);
}

.modal-icon {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 16px auto;
    font-size: 1.8rem;
    color: white;
    background: linear-gradient(135deg, #dc2626, #b91c1c);
    box-shadow: 0 8px 25px rgba(220, 38, 38, 0.3);
    animation: dangerPulse 2s infinite;
}

@keyframes dangerPulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

.modal-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #1f2937;
    margin: 0;
    text-align: center;
}

.modal-close-btn {
    position: absolute;
    top: 16px;
    right: 16px;
    width: 32px;
    height: 32px;
    border: none;
    background: rgba(139, 0, 0, 0.1);
    color: #8b0000;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
    font-size: 0.8rem;
}

.modal-close-btn:hover {
    background: rgba(139, 0, 0, 0.2);
    transform: scale(1.1);
}

.modal-body {
    padding: 0 24px 24px 24px;
    text-align: center;
}

.modal-message {
    color: #6b7280;
    font-size: 0.9rem;
    line-height: 1.5;
    margin: 0;
}

.modal-footer {
    padding: 16px 24px 24px 24px;
    display: flex;
    gap: 12px;
    justify-content: center;
}

.modal-btn {
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.85rem;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 6px;
    transition: all 0.3s ease;
    min-width: 100px;
    justify-content: center;
}

.cancel-btn {
    background: #f3f4f6;
    color: #6b7280;
    border: 1px solid #d1d5db;
}

.cancel-btn:hover {
    background: #e5e7eb;
    color: #4b5563;
    transform: translateY(-1px);
}

.modal-btn.delete-btn {
    background: linear-gradient(135deg, #dc2626, #b91c1c);
    color: white;
    box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
}

.modal-btn.delete-btn:hover {
    background: linear-gradient(135deg, #b91c1c, #991b1b);
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(220, 38, 38, 0.4);
}

/* Progress Alert */
.progress-alert {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    border-radius: 12px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    padding: 24px;
    z-index: 10001;
    min-width: 320px;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid rgba(139, 0, 0, 0.1);
}

.progress-alert.show {
    opacity: 1;
    visibility: visible;
}

.progress-alert.hide {
    opacity: 0;
    visibility: hidden;
    transform: translate(-50%, -50%) scale(0.9);
}

.progress-content {
    display: flex;
    align-items: center;
    gap: 16px;
}

.progress-spinner {
    width: 40px;
    height: 40px;
    position: relative;
}

.spinner {
    width: 100%;
    height: 100%;
    border: 3px solid rgba(139, 0, 0, 0.1);
    border-top: 3px solid #8b0000;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

.progress-text {
    flex: 1;
}

.progress-title {
    font-weight: 600;
    color: #1f2937;
    font-size: 0.9rem;
    display: block;
    margin-bottom: 8px;
}

.progress-bar {
    width: 100%;
    height: 4px;
    background: rgba(139, 0, 0, 0.1);
    border-radius: 2px;
    overflow: hidden;
}

.progress-fill {
    height: 100%;
    background: linear-gradient(90deg, #8b0000, #a50000);
    width: 0%;
    animation: progressFill 2s ease-in-out infinite;
    border-radius: 2px;
}

@keyframes progressFill {
    0% { width: 0%; }
    50% { width: 70%; }
    100% { width: 100%; }
}

/* Result Alert */
.result-alert {
    position: fixed;
    top: 20px;
    right: 20px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    padding: 20px;
    z-index: 10001;
    max-width: 400px;
    width: 90%;
    opacity: 0;
    visibility: hidden;
    transform: translateX(100%);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border-left: 4px solid;
}

.result-alert.success {
    border-left-color: #10b981;
}

.result-alert.error {
    border-left-color: #dc2626;
}

.result-alert.show {
    opacity: 1;
    visibility: visible;
    transform: translateX(0);
}

.result-alert.hide {
    opacity: 0;
    visibility: hidden;
    transform: translateX(100%);
}

.result-content {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    position: relative;
}

.result-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    color: white;
    flex-shrink: 0;
}

.result-alert.success .result-icon {
    background: linear-gradient(135deg, #10b981, #059669);
}

.result-alert.error .result-icon {
    background: linear-gradient(135deg, #dc2626, #b91c1c);
}

.result-text {
    flex: 1;
    min-width: 0;
}

.result-title {
    font-size: 0.9rem;
    font-weight: 700;
    color: #1f2937;
    margin: 0 0 4px 0;
}

.result-message {
    font-size: 0.8rem;
    color: #6b7280;
    margin: 0;
    line-height: 1.4;
}

.result-close {
    position: absolute;
    top: -4px;
    right: -4px;
    width: 24px;
    height: 24px;
    border: none;
    background: rgba(107, 114, 128, 0.1);
    color: #6b7280;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.7rem;
    transition: all 0.2s ease;
}

.result-close:hover {
    background: rgba(107, 114, 128, 0.2);
    transform: scale(1.1);
}

/* Delete Success Animation */
@keyframes deleteSuccess {
    0% {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
    50% {
        transform: scale(0.95) translateY(-5px);
        opacity: 0.7;
    }
    100% {
        opacity: 0;
        transform: scale(0.8) translateY(-15px);
    }
}

@media (max-width: 768px) {
    .confirm-modal {
        max-width: 95%;
        margin: 20px;
    }
    
    .modal-header {
        padding: 20px 20px 12px 20px;
    }
    
    .modal-body {
        padding: 0 20px 20px 20px;
    }
    
    .modal-footer {
        padding: 12px 20px 20px 20px;
        flex-direction: column;
    }
    
    .modal-btn {
        min-width: auto;
        width: 100%;
    }
    
    .progress-alert {
        min-width: 280px;
        margin: 20px;
    }
    
    .result-alert {
        top: 10px;
        right: 10px;
        left: 10px;
        width: auto;
        max-width: none;
    }
}
</style>
@endpush

@section('content')
<div class="catalog-show">
    <!-- Header Section -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-info">
                <h1 class="page-title">
                    <i class="fas fa-eye"></i>
                    {{ $catalog->name }}
                </h1>
                <p class="page-subtitle">Detail lengkap item katalog</p>
            </div>
            <div class="header-actions">
                <a href="{{ route('admin.catalog.index') }}" class="premium-btn premium-btn-outline">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>
                <a href="{{ route('admin.catalog.edit', $catalog) }}" class="premium-btn">
                    <i class="fas fa-edit"></i>
                    Edit
                </a>
            </div>
        </div>
    </div>

    <div class="catalog-details">
        <!-- Main Content Grid -->
        <div class="main-content-grid">
            <!-- Left Column -->
            <div class="left-column">
                <!-- Basic Information -->
                <div class="detail-card info-card">
                    <div class="card-header">
                        <h3><i class="fas fa-info-circle"></i> Informasi Dasar</h3>
                    </div>
                    <div class="card-content">
                        <div class="info-grid">
                            <div class="info-item">
                                <label>Nama Item:</label>
                                <span>{{ $catalog->name }}</span>
                            </div>
                            <div class="info-item">
                                <label>Slug:</label>
                                <span class="code">{{ $catalog->slug }}</span>
                            </div>
                            <div class="info-item">
                                <label>Dibuat:</label>
                                <span>{{ $catalog->created_at->format('d M Y, H:i') }}</span>
                            </div>
                            <div class="info-item">
                                <label>Diperbarui:</label>
                                <span>{{ $catalog->updated_at->format('d M Y, H:i') }}</span>
                            </div>
                        </div>
                        <div class="description-section">
                            <label class="description-label">Deskripsi:</label>
                            <div class="description-content">{{ $catalog->description }}</div>
                        </div>
                    </div>
                </div>

                <!-- SEO Information -->
                <div class="detail-card seo-card">
                    <div class="card-header">
                        <h3><i class="fas fa-search"></i> Informasi SEO</h3>
                    </div>
                    <div class="card-content">
                        <div class="seo-grid">
                            <div class="seo-item">
                                <label>Meta Title:</label>
                                <span>{{ $catalog->meta_title ?: 'Tidak diset' }}</span>
                            </div>
                            <div class="seo-item">
                                <label>Meta Keywords:</label>
                                <span>{{ $catalog->meta_keywords ?: 'Tidak diset' }}</span>
                            </div>
                            <div class="seo-item full-width">
                                <label>Meta Description:</label>
                                <span>{{ $catalog->meta_description ?: 'Tidak diset' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="right-column">
                <!-- Images Section -->
                <div class="detail-card media-card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-images"></i> 
                            Galeri Gambar
                            <span class="count-badge">{{ $catalog->images->count() }}</span>
                        </h3>
                    </div>
                    <div class="card-content">
                        @if($catalog->images->count() > 0)
                            <div class="images-showcase">
                                @foreach($catalog->images as $catalogImage)
                                    <div class="image-item" id="image-{{ $catalogImage->id }}">
                                        <div class="image-container">
                                            <img src="{{ asset($catalogImage->image_url) }}" 
                                                 alt="{{ $catalogImage->alt_text }}" 
                                                 onclick="openImageModal('{{ asset($catalogImage->image_url) }}', '{{ $catalogImage->alt_text }}')">
                                            @if($catalogImage->is_primary)
                                                <div class="primary-badge">
                                                    <i class="fas fa-crown"></i>
                                                    Utama
                                                </div>
                                            @endif
                                            <div class="image-overlay">
                                                <div class="overlay-actions">
                                                    <button onclick="openImageModal('{{ asset($catalogImage->image_url) }}', '{{ $catalogImage->alt_text }}')" 
                                                            class="overlay-btn view-btn"
                                                            title="Lihat Gambar">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button onclick="setPrimaryImage({{ $catalogImage->id }})" 
                                                            class="overlay-btn star-btn {{ $catalogImage->is_primary ? 'is-primary' : '' }}" 
                                                            id="star-btn-{{ $catalogImage->id }}"
                                                            title="{{ $catalogImage->is_primary ? 'Gambar Utama' : 'Jadikan Gambar Utama' }}"
                                                            {{ $catalogImage->is_primary ? 'disabled' : '' }}>
                                                        <i class="fas {{ $catalogImage->is_primary ? 'fa-crown' : 'fa-star' }}"></i>
                                                    </button>
                                                    <button onclick="deleteImage({{ $catalogImage->id }})" 
                                                            class="overlay-btn delete-btn"
                                                            title="Hapus Gambar">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="image-info">
                                            <div class="image-title">{{ $catalogImage->alt_text }}</div>
                                            <div class="image-slug">{{ $catalogImage->slug }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="empty-state">
                                <i class="fas fa-camera"></i>
                                <p>Belum ada gambar untuk item ini</p>
                                <small>Upload gambar untuk membuat katalog lebih menarik</small>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Files Section -->
                <div class="detail-card files-card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-folder-open"></i> 
                            File Pendukung
                            <span class="count-badge">{{ $catalog->files->count() }}</span>
                        </h3>
                    </div>
                    <div class="card-content">
                        @if($catalog->files->count() > 0)
                            <div class="files-showcase">
                                @foreach($catalog->files as $file)
                                    <div class="file-item" id="file-{{ $file->id }}">
                                        <div class="file-icon-container">
                                            <div class="file-icon">
                                                {!! getFileIcon(pathinfo($file->file_url, PATHINFO_EXTENSION)) !!}
                                            </div>
                                        </div>
                                        <div class="file-details">
                                            <div class="file-name">{{ basename($file->file_url) }}</div>
                                            <div class="file-meta">
                                                <div class="file-slug">{{ $file->slug }}</div>
                                                <div class="file-title">{{ $file->meta_title }}</div>
                                            </div>
                                        </div>
                                        <div class="file-actions">
                                            <a href="{{ asset($file->file_url) }}" 
                                               target="_blank" class="premium-btn premium-btn-sm premium-btn-outline">
                                                <i class="fas fa-download"></i>
                                                Download
                                            </a>
                                            <button onclick="deleteFile({{ $file->id }})" class="premium-btn premium-btn-sm delete-file-btn">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="empty-state">
                                <i class="fas fa-file-plus"></i>
                                <p>Belum ada file untuk item ini</p>
                                <small>Upload dokumen pendukung untuk katalog</small>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Enhanced Image Modal -->
<div id="imageModal" class="image-modal">
    <span class="modal-close" onclick="closeImageModal()">&times;</span>
    <img class="modal-content" id="modalImage">
    <div id="caption" style="text-align: center; color: white; margin-top: 10px; font-size: 0.8rem;"></div>
</div>
@endsection

@push('scripts')
<script>
// Modern Alert System with Dark Red Theme
function showAlert(message, type = 'success', duration = 3000) {
    const alertContainer = document.getElementById('alertContainer') || createAlertContainer();
    
    const alert = document.createElement('div');
    alert.className = `modern-alert alert-${type}`;
    alert.innerHTML = `
        <div class="alert-content">
            <i class="fas ${getAlertIcon(type)}"></i>
            <span>${message}</span>
        </div>
        <button class="alert-close" onclick="closeAlert(this)">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    alertContainer.appendChild(alert);
    
    // Trigger animation
    setTimeout(() => alert.classList.add('show'), 10);
    
    // Auto remove
    setTimeout(() => {
        closeAlert(alert.querySelector('.alert-close'));
    }, duration);
}

function createAlertContainer() {
    const container = document.createElement('div');
    container.id = 'alertContainer';
    container.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 10000;
        max-width: 400px;
        width: 100%;
    `;
    document.body.appendChild(container);
    
    // Add alert styles
    if (!document.getElementById('alertStyles')) {
        const style = document.createElement('style');
        style.id = 'alertStyles';
        style.textContent = `
            .modern-alert {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 12px 16px;
                margin-bottom: 10px;
                border-radius: 8px;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
                backdrop-filter: blur(10px);
                transform: translateX(400px);
                opacity: 0;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                border-left: 4px solid;
                font-size: 0.75rem;
                font-weight: 500;
                animation: slideInRight 0.4s ease-out forwards;
            }
            
            .modern-alert.show {
                transform: translateX(0);
                opacity: 1;
            }
            
            .modern-alert.hide {
                transform: translateX(400px);
                opacity: 0;
            }
            
            .alert-success {
                background: linear-gradient(135deg, rgba(16, 185, 129, 0.95), rgba(5, 150, 105, 0.95));
                color: white;
                border-left-color: #10b981;
            }
            
            .alert-error {
                background: linear-gradient(135deg, rgba(220, 38, 38, 0.95), rgba(185, 28, 28, 0.95));
                color: white;
                border-left-color: #dc2626;
            }
            
            .alert-warning {
                background: linear-gradient(135deg, rgba(245, 158, 11, 0.95), rgba(217, 119, 6, 0.95));
                color: white;
                border-left-color: #f59e0b;
            }
            
            .alert-info {
                background: linear-gradient(135deg, rgba(139, 0, 0, 0.95), rgba(165, 0, 0, 0.95));
                color: white;
                border-left-color: #8b0000;
            }
            
            .alert-content {
                display: flex;
                align-items: center;
                gap: 8px;
                flex: 1;
            }
            
            .alert-close {
                background: none;
                border: none;
                color: inherit;
                cursor: pointer;
                padding: 4px;
                border-radius: 4px;
                transition: all 0.2s ease;
                opacity: 0.8;
            }
            
            .alert-close:hover {
                opacity: 1;
                background: rgba(255, 255, 255, 0.2);
            }
            
            @keyframes slideInRight {
                from {
                    transform: translateX(400px);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
            
            @media (max-width: 768px) {
                .modern-alert {
                    font-size: 0.7rem;
                    padding: 10px 12px;
                }
            }
        `;
        document.head.appendChild(style);
    }
    
    return container;
}

function getAlertIcon(type) {
    const icons = {
        'success': 'fa-check-circle',
        'error': 'fa-exclamation-circle',
        'warning': 'fa-exclamation-triangle',
        'info': 'fa-info-circle'
    };
    return icons[type] || 'fa-info-circle';
}

// Enhanced Alert System with Premium Modals
function showDeleteConfirm(title, message, icon, onConfirm) {
    const modal = createConfirmModal(title, message, icon, onConfirm);
    document.body.appendChild(modal);
    
    // Trigger animation
    setTimeout(() => {
        modal.classList.add('show');
        modal.querySelector('.confirm-modal').classList.add('show');
    }, 10);
    
    // Prevent body scroll
    document.body.style.overflow = 'hidden';
}

function createConfirmModal(title, message, icon, onConfirm) {
    const modal = document.createElement('div');
    modal.className = 'custom-modal-overlay';
    modal.innerHTML = `
        <div class="confirm-modal">
            <div class="modal-header">
                <div class="modal-icon danger">
                    <i class="${icon}"></i>
                </div>
                <h3 class="modal-title">${title}</h3>
                <button class="modal-close-btn" onclick="closeConfirmModal(this)">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <p class="modal-message">${message}</p>
            </div>
            <div class="modal-footer">
                <button class="modal-btn cancel-btn" onclick="closeConfirmModal(this)">
                    <i class="fas fa-times"></i>
                    Batal
                </button>
                <button class="modal-btn delete-btn" onclick="confirmDelete(this)">
                    <i class="fas fa-trash"></i>
                    Hapus
                </button>
            </div>
        </div>
    `;
    
    // Store callback
    modal._onConfirm = onConfirm;
    
    return modal;
}

function closeConfirmModal(btn) {
    const modal = btn.closest('.custom-modal-overlay');
    modal.classList.add('hide');
    
    setTimeout(() => {
        if (modal.parentNode) {
            modal.parentNode.removeChild(modal);
        }
        document.body.style.overflow = 'auto';
    }, 300);
}

function confirmDelete(btn) {
    const modal = btn.closest('.custom-modal-overlay');
    const onConfirm = modal._onConfirm;
    
    closeConfirmModal(btn);
    
    if (onConfirm) {
        setTimeout(() => onConfirm(), 200);
    }
}

function showProgressAlert(message, type = 'info') {
    const existing = document.querySelector('.progress-alert');
    if (existing) {
        existing.remove();
    }
    
    const alert = document.createElement('div');
    alert.className = `progress-alert ${type}`;
    alert.innerHTML = `
        <div class="progress-content">
            <div class="progress-spinner">
                <div class="spinner"></div>
            </div>
            <div class="progress-text">
                <span class="progress-title">${message}</span>
                <div class="progress-bar">
                    <div class="progress-fill"></div>
                </div>
            </div>
        </div>
    `;
    
    document.body.appendChild(alert);
    
    setTimeout(() => alert.classList.add('show'), 10);
}

function closeProgressAlert() {
    const alert = document.querySelector('.progress-alert');
    if (alert) {
        alert.classList.add('hide');
        setTimeout(() => {
            if (alert.parentNode) {
                alert.parentNode.removeChild(alert);
            }
        }, 300);
    }
}

function showSuccessAlert(title, message) {
    showResultAlert(title, message, 'success', 'fas fa-check-circle');
}

function showErrorAlert(title, message) {
    showResultAlert(title, message, 'error', 'fas fa-exclamation-circle');
}

function showResultAlert(title, message, type, icon) {
    const alert = document.createElement('div');
    alert.className = `result-alert ${type}`;
    alert.innerHTML = `
        <div class="result-content">
            <div class="result-icon">
                <i class="${icon}"></i>
            </div>
            <div class="result-text">
                <h4 class="result-title">${title}</h4>
                <p class="result-message">${message}</p>
            </div>
            <button class="result-close" onclick="closeResultAlert(this)">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;
    
    document.body.appendChild(alert);
    
    setTimeout(() => alert.classList.add('show'), 10);
    
    // Auto remove after 4 seconds
    setTimeout(() => {
        if (alert.parentNode) {
            closeResultAlert(alert.querySelector('.result-close'));
        }
    }, 4000);
}

function closeResultAlert(btn) {
    const alert = btn.closest('.result-alert');
    alert.classList.add('hide');
    
    setTimeout(() => {
        if (alert.parentNode) {
            alert.parentNode.removeChild(alert);
        }
    }, 300);
}

// Legacy support for old alert system
function closeAlert(btn) {
    const alert = btn.closest('.modern-alert');
    if (alert) {
        alert.classList.add('hide');
        setTimeout(() => {
            if (alert.parentNode) {
                alert.parentNode.removeChild(alert);
            }
        }, 400);
    }
}

function openImageModal(src, alt) {
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImage');
    const caption = document.getElementById('caption');
    
    modal.style.display = 'block';
    modalImg.src = src;
    modalImg.alt = alt;
    caption.innerHTML = alt;
    
    // Prevent body scroll
    document.body.style.overflow = 'hidden';
}

function closeImageModal() {
    const modal = document.getElementById('imageModal');
    modal.style.display = 'none';
    
    // Restore body scroll
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside the image
document.getElementById('imageModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeImageModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeImageModal();
    }
});

function setPrimaryImage(imageId) {
    const starBtn = document.getElementById(`star-btn-${imageId}`);
    
    // Skip if already primary or button not found
    if (!starBtn || starBtn.disabled) {
        return;
    }
    
    // Add loading state
    starBtn.classList.add('loading');
    starBtn.innerHTML = '';
    starBtn.disabled = true;
    
    showAlert('Sedang mengubah gambar utama...', 'info', 0);
    
    fetch(`{{ url('admin/catalog/images') }}/${imageId}/primary`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {
        // Close loading alert
        const loadingAlert = document.querySelector('.alert-info .alert-close');
        if (loadingAlert) {
            closeAlert(loadingAlert);
        }
        
        if (data.success) {
            // Add success animation to button
            starBtn.classList.remove('loading');
            starBtn.classList.add('success');
            starBtn.innerHTML = '<i class="fas fa-check"></i>';
            
            // Update UI immediately without page reload
            setTimeout(() => {
                updatePrimaryImageUI(imageId);
                showAlert(data.message || 'Gambar utama berhasil diubah', 'success');
                
                // Add celebration effect
                const imageContainer = document.querySelector(`#image-${imageId} .image-container`);
                if (imageContainer) {
                    imageContainer.style.animation = 'primaryShine 1s ease-out';
                    setTimeout(() => {
                        imageContainer.style.animation = '';
                    }, 1000);
                }
            }, 300);
            
        } else {
            // Restore button on error
            starBtn.classList.remove('loading');
            starBtn.innerHTML = '<i class="fas fa-star"></i>';
            starBtn.disabled = false;
            showAlert(data.message || 'Gagal mengubah gambar utama', 'error');
        }
    })
    .catch(error => {
        // Close loading alert
        const loadingAlert = document.querySelector('.alert-info .alert-close');
        if (loadingAlert) {
            closeAlert(loadingAlert);
        }
        
        console.error('Error:', error);
        
        // Restore button on error
        starBtn.classList.remove('loading');
        starBtn.innerHTML = '<i class="fas fa-star"></i>';
        starBtn.disabled = false;
        showAlert('Terjadi kesalahan pada server', 'error');
    });
}

function updatePrimaryImageUI(newPrimaryImageId) {
    // Remove all existing primary badges
    document.querySelectorAll('.primary-badge').forEach(badge => {
        badge.remove();
    });
    
    // Reset all star buttons to normal state
    document.querySelectorAll('.star-btn').forEach(btn => {
        btn.classList.remove('is-primary', 'loading', 'success');
        btn.removeAttribute('disabled');
        btn.innerHTML = '<i class="fas fa-star"></i>';
        btn.title = 'Jadikan Gambar Utama';
        
        // Re-enable onclick if not the new primary
        const btnImageId = btn.id.replace('star-btn-', '');
        if (btnImageId !== newPrimaryImageId.toString()) {
            btn.onclick = function() {
                setPrimaryImage(btnImageId);
            };
        }
    });
    
    // Update the new primary image
    const newPrimaryImage = document.getElementById(`image-${newPrimaryImageId}`);
    if (newPrimaryImage) {
        const imageContainer = newPrimaryImage.querySelector('.image-container');
        
        // Add primary badge
        const primaryBadge = document.createElement('div');
        primaryBadge.className = 'primary-badge';
        primaryBadge.innerHTML = '<i class="fas fa-crown"></i> Utama';
        imageContainer.appendChild(primaryBadge);
        
        // Update the star button for new primary image
        const newPrimaryBtn = document.getElementById(`star-btn-${newPrimaryImageId}`);
        if (newPrimaryBtn) {
            newPrimaryBtn.classList.add('is-primary');
            newPrimaryBtn.setAttribute('disabled', 'true');
            newPrimaryBtn.innerHTML = '<i class="fas fa-crown"></i>';
            newPrimaryBtn.title = 'Gambar Utama';
            newPrimaryBtn.onclick = null;
        }
    }
    
    // Update count badge animation
    const countBadge = document.querySelector('.media-card .count-badge');
    if (countBadge) {
        countBadge.style.animation = 'pulse 0.6s ease-out';
        setTimeout(() => {
            countBadge.style.animation = '';
        }, 600);
    }
}

// Add primary shine animation
const primaryShineStyle = document.createElement('style');
primaryShineStyle.textContent = `
    @keyframes primaryShine {
        0% {
            box-shadow: 0 0 0 0 rgba(251, 191, 36, 0.7);
        }
        50% {
            box-shadow: 0 0 0 10px rgba(251, 191, 36, 0.3);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(251, 191, 36, 0);
        }
    }
`;
document.head.appendChild(primaryShineStyle);

function deleteImage(imageId) {
    showDeleteConfirm(
        'Hapus Gambar', 
        'Apakah Anda yakin ingin menghapus gambar ini? Tindakan ini tidak dapat dibatalkan.',
        'fas fa-image',
        () => {
            const deleteBtn = document.querySelector(`#image-${imageId} .delete-btn`);
            const imageItem = document.getElementById(`image-${imageId}`);
            
            // Add loading state
            if (deleteBtn) {
                deleteBtn.classList.add('loading');
                deleteBtn.innerHTML = '';
            }
            
            showProgressAlert('Sedang menghapus gambar...', 'delete');
            
            fetch(`{{ url('admin/catalog/images') }}/${imageId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                closeProgressAlert();
                
                if (data.success) {
                    // Success animation
                    if (deleteBtn) {
                        deleteBtn.classList.remove('loading');
                        deleteBtn.classList.add('success');
                        deleteBtn.innerHTML = '<i class="fas fa-check"></i>';
                    }
                    
                    // Animate removal
                    if (imageItem) {
                        imageItem.style.animation = 'deleteSuccess 0.6s ease-out forwards';
                        setTimeout(() => {
                            imageItem.remove();
                            updateImageCount();
                        }, 600);
                    }
                    
                    showSuccessAlert('Gambar berhasil dihapus!', 'Gambar telah dihapus dari katalog.');
                    
                } else {
                    // Restore button on error
                    if (deleteBtn) {
                        deleteBtn.classList.remove('loading');
                        deleteBtn.innerHTML = '<i class="fas fa-trash"></i>';
                    }
                    showErrorAlert('Gagal menghapus gambar', data.message || 'Terjadi kesalahan saat menghapus gambar.');
                }
            })
            .catch(error => {
                closeProgressAlert();
                console.error('Error:', error);
                
                // Restore button on error
                if (deleteBtn) {
                    deleteBtn.classList.remove('loading');
                    deleteBtn.innerHTML = '<i class="fas fa-trash"></i>';
                }
                showErrorAlert('Kesalahan Server', 'Terjadi kesalahan pada server. Silakan coba lagi.');
            });
        }
    );
}

function deleteFile(fileId) {
    showDeleteConfirm(
        'Hapus File', 
        'Apakah Anda yakin ingin menghapus file ini? File akan dihapus permanen.',
        'fas fa-file',
        () => {
            const fileItem = document.getElementById(`file-${fileId}`);
            const deleteBtn = fileItem ? fileItem.querySelector('.delete-file-btn') : null;
            
            // Add loading state
            if (deleteBtn) {
                deleteBtn.classList.add('loading');
                deleteBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            }
            
            showProgressAlert('Sedang menghapus file...', 'delete');
            
            fetch(`{{ url('admin/catalog/files') }}/${fileId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                closeProgressAlert();
                
                if (data.success) {
                    // Success animation
                    if (deleteBtn) {
                        deleteBtn.classList.remove('loading');
                        deleteBtn.classList.add('success');
                        deleteBtn.innerHTML = '<i class="fas fa-check"></i>';
                    }
                    
                    // Animate removal
                    if (fileItem) {
                        fileItem.style.animation = 'deleteSuccess 0.6s ease-out forwards';
                        setTimeout(() => {
                            fileItem.remove();
                            updateFileCount();
                        }, 600);
                    }
                    
                    showSuccessAlert('File berhasil dihapus!', 'File telah dihapus dari katalog.');
                    
                } else {
                    // Restore button on error
                    if (deleteBtn) {
                        deleteBtn.classList.remove('loading');
                        deleteBtn.innerHTML = '<i class="fas fa-trash"></i>';
                    }
                    showErrorAlert('Gagal menghapus file', data.message || 'Terjadi kesalahan saat menghapus file.');
                }
            })
            .catch(error => {
                closeProgressAlert();
                console.error('Error:', error);
                
                // Restore button on error
                if (deleteBtn) {
                    deleteBtn.classList.remove('loading');
                    deleteBtn.innerHTML = '<i class="fas fa-trash"></i>';
                }
                showErrorAlert('Kesalahan Server', 'Terjadi kesalahan pada server. Silakan coba lagi.');
            });
        }
    );
}

function updateImageCount() {
    const imageItems = document.querySelectorAll('.images-showcase .image-item');
    const countBadge = document.querySelector('.media-card .count-badge');
    
    if (countBadge) {
        countBadge.textContent = imageItems.length;
        countBadge.style.animation = 'pulse 0.6s ease-out';
        
        // Show empty state if no images
        if (imageItems.length === 0) {
            const showcase = document.querySelector('.images-showcase');
            if (showcase) {
                showcase.innerHTML = `
                    <div class="empty-state" style="grid-column: 1 / -1;">
                        <i class="fas fa-camera"></i>
                        <p>Belum ada gambar untuk item ini</p>
                        <small>Upload gambar untuk membuat katalog lebih menarik</small>
                    </div>
                `;
            }
        }
    }
}

function updateFileCount() {
    const fileItems = document.querySelectorAll('.files-showcase .file-item');
    const countBadge = document.querySelector('.files-card .count-badge');
    
    if (countBadge) {
        countBadge.textContent = fileItems.length;
        countBadge.style.animation = 'pulse 0.6s ease-out';
        
        // Show empty state if no files
        if (fileItems.length === 0) {
            const showcase = document.querySelector('.files-showcase');
            if (showcase) {
                showcase.innerHTML = `
                    <div class="empty-state">
                        <i class="fas fa-file-plus"></i>
                        <p>Belum ada file untuk item ini</p>
                        <small>Upload dokumen pendukung untuk katalog</small>
                    </div>
                `;
            }
        }
    }
}

// Add slide out animation styles
const slideOutStyle = document.createElement('style');
slideOutStyle.textContent = `
    @keyframes slideOut {
        from {
            opacity: 1;
            transform: translateX(0) scale(1);
        }
        to {
            opacity: 0;
            transform: translateX(-100px) scale(0.8);
        }
    }
    
    @keyframes slideOutScale {
        0% {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
        50% {
            transform: scale(0.95) translateY(-5px);
        }
        100% {
            opacity: 0;
            transform: scale(0.8) translateY(-20px);
        }
    }
    
    /* Enhanced responsive overlay buttons */
    @media (max-width: 768px) {
        .overlay-btn {
            width: 32px;
            height: 32px;
            font-size: 0.75rem;
            border-width: 1px;
        }
        
        .overlay-actions {
            gap: 8px;
        }
    }
    
    @media (max-width: 480px) {
        .overlay-btn {
            width: 28px;
            height: 28px;
            font-size: 0.7rem;
        }
        
        .overlay-actions {
            gap: 6px;
        }
    }
`;
document.head.appendChild(slideOutStyle);
</script>
@endpush

@php
function getFileIcon($extension) {
    $icons = [
        'pdf' => '<i class="fas fa-file-pdf"></i>',
        'doc' => '<i class="fas fa-file-word"></i>',
        'docx' => '<i class="fas fa-file-word"></i>',
        'xls' => '<i class="fas fa-file-excel"></i>',
        'xlsx' => '<i class="fas fa-file-excel"></i>',
    ];
    return $icons[strtolower($extension)] ?? '<i class="fas fa-file"></i>';
}
@endphp
