<!DOCTYPE html>
<?php
  session_start();
  include_once '../include/dbfunction.php';
  include_once '../include/postfunction.php';
  
  if(isset($_GET['search'])){
    $results =  array_filter(searchPost($_GET['search']) );   
  }else{
	  $results = array();
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
    <link href="../css/blog-post.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">

  </head>

  <body>
    <!-- Header -->
    <?php include '../template/navbar.php';?>

    <!-- Page Content -->
    <div class="container page-content">

        <!-- Content Column -->
        <div class="">

            <div class="row">

              <!-- Tab Content column -->
              <div class="col-lg-8">
					<div class="tab-content" id="myTabContent">
						<?php
							  
							if (empty($results)) {
							  echo '<div class="jumbotron jumbotron-fluid">
									  <div class="container">
										<p class="lead">Sorry, there are no posts cooressponding to your search.</p>
									  </div>
									</div>';
							}else{
								foreach ($results as  $i => $result) {
									echo '<div class="card">
									  <div class="card-body">
										<h4 class="card-title">'.$result["postTitle"].'</h4>
										<h6 class="card-subtitle mb-2 text-muted"> Posted on '. $result["timestamp"].' </h6>
										<p class="card-text"> '.substr($result["postText"], 0, 100).'....</p>
										<a href="postdetails.php?post='.$result["postID"].'" class="card-link"> See more</a>
									  </div>
									</div>';
								}
							}
						?>
					</div>
              </div>

              <!-- Sidebar Widgets Column -->
              <div class="col-md-4">
                  <div class="card my-4">
                      <h5 class="card-header">Side Widget</h5>
                      <div class="card-body">
                      Hello, I am side widget! Want to see something fun?<br>
                      <a href="https://www.pinterest.com/pin/457256168389539279/" target="_blank" > CLICK ME </a>
                      </div>
                  </div>
              </div>
          </div> <!-- /.row -->
        </div>

    </div>  <!-- /.container -->

    <!-- footer -->
    <?php include '../template/footer.html';?>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
