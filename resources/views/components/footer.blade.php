    @php
    // Pakai route jika tersedia, fallback ke /terms dan /privacy
    $termsHref   = \Illuminate\Support\Facades\Route::has('terms')   ? route('terms')   : url('/terms');
    $privacyHref = \Illuminate\Support\Facades\Route::has('privacy') ? route('privacy') : url('/privacy');
@endphp

<style>
  /* ===== ULTRA PREMIUM FOOTER STYLING ===== */
  .app-footer {
    position: relative;
    left: 0; 
    right: 0; 
    bottom: 0;
    z-index: 100;
    margin-top: auto;
    overflow: hidden;
  }

  .app-footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('{{ asset("img/bg/bg-texture.webp") }}');
    background-size: cover;
    background-position: center;
    z-index: -2;
  }

  .app-footer::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: transparent;
    z-index: -1;
  }

  @keyframes backgroundPulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.7; }
  }

  .app-footer .footer-accent {
    height: 6px;
    background: linear-gradient(90deg,
      #7c1415 0%,
      #b71c1c 15%,
      #ff4444 30%,
      #ff6b6b 50%,
      #ff4444 70%,
      #b71c1c 85%,
      #7c1415 100%);
    position: relative;
    overflow: hidden;
    box-shadow: 
      0 2px 10px rgba(255, 68, 68, 0.4),
      inset 0 1px 0 rgba(255, 255, 255, 0.2);
  }

  .app-footer .footer-accent::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, 
      transparent 0%, 
      rgba(255, 255, 255, 0.6) 50%, 
      transparent 100%);
    animation: footerShine 4s ease-in-out infinite;
  }

  .app-footer .footer-accent::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(90deg,
      transparent 0%,
      rgba(255, 255, 255, 0.1) 25%,
      rgba(255, 255, 255, 0.2) 50%,
      rgba(255, 255, 255, 0.1) 75%,
      transparent 100%);
    animation: accentGlow 6s ease-in-out infinite;
  }

  @keyframes footerShine {
    0% { left: -100%; }
    50% { left: 100%; }
    100% { left: 100%; }
  }

  @keyframes accentGlow {
    0%, 100% { opacity: 0.5; }
    50% { opacity: 1; }
  }

  .app-footer .footer-inner {
    display: flex; 
    align-items: center; 
    justify-content: center; 
    gap: 15px;
    flex-wrap: wrap;
    padding: 24px 30px;
    color: #ffffff;
    font-size: 15px; 
    font-weight: 600; 
    letter-spacing: 0.5px;
    text-shadow: 
      0 3px 6px rgba(0,0,0,0.7), 
      0 0 20px rgba(0,0,0,0.5),
      0 1px 3px rgba(255, 68, 68, 0.3);
    background: 
      linear-gradient(135deg, 
        rgba(0,0,0,0.4) 0%, 
        rgba(124,20,21,0.3) 25%,
        rgba(183,28,28,0.2) 50%,
        rgba(124,20,21,0.3) 75%,
        rgba(0,0,0,0.4) 100%
      );
    backdrop-filter: blur(15px) saturate(180%);
    -webkit-backdrop-filter: blur(15px) saturate(180%);
    border-top: 1px solid rgba(255, 255, 255, 0.15);
    border-bottom: 1px solid rgba(255, 68, 68, 0.2);
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
      radial-gradient(circle at 15% 50%, rgba(255, 68, 68, 0.08) 0%, transparent 60%),
      radial-gradient(circle at 85% 50%, rgba(124, 20, 21, 0.08) 0%, transparent 60%),
      radial-gradient(circle at 50% 100%, rgba(255, 255, 255, 0.03) 0%, transparent 50%);
    pointer-events: none;
    z-index: -1;
    animation: innerGlow 10s ease-in-out infinite;
  }

  .app-footer .footer-inner::after {
    content: '';
    position: absolute;
    top: 0;
    left: -50%;
    width: 200%;
    height: 100%;
    background: linear-gradient(45deg,
      transparent 40%,
      rgba(255, 255, 255, 0.03) 50%,
      transparent 60%);
    animation: shimmer 12s ease-in-out infinite;
    pointer-events: none;
  }

  @keyframes innerGlow {
    0%, 100% { opacity: 1; }
    33% { opacity: 0.6; }
    66% { opacity: 0.8; }
  }

  @keyframes shimmer {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
  }

  .app-footer .brand-mark {
    height: 28px; 
    width: auto; 
    border-radius: 10px; 
    object-fit: cover;
    filter: 
      drop-shadow(0 4px 12px rgba(0,0,0,0.6))
      drop-shadow(0 0 20px rgba(255, 68, 68, 0.4))
      drop-shadow(0 2px 6px rgba(255, 255, 255, 0.1));
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    border: 2px solid rgba(255, 255, 255, 0.2);
    background: rgba(255, 255, 255, 0.1);
    padding: 2px;
  }

  .app-footer .brand-mark:hover {
    filter: 
      drop-shadow(0 6px 16px rgba(0,0,0,0.7))
      drop-shadow(0 0 25px rgba(255, 68, 68, 0.6))
      drop-shadow(0 3px 8px rgba(255, 255, 255, 0.2));
    transform: scale(1.1) rotate(5deg);
    border-color: rgba(255, 68, 68, 0.4);
    background: rgba(255, 68, 68, 0.1);
  }

  .app-footer .sep { 
    opacity: 0.8; 
    padding: 0 10px; 
    color: #ff6b6b;
    font-weight: 900;
    font-size: 16px;
    text-shadow: 
      0 0 10px rgba(255, 107, 107, 0.6),
      0 2px 4px rgba(0,0,0,0.8);
    animation: sepPulse 3s ease-in-out infinite;
  }

  @keyframes sepPulse {
    0%, 100% { transform: scale(1); opacity: 0.8; }
    50% { transform: scale(1.1); opacity: 1; }
  }

  .app-footer .brand { 
    font-weight: 900; 
    font-size: 16px;
    color: #ffffff; 
    text-shadow: 
      0 3px 6px rgba(0,0,0,0.8),
      0 0 15px rgba(255, 68, 68, 0.6),
      0 1px 3px rgba(255, 255, 255, 0.3);
    background: linear-gradient(135deg, 
      #ffffff 0%,
      #ff9999 25%,
      #ff6666 50%,
      #ff4444 75%,
      #ffffff 100%);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    position: relative;
    animation: brandGlow 4s ease-in-out infinite;
  }

  .app-footer .brand::before {
    content: attr(data-text);
    position: absolute;
    top: 0;
    left: 0;
    background: linear-gradient(135deg, #ff4444, #ff6b6b, #ffaaaa);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    filter: blur(2px);
    opacity: 0.5;
    z-index: -1;
  }

  @keyframes brandGlow {
    0%, 100% { 
      filter: brightness(1) contrast(1);
      text-shadow: 
        0 3px 6px rgba(0,0,0,0.8),
        0 0 15px rgba(255, 68, 68, 0.6),
        0 1px 3px rgba(255, 255, 255, 0.3);
    }
    50% { 
      filter: brightness(1.2) contrast(1.1);
      text-shadow: 
        0 3px 6px rgba(0,0,0,0.8),
        0 0 25px rgba(255, 68, 68, 0.8),
        0 1px 3px rgba(255, 255, 255, 0.5);
    }
  }

  .app-footer .footer-links { 
    display: flex; 
    align-items: center; 
    gap: 12px; 
  }

  .app-footer .footer-links a {
    color: #ffffff; 
    text-decoration: none; 
    font-weight: 700; 
    opacity: 0.95;
    padding: 10px 18px;
    border-radius: 12px;
    background: 
      linear-gradient(135deg, 
        rgba(255, 255, 255, 0.15) 0%,
        rgba(255, 68, 68, 0.1) 50%,
        rgba(255, 255, 255, 0.05) 100%
      );
    backdrop-filter: blur(10px) saturate(180%);
    border: 1px solid rgba(255, 68, 68, 0.3);
    box-shadow: 
      0 4px 15px rgba(0, 0, 0, 0.2),
      inset 0 1px 0 rgba(255, 255, 255, 0.2);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    overflow: hidden;
    font-size: 14px;
  }

  .app-footer .footer-links a::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, 
      transparent 0%, 
      rgba(255, 68, 68, 0.4) 50%, 
      transparent 100%);
    transition: left 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  }

  .app-footer .footer-links a::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.3) 0%, transparent 70%);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: all 0.4s ease;
  }

  .app-footer .footer-links a:hover { 
    text-decoration: none;
    opacity: 1; 
    background: 
      linear-gradient(135deg, 
        rgba(255, 68, 68, 0.3) 0%,
        rgba(255, 107, 107, 0.2) 50%,
        rgba(255, 68, 68, 0.1) 100%
      );
    border-color: #ff6b6b;
    transform: translateY(-3px) scale(1.05);
    box-shadow: 
      0 8px 25px rgba(0,0,0,0.3),
      0 0 30px rgba(255, 68, 68, 0.5),
      inset 0 1px 0 rgba(255, 255, 255, 0.3);
    text-shadow: 
      0 0 15px rgba(255, 68, 68, 0.8),
      0 2px 4px rgba(0,0,0,0.8);
  }

  .app-footer .footer-links a:hover::before {
    left: 100%;
  }

  .app-footer .footer-links a:hover::after {
    width: 100px;
    height: 100px;
  }

  .app-footer .footer-links a:active {
    transform: translateY(-1px) scale(0.98);
    transition: all 0.1s ease;
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
    transition: all 0.3s ease;
    font-weight: 600;
    text-shadow: 
      0 2px 4px rgba(0,0,0,0.8),
      0 0 10px rgba(255, 255, 255, 0.1);
  }

  .app-footer span:not(.sep):not(.brand):hover {
    opacity: 1;
    text-shadow: 
      0 2px 4px rgba(0,0,0,0.8),
      0 0 15px rgba(255, 255, 255, 0.4),
      0 0 25px rgba(255, 68, 68, 0.3);
    transform: translateY(-1px);
  }

  /* Floating particles effect */
  .app-footer .particles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    pointer-events: none;
    z-index: -1;
  }

  .app-footer .particle {
    position: absolute;
    background: rgba(255, 68, 68, 0.3);
    border-radius: 50%;
    animation: float 6s ease-in-out infinite;
  }

  .app-footer .particle:nth-child(1) {
    width: 4px;
    height: 4px;
    left: 10%;
    animation-delay: 0s;
    animation-duration: 8s;
  }

  .app-footer .particle:nth-child(2) {
    width: 6px;
    height: 6px;
    left: 30%;
    animation-delay: 2s;
    animation-duration: 10s;
  }

  .app-footer .particle:nth-child(3) {
    width: 3px;
    height: 3px;
    left: 50%;
    animation-delay: 4s;
    animation-duration: 7s;
  }

  .app-footer .particle:nth-child(4) {
    width: 5px;
    height: 5px;
    left: 70%;
    animation-delay: 1s;
    animation-duration: 9s;
  }

  .app-footer .particle:nth-child(5) {
    width: 4px;
    height: 4px;
    left: 90%;
    animation-delay: 3s;
    animation-duration: 8s;
  }

  @keyframes float {
    0%, 100% {
      transform: translateY(100px) rotate(0deg);
      opacity: 0;
    }
    10% {
      opacity: 1;
    }
    90% {
      opacity: 1;
    }
    50% {
      transform: translateY(-20px) rotate(180deg);
      opacity: 1;
    }
  }

  /* Responsif */
  @media (max-width: 768px) {
    .app-footer .footer-inner { 
      font-size: 14px; 
      gap: 10px; 
      padding: 18px 20px;
      flex-direction: column;
      text-align: center;
    }
    
    .app-footer .brand-mark { 
      height: 24px; 
    }
    
    .app-footer .footer-links { 
      gap: 8px; 
      margin-top: 8px;
      flex-wrap: wrap;
      justify-content: center;
    }

    .app-footer .footer-links a {
      padding: 8px 14px;
      font-size: 13px;
    }

    .app-footer .brand {
      font-size: 15px;
    }

    .app-footer .sep {
      font-size: 14px;
      padding: 0 6px;
    }
  }

  @media (max-width: 480px) {
    .app-footer .footer-inner {
      font-size: 13px;
      gap: 8px;
      padding: 16px 18px;
    }

    .app-footer .footer-accent {
      height: 4px;
    }

    .app-footer .brand-mark {
      height: 20px;
    }

    .app-footer .sep {
      padding: 0 4px;
      font-size: 12px;
    }

    .app-footer .footer-links {
      flex-wrap: wrap;
      justify-content: center;
      gap: 6px;
    }

    .app-footer .footer-links a {
      padding: 6px 10px;
      font-size: 12px;
      border-radius: 8px;
    }

    .app-footer .brand {
      font-size: 14px;
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
    <!-- Floating Particles -->
    <div class="particles">
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
    </div>

    <img src="{{ asset('img/icon-logo/tali-rejeki.jpg') }}" alt="Tali Rejeki" class="brand-mark">
    <span>Copyright &copy; 2011 — {{ date('Y') }}</span>
    <span class="sep">•</span>
    <span>All Rights Reserved</span>
    <span class="sep">•</span>
    <span class="brand" data-text="Tali Rejeki">Tali Rejeki</span>
    <span class="sep">•</span>

    <nav class="footer-links" aria-label="Legal">
      <a href="{{ $termsHref }}">📄 Terms of Service</a>
      <span class="sep">/</span>
      <a href="{{ $privacyHref }}">🛡️ Privacy Policy</a>
    </nav>
  </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Enhanced footer interactions
  const footer = document.querySelector('.app-footer');
  const brandMark = document.querySelector('.brand-mark');
  const footerLinks = document.querySelectorAll('.footer-links a');
  const brandText = document.querySelector('.brand');

  // Add click ripple effect to footer links
  footerLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      let ripple = document.createElement('span');
      ripple.classList.add('ripple');
      this.appendChild(ripple);

      let x = e.clientX - e.target.offsetLeft;
      let y = e.clientY - e.target.offsetTop;

      ripple.style.left = `${x}px`;
      ripple.style.top = `${y}px`;
      ripple.style.cssText = `
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.6);
        transform: scale(0);
        animation: ripple-animation 0.6s linear;
        pointer-events: none;
        width: 20px;
        height: 20px;
        margin-left: -10px;
        margin-top: -10px;
      `;

      setTimeout(() => {
        ripple.remove();
      }, 600);
    });
  });

  // Brand mark rotation on hover
  if (brandMark) {
    let rotationAngle = 0;
    brandMark.addEventListener('mouseenter', function() {
      rotationAngle += 360;
      this.style.transform = `scale(1.1) rotate(${rotationAngle}deg)`;
    });

    brandMark.addEventListener('mouseleave', function() {
      this.style.transform = 'scale(1) rotate(0deg)';
    });
  }

  // Interactive cursor effect for footer
  footer.addEventListener('mousemove', function(e) {
    const rect = this.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    
    // Create temporary glow effect
    const glow = document.createElement('div');
    glow.style.cssText = `
      position: absolute;
      pointer-events: none;
      width: 100px;
      height: 100px;
      background: radial-gradient(circle, rgba(255, 68, 68, 0.1) 0%, transparent 70%);
      border-radius: 50%;
      left: ${x - 50}px;
      top: ${y - 50}px;
      z-index: 1;
      animation: glow-fade 1s ease-out forwards;
    `;
    
    this.appendChild(glow);
    
    setTimeout(() => {
      if (glow.parentNode) {
        glow.remove();
      }
    }, 1000);
  });

  // Dynamic particles
  function createDynamicParticle() {
    const particle = document.createElement('div');
    particle.className = 'dynamic-particle';
    particle.style.cssText = `
      position: absolute;
      width: ${Math.random() * 4 + 2}px;
      height: ${Math.random() * 4 + 2}px;
      background: rgba(255, ${Math.random() * 100 + 68}, 68, ${Math.random() * 0.5 + 0.3});
      border-radius: 50%;
      left: ${Math.random() * 100}%;
      bottom: 0;
      pointer-events: none;
      z-index: 0;
      animation: dynamicFloat ${Math.random() * 5 + 3}s linear forwards;
    `;
    
    footer.appendChild(particle);
    
    setTimeout(() => {
      if (particle.parentNode) {
        particle.remove();
      }
    }, 8000);
  }

  // Create particles periodically
  if (window.innerWidth > 768) {
    setInterval(createDynamicParticle, 2000);
  }

  // Parallax effect on scroll
  window.addEventListener('scroll', function() {
    const scrolled = window.pageYOffset;
    const accent = footer.querySelector('.footer-accent');
    if (accent) {
      accent.style.transform = `translateY(${scrolled * 0.1}px)`;
    }
  });
});

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
  @keyframes ripple-animation {
    to {
      transform: scale(4);
      opacity: 0;
    }
  }
  
  @keyframes glow-fade {
    0% {
      opacity: 1;
      transform: scale(0);
    }
    50% {
      opacity: 0.5;
      transform: scale(1);
    }
    100% {
      opacity: 0;
      transform: scale(1.5);
    }
  }
  
  @keyframes dynamicFloat {
    0% {
      transform: translateY(0) rotate(0deg);
      opacity: 1;
    }
    100% {
      transform: translateY(-150px) rotate(360deg);
      opacity: 0;
    }
  }
  
  .app-footer .footer-links a {
    position: relative;
    overflow: hidden;
  }
`;
document.head.appendChild(style);
</script>