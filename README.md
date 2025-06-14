<!-- GETTING STARTED -->
## Getting Started

Proyek ini dirancang untuk memenuhi tugas besar mata kuliah Pengembangan Aplikasi Website. Proyek ini merupakan Sistem Manajemen Booking Online Pada Telkomedika, yang dibuat menggunakan Laravel + Breeze. Proyek ini memiliki fitur CRUD utama, yaitu

1. Fitur Manajemen User (Admin, Mahasiswa, Dokter, Petugas Obat)
2. Fitur Jadwal
3. Fitur Pemeriksaan Riwayat
4. Fitur Pemberian Obat
5. Fitur Booking

### Installation

Berikut merupakan tahap instalasi yang harus dilakukan untuk menjalankan proyek ini, jalankan sintaks berikut menggunakan Terminal di perangkat anda.

1. Clone the repository
   ```sh
   git clone https://github.com/gandwi12/kelompok2_paw.git
   ```
2. Move to directory
   ```sh
   cd kelompok2_paw/
   ```
3. Install Composer packages
   ```sh
   composer install
   ```
4. Install NPM packages
   ```sh
   npm install
   ```
5. Run NPM packages
   ```sh
   npm run build
   ```
5. Copy the `.env.example` file to `.env`
   ```sh
    cp .env.example .env
    ```
6. Setup your database configuration in `.env`
7. Run database migrations
    ```sh
    php artisan migrate
    ```
8. Generate application encryption key
    ```sh
    php artisan key:generate
    ```
9. Start laravel project
    ```sh
    php artisan serve
