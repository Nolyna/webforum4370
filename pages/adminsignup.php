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
	$db = null;
  header("location:profile.php");
?>
