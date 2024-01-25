<?php

class Undergrad extends Controller{

    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }
        $this->userModel=$this->model('User');
        $this->adminModel=$this->model('Administrator');  
    }

    //user view controllers

    public function dashboard(){
        $data = [];
        $this->view('undergrad/dashboard', $data);
    }

    public function home(){
        $data = [];
        $this->view('undergrad/home', $data);
    }

    public function questionnaires(){
        $data = [];
        $this->view('undergrad/questionnaires', $data);
    }

    public function academiccounsellors(){
        $data = [];
        $this->view('undergrad/academiccounsellors', $data);
    }

    public function professionalcounsellors(){
        $data = [];
        $this->view('undergrad/professionalcounsellors', $data);
    }

    public function counsellorprofile(){
        $data = [];
        $this->view('undergrad/counsellorprofile', $data);
    }

    public function doctors(){
        $data = [];
        $this->view('undergrad/doctors', $data);
    }

    public function doctorprofile(){
        $data = [];
        $this->view('undergrad/doctorprofile', $data);
    }

    public function chats(){
        $data = [];
        $this->view('undergrad/chats', $data);
    }

    public function resources(){
        $data = [];
        $this->view('undergrad/resources', $data);
    }

    public function ug_profile(){

        $undergrads = $this->adminModel->getUndergrads();
        $data = [
            'undergrads' => $undergrads,
            'current_password_err' => '',
            'new_password_err' => '',
            'confirm_password_err' => '',
            'current_username_err' => '',
            'new_username_err' => ''
        ];
        $this->view('undergrad/ug_profile', $data);
    }

    public function dass21(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'q1'=>trim($_POST['q1']),
                'q2'=>trim($_POST['q2']),
                'q3'=>trim($_POST['q3']),
                'q4'=>trim($_POST['q4']),
                'q5'=>trim($_POST['q5']),
                'q6'=>trim($_POST['q6']),
                'q7'=>trim($_POST['q7']),

                'q8'=>trim($_POST['q8']),
                'q9'=>trim($_POST['q9']),
                'q10'=>trim($_POST['q10']),
                'q11'=>trim($_POST['q11']),
                'q12'=>trim($_POST['q12']),
                'q13'=>trim($_POST['q13']),
                'q14'=>trim($_POST['q14']),

                'q15'=>trim($_POST['q15']),
                'q16'=>trim($_POST['q16']),
                'q17'=>trim($_POST['q17']),
                'q18'=>trim($_POST['q18']),
                'q19'=>trim($_POST['q19']),
                'q20'=>trim($_POST['q20']),
                'q21'=>trim($_POST['q21']),

                'q1_err'=>'',
                'q2_err'=>'',
                'q3_err'=>'',
                'q4_err'=>'',
                'q5_err'=>'',
                'q6_err'=>'',
                'q7_err'=>'',

                'q8_err'=>'',
                'q9_err'=>'',
                'q10_err'=>'',
                'q11_err'=>'',
                'q12_err'=>'',
                'q13_err'=>'',
                'q14_err'=>'',

                'q15_err'=>'',
                'q16_err'=>'',
                'q17_err'=>'',
                'q18_err'=>'',
                'q19_err'=>'',
                'q20_err'=>'',
                'q21_err'=>'',
            ];

            if(empty($data['q1'])){
                $data['q1_err']='Please select your answer';      
            }
            if(empty($data['q2'])){
                $data['q2_err']='Please select your answer';      
            }
            if(empty($data['q3'])){
                $data['q3_err']='Please select your answer';      
            }
            if(empty($data['q4'])){
                $data['q4_err']='Please select your answer';      
            }
            if(empty($data['q5'])){
                $data['q5_err']='Please select your answer';      
            }
            if(empty($data['q6'])){
                $data['q6_err']='Please select your answer';      
            }
            if(empty($data['q7'])){
                $data['q7_err']='Please select your answer';      
            }
            
            if(empty($data['q8'])){
                $data['q8_err']='Please select your answer';      
            }
            if(empty($data['q9'])){
                $data['q9_err']='Please select your answer';      
            }
            if(empty($data['q10'])){
                $data['q10_err']='Please select your answer';      
            }
            if(empty($data['q11'])){
                $data['q11_err']='Please select your answer';      
            }
            if(empty($data['q12'])){
                $data['q12_err']='Please select your answer';      
            }
            if(empty($data['q13'])){
                $data['q13_err']='Please select your answer';      
            }
            if(empty($data['q14'])){
                $data['q14_err']='Please select your answer';      
            }

            if(empty($data['q15'])){
                $data['q15_err']='Please select your answer';      
            }
            if(empty($data['q16'])){
                $data['q16_err']='Please select your answer';      
            }
            if(empty($data['q17'])){
                $data['q17_err']='Please select your answer';      
            }
            if(empty($data['q18'])){
                $data['q18_err']='Please select your answer';      
            }
            if(empty($data['q19'])){
                $data['q19_err']='Please select your answer';      
            }
            if(empty($data['q20'])){
                $data['q20_err']='Please select your answer';      
            }
            if(empty($data['q21'])){
                $data['q21_err']='Please select your answer';      
            }

            if (empty($data['q1_err']) && empty($data['q2_err']) && empty($data['q3_err']) && empty($data['q4_err']) && empty($data['q5_err']) && empty($data['q6_err']) && empty($data['q7_err']) && 
                empty($data['q8_err']) && empty($data['q9_err']) && empty($data['q10_err']) && empty($data['q11_err']) && empty($data['q12_err']) && empty($data['q13_err']) && empty($data['q14_err']) &&
                empty($data['q16_err']) && empty($data['q17_err']) && empty($data['q18_err']) && empty($data['q19_err']) && empty($data['q20_err']) && empty($data['q21_err'])) {
                # code...
            }
        } else {
            $data = [
                'q1'=>'',
                'q2'=>'',
                'q3'=>'',
                'q4'=>'',
                'q5'=>'',
                'q6'=>'',
                'q7'=>'',

                'q8'=>'',
                'q9'=>'',
                'q10'=>'',
                'q11'=>'',
                'q12'=>'',
                'q13'=>'',
                'q14'=>'',

                'q15'=>'',
                'q16'=>'',
                'q17'=>'',
                'q18'=>'',
                'q19'=>'',
                'q20'=>'',
                'q21'=>'',
            ];
            $this->view('undergrad/dass21', $data);
        }
        $this->view('undergrad/dass21', $data);
    }

    public function dass21_review(){
        $data = [];
        $this->view('undergrad/dass21_review', $data);
    }

    public function feedback(){
        $data = [];
        $this->view('undergrad/feedback', $data);
    }

    //function controllers

    public function changeUsernameUG($user_id){
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
                    redirect('undergrad/ug_profile');
                    } else {
                    die('Something went wrong');
                    }
                }

            } else {
                // Load view with errors
                $this->view('undergrad/ug_profile', $data);
            }
        } 
        
        else {
            $data = [
            'current_username' => '',
            'new_username' => '',
            'current_username_err'=>'',
            'new_username_err'=>''
          ];
    
          $this->view('undergrad/ug_profile', $data);
        }

        $this->view('undergrad/ug_profile', $data);
    }

    public function changePwdUG($user_id){
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
                redirect('undergrad/ug_profile');
                } else {
                die('Something went wrong');
                }
            }

          } else {
            // Load view with errors
            $this->view('undergrad/ug_profile', $data);
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
    
          $this->view('undergrad/ug_profile', $data);
        }

        $this->view('undergrad/ug_profile', $data);

    }

}