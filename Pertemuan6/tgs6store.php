
<?php
include "koneksi.php";

function kembali($pesan) {
    echo "<script>
        alert(" . json_encode($pesan) . ");
        window.location.href = 'tgs6create.php';
    </script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    kembali("Silakan isi form terlebih dahulu.");
}

$nim = trim($_POST['nim'] ?? '');
$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$prodi = trim($_POST['prodi'] ?? '');
$angkatan = trim($_POST['angkatan'] ?? '');
$ipk = trim($_POST['ipk'] ?? '');

if (
    $nim === '' || $nama === '' || $email === '' ||
    $prodi === '' || $angkatan === '' || $ipk === ''
) {
    kembali("Semua kolom wajib diisi.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    kembali("Format email tidak valid.");
}

if (
    !filter_var($angkatan, FILTER_VALIDATE_INT) ||
    (int)$angkatan < 2000 ||
    (int)$angkatan > 2026
) {
    kembali("Angkatan harus antara 2000 sampai 2026.");
}

if (!is_numeric($ipk) || (float)$ipk < 0 || (float)$ipk > 4) {
    kembali("IPK harus berada di antara 0 sampai 4.");
}

$stmt = mysqli_prepare(
    $koneksi,
    "INSERT INTO mahasiswa (nim, nama, email, prodi, angkatan, ipk)
     VALUES (?, ?, ?, ?, ?, ?)"
);

if (!$stmt) {
    kembali("Query gagal disiapkan.");
}

mysqli_stmt_bind_param(
    $stmt,
    "sssssd",
    $nim,
    $nama,
    $email,
    $prodi,
    $angkatan,
    $ipk
);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);

    echo "<script>
        alert('Data mahasiswa berhasil disimpan.');
        window.location.href = 'tgs6index.php';
    </script>";
    exit;
}

if (mysqli_stmt_errno($stmt) === 1062) {
    mysqli_stmt_close($stmt);
    kembali("NIM sudah terdaftar. Gunakan NIM lain.");
}

mysqli_stmt_close($stmt);
kembali("Data gagal disimpan. Periksa kembali data yang dimasukkan.");
?>
