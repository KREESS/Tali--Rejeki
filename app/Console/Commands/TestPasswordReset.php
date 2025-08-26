<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class TestPasswordReset extends Command
{
    protected $signature = 'test:password-reset {email}';
    protected $description = 'Test password reset functionality';

    public function handle()
    {
        $email = $this->argument('email');

        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error("User with email {$email} not found.");
            return;
        }

        try {
            $user->sendWelcomeNotification(now()->addMinutes(30));
            $this->info("Password reset email sent successfully to: {$email}");
        } catch (\Exception $e) {
            $this->error("Failed to send email: " . $e->getMessage());
        }
    }
}
