<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama   = $_POST['nama_pelanggan'];
    $motor  = $_POST['nama_motor'];

    mysqli_query($koneksi, "
        INSERT INTO antrian (nama_pelanggan, nama_motor, status)
        VALUES ('$nama', '$motor', '0')
    ");

    header("Location: antrian.php");
    exit;
}
?>

<h2>TAMBAH ANTRIAN</h2>

<form method="POST">
    <input type="text" name="nama_pelanggan" placeholder="Nama Pelanggan" required><br><br>
    <input type="text" name="nama_motor" placeholder="Nama Motor" required><br><br>
    <button type="submit" name="simpan">SIMPAN</button>
</form>
