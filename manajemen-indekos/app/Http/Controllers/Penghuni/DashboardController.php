<?php

namespace App\Http\Controllers\Penghuni;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('penghuni.dashboard');
    }
}