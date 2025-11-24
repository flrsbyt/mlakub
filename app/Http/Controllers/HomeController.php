<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesanKontak;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // Get approved testimonials with user data, ordered by most recent
        $testimonials = PesanKontak::with('user')
            ->where('status', 'diterima')
            ->orderBy('dibaca_pada', 'desc')
            ->limit(6) // Limit to 6 testimonials
            ->get();

        return view('home', compact('testimonials'));
    }
}
