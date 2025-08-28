<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="description" content="Tali Rejeki — Distributor Insulasi Industri: Nitrile Rubber, Glasswool, Rockwool, aksesoris HVAC & proyek." />
    <meta name="theme-color" content="#7c1415" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Login Panel Admin') | Tali Rejeki</title>
    <!-- Bootstrap -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>

    <!-- Font & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="icon" href="{{ asset('img/icon-logo/tali-rejeki.jpg') }}" type="image/jpg">
    @stack('styles')
    <link href="{{ asset('css/style-admin.css') }}" rel="stylesheet">
    
    <style>
    /* ====== MODAL BACKDROP FIX ====== */
    /* Ensure proper modal backdrop management */
    .modal-backdrop {
        z-index: 1055 !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        opacity: var(--bs-backdrop-opacity, 0.3) !important;
    }
    
    .modal {
        z-index: 1060 !important;
    }
    
    .modal.show {
        display: flex !important;
        align-items: center;
        justify-content: center;
    }
    
    .modal-dialog {
        margin: 0;
        z-index: 1070;
        pointer-events: auto;
    }
    
    /* Prevent backdrop interference with buttons */
    .modal-content {
        z-index: 1075 !important;
        position: relative;
        background: white !important;
        border: none !important;
        border-radius: 12px !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15) !important;
    }
    
    .modal-content * {
        z-index: inherit;
        pointer-events: auto !important;
    }
    
    /* Enhanced button clickability in modals */
    .modal .btn {
        position: relative;
        z-index: 9999 !important;
        pointer-events: auto !important;
        cursor: pointer !important;
    }
    
    /* Prevent multiple backdrops */
    body.modal-open {
        overflow: hidden;
    }
    
    body.modal-open .modal-backdrop + .modal-backdrop {
        display: none !important;
    }
    
    /* Force modal backdrop to not interfere with clicks */
    .modal-backdrop.fade.show {
        pointer-events: none !important;
    }
    
    .modal.fade.show {
        pointer-events: auto !important;
    }
    
    .modal.fade.show .modal-dialog {
        pointer-events: auto !important;
    }
    
    .modal.fade.show .modal-content {
        pointer-events: auto !important;
    }
    
    /* Override Bootstrap backdrop opacity issues */
    .modal-backdrop.show {
        opacity: 0.3 !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
    }
    
    /* Remove all blur effects globally */
    .modal-content,
    .premium-card,
    .info-card,
    .search-filter-container,
    .form-control,
    .form-select,
    .view-mode-toggle,
    .premium-table {
        backdrop-filter: none !important;
        -webkit-backdrop-filter: none !important;
        filter: none !important;
    }
    
    /* ====== END MODAL BACKDROP FIX ====== */
    
    /* ====== ADMIN LAYOUT STYLES ====== */
    .admin-layout {
        background: #f8fafc;
        min-height: 100vh;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        overflow-x: hidden;
        position: relative;
    }
    
    /* ====== ALERT STYLES ====== */
    .alert {
        border-radius: 12px;
        font-size: 14px;
        margin-bottom: 20px;
        position: relative;
        background: #fff;
        border: 1px solid #dee2e6;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        z-index: 9999 !important;
        padding: 16px 20px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .alert::before {
        content: '';
        width: 4px;
        height: 100%;
        position: absolute;
        left: 0;
        top: 0;
        border-radius: 12px 0 0 12px;
    }
    
    /* Override Bootstrap alert backgrounds */
    .alert-success {
        background: linear-gradient(135deg, #d1e7dd, #f8fff9) !important;
        border-color: #badbcc !important;
        color: #0f5132 !important;
        border-left: 4px solid #198754;
    }
    
    .alert-success::before {
        background: #198754;
    }
    
    .alert-success::after {
        content: '\f058';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        color: #198754;
        font-size: 18px;
        margin-right: 8px;
    }
    
    .alert-danger {
        background: linear-gradient(135deg, #f8d7da, #fef5f5) !important;
        border-color: #f5c2c7 !important;
        color: #842029 !important;
        border-left: 4px solid #dc3545;
    }
    
    .alert-danger::before {
        background: #dc3545;
    }
    
    .alert-danger::after {
        content: '\f06a';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        color: #dc3545;
        font-size: 18px;
        margin-right: 8px;
    }
    
    .alert-warning {
        background: linear-gradient(135deg, #fff3cd, #fffef5) !important;
        border-color: #ffecb5 !important;
        color: #664d03 !important;
        border-left: 4px solid #ffc107;
    }
    
    .alert-warning::before {
        background: #ffc107;
    }
    
    .alert-warning::after {
        content: '\f071';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        color: #ffc107;
        font-size: 18px;
        margin-right: 8px;
    }
    
    .alert-info {
        background: linear-gradient(135deg, #d1ecf1, #f5feff) !important;
        border-color: #b6d7e2 !important;
        color: #055160 !important;
        border-left: 4px solid #0dcaf0;
    }
    
    .alert-info::before {
        background: #0dcaf0;
    }
    
    .alert-info::after {
        content: '\f05a';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        color: #0dcaf0;
        font-size: 18px;
        margin-right: 8px;
    }
    
    .alert .btn-close {
        background: none;
        border: none;
        font-size: 16px;
        opacity: 0.6;
        transition: all 0.3s ease;
        padding: 8px;
        border-radius: 50%;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: auto;
        cursor: pointer;
        position: relative;
    }
    
    .alert .btn-close::before {
        content: '\f00d';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        font-size: 16px;
        color: currentColor;
        line-height: 1;
    }
    
    .alert .btn-close:hover {
        opacity: 1;
        background: rgba(0,0,0,0.1);
        transform: scale(1.1);
    }
    
    .alert-success .btn-close:hover {
        background: rgba(25, 135, 84, 0.1);
        color: #198754;
    }
    
    .alert-danger .btn-close:hover {
        background: rgba(220, 53, 69, 0.1);
        color: #dc3545;
    }
    
    .alert-warning .btn-close:hover {
        background: rgba(255, 193, 7, 0.1);
        color: #ffc107;
    }
    
    .alert-info .btn-close:hover {
        background: rgba(13, 202, 240, 0.1);
        color: #0dcaf0;
    }
    
    /* Auto-hide animation */
    .alert.auto-hide {
        animation: alertSlideIn 0.4s ease-out, alertSlideOut 0.4s ease-in-out 4.5s forwards;
    }
    
    @keyframes alertSlideIn {
        0% {
            transform: translateX(100%);
            opacity: 0;
        }
        100% {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes alertSlideOut {
        0% {
            transform: translateX(0) scale(1);
            opacity: 1;
        }
        100% {
            transform: translateX(100%) scale(0.8);
            opacity: 0;
        }
    }
    
    /* Alert hover effects */
    .alert:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        transition: all 0.3s ease;
    }
    
    /* Alert text content spacing */
    .alert-content {
        flex: 1;
        line-height: 1.5;
    }
    
    .admin-main-content {
        margin-left: 280px;
        margin-top: 70px;
        padding: 30px;
        min-height: calc(100vh - 70px);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        z-index: 1;
        background: transparent;
    }
    
    /* Alert container with highest z-index */
    .admin-main-content > .alert {
        z-index: 10001 !important;
        position: relative;
    }
    
    /* Sidebar collapsed state adjustments */
    .sidebar-collapsed .admin-main-content {
        margin-left: 70px;
    }
    
    .sidebar-collapsed .premium-navbar {
        left: 70px;
    }
    
    .sidebar-collapsed .app-footer {
        margin-left: 70px;
    }
    
    /* Mobile responsive */
    @media (max-width: 768px) {
        .admin-main-content {
            margin-left: 0;
            padding: 20px 15px;
            margin-top: 70px;
        }
        
        .sidebar-collapsed .admin-main-content,
        .admin-main-content {
            margin-left: 0;
        }
        
        .sidebar-collapsed .premium-navbar,
        .premium-navbar {
            left: 0;
        }
        
        .sidebar-collapsed .app-footer,
        .app-footer {
            margin-left: 0;
        }
    }
    
    /* Content area with simple styling */
    .admin-main-content::before {
        display: none;
    }
    
    /* Smooth transitions for all layout changes */
    .premium-navbar,
    .app-footer {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    /* Remove complex background effects */
    .admin-layout::before {
        display: none;
    }
    
    /* Force clear rendering for all elements */
    * {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    
    /* Ensure no global blur effects */
    body, html, .admin-layout, .admin-main-content {
        filter: none !important;
        backdrop-filter: none !important;
        transform: none !important;
        will-change: auto !important;
    }
    
    /* Additional alert fixes */
    .alert, .alert * {
        filter: none !important;
        backdrop-filter: none !important;
        transform: none !important;
        will-change: auto !important;
        text-rendering: optimizeLegibility;
        -webkit-font-smoothing: antialiased;
        z-index: 9999 !important;
        position: relative;
    }
    
    /* Alert buttons with highest priority */
    .alert .btn-close {
        z-index: 10000 !important;
        position: relative;
        pointer-events: auto !important;
    }
    
    /* ====== MODAL CLOSE BUTTON FIXES ====== */
    /* Fix all modal close buttons */
    .modal .btn-close {
        background: none !important;
        border: none !important;
        font-size: 16px;
        opacity: 0.8;
        transition: all 0.3s ease;
        padding: 8px;
        border-radius: 50%;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        position: relative;
        z-index: 1070 !important;
        pointer-events: auto !important;
    }
    
    .modal .btn-close::before {
        content: '\f00d';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        font-size: 14px;
        color: currentColor;
        line-height: 1;
    }
    
    .modal .btn-close:hover {
        opacity: 1;
        background: rgba(0,0,0,0.1) !important;
        transform: scale(1.1);
    }
    
    /* Modal header close button specific styling */
    .modal-header .btn-close {
        background: rgba(255, 255, 255, 0.2) !important;
        border: 2px solid rgba(255, 255, 255, 0.3) !important;
        color: white !important;
        filter: none !important;
    }
    
    .modal-header .btn-close::before {
        color: white !important;
    }
    
    .modal-header .btn-close:hover {
        background: rgba(255, 255, 255, 0.3) !important;
        border-color: rgba(255, 255, 255, 0.5) !important;
        opacity: 1;
        transform: scale(1.1);
    }
    
    /* Override Bootstrap default close button */
    .btn-close {
        box-sizing: content-box;
        background: transparent !important;
        border: 0;
        border-radius: 0.375rem;
        opacity: 0.8;
    }
    
    .btn-close:hover {
        opacity: 1;
    }
    
    .btn-close:focus {
        outline: 0;
        box-shadow: 0 0 0 0.25rem rgba(139, 0, 0, 0.25);
        opacity: 1;
    }
    
    .btn-close:disabled,
    .btn-close.disabled {
        pointer-events: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
        opacity: 0.25;
    }
    </style>

</head>
<body class="admin-layout">
    @include('admin.components.navbar')
    @include('admin.components.sidebar')
    
    <main class="admin-main-content">
        <!-- Alert Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show auto-hide" role="alert">
                <div class="alert-content">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show auto-hide" role="alert">
                <div class="alert-content">
                    {{ session('error') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('warning'))
            <div class="alert alert-warning alert-dismissible fade show auto-hide" role="alert">
                <div class="alert-content">
                    {{ session('warning') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('info'))
            <div class="alert alert-info alert-dismissible fade show auto-hide" role="alert">
                <div class="alert-content">
                    {{ session('info') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show auto-hide" role="alert">
                <div class="alert-content">
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </main>

    @include('admin.components.footer')
    
    <!-- Alert Auto-hide Script -->
    <script>
    // Global Modal Backdrop Management
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Global modal management initialized');
        
        // Function to clean up stray backdrops
        function cleanupBackdrops() {
            const backdrops = document.querySelectorAll('.modal-backdrop');
            if (backdrops.length > 1) {
                // Keep only the last backdrop
                for (let i = 0; i < backdrops.length - 1; i++) {
                    backdrops[i].remove();
                }
            }
            
            // Ensure backdrop doesn't block clicks
            backdrops.forEach(backdrop => {
                backdrop.style.pointerEvents = 'none';
                backdrop.style.zIndex = '1055';
            });
        }
        
        // Function to fix modal button clickability
        function fixModalButtons() {
            const modalButtons = document.querySelectorAll('.modal .btn');
            modalButtons.forEach(btn => {
                btn.style.position = 'relative';
                btn.style.zIndex = '9999';
                btn.style.pointerEvents = 'auto';
                btn.style.cursor = 'pointer';
            });
        }
        
        // Monitor for modal events globally
        document.addEventListener('show.bs.modal', function(e) {
            console.log('Modal showing:', e.target.id);
            cleanupBackdrops();
            
            // Ensure modal has proper z-index
            e.target.style.zIndex = '1060';
            e.target.style.pointerEvents = 'auto';
        });
        
        document.addEventListener('shown.bs.modal', function(e) {
            console.log('Modal shown:', e.target.id);
            cleanupBackdrops();
            fixModalButtons();
            
            // Force backdrop to not interfere
            const backdrop = document.querySelector('.modal-backdrop:last-child');
            if (backdrop) {
                backdrop.style.zIndex = '1055';
                backdrop.style.pointerEvents = 'none';
            }
            
            // Ensure modal dialog is clickable
            const modalDialog = e.target.querySelector('.modal-dialog');
            if (modalDialog) {
                modalDialog.style.pointerEvents = 'auto';
                modalDialog.style.zIndex = '1070';
            }
            
            // Ensure modal content is clickable
            const modalContent = e.target.querySelector('.modal-content');
            if (modalContent) {
                modalContent.style.pointerEvents = 'auto';
                modalContent.style.zIndex = '1075';
            }
        });
        
        document.addEventListener('hide.bs.modal', function(e) {
            console.log('Modal hiding:', e.target.id);
        });
        
        document.addEventListener('hidden.bs.modal', function(e) {
            console.log('Modal hidden:', e.target.id);
            cleanupBackdrops();
            
            // Remove modal-open class if no modals are visible
            const visibleModals = document.querySelectorAll('.modal.show');
            if (visibleModals.length === 0) {
                document.body.classList.remove('modal-open');
                // Remove all backdrops
                const allBackdrops = document.querySelectorAll('.modal-backdrop');
                allBackdrops.forEach(backdrop => backdrop.remove());
            }
        });
        
        // Global click event handler for modal buttons
        document.addEventListener('click', function(e) {
            // Ensure modal buttons always work
            if (e.target.closest('.modal .btn')) {
                const btn = e.target.closest('.modal .btn');
                console.log('Modal button clicked:', btn.textContent.trim());
                
                // Force the click to work
                if (btn.type === 'submit') {
                    // For submit buttons, ensure form submission
                    const form = btn.closest('form');
                    if (form && !btn.disabled) {
                        console.log('Submitting form from modal button');
                        e.stopPropagation();
                        e.preventDefault();
                        
                        // Add visual feedback
                        btn.style.transform = 'scale(0.95)';
                        setTimeout(() => {
                            btn.style.transform = '';
                        }, 100);
                        
                        // Submit the form
                        form.submit();
                    }
                } else if (btn.hasAttribute('data-bs-dismiss')) {
                    // For dismiss buttons
                    const modal = btn.closest('.modal');
                    if (modal) {
                        const modalInstance = bootstrap.Modal.getInstance(modal);
                        if (modalInstance) {
                            modalInstance.hide();
                        }
                    }
                }
            }
        });
        
        // Force click events through backdrop
        document.addEventListener('mousedown', function(e) {
            if (e.target.classList.contains('modal-backdrop')) {
                e.preventDefault();
                e.stopPropagation();
                console.log('Backdrop click prevented');
            }
        });
        
        // Monitor and fix backdrop issues continuously
        setInterval(function() {
            const backdrops = document.querySelectorAll('.modal-backdrop');
            backdrops.forEach(backdrop => {
                if (backdrop.style.pointerEvents !== 'none') {
                    backdrop.style.pointerEvents = 'none';
                }
            });
            
            // Fix modal buttons continuously
            fixModalButtons();
        }, 1000);
        
        // Enhanced alert functionality with better animations
        const alerts = document.querySelectorAll('.alert');
        
        alerts.forEach(function(alert) {
            // Add entrance animation
            alert.style.transform = 'translateX(100%)';
            alert.style.opacity = '0';
            
            // Trigger entrance animation
            setTimeout(function() {
                alert.style.transition = 'all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1)';
                alert.style.transform = 'translateX(0)';
                alert.style.opacity = '1';
            }, 100);
            
            // Auto-hide after 6 seconds
            setTimeout(function() {
                if (!alert.parentNode) return;
                
                alert.style.transition = 'all 0.4s ease';
                alert.style.transform = 'translateX(100%) scale(0.8)';
                alert.style.opacity = '0';
                
                setTimeout(function() {
                    if (alert.parentNode) {
                        alert.remove();
                    }
                }, 400);
            }, 6000);
        });

        // Enhanced close button functionality
        const closeButtons = document.querySelectorAll('.alert .btn-close');
        closeButtons.forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const alert = this.closest('.alert');
                alert.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                alert.style.transform = 'translateX(100%) scale(0.9)';
                alert.style.opacity = '0';
                
                setTimeout(function() {
                    if (alert.parentNode) {
                        alert.remove();
                    }
                }, 300);
            });
        });

        // Add hover effects
        alerts.forEach(function(alert) {
            alert.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            
            alert.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    });
    
    // Global error handler for debugging
    window.addEventListener('error', function(e) {
        console.error('JavaScript error:', e.error);
    });
    
    // Ensure Bootstrap is loaded
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof bootstrap === 'undefined') {
            console.error('Bootstrap is not loaded!');
        } else {
            console.log('Bootstrap is available, version:', bootstrap.Modal.VERSION || 'unknown');
        }
    });
    </script>
    
    @stack('scripts')
</body>
</html>
