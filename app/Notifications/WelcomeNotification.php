<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
use Spatie\WelcomeNotification\WelcomeNotification as BaseNotification;

class WelcomeNotification extends BaseNotification
{
    use Queueable;

    protected function buildWelcomeNotificationMessage(): MailMessage
    {
        return (new MailMessage)
            ->subject(Lang::get('Reset Password - Tali Rejeki'))
            ->greeting(Lang::get('Halo!'))
            ->line(Lang::get('Anda menerima email ini karena kami mendapat permintaan reset password untuk akun Anda.'))
            ->line(Lang::get('Silakan klik tombol di bawah ini untuk melakukan reset password:'))
            ->action(Lang::get('Reset Password'), $this->showWelcomeFormUrl)
            ->line(Lang::get('Link reset password ini akan kadaluarsa dalam 30 menit.'))
            ->line(Lang::get('Jika Anda tidak meminta reset password, abaikan email ini.'))
            ->salutation(Lang::get('Salam,') . ' ' . config('app.name'));
    }
}
