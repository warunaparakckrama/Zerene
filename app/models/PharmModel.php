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

        public function markAsIssued($pres_id){
            $this->db->query('UPDATE prescription SET is_issued = TRUE WHERE pres_id = :pres_id');
            $this->db->bind(':pres_id', $pres_id);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }
    
?>