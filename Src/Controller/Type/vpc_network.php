<?php 
    require_once('Src/Controller/Read/Read.php');
    require_once('Src/Controller/SGBD/sgbd.php');

    class VPC_Network {
        private $vpc_network_array;
        private $read;
        private $sgbd;

        public function __construct()
        {
            $this->read = new Read();
            $this->BuildArray();
            $this->sgbd = new SGBD();
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

        public function GetAllVPC_Network() {
            return $this->vpc_network_array;
        }

        public function Update_SGDB() {
            echo "Update_SGDB";
            $vpc_network = $this->sgbd->get('vpc_network');
            if ($vpc_network != $this->vpc_network_array) {
                echo "Une mise à jour des disponible";
                $this->sgbd->truncate("vpc_network");
                sleep(1);
                foreach ($this->vpc_network_array as $key => $value) {
                    $this->sgbd->insert('vpc_network', $value);
                }
            } else {
                echo "Aucune mise à jour disponible";
            }
        }
    }