@extends('admin.components.layout')

@section('title', $title)

@push('styles')
<style>
.catalog-edit {
    padding: 12px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    min-height: 100vh;
}

.page-header {
    background: linear-gradient(135deg, #8b0000, #a50000, #c50000);
    border-radius: 16px;
    padding: 20px;
    margin-bottom: 20px;
    color: white;
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
    font-size: 1.25rem;
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
    font-size: 0.75rem;
    font-weight: 500;
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

.premium-btn-lg {
    padding: 10px 20px;
    font-size: 0.8rem;
    border-radius: 10px;
    gap: 6px;
}

.premium-btn-sm {
    padding: 4px 8px;
    font-size: 0.65rem;
    border-radius: 6px;
    gap: 3px;
}

.form-container {
    background: white;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 4px 20px rgba(139, 0, 0, 0.1);
    border: 1px solid rgba(139, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
}

.form-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #8b0000, #a50000, #c50000);
}

.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 20px;
}

.form-section {
    margin-bottom: 20px;
    position: relative;
}

.form-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: -20px;
    width: 3px;
    height: 100%;
    background: linear-gradient(180deg, #8b0000 0%, #a50000 50%, transparent 100%);
    border-radius: 2px;
    opacity: 0.3;
}

.section-header {
    margin-bottom: 12px;
    padding-bottom: 8px;
    border-bottom: 2px solid rgba(139, 0, 0, 0.1);
    position: relative;
}

.section-header::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 40px;
    height: 2px;
    background: linear-gradient(90deg, #8b0000, #a50000);
}

.section-header h3 {
    font-size: 0.9rem;
    font-weight: 700;
    color: #8b0000;
    margin: 0 0 3px 0;
    display: flex;
    align-items: center;
    gap: 6px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.section-header small {
    color: #666;
    font-size: 0.7rem;
    font-weight: 500;
}

.form-group {
    margin-bottom: 12px;
}

.form-label {
    display: block;
    font-weight: 600;
    color: #8b0000;
    margin-bottom: 4px;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.form-control {
    width: 100%;
    padding: 8px 12px;
    border: 1.5px solid rgba(139, 0, 0, 0.15);
    border-radius: 6px;
    font-size: 0.75rem;
    transition: all 0.3s ease;
    background: white;
    font-family: inherit;
}

.form-control:focus {
    outline: none;
    border-color: #8b0000;
    box-shadow: 0 0 0 2px rgba(139, 0, 0, 0.15);
    transform: translateY(-1px);
}

.form-control.is-invalid {
    border-color: #dc2626;
    background: rgba(220, 38, 38, 0.05);
}

.invalid-feedback {
    color: #dc2626;
    font-size: 0.65rem;
    margin-top: 3px;
    font-weight: 500;
}

.current-images {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
    gap: 12px;
    margin-bottom: 16px;
}

.current-image-item {
    border: 1px solid rgba(139, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
    transition: all 0.3s ease;
    background: white;
    position: relative;
}

.current-image-item::before {
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

.current-image-item:hover::before {
    left: 100%;
}

.current-image-item:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 8px 25px rgba(139, 0, 0, 0.2);
    border-color: #8b0000;
}

.image-container {
    position: relative;
    height: 120px;
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
    background: linear-gradient(135deg, #fbbf24, #f59e0b);
    color: white;
    padding: 3px 6px;
    border-radius: 4px;
    font-size: 0.65rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 3px;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
    z-index: 2;
}

.image-actions {
    padding: 8px;
    display: flex;
    gap: 6px;
    flex-wrap: wrap;
    background: rgba(139, 0, 0, 0.02);
}

.current-files {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.current-file-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px;
    border: 1px solid rgba(139, 0, 0, 0.1);
    border-radius: 10px;
    transition: all 0.3s ease;
    background: white;
    position: relative;
    overflow: hidden;
}

.current-file-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(139, 0, 0, 0.05), transparent);
    transition: left 0.5s;
}

.current-file-item:hover::before {
    left: 100%;
}

.current-file-item:hover {
    background: rgba(139, 0, 0, 0.02);
    border-color: rgba(139, 0, 0, 0.2);
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.1);
}

.file-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, rgba(139, 0, 0, 0.1), rgba(165, 0, 0, 0.1));
    border-radius: 6px;
    font-size: 1.2rem;
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
    font-size: 0.65rem;
    color: #6b7280;
}

