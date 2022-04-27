<?php 
    require_once('Src/Model/functions.php');

    class User {
        private $lastname;
        private $name;
        private $db;

        public function __construct(PDO $db, $lastname, $name)
        {
            $this->setLastname($lastname);
            $this->setName($name);
            $this->setDb($db);
        }
        
        public function setDb(PDO $db)
        {
            $this->db = $db;
        }

        public function getLastname()
        {
            return $this->lastname;
        }

        public function getName()
        {
            return $this->name;
        }

        public function setLastname($lastname)
        {
            $this->lastname = $lastname;
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function createUser()
        {
            $req = $this->db->prepare("INSERT INTO users (lastname, name) VALUES (:lastname, :name)");
            $req->execute(array(
                'lastname' => $this->getLastname(),
                'name' => $this->getName()
            ));
        }

        public function loginUser()
        {
            $req = $this->db->prepare("SELECT * FROM users WHERE lastname = :lastname AND name = :name");
            $req->execute(array(
                'lastname' => $this->getLastname(),
                'name' => $this->getName()
            ));
            $user = $req->fetch();
            if ($user) {
                return $user;
            } else {
                return false;
            }
        }
    }