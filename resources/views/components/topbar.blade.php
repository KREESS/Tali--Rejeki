<div class="topbar">
    <div class="container">
        <div class="topbar-content">
            <!-- Promo/Tagline Section -->
            <div class="promo-section">
                <div class="promo-text">
                    <i class="fas fa-fire text-warning me-2"></i>
                    <span class="promo-message" data-translate="promo-text">
                        <strong>PROMO SPESIAL!</strong> Diskon hingga 25% untuk semua produk insulasi - 
                        <span class="highlight">Berlaku sampai akhir bulan!</span>
                    </span>
                </div>
            </div>
            
            <!-- Social Media & Search Section -->
            <div class="social-section">
                <div class="social-links">
                    <a href="#" class="social-link" title="Follow us on TikTok">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    <a href="#" class="social-link" title="Follow us on Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="social-link" title="Like us on Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <div class="divider"></div>
                    <button class="search-btn" title="Search" onclick="toggleSearch()">
                        <i class="fas fa-search"></i>
                    </button>
                    <button class="theme-toggle" title="Toggle Dark/Light Mode" onclick="toggleTheme()">
                        <div class="theme-toggle-track">
                            <div class="theme-toggle-thumb">
                                <i class="fas fa-sun sun-icon"></i>
                                <i class="fas fa-moon moon-icon"></i>
                            </div>
                        </div>
                    </button>
                    <div class="language-toggle">
                        <button class="lang-btn active" data-lang="id" title="Bahasa Indonesia">
                            <img src="https://flagcdn.com/w20/id.png" alt="ID" class="flag-icon">
                            <span class="lang-text">ID</span>
                        </button>
                        <button class="lang-btn" data-lang="en" title="English">
                            <img src="https://flagcdn.com/w20/us.png" alt="EN" class="flag-icon">
                            <span class="lang-text">EN</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Search Box (Hidden by default) -->
        <div class="search-box" id="searchBox">
            <div class="search-container">
                <input type="text" class="search-input" data-translate="search-placeholder" placeholder="Cari produk insulasi..." id="searchInput">
                <button class="search-submit" type="button">
                    <i class="fas fa-search"></i>
                </button>
                <button class="search-close" onclick="toggleSearch()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<style>
/* ===== TOPBAR STYLING ===== */
.topbar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1001;
    background: 
        linear-gradient(135deg, 
            rgba(124, 20, 21, 0.95) 0%, 
            rgba(183, 28, 28, 0.9) 100%
        );
    backdrop-filter: blur(15px) saturate(180%);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 2px 10px rgba(124, 20, 21, 0.3);
    transition: all 0.3s ease;
    font-size: 14px;
}

.topbar .container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 30px;
}

.topbar-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 45px;
    position: relative;
}

/* Promo Section */
.promo-section {
    flex: 1;
    display: flex;
    align-items: center;
}

.promo-text {
    color: #ffffff;
    font-weight: 600;
    display: flex;
    align-items: center;
    animation: slideInLeft 0.8s ease-out;
}

.promo-message {
    font-size: 13px;
    line-height: 1.4;
}

.promo-message .highlight {
    color: #ffd93d;
    font-weight: 700;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

/* Social Section */
.social-section {
    display: flex;
    align-items: center;
}

.social-links {
    display: flex;
    align-items: center;
    gap: 15px;
}

.social-link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    color: #ffffff;
    text-decoration: none;
    font-size: 14px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.social-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, 
        transparent 0%, 
        rgba(255, 255, 255, 0.2) 50%, 
        transparent 100%);
    transition: left 0.5s ease;
}

.social-link:hover::before {
    left: 100%;
}

.social-link:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 255, 255, 0.2);
    color: #ffffff;
}

/* TikTok specific hover */
.social-link:hover .fa-tiktok {
    color: #ff0050;
}

