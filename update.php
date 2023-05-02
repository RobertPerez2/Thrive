<?php
  session_start();

  if ( !isset($_GET['postid']) || trim($_GET['postid']) == '' ) {
    // Missing track_id;
    $error = "Invalid URL.";
} else {
    // Valid URL w/ track_id.
    $host = "303.itpwebdev.com";
    $user = "raperez_db_user";
    $pass = "Ihusiwep1!";
    $db = "raperez_thrive_db";

    // Establish MySQL Connection.
    $mysqli = new mysqli($host, $user, $pass, $db);

    // Check for any Connection Errors.
    if ( $mysqli->connect_errno ) {
        echo $mysqli->connect_error;
        exit();
    }
    $mysqli->set_charset('utf8');

    $sql = "SELECT *
            FROM Post WHERE post_id = " . $_GET['postid'] . ";";
    $results = $mysqli->query($sql);
    if (!$results) {
        echo $mysqli->error;
        $mysqli->close();
        exit();
    }

    $row = $results->fetch_assoc();
}
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
          <h3 class="col-12 mt-4"> UPDATE POST </h3> <hr>
        </div>

        <?php if(isset($error) && trim($error) != '') : ?>
				<div class="col-12 text-danger">
					<?php echo $error;?>
				</div>
		<?php else : ?>

        <div class='d-flex justify-content-center row mt-4'>
              <form id='newmessage' action='includes/update.inc.php' method='POST'>
                  <div class='col-auto d-flex flex-row'>
                        <input type='hidden' id='postid' name='postid' value='<?php echo $_GET['postid'];?>'>
                      <textarea name='newmessage' id='newmessage' class='form-control'>'><?php echo $row['message']; ?></textarea>
                      <button type='submit' name='update-submit' id='update-submit' class='btn btn-light btn-outline-secondary btn-lg'>Edit</button>
                  </div>
              </form>
        </div>
        
        <?php endif; ?>

      </div> <!-- end of posts -->
    </div> <!-- wrapper -->

</body>
</html>