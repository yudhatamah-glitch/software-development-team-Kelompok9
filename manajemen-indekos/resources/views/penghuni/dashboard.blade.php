<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Penghuni</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }

        body {
            background: linear-gradient(135deg, #e0e7ff 0%, #f0f4ff 45%, #faf5ff 75%, #e8f5e9 100%);
            min-height: 100vh;
        }

        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.35;
            pointer-events: none;
            z-index: 0;
        }

        .card {
            background: rgba(255,255,255,0.65);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255,255,255,0.6);
            border-radius: 20px;
            padding: 22px 24px;
        }

        .card-label {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.07em;
            color: #6366f1;
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 12px;
            font-weight: 600;
            padding: 4px 11px;
            border-radius: 20px;
        }
        .badge-green  { background: rgba(16,185,129,0.12); color: #059669; }
        .badge-yellow { background: rgba(245,158,11,0.12); color: #d97706; }

        .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 9px 0;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }
        .row:last-child { border-bottom: none; }
        .row-label { font-size: 13px; color: #6b7280; }
        .row-value { font-size: 13px; font-weight: 600; color: #1e1b4b; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(14px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up { animation: fadeUp 0.4s ease both; }
        .d1 { animation-delay: 0.05s; }
        .d2 { animation-delay: 0.12s; }
        .d3 { animation-delay: 0.19s; }
    </style>
</head>

<body>

{{-- Orbs --}}
<div class="orb" style="width:360px;height:360px;background:#93c5fd;top:-80px;left:-100px;"></div>
<div class="orb" style="width:300px;height:300px;background:#c4b5fd;top:80px;right:-80px;"></div>
<div class="orb" style="width:260px;height:260px;background:#6ee7b7;bottom:40px;left:40%;"></div>

{{-- Navbar --}}
<nav style="position:sticky;top:0;z-index:40;background:rgba(255,255,255,0.25);backdrop-filter:blur(20px);border-bottom:1px solid rgba(255,255,255,0.3);">
    <div style="max-width:720px;margin:0 auto;padding:12px 20px;display:flex;justify-content:space-between;align-items:center;">
        <div style="display:flex;align-items:center;gap:8px;">
            <div style="width:32px;height:32px;background:linear-gradient(135deg,#6366f1,#818cf8);border-radius:9px;display:flex;align-items:center;justify-content:center;">
                <svg fill="none" stroke="white" viewBox="0 0 24 24" width="17" height="17">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l9-9 9 9M5 10v9a1 1 0 001 1h4v-5h4v5h4a1 1 0 001-1v-9"/>
                </svg>
            </div>
            <span style="font-weight:800;font-size:15px;background:linear-gradient(90deg,#4f46e5,#7c3aed);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">Indekos App</span>
        </div>
        <div style="display:flex;align-items:center;gap:10px;">
            <span style="font-size:13px;font-weight:600;color:#374151;">{{ session('nama') ?? 'Dashboard Penghuni' }}</span>
            <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                @csrf
                <button type="submit" style="background:rgba(239,68,68,0.1);color:#dc2626;border:none;padding:7px 13px;border-radius:9px;font-size:12px;font-weight:600;cursor:pointer;font-family:inherit;">
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>

{{-- Content --}}
<div style="max-width:720px;margin:0 auto;padding:28px 20px;position:relative;z-index:1;">

    {{-- Greeting + Tombol --}}
    <div class="flex justify-between items-end mb-6 fade-up">
        <div>
            <h1 style="font-size:21px;font-weight:800;color:#1e1b4b;margin-bottom:2px;">Halo, {{ session('nama') ?? 'Rekan-rekan' }} 👋</h1>
            <p style="font-size:13px;color:#9ca3af;">Ini Dashboard sewa kamar kamu</p>
        </div>
        
        <a href="{{ route('barang.create') }}" 
           class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-2xl font-semibold flex items-center gap-2 shadow-lg shadow-indigo-500/30 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Barang
        </a>
    </div>

    {{-- Info Kos --}}
    <div class="card fade-up d1" style="margin-bottom:14px;">
        <div class="card-label">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M5 10v9a1 1 0 001 1h4v-5h4v5h4a1 1 0 001-1v-9"/></svg>
            Informasi Kos
        </div>
        <div class="row">
            <span class="row-label">Kamar</span>
            <span class="row-value">Kamar A1</span>
        </div>
        <div class="row">
            <span class="row-label">Harga sewa</span>
            <span class="row-value" style="color:#4f46e5;">Rp 350.000 / bulan</span>
        </div>
        <div class="row">
            <span class="row-label">Status</span>
            <span class="badge badge-green">✦ Aktif</span>
        </div>
    </div>

    {{-- Status Sewa --}}
    <div class="card fade-up d2" style="margin-bottom:14px;">
        <div class="card-label">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Status Sewa
        </div>
        <div class="row">
            <span class="row-label">Bulan</span>
            <span class="row-value">April 2026</span>
        </div>
        <div class="row">
            <span class="row-label">Status pembayaran</span>
            <span class="badge badge-green">✓ Lunas</span>
        </div>
    </div>

    {{-- Barang Dipinjam --}}
    <div class="card fade-up d3">
        <div class="card-label">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10"/></svg>
            Barang Dipinjam
        </div>
        <div class="row">
            <span class="row-label">🌀 Kipas Angin</span>
            <span class="badge badge-yellow">Dipinjam</span>
        </div>
        <div class="row">
            <span class="row-label">🧹 Sapu</span>
            <span class="badge badge-green">Dikembalikan</span>
        </div>
    </div>

</div>

</body>
</html>