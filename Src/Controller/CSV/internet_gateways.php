<?php 
    Class Internet_Gateways {
        private $file;
        private $csv_array;
        private $internet_gateways_array;

        public function __construct() {
            $this->get_csv_array();
        }

        public function get_csv_array() {
            $this->csv_array = [];
            $this->internet_gateways_array = [];
            $this->file = fopen(__DIR__ . "/csv_files/VESA_PROD_VPC - Internet gateways.csv" , "r");
            while (!feof($this->file)) {
                $ar = fgetcsv($this->file);
                $this->csv_array[] = $ar;
            }
            fclose($this->file);
            return $this->csv_array;
        }

        public function get_internet_gateways_array() {
            $this->internet_gateways_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $internet_gateway_id = $value[1];
                    $state = $value[2];
                    $vpc_id = $value[3];
                    $owner = $value[4];
                    $this->internet_gateways_array[] = ["name" => $name, "internet_gateway_id" => $internet_gateway_id, "state" => $state, "vpc_id" => $vpc_id, "owner" => $owner];
                }
            }
            return $this->internet_gateways_array;
        }

        public function get_internet_gateways_array_by_vpc_id($vpc_id) {
            $this->internet_gateways_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $internet_gateway_id = $value[1];
                    $state = $value[2];
                    $vpc_id = $value[3];
                    $owner = $value[4];
                    if ($vpc_id == $vpc_id) {
                        $this->internet_gateways_array[] = ["name" => $name, "internet_gateway_id" => $internet_gateway_id, "state" => $state, "vpc_id" => $vpc_id, "owner" => $owner];
                    }
                }
            }
            return $this->internet_gateways_array;
        }

        public function get_internet_gateways_array_by_state($state) {
            $this->internet_gateways_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $internet_gateway_id = $value[1];
                    $state = $value[2];
                    $vpc_id = $value[3];
                    $owner = $value[4];
                    if ($state == $state) {
                        $this->internet_gateways_array[] = ["name" => $name, "internet_gateway_id" => $internet_gateway_id, "state" => $state, "vpc_id" => $vpc_id, "owner" => $owner];
                    }
                }
            }
            return $this->internet_gateways_array;
        }

        public function get_internet_gateways_array_by_owner($owner) {
            $this->internet_gateways_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $internet_gateway_id = $value[1];
                    $state = $value[2];
                    $vpc_id = $value[3];
                    $owner = $value[4];
                    if ($owner == $owner) {
                        $this->internet_gateways_array[] = ["name" => $name, "internet_gateway_id" => $internet_gateway_id, "state" => $state, "vpc_id" => $vpc_id, "owner" => $owner];
                    }
                }
            }
            return $this->internet_gateways_array;
        }

        public function get_internet_gateways_array_by_name($name) {
            $this->internet_gateways_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $internet_gateway_id = $value[1];
                    $state = $value[2];
                    $vpc_id = $value[3];
                    $owner = $value[4];
                    if ($name == $name) {
                        $this->internet_gateways_array[] = ["name" => $name, "internet_gateway_id" => $internet_gateway_id, "state" => $state, "vpc_id" => $vpc_id, "owner" => $owner];
                    }
                }
            }
            return $this->internet_gateways_array;
        }
    }
