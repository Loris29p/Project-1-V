<?php 

    class Read {
        
        public function ReadVPC() {
            $csv_array = [];
            $file = fopen(__DIR__ . "/CSV/csv_files/VPC.csv" , "r");
            while (!feof($file)) {
                $ar = fgetcsv($file);
                $csv_array[] = $ar;
            }
            fclose($file);
            
            $vpc_array = [];
            foreach ($csv_array as $key => $value) {
                if ($key != 0 AND $key != count($csv_array)) {
                    $value = $value;
                    $souscription = $value[0];
                    $region = $value[1];
                    $vpc = $value[2];
                    $vpc_id = $value[3];
                    $cidr = $value[4];
                    $id_tables_de_routage = $value[5];
                    $id_acl = $value[6];
                    $vpc_array[] = ["souscription" => $souscription, "region" => $region, "vpc" => $vpc, "vpc_id" => $vpc_id, "cidr" => $cidr, "id_tables_de_routage" => $id_tables_de_routage, "id_acl" => $id_acl];
                }
            }

            return $vpc_array;
        }

        public function ReadRouteTables() {
            $csv_array = [];
            $file = fopen(__DIR__ . "/CSV/csv_files/Route_Tables.csv" , "r");
            while (!feof($file)) {
                $ar = fgetcsv($file);
                $csv_array[] = $ar;
            }
            fclose($file);
            
            $route_tables_array = [];
            foreach ($csv_array as $key => $value) {
                if ($key != 0 AND $key != count($csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $id = $value[1];
                    $destination = $value[2];
                    $target = $value[3];
                    $status = $value[4];
                    $propagated = $value[5];
                    $private_gateway = $value[6];
                    $route_tables_array[] = ["name" => $name, "id" => $id, "destination" => $destination, "target" => $target, "status" => $status, "propagated" => $propagated, "private_gateway" => $private_gateway];
                }
            }

            return $route_tables_array;
        }

        public function ReadNetwork() {
            $csv_array = [];
            $file = fopen(__DIR__ . "/CSV/csv_files/Network.csv" , "r");
            while (!feof($file)) {
                $ar = fgetcsv($file);
                $csv_array[] = $ar;
            }
            fclose($file);
            
            $network_array = [];
            foreach ($csv_array as $key => $value) {
                if ($key != 0 AND $key != count($csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $network_id = $value[1];
                    $vpc_id = $value[2];
                    $cidr_ipv4 = $value[3];
                    $ipv4_available = $value[4];
                    $zone_disponibility = $value[5];
                    $zone_disponibility_id = $value[6];
                    $table_routage = $value[7];
                    $acl_network = $value[8];
                    $default_subnet = $value[9];
                    $auto_ipv4_public = $value[10];
                    $auto_ipv4_private = $value[11];
                    $network_array[] = ["name" => $name, "network_id" => $network_id, "vpc_id" => $vpc_id, "cidr_ipv4" => $cidr_ipv4, "ipv4_available" => $ipv4_available, "zone_disponibility" => $zone_disponibility, "zone_disponibility_id" => $zone_disponibility_id, "table_routage" => $table_routage, "acl_network" => $acl_network, "default_subnet" => $default_subnet, "auto_ipv4_public" => $auto_ipv4_public, "auto_ipv4_private" => $auto_ipv4_private];
                }
            }

            return $network_array;
        }

        public function ReadVPCNetwork() {
            $csv_array = [];
            $file = fopen(__DIR__ . "/CSV/csv_files/VPC_Network.csv" , "r");
            while (!feof($file)) {
                $ar = fgetcsv($file);
                $csv_array[] = $ar;
            }
            fclose($file);
            
            $vpc_network_array = [];
            foreach ($csv_array as $key => $value) {
                if ($key != 0 AND $key != count($csv_array)) {
                    $value = $value;
                    $id = $value[0];
                    $id_sous_reseaux = $value[1];
                    $vpc_network_array[] = ["id" => $id, "id_sous_reseaux" => $id_sous_reseaux];    
                }
            }

            return $vpc_network_array;
        }

        public function ReadPrivateGateway() {
            $csv_array = [];
            $file = fopen(__DIR__ . "/CSV/csv_files/Private_Gateway.csv" , "r");
            while (!feof($file)) {
                $ar = fgetcsv($file);
                $csv_array[] = $ar;
            }
            fclose($file);
            
            $private_gateway_array = [];
            foreach ($csv_array as $key => $value) {
                if ($key != 0 AND $key != count($csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $gateway = $value[1];
                    $state = $value[2];
                    $type = $value[3];
                    $vpc = $value[4];
                    $asn = $value[5];
                    $private_gateway_array[] = ["name" => $name, "gateway" => $gateway, "state" => $state, "type" => $type, "vpc" => $vpc, "asn" => $asn];    
                }
            }

            return $private_gateway_array;
        }

        public function ReadPeeringConnections() {
            $csv_array = [];
            $file = fopen(__DIR__ . "/CSV/csv_files/Peering_Connections.csv" , "r");
            while (!feof($file)) {
                $ar = fgetcsv($file);
                $csv_array[] = $ar;
            }
            fclose($file);
            
            $peering_connections_array = [];
            foreach ($csv_array as $key => $value) {
                if ($key != 0 AND $key != count($csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $peering_connection_id = $value[1];
                    $status = $value[2];
                    $requester_vpc = $value[3];
                    $accepter_vpc = $value[4];
                    $requester_cidrs = $value[5];
                    $accepter_cidrs = $value[6];
                    $requester_owner_id = $value[7];
                    $accepter_owner_id = $value[8];
                    $route_table_id = $value[9];
                    $vpc_id = $value[10];
                    $main = $value[11];
                    $associated_with = $value[12];
                    $peering_connections_array[] = ["name" => $name, "peering_connection_id" => $peering_connection_id, "status" => $status, "requester_vpc" => $requester_vpc, "accepter_vpc" => $accepter_vpc, "requester_cidrs" => $requester_cidrs, "accepter_cidrs" => $accepter_cidrs, "requester_owner_id" => $requester_owner_id, "accepter_owner_id" => $accepter_owner_id, "route_table_id" => $route_table_id, "vpc_id" => $vpc_id, "main" => $main, "associated_with" => $associated_with];
                }
            }

            return $peering_connections_array;
        }

        public function ReadTransitGateway() {
            $csv_array = [];
            $file = fopen(__DIR__ . "/CSV/csv_files/Transit_Gateway.csv" , "r");
            while (!feof($file)) {
                $ar = fgetcsv($file);
                $csv_array[] = $ar;
            }
            fclose($file);
            
            $transit_gateway_array = [];
            foreach ($csv_array as $key => $value) {
                if ($key != 0 AND $key != count($csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $gateway = $value[1];
                    $owner = $value[2];
                    $state = $value[3];
                    $transit_gateway_array[] = ["name" => $name, "gateway" => $gateway, "owner" => $owner, "state" => $state];    
                }
            }

            return $transit_gateway_array;
        }

        public function ReadNatGateway() {
            $csv_array = [];
            $file = fopen(__DIR__ . "/CSV/csv_files/Nat_Gateway.csv" , "r");
            while (!feof($file)) {
                $ar = fgetcsv($file);
                $csv_array[] = $ar;
            }
            fclose($file);
            
            $nat_gateway_array = [];
            foreach ($csv_array as $key => $value) {
                if ($key != 0 AND $key != count($csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $nat_gateway_id = $value[1];
                    $connectivity_type = $value[2];
                    $state = $value[3];
                    $state_message = $value[4];
                    $elastic_ip_address = $value[5];
                    $private_ip_address = $value[6];
                    $network_interface_id = $value[7];
                    $vpc = $value[8];
                    $subnet = $value[9];
                    $created = $value[10];
                    $deleted = $value[11];
                    $nat_gateway_array[] = ["name" => $name, "nat_gateway_id" => $nat_gateway_id, "connectivity_type" => $connectivity_type, "state" => $state, "state_message" => $state_message, "elastic_ip_address" => $elastic_ip_address, "private_ip_address" => $private_ip_address, "network_interface_id" => $network_interface_id, "vpc" => $vpc, "subnet" => $subnet, "created" => $created, "deleted" => $deleted];
                }
            }

            return $nat_gateway_array;
        }

        public function ReadInternetGateway() {
            $csv_array = [];
            $file = fopen(__DIR__ . "/CSV/csv_files/Internet_Gateway.csv" , "r");
            while (!feof($file)) {
                $ar = fgetcsv($file);
                $csv_array[] = $ar;
            }
            fclose($file);
            
            $internet_gateway_array = [];
            foreach ($csv_array as $key => $value) {
                if ($key != 0 AND $key != count($csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $internet_gateway_id = $value[1];
                    $state = $value[2];
                    $vpc_id = $value[3];
                    $owner = $value[4];
                    $internet_gateway_array[] = ["name" => $name, "internet_gateway_id" => $internet_gateway_id, "state" => $state, "vpc_id" => $vpc_id, "owner" => $owner];
                }
            }

            return $internet_gateway_array;
        }

        public function ReadEndpoints() {
            $csv_array = [];
            $file = fopen(__DIR__ . "/CSV/csv_files/Endpoints.csv" , "r");
            while (!feof($file)) {
                $ar = fgetcsv($file);
                $csv_array[] = $ar;
            }
            fclose($file);
            
            $endpoints_array = [];
            foreach ($csv_array as $key => $value) {
                if ($key != 0 AND $key != count($csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $endpoint_id = $value[1];
                    $vpc_id = $value[2];
                    $service_name = $value[3];
                    $state = $value[4];
                    $endpoints_array[] = ["name" => $name, "endpoint_id" => $endpoint_id, "vpc_id" => $vpc_id, "service_name" => $service_name, "state" => $state];
                }
            }

            return $endpoints_array;
        }

        public function ReadAcl() {
            $csv_array = [];
            $file = fopen(__DIR__ . "/CSV/csv_files/Acl.csv" , "r");
            while (!feof($file)) {
                $ar = fgetcsv($file);
                $csv_array[] = $ar;
            }
            fclose($file);
            
            $acl_array = [];
            foreach ($csv_array as $key => $value) {
                if ($key != 0 AND $key != count($csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $acl_id = $value[1];
                    $vpc_id = $value[2];
                    $owner = $value[3];
                    $entries = $value[4];
                    $associations = $value[5];
                    $default = $value[6];
                    $acl_array[] = ["name" => $name, "acl_id" => $acl_id, "vpc_id" => $vpc_id, "owner" => $owner, "entries" => $entries, "associations" => $associations, "default" => $default];
                }
            }

            return $acl_array;
        }

    }