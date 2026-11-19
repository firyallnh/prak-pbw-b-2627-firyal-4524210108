<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Dashboard Akademik
    </title>
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
</head>

<body>
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
    <div class="container">
        <h1>
            Sistem Akademik
        </h1>
        <div class="dashboard">
            <div class="card">
                <h3>Mahasiswa</h3>
                <p>
                    <?= $jumlahMahasiswa; ?>
                </p>
            </div>
            <div class="card">
                <h3>Dosen</h3>
                <p>
                    <?= $jumlahDosen; ?>
                </p>
            </div>
            <div class="card">
                <h3>Mata Kuliah</h3>
                <p>
                    <?= $jumlahMK; ?>
                </p>
            </div>
            <div class="card">
                <h3>KRS</h3>
                <p>
                    <?= $jumlahKRS; ?>
                </p>
            </div>
        </div>
    </div>
</body>
</html>