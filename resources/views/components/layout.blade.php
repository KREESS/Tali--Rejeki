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

        /* Popup Container */
        .search-box-popup {
            position: fixed;
            top: 70px; /* Sesuaikan tinggi navbar */
            right: 20px;
            width: 320px;
            background: #fff;
            padding: 12px 16px;
            border-radius: 30px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.18);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-15px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 999;
            margin-top: 60px;
        }

        /* Popup Active */
        .search-box-popup.active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        /* Search Container Flex */
        .search-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Input Field Modern */
        .search-container input {
            flex: 1;
            padding: 10px 16px;
            border-radius: 50px;
            border: 1px solid #ddd;
            outline: none;
            font-size: 16px;
            transition: all 0.25s ease;
        }

        .search-container input:focus {
            border-color: #b71c1c;
            box-shadow: 0 0 8px rgba(183,28,28,0.3);
        }

        /* Buttons */
        .search-container button {
            display: flex;
            align-items: center;
            justify-content: center;
            background: #b71c1c;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 42px;
            height: 42px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .search-container button:hover {
            background: #7f1414;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .search-box-popup {
                width: 90%;
                right: 5%;
                top: 60px;
            }

            .search-container input {
                font-size: 14px;
                padding: 8px 12px;
            }

            .search-container button {
                width: 36px;
                height: 36px;
            }
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
<!-- SEARCH POPUP -->
<div class="search-box-popup" id="searchBox" aria-hidden="true">
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Cari produk insulasi...">
        <button class="search-submit"><i class="fas fa-search"></i></button>
        <button class="search-close"><i class="fas fa-times"></i></button>
    </div>
</div>
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

document.addEventListener('DOMContentLoaded', function() {
    const searchBox = document.getElementById('searchBox');
    const searchBtn = document.querySelector('.search-btn');
    const searchClose = searchBox.querySelector('.search-close');

    function toggleSearch() {
        searchBox.classList.toggle('active');
        if(searchBox.classList.contains('active')) {
            document.getElementById('searchInput').focus();
        }
    }

    // Tombol search
    searchBtn.addEventListener('click', function(e) {
        e.stopPropagation(); 
        toggleSearch();
    });

    // Tombol close
    searchClose.addEventListener('click', function(e) {
        e.stopPropagation();
        toggleSearch();
    });

    // Klik di luar popup untuk menutup
    document.addEventListener('click', function(e) {
        if (searchBox.classList.contains('active') &&
            !searchBox.contains(e.target) &&
            !searchBtn.contains(e.target)) {
            toggleSearch();
        }
    });

    // ESC key untuk menutup
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && searchBox.classList.contains('active')) {
            toggleSearch();
        }
    });
});


    </script>
</body>
</html>
