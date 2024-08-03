# PHP-MVC

## Deskripsi

PHP-MVC adalah kerangka kerja sederhana berbasis Model-View-Controller yang dibuat menggunakan PHP. Proyek ini dirancang untuk membantu pengembang memahami dan mengimplementasikan pola arsitektur MVC dalam pengembangan aplikasi web.

## Fitur

-   **Model-View-Controller (MVC)**: Memisahkan logika aplikasi, tampilan, dan data.
-   **Struktur Direktori Jelas**: Memudahkan pengorganisasian kode.
-   **Routing Dinamis**: Mengelola URL dan rute aplikasi dengan mudah.
-   **Templating Engine Sederhana**: Memisahkan logika bisnis dari tampilan.

## Persyaratan

-   XAMPP (atau server lokal dengan PHP dan MySQL)
-   Composer (untuk mengelola dependensi)

## Instalasi

1. Clone repositori ini:
    ```bash
    git clone https://github.com/zufarrizal/PHP-MVC.git
    ```
2. Pindah ke direktori proyek:
    ```bash
    cd PHP-MVC
    ```
3. Instal dependensi menggunakan Composer:
    ```bash
    composer install
    ```
4. Konfigurasi database di file `config/database.php`.
5. Import database dari file `sql/database.sql` ke MySQL.
6. Jalankan XAMPP dan mulai Apache serta MySQL.
7. Akses aplikasi melalui browser:
    ```http
    http://localhost/PHP-MVC/public
    ```

## Struktur Direktori

-   `config/` : Konfigurasi aplikasi.
-   `controllers/` : Logika pengendali.
-   `models/` : Logika model dan database.
-   `views/` : Template tampilan.
-   `public/` : Akses publik dan file statis.

## Penggunaan

1. Tambahkan kontroler baru di direktori `controllers/`.
2. Tambahkan model baru di direktori `models/`.
3. Tambahkan tampilan baru di direktori `views/`.

## Kontribusi

Kontribusi sangat diterima. Silakan buat pull request atau buka issue untuk perbaikan atau penambahan fitur.

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).
