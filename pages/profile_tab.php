<section class="row">
  <ul>
    <li><h3><?php echo $userName; ?> </h3></li>
    <li><p> username : <?php echo $_SESSION["username"]; ?> </p></li>
    <li><p> Email address: <?php echo   $userEmail; ?></p></li>
    <li><p> About you: <?php echo   $userAbout; ?></p></li>

    <li><button type="button" class="btn btn-success"> update </button></li>
  </ul>
</section>
<hr>
<section class="row justify-content-center">
  <div class="card" style="width: 10rem;">
    <div class="card-body">
      <h4 class="card-title">Posts</h4>
      <p class="card-text"><h4><span class="badge badge-secondary"><?php echo countUserPost($_SESSION["UID"]); ?></span></h4></p>
      <a href="#posts" class="card-link"> See</a>
    </div>
  </div>
  <div class="card" style="width: 10rem;">
    <div class="card-body">
      <h4 class="card-title">Comments</h4>
      <p class="card-text"><h4><span class="badge badge-secondary"><?php echo countUserComments($_SESSION["UID"]); ?> </span></h4></p>
    </div>
  </div>
  <div class="card" style="width: 10rem;">
    <div class="card-body">
      <h4 class="card-title">Like</h4>
      <p class="card-text"><h4><span class="badge badge-secondary"><?php echo countUserLike($_SESSION["UID"]); ?></span></h4></p>
    </div>
  </div>

</section>
