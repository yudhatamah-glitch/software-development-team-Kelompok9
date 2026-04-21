@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-6">Data Barang</h1>

<!-- Tombol Tambah Barang -->
<a href="/tambah" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-blue-700">
    + Tambah Barang
</a>

<div class="bg-white shadow rounded-2xl overflow-hidden">
<table class="w-full">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-3">No</th>
            <th class="p-3">Nama Barang</th>
            <th class="p-3">Kategori</th>
            <th class="p-3">Status</th>
        </tr>
    </thead>
    <tbody>
        <tr class="border-t text-center hover:bg-gray-50">
            <td class="p-3">1</td>
            <td class="p-3">Kipas</td>
            <td class="p-3">Elektronik</td>
            <td class="p-3 text-green-500 font-semibold">Tersedia</td>
        </tr>
    </tbody>
</table>
</div>
@endsection