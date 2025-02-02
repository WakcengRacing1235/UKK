<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\TahunLulus;
use Illuminate\Http\Request;

class TahunLulusController extends Controller
{
    public function index()
    {
        $tahunLulus = TahunLulus::all();
        return view('admin.tahun-lulus.index', compact('tahunLulus'));
    }

    public function create()
    {
        return view('admin.tahun-lulus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun_lulus' => 'required|max:4',
            'keterangan' => 'nullable|max:50',
        ]);

        TahunLulus::create($request->all());
        return redirect()->route('tahun-lulus.index')->with('success-tahun-create', 'Tahun Lulus berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $tahunLulus = TahunLulus::findOrFail($id);
        return view('admin.tahun-lulus.edit', compact('tahunLulus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun_lulus' => 'required|max:4',
            'keterangan' => 'nullable|max:50',
        ]);
    
        $tahunLulus = TahunLulus::findOrFail($id);
        $tahunLulus->update($request->all());
        return redirect()->route('tahun-lulus.index')->with('success-tahun-edit', 'Tahun Lulus berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $tahunlulus = TahunLulus::findOrFail($id);
        $tahunlulus->delete();

        return redirect()->route('tahun-lulus.index')->with('success-tahun-delete', 'status berhasil dihapus.');
    }
}
