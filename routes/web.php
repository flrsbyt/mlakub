<?php
// =====================================
// FILE: routes/web.php
// =====================================

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\CaraPemesananController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TopDestinationController;

// Authentication Routes
Route::get('/login', function () {
    if (Auth::check()) {
        // Debug: Log current user
        \Log::info('GET /login - User already logged in: ' . Auth::user()->email . ' with role: ' . Auth::user()->role);
        
        // Jika sudah login, redirect ke dashboard yang sesuai
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('home');
    }
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Dashboard
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // Paket (menu lain) - halaman daftar pemesanan
        Route::get('/pesan-paket', [PemesananController::class, 'index'])->name('pesan-paket');
        Route::get('/pilihan-paket', [AdminController::class, 'pilihanPaket'])->name('pilihan-paket');

        // Galery dalam admin (CRUD)
        Route::get('/galery', [GalleryController::class, 'adminIndex'])->name('galery.admin');
        Route::post('/galery', [GalleryController::class, 'store'])->name('galery.store');
        Route::put('/galery/{gallery}', [GalleryController::class, 'update'])->name('galery.update');
        Route::delete('/galery/{gallery}', [GalleryController::class, 'destroy'])->name('galery.destroy');

        // Cara Pemesanan (admin CRUD)
        Route::get('/cara-pemesanan', [CaraPemesananController::class, 'index'])->name('cara-pemesanan');
        Route::post('/cara-pemesanan', [CaraPemesananController::class, 'store'])->name('cara-pemesanan.store');
        Route::put('/cara-pemesanan/{langkah}', [CaraPemesananController::class, 'update'])->name('cara-pemesanan.update');
        Route::delete('/cara-pemesanan/{langkah}', [CaraPemesananController::class, 'destroy'])->name('cara-pemesanan.destroy');

        // Kontak (admin)
        Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
        Route::patch('/kontak/{pesanKontak}/status', [KontakController::class, 'ubahStatus'])->name('kontak.status');
        Route::delete('/kontak/{pesanKontak}', [KontakController::class, 'hapus'])->name('kontak.destroy');

        // Paket Trip
        Route::get('/paket-trip', [AdminController::class, 'paketTrip'])->name('paket-trip');

        // Top Destinations (CRUD sederhana)
        Route::get('/top-destinations', [TopDestinationController::class, 'index'])->name('top-destinations.index');
        Route::post('/top-destinations', [TopDestinationController::class, 'store'])->name('top-destinations.store');
        Route::put('/top-destinations/{top_destination}', [TopDestinationController::class, 'update'])->name('top-destinations.update');
        Route::delete('/top-destinations/{top_destination}', [TopDestinationController::class, 'destroy'])->name('top-destinations.destroy');

        // Pemesanan (admin) - gunakan path /pesan-paket
        Route::get('/pesan-paket/{pemesanan}', [PemesananController::class, 'show'])->name('pemesanan.show');
        Route::patch('/pesan-paket/{pemesanan}/status', [PemesananController::class, 'updateStatus'])->name('pemesanan.status');
        Route::delete('/pesan-paket/{pemesanan}', [PemesananController::class, 'destroy'])->name('pemesanan.destroy');
        // Legacy alias: /pemesanan -> redirect ke /pesan-paket, tetap punya nama admin.pemesanan.index
        Route::get('/pemesanan', function(){ return redirect()->route('admin.pesan-paket'); })->name('pemesanan.index');

        // CRUD Users
        Route::get('/users', [AdminController::class, 'users'])->name('users.index');
        Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
        Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');
        Route::get('/users/{id}/edit', [AdminController::class, 'editUser'])->name('users.edit');
        Route::put('/users/{id}', [AdminController::class, 'updateUser'])->name('users.update');
        Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('users.destroy');

        // Profile
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::put('/profile', [AdminController::class, 'updateProfile'])->name('profile.update');

        // Notifications
        Route::get('/notifications', [AdminController::class, 'notifications'])->name('notifications');
        Route::get('/api/notifications', [AdminController::class, 'getNotifications'])->name('api.notifications');
        Route::post('/api/notifications/{id}/read', [AdminController::class, 'markAsRead']);
        Route::post('/api/notifications/read-all', [AdminController::class, 'markAllAsRead']);
        Route::get('/demo-booking', [AdminController::class, 'demoBookingNotification'])->name('demo.booking');
    });

Route::get('/', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return view('home');
})->name('home');

Route::get('/paket-trip', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return view('paket-trip');
})->name('paket-trip');

Route::get('/opentrip/{tripName?}', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return view('opentrip');
})->name('opentrip');

Route::get('/dailytrip', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return view('dailytrip');
})->name('dailytrip');

Route::get('/travelbromo', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return view('travelbromo');
})->name('travelbromo');

Route::get('/paketwna', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return view('paketwna');
})->name('paketwna');
    
// Cara pemesanan publik (dinamis)
Route::get('/cara-pemesanan', [CaraPemesananController::class, 'public'])->name('cara-pemesanan');

Route::get('/galeri', [GalleryController::class, 'publicIndex'])->name('galeri');

Route::get('/kontak', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return view('kontakweb');
})->name('kontak');

// Form testimoni publik -> simpan ke DB
Route::post('/kontak/testimoni', [KontakController::class, 'store'])->name('kontak.testimoni.store');

// Pemesanan publik (bisa dipanggil dari semua halaman paket)
Route::post('/pemesanan', [PemesananController::class, 'store'])->name('pemesanan.store');

// Middleware untuk user biasa
Route::middleware('auth')->group(function () {
    Route::get('/profil', function () {
        return view('profil');
    })->name('profil');

    Route::get('/riwayatpesan', function () {
        return view('riwayatpesan');
    })->name('riwayatpesan');

    Route::get('/riwayattesti', function () {
        return view('riwayattesti');
    })->name('riwayattesti');
});

// ================= GALERY UMUM =================
// Tetap sediakan alias jika diperlukan, arahkan ke halaman publik
Route::get('/galery', [GalleryController::class, 'publicIndex'])->name('galery');

?>