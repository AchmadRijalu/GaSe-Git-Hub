<?php 
class database{
	var $host = "localhost";
	var $username = "ucweb1_gase";
	var $password = "gaseadmin123";
	var $database = "ucweb1_gase";
	var $konek;
}

function connectDB() {
	 $host = "localhost";
	 $username = "ucweb1_gase";
	 $password = "gaseadmin123";
	 $database = "ucweb1_gase";

	$koneksi = mysqli_connect($host, $username, $password, $database)
	or die("Error!");

	return $koneksi;
}

	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
	}

	function myquery($query){
		$kon = connectDB();
		$result = mysqli_query($kon, $query);
		$rows = [];
		while($row = mysqli_fetch_assoc($result)){
			$rows[] = $row;
		}
		return $rows;
	}

	function register($username,$email,$password,$level) 
	{
    $level = 'guest'; 
		$query = "INSERT INTO `user`(`username`, `email`, `password`, `level`) VALUES('$username', '$email', '$password', '$level')";
		$result = mysqli_query(connectDB($koneksi), $query) or die(mysqli_error(connectDB($koneksi)));
	}

	function login($username,$email,$password)
	{
		$query = mysqli_query($this->koneksi,"SELECT * FROM `user` WHERE `username`='$username'");
		$data_user = $query->fetch_assoc();
		if(password_verify($password,$data_user['password']))
		{
			session_start();
			$_SESSION['username'] = $username;
            $_SESSION['email'] = $data_user['email'];
			$_SESSION['is_login'] = TRUE;
			$_SESSION['level'] = $data_user['level'];
			$_SESSION['id'] = $data_user['id'];
			return TRUE;
		}
	}
?>