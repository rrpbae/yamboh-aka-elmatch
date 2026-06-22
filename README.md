<div align="center">
  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" alt="Laravel Logo" width="80"/>
  <h1>ElMatch</h1>
  <p><b>Platform Review CV Cerdas Berbasis AI (AI-Powered ATS)</b></p>
  <p>Sistem ini dirancang untuk menyederhanakan proses rekrutmen. Pelamar cukup mengunggah CV (PDF), dan AI akan otomatis mengekstrak data keahlian (skills) lalu mencocokkannya dengan lowongan kerja yang tersedia.</p>
</div>

---

## Fitur Utama

### 1. Multi-Role System
Sistem terbagi menjadi 3 peran utama dengan otorisasi ketat:
*   **Admin**: 
    *   Memiliki kendali penuh (CRUD) atas manajemen seluruh Pengguna (User, Company, Admin).
    *   Melakukan moderasi (Read & Delete) terhadap lowongan yang diunggah oleh perusahaan.
*   **Perusahaan (Company)**: 
    *   Dapat membuat dan melengkapi profil perusahaan.
    *   Melakukan publikasi lowongan kerja baru, mengedit, dan menghapus (CRUD Lowongan).
    *   Diwajibkan mencantumkan kontak (WhatsApp/Email) agar pelamar dapat terhubung secara langsung.
*   **Pelamar (User)**: 
    *   Mengunggah dokumen CV dalam format PDF (ATS Friendly).
    *   Mendapatkan **Skor Kecocokan (Match Percentage)** dengan lowongan yang tersedia secara *real-time*.

### 2. Integrasi Kecerdasan Buatan (Google Gemini AI)
*   Membaca dan mengekstrak teks dari *file* PDF CV yang diunggah oleh pelamar.
*   Mengidentifikasi keahlian teknis (*hard skills*), estimasi tahun pengalaman, dan memberikan saran perbaikan CV secara otomatis.

### 3. UI/UX Modern & Responsif
*   Dibangun dengan **Tailwind CSS**.
*   Mengusung desain *Glassmorphism*, *Bento Grid*, animasi mikro (*floating elements*, *shining text*), dan navigasi *User-Friendly*.

---

## Tech Stack & Persyaratan Sistem

Pastikan sistem Anda memenuhi spesifikasi berikut sebelum melakukan instalasi:
*   **PHP**: `^8.1` atau lebih baru
*   **Composer**: `^2.0`
*   **Node.js**: `^18.0` & **NPM** (untuk *asset bundling* dengan Vite)
*   **Database**: MySQL / MariaDB
*   **Web Server**: Apache / Nginx
*   **Framework Utama**: Laravel 11.x (atau versi Laravel yang digunakan)

---

## Panduan Instalasi (Langkah demi Langkah)

Ikuti instruksi di bawah ini untuk menjalankan ElMatch di *Local Environment* Anda:

### 1. Clone Repository & Masuk ke Direktori
```bash
git clone https://github.com/rrpbae/yamboh-aka-elmatch.git
cd elmatch
```

### 2. Instalasi Dependensi Backend (PHP)
Instal semua pustaka yang dibutuhkan oleh Laravel:
```bash
composer install
```

### 3. Instalasi Dependensi Frontend (Node.js)
Instal dan kompilasi *asset* Tailwind CSS menggunakan Vite:
```bash
npm install
npm run build
```

### 4. Konfigurasi Environment (File `.env`)
Salin file konfigurasi bawaan ke environment lokal:
```bash
cp .env.example .env
```
Buka file `.env` di teks editor, sesuaikan pengaturan Database dan yang paling penting **Google Gemini API Key**:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=elmatch   # Pastikan Anda telah membuat database kosong bernama 'elmatch' di MySQL
DB_USERNAME=root      # Sesuaikan dengan username DB Anda
DB_PASSWORD=          # Sesuaikan dengan password DB Anda

# ----------------------------------------
# KONFIGURASI API AI (WAJIB DIISI)
# Dapatkan di: https://aistudio.google.com/
# ----------------------------------------
GEMINI_API_KEY="masukkan_api_key_anda_disini"
```

### 5. Generate Application Key & Link Storage
Jalankan perintah ini untuk mengamankan aplikasi dan menghubungkan folder upload CV agar dapat diakses oleh publik:
```bash
php artisan key:generate
php artisan storage:link
```

### 6. Migrasi Skema Database & Seeder (Dummy Data)
Perintah ini akan membuat struktur tabel beserta akun-akun *default* untuk Anda (jika *seeder* tersedia):
```bash
php artisan migrate:fresh --seed
```

### 7. Jalankan Aplikasi
Jalankan *local server* bawaan Laravel:
```bash
php artisan serve
```
Akses aplikasi melalui browser di: **`http://localhost:8000`**

---

## Struktur Direktori Penting

Jika Anda ingin memodifikasi proyek ini, berikut adalah lokasi file-file krusial:

*   **`app/Http/Controllers/`**
    *   `AdminController.php` (Logika Dashboard Admin, Manajemen User/Lowongan)
    *   `CvController.php` (Menangani *Upload* file, memanggil AI Service, menghitung skor algoritma)
    *   `JobVacancyController.php` (CRUD Lowongan, Validasi Email/Telepon wajib)
*   **`app/Services/`**
    *   `CvAnalyzerService.php` (Jantung integrasi dengan Google Gemini API)
*   **`resources/views/`**
    *   `welcome.blade.php` (*Landing Page* penuh animasi CSS)
    *   `admin/`, `company/`, `user/` (Tampilan *Dashboard* spesifik per peran)
    *   `cv/` (*View* untuk riwayat analisis CV dan halaman hasil skor/rekomendasi)
*   **`routes/web.php`** (Daftar semua URL aplikasi dan filterisasi akses *Middleware*).

---

## Troubleshooting Umum

**1. Gambar atau File CV tidak bisa diakses/dibuka (404 Not Found)?**
> Pastikan Anda sudah menjalankan `php artisan storage:link`. Folder `storage/app/public` harus terhubung dengan `public/storage`.

**2. Error 500 saat mengunggah CV?**
> Pastikan `GEMINI_API_KEY` di file `.env` sudah terisi dengan benar. Tanpa API Key yang valid, proses analisis AI akan gagal (crash).

**3. Tampilan CSS berantakan atau fitur Tailwind tidak jalan?**
> Pastikan Anda sudah melakukan instalasi Node JS dan menjalankan perintah `npm run dev` atau `npm run build`.

---
<div align="center">
  <p>Maturnuwun.</p>
</div>