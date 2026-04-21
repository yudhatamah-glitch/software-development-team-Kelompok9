<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Indekos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<!-- Navbar -->
<nav class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 flex justify-between items-center h-16">
        <h1 class="text-xl font-bold">🏠 Indekos App</h1>

        <div class="flex gap-6">
            <a href="/" class="hover:text-gray-200">Dashboard</a>
            <a href="/barang" class="hover:text-gray-200">Barang</a>
            <a href="/riwayat" class="hover:text-gray-200">Riwayat</a>
            <a href="/penghuni" class="hover:text-gray-200">Penghuni</a>
            <a href="/pembayaran" class="hover:text-gray-200">Pembayaran</a>
        </div>
    </div>
</nav>

<!-- Content -->
<div class="max-w-7xl mx-auto p-6">
    @yield('content')
</div>

</body>
</html>