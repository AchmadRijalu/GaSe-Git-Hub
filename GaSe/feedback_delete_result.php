<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GaSe | Feedback delete result</title>
    <link rel="stylesheet" href="feedback_crud.css">
</head>
<body>
    <?php require_once("feedback_controller.php");
        $id_deleted = $_GET['id_deleted'];
        $response = delete_data($id_deleted);
        echo $response;
    ?>
    <br><br>
    <a href="admin_delete_feedback.php" class="back">Back</a>
</body>
</html>



