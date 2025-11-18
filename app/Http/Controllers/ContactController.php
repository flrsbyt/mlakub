<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.contacts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // TODO: Implement contact storage
        return redirect()->route('contacts.index')->with('success', 'Kontak berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.contacts.show', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.contacts.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // TODO: Implement contact update
        return redirect()->route('contacts.index')->with('success', 'Kontak berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // TODO: Implement contact deletion
        return redirect()->route('contacts.index')->with('success', 'Kontak berhasil dihapus!');
    }

    /**
     * Export contacts to CSV
     */
    public function export()
    {
        // TODO: Implement CSV export
        return redirect()->route('contacts.index')->with('success', 'Export berhasil!');
    }
}