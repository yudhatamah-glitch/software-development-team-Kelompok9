@extends('layouts.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    * { font-family: 'Plus Jakarta Sans', sans-serif; }

    .page-wrap { padding: 28px; max-width: 640px; margin: 0 auto; }

    .form-card {
        background: #ffffff;
        border-radius: 24px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 8px 32px rgba(99,102,241,0.08);
        padding: 32px;
    }

    .field-label {
        display: block;
        font-size: 13px; font-weight: 600;
        color: #374151; margin-bottom: 7px;
    }

    .input-wrap { position: relative; }
    .input-wrap .input-icon {
        position: absolute; left: 13px; top: 50%;
        transform: translateY(-50%); pointer-events: none; color: #a5b4fc;
    }

    .field-input, .field-select {
        width: 100%;
        padding: 11px 14px 11px 38px;
        border-radius: 12px; border: 1.5px solid #e5e7eb;
        font-size: 14px; font-family: inherit;
        color: #111827; background: #f9fafb;
        outline: none; transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
    }
    .field-input:focus, .field-select:focus {
        border-color: #6366f1; background: #fff;
        box-shadow: 0 0 0 3px rgba(99,102,241,0.12);
    }

    .field-select { appearance: none; cursor: pointer; }

    .select-chevron {
        position: absolute; right: 13px; top: 50%;
        transform: translateY(-50%); pointer-events: none; color: #9ca3af;
    }

    .status-preview {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 6px 14px; border-radius: 20px;
        font-size: 13px; font-weight: 700;
        margin-top: 8px; transition: all 0.2s;
    }

    .btn-simpan {
        width: 100%; padding: 13px;
        border-radius: 12px; border: none;
        font-size: 15px; font-weight: 700; font-family: inherit;
        cursor: pointer;
        background: linear-gradient(135deg, #6366f1, #818cf8);
        color: white;
        box-shadow: 0 4px 14px rgba(99,102,241,0.3);
        transition: opacity 0.2s, transform 0.15s;
    }
    .btn-simpan:hover  { opacity: 0.88; transform: scale(0.99); }
    .btn-simpan:active { transform: scale(0.97); }

    .btn-batal {
        display: inline-flex; align-items: center; gap: 6px;
        font-size: 13px; font-weight: 600; color: #9ca3af;
        text-decoration: none; transition: color 0.2s;
        background: none; border: none; cursor: pointer; font-family: inherit;
    }
    .btn-batal:hover { color: #6366f1; }

    .alert-success {
        background: rgba(16,185,129,0.1); border: 1px solid rgba(16,185,129,0.25);
        color: #059669; border-radius: 12px; padding: 12px 16px;
        font-size: 13px; margin-bottom: 20px;
    }
    .alert-error {
        background: rgba(239,68,68,0.08); border: 1px solid rgba(239,68,68,0.2);
        color: #dc2626; border-radius: 12px; padding: 12px 16px;
        font-size: 13px; margin-bottom: 20px;
    }

    .divider { border: none; border-top: 1px solid #f0f0f3; margin: 24px 0; }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(14px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .fade-up { animation: fadeUp 0.38s ease both; }
</style>

<div class="page-wrap fade-up">

    {{-- Back button --}}
    <a href="/admin/pembayaran" style="display:inline-flex;align-items:center;gap:6px;font-size:13px;font-weight:600;color:#6b7280;text-decoration:none;margin-bottom:20px;transition:color 0.2s;"
       onmouseover="this.style.color='#6366f1'" onmouseout="this.style.color='#6b7280'">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="15" height="15">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Kembali ke Pembayaran
    </a>

    <div class="form-card">

        {{-- Header --}}
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:26px;">
            <div style="width:42px;height:42px;border-radius:13px;background:linear-gradient(135deg,#6366f1,#818cf8);display:flex;align-items:center;justify-content:center;box-shadow:0 4px 12px rgba(99,102,241,0.3);flex-shrink:0;">
                <svg fill="none" stroke="white" viewBox="0 0 24 24" width="20" height="20">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div>
                <h1 style="font-size:18px;font-weight:800;color:#1e1b4b;line-height:1.2;">Tambah Pembayaran</h1>
                <p style="font-size:12px;color:#9ca3af;margin-top:2px;">Catat pembayaran sewa penghuni</p>
            </div>
        </div>

        {{-- Alert --}}
        @if(session('success'))
            <div class="alert-success">✓ {{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert-error">⚠ {{ $errors->first() }}</div>
        @endif

        {{-- Form --}}
        <form method="POST" action="/admin/pembayaran/simpan">
            @csrf

            {{-- Nama Penghuni --}}
            <div style="margin-bottom:16px;">
                <label class="field-label">Nama Penghuni <span style="color:#ef4444;">*</span></label>
                <div class="input-wrap">
                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="15" height="15">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <select name="penghuni_id" class="field-select" required>
                        <option value="">-- Pilih penghuni --</option>
                        @foreach($penghunis ?? [] as $penghuni)
                            <option value="{{ $penghuni->id }}" {{ old('penghuni_id') == $penghuni->id ? 'selected' : '' }}>
                                {{ $penghuni->nama }} — Kamar {{ $penghuni->kamar }}
                            </option>
                        @endforeach
                    </select>
                    <svg class="select-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
            </div>

            {{-- Bulan --}}
            <div style="margin-bottom:16px;">
                <label class="field-label">Bulan Pembayaran <span style="color:#ef4444;">*</span></label>
                <div class="input-wrap">
                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="15" height="15">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <select name="bulan" class="field-select" required>
                        <option value="">-- Pilih bulan --</option>
                        @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $bln)
                            <option value="{{ $bln }}" {{ old('bulan') == $bln ? 'selected' : '' }}>{{ $bln }}</option>
                        @endforeach
                    </select>
                    <svg class="select-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
            </div>

            {{-- Jumlah --}}
            <div style="margin-bottom:16px;">
                <label class="field-label">Jumlah Bayar <span style="color:#ef4444;">*</span></label>
                <div class="input-wrap">
                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="15" height="15">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8V7m0 1v8m0 0v1"/>
                    </svg>
                    <input type="number" name="jumlah" class="field-input"
                           placeholder="Contoh: 350000"
                           value="{{ old('jumlah') }}" required>
                </div>
                <p style="font-size:11px;color:#9ca3af;margin-top:5px;padding-left:2px;">Masukkan nominal dalam Rupiah tanpa titik</p>
            </div>

            {{-- Status --}}
            <div style="margin-bottom:8px;">
                <label class="field-label">Status Pembayaran <span style="color:#ef4444;">*</span></label>
                <div class="input-wrap">
                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="15" height="15">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <select name="status" id="statusSelect" class="field-select"
                            onchange="updateStatusPreview(this.value)" required>
                        <option value="">-- Pilih status --</option>
                        <option value="Lunas"      {{ old('status') == 'Lunas'      ? 'selected' : '' }}>Lunas</option>
                        <option value="Belum Bayar" {{ old('status') == 'Belum Bayar' ? 'selected' : '' }}>Belum Bayar</option>
                        <option value="Menunggak"  {{ old('status') == 'Menunggak'  ? 'selected' : '' }}>Menunggak</option>
                    </select>
                    <svg class="select-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
                {{-- Preview badge status --}}
                <div id="statusPreview" style="display:none;">
                    <span id="statusBadge" class="status-preview"></span>
                </div>
            </div>

            <hr class="divider">

            {{-- Actions --}}
            <div style="display:flex;align-items:center;justify-content:space-between;gap:12px;">
                <a href="/admin/pembayaran" class="btn-batal">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    Batal
                </a>
                <button type="submit" class="btn-simpan" style="width:auto;padding:11px 32px;">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16" style="display:inline;margin-right:6px;vertical-align:-3px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                    Simpan Pembayaran
                </button>
            </div>

        </form>
    </div>
</div>

<script>
function updateStatusPreview(val) {
    var preview = document.getElementById('statusPreview');
    var badge   = document.getElementById('statusBadge');
    if (!val) { preview.style.display = 'none'; return; }
    preview.style.display = 'block';
    if (val === 'Lunas') {
        badge.style.background = 'rgba(16,185,129,0.12)';
        badge.style.color = '#059669';
        badge.textContent = '● Lunas';
    } else if (val === 'Menunggak') {
        badge.style.background = 'rgba(245,158,11,0.12)';
        badge.style.color = '#d97706';
        badge.textContent = '● Menunggak';
    } else {
        badge.style.background = 'rgba(239,68,68,0.1)';
        badge.style.color = '#dc2626';
        badge.textContent = '● Belum Bayar';
    }
}

// Jalankan kalau ada old value (setelah validasi gagal)
var oldStatus = "{{ old('status') }}";
if (oldStatus) updateStatusPreview(oldStatus);
</script>

@endsection