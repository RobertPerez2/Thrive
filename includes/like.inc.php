<?php
session_start();
if (isset($_POST["like-submit"])) {
    $postid = $_POST['postid'];
    $userid = $_SESSION['userID'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    likePost($conn, $postid, $userid);

} else {
    header("location: ../index.php#post" . $postid);
    exit();
}