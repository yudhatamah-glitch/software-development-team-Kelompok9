@extends('layouts.app')

@section('content')

<div x-data="{ open: false }" class="flex">

    <!-- Tombol Hamburger -->
    <button 
        @click="open = !open"
        class="fixed top-4 left-4 z-50 bg-blue-600 text-white px-3 py-2 rounded-lg shadow-lg"
    >
        ☰
    </button>

    <!-- Sidebar -->
    <div 
        :class="open ? 'translate-x-0' : '-translate-x-full'"
        class="fixed top-0 left-0 w-64 h-screen bg-blue-700 text-white p-5 transform transition-transform duration-300 z-40"
    >

        <h1 class="text-2xl font-bold mb-8 mt-10">
            🏠 Indekos App
        </h1>
        
        <ul class="space-y-4">

            <li>
                <a href="#" class="block hover:bg-blue-500 p-3 rounded-lg">
                    Dashboard
                </a>
            </li>

            <li>
                <a href="#" class="block hover:bg-blue-500 p-3 rounded-lg">
                    Barang
                </a>
            </li>

            <li>
                <a href="#" class="block hover:bg-blue-500 p-3 rounded-lg">
                    Riwayat
                </a>
            </li>

            <li>
                <a href="#" class="block hover:bg-blue-500 p-3 rounded-lg">
                    Penghuni
                </a>
            </li>

            <li>
                <a href="#" class="block hover:bg-blue-500 p-3 rounded-lg">
                    Pembayaran
                </a>
            </li>

        </ul>
    </div>

    <!-- Content -->
    <div class="ml-12 mb-6">

    <h1 class="text-3xl font-bold mb-2">
        Dashboard
    </h1>

    <input 
        type="date"
        value="{{ date('Y-m-d') }}"
        class="border rounded-lg px-4 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
    >

</div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                <h2 class="text-gray-500">Barang Rusak</h2>
                <p class="text-4xl font-bold text-red-600">20</p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                <h2 class="text-gray-500">Penghuni</h2>
                <p class="text-4xl font-bold text-blue-500">5</p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                <h2 class="text-gray-500">Belum Lunas</h2>
                <p class="text-4xl font-bold text-red-500">5</p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                <h2 class="text-gray-500">Keuntungan Bulan ini</h2>
                <p class="text-4xl font-bold text-green-500">5</p>
            </div>

        </div>

    </div>

</div>

@endsection