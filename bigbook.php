<?php
  session_start();
?>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Thrive–Big Book </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        #steps {
            color: white;
        }
        section {
            margin-top: 5px;
        }
        h6 {
          background-color: #B4D3B2;
          background-image: linear-gradient(60deg, #B4D3B2, #306C48);
          background-size: 100%;
          -webkit-background-clip: text;
          -moz-background-clip: text;
          -webkit-text-fill-color: transparent; 
          -moz-text-fill-color: transparent;
        }
    </style>

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
            <li class="navbar-item active-item">
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
          <h3 class="col-12 mt-4"> PROJECT SUMMARY </h3> <hr>
        </div>
            <p class="section">
            Thrive is a web application dedicated to supporting individuals in their addiction recovery journey, specifically related to alcoholism. The platform provides a safe and supportive environment where users can share their thoughts and experiences anonymously and find validation and community through shared struggles, based on Alcoholics Anonymous.
            </p>
            <p>
            The project was curated for individuals struggling with alcohol addiction and are seeking support, community, and resources to aid them along their recovery journey. The platform may also extend to family members or loved ones who have been directly affected by individuals struggling with alcohol addiction and are also looking for support.   
            </p>
            <h6>HOW THE SITE WORKS</h6> <hr>
            <p> Thrive is built through PHP, providing a responsive mobile-first web design, and an interactive user-friendly interface. The site also takes advantage of the Bootstrap CSS Framework, alongside HTML, and JavaScript. It provides full CRUD functionality built through frontend ↔ backend AJAX (JavaScript ↔ PHP) interactions and an original design with consistency across its seven distinct pages. </p>
            <p>The platform allows for everyone to browse a few select pages, and the database of posts and replies. However, we provide two separate permission levels for general and registered users. We prioritize your privacy and security so we don't store any personal information besides your email address, which we use solely for moderation purposes and to provide different features. We believe that your journey to recovery is personal and private, and we want to ensure that our platform supports that.</p>
            <p>Once guests have either registered a new account, or signed in, they are granted the ability to make posts, create replies, and look back at their own posts, where they can edit and/or delete them as they wish. These community home, personal posts, and reply pages are populated through event-driven DOM manipulation, where the page dynamically updates with the insertion of a new reply/post. </p>
            <p>In the site’s login authentication system, user input validation is implemented where we handle all user errors and interactions (displaying error messages where applicable). Password are encrypted and we check if the emails provided are properly formatted and unique through our own designed and normalized MySQL database. Thrive’s schema provides three (3) tables and three (3) table relationships for users, posts, and replies. It has been populated with real posts made on the community of r/alcoholicsanonymous from reddit. Lastly, we utilize session storage as a mechanism to store your user identification across pages.</p>
            <p>In summary, Thrive is a web application that provides a safe and supportive environment for individuals struggling with addiction. It offers a platform where users can share their thoughts and experiences anonymously and find validation and community through shared struggles.</p>

            <h6>DATABASE SCHEMA</h6> <hr>
            <img class='database' src='img/database.png' alt='databaseimg'>
      </div> <!-- end of posts -->
    </div> <!-- wrapper -->

  </body>
</html>