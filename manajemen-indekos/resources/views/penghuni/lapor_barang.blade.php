<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lapor Barang Rusak</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        body {
            background: linear-gradient(135deg, #e0e7ff 0%, #f0f4ff 45%, #faf5ff 75%, #e8f5e9 100%);
            min-height: 100vh;
        }
        .orb {
            position: fixed; border-radius: 50%;
            filter: blur(80px); opacity: 0.35; pointer-events: none; z-index: 0;
        }
        .card {
            background: rgba(255,255,255,0.75);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255,255,255,0.7);
            border-radius: 20px;
        }
        .field-label {
            display: block; font-size: 13px; font-weight: 600;
            color: #374151; margin-bottom: 7px;
        }
        .input-wrap { position: relative; }
        .input-wrap .input-icon {
            position: absolute; left: 13px; top: 50%;
            transform: translateY(-50%); pointer-events: none; color: #a5b4fc;
        }
        .field-input, .field-select, .field-textarea {
            width: 100%; padding: 11px 14px 11px 38px;
            border-radius: 12px; border: 1.5px solid #e5e7eb;
            font-size: 14px; font-family: inherit;
            color: #111827; background: #f9fafb; outline: none;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
        }
        .field-textarea { padding-left: 14px; resize: vertical; }
        .field-input:focus, .field-select:focus, .field-textarea:focus {
            border-color: #6366f1; background: #fff;
            box-shadow: 0 0 0 3px rgba(99,102,241,0.12);
        }
        .field-select { appearance: none; cursor: pointer; }
        .select-chevron {
            position: absolute; right: 13px; top: 50%;
            transform: translateY(-50%); pointer-events: none; color: #9ca3af;
        }
        .btn-lapor {
            width: 100%; padding: 13px; border-radius: 12px; border: none;
            font-size: 15px; font-weight: 700; font-family: inherit; cursor: pointer;
            background: linear-gradient(135deg, #ef4444, #f87171);
            color: white; box-shadow: 0 4px 14px rgba(239,68,68,0.3);
            transition: opacity 0.2s, transform 0.15s;
        }
        .btn-lapor:hover  { opacity: 0.88; transform: scale(0.99); }
        .btn-lapor:active { transform: scale(0.97); }
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
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(14px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up { animation: fadeUp 0.38s ease both; }
    </style>
</head>
<body>

<div class="orb" style="width:360px;height:360px;background:#93c5fd;top:-80px;left:-100px;"></div>
<div class="orb" style="width:300px;height:300px;background:#fca5a5;top:80px;right:-80px;"></div>
<div class="orb" style="width:260px;height:260px;background:#6ee7b7;bottom:40px;left:40%;"></div>

<div style="max-width:600px;margin:40px auto;padding:20px;position:relative;z-index:1;" class="fade-up">

    {{-- Back --}}
    <a href="{{ route('penghuni.dashboard') }}"
       style="display:inline-flex;align-items:center;gap:6px;font-size:13px;font-weight:600;color:#6b7280;text-decoration:none;margin-bottom:20px;"
       onmouseover="this.style.color='#6366f1'" onmouseout="this.style.color='#6b7280'">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="15" height="15">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Kembali ke Dashboard
    </a>

    <div class="card" style="padding:32px;box-shadow:0 8px 32px rgba(239,68,68,0.1);">

        {{-- Header --}}
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:26px;">
            <div style="width:42px;height:42px;border-radius:13px;background:linear-gradient(135deg,#ef4444,#f87171);display:flex;align-items:center;justify-content:center;box-shadow:0 4px 12px rgba(239,68,68,0.3);flex-shrink:0;">
                <svg fill="none" stroke="white" viewBox="0 0 24 24" width="20" height="20">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                </svg>
            </div>
            <div>
                <h1 style="font-size:18px;font-weight:800;color:#1e1b4b;line-height:1.2;">Lapor Barang Rusak</h1>
                <p style="font-size:12px;color:#9ca3af;margin-top:2px;">Laporkan barang inventaris yang rusak ke admin</p>
            </div>
        </div>

        {{-- Alert --}}
        @if(session('success'))
            <div class="alert-success">✓ {{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert-error">⚠ {{ $errors->first() }}</div>
        @endif

        <form action="{{ route('penghuni.lapor_barang') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Nama Barang --}}
            <div style="margin-bottom:16px;">
                <label class="field-label">Nama Barang <span style="color:#ef4444;">*</span></label>
                <div class="input-wrap">
                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="15" height="15">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10"/>
                    </svg>
                    <input type="text" name="nama_barang" class="field-input"
                           placeholder="Contoh: Kipas Angin, Lampu, Kunci"
                           value="{{ old('nama_barang') }}" required>
                </div>
            </div>

            {{-- Lokasi --}}
            <div style="margin-bottom:16px;">
                <label class="field-label">Lokasi Barang <span style="color:#ef4444;">*</span></label>
                <div class="input-wrap">
                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="15" height="15">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    </svg>
                    <select name="lokasi" class="field-select" required>
                        <option value="">-- Pilih lokasi --</option>
                        <option value="Kamar" {{ old('lokasi') == 'Kamar' ? 'selected' : '' }}>Kamar</option>
                        <option value="Kamar Mandi" {{ old('lokasi') == 'Kamar Mandi' ? 'selected' : '' }}>Kamar Mandi</option>
                        <option value="Dapur" {{ old('lokasi') == 'Dapur' ? 'selected' : '' }}>Dapur</option>
                        <option value="Area Umum" {{ old('lokasi') == 'Area Umum' ? 'selected' : '' }}>Area Umum</option>
                        <option value="Lainnya" {{ old('lokasi') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    <svg class="select-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
            </div>

            {{-- Deskripsi Kerusakan --}}
            <div style="margin-bottom:16px;">
                <label class="field-label">Deskripsi Kerusakan <span style="color:#ef4444;">*</span></label>
                <textarea name="deskripsi" class="field-textarea" rows="3"
                          placeholder="Jelaskan kerusakan yang terjadi..." required>{{ old('deskripsi') }}</textarea>
            </div>

            {{-- Foto --}}
            <div style="margin-bottom:24px;">
                <label class="field-label">Foto Kerusakan <span style="color:#9ca3af;font-weight:400;">(opsional)</span></label>
                <input type="file" name="foto" accept="image/*"
                       style="width:100%;padding:10px 14px;border-radius:12px;border:1.5px solid #e5e7eb;font-size:13px;font-family:inherit;background:#f9fafb;cursor:pointer;">
                <p style="font-size:11px;color:#9ca3af;margin-top:5px;">Format: JPG, PNG. Maks 2MB</p>
            </div>

            <button type="submit" class="btn-lapor">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16" style="display:inline;margin-right:6px;vertical-align:-3px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                </svg>
                Kirim Laporan
            </button>

        </form>
    </div>
</div>

</body>
</html>