@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-6">Data Penghuni</h1>

<a href="/tambah-penghuni" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
    + Tambah Penghuni
</a>

<div class="bg-white shadow rounded-2xl overflow-hidden">
<table class="w-full">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-3">No</th>
            <th class="p-3">Nama</th>
            <th class="p-3">Kamar</th>
            <th class="p-3">No HP</th>
        </tr>
    </thead>
    <tbody>
        <tr class="border-t text-center">
            <td class="p-3">1</td>
            <td>Reno</td>
            <td>A1</td>
            <td>08123456789</td>
        </tr>
    </tbody>
</table>
</div>
@endsection