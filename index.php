<?php 
    require_once("./Config/Config.php");
    require_once("./Src/Controller/User.php");
    require_once('./Src/Model/functions.php');
    require_once('./Src/Controller/CSV/vpc_network.php');
    require_once('./Src/Controller/CSV/vpc.php');
    require_once('./Src/Controller/CSV/private_gateway.php');
    require_once('./Src/Controller/CSV/transit_gateway.php');
    require_once('./Src/Controller/CSV/route_tables.php');
    require_once('./Src/Controller/CSV/peering_conenctions.php');
    require_once('./Src/Controller/CSV/nat_gateway.php');
    require_once('./Src/Controller/CSV/internet_gateways.php');
    require_once('./Src/Controller/CSV/endpoints.php');
    require_once('./Src/Controller/CSV/network.php');
    // $db = ConnectDB();
    // $user = new User($db, "Poilly", "Loris");

    // $vpc_network = new VPC_Network();
    // $vpc_array = $vpc->get_vpc_network_array();

    // echo "<pre>";
    // print_r($vpc_array);
    // echo "</pre>";  

    // $vpc = new VPC();
    // $vpc_array = $vpc->get_vpc_array();

    // echo "<pre>";
    // print_r($vpc_array);
    // echo "</pre>";

    // $gateway = new Private_Gateway();
    // $gateway_array = $gateway->get_private_gateway_array();

    // echo "<pre>";
    // print_r($gateway_array);
    // echo "</pre>";

    // $gateway1 = new Transit_Gateway();
    // $gateway_array = $gateway1->get_transit_gateway_array();

    // echo "<pre>";
    // print_r($gateway_array);
    // echo "</pre>";

    // $route_tables = new Route_Tables();
    // $route_tables_array = $route_tables->get_route_tables_array();

    // echo "<pre>";
    // print_r($route_tables_array);
    // echo "</pre>";

    // $peering = new Peering_Connections();
    // $peering_array = $peering->get_peering_connections_array();

    // echo "<pre>";
    // print_r($peering_array);
    // echo "</pre>";

    // $nat_gateway = new NAT_Gateway();
    // $nat_gateway_array = $nat_gateway->get_nat_gateway_array();

    // echo "<pre>";
    // print_r($nat_gateway_array);
    // echo "</pre>";

    // $internet_gateway = new Internet_Gateways();
    // $internet_gateway_array = $internet_gateway->get_internet_gateways_array();

    // echo "<pre>";
    // print_r($internet_gateway_array);
    // echo "</pre>";

    // $endpoints = new Endpoints();
    // $endpoints_array = $endpoints->get_endpoints_array();  

    // echo "<pre>";
    // print_r($endpoints_array);
    // echo "</pre>";

    $network = new Network();
    $network_array = $network->get_network_array();

    echo "<pre>";
    print_r($network_array);
    echo "</pre>";