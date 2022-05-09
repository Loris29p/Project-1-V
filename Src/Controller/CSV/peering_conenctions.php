<?php 
    Class Peering_Connections {
        private $file;
        private $csv_array;
        private $peering_connections_array;
        public function __construct() {
            $this->get_csv_array();
        }   

        public function get_csv_array() {
            $this->csv_array = [];
            $this->peering_connections_array = [];
            $this->file = fopen(__DIR__ . "/csv_files/VESA_PROD_VPC - Peering_Connections.csv" , "r");
            while (!feof($this->file)) {
                $ar = fgetcsv($this->file);
                $this->csv_array[] = $ar;
            }
            fclose($this->file);
            return $this->csv_array;
        }

        public function get_peering_connections_array() {
            $this->peering_connections_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
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
                    $this->peering_connections_array[] = [
                        "name" => $name,
                        "peering_connection_id" => $peering_connection_id,
                        "status" => $status,
                        "requester_vpc" => $requester_vpc,
                        "accepter_vpc" => $accepter_vpc,
                        "requester_cidrs" => $requester_cidrs,
                        "accepter_cidrs" => $accepter_cidrs,
                        "requester_owner_id" => $requester_owner_id,
                        "accepter_owner_id" => $accepter_owner_id,
                        "route_table_id" => $route_table_id,
                        "vpc_id" => $vpc_id,
                        "main" => $main,
                        "associated_with" => $associated_with
                    ];
                }
            }
            return $this->peering_connections_array;
        }

        public function get_peering_connections_array_by_name($name) {
            $this->peering_connections_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
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
                    if ($name == $name) {
                        $this->peering_connections_array[] = [
                            "name" => $name,
                            "peering_connection_id" => $peering_connection_id,
                            "status" => $status,
                            "requester_vpc" => $requester_vpc,
                            "accepter_vpc" => $accepter_vpc,
                            "requester_cidrs" => $requester_cidrs,
                            "accepter_cidrs" => $accepter_cidrs,
                            "requester_owner_id" => $requester_owner_id,
                            "accepter_owner_id" => $accepter_owner_id,
                            "route_table_id" => $route_table_id,
                            "vpc_id" => $vpc_id,
                            "main" => $main,
                            "associated_with" => $associated_with
                        ];
                    }
                }
            }
            return $this->peering_connections_array;
        }

        public function get_peering_connections_array_by_peering_connection_id($peering_connection_id) {
            $this->peering_connections_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
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
                    if ($peering_connection_id == $peering_connection_id) {
                        $this->peering_connections_array[] = [
                            "name" => $name,
                            "peering_connection_id" => $peering_connection_id,
                            "status" => $status,
                            "requester_vpc" => $requester_vpc,
                            "accepter_vpc" => $accepter_vpc,
                            "requester_cidrs" => $requester_cidrs,
                            "accepter_cidrs" => $accepter_cidrs,
                            "requester_owner_id" => $requester_owner_id,
                            "accepter_owner_id" => $accepter_owner_id,
                            "route_table_id" => $route_table_id,
                            "vpc_id" => $vpc_id,
                            "main" => $main,
                            "associated_with" => $associated_with
                        ];
                    }
                }
            }
            return $this->peering_connections_array;
        }

        public function get_peering_connections_array_by_status($status) {
            $this->peering_connections_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
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
                    if ($status == $status) {
                        $this->peering_connections_array[] = [
                            "name" => $name,
                            "peering_connection_id" => $peering_connection_id,
                            "status" => $status,
                            "requester_vpc" => $requester_vpc,
                            "accepter_vpc" => $accepter_vpc,
                            "requester_cidrs" => $requester_cidrs,
                            "accepter_cidrs" => $accepter_cidrs,
                            "requester_owner_id" => $requester_owner_id,
                            "accepter_owner_id" => $accepter_owner_id,
                            "route_table_id" => $route_table_id,
                            "vpc_id" => $vpc_id,
                            "main" => $main,
                            "associated_with" => $associated_with
                        ];
                    }
                }
            }
            return $this->peering_connections_array;
        }

        public function get_peering_connections_array_by_requester_vpc($requester_vpc) {
            $this->peering_connections_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
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
                    if ($requester_vpc == $requester_vpc) {
                        $this->peering_connections_array[] = [
                            "name" => $name,
                            "peering_connection_id" => $peering_connection_id,
                            "status" => $status,
                            "requester_vpc" => $requester_vpc,
                            "accepter_vpc" => $accepter_vpc,
                            "requester_cidrs" => $requester_cidrs,
                            "accepter_cidrs" => $accepter_cidrs,
                            "requester_owner_id" => $requester_owner_id,
                            "accepter_owner_id" => $accepter_owner_id,
                            "route_table_id" => $route_table_id,
                            "vpc_id" => $vpc_id,
                            "main" => $main,
                            "associated_with" => $associated_with
                        ];
                    }
                }
            }
        }

    }

