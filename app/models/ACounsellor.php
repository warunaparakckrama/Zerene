<?php
    class ACounsellor{
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

        public function getOpRequest($coun_id) {
            $this->db->query('SELECT * FROM request_letter WHERE to_coun_id = :coun_id');
            $this->db->bind(':coun_id', $coun_id);
            $results = $this->db->resultSet();
            return $results;
        }

        public function insertOpLetterDetails($data){
            $this->db->query('INSERT INTO opinion_letter (letter_subject, letter_body, ug_id, coun_id) VALUES (:letter_subject, :letter_body, :ug_id, :coun_id)');
            $this->db->bind(':letter_subject', $data['subject']);
            $this->db->bind(':letter_body', $data['body']);
            $this->db->bind(':ug_id', $data['ug_id']);
            $this->db->bind(':coun_id', $_SESSION['user_id']);
    
            if ($this->db->execute()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function getCounsellorDetails($coun_id){
            $this->db->query('SELECT * FROM counsellor WHERE coun_id = :coun_id');
            $this->db->bind(':coun_id', $coun_id);
            $results = $this->db->single();
            return $results;
        }

        public function getOpDetails($coun_id){
            $this->db->query('SELECT * FROM opinion_letter WHERE coun_id = :coun_id');
            $this->db->bind(':coun_id', $coun_id);
            $results = $this->db->single();
            return $results;
        }

        public function getUndergradDetails(){
            $this->db->query('SELECT * FROM undergraduate');
            $results = $this->db->resultSet();

            return $results;
        }

        public function getProfCounsellers(){
            $this->db->query('SELECT * FROM counsellor WHERE coun_type = "professional"');
            $results = $this->db->resultSet();

            return $results;
        }

        public function getAcCounsellers(){
            $this->db->query('SELECT * FROM counsellor WHERE coun_type = "academic"');
            $results = $this->db->resultSet();

            return $results;
        }

        public function get_req_letter($letter_id){
            $this->db->query('SELECT * FROM request_letter JOIN undergraduate ON request_letter.from_ug_id = undergraduate.ug_id WHERE request_letter.letter_id = :letter_id');
            $this->db->bind(':letter_id', $letter_id);
            $results = $this->db->single();
            return $results;
        }
    }
?>