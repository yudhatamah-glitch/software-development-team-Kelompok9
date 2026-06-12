<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penghuni;
use Illuminate\Http\Request;

class PenghuniController extends Controller
{
    // Tampilkan daftar penghuni
    public function index()
    {
        $penghunis = Penghuni::all();
        return view('admin.penghuni.index', compact('penghunis'));
    }

    // Form tambah penghuni
    public function create()
    {
        return view('admin.penghuni.create');
    }

    // Simpan penghuni baru
    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string|max:255',
            'no_hp'  => 'required|string|max:20',
            'status' => 'required|string',
        ]);

        Penghuni::create($request->all());

        return redirect()->route('admin.penghuni.index')
                         ->with('success', 'Penghuni berhasil ditambahkan.');
    }

    // Form edit penghuni
    public function edit($id)
    {
        $penghuni = Penghuni::findOrFail($id);
        return view('admin.penghuni.edit', compact('penghuni'));
    }

    // Update penghuni
    public function update(Request $request, $id)
    {
        $penghuni = Penghuni::findOrFail($id);
        $penghuni->update($request->all());

        return redirect()->route('admin.penghuni.index')
                         ->with('success', 'Data penghuni berhasil diperbarui.');
    }

    // Hapus penghuni
    public function destroy($id)
    {
        Penghuni::findOrFail($id)->delete();

        return redirect()->route('admin.penghuni.index')
                         ->with('success', 'Penghuni berhasil dihapus.');
    }
}