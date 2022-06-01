<?php 
    require_once('Src/Controller/Read.php');

    class Endpoints {
        private $endpoints_array;
        private $read;

        public function __construct()
        {
            $this->read = new Read();
            $this->BuildArray();
        }

        public function BuildArray() {
            $this->endpoints_array = $this->read->ReadEndpoints();
        }

        public function GetAllEndpoints() {
            return $this->endpoints_array;
        }
    }