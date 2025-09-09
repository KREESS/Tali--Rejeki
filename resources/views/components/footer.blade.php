@php
// Get categories for footer navigation (semua kategori, tanpa limit)
$footerCategories = \App\Models\Category::all();

// Route fallbacks
$termsHref   = \Illuminate\Support\Facades\Route::has('terms')   ? route('terms')   : url('/terms');
$privacyHref = \Illuminate\Support\Facades\Route::has('privacy') ? route('privacy') : url('/privacy');
@endphp


<style>
/* ===== UNIQUE FOOTER COMPONENT STYLING WITH THEME SUPPORT ===== */

/* CSS Custom Properties for Enhanced Theme System */
:root {
    /* Light Theme Colors - Enhanced */
    --footer-comp-bg-primary: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 20%, #dee2e6 40%, #ced4da 60%, #adb5bd 80%, #6c757d 100%);
    --footer-comp-bg-dark: linear-gradient(135deg, #1a1a1a 0%, #2d1414 20%, #8B0000 40%, #DC143C 60%, #FF4444 80%, #FF6B6B 100%);
    --footer-comp-accent: linear-gradient(90deg, #8B0000 0%, #DC143C 25%, #FF4444 50%, #FF6B6B 75%, #8B0000 100%);
    --footer-comp-text-primary: #212529;
    --footer-comp-text-secondary: #495057;
    --footer-comp-text-muted: #6c757d;
    --footer-comp-text-white: #ffffff;
    --footer-comp-bg-card: rgba(255, 255, 255, 0.95);
    --footer-comp-bg-card-hover: rgba(139, 0, 0, 0.08);
    --footer-comp-border: rgba(139, 0, 0, 0.15);
    --footer-comp-shadow: rgba(139, 0, 0, 0.12);
    --footer-comp-overlay: rgba(248, 249, 250, 0.08);
    
    /* Enhanced Interactive Elements */
    --footer-comp-interactive-hover: rgba(220, 20, 60, 0.1);
    --footer-comp-glow: rgba(255, 68, 68, 0.3);
    --footer-comp-text-link: #8B0000;
    --footer-comp-text-link-hover: #DC143C;
    --footer-comp-glass-bg: rgba(255, 255, 255, 0.25);
    --footer-comp-glass-border: rgba(139, 0, 0, 0.2);
}

body.dark-theme {
    /* Dark Theme Colors - Enhanced */
    --footer-comp-bg-primary: linear-gradient(135deg, #0a0a0a 0%, #1a0808 20%, #660000 40%, #8B0000 60%, #220000 80%, #0f0f0f 100%);
    --footer-comp-text-primary: #ffffff;
    --footer-comp-text-secondary: #f8f9fa;
    --footer-comp-text-muted: #e9ecef;
    --footer-comp-bg-card: rgba(255, 255, 255, 0.08);
    --footer-comp-bg-card-hover: rgba(255, 68, 68, 0.18);
    --footer-comp-border: rgba(255, 255, 255, 0.15);
    --footer-comp-shadow: rgba(0, 0, 0, 0.4);
    --footer-comp-overlay: rgba(0, 0, 0, 0.3);
    
    /* Enhanced Dark Mode Interactive Elements */
    --footer-comp-interactive-hover: rgba(255, 68, 68, 0.2);
    --footer-comp-glow: rgba(255, 68, 68, 0.5);
    --footer-comp-text-link: #FF6B6B;
    --footer-comp-text-link-hover: #FF4444;
    --footer-comp-glass-bg: rgba(0, 0, 0, 0.35);
    --footer-comp-glass-border: rgba(255, 68, 68, 0.3);
}

.app-footer-component {
    position: relative;
    margin-top: auto;
    overflow: hidden;
    background: var(--footer-comp-bg-dark);
    transition: all 0.3s ease;
}

/* Light mode footer */
body:not(.dark-theme) .app-footer-component {
    background: var(--footer-comp-bg-primary);
    color: var(--footer-comp-text-primary);
}

/* Dark mode footer */
body.dark-theme .app-footer-component {
    background: var(--footer-comp-bg-dark);
    color: var(--footer-comp-text-white);
}

.app-footer-component::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('{{ asset("img/bg/bg-texture.webp") }}') center/cover;
    opacity: 0.1;
    z-index: 1;
    transition: opacity 0.3s ease;
}

body:not(.dark-theme) .app-footer-component::before {
    opacity: 0.05;
}

.app-footer-component::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg,
        rgba(139, 0, 0, 0.1) 0%,
        transparent 25%,
        transparent 75%,
        rgba(139, 0, 0, 0.1) 100%);
    z-index: 2;
    transition: background 0.3s ease;
}

body:not(.dark-theme) .app-footer-component::after {
    background: linear-gradient(45deg,
        rgba(139, 0, 0, 0.05) 0%,
        transparent 25%,
        transparent 75%,
        rgba(139, 0, 0, 0.05) 100%);
}

.footer-comp-accent {
    height: 6px;
    background: var(--footer-comp-accent);
    position: relative;
    overflow: hidden;
    animation: footerCompAccentFlow 3s ease-in-out infinite;
    box-shadow: 
        0 2px 10px rgba(139, 0, 0, 0.3),
        0 0 20px rgba(255, 68, 68, 0.4);
}

.footer-comp-accent::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, 
        transparent 0%, 
        rgba(255, 255, 255, 0.4) 50%, 
        transparent 100%);
    animation: footerCompShimmer 2s ease-in-out infinite;
}

