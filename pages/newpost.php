<?php
  session_start();
  include_once '../include/dbfunction.php';
	$db = dbconnect();
	$postTitle = $_POST["titleInput"];
	$postText = $_POST["textInput"];
	$catId = $_POST["cat"];
  $uid = $_SESSION["UID"];
	$stmt = $db->prepare(" INSERT INTO post(postTitle,postText, categoryID, userID)VALUES('$postTitle', '$postText', '$catId', '$uid') ");
	$stmt->execute();
	$db = null;
  header("location:profile.php");
?>
