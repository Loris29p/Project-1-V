<?php
    // require_once("../User/User.class.php");
    require_once(__DIR__  . "../../../../Src/Controller/User/User.class.php");

    $user = new User();

    if (isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password_verif"])) {
        if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
            $secret = "6LdZ9j4iAAAAAD95Iz9Xyl-hPCES_Wf9a-mKkags";
            $captchaResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $_POST["g-recaptcha-response"]);
            $responseData = json_decode($captchaResponse);
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $password_verif = $_POST["password_verif"];

            if ($responseData->success) {
                if ($password == $password_verif) {
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $role = "user";
            
                    if ($user->AccountExists($email)) {
                        header("Location: ../../../register_form.php?error=account_exists");
                    } else {
                        $user->Register($first_name, $last_name, $email, $password, $role);
                        header("Location: ../../../login_form.php?error=account_created");
                    }
                } else {
                    header("Location: ../../../register_form.php?error=wrongpassword");
                }
            } else {
                header("Location: ../../../register_form.php?error=recaptcha");
            }   
        } else {
            header("Location: ../../../register_form.php?error=recaptcha");
        }
    } else {
        header("Location: ../../../register_form.php?error=emptyfields");
    }