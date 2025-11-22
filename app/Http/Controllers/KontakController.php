<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesanKontak;

class KontakController extends Controller
{
    public function index()
    {
        $pesan = PesanKontak::latest()->paginate(10);
        $stat = [
            'total' => PesanKontak::count(),
            'menunggu' => PesanKontak::where('status','menunggu')->count(),
            'diterima' => PesanKontak::where('status','diterima')->count(),
            'ditolak' => PesanKontak::where('status','ditolak')->count(),
        ];
        return view('admin.kontak', compact('pesan','stat'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'rating' => 'required|integer|min:1|max:5',
            'keterangan' => 'required|string',
        ]);
        $data['status'] = 'menunggu';
        PesanKontak::create($data);
        return back()->with('success','Pesan/testimoni berhasil dikirim.');
    }

    public function ubahStatus(Request $request, PesanKontak $pesanKontak)
    {
        $request->validate(['status' => 'required|in:menunggu,diterima,ditolak']);
        $pesanKontak->update(['status' => $request->status]);
        return back()->with('success','Status pesan diperbarui');
    }

    public function hapus(PesanKontak $pesanKontak)
    {
        $pesanKontak->delete();
        return back()->with('success','Pesan dihapus');
    }
}
