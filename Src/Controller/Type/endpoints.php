<?php 
    require_once('Src/Controller/Read/Read.php');

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
                    $endoint_type = $value[4];
                    $state = $value[5];
                    $creation_time = $value[6];
                    $network_interfaces = $value[7];
                    $subnets = $value[8];
                    $route_tables = $value[9];
                    $this->endpoints_array[$key] = array( 'name' => $name, 'endpoint_id' => $endpoint_id, 'vpc_id' => $vpc_id, 'service_name' => $service_name, 'endoint_type' => $endoint_type, 'state' => $state, 'creation_time' => $creation_time, 'network_interfaces' => $network_interfaces, 'subnets' => $subnets, 'route_tables' => $route_tables);
                }
            }
        }

        public function GetAllEndpoints() {
            return $this->endpoints_array;
        }
    }