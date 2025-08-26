@extends('auth.components.layout')

@section('title', 'Lupa Password')

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
        left: 15%;
        animation-delay: 0s;
        transform: rotate(2deg);
    }

    .light-beam:nth-child(2) {
        left: 45%;
        animation-delay: 4s;
        transform: rotate(-1deg);
    }

    .light-beam:nth-child(3) {
        left: 75%;
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
        width: 6px; height: 6px; top: 20%; left: 10%; animation-delay: 0s; 
    }
    .particle:nth-child(5) { 
        width: 4px; height: 4px; top: 60%; left: 90%; animation-delay: 3s; 
    }
    .particle:nth-child(6) { 
        width: 8px; height: 8px; top: 80%; left: 20%; animation-delay: 6s; 
    }
    .particle:nth-child(7) { 
        width: 5px; height: 5px; top: 30%; left: 80%; animation-delay: 9s; 
    }

    @keyframes lightBeam {
        0% {
            opacity: 0;
            transform: scaleY(0) translateY(-100%) rotate(2deg);
        }
        20% {
            opacity: 0.8;
            transform: scaleY(1) translateY(0) rotate(2deg);
        }
        40% {
            opacity: 0.5;
            transform: scaleY(1) translateY(0) rotate(1deg);
        }
        60% {
            opacity: 0.7;
            transform: scaleY(1) translateY(0) rotate(-1deg);
        }
        80% {
            opacity: 0.4;
            transform: scaleY(1) translateY(0) rotate(2deg);
        }
        100% {
            opacity: 0;
            transform: scaleY(0) translateY(100%) rotate(2deg);
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
        justify-content: flex-start;
        padding: 2rem;
        padding-left: 5%;
    }

    .panel-wrapper {
        position: relative;
        width: min(85vw, 420px);
        min-height: clamp(440px, 55vh, 480px);
    }

    .glow-container {
        position: absolute;
        inset: -100px;
        z-index: -1;
        background: var(--glow-color);
        border-radius: calc(var(--radius) + 30px);
        filter: blur(60px);
        animation: containerGlow 5s ease-in-out infinite;
        opacity: 0.8;
    }

    .panel {
        position: relative;
        background: var(--panel-bg);
        backdrop-filter: blur(25px);
        border: 4px solid rgba(255, 255, 255, 0.95);
        border-radius: var(--radius);
        padding: 2rem 2rem;
        min-height: clamp(440px, 55vh, 480px);
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

    @keyframes containerGlow {
        0%, 100% {
            opacity: 0.8;
            transform: scale(1) rotate(0deg);
            filter: blur(60px);
        }
        50% {
            opacity: 1;
            transform: scale(1.05) rotate(1deg);
            filter: blur(80px);
        }
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
        font-size: clamp(28px, 4vw, 40px);
        margin: 1rem 0 0.5rem;
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
        margin-bottom: 1.5rem;
        font-weight: 600;
        font-size: 16px;
        opacity: 0.9;
    }

    .icon-glow {
        font-size: 4rem;
        background: linear-gradient(135deg, var(--primary), var(--primary-2));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        position: relative;
        z-index: 2;
        filter: drop-shadow(0 0 15px rgba(183, 28, 28, 0.5));
        animation: iconPulse 3s ease-in-out infinite;
        margin-bottom: 1rem;
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
        margin-top: 1rem;
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
        margin-top: 1rem;
        opacity: 0.8;
        animation: fadeIn 2s ease-in-out;
        font-weight: 500;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 0.8; transform: translateY(0); }
    }

    .alert-custom {
        padding: 16px 20px;
        border-radius: 16px;
        margin: 20px 0;
        animation: alertSlide 0.6s ease forwards;
        border: 2px solid rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(10px);
    }

    .alert-custom.success {
        background: linear-gradient(135deg, #8B1538, #B91C3C);
        color: #FFFFFF;
        box-shadow: 0 8px 25px rgba(139, 21, 56, 0.4);
        border: 2px solid rgba(139, 21, 56, 0.3);
        font-weight: 600;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    }

    @keyframes alertSlide {
        from {
            transform: translateY(-30px) scale(0.9);
            opacity: 0;
        }
        to {
            transform: translateY(0) scale(1);
            opacity: 1;
        }
    }

    .error-box {
        background: linear-gradient(135deg, #FFFFFF, #F8F9FA);
        border: 2px solid rgba(139, 21, 56, 0.5);
        color: #8B1538;
        padding: 12px 16px;
        border-radius: 12px;
        margin-top: 8px;
        box-shadow: 0 4px 15px rgba(139, 21, 56, 0.2);
        font-weight: 600;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .center {
            padding: 1rem;
            justify-content: center;
        }
        
        .panel {
            padding: 1.5rem 1.5rem;
        }
        
        .panel-wrapper {
            width: 90vw;
            min-height: clamp(400px, 50vh, 440px);
        }
    }

    @media (max-width: 480px) {
        .title {
            font-size: 24px;
        }
        
        .icon-glow {
            font-size: 3rem;
        }
        
        .panel {
            padding: 1.2rem 1rem;
        }
        
        .panel-wrapper {
            width: 95vw;
            min-height: clamp(380px, 45vh, 420px);
        }
        
        .content-wrap {
            gap: 1rem;
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

<div class="center">
    <div class="panel-wrapper">
        <div class="glow-container"></div>
        <div class="panel" id="panel">
            <div class="content-wrap">
                <div class="badge-pill">
                    <i class="bi bi-envelope-check-fill"></i>
                    RESET PASSWORD
                </div>
                
                <div class="text-center">
                    <i class="bi bi-key-fill icon-glow"></i>
                    <h1 class="title">Lupa Password?</h1>
                    <p class="subtitle">Jangan khawatir! Kami akan mengirim tautan reset password ke email Anda.</p>
                </div>

                @if (session('status'))
                    <div class="alert-custom success">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">
                            <i class="bi bi-envelope me-2"></i>
                            Alamat Email
                        </label>
                        <div class="input-with-icon">
                            <i class="bi bi-envelope-fill"></i>
                            <input type="email" 
                                   id="email"
                                   name="email" 
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" 
                                   placeholder="Masukkan alamat email Anda" 
                                   required 
                                   autofocus>
                        </div>
                        @error('email')
                            <div class="error-box">
                                <i class="bi bi-exclamation-triangle me-2"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn-primary-custom">
                        <i class="bi bi-lightning-charge-fill me-2"></i>
                        Kirim Link Reset Password
                    </button>

                    <div class="help-hint">
                        <i class="bi bi-info-circle me-1"></i>
                        Link reset akan dikirim ke email Anda dan berlaku selama 30 menit
                    </div>
                </form>

                <div class="text-center mt-4">
                    <a href="{{ route('login') }}" class="text-decoration-none" style="color: #8B1538; font-weight: 700; font-size: 15px;">
                        <i class="bi bi-arrow-left me-2"></i>
                        Kembali ke halaman login
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto hide status alerts
    const statusAlert = document.querySelector('.alert-custom');
    if (statusAlert) {
        setTimeout(() => {
            statusAlert.style.opacity = '0';
            statusAlert.style.transform = 'translateY(-20px) scale(0.9)';
            statusAlert.style.transition = 'all 0.5s ease';
            setTimeout(() => {
                statusAlert.remove();
            }, 500);
        }, 5000);
    }

    // Enhanced form interactions
    const emailInput = document.getElementById('email');
    const form = emailInput.closest('form');
    
    emailInput.addEventListener('focus', function() {
        this.parentElement.style.transform = 'scale(1.02)';
        this.parentElement.style.transition = 'transform 0.3s ease';
    });
    
    emailInput.addEventListener('blur', function() {
        this.parentElement.style.transform = 'scale(1)';
    });

    // Form submission enhancement
    form.addEventListener('submit', function(e) {
        const button = form.querySelector('button[type="submit"]');
        button.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Mengirim...';
        button.disabled = true;
        
        // Re-enable button after 3 seconds to prevent user confusion
        setTimeout(() => {
            button.innerHTML = '<i class="bi bi-lightning-charge-fill me-2"></i>Kirim Link Reset Password';
            button.disabled = false;
        }, 3000);
    });
});
</script>
@endpush