@keyframes footerCompAccentFlow {
    0%, 100% { 
        transform: scaleX(1); 
        filter: brightness(1);
    }
    50% { 
        transform: scaleX(1.02); 
        filter: brightness(1.2);
    }
}

@keyframes footerCompShimmer {
    0% { left: -100%; }
    100% { left: 100%; }
}

.footer-comp-content {
    position: relative;
    z-index: 3;
    padding: 4rem 0 2rem;
    color: inherit;
    transition: all 0.3s ease;
}

.footer-comp-main {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    gap: 3rem;
    margin-bottom: 3rem;
}

/* Company Info Section */
.footer-comp-company {
    grid-column: span 1;
}

.footer-comp-company-header {
    display: flex;
    align-items: center;
    margin-bottom: 2rem;
}

.footer-comp-company-logo {
    width: 60px;
    height: 60px;
    border-radius: 15px;
    object-fit: cover;
    margin-right: 1rem;
    border: 3px solid var(--footer-comp-border);
    filter: drop-shadow(0 4px 12px var(--footer-comp-shadow));
    transition: all 0.3s ease;
}

.footer-comp-company-logo:hover {
    transform: scale(1.1) rotate(5deg);
    border-color: #FF4444;
    filter: drop-shadow(0 6px 16px var(--footer-comp-shadow));
}

.footer-comp-company-title {
    font-size: 1.5rem;
    font-weight: 900;
    color: #FF4444;
    margin: 0;
    text-shadow: 0 2px 4px var(--footer-comp-shadow);
}

.footer-comp-company-tagline {
    font-size: 0.9rem;
    color: var(--footer-comp-text-muted);
    margin: 0;
    opacity: 0.9;
}

.footer-comp-company-description {
    color: var(--footer-comp-text-secondary);
    line-height: 1.6;
    margin-bottom: 1.5rem;
    font-size: 0.95rem;
}

.footer-comp-company-address {
    background: var(--footer-comp-glass-bg);
    padding: 1.5rem;
    border-radius: 16px;
    border-left: 4px solid #FF4444;
    backdrop-filter: blur(20px);
    border: 1px solid var(--footer-comp-glass-border);
    box-shadow: 
        0 8px 32px var(--footer-comp-shadow),
        inset 0 1px 0 rgba(255, 255, 255, 0.1);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.footer-comp-company-address::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, var(--footer-comp-glow) 0%, transparent 70%);
    opacity: 0;
    transition: opacity 0.4s ease;
    pointer-events: none;
}

.footer-comp-company-address:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: 
        0 20px 60px var(--footer-comp-shadow),
        0 0 30px var(--footer-comp-glow),
        inset 0 1px 0 rgba(255, 255, 255, 0.2);
    border-left-width: 6px;
}

.footer-comp-company-address:hover::before {
    opacity: 0.1;
}

.footer-comp-address-title {
    color: #FF4444;
    font-weight: 700;
    margin-bottom: 0.75rem;
    font-size: 1rem;
    display: flex;
    align-items: center;
}

.footer-comp-address-title i {
    margin-right: 0.5rem;
}

.footer-comp-address-text {
    color: var(--footer-comp-text-secondary);
    line-height: 1.5;
    font-size: 0.9rem;
}

/* Contact Info Section */
.footer-comp-contact {
    grid-column: span 1;
}

.footer-comp-section-title {
    color: #FF4444;
    font-size: 1.3rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    position: relative;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.footer-comp-section-title::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 40px;
    height: 3px;
    background: linear-gradient(90deg, #FF4444, #DC143C);
    border-radius: 2px;
}

.footer-comp-contact-info {
    background: var(--footer-comp-glass-bg);
    padding: 1.5rem;
    border-radius: 16px;
    backdrop-filter: blur(20px);
    margin-bottom: 1.5rem;
    border: 1px solid var(--footer-comp-glass-border);
    box-shadow: 
        0 8px 32px var(--footer-comp-shadow),
        inset 0 1px 0 rgba(255, 255, 255, 0.1);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.footer-comp-contact-info::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, var(--footer-comp-glow) 0%, transparent 70%);
    opacity: 0;
    transition: opacity 0.4s ease;
    pointer-events: none;
}

.footer-comp-contact-info:hover {
    transform: translateY(-3px) scale(1.01);
    box-shadow: 
        0 20px 60px var(--footer-comp-shadow),
        0 0 30px var(--footer-comp-glow),
        inset 0 1px 0 rgba(255, 255, 255, 0.2);
}

.footer-comp-contact-info:hover::before {
    opacity: 0.1;
}

.footer-comp-contact-group {
    margin-bottom: 1.5rem;
}

.footer-comp-contact-group:last-child {
    margin-bottom: 0;
}

.footer-comp-contact-group-title {
    color: #FF6B6B;
    font-weight: 600;
    margin-bottom: 0.75rem;
    font-size: 0.95rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.footer-comp-contact-item {
    display: flex;
    align-items: center;
    margin-bottom: 0.5rem;
    color: var(--footer-comp-text-secondary);
    font-size: 0.9rem;
}

.footer-comp-contact-item i {
    width: 20px;
    color: #FF4444;
    margin-right: 0.75rem;
    flex-shrink: 0;
    transition: all 0.3s ease;
}

.footer-comp-contact-item a {
    color: var(--footer-comp-text-secondary);
    text-decoration: none;
    transition: all 0.3s ease;
}

.footer-comp-contact-item a:hover {
    color: #FF4444;
    transform: translateX(5px);
}

.footer-comp-contact-item:hover i {
    transform: scale(1.2) rotate(10deg);
    color: #FF6B6B;
}

.footer-comp-operating-hours {
    background: var(--footer-comp-bg-card-hover);
    padding: 1rem;
    border-radius: 8px;
    border: 1px solid rgba(255, 68, 68, 0.2);
    transition: all 0.3s ease;
}

.footer-comp-operating-hours:hover {
    background: rgba(255, 68, 68, 0.2);
    transform: translateY(-1px);
}

.footer-comp-hours-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.25rem 0;
    font-size: 0.85rem;
}

