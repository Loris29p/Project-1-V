<?php
    require_once('Src/Controller/Read/Read.php');
    require_once('Src/Controller/SGBD/sgbd.php');

    class Transit_Gateway_Attachments {
        private $transit_gateway_attachments_array;
        private $read;
        private $sgbd;

        public function __construct(SGBD $sgbd)
        {
            $this->read = new Read();
            $this->BuildArray();
            $this->sgbd = $sgbd;
        }

        public function BuildArray() {
            $transit_gateway_attachments_array = $this->read->ReadTransitGatewayAttachments();
            foreach ($transit_gateway_attachments_array as $key => $value) {
                if ($key != 0 AND $key != count($transit_gateway_attachments_array)) {
                    $value = $value;
                    $name = $value[0];
                    $transit_gateway_attachment_ID = $value[1];
                    $transit_gateway_ID = $value[2];
                    $resource_type = $value[3];
                    $resource_ID = $value[4];
                    $state = $value[5];
                    $association_route_table_ID = $value[6];
                    $association_state = $value[7];
                    $this->transit_gateway_attachments_array[] = ["name" => $name, "transit_gateway_attachment_ID" => $transit_gateway_attachment_ID, "transit_gateway_ID" => $transit_gateway_ID, "resource_type" => $resource_type, "resource_ID" => $resource_ID, "state" => $state, "association_route_table_ID" => $association_route_table_ID, "association_state" => $association_state];   
                }
            }
        }

        public function GetAllTransit_Gateway_Attachments() {
            return $this->transit_gateway_attachments_array;
        }

        public function Update_SGDB() {
            $transit_gateway_attachments = $this->sgbd->get('transit_gateway_attachments');
            if ($transit_gateway_attachments != $this->transit_gateway_attachments_array) {
                echo "Une mise à jour des disponible";
                $this->sgbd->truncate("transit_gateway_attachments");
                sleep(1);
                foreach ($this->transit_gateway_attachments_array as $key => $value) {
                    $this->sgbd->InsertWithParameters('transit_gateway_attachments', $value);
                }
            } else {
                echo "Aucune mise à jour disponible";
            }
        }
    }