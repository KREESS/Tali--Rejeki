    @php
    // Pakai route jika tersedia, fallback ke /terms dan /privacy
    $termsHref   = \Illuminate\Support\Facades\Route::has('terms')   ? route('terms')   : url('/terms');
    $privacyHref = \Illuminate\Support\Facades\Route::has('privacy') ? route('privacy') : url('/privacy');
@endphp

<style>
  /* ===== PREMIUM FOOTER STYLING ===== */
  .app-footer {
    position: relative;
    left: 0; 
    right: 0; 
    bottom: 0;
    z-index: 100;
    margin-top: auto;
    margin-left: 280px;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  }

  /* Responsive footer positioning */
  @media (max-width: 768px) {
    .app-footer {
      margin-left: 0 !important;
    }
  }

  /* Enhanced footer animations */
  .app-footer .footer-accent {
    height: 3px;
    background: linear-gradient(90deg,
      #7c1415 0%,
      #b71c1c 25%,
      #ff4444 50%,
      #b71c1c 75%,
      #7c1415 100%);
    opacity: 0.9;
    position: relative;
    overflow: hidden;
  }

  .app-footer .footer-accent::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, 
      transparent, 
      rgba(255, 255, 255, 0.4), 
      transparent);
    animation: footerShine 3s ease-in-out infinite;
  }

  @keyframes footerShine {
    0% { left: -100%; }
    50% { left: 100%; }
    100% { left: 100%; }
  }

  .app-footer .footer-inner {
    display: flex; 
    align-items: center; 
    justify-content: center; 
    gap: 12px;
    flex-wrap: wrap;
    padding: 16px 20px;
    color: #ffffff;
    font-size: 14px; 
    font-weight: 600; 
    letter-spacing: 0.3px;
    text-shadow: 
      0 2px 4px rgba(0,0,0,0.6), 
      0 0 12px rgba(0,0,0,0.4);
    background: linear-gradient(135deg, 
      rgba(0,0,0,0.6) 0%, 
      rgba(124,20,21,0.4) 50%, 
      rgba(0,0,0,0.6) 100%);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    position: relative;
    overflow: hidden;
  }

  .app-footer .footer-inner::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
      radial-gradient(circle at 20% 50%, rgba(255, 68, 68, 0.1) 0%, transparent 50%),
      radial-gradient(circle at 80% 50%, rgba(124, 20, 21, 0.1) 0%, transparent 50%);
    pointer-events: none;
    z-index: -1;
  }

  .app-footer .brand-mark {
    height: 20px; 
    width: auto; 
    border-radius: 6px; 
    object-fit: cover;
    filter: 
      drop-shadow(0 2px 8px rgba(0,0,0,0.4))
      drop-shadow(0 0 12px rgba(255, 68, 68, 0.3));
    transition: all 0.3s ease;
  }

  .app-footer .brand-mark:hover {
    filter: 
      drop-shadow(0 4px 12px rgba(0,0,0,0.5))
      drop-shadow(0 0 16px rgba(255, 68, 68, 0.5));
    transform: scale(1.05);
  }

  .app-footer .sep { 
    opacity: 0.7; 
    padding: 0 8px; 
    color: #ff4444;
    font-weight: 800;
  }

  .app-footer .brand { 
    font-weight: 800; 
    color: #ffffff; 
    text-shadow: 
      0 2px 4px rgba(0,0,0,0.6),
      0 0 8px rgba(255, 68, 68, 0.4);
    background: linear-gradient(135deg, #ffffff, #ff6666);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    position: relative;
  }

  .app-footer .footer-links { 
    display: flex; 
    align-items: center; 
    gap: 8px; 
  }

  .app-footer .footer-links a {
    color: #ffffff; 
    text-decoration: none; 
    font-weight: 700; 
    opacity: 0.9;
    padding: 6px 12px;
    border-radius: 8px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(5px);
    border: 1px solid rgba(255, 68, 68, 0.3);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }

  .app-footer .footer-links a::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, 
      transparent, 
      rgba(255, 68, 68, 0.3), 
      transparent);
    transition: left 0.5s ease;
  }

  .app-footer .footer-links a:hover { 
    text-decoration: none;
    opacity: 1; 
    background: rgba(255, 68, 68, 0.2);
    border-color: #ff4444;
    transform: translateY(-2px);
    box-shadow: 
      0 4px 12px rgba(0,0,0,0.3),
      0 0 16px rgba(255, 68, 68, 0.4);
    text-shadow: 0 0 8px rgba(255, 68, 68, 0.6);
  }

  .app-footer .footer-links a:hover::before {
    left: 100%;
  }

  .app-footer .footer-links a:focus-visible { 
    outline: 2px solid #ff4444; 
    outline-offset: 2px; 
    border-radius: 8px; 
  }

  .app-footer .footer-links .sep {
    color: #ff6666;
    opacity: 0.8;
    font-weight: 700;
    padding: 0 4px;
  }

  /* Copyright dan info lainnya */
  .app-footer span:not(.sep):not(.brand) {
    opacity: 0.9;
    transition: opacity 0.3s ease;
  }

  .app-footer span:not(.sep):not(.brand):hover {
    opacity: 1;
    text-shadow: 
      0 2px 4px rgba(0,0,0,0.6),
      0 0 8px rgba(255, 255, 255, 0.3);
  }

  /* Responsif */
  @media (max-width: 768px) {
    .app-footer .footer-inner { 
      font-size: 13px; 
      gap: 8px; 
      padding: 14px 16px;
      flex-direction: column;
      text-align: center;
    }
    
    .app-footer .brand-mark { 
      height: 18px; 
    }
    
    .app-footer .footer-links { 
      gap: 6px; 
      margin-top: 4px;
    }

    .app-footer .footer-links a {
      padding: 4px 8px;
      font-size: 12px;
    }
  }

  @media (max-width: 480px) {
    .app-footer .footer-inner {
      font-size: 12px;
      gap: 6px;
      padding: 12px 14px;
    }

    .app-footer .sep {
      padding: 0 4px;
    }

    .app-footer .footer-links {
      flex-wrap: wrap;
      justify-content: center;
    }
  }

  /* Enhanced responsive design */
  @media (min-width: 769px) and (max-width: 1024px) {
    .app-footer .footer-inner {
      padding: 18px 25px;
      gap: 15px;
    }
  }

  @media (min-width: 1025px) {
    .app-footer .footer-inner {
      padding: 20px 30px;
      gap: 18px;
    }
  }

  /* Dark mode support */
  @media (prefers-color-scheme: dark) {
    .app-footer .footer-inner {
      background: linear-gradient(135deg, 
        rgba(0,0,0,0.8) 0%, 
        rgba(124,20,21,0.6) 50%, 
        rgba(0,0,0,0.8) 100%);
    }
  }

  /* Reduced motion */
  @media (prefers-reduced-motion: reduce) {
    .app-footer .footer-accent::before,
    .app-footer .footer-links a::before {
      animation: none !important;
      transition: none !important;
    }
  }

  /* High contrast mode */
  @media (prefers-contrast: high) {
    .app-footer .footer-inner {
      background: rgba(0,0,0,0.9);
      border-top: 2px solid #ffffff;
    }
    
    .app-footer .footer-links a {
      border: 2px solid #ffffff;
      background: rgba(255, 255, 255, 0.2);
    }
  }
</style>

<footer class="app-footer">
  <div class="footer-accent"></div>
  <div class="footer-inner">
    <img src="{{ asset('img/icon-logo/tali-rejeki.jpg') }}" alt="Tali Rejeki" class="brand-mark">
    <span>Copyright &copy; 2011 — {{ date('Y') }}</span>
    <span class="sep">•</span>
    <span>All Rights Reserved</span>
    <span class="sep">•</span>
    <span class="brand">Tali Rejeki</span>
    <span class="sep">•</span>

    <nav class="footer-links" aria-label="Legal">
      <a href="{{ $termsHref }}">📄 Terms of Service</a>
      <span class="sep">/</span>
      <a href="{{ $privacyHref }}">🛡️ Privacy Policy</a>
    </nav>
  </div>
</footer>