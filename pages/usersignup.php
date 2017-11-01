<?php
	$db = new PDO("mysql:host=localhost;dbname=csc4370forum", "root", "");
	try {
		//connect as appropriate as above
		$db->query('hi'); //invalid query!
	} catch(PDOException $ex) {
		echo "An Error occured!"; //user friendly message
	}
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$userType = 2;
	$stmt = $db->prepare("INSERT INTO user(username, email, password, firstName, lastName, typeID)VALUES('$username', '$email', '$password', '$firstname', '$lastname', '$userType')");
	/*$num = mysql_fetch_row($query);*/
	/*if($num > 0){
		$message = "The username name" .$name. "or email" .$email. "already exists.";
	} else {
		$in = $db->query("INSERT INTO user VALUES(".$username.",".$password.", ".$email.", ".$firstname.",".$lastname.")");*/
	if($stmt->execute()){
		$message = "Registration successful.";
		$_SESSION["username"] = $username;
		$_SESSION["UID"] = $db->query("SELECT userID FROM user WHERE email=" .$email. "");
		$_SESSION["admin"] = false;
		header("location:home.php");
	} else {
		$message = "Registration failed.";	
		header("location:signup.php");
	}
	$db = null;
?>