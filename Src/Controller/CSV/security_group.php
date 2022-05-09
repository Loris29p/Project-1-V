<?php 
    Class Security_Group {
        private $file;
        private $csv_array;
        private $security_group_array;
        public function __construct() {
            $this->get_csv_array();
        }

        public function get_csv_array() {
            $this->csv_array = [];
            $this->security_group_array = [];
            $this->file = fopen(__DIR__ . "/csv_files/VESA_PROD_VPC - Security_Group.csv" , "r");
            while (!feof($this->file)) {
                $ar = fgetcsv($this->file);
                $this->csv_array[] = $ar;
            }
            fclose($this->file);
            return $this->csv_array;
        }
    }