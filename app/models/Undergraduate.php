<?php
class Undergraduate
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getTimeslotsForUndergrad()
    {
        $this->db->query('SELECT * FROM timeslot WHERE is_deleted = FALSE');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getQuestionnaireDetails()
    {
        $this->db->query('SELECT * FROM questionnaires');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getQuestionnairesfromId($questionnaire_id)
    {
        $this->db->query('SELECT * FROM questionnaires WHERE questionnaire_id = :questionnaire_id');
        $this->db->bind(':questionnaire_id', $questionnaire_id);
        $row = $this->db->single();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return null;
        }
    }

    public function getQuestionsfromQuestionnaireId($questionnaire_id)
    {
        $this->db->query('SELECT * FROM question WHERE questionnaire_id = :questionnaire_id');
        $this->db->bind(':questionnaire_id', $questionnaire_id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getAnswersfromQuestionnaireId($questionnaire_id)
    {
        $this->db->query('SELECT * FROM answer WHERE questionnaire_id = :questionnaire_id');
        $this->db->bind(':questionnaire_id', $questionnaire_id);
        $row = $this->db->single();
        
        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return null;
        }
    }

    public function storeResponses($data)
    {
        // Build the SQL query
        $query = 'INSERT INTO response (';
        for ($i = 1; $i <= 21; $i++) {
            $query .= "q{$i}_response, ";
        }
        $query .= 'questionnaire_id, user_id, attempted_at) VALUES (';
        for ($i = 1; $i <= 21; $i++) {
            $query .= ":q{$i}_response, ";
        }
        $query .= ':questionnaire_id, :user_id, DATE_FORMAT(NOW(), "%Y-%m-%d %H:%i:%s"))';

        // Bind parameters
        $this->db->query($query);

        // Bind individual responses
        for ($i = 1; $i <= 21; $i++) {
            $responseKey = "q{$i}_response";
            $this->db->bind(":{$responseKey}", $data['responses'][$i]);
        }

        $this->db->bind(':questionnaire_id', $data['questionnaire_id']);
        $this->db->bind(':user_id', $data['user_id']);

        // Execute the query
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    

    public function getResponsesbyId($id)
    {
        $this->db->query('SELECT * FROM response WHERE user_id = :user_id ORDER BY attempted_at DESC');
        $this->db->bind(':user_id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function sendMsgRequest($ug_id, $id){
        $this->db->query('INSERT INTO msg_request (from_user_id, to_user_id, sent_at) VALUES (:ug_id, :id, DATE_FORMAT(NOW(), "%Y-%m-%d %H:%i:%s"))');

        $this->db->bind(':ug_id', $ug_id);
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getMsgRequest(){
        $this->db->query('SELECT * FROM msg_request WHERE is_deleted = FALSE');
        $results = $this->db->resultSet();
        return $results;
    }

    public function addRequestLetter($data){
        $this->db->query('INSERT INTO request_letter (from_ug_id, to_coun_id, subject, content, document_path, sent_at) VALUES (:from, :to, :subject, :content, :document_path, DATE_FORMAT(NOW(), "%Y-%m-%d %H:%i:%s"))');
        $this->db->bind(':from', $data['from']);
        $this->db->bind(':to', $data['coun_id']);
        $this->db->bind(':subject', $data['subject']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':document_path', $data['document_path']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
