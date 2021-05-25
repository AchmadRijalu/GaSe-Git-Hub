<?php

include 'controller.php';

session_start();


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
    <link rel="stylesheet" href="index.css">
    
</head>
<body>
    <div class="banner">
        <div class="logo">
        <img src="logo3.png" alt="" width="70px">
        </div>
        
        <ul>
            <li>
                <a href="index.php">HOME</a> 
            </li>
            <li>
                <a href="about_us.php"> ABOUT US</a>
            </li>
            <li>
                <?php
                    if(!isset($_SESSION["is_login"])){
                ?>
                <a href="login.php">SIGN IN/SIGN UP</a> 
                <?php
                    }else{
                ?>
                <a href="logout.php">SIGN OUT</a> 
                <?php
                    }
                ?>
            </li>
        </ul>
        
    </div>
    <br>
    <div class="prom">
       <p><img src="https://thumbs.gfycat.com/SlimWarmBluemorphobutterfly-max-1mb.gif"></p>
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
    <?php
        if(!empty($_SESSION['level']) && $_SESSION['level'] == "admin"){
    ?>
    <p><a href="addgame.php" class="admin_crud">Add Game</a></p>
    <?php
        }
    ?>
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
    <?php
        if(!empty($_SESSION) && $_SESSION['level'] == "admin"){
    ?>
    <p> <a class="admin_crud" href="editgame.php?id=<?php echo $game['id'];?>">Edit Game</a></p>
    <p> <a class="admin_crud" href="deletegame.php?id=<?php echo $game['id']; ?> ">Delete Game</a></p>
    <?php
        }
    ?>
    </div>
    <?php  endforeach;?>
    </div>
    
</body>

</html>