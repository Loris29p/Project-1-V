<?php 

    Class Transit_Gateway {
        private $file;
        private $csv_array;
        private $transit_gateway_array;
        public function __construct() {
            $this->get_csv_array();
        }

        public function get_csv_array() {
            $this->csv_array = [];
            $this->transit_gateway_array = [];
            $this->file = fopen(__DIR__ . "/csv_files/VESA_PROD_VPC - Transit gateways.csv" , "r");
            while (!feof($this->file)) {
                $ar = fgetcsv($this->file);
                $this->csv_array[] = $ar;
            }
            fclose($this->file);
            return $this->csv_array;
        }

        public function get_transit_gateway_array() {
            $this->transit_gateway_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $gateway = $value[1];
                    $owner = $value[2];
                    $state = $value[3];
                    $this->transit_gateway_array[] = [
                        "name" => $name,
                        "gateway" => $gateway,
                        "owner" => $owner,
                        "state" => $state
                    ];
                }
            }
            return $this->transit_gateway_array;
        }

        public function get_transit_gateway_array_by_name($name) {
            $this->transit_gateway_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $gateway = $value[1];
                    $owner = $value[2];
                    $state = $value[3];
                    if ($name == $name) {
                        $this->transit_gateway_array[] = [
                            "name" => $name,
                            "gateway" => $gateway,
                            "owner" => $owner,
                            "state" => $state
                        ];
                    }
                }
            }
            return $this->transit_gateway_array;
        }

        public function get_transit_gateway_array_by_gateway($gateway) {
            $this->transit_gateway_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $gateway = $value[1];
                    $owner = $value[2];
                    $state = $value[3];
                    if ($gateway == $gateway) {
                        $this->transit_gateway_array[] = [
                            "name" => $name,
                            "gateway" => $gateway,
                            "owner" => $owner,
                            "state" => $state
                        ];
                    }
                }
            }
            return $this->transit_gateway_array;
        }

        public function get_transit_gateway_array_by_owner($owner) {
            $this->transit_gateway_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $gateway = $value[1];
                    $owner = $value[2];
                    $state = $value[3];
                    if ($owner == $owner) {
                        $this->transit_gateway_array[] = [
                            "name" => $name,
                            "gateway" => $gateway,
                            "owner" => $owner,
                            "state" => $state
                        ];
                    }
                }
            }
            return $this->transit_gateway_array;
        }

        public function get_transit_gateway_array_by_state($state) {
            $this->transit_gateway_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $gateway = $value[1];
                    $owner = $value[2];
                    $state = $value[3];
                    if ($state == $state) {
                        $this->transit_gateway_array[] = [
                            "name" => $name,
                            "gateway" => $gateway,
                            "owner" => $owner,
                            "state" => $state
                        ];
                    }
                }
            }
            return $this->transit_gateway_array;
        }
    }