<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Indekos App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }

        .glass {
            background: rgba(255,255,255,0.55);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255,255,255,0.5);
        }

        .kamar-card {
            background: rgba(255,255,255,0.6);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.55);
            border-radius: 20px;
            overflow: hidden;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .kamar-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(99,102,241,0.18);
        }

        .badge {
            display: inline-block;
            font-size: 11px;
            font-weight: 600;
            padding: 3px 10px;
            border-radius: 20px;
            letter-spacing: 0.03em;
        }

        .btn-booking {
            width: 100%;
            padding: 10px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 14px;
            border: none;
            cursor: pointer;
            transition: opacity 0.2s, transform 0.15s;
        }
        .btn-booking:hover { opacity: 0.88; transform: scale(0.99); }

        .nav-glass {
            background: rgba(255,255,255,0.18);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255,255,255,0.25);
        }

        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(70px);
            opacity: 0.45;
            pointer-events: none;
        }

        .facility-tag {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: rgba(99,102,241,0.08);
            color: #4f46e5;
            font-size: 12px;
            font-weight: 500;
            padding: 4px 10px;
            border-radius: 8px;
        }

        #dropdownLogin {
            border: 1px solid rgba(255,255,255,0.3);
            backdrop-filter: blur(16px);
            background: rgba(255,255,255,0.92);
        }
    </style>
</head>

<body style="background: linear-gradient(135deg, #e0e7ff 0%, #f0f4ff 40%, #faf5ff 70%, #e8f5e9 100%); min-height: 100vh;">

{{-- Background orbs --}}
<div class="fixed inset-0 -z-10 overflow-hidden">
    <div class="orb w-96 h-96 bg-blue-400" style="top:-60px;left:-80px;"></div>
    <div class="orb w-80 h-80 bg-violet-400" style="top:80px;right:-60px;"></div>
    <div class="orb w-72 h-72 bg-indigo-300" style="bottom:120px;left:30%;"></div>
    <div class="orb w-64 h-64 bg-emerald-300" style="bottom:-40px;right:10%;"></div>
</div>

