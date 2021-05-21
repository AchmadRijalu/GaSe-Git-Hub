<?php 
// balik ke halaman login
session_start();
session_destroy();
header('Location: login.php'); 

?>