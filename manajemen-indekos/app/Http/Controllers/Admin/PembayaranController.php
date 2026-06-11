<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penghuni;        // ← ini yang penting
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
   public function index()
{
    $pembayarans = Pembayaran::all();
    return view('admin.pembayaran', compact('pembayarans'));
}

public function create()
{
    $penghunis = Penghuni::all();
    return view('admin.tambah_pembayaran', compact('penghunis'));
}

public function store(Request $request)
{
    // backend isi ini nanti
}
}