@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-6">Tambah Barang</h1>

<form class="bg-white p-6 rounded-2xl shadow max-w-lg">

    <div class="mb-4">
        <label class="block mb-1">Nama Barang</label>
        <input type="text" class="w-full border p-2 rounded-lg focus:ring-2 focus:ring-blue-500">
    </div>

    <div class="mb-4">
        <label class="block mb-1">Kategori</label>
        <input type="text" class="w-full border p-2 rounded-lg">
    </div>

    <div class="mb-4">
        <label class="block mb-1">Status</label>
        <select class="w-full border p-2 rounded-lg">
            <option>Tersedia</option>
            <option>Dipinjam</option>
        </select>
    </div>

    <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
        Simpan
    </button>

</form>
@endsection