# Requirements

* Laragon
* phpMyAdmin
* Composer

## Instalasi Tools Untuk Laravel

Sebelum kamu dapat melanjutkan tahap Laravel, kamu dapat memasang tools di bawah ini sesuai dengan sistem operasi yang kamu gunakan

Windows

Untuk sistem operasi Windows, tools yang direkomendasikan untuk membuat aplikasi PHP dan Laravel adalah Laragon. Pada laragon, kamu juga dapat memasang aplikasi tanpa harus melakukan instalasi lewat command line
1. Masuk ke website laragon.org lalu klik Download
<p align="center"><img src="web.png" width="400"></p>

2. Pilih Laragon - Full
<p align="center"><img src="full.png" width="400"></p>

3. Install phpMyAdmin
4. Jalankan Laragon
5. Laravel dan kebutuhan lainnya sudah terinstall di laragon
6. Kalian bisa memasang Adminer atau PHPMyAdmin sebagai Database Toolsnya, hanya saja, saya lebih merekomendasikan Adminer karena lebih simple
7. Untuk pemasangan PHPMyAdmin, kalian bisa melakukan langkah dibawah ini (credit to inwepo).
   <div>
   a. Unduh paket phpMyAdmin melalui link yang telah disediakan. Setelah pengunduhan, nantinya kita akan di beri file kompresi dengan ekstensi .zip di dalamnya.
   <p align="center"><img src="unduh.png"></p>
   b. Ekstrak isi dalam file terkait menuju direktori laragon/etc/apps (Umumnya, direktori tersebut berada pada partisi C: atau di manapun kamu menginstal Laragon).
   <p align="center"><img src="folder.png" width="400"></p>
   c. Setelah di ekstrak, jalankan server Laragon dengan cara menekan tombol Start All pada aplikasi Laragon.
   <p align="center"><img src="start.png" width="400"></p>
   d. Arahkan mouse pada aplikasi Laragon, lalu klik kanan untuk memunculkan pengaturan aplikasi. Pada kolom MySQL, pilih opsi phpMyAdmin untuk memunculkan halaman phpMyAdmin pada browser kamu. 
   <p align="center"><img src="phpadmin.png" width="400"></p>
   e. Jika berhasil, nantinya akan muncul halaman login aplikasi phpMyAdmin. Aplikasi phpMyAdmin sudah siap untuk di gunakan. 
   <p align="center"><img src="login.png" width="400"></p>
   </div>
<h3> macOS </h3>
<div>
Untuk macOS, saya merekomendasikan untuk memakai Laravel Valet yang proses instalasinya dapat dibuka disini :
<a href = "https://laravel.com/docs/6.x/valet">Laravel Valet</a>
</div>
<div>
Jika tidak ingin menggunakan Laravel Valet, kalian bisa menggunakan MAMP untuk instalasi Tools nya yang dapat diunduh di
<a href ="https://www.mamp.info/en/downloads/"> Download MAMP</a>
</div>
<div>
Jika memakai MAMP, untuk composer nya harus dipasang terpisah dengan cara:
<a href="https://gist.github.com/kkirsche/5710272"> Install Composer Laravel </a>


<h3>Linux</h3>
Untuk Linux, saya merekomendasikan untuk memakai Laravel Valet for Linux yang proses instalasinya dapat dibuka disini :
<a href ="https://cpriego.github.io/valet-linux/"> Instalasi Lavarel Linux </a>

Jika tidak ingin menggunakan Laravel Valet, kalian bisa menggunakan XAMPP For Linux (LAMPP) untuk instalasi Tools nya yang dapat diunduh di
<a href ="https://www.apachefriends.org/download.html"> Instalasi XAMPP Linux </a>

Sebagai alternatif, kamu bisa juga mengikuti tutorial di bawah ini jika ingin memasang secara manual:
<a href ="https://www.linuxbabe.com/ubuntu/install-lemp-stack-nginx-mariadb-php7-2-ubuntu-18-04-lts"> Tutorial Manual </a>

Setelah menginstall aplikasi diatas kamu bisa menginstall laravel. Ikuti dokumentasi di <a href="https://laravel.com/docs/7.x"> Install Laravel </a>
Apabila kamu menggunakan laragon maka laravel sudah otomatis terinstall dan kamu bisa langsung membuat project dengan laravel.

# Cara Menjalanakan Programnya

### 1. Clone Repository

Buka folder `C:\laragon\www` kemudian clone repository dan cd ke folder {nama repository}
```
git clone https://github.com/AndhikaRei/{nama repository}.git
cd {nama repository}
```
Sebelum melakukan ini pastikan kamu sudah menginstall git di di pc. Setelah melakukan ini file hasil dari github mestinya sudah ada di pc mu.

#### 2. Install Composer dan npm dependency

Untuk windows, dapat mendownload composer pada [link](https://getcomposer.org/download/) ini, kemudian ikuti langkah-langkahnya. Setelah terinstall, pindah ke directory project  dan jalankan command berikut.
```
composer install
npm install
```
Apabila menggunakan laragon maka tidak perlu menginstall composer

#### 3. Copy file .env

`.env.example` hanyalah sampel dari `.env` sehingga perlu di-copy untuk digunakan.
```
copy .env.example .env
```
Command diatas akan meng-copy `.env.example` menjadi `.env`

#### 4. Generate encryption key

Laravel memerlukan kode enkripsi pada file `.env`. Command berikut akan menambah `APP_KEY` pada file `.env`.
```
php artisan key:generate
```

#### 5. Buat database baru

Buka browser kemudian buka login page phpmyadmin atau `localhost/phpmyadmin`. Login dengan username root (jika masih default), kemudian tambah database baru dengan nama `{project_name}`

#### 6. Tambahkan info database di .env file

Buka file `.env` kemudian ganti `DB_DATABASE` menjadi `{project_name}` atau `.

#### 7. Migrasi database

Buka terminal di folder {nama repository} di dalam laragon/www kemudian jalankan command berikut.
```
php artisan migrate
```
Command diatas akan memigrasi tabel ke database.

#### 8. Seed database

```
php artisan db:seed
```
Command diatas akan mengisi database dengan dummy data.

#### 9. Akses webpage

Buka terminal di folder {nama repository} dan jalankan command :
```
php artisan serve
```
Setelah command dimasukkan, akan muncul line berikut :
<p align="center"><img src="developmentServerStarted.PNG"></p>
Salin link yang tertera pada command line tersebut dan tempel pada address bar browser pilihan Anda.


## Screen Capture HomePage
![Screenshot](img/Home.PNG)
![Screenshot](img/Hom2.PNG)

## Screen Capture Details Page
![Screenshot](img/Details.PNG)

## Screen Capture Checkout Page
![Screenshot](img/Checkout.PNG)
