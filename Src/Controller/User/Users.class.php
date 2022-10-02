<?php 
    require_once(__DIR__  . "../../../../Src/Controller/SGBD/SGBD.class.php");

    class Users {
        private $system_db;

        public function __construct() {
            $this->system_db = new SGBD("localhost", "root", "", "projectv_system");
        }

        public function AccountExists($email) {
            $query = "SELECT * FROM users WHERE email = '$email'";
            $result = $this->system_db->get($query);
            if (count($result) > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function AccountExistsInCompany($email, $company_id) {
            $query_get_company = "SELECT * FROM companies WHERE id = " . $company_id;
            $result_get_company = $this->system_db->get($query_get_company);
            $company_name = $result_get_company[0]["name"];
            $company_dtb_name = $result_get_company[0]["name_dtb"];
            $company_db_users = new SGBD("localhost", "root", "", "projectv_users_" . $company_dtb_name);
            $query = "SELECT * FROM users WHERE email = '$email'";
            $result = $company_db_users->get($query);
            if (count($result) > 0) {
                return true;
            } else {
                return false;
            }
        }
    }