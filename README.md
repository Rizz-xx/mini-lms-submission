# Mini-LMS: Submission/File Service Prototype (PHP)

Prototipe layanan penyimpanan tugas (_Submission/File Service_) yang dikembangkan sebagai bagian dari sistem **Mini-LMS**. Layanan ini dibangun menggunakan **PHP** murni, dengan penyimpanan file secara lokal berbasis folder dan metadata dalam format JSON.

## 👥 Anggota Kelompok dan Kontribusi

1. **Muh. Dimas Januardi Nur** (NIM: `230209501007`) — Pengujian sistem berdasarkan skenario dan penyusunan dokumentasi.
2. **Andini Sri Rahayu** (NIM: `230209501026`) — Implementasi endpoint `GET` (metadata) dan perancangan struktur folder.
3. **Muh. Ridzwan** (NIM: `240209501095`) — Perancangan kontrak API dan implementasi endpoint `POST` (upload).
4. **Faqih Ahmad** (NIM: `240209501111`) — Validasi input, penanganan error, dan pengujian integrasi API.

## ⚙️ Prasyarat Sistem

Sebelum menjalankan aplikasi, pastikan komputer telah memiliki:

- **PHP 7.4 atau lebih baru**, dan perintah `php` sudah dapat dijalankan melalui terminal atau Command Prompt.
- **Postman** atau alat pengujian API sejenis.

## 🚀 Instalasi dan Menjalankan Program

### 1. Buka Direktori Proyek

Buka terminal atau Command Prompt, lalu masuk ke direktori proyek:

```bash
cd mini-lms-submission-php
```

### 2. Jalankan Server Lokal PHP

Jalankan server bawaan PHP pada port `8000`:

```bash
php -S localhost:8000
```

Jika berhasil, server akan berjalan dan dapat diakses melalui `http://localhost:8000`. Biarkan terminal tetap terbuka selama pengujian.

> Pastikan perintah dijalankan dari direktori yang sesuai dengan struktur proyek. Jika routing API memerlukan konfigurasi khusus, jalankan server sesuai implementasi proyek.

## 📄 Kontrak API (_API Endpoints_)

### 1. Unggah Tugas — `POST /api/submissions`

**Deskripsi:** Mengunggah file tugas, memvalidasi keberadaan assignment, dan menyimpan metadata ke dalam file JSON.

- **Method:** `POST`
- **URL:** `http://localhost:8000/api/submissions`
- **Content-Type:** `multipart/form-data`

**Parameter request (Body → form-data):**

| Parameter      | Tipe | Wajib | Keterangan                                                              |
| -------------- | ---- | ----- | ----------------------------------------------------------------------- |
| `assignmentId` | Text | Ya    | ID tugas yang terdaftar, misalnya `asg-001`, `asg-002`, atau `asg-003`. |
| `studentId`    | Text | Ya    | ID mahasiswa/siswa pengunggah, misalnya `MHS-12345`.                    |
| `file`         | File | Ya    | File tugas yang akan diunggah, misalnya PDF, DOCX, atau gambar.         |

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

Nilai pada respons di atas hanya contoh. Nilai aktual bergantung pada file yang diunggah dan implementasi server.

### 2. Ambil Metadata Tugas — `GET /api/submissions/{fileId}`

**Deskripsi:** Mengambil informasi atau metadata file yang sudah diunggah berdasarkan `fileId` unik.

- **Method:** `GET`
- **URL:** `http://localhost:8000/api/submissions/{fileId}`
- **Parameter URL:** `fileId` — UUID unik yang diperoleh dari respons upload.

Ganti `{fileId}` dengan ID file yang sebenarnya.

**Respons sukses — `200 OK`:** Server mengembalikan objek JSON berisi metadata file tersebut.

## 🧪 Panduan Pengujian (_Testing Guide_)

Pengujian dilakukan menggunakan Postman. Pastikan server lokal PHP sedang berjalan sebelum mencoba skenario berikut.

### Skenario 1: Permintaan Valid (Upload Berhasil)

1. Pilih method **POST** dan masukkan URL `http://localhost:8000/api/submissions`.
2. Buka tab **Body**, lalu pilih **form-data**.
3. Tambahkan field berikut:
   - `assignmentId` — `asg-001` (Text).
   - `studentId` — `MHS-12345` (Text).
   - `file` — pilih file dari komputer (File).
4. Klik **Send**.
5. **Hasil yang diharapkan:** Status HTTP `201 Created`, file tersimpan di folder `uploads/`, dan metadata tersimpan di folder `metadata/`.

   Ambil tangkapan layar sebagai **Bukti 1**.

### Skenario 2: Assignment Tidak Ditemukan

1. Ubah nilai `assignmentId` menjadi `asg-999`, yaitu ID yang tidak terdaftar di sistem.
2. Pastikan `studentId` dan `file` sudah diisi dengan benar.
3. Klik **Send**.
4. **Hasil yang diharapkan:** Status HTTP `404 Not Found` dengan pesan bahwa assignment tidak ditemukan.

   Ambil tangkapan layar sebagai **Bukti 2**.

### Skenario 3: Input Tidak Lengkap

1. Gunakan kembali endpoint upload.
2. Kosongkan salah satu parameter wajib, misalnya `studentId`, atau jangan sertakan file.
3. Klik **Send**.
4. **Hasil yang diharapkan:** Status HTTP `400 Bad Request` dengan pesan bahwa input belum lengkap.

   Ambil tangkapan layar sebagai **Bukti 3**.

> **Catatan:** Status dan pesan di atas merupakan hasil yang diharapkan berdasarkan kontrak API. Pastikan implementasi PHP menangani setiap skenario tersebut agar hasil pengujian sesuai.

## 🗂️ Penjelasan Teknis dan Penyimpanan

### Identifier File

Setiap file yang diunggah mendapatkan identifier unik berformat **UUID v4** untuk mengurangi risiko konflik atau duplikasi nama file di server.

### Lokasi Penyimpanan Internal

- `uploads/` — menyimpan file tugas yang diunggah.
- `metadata/` — menyimpan metadata file dalam format JSON.

Gambaran struktur direktori:

```text
mini-lms-submission-php/
├── uploads/       # File tugas yang diunggah
├── metadata/      # Metadata dalam format JSON
└── ...
```

Struktur tersebut merupakan gambaran umum dan dapat disesuaikan dengan implementasi proyek yang sebenarnya.
