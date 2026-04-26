A. IDENTIFIKASI PERMASALAHAN

1. Pendataan Kamar Tidak Terstruktur
Data kamar sering tidak terdokumentasi dengan baik
Informasi seperti harga, ukuran, dan status kamar sulit dipantau
Tidak ada visualisasi (foto kamar/lokasi)

2. Pengelolaan Penghuni Kurang Efisien
Data penghuni tidak terintegrasi dengan kamar
Sulit mengetahui siapa menempati kamar tertentu
Tidak ada riwayat penghuni yang jelas

3. Sistem Pembayaran Tidak Terkontrol
Pencatatan pembayaran masih manual
Sulit memantau:
penghuni yang belum bayar
penghuni yang menunggak
Tidak mendukung sistem cicilan

4. Kesulitan Monitoring Status Kamar
Tidak ada sistem otomatis:
kamar kosong
kamar terisi
Harus dicek secara manual

5. Informasi untuk Pengunjung Terbatas
Pengunjung tidak bisa melihat informasi kamar secara lengkap
Tidak ada tampilan:
foto kamar
ukuran kamar
harga secara jelas

6. Tampilan Sistem Kurang Fleksibel
Tidak responsive di berbagai perangkat
UI kurang user-friendly




B. KEBUTUHAN SISTEM

1. Kebutuhan Fungsional
Kebutuhan fungsional adalah fitur utama yang harus dimiliki sistem.
a. Manajemen Kamar
- Menambahkan data kamar
- Mengedit data kamar
- Menghapus data kamar
- Mengunggah foto kamar
- Mengunggah foto lokasi
- Menginput ukuran kamar:
    -> panjang
    -> lebar
    -> tinggi
- Menampilkan status kamar:
    -> kosong
    -> terisi

b. Manajemen Penghuni
- Menambahkan data penghuni
- Mengedit data penghuni
- Menghapus data penghuni
- Menghubungkan penghuni dengan kamar
- Menampilkan data:
    -> nama
    -> nomor HP
- Menampilkan status penghuni:
    -> aktif
    -> nonaktif

c. Sistem Pembayaran
- Membuat tagihan bulanan
- Menampilkan data pembayaran
- Mendukung pembayaran:
    -> penuh
    -> cicilan
- Menyimpan:
    -> jumlah tagihan
    -> jumlah yang sudah dibayar
    -> sisa tagihan
- Menampilkan status:
    -> belum
    -> cicil
    -> lunas

d. Dashboard Admin
- Menampilkan data:
    -> kamar
    -> penghuni
    -> pembayaran
- Navigasi melalui sidebar
- Akses penuh ke semua fitur

e. Dashboard Penghuni
- Melihat data pribadi
- Melihat kamar yang ditempati
- Melihat tagihan
- Melakukan pembayaran (input manual/dummy)

f. Halaman Pengunjung
- Menampilkan kamar yang tersedia
- Menampilkan:
    -> harga
    -> ukuran
    -> foto kamar
- Tampilan berbentuk card



2. Kebutuhan Non-Fungsional
Kebutuhan non-fungsional berkaitan dengan kualitas sistem.
a. Usability (Kemudahan Penggunaan)
- Sistem mudah digunakan oleh admin dan penghuni
- Tampilan sederhana dan intuitif

b. Responsiveness
- Sistem dapat diakses di:
    -> desktop
    -> tablet
    -> smartphone
- Tampilan tidak rusak di berbagai ukuran layar

c. Keamanan
- Sistem login untuk admin dan penghuni
- Pembatasan akses sesuai role
- Validasi input untuk mencegah error

d. Performa
- Sistem dapat memuat data dengan cepat
- Query database efisien

e. Maintainability
- Struktur kode mudah dipahami
- Mudah dikembangkan ke depan (misalnya menggunakan Laravel)

f . Scalability
- Sistem dapat dikembangkan:
    -> menjadi berbasis API
    -> integrasi pembayaran online
    -> multi indekos



C. KESIMPULAN

Dengan adanya sistem ini, diharapkan pengelolaan indekos menjadi lebih terstruktur, efisien, dan mudah diakses baik oleh admin maupun penghuni. Sistem juga dirancang agar dapat dikembangkan lebih lanjut menjadi aplikasi yang lebih modern dan scalable.