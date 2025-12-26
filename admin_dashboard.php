<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <style>
        body{
            margin:0;
            font-family: Arial, sans-serif;
            background:#f4f6f8;
        }

        .header{
            background:linear-gradient(120deg,#0d6efd,#198754);
            color:#fff;
            padding:20px;
        }

        .header h1{
            margin:0;
            font-size:28px;
        }

        .header p{
            margin-top:5px;
            opacity:.9;
        }

        .container{
            padding:20px;
        }

        .menu{
            display:grid;
            grid-template-columns: repeat(auto-fit,minmax(220px,1fr));
            gap:20px;
        }

        .card{
            background:#fff;
            padding:25px;
            border-radius:10px;
            box-shadow:0 4px 12px rgba(0,0,0,.1);
            text-align:center;
            transition:.3s;
        }

        .card:hover{
            transform:translateY(-5px);
        }

        .card span{
            font-size:40px;
            display:block;
            margin-bottom:10px;
        }

        .card h3{
            margin:10px 0;
        }

        .card a{
            text-decoration:none;
            background:#0d6efd;
            color:#fff;
            padding:8px 16px;
            border-radius:5px;
            display:inline-block;
            margin-top:10px;
        }

        .logout{
            background:#dc3545 !important;
        }
    </style>
</head>
<body>

<div class="header">
    <div class="logo">
        <span>🔧⚙️</span>
        <div>
            <h1>ASEP SPEED SHOOP</h1>
            <small style="color:#ccc;">Cepet • Beres • Teu loba omong</small>
        </div>
    </div>
    <div>Admin</div>
</div>


<div class="container">
    <div class="menu">

        <div class="card">
            <span>📋</span>
            <h3>Kelola Antrian</h3>
            <p>Melihat & memanggil antrian pelanggan</p>
            <a href="admin_antrian.php">Masuk</a>
        </div>

        <div class="card">
            <span>🚪</span>
            <h3>Logout</h3>
            <p>Keluar dari halaman admin</p>
            <a class="logout" href="logout.php">Logout</a>
        </div>

    </div>
</div>

</body>
</html>
