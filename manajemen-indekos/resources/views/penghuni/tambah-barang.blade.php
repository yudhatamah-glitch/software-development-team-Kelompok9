<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang Pinjaman</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        body {
            background: linear-gradient(135deg, #e0e7ff 0%, #f0f4ff 45%, #faf5ff 75%, #e8f5e9 100%);
            min-height: 100vh;
        }
        .card {
            background: rgba(255,255,255,0.75);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255,255,255,0.7);
            border-radius: 20px;
        }
    </style>
</head>
<body>

<div style="max-width:680px;margin:40px auto;padding:20px;position:relative;z-index:1;">
    
    <a href="{{ route('penghuni.dashboard') }}" class="inline-flex items-center gap-2 text-indigo-600 hover:text-indigo-700 mb-6 font-medium">
        ← Kembali ke Dashboard
    </a>

    <div class="card p-8 shadow-xl">
        <h1 class="text-2xl font-bold text-gray-800 mb-1">Tambah Barang Pinjaman</h1>
        <p class="text-gray-500 mb-8">Barang inventaris kos yang bisa dipinjam penghuni</p>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-2xl mb-6">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-2xl mb-6">
                <ul class="list-disc list-inside">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Barang <span class="text-red-500">*</span></label>
                    <input type="text" name="nama_barang" value="{{ old('nama_barang') }}" 
                           class="w-full px-5 py-3 rounded-2xl border border-gray-200 focus:border-indigo-500" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" class="w-full px-5 py-3 rounded-2xl border border-gray-200">{{ old('deskripsi') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                    <input type="text" name="kategori" value="{{ old('kategori') }}" placeholder="contoh: Elektronik, Alat Kebersihan"
                           class="w-full px-5 py-3 rounded-2xl border border-gray-200">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Barang</label>
                    <input type="file" name="foto" accept="image/*" 
                           class="w-full px-5 py-3 rounded-2xl border border-gray-200">
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-4 rounded-2xl transition-all">
                        Pinjam
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>