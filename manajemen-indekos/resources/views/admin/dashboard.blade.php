@extends('layouts.app')

@section('content')

<div x-data="{ open: false }" class="flex min-h-screen" style="background: #f0f2f5; font-family: 'Plus Jakarta Sans', sans-serif;">

    {{-- Google Font --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');

        * { font-family: 'Plus Jakarta Sans', sans-serif; }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 500;
            color: rgba(255,255,255,0.7);
            transition: background 0.15s, color 0.15s;
            text-decoration: none;
        }
        .sidebar-link:hover {
            background: rgba(255,255,255,0.12);
            color: #fff;
        }
        .sidebar-link.active {
            background: rgba(255,255,255,0.18);
            color: #fff;
        }
        .sidebar-link svg {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
            opacity: 0.8;
        }

        .stat-card {
            background: #fff;
            border-radius: 16px;
            padding: 20px 22px;
            border: 1px solid #e8eaf0;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
        }

        .icon-wrap {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 14px;
        }
        .icon-wrap svg { width: 20px; height: 20px; }

        .hamburger-btn {
            position: fixed;
            top: 18px;
            left: 16px;
            z-index: 50;
            width: 40px;
            height: 40px;
            background: #1e40af;
            color: white;
            border: none;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(30,64,175,0.35);
            transition: background 0.15s;
        }
        .hamburger-btn:hover { background: #1d3faa; }

        .overlay {
            position: fixed; inset: 0;
            background: rgba(0,0,0,0.25);
            z-index: 35;
            backdrop-filter: blur(2px);
        }
    </style>

    {{-- Hamburger --}}
    <button class="hamburger-btn" @click="open = !open" aria-label="Toggle menu">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>

    {{-- Overlay --}}
    <div x-show="open" class="overlay" @click="open = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" style="display:none;"></div>

    {{-- Sidebar --}}
    <div
        :class="open ? 'translate-x-0' : '-translate-x-full'"
        class="fixed top-0 left-0 w-64 h-screen transform transition-transform duration-300 z-40 flex flex-col"
        style="background: linear-gradient(160deg, #1e3a8a 0%, #1e40af 60%, #2563eb 100%);"
    >
        {{-- Brand --}}
        <div style="padding: 24px 20px 20px; border-bottom: 1px solid rgba(255,255,255,0.1);">
            <div style="display:flex; align-items:center; gap:10px; margin-top:8px;">
                <div style="width:36px;height:36px;background:rgba(255,255,255,0.15);border-radius:10px;display:flex;align-items:center;justify-content:center;">
                    <svg fill="none" stroke="white" viewBox="0 0 24 24" width="20" height="20">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M5 10v9a1 1 0 001 1h4v-5h4v5h4a1 1 0 001-1v-9"/>
                    </svg>
                </div>
                <div>
                    <p style="color:white;font-weight:700;font-size:15px;line-height:1.2;">Indekos App</p>
                    <p style="color:rgba(255,255,255,0.55);font-size:11px;">Admin Panel</p>
                </div>
            </div>
        </div>

        {{-- Nav --}}
        <nav style="padding: 16px 12px; flex:1; display:flex; flex-direction:column; gap:4px;">
            <a href="#" class="sidebar-link active">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M5 10v9a1 1 0 001 1h4v-5h4v5h4a1 1 0 001-1v-9"/></svg>
                Dashboard
            </a>
            <a href="#" class="sidebar-link">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10"/></svg>
                Barang
            </a>
            <a href="#" class="sidebar-link">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                Riwayat
            </a>
            <a href="#" class="sidebar-link">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-5-4M9 20H4v-2a4 4 0 015-4m4-4a4 4 0 110-8 4 4 0 010 8z"/></svg>
                Penghuni
            </a>
            <a href="#" class="sidebar-link">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                Pembayaran
            </a>
        </nav>

        {{-- Footer sidebar --}}
        <div style="padding: 14px 16px; border-top: 1px solid rgba(255,255,255,0.1);">
            <p style="color:rgba(255,255,255,0.4);font-size:11px;text-align:center;">© 2026 Indekos App</p>
        </div>
    </div>

    {{-- Main Content --}}
    <main style="flex:1; padding: 28px 28px 28px 72px; max-width: 960px; width: 100%;">

        {{-- Header --}}
        <div style="margin-bottom: 28px;">
            <h1 style="font-size: 22px; font-weight: 700; color: #111827; margin-bottom: 4px;">Dashboard</h1>
            <div style="display:flex; align-items:center; gap:8px;">
                <svg fill="none" stroke="#9ca3af" viewBox="0 0 24 24" width="15" height="15">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <input
                    type="date"
                    value="{{ date('Y-m-d') }}"
                    style="border:none;background:transparent;font-size:13px;color:#6b7280;font-family:inherit;cursor:pointer;outline:none;"
                >
            </div>
        </div>

        {{-- Stat Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            {{-- Barang Rusak --}}
            <div class="stat-card">
                <div class="icon-wrap" style="background:#fef2f2;">
                    <svg fill="none" stroke="#ef4444" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <p style="font-size:13px;color:#6b7280;font-weight:500;margin-bottom:6px;">Barang Rusak</p>
                <p style="font-size:36px;font-weight:700;color:#ef4444;line-height:1;">{{ $barangRusak ?? 20 }}</p>
                <p style="font-size:12px;color:#9ca3af;margin-top:6px;">Perlu ditindaklanjuti</p>
            </div>

            {{-- Penghuni --}}
            <div class="stat-card">
                <div class="icon-wrap" style="background:#eff6ff;">
                    <svg fill="none" stroke="#3b82f6" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-5-4M9 20H4v-2a4 4 0 015-4m4-4a4 4 0 110-8 4 4 0 010 8z"/>
                    </svg>
                </div>
                <p style="font-size:13px;color:#6b7280;font-weight:500;margin-bottom:6px;">Penghuni</p>
                <p style="font-size:36px;font-weight:700;color:#3b82f6;line-height:1;">{{ $penghuni ?? 5 }}</p>
                <p style="font-size:12px;color:#9ca3af;margin-top:6px;">Penghuni aktif saat ini</p>
            </div>

            {{-- Belum Lunas --}}
            <div class="stat-card">
                <div class="icon-wrap" style="background:#fff7ed;">
                    <svg fill="none" stroke="#f97316" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <p style="font-size:13px;color:#6b7280;font-weight:500;margin-bottom:6px;">Belum Lunas</p>
                <p style="font-size:36px;font-weight:700;color:#f97316;line-height:1;">{{ $belumLunas ?? 5 }}</p>
                <p style="font-size:12px;color:#9ca3af;margin-top:6px;">Tagihan pending bulan ini</p>
            </div>

            {{-- Keuntungan --}}
            <div class="stat-card">
                <div class="icon-wrap" style="background:#f0fdf4;">
                    <svg fill="none" stroke="#22c55e" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <p style="font-size:13px;color:#6b7280;font-weight:500;margin-bottom:6px;">Keuntungan Bulan Ini</p>
                <p style="font-size:36px;font-weight:700;color:#22c55e;line-height:1;">{{ $keuntunganBulanIni ?? 5 }}</p>
                <p style="font-size:12px;color:#9ca3af;margin-top:6px;">Total pendapatan bulan ini</p>
            </div>

        </div>

    </main>

</div>

@endsection