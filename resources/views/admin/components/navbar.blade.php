<!-- Premium Admin Navbar -->
<nav class="premium-navbar" id="adminNavbar">
    <div class="navbar-container">
        <!-- Mobile Menu Toggle -->
        <button class="mobile-menu-toggle" onclick="toggleSidebar()">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <!-- Search Section -->
        <div class="navbar-search">
            <div class="search-container">
                <i class="fas fa-search search-icon"></i>
                <input type="text" placeholder="Cari produk, customer, atau konten... (Ctrl+K)" class="search-input" id="globalSearch">
                <button class="search-filter-btn" onclick="toggleSearchFilter()">
                    <i class="fas fa-filter"></i>
                </button>
            </div>
            
            <!-- Search Filter Dropdown -->
            <div class="search-filter-dropdown" id="searchFilterDropdown">
                <div class="filter-option active" data-filter="all">
                    <i class="fas fa-globe"></i>
                    <span>Semua</span>
                </div>
                <div class="filter-option" data-filter="products">
                    <i class="fas fa-cubes"></i>
                    <span>Produk</span>
                </div>
                <div class="filter-option" data-filter="customers">
                    <i class="fas fa-users"></i>
                    <span>Customer</span>
                </div>
                <div class="filter-option" data-filter="content">
                    <i class="fas fa-file-alt"></i>
                    <span>Konten</span>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="navbar-actions">
            <!-- Quick Add Button -->
            <div class="action-group">
                <button class="action-btn quick-add-btn" onclick="toggleQuickAdd()" title="Tambah konten baru">
                    <i class="fas fa-plus"></i>
                    <span class="btn-text">Tambah</span>
                </button>
                
                <!-- Quick Add Dropdown -->
                <div class="quick-add-dropdown" id="quickAddDropdown">
                    <a href="#" class="quick-add-item">
                        <i class="fas fa-cube"></i>
                        <div class="item-content">
                            <span class="item-title">Produk Baru</span>
                            <span class="item-desc">Tambah produk insulasi</span>
                        </div>
                    </a>
                    <a href="#" class="quick-add-item">
                        <i class="fas fa-tags"></i>
                        <div class="item-content">
                            <span class="item-title">Kategori</span>
                            <span class="item-desc">Buat kategori produk</span>
                        </div>
                    </a>
                    <a href="#" class="quick-add-item">
                        <i class="fas fa-newspaper"></i>
                        <div class="item-content">
                            <span class="item-title">Artikel</span>
                            <span class="item-desc">Tulis artikel blog</span>
                        </div>
                    </a>
                    <a href="#" class="quick-add-item">
                        <i class="fas fa-image"></i>
                        <div class="item-content">
                            <span class="item-title">Media</span>
                            <span class="item-desc">Upload gambar/video</span>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Notifications -->
            <div class="action-group">
                <button class="action-btn notifications-btn" onclick="toggleNotifications()" title="Notifikasi (3 belum dibaca)">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">3</span>
                </button>
                
                <!-- Notifications Dropdown -->
                <div class="notifications-dropdown" id="notificationsDropdown">
                    <div class="dropdown-header">
                        <h4>Notifikasi</h4>
                        <span class="mark-all-read">Tandai semua dibaca</span>
                    </div>
                    
                    <div class="notification-item unread">
                        <div class="notification-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="notification-content">
                            <p>Customer baru mendaftar dari Jakarta</p>
                            <span class="notification-time">5 menit lalu</span>
                        </div>
                        <div class="notification-status"></div>
                    </div>
                    
                    <div class="notification-item unread">
                        <div class="notification-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="notification-content">
                            <p>Inquiry produk Glasswool dari Surabaya</p>
                            <span class="notification-time">15 menit lalu</span>
                        </div>
                        <div class="notification-status"></div>
                    </div>
                    
                    <div class="notification-item">
                        <div class="notification-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="notification-content">
                            <p>Traffic website naik 25% minggu ini</p>
                            <span class="notification-time">1 jam lalu</span>
                        </div>
                    </div>
                    
                    <div class="dropdown-footer">
                        <a href="#" class="view-all-link">Lihat semua notifikasi</a>
                    </div>
                </div>
            </div>

            <!-- Settings -->
            <div class="action-group">
                <button class="action-btn settings-btn" onclick="toggleSettings()" title="Pengaturan sistem">
                    <i class="fas fa-cog"></i>
                </button>
                
                <!-- Settings Dropdown -->
                <div class="settings-dropdown" id="settingsDropdown">
                    <a href="#" class="settings-item">
                        <i class="fas fa-palette"></i>
                        <span>Tema & Tampilan</span>
                    </a>
                    <a href="#" class="settings-item">
                        <i class="fas fa-database"></i>
                        <span>Backup Data</span>
                    </a>
                    <a href="#" class="settings-item">
                        <i class="fas fa-shield-alt"></i>
                        <span>Keamanan</span>
                    </a>
                    <a href="#" class="settings-item">
                        <i class="fas fa-envelope"></i>
                        <span>Email Settings</span>
                    </a>
                </div>
            </div>

            <!-- User Profile -->
            <div class="action-group user-profile-group">
                <button class="action-btn user-profile-btn" onclick="toggleUserMenu()" title="Menu pengguna">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=8b0000&color=fff&size=40" alt="User" class="user-avatar">
                    <span class="user-name">{{ Auth::user()->name }}</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                
                <!-- User Menu Dropdown -->
                <div class="user-menu-dropdown" id="userMenuDropdown">
                    <div class="user-menu-header">
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=8b0000&color=fff&size=60" alt="User" class="user-menu-avatar">
                        <div class="user-menu-info">
                            <h4>{{ Auth::user()->name }}</h4>
                            <span>{{ Auth::user()->email }}</span>
                            <div class="user-badge">Super Admin</div>
                        </div>
                    </div>
                    
                    <div class="user-menu-divider"></div>
                    
                    <a href="#" class="user-menu-item">
                        <i class="fas fa-user"></i>
                        <span>Profil Saya</span>
                    </a>
                    <a href="#" class="user-menu-item">
                        <i class="fas fa-key"></i>
                        <span>Ganti Password</span>
                    </a>
                    <a href="#" class="user-menu-item">
                        <i class="fas fa-history"></i>
                        <span>Aktivitas Saya</span>
                    </a>
                    <a href="{{ route('home') }}" class="user-menu-item">
                        <i class="fas fa-globe"></i>
                        <span>Lihat Website</span>
                    </a>
                    
                    <div class="user-menu-divider"></div>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="user-menu-item logout-item">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Results Modal -->
    <div class="search-results-modal" id="searchResultsModal">
        <div class="search-results-content">
            <div class="search-results-header">
                <h3>Hasil Pencarian</h3>
                <button class="close-search-results" onclick="closeSearchResults()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="search-results-body">
                <!-- Search results will be populated here -->
                <div class="search-category">
                    <h4>Produk</h4>
                    <div class="search-result-item">
                        <i class="fas fa-cube"></i>
                        <span>Glasswool Insulation Premium</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
