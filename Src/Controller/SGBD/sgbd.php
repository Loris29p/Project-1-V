<?php
    // class permettant la connection à MySQL et nottament ses fonctions.
    class SGBD {
        private $host;
        private $user;
        private $password;
        private $database;
        private $db;

        public function __construct() {
            $this->host = "localhost";
            $this->user = "root";
            $this->password = "";
            $this->database = "projectv";

            $this->db = new mysqli($this->host, $this->user, $this->password, $this->database);
            if ($this->db->connect_errno) {
                echo "Echec lors de la connexion à MySQL : (" . $this->db->connect_errno . ") " . $this->db->connect_error;
            }
            return $this->db;
        }

        public function close() {
            $this->db->close();
        }

        public function insert($query) {
            $result = $this->db->query($query);
            return $result;
        }

        public function get($query) {
            $result = $this->db->query($query);
            $array = array();
            while ($row = $result->fetch_assoc()) {
                $array[] = $row;
            }
            return $array;
        }

        // get function with paramameters like where, order by, limit, etc.
        public function getWithParameters($query) {
            $result = $this->db->query($query);
            $array = array();
            while ($row = $result->fetch_assoc()) {
                $array[] = $row;
            }
            return $array;
        }
 
        // Function permettant d'effectuer une insertion dans une table suivant les parametres
        public function InsertWithParameters($table, $parameters) {
            $query = "INSERT INTO $table (";
            foreach ($parameters as $key => $value) {
                $query .= $key . ", ";
            }
            $query = substr($query, 0, -2);
            $query .= ") VALUES (";
            foreach ($parameters as $key => $value) {
                $query .= "'" . $value . "', ";
            }
            $query = substr($query, 0, -2);
            $query .= ")";
            echo $query;
            $result = $this->db->query($query);
            return $result;
        }

        // Function permettant de vider une table
        public function truncate($table) {
            $query = "TRUNCATE TABLE $table";
            $result = $this->db->query($query);
            return $result;
        }
    }
