<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // 🔹 Dashboard
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalAdmins = User::where('role', 'admin')->count();
        $totalRegularUsers = User::where('role', 'user')->count();
        
        $recentUsers = User::latest()->take(5)->get();
        
        return view('admin.dashboard', compact(
            'totalUsers',
            'totalAdmins',
            'totalRegularUsers',
            'recentUsers'
        ));
    }

    // 🔹 Halaman lain
    public function pesanPaket()
    {
        return view('admin.pesan-paket');
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
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function createUser()
    {
        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role'     => 'required|in:admin,user'
        ]);

        User::create([
            'name'     => $request->name,
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
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role'  => 'required|in:admin,user'
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
            'role'  => $request->role
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
    public function notifications()
    {
        return view('admin.notifications');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'current_password'  => 'nullable|required_with:new_password',
            'new_password'      => 'nullable|min:8|confirmed',
            'profile_photo'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
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
            $file->move(public_path('images/profile_photos'), $filename);
            $user->profile_photo = 'profile_photos/' . $filename;
        }

        // Update nama & email
        $user->name  = $request->name;
        $user->email = $request->email;

        // Jika ada password baru
        if ($request->filled('new_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai']);
            }
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        // Refresh user data in session
        auth()->setUser($user->fresh());

        return redirect()->route('admin.profile')->with('success', 'Profil berhasil diupdate!');
    }

    
}
