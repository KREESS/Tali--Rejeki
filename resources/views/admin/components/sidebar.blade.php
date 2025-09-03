<!-- Premium Admin Sidebar -->
<div class="premium-sidebar" id="adminSidebar">
    <div class="sidebar-header">
        <div class="logo-container">
            <img src="{{ asset('img/icon-logo/tali-rejeki.jpg') }}" alt="Tali Rejeki" class="sidebar-logo">
            <div class="logo-text">
                <h3>Tali Rejeki</h3>
                <span>Admin Panel</span>
            </div>
        </div>
        <button class="sidebar-toggle" onclick="toggleSidebar()">
            <i class="fas fa-bars" id="toggleIcon"></i>
        </button>
    </div>

    <div class="sidebar-profile">
        <div class="profile-avatar">
            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=8b0000&color=fff&size=80" alt="Admin">
            <div class="profile-status"></div>
        </div>
        <div class="profile-info">
            <h4>{{ Auth::user()->name }}</h4>
            <span>Super Administrator</span>
        </div>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-section">
            <span class="nav-title">DASHBOARD</span>
            <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" data-tooltip="Dashboard Utama">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard Utama</span>
                <div class="nav-indicator"></div>
            </a>
        </div>

        <div class="nav-section">
            <span class="nav-title">MANAJEMEN PRODUK</span>
            <a href="{{ route('admin.categories.index') }}" class="nav-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" data-tooltip="Kategori">
                <i class="fas fa-folder"></i>
                <span>Kategori</span>
                <div class="nav-indicator"></div>
            </a>
            <a href="{{ route('admin.subcategories.index') }}" class="nav-item {{ request()->routeIs('admin.subcategories.*') ? 'active' : '' }}" data-tooltip="Sub Kategori">
                <i class="fas fa-folder-open"></i>
                <span>Sub Kategori</span>
                <div class="nav-indicator"></div>
            </a>
            <a href="{{ route('admin.products.index') }}" class="nav-item {{ request()->routeIs('admin.products.*') ? 'active' : '' }}" data-tooltip="Semua Produk">
                <i class="fas fa-cubes"></i>
                <span>Semua Produk</span>
                <div class="nav-indicator"></div>
            </a>
        </div>

        <div class="nav-section">
            <span class="nav-title">KATALOG PRODUK</span>
            
            <a href="{{ route('admin.catalog.index') }}" 
            class="nav-item {{ request()->routeIs('admin.catalog.*') ? 'active' : '' }}" 
            data-tooltip="Kelola Katalog">
                <i class="fas fa-book-open"></i>
                <span>Kelola Katalog</span>
                <div class="nav-indicator"></div>
            </a>

            <a href="{{ route('admin.catalog.create') }}" 
            class="nav-item {{ request()->routeIs('admin.catalog.create') ? 'active' : '' }}" 
            data-tooltip="Tambah Katalog Baru">
                <i class="fas fa-plus-circle"></i>
                <span>Tambah Katalog</span>
                <div class="nav-indicator"></div>
            </a>
        </div>

        <div class="nav-section">
            <span class="nav-title">MANAJEMEN KONTEN</span>
            <a href="{{ route('admin.article-categories.index') }}" 
               class="nav-item {{ request()->routeIs('admin.article-categories.*') ? 'active' : '' }}" 
               data-tooltip="Kategori Artikel">
                <i class="fas fa-folder-open"></i>
                <span>Kategori Artikel</span>
                <div class="nav-indicator"></div>
            </a>
            <a href="{{ route('admin.articles.index') }}" 
               class="nav-item {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}" 
               data-tooltip="Artikel & Blog">
                <i class="fas fa-newspaper"></i>
                <span>Artikel & Blog</span>
                <div class="nav-indicator"></div>
            </a>
            <a href="{{ route('admin.gallery.index') }}" 
               class="nav-item {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}" 
               data-tooltip="Galeri Media">
                <i class="fas fa-images"></i>
                <span>Galeri Proyek</span>
                <div class="nav-indicator"></div>
            </a>
        </div>

        {{-- <div class="nav-section">
            <span class="nav-title">CUSTOMER & LEADS</span>
            <a href="#" class="nav-item" data-tooltip="Inquiry & Leads">
                <i class="fas fa-phone"></i>
                <span>Inquiry & Leads</span>
                <div class="nav-indicator"></div>
            </a>
            <a href="#" class="nav-item" data-tooltip="Newsletter">
                <i class="fas fa-envelope"></i>
                <span>Newsletter</span>
                <div class="nav-indicator"></div>
            </a>
        </div> --}}

        {{-- <div class="nav-section">
            <span class="nav-title">LAPORAN & ANALYTICS</span>
            <a href="#" class="nav-item" data-tooltip="Analytics Website">
                <i class="fas fa-chart-line"></i>
                <span>Analytics Website</span>
                <div class="nav-indicator"></div>
            </a>
            <a href="#" class="nav-item" data-tooltip="Laporan Produk">
                <i class="fas fa-download"></i>
                <span>Laporan Produk</span>
                <div class="nav-indicator"></div>
            </a>
            <a href="#" class="nav-item" data-tooltip="Visitor Tracking">
                <i class="fas fa-eye"></i>
                <span>Visitor Tracking</span>
                <div class="nav-indicator"></div>
            </a>
        </div> --}}

        <div class="nav-section">
            <span class="nav-title">MANAJEMEN KARIER</span>
            <a href="{{ route('admin.jobs.index') }}" class="nav-item {{ request()->routeIs('admin.jobs.*') ? 'active' : '' }}" data-tooltip="Kelola Lowongan Kerja">
                <i class="fas fa-briefcase"></i>
                <span>Lowongan Kerja</span>
                <div class="nav-indicator"></div>
            </a>
            <a href="{{ route('admin.jobs.create') }}" class="nav-item {{ request()->routeIs('admin.jobs.create') ? 'active' : '' }}" data-tooltip="Tambah Lowongan Baru">
                <i class="fas fa-plus-circle"></i>
                <span>Tambah Lowongan</span>
                <div class="nav-indicator"></div>
            </a>
        </div>

        <div class="nav-section">
            <span class="nav-title">SISTEM</span>
            <a href="#" class="nav-item" data-tooltip="Pengaturan">
                <i class="fas fa-cogs"></i>
                <span>Pengaturan</span>
                <div class="nav-indicator"></div>
            </a>
            <a href="#" class="nav-item" data-tooltip="Keamanan">
                <i class="fas fa-shield-alt"></i>
                <span>Keamanan</span>
                <div class="nav-indicator"></div>
            </a>
            <a href="#" class="nav-item" data-tooltip="Log Aktivitas">
                <i class="fas fa-history"></i>
                <span>Log Aktivitas</span>
                <div class="nav-indicator"></div>
            </a>
        </div>
    </nav>

    <div class="sidebar-footer">
        <div class="system-info">
            <div class="info-item">
                <i class="fas fa-server"></i>
                <span>System Online</span>
                <div class="status-dot online"></div>
            </div>
            <div class="info-item">
                <i class="fas fa-database"></i>
                <span>DB Connected</span>
                <div class="status-dot online"></div>
            </div>
        </div>
        
        <form method="POST" action="{{ route('logout') }}" class="logout-form">
            @csrf
            <button type="submit" class="btn-logout-sidebar">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</div>

