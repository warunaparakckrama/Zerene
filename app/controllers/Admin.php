<?php

class Admin extends Controller{
    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }
        $this->userModel=$this->model('User');
        $this->adminModel=$this->model('Administrator');
    }

    //page view controllers

    public function ad_dashboard(){
        $data = [];
        $this->view('admin/ad_dashboard', $data);
    }

    public function ad_home(){
        $data = [];
        $this->view('admin/ad_home', $data);
    }

    public function ad_reg_admin(){
        //check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //sanitize data
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            $data=[
                'username'=>trim($_POST['username']),
                'email'=>trim($_POST['email']),
                'password'=>trim($_POST['password']),
                'confirm_password'=>trim($_POST['confirm_password']),
                'username_err'=>'',
                'email_err'=>'',
                'password_err'=>'',
                'confirm_password_err'=>'',
            ];

            if(empty($data['username'])){
                $data['username_err']='Please enter username';      
            }else {
                if($this->userModel->findUserByUsername($data['username'])){
                    $data['username_err']='Username is already taken'; 
                }
            }

            if(empty($data['email'])){
                $data['email_err']='Please enter email';      
            }else{
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err']='Email is already taken'; 
                }
            }

            if(empty($data['password'])){
                $data['password_err']='Please enter password';      
            }elseif(strlen($data['password'])<6){
                $data['password_err']='Password must be atleast 6 characters'; 
            }

             if(empty($data['confirm_password'])){
                $data['confirm_password_err']='Please confirm password';      
            }else{
                if($data['password']!=$data['confirm_password']){
                    $data['confirm_password_err']='passwords do not match';
                }
            }

            if(empty($data['username_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){

                //hash password
                $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);

                if($this->userModel->reg_admin($data)){
                    // flash('register_success','You are registered and can login');
                    redirect('admin/ad_reg_admin');
                }else{
                    die('Something went wrong');
                }

            }else{
                $this->view('admin/ad_reg_admin',$data);
            }
        } else{
            $data=[
                'username'=>'',
                'email'=>'',
                'password'=>'',
                'confirm_password'=>'',
                'username_err'=>'',
                'email_err'=>'',
                'password_err'=>'',
                'confirm_password_err'=>''
            ];

            $this->view('admin/ad_reg_admin', $data);
        }
    }

    public function ad_reg_counselor(){
        //check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
    
            //sanitize data
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            
            // $coun_type = $_POST['coun_type'];
            // $gender = $_POST['gender'];
            //inti data
            $data=[
                'coun_type'=>trim($_POST['coun_type']),
                'fname'=>trim($_POST['fname']),
                'lname'=>trim($_POST['lname']),
                'gender'=>trim($_POST['gender']),
                'dob'=>trim($_POST['dob']),
                'university'=>trim($_POST['university']),
                'faculty'=>trim($_POST['faculty']),
                'email'=>trim($_POST['email']),
                'username'=>trim($_POST['username']),
                'password'=>trim($_POST['password']),
                'coun_type_err'=>'',
                'fname_err'=>'',
                'lname_err'=>'',
                'gender_err'=>'',
                'dob_err'=>'',
                'university_err'=>'',
                'faculty_err'=>'',
                'email_err'=>'',
                'username_err'=>'',
                'password_err'=>'',
    
                ];
                
                if(empty($data['coun_type'])){
                    $data['coun_type_err']='Please select type';      
                }

                if(empty($data['fname'])){
                    $data['fname_err']='Please enter first name';      
                }
    
                if(empty($data['lname'])){
                    $data['lname_err']='Please enter last name';      
                }

                if(empty($data['gender'])){
                    $data['gender_err']='Please select gender';      
                }
                
                if(empty($data['dob'])){
                    $data['dob_err']='Please enter date of birth';      
                }

                if(empty($data['university'])){
                    $data['university_err']='Please enter university';      
                }

                if(empty($data['faculty'])){
                    $data['faculty_err']='Please enter faculty';      
                }
    
                if(empty($data['email'])){
                    $data['email_err']='Please enter email';      
                }else{
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err']='Email is already taken'; 
                    }
                }
    
                //validate username
                if(empty($data['username'])){
                    $data['username_err']='Please enter username';      
                }else {
                    if($this->userModel->findUserByUsername($data['username'])){
                        $data['username_err']='Username is already taken'; 
                    }
                }
    
                //validate password
                if(empty($data['password'])){
                    $data['password_err']='Please enter password';      
                }elseif(strlen($data['password'])<6){
                    $data['password_err']='Password must be atleast 6 characters'; 
                }
    
                //make sure errors are empty
                if(empty($data['coun_type_err']) && empty($data['fname_err']) && empty($data['lname_err']) && empty($data['gender_err']) && empty($data['dob_err']) && empty($data['university_err']) && empty($data['faculty_err']) && empty($data['email_err']) && empty($data['username_err']) && empty($data['password_err'])){
                    //validate
    
                    //hash password
                    $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
    
                    //regsiter user
                    if($this->userModel->reg_counselor($data)){
                        // flash('register_success','You are registered and can login');
                        redirect('admin/ad_reg_counselor');
                    }else{
                        die('Something went wrong');
                    }
    
                }else{
                    $this->view('admin/ad_reg_counselor',$data);
                }
    
            } else {
                //load form
                $data=[
                'coun_type'=>'',
                'fname'=>'',
                'lname'=>'',
                'gender'=>'',
                'dob'=>'',
                'university'=>'',
                'faculty'=>'',
                'email'=>'',
                'username'=>'',
                'password'=>'',
                'coun_type_err'=>'',
                'fname_err'=>'',
                'lname_err'=>'',
                'gender_err'=>'',
                'dob_err'=>'',
                'university_err'=>'',
                'faculty_err'=>'',
                'email_err'=>'',
                'username_err'=>'',
                'password_err'=>''
    
                ];
                $this->view('admin/ad_reg_counselor', $data);
            }
        
        // $data = [];
        $this->view('admin/ad_reg_counselor', $data);
    }

    public function ad_reg_doctor(){
        //check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
    
            //sanitize data
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            
            // $coun_type = $_POST['coun_type'];
            // $gender = $_POST['gender'];
            //inti data
            $data=[
                'fname'=>trim($_POST['fname']),
                'lname'=>trim($_POST['lname']),
                'gender'=>trim($_POST['gender']),
                'university'=>trim($_POST['university']),
                'hospital'=>trim($_POST['hospital']),
                'email'=>trim($_POST['email']),
                'contact_num'=>trim($_POST['contact_num']),
                'username'=>trim($_POST['username']),
                'password'=>trim($_POST['password']),
                'fname_err'=>'',
                'lname_err'=>'',
                'gender_err'=>'',
                'university_err'=>'',
                'hospital_err'=>'',
                'email_err'=>'',
                'contact_num_err'=>'',
                'username_err'=>'',
                'password_err'=>'',
    
                ];

                if(empty($data['fname'])){
                    $data['fname_err']='Please enter first name';      
                }
    
                if(empty($data['lname'])){
                    $data['lname_err']='Please enter last name';      
                }

                if(empty($data['gender'])){
                    $data['gender_err']='Please select gender';      
                }
                
                if(empty($data['university'])){
                    $data['university_err']='Please enter university';      
                }

                if(empty($data['hospital'])){
                    $data['hospital_err']='Please enter hospital';      
                }
    
                if(empty($data['email'])){
                    $data['email_err']='Please enter email';      
                }else{
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err']='Email is already taken'; 
                    }
                }

                if(empty($data['contact_num'])){
                    $data['contact_num_err']='Please enter contact number';      
                }
    
                //validate username
                if(empty($data['username'])){
                    $data['username_err']='Please enter username';      
                }else {
                    if($this->userModel->findUserByUsername($data['username'])){
                        $data['username_err']='Username is already taken'; 
                    }
                }
    
                //validate password
                if(empty($data['password'])){
                    $data['password_err']='Please enter password';      
                }elseif(strlen($data['password'])<6){
                    $data['password_err']='Password must be atleast 6 characters'; 
                }
    
                //make sure errors are empty
                if(empty($data['fname_err']) && empty($data['lname_err']) && empty($data['gender_err']) && empty($data['university_err']) && empty($data['hospital_err']) && empty($data['email_err']) && empty($data['contact_num_err']) && empty($data['username_err']) && empty($data['password_err'])){
                    //validate
    
                    //hash password
                    $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
    
                    //regsiter user
                    if($this->userModel->reg_doctor($data)){
                        // flash('register_success','You are registered and can login');
                        redirect('admin/ad_reg_doctor');
                    }else{
                        die('Something went wrong');
                    }
    
                }else{
                    $this->view('admin/ad_reg_doctor',$data);
                }
    
            } else {
                //load form
                $data=[
                'fname'=>'',
                'lname'=>'',
                'gender'=>'',
                'university'=>'',
                'hospital'=>'',
                'email'=>'',
                'contact_num'=>'',
                'username'=>'',
                'password'=>'',

                'fname_err'=>'',
                'lname_err'=>'',
                'gender_err'=>'',
                'university_err'=>'',
                'hospital_err'=>'',
                'email_err'=>'',
                'contact_num_err'=>'',
                'username_err'=>'',
                'password_err'=>''
    
                ];
                $this->view('admin/ad_reg_doctor', $data);
            }
        
        $this->view('admin/ad_reg_doctor', $data);
    }

    public function ad_users(){

        //get counsellors
        $undergrads = $this->adminModel->getUndergrads();
        $counselors = $this->adminModel->getCounselors();
        $doctors = $this->adminModel->getDoctors();
        $admins = $this->adminModel->getAdmins();
        $data = [
            'undergrads' => $undergrads,
            'counselors' => $counselors,
            'doctors' => $doctors,
            'admins' => $admins
        ];
        $this->view('admin/ad_users', $data);
    }
  
    public function ad_profile(){
        $data = [];
        $this->view('admin/ad_profile', $data);
    }

    public function ad_edit_user($user_id){

        //get user data
        $user = $this->userModel->findUserDetails($user_id);
        
        $data =[
            'user' => $user,
        ];  
        $this->view('admin/ad_edit_user', $data);
    }

    public function newsletters(){
        $data = [];
        $this->view('admin/newsletters', $data);
    }

    public function notifications(){
        $notifications = $this->adminModel->getNotifications();
        $data = [
            'user_type' => '',
            'notifications' => $notifications
        ];
        $this->view('admin/notifications', $data);
    }

    public function support(){
        $feedback = $this->adminModel->getFeedback();
        $complaint = $this->adminModel->getComplaint();
        $data = [
            'feedback' => $feedback,
            'complaint' => $complaint
        ];
        $this->view('admin/support', $data);
    }

    public function verifications(){
        $data = [];
        $this->view('admin/verifications', $data);
    }

    //function controllers

    public function changeUsernameAdmin($user_id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'current_username' => trim($_POST['current_username']),
                'new_username' => trim($_POST['new_username']),
                'current_username_err'=>'',
                'new_username_err'=>''
            ];
        
            if(empty($data['current_username'])){
                $data['current_username_err']='Please enter current username';  
            }
            if(empty($data['new_username'])){
                $data['new_username_err']='Please enter new username';  
            }

            if(empty($data['current_username_err']) && empty($data['new_username_err'])){
                // Validated
    
                // Fetch the current username from db
                $current_username = $this->userModel->getUsernameById($user_id);
    
                // Verify if the entered current password matches the hashed password from the database
                if (($data['current_username'] != $current_username)) {
                    $data['current_username_err'] = 'Current username is incorrect';
                } else {

                    // Update the username
                    if ($this->userModel->updateUsername($user_id, $data['new_username'])) {
                    flash('user_message', 'Username updated successfully');
                    redirect('admin/ad_profile');
                    } else {
                    die('Something went wrong');
                    }
                }

            } else {
                // Load view with errors
                $this->view('admin/ad_profile', $data);
            }
        } 
        
        else {
            $data = [
            'current_username' => '',
            'new_username' => '',
            'current_username_err'=>'',
            'new_username_err'=>''
          ];
    
          $this->view('admin/ad_profile', $data);
        }

        $this->view('admin/ad_profile', $data);
    }

    public function changeUsernameUser($user_id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'current_username' => trim($_POST['current_username']),
                'new_username' => trim($_POST['new_username']),
                'current_username_err'=>'',
                'new_username_err'=>''
            ];
        
            if(empty($data['current_username'])){
                $data['current_username_err']='Please enter current username';  
            }
            if(empty($data['new_username'])){
                $data['new_username_err']='Please enter new username';  
            }

            if(empty($data['current_username_err']) && empty($data['new_username_err'])){
                // Validated
    
                // Fetch the current username from db
                $current_username = $this->userModel->getUsernameById($user_id);
    
                //
                if (($data['current_username'] != $current_username)) {
                    $data['current_username_err'] = 'Current username is incorrect';
                } else {

                    // Update the username
                    if ($this->userModel->updateUsername($user_id, $data['new_username'])) {
                    // flash('user_message', 'Username updated successfully');
                    redirect('admin/ad_edit_user/' . $user_id);
                    } else {
                    die('Something went wrong');
                    }
                }

            } else {
                // Load view with errors
                $this->view('admin/ad_edit_user/' . $user_id, $data);
            }
        } 
        
        else {
            $data = [
            'current_username' => '',
            'new_username' => '',
            'current_username_err'=>'',
            'new_username_err'=>''
          ];
    
          $this->view('admin/ad_edit_user/' . $user_id, $data);
        }

        $this->view('admin/ad_edit_user/' . $user_id, $data);
    }

    public function changePwdAdmin($user_id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
        $data = [
          'current_password' => trim($_POST['current_password']),
          'new_password' => trim($_POST['new_password']),
          'confirm_password' => trim($_POST['confirm_password']),
          'current_password_err'=>'',
          'new_password_err'=>'',
          'confirm_password_err'=>''
        ];

        if(empty($data['current_password'])){
            $data['current_password_err']='Please enter current password';      
        }

        if(empty($data['new_password'])){
            $data['new_password_err']='Please enter new password';      
        }elseif(strlen($data['new_password'])<6){
            $data['new_password_err']='Password must be atleast 6 characters'; 
        }

        if(empty($data['confirm_password'])){
            $data['confirm_password_err']='Please re-enter new password';      
        }else{
            if($data['new_password']!=$data['confirm_password']){
                $data['confirm_password_err']='passwords do not match';
            }
        }

        

        if(empty($data['username_err']) && empty($data['email_err'])&& empty($data['confirm_password_err'])){
            // Validated

            // Fetch the hashed password from the database based on the user ID
            $hashed_password_from_db = $this->userModel->getPasswordById($user_id);

            // Verify if the entered current password matches the hashed password from the database
            if (!password_verify($data['current_password'], $hashed_password_from_db)) {
                $data['current_password_err'] = 'Current password is incorrect';
            } else {
                // Hash the new password
                $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);

                // Update the user's password
                if ($this->userModel->updatePassword($user_id, $data['new_password'])) {
                flash('user_message', 'Password updated successfully');
                redirect('admin/ad_profile');
                } else {
                die('Something went wrong');
                }
            }

          } else {
            // Load view with errors
            $this->view('admin/ad_profile', $data);
          }
        
        }   
    
        else {
            $data = [
            'current_password' => '',
            'new_password' => '',
            'confirm_password' => '',
            'current_password_err'=>'',
            'new_password_err'=>'',
            'confirm_password_err'=>''
          ];
    
          $this->view('admin/ad_profile', $data);
        }

        $this->view('admin/ad_profile', $data);

    }

    public function changePwdUser($user_id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
            $data = [
            'new_password' => trim($_POST['new_password']),
            'confirm_password' => trim($_POST['confirm_password']),
            'new_password_err'=>'',
            'confirm_password_err'=>''
            ];

            if(empty($data['new_password'])){
                $data['new_password_err']='Please enter new password';      
            }elseif(strlen($data['new_password'])<6){
                $data['new_password_err']='Password must be atleast 6 characters'; 
            }

            if(empty($data['confirm_password'])){
                $data['confirm_password_err']='Please re-enter new password';      
            }else{
                if($data['new_password']!=$data['confirm_password']){
                    $data['confirm_password_err']='passwords do not match';
                }
            }

        

            if(empty($data['new_password_err']) && empty($data['confirm_password_err'])){
            
                // Hash the new password
                $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);

                // Update the user's password
                if ($this->userModel->updatePassword($user_id, $data['new_password'])) {
                // flash('user_message', 'Password updated successfully');
                redirect('admin/ad_edit_user/' . $user_id);
                } else {
                    die('Something went wrong');
                }
                

            } 
            
            else {
                // Load view with errors
                $this->view('admin/ad_edit_user/' . $user_id, $data);
            }
        
        }   
    
        else {
            $data = [
            'new_password' => '',
            'confirm_password' => '',
            'new_password_err'=>'',
            'confirm_password_err'=>''
          ];
    
          $this->view('admin/ad_edit_user/' . $user_id, $data);
        }

        $this->view('admin/ad_edit_user/' . $user_id, $data);

    }

    public function submitNotifications($user_id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'author' => trim($_POST['author']),
                'subject' => trim($_POST['subject']),
                'user_type' => trim($_POST['user_type']),
                'content' => trim($_POST['content']),
                'subject_err' => '',
                'content_err' => '',
            ];
        
            if(empty($data['subject'])){
                $data['subject_err']='Please enter the subject';  
            }
            if(empty($data['content'])){
                $data['content_err']='Please enter the content';  
            }

            if(empty($data['subject_err']) && empty($data['content_err'])){
                // Validated
    
                // Fetch the current username from db
                $current_username = $this->userModel->getUsernameById($user_id);
                $data['author'] = $current_username;

                // post notifications
                if ($this->adminModel->addNotifications($data)) {
                    redirect('admin/notifications');
                    } else {
                    die('Something went wrong');
                    }

            } else {
                // Load view with errors
                $this->view('admin/notifications', $data);
            }
        }
    }

    public function deleteNotifications($notify_id){
        if($this->adminModel->deleteNotify($notify_id)){
        //   flash('post_message', 'user Removed');
            redirect('admin/notifications');
        } else {
            die('Something went wrong');
        }
    }

    public function delFeedback($feedback_id){
        if($this->adminModel->deleteFeedback($feedback_id)){
        //   flash('post_message', 'user Removed');
            redirect('admin/support');
        } else {
            die('Something went wrong');
        }
    }
}