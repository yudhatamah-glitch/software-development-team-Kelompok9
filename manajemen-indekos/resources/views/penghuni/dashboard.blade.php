<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Penghuni</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<!-- HEADER -->
<div class="bg-blue-600 text-white p-4 shadow">
    <h1 class="text-xl font-bold">🏠 Dashboard Penghuni</h1>
</div>

<div class="max-w-6xl mx-auto p-6">

    <!-- INFO KOS -->
    <div class="bg-white p-6 rounded-2xl shadow mb-6">
        <h2 class="text-lg font-bold mb-2">Informasi Kos</h2>
        <p class="text-gray-600">Kamar A1</p>
        <p class="text-gray-600">Harga: Rp 350.000 / bulan</p>
        <p class="text-green-600 font-semibold">Status: Aktif</p>
    </div>

    <!-- STATUS SEWA -->
    <div class="bg-white p-6 rounded-2xl shadow mb-6">
        <h2 class="text-lg font-bold mb-2">Status Sewa</h2>
        <p class="text-gray-600">Bulan: April</p>
        <p class="text-green-600 font-bold">Lunas</p>
    </div>

    <!-- BARANG DIPINJAM -->
    <div class="bg-white p-6 rounded-2xl shadow">
        <h2 class="text-lg font-bold mb-4">Barang Dipinjam</h2>

        <ul class="space-y-2">
            <li class="flex justify-between border-b pb-2">
                <span>Kipas Angin</span>
                <span class="text-yellow-500">Dipinjam</span>
            </li>

            <li class="flex justify-between border-b pb-2">
                <span>Sapu</span>
                <span class="text-green-500">Dikembalikan</span>
            </li>
        </ul>
    </div>

</div>

</body>
</html>