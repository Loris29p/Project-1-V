<?php
    require_once('Src/Controller/Read/Read.php');
    require_once('Src/Controller/SGBD/sgbd.php');

    class VPN {
        private $vpn_array;
        private $read;
        private $sgbd;

        public function __construct(SGBD $sgbd)
        {
            $this->read = new Read();
            $this->sgbd = $sgbd;
            $this->BuildArray();
        }

        public function BuildArray() {
            $vpn_array = $this->read->ReadVPN();
            foreach ($vpn_array as $key => $value) {
                if ($key != 0 AND $key != count($vpn_array)) {
                    $value = $value;
                    $name = $value[0];
                    $virutal_private_gateway_id = $value[1];
                    $state = $value[2];
                    $type = $value[3];
                    $vpc = $value[4];
                    $asn = $value[5];
                    $this->vpn_array[] = ["name" => $name, "virutal_private_gateway_id" => $virutal_private_gateway_id, "state" => $state, "type" => $type, "vpc" => $vpc, "asn" => $asn];
                }
            }
        }

        public function GetAllVPN() {
            return $this->vpn_array;
        }

        public function Update_SGDB() {
            $vpn = $this->sgbd->get('vpn');
            if ($vpn != $this->vpn_array) {
                echo "Une mise à jour des disponible";
                $this->sgbd->truncate("vpn");
                sleep(1);
                foreach ($this->vpn_array as $key => $value) {
                    $this->sgbd->InsertWithParameters('vpn', $value);
                }
            } else {
                echo "Aucune mise à jour disponible";
            }
        }
    }