@extends('layouts.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    * { font-family: 'Plus Jakarta Sans', sans-serif; }
    .page-wrap { padding: 28px; max-width: 1000px; margin: 0 auto; }

    .card {
        background: rgba(255,255,255,0.68);
        backdrop-filter: blur(16px);
        border: 1px solid rgba(255,255,255,0.6);
        border-radius: 20px; overflow: hidden;
    }

    .form-card {
        background: #ffffff;
        border-radius: 20px; border: 1px solid #e5e7eb;
        box-shadow: 0 4px 24px rgba(99,102,241,0.07);
        padding: 24px 28px;
    }

    /* Tabs */
    .tab-bar { display: flex; gap: 6px; margin-bottom: 22px; }
    .tab-btn {
        padding: 9px 20px; border-radius: 11px; border: 1.5px solid #e5e7eb;
        font-size: 13px; font-weight: 600; cursor: pointer; font-family: inherit;
        background: white; color: #6b7280; transition: all 0.2s;
        display: flex; align-items: center; gap: 7px;
    }
    .tab-btn:hover { border-color: #6366f1; color: #6366f1; }
    .tab-btn.active { background: #6366f1; color: white; border-color: #6366f1; }

    .badge {
        display: inline-flex; align-items: center; gap: 4px;
        font-size: 12px; font-weight: 600; padding: 4px 11px; border-radius: 20px;
    }
    .badge-green  { background: rgba(16,185,129,0.12); color: #059669; }
    .badge-red    { background: rgba(239,68,68,0.10);  color: #dc2626; }
    .badge-yellow { background: rgba(245,158,11,0.12); color: #d97706; }
    .badge-blue   { background: rgba(99,102,241,0.10); color: #4f46e5; }

    .field-label { display:block; font-size:13px; font-weight:600; color:#374151; margin-bottom:7px; }
    .input-wrap { position: relative; }
    .input-wrap .input-icon { position:absolute; left:13px; top:50%; transform:translateY(-50%); pointer-events:none; color:#a5b4fc; }
    .field-input, .field-select {
        width:100%; padding:11px 14px 11px 38px;
        border-radius:12px; border:1.5px solid #e5e7eb;
        font-size:14px; font-family:inherit;
        color:#111827; background:#f9fafb; outline:none;
        transition:border-color 0.2s, box-shadow 0.2s;
    }
    .field-input:focus, .field-select:focus {
        border-color:#6366f1; background:#fff;
        box-shadow:0 0 0 3px rgba(99,102,241,0.12);
    }
    .field-select { appearance:none; cursor:pointer; }
    .select-chevron { position:absolute; right:13px; top:50%; transform:translateY(-50%); pointer-events:none; color:#9ca3af; }

    .btn-simpan {
        display:inline-flex; align-items:center; gap:7px;
        padding:11px 24px; border-radius:12px; border:none;
        font-size:14px; font-weight:700; font-family:inherit; cursor:pointer;
        background:linear-gradient(135deg,#6366f1,#818cf8); color:white;
        box-shadow:0 4px 14px rgba(99,102,241,0.3);
        transition:opacity 0.2s, transform 0.15s;
    }
    .btn-simpan:hover { opacity:0.88; transform:scale(0.99); }

    table { width:100%; border-collapse:collapse; }
    thead tr { background:#f5f3ff; border-bottom:1px solid #ede9fe; }
    thead th { padding:12px 16px; font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.06em; color:#6366f1; text-align:left; }
    thead th.center { text-align:center; }
    tbody tr { border-bottom:1px solid #f3f4f6; transition:background 0.15s; }
    tbody tr:last-child { border-bottom:none; }
    tbody tr:hover { background:#fafafa; }
    tbody td { padding:13px 16px; font-size:13px; color:#374151; }
    tbody td.center { text-align:center; }

    .avatar { width:30px; height:30px; border-radius:50%; background:linear-gradient(135deg,#ef4444,#f87171); display:flex; align-items:center; justify-content:center; font-size:11px; font-weight:700; color:white; flex-shrink:0; }

    .action-btn { display:inline-flex; align-items:center; gap:5px; padding:5px 11px; border-radius:8px; font-size:12px; font-weight:600; border:none; cursor:pointer; font-family:inherit; transition:opacity 0.2s; }
    .action-btn:hover { opacity:0.8; }
    .btn-selesai { background:rgba(16,185,129,0.1); color:#059669; }

    .search-input { padding:9px 14px 9px 36px; border-radius:11px; border:1.5px solid #e5e7eb; font-size:13px; font-family:inherit; background:rgba(255,255,255,0.85); outline:none; width:200px; transition:border-color 0.2s; }
    .search-input:focus { border-color:#6366f1; box-shadow:0 0 0 3px rgba(99,102,241,0.1); }

    .empty-state { text-align:center; padding:44px 20px; color:#9ca3af; }

    @keyframes fadeUp { from{opacity:0;transform:translateY(12px);} to{opacity:1;transform:translateY(0);} }
    .fade-up { animation:fadeUp 0.38s ease both; }
</style>

<div class="page-wrap fade-up">

    {{-- Header --}}
    <div style="margin-bottom:22px;">
        <h1 style="font-size:20px;font-weight:800;color:#1e1b4b;margin-bottom:3px;">Manajemen Barang</h1>
        <p style="font-size:13px;color:#9ca3af;">Tambah barang inventaris & lihat laporan kerusakan dari penghuni</p>
    </div>

    {{-- Tabs --}}
    <div class="tab-bar">
        <button class="tab-btn active" onclick="switchTab('tambah', this)">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
            Tambah Barang
        </button>
        <button class="tab-btn" onclick="switchTab('laporan', this)">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/></svg>
            Laporan Rusak
            @if(isset($laporans) && $laporans->where('status','Belum Ditangani')->count() > 0)
                <span style="background:#ef4444;color:white;border-radius:20px;padding:1px 7px;font-size:11px;">
                    {{ $laporans->where('status','Belum Ditangani')->count() }}
                </span>
            @endif
        </button>
    </div>

    {{-- TAB 1: Tambah Barang --}}
    <div id="tab-tambah">
        <div class="form-card">
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:22px;">
                <div style="width:38px;height:38px;border-radius:11px;background:linear-gradient(135deg,#6366f1,#818cf8);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <svg fill="none" stroke="white" viewBox="0 0 24 24" width="18" height="18"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10"/></svg>
                </div>
                <div>
                    <p style="font-size:14px;font-weight:700;color:#1e1b4b;">Tambah Barang Inventaris</p>
                    <p style="font-size:12px;color:#9ca3af;">Barang yang tersedia untuk penghuni</p>
                </div>
            </div>

            @if(session('success'))
                <div style="background:rgba(16,185,129,0.1);border:1px solid rgba(16,185,129,0.25);color:#059669;border-radius:12px;padding:12px 16px;font-size:13px;margin-bottom:18px;">
                    ✓ {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="/admin/tambah" style="display:flex;flex-direction:column;gap:16px;">
                @csrf

                <div>
                    <label class="field-label">Nama Barang <span style="color:#ef4444;">*</span></label>
                    <div class="input-wrap">
                        <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="15" height="15"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10"/></svg>
                        <input type="text" name="nama" class="field-input" placeholder="Contoh: Kipas Angin, Sapu, Ember" value="{{ old('nama') }}" required>
                    </div>
                </div>

                <div>
                    <label class="field-label">Kategori</label>
                    <div class="input-wrap">
                        <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="15" height="15"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                        <input type="text" name="kategori" class="field-input" placeholder="Contoh: Elektronik, Alat Kebersihan" value="{{ old('kategori') }}">
                    </div>
                </div>

                <div>
                    <label class="field-label">Status</label>
                    <div class="input-wrap">
                        <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="15" height="15"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <select name="status" class="field-select">
                            <option value="Tersedia">Tersedia</option>
                            <option value="Dipinjam">Dipinjam</option>
                            <option value="Rusak">Rusak</option>
                        </select>
                        <svg class="select-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn-simpan">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="15" height="15"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        Simpan Barang
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- TAB 2: Laporan Rusak --}}
    <div id="tab-laporan" style="display:none;">

        {{-- Toolbar --}}
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;flex-wrap:wrap;gap:10px;">
            <p style="font-size:13px;color:#6b7280;">Laporan kerusakan barang dari penghuni</p>
            <div style="position:relative;">
                <svg fill="none" stroke="#9ca3af" viewBox="0 0 24 24" width="15" height="15" style="position:absolute;left:11px;top:50%;transform:translateY(-50%);pointer-events:none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z"/></svg>
                <input type="text" id="searchLaporan" class="search-input" placeholder="Cari laporan..." oninput="filterLaporan()">
            </div>
        </div>

        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>Penghuni</th>
                        <th>Nama Barang</th>
                        <th>Lokasi</th>
                        <th>Deskripsi</th>
                        <th class="center">Tgl Lapor</th>
                        <th class="center">Status</th>
                        <th class="center">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tabelLaporan">

                    @forelse($laporans ?? [] as $l)
                    <tr class="laporan-row" data-cari="{{ strtolower($l->penghuni->nama ?? '') }} {{ strtolower($l->nama_barang) }}">
                        <td>
                            <div style="display:flex;align-items:center;gap:8px;">
                                <div class="avatar">{{ strtoupper(substr($l->penghuni->nama ?? 'P', 0, 2)) }}</div>
                                <div>
                                    <p style="font-weight:600;color:#1e1b4b;font-size:13px;">{{ $l->penghuni->nama ?? '-' }}</p>
                                    <p style="font-size:11px;color:#9ca3af;">Kamar {{ $l->penghuni->kamar ?? '-' }}</p>
                                </div>
                            </div>
                        </td>
                        <td style="font-weight:600;color:#1e1b4b;">{{ $l->nama_barang }}</td>
                        <td><span class="badge badge-blue">{{ $l->lokasi }}</span></td>
                        <td style="color:#6b7280;font-size:12px;max-width:160px;">
                            <span title="{{ $l->deskripsi }}">{{ Str::limit($l->deskripsi, 40) }}</span>
                        </td>
                        <td class="center" style="color:#6b7280;font-size:12px;">
                            {{ \Carbon\Carbon::parse($l->created_at)->format('d M Y') }}
                        </td>
                        <td class="center">
                            @if($l->status === 'Belum Ditangani')
                                <span class="badge badge-red">⚠ Belum Ditangani</span>
                            @else
                                <span class="badge badge-green">✓ Selesai</span>
                            @endif
                        </td>
                        <td class="center">
                            @if($l->status === 'Belum Ditangani')
                            <form method="POST" action="/admin/barang/selesai/{{ $l->id }}" style="margin:0;" onsubmit="return confirm('Tandai laporan ini sudah ditangani?')">
                                @csrf @method('PATCH')
                                <button type="submit" class="action-btn btn-selesai">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="12" height="12"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    Selesai
                                </button>
                            </form>
                            @else
                                <span style="font-size:12px;color:#d1d5db;">—</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    {{-- Placeholder --}}
                    <tr class="laporan-row" data-cari="reno kipas angin">
                        <td>
                            <div style="display:flex;align-items:center;gap:8px;">
                                <div class="avatar">RE</div>
                                <div>
                                    <p style="font-weight:600;color:#1e1b4b;font-size:13px;">Reno</p>
                                    <p style="font-size:11px;color:#9ca3af;">Kamar A1</p>
                                </div>
                            </div>
                        </td>
                        <td style="font-weight:600;color:#1e1b4b;">Kipas Angin</td>
                        <td><span class="badge badge-blue">Kamar</span></td>
                        <td style="color:#6b7280;font-size:12px;">Baling-baling patah tidak bisa berputar</td>
                        <td class="center" style="color:#6b7280;font-size:12px;">10 Mei 2026</td>
                        <td class="center"><span class="badge badge-red">⚠ Belum Ditangani</span></td>
                        <td class="center">
                            <button class="action-btn btn-selesai">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="12" height="12"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Selesai
                            </button>
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>

            <div id="emptyLaporan" style="display:none;" class="empty-state">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="38" height="38" style="margin:0 auto 10px;opacity:0.3;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <p style="font-size:14px;font-weight:600;">Tidak ada laporan</p>
                <p style="font-size:12px;margin-top:3px;">Semua barang dalam kondisi baik</p>
            </div>
        </div>
    </div>

</div>

<script>
function switchTab(tab, btn) {
    document.getElementById('tab-tambah').style.display  = tab === 'tambah'  ? 'block' : 'none';
    document.getElementById('tab-laporan').style.display = tab === 'laporan' ? 'block' : 'none';
    document.querySelectorAll('.tab-btn').forEach(function(b) { b.classList.remove('active'); });
    btn.classList.add('active');
}

function filterLaporan() {
    var keyword = document.getElementById('searchLaporan').value.toLowerCase();
    var rows    = document.querySelectorAll('.laporan-row');
    var vis     = 0;
    rows.forEach(function(row) {
        var cari = row.getAttribute('data-cari') || '';
        var show = cari.includes(keyword);
        row.style.display = show ? '' : 'none';
        if (show) vis++;
    });
    document.getElementById('emptyLaporan').style.display = vis === 0 ? 'block' : 'none';
}

// Buka tab laporan otomatis kalau ada parameter di URL
if (window.location.hash === '#laporan') {
    switchTab('laporan', document.querySelectorAll('.tab-btn')[1]);
}
</script>

@endsection