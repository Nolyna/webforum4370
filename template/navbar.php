<header>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

    <div class="container">
      <a class="navbar-brand" href="home.php">Forum </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <form class="form-inline">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </li>
          <?php
            if(isset($_SESSION['username']) && !empty($_SESSION['username'])){
              echo '<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                '.$_SESSION["username"].'
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="profile.php"> Dashboard</a>
                  <a class="dropdown-item" href="logout.php"> Logout</a>
                </div>
              </li>';
            }else{
              echo
              '<li class="nav-item active">
                <a class="nav-link" href="login.php">Login /</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="signup.php">Signup</a>
              </li>';
            }
          ?>

        </ul>
      </div>
    </div>

  </nav>

</header>
