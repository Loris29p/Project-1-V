<?php 
    // require_once('Src/Model/functions.php');
    require_once(__DIR__  . "../../Model/functions.php");
    // require_once('Src/Controller/Type/vpc.php');
    require_once(__DIR__  . "../../Controller/Type/vpc.php");
    // require_once('Src/Controller/Type/route_tables.php');
    require_once(__DIR__  . "../../Controller/Type/route_tables.php");
    // require_once('Src/Controller/Type/network.php');
    require_once(__DIR__  . "../../Controller/Type/network.php");
    // require_once('Src/Controller/Type/vpc_network.php');
    require_once(__DIR__  . "../../Controller/Type/vpc_network.php");
    // require_once('Src/Controller/Type/private_gateway.php');
    require_once(__DIR__  . "../../Controller/Type/private_gateway.php");
    // require_once('Src/Controller/Type/peering_connections.php');
    require_once(__DIR__  . "../../Controller/Type/peering_connections.php");
    // require_once('Src/Controller/Type/transit_gateway.php');
    require_once(__DIR__ . "../../Controller/Type/transit_gateway.php");
    // require_once('Src/Controller/Type/transit_gateway_attachments.php');
    require_once(__DIR__ . "../../Controller/Type/transit_gateway_attachments.php");
    // require_once('Src/Controller/Type/nat_gateway.php');
    require_once(__DIR__ . "../../Controller/Type/nat_gateway.php");
    // require_once('Src/Controller/Type/internet_gateways.php');
    require_once(__DIR__ . "../../Controller/Type/internet_gateways.php");
    // require_once('Src/Controller/Type/endpoints.php');
    require_once(__DIR__ . "../../Controller/Type/endpoints.php");
    // require_once('Src/Controller/Type/vpn.php');
    require_once(__DIR__ . "../../Controller/Type/vpn.php");
    // require_once('Src/Controller/SGBD/SGBD.class.php');
    require_once(__DIR__ . "../../Controller/SGBD/SGBD.class.php");

    Class Mother {
        private VPC $vpc;
        private Route_Tables $route_tables;
        private Network $network;
        private VPC_Network $vpc_network;
        private Private_Gateway $private_gateway;
        private Peering_Connections $peering_connections;
        private Transit_Gateway $transit_gateway;
        private Transit_Gateway_Attachments $transit_gateway_attachments;
        private NAT_Gateway $nat_gateway;
        private Internet_Gateways $internet_gateways;
        private Endpoints $endpoints;
        private SGBD $sgbd;
        private VPN $vpn;

        public function __construct() {
            $this->sgbd = new SGBD("localhost", "root", "", "projectv");
            $this->vpc = new VPC($this->sgbd);
            $this->route_tables = new Route_Tables($this->sgbd);
            $this->network = new Network($this->sgbd);
            $this->vpc_network = new VPC_Network($this->sgbd);
            $this->private_gateway = new Private_Gateway($this->sgbd);
            $this->peering_connections = new Peering_Connections($this->sgbd);
            $this->transit_gateway = new Transit_Gateway($this->sgbd);
            $this->transit_gateway_attachments = new Transit_Gateway_Attachments($this->sgbd);
            $this->nat_gateway = new NAT_Gateway($this->sgbd);
            $this->internet_gateways = new Internet_Gateways($this->sgbd);
            $this->endpoints = new Endpoints($this->sgbd);
            $this->vpn = new VPN($this->sgbd);
        }
        
        public function GetAllType() {
            $vpc_array = $this->vpc->GetAllVPC();
            $route_tables_array = $this->route_tables->GetAllRoute_Tables();
            $network_array = $this->network->GetAllNetwork();
            $vpc_network_array = $this->vpc_network->GetAllVPC_Network();
            $private_gateway_array = $this->private_gateway->GetAllPrivate_Gateway();
            $peering_connections_array = $this->peering_connections->GetAllPeering_Connections();
            $transit_gateway_array = $this->transit_gateway->GetAllTransit_Gateway();
            $transit_gateway_attachments_array = $this->transit_gateway_attachments->GetAllTransit_Gateway_Attachments();
            $nat_gateway_array = $this->nat_gateway->GetAllNat_Gateway();
            $internet_gateways_array = $this->internet_gateways->GetAllInternet_Gateways();
            $endpoints_array = $this->endpoints->GetAllEndpoints();
            $vpn_array = $this->vpn->GetAllVPN();

            $array = array(
                "vpc" => $vpc_array,
                "route_tables" => $route_tables_array,
                "network" => $network_array,
                "vpc_network" => $vpc_network_array,
                "private_gateway" => $private_gateway_array,
                "peering_connections" => $peering_connections_array,
                "transit_gateway" => $transit_gateway_array,
                "transit_gateway_attachments" => $transit_gateway_attachments_array,
                "nat_gateway" => $nat_gateway_array,
                "internet_gateways" => $internet_gateways_array,
                "endpoints" => $endpoints_array,
                "vpn" => $vpn_array
            );
            return $array;
        }

        public function UpdateVPC() {
            $this->vpc->Update_SGDB();
        }

        public function UpdateRouteTable() {
            $this->route_tables->Update_SGDB();
        }

        public function UpdateNetwork() {
            $this->network->Update_SGDB();
        }

        public function UpdateVPC_Network() {
            $this->vpc_network->Update_SGDB();
        }

        public function UpdatePrivate_Gateway() {
            $this->private_gateway->Update_SGDB();
        }

        public function UpdatePeering_Connections() {
            $this->peering_connections->Update_SGDB();
        }

        public function UpdateTransit_Gateway() {
            $this->transit_gateway->Update_SGDB();
        }

        public function UpdateTransit_Gateway_Attachments() {
            $this->transit_gateway_attachments->Update_SGDB();
        }

        public function UpdateNat_Gateway() {
            $this->nat_gateway->Update_SGDB();
        }

        public function UpdateInternet_Gateways() {
            $this->internet_gateways->Update_SGDB();
        }

        public function UpdateEndpoints() {
            $this->endpoints->Update_SGDB();
        }

        public function UpdateVPN() {
            $this->vpn->Update_SGDB();
        }
    }
