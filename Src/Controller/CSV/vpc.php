<?php 
    class VPC {
        private $file;
        private $csv_array;
        private $vpc_array;

        public function __construct() {
            $this->get_csv_array();
        }

        public function get_csv_array() {
            $this->csv_array = [];
            $this->vpc_array = [];
            $this->file = fopen(__DIR__ . "/csv_files/VESA_PROD_VPC - VPC.csv" , "r");
            while (!feof($this->file)) {
                $ar = fgetcsv($this->file);
                $this->csv_array[] = $ar;
            }
            fclose($this->file);
            return $this->csv_array;
        }

        public function get_vpc_array() {
            $this->vpc_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
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
            return $this->vpc_array;
        }

        public function get_vpc_array_by_souscription($souscription) {
            $this->vpc_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $souscription = $value[0];
                    $region = $value[1];
                    $vpc = $value[2];
                    $vpc_id = $value[3];
                    $cidr = $value[4];
                    $id_tables_de_routage = $value[5];
                    $id_acl = $value[6];
                    if ($souscription == $souscription) {
                        $this->vpc_array[] = ["souscription" => $souscription, "region" => $region, "vpc" => $vpc, "vpc_id" => $vpc_id, "cidr" => $cidr, "id_tables_de_routage" => $id_tables_de_routage, "id_acl" => $id_acl];
                    }
                }
            }
            return $this->vpc_array;
        }

        public function get_vpc_array_by_region($region) {
            $this->vpc_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $souscription = $value[0];
                    $region = $value[1];
                    $vpc = $value[2];
                    $vpc_id = $value[3];
                    $cidr = $value[4];
                    $id_tables_de_routage = $value[5];
                    $id_acl = $value[6];
                    if ($region == $region) {
                        $this->vpc_array[] = ["souscription" => $souscription, "region" => $region, "vpc" => $vpc, "vpc_id" => $vpc_id, "cidr" => $cidr, "id_tables_de_routage" => $id_tables_de_routage, "id_acl" => $id_acl];
                    }
                }
            }
            return $this->vpc_array;
        }

        public function get_vpc_array_by_vpc($vpc) {
            $this->vpc_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $souscription = $value[0];
                    $region = $value[1];
                    $vpc = $value[2];
                    $vpc_id = $value[3];
                    $cidr = $value[4];
                    $id_tables_de_routage = $value[5];
                    $id_acl = $value[6];
                    if ($vpc == $vpc) {
                        $this->vpc_array[] = ["souscription" => $souscription, "region" => $region, "vpc" => $vpc, "vpc_id" => $vpc_id, "cidr" => $cidr, "id_tables_de_routage" => $id_tables_de_routage, "id_acl" => $id_acl];
                    }
                }
            }
            return $this->vpc_array;
        }

        public function get_vpc_array_by_vpc_id($vpc_id) {
            $this->vpc_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $souscription = $value[0];
                    $region = $value[1];
                    $vpc = $value[2];
                    $vpc_id = $value[3];
                    $cidr = $value[4];
                    $id_tables_de_routage = $value[5];
                    $id_acl = $value[6];
                    if ($vpc_id == $vpc_id) {
                        $this->vpc_array[] = ["souscription" => $souscription, "region" => $region, "vpc" => $vpc, "vpc_id" => $vpc_id, "cidr" => $cidr, "id_tables_de_routage" => $id_tables_de_routage, "id_acl" => $id_acl];
                    }
                }
            }
            return $this->vpc_array;
        }

        public function get_vpc_array_by_cidr($cidr) {
            $this->vpc_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $souscription = $value[0];
                    $region = $value[1];
                    $vpc = $value[2];
                    $vpc_id = $value[3];
                    $cidr = $value[4];
                    $id_tables_de_routage = $value[5];
                    $id_acl = $value[6];
                    if ($cidr == $cidr) {
                        $this->vpc_array[] = ["souscription" => $souscription, "region" => $region, "vpc" => $vpc, "vpc_id" => $vpc_id, "cidr" => $cidr, "id_tables_de_routage" => $id_tables_de_routage, "id_acl" => $id_acl];
                    }
                }
            }
            return $this->vpc_array;
        }

        public function get_vpc_array_by_id_tables_de_routage($id_tables_de_routage) {
            $this->vpc_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $souscription = $value[0];
                    $region = $value[1];
                    $vpc = $value[2];
                    $vpc_id = $value[3];
                    $cidr = $value[4];
                    $id_tables_de_routage = $value[5];
                    $id_acl = $value[6];
                    if ($id_tables_de_routage == $id_tables_de_routage) {
                        $this->vpc_array[] = ["souscription" => $souscription, "region" => $region, "vpc" => $vpc, "vpc_id" => $vpc_id, "cidr" => $cidr, "id_tables_de_routage" => $id_tables_de_routage, "id_acl" => $id_acl];
                    }
                }
            }
            return $this->vpc_array;
        }

        public function get_vpc_array_by_id_acl($id_acl) {
            $this->vpc_array = [];
            foreach ($this->csv_array as $key => $value) {
                if ($key != 0 AND $key != count($this->csv_array)) {
                    $value = $value;
                    $souscription = $value[0];
                    $region = $value[1];
                    $vpc = $value[2];
                    $vpc_id = $value[3];
                    $cidr = $value[4];
                    $id_tables_de_routage = $value[5];
                    $id_acl = $value[6];
                    if ($id_acl == $id_acl) {
                        $this->vpc_array[] = ["souscription" => $souscription, "region" => $region, "vpc" => $vpc, "vpc_id" => $vpc_id, "cidr" => $cidr, "id_tables_de_routage" => $id_tables_de_routage, "id_acl" => $id_acl];
                    }
                }
            }
            return $this->vpc_array;
        }
    }
