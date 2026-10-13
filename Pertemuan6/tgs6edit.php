
<?php
include "koneksi.php";

$nim = trim($_GET['nim'] ?? '');

if ($nim === '') {
    die("NIM tidak ditemukan. Silakan kembali ke halaman data mahasiswa.");
}

$stmt = mysqli_prepare(
    $koneksi,
    "SELECT nim, nama, email, prodi, angkatan, ipk
     FROM mahasiswa
     WHERE nim = ?"
);

if (!$stmt) {
    die("Query gagal: " . mysqli_error($koneksi));
}

mysqli_stmt_bind_param($stmt, "s", $nim);

if (!mysqli_stmt_execute($stmt)) {
    die("Gagal mengambil data: " . mysqli_stmt_error($stmt));
}

mysqli_stmt_bind_result(
    $stmt,
    $data_nim,
    $data_nama,
    $data_email,
    $data_prodi,
    $data_angkatan,
    $data_ipk
);

if (!mysqli_stmt_fetch($stmt)) {
    mysqli_stmt_close($stmt);
    die("Data mahasiswa tidak ditemukan.");
}

mysqli_stmt_close($stmt);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Ubah Data Mahasiswa</title>
</head>

<body class="bg-pink-50 p-6 font-sans text-[#663344]">

    <div class="max-w-md mx-auto bg-white p-6 rounded-xl shadow-md">

        <h2 class="text-2xl font-bold mb-6 text-center">
            Ubah Data Mahasiswa
        </h2>

        <form action="tgs6update.php" method="POST" class="flex flex-col">

            <label for="nim" class="text-sm font-semibold mb-1">NIM:</label>
            <input
                type="text"
                id="nim"
                name="nim"
                value="<?= htmlspecialchars((string)$data_nim); ?>"
                readonly
                required
                class="w-full mb-4 p-2 border border-pink-200 rounded-lg bg-gray-100"
            >

            <label for="nama" class="text-sm font-semibold mb-1">Nama:</label>
            <input
                type="text"
                id="nama"
                name="nama"
                value="<?= htmlspecialchars((string)$data_nama); ?>"
                required
                class="w-full mb-4 p-2 border border-pink-200 rounded-lg"
            >

            <label for="email" class="text-sm font-semibold mb-1">Email:</label>
            <input
                type="email"
                id="email"
                name="email"
                value="<?= htmlspecialchars((string)$data_email); ?>"
                required
                class="w-full mb-4 p-2 border border-pink-200 rounded-lg"
            >

            <label for="prodi" class="text-sm font-semibold mb-1">Prodi:</label>
            <input
                type="text"
                id="prodi"
                name="prodi"
                value="<?= htmlspecialchars((string)$data_prodi); ?>"
                required
                class="w-full mb-4 p-2 border border-pink-200 rounded-lg"
            >

            <label for="angkatan" class="text-sm font-semibold mb-1">Angkatan:</label>
            <input
                type="number"
                id="angkatan"
                name="angkatan"
                value="<?= htmlspecialchars((string)$data_angkatan); ?>"
                min="2000"
                max="2026"
                required
                class="w-full mb-4 p-2 border border-pink-200 rounded-lg"
            >

            <label for="ipk" class="text-sm font-semibold mb-1">IPK:</label>
            <input
                type="number"
                id="ipk"
                name="ipk"
                value="<?= htmlspecialchars((string)$data_ipk); ?>"
                min="0"
                max="4"
                step="0.01"
                required
                class="w-full mb-6 p-2 border border-pink-200 rounded-lg"
            >

            <button
                type="submit"
                class="block w-full bg-[#663344] hover:bg-[#512638] text-white font-bold py-3 rounded-lg cursor-pointer">
                Simpan Perubahan
            </button>

            <a href="tgs6index.php"
                class="block text-center mt-4 hover:underline">
                Kembali ke Data Mahasiswa
            </a>

        </form>

    </div>

</body>
</html>
