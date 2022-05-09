<?php 
    Class Route_Tables {
        private $file;
        private $csv_array;
        private $route_tables_array;
        public function __construct() {
            $this->get_csv_array();
        }

        public function get_csv_array() {
            $this->csv_array = [];
            $this->route_tables_array = [];
            $this->file = fopen(__DIR__ . "/csv_files/VESA_PROD_VPC - Route_Tables.csv" , "r");
            while (!feof($this->file)) {
                $ar = fgetcsv($this->file);
                $this->csv_array[] = $ar;
            }
            fclose($this->file);
            return $this->csv_array;
        }

        public function get_route_tables_array() {
            $this->route_tables_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $route_table_id = $value[1];
                    $destination = $value[2];
                    $target = $value[3];
                    $status = $value[4];
                    $propagated = $value[5];
                    $virtual_private_gateway = $value[6];
                    $this->route_tables_array[] = [
                        "name" => $name,
                        "route_table_id" => $route_table_id,
                        "destination" => $destination,
                        "target" => $target,
                        "status" => $status,
                        "propagated" => $propagated,
                        "virtual_private_gateway" => $virtual_private_gateway
                    ];
                }
            }
            return $this->route_tables_array;
        }


        public function get_route_tables_array_by_name($name) {
            $this->route_tables_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $route_table_id = $value[1];
                    $destination = $value[2];
                    $target = $value[3];
                    $status = $value[4];
                    $propagated = $value[5];
                    $virtual_private_gateway = $value[6];
                    if ($name == $name) {
                        $this->route_tables_array[] = [
                            "name" => $name,
                            "route_table_id" => $route_table_id,
                            "destination" => $destination,
                            "target" => $target,
                            "status" => $status,
                            "propagated" => $propagated,
                            "virtual_private_gateway" => $virtual_private_gateway
                        ];
                    }
                }
            }
            return $this->route_tables_array;
        }

        public function get_route_tables_array_by_route_table_id($route_table_id) {
            $this->route_tables_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $route_table_id = $value[1];
                    $destination = $value[2];
                    $target = $value[3];
                    $status = $value[4];
                    $propagated = $value[5];
                    $virtual_private_gateway = $value[6];
                    if ($route_table_id == $route_table_id) {
                        $this->route_tables_array[] = [
                            "name" => $name,
                            "route_table_id" => $route_table_id,
                            "destination" => $destination,
                            "target" => $target,
                            "status" => $status,
                            "propagated" => $propagated,
                            "virtual_private_gateway" => $virtual_private_gateway
                        ];
                    }
                }
            }
            return $this->route_tables_array;
        }

        public function get_route_tables_array_by_destination($destination) {
            $this->route_tables_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $route_table_id = $value[1];
                    $destination = $value[2];
                    $target = $value[3];
                    $status = $value[4];
                    $propagated = $value[5];
                    $virtual_private_gateway = $value[6];
                    if ($destination == $destination) {
                        $this->route_tables_array[] = [
                            "name" => $name,
                            "route_table_id" => $route_table_id,
                            "destination" => $destination,
                            "target" => $target,
                            "status" => $status,
                            "propagated" => $propagated,
                            "virtual_private_gateway" => $virtual_private_gateway
                        ];
                    }
                }
            }
            return $this->route_tables_array;
        }

        public function get_route_tables_array_by_target($target) {
            $this->route_tables_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $route_table_id = $value[1];
                    $destination = $value[2];
                    $target = $value[3];
                    $status = $value[4];
                    $propagated = $value[5];
                    $virtual_private_gateway = $value[6];
                    if ($target == $target) {
                        $this->route_tables_array[] = [
                            "name" => $name,
                            "route_table_id" => $route_table_id,
                            "destination" => $destination,
                            "target" => $target,
                            "status" => $status,
                            "propagated" => $propagated,
                            "virtual_private_gateway" => $virtual_private_gateway
                        ];
                    }
                }
            }
            return $this->route_tables_array;
        }

        public function get_route_tables_array_by_status($status) {
            $this->route_tables_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $route_table_id = $value[1];
                    $destination = $value[2];
                    $target = $value[3];
                    $status = $value[4];
                    $propagated = $value[5];
                    $virtual_private_gateway = $value[6];
                    if ($status == $status) {
                        $this->route_tables_array[] = [
                            "name" => $name,
                            "route_table_id" => $route_table_id,
                            "destination" => $destination,
                            "target" => $target,
                            "status" => $status,
                            "propagated" => $propagated,
                            "virtual_private_gateway" => $virtual_private_gateway
                        ];
                    }
                }
            }
            return $this->route_tables_array;
        }

        public function get_route_tables_array_by_propagated($propagated) {
            $this->route_tables_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $route_table_id = $value[1];
                    $destination = $value[2];
                    $target = $value[3];
                    $status = $value[4];
                    $propagated = $value[5];
                    $virtual_private_gateway = $value[6];
                    if ($propagated == $propagated) {
                        $this->route_tables_array[] = [
                            "name" => $name,
                            "route_table_id" => $route_table_id,
                            "destination" => $destination,
                            "target" => $target,
                            "status" => $status,
                            "propagated" => $propagated,
                            "virtual_private_gateway" => $virtual_private_gateway
                        ];
                    }
                }
            }
            return $this->route_tables_array;
        }

        public function get_route_tables_array_by_virtual_private_gateway($virtual_private_gateway) {
            $this->route_tables_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $route_table_id = $value[1];
                    $destination = $value[2];
                    $target = $value[3];
                    $status = $value[4];
                    $propagated = $value[5];
                    $virtual_private_gateway = $value[6];
                    if ($virtual_private_gateway == $virtual_private_gateway) {
                        $this->route_tables_array[] = [
                            "name" => $name,
                            "route_table_id" => $route_table_id,
                            "destination" => $destination,
                            "target" => $target,
                            "status" => $status,
                            "propagated" => $propagated,
                            "virtual_private_gateway" => $virtual_private_gateway
                        ];
                    }
                }
            }
            return $this->route_tables_array;
        }
    }