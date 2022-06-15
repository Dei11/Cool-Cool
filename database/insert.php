<?php

if (isset($_POST['submit'])) {
    require 'db.php';

    $user_uid = $_POST['uid'];
    $user_email = $_POST['email'];
    $user_pwd = $_POST['pwd'];


    if (empty($user_uid) || empty($user_email) || empty($user_pwd)) {
        header("Location: sing-up.php?error=emptyfields&uid=" . $user_uid . "&email=" . $user_email);
        exit();
    } else if (!filter_var($user_email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $user_uid)) {
        header("Location: sing-up.php?error=invaliduid&email=" . $user_email);
        exit();
    } else if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        header("Location: sing-up.php?error=invalidemail&uid=" . $user_uid);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $user_uid)) {
        header("Location: sing-up.php?error=invaliduid&email=" . $user_email);
        exit();
    } else {

        $sql = "SELECT uid FROM users WHERE uid=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: sing-up.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $user_uid);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: sing-up.php?error=usertaken&email=" . $user_email);
                exit();
            } else {
                $sql = "INSERT INTO users (uid, emailUser, pwdUser) VALUES (?, ?, ?);";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: sing-up.php?error=sqlerror");
                    exit();
                } else {

                    mysqli_stmt_bind_param($stmt, "sss", $user_uid, $user_email, $user_pwd);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    header("Location: ../log-in.php");
                    exit();
                }

                // mysqli_query($conn, $sql);
                // header("Location: sign-in.php");
                // exit();
            }
        }
        // mysqli_query($conn, $sql);
        // // header("Location: ./cool-app/index.php");
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../sing-up.php");
    exit();
}
