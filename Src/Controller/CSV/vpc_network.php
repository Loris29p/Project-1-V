<?php 
    Class VPC_Network {
        private $file;
        private $csv_array;
        private $vpc_network_array;
        public function __construct() {
            $this->get_csv_array();
        }

        public function get_csv_array() {
            $this->csv_array = [];
            $this->vpc_network_array = [];
            $this->file = fopen(__DIR__ . "/csv_files/VESA_PROD_VPC - VPC_Netwok.csv" , "r");
            while (!feof($this->file)) {
                $ar = fgetcsv($this->file);
                $this->csv_array[] = $ar;
            }
            fclose($this->file);
            return $this->csv_array;
        }

        public function get_vpc_network_array() {
            $this->vpc_network_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array) - 1) {
                    $value = $value;
                    $name = $value[0];
                    $ip = $value[1];
                    $this->vpc_network_array[] = ["name" => $name, "ip" => $ip];
                }
            }
            return $this->vpc_network_array;
        }

        public function get_vpc_network_array_by_name($name) {
            $this->vpc_network_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array) - 1) {
                    $value = $value;
                    $name = $value[0];
                    $ip = $value[1];
                    if ($name == $name) {
                        $this->vpc_network_array[] = ["name" => $name, "ip" => $ip];
                    }
                }
            }
            return $this->vpc_network_array;
        }

        public function get_vpc_network_array_by_ip($ip) {
            $this->vpc_network_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array) - 1) {
                    $value = $value;
                    $name = $value[0];
                    $ip = $value[1];
                    if ($ip == $ip) {
                        $this->vpc_network_array[] = ["name" => $name, "ip" => $ip];
                    }
                }
            }
            return $this->vpc_network_array;
        }

        public function get_vpc_network_array_by_name_and_ip($name, $ip) {
            $this->vpc_network_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array) - 1) {
                    $value = $value;
                    $name = $value[0];
                    $ip = $value[1];
                    if ($name == $name AND $ip == $ip) {
                        $this->vpc_network_array[] = ["name" => $name, "ip" => $ip];
                    }
                }
            }
            return $this->vpc_network_array;
        }
    }