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

    public function deleteTimeslot($timeslotId)
    {
        $this->db->query('DELETE FROM timeslot WHERE slot_id = :timeslotId');
        $this->db->bind(':timeslotId', $timeslotId);

        return $this->db->execute();
    }

    public function getTimeslotById($slot_id)
    {
        $this->db->query('SELECT * FROM timeslot WHERE slot_id = :slot_id');
        $this->db->bind(':slot_id', $slot_id);
        return $this->db->single();
    }

    public function updateTimeslot($data)
    {
        $this->db->query('UPDATE timeslot SET slot_date = :slot_date, slot_start = :slot_start, slot_finish = :slot_finish, slot_type = :slot_type, slot_status = :slot_status WHERE slot_id = :slot_id');

        $this->db->bind(':slot_id', $data['edit_slot_id']);
        $this->db->bind(':slot_date', $data['slot_date']);
        $this->db->bind(':slot_start', $data['slot_start']);
        $this->db->bind(':slot_finish', $data['slot_finish']);
        $this->db->bind(':slot_type', $data['slot_type']);
        $this->db->bind(':slot_status', $data['slot_status']);

        return $this->db->execute();
    }
}
