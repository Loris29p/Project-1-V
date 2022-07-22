<?php 
    require_once('Src/Controller/Read/Read.php');
    require_once('Src/Controller/SGBD/sgbd.php');

    class VPC {
        private $vpc_array;
        private $read;
        private $sgbd;

        public function __construct(SGBD $sgbd)
        {
            $this->read = new Read();
            $this->sgbd = $sgbd;
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
                    $this->vpc_array[$vpc_id] = ["souscription" => $souscription, "region" => $region, "vpc" => $vpc, "vpc_id" => $vpc_id, "cidr" => $cidr, "id_table_routage" => $id_tables_de_routage, "id_acl" => $id_acl];
                    $this->GetEndpointsByVpcId($vpc_id);
                    $this->GetPeeringConnectionsByVpcId($vpc_id);
                    $this->GetInternetGatewaysByVpcId($vpc_id);
                    $this->GetNatGatewaysByVpcId($vpc_id);
                    $this->GetTableRoutageByVpcId($vpc_id, $id_tables_de_routage);
                    $this->GetNetworkByVpcId($vpc_id);
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

        public function GetEndpointsByVpcId($vpc_id) {
            $endpoints = $this->sgbd->getWithParameters("SELECT * FROM endpoints WHERE vpc_id = '$vpc_id'");
            if ($endpoints != Array()) {
                $this->vpc_array[$vpc_id]['endpoints'] = $endpoints;
            }
        }

        public function GetPeeringConnectionsByVpcId($vpc_id) {
            $peering_connections = $this->sgbd->getWithParameters("SELECT * FROM peering_connections WHERE vpc_id = '$vpc_id'");
            if ($peering_connections != Array()) {
                $this->vpc_array[$vpc_id]['peering_connections'] = $peering_connections;
            }
        }

        public function GetInternetGatewaysByVpcId($vpc_id) {
            $internet_gateways = $this->sgbd->getWithParameters("SELECT * FROM internet_gateways WHERE vpc_id = '$vpc_id'");
            if ($internet_gateways != Array()) {
                $this->vpc_array[$vpc_id]['internet_gateways'] = $internet_gateways;
            }
        }

        public function GetNatGatewaysByVpcId($vpc_id) {
            $nat_gateways = $this->sgbd->getWithParameters("SELECT * FROM nat_gateway WHERE vpc = '$vpc_id'");
            if ($nat_gateways != Array()) {
                $this->vpc_array[$vpc_id]['nat_gateways'] = $nat_gateways;
            }
        }

        public function GetTableRoutageByVpcId($vpc_id, $table_routage) {
            $table_routages = $this->sgbd->getWithParameters("SELECT * FROM route_tables WHERE id = '$table_routage'");
            if ($table_routages != Array()) {
                $this->vpc_array[$vpc_id]['table_routages'] = $table_routages;
            }
        }

        public function GetNetworkByVpcId($vpc_id) {
            $network = $this->sgbd->getWithParameters("SELECT * FROM network WHERE vpc_id = '$vpc_id'");
            if ($network != Array()) {
                $this->vpc_array[$vpc_id]['network'] = $network;
            }
        }

        public function GetAllElementForShowByVpcId($vpc_id) {
            if (isset($this->vpc_array[$vpc_id])) {
                $vpc = $this->vpc_array[$vpc_id];
                return $vpc;
            } else {
                return Array();
            }
        }
    }