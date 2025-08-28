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
    /* ====== ADMIN LAYOUT STYLES ====== */
    .admin-layout {
        background: linear-gradient(135deg, 
            rgba(248, 250, 252, 1) 0%, 
            rgba(241, 245, 249, 1) 100%);
        min-height: 100vh;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        overflow-x: hidden;
        position: relative;
    }
    
    /* ====== ALERT STYLES ====== */
    .alert {
        border-radius: 10px !important;
        border: none !important;
        font-size: 0.9rem;
        margin-bottom: 20px;
        backdrop-filter: blur(10px);
        position: relative;
        overflow: hidden;
    }
    
    .alert::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, transparent, currentColor, transparent);
        opacity: 0.6;
    }
    
    .alert-success {
        background: linear-gradient(135deg, 
            rgba(40, 167, 69, 0.1), 
            rgba(40, 167, 69, 0.05)) !important;
        color: #155724 !important;
        border-left: 4px solid #28a745 !important;
    }
    
    .alert-danger {
        background: linear-gradient(135deg, 
            rgba(220, 53, 69, 0.1), 
            rgba(220, 53, 69, 0.05)) !important;
        color: #721c24 !important;
        border-left: 4px solid #dc3545 !important;
    }
    
    .alert-warning {
        background: linear-gradient(135deg, 
            rgba(255, 193, 7, 0.1), 
            rgba(255, 193, 7, 0.05)) !important;
        color: #856404 !important;
        border-left: 4px solid #ffc107 !important;
    }
    
    .alert-info {
        background: linear-gradient(135deg, 
            rgba(13, 202, 240, 0.1), 
            rgba(13, 202, 240, 0.05)) !important;
        color: #0c5460 !important;
        border-left: 4px solid #0dcaf0 !important;
    }
    
    .alert .btn-close {
        font-size: 0.75rem;
        opacity: 0.7;
        transition: all 0.3s ease;
    }
    
    .alert .btn-close:hover {
        opacity: 1;
        transform: scale(1.1);
    }
    
    /* Auto-hide animation */
    .alert.auto-hide {
        animation: alertSlideOut 0.5s ease-in-out 4.5s forwards;
    }
    
    @keyframes alertSlideOut {
        0% {
            transform: translateX(0);
            opacity: 1;
        }
        100% {
            transform: translateX(100%);
            opacity: 0;
        }
    }
    
    .admin-main-content {
        margin-left: 280px;
        margin-top: 70px;
        padding: 30px;
        min-height: calc(100vh - 70px);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        z-index: 1;
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
    
    /* Content area with premium styling */
    .admin-main-content::before {
        content: '';
        position: absolute;
        top: -30px;
        left: -30px;
        right: -30px;
        height: 1px;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(139, 0, 0, 0.1), 
            transparent);
        z-index: 1;
    }
    
    /* Smooth transitions for all layout changes */
    .premium-navbar,
    .app-footer {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    /* Enhanced backdrop blur for better performance */
    .admin-layout::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: 
            radial-gradient(circle at 25% 75%, rgba(139, 0, 0, 0.03) 0%, transparent 50%),
            radial-gradient(circle at 75% 25%, rgba(255, 68, 68, 0.02) 0%, transparent 50%);
        pointer-events: none;
        z-index: -1;
        animation: backgroundFloat 20s ease-in-out infinite;
    }
    
    @keyframes backgroundFloat {
        0%, 100% { 
            transform: translate(0, 0) scale(1); 
            opacity: 0.7;
        }
        25% { 
            transform: translate(10px, -10px) scale(1.02); 
            opacity: 0.9;
        }
        50% { 
            transform: translate(-5px, 15px) scale(0.98); 
            opacity: 1;
        }
        75% { 
            transform: translate(15px, 5px) scale(1.01); 
            opacity: 0.8;
        }
    }
    </style>

</head>
<body class="admin-layout">
    @include('admin.components.navbar')
    @include('admin.components.sidebar')
    
    <main class="admin-main-content">
        <!-- Alert Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 10px; border: none; box-shadow: 0 4px 15px rgba(40, 167, 69, 0.2);">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 10px; border: none; box-shadow: 0 4px 15px rgba(220, 53, 69, 0.2);">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert" style="border-radius: 10px; border: none; box-shadow: 0 4px 15px rgba(255, 193, 7, 0.2);">
                <i class="fas fa-exclamation-triangle me-2"></i>
                {{ session('warning') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('info'))
            <div class="alert alert-info alert-dismissible fade show" role="alert" style="border-radius: 10px; border: none; box-shadow: 0 4px 15px rgba(13, 202, 240, 0.2);">
                <i class="fas fa-info-circle me-2"></i>
                {{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 10px; border: none; box-shadow: 0 4px 15px rgba(220, 53, 69, 0.2);">
                <i class="fas fa-exclamation-circle me-2"></i>
                <strong>Terjadi kesalahan:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </main>

    @include('admin.components.footer')
    
    <!-- Alert Auto-hide Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-hide alerts after 5 seconds
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            // Add auto-hide class for animation
            setTimeout(function() {
                alert.classList.add('auto-hide');
                
                // Remove the alert from DOM after animation
                setTimeout(function() {
                    if (alert.parentNode) {
                        alert.remove();
                    }
                }, 500); // Animation duration
            }, 5000); // 5 seconds delay
        });

        // Enhanced close button functionality
        const closeButtons = document.querySelectorAll('.alert .btn-close');
        closeButtons.forEach(function(btn) {
            btn.addEventListener('click', function() {
                const alert = this.closest('.alert');
                alert.style.transition = 'all 0.3s ease';
                alert.style.transform = 'translateX(100%)';
                alert.style.opacity = '0';
                
                setTimeout(function() {
                    if (alert.parentNode) {
                        alert.remove();
                    }
                }, 300);
            });
        });

        // Add click to dismiss functionality
        alerts.forEach(function(alert) {
            alert.style.cursor = 'pointer';
            alert.addEventListener('click', function(e) {
                if (!e.target.closest('.btn-close')) {
                    const closeBtn = this.querySelector('.btn-close');
                    if (closeBtn) {
                        closeBtn.click();
                    }
                }
            });
        });
    });
    </script>
    
    @stack('scripts')
</body>
</html>
