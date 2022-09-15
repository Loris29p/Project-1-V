<?php
    require_once("../User/User.php");

    $user = new User();

    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        if ($user->AccountExists($email)) {
            $connect = $user->Login($email, $password);
            if ($connect == "success") {
                header("Location: ../../../index.php");
            } else {
                header("Location: ../../../login_form.php?error=$connect");
            }
        } else {
            header("Location: ../../../login_form.php?error=nouser");
        }
    } else {
        header("Location: ../../../login_form.php?error=emptyfields");
    }