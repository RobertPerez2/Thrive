<?php
if (isset($_POST["login-submit"])) {
    
    $email = $_POST["login-email"];
    $pwd = $_POST["login-password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    //checking empty email,password, and confirm password
    if (emptyInputLogin($email, $pwd) !== false) {
        header("location: ../login.php?error=emptylogin");
        exit();
    }

    loginUser($conn, $email, $pwd);

} else {
    header("location: ../login.php");
    exit();
}