.footer-comp-day {
    color: var(--footer-comp-text-muted);
    font-weight: 500;
}

.footer-comp-time {
    color: #FF6B6B;
    font-weight: 600;
}

/* Team Section */
.footer-comp-team {
    grid-column: span 1;
}

.footer-comp-team-grid {
    display: grid;
    gap: 1rem;
}

.footer-comp-team-member {
    background: var(--footer-comp-glass-bg);
    padding: 1rem;
    border-radius: 12px;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid var(--footer-comp-glass-border);
    box-shadow: 
        0 6px 25px var(--footer-comp-shadow),
        inset 0 1px 0 rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(15px);
    position: relative;
    overflow: hidden;
}

.footer-comp-team-member::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, var(--footer-comp-glow) 0%, transparent 70%);
    opacity: 0;
    transition: opacity 0.4s ease;
    pointer-events: none;
}

.footer-comp-team-member:hover {
    background: var(--footer-comp-interactive-hover);
    border-color: rgba(255, 68, 68, 0.4);
    transform: translateY(-8px) scale(1.03);
    box-shadow: 
        0 15px 40px var(--footer-comp-shadow),
        0 0 25px var(--footer-comp-glow),
        inset 0 1px 0 rgba(255, 255, 255, 0.2);
}

.footer-comp-team-member:hover::before {
    opacity: 0.15;
}

.footer-comp-member-name {
    color: #FF4444;
    font-weight: 600;
    margin-bottom: 0.25rem;
    font-size: 0.95rem;
}

.footer-comp-member-contact {
    color: var(--footer-comp-text-secondary);
    font-size: 0.85rem;
    margin-bottom: 0.5rem;
}

.footer-comp-whatsapp-btn {
    background: linear-gradient(135deg, #25D366, #128C7E);
    color: white;
    padding: 0.4rem 0.8rem;
    border-radius: 20px;
    text-decoration: none;
    font-size: 0.8rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
    box-shadow: 0 2px 10px rgba(37, 211, 102, 0.3);
}

.footer-comp-whatsapp-btn:hover {
    background: linear-gradient(135deg, #128C7E, #25D366);
    transform: scale(1.05);
    color: white;
    box-shadow: 0 4px 15px rgba(37, 211, 102, 0.5);
}

.footer-comp-whatsapp-btn i {
    margin-right: 0.4rem;
}

/* Products Section */
.footer-comp-products {
    grid-column: span 1;
}

.footer-comp-products-grid {
    display: grid;
    gap: 0.75rem;
}

.footer-comp-product-category {
    background: var(--footer-comp-glass-bg);
    padding: 1rem;
    border-radius: 12px;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border-left: 3px solid transparent;
    border: 1px solid var(--footer-comp-glass-border);
    box-shadow: 
        0 6px 25px var(--footer-comp-shadow),
        inset 0 1px 0 rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(15px);
    position: relative;
    overflow: hidden;
}

.footer-comp-product-category::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, var(--footer-comp-glow) 0%, transparent 70%);
    opacity: 0;
    transition: opacity 0.4s ease;
    pointer-events: none;
}

.footer-comp-product-category:hover {
    background: var(--footer-comp-interactive-hover) !important;
    border-left-color: #FF4444 !important;
    border-left-width: 5px !important;
    transform: translateX(10px) translateY(-3px) scale(1.02) !important;
    box-shadow: 
        0 15px 40px var(--footer-comp-shadow),
        0 0 25px var(--footer-comp-glow),
        inset 0 1px 0 rgba(255, 255, 255, 0.2);
}

.footer-comp-product-category:hover::before {
    opacity: 0.12;
}

.footer-comp-category-name {
    margin-bottom: 0;
}

.footer-comp-category-link {
    color: #FF4444;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
}

.footer-comp-category-link:hover {
    color: #FF6B6B;
    transform: translateX(3px);
}

.footer-comp-category-link::before {
    content: '📦';
    margin-right: 0.5rem;
    font-size: 0.8rem;
}

/* Social Media Section */
.footer-comp-social-section {
    text-align: center;
    padding: 2rem 0;
    border-top: 1px solid var(--footer-comp-border);
    margin-top: 2rem;
}

.footer-comp-social-title {
    color: #FF4444;
    font-size: 1.2rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.footer-comp-social-links {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 2rem;
    flex-wrap: wrap;
}

.footer-comp-social-link {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-size: 1.2rem;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    border: 2px solid var(--footer-comp-border);
    box-shadow: 0 4px 15px var(--footer-comp-shadow);
}

.footer-comp-social-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 50%;
    transition: all 0.3s ease;
    z-index: -1;
}

