<?php 
    require_once('Src/Controller/Read.php');

    class Route_Tables {
        private $route_array;
        private $read;

        public function __construct()
        {
            $this->read = new Read();
            $this->BuildArray();
        }

        public function BuildArray() {
            $route_array = $this->read->ReadRouteTables();
            foreach ($route_array as $key => $value) {
                if ($key != 0 AND $key != count($route_array)) {
                    $value = $value;
                    $name = $value[0];
                    $id = $value[1];
                    $destination = $value[2];
                    $target = $value[3];
                    $status = $value[4];
                    $propagated = $value[5];
                    $private_gateway = $value[6];
                    $this->route_array[] = ["name" => $name, "id" => $id, "destination" => $destination, "target" => $target, "status" => $status, "propagated" => $propagated, "private_gateway" => $private_gateway];
                }
            }
        }

        public function GetAllRouteTables() {
            return $this->route_array;
        }
    }