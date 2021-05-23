<?php
require 'controller.php';

if(isset ($_POST["inputsubmit"])){

    
    if(tambah($_POST) > 0){
        // echo "Data Berhasil Ditambah";
        echo "<script> alert('Data berhasil ditambahkan');
        document.location.href = 'index.php';
        </script>";

    }
    else{
        echo "<script> alert('Data Gagal Ditambahkan');
        document.location.href = 'index.php';
        </script>";
        
    }

    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Game</title>
    <link rel="stylesheet" href="addgame.css">
</head>
<body>
    <h1>Add Game</h1>

    <form action="" method="POST" enctype="multipart/form-data">
    
    <ul>
    <li><label for="nama">Input Nama : </label><input type="text" name="nama" required></li>
    <br>
    <li><label for="harga">Input Harga : </label><input type="text" name="harga" required></li>
    <br>
    <li><label for="genre">Input Genre : </label><input type="text" name="genre" required></li>
    <br>
    <li><label for="gambar">Input Gambar : </label><input type="file" name="gambar" ></li>
    <br>
    <input type="submit" class="btn" name="inputsubmit" value="Add">
    </ul>
    </form>


</body>
</html>