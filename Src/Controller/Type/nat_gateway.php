<?php 
    require_once('Src/Controller/Read/Read.php');

    class NAT_Gateway {
        private $nat_gateway_array;
        private $read;

        public function __construct()
        {
            $this->read = new Read();
            $this->BuildArray();
        }

        public function BuildArray() {
            $nat_gateway_array = $this->read->ReadNatGateway();
            foreach ($nat_gateway_array as $key => $value) {
                if ($key != 0 AND $key != count($nat_gateway_array)) {
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
                    $this->nat_gateway_array[] = ["name" => $name, "nat_gateway_id" => $nat_gateway_id, "connectivity_type" => $connectivity_type, "state" => $state, "state_message" => $state_message, "elastic_ip_address" => $elastic_ip_address, "private_ip_address" => $private_ip_address, "network_interface_id" => $network_interface_id, "vpc" => $vpc, "subnet" => $subnet, "created" => $created, "deleted" => $deleted];
                }
            }
        }

        public function GetAllNat_Gateway() {
            return $this->nat_gateway_array;
        }
    }