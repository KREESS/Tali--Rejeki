@extends('auth.components.layout')

@push('styles')
<style>
    :root {
        --primary: #7c1415;
        --primary-2: #b71c1c;
        --panel-bg: rgba(255,255,255,.90);
        --panel-stroke: rgba(124,20,21,.22);
        --radius: 22px;
        --neon-glow: #ff1a1a;
        --aurora-color1: rgba(124, 20, 21, 0.3);
        --aurora-color2: rgba(183, 28, 28, 0.3);
        --glow-color: rgba(255, 255, 255, 0.9);
    }

    /* Enhanced Aesthetic Light Effects */
    .aesthetic-lights {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 0;
        overflow: hidden;
    }

    .light-beam {
        position: absolute;
        width: 4px;
        height: 120vh;
        background: linear-gradient(to bottom, 
            transparent 0%,
            rgba(255, 255, 255, 0.8) 20%,
            rgba(255, 26, 26, 0.9) 50%,
            rgba(255, 255, 255, 0.8) 80%,
            transparent 100%);
        animation: lightBeam 12s ease-in-out infinite;
        opacity: 0;
        transform-origin: top;
        filter: blur(2px);
        border-radius: 2px;
    }

    .light-beam:nth-child(1) {
        left: 20%;
        animation-delay: 0s;
        transform: rotate(3deg);
    }

    .light-beam:nth-child(2) {
        left: 50%;
        animation-delay: 4s;
        transform: rotate(-2deg);
    }

    .light-beam:nth-child(3) {
        left: 80%;
        animation-delay: 8s;
        transform: rotate(1deg);
    }

    .aurora {
        position: absolute;
        top: 0;
        left: 0;
        width: 120%;
        height: 120%;
        background: linear-gradient(
            125deg,
            var(--aurora-color1) 0%,
            transparent 25%,
            var(--aurora-color2) 50%,
            transparent 75%,
            var(--aurora-color1) 100%
        );
        animation: auroraFlow 25s ease-in-out infinite;
        opacity: 0.7;
        transform: rotate(-10deg);
    }

    .neon-circles {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 200vw;
        height: 200vh;
        transform: translate(-50%, -50%);
        background: radial-gradient(
            circle at center,
            transparent 0%,
            rgba(255, 255, 255, 0.1) 20%,
            var(--aurora-color1) 60%,
            transparent 80%
        );
        animation: pulseCircles 18s ease-in-out infinite;
    }

    /* Floating particles */
    .particle {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.9);
        animation: float 10s ease-in-out infinite;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
    }

    .particle:nth-child(4) { 
        width: 6px; height: 6px; top: 25%; left: 15%; animation-delay: 0s; 
    }
    .particle:nth-child(5) { 
        width: 4px; height: 4px; top: 65%; left: 85%; animation-delay: 3s; 
    }
    .particle:nth-child(6) { 
        width: 8px; height: 8px; top: 85%; left: 25%; animation-delay: 6s; 
    }
    .particle:nth-child(7) { 
        width: 5px; height: 5px; top: 35%; left: 75%; animation-delay: 9s; 
    }

    @keyframes lightBeam {
        0% {
            opacity: 0;
            transform: scaleY(0) translateY(-100%) rotate(3deg);
        }
        20% {
            opacity: 0.8;
            transform: scaleY(1) translateY(0) rotate(3deg);
        }
        40% {
            opacity: 0.5;
            transform: scaleY(1) translateY(0) rotate(2deg);
        }
        60% {
            opacity: 0.7;
            transform: scaleY(1) translateY(0) rotate(-1deg);
        }
        80% {
            opacity: 0.4;
            transform: scaleY(1) translateY(0) rotate(3deg);
        }
        100% {
            opacity: 0;
            transform: scaleY(0) translateY(100%) rotate(3deg);
        }
    }

    @keyframes auroraFlow {
        0%, 100% {
            transform: translateX(-20%) rotate(-10deg) scale(1);
            opacity: 0.7;
        }
        25% {
            transform: translateX(5%) rotate(-5deg) scale(1.1);
            opacity: 0.9;
        }
        50% {
            transform: translateX(15%) rotate(0deg) scale(0.9);
            opacity: 0.8;
        }
        75% {
            transform: translateX(-5%) rotate(-7deg) scale(1.05);
            opacity: 0.85;
        }
    }

    @keyframes pulseCircles {
        0%, 100% {
            transform: translate(-50%, -50%) scale(1) rotate(0deg);
            opacity: 0.4;
        }
        50% {
            transform: translate(-50%, -50%) scale(1.3) rotate(180deg);
            opacity: 0.2;
        }
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0px) translateX(0px) scale(1);
            opacity: 0.8;
        }
        25% {
            transform: translateY(-30px) translateX(15px) scale(1.2);
            opacity: 1;
        }
        50% {
            transform: translateY(-60px) translateX(-10px) scale(0.8);
            opacity: 0.9;
        }
        75% {
            transform: translateY(-30px) translateX(-20px) scale(1.1);
            opacity: 0.95;
        }
    }

    /* Enhanced Panel Design */
    .center {
        position: relative;
        z-index: 1;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem 2rem;
    }

    .panel {
        position: relative;
        background: var(--panel-bg);
        backdrop-filter: blur(25px);
        border: 4px solid rgba(255, 255, 255, 0.95);
        border-radius: var(--radius);
        padding: 1.8rem 2.5rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        box-shadow: 
            0 0 80px rgba(255, 255, 255, 0.9),
            0 0 120px rgba(255, 255, 255, 0.7),
            0 0 200px rgba(255, 255, 255, 0.5),
            inset 0 2px 0 rgba(255, 255, 255, 0.9),
            inset 0 -2px 0 rgba(255, 255, 255, 0.4);
        animation: panelFloat 8s ease-in-out infinite;
        overflow: hidden;
        transform-style: preserve-3d;
        transition: transform 0.3s ease;
    }

    .panel::before {
        content: '';
        position: absolute;
        top: -4px;
        left: -4px;
        right: -4px;
        bottom: -4px;
        background: linear-gradient(
            45deg,
            rgba(255, 255, 255, 0.9) 0%,
            rgba(124, 20, 21, 0.8) 25%,
            rgba(255, 255, 255, 1) 50%,
            rgba(183, 28, 28, 0.8) 75%,
            rgba(255, 255, 255, 0.9) 100%
        );
        border-radius: calc(var(--radius) + 4px);
        z-index: -1;
        animation: borderRotate 12s linear infinite;
    }

    .panel::after {
        content: '';
        position: absolute;
        top: 0;
        left: -150%;
        width: 150%;
        height: 100%;
        background: linear-gradient(
            90deg,
            transparent 0%,
            rgba(255, 255, 255, 0.6) 50%,
            transparent 100%
        );
        animation: shimmer 4s ease-in-out infinite;
        transform: skewX(-15deg);
    }

    @keyframes panelFloat {
        0%, 100% {
            transform: translateY(0px) rotateX(0deg) rotateY(0deg);
        }
        25% {
            transform: translateY(-12px) rotateX(2deg) rotateY(-1deg);
        }
        50% {
            transform: translateY(-18px) rotateX(0deg) rotateY(0deg);
        }
        75% {
            transform: translateY(-12px) rotateX(-2deg) rotateY(1deg);
        }
    }

    @keyframes borderRotate {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes shimmer {
        0% {
            left: -150%;
            opacity: 0;
        }
        50% {
            left: 150%;
            opacity: 1;
        }
        100% {
            left: 150%;
            opacity: 0;
        }
    }

    /* Enhanced Content Styling */
    .content-wrap {
        position: relative;
        z-index: 2;
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 1.2rem;
    }

    .btn-back {
        position: absolute;
        top: 20px;
        left: 20px;
        background: linear-gradient(135deg, var(--primary), var(--primary-2));
        border: none;
        color: white;
        padding: 8px 16px;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        z-index: 3;
        box-shadow: 0 4px 15px rgba(124, 20, 21, 0.3);
    }

    .btn-back:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(124, 20, 21, 0.4);
    }

    .badge-pill {
        align-self: center;
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 12px 24px;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 900;
        color: #fff;
        background: linear-gradient(135deg, var(--primary), var(--primary-2));
        box-shadow: 0 8px 20px rgba(124,20,21,.4);
        animation: badgePulse 3s ease-in-out infinite;
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    @keyframes badgePulse {
        0%, 100% {
            transform: scale(1);
            box-shadow: 0 8px 20px rgba(124,20,21,.4);
        }
        50% {
            transform: scale(1.05);
            box-shadow: 0 12px 30px rgba(124,20,21,.6);
        }
    }

    .title {
        text-align: center;
        color: #8B1538;
        font-weight: 900;
        font-size: clamp(26px, 4vw, 34px);
        margin: 0.5rem 0 0.3rem;
        background: linear-gradient(135deg, #8B1538 0%, #B91C3C 30%, #DC2626 50%, #8B1538 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-shadow: 
            0 0 20px rgba(139, 21, 56, 0.6),
            0 0 40px rgba(139, 21, 56, 0.4),
            0 0 60px rgba(139, 21, 56, 0.2);
        animation: titleGlow 3s ease-in-out infinite;
        position: relative;
        z-index: 2;
        filter: drop-shadow(0 2px 8px rgba(139, 21, 56, 0.3));
    }

    @keyframes titleGlow {
        0%, 100% {
            text-shadow: 
                0 0 20px rgba(139, 21, 56, 0.6),
                0 0 40px rgba(139, 21, 56, 0.4),
                0 0 60px rgba(139, 21, 56, 0.2);
            filter: drop-shadow(0 2px 8px rgba(139, 21, 56, 0.3)) brightness(1);
        }
        50% {
            text-shadow: 
                0 0 30px rgba(139, 21, 56, 0.8),
                0 0 60px rgba(139, 21, 56, 0.6),
                0 0 90px rgba(139, 21, 56, 0.4);
            filter: drop-shadow(0 4px 12px rgba(139, 21, 56, 0.5)) brightness(1.2);
        }
    }

    .subtitle {
        color: #8B1538;
        text-align: center;
        margin-bottom: 1rem;
        font-weight: 600;
        font-size: 16px;
        opacity: 0.9;
    }

    .icon-glow {
        font-size: 3.5rem;
        background: linear-gradient(135deg, var(--primary), var(--primary-2));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        position: relative;
        z-index: 2;
        filter: drop-shadow(0 0 15px rgba(183, 28, 28, 0.5));
        animation: iconPulse 3s ease-in-out infinite;
        margin-bottom: 0.5rem;
        display: block;
    }

    @keyframes iconPulse {
        0%, 100% {
            transform: scale(1) rotate(0deg);
            filter: drop-shadow(0 0 15px rgba(183, 28, 28, 0.5));
        }
        50% {
            transform: scale(1.1) rotate(5deg);
            filter: drop-shadow(0 0 25px rgba(183, 28, 28, 0.8));
        }
    }

    /* Enhanced Form Styling */
    .form-label {
        color: var(--primary);
        font-weight: 800;
        margin-bottom: 8px;
        font-size: 15px;
    }

    .input-with-icon {
        position: relative;
        margin-bottom: 1rem;
    }

    .input-with-icon i {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--primary);
        font-size: 18px;
        z-index: 2;
        animation: iconFloat 3s ease-in-out infinite;
    }

    @keyframes iconFloat {
        0%, 100% {
            transform: translateY(-50%) scale(1);
        }
        50% {
            transform: translateY(-50%) scale(1.1);
        }
    }

    .form-control {
        border-radius: 16px;
        padding: 16px 20px 16px 50px;
        border: 3px solid rgba(124, 20, 21, 0.2);
        background: rgba(255, 255, 255, 0.95);
        font-size: 16px;
        transition: all 0.4s ease;
        box-shadow: 
            inset 0 2px 8px rgba(0,0,0,0.05),
            0 4px 12px rgba(124, 20, 21, 0.1);
        width: 100%;
    }

    .form-control:focus {
        border-color: var(--primary);
        background: rgba(255, 255, 255, 1);
        box-shadow: 
            0 0 0 4px rgba(124, 20, 21, 0.15),
            inset 0 2px 8px rgba(0,0,0,0.05),
            0 8px 25px rgba(124, 20, 21, 0.2);
        transform: translateY(-2px) scale(1.02);
        outline: none;
    }

    .input-group {
        position: relative;
        display: flex;
        align-items: stretch;
        width: 100%;
    }

    .input-group .form-control {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        padding-right: 16px;
        padding-left: 16px;
    }

    .input-group-text {
        background: linear-gradient(135deg, var(--primary), var(--primary-2));
        border: 3px solid rgba(124, 20, 21, 0.2);
        border-left: none;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        border-top-right-radius: 16px;
        border-bottom-right-radius: 16px;
        color: white;
        cursor: pointer;
        padding: 16px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .input-group-text:hover {
        background: linear-gradient(135deg, var(--primary-2), var(--primary));
        transform: scale(1.05);
    }

    .actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 0.8rem 0;
        font-size: 14px;
    }

    .form-check {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-check-input {
        width: 18px;
        height: 18px;
        border: 2px solid var(--primary);
        border-radius: 4px;
        background: white;
        cursor: pointer;
        margin: 0;
    }

    .form-check-input:checked {
        background: var(--primary);
        border-color: var(--primary);
    }

    .form-check-label {
        color: var(--primary);
        font-weight: 600;
        cursor: pointer;
        margin: 0;
    }

    .actions a {
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .actions a:hover {
        color: var(--primary-2);
        text-shadow: 0 0 8px rgba(124, 20, 21, 0.3);
    }

    .btn-primary-custom {
        background: linear-gradient(135deg, var(--primary), var(--primary-2));
        border: none;
        color: white;
        font-weight: 800;
        border-radius: 16px;
        padding: 16px 24px;
        width: 100%;
        font-size: 18px;
        position: relative;
        overflow: hidden;
        box-shadow: 
            0 8px 25px rgba(124, 20, 21, 0.4),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
        transition: all 0.4s ease;
        margin-top: 0.8rem;
        cursor: pointer;
    }

    .btn-primary-custom::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
        transition: left 0.6s ease;
    }

    .btn-primary-custom:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: 
            0 12px 35px rgba(124, 20, 21, 0.5),
            inset 0 1px 0 rgba(255, 255, 255, 0.4);
        background: linear-gradient(135deg, var(--primary-2), var(--primary));
    }

    .btn-primary-custom:hover::before {
        left: 100%;
    }

    .btn-primary-custom:active {
        transform: translateY(-1px) scale(0.98);
    }

    .help-hint {
        text-align: center;
        color: #8B1538;
        font-size: 13px;
        margin-top: 0.8rem;
        opacity: 0.8;
        animation: fadeIn 2s ease-in-out;
        font-weight: 500;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 0.8; transform: translateY(0); }
    }

    .error-box {
        background: linear-gradient(135deg, #FFFFFF, #F8F9FA);
        border: 2px solid rgba(139, 21, 56, 0.5);
        color: #8B1538;
        padding: 12px 16px;
        border-radius: 12px;
        margin-bottom: 0.8rem;
        box-shadow: 0 4px 15px rgba(139, 21, 56, 0.2);
        font-weight: 600;
    }

    .error-box ul {
        margin: 0;
        padding-left: 1rem;
        font-size: 14px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .center {
            padding: 0.8rem;
        }
        
        .panel {
            padding: 1.5rem 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .title {
            font-size: 22px;
        }
        
        .icon-glow {
            font-size: 3rem;
        }
        
        .panel {
            padding: 1.2rem 1rem;
        }
        
        .content-wrap {
            gap: 1rem;
        }

        .btn-back {
            top: 15px;
            left: 15px;
            padding: 6px 12px;
            font-size: 12px;
        }
    }
</style>
@endpush

@section('content')
<!-- Enhanced Aesthetic Light Effects -->
<div class="aesthetic-lights">
    <div class="light-beam"></div>
    <div class="light-beam"></div>
    <div class="light-beam"></div>
    <div class="aurora"></div>
    <div class="neon-circles"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
</div>

  <!-- Kontainer kiri -->
  <div class="center">
    <div class="panel" id="panel">
      <!-- Tombol kembali -->
      <button type="button" class="btn-back" id="btnBack" aria-label="Kembali">
        <i class="bi bi-arrow-left"></i> Kembali
      </button>

      <div class="content-wrap">
        <div class="badge-pill">
          <i class="bi bi-shield-lock-fill"></i> 
          AREA AMAN
        </div>
        
        <div class="text-center">
          <i class="bi bi-person-check-fill icon-glow"></i>
          <h1 class="title">
            <i class="bi bi-stars"></i> Login Admin <i class="bi bi-stars"></i>
          </h1>
          <p class="subtitle">Masuk untuk mengakses dashboard Admin.</p>
        </div>

        @if ($errors->any())
          <div class="error-box">
            <ul class="mb-0">
              @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}">
          @csrf

          <!-- Email -->
          <div class="mb-2">
            <label for="email" class="form-label">Email</label>
            <div class="input-with-icon">
              <i class="bi bi-envelope-fill"></i>
              <input type="email" id="email" name="email" class="form-control"
                     value="{{ old('email') }}" placeholder="nama@domain.com" required autofocus>
            </div>
          </div>

          <!-- Password + toggle -->
          <div class="mb-1">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
              <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required aria-describedby="togglePassword">
              <button class="input-group-text" type="button" id="togglePassword" aria-label="Tampilkan/sembunyikan password">
                <i class="bi bi-eye-slash" id="toggleIcon"></i>
              </button>
            </div>
          </div>

          <!-- Remember + Lupa password -->
          <div class="actions">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="remember" name="remember">
              <label class="form-check-label" for="remember">Ingat saya</label>
            </div>
            <a href="{{ route('password.request') }}">Lupa password?</a>
          </div>

          <button type="submit" class="btn-primary-custom mt-2">
            <i class="bi bi-box-arrow-in-right me-2"></i>
            Masuk
          </button>

          <div class="help-hint">Gunakan password yang kuat. Hindari akses dari perangkat umum.</div>

        </form>
      </div>
    </div>
  </div>

  <script>
    // Toggle show/hide password
    (function(){
      const input = document.getElementById('password');
      const btn   = document.getElementById('togglePassword');
      const icon  = document.getElementById('toggleIcon');
      if(btn && input && icon){
        btn.addEventListener('click', () => {
          const isHidden = input.type === 'password';
          input.type = isHidden ? 'text' : 'password';
          icon.className = isHidden ? 'bi bi-eye' : 'bi bi-eye-slash';
        });
      }
    })();

    // Micro tilt mengikuti kursor (subtle)
    (function(){
      const card = document.getElementById('panel');
      if(!card) return;
      let rect;
      const strength = 10; // derajat maksimum kecil saja
      function updateRect(){ rect = card.getBoundingClientRect(); }
      window.addEventListener('resize', updateRect); updateRect();

      card.addEventListener('mousemove', (e) => {
        const x = (e.clientX - rect.left) / rect.width - 0.5;
        const y = (e.clientY - rect.top)  / rect.height - 0.5;
        card.style.transform = `translateY(-2px) rotateX(${(-y*strength)}deg) rotateY(${(x*strength)}deg)`;
      });
      card.addEventListener('mouseleave', () => {
        card.style.transform = '';
      });
    })();

    // Tombol Kembali: history back, fallback ke beranda
    (function(){
      const backBtn = document.getElementById('btnBack');
      if(!backBtn) return;
      backBtn.addEventListener('click', () => {
        if (window.history.length > 1) {
          window.history.back();
        } else {
          window.location.href = "{{ url('/') }}";
        }
      });
    })();
  </script>
@endsection

