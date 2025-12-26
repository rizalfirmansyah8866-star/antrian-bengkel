<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>ASEP SPEED SHOP - PREMIUM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* CSS TETEP SAMA JIGA NU TADI (PREMIUM) */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background: radial-gradient(circle at top, #1a2a4a 0%, #0b1426 100%); color: #fff; font-family: 'Segoe UI', Roboto, sans-serif; min-height: 100vh; }
        
        /* Update Header untuk Tombol Kembali */
        .header { 
            background: rgba(28, 42, 72, 0.9); 
            padding: 30px; 
            text-align: center; 
            border-bottom: 4px solid #f9c70c; 
            box-shadow: 0 5px 20px rgba(0,0,0,0.5); 
            position: relative; 
        }
        
        /* Style Tombol Logout di Pojok */
        .btn-logout {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            padding: 10px 20px;
            background: rgba(255, 0, 0, 0.2);
            border: 1px solid #ff4d4d;
            color: #ff4d4d;
            text-decoration: none;
            border-radius: 8px;
            font-size: 0.8em;
            font-weight: bold;
            transition: all 0.3s;
        }
        .btn-logout:hover {
            background: #ff4d4d;
            color: #fff;
        }

        .header h1 { letter-spacing: 2px; text-shadow: 2px 2px 10px rgba(249, 199, 12, 0.3); }
        .container { padding: 40px 20px; max-width: 1200px; margin: auto; }
        .pit { background: rgba(22, 33, 62, 0.8); border: 2px solid #f9c70c; border-radius: 25px; padding: 40px; text-align: center; max-width: 700px; margin: 0 auto 40px auto; box-shadow: 0 0 20px rgba(249, 199, 12, 0.2), inset 0 0 15px rgba(249, 199, 12, 0.1); backdrop-filter: blur(10px); }
        .btn { padding: 14px 28px; border-radius: 12px; font-weight: 800; text-decoration: none; display: inline-block; cursor: pointer; border: none; text-transform: uppercase; letter-spacing: 1px; transition: all 0.3s ease; }
        .btn:hover { transform: translateY(-3px); box-shadow: 0 5px 15px rgba(0,0,0,0.3); }
        .kuning { background: linear-gradient(45deg, #f9c70c, #ffdb4d); color: #0b1426; }
        .biru { background: linear-gradient(45deg, #00d2ff, #3a7bd5); color: #fff; }
        .grid { display: grid; grid-template-columns: 1fr 2.5fr; gap: 25px; }
        .box { background: rgba(22, 33, 62, 0.7); padding: 25px; border-radius: 20px; border: 1px solid rgba(255,255,255,0.1); box-shadow: 0 10px 30px rgba(0,0,0,0.3); }
        .item-list { background: rgba(255,255,255,0.03); margin-bottom: 12px; padding: 18px; border-radius: 15px; display: flex; justify-content: space-between; align-items: flex-start; border-left: 4px solid #00d2ff; }
        .nomer-lingkaran { background: #00d2ff; color: #0b1426; width: 36px; height: 36px; border-radius: 10px; display: flex; justify-content: center; align-items: center; font-weight: 900; margin-right: 15px; }
        .content-info h4 { font-size: 1.2em; color: #fff; }
        .content-info p.layanan { color: #f9c70c; font-weight: bold; margin: 5px 0; font-size: 0.9em; }
        .content-info p.keluhan { color: #aaa; font-style: italic; font-size: 0.85em; }
        .status-badge { padding: 5px 12px; border-radius: 8px; font-size: 0.75em; font-weight: bold; }
    </style>
</head>
<body>

<div class="header">
    <h1>⚡ ASEP SPEED SHOP</h1>
    <a href="login.php" class="btn-logout"><i class="fas fa-sign-out-alt"></i> KELUAR</a>
</div>

<div class="container">
    <div class="pit">
        <h2 style="color:#f9c70c; margin-bottom: 25px; text-transform: uppercase; letter-spacing: 2px;">
            <i class="fas fa-tools"></i> Sedang Dikerjakan
        </h2>

        <?php
        $query_jalan = mysqli_query($koneksi, "SELECT * FROM antrian WHERE status='1' LIMIT 1");
        if($data = mysqli_fetch_array($query_jalan)){
            $panggil_nama = $data['nama_pelanggan'];
            $panggil_motor = $data['nama_motor'];
        ?>
            <div style="margin-bottom: 30px;">
                <h1 style="color: #00d2ff; font-size: 48px; margin-bottom: 5px;"><?= $panggil_nama; ?></h1>
                <h3 style="color: #fff; opacity: 0.9;"><?= $panggil_motor; ?></h3>
                <div style="height: 2px; background: linear-gradient(90deg, transparent, #f9c70c, transparent); margin: 20px auto; width: 80%;"></div>
                <p style="color: #f9c70c; font-weight: bold; font-size: 1.2em;"><?= $data['jenis_layanan']; ?></p>
            </div>
        <?php } else { $panggil_nama = ""; } ?>

        <div style="display:flex; gap:20px; justify-content:center">
            <a href="panggil.php" class="btn kuning"><i class="fas fa-bullhorn"></i> PANGGIL</a>
            <a href="selesai.php" class="btn biru"><i class="fas fa-check-circle"></i> SELESAI</a>
        </div>
    </div>

    <div class="grid">
        <div class="box" style="text-align:center">
            <h3 style="color:#f9c70c; margin-bottom: 20px;">DAFTAR BARU</h3>
            <a href="pelanggan_form.php" class="btn kuning" style="width: 100%">+ TAMBAH</a>
        </div>
        <div class="box">
            <h3 style="color:#00d2ff; margin-bottom: 25px;">DAFTAR ANTREAN HARI INI</h3>
            <?php
            $q = mysqli_query($koneksi,"SELECT * FROM antrian ORDER BY id ASC");
            $no = 1;
            while($r = mysqli_fetch_assoc($q)){
                $st_text = $r['status'] == '1' ? "PROSES" : "WAITING";
                $color_badge = $r['status'] == '1' ? "#00d2ff" : "#888";
            ?>
                <div class="item-list">
                    <div style="display: flex; align-items: center;">
                        <div class="nomer-lingkaran"><?= $no++; ?></div>
                        <div class="content-info">
                            <h4><?= $r['nama_pelanggan']; ?> <span style="font-size: 0.7em; color: #666;">| <?= $r['nama_motor']; ?></span></h4>
                            <p class="layanan"><?= $r['jenis_layanan']; ?></p>
                        </div>
                    </div>
                    <div class="status-badge" style="border: 1px solid <?= $color_badge ?>; color: <?= $color_badge ?>;">
                        <?= $st_text ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    window.onload = function() {
        const nama = "<?= $panggil_nama; ?>";
        const motor = "<?= isset($panggil_motor) ? $panggil_motor : ''; ?>";

        if (nama !== "") {
            if (sessionStorage.getItem('last_called') !== nama) {
                const kumpulanKalimat = [
                    `Woy bos ${nama}! Motor ${motor} nya masuk pit nih. Gaspol ke sini bosku!`,
                    `Panggilan buat juragan ${nama}. Motor ${motor} nya mau dibikin kenceng di Asep Speed Shop. Merapat bos!`,
                    `Misi bos ${nama}, mekanik udah pegang kunci pas nih buat motor ${motor} kamu. Sikat ke area servis!`,
                    `Atas nama ${nama}, motor ${motor} nya dapet giliran jadi kenceng. Ditunggu di depan ya!`
                ];
                const teksRandom = kumpulanKalimat[Math.floor(Math.random() * kumpulanKalimat.length)];
                const utterance = new SpeechSynthesisUtterance(teksRandom);
                utterance.lang = 'id-ID';
                utterance.rate = 1.0; 
                utterance.pitch = 0.8; 
                window.speechSynthesis.speak(utterance);
                sessionStorage.setItem('last_called', nama);
            }
        }
    };
</script>

</body>
</html>