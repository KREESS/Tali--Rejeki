<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class TestMail extends Command
{
    protected $signature = 'test:mail {email}';
    protected $description = 'Test mail configuration';

    public function handle()
    {
        $email = $this->argument('email');

        try {
            Mail::raw('Test email dari Tali Rejeki. Konfigurasi email berhasil!', function ($message) use ($email) {
                $message->to($email)
                    ->subject('Test Email - Tali Rejeki')
                    ->from(config('mail.from.address'), config('mail.from.name'));
            });

            $this->info("Email test berhasil dikirim ke: {$email}");
            Log::info("Test email sent successfully to: {$email}");
        } catch (\Exception $e) {
            $this->error("Gagal mengirim email: " . $e->getMessage());
            Log::error("Failed to send test email: " . $e->getMessage());
        }
    }
}
