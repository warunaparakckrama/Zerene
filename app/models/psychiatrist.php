<?php
class psychiatrist
{
    private $db;

    public function __construct()
    {
        $this->db = new database;
    }

    public function createTimeslotsDoc($data)
    {
        $start = strtotime($data['slot_date'] . ' ' . $data['slot_start']);
        $end = strtotime($data['slot_date'] . ' ' . $data['slot_finish']);

        // Determine the interval based on slot_interval
        $interval = $data['slot_interval'] == 30 ? 1800 : 3600; // 30 minutes or 1 hour

        // Generate timeslots in intervals
        $timeslots = [];
        $current = $start;
        while ($current < $end) {
            $slot_end = min($current + $interval, $end); // End time of the slot, but not exceeding the end time entered by the user
            if ($slot_end - $current >= $interval) { // Check if the slot duration is equal to or greater than the interval
                $timeslots[] = [
                    'slot_date' => $data['slot_date'],
                    'slot_start' => date('H:i:s', $current),
                    'slot_finish' => date('H:i:s', $slot_end),
                    'slot_type' => $data['slot_type'],
                    'slot_interval' => $data['slot_interval'], 
                    'created_by' => $data['created_by']
                ];
            }
            $current += $interval; // Move to next interval
        }

        // Insert timeslots into the database
        foreach ($timeslots as $slot) {
            $this->db->query('INSERT INTO timeslot (slot_date, slot_start, slot_finish, slot_type, slot_interval, created_by) VALUES (:slot_date, :slot_start, :slot_finish, :slot_type, :slot_interval, :created_by)');
            $this->db->bind(':slot_date', $slot['slot_date']);
            $this->db->bind(':slot_start', $slot['slot_start']);
            $this->db->bind(':slot_finish', $slot['slot_finish']);
            $this->db->bind(':slot_type', $slot['slot_type']);
            $this->db->bind(':slot_interval', $slot['slot_interval']); 
            $this->db->bind(':created_by', $slot['created_by']);
            $this->db->execute();
        }

        return true;
    }

    public function getTimeslotsDoc($id)
    {
        $this->db->query('SELECT * FROM timeslot WHERE is_deleted = FALSE AND created_by = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getTimeslotByIdDoc($timeslotId)
    {
        $this->db->query('SELECT * FROM timeslot WHERE slot_id = :timeslotId');
        $this->db->bind(':timeslotId', $timeslotId);

        return $this->db->single(); // Ensure your database interaction methods are functioning correctly
    }

    public function deleteTimeslotDoc($timeslotId)
    {
        error_log('Deleting timeslot: ' . $timeslotId);

        $this->db->query('UPDATE timeslot SET is_deleted = 1 WHERE slot_id = :timeslotId');
        $this->db->bind(':timeslotId', $timeslotId);

        $result = $this->db->execute();

        if ($result) {
            error_log('Timeslot deleted successfully.');
        } else {
            error_log('Error deleting timeslot.');
        }

        return $result;
    }

    public function updateTimeslotDoc($timeslot)
    {
        $this->db->query('UPDATE timeslot SET slot_date = :slot_date, slot_start = :slot_start, slot_finish = :slot_finish, slot_type = :slot_type WHERE slot_id = :slot_id');

        $this->db->bind(':slot_id', $timeslot->slot_id);
        $this->db->bind(':slot_date', $timeslot->slot_date);
        $this->db->bind(':slot_start', $timeslot->slot_start);
        $this->db->bind(':slot_finish', $timeslot->slot_finish);
        $this->db->bind(':slot_type', $timeslot->slot_type);

        return $this->db->execute();
    }

    public function createPrescription($data)
    {
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

    public function addMedicineToTable($data)
    {
        $this->db->query('INSERT INTO medicine (drug, unit, dosage,) VALUES (:drug, :unit, :dosage)');


        $this->db->bind(':drug', $data['drug']);
        $this->db->bind(':unit', $data['unit']);
        $this->db->bind(':dosage', $data['dosage']);


        return $this->db->execute();
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
