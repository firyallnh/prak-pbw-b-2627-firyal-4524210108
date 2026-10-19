
<?php
class ProdukModel {
    private $koneksi;

    public function __construct($koneksi) {
        $this->koneksi = $koneksi;
    }

    // Mengambil semua data produk
    public function getAllProduk() {
        $query = mysqli_query(
            $this->koneksi,
            "SELECT * FROM produk ORDER BY id DESC"
        );

        return $query;
    }

    // Mengambil produk berdasarkan ID
    public function getProdukById($id) {
        $query = mysqli_prepare(
            $this->koneksi,
            "SELECT * FROM produk WHERE id = ?"
        );

        mysqli_stmt_bind_param($query, "i", $id);
        mysqli_stmt_execute($query);

        $hasil = mysqli_stmt_get_result($query);

        return mysqli_fetch_assoc($hasil);
    }

    // Menambahkan produk
    public function tambahProduk($nama, $harga, $stok) {
        $query = mysqli_prepare(
            $this->koneksi,
            "INSERT INTO produk (nama_produk, harga, stok)
             VALUES (?, ?, ?)"
        );

        mysqli_stmt_bind_param(
            $query,
            "sdi",
            $nama,
            $harga,
            $stok
        );

        return mysqli_stmt_execute($query);
    }

    // Mengubah produk
    public function ubahProduk($id, $nama, $harga, $stok) {
        $query = mysqli_prepare(
            $this->koneksi,
            "UPDATE produk
             SET nama_produk = ?, harga = ?, stok = ?
             WHERE id = ?"
        );

        mysqli_stmt_bind_param(
            $query,
            "sdii",
            $nama,
            $harga,
            $stok,
            $id
        );

        return mysqli_stmt_execute($query);
    }

    // Menghapus produk
    public function hapusProduk($id) {
        $query = mysqli_prepare(
            $this->koneksi,
            "DELETE FROM produk WHERE id = ?"
        );

        mysqli_stmt_bind_param($query, "i", $id);

        return mysqli_stmt_execute($query);
    }
}
?>
