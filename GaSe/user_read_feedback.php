<?php require_once("feedback_controller.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GaSe | User read</title>
    <link rel="stylesheet" href="feedback_crud.css">
</head>
<body>
    <h1>Your Feedback</h1>
    <a href="about_us.php" class="back">Back</a> <br><br>
    <?php
        $data = user_read_data($_SESSION["id_user"]);
        foreach($data as $i){
            echo "----------------------------------- <br>";
            echo $i["nama"] . " : " . $i["feedback"] . "<br><br>";
        }
    ?>
</body>
</html>