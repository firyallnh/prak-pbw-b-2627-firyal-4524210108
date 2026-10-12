<?php
include "koneksi.php";

if (isset($_POST['nim'])) {

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $prodi = $_POST['prodi'];
    $angkatan = $_POST['angkatan'];
    $ipk = $_POST['ipk'];

    $query = mysqli_query($koneksi, "INSERT INTO mahasiswa
    (nim, nama, email, prodi, angkatan, ipk)
    VALUES ('$nim', '$nama', '$email', '$prodi', '$angkatan', '$ipk')");

    if ($query) {
        echo "<h3>Data berhasil disimpan!</h3>";
        echo "NIM: " . htmlspecialchars($nim) . "<br>";
        echo "Nama: " . htmlspecialchars($nama) . "<br>";
        echo "Email: " . htmlspecialchars($email) . "<br>";
        echo "Program Studi: " . htmlspecialchars($prodi) . "<br>";
        echo "Angkatan: " . htmlspecialchars($angkatan) . "<br>";
        echo "IPK: " . htmlspecialchars($ipk);
    } else {
        echo "Data gagal disimpan: " . mysqli_error($koneksi);
    }

} else {
    echo "Silakan buka form dan isi data terlebih dahulu.";
}
?>