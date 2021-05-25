<?php 
class database{
	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "gase";
	var $koneksi;

	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
	}


	function register($username,$email,$password)
	{	
		$insert = mysqli_query($this->koneksi,"insert into user values ('','$username','$email','$password')");
		return $insert;
	}

	function login($username,$email,$password)
	{
		$query = mysqli_query($this->koneksi,"select * from user where username='$username'");
		$data_user = $query->fetch_array();
		if(password_verify($password,$data_user['password']))
		{
			$_SESSION['username'] = $username;
            $_SESSION['email'] = $data_user['email'];
			$_SESSION['is_login'] = TRUE;
			return TRUE;
		}
	}
}
?>