<!DOCTYPE html>
<?php
session_start();
include_once '../include/dbfunction.php';
include_once '../include/postfunction.php';
 if(!isset($_GET['post'])){
   header("location:home.php");
 }else{
   $postId = $_GET['post'];
   $posts = getPostbyId($postId);

   foreach ($posts as  $post) {
     $PID =  $post['postTitle'];
     $UID = $post['userID'];
     $time = $post['timestamp'];
     $text =  $post['postText'];
   }

   $authors = getauthor($UID);
   foreach ($authors as  $i => $author) {
     $authName = $author['username'];
     $authAbout = $author['about'];
   }

   if(isset($_POST['commentext'])){
     //createPost($_POST['commentext'], $postId, $_SESSION["UID"]);
     createPost($_POST['commentext'], $postId, 1);
   }
 }
?>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Posts</title>

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/blog-post.css" rel="stylesheet">

  </head>

  <body>

    <!-- Header -->
    <?php include '../template/navbar.php';?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Title -->
          <h1 class="mt-4"><?php echo $PID; ?></h1>

          <!-- Author -->
          <p class="lead">
            by
            <a href="userdetails.php?user='<?php echo $UID; ?>'"><?php echo $authName; ?></a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p>Posted on <?php echo $time; ?></p>

          <hr>

          <!-- Post Content -->
          <p class="lead"> <?php echo $text; ?> </p>
          <hr>

          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form action="#" method="post">
                <div class="form-group">
                  <textarea class="form-control" rows="3" name="commentext"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>

          <!-- Single Comment -->
          <ul class="list-group">
          <?php
            $comments = getComments($postId);
            foreach ($comments as  $i => $comment) {
              //get author username
              $cauthors = getauthor($comment['userID']);
              foreach ($cauthors as  $i => $cauthor) {
                $cauthName = $cauthor['username'];
              }
              echo '<li class="list-group-item">';
              echo '  <div class="media mb-4">';
              echo '  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">';
              echo '  <div class="media-body">';
              echo '  <h5 class="mt-0">'.$cauthName.'</h5>';
              echo $comment['commentText'];
              echo '</div>';
              echo '</div>';
              echo "</li>";
              //$comment['timestamp'];
            }
          ?>
        </ul>


        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- User Widget -->
          <div class="card my-4">
            <h5 class="card-header"> Author </h5>
            <div class="card-body">
              <h6> <?php echo $authName; ?> </h6>
              <p><?php echo $authAbout; ?> </p>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <?php
                      $categories = getCategories();
                      foreach ($categories as  $i =>  $category) {
                          echo
                          '<li>
                              <a href="categorypage.php?category='.$category["categoryID"].'&cat='.$category["categoryText"].'" >'.$category["categoryText"].'</a>
                          </li>';
                      }
                    ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
