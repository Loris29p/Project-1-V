<?php 
    require_once('Src/Controller/Read.php');

    class Internet_Gateways {
        private $internet_gateways_array;
        private $read;

        public function __construct()
        {
            $this->read = new Read();
            $this->BuildArray();
        }

        public function BuildArray() {
            $internet_gateways_array = $this->read->ReadInternetGateway();
            foreach ($internet_gateways_array as $key => $value) {
                if ($key != 0 AND $key != count($internet_gateways_array)) {
                    $value = $value;
                    $name = $value[0];
                    $internet_gateway_id = $value[1];
                    $state = $value[2];
                    $vpc_id = $value[3];
                    $owner = $value[4];
                    $this->internet_gateways_array[] = ["name" => $name, "internet_gateway_id" => $internet_gateway_id, "state" => $state, "vpc_id" => $vpc_id, "owner" => $owner];
                }
            }
        }

        public function GetAllInternetGateway() {
            return $this->internet_gateways_array;
        }
    }