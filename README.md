# 🧺 OneDry – Sistem Manajemen Laundry

[![Versi Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel)](https://laravel.com/)
[![PHP Versi](https://img.shields.io/badge/PHP-8.1+-777BB4?style=for-the-badge&logo=php)](https://www.php.net/)
[![Dibangun dengan TailwindCSS](https://img.shields.io/badge/Styling-TailwindCSS-06B6D4?style=for-the-badge&logo=tailwindcss)](https://tailwindcss.com/)

**OneDry** adalah sistem manajemen laundry berbasis web yang dikembangkan oleh **Kelompok 1**. Aplikasi ini dirancang untuk mengoptimalkan operasional bisnis laundry, mulai dari pengelolaan data pelanggan hingga pembuatan laporan keuangan.

Dibangun menggunakan **Laravel 10**, **TailwindCSS**, dan **Blade Template**, OneDry menawarkan antarmuka pengguna yang modern, cepat, dan responsif.

---

### 🌟 Fitur Utama

OneDry dirancang untuk mendukung berbagai aspek operasional laundry:

* **👥 Manajemen Pelanggan:** Pengelolaan data pelanggan yang terperinci.
* **💸 Transaksi Otomatis:** Input transaksi yang mudah dengan perhitungan biaya otomatis.
* **📦 Monitoring Status Cucian:** Status real-time (**baru, proses, selesai, diambil**) untuk setiap order.
* **🖼️ Upload Foto Cucian:** Fitur untuk mendokumentasikan kondisi cucian sebelum proses.
* **📊 Laporan Komprehensif:** Pembuatan Laporan Harian & Bulanan (Khusus Owner).
* **⚙️ Pengaturan Bisnis:** Pengaturan Layanan Laundry dan Harga (Khusus Owner).
* **🔐 Sistem Otorisasi:** Akses fitur berbasis **Role-based Authorization** (**Owner & Admin/Karyawan**).

---

### 📦 Fitur Unggulan Lainnya

| Kategori | Fitur | Deskripsi |
| :--- | :--- | :--- |
| **Teknis & UI** | 🎨 **UI Modern** | Antarmuka yang bersih dan responsif berkat TailwindCSS. |
| | 📈 **Grafik Pendapatan** | Visualisasi pendapatan mingguan menggunakan Chart.js. |
| | ⏱️ **Realtime Data** | Tampilan waktu server dan status yang diperbarui secara *realtime*. |
| | 🌤️ **Weather Widget** | Widget cuaca lokal untuk membantu operasional laundry (menggunakan Open-Meteo API). |
| **Manajemen Akun** | 🧑‍💼 **Manajemen Akun** | Pengaturan dan pengelolaan akun pengguna (Khusus Owner). |

---

### 🛠️ Teknologi yang Digunakan

| Kategori | Teknologi | Versi / Keterangan |
| :--- | :--- | :--- |
| **Backend** | Laravel | 10.x |
| | PHP | 8.1+ |
| | Database | MySQL |
| **Frontend** | Styling | TailwindCSS |
| | Template Engine | Blade Template |
| | Grafik | Chart.js |
| **Pendukung** | Scaffolding | Laravel Breeze |
| | Paket & Dependensi | Composer, Vite + NPM |
| | Integrasi | Open-Meteo API |

---

### 🚀 Panduan Instalasi Cepat

Ikuti langkah-langkah di bawah ini untuk menyiapkan sistem OneDry setelah mengkloning repositori.

#### 1️⃣ Kloning Repositori & Navigasi
```bash
git clone [https://github.com/RamonZalmora/Onedry_Kel1.git](https://github.com/RamonZalmora/Onedry_Kel1.git)
cd Onedry_Kel1
2️⃣ Instalasi DependensiInstal dependensi PHP yang dibutuhkan menggunakan Composer:Bashcomposer install
3️⃣ Konfigurasi Lingkungan (.env)Salin file konfigurasi lingkungan dan sesuaikan detail database Anda:Bashcp .env.example .env
Catatan: Sesuaikan bagian database di file .env. Contoh:Ini, TOMLDB_DATABASE=onedry
DB_USERNAME=root
DB_PASSWORD=
4️⃣ Generate App KeyHasilkan application key untuk keamanan:Bashphp artisan key:generate
5️⃣ Migrasi Database & Seeder (Wajib)Jalankan migrasi database dan seeder untuk mengisi data awal (termasuk akun login):Bashphp artisan migrate --seed
6️⃣ Buat Storage LinkBuat symlink untuk akses file yang diunggah (misalnya, foto cucian):Bashphp artisan storage:link
7️⃣ Jalankan ServerSistem siap dijalankan!Bashphp artisan serve
🧪 Perintah OpsionalPerintahFungsiphp artisan migrate:fresh --seedReset ulang database dan jalankan seeder lagi.php artisan testMenjalankan pengujian (testing) aplikasi.npm install kemudian npm run devMenginstal dan mengkompilasi aset frontend (CSS/JS).🔐 Akun Login DefaultAnda dapat menggunakan akun default berikut untuk mengakses sistem:RoleEmailPassword👑 Ownerowner@gmail.com12345678👤 Admin / Karyawanmimin@gmail.commiminn1234📬 Kontak DeveloperTertarik untuk berdiskusi atau memberikan masukan?📧 Email: ramon.zalmora@gmail.com🐙 GitHub: https://github.com/RamonZalmora