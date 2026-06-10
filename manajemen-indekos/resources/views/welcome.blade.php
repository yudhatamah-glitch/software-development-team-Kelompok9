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
                <button class="btn-booking" style="background:linear-gradient(135deg,#6366f1,#818cf8);color:white;">
                    Booking Sekarang
                </button>
            </div>
        </div>

        {{-- Kamar 2 --}}
        <div class="kamar-card">
            <div style="position:relative;">
                <img src="{{ asset('images/kamar2.jpg') }}" class="w-full h-44 object-cover">
                <div style="position:absolute;top:10px;left:10px;">
                    <span class="badge" style="background:rgba(16,185,129,0.85);color:white;">Tersedia</span>
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
                <button class="btn-booking" style="background:linear-gradient(135deg,#10b981,#34d399);color:white;">
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
                <button class="btn-booking" style="background:linear-gradient(135deg,#f59e0b,#fbbf24);color:white;">
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
                    <img src="{{ asset('images/kamar1.jpg') }}" class="w-full h-44 object-cover">
                    <div style="position:absolute;top:10px;left:10px;">
                        <span class="badge" style="background:rgba(99,102,241,0.85);color:white;">Tersedia</span>
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
                    <button class="btn-booking" style="background:linear-gradient(135deg,#6366f1,#818cf8);color:white;">
                        Booking Sekarang
                    </button>
                </div>
            </div>

            {{-- Kamar B2 --}}
            <div class="kamar-card">
                <div style="position:relative;">
                    <img src="{{ asset('images/kamar2.jpg') }}" class="w-full h-44 object-cover">
                    <div style="position:absolute;top:10px;left:10px;">
                        <span class="badge" style="background:rgba(16,185,129,0.85);color:white;">Tersedia</span>
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
                    <button class="btn-booking" style="background:linear-gradient(135deg,#10b981,#34d399);color:white;">
                        Booking Sekarang
                    </button>
                </div>
            </div>

            {{-- Kamar B3 --}}
            <div class="kamar-card">
                <div style="position:relative;">
                    <img src="{{ asset('images/kamar3.jpg') }}" class="w-full h-44 object-cover">
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
                    <button class="btn-booking" style="background:linear-gradient(135deg,#f59e0b,#fbbf24);color:white;">
                        Booking Sekarang
                    </button>
                </div>
            </div>

        </div>
    </div>

</div>

{{-- ===== SECTION: Fasilitas Umum ===== --}}
<div class="max-w-6xl mx-auto px-5 mt-20 mb-6">
    <div style="text-align:center;margin-bottom:28px;">
        <span style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;color:#6366f1;">Yang Kami Sediakan</span>
        <h2 style="font-size:26px;font-weight:800;color:#1e1b4b;margin-top:8px;">Fasilitas Umum Kos</h2>
        <p style="font-size:14px;color:#9ca3af;margin-top:6px;">Semua yang kamu butuhkan sudah tersedia</p>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(140px,1fr));gap:14px;">

        <div class="glass" style="border-radius:18px;padding:20px 14px;text-align:center;transition:transform 0.2s;" onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='translateY(0)'">
            <div style="font-size:28px;margin-bottom:8px;">📶</div>
            <p style="font-size:13px;font-weight:700;color:#1e1b4b;">WiFi Kencang</p>
            <p style="font-size:11px;color:#9ca3af;margin-top:3px;">24 jam nonstop</p>
        </div>

        <div class="glass" style="border-radius:18px;padding:20px 14px;text-align:center;transition:transform 0.2s;" onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='translateY(0)'">
            <div style="font-size:28px;margin-bottom:8px;">🅿️</div>
            <p style="font-size:13px;font-weight:700;color:#1e1b4b;">Parkir Gratis</p>
            <p style="font-size:11px;color:#9ca3af;margin-top:3px;">Motor & mobil</p>
        </div>

        <div class="glass" style="border-radius:18px;padding:20px 14px;text-align:center;transition:transform 0.2s;" onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='translateY(0)'">
            <div style="font-size:28px;margin-bottom:8px;">🍳</div>
            <p style="font-size:13px;font-weight:700;color:#1e1b4b;">Dapur Bersama</p>
            <p style="font-size:11px;color:#9ca3af;margin-top:3px;">Kompor & peralatan</p>
        </div>

        <div class="glass" style="border-radius:18px;padding:20px 14px;text-align:center;transition:transform 0.2s;" onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='translateY(0)'">
            <div style="font-size:28px;margin-bottom:8px;">🔒</div>
            <p style="font-size:13px;font-weight:700;color:#1e1b4b;">Keamanan 24 Jam</p>
            <p style="font-size:11px;color:#9ca3af;margin-top:3px;">CCTV & kunci kamar</p>
        </div>

        <div class="glass" style="border-radius:18px;padding:20px 14px;text-align:center;transition:transform 0.2s;" onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='translateY(0)'">
            <div style="font-size:28px;margin-bottom:8px;">👕</div>
            <p style="font-size:13px;font-weight:700;color:#1e1b4b;">Area Jemur</p>
            <p style="font-size:11px;color:#9ca3af;margin-top:3px;">Luas & bersih</p>
        </div>

        <div class="glass" style="border-radius:18px;padding:20px 14px;text-align:center;transition:transform 0.2s;" onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='translateY(0)'">
            <div style="font-size:28px;margin-bottom:8px;">🌿</div>
            <p style="font-size:13px;font-weight:700;color:#1e1b4b;">Lingkungan Asri</p>
            <p style="font-size:11px;color:#9ca3af;margin-top:3px;">Tenang & nyaman</p>
        </div>

    </div>
