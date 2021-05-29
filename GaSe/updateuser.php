<?php
session_start();
require 'db_connect.php';

//ambil data di url
$iduser = connectDB();

//query data bukutamu berdasarkan id
$change = "SELECT * FROM `user`";
$hasil = mysqli_query($iduser, $change) or die (mysqli_error($iduser));

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="updateuser.css">
</head>
<body>
    <h1>Update User</h1>

    <form method="POST">
    <ul>
    <li> <label> Input ID : <input type="text" name="inputid"> </label><br> <br></li> 
    <li> <label> Input Username : <input type="text" name="inputusername"> </label><br> <br> </li>
    <li> <label> Input Email :   <input type="text" name="inputemail"> </label> <br> <br> </li>
    <li> <label> Input Password : <input type="password" name="inputpassword"> </label> <br> <br> </li>
    </ul>
  <input type="submit" class="btn" name="Edit" value="Edit"> <br> <br>
    </form>
<a href="index.php"><input type="submit" class="btn" name="Back" value="Back"></a>
    <?php 
    include_once ('db_connect.php');
    $connect = connectDB();
    if(isset($_POST['Edit'])) {
        $inputusername = $_POST['inputusername'];
        $inputemail = $_POST['inputemail'];
        $inputpassword = $_POST['inputpassword'];
        $inputpassword = password_hash($inputpassword, PASSWORD_DEFAULT);
        $inputid = $_POST['inputid'];
        $update = "UPDATE user SET `username` = '$inputusername', `email` = '$inputemail', `password` = '$inputpassword' WHERE `id` = '$inputid'";
        $act = mysqli_query($connect, $update) or die (mysqli_error($connect));
    
    }
    ?>
</body>
</html>