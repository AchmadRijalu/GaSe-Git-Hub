<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GaSe | About us</title>
    <link rel="stylesheet" href="about_us.css">
    <script src="http://code.jquery.com/jquery.js" type="text/javascript"></script>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="Picture/logo.png"> 
        </div>
        <div class="navbar">
            <a href="home.php">HOME</a>
            <a href="#">GAME STOCK</a>
            <a href="#">CATEGORY</a>
            <a href="about_us.php">ABOUT US</a>
            <a href="login.php">SIGN IN/SIGN UP</a>
        </div>        
    </nav>
    <div class="menu">
        <img src="Picture/menu_icon.png" id="menu-icon">
        <div class="menu-navbar">
            <a href="home.php">HOME</a>
            <a href="#">GAME STOCK</a>
            <a href="about_us.php">ABOUT US</a>
            <a href="login.php">SIGN IN/SIGN UP</a>
        </div>
    </div>

    <div class="box-about-us">
        <h1>About us</h1>
        <p class="divider"></p>

        <div class="tentang-gase">
            <h2>Tentang GaSe</h2>
            <p class="deskripsi">GaSe merupakan toko jualan game secara online berbasis website yang terpercaya dan aman. 
                Maka dari itu, kami hanya menjual game-game yang original dengan harga yang terjangkau dan tentunya bergaransi.
            </p>
        </div>
        
        <h2 class="founder">Founder GaSe</h2>
        <div class="gambar-founder">
            <img src="Picture/Achmad Rijalu.jpg" id="img-rijalu" class="chosen-img">
            <img src="Picture/Timothy.jpg" class="center-img" id="img-timothy">
            <img src="Picture/Darryl.jpg" id="img-darryl">
        </div>
        <div id="bio-rijalu" class="bio">
            <img src="Picture/Achmad Rijalu.jpg">
            <div class="profile">
                <p>Achmad Rijalu</p>
                <p class="jabatan">Founder</p>
            </div>
        </div>
        <div id="bio-timothy" class="bio"> 
            <img src="Picture/Timothy.jpg">
            <div class="profile">
                <p>Timothy</p>
                <p class="jabatan">Founder</p>
            </div>
        </div>
        <div id="bio-darryl" class="bio">
            <img src="Picture/Darryl.jpg">
            <div class="profile">
                <p>Darryl</p>
                <p class="jabatan">Founder</p>
            </div>
        </div>
    </div>

    <div class="box-feedback">
        <h1>Feedback</h1>
        <p class="divider"></p>

        <div class="judul-feedback">
            <h2>Berikan feedback</h2>
            <p class="deskripsi">
                Berikan feedback mengenai website ini kepada kami
                sehingga kami bisa terus mengembangkan website ini demi kenyamanan Anda.
            </p>
        </div>

        <div class="judul-form-feedback">
            <h2>Form feedback</h2>
            <div class="user-msg-profile">
                <?php require_once("feedback_controller.php");
                    session_start();
                    if(!empty($_SESSION)){
                        $nama = $_SESSION["nama"];
                ?>
                <h1>Hi, <?=$nama?></h1>
                <?php
                    }else{
                ?>
                <!-- <h2>Mohon untuk SIGN IN terlebih dahulu</h2> -->
                <?php
                    }
                ?>
                <h1>Hi, XYZ</h1> <!-- code ini untuk trial -->
            </div>

            <div class="form">
                
                <form action="about_us.php" method="post">
                    Feedback:
                    <textarea name="message" cols="30" rows="15"></textarea><br>
                    <br>
                    <input type="submit" value="Submit feedback">
                </form>
                <?php
                    if(!empty($_POST)){
                        $nama = "xyz";
                        $message = $_POST["message"];
                        create_data($nama, $message);
                    }
                ?>
            </div>
            
        </div>
        <footer>
            Thank you for your feedback!
        </footer>
    </div>
    
    <script>
        $("#bio-timothy").hide();
        $("#bio-darryl").hide();

        $("#img-rijalu").click(
            function(){
                $("#bio-rijalu").show("slow");
                $("#bio-timothy").hide("slow");
                $("#bio-darryl").hide("slow");
            }
        );

        $("#img-rijalu").mouseover(
            function(){
                $("#img-rijalu").addClass("chosen-img");
                $("#img-timothy").removeClass("chosen-img");
                $("#img-darryl").removeClass("chosen-img");
            }
        );

        $("#img-timothy").click(
            function(){
                $("#bio-rijalu").hide("slow");
                $("#bio-timothy").show("slow");
                $("#bio-darryl").hide("slow");
            }
        );

        $("#img-timothy").mouseover(
            function(){
                $("#img-rijalu").removeClass("chosen-img");
                $("#img-timothy").addClass("chosen-img");
                $("#img-darryl").removeClass("chosen-img");
            }
        );

        $("#img-darryl").click(
            function(){
                $("#bio-rijalu").hide("slow");
                $("#bio-timothy").hide("slow");
                $("#bio-darryl").show("slow");
            }
        );

        $("#img-darryl").mouseover(
            function(){
                $("#img-rijalu").removeClass("chosen-img");
                $("#img-timothy").removeClass("chosen-img");
                $("#img-darryl").addClass("chosen-img");
            }
        );

        $("#menu-icon").hide();
        
        $(window).resize(
            function() {
                if (window.matchMedia('(max-width: 640px)').matches) {
                    $("#menu-icon").show();
                    $(".navbar").hide();
                }else{
                    $("#menu-icon").hide();
                    $(".navbar").show();
                }
            }
        );

        if($(window).width() < 640){
            $(".navbar").hide();
            $("#menu-icon").show();
        }
        
        $(".menu-navbar").hide();

        $("#menu-icon").click(
            function(){
                $(".menu-navbar").slideToggle();
            }
        );
            
    </script>
</body>
</html>