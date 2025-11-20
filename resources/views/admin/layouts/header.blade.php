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

    /* Search Suggestions */
    .search-suggestions {
        position: absolute;
        top: 44px;
        left: 0;
        right: 0;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        box-shadow: 0 12px 24px rgba(0,0,0,0.08);
        overflow: hidden;
        z-index: 1100;
        display: none;
        max-height: 320px;
        overflow-y: auto;
    }

    .search-suggestions.show { display: block; }

    .search-suggestion-item {
        padding: 10px 14px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        color: #374151;
        cursor: pointer;
        transition: background 0.15s ease;
    }

    .search-suggestion-item:hover,
    .search-suggestion-item.active { background: #f9fafb; }

    .search-suggestion-icon { width: 18px; text-align: center; color: #f59e0b; }
    .search-suggestion-item.empty { color: #9ca3af; cursor: default; }

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
        top: -2px;
        right: -2px;
        background-color: #ef4444;
        color: white;
        font-size: 10px;
        font-weight: 600;
        min-width: 18px;
        height: 18px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 1;
        z-index: 1000;
        border: 2px solid white;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }

    /* Dropdown Notifikasi */
    .notification-dropdown {
        position: absolute;
        top: 60px;
        right: 0;
        width: 380px;
        max-height: 500px;
        background: white;
        border-radius: 16px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        border: 1px solid rgba(255,255,255,0.2);
        overflow: hidden;
        z-index: 1001;
        transform: translateY(-10px);
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }

    .notification-dropdown.show {
        transform: translateY(0);
        opacity: 1;
        visibility: visible;
    }

    .dropdown-header {
        padding: 1rem 1.5rem;
        background: linear-gradient(135deg, rgba(255,140,0,0.05), rgba(255,255,255,0.95));
        border-bottom: 1px solid #f1f5f9;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .dropdown-title {
        font-weight: 700;
        color: #1e293b;
        font-size: 1.1rem;
    }

    .dropdown-badge {
        background: linear-gradient(135deg, #ff8c00, #ff7700);
        color: white;
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 600;
        box-shadow: 0 2px 6px rgba(255,140,0,0.3);
    }

    .dropdown-tabs {
        display: flex;
        padding: 0 1rem;
        background: #fafbfc;
        border-bottom: 1px solid #f1f5f9;
    }

    .dropdown-tab {
        flex: 1;
        padding: 0.75rem 0.5rem;
        text-align: center;
        background: none;
        border: none;
        cursor: pointer;
        font-size: 0.85rem;
        font-weight: 600;
        color: #64748b;
        transition: all 0.3s ease;
        position: relative;
    }

    .dropdown-tab.active {
        color: #ff8c00;
    }

    .dropdown-tab.active::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 50%;
        transform: translateX(-50%);
        width: 60%;
        height: 3px;
        background: linear-gradient(135deg, #ff8c00, #ff7700);
        border-radius: 3px 3px 0 0;
    }

    .dropdown-content {
        max-height: 300px;
        overflow-y: auto;
        padding: 0.5rem;
    }

    .dropdown-content::-webkit-scrollbar {
        width: 4px;
    }

    .dropdown-content::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 2px;
    }

    .dropdown-content::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #ff8c00, #ff7700);
        border-radius: 2px;
    }

    .dropdown-footer {
        padding: 1rem 1.5rem;
        background: #fafbfc;
        border-top: 1px solid #f1f5f9;
        display: flex;
        gap: 0.5rem;
    }

    .dropdown-btn {
        flex: 1;
        padding: 8px 12px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.8rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        text-decoration: none;
        border: none;
    }

    .dropdown-btn.secondary {
        background: white;
        color: #64748b;
        border: 1px solid #e2e8f0;
    }

    .dropdown-btn.secondary:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
        transform: translateY(-1px);
    }

    .dropdown-btn.primary {
        background: linear-gradient(135deg, #ff8c00, #ff7700);
        color: white;
        box-shadow: 0 2px 8px rgba(255,140,0,0.3);
    }

    .dropdown-btn.primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(255,140,0,0.4);
        text-decoration: none;
        color: white;
    }

    .empty-dropdown {
        text-align: center;
        padding: 2rem 1rem;
        color: #64748b;
    }

    .empty-dropdown-icon {
        width: 60px;
        height: 60px;
        margin: 0 auto 1rem;
        background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #94a3b8;
        font-size: 1.5rem;
    }

    .empty-dropdown-title {
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0.25rem;
    }

    .empty-dropdown-message {
        font-size: 0.8rem;
        color: #64748b;
    }

    /* Item Notifikasi di Dropdown */
    .notification-item {
        display: flex;
        align-items: flex-start;
        padding: 1rem;
        border-radius: 12px;
        transition: all 0.3s ease;
        cursor: pointer;
        margin-bottom: 0.5rem;
    }

    .notification-item:hover {
        background: #f8fafc;
        transform: translateX(4px);
    }

    .notification-item.unread {
        background: linear-gradient(135deg, rgba(255,140,0,0.08), rgba(255,140,0,0.03));
        border: 1px solid rgba(255,140,0,0.15);
    }

    .notification-item.unread:hover {
        background: linear-gradient(135deg, rgba(255,140,0,0.12), rgba(255,140,0,0.06));
    }

    .item-icon {
        position: relative;
        margin-right: 1rem;
        width: 40px;
        height: 40px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .item-icon.system {
        background: linear-gradient(135deg, #f3e8ff, #e9d5ff);
        color: #7c3aed;
    }

    .item-icon.booking {
        background: linear-gradient(135deg, #dcfce7, #bbf7d0);
        color: #16a34a;
    }

    .item-icon.payment {
        background: linear-gradient(135deg, #dbeafe, #bfdbfe);
        color: #2563eb;
    }

    .item-icon.alert {
        background: linear-gradient(135deg, #fee2e2, #fecaca);
        color: #dc2626;
    }

    .unread-dot {
        position: absolute;
        top: -2px;
        right: -2px;
        width: 10px;
        height: 10px;
        background: linear-gradient(135deg, #ff8c00, #ff7700);
        border-radius: 50%;
        border: 2px solid white;
        box-shadow: 0 2px 6px rgba(255,140,0,0.4);
    }

    .item-content {
        flex: 1;
        min-width: 0;
    }

    .item-title {
        font-weight: 700;
        font-size: 0.9rem;
        color: #1e293b;
        margin-bottom: 0.25rem;
        line-height: 1.3;
    }

    .item-message {
        font-size: 0.8rem;
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
        justify-content: space-between;
        align-items: center;
    }

    .item-time {
        display: flex;
        align-items: center;
        gap: 4px;
        font-size: 0.75rem;
        color: #94a3b8;
    }

    .item-status {
        padding: 2px 8px;
        border-radius: 8px;
        font-size: 0.7rem;
        font-weight: 600;
    }

    .status-new {
        background: linear-gradient(135deg, #ff8c00, #ff7700);
        color: white;
        box-shadow: 0 2px 6px rgba(255,140,0,0.3);
    }

    .status-read {
        background: #f1f5f9;
        color: #94a3b8;
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
        <div id="adminSearchSuggestions" class="search-suggestions"></div>
    </div>
    
    <div class="header-actions">
        <button class="icon-button notification-trigger" title="Notifikasi" onclick="toggleNotificationDropdown()">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
            </svg>
            <span class="notification-badge" id="notificationCount">{{ Auth::user()->notifications()->where('is_read', false)->count() }}</span>
        </button>
        
        <!-- Dropdown Notifikasi -->
        <div class="notification-dropdown" id="notificationDropdown">
            <div class="dropdown-header">
                <div class="dropdown-title">Notifikasi</div>
                <div class="dropdown-badge" id="dropdownUnreadCount">{{ Auth::user()->notifications()->where('is_read', false)->count() }} baru</div>
            </div>
            
            <div class="dropdown-tabs">
                <button class="dropdown-tab active" data-tab="all">Semua</button>
                <button class="dropdown-tab" data-tab="unread">Belum Dibaca</button>
            </div>
            
            <div class="dropdown-content" id="dropdownContent">
                <!-- Konten akan diisi via JavaScript -->
            </div>
            
            <div class="dropdown-footer">
                <button class="dropdown-btn secondary" onclick="markAllReadDropdown()">
                    <i class="fas fa-check"></i>
                    Baca Semua
                </button>
                <a href="{{ route('admin.notifications') }}" class="dropdown-btn primary">
                    <i class="fas fa-external-link-alt"></i>
                    Lihat Semua
                </a>
            </div>
        </div>
        
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
    const suggestionsEl = document.getElementById('adminSearchSuggestions');
    let menuIndex = [];
    let activeIndex = -1;

    searchBox.addEventListener('focus', function() {
        this.style.transform = 'scale(1.02)';
        if (this.value) searchMenu(this.value);
    });

    searchBox.addEventListener('blur', function() {
        this.style.transform = 'scale(1)';
        setTimeout(()=>{ suggestionsEl.classList.remove('show'); suggestionsEl.innerHTML=''; }, 120);
    });

    function buildMenuIndex() {
        const items = document.querySelectorAll('#sidebar .menu-item');
        const sidebarIndex = Array.from(items).map(el => ({
            el,
            text: (el.textContent || '').trim().toLowerCase(),
            href: el.getAttribute('href') || '#'
        }));
        const extraIndex = [
            { text: 'dashboard', href: '{{ route('admin.dashboard') }}' },
            { text: 'paket trip', href: '{{ route('admin.paket-trip') }}' },
            { text: 'pemesanan', href: '{{ route('admin.pesan-paket') }}' },
            { text: 'pilihan paket', href: '{{ route('admin.pilihan-paket') }}' },
            { text: 'galeri', href: '{{ route('admin.galery.admin') }}' },
            { text: 'cara pemesanan', href: '{{ route('admin.cara-pemesanan') }}' },
            { text: 'kontak', href: '{{ route('admin.kontak') }}' },
            { text: 'users', href: '{{ route('admin.users.index') }}' },
            { text: 'tambah user', href: '{{ route('admin.users.create') }}' },
            { text: 'notifikasi', href: '{{ route('admin.notifications') }}' },
            { text: 'profile', href: '{{ route('admin.profile') }}' }
        ];
        const map = new Map();
        [...sidebarIndex, ...extraIndex].forEach(it => { if (it.href && !map.has(it.href)) map.set(it.href, it); });
        menuIndex = Array.from(map.values());
    }

    function renderSuggestions(list) {
        if (!list.length) {
            suggestionsEl.innerHTML = `
                <div class="search-suggestion-item empty">
                    <span class="search-suggestion-icon">🙅‍♂️</span>
                    <span>Tidak tersedia</span>
                </div>
            `;
            suggestionsEl.classList.add('show');
            activeIndex = -1;
            return;
        }
        suggestionsEl.innerHTML = list.map((it, i) => `
            <div class="search-suggestion-item ${i===activeIndex?'active':''}" data-index="${i}" data-href="${it.href}">
                <span class="search-suggestion-icon">${getIconForText(it.text)}</span>
                <span>${escapeHtml(capitalizeWords(it.text))}</span>
            </div>
        `).join('');
        suggestionsEl.classList.add('show');
    }

    function searchMenu(q) {
        if (!menuIndex.length) buildMenuIndex();
        const query = (q||'').trim().toLowerCase();
        if (!query) { renderSuggestions([]); resetSidebarFilter(); return; }
        const results = menuIndex
            .map(it => ({ it, score: scoreMatch(it.text, query) }))
            .filter(x => x.score > 0)
            .sort((a,b) => b.score - a.score)
            .slice(0, 8)
            .map(x => x.it);
        activeIndex = results.length ? 0 : -1;
        renderSuggestions(results);
        applySidebarFilter(query);
    }

    function navigateToActive() {
        const active = suggestionsEl.querySelector('.search-suggestion-item.active');
        if (active) {
            const href = active.getAttribute('data-href');
            if (href) window.location.href = href;
        }
    }

    function moveActive(delta) {
        const items = suggestionsEl.querySelectorAll('.search-suggestion-item');
        if (!items.length) return;
        activeIndex = (activeIndex + delta + items.length) % items.length;
        items.forEach((el, i) => el.classList.toggle('active', i === activeIndex));
    }

    function scoreMatch(text, query) {
        if (text.includes(query)) return 2 + (text.startsWith(query) ? 1 : 0);
        const words = text.split(/\s+/);
        if (words.some(w => w.startsWith(query))) return 1.5;
        return 0;
    }

    function getIconForText(text) {
        if (text.includes('dashboard')) return '📊';
        if (text.includes('paket')) return '📦';
        if (text.includes('pesan') || text.includes('order')) return '🛒';
        if (text.includes('galeri') || text.includes('gambar')) return '🖼️';
        if (text.includes('cara') || text.includes('panduan')) return '📝';
        if (text.includes('kontak')) return '☎️';
        if (text.includes('profile') || text.includes('profil')) return '👤';
        return '🔎';
    }

    function escapeHtml(s){ return s.replace(/[&<>"']/g, c=>({"&":"&amp;","<":"&lt;",
        ">":"&gt;","\"":"&quot;","'":"&#39;"}[c])); }
    function capitalizeWords(s){ return s.replace(/\b\w/g, c=>c.toUpperCase()); }

    // ===== Sidebar Filter/Highlight =====
    function applySidebarFilter(query){
        const items = document.querySelectorAll('#sidebar .menu-item');
        items.forEach(link => {
            const labelEl = link.querySelector('.menu-item-content');
            const rawText = (labelEl ? labelEl.textContent : link.textContent) || '';
            const text = rawText.trim();
            const lower = text.toLowerCase();
            const match = lower.includes(query);
            // Toggle visibility
            link.style.display = match ? '' : 'none';
            // Highlight
            if (labelEl){
                labelEl.setAttribute('data-original', labelEl.getAttribute('data-original') || labelEl.innerHTML);
                if (match){
                    labelEl.innerHTML = highlightSidebar(labelEl.getAttribute('data-original'), query);
                } else {
                    labelEl.innerHTML = labelEl.getAttribute('data-original');
                }
            }
        });
        // Pastikan judul section tetap terlihat
        const titles = document.querySelectorAll('#sidebar .menu-title');
        titles.forEach(t => t.style.display = '');
    }

    function resetSidebarFilter(){
        const items = document.querySelectorAll('#sidebar .menu-item');
        items.forEach(link => {
            link.style.display = '';
            const labelEl = link.querySelector('.menu-item-content');
            if (labelEl && labelEl.getAttribute('data-original')){
                labelEl.innerHTML = labelEl.getAttribute('data-original');
            }
        });
        const titles = document.querySelectorAll('#sidebar .menu-title');
        titles.forEach(t => t.style.display = '');
    }

    function highlightSidebar(html, query){
        // Strip tags for matching, but we only wrap text occurrences in a safe way
        const temp = document.createElement('div');
        temp.innerHTML = html;
        const walker = document.createTreeWalker(temp, NodeFilter.SHOW_TEXT, null, false);
        const re = new RegExp(query.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'), 'ig');
        const nodes = [];
        while (walker.nextNode()) nodes.push(walker.currentNode);
        nodes.forEach(node => {
            if (re.test(node.nodeValue)){
                const span = document.createElement('span');
                span.innerHTML = node.nodeValue.replace(re, m => `<mark style="background: rgba(245,158,11,0.25); padding:0 2px; border-radius:3px;">${m}</mark>`);
                node.parentNode.replaceChild(span, node);
            }
        });
        return temp.innerHTML;
    }

    searchBox.addEventListener('input', (e) => searchMenu(e.target.value));
    searchBox.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowDown') { e.preventDefault(); moveActive(1); }
        else if (e.key === 'ArrowUp') { e.preventDefault(); moveActive(-1); }
        else if (e.key === 'Enter') { e.preventDefault(); navigateToActive(); }
        else if (e.key === 'Escape') { suggestionsEl.classList.remove('show'); suggestionsEl.innerHTML=''; }
    });
    suggestionsEl.addEventListener('mousedown', (e) => {
        const item = e.target.closest('.search-suggestion-item');
        if (!item || item.classList.contains('empty')) return;
        const href = item.getAttribute('data-href');
        if (href) window.location.href = href;
    });

    // Fungsi notifikasi
    function showNotification() {
        alert('Anda memiliki 3 notifikasi baru!');
    }

    // Toggle dropdown notifikasi
    function toggleNotificationDropdown() {
        const dropdown = document.getElementById('notificationDropdown');
        const isShowing = dropdown.classList.contains('show');
        
        if (isShowing) {
            dropdown.classList.remove('show');
        } else {
            dropdown.classList.add('show');
            loadDropdownNotifications();
        }
    }

    // Load notifikasi ke dropdown
    async function loadDropdownNotifications() {
        try {
            const response = await fetch('/admin/api/notifications');
            const data = await response.json();
            
            const content = document.getElementById('dropdownContent');
            const unreadCount = document.getElementById('dropdownUnreadCount');
            
            // Update unread count
            unreadCount.textContent = data.unread_count + ' baru';
            
            if (data.notifications.length === 0) {
                content.innerHTML = `
                    <div class="empty-dropdown">
                        <div class="empty-dropdown-icon">
                            <i class="fas fa-bell-slash"></i>
                        </div>
                        <div class="empty-dropdown-title">Tidak ada notifikasi</div>
                        <div class="empty-dropdown-message">Belum ada notifikasi baru untuk saat ini</div>
                    </div>
                `;
            } else {
                content.innerHTML = data.notifications.map(notification => `
                    <div class="notification-item ${notification.is_read ? '' : 'unread'}" onclick="markAsReadDropdown('${notification.id}')">
                        <div class="item-icon ${notification.type || 'system'}">
                            <i class="${notification.icon || 'fas fa-bell'}"></i>
                            ${!notification.is_read ? '<div class="unread-dot"></div>' : ''}
                        </div>
                        <div class="item-content">
                            <div class="item-title">${notification.title}</div>
                            <div class="item-message">${notification.message}</div>
                            <div class="item-meta">
                                <div class="item-time">
                                    <i class="fas fa-clock"></i>
                                    ${notification.time || 'Baru saja'}
                                </div>
                                <div class="item-status ${notification.is_read ? 'status-read' : 'status-new'}">
                                    ${notification.is_read ? 'Dibaca' : 'Baru'}
                                </div>
                            </div>
                        </div>
                    </div>
                `).join('');
            }
        } catch (error) {
            console.error('Error loading notifications:', error);
        }
    }

    // Tandai notifikasi sebagai dibaca
    async function markAsReadDropdown(notificationId) {
        try {
            await fetch(`/admin/api/notifications/${notificationId}/read`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                }
            });
            
            // Reload dropdown notifications
            loadDropdownNotifications();
            
            // Update badge count
            updateNotificationCount();
        } catch (error) {
            console.error('Error marking notification as read:', error);
        }
    }

    // Tandai semua notifikasi sebagai dibaca
    async function markAllReadDropdown() {
        try {
            await fetch('/admin/api/notifications/read-all', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                }
            });
            
            // Reload dropdown notifications
            loadDropdownNotifications();
            
            // Update badge count
            updateNotificationCount();
        } catch (error) {
            console.error('Error marking all notifications as read:', error);
        }
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('notificationDropdown');
        const trigger = document.querySelector('.notification-trigger');
        
        if (!dropdown.contains(event.target) && !trigger.contains(event.target)) {
            dropdown.classList.remove('show');
        }
    });

    // Update notifikasi badge
    async function updateNotificationCount() {
        try {
            const response = await fetch('/admin/api/notifications');
            const data = await response.json();
            
            const badge = document.getElementById('notificationCount');
            if (badge) {
                const newCount = data.unread_count;
                badge.textContent = newCount;
                
                // Animasi pulse jika ada notifikasi baru
                if (newCount > 0) {
                    badge.style.transform = 'scale(1.3)';
                    setTimeout(() => {
                        badge.style.transform = 'scale(1)';
                    }, 200);
                    
                    // Tampilkan notifikasi popup untuk yang terbaru
                    if (data.notifications.length > 0) {
                        const latestNotif = data.notifications[0];
                        showNotificationPopup(latestNotif);
                    }
                }
            }
        } catch (error) {
            console.error('Error updating notifications:', error);
        }
    }
    
    // Tampilkan popup notifikasi
    function showNotificationPopup(notification) {
        const popup = document.createElement('div');
        popup.className = 'notification-popup-container';
        popup.innerHTML = `
            <div class="notification-popup-panel">
                <div class="popup-header">
                    <div class="popup-title">Notifikasi Baru</div>
                    <button class="popup-close" onclick="this.parentElement.parentElement.remove()">×</button>
                </div>
                <div class="popup-content">
                    <div class="notification-item unread">
                        <div class="item-icon ${notification.type || 'system'}">
                            <i class="${notification.icon || 'fas fa-bell'}"></i>
                            <div class="unread-dot"></div>
                        </div>
                        <div class="item-content">
                            <div class="item-title">${notification.title}</div>
                            <div class="item-message">${notification.message}</div>
                            <div class="item-meta">
                                <div class="item-time">
                                    <i class="fas fa-clock"></i>
                                    Baru saja
                                </div>
                                <div class="item-status status-new">Baru</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="popup-footer">
                    <a href="/admin/notifications" class="popup-view-all">
                        <i class="fas fa-external-link-alt"></i>
                        Lihat Semua Notifikasi
                    </a>
                </div>
            </div>
        `;
        
        // Style untuk popup
        popup.style.cssText = `
            position: fixed;
            top: 80px;
            right: 20px;
            z-index: 1001;
            transform: translateX(400px);
            transition: transform 0.3s ease;
            max-width: 400px;
        `;
        
        // Tambahkan style CSS untuk popup
        if (!document.getElementById('notification-popup-styles')) {
            const style = document.createElement('style');
            style.id = 'notification-popup-styles';
            style.textContent = `
                .notification-popup-container {
                    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                }
                .notification-popup-panel {
                    background: white;
                    border-radius: 16px;
                    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
                    border: 1px solid rgba(255,255,255,0.2);
                    overflow: hidden;
                }
                .popup-header {
                    padding: 1rem 1.5rem;
                    background: linear-gradient(135deg, rgba(255,140,0,0.05), rgba(255,255,255,0.95));
                    border-bottom: 1px solid #f1f5f9;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }
                .popup-title {
                    font-weight: 700;
                    color: #1e293b;
                    font-size: 1rem;
                }
                .popup-close {
                    background: none;
                    border: none;
                    font-size: 1.2rem;
                    color: #64748b;
                    cursor: pointer;
                    padding: 4px;
                    border-radius: 4px;
                }
                .popup-close:hover {
                    background: #f1f5f9;
                }
                .popup-content {
                    padding: 0.5rem;
                }
                .notification-item {
                    display: flex;
                    align-items: flex-start;
                    padding: 1rem;
                    border-radius: 12px;
                    transition: all 0.3s ease;
                }
                .notification-item.unread {
                    background: linear-gradient(135deg, rgba(255,140,0,0.08), rgba(255,140,0,0.03));
                    border: 1px solid rgba(255,140,0,0.15);
                }
                .item-icon {
                    position: relative;
                    margin-right: 1rem;
                    width: 40px;
                    height: 40px;
                    border-radius: 12px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
                .item-icon.system {
                    background: linear-gradient(135deg, #f3e8ff, #e9d5ff);
                    color: #7c3aed;
                }
                .item-icon.booking {
                    background: linear-gradient(135deg, #dcfce7, #bbf7d0);
                    color: #16a34a;
                }
                .item-icon.payment {
                    background: linear-gradient(135deg, #dbeafe, #bfdbfe);
                    color: #2563eb;
                }
                .item-icon.alert {
                    background: linear-gradient(135deg, #fee2e2, #fecaca);
                    color: #dc2626;
                }
                .unread-dot {
                    position: absolute;
                    top: -2px;
                    right: -2px;
                    width: 10px;
                    height: 10px;
                    background: linear-gradient(135deg, #ff8c00, #ff7700);
                    border-radius: 50%;
                    border: 2px solid white;
                    box-shadow: 0 2px 6px rgba(255,140,0,0.4);
                }
                .item-content {
                    flex: 1;
                    min-width: 0;
                }
                .item-title {
                    font-weight: 700;
                    font-size: 0.9rem;
                    color: #1e293b;
                    margin-bottom: 0.25rem;
                }
                .item-message {
                    font-size: 0.8rem;
                    color: #64748b;
                    line-height: 1.4;
                    margin-bottom: 0.5rem;
                }
                .item-meta {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }
                .item-time {
                    display: flex;
                    align-items: center;
                    gap: 4px;
                    font-size: 0.75rem;
                    color: #94a3b8;
                }
                .item-status {
                    padding: 2px 8px;
                    border-radius: 8px;
                    font-size: 0.7rem;
                    font-weight: 600;
                }
                .status-new {
                    background: linear-gradient(135deg, #ff8c00, #ff7700);
                    color: white;
                    box-shadow: 0 2px 6px rgba(255,140,0,0.3);
                }
                .popup-footer {
                    padding: 1rem 1.5rem;
                    background: #fafbfc;
                    border-top: 1px solid #f1f5f9;
                }
                .popup-view-all {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    gap: 8px;
                    padding: 8px 16px;
                    background: linear-gradient(135deg, #ff8c00, #ff7700);
                    color: white;
                    text-decoration: none;
                    border-radius: 8px;
                    font-size: 0.8rem;
                    font-weight: 600;
                    transition: all 0.3s ease;
                }
                .popup-view-all:hover {
                    transform: translateY(-1px);
                    box-shadow: 0 4px 12px rgba(255,140,0,0.3);
                    text-decoration: none;
                    color: white;
                }
            `;
            document.head.appendChild(style);
        }
        
        document.body.appendChild(popup);
        
        // Show popup
        setTimeout(() => popup.style.transform = 'translateX(0)', 10);
        
        // Hide popup setelah 8 detik
        setTimeout(() => {
            popup.style.transform = 'translateX(400px)';
            setTimeout(() => popup.remove(), 300);
        }, 8000);
    }

    // Helper untuk dapatkan warna berdasarkan tipe
    function getColorByType(type) {
        const colors = {
            'success': 'linear-gradient(135deg, #28a745, #20c997)',
            'error': 'linear-gradient(135deg, #dc3545, #e74c3c)',
            'warning': 'linear-gradient(135deg, #ffc107, #ff8c00)',
            'info': 'linear-gradient(135deg, #17a2b8, #007bff)',
            'weather': 'linear-gradient(135deg, #667eea, #764ba2)',
            'booking': 'linear-gradient(135deg, #f093fb, #f5576c)',
            'profile': 'linear-gradient(135deg, #4facfe, #00f2fe)'
        };
        return colors[type] || colors['info'];
    }

    // Update notifikasi setiap 10 detik
    setInterval(updateNotificationCount, 10000);
    
    // Initial update
    updateNotificationCount();


    // Fungsi logout
    function logout() {
        if (confirm('Apakah Anda yakin ingin keluar?')) {
            // Redirect ke halaman logout atau panggil route logout
            window.location.href = '/logout';
        }
    }
</script>
