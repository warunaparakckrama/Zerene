<?php

    class PharmModel{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getPrescriptions(){
            $this->db->query('SELECT * FROM prescription WHERE is_deleted = FALSE');
            
            $results = $this->db->resultSet();
            return $results;
        }
    }
    
?>