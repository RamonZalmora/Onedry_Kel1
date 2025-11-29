# 🧺 OneDry – Laundry Management System

**OneDry** adalah sistem manajemen laundry berbasis web yang dikembangkan oleh **Kelompok 1**.  
Aplikasi ini dibangun menggunakan **Laravel 10**, **TailwindCSS**, dan **Blade Template** untuk memberikan pengalaman pengguna yang modern, cepat, dan responsif.

OneDry dirancang untuk membantu operasional laundry seperti:
- Pengelolaan data pelanggan  
- Pengaturan layanan & harga  
- Manajemen transaksi laundry  
- Upload foto cucian  
- Monitoring status cucian  
- Pembuatan laporan (khusus owner)  
- Manajemen akun (khusus owner)

Dengan adanya sistem otorisasi berbasis **role (admin & owner)**, setiap fitur hanya dapat diakses oleh pengguna yang memiliki izin sesuai fungsinya.

---

# 📦 **Fitur Unggulan**
- 👥 **Manajemen Pelanggan**
- ⚙️ **Pengaturan Layanan Laundry (Owner Only)**
- 💸 **Input Transaksi + Perhitungan Otomatis**
- 🖼️ Upload foto cucian
- 📦 Status cucian (baru, proses, selesai, diambil)
- 📊 Laporan harian & bulanan
- 🧑‍💼 Manajemen akun (Owner Only)
- 🔐 Autentikasi & Role-based Authorization
- 🎨 UI modern menggunakan TailwindCSS
- ⏱️ Realtime Server Time
- 🌤️ Widget Cuaca (API Open-Meteo)
- 📈 Grafik Penghasilan Mingguan

---

# 🚀 **Cara Install OneDry Setelah `git clone`**

Ikuti langkah berikut agar sistem dapat berjalan tanpa error.

---

## 1️⃣ **Clone Repository dari GitHub**
```bash
git clone https://github.com/RamonZalmora/Onedry_Kel1.git
cd Onedry_Kel1
2️⃣ Install Dependencies Laravel
bash
Copy code
composer install
3️⃣ Copy File Environment
bash
Copy code
cp .env.example .env
Lalu edit .env untuk koneksi database:

makefile
Copy code
DB_DATABASE=onedry
DB_USERNAME=root
DB_PASSWORD=
4️⃣ Generate Key
bash
Copy code
php artisan key:generate
5️⃣ Migrasi Database + Seeder (Wajib)
Seeder akan membuat akun Owner & Admin otomatis.

bash
Copy code
php artisan migrate --seed
6️⃣ Buat Storage Link
bash
Copy code
php artisan storage:link
7️⃣ Jalankan Server
bash
Copy code
php artisan serve
Akses aplikasi di browser:

👉 http://127.0.0.1:8000

➕ OPSIONAL
🔧 Migrasi ulang (reset database)
bash
Copy code
php artisan migrate:fresh --seed
🧪 Testing Laravel
bash
Copy code
php artisan test
🎨 Compile asset (Tailwind / JS)
bash
Copy code
npm install
npm run dev
🔐 Akun Login Sistem
👑 Owner
Email	Password
owner@gmail.com	12345678

👤 Admin / Karyawan
Email	Password
mimin@gmail.com	miminn1234

🛠️ Teknologi yang Digunakan
Laravel 10

PHP 8.1+

MySQL

Tailwind CSS

Blade Template

Chart.js

Laravel Breeze

Open-Meteo API

Composer

NPM / Vite

