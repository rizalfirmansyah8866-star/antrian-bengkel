<?php
session_start();
include 'config.php';

if($_POST){
    $u = $_POST['user'];
    $p = $_POST['pass'];

    $q = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$u' AND password='$p'");
    if(mysqli_num_rows($q)>0){
        $_SESSION['admin']=$u;
        header("Location: admin_dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <style>
        body {
            font-family: Arial;
            background: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 350px;
            margin: 80px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 7px 0;
            border: 1px solid #bbb;
            border-radius: 5px;
            font-size: 14px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #4CAF50;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 15px;
            margin-top: 10px;
        }
        button:hover {
            background: #45a049;
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h3>Login Admin</h3>

    <?php if(!empty($error)){ ?>
        <div class="error"><?php echo $error; ?></div>
    <?php } ?>

    <form method="post">
        <input name="user" placeholder="Username" required>
        <input type="password" name="pass" placeholder="Password" required>
        <button>Login</button>
    </form>
</div>

</body>
</html>
