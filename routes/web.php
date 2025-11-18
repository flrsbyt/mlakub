<?php
// =====================================
// FILE: routes/web.php
// =====================================

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Authentication Routes
Route::get('/login', function () {
    return redirect()->route('home');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        // Tambahkan route admin lainnya di sini
    });

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/paket-trip', function () {
    return view('paket-trip');
})->name('paket-trip');

Route::get('/opentrip/{tripName?}', function () {
    return view('opentrip');
})->name('opentrip');

Route::get('/dailytrip', function () {
    return view('dailytrip');
})->name('dailytrip');

Route::get('/travelbromo', function () {
    return view('travelbromo');
})->name('travelbromo');

Route::get('/paketwna', function () {
    return view('paketwna');
})->name('paketwna');
    
Route::get('/cara-pemesanan', function () {
    return view('carapemesanan');
})->name('cara-pemesanan');

Route::get('/galeri', function () {
    return view('galeri');
})->name('galeri');

Route::get('/kontak', function () {
    return view('kontakweb');
})->name('kontak');

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
Route::get('/galery', [AdminController::class, 'galery'])->name('galery');

// ================= ADMIN =================
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Paket
    Route::get('/pesan-paket', [AdminController::class, 'pesanPaket'])->name('pesan-paket');
    Route::get('/pilihan-paket', [AdminController::class, 'pilihanPaket'])->name('pilihan-paket');

    // Galery dalam admin
    Route::get('/galery', [AdminController::class, 'galery'])->name('galery.admin');

    // Cara Pemesanan
    Route::get('/cara-pemesanan', [AdminController::class, 'caraPemesanan'])->name('cara-pemesanan');

    // Kontak
    Route::get('/kontak', [AdminController::class, 'kontak'])->name('kontak');

    // Paket Trip
    Route::get('/paket-trip', [AdminController::class, 'paketTrip'])->name('paket-trip');

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

    // Contacts
    Route::resource('contacts', ContactController::class);
});

?>