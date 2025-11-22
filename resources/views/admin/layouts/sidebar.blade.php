<!-- ===== MULAI SIDEBAR ===== -->
<div class="sidebar" id="sidebar">
  <div class="sidebar-header">
    <div class="logo">MLAKUBROMO.ID</div>
    <h2>Travel Admin</h2>
    <div class="subtitle">Panel Administrasi</div>
  </div>
  
  <div class="menu-section">
    <div class="menu-title">Main Menu</div>
    
    <!-- Dashboard -->
    <a href="{{ route('admin.dashboard') }}" class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
      <div class="menu-item-content">
        <i class="menu-icon fas fa-tachometer-alt"></i>
        Dashboard
      </div>
    </a>
    
    <!-- Paket Trip -->
    <a href="{{ route('admin.paket-trip') }}" class="menu-item {{ request()->routeIs('admin.paket-trip') ? 'active' : '' }}">
      <div class="menu-item-content">
        <i class="menu-icon fas fa-box"></i>
        Paket Trip
      </div>
    </a>
    
    <!-- Pemesanan -->
    <a href="{{ route('admin.pemesanan.index') }}" class="menu-item {{ request()->routeIs('admin.pemesanan.*') ? 'active' : '' }}">
      <div class="menu-item-content">
        <i class="menu-icon fas fa-shopping-cart"></i>
        Pemesanan
      </div>
    </a>
    
    <!-- Galeri -->
    <a href="{{ route('admin.galery.admin') }}" class="menu-item {{ request()->routeIs('admin.galery.admin') ? 'active' : '' }}">
      <div class="menu-item-content">
        <i class="menu-icon fas fa-images"></i>
        Galeri
      </div>
    </a>
    
    <!-- Cara Pemesanan -->
    <a href="{{ route('admin.cara-pemesanan') }}" class="menu-item {{ request()->routeIs('admin.cara-pemesanan') ? 'active' : '' }}">
      <div class="menu-item-content">
        <i class="menu-icon fas fa-list-ol"></i>
        Cara Pemesanan
      </div>
    </a>
    
    <!-- Kontak -->
    <a href="{{ route('admin.kontak') }}" 
   class="menu-item {{ request()->routeIs('admin.kontak') ? 'active' : '' }}">
  <div class="menu-item-content">
    <i class="menu-icon fas fa-phone"></i>
    Kontak
  </div>
</a>

    
  </div>
  
  <div class="menu-section">
    <div class="menu-title">Account</div>
    <a href="{{ route('admin.profile') }}" class="menu-item {{ request()->routeIs('admin.profile*') ? 'active' : '' }}">
      <div class="menu-item-content">
        <i class="menu-icon fas fa-user"></i>
        Profile
      </div>
    </a>
    <a href="{{ route('logout') }}" class="menu-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <div class="menu-item-content">
        <i class="menu-icon fas fa-sign-out-alt"></i>
        Logout
      </div>
    </a>
  </div>
</div>
<!-- ===== AKHIR SIDEBAR ===== -->

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
