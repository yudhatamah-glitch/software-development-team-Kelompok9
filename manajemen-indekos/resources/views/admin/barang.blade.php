@extends('layouts.app')

@section('content')

<style>
    body, * { font-family: 'Plus Jakarta Sans', sans-serif; }

    .page-wrap { padding: 28px; max-width: 1000px; margin: 0 auto; }

    .card {
        background: rgba(255,255,255,0.68);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255,255,255,0.6);
        border-radius: 20px;
        overflow: hidden;
    }

    .badge {
        display: inline-flex; align-items: center; gap: 4px;
        font-size: 12px; font-weight: 600;
        padding: 4px 11px; border-radius: 20px;
    }
    .badge-green  { background: rgba(16,185,129,0.12); color: #059669; }
    .badge-red    { background: rgba(239,68,68,0.10);  color: #dc2626; }
    .badge-yellow { background: rgba(245,158,11,0.12); color: #d97706; }
    .badge-blue   { background: rgba(99,102,241,0.10); color: #4f46e5; }

    .search-input {
        padding: 9px 14px 9px 36px;
        border-radius: 11px; border: 1.5px solid #e5e7eb;
        font-size: 13px; font-family: inherit;
        background: rgba(255,255,255,0.85); outline: none;
        width: 220px; transition: border-color 0.2s, box-shadow 0.2s;
    }
    .search-input:focus { border-color: #6366f1; box-shadow: 0 0 0 3px rgba(99,102,241,0.1); }

    table { width: 100%; border-collapse: collapse; }
    thead tr { background: rgba(99,102,241,0.05); border-bottom: 1px solid rgba(0,0,0,0.06); }
    thead th {
        padding: 12px 14px; font-size: 11px; font-weight: 700;
        text-transform: uppercase; letter-spacing: 0.06em; color: #6366f1; text-align: left;
    }
    thead th.center { text-align: center; }
    tbody tr { border-bottom: 1px solid rgba(0,0,0,0.045); transition: background 0.15s; }
    tbody tr:last-child { border-bottom: none; }
    tbody tr:hover { background: rgba(99,102,241,0.03); }
    tbody td { padding: 12px 14px; font-size: 13px; color: #374151; }
    tbody td.center { text-align: center; }

    .avatar {
        width: 30px; height: 30px; border-radius: 50%;
        background: linear-gradient(135deg, #6366f1, #a78bfa);
        display: flex; align-items: center; justify-content: center;
        font-size: 11px; font-weight: 700; color: white; flex-shrink: 0;
    }

    .foto-thumb {
        width: 40px; height: 40px; border-radius: 10px;
        object-fit: cover; border: 1px solid #e5e7eb;
    }
    .foto-placeholder {
        width: 40px; height: 40px; border-radius: 10px;
        background: rgba(99,102,241,0.08);
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }

    .action-btn {
        display: inline-flex; align-items: center; gap: 5px;
        padding: 5px 11px; border-radius: 8px;
        font-size: 12px; font-weight: 600;
        border: none; cursor: pointer; font-family: inherit;
        text-decoration: none; transition: opacity 0.2s;
    }
    .action-btn:hover { opacity: 0.8; }
    .btn-kembali { background: rgba(16,185,129,0.1); color: #059669; }
    .btn-rusak   { background: rgba(239,68,68,0.1);  color: #dc2626; }

    .empty-state { text-align: center; padding: 48px 20px; color: #9ca3af; }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(12px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .fade-up { animation: fadeUp 0.35s ease both; }
</style>

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="page-wrap fade-up">

    {{-- Header --}}
    <div style="margin-bottom:22px;">
        <h1 style="font-size:20px;font-weight:800;color:#1e1b4b;margin-bottom:3px;">Laporan Peminjaman Barang</h1>
        <p style="font-size:13px;color:#9ca3af;">Barang yang dipinjam penghuni — Update status pengembalian</p>
    </div>

    {{-- Stat Cards --}}
    <div style="display:flex;gap:10px;margin-bottom:20px;flex-wrap:wrap;">
        <div style="background:rgba(255,255,255,0.65);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,0.6);border-radius:14px;padding:12px 18px;display:flex;align-items:center;gap:10px;">
            <div style="width:34px;height:34px;border-radius:10px;background:rgba(99,102,241,0.1);display:flex;align-items:center;justify-content:center;">
                <svg fill="none" stroke="#6366f1" viewBox="0 0 24 24" width="17" height="17"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            </div>
            <div>
                <p style="font-size:11px;color:#9ca3af;line-height:1;">Total Laporan</p>
                <p style="font-size:16px;font-weight:800;color:#1e1b4b;" id="statTotal">-</p>
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
        <div style="background:rgba(255,255,255,0.65);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,0.6);border-radius:14px;padding:12px 18px;display:flex;align-items:center;gap:10px;">
            <div style="width:34px;height:34px;border-radius:10px;background:rgba(16,185,129,0.1);display:flex;align-items:center;justify-content:center;">
                <svg fill="none" stroke="#059669" viewBox="0 0 24 24" width="17" height="17"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <p style="font-size:11px;color:#9ca3af;line-height:1;">Dikembalikan</p>
                <p style="font-size:16px;font-weight:800;color:#1e1b4b;" id="statKembali">-</p>
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
    </div>

    {{-- Toolbar --}}
    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;flex-wrap:wrap;gap:10px;">
        <div style="position:relative;">
            <svg fill="none" stroke="#9ca3af" viewBox="0 0 24 24" width="15" height="15"
                 style="position:absolute;left:11px;top:50%;transform:translateY(-50%);pointer-events:none;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z"/>
            </svg>
            <input type="text" id="searchInput" class="search-input"
                   placeholder="Cari penghuni / barang..." oninput="filterTabel()">
        </div>
        <select id="filterStatus" class="search-input" style="width:auto;padding-left:14px;cursor:pointer;" onchange="filterTabel()">
            <option value="">Semua Status</option>
            <option value="Dipinjam">Dipinjam</option>
            <option value="Dikembalikan">Dikembalikan</option>
            <option value="Rusak">Rusak</option>
        </select>
    </div>

    {{-- Tabel --}}
    <div class="card">
        <table>
            <thead>
                <tr>
                    <th style="width:40px;" class="center">No</th>
                    <th>Penghuni</th>
                    <th>Barang</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th class="center">Tgl Pinjam</th>
                    <th class="center">Status</th>
                    <th class="center">Aksi</th>
                </tr>
            </thead>
            <tbody id="tabelBody">

                @forelse($barangs ?? [] as $i => $b)
                <tr class="barang-row"
                    data-cari="{{ strtolower($b->penghuni->nama ?? '') }} {{ strtolower($b->nama_barang) }}"
                    data-status="{{ $b->status }}">

                    <td class="center" style="color:#9ca3af;font-size:12px;">{{ $i + 1 }}</td>

                    {{-- Penghuni --}}
                    <td>
                        <div style="display:flex;align-items:center;gap:8px;">
                            <div class="avatar">{{ strtoupper(substr($b->penghuni->nama ?? 'P', 0, 2)) }}</div>
                            <div>
                                <p style="font-weight:600;color:#1e1b4b;font-size:13px;">{{ $b->penghuni->nama ?? '-' }}</p>
                                <p style="font-size:11px;color:#9ca3af;">Kamar {{ $b->penghuni->kamar ?? '-' }}</p>
                            </div>
                        </div>
                    </td>

                    {{-- Barang + foto --}}
                    <td>
                        <div style="display:flex;align-items:center;gap:8px;">
                            @if($b->foto)
                                <img src="{{ asset('storage/' . $b->foto) }}" class="foto-thumb" alt="foto">
                            @else
                                <div class="foto-placeholder">
                                    <svg fill="none" stroke="#6366f1" viewBox="0 0 24 24" width="15" height="15"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10"/></svg>
                                </div>
                            @endif
                            <span style="font-weight:600;color:#1e1b4b;">{{ $b->nama_barang }}</span>
                        </div>
                    </td>

                    {{-- Kategori --}}
                    <td>
                        @if($b->kategori)
                            <span class="badge badge-blue">{{ $b->kategori }}</span>
                        @else
                            <span style="color:#d1d5db;font-size:12px;">—</span>
                        @endif
                    </td>

                    {{-- Deskripsi --}}
                    <td style="color:#6b7280;font-size:12px;max-width:160px;">
                        <span title="{{ $b->deskripsi }}">{{ Str::limit($b->deskripsi, 40) ?? '—' }}</span>
                    </td>

                    {{-- Tgl Pinjam --}}
                    <td class="center" style="color:#6b7280;font-size:12px;">
                        {{ \Carbon\Carbon::parse($b->created_at)->format('d M Y') }}
                    </td>

                    {{-- Status --}}
                    <td class="center">
                        @if($b->status === 'Dipinjam')
                            <span class="badge badge-yellow">⟳ Dipinjam</span>
                        @elseif($b->status === 'Dikembalikan')
                            <span class="badge badge-green">✓ Dikembalikan</span>
                        @elseif($b->status === 'Rusak')
                            <span class="badge badge-red">✕ Rusak</span>
                        @endif
                    </td>

                    {{-- Aksi --}}
                    <td class="center">
                        @if($b->status === 'Dipinjam')
                        <div style="display:flex;gap:6px;justify-content:center;flex-wrap:wrap;">
                            <form method="POST" action="/admin/barang/kembali/{{ $b->id }}" style="margin:0;" onsubmit="return confirm('Tandai barang ini sudah dikembalikan?')">
                                @csrf @method('PATCH')
                                <button type="submit" class="action-btn btn-kembali">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="12" height="12"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    Dikembalikan
                                </button>
                            </form>
                            <form method="POST" action="/admin/barang/rusak/{{ $b->id }}" style="margin:0;" onsubmit="return confirm('Tandai barang ini rusak?')">
                                @csrf @method('PATCH')
                                <button type="submit" class="action-btn btn-rusak">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="12" height="12"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/></svg>
                                    Rusak
                                </button>
                            </form>
                        </div>
                        @else
                            <span style="font-size:12px;color:#d1d5db;">—</span>
                        @endif
                    </td>

                </tr>
                @empty
                {{-- Placeholder data --}}
                <tr class="barang-row" data-cari="reno kipas angin" data-status="Dipinjam">
                    <td class="center" style="color:#9ca3af;font-size:12px;">1</td>
                    <td>
                        <div style="display:flex;align-items:center;gap:8px;">
                            <div class="avatar">RE</div>
                            <div>
                                <p style="font-weight:600;color:#1e1b4b;font-size:13px;">Reno</p>
                                <p style="font-size:11px;color:#9ca3af;">Kamar A1</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div style="display:flex;align-items:center;gap:8px;">
                            <div class="foto-placeholder">
                                <svg fill="none" stroke="#6366f1" viewBox="0 0 24 24" width="15" height="15"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10"/></svg>
                            </div>
                            <span style="font-weight:600;color:#1e1b4b;">Kipas Angin</span>
                        </div>
                    </td>
                    <td><span class="badge badge-blue">Elektronik</span></td>
                    <td style="color:#6b7280;font-size:12px;">Kipas angin untuk kamar</td>
                    <td class="center" style="color:#6b7280;font-size:12px;">10 Mei 2026</td>
                    <td class="center"><span class="badge badge-yellow">⟳ Dipinjam</span></td>
                    <td class="center">
                        <div style="display:flex;gap:6px;justify-content:center;">
                            <button class="action-btn btn-kembali">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="12" height="12"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Dikembalikan
                            </button>
                            <button class="action-btn btn-rusak">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="12" height="12"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/></svg>
                                Rusak
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="barang-row" data-cari="siti sapu" data-status="Dikembalikan">
                    <td class="center" style="color:#9ca3af;font-size:12px;">2</td>
                    <td>
                        <div style="display:flex;align-items:center;gap:8px;">
                            <div class="avatar" style="background:linear-gradient(135deg,#10b981,#34d399);">SI</div>
                            <div>
                                <p style="font-weight:600;color:#1e1b4b;font-size:13px;">Siti</p>
                                <p style="font-size:11px;color:#9ca3af;">Kamar B2</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div style="display:flex;align-items:center;gap:8px;">
                            <div class="foto-placeholder">
                                <svg fill="none" stroke="#6366f1" viewBox="0 0 24 24" width="15" height="15"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10"/></svg>
                            </div>
                            <span style="font-weight:600;color:#1e1b4b;">Sapu</span>
                        </div>
                    </td>
                    <td><span class="badge badge-blue">Alat Kebersihan</span></td>
                    <td style="color:#6b7280;font-size:12px;">Untuk bersih-bersih kamar</td>
                    <td class="center" style="color:#6b7280;font-size:12px;">5 Mei 2026</td>
                    <td class="center"><span class="badge badge-green">✓ Dikembalikan</span></td>
                    <td class="center"><span style="font-size:12px;color:#d1d5db;">—</span></td>
                </tr>
                @endforelse

            </tbody>
        </table>

        <div id="emptySearch" style="display:none;" class="empty-state">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="40" height="40" style="margin:0 auto 12px;opacity:0.3;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z"/></svg>
            <p style="font-size:14px;font-weight:600;">Data tidak ditemukan</p>
            <p style="font-size:12px;margin-top:4px;">Coba kata kunci atau filter lain</p>
        </div>
    </div>

</div>

<script>
function hitungStats() {
    var rows = document.querySelectorAll('.barang-row');
    var total = rows.length, dipinjam = 0, kembali = 0, rusak = 0;
    rows.forEach(function(r) {
        var s = r.getAttribute('data-status');
        if (s === 'Dipinjam') dipinjam++;
        else if (s === 'Dikembalikan') kembali++;
        else if (s === 'Rusak') rusak++;
    });
    document.getElementById('statTotal').textContent    = total;
    document.getElementById('statDipinjam').textContent = dipinjam;
    document.getElementById('statKembali').textContent  = kembali;
    document.getElementById('statRusak').textContent    = rusak;
}

function filterTabel() {
    var keyword = document.getElementById('searchInput').value.toLowerCase();
    var status  = document.getElementById('filterStatus').value;
    var rows    = document.querySelectorAll('.barang-row');
    var visible = 0;
    rows.forEach(function(row) {
        var cari    = row.getAttribute('data-cari') || '';
        var rowStat = row.getAttribute('data-status') || '';
        var cocok   = cari.includes(keyword) && (status === '' || rowStat === status);
        row.style.display = cocok ? '' : 'none';
        if (cocok) visible++;
    });
    document.getElementById('emptySearch').style.display = visible === 0 ? 'block' : 'none';
}

hitungStats();
</script>

@endsection