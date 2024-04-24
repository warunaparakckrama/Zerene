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

        public function getRequestLetterforCounsellor($id) {
            $this->db->query('SELECT * FROM request_letter WHERE to_coun_user_id = :coun_id');
            $this->db->bind(':coun_id', $id);
            $results = $this->db->resultSet();
            return $results;
        }

        public function insertOpLetter($data){
            $this->db->query('INSERT INTO opinion_letter (letter_subject, letter_body, coun_user_id, ug_user_id, date) VALUES (:letter_subject, :letter_body, :coun_user_id, :ug_user_id, DATE_FORMAT(NOW(), "%Y-%m-%d %H:%i:%s"))');
            $this->db->bind(':letter_subject', $data['subject']);
            $this->db->bind(':letter_body', $data['content']);
            $this->db->bind(':coun_user_id', $data['coun_user_id']);
            $this->db->bind(':ug_user_id', $data['ug_user_id']);
            
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
            $this->db->query('SELECT * FROM request_letter WHERE letter_id = :letter_id');
            $this->db->bind(':letter_id', $letter_id);
            $results = $this->db->single();
            return $results;
        }

        public function getOpLetter($id){
            $this->db->query('SELECT * FROM opinion_letter WHERE coun_user_id = :id');
            $this->db->bind(':id', $id);
            $results = $this->db->resultSet();
            return $results;
        }

        public function getOpLetterbyid($coun_id){
            $this->db->query('SELECT * FROM opinion_letter WHERE letter_id = :ug_id');
            $this->db->bind(':ug_id', $coun_id);
            $results = $this->db->single();
            return $results;
        }
    }
?>