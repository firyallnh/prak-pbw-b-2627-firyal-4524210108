
<?php
include "koneksi.php";

$nim = trim($_GET['nim'] ?? '');

if ($nim === '') {
    echo "<script>
        alert('NIM tidak ditemukan.');
        window.location.href = 'tgs6index.php';
    </script>";
    exit;
}

$stmt = mysqli_prepare(
    $koneksi,
    "DELETE FROM mahasiswa WHERE nim = ?"
);

if (!$stmt) {
    die("Query gagal disiapkan: " . mysqli_error($koneksi));
}

mysqli_stmt_bind_param($stmt, "s", $nim);

if (mysqli_stmt_execute($stmt)) {
    $jumlah_dihapus = mysqli_stmt_affected_rows($stmt);
    mysqli_stmt_close($stmt);

    if ($jumlah_dihapus > 0) {
        echo "<script>
            alert('Data mahasiswa berhasil dihapus.');
            window.location.href = 'tgs6index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data mahasiswa tidak ditemukan.');
            window.location.href = 'tgs6index.php';
        </script>";
    }

    exit;
}

$error = mysqli_stmt_error($stmt);
mysqli_stmt_close($stmt);

die("Data gagal dihapus: " . htmlspecialchars($error));
?>
