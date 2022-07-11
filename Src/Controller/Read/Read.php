<?php 
    require_once("Src/Controller/Read/ReadCSV.php");

    class Read {
        private $csv;
        
        public function __construct()
        {
            $this->csv = new ReadCSV();
        }
        
        public function ReadVPC() {
            return $this->csv->GetAllCSV("VPC");
        }

        public function ReadRouteTables() {
            return $this->csv->GetAllCSV("Route_Tables");
        }

        public function ReadNetwork() {
            return $this->csv->GetAllCSV("Network");
        }

        public function ReadVPCNetwork() {
            return $this->csv->GetAllCSV("VPC_Network");
        }

        public function ReadPrivateGateway() {
            return $this->csv->GetAllCSV("Private_Gateway");
        }

        public function ReadPeeringConnections() {
            return $this->csv->GetAllCSV("Peering_Connections");
        }

        public function ReadTransitGateway() {
            return $this->csv->GetAllCSV("Transit_Gateway");
        }

        public function ReadNatGateway() {
            return $this->csv->GetAllCSV("Nat_Gateway");
        }

        public function ReadInternetGateway() {
            return $this->csv->GetAllCSV("Internet_Gateway");
        }

        public function ReadEndpoints() {
            return $this->csv->GetAllCSV("Endpoints");
        }

        public function ReadTransitGatewayAttachments() {
            return $this->csv->GetAllCSV("Transit_Gateway_Attachments");
        }

    }