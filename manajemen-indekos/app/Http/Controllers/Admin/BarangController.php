<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Barang;
use App\Models\Kamar;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LIST BARANG PER KAMAR
    |--------------------------------------------------------------------------
    */
    public function index($kamarId)
    {
        $kamar = Kamar::findOrFail($kamarId);

        $barang = Barang::where('kamar_id', $kamarId)->get();

        return view('admin.barang.index', compact(
            'kamar',
            'barang'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | FORM TAMBAH
    |--------------------------------------------------------------------------
    */
    public function create($kamarId)
    {
        $kamar = Kamar::findOrFail($kamarId);

        return view('admin.barang.create', compact('kamar'));
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN
    |--------------------------------------------------------------------------
    */
    public function store(Request $request, $kamarId)
    {
        Barang::create([
            'kamar_id'    => $kamarId,
            'nama_barang' => $request->nama_barang,
            'jumlah'      => $request->jumlah,
            'kondisi'     => $request->kondisi,
            'keterangan'  => $request->keterangan,
        ]);

        return redirect("/kamar/$kamarId/barang")
            ->with('success', 'Barang berhasil ditambahkan');
    }

    /*
    |--------------------------------------------------------------------------
    | FORM EDIT
    |--------------------------------------------------------------------------
    */
    public function edit($kamarId, $id)
    {
        $kamar = Kamar::findOrFail($kamarId);

        $barang = Barang::findOrFail($id);

        return view('admin.barang.edit', compact(
            'kamar',
            'barang'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $kamarId, $id)
    {
        $barang = Barang::findOrFail($id);

        $barang->update([
            'nama_barang' => $request->nama_barang,
            'jumlah'      => $request->jumlah,
            'kondisi'     => $request->kondisi,
            'keterangan'  => $request->keterangan,
        ]);

        return redirect("/kamar/$kamarId/barang")
            ->with('success', 'Barang berhasil diupdate');
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */
    public function destroy($kamarId, $id)
    {
        $barang = Barang::findOrFail($id);

        $barang->delete();

        return back()
            ->with('success', 'Barang berhasil dihapus');
    }
}