.footer-comp-social-link.facebook { color: #1877F2; }
.footer-comp-social-link.facebook::before { background: rgba(24, 119, 242, 0.1); }
.footer-comp-social-link.facebook:hover::before { background: rgba(24, 119, 242, 0.2); }

.footer-comp-social-link.instagram { color: #E4405F; }
.footer-comp-social-link.instagram::before { background: rgba(228, 64, 95, 0.1); }
.footer-comp-social-link.instagram:hover::before { background: rgba(228, 64, 95, 0.2); }

.footer-comp-social-link.whatsapp { color: #25D366; }
.footer-comp-social-link.whatsapp::before { background: rgba(37, 211, 102, 0.1); }
.footer-comp-social-link.whatsapp:hover::before { background: rgba(37, 211, 102, 0.2); }

.footer-comp-social-link.email { color: #EA4335; }
.footer-comp-social-link.email::before { background: rgba(234, 67, 53, 0.1); }
.footer-comp-social-link.email:hover::before { background: rgba(234, 67, 53, 0.2); }

.footer-comp-social-link.phone { color: #FF6B6B; }
.footer-comp-social-link.phone::before { background: rgba(255, 107, 107, 0.1); }
.footer-comp-social-link.phone:hover::before { background: rgba(255, 107, 107, 0.2); }

/* New Social Media Platforms */
.footer-comp-social-link.tokopedia { color: #03AC0E; }
.footer-comp-social-link.tokopedia::before { background: rgba(3, 172, 14, 0.1); }
.footer-comp-social-link.tokopedia:hover::before { background: rgba(3, 172, 14, 0.2); }

.footer-comp-social-link.shopee { color: #EE4D2D; }
.footer-comp-social-link.shopee::before { background: rgba(238, 77, 45, 0.1); }
.footer-comp-social-link.shopee:hover::before { background: rgba(238, 77, 45, 0.2); }

.footer-comp-social-link.tiktok { color: #000000; }
.footer-comp-social-link.tiktok::before { background: rgba(0, 0, 0, 0.1); }
.footer-comp-social-link.tiktok:hover::before { background: rgba(0, 0, 0, 0.2); }

.footer-comp-social-link.youtube { color: #FF0000; }
.footer-comp-social-link.youtube::before { background: rgba(255, 0, 0, 0.1); }
.footer-comp-social-link.youtube:hover::before { background: rgba(255, 0, 0, 0.2); }

/* Dark theme adjustments for TikTok */
body.dark-theme .footer-comp-social-link.tiktok { color: #FF0050; }
body.dark-theme .footer-comp-social-link.tiktok::before { background: rgba(255, 0, 80, 0.1); }
body.dark-theme .footer-comp-social-link.tiktok:hover::before { background: rgba(255, 0, 80, 0.2); }

.footer-comp-social-link:hover {
    transform: translateY(-5px) scale(1.1);
    box-shadow: 0 10px 25px var(--footer-comp-shadow);
    border-color: currentColor;
}

/* Bottom Footer */
.footer-comp-bottom {
    background: var(--footer-comp-overlay);
    padding: 1.5rem 0;
    border-top: 1px solid var(--footer-comp-border);
    text-align: center;
    position: relative;
    z-index: 3;
    backdrop-filter: blur(10px);
}

.footer-comp-bottom-content {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 2rem;
}

.footer-comp-copyright {
    color: var(--footer-comp-text-muted);
    font-size: 0.9rem;
    margin: 0;
}

.footer-comp-links {
    display: flex;
    gap: 2rem;
    align-items: center;
}

.footer-comp-link {
    color: var(--footer-comp-text-secondary);
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 600;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    background: var(--footer-comp-bg-card);
    transition: all 0.3s ease;
    border: 1px solid var(--footer-comp-border);
    box-shadow: 0 2px 8px var(--footer-comp-shadow);
}

.footer-comp-link:hover {
    background: var(--footer-comp-bg-card-hover);
    border-color: rgba(255, 68, 68, 0.3);
    color: #FF4444;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px var(--footer-comp-shadow);
}

/* Floating Elements */
.footer-comp-floating-elements {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 1;
    overflow: hidden;
}

.footer-comp-floating-shape {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 68, 68, 0.1);
    animation: footerCompFloat 6s ease-in-out infinite;
    transition: background 0.3s ease;
}

body:not(.dark-theme) .footer-comp-floating-shape {
    background: rgba(139, 0, 0, 0.05);
}

.footer-comp-floating-shape:nth-child(1) {
    width: 60px;
    height: 60px;
    top: 20%;
    left: 10%;
    animation-delay: 0s;
}

.footer-comp-floating-shape:nth-child(2) {
    width: 40px;
    height: 40px;
    top: 60%;
    right: 15%;
    animation-delay: 2s;
}

.footer-comp-floating-shape:nth-child(3) {
    width: 80px;
    height: 80px;
    bottom: 30%;
    left: 20%;
    animation-delay: 4s;
}

@keyframes footerCompFloat {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
}

/* Theme Toggle Integration */
.footer-comp-theme-aware-text {
    transition: color 0.3s ease;
}

.footer-comp-theme-aware-bg {
    transition: background-color 0.3s ease, border-color 0.3s ease;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .footer-comp-main {
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
    }
    
    .footer-comp-company,
    .footer-comp-contact {
        grid-column: span 1;
    }
    
    .footer-comp-team,
    .footer-comp-products {
        grid-column: span 1;
    }
}

/* Enhanced WA Only text styling */
.footer-comp-wa-only-text {
    font-size: 0.75rem;
    display: block;
    margin-top: 0.25rem;
    font-weight: 500;
    color: #666666;
    transition: color 0.3s ease;
}

body.dark-theme .footer-comp-wa-only-text {
    color: #999999;
}

/* Enhanced social media logo styling - No background */
.footer-comp-social-link img {
    transition: all 0.3s ease;
    border-radius: 4px;
    background: transparent;
    padding: 0;
}

.footer-comp-social-link:hover img {
    transform: scale(1.1);
    filter: drop-shadow(0 2px 8px rgba(0,0,0,0.3));
}

/* Dark theme adjustments - Keep logos transparent */
body.dark-theme .footer-comp-social-link img {
    background: transparent;
    padding: 0;
    border-radius: 4px;
}

body.dark-theme .footer-comp-social-link:hover img {
    background: transparent;
    transform: scale(1.15);
    filter: drop-shadow(0 4px 12px rgba(255, 255, 255, 0.3));
}

@media (max-width: 768px) {
    .footer-comp-content {
        padding: 3rem 0 1.5rem;
    }
    
    .footer-comp-main {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .footer-comp-company,
    .footer-comp-contact,
    .footer-comp-team,
    .footer-comp-products {
        grid-column: span 1;
    }
    
    .footer-comp-company-header {
        flex-direction: column;
        text-align: center;
        margin-bottom: 1.5rem;
    }
    
    .footer-comp-company-logo {
        margin-right: 0;
        margin-bottom: 1rem;
    }
    
    .footer-comp-section-title {
        font-size: 1.1rem;
        text-align: center;
    }
    
    .footer-comp-social-links {
        flex-wrap: wrap;
        gap: 0.75rem;
    }
    
    .footer-comp-social-link {
        width: 45px;
        height: 45px;
        font-size: 1.1rem;
    }
    
    .footer-comp-bottom-content {
        flex-direction: column;
        gap: 1rem;
    }
    
    .footer-comp-links {
        flex-wrap: wrap;
        justify-content: center;
        gap: 1rem;
    }
}

@media (max-width: 480px) {
    .footer-comp-content {
        padding: 2rem 0 1rem;
    }
    
    .footer-comp-main {
        gap: 1.5rem;
    }
    
    .footer-comp-company-address,
    .footer-comp-contact-info,
    .footer-comp-team-member,
    .footer-comp-product-category {
        padding: 1rem;
    }
    
    .footer-comp-section-title {
        font-size: 1rem;
        margin-bottom: 1rem;
    }
    
    .footer-comp-contact-item,
    .footer-comp-address-text,
    .footer-comp-company-description {
        font-size: 0.85rem;
    }
    
    .footer-comp-social-link {
        width: 40px;
        height: 40px;
        font-size: 1rem;
    }
    
    .footer-comp-whatsapp-btn {
        padding: 0.3rem 0.6rem;
        font-size: 0.75rem;
    }
}

/* High contrast mode */
@media (prefers-contrast: high) {
    .app-footer-component {
        background: #000000;
        color: #ffffff;
    }
    
    .footer-comp-accent {
        background: #ffffff;
    }
    
    .footer-comp-social-link,
    .footer-comp-team-member,
    .footer-comp-product-category,
    .footer-comp-contact-info,
    .footer-comp-company-address {
        border: 2px solid #ffffff;
    }
}

/* Reduced motion */
@media (prefers-reduced-motion: reduce) {
    .footer-comp-floating-shape,
    .footer-comp-accent,
    * {
        animation: none !important;
        transition: none !important;
    }
}
</style>

<footer class="app-footer-component">
  <!-- Floating Elements -->
  <div class="footer-comp-floating-elements">
    <div class="footer-comp-floating-shape"></div>
    <div class="footer-comp-floating-shape"></div>
    <div class="footer-comp-floating-shape"></div>
  </div>

  <!-- Footer Accent Line -->
  <div class="footer-comp-accent"></div>

  <!-- Main Footer Content -->
  <div class="footer-comp-content">
    <div class="container">
      <div class="footer-comp-main">
        
        <!-- Company Information -->
        <div class="footer-comp-company">
          <div class="footer-comp-company-header">
            <img src="{{ asset('img/icon-logo/tali-rejeki.jpg') }}" alt="PT Tali Rejeki" class="footer-comp-company-logo">
            <div>
              <h3 class="footer-comp-company-title">PT TALI REJEKI</h3>
              <p class="footer-comp-company-tagline">Solusi Terpercaya Sejak 2011</p>
            </div>
          </div>
          
          <p class="footer-comp-company-description">
            PT Tali Rejeki adalah perusahaan terpercaya yang telah berpengalaman lebih dari satu dekade dalam menyediakan produk berkualitas tinggi dengan pelayanan profesional untuk memenuhi kebutuhan industri dan konsumen.
          </p>
          
          <div class="footer-comp-company-address">
            <div class="footer-comp-address-title">
              <i class="fas fa-map-marker-alt"></i>
              Alamat Kantor
            </div>
            <div class="footer-comp-address-text">
              JL. RAYA TARUMAJAYA NO. 11<br>
              RT 001 RW 029 DUSUN III<br>
              DESA SETIA ASIH<br>
              KEC. TARUMAJAYA<br>
              KAB. BEKASI 17215
            </div>
          </div>
        </div>

        <!-- Contact Information -->
        <div class="footer-comp-contact">
          <h4 class="footer-comp-section-title">Informasi Kontak</h4>
          
          <div class="footer-comp-contact-info">
            <div class="footer-comp-contact-group">
              <div class="footer-comp-contact-group-title">Telepon Kantor</div>
              <div class="footer-comp-contact-item">
                <i class="fas fa-phone"></i>
                <a href="tel:02129470622">021-29470622</a>
              </div>
              <div class="footer-comp-contact-item">
                <i class="fas fa-phone"></i>
                <a href="tel:02122889956">021-22889956</a>
              </div>
            </div>
            
            <div class="footer-comp-contact-group">
              <div class="footer-comp-contact-group-title">Fax & Email</div>
              <div class="footer-comp-contact-item">
                <i class="fas fa-fax"></i>
                <span>021-29470622</span>
              </div>
              <div class="footer-comp-contact-item">
                <i class="fas fa-envelope"></i>
                <a href="mailto:talirejeki@gmail.com">talirejeki@gmail.com</a>
              </div>
            </div>
          </div>
          
          <div class="footer-comp-operating-hours">
            <div class="footer-comp-contact-group-title" style="margin-bottom: 0.75rem;">Jam Operasional</div>
            <div class="footer-comp-hours-item">
              <span class="footer-comp-day">Senin - Jumat</span>
              <span class="footer-comp-time">08:00 - 17:00 WIB</span>
            </div>
            <div class="footer-comp-hours-item">
              <span class="footer-comp-day">Sabtu - Minggu</span>
              <span class="footer-comp-time">Tutup</span>
            </div>
          </div>
        </div>

        <!-- Marketing Team -->
        <div class="footer-comp-team">
          <h4 class="footer-comp-section-title">Tim Marketing</h4>
          
          <div class="footer-comp-team-grid">
            <div class="footer-comp-team-member">
              <div class="footer-comp-member-name">Yovien Agustina</div>
              <div class="footer-comp-member-contact">Marketing Manager</div>
              <a href="https://wa.me/6281385231149" target="_blank" class="footer-comp-whatsapp-btn">
                <i class="fab fa-whatsapp"></i>
                0813-8523-1149
              </a>
            </div>
            
            <div class="footer-comp-team-member">
              <div class="footer-comp-member-name">Siti</div>
              <div class="footer-comp-member-contact">Marketing Executive</div>
              <a href="https://wa.me/6281382523722" target="_blank" class="footer-comp-whatsapp-btn">
                <i class="fab fa-whatsapp"></i>
                0813 8252 3722
              </a>
            </div>
            
            <div class="footer-comp-team-member">
              <div class="footer-comp-member-name">Kurnia</div>
              <div class="footer-comp-member-contact">Marketing Specialist</div>
              <a href="https://wa.me/6281384808218" target="_blank" class="footer-comp-whatsapp-btn">
                <i class="fab fa-whatsapp"></i>
                0813 8480 8218
              </a>
              <small class="footer-comp-wa-only-text">(WA Only)</small>
            </div>
            
            <div class="footer-comp-team-member">
              <div class="footer-comp-member-name">Sari</div>
              <div class="footer-comp-member-contact">Marketing Consultant</div>
              <a href="https://wa.me/6281316826959" target="_blank" class="footer-comp-whatsapp-btn">
                <i class="fab fa-whatsapp"></i>
                0813 1682 6959
              </a>
            </div>
            
            <div class="footer-comp-team-member">
              <div class="footer-comp-member-name">Edy Purwanto</div>
              <div class="footer-comp-member-contact">Senior Marketing</div>
              <a href="https://wa.me/6281514515990" target="_blank" class="footer-comp-whatsapp-btn">
                <i class="fab fa-whatsapp"></i>
                0815 1451 5990
              </a>
            </div>
          </div>
        </div>

        <!-- Product Categories -->
        <div class="footer-comp-products">
          <h4 class="footer-comp-section-title">Produk Kami</h4>
          
          <div class="footer-comp-products-grid">
            @if($footerCategories->count() > 0)
              @foreach($footerCategories as $category)
                <div class="footer-comp-product-category">
                  <div class="footer-comp-category-name">
                    <a href="{{ route('products.category', $category->slug) }}" class="footer-comp-category-link">
                      {{ $category->name }}
                    </a>
                  </div>
                </div>
              @endforeach
            @else
              <div class="footer-comp-product-category">
                <div class="footer-comp-category-name">
                  <a href="{{ route('products.index') }}" class="footer-comp-category-link">
                    Semua Produk
                  </a>
                </div>
              </div>
            @endif
            
            <!-- Quick Links - Removed as requested -->
          </div>
        </div>
        
      </div>

      <!-- Social Media Section -->
      <div class="footer-comp-social-section">
        <h4 class="footer-comp-social-title">Ikuti Kami</h4>
        <div class="footer-comp-social-links">
          <!-- WhatsApp -->
          <a href="https://wa.me/6281382523722" target="_blank" class="footer-comp-social-link whatsapp" title="WhatsApp">
            <i class="fab fa-whatsapp"></i>
          </a>
          
          <!-- Email -->
          <a href="mailto:talirejeki@gmail.com" class="footer-comp-social-link email" title="Email">
            <i class="fas fa-envelope"></i>
          </a>
          
          <!-- Phone -->
          <a href="tel:02129470622" class="footer-comp-social-link phone" title="Telepon">
            <i class="fas fa-phone"></i>
          </a>
          
          <!-- Facebook -->
          <a href="https://facebook.com/PTTaliRejeki" target="_blank" class="footer-comp-social-link facebook" title="Facebook">
            <i class="fab fa-facebook-f"></i>
          </a>
          
          <!-- Instagram -->
          <a href="https://instagram.com/PTTaliRejeki" target="_blank" class="footer-comp-social-link instagram" title="Instagram">
            <i class="fab fa-instagram"></i>
          </a>
          
          <!-- Tokopedia -->
          <a href="https://www.tokopedia.com/talirejeki" target="_blank" class="footer-comp-social-link tokopedia" title="Tokopedia">
            <img src="https://cdn.brandfetch.io/idoruRsDhk/theme/dark/symbol.svg?c=1bxid64Mup7aczewSAYMX&t=1668515567929" alt="Tokopedia" style="width: 24px; height: 24px;">
          </a>
          
          <!-- Shopee -->
          <a href="https://shopee.co.id/pttalirejeki" target="_blank" class="footer-comp-social-link shopee" title="Shopee">
            <img src="https://img.icons8.com/color/48/shopee.png" alt="Shopee" style="width: 20px; height: 20px;">
          </a>
          
          <!-- TikTok -->
          <a href="https://www.tiktok.com/@pt.tali.rejeki" target="_blank" class="footer-comp-social-link tiktok" title="TikTok">
            <i class="fab fa-tiktok"></i>
          </a>
          
          <!-- YouTube -->
          <a href="https://www.youtube.com/@pttalirejeki1408" target="_blank" class="footer-comp-social-link youtube" title="YouTube">
            <i class="fab fa-youtube"></i>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bottom Footer -->
  <div class="footer-comp-bottom">
    <div class="container">
      <div class="footer-comp-bottom-content">
        <p class="footer-comp-copyright">
          &copy; {{ date('Y') }} PT Tali Rejeki. All Rights Reserved.
        </p>
        <div class="footer-comp-links">
          <a href="{{ $termsHref }}" class="footer-comp-link">
            <i class="fas fa-file-contract"></i>
            Terms of Service
          </a>
          <a href="{{ $privacyHref }}" class="footer-comp-link">
            <i class="fas fa-shield-alt"></i>
            Privacy Policy
          </a>
          <a href="{{ route('contact') }}" class="footer-comp-link">
            <i class="fas fa-envelope"></i>
            Contact Us
          </a>
        </div>
      </div>
    </div>
  </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Enhanced footer interactions with unique selectors
  const footer = document.querySelector('.app-footer-component');
  const companyLogo = document.querySelector('.footer-comp-company-logo');
  const footerLinks = document.querySelectorAll('.footer-comp-link, .footer-comp-category-link, .subcategory-link');
  const socialLinks = document.querySelectorAll('.footer-comp-social-link');
  const whatsappBtns = document.querySelectorAll('.footer-comp-whatsapp-btn');

  // Add ripple effect to clickable elements
  function createRipple(e, element) {
    const ripple = document.createElement('span');
    const rect = element.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = e.clientX - rect.left - size / 2;
    const y = e.clientY - rect.top - size / 2;
    
    ripple.style.cssText = `
      position: absolute;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.3);
      transform: scale(0);
      animation: footerCompRippleEffect 0.6s linear;
      width: ${size}px;
      height: ${size}px;
      left: ${x}px;
      top: ${y}px;
      pointer-events: none;
      z-index: 10;
    `;
    
    element.style.position = 'relative';
    element.style.overflow = 'hidden';
    element.appendChild(ripple);
    
    setTimeout(() => ripple.remove(), 600);
  }

  // Add ripple effect to footer links
  footerLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      createRipple(e, this);
    });
  });

  // Add ripple effect to social links
  socialLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      createRipple(e, this);
    });
  });

  // Add ripple effect to WhatsApp buttons
  whatsappBtns.forEach(btn => {
    btn.addEventListener('click', function(e) {
      createRipple(e, this);
    });
  });

  // Company logo interactions
  if (companyLogo) {
    let rotationAngle = 0;
    
    companyLogo.addEventListener('mouseenter', function() {
      rotationAngle += 360;
      this.style.transform = `scale(1.1) rotate(${rotationAngle}deg)`;
    });

    companyLogo.addEventListener('mouseleave', function() {
      this.style.transform = 'scale(1) rotate(0deg)';
    });

    // Click animation
    companyLogo.addEventListener('click', function() {
      this.style.transform = 'scale(0.9) rotate(180deg)';
      setTimeout(() => {
        this.style.transform = 'scale(1.1) rotate(360deg)';
      }, 150);
      setTimeout(() => {
        this.style.transform = 'scale(1) rotate(0deg)';
      }, 300);
    });
  }

  // Parallax effect for floating elements
  window.addEventListener('scroll', function() {
    const scrolled = window.pageYOffset;
    const floatingShapes = footer.querySelectorAll('.footer-comp-floating-shape');
    
    floatingShapes.forEach((shape, index) => {
      const speed = 0.1 + (index * 0.05);
      shape.style.transform = `translateY(${scrolled * speed}px) rotate(${scrolled * 0.1}deg)`;
    });
    
    // Footer accent parallax
    const accent = footer.querySelector('.footer-comp-accent');
    if (accent) {
      accent.style.transform = `translateY(${scrolled * 0.05}px)`;
    }
  });

  // Interactive cursor effect for footer
  footer.addEventListener('mousemove', function(e) {
    const rect = this.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    
    // Create dynamic glow effect
    if (Math.random() > 0.95) { // Only create occasionally to avoid performance issues
      const glow = document.createElement('div');
      glow.style.cssText = `
        position: absolute;
        pointer-events: none;
        width: 60px;
        height: 60px;
        background: radial-gradient(circle, rgba(255, 68, 68, 0.2) 0%, transparent 70%);
        border-radius: 50%;
        left: ${x - 30}px;
        top: ${y - 30}px;
        z-index: 1;
        animation: footerCompGlowFade 2s ease-out forwards;
      `;
      
      this.appendChild(glow);
      
      setTimeout(() => {
        if (glow.parentNode) {
          glow.remove();
        }
      }, 2000);
    }
  });

  // Animate elements on scroll into view
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
      }
    });
  }, observerOptions);

  // Observe footer sections
  const footerSections = footer.querySelectorAll('.footer-comp-company, .footer-comp-contact, .footer-comp-team, .footer-comp-products');
  footerSections.forEach(section => {
    section.style.opacity = '0';
    section.style.transform = 'translateY(30px)';
    section.style.transition = 'all 0.6s ease';
    observer.observe(section);
  });

  // Enhanced hover effects for team members
  const teamMembers = footer.querySelectorAll('.footer-comp-team-member');
  teamMembers.forEach(member => {
    member.addEventListener('mouseenter', function() {
      this.style.transform = 'translateY(-8px) scale(1.02)';
      this.style.boxShadow = '0 15px 35px rgba(0,0,0,0.2)';
    });
    
    member.addEventListener('mouseleave', function() {
      this.style.transform = 'translateY(0) scale(1)';
      this.style.boxShadow = 'none';
    });
  });

  // Enhanced hover effects for product categories with proper reset
  const productCategories = footer.querySelectorAll('.footer-comp-product-category');
  
  // Helper function to reset category style
  function resetCategoryStyle(category) {
    category.style.background = '';
    category.style.borderLeftColor = '';
    category.style.borderLeftWidth = '';
    category.style.transform = '';
    category.style.boxShadow = '';
  }
  
  productCategories.forEach(category => {
    category.addEventListener('mouseenter', function() {
      this.style.background = 'var(--footer-comp-interactive-hover)';
      this.style.borderLeftColor = '#FF4444';
      this.style.borderLeftWidth = '5px';
      this.style.transform = 'translateX(10px) translateY(-3px) scale(1.02)';
      this.style.boxShadow = '0 15px 40px var(--footer-comp-shadow), 0 0 25px var(--footer-comp-glow), inset 0 1px 0 rgba(255, 255, 255, 0.2)';
    });
    
    category.addEventListener('mouseleave', function() {
      resetCategoryStyle(this);
    });
    
    // Also reset on mouse out (backup)
    category.addEventListener('mouseout', function() {
      resetCategoryStyle(this);
    });
  });

  // Contact info hover effects
  const contactItems = footer.querySelectorAll('.footer-comp-contact-item');
  contactItems.forEach(item => {
    item.addEventListener('mouseenter', function() {
      const icon = this.querySelector('i');
      if (icon) {
        icon.style.transform = 'scale(1.2) rotate(10deg)';
        icon.style.color = '#FF6B6B';
      }
    });
    
    item.addEventListener('mouseleave', function() {
      const icon = this.querySelector('i');
      if (icon) {
        icon.style.transform = 'scale(1) rotate(0deg)';
        icon.style.color = '#FF4444';
      }
    });
  });

  // Dynamic floating particles (for modern browsers)
  function createFloatingParticle() {
    if (window.innerWidth > 768) {
      const particle = document.createElement('div');
      particle.style.cssText = `
        position: absolute;
        width: ${Math.random() * 6 + 2}px;
        height: ${Math.random() * 6 + 2}px;
        background: rgba(255, ${Math.random() * 100 + 68}, 68, ${Math.random() * 0.6 + 0.2});
        border-radius: 50%;
        left: ${Math.random() * 100}%;
        bottom: 0;
        pointer-events: none;
        z-index: 1;
        animation: footerCompParticleFloat ${Math.random() * 8 + 5}s linear forwards;
      `;
      
      footer.appendChild(particle);
      
      setTimeout(() => {
        if (particle.parentNode) {
          particle.remove();
        }
      }, 13000);
    }
  }

  // Create particles periodically
  if (window.innerWidth > 768 && 'IntersectionObserver' in window) {
    setInterval(createFloatingParticle, 3000);
  }

  // Smooth scroll for internal links
  footer.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        target.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    });
  });

  // Performance optimization: Throttle scroll events
  let scrollTimeout;
  const originalScrollHandler = window.onscroll;
  window.addEventListener('scroll', function() {
    if (scrollTimeout) {
      clearTimeout(scrollTimeout);
    }
    scrollTimeout = setTimeout(originalScrollHandler, 16); // ~60fps
  });
});

// Add unique CSS animations for footer component
const footerCompStyle = document.createElement('style');
footerCompStyle.textContent = `
  @keyframes footerCompRippleEffect {
    to {
      transform: scale(4);
      opacity: 0;
    }
  }
  
  @keyframes footerCompGlowFade {
    0% {
      opacity: 1;
      transform: scale(0);
    }
    50% {
      opacity: 0.6;
      transform: scale(1);
    }
    100% {
      opacity: 0;
      transform: scale(2);
    }
  }
  
  @keyframes footerCompParticleFloat {
    0% {
      transform: translateY(0) rotate(0deg);
      opacity: 1;
    }
    100% {
      transform: translateY(-200px) rotate(360deg);
      opacity: 0;
    }
  }
  
  /* Enhanced loading animation for footer component */
  .footer-comp-section-loading {
    opacity: 0;
    transform: translateY(50px);
    animation: footerCompSectionLoad 0.8s ease-out forwards;
  }
  
  @keyframes footerCompSectionLoad {
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
`;
document.head.appendChild(footerCompStyle);
</script>