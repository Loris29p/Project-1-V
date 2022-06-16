<?php 
    require_once('Src/Controller/Read/Read.php');
    require_once('Src/Controller/SGBD/sgbd.php');

    class VPC {
        private $vpc_array;
        private $read;
        private $sgbd;

        public function __construct()
        {
            $this->read = new Read();
            $this->BuildArray();
            $this->sgbd = new SGBD();
        }

        public function BuildArray() {
            $vpc_array = $this->read->ReadVPC();
            foreach ($vpc_array as $key => $value) {
                if ($key != 0 AND $key != count($vpc_array)) {
                    $value = $value;
                    $souscription = $value[0];
                    $region = $value[1];
                    $vpc = $value[2];
                    $vpc_id = $value[3];
                    $cidr = $value[4];
                    $id_tables_de_routage = $value[5];
                    $id_acl = $value[6];
                    $this->vpc_array[] = ["souscription" => $souscription, "region" => $region, "vpc" => $vpc, "vpc_id" => $vpc_id, "cidr" => $cidr, "id_table_routage" => $id_tables_de_routage, "id_acl" => $id_acl];
                }
            }
        }

        public function GetAllVPC() {
            return $this->vpc_array;
        }

        public function Update_SGDB() {
            $vpc = $this->sgbd->get('vpc');
            if ($vpc != $this->vpc_array) {
                echo "Une mise à jour des disponible";
                $this->sgbd->truncate("vpc");
                sleep(1);
                foreach ($this->vpc_array as $key => $value) {
                    $this->sgbd->insert('vpc', $value);
                }
            } else {
                echo "Aucune mise à jour disponible";
            }
        }
    }