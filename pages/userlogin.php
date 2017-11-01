<?php
	function userlogin($email, $password) {
		$db = new PDO("mysql:host=localhost;dbname=csc4370forum", "root", "");
		if($email != "" && $password != ""){
			$stmt = $db->query("SELECT email, password FROM user WHERE email =" .$email. " AND password=" .$password. "");
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			if($email == $result["email"] && $password == $result["password"]){
				header("location:home.php");
			} else {
				header("location:login.php");
			}
		}
	}
?>