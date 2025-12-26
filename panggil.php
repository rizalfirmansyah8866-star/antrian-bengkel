<?php
require_once 'config.php';

/* cek apakah pit kosong */
$cek = mysqli_query($koneksi,"SELECT id FROM antrian WHERE status='1'");
if(mysqli_num_rows($cek)==0){

    $q = mysqli_query($koneksi,"
        SELECT id FROM antrian 
        WHERE status='0' 
        ORDER BY id ASC 
        LIMIT 1
    ");

    if(mysqli_num_rows($q)>0){
        $r = mysqli_fetch_assoc($q);
        mysqli_query($koneksi,"
            UPDATE antrian 
            SET status='1' 
            WHERE id='{$r['id']}'
        ");
    }
}

header("Location: admin_antrian.php");
exit;
