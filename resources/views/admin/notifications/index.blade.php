@extends('admin.layouts.app')

@section('title', 'Notifikasi')

@section('content')
<div class="admin-content">
    <div class="page-header">
        <div class="page-title">
            <h2>
                <i class="fas fa-bell text-primary"></i>
                Notifikasi
            </h2>
            <p class="text-muted">Kelola notifikasi sistem dan aktivitas pengguna</p>
        </div>
        <div class="page-actions">
            <button class="btn btn-success" onclick="markAllAsRead()">
                <i class="fas fa-check-double"></i>
                Tandai Semua Dibaca
            </button>
        </div>
    </div>

    <div class="row">
        <!-- Notification Stats -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stats-card bg-primary">
                <div class="stats-icon">
                    <i class="fas fa-bell"></i>
                </div>
                <div class="stats-content">
                    <h3 id="totalNotifications">0</h3>
                    <p>Total Notifikasi</p>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stats-card bg-warning">
                <div class="stats-icon">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <div class="stats-content">
                    <h3 id="unreadNotifications">0</h3>
                    <p>Belum Dibaca</p>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stats-card bg-success">
                <div class="stats-icon">
                    <i class="fas fa-check"></i>
                </div>
                <div class="stats-content">
                    <h3 id="readNotifications">0</h3>
                    <p>Sudah Dibaca</p>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stats-card bg-info">
                <div class="stats-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stats-content">
                    <h3 id="todayNotifications">0</h3>
                    <p>Hari Ini</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Notifications List -->
    <div class="content-card">
        <div class="card-header">
            <h3>Daftar Notifikasi</h3>
            <div class="filter-controls">
                <select id="statusFilter" class="form-control">
                    <option value="all">Semua Status</option>
                    <option value="unread">Belum Dibaca</option>
                    <option value="read">Sudah Dibaca</option>
                </select>
                <select id="typeFilter" class="form-control">
                    <option value="all">Semua Jenis</option>
                    <option value="system">Sistem</option>
                    <option value="user">Pengguna</option>
                    <option value="content">Konten</option>
                </select>
            </div>
        </div>
        
        <div class="card-body">
            <div id="notificationsList" class="notifications-list">
                <div class="loading-spinner" style="text-align: center; padding: 40px;">
                    <i class="fas fa-spinner fa-spin fa-2x text-primary"></i>
                    <p class="mt-2">Memuat notifikasi...</p>
                </div>
            </div>
            
            <!-- Pagination -->
            <div id="paginationContainer" class="pagination-container">
                <!-- Pagination will be loaded here -->
            </div>
        </div>
    </div>
</div>

<style>
.notifications-list {
    min-height: 300px;
}

.notification-item {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    padding: 20px;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    margin-bottom: 15px;
    background: white;
    transition: all 0.3s ease;
    cursor: pointer;
}

.notification-item:hover {
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.1);
    transform: translateY(-2px);
}

.notification-item.unread {
    border-left: 4px solid #8b0000;
    background: rgba(139, 0, 0, 0.02);
}

.notification-icon {
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, rgba(139, 0, 0, 0.1), rgba(139, 0, 0, 0.05));
    border-radius: 12px;
    color: #8b0000;
    font-size: 1.2rem;
    flex-shrink: 0;
}

.notification-content {
    flex: 1;
}

.notification-title {
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 5px;
}

.notification-message {
    color: #4a5568;
    margin-bottom: 8px;
    line-height: 1.5;
}

.notification-meta {
    display: flex;
    align-items: center;
    gap: 15px;
    font-size: 0.85rem;
    color: #718096;
}

.notification-status {
    display: flex;
    align-items: center;
    gap: 5px;
}

.notification-actions {
    display: flex;
    align-items: center;
    gap: 10px;
}

.action-btn {
    padding: 6px 12px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 0.85rem;
    transition: all 0.3s ease;
}

.btn-read {
    background: rgba(139, 0, 0, 0.1);
    color: #8b0000;
}

.btn-read:hover {
    background: rgba(139, 0, 0, 0.2);
}

.btn-delete {
    background: rgba(220, 38, 38, 0.1);
    color: #dc2626;
}

.btn-delete:hover {
    background: rgba(220, 38, 38, 0.2);
}

.filter-controls {
    display: flex;
    gap: 10px;
}

.filter-controls select {
    min-width: 150px;
}

.stats-card {
    background: white;
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.1);
    display: flex;
    align-items: center;
    gap: 20px;
    transition: all 0.3s ease;
}

.stats-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(139, 0, 0, 0.15);
}

.stats-icon {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 15px;
    font-size: 1.5rem;
    color: white;
}

.stats-card.bg-primary .stats-icon {
    background: linear-gradient(135deg, #8b0000, #b71c1c);
}

.stats-card.bg-warning .stats-icon {
    background: linear-gradient(135deg, #f59e0b, #d97706);
}

.stats-card.bg-success .stats-icon {
    background: linear-gradient(135deg, #10b981, #059669);
}

.stats-card.bg-info .stats-icon {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
}

.stats-content h3 {
    margin: 0;
    font-size: 2rem;
    font-weight: 700;
    color: #2d3748;
}

.stats-content p {
    margin: 0;
    color: #718096;
    font-weight: 500;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    loadNotifications();
    loadStats();
    
    // Filter event listeners
    document.getElementById('statusFilter').addEventListener('change', loadNotifications);
    document.getElementById('typeFilter').addEventListener('change', loadNotifications);
});

function loadStats() {
    fetch('/admin/notifications/unread-count')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('unreadNotifications').textContent = data.unread_count;
                document.getElementById('totalNotifications').textContent = data.total_count || 0;
                document.getElementById('readNotifications').textContent = (data.total_count || 0) - data.unread_count;
                document.getElementById('todayNotifications').textContent = data.today_count || 0;
            }
        })
        .catch(error => {
            console.error('Failed to load notification stats:', error);
        });
}

