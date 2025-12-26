<?php
// 1. KONEKSI KE DATABASE
require_once 'config.php';
session_start();

// 2. PROSES LOGIKA LOGIN
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Sesuaikan 'admin' dengan nama tabel kamu jika berbeda
    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['admin'] = $username;
        header("location: admin_antrian.php");
        exit();
    } else {
        echo "<script>alert('Username atau Password Salah!'); window.location='login.php';</script>";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN ADMIN | ASEP SPEED SHOP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* STYLE PREMIUM DARK RACING */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            background: radial-gradient(circle at center, #1a2a4a 0%, #0b1426 100%); 
            color: #fff; 
            font-family: 'Segoe UI', Roboto, sans-serif; 
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }
        .login-card {
            background: rgba(22, 33, 62, 0.75);
            padding: 40px;
            border-radius: 25px;
            border: 2px solid #f9c70c;
            box-shadow: 0 0 30px rgba(249, 199, 12, 0.3);
            backdrop-filter: blur(15px);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .logo-icon { font-size: 50px; color: #f9c70c; margin-bottom: 15px; text-shadow: 0 0 15px rgba(249, 199, 12, 0.5); }
        h2 { letter-spacing: 3px; margin-bottom: 30px; text-transform: uppercase; font-size: 1.5em; color: #fff; }
        .input-group { margin-bottom: 20px; text-align: left; }
        .input-group label { display: block; margin-bottom: 8px; color: #f9c70c; font-size: 0.85em; font-weight: bold; }
        .input-group input { 
            width: 100%; padding: 15px; 
            background: rgba(255, 255, 255, 0.05); 
            border: 1px solid rgba(255, 255, 255, 0.1); 
            border-radius: 12px; color: #fff; outline: none; 
        }
        .input-group input:focus { border-color: #00d2ff; background: rgba(255, 255, 255, 0.1); }
        .btn-login { 
            width: 100%; padding: 15px; 
            background: linear-gradient(45deg, #f9c70c, #ffdb4d); 
            border: none; border-radius: 12px; color: #0b1426; 
            font-weight: 800; text-transform: uppercase; cursor: pointer; transition: 0.3s; 
        }
        .btn-login:hover { transform: translateY(-3px); box-shadow: 0 5px 20px rgba(249, 199, 12, 0.4); }
    </style>
</head>
<body>

<div class="login-card">
    <i class="fas fa-user-shield logo-icon"></i>
    <h2>ADMIN LOGIN</h2>
    
    <form action="" method="POST">
        <div class="input-group">
            <label><i class="fas fa-user"></i> USERNAME</label>
            <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="input-group">
            <label><i class="fas fa-lock"></i> PASSWORD</label>
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" name="login" class="btn-login">MASUK PIT <i class="fas fa-sign-in-alt"></i></button>
    </form>
</div>

</body>
</html>