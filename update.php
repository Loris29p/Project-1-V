<?php 
    require_once("./Config/Config.php");
    require_once("./Src/Controller/User/User.php");
    require_once('./Src/Model/functions.php');
    require_once('./Src/Controller/Mother.php');
    require_once('./Src/Controller/SGBD/sgbd.php');

    $sgbd = new Sgbd();
    $mother = new Mother();

    if (isset($_GET['vpc_update'])) {
        // $mother->UpdateVPC();
    }
?>


<html>
    <head>
        <title>AWS</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="./Src/assets/css/gojs.css">
        <script src="https://unpkg.com/gojs/release/go-debug.js"></script>
        <link rel="stylesheet" href="./Src/assets/css/main.css"> 
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    </head>

    <body>
        <header>
            <nav class="navbar">
                <div class="navbar-ul">
                    <ul>
                        <li><a href="./index.php">Acceuil</a></li>
                        <li><a href="./vpc.php">Elements</a></li>
                        <li><a href="./update.php">Mise à jour</a></li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside>
            <div class="aside_update_elements_bdd">
                <h3>Mise à jour de la BDD</h3>
                <p class="aside_update_elements_bdd_list">
                    <a href="./update.php?all_update=true" class="aside_update_elements_bdd_list title">- <strong>Tout</strong> mettre à jour</a>
                    <a href="./update.php?vpc_update=true">- Mettre à jour les <strong>VPC</strong></a>
                    <a href="./update.php?endpoints_update=true">- Mettre à jour les <strong>Endpoints</strong></a>
                    <a href="./update.php?transit_gateway_update=true">- Mettre à jour les <strong>Transit Gateway</strong></a>
                    <a href="./update.php?transit_gateway_attachments_update=true">- Mettre à jour les <strong>Transit Gateway attachments</strong></a>
                    <a href="./update.php?nat_gateway_update=true">- Mettre à jour les <strong>Nat Gateway</strong></a>
                    <a href="./update.php?internet_gateway_update=true">- Mettre à jour les <strong>Internet Gateway</strong></a>
                    <a href="./update.php?peering_connection_update=true">- Mettre à jour les <strong>Peering Connection</strong></a>
                    <a href="./update.php?private_gateway_update=true">- Mettre à jour les <strong>Private Gateway</strong></a>
                    <a href="./update.php?table_routage_update=true">- Mettre à jour les <strong>Tables de routages</strong></a>
                    <a href="./update.php?vpn_update=true">- Mettre à jour les <strong>VPN</strong></a>
                </p>
            </div>
        </aside>
    </body>
