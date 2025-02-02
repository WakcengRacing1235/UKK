<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\KonsentrasiKeahlian;
use App\Models\StatusAlumni;
use App\Models\TahunLulus;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class AlumniToolsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); // Input pencarian

        // Query dengan fitur pencarian dan eager loading
        $alumni = Alumni::query()
            ->when($search, function ($query, $search) {
                return $query->where('nama_depan', 'like', "%$search%")
                    ->orWhere('nama_belakang', 'like', "%$search%")
                    ->orWhereRaw("CONCAT(nama_depan, ' ', nama_belakang) LIKE ?", ["%$search%"])
                    ->orWhere('nisn', 'like', "%$search%")
                    ->orWhereHas('konsentrasiKeahlian', function ($query) use ($search) {
                        $query->where('konsentrasi_keahlian', 'like', "%$search%");
                    });
            })
            ->with(['tahunlulus', 'statusAlumni', 'konsentrasiKeahlian']) // Eager loading
            ->paginate(10); // Pagination

        // Mengirim data ke view
        return view('alumni.Dataalumni.index', compact('alumni', 'search'));
    }


    public function show()
    {
        return view('alumni.Dataalumni.show', compact('alumni'));
    }
}