</div>

{{-- ===== BANNER WhatsApp CTA ===== --}}
<div class="max-w-6xl mx-auto px-5 mt-16 mb-6">
    <div style="background:linear-gradient(135deg,#6366f1 0%,#8b5cf6 60%,#a855f7 100%);border-radius:24px;padding:36px 40px;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:20px;position:relative;overflow:hidden;">
        {{-- Dekor lingkaran --}}
        <div style="position:absolute;width:200px;height:200px;border-radius:50%;background:rgba(255,255,255,0.07);top:-60px;right:120px;pointer-events:none;"></div>
        <div style="position:absolute;width:140px;height:140px;border-radius:50%;background:rgba(255,255,255,0.06);bottom:-50px;right:30px;pointer-events:none;"></div>

        <div style="position:relative;">
            <p style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;color:rgba(255,255,255,0.65);margin-bottom:6px;">Ada pertanyaan?</p>
            <h3 style="font-size:22px;font-weight:800;color:white;line-height:1.3;margin-bottom:6px;">Hubungi Kami<br>Langsung via WhatsApp</h3>
            <p style="font-size:13px;color:rgba(255,255,255,0.7);">Respon cepat, ramah, dan siap membantu kapan saja</p>
        </div>
        <a href="https://wa.me/6285895619022"
           target="_blank"
           style="display:inline-flex;align-items:center;gap:10px;background:white;color:#6366f1;padding:13px 24px;border-radius:14px;font-size:14px;font-weight:800;text-decoration:none;box-shadow:0 4px 20px rgba(0,0,0,0.15);transition:transform 0.2s,opacity 0.2s;flex-shrink:0;position:relative;"
           onmouseover="this.style.transform='scale(1.03)'" onmouseout="this.style.transform='scale(1)'">
            <svg viewBox="0 0 24 24" fill="#25D366" width="20" height="20">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
            Chat Sekarang
        </a>
    </div>
</div>

