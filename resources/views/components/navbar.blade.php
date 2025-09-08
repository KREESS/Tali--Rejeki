<nav class="premium-navbar" id="mainNavbar">
    <div class="navbar-container">
        <!-- Brand Logo -->
        <div class="navbar-brand">
            <a href="{{ route('home') }}" style="display: flex; align-items: center; gap: 15px; text-decoration: none; color: inherit;">
                <img src="{{ asset('img/icon-logo/tali-rejeki.jpg') }}" alt="Tali Rejeki" class="brand-logo">
                <div class="brand-text">
                    <span class="brand-name">Tali Rejeki</span>
                    <span class="brand-tagline">Distributor Insulasi Industri</span>
                </div>
            </a>
        </div>

        <!-- Mobile Menu Toggle -->
        <button class="mobile-toggle" onclick="toggleMobileMenu()">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <!-- Navigation Menu -->
        <div class="navbar-menu" id="navbarMenu">
            <ul class="nav-links">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-translate="nav-home">
                        <i class="fas fa-home"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" data-translate="nav-about">
                        <i class="fas fa-info-circle"></i>
                        <span>Tentang</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="{{ route('products') }}" class="nav-link dropdown-toggle {{ request()->routeIs('products*') ? 'active' : '' }}" data-translate="nav-products">
                        <i class="fas fa-th-large"></i>
                        <span>Produk</span>
                        <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu" id="categoriesDropdown">
                        <!-- Categories will be loaded dynamically from database -->
                        @if(isset($categories) && $categories->count() > 0)
                            @foreach($categories as $category)
                                <a href="{{ route('products.category', $category->slug) }}" class="dropdown-item">
                                    <i class="fas fa-cube"></i>
                                    <span class="item-title">{{ $category->name }}</span>
                                </a>
                            @endforeach
                        @else
                            <!-- Default categories -->
                            <a href="{{ route('products') }}" class="dropdown-item">
                                <i class="fas fa-fire"></i>
                                <span class="item-title">Glasswool</span>
                            </a>
                            <a href="{{ route('products') }}" class="dropdown-item">
                                <i class="fas fa-mountain"></i>
                                <span class="item-title">Rockwool</span>
                            </a>
                            <a href="{{ route('products') }}" class="dropdown-item">
                                <i class="fas fa-shield-alt"></i>
                                <span class="item-title">Nitrile Rubber</span>
                            </a>
                            <a href="{{ route('products') }}" class="dropdown-item">
                                <i class="fas fa-tools"></i>
                                <span class="item-title">Aksesoris HVAC</span>
                            </a>
                        @endif
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('catalog') }}" class="nav-link {{ request()->routeIs('catalog*') ? 'active' : '' }}" data-translate="nav-catalog">
                        <i class="fas fa-book"></i>
                        <span>Katalog Produk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('gallery') }}" class="nav-link {{ request()->routeIs('gallery*') ? 'active' : '' }}" data-translate="nav-gallery">
                        <i class="fas fa-images"></i>
                        <span>Galeri</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('career') }}" class="nav-link {{ request()->routeIs('career*') ? 'active' : '' }}" data-translate="nav-career">
                        <i class="fas fa-briefcase"></i>
                        <span>Karier</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact*') ? 'active' : '' }}" data-translate="nav-contact">
                        <i class="fas fa-phone"></i>
                        <span>Hubungi Kami</span>
                    </a>
                </li>
            </ul>
            
            {{-- <!-- Theme Toggle Button -->
            <div class="theme-toggle-container ms-3">
                <button class="theme-toggle-btn" onclick="toggleTheme()" title="Toggle theme">
                    <i class="theme-icon fas fa-moon"></i>
                </button>
            </div> --}}
        </div>
    </div>
</nav>

<style>
/* ===== MODERN NAVBAR STYLING ===== */
.premium-navbar {
    position: fixed;
    top: 45px;
    left: 0;
    right: 0;
    z-index: 10000;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px) saturate(180%);
    -webkit-backdrop-filter: blur(20px) saturate(180%);
    border-bottom: 1px solid rgba(229, 231, 235, 0.6);
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.08);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Light theme navbar */
body.light-theme .premium-navbar {
    background: rgba(255, 255, 255, 0.95);
    border-bottom: 1px solid rgba(229, 231, 235, 0.6);
}

