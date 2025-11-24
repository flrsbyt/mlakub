<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\TopDestination;
use App\Models\PemesananPaket;

class AdminController extends Controller
{
    // 🔹 Dashboard
    public function dashboard(Request $request)
    {
        // Cek apakah user memiliki role admin
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman admin');
        }

        $totalUsers = User::count();
        $totalAdmins = User::where('role', 'admin')->count();
        $totalRegularUsers = User::where('role', 'user')->count();
        
        $recentUsers = User::orderBy('tanggal_daftar', 'desc')->take(5)->get();
        $recentBookings = PemesananPaket::orderBy('created_at', 'desc')->take(8)->get();
        // Stats: current month bookings and revenue
        $startOfMonth = now()->startOfMonth()->toDateString();
        $endOfMonth = now()->endOfMonth()->toDateString();
        $monthlyBookings = PemesananPaket::whereBetween('tanggal_keberangkatan', [$startOfMonth, $endOfMonth])->count();
        $monthlyRevenue = (int) PemesananPaket::whereBetween('tanggal_keberangkatan', [$startOfMonth, $endOfMonth])->sum('total');
        $activePackages = PemesananPaket::select('paket')->distinct()->count('paket');
        // Performance metrics (business metrics)
        $confirmedThisMonth = PemesananPaket::whereBetween('tanggal_keberangkatan', [$startOfMonth, $endOfMonth])
            ->where('status', 'dikonfirmasi')
            ->count();
        $cancelledThisMonth = PemesananPaket::whereBetween('tanggal_keberangkatan', [$startOfMonth, $endOfMonth])
            ->where('status', 'dibatalkan')
            ->count();
        $avgBookingValue = $monthlyBookings > 0 ? (int) floor($monthlyRevenue / max(1, $monthlyBookings)) : 0;
        $confirmationRate = $monthlyBookings > 0 ? round(($confirmedThisMonth / $monthlyBookings) * 100, 1) : 0;
        $cancellationRate = $monthlyBookings > 0 ? round(($cancelledThisMonth / $monthlyBookings) * 100, 1) : 0;
        $newUsersThisMonth = User::whereDate('tanggal_daftar', '>=', $startOfMonth)
            ->whereDate('tanggal_daftar', '<=', $endOfMonth)
            ->count();
        // Ambil Top Destinasi dinamis berdasarkan periode (default 30 hari)
        $allowed = [7, 30, 90];
        $period = (int) $request->get('period', 30);
        if (!in_array($period, $allowed, true)) { $period = 30; }
        $since = now()->subDays($period)->toDateString();
        $agg = PemesananPaket::query()
            ->selectRaw('paket as name, COUNT(*) as bookings')
            ->whereDate('tanggal_keberangkatan', '>=', $since)
            ->groupBy('paket')
            ->orderByDesc('bookings')
            ->limit(3)
            ->get();
        // Jika kosong, fallback ke TopDestination manual (jika ada)
        $topDestinations = $agg->isNotEmpty()
            ? $agg
            : TopDestination::where('is_active', true)->orderBy('sort_order')->take(3)->get(['name','bookings']);
        
