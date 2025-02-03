<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\TracerKerja;
use App\Models\TracerKuliah;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search'); // Input pencarian

        // Query dengan fitur pencarian dan eager loading
        $alumni = Alumni::query()
            ->when($search, function ($query, $search) {
                return $query->where('nama_depan', 'like', "%$search%")
                    ->orWhere('nama_belakang', 'like', "%$search%")
                    ->orWhereRaw("CONCAT(nama_depan, ' ', nama_belakang) LIKE ?", ["%$search%"])
                    ->orWhere('nisn', 'like', "%$search%");
            })
            ->with(['tahunlulus', 'statusAlumni', 'konsentrasiKeahlian']) // Eager loading
            ->paginate(10); // Pagination

        return view('admin.alumni.index', compact('alumni', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $alumni = Alumni::with([
            'konsentrasiKeahlian.programKeahlian.bidangKeahlian'
        ])->findOrFail($id);
        return view('admin.alumni.show', compact('alumni'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan alumni berdasarkan id
        $alumni = Alumni::findOrFail($id);
        $kerja = TracerKerja::where('id_alumni', $id)->first(); // Temukan TracerKerja terkait
        $kuliah = TracerKuliah::where('id_alumni', $id)->first(); // Temukan TracerKuliah terkait

        // Hapus semua testimoni yang berhubungan dengan alumni ini
        $alumni->testimoni()->delete();  // Menghapus semua testimoni terkait

        // Hapus TracerKerja dan TracerKuliah jika ada
        if ($kerja) {
            $kerja->delete();  // Menghapus data TracerKerja yang terkait
        }

        if ($kuliah) {
            $kuliah->delete();  // Menghapus data TracerKuliah yang terkait
        }

        // Hapus alumni
        $alumni->delete();

        // Kembalikan ke halaman daftar alumni dengan pesan sukses
        return redirect()->route('admin.alumni.index')->with('success', 'Data alumni beserta testimoninya berhasil dihapus.');
    }


}
