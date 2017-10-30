<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Login page">
        <meta name="author" content="">
        <title>Login</title>

        <!--  CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/log.css" rel="stylesheet">

    </head>

    <body>
        <?php include '../template/navbar.php';?>
        <!-- Page Content -->
        <div class="container-fluid">

            <div class="row">

                <div class="media">
                    <img class="align-self-center mr-1" src="../assets/door.jpeg" alt="Generic placeholder image">
                    <div class="media-body justify-content-md-center">
                        <form>
                            <h2> Login</h2>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

        

        <!-- Bootstrap core JavaScript -->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>

</html>
