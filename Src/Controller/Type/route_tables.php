<?php 
    require_once('Src/Controller/Read/Read.php');
    require_once('Src/Controller/SGBD/sgbd.php');

    class Route_Tables {
        private $route_array;
        private $read;
        private $sgbd;

        public function __construct(SGBD $sgbd)
        {
            $this->read = new Read();
            $this->BuildArray();
            $this->sgbd = $sgbd;
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

        public function GetAllRoute_Tables() {
            return $this->route_array;
        }

        public function Update_SGDB() {
            $route_tables = $this->sgbd->get('route_tables');
            if ($route_tables != $this->route_array) {
                echo "Une mise à jour des disponible";
                $this->sgbd->truncate("route_tables");
                sleep(1);
                foreach ($this->route_array as $key => $value) {
                    $this->sgbd->InsertWithParameters('route_tables', $value);
                }
            } else {
                echo "Aucune mise à jour disponible";
            }
        }
    }