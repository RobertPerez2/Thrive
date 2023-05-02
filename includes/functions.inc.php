<?php

function emptyInputSignup($email, $pwd, $pwdRepeat) {
    $result;
    if(empty($email) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function invalidEmail($email) {
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;

    } else {
        $result = false;
    }

    return $result;
}

function pwdMatch($pwd, $pwdRepeat)  {
    $result;
    if($pwd !== $pwdRepeat) {
        $result = true;

    } else {
        $result = false;

    }

    return $result;
}

function emailExists($conn, $email)  {
    $sql = "SELECT * FROM user WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql) ) {
        header("location: ../login.php?error=stmterror");
        exit();
    } 

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;

    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $email, $pwd) {
    $sql = "INSERT INTO user (email, password) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql) ) {
        header("location: ../login.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ss", $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    loginUser($conn, $email, $pwd);
    exit();
}

function emptyInputLogin($email, $pwd) {
    $result;
    if(empty($email) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function loginUser($conn, $email, $pwd) {
    $userExists = emailExists($conn, $email);

    if($userExists === false) {
        header("location: ../login.php?error=wronglogin");
        $exit();
    }

    $pwdHashed = $userExists['password'];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
    } else if($checkPwd === true) {
        session_start();
        $_SESSION['userID'] = $userExists['user_id'];
        $_SESSION['email'] = $userExists['email'];
        header("location: ../index.php");
        exit();
    }
}

function emptyMessage($message) {
    var_dump($message);
    $result;
    if(empty($message)) {
        $result = true;
    } else {
        $result = false;
    }

    var_dump($result);
    return $result;
}

function postMessage($conn, $userid, $message) {
    $sql = "INSERT INTO Post(message, user_id) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql) ) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sd", $message, $userid);
    mysqli_stmt_execute($stmt);
    if(mysqli_stmt_affected_rows($stmt) === -1) {
        header("location: ../index.php?error=queryfailed");
        exit();
    }
    mysqli_stmt_close($stmt);

    header("location: ../index.php");
    exit();
}

function getPosts() {
    $host = "303.itpwebdev.com";
    $user = "raperez_db_user";
    $pass = "Ihusiwep1!";
    $db = "raperez_thrive_db";

    // DB Connection.
    $conn = mysqli_connect($host, $user, $pass, $db);
    if (!$conn ) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM Post;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql) ) {
        header("location: ../index.php?error=stmterror");
        exit();
    } 
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    $rows = mysqli_fetch_all($resultData, MYSQLI_ASSOC);
    for ($i = count($rows) - 1; $i >= 0; $i--) {
        $row = $rows[$i];
        echo "<div class='d-flex media text-muted pt-3 post' onclick=\"location.href='reply.php?postid=" . $row['post_id'] . "'\">
        <img src='img/iconhead2.png' class='mr-2 rounded' alt='profile'>
        <div class='media-body' id='post" . $row['post_id'] . "'>
        <form action='includes/like.inc.php' method='POST'>
            <strong class='small lh-125 d-block tldr'>anonymous" . $row['user_id'] . "</strong>
            <p class='mb-0 small lh-125' style='display: flex; justify-content: space-between;'>
                " . $row['message'] . "
            </p>
            <strong class='small mt-2 lh-125 d-block tldr clickreply'> Click to see replies </strong>
        </form>
        </div>
        </div>";
    };

    mysqli_stmt_close($stmt);
}

function myPosts($userid) {
    $host = "303.itpwebdev.com";
    $user = "raperez_db_user";
    $pass = "Ihusiwep1!";
    $db = "raperez_thrive_db";

    // DB Connection.
    $conn = mysqli_connect($host, $user, $pass, $db);
    if (!$conn ) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM Post WHERE user_id = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql) ) {
        header("location: ../index.php?error=stmterror");
        exit();
    } 

    mysqli_stmt_bind_param($stmt, "d", $userid);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    $rows = mysqli_fetch_all($resultData, MYSQLI_ASSOC);
    for ($i = count($rows) - 1; $i >= 0; $i--) {
        $row = $rows[$i];
        echo  
        "<div class='d-flex media text-muted pt-3 post'>
        <img src='img/iconhead2.png' class='mr-2 rounded' alt='profile'>
        <div class='media-body'>
        <form action='includes/delete.inc.php' method='POST'>
            <p class='fucked mb-0 small lh-125'>
                <strong class='d-block tldr'> anonymous" . $row['user_id'] . " </strong>
                <input type='hidden' name='postid' value='" . $row['post_id'] . "'>
                <span>
                <button type='submit' name='delete-submit' class='delete crud'> x </button>
                <a href='update.php?postid=" . $row['post_id'] ."' class='btn'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                </svg></a>
                </span>
            </p>
            <p class='small mb-0 lh-125'>" . $row['message'] . "</p>
        </form>
        </div>
        </div>";
    };

    mysqli_stmt_close($stmt);
}

