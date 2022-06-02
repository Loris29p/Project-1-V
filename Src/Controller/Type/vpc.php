<?php 
    require_once('Src/Controller/Read/Read.php');

    class VPC {
        private $vpc_array;
        private $read;

        public function __construct()
        {
            $this->read = new Read();
            $this->BuildArray();
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
                    $this->vpc_array[] = ["souscription" => $souscription, "region" => $region, "vpc" => $vpc, "vpc_id" => $vpc_id, "cidr" => $cidr, "id_tables_de_routage" => $id_tables_de_routage, "id_acl" => $id_acl];
                }
            }
        }

        public function GetAllVPC() {
            return $this->vpc_array;
        }
    }