@extends('auth.components.layout')

@section('title', 'Kelola Users - Admin Dashboard')

@push('styles')
<style>
    :root {
        --primary: #7c1415;
        --primary-2: #b71c1c;
        --secondary: #ff4444;
        --success: #22c55e;
        --warning: #f59e0b;
        --danger: #ef4444;
        --info: #3b82f6;
        --panel-bg: rgba(255,255,255,.95);
        --glass-bg: rgba(255,255,255,.90);
        --glass-border: rgba(124,20,21,.20);
        --text-primary: #1f2937;
        --text-secondary: #6b7280;
        --radius: 16px;
        --shadow: 0 10px 25px rgba(124,20,21,.1);
    }

    body {
        background: linear-gradient(135deg, 
            rgba(124, 20, 21, 0.05) 0%, 
            rgba(183, 28, 28, 0.08) 50%, 
            rgba(124, 20, 21, 0.05) 100%);
        min-height: 100vh;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .admin-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 2rem;
        min-height: 100vh;
    }

    .page-header {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 2px solid var(--glass-border);
        border-radius: var(--radius);
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: var(--shadow);
    }

    .page-header h1 {
        color: var(--primary);
        font-size: 2rem;
        font-weight: 800;
        margin: 0 0 0.5rem 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .breadcrumb {
        color: var(--text-secondary);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .breadcrumb a {
        color: var(--primary);
        text-decoration: none;
    }

    .breadcrumb a:hover {
        text-decoration: underline;
    }

    .users-section {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 2px solid var(--glass-border);
        border-radius: var(--radius);
        padding: 2rem;
        box-shadow: var(--shadow);
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .section-title {
        color: var(--primary);
        font-size: 1.5rem;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary), var(--primary-2));
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(124, 20, 21, 0.3);
        cursor: pointer;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(124, 20, 21, 0.4);
        text-decoration: none;
        color: white;
    }

    .users-table {
        background: rgba(255, 255, 255, 0.7);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(124, 20, 21, 0.1);
    }

    .table {
        width: 100%;
        margin: 0;
        border-collapse: collapse;
    }

    .table th {
        background: linear-gradient(135deg, var(--primary), var(--primary-2));
        color: white;
        padding: 1rem;
        text-align: left;
        font-weight: 600;
        border: none;
    }

    .table td {
        padding: 1rem;
        border-bottom: 1px solid rgba(124, 20, 21, 0.1);
        vertical-align: middle;
    }

    .table tbody tr:hover {
        background: rgba(124, 20, 21, 0.05);
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        margin-right: 1rem;
    }

    .user-info {
        display: flex;
        align-items: center;
    }

    .user-details h4 {
        margin: 0 0 0.25rem 0;
        color: var(--text-primary);
        font-weight: 600;
    }

    .user-details p {
        margin: 0;
        color: var(--text-secondary);
        font-size: 0.9rem;
    }

    .status-badge {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        display: inline-block;
    }

    .status-active {
        background: rgba(34, 197, 94, 0.1);
        color: var(--success);
    }

    .status-inactive {
        background: rgba(239, 68, 68, 0.1);
        color: var(--danger);
    }

    .role-badge {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        display: inline-block;
    }

    .role-admin {
        background: rgba(124, 20, 21, 0.1);
        color: var(--primary);
    }

    .role-user {
        background: rgba(59, 130, 246, 0.1);
        color: var(--info);
    }

    .actions {
        display: flex;
        gap: 0.5rem;
    }

    .btn-sm {
        padding: 0.5rem;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        font-size: 0.8rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-edit {
        background: var(--info);
        color: white;
    }

    .btn-edit:hover {
        background: #2563eb;
        transform: scale(1.1);
    }

    .btn-delete {
        background: var(--danger);
        color: white;
    }

    .btn-delete:hover {
        background: #dc2626;
        transform: scale(1.1);
    }

    .empty-state {
        text-align: center;
        padding: 3rem;
        color: var(--text-secondary);
    }

    .empty-state i {
        font-size: 4rem;
        margin-bottom: 1rem;
        color: rgba(124, 20, 21, 0.3);
    }

    @media (max-width: 768px) {
        .admin-container {
            padding: 1rem;
        }
        
        .section-header {
            flex-direction: column;
            align-items: stretch;
        }
        
        .users-table {
            overflow-x: auto;
        }
        
        .table {
            min-width: 600px;
        }
    }
</style>
@endpush

@section('content')
<div class="admin-container">
    <!-- Page Header -->
    <div class="page-header">
        <h1>
            <i class="fas fa-users"></i>
            Kelola Users
        </h1>
        <nav class="breadcrumb">
            <a href="{{ route('admin.dashboard') }}">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </a>
            <i class="fas fa-chevron-right"></i>
            <span>Kelola Users</span>
        </nav>
    </div>

    <!-- Users Section -->
    <div class="users-section">
        <div class="section-header">
            <h2 class="section-title">
                <i class="fas fa-users"></i>
                Daftar Users
            </h2>
            <button class="btn-primary" onclick="alert('Fitur tambah user akan segera tersedia!')">
                <i class="fas fa-plus"></i>
                Tambah User
            </button>
        </div>

        <div class="users-table">
            <table class="table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Terdaftar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="user-info">
                                <div class="user-avatar">
                                    A
                                </div>
                                <div class="user-details">
                                    <h4>Admin Tali Rejeki</h4>
                                    <p>Administrator</p>
                                </div>
                            </div>
                        </td>
                        <td>admin@talirejeki.com</td>
                        <td>
                            <span class="role-badge role-admin">Admin</span>
                        </td>
                        <td>
                            <span class="status-badge status-active">Active</span>
                        </td>
                        <td>{{ now()->subDays(30)->format('d M Y') }}</td>
                        <td>
                            <div class="actions">
                                <button class="btn-sm btn-edit" title="Edit User">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-sm btn-delete" title="Hapus User">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="user-info">
                                <div class="user-avatar">
                                    J
                                </div>
                                <div class="user-details">
                                    <h4>John Doe</h4>
                                    <p>Customer</p>
                                </div>
                            </div>
                        </td>
                        <td>john@example.com</td>
                        <td>
                            <span class="role-badge role-user">User</span>
                        </td>
                        <td>
                            <span class="status-badge status-active">Active</span>
                        </td>
                        <td>{{ now()->subDays(15)->format('d M Y') }}</td>
                        <td>
                            <div class="actions">
                                <button class="btn-sm btn-edit" title="Edit User">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-sm btn-delete" title="Hapus User">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="user-info">
                                <div class="user-avatar">
                                    S
                                </div>
                                <div class="user-details">
                                    <h4>Sarah Johnson</h4>
                                    <p>Customer</p>
                                </div>
                            </div>
                        </td>
                        <td>sarah@example.com</td>
                        <td>
                            <span class="role-badge role-user">User</span>
                        </td>
                        <td>
                            <span class="status-badge status-inactive">Inactive</span>
                        </td>
                        <td>{{ now()->subDays(7)->format('d M Y') }}</td>
                        <td>
                            <div class="actions">
                                <button class="btn-sm btn-edit" title="Edit User">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-sm btn-delete" title="Hapus User">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="user-info">
                                <div class="user-avatar">
                                    M
                                </div>
                                <div class="user-details">
                                    <h4>Michael Chen</h4>
                                    <p>Customer</p>
                                </div>
                            </div>
                        </td>
                        <td>michael@example.com</td>
                        <td>
                            <span class="role-badge role-user">User</span>
                        </td>
                        <td>
                            <span class="status-badge status-active">Active</span>
                        </td>
                        <td>{{ now()->subDays(3)->format('d M Y') }}</td>
                        <td>
                            <div class="actions">
                                <button class="btn-sm btn-edit" title="Edit User">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-sm btn-delete" title="Hapus User">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle edit buttons
    const editButtons = document.querySelectorAll('.btn-edit');
    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const row = this.closest('tr');
            const userName = row.querySelector('.user-details h4').textContent;
            alert(`Edit user: ${userName}\n\nFitur edit user akan segera tersedia!`);
        });
    });

    // Handle delete buttons
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const row = this.closest('tr');
            const userName = row.querySelector('.user-details h4').textContent;
            
            if (confirm(`Apakah Anda yakin ingin menghapus user: ${userName}?`)) {
                alert('Fitur hapus user akan segera tersedia!');
            }
        });
    });

    // Add table row hover effects
    const tableRows = document.querySelectorAll('.table tbody tr');
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.01)';
            this.style.transition = 'all 0.2s ease';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });
});
</script>
@endpush
