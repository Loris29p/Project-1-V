<?php 
    require_once("./Config/Config.php");
    require_once("./Src/Controller/User.php");
    require_once('./Src/Model/functions.php');
    require_once('./Src/Controller/Type/vpc.php');
    require_once('./Src/Controller/Type/route_tables.php');
    require_once('./Src/Controller/Type/network.php');
    require_once('./Src/Controller/Type/vpc_network.php');
    require_once('./Src/Controller/Type/private_gateway.php');
    require_once('./Src/Controller/Type/peering_connections.php');
    require_once('./Src/Controller/Type/transit_gateway.php');
    require_once('./Src/Controller/Type/nat_gateway.php');
    require_once('./Src/Controller/Type/internet_gateways.php');
    require_once('./Src/Controller/Type/endpoints.php');
    // $db = ConnectDB();
    // $user = new User($db, "Poilly", "Loris");

    $vpc = new Endpoints();
    $vpc_array = $vpc->GetAllEndpoints();

    echo "<pre>";
    print_r($vpc_array);
    echo "</pre>";  