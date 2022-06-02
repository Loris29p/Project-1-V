<?php 
    require_once('Src/Model/functions.php');
    require_once('Src/Controller/Type/vpc.php');
    require_once('Src/Controller/Type/route_tables.php');
    require_once('Src/Controller/Type/network.php');
    require_once('Src/Controller/Type/vpc_network.php');
    require_once('Src/Controller/Type/private_gateway.php');
    require_once('Src/Controller/Type/peering_connections.php');
    require_once('Src/Controller/Type/transit_gateway.php');
    require_once('Src/Controller/Type/nat_gateway.php');
    require_once('Src/Controller/Type/internet_gateways.php');
    require_once('Src/Controller/Type/endpoints.php');

    Class Mother {
        public function __construct() {}
    
        // Envoyer les informations de touts les type dans l'affichage sous forme de tableau
        public function GetAllType() {
            $vpc = new VPC();
            $vpc_array = $vpc->GetAllVPC();
            $route_tables = new Route_Tables();
            $route_tables_array = $route_tables->GetAllRoute_Tables();
            $network = new Network();
            $network_array = $network->GetAllNetwork();
            $vpc_network = new VPC_Network();
            $vpc_network_array = $vpc_network->GetAllVPC_Network();
            $private_gateway = new Private_Gateway();
            $private_gateway_array = $private_gateway->GetAllPrivate_Gateway();
            $peering_connections = new Peering_Connections();
            $peering_connections_array = $peering_connections->GetAllPeering_Connections();
            $transit_gateway = new Transit_Gateway();
            $transit_gateway_array = $transit_gateway->GetAllTransit_Gateway();
            $nat_gateway = new Nat_Gateway();
            $nat_gateway_array = $nat_gateway->GetAllNat_Gateway();
            $internet_gateways = new Internet_Gateways();
            $internet_gateways_array = $internet_gateways->GetAllInternet_Gateways();
            $endpoints = new Endpoints();
            $endpoints_array = $endpoints->GetAllEndpoints();

            $array = array(
                "vpc" => $vpc_array,
                "route_tables" => $route_tables_array,
                "network" => $network_array,
                "vpc_network" => $vpc_network_array,
                "private_gateway" => $private_gateway_array,
                "peering_connections" => $peering_connections_array,
                "transit_gateway" => $transit_gateway_array,
                "nat_gateway" => $nat_gateway_array,
                "internet_gateways" => $internet_gateways_array,
                "endpoints" => $endpoints_array
            );
            return $array;
        }
    }
