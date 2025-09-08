<nav class="premium-navbar" id="mainNavbar">
    <div class="navbar-container">
        <!-- Brand Logo -->
        <div class="navbar-brand">
            <img src="{{ asset('img/icon-logo/tali-rejeki.jpg') }}" alt="Tali Rejeki" class="brand-logo">
            <div class="brand-text">
                <span class="brand-name">Tali Rejeki</span>
                <span class="brand-tagline">Distributor Insulasi Industri</span>
            </div>
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
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle">
                        <i class="fas fa-th-large"></i>
                        <span>Kategori Produk</span>
                        <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-fire"></i>
                            <div>
                                <span class="item-title">Glasswool</span>
                                <span class="item-desc">Insulasi berkualitas tinggi</span>
                            </div>
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-mountain"></i>
                            <div>
                                <span class="item-title">Rockwool</span>
                                <span class="item-desc">Insulasi tahan api</span>
                            </div>
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-shield-alt"></i>
                            <div>
                                <span class="item-title">Nitrile Rubber</span>
                                <span class="item-desc">Karet sintetis premium</span>
                            </div>
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-tools"></i>
                            <div>
                                <span class="item-title">Aksesoris HVAC</span>
                                <span class="item-desc">Komponen pendukung</span>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cubes"></i>
                        <span>Produk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-building"></i>
                        <span>Proyek Kami</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-newspaper"></i>
                        <span>Artikel</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-briefcase"></i>
                        <span>Karier</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-info-circle"></i>
                        <span>Tentang</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-phone"></i>
                        <span>Kontak</span>
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
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px) saturate(180%);
    -webkit-backdrop-filter: blur(20px) saturate(180%);
    border-bottom: 1px solid rgba(229, 231, 235, 0.6);
    box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
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
    height: 70px;
    position: relative;
}

/* Brand Section */
.navbar-brand {
    display: flex;
    align-items: center;
    gap: 12px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.navbar-brand:hover {
    transform: translateY(-1px);
}

.brand-logo {
    width: 45px;
    height: 45px;
    border-radius: 10px;
    object-fit: cover;
    border: 2px solid rgba(124, 20, 21, 0.15);
    box-shadow: 0 2px 10px rgba(124, 20, 21, 0.1);
    transition: all 0.3s ease;
}

.brand-logo:hover {
    border-color: rgba(124, 20, 21, 0.3);
    box-shadow: 0 4px 15px rgba(124, 20, 21, 0.2);
    transform: scale(1.02);
}

.brand-text {
    display: flex;
    flex-direction: column;
}

.brand-name {
    font-size: 18px;
    font-weight: 700;
    color: #1f2937;
    line-height: 1;
    background: linear-gradient(135deg, #7c1415, #b71c1c);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
}

.brand-tagline {
    font-size: 11px;
    font-weight: 500;
    color: #6b7280;
    text-transform: uppercase;
    letter-spacing: 0.3px;
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
    gap: 15px;
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
    padding: 10px 16px;
    color: #374151;
    text-decoration: none;
    font-weight: 500;
    font-size: 14px;
    border-radius: 8px;
    transition: all 0.3s ease;
    position: relative;
    white-space: nowrap;
}

.nav-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, 
        transparent, 
        rgba(124, 20, 21, 0.08), 
        transparent);
    transition: left 0.5s ease;
}

.nav-link:hover::before {
    left: 100%;
}

.nav-link:hover,
.nav-link.active {
    color: #7c1415;
    background: rgba(124, 20, 21, 0.08);
    transform: translateY(-1px);
    box-shadow: 0 2px 8px rgba(124, 20, 21, 0.15);
}

.nav-link i {
    font-size: 14px;
    width: 16px;
    text-align: center;
}

/* Dropdown Styles */
.dropdown {
    position: relative;
}

.dropdown-toggle .fa-chevron-down {
    font-size: 10px;
    transition: transform 0.3s ease;
}

