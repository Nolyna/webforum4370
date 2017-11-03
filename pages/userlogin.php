<?php
	function userlogin($email, $password) {
		$db = new PDO("mysql:host=localhost;dbname=csc4370forum", "root", "");
		if($email != "" && $password != ""){
			$stmt = $db->query("SELECT * FROM user WHERE email ='$email' ");
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			if($password == $result["password"]){
				$_SESSION["username"] = $result["username"];
				$_SESSION["UID"] = $result["userID"];
				if($result["typeID"] == 1){
					$_SESSION["admin"] = true;
				}else {
					$_SESSION["admin"] = false;
				}
				header("location:home.php");
			} else {
				header("location:login.php");
			}
		}
	}
?>