{{-- Navbar --}}
<nav class="nav-glass sticky top-0 z-50">
    <div class="max-w-6xl mx-auto px-5 py-3 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <div style="width:34px;height:34px;background:linear-gradient(135deg,#6366f1,#818cf8);border-radius:10px;display:flex;align-items:center;justify-content:center;">
                <svg fill="none" stroke="white" viewBox="0 0 24 24" width="18" height="18">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l9-9 9 9M5 10v9a1 1 0 001 1h4v-5h4v5h4a1 1 0 001-1v-9"/>
                </svg>
            </div>
            <span style="font-size:16px;font-weight:800;background:linear-gradient(90deg,#4f46e5,#7c3aed);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">Indekos App</span>
        </div>

        <a href="/login"
   style="background:linear-gradient(135deg,#6366f1,#818cf8);color:white;padding:8px 20px;border-radius:10px;font-size:13px;font-weight:600;text-decoration:none;display:flex;align-items:center;gap:6px;">
    
    Login

</a>
    </div>
</nav>

{{-- Hero --}}
<div class="max-w-6xl mx-auto px-5 pt-14 pb-6">

    <div class="glass rounded-3xl px-8 py-10 mb-10" style="background:rgba(255,255,255,0.45);">
        <span class="badge" style="background:rgba(99,102,241,0.12);color:#4f46e5;">✦ Platform Indekos Terpercaya</span>
        <h2 style="font-size:36px;font-weight:800;color:#1e1b4b;margin-top:14px;line-height:1.2;">
            Cari Kos Nyaman<br>
            <span style="background:linear-gradient(90deg,#6366f1,#a855f7);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">&amp; Murah</span>
        </h2>
        <p style="color:#6b7280;font-size:15px;margin-top:10px;max-width:440px;line-height:1.7;">
            Temukan kamar terbaik yang sesuai kebutuhan Anda — nyaman, aman, dan terjangkau.
        </p>

        <div style="display:flex;gap:10px;margin-top:20px;flex-wrap:wrap;">
            <div class="glass" style="padding:10px 18px;border-radius:12px;display:flex;align-items:center;gap:8px;">
                <span style="font-size:18px;">🏠</span>
                <div>
                    <p style="font-size:11px;color:#9ca3af;line-height:1;">Kamar tersedia</p>
                    <p style="font-size:15px;font-weight:700;color:#1e1b4b;">3 Unit</p>
                </div>
            </div>
            <div class="glass" style="padding:10px 18px;border-radius:12px;display:flex;align-items:center;gap:8px;">
                <span style="font-size:18px;">⭐</span>
                <div>
                    <p style="font-size:11px;color:#9ca3af;line-height:1;">Rating</p>
                    <p style="font-size:15px;font-weight:700;color:#1e1b4b;">4.9 / 5</p>
                </div>
            </div>
            <div class="glass" style="padding:10px 18px;border-radius:12px;display:flex;align-items:center;gap:8px;">
                <span style="font-size:18px;">👥</span>
                <div>
                    <p style="font-size:11px;color:#9ca3af;line-height:1;">Penghuni aktif</p>
                    <p style="font-size:15px;font-weight:700;color:#1e1b4b;">12 Orang</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Kamar Cards --}}
    <h3 style="font-size:17px;font-weight:700;color:#374151;margin-bottom:16px;padding-left:2px;">Kamar Tersedia</h3>
    <div class="grid md:grid-cols-3 gap-5">

        {{-- Kamar 1 --}}
        <div class="kamar-card">
            <div style="position:relative;">
                <img src="{{ asset('images/kamar1.jpg') }}" class="w-full h-44 object-cover">
                <div style="position:absolute;top:10px;left:10px;">
                    <span class="badge" style="background:rgba(99,102,241,0.85);color:white;">Populer</span>
                </div>
                <div style="position:absolute;bottom:0;left:0;right:0;height:60px;background:linear-gradient(to top, rgba(0,0,0,0.35), transparent);"></div>
            </div>
            <div style="padding:16px;">
                <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:6px;">
                    <div>
                        <h3 style="font-size:16px;font-weight:700;color:#1e1b4b;">Kamar A1</h3>
                        <p style="font-size:12px;color:#9ca3af;">Nyaman &amp; strategis</p>
                    </div>
                    <p style="font-size:16px;font-weight:800;color:#6366f1;">Rp 350rb<span style="font-size:11px;font-weight:500;color:#9ca3af;">/bln</span></p>
                </div>
                <div style="display:flex;flex-wrap:wrap;gap:5px;margin:10px 0 14px;">
                    <span class="facility-tag">📶 WiFi</span>
                    <span class="facility-tag">🚿 KM Dalam</span>
                    <span class="facility-tag">❄️ AC</span>
                </div>
                <button class="btn-booking" style="background:#6074dd;color:white;">
                    Booking Sekarang
                </button>
            </div>
        </div>

        {{-- Kamar 2 --}}
        <div class="kamar-card">
            <div style="position:relative;">
                <img src="{{ asset('images/kamar2.jpg') }}" class="w-full h-44 object-cover">
                <div style="position:absolute;top:10px;left:10px;">
                    <span class="badge" style="background:rgba(48, 184, 86, 0.85);color:white;">Tersedia</span>
                </div>
                <div style="position:absolute;bottom:0;left:0;right:0;height:60px;background:linear-gradient(to top, rgba(0,0,0,0.35), transparent);"></div>
            </div>
            <div style="padding:16px;">
                <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:6px;">
                    <div>
                        <h3 style="font-size:16px;font-weight:700;color:#1e1b4b;">Kamar A2</h3>
                        <p style="font-size:12px;color:#9ca3af;">Minimalis &amp; bersih</p>
                    </div>
                    <p style="font-size:16px;font-weight:800;color:#10b981;">Rp 500rb<span style="font-size:11px;font-weight:500;color:#9ca3af;">/bln</span></p>
                </div>
                <div style="display:flex;flex-wrap:wrap;gap:5px;margin:10px 0 14px;">
                    <span class="facility-tag" style="background:rgba(16,185,129,0.08);color:#059669;">📶 WiFi</span>
                    <span class="facility-tag" style="background:rgba(16,185,129,0.08);color:#059669;">🌀 Kipas</span>
                    <span class="facility-tag" style="background:rgba(16,185,129,0.08);color:#059669;">🗄️ Lemari</span>
                </div>
                <button class="btn-booking" style="background:#6074dd;color:white;">
                    Booking Sekarang
                </button>
            </div>
        </div>

        {{-- Kamar 3 --}}
        <div class="kamar-card">
            <div style="position:relative;">
                <img src="{{ asset('images/kamar3.jpg') }}" class="w-full h-44 object-cover">
                <div style="position:absolute;top:10px;left:10px;">
                    <span class="badge" style="background:rgba(245,158,11,0.85);color:white;">Premium</span>
                </div>
                <div style="position:absolute;bottom:0;left:0;right:0;height:60px;background:linear-gradient(to top, rgba(0,0,0,0.35), transparent);"></div>
            </div>
            <div style="padding:16px;">
                <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:6px;">
                    <div>
                        <h3 style="font-size:16px;font-weight:700;color:#1e1b4b;">Kamar A3</h3>
                        <p style="font-size:12px;color:#9ca3af;">Premium &amp; luas</p>
                    </div>
                    <p style="font-size:16px;font-weight:800;color:#f59e0b;">Rp 750rb<span style="font-size:11px;font-weight:500;color:#9ca3af;">/bln</span></p>
                </div>
                <div style="display:flex;flex-wrap:wrap;gap:5px;margin:10px 0 14px;">
                    <span class="facility-tag" style="background:rgba(245,158,11,0.08);color:#d97706;">📶 WiFi</span>
                    <span class="facility-tag" style="background:rgba(245,158,11,0.08);color:#d97706;">❄️ AC</span>
                    <span class="facility-tag" style="background:rgba(245,158,11,0.08);color:#d97706;">📺 TV + Kulkas</span>
                </div>
                <button class="btn-booking" style="background:#6074dd;color:white;">
                    Booking Sekarang
                </button>
            </div>
        </div>

    </div>

    {{-- Tombol lebih banyak --}}
    <div style="text-align:center;margin-top:18px;">
        <button onclick="toggleKamarLain()" id="btnLebihBanyak"
            style="display:inline-flex;align-items:center;gap:6px;background:none;border:none;cursor:pointer;font-size:13px;font-weight:600;color:#6366f1;padding:6px 14px;border-radius:20px;transition:background 0.2s;"
            onmouseover="this.style.background='rgba(99,102,241,0.08)'"
            onmouseout="this.style.background='none'">
            <span id="btnLebihBanyakText">Lebih banyak</span>
            <svg id="btnChevron" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="15" height="15" style="transition:transform 0.3s;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
    </div>

    {{-- Kamar tambahan (tersembunyi) --}}
    <div id="kamarTambahan" style="overflow:hidden;max-height:0;transition:max-height 0.5s ease, opacity 0.4s ease;opacity:0;">
        <div class="grid md:grid-cols-3 gap-5" style="margin-top:20px;">

            {{-- Kamar B1 --}}
            <div class="kamar-card">
                <div style="position:relative;">
                    <img src="{{ asset('images/kamar4.jpg') }}" class="w-full h-44 object-cover">
                    <div style="position:absolute;top:10px;left:10px;">
                        <span class="badge" style="background:rgba(48, 184, 86, 0.85);color:white;">Tersedia</span>
                    </div>
                    <div style="position:absolute;bottom:0;left:0;right:0;height:60px;background:linear-gradient(to top, rgba(0,0,0,0.35), transparent);"></div>
                </div>
                <div style="padding:16px;">
                    <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:6px;">
                        <div>
                            <h3 style="font-size:16px;font-weight:700;color:#1e1b4b;">Kamar B1</h3>
                            <p style="font-size:12px;color:#9ca3af;">Tenang &amp; sejuk</p>
                        </div>
                        <p style="font-size:16px;font-weight:800;color:#6366f1;">Rp 400rb<span style="font-size:11px;font-weight:500;color:#9ca3af;">/bln</span></p>
                    </div>
                    <div style="display:flex;flex-wrap:wrap;gap:5px;margin:10px 0 14px;">
                        <span class="facility-tag">📶 WiFi</span>
                        <span class="facility-tag">🚿 KM Dalam</span>
                        <span class="facility-tag">🌀 Kipas</span>
                    </div>
                    <button class="btn-booking" style="background:#6074dd;color:white;">
                        Booking Sekarang
                    </button>
                </div>
            </div>

            {{-- Kamar B2 --}}
            <div class="kamar-card">
                <div style="position:relative;">
                    <img src="{{ asset('images/kamar5.jpg') }}" class="w-full h-44 object-cover">
                    <div style="position:absolute;top:10px;left:10px;">
                        <span class="badge" style="background:rgba(48, 184, 86, 0.85);color:white;">Tersedia</span>
                    </div>
                    <div style="position:absolute;bottom:0;left:0;right:0;height:60px;background:linear-gradient(to top, rgba(0,0,0,0.35), transparent);"></div>
                </div>
                <div style="padding:16px;">
                    <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:6px;">
                        <div>
                            <h3 style="font-size:16px;font-weight:700;color:#1e1b4b;">Kamar B2</h3>
                            <p style="font-size:12px;color:#9ca3af;">Luas &amp; nyaman</p>
                        </div>
                        <p style="font-size:16px;font-weight:800;color:#10b981;">Rp 450rb<span style="font-size:11px;font-weight:500;color:#9ca3af;">/bln</span></p>
                    </div>
                    <div style="display:flex;flex-wrap:wrap;gap:5px;margin:10px 0 14px;">
                        <span class="facility-tag" style="background:rgba(16,185,129,0.08);color:#059669;">📶 WiFi</span>
                        <span class="facility-tag" style="background:rgba(16,185,129,0.08);color:#059669;">🗄️ Lemari</span>
                        <span class="facility-tag" style="background:rgba(16,185,129,0.08);color:#059669;">🪑 Meja Belajar</span>
                    </div>
                    <button class="btn-booking" style="background:#6074dd;color:white;">
                        Booking Sekarang
                    </button>
                </div>
            </div>

            {{-- Kamar B3 --}}
            <div class="kamar-card">
                <div style="position:relative;">
                    <img src="{{ asset('images/kamar6.jpg') }}" class="w-full h-44 object-cover">
                    <div style="position:absolute;top:10px;left:10px;">
                        <span class="badge" style="background:rgba(245,158,11,0.85);color:white;">Baru</span>
                    </div>
                    <div style="position:absolute;bottom:0;left:0;right:0;height:60px;background:linear-gradient(to top, rgba(0,0,0,0.35), transparent);"></div>
                </div>
                <div style="padding:16px;">
                    <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:6px;">
                        <div>
                            <h3 style="font-size:16px;font-weight:700;color:#1e1b4b;">Kamar B3</h3>
                            <p style="font-size:12px;color:#9ca3af;">Eksklusif &amp; modern</p>
                        </div>
                        <p style="font-size:16px;font-weight:800;color:#f59e0b;">Rp 650rb<span style="font-size:11px;font-weight:500;color:#9ca3af;">/bln</span></p>
                    </div>
                    <div style="display:flex;flex-wrap:wrap;gap:5px;margin:10px 0 14px;">
                        <span class="facility-tag" style="background:rgba(245,158,11,0.08);color:#d97706;">📶 WiFi</span>
                        <span class="facility-tag" style="background:rgba(245,158,11,0.08);color:#d97706;">❄️ AC</span>
                        <span class="facility-tag" style="background:rgba(245,158,11,0.08);color:#d97706;">🛁 KM Pribadi</span>
                    </div>
                    <button class="btn-booking" style="background:#6074dd;color:white;">
                        Booking Sekarang
                    </button>
                </div>
            </div>

        </div>
    </div>

