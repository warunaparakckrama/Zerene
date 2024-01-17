<?php
    class Administrator{
        private $db;

        public function __construct(){
            $this->db = new database;
        }

        public function getCounselors(){
            // $this->db->query('SELECT * FROM counsellor');
            $this->db->query('SELECT * FROM counsellor WHERE is_deleted = FALSE');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getDoctors(){
            // $this->db->query('SELECT * FROM doctor');
            $this->db->query('SELECT * FROM doctor WHERE is_deleted = FALSE');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getUndergrads(){
            // $this->db->query('SELECT * FROM undergraduate');
            $this->db->query('SELECT * FROM undergraduate WHERE is_deleted = FALSE');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getAdmins(){
            $this->db->query('SELECT * FROM admin');
            $results = $this->db->resultSet();
            return $results;
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
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':email', $data['email']);

            // Execute
            if($this->db->execute()){
            //add a function to rlaod site
              return true;
            } else {
              return false;
            }
        }//yet to finish

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

        