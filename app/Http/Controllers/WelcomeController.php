<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
       
        $testimonis = Testimoni::with('alumni')->get();
        
        return view('welcome', compact('testimonis'));
    }
}
