# Mini-LMS: Submission/File Service Prototype (PHP)

Prototipe layanan penyimpanan tugas (*Submission/File Service*) yang dikembangkan sebagai bagian dari sistem **Mini-LMS (Learning Management System)**. Layanan ini dibangun menggunakan PHP murni, dengan penyimpanan file secara lokal berbasis folder dan metadata dalam format JSON.

Proyek ini bertujuan untuk menyediakan layanan API sederhana yang dapat menerima unggahan file tugas, melakukan validasi input, menyimpan file, dan menyediakan metadata file berdasarkan identifier unik.

## 👥 Anggota Kelompok dan Pembagian Tugas

Berikut adalah anggota kelompok beserta kontribusi masing-masing dalam pengembangan proyek Mini-LMS Submission/File Service.

| No. | Nama Anggota | NIM | Tugas dan Tanggung Jawab |
|---|---|---|---|
| 1 | Muh. Dimas Januardi Nur | 230209501007 | Melakukan pengujian sistem berdasarkan skenario yang telah ditentukan serta menyusun dokumentasi proyek. |
| 2 | Andini Sri Rahayu | 230209501026 | Mengimplementasikan endpoint `GET` untuk mengambil metadata file serta merancang struktur folder penyimpanan proyek. |
| 3 | Muh. Ridzwan | 240209501095 | Merancang kontrak API dan mengimplementasikan endpoint `POST` untuk mengunggah file tugas. |
| 4 | Faqih Ahmad | 240209501111 | Mengimplementasikan validasi input, menangani kesalahan atau error, serta melakukan pengujian integrasi API. |

## ⚙️ Prasyarat Sistem

Sebelum menjalankan aplikasi, pastikan komputer telah memiliki perangkat lunak berikut:

- **PHP 7.4 atau lebih baru**, dengan perintah `php` yang dapat dijalankan melalui terminal atau Command Prompt.
- **Git**, jika ingin mendapatkan source code menggunakan metode Git Clone.
- **Postman** atau alat pengujian API sejenis untuk menguji endpoint.
- **Web browser**, untuk mengakses server lokal jika diperlukan.

Untuk memeriksa apakah PHP sudah terpasang, jalankan perintah berikut:

```bash
php -v
```

Untuk memeriksa instalasi Git, jalankan:

```bash
git --version
```

Jika perintah menampilkan informasi versi, berarti perangkat lunak tersebut sudah dapat digunakan. Jika belum, lakukan instalasi terlebih dahulu melalui situs resminya:

- PHP: https://www.php.net/downloads.php
- Git: https://git-scm.com/downloads
- Postman: https://www.postman.com/downloads/

## 📥 Cara Mendapatkan Proyek

Terdapat dua cara untuk mendapatkan source code proyek ini dari GitHub, yaitu melalui Git Clone atau dengan mengunduh file ZIP. Pilih salah satu metode yang paling sesuai.

### Cara 1: Menggunakan Git Clone

Metode ini cocok bagi pengguna yang ingin mengunduh proyek sekaligus menyimpan riwayat Git untuk mempermudah pengelolaan perubahan kode.

**Langkah 1 — Buka repository GitHub**

Kunjungi repository proyek berikut:

https://github.com/Rizz-xx/mini-lms-submission

Pastikan repository tersebut berisi source code versi PHP yang digunakan dalam proyek ini.

**Langkah 2 — Buka terminal atau PowerShell**

Tentukan lokasi penyimpanan proyek. Sebagai contoh, jika proyek ingin disimpan di drive D, jalankan:

```powershell
cd D:\
```

**Langkah 3 — Clone repository**

Jalankan perintah berikut:

```bash
git clone https://github.com/Rizz-xx/mini-lms-submission.git
```

Tunggu hingga proses pengunduhan selesai. Git akan membuat folder berdasarkan nama repository.

**Langkah 4 — Masuk ke direktori proyek**

```bash
cd mini-lms-submission
```

**Langkah 5 — Periksa isi direktori**

```powershell
dir
```

Pastikan file PHP dan folder yang diperlukan oleh aplikasi tersedia. Nama folder dapat berbeda jika repository atau proses clone menggunakan nama yang berbeda.

### Cara 2: Mengunduh Source Code dalam Format ZIP

Metode ini dapat digunakan oleh pengguna yang belum memasang Git atau hanya ingin mendapatkan salinan source code.

**Langkah 1 — Buka repository GitHub**

Kunjungi:

https://github.com/Rizz-xx/mini-lms-submission

**Langkah 2 — Unduh file ZIP**

1. Klik tombol **Code** pada halaman repository.
2. Pilih **Download ZIP**.
3. Tunggu sampai proses pengunduhan selesai.

**Langkah 3 — Ekstrak file ZIP**

1. Buka folder tempat file ZIP tersimpan.
2. Klik kanan file ZIP.
3. Pilih **Extract All...**.
4. Tentukan lokasi untuk menyimpan hasil ekstraksi, kemudian selesaikan prosesnya.

**Langkah 4 — Buka folder hasil ekstraksi**

