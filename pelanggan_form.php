<?php 
include 'config.php'; 

// Cek jika tombol tambah diklik
if (isset($_POST['tambah'])) {
    $nama_pelanggan = mysqli_real_escape_string($koneksi, $_POST['nama_input']);
    $nama_motor     = mysqli_real_escape_string($koneksi, $_POST['motor_input']);
    $layanan_keluhan = mysqli_real_escape_string($koneksi, $_POST['layanan_input']);

    /* Gue tembak langsung pake nama kolom yang standar. 
       Pastikan lu udah jalanin ALTER TABLE di phpMyAdmin tadi ya!
    */
    $sql = "INSERT INTO antrian (nama_pelanggan, nama_motor, jenis_layanan, keluhan, status) 
            VALUES ('$nama_pelanggan', '$nama_motor', 'Servis', '$layanan_keluhan', '0')";
    
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        echo "<script>alert('Berhasil ambil tiket!'); window.location='admin_antrian.php';</script>";
    } else {
        // Kalau gagal, ini bakal munculin errornya kenapa (Biar nggak putih doang)
        echo "<div style='color:red; background:white; padding:10px; position:fixed; top:0; width:100%; z-index:999;'>
                Gagal Simpan! Error: " . mysqli_error($koneksi) . " <br>
                <b>Catatan:</b> Pastikan kolom 'nama_pelanggan', 'nama_motor', dan 'keluhan' sudah ada di phpMyAdmin.
              </div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>AMBIL TIKET - ASEP SPEED SHOP</title>
    <style>
        body { background-color: #0b1426; color: white; font-family: Arial; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: #16213e; padding: 30px; border-radius: 15px; border: 2px solid #f9c70c; width: 380px; box-shadow: 0 10px 25px rgba(0,0,0,0.5); }
        h2 { color: #f9c70c; text-align: center; margin-top: 0; }
        label { font-size: 12px; color: #aaa; margin-left: 5px; }
        input, textarea { width: 100%; padding: 12px; margin: 8px 0 18px 0; border-radius: 8px; border: 1px solid #2a3a5a; background: #0b1426; color: white; box-sizing: border-box; }
        input:focus, textarea:focus { border-color: #f9c70c; outline: none; }
        .btn { background: #f9c70c; color: #0b1426; width: 100%; padding: 15px; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; font-size: 16px; transition: 0.3s; }
        .btn:hover { background: #ffdb4d; }
    </style>
</head>
<body>
    <div class="card">
        <h2>⚡ AMBIL TIKET</h2>
        <form method="POST">
            <label>Nama Pelanggan:</label>
            <input type="text" name="nama_input" placeholder="Masukkan nama lu..." required>
            
            <label>Nama Motor:</label>
            <input type="text" name="motor_input" placeholder="Contoh: Vario 160 / NMAX" required>
            
            <label>Keluhan / Request:</label>
            <textarea name="layanan_input" placeholder="Motornya mau diapain? (Contoh: Ganti oli & rem blong)" rows="3" required></textarea>
            
            <button type="submit" name="tambah" class="btn">AMBIL ANTREAN SEKARANG</button>
        </form>
        <p style="text-align:center; font-size:12px; margin-top:15px;"><a href="admin_antrian.php" style="color:#aaa; text-decoration:none;">← Kembali ke Antrean</a></p>
    </div>
</body>
</html>