CREATE DATABASE IF NOT EXISTS crud_mahasiswa
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE crud_mahasiswa;

-- =========================================================
-- Tabel data mahasiswa
-- =========================================================
CREATE TABLE IF NOT EXISTS mahasiswa (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nbi VARCHAR(30) NOT NULL UNIQUE,
    nama VARCHAR(100) NOT NULL,
    jurusan VARCHAR(100) NOT NULL,
    angkatan SMALLINT UNSIGNED NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    no_hp VARCHAR(20) NULL,
    alamat VARCHAR(255) NULL,
    foto VARCHAR(255) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_jurusan (jurusan),
    INDEX idx_angkatan (angkatan)
);

INSERT INTO mahasiswa (nbi, nama, jurusan, angkatan, email, no_hp, alamat) VALUES
('1462400001', 'Contoh Mahasiswa 1', 'Teknik Informatika', 2024, 'mahasiswa1@example.com', '081234567890', 'Surabaya'),
('1462400002', 'Contoh Mahasiswa 2', 'Teknik Informatika', 2024, 'mahasiswa2@example.com', '081234567891', 'Surabaya'),
('1462400003', 'Contoh Mahasiswa 3', 'Sistem Informasi', 2023, 'mahasiswa3@example.com', '081234567892', 'Sidoarjo');

-- =========================================================
-- Tabel pengguna (admin) untuk fitur login
-- =========================================================
CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Akun default: username "admin", password "admin123"
-- Hash bcrypt di bawah ini kompatibel dengan password_verify() PHP.
-- SEGERA GANTI password ini setelah login pertama kali (lihat README bagian Keamanan).
INSERT INTO users (username, password) VALUES
('admin', '$2b$10$Fp.e5HbN1VDQVtoIbp/pd.dCKjaiC8tjDmxa8hXvpcHACEnPU3NNy');
