// Language switching functionality with Google Translate integration
let currentLanguage = localStorage.getItem('language') || 'id';
let isTranslating = false;

// Manual translations for key terms (fallback)
const manualTranslations = {
    id: {
        'promo-text': 'Diskon hingga 25% untuk semua produk insulasi',
        'search-placeholder': 'Cari produk insulasi...',
        'nav-home': 'Beranda',
        'nav-products': 'Produk',
        'nav-services': 'Layanan',
        'nav-gallery': 'Galeri',
        'nav-articles': 'Artikel',
        'nav-contact': 'Kontak',
        'nav-cta': 'Minta Penawaran'
    },
    en: {
        'promo-text': 'Up to 25% discount on all insulation products',
        'search-placeholder': 'Search insulation products...',
        'nav-home': 'Home',
        'nav-products': 'Products',
        'nav-services': 'Services',
        'nav-gallery': 'Gallery',
        'nav-articles': 'Articles',
        'nav-contact': 'Contact',
        'nav-cta': 'Get Quote'
    }
};

// Cache for translations to avoid repeated API calls
const translationCache = new Map();

// Google Translate API function (using free service)
async function translateText(text, targetLang) {
    const cacheKey = `${text}_${targetLang}`;
    
    // Check cache first
    if (translationCache.has(cacheKey)) {
        return translationCache.get(cacheKey);
    }

    try {
        // Using Google Translate Web API (free tier)
        const sourceLang = targetLang === 'en' ? 'id' : 'en';
        const response = await fetch(`https://translate.googleapis.com/translate_a/single?client=gtx&sl=${sourceLang}&tl=${targetLang}&dt=t&q=${encodeURIComponent(text)}`);
        
        if (response.ok) {
            const data = await response.json();
            const translatedText = data[0][0][0];
            
            // Cache the result
            translationCache.set(cacheKey, translatedText);
            return translatedText;
        }
    } catch (error) {
        console.log('Translation API failed, using fallback:', error);
    }
    
    // Fallback to manual translation or return original text
    return text;
}

// Enhanced translation function with auto-detect
async function translateElement(element, targetLang) {
    const key = element.getAttribute('data-translate');
    let textToTranslate = '';
    
    // Get text to translate
    if (element.tagName === 'INPUT' && (element.type === 'text' || element.type === 'search')) {
        textToTranslate = element.getAttribute('data-original-placeholder') || element.placeholder;
    } else {
        textToTranslate = element.getAttribute('data-original-text') || element.textContent.trim();
    }
    
    // Store original text if not stored yet
    if (!element.getAttribute('data-original-text') && element.tagName !== 'INPUT') {
        element.setAttribute('data-original-text', textToTranslate);
    }
    if (!element.getAttribute('data-original-placeholder') && element.tagName === 'INPUT') {
        element.setAttribute('data-original-placeholder', textToTranslate);
    }
    
    // Check manual translations first
    if (manualTranslations[targetLang] && manualTranslations[targetLang][key]) {
        const translation = manualTranslations[targetLang][key];
        if (element.tagName === 'INPUT') {
            element.placeholder = translation;
        } else {
            element.textContent = translation;
        }
        return;
    }
    
    // If target language is Indonesian, use original text
    if (targetLang === 'id') {
        if (element.tagName === 'INPUT') {
            element.placeholder = textToTranslate;
        } else {
            if (key === 'promo-text') {
                element.innerHTML = `<strong>PROMO SPESIAL!</strong> ${textToTranslate} - <span class="highlight">Berlaku sampai akhir bulan!</span>`;
            } else {
                element.textContent = textToTranslate;
            }
        }
        return;
    }
    
    // Use Google Translate for other languages
    try {
        const translatedText = await translateText(textToTranslate, targetLang);
        
        if (element.tagName === 'INPUT') {
            element.placeholder = translatedText;
        } else {
            if (key === 'promo-text') {
                element.innerHTML = `<strong>SPECIAL PROMO!</strong> ${translatedText} - <span class="highlight">Valid until end of month!</span>`;
            } else {
                element.textContent = translatedText;
            }
        }
    } catch (error) {
        console.log('Translation failed for element:', element, error);
    }
}

