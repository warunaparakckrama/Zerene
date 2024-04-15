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

   public function createPrescription($data) {
    $this->db->query('INSERT INTO prescription (pres_date, ug_name, age, gender, diagnosis_with, created_by) VALUES (:pres_date, :ug_name, :age, :gender, :diagnosis_with, :created_by)');

    $this->db->bind(':pres_date', $data['pres_date']);
    $this->db->bind(':ug_name', $data['ug_name']);
    $this->db->bind(':age', $data['age']);
    $this->db->bind(':gender', $data['gender']);
    if ($data['gender'] === "male") {
        $this->db->bind(':gender', 'male');
    } elseif ($data['gender'] === "female") {
        $this->db->bind(':gender', 'female');
    }
    $this->db->bind(':diagnosis_with', $data['diagnosis_with']);
    $this->db->bind(':created_by', $data['created_by']);

    return $this->db->execute();
}

public function addMedicineToTable($data) {
    // Assuming all arrays have the same length
    $numRecords = count($data['drugs']);

    for ($i = 0; $i < $numRecords; $i++) {
        $this->db->query('INSERT INTO medicine (drug, unit, dosage) VALUES (:drug, :unit, :dosage)');
        $this->db->bind(':drug', $data['drug'][$i]);
        $this->db->bind(':unit', $data['unit'][$i]);
        $this->db->bind(':dosage', $data['dosage'][$i]);

        $result = $this->db->execute();
        if (!$result) {
            return false; // Failed to insert at least one record
        }
    }

    return true; // All records inserted successfully
}

    

    public function getPrescription($username){
        $this->db->query('SELECT * FROM prescription WHERE is_deleted = FALSE AND created_by = :username');
        $this->db->bind(':username', $username);
        $results = $this->db->resultSet();
        return $results;
    }


   
    
    }
 