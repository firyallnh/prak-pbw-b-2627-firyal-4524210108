<?php 
require_once 'koneksi.php'; 

$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS akademik"; 
 
if (mysqli_query($koneksi, $sqlCreateDB)) { 
    echo "Database berhasil dibuat atau sudah ada.\n"; 
} else { 
    echo "Error membuat db: " . mysqli_error($koneksi) . "\n"; 
} 
 
mysqli_set_charset($koneksi, 'utf8mb4'); 
mysqli_select_db($koneksi, 'akademik'); 
 
$sqlCreateTables = [ 

    "CREATE TABLE IF NOT EXISTS mahasiswa ( 
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        nim VARCHAR(15) NOT NULL UNIQUE, 
        nama VARCHAR(100) NOT NULL, 
        email VARCHAR(120) NOT NULL UNIQUE, 
        prodi VARCHAR(80) NOT NULL, 
        angkatan YEAR NOT NULL, 
        ipk DECIMAL(3,2) DEFAULT 0.00 
    ) ENGINE=InnoDB", 

    "CREATE TABLE IF NOT EXISTS dosen ( 
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        nidn VARCHAR(20) NOT NULL UNIQUE, 
        nama VARCHAR(100) NOT NULL, 
        email VARCHAR(100) NOT NULL UNIQUE 
    ) ENGINE=InnoDB", 

    "CREATE TABLE IF NOT EXISTS mata_kuliah ( 
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        kode_mk VARCHAR(12) NOT NULL UNIQUE, 
        nama_mk VARCHAR(100) NOT NULL, 
        sks TINYINT UNSIGNED NOT NULL, 
        dosen_id BIGINT UNSIGNED, 
        CONSTRAINT fk_mk_dosen 
        FOREIGN KEY (dosen_id) REFERENCES dosen(id) 
        ON UPDATE CASCADE 
        ON DELETE SET NULL 
    ) ENGINE=InnoDB", 

    "CREATE TABLE IF NOT EXISTS krs ( 
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        mahasiswa_id BIGINT UNSIGNED NOT NULL, 
        semester TINYINT UNSIGNED NOT NULL, 
        tahun_ajaran VARCHAR(9) NOT NULL, 
        CONSTRAINT uq_krs UNIQUE (mahasiswa_id, semester, tahun_ajaran), 
        CONSTRAINT fk_krs_mahasiswa 
        FOREIGN KEY (mahasiswa_id) 
        REFERENCES mahasiswa(id) 
        ON UPDATE CASCADE 
        ON DELETE CASCADE 
    ) ENGINE=InnoDB", 

    "CREATE TABLE IF NOT EXISTS mk_krs ( 
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        krs_id BIGINT UNSIGNED NOT NULL, 
        mata_kuliah_id BIGINT UNSIGNED NOT NULL, 
        CONSTRAINT fk_mkkrs_krs 
        FOREIGN KEY (krs_id) REFERENCES krs(id) 
        ON UPDATE CASCADE 
        ON DELETE CASCADE, 
        CONSTRAINT fk_mkkrs_mk 
        FOREIGN KEY (mata_kuliah_id) 
        REFERENCES mata_kuliah(id) 
        ON UPDATE CASCADE 
        ON DELETE CASCADE 
    ) ENGINE=InnoDB" 
]; 
 
foreach ($sqlCreateTables as $query) { 
    if (mysqli_query($koneksi, $query)) { 
        echo "Tabel berhasil dibuat atau sudah ada.\n"; 
    } else { 
        echo "Gagal membuat tabel: " 
        . mysqli_error($koneksi) . "\n"; 
    } 
}

// Modifikasi 1: menambahkan kolom no_hp

$sqlAlter1 = "ALTER TABLE mahasiswa 
              ADD COLUMN no_hp VARCHAR(15) AFTER email";

if (mysqli_query($koneksi, $sqlAlter1)) {
    echo "Kolom no_hp berhasil ditambahkan.\n";
} else {
    echo "Gagal menambahkan kolom no_hp: " 
    . mysqli_error($koneksi) . "\n";
}


// Modifikasi 2: menambahkan kolom alamat

$sqlAlter2 = "ALTER TABLE mahasiswa 
              ADD COLUMN alamat VARCHAR(200) AFTER no_hp";

if (mysqli_query($koneksi, $sqlAlter2)) {
    echo "Kolom alamat berhasil ditambahkan.\n";
} else {
    echo "Gagal menambahkan kolom alamat: " 
    . mysqli_error($koneksi) . "\n";
}


mysqli_close($koneksi); 
?>