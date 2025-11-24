<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemesananPaket;
use Illuminate\Support\Facades\Log;

class PemesananController extends Controller
{
    // Menampilkan riwayat pemesanan untuk user yang sedang login
    public function riwayatUser()
    {
        $pemesanan = PemesananPaket::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('riwayatpesan', compact('pemesanan'));
    }

    // User mengisi / mengubah metode pembayaran dari halaman riwayat
    public function konfirmasiPembayaran(Request $request, PemesananPaket $pemesanan)
    {
        // Pastikan pemesanan milik user yang sedang login
        if ($pemesanan->user_id !== auth()->id()) {
            abort(403, 'Tidak boleh mengubah pemesanan orang lain');
        }

        $data = $request->validate([
            'metode_pembayaran' => 'required|string|max:50',
        ]);

        $pemesanan->update([
            'metode_pembayaran' => $data['metode_pembayaran'],
        ]);

        return back()->with('success', 'Metode pembayaran tersimpan. Silakan lakukan pembayaran sesuai petunjuk.');
    }

    public function index(Request $request)
    {
        $q = PemesananPaket::query();
        if ($request->filled('status') && $request->status !== 'semua') {
            $q->where('status', $request->status);
        }
        if ($request->filled('paket') && $request->paket !== 'semua') {
            $q->where('paket', $request->paket);
        }
        if ($request->filled('dari')) {
            $q->whereDate('tanggal_keberangkatan', '>=', $request->dari);
        }
        if ($request->filled('sampai')) {
            $q->whereDate('tanggal_keberangkatan', '<=', $request->sampai);
        }
        $sumPembayaran = (clone $q)->sum('total');
        $pemesanan = $q->latest()->paginate(10);

        $stat = [
            'total' => PemesananPaket::count(),
            'menunggu' => PemesananPaket::where('status','menunggu')->count(),
            'dikonfirmasi' => PemesananPaket::where('status','dikonfirmasi')->count(),
            'dibatalkan' => PemesananPaket::where('status','dibatalkan')->count(),
        ];

        $paketList = PemesananPaket::select('paket')->distinct()->pluck('paket');

        return view('admin.pesan-paket', compact('pemesanan','stat','paketList','sumPembayaran'));
    }

    public function updateStatus(Request $request, PemesananPaket $pemesanan)
    {
        $data = $request->validate([
            'status' => 'required|in:menunggu,dikonfirmasi,selesai,dibatalkan'
        ]);
        $pemesanan->update(['status' => $data['status']]);
        return back()->with('success','Status diperbarui');
    }

    public function destroy(PemesananPaket $pemesanan)
    {
        $pemesanan->delete();
        return back()->with('success','Pemesanan dihapus');
    }

    public function store(Request $request)
    {
        Log::info('PemesananController@store request', $request->all());
        $data = $request->validate([
            'paket' => 'required|string|max:150',
            'peserta' => 'required|integer|min:1',
            'tanggal_keberangkatan' => 'required|date',
            'titik_penjemputan' => 'nullable|string|max:255',
            'total' => 'nullable|integer|min:0',
            'catatan' => 'nullable|string',
        ]);

        try {
            // Titik jemput / titik kumpul default untuk paket tertentu
            $meetingPoint = $data['titik_penjemputan'] ?? null;
            $paketLower = strtolower($data['paket']);
            if (!$meetingPoint && (str_contains($paketLower, 'daily trip') || str_contains($paketLower, 'travel to malang'))) {
                $meetingPoint = 'Perum Tunggul Ametung Inside Blok B1';
            }

            $created = PemesananPaket::create([
                'user_id' => auth()->id(),
                'paket' => $data['paket'],
                'peserta' => $data['peserta'],
                'tanggal_keberangkatan' => $data['tanggal_keberangkatan'],
                'titik_penjemputan' => $meetingPoint,
                'total' => $data['total'] ?? 0,
                'status' => 'menunggu',
                'catatan' => $data['catatan'] ?? null,
            ]);
            Log::info('Pemesanan created', ['id' => $created->id ?? null]);
            return redirect()->back()->with('success', 'Booking terkirim. Admin akan menghubungi Anda untuk konfirmasi.')
                ->with('booking_success', [
                    'paket' => $data['paket'],
                    'peserta' => (int) $data['peserta'],
                    'tanggal_keberangkatan' => $data['tanggal_keberangkatan'],
                    'titik_penjemputan' => $meetingPoint,
                    'total' => (int) ($data['total'] ?? 0),
                ]);
        } catch (\Throwable $e) {
            Log::error('Pemesanan store failed: '.$e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return redirect()->back()->withErrors(['pemesanan' => 'Gagal menyimpan pemesanan: '.$e->getMessage()])->withInput();
        }
    }
}
