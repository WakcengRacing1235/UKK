<?php

namespace App\Http\Controllers;
use App\Models\Alumni;
use App\Models\KonsentrasiKeahlian;
use App\Models\StatusAlumni;
use App\Models\TahunLulus;
use App\Models\Testimoni;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kerja = Alumni::whereHas('statusAlumni', function ($query) {
            $query->where('id_status_alumni', '1');
        })->with('statusAlumni')->count();
        $kuliah = Alumni::whereHas('statusAlumni', function ($query) {
            $query->where('id_status_alumni', '2');
        })->with('statusAlumni')->count();
        $tidakaktif = Alumni::whereHas('statusAlumni', function ($query) {
            $query->where('id_status_alumni', '3');
        })->with('statusAlumni')->count();
        $diagram = json_encode([
            'kerja' => $kerja,
            'kuliah' => $kuliah,
            'tidakaktif' => $tidakaktif,
        ]);
        $alumnis = Alumni::with(['tahunLulus', 'konsentrasiKeahlian'])->where('email_alumni', Auth::user()->email)->first();
        $testimonis = Testimoni::with('alumni')->get();

        return view('alumni.dashboard', compact('alumnis', 'diagram', 'testimonis'));
    }

    //fungsi untuk mencari data alumni berdasarkan NISN,NIK,NAMA,TAHUN,DAN KONSENTRASI
    public function search(Request $request)
    {
        $search = $request->input('search');

        // Jika tidak ada input pencarian, kembali dengan pesan error
        if (!$search) {
            return redirect()->back()->with('error', 'Masukkan kata kunci untuk mencari data alumni.');
        }

        // Query pencarian data alumni
        $alumni = Alumni::where(function ($q) use ($search) {
            $q->where('nisn', 'like', "%$search%")
                ->orWhere('nik', 'like', "%$search%")
                ->orWhere('nama_depan', 'like', "%$search%")
                ->orWhere('nama_belakang', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%");
        })
            ->orWhereHas('konsentrasiKeahlian', function ($q) use ($search) {
                $q->where('konsentrasi_keahlian', 'like', "%$search%");
            })
            ->orWhereHas('tahunLulus', function ($q) use ($search) {
                $q->where('tahun_lulus', 'like', "%$search%");
            })
            ->orWhereHas('statusAlumni', function ($q) use ($search) {
                $q->where('status', 'like', "%$search%");
            })
            ->get(); // Ambil data setelah filter selesai

        // Menentukan apakah data alumni sudah lengkap
        foreach ($alumni as $a) {
            $a->isComplete = ($a->email_alumni  && $a->no_hp && $a->alamat && $a->jenis_kelamin &&$a->id_status_alumni);
        }

        return view('alumni.tracerstudy.search', compact('alumni'));
    }




    // fungsi untuk mernampilkan halaman pengisian
    public function fillData($id)
    {
        $alumni = Alumni::findOrFail($id);
        $status_alumni = StatusAlumni::all();
        $user = auth()->user();

        // Ambil data alumni berdasarkan email
        $alumnis = Alumni::where('email_alumni', $user->email)->first();

        // Cek apakah data alumni sudah lengkap
        $isComplete = $alumnis  && $alumnis->no_hp && $alumnis->alamat && $alumnis->jenis_kelamin && $alumnis->id_status_alumni;

        // Jika data sudah lengkap, alihkan ke dashboard
        if ($isComplete) {
            return redirect()->route('alumni.dashboard')->with('error', 'Anda sudah mengisi data lengkap.');
        }

        // Jika belum lengkap, izinkan mengisi
        return view('alumni.tracerstudy.fill-data', compact('alumni', 'alumnis','status_alumni'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mendapatkan email user yang sedang login
        // $userEmail = auth()->user()->email;

        // // Mencari data alumni berdasarkan email user
        // $alumni = Alumni::whereEmail($userEmail)->first();

        // // Jika data alumni ditemukan, redirect ke dashboard dengan pesan sukses
        // if ($alumni) {
        //     return redirect()->route('alumni.dashboard')->with('success-Alumni', 'Anda sudah terdaftar sebagai alumni.');
        // }

        // Jika data alumni tidak ditemukan, siapkan data untuk form tracer study
        $tahunLulus = TahunLulus::all();
        $konsentrasiKeahlian = KonsentrasiKeahlian::all();
        $statusAlumni = StatusAlumni::all();

        // Menampilkan form tracer study
        return view('alumni.tracerstudy.search', compact('tahunLulus', 'konsentrasiKeahlian', 'statusAlumni'));
    }



    public function storeFilledData(Request $request, $id)
    {
        $alumni = Alumni::findOrFail($id);

        // Validasi input
        $validatedData = $request->validate([
            'jenis_kelamin' => 'nullable|string|max:10',
            'tempat_lahir' => 'nullable|string|max:50',
            'tgl_lahir' => 'nullable|date',
            'alamat' => 'nullable|string|max:100',
            'no_hp' => 'nullable|string|max:15',
            'akun_fb' => 'nullable|string|max:50',
            'akun_ig' => 'nullable|string|max:50',
            'akun_tiktok' => 'nullable|string|max:50',
            'email_alumni' => 'nullable|email|max:50',
            'id_status_alumni' => 'required',
        ]);

        // Hanya memperbarui data yang masih kosong
        foreach ($validatedData as $key => $value) {
            if (empty($alumni->$key)) {
                $alumni->$key = $value;
            }
        }

        $alumni->save();

        return redirect()->route('alumni.tracerstudy.search')->with('success', 'Data berhasil disimpan!');
    }


    /** 
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }

}
