<?php 
    require_once('Src/Controller/Read/Read.php');

    class Private_Gateway {
        private $private_gateway_array;
        private $read;

        public function __construct()
        {
            $this->read = new Read();
            $this->BuildArray();
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
    }