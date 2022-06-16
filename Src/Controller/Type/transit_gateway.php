<?php 
    require_once('Src/Controller/Read/Read.php');
    require_once('Src/Controller/SGBD/sgbd.php');

    class Transit_Gateway {
        private $transit_gateway_array;
        private $read;
        private $sgbd;

        public function __construct()
        {
            $this->read = new Read();
            $this->BuildArray();
            $this->sgbd = new SGBD();
        }

        public function BuildArray() {
            $transit_gateway_array = $this->read->ReadTransitGateway();
            foreach ($transit_gateway_array as $key => $value) {
                if ($key != 0 AND $key != count($transit_gateway_array)) {
                    $value = $value;
                    $name = $value[0];
                    $gateway = $value[1];
                    $owner = $value[2];
                    $state = $value[3];
                    $this->transit_gateway_array[] = ["name" => $name, "gateway" => $gateway, "owner" => $owner, "state" => $state];    
                }
            }
        }

        public function GetAllTransit_Gateway() {
            return $this->transit_gateway_array;
        }

        public function Update_SGDB() {
            $transit_gateway = $this->sgbd->get('transit_gateway');
            if ($transit_gateway != $this->transit_gateway_array) {
                echo "Une mise à jour des disponible";
                $this->sgbd->truncate("transit_gateway");
                sleep(1);
                foreach ($this->transit_gateway_array as $key => $value) {
                    $this->sgbd->insert('transit_gateway', $value);
                }
            } else {
                echo "Aucune mise à jour disponible";
            }
        }
    }