/* Instagram specific hover */
.social-link:hover .fa-instagram {
    background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Facebook specific hover */
.social-link:hover .fa-facebook-f {
    color: #1877f2;
}

.divider {
    width: 1px;
    height: 20px;
    background: rgba(255, 255, 255, 0.3);
    margin: 0 5px;
}

.search-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    background: rgba(255, 255, 255, 0.1);
    border: none;
    border-radius: 50%;
    color: #ffffff;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.search-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, 
        transparent 0%, 
        rgba(255, 255, 255, 0.2) 50%, 
        transparent 100%);
    transition: left 0.5s ease;
}

.search-btn:hover::before {
    left: 100%;
}

.search-btn:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-2px) scale(1.1);
    box-shadow: 0 4px 12px rgba(255, 255, 255, 0.2);
}

/* Theme Toggle Button */
.theme-toggle {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 26px;
    background: rgba(255, 255, 255, 0.15);
    border: none;
    border-radius: 20px;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    margin-left: 10px;
    box-shadow: 
        inset 0 2px 4px rgba(0, 0, 0, 0.1),
        0 2px 8px rgba(255, 255, 255, 0.1);
}

.theme-toggle:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: translateY(-2px);
    box-shadow: 
        inset 0 2px 4px rgba(0, 0, 0, 0.15),
        0 4px 12px rgba(255, 255, 255, 0.2);
}

.theme-toggle-track {
    width: 100%;
    height: 100%;
    position: relative;
    border-radius: 20px;
    overflow: hidden;
}

.theme-toggle-thumb {
    position: absolute;
    top: 2px;
    left: 2px;
    width: 22px;
    height: 22px;
    background: linear-gradient(135deg, #ffd93d, #ff9800);
    border-radius: 50%;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 
        0 2px 8px rgba(0, 0, 0, 0.2),
        inset 0 1px 0 rgba(255, 255, 255, 0.3);
    transform: translateX(0);
}

.theme-toggle-thumb .sun-icon,
.theme-toggle-thumb .moon-icon {
    position: absolute;
    font-size: 10px;
    transition: all 0.3s ease;
}

.theme-toggle-thumb .sun-icon {
    color: #f59e0b;
    opacity: 1;
    transform: rotate(0deg) scale(1);
}

.theme-toggle-thumb .moon-icon {
    color: #1e293b;
    opacity: 0;
    transform: rotate(180deg) scale(0.5);
}

/* Dark mode state */
.theme-toggle.dark .theme-toggle-thumb {
    transform: translateX(24px);
    background: linear-gradient(135deg, #1e293b, #475569);
    box-shadow: 
        0 2px 8px rgba(0, 0, 0, 0.4),
        inset 0 1px 0 rgba(255, 255, 255, 0.1);
}

.theme-toggle.dark .theme-toggle-thumb .sun-icon {
    opacity: 0;
    transform: rotate(-180deg) scale(0.5);
}

.theme-toggle.dark .theme-toggle-thumb .moon-icon {
    opacity: 1;
    transform: rotate(0deg) scale(1);
    color: #fbbf24;
}

.theme-toggle.dark {
    background: rgba(30, 41, 59, 0.6);
    box-shadow: 
        inset 0 2px 4px rgba(0, 0, 0, 0.3),
        0 2px 8px rgba(255, 255, 255, 0.05);
}

.theme-toggle.dark:hover {
    background: rgba(30, 41, 59, 0.8);
    box-shadow: 
        inset 0 2px 4px rgba(0, 0, 0, 0.4),
        0 4px 12px rgba(255, 255, 255, 0.1);
}

/* Language Toggle */
.language-toggle {
    display: flex;
    align-items: center;
    gap: 5px;
    margin-left: 10px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    padding: 3px;
    box-shadow: 
        inset 0 2px 4px rgba(0, 0, 0, 0.1),
        0 2px 8px rgba(255, 255, 255, 0.1);
}

.lang-btn {
    display: flex;
    align-items: center;
    gap: 5px;
    padding: 6px 10px;
    background: transparent;
    border: none;
    border-radius: 15px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 11px;
    font-weight: 600;
    color: rgba(255, 255, 255, 0.7);
    position: relative;
    overflow: hidden;
}

.lang-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, 
        transparent 0%, 
        rgba(255, 255, 255, 0.1) 50%, 
        transparent 100%);
    transition: left 0.5s ease;
}

