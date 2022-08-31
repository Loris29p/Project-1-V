<?php 
    require_once("Src/Controller/SGBD/sgbd.php");

    class User {
        private $id;
        private $first_name;
        private $last_name;
        private $email;
        private $password;
        private $picture;
        private $role;
        private $sgbd;

        public function __construct() {
            $this->sgbd = new SGBD();
        }
        
        public function getAll() {
            $query = "SELECT * FROM users";
            $result = $this->sgbd->getWithParameters($query);
            return $result;
        }

        public function getById($id) {
            $query = "SELECT * FROM users WHERE id = $id";
            $result = $this->sgbd->getWithParameters($query);
            return $result;
        }

        public function getByEmail($email) {
            $query = "SELECT * FROM users WHERE email = '$email'";
            $result = $this->sgbd->getWithParameters($query);
            return $result;
        }

        public function Create($first_name, $last_name, $email, $password, $picture, $role) {
            $query = "INSERT INTO users (first_name, last_name, email, password, picture, role) VALUES ('$first_name', '$last_name', '$email', '$password', '$picture', '$role')";
            $result = $this->sgbd->insert($query);
            return $result;
        }

        public function Update($id, $first_name, $last_name, $email, $password, $picture, $role) {
            $query = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', email = '$email', password = '$password', picture = '$picture', role = '$role' WHERE id = $id";
            $result = $this->sgbd->insert($query);
            return $result;
        }

        public function Delete($id) {
            $query = "DELETE FROM users WHERE id = $id";
            $result = $this->sgbd->insert($query);
            return $result;
        }

        public function AccountExists($email) {
            $query = "SELECT * FROM users WHERE email = '$email'";
            $result = $this->sgbd->get($query);
            if (count($result) > 0) {
                return true;
            } else {
                return false;
            }
        }

        // Function permettant de verifier si le mot de passe est correct
        public function CheckPassword($email, $password) {
            $query = "SELECT * FROM users WHERE email = '$email'";
            $result = $this->sgbd->get($query);
            if (count($result) > 0) {
                if ($result[0]['password'] == $password) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        public function getId() {
            return $this->id;
        }
        public function getFirstName() {
            return $this->first_name;
        }
        public function getLastName() {
            return $this->last_name;
        }
        public function getFullName() {
            return $this->first_name . " " . $this->last_name;
        }
        public function getEmail() {
            return $this->email;
        }
        public function getPassword() {
            return $this->password;
        }
        public function getPicture() {
            return $this->picture;
        }
        public function getRole() {
            return $this->role;
        }

        public function setId($id) {
            $this->id = $id;
        }
        public function setFirstName($first_name) {
            $this->first_name = $first_name;
        }
        public function setLastName($last_name) {
            $this->last_name = $last_name;
        }  
        public function setEmail($email) {
            $this->email = $email;
        }
        public function setPassword($password) {
            $this->password = $password;
        }
        public function setPicture($picture) {
            $this->picture = $picture;
        }
        public function setRole($role) {
            $this->role = $role;
        }

        public function Register($first_name, $last_name, $email, $password, $picture, $role) {
            if (!$this->AccountExists($email)) {
                $this->Create($first_name, $last_name, $email, $password, $picture, $role);
                $this->Login($email, $password);
                return true;
            } else {
                return false;
            }
        }

        public function Login($email, $password) {
            if ($this->CheckPassword($email, $password)) {
                $result = $this->getByEmail($email);
                $this->setId($result[0]['id']);
                $this->setFirstName($result[0]['first_name']);
                $this->setLastName($result[0]['last_name']);
                $this->setEmail($result[0]['email']);
                $this->setPassword($result[0]['password']);
                $this->setPicture($result[0]['picture']);
                $this->setRole($result[0]['role']);

                $_SESSION['id'] = $this->getId();
                $_SESSION['first_name'] = $this->getFirstName();
                $_SESSION['last_name'] = $this->getLastName();
                $_SESSION['email'] = $this->getEmail();
                $_SESSION['password'] = $this->getPassword();
                $_SESSION['picture'] = $this->getPicture();
                $_SESSION['role'] = $this->getRole();
                return true;
            } else {
                return false;
            }
        }

        public function Logout() {
            session_destroy();
        }
    }