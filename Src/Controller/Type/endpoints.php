<?php 
    require_once('Src/Controller/Read.php');

    class Endpoints {
        private $endpoints_array;
        private $read;

        public function __construct()
        {
            $this->read = new Read();
            $this->BuildArray();
        }

        public function BuildArray() {
            $endpoints_array = $this->read->ReadEndpoints();
            foreach ($endpoints_array as $key => $value) {
                if ($key != 0 AND $key != count($endpoints_array)) {
                    $value = $value;
                    $name = $value[0];
                    $endpoint_id = $value[1];
                    $vpc_id = $value[2];
                    $service_name = $value[3];
                    $state = $value[4];
                    $this->endpoints_array[] = ["name" => $name, "endpoint_id" => $endpoint_id, "vpc_id" => $vpc_id, "service_name" => $service_name, "state" => $state];
                }
            }
        }

        public function GetAllEndpoints() {
            return $this->endpoints_array;
        }
    }