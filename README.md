<div align="center">

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

</div>

---

## 📋 Daftar Isi

- [✨ Fitur Utama](#-fitur-utama)
- [🚀 Instalasi](#-instalasi)
- [⚙️ Konfigurasi](#️-konfigurasi)
- [🔐 Akun Login](#-akun-login-sistem)
- [➕ Fitur Opsional](#-fitur-opsional)
- [🛠️ Teknologi](#️-teknologi-yang-digunakan)
- [📸 Screenshot](#-screenshot)
- [🤝 Kontribusi](#-kontribusi)

---

## ✨ Fitur Utama

<table>
<tr>
<td width="50%">

### 👥 Manajemen Pengguna
- Multi-level user (Owner & Admin)
- Authentication & Authorization
- Role-based access control

### 💼 Manajemen Transaksi
- Pencatatan order laundry
- Tracking status pengerjaan
- Riwayat transaksi lengkap

</td>
<td width="50%">

### 📊 Dashboard & Laporan
- Statistik real-time
- Visualisasi data dengan Chart.js
- Export laporan

### 🌤️ Integrasi API
- Open-Meteo API untuk cuaca
- Waktu Sarver Realtime
- RESTful API ready

</td>
</tr>
</table>

---

## 🚀 Instalasi

> **Prerequisites:** Pastikan Anda telah menginstall PHP 8.1+, Composer, MySQL, dan Node.js

### Quick Start

```bash
# 1️⃣ Clone repository
git clone https://github.com/RamonZalmora/Onedry_Kel1.git

# 2️⃣ Install dependencies
composer install

# 3️⃣ Setup environment
cp .env.example .env

# 4️⃣ Generate application key
php artisan key:generate

# 5️⃣ Setup database (edit .env terlebih dahulu)
php artisan migrate --seed

# 6️⃣ Create storage link
php artisan storage:link

# 7️⃣ Start development server
php artisan serve
```

<div align="center">

**🎉 Aplikasi siap digunakan!**  
Buka browser dan akses **http://127.0.0.1:8000**

</div>

---

## ⚙️ Konfigurasi

Pastikan sistem Anda memenuhi requirements:

- **PHP** >= 8.1
- **Composer**
- **MySQL** / SqlLite
- **Node.js & NPM** (untuk compile assets)

---

## 🔐 Akun Login Sistem

### 👑 Owner

| Email              | Password   |
|--------------------|------------|
| owner@gmail.com    | 12345678   |

### 👤 Admin / Karyawan

| Email              | Password     |
|--------------------|--------------|
| mimin@gmail.com    | miminn1234   |

---

## ➕ Fitur Opsional

### 🔧 Migrasi Ulang (Reset Database)

Gunakan perintah ini untuk mereset database dari awal:

```bash
php artisan migrate:fresh --seed
```

### 🧪 Testing Laravel

Jalankan test suite:

```bash
php artisan test
```

### 🎨 Compile Assets (Tailwind CSS / JavaScript)

Install dependencies dan compile assets:

```bash
npm install
npm run dev
```

Untuk production build:

```bash
npm run build
```

---

## 🛠️ Teknologi yang Digunakan

| Teknologi          | Versi/Keterangan           |
|--------------------|----------------------------|
| **Laravel**        | 10.x                       |
| **PHP**            | 8.1+                       |
| **MySQL/sqlLite**  | Database                   |
| **Tailwind CSS**   | Framework CSS              |
| **Blade Template** | Template Engine            |
| **Chart.js**       | Library Visualisasi Data   |
| **Laravel Breeze** | Authentication Scaffolding |
| **Open-Meteo API** | Weather API Integration    |
| **Composer**       | Dependency Manager (PHP)   |
| **NPM / Vite**     | Asset Bundling             |

---

## 📝 Catatan

- Pastikan ekstensi PHP yang diperlukan sudah aktif (`pdo_mysql`, `mbstring`, `openssl`, dll)
- Untuk development, gunakan `npm run dev`
- Untuk production, gunakan `npm run build`
- Jangan lupa backup database sebelum menjalankan `migrate:fresh`

---

## 👥 Tim Pengembang

**Kelompok 1 SistemInformasi Universitas Riau 2025**

---

## 🤝 Kontribusi

Jika ingin berkontribusi, silakan fork repository ini dan buat pull request.

---

**Happy Coding! 🚀**