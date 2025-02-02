<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KonsentrasiKeahlian;
use App\Models\ProgramKeahlian;
use Illuminate\Http\Request;

class KonsentrasiKeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konsentrasiKeahlian = KonsentrasiKeahlian::with('programKeahlian')->get();
        return view('admin.konsentrasi.index', compact('konsentrasiKeahlian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programKeahlian = ProgramKeahlian::all();
        return view('admin.konsentrasi.create', compact('programKeahlian'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_program_keahlian' => 'required|exists:tbl_program_keahlian,id_program_keahlian',
            'kode_konsentrasi_keahlian' => 'required|string|max:10',
            'konsentrasi_keahlian' => 'required|string|max:100',
        ]);

        KonsentrasiKeahlian::create($validated);

        return redirect()->route('konsentrasi.index')->with('success-kons-create', 'Konsentrasi Keahlian berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $konsentrasiKeahlian = KonsentrasiKeahlian::with('programKeahlian')->findOrFail($id);
        return view('konsentrasi.show', compact('konsentrasiKeahlian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $konsentrasiKeahlian = KonsentrasiKeahlian::findOrFail($id);
        $programKeahlian = ProgramKeahlian::all();
        return view('admin.konsentrasi.edit', compact('konsentrasiKeahlian', 'programKeahlian'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_program_keahlian' => 'required|exists:tbl_program_keahlian,id_program_keahlian',
            'kode_konsentrasi_keahlian' => 'required|string|max:10',
            'konsentrasi_keahlian' => 'required|string|max:100',
        ]);

        $konsentrasiKeahlian = KonsentrasiKeahlian::findOrFail($id);
        $konsentrasiKeahlian->update($validated);

        return redirect()->route('konsentrasi.index')->with('success-kons-edit', 'Konsentrasi Keahlian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $konsentrasiKeahlian = KonsentrasiKeahlian::findOrFail($id);
        $konsentrasiKeahlian->delete();

        return redirect()->route('konsentrasi.index')->with('success-kons-delete', 'Konsentrasi Keahlian berhasil dihapus.');
    }
}
