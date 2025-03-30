<b>Pendahuluan</b><br><hr>
API ini dirancang untuk digunakan oleh admin sebuah klinik kesehatan dalam mengelola data pasien, dokter, janji temu, rekam medis, dan resep obat. API ini dibangun menggunakan Laravel.

LANGKAH LANGKAH INTALASI LARAVEL API
1.Clone Repo
```
git clone https://github.com/ryankputra/api-kesehatan.git
```
2.Install Dependensi
```
composer install
```
<b>Konfigurasi</b><br>
Duplikat file .env.exemple dan beri nama .env .Sesuaikan konfigurasi database:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username
DB_PASSWORD=password
```
3.Migrasi Database
```
php artisan migrate
```
4.Jalankan Server Lokal
```
php artisan serve
```
<b>Endpoint API menggunakan Postman</b>
<b>1.Patients</b>
    GET /api/patients: Menampilkan semua pasien.
    POST /api/patients: Menambahkan pasien baru.
    GET /api/patients/{id}: Menampilkan data pasien berdasarkan ID.
    PUT/PATCH /api/patients/{id}: Memperbarui data pasien.
    DELETE /api/patients/{id}: Menghapus data pasien.
    <hr>
<b>2.Doctors</b>
    GET /api/doctors: Menampilkan semua dokter.
    POST /api/doctors: Menambahkan dokter baru.
    GET /api/doctors/{id}: Menampilkan data dokter berdasarkan ID.
    PUT/PATCH /api/doctors/{id}: Memperbarui data dokter.
    DELETE /api/doctors/{id}: Menghapus data dokter.
    <hr>
  <b>3.appointments</b>
    GET /api/appointments: Menampilkan semua janji temu.
    POST /api/appointments: Menambahkan janji temu baru.
    GET /api/appointments/{id}: Menampilkan data janji temu berdasarkan ID.
    PUT/PATCH /api/appointments/{id}: Memperbarui data janji temu.
    DELETE /api/appointments/{id}: Menghapus janji temu.
    <hr>
    <b>4.medical_records</b>
    GET /api/medical_records: Menampilkan semua rekam medis.
    POST /api/medical_records: Menambahkan rekam medis baru.
    GET /api/medical_records/{id}: Menampilkan rekam medis berdasarkan ID.
    PUT/PATCH /api/medical_records/{id}: Memperbarui data rekam medis.
    DELETE /api/medical_records/{id}: Menghapus rekam medis.
    <hr>
    <b>5.prescriptions</b>
    GET /api/prescriptions: Menampilkan semua resep obat.
    POST /api/prescriptions: Menambahkan resep obat baru.
    GET /api/prescriptions/{id}: Menampilkan resep obat berdasarkan ID.
    PUT/PATCH /api/prescriptions/{id}: Memperbarui data resep obat.
    DELETE /api/prescriptions/{id}: Menghapus resep obat.


