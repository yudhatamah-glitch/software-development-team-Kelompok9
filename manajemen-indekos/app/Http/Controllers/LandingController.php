<?php

namespace App\Http\Controllers;

use App\Models\Kamar;

class LandingController extends Controller
{
    public function index()
    {
        $kamar = Kamar::with('fotos')
            ->where('status', 'kosong')
            ->get();

        return view('landing', compact('kamar'));
    }
}