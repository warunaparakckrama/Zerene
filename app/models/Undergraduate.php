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
}
