<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class LaporBarangController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | FORM LAPOR BARANG RUSAK (penghuni)
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('penghuni.lapor_barang');
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN LAPORAN RUSAK (penghuni)
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'lokasi'      => 'required|string',
            'deskripsi'   => 'required|string',
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'nama_barang' => $request->nama_barang,
            'lokasi'      => $request->lokasi,
            'deskripsi'   => $request->deskripsi,
            'kamar_id'    => 1, // ganti dengan session kamar_id nanti
            'status'      => 'Rusak',
            'kondisi'     => 'Belum Ditangani',
        ];

        if ($request->hasFile('foto')) {
            $foto     = $request->file('foto');
            $namaFoto = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('uploads/barang'), $namaFoto);
            $data['foto'] = 'uploads/barang/' . $namaFoto;
        }

        Barang::create($data);

        return redirect()->back()->with('success', 'Laporan kerusakan berhasil dikirim ke admin!');
    }
}