<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\tracerkerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TracerkerjaalumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function autocomplete(Request $request)
    {
        $search = $request->get('term'); // Term pencarian dari input
        $alumni = DB::table('alumni')
            ->where('nama_depan', 'LIKE', "%{$search}%")
            ->orWhere('nama_belakang', 'LIKE', "%{$search}%")
            ->select('id_alumni', DB::raw('CONCAT(nama_depan, " ", nama_belakang) as nama'))
            ->get();

        $result = [];
        foreach ($alumni as $a) {
            $result[] = ['id' => $a->id_alumni, 'value' => $a->nama];
        }

        return response()->json($result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mendapatkan email user yang sedang login
        $userEmail = auth()->user()->email;
        // dd($userEmail);
    
        // Mencari data alumni berdasarkan email atau email_alumni
        $alumni = Alumni::where(function ($query) use ($userEmail) {
            $query->where('email', $userEmail)
                  ->orWhere('email_alumni', $userEmail);
        })->first();
        // dd($alumni);

    
        // **PERBAIKAN: Cek apakah alumni ditemukan sebelum mengakses id_alumni**
        if (!$alumni) {
            return redirect()->route('tracerstudy.create')
                ->with('warning', 'Silakan lengkapi data alumni terlebih dahulu.');
        }
    
        // Periksa apakah data tracer kerja sudah diisi
        $tracerKerja = TracerKerja::where('id_alumni', $alumni->id_alumni)->exists();
    
        if ($tracerKerja) {
            return redirect()->route('alumni.dashboard')
                ->with('success-kerja-create', 'Anda sudah mengisi data tracer kerja.');
        }
        $allAlumni = Alumni::all();
        // Jika belum mengisi tracer kerja, tampilkan form
        return view('alumni.tracerkerja.create', compact('alumni' , 'allAlumni'));
    }
    


    public function store(Request $request)
    {
        $request->validate([
            'id_alumni' => 'required|exists:tbl_alumni,id_alumni',
            'tracer_kerja_pekerjaan' => 'required|string|max:50',
            'tracer_kerja_nama' => 'required|string|max:50',
            'tracer_kerja_jabatan' => 'required|string|max:50',
            'tracer_kerja_status' => 'required|string|max:50',
            'tracer_kerja_lokasi' => 'required|string|max:50',
            'tracer_kerja_alamat' => 'required|string|max:50',
            'tracer_kerja_tgl_mulai' => 'required|date',
            'tracer_kerja_gaji' => 'required|string|max:50',
        ]);
        // Mendapatkan email pengguna yang sedang login
        $userEmail = auth()->user()->email;

        // Cari alumni berdasarkan id dan email pengguna login
        $alumni = Alumni::where('id_alumni', $request->id_alumni)
            ->where('email_alumni', $userEmail)
            ->first();

        // Jika tidak ditemukan, kembalikan dengan pesan error
        if (!$alumni) {
            return redirect()->route('alumni.tracerkerja.create')->with('error-kerja', 'Nama Alumni Tidak Sama Dengan Email Yang Terdaftar!');
        }

        // Jika validasi lolos, simpan data tracer kerja
        TracerKerja::create($request->all());
        return redirect()->route('alumni.dashboard')->with('success-kerja', 'Data tracer kerja berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(tracerkerja $tracerkerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tracerkerja $tracerkerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tracerkerja $tracerkerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tracerkerja $tracerkerja)
    {
        //
    }
}
