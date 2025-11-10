## Tentang Proyek ini

Batik Pedia adalah aplikasi web berbasis Laravel yang dibuat untuk mendokumentasikan kursus membatik, galeri batik, dan
informasi terkait budaya batik Indonesia. Proyek ini menggunakan framework Laravel karena sintaksnya yang elegan dan
workflow pengembangan yang menyenangkan. Proyek ini dibuat atas dasar kebutuhan aplikasi Android Batik Pedia.

## Fitur Utama Batik Pedia

1. Manajemen Kursus Membatik
    - Tambah, ubah, hapus kursus membatik lengkap dengan gambar, harga, dan deskripsi.
2. Manajemen Video Membatik
    - CRUD data video membatik.
3. Manajemen Wisata Batik
    - CRUD data wisata batik Nusantara.
4. Manajemen provinsi di Indonesia
    - CRUD data provinsi di Indonesia.
5. Manajemen Berita Batik
    - CRUD data berita seputar batik.
6. Manajemen Rekomendasi Event Batik.
    - CRUD data rekomendasi event batik.
7. Manajemen Katalog Batik.
    - CRUD data batik nusantara.

## Rest API Batik Pedia

### 1. Provinsi

- #### Endpoint Daftar Provinsi
   ```bash
   GET /api/provinsi
   ```

    - ##### Deskripsi :
      Mengambil daftar data provinsi di Indonesia

      ##### Hasil Response :
        ```json
        {
            "status": "Success",
            "message": "Success get list provinsi",
            "data": [
                {
                    "idProvinsi": 8,
                    "namaProvinsi": "Jawa timur",
                    "imgProvinsi": "jawa.png",
                    "detailProvinsi": "Jawa Timur",
                    "created_at": "2025-11-08 13:52:13",
                    "updated_at": "2025-11-08 13:52:13"
                },
                {
                    "idProvinsi": 9,
                    "namaProvinsi": "Jawa Barat",
                    "imgProvinsi": "jawa-barat.png",
                    "detailProvinsi": "Jawa Barat",
                    "created_at": "2025-11-08 14:12:45",
                    "updated_at": "2025-11-08 14:49:28"
                }
            ]
        }
        ```

- #### Endpoint Tambah Provinsi

    ```bash 
     POST api/provinsi/
     ```

    - ##### Deskripsi :
      Menambah data provinsi indonesia

      ##### Hasil Response :
      ```json
       {
        "status": "Success",
        "message": "Success create provinsi",
        "data": {
           "namaProvinsi": "Kalimantan Tengah",
           "imgProvinsi": "kalteng.jpg",
           "detailProvinsi": "Kalimantan Tengah adalah provinsi yang ...",
           "updated_at": "2025-11-10 18:26:31",
           "created_at": "2025-11-10 18:26:31",
           "idProvinsi": 11
        }
      }
      ```

- #### Endpoint Edit Provinsi
    ```bash
    PUT/PATCH api/provinsi/
    ```

    - ##### Deskripsi :
      Mengubah data nama, gambar, dan detail provinsi sesuai keinginan/kebutuhan

      ##### Hasil Response :
       ```json
      {
         "status": "Success",
         "message": "Success update provinsi dengan id 11",
         "data": {
                  "idProvinsi": 11,
                  "namaProvinsi": "Kalimantan Tengah",
                  "imgProvinsi": "kalteng.jpg",
                  "detailProvinsi": "Kalimantan Tengah adalah provinsi yang terletak",
                  "created_at": "2025-11-10 18:26:31",
                  "updated_at": "2025-11-10 18:30:19"
         }
      }
      ```

- #### Endpoint Get Id Provinsi
   ```bash
   GET api/provinsi/{id}
  ```
  - ##### Deskripsi :
     Mendapatkan data suatu provinsi dengan menginputkan Id provinsi yang ada
    ##### Hasil Response :
     ```json
          {
             "status": "Success",
             "message": "Success get provinsi",
             "data": {
             "idProvinsi": 11,
             "namaProvinsi": "Kalimantan Tengah",
             "imgProvinsi": "kalteng.jpg",
             "detailProvinsi": "Kalimantan Tengah adalah provinsi yang terletak",
             "created_at": "2025-11-10 18:26:31",
             "updated_at": "2025-11-10 18:30:19"
              }
          }
     ```
- #### Endpoint Delete Provinsi
   ```bash
  DELETE api/provinsi/{id}
   ```
    - ##### Deskripsi :
      Menghapus data provinsi berdasarkan id provinsi nya

      ##### Hasil Response
         ```json
           {
              "status": "Success",
              "message": "Success delete provinsi dengan 11",
              "data": {
              "idProvinsi": 11,
              "namaProvinsi": "Kalimantan Tengah",
              "imgProvinsi": "kalteng.jpg",
              "detailProvinsi": "Kalimantan Tengah adalah provinsi yang terletak",
              "created_at": "2025-11-10 18:26:31",
              "updated_at": "2025-11-10 18:30:19"
             }
           }
         ```

### 2. Wisata

##### Endpoint Get

```bash
    GET /api/wisata
```
