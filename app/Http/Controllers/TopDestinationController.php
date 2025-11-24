<?php

namespace App\Http\Controllers;

use App\Models\TopDestination;
use Illuminate\Http\Request;

class TopDestinationController extends Controller
{
    public function index()
    {
        $items = TopDestination::orderBy('sort_order')->paginate(10);
        return view('admin.top_destinations.index', compact('items'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'bookings' => 'nullable|integer|min:0',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);
        $data['bookings'] = $data['bookings'] ?? 0;
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = (bool)($data['is_active'] ?? true);
        TopDestination::create($data);
        return back()->with('success', 'Top destinasi ditambahkan');
    }

    public function update(Request $request, TopDestination $top_destination)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'bookings' => 'nullable|integer|min:0',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);
        $top_destination->update([
            'name' => $data['name'],
            'bookings' => $data['bookings'] ?? 0,
            'sort_order' => $data['sort_order'] ?? 0,
            'is_active' => (bool)($data['is_active'] ?? false),
        ]);
        return back()->with('success', 'Top destinasi diperbarui');
    }

    public function destroy(TopDestination $top_destination)
    {
        $top_destination->delete();
        return back()->with('success', 'Top destinasi dihapus');
    }
}
