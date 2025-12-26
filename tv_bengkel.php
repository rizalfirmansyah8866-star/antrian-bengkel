<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config.php';

$q = mysqli_query($koneksi, "
    SELECT a.*, p.nama, p.motor
    FROM antrian a
    JOIN pelanggan p ON a.id_pelanggan = p.id_pelanggan
    WHERE a.status = 'Dipanggil'
    LIMIT 1
");

$data = mysqli_fetch_assoc($q);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>ASEP SPEED SHOOP</title>
    <meta http-equiv="refresh" content="5">
    <style>
        body{
            margin:0;
            font-family: Arial, Helvetica, sans-serif;
            background:#0d47a1;
            color:white;
            text-align:center;
        }
        .header{
            padding:25px;
            background:#0b3c91;
        }
        .header h1{
            margin:0;
            font-size:52px;
        }
        .tagline{
            font-size:20px;
        }
        .content{
            margin-top:60px;
        }
        .nomor{
            font-size:120px;
            font-weight:bold;
        }
        .nama{
            font-size:40px;
            margin-top:10px;
        }
        .motor{
            font-size:32px;
            margin-top:5px;
        }
        .footer{
            position:fixed;
            bottom:0;
            width:100%;
            padding:12px;
            background:#0b3c91;
            font-size:14px;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>🔧 ASEP SPEED SHOOP</h1>
    <div class="tagline">Cepet • Beres • Teu loba omong</div>
</div>

<div class="content">
<?php if($data){ ?>
    <div class="nomor">
        <?= $data['id']; ?>
    </div>
    <div class="nama">
        <?= strtoupper($data['nama']); ?>
    </div>
    <div class="motor">
        <?= strtoupper($data['motor']); ?>
    </div>
<?php } else { ?>
    <div class="nomor">—</div>
    <div class="nama">Belum Ada Antrian</div>
    <div class="motor">Silakan Menunggu</div>
<?php } ?>
</div>

<div class="footer">
    Monitoring Antrian Bengkel • Auto Refresh
</div>

</body>
</html>
