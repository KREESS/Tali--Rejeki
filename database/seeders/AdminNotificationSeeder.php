<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AdminNotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get admin users
        $adminUsers = User::role('admin')->pluck('id')->toArray();

        if (empty($adminUsers)) {
            $this->command->info('No admin users found. Please create admin users first.');
            return;
        }

        $notifications = [];
        $now = now();

        // Sample notifications for each admin
        foreach ($adminUsers as $userId) {
            $userNotifications = [
                [
                    'user_id' => $userId,
                    'type' => 'user_activity',
                    'title' => 'Pengguna Baru Terdaftar',
                    'message' => 'Pengguna baru PT. Innovative Solutions telah mendaftar dari Jakarta',
                    'action_url' => '#',
                    'priority' => 'normal',
                    'created_at' => $now->copy()->subMinutes(5),
                    'updated_at' => $now->copy()->subMinutes(5)
                ],
                [
                    'user_id' => $userId,
                    'type' => 'inquiry',
                    'title' => 'Inquiry Produk Baru',
                    'message' => 'Inquiry untuk produk Glasswool Premium dari Surabaya',
                    'action_url' => '#',
                    'priority' => 'high',
                    'created_at' => $now->copy()->subMinutes(15),
                    'updated_at' => $now->copy()->subMinutes(15)
                ],
                [
                    'user_id' => $userId,
                    'type' => 'system_alert',
                    'title' => 'Traffic Website Meningkat',
                    'message' => 'Traffic website naik 25% dibanding minggu lalu',
                    'action_url' => '#',
                    'priority' => 'normal',
                    'read_at' => $now->copy()->subHours(1),
                    'created_at' => $now->copy()->subHours(1),
                    'updated_at' => $now->copy()->subHours(1)
                ],
                [
                    'user_id' => $userId,
                    'type' => 'product_activity',
                    'title' => 'Produk Baru Ditambahkan',
                    'message' => '3 produk insulasi baru berhasil ditambahkan ke katalog',
                    'action_url' => '#',
                    'priority' => 'normal',
                    'read_at' => $now->copy()->subHours(2),
                    'created_at' => $now->copy()->subHours(2),
                    'updated_at' => $now->copy()->subHours(2)
                ],
                [
                    'user_id' => $userId,
                    'type' => 'security_alert',
                    'title' => 'Login dari IP Baru',
                    'message' => 'Login terdeteksi dari IP address baru: 192.168.1.100',
                    'action_url' => '#',
                    'priority' => 'high',
                    'created_at' => $now->copy()->subHours(3),
                    'updated_at' => $now->copy()->subHours(3)
                ]
            ];

            $notifications = array_merge($notifications, $userNotifications);
        }

        // Insert notifications one by one to handle read_at field properly
        foreach ($notifications as $notification) {
            DB::table('admin_notifications')->insert($notification);
        }

        $this->command->info('Sample admin notifications created successfully!');
    }
}
