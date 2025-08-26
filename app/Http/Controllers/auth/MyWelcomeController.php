<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Spatie\WelcomeNotification\WelcomeController as BaseWelcomeController;
use Symfony\Component\HttpFoundation\Response;

class MyWelcomeController extends BaseWelcomeController
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ];
    }

    public function sendPasswordSavedResponse(): Response
    {
        return redirect()->route('login')
            ->with('status', 'Password berhasil direset. Silakan login dengan password baru Anda.');
    }

    protected function validateRequest(Request $request)
    {
        $request->validate($this->rules());
    }
}
