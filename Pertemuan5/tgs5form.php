<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Mahasiswa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe6ee;
            margin: 0;
            padding: 25px;
            color: #663344;
        }

        .container {
            width: 400px;
            max-width: 100%;
            margin: auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
            color: #d96b91;
        }

        p {
            text-align: center;
            font-size: 14px;
        }

        label {
            display: block;
            margin-top: 12px;
            margin-bottom: 5px;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 9px;
            border: 1px solid #f2c5d2;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #fff0bd;
            color: #664b50;
            border: 1px solid #f5dfa0;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #ffe7a1;
        }

        .footer {
            text-align: center;
            margin-top: 15px;
            font-size: 12px;
            color: #cc91a5;
        }
    </style>
</head>

<body>

    <div class="container">

        <h2>Form Data Mahasiswa</h2>
        <p>Silakan isi data mahasiswa dengan lengkap.</p>

        <form action="simpan.php" method="POST">

            <label for="nim">NIM</label>
            <input type="text" id="nim" name="nim"
                   placeholder="Masukkan NIM" required>

            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama"
                   placeholder="Masukkan nama lengkap" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email"
                   placeholder="contoh@email.com" required>

            <label for="prodi">Program Studi</label>
            <input type="text" id="prodi" name="prodi"
                   placeholder="Masukkan program studi" required>

            <label for="angkatan">Angkatan</label>
            <input type="number" id="angkatan" name="angkatan"
                   min="2000" max="2026"
                   placeholder="Contoh: 2024" required>

            <label for="ipk">IPK</label>
            <input type="number" id="ipk" name="ipk"
                   min="0" max="4" step="0.01"
                   placeholder="Contoh: 3.75" required>

            <button type="submit">Simpan Data</button>

        </form>

        <div class="footer">
            Formulir Pendataan Mahasiswa
        </div>

    </div>

</body>
</html>