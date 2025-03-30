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




