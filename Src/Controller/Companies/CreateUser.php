<?php 

    require_once(__DIR__  . "../../../../Src/Controller/Companies/Company.class.php");  
    session_start();

    if (isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["email"])) {
        $company = new Company($_SESSION['company_name'], $_SESSION['company_id']);
        $error = $company->createUser($_POST["first_name"], $_POST["last_name"], $_POST["email"]);
        if ($error == "user_already_exist") {
            header("Location: ../../../admin_company.php?error=user_already_exist");
        } else {
            header("Location: ../../../admin_company.php?password=" . $error);
        }
    }