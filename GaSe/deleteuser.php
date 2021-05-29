<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <link rel="stylesheet" href="deleteuser.css">
</head>
<body>
    <h1>Delete User</h1>

    <form method="POST">
        <ul>
        <li> <label> Input ID : <input type="text" name="inputid"> </label><br> <br> </li>
        </ul>
     <input type="submit" class="btn" name="Delete" value="Delete"> <br> <br>
    </form>
   <a href="index.php"><input type="submit" class="btn" name="Back" value="Back"></a>
    <?php 
    include_once ('db_connect.php');
    $connect = connectDB();
    if(isset($_POST['Delete'])) {
        $inputid = $_POST['inputid'];
        $delete = "DELETE FROM user WHERE id='$inputid'";
        $act = mysqli_query($connect, $delete) or die (mysqli_error($connect));
    }
    ?>
</body>
</html>