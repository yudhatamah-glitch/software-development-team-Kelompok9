@extends('layouts.app')

@section('content')

<style>
    body, * { font-family: 'Plus Jakarta Sans', sans-serif; }

    .page-wrap {
        padding: 28px 28px 28px 72px;
        max-width: 960px;
    }

    .card {
        background: rgba(255,255,255,0.68);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255,255,255,0.6);
        border-radius: 20px;
        overflow: hidden;
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
    .badge-red    { background: rgba(239,68,68,0.10);  color: #dc2626; }
    .badge-yellow { background: rgba(245,158,11,0.12); color: #d97706; }
    .badge-blue   { background: rgba(99,102,241,0.10); color: #4f46e5; }

    .btn-tambah {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 10px 18px;
        background: linear-gradient(135deg, #6366f1, #818cf8);
        color: white;
        border-radius: 12px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: opacity 0.2s, transform 0.15s;
        border: none;
        cursor: pointer;
        font-family: inherit;
    }
    .btn-tambah:hover { opacity: 0.88; transform: scale(0.99); color: white; }

    .search-input {
        padding: 9px 14px 9px 36px;
        border-radius: 11px;
        border: 1.5px solid #e5e7eb;
        font-size: 13px;
        font-family: inherit;
        background: rgba(255,255,255,0.85);
        outline: none;
        transition: border-color 0.2s, box-shadow 0.2s;
        width: 220px;
    }
    .search-input:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99,102,241,0.1);
    }

    table { width: 100%; border-collapse: collapse; }
    thead tr { background: rgba(99,102,241,0.05); border-bottom: 1px solid rgba(0,0,0,0.06); }
    thead th {
        padding: 12px 16px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: #6366f1;
        text-align: left;
    }
    thead th.center { text-align: center; }
    tbody tr {
        border-bottom: 1px solid rgba(0,0,0,0.045);
        transition: background 0.15s;
    }
    tbody tr:last-child { border-bottom: none; }
    tbody tr:hover { background: rgba(99,102,241,0.03); }
    tbody td {
        padding: 12px 16px;
        font-size: 13px;
        color: #374151;
    }
    tbody td.center { text-align: center; }

    .action-btn {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 12px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        font-family: inherit;
        text-decoration: none;
        transition: opacity 0.2s;
    }
    .action-btn:hover { opacity: 0.8; }
    .btn-edit   { background: rgba(245,158,11,0.1); color: #d97706; }
    .btn-hapus  { background: rgba(239,68,68,0.1);  color: #dc2626; }

    .empty-state {
        text-align: center;
        padding: 48px 20px;
        color: #9ca3af;
    }
    .empty-state svg { margin: 0 auto 12px; opacity: 0.35; }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(12px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .fade-up { animation: fadeUp 0.35s ease both; }
</style>

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="page-wrap fade-up">

    {{-- Header --}}
    <div style="display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:22px;flex-wrap:wrap;gap:12px;">
        <div>
            <h1 style="font-size:20px;font-weight:800;color:#1e1b4b;margin-bottom:3px;">Data Barang</h1>
            <p style="font-size:13px;color:#9ca3af;">Kelola inventaris barang kos</p>
        </div>
        <a href="/admin/tambah" class="btn-tambah">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="15" height="15">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Barang
        </a>
    </div>

    {{-- Stats kecil --}}
    <div style="display:flex;gap:10px;margin-bottom:20px;flex-wrap:wrap;">
        <div style="background:rgba(255,255,255,0.65);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,0.6);border-radius:14px;padding:12px 18px;display:flex;align-items:center;gap:10px;">
            <div style="width:34px;height:34px;border-radius:10px;background:rgba(99,102,241,0.1);display:flex;align-items:center;justify-content:center;">
                <svg fill="none" stroke="#6366f1" viewBox="0 0 24 24" width="17" height="17"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10"/></svg>
            </div>
            <div>
                <p style="font-size:11px;color:#9ca3af;line-height:1;">Total Barang</p>
                <p style="font-size:16px;font-weight:800;color:#1e1b4b;" id="statTotal">-</p>
            </div>
        </div>
        <div style="background:rgba(255,255,255,0.65);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,0.6);border-radius:14px;padding:12px 18px;display:flex;align-items:center;gap:10px;">
            <div style="width:34px;height:34px;border-radius:10px;background:rgba(16,185,129,0.1);display:flex;align-items:center;justify-content:center;">
                <svg fill="none" stroke="#059669" viewBox="0 0 24 24" width="17" height="17"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <p style="font-size:11px;color:#9ca3af;line-height:1;">Tersedia</p>
                <p style="font-size:16px;font-weight:800;color:#1e1b4b;" id="statTersedia">-</p>
            </div>
        </div>
        <div style="background:rgba(255,255,255,0.65);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,0.6);border-radius:14px;padding:12px 18px;display:flex;align-items:center;gap:10px;">
            <div style="width:34px;height:34px;border-radius:10px;background:rgba(239,68,68,0.1);display:flex;align-items:center;justify-content:center;">
                <svg fill="none" stroke="#dc2626" viewBox="0 0 24 24" width="17" height="17"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/></svg>
            </div>
            <div>
                <p style="font-size:11px;color:#9ca3af;line-height:1;">Rusak</p>
                <p style="font-size:16px;font-weight:800;color:#1e1b4b;" id="statRusak">-</p>
            </div>
        </div>
        <div style="background:rgba(255,255,255,0.65);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,0.6);border-radius:14px;padding:12px 18px;display:flex;align-items:center;gap:10px;">
            <div style="width:34px;height:34px;border-radius:10px;background:rgba(245,158,11,0.1);display:flex;align-items:center;justify-content:center;">
                <svg fill="none" stroke="#d97706" viewBox="0 0 24 24" width="17" height="17"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
            </div>
            <div>
                <p style="font-size:11px;color:#9ca3af;line-height:1;">Dipinjam</p>
                <p style="font-size:16px;font-weight:800;color:#1e1b4b;" id="statDipinjam">-</p>
            </div>
        </div>
    </div>

    {{-- Toolbar: search + filter --}}
    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;flex-wrap:wrap;gap:10px;">
        <div style="position:relative;">
            <svg fill="none" stroke="#9ca3af" viewBox="0 0 24 24" width="15" height="15"
                 style="position:absolute;left:11px;top:50%;transform:translateY(-50%);pointer-events:none;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z"/>
            </svg>
            <input type="text" id="searchInput" class="search-input" placeholder="Cari barang..."
                   oninput="filterTabel()">
        </div>
        <select id="filterStatus" class="search-input" style="width:auto;padding-left:14px;cursor:pointer;" onchange="filterTabel()">
            <option value="">Semua Status</option>
            <option value="Tersedia">Tersedia</option>
            <option value="Rusak">Rusak</option>
            <option value="Dipinjam">Dipinjam</option>
        </select>
    </div>

    {{-- Tabel --}}
    <div class="card">
        <table>
            <thead>
                <tr>
                    <th class="center" style="width:50px;">No</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th class="center">Status</th>
                    <th class="center">Aksi</th>
                </tr>
            </thead>
            <tbody id="tabelBody">
                @forelse($barangs ?? [] as $i => $barang)
                <tr class="barang-row"
                    data-nama="{{ strtolower($barang->nama) }}"
                    data-status="{{ $barang->status }}">
                    <td class="center" style="color:#9ca3af;font-size:12px;">{{ $i + 1 }}</td>
                    <td>
                        <div style="display:flex;align-items:center;gap:9px;">
                            <div style="width:32px;height:32px;border-radius:9px;background:rgba(99,102,241,0.08);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <svg fill="none" stroke="#6366f1" viewBox="0 0 24 24" width="15" height="15"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10"/></svg>
                            </div>
                            <span style="font-weight:600;color:#1e1b4b;">{{ $barang->nama }}</span>
                        </div>
                    </td>
                    <td>
                        <span class="badge badge-blue">{{ $barang->kategori }}</span>
                    </td>
                    <td class="center">
                        @if($barang->status === 'Tersedia')
                            <span class="badge badge-green">✦ Tersedia</span>
                        @elseif($barang->status === 'Rusak')
                            <span class="badge badge-red">✕ Rusak</span>
                        @elseif($barang->status === 'Dipinjam')
                            <span class="badge badge-yellow">⟳ Dipinjam</span>
                        @else
                            <span class="badge" style="background:#f3f4f6;color:#6b7280;">{{ $barang->status }}</span>
                        @endif
                    </td>
                    <td class="center">
                        <div style="display:flex;gap:6px;justify-content:center;">
                            <a href="/admin/edit/{{ $barang->id }}" class="action-btn btn-edit">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="13" height="13"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                Edit
                            </a>
                            <form method="POST" action="/admin/hapus/{{ $barang->id }}" style="margin:0;" onsubmit="return confirm('Hapus barang ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn btn-hapus">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="13" height="13"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                {{-- Data kosong — tetap tampil placeholder --}}
                <tr class="barang-row" data-nama="kipas" data-status="Tersedia">
                    <td class="center" style="color:#9ca3af;font-size:12px;">1</td>
                    <td>
                        <div style="display:flex;align-items:center;gap:9px;">
                            <div style="width:32px;height:32px;border-radius:9px;background:rgba(99,102,241,0.08);display:flex;align-items:center;justify-content:center;">
                                <svg fill="none" stroke="#6366f1" viewBox="0 0 24 24" width="15" height="15"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10"/></svg>
                            </div>
                            <span style="font-weight:600;color:#1e1b4b;">Kipas</span>
                        </div>
                    </td>
                    <td><span class="badge badge-blue">Elektronik</span></td>
                    <td class="center"><span class="badge badge-green">✦ Tersedia</span></td>
                    <td class="center">
                        <div style="display:flex;gap:6px;justify-content:center;">
                            <a href="#" class="action-btn btn-edit">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="13" height="13"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                Edit
                            </a>
                            <button class="action-btn btn-hapus">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="13" height="13"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                Hapus
                            </button>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Empty search state --}}
        <div id="emptySearch" style="display:none;" class="empty-state">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="40" height="40"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z"/></svg>
            <p style="font-size:14px;font-weight:600;">Barang tidak ditemukan</p>
            <p style="font-size:12px;margin-top:4px;">Coba kata kunci atau filter lain</p>
        </div>
    </div>

</div>

<script>
// Hitung stats dari baris tabel
function hitungStats() {
    var rows = document.querySelectorAll('.barang-row');
    var total = rows.length, tersedia = 0, rusak = 0, dipinjam = 0;
    rows.forEach(function(r) {
        var s = r.getAttribute('data-status');
        if (s === 'Tersedia') tersedia++;
        else if (s === 'Rusak') rusak++;
        else if (s === 'Dipinjam') dipinjam++;
    });
    document.getElementById('statTotal').textContent    = total;
    document.getElementById('statTersedia').textContent = tersedia;
    document.getElementById('statRusak').textContent    = rusak;
    document.getElementById('statDipinjam').textContent = dipinjam;
}

// Filter tabel berdasarkan search + dropdown
function filterTabel() {
    var keyword = document.getElementById('searchInput').value.toLowerCase();
    var status  = document.getElementById('filterStatus').value;
    var rows    = document.querySelectorAll('.barang-row');
    var visible = 0;

    rows.forEach(function(row) {
        var nama    = row.getAttribute('data-nama') || '';
        var rowStat = row.getAttribute('data-status') || '';
        var cocok   = nama.includes(keyword) && (status === '' || rowStat === status);
        row.style.display = cocok ? '' : 'none';
        if (cocok) visible++;
    });

    document.getElementById('emptySearch').style.display = visible === 0 ? 'block' : 'none';
}

hitungStats();
</script>

@endsection