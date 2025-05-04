<p align="center" style="margin-bottom: 0px;"> SmartPresence</p>
 ## <p align="center" style="margin-top: 0;">Sistem Absensi Siswa Berbasis Web</p>
 
 <p align="center">
   <img src="LogoUnsulbar.png" alt="SmartPresence Logo" width="300"/>
 </p>
 
 
 ### <p align="center">Ade evi </p>
 ### <p align="center">D0223043  </p></br>
 ### <p align="center">Framework Web Based</p>
 ### <p align="center">2025</p>
 
 
  
 
 ---
 
 ## Role dan Fitur-fiturnya
 
 | **Role**     | **Fitur**                                                                              |
 |--------------|------------------------------------------------------------------------------------------|
 | Admin        | Mengelola data siswa, mengatur pengguna, melihat statistik absensi.                     |
 | Guru         | Mencatat kehadiran siswa dan memperbaharui data siswa.                                  |
 | Orang Tua    | Melihat Riwayat kehadiran anak melalui akun mereka.                                     |
 
 ---
 
 ## Tabel-Tabel Database Beserta Field dan Tipe Datanya
 
 ### Tabel `roles` (Peran pengguna)
 
 | Nama Field | Tipe Data            | Keterangan                   |
 |------------|----------------------|------------------------------|
 | id         | Integer (Primary Key)| ID unik setiap peran         |
 | name       | String               | Nama peran (admin, guru, orangtuan) |
 
 ### Tabel `users` (Data pengguna)
 
 | Nama Field | Tipe Data            | Keterangan                        |
 |------------|----------------------|-----------------------------------|
 | id         | Integer (Primary Key)| ID pengguna                       |
 | name       | String               | Nama Pengguna                     |
 | email      | String (Unique)      | Email untuk login                 |
 | password   | String               | Password login                    |
 | role_id    | Integer (Foreign Key)| Hubungan ke table `roles`         |
 
 ### Tabel `students` (Data siswa)
 
 | Nama Field | Tipe Data            | Keterangan        |
 |------------|----------------------|-------------------|
 | id         | Integer (Primary Key)| ID siswa          |
 | name       | String               | Nama siswa        |
 | class      | String               | Kelas siswa       |
 
 ### Tabel `parent_student` (Hubungan Orang Tua dengan Siswa)
 
 | Nama Field | Tipe Data            | Keterangan                            |
 |------------|----------------------|---------------------------------------|
 | id         | Integer (Primary Key)| ID unik hubungan                      |
 | parent_id  | Integer (Foreign Key)| ID orang tua (mengacu ke `users`)     |
 | student_id | Integer (Foreign Key)| ID siswa (mengacu ke `students`)      |
 
 ### Tabel `attendances` (Catatan Absensi)
 
 | Nama Field       | Tipe Data             | Keterangan              |
 |------------------|-----------------------|--------------------------|
 | id               | Integer (Primary Key) | ID unik absensi          |
 | student_id       | Integer (Foreign Key) | ID siswa yang hadir      |
 | attendance_date  | Date                  | Tanggal absensi          |
 | status           | Enum (Hadir, Tidak Hadir) | Status kehadiran siswa |
 
 ---
 
 ## Jenis Relasi dan Tabel yang Berelasi
 
 | Relasi       | Tabel yang Berelasi         | Jenis                                        |
 |--------------|-----------------------------|----------------------------------------------|
 | One-to-Many  | `roles` ➝ `users`           | Satu role bisa dimiliki banyak pengguna      |
 | Many-to-Many | `users` ➝ `students` melalui `parent_student` | Satu orang tua bisa memiliki beberapa anak |
 | One-to-Many  | `students` ➝ `attendances`  | Satu siswa bisa memiliki banyak catatan absensi |