function loadNotifications() {
    const statusFilter = document.getElementById('statusFilter').value;
    const typeFilter = document.getElementById('typeFilter').value;
    
    const params = new URLSearchParams();
    if (statusFilter !== 'all') params.append('status', statusFilter);
    if (typeFilter !== 'all') params.append('type', typeFilter);
    
    fetch(`/admin/notifications/?${params.toString()}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                renderNotifications(data.notifications);
                renderPagination(data.pagination);
            }
        })
        .catch(error => {
            console.error('Failed to load notifications:', error);
            document.getElementById('notificationsList').innerHTML = `
                <div style="text-align: center; padding: 40px;">
                    <i class="fas fa-exclamation-triangle fa-2x text-danger mb-3"></i>
                    <p>Gagal memuat notifikasi</p>
                </div>
            `;
        });
}

function renderNotifications(notifications) {
    const container = document.getElementById('notificationsList');
    
    if (notifications.length === 0) {
        container.innerHTML = `
            <div style="text-align: center; padding: 40px;">
                <i class="fas fa-bell-slash fa-3x text-muted mb-3"></i>
                <h4>Tidak ada notifikasi</h4>
                <p class="text-muted">Belum ada notifikasi yang tersedia</p>
            </div>
        `;
        return;
    }
    
    container.innerHTML = notifications.map(notification => `
        <div class="notification-item ${!notification.is_read ? 'unread' : ''}" onclick="handleNotificationClick('${notification.id}', '${notification.action_url}')">
            <div class="notification-icon">
                <i class="fas fa-${notification.icon || 'bell'}"></i>
            </div>
            <div class="notification-content">
                <div class="notification-title">${notification.title || 'Notifikasi Sistem'}</div>
                <div class="notification-message">${notification.message}</div>
                <div class="notification-meta">
                    <span class="notification-status">
                        <i class="fas fa-${notification.is_read ? 'check' : 'circle'} ${notification.is_read ? 'text-success' : 'text-warning'}"></i>
                        ${notification.is_read ? 'Sudah dibaca' : 'Belum dibaca'}
                    </span>
                    <span><i class="fas fa-clock"></i> ${notification.created_at}</span>
                </div>
            </div>
            <div class="notification-actions">
                ${!notification.is_read ? `
                    <button class="action-btn btn-read" onclick="event.stopPropagation(); markAsRead('${notification.id}')">
                        <i class="fas fa-check"></i> Baca
                    </button>
                ` : ''}
                <button class="action-btn btn-delete" onclick="event.stopPropagation(); deleteNotification('${notification.id}')">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    `).join('');
}

function renderPagination(pagination) {
    // Simple pagination implementation
    const container = document.getElementById('paginationContainer');
    if (!pagination || pagination.total <= pagination.per_page) {
        container.innerHTML = '';
        return;
    }
    
    // Add pagination HTML here if needed
    container.innerHTML = `
        <div class="d-flex justify-content-center">
            <p class="text-muted">Menampilkan ${pagination.from}-${pagination.to} dari ${pagination.total} notifikasi</p>
        </div>
    `;
}

function handleNotificationClick(notificationId, actionUrl) {
    markAsRead(notificationId, () => {
        if (actionUrl && actionUrl !== '#' && actionUrl !== 'null') {
            window.location.href = actionUrl;
        }
    });
}

function markAsRead(notificationId, callback) {
    fetch(`/admin/notifications/${notificationId}/read`, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            loadNotifications();
            loadStats();
            if (callback) callback();
        }
    })
    .catch(error => {
        console.error('Failed to mark notification as read:', error);
    });
}

function markAllAsRead() {
    if (!confirm('Tandai semua notifikasi sebagai sudah dibaca?')) return;
    
    fetch('/admin/notifications/mark-all-read', {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            loadNotifications();
            loadStats();
            
            // Show success message
            showToast('Semua notifikasi telah ditandai sebagai dibaca', 'success');
        }
    })
    .catch(error => {
        console.error('Failed to mark all notifications as read:', error);
        showToast('Gagal menandai notifikasi', 'error');
    });
}

function deleteNotification(notificationId) {
    if (!confirm('Hapus notifikasi ini?')) return;
    
    fetch(`/admin/notifications/${notificationId}`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            loadNotifications();
            loadStats();
            showToast('Notifikasi berhasil dihapus', 'success');
        }
    })
    .catch(error => {
        console.error('Failed to delete notification:', error);
        showToast('Gagal menghapus notifikasi', 'error');
    });
}

function showToast(message, type = 'info') {
    // Simple toast notification
    const toast = document.createElement('div');
    toast.className = `alert alert-${type === 'error' ? 'danger' : type} alert-dismissible fade show`;
    toast.style.position = 'fixed';
    toast.style.top = '20px';
    toast.style.right = '20px';
    toast.style.zIndex = '9999';
    toast.innerHTML = `
        ${message}
        <button type="button" class="btn-close" onclick="this.parentElement.remove()"></button>
    `;
    
    document.body.appendChild(toast);
    
    setTimeout(() => {
        if (toast.parentElement) {
            toast.remove();
        }
    }, 5000);
}
</script>
@endsection