/* ====== PREMIUM NAVBAR STYLES ====== */
.premium-navbar {
    position: fixed;
    top: 0;
    left: 280px;
    right: 0;
    height: 70px;
    background: linear-gradient(135deg, 
        rgba(255, 255, 255, 0.95) 0%, 
        rgba(248, 250, 252, 0.95) 100%);
    backdrop-filter: blur(20px);
    border-bottom: 1px solid rgba(139, 0, 0, 0.1);
    z-index: 998;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 
        0 4px 20px rgba(139, 0, 0, 0.08),
        inset 0 1px 0 rgba(255, 255, 255, 0.8);
}

.premium-navbar::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(90deg, 
        rgba(139, 0, 0, 0.02) 0%, 
        transparent 20%, 
        transparent 80%, 
        rgba(139, 0, 0, 0.02) 100%);
    pointer-events: none;
}

.navbar-container {
    display: flex;
    align-items: center;
    gap: 25px;
    padding: 0 30px;
    height: 100%;
    position: relative;
}

/* ====== MOBILE MENU TOGGLE ====== */
.mobile-menu-toggle {
    display: none;
    flex-direction: column;
    gap: 4px;
    background: none;
    border: none;
    cursor: pointer;
    padding: 8px;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.mobile-menu-toggle span {
    width: 22px;
    height: 3px;
    background: linear-gradient(135deg, #8b0000, #b71c1c);
    border-radius: 2px;
    transition: all 0.3s ease;
}

.mobile-menu-toggle:hover {
    background: rgba(139, 0, 0, 0.1);
}

.mobile-menu-toggle:hover span {
    background: linear-gradient(135deg, #b71c1c, #ff4444);
}

/* ====== SEARCH SECTION ====== */
.navbar-search {
    flex: 1;
    max-width: 500px;
    position: relative;
}

.search-container {
    position: relative;
    display: flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.8);
    border: 2px solid rgba(139, 0, 0, 0.1);
    border-radius: 15px;
    padding: 12px 20px;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.search-container:focus-within {
    border-color: rgba(139, 0, 0, 0.3);
    box-shadow: 
        0 0 0 4px rgba(139, 0, 0, 0.05),
        0 8px 25px rgba(139, 0, 0, 0.1);
    background: rgba(255, 255, 255, 0.95);
}

.search-icon {
    color: rgba(139, 0, 0, 0.6);
    margin-right: 12px;
    font-size: 1.1rem;
}

.search-input {
    flex: 1;
    border: none;
    outline: none;
    background: transparent;
    font-size: 0.95rem;
    color: #2d3748;
    font-weight: 500;
}

.search-input::placeholder {
    color: rgba(139, 0, 0, 0.5);
}

.search-filter-btn {
    background: rgba(139, 0, 0, 0.1);
    border: none;
    border-radius: 8px;
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: rgba(139, 0, 0, 0.7);
    cursor: pointer;
    transition: all 0.3s ease;
    margin-left: 10px;
}

.search-filter-btn:hover {
    background: rgba(139, 0, 0, 0.2);
    color: #8b0000;
    transform: scale(1.05);
}

/* ====== SEARCH FILTER DROPDOWN ====== */
.search-filter-dropdown {
    position: absolute;
    top: 100%;
    right: 0;
    width: 200px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(139, 0, 0, 0.15);
    border: 1px solid rgba(139, 0, 0, 0.1);
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.3s ease;
    z-index: 1001;
    margin-top: 8px;
}

.search-filter-dropdown.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.filter-option {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    cursor: pointer;
    transition: all 0.3s ease;
    border-radius: 8px;
    margin: 4px;
}

.filter-option:hover {
    background: rgba(139, 0, 0, 0.05);
}

.filter-option.active {
    background: linear-gradient(135deg, rgba(139, 0, 0, 0.1), rgba(139, 0, 0, 0.05));
    color: #8b0000;
    font-weight: 600;
}

.filter-option i {
    width: 16px;
    color: rgba(139, 0, 0, 0.6);
}

/* ====== SEARCH SUGGESTIONS ====== */
.search-suggestions {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(139, 0, 0, 0.15);
    border: 1px solid rgba(139, 0, 0, 0.1);
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.3s ease;
    z-index: 1001;
    margin-top: 8px;
    max-height: 300px;
    overflow-y: auto;
}

.search-suggestions.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.suggestion-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    cursor: pointer;
    transition: all 0.3s ease;
    border-radius: 8px;
    margin: 4px;
}

.suggestion-item:hover {
    background: rgba(139, 0, 0, 0.05);
}

.suggestion-item i {
    width: 20px;
    color: rgba(139, 0, 0, 0.6);
    font-size: 1rem;
}

.suggestion-content {
    flex: 1;
}

.suggestion-title {
    display: block;
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 2px;
}

.suggestion-category {
    font-size: 0.8rem;
    color: #718096;
}

/* ====== ENHANCED SEARCH RESULTS ====== */
.search-category {
    margin-bottom: 25px;
}

.search-category h4 {
    display: flex;
    align-items: center;
    gap: 10px;
    margin: 0 0 15px 0;
    padding: 15px 25px 0 25px;
    color: #2d3748;
    font-weight: 700;
    font-size: 1rem;
}

.search-category h4 i {
    color: rgba(139, 0, 0, 0.7);
}

.search-result-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px 25px;
    cursor: pointer;
    transition: all 0.3s ease;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.search-result-item:hover {
    background: rgba(139, 0, 0, 0.03);
    transform: translateX(5px);
}

.search-result-item:last-child {
    border-bottom: none;
}

.search-result-item i {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, rgba(139, 0, 0, 0.1), rgba(139, 0, 0, 0.05));
    border-radius: 10px;
    color: #8b0000;
    font-size: 1.1rem;
    flex-shrink: 0;
}

.result-content {
    flex: 1;
}

.result-title {
    display: block;
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 3px;
}

.result-desc {
    font-size: 0.85rem;
    color: #718096;
}

.result-type {
    font-size: 0.8rem;
    background: rgba(139, 0, 0, 0.1);
    color: #8b0000;
    padding: 4px 8px;
    border-radius: 6px;
    font-weight: 500;
}

/* ====== ACTION BUTTONS ====== */
.navbar-actions {
    display: flex;
    align-items: center;
    gap: 15px;
}

.action-group {
    position: relative;
}

.action-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.8);
    border: 1px solid rgba(139, 0, 0, 0.1);
    border-radius: 12px;
    padding: 10px 15px;
    color: rgba(139, 0, 0, 0.8);
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight: 500;
    backdrop-filter: blur(10px);
    position: relative;
    overflow: hidden;
}

