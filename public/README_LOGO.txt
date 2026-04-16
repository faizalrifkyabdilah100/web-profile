====================================================
  PANDUAN MEMASANG LOGO SEKOLAH
  SMP Negeri 2 Margoyoso
====================================================

Untuk menampilkan logo sekolah di halaman web, ikuti langkah berikut:

1. SIMPAN FILE LOGO
   - Tempatkan file logo di folder ini: /public/
   - Beri nama file: logo-sekolah.png
   - Path lengkap: c:\xampp\htdocs\web-profile\public\logo-sekolah.png

2. FORMAT YANG DISARANKAN
   - Format  : PNG (disarankan, mendukung transparansi)
   - Alternatif: JPG, SVG, WEBP
   - Ukuran  : 512x512 piksel atau lebih besar (persegi)
   - Ukuran file: Maksimal 500KB

3. LOKASI TAMPIL DI WEBSITE
   Logo akan otomatis tampil di:
   - Halaman Tentang (about) → Bagian "Logo Sekolah" berbentuk bulat
   Jika logo belum ada / file tidak ditemukan, akan tampil placeholder otomatis.

4. JIKA FORMAT BUKAN PNG
   Buka file: app/Views/pages/about.php
   Cari baris:  src="/logo-sekolah.png"
   Ubah menjadi: src="/logo-sekolah.jpg" (atau format lain yang kamu gunakan)

====================================================
