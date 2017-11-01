<?php
	$db = new PDO("mysql:host=localhost;dbname=csc4370forum", "root", "");
	function userlogin($db) {
		$email = $_POST["email"];;
		$password = $_POST["password"];
		if($email != "" && $password != ""){
			$stmt = $db->query("SELECT * FROM user WHERE email =" .$email. " AND password=" .$password. "");
			/*$result = mysql_fetch_row($query);*/
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