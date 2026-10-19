
<?php
require_once __DIR__ . '/../models/ProdukModel.php';

class ProdukController {
    private $model;

    public function __construct($koneksi) {
        $this->model = new ProdukModel($koneksi);
    }

    // Menampilkan daftar produk
    public function index() {
        $dataProduk = $this->model->getAllProduk();

        include __DIR__ . '/../views/produk/index.php';
    }

    // Menampilkan form tambah produk
    public function create() {
        include __DIR__ . '/../views/produk/create.php';
    }

    // Menyimpan produk baru
    public function store() {
        $nama = trim($_POST['nama_produk'] ?? '');
        $harga = $_POST['harga'] ?? '';
        $stok = $_POST['stok'] ?? '';

        if (
            $nama === '' ||
            !is_numeric($harga) ||
            !is_numeric($stok) ||
            (float) $harga < 0 ||
            (float) $stok < 0 ||
            (float) $stok != (int) $stok
        ) {
            header("Location: index.php?action=create&status=gagal");
            exit;
        }

        $berhasil = $this->model->tambahProduk(
            $nama,
            (float) $harga,
            (int) $stok
        );

        $status = $berhasil ? 'tambah' : 'gagal';

        header("Location: index.php?status=$status");
        exit;
    }

    // Menampilkan form edit
    public function edit() {
        $id = (int) ($_GET['id'] ?? 0);
        $produk = $this->model->getProdukById($id);

        if (!$produk) {
            header("Location: index.php?status=tidak_ditemukan");
            exit;
        }

        include __DIR__ . '/../views/produk/edit.php';
    }

    // Menyimpan perubahan produk
    public function update() {
        $id = (int) ($_POST['id'] ?? 0);
        $nama = trim($_POST['nama_produk'] ?? '');
        $harga = $_POST['harga'] ?? '';
        $stok = $_POST['stok'] ?? '';

        if (
            $id <= 0 ||
            $nama === '' ||
            !is_numeric($harga) ||
            !is_numeric($stok) ||
            (float) $harga < 0 ||
            (float) $stok < 0 ||
            (float) $stok != (int) $stok
        ) {
            header("Location: index.php?status=gagal");
            exit;
        }

        $berhasil = $this->model->ubahProduk(
            $id,
            $nama,
            (float) $harga,
            (int) $stok
        );

        $status = $berhasil ? 'ubah' : 'gagal';

        header("Location: index.php?status=$status");
        exit;
    }

    // Menghapus produk
    public function delete() {
        $id = (int) ($_POST['id'] ?? 0);

        if ($id <= 0) {
            header("Location: index.php?status=gagal");
            exit;
        }

        $berhasil = $this->model->hapusProduk($id);

        $status = $berhasil ? 'hapus' : 'gagal';

        header("Location: index.php?status=$status");
        exit;
    }
}
?>
