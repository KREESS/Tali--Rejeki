@extends('admin.components.layout')

@section('title', 'Dashboard Admin')

@push('styles')
<style>
    /* ====== DASHBOARD VARIABLES - RED DARK THEME ====== */
    :root {
        --dash-primary: #7f1d1d;
        --dash-secondary: #991b1b;
        --dash-accent: #dc2626;
        --dash-success: #059669;
        --dash-warning: #d97706;
        --dash-danger: #dc2626;
        --dash-dark: #450a0a;
        --dash-light: #fef2f2;
        --dash-white: #ffffff;
        
        /* Glass Effects */
        --dash-glass-white: rgba(255, 255, 255, 0.95);
        --dash-glass-dark: rgba(127, 29, 29, 0.9);
        --dash-glass-light: rgba(220, 38, 38, 0.15);
        
        /* 3D Shadows */
        --dash-shadow: 0 20px 40px rgba(127, 29, 29, 0.3);
        --dash-shadow-hover: 0 30px 60px rgba(127, 29, 29, 0.4);
        --dash-shadow-3d: 0 8px 32px rgba(127, 29, 29, 0.2), 0 2px 8px rgba(0, 0, 0, 0.1);
        --dash-shadow-inset: inset 0 2px 4px rgba(0, 0, 0, 0.1);
        
        /* Transitions */
        --dash-transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        --dash-bounce: cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    /* ====== 3D ANIMATIONS ====== */
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    @keyframes pulse3D {
        0%, 100% { transform: scale(1) rotateX(0deg); box-shadow: var(--dash-shadow); }
        50% { transform: scale(1.05) rotateX(5deg); box-shadow: var(--dash-shadow-hover); }
    }

    @keyframes slideInUp {
        from { transform: translateY(50px) rotateX(-10deg); opacity: 0; }
        to { transform: translateY(0) rotateX(0deg); opacity: 1; }
    }

    @keyframes bounceIn {
        0% { transform: scale(0.3) rotateY(-180deg); opacity: 0; }
        50% { transform: scale(1.1) rotateY(-90deg); }
        100% { transform: scale(1) rotateY(0deg); opacity: 1; }
    }

    @keyframes shimmer {
        0% { background-position: -200px 0; }
        100% { background-position: calc(200px + 100%) 0; }
    }

    @keyframes rotate360 {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    /* ====== ENTRANCE ANIMATIONS ====== */
    .animate-in {
        animation: slideInUp 0.8s var(--dash-bounce) forwards !important;
    }

    /* ====== ENHANCED SHADOWS ====== */
    .stat-card-modern:nth-child(1) { animation-delay: 0.1s; }
    .stat-card-modern:nth-child(2) { animation-delay: 0.2s; }
    .stat-card-modern:nth-child(3) { animation-delay: 0.3s; }
    .stat-card-modern:nth-child(4) { animation-delay: 0.4s; }

    /* ====== RESPONSIVE ANIMATIONS ====== */
    @media (prefers-reduced-motion: reduce) {
        * {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
    }

    /* ====== RESPONSIVE SIDEBAR HANDLING ====== */
    body {
        margin: 0;
        padding: 0;
        min-height: 100vh;
        background: linear-gradient(135deg, #450a0a 0%, #7f1d1d 25%, #991b1b 50%, #dc2626 75%, #ef4444 100%);
        background-attachment: fixed;
        position: relative;
        overflow-x: hidden;
    }

    .admin-container {
        padding: 25px;
        transition: var(--dash-transition);
        margin-left: 0;
        width: 100%;
        min-height: 100vh;
        position: relative;
        z-index: 1;
    }

    /* Sidebar open state */
    body.sidebar-open .admin-container {
        margin-left: 280px;
        width: calc(100% - 280px);
        padding: 25px;
    }

    /* Sidebar closed state */
    body.sidebar-closed .admin-container {
        margin-left: 70px;
        width: calc(100% - 70px);
        padding: 25px;
    }

    /* Mobile responsive */
    @media (max-width: 768px) {
        .admin-container {
            margin-left: 0 !important;
            width: 100% !important;
            padding: 15px;
        }
        
        body.sidebar-open .admin-container {
            margin-left: 0;
            width: 100%;
        }
    }

    /* ====== FLOATING CLOCK WIDGET ====== */
    .floating-clock {
        position: fixed;
        bottom: 30px;
        right: 30px;
        background: var(--dash-glass-white);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 20px;
        padding: 20px 25px;
        box-shadow: var(--dash-shadow-3d);
        z-index: 1000;
        text-align: center;
        min-width: 200px;
        animation: slideInUp 1s var(--dash-bounce) 1.5s both;
        transition: var(--dash-transition);
    }

    .floating-clock:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow: var(--dash-shadow-hover);
    }

    .clock-time {
        font-size: 1.8rem;
        font-weight: 900;
        color: var(--dash-primary);
        background: linear-gradient(135deg, var(--dash-primary), var(--dash-accent));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 5px;
        font-family: 'Courier New', monospace;
        letter-spacing: 2px;
        animation: pulse3D 3s ease-in-out infinite;
    }

    .clock-date {
        font-size: 0.9rem;
        color: var(--dash-secondary);
        font-weight: 600;
        opacity: 0.8;
    }

    .clock-timezone {
        font-size: 0.8rem;
        color: var(--dash-accent);
        font-weight: 500;
        margin-top: 5px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* ====== MODERN HEADER ====== */
    .dashboard-header {
        background: var(--dash-glass-white);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 30px;
        padding: 40px;
        margin-bottom: 40px;
        box-shadow: var(--dash-shadow-3d);
        animation: slideInUp 0.8s var(--dash-bounce);
        position: relative;
        overflow: hidden;
    }

    .dashboard-header:hover {
        transform: translateY(-8px);
        box-shadow: var(--dash-shadow-hover);
    }

    .header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 30px;
    }

    .welcome-section h1 {
        font-size: 3.2rem;
        font-weight: 900;
        color: var(--dash-primary);
        margin: 0 0 15px 0;
        background: linear-gradient(135deg, var(--dash-primary), var(--dash-accent), var(--dash-warning));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: float 3s ease-in-out infinite;
    }

    .welcome-section p {
        color: var(--dash-secondary);
        font-size: 1.2rem;
        margin: 0;
        animation: slideInUp 1s var(--dash-bounce) 0.3s both;
    }

    .header-actions {
        display: flex;
        gap: 15px;
    }

    .btn-header {
        background: linear-gradient(135deg, var(--dash-accent), var(--dash-primary));
        color: white;
        border: none;
        padding: 15px 28px;
        border-radius: 15px;
        font-weight: 700;
        text-decoration: none;
        transition: var(--dash-transition);
        display: flex;
        align-items: center;
        gap: 10px;
        position: relative;
        overflow: hidden;
        box-shadow: var(--dash-shadow-3d);
        transform: translateZ(0);
    }

    .btn-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: var(--dash-transition);
    }

    .btn-header:hover {
        background: linear-gradient(135deg, var(--dash-primary), var(--dash-dark));
        transform: translateY(-3px) rotateX(5deg) scale(1.05);
        box-shadow: var(--dash-shadow-hover);
        color: white;
        text-decoration: none;
    }

    .btn-header:hover::before {
        left: 100%;
    }

    /* ====== MODERN STATISTICS ====== */
    .dashboard-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
        margin-bottom: 30px;
    }

    .stat-card-modern {
        background: var(--dash-white);
        border-radius: 25px;
        padding: 30px;
        box-shadow: var(--dash-shadow-3d);
        border: 1px solid rgba(127, 29, 29, 0.1);
        transition: var(--dash-transition);
        cursor: pointer;
        position: relative;
        overflow: hidden;
        transform-style: preserve-3d;
        animation: slideInUp 0.8s var(--dash-bounce);
    }

    .stat-card-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: linear-gradient(90deg, var(--dash-accent), var(--dash-success), var(--dash-warning));
        background-size: 200% 100%;
        animation: shimmer 2s infinite linear;
    }

    .stat-card-modern::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: radial-gradient(circle, rgba(220, 38, 38, 0.1) 0%, transparent 70%);
        transform: translate(-50%, -50%);
        transition: var(--dash-transition);
        border-radius: 50%;
    }

    .stat-card-modern:hover {
        transform: translateY(-8px) rotateX(5deg) rotateY(2deg) scale(1.02);
        box-shadow: var(--dash-shadow-hover);
        animation: pulse3D 2s infinite;
    }

    .stat-card-modern:hover::after {
        width: 200px;
        height: 200px;
    }

    .stat-header-modern {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .stat-icon-modern {
        width: 65px;
        height: 65px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        color: white;
        position: relative;
        overflow: hidden;
        box-shadow: var(--dash-shadow-inset);
        animation: bounceIn 1s var(--dash-bounce) 0.5s both;
    }

    .stat-icon-modern::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, rgba(255, 255, 255, 0.1), transparent, rgba(255, 255, 255, 0.1));
        transform: rotate(45deg);
        transition: var(--dash-transition);
        opacity: 0;
    }

    .stat-card-modern:hover .stat-icon-modern::before {
        opacity: 1;
        transform: rotate(45deg) translateX(50px);
    }

    .stat-users .stat-icon-modern { background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%); }
    .stat-inquiries .stat-icon-modern { background: linear-gradient(135deg, #be123c 0%, #e11d48 100%); }
    .stat-products .stat-icon-modern { background: linear-gradient(135deg, #9f1239 0%, #fb7185 100%); }
    .stat-analytics .stat-icon-modern { background: linear-gradient(135deg, #881337 0%, #f43f5e 100%); }
    .stat-sales .stat-icon-modern { background: linear-gradient(135deg, #059669 0%, #10b981 100%); }
    .stat-revenue .stat-icon-modern { background: linear-gradient(135deg, #d97706 0%, #f59e0b 100%); }

    .stat-trend-modern {
        background: rgba(56, 161, 105, 0.1);
        color: var(--dash-success);
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .stat-number-modern {
        font-size: 3rem;
        font-weight: 900;
        color: var(--dash-primary);
        margin: 15px 0 10px 0;
        background: linear-gradient(135deg, var(--dash-primary), var(--dash-accent));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        position: relative;
        animation: float 4s ease-in-out infinite;
    }

    .stat-number-modern::after {
        content: attr(data-number);
        position: absolute;
        top: 0;
        left: 0;
        background: linear-gradient(135deg, rgba(220, 38, 38, 0.1), rgba(127, 29, 29, 0.1));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        z-index: -1;
        transform: translate(2px, 2px);
    }

    .stat-label-modern {
        color: var(--dash-secondary);
        font-size: 1rem;
        font-weight: 600;
        margin: 0 0 5px 0;
    }

    .stat-subtitle-modern {
        color: #718096;
        font-size: 0.9rem;
        margin: 0;
    }

    /* ====== ACTION CARDS ====== */
    .dashboard-actions {
        background: var(--dash-white);
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: var(--dash-shadow);
        border: 1px solid rgba(26, 54, 93, 0.1);
    }

    .actions-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .actions-title {
        font-size: 2rem;
        font-weight: 700;
        color: var(--dash-primary);
        margin: 0 0 10px 0;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
    }

    .actions-subtitle {
        color: var(--dash-secondary);
        font-size: 1.1rem;
        margin: 0;
    }

    .actions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .action-card-modern {
        background: linear-gradient(145deg, white 0%, #fafafa 100%);
        border: 2px solid rgba(127, 29, 29, 0.1);
        border-radius: 25px;
        padding: 30px;
        text-decoration: none;
        color: inherit;
        transition: var(--dash-transition);
        position: relative;
        overflow: hidden;
        cursor: pointer;
        transform-style: preserve-3d;
        box-shadow: var(--dash-shadow-3d);
        animation: slideInUp 0.8s var(--dash-bounce);
    }

    .action-card-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(220, 38, 38, 0.05), transparent, rgba(127, 29, 29, 0.05));
        opacity: 0;
        transition: var(--dash-transition);
        z-index: 0;
    }

    .action-card-modern:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: var(--dash-shadow-hover);
        border-color: var(--dash-accent);
        text-decoration: none;
        color: inherit;
    }

    .action-card-modern:hover::before {
        opacity: 1;
    }

    .action-card-modern > * {
        position: relative;
        z-index: 1;
    }

    .action-icon-wrapper {
        width: 70px;
        height: 70px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        color: white;
        margin-bottom: 25px;
        position: relative;
        overflow: hidden;
        box-shadow: var(--dash-shadow-inset);
        animation: bounceIn 1.2s var(--dash-bounce) 0.3s both;
    }

    .action-icon-wrapper::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, rgba(255, 255, 255, 0.2), transparent, rgba(255, 255, 255, 0.2));
        transform: rotate(45deg);
        transition: var(--dash-transition);
        opacity: 0;
    }

    .action-card-modern:hover .action-icon-wrapper {
        transform: scale(1.1);
    }

    .action-card-modern:hover .action-icon-wrapper::before {
        opacity: 1;
        transform: rotate(45deg) translateX(100px);
    }

    .action-primary .action-icon-wrapper { background: linear-gradient(135deg, #dc2626 0%, #7f1d1d 100%); }
    .action-secondary .action-icon-wrapper { background: linear-gradient(135deg, #be123c 0%, #e11d48 100%); }
    .action-info .action-icon-wrapper { background: linear-gradient(135deg, #9f1239 0%, #fb7185 100%); }
    .action-success .action-icon-wrapper { background: linear-gradient(135deg, #059669 0%, #10b981 100%); }
    .action-warning .action-icon-wrapper { background: linear-gradient(135deg, #d97706 0%, #f59e0b 100%); }
    .action-dark .action-icon-wrapper { background: linear-gradient(135deg, #450a0a 0%, #7f1d1d 100%); }

    .action-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--dash-primary);
        margin: 0 0 10px 0;
    }

    .action-description {
        color: var(--dash-secondary);
        font-size: 0.95rem;
        margin: 0 0 15px 0;
        line-height: 1.5;
    }

    .action-stats {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .stat-badge {
        background: rgba(127, 29, 29, 0.1);
        color: var(--dash-primary);
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .stat-badge.success {
        background: rgba(56, 161, 105, 0.1);
        color: var(--dash-success);
    }

    /* ====== WIDGETS SECTION ====== */
    .dashboard-widgets {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 25px;
        margin-bottom: 30px;
    }

    .widget-modern {
        background: var(--dash-white);
        border-radius: 25px;
        padding: 30px;
        box-shadow: var(--dash-shadow-3d);
        border: 1px solid rgba(127, 29, 29, 0.1);
        transition: var(--dash-transition);
        position: relative;
        overflow: hidden;
        transform-style: preserve-3d;
        animation: slideInUp 1s var(--dash-bounce) 0.4s both;
    }

    .widget-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(220, 38, 38, 0.03), transparent, rgba(127, 29, 29, 0.03));
        opacity: 0;
        transition: var(--dash-transition);
    }

    .widget-modern:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: var(--dash-shadow-hover);
    }

    .widget-modern:hover::before {
        opacity: 1;
    }

    .widget-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
    }

    .widget-icon {
        width: 45px;
        height: 45px;
        border-radius: 12px;
        background: linear-gradient(135deg, var(--dash-success) 0%, #10b981 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 18px;
    }

    .widget-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--dash-primary);
        margin: 0;
    }

    /* Metric and Security Widget Styles */
    .metric-content,
    .security-content {
        padding: 15px 0;
    }

    .metric-item,
    .security-detail {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .metric-item:last-child,
    .security-detail:last-child {
        border-bottom: none;
    }

    .metric-label {
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.9rem;
    }

    .metric-value {
        color: var(--primary-red);
        font-weight: bold;
        font-size: 1rem;
    }

    .security-status {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 15px;
        padding: 12px;
        background: rgba(40, 167, 69, 0.2);
        border-radius: 8px;
        border: 1px solid rgba(40, 167, 69, 0.3);
    }

    .security-status i {
        font-size: 1.2rem;
    }

    .security-details {
        padding-top: 10px;
    }

    .security-detail i {
        color: var(--dash-accent);
        margin-right: 8px;
        width: 16px;
    }

    /* ====== RECENT ACTIVITY STYLES ====== */
    .activity-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .activity-item {
        background: linear-gradient(145deg, white 0%, #fafafa 100%);
        border: 1px solid rgba(127, 29, 29, 0.1);
        border-radius: 20px;
        padding: 25px;
        display: flex;
        align-items: center;
        gap: 20px;
        transition: var(--dash-transition);
        position: relative;
        overflow: hidden;
        box-shadow: var(--dash-shadow-3d);
        animation: slideInUp 0.8s var(--dash-bounce);
    }

    .activity-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(220, 38, 38, 0.03), transparent, rgba(127, 29, 29, 0.03));
        opacity: 0;
        transition: var(--dash-transition);
        z-index: 0;
    }

    .activity-item:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: var(--dash-shadow-hover);
        border-color: var(--dash-accent);
    }

    .activity-item:hover::before {
        opacity: 1;
    }

    .activity-item > * {
        position: relative;
        z-index: 1;
    }

    .activity-icon {
        width: 60px;
        height: 60px;
        border-radius: 15px;
        background: linear-gradient(135deg, var(--dash-accent), var(--dash-primary));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 20px;
        box-shadow: var(--dash-shadow-inset);
        flex-shrink: 0;
        position: relative;
        overflow: hidden;
    }

    .activity-icon::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, rgba(255, 255, 255, 0.1), transparent, rgba(255, 255, 255, 0.1));
        transform: rotate(45deg);
        transition: var(--dash-transition);
        opacity: 0;
    }

    .activity-item:hover .activity-icon::before {
        opacity: 1;
        transform: rotate(45deg) translateX(50px);
    }

    .activity-content {
        flex: 1;
    }

    .activity-content h4 {
        margin: 0 0 8px 0;
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--dash-primary);
        line-height: 1.3;
    }

    .activity-content p {
        margin: 0;
        color: var(--dash-secondary);
        font-size: 0.9rem;
        opacity: 0.8;
    }

    .activity-status {
        padding: 8px 16px;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        flex-shrink: 0;
        position: relative;
        overflow: hidden;
        box-shadow: var(--dash-shadow-inset);
    }

    .activity-status::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: var(--dash-transition);
    }

    .activity-item:hover .activity-status::before {
        left: 100%;
    }

    .activity-status.pending {
        background: linear-gradient(135deg, var(--dash-warning), #f59e0b);
        color: white;
    }

    .activity-status.urgent {
        background: linear-gradient(135deg, var(--dash-danger), #ef4444);
        color: white;
        animation: pulse3D 2s ease-in-out infinite;
    }

    .activity-status.completed {
        background: linear-gradient(135deg, var(--dash-success), #10b981);
        color: white;
    }

    /* Activity item staggered animations */
    .activity-item:nth-child(1) { animation-delay: 0.1s; }
    .activity-item:nth-child(2) { animation-delay: 0.2s; }
    .activity-item:nth-child(3) { animation-delay: 0.3s; }
    .activity-item:nth-child(4) { animation-delay: 0.4s; }

    /* Enhanced metric styles */
    .metric-item {
        padding: 12px 0;
        border-bottom: 1px solid rgba(127, 29, 29, 0.1);
        transition: var(--dash-transition);
    }

    .metric-item:hover {
        background: rgba(220, 38, 38, 0.05);
        padding-left: 10px;
        border-radius: 8px;
    }

    .metric-label {
        color: var(--dash-secondary);
        font-size: 0.9rem;
        font-weight: 500;
    }

    .metric-value {
        color: var(--dash-accent);
        font-weight: 700;
        font-size: 1rem;
    }

    /* Enhanced security styles */
    .security-detail {
        padding: 10px 0;
        border-bottom: 1px solid rgba(127, 29, 29, 0.1);
        transition: var(--dash-transition);
    }

    .security-detail:hover {
        background: rgba(5, 150, 105, 0.05);
        padding-left: 10px;
        border-radius: 8px;
    }

    .security-status {
        background: linear-gradient(135deg, rgba(5, 150, 105, 0.2), rgba(16, 185, 129, 0.1));
        border: 2px solid rgba(5, 150, 105, 0.3);
        color: var(--dash-success);
        font-weight: 600;
    }

    .security-status i {
        color: var(--dash-success);
    }

    /* ====== RESPONSIVE DESIGN ====== */
    @media (max-width: 1200px) {
        .dashboard-stats {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .actions-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .dashboard-header {
            padding: 20px;
        }
        
        .header-content {
            flex-direction: column;
            text-align: center;
            gap: 20px;
        }
        
        .welcome-section h1 {
            font-size: 2.4rem;
        }
        
        .header-actions {
            width: 100%;
            justify-content: center;
        }
        
        .dashboard-stats {
            grid-template-columns: 1fr;
        }
        
        .actions-grid {
            grid-template-columns: 1fr;
        }
        
        .dashboard-widgets {
            grid-template-columns: 1fr;
        }
        
        .actions-title {
            font-size: 1.5rem;
        }
        
        .floating-clock {
            bottom: 20px;
            right: 15px;
            padding: 15px 20px;
            min-width: 180px;
        }
        
        .clock-time {
            font-size: 1.5rem;
        }
        
        .activity-item {
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }
        
        .activity-content {
            text-align: center;
        }
    }

    @media (max-width: 480px) {
        .admin-container {
            padding: 10px;
        }
        
        .dashboard-header,
        .dashboard-actions,
        .widget-modern {
            padding: 15px;
        }
        
        .stat-card-modern,
        .action-card-modern {
            padding: 20px;
        }
        
        .floating-clock {
            bottom: 15px;
            right: 10px;
            padding: 15px;
            min-width: 150px;
        }
        
        .clock-time {
            font-size: 1.4rem;
        }
        
        .welcome-section h1 {
            font-size: 2.2rem;
        }
    }

    /* ====== ENHANCED VISUAL EFFECTS ====== */
    .glass-effect {
        backdrop-filter: blur(20px);
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .neon-glow {
        box-shadow: 
            0 0 20px rgba(220, 38, 38, 0.3),
            0 0 40px rgba(220, 38, 38, 0.2),
            0 0 80px rgba(220, 38, 38, 0.1);
    }

    .particle-bg::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: 
            radial-gradient(2px 2px at 20px 30px, rgba(255, 255, 255, 0.3), transparent),
            radial-gradient(2px 2px at 40px 70px, rgba(220, 38, 38, 0.2), transparent),
            radial-gradient(1px 1px at 90px 40px, rgba(255, 255, 255, 0.2), transparent),
            radial-gradient(1px 1px at 130px 80px, rgba(127, 29, 29, 0.3), transparent);
        background-repeat: repeat;
        background-size: 150px 100px;
        animation: particleFloat 15s linear infinite;
        pointer-events: none;
    }

    @keyframes particleFloat {
        0% { transform: translateY(0px) translateX(0px); }
        33% { transform: translateY(-20px) translateX(10px); }
        66% { transform: translateY(-10px) translateX(-5px); }
        100% { transform: translateY(0px) translateX(0px); }
    }
</style>
@endpush

@section('content')
<!-- Floating Clock Widget -->
<div class="floating-clock">
    <div class="clock-time" id="currentTime">00:00:00</div>
    <div class="clock-date" id="currentDate">Loading...</div>
    <div class="clock-timezone">WIB</div>
</div>

<div class="admin-container">
    <!-- Modern Header -->
    <div class="dashboard-header">
        <div class="header-content">
            <div class="welcome-section">
                <h1>🏭 Dashboard Admin</h1>
                <p>Welcome to <strong>Tali Rejeki</strong> - Premium Industrial Insulation Distribution</p>
            </div>
            <div class="header-actions">
                <a href="{{ route('home') }}" class="btn-header" target="_blank">
                    <i class="fas fa-globe"></i>
                    <span>Visit Website</span>
                </a>
                <button class="btn-header" onclick="refreshDashboard()">
                    <i class="fas fa-sync-alt"></i>
                    <span>Refresh</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="dashboard-stats animate-in">
        <div class="stat-card-modern stat-products" onclick="navigateToProducts()">
            <div class="stat-header-modern">
                <div class="stat-icon-modern">
                    <i class="fas fa-cube"></i>
                </div>
                <div class="stat-trend-modern">
                    <i class="fas fa-arrow-up"></i>
                    +25%
                </div>
            </div>
            <h3 class="stat-number-modern" data-number="89">89</h3>
            <p class="stat-label-modern">Products</p>
            <span class="stat-subtitle-modern">Total catalog items</span>
            <div class="progress-bar">
                <div class="progress-fill" style="width: 75%;"></div>
            </div>
        </div>

        <div class="stat-card-modern stat-analytics" onclick="navigateToAnalytics()">
            <div class="stat-header-modern">
                <div class="stat-icon-modern">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stat-trend-modern">
                    <i class="fas fa-arrow-up"></i>
                    +35%
                </div>
            </div>
            <h3 class="stat-number-modern" data-number="1250">1,250</h3>
            <p class="stat-label-modern">Total Visitors</p>
            <span class="stat-subtitle-modern">Website analytics</span>
            <div class="progress-bar">
                <div class="progress-fill" style="width: 85%;"></div>
            </div>
        </div>

        <div class="stat-card-modern stat-sales" onclick="navigateToSales()">
            <div class="stat-header-modern">
                <div class="stat-icon-modern">
                    <i class="fas fa-shopping-bag"></i>
                </div>
                <div class="stat-trend-modern">
                    <i class="fas fa-arrow-up"></i>
                    +18%
                </div>
            </div>
            <h3 class="stat-number-modern" data-number="156">156</h3>
            <p class="stat-label-modern">Sales</p>
            <span class="stat-subtitle-modern">Monthly transactions</span>
            <div class="progress-bar">
                <div class="progress-fill" style="width: 65%;"></div>
            </div>
        </div>

        <div class="stat-card-modern stat-revenue" onclick="navigateToRevenue()">
            <div class="stat-header-modern">
                <div class="stat-icon-modern">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="stat-trend-modern">
                    <i class="fas fa-arrow-up"></i>
                    +42%
                </div>
            </div>
            <h3 class="stat-number-modern" data-number="125000000">125M</h3>
            <p class="stat-label-modern">Revenue</p>
            <span class="stat-subtitle-modern">Total earnings</span>
            <div class="progress-bar">
                <div class="progress-fill" style="width: 92%;"></div>
            </div>
        </div>
    </div>

    <!-- Action Cards -->
    <div class="dashboard-actions animate-in">
        <div class="actions-header">
            <h2 class="actions-title">
                <i class="fas fa-rocket"></i>
                Quick Actions
            </h2>
            <p class="actions-subtitle">Access essential management functions</p>
        </div>
        
        <div class="actions-grid">
            <a href="#" class="action-card-modern action-info" onclick="showProductModal()">
                <div class="action-icon-wrapper">
                    <i class="fas fa-cube"></i>
                </div>
                <h3 class="action-title">Product Catalog</h3>
                <p class="action-description">Manage product inventory and pricing with advanced filtering options</p>
                <div class="action-stats">
                    <span class="stat-badge">89 Items</span>
                    <span class="stat-badge">5 Categories</span>
                </div>
            </a>

            <a href="#" class="action-card-modern action-success" onclick="showAnalyticsModal()">
                <div class="action-icon-wrapper">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <h3 class="action-title">Analytics Dashboard</h3>
                <p class="action-description">View detailed reports and business insights with real-time data</p>
                <div class="action-stats">
                    <span class="stat-badge success">+35% Growth</span>
                    <span class="stat-badge success">Real-time</span>
                </div>
            </a>

            <a href="#" class="action-card-modern action-warning" onclick="showSettingsModal()">
                <div class="action-icon-wrapper">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3 class="action-title">System Settings</h3>
                <p class="action-description">Configure system preferences and security settings</p>
                <div class="action-stats">
                    <span class="stat-badge">Security</span>
                    <span class="stat-badge">Config</span>
                </div>
            </a>

            <a href="#" class="action-card-modern action-dark" onclick="showMediaModal()">
                <div class="action-icon-wrapper">
                    <i class="fas fa-images"></i>
                </div>
                <h3 class="action-title">Media Gallery</h3>
                <p class="action-description">Upload, organize and manage your media assets</p>
                <div class="action-stats">
                    <span class="stat-badge">Storage</span>
                    <span class="stat-badge">Upload</span>
                </div>
            </a>
        </div>
    </div>

    <!-- Widgets -->
    <div class="dashboard-widgets animate-in">
        <div class="widget-modern">
            <div class="widget-header">
                <div class="widget-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="widget-title">Performance Metrics</h3>
            </div>
            <div class="metric-content">
                <div class="metric-item">
                    <span class="metric-label">Server Uptime</span>
                    <span class="metric-value">99.8%</span>
                </div>
                <div class="metric-item">
                    <span class="metric-label">Response Time</span>
                    <span class="metric-value">0.3s</span>
                </div>
                <div class="metric-item">
                    <span class="metric-label">CPU Usage</span>
                    <span class="metric-value">45%</span>
                </div>
                <div class="metric-item">
                    <span class="metric-label">Memory Usage</span>
                    <span class="metric-value">67%</span>
                </div>
            </div>
        </div>

        <div class="widget-modern">
            <div class="widget-header">
                <div class="widget-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="widget-title">Security Status</h3>
            </div>
            <div class="security-content">
                <div class="security-status">
                    <i class="fas fa-check-circle"></i>
                    <span>All systems secure</span>
                </div>
                <div class="security-details">
                    <div class="security-detail">
                        <i class="fas fa-lock"></i>
                        <span>SSL Certificate Valid</span>
                    </div>
                    <div class="security-detail">
                        <i class="fas fa-user-shield"></i>
                        <span>User Access Protected</span>
                    </div>
                    <div class="security-detail">
                        <i class="fas fa-database"></i>
                        <span>Database Encrypted</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="dashboard-actions animate-in">
        <div class="actions-header">
            <h2 class="actions-title">
                <i class="fas fa-history"></i>
                Recent Activity
            </h2>
            <p class="actions-subtitle">Latest system activities and updates</p>
        </div>
        
        <div class="activity-list">
            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <div class="activity-content">
                    <h4>New user registration from Jakarta</h4>
                    <p>customer@example.com - 5 minutes ago</p>
                </div>
                <span class="activity-status pending">Pending</span>
            </div>
            
            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="activity-content">
                    <h4>Glasswool product inquiry from Surabaya</h4>
                    <p>High priority inquiry - 15 minutes ago</p>
                </div>
                <span class="activity-status urgent">Urgent</span>
            </div>
            
            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-box"></i>
                </div>
                <div class="activity-content">
                    <h4>New product added to catalog</h4>
                    <p>Glasswool Premium - 1 hour ago</p>
                </div>
                <span class="activity-status completed">Completed</span>
            </div>
            
            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="activity-content">
                    <h4>Website traffic increased 35%</h4>
                    <p>Monthly growth report - 2 hours ago</p>
                </div>
                <span class="activity-status completed">Completed</span>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
// ====== REAL-TIME CLOCK ======
function updateClock() {
    const now = new Date();
    const timeElement = document.getElementById('currentTime');
    const dateElement = document.getElementById('currentDate');
    
    // Format time
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');
    const timeString = `${hours}:${minutes}:${seconds}`;
    
    // Format date
    const options = { 
        weekday: 'long', 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric' 
    };
    const dateString = now.toLocaleDateString('id-ID', options);
    
    if (timeElement) timeElement.textContent = timeString;
    if (dateElement) dateElement.textContent = dateString;
}

// Update clock every second
setInterval(updateClock, 1000);
updateClock(); // Initial call

// ====== NAVIGATION FUNCTIONS ======
function navigateToProducts() {
    console.log('Navigating to Products...');
    // Add your navigation logic here
    showToast('Navigating to Products...', 'info');
}

function navigateToAnalytics() {
    console.log('Navigating to Analytics...');
    showToast('Navigating to Analytics...', 'info');
}

function navigateToSales() {
    console.log('Navigating to Sales...');
    showToast('Navigating to Sales...', 'info');
}

function navigateToRevenue() {
    console.log('Navigating to Revenue...');
    showToast('Navigating to Revenue...', 'info');
}

// ====== MODAL FUNCTIONS ======
function showProductModal() {
    showToast('Product Catalog feature coming soon!', 'info');
}

function showAnalyticsModal() {
    showToast('Analytics dashboard coming soon!', 'info');
}

function showSettingsModal() {
    showToast('System Settings coming soon!', 'info');
}

function showMediaModal() {
    showToast('Media Gallery coming soon!', 'info');
}

// ====== REFRESH DASHBOARD ======
function refreshDashboard() {
    showToast('Refreshing dashboard...', 'info');
    
    // Add loading animation to refresh button
    const refreshBtn = event.target.closest('.btn-header');
    const icon = refreshBtn.querySelector('i');
    
    icon.style.animation = 'rotate360 1s linear infinite';
    
    // Simulate refresh delay
    setTimeout(() => {
        icon.style.animation = '';
        showToast('Dashboard refreshed successfully!', 'success');
        
        // Optional: Reload the page or update data
        // location.reload();
    }, 2000);
}

// ====== TOAST NOTIFICATION SYSTEM ======
function showToast(message, type = 'info') {
    // Remove existing toasts
    const existingToasts = document.querySelectorAll('.toast-notification');
    existingToasts.forEach(toast => toast.remove());
    
    // Create toast element
    const toast = document.createElement('div');
    toast.className = `toast-notification toast-${type}`;
    toast.innerHTML = `
        <div class="toast-content">
            <i class="fas ${getToastIcon(type)}"></i>
            <span>${message}</span>
        </div>
        <button class="toast-close" onclick="this.parentElement.remove()">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    // Add styles
    toast.style.cssText = `
        position: fixed;
        top: 30px;
        right: 30px;
        background: white;
        border-radius: 15px;
        padding: 20px 25px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        border-left: 5px solid ${getToastColor(type)};
        z-index: 10000;
        min-width: 300px;
        transform: translateX(400px);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        backdrop-filter: blur(20px);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
    `;
    
    const toastContent = toast.querySelector('.toast-content');
    toastContent.style.cssText = `
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 600;
        color: #2d3748;
    `;
    
    const toastIcon = toast.querySelector('.toast-content i');
    toastIcon.style.cssText = `
        color: ${getToastColor(type)};
        font-size: 18px;
    `;
    
    const toastClose = toast.querySelector('.toast-close');
    toastClose.style.cssText = `
        background: none;
        border: none;
        cursor: pointer;
        color: #a0aec0;
        font-size: 14px;
        transition: color 0.3s ease;
        padding: 5px;
        border-radius: 50%;
    `;
    
    toastClose.addEventListener('mouseenter', function() {
        this.style.color = '#e53e3e';
        this.style.background = 'rgba(229, 62, 62, 0.1)';
    });
    
    toastClose.addEventListener('mouseleave', function() {
        this.style.color = '#a0aec0';
        this.style.background = 'none';
    });
    
    // Add to DOM
    document.body.appendChild(toast);
    
    // Animate in
    setTimeout(() => {
        toast.style.transform = 'translateX(0)';
    }, 100);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        if (toast.parentElement) {
            toast.style.transform = 'translateX(400px)';
            setTimeout(() => toast.remove(), 400);
        }
    }, 5000);
}

function getToastIcon(type) {
    const icons = {
        'success': 'fa-check-circle',
        'error': 'fa-exclamation-circle',
        'warning': 'fa-exclamation-triangle',
        'info': 'fa-info-circle'
    };
    return icons[type] || icons.info;
}

function getToastColor(type) {
    const colors = {
        'success': '#38a169',
        'error': '#e53e3e',
        'warning': '#d69e2e',
        'info': '#3182ce'
    };
    return colors[type] || colors.info;
}

// ====== ENHANCED ANIMATIONS ======
document.addEventListener('DOMContentLoaded', function() {
    // Animate elements on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, observerOptions);
    
    // Observe all animatable elements
    document.querySelectorAll('.stat-card-modern, .action-card-modern, .widget-modern, .activity-item').forEach(el => {
        observer.observe(el);
    });
    
    // Enhanced counter animation for statistics
    animateCounters();
});

// ====== COUNTER ANIMATION ======
function animateCounters() {
    const counters = document.querySelectorAll('.stat-number-modern');
    
    counters.forEach(counter => {
        const target = parseInt(counter.textContent.replace(/[^\d]/g, ''));
        const suffix = counter.textContent.replace(/[\d,]/g, '');
        let current = 0;
        const increment = target / 50;
        const duration = 2000; // 2 seconds
        const stepTime = duration / 50;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            
            let displayValue = Math.floor(current);
            
            // Format numbers
            if (displayValue >= 1000000) {
                displayValue = (displayValue / 1000000).toFixed(1) + 'M';
            } else if (displayValue >= 1000) {
                displayValue = (displayValue / 1000).toFixed(1) + 'K';
            } else {
                displayValue = displayValue.toLocaleString();
            }
            
            counter.textContent = displayValue + suffix;
        }, stepTime);
    });
}

// ====== KEYBOARD SHORTCUTS ======
document.addEventListener('keydown', function(e) {
    // Ctrl/Cmd + R to refresh dashboard
    if ((e.ctrlKey || e.metaKey) && e.key === 'r') {
        e.preventDefault();
        refreshDashboard();
    }
    
    // ESC to close any open modals/toasts
    if (e.key === 'Escape') {
        document.querySelectorAll('.toast-notification').forEach(toast => toast.remove());
    }
});

// ====== RESPONSIVE HANDLING ======
function handleResize() {
    if (window.innerWidth <= 768) {
        document.body.classList.remove('sidebar-open');
        document.body.classList.add('sidebar-closed');
    }
}

window.addEventListener('resize', handleResize);
handleResize(); // Initial call

// Welcome message
setTimeout(() => {
    showToast('Welcome to Tali Rejeki Dashboard! 🏭', 'success');
}, 1000);
</script>
@endpush