/* Dark theme navbar */
body.dark-theme .premium-navbar {
    background: rgba(15, 23, 42, 0.95);
    border-bottom: 1px solid rgba(71, 85, 105, 0.6);
}

.premium-navbar.scrolled {
    background: rgba(255, 255, 255, 0.98);
    backdrop-filter: blur(25px) saturate(200%);
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.12);
    border-bottom: 1px solid rgba(229, 231, 235, 0.8);
}

/* Light theme scrolled navbar */
body.light-theme .premium-navbar.scrolled {
    background: rgba(255, 255, 255, 0.98);
    border-bottom: 1px solid rgba(229, 231, 235, 0.8);
}

/* Dark theme scrolled navbar */
body.dark-theme .premium-navbar.scrolled {
    background: rgba(15, 23, 42, 0.98);
    border-bottom: 1px solid rgba(71, 85, 105, 0.8);
}

.navbar-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 30px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 75px;
    position: relative;
}

/* Brand Section */
.navbar-brand {
    display: flex;
    align-items: center;
    gap: 15px;
    cursor: pointer;
    transition: all 0.3s ease;
    padding: 8px 0;
}

.navbar-brand:hover {
    transform: translateY(-2px);
}

.brand-logo {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    object-fit: cover;
    border: 2px solid rgba(124, 20, 21, 0.15);
    box-shadow: 
        0 4px 15px rgba(124, 20, 21, 0.1),
        0 2px 8px rgba(0, 0, 0, 0.08);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.brand-logo:hover {
    border-color: rgba(124, 20, 21, 0.3);
    box-shadow: 
        0 8px 25px rgba(124, 20, 21, 0.2),
        0 4px 15px rgba(0, 0, 0, 0.12);
    transform: scale(1.05) rotate(2deg);
}

.brand-text {
    display: flex;
    flex-direction: column;
}

.brand-name {
    font-size: 20px;
    font-weight: 800;
    color: #1f2937;
    line-height: 1;
    background: linear-gradient(135deg, #7c1415, #b71c1c, #dc2626);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    letter-spacing: -0.5px;
}

.brand-tagline {
    font-size: 11px;
    font-weight: 600;
    color: #6b7280;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    opacity: 0.8;
}

/* Mobile Toggle */
.mobile-toggle {
    display: none;
    flex-direction: column;
    gap: 4px;
    background: none;
    border: none;
    cursor: pointer;
    padding: 8px;
    border-radius: 6px;
    transition: all 0.3s ease;
}

.mobile-toggle span {
    width: 24px;
    height: 2px;
    background: #374151;
    border-radius: 1px;
    transition: all 0.3s ease;
}

.mobile-toggle:hover {
    background: rgba(124, 20, 21, 0.08);
}

.mobile-toggle.active span:nth-child(1) {
    transform: rotate(45deg) translate(5px, 5px);
}

.mobile-toggle.active span:nth-child(2) {
    opacity: 0;
}

.mobile-toggle.active span:nth-child(3) {
    transform: rotate(-45deg) translate(7px, -6px);
}

/* Navigation Menu */
.navbar-menu {
    display: flex;
    align-items: center;
}

.nav-links {
    display: flex;
    align-items: center;
    gap: 8px;
    list-style: none;
    margin: 0;
    padding: 0;
}

.nav-item {
    position: relative;
}

.nav-link {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 12px 18px;
    color: #374151;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    border-radius: 12px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    white-space: nowrap;
    overflow: hidden;
}

.nav-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, 
        rgba(124, 20, 21, 0.1) 0%, 
        rgba(124, 20, 21, 0.05) 100%);
    transition: left 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    z-index: -1;
}

.nav-link:hover::before,
.nav-link.active::before {
    left: 0;
}

.nav-link:hover,
.nav-link.active {
    color: #7c1415;
    background: rgba(124, 20, 21, 0.08);
    transform: translateY(-2px);
    box-shadow: 
        0 4px 15px rgba(124, 20, 21, 0.15),
        0 2px 8px rgba(0, 0, 0, 0.08);
}

.nav-link i {
    font-size: 14px;
    width: 18px;
    text-align: center;
    transition: all 0.3s ease;
}

.nav-link:hover i {
    transform: scale(1.1);
}

/* Dropdown Styles */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Debug: Temporary visible dropdown for testing */
.dropdown .dropdown-menu {
    /* Dropdown normal state - hidden by default */
}

