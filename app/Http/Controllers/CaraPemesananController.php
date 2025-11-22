<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LangkahPemesanan;

class CaraPemesananController extends Controller
{
    public function index()
    {
        $langkah = LangkahPemesanan::orderBy('urutan')->get();
        return view('admin.cara_pemesanan', compact('langkah'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:150',
            'deskripsi' => 'required|string',
            'ikon' => 'nullable|string|max:100',
            'urutan' => 'required|integer|min:1',
            'status' => 'required|in:aktif,nonaktif',
        ]);
        LangkahPemesanan::create($data);
        return back()->with('success','Langkah pemesanan ditambahkan');
    }

    public function update(Request $request, LangkahPemesanan $langkah)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:150',
            'deskripsi' => 'required|string',
            'ikon' => 'nullable|string|max:100',
            'urutan' => 'required|integer|min:1',
            'status' => 'required|in:aktif,nonaktif',
        ]);
        $langkah->update($data);
        return back()->with('success','Langkah pemesanan diperbarui');
    }

    public function destroy(LangkahPemesanan $langkah)
    {
        $langkah->delete();
        return back()->with('success','Langkah pemesanan dihapus');
    }

    public function public()
    {
        $langkah = LangkahPemesanan::where('status','aktif')->orderBy('urutan')->get();
        return view('carapemesanan', compact('langkah'));
    }
}
