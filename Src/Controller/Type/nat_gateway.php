<?php 
    require_once('Src/Controller/Read.php');

    class NAT_Gateway {
        private $nat_gateway_array;
        private $read;

        public function __construct()
        {
            $this->read = new Read();
            $this->BuildArray();
        }

        public function BuildArray() {
            $this->nat_gateway_array = $this->read->ReadNatGateway();
        }

        public function GetAllNatGateway() {
            return $this->nat_gateway_array;
        }
    }