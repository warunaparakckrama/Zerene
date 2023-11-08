<?php
    class Administrator{
        private $db;

        public function __construct(){
            $this->db = new database;
        }

        public function getCounselors(){
            $this->db->query('SELECT * FROM counsellor');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getDoctors(){
            $this->db->query('SELECT * FROM doctor');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getUndergrads(){
            $this->db->query('SELECT * FROM undergraduate');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getAdmins(){
            $this->db->query('SELECT * FROM admin');
            $results = $this->db->resultSet();
            return $results;
        }

    }

        