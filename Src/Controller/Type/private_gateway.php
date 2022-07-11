<?php 
    require_once('Src/Controller/Read/Read.php');
    require_once('Src/Controller/SGBD/sgbd.php');

    class Private_Gateway {
        private $private_gateway_array;
        private $read;
        private $sgbd;

        public function __construct(SGBD $sgbd)
        {
            $this->read = new Read();
            $this->BuildArray();
            $this->sgbd = $sgbd;
        }

        public function BuildArray() {
            $private_gateway_array = $this->read->ReadPrivateGateway();
            foreach ($private_gateway_array as $key => $value) {
                if ($key != 0 AND $key != count($private_gateway_array)) {
                    $value = $value;
                    $name = $value[0];
                    $gateway = $value[1];
                    $state = $value[2];
                    $type = $value[3];
                    $vpc = $value[4];
                    $asn = $value[5];
                    $this->private_gateway_array[] = ["name" => $name, "gateway" => $gateway, "state" => $state, "type" => $type, "vpc" => $vpc, "asn" => $asn];    
                }
            }
        }

        public function GetAllPrivate_Gateway() {
            return $this->private_gateway_array;
        }

        public function Update_SGDB() {
            $private_gateway = $this->sgbd->get('private_gateway');
            if ($private_gateway != $this->private_gateway_array) {
                echo "Une mise à jour des disponible";
                $this->sgbd->truncate("private_gateway");
                sleep(1);
                foreach ($this->private_gateway_array as $key => $value) {
                    $this->sgbd->insert('private_gateway', $value);
                }
            } else {
                echo "Aucune mise à jour disponible";
            }
        }
    }