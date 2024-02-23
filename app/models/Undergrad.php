<?php
class Undergrad
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
        return is_array($results) ? $results : [];


        // return $results;
    }
}
