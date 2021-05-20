<?php 
session_start();
include_once('db_connect.php');
$database = new database();

// untuk mengecek user yang sudah login akan di direct ke halaman home
if(isset($_SESSION['is_login']))
{
    header('location:home.php');
}

// saat username, email, dan password telah di isi maka akan login
if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // masuk ke halaman home
    if($database->login($username,$email,$password))
    {
      header('location:home.php');
    }
}

// ketika tombol sign up di pencet maka akan masuk ke halaman register
if(isset($_POST['register'])) {
 header('location:register.php'); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
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
    <button type="submit" class="signin" name="login">SIGN IN</button>
    <br>
    <button type="submit" class="signup" name="register">SIGN UP</button>
    </form>
    </div>
    </div>
</body>
</html>