.file-actions {
    display: flex;
    gap: 6px;
}

.upload-area {
    border: 2px dashed rgba(139, 0, 0, 0.3);
    border-radius: 10px;
    padding: 20px 12px;
    text-align: center;
    transition: all 0.3s ease;
    cursor: pointer;
    position: relative;
    background: rgba(139, 0, 0, 0.02);
    overflow: hidden;
}

.upload-area::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(139, 0, 0, 0.05) 0%, transparent 70%);
    opacity: 0;
    transition: opacity 0.3s ease;
    animation: pulse 2s infinite;
}

.upload-area:hover::before {
    opacity: 1;
}

.upload-area:hover {
    border-color: #8b0000;
    background: rgba(139, 0, 0, 0.05);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(139, 0, 0, 0.15);
}

.upload-area.drag-over {
    border-color: #8b0000;
    background: rgba(139, 0, 0, 0.08);
    transform: scale(1.02);
}

@keyframes pulse {
    0%, 100% { transform: scale(1); opacity: 0.3; }
    50% { transform: scale(1.05); opacity: 0.6; }
}

.upload-placeholder i {
    font-size: 2rem;
    color: rgba(139, 0, 0, 0.6);
    margin-bottom: 8px;
    display: block;
}

.upload-placeholder h4 {
    font-size: 0.85rem;
    font-weight: 700;
    color: #8b0000;
    margin: 0 0 4px 0;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.upload-placeholder p {
    color: #666;
    margin: 0 0 4px 0;
    font-size: 0.7rem;
    font-weight: 500;
}

.file-input {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
}

.preview-container {
    margin-top: 12px;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
    gap: 10px;
}

.preview-item {
    background: rgba(139, 0, 0, 0.02);
    border: 1px solid rgba(139, 0, 0, 0.1);
    border-radius: 6px;
    padding: 8px;
    text-align: center;
    position: relative;
    transition: all 0.3s ease;
    overflow: hidden;
}

.preview-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(139, 0, 0, 0.1), transparent);
    transition: left 0.5s;
}

.preview-item:hover::before {
    left: 100%;
}

.preview-item:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 6px 16px rgba(139, 0, 0, 0.2);
    border-color: #8b0000;
}

.remove-btn {
    position: absolute;
    top: 3px;
    right: 3px;
    width: 16px;
    height: 16px;
    background: #dc2626;
    color: white;
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.6rem;
    cursor: pointer;
    transition: all 0.3s ease;
    z-index: 2;
}

.remove-btn:hover {
    background: #b91c1c;
    transform: scale(1.2);
    box-shadow: 0 3px 8px rgba(220, 38, 38, 0.4);
}

.submit-section {
    display: flex;
    gap: 10px;
    justify-content: center;
    padding-top: 20px;
    border-top: 2px solid rgba(139, 0, 0, 0.1);
    position: relative;
}

.submit-section::before {
    content: '';
    position: absolute;
    top: -2px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 2px;
    background: linear-gradient(90deg, #8b0000, #a50000);
}

/* Modal Styles */
.image-modal {
    display: none;
    position: fixed;
    z-index: 10000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.9);
    backdrop-filter: blur(5px);
}

.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    max-height: 80%;
    border-radius: 8px;
    animation: modalZoom 0.3s;
}

.modal-close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
    cursor: pointer;
}

.modal-close:hover {
    color: #bbb;
}

@keyframes modalZoom {
    from {transform: scale(0)}
    to {transform: scale(1)}
}

@media (max-width: 768px) {
    .catalog-edit {
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
        font-size: 0.7rem;
    }
    
    .header-content {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }
    
    .form-container {
        padding: 16px;
    }
    
    .form-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }
    
    .section-header h3 {
        font-size: 0.8rem;
    }
    
    .section-header small {
        font-size: 0.65rem;
    }
    
    .form-label {
        font-size: 0.7rem;
    }
    
    .form-control {
        padding: 6px 10px;
        font-size: 0.7rem;
    }
    
    .current-images {
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        gap: 10px;
    }
    
    .image-container {
        height: 100px;
    }
    
    .upload-area {
        padding: 16px 10px;
    }
    
    .upload-placeholder h4 {
        font-size: 0.8rem;
    }
    
    .upload-placeholder p {
        font-size: 0.65rem;
    }
    
    .current-file-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }
    
    .file-actions {
        width: 100%;
        justify-content: flex-end;
    }
    
    .submit-section {
        flex-direction: column;
        gap: 8px;
    }
    
    .premium-btn-lg {
        padding: 8px 16px;
        font-size: 0.75rem;
    }
    
    .premium-btn-sm {
        padding: 3px 6px;
        font-size: 0.6rem;
    }
    
    .preview-container {
        grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
        gap: 8px;
    }
    
    .modal-content {
        width: 95%;
    }
    
    .modal-close {
        top: 10px;
        right: 15px;
        font-size: 30px;
    }
}

