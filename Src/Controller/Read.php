<?php 
    require_once("Src/Controller/Read/ReadCSV.php");

    class Read {
        private $csv;
        
        public function __construct()
        {
            $this->csv = new ReadCSV();
        }
        
        public function ReadVPC() {
            return $this->csv->GetAllCSV(__DIR__ . "/CSV/csv_files/VPC.csv");
        }

        public function ReadRouteTables() {
            return $this->csv->GetAllCSV(__DIR__ . "/CSV/csv_files/Route_Tables.csv");
        }

        public function ReadNetwork() {
            return $this->csv->GetAllCSV(__DIR__ . "/CSV/csv_files/Network.csv");
        }

        public function ReadVPCNetwork() {
            return $this->csv->GetAllCSV(__DIR__ . "/CSV/csv_files/VPC_Network.csv");
        }

        public function ReadPrivateGateway() {
            return $this->csv->GetAllCSV(__DIR__ . "/CSV/csv_files/Private_Gateway.csv");
        }

        public function ReadPeeringConnections() {
            return $this->csv->GetAllCSV(__DIR__ . "/CSV/csv_files/Peering_Connections.csv");
        }

        public function ReadTransitGateway() {
            return $this->csv->GetAllCSV(__DIR__ . "/CSV/csv_files/Transit_Gateway.csv");
        }

        public function ReadNatGateway() {
            return $this->csv->GetAllCSV(__DIR__ . "/CSV/csv_files/Nat_Gateway.csv");
        }

        public function ReadInternetGateway() {
            return $this->csv->GetAllCSV(__DIR__ . "/CSV/csv_files/Internet_Gateway.csv");
        }

        public function ReadEndpoints() {
            return $this->csv->GetAllCSV(__DIR__ . "/CSV/csv_files/Endpoints.csv");
        }

    }