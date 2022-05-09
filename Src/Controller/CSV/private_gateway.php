<?php 
    Class Private_Gateway {
        private $file;
        private $csv_array;
        private $private_gateway_array;
        public function __construct() {
            $this->get_csv_array();
        }

        public function get_csv_array() {
            $this->csv_array = [];
            $this->private_gateway_array = [];
            $this->file = fopen(__DIR__ . "/csv_files/VESA_PROD_VPC - Virtual private gateways.csv" , "r");
            while (!feof($this->file)) {
                $ar = fgetcsv($this->file);
                $this->csv_array[] = $ar;
            }
            fclose($this->file);
            return $this->csv_array;
        }

        public function get_private_gateway_array() {
            $this->private_gateway_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $gateway = $value[1];
                    $state = $value[2];
                    $type = $value[3];
                    $vpc = $value[4];
                    $asn = $value[5];
                    $this->private_gateway_array[] = [
                        "name" => $name,
                        "gateway" => $gateway,
                        "state" => $state,
                        "type" => $type,
                        "vpc" => $vpc,
                        "asn" => $asn
                    ];
                }
            }
            return $this->private_gateway_array;
        }

        public function get_private_gateway_array_by_vpc($vpc) {
            $this->private_gateway_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $gateway = $value[1];
                    $state = $value[2];
                    $type = $value[3];
                    $vpc = $value[4];
                    $asn = $value[5];
                    if ($vpc == $vpc) {
                        $this->private_gateway_array[] = [
                            "name" => $name,
                            "gateway" => $gateway,
                            "state" => $state,
                            "type" => $type,
                            "vpc" => $vpc,
                            "asn" => $asn
                        ];
                    }
                }
            }
            return $this->private_gateway_array;
        }

        public function get_private_gateway_array_by_vpc_and_state($vpc, $state) {
            $this->private_gateway_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $gateway = $value[1];
                    $state = $value[2];
                    $type = $value[3];
                    $vpc = $value[4];
                    $asn = $value[5];
                    if ($vpc == $vpc AND $state == $state) {
                        $this->private_gateway_array[] = [
                            "name" => $name,
                            "gateway" => $gateway,
                            "state" => $state,
                            "type" => $type,
                            "vpc" => $vpc,
                            "asn" => $asn
                        ];
                    }
                }
            }
            return $this->private_gateway_array;
        }

        public function get_private_gateway_array_by_vpc_and_state_and_type($vpc, $state, $type) {
            $this->private_gateway_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $gateway = $value[1];
                    $state = $value[2];
                    $type = $value[3];
                    $vpc = $value[4];
                    $asn = $value[5];
                    if ($vpc == $vpc AND $state == $state AND $type == $type) {
                        $this->private_gateway_array[] = [
                            "name" => $name,
                            "gateway" => $gateway,
                            "state" => $state,
                            "type" => $type,
                            "vpc" => $vpc,
                            "asn" => $asn
                        ];
                    }
                }
            }
            return $this->private_gateway_array;
        }

        public function get_private_gateway_array_by_vpc_and_state_and_type_and_asn($vpc, $state, $type, $asn) {
            $this->private_gateway_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $gateway = $value[1];
                    $state = $value[2];
                    $type = $value[3];
                    $vpc = $value[4];
                    $asn = $value[5];
                    if ($vpc == $vpc AND $state == $state AND $type == $type AND $asn == $asn) {
                        $this->private_gateway_array[] = [
                            "name" => $name,
                            "gateway" => $gateway,
                            "state" => $state,
                            "type" => $type,
                            "vpc" => $vpc,
                            "asn" => $asn
                        ];
                    }
                }
            }
            return $this->private_gateway_all_array;
        }

        public function get_private_gateway_array_by_vpc_and_state_and_type_and_asn_and_gateway($vpc, $state, $type, $asn, $gateway) {
            $this->private_gateway_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $name = $value[0];
                    $gateway = $value[1];
                    $state = $value[2];
                    $type = $value[3];
                    $vpc = $value[4];
                    $asn = $value[5];
                    if ($vpc == $vpc AND $state == $state AND $type == $type AND $asn == $asn AND $gateway == $gateway) {
                        $this->private_gateway_array[] = [
                            "name" => $name,
                            "gateway" => $gateway,
                            "state" => $state,
                            "type" => $type,
                            "vpc" => $vpc,
                            "asn" => $asn
                        ];
                    }
                }
            }
            return $this->private_gateway_array;
        }
    }