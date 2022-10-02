<?php
    // require_once("../User/User.class.php");
    require_once(__DIR__  . "../../../../Src/Controller/User/User.class.php");
    require_once(__DIR__  . "../../../../Src/Controller/User/Users.class.php");

    $user = new User();
    $users = new Users();

    if (isset($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
        if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
            $secret = "6LdZ9j4iAAAAAD95Iz9Xyl-hPCES_Wf9a-mKkags";
            $captchaResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $_POST["g-recaptcha-response"]);
            $responseData = json_decode($captchaResponse);
            $email = $_POST["email"];
            $password = $_POST["password"];

            if (isset($_POST['company'])) {
                if ($responseData->success) {
                    $exit_user_data = $users->AccountExistsInCompany($email, $_POST['company']);
                    if ($exit_user_data == true) {
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
                    header("Location: ../../../login_form.php?error=recaptcha");
                }  
            } else {
                if ($responseData->success) {
                    $exit_user_data = $users->AccountExists($email);
                    if ($exit_user_data == true) {
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
                    header("Location: ../../../login_form.php?error=recaptcha");
                }   
            }
        } else {
            header("Location: ../../../login_form.php?error=recaptcha");
        }
    } else {
        header("Location: ../../../login_form.php?error=emptyfields");
    }