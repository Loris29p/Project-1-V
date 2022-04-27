<?php 
    require_once("./Config/Config.php");
    require_once("./Src/Controller/User.php");
    require_once('./Src/Model/functions.php');
    $db = ConnectDB();
    $user = new User($db, "Poilly", "Loris");
    // $user->createUser();