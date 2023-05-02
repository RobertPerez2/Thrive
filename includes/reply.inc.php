<?php
session_start();
if (isset($_POST["reply-submit"])) {
    $user_id = $_SESSION['userID'];
    $postid = $_POST['postid'];
    $reply = $_POST["reply"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $reply = trim($reply);
    if (emptyMessage($reply) !== false) {
        header("location: ../reply.php?postid=" . $postid);
        exit();
    }
    
    postReply($conn, $user_id, $postid, $reply);

} else {
    header("location: ../index.php");
    exit();
}