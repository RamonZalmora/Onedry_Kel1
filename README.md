🧺 OneDry – Laundry Management System

OneDry adalah sistem manajemen laundry berbasis web yang dikembangkan oleh Kelompok 1.
Aplikasi ini dirancang untuk membantu pengelolaan operasional laundry menjadi lebih cepat, efisien, dan rapi melalui sistem digital yang modern, aman, dan mudah digunakan.

🖥️ ✨ Teknologi yang Digunakan

OneDry dibangun menggunakan teknologi modern yang umum digunakan pada industri:

Komponen	Teknologi
Backend	Laravel 10
Frontend	Blade Template + TailwindCSS
Database	MySQL
Authentication	Laravel Breeze
UI Styling	TailwindCSS 3
Storage	Laravel Storage (Public Disk)
Authorization	Role-based (Owner & Admin)
Chart	Chart.js
Testing	Laravel PHPUnit
Package Manager	Composer & NPM
⚙️ Fitur Utama OneDry

Berikut fitur yang tersedia dalam sistem:

👤 Autentikasi & Role

Login secure (Laravel Breeze)

Role-based access: Owner dan Admin

Profil + upload foto profil

👥 Manajemen Pelanggan

Tambah, edit, hapus pelanggan

Daftar pelanggan lengkap

Validasi input

⚙️ Manajemen Layanan Laundry

Owner dapat menambah layanan baru

Edit harga layanan

Mendukung 2 tipe layanan:

Per Kg

Per Item (dengan sub-item)

💸 Transaksi Laundry

Input transaksi baru

Upload foto cucian

Perkiraan total otomatis

Status cucian (baru → proses → selesai → diambil)

Riwayat transaksi per pelanggan

🧾 Laporan (Owner & Admin)

Laporan harian

Laporan bulanan

Export PDF

Export Excel

🧑‍💼 Manajemen Akun (Owner)

Owner dapat membuat akun admin baru

Owner dapat menghapus atau mengedit data akun admin

📸 Upload Foto

Laundry photos

Profil user

Semua file disimpan aman via storage/app/public

📊 Dashboard Modern

Grafik pendapatan 7 hari terakhir

Statistik real-time

Widget cuaca

Server time display

🚀 Cara Install OneDry Setelah git clone

Ikuti langkah berikut agar aplikasi berjalan normal tanpa error.

1️⃣ Clone Repository
git clone https://github.com/RamonZalmora/Onedry_Kel1.git

2️⃣ Install Dependency Backend
composer install

3️⃣ Copy File Environment
cp .env.example .env

4️⃣ Generate App Key
php artisan key:generate

5️⃣ Setup Database

Pastikan kamu sudah membuat database baru di phpMyAdmin.

Edit file .env → sesuaikan:

DB_DATABASE=onedry
DB_USERNAME=root
DB_PASSWORD=


Lalu jalankan:

php artisan migrate --seed


Seeder akan otomatis membuat:

akun admin

akun owner

sample data awal jika ada

6️⃣ Link Storage (WAJIB untuk foto tampil)
php artisan storage:link

7️⃣ Jalankan Server Laravel
php artisan serve


Akses di:
http://127.0.0.1:8000

8️⃣ (Opsional) Jalankan Frontend Compiler
npm install
npm run dev

9️⃣ (Opsional) Jalankan Testing
php artisan test

🔐 Akun Login Sistem
👑 Owner

Email: owner@gmail.com

Password: 12345678

👤 Admin / Karyawan

Email: mimin@gmail.com

Password: miminn1234