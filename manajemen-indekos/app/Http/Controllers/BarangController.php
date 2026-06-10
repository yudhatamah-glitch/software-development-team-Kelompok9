<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function create()
    {
        return view('penghuni.tambah-barang');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'deskripsi'   => 'nullable|string',
            'kategori'    => 'nullable|string',
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();
        
        // Hardcode untuk sementara
        $data['kamar_id'] = 1;  
        $data['status'] = 'Tersedia';   // Default saat ditambahkan

        // Upload foto
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFoto = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('uploads/barang'), $namaFoto);
            $data['foto'] = 'uploads/barang/' . $namaFoto;
        }

        Barang::create($data);

        return redirect()->back()->with('success', 'Barang pinjaman berhasil ditambahkan!');
    }
}