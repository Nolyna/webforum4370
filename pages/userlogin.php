<?php
	$db = new PDO("mysql:host=localhost;dbname=csc4370forum", "root", "");
	function userlogin($db) {
		$email = $_POST["email"];;
		$password = $_POST["password"];
		if($email != "" && $password != ""){
			$stmt = $db->query("SELECT email, password FROM user WHERE email =" .$email. " AND password=" .$password. "");
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
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