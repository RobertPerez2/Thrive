<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Posts–Thrive</title>
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
              <a href="myposts.php">
                My Posts
              </a>
            </li>
            <li class="navbar-item">
              <a href="includes/logout.inc.php" id="logout">
                Logout
              </a>
            </li>
          </ul>
      </div> <!-- sidebar -->

      <!-- post section -->
      <div class="container" id="postsection">
        <div class="row section-title">
          <h3 class="col-12 mt-4"> MY POSTS </h3> <hr>

          <?php require_once 'includes/functions.inc.php'; myPosts($_SESSION["userID"]); ?>
        </div>
      </div> <!-- end of posts -->
    </div> <!-- wrapper -->

</body>
</html>