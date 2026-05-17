<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Indekos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head><script src="https://unpkg.com/lucide@latest"></script>
<body class="bg-gradient-to-br from-blue-50 via-white to-indigo-100 min-h-screen">
    <!-- Background dekor -->
<div class="fixed inset-0 -z-10">
    <div class="absolute top-0 left-0 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30"></div>
    <div class="absolute top-20 right-0 w-72 h-72 bg-indigo-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30"></div>
    <div class="absolute bottom-0 left-1/2 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30"></div>
</div>

<!-- Navbar -->
<nav class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">🏠 Indekos App</h1>
        <div class="relative">
    <button onclick="toggleDropdown()" class="bg-white text-blue-600 px-4 py-1 rounded hover:bg-gray-100">
        Login ▼
    </button>

    <div id="dropdownLogin" class="hidden absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg overflow-hidden">
        <a href="/login-admin" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
    Admin
</a>

<a href="/login-user" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
    Penghuni
</a>
    </div>
</div>

<script>
function toggleDropdown() {
    document.getElementById('dropdownLogin').classList.toggle('hidden');
}
</script>
    </div>
</nav>

<!-- Hero -->
<div class="max-w-7xl mx-auto p-6">
    <h2 class="text-4xl font-extrabold mb-2 text-gray-800">Cari Kos Nyaman & Murah</h2>
    <p class="text-gray-600 mb-6 text-lg">Temukan kamar terbaik untuk Anda</p>

    <!-- List Kamar -->
    <div class="grid md:grid-cols-3 gap-6">

        <!-- Kamar 1 -->
        <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-lg hover:shadow-2xl hover:scale-105 transition duration-300 overflow-hidden border border-white/30">
            <img src="{{ asset('images/kamar1.jpg') }}" class="w-full h-40 object-cover">

            <div class="p-4">
                <h3 class="text-lg font-bold">Kamar A1</h3>
                <p class="text-gray-500 text-sm mb-2">Nyaman & strategis</p>

                <p class="text-blue-600 font-bold text-xl mb-2">Rp 350.000 / bulan</p>

                <ul class="text-sm text-gray-600 mb-3 space-y-1">
                    <li>✔ WiFi</li>
                    <li>✔ Kamar mandi dalam</li>
                    <li>✔ AC</li>
                </ul>

                <button class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                    Booking
                </button>
            </div>
        </div>

        <!-- Kamar 2 -->
        <div class="bg-white rounded-2xl shadow hover:shadow-lg hover:scale-105 transition overflow-hidden">
            <img src="{{ asset('images/kamar2.jpg') }}" class="w-full h-40 object-cover">

            <div class="p-4">
                <h3 class="text-lg font-bold">Kamar A2</h3>
                <p class="text-gray-500 text-sm mb-2">Minimalis & bersih</p>

                <p class="text-green-600 font-bold text-xl mb-2">Rp 500.000 / bulan</p>

                <ul class="text-sm text-gray-600 mb-3 space-y-1">
                    <li>✔ WiFi</li>
                    <li>✔ Kipas angin</li>
                    <li>✔ Lemari</li>
                </ul>

                <button class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">
                    Booking
                </button>
            </div>
        </div>

        <!-- Kamar 3 -->
        <div class="bg-white rounded-2xl shadow hover:shadow-lg hover:scale-105 transition overflow-hidden">
            <img src="{{ asset('images/kamar3.jpg') }}" class="w-full h-40 object-cover">

            <div class="p-4">
                <h3 class="text-lg font-bold">Kamar A3</h3>
                <p class="text-gray-500 text-sm mb-2">Premium & luas</p>

                <p class="text-red-500 font-bold text-xl mb-2">Rp 750.000 / bulan</p>

                <ul class="text-sm text-gray-600 mb-3 space-y-1">
                    <li>✔ WiFi</li>
                    <li>✔ AC</li>
                    <li>✔ TV + Kulkas</li>
                </ul>

                <button class="w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600">
                    Booking
                </button>
            </div>
        </div>

    </div>
</div>

<!-- FOOTER -->
<footer class="bg-gray-900 text-gray-300 mt-16">
    <div class="max-w-7xl mx-auto px-6 py-10 grid md:grid-cols-3 gap-8">

        <!-- Tentang -->
        <div>
            <h2 class="text-white font-bold text-lg mb-3">Profil Singkat</h2>
            <p class="text-sm leading-relaxed">
                Indekos App memanfaatkan teknologi untuk membantu calon anak kos mencari, memilih, dan booking kos dengan lebih mudah.
            </p>
        </div>

        <!-- Hubungi Kami -->
        <div>
            <h2 class="text-white font-semibold mb-3">Hubungi Kami</h2>

            <ul class="space-y-3 text-sm">

                <li>
                    <a href="#" class="flex items-center gap-2 hover:text-white">
                        <i data-lucide="phone" class="w-4 h-4"></i>
                        📞(+62) 858-9561-9022
                    </a>
                </li>

                <li>
                    <a href="#" class="flex items-center gap-2 hover:text-white">
                        <i data-lucide="mail" class="w-4 h-4"></i>
                        📧Email @indekosapp.com
                    </a>
                </li>

                <li>
                    <a href="#" class="flex items-center gap-2 hover:text-white">
                        <i data-lucide="instagram" class="w-4 h-4"></i>
                        📸Instagram IndekosApp
                    </a>
                </li>

                <li>
                    <a href="#" class="flex items-center gap-2 hover:text-white">
                        <i data-lucide="facebook" class="w-4 h-4"></i>
                        📘Facebook KosApp
                    </a>
                </li>

            </ul>
        </div>

        <!-- Kontak + MAP -->
        <div>
            <h2 class="text-white font-semibold mb-3">Lokasi</h2>

            <p class="text-sm mb-3">📍 Jl. Margo Tani No.48, Sukorame, Kec. Kota, Kota Kediri, Jawa Timur 64114</p>

            <div class="rounded-lg overflow-hidden border border-gray-700">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d376.3683145595258!2d111.98838904569097!3d-7.807565691752693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7857fe0a451ee3%3A0x90d1f10c4556ad40!2sKos%20Sugeng%20Tipe%20A%20Mojoroto%20Kediri!5e1!3m2!1sid!2sid!4v1776929097145!5m2!1sid!2sid"
                    width="100%" 
                    height="180"
                    style="border:0; display:block;"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

    </div>

    <!-- Bottom -->
    <div class="border-t border-gray-700 text-center py-4 text-sm text-gray-400">
        © 2026 Indekos App. All rights reserved.
    </div>
</footer>