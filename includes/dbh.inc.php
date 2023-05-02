<?php

// All required fields provided. Continue with the ADD workflow.
$host = "303.itpwebdev.com";
$user = "raperez_db_user";
$pass = "Ihusiwep1!";
$db = "raperez_thrive_db";

// DB Connection.
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn ) {
    die("Connection failed: " . mysqli_connect_error());
}