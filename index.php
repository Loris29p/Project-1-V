<?php 
    require_once("./Config/Config.php");
    require_once("./Src/Controller/User/User.php");
    require_once('./Src/Model/functions.php');
    require_once('./Src/Controller/Mother.php');
    require_once('./Src/Controller/SGBD/sgbd.php');

    $sgbd = new Sgbd();
    $mother = new Mother();
    $vpcArray = $mother->GetAllType()['vpc'];
    $transitGatewayArray = $mother->GetAllType()['transit_gateway'];

    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'vpc_update') {
            $mother->UpdateVPC();
        } elseif ($_POST['action'] == 'endpoints_update') {
            $mother->UpdateEndpoints();
        } elseif ($_POST['action'] == 'transit_gateway_update') {
            $mother->UpdateTransit_Gateway();
        } elseif ($_POST['action'] == 'transit_gateway_attachments_update') {
            $mother->UpdateTransit_Gateway_Attachments();
        } elseif ($_POST['action'] == 'nat_gateway_update') {
            $mother->UpdateNat_Gateway();
        } elseif ($_POST['action'] == 'internet_gateway_update') {
            $mother->UpdateInternet_Gateways();
        } elseif ($_POST['action'] == 'peering_connections_update') {
            $mother->UpdatePeering_Connections();
        } elseif ($_POST['action'] == 'private_gateway_update') {
            $mother->UpdatePrivate_Gateway();
        } elseif ($_POST['action'] == 'route_table_update') {
            $mother->UpdateRouteTable();
        } elseif ($_POST['action'] == 'network_update') {
            $mother->UpdateNetwork();
        } elseif ($_POST['action'] == 'vpc_network_update') {
            $mother->UpdateVPC_Network();
        } elseif ($_POST['action'] == 'vpn_update') {
            $mother->UpdateVPN();
        }
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
    </body>