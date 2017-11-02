<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Dashboard </title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/profile.css" rel="stylesheet">

  </head>

  <body>
    <!-- Header -->
    <?php include '../template/navbar.php';?>

    <!-- Page Content -->
    <div class="container-fluid">

      <div class="row">

        <!-- Content Column -->
        <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
            <!-- Tab list -->
            <ul class="nav nav-pills flex-column" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="posts-tab" data-toggle="pill" href="#posts" role="tab" aria-controls="posts" aria-selected="false">My posts</a>
                </li>
                <?php
                  if(isset($_SESSION['admin']) && $_SESSION['admin']== true){
                    echo
                      '<li class="nav-item">
                          <a class="nav-link" id="overview-tab" data-toggle="pill" href="#overview" role="tab" aria-controls="overview" aria-selected="false">Overview</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link " id="message-tab" data-toggle="pill" href="#message" role="tab" aria-controls="message" aria-selected="false">Message</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link " id="users-tab" data-toggle="pill" href="#users" role="tab" aria-controls="users" aria-selected="false">Users</a>
                      </li>';
                  }
                ?>
                <li class="nav-item">
                    <a class="nav-link " id="settings-tab" data-toggle="pill" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="help-tab" data-toggle="pill" href="#help" role="tab" aria-controls="help" aria-selected="false">Help</a>
                </li>
            </ul>
          </nav>
          <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade" id="overview" role="tabpanel" aria-labelledby="overview-tab"> <?php include 'overview_tab.php'; ?></div>
              <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab"><?php include 'profile_tab.php'; ?></div>
              <div class="tab-pane fade" id="posts" role="tabpanel" aria-labelledby="posts-tab"><?php include 'posts_tab.php'; ?></div>
              <div class="tab-pane fade" id="messages" role="tabpanel" aria-labelledby="messages-tab"><?php include 'messages_tab.php'; ?></div>
              <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="users-tab"><?php include 'users_tab.php'; ?></div>
              <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab"><?php include 'setting_tab.php'; ?></div>
              <div class="tab-pane fade" id="help" role="tabpanel" aria-labelledby="help-tab"><?php include 'help_tab.php'; ?></div>
            </div>
          </main>
        </div>
    </div>
    <!-- /.container -->

    <!-- footer -->
    <?php// include '../template/footer.html';?>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
