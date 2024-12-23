# UASPemweb
Bayu Prameswara Haris 
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