<!-- Sidebar Overlay -->
<div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

<style>
/* ====== PREMIUM SIDEBAR STYLES ====== */
.premium-sidebar {
    position: fixed;
    left: 0;
    top: 0;
    width: 280px;
    height: 100vh;
    background: linear-gradient(180deg, 
        rgba(139, 0, 0, 0.95) 0%, 
        rgba(107, 0, 0, 0.98) 50%, 
        rgba(75, 0, 0, 0.99) 100%);
    backdrop-filter: blur(20px);
    border-right: 1px solid rgba(255, 255, 255, 0.1);
    z-index: 1000;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    overflow-y: auto;
    overflow-x: hidden;
    transform: translateX(0);
    box-shadow: 
        4px 0 20px rgba(139, 0, 0, 0.3),
        inset -1px 0 0 rgba(255, 255, 255, 0.1);
}

.premium-sidebar::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0.3;
    pointer-events: none;
}

.premium-sidebar.collapsed {
    width: 70px;
}

.premium-sidebar.collapsed .logo-text,
.premium-sidebar.collapsed .profile-info,
.premium-sidebar.collapsed .nav-title,
.premium-sidebar.collapsed .nav-item span,
.premium-sidebar.collapsed .sidebar-footer .info-item span,
.premium-sidebar.collapsed .btn-logout-sidebar span {
    opacity: 0;
    transform: translateX(-20px);
    pointer-events: none;
    visibility: hidden;
}

