@extends('auth.components.layout')

@section('title', 'Buat Password Baru')

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
        --success-color: #22c55e;
        --success-color2: #16a34a;
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
        left: 18%;
        animation-delay: 0s;
        transform: rotate(3deg);
    }

    .light-beam:nth-child(2) {
        left: 50%;
        animation-delay: 4s;
        transform: rotate(-2deg);
    }

    .light-beam:nth-child(3) {
        left: 82%;
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
        width: 6px; height: 6px; top: 22%; left: 12%; animation-delay: 0s; 
    }
    .particle:nth-child(5) { 
        width: 4px; height: 4px; top: 65%; left: 88%; animation-delay: 3s; 
    }
    .particle:nth-child(6) { 
        width: 8px; height: 8px; top: 85%; left: 18%; animation-delay: 6s; 
    }
    .particle:nth-child(7) { 
        width: 5px; height: 5px; top: 35%; left: 85%; animation-delay: 9s; 
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
        justify-content: flex-start;
        padding: 2rem;
        padding-left: 5%;
    }

    .panel-wrapper {
        position: relative;
        width: min(65vw, 320px);
        min-height: clamp(340px, 40vh, 380px);
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
        padding: 1.2rem 1.1rem;
        min-height: clamp(340px, 40vh, 380px);
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
        gap: 0.6rem;
    }

    .badge-pill {
        align-self: center;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 900;
        color: #fff;
        background: linear-gradient(135deg, var(--success-color), var(--success-color2));
        box-shadow: 0 8px 20px rgba(34, 197, 94, .4);
        animation: badgePulse 3s ease-in-out infinite;
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    @keyframes badgePulse {
        0%, 100% {
            transform: scale(1);
            box-shadow: 0 8px 20px rgba(34, 197, 94, .4);
        }
        50% {
            transform: scale(1.05);
            box-shadow: 0 12px 30px rgba(34, 197, 94, .6);
        }
    }

    .title {
        text-align: center;
        color: #8B1538;
        font-weight: 900;
        font-size: clamp(18px, 2.8vw, 22px);
        margin: 0.2rem 0 0.1rem;
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
        margin-bottom: 0.8rem;
        font-weight: 600;
        font-size: 13px;
        opacity: 0.9;
        line-height: 1.2;
    }

    .icon-glow {
        font-size: 2.8rem;
        background: linear-gradient(135deg, var(--success-color), var(--success-color2));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        position: relative;
        z-index: 2;
        filter: drop-shadow(0 0 15px rgba(34, 197, 94, 0.5));
        animation: iconPulse 3s ease-in-out infinite;
        margin-bottom: 0.3rem;
    }

    @keyframes iconPulse {
        0%, 100% {
            transform: scale(1) rotate(0deg);
            filter: drop-shadow(0 0 15px rgba(34, 197, 94, 0.5));
        }
        50% {
            transform: scale(1.1) rotate(5deg);
            filter: drop-shadow(0 0 25px rgba(34, 197, 94, 0.8));
        }
    }

    /* Enhanced Form Styling */
    .form-label {
        color: var(--primary);
        font-weight: 800;
        margin-bottom: 8px;
        font-size: 15px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .input-with-icon {
        position: relative;
        margin-bottom: 0.6rem;
    }

    .input-with-icon i {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--primary);
        font-size: 15px;
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
        border-radius: 12px;
        padding: 12px 16px 12px 40px;
        border: 3px solid rgba(124, 20, 21, 0.2);
        background: rgba(255, 255, 255, 0.95);
        font-size: 14px;
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
        border-top-right-radius: 12px;
        border-bottom-right-radius: 12px;
        color: white;
        cursor: pointer;
        padding: 12px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .input-group-text:hover {
        background: linear-gradient(135deg, var(--primary-2), var(--primary));
        transform: scale(1.05);
    }

    .btn-primary-custom {
        background: linear-gradient(135deg, var(--success-color), var(--success-color2));
        border: none;
        color: white;
        font-weight: 800;
        border-radius: 12px;
        padding: 12px 18px;
        width: 100%;
        font-size: 15px;
        position: relative;
        overflow: hidden;
        box-shadow: 
            0 8px 25px rgba(34, 197, 94, 0.4),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
        transition: all 0.4s ease;
        margin-top: 0.6rem;
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
            0 12px 35px rgba(34, 197, 94, 0.5),
            inset 0 1px 0 rgba(255, 255, 255, 0.4);
        background: linear-gradient(135deg, var(--success-color2), var(--success-color));
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
        font-size: 11px;
        margin-top: 0.6rem;
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
        margin-top: 8px;
        box-shadow: 0 4px 15px rgba(139, 21, 56, 0.2);
        font-weight: 600;
    }

    .password-strength {
        margin-top: 8px;
        font-size: 12px;
        color: #8B1538;
        opacity: 0.8;
    }

    .strength-bar {
        width: 100%;
        height: 4px;
        background: rgba(124, 20, 21, 0.2);
        border-radius: 2px;
        margin-top: 4px;
        overflow: hidden;
    }

    .strength-fill {
        height: 100%;
        border-radius: 2px;
        transition: all 0.3s ease;
        background: linear-gradient(90deg, #ef4444, #f59e0b, #10b981);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .center {
            padding: 0.8rem;
            justify-content: center;
        }
        
        .panel {
            padding: 1.2rem 1rem;
        }
        
        .panel-wrapper {
            width: 80vw;
            min-height: clamp(360px, 42vh, 400px);
        }
    }

    @media (max-width: 480px) {
        .title {
            font-size: 18px;
        }
        
        .icon-glow {
            font-size: 2.4rem;
        }
        
        .panel {
            padding: 1rem 0.8rem;
        }
        
        .panel-wrapper {
            width: 85vw;
            min-height: clamp(340px, 40vh, 380px);
        }
        
        .content-wrap {
            gap: 0.7rem;
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
                    <i class="bi bi-shield-check-fill"></i>
                    BUAT PASSWORD BARU
                </div>
                
                <div class="text-center">
                    <i class="bi bi-key-fill icon-glow"></i>
                    <h1 class="title">
                        <i class="bi bi-stars"></i> Buat Password Baru <i class="bi bi-stars"></i>
                    </h1>
                    <p class="subtitle">Silakan buat password baru yang kuat dan aman untuk akun Anda.</p>
                </div>

                <form method="POST">
                    @csrf
                    <input type="hidden" name="email" value="{{ $user->email }}"/>

                    <!-- Email (Read Only) -->
                    <div class="mb-2">
                        <label for="email" class="form-label">
                            <i class="bi bi-envelope-fill"></i>
                            Email Account
                        </label>
                        <div class="input-with-icon">
                            <i class="bi bi-envelope-fill"></i>
                            <input type="email" 
                                   id="email"
                                   value="{{ $user->email }}" 
                                   class="form-control"
                                   readonly
                                   style="background: rgba(248, 249, 250, 0.8); color: #6c757d;">
                        </div>
                    </div>

                    <!-- Password Baru -->
                    <div class="mb-2">
                        <label for="password" class="form-label">
                            <i class="bi bi-lock-fill"></i>
                            Password Baru
                        </label>
                        <div class="input-group">
                            <input type="password" 
                                   id="password"
                                   name="password" 
                                   class="form-control @error('password') is-invalid @enderror"
                                   placeholder="Minimal 8 karakter"
                                   required 
                                   autocomplete="new-password"
                                   autofocus>
                            <button class="input-group-text" type="button" id="togglePassword" aria-label="Tampilkan/sembunyikan password">
                                <i class="bi bi-eye-slash" id="toggleIcon"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="error-box">
                                <i class="bi bi-exclamation-triangle me-2"></i>
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="password-strength">
                            <div class="strength-bar">
                                <div class="strength-fill" id="strengthFill" style="width: 0%;"></div>
                            </div>
                            <span id="strengthText">Kekuatan password: </span>
                        </div>
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="mb-2">
                        <label for="password-confirm" class="form-label">
                            <i class="bi bi-shield-lock-fill"></i>
                            Konfirmasi Password
                        </label>
                        <div class="input-group">
                            <input type="password" 
                                   id="password-confirm"
                                   name="password_confirmation" 
                                   class="form-control"
                                   placeholder="Ulangi password yang sama"
                                   required 
                                   autocomplete="new-password">
                            <button class="input-group-text" type="button" id="toggleConfirmPassword" aria-label="Tampilkan/sembunyikan konfirmasi password">
                                <i class="bi bi-eye-slash" id="toggleConfirmIcon"></i>
                            </button>
                        </div>
                        <div id="passwordMatch" class="password-strength" style="display: none;">
                            <i class="bi bi-check-circle-fill" style="color: var(--success-color);"></i>
                            Password cocok!
                        </div>
                        <div id="passwordMismatch" class="password-strength" style="display: none; color: #ef4444;">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            Password tidak cocok!
                        </div>
                    </div>

                    <button type="submit" class="btn-primary-custom" id="submitBtn">
                        <i class="bi bi-shield-check-fill me-2"></i>
                        Simpan Password & Login
                    </button>

                    <div class="help-hint">
                        <i class="bi bi-info-circle me-1"></i>
                        Gunakan kombinasi huruf besar, kecil, angka, dan simbol untuk keamanan maksimal
                    </div>
                </form>

                <div class="text-center mt-2">
                    <a href="{{ route('login') }}" class="text-decoration-none" style="color: #8B1538; font-weight: 700; font-size: 13px;">
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
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('password-confirm');
    const strengthFill = document.getElementById('strengthFill');
    const strengthText = document.getElementById('strengthText');
    const submitBtn = document.getElementById('submitBtn');
    const passwordMatch = document.getElementById('passwordMatch');
    const passwordMismatch = document.getElementById('passwordMismatch');

    // Toggle password visibility
    function setupPasswordToggle(inputId, toggleId, iconId) {
        const input = document.getElementById(inputId);
        const toggle = document.getElementById(toggleId);
        const icon = document.getElementById(iconId);
        
        if (toggle && input && icon) {
            toggle.addEventListener('click', () => {
                const isHidden = input.type === 'password';
                input.type = isHidden ? 'text' : 'password';
                icon.className = isHidden ? 'bi bi-eye' : 'bi bi-eye-slash';
            });
        }
    }

    setupPasswordToggle('password', 'togglePassword', 'toggleIcon');
    setupPasswordToggle('password-confirm', 'toggleConfirmPassword', 'toggleConfirmIcon');

    // Password strength checker
    function checkPasswordStrength(password) {
        let score = 0;
        let feedback = '';

        if (password.length >= 8) score += 1;
        if (password.match(/[a-z]/)) score += 1;
        if (password.match(/[A-Z]/)) score += 1;
        if (password.match(/[0-9]/)) score += 1;
        if (password.match(/[^a-zA-Z0-9]/)) score += 1;

        const width = (score / 5) * 100;
        strengthFill.style.width = width + '%';

        switch (score) {
            case 0:
            case 1:
                feedback = 'Sangat Lemah';
                strengthFill.style.background = '#ef4444';
                break;
            case 2:
                feedback = 'Lemah';
                strengthFill.style.background = '#f59e0b';
                break;
            case 3:
                feedback = 'Sedang';
                strengthFill.style.background = '#3b82f6';
                break;
            case 4:
                feedback = 'Kuat';
                strengthFill.style.background = '#10b981';
                break;
            case 5:
                feedback = 'Sangat Kuat';
                strengthFill.style.background = 'linear-gradient(90deg, #10b981, #059669)';
                break;
        }

        strengthText.textContent = 'Kekuatan password: ' + feedback;
        return score >= 3;
    }

    // Check password match
    function checkPasswordMatch() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        if (confirmPassword === '') {
            passwordMatch.style.display = 'none';
            passwordMismatch.style.display = 'none';
            return false;
        }

        if (password === confirmPassword) {
            passwordMatch.style.display = 'block';
            passwordMismatch.style.display = 'none';
            return true;
        } else {
            passwordMatch.style.display = 'none';
            passwordMismatch.style.display = 'block';
            return false;
        }
    }

    // Update submit button state
    function updateSubmitButton() {
        const isPasswordStrong = checkPasswordStrength(passwordInput.value);
        const isPasswordMatch = checkPasswordMatch();
        const canSubmit = isPasswordStrong && isPasswordMatch && passwordInput.value.length >= 8;

        if (canSubmit) {
            submitBtn.disabled = false;
            submitBtn.style.opacity = '1';
            submitBtn.style.transform = 'translateY(0)';
        } else {
            submitBtn.disabled = true;
            submitBtn.style.opacity = '0.7';
            submitBtn.style.transform = 'translateY(2px)';
        }
    }

    // Event listeners
    passwordInput.addEventListener('input', function() {
        checkPasswordStrength(this.value);
        updateSubmitButton();
    });

    confirmPasswordInput.addEventListener('input', function() {
        updateSubmitButton();
    });

    // Form submission enhancement
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Menyimpan...';
        submitBtn.disabled = true;
    });

    // Enhanced form interactions
    const inputs = document.querySelectorAll('.form-control');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.style.transform = 'scale(1.02)';
            this.parentElement.style.transition = 'transform 0.3s ease';
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.style.transform = 'scale(1)';
        });
    });

    // Initialize
    updateSubmitButton();
});
</script>
@endpush
