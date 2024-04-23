<?php
    class Administrator{
        private $db;

        public function __construct(){
            $this->db = new database;
        }

        public function getProfessionals(){
            $this->db->query('SELECT * FROM users WHERE user_type = "acounsellor" OR "pcounsellor" OR "doctor" AND is_deleted = FALSE');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getCounselors(){
            // $this->db->query('SELECT * FROM counsellor');
            $this->db->query('SELECT * FROM counsellor WHERE is_deleted = FALSE');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getCounsellorById($id){
            $this->db->query('SELECT * FROM counsellor WHERE user_id = :user_id');
            $this->db->bind(':user_id', $id);
            $row = $this->db->single();
            
            if($this->db->rowCount()>0){
                return $row;
            }else{
                return null;
            }
        }

        public function getCounsellorByCounId($id){
            $this->db->query('SELECT * FROM counsellor WHERE coun_id = :coun_id');
            $this->db->bind(':coun_id', $id);
            $row = $this->db->single();
            
            if($this->db->rowCount()>0){
                return $row;
            }else{
                return null;
            }
        }

        public function getDoctors(){
            // $this->db->query('SELECT * FROM doctor');
            $this->db->query('SELECT * FROM doctor WHERE is_deleted = FALSE');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getDoctorById($id){
            $this->db->query('SELECT * FROM doctor WHERE user_id = :user_id');
            $this->db->bind(':user_id', $id);
            $row = $this->db->single();
            
            if($this->db->rowCount()>0){
                return $row;
            }else{
                return null;
            }
        }

        public function getDoctorByDocId($id){
            $this->db->query('SELECT * FROM doctor WHERE doc_id = :doc_id');
            $this->db->bind(':doc_id', $id);
            $row = $this->db->single();
            
            if($this->db->rowCount()>0){
                return $row;
            }else{
                return null;
            }
        }

        public function getUndergrads(){
            $this->db->query('SELECT * FROM undergraduate WHERE is_deleted = FALSE');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getUgById($id){
            $this->db->query('SELECT * FROM undergraduate WHERE user_id = :user_id');
            $this->db->bind(':user_id', $id);
            $row = $this->db->single();
            
            if($this->db->rowCount()>0){
                return $row;
            }else{
                return null;
            }
        }

        public function getAdmins(){
            $this->db->query('SELECT * FROM admin WHERE is_deleted = FALSE');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getAdminfromId($id){
            $this->db->query('SELECT * FROM admin WHERE user_id = :user_id AND is_deleted = FALSE');
            $this->db->bind(':user_id', $id);
            $row = $this->db->single();
            
            if($this->db->rowCount()>0){
                return $row;
            }else{
                return null;
            }
        }

        public function getNotifications(){
            $this->db->query('SELECT * FROM notifications WHERE is_deleted = FALSE');
            $results= $this->db->resultSet();
            return $results;
        }

        public function getNotificationsfromId($notification_id){
            $this->db->query('SELECT * FROM notifications WHERE notification_id = :notification_id');
            $this->db->bind(':notification_id', $notification_id);
            $row=$this->db->single();
    
            //check row
            if($this->db->rowCount()>0){
                return $row;
            }else{
                return null;
            }
        }

        public function addNotifications($data){
            $this->db->query('INSERT INTO notifications (author, subject, user_type, content, created_at) VALUES (:author, :subject, :user_type, :content, DATE_FORMAT(NOW(), "%Y-%m-%d %H:%i:%s"))');
            $this->db->bind(':author', $data['author']);
            $this->db->bind(':subject', $data['subject']);
            if ($data['user_type'] === "all users") {
                $this->db->bind(':user_type', 'all users');
            }
            elseif ($data['user_type'] === 'admin') {
                $this->db->bind(':user_type', 'admin');
            }
            elseif ($data['user_type'] === "undergrad") {
                $this->db->bind(':user_type', 'undergrad');
            }
            elseif ($data['user_type'] === "academic") {
                $this->db->bind(':user_type', 'academic');
            }
            elseif ($data['user_type'] === "professional") {
                $this->db->bind(':user_type', 'professional');
            }
            elseif ($data['user_type'] === "doctor") {
                $this->db->bind(':user_type', 'doctor');
            }
            $this->db->bind(':content', $data['content']);

            $addnotify = $this->db->execute();

            if ($addnotify) {
                return true;
            }
            else {
                return false;
            }

        }

        public function updateNotifications($data){
            $this->db->query('UPDATE notifications SET subject = :subject, user_type = :user_type, content = :content WHERE notification_id = :notification_id');
            // Bind values
            $this->db->bind(':notification_id', $data['notification_id']);
            $this->db->bind(':subject', $data['subject']);
            if ($data['user_type'] === "all users") {
                $this->db->bind(':user_type', 'all users');
            }
            elseif ($data['user_type'] === 'admin') {
                $this->db->bind(':user_type', 'admin');
            }
            elseif ($data['user_type'] === "undergrad") {
                $this->db->bind(':user_type', 'undergrad');
            }
            elseif ($data['user_type'] === "academic") {
                $this->db->bind(':user_type', 'academic');
            }
            elseif ($data['user_type'] === "professional") {
                $this->db->bind(':user_type', 'professional');
            }
            elseif ($data['user_type'] === "doctor") {
                $this->db->bind(':user_type', 'doctor');
            }
            $this->db->bind(':content', $data['content']);
            $this->db->execute();

            // Execute
            if($this->db->execute())
            {
              return true;
            } else {
              return false;
            }
        }

        public function deleteNotify($notify_id){
            // Begin a transaction to ensure both deletes are successful or fail together
            $this->db->beginTransaction();

            $this->db->query('UPDATE notifications SET is_deleted = TRUE WHERE notification_id = :notification_id');
            $this->db->bind(':notification_id', $notify_id);
            $notifyDeleted = $this->db->execute();

            // Commit or rollback the transaction based on delete success
            if ($notifyDeleted) {
                $this->db->commit();
                return true;
            } else {
                $this->db->rollBack();
                return false;
            }
        }

        public function getFeedbackGeneral($feedback_id){
            $this->db->query('SELECT * FROM feedback WHERE feedback_id = :feedback_id');
            $this->db->bind(':feedback_id', $feedback_id);
            $row=$this->db->single();
    
            //check row
            if($this->db->rowCount()>0){
                return $row;
            }else{
                return null;
            }
        }

        public function getFeedback(){
            $this->db->query('SELECT * FROM feedback WHERE type = "feedback" AND is_deleted = FALSE');
            $results= $this->db->resultSet();
            return $results;
        }

        public function getComplaint(){
            $this->db->query('SELECT * FROM feedback WHERE type = "complaint" AND is_deleted = FALSE');
            $results= $this->db->resultSet();
            return $results;
        }

        public function deleteFeedback($feedback_id){
            // Begin a transaction to ensure both deletes are successful or fail together
            $this->db->beginTransaction();

            $this->db->query('UPDATE feedback SET is_deleted = TRUE WHERE feedback_id = :feedback_id');
            $this->db->bind(':feedback_id', $feedback_id);
            $feedbackDeleted = $this->db->execute();

            // Commit or rollback the transaction based on delete success
            if ($feedbackDeleted) {
                $this->db->commit();
                return true;
            } else {
                $this->db->rollBack();
                return false;
            }
        }

        public function solveFeedback($feedback_id){
            $this->db->beginTransaction();

            $this->db->query('UPDATE feedback SET status = "resolved" WHERE feedback_id = :feedback_id');
            $this->db->bind(':feedback_id', $feedback_id);
            $feedbackDeleted = $this->db->execute();

            // Commit or rollback the transaction based on delete success
            if ($feedbackDeleted) {
                $this->db->commit();
                return true;
            } else {
                $this->db->rollBack();
                return false;
            }
        }
    }   

        