.premium-sidebar.collapsed .sidebar-header {
    padding: 25px 15px;
    justify-content: center;
}

.premium-sidebar.collapsed .logo-container {
    justify-content: center;
}

.premium-sidebar.collapsed .sidebar-logo {
    margin: 0;
}

.premium-sidebar.collapsed .sidebar-toggle {
    position: relative;
    right: auto;
    top: auto;
    transform: none;
    margin-top: 15px;
}

.premium-sidebar.collapsed .sidebar-profile {
    padding: 15px;
    justify-content: center;
}

.premium-sidebar.collapsed .profile-info {
    display: none;
}

.premium-sidebar.collapsed .nav-section {
    margin-bottom: 10px;
}

.premium-sidebar.collapsed .nav-title {
    display: none;
}

.premium-sidebar.collapsed .nav-item {
    justify-content: center;
    padding: 12px 15px;
    margin: 2px 5px;
}

.premium-sidebar.collapsed .nav-item i {
    margin-right: 0;
    font-size: 1.2rem;
}

.premium-sidebar.collapsed .nav-item span {
    display: none;
}

.premium-sidebar.collapsed .nav-indicator {
    display: none;
}

.premium-sidebar.collapsed .sidebar-footer {
    padding: 15px 10px;
}

.premium-sidebar.collapsed .system-info .info-item span {
    display: none;
}

.premium-sidebar.collapsed .btn-logout-sidebar {
    padding: 12px;
    justify-content: center;
}

.premium-sidebar.collapsed .btn-logout-sidebar span {
    display: none;
}

/* Enhanced collapsed state tooltips */
.premium-sidebar.collapsed .nav-item {
    position: relative;
}

.premium-sidebar.collapsed .nav-item::after {
    content: attr(data-tooltip);
    position: absolute;
    left: 100%;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.9);
    color: white;
    padding: 8px 12px;
    border-radius: 8px;
    font-size: 0.85rem;
    font-weight: 500;
    white-space: nowrap;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    margin-left: 10px;
    z-index: 1001;
    pointer-events: none;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
}

.premium-sidebar.collapsed .nav-item:hover::after {
    opacity: 1;
    visibility: visible;
    transform: translateY(-50%) translateX(5px);
}

/* ====== SIDEBAR HEADER ====== */
.sidebar-header {
    padding: 25px 20px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    position: relative;
}

.sidebar-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 20px;
    right: 20px;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
}

.logo-container {
    display: flex;
    align-items: center;
    gap: 15px;
    flex-direction: column;
}

.premium-sidebar:not(.collapsed) .logo-container {
    flex-direction: row;
}

.sidebar-logo {
    width: 45px;
    height: 45px;
    border-radius: 12px;
    border: 2px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s ease;
}

.logo-text h3 {
    color: white;
    font-size: 1.3rem;
    font-weight: 700;
    margin: 0;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
}

.logo-text span {
    color: rgba(255, 255, 255, 0.7);
    font-size: 0.85rem;
    font-weight: 500;
}

.sidebar-toggle {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 8px;
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
}

.premium-sidebar.collapsed .sidebar-toggle {
    position: relative;
    right: auto;
    top: auto;
    transform: none;
    margin-top: 15px;
}

.sidebar-toggle:hover {
    background: rgba(255, 255, 255, 0.2);
}

