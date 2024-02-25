<?php
class PCounsellor
{
    private $db;

    public function __construct()
    {
        $this->db = new database;
    }

    public function createTimeslots($data)
    {
        $this->db->query('INSERT INTO timeslot (slot_date, slot_start, slot_finish, slot_type, created_by) VALUES (:slot_date, :slot_start, :slot_finish, :slot_type, :created_by)');
        $this->db->bind(':slot_date', $data['slot_date']);
        $this->db->bind(':slot_start', $data['slot_start']);
        $this->db->bind(':slot_finish', $data['slot_finish']);
        if ($data['slot_type'] === "online") {
            $this->db->bind(':slot_type', 'online');
        } elseif ($data['slot_type'] === 'physical') {
            $this->db->bind(':slot_type', 'physical');
        }
        $this->db->bind(':created_by', $data['created_by']);

        $addtimeslot = $this->db->execute();

        if ($addtimeslot) {
            return true;
        } else {
            return false;
        }
    }

    public function getTimeslots($username)
    {
        $this->db->query('SELECT * FROM timeslot WHERE is_deleted = FALSE AND created_by = :username');
        $this->db->bind(':username', $username);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getTimeslotById($timeslotId)
{
    $this->db->query('SELECT * FROM timeslot WHERE slot_id = :timeslotId');
    $this->db->bind(':timeslotId', $timeslotId);

    return $this->db->single(); // Ensure your database interaction methods are functioning correctly
}




    public function deleteTimeslot($timeslotId)
    {
        error_log('Deleting timeslot: ' . $timeslotId);

        $this->db->query('DELETE FROM timeslot WHERE slot_id = :timeslotId');
        $this->db->bind(':timeslotId', $timeslotId);

        $result = $this->db->execute();

        if ($result) {
            error_log('Timeslot deleted successfully.');
        } else {
            error_log('Error deleting timeslot.');
        }

        return $result;
    }


    public function updateTimeslot($timeslot)
    {
        $this->db->query('UPDATE timeslot SET slot_date = :slot_date, slot_start = :slot_start, slot_finish = :slot_finish, slot_type = :slot_type WHERE slot_id = :slot_id');

        $this->db->bind(':slot_id', $timeslot->slot_id);
        $this->db->bind(':slot_date', $timeslot->slot_date);
        $this->db->bind(':slot_start', $timeslot->slot_start);
        $this->db->bind(':slot_finish', $timeslot->slot_finish);
        $this->db->bind(':slot_type', $timeslot->slot_type);

        return $this->db->execute();
    }
}
