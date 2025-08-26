    @php
    // Pakai route jika tersedia, fallback ke /terms dan /privacy
    $termsHref   = \Illuminate\Support\Facades\Route::has('terms')   ? route('terms')   : url('/terms');
    $privacyHref = \Illuminate\Support\Facades\Route::has('privacy') ? route('privacy') : url('/privacy');
  @endphp
  
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
        <a href="{{ $termsHref }}">Terms of Service</a>
        <span class="sep">/</span>
        <a href="{{ $privacyHref }}">Privacy Policy</a>
      </nav>
    </div>
  </footer>