.sidebar-toggle i {
    transition: transform 0.3s ease;
    font-size: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.premium-sidebar.collapsed .sidebar-toggle i {
    transform: rotate(0deg);
}

/* ====== SIDEBAR PROFILE ====== */
.sidebar-profile {
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 15px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    position: relative;
}

.sidebar-profile::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 12px;
    margin: 10px;
}

.profile-avatar {
    position: relative;
    flex-shrink: 0;
}

.profile-avatar img {
    width: 50px;
    height: 50px;
    border-radius: 15px;
    border: 2px solid rgba(255, 255, 255, 0.3);
}

.profile-status {
    position: absolute;
    bottom: 2px;
    right: 2px;
    width: 12px;
    height: 12px;
    background: #00ff88;
    border: 2px solid white;
    border-radius: 50%;
}

.profile-info h4 {
    color: white;
    font-size: 1rem;
    font-weight: 600;
    margin: 0;
}

.profile-info span {
    color: rgba(255, 215, 0, 0.9);
    font-size: 0.8rem;
    font-weight: 500;
}

/* ====== SIDEBAR NAVIGATION ====== */
.sidebar-nav {
    padding: 20px 0;
    flex: 1;
}

.nav-section {
    margin-bottom: 25px;
}

.nav-title {
    display: block;
    padding: 8px 20px;
    color: rgba(255, 255, 255, 0.6);
    font-size: 0.75rem;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
    margin-bottom: 8px;
}

.nav-item {
    display: flex;
    align-items: center;
    padding: 12px 20px;
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    transition: all 0.3s ease;
    position: relative;
    margin: 2px 10px;
    border-radius: 12px;
    overflow: hidden;
}

.nav-item::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 4px;
    height: 100%;
    background: #ff6b6b;
    transform: scaleY(0);
    transition: transform 0.3s ease;
    border-radius: 0 8px 8px 0;
}

.nav-item i {
    width: 20px;
    min-width: 20px;
    font-size: 1.1rem;
    margin-right: 15px;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.nav-item span {
    font-weight: 500;
    transition: all 0.3s ease;
}

.nav-item:hover {
    background: rgba(255, 255, 255, 0.1);
    color: white;
}

.nav-item:hover::before {
    transform: scaleY(1);
}

.nav-item:hover i {
    color: #ffd700;
}

.nav-item.active {
    background: rgba(255, 255, 255, 0.15);
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.nav-item.active::before {
    transform: scaleY(1);
}

.nav-item.active i {
    color: #ffd700;
}

.nav-indicator {
    margin-left: auto;
    width: 6px;
    height: 6px;
    background: rgba(255, 255, 255, 0.4);
    border-radius: 50%;
    opacity: 0;
    transition: all 0.3s ease;
}

.nav-item:hover .nav-indicator {
    opacity: 1;
    background: #ffd700;
}

/* ====== SIDEBAR FOOTER ====== */
.sidebar-footer {
    padding: 20px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    background: rgba(0, 0, 0, 0.2);
}

.system-info {
    margin-bottom: 15px;
}

.info-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px 0;
    color: rgba(255, 255, 255, 0.7);
    font-size: 0.85rem;
}

.info-item i {
    width: 16px;
    min-width: 16px;
    color: rgba(255, 255, 255, 0.5);
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.status-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    margin-left: auto;
}

.status-dot.online {
    background: #00ff88;
}

.btn-logout-sidebar {
    width: 100%;
    background: rgba(220, 38, 38, 0.8);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: white;
    padding: 12px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-logout-sidebar i {
    font-size: 1rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.btn-logout-sidebar:hover {
    background: rgba(239, 68, 68, 0.9);
}

/* ====== SIDEBAR OVERLAY ====== */
.sidebar-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(5px);
    z-index: 999;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.sidebar-overlay.active {
    opacity: 1;
    visibility: visible;
}

/* ====== RESPONSIVE DESIGN ====== */
@media (max-width: 768px) {
    .premium-sidebar {
        transform: translateX(-100%);
    }
    
    .premium-sidebar.active {
        transform: translateX(0);
    }
}

/* ====== SCROLLBAR STYLING ====== */
.premium-sidebar::-webkit-scrollbar {
    width: 6px;
}

.premium-sidebar::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
}

.premium-sidebar::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.3);
    border-radius: 3px;
}

