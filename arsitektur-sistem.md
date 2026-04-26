Sistem aplikasi indekos ini menggunakan arsitektur berbasis client-server dengan pendekatan web-based application.

A. KOMPONEN SISTEM
1. Client (Frontend)
Digunakan oleh:
- Pengunjung (melihat kamar)
- Admin (mengelola data)
- Penghuni (melihat dan membayar tagihan)
  Diakses melalui browser (Chrome, Edge, dll).

2. Server (Backend)
Bertugas:
- Memproses logika aplikasi
- Mengelola data kamar, penghuni, dan pembayaran
- Menyediakan data ke tampilan

3. Database (MySQL)
Menyimpan data:
- Kamar
- Penghuni
- Pembayaran


B. POLA ARSITEKTUR
Saat ini:
- Menggunakan Monolithic Architecture (PHP Native)
- Frontend dan backend masih dalam satu file

Rencana pengembangan:
Menggunakan MVC (Model-View-Controller) dengan Laravel
- Model → database
- View → tampilan
- Controller → logic


C. ALUR DATA
User → Browser → Server (PHP/Laravel) → Database → Server → Browser