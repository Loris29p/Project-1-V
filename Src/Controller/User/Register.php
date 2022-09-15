<?php
    require_once("../User/User.php");

    $user = new User();

    if (isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password_verif"])) {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password_verif = $_POST["password_verif"];

        if ($password == $password_verif) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $picture = "default.png";
            $role = "user";
    
            if ($user->AccountExists($email)) {
                header("Location: ../../../register_form.php?error=account_exists");
            } else {
                $user->Register($first_name, $last_name, $email, $password, $picture, $role);
                header("Location: ../../../login_form.php?error=account_created");
            }
        } else {
            header("Location: ../../../register_form.php?error=wrongpassword");
        }
    } else {
        header("Location: ../../../register_form.php?error=emptyfields");
    }