        return view('admin.dashboard', compact(
            'totalUsers',
            'totalAdmins',
            'totalRegularUsers',
            'recentUsers',
            'recentBookings',
            'topDestinations',
            'monthlyBookings',
            'monthlyRevenue',
            'activePackages',
            'period',
            'avgBookingValue',
            'confirmationRate',
            'cancellationRate',
            'newUsersThisMonth'
        ));
    }

    // 🔹 Halaman lain
    public function pesanPaket()
    {
        return redirect()->route('admin.pemesanan.index');
    }

    public function galery()
    {
        // Static data for gallery demo - no database required
        $galleryStats = [
            'total_media' => 247,
            'photos' => 189,
            'videos' => 58
        ];
        
        return view('admin.galery', compact('galleryStats'));
    }

    public function pilihanPaket()
    {
        return view('admin.pilihan_paket');
    }

    public function caraPemesanan()
    {
        return view('admin.cara_pemesanan');
    }

    public function kontak()
    {
        return view('admin.kontak');
    }

    public function paketTrip()
    {
        return view('admin.paket_trip');
    }

    // 🔹 Manajemen User
    public function users()
    {
        // Gunakan tanggal_daftar (bukan created_at) dan fallback ke id_users
        $users = User::orderByRaw("CASE WHEN tanggal_daftar IS NULL OR tanggal_daftar = '' THEN 1 ELSE 0 END, tanggal_daftar DESC")
            ->orderByDesc('id_users')
            ->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function createUser()
    {
        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role'     => 'required|in:admin,user'
        ]);

        User::create([
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dibuat!');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $request->validate([
            'username' => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email,' . $user->id_users . ',id_users',
            'role'     => 'required|in:admin,user'
        ]);

        $user->update([
            'username' => $request->username,
            'email'    => $request->email,
            'role'     => $request->role
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diupdate!');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        
        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus!');
    }

    // 🔹 Profile
    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    // 🔹 Notifications
    public function getNotifications()
    {
        $user = Auth::user();
        $notifications = $user->notifications()
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get()
            ->map(function ($notification) {
                $createdAt = $notification->created_at;
                return [
                    'id' => $notification->id,
                    'title' => $notification->title,
                    'message' => $notification->message,
                    'type' => $notification->type ?? 'system',
                    'icon' => $notification->icon ?? 'fas fa-bell',
                    'is_read' => (bool) $notification->is_read,
                    'time' => $createdAt ? $createdAt->diffForHumans() : '',
                    'created_at' => $createdAt ? $createdAt->format('Y-m-d H:i:s') : null
                ];
            });

        $unreadCount = $user->notifications()->where('is_read', false)->count();

        return response()->json([
            'notifications' => $notifications,
            'unread_count' => $unreadCount
        ]);
    }

    public function markAsRead($id)
    {
        $user = Auth::user();
        $notification = $user->notifications()->find($id);
        
        if ($notification) {
            $notification->is_read = true;
            $notification->save();
        }

        return response()->json(['success' => true]);
    }

    public function markAllAsRead()
    {
        $user = Auth::user();
        $user->notifications()->where('is_read', false)->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }

    public function notifications()
    {
        $user = Auth::user();
        $notifications = $user->notifications()->orderBy('created_at', 'desc')->paginate(20);
        
        // Mark all as read
        $user->notifications()->where('is_read', false)->update(['is_read' => true]);
        
        return view('admin.notifications', compact('notifications'));
    }

    // API untuk real-time notifications
    public function getNotificationsRealtime()
    {
        $user = Auth::user();
        $unreadCount = $user->notifications()->where('is_read', false)->count();
        $latestNotifications = $user->notifications()
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        return response()->json([
            'unread_count' => $unreadCount,
            'notifications' => $latestNotifications
        ]);
    }

    // Demo booking notification
    public function demoBookingNotification()
    {
        $user = Auth::user();
        
        // Simulasi data booking
        $bookingData = [
            'customer_name' => 'Andi Wijaya',
            'package' => 'Bromo Sunrise Tour',
            'date' => now()->addDays(3)->format('d M Y'),
            'price' => 'Rp 450.000',
            'phone' => '0812-3456-7890'
        ];
        
        // Buat notifikasi booking
        $this->createNotification(
            'booking',
            'Pemesanan Baru - ' . $bookingData['package'],
            "{$bookingData['customer_name']} melakukan booking untuk {$bookingData['package']} tanggal {$bookingData['date']}. Total: {$bookingData['price']}",
            'fas fa-calendar-check',
            'booking',
            $bookingData
        );
        
        return redirect()->route('admin.dashboard')->with('success', 'Demo notifikasi booking berhasil dibuat!');
    }

    // Create notification helper
    private function createNotification($type, $title, $message, $icon = null, $color = 'info', $data = [])
    {
        $user = Auth::user();
        $user->notifications()->create([
            'type' => $type,
            'title' => $title,
            'message' => $message,
            'icon' => $icon,
            'color' => $color,
            'is_read' => false,
            'notifiable_type' => User::class,
            'notifiable_id' => $user->id_users,
            'data' => $data
        ]);
    }

    public function updateProfile(Request $request)
    {
        // Debug: Log semua request data
        \Log::info('UpdateProfile method called');
        \Log::info('Request data: ' . json_encode($request->all()));
        \Log::info('Has file: ' . ($request->hasFile('profile_photo') ? 'YES' : 'NO'));
        
        $user = Auth::user();
        \Log::info('Current user ID: ' . $user->id_users);
        
        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users,email,' . $user->id_users . ',id_users',
            'current_password'  => 'nullable|required_with:new_password',
            'new_password'      => 'nullable|min:8|confirmed',
            'profile_photo'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            // Debug: Log file upload
            \Log::info('Profile photo uploaded: ' . $request->file('profile_photo')->getClientOriginalName());
            
            // Delete old photo if exists
            if ($user->profile_photo) {
                $oldPhotoPath = public_path('images/profile_photos/' . basename($user->profile_photo));
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }
            
            // Store new photo
            $file = $request->file('profile_photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            try {
                $file->move(public_path('images/profile_photos'), $filename);
                $profilePhotoPath = 'profile_photos/' . $filename;
                \Log::info('Profile photo saved to: ' . $profilePhotoPath);
            } catch (\Exception $e) {
                \Log::error('Failed to save profile photo: ' . $e->getMessage());
                return back()->withErrors(['profile_photo' => 'Gagal mengupload foto: ' . $e->getMessage()]);
            }
        } else {
            $profilePhotoPath = $user->profile_photo;
        }

        // Update all fields at once
        $updateData = [
            'username' => $request->name,  // Map name field to username
            'email'    => $request->email,
        ];

        // Add profile photo if updated
        if (isset($profilePhotoPath) && $profilePhotoPath !== $user->profile_photo) {
            $updateData['profile_photo'] = $profilePhotoPath;
        }

        // Add password if updated
        if ($request->filled('new_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai']);
            }
            $updateData['password'] = Hash::make($request->new_password);
        }

        $user->update($updateData);

        // Refresh user data in session
        auth()->setUser($user->fresh());

        // Create notification untuk profile update
        $this->createNotification(
            'profile',
            'Profil Diperbarui',
            'Profil admin Anda berhasil diperbarui',
            'fas fa-user-edit',
            'success'
        );

        return redirect()->route('admin.profile')->with('success', 'Profil berhasil diupdate!');
    }

    
}