.action-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
    transition: left 0.5s ease;
}

.action-btn:hover::before {
    left: 100%;
}

.action-btn:hover {
    background: rgba(139, 0, 0, 0.1);
    border-color: rgba(139, 0, 0, 0.2);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(139, 0, 0, 0.1);
}

.quick-add-btn {
    background: linear-gradient(135deg, #8b0000, #b71c1c);
    color: white;
    border-color: transparent;
}

.quick-add-btn:hover {
    background: linear-gradient(135deg, #b71c1c, #ff4444);
    box-shadow: 0 6px 20px rgba(139, 0, 0, 0.3);
}

.notifications-btn {
    position: relative;
}

.notification-badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
    font-size: 0.7rem;
    font-weight: 700;
    padding: 2px 6px;
    border-radius: 10px;
    border: 2px solid white;
    animation: badgePulse 2s infinite;
}

@keyframes badgePulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

.user-profile-btn {
    padding: 8px 15px;
    gap: 12px;
}

.user-avatar {
    width: 35px;
    height: 35px;
    border-radius: 10px;
    border: 2px solid rgba(139, 0, 0, 0.2);
}

.user-name {
    font-weight: 600;
    color: #2d3748;
}

/* ====== DROPDOWN STYLES ====== */
.quick-add-dropdown,
.notifications-dropdown,
.settings-dropdown,
.user-menu-dropdown,
.search-filter-dropdown {
    position: absolute;
    top: 100%;
    right: 0;
    background: white;
    border-radius: 15px;
    box-shadow: 
        0 15px 35px rgba(139, 0, 0, 0.15),
        0 5px 15px rgba(0, 0, 0, 0.08);
    border: 1px solid rgba(139, 0, 0, 0.1);
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.3s ease;
    z-index: 1001;
    margin-top: 8px;
    backdrop-filter: blur(20px);
}

.quick-add-dropdown.active,
.notifications-dropdown.active,
.settings-dropdown.active,
.user-menu-dropdown.active,
.search-filter-dropdown.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

/* Quick Add Dropdown */
.quick-add-dropdown {
    width: 280px;
}

.quick-add-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px 20px;
    text-decoration: none;
    color: #2d3748;
    transition: all 0.3s ease;
    border-radius: 12px;
    margin: 4px;
}

