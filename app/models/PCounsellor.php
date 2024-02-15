<?php
    class PCounsellor{
        private $db;

        public function __construct(){
            $this->db = new database;
        }

        public function createTimeslots($data){
            $this->db->query('INSERT INTO timeslot (slot_date, slot_start, slot_finish, slot_type, created_by) VALUES (:slot_date, :slot_start, :slot_finish, :slot_type, :created_by)');
            $this->db->bind(':slot_date', $data['slot_date']);
            $this->db->bind(':slot_start', $data['slot_start']);
            $this->db->bind(':slot_finish', $data['slot_finish']);
            if ($data['slot_type'] === "online") {
                $this->db->bind(':slot_type', 'online');
            }
            elseif ($data['slot_type'] === 'physical') {
                $this->db->bind(':slot_type', 'physical');
            }
            $this->db->bind(':created_by', $data['created_by']);

            $addtimeslot = $this->db->execute();

            if ($addtimeslot) {
                return true;
            }
            else {
                return false;
            }
        }

        public function getTimeslots($username){
            $this->db->query('SELECT * FROM timeslot WHERE is_deleted = FALSE AND created_by = :username');
            $this->db->bind(':username', $username);
            $results = $this->db->resultSet();
            return $results;
        }
    }
?>