.dropdown:hover .dropdown-toggle .fa-chevron-down {
    transform: rotate(180deg);
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    min-width: 280px;
    background: rgba(255, 255, 255, 0.98);
    backdrop-filter: blur(20px) saturate(180%);
    border-radius: 12px;
    border: 1px solid rgba(229, 231, 235, 0.8);
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.3s ease;
    margin-top: 8px;
    padding: 8px;
}

.dropdown:hover .dropdown-menu {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.dropdown-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    color: #374151;
    text-decoration: none;
    border-radius: 8px;
    transition: all 0.3s ease;
    margin-bottom: 4px;
}

.dropdown-item:hover {
    background: rgba(124, 20, 21, 0.08);
    color: #7c1415;
    transform: translateX(4px);
}

.dropdown-item:last-child {
    margin-bottom: 0;
}

.dropdown-item i {
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(124, 20, 21, 0.1);
    border-radius: 8px;
    color: #7c1415;
    font-size: 14px;
    flex-shrink: 0;
}

.dropdown-item div {
    flex: 1;
}

.item-title {
    display: block;
    font-weight: 600;
    font-size: 14px;
    color: #2d3748;
    margin-bottom: 2px;
}

.item-desc {
    display: block;
    font-size: 12px;
    color: #64748b;
    font-weight: 500;
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
        gap: 8px;
    }
    
    .nav-link {
        padding: 8px 10px;
    }
    
    .nav-link span {
        display: none;
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
        top: 70px;
        left: 0;
        right: 0;
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(20px) saturate(180%);
        border-top: 1px solid rgba(229, 231, 235, 0.8);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
        flex-direction: column;
        padding: 20px;
        gap: 0;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-20px);
        transition: all 0.3s ease;
        max-height: calc(100vh - 70px);
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
        gap: 0;
    }
    
    .nav-item {
        width: 100%;
    }
    
    .nav-link {
        width: 100%;
        padding: 15px 20px;
        justify-content: flex-start;
        border-radius: 10px;
        margin-bottom: 8px;
        font-size: 16px;
    }
    
    .nav-link span {
        display: inline;
    }
    
    .nav-link i {
        font-size: 16px;
        width: 20px;
    }
    
    .dropdown-menu {
        position: static;
        opacity: 1;
        visibility: visible;
        transform: none;
        margin-top: 0;
        margin-left: 20px;
        box-shadow: none;
        border: none;
        background: rgba(248, 250, 252, 0.8);
        display: none;
    }
    
    .dropdown.active .dropdown-menu {
        display: block;
    }
    
    .brand-name {
        font-size: 16px;
    }
    
    .brand-tagline {
        font-size: 10px;
    }
    
    .brand-logo {
        width: 40px;
        height: 40px;
    }
}

@media (max-width: 480px) {
    .navbar-container {
        padding: 0 20px;
        height: 65px;
    }
    
    .navbar-menu {
        top: 65px;
        padding: 15px;
    }
    
    .brand-name {
        font-size: 15px;
    }
    
    .brand-logo {
        width: 38px;
        height: 38px;
    }
}

/* Scroll Behavior */
body {
    padding-top: 70px;
}

@media (max-width: 480px) {
    body {
        padding-top: 65px;
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

body.dark-theme .dropdown-item:hover {
    background: rgba(251, 191, 36, 0.1);
    color: #fbbf24;
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
    const navbar = document.getElementById('mainNavbar');
    const mobileToggle = document.querySelector('.mobile-toggle');
    const navbarMenu = document.getElementById('navbarMenu');
    const dropdowns = document.querySelectorAll('.dropdown');

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

    // Enhanced mobile dropdown handling
    dropdowns.forEach(dropdown => {
        const toggle = dropdown.querySelector('.dropdown-toggle');
        
        if (toggle) {
            toggle.addEventListener('click', function(e) {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    // Close other dropdowns
                    dropdowns.forEach(otherDropdown => {
                        if (otherDropdown !== dropdown) {
                            otherDropdown.classList.remove('active');
                        }
                    });
                    
                    dropdown.classList.toggle('active');
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
