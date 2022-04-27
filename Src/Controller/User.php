<?php 
    require_once('Src/Model/functions.php');
    ConnectDB();

    // Class User for create / login / edit user
    class User {
        private $lastname;
        private $name;

        public function __construct($lastname, $name)
        {
            // Echo lastname / name
            echo $lastname + " " + $name;
        }
    }