function deletePost($conn, $postid) {
    $sql = "DELETE FROM Post WHERE post_id = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql) ) {
        header("location: ../myposts.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "d", $postid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../myposts.php");
    exit();
}

function updatePost($conn, $postid, $message) {
    $sql = "UPDATE Post SET message = ? WHERE post_id = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql) ) {
        header("location: ../myposts.php?error=stmtfailed");
        exit();
    }    

    mysqli_stmt_bind_param($stmt, "sd", $message, $postid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../myposts.php");
    exit();
}

// function likePost($conn, $postid, $userid) {
//     $sql = "INSERT INTO Likes (post_id, user_id) VALUES (?, ?);";
//     $stmt = mysqli_stmt_init($conn);

//     if(!mysqli_stmt_prepare($stmt, $sql) ) {
//         header("location: ../index.php?error=stmtfailed");
//         exit();
//     }

//     mysqli_stmt_bind_param($stmt, "dd", $postid, $userid);
//     mysqli_stmt_execute($stmt);
//     if(mysqli_stmt_affected_rows($stmt) === -1) {
//         header("location: ../index.php?error=queryfailed");
//         exit();
//     }
//     mysqli_stmt_close($stmt);

//     header("location: ../index.php?post=" . $postid);
//     exit();
// }

function postReply($conn, $userid, $postid, $reply) {
    $sql = "INSERT INTO Reply (replymessage, post_id, user_id) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql) ) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    $reply = str_replace("’", "'", $reply);

    mysqli_stmt_bind_param($stmt, "sdd", $reply, $postid, $userid);
    mysqli_stmt_execute($stmt);
    if(mysqli_stmt_affected_rows($stmt) === -1) {
        header("location: ../index.php?error=queryfailed");
        exit();
    }
    mysqli_stmt_close($stmt);

    header("location: ../reply.php?postid=" . $postid);
    exit();
}

function getReplies($postid) {
    $host = "303.itpwebdev.com";
    $user = "raperez_db_user";
    $pass = "Ihusiwep1!";
    $db = "raperez_thrive_db";

    // DB Connection.
    $conn = mysqli_connect($host, $user, $pass, $db);
    if (!$conn ) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM Reply WHERE post_id = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql) ) {
        header("location: ../index.php?error=stmterror");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "d", $postid);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    $rows = mysqli_fetch_all($resultData, MYSQLI_ASSOC);
    for ($i = count($rows) - 1; $i >= 0; $i--) {
        $row = $rows[$i];
        echo "<div class='d-flex media text-muted pt-3 post'>
        <img src='img/iconhead2.png' class='mr-2 rounded' alt='profile'>
        <div class='media-body' id='post" . $row['post_id'] . "'>
            <strong class='small lh-125 d-block tldr'>anonymous" . $row['user_id'] . "</strong>
            <p class='mb-0 small lh-125' style='display: flex; justify-content: space-between;'>
                " . $row['replymessage'] . "
            </p>
        </div>
        </div>";
    };

    mysqli_stmt_close($stmt);
}

function getPost($postid) {
    $host = "303.itpwebdev.com";
    $user = "raperez_db_user";
    $pass = "Ihusiwep1!";
    $db = "raperez_thrive_db";

    // DB Connection.
    $conn = mysqli_connect($host, $user, $pass, $db);
    if (!$conn ) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM Post WHERE post_id = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql) ) {
        header("location: ../index.php?error=stmterror");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "d", $postid);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    $rows = mysqli_fetch_all($resultData, MYSQLI_ASSOC);
    for ($i = count($rows) - 1; $i >= 0; $i--) {
        $row = $rows[$i];
        echo "<div class='d-flex media text-muted pt-3 post'>
        <div class='post-body' id='post" . $row['post_id'] . "'>
            <strong class='small lh-125 d-block tldr'>anonymous" . $row['user_id'] . "</strong>
            <p class='mb-0 small lh-125' style='display: flex; justify-content: space-between;'>
                " . $row['message'] . "
            </p>
        </div>
        </div>";
    };

    mysqli_stmt_close($stmt);    
}