.quick-add-item:hover {
    background: linear-gradient(135deg, rgba(139, 0, 0, 0.05), rgba(139, 0, 0, 0.02));
    transform: translateX(5px);
}

.quick-add-item i {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, rgba(139, 0, 0, 0.1), rgba(139, 0, 0, 0.05));
    border-radius: 10px;
    color: #8b0000;
    font-size: 1.1rem;
}

.item-content {
    flex: 1;
}

.item-title {
    display: block;
    font-weight: 600;
    margin-bottom: 2px;
}

.item-desc {
    display: block;
    font-size: 0.85rem;
    color: #718096;
}

/* Notifications Dropdown */
.notifications-dropdown {
    width: 350px;
    max-height: 400px;
    overflow-y: auto;
}

.dropdown-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    border-bottom: 1px solid rgba(139, 0, 0, 0.1);
}

.dropdown-header h4 {
    margin: 0;
    font-weight: 700;
    color: #2d3748;
}

.mark-all-read {
    font-size: 0.85rem;
    color: #8b0000;
    cursor: pointer;
    font-weight: 500;
}

.notification-item {
    display: flex;
    gap: 15px;
    padding: 15px 20px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    position: relative;
}

.notification-item.unread {
    background: linear-gradient(135deg, rgba(139, 0, 0, 0.02), transparent);
}

.notification-item:hover {
    background: rgba(139, 0, 0, 0.03);
}

.notification-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, rgba(139, 0, 0, 0.1), rgba(139, 0, 0, 0.05));
    border-radius: 10px;
    color: #8b0000;
    flex-shrink: 0;
}

.notification-content p {
    margin: 0 0 5px 0;
    font-weight: 500;
    color: #2d3748;
    font-size: 0.9rem;
}

.notification-time {
    font-size: 0.8rem;
    color: #718096;
}

.notification-status {
    width: 8px;
    height: 8px;
    background: #8b0000;
    border-radius: 50%;
    position: absolute;
    top: 20px;
    right: 20px;
    opacity: 0;
}

.notification-item.unread .notification-status {
    opacity: 1;
}

.dropdown-footer {
    padding: 15px 20px;
    border-top: 1px solid rgba(139, 0, 0, 0.1);
    text-align: center;
}

.view-all-link {
    color: #8b0000;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
}

/* Settings Dropdown */
.settings-dropdown {
    width: 200px;
}

