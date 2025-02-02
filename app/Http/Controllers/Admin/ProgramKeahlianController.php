<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\bidangKeahlian;
use App\Models\ProgramKeahlian;
use App\Models\KonsentrasiKeahlian;
use Illuminate\Http\Request;

class ProgramKeahlianController extends Controller
{
    public function index()
    {
        $programKeahlian = ProgramKeahlian::with('bidangKeahlian')->get();
        return view('admin.program.index', compact('programKeahlian'));
    }

    public function create()
    {
        $bidangKeahlian = BidangKeahlian::all(); // Ambil semua data bidang keahlian
        return view('admin.program.create', compact('bidangKeahlian'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_bidang_keahlian' => 'required|exists:tbl_bidang_keahlian,id_bidang_keahlian',
            'kode_program_keahlian' => 'required|string|max:10|unique:tbl_program_keahlian,kode_program_keahlian',
            'program_keahlian' => 'required|string|max:100',
        ]);

        ProgramKeahlian::create($validated);

        return redirect()->route('program.index')->with('success-prom-create', 'Program Keahlian berhasil ditambahkan.');
    }

    public function show($id)
    {
        $programKeahlian = ProgramKeahlian::with('konsentrasiKeahlian')->findOrFail($id);
        return view('program.show', compact('programKeahlian'));
    }

    public function edit($id)
    {
        
        $bidangKeahlian = BidangKeahlian::all(); 
        $programKeahlian = ProgramKeahlian::findOrFail($id);
        return view('admin.program.edit', compact('programKeahlian','bidangKeahlian'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_bidang_keahlian' => 'required|exists:tbl_bidang_keahlian,id_bidang_keahlian',
            'kode_program_keahlian' => 'required|string|max:100',
            'program_keahlian' => 'required|string|max:100',
        ]);


        $programKeahlian = ProgramKeahlian::findOrFail($id);
        $programKeahlian->update($validated);
        return redirect()->route('program.index')->with('success-prom-edit', 'Program Keahlian berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $programKeahlian = ProgramKeahlian::findOrFail($id);
        $programKeahlian->delete();
        return redirect()->route('program.index')->with('success-prom-delete', 'Program Keahlian berhasil dihapus.');
    }
}
