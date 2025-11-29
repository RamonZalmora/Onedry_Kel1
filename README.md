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
# 🚀 **Cara Install OneDry Setelah `git clone`**
Ikuti langkah berikut agar sistem dapat berjalan tanpa error.
## 1️⃣ **Clone Repository dari GitHub**
```bash
git clone https://github.com/RamonZalmora/Onedry_Kel1.git
Setelah itu jalan kan terlebih dahulu ini di terminal :
>
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve

>>>>>>>> OPSIONAL  <<<<<<<< :
 php artisan migrate
 php artisan storage:link
 php artisan test (untuk testing)
 npm run dev


🔐 Akun Login Sistem
👑 Owner
Email: owner@gmail.com
Password: 12345678

👤 Admin/Karyawan
Email: mimin@gmail.com
Password: miminn1234
Akses:
