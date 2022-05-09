<?php
    Class Endpoints {  
        private $file;
        private $csv_array;
        private $endpoints_array;

        public function __construct() {
            $this->get_csv_array();
        }

        public function get_csv_array() {
            $this->csv_array = [];
            $this->endpoints_array = [];
            $this->file = fopen(__DIR__ . "/csv_files/VESA_PROD_VPC - Endpoints.csv" , "r");
            while (!feof($this->file)) {
                $ar = fgetcsv($this->file);
                $this->csv_array[] = $ar;
            }
            fclose($this->file);
            return $this->csv_array;
        }

        public function get_endpoints_array() {
            $this->endpoints_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $vpc_endpoint_id = $value[1];
                    $vpc_id = $value[2];
                    $service_name = $value[3];
                    $endpoint_type = $value[4];
                    $status = $value[5];
                    $creation_time = $value[6];
                    $network_interfaces = $value[7];
                    $subnets = $value[8];
                    $route_tables = $value[9];
                    $this->endpoints_array[] = ["name" => $name, "vpc_endpoint_id" => $vpc_endpoint_id, "vpc_id" => $vpc_id, "service_name" => $service_name, "endpoint_type" => $endpoint_type, "status" => $status, "creation_time" => $creation_time, "network_interfaces" => $network_interfaces, "subnets" => $subnets, "route_tables" => $route_tables];
                }
            }
            return $this->endpoints_array;
        }

        public function get_endpoints_array_by_vpc_id($vpc_id) {
            $this->endpoints_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $vpc_endpoint_id = $value[1];
                    $vpc_id = $value[2];
                    $service_name = $value[3];
                    $endpoint_type = $value[4];
                    $status = $value[5];
                    $creation_time = $value[6];
                    $network_interfaces = $value[7];
                    $subnets = $value[8];
                    $route_tables = $value[9];
                    if ($vpc_id == $vpc_id) {
                        $this->endpoints_array[] = ["name" => $name, "vpc_endpoint_id" => $vpc_endpoint_id, "vpc_id" => $vpc_id, "service_name" => $service_name, "endpoint_type" => $endpoint_type, "status" => $status, "creation_time" => $creation_time, "network_interfaces" => $network_interfaces, "subnets" => $subnets, "route_tables" => $route_tables];
                    }
                }
            }
            return $this->endpoints_array;
        }

        public function get_endpoints_array_by_name($name) {
            $this->endpoints_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $vpc_endpoint_id = $value[1];
                    $vpc_id = $value[2];
                    $service_name = $value[3];
                    $endpoint_type = $value[4];
                    $status = $value[5];
                    $creation_time = $value[6];
                    $network_interfaces = $value[7];
                    $subnets = $value[8];
                    $route_tables = $value[9];
                    if ($name == $name) {
                        $this->endpoints_array[] = ["name" => $name, "vpc_endpoint_id" => $vpc_endpoint_id, "vpc_id" => $vpc_id, "service_name" => $service_name, "endpoint_type" => $endpoint_type, "status" => $status, "creation_time" => $creation_time, "network_interfaces" => $network_interfaces, "subnets" => $subnets, "route_tables" => $route_tables];
                    }
                }
            }
            return $this->endpoints_array;
        }

        public function get_endpoints_array_by_endpoint_id($endpoint_id) {
            $this->endpoints_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $vpc_endpoint_id = $value[1];
                    $vpc_id = $value[2];
                    $service_name = $value[3];
                    $endpoint_type = $value[4];
                    $status = $value[5];
                    $creation_time = $value[6];
                    $network_interfaces = $value[7];
                    $subnets = $value[8];
                    $route_tables = $value[9];
                    if ($vpc_endpoint_id == $endpoint_id) {
                        $this->endpoints_array[] = ["name" => $name, "vpc_endpoint_id" => $vpc_endpoint_id, "vpc_id" => $vpc_id, "service_name" => $service_name, "endpoint_type" => $endpoint_type, "status" => $status, "creation_time" => $creation_time, "network_interfaces" => $network_interfaces, "subnets" => $subnets, "route_tables" => $route_tables];
                    }
                }
            }
            return $this->endpoints_array;
        }
        
        public function get_endpoints_array_by_subnets($subnets) {
            $this->endpoints_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $vpc_endpoint_id = $value[1];
                    $vpc_id = $value[2];
                    $service_name = $value[3];
                    $endpoint_type = $value[4];
                    $status = $value[5];
                    $creation_time = $value[6];
                    $network_interfaces = $value[7];
                    $subnets = $value[8];
                    $route_tables = $value[9];
                    if ($subnets == $subnets) {
                        $this->endpoints_array[] = ["name" => $name, "vpc_endpoint_id" => $vpc_endpoint_id, "vpc_id" => $vpc_id, "service_name" => $service_name, "endpoint_type" => $endpoint_type, "status" => $status, "creation_time" => $creation_time, "network_interfaces" => $network_interfaces, "subnets" => $subnets, "route_tables" => $route_tables];
                    }
                }
            }
            return $this->endpoints_array;
        }

        public function get_endpoints_array_by_route_tables($route_tables) {
            $this->endpoints_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $vpc_endpoint_id = $value[1];
                    $vpc_id = $value[2];
                    $service_name = $value[3];
                    $endpoint_type = $value[4];
                    $status = $value[5];
                    $creation_time = $value[6];
                    $network_interfaces = $value[7];
                    $subnets = $value[8];
                    $route_tables = $value[9];
                    if ($route_tables == $route_tables) {
                        $this->endpoints_array[] = ["name" => $name, "vpc_endpoint_id" => $vpc_endpoint_id, "vpc_id" => $vpc_id, "service_name" => $service_name, "endpoint_type" => $endpoint_type, "status" => $status, "creation_time" => $creation_time, "network_interfaces" => $network_interfaces, "subnets" => $subnets, "route_tables" => $route_tables];
                    }
                }
            }
            return $this->endpoints_array;
        }
    }