<?php 
    Class NAT_Gateway {
        private $file;
        private $csv_array;
        private $nat_gateway_array;
        public function __construct() {
            $this->get_csv_array();
        }

        public function get_csv_array() {
            $this->csv_array = [];
            $this->nat_gateway_array = [];
            $this->file = fopen(__DIR__ . "/csv_files/VESA_PROD_VPC - NAT gateways.csv" , "r");
            while (!feof($this->file)) {
                $ar = fgetcsv($this->file);
                $this->csv_array[] = $ar;
            }
            fclose($this->file);
            return $this->csv_array;
        }

        public function get_nat_gateway_array() {
            $this->nat_gateway_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
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
            return $this->nat_gateway_array;
        }

        public function get_nat_gateway_array_by_name($name) {
            $this->nat_gateway_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
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
                    if ($name == $name) {
                        $this->nat_gateway_array[] = ["name" => $name, "nat_gateway_id" => $nat_gateway_id, "connectivity_type" => $connectivity_type, "state" => $state, "state_message" => $state_message, "elastic_ip_address" => $elastic_ip_address, "private_ip_address" => $private_ip_address, "network_interface_id" => $network_interface_id, "vpc" => $vpc, "subnet" => $subnet, "created" => $created, "deleted" => $deleted];
                    }
                }
            }
            return $this->nat_gateway_array;
        }

        public function get_nat_gateway_array_by_nat_gateway_id($nat_gateway_id) {
            $this->nat_gateway_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
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
                    if ($nat_gateway_id == $nat_gateway_id) {
                        $this->nat_gateway_array[] = ["name" => $name, "nat_gateway_id" => $nat_gateway_id, "connectivity_type" => $connectivity_type, "state" => $state, "state_message" => $state_message, "elastic_ip_address" => $elastic_ip_address, "private_ip_address" => $private_ip_address, "network_interface_id" => $network_interface_id, "vpc" => $vpc, "subnet" => $subnet, "created" => $created, "deleted" => $deleted];
                    }
                }
            }
            return $this->nat_gateway_array;
        }

        public function get_nat_gateway_array_by_connectivity_type($connectivity_type) {
            $this->nat_gateway_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
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
                    if ($connectivity_type == $connectivity_type) {
                        $this->nat_gateway_array[] = ["name" => $name, "nat_gateway_id" => $nat_gateway_id, "connectivity_type" => $connectivity_type, "state" => $state, "state_message" => $state_message, "elastic_ip_address" => $elastic_ip_address, "private_ip_address" => $private_ip_address, "network_interface_id" => $network_interface_id, "vpc" => $vpc, "subnet" => $subnet, "created" => $created, "deleted" => $deleted];
                    }
                }
            }
            return $this->nat_gateway_array;
        }

        public function get_nat_gateway_array_by_state($state) {
            $this->nat_gateway_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
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
                    if ($state == $state) {
                        $this->nat_gateway_array[] = ["name" => $name, "nat_gateway_id" => $nat_gateway_id, "connectivity_type" => $connectivity_type, "state" => $state, "state_message" => $state_message, "elastic_ip_address" => $elastic_ip_address, "private_ip_address" => $private_ip_address, "network_interface_id" => $network_interface_id, "vpc" => $vpc, "subnet" => $subnet, "created" => $created, "deleted" => $deleted];
                    }
                }
            }
            return $this->nat_gateway_array;
        }

        public function get_nat_gateway_array_by_vpc($vpc) {
            $this->nat_gateway_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
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
                    if ($vpc == $vpc) {
                        $this->nat_gateway_array[] = ["name" => $name, "nat_gateway_id" => $nat_gateway_id, "connectivity_type" => $connectivity_type, "state" => $state, "state_message" => $state_message, "elastic_ip_address" => $elastic_ip_address, "private_ip_address" => $private_ip_address, "network_interface_id" => $network_interface_id, "vpc" => $vpc, "subnet" => $subnet, "created" => $created, "deleted" => $deleted];
                    }
                }
            }
            return $this->nat_gateway_array;
        }

        public function get_nat_gateway_array_by_subnet($subnet) {
            $this->nat_gateway_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
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
                    if ($subnet == $subnet) {
                        $this->nat_gateway_array[] = ["name" => $name, "nat_gateway_id" => $nat_gateway_id, "connectivity_type" => $connectivity_type, "state" => $state, "state_message" => $state_message, "elastic_ip_address" => $elastic_ip_address, "private_ip_address" => $private_ip_address, "network_interface_id" => $network_interface_id, "vpc" => $vpc, "subnet" => $subnet, "created" => $created, "deleted" => $deleted];
                    }
                }
            }
            return $this->nat_gateway_array;
        }

    }
