<?php
    require_once('Src/Controller/Read/Read.php');
    require_once('Src/Controller/SGBD/sgbd.php');

    class Peering_Connections {
        private $peering_connections_array;
        private $read;
        private $sgbd;

        public function __construct(SGBD $sgbd)
        {
            $this->read = new Read();
            $this->BuildArray();
            $this->sgbd = $sgbd;
        }

        public function BuildArray() {
            $peering_connections_array = $this->read->ReadPeeringConnections();
            foreach ($peering_connections_array as $key => $value) {
                if ($key != 0 AND $key != count($peering_connections_array)) {
                    $value = $value;
                    $name = $value[0];
                    $peering_connection_id = $value[1];
                    $status = $value[2];
                    $requester_vpc = $value[3];
                    $accepter_vpc = $value[4];
                    $requester_cidr = $value[5];
                    $accepter_cidr = $value[6];
                    $requester_owner_id = $value[7];
                    $accepter_owner_id = $value[8];
                    $route_table_id = $value[9];
                    $vpc_id = $value[10];
                    $main = $value[11];
                    $associated_with = $value[12];
                    $this->peering_connections_array[] = ["name" => $name, "peering_connection_id" => $peering_connection_id, "status" => $status, "requester_vpc" => $requester_vpc, "accepter_vpc" => $accepter_vpc, "requester_cidr" => $requester_cidr, "accepter_cidr" => $accepter_cidr, "requester_owner_id" => $requester_owner_id, "accepter_owner_id" => $accepter_owner_id, "route_table_id" => $route_table_id, "vpc_id" => $vpc_id, "main" => $main, "associated_with" => $associated_with];
                }
            }
        }

        public function GetAllPeering_Connections() {
            return $this->peering_connections_array;
        }

        public function Update_SGDB() {
            $peering_connections = $this->sgbd->get('peering_connections');
            if ($peering_connections != $this->peering_connections_array) {
                echo "Une mise à jour des disponible";
                $this->sgbd->truncate("peering_connections");
                sleep(1);
                foreach ($this->peering_connections_array as $key => $value) {
                    $this->sgbd->insert('peering_connections', $value);
                }
            } else {
                echo "Aucune mise à jour disponible";
            }
        }
    }