.lang-btn:hover::before {
    left: 100%;
}

.lang-btn:hover {
    background: rgba(255, 255, 255, 0.15);
    color: rgba(255, 255, 255, 0.9);
    transform: translateY(-1px);
}

.lang-btn.active {
    background: rgba(255, 255, 255, 0.2);
    color: #ffffff;
    box-shadow: 
        0 2px 8px rgba(255, 255, 255, 0.2),
        inset 0 1px 0 rgba(255, 255, 255, 0.3);
}

.lang-btn.active:hover {
    background: rgba(255, 255, 255, 0.25);
}

.flag-icon {
    width: 16px;
    height: 12px;
    border-radius: 2px;
    object-fit: cover;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
}

.lang-text {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.5px;
}

/* Search Box */
.search-box {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: 
        linear-gradient(135deg, 
            rgba(255, 255, 255, 0.98) 0%, 
            rgba(248, 250, 252, 0.95) 100%
        );
    backdrop-filter: blur(20px) saturate(180%);
    border-bottom: 1px solid rgba(124, 20, 21, 0.1);
    box-shadow: 0 8px 25px rgba(124, 20, 21, 0.15);
    padding: 20px 0;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.3s ease;
}

.search-box.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.search-container {
    display: flex;
    align-items: center;
    gap: 10px;
    max-width: 600px;
    margin: 0 auto;
    position: relative;
}

.search-input {
    flex: 1;
    padding: 15px 20px;
    border: 2px solid rgba(124, 20, 21, 0.1);
    border-radius: 25px;
    font-size: 16px;
    background: rgba(255, 255, 255, 0.9);
    color: #2d3748;
    outline: none;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(124, 20, 21, 0.08);
}

.search-input:focus {
    border-color: #7c1415;
    box-shadow: 0 6px 20px rgba(124, 20, 21, 0.15);
    background: rgba(255, 255, 255, 1);
}

.search-input::placeholder {
    color: #64748b;
    font-weight: 500;
}

