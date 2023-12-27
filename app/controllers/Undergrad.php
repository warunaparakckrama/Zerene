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

    public function ac(){
        $data = [];
        $this->view('undergrad/ac', $data);
    }

    public function pc(){
        $data = [];
        $this->view('undergrad/pc', $data);
    }

    public function doctors(){
        $data = [];
        $this->view('undergrad/doctors', $data);
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
            'undergrads' => $undergrads
        ];
        $this->view('undergrad/ug_profile', $data);
    }

    public function dass21(){
        $data = [];
        $this->view('undergrad/dass21', $data);
    }

    public function dass21_1(){
        $data = [];
        $this->view('undergrad/dass21_1', $data);
    }
    
    public function dass21_2(){
        $data = [];
        $this->view('undergrad/dass21_2', $data);
    }

    public function dass21_3(){
        $data = [];
        $this->view('undergrad/dass21_3', $data);
    }

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