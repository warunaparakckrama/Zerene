<?php

class Procounsellor extends Controller{
    
    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }
        $this->userModel=$this->model('User');
        $this->adminModel=$this->model('Administrator');
        $this->counsellorModel=$this->model('Counsellor');
    }

    //page view controllers

    public function dashboard(){
        $data = [];
        $this->view('procounsellor/dashboard', $data);
    }

    public function pc_home(){
        $data = [];
        $this->view('procounsellor/pc_home', $data);
    }

    public function pc_reviewq(){
        $data = [];
        $this->view('procounsellor/pc_reviewq', $data);
    }

    public function pc_createq(){
        $data = [
            'quiz_name' => '',
            'quiz_type' => '',
            'num_questions' => '',
            'num_answers' => '',
            'quiz_name_err'=>'',
            'quiz_type_err'=>'',
            'num_questions_err'=>'',
            'num_answers_err'=>''
        ];
        $this->view('procounsellor/pc_createq', $data);
    }

    public function pc_undergrad(){
        $data = [];
        $this->view('procounsellor/pc_undergrad', $data);
    }

    public function pc_chats(){
        $data = [];
        $this->view('procounsellor/pc_chats', $data);
    }

    public function pc_counselors(){
        $data = [];
        $this->view('procounsellor/pc_counselors', $data);
    }

    public function pc_profileupdate(){
        $data = [];
        $this->view('procounsellor/pc_profileupdate', $data);
    }

    public function pc_doctors(){
        $data = [];
        $this->view('procounsellor/pc_doctors', $data);
    }

    public function pc_timeslot(){
        redirect('Timeslot/pc_timeslot');
    }

    public function pc_feedback(){
        $data = [];
        $this->view('procounsellor/pc_feedback', $data);
    }

    //function controllers

    public function changePwdProcounsellor($user_id){
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
                redirect('procounsellor/dashboard');
                } else {
                die('Something went wrong');
                }
            }

          } else {
            // Load view with errors
            $this->view('procounsellor/pc_profileupdate', $data);
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
    
          $this->view('procounsellor/pc_profileupdate', $data);
        }

        $this->view('procounsellor/pc_profileupdate', $data);

    }

    public function changeUsernameProcounsellor($user_id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
        $data = [
          'current_username' => trim($_POST['current_username']),
          'new_username' => trim($_POST['new_username']),
          'current_username_err'=>'',
          'new_username_err'=>'',
        ];

        if(empty($data['current_username'])){
            $data['current_username_err']='Please enter current username';      
        }

        if(empty($data['new_username'])){
            $data['new_username_err']='Please enter new username';      
        }elseif(strlen($data['new_username'])<6){
            $data['new_username_err']='Username must be atleast 6 characters'; 
        }

        if(empty($data['current_username_err']) && empty($data['new_username_err'])){
            // Validated

            // Fetch the username from the database based on the user ID
            $current_username = $this->userModel->getUsernameById($user_id);

            // Verify if the entered current username matches the username from the database
            if ($data['current_username']!=$current_username) {
                $data['current_username_err'] = 'Current username is incorrect';
            } else {
                // Update the user's username
                if ($this->userModel->updateUsername($user_id, $data['new_username'])) {
                flash('user_message', 'Username updated successfully');
                redirect('procounsellor/pc_profileupdate');
                } else {
                die('Something went wrong');
                }
            }

          } else {
            // Load view with errors
            $this->view('procounsellor/pc_profileupdate', $data);
          }
        
        }   
    
        else {
            $data = [
            'current_username' => '',
            'new_username' => '',
            'current_username_err'=>'',
            'new_username_err'=>''
            ];
    
          $this->view('procounsellor/pc_profileupdate', $data);
        }

        $this->view('procounsellor/pc_profileupdate', $data);
    }

    public function createQuestionnaire($user_id){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
            $data = [
            'quiz_name' => trim($_POST['quiz_name']),
            'quiz_type' => trim($_POST['quiz_type']),
            'num_questions' => trim($_POST['num_questions']),
            'num_answers' => trim($_POST['num_answers']),
            'quiz_name_err'=>'',
            'quiz_type_err'=>'',
            'num_questions_err'=>'',
            'num_answers_err'=>'',
            ];

            if(empty($data['quiz_name'])){
                $data['quiz_name_err']='Please enter questionnaire name';      
            }

            if(empty($data['quiz_type'])){
                $data['quiz_type_err']='Please select questionnaire type';      
            }

            if(empty($data['num_questions'])){
                $data['num_questions_err']='Please enter number of questions';      
            }

            if(empty($data['num_answers'])){
                $data['num_answers_err']='Please enter number of answers';      
            }


            if(empty($data['quiz_name_err']) && empty($data['quiz_type_err']) && empty($data['num_questions_err']) && empty($data['num_answers_err'])){
                // Validated

                // Create the questionnaire
                if ($this->counsellorModel->addQuestionnaire($user_id, $data)) {
                    $questionnaire_id = $this->counsellorModel->getLastInsertedQuizId(); // Adjust this based on your actual method to get the last inserted quiz ID
                    // Loop through each question and insert into the database
                    for ($i = 1; $i <= $data['num_questions']; $i++) {
                        $questionKey = 'question' . $i;

                        if (!empty($_POST[$questionKey])) {
                            $questionText = trim($_POST[$questionKey]);

                            // Insert the question into the database
                            $this->counsellorModel->addQuestion($questionnaire_id, $questionText);
                        }
                    }

                    // Capture and insert answers for each question
                    $j = $data['num_answers'];
                    for ($i = 1; $i <= $j; $i++) {
                        
                            $answerKey = 'answer' . $i;

                            if (!empty($_POST[$answerKey])) {
                                $answerText = trim($_POST[$answerKey]);

                                // Insert the answer into the database
                                $this->counsellorModel->addAnswer($questionnaire_id, $j, $answerText);
                            }
                        
                    }
                    
                    flash('user_message', 'Questionnaire created successfully');
                    redirect('procounsellor/pc_createq');
                }
                    
                else {
                    die('Something went wrong');
                }

            } 
        
            else {
                // Load view with errors
                $this->view('procounsellor/pc_createq', $data);
            }
        
        }   
    
        else {
            $data = [
            'quiz_name' => '',
            'quiz_type' => '',
            'num_questions' => '',
            'num_answers' => '',
            'quiz_name_err'=>'',
            'quiz_type_err'=>'',
            'num_questions_err'=>'',
            'num_answers_err'=>''
          ];
    
          $this->view('procounsellor/pc_createq', $data);
        }

        $this->view('procounsellor/pc_createq', $data);
    }

}