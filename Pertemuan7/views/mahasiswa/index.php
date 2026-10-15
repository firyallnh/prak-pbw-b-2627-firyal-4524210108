<h2>Data Mahasiswa</h2>
<table border="8" bordercolor="f6aece" cellpadding="10">
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Prodi</th>
        <th>Angkatan</th>
        <th>IPK</th>
    </tr>

    <?php while ($mhs = mysqli_fetch_assoc ($dataMahasiswa)) { ?>
    <tr>
        <td><?= $mhs['nim']; ?></td>
        <td><?= $mhs['nama']; ?></td>
        <td><?= $mhs['email']; ?></td>
        <td><?= $mhs['prodi']; ?></td>
        <td><?= $mhs['angkatan']; ?></td>
        <td><?= $mhs['ipk']; ?></td>
    </tr>

    <?php } ?>
</table>