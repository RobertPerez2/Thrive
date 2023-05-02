<?php
  session_start();
?>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Thrive–Resources </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        a {
          color: #B4D3B2;
        }
        .resource-container {
          color: white;
        }
        .container {
          color: white;
        }
        p {
          color: white;
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
            <li class="navbar-item">
              <a href="bigbook.php">
                Summary
              </a>
            </li>
            <li class="navbar-item active-item">
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
          <h3 class="col-12 mt-4"> RESOURCES </h3> <hr>

          <div class='resource-container'>
            <p class="section">
              Alcoholics Anonymous, also known as the “Big Book,” presents the A.A. program for recovery from alcoholism. First published in 1939, its purpose was to show other alcoholics how the first 100 people of A.A. got sober. Now translated into over 70 languages, it is still considered A.A.’s basic text.
            </p>
          </div>

          <div class='resource-container'>
            <div class="row section-title">
              <h5 class="col-12 mt-4"> 12-STEP PROGRAM </h5> <hr>
            </div>

            <ol class= "section" id="steps">
              <li>
                  <p>
                      We admitted we were powerless over alcohol—that our lives had become unmanageable.
                  </p>
              </li>
              <li>
                  <p>
                      Came to believe that a Power greater than ourselves could restore us to sanity.
                  </p>
              </li>
              <li>
                  <p>
                      Made a decision to turn our will and our lives over to the care of God as we understood Him.
                  </p>
              </li>
              <li>
                  <p>
                      Made a searching and fearless moral inventory of ourselves
                  </p>
              </li>
              <li>
                  <p>
                      Admitted to God, to ourselves, and to another human being the exact nature of our wrongs.
                  </p>
              </li>
              <li>
                  <p>
                      Were entirely ready to have God remove all these defects of character
                  </p>
              </li>
              <li>
                  <p>
                      Humbly asked Him to remove our shortcomings.
                  </p>
              </li>
              <li>
                  <p>
                  Made a list of all persons we had harmed, and became willing to makeamends to them all.
                  </p>
              </li>
              <li>
                  <p>
                  Continued to take personal inventory and when we were wrong promptly admitted it.
                  </p>
              </li>
              <li>
                  <p>
                  Sought through prayer and meditation to improve our conscious contact with God as we understood Him, praying only for knowledge of His will for us and the power to carry that out.
                  </p>
              </li>
              <li>
                  <p>
                  Having had a spiritual awakening as the result of these steps, we tried to carry this message to alcoholics, and to practice these principles in all our affairs.
                  </p>
              </li>
            
            </div>

          
          <div class="row section-title">
            <h5 class="col-12 mt-4"> LINKS </h5> <hr>
          </div>

          <div class="row resource">
            <a href="https://www.samhsa.gov/find-help/national-helpline"> SAMHSA's National Helpline </a>
            <p>  SAMHSA's National Helpline is a free, confidential, 24/7, 365-day-a-year treatment referral and information service. </p>
          </div>
          <div class="row resource">
            <a href="https://www.aa.org/"> Alcoholics Anonymous Official Website</a>
            <p>  Have a problem with alcohol? There is a solution. A.A. has a simple program that works. It's based on one alcoholic helping another. </p>
          </div>
          <div class="row resource">
            <a href="https://al-anon.org/"> Al-Anon Family Groups </a>
            <p>  Al-Anon members are people, just like you, who are worried about someone with a drinking problem. </p>
          </div>
          <div class="row resource">
            <a href="https://al-anon.org/"> Find A.A. Near You </a>
            <p>  Contact one of the A.A. resources below for a meeting list in that location and the surrounding area. </p>
          </div>
          <div class="row resource">
            <a href="https://alcoholicsanonymous.com/"> Unofficial A.A. Meetings </a>
            <p>  Unofficial Alcoholics Anonymous resource center guides individuals with alcoholism to find nearby AA meetings, support groups and alcohol recovery programs. </p>
          </div>
        </div>
      </div> <!-- end of posts -->
    </div> <!-- wrapper -->

  </body>
</html>