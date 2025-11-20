@extends('admin.layouts.app')

@section('title', 'Notifikasi')
@section('page-title', 'Notifikasi')
@section('page-subtitle', 'Kelola notifikasi dan peringatan sistem')

@section('content')
<style>
    .notification-panel {
        max-width: 100%;
        margin: 0 auto;
        background: white;
        border-radius: 16px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        overflow: hidden;
        border: 1px solid rgba(0,0,0,0.1);
    }

    .panel-header {
        padding: 1rem 1.5rem;
        background: linear-gradient(135deg, rgba(255,140,0,0.05), rgba(255,255,255,0.95));
        border-bottom: 1px solid #f1f5f9;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .panel-title {
        font-weight: 700;
        color: #1e293b;
        font-size: 1.1rem;
        margin: 0;
    }

    .panel-tabs {
        display: flex;
        padding: 0 1rem;
        background: #fafbfc;
        border-bottom: 1px solid #f1f5f9;
    }

    .panel-tab {
        flex: 1;
        padding: 0.75rem 0.5rem;
        text-align: center;
        background: none;
        border: none;
        cursor: pointer;
        font-size: 0.9rem;
        font-weight: 500;
        color: #64748b;
        transition: all 0.2s ease;
        position: relative;
    }

    .panel-tab:hover {
        color: #475569;
    }

    .panel-tab.active {
        color: #ff8c00;
        font-weight: 600;
    }

    .panel-tab.active::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 40%;
        height: 2px;
        background: linear-gradient(135deg, #ff8c00, #ff7700);
        border-radius: 2px 2px 0 0;
    }

    .panel-content {
        max-height: 500px;
        overflow-y: auto;
        padding: 0.5rem;
    }

    .notification-item {
        display: flex;
        gap: 12px;
        padding: 0.75rem 1rem;
        margin: 0.25rem 0.5rem;
        border-radius: 12px;
        transition: all 0.2s ease;
        cursor: pointer;
        border: 1px solid transparent;
        background: white;
    }

    .notification-item:hover {
        background-color: #f1f5f9;
        border-color: #cbd5e1;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }
    
    .notification-item.unread:hover {
        background-color: #ffedd5;  /* Slightly darker orange on hover for unread */
    }

    .notification-item.unread {
        background: #fff7ed;  /* Light orange background for unread */
        border-left: 1px solid #ffd8b3;  /* Lighter orange border */
        box-shadow: 0 2px 8px rgba(255, 140, 0, 0.1);
        position: relative;
    }

    .notification-item.read {
        background: #ffffff;
        border-left: 1px solid #e2e8f0;
        opacity: 0.8;
    }
    
    .notification-item.read .item-title {
        color: #64748b;  /* Muted color for read titles */
        font-weight: 500;
    }
    
    .notification-item.read .item-message {
        color: #94a3b8;  /* Even more muted for read messages */
    }

    .item-icon-wrapper {
        position: relative;
        flex-shrink: 0;
        width: 36px;
        height: 36px;
        border-radius: 8px;
        background: #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #64748b;
    }

    .item-icon {
        font-size: 1rem;
    }

    .item-icon.booking { color: #3b82f6; }
    .item-icon.payment { color: #10b981; }
    .item-icon.system { color: #8b5cf6; }
    .item-icon.alert { color: #f59e0b; }

    .unread-dot {
        position: absolute;
        top: -3px;
        right: -3px;
        width: 8px;
        height: 8px;
        background: #ef4444;
        border-radius: 50%;
        border: 2px solid white;
    }

    .item-content {
        flex: 1;
        min-width: 0;
    }

    .item-title {
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 0.2rem;
        font-size: 0.85rem;
        line-height: 1.3;
        transition: color 0.2s ease;
    }

    .item-message {
        font-size: 0.8rem;
        color: #64748b;
        line-height: 1.4;
        margin-bottom: 0.4rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .item-meta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 0.7rem;
        color: #94a3b8;
    }

    .item-time {
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    .item-status {
        font-size: 0.65rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 0.15rem 0.5rem;
        border-radius: 4px;
    }

    .status-new {
        background: #fffbeb;
        color: #d97706;
    }

    .status-read {
        color: #94a3b8;
    }

    .panel-footer {
        padding: 1.5rem;
        background: #fafbfc;
        border-top: 1px solid #f1f5f9;
        display: flex;
        gap: 0.75rem;
    }

    .footer-btn {
        flex: 1;
        padding: 12px 16px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-secondary {
        background: white;
        color: #64748b;
        border: 2px solid #e2e8f0;
    }

    .btn-secondary:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
        transform: translateY(-1px);
    }

    .btn-primary {
        background: linear-gradient(135deg, #ff8c00, #ff7700);
        color: white;
        border: none;
        box-shadow: 0 4px 16px rgba(255,140,0,0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(255,140,0,0.4);
    }

    .empty-state {
        text-align: center;
        padding: 3rem 2rem;
        color: #64748b;
    }

    .empty-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 1.5rem;
        background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #94a3b8;
    }

    .empty-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0.5rem;
    }

    .empty-message {
        font-size: 0.9rem;
        line-height: 1.5;
    }

    /* Custom scrollbar */
    .panel-content::-webkit-scrollbar {
        width: 6px;
    }

    .panel-content::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 3px;
    }

    .panel-content::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #ff8c00, #ff7700);
        border-radius: 3px;
    }

    .panel-content::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #e07600, #e06600);
    }

    /* Animations */
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .notification-item {
        animation: slideIn 0.3s ease;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .panel-footer {
            flex-direction: column;
        }
        
        .footer-btn {
            width: 100%;
        }
    }
</style>

<div class="notification-panel">
    <div class="panel-header">
        <h1 class="panel-title">Notifikasi</h1>
    </div>
    
    <div class="panel-tabs">
        <button class="panel-tab active" data-tab="all">Semua</button>
        <button class="panel-tab" data-tab="unread">Belum Dibaca</button>
        <button class="panel-tab" data-tab="read">Sudah Dibaca</button>
    </div>
    
    <div class="panel-content" id="notificationContent">
        @if($notifications->count() > 0)
            @foreach($notifications as $notification)
                <div class="notification-item {{ !$notification->is_read ? 'unread' : 'read' }}" data-id="{{ $notification->id }}">
                    <div class="item-icon {{ $notification->type }}">
                        @if($notification->icon)
                            <i class="{{ $notification->icon }}"></i>
                        @else
                            <i class="fas fa-bell"></i>
                        @endif
                        @if(!$notification->is_read)
                            <div class="unread-dot"></div>
                        @endif
                    </div>
                    <div class="item-content">
                        <div class="item-title">{{ $notification->title }}</div>
                        <div class="item-message">{{ $notification->message }}</div>
                        <div class="item-meta">
                            <div class="item-time">
                                <i class="fas fa-clock"></i>
                                {{ $notification->created_at->diffForHumans() }}
                            </div>
                            <div class="item-status {{ !$notification->is_read ? 'status-new' : 'status-read' }}">
                                {{ !$notification->is_read ? 'Baru' : 'Dibaca' }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-bell-slash"></i>
                </div>
                <div class="empty-title">Tidak Ada Notifikasi</div>
                <div class="empty-message">Belum ada notifikasi baru untuk saat ini.</div>
            </div>
        @endif
    </div>
    
    <div class="panel-footer">
        <button class="footer-btn btn-secondary" id="markAllRead" style="width: 100%;">
            <i class="fas fa-check"></i>
            Tandai Sudah Dibaca Semua
        </button>
    </div>
</div>

<script>
    const notifications = [
        {
            id: 1,
            type: 'booking',
            title: 'Booking Baru - Bromo Sunrise',
            message: 'Andi Wijaya melakukan booking untuk paket Bromo Sunrise tanggal 25 September 2025. Total: Rp 450.000',
            time: '2 menit',
            unread: true,
            important: true
        },
        {
            id: 2,
            type: 'alert',
            title: 'Peringatan Cuaca',
            message: 'Hujan diprediksi di area Bromo besok pagi. Koordinasi dengan guide untuk antisipasi.',
            time: '2 jam',
            unread: true,
            important: true
        },
        {
            id: 3,
            type: 'payment',
            title: 'Pembayaran Pending',
            message: 'Pembayaran untuk booking #BR2025-0917-012 masih pending. Batas waktu: 2 jam lagi.',
            time: '1 hari',
            unread: false,
            important: true
        },
        {
            id: 4,
            type: 'booking',
            title: 'Review Baru - 5 Bintang',
            message: 'Sari Indah memberikan rating 5 bintang untuk paket Adventure Malang. "Tour guide sangat ramah dan profesional!"',
            time: '3 jam',
            unread: true,
            important: false
        },
        {
            id: 5,
            type: 'payment',
            title: 'Pembayaran Diterima',
            message: 'Pembayaran untuk booking #BR2025-0918-001 telah dikonfirmasi. Status: Lunas',
            time: '4 jam',
            unread: true,
            important: false
        },
        {
            id: 6,
            type: 'system',
            title: 'Update Sistem',
            message: 'Sistem pembayaran telah diperbarui. Fitur auto-konfirmasi pembayaran kini aktif.',
            time: '5 jam',
            unread: false,
            important: false
        },
        {
            id: 7,
            type: 'booking',
            title: 'Pembatalan Booking',
            message: 'Booking #BR2025-0918-003 untuk paket Tumpak Sewu telah dibatalkan oleh customer. Refund sedang diproses.',
            time: '1 hari',
            unread: false,
            important: true
        }
    ];

    let currentTab = 'all';

    function getIconByType(type) {
        const icons = {
            'booking': 'calendar-alt',
            'payment': 'credit-card',
            'system': 'cog',
            'alert': 'exclamation-triangle'
        };
        return icons[type] || 'bell';
    }

    function renderNotifications(filter = 'all') {
        const container = document.getElementById('notificationContent');
        let filteredNotifications = [];

        if (filter === 'unread') {
            filteredNotifications = notifications.filter(n => n.unread);
        } else if (filter === 'read') {
            filteredNotifications = notifications.filter(n => !n.unread);
        } else {
            filteredNotifications = [...notifications];
        }

        if (filteredNotifications.length === 0) {
            container.innerHTML = `
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-bell-slash"></i>
                    </div>
                    <div class="empty-title">Tidak ada notifikasi</div>
                    <div class="empty-message">Belum ada notifikasi ${filter === 'unread' ? 'yang belum dibaca' : ''} untuk saat ini</div>
                </div>
            `;
            return;
        }

        container.innerHTML = filteredNotifications.map((notification, index) => `
            <div class="notification-item ${notification.unread ? 'unread' : 'read'}" data-id="${notification.id}" style="animation-delay: ${index * 0.1}s">
                <div class="item-icon-wrapper">
                    <div class="item-icon ${notification.type}">
                        <i class="fas fa-${getIconByType(notification.type)}"></i>
                    </div>
                    ${notification.unread ? '<div class="unread-dot"></div>' : ''}
                </div>
                <div class="item-content">
                    <div class="item-title">${notification.title}</div>
                    <div class="item-message">${notification.message}</div>
                    <div class="item-meta">
                        <div class="item-time">
                            <i class="fas fa-clock"></i>
                            ${notification.time} lalu
                        </div>
                        <div class="item-status ${notification.unread ? 'status-new' : 'status-read'}">
                            ${notification.unread ? 'Baru' : 'Dibaca'}
                        </div>
                    </div>
                </div>
            </div>
        `).join('');
    }

    function updateBadge() {
        const unreadCount = notifications.filter(n => n.unread).length;
        const badge = document.getElementById('unreadBadge');
        
        if (unreadCount > 0) {
            badge.textContent = `${unreadCount} baru`;
            badge.style.display = 'block';
        } else {
            badge.textContent = 'Semua dibaca';
        }
    }

    // Tab switching
    document.querySelectorAll('.panel-tab').forEach(tab => {
        tab.addEventListener('click', () => {
            document.querySelectorAll('.panel-tab').forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            currentTab = tab.dataset.tab;
            renderNotifications(currentTab);
        });
    });

    // Mark notification as read
    document.addEventListener('click', (e) => {
        if (e.target.closest('.notification-item')) {
            const item = e.target.closest('.notification-item');
            const id = parseInt(item.dataset.id);
            const notification = notifications.find(n => n.id === id);
            
            if (notification && notification.unread) {
                notification.unread = false;
                renderNotifications(currentTab);
                updateBadge();
            }
        }
    });

    // Mark all as read
    document.getElementById('markAllRead').addEventListener('click', () => {
        notifications.forEach(n => n.unread = false);
        renderNotifications(currentTab);
        updateBadge();
    });


    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
        renderNotifications();
        updateBadge();
    });
</script>
@endsection
