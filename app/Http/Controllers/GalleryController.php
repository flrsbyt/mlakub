<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class GalleryController extends Controller
{
    // Admin: list galeri
    public function adminIndex()
    {
        $galleries = Gallery::latest()->paginate(12);

        // Dynamic stats
        $total = Gallery::count();
        $photos = Gallery::where('type', 'image')->count();
        $videos = Gallery::where('type', 'video')->count();

        $start = now()->startOfMonth();
        $end = now()->endOfMonth();
        $totalThisMonth = Gallery::whereBetween('created_at', [$start, $end])->count();
        $photosThisMonth = Gallery::where('type', 'image')->whereBetween('created_at', [$start, $end])->count();
        $videosThisMonth = Gallery::where('type', 'video')->whereBetween('created_at', [$start, $end])->count();

        $galleryStats = [
            'total' => $total,
            'photos' => $photos,
            'videos' => $videos,
            'total_this_month' => $totalThisMonth,
            'photos_this_month' => $photosThisMonth,
            'videos_this_month' => $videosThisMonth,
        ];

        return view('admin.galery', compact('galleries', 'galleryStats'));
    }

    // Admin: simpan media baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:100',
            'type' => 'nullable|in:image,video',
            'image' => 'required|file|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'category' => $validated['category'] ?? null,
            'type' => $validated['type'] ?? 'image',
            'image_path' => $path,
        ]);

        return back()->with('success', 'Media galeri berhasil diunggah');
    }

    // Admin: update media
    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:100',
            'type' => 'nullable|in:image,video',
            'image' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        if ($request->hasFile('image')) {
            if ($gallery->image_path && Storage::disk('public')->exists($gallery->image_path)) {
                Storage::disk('public')->delete($gallery->image_path);
            }
            $gallery->image_path = $request->file('image')->store('gallery', 'public');
        }

        $gallery->title = $validated['title'];
        $gallery->description = $validated['description'] ?? null;
        $gallery->category = $validated['category'] ?? null;
        $gallery->type = $validated['type'] ?? 'image';
        $gallery->save();

        return back()->with('success', 'Media galeri berhasil diperbarui');
    }

    // Admin: hapus media
    public function destroy(Gallery $gallery)
    {
        if ($gallery->image_path && Storage::disk('public')->exists($gallery->image_path)) {
            Storage::disk('public')->delete($gallery->image_path);
        }
        $gallery->delete();

        return back()->with('success', 'Media galeri berhasil dihapus');
    }

    // Publik: tampilkan galeri di website
    public function publicIndex()
    {
        $galleries = Gallery::latest()->get();
        return view('galeri', compact('galleries'));
    }
}