.settings-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    text-decoration: none;
    color: #2d3748;
    transition: all 0.3s ease;
    border-radius: 8px;
    margin: 4px;
}

.settings-item:hover {
    background: rgba(139, 0, 0, 0.05);
    transform: translateX(5px);
}

.settings-item i {
    width: 16px;
    color: rgba(139, 0, 0, 0.6);
}

/* User Menu Dropdown */
.user-menu-dropdown {
    width: 280px;
}

.user-menu-header {
    padding: 20px;
    border-bottom: 1px solid rgba(139, 0, 0, 0.1);
    text-align: center;
}

.user-menu-avatar {
    width: 60px;
    height: 60px;
    border-radius: 15px;
    border: 3px solid rgba(139, 0, 0, 0.2);
    margin-bottom: 10px;
}

.user-menu-info h4 {
    margin: 0 0 5px 0;
    font-weight: 600;
    color: #2d3748;
}

.user-menu-info span {
    font-size: 0.85rem;
    color: #718096;
    display: block;
    margin-bottom: 8px;
}

.user-badge {
    display: inline-block;
    background: linear-gradient(135deg, #8b0000, #b71c1c);
    color: white;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
}

.user-menu-divider {
    height: 1px;
    background: rgba(139, 0, 0, 0.1);
    margin: 8px 0;
}

.user-menu-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 20px;
    text-decoration: none;
    color: #2d3748;
    transition: all 0.3s ease;
    border: none;
    background: none;
    width: 100%;
    text-align: left;
    cursor: pointer;
}

.user-menu-item:hover {
    background: rgba(139, 0, 0, 0.05);
}

.logout-item {
    color: #dc2626;
}

.logout-item:hover {
    background: rgba(220, 38, 38, 0.05);
}

.logout-item i {
    color: #dc2626;
}

/* ====== SEARCH RESULTS MODAL ====== */
.search-results-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(5px);
    z-index: 1002;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.search-results-modal.active {
    opacity: 1;
    visibility: visible;
}

.search-results-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 90%;
    max-width: 600px;
    background: white;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(139, 0, 0, 0.2);
    max-height: 80vh;
    overflow-y: auto;
}

.search-results-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 25px;
    border-bottom: 1px solid rgba(139, 0, 0, 0.1);
}

