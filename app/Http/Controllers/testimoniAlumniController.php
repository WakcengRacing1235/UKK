<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;
use App\Models\Alumni;

class testimoniAlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     
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
    
        $testimoni = Testimoni::where('id_alumni', $alumni->id_alumni)->exists();
    
        if ($testimoni) {
            return redirect()->route('alumni.dashboard')
                ->with('success-test-create', 'Anda sudah mengisi data tracer kuliah.');
        }

        $alumni = Alumni::all();
        return view('alumni.testimoni.create', compact('alumni'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_alumni' => 'required|exists:tbl_alumni,id_alumni',
            'testimoni' => 'required|string',
            'tgl_testimoni' => 'required|date',
        ]);

        Testimoni::create([
            'id_alumni' => $request->id_alumni,
            'testimoni' => $request->testimoni,
            'tgl_testimoni' => $request->tgl_testimoni,
        ]);

        return redirect()->route('alumni.dashboard')->with('success-test', 'Testimoni berhasil ditambahkan.');
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
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
