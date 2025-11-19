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
                        <span>Beranda</span>
                    </a>
                </li>
                <li class="nav-item custom-dropdown">
                    <a href="{{ route('products') }}" class="nav-link custom-dropdown-toggle {{ request()->routeIs('products*') ? 'active' : '' }}" data-translate="nav-products">
                        <span>Produk</span>
                        <svg class="custom-dropdown-icon" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <div class="custom-dropdown-menu" id="categoriesDropdown">
                        <!-- Categories will be loaded dynamically from database -->
                        @if(isset($categories) && $categories->count() > 0)
                            @foreach($categories as $category)
                                <a href="{{ route('products.category', $category->slug) }}" class="custom-dropdown-item">
                                    <span class="item-title">{{ $category->name }}</span>
                                </a>
                            @endforeach
                        @else
                            <span class="custom-dropdown-item">No categories available</span>
                        @endif
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('catalog1-page') }}" class="nav-link {{ request()->routeIs('catalog1-page*') ? 'active' : '' }}" data-translate="nav-catalog">
                        <span>Katalog Produk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('gallery') }}" class="nav-link {{ request()->routeIs('gallery*') ? 'active' : '' }}" data-translate="nav-gallery">
                        <span>Galeri</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact*') ? 'active' : '' }}" data-translate="nav-contact">
                        <span>Hubungi Kami</span>
                    </a>
                </li>
            </ul>
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

/* Scrolled navbar - transparent effect */
.premium-navbar.scrolled {
    backdrop-filter: blur(5px) saturate(200%);
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.12);
    background: rgba(255, 255, 255, 0.85);
    border-bottom: 1px solid rgba(229, 231, 235, 0.6);
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

/* Custom Dropdown Icon - Fixed */
.custom-dropdown-icon {
    width: 12px;
    height: 12px;
    transition: transform 0.3s ease;
    flex-shrink: 0;
    margin-left: 4px;
}

/* Custom Dropdown Styles - UNIQUE CLASSES */
.custom-dropdown {
    position: relative;
    display: inline-block;
}

.custom-dropdown-menu {
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
    .custom-dropdown:hover > .custom-dropdown-menu,
    .custom-dropdown.custom-show > .custom-dropdown-menu {
        opacity: 1 !important;
        visibility: visible !important;
        transform: translateY(0) !important;
        pointer-events: auto !important;
        display: block !important;
    }
    
    /* Ensure dropdown arrow rotates */
    .custom-dropdown:hover .custom-dropdown-icon,
    .custom-dropdown.custom-show .custom-dropdown-icon {
        transform: rotate(180deg);
    }
    
    /* Remove top border radius to connect with navbar */
    .custom-dropdown:hover > .custom-dropdown-menu,
    .custom-dropdown.custom-show > .custom-dropdown-menu {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        margin-top: -1px;
    }
}

.custom-dropdown-item {
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
    /* Ensure visibility is maintained */
    opacity: 1 !important;
    visibility: visible !important;
}

