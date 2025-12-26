<?php
require_once 'config.php';

$q = mysqli_query($koneksi,"SELECT id FROM antrian WHERE status='1' LIMIT 1");
if(mysqli_num_rows($q)>0){
    $r = mysqli_fetch_assoc($q);
    mysqli_query($koneksi,"DELETE FROM antrian WHERE id='{$r['id']}'");
}

header("Location: admin_antrian.php");
exit;
