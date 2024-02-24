<?php

class Timeslot
{
    private $db;

    public function __construct()
    {
        $this->db = new Database; 
    }

    // Get timeslot by ID
    public function getTimeslotById($timeslotId)
    {
        $this->db->query('SELECT * FROM timeslots WHERE slot_id = :id');
        $this->db->bind(':id', $timeslotId);
        $row = $this->db->single();

        return $row;
    }

    // Check if a timeslot is reserved by a user
    public function isTimeslotReserved($timeslotId, $userId)
    {
        $this->db->query('SELECT * FROM reservations WHERE slot_id = :timeslot_id AND user_id = :user_id');
        $this->db->bind(':timeslot_id', $timeslotId);
        $this->db->bind(':user_id', $userId);
        $row = $this->db->single();

        return !empty($row);
    }

    // Reserve a timeslot for a user
    public function reserveTimeslot($timeslotId, $userId)
    {
        $this->db->query('INSERT INTO reservations (slot_id, user_id) VALUES (:timeslot_id, :user_id)');
        $this->db->bind(':timeslot_id', $timeslotId);
        $this->db->bind(':user_id', $userId);

        return $this->db->execute();
    }

    // Cancel reservation for a timeslot by a user
    public function cancelReservation($timeslotId, $userId)
    {
        $this->db->query('DELETE FROM reservations WHERE slot_id = :timeslot_id AND user_id = :user_id');
        $this->db->bind(':timeslot_id', $timeslotId);
        $this->db->bind(':user_id', $userId);

        return $this->db->execute();
    }

}

?>
