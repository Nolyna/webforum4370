<?php
	include_once '../include/dbfunction.php';
	$db = dbconnect();
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$userType = 1;
	$stmt = $db->prepare("INSERT INTO user(username, email, password, firstName, lastName, typeID)VALUES('$username', '$email', '$password', '$firstname', '$lastname', '$userType')");
	$stmt->execute();
	
	$stmt2 = $db->prepare("SELECT userID FROM user WHERE email='$email' ");
	$stmt2->execute();
	$id = $stmt2->fetchColumn(0);
	$message = "Registration successful.";
	$_SESSION["username"] = $username;
	$_SESSION["UID"] = $id;
	$_SESSION["admin"] = true;
	header("location:login.php");
	$db = null;
?>
