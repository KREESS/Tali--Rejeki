@extends('auth.components.layout')

@section('title', 'Reset Password')

@push('styles')
<style>
    :root {
        --primary: #7c1415;
        --primary-2: #b71c1c;
        --panel-bg: rgba(255,255,255,.75);
        --panel-stroke: rgba(124,20,21,.22);
        --radius: 22px;
    }

    .panel {
        background: var(--panel-bg);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.8);
        border-radius: var(--radius);
        padding: 2rem;
        box-shadow: 
            0 0 60px rgba(255, 255, 255, 1),
            0 0 100px rgba(255, 255, 255, 0.8),
            0 0 200px rgba(255, 255, 255, 0.6),
            0 0 300px rgba(255, 255, 255, 0.4);
        animation: panelGlow 3s ease-in-out infinite;
    }

    @keyframes panelGlow {
        0%, 100% {
            box-shadow: 
                0 0 60px rgba(255, 255, 255, 1),
                0 0 100px rgba(255, 255, 255, 0.8),
                0 0 200px rgba(255, 255, 255, 0.6),
                0 0 300px rgba(255, 255, 255, 0.4);
        }
        50% {
            box-shadow: 
                0 0 100px rgba(255, 255, 255, 1),
                0 0 200px rgba(255, 255, 255, 0.8),
                0 0 300px rgba(255, 255, 255, 0.6),
                0 0 400px rgba(255, 255, 255, 0.4);
        }
    }

    .title {
        color: var(--primary);
        font-weight: 900;
        font-size: 1.75rem;
        text-align: center;
        margin-bottom: 0.5rem;
    }

    .subtitle {
        color: #666;
        text-align: center;
        margin-bottom: 2rem;
    }

    .form-control {
        border-radius: 12px;
        padding: 0.75rem 1rem;
        border: 2px solid #e9ecef;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 0.2rem rgba(124, 20, 21, 0.15);
        transform: translateY(-2px);
    }

    .btn-reset {
        background: linear-gradient(135deg, var(--primary), var(--primary-2));
        border: none;
        color: white;
        font-weight: bold;
        padding: 0.75rem 2rem;
        border-radius: 12px;
        width: 100%;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(124, 20, 21, 0.2);
    }

    .btn-reset:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(124, 20, 21, 0.3);
    }

    .back-link {
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .back-link:hover {
        color: var(--primary-2);
    }

    .error-message {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
</style>
@endpush

@section('content')
<div class="center">
    <div class="panel-wrapper">
        <div class="panel">
            <h1 class="title">Reset Password</h1>
            <p class="subtitle">Silakan buat password baru untuk akun Anda</p>

            <form method="POST" action="{{ route('welcome.store') }}" class="reset-form">
                @csrf
                
                <input type="hidden" name="expires" value="{{ request()->query('expires') }}">
                <input type="hidden" name="signature" value="{{ request()->query('signature') }}">

                <div class="mb-4">
                    <label class="form-label">Email</label>
                    <div class="input-with-icon">
                        <i class="bi bi-envelope-fill"></i>
                        <input type="email" 
                               name="email" 
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ request()->query('email') }}" 
                               readonly>
                    </div>
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label">Password Baru</label>
                    <div class="input-with-icon">
                        <i class="bi bi-lock-fill"></i>
                        <input type="password" 
                               name="password" 
                               class="form-control @error('password') is-invalid @enderror"
                               required 
                               autocomplete="new-password"
                               placeholder="Minimal 8 karakter">
                    </div>
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label">Konfirmasi Password</label>
                    <div class="input-with-icon">
                        <i class="bi bi-shield-lock-fill"></i>
                        <input type="password" 
                               name="password_confirmation" 
                               class="form-control"
                               required 
                               autocomplete="new-password"
                               placeholder="Masukkan ulang password">
                    </div>
                </div>

                <button type="submit" class="btn-reset">
                    <i class="bi bi-key-fill me-2"></i>
                    Set Password Baru
                </button>

                <div class="text-center mt-4">
                    <a href="{{ route('login') }}" class="back-link">
                        <i class="bi bi-arrow-left me-2"></i>
                        Kembali ke login
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
