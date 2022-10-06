<?php
    // require_once("../User/User.class.php");
    require_once(__DIR__  . "../../../../Src/Controller/User/User.class.php");
    require_once(__DIR__  . "../../../../Src/Controller/User/Users.class.php");

    $user = new User();
    $users = new Users();

    if (isset($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (isset($_POST['company'])) {
            $exit_user_data = $users->AccountExistsInCompany($email, $_POST['company']);
            if ($exit_user_data["exists"] == true) {
                $connect = $user->Login($email, $password, $exit_user_data["company"]);
                if ($connect == "success") {
                    header("Location: ../../../index.php");
                } else {
                     header("Location: ../../../login_form.php?error=$connect");
                }
            } else {
                header("Location: ../../../login_form.php?error=nouser");
            }
        } else {
            $exit_user_data = $users->AccountExists($email);
            if ($exit_user_data == true) {
                $connect = $user->Login($email, $password, null);
                if ($connect == "success") {
                    header("Location: ../../../index.php");
                } else {
                    header("Location: ../../../login_form.php?error=$connect");
                }
            } else {
                header("Location: ../../../login_form.php?error=nouser");
            }
        }
    } else {
        header("Location: ../../../login_form.php?error=emptyfields");
    }