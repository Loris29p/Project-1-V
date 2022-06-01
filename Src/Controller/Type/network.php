<?php 
    require_once('Src/Controller/Read.php');

    class Network {
        private $network_array;
        private $read;

        public function __construct()
        {
            $this->read = new Read();
            $this->BuildArray();
        }

        public function BuildArray() {
            $this->network_array = $this->read->ReadNetwork();
        }

        public function GetAllNetwork() {
            return $this->network_array;
        }
    }