.dropdown-toggle .fa-chevron-down {
    font-size: 10px;
    transition: transform 0.3s ease;
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    min-width: 250px;
    background: white;
    border-radius: 16px;
    border: 1px solid #e5e7eb;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    opacity: 0;
    visibility: hidden;
    transform: translateY(0px);
    transition: all 0.3s ease;
    padding: 8px;
    z-index: 999999;
    margin-top: 0px;
    display: block;
    pointer-events: none;
}

/* Desktop hover states - MORE SPECIFIC */
@media (min-width: 769px) {
    .dropdown:hover > .dropdown-menu,
    .dropdown.show > .dropdown-menu {
        opacity: 1 !important;
        visibility: visible !important;
        transform: translateY(0) !important;
        pointer-events: auto !important;
        display: block !important;
    }
    
    /* Ensure dropdown arrow rotates */
    .dropdown:hover .dropdown-toggle .fa-chevron-down,
    .dropdown.show .dropdown-toggle .fa-chevron-down {
        transform: rotate(180deg);
    }
    
    /* Remove top border radius to connect with navbar */
    .dropdown:hover > .dropdown-menu,
    .dropdown.show > .dropdown-menu {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        margin-top: -1px;
    }
}

.dropdown-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 12px 18px;
    color: #374151;
    text-decoration: none;
    border-radius: 12px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    margin-bottom: 4px;
    position: relative;
    overflow: hidden;
}

.dropdown-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, 
        rgba(124, 20, 21, 0.08) 0%, 
        rgba(124, 20, 21, 0.05) 100%);
    transition: left 0.5s ease;
}

.dropdown-item:hover::before {
    left: 0;
}

.dropdown-item:hover {
    background: rgba(124, 20, 21, 0.08);
    color: #7c1415;
    transform: translateX(6px);
    box-shadow: 0 4px 12px rgba(124, 20, 21, 0.1);
}

.dropdown-item:last-child {
    margin-bottom: 0;
}

.dropdown-item i {
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, 
        rgba(124, 20, 21, 0.1) 0%, 
        rgba(124, 20, 21, 0.05) 100%);
    border-radius: 10px;
    color: #7c1415;
    font-size: 16px;
    flex-shrink: 0;
    transition: all 0.3s ease;
}

.dropdown-item:hover i {
    background: linear-gradient(135deg, #7c1415, #b71c1c);
    color: white;
    transform: scale(1.1) rotate(5deg);
}

.item-title {
    font-weight: 700;
    font-size: 15px;
    color: #2d3748;
    transition: color 0.3s ease;
    flex: 1;
}

.dropdown-item:hover .item-title {
    color: #7c1415;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .navbar-container {
        padding: 0 25px;
    }
    
    .nav-links {
        gap: 12px;
    }
    
    .nav-link {
        padding: 8px 12px;
        font-size: 13px;
    }
}

@media (max-width: 1024px) {
    .nav-links {
        gap: 6px;
    }
    
    .nav-link {
        padding: 10px 14px;
        font-size: 13px;
    }
}

@media (max-width: 920px) {
    .nav-link span {
        display: none;
    }
    
    .nav-link {
        padding: 12px;
        border-radius: 10px;
    }
    
    .nav-link i {
        font-size: 16px;
        width: auto;
    }
}

@media (max-width: 768px) {
    .mobile-toggle {
        display: flex;
    }
    
    .navbar-menu {
        position: fixed;
        top: 75px;
        left: 0;
        right: 0;
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(25px) saturate(180%);
        border-top: 1px solid rgba(229, 231, 235, 0.8);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
        flex-direction: column;
        padding: 25px;
        gap: 0;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-20px);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        max-height: calc(100vh - 115px);
        overflow-y: auto;
    }
    
    .navbar-menu.active {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }
    
    .nav-links {
        flex-direction: column;
        width: 100%;
        gap: 8px;
    }
    
    .nav-item {
        width: 100%;
    }
    
    .nav-link {
        width: 100%;
        padding: 18px 24px;
        justify-content: flex-start;
        border-radius: 15px;
        margin-bottom: 0;
        font-size: 16px;
        font-weight: 600;
    }
    
    .nav-link span {
        display: inline;
    }
    
    .nav-link i {
        font-size: 18px;
        width: 24px;
    }
    
    .dropdown-menu {
        position: static;
        opacity: 1;
        visibility: visible;
        transform: none;
        margin: 12px 0 0 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(229, 231, 235, 0.5);
        background: rgba(248, 250, 252, 0.95);
        display: none;
        backdrop-filter: blur(10px);
        border-radius: 12px;
        padding: 8px;
        pointer-events: auto;
        max-height: 300px;
        overflow-y: auto;
    }
    
    .dropdown.active .dropdown-menu {
        display: block !important;
        animation: slideDown 0.3s ease;
    }
    
    /* Mobile dropdown items styling */
    @media (max-width: 768px) {
        .dropdown-item {
            padding: 10px 16px;
            margin-bottom: 3px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.5);
            border: 1px solid rgba(229, 231, 235, 0.3);
        }
        
        .dropdown-item:hover {
            background: rgba(124, 20, 21, 0.1);
            transform: translateX(4px);
        }
        
        .dropdown-item i {
            width: 30px;
            height: 30px;
            font-size: 14px;
        }
        
        .item-title {
            font-size: 14px;
            font-weight: 600;
        }
    }
    
    .brand-name {
        font-size: 18px;
    }
    
    .brand-tagline {
        font-size: 10px;
    }
    
    .brand-logo {
        width: 45px;
        height: 45px;
    }
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
}

