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

        public function deleteUser($user_id){
            $this->db->query('DELETE FROM users where user_id = :user_id');
            //bind values
            $this->db->bind(':user_id', $user_id);

            //execute
            if ($this->db->execute()) {
                return true;
            } else{
                return false;
            }
        }
    }

        