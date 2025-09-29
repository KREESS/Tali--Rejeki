<div class="topbar">
    <div class="container">
        <div class="topbar-content">
            <!-- Promo/Tagline Section -->
            <div class="promo-section">
                <div class="promo-text">
                    <i class="fas fa-fire text-warning me-2" aria-hidden="true"></i>
                    <span class="promo-message" data-translate="promo-text">
                        Up to 25% Discount on All Insulation Products
                    </span>
                </div>
            </div>
            
            <!-- Social Media & Search Section -->
            <div class="social-section">
                <div class="social-links">
                    <a href="https://www.tiktok.com/@pt.tali.rejeki" target="_blank" rel="noopener noreferrer" class="social-link" title="Follow us on TikTok" aria-label="Follow us on TikTok">
                        <i class="fab fa-tiktok" aria-hidden="true"></i>
                    </a>
                    <a href="https://instagram.com/PTTaliRejeki" target="_blank" rel="noopener noreferrer" class="social-link" title="Follow us on Instagram" aria-label="Follow us on Instagram">
                        <i class="fab fa-instagram" aria-hidden="true"></i>
                    </a>
                    <a href="https://facebook.com/PTTaliRejeki" target="_blank" rel="noopener noreferrer" class="social-link" title="Like us on Facebook" aria-label="Like us on Facebook">
                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                    </a>
                    <div class="divider" aria-hidden="true"></div>
                    <button class="search-btn" title="Search" aria-label="Open search" onclick="toggleSearch()">
                        <i class="fas fa-search" aria-hidden="true"></i>
                    </button>
                    <button class="theme-toggle" title="Toggle Dark/Light Mode" aria-label="Toggle theme" onclick="toggleTheme()">
                        <div class="theme-toggle-track">
                            <div class="theme-toggle-thumb">
                                <i class="fas fa-sun sun-icon" aria-hidden="true"></i>
                                <i class="fas fa-moon moon-icon" aria-hidden="true"></i>
                            </div>
                        </div>
                    </button>
                    <div class="language-toggle" role="group" aria-label="Language selection">
                        <button class="lang-btn" data-lang="id" title="Bahasa Indonesia" aria-label="Switch to Indonesian">
                            <img src="https://flagcdn.com/w20/id.png" alt="ID" class="flag-icon" loading="lazy">
                            <span class="lang-text">ID</span>
                        </button>
                        <button class="lang-btn" data-lang="en" title="English" aria-label="Switch to English">
                            <img src="https://flagcdn.com/w20/us.png" alt="EN" class="flag-icon" loading="lazy">
                            <span class="lang-text">EN</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Search Box (Hidden by default) -->
        <div class="search-box" id="searchBox" role="search" aria-hidden="true">
            <div class="search-container">
                <input type="text" class="search-input" data-translate="search-placeholder" placeholder="Cari produk insulasi..." id="searchInput" aria-label="Search products">
                <button class="search-submit" type="button" aria-label="Submit search">
                    <i class="fas fa-search" aria-hidden="true"></i>
                </button>
                <button class="search-close" onclick="toggleSearch()" aria-label="Close search">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<style>
/* ===== ENHANCED TOPBAR STYLING ===== */
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
    width: 100%;
    max-width: 100vw;
    overflow: hidden;
}

.topbar .container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 30px;
    width: 100%;
}

.topbar-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 45px;
    position: relative;
    width: 100%;
    gap: 15px;
}

/* Promo Section */
.promo-section {
    flex: 1;
    display: flex;
    align-items: center;
    min-width: 0;
    overflow: hidden;
}

.promo-text {
    color: #ffffff;
    font-weight: 600;
    display: flex;
    align-items: center;
    animation: slideInLeft 0.8s ease-out;
    width: 100%;
    min-width: 0;
}

.promo-message {
    font-size: 13px;
    line-height: 1.4;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
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
    flex-shrink: 0;
}

