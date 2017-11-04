<!DOCTYPE html>
<?php
  session_start();
?>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> LogOut </title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>
    <?php
      session_destroy();
      echo '<img src="https://betanews.com/wp-content/uploads/2015/01/byegood-600x441.jpg" alt="BYE BYE" >';
      echo "<h2> Logging You out </h2><p class='small'> You will be redirected soon. If not <a href='home.php'> click here</a></p>";
      header( "refresh:5;url=home.php" );
    ?>
  </body>

  </html>
