<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PasswordResetLinkController extends Controller
{
    public function create()
    {
        return view('auth.forgot-password');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ], [
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.exists' => 'Email tidak terdaftar dalam sistem kami.'
        ]);

        try {
            $user = User::where('email', $request->email)->first();

            // Generate token dan simpan ke database
            $token = Str::random(64);
            DB::table('password_reset_tokens')->updateOrInsert(
                ['email' => $request->email],
                [
                    'email' => $request->email,
                    'token' => $token,
                    'created_at' => now()
                ]
            );

            // Kirim notifikasi
            $user->sendWelcomeNotification(now()->addMinutes(30));

            Log::info('Password reset link sent to: ' . $request->email);

            return back()->with('status', 'Link reset password telah dikirim ke email Anda.');
        } catch (\Exception $e) {
            Log::error('Failed to send password reset email: ' . $e->getMessage());

            return back()
                ->withInput()
                ->withErrors(['email' => 'Terjadi kesalahan saat mengirim email. Silakan coba lagi nanti.']);
        }
    }
}
