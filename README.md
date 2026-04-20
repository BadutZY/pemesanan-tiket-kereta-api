# Panduan Instalasi Lengkap

---

## PERSYARATAN SISTEM
- XAMPP
- Composer

---

## IMPORT DATABASE KE PHPMYADMIN

1. Buka **XAMPP Control Panel**, klik **Start** pada Apache dan MySQL
2. Buka browser, akses **http://localhost/phpmyadmin**
3. Klik tombol **"New"** di sidebar kiri untuk membuat database baru
4. Isi nama database: `db_tiket_kereta`
5. Pilih **utf8mb4_unicode_ci** sebagai collation
6. Klik **"Create"**
7. Setelah database dibuat, klik tab **"SQL"** di bagian atas
8. Paste semua isi code yang ada pada file `database/db_tiket_kereta.sql`
9. Klik **"Kirim"** di bagian bawah
10. Cari file **".env.example"** lalu hapus bagian **".example"**
11. Pada file **".env"** tersebut hapus bagian yang ada tagnya **"#"**

---

## MENJALANKAN WEBSITE

1. Buka folder code pada Visual Studio Code
2. Buka terminal pada Visual Studio Code
3. Install semua package PHP:
   ```bash
   composer install
   ```
   Tunggu hingga selesai (butuh koneksi internet)
4. Generate key untuk menjalankan website
   ```bash
   php artisan key:generate
   ```
5. Menghubungkan storage agar foto profile dapat terlihat di website
   ```bash
   php artisan storage:link
   ```
6. Jalankan website
   ```bash
   php artisan serve
   ```

   Buka browser: **http://127.0.0.1:8000/**

---

Dibuat untuk tugas praktik Laravel - Sistem Pemesanan Tiket Kereta Api