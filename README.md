# Backend Social Media API

Backend ini adalah RESTful API untuk aplikasi social media berbasis Laravel.  
Fitur utama meliputi: posting, komentar, like, pesan, dan autentikasi sederhana.

## Fitur

-   CRUD Post (dengan UUID)
-   CRUD Comment
-   CRUD Like
-   CRUD Message
-   Soft delete pada beberapa resource
-   Relasi antar user, post, comment, like, dan message

## Instalasi

1. **Clone repo**

    ```sh
    git clone <url-repo-anda>
    cd backend-socialmedia
    ```

2. **Install dependency**

    ```sh
    composer install
    ```

3. **Copy file environment**

    ```sh
    cp .env.example .env
    ```

4. **Generate key**

    ```sh
    php artisan key:generate
    ```

5. **Atur koneksi database**  
   Edit `.env` dan sesuaikan DB_DATABASE, DB_USERNAME, DB_PASSWORD.

6. **Migrasi dan seed database**

    ```sh
    php artisan migrate --seed
    ```

7. **Jalankan server**
    ```sh
    php artisan serve
    ```

## Endpoint API

Semua endpoint berada di bawah prefix `/api/v1/`.

| Method | Endpoint           | Keterangan           |
| ------ | ------------------ | -------------------- |
| GET    | /api/v1/posts      | List semua post      |
| POST   | /api/v1/posts      | Buat post baru       |
| GET    | /api/v1/posts/{id} | Detail post          |
| PUT    | /api/v1/posts/{id} | Update post          |
| DELETE | /api/v1/posts/{id} | Hapus post           |
| ...    | ...                | Endpoint lain serupa |

## Struktur UUID

Semua primary key dan foreign key menggunakan UUID.

## Seeder

Seeder tersedia untuk data dummy user dan post.  
Edit file seeder jika ingin menambah data awal.

## Kontribusi

Pull request dan issue sangat terbuka untuk pengembangan lebih lanjut.
