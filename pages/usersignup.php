<?php
	function usersignup() {
		mysql_connect("","","") or die(mysql_error());
		mysql_select_db("csc4370forum") or die(mysql_error());
		$username = $_POST["username"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$query = mysql_query("SELECT * FROM user WHERE name ="'.$username.'"or email="'.$email.'"") or die(mysql_error());
		$num = mysql_fetch_row($query);
		if($num > 0){
			$message = "The username name '.$name.' or email '.$email.' already exists.";
		} else {
			$in = mysql_query("INSERT INTO user VALUES("'.$username.'","'.$password.'", "'.$email.'", "'.$firstname.'","'.$lastname.'")") or die(mysql_error());
			if($in){
				$message = "Registration successful.";
			} else {
				$message = "Registration failed.";	
			}
		}
	}
?>