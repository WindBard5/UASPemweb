# UASPemweb
- Bayu Prameswara Haris 
- 122140219
- Pemrograman Web RA

## Deskripsi Proyek
Repositori ini merupakan implementasi dari tugas akhir mata kuliah Pemrograman Web. Aplikasi ini mencakup fitur-fitur client-side dan server-side programming, pengelolaan database, serta state management menggunakan session dan cookies.

### Struktur Folder
- `cookie_management.php`: Mengelola pembuatan, penghapusan, dan pengambilan data cookie.
- `delete_mahasiswa.php`: Menghapus data mahasiswa berdasarkan ID yang dipilih.
- `dom.php`: Memuat manipulasi DOM menggunakan JavaScript, termasuk validasi form input.
- `edit_mahasiswa.php`: Menampilkan dan mengelola form untuk mengedit data mahasiswa.
- `form_handler.php`: Memproses data form yang dikirim menggunakan metode POST atau GET.
- `handling.php`: Mengelola berbagai event JavaScript untuk validasi dan interaksi form.
- `koneksi.php`: Menyediakan konfigurasi koneksi ke database menggunakan MySQLi.
- `manipulasi.php`: Menampilkan manipulasi data tabel dari database ke dalam tampilan HTML.
- `mhs_controller.php`: Berisi class PHP berbasis OOP untuk operasi CRUD pada tabel `tblMahasiswa`.
- `session_management.php`: Mengelola state menggunakan session untuk menyimpan informasi pengguna.
- `table.sql`: Berisi perintah SQL untuk membuat tabel database `tblMahasiswa`.

## Penjelasan File

### cookie_management.php
File ini mengelola cookie pada aplikasi, termasuk:
- Membuat cookie dengan nilai tertentu.
- Mengambil nilai dari cookie yang ada.
- Menghapus cookie.

### delete_mahasiswa.php
Script ini digunakan untuk menghapus data mahasiswa dari database. File ini:
- Menerima ID mahasiswa melalui parameter URL.
- Menghapus data dari tabel `tblMahasiswa` berdasarkan ID tersebut.

### dom.php
File ini mengimplementasikan manipulasi DOM menggunakan JavaScript untuk:
- Membuat form input dengan minimal 4 elemen (contoh: teks, checkbox, radio).
- Menampilkan pesan validasi pada setiap inputan sebelum data dikirim.

### edit_mahasiswa.php
File ini menyediakan:
- Form untuk mengedit data mahasiswa.
- Memproses data yang diperbarui dan menyimpannya ke database.

### form_handler.php
Berisi logika untuk memproses data yang dikirim melalui form:
- Mendukung metode POST dan GET.
- Melakukan validasi input di sisi server sebelum menyimpan data.

### handling.php
File ini bertanggung jawab atas pengelolaan event JavaScript, termasuk:
- Menangani minimal 3 event pada elemen form.
- Melakukan validasi setiap input dengan pesan kesalahan dinamis.

### koneksi.php
File konfigurasi database, berisi:
- Koneksi ke database MySQL menggunakan MySQLi.
- Informasi host, username, password, dan nama database.

### manipulasi.php
Berisi script PHP untuk menampilkan data dari database dalam format tabel HTML. Data diambil menggunakan query SQL dan dirender di halaman.

### mhs_controller.php
File ini menggunakan pendekatan OOP untuk operasi database:
- Method `getMahasiswa()`: Mengambil semua data mahasiswa dari tabel `tblMahasiswa`.
- Method tambahan dapat ditambahkan untuk operasi CRUD lainnya.

### session_management.php
Mengelola sesi pengguna dalam aplikasi, termasuk:
- Menyimpan data pengguna saat login.
- Menghitung jumlah kunjungan pengguna ke halaman tertentu.

### table.sql
Berisi perintah SQL untuk membuat tabel `tblMahasiswa`, dengan struktur:
- `mahasiswa_id`: Primary key dengan auto increment.
- `mahasiswa_nim`: NIM mahasiswa (unique).
- `mahasiswa_nama`: Nama mahasiswa.
- `mahasiswa_prodi`: Program studi mahasiswa.

## Cara Menggunakan
1. **Persiapan Database**:
   - Import file `table.sql` ke dalam database MySQL.
   - Konfigurasikan file `koneksi.php` sesuai dengan pengaturan database lokal.

2. **Menjalankan Aplikasi**:
   - Pastikan server lokal (XAMPP/WAMP) sudah aktif.
   - Letakkan semua file di folder `htdocs`.
   - Akses aplikasi melalui browser.

UPDATE
Hal ini dilakukan karena untuk menghosting aplikasi web yang saya buat melalui internet dengan mengupdate kodingan saya berupa :
### koneksi.php
Mengubah getConnection berupa :
- $host = 'autorack.proxy.rlwy.net';
- $user = 'root';
- $password = 'BpRknejwWZfUtMIMGuMlKeRaLobiFlxw';
- $dbname = 'railway';
- $port = 48445;

### index.php
Entry point atau titik masuk utama untuk aplikasi berbasis PHP. 
Cukup dengan menghubungkan langsung ke form_handler.php

Untuk menghosting index.php melalui railway, ada beberapa cara :
## 1. Persiapan Aplikasi
Pastikan aplikasi Anda sudah lengkap dan siap untuk di-deploy:
- **PHP**:
  - Pastikan file `index.php` berada di direktori utama.
  - Siapkan file `composer.json` jika menggunakan dependency dari Composer.

## 2. Login ke Railway
1. Buka [Railway](https://railway.app).
2. Login menggunakan akun GitHub, GitLab, atau email Anda.

## 3. Membuat Proyek Baru
1. Klik **"New Project"** di dashboard Railway.
2. Pilih salah satu opsi:
   - **Deploy dari GitHub**: Hubungkan Railway dengan repositori GitHub Anda.
   - **Deploy Manual**: Gunakan Railway CLI untuk mengunggah dari lokal.
   - **Starter Templates**: Pilih template yang sesuai untuk aplikasi Anda.

## 4. Hubungkan dengan GitHub
1. Pilih opsi **"Deploy from GitHub Repo"**.
2. Pilih repositori aplikasi Anda dari daftar.
3. Railway akan mendeteksi file penting seperti `index.php`, `package.json`, atau `Dockerfile` secara otomatis.

## 5. Konfigurasi Proyek
Railway secara otomatis akan mencoba mengonfigurasi proyek Anda. Jika diperlukan, tambahkan konfigurasi berikut:
### PHP
Buat file `Procfile`:
```
web: php -S 0.0.0.0:80 -t .
```

## 6. Tambahkan Variabel Lingkungan
Jika aplikasi Anda membutuhkan variabel lingkungan (environment variables):
1. Buka menu **Settings > Variables** di dashboard Railway.
2. Tambahkan kunci dan nilai yang dibutuhkan, seperti:
```
DATABASE_URL=mysql://user:password@hostname:port/dbname
```

## 7. Deploy Aplikasi
1. Railway akan mulai membangun dan menjalankan aplikasi Anda.
2. Tunggu proses build selesai.
3. Anda akan mendapatkan URL otomatis seperti:
   ```
   https://your-app-name.up.railway.app
   ```
4. Akses URL ini untuk melihat aplikasi Anda.

## 8. Tes dan Debugging
- Pastikan aplikasi berjalan dengan baik di URL yang diberikan.
- Jika ada error:
  1. Periksa log aplikasi di menu **Deployments > Logs**.
  2. Perbaiki masalah di kode Anda dan deploy ulang.
