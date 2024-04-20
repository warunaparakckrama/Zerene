<?php
class psychiatrist
{
    private $db;

    public function __construct()
    {
        $this->db = new database;
    }

    public function makeTimeslots($data)
    {
        $this->db->query('INSERT INTO timeslot (slot_date, slot_time, slot_type, slot_status, created_by) VALUES (:slot_date, :slot_time, :slot_type, :slot_status, :created_by,)');
        $this->db->bind(':slot_date', $data['slot_date']);
        $this->db->bind(':slot_time', $data['slot_time']);
        if ($data['slot_type'] === "online") {
            $this->db->bind(':slot_type', 'online');
        } elseif ($data['slot_type'] === "physical") {
            $this->db->bind(':slot_type', 'physical');
        }
        $this->db->bind(':created_by', $data['created _by']);

        $addtimeslot = $this->db->execute();

        if ($addtimeslot) {
            return true;
        } else {
            return false;
        }
    }

    public function createPrescription($data, $medicine_data)
    {
        $this->db->query('INSERT INTO prescription (ug_name, age, gender, diagnosed_with, diagnosed_by, date, doc_user_id) VALUES (:ug_name, :age, :gender, :diagnosed_with, :diagnosed_by, :date, :doc_user_id)');
        $this->db->bind(':ug_name', $data['ug_name']);
        $this->db->bind(':age', $data['age']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':diagnosed_with', $data['diagnosed_with']);
        $this->db->bind(':diagnosed_by', $data['diagnosed_by']);
        $this->db->bind(':date', date('Y-m-d'));
        $this->db->bind(':doc_user_id', $data['doc_user_id']);

        $prescription = $this->db->execute();

        if ($prescription) {
            $prescription_id = $this->db->lastInsertedId();

            foreach ($medicine_data as $medicine) {

                $this->db->query('INSERT INTO medicine (pres_id, drug_name, unit, unit_type, dosage, dosage_type) VALUES (:pres_id, :drug_name, :unit, :unit_type, :dosage, :dosage_type)');
                $this->db->bind(':pres_id', $prescription_id);
                $this->db->bind(':drug_name', $medicine['drug']);
                $this->db->bind(':unit', $medicine['unit']);
                $this->db->bind(':unit_type', $medicine['unit_type']);
                $this->db->bind(':dosage', $medicine['dosage']);
                $this->db->bind(':dosage_type', $medicine['dosage_type']);  
                $medicine_insert = $this->db->execute();

                // Check if the medicine insertion was successful
                if (!$medicine_insert) {
                    echo 'medicine insert failed'; // Return false if any medicine insertion fails
                }
            }
            return true; // Return true if all medicine insertions were successful
        }
        return false; // Return false if prescription insertion fails
    }


    public function getPrescription($username)
    {
        $this->db->query('SELECT * FROM prescription WHERE is_deleted = FALSE AND created_by = :username');
        $this->db->bind(':username', $username);
        $results = $this->db->resultset();
        return $results;
    }

    public function getDirectedUndergrads($id){
        $this->db->query('SELECT * FROM ug_direct WHERE to_user_id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->resultset();
        return $results;
    }
}
