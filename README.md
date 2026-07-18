# Smart-Hub

## Summary

Smart-Hub merupakan aplikasi manajemen peminjaman fasilitas studio kreatif yang memungkinkan anggota melakukan reservasi workspace dan peminjaman peralatan secara terintegrasi. Sistem menyediakan pengelolaan data fasilitas, validasi peminjaman, serta monitoring transaksi secara real-time melalui dashboard administrasi.

---

## Teknologi dan Stack

### Frontend
- Vue.js 3
- Inertia.js
- Tailwind CSS

### Backend
- Laravel 13
- PHP 8.4

### Database
- PostgreSQL (Supabase)

### Authentication & Security
- Laravel Sanctum
- Role-Based Access Control (Admin & Member)

### API
- REST API
- Inertia Request

### Development Tools
- Visual Studio Code
- Composer
- Node.js
- npm
- Git & GitHub
- Postman

### AI Recommendation
- Tidak menggunakan layanan AI API pada implementasi sistem.

---

## Aktor Sistem

### Admin
- Mengelola data anggota
- Mengelola data workspace
- Mengelola data equipment
- Melakukan persetujuan transaksi
- Melakukan proses check-in dan check-out
- Memantau dashboard dan histori transaksi

### Member
- Melihat daftar fasilitas
- Mengajukan peminjaman
- Membatalkan transaksi yang masih pending
- Melihat riwayat transaksi

---

## Flow Aplikasi

### Authentication

```text
Login
↓
Dashboard sesuai role
```

### Proses Peminjaman

```text
Member membuat transaksi
↓
Status : Pending
↓
Admin melakukan validasi
↓
Approved / Rejected
↓
Checkout
↓
Borrowed
↓
Completed
```

### Flow Sistem Secara Garis Besar

```text
User
↓
Vue.js Frontend
↓
Inertia / REST API
↓
Laravel Backend
↓
PostgreSQL (Supabase)
```

---

## Fitur Utama

### Dashboard
- Statistik anggota
- Statistik fasilitas
- Statistik transaksi
- Statistik peminjaman aktif
- Riwayat transaksi terbaru

### Manajemen Member
- CRUD anggota
- Pengaturan role

### Manajemen Workspace
- CRUD workspace
- Pengaturan kapasitas
- Pengaturan relasi equipment

### Manajemen Equipment
- CRUD equipment
- Monitoring stok

### Manajemen Transaksi
- Pengajuan peminjaman
- Validasi jadwal
- Validasi stok
- Approval transaksi
- Check-in dan check-out
- Riwayat transaksi

---

## Struktur Database

### Tabel Utama

- users
- workspaces
- equipments
- workspace_equipment
- transactions
- transaction_items

---

## Aturan Bisnis

- Workspace tidak dapat dibooking pada waktu yang bertabrakan.
- Stok equipment akan berkurang saat checkout.
- Stok akan kembali setelah transaksi selesai.
- Maksimal durasi peminjaman workspace adalah 8 jam.
- Maksimal durasi peminjaman equipment adalah 7 hari.
- Hanya transaksi berstatus pending yang dapat dibatalkan oleh member.

---

## Status Transaksi

```text
pending
approved
rejected
cancelled
borrowed
completed
```

---

## Struktur Menu

### Admin

```text
Dashboard
├── Members
├── Workspaces
├── Equipments
├── Transactions
└── Profile
```

### Member

```text
Dashboard
├── Workspaces
├── Equipments
├── My Transactions
└── Profile
```

---

## Informasi Non-Teknis

### Permasalahan

Pengelolaan peminjaman fasilitas studio secara manual sering menyebabkan bentrok jadwal, kesalahan pencatatan, dan kesulitan dalam memantau ketersediaan fasilitas.

### Solusi

Smart-Hub menyediakan sistem terintegrasi untuk mengelola peminjaman fasilitas, meningkatkan efisiensi administrasi, serta mempermudah monitoring transaksi dan ketersediaan fasilitas.

---
