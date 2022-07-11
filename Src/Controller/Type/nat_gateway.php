<?php 
    require_once('Src/Controller/Read/Read.php');
    require_once('Src/Controller/SGBD/sgbd.php');

    class NAT_Gateway {
        private $nat_gateway_array;
        private $read;
        private $sgbd;

        public function __construct(SGBD $sgbd)
        {
            $this->read = new Read();
            $this->BuildArray();
            $this->sgbd = $sgbd;
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

        public function Update_SGDB() {
            $nat_gateway = $this->sgbd->get('nat_gateway');
            if ($nat_gateway != $this->nat_gateway_array) {
                echo "Une mise à jour des disponible";
                $this->sgbd->truncate("nat_gateway");
                sleep(1);
                foreach ($this->nat_gateway_array as $key => $value) {
                    $this->sgbd->insert('nat_gateway', $value);
                }
            } else {
                echo "Aucune mise à jour disponible";
            }
        }
    }