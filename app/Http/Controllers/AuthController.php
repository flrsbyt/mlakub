<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            
            if (Auth::user()->role === 'admin') {
                // Untuk request AJAX, kembalikan JSON dengan redirect URL
                if ($request->ajax() || $request->wantsJson()) {
                    return response()->json([
                        'success' => true,
                        'redirect' => route('admin.dashboard')
                    ]);
                }
                // Untuk request biasa, langsung redirect
                return redirect()->route('admin.dashboard');
            }
            
            // Untuk user biasa
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => true]);
            }
            
            return redirect()->intended(route('home'));
        }

        // Jika autentikasi gagal
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau password salah.'
            ], 401);
        }
        
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:100',
            'ktp' => 'required|string|max:20',
            'nomor_hp' => 'required|string|max:15',
            'asal' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);
    
        $user = User::create([
            'username' => $request->username,
            'ktp' => $request->ktp,
            'nomor_hp' => $request->nomor_hp,
            'asal' => $request->asal,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tanggal_daftar' => now(),
        ]);
    
        Auth::login($user);
        $request->session()->regenerate();
    
        return response()->json(['success' => true]);
    }
    

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
