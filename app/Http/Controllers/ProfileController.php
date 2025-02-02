<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
USE App\Models\Alumni;
USE App\Models\TracerKerja;
USE App\Models\TracerKuliah;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index()
    {
        // Ambil email pengguna yang sedang login
        $email = auth()->user()->email;

        // Cari data alumni berdasarkan email
        $alumni = Alumni::where('email', $email)
            ->with(['tracerKuliah', 'tracerKerja'])
            ->first();

        // Jika tidak ditemukan, redirect dengan pesan error
        if (!$alumni) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        // Kirim data ke view
        return view('alumni.profile.index', [
            'alumni' => $alumni,
            'tracerKuliah' => $alumni->tracerKuliah->first(),
            'tracerKerja' => $alumni->tracerKerja->first(),
        ]);
    }

    
}
