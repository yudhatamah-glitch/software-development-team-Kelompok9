@extends('layouts.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    *{
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .page-wrap{
        padding:28px;
        max-width:1100px;
        margin:0 auto;
    }

    .glass-card{
        background:rgba(255,255,255,0.85);
        backdrop-filter:blur(18px);
        border:1px solid rgba(255,255,255,0.7);
        border-radius:24px;
        overflow:hidden;
        box-shadow:0 10px 35px rgba(99,102,241,0.08);
    }

    .stat-card{
        border-radius:22px;
        padding:20px;
        color:white;
        position:relative;
        overflow:hidden;
    }

    .stat-card::after{
        content:'';
        position:absolute;
        width:120px;
        height:120px;
        background:rgba(255,255,255,0.08);
        border-radius:50%;
        top:-40px;
        right:-25px;
    }

    .table-head{
        background:#f5f3ff;
    }

    .table-head th{
        padding:15px;
        font-size:12px;
        font-weight:700;
        text-transform:uppercase;
        letter-spacing:.05em;
        color:#6366f1;
    }

    tbody tr{
        border-top:1px solid #f1f5f9;
        transition:.2s;
    }

    tbody tr:hover{
        background:#fafafa;
    }

    tbody td{
        padding:16px 14px;
        font-size:14px;
        color:#374151;
    }

    .status{
        display:inline-flex;
        align-items:center;
        gap:5px;
        padding:6px 12px;
        border-radius:999px;
        font-size:12px;
        font-weight:700;
    }

    .lunas{
        background:rgba(34,197,94,0.12);
        color:#16a34a;
    }

    .belum{
        background:rgba(239,68,68,0.12);
        color:#dc2626;
    }

    .btn-detail{
        background:#eef2ff;
        color:#4f46e5;
        padding:8px 14px;
        border-radius:10px;
        font-size:12px;
        font-weight:600;
        text-decoration:none;
        transition:.2s;
        border:none;
        cursor:pointer;
    }

    .btn-detail:hover{
        background:#4f46e5;
        color:white;
    }

    .search-input{
        width:250px;
        padding:11px 14px;
        border-radius:14px;
        border:1px solid #e5e7eb;
        outline:none;
        background:#f9fafb;
        font-size:13px;
    }

    .search-input:focus{
        border-color:#6366f1;
        background:white;
        box-shadow:0 0 0 4px rgba(99,102,241,0.08);
    }

    .fade-up{
        animation:fadeUp .4s ease;
    }

    @keyframes fadeUp{
        from{
            opacity:0;
            transform:translateY(12px);
        }
        to{
            opacity:1;
            transform:translateY(0);
        }
    }
</style>

<div class="page-wrap fade-up">

    {{-- Header --}}
    <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:14px;margin-bottom:24px;">

        <div>
            <h1 style="font-size:25px;font-weight:800;color:#1e1b4b;">
                Pembayaran
            </h1>

            <p style="font-size:14px;color:#9ca3af;margin-top:4px;">
                Monitoring pembayaran penghuni kos
            </p>
        </div>

        {{-- Search --}}
        <input
            type="text"
            placeholder="Cari penghuni..."
            class="search-input"
            id="searchInput"
            onkeyup="searchTable()"
        >

    </div>

    {{-- Statistik --}}
    <div class="grid md:grid-cols-3 gap-5 mb-6">

        <div class="stat-card" style="background:linear-gradient(135deg,#6366f1,#818cf8);">
            <p style="font-size:13px;opacity:.9;">Total Pembayaran</p>
            <h2 style="font-size:28px;font-weight:800;margin-top:6px;">
                Rp 4.500.000
            </h2>
        </div>

        <div class="stat-card" style="background:linear-gradient(135deg,#10b981,#34d399);">
            <p style="font-size:13px;opacity:.9;">Sudah Lunas</p>
            <h2 style="font-size:28px;font-weight:800;margin-top:6px;">
                8 Penghuni
            </h2>
        </div>

        <div class="stat-card" style="background:linear-gradient(135deg,#f59e0b,#fbbf24);">
            <p style="font-size:13px;opacity:.9;">Belum Bayar</p>
            <h2 style="font-size:28px;font-weight:800;margin-top:6px;">
                2 Penghuni
            </h2>
        </div>

    </div>

    {{-- Table --}}
    <div class="glass-card">

        <table class="w-full">

            <thead class="table-head">
                <tr>
                    <th>Nama</th>
                    <th>Kamar</th>
                    <th>Bulan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody id="paymentTable">

                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px;">
                            <div style="width:38px;height:38px;border-radius:50%;background:linear-gradient(135deg,#6366f1,#8b5cf6);display:flex;align-items:center;justify-content:center;color:white;font-weight:700;">
                                RE
                            </div>

                            <div>
                                <p style="font-weight:700;color:#1e1b4b;">Reno</p>
                                <p style="font-size:12px;color:#9ca3af;">Penghuni aktif</p>
                            </div>
                        </div>
                    </td>

                    <td style="font-weight:600;">A1</td>

                    <td>April 2026</td>

                    <td>
                        <span class="status lunas">
                            ● Lunas
                        </span>
                    </td>

                    <td>
                        <button class="btn-detail">
                            Detail
                        </button>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px;">
                            <div style="width:38px;height:38px;border-radius:50%;background:linear-gradient(135deg,#f59e0b,#fbbf24);display:flex;align-items:center;justify-content:center;color:white;font-weight:700;">
                                BU
                            </div>

                            <div>
                                <p style="font-weight:700;color:#1e1b4b;">Budi</p>
                                <p style="font-size:12px;color:#9ca3af;">Menunggu pembayaran</p>
                            </div>
                        </div>
                    </td>

                    <td style="font-weight:600;">A2</td>

                    <td>April 2026</td>

                    <td>
                        <span class="status belum">
                            ● Belum Bayar
                        </span>
                    </td>

                    <td>
                        <button class="btn-detail">
                            Reminder
                        </button>
                    </td>
                </tr>

            </tbody>

        </table>

    </div>

</div>

<script>
function searchTable() {

    let input = document.getElementById("searchInput").value.toLowerCase();

    let rows = document.querySelectorAll("#paymentTable tr");

    rows.forEach(row => {

        let text = row.innerText.toLowerCase();

        if(text.includes(input)){
            row.style.display = "";
        } else {
            row.style.display = "none";
        }

    });
}
</script>

@endsection