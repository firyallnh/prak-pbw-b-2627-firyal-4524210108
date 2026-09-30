<div align="center">

<h1 style="font-size: 18px; margin-bottom: 5px; border: none;">
LAPORAN PRAKTIKUM <br>
PEMROGRAMAN BERBASIS WEB
</h1>

<p font-size: 12px; color: #555;">
<i>Laporan ini disusun guna memenuhi penilaian dalam mata kuliah Prak. Pemrograman Berbasis Web</i>
</p>

<br>

<img src="../asset/Logo_Universitas_Pancasila.png" width="300">

<br><br>

<p style="font-size: 14px; margin-bottom: 5px;">
<b>Disusun Oleh:</b>
</p>

<p style="font-size: 15px; margin-top: 5px;">
<b>Firyal Nibras Hariyadi</b><br>
4524210108
</p>

<br>

<p style="font-size: 14px; margin-bottom: 5px;">
<b>Dosen:</b>
</p>

<p style="font-size: 14px; margin-top: 5px;">
Ari Wibowo, S.Kom., M.Kom., C. Pro
</p>

<br><br><br>

<h3 style="font-size: 16px; margin-bottom: 5px; border: none;">
S1-TEKNIK INFORMATIKA <br>
FAKULTAS TEKNIK UNIVERSITAS PANCASILA <br>
<b>2026/2027</b> 
</h3>

</div>

---

# Tugas Praktikum 2

Pada tugas ini dilakukan modifikasi terhadap program pada Pertemuan 2. Program yang digunakan yaitu identitas.php dan hitung.php.

## 1. Modifikasi Program

### A. identitas.php

#### Sebelum Modifikasi

![Identitas Sebelum Dimodifikasi](../asset/identitassblm.png)

#### Sesudah Modifikasi

![Identitas Sesudah Dimodifikasi](../asset/identitasssdh.png)

#### Penjelasan

Modifikasi pada program identitas.php dilakukan dengan mengubah tampilan program yang sebelumnya hanya menampilkan ringkasan mahasiswa menjadi halaman biodata yang lebih lengkap dan rapi. Data mahasiswa juga dilengkapi dengan nama lengkap, program studi, semester, status, dan email. Selain itu, ditambahkan tampilan card, header, serta icon inisial nama menggunakan CSS.

Lima bagian kode yang menurut saya penting:

- Function `statusKelulusan()` digunakan untuk menentukan predikat mahasiswa berdasarkan nilai IPK.
- Array `$mahasiswa` digunakan untuk menyimpan berbagai data mahasiswa seperti NIM, nama, program studi, semester, IPK, status, dan email.
- Field `status` dan `email` ditambahkan untuk melengkapi informasi biodata mahasiswa.
- `foreach` digunakan untuk menampilkan seluruh data yang terdapat dalam array `$mahasiswa` secara otomatis.
- Class `.card` digunakan untuk membuat tampilan biodata dalam bentuk card agar lebih rapi dan terstruktur.

### B. hitung.php

#### Sebelum Modifikasi

![Hitung Sebelum Dimodifikasi](../asset/hitungsblm.png)

#### Sesudah Modifikasi

![Hitung Sesudah Dimodifikasi](../asset/hitungssdh.png)

#### Penjelasan

Modifikasi pada program hitung.php dilakukan dengan menambahkan beberapa produk baru ke dalam daftar serta mengubah tampilan hasil menjadi halaman daftar produk yang lebih rapi. Produk yang ditambahkan yaitu Headset, Webcam, Flashdisk, dan Mouse Pad dengan beberapa produk memiliki diskon. Selain itu, ditambahkan CSS berupa card, background, border, dan pengaturan tampilan setiap produk.

Lima bagian kode yang menurut saya penting:

- Interface `BisaDihitung` digunakan sebagai aturan bahwa setiap produk harus memiliki method `hargaAkhir()`.
- Class `Produk` digunakan untuk menyimpan nama dan harga produk serta menentukan harga akhir produk tanpa diskon.
- Class `ProdukDiskon` merupakan turunan dari `Produk` yang digunakan untuk menghitung harga produk setelah mendapatkan diskon.
- Array `$daftar` digunakan untuk menyimpan seluruh produk yang ditampilkan, termasuk produk biasa dan produk diskon.
- `foreach` digunakan untuk menampilkan setiap produk beserta harga akhirnya secara otomatis pada halaman.
