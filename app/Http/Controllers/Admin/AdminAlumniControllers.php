<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Alumni;
use App\Models\KonsentrasiKeahlian;
use App\Models\TahunLulus;
use App\Models\StatusAlumni;

class AdminAlumniControllers extends Controller
{

  public function create()
    {
        $konsentrasi = KonsentrasiKeahlian::all();
        $tahun_lulus = TahunLulus::all();

        return view('admin.alumni.create', compact('konsentrasi', 'tahun_lulus'));
    }
  

    

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|unique:tbl_alumni,nisn|max:20',
            'nik' => 'required|unique:tbl_alumni,nik|max:20',
            'nama_depan' => 'required|max:50',
            'nama_belakang' => 'nullable|max:50',
            'email' => 'required|email|unique:tbl_alumni,email|max:50',
            'id_konsentrasi_keahlian' => 'required',
            'id_tahun_lulus' => 'required',
        ], [
            'nisn.unique' => 'NISN sudah terdaftar!',
            'nik.unique' => 'NIK sudah terdaftar!',
            'email.unique' => 'Email sudah digunakan!',
        ]);
    
        Alumni::create([
            'nisn' => $request->nisn,
            'nik' => $request->nik,
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'email' => $request->email,
            'id_konsentrasi_keahlian' => $request->id_konsentrasi_keahlian,
            'id_tahun_lulus' => $request->id_tahun_lulus,
            'password' => bcrypt('password123'),
            'status_login' => '0',
        ]);
    
        return redirect()->route('admin.alumni.index')->with('success', 'Alumni berhasil ditambahkan.');
    }
    
    
    
}

