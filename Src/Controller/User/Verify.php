<?php 
    // require_once("../User/User.class.php");
    require_once(__DIR__  . "../../../../Src/Controller/User/User.class.php");

    session_start();

    $user = new User();

    if (isset($_GET["token"])) {
        $token = $_GET["token"];
        $result = $user->verify($token);
        header("Location: ../../../login_form.php?error=$result");
    } else {
        if ($_SESSION['role'] == 'system_admin') {
            if (isset($_GET["id_user"])) {
                $id_user = $_GET["id_user"];
                $user->verifyById($id_user);
                header("Location: ../../../admin.php#second_page");
            } else {
                header("Location: ../../../login_form.php?error=account_not_verified");
            }
        } else {
            header("Location: ../../../login_form.php?error=account_not_verified");
        }
    }