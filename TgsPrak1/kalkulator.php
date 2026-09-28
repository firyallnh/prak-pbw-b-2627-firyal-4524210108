<?php
$hasil = null;
$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $a = (float) ($_POST['a'] ?? 0);
    $b = (float) ($_POST['b'] ?? 0);
    $operator = $_POST['operator'] ?? '+';

    switch ($operator) {
        case '+':
            $hasil = $a + $b;
            break;

        case '-':
            $hasil = $a - $b;
            break;

        case '*':
            $hasil = $a * $b;
            break;

        case '/':
            if ($b == 0) {
                $pesan = 'Tidak bisa dibagi dengan 0.';
            } else {
                $hasil = $a / $b;
            }
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kalkulator</title>

    <style>
        body {
            font-family: Arial;
            background: #fce4ec;
            padding: 40px;
        }

        .card {
            width: 320px;
            margin: auto;
            padding: 25px;
            background: white;
            border: 2px solid #f48fb1;
            border-radius: 15px;
            box-shadow: 0 4px 12px #ddd;
        }

        h1 {
            text-align: center;
            color: #c2185b;
        }

        input, select, button {
            width: 100%;
            padding: 10px;
            margin: 6px 0;
            box-sizing: border-box;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        button {
            background: #ec407a;
            color: white;
            border: none;
            cursor: pointer;
        }

        .hasil {
            margin-top: 15px;
            padding: 10px;
            text-align: center;
            background: #fce4ec;
            border-radius: 8px;
            color: #ad1457;
        }
    </style>
</head>

<body>

    <div class="card">

        <h1>Kalkulator</h1>

        <form method="post">

            <input type="number" step="any" name="a"
                   placeholder="Angka pertama" required>

            <select name="operator">
                <option>+</option>
                <option>-</option>
                <option>*</option>
                <option>/</option>
            </select>

            <input type="number" step="any" name="b"
                   placeholder="Angka kedua" required>

            <button type="submit">Hitung</button>

        </form>

        <?php if ($pesan): ?>
            <div class="hasil">
                <?= htmlspecialchars($pesan) ?>
            </div>

        <?php elseif ($hasil !== null): ?>
            <div class="hasil">
                Hasil: <?= htmlspecialchars((string)$hasil) ?>
            </div>
        <?php endif; ?>

    </div>

</body>
</html>