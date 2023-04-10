# UTS_kelompok3_POS-system
projek MSIB POS system

# cara merge

### Persayaratan

- PHP 8.2.0 or higher
- Composer
- Node.js and npm
- MySQL 




## installation
1. clone repository:
- git clone https://github.com/kristantra/msib_tugas_cms.git




2. Masuk ke directory proyek



3. pasang dependency
- composer install
- npm install



4. copy .env.example 
- cp .env.example .env



5. generate key aplikasi
- php artisan key:generate

6. perbarui berkas .env dengan  database anda dan pengaturan konfigurasi lainnya

7. jalankan migrasi database
- php artisan migrate

8. seeder, jalankan command php artisan db:seed       

9. jalankan command 'npm run dev'

10. jalankan server
- php artisan serve

11. buka browser dan buka `http://localhost:8000` untuk mengakses aplikasi.

12. email: admin@gmail.com
password: password