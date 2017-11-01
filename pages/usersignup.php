<?php
	$db = new PDO("mysql:host=localhost;dbname=csc4370forum", "root", "");
	function usersignup($db) {	
		$username = $_POST["username"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$userType = 2;
		$stmt = $db->query("INSERT INTO user(username, email, password, firstName, lastName, typeID)VALUES($username, $email, $password, $firstname, $lastname, $userType)");
		/*$num = mysql_fetch_row($query);*/
		if($num > 0){
			$message = "The username name" .$name. "or email" .$email. "already exists.";
		} else {
			$in = $db->query("INSERT INTO user VALUES(".$username.",".$password.", ".$email.", ".$firstname.",".$lastname.")");
			if($in){
				$message = "Registration successful.";
				$_SESSION["username"] = $username;
				$_SESSION["UID"] = $db->query("SELECT userID FROM user");
				$_SESSION["admin"] = false;
				
			} else {
				$message = "Registration failed.";	
			}
		}
	}
?>