<?php 
session_start();
include_once('db_connect.php');
$database = new database();

$data = "SELECT * FROM user ";
$var = connectDB();
$result = mysqli_query($var, $data) or die (mysqli_error($var));

// untuk mengecek user yang sudah login akan di direct ke halaman home
if(isset($_SESSION['is_login']))
{
    header('location:index.php');
}

// saat username, email, dan password telah di isi maka akan login
if(isset($_POST['login']))
{

    $sql = "SELECT * FROM user WHERE username='$_POST[username]'";
    $result = mysqli_query($var, $sql);

    $user = $result->fetch_assoc();
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $unamedb = $_POST['username'];
    $emaildb = $_POST['email'];
    $passworddb = $_POST['password'];

    // masuk ke halaman home
    if ($username == $unamedb && $email == $emaildb && $password == $passworddb) {
      if(password_verify($password, $user['password'])){
          $_SESSION['is_login'] = "";
          $_SESSION['username'] = $username;
          $_SESSION['id_user'] = $user['id'];  
          $_SESSION['level'] = $user['level'];
          echo $user['level'];
          header('location:index.php');
      }
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
    <br>
  <input type="text" id="username" name="username" placeholder="Username"><br> 
  <br>
  <input type="text" id="email" name="email" placeholder="Email"><br>
  <br>
  <input type="password" id="password" name="password" placeholder="Password">
    <br><br>
    <button type="submit" class="signin" name="login">SIGN IN</button>
    <br>
    <button type="submit" class="signup" name="register">SIGN UP</button>
    </form>
    </div>
    </div>
    <div>
    </div>
</body>
</html>