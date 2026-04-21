@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-6">Tambah Penghuni</h1>

<form class="bg-white p-6 rounded-2xl shadow max-w-lg">

    <div class="mb-4">
        <label>Nama</label>
        <input type="text" class="w-full border p-2 rounded-lg">
    </div>

    <div class="mb-4">
        <label>No HP</label>
        <input type="text" class="w-full border p-2 rounded-lg">
    </div>

    <div class="mb-4">
        <label>Kamar</label>
        <input type="text" class="w-full border p-2 rounded-lg">
    </div>

    <button class="bg-blue-600 text-white px-6 py-2 rounded-lg">
        Simpan
    </button>

</form>
@endsection