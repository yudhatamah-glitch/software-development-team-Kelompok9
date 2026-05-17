<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Indekos</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AlpineJS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100">

<div x-data="{ open: false }" class="relative">

    <!-- Tombol Hamburger -->
    <button
        @click="open = !open"
        class="fixed top-4 left-4 z-50 bg-blue-600 text-white px-3 py-2 rounded-lg shadow-lg hover:bg-blue-700"
    >
        ☰
    </button>

    <!-- Sidebar -->
    <div
    x-show="open"
    x-transition
    @click.away="open = false"
    class="fixed top-0 left-0 w-64 h-screen bg-gradient-to-b from-blue-600 to-indigo-700 text-white p-5 z-40 pointer-events-auto"
    >

        <h1 class="text-2xl font-bold mb-10 mt-10">
            🏠 Indekos App
        </h1>

        <ul class="space-y-3">

            <li>
                <a href="/admin"
                   class="block p-3 rounded-lg hover:bg-white/20 transition">
                    Dashboard
                </a>
            </li>

            <li>
                <a href="/admin/barang"
                   class="block p-3 rounded-lg hover:bg-white/20 transition">
                    Barang
                </a>
            </li>

            <li>
                <a href="/admin/kamar" class="block hover:bg-blue-500 p-3 rounded-lg">
                    Kamar
                </a>
            </li>

            <li>
                <a href="/admin/penghuni"
                   class="block p-3 rounded-lg hover:bg-white/20 transition">
                    Penghuni
                </a>
            </li>

            <li>
                <a href="/admin/pembayaran"
                   class="block p-3 rounded-lg hover:bg-white/20 transition">
                    Pembayaran
                </a>
            </li>

           <li>
    <a href="/"
       class="block p-3 rounded-lg hover:bg-red-500 transition">
        Logout
    </a>
</li>

        </ul>

    </div>

    <!-- Content -->
    <div class="p-6 min-h-screen relative z-10">

        @yield('content')

    </div>

</div>

</body>
</html>