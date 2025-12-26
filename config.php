<?php
$koneksi = mysqli_connect("localhost", "root", "", "antrian_db");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
