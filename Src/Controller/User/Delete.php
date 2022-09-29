<?php 
    // require_once("../User/User.class.php");
    require_once(__DIR__  . "../../../../Src/Controller/User/User.class.php");

    session_start();

    $user = new User();

    if ($_SESSION['role'] == 'system_admin') {
        $user->deleteUser($_GET['id']);
        header("Location: ../../../admin.php#second_page");
    }