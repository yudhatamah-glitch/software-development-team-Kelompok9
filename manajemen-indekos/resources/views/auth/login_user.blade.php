<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Penghuni</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-600 to-indigo-700 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-2xl rounded-2xl overflow-hidden w-full max-w-4xl grid md:grid-cols-2">

        <!-- KIRI (ILUSTRASI) -->
        <div class="hidden md:flex flex-col justify-center items-center bg-gradient-to-br from-indigo-600 to-blue-500 text-white p-8">
            <h2 class="text-3xl font-bold mb-4">🏠 Selamat Datang!</h2>
            <p class="text-center text-sm opacity-90">
                Temukan kenyamanan seperti di rumah sendiri.  
                Kelola kamar, pembayaran, dan aktivitas kos dengan mudah.
            </p>
        </div>

        <!-- KANAN (FORM LOGIN) -->
        <div class="p-8">

            <h2 class="text-2xl font-bold mb-2 text-gray-800">
                Login Penghuni
            </h2>

            <p class="text-gray-500 text-sm mb-6">
                Masukkan Username anda untuk melanjutkan
            </p>

            <form method="POST" action="#" class="space-y-4">
                
                <!-- INPUT NO WA -->
                <div>
                    <label class="text-sm text-gray-600">Username</label>
                    <input 
                        type="text" 
                        name="phone"
                        placeholder="Contoh: taktung123"
                        class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>

                <!-- BUTTON -->
                <button class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                    Masuk
                </button>

            </form>

            <!-- FOOTER -->
            <p class="text-xs text-gray-400 mt-6 text-center">
                Dengan masuk, Anda menyetujui kebijakan kos kami
            </p>

        </div>

    </div>

</body>
</html>