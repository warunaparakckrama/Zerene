<?php
class psychiatrist {
    private $db;

    public function __construct(){
        $this->db = new database;
    }

    public function makeTimeslots($data){
        $this->db->query('INSERT INTO timeslot (slot_date, slot_time, slot_type, slot_status, created_by) VALUES (:slot_date, :slot_time, :slot_type, :slot_status, :created_by,)');
        $this->db->bind(':slot_date', $data['slot_date']);
        $this->db->bind(':slot_time', $data['slot_time']);
        if ($data['slot_type'] === "online") {
            $this->db->bind(':slot_type', 'online');
        }
        elseif ($data['slot_type'] === "physical") {
            $this->db->bind(':slot_type', 'physical');
        }
        $this->db->bind(':created_by', $data['created _by']);

        $addtimeslot = $this->db->execute();

            if ($addtimeslot) {
                return true;
            }
            else {
                return false;
            }


    }

    public function createPrescription($data){
        $this->db->query('INSERT INTO prescription (pres_id, pres_date, ug_name, age, gender, diagnosis_with, drug, unit, dosage, created_by) VALUES (:pres_id, :pres_date, :ug_name, :age, :gender, :diagnosis_with, :drug, :unit, :dosage, :created_by)');
        $this->db->bind(':pres_id', $data['pres_id']);
        $this->db->bind(':pres_date', $data['pres_date']);
        $this->db->bind(':ug_name', $data['ug_name']);
        $this->db->bind(':age', $data['age']);
        $this->db->bind(':gender', $data['gender']);
        if ($data['gender'] === "male") {
            $this->db->bind(':gender', 'male');
        }
        elseif ($data['gender'] === "female") {
            $this->db->bind(':gender', 'female');
        }
        $this->db->bind(':diagnosis_with', $data['diagnosis_with']);
        $this->db->bind(':drug', $data['drug']);
        $this->db->bind(':unit', $data['unit']);
        $this->db->bind(':dosage', $data['dosage']);
        $this->db->bind(':created_by', $data['created_by']);
        $addmedicine = $this->db->execute();

        if ($addmedicine) {
            return true;
        }
        else {
            return false;
        }
    }

    public function getPrescription($username){
        $this->db->query('SELECT * FROM prescription WHERE is_deleted = FALSE AND created_by = :username');
        $this->db->bind(':username', $username);
        $results = $this->db->resultSet();
        return $results;
    }
    }
 