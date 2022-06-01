<?php 
    require_once('Src/Controller/Read.php');

    class VPC {
        private $vpc_array;
        private $read;

        public function __construct()
        {
            $this->read = new Read();
            $this->BuildArray();
        }

        public function BuildArray() {
            $this->vpc_array = $this->read->ReadVPC();
        }

        public function GetAllVPC() {
            return $this->vpc_array;
        }
    }