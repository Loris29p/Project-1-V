<?php 
    Class Network {
        private $file;
        private $csv_array;
        private $network_array;

        public function __construct() {
            $this->get_csv_array();
        }

        public function get_csv_array() {
            $this->csv_array = [];
            $this->network_array = [];
            $this->file = fopen(__DIR__ . "/csv_files/VESA_PROD_VPC - Network.csv" , "r");
            while (!feof($this->file)) {
                $ar = fgetcsv($this->file);
                $this->csv_array[] = $ar;
            }
            fclose($this->file);
            return $this->csv_array;
        }

        public function get_network_array() {
            $this->network_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
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
                    $this->network_array[] = ["name" => $name, "network_id" => $network_id, "vpc_id" => $vpc_id, "cidr_ipv4" => $cidr_ipv4, "ipv4_available" => $ipv4_available, "zone_disponibility" => $zone_disponibility, "zone_disponibility_id" => $zone_disponibility_id, "table_routage" => $table_routage, "acl_network" => $acl_network, "default_subnet" => $default_subnet, "auto_ipv4_public" => $auto_ipv4_public, "auto_ipv4_private" => $auto_ipv4_private];
                }
            }
            return $this->network_array;
        }

        public function get_network_array_by_vpc_id($vpc_id) {
            $this->network_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
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
                    if ($vpc_id == $vpc_id) {
                        $this->network_array[] = ["network_id" => $network_id, "vpc_id" => $vpc_id, "cidr_ipv4" => $cidr_ipv4, "ipv4_available" => $ipv4_available, "zone_disponibility" => $zone_disponibility, "zone_disponibility_id" => $zone_disponibility_id, "table_routage" => $table_routage, "acl_network" => $acl_network, "default_subnet" => $default_subnet, "auto_ipv4_public" => $auto_ipv4_public, "auto_ipv4_private" => $auto_ipv4_private];
                    }
                }
            }
            return $this->network_array;
        }
    }