{{-- ===== FAQ ===== --}}
<div class="max-w-6xl mx-auto px-5 mt-16 mb-6">
    <div style="text-align:center;margin-bottom:28px;">
        <span style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;color:#6366f1;">FAQ</span>
        <h2 style="font-size:26px;font-weight:800;color:#1e1b4b;margin-top:8px;">Pertanyaan Umum</h2>
        <p style="font-size:14px;color:#9ca3af;margin-top:6px;">Jawaban untuk pertanyaan yang sering ditanyakan</p>
    </div>

    <div style="display:flex;flex-direction:column;gap:10px;max-width:720px;margin:0 auto;">

        <div class="faq-item glass" style="border-radius:16px;overflow:hidden;">
            <button onclick="toggleFaq(this)" style="width:100%;display:flex;justify-content:space-between;align-items:center;padding:16px 20px;background:none;border:none;cursor:pointer;font-family:inherit;text-align:left;gap:12px;">
                <span style="font-size:14px;font-weight:700;color:#1e1b4b;">Berapa harga sewa kamar per bulan?</span>
                <svg class="faq-chevron" fill="none" stroke="#6366f1" viewBox="0 0 24 24" width="18" height="18" style="flex-shrink:0;transition:transform 0.3s;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div class="faq-body" style="max-height:0;overflow:hidden;transition:max-height 0.35s ease,padding 0.3s;">
                <p style="padding:0 20px 16px;font-size:13px;color:#6b7280;line-height:1.8;">Harga sewa mulai dari Rp 350.000 hingga Rp 750.000 per bulan tergantung tipe kamar. Kamar Standard mulai Rp 350.000, Kamar VIP mulai Rp 500.000, dan Kamar AC Premium Rp 750.000.</p>
            </div>
        </div>

        <div class="faq-item glass" style="border-radius:16px;overflow:hidden;">
            <button onclick="toggleFaq(this)" style="width:100%;display:flex;justify-content:space-between;align-items:center;padding:16px 20px;background:none;border:none;cursor:pointer;font-family:inherit;text-align:left;gap:12px;">
                <span style="font-size:14px;font-weight:700;color:#1e1b4b;">Apakah ada minimal kontrak sewa?</span>
                <svg class="faq-chevron" fill="none" stroke="#6366f1" viewBox="0 0 24 24" width="18" height="18" style="flex-shrink:0;transition:transform 0.3s;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div class="faq-body" style="max-height:0;overflow:hidden;transition:max-height 0.35s ease,padding 0.3s;">
                <p style="padding:0 20px 16px;font-size:13px;color:#6b7280;line-height:1.8;">Minimal kontrak sewa adalah 1 bulan. Tersedia juga paket 3 bulan, 6 bulan, dan 1 tahun dengan harga lebih terjangkau.</p>
            </div>
        </div>

        <div class="faq-item glass" style="border-radius:16px;overflow:hidden;">
            <button onclick="toggleFaq(this)" style="width:100%;display:flex;justify-content:space-between;align-items:center;padding:16px 20px;background:none;border:none;cursor:pointer;font-family:inherit;text-align:left;gap:12px;">
                <span style="font-size:14px;font-weight:700;color:#1e1b4b;">Bagaimana cara booking kamar?</span>
                <svg class="faq-chevron" fill="none" stroke="#6366f1" viewBox="0 0 24 24" width="18" height="18" style="flex-shrink:0;transition:transform 0.3s;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div class="faq-body" style="max-height:0;overflow:hidden;transition:max-height 0.35s ease,padding 0.3s;">
                <p style="padding:0 20px 16px;font-size:13px;color:#6b7280;line-height:1.8;">Klik tombol "Booking Sekarang" pada kamar yang diinginkan, atau hubungi kami langsung via WhatsApp. Tim kami akan memandu proses pendaftaran dan pembayaran.</p>
            </div>
        </div>

        <div class="faq-item glass" style="border-radius:16px;overflow:hidden;">
            <button onclick="toggleFaq(this)" style="width:100%;display:flex;justify-content:space-between;align-items:center;padding:16px 20px;background:none;border:none;cursor:pointer;font-family:inherit;text-align:left;gap:12px;">
                <span style="font-size:14px;font-weight:700;color:#1e1b4b;">Apakah boleh bawa tamu?</span>
                <svg class="faq-chevron" fill="none" stroke="#6366f1" viewBox="0 0 24 24" width="18" height="18" style="flex-shrink:0;transition:transform 0.3s;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div class="faq-body" style="max-height:0;overflow:hidden;transition:max-height 0.35s ease,padding 0.3s;">
                <p style="padding:0 20px 16px;font-size:13px;color:#6b7280;line-height:1.8;">Tamu diperbolehkan berkunjung hingga pukul 21.00 WIB. Tamu wajib melapor ke pengelola saat masuk demi keamanan dan kenyamanan bersama.</p>
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
// FAQ accordion
function toggleFaq(btn) {
    var body    = btn.nextElementSibling;
    var chevron = btn.querySelector('.faq-chevron');
    var isOpen  = body.style.maxHeight && body.style.maxHeight !== '0px';

    // Tutup semua dulu
    document.querySelectorAll('.faq-body').forEach(function(b) {
        b.style.maxHeight = '0';
    });
    document.querySelectorAll('.faq-chevron').forEach(function(c) {
        c.style.transform = 'rotate(0deg)';
    });

    // Buka yang diklik kalau belum terbuka
    if (!isOpen) {
        body.style.maxHeight = body.scrollHeight + 'px';
        chevron.style.transform = 'rotate(180deg)';
    }
}

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