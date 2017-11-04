<div class="btn-group">
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse" aria-expanded="false" aria-controls="collapse">
    Create a new post
  </button>
    <form action="newpost.php" method="post" class="collapse" id="collapse">
      <div class="form-group">
        <label for="titleInput">Title</label>
        <input type="text" class="form-control" id="titleInput" name="titleInput">
      </div>
      <div class="form-group">
        <label for="textInput">Enter your message</label>
        <textarea class="form-control" id="textInput" name="textInput" rows="4" required></textarea>
      </div>
      <div class="form-group">
        <label for="Select">Select category</label>
        <select class="form-control" id="Select" name="cat">
          <?php
          $categories = getCategories();
          foreach ($categories as  $i =>  $category) {
            echo '<option value='.$category["categoryID"].'>'.$category["categoryText"].'</option>';
          }
          ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

<br>
<hr>

<div>
  <?php
    echo "<ul>";
    $posts = array_filter(getUserPost($_SESSION["UID"]));
    echo "<li>";
    if (empty($posts)) {
    echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
              <p class="lead">Sorry, You did not write posts yet.</p>
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
</div>
