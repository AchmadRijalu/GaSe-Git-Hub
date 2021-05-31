<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GaSe | Admin delete</title>
    <link rel="stylesheet" href="feedback_crud.css">
</head>
<body>
    <h1>Delete user feedback</h1>
    <a href="about_us.php" class="back">Back</a><br><br>
    <?php require_once("feedback_controller.php");
        $data = read_data();
        $num = 1;
        foreach($data as $i){
    ?>
    -------------------------------------------------------------------------- <br>
    <h3><?=$num?></h3>
    <p>ID user: <?=$i["id"]?></p>
    <p>Nama: <?=$i["nama"]?></p>
    <p>Feedback: <?=$i["feedback"]?></p>
    <button><a href="feedback_delete_result.php?id_deleted=<?=$i['id']?>">Delete</a></button><br>
    <?php
        $num++;
        }
    ?>
</body>
</html>