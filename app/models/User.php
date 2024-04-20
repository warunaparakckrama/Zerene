<?php
    class User{
        private $db;
        // private $userModel;

        public function __construct(){
            $this->db = new Database;
        }

        public function register($data){
            $this->db->query('INSERT INTO undergraduate (age, gender, email, university, faculty, study_year, username, password) VALUES(:age, :gender, :email, :university, :faculty, :year, :username, :password)');
            // Bind values
            $this->db->bind(':age', $data['age']);
            if ($data['gender'] === "Male") {
                $this->db->bind(':gender', 'Male');
            }
            if ($data['gender'] === "Female") {
                $this->db->bind(':gender', 'Female');
            }
            if ($data['gender'] === "Not specified") {
                $this->db->bind(':gender', 'Not specified');
            }
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

        public function reg_admin($data){
            $this->db->query('INSERT INTO admin (username, email, password) VALUES(:username, :email, :password)');
            // Bind values
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);

            // Execute
            $admin = $this->db->execute();
            if($admin){
                $admin_id = $this->db->lastInsertedId();
                // If admin insertion is successful, proceed to insert email and password into 'users' table
                $this->db->query('INSERT INTO users (username, password, email, user_type) VALUES (:username, :password, :email, :user_type)');
                $this->db->bind(':username', $data['username']);
                $this->db->bind(':password', $data['password']);
                $this->db->bind(':email', $data['email']);
                $this->db->bind(':user_type', 'admin');

                $userInserted = $this->db->execute();

                if ($userInserted){
                    $user_id = $this->db->lastInsertedId();
                    // Step 3: Update the 'admin' table with the 'user_id' from 'users' table
                    $this->db->query('UPDATE admin SET user_id = :user_id WHERE admin_id = :admin_id');
                    $this->db->bind(':user_id', $user_id);
                    $this->db->bind(':admin_id', $admin_id);
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
                // $this->db->bind(':user_type', 'counsellor');
                if ($data['coun_type'] === "Academic") {
                    $this->db->bind(':user_type', 'acounsellor');
                } elseif ($data['coun_type'] === "Professional") {
                    $this->db->bind(':user_type', 'pcounsellor');
                }

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

            
            } 
            
            else {
                return false;
            }
        }

        public function login($username,$password){
            $this->db->query('SELECT * FROM users WHERE username=:username AND is_deleted = FALSE');
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

        public function findUserByUsername($username){
            $this->db->query('SELECT * FROM users WHERE username = :username AND is_deleted = FALSE');
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

        public function findUserDetails($user_id){
            $this->db->query('SELECT * from users where user_id=:id');
            $this->db->bind(':id',$user_id);
    
            $row=$this->db->single();
    
            //check row
            if($this->db->rowCount()>0){
                return $row;
            }else{
                return null;
            }
        }

        public function findUserTypebyUserid($user_id){
            $sql = "SELECT user_type FROM users WHERE user_id = :user_id";
            $this->db->query($sql);
            $this->db->bind(':user_id', $user_id);

            try {
                $this->db->execute();
                $result = $this->db->single();

                return $result->user_type;
            } catch (PDOException $e) {
                // Handle the error or return an indication of failure
                return false;
            }
        }

        public function getPasswordById($user_id) {
            $sql = "SELECT password FROM users WHERE user_id = :user_id";
            $this->db->query($sql);
            $this->db->bind(':user_id', $user_id);
            
            try {
                $this->db->execute();
                $result = $this->db->single();
    
                // Return the hashed password from the database
                return $result->password;
            } catch (PDOException $e) {
                // Handle the error or return an indication of failure
                return false;
            }
        }

        public function getUsernameById($user_id){
            $sql = "SELECT username FROM users WHERE user_id = :user_id";
            $this->db->query($sql);
            $this->db->bind(':user_id', $user_id);

            try {
                $this->db->execute();
                $result = $this->db->single();
                
    
                // Return the username from the database
                return $result->username;
            } catch (PDOException $e) {
                // Handle the error or return an indication of failure
                return false;
            }
        }

        public function getEmailById($user_id){
            $sql = "SELECT email FROM users WHERE user_id = :user_id";
            $this->db->query($sql);
            $this->db->bind(':user_id', $user_id);

            try {
                $this->db->execute();
                $result = $this->db->single();
    
                // Return the email from the database
                return $result->email;
            } catch (PDOException $e) {
                // Handle the error or return an indication of failure
                return false;
            }
        }

        public function getUsernames(){
            $this->db->query('SELECT username FROM users WHERE is_deleted = FALSE');
            $results = $this->db->resultSet();
            return $results;
        }

        public function updatePassword($user_id, $new_password) {
            $sql = "UPDATE users SET password = :new_password WHERE user_id = :user_id";
            $this->db->query($sql);
            $this->db->bind(':new_password', $new_password);
            $this->db->bind(':user_id', $user_id);
            
            $pwd_updated = $this->db->execute();
            if ($pwd_updated){
                
                // Update password in the 'undergraduate' table
                $sql_undergraduate = "UPDATE undergraduate SET password = :new_password WHERE user_id = :user_id";
                $this->db->query($sql_undergraduate);
                $this->db->bind(':new_password', $new_password);
                $this->db->bind(':user_id', $user_id);
                $this->db->execute();

                // Update password in the 'counsellor' table
                $sql_counsellor = "UPDATE counsellor SET password = :new_password WHERE user_id = :user_id";
                $this->db->query($sql_counsellor);
                $this->db->bind(':new_password', $new_password);
                $this->db->bind(':user_id', $user_id);
                $this->db->execute();

                // Update password in the 'admin' table
                $sql_admin = "UPDATE admin SET password = :new_password WHERE user_id = :user_id";
                $this->db->query($sql_admin);
                $this->db->bind(':new_password', $new_password);
                $this->db->bind(':user_id', $user_id);
                $this->db->execute();

                // Update password in the 'doctor' table
                $sql_doctor = "UPDATE doctor SET password = :new_password WHERE user_id = :user_id";
                $this->db->query($sql_doctor);
                $this->db->bind(':new_password', $new_password);
                $this->db->bind(':user_id', $user_id);
                $this->db->execute();
                
                return true; // Password update successful
            } else{
                return false; // Password update failed
            }
        }

        public function updateUsername($user_id, $new_username){
            $sql = "UPDATE users SET username = :new_username WHERE user_id = :user_id";
            $this->db->query($sql);
            $this->db->bind(':new_username', $new_username);
            $this->db->bind(':user_id', $user_id); 

            $username_updated = $this->db->execute();

            if ($username_updated){
                
                // Update username in the 'undergraduate' table
                $sql_undergraduate = "UPDATE undergraduate SET username = :new_username WHERE user_id = :user_id";
                $this->db->query($sql_undergraduate);
                $this->db->bind(':new_username', $new_username);
                $this->db->bind(':user_id', $user_id);
                $this->db->execute();

                // Update username in the 'counsellor' table
                $sql_counsellor = "UPDATE counsellor SET username = :new_username WHERE user_id = :user_id";
                $this->db->query($sql_counsellor);
                $this->db->bind(':new_username', $new_username);
                $this->db->bind(':user_id', $user_id);
                $this->db->execute();

                // Update username in the 'admin' table
                $sql_admin = "UPDATE admin SET username = :new_username WHERE user_id = :user_id";
                $this->db->query($sql_admin);
                $this->db->bind(':new_username', $new_username);
                $this->db->bind(':user_id', $user_id);
                $this->db->execute();

                // Update username in the 'doctor' table
                $sql_doctor = "UPDATE doctor SET username = :new_username WHERE user_id = :user_id";
                $this->db->query($sql_doctor);
                $this->db->bind(':new_username', $new_username);
                $this->db->bind(':user_id', $user_id);
                $this->db->execute();
                
                return true; // username update successful
            } else{
                return false; // username update failed
            }

            if ($username_updated){
                // Update session variable with the new username
                $_SESSION['user_name'] = $new_username;
            }
        }

        public function updateUser($data){
            $this->db->query('UPDATE users SET username = :username, password = :password, email = :email WHERE user_id = :user_id');
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

        } //not yet used

        public function deleteUndergrad($id){
            // Begin a transaction to ensure both deletes are successful or fail together
            $this->db->beginTransaction();

            // Then, delete from 'users' table
            // $this->db->query('DELETE FROM users WHERE user_id = :user_id');
            $this->db->query('UPDATE users SET is_deleted = TRUE WHERE user_id = :user_id');
            $this->db->bind(':user_id', $id);
            $userDeleted = $this->db->execute();

            // First, delete from 'students' table
            // $this->db->query('DELETE FROM undergraduate WHERE user_id = :user_id');
            $this->db->query('UPDATE undergraduate SET is_deleted = TRUE WHERE user_id = :user_id');
            $this->db->bind(':user_id', $id);
            $studentDeleted = $this->db->execute();

            // Commit or rollback the transaction based on delete success
            if ($studentDeleted && $userDeleted) {
                $this->db->commit();
                return true;
            } else {
                $this->db->rollBack();
                return false;
            }
        }
        
        public function deleteCounselor($id){
            // Begin a transaction to ensure both deletes are successful or fail together
            $this->db->beginTransaction();

            // Then, delete from 'users' table
            // $this->db->query('DELETE FROM users WHERE user_id = :user_id');
            $this->db->query('UPDATE users SET is_deleted = TRUE WHERE user_id = :user_id');
            $this->db->bind(':user_id', $id);
            $userDeleted = $this->db->execute();

            // First, delete from 'students' table
            // $this->db->query('DELETE FROM counsellor WHERE user_id = :user_id');
            $this->db->query('UPDATE counsellor SET is_deleted = TRUE WHERE user_id = :user_id');
            $this->db->bind(':user_id', $id);
            $counselorDeleted = $this->db->execute();

            // Commit or rollback the transaction based on delete success
            if ($counselorDeleted && $userDeleted) {
                $this->db->commit();
                return true;
            } else {
                $this->db->rollBack();
                return false;
            }
        }
        
        public function deleteDoctor($id){
            // Begin a transaction to ensure both deletes are successful or fail together
            $this->db->beginTransaction();

            // Then, delete from 'users' table
            // $this->db->query('DELETE FROM users WHERE user_id = :user_id');
            $this->db->query('UPDATE users SET is_deleted = TRUE WHERE user_id = :user_id');
            $this->db->bind(':user_id', $id);
            $userDeleted = $this->db->execute();

            // First, delete from 'students' table
            // $this->db->query('DELETE FROM doctor WHERE user_id = :user_id');
            $this->db->query('UPDATE doctor SET is_deleted = TRUE WHERE user_id = :user_id');
            $this->db->bind(':user_id', $id);
            $doctorDeleted = $this->db->execute();

            // Commit or rollback the transaction based on delete success
            if ($doctorDeleted && $userDeleted) {
                $this->db->commit();
                return true;
            } else {
                $this->db->rollBack();
                return false;
            }
        }

        public function addFeedback($data){
            $this->db->query('INSERT INTO feedback (type, username, email, title, content) VALUES (:type, :username, :email, :title, :content)');
            if ($data['type'] === "feedback") {
                $this->db->bind(':type', 'feedback');
            }
            elseif ($data['type'] === 'complaint') {
                $this->db->bind(':type', 'complaint');
            }
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':content', $data['content']);
            
            $addfeedback = $this->db->execute();

            if ($addfeedback) {
                return true;
            }
            else {
                return false;
            }
        }
    }