/* Loading Animation */
.form-loading {
    position: relative;
    overflow: hidden;
}

.form-loading::after {
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

/* Focus Indicators */
.form-control:focus + .form-text {
    color: #8b0000;
    font-weight: 600;
}

/* Premium Button Icons */
.premium-btn i {
    transition: transform 0.3s ease;
}

.premium-btn:hover i {
    transform: scale(1.2);
}

/* Floating Animation for Upload */
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-3px); }
}

.upload-area:hover .upload-placeholder i {
    animation: float 1.5s ease-in-out infinite;
}

/* Custom Modal System */
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

.confirm-modal {
    background: white;
    border-radius: 16px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    max-width: 420px;
    width: 90%;
    transform: scale(0.8) translateY(20px);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
    border: 1px solid rgba(139, 0, 0, 0.1);
}

.custom-modal-overlay.show .confirm-modal {
    transform: scale(1) translateY(0);
}

.modal-header {
    padding: 24px 24px 16px;
    text-align: center;
    position: relative;
}

.modal-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 2px;
    background: linear-gradient(90deg, #8b0000, #a50000);
    border-radius: 1px;
}

.modal-icon {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 16px;
    font-size: 24px;
    position: relative;
    overflow: hidden;
}

.modal-icon.danger {
    background: linear-gradient(135deg, #dc2626, #b91c1c);
    color: white;
    animation: pulse 2s infinite;
}

.modal-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #1f2937;
    margin: 0;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.modal-body {
    padding: 0 24px 24px;
    text-align: center;
}

.modal-message {
    color: #6b7280;
    font-size: 0.85rem;
    line-height: 1.6;
    margin: 0;
    font-weight: 500;
}

.modal-actions {
    padding: 0 24px 24px;
    display: flex;
    gap: 12px;
    justify-content: center;
}

.modal-btn {
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.75rem;
    border: none;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    align-items: center;
    gap: 6px;
    min-width: 100px;
    justify-content: center;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    position: relative;
    overflow: hidden;
}

.modal-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.6s;
}

.modal-btn:hover::before {
    left: 100%;
}

