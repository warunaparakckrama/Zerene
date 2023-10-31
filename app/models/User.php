<?php
    class User{
        private $db;
        private $userModel;

        public function __construct(){
            $this->db = new Database;
        }

        // Regsiter user
        public function register($data){
            $this->db->query('INSERT INTO undergraduate (age, gender, stu_mail, university, faculty, study_year, username, password) VALUES(:age, :gender, :email, :university, :faculty, :year, :username, :password)');
            // Bind values
            $this->db->bind(':age', $data['age']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':stu_mail', $data['email']);
            $this->db->bind(':university', $data['university']);
            $this->db->bind(':faculty', $data['faculty']);
            $this->db->bind(':study_year', $data['year']);
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':password', $data['password']);
    
            // Execute
            $ugInserted = $this->db->execute();
            if($ugInserted){
                $ug_id = $this->db->lastInsertedId();
                // If user insertion is successful, proceed to insert email and password into a separate table
                $this->db->query('INSERT INTO users (username, password, email) VALUES (:username, :password, :email)');
                $this->db->bind(':username', $data['username']);
                $this->db->bind(':password', $data['password']);
                $this->db->bind(':email', $data['email']);

                $userInserted = $this->db->execute();

                if ($userInserted){
                    $user_id = $this->db->lastInsertedId();
                    // Step 3: Update the 'undergraduate' table with the 'user_id' from 'users' table
                    $this->db->query('UPDATE undergraduate SET user_id = :user_id WHERE ug_id = :ug_id');
                    $this->db->bind(':user_id', $user_id);
                    $this->db->bind(':ug_id', $ug_id);
                    $this->db->execute();
                    return true; // Both inserts successful
                } else {
                    return false;
                }

            
                } else {
                return false;
            }
        }

        // Find user by email
        public function findUserByEmail($email){
            $this->db->query('SELECT * FROM users WHERE email = :email');
            // Bind value
            $this->db->bind(':email', $email);
    
            $row = $this->db->single();
    
            // Check row
            if($this->db->rowCount() > 0){
            return true;
            } else {
            return false;
            }
        }
    }