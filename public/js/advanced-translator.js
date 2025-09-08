// Enhanced Language Switcher with Multiple Translation Methods
class AdvancedTranslator {
    constructor() {
        this.currentLanguage = localStorage.getItem('language') || 'id';
        this.cache = new Map();
        this.isTranslating = false;
        this.fallbackTranslations = this.getFallbackTranslations();
        
        // Initialize
        this.init();
    }

    getFallbackTranslations() {
        return {
            id: {
                'search-placeholder': 'Cari produk insulasi...',
                'nav-home': 'Beranda', 'nav-products': 'Produk', 'nav-services': 'Layanan',
                'nav-gallery': 'Galeri', 'nav-articles': 'Artikel', 'nav-contact': 'Kontak',
                'nav-cta': 'Minta Penawaran',
                'hero-badge': 'Distributor Terpercaya Sejak 2011',
                'products-title': 'Solusi Insulasi Terlengkap',
                'learn-more': 'Pelajari Lebih Lanjut'
            },
            en: {
                'search-placeholder': 'Search insulation products...',
                'nav-home': 'Home', 'nav-products': 'Products', 'nav-services': 'Services',
                'nav-gallery': 'Gallery', 'nav-articles': 'Articles', 'nav-contact': 'Contact',
                'nav-cta': 'Get Quote',
                'hero-badge': 'Trusted Distributor Since 2011',
                'products-title': 'Complete Insulation Solutions',
                'learn-more': 'Learn More'
            }
        };
    }

    // Method 1: Using Google Translate (Free tier)
    async translateWithGoogle(text, targetLang) {
        const cacheKey = `google_${text}_${targetLang}`;
        if (this.cache.has(cacheKey)) {
            return this.cache.get(cacheKey);
        }

        try {
            const sourceLang = targetLang === 'en' ? 'id' : 'en';
            const url = `https://translate.googleapis.com/translate_a/single?client=gtx&sl=${sourceLang}&tl=${targetLang}&dt=t&q=${encodeURIComponent(text)}`;
            
            const response = await fetch(url);
            const data = await response.json();
            const translated = data[0][0][0];
            
            this.cache.set(cacheKey, translated);
            return translated;
        } catch (error) {
            console.log('Google Translate failed:', error);
            return null;
        }
    }

    // Method 2: Using MyMemory API (Free)
    async translateWithMyMemory(text, targetLang) {
        const cacheKey = `mymemory_${text}_${targetLang}`;
        if (this.cache.has(cacheKey)) {
            return this.cache.get(cacheKey);
        }

        try {
            const sourceLang = targetLang === 'en' ? 'id' : 'en';
            const url = `https://api.mymemory.translated.net/get?q=${encodeURIComponent(text)}&langpair=${sourceLang}|${targetLang}`;
            
            const response = await fetch(url);
            const data = await response.json();
            
            if (data.responseStatus === 200) {
                const translated = data.responseData.translatedText;
                this.cache.set(cacheKey, translated);
                return translated;
            }
        } catch (error) {
            console.log('MyMemory API failed:', error);
        }
        return null;
    }

    // Method 3: Offline translation using pre-built dictionary
    translateOffline(text, targetLang, key = null) {
        // Check fallback translations first
        if (key && this.fallbackTranslations[targetLang] && this.fallbackTranslations[targetLang][key]) {
            return this.fallbackTranslations[targetLang][key];
        }

        // Basic word-by-word translation for common terms
        const basicDict = {
            id: {
                'home': 'beranda', 'products': 'produk', 'services': 'layanan',
                'gallery': 'galeri', 'articles': 'artikel', 'contact': 'kontak',
                'about': 'tentang', 'quality': 'kualitas', 'professional': 'profesional',
                'installation': 'instalasi', 'consultation': 'konsultasi',
                'shipping': 'pengiriman', 'experience': 'pengalaman',
                'projects': 'proyek', 'clients': 'klien', 'years': 'tahun'
            },
            en: {
                'beranda': 'home', 'produk': 'products', 'layanan': 'services',
                'galeri': 'gallery', 'artikel': 'articles', 'kontak': 'contact',
                'tentang': 'about', 'kualitas': 'quality', 'profesional': 'professional',
                'instalasi': 'installation', 'konsultasi': 'consultation',
                'pengiriman': 'shipping', 'pengalaman': 'experience',
                'proyek': 'projects', 'klien': 'clients', 'tahun': 'years'
            }
        };

        const words = text.toLowerCase().split(' ');
        const translatedWords = words.map(word => {
            return basicDict[targetLang][word] || word;
        });

        return translatedWords.join(' ');
    }

