# ecommerce-Wibu-Shop
Anggota Kelompok
-Oky Pratama
-Joni
-Faisal
-Mujib

Setelah clone project ini silahkan lakukan hal0hal berikut:
1. rename file .env.example menjadi .env
2. lakukan composer install atau composer update
3. jalankan php artisan storage:link untuk menampilkan foto yang diupload
4. jalankan php artisan key:generate untuk menggenerate key dalam .env
5. edit hal berikut pada file .env:
        DB_DATABASE=(nama databasemu)
        DB_USERNAME=(username databasemu)
        DB_PASSWORD=(password username databasemu)
6. jalankan php artisan migrate untuk membuat tabel pada database
7. jalankan php artisan db:seed --class=UsersTableSeeder untuk mengisi user (admin, spv, owner)
8. jalankan php artisan db:seed untuk mengisi beberapa data pada databse (opsional)
9. jalankan php artisan serve untuk dapat membuka web.
10. buka /admin/login untuk login ke dashboard.