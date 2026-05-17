@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">Data Kamar</h1>

<div class="bg-white p-6 rounded-2xl shadow">

    <form class="space-y-4">

        <div>
            <label class="block mb-2 font-semibold">
                Nomor Kamar
            </label>

            <input 
                type="text"
                placeholder="Masukkan nomor kamar"
                class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </div>

        <div>
            <label class="block mb-2 font-semibold">
                Tipe Kamar
            </label>

            <select 
                class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                <option>Kamar Standard</option>
                <option>Kamar VIP</option>
                <option>Kamar AC</option>
            </select>
        </div>

        <div>
            <label class="block mb-2 font-semibold">
                Harga Kamar
            </label>

            <input 
                type="number"
                placeholder="Masukkan harga kamar"
                class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </div>

        <div>
            <label class="block mb-2 font-semibold">
                Status
            </label>

            <select 
                class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                <option>Tersedia</option>
                <option>Terisi</option>
            </select>
        </div>

        <button 
            type="submit"
            class="bg-blue-600 text-white px-5 py-3 rounded-lg hover:bg-blue-700 transition"
        >
            Simpan Data
        </button>

    </form>

</div>

@endsection