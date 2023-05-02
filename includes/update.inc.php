<?php
if (isset($_POST["update-submit"])) {
    $postid = $_POST['postid'];
    $message = $_POST['newmessage'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyMessage($message) !== false) {
        header("location: ../udpate.php?error=emptyinput");
        exit();
    }

    updatePost($conn, $postid, $message);

} else {
    header("location: ../myposts.php");
    exit();
}