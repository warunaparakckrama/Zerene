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
        // Prepare the placeholders for responses
        $responsePlaceholders = '';
        foreach ($data['responses'] as $question_id => $answer_value) {
            $responsePlaceholders .= ":q{$question_id}_response, ";
        }

        // Build the SQL query
        $query = 'INSERT INTO response (';
        $query .= implode(', ', array_keys($data['responses']));
        $query .= ', questionnaire_id, user_id, attempted_at) VALUES (';
        $query .= $responsePlaceholders . ':questionnaire_id, :user_id, DATE_FORMAT(NOW(), "%Y-%m-%d %H:%i:%s")';

        // Bind parameters
        $this->db->query($query);

        // Bind individual responses
        foreach ($data['responses'] as $question_id => $answer_value) {
            $this->db->bind(":q{$question_id}_response", $answer_value);
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

}
