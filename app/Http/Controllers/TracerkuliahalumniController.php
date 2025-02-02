<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\tracerkuliah;
use Illuminate\Http\Request;

class TracerkuliahalumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userEmail = auth()->user()->email;
        $alumni = Alumni::whereEmail($userEmail)->first();
    
        if (!$alumni) {
            return redirect()->route('tracerstudy.create')
                ->with('warning', 'Silakan lengkapi data alumni terlebih dahulu.');
        }
    
        $tracerKuliah = TracerKuliah::where('id_alumni', $alumni->id_alumni)->exists();
    
        if ($tracerKuliah) {
            return redirect()->route('alumni.dashboard')
                ->with('success-kuliah-create', 'Anda sudah mengisi data tracer kuliah.');
        }

        $alumni = Alumni::all();
        return view('alumni.tracerkuliah.create', compact('alumni'));
    }
    


    public function store(Request $request)
    {
        $request->validate([
            'id_alumni' => 'required|exists:tbl_alumni,id_alumni',
            'tracer_kuliah_kampus' => 'required|string|max:45',
            'tracer_kuliah_status' => 'required|string|max:45',
            'tracer_kuliah_jenjang' => 'required|string|max:45',
            'tracer_kuliah_jurusan' => 'required|string|max:45',
            'tracer_kuliah_linier' => 'required|string|max:45',
            'tracer_kuliah_alamat' => 'required|string|max:45',
        ]);
        $userEmail = auth()->user()->email;

        // Cari alumni berdasarkan id dan email pengguna login
        $alumni = Alumni::where('id_alumni', $request->id_alumni)
            ->where('email', $userEmail)
            ->first();

        // Jika tidak ditemukan, kembalikan dengan pesan error
        if (!$alumni) {
            return redirect()->route('alumni.tracerkuliah.create')->with('error-kuliah', 'Nama Alumni Tidak Sama Dengan Email Yang Terdaftar!');

        }


        TracerKuliah::create($request->all());

        return redirect()->route('alumni.dashboard')->with('success-kuliah', 'Data tracer kuliah berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(tracerkuliah $tracerkuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tracerkuliah $tracerkuliah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tracerkuliah $tracerkuliah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tracerkuliah $tracerkuliah)
    {
        //
    }
}
