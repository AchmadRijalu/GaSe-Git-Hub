<?php 
session_start();
// jika tidak ada user yang sedang login maka akan balik ke halaman login
if(! isset($_SESSION['is_login']))
{
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Home</title>
</head>
<body>
    <form action="logout.php" method="POST">
    <h1>Selamat Datang Di Website Game Seller!</h1>
    <button type="submit" class="keluar" name="logout"> LOGOUT </button>
    </form>
</body>
</html>