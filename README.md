# Tugas CRUD ERP MRP

Versi pengembangan dari project CRUD Data Mahasiswa sebelumnya. Struktur dasar
(PHP + PDO + MySQL + JS Fetch API) dipertahankan agar tetap mudah dijalankan di
XAMPP/Laragon, namun ditambah sejumlah fitur agar lebih lengkap dan lebih aman.

## 1. Apa yang Baru Dibanding Versi Sebelumnya

| Kategori | Penambahan |
|---|---|
| **Autentikasi** | Login admin (session, bcrypt), proteksi seluruh halaman & API, rate limit percobaan login |
| **Keamanan** | CSRF token di setiap request non-GET, rate limiting sederhana, validasi input lebih ketat (regex NBI/HP/angkatan), `.htaccess` anti-eksekusi script di folder upload |
| **Data** | Kolom baru: `angkatan`, `alamat`, `foto` (upload gambar profil) + tabel `users` |
| **Tampilan Data** | Pagination server-side, sorting per kolom (klik header), filter jurusan (dropdown), pencarian dengan debounce |
| **Dashboard** | Kartu ringkasan: total mahasiswa, jumlah jurusan, posisi halaman |
| **Export** | Export data (sesuai hasil pencarian/filter aktif) ke CSV |
| **UX** | Notifikasi toast (bukan `alert()`), modal konfirmasi hapus (bukan `confirm()`), dark mode (tersimpan di localStorage), preview foto sebelum upload |
| **Upload Foto** | Validasi tipe MIME asli file & ukuran maks 2MB, nama file di-random agar tidak bentrok, opsi hapus foto lama |

Struktur tabel `mahasiswa` lama tetap kompatibel — kolom baru bersifat nullable,
jadi data lama dari versi sebelumnya tidak akan rusak jika Anda meng-import ulang
dari `database/crud_mahasiswa.sql` (disarankan install baru/database baru).
