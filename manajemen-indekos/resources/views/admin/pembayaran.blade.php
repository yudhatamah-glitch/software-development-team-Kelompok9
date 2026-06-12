@extends('layouts.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    * { font-family: 'Plus Jakarta Sans', sans-serif; }

    .page-wrap { padding: 28px; max-width: 1000px; margin: 0 auto; }

    .glass-card {
        background: rgba(255,255,255,0.85);
        backdrop-filter: blur(18px);
        border: 1px solid rgba(255,255,255,0.7);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 10px 35px rgba(99,102,241,0.08);
    }

    .stat-card {
        border-radius: 20px;
        padding: 20px 22px;
        color: white;
        position: relative;
        overflow: hidden;
    }
    .stat-card::after {
        content: '';
        position: absolute;
        width: 110px; height: 110px;
        background: rgba(255,255,255,0.08);
        border-radius: 50%;
        top: -30px; right: -20px;
    }
    .stat-card::before {
        content: '';
        position: absolute;
        width: 60px; height: 60px;
        background: rgba(255,255,255,0.06);
        border-radius: 50%;
        bottom: -15px; left: 18px;
    }

    .table-head { background: #f5f3ff; }
    .table-head th {
        padding: 13px 16px;
        font-size: 11px; font-weight: 700;
        text-transform: uppercase; letter-spacing: 0.06em;
        color: #6366f1; text-align: left;
    }
    .table-head th.center { text-align: center; }

    tbody tr { border-top: 1px solid #f1f5f9; transition: background 0.15s; }
    tbody tr:hover { background: #fafafa; }
    tbody td { padding: 14px 16px; font-size: 13px; color: #374151; }
    tbody td.center { text-align: center; }

    .status {
        display: inline-flex; align-items: center; gap: 5px;
        padding: 5px 12px; border-radius: 999px;
        font-size: 12px; font-weight: 700;
    }
    .lunas    { background: rgba(16,185,129,0.12); color: #059669; }
    .belum    { background: rgba(239,68,68,0.12);  color: #dc2626; }
    .menunggu { background: rgba(245,158,11,0.12); color: #d97706; }

    .btn-reminder {
        display: inline-flex; align-items: center; gap: 5px;
        background: rgba(245,158,11,0.1); color: #d97706;
        padding: 6px 12px; border-radius: 9px;
        font-size: 12px; font-weight: 600;
        border: none; cursor: pointer; font-family: inherit;
        transition: opacity 0.2s;
    }
    .btn-reminder:hover { opacity: 0.8; }

    .btn-lunas {
        display: inline-flex; align-items: center; gap: 5px;
        background: rgba(99,102,241,0.1); color: #4f46e5;
        padding: 6px 12px; border-radius: 9px;
        font-size: 12px; font-weight: 600;
        border: none; font-family: inherit;
    }

    .search-input {
        padding: 10px 14px 10px 36px;
        border-radius: 12px; border: 1.5px solid #e5e7eb;
        outline: none; background: #f9fafb;
        font-size: 13px; font-family: inherit; width: 220px;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .search-input:focus {
        border-color: #6366f1; background: white;
        box-shadow: 0 0 0 3px rgba(99,102,241,0.1);
    }

    .filter-btn {
        padding: 6px 14px; border-radius: 20px;
        border: 1.5px solid #e5e7eb;
        font-size: 12px; font-weight: 600;
        cursor: pointer; font-family: inherit;
        background: white; color: #6b7280;
        transition: all 0.2s;
    }
    .filter-btn:hover  { border-color: #6366f1; color: #6366f1; }
    .filter-btn.active { background: #6366f1; color: white; border-color: #6366f1; }

    .avatar {
        width: 36px; height: 36px; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 12px; font-weight: 700; color: white; flex-shrink: 0;
    }

    .empty-state { text-align: center; padding: 44px 20px; color: #9ca3af; }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(12px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .fade-up { animation: fadeUp 0.4s ease; }
</style>

<div class="page-wrap fade-up">

    {{-- Header --}}
    <div style="display:flex;justify-content:space-between;align-items:flex-start;flex-wrap:wrap;gap:14px;margin-bottom:24px;">
        <div>
            <h1 style="font-size:22px;font-weight:800;color:#1e1b4b;">Pembayaran</h1>
            <p style="font-size:13px;color:#9ca3af;margin-top:3px;">Monitoring pembayaran sewa penghuni kos</p>
        </div>
        <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap;">
            <a href="/admin/pembayaran/tambah"
               style="display:inline-flex;align-items:center;gap:7px;padding:10px 18px;background:linear-gradient(135deg,#6366f1,#818cf8);color:white;border-radius:12px;font-size:13px;font-weight:600;text-decoration:none;box-shadow:0 4px 12px rgba(99,102,241,0.25);transition:opacity 0.2s;"
               onmouseover="this.style.opacity='0.88'" onmouseout="this.style.opacity='1'">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="15" height="15">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Pembayaran
            </a>
            <div style="position:relative;">
                <svg fill="none" stroke="#9ca3af" viewBox="0 0 24 24" width="15" height="15"
                     style="position:absolute;left:11px;top:50%;transform:translateY(-50%);pointer-events:none;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z"/>
                </svg>
                <input type="text" placeholder="Cari penghuni..."
                       class="search-input" id="searchInput" onkeyup="searchTable()">
            </div>
        </div>
    </div>

    {{-- Stat Cards --}}
    <div class="grid md:grid-cols-3 gap-4 mb-6">

        <div class="stat-card" style="background:linear-gradient(135deg,#6366f1,#818cf8);">
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:10px;position:relative;z-index:1;">
                <div style="width:34px;height:34px;background:rgba(255,255,255,0.15);border-radius:10px;display:flex;align-items:center;justify-content:center;">
                    <svg fill="none" stroke="white" viewBox="0 0 24 24" width="17" height="17"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8V7m0 1v8m0 0v1"/></svg>
                </div>
                <p style="font-size:13px;opacity:0.85;">Total Pembayaran</p>
            </div>
            <h2 style="font-size:22px;font-weight:800;position:relative;z-index:1;">Rp 4.500.000</h2>
            <p style="font-size:11px;opacity:0.65;margin-top:3px;position:relative;z-index:1;">Bulan ini</p>
        </div>

        <div class="stat-card" style="background:linear-gradient(135deg,#10b981,#34d399);">
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:10px;position:relative;z-index:1;">
                <div style="width:34px;height:34px;background:rgba(255,255,255,0.15);border-radius:10px;display:flex;align-items:center;justify-content:center;">
                    <svg fill="none" stroke="white" viewBox="0 0 24 24" width="17" height="17"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <p style="font-size:13px;opacity:0.85;">Sudah Lunas</p>
            </div>
            <h2 style="font-size:22px;font-weight:800;position:relative;z-index:1;">8 Penghuni</h2>
            <p style="font-size:11px;opacity:0.65;margin-top:3px;position:relative;z-index:1;">Dari 10 penghuni</p>
        </div>

        <div class="stat-card" style="background:linear-gradient(135deg,#f59e0b,#fbbf24);">
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:10px;position:relative;z-index:1;">
                <div style="width:34px;height:34px;background:rgba(255,255,255,0.15);border-radius:10px;display:flex;align-items:center;justify-content:center;">
                    <svg fill="none" stroke="white" viewBox="0 0 24 24" width="17" height="17"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <p style="font-size:13px;opacity:0.85;">Belum Bayar</p>
            </div>
            <h2 style="font-size:22px;font-weight:800;position:relative;z-index:1;">2 Penghuni</h2>
            <p style="font-size:11px;opacity:0.65;margin-top:3px;position:relative;z-index:1;">Perlu ditagih</p>
        </div>

    </div>

    {{-- Filter Bulan --}}
    <div style="display:flex;align-items:center;gap:10px;margin-bottom:14px;flex-wrap:wrap;">
        <span style="font-size:13px;font-weight:600;color:#6b7280;">Bulan:</span>
        <button onclick="filterBulan(this,'')"       class="filter-btn active">Semua</button>
        <button onclick="filterBulan(this,'April')"  class="filter-btn">April</button>
        <button onclick="filterBulan(this,'Mei')"    class="filter-btn">Mei</button>
        <button onclick="filterBulan(this,'Juni')"   class="filter-btn">Juni</button>
    </div>

    {{-- Table --}}
    <div class="glass-card">
        <table class="w-full">
            <thead class="table-head">
                <tr>
                    <th>Nama Penghuni</th>
                    <th class="center">Kamar</th>
                    <th class="center">Bulan</th>
                    <th class="center">Jumlah</th>
                    <th class="center">Status</th>
                    <th class="center">Aksi</th>
                </tr>
            </thead>
            <tbody id="paymentTable">

                @forelse($pembayarans ?? [] as $p)
                <tr data-bulan="{{ $p->bulan }}">
                    <td>
                        <div style="display:flex;align-items:center;gap:10px;">
                            <div class="avatar" style="background:linear-gradient(135deg,#6366f1,#8b5cf6);">
                                {{ strtoupper(substr($p->nama, 0, 2)) }}
                            </div>
                            <div>
                                <p style="font-weight:700;color:#1e1b4b;">{{ $p->nama }}</p>
                                <p style="font-size:11px;color:#9ca3af;">Penghuni aktif</p>
                            </div>
                        </div>
                    </td>
                    <td class="center" style="font-weight:600;">{{ $p->kamar }}</td>
                    <td class="center">{{ $p->bulan }}</td>
                    <td class="center" style="font-weight:700;color:#4f46e5;">
                        Rp {{ number_format($p->jumlah, 0, ',', '.') }}
                    </td>
                    <td class="center">
                        @if($p->status === 'Lunas')
                            <span class="status lunas">● Lunas</span>
                        @elseif($p->status === 'Menunggak')
                            <span class="status menunggu">● Menunggak</span>
                        @else
                            <span class="status belum">● Belum Bayar</span>
                        @endif
                    </td>
                    <td class="center">
                        @if($p->status !== 'Lunas')
                            <button class="btn-reminder">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="12" height="12"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                                Reminder
                            </button>
                        @else
                            <span class="btn-lunas">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="12" height="12"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Lunas
                            </span>
                        @endif
                    </td>
                </tr>
                @empty

                {{-- Placeholder Reno --}}
                <tr data-bulan="April">
                    <td>
                        <div style="display:flex;align-items:center;gap:10px;">
                            <div class="avatar" style="background:linear-gradient(135deg,#6366f1,#8b5cf6);">RE</div>
                            <div>
                                <p style="font-weight:700;color:#1e1b4b;">Reno</p>
                                <p style="font-size:11px;color:#9ca3af;">Penghuni aktif</p>
                            </div>
                        </div>
                    </td>
                    <td class="center" style="font-weight:600;">A1</td>
                    <td class="center">April</td>
                    <td class="center" style="font-weight:700;color:#4f46e5;">Rp 350.000</td>
                    <td class="center"><span class="status lunas">● Lunas</span></td>
                    <td class="center">
                        <span class="btn-lunas">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="12" height="12"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Lunas
                        </span>
                    </td>
                </tr>

                {{-- Placeholder Budi --}}
                <tr data-bulan="April">
                    <td>
                        <div style="display:flex;align-items:center;gap:10px;">
                            <div class="avatar" style="background:linear-gradient(135deg,#f59e0b,#fbbf24);">BU</div>
                            <div>
                                <p style="font-weight:700;color:#1e1b4b;">Budi</p>
                                <p style="font-size:11px;color:#9ca3af;">Menunggu pembayaran</p>
                            </div>
                        </div>
                    </td>
                    <td class="center" style="font-weight:600;">A2</td>
                    <td class="center">April</td>
                    <td class="center" style="font-weight:700;color:#4f46e5;">Rp 500.000</td>
                    <td class="center"><span class="status belum">● Belum Bayar</span></td>
                    <td class="center">
                        <button class="btn-reminder">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="12" height="12"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                            Reminder
                        </button>
                    </td>
                </tr>

                @endforelse

            </tbody>
        </table>

        <div id="emptyState" style="display:none;" class="empty-state">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="38" height="38" style="margin:0 auto 10px;opacity:0.3;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z"/></svg>
            <p style="font-size:14px;font-weight:600;">Data tidak ditemukan</p>
            <p style="font-size:12px;margin-top:3px;">Coba kata kunci atau filter lain</p>
        </div>

    </div>

</div>

<script>
function searchTable() {
    var input = document.getElementById('searchInput').value.toLowerCase();
    var rows  = document.querySelectorAll('#paymentTable tr');
    var vis   = 0;
    rows.forEach(function(row) {
        var match = row.innerText.toLowerCase().includes(input);
        row.style.display = match ? '' : 'none';
        if (match) vis++;
    });
    document.getElementById('emptyState').style.display = vis === 0 ? 'block' : 'none';
}

function filterBulan(btn, bulan) {
    document.querySelectorAll('.filter-btn').forEach(function(b) { b.classList.remove('active'); });
    btn.classList.add('active');
    var rows = document.querySelectorAll('#paymentTable tr');
    var vis  = 0;
    rows.forEach(function(row) {
        var rb   = row.getAttribute('data-bulan') || '';
        var show = bulan === '' || rb === bulan;
        row.style.display = show ? '' : 'none';
        if (show) vis++;
    });
    document.getElementById('emptyState').style.display = vis === 0 ? 'block' : 'none';
}
</script>

@endsection