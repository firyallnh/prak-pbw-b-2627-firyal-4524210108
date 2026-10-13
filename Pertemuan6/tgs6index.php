
<?php
include "koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");

if (!$query) {
    die("Gagal mengambil data: " . mysqli_error($koneksi));
}

$jumlah = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Data Mahasiswa</title>
</head>
<body class="bg-pink-50 p-6 font-sans text-[#663344]">

    <div class="max-w-6xl mx-auto bg-white p-6 rounded-xl shadow-md">

        <h2 class="text-2xl font-bold mb-2">Data Mahasiswa</h2>

        <p class="mb-5 text-sm text-gray-600">
            Jumlah mahasiswa terdaftar:
            <span class="font-bold text-[#663344]">
                <?= $jumlah; ?> mahasiswa
            </span>
        </p>

        <a href="tgs6create.php"
            class="inline-block bg-[#663344] hover:bg-[#512638] text-white font-semibold px-4 py-2 rounded-lg mb-5">
            + Tambah Mahasiswa
        </a>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-pink-200 text-left">
                <thead class="bg-pink-100">
                    <tr>
                        <th class="border border-pink-200 p-3">NIM</th>
                        <th class="border border-pink-200 p-3">Nama</th>
                        <th class="border border-pink-200 p-3">Email</th>
                        <th class="border border-pink-200 p-3">Prodi</th>
                        <th class="border border-pink-200 p-3">Angkatan</th>
                        <th class="border border-pink-200 p-3">IPK</th>
                        <th class="border border-pink-200 p-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if ($jumlah > 0) { ?>
                        <?php while ($data = mysqli_fetch_assoc($query)) { ?>
                            <tr class="hover:bg-pink-50">
                                <td class="border border-pink-200 p-3">
                                    <?= htmlspecialchars($data['nim']); ?>
                                </td>
                                <td class="border border-pink-200 p-3">
                                    <?= htmlspecialchars($data['nama']); ?>
                                </td>
                                <td class="border border-pink-200 p-3">
                                    <?= htmlspecialchars($data['email']); ?>
                                </td>
                                <td class="border border-pink-200 p-3">
                                    <?= htmlspecialchars($data['prodi']); ?>
                                </td>
                                <td class="border border-pink-200 p-3">
                                    <?= htmlspecialchars($data['angkatan']); ?>
                                </td>
                                <td class="border border-pink-200 p-3">
                                    <?= htmlspecialchars($data['ipk']); ?>
                                </td>
                                <td class="border border-pink-200 p-3 text-center whitespace-nowrap">
                                    <a href="tgs6edit.php?nim=<?= urlencode($data['nim']); ?>"
                                        class="text-blue-600 hover:underline font-medium">
                                        Edit
                                    </a>

                                    <span class="mx-1">|</span>

                                    <a href="tgs6delete.php?nim=<?= urlencode($data['nim']); ?>"
                                        onclick="return confirm('Yakin ingin menghapus data mahasiswa ini?')"
                                        class="text-red-600 hover:underline font-medium">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="7"
                                class="border border-pink-200 p-5 text-center text-gray-500">
                                Belum ada data mahasiswa.
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>
