<div class="row">
  <div class="col-md-7">

    <?php
      $users = array_filter(getUserAdmin());
      if (empty($users)) {
      echo '<div class="jumbotron jumbotron-fluid">
              <div class="container">
                <p class="lead">Sorry, You do not have other admins yet.</p>
              </div>
            </div>';
      }else{
        echo '<table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Username</th>
        </tr>
      </thead>
      <tbody>' ;

      foreach ($users as $i => $user) {
        echo '
          <tr">
            <td>'.$i.'</td>
            <td>'.$user["firstName"].' </td>
            <td>'.$user["lastName"].'</td>
            <td>'.$user["username"].'</td>
          </tr>';
      }
      echo' </tbody></table>';
      }
    ?>
  </div>
  <div class="col-md-3">
    <form action = "adminsignup.php" method = "post">
        <h2> Add admin user </h2>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name = "username" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" id="firstname" name = "firstname" placeholder="First Name">
        </div>
         <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" id="lastname" name = "lastname" placeholder="Last Name">
        </div>
         <div class="form-group">
            <label for="email">Email address</label>
            <input type="text" class="form-control" id="email" name = "email" aria-describedby="emailHelp" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name = "password" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