// Global function to set language with auto-translation
async function setLanguage(lang) {
    if (isTranslating) return; // Prevent concurrent translations
    
    console.log('Setting language to:', lang);
    isTranslating = true;
    
    currentLanguage = lang;
    localStorage.setItem('language', lang);
    
    // Update active language button
    document.querySelectorAll('.lang-btn').forEach(btn => {
        btn.classList.remove('active');
        if (btn.dataset.lang === lang) {
            btn.classList.add('active');
        }
    });
    
    // Show loading indicator
    showLoadingIndicator();
    
    // Apply translations
    await applyTranslations(lang);
    
    // Hide loading indicator
    hideLoadingIndicator();
    isTranslating = false;
}

// Function to apply translations with batch processing
async function applyTranslations(lang) {
    console.log('Applying translations for:', lang);
    
    const elements = document.querySelectorAll('[data-translate]');
    const batchSize = 5; // Process 5 elements at a time to avoid rate limiting
    
    for (let i = 0; i < elements.length; i += batchSize) {
        const batch = Array.from(elements).slice(i, i + batchSize);
        
        // Process batch concurrently
        await Promise.all(batch.map(element => translateElement(element, lang)));
        
        // Small delay between batches to be nice to the API
        if (i + batchSize < elements.length) {
            await new Promise(resolve => setTimeout(resolve, 100));
        }
    }
    
    console.log('All translations applied for language:', lang);
}

// Auto-detect and translate all text content
function autoDetectAndTranslate(targetLang) {
    // Find all text elements that don't have data-translate attribute
    const textElements = document.querySelectorAll('p, h1, h2, h3, h4, h5, h6, span:not(.skip-translate), div:not(.skip-translate)');
    
    textElements.forEach(async (element) => {
        // Skip if already has data-translate or is empty
        if (element.getAttribute('data-translate') || !element.textContent.trim()) return;
        
        // Skip if contains only icons or numbers
        if (element.textContent.match(/^[\d\s\+\-\(\)]+$/) || element.querySelector('i.fa')) return;
        
        // Add to translation queue
        element.setAttribute('data-translate', 'auto-' + Math.random().toString(36).substr(2, 9));
        await translateElement(element, targetLang);
    });
}

// Loading indicator functions
function showLoadingIndicator() {
    let indicator = document.getElementById('translation-loading');
    if (!indicator) {
        indicator = document.createElement('div');
        indicator.id = 'translation-loading';
        indicator.innerHTML = `
            <div style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); 
                        background: rgba(0,0,0,0.8); color: white; padding: 20px; border-radius: 10px; 
                        z-index: 10000; display: flex; align-items: center; gap: 10px;">
                <div style="width: 20px; height: 20px; border: 2px solid #fff; border-top: 2px solid transparent; 
                           border-radius: 50%; animation: spin 1s linear infinite;"></div>
                <span>Translating...</span>
            </div>
            <style>
                @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
            </style>
        `;
        document.body.appendChild(indicator);
    }
    indicator.style.display = 'block';
}

function hideLoadingIndicator() {
    const indicator = document.getElementById('translation-loading');
    if (indicator) {
        indicator.style.display = 'none';
    }
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, initializing advanced language system');
    
    // Add click listeners to language buttons
    document.querySelectorAll('.lang-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const lang = this.dataset.lang;
            console.log('Language button clicked:', lang);
            setLanguage(lang);
        });
    });
    
    // Set initial language
    setLanguage(currentLanguage);
    
    // Add auto-translate button for testing
    if (window.location.hostname === 'localhost') {
        addAutoTranslateButton();
    }
    
    console.log('Advanced language system initialized');
});

// Development helper - Auto translate button
function addAutoTranslateButton() {
    const button = document.createElement('button');
    button.innerHTML = '🌐 Auto Translate All';
    button.style.cssText = `
        position: fixed; bottom: 20px; right: 20px; z-index: 9999; 
        background: #007bff; color: white; border: none; padding: 10px 15px; 
        border-radius: 5px; cursor: pointer; font-size: 12px;
    `;
    button.onclick = () => autoDetectAndTranslate(currentLanguage);
    document.body.appendChild(button);
}

// Other topbar functionality
function toggleSearch() {
    const searchBox = document.getElementById('searchBox');
    if (searchBox) {
        searchBox.classList.toggle('active');
        if (searchBox.classList.contains('active')) {
            document.getElementById('searchInput').focus();
        }
    }
}
