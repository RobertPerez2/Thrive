<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Thrive </title>
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
              <a href="index.php" id="community">
                Home
              </a>
            </li>
            <li class="navbar-item">
              <a href="bigbook.php" id="bigbook">
                Summary
              </a>
            </li>
            <li class="navbar-item">
              <a href="resources.php" id="resources">
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

        <?php
          if(isset($_SESSION['userID'])) {
            echo
            "<div class='d-flex justify-content-center row'>
              <form id='post-form' action='includes/post.inc.php' method='POST'>
                  <div class='col-auto d-flex flex-row'>
                      <div class='col-sm m-2'>
                        <img src='img/iconhead2.png' class='pfp' alt='profile'>
                      </div>
                      <textarea type='text' name='message' id='message' class='form-control' placeholder='How are you feeling today?'></textarea>
                      <button type='submit' name='post-submit' id='post-submit' class='btn btn-light btn-outline-secondary btn-lg'>Post</button>
                  </div>
              </form>
            </div>";
          } else {
            echo "<div class='d-flex justify-content-center row m-1'>
            <div class='col-auto'>
            <p class='medium'> <a href='login.php' class='join'><strong>Sign Up</strong></a> to join a supportive community where you can share your journey, connect with others in recovery, and get inspired to keep moving forward. </p>
                <p class='small'> <strong class='join' style='text-decoration: none;'>*</strong> We prioritize your privacy and security. We don't store any personal information besides your email address, which we use solely for moderation purposes. We believe that your journey to recovery is personal and private, and we want to ensure that our platform supports that.</p>
            </div></div>";
          }
        ?>
        
        
        <div class="row section-title">
          <h3 class="col-12 mt-4"> RECENT POSTS</h3> <hr>
        </div>

        <?php require_once 'includes/functions.inc.php'; getPosts(); ?>

      </div> <!-- end of posts -->
    </div> <!-- wrapper -->

  </body>
</html>