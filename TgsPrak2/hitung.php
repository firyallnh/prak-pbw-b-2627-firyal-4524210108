<?php

interface BisaDihitung
{
    public function hargaAkhir(): float;
}

class Produk implements BisaDihitung
{
    public function __construct(
        protected string $nama,
        protected float $harga
    ) {}

    public function hargaAkhir(): float
    {
        return $this->harga;
    }

    public function getNama(): string
    {
        return $this->nama;
    }
}

class ProdukDiskon extends Produk
{
    public function __construct(
        string $nama,
        float $harga,
        private float $diskon
    ) {
        parent::__construct($nama, $harga);
    }

    public function hargaAkhir(): float
    {
        return $this->harga * (1 - $this->diskon / 100);
    }
}

$daftar = [
    new Produk('Keyboard', 250000),
    new ProdukDiskon('Mouse', 150000, 10),
    new Produk('Headset', 200000),
    new ProdukDiskon('Webcam', 300000, 15),
    new Produk('Flashdisk', 75000),
    new ProdukDiskon('Mouse Pad', 50000, 20),
];

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>

    <style>
        body {
            font-family: Arial;
            background: #f9e6eb;
            padding: 40px;
        }

        .card {
            width: 420px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 15px;
            border: 2px solid #d4a0aa;
            box-shadow: 0 5px 15px #c7aeb0;
        }

        h1 {
            text-align: center;
            color: #2b1715;
            margin-bottom: 20px;
        }

        .produk {
            padding: 14px;
            margin: 10px 0;
            background: #fcecef;
            border-left: 5px solid #d4a0aa;
            border-radius: 8px;
        }

        .nama {
            color: #2b1715;
            font-weight: bold;
        }

        .harga {
            margin-top: 5px;
            color: #4a2925;
        }
    </style>
</head>

<body>

    <div class="card">

        <h1>Daftar Produk</h1>

        <?php foreach ($daftar as $produk): ?>

            <div class="produk">
                <div class="nama">
                    <?= htmlspecialchars($produk->getNama()) ?>
                </div>

                <div class="harga">
                    Rp <?= number_format($produk->hargaAkhir(), 0, ',', '.') ?>
                </div>
            </div>

        <?php endforeach; ?>

    </div>

</body>

</html>