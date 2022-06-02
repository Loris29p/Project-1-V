<?php 
    require_once('Src/Controller/Read/Read.php');

    class VPC_Network {
        private $vpc_network_array;
        private $read;

        public function __construct()
        {
            $this->read = new Read();
            $this->BuildArray();
        }

        public function BuildArray() {
            $vpc_network_array = $this->read->ReadVPCNetwork();
            foreach ($vpc_network_array as $key => $value) {
                if ($key != 0 AND $key != count($vpc_network_array)) {
                    $value = $value;
                    $id = $value[0];
                    $id_sous_reseaux = $value[1];
                    $this->vpc_network_array[] = ["id" => $id, "id_sous_reseaux" => $id_sous_reseaux];    
                }
            }
        }

        public function GetAllVPCNetwork() {
            return $this->vpc_network_array;
        }
    }