.close-search-results {
    background: none;
    border: none;
    font-size: 1.2rem;
    color: #718096;
    cursor: pointer;
    padding: 5px;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.close-search-results:hover {
    color: #8b0000;
    background: rgba(139, 0, 0, 0.1);
}

/* ====== ENHANCED ANIMATIONS ====== */
@keyframes slideInFromTop {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInScale {
    from {
        opacity: 0;
        transform: scale(0.95);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.quick-add-dropdown.active,
.notifications-dropdown.active,
.settings-dropdown.active,
.user-menu-dropdown.active {
    animation: slideInFromTop 0.3s ease-out;
}

.search-suggestions.active {
    animation: fadeInScale 0.3s ease-out;
}

/* ====== LOADING STATES ====== */
.search-icon.loading {
    animation: spin 1s linear infinite;
}

@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* ====== HOVER EFFECTS ====== */
.action-btn {
    position: relative;
    overflow: hidden;
}

.action-btn::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: width 0.4s ease, height 0.4s ease;
}

.action-btn:active::after {
    width: 300px;
    height: 300px;
}

/* ====== NOTIFICATION ENHANCEMENTS ====== */
.notification-item {
    position: relative;
    overflow: hidden;
}

.notification-item::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 3px;
    height: 100%;
    background: linear-gradient(180deg, #8b0000, #b71c1c);
    transform: scaleY(0);
    transition: transform 0.3s ease;
}

.notification-item.unread::before {
    transform: scaleY(1);
}

.notification-item:hover::before {
    transform: scaleY(1);
}

/* ====== SEARCH ENHANCEMENTS ====== */
.search-container {
    position: relative;
    overflow: hidden;
}

.search-container::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    width: 0;
    height: 2px;
    background: linear-gradient(90deg, #8b0000, #b71c1c);
    transform: translateX(-50%);
    transition: width 0.3s ease;
}

.search-container:focus-within::after {
    width: 100%;
}

/* ====== USER MENU ENHANCEMENTS ====== */
.user-profile-btn .user-avatar {
    transition: all 0.3s ease;
}

.user-profile-btn:hover .user-avatar {
    transform: scale(1.1);
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.3);
}

.user-badge {
    animation: badgeGlow 3s ease-in-out infinite;
}

@keyframes badgeGlow {
    0%, 100% { box-shadow: 0 0 5px rgba(139, 0, 0, 0.3); }
    50% { box-shadow: 0 0 15px rgba(139, 0, 0, 0.6); }
}

/* ====== TOOLTIPS ====== */
.action-btn[title] {
    position: relative;
}

.action-btn[title]:hover::before {
    content: attr(title);
    position: absolute;
    bottom: 100%;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(0, 0, 0, 0.9);
    color: white;
    padding: 8px 12px;
    border-radius: 8px;
    font-size: 0.8rem;
    font-weight: 500;
    white-space: nowrap;
    z-index: 1002;
    margin-bottom: 8px;
    opacity: 0;
    animation: tooltipFadeIn 0.3s ease-out 0.5s forwards;
}

.action-btn[title]:hover::after {
    content: '';
    position: absolute;
    bottom: 100%;
    left: 50%;
    transform: translateX(-50%);
    border: 5px solid transparent;
    border-top-color: rgba(0, 0, 0, 0.9);
    z-index: 1002;
    margin-bottom: 3px;
    opacity: 0;
    animation: tooltipFadeIn 0.3s ease-out 0.5s forwards;
}

@keyframes tooltipFadeIn {
    from {
        opacity: 0;
        transform: translateX(-50%) translateY(5px);
    }
    to {
        opacity: 1;
        transform: translateX(-50%) translateY(0);
    }
}

/* ====== RESPONSIVE DESIGN ====== */
@media (max-width: 768px) {
    .premium-navbar {
        left: 0;
        padding: 0 15px;
    }
    
    .mobile-menu-toggle {
        display: flex;
    }
    
    .navbar-search {
        max-width: none;
        flex: 1;
        margin: 0 15px;
    }
    
    .search-container {
        padding: 10px 15px;
    }
    
    .btn-text {
        display: none;
    }
    
    .user-name {
        display: none;
    }
    
    .action-btn {
        padding: 10px 12px;
    }
    
    .quick-add-dropdown,
    .notifications-dropdown,
    .user-menu-dropdown {
        right: -10px;
        width: calc(100vw - 30px);
        max-width: 350px;
    }
}

@media (max-width: 480px) {
    .navbar-actions {
        gap: 8px;
    }
    
    .action-btn {
        padding: 8px 10px;
    }
    
    .search-container {
        padding: 8px 12px;
    }
    
    .search-input {
        font-size: 0.9rem;
    }
}

/* Enhanced responsive breakpoints */
@media (min-width: 769px) and (max-width: 1024px) {
    .navbar-container {
        padding: 0 20px;
        gap: 20px;
    }
    
    .navbar-search {
        max-width: 400px;
    }
}

@media (min-width: 1025px) {
    .navbar-container {
        padding: 0 40px;
        gap: 30px;
    }
    
    .navbar-search {
        max-width: 600px;
    }
}
</style>

<script>
// Global dropdown state
let activeDropdown = null;

function toggleDropdown(dropdownId) {
    const dropdown = document.getElementById(dropdownId);
    
    // Close other dropdowns
    if (activeDropdown && activeDropdown !== dropdown) {
        activeDropdown.classList.remove('active');
    }
    
    // Toggle current dropdown
    dropdown.classList.toggle('active');
    activeDropdown = dropdown.classList.contains('active') ? dropdown : null;
}

function toggleQuickAdd() {
    toggleDropdown('quickAddDropdown');
}

function toggleNotifications() {
    toggleDropdown('notificationsDropdown');
}

function toggleSettings() {
    toggleDropdown('settingsDropdown');
}

function toggleUserMenu() {
    toggleDropdown('userMenuDropdown');
}

function toggleSearchFilter() {
    toggleDropdown('searchFilterDropdown');
}

function closeSearchResults() {
    document.getElementById('searchResultsModal').classList.remove('active');
}

// Close dropdowns when clicking outside
document.addEventListener('click', function(e) {
    if (!e.target.closest('.action-group') && !e.target.closest('.navbar-search')) {
        const dropdowns = document.querySelectorAll('.quick-add-dropdown, .notifications-dropdown, .settings-dropdown, .user-menu-dropdown, .search-filter-dropdown');
        dropdowns.forEach(dropdown => {
            dropdown.classList.remove('active');
        });
        activeDropdown = null;
    }
});

// Search functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('globalSearch');
    let searchTimeout;
    
    searchInput.addEventListener('input', function(e) {
        const query = e.target.value.trim();
        
        // Clear previous timeout
        if (searchTimeout) {
            clearTimeout(searchTimeout);
        }
        
        // Debounce search
        searchTimeout = setTimeout(() => {
            if (query.length > 2) {
                performSearch(query);
            } else {
                clearSearchResults();
            }
        }, 300);
    });
    
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            const query = e.target.value.trim();
            if (query.length > 0) {
                showSearchResults(query);
            }
        }
    });
    
    // Enhanced search function
    function performSearch(query) {
        // Add loading state
        const searchIcon = document.querySelector('.search-icon');
        searchIcon.className = 'fas fa-spinner fa-spin search-icon';
        
        // Simulate API call (replace with actual search)
        setTimeout(() => {
            searchIcon.className = 'fas fa-search search-icon';
            console.log('Searching for:', query);
            
            // Show live search suggestions
            showSearchSuggestions(query);
        }, 500);
    }
    
    function showSearchSuggestions(query) {
        // Create suggestions dropdown if it doesn't exist
        let suggestions = document.getElementById('searchSuggestions');
        if (!suggestions) {
            suggestions = document.createElement('div');
            suggestions.id = 'searchSuggestions';
            suggestions.className = 'search-suggestions';
            document.querySelector('.navbar-search').appendChild(suggestions);
        }
        
        // Sample suggestions (replace with actual data)
        const sampleSuggestions = [
            { type: 'product', title: 'Glasswool Premium', category: 'Produk' },
            { type: 'customer', title: 'PT. Sejahtera Jakarta', category: 'Customer' },
            { type: 'content', title: 'Artikel Insulasi Industri', category: 'Konten' }
        ];
        
        suggestions.innerHTML = sampleSuggestions.map(item => `
            <div class="suggestion-item" data-type="${item.type}">
                <i class="fas fa-${item.type === 'product' ? 'cube' : item.type === 'customer' ? 'user' : 'file-alt'}"></i>
                <div class="suggestion-content">
                    <span class="suggestion-title">${item.title}</span>
                    <span class="suggestion-category">${item.category}</span>
                </div>
            </div>
        `).join('');
        
        suggestions.classList.add('active');
    }
    
    function clearSearchResults() {
        const suggestions = document.getElementById('searchSuggestions');
        if (suggestions) {
            suggestions.classList.remove('active');
        }
    }
    
    function showSearchResults(query) {
        const modal = document.getElementById('searchResultsModal');
        const resultsBody = modal.querySelector('.search-results-body');
        
        // Populate with search results
        resultsBody.innerHTML = `
            <div class="search-category">
                <h4><i class="fas fa-cubes"></i> Produk</h4>
                <div class="search-result-item">
                    <i class="fas fa-cube"></i>
                    <div class="result-content">
                        <span class="result-title">Glasswool Insulation Premium</span>
                        <span class="result-desc">Insulasi berkualitas tinggi untuk industri</span>
                    </div>
                    <span class="result-type">Produk</span>
                </div>
                <div class="search-result-item">
                    <i class="fas fa-cube"></i>
                    <div class="result-content">
                        <span class="result-title">Rockwool Fire Protection</span>
                        <span class="result-desc">Insulasi tahan api untuk keamanan maksimal</span>
                    </div>
                    <span class="result-type">Produk</span>
                </div>
            </div>
            
            <div class="search-category">
                <h4><i class="fas fa-users"></i> Customer</h4>
                <div class="search-result-item">
                    <i class="fas fa-user"></i>
                    <div class="result-content">
                        <span class="result-title">PT. Sejahtera Jakarta</span>
                        <span class="result-desc">Customer aktif sejak 2023</span>
                    </div>
                    <span class="result-type">Customer</span>
                </div>
            </div>
            
            <div class="search-category">
                <h4><i class="fas fa-file-alt"></i> Konten</h4>
                <div class="search-result-item">
                    <i class="fas fa-newspaper"></i>
                    <div class="result-content">
                        <span class="result-title">Panduan Insulasi Industri</span>
                        <span class="result-desc">Artikel lengkap tentang insulasi</span>
                    </div>
                    <span class="result-type">Artikel</span>
                </div>
            </div>
        `;
        
        modal.classList.add('active');
    }
    
    // Filter options
    const filterOptions = document.querySelectorAll('.filter-option');
    filterOptions.forEach(option => {
        option.addEventListener('click', function() {
            filterOptions.forEach(opt => opt.classList.remove('active'));
            this.classList.add('active');
            
            const filter = this.dataset.filter;
            const searchContainer = document.querySelector('.search-container');
            const searchInput = document.getElementById('globalSearch');
            
            // Update placeholder based on filter
            const placeholders = {
                'all': 'Cari produk, customer, atau konten...',
                'products': 'Cari produk insulasi...',
                'customers': 'Cari customer atau leads...',
                'content': 'Cari artikel atau media...'
            };
            
            searchInput.placeholder = placeholders[filter] || placeholders['all'];
            
            // Close filter dropdown
            document.getElementById('searchFilterDropdown').classList.remove('active');
            
            console.log('Filter selected:', filter);
        });
    });
    
    // Enhanced notification interactions
    const notificationItems = document.querySelectorAll('.notification-item');
    notificationItems.forEach(item => {
        item.addEventListener('click', function() {
            this.classList.remove('unread');
            
            // Update notification badge
            updateNotificationBadge();
            
            // Add click feedback
            this.style.transform = 'scale(0.98)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
    });
    
    // Mark all notifications as read
    const markAllRead = document.querySelector('.mark-all-read');
    if (markAllRead) {
        markAllRead.addEventListener('click', function() {
            const unreadItems = document.querySelectorAll('.notification-item.unread');
            unreadItems.forEach(item => {
                item.classList.remove('unread');
            });
            updateNotificationBadge();
            
            // Visual feedback
            this.style.color = '#718096';
            this.textContent = 'Semua sudah dibaca';
            setTimeout(() => {
                this.style.color = '#8b0000';
                this.textContent = 'Tandai semua dibaca';
            }, 2000);
        });
    }
    
    function updateNotificationBadge() {
        const unreadCount = document.querySelectorAll('.notification-item.unread').length;
        const badge = document.querySelector('.notification-badge');
        
        if (unreadCount > 0) {
            badge.textContent = unreadCount;
            badge.style.display = 'block';
        } else {
            badge.style.display = 'none';
        }
    }
    
    // Close search suggestions when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.navbar-search')) {
            const suggestions = document.getElementById('searchSuggestions');
            if (suggestions) {
                suggestions.classList.remove('active');
            }
        }
    });
    
    // Keyboard navigation for search
    document.addEventListener('keydown', function(e) {
        if (e.ctrlKey && e.key === 'k') {
            e.preventDefault();
            const searchInput = document.getElementById('globalSearch');
            searchInput.focus();
            searchInput.select();
        }
        
        if (e.key === 'Escape') {
            closeSearchResults();
            const suggestions = document.getElementById('searchSuggestions');
            if (suggestions) {
                suggestions.classList.remove('active');
            }
        }
    });
});

