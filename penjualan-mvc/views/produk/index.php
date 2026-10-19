<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fcecef;
            color: #663344;
            padding: 25px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #d99aaf;
            padding: 10px;
            text-align: center;
        }

        th {
            background: #f6aece;
        }

        a, button {
            display: inline-block;
            padding: 8px 12px;
            background: #663344;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .tombol-hapus {
            background: #b33a52;
        }

        .pesan {
            padding: 10px;
            background: #fff0bd;
            border-radius: 5px;
            transition: opacity 0.5s ease;
            opacity: 1;
        }
    </style>
</head>
<body>

    <h2>Data Produk</h2>

    <?php
    $status = $_GET['status'] ?? '';

    $pesan = [
        'tambah' => 'Produk berhasil ditambahkan!',
        'ubah' => 'Data produk berhasil diperbarui!',
        'hapus' => 'Produk berhasil dihapus!',
        'gagal' => 'Data gagal diproses. Periksa kembali input Anda.',
        'tidak_ditemukan' => 'Produk tidak ditemukan.'
    ];

    if (isset($pesan[$status])) {
        echo '<p class="pesan" id="notifikasi">'
            . htmlspecialchars($pesan[$status])
            . '</p>';
    }
    ?>

    <a href="index.php?action=create">+ Tambah Produk</a>

    <table>
        <tr>
            <th>No.</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php $no = 1; ?>

        <?php while ($produk = mysqli_fetch_assoc($dataProduk)) { ?>
            <tr>
                <td><?= $no++; ?></td>

                <td>
                    <?= htmlspecialchars($produk['nama_produk']); ?>
                </td>

                <td>
                    Rp <?= number_format(
                        (float) $produk['harga'],
                        0,
                        ',',
                        '.'
                    ); ?>
                </td>

                <td><?= (int) $produk['stok']; ?></td>

                <td>
                    <a href="index.php?action=edit&id=<?= (int) $produk['id']; ?>">
                        Edit
                    </a>

                    <form
                        action="index.php?action=delete"
                        method="POST"
                        style="display: inline;"
                        onsubmit="return confirm('Yakin ingin menghapus produk ini?');"
                    >
                        <input
                            type="hidden"
                            name="id"
                            value="<?= (int) $produk['id']; ?>"
                        >

                        <button type="submit" class="tombol-hapus">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        <?php } ?>

    </table>

    <script>
        const notifikasi = document.getElementById('notifikasi');

        if (notifikasi) {
            setTimeout(function() {
                notifikasi.style.opacity = '0';

                setTimeout(function() {
                    notifikasi.remove();
                }, 500);

            }, 3000);
        }
    </script>

</body>
</html>