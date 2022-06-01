<?php 
    require_once('Src/Controller/Read.php');

    class VPC_Network {
        private $vpc_network_array;
        private $read;

        public function __construct()
        {
            $this->read = new Read();
            $this->BuildArray();
        }

        public function BuildArray() {
            $this->vpc_network_array = $this->read->ReadVPCNetwork();
        }

        public function GetAllVPCNetwork() {
            return $this->vpc_network_array;
        }
    }