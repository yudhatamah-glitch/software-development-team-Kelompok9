@extends('layouts.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    * { font-family: 'Plus Jakarta Sans', sans-serif; }

    .page-wrap {
        padding: 28px 28px 28px 72px;
        max-width: 680px;
    }

    .form-card {
        background: #ffffff;
        border-radius: 20px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 4px 24px rgba(99,102,241,0.08);
        padding: 28px 32px;
    }

    .field-label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: #374151;
        margin-bottom: 7px;
    }

    .input-wrap { position: relative; }
    .input-wrap .input-icon {
        position: absolute;
        left: 13px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        color: #a5b4fc;
    }

    .field-input {
        width: 100%;
        padding: 11px 14px 11px 38px;
        border-radius: 12px;
        border: 1.5px solid #e5e7eb;
        font-size: 14px;
        font-family: inherit;
        color: #111827;
        background: #f9fafb;
        outline: none;
        transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
    }
    .field-input:focus {
        border-color: #6366f1;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(99,102,241,0.12);
    }

    .field-select {
        width: 100%;
        padding: 11px 14px 11px 38px;
        border-radius: 12px;
        border: 1.5px solid #e5e7eb;
        font-size: 14px;
        font-family: inherit;
        color: #111827;
        background: #f9fafb;
        outline: none;
        cursor: pointer;
        appearance: none;
        transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
    }
    .field-select:focus {
        border-color: #6366f1;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(99,102,241,0.12);
    }

    .select-chevron {
        position: absolute;
        right: 13px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        color: #9ca3af;
    }

    .divider {
        border: none;
        border-top: 1px solid #f0f0f3;
        margin: 24px 0;
    }

    .btn-simpan {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 28px;
        background: linear-gradient(135deg, #6366f1, #818cf8);
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 700;
        font-family: inherit;
        cursor: pointer;
        transition: opacity 0.2s, transform 0.15s;
        box-shadow: 0 4px 14px rgba(99,102,241,0.3);
    }
    .btn-simpan:hover  { opacity: 0.88; transform: scale(0.99); }
    .btn-simpan:active { transform: scale(0.97); }

    .badge-tip {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 11px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 20px;
        background: rgba(99,102,241,0.1);
        color: #4f46e5;
        margin-left: 8px;
        vertical-align: middle;
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(14px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .fade-up { animation: fadeUp 0.38s ease both; }
</style>

<div class="page-wrap fade-up">

    {{-- Header --}}
    <div style="margin-bottom:24px;">
        <h1 style="font-size:20px;font-weight:800;color:#1e1b4b;margin-bottom:3px;">Data Kamar</h1>
        <p style="font-size:13px;color:#9ca3af;">Tambah atau perbarui informasi kamar</p>
    </div>

    {{-- Form Card --}}
    <div class="form-card">

        {{-- Section header --}}
        <div style="display:flex;align-items:center;gap:10px;margin-bottom:22px;">
            <div style="width:38px;height:38px;border-radius:11px;background:linear-gradient(135deg,#6366f1,#818cf8);display:flex;align-items:center;justify-content:center;flex-shrink:0;box-shadow:0 3px 10px rgba(99,102,241,0.3);">
                <svg fill="none" stroke="white" viewBox="0 0 24 24" width="18" height="18">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2z"/>
                </svg>
            </div>
            <div>
                <p style="font-size:14px;font-weight:700;color:#1e1b4b;line-height:1.2;">Informasi Kamar</p>
                <p style="font-size:12px;color:#9ca3af;">Lengkapi semua field di bawah</p>
            </div>
        </div>

        <form class="space-y-5">

            {{-- Nomor Kamar --}}
            <div>
                <label class="field-label">Nomor Kamar</label>
                <div class="input-wrap">
                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                    </svg>
                    <input
                        type="text"
                        placeholder="Contoh: A1, B2, 101"
                        class="field-input"
                    >
                </div>
            </div>

            {{-- Tipe Kamar --}}
            <div>
                <label class="field-label">Tipe Kamar</label>
                <div class="input-wrap">
                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                    </svg>
                    <select class="field-select">
                        <option>Kamar Standard</option>
                        <option>Kamar VIP</option>
                        <option>Kamar AC</option>
                    </select>
                    <svg class="select-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="15" height="15">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
            </div>

            {{-- Harga Kamar --}}
            <div>
                <label class="field-label">Harga Kamar</label>
                <div class="input-wrap">
                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <input
                        type="number"
                        placeholder="Contoh: 350000"
                        class="field-input"
                    >
                </div>
                <p style="font-size:11px;color:#9ca3af;margin-top:5px;padding-left:2px;">Masukkan harga dalam Rupiah (tanpa titik/koma)</p>
            </div>

            {{-- Status --}}
            <div>
                <label class="field-label">Status</label>
                <div class="input-wrap">
                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <select class="field-select" id="statusSelect" onchange="updateStatusBadge(this.value)">
                        <option value="Tersedia">Tersedia</option>
                        <option value="Terisi">Terisi</option>
                    </select>
                    <svg class="select-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="15" height="15">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
                <div style="margin-top:8px;">
                    <span id="statusBadge" style="display:inline-flex;align-items:center;gap:5px;font-size:12px;font-weight:600;padding:4px 12px;border-radius:20px;background:rgba(16,185,129,0.12);color:#059669;">
                        ✦ Tersedia
                    </span>
                </div>
            </div>

            <hr class="divider">

            {{-- Submit --}}
            <div>
                <button type="submit" class="btn-simpan">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                    Simpan Data
                </button>
            </div>

        </form>
    </div>
</div>

<script>
function updateStatusBadge(val) {
    var badge = document.getElementById('statusBadge');
    if (val === 'Tersedia') {
        badge.style.background = 'rgba(16,185,129,0.12)';
        badge.style.color = '#059669';
        badge.textContent = '✦ Tersedia';
    } else {
        badge.style.background = 'rgba(239,68,68,0.10)';
        badge.style.color = '#dc2626';
        badge.textContent = '✕ Terisi';
    }
}
</script>

@endsection