<?php 
    require_once(__DIR__  . "../../../../Src/Controller/SGBD/SGBD.class.php");

    class Companies {
        // get All Companies
        public function getAll() {
            $sgbd_system = new SGBD("localhost", "root", "", "projectv_system");
            $query_companies_system = "SELECT * FROM companies";
            $result = $sgbd_system->getWithParameters($query_companies_system);
            return $result;
        }

        // get Company by id
        public function getById(int $id) {
            $sgbd_system = new SGBD("localhost", "root", "", "projectv_system");
            $query_companies_system = "SELECT * FROM companies WHERE id = " . $id;
            $result = $sgbd_system->getWithParameters($query_companies_system);
            return $result;
        }

        // get Company
    }