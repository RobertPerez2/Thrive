<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In / Sign Up – Thrive</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="row" id="header">
        <h1 class="col-12 mt-4 text-center"> THRIVE </h1>
    </div>
    
    <div id="wrapper">

       <!-- sidebar -->
      <div class="container sidebar">
          <ul class="navbar">
            <li class="navbar-item">
              <a href="index.php">
                Home
              </a>
            </li>
            <li class="navbar-item">
              <a href="bigbook.php">
                Summary
              </a>
            </li>
            <li class="navbar-item">
              <a href="resources.php">
                Resources
              </a>
            </li>
            <li class="navbar-item active-item">
            <a href="login.php">
                Log In / Sign Up
            </a>
            </li>
          </ul>
      </div> <!-- sidebar -->

      <!-- post section -->
      <div class="container" id="postsection">
        <div class="row section-title">
          <h3 class="col-12 mt-4"> LOG IN / SIGN UP </h3>
        </div>
        <div class="mt-4" id="login" >
            <h4 class='join'>Log In</h4> <hr>
            <form id="login-form" action="includes/login.inc.php" method="POST">
                <div class="form-group">
                        <label for="login-email" class="col-sm-2 form-label">Email:</label>
                        <div class="col-sm-10">
                            <input type="text" name="login-email" class="form-control" placeholder="ttrojan@gmail.com" id="login-email">

                        </div>
                    </div>

                    <div class="form-group mt-2">
                        <label for="login-password" class="col-sm-2 form-label">Password:</label>
                        <div class="col-sm-10">
                            <input type="password" name="login-password" class="form-control" placeholder="*********" id="login-password">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                            <div class="col-sm-10">
                                <button type="submit" name="login-submit" class="btn btn-light btn-outline-secondary">Login</button>
                            </div>
                    </div>
            </form>
            <div class="errors mt-3">
            <?php
                if(isset($_GET['error'])) {
                    if($_GET['error'] == "emptylogin") {
                        echo "<small class='form-text text-danger'>Fill in all required fields.</small>";
                    } else if($_GET['error'] == "wronglogin") {
                        echo "<small class='form-text text-danger'>Wrong email and/or password.</small>";
                    }
                } 
            ?>
            </div>

        </div>
        
        <div class="register mt-5" id="signup">
            <h4 class='join'>Sign Up</h4> <hr>

            <!-- <p class="mt-0">Password must contain at least one of each:</p>
                <ul style="columns:2;">
                    <li>Uppercase character</li>
                    <li>Lowercase character</li>
                    <li>Digit</li>
                    <li>Special character !, @, #, $, %, ^, &, or *. </li>
                </ul> -->
            <form id="signup-form" action="includes/signup.inc.php" method="POST">
                    <div class="form-group">
                        <label for="signup-email" class="col-sm-2 form-label">Email:</label>
                        <div class="col-sm-10">
                            <input type="text" name="signup-email" class="form-control" placeholder="ttrojan@gmail.com" id="signup-email">
                        </div>
                    </div> <!-- .form-group -->

                    <div class="form-group mt-2">
                        <label for="signup-password" class="col-sm-2 form-label">Password:</label>
                        <div class="col-sm-10">
                            <input type="password" name="signup-password" class="form-control" placeholder="*********" id="signup-password">
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="signup-confirm" class="col-sm-4 form-label">Confirm Password:</label>
                        <div class="col-sm-10">
                            <input type="password" name="signup-confirm" class="form-control" placeholder="*********" id="signup-confirm">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                            <div class="col-sm-10">
                                <button type="submit" name="signup-submit" class="btn btn-light btn-outline-secondary">Sign Up</button>
                            </div>
                    </div>
                </div>
            </form>

            <!-- error handling -->
            <div class="errors mt-3">
            <?php
                if(isset($_GET['error'])) {
                    if($_GET['error'] == "emptyinput") {
                        echo "<small class='form-text text-danger'>Fill in all required fields.</small>";
                    } else if($_GET['error'] == "invalidemail") {
                        echo "<small class='form-text text-danger'>Invalid email.</small>";
                    } else if($_GET['error'] == "passwordsdontmatch") {
                        echo "<small class='form-text text-danger'>Passwords do not match.</small>";
                    } else if($_GET['error'] == "stmtfailed") {
                        echo "<small class='form-text text-danger'>Something went wrong, try again.</small>";
                    } else if($_GET['error'] == "emailtaken") {
                        echo "<small class='form-text text-danger'>Email taken.</small>";
                    }
                } 
            ?>
            </div>

        </div>

      </div> <!-- end of posts -->
    </div> <!-- wrapper -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="emailValidation.js"></script>
</body>
</html>