Masuk ke folder yang berisi source code PHP. Nama folder biasanya mengikuti nama repository dan dapat memiliki tambahan seperti `-main`.

Contoh:

```powershell
cd D:\mini-lms-submission-main
```

Sesuaikan perintah tersebut dengan lokasi dan nama folder yang sebenarnya.

**Langkah 5 — Periksa isi direktori**

```powershell
dir
```

Pastikan source code dan file pendukung aplikasi tersedia sebelum melanjutkan ke tahap berikutnya.

> **Perbedaan Git Clone dan ZIP:** Git Clone menyertakan direktori Git sehingga perubahan dapat dikelola dan dikirim kembali ke repository. ZIP hanya berisi salinan file proyek dan tidak menyertakan riwayat Git.

## 🚀 Instalasi dan Menjalankan Program

### 1. Buka Direktori Utama Proyek

Pastikan terminal berada di direktori utama proyek, yaitu folder yang berisi source code aplikasi PHP.

Contoh jika menggunakan Git Clone:

```powershell
cd D:\mini-lms-submission
```

Jika menggunakan ZIP, gunakan lokasi folder hasil ekstraksi.

### 2. Jalankan Server Lokal PHP

Jalankan server bawaan PHP menggunakan port `8000`:

```bash
php -S localhost:8000
```

Jika berhasil, server akan berjalan pada alamat:

http://localhost:8000

Biarkan terminal tetap terbuka selama proses pengujian.

> **Catatan:** Perintah tersebut merupakan cara menjalankan server bawaan PHP. Jika aplikasi menggunakan mekanisme routing khusus, sesuaikan perintah dengan implementasi proyek, misalnya dengan menggunakan file router PHP apabila memang tersedia.

### 3. Pastikan Server Dapat Diakses

Buka browser dan akses:

http://localhost:8000

Respons yang muncul bergantung pada struktur dan implementasi aplikasi. Jika browser menampilkan error atau endpoint tidak ditemukan, periksa kembali direktori aktif, file entry point, serta konfigurasi routing aplikasi.

## 📄 Kontrak API (*API Endpoints*)

Layanan ini menyediakan dua endpoint utama, yaitu endpoint untuk mengunggah file tugas dan endpoint untuk mengambil metadata file yang telah diunggah.

### 1. Unggah Tugas — `POST /api/submissions`

**Deskripsi:** Mengunggah file tugas, memvalidasi keberadaan assignment, dan menyimpan metadata file dalam format JSON.

- **Method:** `POST`
- **URL:** `http://localhost:8000/api/submissions`
- **Content-Type:** `multipart/form-data`

**Parameter request (Body → form-data):**

| Parameter | Tipe | Wajib | Keterangan |
|---|---|---|---|
| `assignmentId` | Text | Ya | ID tugas yang terdaftar, misalnya `asg-001`, `asg-002`, atau `asg-003`. |
| `studentId` | Text | Ya | ID mahasiswa atau siswa yang mengunggah tugas, misalnya `MHS-12345`. |
| `file` | File | Ya | File tugas yang akan diunggah, misalnya PDF, DOCX, atau gambar sesuai dukungan aplikasi. |

**Contoh respons sukses — `201 Created`:**

```json
{
  "success": true,
  "message": "Submission berhasil diunggah!",
  "data": {
    "fileId": "uuid-v4-generated",
    "assignmentId": "asg-001",
    "studentId": "MHS-12345",
    "originalFilename": "tugas.pdf",
    "storedFilename": "uuid-v4-generated.pdf",
    "path": "uploads/uuid-v4-generated.pdf",
    "size": 10240,
    "uploadedAt": "2026-10-15T12:00:00+00:00"
  }
}
```

Respons di atas hanya contoh. Nilai aktual, format identifier, dan pesan respons bergantung pada implementasi server.

### 2. Mengambil Metadata — `GET /api/submissions/{fileId}`

**Deskripsi:** Mengambil informasi atau metadata file yang sudah diunggah berdasarkan `fileId` unik.

- **Method:** `GET`
- **URL:** `http://localhost:8000/api/submissions/{fileId}`
- **Parameter URL:** `fileId`, yaitu identifier file yang diperoleh dari respons upload.

Ganti `{fileId}` dengan identifier file yang sebenarnya.

Contoh format URL:

```text
http://localhost:8000/api/submissions/uuid-v4-generated
```

**Respons sukses — `200 OK`:**

Server mengembalikan objek JSON berisi metadata file yang ditemukan.

Jika file atau metadata tidak ditemukan, server seharusnya memberikan respons error yang sesuai, misalnya `404 Not Found`, apabila perilaku tersebut telah diterapkan dalam kode.

## 🧪 Panduan Pengujian (*Testing Guide*)

Pengujian dilakukan menggunakan Postman. Pastikan server PHP sedang berjalan sebelum menguji endpoint.

### Skenario 1: Permintaan Valid (Upload Berhasil)

Tujuan: Memastikan server dapat menerima file, menyimpannya, dan menghasilkan metadata.

