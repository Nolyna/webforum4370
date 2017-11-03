<!DOCTYPE html>
<?php
  session_start();
  include_once '../include/dbfunction.php';
  include_once '../include/postfunction.php';

  if(!isset($_GET['category'])){
    header("location:home.php");
  }else{
    $CID = $_GET['category'];
    $name = $_GET['cat'];
  }
?>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> Home </title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">

  </head>

  <body>
    <!-- Header -->
    <?php include '../template/navbar.php';?>

    <!-- Page Content -->
    <div class="container page-content">

          <?php
              echo '<h2> Posts from '.$name.'</h2> <br>';
              echo '<nav aria-label="breadcrumb" role="navigation">
                  <ol class="breadcrumb">';
              $categories = getCategories();
              foreach ($categories as  $i =>  $category) {
                echo' <li class="breadcrumb-item"><a href="categorypage.php?category='.$category["categoryID"].'&cat='.$category["categoryText"].'" >'.$category["categoryText"].'</a></li> ';
              }
              echo "</ol>
                    </nav><br>
                    <ul>";
              $posts = array_filter(getPostCat($CID));
              echo "<li>";
              if (empty($posts)) {
                  echo '<div class="jumbotron jumbotron-fluid">
                          <div class="container">
                            <p class="lead">Sorry, there is no posts in this category yet.</p>
                          </div>
                        </div>';
                }else{
                  foreach ($posts as $post) {
                    echo '<div class="card">
                      <div class="card-body">
                        <h4 class="card-title">'.$post["postTitle"].'</h4>
                        <h6 class="card-subtitle mb-2 text-muted"> Posted on '. $post["timestamp"].' </h6>
                        <p class="card-text"> '.substr($post["postText"], 0, 100).'....</p>
                        <a href="postdetails.php?post='.$post["postID"].'" class="card-link"> See more</a>
                      </div>
                    </div>';
                  }
                }
                echo "</li>";
                echo "</ul>";
          ?>


    </div>  <!-- /.container -->

    <!-- footer -->
    <?php include '../template/footer.html';?>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
