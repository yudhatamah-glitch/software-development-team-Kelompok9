@extends('layouts.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    * { font-family: 'Plus Jakarta Sans', sans-serif; }

    .page-wrap {
        padding: 28px;
        max-width: 860px;
        margin: 0 auto;
    }

    .card {
        background: #ffffff;
        border-radius: 20px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 4px 24px rgba(99,102,241,0.07);
        overflow: hidden;
    }

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
        box-shadow: 0 4px 12px rgba(99,102,241,0.25);
    }
    .btn-tambah:hover { opacity: 0.88; transform: scale(0.99); color: white; }

    .search-input {
        padding: 9px 14px 9px 36px;
        border-radius: 11px;
        border: 1.5px solid #e5e7eb;
        font-size: 13px;
        font-family: inherit;
        background: #f9fafb;
        outline: none;
        width: 220px;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .search-input:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99,102,241,0.1);
        background: #fff;
    }

    table { width: 100%; border-collapse: collapse; }
    thead tr {
        background: #f5f3ff;
        border-bottom: 1px solid #ede9fe;
    }
    thead th {
        padding: 12px 18px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: #6366f1;
        text-align: left;
    }
    thead th.center { text-align: center; }

    tbody tr {
        border-bottom: 1px solid #f3f4f6;
        transition: background 0.15s;
    }
    tbody tr:last-child { border-bottom: none; }
    tbody tr:hover { background: #fafafa; }

    tbody td {
        padding: 13px 18px;
        font-size: 13px;
        color: #374151;
    }
    tbody td.center { text-align: center; }

    .avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: linear-gradient(135deg, #6366f1, #a78bfa);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: 700;
        color: white;
        flex-shrink: 0;
    }

    .kamar-badge {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        font-size: 12px;
        font-weight: 600;
        padding: 4px 11px;
        border-radius: 20px;
        background: rgba(99,102,241,0.1);
        color: #4f46e5;
    }

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
    .btn-edit  { background: rgba(245,158,11,0.1); color: #d97706; }
    .btn-hapus { background: rgba(239,68,68,0.1);  color: #dc2626; }

    .empty-state {
        text-align: center;
        padding: 48px 20px;
        color: #9ca3af;
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(12px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .fade-up { animation: fadeUp 0.38s ease both; }
</style>

<div class="page-wrap fade-up">

    {{-- Header --}}
    <div style="display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:22px;flex-wrap:wrap;gap:12px;">
        <div>
            <h1 style="font-size:20px;font-weight:800;color:#1e1b4b;margin-bottom:3px;">Data Penghuni</h1>
            <p style="font-size:13px;color:#9ca3af;">Kelola data penghuni kos</p>
        </div>
        <a href="/admin/tambah_penghuni" class="btn-tambah">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="15" height="15">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Penghuni
        </a>
    </div>

    {{-- Search --}}
    <div style="margin-bottom:14px;position:relative;display:inline-block;">
        <svg fill="none" stroke="#9ca3af" viewBox="0 0 24 24" width="15" height="15"
             style="position:absolute;left:11px;top:50%;transform:translateY(-50%);pointer-events:none;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z"/>
        </svg>
        <input type="text" id="searchInput" class="search-input"
               placeholder="Cari nama penghuni..." oninput="filterTabel()">
    </div>

    {{-- Tabel --}}
    <div class="card">
        <table>
            <thead>
                <tr>
                    <th class="center" style="width:52px;">No</th>
                    <th>Nama</th>
                    <th class="center">Kamar</th>
                    <th>No HP</th>
                    <th class="center">Aksi</th>
                </tr>
            </thead>
            <tbody id="tabelBody">

                @forelse($penghunis ?? [] as $i => $p)
                <tr class="penghuni-row" data-nama="{{ strtolower($p->nama) }}">
                    <td class="center" style="color:#9ca3af;font-size:12px;">{{ $i + 1 }}</td>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px;">
                            <div class="avatar">{{ strtoupper(substr($p->nama, 0, 2)) }}</div>
                            <span style="font-weight:600;color:#1e1b4b;">{{ $p->nama }}</span>
                        </div>
                    </td>
                    <td class="center">
                        <span class="kamar-badge">🏠 {{ $p->kamar }}</span>
                    </td>
                    <td style="color:#6b7280;">{{ $p->no_hp }}</td>
                    <td class="center">
                        <div style="display:flex;gap:6px;justify-content:center;">
                            <a href="/admin/edit_penghuni/{{ $p->id }}" class="action-btn btn-edit">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="13" height="13"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                Edit
                            </a>
                            <form method="POST" action="/admin/hapus_penghuni/{{ $p->id }}" style="margin:0;" onsubmit="return confirm('Hapus penghuni ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="action-btn btn-hapus">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="13" height="13"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                {{-- Placeholder --}}
                <tr class="penghuni-row" data-nama="reno">
                    <td class="center" style="color:#9ca3af;font-size:12px;">1</td>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px;">
                            <div class="avatar">RE</div>
                            <span style="font-weight:600;color:#1e1b4b;">Reno</span>
                        </div>
                    </td>
                    <td class="center"><span class="kamar-badge">🏠 A1</span></td>
                    <td style="color:#6b7280;">08123456789</td>
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

        {{-- Empty search --}}
        <div id="emptySearch" style="display:none;" class="empty-state">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="38" height="38" style="margin:0 auto 10px;opacity:0.3;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a4 4 0 00-5-4M9 20H4v-2a4 4 0 015-4m4-4a4 4 0 110-8 4 4 0 010 8z"/>
            </svg>
            <p style="font-size:14px;font-weight:600;">Penghuni tidak ditemukan</p>
            <p style="font-size:12px;margin-top:3px;">Coba kata kunci lain</p>
        </div>
    </div>

</div>

<script>
function filterTabel() {
    var keyword = document.getElementById('searchInput').value.toLowerCase();
    var rows    = document.querySelectorAll('.penghuni-row');
    var visible = 0;
    rows.forEach(function(row) {
        var nama = row.getAttribute('data-nama') || '';
        var show = nama.includes(keyword);
        row.style.display = show ? '' : 'none';
        if (show) visible++;
    });
    document.getElementById('emptySearch').style.display = visible === 0 ? 'block' : 'none';
}
</script>

@endsection