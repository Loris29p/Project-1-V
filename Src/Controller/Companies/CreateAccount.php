<?php 

    require_once(__DIR__  . "../../../../Src/Controller/Companies/Company.class.php");  
    session_start();

    if (isset($_POST["name"])) {
        $company = new Company($_SESSION['company_name'], $_SESSION['company_id']);
        $error = $company->createAccount($_POST["name"]);
        if ($error != true) {
            header("Location: ../../../admin_company.php?error=" . $error);
        } else {
            header("Location: ../../../admin_company.php");
        }
    }