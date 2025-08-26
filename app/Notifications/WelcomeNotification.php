<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
use Spatie\WelcomeNotification\WelcomeNotification as BaseNotification;

class WelcomeNotification extends BaseNotification
{
    use Queueable;

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    protected function buildWelcomeNotificationMessage(): MailMessage
    {
        return (new MailMessage)
            ->subject('Reset Password - Tali Rejeki')
            ->from(config('mail.from.address', 'noreply@talirejeki.com'), config('mail.from.name', 'Tali Rejeki'))
            ->greeting('Halo!')
            ->line('Anda menerima email ini karena kami mendapat permintaan reset password untuk akun Anda.')
            ->line('Silakan klik tombol di bawah ini untuk melakukan reset password:')
            ->action('Reset Password', $this->showWelcomeFormUrl)
            ->line('Link reset password ini akan kadaluarsa dalam 30 menit.')
            ->line('Jika Anda tidak meminta reset password, abaikan email ini.')
            ->salutation('Salam, Tim Tali Rejeki');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }
}