.cancel-btn {
    background: linear-gradient(135deg, #6b7280, #4b5563);
    color: white;
    box-shadow: 0 4px 12px rgba(107, 114, 128, 0.3);
}

.cancel-btn:hover {
    background: linear-gradient(135deg, #4b5563, #374151);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(107, 114, 128, 0.4);
}

.confirm-btn {
    background: linear-gradient(135deg, #dc2626, #b91c1c);
    color: white;
    box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
}

.confirm-btn:hover {
    background: linear-gradient(135deg, #b91c1c, #991b1b);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4);
}

/* Progress Alert */
.progress-alert {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0.8);
    background: white;
    border-radius: 12px;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    padding: 24px;
    z-index: 10001;
    min-width: 300px;
    text-align: center;
    border: 1px solid rgba(139, 0, 0, 0.1);
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.progress-alert.show {
    opacity: 1;
    visibility: visible;
    transform: translate(-50%, -50%) scale(1);
}

.progress-content {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    margin-bottom: 16px;
}

.progress-spinner {
    width: 24px;
    height: 24px;
    border: 3px solid rgba(139, 0, 0, 0.1);
    border-top: 3px solid #8b0000;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

.progress-text {
    font-size: 0.85rem;
    font-weight: 600;
    color: #1f2937;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.progress-bar {
    width: 100%;
    height: 6px;
    background: rgba(139, 0, 0, 0.1);
    border-radius: 3px;
    overflow: hidden;
    position: relative;
}

.progress-fill {
    height: 100%;
    background: linear-gradient(90deg, #8b0000, #a50000, #c50000);
    border-radius: 3px;
    animation: progressFill 2s ease-in-out infinite;
}

/* Result Alert */
.result-alert {
    position: fixed;
    top: 24px;
    right: 24px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
    padding: 16px 20px;
    z-index: 10002;
    max-width: 400px;
    width: calc(100vw - 48px);
    display: flex;
    align-items: center;
    gap: 12px;
    border-left: 4px solid;
    transform: translateX(420px);
    opacity: 0;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    backdrop-filter: blur(10px);
}

.result-alert.show {
    transform: translateX(0);
    opacity: 1;
}

.result-alert.success {
    border-left-color: #10b981;
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.05), rgba(5, 150, 105, 0.05));
}

.result-alert.error {
    border-left-color: #dc2626;
    background: linear-gradient(135deg, rgba(220, 38, 38, 0.05), rgba(185, 28, 28, 0.05));
}

.result-content {
    display: flex;
    align-items: center;
    gap: 10px;
    flex: 1;
}

.result-icon {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: 600;
}

.result-alert.success .result-icon {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
}

.result-alert.error .result-icon {
    background: linear-gradient(135deg, #dc2626, #b91c1c);
    color: white;
}

.result-text {
    font-size: 0.8rem;
    font-weight: 600;
    color: #1f2937;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.result-close {
    background: none;
    border: none;
    color: #6b7280;
    cursor: pointer;
    padding: 4px;
    border-radius: 4px;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 24px;
    height: 24px;
    font-size: 12px;
}

.result-close:hover {
    background: rgba(107, 114, 128, 0.1);
    color: #374151;
}

/* Animations */
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

@keyframes progressFill {
    0% { transform: translateX(-100%); }
    50% { transform: translateX(0%); }
    100% { transform: translateX(100%); }
}

@keyframes pulse {
    0%, 100% { 
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(220, 38, 38, 0.4);
    }
    50% { 
        transform: scale(1.05);
        box-shadow: 0 0 0 8px rgba(220, 38, 38, 0);
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .confirm-modal {
        margin: 20px;
        width: calc(100% - 40px);
    }
    
    .modal-header {
        padding: 20px 20px 12px;
    }
    
    .modal-body {
        padding: 0 20px 20px;
    }
    
    .modal-actions {
        padding: 0 20px 20px;
        flex-direction: column;
        gap: 8px;
    }
    
    .modal-btn {
        width: 100%;
        padding: 12px;
        font-size: 0.7rem;
    }
    
    .modal-title {
        font-size: 1rem;
    }
    
    .modal-message {
        font-size: 0.8rem;
    }
    
    .progress-alert {
        margin: 20px;
        width: calc(100% - 40px);
        min-width: auto;
        padding: 20px;
    }
    
    .result-alert {
        top: 20px;
        right: 20px;
        left: 20px;
        width: auto;
        max-width: none;
        padding: 14px 16px;
        font-size: 0.75rem;
    }
    
    .result-text {
        font-size: 0.75rem;
    }
    
    .progress-text {
        font-size: 0.8rem;
    }
}
</style>
@endpush

@section('content')
<div class="catalog-edit">
    <!-- Header Section -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-info">
                <h1 class="page-title">
                    <i class="fas fa-edit"></i>
                    {{ $title }}
                </h1>
                <p class="page-subtitle">Perbarui informasi item katalog</p>
            </div>
            <div class="header-actions">
                <a href="{{ route('admin.catalog.show', $catalog) }}" class="premium-btn premium-btn-outline">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="form-container">
        <form action="{{ route('admin.catalog.update', $catalog) }}" method="POST" enctype="multipart/form-data" id="catalogForm">
            @csrf
            @method('PUT')
            
            <div class="form-grid">
                <!-- Basic Information -->
                <div class="form-section">
                    <div class="section-header">
                        <h3><i class="fas fa-info-circle"></i> Informasi Dasar</h3>
                    </div>
                    
                    <div class="form-group">
                        <label for="name" class="form-label">Nama Item Katalog *</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" 
                               value="{{ old('name', $catalog->name) }}" required placeholder="Masukkan nama item katalog">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">Deskripsi *</label>
                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" 
                                  rows="5" required placeholder="Masukkan deskripsi lengkap item katalog">{{ old('description', $catalog->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- SEO Information -->
                <div class="form-section">
                    <div class="section-header">
                        <h3><i class="fas fa-search"></i> SEO & Meta</h3>
                        <small>Opsional - untuk optimasi mesin pencari</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="meta_title" class="form-label">Meta Title</label>
                        <input type="text" id="meta_title" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" 
                               value="{{ old('meta_title', $catalog->meta_title) }}" maxlength="255" placeholder="Masukkan meta title untuk SEO">
                        @error('meta_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="meta_description" class="form-label">Meta Description</label>
                        <textarea id="meta_description" name="meta_description" class="form-control @error('meta_description') is-invalid @enderror" 
                                  rows="3" maxlength="255" placeholder="Masukkan meta description untuk SEO">{{ old('meta_description', $catalog->meta_description) }}</textarea>
                        @error('meta_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="meta_keywords" class="form-label">Meta Keywords</label>
                        <input type="text" id="meta_keywords" name="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror" 
                               value="{{ old('meta_keywords', $catalog->meta_keywords) }}" maxlength="255" placeholder="Masukkan kata kunci, pisahkan dengan koma">
                        @error('meta_keywords')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Current Images -->
            @if($catalog->images->count() > 0)
                <div class="form-section">
                    <div class="section-header">
                        <h3><i class="fas fa-images"></i> Gambar Saat Ini</h3>
                        <small>Klik gambar untuk melihat detail</small>
                    </div>
                    
                    <div class="current-images">
                        @foreach($catalog->images as $image)
                            <div class="current-image-item" id="image-{{ $image->id }}">
                                <div class="image-container">
                                    <img src="{{ asset($image->image_url) }}" 
                                         alt="{{ $image->alt_text }}" 
                                         onclick="openImageModal('{{ asset($image->image_url) }}', '{{ $image->alt_text }}')">
                                    @if($image->is_primary)
                                        <div class="primary-badge">
                                            <i class="fas fa-star"></i>
                                            Utama
                                        </div>
                                    @endif
                                </div>
                                <div class="image-actions">
                                    @if(!$image->is_primary)
                                        <button type="button" onclick="setPrimaryImage({{ $image->id }})" class="premium-btn premium-btn-sm premium-btn-outline">
                                            <i class="fas fa-star"></i>
                                            Jadikan Utama
                                        </button>
                                    @endif
                                    <button type="button" onclick="deleteImage({{ $image->id }})" class="premium-btn premium-btn-sm" style="background: linear-gradient(135deg, #dc2626, #b91c1c);">
                                        <i class="fas fa-trash"></i>
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Add New Images -->
            <div class="form-section">
                <div class="section-header">
                    <h3><i class="fas fa-plus-circle"></i> Tambah Gambar Baru</h3>
                    <small>Format: JPG, PNG, GIF. Maksimal 2MB per file</small>
                </div>
                
                <div class="upload-area" id="imageUploadArea">
                    <div class="upload-placeholder">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <h4>Upload Gambar Baru</h4>
                        <p>Drag & drop atau klik untuk memilih gambar</p>
                        <input type="file" id="images" name="images[]" multiple accept="image/*" class="file-input">
                    </div>
                </div>
                
                <div id="imagePreview" class="preview-container"></div>
            </div>

            <!-- Current Files -->
            @if($catalog->files->count() > 0)
                <div class="form-section">
                    <div class="section-header">
                        <h3><i class="fas fa-file-alt"></i> File Saat Ini</h3>
                    </div>
                    
                    <div class="current-files">
                        @foreach($catalog->files as $file)
                            <div class="current-file-item" id="file-{{ $file->id }}">
                                <div class="file-icon">
                                    {!! getFileIcon(pathinfo($file->file_url, PATHINFO_EXTENSION)) !!}
                                </div>
                                <div class="file-info">
                                    <div class="file-name">{{ basename($file->file_url) }}</div>
                                    <div class="file-meta">{{ $file->meta_title }}</div>
                                </div>
                                <div class="file-actions">
                                    <a href="{{ asset($file->file_url) }}" 
                                       target="_blank" class="premium-btn premium-btn-sm premium-btn-outline">
                                        <i class="fas fa-download"></i>
                                        Download
                                    </a>
                                    <button type="button" onclick="deleteFile({{ $file->id }})" class="premium-btn premium-btn-sm" style="background: linear-gradient(135deg, #dc2626, #b91c1c);">
                                        <i class="fas fa-trash"></i>
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Add New Files -->
            <div class="form-section">
                <div class="section-header">
                    <h3><i class="fas fa-plus-circle"></i> Tambah File Baru</h3>
                    <small>Format: PDF, DOC, DOCX, XLS, XLSX. Maksimal 10MB per file</small>
                </div>
                
                <div class="upload-area" id="fileUploadArea">
                    <div class="upload-placeholder">
                        <i class="fas fa-file-upload"></i>
                        <h4>Upload File Baru</h4>
                        <p>Drag & drop atau klik untuk memilih file</p>
                        <input type="file" id="files" name="files[]" multiple accept=".pdf,.doc,.docx,.xls,.xlsx" class="file-input">
                    </div>
                </div>
                
                <div id="filePreview" class="preview-container"></div>
            </div>

            <!-- Submit Section -->
            <div class="submit-section">
                <button type="submit" class="premium-btn premium-btn-lg">
                    <i class="fas fa-save"></i>
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.catalog.show', $catalog) }}" class="premium-btn premium-btn-lg premium-btn-outline">
                    <i class="fas fa-times"></i>
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Enhanced Image Modal -->
<div id="imageModal" class="image-modal">
    <span class="modal-close" onclick="closeImageModal()">&times;</span>
    <img class="modal-content" id="modalImage">
    <div id="caption" style="text-align: center; color: white; margin-top: 10px; font-size: 0.8rem;"></div>
</div>

<script>
// Custom Alert System dengan tema merah tua
function createConfirmModal(title, message, onConfirm) {
    // Remove existing modal if any
    const existingModal = document.querySelector('.custom-modal-overlay');
    if (existingModal) {
        existingModal.remove();
    }
    
    const modalHTML = `
        <div class="custom-modal-overlay">
            <div class="confirm-modal">
                <div class="modal-header">
                    <div class="modal-icon danger">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <h3 class="modal-title">${title}</h3>
                </div>
                <div class="modal-body">
                    <p class="modal-message">${message}</p>
                </div>
                <div class="modal-actions">
                    <button class="modal-btn cancel-btn" onclick="closeConfirmModal()">
                        <i class="fas fa-times"></i>
                        Batal
                    </button>
                    <button class="modal-btn confirm-btn" onclick="handleConfirm()">
                        <i class="fas fa-trash"></i>
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    `;
    
    document.body.insertAdjacentHTML('beforeend', modalHTML);
    
    // Store the confirm callback
    window.currentConfirmCallback = onConfirm;
    
    // Show modal with animation
    setTimeout(() => {
        document.querySelector('.custom-modal-overlay').classList.add('show');
    }, 10);
    
    // Prevent body scroll
    document.body.style.overflow = 'hidden';
}

function closeConfirmModal() {
    const modal = document.querySelector('.custom-modal-overlay');
    if (modal) {
        modal.classList.remove('show');
        setTimeout(() => {
            modal.remove();
            document.body.style.overflow = 'auto';
        }, 300);
    }
}

function handleConfirm() {
    closeConfirmModal();
    if (window.currentConfirmCallback) {
        window.currentConfirmCallback();
        window.currentConfirmCallback = null;
    }
}

function showProgressAlert(message) {
    // Remove existing alerts
    const existingAlert = document.querySelector('.progress-alert');
    if (existingAlert) {
        existingAlert.remove();
    }
    
    const alertHTML = `
        <div class="progress-alert">
            <div class="progress-content">
                <div class="progress-spinner"></div>
                <span class="progress-text">${message}</span>
            </div>
            <div class="progress-bar">
                <div class="progress-fill"></div>
            </div>
        </div>
    `;
    
    document.body.insertAdjacentHTML('beforeend', alertHTML);
    
    setTimeout(() => {
        document.querySelector('.progress-alert').classList.add('show');
    }, 10);
}

function hideProgressAlert() {
    const alert = document.querySelector('.progress-alert');
    if (alert) {
        alert.classList.remove('show');
        setTimeout(() => {
            alert.remove();
        }, 300);
    }
}

function showSuccessAlert(message) {
    hideProgressAlert();
    showResultAlert(message, 'success');
}

function showErrorAlert(message) {
    hideProgressAlert();
    showResultAlert(message, 'error');
}

function showResultAlert(message, type) {
    const iconClass = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
    const alertClass = type === 'success' ? 'success' : 'error';
    
    const alertHTML = `
        <div class="result-alert ${alertClass}">
            <div class="result-content">
                <div class="result-icon">
                    <i class="fas ${iconClass}"></i>
                </div>
                <span class="result-text">${message}</span>
            </div>
            <button class="result-close" onclick="closeResultAlert(this)">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;
    
    document.body.insertAdjacentHTML('beforeend', alertHTML);
    
    const alertElement = document.querySelector('.result-alert:last-child');
    setTimeout(() => {
        alertElement.classList.add('show');
    }, 10);
    
    // Auto dismiss after 4 seconds
    setTimeout(() => {
        if (alertElement && alertElement.parentNode) {
            closeResultAlert(alertElement.querySelector('.result-close'));
        }
    }, 4000);
}

function closeResultAlert(btn) {
    const alert = btn.closest('.result-alert');
    alert.classList.remove('show');
    setTimeout(() => {
        if (alert.parentNode) {
            alert.remove();
        }
    }, 300);
}

document.addEventListener('DOMContentLoaded', function() {
    setupFileUpload('images', 'imagePreview', handleImagePreview);
    setupFileUpload('files', 'filePreview', handleFilePreview);
    
    // Add form validation
    const form = document.getElementById('catalogForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            if (!validateForm()) {
                e.preventDefault();
                showErrorAlert('Mohon periksa kembali form Anda');
            } else {
                // Add loading state
                const submitBtn = form.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
                    submitBtn.disabled = true;
                }
            }
        });
    }
});

function validateForm() {
    const name = document.getElementById('name').value.trim();
    const description = document.getElementById('description').value.trim();
    
    if (!name) {
        showErrorAlert('Nama item katalog wajib diisi');
        document.getElementById('name').focus();
        return false;
    }
    
    if (!description) {
        showErrorAlert('Deskripsi wajib diisi');
        document.getElementById('description').focus();
        return false;
    }
    
    return true;
}

function setupFileUpload(inputId, previewId, previewHandler) {
    const input = document.getElementById(inputId);
    const uploadArea = input.closest('.upload-area');
    const preview = document.getElementById(previewId);
    
    uploadArea.addEventListener('click', () => input.click());
    
    uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.classList.add('drag-over');
    });
    
    uploadArea.addEventListener('dragleave', () => {
        uploadArea.classList.remove('drag-over');
    });
    
    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.classList.remove('drag-over');
        const files = e.dataTransfer.files;
        if (validateFiles(files, inputId)) {
            input.files = files;
            previewHandler(files, preview);
        }
    });
    
    input.addEventListener('change', () => {
        if (validateFiles(input.files, inputId)) {
            previewHandler(input.files, preview);
        }
    });
}

function validateFiles(files, inputType) {
    const maxSize = inputType === 'images' ? 2 * 1024 * 1024 : 10 * 1024 * 1024; // 2MB for images, 10MB for files
    const allowedTypes = inputType === 'images' 
        ? ['image/jpeg', 'image/png', 'image/gif']
        : ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
    
    for (let file of files) {
        if (file.size > maxSize) {
            showErrorAlert(`File ${file.name} terlalu besar. Maksimal ${maxSize / (1024 * 1024)}MB`);
            return false;
        }
        
        if (!allowedTypes.includes(file.type)) {
            showErrorAlert(`Format file ${file.name} tidak didukung`);
            return false;
        }
    }
    
    return true;
}

function handleImagePreview(files, container) {
    container.innerHTML = '';
    
    Array.from(files).forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = (e) => {
            const previewItem = createPreviewItem(e.target.result, file.name, index, 'image');
            container.appendChild(previewItem);
        };
        reader.readAsDataURL(file);
    });
}

function handleFilePreview(files, container) {
    container.innerHTML = '';
    
    Array.from(files).forEach((file, index) => {
        const previewItem = createPreviewItem(null, file.name, index, 'file');
        container.appendChild(previewItem);
    });
}

function createPreviewItem(src, name, index, type) {
    const div = document.createElement('div');
    div.className = 'preview-item';
    
    if (type === 'image') {
        div.innerHTML = `
            <img src="${src}" alt="${name}" style="width: 100%; height: 80px; object-fit: cover; border-radius: 4px; margin-bottom: 4px;">
            <div style="font-size: 0.65rem; text-align: center; padding: 0 4px; word-break: break-word; line-height: 1.2;">${name}</div>
            <button type="button" onclick="removePreviewItem(this)" class="remove-btn" title="Hapus">×</button>
        `;
    } else {
        const icon = getFileIcon(name);
        div.innerHTML = `
            <div style="width: 100%; height: 80px; display: flex; align-items: center; justify-content: center; background: rgba(139, 0, 0, 0.05); border-radius: 4px; font-size: 1.5rem; color: #8b0000; margin-bottom: 4px;">${icon}</div>
            <div style="font-size: 0.65rem; text-align: center; padding: 0 4px; word-break: break-word; line-height: 1.2;">${name}</div>
            <button type="button" onclick="removePreviewItem(this)" class="remove-btn" title="Hapus">×</button>
        `;
    }
    
    return div;
}

function getFileIcon(filename) {
    const ext = filename.split('.').pop().toLowerCase();
    const icons = {
        'pdf': '<i class="fas fa-file-pdf"></i>',
        'doc': '<i class="fas fa-file-word"></i>',
        'docx': '<i class="fas fa-file-word"></i>',
        'xls': '<i class="fas fa-file-excel"></i>',
        'xlsx': '<i class="fas fa-file-excel"></i>'
    };
    return icons[ext] || '<i class="fas fa-file"></i>';
}

function removePreviewItem(btn) {
    const previewItem = btn.closest('.preview-item');
    previewItem.style.animation = 'slideOut 0.3s ease-out forwards';
    setTimeout(() => {
        if (previewItem.parentNode) {
            previewItem.parentNode.removeChild(previewItem);
        }
    }, 300);
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
    showProgressAlert('Mengubah gambar utama...');
    
    fetch(`{{ url('admin/catalog/images') }}/${imageId}/primary`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {
        hideProgressAlert();
        
        if (data.success) {
            showSuccessAlert(data.message || 'Gambar utama berhasil diubah');
            setTimeout(() => {
                location.reload();
            }, 1500);
        } else {
            showErrorAlert(data.message || 'Gagal mengubah gambar utama');
        }
    })
    .catch(error => {
        hideProgressAlert();
        console.error('Error:', error);
        showErrorAlert('Terjadi kesalahan pada server');
    });
}

function deleteImage(imageId) {
    createConfirmModal(
        'Hapus Gambar',
        'Apakah Anda yakin ingin menghapus gambar ini? Tindakan ini tidak dapat dibatalkan.',
        () => {
            showProgressAlert('Menghapus gambar...');
            
            fetch(`{{ url('admin/catalog/images') }}/${imageId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                hideProgressAlert();
                
                if (data.success) {
                    const imageElement = document.getElementById(`image-${imageId}`);
                    if (imageElement) {
                        imageElement.style.animation = 'slideOut 0.3s ease-out forwards';
                        setTimeout(() => {
                            imageElement.remove();
                        }, 300);
                    }
                    showSuccessAlert('Gambar berhasil dihapus');
                } else {
                    showErrorAlert(data.message || 'Gagal menghapus gambar');
                }
            })
            .catch(error => {
                hideProgressAlert();
                console.error('Error:', error);
                showErrorAlert('Terjadi kesalahan pada server');
            });
        }
    );
}

function deleteFile(fileId) {
    createConfirmModal(
        'Hapus File',
        'Apakah Anda yakin ingin menghapus file ini? Tindakan ini tidak dapat dibatalkan.',
        () => {
            showProgressAlert('Menghapus file...');
            
            fetch(`{{ url('admin/catalog/files') }}/${fileId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                hideProgressAlert();
                
                if (data.success) {
                    const fileElement = document.getElementById(`file-${fileId}`);
                    if (fileElement) {
                        fileElement.style.animation = 'slideOut 0.3s ease-out forwards';
                        setTimeout(() => {
                            fileElement.remove();
                        }, 300);
                    }
                    showSuccessAlert('File berhasil dihapus');
                } else {
                    showErrorAlert(data.message || 'Gagal menghapus file');
                }
            })
            .catch(error => {
                hideProgressAlert();
                console.error('Error:', error);
                showErrorAlert('Terjadi kesalahan pada server');
            });
        }
    );
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
`;
document.head.appendChild(slideOutStyle);
</script>

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
@endsection
