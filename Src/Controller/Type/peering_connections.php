<?php
    require_once('Src/Controller/Read.php');

    class Peering_Connections {
        private $peering_connections_array;
        private $read;

        public function __construct()
        {
            $this->read = new Read();
            $this->BuildArray();
        }

        public function BuildArray() {
            $this->peering_connections_array = $this->read->ReadPeeringConnections();
        }

        public function GetAllPeeringConnections() {
            return $this->peering_connections_array;
        }
    }