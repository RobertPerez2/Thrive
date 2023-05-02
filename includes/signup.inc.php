<?php

if (isset($_POST["signup-submit"])) {
    
    $email = $_POST["signup-email"];
    $pwd = $_POST["signup-password"];
    $pwdRepeat = $_POST["signup-confirm"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    //checking empty email,password, and confirm password
    if (emptyInputSignup($email, $pwd, $pwdRepeat) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    //checking invalid email,password
    if (invalidEmail($email) !== false) {
        header("location: ../login.php?error=invalidemail");
        exit();
    }

    //checking if passwords match
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../login.php?error=passwordsdontmatch");
        exit();
    }

    //checking if email exists
    if (emailExists($conn, $email) !== false) {
        header("location: ../login.php?error=emailtaken");
        exit();
    }

    createUser($conn, $email, $pwd);

} else {
    header("location: ../login.php");
    exit();
}