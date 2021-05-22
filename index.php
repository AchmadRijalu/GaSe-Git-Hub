<?php

include 'controller.php';


$data = query("SELECT * FROM gamestock");


if(isset($_POST["cari"])){
    $data = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
    
</head>
<body>
    <div class="banner">
        <div class="logo">
        <img src="logo3.png" alt="" width="70px">
        </div>
        
        <ul>
            <li>
                HOME
            </li>
            <li>
                ABOUT US
            </li>
            <li>
                CONTACT US
            </li>
            <li>
                SIGN IN/SIGN UP
            </li>
        </ul>
        
    </div>
    <br>
    <div class="prom">
        &nbsp;
    </div>

    <div class="limit">
        <div class="search">
        <form action="" method="POST">

        <input type="text" name="keyword" placeholder="Search Game Name/Genre" autocomplete="off">
        
        <button type="submit" name="cari">Search</button>
    
        </form>
        </div>
        
    </div>

    

    
    <div class="product">

    <h1>Game Stock</h1>
    <br><br>
    <p> 
        
    <a href="addgame.php">Tambah Game</a></p>
    
    <?php foreach($data as $game) : ?>

    <div class="stock">
     
    <div class="image-pos">
    <img src="img/<?= $game["gambar"];?>" width="150">
    </div>
    
    
    <br>
    <h2><?php echo $game["nama"] ?></h2>
    <br>
    <h3><?php echo $game["harga"] ?></h3>
    <br>
    <h4><?php echo $game["genre"] ?></h4>
    <p> <a href="editgame.php?id=<?php echo $game['id'];?>">Ubah</a></p>
    <p> <a href="deletegame.php?id=<?php echo $game['id']; ?> ">Hapus</a></p>
    </div>
    <?php  endforeach;?>
    </div>
    
</body>

</html>