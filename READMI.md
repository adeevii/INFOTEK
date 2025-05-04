<p align="center" style="margin-bottom: 0px;"> INFOTEK</p>
 ## <p align="center" style="margin-top: 0;">Portal Berita Seputar Teknologi</p>
 
 <p align="center">
   <img src="20250128_191142.png" alt="INFOTEK Logo" width="300"/>
 </p>
 
 
 ### <p align="center">Ade evi </p>
 ### <p align="center">D0223043  </p></br>
 ### <p align="center">Framework Web Based</p>
 ### <p align="center">2025</p>
 
 
  
 
 ---
 
 ## Role dan Fitur-fiturnya
 
 | **Role**     | **Fitur**                                                                              |
 |--------------|----------------------------------------------------------------------------------------|
 | Admin        | Memiliki akses penuh untuk mengelola pengguna dan konten.                              |
 | Editor       | Menyetujui atau menolak berita sebelum dipublikasikan.                                 |
 | Penulis      | Membuat dan mengedit berita sebelum dikirim untuk ditinjau.                             |
 
 ---
 
 ## Tabel-Tabel Database Beserta Field dan Tipe Datanya
 
 ### Tabel `roles` (Peran pengguna)
 
 | Nama Field | Tipe Data                | Keterangan                   |
 |------------|--------------------------|------------------------------|
 | id         | BigInteger(Primary Key)  | ID unik role                 |
 | name       | Varchar                  | Nama peran (admin, editor, penulis) |
 
 ### Tabel `users` (Data pengguna)
 
 | Nama Field | Tipe Data                     | Keterangan                        |
 |------------|-------------------------------|-----------------------------------|
 | id         | BigInteger (Primary Key)      | ID pengguna                       |
 | name       | Strung                        | Nama Pengguna                     |
 | email      | String (Unique)               | Email untuk login                 |
 | password   | String                        | Password login                    |
 | role       | Enum (admin, editor, penulis) | Peran pengguna                    |
 
 ### Tabel `user_roles` (Menangani relasi many-to-many antara pengguna dan peran)
 
 | Nama Field | Tipe Data                | Keterangan                   |
 |------------|--------------------------|------------------------------|
 | user_id    | BigInteger (Primary Key) | ID unik kategori             |
 | role_id    | BigInteger (Primary key) | Id role yang dimiliki        |

 ### Tabel `categories` (Mengelompokan data berdasarkan kategori)
 
 | Nama Field | Tipe Data                | Keterangan                            |
 |------------|--------------------------|---------------------------------------|
 | id         | Biginteger (Primary Key) | ID unik kategori                      |
 | nama       | String (unique)          | nama kategori berita                  |

 ### Tabel `post` (Menyimpan berita yang dibuat oleh penulis dan ditinjau oleh editor)
 
 | Nama Field       | Tipe Data                 | Keterangan               |
 |------------------|---------------------------|--------------------------|
 | id               | Biginteger (Primary Key)  | ID unik berita           |
 | user_id          | BigInteger (Foreign Key)  | ID penulis berita        |
 | tittle           | String                    | Judul berita             |
 | content          | LongText                  | Isi berita               |
 | categori_id      | BigInteger (Foreign key)  | ID kategori berita       |
 | editor_id        | BigInteger (Foreign key)  | ID editor yang meninjau  |
 | status           | Enum                      | Status berita            |

  ### Tabel `komentar` 
 
 | Nama Field | Tipe Data                         | Keterangan                        |
 |------------|-----------------------------------|-----------------------------------|
 | id         | BigInteger (Primary Key)          | ID unik komentar                  |
 | post_id    | BigInteger (Foreign key)          | ID berita yang dikomentari        |
 | user_id    | BigInteger (Foreign key)          | ID pengguna yang berkomentar      |
 | komentar   | LongText                          | Isi komentar                      |

  ### Tabel `post_view` 
 
 | Nama Field | Tipe Data                     | Keterangan                        |
 |------------|-------------------------------|-----------------------------------|
 | id         | BigInteger (Primary Key)      | ID unik tampilan berita           |
 | post_id    | BigIntegar (Foreign key)      | ID berita                         |
 | views      | long                          | ID pengguna yang berkomentar      |

 ---
 
 ## Jenis Relasi dan Tabel yang Berelasi
 
 | Relasi       | Tabel yang Berelasi         | Jenis                                                                                   |
 |--------------|-----------------------------|-----------------------------------------------------------------------------------------|
 | Many-to-Many | `users` ➝ `roles`          | Satu pengguna bisa memiliki banyak roles, dan satu roles bisa dimiliki banyak pengguna  |
 | One-to-Many  | `users` ➝ `posts`          | Satu penulis bisa membuat banyak berita, tapi satu berita hanya dibuat oleh satu penulis|
 | One-to-Many  | `users` ➝ `posts`(editor)  | Satu editor bisa meninjau banyak berita, tapi setiap berita hanya ditinjau oleh satu   
                                                editor                                                                                  |
 | One-to-Many  | `users` ➝ `komentar`       | Satu pengguna bisa memberikan banyak komentar, tapi satu komentar hanya ditulis oleh satu                                                 pengguna                                                                                | 
 | Many-to-One  | `posts` ➝ `categori`       | Satu berita memiliki satu kategori, tapi satu kategori bisa memiliki banyak berita      |
 | Many-to-One  | `posts` ➝ `komentar`       | Satu berita bisa memiliki banyak dari pembaca                                           |
 | One-to-One   | `posts` ➝ `post_view`      | Setiap berita memiliki satu entri tampilan untuk mencatat jumlah tayangan berita        |
