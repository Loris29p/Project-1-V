<?php
    require_once("../User/User.php");
    session_start();

    $user = new User();

    if (isset($_POST['first_name']) || isset($_POST['last_name']) || isset($_POST['email'])) {
        if (isset($_POST['first_name'])) {
            if (strlen($_POST['first_name']) > 0) {
                $user->changeFirstName($_SESSION['id'], $_POST['first_name']);
                header("Location: ../../../account_parameters.php");
            }
        }
    
        if (isset($_POST['last_name'])) {
            if (strlen($_POST['last_name']) > 0) {
                $user->changeLastName($_SESSION['id'], $_POST['last_name']);
                header("Location: ../../../account_parameters.php");
            }
        }
    
        if (isset($_POST['email'])) {
            if (strlen($_POST['email']) > 0) {
                $user->changeEmail($_SESSION['id'], $_POST['email']);
                header("Location: ../../../account_parameters.php");
            }
        }

        if (strlen($_POST['email']) == 0 && strlen($_POST['last_name']) == 0 && strlen($_POST['first_name']) == 0) {
            header("Location: ../../../account_parameters.php?error=emptyfields");
        }
    } else {
        header("Location: ../../../account_parameters.php?error=emptyfields");
    }