    // Main translation method with multiple fallbacks
    async translateText(text, targetLang, key = null) {
        if (!text || text.trim() === '') return text;
        
        // If target is Indonesian, return original (assuming original is Indonesian)
        if (targetLang === 'id') {
            return text;
        }

        // Try multiple translation methods
        let translated = null;

        // Method 1: Check fallback translations
        translated = this.translateOffline(text, targetLang, key);
        if (translated !== text && key) return translated;

        // Method 2: Try Google Translate
        translated = await this.translateWithGoogle(text, targetLang);
        if (translated) return translated;

        // Method 3: Try MyMemory API
        translated = await this.translateWithMyMemory(text, targetLang);
        if (translated) return translated;

        // Method 4: Basic offline translation
        return this.translateOffline(text, targetLang);
    }

    // Translate element with original text preservation
    async translateElement(element, targetLang) {
        const key = element.getAttribute('data-translate');
        
        // Store original text if not stored
        if (!element.hasAttribute('data-original')) {
            if (element.tagName === 'INPUT') {
                element.setAttribute('data-original', element.placeholder);
            } else {
                element.setAttribute('data-original', element.textContent.trim());
            }
        }

        const originalText = element.getAttribute('data-original');
        
        try {
            const translated = await this.translateText(originalText, targetLang, key);
            
            if (element.tagName === 'INPUT') {
                element.placeholder = translated;
            } else {
                if (key === 'promo-text') {
                    const prefix = targetLang === 'id' ? 'PROMO SPESIAL!' : 'SPECIAL PROMO!';
                    const suffix = targetLang === 'id' ? 'Berlaku sampai akhir bulan!' : 'Valid until end of month!';
                    element.innerHTML = `<strong>${prefix}</strong> ${translated} - <span class="highlight">${suffix}</span>`;
                } else {
                    element.textContent = translated;
                }
            }

            console.log(`Translated "${originalText}" to "${translated}"`);
        } catch (error) {
            console.error('Translation error:', error);
        }
    }

    // Auto-detect and translate all translatable elements
    async autoTranslateAll(targetLang) {
        const elements = document.querySelectorAll('h1, h2, h3, h4, h5, h6, p, span, button, a, label');
        const translatableElements = Array.from(elements).filter(el => {
            // Skip if already has data-translate or is empty
            if (el.getAttribute('data-translate') || !el.textContent.trim()) return false;
            
            // Skip if contains only numbers, symbols, or icons
            if (el.textContent.match(/^[\d\s\+\-\(\)\.\,\!\?\:]+$/) || el.querySelector('i')) return false;
            
            // Skip if too short (likely not meaningful text)
            if (el.textContent.trim().length < 3) return false;
            
            return true;
        });

        console.log(`Auto-translating ${translatableElements.length} elements...`);
        
        for (const element of translatableElements) {
            await this.translateElement(element, targetLang);
            await new Promise(resolve => setTimeout(resolve, 50)); // Small delay
        }
    }

    // Set language with loading indicator
    async setLanguage(lang) {
        if (this.isTranslating) return;
        
        console.log('Setting language to:', lang);
        this.isTranslating = true;
        this.currentLanguage = lang;
        localStorage.setItem('language', lang);
        
        // Update button states
        document.querySelectorAll('.lang-btn').forEach(btn => {
            btn.classList.toggle('active', btn.dataset.lang === lang);
        });
        
        // Show loading
        this.showLoading();
        
        try {
            // Translate marked elements
            const elements = document.querySelectorAll('[data-translate]');
            for (const element of elements) {
                await this.translateElement(element, lang);
            }
            
            console.log(`Language changed to ${lang}`);
        } finally {
            this.hideLoading();
            this.isTranslating = false;
        }
    }

    // Auto-translate with loading
    async autoTranslate() {
        if (this.isTranslating) return;
        
        this.showLoading('Auto-translating page...');
        this.isTranslating = true;
        
        try {
            await this.autoTranslateAll(this.currentLanguage);
        } finally {
            this.hideLoading();
            this.isTranslating = false;
        }
    }

    // Loading indicator
    showLoading(message = 'Translating...') {
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

            // Set initial language
            this.setLanguage(this.currentLanguage);

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
                <button id="auto-translate-btn" style="background: #28a745; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer;">
                    🌐 Auto Translate
                </button>
                <button id="clear-cache-btn" style="background: #dc3545; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer;">
                    🗑️ Clear Cache
                </button>
            </div>
        `;
        document.body.appendChild(container);

        document.getElementById('auto-translate-btn').onclick = () => this.autoTranslate();
        document.getElementById('clear-cache-btn').onclick = () => {
            this.cache.clear();
            localStorage.removeItem('translationCache');
            console.log('Translation cache cleared');
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
};
window.toggleTheme = () => {
    const body = document.body;
    const themeToggle = document.querySelector('.theme-toggle');
    
    if (body.classList.contains('dark-theme')) {
        body.classList.remove('dark-theme');
        body.classList.add('light-theme');
        localStorage.setItem('theme', 'light');
        themeToggle?.classList.remove('dark');
    } else {
        body.classList.remove('light-theme');
        body.classList.add('dark-theme');
        localStorage.setItem('theme', 'dark');
        themeToggle?.classList.add('dark');
    }
};
