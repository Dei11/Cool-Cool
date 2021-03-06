<?php
if (isset($_POST['login'])) {
    require 'db.php';
    $mailuid = $_POST['mailuid'];
    $password = $_POST['password'];

    if (empty($mailuid) || empty($password)) {
        header("Location: ../log-in.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE uid=? OR emailUser=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../log-in.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {

                $pwdCheck = password_verify($password, $row['pwdUser']);

                if ($pwdCheck == false) {
                    header("Location: ../log-in.php?error=wrongpwd");
                    exit();
                } else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['uid'] = $row['uid'];
                    header("Location: ../index.php?login=success");
                } else {
                    header("Location: ../log-in.php?error=wrongpwd");
                    exit();
                }

                header("Location: ../index.php?login=success");
                exit();
            } else {
                header("Location: ../log-in.php?error=nouser");
                exit();
            }
        }
    }
} else {
    header("Location: ../index.php");
    exit();
}
