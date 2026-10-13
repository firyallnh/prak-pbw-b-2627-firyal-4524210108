
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Tambah Mahasiswa</title>
</head>
<body class="bg-pink-50 p-6 font-sans text-[#663344]">

    <form action="tgs6store.php" method="POST"
        class="max-w-md mx-auto bg-white p-6 rounded-xl shadow-md flex flex-col">

        <h2 class="text-2xl font-bold mb-6 text-center">
            Tambah Mahasiswa
        </h2>

        <label for="nim" class="text-sm font-semibold mb-1">NIM:</label>
        <input type="text" id="nim" name="nim" required
            class="mb-4 p-2 border border-pink-200 rounded-lg">

        <label for="nama" class="text-sm font-semibold mb-1">Nama:</label>
        <input type="text" id="nama" name="nama" required
            class="mb-4 p-2 border border-pink-200 rounded-lg">

        <label for="email" class="text-sm font-semibold mb-1">Email:</label>
        <input type="email" id="email" name="email" required
            class="mb-4 p-2 border border-pink-200 rounded-lg">

        <label for="prodi" class="text-sm font-semibold mb-1">Prodi:</label>
        <input type="text" id="prodi" name="prodi" required
            class="mb-4 p-2 border border-pink-200 rounded-lg">

        <label for="angkatan" class="text-sm font-semibold mb-1">Angkatan:</label>
        <input type="number" id="angkatan" name="angkatan"
            min="2000" max="2026" required
            class="mb-4 p-2 border border-pink-200 rounded-lg">

        <label for="ipk" class="text-sm font-semibold mb-1">IPK:</label>
        <input type="number" id="ipk" name="ipk"
            min="0" max="4" step="0.01" required
            class="mb-6 p-2 border border-pink-200 rounded-lg">

        <button type="submit"
            class="bg-[#663344] hover:bg-[#512638] text-white font-bold py-2 rounded-lg">
            Simpan Data
        </button>

        <a href="tgs6index.php"
            class="text-center mt-4 text-[#663344] hover:underline">
            Kembali ke Data Mahasiswa
        </a>
    </form>

</body>
</html>
