<?php
session_start();
if (isset($_POST["post-submit"])) {
    $user_id = $_SESSION['userID'];
    $message = $_POST["message"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $message = trim($message);
    if (emptyMessage($message) !== false) {
        header("location: ../index.php?error=emptyinput");
        exit();
    }
    
    postMessage($conn, $user_id, $message);

} else {
    header("location: ../index.php");
    exit();
}