@keyframes glow {
    0%, 100% {
        box-shadow: 
            0 4px 15px rgba(124, 20, 21, 0.3),
            0 2px 8px rgba(0, 0, 0, 0.1);
    }
    50% {
        box-shadow: 
            0 6px 20px rgba(124, 20, 21, 0.4),
            0 3px 12px rgba(0, 0, 0, 0.15);
    }
}

/* Enhanced hover effects */
.nav-link:active {
    transform: translateY(-1px) scale(0.98);
}

/* Smooth scrolling for entire page */
html {
    scroll-behavior: smooth;
}

/* Focus states for accessibility */
.nav-link:focus {
    outline: 2px solid rgba(124, 20, 21, 0.5);
    outline-offset: 2px;
}

body.dark-theme .nav-link:focus {
    outline: 2px solid rgba(251, 191, 36, 0.5);
}

@media (max-width: 480px) {
    .navbar-container {
        padding: 0 20px;
        height: 70px;
    }
    
    .navbar-menu {
        top: 105px; /* 35px (topbar mobile) + 70px (navbar mobile) */
        padding: 20px;
    }
    
    .nav-link {
        padding: 16px 20px;
        font-size: 15px;
    }
    
    .brand-name {
        font-size: 16px;
    }
    
    .brand-logo {
        width: 42px;
        height: 42px;
    }
    
    .brand-text {
        gap: 2px;
    }
}

/* Scroll Behavior */
body {
    padding-top: 120px; /* 45px (topbar) + 75px (navbar) */
}

@media (max-width: 768px) {
    body {
        padding-top: 120px; /* 45px (topbar) + 75px (navbar) */
    }
}

@media (max-width: 480px) {
    body {
        padding-top: 105px; /* 35px (topbar mobile) + 70px (navbar mobile) */
    }
}

/* Theme-specific navbar text colors */
body.light-theme .nav-link {
    color: #374151;
}

body.dark-theme .nav-link {
    color: #e2e8f0;
}

body.light-theme .nav-link:hover,
body.light-theme .nav-link.active {
    color: #7c1415;
    background: rgba(124, 20, 21, 0.08);
}

body.dark-theme .nav-link:hover,
body.dark-theme .nav-link.active {
    color: #fbbf24;
    background: rgba(251, 191, 36, 0.1);
}

