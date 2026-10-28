# API Showroom Mobil (BTNG Backend)

RESTful API manajemen data mobil menggunakan Laravel 12 dan MySQL.

## Live Deployment
- URL API: https://btng-backend-ricky-puji-himawanto.cleverapps.io/api/mobil
- Dokumentasi Scramble: https://btng-backend-ricky-puji-himawanto.cleverapps.io/docs/api

## Teknologi
Laravel 12, PHP 8.2+, MySQL, Scramble (dokumentasi API)

## Instalasi Lokal
1. git clone https://github.com/rickhpy9/BTNG-Backend-Ricky_Puji_Himawanto.git
2. cd BTNG-Backend-Ricky_Puji_Himawanto
3. composer install
4. copy .env.example .env
5. php artisan key:generate
6. Buat database MySQL, lalu isi DB_DATABASE, DB_USERNAME, DB_PASSWORD di .env
7. php artisan migrate --seed
8. php artisan serve
9. Buka http://127.0.0.1:8000/docs/api

## Daftar Endpoint
| Method | Endpoint | Deskripsi | Status |
|--------|----------|-----------|--------|
| GET | /api/mobil | Daftar semua mobil | 200 |
| GET | /api/mobil/{id} | Detail satu mobil | 200 |
| POST | /api/mobil | Tambah mobil | 201 |
| PUT/PATCH | /api/mobil/{id} | Ubah data mobil | 200 |
| DELETE | /api/mobil/{id} | Hapus mobil | 200 |

## Format Respon
Sukses: { "message": "...", "data": ... }
Gagal validasi (422): { "message": "...", "errors": { ... } }
Tidak ditemukan (404): { "message": "Data mobil tidak ditemukan" }

## Atribut Mobil
nama, brand, harga, tahun, transmisi (Manual/Matic/CVT),
bahan_bakar (Bensin/Diesel/Hybrid/Listrik), status (tersedia/sold), foto (URL)

## Author
Ricky Puji Himawanto