<?php 
    require_once("../User/User.php");

    $user = new User();

    if (isset($_GET["token"])) {
        $token = $_GET["token"];
        $result = $user->verify($token);
        header("Location: ../../../login_form.php?error=$result");
    } else {
        header("Location: ../../../login_form.php?error=account_not_verified");
    }