.custom-dropdown-item::before {
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

.custom-dropdown-item:hover::before {
    left: 0;
}

.custom-dropdown-item:hover {
    background: rgba(124, 20, 21, 0.08);
    color: #7c1415;
    transform: translateX(6px);
    box-shadow: 0 4px 12px rgba(124, 20, 21, 0.1);
}

.custom-dropdown-item:last-child {
    margin-bottom: 0;
}

.custom-dropdown-item i {
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

.custom-dropdown-item:hover i {
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

.custom-dropdown-item:hover .item-title {
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
    
    .custom-dropdown-icon {
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
    
    .custom-dropdown-icon {
        font-size: 18px;
        width: 24px;
        height: 24px;
        margin-left: auto;
    }
    
    .custom-dropdown-menu {
        position: static;
        opacity: 1 !important;
        visibility: visible !important;
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
    
    .custom-dropdown.custom-active .custom-dropdown-menu {
        display: block !important;
        animation: slideDown 0.3s ease;
    }
    
    .custom-dropdown.custom-active .custom-dropdown-icon {
        transform: rotate(180deg);
    }
    
    /* Mobile dropdown items styling */
    @media (max-width: 768px) {
        .custom-dropdown-item {
            padding: 10px 16px;
            margin-bottom: 3px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.5);
            border: 1px solid rgba(229, 231, 235, 0.3);
            /* Ensure visibility is maintained */
            opacity: 1 !important;
            visibility: visible !important;
        }
        
        .custom-dropdown-item:hover {
            background: rgba(124, 20, 21, 0.1);
            transform: translateX(4px);
        }
        
        .custom-dropdown-item i {
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

/* Focus states for accessibility */
.nav-link:focus {
    outline: 2px solid rgba(124, 20, 21, 0.5);
    outline-offset: 2px;
}

@media (max-width: 480px) {
    .premium-navbar {
        top: 35px;
    }
    
    .navbar-container {
    }
    
    .navbar-menu {
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
    .premium-navbar {
        top: 35px;
    }

    body {
        padding-top: 110px; /* 35px (topbar mobile) + 70px (navbar mobile) */
    }
}
</style>

<script>
// Modern Navbar functionality (fixed)
document.addEventListener('DOMContentLoaded', function () {
    const navbar      = document.getElementById('mainNavbar');
    const mobileToggle= document.querySelector('.mobile-toggle');
    const navbarMenu  = document.getElementById('navbarMenu');
    const dropdowns   = document.querySelectorAll('.custom-dropdown');

    // ===== Scroll effect (throttled) =====
    let ticking = false;
    function updateNavbar() {
      if (!navbar) { ticking = false; return; }
      const y = window.scrollY || 0;
      if (y > 20) navbar.classList.add('scrolled');
      else navbar.classList.remove('scrolled');
      ticking = false;
    }
    window.addEventListener('scroll', function () {
      if (!ticking) {
        requestAnimationFrame(updateNavbar);
        ticking = true;
      }
    });

    // ===== Mobile menu toggle =====
    function toggleMobileMenu() {
      if (!mobileToggle || !navbarMenu) return;
      mobileToggle.classList.toggle('active');
      navbarMenu.classList.toggle('active');
      document.body.style.overflow = navbarMenu.classList.contains('active') ? 'hidden' : 'auto';
    }
    window.toggleMobileMenu = toggleMobileMenu; // expose

    // ===== Dropdown handling (desktop hover, desktop chevron click, mobile toggle) =====
    dropdowns.forEach((dropdown) => {
      const toggle = dropdown.querySelector('.custom-dropdown-toggle');
      const menu   = dropdown.querySelector('.custom-dropdown-menu');
      const icon   = dropdown.querySelector('.custom-dropdown-icon');
      if (!toggle || !menu || !icon) return;

      // Desktop hover: show/hide via class (tanpa inline style)
      dropdown.addEventListener('mouseenter', function () {
        if (window.innerWidth > 768) {
          dropdown.classList.add('custom-show');
        }
      });
      dropdown.addEventListener('mouseleave', function () {
        if (window.innerWidth > 768) {
          dropdown.classList.remove('custom-show');
        }
      });

      // Click (desktop/mobile)
      toggle.addEventListener('click', function (e) {
        const isDesktop   = window.innerWidth > 768;
        const href        = toggle.getAttribute('href') || '';
        const isRealLink  = href && href !== '#' && !href.startsWith('javascript:');
        const clickedIcon = e.target.closest('.custom-dropdown-icon');

        if (isDesktop) {
          // Desktop:
          // - Klik icon => toggle dropdown (prevent default)
          // - Klik teks "Produk" (href valid) => biarkan navigate (jangan prevent)
          if (clickedIcon) {
            e.preventDefault();
            // Tutup dropdown lain
            dropdowns.forEach((d) => {
              if (d !== dropdown) {
                d.classList.remove('custom-show');
                const otherIcon = d.querySelector('.custom-dropdown-icon');
                if (otherIcon) otherIcon.style.transform = '';
              }
            });
            // Toggle current
            dropdown.classList.toggle('custom-show');
            icon.style.transform = dropdown.classList.contains('custom-show') ? 'rotate(180deg)' : '';
            return;
          }
          if (isRealLink) {
            // Biarkan navigate ke /products
            return; // NO preventDefault
          }
          // Jika bukan link nyata (misal '#'), jadikan tombol toggle
          e.preventDefault();
          dropdowns.forEach((d) => {
            if (d !== dropdown) {
              d.classList.remove('custom-show');
              const otherIcon = d.querySelector('.custom-dropdown-icon');
              if (otherIcon) otherIcon.style.transform = '';
            }
          });
          dropdown.classList.toggle('custom-show');
          icon.style.transform = dropdown.classList.contains('custom-show') ? 'rotate(180deg)' : '';
        } else {
          // Mobile: selalu toggle dropdown (tanpa navigasi)
          e.preventDefault();
          // Tutup dropdown lain dulu
          dropdowns.forEach((d) => {
            if (d !== dropdown) {
              d.classList.remove('custom-active');
              const m = d.querySelector('.custom-dropdown-menu');
              if (m) m.style.display = 'none';
              const otherIcon = d.querySelector('.custom-dropdown-icon');
              if (otherIcon) otherIcon.style.transform = '';
            }
          });
          // Toggle current
          const isActive = dropdown.classList.contains('custom-active');
          if (isActive) {
            dropdown.classList.remove('custom-active');
            menu.style.display = 'none';
            icon.style.transform = '';
          } else {
            dropdown.classList.add('custom-active');
            menu.style.display = 'block';
            icon.style.transform = 'rotate(180deg)';
          }
        }
      });
      
      // Prevent dropdown items from closing the dropdown when clicked
      const dropdownItems = menu.querySelectorAll('.custom-dropdown-item');
      dropdownItems.forEach(item => {
        item.addEventListener('click', function(e) {
          // Allow normal navigation but prevent dropdown from closing
          e.stopPropagation();
          
          // On mobile, keep the dropdown open after clicking an item
          if (window.innerWidth <= 768) {
            // Don't close the dropdown menu on mobile
            return false;
          }
        });
      });
    });

    // ===== Close dropdowns when clicking outside =====
    document.addEventListener('click', function (e) {
      const clickInsideDropdown = e.target.closest('.custom-dropdown');
      const clickInsideNavbar   = navbar && navbar.contains(e.target);

      if (!clickInsideDropdown) {
        dropdowns.forEach((dropdown) => {
          dropdown.classList.remove('custom-show', 'custom-active');
          const menu = dropdown.querySelector('.custom-dropdown-menu');
          const icon = dropdown.querySelector('.custom-dropdown-icon');
          if (menu) {
            // reset hanya untuk mobile toggle
            if (window.innerWidth <= 768) menu.style.display = '';
          }
          if (icon) icon.style.transform = '';
        });
      }

      // Tutup mobile menu bila klik di luar navbar
      if (!clickInsideNavbar && navbarMenu && navbarMenu.classList.contains('active')) {
        toggleMobileMenu();
      }
    });

    // ===== Close menu on Escape =====
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && navbarMenu && navbarMenu.classList.contains('active')) {
        toggleMobileMenu();
      }
    });

    // ===== Smooth scroll anchor =====
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
      anchor.addEventListener('click', function (e) {
        const target = document.querySelector(this.getAttribute('href'));
        if (!target) return;
        e.preventDefault();
        const navbarHeight = navbar ? navbar.offsetHeight : 0;
        const top = target.offsetTop - navbarHeight;
        window.scrollTo({ top, behavior: 'smooth' });
        if (navbarMenu && navbarMenu.classList.contains('active')) {
          toggleMobileMenu();
        }
      });
    });

    // ===== On resize: close mobile menu & reset active dropdowns =====
    window.addEventListener('resize', function () {
      if (window.innerWidth > 768 && navbarMenu && navbarMenu.classList.contains('active')) {
        toggleMobileMenu();
      }
      dropdowns.forEach((dropdown) => {
        dropdown.classList.remove('custom-active');
        const menu = dropdown.querySelector('.custom-dropdown-menu');
        const icon = dropdown.querySelector('.custom-dropdown-icon');
        if (menu) menu.style.display = '';
        if (icon) icon.style.transform = '';
      });
    });
});
</script>