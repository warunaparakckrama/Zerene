<?php
class Doctor {
    private $db;

    public function __construct(){
        $this->db = new database;
    }

    public function addugDetails(){
        $this->db->query('SELECT * FROM prescription');
        $results = $this->db->resultSet();
        return $results;
    }
    }
