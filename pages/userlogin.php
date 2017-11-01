<?php
	function dbconnect(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$conn = mysql_connect($servername, $username, $password);
		if (!$conn){
			return $conn;
		}
		
	}
	function userlogin($email, $password) {
		if($email != "" && $password != ""){
			$query = mysql_query("SELECT * FROM user WHERE email =" .$email. " AND password=" .$password. "") or die(mysql_error());
			$result = mysql_fetch_row($query);
			$i = 2;
			$j = 3;
			if($email == mysql_fetch_field($result, $i) && $password == mysql_fetch_field($result, $j)){
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
?>