// Adjust navbar when sidebar is collapsed
function adjustNavbar() {
    const navbar = document.getElementById('adminNavbar');
    const sidebar = document.getElementById('adminSidebar');
    
    if (!navbar) return;
    
    if (window.innerWidth <= 768) {
        // Mobile: always full width
        navbar.style.left = '0';
        navbar.style.width = '100%';
    } else {
        // Desktop: adjust based on sidebar state
        if (sidebar && sidebar.classList.contains('collapsed')) {
            navbar.style.left = '70px';
            navbar.style.width = 'calc(100% - 70px)';
        } else {
            navbar.style.left = '280px';
            navbar.style.width = 'calc(100% - 280px)';
        }
    }
}

// Enhanced responsive behavior
window.addEventListener('resize', function() {
    adjustNavbar();
    
    // Close all dropdowns on resize
    const dropdowns = document.querySelectorAll('.quick-add-dropdown, .notifications-dropdown, .settings-dropdown, .user-menu-dropdown, .search-filter-dropdown');
    dropdowns.forEach(dropdown => {
        dropdown.classList.remove('active');
    });
    activeDropdown = null;
    
    // Close search suggestions
    const suggestions = document.getElementById('searchSuggestions');
    if (suggestions) {
        suggestions.classList.remove('active');
    }
});

// Listen for sidebar state changes
document.addEventListener('DOMContentLoaded', function() {
    // Initial adjustment
    adjustNavbar();
    
    const sidebar = document.getElementById('adminSidebar');
    if (sidebar) {
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                    adjustNavbar();
                }
            });
        });
        observer.observe(sidebar, { attributes: true, attributeFilter: ['class'] });
    }
    
    // Add tooltips for mobile buttons
    if (window.innerWidth <= 768) {
        const actionBtns = document.querySelectorAll('.action-btn');
        actionBtns.forEach(btn => {
            btn.addEventListener('touchstart', function() {
                this.style.transform = 'scale(0.95)';
            });
            
            btn.addEventListener('touchend', function() {
                this.style.transform = '';
            });
        });
    }
    
    // Initialize notification badge
    updateNotificationBadge();
    
    // Add smooth transitions
    const navbar = document.getElementById('adminNavbar');
    if (navbar) {
        navbar.style.transition = 'all 0.4s cubic-bezier(0.4, 0, 0.2, 1)';
    }
});
</script>