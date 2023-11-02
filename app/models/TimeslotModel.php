<?php
    class TimeslotModel{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function createTimeslot($data){
            $this->db->query('INSERT INTO timeslot (slot_date, slot_time, slot_type) VALUES (:date, :time, :place)');
            // Bind values
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':time', $data['time']);
            $this->db->bind(':place', $data['place']);
    
            if($this->db->execute()){
                
                return true;
            } else{
                return false;
            }
        }

        public function deleteTimeslot($data){

           $this->db->query('DELETE FROM timeslot WHERE slot_id = :slot_id');
           $this->db->bind(':slot_id', $data['slot_id']);

           // Execute
           if($this->db->execute()){
               return true;
           } else {
               return false;
           }
       }

        public function viewTimeSlot(){
            $this->db->query('SELECT * FROM timeslot');
    
            $row = $this->db->resultSet();
            // die(print_r($row));
            return $row;
        }

        public function updateTimeslot($data){
            $this->db->query('UPDATE timeslot SET date = :date, time = :time, place = :place WHERE slot_id = :slot_id ');
    
            // Bind values
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':time', $data['time']);
            $this->db->bind(':place', $data['place']);

            // Execute
            if ($this->db->execute()){
                return true;
            }
            else {
                return false;
            }
        }
    }