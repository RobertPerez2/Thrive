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
            <li class="navbar-item active-item">
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
            <?php
              if(isset($_SESSION['userID'])) {
                echo "<li class='navbar-item'><a href='myposts.php' id='myposts'>My Posts</a></li>";
                echo "<li class='navbar-item'><a href='includes/logout.inc.php' id='logout'>Logout</a></li>";
              } else {
                echo "<li class='navbar-item'><a href='login.php' id='login'>Log In / Sign Up</a></li>";
              }
            ?>
          </ul>
      </div> <!-- sidebar -->

      <!-- post section -->
      <div class="container" id="postsection">
        <div class="row section-title">
          <h3 class="col-12 mt-4"> POST </h3>
        </div>

        <?php require_once 'includes/functions.inc.php'; getPost($_GET['postid']); ?>

        <div class="row section-title">
          <h5 class="col-12 mt-4"> REPLIES </h5>
        </div>
        <?php
          if(isset($_SESSION['userID'])) {
            echo
            "<div class='d-flex justify-content-center row'>
              <form id='reply-form' action='includes/reply.inc.php' method='POST'>
                  <div class='col-auto d-flex flex-row'>
                    <input type='hidden' name='postid' id='postid' class='form-control' value='" . $_GET['postid'] . "'>
                      <textarea type='text' name='reply' id='reply' class='form-control' placeholder='Have anything to share?'></textarea>
                      <button type='submit' name='reply-submit' id='reply-submit' class='btn btn-light btn-outline-secondary btn-lg'>Reply</button>
                  </div>
              </form>
            </div>";
          }
         ?>

            <?php require_once 'includes/functions.inc.php'; getReplies($_GET['postid']); ?>
        </div>
      </div> <!-- end of posts -->
    </div> <!-- wrapper -->

</body>
</html>