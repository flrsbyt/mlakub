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
        background-color: #ffedd5;
    }

    .notification-item.unread {
        background: #fff7ed;
        border-left: 3px solid #ff8c00;
        box-shadow: 0 2px 8px rgba(255, 140, 0, 0.1);
        position: relative;
    }

    .notification-item.read {
        background: #ffffff;
        border-left: 1px solid #e2e8f0;
        opacity: 0.8;
    }
    
    .notification-item.read .item-title {
        color: #64748b;
        font-weight: 500;
    }
    
    .notification-item.read .item-message {
        color: #94a3b8;
    }

    .item-icon-wrapper {
        position: relative;
        flex-shrink: 0;
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .item-icon {
        font-size: 1.1rem;
    }

    .bg-green-100 { background-color: #dcfce7; }
    .text-green-600 { color: #16a34a; }
    .bg-red-100 { background-color: #fee2e2; }
    .text-red-600 { color: #dc2626; }
    .bg-yellow-100 { background-color: #fef3c7; }
    .text-yellow-600 { color: #ca8a04; }
    .bg-blue-100 { background-color: #dbeafe; }
    .text-blue-600 { color: #2563eb; }
    .bg-gray-100 { background-color: #f3f4f6; }
    .text-gray-600 { color: #4b5563; }

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
        font-size: 0.9rem;
        line-height: 1.3;
        transition: color 0.2s ease;
    }

    .item-message {
        font-size: 0.85rem;
        color: #64748b;
        line-height: 1.4;
        margin-bottom: 0.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .item-meta {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 0.75rem;
        color: #94a3b8;
    }

    .item-time {
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    .item-id {
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    .item-actions {
        display: flex;
        gap: 0.5rem;
        margin-top: 0.75rem;
    }

    .action-btn {
        padding: 0.4rem 0.9rem;
        font-size: 0.8rem;
        font-weight: 500;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
    }

    .btn-mark-read {
        background: #ff8c00;
        color: white;
    }

    .btn-mark-read:hover {
        background: #e07a00;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(255, 140, 0, 0.3);
    }

    .btn-view {
        background: #3b82f6;
        color: white;
    }

    .btn-view:hover {
        background: #2563eb;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }

    .panel-footer {
        padding: 1.25rem 1.5rem;
        background: #fafbfc;
        border-top: 1px solid #f1f5f9;
    }

    .footer-btn {
        width: 100%;
        padding: 12px 20px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: linear-gradient(135deg, #ff8c00, #ff7700);
        color: white;
        border: none;
        box-shadow: 0 4px 16px rgba(255,140,0,0.3);
    }

    .footer-btn:hover {
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
        font-size: 2rem;
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

    /* Pagination */
    .pagination-wrapper {
        padding: 1rem 1.5rem;
        border-top: 1px solid #f1f5f9;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .panel-header {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }
        
        .item-actions {
            flex-direction: column;
        }
        
        .action-btn {
            width: 100%;
            justify-content: center;
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
        @forelse($notifications as $notification)
            @php
                $data = is_string($notification->data) ? json_decode($notification->data, true) : $notification->data;
                $icon = $notification->icon ?? 'fas fa-bell';
                $color = match($notification->color ?? 'primary') {
                    'success' => 'bg-green-100 text-green-600',
                    'danger' => 'bg-red-100 text-red-600',
                    'warning' => 'bg-yellow-100 text-yellow-600',
                    'info' => 'bg-blue-100 text-blue-600',
                    default => 'bg-gray-100 text-gray-600'
                };
            @endphp
            
            <div class="notification-item {{ $notification->is_read ? 'read' : 'unread' }}" data-id="{{ $notification->id }}" data-read="{{ $notification->is_read ? '1' : '0' }}">
                <div class="item-icon-wrapper {{ $color }}">
                    <i class="{{ $icon }} item-icon"></i>
                    @if(!$notification->is_read)
                        <div class="unread-dot"></div>
                    @endif
                </div>
                <div class="item-content">
                    <div class="item-title">{{ $notification->title }}</div>
                    <div class="item-message">{{ $notification->message }}</div>
                    <div class="item-meta">
                        <div class="item-time">
                            <i class="far fa-clock"></i>
                            {{ $notification->created_at->diffForHumans() }}
                        </div>
                        @if(isset($data['testimoni_id']))
                        <div class="item-id">
                            <i class="fas fa-hashtag"></i>
                            ID: {{ $data['testimoni_id'] }}
                        </div>
                        @endif
                    </div>
                    
                    <div class="item-actions">
                        @if(!$notification->is_read)
                        <form action="{{ route('admin.notifications.mark', $notification->id) }}" method="POST" class="mark-as-read-form" style="display: inline;">
                            @csrf
                            <button type="submit" class="action-btn btn-mark-read">
                                <i class="fas fa-check"></i>
                                Tandai Dibaca
                            </button>
                        </form>
                        @endif
                        
                        @if(isset($data['url']))
                        <a href="{{ $data['url'] }}" class="action-btn btn-view" target="_blank">
                            <i class="fas fa-eye"></i>
                            Lihat
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-bell-slash"></i>
                </div>
                <div class="empty-title">Tidak Ada Notifikasi</div>
                <div class="empty-message">Belum ada notifikasi untuk saat ini. Semua notifikasi yang Anda terima akan muncul di sini.</div>
            </div>
        @endforelse
    </div>
    
    @if($notifications->hasPages())
    <div class="pagination-wrapper">
        {{ $notifications->links() }}
    </div>
    @endif
    
    <div class="panel-footer">
        <form action="{{ route('admin.notifications.markAllRead') }}" method="POST" id="markAllReadForm">
            @csrf
            <button type="submit" class="footer-btn">
                <i class="fas fa-check-double"></i>
                Tandai Semua Sudah Dibaca
            </button>
        </form>
    </div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize toastr
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000"
        };

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        // Tab switching
        document.querySelectorAll('.panel-tab').forEach(tab => {
            tab.addEventListener('click', () => {
                document.querySelectorAll('.panel-tab').forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                
                const filter = tab.dataset.tab;
                const items = document.querySelectorAll('.notification-item');
                
                items.forEach(item => {
                    const isRead = item.dataset.read === '1';
                    
                    if (filter === 'all') {
                        item.style.display = 'flex';
                    } else if (filter === 'unread' && !isRead) {
                        item.style.display = 'flex';
                    } else if (filter === 'read' && isRead) {
                        item.style.display = 'flex';
                    } else {
                        item.style.display = 'none';
                    }
                });
                
                // Check if empty
                const visibleItems = Array.from(items).filter(item => item.style.display !== 'none');
                const content = document.getElementById('notificationContent');
                
                if (visibleItems.length === 0 && !content.querySelector('.empty-state')) {
                    content.innerHTML = `
                        <div class="empty-state">
                            <div class="empty-icon">
                                <i class="fas fa-bell-slash"></i>
                            </div>
                            <div class="empty-title">Tidak ada notifikasi</div>
                            <div class="empty-message">Belum ada notifikasi ${filter === 'unread' ? 'yang belum dibaca' : filter === 'read' ? 'yang sudah dibaca' : ''} untuk saat ini</div>
                        </div>
                    `;
                }
            });
        });

        // Handle mark all as read
        const markAllForm = document.getElementById('markAllReadForm');
        
        if (markAllForm) {
            markAllForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const form = this;
                
                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({})
                })
                .then(response => response.json())
                .then(data => {
                    if (data && data.success) {
                        // Update UI
                        document.querySelectorAll('.notification-item.unread').forEach(item => {
                            item.classList.remove('unread');
                            item.classList.add('read');
                            item.dataset.read = '1';
                            
                            const unreadDot = item.querySelector('.unread-dot');
                            if (unreadDot) unreadDot.remove();
                            
                            const markForm = item.querySelector('.mark-as-read-form');
                            if (markForm) markForm.remove();
                            
                            const title = item.querySelector('.item-title');
                            if (title) title.style.color = '#64748b';
                            
                            const message = item.querySelector('.item-message');
                            if (message) message.style.color = '#94a3b8';
                        });
                        
                        toastr.success('Semua notifikasi telah ditandai sebagai sudah dibaca');
                    } else {
                        throw new Error(data?.message || 'Gagal memperbarui notifikasi');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    toastr.error(error.message || 'Terjadi kesalahan saat memperbarui notifikasi');
                });
            });
        }

        // Handle mark single as read
        document.querySelectorAll('.mark-as-read-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const form = this;
                const notificationItem = form.closest('.notification-item');
                
                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({})
                })
                .then(response => response.json())
                .then(data => {
                    if (data && data.success) {
                        // Update UI
                        notificationItem.classList.remove('unread');
                        notificationItem.classList.add('read');
                        notificationItem.dataset.read = '1';
                        
                        const unreadDot = notificationItem.querySelector('.unread-dot');
                        if (unreadDot) unreadDot.remove();
                        
                        form.remove();
                        
                        const title = notificationItem.querySelector('.item-title');
                        if (title) title.style.color = '#64748b';
                        
                        const message = notificationItem.querySelector('.item-message');
                        if (message) message.style.color = '#94a3b8';
                        
                        toastr.success('Notifikasi telah ditandai sebagai sudah dibaca');
                    } else {
                        throw new Error(data?.message || 'Gagal memperbarui notifikasi');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    toastr.error(error.message || 'Terjadi kesalahan saat memperbarui notifikasi');
                });
            });
        });
    });
</script>
@endpush
@endsection