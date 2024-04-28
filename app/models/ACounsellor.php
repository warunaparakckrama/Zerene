<?php
class ACounsellor
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

    public function getTimeslots($id)
    {
        $this->db->query('SELECT * FROM timeslot WHERE is_deleted = FALSE AND created_by = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getTimeslotById($id)
    {
        $this->db->query('SELECT * FROM timeslot WHERE slot_id = :id');
        $this->db->bind(':id',$id);
        $result = $this->db->single();
        return $result;
    }

    public function deleteTimeslot($timeslotId)
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

    public function getRequestLetterforCounsellor($id)
    {
        $this->db->query('SELECT * FROM request_letter WHERE to_coun_user_id = :coun_id');
        $this->db->bind(':coun_id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function insertOpLetter($data)
    {
        $this->db->query('INSERT INTO opinion_letter (letter_subject, letter_body, coun_user_id, req_letter_id, date) VALUES (:letter_subject, :letter_body, :coun_user_id, :req_letter_id, DATE_FORMAT(NOW(), "%Y-%m-%d %H:%i:%s"))');
        $this->db->bind(':letter_subject', $data['subject']);
        $this->db->bind(':letter_body', $data['content']);
        $this->db->bind(':coun_user_id', $data['coun_user_id']);
        $this->db->bind(':req_letter_id', $data['req_letter_id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getCounsellorDetails($coun_id)
    {
        $this->db->query('SELECT * FROM counsellor WHERE coun_id = :coun_id');
        $this->db->bind(':coun_id', $coun_id);
        $results = $this->db->single();
        return $results;
    }

    public function getOpDetails($coun_id)
    {
        $this->db->query('SELECT * FROM opinion_letter WHERE coun_id = :coun_id');
        $this->db->bind(':coun_id', $coun_id);
        $results = $this->db->single();
        return $results;
    }

    public function getUndergradDetails()
    {
        $this->db->query('SELECT * FROM undergraduate');
        $results = $this->db->resultSet();

        return $results;
    }

    public function getProfCounsellers()
    {
        $this->db->query('SELECT * FROM counsellor WHERE coun_type = "professional"');
        $results = $this->db->resultSet();

        return $results;
    }

    public function getAcCounsellers()
    {
        $this->db->query('SELECT * FROM counsellor WHERE coun_type = "academic"');
        $results = $this->db->resultSet();

        return $results;
    }

    public function get_req_letter($letter_id)
    {
        $this->db->query('SELECT * FROM request_letter WHERE letter_id = :letter_id');
        $this->db->bind(':letter_id', $letter_id);
        $results = $this->db->single();
        return $results;
    }

    public function getOpLetter($id)
    {
        $this->db->query('SELECT * FROM opinion_letter WHERE coun_user_id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getOpLetterbyid($coun_id)
    {
        $this->db->query('SELECT * FROM opinion_letter WHERE letter_id = :ug_id');
        $this->db->bind(':ug_id', $coun_id);
        $results = $this->db->single();
        return $results;
    }

    public function getReqLetterbyletterid($letter_id)
    {
        $this->db->query('SELECT * FROM request_letter WHERE letter_id = :letter_id');
        $this->db->bind(':letter_id', $letter_id);
        $results = $this->db->single();
        return $results;
    }
    public function getUnreadRequestLetters()
    {
        $query = "SELECT * FROM request_letters WHERE status = 'unread'";
        $stmt = $this->db->single();
    }

    public function getCompletedRequestLetters($id)
    {
        $this->db->query('SELECT * FROM request_letter WHERE to_coun_user_id = :coun_id AND status = :stat');
        $this->db->bind(':coun_id', $id);
        $this->db->bind(':stat', 'completed');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getYetToCompleteRequestLetters($id)
    {
        $this->db->query('SELECT * FROM request_letter WHERE to_coun_user_id = :coun_id AND status != :status');
        $this->db->bind(':coun_id', $id);
        $this->db->bind(':status', 'completed');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getCombinedLetters()
    {
        $this->db->query('
        SELECT 
            ol.letter_id AS opinion_letter_id,
            ol.letter_subject,
            ol.letter_body,
            ol.coun_user_id,
            ol.req_letter_id,
            ol.date AS opinion_letter_date,
            rl.from_ug_user_id,
            rl.to_coun_user_id AS counselor_id,
            rl.subject AS request_subject,
            rl.content AS request_content,
            rl.document_path AS request_document_path,
            rl.sent_at AS request_sent_at,
            rl.status AS request_status
        FROM 
            opinion_letter ol
        JOIN 
            request_letter rl ON ol.req_letter_id = rl.letter_id
    ');

        return $this->db->resultSet();
    }
    public function updateRequestLetterStatus($requestLetterId, $status)
    {
        $this->db->query('UPDATE request_letter SET status = :status WHERE letter_id = :id');
        $this->db->bind(':status', $status);
        $this->db->bind(':id', $requestLetterId);
        $this->db->execute();
    }
// notification status for request letter
    public function countNewRequestLetters()
    {
        $this->db->query('SELECT COUNT(*) AS count FROM request_letter WHERE notification_status = 0 AND status = "pending"');
        $result = $this->db->single();
        return $result->count;
    }

    public function updateRequestLetterNotifyStatus($requestLetterId, $status)
    {
        $this->db->query('UPDATE request_letter SET notification_status = :status WHERE letter_id = :id');
        $this->db->bind(':status', $status);
        $this->db->bind(':id', $requestLetterId);
        $this->db->execute();
    }

    public function getReserveDetails($timeslotId)
    {
        $this->db->query('SELECT * FROM timeslot_reserve WHERE slot_id = :timeslotId AND is_cancelled=0');
        $this->db->bind(':timeslotId', $timeslotId);
        return $this->db->single();
    }

    public function updateSlotStatus($timeslotId)
    {
        $this->db->query('UPDATE timeslot SET slot_status = "free" WHERE slot_id = :timeslotId');
        $this->db->bind(':timeslotId', $timeslotId);
        return $this->db->execute();
    }

    public function updateReserveCancel($reserveID)
    {
        $this->db->query('UPDATE timeslot_reserve SET is_cancelled = 1 WHERE reserve_id = :reserveID');
        $this->db->bind(':reserveID', $reserveID);
        return $this->db->execute();
    }
}
