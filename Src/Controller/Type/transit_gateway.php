<?php 
    require_once('Src/Controller/Read/Read.php');

    class Transit_Gateway {
        private $transit_gateway_array;
        private $read;

        public function __construct()
        {
            $this->read = new Read();
            $this->BuildArray();
        }

        public function BuildArray() {
            $transit_gateway_array = $this->read->ReadTransitGateway();
            foreach ($transit_gateway_array as $key => $value) {
                if ($key != 0 AND $key != count($transit_gateway_array)) {
                    $value = $value;
                    $name = $value[0];
                    $gateway = $value[1];
                    $owner = $value[2];
                    $state = $value[3];
                    $this->transit_gateway_array[] = ["name" => $name, "gateway" => $gateway, "owner" => $owner, "state" => $state];    
                }
            }
        }

        public function GetAllTransitGateway() {
            return $this->transit_gateway_array;
        }
    }