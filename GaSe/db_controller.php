<?php
    function connect(){
        $host = "localhost";
        $pass = "";
        $user = "root";
        $db = "gase";

        $connect = mysqli_connect($host, $user, $pass, $db)
        or die("Error: Koneksi gagal!");

        return $connect;
    }

    function close_conn($conn){
        mysqli_close($conn);
    }
?>