body.light-theme .brand-name {
    background: linear-gradient(135deg, #7c1415, #b71c1c);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
}

body.dark-theme .brand-name {
    background: linear-gradient(135deg, #fbbf24, #f59e0b);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
}

body.light-theme .brand-tagline {
    color: #6b7280;
}

body.dark-theme .brand-tagline {
    color: #94a3b8;
}

/* Dark theme dropdown menu */
body.dark-theme .dropdown-menu {
    background: rgba(15, 23, 42, 0.98);
    border: 1px solid rgba(71, 85, 105, 0.8);
}

body.dark-theme .dropdown-item {
    color: #e2e8f0;
}

body.dark-theme .dropdown-item i {
    background: linear-gradient(135deg, 
        rgba(251, 191, 36, 0.1) 0%, 
        rgba(251, 191, 36, 0.05) 100%);
    color: #fbbf24;
}

body.dark-theme .dropdown-item:hover i {
    background: linear-gradient(135deg, #fbbf24, #f59e0b);
    color: #1e293b;
}

body.dark-theme .item-title {
    color: #f1f5f9;
}

body.dark-theme .item-desc {
    color: #94a3b8;
}

body.dark-theme .mobile-toggle span {
    background: #e2e8f0;
}

/* Theme Toggle Button */
.theme-toggle-container {
    display: flex;
    align-items: center;
}

.theme-toggle-btn {
    width: 40px;
    height: 40px;
    border: none;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    color: #fff;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
}

.theme-toggle-btn:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: scale(1.1);
}

body.light-theme .theme-toggle-btn {
    background: rgba(139, 0, 0, 0.1);
    color: #8b0000;
}

body.light-theme .theme-toggle-btn:hover {
    background: rgba(139, 0, 0, 0.2);
}

body.dark-theme .theme-toggle-btn {
    background: rgba(255, 255, 255, 0.1);
    color: #fff;
}

body.dark-theme .theme-toggle-btn:hover {
    background: rgba(255, 255, 255, 0.2);
}

@media (max-width: 768px) {
    body.dark-theme .navbar-menu {
        background: rgba(15, 23, 42, 0.98);
        border-top: 1px solid rgba(71, 85, 105, 0.8);
    }
    
    body.dark-theme .dropdown-menu {
        background: rgba(30, 41, 59, 0.8);
    }
}
</style>

<script>
// Modern Navbar functionality
document.addEventListener('DOMContentLoaded', function() {
    console.log('Navbar script loaded'); // Debug
    
    const navbar = document.getElementById('mainNavbar');
    const mobileToggle = document.querySelector('.mobile-toggle');
    const navbarMenu = document.getElementById('navbarMenu');
    const dropdowns = document.querySelectorAll('.dropdown');
    
    console.log('Found dropdowns:', dropdowns.length); // Debug

    // Enhanced scroll effect with throttling
    let lastScrollY = window.scrollY;
    let ticking = false;
    
    function updateNavbar() {
        const currentScrollY = window.scrollY;
        
        if (currentScrollY > 20) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
        
        lastScrollY = currentScrollY;
        ticking = false;
    }
    
    window.addEventListener('scroll', function() {
        if (!ticking) {
            requestAnimationFrame(updateNavbar);
            ticking = true;
        }
    });

    // Mobile menu toggle
    function toggleMobileMenu() {
        mobileToggle.classList.toggle('active');
        navbarMenu.classList.toggle('active');
        document.body.style.overflow = navbarMenu.classList.contains('active') ? 'hidden' : 'auto';
    }

    // Theme toggle function
    window.toggleTheme = function() {
        const body = document.body;
        const currentTheme = body.classList.contains('dark-theme') ? 'dark' : 'light';
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';
        
        if (newTheme === 'dark') {
            body.classList.add('dark-theme');
            body.classList.remove('light-theme');
        } else {
            body.classList.add('light-theme');
            body.classList.remove('dark-theme');
        }
        
        localStorage.setItem('theme', newTheme);
        updateThemeIcon();
        
        // Update meta theme-color for mobile browsers
        const metaThemeColor = document.querySelector('meta[name="theme-color"]');
        if (metaThemeColor) {
            metaThemeColor.setAttribute('content', newTheme === 'dark' ? '#1a1a1a' : '#7c1415');
        }
    };

    // Update theme icon
    function updateThemeIcon() {
        const icon = document.querySelector('.theme-icon');
        const isDark = document.body.classList.contains('dark-theme');
        if (icon) {
            icon.className = `theme-icon fas fa-${isDark ? 'sun' : 'moon'}`;
        }
    }

    // Initialize theme icon on page load
    updateThemeIcon();

    // Improved dropdown handling
    dropdowns.forEach(dropdown => {
        const toggle = dropdown.querySelector('.dropdown-toggle');
        const menu = dropdown.querySelector('.dropdown-menu');
        
        if (toggle && menu) {
            console.log('Dropdown found:', dropdown); // Debug
            
            // Desktop hover behavior
            dropdown.addEventListener('mouseenter', function() {
                if (window.innerWidth > 768) {
                    console.log('Desktop hover enter'); // Debug
                    dropdown.classList.add('show');
                    // Force show with inline styles as backup
                    menu.style.opacity = '1';
                    menu.style.visibility = 'visible';
                    menu.style.transform = 'translateY(0)';
                    menu.style.pointerEvents = 'auto';
                    menu.style.marginTop = '-1px';
                    menu.style.borderTopLeftRadius = '0';
                    menu.style.borderTopRightRadius = '0';
                }
            });
            
            dropdown.addEventListener('mouseleave', function() {
                if (window.innerWidth > 768) {
                    console.log('Desktop hover leave'); // Debug
                    dropdown.classList.remove('show');
                    // Reset inline styles
                    menu.style.opacity = '';
                    menu.style.visibility = '';
                    menu.style.transform = '';
                    menu.style.pointerEvents = '';
                    menu.style.marginTop = '';
                    menu.style.borderTopLeftRadius = '';
                    menu.style.borderTopRightRadius = '';
                }
            });
            
            // Click handler for both mobile and desktop
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                console.log('Dropdown clicked, window width:', window.innerWidth); // Debug
                
                if (window.innerWidth <= 768) {
                    // Mobile behavior
                    console.log('Mobile dropdown toggle'); // Debug
                    
                    // Close other dropdowns first
                    dropdowns.forEach(otherDropdown => {
                        if (otherDropdown !== dropdown) {
                            otherDropdown.classList.remove('active');
                            const otherMenu = otherDropdown.querySelector('.dropdown-menu');
                            if (otherMenu) {
                                otherMenu.style.display = 'none';
                            }
                        }
                    });
                    
                    // Toggle current dropdown
                    const isActive = dropdown.classList.contains('active');
                    if (isActive) {
                        dropdown.classList.remove('active');
                        menu.style.display = 'none';
                    } else {
                        dropdown.classList.add('active');
                        menu.style.display = 'block';
                    }
                } else {
                    // Desktop click behavior
                    console.log('Desktop dropdown toggle'); // Debug
                    const isShown = dropdown.classList.contains('show');
                    
                    // Close all dropdowns first
                    dropdowns.forEach(otherDropdown => {
                        otherDropdown.classList.remove('show');
                        const otherMenu = otherDropdown.querySelector('.dropdown-menu');
                        if (otherMenu) {
                            otherMenu.style.opacity = '';
                            otherMenu.style.visibility = '';
                            otherMenu.style.transform = '';
                            otherMenu.style.pointerEvents = '';
                            otherMenu.style.marginTop = '';
                            otherMenu.style.borderTopLeftRadius = '';
                            otherMenu.style.borderTopRightRadius = '';
                        }
                    });
                    
                    // Toggle current if it wasn't shown
                    if (!isShown) {
                        dropdown.classList.add('show');
                        menu.style.opacity = '1';
                        menu.style.visibility = 'visible';
                        menu.style.transform = 'translateY(0)';
                        menu.style.pointerEvents = 'auto';
                        menu.style.marginTop = '-1px';
                        menu.style.borderTopLeftRadius = '0';
                        menu.style.borderTopRightRadius = '0';
                    }
                }
            });
        }
    });
    
    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        // Close all dropdowns if clicking outside
        if (!e.target.closest('.dropdown')) {
            dropdowns.forEach(dropdown => {
                dropdown.classList.remove('show', 'active');
                const menu = dropdown.querySelector('.dropdown-menu');
                if (menu) {
                    menu.style.opacity = '';
                    menu.style.visibility = '';
                    menu.style.transform = '';
                    menu.style.pointerEvents = '';
                    menu.style.display = '';
                    menu.style.marginTop = '';
                    menu.style.borderTopLeftRadius = '';
                    menu.style.borderTopRightRadius = '';
                }
            });
        }
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(e) {
        if (!navbar.contains(e.target) && navbarMenu.classList.contains('active')) {
            toggleMobileMenu();
        }
    });

    // Close menu on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && navbarMenu.classList.contains('active')) {
            toggleMobileMenu();
        }
    });

    // Enhanced smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const navbarHeight = navbar.offsetHeight;
                const targetPosition = target.offsetTop - navbarHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
                
                // Close mobile menu if open
                if (navbarMenu.classList.contains('active')) {
                    toggleMobileMenu();
                }
            }
        });
    });

    // Close mobile menu on resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768 && navbarMenu.classList.contains('active')) {
            toggleMobileMenu();
            dropdowns.forEach(dropdown => {
                dropdown.classList.remove('active');
            });
        }
    });

    // Make toggleMobileMenu globally accessible
    window.toggleMobileMenu = toggleMobileMenu;
});
</script>
