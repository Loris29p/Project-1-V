<?php 
    require_once('Src/Controller/Read.php');

    class Transit_Gateway {
        private $transit_gateway_array;
        private $read;

        public function __construct()
        {
            $this->read = new Read();
            $this->BuildArray();
        }

        public function BuildArray() {
            $this->transit_gateway_array = $this->read->ReadTransitGateway();
        }

        public function GetAllTransitGateway() {
            return $this->transit_gateway_array;
        }
    }