.premium-sidebar::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 255, 255, 0.5);
}
</style>

<script>
function toggleSidebar() {
    const sidebar = document.getElementById('adminSidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const body = document.body;
    const toggleIcon = document.getElementById('toggleIcon');
    
    if (window.innerWidth <= 768) {
        // Mobile behavior
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');
        body.classList.toggle('sidebar-mobile-open');
    } else {
        // Desktop behavior
        sidebar.classList.toggle('collapsed');
        body.classList.toggle('sidebar-collapsed');
        
        // Update icon based on state
        if (sidebar.classList.contains('collapsed')) {
            toggleIcon.className = 'fas fa-chevron-right';
        } else {
            toggleIcon.className = 'fas fa-bars';
        }
        
        // Trigger resize event for responsive components
        window.dispatchEvent(new Event('resize'));
        
        // Update navbar and footer positions
        updateLayoutForSidebar();
    }
}

function closeSidebar() {
    const sidebar = document.getElementById('adminSidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const body = document.body;
    
    sidebar.classList.remove('active');
    overlay.classList.remove('active');
    body.classList.remove('sidebar-mobile-open');
}

function updateLayoutForSidebar() {
    const sidebar = document.getElementById('adminSidebar');
    const navbar = document.getElementById('adminNavbar');
    const footer = document.querySelector('.app-footer');
    const mainContent = document.querySelector('.admin-main-content');
    
    const isCollapsed = sidebar.classList.contains('collapsed');
    
    if (navbar) {
        navbar.style.left = isCollapsed ? '70px' : '280px';
    }
    
    if (footer) {
        footer.style.marginLeft = isCollapsed ? '70px' : '280px';
    }
    
    if (mainContent) {
        mainContent.style.marginLeft = isCollapsed ? '70px' : '280px';
    }
}

// Auto-close sidebar on window resize
window.addEventListener('resize', function() {
    const sidebar = document.getElementById('adminSidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const body = document.body;
    const toggleIcon = document.getElementById('toggleIcon');
    
    if (window.innerWidth > 768) {
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
        body.classList.remove('sidebar-mobile-open');
        
        // Reset icon if not collapsed
        if (!sidebar.classList.contains('collapsed')) {
            toggleIcon.className = 'fas fa-bars';
        }
        
        // Update layout positions
        updateLayoutForSidebar();
    } else {
        // Reset desktop states on mobile
        sidebar.classList.remove('collapsed');
        body.classList.remove('sidebar-collapsed');
        toggleIcon.className = 'fas fa-bars';
        updateLayoutForSidebar();
    }
});

// Add active state to current page
document.addEventListener('DOMContentLoaded', function() {
    const currentPath = window.location.pathname;
    const navItems = document.querySelectorAll('.nav-item');
    const sidebar = document.getElementById('adminSidebar');
    const toggleIcon = document.getElementById('toggleIcon');
    
    navItems.forEach(item => {
        if (item.getAttribute('href') === currentPath) {
            item.classList.add('active');
        }
    });
    
    // Initialize layout
    updateLayoutForSidebar();
    
    // Set initial icon state
    if (sidebar.classList.contains('collapsed')) {
        toggleIcon.className = 'fas fa-chevron-right';
    } else {
        toggleIcon.className = 'fas fa-bars';
    }
    
    // Add smooth scrolling for sidebar navigation
    const sidebarNav = document.querySelector('.sidebar-nav');
    if (sidebarNav) {
        sidebarNav.addEventListener('click', function(e) {
            const navItem = e.target.closest('.nav-item');
            if (navItem && navItem.getAttribute('href') === '#') {
                e.preventDefault();
            }
        });
    }
    
    // Add keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (e.ctrlKey && e.key === 'b') {
            e.preventDefault();
            toggleSidebar();
        }
    });
});
</script>