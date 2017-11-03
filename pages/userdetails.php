<!DOCTYPE html>
<?php
  session_start();
  include_once '../include/dbfunction.php';
  include_once '../include/userfunction.php';

  $users = getuser($_GET["user"]);
  foreach ($users as  $i => $user) {
    $userName = $user['username'];
    $userAbout = $user['about'];
    $userEmail = $user['email'];
  }
?>
?>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Home </title>

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/blog-post.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">

  </head>

  <body>
    <!-- Header -->
    <?php include '../template/navbar.php';?>

    <!-- Page Content -->
    <div class="container page-content">

      <section class="row">
        <ul>
          <li><h3>Username: <?php echo $userName; ?> </h3></li>
          <li><p> Email address: <?php echo   $userEmail; ?></p></li>
          <li><p> About Him: <?php echo   $userAbout; ?></p></li>

          <li><button type="button" class="btn btn-success"> update </button></li>
        </ul>
      </section>
      <hr>
      <section class="row justify-content-center">
        <div class="card" style="width: 10rem;">
          <div class="card-body">
            <h4 class="card-title">Posts</h4>
            <p class="card-text"><h4><span class="badge badge-secondary"><?php echo countUserPost($_GET["user"]); ?></span></h4></p>
            <a href="#posts" class="card-link"> See</a>
          </div>
        </div>
        <div class="card" style="width: 10rem;">
          <div class="card-body">
            <h4 class="card-title">Comments</h4>
            <p class="card-text"><h4><span class="badge badge-secondary"><?php echo countUserComments($_GET["user"]); ?> </span></h4></p>
          </div>
        </div>
        <div class="card" style="width: 10rem;">
          <div class="card-body">
            <h4 class="card-title">Like</h4>
            <p class="card-text"><h4><span class="badge badge-secondary"><?php echo countUserLike($_GET["user"]); ?></span></h4></p>
          </div>
        </div>

      </section>


    </div>  <!-- /.container -->

    <!-- footer -->
    <?php include '../template/footer.html';?>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
