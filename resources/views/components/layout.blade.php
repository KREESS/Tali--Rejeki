<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="description" content="Tali Rejeki — Distributor Insulasi Industri: Nitrile Rubber, Glasswool, Rockwool, aksesoris HVAC & proyek." />
    <meta name="theme-color" content="#7c1415" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Tali Rejeki - Distributor Insulasi Industri') | Tali Rejeki</title>
    
    <!-- Bootstrap -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>

    <!-- Font & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- AOS (Animate On Scroll) -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/icon-logo/tali-rejeki.jpg') }}" type="image/jpg">
    
    @stack('styles')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: #333;
            background: url('{{ asset("img/bg/bg-texture.webp") }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
            transition: all 0.3s ease;
        }
        
        /* Light Theme (Default) */
        body.light-theme {
            background: url('{{ asset("img/bg/bg-texture-white.webp") }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            color: #1e293b;
        }
        
        /* Dark Theme */
        body.dark-theme {
            background: url('{{ asset("img/bg/bg-texture.webp") }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            color: #f1f5f9;
        }
        
        main {
            flex: 1;
            min-height: calc(100vh - 200px);
        }
        
        .container-fluid {
            padding: 0;
        }
        
        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
        
        /* Loading animation */
        .loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.3s ease;
        }
        
        .loading.hidden {
            opacity: 0;
            pointer-events: none;
        }
        
        .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid #7c1415;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading" id="loadingScreen">
        <div class="spinner"></div>
    </div>

    <!-- Topbar -->
    @include('components.topbar')

    <!-- Navigation -->
    @include('components.navbar')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')
    @include('components.back-to-top')
    @include('components.whatsapp')

    @stack('scripts')
    
    <!-- Advanced Language Translator -->
    <script src="{{ asset('js/advanced-translator.js') }}"></script>
    
    <script>
        // Initialize theme before page load
        (function() {
            const savedTheme = localStorage.getItem('theme') || 'light';
            const body = document.body;
            
            if (savedTheme === 'dark') {
                body.classList.add('dark-theme');
                body.classList.remove('light-theme');
            } else {
                body.classList.add('light-theme');
                body.classList.remove('dark-theme');
            }
        })();
        
        // Hide loading screen when page is loaded
        window.addEventListener('load', function() {
            const loading = document.getElementById('loadingScreen');
            if (loading) {
                loading.classList.add('hidden');
                setTimeout(() => {
                    loading.style.display = 'none';
                }, 300);
            }
            
            // Initialize AOS (Animate On Scroll)
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 800,
                    easing: 'ease-in-out',
                    once: true,
                    offset: 100,
                    delay: 0
                });
            }
        });
        
        // Add smooth scroll to all anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>
