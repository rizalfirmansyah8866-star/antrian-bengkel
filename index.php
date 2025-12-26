<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Asep Speed Shoop</title>

<style>
body{
    margin:0;
    font-family:'Segoe UI',sans-serif;
    background:linear-gradient(135deg,#0f2027,#203a43,#2c5364);
    height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
}

.box{
    background:rgba(0,0,0,.75);
    padding:45px;
    border-radius:18px;
    width:360px;
    text-align:center;
    box-shadow:0 15px 40px rgba(0,0,0,.6);
}

.logo{
    font-size:55px;
    margin-bottom:10px;
}

h1{
    margin:0;
    letter-spacing:2px;
}

.tagline{
    font-size:14px;
    color:#9ecbff;
    margin-bottom:30px;
}

input{
    width:100%;
    padding:12px;
    margin-bottom:15px;
    border:none;
    border-radius:8px;
    outline:none;
}

button{
    width:100%;
    padding:12px;
    background:#1e90ff;
    border:none;
    border-radius:8px;
    color:#fff;
    font-size:16px;
    cursor:pointer;
    font-weight:bold;
}

button:hover{
    background:#0b5ed7;
}

.footer{
    margin-top:20px;
    font-size:12px;
    color:#aaa;
}
</style>
</head>

<body>

<div class="box">
    <div class="logo">🔧⚙️</div>
    <h1>ASEP SPEED SHOOP</h1>
    <div class="tagline">Cepet • Beres • Teu loba omong</div>

    <form method="post" action="login.php">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">LOGIN</button>
    </form>

    <div class="footer">
        © <?php echo date('Y'); ?> Asep Speed Shoop
    </div>
</div>

</body>
</html>
