<?php 
    require_once('Src/Controller/Read.php');

    class Route_Tables {
        private $route_array;
        private $read;

        public function __construct()
        {
            $this->read = new Read();
            $this->BuildArray();
        }

        public function BuildArray() {
            $this->route_array = $this->read->ReadRouteTables();
        }

        public function GetAllRouteTables() {
            return $this->route_array;
        }
    }