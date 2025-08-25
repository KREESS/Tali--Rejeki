<?php

namespace App\Http\Controllers\Auth;

use Spatie\WelcomeNotification\WelcomeController as BaseWelcomeController;
use Symfony\Component\HttpFoundation\Response;

class MyWelcomeController extends BaseWelcomeController
{
    // Setelah user mengatur password dari link email
    public function sendPasswordSavedResponse(): Response
    {
        return redirect()->route('login')->with('status', 'Password disimpan. Silakan login.');
    }
}
