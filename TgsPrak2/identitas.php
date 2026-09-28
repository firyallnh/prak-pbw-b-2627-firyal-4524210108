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
    'prodi' => 'Teknik Informatika',
    'semester' => 5,
    'ipk' => 3.71,
    'status' => 'Aktif',
    'email' => 'firyalnh806@gmail.com'
];
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Biodata Mahasiswa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff8dc;
            padding: 40px;
        }

        .card {
            width: 400px;
            margin: auto;
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 5px 15px #eadbd2;
        }

        .header {
            background: #fff0a6;
            padding: 25px;
            text-align: center;
            border-bottom: 4px solid #f4b6c2;
        }

        .profile {
            width: 70px;
            height: 70px;
            margin: auto;
            background: #f4b6c2;
            color: #8b4a5c;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            font-weight: bold;
        }

        .header h1 {
            margin: 15px 0 5px;
            color: #8b4a5c;
        }

        .header p {
            margin: 0;
            color: #9b6b76;
        }

        .content {
            padding: 20px;
        }

        .data {
            display: grid;
            grid-template-columns: 80px 15px 1fr;
            padding: 10px;
            margin-bottom: 8px;
            background: #fff8e1;
            border-radius: 8px;
        }

        .label {
            color: #8b4a5c;
            font-weight: bold;
        }

        .predikat {
            margin-top: 15px;
            padding: 12px;
            text-align: center;
            background: #f4b6c2;
            color: #6f3b49;
            border-radius: 8px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="card">

        <div class="header">

            <div class="profile">F</div>

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