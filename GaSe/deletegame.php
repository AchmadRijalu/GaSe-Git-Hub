<?php
include 'controller.php';



$delete = $_GET['id'];

    if(hapus($delete) > 0){

        header('Location: index.php');
    }
    else{
        echo "Data Gagal dihapus";
        echo "<br>";
        echo mysqli_error($conn);
    }




?>