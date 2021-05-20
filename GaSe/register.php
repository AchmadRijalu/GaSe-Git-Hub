<?php 
include_once('db_connect.php');
$database = new database();

// saat username, email, dan password telah di isi maka akan registrasi
if(isset($_POST['register']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

    // masuk ke halaman login
    if($database->register($username, $email, $password))
    {
      header('location:login.php');
    }
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
    <label>Username</label><br>
  <input type="text" id="username" name="username"><br> 
  <label>Email</label><br>
  <input type="text" id="email" name="email"><br>
  <label>Password</label><br>
  <input type="password" id="password" name="password">
    <br><br>
    <button type="submit" class="signup" name="register">SIGN UP</button>
    </form>
    </div>
    </div>
</body>
</html>