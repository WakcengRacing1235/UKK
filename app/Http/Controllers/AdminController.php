<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Testimoni;
use App\Models\TracerKuliah;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan dashboard admin
    public function index()
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
        // $testimonis = Testimoni::join('tbl_alumni', 'tbl_testimoni.id_alumni', '=', 'tbl_alumni.id_alumni')
        // ->select('tbl_testimoni.*', 'tbl_alumni.nama_depan', 'tbl_alumni.nama_belakang')
        // ->orderBy('tbl_testimoni.tgl_testimoni', 'desc')
        // ->get();
        $testimonis = Testimoni::with('alumni')->get();
        $alumnis = Alumni::with([ 'konsentrasiKeahlian'])->first();

        // $namaKuliah = Alumni::whereHas('tracerKuliah', function ($query) {
        //     $query->select('tracer_kuliah_kampus'); // Kolom yang ingin diambil
        // })->with('tracerKuliah')->get();

        // $kampus = json_encode([
        //     'tracer_kuliah_kampus' => $namaKuliah,
        // ]);
        // dd($namaKuliah);
        // dd($diagram);

        // Ambil data jumlah alumni berdasarkan nama kampus
        $kampusData = TracerKuliah::select('tracer_kuliah_kampus', DB::raw('COUNT(*) as total'))
            ->groupBy('tracer_kuliah_kampus')
            ->havingRaw('COUNT(*) > 1') // Hanya kampus dengan lebih dari satu alumni
            ->get();

        return view('admin.dashboard', compact('diagram', 'kampusData','testimonis'));
    }


}
