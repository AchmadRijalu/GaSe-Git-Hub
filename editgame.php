<?php
require 'controller.php';


//ambil data di url
$ubah = $_GET['id'];

//query data bukutamu berdasarkan id
$chg = query("SELECT * FROM gamestock WHERE id = '$ubah'")[0];


if(isset ($_POST["inputsubmit"])){

    if(ubah($_POST) > 0){
        echo "Data Berhasil Diubah";
    }
    else{
        echo "Data Gagal diubah";
        echo "<br>";
        echo mysqli_error($conn);
    }

    header('Location: index.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Game</title>
</head>
<body>
    <h1>Edit GAME</h1>

    <form action="" method="POST" enctype="multipart/form-data">
    
    <ul>
    <input type="hidden" name="id" value="<?php echo $chg['id']?>">
    <input type="hidden" name="oldgambar" value="<?php echo $chg['gambar']?>">
    <li><label for="nama">Input Nama : </label><input type="text" name="nama" required value="<?php echo $chg['nama']?>"></li>
    <br>
    <li><label for="harga">Input Harga : </label><input type="text" name="harga" required value="<?php echo $chg['harga']?>"></li>
    <br>
    <li><label for="genre">Input Genre : </label><input type="text" name="genre" required value="<?php echo $chg['genre']?>"></li>
    <br>
    <img src="img/<?= $chg['gambar'];?>" alt="">
    <li><label for="gambar">Input Gambar : </label><input type="file" name="gambar" ></li>
    </ul>
        
    <li><input type="submit" name="inputsubmit"></li>
    </form>


</body>
</html>