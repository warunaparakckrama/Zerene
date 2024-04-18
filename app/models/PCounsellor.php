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
        $start = strtotime($data['slot_date'] . ' ' . $data['slot_start']);
        $end = strtotime($data['slot_date'] . ' ' . $data['slot_finish']);

        // Determine the interval based on slot_interval
        $interval = $data['slot_interval'] == 30 ? 1800 : 3600; // 30 minutes or 1 hour

        // Generate timeslots in intervals
        $timeslots = [];
        $current = $start;
        while ($current < $end) {
            $timeslots[] = [
                'slot_date' => $data['slot_date'],
                'slot_start' => date('H:i:s', $current),
                'slot_finish' => date('H:i:s', $current + $interval),
                'slot_type' => $data['slot_type'],
                'slot_interval' => $data['slot_interval'], // Store the interval in the timeslot data
                'created_by' => $data['created_by']
            ];
            $current += $interval; // Move to next interval
        }

        // Insert timeslots into the database
        foreach ($timeslots as $slot) {
            $this->db->query('INSERT INTO timeslot (slot_date, slot_start, slot_finish, slot_type, slot_interval, created_by) VALUES (:slot_date, :slot_start, :slot_finish, :slot_type, :slot_interval, :created_by)');
            $this->db->bind(':slot_date', $slot['slot_date']);
            $this->db->bind(':slot_start', $slot['slot_start']);
            $this->db->bind(':slot_finish', $slot['slot_finish']);
            $this->db->bind(':slot_type', $slot['slot_type']);
            $this->db->bind(':slot_interval', $slot['slot_interval']); // Bind slot_interval
            $this->db->bind(':created_by', $slot['created_by']);
            $this->db->execute();
        }

        return true;
    }




    public function getTimeslots($id)
    {
        $this->db->query('SELECT * FROM timeslot WHERE is_deleted = FALSE AND created_by = :id');
        $this->db->bind(':id', $id);
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

    public function getMsgRequestfromCounId($id)
    {
        $this->db->query('SELECT * FROM msg_request WHERE to_user_id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function addUgDirects($data){
        $this->db->query('INSERT INTO ug_direct (ug_user_id, from_user_id, to_user_id, directed_at) VALUES (:ug_user_id, :from_user_id, :to_user_id, DATE_FORMAT(NOW(), "%Y-%m-%d %H:%i:%s"))');
        $this->db->bind(':ug_user_id', $data['ug_user_id']);
        $this->db->bind(':from_user_id', $data['coun_user_id']);
        $this->db->bind(':to_user_id', $data['doc_user_id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function checkUgDirects($id, $coun_user_id)
    {
        $this->db->query('SELECT * FROM ug_direct WHERE to_user_id = :id AND from_user_id = :coun_user_id');
        $this->db->bind(':id', $id);
        $this->db->bind(':coun_user_id', $coun_user_id);
        
        return (bool) $this->db->single();
    }
}
