@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-6">Pembayaran</h1>

<div class="bg-white shadow rounded-2xl overflow-hidden">
<table class="w-full">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-3">Nama</th>
            <th class="p-3">Kamar</th>
            <th class="p-3">Bulan</th>
            <th class="p-3">Status</th>
        </tr>
    </thead>
    <tbody>
        <tr class="border-t text-center">
            <td class="p-3">Reno</td>
            <td class="p-3">A1</td>
            <td class="p-3">April</td>
            <td class="p-3 text-green-500 font-bold">Lunas</td>
        </tr>
    </tbody>
</table>
</div>
@endsection