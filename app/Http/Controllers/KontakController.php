<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesanKontak;

class KontakController extends Controller
{
    public function index()
    {
        $status = request('status');
        
        $query = PesanKontak::query();
        
        if ($status && in_array($status, ['menunggu', 'diterima', 'ditolak'])) {
            $query->where('status', $status);
        }
        
        $pesan = $query->latest()->paginate(10);
        
        $stat = [
            'total' => PesanKontak::count(),
            'menunggu' => PesanKontak::where('status', 'menunggu')->count(),
            'diterima' => PesanKontak::where('status', 'diterima')->count(),
            'ditolak' => PesanKontak::where('status', 'ditolak')->count(),
        ];
        
        return view('admin.testimoni', compact('pesan', 'stat'));
    }

    public function store(Request $request)
    {
        // Pastikan user sudah login
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu untuk mengirim testimoni.');
        }

        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'rating' => 'required|integer|min:1|max:5',
            'keterangan' => 'required|string',
        ]);
        
        // Gunakan data user yang login
        $data['nama'] = auth()->user()->username;
        $data['email'] = auth()->user()->email;
        $data['user_id'] = auth()->id();
        $data['status'] = 'menunggu';
        
        // Simpan testimoni
        $testimoni = PesanKontak::create($data);
        
        // Buat notifikasi untuk admin
        $admins = \App\Models\User::where('role', 'admin')->get();
        $now = now();
        
        foreach ($admins as $admin) {
            // Hapus notifikasi lama untuk testimoni ini jika ada
            $admin->notifications()
                ->where('type', 'testimoni_baru')
                ->where('data->testimoni_id', $testimoni->id)
                ->delete();
                
            // Buat notifikasi baru
            $admin->notifications()->create([
                'type' => 'testimoni_baru',
                'title' => 'Testimoni Baru',
                'message' => 'Ada testimoni baru dari ' . $data['nama'],
                'icon' => 'fas fa-comment-alt',
                'color' => 'info',
                'notifiable_type' => 'App\\Models\\User',
                'data' => json_encode([
                    'testimoni_id' => $testimoni->id,
                    'url' => route('admin.kontak') . '?highlight=' . $testimoni->id,
                    'created_at' => $now->toDateTimeString()
                ]),
                'created_at' => $now,
                'updated_at' => $now,
                'is_read' => false
            ]);
        }
        
        return back()->with('success', 'Testimoni berhasil dikirim!');
    }

    public function ubahStatus(Request $request, PesanKontak $pesanKontak)
    {
        $request->validate(['status' => 'required|in:menunggu,diterima,ditolak']);
        
        $pesanKontak->update([
            'status' => $request->status,
            'dibaca_pada' => now(),
        ]);
        
        $statusText = $request->status == 'diterima' ? 'diterima' : ($request->status == 'ditolak' ? 'ditolak' : 'diubah ke menunggu');
        
        return back()
            ->with('success', "Testimoni berhasil $statusText")
            ->withFragment('#row-' . $pesanKontak->id);
    }
    
    /**
     * Mengambil daftar testimoni yang sudah disetujui
     * 
     * @param int $limit Jumlah testimoni yang akan diambil (default: 5)
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getApprovedTestimonies($limit = 5)
    {
        return \App\Models\PesanKontak::where('status', 'diterima')
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }

    public function hapus(PesanKontak $pesanKontak)
    {
        $pesanKontak->delete();
        return back()->with('success','Pesan dihapus');
    }
}
