<?php 
    function ConnectDB() {
        try {
            if (SQLMETHOD == "MYSQL") {
                $db = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASSWORD);
            } else {
                echo "Type de méthode SQL inconnu.";
            }
        }
        catch(Exception $e) { die('Erreur : '.$e->getMessage()); }

        return $db;
    }

    function GetSouscriptionUser() {
        return "VESA PROD";
    }