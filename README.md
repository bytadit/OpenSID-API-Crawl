### Project 2 : API Harvester
#### How to Install:
1. Install Requirement :
    * XAMPP
    * Composer (https://getcomposer.org/)
    * Valet (for windows : https://github.com/cretueusebiu/valet-windows)
    * Code Editor
    * Browser
    * Git
    * Postman/SOAP UI
2. Siapkan 2 Folder / Direktori untuk Project 1 (API Servers) dan Project 2 (API Harvester)
3. Menyiapkan API Servers 
    * Jalankan XAMPP
    * Clone Repository Project 1 ke direktori yang disiapkan (https://github.com/bytadit/Sister-Project-1)
    * Terdapat 12 Server Desa, dalam tiap direktori folder desa, instal composer (`composer install` dan `composer update`)
    * Buat 12 Database desa, masing" untuk tiap server desa
    * Dalam masing" folder server/aplikasi desa, Buat file .env dengan meng-copy file .env.example dari masing" folder server desa. Sesuaikan konfigurasinya dengan kebutuhan masing-masing (nama database, baseurl, dll).
    * Jalankan  `php artisan secret:key` dan `php artisan jwt:secret` untuk masing" server desa
    * Pada tiap server desa, jalankan `php artisan migrate:fresh --seed` untuk membuat table dalam masing" database
    * Pada direktori/folder utama yang berisi kumpulan folder server desa, install dan jalankan valet, kemudian jalankan `valet park`
    * Untuk mengetest apakah server berjalan, buka postman, masukkan URL ( `http://{isi_nama_server_desa}.test/api/register, pada body masukkan nama, email, password dan password_confirmatiion, kemudian run dengan method post. Jika registrasi muncul pesan berhasil (200), maka server telah berjalan
4. Menyiapkan Aplikasi Harvester
    * Clone Repository ini (https://github.com/bytadit/OpenSID-API-Crawl/), di folder direktori yang telah disiapkan untuk project 2
    * Jalankan `composer install` dan `composer update`
    * Buat satu database baru, sebagai wadah untuk harvesting API
    * Buat file dengan nama .env dengan meng-copy file .env.example, lalu merenamenya, sesuaikan konfigurasi didalamnya (nama database, variable NAMA, EMAIL, dan PASSWORD yang digunakan sebagai akun untuk mengakses API)
    * Jalankan `php artisan migrate:fresh --seed`
    * Jalankan server `php artisan serve`, copy urlnya
    * Masuk dalam browser, lalu pastekan url server dari aplikasi harvester
    * Registrasi akun baru, dengan klik register
    * Jika registrasi berhasil, maka silakan login
    * Akan muncul UI yang berisi navigasi untuk melihat daftar API dari tiap server desa dalam bentuk grafik, namun data API belum bisa ditampilkan karena data belum diharvest
    * Untuk harvesting API, maka dalam console di aplikasi harvester, jalankan `php artisan harvest:apis`, yang merupakan command untuk melakukan harvesting. Harvesting dilakukan dengan mengecek akun yang telah diset dalam file .env, jika akun tersedia dalam database maka proses harvesting akan langsung dijalankan untuk tiap server desa. Jika akun belum tersedia, maka akan dilakukan registrasi akun baru sesuai informasi (NAMA, EMAIL, dan PASSWORD) yang anda definisikan di file .env
    * Dalam proses harvesting, pada console akan muncul log proses yang berjalan. Jika harvesting berhasil maka akan muncul pesan kesuksesan
    * Jika data telah sukses diharvest, maka sekarang tiap grafik statistik API dari tiap server desa akan muncul, sesuai dengan periode harvesting
5. Selesai

    
