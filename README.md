#### Holahalo-Catalog

### Instalasi

- Clone repositori.
- Masuk ke direktori aplikasi dan perbarui package dengan perintah: ```composer update -vvv```.
- Salin berkas ```.env.example``` menjadi ```.env``` dan ubah pengaturan pangkalan data sesuai dengan environment lokal.
- Generate key baru dengan perintah: ```php artisan key:generate```.
- Jalankan migrasi dengan perintah: ```php artisan migrate```.
- Jalankan database seeder untuk mengisi data admin dengan perintah ```php artisan db:seed```
- Jalankan built-in web server dengan perintah: ```php artisan serve```.

Terakhir, akses aplikasi melalui peramban dengan tautan: ```http://localhost:8000/file/index```.

### How to use

## Login
- Setelah mengakses aplikasi akan muncul halaman utama
- Untuk mulai mengelola catalog, login sebagai admin
- Klik pada tombol login di kanan atas
- Setelah itu akan muncul halaman login
- Buka database catalog, lihat pada tabel admin
- Masukkan email admin dengan password berupa text='password'
- setelah itu anda akan kembali ke halaman utama

## Kelola Data Katalog
- Pada halaman utama akan terlihat perbedaan pada menu bar
- Pilih menu "Kelola Katalog"

# Kelola Kategori
- Pilih sub menu kategori
- Setelah itu akan muncul halaman daftar kategori

- Untuk menambahkan kategori klik pada tombol tambah kategori di kiri atas daftar kategori
- Setelah itu akan muncul pop up form kategori
- Isi kategori dan klik tombol simpan data

- Untuk mengubah kategori klik tombol ubah pada kategori yang diinginkan
- Setelah itu akan muncul pop up form ubah kategori
- Ubah data kategori dan klik tombol simpan data

- Untuk menghapus kategori klik tombol hapus pada kategori yang diinginkan

# Kelola Produk
- Pilih sub menu produk
- Setelah itu akan muncul halaman daftar produk

- Untuk menambahkan produk klik pada tombol tambah produk di kiri atas daftar produk
- Setelah itu akan muncul halaman form produk
- Upload foto, isi nama produk, deskripsi dan kategori dari produk
- Setelah pengisian selesai klik tombol simpan data

- Untuk mengubah produk klik tombol ubah pada produk yang diinginkan
- Setelah itu akan muncul halaman form produk
- Ubah data sesuai yang diinginkan
- Setelah selesai mengubah klik tombol simpan data

- Untuk menghapus produk klik tombol hapus pada produk yang diinginkan

## Melihat Produk
- Untuk melihat produk klik menu "Lihat Semua Produk"
- Setelah itu akan muncul semua produk yang telah didaftarkan

- Untuk melihat produk berdasarkan kategori klik pada pilihan kategori di menu samping kiri
- Untuk melihat detail produk klik pada tombol detail di gambar produk
- Untuk melihat produk terbaru (5 produk yang baru diinput) klik pada menu "Home"
