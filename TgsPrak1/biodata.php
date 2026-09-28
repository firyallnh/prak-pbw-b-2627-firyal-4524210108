<?php
function statusKelulusan(float $ipk): string
{
    if ($ipk >= 3.50) return 'Sangat Memuaskan';
    if ($ipk >= 3.00) return 'Memuaskan';
    return 'Perlu Peningkatan';
}

$mahasiswa = [
    'nim' => '4524210108',
    'nama' => 'Firyal Nibras Hariyadi',
    'prodi' => 'S1 Teknik Informatika',
    'semester' => 5,
    'ipk' => 3.71,
    'status' => 'Aktif'
];
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Biodata Mahasiswa</title>

    <style>
        body {
            font-family: Arial;
            background: #f8dfe7;
            padding: 40px;
        }

        .card {
            width: 400px;
            margin: auto;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px #d5a6b5;
        }

        .header {
            background: #800f2f;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
        }

        .header p {
            margin-bottom: 0;
        }

        .content {
            padding: 20px;
        }

        .data {
            display: grid;
            grid-template-columns: 80px 15px 1fr;
            padding: 10px;
            margin-bottom: 8px;
            background: #f8dfe7;
            border-radius: 8px;
        }

        .label {
            color: #800f2f;
            font-weight: bold;
        }

        .predikat {
            margin-top: 15px;
            padding: 12px;
            text-align: center;
            background: #800f2f;
            color: white;
            border-radius: 8px;
        }
    </style>
</head>

<body>

    <div class="card">

        <div class="header">
            <h1>Biodata Mahasiswa</h1>
            <p>Data Mahasiswa</p>
        </div>

        <div class="content">

            <?php foreach ($mahasiswa as $kunci => $nilai): ?>
                <div class="data">
                    <span class="label"><?= ucfirst($kunci) ?></span>
                    <span>:</span>
                    <span><?= htmlspecialchars((string)$nilai) ?></span>
                </div>
            <?php endforeach; ?>

            <div class="predikat">
                Predikat IPK:
                <?= statusKelulusan($mahasiswa['ipk']) ?>
            </div>

        </div>

    </div>

</body>

</html>