.social-links {
    display: flex;
    align-items: center;
    gap: 15px;
    flex-wrap: nowrap;
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

/* Enhanced Search Box */
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
    width: 100%;
    max-width: 100vw;
    overflow: hidden;
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
    padding: 0 30px;
    width: 100%;
    box-sizing: border-box;
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
    min-width: 0;
    width: 100%;
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
    flex-shrink: 0;
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
    flex-shrink: 0;
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

/* Enhanced Responsive Design */

/* Large Tablets (768px - 1024px) */
@media (max-width: 1024px) and (min-width: 769px) {
    .topbar .container {
        padding: 0 25px;
    }
    
    .promo-message {
        font-size: 12px;
    }
    
    .social-links {
        gap: 12px;
    }
    
    .search-input {
        font-size: 15px;
        padding: 13px 18px;
    }
    
    .search-submit {
        padding: 13px 18px;
        font-size: 15px;
    }
}

/* Medium Tablets (768px and below) */
@media (max-width: 768px) {
    .topbar .container {
        padding: 0 20px;
    }
    
    .topbar-content {
        height: 42px;
        gap: 10px;
    }
    
    .promo-section {
        flex: 1;
        min-width: 0;
    }
    
    .promo-text {
        font-size: 12px;
    }
    
    .promo-message {
        font-size: 11px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100%;
    }
    
    .social-section {
        flex-shrink: 0;
    }
    
    .social-links {
        gap: 8px;
        flex-wrap: nowrap;
    }
    
    .social-link,
    .search-btn {
        width: 30px;
        height: 30px;
        font-size: 12px;
        flex-shrink: 0;
    }
    
    .theme-toggle {
        width: 44px;
        height: 24px;
        margin-left: 6px;
        flex-shrink: 0;
    }
    
    .theme-toggle-thumb {
        width: 20px;
        height: 20px;
        top: 2px;
        left: 2px;
    }
    
    .theme-toggle.dark .theme-toggle-thumb {
        transform: translateX(20px);
    }
    
    .theme-toggle-thumb .sun-icon,
    .theme-toggle-thumb .moon-icon {
        font-size: 9px;
    }
    
    .language-toggle {
        margin-left: 6px;
        padding: 2px;
        flex-shrink: 0;
    }
    
    .lang-btn {
        padding: 5px 8px;
        font-size: 10px;
        gap: 4px;
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
        min-width: 52px;
    }
    
    .search-close {
        width: 36px;
        height: 36px;
    }
}

/* Small Mobile (480px and below) */
@media (max-width: 480px) {
    .topbar .container {
        padding: 0 15px;
    }
    
    .topbar-content {
        height: 38px;
        gap: 8px;
    }
    
    .promo-section {
        flex: 1;
        min-width: 0;
        overflow: hidden;
    }
    
    .promo-text {
        display: flex;
        align-items: center;
        width: 100%;
        min-width: 0;
    }
    
    .promo-text .fas {
        font-size: 12px;
        margin-right: 6px;
        flex-shrink: 0;
    }
    
    .promo-message {
        font-size: 10px;
        line-height: 1.2;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        flex: 1;
        min-width: 0;
    }
    
    .social-section {
        flex-shrink: 0;
    }
    
    .social-links {
        gap: 6px;
        flex-wrap: nowrap;
        align-items: center;
    }
    
    .social-link,
    .search-btn {
        width: 26px;
        height: 26px;
        font-size: 11px;
        flex-shrink: 0;
    }
    
    .divider {
        height: 16px;
        margin: 0 3px;
    }
    
    .theme-toggle {
        width: 38px;
        height: 20px;
        margin-left: 4px;
        flex-shrink: 0;
    }
    
    .theme-toggle-thumb {
        width: 16px;
        height: 16px;
        top: 2px;
        left: 2px;
    }
    
    .theme-toggle.dark .theme-toggle-thumb {
        transform: translateX(18px);
    }
    
    .theme-toggle-thumb .sun-icon,
    .theme-toggle-thumb .moon-icon {
        font-size: 7px;
    }
    
    .language-toggle {
        margin-left: 4px;
        padding: 2px;
        flex-shrink: 0;
    }
    
    .lang-btn {
        padding: 3px 6px;
        font-size: 9px;
        gap: 3px;
        min-width: 28px;
    }
    
    .flag-icon {
        width: 12px;
        height: 9px;
    }
    
    .lang-text {
        font-size: 8px;
        font-weight: 700;
    }
    
    .search-box {
        padding: 15px 0;
    }
    
    .search-container {
        padding: 0 15px;
        gap: 8px;
    }
    
    .search-input {
        font-size: 14px;
        padding: 10px 14px;
    }
    
    .search-submit {
        padding: 10px 14px;
        font-size: 13px;
        min-width: 46px;
    }
    
    .search-close {
        width: 32px;
        height: 32px;
        font-size: 12px;
    }
}

/* Extra Small Mobile (360px and below) */
@media (max-width: 360px) {
    .topbar .container {
        padding: 0 12px;
    }
    
    .topbar-content {
        height: 36px;
        gap: 6px;
    }
    
    .promo-text .fas {
        font-size: 10px;
        margin-right: 4px;
    }
    
    .promo-message {
        font-size: 9px;
        line-height: 1.1;
    }
    
    .social-links {
        gap: 4px;
    }
    
    .social-link,
    .search-btn {
        width: 24px;
        height: 24px;
        font-size: 10px;
    }
    
    .divider {
        height: 14px;
        margin: 0 2px;
    }
    
    .theme-toggle {
        width: 34px;
        height: 18px;
        margin-left: 3px;
    }
    
    .theme-toggle-thumb {
        width: 14px;
        height: 14px;
        top: 2px;
        left: 2px;
    }
    
    .theme-toggle.dark .theme-toggle-thumb {
        transform: translateX(16px);
    }
    
    .theme-toggle-thumb .sun-icon,
    .theme-toggle-thumb .moon-icon {
        font-size: 6px;
    }
    
    .language-toggle {
        margin-left: 3px;
        padding: 1px;
    }
    
    .lang-btn {
        padding: 2px 4px;
        font-size: 8px;
        gap: 2px;
        min-width: 24px;
    }
    
    .flag-icon {
        width: 10px;
        height: 8px;
    }
    
    .lang-text {
        font-size: 7px;
    }
    
    .search-container {
        padding: 0 12px;
        gap: 6px;
    }
    
    .search-input {
        font-size: 13px;
        padding: 8px 12px;
    }
    
    .search-submit {
        padding: 8px 12px;
        font-size: 12px;
        min-width: 40px;
    }
    
    .search-close {
        width: 28px;
        height: 28px;
        font-size: 11px;
    }
}

/* Ultra Small Mobile (320px and below) */
@media (max-width: 320px) {
    .topbar .container {
        padding: 0 10px;
    }
    
    .topbar-content {
        height: 34px;
        gap: 4px;
    }
    
    .promo-text .fas {
        font-size: 9px;
        margin-right: 3px;
    }
    
    .promo-message {
        font-size: 8px;
        line-height: 1;
    }
    
    .social-links {
        gap: 3px;
    }
    
    .social-link,
    .search-btn {
        width: 22px;
        height: 22px;
        font-size: 9px;
    }
    
    .divider {
        height: 12px;
        margin: 0 1px;
    }
    
    .theme-toggle {
        width: 30px;
        height: 16px;
        margin-left: 2px;
    }
    
    .theme-toggle-thumb {
        width: 12px;
        height: 12px;
        top: 2px;
        left: 2px;
    }
    
    .theme-toggle.dark .theme-toggle-thumb {
        transform: translateX(14px);
    }
    
    .theme-toggle-thumb .sun-icon,
    .theme-toggle-thumb .moon-icon {
        font-size: 5px;
    }
    
    .language-toggle {
        margin-left: 2px;
        padding: 1px;
    }
    
    .lang-btn {
        padding: 1px 3px;
        font-size: 7px;
        gap: 1px;
        min-width: 20px;
    }
    
    .flag-icon {
        width: 8px;
        height: 6px;
    }
    
    .lang-text {
        font-size: 6px;
    }
    
    .search-container {
        padding: 0 10px;
        gap: 4px;
        flex-direction: column;
        align-items: stretch;
    }
    
    .search-input {
        font-size: 12px;
        padding: 6px 10px;
        margin-bottom: 5px;
    }
    
    .search-submit {
        padding: 6px 10px;
        font-size: 11px;
        min-width: 36px;
        align-self: flex-end;
    }
    
    .search-close {
        width: 24px;
        height: 24px;
        font-size: 10px;
        position: absolute;
        top: 10px;
        right: 10px;
    }
}

/* Performance Optimizations and Overflow Prevention */
* {
    box-sizing: border-box;
}

/* Ensure no horizontal overflow */
html, body {
    overflow-x: hidden;
    max-width: 100vw;
}

/* Hide/Show based on scroll */
.topbar.hidden {
    transform: translateY(-100%);
}

/* Responsive Text Handling */
.promo-message {
    display: block;
    max-width: 100%;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* Button and Icon Accessibility */
.social-link,
.search-btn,
.theme-toggle,
.lang-btn {
    touch-action: manipulation;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
}

/* Focus states for accessibility */
.social-link:focus,
.search-btn:focus,
.theme-toggle:focus,
.lang-btn:focus,
.search-input:focus,
.search-submit:focus,
.search-close:focus {
    outline: 2px solid rgba(255, 255, 255, 0.8);
    outline-offset: 2px;
}

/* Prevent text selection on UI elements */
.topbar-content,
.social-links,
.theme-toggle,
.language-toggle {
    user-select: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
}

/* Smooth scroll behavior */
@media (prefers-reduced-motion: no-preference) {
    .topbar {
        scroll-behavior: smooth;
    }
}

/* High contrast mode support */
@media (prefers-contrast: high) {
    .topbar {
        border-bottom: 2px solid rgba(255, 255, 255, 0.8);
    }
    
    .social-link,
    .search-btn,
    .theme-toggle,
    .lang-btn {
        border: 1px solid rgba(255, 255, 255, 0.5);
    }
}

/* Print styles */
@media print {
    .topbar {
        display: none;
    }
}

/* Loading state optimization */
.topbar {
    will-change: transform;
    contain: layout style paint;
}

.search-box {
    will-change: opacity, transform;
    contain: layout style paint;
}

/* Safari specific fixes */
@supports (-webkit-appearance: none) {
    .search-input {
        -webkit-appearance: none;
        border-radius: 25px;
    }
    
    .search-submit,
    .search-close {
        -webkit-appearance: none;
    }
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
document.addEventListener('DOMContentLoaded', function() {
    // ================= INIT =================
    initializeLanguageFeature();
    initializeTopbar();
    initializeSearch();
    initializeSocialLinks();
    initializeTheme();

    // ================= LANGUAGE =================
    function initializeLanguageFeature() {
        const langButtons = document.querySelectorAll('.lang-btn');
        const savedLang = localStorage.getItem('language') || (window.location.pathname.startsWith('/en') ? 'en' : 'id');
        setLanguage(savedLang, false);

        langButtons.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const lang = this.dataset.lang;
                setLanguage(lang, true);
            });
        });
    }

    function setLanguage(lang, redirect = true) {
        const langButtons = document.querySelectorAll('.lang-btn');
        langButtons.forEach(btn => btn.classList.remove('active'));
        document.querySelector(`.lang-btn[data-lang="${lang}"]`)?.classList.add('active');
        localStorage.setItem('language', lang);

        if (redirect) {
            let targetUrl = '/';
            if (lang === 'en') targetUrl = '/en';
            if (lang === 'id' && window.location.pathname.startsWith('/en')) targetUrl = '/';
            window.location.href = targetUrl;
        }
    }

    // ================= TOPBAR & NAVBAR =================
    function initializeTopbar() {
        let lastScrollTop = 0;
        const topbar = document.querySelector('.topbar');
        const navbar = document.querySelector('.premium-navbar');
        const searchBox = document.getElementById('searchBox');

        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollTop > lastScrollTop && scrollTop > 100) {
                topbar?.classList.add('hidden');
                if (navbar) navbar.style.top = '0px';
                if (searchBox?.classList.contains('active')) toggleSearch();
            } else {
                topbar?.classList.remove('hidden');
                if (navbar) navbar.style.top = '45px';
            }
            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        });
    }

    // ================= SEARCH =================
    function initializeSearch() {
        const searchBox = document.getElementById('searchBox');
        const searchInput = document.getElementById('searchInput');
        const searchSubmit = document.querySelector('.search-submit');

        window.toggleSearch = function() {
            searchBox.classList.toggle('active');
            searchBox.setAttribute('aria-hidden', !searchBox.classList.contains('active'));
            if (searchBox.classList.contains('active')) setTimeout(() => searchInput.focus(), 300);
        };

        searchInput.addEventListener('keypress', e => {
            if (e.key === 'Enter') performSearch();
        });
        searchSubmit?.addEventListener('click', performSearch);

        document.addEventListener('click', e => {
            if (!searchBox.contains(e.target) && !e.target.closest('.search-btn')) {
                if (searchBox.classList.contains('active')) toggleSearch();
            }
        });

        function performSearch() {
            const query = searchInput.value.trim();
            if (!query) return;
            // Redirect ke search page
            const langPrefix = localStorage.getItem('language') === 'en' ? '/en' : '';
            window.location.href = `${langPrefix}/search?q=${encodeURIComponent(query)}`;
        }
    }

    // ================= SOCIAL LINKS =================
    function initializeSocialLinks() {
        document.querySelectorAll('.social-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const platform = this.querySelector('i')?.className || '';
                let url = '';
                if (platform.includes('tiktok')) url = 'https://www.tiktok.com/@pt.tali.rejeki';
                else if (platform.includes('instagram')) url = 'https://instagram.com/PTTaliRejeki';
                else if (platform.includes('facebook')) url = 'https://facebook.com/PTTaliRejeki';
                if (url) window.open(url, '_blank');
            });
        });
    }

    // ================= THEME =================
    function initializeTheme() {
        const themeToggle = document.querySelector('.theme-toggle');
        const body = document.body;
        const savedTheme = localStorage.getItem('theme') || 'light';
        setTheme(savedTheme);

        window.toggleTheme = function() {
            const newTheme = body.classList.contains('dark-theme') ? 'light' : 'dark';
            setTheme(newTheme);
        };

        function setTheme(theme) {
            body.classList.toggle('dark-theme', theme === 'dark');
            body.classList.toggle('light-theme', theme === 'light');
            themeToggle?.classList.toggle('dark', theme === 'dark');
            localStorage.setItem('theme', theme);
            document.dispatchEvent(new CustomEvent('themeChanged', { detail: { theme } }));
        }
    }
});
</script>
