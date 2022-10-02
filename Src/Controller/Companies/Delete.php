<?php
    require_once(__DIR__  . "../../../../Src/Controller/Companies/Company.class.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $company = new Company("", $id);
        $result = $company->delete();

        if ($result == true) {
            header("Location: ../../../system_admin.php");
        } else {
            header("Location: ../../../system_admin.php?error=" . $result);
        }
    }