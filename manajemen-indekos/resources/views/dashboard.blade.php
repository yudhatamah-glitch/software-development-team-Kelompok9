@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-6">Dashboard</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
        <h2 class="text-gray-500">Total Barang</h2>
        <p class="text-4xl font-bold text-blue-600">20</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
        <h2 class="text-gray-500">Barang Dipinjam</h2>
        <p class="text-4xl font-bold text-red-500">5</p>
    </div>

</div>
@endsection