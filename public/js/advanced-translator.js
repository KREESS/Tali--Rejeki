// Simplified Language Switcher via URL
class AdvancedTranslator {
    constructor() {
        this.currentLanguage = localStorage.getItem('language') || 'id';
        this.isSwitching = false;

        // Initialize
        this.init();
    }

    // Set language by redirecting to URL
    async setLanguage(lang) {
        if (this.isSwitching) return;

        console.log('Switching language to:', lang);
        this.isSwitching = true;
        this.currentLanguage = lang;
        localStorage.setItem('language', lang);

        // Update button states
        document.querySelectorAll('.lang-btn').forEach(btn => {
            btn.classList.toggle('active', btn.dataset.lang === lang);
        });

        // Redirect based on language
        if (lang === 'en') {
            window.location.href = '/en';
        } else {
            window.location.href = '/';
        }
    }

    // Loading indicator (optional if needed later)
    showLoading(message = 'Switching...') {
        let indicator = document.getElementById('translation-indicator');
        if (!indicator) {
            indicator = document.createElement('div');
            indicator.id = 'translation-indicator';
            indicator.innerHTML = `
                <div style="position: fixed; top: 20px; right: 20px; background: rgba(0,0,0,0.9); 
                           color: white; padding: 15px 20px; border-radius: 8px; z-index: 10000; 
                           display: flex; align-items: center; gap: 10px; font-family: Arial, sans-serif;">
                    <div style="width: 16px; height: 16px; border: 2px solid #fff; border-top: 2px solid transparent; 
                               border-radius: 50%; animation: spin 1s linear infinite;"></div>
                    <span id="loading-text">${message}</span>
                </div>
                <style>
                    @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
                </style>
            `;
            document.body.appendChild(indicator);
        } else {
            document.getElementById('loading-text').textContent = message;
            indicator.style.display = 'block';
        }
    }

    hideLoading() {
        const indicator = document.getElementById('translation-indicator');
        if (indicator) {
            indicator.style.display = 'none';
        }
    }

    // Initialize event listeners
    init() {
        document.addEventListener('DOMContentLoaded', () => {
            // Language button listeners
            document.querySelectorAll('.lang-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    this.setLanguage(btn.dataset.lang);
                });
            });

            // Set initial button state
            document.querySelectorAll('.lang-btn').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.lang === this.currentLanguage);
            });

            // Add development helper on localhost
            if (window.location.hostname === 'localhost') {
                this.addDevTools();
            }
        });
    }

    // Development tools
    addDevTools() {
        const container = document.createElement('div');
        container.innerHTML = `
            <div style="position: fixed; bottom: 20px; right: 20px; z-index: 9999; display: flex; flex-direction: column; gap: 10px;">
                <button id="clear-cache-btn" style="background: #dc3545; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer;">
                    🗑️ Clear Cache
                </button>
            </div>
        `;
        document.body.appendChild(container);

        document.getElementById('clear-cache-btn').onclick = () => {
            localStorage.removeItem('language');
            console.log('Language cache cleared');
        };
    }
}

// Initialize translator
const translator = new AdvancedTranslator();

// Global functions for backward compatibility
window.setLanguage = (lang) => translator.setLanguage(lang);
window.toggleSearch = () => {
    const searchBox = document.getElementById('searchBox');
    if (searchBox) {
        searchBox.classList.toggle('active');
        if (searchBox.classList.contains('active')) {
            document.getElementById('searchInput')?.focus();
        }
    }
};y
