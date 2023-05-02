<?php
if (isset($_POST["delete-submit"])) {
    $postid = $_POST['postid'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    deletePost($conn, $postid, $message);

} else {
    header("location: ../myposts.php");
    exit();
}