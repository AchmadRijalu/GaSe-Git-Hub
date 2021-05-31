<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GaSe | User update feedback</title>
    <link rel="stylesheet" href="feedback_crud.css">
</head>
<body>
    <h1>Update feedback result</h1>
    <a href="user_update_feedback.php" class="back">Back</a> <br><br>
    <?php require_once("feedback_controller.php");
        if(!empty($_POST)){
            $id = $_POST["id"];
            $feedback = $_POST["feedback"];
            $response = update_data($id, $feedback);
            echo $response;
        }
    ?>
</body>
</html>
