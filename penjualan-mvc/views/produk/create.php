<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fcecef;
            color: #663344;
            padding: 25px;
        }

        form {
            max-width: 450px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border: 1px solid #d99aaf;
            border-radius: 8px;
        }

        label {
            display: block;
            margin-top: 12px;
        }

        input {
            width: 100%;
            box-sizing: border-box;
            padding: 10px;
            margin-top: 5px;
        }

        button, a {
            display: inline-block;
            margin-top: 18px;
            padding: 10px 14px;
            background: #663344;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h2>Tambah Produk</h2>

    <?php if (($_GET['status'] ?? '') === 'gagal') { ?>
        <p>Input tidak valid. Silakan periksa kembali data produk.</p>
    <?php } ?>

    <form action="index.php?action=store" method="POST">

        <label>Nama Produk</label>
        <input
            type="text"
            name="nama_produk"
            maxlength="100"
            required
        >

        <label>Harga (Rp)</label>
        <input
            type="number"
            name="harga"
            min="0"
            step="0.01"
            required
        >

        <label>Stok</label>
        <input
            type="number"
            name="stok"
            min="0"
            step="1"
            required
        >

        <button type="submit">Simpan Produk</button>
        <a href="index.php">Kembali</a>

    </form>

</body>
</html>