</div>

{{-- Footer --}}
<footer style="background:rgba(15,23,42,0.95);backdrop-filter:blur(20px);margin-top:60px;border-top:1px solid rgba(255,255,255,0.08);">
    <div class="max-w-6xl mx-auto px-6 py-10 grid md:grid-cols-3 gap-8">

        <div>
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:12px;">
                <div style="width:30px;height:30px;background:linear-gradient(135deg,#6366f1,#818cf8);border-radius:8px;display:flex;align-items:center;justify-content:center;">
                    <svg fill="none" stroke="white" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l9-9 9 9M5 10v9a1 1 0 001 1h4v-5h4v5h4a1 1 0 001-1v-9"/></svg>
                </div>
                <span style="color:white;font-weight:700;font-size:15px;">Indekos App</span>
            </div>
            <p style="color:#9ca3af;font-size:13px;line-height:1.8;">
                Platform modern untuk mencari, memilih, dan booking kos dengan lebih mudah dan terpercaya.
            </p>
        </div>

        <div>
            <h2 style="color:white;font-weight:600;font-size:14px;margin-bottom:14px;">Hubungi Kami</h2>
            <ul style="display:flex;flex-direction:column;gap:10px;">
                <li>
                    <a href="#" style="color:#9ca3af;font-size:13px;display:flex;align-items:center;gap:8px;text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#9ca3af'">
                        <i data-lucide="phone" style="width:15px;height:15px;"></i>
                        (+62) 858-9561-9022
                    </a>
                </li>
                <li>
                    <a href="#" style="color:#9ca3af;font-size:13px;display:flex;align-items:center;gap:8px;text-decoration:none;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#9ca3af'">
                        <i data-lucide="mail" style="width:15px;height:15px;"></i>
                        Email @indekosapp.com
                    </a>
                </li>
                <li>
                    <a href="#" style="color:#9ca3af;font-size:13px;display:flex;align-items:center;gap:8px;text-decoration:none;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#9ca3af'">
                        <i data-lucide="instagram" style="width:15px;height:15px;"></i>
                        Instagram IndekosApp
                    </a>
                </li>
                <li>
                    <a href="#" style="color:#9ca3af;font-size:13px;display:flex;align-items:center;gap:8px;text-decoration:none;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#9ca3af'">
                        <i data-lucide="facebook" style="width:15px;height:15px;"></i>
                        Facebook KosApp
                    </a>
                </li>
            </ul>
        </div>

        <div>
            <h2 style="color:white;font-weight:600;font-size:14px;margin-bottom:14px;">Lokasi Kami</h2>
            <p style="color:#9ca3af;font-size:12px;margin-bottom:10px;line-height:1.7;">
                📍 Jl. Margo Tani No.48, Sukorame, Kec. Kota, Kota Kediri, Jawa Timur 64114
            </p>
            <div style="border-radius:12px;overflow:hidden;border:1px solid rgba(255,255,255,0.1);">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d376.3683145595258!2d111.98838904569097!3d-7.807565691752693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7857fe0a451ee3%3A0x90d1f10c4556ad40!2sKos%20Sugeng%20Tipe%20A%20Mojoroto%20Kediri!5e1!3m2!1sid!2sid!4v1776929097145!5m2!1sid!2sid"
                    width="100%"
                    height="160"
                    style="border:0;display:block;"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

    </div>

    <div style="border-top:1px solid rgba(255,255,255,0.08);text-align:center;padding:14px;font-size:12px;color:#6b7280;">
        © 2026 Indekos App. All rights reserved.
    </div>
</footer>

<script>

var kamarTerbuka = false;
function toggleKamarLain() {
    var el = document.getElementById('kamarTambahan');
    var chevron = document.getElementById('btnChevron');
    var label = document.getElementById('btnLebihBanyakText');
    kamarTerbuka = !kamarTerbuka;
    if (kamarTerbuka) {
        el.style.maxHeight = el.scrollHeight + 'px';
        el.style.opacity = '1';
        chevron.style.transform = 'rotate(180deg)';
        label.textContent = 'Lebih sedikit';
    } else {
        el.style.maxHeight = '0';
        el.style.opacity = '0';
        chevron.style.transform = 'rotate(0deg)';
        label.textContent = 'Lebih banyak';
    }
}
lucide.createIcons();
</script>

</body>
</html>