.search-submit {
    padding: 15px 20px;
    background: linear-gradient(135deg, #7c1415, #b71c1c);
    border: none;
    border-radius: 25px;
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(124, 20, 21, 0.3);
    font-size: 16px;
    min-width: 60px;
}

.search-submit:hover {
    background: linear-gradient(135deg, #b71c1c, #dc2626);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(124, 20, 21, 0.4);
}

.search-close {
    padding: 10px;
    background: rgba(124, 20, 21, 0.1);
    border: none;
    border-radius: 50%;
    color: #7c1415;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.search-close:hover {
    background: rgba(124, 20, 21, 0.2);
    transform: scale(1.1);
}

/* Animations */
@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .topbar-content {
        height: 40px;
    }
    
    .promo-text {
        font-size: 12px;
    }
    
    .promo-message {
        font-size: 11px;
    }
    
    .social-links {
        gap: 10px;
    }
    
    .social-link,
    .search-btn {
        width: 28px;
        height: 28px;
        font-size: 12px;
    }
    
    .theme-toggle {
        width: 42px;
        height: 22px;
        margin-left: 8px;
    }
    
    .theme-toggle-thumb {
        width: 18px;
        height: 18px;
    }
    
    .theme-toggle.dark .theme-toggle-thumb {
        transform: translateX(20px);
    }
    
    .theme-toggle-thumb .sun-icon,
    .theme-toggle-thumb .moon-icon {
        font-size: 8px;
    }
    
    .language-toggle {
        margin-left: 8px;
        padding: 2px;
    }
    
    .lang-btn {
        padding: 4px 8px;
        font-size: 10px;
    }
    
    .flag-icon {
        width: 14px;
        height: 10px;
    }
    
    .lang-text {
        font-size: 9px;
    }
    
    .search-input {
        font-size: 14px;
        padding: 12px 16px;
    }
    
    .search-submit {
        padding: 12px 16px;
        font-size: 14px;
        min-width: 50px;
    }
}

@media (max-width: 480px) {
    .topbar .container {
        padding: 0 20px;
    }
    
    .topbar-content {
        height: 35px;
    }
    
    .promo-text .fas {
        display: none;
    }
    
    .promo-message {
        font-size: 10px;
    }
    
    .social-links {
        gap: 8px;
    }
    
    .social-link,
    .search-btn {
        width: 24px;
        height: 24px;
        font-size: 10px;
    }
    
    .theme-toggle {
        width: 36px;
        height: 18px;
        margin-left: 6px;
    }
    
    .theme-toggle-thumb {
        width: 14px;
        height: 14px;
    }
    
    .theme-toggle.dark .theme-toggle-thumb {
        transform: translateX(18px);
    }
    
    .theme-toggle-thumb .sun-icon,
    .theme-toggle-thumb .moon-icon {
        font-size: 6px;
    }
    
    .language-toggle {
        margin-left: 6px;
        padding: 2px;
    }
    
    .lang-btn {
        padding: 3px 6px;
        font-size: 9px;
        gap: 3px;
    }
    
    .flag-icon {
        width: 12px;
        height: 8px;
    }
    
    .lang-text {
        font-size: 8px;
    }
    
    .search-box {
        padding: 15px 0;
    }
    
    .search-container {
        padding: 0 20px;
    }
}

/* Hide/Show based on scroll */
.topbar.hidden {
    transform: translateY(-100%);
}

/* Dark Theme Styles */
body.dark-theme .promo-text {
    color: #f1f5f9;
}

body.dark-theme .promo-message .highlight {
    color: #fbbf24;
}

body.dark-theme .search-input {
    background: rgba(30, 41, 59, 0.9);
    border-color: rgba(71, 85, 105, 0.3);
    color: #f1f5f9;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

body.dark-theme .search-input:focus {
    border-color: #7c1415;
    background: rgba(30, 41, 59, 1);
    box-shadow: 0 6px 20px rgba(124, 20, 21, 0.3);
}

body.dark-theme .search-input::placeholder {
    color: #94a3b8;
}

body.dark-theme .search-close {
    background: rgba(71, 85, 105, 0.3);
    color: #cbd5e1;
}

body.dark-theme .search-close:hover {
    background: rgba(71, 85, 105, 0.5);
}

body.dark-theme .search-box {
    background: 
        linear-gradient(135deg, 
            rgba(15, 23, 42, 0.98) 0%, 
            rgba(30, 41, 59, 0.95) 100%
        );
    border-bottom: 1px solid rgba(71, 85, 105, 0.3);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
}

/* Light Theme Styles */
body.light-theme .promo-text {
    color: #ffffff;
}

body.light-theme .promo-message .highlight {
    color: #ffd93d;
}

body.light-theme .search-input {
    background: rgba(255, 255, 255, 0.9);
    border-color: rgba(124, 20, 21, 0.1);
    color: #2d3748;
    box-shadow: 0 4px 15px rgba(124, 20, 21, 0.08);
}

body.light-theme .search-input:focus {
    border-color: #7c1415;
    background: rgba(255, 255, 255, 1);
    box-shadow: 0 6px 20px rgba(124, 20, 21, 0.15);
}

body.light-theme .search-input::placeholder {
    color: #64748b;
}

body.light-theme .search-close {
    background: rgba(124, 20, 21, 0.1);
    color: #7c1415;
}

body.light-theme .search-close:hover {
    background: rgba(124, 20, 21, 0.2);
}

body.light-theme .search-box {
    background: 
        linear-gradient(135deg, 
            rgba(255, 255, 255, 0.98) 0%, 
            rgba(248, 250, 252, 0.95) 100%
        );
    border-bottom: 1px solid rgba(124, 20, 21, 0.1);
    box-shadow: 0 8px 25px rgba(124, 20, 21, 0.15);
}
</style>

<script>
// Topbar functionality
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, initializing language functionality'); // Debug log
    
    // Wait a bit for all elements to be ready
    setTimeout(function() {
        initializeLanguageFeature();
    }, 100);
    
    function initializeLanguageFeature() {
        console.log('Initializing language feature'); // Debug log
    let lastScrollTop = 0;
    const topbar = document.querySelector('.topbar');
    const navbar = document.querySelector('.premium-navbar');
    const searchBox = document.getElementById('searchBox');
    const searchInput = document.getElementById('searchInput');
    
    // Auto-hide topbar and adjust navbar on scroll down
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        if (scrollTop > lastScrollTop && scrollTop > 100) {
            // Scrolling down - hide topbar and move navbar to top
            topbar.classList.add('hidden');
            if (navbar) {
                navbar.style.top = '0px';
            }
            if (searchBox.classList.contains('active')) {
                toggleSearch(); // Close search if open
            }
        } else {
            // Scrolling up - show topbar and move navbar below
            topbar.classList.remove('hidden');
            if (navbar) {
                navbar.style.top = '45px';
            }
        }
        
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    });
    
    // Search functionality
    window.toggleSearch = function() {
        searchBox.classList.toggle('active');
        
        if (searchBox.classList.contains('active')) {
            setTimeout(() => {
                searchInput.focus();
            }, 300);
        }
    };
    
    // Handle search input
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            performSearch();
        }
    });
    
    // Search submit button
    document.querySelector('.search-submit').addEventListener('click', performSearch);
    
    function performSearch() {
        const query = searchInput.value.trim();
        if (query) {
            console.log('Searching for:', query);
            // Add your search logic here
            // Example: window.location.href = `/search?q=${encodeURIComponent(query)}`;
            
            // For demo, just show alert
            alert(`Mencari: "${query}"`);
            toggleSearch();
        }
    }
    
    // Close search when clicking outside
    document.addEventListener('click', function(e) {
        if (!searchBox.contains(e.target) && !e.target.closest('.search-btn')) {
            if (searchBox.classList.contains('active')) {
                toggleSearch();
            }
        }
    });
    
    // Social media links functionality
    document.querySelectorAll('.social-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const platform = this.querySelector('i').className;
            
            // Add your social media URLs here
            let url = '';
            if (platform.includes('tiktok')) {
                url = 'https://tiktok.com/@talirejeki';
            } else if (platform.includes('instagram')) {
                url = 'https://instagram.com/talirejeki';
            } else if (platform.includes('facebook')) {
                url = 'https://facebook.com/talirejeki';
            }
            
            if (url) {
                window.open(url, '_blank');
            }
        });
    });
    
    // Theme toggle functionality
    const themeToggle = document.querySelector('.theme-toggle');
    const body = document.body;
    
    // Check for saved theme preference or default to light mode
    const savedTheme = localStorage.getItem('theme') || 'light';
    setTheme(savedTheme);
    
    window.toggleTheme = function() {
        const currentTheme = body.classList.contains('dark-theme') ? 'dark' : 'light';
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';
        setTheme(newTheme);
    };
    
    function setTheme(theme) {
        const body = document.body;
        
        if (theme === 'dark') {
            body.classList.add('dark-theme');
            body.classList.remove('light-theme');
            themeToggle.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        } else {
            body.classList.add('light-theme');
            body.classList.remove('dark-theme');
            themeToggle.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        }
    }
    
    // Language switching functionality
    const langButtons = document.querySelectorAll('.lang-btn');
    
    // Check for saved language preference or default to Indonesian
    const savedLang = localStorage.getItem('language') || 'id';
    setLanguage(savedLang);
    
    // Add event listeners to language buttons
    langButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const lang = this.dataset.lang;
            console.log('Language button clicked:', lang); // Debug log
            setLanguage(lang);
        });
    });
    
    window.setLanguage = function(lang) {
        console.log('Setting language to:', lang); // Debug log
        
        // Update active language button
        langButtons.forEach(btn => {
            btn.classList.remove('active');
            if (btn.dataset.lang === lang) {
                btn.classList.add('active');
            }
        });
        
        // Save language preference
        localStorage.setItem('language', lang);
        
        // Apply translations
        applyTranslations(lang);
        
        console.log('Language changed to:', lang); // Debug log
    };
    
    function applyTranslations(lang) {
        console.log('Applying translations for language:', lang); // Debug log
        
        // Translation dictionary
        const translations = {
            id: {
                // Topbar
                'promo-text': 'Diskon hingga 25% untuk semua produk insulasi',
                'search-placeholder': 'Cari produk insulasi...',
                'search-alert': 'Mencari',
                
                // Navbar
                'nav-home': 'Beranda',
                'nav-products': 'Produk',
                'nav-services': 'Layanan',
                'nav-gallery': 'Galeri',
                'nav-articles': 'Artikel',
                'nav-contact': 'Kontak',
                'nav-cta': 'Minta Penawaran',
                
                // Products dropdown
                'product-glasswool': 'Glasswool',
                'product-glasswool-desc': 'Insulasi berkualitas tinggi',
                'product-rockwool': 'Rockwool',
                'product-rockwool-desc': 'Insulasi tahan api',
                'product-nitrile': 'Nitrile Rubber',
                'product-nitrile-desc': 'Karet sintetis premium',
                'product-hvac': 'Aksesoris HVAC',
                'product-hvac-desc': 'Komponen pendukung',
                
                // Services dropdown
                'service-installation': 'Instalasi',
                'service-installation-desc': 'Pemasangan profesional',
                'service-consultation': 'Konsultasi',
                'service-consultation-desc': 'Saran teknis ahli',
                'service-shipping': 'Pengiriman',
                'service-shipping-desc': 'Distribusi ke seluruh Indonesia',
                
                // Hero section
                'hero-badge': 'Distributor Terpercaya Sejak 2011',
                'hero-title-line1': 'Distributor Insulasi',
                'hero-title-line2': 'Industri Terdepan',
                'hero-description': 'Menyediakan solusi insulasi berkualitas tinggi untuk industri dengan produk unggulan seperti Glasswool, Rockwool, Nitrile Rubber, dan aksesoris HVAC terlengkap di Indonesia.',
                'hero-stats-projects': 'Proyek Selesai',
                'hero-stats-cities': 'Kota Terjangkau',
                'hero-stats-experience': 'Tahun Pengalaman',
                'hero-cta-products': 'Lihat Produk',
                'hero-cta-contact': 'Hubungi Kami',
                'hero-badge-fireproof': 'Tahan Api',
                
                // Products section
                'products-badge': 'Produk Unggulan',
                'products-title': 'Solusi Insulasi Terlengkap',
                'products-description': 'Kami menyediakan berbagai jenis material insulasi berkualitas tinggi untuk memenuhi kebutuhan industri Anda',
                
                // Product details
                'product-glasswool-title': 'Glasswool',
                'product-glasswool-desc-long': 'Insulasi termal dan akustik dengan daya tahan tinggi dan ramah lingkungan',
                'glasswool-feature-1': 'Tahan panas tinggi',
                'glasswool-feature-2': 'Kedap suara',
                'glasswool-feature-3': 'Anti jamur',
                'product-rockwool-title': 'Rockwool',
                'product-rockwool-desc-long': 'Material insulasi berbahan dasar batu basalt dengan ketahanan api luar biasa',
                'rockwool-feature-1': 'Tahan api ekstrem',
                'rockwool-feature-2': 'Non-combustible',
                'rockwool-feature-3': 'Tahan air',
                'learn-more': 'Pelajari Lebih Lanjut',
                
                // Stats
                'stat-clients': 'Klien',
                'stat-projects': 'Proyek',
                'stat-experience': 'Tahun Pengalaman',
                
                // Products section
                'products-badge': 'Produk Unggulan',
                'products-title': 'Solusi Insulasi Terlengkap',
                'products-description': 'Kami menyediakan berbagai jenis produk insulasi berkualitas tinggi yang telah terbukti dalam berbagai aplikasi industri dan komersial.',
                
                // Services section
                'services-title': 'Mengapa Memilih Tali Rejeki?',
                'services-description': 'Kami berkomitmen memberikan pelayanan terbaik dengan produk berkualitas tinggi dan dukungan teknis yang komprehensif.',
                
                // Service items
                'service-quality': 'Kualitas Terjamin',
                'service-quality-desc': 'Produk berkualitas internasional dengan sertifikasi lengkap',
                'service-expert': 'Tim Ahli',
                'service-expert-desc': 'Konsultasi dan dukungan teknis dari para ahli berpengalaman',
                'service-fast': 'Pengiriman Cepat',
                'service-fast-desc': 'Distribusi ke seluruh Indonesia dengan waktu pengiriman optimal',
                
                // CTA section
                'cta-title': 'Siap Memulai Proyek Insulasi Anda?',
                'cta-description': 'Dapatkan konsultasi gratis dan penawaran terbaik untuk kebutuhan insulasi industri Anda. Tim ahli kami siap membantu mewujudkan proyek Anda.',
                'cta-primary': 'Hubungi Sekarang',
                'cta-secondary': 'Download Katalog',
                
                // Contact info
                'contact-phone': 'Telepon',
                'contact-email': 'Email',
                'contact-location': 'Lokasi'
            },
            en: {
                // Topbar
                'promo-text': 'Up to 25% discount on all insulation products',
                'search-placeholder': 'Search insulation products...',
                'search-alert': 'Searching for',
                
                // Navbar
                'nav-home': 'Home',
                'nav-products': 'Products',
                'nav-services': 'Services',
                'nav-gallery': 'Gallery',
                'nav-articles': 'Articles',
                'nav-contact': 'Contact',
                'nav-cta': 'Get Quote',
                
                // Products dropdown
                'product-glasswool': 'Glasswool',
                'product-glasswool-desc': 'High quality insulation',
                'product-rockwool': 'Rockwool',
                'product-rockwool-desc': 'Fire resistant insulation',
                'product-nitrile': 'Nitrile Rubber',
                'product-nitrile-desc': 'Premium synthetic rubber',
                'product-hvac': 'HVAC Accessories',
                'product-hvac-desc': 'Supporting components',
                
                // Services dropdown
                'service-installation': 'Installation',
                'service-installation-desc': 'Professional installation',
                'service-consultation': 'Consultation',
                'service-consultation-desc': 'Expert technical advice',
                'service-shipping': 'Shipping',
                'service-shipping-desc': 'Distribution throughout Indonesia',
                
                // Hero section
                'hero-badge': 'Trusted Distributor Since 2011',
                'hero-title-line1': 'Insulation Distributor',
                'hero-title-line2': 'Industry Leader',
                'hero-description': 'Providing high-quality insulation solutions for industry with superior products like Glasswool, Rockwool, Nitrile Rubber, and complete HVAC accessories in Indonesia.',
                'hero-stats-projects': 'Completed Projects',
                'hero-stats-cities': 'Cities Reached',
                'hero-stats-experience': 'Years Experience',
                'hero-cta-products': 'View Products',
                'hero-cta-contact': 'Contact Us',
                'hero-badge-fireproof': 'Fire Resistant',
                
                // Products section
                'products-badge': 'Featured Products',
                'products-title': 'Complete Insulation Solutions',
                'products-description': 'We provide various types of high-quality insulation materials to meet your industrial needs',
                
                // Product details
                'product-glasswool-title': 'Glasswool',
                'product-glasswool-desc-long': 'Thermal and acoustic insulation with high durability and eco-friendly',
                'glasswool-feature-1': 'High heat resistance',
                'glasswool-feature-2': 'Sound proof',
                'glasswool-feature-3': 'Anti-fungal',
                'product-rockwool-title': 'Rockwool',
                'product-rockwool-desc-long': 'Insulation material made from basalt stone with extraordinary fire resistance',
                'rockwool-feature-1': 'Extreme fire resistance',
                'rockwool-feature-2': 'Non-combustible',
                'rockwool-feature-3': 'Water resistant',
                'learn-more': 'Learn More',
                
                // Stats
                'stat-clients': 'Clients',
                'stat-projects': 'Projects',
                'stat-experience': 'Years Experience',
                
                // Products section
                'products-badge': 'Featured Products',
                'products-title': 'Complete Insulation Solutions',
                'products-description': 'We provide various types of high-quality insulation products that have been proven in various industrial and commercial applications.',
                
                // Services section
                'services-title': 'Why Choose Tali Rejeki?',
                'services-description': 'We are committed to providing the best service with high-quality products and comprehensive technical support.',
                
                // Service items
                'service-quality': 'Guaranteed Quality',
                'service-quality-desc': 'International quality products with complete certification',
                'service-expert': 'Expert Team',
                'service-expert-desc': 'Consultation and technical support from experienced experts',
                'service-fast': 'Fast Delivery',
                'service-fast-desc': 'Distribution throughout Indonesia with optimal delivery time',
                
                // CTA section
                'cta-title': 'Ready to Start Your Insulation Project?',
                'cta-description': 'Get free consultation and the best offers for your industrial insulation needs. Our expert team is ready to help realize your project.',
                'cta-primary': 'Contact Now',
                'cta-secondary': 'Download Catalog',
                
                // Contact info
                'contact-phone': 'Phone',
                'contact-email': 'Email',
                'contact-location': 'Location'
            }
        };
        
        // Apply translations to elements with data-translate attribute
        const elementsToTranslate = document.querySelectorAll('[data-translate]');
        console.log('Found elements to translate:', elementsToTranslate.length); // Debug log
        
        elementsToTranslate.forEach(element => {
            const key = element.getAttribute('data-translate');
            if (translations[lang] && translations[lang][key]) {
                console.log('Translating:', key, 'to:', translations[lang][key]); // Debug log
                if (element.tagName === 'INPUT' && (element.type === 'text' || element.type === 'search')) {
                    element.placeholder = translations[lang][key];
                } else {
                    // Check if this is the promo text which needs special formatting
                    if (key === 'promo-text') {
                        element.innerHTML = `<strong>${lang === 'id' ? 'PROMO SPESIAL!' : 'SPECIAL PROMO!'}</strong> ${translations[lang][key].replace(/^[^!]*!/, '').trim()} - <span class="highlight">${lang === 'id' ? 'Berlaku sampai akhir bulan!' : 'Valid until end of month!'}</span>`;
                    } else {
                        element.textContent = translations[lang][key];
                    }
                }
            } else {
                console.log('Translation not found for key:', key, 'in language:', lang); // Debug log
            }
        });
        
        // Additional updates for search input if not caught by data-translate
        const searchInput = document.getElementById('searchInput');
        if (searchInput && translations[lang]['search-placeholder']) {
            searchInput.placeholder = translations[lang]['search-placeholder'];
        }
        
        console.log('Translations applied successfully for language:', lang); // Debug log
    }
    
    } // End of initializeLanguageFeature
});
</script>
