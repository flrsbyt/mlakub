<style>
    .header {
        position: fixed !important;
        top: 0 !important;
        left: 280px !important;
        right: 0 !important;
        height: 70px !important;
        background: white !important;
        border-bottom: 1px solid #e5e7eb !important;
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        padding: 0 32px !important;
        z-index: 1000 !important;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) !important;
    }

    .search-container {
        flex: 1;
        max-width: 500px;
        position: relative;
        margin-right: 24px;
    }

    .search-box {
        width: 100%;
        padding: 12px 16px 12px 40px;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        font-size: 14px;
        background-color: #f9fafb;
        outline: none;
        transition: all 0.2s ease;
    }

    .search-box:focus {
        border-color: #3b82f6;
        background-color: #ffffff;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        transform: scale(1.02);
    }

    .search-box::placeholder {
        color: #9ca3af;
    }

    .search-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #f59e0b;
        font-size: 16px;
    }

    .header-actions {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .icon-button {
        position: relative;
        background: none;
        border: none;
        padding: 10px;
        border-radius: 8px;
        cursor: pointer;
        color: #6b7280;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .icon-button:hover {
        background-color: #f3f4f6;
        color: #374151;
    }

    .notification-badge {
        position: absolute;
        top: 4px;
        right: 4px;
        background-color: #ef4444;
        color: white;
        font-size: 10px;
        font-weight: 600;
        min-width: 16px;
        height: 16px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 1;
    }

    .user-profile-link {
        text-decoration: none;
        color: inherit;
        border-radius: 8px;
        transition: all 0.2s ease;
    }

    .user-profile-link:hover {
        text-decoration: none;
        color: inherit;
    }

    .user-profile {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 10px 16px;
        border-radius: 10px;
        transition: all 0.2s ease;
        cursor: pointer;
    }

    .user-profile-link:hover .user-profile {
        background-color: #f3f4f6;
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .user-avatar {
        position: relative;
    }

    .avatar-circle {
        width: 42px;
        height: 42px;
        background: linear-gradient(135deg, #ff6b35, #f7931e);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 16px;
        border: 2px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 2px 8px rgba(255, 107, 53, 0.3);
    }

    .online-indicator {
        position: absolute;
        bottom: 2px;
        right: 2px;
        width: 10px;
        height: 10px;
        background-color: #10b981;
        border: 2px solid white;
        border-radius: 50%;
    }

    .user-info {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .user-name {
        font-weight: 600;
        font-size: 14px;
        color: #374151;
        margin-bottom: 2px;
    }

    .user-role {
        font-size: 12px;
        color: #6b7280;
        font-weight: 500;
    }


    /* Responsive design */
    @media (max-width: 768px) {
        .header {
            left: 0 !important;
            padding: 12px 16px !important;
            gap: 12px !important;
        }

        .search-container {
            max-width: 250px;
        }

        .user-info {
            display: none;
        }

        .header-actions {
            gap: 12px;
        }
    }

    @media (max-width: 480px) {
        .search-container {
            max-width: 180px;
        }

        .search-box {
            font-size: 13px;
            padding: 8px 12px 8px 32px;
        }

        .search-icon {
            left: 10px;
            font-size: 14px;
        }
    }
</style>

<header class="header">
    <div class="search-container">
        <input type="text" class="search-box" placeholder="Cari sesuatu...">
        <span class="search-icon">🔍</span>
    </div>
    
    <div class="header-actions">
        <a href="{{ route('admin.notifications') }}" class="icon-button" title="Notifikasi">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
            </svg>
            <span class="notification-badge">5</span>
        </a>
        
        <button class="icon-button" title="Pengaturan">
            <i class="fas fa-cog" style="font-size: 18px;"></i>
        </button>
        <!-- User Profile -->
        <a href="{{ route('admin.profile') }}" class="user-profile-link">
            <div class="user-profile">
                <div class="user-avatar">
                    @if(Auth::user()->profile_photo)
                        <img src="{{ asset('images/profile_photos/' . basename(Auth::user()->profile_photo)) }}" 
                             alt="Profile Photo" 
                             class="avatar-circle" 
                             style="width: 42px; height: 42px; object-fit: cover; border-radius: 50%;">
                    @else
                        <div class="avatar-circle">{{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}</div>
                    @endif
                    <div class="online-indicator"></div>
                </div>
                <div class="user-info">
                    <div class="user-name">{{ Auth::user()->name ?? 'Admin User' }}</div>
                    <div class="user-role">{{ strtoupper(Auth::user()->role ?? 'ADMIN') }}</div>
                </div>
            </div>
        </a>
    </div>
</header>

<script>
    // Fungsi pencarian
    const searchBox = document.querySelector('.search-box');
    searchBox.addEventListener('focus', function() {
        this.style.transform = 'scale(1.02)';
    });

    searchBox.addEventListener('blur', function() {
        this.style.transform = 'scale(1)';
    });

    // Fungsi notifikasi
    function showNotification() {
        alert('Anda memiliki 3 notifikasi baru!');
    }


    // Fungsi logout
    function logout() {
        if (confirm('Apakah Anda yakin ingin keluar?')) {
            // Redirect ke halaman logout atau panggil route logout
            window.location.href = '/logout';
        }
    }
</script>
