    @php
    // Pakai route jika tersedia, fallback ke /terms dan /privacy
    $termsHref   = \Illuminate\Support\Facades\Route::has('terms')   ? route('terms')   : url('/terms');
    $privacyHref = \Illuminate\Support\Facades\Route::has('privacy') ? route('privacy') : url('/privacy');
@endphp

<style>
  /* ===== MINIMALIST WHITE FOOTER STYLING ===== */
  .app-footer {
    position: relative;
    left: 0; 
    right: 0; 
    bottom: 0;
    z-index: 100;
    margin-top: auto;
    margin-left: 280px;
    transition: all 0.3s ease;
  }

  /* Responsive footer positioning */
  @media (max-width: 768px) {
    .app-footer {
      margin-left: 0 !important;
    }
  }

  /* Simple accent line */
  .app-footer .footer-accent {
    height: 2px;
    background: #e0e0e0;
  }

  .app-footer .footer-inner {
    display: flex; 
    align-items: center; 
    justify-content: center; 
    gap: 12px;
    flex-wrap: wrap;
    padding: 16px 20px;
    color: #666666;
    font-size: 14px; 
    font-weight: 400; 
    background: #ffffff;
    border-top: 1px solid #f0f0f0;
  }

  .app-footer .brand-mark {
    height: 18px; 
    width: auto; 
    border-radius: 4px; 
    object-fit: cover;
    transition: opacity 0.3s ease;
  }

  .app-footer .brand-mark:hover {
    opacity: 0.8;
  }

  .app-footer .sep { 
    color: #cccccc;
    padding: 0 6px; 
    font-weight: 300;
  }

  .app-footer .brand { 
    font-weight: 600; 
    color: #333333;
  }

  .app-footer .footer-links { 
    display: flex; 
    align-items: center; 
    gap: 6px; 
  }

  .app-footer .footer-links a {
    color: #666666; 
    text-decoration: none; 
    font-weight: 400; 
    padding: 4px 8px;
    border-radius: 4px;
    transition: all 0.3s ease;
  }

  .app-footer .footer-links a:hover { 
    color: #333333;
    background: #f8f8f8;
    text-decoration: none;
  }

  .app-footer .footer-links a:focus-visible { 
    outline: 2px solid #666666; 
    outline-offset: 2px; 
    border-radius: 4px; 
  }

  .app-footer .footer-links .sep {
    color: #dddddd;
    font-weight: 300;
    padding: 0 4px;
  }

  /* Copyright dan info lainnya */
  .app-footer span:not(.sep):not(.brand) {
    color: #888888;
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
      height: 16px; 
    }
    
    .app-footer .footer-links { 
      gap: 4px; 
      margin-top: 4px;
    }

    .app-footer .footer-links a {
      padding: 3px 6px;
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
      padding: 0 3px;
    }

    .app-footer .footer-links {
      flex-wrap: wrap;
      justify-content: center;
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