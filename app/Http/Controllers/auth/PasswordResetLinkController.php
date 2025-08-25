<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PasswordResetLinkController extends Controller
{
    // Halaman form "lupa password" (isi email)
    public function create()
    {
        return view('auth.forgot-password');
    }

    // Kirim email berisi link set/reset password (pure Spatie)
    public function store(Request $request)
    {
        $request->validate(['email' => ['required', 'email']]);

        if ($user = User::where('email', $request->email)->first()) {
            // Link berlaku 30 menit (silakan sesuaikan)
            $user->sendWelcomeNotification(now()->addMinutes(30));
        }

        // Response generic agar tidak bocorkan apakah email terdaftar
        return back()->with('status', 'Jika email terdaftar, tautan reset telah dikirim.');
    }
}
