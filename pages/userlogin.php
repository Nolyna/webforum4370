<!DOCTYPE html>
<?php
  session_start();
	include_once '../include/dbfunction.php';
	$db =   $db = dbconnect();
?>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> LogIn </title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>
    <div class="container justify-content-center">
    <?php
			if(isset($_POST["username"]) && isset($_POST["password"])){
					$email = $_POST["username"];
					$stmt = $db->prepare("SELECT * FROM user WHERE username ='$username' ");
					$stmt -> execute();
					$result = $stmt->fetch(PDO::FETCH_ASSOC);
					if($_POST["password"] == $result["password"]){
							$_SESSION["username"] = $result["username"];
							$_SESSION["UID"] = $result["userID"];
							if($result["typeID"] == 1){
								$_SESSION["admin"] = true;
							}else {
								$_SESSION["admin"] = false;
							}
							echo "<h2> Logging You in </h2>";
							echo '<iframe src="https://giphy.com/embed/VugKLmDpkUACs" width="480" height="360" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/2016-VugKLmDpkUACs">via GIPHY</a></p>';
				      header( "refresh:5;url=home.php" );
					} else {
							echo "<h2> Credetials incorrect, try again</h2>";
							echo "<p class='small'>You will be redirected soon. If not <a href='login.php'> click here</a></p>";
							header( "refresh:5;url=login.php" );
					}
			}else {
				header("location:login.php");
			}

    ?>
  </div>
  </body>

  </html>
