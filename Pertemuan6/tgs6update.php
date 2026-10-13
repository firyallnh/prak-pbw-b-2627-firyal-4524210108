
<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Akses tidak valid. Silakan edit data dari halaman utama.");
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
    die("Semua kolom wajib diisi.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Format email tidak valid.");
}

if (
    !filter_var($angkatan, FILTER_VALIDATE_INT) ||
    (int)$angkatan < 2000 ||
    (int)$angkatan > 2026
) {
    die("Angkatan harus antara 2000 sampai 2026.");
}

if (!is_numeric($ipk) || (float)$ipk < 0 || (float)$ipk > 4) {
    die("IPK harus berada di antara 0 sampai 4.");
}

$stmt = mysqli_prepare(
    $koneksi,
    "UPDATE mahasiswa
     SET nama = ?, email = ?, prodi = ?, angkatan = ?, ipk = ?
     WHERE nim = ?"
);

if (!$stmt) {
    die("Query gagal disiapkan: " . mysqli_error($koneksi));
}

mysqli_stmt_bind_param(
    $stmt,
    "ssssds",
    $nama,
    $email,
    $prodi,
    $angkatan,
    $ipk,
    $nim
);

if (!mysqli_stmt_execute($stmt)) {
    $error = mysqli_stmt_error($stmt);
    mysqli_stmt_close($stmt);
    die("Data gagal diperbarui: " . htmlspecialchars($error));
}

$jumlah_diubah = mysqli_stmt_affected_rows($stmt);
mysqli_stmt_close($stmt);

if ($jumlah_diubah > 0) {
    echo "<script>
        alert('Data mahasiswa berhasil diperbarui.');
        window.location.href = 'tgs6index.php';
    </script>";
    exit;
}

// Periksa apakah NIM memang ada jika tidak ada baris yang berubah.
$cek = mysqli_prepare(
    $koneksi,
    "SELECT nim FROM mahasiswa WHERE nim = ?"
);

mysqli_stmt_bind_param($cek, "s", $nim);
mysqli_stmt_execute($cek);
mysqli_stmt_store_result($cek);

if (mysqli_stmt_num_rows($cek) > 0) {
    mysqli_stmt_close($cek);

    echo "<script>
        alert('Data tetap sama karena tidak ada nilai yang berubah.');
        window.location.href = 'tgs6index.php';
    </script>";
} else {
    mysqli_stmt_close($cek);

    echo "<script>
        alert('Data mahasiswa tidak ditemukan. Periksa NIM.');
        window.location.href = 'tgs6index.php';
    </script>";
}

exit;
?>
