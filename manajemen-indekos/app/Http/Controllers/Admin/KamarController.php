<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Kamar;
use App\Models\FotoKamar;
use App\Models\Barang;

use Illuminate\Support\Facades\Storage;

class KamarController extends Controller
{
    public function index()
    {
        $kamar = Kamar::all();

        return view('admin.kamar.index', compact('kamar'));
    }

    public function create()
    {
        return view('admin.kamar.create');
    }

    public function store(Request $request)
    {
        // CREATE KAMAR
        $kamar = Kamar::create(
            $request->except('foto', 'barang')
        );

        // =========================
        // UPLOAD FOTO
        // =========================

        if ($request->hasFile('foto'))
        {
            foreach ($request->file('foto') as $file)
            {
                $path = $file->store('kamar', 'public');

                FotoKamar::create([
                    'kamar_id' => $kamar->id,
                    'foto' => $path
                ]);
            }
        }

        // =========================
        // SIMPAN BARANG
        // =========================

        if ($request->barang)
        {
            foreach ($request->barang as $item)
            {
                Barang::create([
                    'kamar_id' => $kamar->id,
                    'nama_barang' => $item,
                    'jumlah' => 1,
                    'kondisi' => 'baik'
                ]);
            }
        }

        return redirect('/kamar');
    }

    public function edit($id)
    {
        $kamar = Kamar::findOrFail($id);

        return view('admin.kamar.edit', compact('kamar'));
    }

    public function update(Request $request, $id)
    {
        $kamar = Kamar::findOrFail($id);

        // =========================
        // UPDATE DATA KAMAR
        // =========================

        $kamar->update(
            $request->except(
                'foto',
                'barang',
                'hapus_foto'
            )
        );

        // =========================
        // HAPUS FOTO YANG DIPILIH
        // =========================

        if ($request->has('hapus_foto'))
        {
            foreach ($request->hapus_foto as $fotoId)
            {
                $foto = FotoKamar::find($fotoId);

                if ($foto)
                {
                    // HAPUS FILE
                    Storage::disk('public')
                        ->delete($foto->foto);

                    // HAPUS DATABASE
                    $foto->delete();
                }
            }
        }

        // =========================
        // TAMBAH FOTO BARU
        // =========================

        if ($request->hasFile('foto'))
        {
            foreach ($request->file('foto') as $file)
            {
                $path = $file->store('kamar', 'public');

                FotoKamar::create([
                    'kamar_id' => $kamar->id,
                    'foto' => $path
                ]);
            }
        }

        // =========================
        // UPDATE BARANG
        // =========================

        // HAPUS BARANG LAMA
        Barang::where('kamar_id', $kamar->id)
            ->delete();

        // INSERT BARANG BARU
        if ($request->barang)
        {
            foreach ($request->barang as $item)
            {
                Barang::create([
                    'kamar_id' => $kamar->id,
                    'nama_barang' => $item,
                    'jumlah' => 1,
                    'kondisi' => 'baik'
                ]);
            }
        }

        return redirect('/kamar');
    }

    public function destroy($id)
    {
        $kamar = Kamar::findOrFail($id);

        // =========================
        // HAPUS SEMUA FILE FOTO
        // =========================

        foreach ($kamar->fotos as $foto)
        {
            Storage::disk('public')
                ->delete($foto->foto);
        }

        // =========================
        // HAPUS DATA KAMAR
        // =========================

        $kamar->delete();

        return redirect('/kamar');
    }

    public function hapusFoto($id)
    {
        $foto = FotoKamar::findOrFail($id);

        // HAPUS FILE
        Storage::disk('public')
            ->delete($foto->foto);

        // HAPUS DATABASE
        $foto->delete();

        return back();
    }
}