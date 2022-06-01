<?php 
    require_once('Src/Controller/Read.php');

    class Private_Gateway {
        private $private_gateway_array;
        private $read;

        public function __construct()
        {
            $this->read = new Read();
            $this->BuildArray();
        }

        public function BuildArray() {
            $this->private_gateway_array = $this->read->ReadPrivateGateway();
        }

        public function GetAllPrivateGateway() {
            return $this->private_gateway_array;
        }
    }