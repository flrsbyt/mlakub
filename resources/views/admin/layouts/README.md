# Admin Sidebar System - Mlakubromo.id

## Overview
Sistem sidebar admin yang dinamis dan dapat digunakan di semua halaman admin. Sidebar ini menggantikan sidebar lama yang ada di layout admin.

## File Structure
```
resources/views/admin/layouts/
├── app.blade.php          # Layout utama admin
├── sidebar.blade.php      # Komponen sidebar
├── sidebar-styles.blade.php # CSS untuk sidebar
├── sidebar-scripts.blade.php # JavaScript untuk sidebar
└── README.md             # Dokumentasi ini
```

## Cara Penggunaan

### 1. Layout Utama
Setiap halaman admin harus menggunakan layout utama:
```blade
@extends('admin.layouts.app')

@section('title', 'Judul Halaman')
@section('page-title', 'Judul Halaman')
@section('page-subtitle', 'Subtitle halaman (opsional)')

@section('content')
<!-- Konten halaman Anda di sini -->
@endsection
```

### 2. Komponen yang Tersedia

#### Page Header
- `@section('page-title')` - Judul utama halaman
- `@section('page-subtitle')` - Subtitle halaman (opsional)

#### Flash Messages
Otomatis menampilkan pesan dari session:
- `success` - Pesan sukses
- `error` - Pesan error
- `warning` - Pesan warning
- `info` - Pesan informasi

#### Cards
```blade
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Judul Card</h5>
    </div>
    <div class="card-body">
        Konten card
    </div>
</div>
```

#### Buttons
```blade
<button class="btn btn-primary">Primary Button</button>
<button class="btn btn-secondary">Secondary Button</button>
<button class="btn btn-success">Success Button</button>
<button class="btn btn-danger">Danger Button</button>
<button class="btn btn-warning">Warning Button</button>
<button class="btn btn-info">Info Button</button>
```

#### Forms
```blade
<div class="form-group">
    <label class="form-label">Label</label>
    <input type="text" class="form-control @error('field') is-invalid @enderror" name="field">
    @error('field')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
```

#### Grid System
```blade
<div class="row">
    <div class="col-md-6">Konten setengah lebar</div>
    <div class="col-md-6">Konten setengah lebar</div>
</div>
```

### 3. Fitur Sidebar

#### Menu Items
- Dashboard - Link ke dashboard admin
- Pilihan Paket - Dropdown dengan submenu
- Pemesanan - Menu pemesanan
- Galeri - Menu galeri
- Cara Pemesanan - Menu cara pemesanan
- Kontak - Menu kontak
- Testimoni - Menu testimoni
- Profile - Link ke profile admin
- Logout - Tombol logout

#### Responsive
- Sidebar otomatis tersembunyi di mobile
- Toggle button untuk membuka/menutup sidebar
- Auto-close sidebar setelah memilih menu di mobile

#### Active State
- Menu yang aktif akan ditandai dengan warna orange
- Submenu dropdown yang aktif juga akan ditandai

### 4. Customization

#### Menambah Menu Baru
Edit file `sidebar.blade.php`:
```blade
<a href="{{ route('admin.new-page') }}" class="menu-item {{ request()->routeIs('admin.new-page*') ? 'active' : '' }}">
    <div class="menu-item-content">
        <i class="menu-icon fas fa-icon-name"></i>
        Nama Menu
    </div>
</a>
```

#### Menambah Submenu
```blade
<a href="#" class="menu-item dropdown-toggle" onclick="toggleDropdown(this)">
    <div class="menu-item-content">
        <i class="menu-icon fas fa-icon-name"></i>
        Menu dengan Dropdown
    </div>
    <i class="dropdown-arrow fas fa-chevron-right"></i>
</a>
<div class="dropdown-menu">
    <a href="#submenu1" class="submenu-item">
        <i class="menu-icon fas fa-icon-name"></i>
        Submenu 1
    </a>
</div>
```

#### Mengubah Warna
Edit file `sidebar-styles.blade.php`:
```css
.sidebar a:hover {
    background: rgba(255, 107, 53, 0.1); /* Ubah warna ini */
    border-left-color: #ff6b35; /* Ubah warna ini */
    color: #ff6b35; /* Ubah warna ini */
}
```

### 5. JavaScript Functions

#### Toggle Sidebar
```javascript
toggleSidebar() // Toggle sidebar di mobile
```

#### Toggle Dropdown
```javascript
toggleDropdown(element) // Toggle dropdown menu
```

### 6. CSS Classes yang Tersedia

#### Layout
- `.main-content` - Area konten utama
- `.content` - Area konten dalam
- `.page-header` - Header halaman
- `.page-title` - Judul halaman
- `.page-subtitle` - Subtitle halaman

#### Components
- `.card` - Card container
- `.card-header` - Header card
- `.card-body` - Body card
- `.btn` - Button base
- `.form-control` - Input form
- `.form-label` - Label form
- `.badge` - Badge/tag

#### Utilities
- `.text-center` - Text center
- `.d-flex` - Display flex
- `.gap-2` - Gap spacing
- `.mb-3` - Margin bottom
- `.me-2` - Margin right

## Contoh Halaman Lengkap

```blade
@extends('admin.layouts.app')

@section('title', 'Halaman Baru')
@section('page-title', 'Halaman Baru')
@section('page-subtitle', 'Deskripsi halaman baru')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Form Input</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.store') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Informasi</h5>
            </div>
            <div class="card-body">
                <p>Informasi tambahan</p>
            </div>
        </div>
    </div>
</div>
@endsection
```

## Catatan Penting

1. **Font Awesome** - Pastikan Font Awesome sudah di-load untuk icon
2. **Routes** - Pastikan semua route yang digunakan sudah didefinisikan
3. **Session** - Flash messages menggunakan Laravel session
4. **Responsive** - Sidebar otomatis responsive untuk mobile
5. **Active State** - Menu aktif otomatis berdasarkan route yang sedang dibuka

## Troubleshooting

### Sidebar tidak muncul
- Pastikan file `sidebar.blade.php` ada
- Periksa path include di `app.blade.php`

### CSS tidak bekerja
- Pastikan file `sidebar-styles.blade.php` ada
- Periksa path include di `app.blade.php`

### JavaScript tidak bekerja
- Pastikan file `sidebar-scripts.blade.php` ada
- Periksa path include di `app.blade.php`

### Menu tidak aktif
- Pastikan route name sesuai dengan yang didefinisikan
- Gunakan `request()->routeIs()` untuk active state
