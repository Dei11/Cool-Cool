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

        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";

        mysqli_query($conn, $sql);
        // header("Location: ./cool-app/index.php");
    }
}
