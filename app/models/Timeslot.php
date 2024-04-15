<?php

class Timeslot
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getTimeslotById($timeslotId)
    {
        $this->db->query('SELECT * FROM timeslots WHERE slot_id = :id');
        $this->db->bind(':id', $timeslotId);
        return $this->db->single();
    }

    public function isTimeslotReserved($timeslotId, $userId)
    {
        $this->db->query('SELECT * FROM reservations WHERE slot_id = :timeslot_id AND user_id = :user_id');
        $this->db->bind(':timeslot_id', $timeslotId);
        $this->db->bind(':user_id', $userId);
        $row = $this->db->single();
        return !empty($row);
    }

    public function reserveTimeslot($timeslotId, $userId)
    {
        $this->db->query('INSERT INTO reservations (slot_id, user_id) VALUES (:timeslot_id, :user_id)');
        $this->db->bind(':timeslot_id', $timeslotId);
        $this->db->bind(':user_id', $userId);
        return $this->db->execute();
    }

    public function cancelReservation($timeslotId, $userId)
    {
        $this->db->query('DELETE FROM reservations WHERE slot_id = :timeslot_id AND user_id = :user_id');
        $this->db->bind(':timeslot_id', $timeslotId);
        $this->db->bind(':user_id', $userId);
        return $this->db->execute();
    }
}
