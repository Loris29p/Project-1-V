<?php 
    require_once(__DIR__  . "../../../../Src/Controller/SGBD/SGBD.class.php");

    class Company {
        private $id;
        private $name;
        private $auto;
        private $name_dtb;
        private $image;
        private $users;
        private $acl_users;
        private $acl_permissions;
        private $orga_accounts;

        public function __construct(string $name, int $id) {
            if ($name != null && $name != "") {
                $this->name = $name;
            }
            if ($id != null && $id != 0) {
                $this->id = $id;
            }

            $this->initCompany();
        }

        public function createCompany(string $name, int $auto, string $name_dtb, string $image) {
            $this->name = $name;
            $this->auto = $auto;
            $this->name_dtb = $name_dtb;
            $this->image = $image;
        }

        public function initCompany() {
            $sgbd_system = new SGBD("localhost", "root", "", "projectv_system");

            $query = "SELECT * FROM companies WHERE id = " . $this->id . " OR name = '" . $this->name . "'";
            if ($this->name != null && $this->name != "") {
                $query = "SELECT * FROM companies WHERE name = '" . $this->name . "'";
            } else if ($this->id != null && $this->id != 0) {
                $query = "SELECT * FROM companies WHERE id = " . $this->id;
            }
            $result = $sgbd_system->getWithParameters($query);
            if ($result != false) {
                $this->id = $result[0]["id"];
                $this->name = $result[0]["name"];
                $this->auto = $result[0]["auto"];
                $this->name_dtb = $result[0]["name_dtb"];
                $this->image = $result[0]["image"];

                $database_users = "projectv_users_" . $this->name_dtb;
                $sgbd_users = new SGBD("localhost", "root", "", $database_users);
                $database_orga = "projectv_orga_" . $this->name_dtb;
                $sgbd_orga = new SGBD("localhost", "root", "", $database_orga);
                $database_acl = "projectv_acl_" . $this->name_dtb;
                $sgbd_acl = new SGBD("localhost", "root", "", $database_acl);

                $query = "SELECT * FROM users";
                $result = $sgbd_users->getWithParameters($query);
                if ($result != false) {
                    $this->users = $result;
                }
    
                $query = "SELECT * FROM users";
                $result = $sgbd_acl->getWithParameters($query);
                if ($result != false) {
                    $this->acl_users = $result;
                }
    
                $query = "SELECT * FROM permissions";
                $result = $sgbd_acl->getWithParameters($query);
                if ($result != false) {
                    $this->acl_permissions = $result;
                }
    
                $query = "SELECT * FROM accounts";
                $result = $sgbd_orga->getWithParameters($query);
                if ($result != false) {
                    $this->orga_accounts = $result;
                }
            }
        }
        
        public function createDtb(string $first_name, string $last_name, string $email) {
            $sgbd_system = new SGBD("localhost", "root", "", "projectv_system");
            $query_companies_system = "SELECT * FROM companies";
            $result = $sgbd_system->getWithParameters($query_companies_system);
            foreach ($result as $key => $value) {
                if ($value['name_dtb'] == $this->name_dtb) {
                    return "client_already_exists";
                }
            }

            $query_companies_system = "INSERT INTO companies (name, auto, name_dtb, image) VALUES ('" . $this->name . "', " . $this->auto . ", '" . $this->name_dtb . "', '" . $this->image . "')";
            $sgbd_system->insert($query_companies_system);
            
            // CREATE Databases
            $sgbd = new SGBD("localhost", "root", "", "");
            $database_users = "projectv_users_" . $this->name_dtb;
            $query_database_users = "CREATE DATABASE " . $database_users;
            $sgbd->insert($query_database_users);
            $database_orga = "projectv_orga_" . $this->name_dtb;
            $query_database_orga = "CREATE DATABASE " . $database_orga;
            $sgbd->insert($query_database_orga);
            $database_acl = "projectv_acl_" . $this->name_dtb;
            $query_database_acl = "CREATE DATABASE " . $database_acl;
            $sgbd->insert($query_database_acl);

            // CREATE TABLES
            $sgbd_users = new SGBD("localhost", "root", "", $database_users);
            $query_table_users = "CREATE TABLE users (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                first_name VARCHAR(30) NOT NULL,
                last_name VARCHAR(30) NOT NULL,
                email VARCHAR(50) NOT NULL,
                password VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                is_verified int(11) NOT NULL
            )";
            $sgbd_users->insert($query_table_users);

            $password = password_hash("password", PASSWORD_DEFAULT);
            $query_table_users_2 = "INSERT INTO users (first_name, last_name, email, password, is_verified) VALUES ('" . $first_name . "', '" . $last_name . "', '" . $email . "', '" . $password . "', 1)";
            $sgbd_users->insert($query_table_users_2);
            $id_user = $sgbd_users->lastInsertId();

            $sgbd_orga = new SGBD("localhost", "root", "", $database_orga);
            $query_table_orga = "CREATE TABLE accounts (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(30) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
            $sgbd_orga->insert($query_table_orga);

            $sgbd_acl = new SGBD("localhost", "root", "", $database_acl);
            $query_table_acl = "CREATE TABLE users (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                id_user INT(11) NOT NULL,
                id_orga INT(11) NOT NULL,
                permission INT(11) NOT NULL
            )";
            $sgbd_acl->insert($query_table_acl);
            $query_table_acl_2 = "CREATE TABLE permissions (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(30) NOT NULL
            )";
            $sgbd_acl->insert($query_table_acl_2);

            $query_table_acl_3 = "INSERT INTO permissions (name) VALUES ('nothing')";
            $sgbd_acl->insert($query_table_acl_3);
            $query_table_acl_4 = "INSERT INTO permissions (name) VALUES ('write')";
            $sgbd_acl->insert($query_table_acl_4);
            $query_table_acl_5 = "INSERT INTO permissions (name) VALUES ('read')";
            $sgbd_acl->insert($query_table_acl_5);
            $query_table_acl_6 = "INSERT INTO permissions (name) VALUES ('write_read')";
            $sgbd_acl->insert($query_table_acl_6);
            $query_table_acl_7 = "INSERT INTO permissions (name) VALUES ('admin')";
            $sgbd_acl->insert($query_table_acl_7);

            $query_table_acl_8 = "INSERT INTO users (id_user, id_orga, permission) VALUES (" . $id_user . ", 1, 7)";
            $sgbd_acl->insert($query_table_acl_8);

            $query_acl_from_company = "SELECT * FROM users";
            $result = $sgbd_acl->getWithParameters($query_acl_from_company);
            $this->acl_users = $result;

            $query_acl_from_company = "SELECT * FROM permissions";
            $result = $sgbd_acl->getWithParameters($query_acl_from_company);
            $this->acl_permissions = $result;

            $query_orga_from_company = "SELECT * FROM accounts";
            $result = $sgbd_orga->getWithParameters($query_orga_from_company);
            $this->orga_accounts = $result;

            $query_users_from_company = "SELECT * FROM users";
            $result = $sgbd_users->getWithParameters($query_users_from_company);
            $this->users_users = $result;
            return true;
        }

        public function delete() {
            echo $this->id . " " . $this->name . " " . $this->auto . " " . $this->name_dtb . " " . $this->image . " ";
            $sgbd_system = new SGBD("localhost", "root", "", "projectv_system");
            $query_companies_system = "DELETE FROM companies WHERE id = " . $this->id;
            $sgbd_system->insert($query_companies_system);

            $sgbd = new SGBD("localhost", "root", "", "");
            $query_delete_database_users = "DROP DATABASE projectv_users_" . $this->name_dtb;
            $sgbd->insert($query_delete_database_users);

            $query_delete_database_orga = "DROP DATABASE projectv_orga_" . $this->name_dtb;
            $sgbd->insert($query_delete_database_orga);

            $query_delete_database_acl = "DROP DATABASE projectv_acl_" . $this->name_dtb;
            $sgbd->insert($query_delete_database_acl);
            return true;
        }

        public function update() {
            $sgbd_system = new SGBD("localhost", "root", "", "projectv_system");
            $query_companies_system = "UPDATE companies SET name = '" . $this->name . "', auto = " . $this->auto . ", name_dtb = '" . $this->name_dtb . "', image = '" . $this->image . "' WHERE id = " . $this->id;
            $sgbd_system->insert($query_companies_system);
        }

        public function getAclUsers() {
            return $this->acl_users;
        }
        public function getAclPermissions() {
            return $this->acl_permissions;
        }
        public function getOrgaAccounts() {
            return $this->orga_accounts;
        }
        public function getId() {
            return $this->id;
        }
        public function getName() {
            return $this->name;
        }
        public function getAuto() {
            return $this->auto;
        }
        public function getNameDtb() {
            return $this->name_dtb;
        }
        public function getImage() {
            return $this->image;
        }

        public function setId($id) {
            $this->id = $id;
        }
        public function setName($name, $update) {
            $this->name = $name;
            if ($update == true) {
                // verify if name is already used
                $sgbd_system = new SGBD("localhost", "root", "", "projectv_system");
                $query_companies_system = "SELECT * FROM companies WHERE name = '" . $this->name . "'";
                $result = $sgbd_system->getWithParameters($query_companies_system);
                if (count($result) > 0) {
                    return false;
                }
                $this->update();
            }
            return true;
        }
        public function setAuto($auto, $update) {
            $this->auto = $auto;
            if ($update == true) {
                $this->update();
            }
        }
        public function setNameDtb($name_dtb) {
            $this->name_dtb = $name_dtb;
        }
        public function setImage($image, $update) {
            $this->image = $image;
            if ($update == true) {
                $this->update();
            }
        }
    }