1. Buka Postman.
2. Pilih method **POST**.
3. Masukkan URL:

   `http://localhost:8000/api/submissions`

4. Buka tab **Body**, kemudian pilih **form-data**.
5. Tambahkan parameter berikut:
   - `assignmentId` — `asg-001` dengan tipe **Text**.
   - `studentId` — `MHS-12345` dengan tipe **Text**.
   - `file` — pilih file dari komputer dengan tipe **File**.
6. Klik **Send**.

**Hasil yang diharapkan:**

- Status HTTP `201 Created`.
- File tersimpan di folder `uploads/`.
- Metadata file tersimpan di folder `metadata/` dalam format JSON.
- Respons menampilkan informasi file yang berhasil diunggah.

Ambil tangkapan layar hasil pengujian sebagai **Bukti 1**.

### Skenario 2: Assignment Tidak Ditemukan

Tujuan: Memastikan server menolak unggahan jika ID tugas tidak terdaftar.

1. Gunakan endpoint upload yang sama.
2. Ubah `assignmentId` menjadi `asg-999`, dengan asumsi ID tersebut tidak terdaftar.
3. Pastikan `studentId` dan `file` sudah diisi dengan benar.
4. Klik **Send**.

**Hasil yang diharapkan:**

- Status HTTP `404 Not Found`.
- Respons berisi pesan bahwa assignment tidak ditemukan.
- File tidak disimpan sebagai submission yang berhasil.

Ambil tangkapan layar hasil pengujian sebagai **Bukti 2**.

### Skenario 3: Input Tidak Lengkap

Tujuan: Memastikan server memvalidasi parameter wajib sebelum memproses unggahan.

1. Gunakan endpoint upload yang sama.
2. Kosongkan salah satu parameter wajib, misalnya `studentId`, atau hapus parameter `file`.
3. Klik **Send**.

**Hasil yang diharapkan:**

- Status HTTP `400 Bad Request`.
- Respons berisi pesan bahwa input belum lengkap.
- Proses unggah tidak dilanjutkan.

Ambil tangkapan layar hasil pengujian sebagai **Bukti 3**.

> **Catatan pengujian:** Status dan pesan di atas merupakan hasil yang diharapkan berdasarkan kontrak API. Pastikan implementasi PHP menangani setiap skenario tersebut agar hasil aktual sesuai dengan dokumentasi.

## 🗂️ Penjelasan Teknis dan Penyimpanan

### 1. Identifier File

Setiap file yang diunggah menggunakan identifier unik berformat **UUID v4** untuk mengurangi risiko konflik nama file.

Identifier tersebut dapat digunakan sebagai `fileId` pada endpoint GET untuk mengambil metadata file yang sesuai.

### 2. Lokasi Penyimpanan File

Proyek menggunakan penyimpanan lokal berbasis folder.

- `uploads/` — menyimpan file tugas yang diunggah.
- `metadata/` — menyimpan metadata file dalam format JSON.

Gambaran struktur direktori:

```text
mini-lms-submission/
├── uploads/
├── metadata/
├── api/
├── README.md
└── ...
```

Struktur tersebut merupakan gambaran umum. Folder `api/` dan file lainnya hanya perlu ada jika memang digunakan oleh implementasi proyek.

### 3. Metadata File

Metadata berisi informasi mengenai file yang diunggah, seperti:

- Identifier file (`fileId`).
- ID tugas (`assignmentId`).
- ID mahasiswa atau siswa (`studentId`).
- Nama file asli (`originalFilename`).
- Nama file yang disimpan (`storedFilename`).
- Lokasi penyimpanan file (`path`).
- Ukuran file (`size`).
- Waktu unggah (`uploadedAt`).

Informasi tersebut disimpan dalam format JSON agar mudah dibaca dan diproses oleh aplikasi.

## ⚠️ Catatan Penting

- Pastikan folder `uploads/` dan `metadata/` tersedia serta memiliki izin tulis bagi proses PHP.
- Pastikan ID assignment yang digunakan dalam pengujian memang sesuai dengan data yang dikenali aplikasi.
- Jangan menganggap endpoint sudah berjalan hanya berdasarkan dokumentasi. Pastikan implementasi kode PHP dan konfigurasi routing sesuai dengan kontrak API.
- Jangan mengunggah file rahasia atau data pribadi saat melakukan pengujian.
- Contoh nama file, ID, ukuran file, waktu unggah, dan respons API pada dokumentasi ini hanya ilustrasi.

## 📌 Kesimpulan

Mini-LMS Submission/File Service merupakan prototipe layanan API untuk mengelola unggahan file tugas dan metadata secara lokal menggunakan PHP. Proyek ini mencakup proses unggah file, validasi input, penyimpanan metadata JSON, serta pengambilan metadata berdasarkan identifier file.

Melalui pembagian tugas anggota kelompok dan skenario pengujian yang telah ditentukan, setiap anggota dapat berkontribusi dalam pengembangan, dokumentasi, validasi, dan pengujian integrasi layanan.
