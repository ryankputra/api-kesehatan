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
<b>1.Patients</b><br>br>
    GET /api/patients: Menampilkan semua pasien.
    POST /api/patients: Menambahkan pasien baru.
    GET /api/patients/{id}: Menampilkan data pasien berdasarkan ID.
    PUT/PATCH /api/patients/{id}: Memperbarui data pasien.
    DELETE /api/patients/{id}: Menghapus data pasien.
    <hr>
<b>2.Doctors</b><br><br>
    GET /api/doctors: Menampilkan semua dokter.<br>
    POST /api/doctors: Menambahkan dokter baru.<br>
    GET /api/doctors/{id}: Menampilkan data dokter berdasarkan ID.<br>
    PUT/PATCH /api/doctors/{id}: Memperbarui data dokter.<br>
    DELETE /api/doctors/{id}: Menghapus data dokter.<br>
    <hr>
  <b>3.appointments</b><br><br>
    GET /api/appointments: Menampilkan semua janji temu.<br>
    POST /api/appointments: Menambahkan janji temu baru.<br>
    GET /api/appointments/{id}: Menampilkan data janji temu berdasarkan ID.<br>
    PUT/PATCH /api/appointments/{id}: Memperbarui data janji temu.<br>
    DELETE /api/appointments/{id}: Menghapus janji temu.<br>
    <hr>
    <b>4.medical_records</b><br><br>
    GET /api/medical_records: Menampilkan semua rekam medis.<br>
    POST /api/medical_records: Menambahkan rekam medis baru.<br>
    GET /api/medical_records/{id}: Menampilkan rekam medis berdasarkan ID.<br>
    PUT/PATCH /api/medical_records/{id}: Memperbarui data rekam medis.<br>
    DELETE /api/medical_records/{id}: Menghapus rekam medis.<br>
    <hr>
    <b>5.prescriptions</b><br><br>
    GET /api/prescriptions: Menampilkan semua resep obat.<br>
    POST /api/prescriptions: Menambahkan resep obat baru.<br>
    GET /api/prescriptions/{id}: Menampilkan resep obat berdasarkan ID.<br>
    PUT/PATCH /api/prescriptions/{id}: Memperbarui data resep obat.<br>
    DELETE /api/prescriptions/{id}: Menghapus resep obat.<br>


