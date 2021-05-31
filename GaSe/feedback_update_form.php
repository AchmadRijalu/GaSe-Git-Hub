<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GaSe | User update</title>
    <link rel="stylesheet" href="feedback_crud.css">
</head>
<body>
    <a href="user_update_feedback.php" class="back">Back</a> <br><br>
    <?php require_once("feedback_controller.php");
        $id = $_GET["id_updated"];
        $data = read_by_id($id);
        $nama = $data["nama"];
        $feedback = $data["feedback"];
    ?> 
    <form action="feedback_update_result.php" method="POST">
        Nama: <input type="text" name="nama" value="<?=$data["nama"]?>" readonly> <br>
        Feedback: <input type="text" name="feedback" value="<?=$data["feedback"]?>"> <br>
        <input type="hidden" name="id" value="<?=$id?>">
        <br>
        <input type="submit" value="Update">
    </form>

</body>
</html>
