<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sekolah;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sekolah = Sekolah::all();
        return view('admin.sekolah.index', compact('sekolah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sekolah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'npsn' => 'required|string|max:10',
            'nss' => 'nullable|string|max:20',
            'nama_sekolah' => 'required|string|max:50',
            'alamat' => 'nullable|string|max:50',
            'no_telp' => 'nullable|string|max:15',
            'website' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:50',
        ]);

        Sekolah::create($validated);

        return redirect()->route('sekolah.index')->with('success-sek-create', 'Data sekolah berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sekolah = Sekolah::findOrFail($id);
        return view('admin.sekolah.edit', compact('sekolah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'npsn' => 'required|string|max:10',
            'nss' => 'nullable|string|max:20',
            'nama_sekolah' => 'required|string|max:50',
            'alamat' => 'nullable|string|max:50',
            'no_telp' => 'nullable|string|max:15',
            'website' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:50',
        ]);

        $sekolah = Sekolah::findOrFail($id);
        $sekolah->update($validated);

        return redirect()->route('sekolah.index')->with('success-sek-edit', 'Data sekolah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sekolah = Sekolah::findOrFail($id);
        $sekolah->delete();

        return redirect()->route('sekolah.index')->with('success-sek-delete', 'Data sekolah berhasil dihapus.');
    }
}
