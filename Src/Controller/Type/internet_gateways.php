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
            $this->internet_gateways_array = $this->read->ReadInternetGateway();
        }

        public function GetAllInternetGateway() {
            return $this->internet_gateways_array;
        }
    }