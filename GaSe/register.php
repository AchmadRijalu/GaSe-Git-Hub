<?php 
require_once('db_connect.php');
$database = new database();

// saat username, email, dan password telah di isi maka akan registrasi
if(isset($_POST['register']) && !empty($_POST))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $level = 'guest';
    
    // masuk ke halaman login
    register($username, $email, $password, $level);
    header('location:login.php');
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
</head>
<body>
<div class="box"> 
    <div class="box2">
    <img src="logo3.png" alt="" width="100px">
    <form action="" method="POST">
    <input type="text" id="username" name="username" placeholder="Username"><br> 
  <br>
  <input type="text" id="email" name="email" placeholder="Email"><br>
  <br>
  <input type="password" id="password" name="password" placeholder="Password">
    <br><br>
    <button type="submit" class="signup" name="register">SIGN UP</button>
    </form>
    </div>
    </div>
</body>
</html>