<?php
include 'db.php';

$user_uid = $_POST['uid'];
$user_email = $_POST['email'];
$user_pwd = $_POST['pwd'];

$sql = "INSERT INTO users (uid, emailUser, pwdUser) VALUES ('$user_uid', '$user_email', '$user_pwd');";

if (isset($user_uid) && isset($user_email) && isset($user_pwd)) {
    mysqli_query($conn, $sql);
    header("Location: ./cool-app/index.php");
} else {
    echo "Please fill in all fields";
}
