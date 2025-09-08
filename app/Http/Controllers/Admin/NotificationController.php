<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NotificationController extends Controller
{
    /**
     * Get all notifications for current user
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $limit = $request->get('limit', 10);
        $type = $request->get('type', 'all'); // all, unread, read

        try {
            $notifications = $this->getUserNotifications($user->id, $type, $limit);

            return response()->json([
                'success' => true,
                'notifications' => $notifications,
                'unread_count' => $this->getUnreadCountForUser($user->id)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil notifikasi: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get unread notifications count
     */
    public function getUnreadCount()
    {
        $user = Auth::user();

        try {
            $count = $this->getUnreadCountForUser($user->id);

            return response()->json([
                'success' => true,
                'unread_count' => $count
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'unread_count' => 0
            ]);
        }
    }

    /**
     * Mark notification as read
     */
    public function markAsRead(Request $request, $id)
    {
        try {
            DB::table('admin_notifications')
                ->where('id', $id)
                ->where('user_id', Auth::id())
                ->update([
                    'read_at' => now(),
                    'updated_at' => now()
                ]);

            return response()->json([
                'success' => true,
                'message' => 'Notifikasi ditandai sebagai dibaca'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui notifikasi'
            ], 500);
        }
    }

    /**
     * Mark all notifications as read
     */
    public function markAllAsRead()
    {
        try {
            DB::table('admin_notifications')
                ->where('user_id', Auth::id())
                ->whereNull('read_at')
                ->update([
                    'read_at' => now(),
                    'updated_at' => now()
                ]);

            return response()->json([
                'success' => true,
                'message' => 'Semua notifikasi ditandai sebagai dibaca'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui notifikasi'
            ], 500);
        }
    }

    /**
     * Delete notification
     */
    public function delete($id)
    {
        try {
            DB::table('admin_notifications')
                ->where('id', $id)
                ->where('user_id', Auth::id())
                ->delete();

            return response()->json([
                'success' => true,
                'message' => 'Notifikasi berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus notifikasi'
            ], 500);
        }
    }

    /**
     * Create new notification
     */
    public function create(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'type' => 'required|string',
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'action_url' => 'nullable|url',
            'priority' => 'nullable|in:low,normal,high,urgent'
        ]);

        try {
            $notificationId = DB::table('admin_notifications')->insertGetId([
                'user_id' => $request->user_id,
                'type' => $request->type,
                'title' => $request->title,
                'message' => $request->message,
                'action_url' => $request->action_url,
                'priority' => $request->priority ?? 'normal',
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Notifikasi berhasil dibuat',
                'notification_id' => $notificationId
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat notifikasi: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get recent activity notifications
     */
    public function getRecentActivity()
    {
        $user = Auth::user();

        try {
            // Generate dynamic notifications based on recent activity
            $notifications = $this->generateDynamicNotifications($user->id);

            return response()->json([
                'success' => true,
                'notifications' => $notifications
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'notifications' => []
            ]);
        }
    }

    /**
     * Private helper methods
     */
    private function getUserNotifications($userId, $type = 'all', $limit = 10)
    {
        $query = DB::table('admin_notifications')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->limit($limit);

        switch ($type) {
            case 'unread':
                $query->whereNull('read_at');
                break;
            case 'read':
                $query->whereNotNull('read_at');
                break;
        }

        $notifications = $query->get();

        return $notifications->map(function ($notification) {
            return [
                'id' => $notification->id,
                'type' => $notification->type,
                'title' => $notification->title,
                'message' => $notification->message,
                'action_url' => $notification->action_url,
                'priority' => $notification->priority,
                'is_read' => !is_null($notification->read_at),
                'created_at' => Carbon::parse($notification->created_at)->diffForHumans(),
                'icon' => $this->getNotificationIcon($notification->type),
                'color' => $this->getNotificationColor($notification->priority)
            ];
        });
    }

    private function getUnreadCountForUser($userId)
    {
        return DB::table('admin_notifications')
            ->where('user_id', $userId)
            ->whereNull('read_at')
            ->count();
    }

    private function generateDynamicNotifications($userId)
    {
        $notifications = [];
        $now = now();

        // Recent products added
        $recentProducts = DB::table('products')
            ->where('created_at', '>=', $now->subDays(7))
            ->count();

        if ($recentProducts > 0) {
            $notifications[] = [
                'id' => 'dynamic_products_' . time(),
                'type' => 'product_activity',
                'title' => 'Produk Baru Ditambahkan',
                'message' => "{$recentProducts} produk baru ditambahkan minggu ini",
                'action_url' => route('admin.products.index'),
                'priority' => 'normal',
                'is_read' => false,
                'created_at' => 'Baru saja',
                'icon' => 'cube',
                'color' => 'blue'
            ];
        }

        // Recent articles published
        $recentArticles = DB::table('articles')
            ->where('status', 'published')
            ->where('published_at', '>=', $now->subDays(7))
            ->count();

        if ($recentArticles > 0) {
            $notifications[] = [
                'id' => 'dynamic_articles_' . time(),
                'type' => 'content_activity',
                'title' => 'Artikel Baru Dipublikasi',
                'message' => "{$recentArticles} artikel baru dipublikasi minggu ini",
                'action_url' => route('admin.articles.index'),
                'priority' => 'normal',
                'is_read' => false,
                'created_at' => 'Baru saja',
                'icon' => 'newspaper',
                'color' => 'green'
            ];
        }

        // New users registered
        $newUsers = DB::table('users')
            ->where('created_at', '>=', $now->subDays(7))
            ->count();

        if ($newUsers > 0) {
            $notifications[] = [
                'id' => 'dynamic_users_' . time(),
                'type' => 'user_activity',
                'title' => 'Pengguna Baru Terdaftar',
                'message' => "{$newUsers} pengguna baru terdaftar minggu ini",
                'action_url' => '#',
                'priority' => 'normal',
                'is_read' => false,
                'created_at' => 'Baru saja',
                'icon' => 'user-plus',
                'color' => 'purple'
            ];
        }

        // Low stock products (if you have stock tracking)
        $lowStockProducts = DB::table('products')
            ->where('stock', '<=', 10)  // Assuming you have stock field
            ->count();

        if ($lowStockProducts > 0) {
            $notifications[] = [
                'id' => 'dynamic_stock_' . time(),
                'type' => 'stock_alert',
                'title' => 'Stok Produk Menipis',
                'message' => "{$lowStockProducts} produk memiliki stok menipis",
                'action_url' => route('admin.products.index', ['filter' => 'low_stock']),
                'priority' => 'high',
                'is_read' => false,
                'created_at' => 'Baru saja',
                'icon' => 'exclamation-triangle',
                'color' => 'orange'
            ];
        }

        // System backup status
        $lastBackup = DB::table('system_logs')
            ->where('type', 'backup')
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$lastBackup || Carbon::parse($lastBackup->created_at)->diffInDays() > 7) {
            $notifications[] = [
                'id' => 'dynamic_backup_' . time(),
                'type' => 'system_alert',
                'title' => 'Backup System Diperlukan',
                'message' => 'Sistem belum di-backup selama lebih dari 7 hari',
                'action_url' => route('admin.settings.backup'),
                'priority' => 'urgent',
                'is_read' => false,
                'created_at' => 'Baru saja',
                'icon' => 'database',
                'color' => 'red'
            ];
        }

        return array_slice($notifications, 0, 5); // Limit to 5 dynamic notifications
    }

    private function getNotificationIcon($type)
    {
        $icons = [
            'product_activity' => 'cube',
            'content_activity' => 'newspaper',
            'user_activity' => 'user-plus',
            'stock_alert' => 'exclamation-triangle',
            'system_alert' => 'cog',
            'security_alert' => 'shield-alt',
            'inquiry' => 'envelope',
            'order' => 'shopping-cart',
            'general' => 'bell'
        ];

        return $icons[$type] ?? 'bell';
    }

    private function getNotificationColor($priority)
    {
        $colors = [
            'low' => 'gray',
            'normal' => 'blue',
            'high' => 'orange',
            'urgent' => 'red'
        ];

        return $colors[$priority] ?? 'blue';
    }

    /**
     * Send notification to specific users
     */
    public static function sendToUsers($userIds, $type, $title, $message, $actionUrl = null, $priority = 'normal')
    {
        if (!is_array($userIds)) {
            $userIds = [$userIds];
        }

        $notifications = [];
        foreach ($userIds as $userId) {
            $notifications[] = [
                'user_id' => $userId,
                'type' => $type,
                'title' => $title,
                'message' => $message,
                'action_url' => $actionUrl,
                'priority' => $priority,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('admin_notifications')->insert($notifications);
    }

    /**
     * Send notification to all admin users
     */
    public static function sendToAllAdmins($type, $title, $message, $actionUrl = null, $priority = 'normal')
    {
        $adminIds = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('roles.name', 'admin')
            ->where('model_has_roles.model_type', 'App\\Models\\User')
            ->pluck('users.id')
            ->toArray();

        if (!empty($adminIds)) {
            self::sendToUsers($adminIds, $type, $title, $message, $actionUrl, $priority);
        }
    }
}
