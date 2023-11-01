<?php
    class User{
        private $db;
        // private $userModel;

        public function __construct(){
            $this->db = new Database;
        }

        // Regsiter user
        public function register($data){
            $this->db->query('INSERT INTO undergraduate (age, gender, stu_mail, university, faculty, study_year, username, password) VALUES(:age, :gender, :email, :university, :faculty, :year, :username, :password)');
            // Bind values
            $this->db->bind(':age', $data['age']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':university', $data['university']);
            $this->db->bind(':faculty', $data['faculty']);
            $this->db->bind(':year', $data['year']);
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':password', $data['password']);
    
            // Execute
            $ugInserted = $this->db->execute();
            if($ugInserted){
                $ug_id = $this->db->lastInsertedId();
                // If user insertion is successful, proceed to insert email and password into a separate table
                $this->db->query('INSERT INTO users (username, password, email, user_type) VALUES (:username, :password, :email, :user_type)');
                $this->db->bind(':username', $data['username']);
                $this->db->bind(':password', $data['password']);
                $this->db->bind(':email', $data['email']);
                $this->db->bind(':user_type', 'undergraduate');

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

        public function reg_counselor($data){
            $this->db->query('INSERT INTO counsellor (coun_type, first_name, last_name, gender, dob, university, faculty, email, username, password) VALUES(:coun_type, :fname, :lname, :gender, :dob, :university, :faculty, :email, :username, :password)');
            // Bind values
            $this->db->bind(':coun_type', $data['coun_type']);
            $this->db->bind(':fname', $data['fname']);
            $this->db->bind(':lname', $data['lname']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':dob', $data['dob']);
            $this->db->bind(':university', $data['university']);
            $this->db->bind(':faculty', $data['faculty']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':password', $data['password']);

            // Execute
            $counselor = $this->db->execute();
            if($counselor){
                $coun_id = $this->db->lastInsertedId();
                // If user insertion is successful, proceed to insert email and password into a separate table
                $this->db->query('INSERT INTO users (username, password, email, user_type) VALUES (:username, :password, :email, :user_type)');
                $this->db->bind(':username', $data['username']);
                $this->db->bind(':password', $data['password']);
                $this->db->bind(':email', $data['email']);
                $this->db->bind(':user_type', 'counsellor');

                $userInserted = $this->db->execute();

                if ($userInserted){
                    $user_id = $this->db->lastInsertedId();
                    // Step 3: Update the 'undergraduate' table with the 'user_id' from 'users' table
                    $this->db->query('UPDATE counsellor SET user_id = :user_id WHERE coun_id = :coun_id');
                    $this->db->bind(':user_id', $user_id);
                    $this->db->bind(':coun_id', $coun_id);
                    $this->db->execute();
                    return true; // Both inserts successful
                } else {
                    return false;
                }

            
                } else {
                return false;
            }
        }

        public function reg_doctor($data){
            $this->db->query('INSERT INTO doctor (first_name, last_name, gender, uni_in_charge, hospital, email, contact_num, username, password) VALUES(:fname, :lname, :gender, :university, :hospital, :email, :contact_num, :username, :password)');
            // Bind values
            $this->db->bind(':fname', $data['fname']);
            $this->db->bind(':lname', $data['lname']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':university', $data['university']);
            $this->db->bind(':hospital', $data['hospital']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':contact_num', $data['contact_num']);
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':password', $data['password']);

            // Execute
            $doctor = $this->db->execute();
            if($doctor){
                $doc_id = $this->db->lastInsertedId();
                // If user insertion is successful, proceed to insert email and password into a separate table
                $this->db->query('INSERT INTO users (username, password, email, user_type) VALUES (:username, :password, :email, :user_type)');
                $this->db->bind(':username', $data['username']);
                $this->db->bind(':password', $data['password']);
                $this->db->bind(':email', $data['email']);
                $this->db->bind(':user_type', 'doctor');

                $userInserted = $this->db->execute();

                if ($userInserted){
                    $user_id = $this->db->lastInsertedId();
                    // Step 3: Update the 'undergraduate' table with the 'user_id' from 'users' table
                    $this->db->query('UPDATE doctor SET user_id = :user_id WHERE doc_id = :doc_id');
                    $this->db->bind(':user_id', $user_id);
                    $this->db->bind(':doc_id', $doc_id);
                    $this->db->execute();
                    return true; // Both inserts successful
                } else {
                    return false;
                }

            
                } else {
                return false;
            }
        }

        public function login($username,$password){
            $this->db->query('SELECT * FROM users WHERE username=:username');
            $this->db->bind(':username',$username);
    
            $row=$this->db->single();
    
            $user_password=$row->password;
            if(password_verify($password,$user_password)){
                return $row;
            }elseif($password === $user_password){
                return $row;
            }else{
                return false;
            }
        }

        // Find user by username
        public function findUserByUsername($username){
            $this->db->query('SELECT * FROM users WHERE username = :username');
            // Bind value
            $this->db->bind(':username', $username);
    
            $row = $this->db->single();
    
            // Check row
            if($this->db->rowCount() > 0){
            return true;
            } else {
            return false;
            }
        }

        //find by user email
        public function findUserByEmail($email){
            $this->db->query('SELECT * from users WHERE email=:email');
            $this->db->bind(':email',$email);

            $row=$this->db->single();

            //check row
            if($this->db->rowCount()>0){
                return true;
            }else{
                return false;
            }
        }
    }